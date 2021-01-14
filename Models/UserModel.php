<?php

//Class usermodel
class userModel {

    //Proctected values
    protected $_id, $_username, $_password;
    protected $email;

    //Constructor
    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_username = $dbRow['username'];
        $this->_password = $dbRow['password'];
    }

    //Method which returns ID
    public function getID() {
        return $this->_id;
    }

    //Method which returns username
    public function getUserName() {
        return $this->_username;
    }

    //Method which returns password
    public function getPassword() {
        return $this->_password;
    }

    //Method which returns email
    public function getEmail()
    {
        return $this->getEmail();
    }
}
