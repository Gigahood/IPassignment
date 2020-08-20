<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="authCSS.css" />
    </head>
    <body>
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
            
            <form id="registerForm">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="" size="80" readonly="readonly" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Contact No. : </span>
                    <input type="text" name="contactPre" value="+60" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="contactNo" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Gender : </span>
                    <input type="radio" name="radGender" value="Male" checked="checked" /><span style="font-size: 15px;">Male</span>
                    &nbsp;
                    <input type="radio" name="radGender" value="Female" /><span style="font-size: 15px;">Female</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Address : </span>
                    <textarea name="address" rows="6" cols="60">
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
                    <input type="text" name="email" value="" size="30" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Update" name="action" class="loginStyle"/>
                    <br /><br />
                </div>
            </form>
        </div>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
