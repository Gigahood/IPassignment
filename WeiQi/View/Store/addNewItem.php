<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include('../MasterPage.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Item</title>
        <link rel="stylesheet" type="text/css" href="CSS/store.css">
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <script type="text/javascript">

            function EnableDisableTextBox(addNewCat) {
                var newCat = document.getElementById("newCat");
                newCat.disabled = addNewCat.checked ? false : true;
                if (!newCat.disabled) {
                    newCat.focus();
                }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#proImg').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    </head>
    <body onload=enable_text(false);>
        <div id="addNewItemFormStyle">
            <div id="headerImage">
                <img src="../image/nworldLogo_form.png" width="200" alt="N-World logo" />
            </div>

            <div id="formHeader">
                <img src="../image/leafNoBG.png" alt="N-World logo" style="width:4%; "/>
                <b style="font-size: 25px; font-family: Arial">Add New Item</b>
                <hr width="100%"/>

                <div>
                    <form name="addNewItemForm" action="">
                        <label for="proName" class="label"><span style="color: red;">* </span>
                            Product Name: 
                        </label>

                        <input type="text" id="proName" name="proName" value="" placeholder="Product name" size="70"><br /><br />

                        <label for="desc" class="label"><span style="color: red;">* </span>
                            Description:
                        </label>

                        <textarea name="address" rows="6" cols="60"></textarea>
                        <br /><br />

                        <label for="proCat" class="label"><span style="color: red;">* </span>
                            Category: 
                        </label>

                        <select id="category" name="category" style="width: 180px">
                            <option value="sets">Chess Sets</option>
                            <option value="chessboard">Chessboard</option>
                            <option value="pieces">Chess Pieces</option>
                            <option value="jars">Chess Jars</option>
                        </select>

                        <input type="checkbox" name="addNewCat" value="ON" style="margin-left: 20px"
                               onclick="EnableDisableTextBox(this)">
                        Add New Category:
                        <input type="text" id="newCat" name="newCat" value="" placeholder="New Category" size="26" disabled="disabled">
                        <br /><br />

                        <label for="price" class="label"><span style="color: red;">* </span>
                            Price (RM): 
                        </label>
                        <input type="text" id="price" name="price" value="" placeholder="00.00" size="25"><br /><br />

                        <label for="discountRate" class="label"><span style="color: red;">* </span>
                            Discount Rate: 
                        </label>
                        <input type="text" id="discountRate" name="discountRate"style="text-align:right;" 
                               value="" placeholder="0.00" size="25"> % <br /><br />

                        <label for="memPrice" class="label"><span style="color: red;">* </span>
                            Member Price: 
                        </label>
                        <b style="color: red">RM 0.00</b>
                        <br /><br />

                        <form action="" method="post" runat="server" >
                            <label for="proImg" class="label"><span style="color: red;">* </span>
                                Upload Image: 
                            </label>
                            <input type="file" onchange="readURL(this);" /><br/>
                            <div class="uploadImg">
                                <img id="proImg" src="#" alt="your image" style="width: 300px; height: 300px; "/>
                            </div>
                        </form>
                        
                        <br /><br />
                        <br /><br />
                      
                        <div>
                            <input type="reset" value="Reset" name="reset" class="btnReset"/>
                            <input type="submit" value="Create" class="btnCreate">
                        </div>
                        
                    </form>     
                </div>
            </div>
        </div>



    </body>
</html>
