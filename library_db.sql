-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 01:31 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `password`, `username`, `email`, `photo`) VALUES
(1, 'Nwachi', '1234', 'fozzy', 'fozzyington@gmail.com', '2086_1527169280.png'),
(3, 'Vanessa Smith', '1234', 'smith', 'vanessa@gmail.com', 'posts-images/7197_1531096754.jpeg'),
(4, 'Somto Aruonu', '1234', 'somatic', 'somygee@gmail.com', 'posts-images/2368_1531097680.jpeg'),
(5, 'Jephthah Ugwuoke', '1234', 'jeph', 'jeph@gmail.com', 'posts-images/153114422990.jpeg'),
(6, 'Ebenezer Bamination', '1234', 'eben', 'eben@gmail.com', 'posts-images/153114439974.jpeg'),
(7, 'Ebuka Onyekwere', '1234', 'ebuka200', 'ebuka@gmail.com', 'posts-images/153139138928.jpeg'),
(8, 'Ebuka Onyekwere', '1234', 'ebuka200', 'ebuka@gmail.com', 'posts-images/153139155541.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `book_type` text NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `book` (`book_id`, `title`, `book_type`, `author_name`, `borrow_date`, `return_date`) VALUES
(1, 'The Hound of the Baskervilles', 'Mystery', 'Conan Doyle', '2023-07-10', '2023-07-25'),
(2, 'Gone Girl', 'Mystery', 'Gillian Flynn', '2023-07-10', '2023-07-24'),
(3, 'The Girl with the Dragon Tattoo', 'Mystery', 'Stieg Larsson', '2023-07-13', '2023-07-30'),
(4, 'The Da Vinci Code', 'Mystery', 'Dan Brown', '2023-07-25', '2023-08-07'),
(5, 'Murder on the Orient Express', 'Mystery', 'Agatha Christie', '2023-07-25', '2023-08-03'),
(6, 'Big Little Lies', 'Mystery', 'Liane Moriarty', '2023-07-27', '2023-08-09'),
(7, 'To Kill a Mockingbird', 'Fiction', 'Harper Lee', '2023-08-01', '2023-08-10'),
(8, 'The Great Graspby', 'Fiction', 'F. Scott Fitzgerald', '2023-08-01', '2023-08-15'),
(9, 'Pride and Prejudice', 'Fiction', 'Jane Austen', '2023-08-17', '2023-09-26'),
(10, 'The Catcher in the Rye', 'Fiction', 'J.D. Salinger', '2023-09-19', '2023-09-27'),
(11, 'The Lord of the Rings', 'Fiction', 'J.R.R. Tolkien', '2023-09-20', '2023-09-30'),
(12, 'The Handmaid\'s Tale', 'Fiction', 'Margaret Atwood', '2023-09-27', '2023-10-07'),
(13, 'The Kite Runner', 'Fiction', 'Khaled Hosseini', '2023-10-16', '2023-10-24'),
(14, 'Sapiens: A Brief History of Humankind', 'Nonfiction', 'Yuval Noah Harari', '2023-10-26', '2023-11-02'),
(15, 'Becoming', 'Nonfiction', 'Michelle Obama', '2023-10-29', '2023-11-09'),
(16, 'The Immortal Life of Henrietta Lacks', 'Nonfiction', 'Rebecca Skloot', '2023-10-31', '2023-11-14'),
(17, 'Educated', 'Nonfiction', 'Tara Westover', '2023-11-01', '2023-11-10'),
(18, 'The Power of Habit: Why We Do What We Do in Life and Business', 'Nonfiction', 'Charles Duhigg', '2023-11-09', '2023-11-21'),
(19, 'Thinking, Fast and Slow', 'Nonfiction', 'Daniel Kahneman', '0000-00-00', '0000-00-00'),
(20, 'The Sixth Extinction: An Unnatural History', 'Nonfiction', 'Elizabeth Kolbert', '2023-11-20', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` varchar(20) NOT NULL,
  `returnDate` varchar(20) NOT NULL,
  `bookId` int(2) NOT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `num_of_books` int(11) NOT NULL,
  `money_owed` varchar(20) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `matric_no`, `password`, `username`, `email`, `num_of_books`, `money_owed`, `phone_number`) VALUES
(1, 'ADSE-9835', '123', 'student1', 'test1@gmail.com', 2, '150', '08124579655'),
(2, 'ADSE-9835', '321', 'student2', 'test2@gmail.com', 2, '120', '08124578966');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
