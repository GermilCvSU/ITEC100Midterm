-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 05:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_code`
--

CREATE TABLE `auth_code` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(6) NOT NULL,
  `created` varchar(30) NOT NULL,
  `expiration` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_code`
--

INSERT INTO `auth_code` (`id`, `user_id`, `code`, `created`, `expiration`, `status`) VALUES
(1, 1, 277610, '2021-03-24 03:23:21', '2021-03-24 03:28:21', 'expired'),
(2, 1, 918661, '2021-03-24 03:24:44', '2021-03-24 03:29:44', 'expired'),
(3, 1, 405275, '2021-03-24 03:26:54', '2021-03-24 03:31:54', 'expired'),
(4, 1, 747155, '2021-04-26 10:25:41', '2021-04-26 10:30:41', 'expired'),
(5, 1, 816219, '2021-04-26 11:15:31', '2021-04-26 11:20:31', 'expired'),
(6, 1, 584681, '2021-04-26 11:35:11', '2021-04-26 11:40:11', 'expired'),
(7, 1, 168373, '2021-04-26 11:36:30', '2021-04-26 11:41:30', 'expired'),
(8, 1, 976188, '2021-04-26 11:43:06', '2021-04-26 11:48:06', 'expired'),
(9, 1, 240018, '2021-04-26 11:44:20', '2021-04-26 11:49:20', 'expired'),
(10, 1, 706681, '2021-04-26 11:48:15', '2021-04-26 11:53:15', 'expired'),
(11, 1, 965936, '2021-04-26 11:51:17', '2021-04-26 11:56:17', 'expired'),
(12, 2, 314195, '2021-04-26 11:57:35', '2021-04-26 12:02:35', 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `activity` varchar(80) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `activity`, `user_id`, `date_time`) VALUES
(1, 'login', 1, '2021-04-26 11:15:31'),
(2, 'Successful Authentication', 1, '2021-04-26 11:15:52'),
(3, 'login', 1, '2021-04-26 11:35:11'),
(4, 'Successful Authentication', 1, '2021-04-26 11:35:17'),
(5, 'login', 1, '2021-04-26 11:36:30'),
(6, 'Successful Authentication', 1, '2021-04-26 11:36:37'),
(7, 'login', 1, '2021-04-26 11:43:06'),
(8, 'Successful Authentication', 1, '2021-04-26 11:43:13'),
(9, 'login', 1, '2021-04-26 11:44:20'),
(10, 'Successful Authentication', 1, '2021-04-26 11:44:28'),
(11, 'login', 1, '2021-04-26 11:48:15'),
(12, 'Successful Authentication', 1, '2021-04-26 11:48:23'),
(13, 'Logout', 1, '2021-04-26 11:48:26'),
(14, 'Successful Authentication', 1, '2021-04-26 11:48:36'),
(15, 'Logout', 1, '2021-04-26 11:48:38'),
(16, 'login', 1, '2021-04-26 11:51:17'),
(17, 'Successful Authentication', 1, '2021-04-26 11:51:34'),
(18, 'Logout', 1, '2021-04-26 11:51:41'),
(19, 'login', 2, '2021-04-26 11:57:34'),
(20, 'Successful Authentication', 2, '2021-04-26 11:58:01'),
(21, 'Logout', 2, '2021-04-26 11:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'ADMIN', 'ADMIN123', 'admin@email.com'),
(2, 'john', 'John@245', 'john@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_code`
--
ALTER TABLE `auth_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_code`
--
ALTER TABLE `auth_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_code`
--
ALTER TABLE `auth_code`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
