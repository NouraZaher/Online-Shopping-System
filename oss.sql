-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2020 at 09:49 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oss`
--

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

DROP TABLE IF EXISTS `fav`;
CREATE TABLE IF NOT EXISTS `fav` (
  `username` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`username`, `store_id`) VALUES
('nour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `def` varchar(10) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `store_id`, `product_id`, `product_discount`, `customerName`, `phone_number`, `address`, `def`, `quantity`) VALUES
(3, 1, 3, 14, 'nour', 70623992, 'Tripoly', 'sent', 3),
(5, 1, 1, 0, 'nour', 76770186, 'Tripoly', 'sent', 5),
(7, 1, 1, 0, 'nour', 70623992, 'Tripoly', 'ordered', 5),
(6, 1, 1, 0, 'nour', 70623992, 'Tripoly', 'ordered', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_discount` int(100) NOT NULL,
  `product_cost` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `store_id`, `product_name`, `product_img`, `product_price`, `product_description`, `product_discount`, `product_cost`, `quantity`) VALUES
(1, 1, 'Orange', 'uploads/unnamed.jpg', 66, 'Good Healthy orange', 0, 8, 100),
(2, 2, 'BlackBerry', '', 20, 'Good Phone', 0, 15, 50),
(3, 1, 'Apple', 'uploads/download.jpg', 55, 'Good Apple', 14, 20, 100),
(5, 2, 'Draw', 'uploads/DUkmGPOWsAAkyOs.jpg', 20, 'Draw of man', 0, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `store_address` varchar(100) NOT NULL,
  `store_phonenumber` int(11) NOT NULL,
  `store_category` varchar(100) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `username`, `store_name`, `store_address`, `store_phonenumber`, `store_category`) VALUES
(1, 'noura', 'H&F', 'Saida', 123, 'Clothes'),
(2, 'noura', 'bbn', 'sss', 444, 'Home Product'),
(3, 'Heba', 'Www', 'AAa', 12354, 'Food'),
(4, 'noura', 'ppl', 'Saida', 71236548, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

DROP TABLE IF EXISTS `user_signup`;
CREATE TABLE IF NOT EXISTS `user_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`id`, `full_name`, `username`, `password`, `address`, `bdate`, `phone_number`, `role`) VALUES
(1, 'noura zaher', 'noura', 'aaa', 'hhh', '2001-05-31', 70623992, 'owner'),
(2, 'Heba Zaher', 'heba', 'zzz', 'Naameh', '1998-08-06', 76770186, 'owner'),
(3, 'nour zaher', 'nour', 'asd', 'Naameh', '2001-05-31', 70623992, 'customer'),
(4, 'noura zaher', 'noura2', 'qwert', NULL, NULL, NULL, 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
