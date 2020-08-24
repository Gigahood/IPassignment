<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Competition
 *
 * @author Cheng Qing Xiang
 */
class Competition {
    //put your code here
    private $competition_year;
    private $competition_name;
    private $competition_start_date;
    private $competition_end_date;
    private $competition_venue;
    private $competition_reg_fee;
    private $competition_PIC;
    private $competition_prize_pool;
    private $competition_total_participate;
    
    public function __construct($competition_year, $competition_name, $competition_start_date, $competition_end_date, $competition_venue, $competition_reg_fee, $competition_PIC, $competition_prize_pool, $competition_total_participate) {
        $this->competition_year = $competition_year;
        $this->competition_name = $competition_name;
        $this->competition_start_date = $competition_start_date;
        $this->competition_end_date = $competition_end_date;
        $this->competition_venue = $competition_venue;
        $this->competition_reg_fee = $competition_reg_fee;
        $this->competition_PIC = $competition_PIC;
        $this->competition_prize_pool = $competition_prize_pool;
        $this->competition_total_participate = $competition_total_participate;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }

    public function getDateDetail($competition_start_date, $competition_end_date) { 
    $competition_name = $this->__set($competition_start_date, $competition_end_date);
    // process and return
    echo "<p>For duration $competition_start_date to $competition_end_date:<br/>";
    echo "<br />List of competition available: <br />$competition_name<br />"; 
    //echo "<br />List of flights available: <br />$flights<br /></p>";
  }
    /*public function __toString() {
        return "$this->user_name!<br />";
    }*/

}
