<?php
session_start();
include 'functions.php';

if (isset($_POST["btn"])) {
    //print_r($_POST);
    # code...
    $uname = $_POST['uname'];
    $pass = md5($_POST['passwd']);
    $sql = "SELECT * FROM login WHERE username = '$uname' and password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // echo "<pre>";print_r($row['id']);die();

    $count = mysqli_num_rows($result);
	// print_r($count);
	// die();
    if ($count == 1) {
        $_SESSION["userid"] = $row['id'];
        // die();
        header("location: index.php?page_no=1");
        //exit;
    } else {
        // print_r($_POST);
        echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Session</title>

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
		<h2>Login</h2>
		
		 <div class="form-group">
			<input type="txt" class="form-control" name="uname" id="uname" placeholder="Username" required="" autocomplete="off">
        </div>
        <div class="form-group">
			<input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password" required="" autocomplete="off">
        </div>
		     
		<div class="form-group">
		<input class="form-check-input" type="checkbox"> Remember me
        </div>
		<div class="form-group">
			<input type="submit" autocomplete="off" class="btn btn-success btn-lg btn-block" name="btn" value="Login">
		</div>
		<div class="form-group">	
			<!-- <input type="button" autocomplete="off" class="btn btn-success btn-lg btn-block" name="btn4" onclick="register();" value="Sign Up"> -->
		</div>
    </form>
	
</div>
</body>
</html>
<script type='text/javascript'>
	function validation() {
		// body...
	var uname=document.forms["loginForm"]["uname"];
	var pass=document.forms["loginForm"]["passwd"];
	if (uname.value=="") {
		window.alert("Please enter your username.");
        uname.focus();
        return false;
	}
	if (pass.value=="") {
		window.alert("Please enter your password.");
        pass.focus();
        return false;
	}
	return true;
}
	function register(){
		window.location.href="register.php";
	}
</script>
