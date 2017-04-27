-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 04:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justlikenew`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `is_active`) VALUES
(1, 'Nokia', 1),
(2, 'Samsung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_enquiry`
--

CREATE TABLE `customer_enquiry` (
  `enquiry_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `enquiry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replied_date` datetime NOT NULL,
  `status` enum('OPENED','REPLIED','CONTACTED') NOT NULL DEFAULT 'OPENED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `issue_description` varchar(1024) NOT NULL,
  `issue_rate` float NOT NULL DEFAULT '0',
  `is_top_issue` tinyint(1) NOT NULL DEFAULT '0',
  `is_sidebar_item` tinyint(1) NOT NULL DEFAULT '0',
  `is_common_issue` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `model_id` int(10) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_url` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_id`, `model_name`, `model_url`, `brand_id`, `is_active`) VALUES
(1, 'J2', '20161211_095721.jpg', 2, 1),
(2, 'J512', '20161211_0957211.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_issue_relation`
--

CREATE TABLE `model_issue_relation` (
  `issue_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `device_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `pickup_address` varchar(255) NOT NULL,
  `status` enum('BOOKED','CONFIRMED','PICKED','UNDERREPAIR','READYFORDISPATCH','DISPATCHED','DELIVERED','CANCELLED') NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivary_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `total_amount` float NOT NULL,
  `payment_type` enum('PAYPAL','CASHONDELIVERY') NOT NULL,
  `payment_date` datetime NOT NULL,
  `promo_code_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `promo_id` int(10) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `rate_of_interest` int(11) NOT NULL,
  `activated_from` date NOT NULL,
  `is_for_old_users` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(233) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `username`, `password`, `user_type`, `status`) VALUES
(2, 'admin first', 'admin last', 'admin', '9ab776b93b3c6bbb67f4545371814423', 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customer_enquiry`
--
ALTER TABLE `customer_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_enquiry`
--
ALTER TABLE `customer_enquiry`
  MODIFY `enquiry_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `model_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
