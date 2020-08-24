<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../../Model/StoreDBConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <?php
        // put your code here
        session_start();
        $_SESSION["role"] = "admin";
        
        print_r($_GET["id"]);

        $db = StoreDBConnection::getInstance($_SESSION["role"]);
        
        $delete = $db->deleteItem($_GET["id"]);
        
        echo "<scrpit>alert('Recorde deleted from database.')</scrpit>";
        ?>
        <meta http-equiv="Refresh" content="0; URL= http://localhost/IPassignment/WeiQi/View/Store/ProductDetails.php?id=
            <?php.$_GET["id"].?>">
        <?PHP $db->closeConnection(); ?>
    </body>
</html>
