<?php
/*
 *
 * @author Kat Tan
 */
class KeywordsDecorator extends AbstractDecorator {
  private $description;
  
  public function __construct($book, $keywords) {
    parent::__construct($book);
    $this->description = $keywords;
  }
  
  public function getDescription() {
    return $this->description;
  }

  public function setDescription($keywords) {
    $this->description = $keywords;
  }

  public function decorate() {
    return $this->book->getBookDetails() . ", " . $this->description;
  }
  
  public function getBookDetails() {
    return $this->decorate(); 
  }

}
