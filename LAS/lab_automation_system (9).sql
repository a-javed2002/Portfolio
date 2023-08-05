-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 06:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_automation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `comment_id` int(11) NOT NULL,
  `comment_message` text NOT NULL,
  `sender_id_FK` int(11) NOT NULL,
  `receiver_id_FK` int(11) NOT NULL,
  `tstamp` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`comment_id`, `comment_message`, `sender_id_FK`, `receiver_id_FK`, `tstamp`, `status`) VALUES
(67, 'fd', 79, 71, '2022-11-08 18:55:45', 0),
(68, 'fsfs44', 79, 71, '2022-11-08 18:55:45', 0),
(69, 'f', 79, 71, '2022-11-08 18:55:45', 0),
(70, 'd', 79, 71, '2022-11-08 18:55:45', 0),
(71, 'f', 79, 71, '2022-11-08 18:55:45', 0),
(72, 'ss', 79, 71, '2022-11-08 18:55:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(30) NOT NULL,
  `component_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`component_id`, `component_name`, `component_detail`) VALUES
(1, 'capacitor', 'abcds'),
(2, 'register', 'abcds'),
(3, 'ammeter', 'abcds'),
(4, 'voltmeter', 'abcds');

-- --------------------------------------------------------

--
-- Table structure for table `flag`
--

CREATE TABLE `flag` (
  `flag_id` int(11) NOT NULL,
  `flag_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flag`
--

INSERT INTO `flag` (`flag_id`, `flag_name`) VALUES
(1, 'indentured'),
(2, 'onleave'),
(3, 'fired'),
(4, 'suspended'),
(7, 'resigned');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `component_id_FK` int(11) DEFAULT NULL,
  `product_id_FK` int(11) DEFAULT NULL,
  `user_id_FK` int(11) DEFAULT NULL,
  `test_id_FK` int(11) DEFAULT NULL,
  `user_profile` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `component_id_FK`, `product_id_FK`, `user_id_FK`, `test_id_FK`, `user_profile`, `image`, `image_status`) VALUES
(94, NULL, NULL, 79, NULL, 79, 'uploads/profile1.jpg', 1),
(95, NULL, NULL, 79, 0, NULL, 'uploads/2021-11-16 (1).png', 1),
(96, NULL, NULL, 79, 0, NULL, 'uploads/heart2.jpg', 1),
(97, NULL, NULL, 79, 0, NULL, 'uploads/AVATAR.png', 1),
(98, NULL, NULL, 79, 0, NULL, 'uploads/cart2.png', 1),
(99, NULL, NULL, 79, 93, NULL, 'uploads/heart2.jpg', 1),
(100, NULL, NULL, 79, 93, NULL, 'uploads/AVATAR.png', 1),
(101, NULL, NULL, 79, 96, NULL, 'uploads/heart2.jpg', 1),
(102, NULL, NULL, 79, 96, NULL, 'uploads/img-3.jpg', 1),
(103, NULL, NULL, 79, 98, NULL, 'uploads/heart1.jpg', 1),
(104, NULL, NULL, 79, 98, NULL, 'uploads/star.png', 1),
(105, NULL, 27, 79, NULL, NULL, 'uploads/pic1.jpg', 1),
(106, NULL, 27, 79, NULL, NULL, 'uploads/pic2.jpg', 1),
(107, NULL, 27, NULL, NULL, 79, 'uploads/pic3.jpg', 1),
(108, NULL, 27, NULL, NULL, 79, 'uploads/pic4.jpg', 1),
(109, NULL, 28, 79, NULL, NULL, 'uploads/pic5.jpg', 1),
(110, NULL, 28, 79, NULL, NULL, 'uploads/pic6.jpg', 1),
(111, NULL, 28, 79, NULL, NULL, 'uploads/pic7.jpg', 1),
(112, NULL, 28, 79, NULL, NULL, 'uploads/pic8.jpg', 1),
(113, NULL, NULL, 79, 36, NULL, 'uploads/heart2.jpg', 1),
(114, NULL, NULL, 79, 36, NULL, 'uploads/cart2.png', 1),
(115, NULL, NULL, 79, 38, NULL, 'uploads/AVATAR.png', 1),
(116, NULL, NULL, 79, 40, NULL, 'uploads/marker.png', 1),
(119, NULL, 43, 79, NULL, NULL, 'uploads/heart2.jpg', 1),
(121, NULL, 45, 79, NULL, NULL, 'uploads/console.png', 1),
(123, NULL, 47, 79, NULL, NULL, 'uploads/heart1.jpg', 1),
(124, NULL, 48, 79, NULL, NULL, 'uploads/AVATAR.png', 1),
(126, NULL, 51, 79, NULL, NULL, 'uploads/heart2.jpg', 1),
(127, NULL, 52, 79, NULL, NULL, 'uploads/cart2.png', 1),
(128, NULL, NULL, 79, 53, NULL, 'uploads/heart2.jpg', 1),
(129, NULL, NULL, 79, 101, NULL, 'uploads/AVATAR.png', 1),
(130, NULL, NULL, 79, 102, NULL, 'uploads/heart2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_id_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_id_FK`) VALUES
(23, 79);

-- --------------------------------------------------------

--
-- Table structure for table `performed`
--

CREATE TABLE `performed` (
  `performed_id` int(11) NOT NULL,
  `test_code` varchar(25) NOT NULL,
  `product_id_FK` int(11) NOT NULL,
  `test_id_FK` int(11) NOT NULL,
  `user_id_FK` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performed`
--

INSERT INTO `performed` (`performed_id`, `test_code`, `product_id_FK`, `test_id_FK`, `user_id_FK`, `remarks`) VALUES
(14, '-0-87', 27, 87, 79, 'done...'),
(15, '-0-88', 31, 88, 79, 'dsasda'),
(16, '$test_code', 31, 88, 79, '$remarks'),
(17, 'Polarized 3300uF 25V Alum', 27, 87, 79, 'dsaas'),
(18, 'das dsa-1-99', 45, 99, 79, 'sdddsa');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `status_id_FK` int(11) NOT NULL DEFAULT 4,
  `component_id_FK` int(11) NOT NULL,
  `user_id_FK` int(11) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `status_id_FK`, `component_id_FK`, `user_id_FK`, `product_status`) VALUES
(27, 'Polarized 3300uF 25V Aluminum Electrolytic Capacit', 'px009', 4, 1, 79, 1),
(28, '20 Ohm 1W Metal Film Resistor 1%', 'or003', 2, 2, 79, 1),
(31, 'dsadsa', '', 3, 3, 79, 1),
(32, '$p_name', '$p_code', 2, 1, 79, 1),
(35, 'fds44', 'fd4-6g4', 4, 4, 79, 1),
(36, 'dsas2333', 'sdad', 3, 1, 79, 1),
(38, 'dsad344', 'sda we3', 4, 1, 79, 1),
(39, 'dsad s3', 'dsa dsd', 1, 1, 79, 1),
(40, '33wd', 'ds ad', 3, 1, 79, 1),
(42, 'dsa asde3r4', 'sd sd', 3, 1, 79, 1),
(43, 'ds ds dsa', ' dsd  s', 1, 1, 79, 1),
(45, 'das dsa', ' sd s ', 4, 1, 79, 1),
(47, ' sd asd', ' s d', 4, 1, 79, 1),
(48, ' ds sa', ' sda s', 6, 1, 79, 1),
(49, ' ds f', ' fdsfd', 3, 2, 79, 1),
(50, 'dsds da', ' sd', 4, 1, 79, 1),
(51, 'dsa sa3e3', 'ds ds', 6, 1, 79, 1),
(52, ' sad', 'd s33', 3, 2, 79, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(9, 'admin'),
(7, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(30) NOT NULL,
  `fontawesome_icon` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `fontawesome_icon`, `color`) VALUES
(1, 'successful', 'fa fa-check', '#2BC155'),
(2, 'fail', 'fa fa-exclamation-triangle', '#e91212f5'),
(3, 'processing', 'fa fa-redo', '#6418c3'),
(4, 'pending', 'fas fa-stream', '#FFAB2D'),
(6, 'on hold', 'fa fa-ban', '#DC3CCC');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `test_description`) VALUES
(86, 'physical', 'A physical test is a qualitative or quantitative procedure that consists of determination of one or more characteristics of a given product, process or service according to a specified procedure. Often this is part of an experiment. Physical testing is common in physics, engineering, and quality assurance.'),
(87, 'chemical', 'Chemical physicists commonly probe the structure and dynamics of ions, free radicals, polymers, clusters, and molecules. Areas of study include the quantum mechanical behavior of chemical reactions, the process of solvation, inter- and intra-molecular energy flow, and single entities such as quantum dots.'),
(88, 'asd', 'dsasa'),
(89, 'dsadsa', 'sad'),
(90, 'saa', 'sa'),
(91, 'dssdsd', 'dsasad'),
(92, 'cccc', 'ccc'),
(93, 'dsadsa33', 'dsadsa'),
(94, 'dsadsa3333', 'dsadsa'),
(95, 'dsasad', '345frdfd'),
(96, 'dasdsa', 'dsadsa'),
(97, 'dasadssad454', 'fdfdas'),
(98, 'dsa3456', 'dsasd'),
(99, 'dsa345', 'saddsad'),
(100, ' sda dsad ', 'ds d sa'),
(101, ' sdad sa', 'sdad'),
(102, ' sadd', 'asd s');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `user_education` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id_FK` int(11) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `creation_time` datetime NOT NULL,
  `flag_id_FK` int(11) NOT NULL DEFAULT 1,
  `salary` int(11) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `user_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `username`, `gender`, `user_education`, `user_email`, `user_contact`, `user_password`, `role_id_FK`, `user_address`, `creation_time`, `flag_id_FK`, `salary`, `user_bio`, `user_status`) VALUES
(71, 'abdullah javed', 'abdullah71', 'male', 'a levels', 'a.javed0202@gmail.com', '03229243965', '$2y$10$gjwQI7mW3/buxsMN6tw8lustBTwUM5uvijJ/17xpOreL/kw3wfEHO', 9, 'north nazimabad', '2022-11-24 20:26:37', 1, 9999999, 'No Intro Required', 'busy'),
(77, 'uzair khan', 'uzair77', 'male', 'matric', 'y@y.com', '2468975345', '$2y$10$4fpbDltvxeN4Piu07miCw.vV9olmTX4LZC.t.R3f2Da1tWSQWQFYG', 7, 'nazimabad', '0000-00-00 00:00:00', 1, 999999, NULL, ''),
(78, 'aleeza khan', 'aleeza78', 'female', 'matric', 'a@a.com', '1234567890', '$2y$10$cXbhafGmGfTvvGIk1nW//OcOhn0o7aN2CzZluf/YvIgnz5kXmennC', 9, 'north nazimabad', '0000-00-00 00:00:00', 1, 99999999, NULL, ''),
(79, 'rafay abbasif4', 'rafay79', 'male', 'matric', 'r@r.com', '1234567891', '$2y$10$gjwQI7mW3/buxsMN6tw8lustBTwUM5uvijJ/17xpOreL/kw3wfEHO', 9, '', '0000-00-00 00:00:00', 1, 999999999, 'Add Bio Y...', 'online123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `sender_id_FK` (`sender_id_FK`),
  ADD KEY `receiver_id_FK` (`receiver_id_FK`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`component_id`),
  ADD UNIQUE KEY `component_name` (`component_name`);

--
-- Indexes for table `flag`
--
ALTER TABLE `flag`
  ADD PRIMARY KEY (`flag_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `componenet_id_FK` (`component_id_FK`),
  ADD KEY `product_id_FK` (`product_id_FK`),
  ADD KEY `user_id_FK` (`user_id_FK`),
  ADD KEY `user_profile` (`user_profile`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_id_FK` (`user_id_FK`);

--
-- Indexes for table `performed`
--
ALTER TABLE `performed`
  ADD PRIMARY KEY (`performed_id`),
  ADD KEY `product_id_FK` (`product_id_FK`),
  ADD KEY `test_id_FK` (`test_id_FK`),
  ADD KEY `user_id_FK` (`user_id_FK`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `component_id_FK` (`component_id_FK`),
  ADD KEY `status_id_FK` (`status_id_FK`),
  ADD KEY `user_id_FK` (`user_id_FK`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_name` (`room_name`) USING HASH;

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_name` (`status_name`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD UNIQUE KEY `test_name` (`test_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`,`user_contact`,`user_address`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `gender_id_FK` (`gender`),
  ADD KEY `role_id_FK` (`role_id_FK`),
  ADD KEY `flag_id_FK` (`flag_id_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `flag`
--
ALTER TABLE `flag`
  MODIFY `flag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `performed`
--
ALTER TABLE `performed`
  MODIFY `performed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`sender_id_FK`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`receiver_id_FK`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`component_id_FK`) REFERENCES `component` (`component_id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`product_id_FK`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`user_id_FK`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `image_ibfk_4` FOREIGN KEY (`user_profile`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id_FK`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `performed`
--
ALTER TABLE `performed`
  ADD CONSTRAINT `performed_ibfk_1` FOREIGN KEY (`product_id_FK`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `performed_ibfk_2` FOREIGN KEY (`test_id_FK`) REFERENCES `test` (`test_id`),
  ADD CONSTRAINT `performed_ibfk_3` FOREIGN KEY (`user_id_FK`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`component_id_FK`) REFERENCES `component` (`component_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`status_id_FK`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`user_id_FK`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id_FK`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`flag_id_FK`) REFERENCES `flag` (`flag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
