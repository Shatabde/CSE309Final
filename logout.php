<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from logedin";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    $deleteQuery = "DELETE FROM logedIn";
    mysqli_query($conn, $deleteQuery);
    header("Location: login.php");
    exit();
} else {
    header("location:javascript://history.go(-1)");
    exit();
}
session_start();
session_destroy();
exit();
