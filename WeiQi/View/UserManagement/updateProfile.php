
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--
 * Update profile Webpage
 *
 * @author Chew Jane
 *-->

<?php
    include_once '../../Model/UserDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Profile</title>
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
        <!-- Update profile to another branch-->
    </head>
    <body>
        <?php 
            session_start();
            $_SESSION["role"] = "student";
                        
            if ($_SERVER["REQUEST_METHOD"] != "POST"){
                $db = UserDBConnection::getInstance($_SESSION["role"]);
                $result = $db->viewProfile();

                if($result == null){
                    echo 'Error. Please log in to your account first. <br />';
                    echo "<a href='login.php'>Click to go to login page</a>";
                }
                else {
                    $nameGet = $result['user_name'];
                    $contactGet = $result['user_contact'];
                    $addressGet = $result['user_address'];
                    //$picGet = '<img src="data:image/jpeg;base64,'.base64_encode( $result['user_pic'] ).'" alt="profilePicture" height="120"/>';
                    $emailGet = $result['user_email'];
                    
                    $IDget = $result['user_ID'];
                    $_SESSION["userID"] = $IDget;
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
                <b>Update Own Profile</b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm" method="post" action="updateProfile.php">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="
                        <?php echo (isset($nameGet)) ? $nameGet: ''?>" size="80" readonly="readonly" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Contact No. : </span>
                    <input type="text" name="contactPre" value="+60" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="contactNo" value="<?php echo (isset($contactGet)) ? $contactGet: '' ?>" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Address : </span>
                    <textarea name="address" rows="6" cols="60">
                        <?php echo (isset($addressGet)) ? $addressGet: '' ?>
                    </textarea>
                    <br /><br />
                    
                    <!--<span class="lblRightStyle"><span style="color: red;">* </span>Profile Picture : </span>
                    <input type="file" name="profileUpload" id="profileUpload" onchange="readURL(this);"/>
                    <br /><br />
                    <div style="text-align: center">-->
                        <?php /*echo (isset($picGet)) ? $picGet: ''*/ ?>
                        
                   <!--     &emsp;  &emsp;
                        <img id="proImg" src="#" width="150" height="180" alt="profile picture" style="border-style: solid; border-width: 1px; border-color: black;"/>
                        
                    </div>
                    <br /><br />-->
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Email : </span>
                    <input type="text" name="email" value="<?php echo (isset($emailGet)) ? $emailGet: '' ?>" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle">User Privilege : </span>
                    <?php 
                        $dbPri = UserDBConnection::getInstance($_SESSION["role"]);
                        $resultPri = $dbPri->displayPrivilege(); 
                        echo $resultPri->privilege();
                        $dbPri->closeConnection();
                    ?>
                    <br /><br /><br />
                    

                    <input type="submit" value="Update" name="action" class="loginStyle"/>
                    <br /><br />
                    <a href="updatePassword.php">Click here to update your password.</a>
            
                    
                </div>
            </form>
        </div>
        
        <?php
        // put your code here
        //session_start();
            //$_SESSION["role"] = "student";
            
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

              $user_email = trim($_POST['email']);
              $user_address = trim($_POST['address']);
              $user_contact = trim($_POST['contactNo']);
              //$user_pic = file_get_contents($_POST['profileUpload']);

              $db = UserDBConnection::getInstance($_SESSION["role"]);
              $db->updateProfile($user_email, $user_address, $user_contact);
              echo "<p>Updated successful!</p>";
               echo "<a href='login.php'>Click to login to your user account.</a>";
              $db->closeConnection();

            }

            //session_destroy();
            unset($_SESSION["role"]);
            //unset($_SESSION["userID"]);

        ?>
    </body>
</html>