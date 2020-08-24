<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParticipantFactory
 *
 * @author Jane Chew
 */

require_once 'UserFactory.php';

class ParticipantFactory extends UserFactory {
    //put your code here
    function __construct() {
  }
  
  public function role(){
      return "Participant";
  }
  
  public function privilege() {
    return $this->role() . " <br />" .  
                "&emsp;- View & Update user account <br />" . 
                "&emsp;- Participate in a competition <br />" . 
                "&emsp;- View competition details and history <br />" . 
                "&emsp;- View store items <br />";
  }
  
}
