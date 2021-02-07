<?php

$view = new stdClass();
$view->pageTitle = 'Create Project';    //Page title is create auction
<<<<<<< Updated upstream
session_start();    //Start session
require_once("../controller/createProject.php");            //Requiring create auction controller
require_once('../Views/createProject.phtml');               //Requiring create auction phtml page
require_once(__DIR__ . "/../Models/ProjectDataSet.php");              //Requires auction model data set
$category = null;
$price = null;
=======
session_start();    //Starting session
require_once("../controller/createProject.php");            //Requiring create project controller
require_once('../Views/createProject.phtml');               //Requiring create project phtml page
require_once(__DIR__ . "/../Models/ProjectDataSet.php");              //Requires project dataset

$startPrice = null;
$endPrice = null;
>>>>>>> Stashed changes

//If submit button is clicked then do this
if(isset($_POST['sbt']))
{
    $category =  $_POST['category'];
    $price = $_POST['price'];
}

//If message to get project name, customer name, description and title
if(count($_POST) > 0) {
<<<<<<< Updated upstream
    $errorMessage = "";
    $title = "";
    $description = "";

    //Error message title is left blank
    if(isset($_POST["title"])) {
        $title = $_POST["title"];
    } else {
        $errorMessage = "Please enter a title";
    }

    //Error message if there is nothing typed in description
    if(isset($_POST["description"])) {
        $description = $_POST["description"];
    } else {
        $errorMessage = "Please enter a description";
    }
=======
$errorMessage = "";
$projectName = "";
$customerName = "";
$description = "";
$deadline = "";


//Error message to make sure project name is not left blank
if(isset($_POST["projectname"])) {
    $projectName = $_POST["projectname"];
} else {
    $errorMessage = "Please enter a project name";
}

//Error message to make sure customer name is not left blank
if(isset($_POST["customername"])) {
    $customerName = $_POST["customername"];
} else {
    $errorMessage = "Please enter a customer name";
}

//Error message to make sure description is not left blank
if(isset($_POST["description"])) {
    $description = $_POST["description"];
} else {
    $errorMessage = "Please enter a project description";
}

//Error message to make sure deadline is not left blank
if(isset($_POST["deadline"])) {
    $deadline = $_POST["deadline"];
} else {
    $errorMessage = "Please enter a project deadline";
}
>>>>>>> Stashed changes

    // Upload image section
    $imagePath = "";
    if(isset($_FILES["image"])) {               //If statement to upload and to check if it is a valid image
        $fileToUpload = $_FILES["image"];
        $validImageCheck = true;
        //If statement to allow only acceptable valid image types else return a error message
        if($validImageCheck !== false) {
            $imageFileType = strtolower(pathinfo($fileToUpload["name"],PATHINFO_EXTENSION));
            $validImageTypes = ["jpg", "jpeg", "jfif", "png"];
            if(in_array($imageFileType, $validImageTypes)) {
                $imagePath = uniqid() . "." . $imageFileType;
                move_uploaded_file($fileToUpload["tmp_name"], "../images/" . $imagePath);   //Moves to image file
            } else {
                $errorMessage = "Please upload a valid filetype (jpg, jpeg, jfif, png)"; //If the file type is not valid then displays a error message
            }
        } else {
            $errorMessage = "Please upload a valid image instead of a " . $validImageCheck["mime"];     //Gives error message if incorrect image
        }
    }

    //Displays a error in the url if there os a error
    if(strlen($errorMessage) > 0) {
        header("Location: createProject.php?error=" . urlencode($errorMessage));
    } else {
        //get the auction data set
        $projectDataSet = new ProjectDataSet();
        $projectDataSet->createAuction($title, $description, $_SESSION["userID"], $imagePath, $category, $price);
    }
}

//If submit button is clicked then email
if(isset($_POST['sbt']))
{
    $to = " projects@krm.nl";
    $subject = "Projects";
    $txt = "This is the project";
    $headers = "From: danyal.aurangzeb@hotmail.com" . "\r\n" .
        "CC: danyalaurangzeb@hotmail.co.uk";
    mail($to, $subject, $txt, $headers);
}


?>
