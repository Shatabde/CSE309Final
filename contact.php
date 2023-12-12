<?php
include "includes/route.php";
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['library_card'])) {
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        $libraryCard = htmlspecialchars($_POST['library_card']);

        $userIdQuery = mysqli_query($conn, "SELECT userId FROM logedIn");
        $userIdRow = mysqli_fetch_assoc($userIdQuery);
        $userId = $userIdRow['userId'];

        $insertQuery = "INSERT INTO messages (userId, subject, message, cardId)
                        VALUES ('$userId', '$subject', '$message', '$libraryCard')";

        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Message sent!");</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookNest</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-[url('bgImage.jpg')] bg-center bg-cover">
    <div class="flex-1">
        <?php include "includes/borrowNav.php"; ?>
        <div class="bg-blue-200 p-10 rounded-md shadow-md mx-auto mt-7 w-1/2" style="opacity: 0.9">
            <div class="flex items-center justify-center">
                <div class="w-96 h-96 mr-8">
                    <img src="2926557.jpg" alt="Image" class="w-full h-full rounded-md shadow-md object-cover">
                </div>
                <div class="w-96">
                    <h1 class="text-2xl font-semibold mb-6">Contact Us </h1>
                    <form action="contact.php" method="POST">

                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-bold mb-2">Subject:</label>
                            <input type="text" id="subject" name="subject" placeholder="Subject" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-bold mb-2">Message/Inquiry:</label>
                            <textarea id="message" name="message" placeholder="Your Message" rows="4" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="library_card" class="block text-gray-700 font-bold mb-2">Library Card
                                Number:</label>
                            <input type="text" id="library_card" name="library_card" placeholder="Library Card Number" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-green-900 text-green-300">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include "includes/borrowFooter.php"; ?>
    <script>
        document.getElementById("booksDropdownBtn").addEventListener("click", function() {
            var dropdown = document.getElementById("booksDropdown");
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", function(event) {
            var dropdown = document.getElementById("booksDropdown");
            var dropdownBtn = document.getElementById("booksDropdownBtn");

            if (!dropdown.contains(event.target) && !dropdownBtn.contains(event.target)) {
                dropdown.classList.add("hidden");
            }
        });
    </script>
</body>

</html>