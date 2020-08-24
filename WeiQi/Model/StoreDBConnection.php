<?php
include_once 'AbstractDatabaseConnection.php';
/**
 * Description of StoreDBConnection
 *
 * @author Lim Yi En
 */
class StoreDBConnection extends AbstractDatabaseConnection {

    public function retrieveStoreData($category) {
        if ($category == "null") {
            $query = "SELECT * FROM products";
            $stmt = parent::$db->prepare($query);
        } else {
            $query = "SELECT * FROM products WHERE pro_category = ?";
            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $category, PDO::PARAM_STR);
        }

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

    public function retrieveProDetails($pro_id) {
        $query = "SELECT * FROM products WHERE pro_ID = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $pro_id, PDO::PARAM_STR);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function addNewItem($pro_name, $pro_desc, $total_qty, $pro_category, 
            $normal_price, $discount_rate, $pro_image, $admin_ID) {
        $query = "INSERT INTO products(pro_name, pro_desc, total_qty, pro_"
                . "category, normal_price, discount_rate, pro_image, admin_id)"
                . " VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $pro_name, PDO::PARAM_INT);
            $stmt->bindParam(2, $pro_desc, PDO::PARAM_STR);
            $stmt->bindParam(3, $total_qty, PDO::PARAM_STR);
            $stmt->bindParam(4, $pro_category, PDO::PARAM_STR);
            $stmt->bindParam(5, $normal_price, PDO::PARAM_STR);
            $stmt->bindParam(6, $discount_rate, PDO::PARAM_STR);
            $stmt->bindParam(7, $pro_image, PDO::PARAM_STR);
            $stmt->bindParam(8, $admin_ID, PDO::PARAM_STR);

            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateItem($pro_name, $pro_desc, $total_qty, $pro_category,
            $normal_price, $discount_rate, $pro_image, $admin_ID, $pro_ID) {
        $query = "UPDATE products "
                . "SET pro_name=?, "
                . "pro_desc=?, "
                . "total_qty = ?, "
                . "pro_category = ?, "
                . "normal_price = ?, "
                . "discount_rate = ?, "
                . "pro_image = ?, "
                . "admin_ID = ? "
                . "WHERE pro_ID = ?";

        try {
            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $pro_name, PDO::PARAM_INT);
            $stmt->bindParam(2, $pro_desc, PDO::PARAM_STR);
            $stmt->bindParam(3, $total_qty, PDO::PARAM_STR);
            $stmt->bindParam(4, $pro_category, PDO::PARAM_STR);
            $stmt->bindParam(5, $normal_price, PDO::PARAM_STR);
            $stmt->bindParam(6, $discount_rate, PDO::PARAM_STR);
            $stmt->bindParam(7, $pro_image, PDO::PARAM_STR);
            $stmt->bindParam(8, $admin_ID, PDO::PARAM_STR);
            $stmt->bindParam(9, $pro_ID, PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteItem($pro_ID) {
        $query = "DELETE FROM products WHERE pro_ID = ?";

        try {
            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $pro_ID, PDO::PARAM_INT);

            print_r($stmt);

            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function retrieveProInfo($pro_name) {
        $query = "SELECT pro_name, pro_desc, normal_price, discount_rate FROM products WHERE pro_name = ?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $pro_name, PDO::PARAM_STR);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            
            print_r($totalrows);
            return null;
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}
