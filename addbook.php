<?php
include "includes/route.php";
include "includes/header.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $title = sanitize($_POST['title']);
    $bookType = sanitize($_POST['book_type']);
    $authorName = sanitize($_POST['author_name']);

    $sql = "INSERT INTO books (title, book_type, author_name) VALUES ('$title', '$bookType', '$authorName')";

    if ($conn->query($sql) === TRUE) {
        echo "Book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>

    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">

            <p class="page-header" style="text-align: center">ADD BOOK</p>

            <div class="container">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                    <div class="form-group">
                        <label for="Title" class="col-sm-2 control-label">BOOK TITLE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Book Type" class="col-sm-2 control-label">BOOK TYPE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="book_type" placeholder="Enter BOOK TYPE" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Author" class="col-sm-2 control-label">AUTHOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author_name" placeholder="Enter Author" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="submit" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info">
                                ADD BOOK
                            </button>

                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var input = document.getElementById('title').focus();
        }
    </script>
    </body>

    </html>