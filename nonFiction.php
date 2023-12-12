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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $bookId = $_POST['id'];

    $userIdQuery = mysqli_query($conn, "SELECT userId FROM logedIn");
    $userIdRow = mysqli_fetch_assoc($userIdQuery);
    $userId = $userIdRow['userId'];

    $borrowDate = date("Y-m-d");

    $noOfBorrowedDate = 7;
    $fine = 0;

    $insertQuery = $conn->prepare("INSERT INTO user_books (user_id, book_id, borrow_date, no_of_borrowed_date, fine)
                    VALUES (?, ?, ?, ?, ?)");

    $insertQuery->bind_param("iissi", $userId, $bookId, $borrowDate, $noOfBorrowedDate, $fine);

    if ($insertQuery->execute()) {
        echo '<script>alert("Book Borrowed!");</script>';
    } else {
        echo "Error: " . $insertQuery->error;
    }

    $insertQuery->close();
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
    <link rel="stylesheet" type="text/css" href="Asset/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Asset/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="Asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="Asset/flickity/flickity.css">
    <link rel="stylesheet" type="text/css" href="Asset/css/sweetalert.css">
    <script type="text/javascript" src="Asset/flickity/flickity.js"></script>
    <script type="text/javascript" src="Asset/sweetalert.min.js"></script>
</head>

<body class="flex flex-col min-h-screen bg-[url('bgImage.jpg')] bg-center bg-cover">

    <div class="flex-1">

    <?php include "includes/borrowNav.php"; ?>

        <div class="container mt-7">
            <div class="panel panel-default">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book Id</th>
                            <th>Book Title</th>
                            <th>Book Type</th>
                            <th>Author Name</th>
                            <th>Borrow</th>
                        </tr>
                    </thead>
                    <?php
                    $sql2 = "SELECT * FROM books WHERE book_type = 'Nonfiction'";
                    $query2 = mysqli_query($conn, $sql2);
                    $counter = 1;

                    while ($row = mysqli_fetch_array($query2)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['book_type']; ?></td>
                                <td><?php echo $row['author_name']; ?></td>
                                <td>
                                    <form method='post' action='nonFiction.php'>
                                        <input type='hidden' value="<?php echo $row['book_id']; ?>" name='id'><button name='borrow' type='button' value='<?php echo $row['book_id']; ?>' class='bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600' onclick='confirmBorrow(this.value)'>Borrow</button>

                                        <script>
                                            function confirmBorrow(bookId) {
                                                var confirmBorrow = confirm("Are you sure you want to borrow this book?");
                                                if (confirmBorrow) {
                                                    var form = document.createElement('form');
                                                    form.method = 'post';
                                                    form.action = 'nonFiction.php';

                                                    var input = document.createElement('input');
                                                    input.type = 'hidden';
                                                    input.name = 'id';
                                                    input.value = bookId;

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
    </div>

    <?php include "includes/borrowFooterBook.php"; ?>


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