<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $join_date = date("Y-m-d");

    $insertQuery = "INSERT INTO users (first_name, last_name, username, user_type, email, password, join_date)
                    VALUES ('$first_name', '$last_name', '$username', '$usertype', '$email', '$password', '$join_date')";

    if (mysqli_query($conn, $insertQuery)) {

        header("location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PASSWORD VALIDATION | PRAROZ TUTORIAL</title>

    <link rel="stylesheet" href="style.css">
    <script src="valid.js"></script>

    <style>
        body {
            background-image: url('Asset/img1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .signup-box {
            width: 30%;
            height: 80%;
            color: #fff;
            background: #5fa6ede6;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px 35px;
            border-radius: 20px;
            box-shadow: 5px 20px 50px #000;
        }

        h1 {
            text-align: center;
            font-size: 25px;
            color: #ffffff;
            margin-bottom: 30px;
        }

        form label {
            display: flex;
            margin-top: 10px;
            font-size: 15px;
            margin-right: 20%;
        }

        form input {
            width: 80%;
            height: 15px;
            background: #ffffff;
            justify-content: center;
            display: flex;
            margin: 10px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        input[type="textarea"] {}

        input[type="submit"] {
            width: 60%;
            margin-left: 100px;
            border: none;
            height: 40px;
            color: #fff;
            background: #0d287b;
            font-size: 16px;
            font-weight: bold;
            border-radius: 15px;
        }

        input[type="button"]:hover {
            cursor: pointer;
            background: #1336a1;
            color: #fff;
            font-weight: bold;
        }

        select {
            width: 84%;
            height: 40px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 10px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        p {
            text-align: center;
            padding-top: 15px;
            font-size: 14px;
            color: #000;
        }

        p a {
            color: #651fe6;
        }

        .para-2 {
            text-align: center;
            color: black;
            font-size: 15px;
            margin-top: -20px;
        }

        .para-2 a {
            color: #5ad4b5;

        }
    </style>
</head>

<body>
    <div class="signup-box">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required />
            <input type="text" name="last_name" placeholder="Last Name" required />
            <input type="text" name="username" placeholder="Username" required />
            <select id="usertype" name="usertype" required>
                <option value="borrowers">Borrower</option>
                <option value="admin">Admin</option>
            </select>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm password" required />
            <input type="submit" value="Submit" />
            <closeform></closeform>
        </form>

        <p>
            By clicking the Sign Up button,you agree to our <br>
            <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
        </p>
        <p class="para-2">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
    </div>

</html>