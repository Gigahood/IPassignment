<!DOCTYPE html>
<?php
include('../MasterPage.html');
include_once '../../Model/StoreDBConnection.php';
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
                if (isset($_POST["add_to_cart"])) {
                    if (isset($_SESSION["shopping_cart"])) {
                        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                        if (!in_array($_GET["id"], $item_array_id)) {
                            $count = count($_SESSION["shopping_cart"]);
                            $item_array = array(
                                'item_id' => $_GET["id"],
                                'item_name' => $_POST["hidden_name"],
                                'item_price' => $_POST["hidden_price"],
                                'item_quantity' => $_POST["quantity"]
                            );
                            $_SESSION["shopping_cart"][$count] = $item_array;
                        } else {
                            echo '<script>alert("Item Already Added")</script>';
                            echo '<script>window.location="addtocart.php"</script>';
                        }
                    } else {
                        $item_array = array(
                            'item_id' => $_GET["id"],
                            'item_name' => $_POST["hidden_name"],
                            'item_price' => $_POST["hidden_price"],
                            'item_quantity' => $_POST["quantity"]
                        );
                        $_SESSION["shopping_cart"][0] = $item_array;
                    }
                }
                if (isset($_GET["action"])) {
                    if ($_GET["action"] == "delete") {
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                            if ($values["item_id"] == $_GET["id"]) {
                                unset($_SESSION["shopping_cart"][$keys]);
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

                <h1><b>Item Name</b><br/></h1>
                <h2><b>Normal Price <br/>
                        <a style="color: red">Member Price</a></b></h2>

                <p class="description"><b>Description:</b> 
                    details here...
                </p>
                </p>
            </div>
        </div>

    </body>
</html>

