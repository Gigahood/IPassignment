<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once '../../Model/UserDBConnection.php';
?>
<html>
    <head>
        <title>N-World</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
    </head>
    <body>
        <div class="headerContainer">
            <div class="topContainer">
                <div class="headerLogo">
                    N - W
                    <img class="logo" src="../image/nWorldLogoNoBG.png" style="height:60px; vertical-align: middle; "/>
                    RLD
                </div>
                <div class="headerLink">
                    <a href="../Competition/CompetitivePage.php">Home</a>
                    <a href="../Store/StorePage.php">Store</a>
                    <a href="../Competition/CompetitivePage.php">Competition Info</a>
                </div>
            </div>
            <div class="userNameContainer">
                <div class="profilePic">
                    <!--<a href="UserManagement/updateProfile.php"> <img src="../image/user.svg" alt="profilePicture" height="30"/></a>-->
                    <?php 
                        session_start();
                        $_SESSION["role"] = "student";
                        
                        $db = UserDBConnection::getInstance($_SESSION["role"]);
                        $result = $db->viewProfile();
  
                        if($result == null){
                            echo '<a href="../UserManagement/updateProfile.php"> <img src="../image/user.svg" alt="profilePicture" height="50"/></a>';
                        }
                        else {
                            echo '<a href="../UserManagement/updateProfile.php"><img src="data:image/jpeg;base64,'.base64_encode( $result['user_pic'] ).'" alt="profilePicture" height="50"/></a>';
                        }
                    ?>
                </div>
                <div class="profileName">
                    <!--User Name-->
                    <?php
                        //session_start();

                        $db = UserDBConnection::getInstance($_SESSION["role"]);
                        $result = $db->viewProfile();
  
                        if($result == null){
                            echo '<a href="../UserManagement/updateProfile.php"  style="text-decoration: none; color: white;">User Name</a>';
                            
                        }
                        else {
                            echo '<a href="../UserManagement/updateProfile.php"  style="text-decoration: none; color: white;">' . $result['user_name'] . '</a>';
                                    
                        }
                        
                        /*$tryGetName = $_SESSION["userNameSS"];
                        if(empty($tryGetName)){
                            echo "User Name";
                        }
                        else {
                            echo $tryGetName;
                        }*/
                        
                        unset($_SESSION["role"]);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
