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

    public function getRemark($historyID) {
        $query = "SELECT * FROM historyremarklist WHERE history_ID = ?";
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

        $totalrows = $stmt->rowCount();
    }

}
