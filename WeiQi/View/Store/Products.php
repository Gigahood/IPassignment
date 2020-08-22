<!DOCTYPE html>
<?php
session_start();
include_once ('../MasterPage.html');
include_once '../../Model/StoreDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/store.css">

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

            $result = $db->retrieveStoreData();
            $isUnique = $db->isUniqueCat();
            
            ?>

            <br/>
            <div class="header">
                <label for="category">Category: </label>

                <form action="#" method="post" style="display: inline;">
                    <select id="category" name="category[]" style="width: 300px;">
                        <option value="all">--Category--</option>
                        <option value="all">ALL</option>

                        <?php
                        foreach ($isUnique as $value) {
                            echo "<option value='categories'>" . $value['pro_category'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" name="submit" value="Submit" />
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    
                    echo $_POST['categories'];
                    foreach ($_POST['category'] as $select) {
                        echo 'Your selected:' . $select;
                    }
                    foreach ($isUnique as $value) {
                        if($value['pro_category']==$select){
                            echo $value['pro_category'];
                        }
                    }
                }
                ?>

                <form method="get" action="../Store/addNewItem.php" style="display: inline">
                    <input type="submit" id="btnAddNew" value="Add New Item" name="btnAddNew"/>
                </form>
            </div>

            <br/><br/>
            <div class="product">
                <?php
                
                
                foreach ($result as $value) {
                    $memPrice = $db->calMemberPrice($value['normal_price'], $value['discount_rate']);
                    
                    echo '<form method="POST" action="../Store/ProductDetails.php">';
                    echo '<div class="column">';
                    
                    //-- Display Image-- //
                    echo '<input name= "imageButton" id="product_img" type= "image" '
                            . 'src="data:image;base64,' . base64_encode($value['pro_image']) 
                            . '" alt="Product Img" style="height:190px; width:100%;">';
                    
                    echo '<p class="itemDetails">';
                    echo "<b><a target='_self' href='../Store/ProductDetails.php' style='color: black'>" . $value['pro_name'] . " </a></b>";
                    echo "<br/>RM " . number_format($value['normal_price'],2) . " <br/>";
                    echo "<a style='color: red'>RM ". number_format($memPrice,2)."</a>";
                    echo '</p></div>';
                    echo '</form>';
                }
                
              // print_r($result) ;

                $db->closeConnection();
                ?>

            </div>

        </div>



    </body>
</html>
