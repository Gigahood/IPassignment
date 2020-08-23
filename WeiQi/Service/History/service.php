<?php

header("Content-Type:application/json");
require_once 'Competition.php';
require '../../Model/HistoryServiceConnection.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $dSession = "admin";
    $type;

    $db = HistoryServiceConnection :: getInstance($dSession);

    if ($name == 'all') {
        $competition = $db->getAllHistory();
        $type = 'all';
    } else {
        $competition = $db->getHistory($name);
        $type = 'single';
    }
    
    $db->closeConnection();

    if (empty($competition)) {
        response(204, "No History Found", $type, NULL);
    } else {
        response(200, "Valid", $type, $competition);
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

