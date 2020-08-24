<?php

/*
 *
 * @author Kat Tan
 */

class BoldDecorator extends AbstractDecorator {

    public function __construct($product) {
        parent::__construct($product);
    }

    public function decorate() {
        return $this->makeBold();
    }

    public function makeBold() {
        return "<Strong>" . $this->product->getNormal_price() . "</Strong>";
    }

//    public function getBookDetails() {
//        return $this->decorate();
//    }

    public function calMemberPrice($normal_price, $discount_rate) {
        return $this->decorate();
    }

    public function getDiscountn() {
        return $this->product->getDiscount_rate();
    }

    public function getNormalPrice() {
        return $this->product->getNormal_Price();
    }

}
