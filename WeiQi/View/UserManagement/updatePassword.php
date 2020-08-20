<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Password</title>
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
                <b>Update Own Password</b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="" size="80" readonly="readonly" />
                    <br /><br />

                    <span class="lblRightStyle"><span style="color: red;">* </span>Current Password : </span>
                    <input type="password" name="currentPW" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>New Password : </span>
                    <input type="password" name="newPW" value="" size="20" />
                    <span style="font-size: 12px;">Password must have at least 6 characters long.</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Re-enter Password : </span>
                    <input type="password" name="rePW" value="" size="20" />
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
