<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
        // put your code here
mysql_connect("localhost", "root", "");
mysql_select_db(ip_weiqi);
$query = "SELECT * FROM products";
$stmt = parent::$db->prepare($query);

$stmt->execute();

while ($row = mysql_fetch_assoc($query)) {
    $productImg = $row["pro_image"];
}
header("content-type: image/jpeg");
echo $productImg;

$totalrows = $stmt->rowCount();
if ($totalrows == 0) {
    return null;
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>

