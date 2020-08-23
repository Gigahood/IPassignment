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
    
    public function createAccount($userID, $username, $useremail, $userdob, $useraddress, $usercontact, $userpw, $userpic, $userIC, $userrole) {
          $query = "INSERT INTO user(user_ID, user_name, user_email, user_dob, user_address, user_contact, user_pw, user_pic, user_IC, user_role)"
                  . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = parent::$db->prepare($query);
          $stmt->bindParam(1, $userID, PDO::PARAM_INT);
          $stmt->bindParam(2, $username, PDO::PARAM_STR);
          $stmt->bindParam(3, $useremail, PDO::PARAM_STR);
          $stmt->bindParam(4, $userdob, PDO::PARAM_STR);
          $stmt->bindParam(5, $useraddress, PDO::PARAM_STR);
          $stmt->bindParam(6, $usercontact, PDO::PARAM_STR);
          $stmt->bindParam(7, $userpw, PDO::PARAM_STR);
          $stmt->bindParam(8, $userpic, PDO::PARAM_LOB);
          $stmt->bindParam(9, $userIC, PDO::PARAM_STR);
          $stmt->bindParam(10, $userrole, PDO::PARAM_STR);
          
          $stmt->execute();
    }
    
}
