<!DOCTYPE html>
<?php
//    require_once 'Authentication.php';
    include_once '../../Model/UserDBConnection.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
 * Login Webpage
 *
 * @author Chew Jane
 *-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="authCSS.css" />
    </head>
    <body>
        <div class="loginHeader">
            <img src="auth_image/nworldLogo.png" alt="N-World logo" width="200" style="width:25%; margin-left: auto; margin-right: auto; display: block;"/>
        </div>
        
        <form id="loginFormIn" action="login.php" method="post">
        <div class="loginForm">
            <hr color="white" />
            <center><img src="auth_image/leafLogoFit.jpg" alt="leaf" width="50" />&ensp;<b><span style="font-size: 35px;">Login</span></b></center>
            <hr width="90%" />
                <div class="paddingClass">
                    <b>Email</b>&emsp;&emsp;&nbsp;&nbsp;<input type="text" name="email" id="email" value="" size="30" />
                    <br/><br/>
                
                    <b>Password</b>&nbsp;&nbsp;<input type="password" name="PW" id="PW" value="" size="30" />
                    <br/><br/>
                </div>
                
            <input type="submit" value="Login" name="btnLogin" class="loginStyle"/>
            <br/>

            <a href="registration.php" style="text-decoration: none;"><span class="registerStyle">&#8592;  Don't have an account? Click here to register. &emsp;&emsp;</span></a>
            <!--<input type="submit" value="&#8592;  Don't have an account? Click here to register." name="btnRegister" class="registerStyle"/>-->
        </div>
        </form>
        
        <?php
        session_start();
        $_SESSION["role"] = "admin";
        
            // put your code here
        if(isset($_POST['email']) && isset($_POST['PW'])){
            $useremail = trim($_POST['email']);
            $userpw = trim($_POST['PW']);
            
            if((!$useremail) && (!$userpw)){
                echo '<p>Failed to log in' . '. You have not entered your login details.</p>';
                error_log("Failed to log in" . " due to empty user details.");
                //Find error log file in C:\xampp\apache\logs\error.txt
            exit;
            }

            $db = UserDBConnection::getInstance($_SESSION["role"]);

            $result = $db->retrieveUser($useremail, $userpw);
        
            if($result == null){
                //echo "Login Fail $useremail and $userpw<br/>";
                echo "Login Fail<br />";
                error_log("Failed to log in" . " due to email and password entered are not found in database.");
                exit;
            }
            else {
                //print_r($result);
                //print("\n");
                echo "<p>Login successful!</p>";
                $_SESSION["role"] = $result["user_role"];
            }
                
            $db->closeConnection();
        }
            
            session_destroy();
        ?>
    </body>
</html>
