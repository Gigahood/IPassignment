<?php
/**
 * @author Kat Tan
 */

function __autoload($class_name) {
  include $class_name . '.php';
}

class DecoratorDemo {
  private $myBook;
  
  public function __construct() {
    $this->myBook = new Products("","","","","","50.0","","","");
    
//    $description = $this->myBook->getBookDetails();
//    echo "<p>Before applying 'decorations': $description</p>";
    
    $this->myBook = $this->wrapComponent($this->myBook);
    
    
    $description = $this->myBook->calMemberPrice($this->myBook->getNormalPrice(),$this->myBook->getDiscountn());
    echo "Recommended Book: $description";
  }
  
  private function wrapComponent(ProductInterface $component) {
//    $component = new KeywordsDecorator($component, "A classic children's book!");
    $component = new BoldDecorator($component);
    return $component;
  }
  
}

$worker = new DecoratorDemo();

?>
