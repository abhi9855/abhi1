<?php 
include 'functions.php';
session_start();

	if (isset($_POST['button5'])) {
		# code...
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		// echo "$password";
		$sql="SELECT username from login WHERE username = '$username'";     // and password = '$password'
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);
		if($count == 1){
			echo "<script> alert('Username already exist');</script>";
			echo "<script> window.location = 'register.php';</script>";
			// echo "$password";
		}
		else{
		$sql="INSERT into login (username,password) values('".$username."','".$password."')";

		//echo $username;
		//echo $password;
		$result=mysqli_query($conn,$sql);
		echo "<script> alert('Username and Password stored in database');</script>";
		header("Location: login.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body class="body">
<div class="signup-form"  style="margin-top: 100px;">
	<form id="loginForm" action="" method="POST"  autocomplete="off">
		<h2>Registration</h2>
		
		 <div class="form-group">
		 	<label>UserName</label>
			<input type="txt" class="form-control" name="username" required="">
			<!-- <input type="txt" class="form-control" name="uname" id="uname" placeholder="Username" required="" autocomplete="off"> -->
        </div>
        <div class="form-group">
		<label>Password</label>
			<input type="password" class="form-control" name="password" required="" autocomplete="off">
			<!-- <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password" required="" autocomplete="off"> -->
        </div>
		     
		<div class="form-group">
		<input type="submit" class="btn btn-success btn-lg btn-block" name="button5" value="Register">        </div>
		<div class="form-group">
			
			<input type="submit" class="btn btn-success btn-lg btn-block" name="button6" value="Login" onclick="login();">

			<!-- <input type="submit" autocomplete="off" class="btn btn-success btn-lg btn-block" name="btn" value="Login"> -->
		</div>

    </form>
</div>
</body>
</html>
<script type="text/javascript">
	function login(){
		window.location.href="index.php";
	}
</script>