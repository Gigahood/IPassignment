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
    private $product_id;
    private $pro_name;
    private $pro_desc;
    private $total_qty;
    private $pro_category;
    private $normal_price;
    private $discount_rate;
    private $pro_image;
    private $admin_ID;

    function __construct($product_id, $pro_name, $pro_desc, $total_qty, $pro_category, $normal_price, $discount_rate, $pro_image, $admin_ID) {
        $this->product_id = $product_id;
        $this->pro_name = $pro_name;
        $this->pro_desc = $pro_desc;
        $this->total_qty = $total_qty;
        $this->pro_category = $pro_category;
        $this->normal_price = $normal_price;
        $this->discount_rate = $discount_rate;
        $this->pro_image = $pro_image;
        $this->admin_ID = $admin_ID;
    }
    
    function getProduct_id() {
        return $this->product_id;
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

    function setProduct_id($product_id): void {
        $this->product_id = $product_id;
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

}
