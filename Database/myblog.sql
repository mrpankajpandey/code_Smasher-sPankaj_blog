-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 01:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL ,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` int(255) NOT NULL,
  `meta_keywords` int(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`) VALUES
(1, 'python', 'python-stuffs-', 'python, web, ml, AI ', 0, 0, 0),
(2, 'html', 'html-tutorial', 'html, css , web ', 0, 0, 0),
(3, 'bootstrap', 'bootstrap-org', 'bootstarp', 0, 0, 0),
(4, 'php', 'Php-stuffs', 'html, css , web , php is web backend language', 0, 0, 0),
(5, 'dbms', 'learn-dbms', 'Database management system is backbone of world also data ', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 0,
  `created_by` tinyint(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `post_content`, `category_id`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_by`, `created_at`) VALUES
(1, 'HTML  Introduction', 'html-tutorial', '<p>1.1<b> Introduction</b></p><p>n this chapter, various component of HTML are discussed to design a web page.\r\nThe basic structure for an HTML page is shown below.</p><p>\r\n• Entries inside the /&lt; . . . /&gt; are known as tags. Most of the tags has an ', 2, 'html, css , web ', '', '', 0, 1, '2023-09-13 10:47:40'),
(2, ' Basic tags', 'html-tutorial', '<p><u>Some Basics Tages Are&nbsp;</u></p><p><u><br></u></p><ol><li><u>&lt;html&gt; &lt;/html&gt;</u></li><li><u>&lt;head&gt; &lt;/head&gt;</u></li><li>&lt;title&gt; &lt;/title&gt;</li><li><u>&lt;nav&gt; &lt;/nav&gt;</u></li><li><u>&lt;body&gt; &lt;/body&gt;</u></li><li><u>&lt;main&gt; &lt;/main&gt;</u></li><li><u>&lt;footer&gt; &lt;/footer&gt;</u></li></ol> ', 2, 'html, css , web ', '', '', 0, 1, '2023-09-13 11:10:53'),
(3, 'Bootstrap : Introduction', 'bootstrap-org', '<p>One of the problem with basic HTML design is that the webpage may look different in different browser or device\r\n(e.g. mobile, tablet and laptop). Therefore, we may need to modify the code according to browser or device. The\r\nproblem can be easily resolved by using Bootstrap.\r\nBootstrap is a framework which uses HTML, CSS and JavaScript for the web design. It is supported by all the\r\nmajor browsers e.g. Firefox, Opera and Chrome etc. Further, Bootstrap includes several predefined classes for\r\neasy layouts e.g. dropdown buttons, navigation bar and alerts etc. Lastly, it is responsive in nature i.e. the layout\r\nchanges automatically according to the device e.g. mobile or laptop etc.</p><p><b>Setup:</b></p><p>Bootstrap needs atleast 3 files for its operation which can be downloaded from the Bootstrap website</p><p>&nbsp;• bootstrap.css (Line 7) : This file contains various CSS for bootstrap.\r\n</p><p>&nbsp;• bootstrap.js (Line 16) : This file contains various JavaScript functionalities e.g. dropdown and alerts etc.&nbsp;</p><p>&nbsp;• jQuery.js (Line 17) : This file is the jQuery library which can be downloaded from the ‘jQuery’ website.\r\nIt is required for proper working of ‘bootstrap.js’.<b><br></b><br></p>', 3, 'bootstarp', '', '', 0, 1, '2023-09-13 11:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role` tinyint(11) NOT NULL DEFAULT 0,
  `status` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Pankaj', 'pankaj@gmail.com', 'admin1234', 1, 0),
(2, 'priya', 'priya@gmail.com', 'admin12345', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
