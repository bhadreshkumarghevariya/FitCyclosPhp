-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 16, 2023 at 06:26 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fit_cyclos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Coaster Bike'),
(2, 'Fixed Gear'),
(3, 'City Bikes'),
(4, 'City Step Through Bikes'),
(5, 'Urban Bikes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `framset` varchar(256) DEFAULT NULL,
  `drive_train` varchar(256) DEFAULT NULL,
  `brakes` varchar(256) DEFAULT NULL,
  `other_components` varchar(256) DEFAULT NULL,
  `wheels` varchar(256) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `price`, `size`, `color`, `name`, `framset`, `drive_train`, `brakes`, `other_components`, `wheels`, `category_id`, `product_image`) VALUES
(1, 699.99, 'Medium', 'Green', 'CITY STEP-THROUGH BIKE - 3 SPEED', NULL, NULL, NULL, NULL, NULL, 4, './IMAGES/1.webp'),
(2, 689.99, 'Small', 'Black', 'URBAN COMMUTER BIKE', NULL, NULL, NULL, NULL, NULL, 5, './IMAGES/2.webp'),
(3, 699.99, 'Small', 'Black', 'CITY CLASSIC BIKE - 3 SPEED', NULL, NULL, NULL, NULL, NULL, 3, './IMAGES/3.webp'),
(4, 429.99, 'Medium', 'White', 'COASTER BIKE', NULL, NULL, NULL, NULL, NULL, 1, './IMAGES/4.webp'),
(5, 639.99, 'Medium', 'Black', 'CITY CLASSIC BIKE - 8 SPEED', NULL, NULL, NULL, NULL, NULL, 3, './IMAGES/5.webp'),
(6, 639.99, 'Medium', 'Yellow', 'CITY STEP-THROUGH BIKE - 8 SPEED', NULL, NULL, NULL, NULL, NULL, 4, './IMAGES/6.webp'),
(7, 599.99, 'Extra Small', 'Blue', 'PURE FIX ORIGINAL SERIES', NULL, NULL, NULL, NULL, NULL, 2, './IMAGES/7.webp'),
(8, 639.99, 'Small', 'Green', 'CITY STEP-THROUGH BIKE - 8 SPEED - SMALL', NULL, NULL, NULL, NULL, NULL, 4, './IMAGES/8.webp'),
(9, 699.99, 'Small', 'Green', 'CITY STEP-THROUGH BIKE - 3 SPEED - SMALL', NULL, NULL, NULL, NULL, NULL, 4, './IMAGES/9.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart_items`
--

INSERT INTO `tbl_cart_items` (`user_id`, `product_id`, `quantity`) VALUES
(1, 4, 1),
(1, 7, 1),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sub_total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mobile_no` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `firstname`, `lastname`, `password`, `mobile_no`) VALUES
(1, 'bhadreshkumarghevariya@gmail.com', 'Bhadreshkumar', 'Ghevariya', 'test', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD KEY `cart_prod_foreign` (`product_id`),
  ADD KEY `cart_user_foreign` (`user_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_foreign` (`user_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD KEY `orderitem_order_foreign` (`order_id`),
  ADD KEY `orderitem_product_foreign` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prod_cate_foreign_key` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD CONSTRAINT `cart_prod_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD CONSTRAINT `orderitem_order_foreign` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`),
  ADD CONSTRAINT `orderitem_product_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
