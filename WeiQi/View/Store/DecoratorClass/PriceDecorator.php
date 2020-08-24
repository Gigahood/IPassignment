<?php

/**
 * Description of PriceDecorator
 *
 * @author Lim Yi En
 */
function __autoload($class_name) {
    include $class_name . '.php';
}
include_once '../Store/Products.php';

class PriceDecorator {

//put your code here
    private $myProduct;

    public function __construct() {  
        $this->myProduct = new Products ("", "", "", "", "", "20.00", "0.2", "", "");
        
        $this->myProduct = $this->wrapComponent($this->myProduct);
        $description = $this->myProduct->calMemberPrice($normal_price, $discount_rate);
        echo $description;
    }

    private function wrapComponent(ProductInterface $component) {
        $component = new DescDecorator($component, "Member Price: RM ");
        $component = new ColorDecorator($component);
        return $component;
    }

}

$worker = new PriceDecorator();
?>
