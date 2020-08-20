<?php
include_once 'AbstractDatabaseConnection.php';
/**
 * Description of UserDBConnection
 *
 * @author Chew Jane
 */
class UserDBConnection extends AbstractDatabaseConnection {
    
    public function retrieveUser($useremail, $userpw){
        $query = "SELECT * FROM user WHERE user_email = ? AND user_pw = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $useremail, PDO::PARAM_STR);
        $stmt->bindParam(2, $userpw, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
