<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if( isset( $_SESSION['id'] ) ) {
	if($_SESSION['type'] == "user")
	{
	  header("Location: http://localhost/vis/user/home_user.php");
	}
	else {
		header("Location: http://localhost/vis/services/logout.php");
	  die();
	  }
}

  else {
   
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Driver Signup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form action="../../services/user_auth_service.php"  method="post">
					<h3>New Account ?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="fname" required placeholder="First Name">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="lname" placeholder="Last Name">
					</div>
					<div class="form-holder">
					<span class="lnr lnr-dice"></span>
						<input type="text" class="form-control" name="nic" required placeholder="NIC">
					</div>
					<div class="form-holder">
					<span class="lnr lnr-map-marker"></span>
						<input type="text" class="form-control" name="address"  required placeholder="Address">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="email" class="form-control" name="mail" placeholder="Mail">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					
					<button >
						<span>Register</span>
					</button>
				</form>
				<img src="images/img.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
</html>