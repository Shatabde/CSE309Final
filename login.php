<?php
session_start();
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {
	$username = sanitize(trim($_POST['username']));
	$password = sanitize(trim($_POST['password']));

	$sql_admin = "SELECT * from users where username = '$username' and  password = '$password' ";
	$query = mysqli_query($conn, $sql_admin);

	if (mysqli_num_rows($query) > 0) {

		while ($row = mysqli_fetch_assoc($query)) {
			$_SESSION['auth'] = true;
			$_SESSION['admin'] = $row['username'];
			$userType = $row['user_type'];
			$userId = $row['id'];
		}
		if ($_SESSION['auth'] === true) {
			$insertUserIdQuery = "INSERT INTO logedIn (userId) VALUES ('$userId')";
			mysqli_query($conn, $insertUserIdQuery);
			if ($userType == 'admin') {
				header("Location: admin.php");
				exit();
			} else if ($userType == 'borrowers') {
				header("Location: studentPage.php");
				exit();
			}
		}
	}
	else { 
		echo '<script>alert("Invalid User!");</script>';

	}
}
?>
<html>

<body>
	<div class="container-login">
		<div class="container-box">
			<div class="jumbotron">
				<p>LOGIN</p>
				<div class="container">
					<form class="form-horizontal" role="form" method="post" action="login.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="Username" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
							</div>
						</div>
						<div class="form-group">
							<label for="Password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" class="btn btn-info col-lg-4" name="submit" value="Sign In">
							</div>

							<div class="col-sm-offset-2 col-sm-10" style="margin-top: 10px;">
								<a href="signup.php" class="btn btn-info col-lg-4" style="width: 70%; justify-self: center;">Register</a>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	</div>


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"> </script>
	<?php if (isset($alert_user)) { ?>
		<script type="text/javascript">
			swal("Oops...", "You are not allowed to view this page directly...!", "error");
		</script>
	<?php } ?>

</body>

</html>