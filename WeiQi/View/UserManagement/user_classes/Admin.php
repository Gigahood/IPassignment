<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Jane Chew
 */
require_once 'User.php';

class Admin extends User{
    //put your code here
    public function __construct($user_name, $user_email, $user_dob, $user_address, 
            $user_contact, $user_pw, $user_pic, $user_IC, $user_role) {
        
        parent::__construct($user_name);
        parent::__construct($user_email);
        parent::__construct($user_dob);
        parent::__construct($user_address);
        parent::__construct($user_contact);
        parent::__construct($user_pw);
        parent::__construct($user_pic);
        parent::__construct($user_IC);
        parent::__construct($user_role);
        
    }
    
    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            parent::__set($name, $value);
        }
    }
    
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        else {
            return parent::__get($name);
        }
    }
    
    /*public function getUserRole(){
        return parent::getUserRole();
    }
    
    public function userPrivilege(){
        return $this->getUserRole() . " <br />" . 
                "&emsp;- Create an user account <br /> " . 
                "&emsp;- View & Update user account <br />" . 
                "&emsp;- Create a competition event <br />" . 
                "&emsp;- Delete own or others user account <br />" .
                "&emsp;- View and Update a competition event <br />" . 
                "&emsp;- Delete a competition event <br />" .
                "&emsp;- View competition details and history <br />" . 
                "&emsp;- View store items <br />" . 
                "&emsp;- Add a new store item <br />" . 
                "&emsp;- Update & Delete a new store item <br />";
        
    }*/
    
}
