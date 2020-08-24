<?php

header("Content-Type:application/json");
//require_once 'class/Products.php';
require_once '../../Model/StoreDBConnection.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $dSession = "admin";

    $db = StoreDBConnection :: getInstance($dSession);
    
    $product = $db->retrieveProInfo($name);
    

    $db->closeConnection();

    if (empty($product)) {
        response(204, "No Product Found", NULL);
    } else {
        response(200, "Valid", $product);
    }
} else {
    response(400, "Invalid Request", NULL);
}

function response($status, $error, $product) {
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['error'] = $error;
    $response['product'] = $product;

    $json_response = json_encode($response);
    echo $json_response;
}
?>

