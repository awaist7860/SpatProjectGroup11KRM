<?php
$view = new stdClass();
$view->pageTitle = 'View Projects';         //Page title is view projects
session_start();                            //Starting session
require_once("../Models/ProjectDataSet.php");   //Requiring project data set
$projectDataSet = new ProjectDataSet();         //New project data set

//Makes sure filter is not set to null
if(isset($_POST['filters']))
{
    $_SESSION['filters'] = $_POST['filters'];
}

//Makes sure search is not empty
if(isset($_POST['searchButton']))
{
    $_SESSION['search'] = $_POST['search'];
}

//If statement for the filers and pagination included
if(isset($_SESSION['filters']))
{
    //Section for the pages
    $offset = 0;
    $itemsPerPage = 20;
    $page = 1;

    //If statement to get the page and the items per page
    if(isset($_GET["page"])) {
        $page = $_GET["page"] == 0 ? 1 : (int)$_GET["page"];
        $offset = ($page - 1) * $itemsPerPage;
    }

    //If statement for low to high and high to low
    if($_SESSION['filters'] == "lowToHigh")
    {
        $projects = $projectDataSet->lowToHigh($_SESSION['search'],$offset, $itemsPerPage);
    }
    else{
        $projects = $projectDataSet->highToLow($_SESSION['search'],$offset, $itemsPerPage);
    }

    $totalProjectAmount = count($projectDataSet->search($_SESSION['search']));     //calls search
    $totalPageAmount = ceil($totalProjectAmount / $itemsPerPage);
    $nextPage = min($page + 1, $totalPageAmount);       //Getting next page
    $previousPage = max(1, $page - 1);            //Getting previous page
}
else  if(isset($_POST['searchButton']))
{
    unset($_SESSION['filters']);
    //Section for the pages
    $offset = 0;
    $itemsPerPage = 20;
    $page = 1;

    //If statement to get the page and the items per page
    if(isset($_GET["page"])) {
        $page = $_GET["page"] == 0 ? 1 : (int)$_GET["page"];
        $offset = ($page - 1) * $itemsPerPage;
    }

    $projects = $projectDataSet->getAllProjectsPaginatedWithSearch($_POST['search'],$offset, $itemsPerPage);
    $totalProjectAmount = count($projectDataSet->search($_POST['search']));     //calls search
    $totalPageAmount = ceil($totalProjectAmount / $itemsPerPage);
    $nextPage = min($page + 1, $totalPageAmount);       //Getting next page
    $previousPage = max(1, $page - 1);            //Getting previous page
}
else        //else
{
    //Section for the pages
    $offset = 0;
    $itemsPerPage = 20;
    $page = 1;

//If statement to get the page and the items per page
    if(isset($_GET["page"])) {
        $page = $_GET["page"] == 0 ? 1 : (int)$_GET["page"];
        $offset = ($page - 1) * $itemsPerPage;
    }

    $projects = $projectDataSet->getAllProjectsPaginated($offset, $itemsPerPage);   //Calling get all auctions paginated

    $totalProjectAmount = count($projectDataSet->getAllProjects());     //calling getAllauctions
    $totalPageAmount = ceil($totalProjectAmount / $itemsPerPage);
    $nextPage = min($page + 1, $totalPageAmount);       //Getting next page
    $previousPage = max(1, $page - 1);            //Getting previous page
}

require_once('../Views/viewProjects.phtml');        //Requiring view projects phtml page

