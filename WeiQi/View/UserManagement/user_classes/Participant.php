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

require_once 'User.php';

class Participant extends User {
    //put your code here
    private $list_of_participation;
    private $total_score;
    private $role;

    public function __construct($user_name, $user_email, $user_dob, $user_address, 
            $user_contact, $user_pw, $user_pic, $user_IC, $user_role, 
            $list_of_participation, $total_score, $role) {
        
        parent::__construct($user_name);
        parent::__construct($user_email);
        parent::__construct($user_dob);
        parent::__construct($user_address);
        parent::__construct($user_contact);
        parent::__construct($user_pw);
        parent::__construct($user_pic);
        parent::__construct($user_IC);
        parent::__construct($user_role);

        $this->list_of_participation = $list_of_participation;
        $this->total_score = $total_score;
        $this->role = $role;
        
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
    
    public function getUserRole(){
        return parent::getUserRole();
    }
    
    public function userPrivilege(){
        return $this->getUserRole() . " <br />" .  
                "&emsp;- View & Update user account <br />" . 
                "&emsp;- Participate in a competition <br />" . 
                "&emsp;- View competition details and history <br />" . 
                "&emsp;- View store items <br />";
    }
}
