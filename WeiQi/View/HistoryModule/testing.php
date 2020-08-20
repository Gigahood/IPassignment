<?php

include_once '../../Model/UserDBConnection.php';


session_start();

$_SESSION["role"] = "student";

$test = UserDBConnection :: getInstance($_SESSION["role"]);

echo $test -> retrieveUser("student@tarc.edu.my","student123");



//$test = DatabaseConnection :: getInstance($_SESSION["role"] );
//
//$test2 = database2 :: getInstance($_SESSION["role"] );
//
//$test2 -> getUser2();

//$query = "SELECT * FROM user WHERE user_email = ? AND user_pw = ?";
//$stmt = $this->db->prepare($query);
//$stmt->bindParam(1, $useremail, PDO::PARAM_STR);
//$stmt->bindParam(2, $userpw, PDO::PARAM_STR);


