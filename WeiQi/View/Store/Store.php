<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Store
 *
 * @author Lim Yi En
 */
class Store {
    private $pro_ID;
    private $pro_name;
    private $pro_desc;
    private $total_qty;
    private $pro_category;
    private $normal_price;
    private $discount_rate;
    private $pro_image;
    private $admin_ID;

    function __construct($pro_ID, $pro_name, $pro_desc, $total_qty, $pro_category, $normal_price, $discount_rate, $pro_image, $admin_ID) {
        $this->pro_ID = $pro_ID;
        $this->pro_name = $pro_name;
        $this->pro_desc = $pro_desc;
        $this->total_qty = $total_qty;
        $this->pro_category = $pro_category;
        $this->normal_price = $normal_price;
        $this->discount_rate = $discount_rate;
        $this->pro_image = $pro_image;
        $this->admin_ID = $admin_ID;
    }
    
    function getPro_ID() {
        return $this->prod_ID;
    }

    function getPro_name() {
        return $this->pro_name;
    }

    function getPro_desc() {
        return $this->pro_desc;
    }

    function getTotal_qty() {
        return $this->total_qty;
    }

    function getPro_category() {
        return $this->pro_category;
    }

    function getNormal_price() {
        return $this->normal_price;
    }

    function getDiscount_rate() {
        return $this->discount_rate;
    }

    function getPro_image() {
        return $this->pro_image;
    }

    function getAdmin_ID() {
        return $this->admin_ID;
    }

    function setPro_ID($pro_ID): void {
        $this->product_id = $pro_ID;
    }

    function setPro_name($pro_name): void {
        $this->pro_name = $pro_name;
    }

    function setPro_desc($pro_desc): void {
        $this->pro_desc = $pro_desc;
    }

    function setTotal_qty($total_qty): void {
        $this->total_qty = $total_qty;
    }

    function setPro_category($pro_category): void {
        $this->pro_category = $pro_category;
    }

    function setNormal_price($normal_price): void {
        $this->normal_price = $normal_price;
    }

    function setDiscount_rate($discount_rate): void {
        $this->discount_rate = $discount_rate;
    }

    function setPro_image($pro_image): void {
        $this->pro_image = $pro_image;
    }

    function setAdmin_ID($admin_ID): void {
        $this->admin_ID = $admin_ID;
    }

    public function calMemberPrice($normal_price, $discount_rate) {
        $memPrice = $normal_price - ($normal_price * $discount_rate);
        return $memPrice;
    }
}
