<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userIdQuery = mysqli_query($conn, "SELECT userId FROM logedIn");
$userIdRow = mysqli_fetch_assoc($userIdQuery);
$userId = $userIdRow['userId'];

if (empty($userId)) {
    header("Location: login.php");
    exit();
}

$conn->close();
?>
