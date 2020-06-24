<?php
// Initialize the session
session_start();
 
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $user_type ="";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        //querty t fetch user_type from the database
        
        $username_query = "select * from users where username='$username'";
        $query = mysqli_query($link,$username_query);
        $username_count = mysqli_num_rows($query);
        if($username_count)
        {
            $userdata = mysqli_fetch_array($query);
            $user_type = $userdata['user_type'];
        } 
                       
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
            

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["user_type"] = $user_type;                        

                            
                            // Redirect user to user or admin  page
                            if($user_type == 'user'){
                            header("location: user/HTML/home.html");}
                            else{
                            header("location:admins/dashboard.php");}
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 <?php 
 include "header.php";
 ?>
    <div class="wrapper login">
        <div class="block">
        <h2>Login</h2>
        <i class="fa fa-eye" style="font-size:36px; padding-top:15px; padding-left:5px;"></i>
        </div>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group loguser1">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
                <span class="help-block loguser"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group logpass1">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                <span class="help-block logpass"><?php echo $password_err; ?></span>
            </div>
            <a href="./forget-password.php" class="forget">Forgot password</a>
            <div class="form-group log">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
<?php
include "footer.php";
?>