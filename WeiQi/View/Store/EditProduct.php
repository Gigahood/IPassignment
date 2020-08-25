<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../../Model/StoreDBConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Item</title>
        <link rel="stylesheet" type="text/css" href="store.css">
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
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    </head>
    <body>
        <div id="ItemFormStyle">
            <div id="headerImage">
                <img src="../image/nworldLogo_form.png" width="200" alt="N-World logo" />
            </div>

            <div id="formHeader">
                <img src="../image/leafNoBG.png" alt="N-World logo" style="width:4%; "/>
                <b style="font-size: 25px; font-family: Arial">Update Item</b>
                <hr width="100%"/>

                <?php
                session_start();
                $_SESSION["role"] = "admin";

                $db = StoreDBConnection::getInstance($_SESSION["role"]);

                // print_r($_GET["id"]);

                if (isset($_GET["id"])) {
                    $result = $db->retrieveProDetails($_GET["id"]);
                } else {
                    
                }

                foreach ($result as $value) {
                    ?>
                    <form name="addNewItemForm" action="" method="post">
                        <label for="proName" class="label"><span style="color: red;">* </span>
                            Product Name: 
                        </label>

                        <input type="text" id="proName" name="proName" value="<?php echo $value['pro_name']; ?>" placeholder="Product name" size="70"><br /><br />

                        <label for="desc" class="label"><span style="color: red;">* </span>
                            Description:
                        </label>

                        <textarea name="proDesc" rows="6" cols="60"><?php echo $value['pro_desc']; ?></textarea>
                        <br /><br />

                        <label for="proCat" class="label"><span style="color: red;">* </span>
                            Category: 
                        </label>

                        <select id="category" name="category" style="width: 180px">
                            
                            <?php
                            $isUnique = $db->isUniqueCat();

                            foreach ($isUnique as $uniqueCat) {
                                echo "<option value='" . $uniqueCat['pro_category'] . "'>" . $uniqueCat['pro_category'] . "</option>";
                            }
                            ?>
                        </select>

                        <input type="checkbox" name="addNewCat" value="ON" style="margin-left: 20px"
                               onclick="EnableDisableTextBox(this)">
                        Add New Category:
                        <input type="text" id="newCat" name="newCat" value="" placeholder="New Category" size="26" disabled="disabled">
                        <br /><br />

                        <label for="qty" class="label">
                            <span style="color: red;">* </span>
                            Available Stock: 
                        </label>
                        <input type="text" id="qty" name="qty" value="<?php echo $value['total_qty']; ?>" placeholder="Quantity"><br /><br />

                        <label for="price" class="label"><span style="color: red;">* </span>
                            Price (RM): 
                        </label>
                        <input type="text" id="price" name="price" value="<?php echo $value['normal_price']; ?>" placeholder="00.00" size="25"><br /><br />

                        <label for="discountRate" class="label"><span style="color: red;">* </span>
                            Discount Rate: 
                        </label>
                        <input type="text" id="discountRate" name="discountRate"style="text-align:right;" 
                               value="<?php echo $value['discount_rate']; ?>" placeholder="0.00" size="25"> % <br /><br />

                        <!--                        <label for="memPrice" class="label">
                                                    Member Price: 
                                                </label>
                                                <b style="color: red">RM -->
                        <?php
                        // $memPrice = $db->calMemberPrice($_POST['price'], $_POST['discountRate']);
                        // echo $_POST['price'];
                        // echo $_POST['discountRate'];
                        // echo number_format($memPrice, 2);
                        ?>
                        <!--                        </b>
                                                <br /><br />-->

                        <form action="" method="post" runat="server" >
                            <label for="proImg" class="label"><span style="color: red;">* </span>
                                Upload Image: 
                            </label>
                            
                            <input type="file" name="proImg" onchange="readURL(this);" /><br/>
                            
                            <div class="uploadImg">
                                <?php echo '<img src="data:image;base64,' . base64_encode($value['pro_image']) . ' " alt="your image" style="width: 300px; height: 300px; " />' ?>
                            </div>
                            
                            <br /><br />
                            <br /><br />
                            <div>
                                <input type="button" value="Cancel" name="cancel" class="btnReset" onclick="goBack()"/>
                                <input type="submit" value="Update" name="update" class="btnCreate">
                            </div>
                        </form>
                    <?php } ?>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>

                    <br/>
                </form>     


            </div>
        </div>
        <?php
        // put your code here
        $_SESSION['userID'] = 4;
        // if (isset($_POST['addNewCat'])) {
        //   print_r($_POST["proName"]); 
        //  }


        if (isset($_POST["update"])) {

            $pro_name = $_POST["proName"];
            $pro_desc = $_POST["proDesc"];
            $total_qty = $_POST["qty"];
//            if(isset($_POST['addNewCat'])){
//                $pro_category =$_POST["newCat"];
//                exit();
//            } else {
            $pro_category = $_POST["category"];
            //}
            $normal_price = $_POST["price"];
            $discount_rate = $_POST["discountRate"];
            $pro_image = $_POST["proImg"];
            $admin_ID = $_SESSION['userID'];
            $pro_ID = $_GET["id"];
            
            echo $_POST["category"];
            echo $_POST["proName"];
            
            $updateItem = $db->updateItem($pro_name, $pro_desc, $total_qty, $pro_category,
                    $normal_price, $discount_rate, $pro_image, $admin_ID, $pro_ID);
            
            echo $_POST["category"];
            echo $_POST["proName"];
            
            echo "<p>Update successful!</p>";
        } else {
            echo "Update failed.";
        }

        $db->closeConnection();
        ?>
    </body>
</html>
