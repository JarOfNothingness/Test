-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 06:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `philfida`
--

-- --------------------------------------------------------

--
-- Table structure for table `canvass_data`
--

CREATE TABLE `canvass_data` (
  `id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `stock`, `unit`, `description`, `quantity`, `unit_cost`, `total_cost`) VALUES
(25, 'w', 'e', 'w', 2, 100.00, 200.00),
(26, 'ew', 'w', 'q', 0, 0.00, 2.00),
(27, 'dsa', 'dsa', 'dsa', 2, 312.00, 624.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(11) NOT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `stock`, `unit`, `description`, `quantity`, `unit_cost`, `total_cost`) VALUES
(11, 'ewqewqeq', '2', '300', 0, 0.00, 0.00),
(12, 'sdaadas', '2', '3', 0, 0.00, 0.00),
(13, 'ss', '2', '3', 0, 0.00, 0.00),
(14, 'ss', '2', '3', 0, 0.00, 0.00),
(15, 'ewqeqqeqweqw', '2', '333', 0, 0.00, 0.00),
(16, 'ewqeqwewqw', '2', '321', 0, 0.00, 0.00),
(17, 'dsada', '2', '3121', 0, 0.00, 0.00),
(18, 'dsada', '2', '3121', 0, 0.00, 0.00),
(19, 'dsada', '2', '3121', 0, 0.00, 0.00),
(20, 'eqweqeqw', '2', '321', 0, 0.00, 0.00),
(21, 'eqweqeqw', '2ewqe', '321', 0, 0.00, 0.00),
(22, 'ewqeqeq', '2ewqe', 'ewqeq', 0, 0.00, 0.00),
(23, '2', '3', '', 0, 0.00, 0.00),
(24, '321', '642.00', '', 0, 0.00, 0.00),
(25, '2', '3212', '6424.00', 0, 0.00, 0.00),
(26, '2', '3212', '6424.00', 0, 0.00, 3212.00),
(27, '2', '3', '6.00', 0, 3.00, 6.00),
(28, '2', '3', '6.00', 2, 3.00, 6.00),
(29, '2', '3', '', 2, 3.00, 6.00),
(30, '2', '3', '', 2, 3.00, 6.00),
(31, '2', '3', '', 2, 3.00, 6.00),
(32, '2', '3', '', 2, 3.00, 6.00),
(33, '2', '3', '', 2, 3.00, 6.00),
(34, 'ewqeq', 'ewqeqwewq', '2', 0, 0.00, 0.00),
(35, 'ewqeq', 'ewqeqwewq', 'ewqeqweqw', 2, 31.00, 0.00),
(36, 'ewqeq', 'ewqeqwewq', 'ewqeqweqw', 2, 31.00, 0.00),
(37, 'q', 'q', 'w', 2, 2.00, 0.00),
(38, 'q', 'q', 'w', 2, 2.00, 0.00),
(39, 'q', 'q', 'w', 2, 2.00, 0.00),
(40, 'w', 'w', 'w', 2, 3.00, 6.00),
(41, 'w', 'w', 'w', 2, 3.00, 6.00),
(42, 'ewqewq', 'ewqeq', 'eqweqw', 0, 0.00, 0.00),
(43, 'ewqeqe', 'ewqe', 'qewq', 0, 0.00, 0.00),
(44, 'w', 'w', 'ew', 0, 0.00, 0.00),
(45, 'ewq', 'ewqe', 'ew', 0, 0.00, 0.00),
(46, '', '', '', 0, 0.00, 0.00),
(47, '', '', '', 0, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_items`
--

CREATE TABLE `purchase_request_items` (
  `id` int(11) NOT NULL,
  `purchase_request_id` int(11) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `total_cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Example123', 'Example@gmail.com', '$2y$10$yOSW86utkEhlW8y7SCslBuy9A4ynFacXtjoLOWgC5us9OsrYTrLJq'),
(2, 'sampleuser123', 'sampleuser@gmail.com', '$2y$10$p9R5fwIa.7jNRia9JP5d2ur4dJ5V7LUl1UbHjr5AdPzzL.X2/289q'),
(3, 'joshua', 'delposojoshua2002@gmail.com', '$2y$10$JAocEVHIbPCdHwJPZ43sb.PSVd10/OnoUPMffEAJ1sdZdA6E80SXO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canvass_data`
--
ALTER TABLE `canvass_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_request_items`
--
ALTER TABLE `purchase_request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canvass_data`
--
ALTER TABLE `canvass_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `purchase_request_items`
--
ALTER TABLE `purchase_request_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
