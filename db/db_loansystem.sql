-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2016 at 06:06 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_loansystem`
--
CREATE DATABASE IF NOT EXISTS `db_loansystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_loansystem`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan`
--

DROP TABLE IF EXISTS `tbl_loan`;
CREATE TABLE IF NOT EXISTS `tbl_loan` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(15) NOT NULL,
  `member_id` int(11) NOT NULL,
  `loan_amount` decimal(20,2) NOT NULL,
  `interest_rate` int(3) NOT NULL,
  `interest` decimal(20,2) NOT NULL,
  `credit_term` int(11) NOT NULL,
  `credit_termleft` int(11) NOT NULL,
  `first_payment` date NOT NULL,
  `last_payment` date NOT NULL,
  `monthly_payment` decimal(20,2) NOT NULL,
  `balance` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loan`
--

INSERT INTO `tbl_loan` (`id`, `loan_id`, `member_id`, `loan_amount`, `interest_rate`, `interest`, `credit_term`, `credit_termleft`, `first_payment`, `last_payment`, `monthly_payment`, `balance`) VALUES
(1, 'e2cae752e1', 6, '30000.00', 12, '3600.00', 3, 0, '2016-05-25', '2016-05-25', '11200.00', '0.00'),
(2, '5a196b7944', 14, '1200.00', 10, '120.00', 3, 2, '2016-04-26', '2016-05-26', '440.00', '880.00'),
(3, '67183b5904', 14, '100000.00', 10, '10000.00', 6, 5, '2016-04-26', '2016-08-26', '18333.33', '91666.67'),
(4, 'd67f32d63a', 15, '1000.00', 10, '100.00', 1, 0, '2016-03-27', '2016-03-27', '1100.00', '0.00'),
(5, '45f527546f', 15, '1000.00', 10, '100.00', 2, 0, '2016-04-27', '2016-04-27', '550.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

DROP TABLE IF EXISTS `tbl_members`;
CREATE TABLE IF NOT EXISTS `tbl_members` (
  `member_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(100) NOT NULL,
  `education` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `refname` varchar(50) NOT NULL,
  `refcontact` varchar(50) NOT NULL,
  `homeno` varchar(30) NOT NULL,
  `officeno` varchar(30) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `compname` varchar(50) NOT NULL,
  `compaddress` varchar(100) NOT NULL,
  `salary` decimal(20,2) NOT NULL,
  `member_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`member_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `address`, `education`, `occupation`, `refname`, `refcontact`, `homeno`, `officeno`, `mobileno`, `email`, `compname`, `compaddress`, `salary`, `member_added`, `status`) VALUES
(6, 'Jonathan Jay', 'Alfar', 'Mayol', '1997-03-08', 'Male', '891 H. Abellana St. Canduman Mandaue City,Cebu PH', 'College', 'Student', '', '', '', '', '09428664035', 'mayoljonathan@rocketmail.com', '', '', '0.00', '2016-02-25 13:49:59', '1'),
(10, 'Stella Marez', 'Alipoyo', 'Garciso', '1996-04-09', 'Female', 'Dapdap, Catarman Liloan , Cebu', 'College', 'Student', 'Jonathan Jay Mayol', '09428664035', '', '', '09104235170', 'garciso_marez@yahoo.com', 'AMA Computer Learning Center', 'Northpoint Business Center, Highway Mandaue City', '0.00', '2016-02-25 07:45:40', '1'),
(11, 'Be ', 'Like', 'mill', '2016-02-04', 'Female', '', '', '', '', '', '', '', '09428181', '', '', '', '0.00', '2016-02-25 11:38:55', '1'),
(12, 'Sam', 'Mill', 'By', '2016-02-04', 'Male', '7216 Zone 4 , TBC', 'High School', 'Production Worker', '', '', '', '', '091237127317', 'mall@hahaha.com', 'MEPZA', 'Lapu-lapu city', '0.00', '2016-02-25 07:46:04', '1'),
(13, 'gwapa', 'c ', 'marez', '2016-02-22', 'Female', 'imong heaart pero joke rato', 'g', 'tambay', 'what?', 'h', '063416456', '6565', '143', 'watever@yahoo.com', 'somewer', 'sa imong heart', '0.00', '2016-02-25 11:38:57', '1'),
(14, 'Jimmy', 'Mel', 'Neutron', '1994-06-16', 'Male', '8921 Calamba, Laguna', 'College', 'FBI', 'what?', '', '(032)416-0725', '6565', '09104235170', 'jam@yahoo.com', 'Pingpong Industry', 'Southroad Business Center, Laguna', '8000.00', '2016-02-25 12:04:28', '1'),
(15, 'hahah', 'jk', 'hahah', '2016-02-04', 'Male', 'WAD', 'WAD', 'WDWA', 'Jonathan Jay Mayol', '', '10293', '0123', '10293', 'awd@awd.com', 'ADW', 'WDA', '0.00', '2016-02-27 04:58:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

DROP TABLE IF EXISTS `tbl_reports`;
CREATE TABLE IF NOT EXISTS `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `transactiondate` varchar(30) NOT NULL,
  `loan_id` varchar(15) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `transactiondate`, `loan_id`, `msg`, `user`) VALUES
(1, '2016-02-25 10:50:14 PM', 'e2cae752e1', ' Member : <font color=black><strong>Jonathan Jay Alfar Mayol</strong></font> applied for a loan of <font color=black><strong>â‚±30000</strong></font> with an interest rate of <font color=black><strong>12%</strong></font>.', 'Jonathan Mayol'),
(2, '2016-02-25 10:50:17 PM', 'e2cae752e1', ' Member : <font color=black><strong>Jonathan Jay Alfar Mayol</strong></font> paid a monthly payment of <font color=black><strong>â‚±11200.00</strong></font> for the <font color=black><strong>2016-03-25</strong></font>. <br>(Terms Left : 2 | Balance : â‚±22400)', 'Jonathan Mayol'),
(3, '2016-02-25 10:50:18 PM', 'e2cae752e1', ' Member : <font color=black><strong>Jonathan Jay Alfar Mayol</strong></font> paid a monthly payment of <font color=black><strong>â‚±11200.00</strong></font> for the <font color=black><strong>2016-04-25</strong></font>. <br>(Terms Left : 1 | Balance : â‚±11200)', 'Jonathan Mayol'),
(4, '2016-02-25 10:50:19 PM', 'e2cae752e1', ' Member : <font color=black><strong>Jonathan Jay Alfar Mayol</strong></font> paid a monthly payment of <font color=black><strong>â‚±11200.00</strong></font> for the <font color=black><strong>2016-05-25</font></strong>. <br>(Terms Left : 0 | Balance : â‚±0) <br><font color=green><strong>FULLY PAID!</strong></font>', 'Jonathan Mayol'),
(5, '2016-02-26 12:23:48 AM', '5a196b7944', ' Member : <font color=black><strong>Jimmy Mel Neutron</strong></font> applied for a loan of <font color=black><strong>â‚±1200</strong></font> with an interest rate of <font color=black><strong>10%</strong></font>.', 'Jonathan Mayol'),
(6, '2016-02-26 12:24:34 AM', '5a196b7944', ' Member : <font color=black><strong>Jimmy Mel Neutron</strong></font> paid a monthly payment of <font color=black><strong>â‚±440.00</strong></font> for the <font color=black><strong>2016-03-26</strong></font>. <br>(Terms Left : 2 | Balance : â‚±880)', 'Jonathan Mayol'),
(7, '2016-02-26 09:45:58 PM', '67183b5904', ' Member : <font color=black><strong>Jimmy Mel Neutron</strong></font> applied for a loan of <font color=black><strong>â‚±100000</strong></font> with an interest rate of <font color=black><strong>10%</strong></font>.', 'Jonathan Mayol'),
(8, '2016-02-26 09:47:31 PM', '67183b5904', ' Member : <font color=black><strong>Jimmy Mel Neutron</strong></font> paid a monthly payment of <font color=black><strong>â‚±18333.33</strong></font> for the <font color=black><strong>2016-03-26</strong></font>. <br>(Terms Left : 5 | Balance : â‚±91666.67)', 'Jonathan Mayol'),
(9, '2016-02-27 12:59:08 PM', 'd67f32d63a', ' Member : <font color=black><strong>hahah jk hahah</strong></font> applied for a loan of <font color=black><strong>â‚±1000</strong></font> with an interest rate of <font color=black><strong>10%</strong></font>.', 'Jonathan Mayol'),
(10, '2016-02-27 12:59:41 PM', 'd67f32d63a', ' Member : <font color=black><strong>hahah jk hahah</strong></font> paid a monthly payment of <font color=black><strong>â‚±1100.00</strong></font> for the <font color=black><strong>2016-03-27</font></strong>. <br>(Terms Left : 0 | Balance : â‚±0) <br><font color=green><strong>FULLY PAID!</strong></font>', 'Jonathan Mayol'),
(11, '2016-02-27 01:00:01 PM', '45f527546f', ' Member : <font color=black><strong>hahah jk hahah</strong></font> applied for a loan of <font color=black><strong>â‚±1000</strong></font> with an interest rate of <font color=black><strong>10%</strong></font>.', 'Jonathan Mayol'),
(12, '2016-02-27 01:00:11 PM', '45f527546f', ' Member : <font color=black><strong>hahah jk hahah</strong></font> paid a monthly payment of <font color=black><strong>â‚±550.00</strong></font> for the <font color=black><strong>2016-03-27</strong></font>. <br>(Terms Left : 1 | Balance : â‚±550)', 'Jonathan Mayol'),
(13, '2016-02-27 01:00:16 PM', '45f527546f', ' Member : <font color=black><strong>hahah jk hahah</strong></font> paid a monthly payment of <font color=black><strong>â‚±550.00</strong></font> for the <font color=black><strong>2016-04-27</font></strong>. <br>(Terms Left : 0 | Balance : â‚±0) <br><font color=green><strong>FULLY PAID!</strong></font>', 'Jonathan Mayol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `usertype` enum('Admin','Staff') NOT NULL,
  `user_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `email`, `contact`, `status`, `usertype`, `user_added`) VALUES
(1, 'admin', 'admin', 'Jonathan', 'Mayol', 'Male', 'jam@yahoo.com', '09428664035  ', '1', 'Admin', '2016-01-15 05:11:16'),
(2, 'staff', 'staff', 'Meng', 'Ming', 'Female', 'awdwa@awd.com', '09123817232 ', '1', 'Staff', '2016-01-22 11:25:37'),
(5, 'test', 'test', 'Test', 'Me', 'Female', 'awd@awd.com', '094812731     ', '1', 'Staff', '2016-02-22 19:41:55'),
(6, 'jam', 'jam', 'Be Like', 'Bill', 'Male', 'awdaw@awd.com', '213123 ', '1', 'Admin', '2016-02-23 14:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `loan_id` (`loan_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
