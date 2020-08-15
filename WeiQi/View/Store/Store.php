<?php
include('../MasterPage.html');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/store.css">
        <title></title>
    </head>
    <body>
        <div class="storeContainer">
            <hr />
            <div class="noteContainer">
                <p>Note To Customer : Products below are for displayed purpose. We do not accept online payment. 
                    If you are interested in any of the products, please contact us via email (
                    <a target="_self" href="" style="color: blue">weiqi@gmail.com</a>
                    ) or phone number ( 03-8888 8888 ). Thank you.</p>
            </div>
            <hr />
            <div class="bodyContainer">
                <form action="/Store.php">
                    <label for="category">Category: </label>
                    <select id="category" name="category">
                        <option value="sets">Chess Sets</option>
                        <option value="chessboard">Chessboard</option>
                        <option value="pieces">Chess Pieces</option>
                        <option value="jars">Chess Jars</option>
                    </select>
                </form>
            </div>
            <form name="item" method="GET" action="../Store/ProductDetails.php">
                <input name="imageButton" type="image" src="../image/Picture1.png" width="300" height="164" alt="Picture1"/>
                <p class="item">
                    <b>
                        <a target="_self" href="../Store/ProductDetails.php" style="color: black">
                            Item name 1
                        </a>
                    </b> 
                    <br/> 
                        price 
                    <br/>
                    <a style="color: red ">member price</a>
                </p>

            </form>

        </div>
    </body>
</html>
