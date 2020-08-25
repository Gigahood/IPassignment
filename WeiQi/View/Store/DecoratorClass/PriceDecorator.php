<?php

/**
 * Description of PriceDecorator
 *
 * @author Lim Yi En
 */
function __autoload($class_name) {
    include $class_name . '.php';
}

include_once 'class/Products.php';


class PriceDecorator {

//put your code here
    private $myProduct;
    private $description;

    public function __construct($pro_ID, $pro_name, $pro_desc, $total_qty, $pro_category, 
            $normal_price, $discount_rate, $pro_image, $admin_ID) {  

        $this->myProduct = new Products($pro_ID, $pro_name, $pro_desc, $total_qty, $pro_category, 
            $normal_price, $discount_rate, $pro_image, $admin_ID);
         
        $this->myProduct = $this->wrapComponent($this->myProduct);
        $this->description = $this->myProduct->calMemberPrice($this->myProduct->getNormal_price(), $this->myProduct->getDiscount_rate());
        // $this->description = $this->myProduct->calMemberPrice($this->myProduct->getNormal_price(), $this->myProduct->getDiscount_rate());
        
    }

    private function wrapComponent(ProductInterface $component) {
        $component = new DescDecorator($component, "Member Price: RM ");
        $component = new ColorDecorator($component);
        return $component;
    }
    
    public function getDescription () {
        return $this->description;
    }

}

//$worker = new PriceDecorator();

//echo $worker->getDescription();

?>
