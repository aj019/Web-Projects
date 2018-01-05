-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2017 at 12:52 AM
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
-- Table structure for table `formula_topics`
--

CREATE TABLE IF NOT EXISTS `formula_topics` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `formula_topics`
--

INSERT INTO `formula_topics` (`id`, `name`, `status`) VALUES
(1, 'Mean ', 0),
(2, 'Percentage Change ', 0),
(3, 'Interest', 0),
(4, 'Averages ', 0),
(5, 'Profit and Loss', 0),
(6, 'Time, Speed and Distance ', 0),
(7, 'Time and Work ', 0),
(8, 'Properties of Surds', 0),
(9, 'H.C.F. and L.C.M. of Fractions ', 0),
(10, 'Laws of Logarithms', 0),
(11, 'Algebraic Formulae', 0),
(12, 'Probability ', 0),
(22, 'Pythagoras Theorem', 0),
(21, 'Laws of Indices ', 0),
(20, 'Factorial ', 0),
(19, 'Sum of Important Series ', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
