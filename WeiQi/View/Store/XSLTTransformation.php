<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XSLTTransformation
 *
 * @author User
 */
class XSLTTransformation {
    //put your code here
    public function __construct($xmlfilename, $xslfilename) {
    $xml = new DOMDocument();
    $xml->load($xmlfilename);
    
    $xsl = new DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}

$worker = new XSLTTransformation("Store.xml", "StoreXSLT.xsl");

?>
