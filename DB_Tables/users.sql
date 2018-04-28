-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 10:26 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `num_posts` int(255) DEFAULT NULL,
  `num_likes` int(255) DEFAULT NULL,
  `friends` int(255) DEFAULT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `education` text,
  `profile_image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `age`, `num_posts`, `num_likes`, `friends`, `profile_name`, `education`, `profile_image`) VALUES
(15, 'ahmed', 'salama', 'a@gmail.com', '123', 123, 8, NULL, NULL, 'ahmed.15', 'ain bta3a', ''),
(16, 'mamdouh', 'darwish', 'mam@gmail.com', '321', 321, 5, NULL, NULL, 'mamdouh.16', '0', ''),
(20, 'hamada', 'eldada', 'h@g.com', '1', 1, 2, NULL, NULL, 'hamada.20', 'ain shams university', NULL),
(21, 'laila', 'hisham', 'hish@gmail.com', '12', 12, NULL, NULL, NULL, 'laila.21', 'ain shams university', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
