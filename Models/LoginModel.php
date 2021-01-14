<?php
require_once 'Database.php';        //Requires database model
require_once 'UserDataSet.php';     //Requires user data set model

//Class login model
class LoginModel
{
    protected $_dbConnection, $_dbInstance;     //protected values

    //Constructor
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();       //Connect to database
        $this->_dbConnection = $this->_dbInstance->getDbConnection();  //gets the database connection
    }

    //Method login to allow users to login
    public function login($email, $psw)
    {
        $userDataset = new userDataSet();               //Gets the user data set
        $userData =  $userDataset->fetchUsers($email);  //Fetches the users

        //If statement used to verify password and get the password
        if(isset($userData[0]) && password_verify($psw, $userData[0]->getPassword()))
        {
            $_SESSION["id"] = $userData[0]->getID();    //gets ID
            $_SESSION["username"] = $email;                 //gets email
            return true;                                    //If the information is right then return true
        }
        return false;                                       //else return false
    }

    //Register method allowing users to register
    public function register($username, $password) {
        $userDataset = new userDataset();                       //new user data set
        return $userDataset->addUser($username, $password);     //returns user data set and calls add user method
    }

}