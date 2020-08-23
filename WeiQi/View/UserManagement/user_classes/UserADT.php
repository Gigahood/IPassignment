<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user 
 *
 * @author Jane Chew
 */
interface UserADT {
    //put your code here
    
    public function createAccount($userID, $username, $useremail, $userdob, $useraddress, $usercontact, $userpw, $userpic, $userIC, $userrole);
    /*
    Description     : to add a new account to weiqi system
    Precondition    : user details is not null 
    Postcondition   : user detail is added to the system database
    Return          : successfully created acc message & redirect to homepage. 
                        Else, fail to create acc massage & reason provided.
    */
    
    public function viewProfile();
    /*
    Description     : to view a user profile
    Precondition    : user has login into the account successfully.
    Postcondition   : the user profile is display.
    Return          : the user profile web page with correct data.
    */
    
    public function updateProfile();
    /*
    Description     : to update a user profile
    Precondition    : user has login into the account successfully.
    Postcondition   : the user profile is display.
    Return          : the user profile web page with correct data & is editable.
    */

}
