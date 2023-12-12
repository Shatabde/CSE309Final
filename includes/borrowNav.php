<nav class="flex items-center text-white justify-between font-semibold bg-violet-950">
    <div class="flex items-center">
        <img src="logo.png" alt="" class="w-19 h-14 mx-3 my-3 px-5 ml-20 hover:cursor-pointer">
        <span class="text-2xl font-bold hover:text-cyan-600">BookNest</span>
    </div>
    <ul class="mr-20">
        <li class="inline-block list-none px-3 text-xl hover:text-cyan-600"><a href="studentPage.php"> Home</a></li>
        <li class="inline-block list-none px-4 text-xl hover:text-cyan-600 relative">
            <div class="relative inline-block text-left">
                <button id="booksDropdownBtn" class="inline-flex justify-center w-full">
                    <a href="#" class="inline-block list-none px-4 text-xl hover:text-cyan-600"> Books</a>
                </button>
                <div id="booksDropdown" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white">
                    <a href="fiction.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Fiction</a>
                    <a href="nonFiction.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Non-Fiction</a>
                    <a href="mystery.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Mystery</a>
                </div>
            </div>
        </li>
        <li class="inline-block list-none px-4 text-xl hover:text-cyan-600"><a href="about.php"> About</a></li>
        <li class="inline-block list-none px-4 text-xl hover:text-cyan-600"><a href="contact.php"> Contact Us</a></li>
        <li type="submit" name="logout" class="inline-block list-none px-4 text-xl hover:text-cyan-600"><a href="logout.php">Logout</a></li>
    </ul>
</nav>