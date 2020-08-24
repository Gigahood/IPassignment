<?php

/**
 * Description of compService
 *
 * @author Cheng Qing Xiang
 */

header("Content-Type:application/json");
require '../../Model/CompetitionServiceConnection.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $dSession = "admin";
    $type;

    $db = CompetitionServiceConnection :: getInstance($dSession);

        $compDet = $db->getCompDet($name);
        $type = 'single';
    
    
    $db->closeConnection();

    if (empty($compDet)) {
        response(204, "User Not Found", $type, NULL);
    } else {
        response(200, "Valid", $type, $compDet);
    }
} else {
    response(400, "Invalid Request", $type, NULL);
}

function response($status, $error, $type, $history) {
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['error'] = $error;
    $response['type'] = $type;
    $response['history'] = $history;

    $json_response = json_encode($response);
    echo $json_response;
}
?>

