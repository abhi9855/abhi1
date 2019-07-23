<?php
	session_start();

	if (isset($_SESSION['userid'])) {
		include_once 'functions.php';
		include_once 'header.php';
?>
	</head>
	<body onload=display_ct();>
		<form method = "GET" action="" style="padding: 20px 20px 20px 20px;">
			<?php include_once 'pagination.php';?>
		</form>

<?php
	} else {
		header("Location: login.php");
	}
?>

<?php
	include_once 'footer.php';
?>

