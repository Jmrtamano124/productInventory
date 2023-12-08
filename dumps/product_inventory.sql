-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptName`) VALUES
(1, 'Nursing'),
(2, 'Medicine'),
(3, 'Dentistry'),
(4, 'Radiologic Technology'),
(5, 'Criminology'),
(6, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`product_id`, `product_code`, `product_description`, `product_size`, `department`) VALUES
(1, '35eb23335043be7970563214775f165d', 'PE Uniform', 'l', 'Nursing'),
(2, '2cd3114e8686a9ae6a775fb8432e4791', 'PE Uniform', 'm', 'Nursing'),
(3, '5f98b2433354179c82d4b62a96c2e610', 'PE Uniform', 's', 'Nursing'),
(4, '934982a75ae397880d31c254aad17a85', 'PE Uniform', 'xl', 'Nursing'),
(5, 'b41ead63fe7f87901ce147c2ff975c3e', 'PE Uniform', 'xxl', 'Nursing'),
(6, '3c6db90031d56f5a1de4050959477681', 'Scrub Suit', 'l', 'Dentistry'),
(7, 'acd76e34bfc9befea9efecbbf5bde87e', 'Scrub Suit', 'm', 'Nursing'),
(8, '1cae731d02ef30d20da09fc06edf50ff', 'Scrub Suit', 'l', 'Dentistry');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rsv_id` int(11) NOT NULL,
  `reserve_size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserve_quantity` int(11) NOT NULL,
  `student_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_mname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_namesuffix` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_course` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_yr` int(11) NOT NULL,
  `student_section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_released` int(11) DEFAULT 0,
  `released_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rsv_id`, `reserve_size`, `product_id`, `reserve_quantity`, `student_number`, `student_fname`, `student_mname`, `student_lname`, `student_namesuffix`, `college_course`, `student_yr`, `student_section`, `status`, `created_at`, `is_released`, `released_by`, `updated_at`) VALUES
(18, 'm', '2cd3114e8686a9ae6a775fb8432e4791', 23, '2345', '2345', '2345', '2345', '2345', 'Nursing', 3, '3', 'Released', '2023-12-07 16:18:26', 1, '', '2023-12-07 16:18:26'),
(19, 'l', '2cd3114e8686a9ae6a775fb8432e4791', 345, 'asdf', '234', '23452345', '234', '2345', 'Nursing', 3, '3', 'Released', '2023-12-07 16:19:29', 1, '', '2023-12-07 16:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `stockcount`
--

CREATE TABLE `stockcount` (
  `product_qr_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productId` int(11) NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockcount`
--

INSERT INTO `stockcount` (`product_qr_key`, `productId`, `location`, `quantity`) VALUES
('1cae731d02ef30d20da09fc06edf50ff', 8, '', 2147483647),
('2cd3114e8686a9ae6a775fb8432e4791', 0, '', -93),
('35eb23335043be7970563214775f165d', 0, '', 100),
('3c6db90031d56f5a1de4050959477681', 0, '', 1231243),
('5f98b2433354179c82d4b62a96c2e610', 0, '', 100),
('934982a75ae397880d31c254aad17a85', 0, '', 100),
('acd76e34bfc9befea9efecbbf5bde87e', 0, '', 111),
('b41ead63fe7f87901ce147c2ff975c3e', 0, '', 95);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_logs`
--

CREATE TABLE `tracking_logs` (
  `trackId` int(11) NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `transact_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking_logs`
--

INSERT INTO `tracking_logs` (`trackId`, `location`, `productId`, `quantity`, `transact_type`, `created_at`) VALUES
(8, '', '2cd3114e8686a9ae6a775fb8432e4791', 23, 'stockout', '2023-12-07 16:18:26'),
(9, '', '2cd3114e8686a9ae6a775fb8432e4791', 345, 'stockout', '2023-12-07 16:19:29'),
(10, '', '2cd3114e8686a9ae6a775fb8432e4791', 50, 'stockin', '2023-12-07 16:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `account_id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namesuffix` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`account_id`, `fname`, `mname`, `lname`, `namesuffix`, `username`, `password`, `accessType`) VALUES
(11, 'john', 'a', 'doe', '', 'jm', '$2y$10$sZavyPB/OgsAxjsi5bMRzexVdBYbX.pgLGy0KkWxUHfMJ9WEJqFjq', 'user'),
(12, 'admin', 'admina', 'admindoe', '', 'admin', '$2y$10$yaqsSr4nF1UGRObbeat35.JjsPVdGEuGBGGpYOYXxmxBG2XPZAE0u', 'administrator'),
(13, 'hefa', 'asdfasdf', 'assddd', '', 'asd', '$2y$10$ZZkzt/urFBvLMj.kytX.eOJDtJWdrKOKdVSFFgR4iwsNt8Cz1uxRm', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rsv_id`);

--
-- Indexes for table `stockcount`
--
ALTER TABLE `stockcount`
  ADD PRIMARY KEY (`product_qr_key`);

--
-- Indexes for table `tracking_logs`
--
ALTER TABLE `tracking_logs`
  ADD PRIMARY KEY (`trackId`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rsv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tracking_logs`
--
ALTER TABLE `tracking_logs`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
