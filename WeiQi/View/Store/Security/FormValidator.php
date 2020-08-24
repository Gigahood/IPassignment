<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormValidator
 *
 * @author User
 */
class FormValidator {

    //put your code here
   // private $data;
   // private $errors = [];
   // private static $fields = ['proName', 'proDesc', 'category', 'qty', 'price', 'discountRate', 'proImg'];

//    public function __construct($post_data) {
//        $this->data = $post_data;
//    }
    

    public function validateEmptyString($pro_name, $pro_desc, $total_qty, $pro_category,
                            $normal_price, $discount_rate, $pro_image) {
        $error = "* ";

        if (empty($pro_name)) {
            $error .= "Name is require. <br/>";
        } 

        if (empty($pro_desc)) {
            $error .= "Description is require. <br/>";
        }

        if (empty($total_qty)) {
            $error .= "Available Stock is require.<br/>";
        } else if (preg_match('/^[-]?[0-9,]+$/', $total_qty)){
            $error .= "Available Stock must be integer.<br/>";
        } else if ($total_qty > 0){
            $error .= "At least have one item.<br/>";
        }

        if (empty($pro_category)) {
            $error .= "Category is require. <br/>";
        }

        if (empty($normal_price)) {
            $error .= "Price is require. <br/>";
        } else if (preg_match('/^[-]?[0-9,]+$/', $normal_price)){
            $error .= "Price must be digit.<br/>";
        }

        if (empty($discount_rate)) {
            $error .= "Discount rate is require. <br/>";
        } else if (preg_match('/^[-]?[0-9,]+$/', $discount_rate)){
            $error .= "Discount rate must be digit.<br/>";
        }

        else if (empty($pro_image)) {
            $error .= "Please upload a photo. <br/>";
        }

        return $error;
    }


//    
//    public function validateForm() {
//        foreach (self::$fields as $field) {
//            if (array_key_exists($field, $this->data)) {
//                // trigger_error("$field is not present data");
//                return;
//            }
//        }
//        $this->validateEmpty();
//        return $this->error;
//    }
//
//    private function validateEmpty() {
//        $val = trim($this->data['proName']);
//
//        if (empty($val)) {
//            $this->addError('proName', 'username cannot be empty');
//        } else {
//            
//        }
//    }
//
//    private function validateEmail() {
//        
//    }
//
//    private function addError($key, $val) {
//        $this->errors[$key] = $val;
//    }

}
