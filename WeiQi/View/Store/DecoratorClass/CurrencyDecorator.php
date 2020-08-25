<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurrencyDecorator
 *
 * @author Lim Yi En
 */
//class CurrencyDecorator extends AbstractDecorator {
//    //put your code here
//    private $description;
//
//    public function __construct($products, $title) {
//        parent::__construct($products);
//        $this->description = $title;
//    }
//
//    public function getDescription() {
//        return $this->description;
//    }
//
//    public function setDescription($title) {
//        $this->description = $title;
//    }
//
//    public function decorate() {
//        $normalUSD = $this->description .
//                number_format(($this->products->getNormal_price())* 4.18, 2);
//        $memUSD = $this->description . 
//                ($this->products->calMemberPrice($this->getNormal_price(), $this->getDiscount_rate()))* 4.18;
//        return "$normalUSD <br/> $memUSD";
//    }
//
//    public function calMemberPrice($normal_price, $discount_rate) {
//        return $this->decorate();
//    }
//
//    public function getDiscount_rate() {
//       return $this->products->getDiscount_rate();
//    }
//
//    public function getNormal_price() {
//        return $this->products->getNormal_Price();
//    }
//}
