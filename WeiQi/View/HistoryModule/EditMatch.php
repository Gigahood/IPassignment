<?php
include('../MasterPage.html');
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
        <link rel="stylesheet" type="text/css" href="../css/addMatch.css">
    </head>
    <body>

        <div class="container">
            <h3>Edit Match</h3>

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
                <form class="formStyle" action="EditMatch.php?id=1" method="post">
                    <label class="labelStyle" for="black">Black Player : </label>
                    <?php
                    echo "<input type='text' name='black' value='" . getName($match["black_User"], $_SESSION["role"]) . "' />";

                    echo "<input type='hidden' name='matchID' value='" . $match["match_ID"] . "' />";
                    ?>
                    <br/>
                    <br/>
                    <label class="labelStyle" for="blackScore">Black Score : </label>
                    <?php
                    echo "<input type='number' name='blackScore' value='" . $match["black_Score"] . "' />";
                    ?>
                    <br/>
                    <br/>
                    <label class="labelStyle" for="white">White Player : </label>
                    <?php
                    echo "<input type='text' name='white' value='" . getName($match["white_User"], $_SESSION["role"]) . "' />";
                    ?>
                    <br/>
                    <br/>
                    <label class="labelStyle" for="whiteScore">White Score : </label>
                    <?php
                    echo "<input type='number' name='whiteScore' value='" . $match["white_Score"] . "' />";
                    ?>
                    <br/>
                    <br/>
                    <div class="multilineStyle">
                        <label class="labelStyle" for="remark">Remark :  </label>
                        <?php
                        echo "<textarea name='remark' rows='4' cols='50' >"
                        . $match["match_Detail"] . "</textarea>";
                        ?>

                        </textarea>
                    </div>
                    <br/>
                    <br/>
                    <label class="labelStyle" for="startTime">Start Time : </label>
                    <?php
                    echo "<input type='time' name='startTime' value='" . $match["start_Time"] . "' />";
                    ?>

                    <br/>
                    <br/>
                    <label class="labelStyle" for="endTime">End Time : </label>
                    <?php
                    
                    echo "<input type='time' name='endTime' value='" . $match["end_Time"] . "' />";
                    ?>

                    <br/>
                    <br/>
                    <label class="labelStyle">Board Size : </label>
                    <select name="boardSize">
                        <?php
                        if ($match["board_Size"] == 13) {
                            echo "<option selected>13</option>";
                            echo "<option>16</option>";
                        } else {
                            echo "<option >13</option>";
                            echo "<option selected>16</option>";
                        }
                        ?>
                    </select>
                    <br/>
                    <br/>
                    <input type="reset" value="Reset" />
                    <input type="submit" name="submit" value="Confirm" />
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["submit"])) {
            // header("Location: HistoryView.php");
            $error = "";

            $black = trim($_POST["black"]);
            $white = trim($_POST["white"]);
            $wScore = trim($_POST["whiteScore"]);
            $bScore = trim($_POST["blackScore"]);
            $sTime = trim($_POST["startTime"]);
            $eTime = trim($_POST["endTime"]);
            $board = trim($_POST["boardSize"]);
            $remark = trim($_POST["remark"]);
            $matchID = trim($_POST["matchID"]);
            $dSession = $_SESSION["role"];

            $error = validateEditInput($black, $white, $wScore, $bScore, $sTime, $eTime, $board, $remark, $matchID, $_SESSION["role"]);

            // validation complete

            if (empty($error)) {

                $blackArray = getUserID($black, $dSession);
                $whiteArray = getUserID($white, $dSession);

                foreach ($blackArray as $value) {
                    $blackID = $value;
                }

                foreach ($whiteArray as $value) {
                    $whiteID = $value;
                }

                update($blackID, $whiteID, $wScore, $bScore, $remark, $sTime,
                        $eTime, $board, $_SESSION["role"], $matchID);

                header("Location: HistoryView.php");
                echo "no error";
            } else {
                echo "<h3>$error</h3>";
            }
        }
        closeCon($_SESSION["role"]);
        ?>

    </body>
</html>
