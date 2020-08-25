<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--
 * Update password Webpage
 *
 * @author Chew Jane
 *-->

<?php
    include_once '../../Model/UserDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="authCSS.css" />
    </head>
    <body>
        <?php 
            session_start();
            $_SESSION["role"] = "student";
            
            $errorMessage = "";
            $errorMesOpenStyle = "<p style='color:red'>*";
            $errorMesCloseStyle = "*</p>";
            $failedRegister = "Failed to update password due to";
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['newPW']) || empty($_POST['rePW'])) {
                    $errorMessage .= $errorMesOpenStyle . "Password is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty password.");
                }
                else if (strlen($_POST['newPW']) < 6 ) {
                    $errorMessage .= $errorMesOpenStyle . "Password must be at least 6 characters." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is less than 6 characters.");
                }
                else if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $_POST['newPW'])){
                    $errorMessage .= $errorMesOpenStyle . "Password must contain both numbers and letters." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is not secure enough.");
                }
                else if ($_POST['newPW'] != $_POST['rePW']){
                    $errorMessage .= $errorMesOpenStyle . "Password entered must be match." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is not match.");
                }
                else if ($_POST['rePW'] == $_POST['currentPW']){
                    $errorMessage .= $errorMesOpenStyle . "Current password cannot be same with new password." . $errorMesCloseStyle;
                    error_log($failedRegister . " current password entered is same with new password.");
                }


                if (strcmp($errorMessage, "") != 0){
                    echo $errorMessage; 
                }
            }
                        
            if ($_SERVER["REQUEST_METHOD"] != "POST"){
                $db = UserDBConnection::getInstance($_SESSION["role"]);
                $result = $db->viewProfile();

                if($result == null){
                    echo 'Error. Please log in to your account first. <br />';
                    echo "<a href='login.php'>Click to go to login page</a>";
                }
                else {
                    $nameGet = $result['user_name'];
                    $_SESSION["userID"] = $result["user_ID"];
                }
                
                $db->closeConnection();
            }
        ?>
        <div id="registerFormStyle">
            <div>
                <img src="auth_image/nworldLogo.png" alt="N-World logo" style="width: 30%; margin-left: auto; margin-right: auto; display: block;"/>
            </div>
            <br /><br />
            
            <div style="font-size: 25px; font-family: Arial;">
                &emsp;
                <img src="auth_image/leafNoBG.png" alt="N-World logo" width="200" style="width:3%; "/>
                <b>Update Own Password</b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm" method="post" action="updatePassword.php">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="<?php echo (isset($nameGet)) ? $nameGet: ''?>" size="80" readonly="readonly" />
                    <br /><br />

                    <span class="lblRightStyle"><span style="color: red;">* </span>Current Password : </span>
                    <input type="password" name="currentPW" id="currentPW" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>New Password : </span>
                    <input type="password" name="newPW" id="newPW" value="" size="20" />
                    <br />
                    <span style="font-size: 12px;">Password must have : at least 6 characters long, letters & numbers. 
                        The new password cannot be same with the current password too.</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Re-enter Password : </span>
                    <input type="password" name="rePW" id="rePW" value="" size="20" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Update" name="action" class="loginStyle"/>
                    <br /><br />
                </div>
            </form>
        </div>
        
        <?php
        // put your code here
        class EncryptionRegister {
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
            
        if ($_SERVER["REQUEST_METHOD"] == "POST" && strcmp($errorMessage, "") == 0) {

              $user_newPW = trim($_POST['rePW']);
              $encrypt_pw = EncryptionRegister::oneWayHash($user_pw);

              $db = UserDBConnection::getInstance($_SESSION["role"]);
              $db->updatePassword($encrypt_pw);
              echo "<p>Updated successful!</p>";
               echo "<a href='login.php'>Click to login to your user account.</a>";
              $db->closeConnection();

            }

            session_destroy();
            //unset($_SESSION["role"]);

        ?>
        ?>
    </body>
</html>
