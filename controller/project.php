<?php
$view = new stdClass();
$view->pageTitle = 'Project';   //Page title is project
session_start();                //Starting session

require_once("../Models/ProjectDataSet.php");   //Requiring project data set
$projectDataSet = new ProjectDataSet();         //New project data set