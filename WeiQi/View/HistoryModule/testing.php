<?php

include_once '../../Model/UserDBConnection.php';


session_start();

$_SESSION["role"] = "student";

$test = UserDBConnection :: getInstance($_SESSION["role"]);

echo $test -> retrieveUser("student@tarc.edu.my","student123");





