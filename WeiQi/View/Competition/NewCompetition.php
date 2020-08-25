<!--
 * New Competition Webpage
 *
 * @author Cheng Qing Xiang
 *-->
<?php
    include_once '../../Model/CompetitionDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>New Competition Registration</title>
        <link rel="stylesheet" type="text/css" href="compCSS.css" />
    </head>
    <body>
        
        <?php
            session_start();
            $_SESSION["role"] = "guest";
            ?>
        <div id="registerFormStyle">
            <div>
                <img src="comp_image/nworldLogo.png" alt="N-World logo" style="width: 30%; margin-left: auto; margin-right: auto; display: block;"/>
            </div>
            <br /><br />
            
            <div style="font-size: 25px; font-family: Arial;">
                &emsp;
                <img src="comp_image/leafNoBG.png" alt="N-World logo" width="200" style="width:3%; "/>
                <b>Competition Registration </b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm" method="post" action="NewCompetition.php" >
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="compName" value="<?php echo isset($_POST['compDay']) ? $_POST['compDay'] : '' ?>" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Start Date : </span>
                    <input type="text" name="startDay" id="startDay" value="<?php echo isset($_POST['startDay']) ? $_POST['startDay'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="startMonth" id="startMonth" value="<?php echo isset($_POST['startMonth']) ? $_POST['startMonth'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="startYear" id="startYear" value="<?php echo isset($_POST['startYear']) ? $_POST['startYear'] : '' ?>" size="20" placeholder="yyyy" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>End Date : </span>
                    <input type="text" name="endDay" id="endDay" value="<?php echo isset($_POST['endDay']) ? $_POST['endDay'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="endMonth" id="endMonth" value="<?php echo isset($_POST['endMonth']) ? $_POST['endMonth'] : '' ?>" size="2" placeholder="00" />
                    &nbsp;/&nbsp;
                    <input type="text" name="endYear" id="endYear" value="<?php echo isset($_POST['endYear']) ? $_POST['endYear'] : '' ?>" size="20" placeholder="yyyy" />
                    <br /><br />
                    
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Venue : </span>
                    <input type="text" name="venue" value="<?php echo isset($_POST['venue']) ? $_POST['venue'] : '' ?>" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Person In Charge (PIC)*Staff ID only* : </span>
                    <input type="text" name="PIC" value="<?php echo isset($_POST['PIC']) ? $_POST['PIC'] : '' ?>" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Registration Fee (RM) : </span>
                    <input type="text" name="regFeePre" value="<?php echo isset($_POST['regFeePre']) ? $_POST['regFeePre'] : '' ?>" size="5" />
                    &nbsp;.&nbsp;
                    <input type="text" name="regFeePost" value="00" size="2" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Prize Pool (RM) : </span>&nbsp;
                    1. <input type="text" name="firstPrize" value="<?php echo isset($_POST['firstPrize']) ? $_POST['firstPrize'] : '' ?>" size="30" />
                    <br /><span style='padding-left: 30%;'></span>&nbsp;
                    2. <input type="text" name="secondPrize" value="<?php echo isset($_POST['secondPrize']) ? $_POST['secondPrize'] : '' ?>" size="30" />
                    <br /><span style='padding-left: 30%;'></span>&nbsp;
                    3. <input type="text" name="thirdPrize" value="<?php echo isset($_POST['thirdPrize']) ? $_POST['thirdPrize'] : '' ?>" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Maximum Participant : </span>
                    <input type="number" name="maxParticipant" id="maxParticipant" value="<?php echo isset($_POST['maxParticipant']) ? $_POST['maxParticipant'] : '' ?>" size="10" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Create" name="action" class="createStyle" style='background-color: red; margin-left: auto; margin-right: auto; display: block;'/>
                    
                    <br /><br />
                </div>
            </form>
        </div>
        
        <?php
        
                if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            
         
                  
                  $competition_ID = '';
                  $competition_year = trim($_POST['endYear']);
                  $competition_name = trim($_POST['compName']);
                  $competition_start_date = trim($_POST['startYear'] . "/" . $_POST['startMonth'] . "/" . $_POST['startDay']);
                  $competition_end_date = trim($_POST['endYear'] . "/" . $_POST['endMonth'] . "/" . $_POST['endDay']);
                  $competition_venue = trim($_POST['venue']);
                  $competition_reg_fee = trim($_POST['regFeePre'] . "." . $_POST['regFeePost']);
                  $competition_PIC = trim($_POST['PIC']);
                  $competition_prize_pool = trim($_POST['firstPrize']) . "\r\n" . trim($_POST['secondPrize'] . "\r\n" . trim($_POST['thirdPrize']));
                  $competition_total_participate = trim($_POST['maxParticipant']);

                  $db = CompetitionDBConnection::getInstance($_SESSION["role"]);
                  $db->createCompetition($competition_ID, $competition_year, $competition_name, $competition_start_date, $competition_end_date, 
                          $competition_venue, $competition_reg_fee, $competition_PIC, $competition_prize_pool, $competition_total_participate);
                  echo "<p>Registration successful!</p>";
                  //echo "<a href='login.php'>Click to login page.</a>";
                  $db->closeConnection();


                }
        
        //session_destroy();
        
        ?>
    </body>
</html>
