-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(8, '2800.00', 'not paid', 1, 2147483647, 'Antipolo City', 'Antipoolo', '2023-07-23 15:12:59'),
(9, '700.00', 'paid', 1, 2147483647, 'Antipolo City', 'Antipoolo', '2023-07-24 07:18:38'),
(10, '1400.00', 'paid', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-26 13:09:00'),
(11, '700.00', 'not paid', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 14:10:21'),
(12, '700.00', 'not paid', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 14:15:15'),
(13, '700.00', 'PAID', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 14:18:37'),
(14, '700.00', 'paid', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 14:33:38'),
(15, '2100.00', 'not paid', 1, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 15:24:18'),
(16, '700.00', 'not paid', 4, 2147483647, 'Antipolo City', 'Manila, Philippines', '2023-07-27 15:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL DEFAULT 'on_hold',
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 3, '4', 'Streak', 'brand-4.jpg', '700.00', 2, 1, '2023-07-15 19:32:58'),
(2, 3, '2', 'Ivy', 'brand-2.jpg', '700.00', 2, 1, '2023-07-15 19:32:58'),
(3, 3, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-15 19:32:58'),
(4, 4, '4', 'Streak', 'brand-4.jpg', '700.00', 2, 1, '2023-07-15 19:52:14'),
(5, 4, '2', 'Ivy', 'brand-2.jpg', '700.00', 2, 1, '2023-07-15 19:52:14'),
(6, 4, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-15 19:52:14'),
(7, 4, '3', 'Seneca', 'brand-3.jpg', '700.00', 1, 1, '2023-07-15 19:52:14'),
(8, 5, '4', 'Streak', 'brand-4.jpg', '700.00', 2, 1, '2023-07-15 20:35:08'),
(9, 5, '2', 'Ivy', 'brand-2.jpg', '700.00', 2, 1, '2023-07-15 20:35:08'),
(10, 5, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-15 20:35:08'),
(11, 5, '3', 'Seneca', 'brand-3.jpg', '700.00', 1, 1, '2023-07-15 20:35:08'),
(12, 6, '1', 'Sculle', 'brand-1.jpg', '700.00', 2, 1, '2023-07-22 03:47:35'),
(13, 6, '3', 'Seneca', 'brand-3.jpg', '700.00', 4, 1, '2023-07-22 03:47:35'),
(14, 7, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-22 13:57:49'),
(15, 8, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-23 15:12:59'),
(16, 8, '2', 'Ivy', 'brand-2.jpg', '700.00', 1, 1, '2023-07-23 15:12:59'),
(17, 8, '3', 'Seneca', 'brand-3.jpg', '700.00', 1, 1, '2023-07-23 15:12:59'),
(18, 8, '4', 'Streak', 'brand-4.jpg', '700.00', 1, 1, '2023-07-23 15:12:59'),
(19, 9, '4', 'Streak', 'brand-4.jpg', '700.00', 1, 1, '2023-07-24 07:18:38'),
(20, 10, '1', 'Sculle', 'brand-1.jpg', '700.00', 1, 1, '2023-07-26 13:09:00'),
(21, 10, '8', 'Cyanide', 'brand-8.jpg', '700.00', 1, 1, '2023-07-26 13:09:00'),
(22, 11, '4', 'Streak', 'brand-4.jpg', '700.00', 1, 1, '2023-07-27 14:10:21'),
(23, 12, '4', 'Streak', 'brand-4.jpg', '700.00', 1, 1, '2023-07-27 14:15:15'),
(24, 13, '3', 'Seneca', 'brand-3.jpg', '700.00', 1, 1, '2023-07-27 14:18:37'),
(25, 14, '4', 'Streak', 'brand-4.jpg', '700.00', 1, 1, '2023-07-27 14:33:38'),
(26, 15, '2', 'Ivy', 'brand-2.jpg', '700.00', 3, 1, '2023-07-27 15:24:18'),
(27, 16, '3', 'Seneca', 'brand-3.jpg', '700.00', 1, 4, '2023-07-27 15:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`) VALUES
(1, 13, 1, '1'),
(2, 13, 1, '0'),
(3, 13, 1, '30'),
(4, 14, 1, '81289101'),
(5, 10, 1, '9'),
(6, 9, 1, '9');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Sculle', 'Shirt', 'Awesome shirt with skull', 'brand-1.jpg', 'brand-1.jpg', 'brand-1.jpg', 'brand-1.jpg', '700.00', 0, ''),
(2, 'Ivy', 'Shirt', 'Rose-colored Shirt', 'brand-2.jpg', 'brand-2.jpg', 'brand-2.jpg', 'brand-2.jpg', '700.00', 0, ''),
(3, 'Seneca', 'Shirt', 'Seneca Shirt', 'brand-3.jpg', 'brand-3.jpg', 'brand-3.jpg', 'brand-3.jpg', '700.00', 0, ''),
(4, 'Streak', 'Shirt', 'streak', 'brand-4.jpg', 'brand-4.jpg', 'brand-4.jpg', 'brand-4.jpg', '700.00', 0, ''),
(5, 'Tear', 'Shirt', 'Tear', 'brand-5.jpg', 'brand-5.jpg', 'brand-5.jpg', 'brand-5.jpg', '700.00', 0, 'Black'),
(6, 'C.O.D', 'Shirt', 'Create or Die', 'brand-6.jpg', 'brand-6.jpg', 'brand-6.jpg', 'brand-6.jpg', '0.00', 0, 'Black'),
(7, 'Viper', 'Shirt', 'Viper', 'brand-7.jpg', 'brand-7.jpg', 'brand-7.jpg', 'brand-7.jpg', '700.00', 0, ''),
(8, 'Cyanide', 'Shirt', '', 'brand-8.jpg', 'brand-8.jpg', 'brand-8.jpg', 'brand-8.jpg', '700.00', 0, ''),
(9, 'Mercury', 'Shirt', '', 'brand-9.jpg', 'brand-9.jpg', 'brand-9.jpg', 'brand-9.jpg', '700.00', 0, ''),
(10, 'There is no Love', 'Shirt', '', 'brand-10.jpg', 'brand-10.jpg', 'brand-10.jpg', 'brand-10.jpg', '600.00', 0, ''),
(11, 'Marilyn Monroe', 'Shirt', '', 'brand-11.jpg', 'brand-11.jpg', 'brand-11.jpg', 'brand-11.jpg', '600.00', 0, ''),
(12, 'Symmetra', 'Shirt', '', 'brand-12.jpg', 'brand-12.jpg', 'brand-12.jpg', 'brand-12.jpg', '600.00', 0, ''),
(13, 'Bad Girl (Black)', 'Shirt', '', 'brand-13.jpg', 'brand-13.jpg', 'brand-13.jpg', 'brand-13.jpg', '600.00', 0, ''),
(14, 'Bad Girl (White)', 'Shirt', '', 'brand-14.jpg', 'brand-14.jpg', 'brand-14.jpg', 'brand-14.jpg', '600.00', 0, ''),
(15, 'Kay/O', 'Shirt', '', 'brand-15.jpg', 'brand-15.jpg', 'brand-15.jpg', 'brand-15.jpg', '600.00', 0, ''),
(16, 'Stallion', 'Shirt', '', 'brand-16.jpg', 'brand-16.jpg', 'brand-16.jpg', 'brand-16.jpg', '600.00', 0, ''),
(17, 'Rammatra', 'Shirt', '', 'brand-17.jpg', 'brand-17.jpg', 'brand-17.jpg', 'brand-17.jpg', '600.00', 0, ''),
(18, 'Muerta', 'Shirt', '', 'brand-18.jpg', 'brand-18.jpg', 'brand-18.jpg', 'brand-18.jpg', '600.00', 0, ''),
(19, 'Edgar', 'Shirt', '', 'brand-19.jpg', 'brand-19.jpg', 'brand-19.jpg', 'brand-19.jpg', '600.00', 0, ''),
(20, 'Stab', 'Shirt', '', 'brand-20.jpg', 'brand-20.jpg', 'brand-20.jpg', 'brand-20.jpg', '600.00', 0, ''),
(21, 'I.T', 'Shirt', '', 'brand-21.jpg', 'brand-21.jpg', 'brand-21.jpg', 'brand-21.jpg', '600.00', 0, ''),
(22, 'Salt Life', 'Shirt', '', 'brand-22.jpg', 'brand-22.jpg', 'brand-22.jpg', 'brand-22.jpg', '600.00', 0, ''),
(23, 'Smoke', 'Shirt', '', 'brand-23.jpg', 'brand-23.jpg', 'brand-23.jpg', 'brand-23.jpg', '600.00', 0, ''),
(24, 'Do the Zombie Walk', 'Shirt', '', 'brand-24.jpg', 'brand-24.jpg', 'brand-24.jpg', 'brand-24.jpg', '500.00', 0, ''),
(25, 'Eerie', 'Shirt', '', 'brand-25.jpg', 'brand-25.jpg', 'brand-25.jpg', 'brand-25.jpg', '500.00', 0, ''),
(26, 'Custom Motors Bulldog', 'Shirt', '', 'brand-26.jpg', 'brand-26.jpg', 'brand-26.jpg', 'brand-26.jpg', '600.00', 0, ''),
(27, 'Lucy', 'Shirt', '', 'brand-27.jpg', 'brand-27.jpg', 'brand-27.jpg', 'brand-27.jpg', '600.00', 0, ''),
(28, 'Catch the Wave', 'Shirt', '', 'brand-28.jpg', 'brand-28.jpg', 'brand-28.jpg', 'brand-28.jpg', '600.00', 0, ''),
(29, 'Born to Surf', 'Shirt', '', 'brand-29.jpg', 'brand-29.jpg', 'brand-29.jpg', 'brand-29.jpg', '600.00', 0, ''),
(30, 'Don\'t Mix \'Em', 'Hoodie', '', 'hoodie-1.jpg', 'hoodie-1.jpg', 'hoodie-1.jpg', 'hoodie-1.jpg', '800.00', 0, ''),
(31, 'Marilin Monroe (Hoodie)', 'Hoodie', '', 'hoodie-2.jpg', 'hoodie-1.jpg', 'hoodie-1.jpg', 'hoodie-1.jpg', '800.00', 0, ''),
(32, 'There is no Love (Hoodie)', 'Hoodie', '', 'hoodie-3.jpg', 'hoodie-3.jpg', 'hoodie-3.jpg', 'hoodie-3.jpg', '600.00', 0, ''),
(33, 'Bad Girl (Hoodie)', 'Hoodie', '', 'hoodie-4.jpg', 'hoodie-4.jpg', 'hoodie-4.jpg', 'hoodie-4.jpg', '800.00', 0, ''),
(34, 'Trash', 'Hoodie', '', 'hoodie-5.jpg', 'hoodie-5.jpg', 'hoodie-5.jpg', 'hoodie-5.jpg', '800.00', 0, ''),
(35, 'Edgar', 'Hoodie', '', 'hoodie-6.jpg', 'hoodie-6.jpg', 'hoodie-6.jpg', 'hoodie-6.jpg', '800.00', 0, ''),
(36, 'Stab', 'Hoodie', '', 'hoodie-7.jpg', 'hoodie-7.jpg', 'hoodie-7.jpg', 'hoodie-7.jpg', '800.00', 0, ''),
(37, 'Muerta', 'Hoodie', '', 'hoodie-8.jpg', 'hoodie-8.jpg', 'hoodie-8.jpg', 'hoodie-8.jpg', '800.00', 0, ''),
(38, 'Trust No One', 'Hoodie', '', 'hoodie-9.jpg', 'hoodie-9.jpg', 'hoodie-9.jpg', 'hoodie-9.jpg', '800.00', 0, ''),
(39, 'Custom Motors Bulldog', 'Hoodie', '', 'hoodie-10.jpg', 'hoodie-10.jpg', 'hoodie-10.jpg', 'hoodie-10.jpg', '800.00', 0, ''),
(40, 'Born to Ride', 'Hoodie', '', 'hoodie-11.jpg', 'hoodie-11.jpg', 'hoodie-11.jpg', 'hoodie-11.jpg', '800.00', 0, ''),
(41, 'Beauty Beauty Beauty', 'Hoodie', '', 'hoodie-12.jpg', 'hoodie-12.jpg', 'hoodie-12.jpg', 'hoodie-12.jpg', '800.00', 0, ''),
(42, 'Mush', 'Hoodie', '', 'hoodie-13.jpg', 'hoodie-13.jpg', 'hoodie-13.jpg', 'hoodie-13.jpg', '800.00', 0, ''),
(43, 'Heretic', 'Hoodie', '', 'hoodie-14.jpg', 'hoodie-14.jpg', 'hoodie-14.jpg', 'hoodie-14.jpg', '800.00', 0, ''),
(44, 'I.T', 'Hoodie', '', 'hoodie-15.jpg', 'hoodie-15.jpg', 'hoodie-15.jpg', 'hoodie-15.jpg', '800.00', 0, ''),
(45, 'Clown', 'Hoodie', '', 'hoodie-16.jpg', 'hoodie-16.jpg', 'hoodie-16.jpg', 'hoodie-16.jpg', '800.00', 0, ''),
(46, 'Summer Paradise California', 'Hoodie', '', 'hoodie-17.jpg', 'hoodie-17.jpg', 'hoodie-17.jpg', 'hoodie-17.jpg', '800.00', 0, ''),
(47, 'Don\'t Mix \'Em (Tote Bag)', 'Tote Bag', '', 'tote-1.jpg', 'tote-1.jpg', 'tote-1.jpg', 'tote-1.jpg', '250.00', 0, ''),
(48, 'Marilyn Monroe (Tote Bag)', 'Tote Bag', '', 'tote-2.jpg', 'tote-2.jpg', 'tote-2.jpg', 'tote-2.jpg', '250.00', 0, ''),
(49, 'There is No Love (Tote Bag)', 'Tote Bag', '', 'tote-3.jpg', 'tote-3.jpg', 'tote-3.jpg', 'tote-3.jpg', '250.00', 0, ''),
(50, 'Symmetra (Tote Bag)', 'Tote Bag', '', 'tote-4.jpg', 'tote-4.jpg', 'tote-4.jpg', 'tote-4.jpg', '250.00', 0, ''),
(51, 'Kay/O (Tote Bag)', 'Tote Bag', '', 'tote-5.jpg', 'tote-5.jpg', 'tote-5.jpg', 'tote-5.jpg', '250.00', 0, ''),
(52, 'Trash (Tote Bag)', 'Tote Bag', '', 'tote-6.jpg', 'tote-6.jpg', 'tote-6.jpg', 'tote-6.jpg', '250.00', 0, ''),
(53, 'Mirana ', 'Tote Bag', '', 'tote-7.jpg', 'tote-7.jpg', 'tote-7.jpg', 'tote-7.jpg', '250.00', 0, ''),
(54, 'Edgar (Tote Bag)', 'Tote Bag', '', 'tote-8.jpg', 'tote-8.jpg', 'tote-8.jpg', 'tote-8.jpg', '250.00', 0, ''),
(55, 'Muerta (Tote Bag)', 'Tote Bag', '', 'tote-9.jpg', 'tote-9.jpg', 'tote-9.jpg', 'tote-9.jpg', '250.00', 0, ''),
(56, 'Stallion (Tote Bag)', 'Tote Bag', '', 'tote-10.jpg', 'tote-10.jpg', 'tote-10.jpg', 'tote-10.jpg', '250.00', 0, ''),
(57, 'Break The Rules Tokyo Japan', 'Tote Bag', '', 'tote-11.jpg', 'tote-11.jpg', 'tote-11.jpg', 'tote-11.jpg', '300.00', 0, ''),
(58, 'Flower ', 'Tote Bag', '', 'tote-12.jpg', 'tote-12.jpg', 'tote-12.jpg', 'tote-12.jpg', '300.00', 0, ''),
(59, 'Romantic Playlist', 'Tote Bag', '', 'tote-13.jpg', 'tote-13.jpg', 'tote-13.jpg', 'tote-13.jpg', '300.00', 0, ''),
(60, 'Forever Young', 'Tote Bag', '', 'tote-14.jpg', 'tote-14.jpg', 'tote-14.jpg', 'tote-14.jpg', '300.00', 0, ''),
(61, 'Space', 'Tote Bag', '', 'tote-15.jpg', 'tote-15.jpg', 'tote-15.jpg', 'tote-15.jpg', '300.00', 0, ''),
(62, 'Your Universe', 'Tote Bag', '', 'tote-16.jpg', 'tote-16.jpg', 'tote-16.jpg', 'tote-16.jpg', '300.00', 0, ''),
(63, 'Sorry I Can\'t Hear You', 'Tote Bag', '', 'tote-17.jpg', 'tote-17.jpg', 'tote-17.jpg', 'tote-17.jpg', '300.00', 0, ''),
(64, 'Old School Walkman', 'Tote Bag', '', 'tote-18.jpg', 'tote-18.jpg', 'tote-18.jpg', 'tote-18.jpg', '300.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Luigi', 'ornopia_louie@yahoo.com', 'e7f06375beee1f9576294f9f4f76f69e'),
(4, 'wiji', 'ornopia.luigi15@gmail.com', '98f2f7dd40ff5814531b073d9dd10026');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
