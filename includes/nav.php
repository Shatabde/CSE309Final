<?php 
session_start();
if (isset($_SESSION['admin'])) {
     $admin = $_SESSION['admin'];
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href=""><img src="Asset/logo.png" alt="" width="30px" height="30px"></a>
            <a class="navbar-brand" href="#">Book_Nest</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">
                <?php if(isset($admin)) { ?>  
                <li><a href="admin.php">Home</a></li>
                <li><a href="bookstable.php">Books</a></li>
                <li><a href="users.php">Admins</a></li>
                <li><a href="viewstudents.php">Students</a></li>
                <li><a href="borrowedbooks.php">Borrowed books</a></li>
                <li><a href="fines.php">Fines</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php } ?>         
            </ul> 
        </div>
    </div>
</nav>