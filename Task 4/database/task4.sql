-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 04:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task4`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `credit`, `created_at`, `userid`) VALUES
(1, 'Advanced Mathematics', '10', '2021-04-24 13:33:02', 7),
(2, 'Financial Accounting', '4', '2021-04-24 18:41:54', 2),
(3, 'Philosphy', '3', '2021-04-24 18:51:26', 2),
(4, 'French', '6', '2021-04-24 22:34:50', 4),
(5, 'Financial Accounting', '7', '2021-04-24 23:13:26', 7),
(6, 'Maths', '10', '2021-04-24 23:29:18', 7),
(7, 'Philosophy', '4', '2021-04-24 23:31:07', 7),
(8, 'French', '4', '2021-04-24 23:33:04', 7),
(9, 'Maths', '10', '2021-04-25 12:34:26', 3),
(10, 'Maths', '5', '2021-04-26 10:28:47', 2),
(11, 'English', '5', '2021-04-26 10:31:06', 2),
(12, 'French', '5', '2021-04-26 10:32:54', 2),
(13, 'Political Science', '5', '2021-04-26 10:35:48', 7),
(34, 'Financial Accounting', '5', '2021-04-26 13:57:55', 10),
(36, 'Philosophy', '5', '2021-04-26 14:02:16', 10),
(37, 'Arts', '5', '2021-04-26 14:04:47', 10),
(38, 'English', '4', '2021-04-26 14:06:03', 10),
(39, 'French', '5', '2021-04-26 14:07:23', 10),
(40, 'Politics', '2', '2021-04-26 14:08:58', 2),
(41, 'Financial Accounting', '4', '2021-04-26 14:10:54', 6),
(42, 'English', '2', '2021-04-26 14:11:01', 6),
(43, 'Politics', '3', '2021-04-26 14:14:28', 6),
(44, 'Flying', '10', '2021-04-26 14:22:58', 7),
(45, 'Acting', '7', '2021-04-26 14:24:04', 7),
(47, 'Financial Accounting', '5', '2021-04-26 14:29:38', 11),
(48, 'Maths', '6', '2021-04-26 14:31:22', 11),
(49, 'French', '6', '2021-04-26 14:32:07', 11),
(51, 'Philosophy', '6', '2021-04-26 14:34:12', 11),
(52, 'Media', '7', '2021-04-26 14:35:54', 11),
(53, 'English', '4', '2021-04-26 14:36:11', 11),
(54, 'Financial Accounting', '5', '2021-04-26 14:39:24', 12),
(55, 'English', '2', '2021-04-26 14:39:35', 12),
(56, 'Politics', '3', '2021-04-26 14:41:40', 12),
(57, 'French', '5', '2021-04-26 14:42:15', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `created_at`) VALUES
(1, 'John', 'Hayes', 'hayes@gmail.com', '4444', '4444', '2021-04-24 00:02:14'),
(2, 'James', 'Bull', 'sean@gmail.com', '2222', '2222', '2021-04-24 00:02:26'),
(3, 'John', 'Bull', 'janus@gmail.com', '2222', '2222', '2021-04-24 00:03:59'),
(4, 'Jay', 'Shetty', 'shetty@gmail.com', '000', '000', '2021-04-24 00:08:53'),
(5, 'Jazz', 'Serum', 'serum@gmail.com', '123', '123', '2021-04-24 01:25:02'),
(6, 'Simon', 'Cowell', 'simon@gmial.com', '0000', '0000', '2021-04-24 12:32:40'),
(7, 'Jason', 'Mamoa', 'mamoa@gmail.com', '8888', '8888', '2021-04-24 13:00:12'),
(8, 'Fred', 'Amata', 'fred@gmail.com', '6666', '6666', '2021-04-24 13:13:57'),
(9, 'Frank', 'Weah', 'weah@gmail.com', '3333', '3333', '2021-04-26 09:02:24'),
(10, 'Temi', 'Ladey', 'jaguda@yahoo.com', '7777', '7777', '2021-04-26 12:10:38'),
(11, 'Some', 'Body', 'nobody@gmail.com', '1111', '1111', '2021-04-26 14:26:49'),
(12, 'Frank ', 'Ocean', 'ocean@gmail.com', '333', '333', '2021-04-26 14:39:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
