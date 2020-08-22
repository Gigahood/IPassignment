<!DOCTYPE html>
<?php
include('../MasterPage.html');
include_once '../../Model/StoreDBConnection.php';
require_once 'Produts.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/store.css">

    </head>
    <body>
        <div class="proDetailsContainer">

            <hr />
            <div class="hearderNote">
                <p>Note To Customer : Products below are for displayed purpose. We do not accept online payment. 
                    If you are interested in any of the products, please contact us via email (
                    <a target="_blank" href="" style="color: blue">weiqi@gmail.com</a>
                    ) or phone number ( 03-8888 8888 ). Thank you.</p>
            </div>
            <hr />

            <div class="proDetailContainer">
                <?php
                session_start();
                if (isset($_POST["imageButton"])) {
                    if (isset($_SESSION["products"])) {
                        $item_array_id = array_column($_SESSION["products"], "pro_ID");
                        if (!in_array($_GET["id"], $item_array_id)) {
                            $count = count($_SESSION["products"]);
                            $item_array = array(
                                'pro_name' => $_GET["itemName"],
                                'pro_desc' => $_POST["description"],
                                'normal_price' => $_POST["price"],
                                'total_qty' => $_POST["quantity"]
                            );
                            $_SESSION["products"][$count] = $item_array;
                        } else {
                            echo '<script>alert("Item Already Added")</script>';
                            echo '<script>window.location="addtocart.php"</script>';
                        }
                    } else {
                        $item_array = array(
                            'pro_name' => $_GET["itemName"],
                            'pro_desc' => $_POST["description"],
                            'normal_price' => $_POST["price"],
                            'total_qty' => $_POST["quantity"]
                        );
                        $_SESSION["products"][0] = $item_array;
                    }
                }
                if (isset($_GET["action"])) {
                    if ($_GET["action"] == "delete") {
                        foreach ($_SESSION["products"] as $keys => $values) {
                            if ($values["item_id"] == $_GET["id"]) {
                                unset($_SESSION["products"][$keys]);
                                echo '<script>alert("Item Removed")</script>';
                                echo '<script>window.location="addtocart.php"</script>';
                            }
                        }
                    }
                }
                //echo '<p style="font-size: 20px">Category: ';
                //echo '<span style="color: red"><b>'.$result['pro_category'].'</b></span></p>';

                $db->closeConnection();
                ?>
                <p style="font-size: 20px">Category: <span style="color: red"><b>category</b></span></p>

                <p>
                    <img src="../image/Picture1.png" width="500" height="300" alt="Picture1"/> 

                <h1 name="itemName"><b>Item Name</b><br/></h1>
                <h2 name="price"><b>Normal Price <br/>
                        <a style="color: red" name="memberPrice">Member Price</a></b></h2>

                <span>Qty: </span>
                <span style="display: inline" name="quantity">Qty</span>
                <p class="description" name="desciption"><b>Description:</b> 
                    details here...
                </p>
                </p>
            </div>
        </div>

    </body>
</html>

