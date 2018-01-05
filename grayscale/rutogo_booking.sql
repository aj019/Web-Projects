-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2015 at 09:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rutogo_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rentals`
--

CREATE TABLE IF NOT EXISTS `hourly_rentals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pickup_location` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `departure_datetime` varchar(50) NOT NULL,
  `car` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outstations`
--

CREATE TABLE IF NOT EXISTS `outstations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pickup_location` varchar(200) NOT NULL,
  `drop_location` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `departure_datetime` varchar(50) NOT NULL,
  `return_datetime` varchar(50) NOT NULL,
  `car` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
