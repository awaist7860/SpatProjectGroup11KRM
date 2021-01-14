<?php

//Initialising the session
session_start();

//Destroy the session
session_destroy();

//Redirect to index
header("location:../index.php");
exit;
?>

