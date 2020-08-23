<?php

class CompetitionHistory {
    private $name;
    private $history;
    private $id;
    
    function __construct($name, $history, $id) {
        $this->name = $name;
        $this->history = $history;
        $this->id = $id;
    }
    
    function getName() {
        return $this->name;
    }

    function getHistory() {
        return $this->history;
    }

    function getId() {
        return $this->id;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setHistory($history): void {
        $this->history = $history;
    }

    function setId($id): void {
        $this->id = $id;
    }

}