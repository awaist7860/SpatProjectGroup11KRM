<?php
include_once '../Models/LoginModel.php';            //Getting the login model
include_once '../Models/UserDataSet.php';           //Getting the user data set
include_once '../Models/UserModel.php';             //Getting the user model

//Starting session
session_start();

$test = $_POST['test'];
$email = $_POST['uname'];
$pasw = $_POST['psw'];

//$userDataSet = new userDataSet();   //New user data set

$loginModel = new LoginModel();     //New login model
$result = $loginModel->login($email, $pasw);    //If result then login
print_r($result);                   //Print result

//If statement to do the anti spam feature
if($result AND $test == 4) {
    header("Location: ../index.php? " . $result);   //Redirect to header
}
else
{
    header("Location: ../index.php?error=Invalid username/password");   //else give invalid username and Password
    header("Location: ../index.php?error=Wrong Answer");    //else give wrong answer
}