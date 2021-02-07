<?php
require_once 'Database.php';        //Requires database model
require_once 'UserDataSet.php';     //Requires user data set model
require_once ('UserModel.php');   //Requiring the user model

//Class login model
class LoginModel
{
    protected $_dbConnection, $_dbInstance;     //protected values
    protected $_dbHandle;

    //Constructor
    public function __construct()
    {
<<<<<<< Updated upstream
        $this->_dbInstance = Database::getInstance();       //Connect to database
        $this->_dbConnection = $this->_dbInstance->getDbConnection();  //gets the database connection
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
=======
        $this->_dbInstance = Database::getInstance();                   //Connect to database
        $this->_dbConnection = $this->_dbInstance->getDbConnection();   //gets the database connection
>>>>>>> Stashed changes
    }

    //Method login to allow users to login//Need to redo with a returned array
    public function login($email, $psw)
    {
        $userDataset = new userDataSet();               //Gets the user data set
        $userData =  $userDataset->fetchUsers($email);  //Fetches the users

        //If statement used to verify password and get the password
        if(isset($userData[0]) && password_verify($psw, $userData[0]->getPassword()))
        {
            $_SESSION["id"] = $userData[0]->getID();        //gets ID
            $_SESSION["username"] = $email;                 //gets email
            return true;                                    //If the information is right then return true
        }
        return false;                                       //else return false
    }

    public function adminLogin($username,$password)
    {
        $sqlQuery = "SELECT username,password,admin FROM users WHERE username='$username' AND password='$password'"; //This cant work with null data

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            //array_push($dataSet, new userModel($row));
            $dataSet[] = new userModel($row);
        }
        return $dataSet;

    }

    //Register method allowing users to register
    public function register($username, $password) {
        $userDataset = new userDataset();                       //new user data set
        return $userDataset->addUser($username, $password);     //returns user data set and calls add user method to add users to the database
    }

}