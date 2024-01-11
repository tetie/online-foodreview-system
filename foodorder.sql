-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2023 at 06:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `category`, `quantity`, `image`, `user_id`) VALUES
(1, 'ugali beans', 113, 'Quas iste occaecat v', 856, '1920hcfgchg.jpeg', 1),
(2, 'ugali nyama', 300, 'lunch', 400, '3682254757596720_status_33d719ba8cdb462e9963e797fa6e11d0.jpg', 1),
(3, 'Chai mandazi', 150, 'breakfast', 130, '6040254757596720_status_33d719ba8cdb462e9963e797fa6e11d0.jpg', 1),
(4, 'Veges salad', 250, 'fruits fresness', 33, '1717hcfgchg.jpeg', 1),
(5, 'rice beans', 329, 'lunch', 76, '6083gdrrdf.jpeg', 1),
(6, 'chakula supuu', 456, 'breakfast', 23, '4923254757596720_status_33d719ba8cdb462e9963e797fa6e11d0.jpg', 1),
(7, 'Ugali samaki', 456, 'lunch', 45, '5642hbhjb.jpeg', 1),
(8, 'chapo beans', 350, 'lunch', 22, '2357njm.jpeg', 1),
(9, 'mix', 200, 'lunch', 56, '6157hbhjb.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_foods`
--

CREATE TABLE `ordered_foods` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_id` int(13) NOT NULL,
  `amount` int(10) NOT NULL,
  `time` varchar(133) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_foods`
--

INSERT INTO `ordered_foods` (`id`, `user_id`, `transaction_id`, `amount`, `time`, `date`, `status`) VALUES
(1, 1, 1679771933, 113, '20:18:55', '25-03-23', 1),
(2, 4, 1679920894, 263, '14:41:36', '27-03-23', 0),
(3, 4, 1679921106, 706, '14:45:08', '27-03-23', 0),
(4, 5, 1679924201, 563, '19:40', '27-03-23', 1),
(5, 1, 1681046546, 456, '15:22:31', '09-04-23', 1),
(6, 1, 1681046826, 300, '15:27:12', '09-04-23', 0),
(7, 1, 1681145537, 656, '22:52', '10-04-23', 1),
(8, 1, 1681145740, 300, '18:55:45', '10-04-23', 0),
(9, 11, 1682177539, 792, '22:26', '22-04-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL DEFAULT 0,
  `status` int(2) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `name`, `price`, `user_id`, `transaction_id`, `status`, `date`) VALUES
(1, 1, 'Brittany Cohen', 113, 1, 1679771933, 1, ''),
(2, 1, 'Brittany Cohen', 113, 4, 1679920894, 1, ''),
(3, 3, 'Chai mandazi', 150, 4, 1679920894, 1, ''),
(4, 4, 'Veges salad', 250, 4, 1679921106, 1, ''),
(5, 7, 'Ugali samaki', 456, 4, 1679921106, 1, ''),
(6, 2, 'ugali nyama', 300, 5, 1679924201, 1, ''),
(7, 3, 'Chai mandazi', 150, 5, 1679924201, 1, ''),
(8, 1, 'ugali beans', 113, 5, 1679924201, 1, ''),
(9, 6, 'chakula supuu', 456, 1, 1681046546, 1, '2023-04-09'),
(10, 2, 'ugali nyama', 300, 1, 1681046826, 1, '2023-04-09'),
(11, 7, 'Ugali samaki', 456, 1, 1681145537, 1, '2023-04-10'),
(12, 9, 'mix', 200, 1, 1681145537, 1, '2023-04-10'),
(13, 2, 'ugali nyama', 300, 1, 1681145740, 1, '2023-04-10'),
(14, 1, 'ugali beans', 113, 11, 1682177539, 1, '2023-04-22'),
(15, 5, 'rice beans', 329, 11, 1682177539, 1, '2023-04-22'),
(16, 8, 'chapo beans', 350, 11, 1682177539, 1, '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `food_id`, `comment`, `food_name`, `user_id`, `time`, `date`) VALUES
(1, 1, 'hii food iko supuu\r\n', 'Brittany Cohen', 1, '06:38:30', '2023-03-26'),
(2, 7, 'acheme sana samakiandanyenyi\r\n', 'Ugali samaki', 4, '14:48:56', '2023-03-27'),
(3, 2, 'iko mbaya', 'ugali nyama', 5, '15:38:00', '2023-03-27'),
(4, 3, 'tamu', 'Chai mandazi', 5, '15:38:13', '2023-03-27'),
(5, 1, 'wagwan', 'ugali beans', 5, '15:38:24', '2023-03-27'),
(6, 6, 'tamu sana', 'chakula supuu', 1, '15:22:51', '2023-04-09'),
(7, 6, 'i enjoy todays food', 'chakula supuu', 1, '15:23:59', '2023-04-09'),
(8, 1, 'tamu sana', 'ugali beans', 1, '15:24:26', '2023-04-09'),
(9, 1, 'karararan nemie', 'ugali beans', 1, '15:24:51', '2023-04-09'),
(10, 1, 'likeit', 'ugali beans', 1, '15:25:40', '2023-04-09'),
(11, 1, 'nice', 'ugali beans', 1, '15:26:15', '2023-04-09'),
(12, 2, 'nice joooo', 'ugali nyama', 1, '15:27:35', '2023-04-09'),
(13, 5, 'fdddd', 'rice beans', 11, '17:32:58', '2023-04-22'),
(14, 1, 'weeefty', 'ugali beans', 11, '17:33:05', '2023-04-22'),
(15, 8, 'xvfbg', 'chapo beans', 11, '17:33:10', '2023-04-22'),
(16, 8, '', 'chapo beans', 11, '17:33:13', '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(10) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `otp`, `contact`, `phone`, `profile_image`, `role`) VALUES
(1, 'Abrahaam', 'abukbt13@gmail.com', '81', 0, '', '073737377', '1855373206254704800076_status_13310d86f2a84321b539fcd9aca14272.jpg', 1),
(2, 'Mesh', 'mesh@gmail.com', '81', 0, '', '', '', 0),
(3, 'vufiju', 'qubomudoge@mailinator.com', '0', 0, '', '', '', 0),
(4, 'tikuzynit', 'ranu@mailinator.com', '4', 0, '', '07234567767', '720398671WIN_20230324_04_14_58_Pro.jpg', 0),
(5, 'kevo@gmail.com', 'kevo@gmail.com', '0', 0, '', '0715907175', '5930652453251WIN_20220630_20_53_12_Pro.jpg', 0),
(7, 'dan@gmail.com', 'dan@gmail.com', '1740', 0, '', '', '', 0),
(8, 'tarus_mmu', 'abukbt13@gmail.comk', 'Abuu12345', NULL, NULL, '0742909149', '902135220gdrrdf.jpeg', 0),
(9, 'pivuce', 'tynyv@mailinator.com', 'Pa$$w0rd!', NULL, NULL, NULL, NULL, 0),
(10, 'Abraham', 'kibee@gmail.com', '2014@Student', NULL, NULL, NULL, NULL, 0),
(11, 'keith', 'keith@gmail.com', '5d363de9e0d7207d9838c7994ce6c8b9', NULL, NULL, '1234567890', '996729561254723089782_status_61d0b4b8ed1244c1bfd302a16aa80c0d.jpg', 0),
(12, 'haron', 'haronmutati@gmail.com', '9b07c2ece3d22dd0bff20f56ad2e9258', NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_foods`
--
ALTER TABLE `ordered_foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordered_foods`
--
ALTER TABLE `ordered_foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
