<?php
session_start();
include '../include/connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:admin.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<?php include '../assets/css.php'; ?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="../logout.php" class="btn btn-success">Logout</a>
		</div>
	</div>
</div>
</body>
</html>	
<?php	
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}