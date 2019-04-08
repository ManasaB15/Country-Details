-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2019 at 11:30 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `country_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `official_language` varchar(255) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `calling_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `capital`, `official_language`, `currency`, `calling_code`) VALUES
(1, 'India', 'IN', 'New Delhi', 'Hindi', 'Indian Rupee', '+91'),
(2, 'Sri Lanka', 'LK', 'Sri Jayawerdenepura Kotte', 'Sinhala', 'Srilankan Rupee', '+94'),
(4, 'Bangladesh', 'BD', 'Dhaka', 'Bengali', 'Taka', '+880'),
(7, 'Pakistan', 'PK', 'Islamabad', 'Urdu', 'Pakistani Rupee', '+92'),
(8, 'United States', 'US', 'Washington D. C.', 'English', 'United States Dollar', '+1');

-- --------------------------------------------------------

--
-- Table structure for table `country_state`
--

CREATE TABLE `country_state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_state`
--

INSERT INTO `country_state` (`state_id`, `country_id`) VALUES
(1, 4),
(16, 1),
(18, 1),
(24, 1),
(25, 1),
(63, 1),
(64, 1),
(65, 1),
(67, 1),
(68, 8),
(69, 1),
(70, 2),
(71, 7),
(72, 7);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `district_code` varchar(100) NOT NULL,
  `population` int(11) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `district_code`, `population`, `area`) VALUES
(23, 'Mumbai City', '66', 3534, 345345),
(24, 'Bhola', '345', 345346, 3554),
(25, 'Kolkatta', '35', 34535, 3454),
(26, 'Kashi', '34', 34, 345),
(40, 'Ayodhya', '36', 657, 6789),
(42, 'Anniston', 'AL', 788934, 1586),
(43, 'Mannar', 'LK-43', 678, 1098),
(44, 'Mullaitivu', 'LK-45', 68, 2617),
(45, 'Rajghar', '44', 4545, 5656),
(46, 'Awaran', 'AW', 121680, 12510),
(47, 'Barkhan', 'BR', 171556, 3514);

-- --------------------------------------------------------

--
-- Table structure for table `dist_state_count`
--

CREATE TABLE `dist_state_count` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dist_state_count`
--

INSERT INTO `dist_state_count` (`district_id`, `state_id`, `country_id`) VALUES
(23, 69, 1),
(24, 1, 4),
(25, 16, 1),
(26, 25, 1),
(40, 25, 1),
(42, 68, 8),
(43, 70, 2),
(44, 70, 2),
(45, 18, 1),
(46, 71, 7),
(47, 71, 7);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `capital_city` varchar(255) NOT NULL,
  `state_code` varchar(100) NOT NULL,
  `official_language` varchar(100) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `capital_city`, `state_code`, `official_language`, `area`) VALUES
(1, 'Dhaka', 'Dhaka', 'DK', 'Bengali', 123654),
(16, 'West Bengal', 'Kolkata', 'WB', 'Bengali', 88752),
(18, 'Madhya Pradesh', 'Bhopal', 'MP', 'Hindi', 308252),
(24, 'Delhi', 'New Delhi', 'DL', 'Hindi', 1484),
(25, 'Uttara Pradesh', 'Lucknow', 'UP', 'Hindi', 243290),
(63, 'Assam', 'Dispur', 'AS', 'Assamese', 78438),
(64, 'Manipur', 'Imphal', 'MN', 'Meitei', 22327),
(65, 'Rajasthan', 'Jaipur', 'RJ', 'Hindi', 342239),
(67, 'Gujarat', 'Gandhinagar', 'GJ', 'Gujrathi', 196024),
(68, 'Alabama', 'Montgomery', 'AL', 'English', 135765),
(69, 'Maharastra', 'Mumbai', 'MH', 'Marathi', 307713),
(70, 'Northern', 'Jaffna', 'LK-41', 'Tamil', 8290),
(71, 'Balochistan', 'Quetta', 'BL', 'Urdu', 347190),
(72, 'Khyber Pakhtunkhwa', 'Peshawar', 'KP', 'Urdu', 101741);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`) VALUES
(1, 'manasa.b@fortunesoftit.com', 'manasa15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `country_state`
--
ALTER TABLE `country_state`
  ADD KEY `state_id` (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `dist_state_count`
--
ALTER TABLE `dist_state_count`
  ADD KEY `district_id` (`district_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country_state`
--
ALTER TABLE `country_state`
  ADD CONSTRAINT `country_state_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `country_state_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE;

--
-- Constraints for table `dist_state_count`
--
ALTER TABLE `dist_state_count`
  ADD CONSTRAINT `dist_state_count_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dist_state_count_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dist_state_count_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
