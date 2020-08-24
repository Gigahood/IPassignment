<!DOCTYPE html>
<?php
include('../MasterPage.php');
include_once '../../Model/StoreDBConnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="store.css">

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

            <div class="detailContainer">
                <?php
                // session_start();
                $_SESSION["role"] = "admin";

                $db = StoreDBConnection::getInstance($_SESSION["role"]);
//                print_r($_GET["id"]);

                if (isset($_GET["id"])) {
                    $result = $db->retrieveProDetails($_GET["id"]);
                } else {
                    
                }


                foreach ($result as $value) {
                    $memPrice = $db->calMemberPrice($value['normal_price'], $value['discount_rate']);

                    echo '<p style="font-size: 20px">Category: ';
                    echo "<span style='color: blue'><b>" . $value['pro_category'] . "</b></span></p>";
                    echo '<p class="itemDivider">';
                    echo '<img src = "data:image;base64,' . base64_encode($value['pro_image']) 
                           . '" width = "500" height = "300" alt = "Picture1"/>';
                    echo '<h1 name = "itemName"><b>' . $value['pro_name'] . '</b><br/></h1>';
                    echo '<span style="display: inline; float:right; margin-right:20px;">Qty: ';
                    echo $value['total_qty'] . '</span>';
                    echo '<h2 name = "price"><b>Normal Price: RM ' . number_format($value['normal_price'], 2) . '<br/>';
                    echo '<a style = "color: red" name = "memberPrice">Member Price: RM ' . number_format($memPrice, 2) . '</a></b></h2>';

                    echo '<p class = "description" name = "desciption"><b>Description:</b></p><br/>';
                    echo '<p>' . $value['pro_desc'];
                    echo '</p></p><br/><br/>';
                }

                $db->closeConnection();
                ?>



                <!-- * delete dialog *-->  

                <div>  
                    <dialog id="deleteDialog" style="width:50%;background-color:#F4FFEF;border:1px dotted black;">  
                        <p> Do you want to delete this item <br/>  
                            - <cite>
                                <?php
                                foreach ($result as $value) {
                                    $value['pro_name'];
                                }
                                ?> ? </cite></p> 

                        <button id="yes" data-href="DeleteProduct.php" data-id=" <?php echo $_GET['id']; ?>"
                                style="background-color: #4959EA; color:white; height: 30px; width: 100px; float: right;">Yes</button> 

                        <button id="no" style="background-color: red; color:white; height: 30px; width: 100px; float: right; margin-right: 20px">No</button>  

                    </dialog>  
                    <?php
                    foreach ($result as $value) {
                        echo " <form id=\"btnDelete\" method=\"get\" data-href='DeleteProduct.php' data-id='" . $_GET['id'] . "'
                          class=\"button\" style=\"background-color: red;\">";
//                        <a href="DeleteProduct.php?rn=$value[pro_ID]" onclick="return
//                                checkdelete" > </a>
                            
                        echo '
                        <form id="btnDelete" method="get" action="" class="button" style="background-color: red; ">
                                <img src="../Store/image/delete.png" width="20px" height="20px" class="btnicon"/>
                                Delete
                        </form>
                        
                        ';
                    }

                    // -- edit button --//
                    echo " <form id=\"btnEdit\" method=\"get\" data-href='EditProduct.php' data-id='" . $_GET['id'] . "'
                          class=\"button\" style=\"background-color: #F2BA08; margin-right: 20px;\">";
                    ?>
                    <img src="../Store/image/edit.png" width="20px" height="20px" class="btnicon"/>
                    Edit
                    </form>

                </div>  

                <!-- JavaScript to provide the "Show/Close" functionality -->  
                <script type="text/JavaScript">  
                    function checkdelete(){
                        return confirm('Are you sure want to delete this item');
                    }
                    
                    (function() {    
                    var dialog = document.getElementById('deleteDialog');    
                    document.getElementById('btnDelete').onclick = function() {    
                    dialog.show();   
                    };    
                    document.getElementById('no').onclick = function() {    
                    dialog.close();    
                    }; 
                    
                    document.getElementById('yes').onclick = function() {    
                    window.location.href = this.getAttribute('data-href') + "?id="
                    + this.getAttribute('data-id') + "";  
                    }; 


                    document.getElementById('btnEdit').addEventListener("click", function(e){
                    window.location.href = this.getAttribute('data-href') + "?id="
                    + this.getAttribute('data-id') + "";
                    })
                    
//                    document.getElementById('btnDelete').addEventListener("click", function(e){
//                    window.location.href = this.getAttribute('data-href') + "?id="
//                    + this.getAttribute('data-id') + "";
//                    })
                    
                    })();   
                </script>  
                </body>

                <!--                <div>
                                    <form action="DelereItem.php" method="post">
                                        <div>
                                            <input type="hidden" name="" id="">
                
                                            <h3>Do you want to delete this item?</h3>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" name="updateData" class="btn btn-secondary">Yes</button>
                                        </div>
                                    </form>
                                </div>-->
            </div>

    </body>
</html>

