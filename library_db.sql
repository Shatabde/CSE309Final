--
-- Database: `library_db`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `book_type` text NOT NULL,
  `author_name` varchar(50) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT IGNORE INTO `books` (`book_id`, `title`, `book_type`, `author_name`) VALUES
(1, 'The Hound of the Baskervilles', 'Mystery', 'Conan Doyle'),
(2, 'Gone Girl', 'Mystery', 'Gillian Flynn'),
(3, 'The Girl with the Dragon Tattoo', 'Mystery', 'Stieg Larsson'),
(4, 'The Da Vinci Code', 'Mystery', 'Dan Brown'),
(5, 'Murder on the Orient Express', 'Mystery', 'Agatha Christie'),
(6, 'Big Little Lies', 'Mystery', 'Liane Moriarty'),
(7, 'To Kill a Mockingbird', 'Fiction', 'Harper Lee'),
(8, 'The Great Gatsby', 'Fiction', 'F. Scott Fitzgerald'),
(9, 'Pride and Prejudice', 'Fiction', 'Jane Austen'),
(10, 'The Catcher in the Rye', 'Fiction', 'J.D. Salinger'),
(11, 'The Lord of the Rings', 'Fiction', 'J.R.R. Tolkien'),
(12, 'The Handmaid\'s Tale', 'Fiction', 'Margaret Atwood'),
(13, 'The Kite Runner', 'Fiction', 'Khaled Hosseini'),
(14, 'Sapiens: A Brief History of Humankind', 'Nonfiction', 'Yuval Noah Harari'),
(15, 'Becoming', 'Nonfiction', 'Michelle Obama'),
(16, 'The Immortal Life of Henrietta Lacks', 'Nonfiction', 'Rebecca Skloot'),
(17, 'Educated', 'Nonfiction', 'Tara Westover'),
(18, 'The Power of Habit: Why We Do What We Do in Life and Business', 'Nonfiction', 'Charles Duhigg'),
(19, 'Thinking, Fast and Slow', 'Nonfiction', 'Daniel Kahneman'),
(20, 'The Sixth Extinction: An Unnatural History', 'Nonfiction', 'Elizabeth Kolbert');


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` enum('admin','borrowers','') NOT NULL,
  `join_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `user_books` (
  `user_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `no_of_borrowed_date` varchar(50) NOT NULL,
  `fine` text NOT NULL,
  PRIMARY KEY (`user_book_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`book_id`) REFERENCES `books`(`book_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT IGNORE INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `user_type`, `join_date`)
VALUES
  (1, 'Alice', 'Johnson', 'alice_student', 'alice.johnson@example.com', 'password123', 'borrowers', STR_TO_DATE('2023-12-10', '%Y-%m-%d')),
  (2, 'Bob', 'Smith', 'bob_student', 'bob.smith@example.com', 'password123', 'borrowers', STR_TO_DATE('2023-12-10', '%Y-%m-%d')),
  (3, 'Charlie', 'Brown', 'charlie_student', 'charlie.brown@example.com', 'password123', 'borrowers', STR_TO_DATE('2023-12-10', '%Y-%m-%d')),
  (4, 'Diana', 'Garcia', 'diana_student', 'diana.garcia@example.com', 'password123', 'borrowers', STR_TO_DATE('2023-12-10', '%Y-%m-%d')),
  (5, 'Evan', 'Miller', 'evan_student', 'evan.miller@example.com', 'password123', 'borrowers', STR_TO_DATE('2023-12-10', '%Y-%m-%d'));


INSERT IGNORE INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `user_type`, `join_date`)
VALUES ('AdminFirstName', 'AdminLastName', 'admin_user', 'admin@example.com', 'password123', 'admin', '2023-12-10');


CREATE TABLE logedIn (userId int(11));

CREATE VIEW IF NOT EXISTS borrowInfo AS
SELECT u.id, b.book_id,ub.user_book_id,b.title,b.book_type,b.author_name , u.first_name, u.last_name, u.username, u.email , ub.borrow_date, ub.no_of_borrowed_date, ub.fine 
FROM `user_books` ub JOIN users u ON u.id = ub.user_id
JOIN books b ON b.book_id = ub.book_id;

CREATE TABLE IF NOT EXISTS messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    subject VARCHAR(255),
    message TEXT,
    cardId INT,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);

