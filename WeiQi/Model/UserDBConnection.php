<?php
include_once 'AbstractDatabaseConnection.php';
include_once '../../View/UserManagement/user_classes/UserADT.php';
/**
 * Description of UserDBConnection
 *
 * @author Chew Jane
 */
class UserDBConnection extends AbstractDatabaseConnection implements UserADT{
    
    public function retrieveUser($useremail, $userpw){
        $getEmail = $useremail;
        $query = "SELECT * FROM user WHERE user_email = '$getEmail' ";
        $stmt = parent::$db->prepare($query);
        $stmt->execute();
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            $result = null;
            $encryptPW = null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $encryptPW = $result["user_pw"];
        }

        if(Encryption::verify($userpw, $encryptPW)){
            return $result;
        }
        else {
            return null;
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
    
    public function viewProfile(){
        if(isset($_SESSION["userID"])) {
            $query = "SELECT * FROM user WHERE user_ID = '" . $_SESSION["userID"] . "'";
            $stmt = parent::$db->prepare($query);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            return null;
        }
        
    }

    public function updateProfile($user_email, $user_address, $user_contact, $user_pic) {
        if(isset($_SESSION["userID"])) {
            $query = "UPDATE user SET user_email=?, user_address=?, user_contact=?, user_pic=? WHERE user_ID = '" . $_SESSION["userID"] . "'";
            $stmt = parent::$db->prepare($query);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            return null;
        }
    }



}

class Encryption {
    public static function oneWayHash($value){
        $hashedValue = password_hash($value, PASSWORD_DEFAULT);

        return $hashedValue;
    }

    public static function verify($value, $hashValue){
        $hash = crypt($value, $hashValue);

        if ($hash === $hashValue) {
            echo "correct";
        }
        else {
            echo "wrong";
        }


        return $hash === $hashValue;
    }
}

