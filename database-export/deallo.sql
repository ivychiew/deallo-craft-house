-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2017 at 10:18 AM
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
-- Database: `deallo`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `productPrice` varchar(50) CHARACTER SET latin1 NOT NULL,
  `productDescription` varchar(255) CHARACTER SET latin1 NOT NULL,
  `productPic` varchar(200) CHARACTER SET latin1 NOT NULL,
  `productCategory` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`productID`, `productName`, `productPrice`, `productDescription`, `productPic`, `productCategory`) VALUES
(62, 'Plain White Shirt ', '29.90', 'Men\'s white shirt in sizes S, M, L and XL', '296420.jpg', ''),
(63, 'Sleeveless Black Dress', '39.90', 'Perfect for the beach! ', '459547.jpg', ''),
(64, 'Silver Bead Bracelet', '15', 'Handmade bead bracelet crafted from the finest sterling silver', '912317.jpg', ''),
(65, 'Wooden Plain Bench', '49.90', 'Handcrafted Wooden Bench', '975319.jpg', '...'),
(66, 'Green Hammock', '50', 'Thick cloth mayan hammock', '899606.jpg', ''),
(67, 'Homemade Breakfast Rolls', '5', 'Freshly packed with 6 muffins in each bag.', '293146.jpg', ''),
(68, 'Banana Muffinss', '7', 'Sweet Savory Banana Muffinsss', '439692.jpg', '...'),
(69, 'Cookies', '10', 'Oatmeal', '270089.jpg', 'Food'),
(70, 'Wooden Bracelet', '5', 'Square Wooden Bracelet', '310387.jpg', 'Jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `surname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `color` varchar(255) CHARACTER SET latin1 NOT NULL,
  `profile_image` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `bio` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `phoneNumber` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `surname`, `color`, `profile_image`, `bio`, `country`, `address`, `phoneNumber`) VALUES
(6, 'tracer', 'tracer@mail.com', '202cb962ac59075b964b07152d234b70', 'tracer', 'blue', NULL, NULL, NULL, NULL, NULL),
(7, 'boobytrap', 'booby@gmail.com', '12345', 'partyboob', 'yellow', '../images/adminProfile.png', NULL, NULL, NULL, NULL),
(8, 'peanutbutter', 'jam@gmail.com', 'Ab123456', 'peanutbutter', 'chocolate', '../images/adminProfile.png', NULL, NULL, NULL, NULL),
(9, 'gaylord', 'gaylord@mail.com', 'Ab123456', 'gaylord', 'rainbow', '../images/adminProfile.png', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
