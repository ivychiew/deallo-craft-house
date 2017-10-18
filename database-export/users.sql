-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 09:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `profile_image` varchar(50) DEFAULT NULL,
  `bio` varchar(50) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `surname`, `color`, `profile_image`, `bio`, `country`, `address`, `phoneNumber`) VALUES
(1, 'test1', '100066109@students.swinburne.edu.my', '123', '123', '123', 'cPopUp.PNG', '\r\n', 'WWW', NULL, NULL),
(2, 'test2', '11111@students.swinburne.edu.my', '', '345', '345', 'C:xampp	mpphpD023.tmp', NULL, NULL, NULL, NULL),
(3, 'test3', '100066109@students.swinburne.edu.my', '123', '123', '123', 'AB.PNG', NULL, NULL, NULL, NULL),
(4, 'test4', '100066109@students.swinburne.edu.my', '123', '123', '123', '', NULL, NULL, NULL, NULL),
(5, 'test5', '100066109@students.swinburne.edu.my', '202cb962ac59075b964b07152d234b70', '123', '123', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
