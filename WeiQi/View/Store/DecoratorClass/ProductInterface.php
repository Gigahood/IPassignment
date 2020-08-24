<?php

/**
 *
 * @author Lim Yi En
 */

interface ProductInterface {
    //put your code here
    public function calMemberPrice($normal_price, $discount_rate);
    function getDiscount_rate();
    function getNormal_price();
    //public function decription();
    //public function price();
}
