<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Edit Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body class="body">
<div class="signup-form">
	<form method = "GET" >
		<h2>Edit Record</h2>
			<div class="form-group">
				<input type  =  "hidden" class="form-control" name  =  "page_no" placeholder = "Liqroo_ID" value="<?=$page_ID?>" readonly>
				<input type  =  "hidden" class="form-control" name  =  "query" placeholder = "Liqroo_ID" value="<?=$search?>" readonly>
				<input type  =  "text" class="form-control" name  =  "id" placeholder = "Liqroo_ID" value="<?=$fetchid?>" readonly>
			</div>
			
			<div class="form-group">
				<input type  =  "url" class="form-control" name  =  "Whisky_Exchnage_Url" placeholder = "Whisky Exchnage Url" value="<?=$fetchurl1?>">
			</div>
			
			<div class="form-group">
				<input type  =  "url" class="form-control" name  =  "Master_Of_Malt_Url" placeholder = "Master Of Malt Url" value="<?=$fetchurl2?>">
			</div>
			
			<div class="form-group">
				<input type  =  "url" class="form-control" name  =  "DrinkSupermarket_Url" placeholder = "DrinkSupermarket Url" value="<?=$fetchurl3?>">
			</div>
			
			<div class="form-group">
				<input type  =  "url" class="form-control" name  =  "Other_Site_Url" placeholder = "Other Site Url" value="<?=$fetchurl4?>">
			</div>
			
			<div class="form-group">
				<input type  =  "url" class="form-control" name  =  "url5" autocomplete="off" placeholder = "URL5" value="<?=$fetchurl5?>">
			</div>
			
			<div class="form-group">
				<button type  =  "submit" class="btn btn-success btn-lg btn-block" name  =  "edit" value = "" onclick = "return confirm('Are you sure you want to update')">Save</button>
			</div>
			
			<!-- <button type = "button" name  = "reset" onclick = "reset();">Reset</button> |  -->
			
			<div class="form-group">
				<button type="button" class="btn btn-success btn-lg btn-block" onclick = "goback();">Back</button>
			</div>
		</div>
</div>

<!-- if condition ending for session checking-->
<?php
	include_once 'footer.php';
?>