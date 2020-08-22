<?php

include_once 'AbstractDatabaseConnection.php';

class HistoryDBConnection extends AbstractDatabaseConnection {

    public function getHistoryDetail($compID) {
        $query = "SELECT * FROM history WHERE competition_ID = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $compID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getComp($compID) {
        $query = "SELECT * FROM competition WHERE competition_ID = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $compID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getMatch($historyID) {
        $query = "SELECT * FROM historymatch WHERE history_ID = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $historyID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();

        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getMatchDetail($matchID) {
        $query = "SELECT * FROM historymatch WHERE match_ID  = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $matchID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();

        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
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

    public function getParticipant($matchID, $userID) {
        $query = "SELECT * FROM participantList INNER join historymatch
	on participantList.history_ID = historymatch.history_ID
WHERE historymatch.match_ID  = ? and participantList.user_ID = ?";


        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $matchID, PDO::PARAM_INT);
        $stmt->bindParam(2, $userID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();

        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

//    public function updateParticipant($historyID, $userID, $minus, $add) {
//        $participant =
//    }

    public function getParticipantList($historyID) {
        $query = "SELECT * FROM participantList WHERE history_ID  = ? order by score desc";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $historyID, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();


        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
    }

    public function updateHistoryDetail($startDate, $endDate, $remark, $id) {
        $query = "Update history Set history_Start_Date=?, history_End_Date=?, "
                . "remark = ? where history_ID = ?";

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $startDate, PDO::PARAM_STR);
        $stmt->bindParam(2, $endDate, PDO::PARAM_STR);
        $stmt->bindParam(3, $remark, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);


        $stmt->execute();
    }

    public function updateHistory($black, $white, $wScore, $bScore, $remark, $sTime, $eTime,
            $board, $matchID) {
        $query = "Update historymatch Set black_User=?, white_User=?, "
                . "white_Score = ?, black_Score = ?, match_Detail = ?, "
                . "start_Time = ?, end_Time = ?, board_Size = ? where match_ID = ?";

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $black, PDO::PARAM_INT);
        $stmt->bindParam(2, $white, PDO::PARAM_INT);
        $stmt->bindParam(3, $wScore, PDO::PARAM_STR);
        $stmt->bindParam(4, $bScore, PDO::PARAM_INT);
        $stmt->bindParam(5, $remark, PDO::PARAM_STR);
        $stmt->bindParam(6, $sTime, PDO::PARAM_STR);
        $stmt->bindParam(7, $eTime, PDO::PARAM_STR);
        $stmt->bindParam(8, $board, PDO::PARAM_INT);
        $stmt->bindParam(9, $matchID, PDO::PARAM_INT);

        $stmt->execute();
    }

}
