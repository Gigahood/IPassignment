<?php

include_once '../../Model/HistoryDBConnection.php';
include_once '../../View/HistoryModule/Class/HistoryMatch.php';
include_once '../../View/HistoryModule/Class/history.php';
include_once '../../View/HistoryModule/Class/participant.php';
include_once 'SAXParser.php';

function getHistoryDetail($compID, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);
    $result = $db->getHistoryDetail($compID);

    if (!empty($result)) {
        $history = new History($result["history_ID"],
                $result["history_Start_Date"],
                $result["history_End_Date"],
                $result["competition_ID"],
                $result["competition_name"],
                $result["remark"]);

        $matches = $db->getMatch($result["history_ID"]);

        if (!empty($matches)) {
            foreach ($matches as $value) {
                $history->setMatches($value);
            }
        }
    } else {
        $result = $db->getComp($compID);
        $history = new History("",
                "",
                "",
                $result["competition_ID"],
                $result["competition_name"],
                "");
    }
    return $history;
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

function getName($userID, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $dbresult = $db->getUser($userID);

    if (empty($dbresult)) {
        $result = NULL;
    } else {
        $result = $dbresult["user_name"];
    }

    return $result;
}

function verifyUser($username, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);
    $result = $db->verifyUser($username);

    return $result;
}

function getUserID($username, $dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);
    $result = $db->getUserID($username);

    return $result;
}

function closeCon($dSession) {
    $db = HistoryDBConnection :: getInstance($dSession);

    $db->closeConnection();
}

function validateEditHistoryInput($startDate, $endDate, $remark) {
    $error = "";

    if (!checkValidDate($startDate, $endDate)) {
        $error .= "Start Date Must BE Earlier Than End Date <br/>";
    }

    return $error;
}

function validateEditInput($black, $white, $wScore, $bScore, $sTime, $eTime, $board, $remark, $matchID, $dSession) {
    $error = "";

    if (empty($black)) {
        $error .= "Black Player Require Value <br/>";
    }

    if (empty($white)) {
        $error .= "White Player Require Value <br/>";
    }

    if (empty($wScore)) {
        $error .= "White Score Require Value <br/>";
    }

    if (empty($bScore)) {
        $error .= "White Player Require Value <br/>";
    }

    if ((verifyUser($black, $dSession)) == null) {
        $error .= "Invalid Black Player Name <br/>";
    }

    if (empty(verifyUser($white, $dSession))) {
        $error .= "Invalid White Player Name <br/>";
    }

    if (!checkScore($bScore)) {
        $error .= "Invalid Black Score <br/>";
    }

    if (!checkScore($wScore)) {
        $error .= "Invalid White Score <br/>";
    }


    if (!checkTime($sTime, $eTime)) {
        $error .= "Start Time Must BE Earlier Than End Time <br/>";
    }

    return $error;
}

function checkScore($Score) {
    if ($Score < 0) {
        return false;
    }
    return true;
}

function checkValidDate($sdate, $edate) {
    if (strtotime($sdate) >= strtotime($edate)) {
        return false;
    } else {
        return true;
    }
}

function checkTime($sTime, $eTime) {
    if (strtotime($sTime) > strtotime($eTime)) {
        return false;
    }

    return true;
}

function insertWithXML($path) {
    $error = validatePath($path);
    return $error;
}

function validatePath($path) {
    try {
        $doc = new SAXParser($path);

        $id = getID($doc->getHistory()->getName());
        $startDate = $doc->getHistory()->getHstart();
        $endDate = $doc->getHistory()->getHend();
        $remark = $doc->getHistory()->getRemark();  
       
        print_r($doc->getHistory());

        createHistory($id["competition_ID"], $startDate, $endDate, $remark, "admin");

        foreach ($doc->getMatches() as $match) {
            $black = getUserID($match->getBlack(),"admin");
            $white = getUserID($match->getWhite(),"admin");
            $bScore = $match->getB_Score();
            $wScore = $match->getW_Score();
            $remark = $match -> getMatchDetail();
            $sTime = $match-> getStartTime();
            $eTime = $match -> getEndTime();
            $board = $match -> getBoardSize();
            $historyID = $id["competition_ID"];
            

            createHistoryMatch($black["user_ID"], $white["user_ID"], $wScore, $bScore, $remark, $sTime,
            $eTime, $board, "admin", $historyID);
        }
        
    } catch (Exception $ex) {
        echo "123";
    }


    return $doc;
}

function getID($name) {
    $db = HistoryDBConnection :: getInstance("admin");
    $result = $db->getCompetitionID($name);

    return $result;
}
