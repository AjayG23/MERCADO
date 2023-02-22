-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 09:57 PM
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

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `building_name`, `street`, `landmark`, `district_id`, `state_id`, `zip`) VALUES
('163e3dd6ecee32', '163e3b7c046f86', 'Priyam', 'Thekkethara, Kottekkad(PO)', 'Kottekkad Temple', '163cc18c672bd0', '163cc171bae085', 678732),
('163e4c3507af83', '163e4c2bfd8a5d', 'abc house', 'mumbai', 'near town', '163cc18c672bd0', '163cc171bae085', 456789),
('163e8e8de389b6', '163cace5c42785', 'homee', 'palakkad jn', 'near town', '163cc1809ab4a1', '163cc171bae085', 456789),
('163e91b764954a', '163d9405443506', 'Abhijith', 'Pathanamthitta', 'Mall', '163cc184f0c5b4', '163cc171bae085', 789123);

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `quantity`) VALUES
('163ea9cfc75d24', '163dfe07b53b40', '163e3b7c046f86', 1),
('163ea9cf6e1cd9', '163d69b33267ac', '163e3b7c046f86', 1);

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
('163cbc2b589e44', 'Household Items', NULL),
('163ebce8d7cbf7', 'Snacks', '163cbc255dc515'),
('163ebceaf9eb6e', 'Packaged Foods', '163cbc255dc515'),
('163ebcf1034d30', 'Masala', '163cbc255dc515'),
('163ebcf19ada94', 'Spices', '163cbc255dc515'),
('163ebcf44ab882', 'Body And Skin Care', '163cbc26f8cd86'),
('163ebcf7e3936d', 'Hair Care', '163cbc26f8cd86'),
('163ebcfb2c3ea7', 'Oral Care', '163cbc26f8cd86'),
('163ebd09df3d82', 'Decorative Items', '163cbc286b024c'),
('163ebd0a69717b', 'Bag', '163cbc286b024c'),
('163ebd0b0c01da', 'Umbrella', '163cbc286b024c'),
('163ebd0da6da4f', 'Saree', '163cbc29658df0'),
('163ebd12e182ef', 'Floor Cleaners', '163cbc2b589e44'),
('163ebd13846296', 'Toilet Cleaners', '163cbc2b589e44'),
('163ebd13f7063f', 'Utensils', '163cbc2b589e44');

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
  `s_no` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` int(5) NOT NULL,
  `unit_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(2) NOT NULL,
  `mrp` float(7,2) NOT NULL,
  `tax` int(2) NOT NULL,
  `rate` float(7,2) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `discount` int(2) NOT NULL,
  `tax_amount` float(6,2) NOT NULL,
  `net_amount` float(8,2) NOT NULL,
  `date_time` bigint(10) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `cancel_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `order_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `dispatched_date_time` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`s_no`, `order_id`, `product_id`, `product_name`, `category_id`, `seller_id`, `unit_no`, `unit_name`, `quantity`, `mrp`, `tax`, `rate`, `amount`, `discount`, `tax_amount`, `net_amount`, `date_time`, `purchase_date`, `cancel_status`, `order_status`, `dispatched_date_time`) VALUES
(70, '163f5298468daf', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 9, 190.00, 18, 143.34, 1290.06, 8, 283.14, 1573.20, 1676961000, '2023-02-21', 'N', 'A', 1677014600),
(69, '163f5294558ff6', '163d699f67ffe0', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', '163ebcf44ab882', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 7, 355.00, 18, 264.90, 1854.30, 9, 407.05, 2261.35, 1676874600, '2023-02-20', 'N', 'A', 1676961000),
(68, '163f5294558ff6', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 8, 190.00, 18, 143.34, 1146.72, 8, 251.68, 1398.40, 1676874600, '2023-02-20', 'N', 'A', 1676961000),
(66, '163f528a9e6a63', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 7, 190.00, 18, 143.34, 1003.38, 8, 220.22, 1223.60, 1676010600, '2023-02-10', 'N', 'A', 1676097000),
(67, '163f528d257f42', '163d699f67ffe0', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', '163ebcf44ab882', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 9, 355.00, 18, 264.90, 2384.10, 9, 523.35, 2907.45, 1676010600, '2023-02-10', 'N', 'A', 1676097000),
(64, '163f52797d1be1', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 9, 190.00, 18, 143.34, 1290.06, 8, 283.14, 1573.20, 1674196200, '2023-01-20', 'N', 'A', 1674369000),
(63, '163f526beddb3d', '163dbd73571177', 'Safe Products Kerala Spicy Mixture (1KG Pack) Made in Coconut Oil Homemade namkeen Indian Snacks', '163ebce8d7cbf7', '163dbd64b10da3', 101, 'Kudumbasree Unit Ottapalam', 6, 699.00, 5, 458.19, 2749.14, 31, 144.72, 2893.86, 1672554600, '2023-01-01', 'N', 'P', NULL),
(62, '163f526beddb3d', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 7, 190.00, 18, 143.34, 1003.38, 8, 220.22, 1223.60, 1672554600, '2023-01-01', 'N', 'A', 1672641000),
(61, '163f52653b11f4', '163d699f67ffe0', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', '163ebcf44ab882', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 10, 355.00, 18, 264.90, 2649.00, 9, 581.50, 3230.50, 1670567400, '2022-12-09', 'N', 'A', 1670653800),
(60, '163f526045ebb4', '163d699f67ffe0', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', '163ebcf44ab882', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 1, 355.00, 18, 264.90, 264.90, 9, 58.15, 323.05, 1670567400, '2022-12-09', 'N', 'A', 1670653800),
(59, '163f526045ebb4', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 10, 190.00, 18, 143.34, 1433.40, 8, 314.60, 1748.00, 1670567400, '2022-12-09', 'N', 'A', 1670653800),
(58, '163f52548a1483', '163d699f67ffe0', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', '163ebcf44ab882', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 1, 355.00, 18, 264.90, 264.90, 9, 58.15, 323.05, 1668234600, '2022-11-12', 'N', 'A', 1668321000),
(57, '163f5250487ca0', '163d69958369e6', 'Pantene Advanced Hairfall Solution, Hairfall Control Shampoo, Pack of 1, 650ML, Pink', '163ebcf7e3936d', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 1, 347.00, 18, 270.31, 270.31, 5, 59.34, 329.65, 1668061800, '2022-11-10', 'N', 'A', 1668321000),
(56, '163f5250487ca0', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', '163ebceaf9eb6e', '163caceaa94c17', 100, 'Kudumbasree Unit Palakkad', 2, 190.00, 18, 143.34, 286.68, 8, 62.92, 349.60, 1668061800, '2022-11-10', 'N', 'A', 1668321000);

-- --------------------------------------------------------

--
-- Table structure for table `order_total`
--

DROP TABLE IF EXISTS `order_total`;
CREATE TABLE IF NOT EXISTS `order_total` (
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` int(6) NOT NULL,
  `total_amount` float(8,2) NOT NULL,
  `payment_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` bigint(10) NOT NULL,
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_total`
--

INSERT INTO `order_total` (`order_id`, `customer_id`, `order_no`, `total_amount`, `payment_status`, `transaction_no`, `date_time`) VALUES
('163f5298468daf', '163cace5c42785', 10009, 1573.20, 'Y', '12345678912345', 1676961000),
('163f5294558ff6', '163cace5c42785', 10008, 3659.75, 'Y', '12345678912345', 1676874600),
('163f528d257f42', '163cace5c42785', 10007, 2907.45, 'Y', '12345678912345', 1676010600),
('163f528a9e6a63', '163cace5c42785', 10006, 1223.60, 'Y', '12345678912345', 1676010600),
('163f52797d1be1', '163cace5c42785', 10005, 1573.20, 'Y', '12345678912345', 1674196200),
('163f526beddb3d', '163cace5c42785', 10004, 4117.46, 'Y', '12345678912345', 1672554600),
('163f52653b11f4', '163cace5c42785', 10003, 3230.50, 'Y', '12345678912345', 1670567400),
('163f526045ebb4', '163cace5c42785', 10002, 2071.05, 'Y', '12345678912345', 1670567400),
('163f52548a1483', '163cace5c42785', 10001, 323.05, 'Y', '12345678912345', 1668234600),
('163f5250487ca0', '163cace5c42785', 10000, 679.25, 'Y', '12345678912345', 1668061800);

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
  `tax_slab` int(2) NOT NULL,
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `category_id`, `name`, `description`, `quantity`, `mrp`, `discount`, `tax_slab`) VALUES
('163d69891c9d93', '163caceaa94c17', '163ebd0a69717b', 'Safari Flash Casual Backpack, 26 ltr Water Resistant Travel Bags| Weight Polyester Bagpack for Men and Women, Spacious Shoulder Bag for College,Office', 'HIGH QUALITY FABRIC: Our lightweight yet durable bags are made of 100% polyester and water resistant fabric. This casual backpack can be by boys and girls for school, college, coaching, tution, or everyday outings.\nFRONT POCKET: Our trendy unisex bag pack has a front storage pocket that keeps small items neatly organized and easy to access\nMESH POCKET: Our fancy and stylish backpacks have mesh pockets on both sides to accommodate your water bottle and umbrella', 100, 699.00, 10, 12),
('163d69958369e6', '163caceaa94c17', '163ebcf7e3936d', 'Pantene Advanced Hairfall Solution, Hairfall Control Shampoo, Pack of 1, 650ML, Pink', 'Nourishes hair from root to tip and reduces hair-fall to give you more open hair days\r\nGives Frizz Free and Smooth and Manageable Hair with regular usage\r\nReduces hair fall due to breakage and styling damage.\r\nContains Fermented Rice Water which includes a fascinating combination of eight amino acids and vitamins, and Pro-Vitamin', 108, 347.00, 5, 18),
('163d699f67ffe0', '163caceaa94c17', '163ebcf44ab882', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', 'About this item\r\nWith 1/4 moisturising cream, and mild cleansers, Dove helps skin maintain its natural moisture better than ordinary bar soap. Dove does not dry your skin as ordinary soap\r\nFormulated with gentle cleansers, Dove Cream Beauty Bar cares for your skin while washing away germs', 112, 355.00, 9, 18),
('163d69b33267ac', '163caceaa94c17', '163ebceaf9eb6e', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', 'About this item\r\nENJOY THE AUTHENTIC TASTE OF TELUGU CUISINE - Established in 1980, Priya Foods is renowned for authentic South Indian specials such as pickles, masalas, spices and much more.', 96, 190.00, 8, 18),
('163d6a067a16b5', '163caceaa94c17', '163ebd09df3d82', 'eCraftIndia Handcrafted Wall/Door/Window Hanging Decorative Showpiece - 49 cm ', 'eCraftIndia presents decorative wall/door hanging Showpiece which is widely used in worldwide to hang across doors, walls and windows. It is a traditional item made up of fabric, wood, metal Showpiece and artificial pearls. Each bell is of different color and has been handcrafted and added to string with other props. This wall hanging gives a royal touch to your home and surprises your friends and guests with the artistic and embroidery work.', 100, 179.00, 10, 12),
('163d6a0d77dca1', '163caceaa94c17', '163ebd09df3d82', 'Dinine Craft Handicrafted showpiece for home/office/car deshboard | car dashboard idols | showpiece', 'Set Of 4 Baby monk Craft Decorative Showpiece Homes And Offices\r\nThis product is for decorative purposes only. Any secondary/alternative use will be at the risk of the user.\r\n', 100, 199.00, 10, 12),
('163d6d13235b0f', '163caceaa94c17', '163ebceaf9eb6e', 'Trinetra Golden Rice (Long Grain Rice / Sella Chawal)- 10Kg Pack Yellow Basmati Rice (Long Grain)  (10 kg)', 'rice ', 100, 2999.00, 45, 5),
('163dbd73571177', '163dbd64b10da3', '163ebce8d7cbf7', 'Safe Products Kerala Spicy Mixture (1KG Pack) Made in Coconut Oil Homemade namkeen Indian Snacks', 'Authentic Kerala Spicy Mixture\r\n1 Kg (500gx2) Pack Pack, Shelf Life 45 Days\r\nIngredients: Rice Flour, Gram Flour, Peanut, Asafoetida (Kaayam), Garlic, Chilly Powder, Salt, Curry Leaves. Coconut Oil\r\nPerfect Snack to enjoy with tea. No Artificial flavours or Preservatives\r\nPacked in an Eco-Friendly Resealable craft paper pouch With Zip Lock, No Need to shift the snacks into other container\r\nRice Flour, Gram Flour, Peanut, Asafoetid (Kaayam), Garlic, Chilly Powder, Salt,Curry Leaves.\r\n\r\n', 94, 699.00, 31, 5),
('163dbda3e8ec2a', '163dbd64b10da3', '163ebcf19ada94', 'Kerala Naturals Raw Turmeric Powder 100gm', 'Turmeric powder from fresh roots- no-boil method\r\nFor culinary, and health and beauty purposes\r\nCurcumin Rich and Strong aromatic fragrance\r\n100% Natural, No preservatives\r\nRaw Turmeric for Skin Care: Due to its anti-bacterial properties turmeric is very effective against acne and redness. It helps in destroying the acne-causing bacteria and also removes the excess oil from the skin. Helps to remove suntan, delays signs of ageing like dark spots, fine lines and wrinkles.', 100, 170.00, 0, 18),
('163dfdf1fb1425', '163dbd64b10da3', '163ebcf44ab882', 'Kerala Ayurveda Ashtavargam Kwath 200 Ml', 'Quantity: 200 ml; Item Form: Kwath; Ashtavargam Kwath is a classical ayurvedic formulation that helps in Vata predominant conditions like joint pain, numbness, and neurological manifestations. Ashtavargam Kwath helps reduce pain, numbness, stiffness, and other symptoms like low backache and pain in the flanks.', 100, 110.00, 4, 12),
('163dfdf9d19a58', '163dbd64b10da3', '163cbc286b024c', 'KUDUMBASHREE Archana Non-Coated Iron Kai Uruli pan', 'Made with Iron\r\nnon coated\r\nhand made products\r\nCan make healthy food\r\nPerfect for all kitchen', 100, 379.00, 9, 12),
('163dfe07b53b40', '163dbd64b10da3', '163ebd0da6da4f', 'fashionkiosks Womens Kerala Pure Cotton Kasavu Saree with Blouse', 'kerala saree\r\ncotton saree', 100, 699.00, 0, 5),
('163dfe0b7eaa04', '163dbd64b10da3', '163ebcf44ab882', 'looms & weaves - 4 Natural & Ayurvedic Handmade Soaps for all skin types - (With Special Aurvedic Concoction)', '100% Handmade Ayurvedic Soaps â€“ Set of 4 pcs, 100 gm each. â€“ No Chemicals / No Parabens /No Sulfates / No Mineral Oils / No Animal Fat / No Triclosans / No Petroleum Derivatives / No Synthetics / No Artificial Foaming agents / No Artificial Colors\r\nMade with 100% wood pressed coconut oil, coconut cake, herbal extracts and other natural ingredients. Prepared as per strict Kerala ayurveda skincare recipe. Ensured good manufacturing practices. Only latest batch. Made in small batches only', 100, 361.00, 10, 18),
('163ebdce30379b', '163caceaa94c17', '163ebd0da6da4f', 'silk saree', 'silk saree', 100, 4000.00, 15, 5);

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

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`img_id`, `product_id`, `name`, `dp`) VALUES
('163dbd346b8486', '163d69891c9d93', '163dbd346b8486.jpg', 'N'),
('163dbd336ef2e0', '163d69891c9d93', '163dbd336ef2e0.jpg', 'N'),
('163dbd34d2549a', '163d69891c9d93', '163dbd34d2549a.jpg', 'N'),
('163dbd35cd3f6c', '163d69891c9d93', '163dbd35cd3f6c.jpg', 'Y'),
('163dbd352acc48', '163d69891c9d93', '163dbd352acc48.jpg', 'N'),
('163d6995836a08', '163d69958369e6', '163d6995836a08.jpg', 'Y'),
('163d699633f7c7', '163d69958369e6', '163d699633f7c7.jpg', 'N'),
('163d699690b513', '163d69958369e6', '163d699690b513.jpg', 'N'),
('163d6996f1a537', '163d69958369e6', '163d6996f1a537.jpg', 'N'),
('163d699741549b', '163d69958369e6', '163d699741549b.jpg', 'N'),
('163dbd3784d665', '163d699f67ffe0', '163dbd3784d665.jpg', 'Y'),
('163dbd3a760068', '163d699f67ffe0', '163dbd3a760068.jpg', 'N'),
('163dbd39a026d4', '163d699f67ffe0', '163dbd39a026d4.jpg', 'N'),
('163dbd3b375a48', '163d699f67ffe0', '163dbd3b375a48.jpg', 'N'),
('163dbd38a7c897', '163d699f67ffe0', '163dbd38a7c897.jpg', 'N'),
('163dbd3c588842', '163d69b33267ac', '163dbd3c588842.jpg', 'Y'),
('163dbd3f097f68', '163d69b33267ac', '163dbd3f097f68.jpg', 'N'),
('163dbd3e94e4d2', '163d69b33267ac', '163dbd3e94e4d2.jpg', 'N'),
('163dbd3e017eea', '163d69b33267ac', '163dbd3e017eea.jpg', 'N'),
('163dbd3d830b68', '163d69b33267ac', '163dbd3d830b68.jpg', 'N'),
('163d6a067a16e7', '163d6a067a16b5', '163d6a067a16e7.jpg', 'Y'),
('163d6a0713ba1c', '163d6a067a16b5', '163d6a0713ba1c.jpg', 'N'),
('163d6a077b55a1', '163d6a067a16b5', '163d6a077b55a1.jpg', 'N'),
('163d6a07dcb087', '163d6a067a16b5', '163d6a07dcb087.jpg', 'N'),
('163d6a0833dd5c', '163d6a067a16b5', '163d6a0833dd5c.jpg', 'N'),
('163d6a0d77dcb7', '163d6a0d77dca1', '163d6a0d77dcb7.jpg', 'Y'),
('163d6a0e42b1fe', '163d6a0d77dca1', '163d6a0e42b1fe.jpg', 'N'),
('163d6a0e925b29', '163d6a0d77dca1', '163d6a0e925b29.jpg', 'N'),
('163d6a0ee7a6bc', '163d6a0d77dca1', '163d6a0ee7a6bc.jpg', 'N'),
('163d6a0f3b6b32', '163d6a0d77dca1', '163d6a0f3b6b32.jpg', 'N'),
('163d6d13235b1e', '163d6d13235b0f', '163d6d13235b1e.jpg', 'Y'),
('163dbd7357118b', '163dbd73571177', '163dbd7357118b.jpg', 'Y'),
('163dbda3e8ec49', '163dbda3e8ec2a', '163dbda3e8ec49.jpg', 'Y'),
('163dfded053626', '163dfded041fc0', '163dfded053626.jpg', 'Y'),
('163dfdf44028fe', '163dfdf1fb1425', '163dfdf44028fe.jpg', 'Y'),
('163dfdf3a6f789', '163dfdf1fb1425', '163dfdf3a6f789.jpg', 'N'),
('163dfdf49e81d3', '163dfdf1fb1425', '163dfdf49e81d3.jpg', 'N'),
('163dfdf501d75a', '163dfdf1fb1425', '163dfdf501d75a.jpg', 'N'),
('163dfdf561d404', '163dfdf1fb1425', '163dfdf561d404.jpg', 'N'),
('163dfdf9d19a74', '163dfdf9d19a58', '163dfdf9d19a74.jpg', 'Y'),
('163dfdfac6d1a5', '163dfdf9d19a58', '163dfdfac6d1a5.jpg', 'N'),
('163dfdfb4b4cdf', '163dfdf9d19a58', '163dfdfb4b4cdf.jpg', 'N'),
('163dfdfbf6cd79', '163dfdf9d19a58', '163dfdfbf6cd79.jpg', 'N'),
('163dfdfca5fb1a', '163dfdf9d19a58', '163dfdfca5fb1a.jpg', 'N'),
('163dfe0040d850', '163dfe0040d831', '163dfe0040d850.jpg', 'Y'),
('163dfe03c05217', '163dfe03c051f9', '163dfe03c05217.jpg', 'Y'),
('163dfe07b53b5b', '163dfe07b53b40', '163dfe07b53b5b.jpg', 'Y'),
('163dfe0b7eaa21', '163dfe0b7eaa04', '163dfe0b7eaa21.jpg', 'Y'),
('163dfe0c3011c8', '163dfe0b7eaa04', '163dfe0c3011c8.jpg', 'N'),
('163dfe0cab8165', '163dfe0b7eaa04', '163dfe0cab8165.jpg', 'N'),
('163dfe0d11117b', '163dfe0b7eaa04', '163dfe0d11117b.jpg', 'N'),
('163dfe0dfa02e1', '163dfe0b7eaa04', '163dfe0dfa02e1.jpg', 'N'),
('163dfe0f20553b', '163dfe07b53b40', '163dfe0f20553b.jpg', 'N'),
('163dfe0f97089c', '163dfe07b53b40', '163dfe0f97089c.jpg', 'N'),
('163dfe1018574c', '163dfe07b53b40', '163dfe1018574c.jpg', 'N'),
('163dfe109a09ae', '163dfe07b53b40', '163dfe109a09ae.jpg', 'N'),
('163e12ee024063', '163dbd73571177', '163e12ee024063.jpg', 'N'),
('163e12ef4ac473', '163dbd73571177', '163e12ef4ac473.jpg', 'N'),
('163e12efb58f2c', '163dbd73571177', '163e12efb58f2c.jpg', 'N'),
('163e12f01d44ae', '163dbd73571177', '163e12f01d44ae.jpg', 'N'),
('163e12f5cd7a8d', '163dbda3e8ec2a', '163e12f5cd7a8d.jpg', 'N'),
('163e12f62cf14f', '163dbda3e8ec2a', '163e12f62cf14f.jpg', 'N'),
('163e12f6932fcf', '163dbda3e8ec2a', '163e12f6932fcf.jpg', 'N'),
('163e12f6ee204f', '163dbda3e8ec2a', '163e12f6ee204f.jpg', 'N'),
('163ebdce3064d4', '163ebdce30379b', '163ebdce3064d4.jpg', 'Y');

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
  `date_time` bigint(10) NOT NULL,
  UNIQUE KEY `recent_id` (`recent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_viewed`
--

INSERT INTO `recently_viewed` (`recent_id`, `product_id`, `user_id`, `date_time`) VALUES
('163ea98bf81433', '163d69b33267ac', '163cace5c42785', 1677011328),
('163ea98ddea4ec', '163d6d13235b0f', '163cace5c42785', 1676702711),
('163ea9c628f6bc', '163dfe07b53b40', '163cace5c42785', 1676728024),
('163ea9c67d434d', '163d6a0d77dca1', '163cace5c42785', 1676576521),
('163ea9cedf1897', '163d69b33267ac', '163e3b7c046f86', 1676928283),
('163ea9cfb23479', '163dfe07b53b40', '163e3b7c046f86', 1676319996),
('163ebcb8c08e86', '163d69b33267ac', '163caceaa94c17', 1676579343),
('163ebe5c9e40c9', '163d6a067a16b5', '163cace5c42785', 1677011260),
('163ebe5f72c61c', '163d699f67ffe0', '163cace5c42785', 1677011265),
('163ee69b56de2c', '163d6a067a16b5', '163caceaa94c17', 1676569013),
('163ee85a03d880', '163dbd73571177', '163cace5c42785', 1677010612),
('163ee86e254938', '163d69958369e6', '163cace5c42785', 1677010176),
('163ee87009ea6c', '163dfdf1fb1425', '163cace5c42785', 1676576512),
('163ee8712e843a', '163dfdf9d19a58', '163cace5c42785', 1676576530),
('163f0fbc37a934', '163dfdf1fb1425', '', 1676737475),
('163f0fbc8025f4', '163d699f67ffe0', '', 1676738454),
('163f0ffa7d4396', '163d6a067a16b5', '', 1676738471),
('163f28e62ef6c8', '163dbda3e8ec2a', '', 1676840546),
('163f29056a3944', '163ebdce30379b', '163cace5c42785', 1676841046),
('163f3e3583b40b', '163dbd73571177', '163e3b7c046f86', 1676927957),
('163f3e3f8855f9', '163d69b33267ac', '163e4c2bfd8a5d', 1676928034);

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

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `user_id`, `comment`, `rating`) VALUES
('163f3d87200b73', '163d69b33267ac', '163cace5c42785', 'Good Product', 3),
('163f3e422c84bd', '163d69b33267ac', '163e4c2bfd8a5d', 'Good Product', 4);

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
-- Table structure for table `stock_log`
--

DROP TABLE IF EXISTS `stock_log`;
CREATE TABLE IF NOT EXISTS `stock_log` (
  `stock_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(3) NOT NULL,
  `add_remove` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` bigint(10) NOT NULL,
  `stock_date` date NOT NULL,
  UNIQUE KEY `stock_id` (`stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`stock_id`, `product_id`, `seller_id`, `quantity`, `add_remove`, `date_time`, `stock_date`) VALUES
('163f520d4f154d', '163d69891c9d93', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f5210384718', '163d69958369e6', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f5210e523d4', '163d699f67ffe0', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f521132840c', '163d69b33267ac', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f52118cf28a', '163d6a067a16b5', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f521207341a', '163d6a0d77dca1', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f5212597bc0', '163d6d13235b0f', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f5212a62150', '163ebdce30379b', '163caceaa94c17', 100, 'A', 1667241000, '2022-11-01'),
('163f5215f44fa9', '163dbd73571177', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f52166218c8', '163dbda3e8ec2a', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f5216d288b4', '163dfdf1fb1425', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f52173bb4eb', '163dfdf9d19a58', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f521802c968', '163dfe07b53b40', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f52185cc134', '163dfe0b7eaa04', '163dbd64b10da3', 100, 'A', 1667241000, '2022-11-01'),
('163f5250496b7f', '163d69b33267ac', '163caceaa94c17', 2, 'R', 1668061800, '2022-11-10'),
('163f52504a6384', '163d69958369e6', '163caceaa94c17', 1, 'R', 1668061800, '2022-11-10'),
('163f52548b0743', '163d699f67ffe0', '163caceaa94c17', 1, 'R', 1668234600, '2022-11-12'),
('163f52593b9bea', '163d69958369e6', '163caceaa94c17', 10, 'A', 1668882600, '2022-11-20'),
('163f525a42503b', '163d699f67ffe0', '163caceaa94c17', 10, 'A', 1668882600, '2022-11-20'),
('163f525ac023fb', '163d69b33267ac', '163caceaa94c17', 10, 'A', 1668882600, '2022-11-20'),
('163f5260468f47', '163d69b33267ac', '163caceaa94c17', 10, 'R', 1670567400, '2022-12-09'),
('163f526046d602', '163d699f67ffe0', '163caceaa94c17', 1, 'R', 1670567400, '2022-12-09'),
('163f52653c0769', '163d699f67ffe0', '163caceaa94c17', 10, 'R', 1670567400, '2022-12-09'),
('163f5266c05031', '163d699f67ffe0', '163caceaa94c17', 10, 'A', 1671474600, '2022-12-20'),
('163f52676735e4', '163d69b33267ac', '163caceaa94c17', 10, 'A', 1671474600, '2022-12-20'),
('163f526beecb9b', '163d69b33267ac', '163caceaa94c17', 7, 'R', 1672554600, '2023-01-01'),
('163f526bf005ed', '163dbd73571177', '163dbd64b10da3', 6, 'R', 1672554600, '2023-01-01'),
('163f526f245192', '163d69b33267ac', '163caceaa94c17', 2, 'A', 1673289000, '2023-01-10'),
('163f52797d67d3', '163d69b33267ac', '163caceaa94c17', 9, 'R', 1674196200, '2023-01-20'),
('163f527a9ac443', '163d69b33267ac', '163caceaa94c17', 2, 'A', 1673289000, '2023-01-22'),
('163f528aa01a77', '163d69b33267ac', '163caceaa94c17', 7, 'R', 1676010600, '2023-02-10'),
('163f528d26391e', '163d699f67ffe0', '163caceaa94c17', 9, 'R', 1676010600, '2023-02-10'),
('163f528f7c7bbd', '163d69b33267ac', '163caceaa94c17', 4, 'A', 1676053800, '2023-02-11'),
('163f529052caa4', '163d699f67ffe0', '163caceaa94c17', 10, 'A', 1676053800, '2023-02-11'),
('163f5294564fae', '163d69b33267ac', '163caceaa94c17', 8, 'R', 1676874600, '2023-02-20'),
('163f529456b9de', '163d699f67ffe0', '163caceaa94c17', 7, 'R', 1676874600, '2023-02-20'),
('163f5295eaa820', '163d69b33267ac', '163caceaa94c17', 10, 'A', 1676917800, '2023-02-21'),
('163f5296445cd9', '163d699f67ffe0', '163caceaa94c17', 10, 'A', 1676917800, '2023-02-21'),
('163f529847826b', '163d69b33267ac', '163caceaa94c17', 9, 'R', 1676961000, '2023-02-21'),
('163f5299658a4e', '163d69b33267ac', '163caceaa94c17', 20, 'A', 1677004200, '2023-02-22');

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
('163caceaa94c17', 'Kudumbasree Unit Palakkad', 100),
('163dbd64b10da3', 'Kudumbasree Unit Ottapalam', 101);

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
('163caceaa94c17', 'Aswathy', 'aswathydelloitte@gmail.com', 9744930250, 'a', 'S', 'Y', 1674235562),
('163cace5c42785', 'ajay', 'jayvishnu89@gmail.com', 9744930251, 'a', 'C', 'Y', 1674235484),
('163e4c2bfd8a5d', 'Abhiskek', 'abhishek.@gmail.com', 7894561237, 'a', 'C', 'Y', 1675936447),
('163d9405443506', 'lmbu', 'lmbu123@gmail.com', 1234567899, 'a', 'C', 'Y', 1675182164),
('163dbd64b10da3', 'Asha', 'ottapalam@gmail.com', 8281842267, 'a', 'S', 'Y', 1675351627),
('163ddf5e4baa1b', 'Aay Gj', 'aswathynjalil@gmail.com', 7012433892, '123abc', 'C', 'Y', 1675490788),
('163e3b7c046f86', 'Rakesh', 'rakesh@gmail.com', 1234567896, 'a', 'C', 'Y', 1675868096),
('163f5078094050', 'Sachin', 'sachin10@gmail.com', 7896541245, 's', 'A', 'Y', 1676961000);

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
('163caceaa94c17', 700639, 1674367981, 0),
('163d9405443506', 821617, 1676221222, 3),
('163dbd64b10da3', 345771, 1675351642, 0),
('163ddf5e4baa1b', 988083, 1675490817, 0),
('163e3b7c046f86', 285519, 1675868106, 0),
('163e4c2bfd8a5d', 690609, 1675936456, 0);

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

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `product_id`, `user_id`) VALUES
('163f3e6ce80f60', '163dbd73571177', '163cace5c42785');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
