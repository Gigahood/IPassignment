<?php
include('../MasterPage.php');
require '../../Controller/History/HistoryController.php';
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
        <link rel="stylesheet" type="text/css" href="../css/viewMatch.css">
    </head>
    <body>

        <div class="container">
            <h3>View Match</h3>

            <?php
            session_start();
            $_SESSION["role"] = "admin";
            $_SESSION["id"] = $_SESSION["compID"];

            if (!isset($_SESSION["compID"])) {
                header("Location: HistoryView.php");
            } else {
                $match = getMatch($_GET["id"], $_SESSION["role"]);
            }
            ?>

            <div class="formContainer">
                <div>
                    <p class="text">Black Player : 
                        <?php
                        echo getName($match["black_User"],$_SESSION["role"]);
                        ?>
                    </p>
                    <p class="text">Black Player Score :
                        <?php
                        echo $match["black_Score"];
                        ?>
                    </p>
                    <p class="text">White Player : 
                        <?php
                        echo getName($match["white_User"],$_SESSION["role"]);
                        ?>
                    </p>
                    <p class="text">White Player Score : 
                        <?php
                        echo $match["white_Score"];
                        ?></p>
                    <p class="text">Match Remark : 
                        <?php
                        echo $match["match_Detail"];
                        ?> </p>
                    <p class="text">Start Time : 
                        <?php
                        echo $match["start_Time"];
                        ?> </p>
                    <p class="text">End Time :  
                        <?php
                        echo $match["end_Time"];
                        ?></p>
                    <p class="text">Board Size :  
                        <?php
                        echo $match["board_Size"];
                        ?></p>
                </div>
                <button onclick="navigate()">Back</button>
            </div>
        </div>

        <script type="text/javascript">
        function navigate() {
            window.location.href = "HistoryView.php";
        }
        </script>
    </body>
</html>
