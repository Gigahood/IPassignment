<?php
include('../MasterPage.html');
?>

<!DOCTYPE html>
<!-- 
 * Description of Authentication
 *
 * @author Kuek Yong Boon
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/addHistory.css">
    </head>
    <body>
        <div class="container">
            <h3>Create xxx Competition History</h3>
            
            <div class="formContainer">
                <form class="formStyle" method="POST">
                <label for="startTime">Start Time : </label>
                <input type="text" name="startTime" value="" />
                <br/>
                <br/>
                <label for="startTime">End Time : </label>
                <input type="text" name="endTime" value="" />
                <br/>
                <br/>
                <input class="addMatchButton" type="button" value="Add New Match" name="addMatch" />
                <p>history data area</p>
                <input type="submit" value="OK" name="submit" />
            </form>
            </div>
            
        </div>
    </body>
</html>
