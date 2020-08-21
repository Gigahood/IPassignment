<?php

include_once '../../Model/HistoryDBConnection.php';
include_once '../../View/HistoryModule/Class/HistoryMatch.php';
include_once '../../View/HistoryModule/Class/history.php';
include_once '../../View/HistoryModule/Class/ranking.php';

function getHistoryDetail($compID, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);
    $result2 = $db->getComp($compID);
    $result = $db->getHistoryDetail($compID);

    $history = new History($result["history_ID"],
            $result["history_Start_Date"],
            $result["history_End_Date"],
            $result2["competition_ID"],
            $result2["competition_name"]);

    $remark = $db->getRemark($result["history_ID"]);

    foreach ($remark as $value) {
        $history->setRemark($value["remark"]);
    }

    $matches = $db->getMatch($result["history_ID"]);
    foreach ($matches as $value) {
        $history->setMatches($value);
    }

    return $history;
}

function calculateHistoryScore($matches) {
    $participants = array();

    foreach ($matches as $value) {
        if (!array_key_exists($value["black_User"],$participants)) {
            $participants[$value["black_User"]] = array("Name" => $value["black_User"], "Score" => 0);
        }

        if (!array_key_exists($value["white_User"],$participants)) {
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

function getMatch($matchID,$dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $result = $db->getMatchDetail($matchID);
    
    return $result;
}

function update($black, $white, $wScore, $bScore, $remark, $sTime,
                    $eTime, $board, $dSession, $matchID) {
    $db = HistoryDBConnection :: getInstance($dSession);
    
    $db->updateHistory($black, $white, $wScore, $bScore, $remark, $sTime,
                    $eTime, $board,$matchID);
}

function closeCon($dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->closeConnection();
}




