<?php

header("Content-Type:application/json");
require '../../Model/UserServiceConnection.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $dSession = "admin";
    $type;

    $db = UserServiceConnection :: getInstance($dSession);

        $userCompDet = $db->getParticipantCompDet($name);
        $type = 'single';
    
    
    $db->closeConnection();

    if (empty($userCompDet)) {
        response(204, "User Not Found", $type, NULL);
    } else {
        response(200, "Valid", $type, $userCompDet);
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

