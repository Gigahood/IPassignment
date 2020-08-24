<?php

require_once 'HistoryController.php';

function generateXML($competitionID, $dSession) {
    $history = getHistoryDetail($competitionID, $dSession);


//    print_r($history->getName());
//    print_r($history->getHstart());
////    
//    print_r($history);

    printXML($history);

//    foreach($history->getMatches() as $value) {
//        print_r($value["match_ID"]);
//    }
}

function printXML($compHistory) {
    $domtree = new DOMDocument('1.0', 'UTF-8');

    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement("competitions");
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);

    $currentCompetition = $domtree->createElement("competition");
    $currentCompetition = $xmlRoot->appendChild($currentCompetition);

    $currentCompetition->appendChild($domtree->createElement('competitionID', $compHistory->getId()));
    $currentCompetition->appendChild($domtree->createElement('competitionName', $compHistory->getName()));

    $history = $domtree->createElement("history");
    $history = $currentCompetition->appendChild($history);


    $history->appendChild($domtree->createElement("historyStartDate", $compHistory->getHstart()));
    $history->appendChild($domtree->createElement("historyEndDate", $compHistory->getHend()));

    $matches = $domtree->createElement("matches");
    $matches = $history->appendChild($matches);

    foreach ($compHistory->getMatches() as $value) {
        $match = $domtree->createElement("match");
        $match = $matches->appendChild($match);

        $match->appendChild($domtree->createElement("matchDetail", $value["match_Detail"]));
        $match->appendChild($domtree->createElement("startTime", $value["start_Time"]));
        $match->appendChild($domtree->createElement("endTime", $value["end_Time"]));
        $match->appendChild($domtree->createElement("blackUser", getName($value["black_User"], 'admin')));
        $match->appendChild($domtree->createElement("whiteUser", getName($value["white_User"], 'admin')));
        $match->appendChild($domtree->createElement("blackScore", $value["black_Score"]));
        $match->appendChild($domtree->createElement("whiteScore", $value["white_Score"]));
        $match->appendChild($domtree->createElement("boardSize", $value["board_Size"]));
    }

    /* get the xml printed */
     $domtree->saveXML();

//    $domtree->save('test4.xml');
    $domtree->save($compHistory->getName() . '.xml');
}

