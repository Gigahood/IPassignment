<?php

/*
 * @author Kat Tan
 */
require_once 'BookInterface.php';

class Book implements BookInterface {

  private $title;
  private $author;

  public function __construct($title, $author) {
    $this->title = $title;
    $this->author = $author;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function setAuthor($author) {
    $this->author = $author;
  }

  public function getBookDetails() {
    return $this->title . " by " . $this->author;
  }

}
