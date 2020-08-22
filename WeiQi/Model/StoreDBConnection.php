<?php

include_once 'AbstractDatabaseConnection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StoreDBConnection
 *
 * @author Lim Yi En
 */
class StoreDBConnection extends AbstractDatabaseConnection {

    public function retrieveStoreData() {
        $query = "SELECT * FROM products";
        $stmt = parent::$db->prepare($query);

        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    public function isUniqueCat() {
        $query = "SELECT DISTINCT pro_category FROM products ORDER BY pro_category";
        
        $stmt = parent::$db->prepare($query);

        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    

    public function retrieveProDetails($pro_name) {
        $query = "SELECT * FROM products WHERE pro_name = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $pro_name, PDO::PARAM_STR);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    public function calMemberPrice($normal_price, $discount_rate) {
        $memPrice = $normal_price - ($normal_price * $discount_rate);
        return $memPrice;
    }

}
