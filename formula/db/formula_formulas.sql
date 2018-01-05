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
-- Table structure for table `formula_formulas`
--

CREATE TABLE IF NOT EXISTS `formula_formulas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `formula` varchar(1000) NOT NULL,
  `explanation` varchar(10000) NOT NULL,
  `mnuemonics` varchar(10000) NOT NULL,
  `lhs` varchar(1000) NOT NULL,
  `rhs` varchar(1000) NOT NULL,
  `video` varchar(1000) NOT NULL DEFAULT 'null',
  `remark` varchar(1000) NOT NULL DEFAULT 'null',
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `formula_formulas`
--

INSERT INTO `formula_formulas` (`id`, `name`, `formula`, `explanation`, `mnuemonics`, `lhs`, `rhs`, `video`, `remark`, `status`) VALUES
(1, 'Arithmetic Mean ', 'http://androidmate.in/formula/images/147776052210.jpeg', '', '', '', '', '', 'The average of a set of numerical values, as calculated by adding them together and dividing by the number of terms in the set.', 0),
(2, 'Harmonic Mean', 'http://androidmate.in/formula/images/147789193110.jpeg', '', '', '', '', '', 'The harmonic mean is expressed as the reciprocal of the arithmetic mean of the reciprocals. ', 0),
(3, 'Geometric Mean ', 'http://androidmate.in/formula/images/147794171310.jpeg', '', '', '', '', '', 'The geometric mean is defined as the nth root of the product of n numbers', 0),
(4, 'Percentage Change ', 'http://androidmate.in/formula/images/147797578910.jpeg', '', '', '', '', '', 'null', 0),
(5, 'Simple Interest ', 'http://androidmate.in/formula/images/147798765410.jpeg', '', '', '', '', '', 'Simple interest is determined by multiplying the daily interest rate by the principal by the number of days that elapse between payments.', 0),
(6, 'Amount', 'http://androidmate.in/formula/images/147799835910.jpeg', '', '', '', '', '', 'null', 0),
(7, 'Simple Average ', 'http://androidmate.in/formula/images/147799916810.jpeg', '', '', '', '', '', 'null', 0),
(8, 'Profit', 'http://androidmate.in/formula/images/147801852010.jpeg', '', '', '', '', '', 'null', 0),
(9, 'Percentage Profit ', 'http://androidmate.in/formula/images/147801926210.jpeg', '', '', '', '', '', 'null', 0),
(10, 'Loss', 'http://androidmate.in/formula/images/147802011410.jpeg', '', '', '', '', '', 'null', 0),
(11, 'Percentage Loss ', 'http://androidmate.in/formula/images/147802159410.jpeg', '', '', '', '', '', 'null', 0),
(12, 'Speed', 'http://androidmate.in/formula/images/147802355310.jpeg', '', '', '', '', '', 'Speed is distance traveled per unit of time.', 0),
(13, 'Number of days to complete the work ', 'http://androidmate.in/formula/images/147802785710.jpeg', '', '', '', '', '', 'null', 0),
(14, '', 'http://androidmate.in/formula/images/147817888310.png', '', '', '', '', '', 'null', 0),
(15, '1', 'http://androidmate.in/formula/images/147819007610.png', '', '', '', '', '', 'null', 0),
(16, '2', 'http://androidmate.in/formula/images/147819064610.png', '', '', '', '', '', 'null', 0),
(17, 'H.C.F. of fractions ', 'http://androidmate.in/formula/images/147823290510.png', '', '', '', '', '', 'null', 0),
(24, 'Probability of an event ', 'http://androidmate.in/formula/images/147833943510.png', '', '', '', '', '', 'Probability is a branch of mathematics that deals with calculating the likelihood of a given event''s occurrence, which is expressed as a number between 1 and 0. ', 0),
(23, '8', 'http://androidmate.in/formula/images/147833824010.png', '', '', '', '', '', 'null', 0),
(20, '5', 'http://androidmate.in/formula/images/147823578810.png', '', '', '', '', '', 'null', 0),
(21, '6', 'http://androidmate.in/formula/images/147825193710.png', '', '', '', '', '', 'null', 0),
(22, '7', 'http://androidmate.in/formula/images/147833506510.png', '', '', '', '', '', 'null', 0),
(25, 'Odds in favour', 'http://androidmate.in/formula/images/147833990810.png', '', '', '', '', '', 'Odds in probability of a particular event, means the ratio between the number of favorable outcomes to the number of unfavorable outcomes.', 0),
(26, 'Odds against ', 'http://androidmate.in/formula/images/147834036110.png', '', '', '', '', '', 'null', 0),
(27, 'Sum of first n natural numbers ', 'http://androidmate.in/formula/images/147901736310.png', '', '', '', '', '', 'null', 0),
(28, 'Sum of the squares of the first n natural numbers ', 'http://androidmate.in/formula/images/147903460210.png', '', '', '', '', '', 'null', 0),
(29, 'Sum of the cubes of the first n natural numbers ', 'http://androidmate.in/formula/images/147909761410.png', '', '', '', '', '', 'null', 0),
(30, '3', 'http://androidmate.in/formula/images/148004814010.png', '', '', '', '', '', 'null', 0),
(31, '4', 'http://androidmate.in/formula/images/148005021110.png', '', '', '', '', '', 'null', 0),
(32, 'Pythagoras Theorem for Right Triangle ', 'http://androidmate.in/formula/images/148042871910.png', '', '', '', '', '', 'null', 0),
(33, 'Theorem for Acute Triangle', 'http://androidmate.in/formula/images/148042927010.png', '', '', '', '', '', 'null', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
