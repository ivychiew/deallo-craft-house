-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 07:42 AM
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
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(50) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productPic` varchar(200) NOT NULL,
  `productCategory` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`productID`, `productName`, `productPrice`, `productDescription`, `productPic`, `productCategory`) VALUES
(62, 'Plain White Shirt ', '29.90', 'Men\'s white shirt in sizes S, M, L and XL', '296420.jpg', ''),
(63, 'Sleeveless Black Dress', '39.90', 'Perfect for the beach! ', '459547.jpg', ''),
(64, 'Silver Bead Bracelet', '15', 'Handmade bead bracelet crafted from the finest sterling silver', '912317.jpg', ''),
(65, 'Wooden Plain Bench', '49.90', 'Wooden Bench handcrafted from the best wood', '975319.jpg', ''),
(66, 'Green Hammock', '50', 'Thick cloth mayan hammock', '899606.jpg', ''),
(67, 'Homemade Breakfast Rolls', '5', 'Freshly packed with 6 muffins in each bag.', '293146.jpg', ''),
(68, 'Banana Muffinss', '7', 'Sweet Savory Banana Muffinsss', '439692.jpg', '...'),
(69, 'Cookies', '10', 'Oatmeal', '270089.jpg', 'Food'),
(70, 'Wooden Bracelet', '5', 'Square Wooden Bracelet', '310387.jpg', 'Jewelry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
