<?php

class ParticipantList {
    private $participantListID;
    private $historyID;
    private $userID;
    private $score;
    
    function __construct($participantListID, $historyID, $userID, $score) {
        $this->participantListID = $participantListID;
        $this->historyID = $historyID;
        $this->userID = $userID;
        $this->score = $score;
    }
    

    function getHistoryID() {
        return $this->historyID;
    }

    public function getUserID() {
        return $this->userID;
    }

    function getScore() {
        return $this->score;
    }
    function getParticipantListID() {
        return $this->participantListID;
    }

    function setParticipantListID($participantListID): void {
        $this->participantListID = $participantListID;
    }

    
    function setHistoryID($historyID): void {
        $this->historyID = $historyID;
    }

    function setUserID($userID): void {
        $this->userID = $userID;
    }

    function setScore($score): void {
        $this->score = $score;
    }



}
