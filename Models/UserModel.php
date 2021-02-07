<?php

//Class usermodel
class userModel {

    //Proctected values
<<<<<<< Updated upstream
    protected $_id, $_username, $_password,$_admin;
    protected $email;
=======
    protected $_id, $_username, $_password;
>>>>>>> Stashed changes

    //Constructor
    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_username = $dbRow['username'];
        $this->_password = $dbRow['password'];
<<<<<<< Updated upstream
        //test for admin
        $this->_admin = $dbRow['admin'];
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

    public function getAdmin() {//gets admin
        return $this->_admin;
    }

    //Method which returns email
    public function getEmail()
    {
        return $this->getEmail();
    }
}
=======
}
>>>>>>> Stashed changes
