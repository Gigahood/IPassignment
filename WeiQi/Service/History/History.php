<?php
require_once 'participant.php';
require_once 'Match.php';

class History {
    private $historyID;
    private $competitionID;
    private $startDate;
    private $endDate;
    private $remark;
    private $matchList;
    private $participantList;
    
    function __construct($historyID, $competitionID, $startDate, $endDate, $remark, $matchList) {
        $this->historyID = $historyID;
        $this->competitionID = $competitionID;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->remark = $remark;
        $this->matchList = Array();
        $this->participantList = Array();
    }
    
    function getHistoryID() {
        return $this->historyID;
    }

    function getCompetitionID() {
        return $this->competitionID;
    }

    function getStartDate() {
        return $this->startDate;
    }

    function getEndDate() {
        return $this->endDate;
    }

    function getRemark() {
        return $this->remark;
    }

    function getMatchList() {
        return $this->matchList;
    }

    function getParticipantList() {
        return $this->participantList;
    }

    function setHistoryID($historyID): void {
        $this->historyID = $historyID;
    }

    function setCompetitionID($competitionID): void {
        $this->competitionID = $competitionID;
    }

    function setStartDate($startDate): void {
        $this->startDate = $startDate;
    }

    function setEndDate($endDate): void {
        $this->endDate = $endDate;
    }

    function setRemark($remark): void {
        $this->remark = $remark;
    }

    function setMatchList($match): void {
        array_push($this->matchList, $match);
    }

    function setParticipantList($participant): void {
        array_push($this->participantList, $participant);
    }



        
    
}