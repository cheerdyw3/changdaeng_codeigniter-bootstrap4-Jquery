-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 10:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `changdaeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `createDate`, `updateDate`) VALUES
(1, 'admin@gmail.com', '12345678', '2020-01-07 02:03:11', '2020-01-06 19:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE `adviser` (
  `adviser_id` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `commission` decimal(6,2) NOT NULL,
  `img` varchar(50) NOT NULL,
  `IDCard` varchar(50) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`adviser_id`, `firstName`, `lastName`, `email`, `password`, `tel`, `sex`, `address`, `commission`, `img`, `IDCard`, `updateDate`, `createDate`, `status`) VALUES
(34, 'บงการ', 'พยัฆวิเชียร', 'adviser@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0909877312', 1, '1115 ถนนพระราม 3 แขวงช่องนนทรี เขตยานนาวา กรุงเทพ 10120', '300.00', '20200107150717045117b0e0a11a242b9765e79cbf113f.jpg', '202001071507171c9ac0159c94d8d0cbedc973445af2da.jpg', '2020-01-07 08:07:17', '2020-01-07 15:07:17', 0),
(35, 'อรุณ', 'ปัญญาสา', 'adviser2@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0884018847', 0, '158 หมู่ 2 ต.แม่หล่าย อ.เมือง จ.แพร่ 54000', '500.00', 'default.jpg', '202001071509260f28b5d49b3020afeecd95b4009adf4c.jpg', '2020-01-07 08:09:26', '2020-01-07 15:09:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(5) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `member_id` int(5) NOT NULL,
  `adviser_id` int(5) NOT NULL,
  `bkDate` date NOT NULL,
  `bkTime` time NOT NULL,
  `bkPrice` decimal(6,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `amount` int(5) NOT NULL,
  `reject` varchar(50) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `course_id`, `time`, `member_id`, `adviser_id`, `bkDate`, `bkTime`, `bkPrice`, `status`, `amount`, `reject`, `createDate`, `updateDate`) VALUES
(71, '9', '1', 18, 0, '2020-01-08', '17:00:00', '350.00', 2, 1, '', '2020-01-07 16:16:37', '2020-01-07 09:18:59'),
(72, '10,9', '1,1', 18, 0, '0000-00-00', '08:00:00', '650.00', 2, 1, '', '2020-01-07 16:20:44', '2020-01-07 09:22:06'),
(73, '11,10', '1,1', 34, 0, '2020-01-14', '12:00:00', '2100.00', 0, 1, '', '2020-01-07 16:35:21', '2020-01-07 09:35:21'),
(74, '10', '1', 0, 34, '2020-01-16', '18:00:00', '300.00', 0, 1, '', '2020-01-07 16:41:12', '2020-01-07 09:41:12'),
(75, '9,10', '1,1', 0, 34, '2020-01-15', '20:30:00', '650.00', 1, 1, '', '2020-01-07 16:42:52', '2020-01-07 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `detail_list`
--

CREATE TABLE `detail_list` (
  `detail_list_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `schedule_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `adviser_id` int(5) NOT NULL,
  `totalPrice` decimal(6,2) NOT NULL,
  `totalHours` int(5) NOT NULL,
  `discount` decimal(6,2) NOT NULL,
  `vat` decimal(6,2) NOT NULL,
  `payment` decimal(6,2) NOT NULL,
  `startDate` datetime NOT NULL,
  `hours` varchar(50) NOT NULL,
  `prices` decimal(6,2) NOT NULL,
  `com_of_adviser` decimal(6,2) NOT NULL,
  `statusPayToAdviser` tinyint(1) NOT NULL,
  `amount` int(5) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_list`
--

INSERT INTO `detail_list` (`detail_list_id`, `room_id`, `schedule_id`, `course_id`, `adviser_id`, `totalPrice`, `totalHours`, `discount`, `vat`, `payment`, `startDate`, `hours`, `prices`, `com_of_adviser`, `statusPayToAdviser`, `amount`, `updateDate`) VALUES
(160, 6, '85', '9,10', 34, '1700.00', 3, '100.00', '119.00', '1819.00', '2020-01-07 16:27:23', '2,1', '600.00', '800.00', 0, 1, '2020-01-07 09:27:23'),
(161, 7, '81,82', '12', 35, '1000.00', 1, '0.00', '0.00', '1000.00', '2020-01-07 16:29:04', '1', '500.00', '0.00', 0, 2, '2020-01-07 09:29:04'),
(162, 7, '83', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:14:50', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:14:50'),
(163, 7, '84', '9', 0, '350.00', 1, '0.00', '0.00', '350.00', '2020-01-07 23:16:54', '1', '350.00', '350.00', 0, 1, '2020-01-07 16:16:54'),
(164, 7, '81', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:19:12', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:19:12'),
(165, 7, '85', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:20:34', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:20:34'),
(166, 8, '83,84', '11', 0, '800.00', 1, '0.00', '0.00', '800.00', '2020-01-07 23:21:52', '1', '400.00', '800.00', 0, 2, '2020-01-07 16:21:52'),
(167, 6, '82,85', '11', 0, '800.00', 1, '0.00', '0.00', '800.00', '2020-01-07 23:23:53', '1', '400.00', '800.00', 0, 2, '2020-01-07 16:23:53'),
(168, 6, '81', '9', 0, '350.00', 1, '0.00', '0.00', '350.00', '2020-01-07 23:25:04', '1', '350.00', '350.00', 0, 1, '2020-01-07 16:25:04'),
(169, 7, '83,84', '10,11', 0, '1400.00', 2, '0.00', '0.00', '1400.00', '2020-01-07 23:25:54', '1,1', '300.00', '1400.00', 0, 2, '2020-01-07 16:25:54'),
(170, 6, '82', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:33:43', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:33:43'),
(171, 7, '85', '10,11', 34, '2000.00', 2, '0.00', '0.00', '2000.00', '2020-01-07 23:35:20', '1,1', '1000.00', '1200.00', 0, 1, '2020-01-07 16:35:20'),
(172, 7, '83,84', '12', 0, '1000.00', 1, '0.00', '0.00', '1000.00', '2020-01-07 23:35:56', '1', '500.00', '1000.00', 0, 2, '2020-01-07 16:35:56'),
(173, 6, '85,81,82', '10,11', 34, '5900.00', 2, '100.00', '413.00', '6313.00', '2020-01-07 23:40:02', '1,1', '1000.00', '4100.00', 0, 3, '2020-01-07 16:40:02'),
(174, 8, '85', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:40:53', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:40:53'),
(175, 7, '83', '11', 0, '400.00', 1, '0.00', '0.00', '400.00', '2020-01-07 23:43:17', '1', '400.00', '400.00', 0, 1, '2020-01-07 16:43:17'),
(176, 6, '84', '10,11,12', 0, '1200.00', 3, '0.00', '0.00', '1200.00', '2020-01-07 23:44:41', '1,1,1', '300.00', '1200.00', 0, 0, '2020-01-07 16:44:41'),
(177, 6, '84', '10,11,12', 0, '1200.00', 3, '0.00', '0.00', '1200.00', '2020-01-07 23:44:45', '1,1,1', '300.00', '1200.00', 0, 0, '2020-01-07 16:44:45'),
(178, 6, '81', '10', 0, '300.00', 1, '0.00', '0.00', '300.00', '2020-01-07 23:45:52', '1', '300.00', '300.00', 0, 1, '2020-01-07 16:45:52'),
(179, 7, '82,84', '12', 0, '1000.00', 1, '0.00', '0.00', '1000.00', '2020-01-07 23:47:06', '1', '500.00', '1000.00', 0, 2, '2020-01-07 16:47:06'),
(180, 7, '81', '9,10,11,12', 0, '1550.00', 4, '0.00', '0.00', '1550.00', '2020-01-07 23:48:21', '1,1,1,1', '350.00', '1550.00', 0, 1, '2020-01-07 16:48:21'),
(181, 8, '83', '9,10,11,12', 0, '1550.00', 4, '0.00', '0.00', '1550.00', '2020-01-07 23:49:32', '1,1,1,1', '350.00', '1550.00', 0, 1, '2020-01-07 16:49:32'),
(182, 6, '86', '9', 0, '350.00', 1, '0.00', '0.00', '350.00', '2020-01-08 00:02:56', '1', '350.00', '350.00', 0, 1, '2020-01-07 17:02:56'),
(183, 6, '87', '11,12', 0, '900.00', 2, '0.00', '0.00', '900.00', '2020-01-08 00:05:56', '1,1', '400.00', '900.00', 0, 1, '2020-01-07 17:05:56'),
(184, 6, '86', '9,10,11,12', 34, '3800.00', 4, '200.00', '266.00', '4066.00', '2020-01-08 00:06:44', '1,1,1,1', '1000.00', '2600.00', 0, 1, '2020-01-07 17:06:44'),
(185, 6, '88', '9', 0, '350.00', 1, '0.00', '0.00', '350.00', '2020-01-08 00:08:56', '1', '350.00', '350.00', 0, 1, '2020-01-07 17:08:56'),
(186, 6, '89', '9,10,11', 34, '1050.00', 3, '0.00', '0.00', '1050.00', '2020-01-08 00:09:25', '1,1,1', '350.00', '150.00', 0, 1, '2020-01-07 17:09:25'),
(187, 6, '90,87', '9,10,11', 34, '2100.00', 3, '0.00', '0.00', '2100.00', '2020-01-08 00:10:35', '1,1,1', '350.00', '300.00', 0, 2, '2020-01-07 17:10:35'),
(188, 6, '86,87,88', '9,10', 34, '9999.99', 3, '0.00', '0.00', '9999.99', '2020-01-08 00:13:12', '2,1', '1500.00', '7500.00', 0, 3, '2020-01-07 17:13:12'),
(189, 6, '89,90,86', '11,12', 0, '2700.00', 2, '0.00', '0.00', '2700.00', '2020-01-08 00:25:15', '1,1', '400.00', '2700.00', 0, 3, '2020-01-07 17:25:15'),
(190, 6, '87', '10,11,12', 0, '1200.00', 3, '0.00', '0.00', '1200.00', '2020-01-08 00:27:31', '1,1,1', '300.00', '1200.00', 0, 1, '2020-01-07 17:27:31'),
(191, 7, '88,86', '10,11,12', 34, '2400.00', 3, '0.00', '0.00', '2400.00', '2020-01-08 00:27:57', '1,1,1', '300.00', '600.00', 0, 2, '2020-01-07 17:27:57'),
(192, 6, '89', '9,10,11,12', 34, '3100.00', 8, '0.00', '0.00', '3100.00', '2020-01-08 00:31:06', '2,2,2,2', '350.00', '700.00', 0, 1, '2020-01-07 17:31:06'),
(193, 7, '90,87', '9,11,12', 0, '2500.00', 3, '0.00', '0.00', '2500.00', '2020-01-08 00:31:27', '1,1,1', '350.00', '2500.00', 0, 2, '2020-01-07 17:31:27'),
(194, 6, '88', '10,11,12', 0, '1200.00', 3, '0.00', '0.00', '1200.00', '2020-01-08 00:46:24', '1,1,1', '300.00', '1200.00', 0, 1, '2020-01-07 17:46:24'),
(195, 7, '86,87', '10,11,12', 34, '2400.00', 3, '0.00', '0.00', '2400.00', '2020-01-08 01:32:13', '1,1,1', '300.00', '600.00', 0, 2, '2020-01-07 18:32:13'),
(196, 6, '88', '9,11', 0, '700.00', 2, '50.00', '49.00', '749.00', '2020-01-08 03:55:12', '1,1', '350.00', '700.00', 0, 1, '2020-01-07 20:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(5) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `money` decimal(6,2) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `type`, `description`, `money`, `createDate`, `updateDate`) VALUES
(1, 0, 'ซื้อสบู่', '200.00', '2020-01-08 00:00:00', '2020-01-07 19:48:12'),
(2, 0, 'ซื้อน้ำยาถูพื้น ', '200.00', '2020-01-08 03:04:00', '2020-01-07 20:04:00'),
(3, 1, 'จ่ายค่าโทรศัพท์ ร้าน', '650.00', '2020-01-08 03:05:03', '2020-01-07 20:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `history_massager`
--

CREATE TABLE `history_massager` (
  `history_id` int(5) NOT NULL,
  `staff_massager_id` int(5) NOT NULL,
  `history_hour` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `history_money` decimal(6,2) NOT NULL,
  `detail_list_id` varchar(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_massager`
--

INSERT INTO `history_massager` (`history_id`, `staff_massager_id`, `history_hour`, `course_id`, `history_money`, `detail_list_id`, `date`) VALUES
(185, 48, 2, 9, '120.00', '160', '2020-01-07 09:27:23'),
(186, 48, 1, 10, '75.00', '160', '2020-01-07 09:27:23'),
(187, 52, 1, 12, '70.00', '161', '2020-01-07 09:29:04'),
(188, 53, 1, 12, '70.00', '161', '2020-01-07 09:29:04'),
(189, 49, 1, 10, '75.00', '162', '2020-01-07 16:14:50'),
(190, 51, 1, 9, '60.00', '163', '2020-01-07 16:16:54'),
(191, 52, 1, 10, '75.00', '164', '2020-01-07 16:19:12'),
(192, 48, 1, 10, '75.00', '165', '2020-01-07 16:20:34'),
(193, 49, 1, 11, '90.00', '166', '2020-01-07 16:21:52'),
(194, 51, 1, 11, '90.00', '166', '2020-01-07 16:21:52'),
(195, 53, 1, 11, '90.00', '167', '2020-01-07 16:23:53'),
(196, 48, 1, 11, '90.00', '167', '2020-01-07 16:23:53'),
(197, 52, 1, 9, '60.00', '168', '2020-01-07 16:25:04'),
(198, 49, 1, 10, '75.00', '169', '2020-01-07 16:25:54'),
(199, 51, 1, 10, '75.00', '169', '2020-01-07 16:25:54'),
(200, 49, 1, 11, '90.00', '169', '2020-01-07 16:25:54'),
(201, 51, 1, 11, '90.00', '169', '2020-01-07 16:25:54'),
(202, 53, 1, 10, '75.00', '170', '2020-01-07 16:33:43'),
(203, 48, 1, 10, '75.00', '171', '2020-01-07 16:35:20'),
(204, 48, 1, 11, '90.00', '171', '2020-01-07 16:35:20'),
(205, 49, 1, 12, '70.00', '172', '2020-01-07 16:35:56'),
(206, 51, 1, 12, '70.00', '172', '2020-01-07 16:35:56'),
(207, 48, 1, 10, '75.00', '173', '2020-01-07 16:40:02'),
(208, 52, 1, 10, '75.00', '173', '2020-01-07 16:40:02'),
(209, 53, 1, 10, '75.00', '173', '2020-01-07 16:40:02'),
(210, 48, 1, 11, '90.00', '173', '2020-01-07 16:40:02'),
(211, 52, 1, 11, '90.00', '173', '2020-01-07 16:40:02'),
(212, 53, 1, 11, '90.00', '173', '2020-01-07 16:40:02'),
(213, 48, 1, 10, '75.00', '174', '2020-01-07 16:40:53'),
(214, 49, 1, 11, '90.00', '175', '2020-01-07 16:43:17'),
(215, 51, 1, 10, '75.00', '176', '2020-01-07 16:44:41'),
(216, 51, 1, 11, '90.00', '176', '2020-01-07 16:44:41'),
(217, 51, 1, 12, '70.00', '176', '2020-01-07 16:44:41'),
(218, 51, 1, 10, '75.00', '177', '2020-01-07 16:44:45'),
(219, 51, 1, 11, '90.00', '177', '2020-01-07 16:44:45'),
(220, 51, 1, 12, '70.00', '177', '2020-01-07 16:44:45'),
(221, 52, 1, 10, '75.00', '178', '2020-01-07 16:45:52'),
(222, 53, 1, 12, '70.00', '179', '2020-01-07 16:47:06'),
(223, 51, 1, 12, '70.00', '179', '2020-01-07 16:47:06'),
(224, 52, 1, 9, '60.00', '180', '2020-01-07 16:48:21'),
(225, 52, 1, 10, '75.00', '180', '2020-01-07 16:48:21'),
(226, 52, 1, 11, '90.00', '180', '2020-01-07 16:48:21'),
(227, 52, 1, 12, '70.00', '180', '2020-01-07 16:48:21'),
(228, 49, 1, 9, '60.00', '181', '2020-01-07 16:49:32'),
(229, 49, 1, 10, '75.00', '181', '2020-01-07 16:49:32'),
(230, 49, 1, 11, '90.00', '181', '2020-01-07 16:49:32'),
(231, 49, 1, 12, '70.00', '181', '2020-01-07 16:49:32'),
(232, 51, 1, 9, '60.00', '182', '2020-01-07 17:02:56'),
(233, 49, 1, 11, '90.00', '183', '2020-01-07 17:05:56'),
(234, 49, 1, 12, '70.00', '183', '2020-01-07 17:05:56'),
(235, 51, 1, 9, '60.00', '184', '2020-01-07 17:06:44'),
(236, 51, 1, 10, '75.00', '184', '2020-01-07 17:06:44'),
(237, 51, 1, 11, '90.00', '184', '2020-01-07 17:06:44'),
(238, 51, 1, 12, '70.00', '184', '2020-01-07 17:06:44'),
(239, 48, 1, 9, '60.00', '185', '2020-01-07 17:08:56'),
(240, 52, 1, 9, '60.00', '186', '2020-01-07 17:09:25'),
(241, 52, 1, 10, '75.00', '186', '2020-01-07 17:09:25'),
(242, 52, 1, 11, '90.00', '186', '2020-01-07 17:09:25'),
(243, 53, 1, 9, '60.00', '187', '2020-01-07 17:10:35'),
(244, 49, 1, 9, '60.00', '187', '2020-01-07 17:10:35'),
(245, 53, 1, 10, '75.00', '187', '2020-01-07 17:10:35'),
(246, 49, 1, 10, '75.00', '187', '2020-01-07 17:10:35'),
(247, 53, 1, 11, '90.00', '187', '2020-01-07 17:10:35'),
(248, 49, 1, 11, '90.00', '187', '2020-01-07 17:10:35'),
(249, 51, 2, 9, '120.00', '188', '2020-01-07 17:13:12'),
(250, 49, 2, 9, '120.00', '188', '2020-01-07 17:13:12'),
(251, 48, 2, 9, '120.00', '188', '2020-01-07 17:13:12'),
(252, 51, 1, 10, '75.00', '188', '2020-01-07 17:13:12'),
(253, 49, 1, 10, '75.00', '188', '2020-01-07 17:13:12'),
(254, 48, 1, 10, '75.00', '188', '2020-01-07 17:13:12'),
(255, 52, 1, 11, '90.00', '189', '2020-01-07 17:25:15'),
(256, 53, 1, 11, '90.00', '189', '2020-01-07 17:25:15'),
(257, 51, 1, 11, '90.00', '189', '2020-01-07 17:25:15'),
(258, 52, 1, 12, '70.00', '189', '2020-01-07 17:25:15'),
(259, 53, 1, 12, '70.00', '189', '2020-01-07 17:25:15'),
(260, 51, 1, 12, '70.00', '189', '2020-01-07 17:25:15'),
(261, 49, 1, 10, '75.00', '190', '2020-01-07 17:27:31'),
(262, 49, 1, 11, '90.00', '190', '2020-01-07 17:27:31'),
(263, 49, 1, 12, '70.00', '190', '2020-01-07 17:27:31'),
(264, 48, 1, 10, '75.00', '191', '2020-01-07 17:27:57'),
(265, 51, 1, 10, '75.00', '191', '2020-01-07 17:27:57'),
(266, 48, 1, 11, '90.00', '191', '2020-01-07 17:27:57'),
(267, 51, 1, 11, '90.00', '191', '2020-01-07 17:27:57'),
(268, 48, 1, 12, '70.00', '191', '2020-01-07 17:27:57'),
(269, 51, 1, 12, '70.00', '191', '2020-01-07 17:27:57'),
(270, 52, 2, 9, '120.00', '192', '2020-01-07 17:31:06'),
(271, 52, 2, 10, '150.00', '192', '2020-01-07 17:31:06'),
(272, 52, 2, 11, '180.00', '192', '2020-01-07 17:31:06'),
(273, 52, 2, 12, '140.00', '192', '2020-01-07 17:31:06'),
(274, 53, 1, 9, '60.00', '193', '2020-01-07 17:31:27'),
(275, 49, 1, 9, '60.00', '193', '2020-01-07 17:31:27'),
(276, 53, 1, 11, '90.00', '193', '2020-01-07 17:31:27'),
(277, 49, 1, 11, '90.00', '193', '2020-01-07 17:31:27'),
(278, 53, 1, 12, '70.00', '193', '2020-01-07 17:31:27'),
(279, 49, 1, 12, '70.00', '193', '2020-01-07 17:31:27'),
(280, 48, 1, 10, '75.00', '194', '2020-01-07 17:46:24'),
(281, 48, 1, 11, '90.00', '194', '2020-01-07 17:46:24'),
(282, 48, 1, 12, '70.00', '194', '2020-01-07 17:46:24'),
(283, 51, 1, 10, '75.00', '195', '2020-01-07 18:32:13'),
(284, 49, 1, 10, '75.00', '195', '2020-01-07 18:32:13'),
(285, 51, 1, 11, '90.00', '195', '2020-01-07 18:32:13'),
(286, 49, 1, 11, '90.00', '195', '2020-01-07 18:32:13'),
(287, 51, 1, 12, '70.00', '195', '2020-01-07 18:32:13'),
(288, 49, 1, 12, '70.00', '195', '2020-01-07 18:32:13'),
(289, 48, 1, 9, '60.00', '196', '2020-01-07 20:55:12'),
(290, 48, 1, 11, '90.00', '196', '2020-01-07 20:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(5) NOT NULL,
  `detail_list_id` int(5) NOT NULL,
  `money` decimal(6,2) NOT NULL,
  `date` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `detail_list_id`, `money`, `date`, `updateDate`) VALUES
(73, 160, '900.00', '2020-01-07 16:27:23', '2020-01-07 09:27:23'),
(74, 161, '1000.00', '2020-01-07 16:29:04', '2020-01-07 09:29:04'),
(75, 162, '0.00', '2020-01-07 23:14:50', '2020-01-07 16:14:50'),
(76, 163, '0.00', '2020-01-07 23:16:54', '2020-01-07 16:16:54'),
(77, 164, '0.00', '2020-01-07 23:19:12', '2020-01-07 16:19:12'),
(78, 166, '0.00', '2020-01-07 23:21:52', '2020-01-07 16:21:52'),
(79, 167, '0.00', '2020-01-07 23:23:53', '2020-01-07 16:23:53'),
(80, 168, '0.00', '2020-01-07 23:25:04', '2020-01-07 16:25:04'),
(81, 169, '0.00', '2020-01-07 23:25:54', '2020-01-07 16:25:54'),
(82, 170, '0.00', '2020-01-07 23:33:43', '2020-01-07 16:33:43'),
(83, 171, '800.00', '2020-01-07 23:35:20', '2020-01-07 16:35:20'),
(84, 172, '0.00', '2020-01-07 23:35:56', '2020-01-07 16:35:56'),
(85, 173, '1800.00', '2020-01-07 23:40:02', '2020-01-07 16:40:02'),
(86, 174, '0.00', '2020-01-07 23:40:53', '2020-01-07 16:40:53'),
(87, 175, '0.00', '2020-01-07 23:43:17', '2020-01-07 16:43:17'),
(88, 176, '0.00', '2020-01-07 23:44:41', '2020-01-07 16:44:41'),
(89, 177, '0.00', '2020-01-07 23:44:45', '2020-01-07 16:44:45'),
(90, 178, '0.00', '2020-01-07 23:45:52', '2020-01-07 16:45:52'),
(91, 179, '0.00', '2020-01-07 23:47:06', '2020-01-07 16:47:06'),
(92, 180, '0.00', '2020-01-07 23:48:21', '2020-01-07 16:48:21'),
(93, 181, '0.00', '2020-01-07 23:49:32', '2020-01-07 16:49:32'),
(94, 182, '0.00', '2020-01-08 00:02:56', '2020-01-07 17:02:56'),
(95, 183, '0.00', '2020-01-08 00:05:56', '2020-01-07 17:05:56'),
(96, 184, '1200.00', '2020-01-08 00:06:44', '2020-01-07 17:06:44'),
(97, 185, '0.00', '2020-01-08 00:08:56', '2020-01-07 17:08:56'),
(98, 186, '900.00', '2020-01-08 00:09:25', '2020-01-07 17:09:25'),
(99, 187, '1800.00', '2020-01-08 00:10:35', '2020-01-07 17:10:35'),
(100, 188, '4500.00', '2020-01-08 00:13:12', '2020-01-07 17:13:12'),
(101, 189, '0.00', '2020-01-08 00:25:15', '2020-01-07 17:25:15'),
(102, 190, '0.00', '2020-01-08 00:27:31', '2020-01-07 17:27:31'),
(103, 191, '1800.00', '2020-01-08 00:27:57', '2020-01-07 17:27:57'),
(104, 192, '2400.00', '2020-01-08 00:31:06', '2020-01-07 17:31:06'),
(105, 193, '0.00', '2020-01-08 00:31:27', '2020-01-07 17:31:27'),
(106, 194, '0.00', '2020-01-08 00:46:24', '2020-01-07 17:46:24'),
(107, 195, '1800.00', '2020-01-08 01:32:13', '2020-01-07 18:32:13'),
(108, 196, '0.00', '2020-01-08 03:55:12', '2020-01-07 20:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(5) NOT NULL,
  `staff_massager_id` int(5) NOT NULL,
  `leave_detail` text NOT NULL,
  `startDate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `endDate` date NOT NULL,
  `tel` varchar(10) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`leave_id`, `staff_massager_id`, `leave_detail`, `startDate`, `status`, `title`, `endDate`, `tel`, `createDate`) VALUES
(20, 48, 'ไปสอบความคืบหน้าโปรเจค', '2020-01-08', 0, 'ลากิจ', '2020-01-08', '0909877312', '2020-01-07 09:45:53'),
(21, 48, 'ไปทำธุระ', '2020-01-10', 0, 'ลาป่วย', '2020-01-23', '0909877312', '2020-01-07 17:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `massage_course`
--

CREATE TABLE `massage_course` (
  `course_id` int(5) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_price` decimal(6,2) NOT NULL,
  `course_detail` text NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createDate` datetime NOT NULL,
  `course_get` decimal(6,2) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `massage_course`
--

INSERT INTO `massage_course` (`course_id`, `course_name`, `course_price`, `course_detail`, `updateDate`, `createDate`, `course_get`, `img`) VALUES
(9, 'นวดไทย', '350.00', 'การนวดแผนไทย เน้นในลักษณะการกด การคลึง การบีบ การดัด การดึง เป็นศาสตร์บำบัดและรักษาโรคแขนงหนึ่งของการแพทย์แผนไทย', '2020-01-07 08:23:56', '2020-01-07 15:23:56', '60.00', '2020010715235642a0e188f5033bc65bf8d78622277c4e.jpg'),
(10, 'นวดเท้า', '300.00', 'การนวดกดจุดฝ่าเท้าช่วยให้ระบบประสาทผ่อนคลาย ช่วยคลายเครียดและผ่อนคลาย กระตุ้นการไหลเวียนของโลหิต', '2020-01-07 08:24:49', '2020-01-07 15:24:49', '75.00', '202001071524496cdd60ea0045eb7a6ec44c54d29ed402.jpg'),
(11, 'นวดออย', '400.00', 'ให้ประโยชน์จากกลิ่นหอมระเหยของน้ำมันหอม บำรุงประสาท เน้นการบำบัดรักษาด้วยกลิ่นหอมระเหยของน้ำมันกระตุ้นร่างกาย ผ่อนคลายความเครียด ทำให้รู้สึกจิตใจสงบ', '2020-01-07 08:25:52', '2020-01-07 15:25:52', '90.00', '20200107152552f2217062e9a397a1dca429e7d70bc6ca.jpg'),
(12, 'นวดประคบ', '500.00', 'การนวดแผนไทยพร้อมประคบด้วยลูกประคบสมุนไพร ลูกประคบสมุนไพรเป็นการปรุงสมุนไพรต่างๆ ที่มีคุณสมบัติเฉพาะในการช่วยการรักษาและบำบัดร่างกาย', '2020-01-07 08:26:41', '2020-01-07 15:26:41', '70.00', '20200107152641b73ce398c39f506af761d2277d853a92.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstName`, `lastName`, `email`, `password`, `tel`, `sex`, `address`, `img`, `updateDate`, `createDate`, `status`) VALUES
(18, '', '', 'member@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0884018847', 0, '', 'default.jpg', '2020-01-07 07:48:54', '2020-01-07 14:48:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officerId` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `tell` varchar(10) NOT NULL,
  `startDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officerId`, `firstName`, `lastName`, `address`, `email`, `password`, `img`, `tell`, `startDate`) VALUES
(53, 'บุญชัย', 'วงศ์บวรเกียรติ', '1201/102 ซอยลาดพร้าว 94(ปัญจมิตร) แขวงพลับพลา เขตวังทองหลาง กทม. 10310', 'officer@gmail.com', '25d55ad283aa400af464c76d713c07ad', '20200107145608e00da03b685a0dd18fb6a08af0923de0.png', '0838395144', '2020-01-07 14:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `email`, `password`, `createDate`, `updateDate`) VALUES
(8, 'owner@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2020-01-07 14:50:02', '2020-01-07 07:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(5) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `slip` varchar(50) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `booking_id`, `slip`, `createDate`, `updateDate`) VALUES
(37, 71, '202001071618213988c7f88ebcb58c6ce932b957b6f332.jpg', '2020-01-07 16:18:21', '2020-01-07 09:18:21'),
(38, 72, '202001071620440336dcbab05b9d5ad24f4333c7658a0e.jpg', '2020-01-07 16:20:44', '2020-01-07 09:20:44'),
(39, 72, '20200107162139c45147dee729311ef5b5c3003946c48f.jpg', '2020-01-07 16:21:39', '2020-01-07 09:21:39'),
(40, 75, '202001071643150777d5c17d4066b82ab86dff8a46af6f.jpg', '2020-01-07 16:43:15', '2020-01-07 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(5) NOT NULL,
  `number` varchar(50) NOT NULL,
  `bed` int(5) NOT NULL,
  `use_bed` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `number`, `bed`, `use_bed`, `status`, `description`, `createDate`, `updateDate`) VALUES
(6, 'TH0102', 20, 1, 0, 'นวดไทย ', '2020-01-07 16:05:21', '2020-01-07 20:55:12'),
(7, 'OY0105', 10, 2, 0, 'นวดออย ผ้าเปลี่ยนใมห้ 20 ธันวาคม 62', '2020-01-07 16:06:26', '2020-01-07 18:32:13'),
(8, 'FT0201', 15, 0, 0, 'แอร์เสีย', '2020-01-07 16:07:56', '2020-01-07 16:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `staff_massager`
--

CREATE TABLE `staff_massager` (
  `staff_massager_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `tell` varchar(10) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `IDCard` varchar(50) NOT NULL,
  `document` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ability` varchar(50) NOT NULL,
  `startDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_massager`
--

INSERT INTO `staff_massager` (`staff_massager_id`, `email`, `password`, `firstName`, `lastName`, `tell`, `sex`, `address`, `img`, `IDCard`, `document`, `status`, `ability`, `startDate`) VALUES
(48, 'cheerdyw3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ดุลยวัต', 'สมบุตร', '0884018844', 0, '65 หมู่ 2 ตำบลแม่หล่าย อ.เมืองแพร่ จ.แพร่', 'default.jpg', '20200107153315fa7cdfad1a5aaf8370ebeda47a1ff1c3.jpg', '2020010715331565ded5353c5ee48d0b7d48c591b8f430.jpg', 1, '9,10,12', '2020-01-07 15:33:15'),
(49, 'staff@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ณัฐภิญญา', 'เทพขาว', '0946344302', 0, '125/2 หมู่ 5 ต.นานอน อ.เมือง จ.ลำพูน', '202001071536009fc3d7152ba9336a670e36d0ed79bc43.png', '20200107153600c8ffe9a587b126f152ed3d89a146b445.jpg', '202001071536006974ce5ac660610b44d9b9fed0ff9548.jpg', 1, '9,12', '2020-01-07 15:36:00'),
(50, 'staff2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'อังศุมาลิน', 'สิรภัทรศักดิ์เมธา', '0884018888', 0, '140. วัดข่วงสิงห์ ถ.โชตนา ต.ช้างเผือก อ.เมือง จ.เชียงใหม่', '202001071543000336dcbab05b9d5ad24f4333c7658a0e.png', '2020010715430084d9ee44e457ddef7f2c4f25dc8fa865.jpg', '20200107154300eecca5b6365d9607ee5a9d336962c534.jpg', 0, '9,10,11,12', '2020-01-07 15:43:00'),
(51, 'staff3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ณัฐธิดา', 'ตรีชัยยะ', '0909877312', 0, '11 หมู่ 2 ต.แม่หล่าย อ.เมือง จ.แพร่', '20200107154611ec8956637a99787bd197eacd77acce5e.jpg', '20200107154611a3c65c2974270fd093ee8a9bf8ae7d0b.jpg', '20200107154611d1f491a404d6854880943e5c3cd9ca25.jpg', 1, '11,12', '2020-01-07 15:46:11'),
(52, 'staff4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'สุทัตตา', 'อุดมศิลป์', '0838395111', 0, '52 หมู่ 7 ต.ในเวียง อ.เมือง จ.แพร่', '202001071549019872ed9fc22fc182d371c3e9ed316094.jpg', '20200107154901b3e3e393c77e35a4a3f3cbd1e429b5dc.jpg', '202001071549019872ed9fc22fc182d371c3e9ed316094.jpg', 1, '9,10', '2020-01-07 15:49:01'),
(53, 'staff5@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'คามิลล่า', 'กิตติวัฒน์', '0909877312', 0, '2 หมู่ 2 ต.เหมืองแดง อ.เมือง จ.แพร่', '202001071554127ef605fc8dba5425d6965fbd4c8fbe1f.jpg', '202001071554128f53295a73878494e9bc8dd6c3c7104f.jpg', '202001071554129dcb88e0137649590b755372b040afad.jpg', 1, '9,10,11,12', '2020-01-07 15:54:12'),
(54, 'staff6@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ดารัณ', 'ฐิตะกวิน', '0884018887', 0, '60 ถนน มหิดล อำเภอเมืองเชียงใหม่ เชียงใหม่ 50200', 'default.jpg', '20200107155723eecca5b6365d9607ee5a9d336962c534.jpg', '202001071557235878a7ab84fb43402106c575658472fa.jpg', 0, '9,10,11,12', '2020-01-07 15:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE `work_schedule` (
  `schedule_id` int(5) NOT NULL,
  `staff_massager_id` int(5) NOT NULL,
  `startDate` time NOT NULL,
  `endDate` time NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_schedule`
--

INSERT INTO `work_schedule` (`schedule_id`, `staff_massager_id`, `startDate`, `endDate`, `updateDate`, `createDate`, `status`) VALUES
(81, 52, '00:00:00', '00:00:00', '2020-01-07 16:48:22', '2020-01-07 16:10:42', 0),
(82, 53, '00:00:00', '00:00:00', '2020-01-07 16:47:39', '2020-01-07 16:10:44', 0),
(83, 49, '00:00:00', '00:00:00', '2020-01-07 16:49:33', '2020-01-07 16:10:47', 0),
(84, 51, '00:00:00', '00:00:00', '2020-01-07 16:47:52', '2020-01-07 16:10:49', 0),
(85, 48, '00:00:00', '00:00:00', '2020-01-07 16:46:34', '2020-01-07 16:24:55', 0),
(86, 51, '01:37:13', '04:37:13', '2020-01-07 18:32:13', '2020-01-08 00:01:53', 1),
(87, 49, '01:37:13', '04:37:13', '2020-01-07 18:32:13', '2020-01-08 00:01:56', 1),
(88, 48, '04:00:12', '06:00:12', '2020-01-07 20:55:12', '2020-01-08 00:01:59', 1),
(89, 52, '00:00:00', '00:00:00', '2020-01-07 17:47:03', '2020-01-08 00:02:02', 0),
(90, 53, '00:00:00', '00:00:00', '2020-01-07 17:47:03', '2020-01-08 00:02:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
  ADD PRIMARY KEY (`adviser_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `detail_list`
--
ALTER TABLE `detail_list`
  ADD PRIMARY KEY (`detail_list_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `history_massager`
--
ALTER TABLE `history_massager`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `massage_course`
--
ALTER TABLE `massage_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officerId`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff_massager`
--
ALTER TABLE `staff_massager`
  ADD PRIMARY KEY (`staff_massager_id`);

--
-- Indexes for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `adviser_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `detail_list`
--
ALTER TABLE `detail_list`
  MODIFY `detail_list_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_massager`
--
ALTER TABLE `history_massager`
  MODIFY `history_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `massage_course`
--
ALTER TABLE `massage_course`
  MODIFY `course_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `officerId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_massager`
--
ALTER TABLE `staff_massager`
  MODIFY `staff_massager_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `schedule_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
