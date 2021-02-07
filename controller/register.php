<?php

session_start();                //Starting session
$view = new stdClass();
$view->pageTitle = 'Register';  //Page title is register
require_once("../controller/register.php");    //Requiring register controller
require_once('../Views/register.phtml');        //Requiring register phtml page
require_once(__DIR__ . "/../Models/LoginModel.php");                //Requires login model

//Method which checks to see if username and password is same as database
if(isset($_POST["username"]) && isset($_POST["psw"])) {
    $username = $_POST["username"];
    $password = $_POST["psw"];
    $repeatpassword = $_POST["psw-repeat"];

    //If statement to repeat password to get right information
    if($password === $repeatpassword) {
        $loginModel = new LoginModel();      //Gets the login model
        $response = $loginModel->register($username, password_hash($password, PASSWORD_DEFAULT));   //Hashes password

        //If response is right then redirect to homepage else display a error message
        if ($response) {
            header("Location: ../index.php");
        } else {
            header("Location: register.php?error=" . urlencode("Username is already in use"));           //If details are not correct then displays error message
        }
    }else {
        header("Location: register.php?error=" . urlencode("Passwords much match"));                  //Error message for passwords to make sure they match
    }

}