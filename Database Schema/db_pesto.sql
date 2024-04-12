-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 12:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eq_users`
--

CREATE TABLE `tbl_eq_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` enum('Admin','User') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `insert_date_time` datetime NOT NULL,
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eq_users`
--

INSERT INTO `tbl_eq_users` (`id`, `type`, `name`, `email_id`, `password`, `status`, `insert_date_time`, `update_date_time`, `ip_address`) VALUES
(1, 'Admin', 'Admin', 'admin@pesto.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-12 07:21:24', '2024-04-12 07:21:24', '1.1.1.1'),
(20, 'User', 'User 1', 'user1@pesto.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-12 22:23:44', '2024-04-13 01:54:12', ''),
(21, 'User', 'User2', 'user2@pesto.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-12 23:08:53', '2024-04-13 02:39:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('To Do','In Progress','Done') NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `ai_status` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(20) NOT NULL,
  `insert_date_time` datetime NOT NULL,
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`id`, `title`, `description`, `status`, `assigned_to`, `ai_status`, `ip_address`, `insert_date_time`, `update_date_time`) VALUES
(8, 'First', 'First Description', 'To Do', 20, -1, '::1', '2024-04-13 02:20:54', '2024-04-13 02:20:54'),
(9, 'a', 'a', 'To Do', 20, -1, '::1', '2024-04-13 02:49:32', '2024-04-13 02:49:32'),
(10, 'a', 'a', 'To Do', 20, 1, '::1', '2024-04-13 02:50:14', '2024-04-13 02:50:14'),
(11, 'second12', 'secon desc1', 'In Progress', 21, 1, '::1', '2024-04-13 02:50:49', '2024-04-13 02:50:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_eq_users`
--
ALTER TABLE `tbl_eq_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_eq_users`
--
ALTER TABLE `tbl_eq_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
