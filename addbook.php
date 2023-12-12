<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {

    $title = sanitize(trim($_POST['title']));
    $book_type = sanitize(trim($_POST['book_type']));
    $author_name = sanitize(trim($_POST['author_name']));

    $sql = "INSERT INTO book(title, book_type, author_name, borrow_date, return_date)
    VALUES ('$title', '$book_type', '$author_name')";


    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('New Book has been added ');
					location.href ='bookstable.php';
					</script>";
    } else {
        echo "<script>alert('Book not added!');
					</script>";
    }

}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>

    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  "
        style="margin-top: 20px">
        <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">

            <p class="page-header" style="text-align: center">ADD BOOK</p>

            <div class="container">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php"
                    method="post">
                    <div class="form-group">
                        <label for="Title" class="col-sm-2 control-label">BOOK TITLE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" id="password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Book Type" class="col-sm-2 control-label">BOOK TYPE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="book_type" placeholder="Enter BOOK TYPE"
                                id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Author" class="col-sm-2 control-label">AUTHOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author_name" placeholder="Enter Author"
                                id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="submit" class="btn btn-info col-lg-12" data-toggle="modal"
                                data-target="#info">
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
        window.onload = function () {
            var input = document.getElementById('title').focus();
        }
    </script>
    </body>

    </html>