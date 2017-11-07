-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 01:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deallo_udb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_owner` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `summary`, `price`, `quantity`, `image`, `product_owner`, `category`) VALUES
(62, 'Plain White Shirt', 'Men''s white shirt in sizes S, M, L and XL', 30, '1', '296420.jpg', 'peanutbutter\r\n', 'Clothes'),
(63, 'Sleeveless Black Dress', 'Perfect for the beach!', 40, '1', '459547.jpg\r\n', 'peanutbutter', 'Dress'),
(64, 'Silver Bead Bracelet', 'Handmade bead bracelet', 15, '1', '912317.jpg', 'gaylord', 'Jewellery'),
(65, 'Green Hammock', 'Thick cloth mayan hammock', 50, '1', '899606.jpg', 'peanutbutter', 'Bedding & Room Decor'),
(66, 'Chair', 'Wooden Chair', 50, '1', '201477.jpg', '', 'Bedding & Room Decor'),
(67, 'Homemade Breakfast Rolls\r\n', 'Freshly packed with 6 muffins in each bag.', 5, '1', '293146.jpg', 'peanutbutter', 'Food\r\n'),
(68, 'Banana Muffins', 'Sweet Savory Banana Muffinsss', 7, '1', '439692.jpg', 'peanutbutter', 'Food'),
(69, 'Pasta', 'Pasta', 10, '', '34421.png', '', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `comment` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `username`, `comment`) VALUES
(1, 'peanutbutter', 'sas'),
(2, 'peanutbutter', 'sd'),
(3, 'peanutbutter', 'qw'),
(4, 'peanutbutter', 'qw'),
(5, 'peanutbutter', 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE `shopping` (
  `id_user` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `amount_quantity` varchar(10) NOT NULL,
  `amount_price` double NOT NULL,
  `order_number` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id_user`, `id`, `amount_quantity`, `amount_price`, `order_number`) VALUES
(1, 62, '3', 90, 280501),
(1, 63, '2', 80, 280501),
(1, 64, '2', 30, 280501),
(1, 65, '2', 100, 280501),
(1, 66, '3', 150, 280501),
(1, 67, '2', 10, 280501),
(1, 68, '2', 14, 280501);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `profile_image` varchar(50) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `surname`, `color`, `profile_image`, `bio`, `country`, `address`, `phoneNumber`) VALUES
(0, 'test4', 'caraphernelic@live.com', 'Jargon123', 'pas', 'qw', '../images/adminProfile.png', '', '', '', 0),
(1, 'peanutbutter', 'peanutbutter@mail.com', 'Ab123456', 'and', 'brown', '../images/adminProfile.png', 'made out of penut and jeluur', 'pbandj', 'acorn road 22', 192837),
(2, 'gaylord', 'gaylord@mail.com', 'Ab123456', 'gaylord', 'rainbow', '../images/adminProfile.png', 'not gay just queer', 'canada', 'america', 1300882525);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id_user`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `shopping_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;