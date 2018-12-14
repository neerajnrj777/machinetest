-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 11:22 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `imagedetails`
--

CREATE TABLE `imagedetails` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `imagename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagedetails`
--

INSERT INTO `imagedetails` (`id`, `pid`, `imagename`) VALUES
(7, 23, 'Chrysanthemum.jpg'),
(9, 24, 'Hydrangeas.jpg'),
(11, 25, 'Hydrangeas.jpg'),
(13, 24, 'Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `pid` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_active` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`pid`, `sku`, `pname`, `price`, `status`, `quantity`, `is_active`) VALUES
(23, 'PRO123', 'Product1', '1200', 'In Stock', 5, 1),
(24, 'PRO 321', 'Product2', '1233', 'Out Of Stock', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Neeraj', 'neerajnairnrj777@gmail.com', '$2y$10$Fp3R1u2Swt9aVl.nIK15qeAP0nYHlf/poYI4mk7104.wY2XYVh6Ci', 'mtIAqCgNQZv2qImL0MGWQC6quG3gUNIcUZOaH0sqviEXrpUY4lNObCq3HdcZ', 1, '2018-09-04 23:08:25', '2018-09-04 23:08:25'),
(2, 'test1', 'test12@gmail.com', '$2y$10$G7q1uYJsJ9BIxN9ChSEbL.YvqEQClm6Kg.L.MZQ33l6NbCL/9Y07.', '0nc86dGQdpuUGdkrA4asvVMKpHWWi6sVU963YCo9c3xGMoLKWw5EzHdHXAOs', 0, '2018-09-05 20:58:01', '2018-09-05 20:58:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagedetails`
--
ALTER TABLE `imagedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagedetails`
--
ALTER TABLE `imagedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
