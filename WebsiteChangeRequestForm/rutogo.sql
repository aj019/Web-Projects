-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2015 at 10:24 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rutogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `fare_details`
--

CREATE TABLE IF NOT EXISTS `fare_details` (
  `invoice_no` varchar(20) NOT NULL,
  `billed_km` float NOT NULL,
  `fare_per_km` float NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `da` float NOT NULL,
  `fare` float NOT NULL,
  `package_type` varchar(50) NOT NULL,
  `package_rate` float NOT NULL,
  `extra_km_charges` float NOT NULL,
  `extra_hour_charges` float NOT NULL,
  `driver_night_charges` float NOT NULL,
  `discount` float NOT NULL,
  `misc_1` varchar(50) NOT NULL,
  `misc_value_1` varchar(20) NOT NULL,
  `misc_2` varchar(50) NOT NULL,
  `misc_value_2` varchar(20) NOT NULL,
  `tdr` float NOT NULL,
  `total_fare` float NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `pickup_location` varchar(50) NOT NULL,
  `pickup_date` date NOT NULL,
  `drop_location` varchar(50) NOT NULL,
  `drop_date` date NOT NULL,
  `car_name` varchar(20) NOT NULL,
  `operator_details` varchar(50) NOT NULL,
  `car_type` varchar(20) NOT NULL,
  `trip_type` varchar(20) NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
