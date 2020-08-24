<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompetitionServiceConnection
 *
 * @author Cheng Qing Xiang
 */
include_once 'AbstractDatabaseConnection.php';

class CompetitionServiceConnection extends AbstractDatabaseConnection {
    //put your code here
    public function getCompDet($name){
        $query = "SELECT * FROM competition WHERE competition_name = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
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
