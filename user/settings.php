<?php
//intialize the session
	session_start();
 // Check if the user is already logged in, if yes then redirect him to login page
	 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true){
	 	header("location: ../login.php");	
		exit;}
?>
<?php
include "user-haeder.php";
?>
<body class="set">
    <!-- Reset section -->
    <section class="Reset">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Settings.</h1>
    </div>
    <p>
        <a href="reset.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
     </section>
</body>
</html>