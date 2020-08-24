<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ColorDecorator
 *
 * @author Lim Yi En
 */
class ColorDecorator extends AbstractDecorator {

    //put your code here
    public function __construct($products) {
       
        parent::__construct($products);
    }

    public function decorate() {

        return "<span style='color: red'>" . $this->products->calMemberPrice($this->getNormal_price(), $this->getDiscount_rate() ). "</span>";
    }

    public function calMemberPrice($normal_price, $discount_rate) {
        return $this->decorate();
    }

    public function getDiscount_rate() {
       return $this->products->getDiscount_rate();
    }

    public function getNormal_price() {
        return $this->products->getNormal_Price();
    }

}
