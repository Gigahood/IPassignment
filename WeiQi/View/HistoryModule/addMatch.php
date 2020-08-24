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
        <link rel="stylesheet" type="text/css" href="../css/addMatch.css">
    </head>
    <body>
        <div class="container">
            <h3>Add Match</h3>

            <div class="formContainer">

                <?php
                echo "<form class=\"formStyle\" action=\"addMatch.php?type=" . $_GET["type"] . "&id=" . $_GET["id"] . "\" method=\"POST\">"
                ?>
                <label class="labelStyle" for="black">Black : </label>
                <input type="text" name="black" value="" />
                <br/>
                <br/>
                <label class="labelStyle" for="blackScore">Black Score : </label>
                <input type="text" name="blackScore" value="" />
                <br/>
                <br/>
                <label class="labelStyle" for="white">White : </label>
                <input type="text" name="white" value="" />
                <br/>
                <br/>
                <label class="labelStyle" for="whiteScore">White Score : </label>
                <input type="text" name="whiteScore" value="" />
                <br/>
                <br/>
                <div class="multilineStyle">
                    <label class="labelStyle" for="remark">Remark :  </label>
                    <textarea name="remark" rows="4" cols="50">
                    </textarea>
                </div>
                <br/>
                <br/>
                <label class="labelStyle" for="startTime">Start Time : </label>
                <input type="time" name="startTime" value="" />
                <br/>
                <br/>
                <label class="labelStyle" for="endTime">End Time : </label>
                <input type="time" name="endTime" value="" />
                <br/>
                <br/>
                <label class="labelStyle">Board Size : </label>
                <select name="boardSize">
                    <option>13</option>
                    <option>16</option>
                </select>
                <br/>
                <br/>
                <input type="reset" value="Reset" />
                <input type="submit" name="submit" value="Confirm" />
                </form>
            </div>

            <?php
            session_start();
            $_SESSION["role"] = "admin";

//            if ($role != "admin") {
//                header("Location: HistoryView.php");
//            }

            $role = $_SESSION["role"];
            $historyId = $_GET["id"];

            if (isset($_POST["submit"])) {

                // if validation return true;
                $black = trim($_POST["black"]);
                $white = trim($_POST["white"]);
                $wScore = trim($_POST["whiteScore"]);
                $bScore = trim($_POST["blackScore"]);
                $sTime = trim($_POST["startTime"]);
                $eTime = trim($_POST["endTime"]);
                $board = trim($_POST["boardSize"]);
                $remark = trim($_POST["remark"]);
                $dSession = trim($_SESSION["role"]);

                // if success
                $error = validateEditInput($black, $white, $wScore, $bScore, $sTime, $eTime, $board, $remark, "", $dSession);

//                $error = "1";
//
//                echo "$white";
//
//                $whiteID = getUserID($white, $dSession);
//
//                foreach ($whiteID as $value) {
//                    print_r($value);
//                }

                if (empty($error)) {

                    $blackArray = getUserID($black, $dSession);
                    $whiteArray = getUserID($white, $dSession);

                    foreach ($blackArray as $value) {
                        $blackID = $value;
                    }

                    foreach ($whiteArray as $value) {
                        $whiteID = $value;
                    }
                    
                    createHistoryMatch($blackID, $whiteID, $wScore, $bScore, $remark, $sTime,
                            $eTime, $board, $role, $historyId);
                    if ($_GET["type"] == "edit") {
                        header("Location: EditHistory.php");
                    } else {
                        header("Location: CreateHistoryAdmin.php");
                    }
                } else {
                    echo "<h3>$error</h3>";
                }
            }
            ?>

        </div>
    </body>
</html>
