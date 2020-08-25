<?php

include_once 'AbstractDatabaseConnection.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of CompetitionDBConnection
 *
 * @author Cheng Qing Xiang
 */
class CompetitionDBConnection extends AbstractDatabaseConnection {
   
    public function retrieveCompetition(){
        //$query = "SELECT * FROM competiton WHERE competition_name = ?";
        $query = "SELECT competition_name FROM competiton";
        $stmt = parent::$db->prepare($query);
        //$stmt->bindParam(1, $competitionname, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    public function createCompetition($competitionID, $competitionYear, $competitionName, $competitionStartDate, $competitionEndDate, $competitionVenue, $competitionRegFee, $competitionPIC, $competitionPrizePool, $competitionTotalParticipate) {
          $query = "INSERT INTO competition(competition_ID, competition_year, competition_name, competition_start_date, competition_end_date, competition_venue, competition_reg_fee, competition_PIC, competition_prize_pool, competition_total_participate)"
                  . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = parent::$db->prepare($query);
          $stmt->bindParam(1, $competitionID, PDO::PARAM_INT);
          $stmt->bindParam(2, $competitionYear, PDO::PARAM_INT);
          $stmt->bindParam(3, $competitionName, PDO::PARAM_STR);
          $stmt->bindParam(4, $competitionStartDate, PDO::PARAM_STR);
          $stmt->bindParam(5, $competitionEndDate, PDO::PARAM_STR);
          $stmt->bindParam(6, $competitionVenue, PDO::PARAM_STR);
          $stmt->bindParam(7, $competitionRegFee, PDO::PARAM_INT);
          $stmt->bindParam(8, $competitionPIC, PDO::PARAM_INT);
          $stmt->bindParam(9, $competitionPrizePool, PDO::PARAM_STR);
          $stmt->bindParam(10, $competitionTotalParticipate, PDO::PARAM_INT);
          
          $stmt->execute();
    }
    
        public function updateCompetition($competitionID, $competitionYear, $competitionName, $competitionStartDate, $competitionEndDate, $competitionVenue, $competitionRegFee, $competitionPIC, $competitionPrizePool, $competitionTotalParticipate) {
          $query = "UPDATE INTO competition(competition_ID, competition_year, competition_name, competition_start_date, competition_end_date, competition_venue, competition_reg_fee, competition_PIC, competition_prize_pool, competition_total_participate)"
                  . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = parent::$db->prepare($query);
          $stmt->bindParam(1, $competitionID, PDO::PARAM_INT);
          $stmt->bindParam(2, $competitionYear, PDO::PARAM_STR);
          $stmt->bindParam(3, $competitionName, PDO::PARAM_STR);
          $stmt->bindParam(4, $competitionStartDate, PDO::PARAM_STR);
          $stmt->bindParam(5, $competitionEndDate, PDO::PARAM_STR);
          $stmt->bindParam(6, $competitionVenue, PDO::PARAM_STR);
          $stmt->bindParam(7, $competitionRegFee, PDO::PARAM_STR);
          $stmt->bindParam(8, $competitionPIC, PDO::PARAM_LOB);
          $stmt->bindParam(9, $competitionPrizePool, PDO::PARAM_STR);
          $stmt->bindParam(10, $competitionTotalParticipate, PDO::PARAM_STR);
          
          $stmt->execute();
    }
}