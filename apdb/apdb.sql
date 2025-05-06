-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 01:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `machineno` varchar(50) NOT NULL,
  `orderstatus` varchar(50) NOT NULL,
  `priorityno` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`order_id`, `product_id`, `quantity`, `machineno`, `orderstatus`, `priorityno`, `timestamp`) VALUES
(1, '1', '3', '1', 'set', '1', '2025-05-06 09:59:49'),
(2, '2', '1', '1', 'set', '1', '2025-05-06 09:59:52'),
(3, '3', '1', '2', 'place', '', '2025-05-06 03:14:54'),
(4, '1', '1', '1', 'Set', '1', '2025-05-06 09:59:55'),
(5, '1', '1', '1', 'Set', '2', '2025-05-06 09:59:58'),
(6, '2', '1', '1', 'Set', '2', '2025-05-06 10:00:00'),
(7, '2', '1', '1', 'Set', '3', '2025-05-06 10:00:02'),
(8, '2', '1', '1', 'Set', '3', '2025-05-06 10:00:04'),
(9, '2', '1', '1', 'Set', '3', '2025-05-06 10:00:06'),
(10, '2', '', '1', 'Set', '', '2025-05-06 03:47:08'),
(11, '2', '', '1', 'Set', '', '2025-05-06 03:52:45'),
(12, '2', '', '1', 'Set', '', '2025-05-06 03:52:47'),
(13, '2', '', '1', 'Set', '', '2025-05-06 03:52:48'),
(14, '2', '', '1', 'Set', '', '2025-05-06 03:52:48'),
(15, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(16, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(17, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(18, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(19, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(20, '2', '', '1', 'Set', '', '2025-05-06 03:52:49'),
(21, '2', '', '1', 'Set', '', '2025-05-06 03:52:50'),
(22, '2', '', '1', 'Set', '', '2025-05-06 03:52:50'),
(23, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(24, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(25, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(26, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(27, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(28, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(29, '2', '', '1', 'Set', '', '2025-05-06 03:52:51'),
(30, '2', '', '1', 'Set', '', '2025-05-06 03:52:52'),
(31, '2', '', '1', 'Set', '', '2025-05-06 03:52:52'),
(32, '2', '', '1', 'Set', '', '2025-05-06 03:52:52'),
(33, '2', '', '1', 'Set', '', '2025-05-06 03:52:52'),
(34, '2', '', '1', 'Set', '', '2025-05-06 03:52:52'),
(35, '2', '', '1', 'Set', '', '2025-05-06 03:52:53'),
(36, '2', '', '1', 'Set', '', '2025-05-06 03:52:53'),
(37, '2', '', '1', 'Set', '', '2025-05-06 03:52:53'),
(38, '2', '', '1', 'Set', '', '2025-05-06 03:52:53'),
(39, '2', '', '1', 'Set', '', '2025-05-06 03:52:53'),
(40, '2', '', '1', 'Set', '', '2025-05-06 03:52:54'),
(41, '2', '', '1', 'Set', '', '2025-05-06 03:52:54'),
(42, '2', '', '1', 'Set', '', '2025-05-06 03:52:54'),
(43, '2', '', '1', 'Set', '', '2025-05-06 03:52:54'),
(44, '3', '', '1', 'Set', '', '2025-05-06 03:52:59'),
(45, '3', '', '1', 'Set', '', '2025-05-06 03:53:00'),
(46, '3', '', '1', 'Set', '', '2025-05-06 03:53:00'),
(47, '3', '', '1', 'Set', '', '2025-05-06 03:53:01'),
(48, '1', '', '1', 'Set', '', '2025-05-06 03:59:45'),
(49, '2', '3', '1', 'Set', '1', '2025-05-06 10:21:31'),
(50, '2', '', '1', 'Set', '1', '2025-05-06 10:23:33'),
(51, '2', '', '1', 'Set', '1', '2025-05-06 10:23:34'),
(52, '2', '2', '1', 'Set', '1', '2025-05-06 10:24:31'),
(53, '1', '2', '1', 'Set', '1', '2025-05-06 10:26:08'),
(54, '1', '1', '1', 'Set', '1', '2025-05-06 11:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productprice` varchar(50) NOT NULL,
  `productimg` varchar(255) NOT NULL,
  `productstatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `productname`, `productprice`, `productimg`, `productstatus`) VALUES
(1, 'Sisig', '150.00', 'Pork-Sisig-2.jpg', '1'),
(2, 'Calamares', '359.00', 'calamares-a-la-romana.webp', '1'),
(3, 'Lechon Kawali', '599.00', 'cripsy-lechon-kawali-lettuce-cups-main-header.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `accountstatus` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `firstname`, `lastname`, `accountstatus`) VALUES
(1, 'Marvin', 'Batitay', '1'),
(2, 'Marvin', 'Batitay', '1'),
(3, 'Juan', 'Dela Cruz', '1'),
(4, 'Marvin', 'Batitay', '1'),
(5, 'Marvin', 'Batitay', '1'),
(6, 'Marvin', 'Batitay', '1'),
(7, 'Marvin', 'Batitay', '1'),
(8, 'Marvin', 'Batitay', '1'),
(9, 'Marvin', 'Batitay', '1'),
(10, 'marvin', 'Batitay', '1'),
(11, 'Juan', 'Dela Cruz', '1'),
(12, 'Marvin', 'Batitay', '1'),
(13, 'Marginb', 'Batuita', '1'),
(14, 'marvin', 'Batitay', '1'),
(15, '', '', '1'),
(16, 'Marvin', '', '1'),
(17, 'Marbin', 'Batitay', '1'),
(18, 'Marvin', 'Batitay', '1'),
(19, 'Batitay', 'Marvi', '1'),
(20, 'Marvin', 'Batitay', '1'),
(21, 'Marvin', 'Batitay', '1'),
(22, 'MARBVIN', 'BATITAY', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
