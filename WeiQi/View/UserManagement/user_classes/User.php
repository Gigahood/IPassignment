<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Jane Chew
 */

abstract class User {
    //put your code here
    private $user_name;
    private $user_email;
    private $user_dob;
    private $user_address;
    private $user_contact;
    private $user_pw;
    private $user_pic;
    private $user_IC;
    private $user_role;
    
    public function __construct($user_name, $user_email, $user_dob, $user_address, $user_contact, $user_pw, $user_pic, $user_IC, $user_role) {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_dob = $user_dob;
        $this->user_address = $user_address;
        $this->user_contact = $user_contact;
        $this->user_pw = $user_pw;
        $this->user_pic = $user_pic;
        $this->user_IC = $user_IC;
        $this->user_role = $user_role;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }

    /*public function __toString() {
        return "$this->user_name!<br />";
    }*/

}
