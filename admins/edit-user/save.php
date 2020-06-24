<?php
//intialize the config file
include '../../config.php';
// add user
if(count($_POST)>0){
	if($_POST['type']==1){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password=password_hash($password, PASSWORD_DEFAULT);
		$token = bin2hex(random_bytes(15));
		$user_type=$_POST['user_type'];
		$sql = "INSERT INTO `users`( `username`, `email`,`token`,`status`,`password`,`user_type`) 
		VALUES ('$username','$email','$token','inactive','$password','$user_type')";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}
//update user
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$user_type=$_POST['user_type'];
		$sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`user_type`='$user_type' WHERE id=$id";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}
//delete user
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `users` WHERE id=$id ";
		if (mysqli_query($link, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}
//delete multiple users
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM users WHERE id in ($id)";
		if (mysqli_query($link, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}

?>