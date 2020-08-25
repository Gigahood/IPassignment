<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminFactory
 *
 * @author Jane Chew
 */
require_once 'UserFactory.php';

class AdminFactory extends UserFactory {
    //put your code here
  function __construct() {
  }
  
  public function role(){
      return "Staff";
  }
  
  public function privilege() {
    return $this->role() . " <br />" . 
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
  }
}
