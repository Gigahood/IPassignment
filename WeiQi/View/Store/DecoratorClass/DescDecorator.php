<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DescDecorator
 *
 * @author Lim Yi En
 */
class DescDecorator {
    //put your code here
    private $description;
  
  public function __construct($products, $title) {
    parent::__construct($products);
    $this->description = $title;
  }
  
  public function getDescription() {
    return $this->description;
  }

  public function setDescription($title) {
    $this->description = $title;
  }

  public function decorate() {
    return $this->description . $this->product->calMemberPrice($normal_price, $discount_rate);
  }
  
  public function calMemberPrice($normal_price, $discount_rate) {
    return $this->decorate(); 
  }
}
