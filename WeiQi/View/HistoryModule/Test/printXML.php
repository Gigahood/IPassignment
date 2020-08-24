<?php

/* create a dom document with encoding utf8 */
//$domtree = new DOMDocument('1.0', 'UTF-8');
//
///* create the root element of the xml tree */
//$xmlRoot = $domtree->createElement("xml");
///* append it to the document created */
//$xmlRoot = $domtree->appendChild($xmlRoot);
//
//$currentTrack = $domtree->createElement("track");
//$currentTrack = $xmlRoot->appendChild($currentTrack);
//
///* you should enclose the following two lines in a cicle */
//$currentTrack->appendChild($domtree->createElement('path', 'song1.mp3'));
//$currentTrack->appendChild($domtree->createElement('title', 'title of song1.mp3'));
//
//$currentTrack->appendChild($domtree->createElement('path', 'song2.mp3'));
//$currentTrack->appendChild($domtree->createElement('title', 'title of song2.mp3'));

$domtree = new DOMDocument('1.0', 'UTF-8');

/* create the root element of the xml tree */
$xmlRoot = $domtree->createElement("competitions");
/* append it to the document created */
$xmlRoot = $domtree->appendChild($xmlRoot);

$currentCompetition = $domtree->createElement("competition");
$currentCompetition = $xmlRoot->appendChild($currentCompetition);

$currentCompetition->appendChild($domtree->createElement('competitionID', '1'));
$currentCompetition->appendChild($domtree->createElement('competitionName', 'WeiQi May Competition PJ'));

$history = $domtree->createElement("history");
$history = $currentCompetition->appendChild($history);

$history->appendChild($domtree->createElement("historyStartDate", "123"));

//$currentCompetition->appendChild($domtree->createElement("history"));
//$currentCompetition->appendChild($domtree->createElement("historyStartDate", "123"));



/* get the xml printed */
echo $domtree->saveXML();

$domtree->save('test3.xml');
?>