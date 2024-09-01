-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 07:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(11) NOT NULL,
  `parking_id` text DEFAULT NULL,
  `parking_date` text DEFAULT NULL,
  `parking_start_time` text DEFAULT NULL,
  `parking_end_time` text DEFAULT NULL,
  `booking_id` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `payment_status` text DEFAULT '0',
  `order_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `parking_id`, `parking_date`, `parking_start_time`, `parking_end_time`, `booking_id`, `user_id`, `amount`, `payment_status`, `order_status`) VALUES
(2, '16', '2024-07-28', '10:10 AM', NULL, 'EP0', '1', '2', '1', 1),
(3, '16', '2024-07-29', '09:00 AM', NULL, 'EP2884', '1', '2', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `order_id` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `rating` text DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `order_id`, `name`, `rating`, `comments`) VALUES
(1, '1', '2', 'Jenish', '5', 'Good service.');

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
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parking_type` text NOT NULL,
  `parking_image` text DEFAULT NULL,
  `parking_start_time` text DEFAULT NULL,
  `parking_end_time` text DEFAULT NULL,
  `sunday` text DEFAULT NULL,
  `monday` text DEFAULT NULL,
  `tuesday` text DEFAULT NULL,
  `wednesday` text DEFAULT NULL,
  `thursday` text DEFAULT NULL,
  `friday` text DEFAULT NULL,
  `saturday` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `parking_location` text DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `parking_slot` text DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `vat` text DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdelete` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `name`, `parking_type`, `parking_image`, `parking_start_time`, `parking_end_time`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `price`, `parking_location`, `pincode`, `parking_slot`, `user_type`, `vat`, `createAt`, `isdelete`) VALUES
(16, 'Westfield London', '1', '8ab587b28223b589ed44256530c4aec3.jpg', '1', '1', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '2', 'Harbour Parade, Southampton SO15 1QF, United Kingdom', '441622', '5', 2, NULL, '2024-07-27 18:26:57', 1),
(17, 'The Trafford Centre', '1', 'e77dafcefdfd1dea1203c8cac729a50c.jpg', '5', '11', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '1.2', 'Regent Cres, Stretford M17 8AA England', 'M17 8AP', '5', 2, '', '2024-07-28 06:31:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking_type`
--

CREATE TABLE `parking_type` (
  `id` int(11) NOT NULL,
  `parking_type_name` text DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_type`
--

INSERT INTO `parking_type` (`id`, `parking_type_name`, `user_type`) VALUES
(1, 'Shopping Mall', NULL),
(2, 'Hospital', NULL),
(3, 'Community Hall', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_admin`
--

CREATE TABLE `site_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `person_name` varchar(20) DEFAULT NULL,
  `datebirth` varchar(30) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `vatnum` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_admin`
--

INSERT INTO `site_admin` (`id`, `name`, `email`, `phonenumber`, `password`, `person_name`, `datebirth`, `address`, `city`, `post_code`, `image`, `vatnum`, `status`, `created_at`, `last_updated`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '24CGQPM7906P1ZJ', '200 Provan Walk', 'Glasgow', ' G34 9DL', NULL, 'AWSED2324', 1, '2022-06-28 21:11:16', '2024-07-11 07:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_type` text NOT NULL,
  `otp_varify` text DEFAULT NULL,
  `phonenumber` text DEFAULT NULL,
  `datebirth` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `vatnum` text DEFAULT NULL,
  `otp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `password`, `user_type`, `otp_varify`, `phonenumber`, `datebirth`, `address`, `city`, `post_code`, `image`, `vatnum`, `otp`) VALUES
(1, 'Jenish', 'jenish@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1', NULL, '9652524152', NULL, 'Test', NULL, NULL, NULL, NULL, NULL),
(2, 'Brijesh', 'brijesh@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2', NULL, '9685748575', NULL, 'Test', 'Test', '1234', NULL, 'sw23wqdw', NULL),
(7, 'kanan', 'ghadiyajenish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '1', '', NULL, 'LE1 4AN, Leicester', 'Leicester', '235434', '71a0c0e97d106ae927182f260b5b87bf.jpg', 'erdf34325', '8458'),
(8, 'MOnshc test', 'monch@test.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '9685857485', '2024-08-12', 'Test', 'Tet', '1234', '', '', '597'),
(9, 'Muhammad Rehman', 'kashifrehman9053@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', 'admin', '2024-09-06', 'Vilage dalri haripur kp', 'Haripur ', '22620', 'c5ce0b39d18bba3a8ca5d7aead8eb92c.jpg', '', '2017'),
(10, 'Muhammad Rehman', 'kashifkhan9053@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '03350968767', '2024-08-31', 'Vilage dalri haripur kp', 'Haripur ', '22620', 'b3ea98616a5665ffcbfa83b49a4dd423.jpg', '', '1561');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_type`
--
ALTER TABLE `parking_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_admin`
--
ALTER TABLE `site_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parking_type`
--
ALTER TABLE `parking_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_admin`
--
ALTER TABLE `site_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
