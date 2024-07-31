-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 08:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opms`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trackingNumber` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `status` int(4) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `trackingNumber`, `date`, `name`, `address`, `totalAmount`, `status`, `payment_date`) VALUES
(73, 20, 'BD00345678', '2024-07-30', 'Kasun Gamage-update', 'No 5, Kulupana, Horana', 1300.00, 1, '2024-07-31 19:40:44'),
(74, 20, '123456789', '0000-00-00', 'John Doe', '123 Main St', 1000.00, 0, '0000-00-00 00:00:00'),
(75, 20, '2003', '2024-07-02', 'sss', 'sss', 2000.00, 0, '0000-00-00 00:00:00'),
(76, 20, '1003', '2024-07-05', 'fffff', 'ffff', 6000.00, 0, '0000-00-00 00:00:00'),
(77, 20, 'f454545', '2024-07-04', 'dgffdgdfg', 'gfdgfd', 300.00, 1, '2024-07-31 19:40:38'),
(78, 20, '123456789', '0000-00-00', 'John Doe', '123 Main St', 1000.00, 0, '0000-00-00 00:00:00'),
(79, 20, '', '0000-00-00', '', '', 0.00, 0, '0000-00-00 00:00:00'),
(80, 20, '', '0000-00-00', '', '', 0.00, 0, '0000-00-00 00:00:00'),
(81, 20, '2423434', '2024-07-06', 'dwedwed', 'wedwed', 500.00, 0, '0000-00-00 00:00:00'),
(82, 20, '123456789', '0000-00-00', 'John Doe', '123 Main St', 1000.00, 0, '0000-00-00 00:00:00'),
(83, 20, '123456789', '0000-00-00', 'John Doe', '123 Main St', 1000.00, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(20, 'avora', 'avora@gmail.com', '$2y$10$wVwUS01DPltES5Yk2mXZ2O4DH3lAaOcwGCLkopk9opnDresU/g912');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
