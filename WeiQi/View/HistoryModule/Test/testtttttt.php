<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <form method="POST">
            <input type="file" name="file" />
            <input type="submit" name="submit" value="submit" />
        </form>
        
        <?php
            if(isset($_POST['submit'])) {
                print_r($_POST);
            }else {
                echo "no";
                
            }
        
        ?>

    </body>
</html>
