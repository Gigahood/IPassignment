<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Competition Detail</title>
        <link rel="stylesheet" type="text/css" href="compCSS.css" />
        <style>
            input[type="text"]
            {
                background: transparent;
            }
            
            select{
                background: transparent;
            }
        </style>
    </head>
    <body>
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
            
            <form id="registerForm">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="" size="80" readonly="readonly" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Start Date : </span>
                    <select name="day" id="day" disabled="disabled">
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    &nbsp;/&nbsp;
                    <select name="month" id="month" disabled="disabled">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    &nbsp;/&nbsp;
                    <input type="text" name="year" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Venue : </span>
                    <input type="text" name="venue" value="" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Person In Charge (PIC) : </span>
                    <input type="text" name="PIC" value="" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Registration Fee (RM) : </span>
                    <input type="text" name="regFeePre" value="" size="5" />
                    .
                    <input type="text" name="regFeePost" value="00" size="2" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Prize Pool (RM) : </span>&nbsp;
                    1. <input type="text" name="firstPrize" value="" size="30" />
                    <br /><span style='padding-left: 30%;'></span>&nbsp;
                    2. <input type="text" name="secondPrize" value="" size="30" />
                    <br /><span style='padding-left: 30%;'></span>&nbsp;
                    3. <input type="text" name="thirdPrize" value="" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Maximum Participant : </span>
                    <input type="text" name="maxParticipant" value="" size="10" />
                    <br /><br /><br />
                    
                    <div style='display:block; text-align: center;'>
                        <input type="submit" value="Update Information" name="action" class="createStyle" style='background-color: yellow; width: 35%; '/>
                        &emsp;&emsp;
                        <input type="submit" value="Check History" name="action" class="createStyle" style='background-color: red; width: 35%; '/>
                    </div>
                    <br /><br />
                </div>
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
