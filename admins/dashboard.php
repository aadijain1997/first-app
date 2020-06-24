<?php
//intialize the config file
include '../config.php';
session_start();                   //start the session
?>
<!doctype html>
<html lang="en">
    <head> 
        <title>Welcome creater</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


     <link rel="stylesheet" href="../user/assets/CSS/style.css"/>

       </head> 
  <body>

<!-- Navigation Bar -->

        <section class="header">
             <nav class="navbar  dashadmin">
                         <a class="navbar-brand col-sm-3 col-md-2 mr-0 dashboard" href="dashboard.php">DASHBOARD</a>
                         
              </nav>
      </section> 
<!-- side navigation -->
    <section>
        <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-2 sidebar py-5 users">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column edit">
                        <li><a href="edit-user/user-data.php"><b>EDIT USERS</b></a></li>
                        <li class="mail"><a href="email/mail.php"><b>Send mail</b></a></li>
                        <li class="mail"><a href="profile/profiles.php"><b>Profile</b></li>
                        <li class="mail"><a href="learn-ajax/index.php"><b>Learn ajax</b></li>
                        <li class="out"><a href="../logout.php"><b>Logout</b></a></li>
                    </ul>
                </div>
            </nav>
            <div class="col-sm-10 creating">
                <h1 class="thanks">Thanks for creating me <?php echo $_SESSION["username"]; ?> </h1>
            </div>

        </div>
        </div>
    </section>
        
 </body>
 </html>