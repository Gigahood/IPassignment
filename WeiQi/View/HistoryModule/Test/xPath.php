<?php

class DOMXPathDemo {
 private $xpath;
  
  public function __construct($filename) {
    $doc = new DOMDocument();
    $doc->load($filename);
    $this->xpath = new DOMXPath($doc);
  }
  
  public function display($expr) {
    $prices = $this->xpath->query($expr);
//    foreach ($prices as $price) {
//      echo $price->nodeValue . "<br />";
//    }
    return $prices;
  }
  
  public function assign($expr) {
      $a = $this->xpath->query($expr);
      $b = $a->nodeValue;
      
      return $b;
  }
  
  public function evaluate($expr) {
    $result = $this->xpath->evaluate($expr);
    echo $result . "<br />";
  }
}

$worker = new DOMXPathDemo("WeiQi Middle Class Match.xml");

$b = $worker->display("//competition/competitionID");

foreach ($b as $c) {
    echo $c->nodeValue;
}


//echo "<p><h3>Using XPath expression '//price': </h3>";
//$worker->display("//price");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd/price': </h3>";
//$worker->display("/catalog/cd/price");
//
//echo "<p><h3>Using XPath expression '//title': </h3>";
//$worker->display("//price");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd/price': </h3>";
//$worker->display("/catalog/cd/title");
//
//echo "<p><h3>Using XPath expression '//price/text()': </h3>";
//$worker->display("//price/text()");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd/price/text()': </h3>";
//$worker->display("/catalog/cd/price/text()");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd[price<10]': </h3>";
//$worker->display("/catalog/cd[price<10]");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd[@country='UK']/price/text()': </h3>";
//$worker->display("/catalog/cd[@country='UK']/price/text()");
//
//echo "</p><p><h3>Using XPath expression '/catalog/cd/@country': </h3>";
//$worker->display("/catalog/cd/@country");
//
//echo "</p><p><h3>Using XPath expression 'count(//artist)': </h3>";
//$worker->evaluate("count(//artist)");
//
//echo "</p><p><h3>Using XPath expression 'sum(//cd[price < 10]/price)': </h3>";
//$worker->evaluate("sum(//cd[price < 10]/price)");

?>
