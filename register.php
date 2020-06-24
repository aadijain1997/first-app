<?php
include "header.php";
?>
        <div class="container">
        <div class="wrapper">
        <i class="fa fa-address-book" style="font-size:46px;"></i> 
            <h2>Sign Up to account</h2><br>
            <p>Please fill this form to create an account.</p>
            <form id="register-form">
                <div class="form-group user1">
                    <label>Username</label> 
                    <input type="text" name="username" class="form-control" id="username">
                    <span class="help-block user" ></span>
                </div>
                <div class="form-group maill1"> 
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control ">
                    <span class="help-block mail1"></span>
                </div>     
                <div class="form-group pass1">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="help-block pass"></span>
                </div>
                <div class="form-group conpass1">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" >
                    <span class="help-block conpass"></span>
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary register"  value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </form> 
            </div>
    </div> 
<?php 
include "footer.php";
?>
