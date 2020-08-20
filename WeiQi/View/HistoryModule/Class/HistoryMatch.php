<?php

class HistoryMatch {
    private $matchDetail;
    private $startTime;
    private $endTime;
    private $black;
    private $white;
    private $boardSize;
    private $b_Score;
    private $w_Score;
    
    function __construct($matchDetail, $startTime, $endTime, $black, $white, $boardSize, $b_Score, $w_Score) {
        $this->matchDetail = $matchDetail;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->black = $black;
        $this->white = $white;
        $this->boardSize = $boardSize;
        $this->b_Score = $b_Score;
        $this->w_Score = $w_Score;
    }
    
    function getMatchDetail() {
        return $this->matchDetail;
    }

    function getStartTime() {
        return $this->startTime;
    }

    function getEndTime() {
        return $this->endTime;
    }

    function getBlack() {
        return $this->black;
    }

    function getWhite() {
        return $this->white;
    }

    function getBoardSize() {
        return $this->boardSize;
    }

    function getB_Score() {
        return $this->b_Score;
    }

    function getW_Score() {
        return $this->w_Score;
    }

    function setMatchDetail($matchDetail): void {
        $this->matchDetail = $matchDetail;
    }

    function setStartTime($startTime): void {
        $this->startTime = $startTime;
    }

    function setEndTime($endTime): void {
        $this->endTime = $endTime;
    }

    function setBlack($black): void {
        $this->black = $black;
    }

    function setWhite($white): void {
        $this->white = $white;
    }

    function setBoardSize($boardSize): void {
        $this->boardSize = $boardSize;
    }

    function setB_Score($b_Score): void {
        $this->b_Score = $b_Score;
    }

    function setW_Score($w_Score): void {
        $this->w_Score = $w_Score;
    }

    

}

