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
    private $data;
    private $errors = [];
    private static $fields = ['proName','proDesc', 'category', 'qty','price', 'discountRate','proImg'];
    
    public function __construct($post_data) {
        $this->data = $post_data;
    }
    
    public function validateForm() {
        foreach (self::$fields as $field){
            if(array_key_exists($field, $this->data)){
               // trigger_error("$field is not present data");
                return;
            }
        }
        $this->validateEmpty();
        return $this->error;
    }
    
    private function validateEmpty() {
        $val = trim($this->data['proName']);
        
        if(empty($val)){
            $this->addError('proName', 'username cannot be empty');
        } else {
            
        }
    }
    
    private function validateEmail() {
        
    }
    
    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}
