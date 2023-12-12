<?php
include "includes/route.php";
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<style> body {
    background-image: url('Asset/img1.jpg');
	background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
	} 
	</style>
<body>
	<div class="container">
		<?php include "includes/nav.php"; ?>
		
			<h4 class="center-block">Admin Dashboard </h4>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	
</body>

</html>