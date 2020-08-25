<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserServiceConnection
 *
 * @author Jane Chew
 */
include_once 'AbstractDatabaseConnection.php';

class UserServiceConnection extends AbstractDatabaseConnection  {
    //put your code here
    
    public function getParticipantCompDet($name){
        $query = "SELECT * FROM user INNER JOIN participant ON "
                . "user.user_ID = participant.participant_ID WHERE user.user_name = ?";
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
