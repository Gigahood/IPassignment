<?php

require_once 'HistoryMatch.php';

class CreateXML {

    private $HistoryMatch;

    function __construct($HistoryMatch) {
        $this->HistoryMatch = $HistoryMatch;
    }

    function getHistoryMatch() {
        return $this->HistoryMatch;
    }

    function setHistoryMatch($HistoryMatch): void {
        $this->HistoryMatch = $HistoryMatch;
    }

    function generateXML() {
        /* create a dom document with encoding utf8 */
        $domtree = new DOMDocument('1.0', 'UTF-8');

        /* create the root element of the xml tree */
        $xmlRoot = $domtree->createElement("competitions");
        /* append it to the document created */
        $xmlRoot = $domtree->appendChild($xmlRoot);

        $currentCompetition = $domtree->createElement("competition");
        $currentCompetition = $xmlRoot->appendChild($currentCompetition);

        $currentCompetition->appendChild($domtree->createElement('competitionID', '1'));
        $currentCompetition->appendChild($domtree->createElement('competitionName', 'WeiQi May Competition PJ'));

        $history = $currentCompetition->createElement("history");
        $history = $currentCompetition->appendChild($history);

//        $currentTrack = $domtree->createElement("track");
//        $currentTrack = $xmlRoot->appendChild($currentTrack);


        /* you should enclose the following two lines in a cicle */
//        $currentTrack->appendChild($domtree->createElement('path', 'song1.mp3'));
//        $currentTrack->appendChild($domtree->createElement('title', 'title of song1.mp3'));
//
//        $currentTrack->appendChild($domtree->createElement('path', 'song2.mp3'));
//        $currentTrack->appendChild($domtree->createElement('title', 'title of song2.mp3'));

        /* get the xml printed */
        echo $domtree->saveXML();

        $domtree->save('test1.xml');
    }

}
