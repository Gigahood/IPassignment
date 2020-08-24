<?php
include('../MasterPage.php');
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
            $compID = $_SESSION["compID"];

            $compHistory = getHistoryDetail($compID, $_SESSION["role"]);

            echo "<h3>Edit " . $compHistory->getName() . " Competition History</h3>";
            ?>

            <?php
//                    do validation here
            if (isset($_POST["submit"])) {
                $error = "";
                $startDate = trim($_POST["startDate"]);
                $endDate = trim($_POST["endDate"]);
                $remark = trim($_POST["remark"]);
                $role = trim($_SESSION["role"]);
                $id = trim($_POST["history_ID"]);
                
                $error = validateEditHistoryInput($startDate, $endDate, $remark);
                
                if (empty($error)) {
                    updateHistory($startDate, $endDate, $remark, $role, $id);
                    header("Location: HistoryView.php");
                } else {
                    echo "<h1>$error</h1>";
                }
            }

            ?>


            <div class="formContainer">
                <form class="formStyle" method="POST" action="">
                    <label for="startDate">Start Date : </label>
                    <?php
                    echo "<input type=\"Date\" name=\"startDate\" value=\"" . date('Y-m-d', strtotime($compHistory->getHstart())) . "\" />";
//                    echo "<input id='hiddenButton' name'history_ID' type='hidden' value='" . $compHistory->getHistory_ID() . "'/>";
                    echo "<input id='hiddenButton' type=\"hidden\" name=\"history_ID\" value=\"" . $compHistory->getHistory_ID() . "\" />";
                    ?>
                    <br/>
                    <br/>
                    <label for="endDate">End Date : </label>
                    <?php
                    echo "<input type=\"Date\" name=\"endDate\" value=\"" . date('Y-m-d', strtotime($compHistory->getHend())) . "\" />"
                    ?>
                    <br/>
                    <br/>
                    <label for="remark">Remark : </label>
                    <?php
                    echo "<input type='text' name='remark' value='" . $compHistory->getRemark() . "' />";
                    ?>
                    <br/>
                    <br/>
                    <input id="addMatchButton" class="addMatchButton" type="button" value="Add New Match" name="addMatch" />
                    <br/>
                    <br/>
                    <input type="submit" value="OK" name="submit" />
                </form>
            </div>
            <div >
                <table width="100%" class="tableStyle" style='text-align:center;' border="1" >
                    <thead>
                    <th>Matches</th>
                    <th>Black</th>
                    <th>White</th>
                   
                    </thead>
                    <?php
                    foreach ($compHistory->getMatches() as $value) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>" .  getName($value["black_User"],$_SESSION["role"]) . " vs " . getName($value["white_User"] ,$_SESSION["role"]). "</td>";
                        echo "<td>" . getName($value["black_User"],$_SESSION["role"])  . "</td>";
                        echo "<td>" . getName($value["white_User"], $_SESSION["role"]) . "</td>";
       
                    }
                    
                    closeCon($_SESSION["role"]);
                    ?>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            let addMatchButton = document.getElementById("addMatchButton");
            let historyID = document.getElementById("hiddenButton").value;

            addMatchButton.addEventListener("click", function (e) {
                window.location.href = "addMatch.php?type=edit&id=" + historyID;
            });

        </script>
    </body>
</html>
