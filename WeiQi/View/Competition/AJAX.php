<?php

include_once '../../Model/CompetitionDBConnection.php';

//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "";
//$dbname = "ajaxtest";
//
////Connect to MySQL Server
//$dsn = "mysql:host=$dbhost;dbname=$dbname";
//
$name = $_POST['name'];

$db = CompetitionDBConnection::getInstance("admin");
$result = $db->getCompetitionDetail($name);

////build query
//$query = "SELECT * FROM userdetails WHERE gender = ?";

//print_r($result);


$history = $db->getHistory($result["competition_ID"]);

if (empty($history)) {
    $valid = "false";
}else {
    $valid = "true";
}

$str = "<div>";
$str .= "<div id = 'compID' data-id='".$result["competition_ID"]."'>Competition ID : " . $result["competition_ID"] . "</div>";
$str .= "<div id='compName'>Competition Name : " . $result["competition_name"]. "</div>";
$str .= "<input id='valid' type='hidden' value='". $valid ."'/>";
//$str .= "Competition ID : " . $result["competition_ID"] . "</div>";
//$str .= "Competition ID : " . $result["competition_ID"] . "</div>";

$str .= "</div>";


echo $str;


$db->closeConnection();
?>
