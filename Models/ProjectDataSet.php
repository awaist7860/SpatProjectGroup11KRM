<?php

<<<<<<< Updated upstream

class projectDataSet
{

}
=======
require_once ('Database.php');          //Requiring database model
require_once ('ProjectModel.php');      //Requiring project model

//Class project data set
class ProjectDataSet
{

    protected $_dbHandle, $_dbInstance;     //Protected fields

    //constructor
    public function __construct() {
        $this->_dbInstance = Database::getInstance();               //Connect to database
        $this->_dbHandle = $this->_dbInstance->getdbConnection();   //gets the database connection
    }

    //Method which creates the project and inserts into the projects table
    public function createProject($projectName, $customerName,$description, $startPrice, $endPrice, $deadline, $imagePath)
    {
        $sqlQuery = "INSERT INTO hc21_11.projects(projectName, customerName, shortDescription, budgetStartingPrice, budgetEndPrice, deadline, image) VALUES ('$projectName', '$customerName','$description', '$startPrice', '$endPrice', '$deadline', '$imagePath')";
        $statement = $this->_dbHandle->prepare($sqlQuery);  // prepare a PDO statement
        $statement->execute();                              // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new ProjectModel($row);
        }
        return $dataSet;        //Returns dataset
    }

    //Method which gets all projects paginated with search
    public function getAllProjectsPaginatedWithSearch($projectName, $offset, $limit) {
        $sqlQuery = "SELECT * FROM hc21_11.projects WHERE projectName LIKE '%".$projectName."%' LIMIT ? OFFSET ?" ;          //SQL query

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(array($limit, $offset)); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;    //Returns dataset
    }

    //Method which searches the projects table and allows to search by project name
    public function search($projectName)
    {
        $sqlQuery = "SELECT * FROM projects WHERE projects.projectName = '".$projectName."' ";
        $statement = $this->_dbHandle->prepare($sqlQuery);  // prepare a PDO statement
        $statement->execute();  // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;    //Returns dataset
    }

    //Method which gets all projects paginated
    public function getAllProjectsPaginated($offset, $limit) {
        $sqlQuery = "SELECT * FROM projects LIMIT ? OFFSET ?" ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(array($limit, $offset)); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;    //Returns dataset
    }

    //Method which gets all projects
    public function getAllProjects() {
        $sqlQuery = "SELECT * FROM projects" ;

        $statement = $this->_dbHandle->prepare($sqlQuery);          // prepare a PDO statement
        $statement->execute(array());                               // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;        //Returns dataset
    }

    //Method for the low to high filter and allows to filter from project name low to high
    public function lowToHigh($projectName,$offset,$limit)
    {
        $sqlQuery = "SELECT * FROM projects WHERE projects.projectName = '".$projectName."' ORDER BY budgetStartingPrice asc  
        LIMIT ".$limit." OFFSET ".$offset." ";     //SQL query to order by project name ascending
        $statement = $this->_dbHandle->prepare($sqlQuery);  // prepare a PDO statement
        $statement->execute();  // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;    //Returns dataset
    }

    //Method for the high to low filter and allows to filter from project name high to low
    public function highToLow($projectName,$offset,$limit)
    {
        $sqlQuery = "SELECT * FROM projects WHERE projects.projectName = '".$projectName."' ORDER BY budgetEndPrice desc 
        LIMIT ".$limit." OFFSET ".$offset." ";              //SQL query to order by price descending
        $statement = $this->_dbHandle->prepare($sqlQuery);  // prepare a PDO statement
        $statement->execute();         // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new projectModel($row));
        }
        return $dataSet;    //Returns dataset
    }

    }
>>>>>>> Stashed changes
