<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
 * Competition Homepage Webpage
 *
 * @author Cheng Qing Xiang
 *-->
<?php
include '../MasterPage.php';
include_once '../../Model/CompetitionDBConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Competition Information</title>
        <link rel="stylesheet" type="text/css" href="compCSS.css" />
    </head>
    <body>
        <div style="text-align: center;">
            <h1>Search Competition</h1>
            <br /><br /><br />

            <!--            <button  onclick="ajaxFunction()">BUTTON</button>-->

            <div>
                <?php
                $db = CompetitionDBConnection::getInstance("admin");
                $result = $db->retrieveCompetition();

                $str = " <select id='ddID' onchange=\"getData()\">";

                foreach ($result as $row) {
                    $str .= "<option value='" . $row["competition_name"] . "'>" . $row["competition_name"] . "</option>";
                }

                $str .= "</select>";

                echo $str;
                ?>


            </div>

            <div id="printID"  style="font-size: 20px;">
                Competition Name : 

                <!--Options need to bind from DB by concatenate(combine)competition name & year -->
                <!--<select name="ddlCompetitionName">
                    <option value="01">WeiQi Middle Class Match (2016)</option>
                    <option value="02">WeiQi Student Grade 2 Exam (2017)</option>
                </select>-->

                <?php
//                session_start();
                $_SESSION["role"] = "admin";

                echo "<input type='hidden' id='role' value='". $_SESSION["role"] ."'/>"
                ?>
            </div>
            <br /><br /><br /><br /><br />

            <div>
                <a href="NewCompetition.php">
                    <input type="submit" value="ADD NEW COMPETITION" name="btnAddComp" class="btnStyle" style="background-color: yellow;"/>
                </a>
                &emsp;&emsp;&emsp;
                <input id="btnSub" type="submit" value="COMPETITION DETAIL" name="btnCompDet" class="btnStyle" style="background-color: red;"/>
            </div>
        </div>

        <script language = "javascript" type = "text/javascript">
            //Browser Support Code
            
            function getData() {
              ajaxFunction();
            }
            
            function ajaxFunction() {
                var ajaxRequest;  // The variable that makes Ajax possible!
 

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {

                }

                // Create a function that will receive data 
                // sent from the server and will update
                // div section in the same page.

                ajaxRequest.onreadystatechange = function () {
                    if (ajaxRequest.readyState === 4) {
                        var ajaxDisplay = document.getElementById('printID');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    }
                };



                var gender = document.getElementById('ddID').value;

                var params = "name=" + gender;

                ajaxRequest.open("POST", "AJAX.php", true);
                ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajaxRequest.send(params);
            }
            
            document.getElementById("btnSub").addEventListener("click", function(e){
                let valid = document.getElementById("valid").value;
                let id = document.getElementById("compID").getAttribute('data-id');;
                
                if (valid === "true"){
                    window.location.href = "../HistoryModule/HistoryView.php?from=comp&id=" + id;
                }else {
                    window.location.href = "../HistoryModule/CreateHistoryAdmin.php?from=comp&id=" + id;
                }
            })
        </script>
    </body>
</html>
