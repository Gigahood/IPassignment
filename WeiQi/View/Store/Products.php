<!DOCTYPE html>
<?php
include('../MasterPage.php');
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

            <div class="header">
                <form action="/Store.php" style="display: inline;">
                    <label for="category">Category: </label>
                    <select id="category" name="category" style="width: 300px;">
                        <option value="sets">Chess Sets</option>
                        <option value="chessboard">Chessboard</option>
                        <option value="pieces">Chess Pieces</option>
                        <option value="jars">Chess Jars</option>
                    </select>
                </form>
                
                <form method="get" action="../Store/addNewItem.php" style="display: inline">
                    <input type="submit" id="btnAddNew" value="Add New Item" name="btnAddNew"/>
                </form>
            </div>
            
            <div class="productsContainer">

                <form name="product" method="GET" action="../Store/ProductDetails.php">

                    <div class="itemRow">

                        <div class="column">
                            <input name="imageButton" type="image" src="../image/Picture1.png" alt="pro1" height="190" style="width:100%">
                            <p class="itemDetails">
                                <b><a target="_self" href="../Store/ProductDetails.php" style="color: black">Item name 1</a></b> 
                                <br/> price <br/>
                                <a style="color: red ">member price</a>
                            </p>
                        </div>

                        <div class="column">
                            <input name="imageButton" type="image" src="../image/Picture1.png" alt="pro2" height="190" style="width:100%">
                            <p class="itemDetails">
                                <b><a target="_self" href="../Store/ProductDetails.php" style="color: black">Item name 1</a></b> 
                                <br/> price <br/>
                                <a style="color: red ">member price</a>
                            </p>
                        </div>

                        <div class="column">
                            <input name="imageButton" type="image" src="../image/Picture1.png" alt="pro3" height="190" style="width:100%">
                            <p class="itemDetails">
                                <b><a target="_self" href="../Store/ProductDetails.php" style="color: black">Item name 1</a></b> 
                                <br/> price <br/>
                                <a style="color: red ">member price</a>
                            </p>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </body>
</html>
