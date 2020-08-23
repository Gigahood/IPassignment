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
                    <label class="labelStyle" for="black">Black : </label>
                    <?php
                    echo "<input type='text' name='black' value='" . $match["black_User"] . "' />";

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
                    <label class="labelStyle" for="white">White : </label>
                    <?php
                    echo "<input type='text' name='white' value='" . $match["white_User"] . "' />";
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
                    <p>Insert Moves</p>
                    <input type="reset" value="Reset" />
                    <input type="submit" name="submit" value="Confirm" />
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["submit"])) {
            // header("Location: HistoryView.php");
            $error;
            $black = $_POST["black"];
            $white = $_POST["white"];
            $wScore = $_POST["whiteScore"];
            $bScore = $_POST["blackScore"];
            $sTime = $_POST["startTime"];
            $eTime = $_POST["endTime"];
            $board = $_POST["boardSize"];
            $remark = $_POST["remark"];
            $matchID = $_POST["matchID"];

            // validation complete

            if (empty($error)) {
                update($black, $white, $wScore, $bScore, $remark, $sTime,
                        $eTime, $board, $_SESSION["role"], $matchID);
                
                header("Location: HistoryView.php");
            }
        }
        closeCon($_SESSION["role"]);
        ?>

    </body>
</html>
