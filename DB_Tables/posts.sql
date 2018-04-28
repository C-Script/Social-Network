-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 10:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `owner` int(200) NOT NULL,
  `post` text NOT NULL,
  `likes` int(11) DEFAULT '0',
  `shares` int(11) DEFAULT '0',
  `comments` int(11) DEFAULT '0',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `owner`, `post`, `likes`, `shares`, `comments`, `date_added`) VALUES
(23, 12, 'Be happy', 0, 0, 0, '2018-04-20 18:25:17'),
(24, 0, 'yes I wanna change the world', 0, 0, 0, '2018-04-21 16:03:01'),
(25, 5, 'yes I wanna change the world', 0, 0, 0, '2018-04-21 16:05:35'),
(26, 12, 'hello world !', 0, 0, 0, '2018-04-21 16:12:29'),
(27, 16, 'I wanna change the world', 0, 0, 0, '2018-04-21 19:11:21'),
(28, 16, 'I wanna change the world,agian', 0, 0, 0, '2018-04-21 19:11:49'),
(29, 16, 'Ya allah ', 0, 0, 0, '2018-04-21 19:12:21'),
(30, 15, 'Hi guys', 0, 0, 0, '2018-04-21 19:13:52'),
(31, 15, 'ya gd3an mys7sh', 0, 0, 0, '2018-04-21 19:14:18'),
(32, 15, 'mra ah w mra la2', 0, 0, 0, '2018-04-21 19:14:29'),
(33, 15, 'tb mnta 7lw aho', 0, 0, 0, '2018-04-21 19:14:39'),
(34, 15, 'sba7 el5ir', 0, 0, 0, '2018-04-21 19:14:45'),
(35, 0, 'hi', 0, 0, 0, '2018-04-21 21:48:38'),
(36, 16, 'hi', 0, 0, 0, '2018-04-21 21:49:09'),
(37, 16, 'bye bye', 0, 0, 0, '2018-04-21 21:49:14'),
(38, 0, 'hi', 0, 0, 0, '2018-04-21 22:05:52'),
(39, 20, 'hi', 0, 0, 0, '2018-04-21 22:06:22'),
(40, 20, 'bye bye', 0, 0, 0, '2018-04-21 22:06:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
