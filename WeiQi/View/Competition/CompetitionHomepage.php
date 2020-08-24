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
            
            <div style="font-size: 20px;">
                Competition Name : 
                
                <!--Options need to bind from DB by concatenate(combine)competition name & year -->
                <!--<select name="ddlCompetitionName">
                    <option value="01">WeiQi Middle Class Match (2016)</option>
                    <option value="02">WeiQi Student Grade 2 Exam (2017)</option>
                </select>-->
                
                <?php
                session_start();
                $_SESSION["role"] = "admin";
                
                $compName = "";
                
                $db = CompetitionDBConnection::getInstance($_SESSION["role"]);
                $result = $db->retrieveCompetition();
                print_r($result);
                //$str = "<table> ";
                        
                //echo $result;
                //echo $str;
                $db = null;
                ?>
            </div>
            <br /><br /><br /><br /><br />
            
            <div>
                <a href="NewCompetition.php">
                    <input type="submit" value="ADD NEW COMPETITION" name="btnAddComp" class="btnStyle" style="background-color: yellow;"/>
                </a>
                &emsp;&emsp;&emsp;
                <input type="submit" value="COMPETITION DETAIL" name="btnCompDet" class="btnStyle" style="background-color: red;"/>
            </div>
        </div>

        <?php
        // put your code here
        
        
        
        
        
        
        
         
        
        ?>
    </body>
</html>
