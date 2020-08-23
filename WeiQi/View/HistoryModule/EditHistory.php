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
            $compID = $_SESSION["compID"];

            $compHistory = getHistoryDetail($compID, $_SESSION["role"]);
            


            echo "<h3>Edit " . $compHistory->getName() . " Competition History</h3>";
            ?>


            <div class="formContainer">
                <form class="formStyle" method="POST" action="EditHistory.php">
                    <label for="startDate">Start Date : </label>
                    <?php
                    echo "<input type=\"Date\" name=\"startDate\" value=\"" . date('Y-m-d', strtotime($compHistory->getHstart())) . "\" />";
//                    echo "<input id='hiddenButton' name'history_ID' type='hidden' value='" . $compHistory->getHistory_ID() . "'/>";
                     echo "<input id='hiddenButton' type=\"hidden\" name=\"history_ID\" value=\"" .  $compHistory->getHistory_ID() . "\" />";
                    
                    ?>
                    <br/>
                    <br/>
                    <label for="endDate">End Date : </label>
                    <?php
                    echo "<input type=\"Date\" name=\"endDate\" value=\"" . date('Y-m-d', strtotime($compHistory->getHstart())) . "\" />"
                    ?>
                    <br/>
                    <br/>
                    <label for="remark">Remark : </label>
                     <label for="remark2">Remark : </label>
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
                    <th>View Final Board</th>
                    </thead>
                    <?php
                    foreach ($compHistory->getMatches() as $value) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>" . $value["black_User"] . " vs " . $value["white_User"] . "</td>";
                        echo "<td>" . $value["black_User"] . "</td>";
                        echo "<td>" . $value["white_User"] . "</td>";

                        if ($_SESSION["role"] == "admin") {
                            echo "<td data-id='" . $value["match_ID"] . "'>"
                            . "<a style='margin-left: 5px; class='link' href='' data-href='HistoryDetail.php' >Board</a>"
                            . "<a style='margin-left: 5px;' class='link' href='EditMatch.php' data-href='EditMatch.php'>Edit</a>"
                            . "<a style='margin-left: 5px; class='link' href='HistoryDetail.php' data-href='HistoryDetail.php'>Delete</a>"
                            . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<td data-id='" . $value["match_ID"] . "'>"
                            . "<a style='margin-left: 5px; class='link' href='' data-href='HistoryDetail.php' >Board</a>";
                        }
                    }
                    ?>

                    <?php
//                    do validation here
                    if (isset($_POST["submit"])) {
                        $error;
                        $startDate = $_POST["startDate"];
                        $endDate = $_POST["endDate"];
                        $remark = $_POST["remark"];
                        $role = $_SESSION["role"];
                        $id = $_POST["history_ID"];
                        updateHistory($startDate, $endDate, $remark, $role, $id);
                        
                        if (empty($error)) {
                            header("Location: HistoryView.php");
                        }
                        
                    }
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
