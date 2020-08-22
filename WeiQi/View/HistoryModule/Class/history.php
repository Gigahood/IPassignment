<?php

require_once 'Competition.php';

class History extends Competition {

    private $history_ID;
    private $hstart;
    private $hend;
    private $remark;
    private $participantList;
    private $matches;

    function __construct($history_ID, $hstart, $hend, $compID, $name, $remark) {
        parent::__construct($compID, $name);
        $this->history_ID = $history_ID;
        $this->hstart = $hstart;
        $this->hend = $hend;
        $this->remark =  $remark;
        $this->participantList = array();
        $this->matches = array();
    }

    function getHistory_ID() {
        return $this->history_ID;
    }

    function getHstart() {
        return $this->hstart;
    }

    function getRemark() {
        return $this->remark;
    }

    function setRemark($remark): void {
        $this->remark = $remark;
    }

    
    function getHend() {
        return $this->hend;
    }

    function getParticipantList() {
        return $this->participantList;
    }

    function getMatches() {
        return $this->matches;
    }

    function setParticipantList($participantList): void {
        array_push($this->participantList, $participantList);
    }

    function setMatches($matches): void {
        array_push($this->matches, $matches);
    }

    function setHistory_ID($history_ID): void {
        $this->history_ID = $history_ID;
    }

    function setHstart($hstart): void {
        $this->hstart = $hstart;
    }

    function setHend($hend): void {
        $this->hend = $hend;
    }

}
