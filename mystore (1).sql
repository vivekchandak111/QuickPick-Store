-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 07:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'asd', 'asd', '$2y$10$ZNku42puDBxdeJh0nh4L8.ooJq6x8kzqysfGLuHkRk5ZPmRe67M.W'),
(2, 'qwe', 'qwe', '$2y$10$o7b8DgQD4aj6B6FKmuY6wu7aYDmvyybZRA16QdEQy1I/mpERHaqRa'),
(3, 'zxc', 'zxc', '$2y$10$3PG57EiBGH8euvAWObGfGOLFh6lHJ8irGM2cRum9ZW/EAEz1bOhoK');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'ITC'),
(3, 'India Gate'),
(4, 'Fortune'),
(6, 'Haldiram'),
(8, 'MDH');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Spices & Masalas'),
(2, 'Flours'),
(3, 'Oil'),
(4, 'Rice'),
(7, 'Snacks Items');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 164990922, 1, 1, 'pending'),
(2, 1, 1737259190, 1, 1, 'pending'),
(3, 1, 193220562, 1, 1, 'pending'),
(4, 1, 664913242, 1, 2, 'pending'),
(5, 1, 1888022559, 1, 4, 'pending'),
(6, 1, 832265701, 3, 2, 'pending'),
(7, 1, 1623028460, 3, 1, 'pending'),
(8, 1, 1260039999, 4, 1, 'pending'),
(9, 2, 1479175073, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'Turmeric Powder', 'Fragrant MDH turmeric powder, a versatile weapon for Indian dishes. 100g pack with fine haldi powder.', 'Mdh Powder - Haldi, 100 g Poly Pack', 1, 8, 'haldi1.jpg', 'haldi2.jpg', 'haldi3.jpg', '35', '2023-07-02 08:33:24', 'true'),
(4, 'Basamati Rice', 'India Gate Select Basmati Rice: Perfect for authentic Indian dishes. Buy online for an indulgent feast. 1KG', 'India Gate Select Basmati Rice 1 kg', 4, 3, 'basamati1.jpg', 'basamati2.jpg', 'basamati3.jpg', '120', '2023-07-06 05:21:35', 'true'),
(5, 'Aloo Bhujia', 'Aloo Bhujia: Crunchy potato snack with gram flour. Healthy alternative to chips. Enhances salads and Bhel. 1KG', 'Haldiram Nagpur Aloo Bhujia, 1kg', 7, 6, 'aloo1.jpg', 'aloo2.jpg', 'aloo3.jpg', '200', '2023-07-06 05:22:25', 'true'),
(6, 'Aashirvaad Atta', 'Aashirvaad Whole Wheat Atta: Carefully sourced, cleaned, and ground for optimum nutrition. Buy online. 1KG', 'Aashirvaad Atta,1kg pack, The High Fibre Atta', 2, 1, 'aashirvaadatta3.jpg', 'aashirvaadatta2.jpg', 'aashirvaadatta1.jpg', '60', '2023-07-06 05:36:25', 'true'),
(7, 'Sunflower Refined Oil', 'Fortune Sunflower Oil: Light, healthy, and nutritious cooking oil. Rich in vitamins, aids digestion. 1L', 'Fortune Sun Lite - Sunflower Refined Oil, 1 L Pouch', 3, 4, 'sun1.jpg', 'sun2.jpg', 'sun3.jpg', '120', '2023-07-12 12:33:51', 'true'),
(8, 'Garam Masala', 'MDH: Pioneer in packaged spices for Indian cuisine. Known for purity, quality, aroma, and taste. 100g', 'Mdh Masala - Garam, 100 g Carton', 1, 8, 'garam1.jpg', 'garam2.jpg', 'garam3.jpg', '100', '2023-07-12 12:41:46', 'true'),
(9, 'Sunfeast Dark Fantasy', 'Sunfeast Dark Fantasy - Choco Fills, Original Filled Cookies With Choco Creme, 75 g Pouch', 'Sunfeast Dark Fantasy - Choco Fills, Original Filled Cookies With Choco Creme', 7, 1, 'dark1.jpg', 'dark2.jpg', 'dark3.jpg', '45', '2023-07-12 12:48:52', 'true'),
(10, 'Soya Health Oil', 'Fortune Soya Health Oil: Tasty, strong bones. Heart and eye health benefits. 1 Litre', 'Fortune Soya Health Refined Soyabean Oil, 1 L Pouch', 3, 4, 'soya1.jpg', 'soya2.jpg', 'soya3.jpg', '130', '2023-07-12 12:58:39', 'true'),
(11, 'Tasty Nuts', 'Haldiram Nagpur Tasty Nuts: Popular snack for tea-time and cuisines. Buy online today! 200g', 'Haldiram Nagpur Tasty Nuts 200 g', 7, 6, 'tasnut3.jpg', 'tasnut2.jpg', 'tasnut1.jpg', '50', '2023-07-12 13:04:51', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 35, 193220562, 1, '2023-06-30 14:29:29', 'Complete'),
(2, 1, 70, 664913242, 1, '2023-06-30 14:24:12', 'Complete'),
(3, 1, 140, 1888022559, 1, '2023-06-30 14:30:04', 'Complete'),
(6, 1, 120, 1260039999, 1, '2023-07-06 06:24:46', 'pending'),
(7, 2, 235, 1479175073, 2, '2023-07-06 14:17:55', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 2, 664913242, 70, 'Net Banking', '2023-06-30 14:24:12'),
(2, 1, 193220562, 35, 'Debit/Credit Card', '2023-06-30 14:29:29'),
(3, 3, 1888022559, 140, 'UPI', '2023-06-30 14:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, '123', '123', '$2y$10$BQGNwq8gb0vOkPIn5rAbeu93CFxyPCETl.G6tfNloi8jjHntsOn7C', '::1', '123', '123'),
(2, 'vasanth', 'vasanth@gmail.com', '$2y$10$EG8O02MOAXkgNZYG3TvAA.TpSl9sOZmkfgIE6PBBanOQP4vq60m.u', '::1', 'nagar', '9123456780');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
