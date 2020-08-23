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
            <h3>Add Match</h3>

            <div class="formContainer">
                
                <?php
                echo "<form class=\"formStyle\" action=\"addMatch.php?type=". $_GET["type"]. "&id=". $_GET["id"] ."\" method=\"POST\">"
                
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
            $role = $_SESSION["role"];
            $historyId = $_GET["id"];

            if (isset($_POST["submit"])) {

                // if validation return true;
                $black = $_POST["black"];
                $white = $_POST["white"];
                $wScore = $_POST["whiteScore"];
                $bScore = $_POST["blackScore"];
                $sTime = $_POST["startTime"];
                $eTime = $_POST["endTime"];
                $board = $_POST["boardSize"];
                $remark = $_POST["remark"];

                
                try{
                    createHistoryMatch($black, $white, $wScore, $bScore, $remark, $sTime,
                        $eTime, $board, $role, $historyId);
                } catch (Exception $ex) {
                       echo "error occur";
                }
                // if success

                if ($_GET["type"] == "edit") {
                    header("Location: EditHistory.php");
                } else {
                    header("Location: CreateHistoryAdmin.php");
                }
            }
            ?>

        </div>
    </body>
</html>
