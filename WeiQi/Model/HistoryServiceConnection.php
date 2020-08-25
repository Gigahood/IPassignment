<?php

include_once 'AbstractDatabaseConnection.php';

/**
 * Description of HistoryServiceConnection
 *
 * @author Kuek Yong Boon
 */
class HistoryServiceConnection extends AbstractDatabaseConnection {

    public function getAllHistory() {
        $query = "select * from history INNER join competition where history.competition_ID = competition.competition_ID";
        $stmt = parent::$db->prepare($query);

        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getHistory($name) {
        $query = "select * from history INNER join competition on history.competition_ID = competition.competition_ID where competition.competition_name = ? ";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        

        if ($totalrows == 0) {
            return $totalrows;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}
