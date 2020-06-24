<?php
require_once "config.php";
    $username=ucwords($_POST["username"]);
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email=strtolower($_POST["email"]);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password=$_POST["password"];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $token = bin2hex(random_bytes(15));
    $token = filter_var($token, FILTER_SANITIZE_STRING);
    // $confirmpass=$_POST["confpassword"];
    $sql = "INSERT INTO users (username, password, email,token,status,user_type) VALUES (?, ?, ? ,? ,'inactive','user')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_email,$token);
            
            // Set parameters
            $param_username = $username;
            $param_email= $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "right";
            } else{
               
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
?>