-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 01:03 AM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `password`) VALUES
(1, 'yashas', 'yashas@gmail.com', 'Male', '4321'),
(2, 'krunal', 'krunal@gmail.com', 'Male', '4628'),
(3, 'vishwas', 'viswaskala@345gmail.com', 'Male', '2323'),
(4, 'pearl', 'pearl@gmail.com', '', '4321'),
(5, 'lalu', 'lalu@gmail.com', 'Male', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `name`, `email`, `gender`, `phone`, `password`, `address`) VALUES
(9, 'kru', 'parmarkrunal462@gmail.com', 'Male', '', '5656', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `comment`) VALUES
(1, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'First comment'),
(2, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'Second trial\r\n'),
(3, 'vishwas', 'viswaskala@345gmail.com', 'Good Servies provide👍.'),
(4, 'krish', 'krish635@gmail.com', 'Jordar five star rating⭐⭐⭐⭐⭐🔥.'),
(5, 'abc', 'ABC@gmail.com', 'Good Services Principles: If you’re interested in understanding how to design excellent services, th'),
(6, 'xyz', 'xyz@gmail.com', 'Good Services Principles: If you’re interested in understanding how to design excellent services, the book “Good Services” outlines 15 universal principles for creating services that are easy to find, clear, consistent, and usable by everyone. You can explore these principles here4.\r\nRemember to choose services that align with your needs and preferences! 😊'),
(7, 'charmi', 'chrami007@gmail.com', 'amazing Service😍🤩👌'),
(8, '.', 'visvas@gmail.com', '.....'),
(9, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'Ek number🔥🔥'),
(10, 'shruti', 'shruti001@gmail.com', ' 👎👎'),
(11, 'Khusi', 'Khusipatel@gmail.com', 'Buggy Interface👎'),
(12, 'Krunal Parmar', '2205101100001@paruluniversity.ac.in', 'done done'),
(13, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'Email featured is updated😁😁👌.'),
(14, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'feedback bug solve👍.'),
(15, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'alert is successfull.'),
(16, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'successful '),
(17, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'how?');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_requests`
--

CREATE TABLE `laundry_requests` (
  `user_id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `top_wear` int(11) NOT NULL,
  `bottom_wear` int(11) NOT NULL,
  `woolen_clothes` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry_requests`
--

INSERT INTO `laundry_requests` (`user_id`, `naam`, `email`, `phone`, `pickup_date`, `pickup_time`, `top_wear`, `bottom_wear`, `woolen_clothes`, `price`, `status`, `adress`) VALUES
(1, 'vishwas', 'flamekai279@gmail.com', '6367654137', '2024-04-17', '21:13:00', 4, 3, 4, 220, 'Delivered', 'parul'),
(2, 'Hetmayer', 'parmarkrunal462@gmail.com', '6367604136', '2024-04-15', '07:52:00', 10, 10, 10, 600, 'Delivered', 'gujrat'),
(3, 'rajesh', 'foxhunt710@gmail.com', '6352489520', '2024-04-16', '18:44:00', 20, 20, 20, 1200, 'Delivered', 'assam'),
(4, 'vastal', 'know4be@protonmail.com', '4569256325', '2024-04-17', '19:46:00', 15, 15, 15, 900, 'Delivered', 'tamil'),
(5, 'raunak', 'krunalparmar246@gmail.com', '5628452871', '2024-04-18', '20:48:00', 14, 14, 14, 840, 'Delivered', 'odisha'),
(6, 'banti', 'ufoalian99@gmail.com', '9658412536', '2024-04-19', '21:50:00', 12, 12, 12, 720, 'Delivered', 'hariyana'),
(7, 'Rahul', 'foxhunt710@gmail.com', '9635841253', '2024-04-20', '23:48:00', 11, 11, 11, 660, 'Delivered', 'uttarpradesh'),
(8, 'soumiya', 'flamekai279@gmail.com', '2854103695', '2024-04-21', '12:50:00', 22, 22, 22, 1320, 'Delivered', 'Madhya Pradesh'),
(9, 'Nitin', 'ufoalian99@gmail.com', '3541526485', '2024-04-23', '13:01:00', 3, 3, 3, 180, 'Delivered', 'Jammu'),
(10, 'brirendra', 'ufoalian99@gmail.com', '7852943058', '2024-04-24', '14:07:00', 23, 23, 23, 1380, 'Delivered', 'Tripura'),
(11, 'Chiranjeev', 'foxhunt710@gmail.com', '2752694502', '2024-04-25', '21:54:00', 25, 25, 25, 1500, 'Delivered', 'Uttarakhand'),
(12, 'Madhu', 'foxhunt710@gmail.com', '7569425942', '2024-04-27', '15:58:00', 26, 26, 26, 1560, 'Delivered', 'kerala'),
(13, 'john', 'flamekai279@gmail.com', '6358548932', '2024-05-01', '22:01:00', 30, 30, 30, 1800, 'Delivered', 'Maharashtra'),
(14, 'paul', 'flamekai279@gmail.com', '6869675825', '2024-05-03', '13:06:00', 16, 16, 16, 960, 'Delivered', 'Himachal Pradesh'),
(15, 'bhavik', 'krunalparmar246@gmail.com', '9858476325', '2024-05-04', '12:08:00', 27, 27, 27, 1620, 'Delivered', 'Rajasthan'),
(16, 'ufoalian', 'ufoalian99@gmail.com', '6355310515', '2024-04-18', '10:05:00', 2, 3, 1, 110, 'Delivered', 'Madhuvan Duplex'),
(17, 'ufoalian', 'ufoalian99@gmail.com', '6355310515', '2024-04-18', '03:09:00', 59, 40, 40, 2590, 'Delivered', 'MADHU'),
(18, 'charmi', 'ufoalian99@gmail.com', '55641587', '2024-04-24', '04:13:00', 12, 32, 12, 1120, 'Delivered', 'Sayog Garden'),
(19, 'Krunal Parmar', 'krunalparmar246@gmail.com', '6355310515', '2024-04-18', '10:47:00', 2, 3, 5, 230, 'Delivered', 'Samta Police Choki'),
(20, 'Krunal Parmar', 'krunalparmar246@gmail.com', '6355310515', '2024-04-18', '14:27:00', 2, 3, 5, 230, 'Delivered', 'smata'),
(21, 'vishwas', 'krunalparmar246@gmail.com', '+916355310515', '2024-04-19', '12:47:00', 10, 20, 11, 830, 'Delivered', 'Sayog Garden'),
(22, 'KP', 'krunalparmar246@gmail.com', '+916355310515', '2024-04-19', '03:33:00', 10, 20, 11, 830, 'Delivered', 'Parul'),
(25, 'krunal parmar', 'krunalparmar246@gmail.com', '+916355310515', '2024-04-19', '10:30:00', 1, 2, 3, 140, 'Delivered', 'D/25 Madhuvan duplex near sapna na vaveter hall, laxmipura, Gotri Road\r\nNear Sapana Na Vaveter Hall'),
(28, 'Krunal Parmar', 'Krunalparmar246@gmail.com', '06355310515', '2024-05-07', '04:57:00', 1, 1, 1, 60, 'In process', 'D/25 Madhuvan Duplex');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `gender`, `phone`, `password`) VALUES
(5, 'pearl', 'pearl@gmail.com', 'female', '1324', '5656'),
(9, 'Krunal Parmar', 'Krunalparmar246@gmail.com', 'Male', '06355310515', '5656');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `password`, `phone`, `address`) VALUES
(12, 'Krunal Parmar', 'krunalparmar246@gmail.com', 'Male', '5656', '06355310515', 'D/25 Madhuvan Duplex'),
(13, 'viswas', 'flamekai279@gmail.com', 'Male', '7894', '', ''),
(14, 'Anonymous', 'foxhunt710@gmail.com', 'Male', '7984', '', ''),
(15, 'Alian', 'ufoalian99@gmail.com', 'Male', '0000', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_requests`
--
ALTER TABLE `laundry_requests`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laundry_requests`
--
ALTER TABLE `laundry_requests`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
