<?php
/**
 * @author Kat Tan
 */
require_once 'ProductInterface.php';

abstract class AbstractDecorator implements ProductInterface {
  protected $product;
  
  public function __construct($product) {
    $this->product = $product;
  }
  
  public function getProduct() {
    return $this->product;
  }

  public function setBook($product) {
    $this->product = $product;
  }
  
  public abstract function decorate();

}
