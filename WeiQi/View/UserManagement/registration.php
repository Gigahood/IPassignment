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
    </head>
    <body>
        <?php
        if ((!isset($_POST['email'])) || !isset($_POST['PW'])) {
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
                    <input type="text" name="userName" id="userName" value="" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Date of Birth : </span>
                    <input type="text" name="day" id="day" value="" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="month" id="month" value="" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="year" id="year" value="" size="20" placeholder="yyyy" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Contact No. : </span>
                    <input type="text" name="contactPre" value="+60" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="contactNo" id="contactNo" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Gender : </span>
                    <input type="radio" name="radGender" value="Male" checked="checked" /><span style="font-size: 15px;">Male</span>
                    &nbsp;
                    <input type="radio" name="radGender" value="Female" /><span style="font-size: 15px;">Female</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>IC No. : </span>
                    <input type="text" name="icPre" id="icPre" value="" size="8" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icMid" id="icMid" value="" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icPost" id="icPost" value="" size="5" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Address : </span>
                    <textarea name="address" id="address" rows="6" cols="60">
                    </textarea>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Profile Picture : </span>
                    <img src="<?php echo $_GET['filename']; ?>" width="150" height="180" alt="profile picture" style="border-style: solid; border-width: 1px; border-color: black;"/>
                    &nbsp;
                    <input type="file" name="profileUpload" id="profileUpload"/>
                    <br /><br />
                    <div style="text-align: center">
                        <input type="submit" value="Preview" name="action" />
                    </div>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Email : </span>
                    <input type="text" name="email" id="email" value="" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Password : </span>
                    <input type="password" name="PW" id="PW" value="" size="20" />
                    <span style="font-size: 12px;">Password must have at least 6 characters long.</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Re-enter Password : </span>
                    <input type="password" name="rePW" id="rePW" value="" size="20" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Register" name="action" class="loginStyle"/>
                    <br /><br />
                </div>
            </form>
        </div>
        
        <!--NOT WORK -->
        <?php
        // put your code here
        /*if($_POST['action'] == 'Preview')
        { 
            $filepath = "images/" . $_FILES["file"]["name"];

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
            {
                //echo "<img src=".$filepath." height=200 width=300 />";
                $filename = ".$filepath.";
            } 
            else 
            {
                echo "Error !!";
            }
        }*/ 
        
        } else {
          $user_ID = '';
          $user_name = trim($_POST['userName']);
          $user_email = trim($_POST['email']);
          $user_dob = trim($_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year']);
          $user_address = trim($_POST['address']);
          $user_contact = trim("0" . $_POST['contactNo']);
          $user_pw = trim($_POST['rePW']);
          $user_pic = "NULL";
          //$user_pic = trim($_POST['profileUpload'];
          $user_IC = trim($_POST['icPre'] . "-" . $_POST['icMid'] . "-" . $_POST['icPost']);
          $user_role = "participant";
          
          
          $db = UserDBConnection::getInstance("participant");
          $db->createAccount($user_ID, $user_name, $user_email, $user_dob, $user_address, $user_contact, $user_pw, $user_pic, $user_IC, $user_role);
          echo "<p>Registration successful!</p>";
          $db->closeConnection();
        }
      ?>
        
    </body>
</html>
