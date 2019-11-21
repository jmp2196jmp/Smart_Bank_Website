-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 10:16 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_onlinebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `enquiry` varchar(50) NOT NULL,
  `description` varchar(220) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'not checked',
  PRIMARY KEY (`enq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enq_id`, `name`, `contact_no`, `email_id`, `enquiry`, `description`, `date_time`, `status`) VALUES
(1, 'Faheem', 9856576767, 'faheem@gmail.com', 'nothing', 'nothing', '2016-04-25 07:31:00', 'not checked'),
(2, 'Juan', 9856577777, 'juan@gmail.com', 'nothing1', 'nothing1', '2016-04-25 07:31:20', 'not checked');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` bigint(20) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `loan_for` varchar(100) NOT NULL,
  `loan_amount` bigint(20) NOT NULL,
  `max_years` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not sanctioned',
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `account_no`, `applicant_name`, `father_name`, `loan_for`, `loan_amount`, `max_years`, `status`) VALUES
(1, 1317065708, 'Ajin C S', 'C S', 'home', 200000, '5', 'not sanctioned');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE IF NOT EXISTS `tbl_accounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` double NOT NULL,
  `pin` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `user_id`, `acc_no`, `type`, `balance`, `pin`, `status`, `bdate`) VALUES
(1, 1, '1317065708', 'SA', 1000, 1234, 'ACTIVE', '2016-04-24 16:42:56'),
(2, 2, '1295190053', 'SA', 25000, 1234, 'ACTIVE', '2016-04-24 16:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `user_id`, `address`, `city`, `state`, `zipcode`, `country`) VALUES
(1, 1, 'Kottayam', 'Kottayam', 'Kerala', 686745, 'India'),
(2, 2, 'Pta', 'Pta', 'Kerala', 686937, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tx_no` varchar(20) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `to_accno` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tdate` varchar(40) NOT NULL,
  `comments` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `tx_no`, `tx_type`, `amount`, `date`, `description`, `to_accno`, `status`, `tdate`, `comments`) VALUES
(1, 'TX1', 'credit', 20000, '2016-04-25 11:36:49', 'Fund transfer of Rs. 20000 to Account 1295190053 Reference# TX1', '1295190053', 'SUCCESS', '04-25-2016', 'nothing'),
(2, 'TX2', 'credit', 10000, '2016-04-25 11:37:34', 'Fund transfer of Rs. 10000 to Account 1317065708 Reference# TX2', '1317065708', 'SUCCESS', '04-25-2016', 'nothing'),
(3, 'TX3', 'credit', 5000, '2016-04-25 11:39:25', 'Fund transfer of Rs.5000 from Account 1317065708 Reference# TX3', '1295190053', 'SUCCESS', '04-25-2016', 'Nothing'),
(4, 'TX3', 'debit', 5000, '2016-04-25 11:39:25', 'Fund transfer of Rs.5000 to Account 1295190053 Reference# TX3', '1317065708', 'SUCCESS', '04-25-2016', 'Nothing'),
(5, 'TX4', 'debit', 2000, '2016-04-26 13:33:54', 'Fund transfer of Rs.2000 for Bill Payment Reference# TX4', '1317065708', 'SUCCESS', '04-26-2016', 'Bill Payment'),
(6, 'TX5', 'debit', 2000, '2016-04-26 13:40:18', 'Fund transfer of Rs.2000 for Tax Payment Reference# TX5', '1317065708', 'SUCCESS', '04-26-2016', 'Tax Payment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `lname`, `pwd`, `email`, `phone`, `gender`, `is_active`, `utype`, `pics`, `bdate`) VALUES
(1, 'Ajin', 'C S', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'ajin@gmail.com', '9944334433', 'Male', 'TRUE', 'USER', 'c29ae32bafb628fa713b728a6c32b1e4.png', '2016-04-24 16:42:56'),
(2, 'Aby', 'Jose', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'aby@gmail.com', '9934217898', 'Male', 'TRUE', 'USER', 'fa829255e9e9bb6acad2372a35598b1d.png', '2016-04-24 16:46:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
