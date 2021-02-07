<?php

//Class project Model
class ProjectModel
{

    //Protected values
    protected $_Projectid, $_NameOfProject, $_NameOfCustomer, $_shortDescriptionOfProject, $_startingPriceOfProject, $_endPriceOfProject, $_projectDeadline, $_imageOfProject;

    //The constructor
    public function __construct($dbRow)
    {
        $this->_Projectid = $dbRow["projectid"];
        $this->_NameOfProject = $dbRow["projectName"];
        $this->_NameOfCustomer = $dbRow["customerName"];
        $this->_shortDescriptionOfProject = $dbRow["shortDescription"];
        $this->_startingPriceOfProject = $dbRow["budgetStartingPrice"];
        $this->_endPriceOfProject = $dbRow["budgetEndPrice"];
        $this->_projectDeadline = $dbRow["deadline"];
        $this->_imageOfProject = isset($dbRow["image"]) ? $dbRow["image"] : "defaultImage.png";
    }

    /**
     * @return mixed
     */
    //Method which gets the project id
    public function getProjectid()
    {
        return $this->_Projectid;
    }

    /**
     * @param mixed $Projectid
     */
    //Method which allows to set the project id
    public function setProjectid($Projectid)
    {
        $this->_Projectid = $Projectid;
    }

    /**
     * @return mixed
     */
    //Method which gets the name of project
    public function getNameOfProject()
    {
        return $this->_NameOfProject;
    }

    /**
     * @param mixed $NameOfProject
     */
    //Method which allows to set the name of project
    public function setNameOfProject($NameOfProject)
    {
        $this->_NameOfProject = $NameOfProject;
    }

    /**
     * @return mixed
     */
    //Method which gets the name of customer
    public function getNameOfCustomer()
    {
        return $this->_NameOfCustomer;
    }

    /**
     * @param mixed $NameOfCustomer
     */
    //Method which allows to set the name of customer
    public function setNameOfCustomer($NameOfCustomer)
    {
        $this->_NameOfCustomer = $NameOfCustomer;
    }

    /**
     * @return mixed
     */
    //Method which gets the short description of project
    public function getShortDescriptionOfProject()
    {
        return $this->_shortDescriptionOfProject;
    }

    /**
     * @param mixed $shortDescriptionOfProject
     */
    //Method which allows to set short description of project
    public function setShortDescriptionOfProject($shortDescriptionOfProject)
    {
        $this->_shortDescriptionOfProject = $shortDescriptionOfProject;
    }

    /**
     * @return mixed
     */
    //Method which gets the starting price of project
    public function getStartingPriceOfProject()
    {
        return $this->_startingPriceOfProject;
    }

    /**
     * @param mixed $startingPriceOfProject
     */
    //Method which allows to set the starting price of project
    public function setStartingPriceOfProject($startingPriceOfProject)
    {
        $this->_startingPriceOfProject = $startingPriceOfProject;
    }

    /**
     * @return mixed
     */
    //Method which gets the end price of project
    public function getEndPriceOfProject()
    {
        return $this->_endPriceOfProject;
    }

    /**
     * @param mixed $endPriceOfProject
     */
    //Method which sets the end price of project
    public function setEndPriceOfProject($endPriceOfProject)
    {
        $this->_endPriceOfProject = $endPriceOfProject;
    }

    /**
     * @return mixed
     */
    //Method which gets the project deadline
    public function getProjectDeadline()
    {
        return $this->_projectDeadline;
    }

    /**
     * @param mixed $projectDeadline
     */
    //Method which allows to set the project deadline
    public function setProjectDeadline($projectDeadline)
    {
        $this->_projectDeadline = $projectDeadline;
    }

    /**
     * @return mixed|string
     */
    //Method which gets the image of project
    public function getImageOfProject()
    {
        return $this->_imageOfProject;
    }

    /**
     * @param mixed|string $imageOfProject
     */
    //Method which allows to set the image of project
    public function setImageOfProject($imageOfProject)
    {
        $this->_imageOfProject = $imageOfProject;
    }

}