<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Participant
 *
 * @author Jane Chew
 */

//NO USE //

require_once 'User.php';
require_once 'UserADT.php';

class Participant extends User {
    //put your code here
    public function __construct($user_name, $user_email, $user_dob, $user_address, $user_contact, $user_pw, $user_pic, $user_IC) {
        parent::__construct($user_name);
        parent::__construct($user_email);
        parent::__construct($user_dob);
        parent::__construct($user_address);
        parent::__construct($user_contact);
        parent::__construct($user_pw);
        parent::__construct($user_pic);
        parent::__construct($user_IC);
    }
    
    public function __set($name, $value) {
        if(property_exists($this, $name))
            $this->$name = $value;
        else
            parent::__set($name, $value);
    }
    
    public function __get($name) {
        if (property_exists($this, $name))
            return $this->$name;
        else
            return parent::__get($name);
    }  
   
}
