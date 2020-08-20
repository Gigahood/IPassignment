<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="authCSS.css" />
    </head>
    <body>
        <div id="registerFormStyle">
            <div>
                <img src="auth_image/nworldLogo.png" alt="N-World logo" style="width: 30%; margin-left: auto; margin-right: auto; display: block;"/>
            </div>
            <br /><br />
            
            <div style="font-size: 25px; font-family: Arial;">
                &emsp;
                <img src="auth_image/leafNoBG.png" alt="N-World logo" width="200" style="width:3%; "/>
                <b>Account Registration</b>
                <hr width="95%"/>
            </div>
            
            <form id="registerForm">
                <div style="font-size: 20px; font-family: Arial;">
                    <span class="lblRightStyle"><span style="color: red;">* </span>Full Name : </span>
                    <input type="text" name="userName" value="" size="80" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Date of Birth : </span>
                    <select name="day" id="day">
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
                    <select name="month" id="month" >
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
                    <input type="text" name="year" value="" size="20" placeholder="yyyy" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Contact No. : </span>
                    <input type="text" name="contactPre" value="+60" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="contactNo" value="" size="20" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Gender : </span>
                    <input type="radio" name="radGender" value="Male" checked="checked" /><span style="font-size: 15px;">Male</span>
                    &nbsp;
                    <input type="radio" name="radGender" value="Female" /><span style="font-size: 15px;">Female</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>IC No. : </span>
                    <input type="text" name="icPre" value="" size="8" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icMid" value="" size="3" />
                    &nbsp;-&nbsp;
                    <input type="text" name="icPost" value="" size="5" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Address : </span>
                    <textarea name="address" rows="6" cols="60">
                    </textarea>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Profile Picture : </span>
                    <img src="<?php echo $_GET['filename']; ?>" width="150" height="180" alt="profile picture" style="border-style: solid; border-width: 1px; border-color: black;"/>
                    &nbsp;
                    <input type="file" name="profileUpload" id="profileUpload"/>
                    <br /><br />
                    <div style="text-align: center">
                        <input type="submit" value="Preview" name="action" />
                    </div>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Email : </span>
                    <input type="text" name="email" value="" size="30" />
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Password : </span>
                    <input type="password" name="PW" value="" size="20" />
                    <span style="font-size: 12px;">Password must have at least 6 characters long.</span>
                    <br /><br />
                    
                    <span class="lblRightStyle"><span style="color: red;">* </span>Re-enter Password : </span>
                    <input type="password" name="rePW" value="" size="20" />
                    <br /><br /><br />
                    
                    <input type="submit" value="Register" name="action" class="loginStyle"/>
                    <br /><br />
                </div>
            </form>
        </div>
        
        <!--NOT WORK -->
        <?php
        // put your code here
        if($_POST['action'] == 'Preview')
        { 
            $filepath = "images/" . $_FILES["file"]["name"];

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
            {
                //echo "<img src=".$filepath." height=200 width=300 />";
                $filename = ".$filepath.";
            } 
            else 
            {
                echo "Error !!";
            }
        } 
        ?>
    </body>
</html>
