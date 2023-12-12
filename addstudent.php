<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
?>


<div class="container">
    <?php include "includes/nav.php"; ?>

    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  "
        style="margin-top: 20px">
        <div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

            <p class="page-header" style="text-align: center">ADD STUDENTS</p>

            <div class="container">
                <form class="form-horizontal" role="form" action="addstudent.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Username" class="col-sm-2 control-label">FULL NAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Full name" id="name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">MATRIC NO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="matric_no" placeholder="Matric Number"
                                id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">DEPT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dept" placeholder="Department" id="Address"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="password"
                                id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">CONFRIM PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm password"
                                id="password" required>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="num_books" placeholder="books" id="password"
                        required value="null">
                    <input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password"
                        required value="null">
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="phone" id="password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info"
                                name="submit">
                                ADD MEMBER
                            </button>

                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var input = document.getElementById('name').focus();
    }
</script>
</body>

</html>