<?php
session_start();
// Include config file
include 'config.php';
// Action on submit button
$msgsend="";
$msgnotsend="";
$errmsg="";
if(isset($_POST['submit'])){

   //include the Autoloded file
    require 'PHPMailer/PHPMailerAutoload.php';
    $email ="xxxxxxxxxxxxxx";                            //SMTP username here
    $password ="xxxxxxxxxxxxx";                       //SMTP password here
    $to_id = $_POST['email2'];

    //intialize the usename and token
    $to_id = filter_var($email, FILTER_SANITIZE_EMAIL);
    $emailquery = "select * from users where email='$to_id'";
     $query = mysqli_query($link,$emailquery);
     $emailcount = mysqli_num_rows($query);
    if($emailcount){
    $userdata = mysqli_fetch_array($query);
    $username = $userdata['username'];
    $token = $userdata['token'];
   }

   $to_id = filter_var($email, FILTER_SANITIZE_EMAIL);
   $sql="select 'email' from users where email='$to_id'";
   $select=mysqli_query($link,$sql);
   if(mysqli_num_rows($select)){
    $message = "hi, $username. click here to reset ur password       
    http://localhost/aditya/user/reset.php?token=$token";
    $subject = "reset password";
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $password;
    $mail->setFrom ("Your mail","reset password");
    $mail->addAddress($to_id);
    $mail->Subject = ($subject);
    $mail->msgHTML($message);
    if (!$mail->send()) {                            //send the mail
       $errmsg="Mailer Error  $mail->ErrorInfo";
    }
    else
   {	
       $msgsend="Mail Sent To $to_id";
   }
}
else{
   $msgnotsend="$to_id dosent exist";
}

}
?>
<?php 
include "header.php";
?>
<div class="container">
<div class="password">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3" align="center">
<form method="POST">
	<input type="email2" class="form-control" id="email2" name="email2" cols="4" placeholder="enter your email">
	<input type="submit" name="submit"  class="btn btn-primary" value="send mail">


            <?php 
                if($errmsg){
                echo "<div  class='alert alert-warning Alert'>
                <strong>Warning!</strong> $errmsg
                <button type='button' class='cross'>&times;</button>
              </div>";}
                if($msgsend){
                    echo "<div class='alert alert-success Alert'>
                    <strong>Success!</strong> $msgsend
                    <button type='button' class='cross'>&times;</button>
                  </div>";}
                if($msgnotsend){
                    echo "<div  class='alert alert-danger Alert'>
                    <strong>Danger!</strong> $msgnotsend
                    <button type='button' class='cross'>&times;</button>
                  </div>";}
               ?>
</form>
</div>
</div>
</div>
</div>
<?php
include "footer.php";
?>


