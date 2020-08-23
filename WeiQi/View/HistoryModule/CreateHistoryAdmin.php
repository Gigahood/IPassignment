<?php
include('../MasterPage.html');
require '../../Controller/History/HistoryController.php';

session_start();
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
            <?php
            $_SESSION["compID"] = 6;
            $compID = $_SESSION["compID"];
            $_SESSION["role"] = "admin";

            $compHistory = getHistoryDetail($compID, $_SESSION["role"]);
            
            echo "<h3>Create " . $compHistory->getName() . " Competition History</h3>";
            ?>
            <div class="formContainer">
                <form class="formStyle" method="POST" action="">
                    <label for="startDate">Start Date : </label>
                    <input type="Date" name="startDate" value="" />
                    <?php
                   
                     echo "<input id='hiddenButton' type=\"hidden\" name=\"history_ID\" value=\"" .  $compHistory->getHistory_ID() . "\" />";
                    
                    ?>
                    <br/>
                    <br/>
                    <label for="endDate">End Date : </label>
                    <input type="Date" name="endDate" value="" />
                  
                    <br/>
                    <br/>
                    <label for="remark">Remark : </label>
                    <input type="text" name="remark" value="" />
                  
                    <br/>
                    <br/>
<!--                    <input id="addMatchButton" class="addMatchButton" type="button" value="Add New Match" name="addMatch" />
                    <br/>
                    <br/>-->
                    <input type="submit" value="OK" name="submit" />
                </form>
                
                 <?php
//                    do validation here
                    if (isset($_POST["submit"])) {
                        $error;
                        $startDate = $_POST["startDate"];
                        $endDate = $_POST["endDate"];
                        $remark = $_POST["remark"];
                        $role = $_SESSION["role"];
                        $id = $compID;
                        createHistory($id, $startDate, $endDate, $remark, $role);
                        
                        if (empty($error)) {
                            header("Location: HistoryView.php");
                        }
                        
                    }
                    
                    closeCon($_SESSION["role"]);
                    ?>
            </div>
<!--            <div >
                <table width="100%" class="tableStyle" style='text-align:center;' border="1" >
                    <thead>
                    <th>Matches</th>
                    <th>Black</th>
                    <th>White</th>
                    <th>View Final Board</th>
                    </thead>


                   
                </table>
            </div>-->
        </div>

        <script type="text/javascript">
            let addMatchButton = document.getElementById("addMatchButton");
            let historyID = document.getElementById("hiddenButton").value;

            addMatchButton.addEventListener("click", function (e) {
                window.location.href = "addMatch.php?type=add&id=" + historyID;
            });

        </script>
    </body>
</html>
