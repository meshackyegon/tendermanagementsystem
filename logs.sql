-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2023 at 09:36 PM
-- Server version: 10.5.21-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmmagic_fao`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `action_made` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `email`, `action_made`, `timestamp`, `date_created`) VALUES
(8, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-29 12:56:51', '2023-05-29'),
(10, 1, 'admin@voucher.com', 'Admin Creation.', '2023-05-29 13:04:23', '2023-05-29'),
(11, 1, 'admin@voucher.com', 'voucher Creation.', '2023-05-29 13:35:08', '2023-05-29'),
(13, 4, 'meshackyegon09@gmail.com', 'Logged in the system.', '2023-05-29 13:38:33', '2023-05-29'),
(14, 4, 'meshackyegon09@gmail.com', 'Logged in the system.', '2023-05-29 13:41:38', '2023-05-29'),
(15, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-29 18:18:01', '2023-05-29'),
(16, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-29 20:29:46', '2023-05-29'),
(17, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-29 20:54:11', '2023-05-29'),
(18, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-30 04:30:27', '2023-05-30'),
(19, 7, '', 'Logged in the system.', '2023-05-30 05:09:43', '2023-05-30'),
(20, 4, '', 'Logged in the system.', '2023-05-30 05:10:52', '2023-05-30'),
(21, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-30 05:50:47', '2023-05-30'),
(22, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-30 06:06:23', '2023-05-30'),
(23, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-30 06:54:22', '2023-05-30'),
(24, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-30 11:27:18', '2023-05-30'),
(25, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-31 05:00:06', '2023-05-31'),
(26, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-31 07:52:00', '2023-05-31'),
(27, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-31 08:21:14', '2023-05-31'),
(28, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-31 09:44:12', '2023-05-31'),
(29, 1, 'admin@voucher.com', 'Logged in the system.', '2023-05-31 09:45:44', '2023-05-31'),
(30, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-02 19:49:35', '2023-06-02'),
(31, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-03 06:48:08', '2023-06-03'),
(32, 1, 'admin@voucher.com', 'voucher Creation.', '2023-06-03 07:53:23', '2023-06-03'),
(33, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 04:37:58', '2023-06-05'),
(34, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 06:40:03', '2023-06-05'),
(35, 7, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 06:41:52', '2023-06-05'),
(36, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 06:45:34', '2023-06-05'),
(37, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 10:24:59', '2023-06-05'),
(38, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 11:28:22', '2023-06-05'),
(39, 7, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 11:31:21', '2023-06-05'),
(40, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 11:33:13', '2023-06-05'),
(41, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 17:50:11', '2023-06-05'),
(42, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-05 18:39:45', '2023-06-05'),
(43, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:12:18', '2023-06-06'),
(44, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:13:29', '2023-06-06'),
(45, 7, '', 'Logged in the system.', '2023-06-06 05:13:48', '2023-06-06'),
(46, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:13:55', '2023-06-06'),
(47, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:13:56', '2023-06-06'),
(48, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:14:15', '2023-06-06'),
(49, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:19:33', '2023-06-06'),
(50, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:19:42', '2023-06-06'),
(51, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:20:19', '2023-06-06'),
(52, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:31:57', '2023-06-06'),
(53, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:32:04', '2023-06-06'),
(54, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:33:05', '2023-06-06'),
(55, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:35:33', '2023-06-06'),
(56, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:36:09', '2023-06-06'),
(57, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:39:14', '2023-06-06'),
(58, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 05:40:04', '2023-06-06'),
(59, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 07:11:13', '2023-06-06'),
(60, 1, 'admin@voucher.com', 'voucher Creation.', '2023-06-06 07:46:39', '2023-06-06'),
(61, 2, 'admin2@voucher.com', 'Logged in the system.', '2023-06-06 07:47:28', '2023-06-06'),
(62, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 10:03:09', '2023-06-06'),
(63, 2, 'admin2@voucher.com', 'Logged in the system.', '2023-06-06 10:32:53', '2023-06-06'),
(64, 4, '', 'Logged in the system.', '2023-06-06 12:10:37', '2023-06-06'),
(65, 4, '', 'Logged in the system.', '2023-06-06 12:52:06', '2023-06-06'),
(66, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 13:49:49', '2023-06-06'),
(67, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 13:55:45', '2023-06-06'),
(68, 2, 'admin2@voucher.com', 'Logged in the system.', '2023-06-06 13:56:14', '2023-06-06'),
(69, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 14:36:27', '2023-06-06'),
(70, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 14:59:13', '2023-06-06'),
(71, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 15:23:05', '2023-06-06'),
(72, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 16:26:18', '2023-06-06'),
(73, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 17:09:33', '2023-06-06'),
(74, 1, 'admin@voucher.com', 'Beneficiary Creation.', '2023-06-06 17:15:24', '2023-06-06'),
(75, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 18:32:07', '2023-06-06'),
(76, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-06 19:11:19', '2023-06-06'),
(77, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-07 07:06:59', '2023-06-07'),
(78, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-07 18:33:50', '2023-06-07'),
(79, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 07:07:00', '2023-06-08'),
(80, 1, 'admin@voucher.com', 'Admin Creation.', '2023-06-08 07:27:28', '2023-06-08'),
(81, 1, 'admin@voucher.com', 'Enumerator Creation.', '2023-06-08 07:28:12', '2023-06-08'),
(82, 1, '', ' Project Manager Creation.', '2023-06-08 07:30:06', '2023-06-08'),
(83, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 09:42:42', '2023-06-08'),
(84, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 10:28:13', '2023-06-08'),
(85, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 11:39:42', '2023-06-08'),
(86, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 15:09:35', '2023-06-08'),
(87, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-08 18:17:51', '2023-06-08'),
(88, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-09 06:17:59', '2023-06-09'),
(89, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-09 07:56:45', '2023-06-09'),
(90, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-09 09:38:07', '2023-06-09'),
(91, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-10 08:29:38', '2023-06-10'),
(92, 1, 'admin@voucher.com', 'Logged in the system.', '2023-06-10 10:08:17', '2023-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
