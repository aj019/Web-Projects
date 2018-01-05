-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2017 at 12:53 AM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `androidmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `topics_formulas`
--

CREATE TABLE IF NOT EXISTS `topics_formulas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `topic_id` int(255) NOT NULL,
  `formula_id` int(255) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `topics_formulas`
--

INSERT INTO `topics_formulas` (`id`, `topic_id`, `formula_id`, `status`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 2, 4, 0),
(5, 3, 5, 0),
(6, 3, 6, 0),
(7, 4, 7, 0),
(8, 5, 8, 0),
(9, 5, 9, 0),
(10, 5, 10, 0),
(11, 5, 11, 0),
(12, 6, 12, 0),
(13, 7, 13, 0),
(14, 8, 14, 0),
(15, 8, 15, 0),
(16, 8, 16, 0),
(17, 9, 17, 0),
(22, 10, 20, 0),
(23, 10, 21, 0),
(30, 11, 22, 0),
(31, 11, 23, 0),
(32, 12, 24, 0),
(33, 12, 25, 0),
(34, 12, 26, 0),
(42, 19, 27, 0),
(43, 19, 28, 0),
(44, 19, 29, 0),
(45, 20, 15, 0),
(46, 20, 16, 0),
(47, 21, 15, 0),
(48, 21, 16, 0),
(49, 21, 30, 0),
(50, 21, 31, 0),
(51, 21, 20, 0),
(52, 21, 21, 0),
(53, 21, 22, 0),
(54, 22, 32, 0),
(55, 22, 33, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
