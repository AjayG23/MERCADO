-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2023 at 11:12 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercado`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(6) NOT NULL,
  UNIQUE KEY `address_id` (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(2) NOT NULL,
  UNIQUE KEY `cart_id` (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `parent_id`) VALUES
('163cbc255dc515', 'Food Products', NULL),
('163cbc26f8cd86', 'Personal Care', NULL),
('163cbc286b024c', 'Handicrafts', NULL),
('163cbc29658df0', 'Garments', NULL),
('163cbc2b589e44', 'Bags/Umbrellas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
CREATE TABLE IF NOT EXISTS `courier` (
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_rate` float(4,2) NOT NULL,
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `district_id` (`district_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district_name`) VALUES
('163cc1809ab4a1', '163cc171bae085', 'Thiruvananthapuram'),
('163cc181c86c2d', '163cc171bae085', 'Kollam'),
('163cc184f0c5b4', '163cc171bae085', 'Pathanamthitta'),
('163cc186b41a0d', '163cc171bae085', 'Alappuzha'),
('163cc187cbc1ee', '163cc171bae085', 'Kottayam'),
('163cc188ecf324', '163cc171bae085', 'Idukki'),
('163cc189f03d02', '163cc171bae085', 'Ernakulam'),
('163cc18b6a7ad1', '163cc171bae085', 'Thrissur'),
('163cc18c672bd0', '163cc171bae085', 'Palakkad'),
('163cc18d6ae0ac', '163cc171bae085', 'Malappuram'),
('163cc18e698c8f', '163cc171bae085', 'Kozhikode'),
('163cc18f5310e9', '163cc171bae085', 'Wayanad'),
('163cc19075199e', '163cc171bae085', 'Kannur'),
('163cc192104394', '163cc171bae085', 'Kasargod');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(2) NOT NULL,
  `mrp` float(7,2) NOT NULL,
  `tax` int(2) NOT NULL,
  `rate` float(7,2) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `discount` int(2) NOT NULL,
  `gross_amount` float(8,2) NOT NULL,
  `tax_amount` float(6,2) NOT NULL,
  `net_amount` float(8,2) NOT NULL,
  `date_time` bigint(10) NOT NULL,
  `cancel_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_total`
--

DROP TABLE IF EXISTS `order_total`;
CREATE TABLE IF NOT EXISTS `order_total` (
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` float(8,2) NOT NULL,
  `payment_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `date_time` bigint(10) NOT NULL,
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(3) NOT NULL,
  `mrp` float(7,2) NOT NULL,
  `discount` int(2) NOT NULL,
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `img_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `img_id` (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `question_id` (`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

DROP TABLE IF EXISTS `recently_viewed`;
CREATE TABLE IF NOT EXISTS `recently_viewed` (
  `recent_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` bigint(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  UNIQUE KEY `review_id` (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `state_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `state_id` (`state_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`) VALUES
('163cc171bae085', 'Kerala');

-- --------------------------------------------------------

--
-- Table structure for table `unit_details`
--

DROP TABLE IF EXISTS `unit_details`;
CREATE TABLE IF NOT EXISTS `unit_details` (
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` int(5) DEFAULT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_details`
--

INSERT INTO `unit_details` (`user_id`, `unit_name`, `unit_no`) VALUES
('163caceaa94c17', 'unitpalakkad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created` bigint(10) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `mobile`, `password`, `user_type`, `verified`, `created`) VALUES
('163caceaa94c17', 'kudumbasree', 'aswathydelloitte@gmail.com', 9744930250, 'a', 'S', 'Y', 1674235562),
('163cace5c42785', 'ajay', 'jayvishnu89@gmail.com', 9744930251, 'a', 'C', 'Y', 1674235484);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
CREATE TABLE IF NOT EXISTS `verification` (
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(6) NOT NULL,
  `date_time` bigint(10) NOT NULL,
  `attempt` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`user_id`, `otp`, `date_time`, `attempt`) VALUES
('163cace5c42785', 849438, 1674363707, 2),
('163caceaa94c17', 700639, 1674367981, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `wishlist_id` (`wishlist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
