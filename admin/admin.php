<?php
session_start();
include '../include/connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:user.php");
	}

	$data=array();
	$qr=mysqli_query($con,"select * from users where usertype='2'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<?php include '../assets/css.php'; ?>
</head>
<body>
<div class="container">
	<div class="row">
   		<?php if(isset($_REQUEST['error'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;">
   				<?php echo $_REQUEST['error']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	 <div class="row">
   		<?php if(isset($_REQUEST['success'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;">
   				<?php echo $_REQUEST['success']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	<div class="row">
		<a href="add_user.php" class="btn btn-success" style="margin:10px;">Add User</a>
		<a href="../logout.php" class="btn btn-success" style="margin:10px;">Logout</a>
		<h1>Users</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>											
				</tr>
				<?php
					$id=1;
				  foreach($data as $d) {
				 ?>
				 <tr>
				 	<td><?php echo $id++; ?></td>
				 	<td><?php echo $d['name']; ?></td>
				 	<td><?php echo $d['email']; ?></td> 	
				 </tr>
				 <?php
				  } 
				?>
			</table>
			</div>
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