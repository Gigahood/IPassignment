<?php

include_once '../../View/HistoryModule/Class/HistoryMatch.php';
include_once '../../View/HistoryModule/Class/history.php';
include_once '../../View/HistoryModule/Class/participant.php';

class SAXParser {

    private $filename;
    private $history;
    private $matches;
    private $matchTemp;
    private $tmpValue;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->matches = array();
        $this->parseDocument();
    }

    public function startElement($parser, $name, $attr) {
        if (!empty($name)) {
            if ($name == 'MATCH') {
                // if current element is account, create new account object
                $this->matchTemp = new HistoryMatch();
            }
            if ($name == 'COMPETITION') {
                $this->history = new History();
            }
        }
    }

    public function endElement($parser, $name) {

        if ($name == 'MATCH') {
            $this->matches[] = $this->matchTemp;
        } elseif ($name == 'COMPETITIONID') {
            $this->history->setId($this->tmpValue);
        } elseif ($name == 'REMARK') {
            $this->history->setRemark($this->tmpValue);
        } elseif ($name == 'COMPETITIONNAME') {
            $this->history->setName($this->tmpValue);
        } elseif ($name == 'HISTORYSTARTDATE') {
            $this->history->setHstart($this->tmpValue);
        } elseif ($name == 'HISTORYENDDATE') {
            $this->history->setHend($this->tmpValue);
        } elseif ($name == 'MATCHDETAIL') {
            $this->matchTemp->setMatchDetail($this->tmpValue);
        } elseif ($name == 'STARTTIME') {
            $this->matchTemp->setStartTime($this->tmpValue);
        } elseif ($name == 'ENDTIME') {
            $this->matchTemp->setEndTime($this->tmpValue);
        } elseif ($name == 'BLACKUSER') {
            $this->matchTemp->setBlack($this->tmpValue);
        } elseif ($name == 'WHITEUSER') {
            $this->matchTemp->setWhite($this->tmpValue);
        } elseif ($name == 'BLACKSCORE') {
            $this->matchTemp->setB_Score($this->tmpValue);
        } elseif ($name == 'WHITESCORE') {
            $this->matchTemp->setW_Score($this->tmpValue);
        } elseif ($name == 'BOARDSIZE') {
            $this->matchTemp->setBoardSize($this->tmpValue);
        }
    }

    // when need to get the content, data being between the close and open tag
    // invoked when parser function invoked
    public function characters($parser, $data) {
        if (!empty($data)) {
            $this->tmpValue = trim($data);
        }
    }

    private function parseDocument() {
        $parser = xml_parser_create();
        xml_set_element_handler($parser,
                array($this, "startElement"),
                array($this, "endElement"));

        xml_set_character_data_handler($parser, array($this, "characters"));

        try {
            if (!($handle = fopen($this->filename, "r"))) {
                die("could not open XML input");
            }
        } catch (Exception $ex) {
            
        }


        while ($data = fread($handle, 4096)) {
            xml_parse($parser, $data);
        }
    }

    public function printData() {
        echo "<h1>Something</h1>";

        print_r($this->matches);

        print_r($this->history);
    }

    public function getHistory() {
        return $this->history;
    }

    public function getMatches() {
        return $this->matches;
    }

}
?>

