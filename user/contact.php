<?php 
session_start();
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $phoneErr = $cityErr ="";
$name = $email = $gender = $comment = $city = $phone ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $city = test_input($_POST["city"]);
  }
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
include "user-haeder.php";
?>
<body class="set">
        <section class="contactus">
        <div class="para"> <h2>Quick Contact</h2>
          <p >
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>
          incididunt ut labore et dolore magna aliqua
          </p>
          <hr >
        </div>
        <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="row">
            <div class="col-sm-6">
            <i class="fa fa-address-book" style="font-size:24px"></i> <input type="text" name="name" class="name" placeholder="Enter name" value="<?php echo $name;?>"><br>
                <span class="error"> <?php echo $nameErr;?></span><br>
            </div>
              
            <div class="col-sm-6">
            <i class="fa fa-envelope" style="font-size:24px"></i> <input type="text" class="email" name="email" placeholder="email" value="<?php echo $email;?>"><br>
                <span class="error"> <?php echo $emailErr;?></span><br>
            </div>
              
        </div>
        <br>

        <div class="row">
            <div class="col-sm-6">
            <i class="fa fa-phone" style="font-size:24px"></i> <input type="number"class="phone" name="phone" placeholder="Enter phone" value="<?php echo $phone;?>"><br>
                    <span class="error"> <?php echo $phoneErr;?></span><br>
            </div>
            <div class="col-sm-6">
            <i class="fa fa-university" style="font-size:24px"></i> <input type="text" name="city" class="city" placeholder="Enter city" value="<?php echo $city;?>"><br>
                    <span class="error"> <?php echo $cityErr;?></span><br>
            </div>
        </div>
        <br>

        <i class="fa fa-comment" style="font-size:24px"></i> <textarea name="comment" class="comment" cols="100" placeholder="Enter Queries if any"><?php echo $comment;?></textarea>
          <br><br>
          Gender:
          <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
          <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
          <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
          <span class="error"> <?php echo $genderErr;?></span>
          <br><br>
          <input type="submit" name="submit" value="Submit">  
        </form>

<?php
if(empty($nameErr) && empty($emailErr) && empty($genderErr)){
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
}
?>
</div>
</section>
</body>
</html>
