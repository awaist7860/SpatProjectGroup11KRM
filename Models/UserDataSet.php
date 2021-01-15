<?php

require_once ('Database.php');    //Requiring the database model
require_once ('userModel.php');   //Requiring the user model

//Class userdataset
class userDataSet {
    protected $_dbHandle, $_dbInstance;     //protected values

    //Contructor
    public function __construct() {
        $this->_dbInstance = Database::getInstance();                           //Connect to database
        $this->_dbHandle = $this->_dbInstance->getdbConnection();               //gets the database connection
    }

    //Method which fetches users using SQL
    public function fetchUsers($name) {
        $sqlQuery = "SELECT * FROM hc21_11.users WHERE username = ?" ;  //SQL Statement to select * from users
        //$sqlQuery = "SELECT * FROM hc21_11.users WHERE username = ?" ;  //SQL Statement to select * from users

        $statement = $this->_dbHandle->prepare($sqlQuery);      // prepare a PDO statement
        $statement->execute(array($name));                      // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new userModel($row));
        }
        return $dataSet;                                        //Returns dataset
    }

    public function getAllUsers()
    {
        $sqlQuery = "SELECT * FROM users";  //SQL Statement to select * from users

        $statement = $this->_dbHandle->prepare($sqlQuery);      // prepare a PDO statement
        $statement->execute();                      // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new userModel($row));
        }
        return $dataSet;
    }

    //Method which adds users into database
    public function addUser($name, $password) {
        // Check if username exists
        $usersWithUsername = $this->fetchUsers($name);
        if(count($usersWithUsername) ===  0) {
            $sqlQuery = "INSERT INTO hc21_11.users (username, password) VALUES(?, ?)";      //Inserts into users database
            $statement = $this->_dbHandle->prepare($sqlQuery);                      // prepare a PDO statement
            $statement->execute(array($name, $password));                           // prepare a PDO statement
            return true;                                                            //Returns true is username exists
        }
        return false;                                                               //else returns false
    }

    public function fetchAdmin()
    {
        $sqlQuery = "SELECT * FROM hc21_11.users";

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new User($row);
        }
        return $dataSet;

    }

    public function loginUser($username, $password)
    {
        $sqlQuery = "SELECT username,password FROM hc21_11.users WHERE username = '$username' AND password = '$password'";

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        $dataSet2 =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new User($row);
        }
        while ($row=$statement->fetch())
        {
            $dataSet2[] = new User($row);
        }

        return $dataSet;

    }

    public function fecthAdmin()
    {
        //$sqlQuery = "SELECT username,password FROM hc21_11.users WHERE username = '$username' AND password = '$password'";
    }
}


