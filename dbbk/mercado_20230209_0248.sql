-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2023 at 09:17 PM
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
('163e3dd6ecee32', '163e3b7c046f86', 'Priyam', 'Thekkethara, Kottekkad(PO)', 'Kottekkad Temple', '163cc18c672bd0', '163cc171bae085', 678732);

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
('163e1503de8a8d', '163d6d13235b0f', '163cace5c42785', 1),
('163e17483bdb12', '163d6a067a16b5', '163cace5c42785', 1),
('163e40f3b945c0', '163d699f67ffe0', '163cace5c42785', 1);

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
  `s_no` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(2) NOT NULL,
  `mrp` float(7,2) NOT NULL,
  `tax` int(2) NOT NULL,
  `rate` float(7,2) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `discount` int(2) NOT NULL,
  `tax_amount` float(6,2) NOT NULL,
  `net_amount` float(8,2) NOT NULL,
  `date_time` bigint(10) NOT NULL,
  `cancel_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`s_no`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`s_no`, `order_id`, `product_id`, `product_name`, `quantity`, `mrp`, `tax`, `rate`, `amount`, `discount`, `tax_amount`, `net_amount`, `date_time`, `cancel_status`) VALUES
(18, '163e40af6891b9', '163d6d13235b0f', 'Trinetra Golden Rice (Long Grain Rice / Sella Chawal)- 10Kg Pack Yellow Basmati Rice (Long Grain)  (10 kg)', 2, 2999.00, 5, 1566.98, 3133.96, 45, 164.94, 3298.90, 1675889398, 'N'),
(17, '163e40af6891b9', '163d69b33267ac', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', 1, 190.00, 18, 143.34, 143.34, 8, 31.46, 174.80, 1675889398, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `order_total`
--

DROP TABLE IF EXISTS `order_total`;
CREATE TABLE IF NOT EXISTS `order_total` (
  `order_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` int(5) NOT NULL,
  `unit_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` float(8,2) NOT NULL,
  `payment_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `date_time` bigint(10) NOT NULL,
  `order_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `dispatched_date_time` bigint(10) DEFAULT NULL,
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_total`
--

INSERT INTO `order_total` (`order_id`, `customer_id`, `seller_id`, `unit_no`, `unit_name`, `total_amount`, `payment_status`, `transaction_no`, `cancel_status`, `date_time`, `order_status`, `dispatched_date_time`) VALUES
('163e40af6891b9', '163e3b7c046f86', '163caceaa94c17', 100, 'unitpalakkad', 3473.70, 'Y', '12345678912345', 'N', 1675889398, 'P', 0);

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
('163d69891c9d93', '163caceaa94c17', '163cbc2b589e44', 'Safari Flash Casual Backpack, 26 ltr Water Resistant Travel Bags| Weight Polyester Bagpack for Men and Women, Spacious Shoulder Bag for College,Office', 'HIGH QUALITY FABRIC: Our lightweight yet durable bags are made of 100% polyester and water resistant fabric. This casual backpack can be by boys and girls for school, college, coaching, tution, or everyday outings.\nFRONT POCKET: Our trendy unisex bag pack has a front storage pocket that keeps small items neatly organized and easy to access\nMESH POCKET: Our fancy and stylish backpacks have mesh pockets on both sides to accommodate your water bottle and umbrella', 100, 699.00, 10, 0),
('163d69958369e6', '163caceaa94c17', '163cbc26f8cd86', 'Pantene Advanced Hairfall Solution, Hairfall Control Shampoo, Pack of 1, 650ML, Pink', 'Nourishes hair from root to tip and reduces hair-fall to give you more open hair days\r\nGives Frizz Free and Smooth and Manageable Hair with regular usage\r\nReduces hair fall due to breakage and styling damage.\r\nContains Fermented Rice Water which includes a fascinating combination of eight amino acids and vitamins, and Pro-Vitamin', 100, 347.00, 5, 18),
('163d699f67ffe0', '163caceaa94c17', '163cbc26f8cd86', 'Dove Cream Beauty Bathing Bar 125 G (4+1 Free Combo) With Moisturising Cream For Softer, Glowing Skin & Body - Nourishes Dry Skin More Than Bar Soap', 'About this item\r\nWith 1/4 moisturising cream, and mild cleansers, Dove helps skin maintain its natural moisture better than ordinary bar soap. Dove does not dry your skin as ordinary soap\r\nFormulated with gentle cleansers, Dove Cream Beauty Bar cares for your skin while washing away germs', 100, 355.00, 9, 18),
('163d69b33267ac', '163caceaa94c17', '163cbc255dc515', 'Priya Ginger Pickle with Garlic, 500g - Homemade Adrak Achar - Traditional South Indian Taste - Glass Jar', 'About this item\r\nENJOY THE AUTHENTIC TASTE OF TELUGU CUISINE - Established in 1980, Priya Foods is renowned for authentic South Indian specials such as pickles, masalas, spices and much more.', 100, 190.00, 8, 18),
('163d6a067a16b5', '163caceaa94c17', '163cbc286b024c', 'eCraftIndia Handcrafted Wall/Door/Window Hanging Decorative Showpiece - 49 cm ', 'eCraftIndia presents decorative wall/door hanging Showpiece which is widely used in worldwide to hang across doors, walls and windows. It is a traditional item made up of fabric, wood, metal Showpiece and artificial pearls. Each bell is of different color and has been handcrafted and added to string with other props. This wall hanging gives a royal touch to your home and surprises your friends and guests with the artistic and embroidery work.', 100, 179.00, 10, 12),
('163d6a0d77dca1', '163caceaa94c17', '163cbc286b024c', 'Dinine Craft Handicrafted showpiece for home/office/car deshboard | car dashboard idols | showpiece', 'Set Of 4 Baby monk Craft Decorative Showpiece Homes And Offices\r\nThis product is for decorative purposes only. Any secondary/alternative use will be at the risk of the user.\r\n', 100, 199.00, 10, 12),
('163d6d13235b0f', '163caceaa94c17', '163cbc255dc515', 'Trinetra Golden Rice (Long Grain Rice / Sella Chawal)- 10Kg Pack Yellow Basmati Rice (Long Grain)  (10 kg)', 'rice ', 100, 2999.00, 45, 5),
('163dbd73571177', '163dbd64b10da3', '163cbc255dc515', 'Safe Products Kerala Spicy Mixture (1KG Pack) Made in Coconut Oil Homemade namkeen Indian Snacks', 'Authentic Kerala Spicy Mixture\r\n1 Kg (500gx2) Pack Pack, Shelf Life 45 Days\r\nIngredients: Rice Flour, Gram Flour, Peanut, Asafoetida (Kaayam), Garlic, Chilly Powder, Salt, Curry Leaves. Coconut Oil\r\nPerfect Snack to enjoy with tea. No Artificial flavours or Preservatives\r\nPacked in an Eco-Friendly Resealable craft paper pouch With Zip Lock, No Need to shift the snacks into other container\r\nRice Flour, Gram Flour, Peanut, Asafoetid (Kaayam), Garlic, Chilly Powder, Salt,Curry Leaves.\r\n\r\n', 100, 699.00, 31, 5),
('163dbda3e8ec2a', '163dbd64b10da3', '163cbc255dc515', 'Kerala Naturals Raw Turmeric Powder 100gm', 'Turmeric powder from fresh roots- no-boil method\r\nFor culinary, and health and beauty purposes\r\nCurcumin Rich and Strong aromatic fragrance\r\n100% Natural, No preservatives\r\nRaw Turmeric for Skin Care: Due to its anti-bacterial properties turmeric is very effective against acne and redness. It helps in destroying the acne-causing bacteria and also removes the excess oil from the skin. Helps to remove suntan, delays signs of ageing like dark spots, fine lines and wrinkles.', 100, 170.00, 0, 18),
('163dfdf1fb1425', '163dbd64b10da3', '163cbc26f8cd86', 'Kerala Ayurveda Ashtavargam Kwath 200 Ml', 'Quantity: 200 ml; Item Form: Kwath; Ashtavargam Kwath is a classical ayurvedic formulation that helps in Vata predominant conditions like joint pain, numbness, and neurological manifestations. Ashtavargam Kwath helps reduce pain, numbness, stiffness, and other symptoms like low backache and pain in the flanks.', 50, 110.00, 4, 12),
('163dfdf9d19a58', '163dbd64b10da3', '163cbc286b024c', 'KUDUMBASHREE Archana Non-Coated Iron Kai Uruli pan', 'Made with Iron\r\nnon coated\r\nhand made products\r\nCan make healthy food\r\nPerfect for all kitchen', 40, 379.00, 9, 12),
('163dfe07b53b40', '163dbd64b10da3', '163cbc29658df0', 'fashionkiosks Womens Kerala Pure Cotton Kasavu Saree with Blouse', 'kerala saree\r\ncotton saree', 50, 699.00, 0, 5),
('163dfe0b7eaa04', '163dbd64b10da3', '163cbc26f8cd86', 'looms & weaves - 4 Natural & Ayurvedic Handmade Soaps for all skin types - (With Special Aurvedic Concoction)', '100% Handmade Ayurvedic Soaps â€“ Set of 4 pcs, 100 gm each. â€“ No Chemicals / No Parabens /No Sulfates / No Mineral Oils / No Animal Fat / No Triclosans / No Petroleum Derivatives / No Synthetics / No Artificial Foaming agents / No Artificial Colors\r\nMade with 100% wood pressed coconut oil, coconut cake, herbal extracts and other natural ingredients. Prepared as per strict Kerala ayurveda skincare recipe. Ensured good manufacturing practices. Only latest batch. Made in small batches only', 60, 361.00, 10, 18);

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
('163e12f6ee204f', '163dbda3e8ec2a', '163e12f6ee204f.jpg', 'N');

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
('163d9405443506', 'lmbu', 'lmbu123@gmail.com', 1234567899, 'a', 'C', 'N', 1675182164),
('163dbd64b10da3', 'Asha', 'ottapalam@gmail.com', 8281842267, 'a', 'S', 'Y', 1675351627),
('163ddf5e4baa1b', 'Aay Gj', 'aswathynjalil@gmail.com', 7012433892, '123abc', 'C', 'Y', 1675490788),
('163e3b7c046f86', 'Rakesh', 'rakesh@gmail.com', 1234567896, 'a', 'C', 'Y', 1675868096);

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
('163d9405443506', 198805, 1675182201, 3),
('163dbd64b10da3', 345771, 1675351642, 0),
('163ddf5e4baa1b', 988083, 1675490817, 0),
('163e3b7c046f86', 285519, 1675868106, 0);

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
('163e14e56c0ea6', '163d6a067a16b5', '163cace5c42785');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
