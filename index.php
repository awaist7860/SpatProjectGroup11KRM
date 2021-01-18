<?php
session_start();                                                            //Starts session
$view = new stdClass();                                                     //New class
$view->pageTitle = 'Homepage';                                              //Giving a page title which is homepage
require_once('Views/index.phtml');                                          //Requiring the index page

require_once('Models/LoginModel.php');
//require_once('Models/UserDataSet.php');


//login check with admin

$SpecificSearchDataSet = "";

//Before sql Stament
$username = "";
$password = "";

//After sql statmente
$user = "";
$pass = "";
$admin = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userDataSet = new LoginModel();
    $SpecificSearchDataSet = (new LoginModel())->adminLogin($username, $password);
    $countUserRows = count($SpecificSearchDataSet);
    ?>

<div class="container" style="color: #1b1e21">
    <div class="row">
        <?php
        foreach ($SpecificSearchDataSet as $Key => $Search){

            $user = $Search->getUserName();
            $pass = $Search->getPassword();
            $admin = $Search->getAdmin();

            ?>
                <!--This is just to see out put for testing purposes-->
            <div class="col-md-3 col-md-6">

                <div class="card text-center">
                    <div class="card-block">
                        <h4>User ID: <?php echo $Search->getID()?></h4>
                    </div>
                    <div class="card-title">
                        <h4>Username: <?php echo $user?></h4>
                    </div>
                    <div class="card-text">
                        <p>Password: <?php echo $pass?></p>
                        <p>Admin: <?php echo $admin?></p>
                        <!--                            checks to see admin-->
                        <p>Admin: <?php if($admin == true)
                            {
                                echo "is admin";
                            }
                            else
                            {
                                echo "not admin";
                            }?></p>
                    </div>
                </div>
            </div>
    </div>
</div>
        <?php }

        //This works for checking admin
        if($admin == "1")//this checks if user is admin
        {
            ?><h4>Username: <?php echo $user?> is an admin</h4><?php
            //you can go to another page for an admin
            //redirect to an admin user html webpage
        }
        else if($admin == "0")
        {
            ?><h4>Username: <?php echo $user?> is not an admin</h4><?php
            //this will go to normal user
            //redirect to a normal user html webpage
        }
}

