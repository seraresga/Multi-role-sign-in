<?php
session_start();
include '../include/connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:user.php");
	}
	$name=mysqli_real_escape_string($con,$_REQUEST['name']);
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$password=mysqli_real_escape_string($con,$_REQUEST['password']);

	$qr=mysqli_query($con,"INSERT into users (name,email,password,usertype,created_at) values ('".$name."','".$email."','".md5($password)."','2','".date('Y-m-d H:i:s')."')");
	if($qr){
		header("Location:add_user.php?success=Added Successfully");
	}
	else{
		header("Location:add_user.php?error=Failed to Add User");
	}
?>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}