<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authentication
 *
 * @author Jane Chew
 */
class Authentication {
    //put your code here
    /*private static $instance = null;
    private $db;
    
    private function __construct() {
        $host = 'localhost';
        $dbName = 'ip_weiqi';
        $dbuser = 'root';
        $dbpassword = '';

        // set up DSN
        $dsn = "mysql:host=$host;dbname=$dbName";

        try {
            $this->db = new PDO($dsn, $dbuser, $dbpassword);
            echo "<p>Connection to database successful</p>";
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }
    
    public static function getIntance(){
        if(self::$instance == null){
            self::$instance = new Authentication();
        }
        return self::$instance;
    }
    
    /*public function addUser($username, $passwd) {
          $query = "INSERT INTO Authorized_Users(username, passwd) VALUES (?, ?)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(1, $username, PDO::PARAM_STR);
          $stmt->bindParam(2, $passwd, PDO::PARAM_STR);
          $stmt->execute();
    }*/
    
    /*public function searchProduct($searchterm){
        $query = "SELECT * FROM Products WHERE ProductName = ?";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $searchterm, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
      
    }*/
    
    /*public function retrieveUser($useremail, $userpw){
        $query = "SELECT * FROM user WHERE user_email = ? AND user_pw = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $useremail, PDO::PARAM_STR);
        $stmt->bindParam(2, $userpw, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    public function closeConnection(){
        $this->db = null;
    }*/
}
