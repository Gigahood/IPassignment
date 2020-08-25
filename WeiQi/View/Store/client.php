<h2>Get Product</h2>
<form method="POST">
    <p>
        Type In Product Name :  <input type="text" name="name" value="" /> </br></br></br>
    </p>

    <input type="submit" value="Submit" name="submit" />
</form>

<?php
if (isset($_POST['submit'])) {
    if (empty($_POST["name"])) {
        echo "<h3>Please enter Product Name</h3>";
    } else {
        $name = $_POST["name"];
    }

    if (!empty($name)) {
        $url = "http://localhost/IPassignment/WeiQi/View/Store/service.php?name=" . rawurlencode($name);

        
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $result = json_decode($response, true);
        
        print_r($result);

        function display($array) {
            echo "<p>Product Name : " . $array["pro_name"] . "</p>";
            echo "<p>Product Description : " . $array["pro_desc"] . "</p>";
            echo "<p>Product Price  : " . $array["normal_price"] . "</p>";
            echo "<p>Product Member Price : " . $array["discount_rate"] . "</p>";
        }

        if (empty($result)) {
            echo "No Products Found";
        } else {
            echo "<h1>Product Detail</h1>";

            foreach ($result['product'] as $object) {
                echo "<h3>Product</h3>";
                display($object);
                echo "<br/>";
                echo "<br/>";
                echo "<br/>";
            }
        }
    }
}
?>
