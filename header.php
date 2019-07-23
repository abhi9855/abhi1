<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="style.css">

<!-- PHP code for showing user name  -->
<?php
	// ini_set('display_errors', 1);        //error finding
	include_once 'functions.php';
	$usrid = $_SESSION['userid'];
	$sql = "SELECT * FROM login WHERE id = $usrid";
	$result = mysqli_query($conn, $sql);
	$fetch = mysqli_fetch_array($result);
	// echo "Welocme " . ucfirst( $fetch['username']). " ";
?>

<!-- Navigation Bar  -->
<!-- <div class="container"> -->
	
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top:10px;">
	<form class="form-inline my-2 my-lg-0" >
	  <input class="form-control mr-sm-2" type="search" name="query"  placeholder="Search.." autocomplete="off" value="<?php echo $_GET['query']; ?>" aria-label="Search">
	  
	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<!-- <li class="nav-item active">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		</li> -->
		</ul>

		<a class="navbar-brand" href="#"><?php echo "<strong>WELCOME </strong>" . ucfirst($fetch['username']) . " "; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<a href="logout.php" class="btn btn-outline-success my-2 my-sm-0">
			<span class="glyphicon glyphicon-log-out"></span> Log out
		</a>
  </div>
</nav>
<!-- </div> -->