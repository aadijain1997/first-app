<?php
$msg="";
$msg1="";
$msg2="";
$msg3="";
if(!empty($_POST["submit"])) {                            //action on submit button
    require '../../PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    
    $mail->Port = 587;
    
    $mail->Username = "xxxxxxxxxxxxx";              //SMTP email id
    $mail->Password = "xxxxxxxxxxxxxx";              //SMTP email password
    
    $mail->Mailer = "smtp";
    
    if (isset($_POST["email"])) {                  //action on all the input fields
        $userEmail = $_POST["email"];
    }
    if (isset($_POST["name"])) {
        $userName = $_POST["name"];
    }
    if (isset($_POST["subject"])) {
        $subject = $_POST["subject"];
    }
    if (isset($_POST["textarea"])) {
        $message = $_POST["textarea"];
    }

    $mail->setFrom ("adityajainmks@gmail.com","ALert");
    $Emails=explode(",",$userEmail);
    
        $email_sent_string=' ';

    //select multiple Recipient for sending mail
    while (list ($key, $val) = each ($Emails)) {
        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
           $msg3="$val - email id is incorrect";
          }
        else{
            $mail->AddAddress($val);
            $email_sent_string=$email_sent_string.$val.";";
        }
        }

    $mail->Subject = $subject;
    $mail->WordWrap = 80;
    $mail->MsgHTML($message);
    
    $mail->IsHTML(true);
    
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
  
//add attachments with the mail
    if (! empty($_FILES['uploadfile'])) {
        $count = count($_FILES['uploadfile']['name']);
        if ($count > 0) {
            // Attaching multiple files with the email
            for ($i = 0; $i < $count; $i ++) {
                if (! empty($_FILES["uploadfile"]["name"])) {
                    
                    $tempFileName = $_FILES["uploadfile"]["tmp_name"][$i];
                    $fileName = $_FILES["uploadfile"]["name"][$i];
                    $size_of_uploaded_file = ($_FILES["uploadfile"]["size"][$i])/1024;//size in KBs
                    $max_allowed_file_size = 100; // size in KB
                    $mail->AddAttachment($tempFileName, $fileName);
                }
            }
        }
    }  

    //sending mail
     if($size_of_uploaded_file < $max_allowed_file_size){
        if (! $mail->Send()) {
            $msg1="something went wrong";
            } 
            else {
               $msg="mail send to $email_sent_string";

            }
        }
        else{
            $msg2="size must be less than 100 kb";
        }
}
 ?>
 <?php 
include "../admin-header.php";
?>
            <div class="send-mail">
                <form  class="mail-form" method="Post" enctype="multipart/form-data" action="" class="dropzone">
                    <label>Name</label>
                    <input type="text" name="name" class=" form-control " placeholder="Enter name" required>

                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" required>

                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control " placeholder="Enter subject" >

                    <label>Message</label>
                    <textarea type="text" cols="10" name="textarea" class=" form-control " placeholder="Enter message" required></textarea><br>
                    <!-- <input type="file" name="uploadfile[]"  multiple="multiple" accept=".doc,.docx, .pdf,.jpg,.jpeg"><br><br> -->
                    <div class="attachment-row">
                    <input type="file" class="file-up"  name="uploadfile[]">
                    
                    </div>

                <div onClick="addMoreAttachment();" class="icon-add-more-attachemnt" title="Add More Attachments">
                <img src="icon-add-more-attachment.png" alt="Add More Attachments">
                </div>
                <div class="mail-send">
                    <input type="submit" name="submit" class="btn btn-primary " value="Send">
                </div>  
                
                <?php 
                if($msg){
                echo "<div class='alert'> 
                <div id='myAlert' class='alert alert-info alert-dismissible fade show'>
                    <strong>Note!</strong> $msg
                    <button type='button' class='close'>&times;</button>
                </div>
                </div>";}
                if($msg1){
                    echo "<div class='alert'> 
                    <div id='myAlert' class='alert alert-info alert-dismissible fade show'>
                        <strong>Note!</strong> $msg1
                        <button type='button' class='close'>&times;</button>
                    </div>
                    </div>";}
                if($msg2){
                    echo "<div class='alert'> 
                    <div id='myAlert' class='alert alert-info alert-dismissible fade show'>
                        <strong>Note!</strong> $msg2
                        <button type='button' class='close'>&times;</button>
                    </div>
                    </div>";}
                if($msg3){
                    echo "<div class='alert'> 
                    <div id='myAlert' class='alert alert-info alert-dismissible fade show'>
                        <strong>Note!</strong> $msg3
                        <button type='button' class='close'>&times;</button>
                    </div>
                    </div>";}
                ?>

                </form>
            </div>

          
            
            

          
        </div>
        </div>
        </div>
    </section>
    
</body>
</html>