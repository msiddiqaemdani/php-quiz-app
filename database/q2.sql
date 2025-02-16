-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q2`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'What does PHP stand for?', 'Personal Home Page', 'Private Home Page', 'PHP: Hypertext Preprocessor', 'Public Home Page', 3),
(2, 'Which superglobal variable holds server and execution environment information?', '$_SERVER', '$_GET', '$_POST', '$_SESSION', 1),
(3, 'Which function is used to output text to the browser in PHP?', 'echo', 'print', 'output', 'display', 1),
(4, 'Which of the following is a correct way to start a PHP block?', '<?php', '<script>', '<?', '<%=', 1),
(5, 'Which of these is a popular PHP framework?', 'Django', 'Laravel', 'Ruby on Rails', 'Spring', 2),
(6, 'Which version of PHP introduced the null coalescing operator (??)?', 'PHP 5.3', 'PHP 7.0', 'PHP 5.6', 'PHP 7.4', 2),
(7, 'What is the correct way to end a PHP statement?', ';', '.', ':', ',', 1),
(8, 'Which function starts a session in PHP?', 'session_begin()', 'start_session()', 'session_start()', 'begin_session()', 3),
(9, 'How do you create an array in PHP?', '$arr = array();', '$arr = [];', 'Both 1 and 2', 'None of the above', 3),
(10, 'Which operator is used for string concatenation in PHP?', '+', '.', '&', 'concat()', 2),
(11, 'Which function checks if a variable is set in PHP?', 'isset()', 'empty()', 'defined()', 'is_set()', 1),
(12, 'Which error reporting level reports all errors in PHP?', 'E_ALL', 'E_ERROR', 'E_NOTICE', 'E_STRICT', 1),
(13, 'How do you write a single-line comment in PHP?', '// comment', '# comment', '/* comment */', '<!-- comment -->', 4),
(14, 'Which function includes and evaluates a file only once?', 'include()', 'include_once()', 'require()', 'require_once()', 2),
(15, 'What is the file extension for PHP files?', '.php', '.ph', '.html', '.phtml', 1),
(16, 'Which function is used to get the length of a string in PHP?', 'strlen()', 'strlength()', 'length()', 'count()', 1),
(17, 'What does var_dump() do in PHP?', 'Outputs the type and value of a variable', 'Dumps variable info', 'Both 1 and 2', 'None of the above', 3),
(18, 'Which function redirects to another page in PHP?', 'redirect()', 'header(\"Location: ...\")', 'move()', 'go()', 2),
(19, 'How can you send an email using PHP?', 'mail()', 'sendmail()', 'email()', 'smtp()', 1),
(20, 'What is the output of: echo 5 + \"5 apples\"; ?', '10', '55', '5 apples5', 'Error', 1),
(21, 'Which function returns the current timestamp in PHP?', 'time()', 'now()', 'timestamp()', 'current_time()', 1),
(22, 'What vulnerability allows execution of arbitrary SQL queries?', 'Cross-site scripting', 'SQL injection', 'CSRF', 'None of the above', 2),
(23, 'Which function can encrypt a string in PHP?', 'crypt()', 'hash()', 'md5()', 'All of the above', 4),
(24, 'Which is a valid PHP variable name?', '$var_name', '$varName', '$_var', 'All of the above', 4),
(25, 'What is the purpose of session_destroy() in PHP?', 'End the current session', 'Remove session data', 'Log out the user', 'All of the above', 4),
(26, 'Which function is used to connect to a MySQL database in PHP?', 'mysqli_connect()', 'mysql_connect()', 'PDO', 'All of the above', 4),
(27, 'What is the output of: echo 10 % 3;', '1', '2', '3', '0', 1),
(28, 'Which keyword can be used to define a constant in PHP?', 'const', 'define()', 'Both 1 and 2', 'None', 3),
(29, 'Which construct is used for error handling in PHP?', 'try-catch', 'set_error_handler()', 'Both 1 and 2', 'error_reporting()', 3),
(30, 'What is the correct way to declare a function in PHP?', 'function myFunc() {}', 'def myFunc() {}', 'function: myFunc() {}', 'declare myFunc() {}', 1),
(31, 'What is the result of: echo 2 ** 3;', '5', '6', '8', '9', 3),
(32, 'Which superglobal variable holds cookie information in PHP?', '$_COOKIE', '$_SESSION', '$_REQUEST', '$_FILES', 1),
(33, 'What is the purpose of the trim() function in PHP?', 'Remove whitespace from beginning and end', 'Shorten a string', 'Remove HTML tags', 'Format a string', 1),
(34, 'Which of the following is a valid loop in PHP?', 'for', 'foreach', 'while', 'All of the above', 4),
(35, 'What is the output of: echo \"5\" . \"5\"; ?', '10', '55', '5 5', 'Error', 2),
(36, 'How do you write a multi-line comment in PHP?', '//', '#', '/* comment */', '<!-- comment -->', 3),
(37, 'Which of the following is NOT a PHP data type?', 'String', 'Integer', 'Boolean', 'Character', 4),
(38, 'Which function returns an array of all defined variables in PHP?', 'get_defined_vars()', 'var_dump()', 'print_r()', 'get_vars()', 1),
(39, 'What does the explode() function do in PHP?', 'Splits a string by a delimiter', 'Joins array elements', 'Splits a file', 'None of the above', 1),
(40, 'Which function is used to sort an array in PHP?', 'sort()', 'asort()', 'ksort()', 'All of the above', 4),
(41, 'What does array_merge() do in PHP?', 'Merges two or more arrays', 'Sorts arrays', 'Finds the difference between arrays', 'Splits an array', 1),
(42, 'Which function returns the maximum value in an array in PHP?', 'max()', 'array_max()', 'maximum()', 'count()', 1),
(43, 'What is the correct way to open a file for reading in PHP?', 'fopen(\"file.txt\", \"r\")', 'open(\"file.txt\", \"read\")', 'file_open(\"file.txt\")', 'readfile(\"file.txt\")', 1),
(44, 'Which superglobal is used to collect form data in PHP?', '$_GET', '$_POST', 'Both $_GET and $_POST', '$_FORM', 3),
(45, 'What is the output of: echo 5 + \"5 days\"; ?', '10', '55', 'Error', '5 days', 1),
(46, 'Which function converts a string to an integer in PHP?', '(int)', 'intval()', 'Both (int) and intval()', 'parseInt()', 3),
(47, 'What is the purpose of the header() function in PHP?', 'Modify HTTP headers', 'Start output buffering', 'Send cookies', 'Include files', 1),
(48, 'Which function returns the type of a variable in PHP?', 'gettype()', 'type()', 'var_type()', 'typeof()', 1),
(49, 'How do you create a constant in PHP?', 'define()', 'constant()', 'set_constant()', 'const()', 1),
(50, 'Which function outputs a formatted string in PHP?', 'printf()', 'sprintf()', 'echo', 'Both printf() and sprintf()', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
