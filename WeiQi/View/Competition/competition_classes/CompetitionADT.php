<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user 
 *
 * @author Cheng Qing Xiang
 */
interface CompetitionADT {
    //put your code here
    
    public function createCompetition($competitionID, $competitionYear, $competitionName, $competitionStartDate, $competitionEndDate, $competitionVenue, $competitionRegFee, $competitionPIC, $competitionPrizePool, $competitionTotalParticipate);
    /*
    Description     : to add a new competition to weiqi system
    Precondition    : competition details is not null 
    Postcondition   : competition detail is added to the system database
    Return          : successfully created competition message & redirect to homepage. 
                        Else, fail to create competition massage & reason provided.
    */
    
    public function updateCompetition($competitionID, $competitionYear, $competitionName, $competitionStartDate, $competitionEndDate, $competitionVenue, $competitionRegFee, $competitionPIC, $competitionPrizePool, $competitionTotalParticipate);
    /*
    Description     : to update a exist competition in weiqi system
    Precondition    : competition details is not null 
    Postcondition   : competition detail is updated to the system database
    Return          : successfully updated competition message & redirect to homepage. 
                        Else, fail to update competition massage & reason provided.
    */

}
