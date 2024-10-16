-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 01:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_proof` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_proof`) VALUES
(27, 'Cenna Alias', 'cennaalias29@gmail.com', '9876Aa1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(13, 'Generic'),
(14, 'Kids'),
(15, 'Adults'),
(18, 'First Aid'),
(20, 'Surgicals');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` longtext NOT NULL,
  `complaint_reply` longtext NOT NULL,
  `complaint_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_status`) VALUES
(5, 'Service', 'Good', '', 0),
(6, 'Customer Care', 'Not Bad', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_datetime` varchar(100) NOT NULL,
  `order_status` char(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_datetime`, `order_status`, `user_id`, `pharmacist_id`, `order_amount`) VALUES
(26, '2024-10-05 11:00:28', '1', 32, 17, 541),
(27, '2024-10-05 11:13:09', '1', 32, 17, 541),
(28, '2024-10-05 20:02:47', '1', 32, 17, 541),
(29, '2024-10-05 21:05:48', '0', 31, 17, 0),
(30, '2024-10-06 11:33:26', '1', 26, 17, 762),
(31, '2024-10-06 14:59:15', '1', 33, 17, 294),
(32, '2024-10-06 19:12:19', '1', 26, 17, 762),
(33, '2024-10-06 19:19:20', '0', 34, 17, 0),
(34, '2024-10-06 20:00:03', '1', 27, 17, 360),
(35, '2024-10-06 20:21:56', '1', 27, 17, 360),
(36, '2024-10-07 16:31:47', '0', 26, 17, 0),
(37, '2024-10-07 17:55:52', '1', 35, 0, 70),
(38, '2024-10-07 21:26:48', '0', 36, 17, 0),
(39, '2024-10-08 19:36:59', '1', 27, 17, 360),
(40, '2024-10-08 19:39:26', '0', 27, 17, 0),
(41, '2024-10-08 20:15:07', '0', 28, 17, 0),
(42, '2024-10-08 20:56:39', '1', 38, 17, 394),
(43, '2024-10-08 20:57:47', '1', 37, 0, 304),
(44, '2024-10-08 22:14:20', '0', 38, 17, 0),
(45, '2024-10-08 22:25:37', '1', 39, 17, 364),
(46, '2024-10-09 09:42:04', '0', 40, 17, 0),
(47, '2024-10-09 14:02:28', '0', 41, 17, 0),
(48, '2024-10-09 15:14:49', '1', 42, 17, 70),
(49, '2024-10-09 15:24:03', '1', 37, 17, 304),
(50, '2024-10-09 21:43:16', '1', 43, 17, 496),
(51, '2024-10-09 23:51:56', '1', 37, 17, 304),
(52, '2024-10-10 00:05:24', '1', 44, 0, 290),
(53, '2024-10-10 00:06:43', '1', 45, 0, 396),
(54, '2024-10-10 00:11:13', '1', 44, 0, 290),
(55, '2024-10-10 12:38:57', '1', 46, 17, 500),
(56, '2024-10-10 14:39:13', '1', 44, 17, 290),
(57, '2024-10-11 19:59:14', '1', 47, 17, 496),
(58, '2024-10-13 13:34:45', '1', 48, 17, 186),
(59, '2024-10-13 19:27:44', '1', 49, 17, 804),
(60, '2024-10-13 21:32:09', '1', 46, 17, 500),
(61, '2024-10-14 11:16:15', '1', 44, 17, 290),
(62, '2024-10-16 16:08:31', '1', 48, 17, 186);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(11) NOT NULL,
  `pharmacist_name` varchar(50) NOT NULL,
  `pharmacist_email` varchar(100) NOT NULL,
  `pharmacist_password` varchar(20) NOT NULL,
  `pharmacist_proof` varchar(200) NOT NULL,
  `pharmacist_photo` varchar(50) NOT NULL,
  `pharmacist_address` varchar(500) NOT NULL,
  `pharmacist_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pharmacist`
--

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `pharmacist_name`, `pharmacist_email`, `pharmacist_password`, `pharmacist_proof`, `pharmacist_photo`, `pharmacist_address`, `pharmacist_contact`) VALUES
(17, 'Ansona Sabu', 'ansonasabu93@gmail.com', '09876543Aa', 'A2.webp', 'P1.jpeg', 'ABC', '9871234564');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_photo` varchar(200) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_photo`, `subcategory_id`) VALUES
(32, 'Aspirin', 2, 'P4.jpeg', 14),
(35, 'Dimetapp', 100, 'image4.jpg', 13),
(38, 'Amoxycillin', 34, 'P5.jpg', 14),
(39, 'Vicks VapoRub', 60, 'img1.jpg', 12),
(40, 'Vicks ExtraStrong', 70, 'img2.webp', 14),
(41, 'Vicks BabyRub', 50, 'img3.jpg', 13),
(42, 'Vicks Inhaler', 30, 'img4.webp', 12),
(43, 'Mask', 50, 'img5.jpg', 12),
(44, 'Cotton Bandage', 100, 'img6.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_singleorder`
--

CREATE TABLE `tbl_singleorder` (
  `singleorder_id` int(11) NOT NULL,
  `singleorder_qty` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `singleorder_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_singleorder`
--

INSERT INTO `tbl_singleorder` (`singleorder_id`, `singleorder_qty`, `product_id`, `order_id`, `singleorder_status`) VALUES
(134, 1, 22, 26, 1),
(135, 1, 24, 26, 1),
(136, 4, 37, 26, 1),
(137, 4, 32, 26, 1),
(138, 3, 23, 27, 1),
(139, 2, 37, 27, 1),
(140, 2, 38, 27, 1),
(141, 1, 24, 27, 1),
(142, 1, 22, 27, 1),
(143, 1, 36, 27, 1),
(144, 1, 42, 28, 1),
(145, 1, 41, 28, 1),
(146, 1, 40, 28, 1),
(147, 1, 39, 28, 1),
(148, 1, 35, 28, 1),
(149, 1, 36, 28, 1),
(150, 1, 37, 28, 1),
(151, 1, 38, 28, 1),
(152, 1, 32, 28, 1),
(153, 1, 24, 28, 1),
(154, 1, 23, 28, 1),
(155, 1, 22, 28, 1),
(157, 1, 39, 29, 0),
(158, 1, 40, 30, 1),
(159, 1, 36, 30, 1),
(160, 1, 32, 30, 1),
(161, 1, 22, 30, 1),
(162, 2, 23, 31, 1),
(163, 5, 32, 31, 1),
(164, 4, 40, 31, 1),
(165, 3, 35, 32, 1),
(166, 4, 36, 32, 1),
(167, 3, 38, 32, 1),
(168, 9, 32, 33, 0),
(169, 3, 36, 33, 0),
(170, 4, 35, 34, 1),
(171, 1, 40, 34, 1),
(172, 1, 42, 34, 1),
(173, 1, 41, 34, 1),
(174, 1, 39, 34, 1),
(175, 1, 32, 34, 1),
(176, 1, 36, 34, 1),
(177, 1, 38, 34, 1),
(178, 3, 35, 35, 1),
(179, 3, 40, 35, 1),
(181, 1, 40, 37, 1),
(182, 1, 35, 37, 0),
(183, 2, 35, 37, 0),
(184, 3, 35, 37, 0),
(185, 4, 35, 37, 0),
(186, 5, 35, 37, 0),
(187, 6, 35, 37, 0),
(188, 7, 35, 37, 0),
(189, 8, 35, 37, 0),
(190, 1, 42, 37, 0),
(191, 2, 42, 37, 0),
(192, 3, 42, 37, 0),
(193, 4, 42, 37, 0),
(194, 5, 42, 37, 0),
(195, 1, 32, 37, 0),
(196, 2, 32, 37, 0),
(197, 3, 32, 37, 0),
(198, 4, 32, 37, 0),
(199, 5, 32, 37, 0),
(200, 6, 32, 37, 0),
(201, 1, 39, 37, 0),
(202, 2, 39, 37, 0),
(203, 3, 39, 37, 0),
(204, 4, 39, 37, 0),
(205, 5, 39, 37, 0),
(206, 7, 39, 38, 0),
(207, 4, 36, 39, 1),
(208, 7, 35, 40, 0),
(209, 8, 32, 40, 0),
(210, 5, 36, 40, 0),
(211, 1, 42, 41, 0),
(212, 1, 41, 41, 0),
(213, 1, 40, 41, 0),
(214, 1, 39, 41, 0),
(215, 1, 32, 41, 0),
(216, 1, 35, 41, 0),
(217, 1, 38, 41, 0),
(218, 1, 35, 42, 1),
(219, 1, 38, 42, 1),
(220, 1, 39, 42, 1),
(221, 1, 43, 42, 1),
(222, 1, 42, 42, 1),
(223, 1, 41, 42, 1),
(224, 1, 40, 42, 1),
(225, 6, 41, 43, 1),
(226, 5, 38, 43, 1),
(227, 3, 35, 44, 0),
(228, 4, 38, 44, 0),
(229, 5, 39, 44, 0),
(230, 4, 40, 44, 0),
(231, 4, 41, 44, 0),
(232, 5, 43, 44, 0),
(233, 1, 35, 45, 1),
(234, 1, 38, 45, 1),
(235, 1, 39, 45, 1),
(236, 1, 40, 45, 1),
(237, 1, 41, 45, 1),
(238, 1, 43, 45, 1),
(239, 7, 35, 46, 0),
(240, 7, 38, 46, 0),
(241, 5, 39, 46, 0),
(242, 5, 38, 47, 0),
(243, 6, 35, 47, 0),
(244, 1, 40, 48, 1),
(245, 1, 35, 48, 0),
(246, 2, 35, 49, 1),
(247, 1, 32, 50, 1),
(248, 1, 35, 50, 1),
(249, 1, 38, 50, 1),
(250, 1, 39, 50, 1),
(251, 1, 40, 50, 1),
(252, 1, 41, 50, 1),
(253, 1, 42, 50, 1),
(254, 1, 43, 50, 1),
(255, 1, 44, 50, 1),
(256, 2, 32, 51, 1),
(259, 5, 39, 51, 1),
(265, 1, 32, 52, 1),
(266, 1, 35, 52, 1),
(267, 1, 39, 52, 1),
(268, 1, 43, 52, 1),
(269, 2, 42, 52, 1),
(270, 1, 44, 52, 1),
(271, 1, 32, 53, 1),
(272, 1, 35, 53, 1),
(273, 1, 38, 53, 1),
(274, 1, 39, 53, 1),
(275, 2, 44, 53, 1),
(276, 4, 43, 54, 1),
(277, 2, 42, 54, 1),
(278, 1, 41, 54, 1),
(279, 1, 32, 55, 1),
(280, 2, 35, 55, 1),
(281, 2, 38, 55, 1),
(282, 2, 39, 55, 1),
(283, 5, 43, 55, 1),
(284, 2, 32, 56, 1),
(285, 2, 38, 56, 1),
(286, 1, 41, 56, 1),
(287, 1, 40, 57, 1),
(288, 1, 41, 57, 1),
(289, 1, 42, 57, 1),
(290, 1, 43, 57, 1),
(291, 1, 44, 57, 1),
(292, 1, 32, 57, 1),
(293, 1, 35, 57, 1),
(294, 1, 38, 57, 1),
(295, 1, 39, 57, 1),
(296, 2, 44, 58, 1),
(297, 5, 35, 58, 1),
(298, 4, 39, 58, 1),
(299, 3, 32, 58, 1),
(300, 3, 41, 58, 1),
(301, 6, 35, 59, 1),
(302, 6, 38, 59, 1),
(303, 5, 44, 60, 1),
(304, 2, 40, 61, 1),
(305, 5, 42, 61, 1),
(306, 4, 38, 62, 1),
(307, 1, 43, 62, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_expdate` date NOT NULL,
  `stock_date` date NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_expdate`, `stock_date`, `product_id`) VALUES
(8, 40, '2024-08-15', '0000-00-00', 0),
(12, 56, '2024-08-15', '0000-00-00', 0),
(13, 7878, '2024-07-31', '0000-00-00', 0),
(16, 100, '2024-07-31', '0000-00-00', 0),
(17, 30, '2024-08-06', '0000-00-00', 0),
(23, 345, '2024-08-06', '0000-00-00', 12),
(24, 56, '2024-08-06', '0000-00-00', 10),
(25, 57, '2024-09-18', '0000-00-00', 14),
(26, 5678, '2024-09-11', '0000-00-00', 15),
(27, 657, '2024-09-19', '0000-00-00', 16),
(29, 2345, '2024-09-20', '0000-00-00', 17),
(30, 500, '2024-09-27', '0000-00-00', 18),
(31, 850, '2024-09-30', '0000-00-00', 19),
(32, 395, '2024-09-06', '0000-00-00', 20),
(33, 500, '2024-09-25', '0000-00-00', 23),
(34, 4356, '2024-09-24', '0000-00-00', 25),
(35, 2323, '2024-10-03', '0000-00-00', 26),
(36, 43536, '2024-10-09', '0000-00-00', 31),
(37, 56, '2024-09-25', '0000-00-00', 22),
(38, 100, '2024-10-05', '0000-00-00', 24),
(39, 76, '2024-09-17', '0000-00-00', 33),
(41, 500, '2024-10-31', '0000-00-00', 24),
(42, 98, '2024-10-17', '0000-00-00', 35),
(43, 101, '2024-10-31', '0000-00-00', 36),
(44, 123, '2024-10-23', '0000-00-00', 37),
(45, 786, '2024-10-30', '0000-00-00', 38),
(46, 50, '2025-05-16', '0000-00-00', 39),
(47, 29, '2025-08-14', '0000-00-00', 40),
(48, 45, '2025-05-22', '0000-00-00', 41),
(49, 19, '2024-10-26', '0000-00-00', 42),
(50, 100, '2025-04-24', '0000-00-00', 43),
(51, 5, '2024-10-17', '0000-00-00', 32),
(52, 1000, '2025-07-25', '0000-00-00', 42),
(53, 1000, '2026-04-23', '0000-00-00', 32),
(54, 1000, '2027-01-15', '0000-00-00', 44),
(55, 200, '2025-06-19', '0000-00-00', 42),
(56, 100, '2027-02-25', '0000-00-00', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(12, 'For all', 13),
(13, 'Under 5', 14),
(14, 'Above 60', 15),
(15, 'For All', 18),
(16, 'ggshf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mob` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_mob`) VALUES
(44, 'Raj', '9142172392'),
(45, 'Anna', '9745484033'),
(46, 'Vani', '9865142370'),
(48, 'Ansona', '9816273546');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_singleorder`
--
ALTER TABLE `tbl_singleorder`
  ADD PRIMARY KEY (`singleorder_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_singleorder`
--
ALTER TABLE `tbl_singleorder`
  MODIFY `singleorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
