-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 03:54 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phppot_examples`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipaddress_vote_map`
--

CREATE TABLE IF NOT EXISTS `ipaddress_vote_map` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `link_id` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote_rank` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `ipaddress_vote_map`
--

INSERT INTO `ipaddress_vote_map` (`id`, `link_id`, `user_id`, `vote_rank`) VALUES
(31, 1, 10, 1),
(32, 1, 10, -1),
(33, 1, 10, 1),
(34, 1, 10, -1),
(35, 1, 10, -1),
(36, 1, 10, 1),
(37, 1, 10, 1),
(38, 1, 10, -1),
(39, 1, 10, -1),
(40, 1, 10, 1),
(41, 1, 10, 1),
(42, 1, 10, -1),
(43, 1, 10, -1),
(44, 1, 10, 1),
(45, 1, 10, 1),
(46, 1, 10, -1),
(47, 1, 10, -1),
(48, 1, 10, 1),
(49, 1, 10, 1),
(50, 2, 10, 1),
(51, 3, 10, 1),
(52, 1, 10, -1),
(53, 1, 10, 1),
(54, 1, 10, -1),
(55, 1, 10, -1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `votes` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `votes`) VALUES
(1, 'Article 1', 18),
(2, 'Article 2', 1),
(3, 'Article 3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
