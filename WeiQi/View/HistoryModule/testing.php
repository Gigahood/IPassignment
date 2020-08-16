<?php

include_once '../../Model/DatabaseConnection.php';
include_once '../../Model/database2.php';

session_start();

$_SESSION["role"] = "student";



$test = DatabaseConnection :: getInstance();

$query = "SELECT * FROM user WHERE user_email = ? AND user_pw = ?";
$stmt = $this->db->prepare($query);
$stmt->bindParam(1, $useremail, PDO::PARAM_STR);
$stmt->bindParam(2, $userpw, PDO::PARAM_STR);


