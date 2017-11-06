-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 07:53 AM
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
(62, 'Plain White Shirt', 'Men\'s white shirt in sizes S, M, L and XL', 30, '1', '296420.jpg', 'peanutbutter\r\n', 'Clothes'),
(63, 'Sleeveless Black Dress', 'Perfect for the beach!', 40, '1', '459547.jpg\r\n', 'peanutbutter', 'Dress'),
(64, 'Silver Bead Bracelet', 'Handmade bead bracelet', 15, '1', '912317.jpg', 'gaylord', 'Jewellery'),
(66, 'Chair', 'Wooden Chair', 50, '1', '201477.jpg', '', 'Furniture'),
(67, 'Hammock', 'Soft', 39, '1', '141204.jpg', '', 'Furniture'),
(68, 'this', 'dog', 10, '1', '803187.jpg', '', 'Clothes');

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
(1, 'peanutbutter', 'peanutbutter@mail.com', 'Ab123456', 'and', 'brown', '../images/adminProfile.png', 'made out of penut and jeluur', 'pbandj', 'acorn road 22', 192837),
(9, 'gaylord', 'gaylord@mail.com', 'Ab123456', 'gaylord', 'rainbow', '../images/adminProfile.png', 'not gay just queer', 'canada', 'america', 1300882525);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id_user`,`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
