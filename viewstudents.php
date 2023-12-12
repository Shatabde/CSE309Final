
<?php
include "includes/route.php";
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {

        header("location: viewstudents.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<div class="container">
	<?php include "includes/nav.php"; ?>
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0"
		style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
		<strong>Student</strong> Table
	</div>
</div>
<div class="container col-lg-11 ">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<a href="addstudent.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button"
						style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span>
						Add Student</button></a>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
				</div>

			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Password</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php
                    $sql = "SELECT * FROM users WHERE user_type = 'borrowers'";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td>
                                    <form method='post' action='viewstudents.php'>
                                        <input type='hidden' value="<?php echo $row['id']; ?>" name='id'><button name='id' type='button' value='<?php echo $row['id']; ?>' class='btn btn-warning' onclick='deleteUser(this.value)'>Delete</button>

                                        <script>
                                            function deleteUser(id) {
                                                var confirmBorrow = confirm("Are you sure you want to delete this user?");
                                                if (confirmBorrow) {
                                                    var form = document.createElement('form');
                                                    form.method = 'post';
                                                    form.action = 'viewstudents.php';

                                                    var input = document.createElement('input');
                                                    input.type = 'hidden';
                                                    input.name = 'id';
                                                    input.value = id;

                                                    form.appendChild(input);
                                                    document.body.appendChild(form);

                                                    form.submit();
                                                }
                                            }
                                        </script>

                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
		</table>

	</div>
</div>
<div class="mod modal fade" id="popUpWindow">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"> Warning</h3>
			</div>

			<div class="modal-body">
				<p>Are you sure you want to delete this Member?</p>
			</div>

			<div class="modal-footer ">
				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right" style="margin-left: 10px"
					class="close" data-dismiss="modal">
					No
				</button>&nbsp;
				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right" class="close"
					data-dismiss="modal" data-toggle="modal" data-target="#info">
					Yes
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="info">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"> Warning</h3>
			</div>

			<div class="modal-body">
				<p>Member deleted <span class="glyphicon glyphicon-ok"></span></p>
			</div>

		</div>
	</div>
</div>





<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	function hey() {
		alert("Hello");
	}
</script>
</body>

</html>