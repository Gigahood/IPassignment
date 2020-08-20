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

}
