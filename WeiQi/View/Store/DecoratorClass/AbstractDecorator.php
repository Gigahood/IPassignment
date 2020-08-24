<?php

/**
 * Description of AbstractDecorator
 *
 * @author Lim Yi En
 */
require_once 'ProductInterface.php';

abstract class AbstractDecorator implements ProductInterface {

    //put your code here
    protected $products;

    public function __construct($products) {
        $this->products = $products;
    }

    public function getMemberPrice() {
        return $this->products;
    }

    public function setMemberPrice($products) {
        $this->products = $products;
    }

    public abstract function decorate();
}
