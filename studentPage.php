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

    <?php
    $userIdQuery = mysqli_query($conn, "SELECT userId FROM logedIn");
    $userIdRow = mysqli_fetch_assoc($userIdQuery);
    $userId = $userIdRow['userId'];
    $sql = "SELECT * FROM borrowinfo WHERE id = '$userId'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $numRows = count($rows);

    for ($i = 0; $i < $numRows;) {
    ?>
      <div class="flex flex-row">

        <div class="text-black font-bold mt-8 px-36 content-center w-1/2">
          <div class="bg-gray-50 inline-block rounded-lg overflow-hidden shadow-md ">
            <div class="text-center text-2xl">
              <div class="mb-4 flex-row flex items-center">
                <div class="max-w-sm">
                  <img class="w-full h-56 object-cover" src="library.jpg" alt="Book cover image">
                  <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 flex items-center">Book Borrowed</div>
                    <div class="flex flex-row mb-2">
                      <p class="text-gray-700 text-base flex items-center mr-2">Book Name: </p>
                      <p class="text-blue-800 text-base overflow-ellipsis"><?php echo '' . $rows[$i]['title']; ?></p>
                    </div>
                    <div class="flex flex-row mb-2">
                      <p class="text-gray-700 text-base flex items-center mr-2">Author Name: </p>
                      <p class="text-blue-800 text-base"><?php echo '' . $rows[$i]['author_name']; ?></p>
                    </div>
                    <div class="flex flex-row mb-2">
                      <p class="text-gray-700 text-base flex items-center mr-2">Book Type: </p>
                      <p class="text-blue-800 text-base"><?php echo '' . $rows[$i]['book_type']; ?></p>
                    </div>
                    <div class="flex flex-row mb-2">
                      <p class="text-gray-700 text-base flex items-center mr-2">Borrow Date: </p>
                      <p class="text-blue-800 text-base"><?php echo '' . $rows[$i]['borrow_date']; ?></p>
                    </div>
                    <div class="flex flex-row">
                      <p class="text-gray-700 text-base flex items-center mr-2">Fine: </p>
                      <p class="text-blue-800 text-base"><?php echo '' . $rows[$i]['fine']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        if (($i + 1)  != $numRows) {
          echo '
<div class="text-black font-bold mt-8 px-36 content-center w-1/2">
    <div class="bg-gray-50 inline-block rounded-lg overflow-hidden shadow-md">
        <div class="text-center text-2xl">
            <div class="mb-4 flex-row flex items-center">
                <div class="max-w-sm">
                    <img class="w-full h-56 object-cover" src="library.jpg" alt="Book cover image">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 flex items-center">Book Borrowed</div>
                        <div class="flex flex-row mb-2">
                            <p class="text-gray-700 text-base flex items-center mr-2">Book Name: </p>
                            <p class="text-blue-800 text-base overflow-ellipsis">' . $rows[$i + 1]['title'] . '</p>
                        </div>
                        <div class="flex flex-row mb-2">
                            <p class="text-gray-700 text-base flex items-center mr-2">Author Name: </p>
                            <p class="text-blue-800 text-base">' . $rows[$i + 1]['author_name'] . '</p>
                        </div>
                        <div class="flex flex-row mb-2">
                            <p class="text-gray-700 text-base flex items-center mr-2">Book Type: </p>
                            <p class="text-blue-800 text-base">' . $rows[$i + 1]['book_type'] . '</p>
                        </div>
                        <div class="flex flex-row mb-2">
                            <p class="text-gray-700 text-base flex items-center mr-2">Borrow Date: </p>
                            <p class="text-blue-800 text-base">' . $rows[$i + 1]['borrow_date'] . '</p>
                        </div>
                        <div class="flex flex-row">
                            <p class="text-gray-700 text-base flex items-center mr-2">Fine: </p>
                            <p class="text-blue-800 text-base">' . $rows[$i + 1]['fine'] . '</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
        }
        ?>
      </div>
      <?php
      if ($numRows % 2 === 0) {
        $i += 2;
      } else {
        if ($numRows === $i) {
          break;
        } else if (($numRows - $i) == 1) {
          $i += 1;
        } else {
          $i += 2;
        }
      }
      ?>
    <?php } ?>
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