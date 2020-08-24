<?php
include('../MasterPage.html');
require '../../Controller/History/HistoryController.php';
require '../../Controller/History/HistoryXMLController.php';

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
        <link rel="stylesheet" type="text/css" href="../css/history.css">
    </head>
    <body>
        <div class="container">
            <div class="detailContainer">
                <?php
                $_SESSION["compID"] = 1;
                $_SESSION["role"] = "admin";
                $compID = $_SESSION["compID"];
                $compHistory = getHistoryDetail($compID, $_SESSION["role"]);

                echo "<h1> " . $compHistory->getName() . " Competition History</h1>";
                echo "<h3> Date : " . date('d/m/Y', strtotime($compHistory->getHstart())) . " - " . date('d/m/Y', strtotime($compHistory->getHend())) . "</h3>"
                ?>

                <?php
                if ($_SESSION["role"] == "admin") {
                    echo "<button onCLick=\"window.location='EditHistory.php?id=" . $_SESSION["compID"] . "'\">" . "Edit History</button>";
                }
                ?>
                
                <form method="POST">
                    <input type = "Submit" name = "xml" value = "PrintXML" />
                </form>
                
                <?php
                if(isset($_POST['xml'])) {
                    generateXML($compID, $_SESSION["role"]);
                }
                ?>
                
                <div>
                    <?php
                    echo "<div style='text-align:center;'> Description : " . $compHistory->getRemark() . "</div>";
                    echo "<br/>";
                    ?>
                </div>
                <div >
                    <table class="tableStyle" style='text-align:center;' border="1" >
                        <thead>
                        <th>Matches</th>
                        <th>Black</th>
                        <th>White</th>
                        <th>View Final Board</th>
                        </thead>

                        <?php
                        foreach ($compHistory->getMatches() as $value) {
                            echo "<tr>";
                            echo "<td style='text-align:center;'>" . getName($value["black_User"], $_SESSION["role"]) . " vs " . getName($value["white_User"], $_SESSION["role"]) . "</td>";
                            echo "<td>" . getName($value["black_User"], $_SESSION["role"]) . "</td>";
                            echo "<td>" . getName($value["white_User"], $_SESSION["role"]) . "</td>";

                            if ($_SESSION["role"] == "admin") {
                                echo "<td data-id='" . $value["match_ID"] . "'>"
                                . "<a style='margin-left: 5px;' class='detailLink' href='' data-link='" . $value["match_ID"] . "' data-href='ViewMatch.php' >Board</a>"
                                . "<a style='margin-left: 5px;' class='link' href='EditMatch.php' data-href='EditMatch.php'>Edit</a>"
                                . "<a style='margin-left: 5px;' class='link' href='HistoryDetail.php' data-href='ViewMatch.php'>Delete</a>"
                                . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<td data-id='" . $value["match_ID"] . "'>"
                                . "<a style='margin-left: 5px; class='link' href='' data-href='HistoryDetail.php' >Board</a>";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="resultListContainer">
                <p>Result : </p>
                <table class="tableStyle">
                    <thead>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                    </thead>
                    <?php
                    $listOfMatches = calculateHistoryScore($compHistory->getMatches());
                    $index = 1;

                    foreach ($listOfMatches as $match) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>" . $index . "</td>";
                        echo "<td style='text-align:center;'>" . getName($match["Name"], $_SESSION["role"]) . "</td>";
                        echo "<td style='text-align:center;'>" . $match["Score"] . "</td>";
                        $index += 1;
                    }

                    closeCon($_SESSION["role"]);
                    ?>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            var a = document.getElementsByClassName("link");

            for (let i = 0; i < a.length; i++) {
                a[i].addEventListener('click', function (e) {
                    e.preventDefault();
                    console.log(this.parentNode.getAttribute('data-id'));
                    console.log(this.getAttribute('data-href'));
                    window.location.href = this.getAttribute('data-href') + "?id="
                            + this.parentNode.getAttribute('data-id') + "";
                });
            }

            var b = document.getElementsByClassName("detailLink");

            for (let i = 0; i < b.length; i++) {
                b[i].addEventListener('click', function (e) {
                    e.preventDefault();
                    console.log(this.getAttribute('data-link'));
                    console.log(this.getAttribute('data-href'));
                    window.location.href = this.getAttribute('data-href') + "?id="
                            + this.getAttribute('data-link') + "";
                });
            }
        </script>

    </body>
</html>
