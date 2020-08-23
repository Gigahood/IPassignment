<?php

class Ranking{
    private $name;
    private $score;
    
    function __construct($name, $score = 0) {
        $this->name = $name;
        $this->score = $score;
    }
    
    function getName() {
        return $this->name;
    }

    function getScore() {
        return $this->score;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setScore($score): void {
        $this->score = $score;
    }



}