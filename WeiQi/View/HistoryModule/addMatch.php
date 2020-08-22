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
        <link rel="stylesheet" type="text/css" href="../css/addMatch.css">
    </head>
    <body>
        <div class="container">
            <h3>Add Match</h3>

            <div class="formContainer">
                <form class="formStyle" action="CreateHistoryAdmin.php" method="POST">
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
                        <textarea name="remark" rows="4" cols="20">
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
                    <p>Insert Moves</p>
                    <input type="reset" value="Reset" />
                    <input type="submit" value="Confirm" />
                </form>
            </div>
        </div>
    </body>
</html>
