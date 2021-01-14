<?php
session_start();                                                            //Starts session
$view = new stdClass();                                                     //New class
$view->pageTitle = 'Homepage';                                              //Giving a page title which is homepage
require_once('Views/index.phtml');                                          //Requiring the index page
