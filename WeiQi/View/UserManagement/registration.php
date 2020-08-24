<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--
 * Registration Webpage
 *
 * @author Chew Jane
 *-->
<?php
    include_once '../../Model/UserDBConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="authCSS.css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <script type="text/javascript">

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#proImg').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    </head>
    <body>

        <?php
            session_start();
            $_SESSION["role"] = "student";
            
            
            $errorMessage = "";
            $errorMesOpenStyle = "<p style='color:red'>*";
            $errorMesCloseStyle = "*</p>";
            $failedRegister = "Failed to register due to";
                
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //Validation & Error Handling//

                $validationNum = '/^([0-9]*)$/';
                if (empty($_POST['userName']))  {
                    $errorMessage .= $errorMesOpenStyle . "User name is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty user name.");
                }

                /*$day = test_input($_POST['day']);
                $month = test_input($_POST['month']);
                $year = test_input($_POST['year']);*/
                if (empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) {
                    $errorMessage .= $errorMesOpenStyle . "User date of birth is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty user date of birth.");
                }
                else if ($_POST['day'] > 31 || $_POST['month'] > 12 || $_POST['year'] >= 2020){
                    $errorMessage .= $errorMesOpenStyle . "User date of birth value entered is invalid." . $errorMesCloseStyle;
                    error_log($failedRegister . " value out of range of" . " user date of birth.");
                }
                else if (!preg_match($validationNum, $_POST['day']) || !preg_match($validationNum, $_POST['month']) || !preg_match($validationNum, $_POST['year'])) {
                    $errorMessage .= $errorMesOpenStyle . "User date of birth only accepts numeric value." . $errorMesCloseStyle;
                    error_log($failedRegister . " invalid format of" . " user date of birth.");
                }

                //$contact = test_input($_POST['contactNo']);
                if (empty($_POST['contactNo'])) {
                    $errorMessage .= $errorMesOpenStyle . "Contact number is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty user contact number.");
                }
                else if (!preg_match($validationNum, $_POST['contactNo'])) {
                    $errorMessage .= $errorMesOpenStyle . "User contact number only accepts numeric value." . $errorMesCloseStyle;
                    error_log($failedRegister . " invalid format of user contact number.");
                }

                /*$icPre = test_input($_POST['icPre']);
                $icMid = test_input($_POST['icMid']);
                $icPost = test_input($_POST['icPost']);*/
                if (empty($_POST['icPre']) || empty($_POST['icMid']) || empty($_POST['icPost'])) {
                    $errorMessage .= $errorMesOpenStyle . "IC number is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty IC number.");
                }
                else if (!preg_match($validationNum, $_POST['icPre']) || !preg_match($validationNum, $_POST['icMid']) || !preg_match($validationNum, $_POST['icPost'])) {
                    $errorMessage .= $errorMesOpenStyle . "IC number only accepts numeric value." . $errorMesCloseStyle;
                    error_log($failedRegister . " invalid format of user contact number.");
                }

                if (empty($_POST['address'])) {
                    $errorMessage .= $errorMesOpenStyle . "Address is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty address.");
                }

                //$email = test_input($_POST['email']);
                if (empty($_POST['email'])) {
                    $errorMessage .= $errorMesOpenStyle . "Email address is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty email address.");
                }
                else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errorMessage .= $errorMesOpenStyle . "Invalid email address." . $errorMesCloseStyle;
                    error_log($failedRegister . " invalid format of user email address.");
                }

                /*$pw1 = test_input($_POST['PW']);
                $pw2 = test_input($_POST['rePW']);*/
                if (empty($_POST['PW']) || empty($_POST['rePW'])) {
                    $errorMessage .= $errorMesOpenStyle . "Password is a required field." . $errorMesCloseStyle;
                    error_log($failedRegister . " empty password.");
                }
                else if (strlen($_POST['PW']) < 6 ) {
                    $errorMessage .= $errorMesOpenStyle . "Password must be at least 6 characters." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is less than 6 characters.");
                }
                else if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $_POST['PW'])){
                    $errorMessage .= $errorMesOpenStyle . "Password must contain both numbers and letters." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is not secure enough.");
                }
                else if ($_POST['rePW'] != $_POST['PW']){
                    $errorMessage .= $errorMesOpenStyle . "Password entered must be match." . $errorMesCloseStyle;
                    error_log($failedRegister . " password entered is not match.");
                }


                if (strcmp($errorMessage, "") != 0){
                    echo $errorMessage; 
                }
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
                <b>Account Registration</b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm" method="post" action="registration.php">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" id="userName" value="<?php echo isset($_POST['userName']) ? $_POST['userName'] : '' ?>" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Date of Birth : </span>
                    <input type="text" name="day" id="day" value="<?php echo isset($_POST['day']) ? $_POST['day'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="month" id="month" value="<?php echo isset($_POST['month']) ? $_POST['month'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="year" id="year" value="<?php echo isset($_POST['year']) ? $_POST['year'] : '' ?>" size="20" placeholder="yyyy" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Contact No. : </span>
                    <input type="text" name="contactPre" value="+60" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="contactNo" id="contactNo" value="<?php echo isset($_POST['contactNo']) ? $_POST['contactNo'] : '' ?>" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Gender : </span>
                    <input type="radio" name="radGender" value="Male" checked="checked" /><span style="font-size: 15px;">Male</span>
                    &nbsp;
                    <input type="radio" name="radGender" value="Female" /><span style="font-size: 15px;">Female</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>IC No. : </span>
                    <input type="text" name="icPre" id="icPre" value="<?php echo isset($_POST['icPre']) ? $_POST['icPre'] : '' ?>" size="8" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icMid" id="icMid" value="<?php echo isset($_POST['icMid']) ? $_POST['icMid'] : '' ?>" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icPost" id="icPost" value="<?php echo isset($_POST['icPost']) ? $_POST['icPost'] : '' ?>" size="5" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Address : </span>
                    <textarea name="address" id="address" rows="6" cols="60"  >
                    </textarea>
                    <br /><br />
                    
                    <span class="lblRightStyle">Profile Picture : </span>
                    
                    <form action="" method="post" runat="server">
                    <input type="file" name="profileUpload" id="profileUpload" onchange="readURL(this);"/>
                    <div style="text-align: center">
                        <img id="proImg" src="#" width="150" height="180" alt="profile picture" style="border-style: solid; border-width: 1px; border-color: black;"/>
                    </div>
                    <br /><br />
                    </form>
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Email : </span>
                    <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Password : </span>
                    <input type="password" name="PW" id="PW" value="" size="20" />
                    <span style="font-size: 12px;">Password must have at least 6 characters long and contain numbers & letters.</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Re-enter Password : </span>
                    <input type="password" name="rePW" id="rePW" value="" size="20" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Register" name="action" class="loginStyle"/>
                    <br /><br />
                </div>
            </form>
        </div>

        <?php
        
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
            
                  $user_ID = '';
                  $user_name = trim($_POST['userName']);
                  $user_email = trim($_POST['email']);
                  $user_dob = trim($_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year']);
                  $user_address = trim($_POST['address']);
                  //Verify password & echo the value//
                  $user_contact = trim($_POST['contactNo']);
                  $user_pw = trim($_POST['rePW']);
                  $encrypt_pw = EncryptionRegister::oneWayHash($user_pw);
                  //$user_pic = "NULL";
                  
                  if(empty(file_get_contents($_POST['profileUpload']))){
                      $user_pic = 'NULL';
                  }
                  else 
                  {
                      $user_pic = file_get_contents($_POST['profileUpload']);
                  }
                 
                  $user_IC = trim($_POST['icPre'] . "-" . $_POST['icMid'] . "-" . $_POST['icPost']);
                  $user_role = "participant";


                  $db = UserDBConnection::getInstance($_SESSION["role"]);
                  $db->createAccount($user_ID, $user_name, $user_email, $user_dob, $user_address, $user_contact, $encrypt_pw, $user_pic, $user_IC, $user_role);
                  echo "<p>Registration successful!</p>";
                  echo "<a href='login.php'>Click to login page.</a>";
                  $db->closeConnection();


                }
        
        session_destroy();
        
      ?>
        
    </body>
</html>
