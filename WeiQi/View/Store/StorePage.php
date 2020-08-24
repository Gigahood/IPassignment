<!DOCTYPE html>
<?php
//session_start();
include '../MasterPage.php';
include_once '../../Model/StoreDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="store.css">  

        <script>
            function printID(e) {
                e = e || window.event;
                e = e.target || e.srcElement;
                console.log("ID: " + e.id);
                window.location.href="../Store/ProductDetails.php?id="+e.id;
                
            }
            
        </script>
    </head>
    <body>
        <div id="productContainer">
            <hr />

            <div class="hearderNote">
                <p>Note To Customer : Products below are for displayed purpose. We do not accept online payment. 
                    If you are interested in any of the products, please contact us via email (
                    <a target="_self" href="" style="color: blue">weiqi@gmail.com</a>
                    ) or phone number ( 03-8888 8888 ). Thank you.</p>
            </div>

            <hr />

            <?php
            $_SESSION["role"] = "admin";

            $db = StoreDBConnection::getInstance($_SESSION["role"]);

            if (!isset($_POST['category'][0]) || $_POST['category'][0] == "All") {
                $result = $db->retrieveStoreData("null");
            } else {
                $result = $db->retrieveStoreData($_POST["category"][0]);
                $memPrice = new PriceDecorator();
            }


            $isUnique = $db->isUniqueCat();
            ?>

            <br/>
            <div class="header">
                <label for="category">Category: </label>

                <form action="#" method="post" style="display: inline;">
                    <select id="category" name="category[]" style="width: 300px;">
                        <option value="ctgTitle" disabled>-- Category --</option>
                        <option value="all">ALL</option>

                        <?php
                        foreach ($isUnique as $value) {
                            echo "<option value='" . $value['pro_category'] . "'>" . $value['pro_category'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" name="submit" value="Submit" />
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    foreach ($_POST['category'] as $select) {
                        echo 'Your selection is: ' . $select;
                    }
                }
                ?>

                <form method="get" action="../Store/addNewItem.php" style="display: inline">
                    <input type="submit" id="btnAddNew" value="Add New Item" name="btnAddNew"/>
                </form>
            </div>

            <br/><br/>

            <div class="product">
                <form method="POST" name="productItem" action="../Store/ProductDetails.php">
                    
                    <?php
                  
                    foreach ($result as $value) {
                        
//                        $memPrice = $db->calMemberPrice($value['normal_price'], $value['discount_rate']);

                        echo '<div class="column" onclick="printID(this.id);" >';
                        
                       
                        //-- Display Image-- //
                        //echo '<input name= "imageButton" type= "image" '
                        //. 'src="data:image;base64,' . base64_encode($value['pro_image'])
                        //. '" alt="Product Img" style="height:190px; width:100%;">';
                        
                        echo '<img id= "'. $value['pro_ID'] .'" src="data:image;base64,' . base64_encode($value['pro_image'])
                        . '" alt="Product Img" style="height:290px; width:100%;">';
                        
                        // <a target='_self' href='' style='color: black' id='name'></a>
                        echo '<p id="'. $value["pro_ID"] .'" >';
                        echo "<b>". $value['pro_name'] . " </b><br/>";
                        echo "Normal Price: RM " . number_format($value['normal_price'], 2) . " <br/>";
                       // echo "<span id='". $value["pro_ID"] . "'>" . $memPrice->getDescription() ."</span>";
                        echo '</p></a></div>';
                        
                    }
                    
                    $db->closeConnection();
                    
                    ?>
                    



                    <?php
//                    echo $_POST["hidden_name"];
//                    print_r($_POST["hidden_name"]);
//                    // print_r($result) ;
//                    if (isset($_POST["imageButton"])) {
//                        if (isset($_SESSION["products"])) {
//                            print_r($_SESSION["products"]);
//                        } else {
//                            $item_array = array (
//                                'product_id' => $POST['hidden_name'] );
//                        }
//                        
//                        $_SESSION['products'][0] = $item_array;
//                        print_r($_SESSION['products']);
//                    }
//                    $db->closeConnection();
//                    
                    ?>
                </form>

            </div>

        </div>



    </body>
</html>
