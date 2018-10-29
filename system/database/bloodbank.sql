-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2018 at 12:12 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodinfo`
--

DROP TABLE IF EXISTS `bloodinfo`;
CREATE TABLE IF NOT EXISTS `bloodinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `hospital_name` text NOT NULL,
  `samples` text NOT NULL,
  `type` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodinfo`
--

INSERT INTO `bloodinfo` (`id`, `userId`, `hospital_name`, `samples`, `type`, `quantity`, `created_date`) VALUES
(1, 2, 'Fortis', 'Lipids', 'Serum', 4, '2018-10-20 12:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `requestsamples`
--

DROP TABLE IF EXISTS `requestsamples`;
CREATE TABLE IF NOT EXISTS `requestsamples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`mobile`,`quantity`,`description`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestsamples`
--

INSERT INTO `requestsamples` (`id`, `name`, `address`, `email`, `mobile`, `bloodgroup`, `quantity`, `description`, `created_date`) VALUES
(1, 'Aakash Sabharwal', 'Janakpuri', 'skysabharwal@gmail.com', '8800704578', 'B+', 3, 'Lipids', '2018-10-20 12:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `address` text NOT NULL,
  `bloodgroup` varchar(255) DEFAULT 'Hospital',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `address`, `bloodgroup`, `email`, `mobile`, `password`, `active`, `created_date`) VALUES
(1, 1, 'Aakash Sabharwal', 'Janakpuri', 'B+', 'skysabharwal@gmail.com', '8800704578', 'admin', 1, '2018-10-20 12:00:08'),
(2, 0, 'Fortis', 'Gurgaon', 'Hospital', 'fortis@gmail.com', '9999999999', 'fortis', 1, '2018-10-20 12:00:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
