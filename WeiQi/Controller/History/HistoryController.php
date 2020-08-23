<?php

include_once '../../Model/HistoryDBConnection.php';
include_once '../../View/HistoryModule/Class/HistoryMatch.php';
include_once '../../View/HistoryModule/Class/history.php';
include_once '../../View/HistoryModule/Class/ranking.php';
include_once '../../View/HistoryModule/Class/participantList.php';

function getHistoryDetail($compID, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);
    $result2 = $db->getComp($compID);
    $result = $db->getHistoryDetail($compID);


    if (!empty($result)) {
        $history = new History($result["history_ID"],
                $result["history_Start_Date"],
                $result["history_End_Date"],
                $result2["competition_ID"],
                $result2["competition_name"],
                $result["remark"]);

        $matches = $db->getMatch($result["history_ID"]);

        if (!empty($matches)) {
            foreach ($matches as $value) {
                $history->setMatches($value);
            }
        }
    } else {
        $history = new History("",
                "",
                "",
                $result2["competition_ID"],
                $result2["competition_name"],
                "");
    }
//    $remark = $db->getRemark($result["history_ID"]);
//
//    foreach ($remark as $value) {
//        $history->setRemark($value["remark"]);
//    }



    return $history;
}

function viewHistoryScore($historyID, $dSession) {
    $participants = array();

    $db = HistoryDBConnection :: getInstance($dSession);
    $result = $db->getParticipantList($historyID);

    foreach ($result as $value) {
        $participant = new ParticipantList($value["participant_List_ID"],
                $value["history_ID"],
                $value["user_ID"],
                $value["score"]);

        array_push($participants, $participant);
    }

    return $participants;
}

function calculateHistoryScore($matches) {
    $participants = array();

    foreach ($matches as $value) {
        if (!array_key_exists($value["black_User"], $participants)) {
            $participants[$value["black_User"]] = array("Name" => $value["black_User"], "Score" => 0);
        }

        if (!array_key_exists($value["white_User"], $participants)) {
            $participants[$value["white_User"]] = array("Name" => $value["white_User"], "Score" => 0);
        }

        if ($value["black_Score"] > $value["white_Score"]) {
            $participants[$value["black_User"]]["Score"] += 2;
        } else if ($value["black_Score"] < $value["white_Score"]) {
            $participants[$value["white_User"]]["Score"] += 2;
        } else {
            $participants[$value["black_User"]]["Score"] += 1;
            $participants[$value["white_User"]]["Score"] += 1;
        }
    }

    $keys = array_column($participants, 'Score');

    array_multisort($keys, SORT_DESC, $participants);

    return $participants;

//    foreach ($participants as $value) {
//        print_r($value);
//        echo "<br/>";
//        echo "<br/>";
//        echo "<br/>";
//        echo "<br/>";
//    }
}

function getMatch($matchID, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $result = $db->getMatchDetail($matchID);

    return $result;
}

function update($black, $white, $wScore, $bScore, $remark, $sTime,
        $eTime, $board, $dSession, $matchID) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->updateHistory($black, $white, $wScore, $bScore, $remark, $sTime,
            $eTime, $board, $matchID);
}

function updateHistory($startDate, $endDate, $remark, $dSession, $id) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->updateHistoryDetail($startDate, $endDate, $remark, $id);
}

function createHistory($competition_ID, $history_Start_Date, $history_End_Date, $remark, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->createHistory($history_Start_Date, $history_End_Date, $remark, $competition_ID);
}

function createHistoryMatch($black, $white, $wScore, $bScore, $remark, $sTime,
        $eTime, $board, $role, $historyID) {
    $db = HistoryDBConnection :: getInstance($role);

    try {

        $db->createHistoryMatch($black, $white, $wScore, $bScore, $remark, $sTime,
                $eTime, $board, $historyID);
    } catch (Exception $ex) {

        echo $ex->getMessage();
    }
}

function closeCon($dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->closeConnection();
}
