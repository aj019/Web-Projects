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
-- Table structure for table `formula_questions`
--

CREATE TABLE IF NOT EXISTS `formula_questions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `explanation` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `formula_questions`
--

INSERT INTO `formula_questions` (`id`, `question`, `answer`, `explanation`, `status`) VALUES
(1, 'http://androidmate.in/formula/images/147776055310.jpeg', 'http://androidmate.in/formula/images/147776055311.jpeg', '', 0),
(2, 'http://androidmate.in/formula/images/147776058110.jpeg', 'http://androidmate.in/formula/images/147776058111.jpeg', '', 0),
(3, 'http://androidmate.in/formula/images/147789198510.jpeg', 'http://androidmate.in/formula/images/147789198511.jpeg', '', 0),
(4, 'http://androidmate.in/formula/images/147789204110.jpeg', 'http://androidmate.in/formula/images/147789204111.jpeg', '', 0),
(5, '', '', '', 0),
(6, 'http://androidmate.in/formula/images/147794224310.jpeg', 'http://androidmate.in/formula/images/147794224311.jpeg', '', 0),
(7, 'http://androidmate.in/formula/images/147794226410.jpeg', 'http://androidmate.in/formula/images/147794226411.jpeg', '', 0),
(8, 'http://androidmate.in/formula/images/147797583410.jpeg', 'http://androidmate.in/formula/images/147797583411.jpeg', '', 0),
(9, 'http://androidmate.in/formula/images/147797592010.jpeg', 'http://androidmate.in/formula/images/147797592011.jpeg', '', 0),
(10, 'http://androidmate.in/formula/images/147797595410.jpeg', 'http://androidmate.in/formula/images/147797595411.jpeg', '', 0),
(11, 'http://androidmate.in/formula/images/147798769710.jpeg', 'http://androidmate.in/formula/images/147798769711.jpeg', '', 0),
(12, 'http://androidmate.in/formula/images/147798773610.jpeg', 'http://androidmate.in/formula/images/147798773611.jpeg', '', 0),
(13, 'http://androidmate.in/formula/images/147798777410.jpeg', 'http://androidmate.in/formula/images/147798777411.jpeg', '', 0),
(14, 'http://androidmate.in/formula/images/147799840410.jpeg', 'http://androidmate.in/formula/images/147799840411.jpeg', '', 0),
(15, 'http://androidmate.in/formula/images/147799844710.jpeg', 'http://androidmate.in/formula/images/147799844711.jpeg', '', 0),
(16, 'http://androidmate.in/formula/images/147799923910.jpeg', 'http://androidmate.in/formula/images/147799923911.jpeg', '', 0),
(17, 'http://androidmate.in/formula/images/147799926710.jpeg', 'http://androidmate.in/formula/images/147799926711.jpeg', '', 0),
(18, 'http://androidmate.in/formula/images/147801856410.jpeg', 'http://androidmate.in/formula/images/147801856411.jpeg', '', 0),
(19, 'http://androidmate.in/formula/images/147801859210.jpeg', 'http://androidmate.in/formula/images/147801859211.jpeg', '', 0),
(20, 'http://androidmate.in/formula/images/147801866810.jpeg', 'http://androidmate.in/formula/images/147801866811.jpeg', '', 0),
(21, 'http://androidmate.in/formula/images/147801933610.jpeg', 'http://androidmate.in/formula/images/147801933611.jpeg', '', 0),
(22, 'http://androidmate.in/formula/images/147801938810.jpeg', 'http://androidmate.in/formula/images/147801938811.jpeg', '', 0),
(23, 'http://androidmate.in/formula/images/147802030310.jpeg', 'http://androidmate.in/formula/images/147802030311.jpeg', '', 0),
(24, 'http://androidmate.in/formula/images/147802033910.jpeg', 'http://androidmate.in/formula/images/147802033911.jpeg', '', 0),
(25, 'http://androidmate.in/formula/images/147802040310.jpeg', 'http://androidmate.in/formula/images/147802040311.jpeg', '', 0),
(26, 'http://androidmate.in/formula/images/147802164910.jpeg', 'http://androidmate.in/formula/images/147802164911.jpeg', '', 0),
(27, 'http://androidmate.in/formula/images/147802167510.jpeg', 'http://androidmate.in/formula/images/147802167511.jpeg', '', 0),
(28, 'http://androidmate.in/formula/images/147802358010.jpeg', 'http://androidmate.in/formula/images/147802358011.jpeg', '', 0),
(29, 'http://androidmate.in/formula/images/147802360710.jpeg', 'http://androidmate.in/formula/images/147802360711.jpeg', '', 0),
(30, 'http://androidmate.in/formula/images/147802788510.jpeg', 'http://androidmate.in/formula/images/147802788511.jpeg', '', 0),
(31, 'http://androidmate.in/formula/images/147817893710.jpg', 'http://androidmate.in/formula/images/147817893711.png', '', 0),
(32, 'http://androidmate.in/formula/images/147817896610.jpg', 'http://androidmate.in/formula/images/147817896611.png', '', 0),
(33, 'http://androidmate.in/formula/images/147817900810.jpg', 'http://androidmate.in/formula/images/147817900811.png', '', 0),
(34, 'http://androidmate.in/formula/images/147819013110.jpg', 'http://androidmate.in/formula/images/147819013111.png', '', 0),
(35, 'http://androidmate.in/formula/images/147819019810.jpg', 'http://androidmate.in/formula/images/147819019811.png', '', 0),
(36, 'http://androidmate.in/formula/images/147819022910.jpg', 'http://androidmate.in/formula/images/147819022911.png', '', 0),
(37, 'http://androidmate.in/formula/images/147819070010.jpg', 'http://androidmate.in/formula/images/147819070011.png', '', 0),
(38, 'http://androidmate.in/formula/images/147819076010.jpg', 'http://androidmate.in/formula/images/147819076011.png', '', 0),
(39, 'http://androidmate.in/formula/images/147819080710.jpg', 'http://androidmate.in/formula/images/147819080711.png', '', 0),
(40, 'http://androidmate.in/formula/images/147823295110.jpg', 'http://androidmate.in/formula/images/147823295111.png', '', 0),
(41, 'http://androidmate.in/formula/images/147823298110.jpg', 'http://androidmate.in/formula/images/147823298111.png', '', 0),
(42, 'http://androidmate.in/formula/images/147823405410.png', 'http://androidmate.in/formula/images/147823405411.png', '', 0),
(43, 'http://androidmate.in/formula/images/147823407810.png', 'http://androidmate.in/formula/images/147823407811.png', '', 0),
(44, 'http://androidmate.in/formula/images/147823435810.png', 'http://androidmate.in/formula/images/147823435811.png', '', 0),
(45, 'http://androidmate.in/formula/images/147823443310.png', 'http://androidmate.in/formula/images/147823443311.png', '', 0),
(46, 'http://androidmate.in/formula/images/147823460310.png', 'http://androidmate.in/formula/images/147823460311.png', '', 0),
(47, 'http://androidmate.in/formula/images/147823474810.png', 'http://androidmate.in/formula/images/147823474811.png', '', 0),
(48, 'http://androidmate.in/formula/images/147823529010.png', 'http://androidmate.in/formula/images/147823529011.png', '', 0),
(49, 'http://androidmate.in/formula/images/147823539410.png', 'http://androidmate.in/formula/images/147823539411.png', '', 0),
(50, 'http://androidmate.in/formula/images/147823561910.png', 'http://androidmate.in/formula/images/147823561911.png', '', 0),
(51, 'http://androidmate.in/formula/images/147823614410.png', 'http://androidmate.in/formula/images/147823614411.png', '', 0),
(52, 'http://androidmate.in/formula/images/147823638810.png', 'http://androidmate.in/formula/images/147823638811.png', '', 0),
(53, 'http://androidmate.in/formula/images/147825203010.png', 'http://androidmate.in/formula/images/147825203011.png', '', 0),
(54, 'http://androidmate.in/formula/images/147825217810.png', 'http://androidmate.in/formula/images/147825217811.png', '', 0),
(55, 'http://androidmate.in/formula/images/147826088010.png', 'http://androidmate.in/formula/images/147826088011.png', '', 0),
(56, 'http://androidmate.in/formula/images/147826103210.png', 'http://androidmate.in/formula/images/147826103211.png', '', 0),
(57, 'http://androidmate.in/formula/images/147826119710.png', 'http://androidmate.in/formula/images/147826119911.png', '', 0),
(58, 'http://androidmate.in/formula/images/147826127010.png', 'http://androidmate.in/formula/images/147826127011.png', '', 0),
(59, 'http://androidmate.in/formula/images/147826303610.png', 'http://androidmate.in/formula/images/147826303611.png', '', 0),
(60, 'http://androidmate.in/formula/images/147826323810.png', 'http://androidmate.in/formula/images/147826323811.png', '', 0),
(61, 'http://androidmate.in/formula/images/147826408310.png', 'http://androidmate.in/formula/images/147826408311.png', '', 0),
(62, 'http://androidmate.in/formula/images/147826423610.png', 'http://androidmate.in/formula/images/147826423611.png', '', 0),
(63, 'http://androidmate.in/formula/images/147832205610.png', 'http://androidmate.in/formula/images/147832205611.png', '', 0),
(64, 'http://androidmate.in/formula/images/147832214210.png', 'http://androidmate.in/formula/images/147832214211.png', '', 0),
(65, 'http://androidmate.in/formula/images/147832230810.png', 'http://androidmate.in/formula/images/147832230811.png', '', 0),
(66, 'http://androidmate.in/formula/images/147832293010.png', 'http://androidmate.in/formula/images/147832293011.png', '', 0),
(67, 'http://androidmate.in/formula/images/147832306210.png', 'http://androidmate.in/formula/images/147832306211.png', '', 0),
(68, 'http://androidmate.in/formula/images/147832315310.png', 'http://androidmate.in/formula/images/147832315311.png', '', 0),
(69, 'http://androidmate.in/formula/images/147832340610.png', 'http://androidmate.in/formula/images/147832340611.png', '', 0),
(70, 'http://androidmate.in/formula/images/147832364310.png', 'http://androidmate.in/formula/images/147832364311.png', '', 0),
(71, 'http://androidmate.in/formula/images/147832393710.png', 'http://androidmate.in/formula/images/147832393711.png', '', 0),
(72, 'http://androidmate.in/formula/images/147832416110.png', 'http://androidmate.in/formula/images/147832416111.png', '', 0),
(73, 'http://androidmate.in/formula/images/147832427110.png', 'http://androidmate.in/formula/images/147832427111.png', '', 0),
(74, 'http://androidmate.in/formula/images/147832501510.png', 'http://androidmate.in/formula/images/147832501511.png', '', 0),
(75, 'http://androidmate.in/formula/images/147832877810.jpg', 'http://androidmate.in/formula/images/147832877811.jpg', '', 0),
(76, 'http://androidmate.in/formula/images/147833399810.png', 'http://androidmate.in/formula/images/147833399811.png', '', 0),
(77, 'http://androidmate.in/formula/images/147833457910.png', 'http://androidmate.in/formula/images/147833457911.png', '', 0),
(78, 'http://androidmate.in/formula/images/147833478710.png', 'http://androidmate.in/formula/images/147833478711.png', '', 0),
(79, 'http://androidmate.in/formula/images/147833491810.png', 'http://androidmate.in/formula/images/147833491811.png', '', 0),
(80, 'http://androidmate.in/formula/images/147833520210.png', 'http://androidmate.in/formula/images/147833520211.png', '', 0),
(81, 'http://androidmate.in/formula/images/147833570510.png', 'http://androidmate.in/formula/images/147833570511.png', '', 0),
(82, 'http://androidmate.in/formula/images/147833602510.png', 'http://androidmate.in/formula/images/147833602511.png', '', 0),
(83, 'http://androidmate.in/formula/images/147833690010.png', 'http://androidmate.in/formula/images/147833690011.png', '', 0),
(84, 'http://androidmate.in/formula/images/147833814010.png', 'http://androidmate.in/formula/images/147833814011.png', '', 0),
(85, 'http://androidmate.in/formula/images/147833837410.png', 'http://androidmate.in/formula/images/147833837411.png', '', 0),
(86, 'http://androidmate.in/formula/images/147833847710.png', 'http://androidmate.in/formula/images/147833847711.png', '', 0),
(87, 'http://androidmate.in/formula/images/147833865710.png', 'http://androidmate.in/formula/images/147833865711.png', '', 0),
(88, 'http://androidmate.in/formula/images/147833961110.png', 'http://androidmate.in/formula/images/147833961111.png', '', 0),
(89, 'http://androidmate.in/formula/images/147833971610.png', 'http://androidmate.in/formula/images/147833971611.png', '', 0),
(90, 'http://androidmate.in/formula/images/147834007410.png', 'http://androidmate.in/formula/images/147834007411.png', '', 0),
(91, 'http://androidmate.in/formula/images/147834020010.png', 'http://androidmate.in/formula/images/147834020011.png', '', 0),
(92, 'http://androidmate.in/formula/images/147834050610.png', 'http://androidmate.in/formula/images/147834050611.png', '', 0),
(93, 'http://androidmate.in/formula/images/147834059510.png', 'http://androidmate.in/formula/images/147834059511.png', '', 0),
(94, 'http://androidmate.in/formula/images/147836552010.png', 'http://androidmate.in/formula/images/147836552011.png', '', 0),
(95, 'http://androidmate.in/formula/images/147836582310.png', 'http://androidmate.in/formula/images/147836582311.png', '', 0),
(96, 'http://androidmate.in/formula/images/147836601210.png', 'http://androidmate.in/formula/images/147836601211.png', '', 0),
(97, 'http://androidmate.in/formula/images/147836732810.png', 'http://androidmate.in/formula/images/147836732811.png', '', 0),
(98, 'http://androidmate.in/formula/images/147836754310.png', 'http://androidmate.in/formula/images/147836754311.png', '', 0),
(99, 'http://androidmate.in/formula/images/147836804110.png', 'http://androidmate.in/formula/images/147836804111.png', '', 0),
(100, 'http://androidmate.in/formula/images/147836819610.png', 'http://androidmate.in/formula/images/147836819611.png', '', 0),
(101, 'http://androidmate.in/formula/images/147836845910.png', 'http://androidmate.in/formula/images/147836845911.png', '', 0),
(102, 'http://androidmate.in/formula/images/147836857910.png', 'http://androidmate.in/formula/images/147836857911.png', '', 0),
(103, 'http://androidmate.in/formula/images/147901379410.png', 'http://androidmate.in/formula/images/147901379411.png', '', 0),
(104, 'http://androidmate.in/formula/images/147901410810.png', 'http://androidmate.in/formula/images/147901410811.png', '', 0),
(105, 'http://androidmate.in/formula/images/147901430210.png', 'http://androidmate.in/formula/images/147901430211.png', '', 0),
(106, 'http://androidmate.in/formula/images/147901449110.png', 'http://androidmate.in/formula/images/147901449111.png', '', 0),
(107, 'http://androidmate.in/formula/images/147901483010.png', 'http://androidmate.in/formula/images/147901483011.png', '', 0),
(108, 'http://androidmate.in/formula/images/147901503110.png', 'http://androidmate.in/formula/images/147901503111.png', '', 0),
(109, 'http://androidmate.in/formula/images/147901528410.png', 'http://androidmate.in/formula/images/147901528411.png', '', 0),
(110, 'http://androidmate.in/formula/images/147901547410.png', 'http://androidmate.in/formula/images/147901547411.png', '', 0),
(111, 'http://androidmate.in/formula/images/147901560510.png', 'http://androidmate.in/formula/images/147901560511.png', '', 0),
(112, 'http://androidmate.in/formula/images/147901573710.png', 'http://androidmate.in/formula/images/147901573711.png', '', 0),
(113, 'http://androidmate.in/formula/images/147901605310.png', 'http://androidmate.in/formula/images/147901605311.png', '', 0),
(114, 'http://androidmate.in/formula/images/147901627010.png', 'http://androidmate.in/formula/images/147901627011.png', '', 0),
(115, 'http://androidmate.in/formula/images/147901643610.png', 'http://androidmate.in/formula/images/147901643611.png', '', 0),
(116, 'http://androidmate.in/formula/images/147901682410.png', 'http://androidmate.in/formula/images/147901682411.png', '', 0),
(117, 'http://androidmate.in/formula/images/147901692110.png', 'http://androidmate.in/formula/images/147901692111.png', '', 0),
(118, 'http://androidmate.in/formula/images/147901717910.png', 'http://androidmate.in/formula/images/147901717911.png', '', 0),
(119, 'http://androidmate.in/formula/images/147901752710.png', 'http://androidmate.in/formula/images/147901752711.png', '', 0),
(120, 'http://androidmate.in/formula/images/147901768910.png', 'http://androidmate.in/formula/images/147901768911.png', '', 0),
(121, 'http://androidmate.in/formula/images/147901776110.png', 'http://androidmate.in/formula/images/147901776111.png', '', 0),
(122, 'http://androidmate.in/formula/images/147903471110.png', 'http://androidmate.in/formula/images/147903471111.png', '', 0),
(123, 'http://androidmate.in/formula/images/147903503710.png', 'http://androidmate.in/formula/images/147903503711.png', '', 0),
(124, 'http://androidmate.in/formula/images/147903527110.png', 'http://androidmate.in/formula/images/147903527111.png', '', 0),
(125, 'http://androidmate.in/formula/images/147903537610.png', 'http://androidmate.in/formula/images/147903537611.png', '', 0),
(126, 'http://androidmate.in/formula/images/147909774210.png', 'http://androidmate.in/formula/images/147909774211.png', '', 0),
(127, 'http://androidmate.in/formula/images/147909789810.png', 'http://androidmate.in/formula/images/147909789811.png', '', 0),
(128, 'http://androidmate.in/formula/images/147909808310.png', 'http://androidmate.in/formula/images/147909808311.png', '', 0),
(129, 'http://androidmate.in/formula/images/147909842210.png', 'http://androidmate.in/formula/images/147909842211.png', '', 0),
(130, 'http://androidmate.in/formula/images/147909895510.png', 'http://androidmate.in/formula/images/147909895511.png', '', 0),
(131, 'http://androidmate.in/formula/images/148004746910.png', 'http://androidmate.in/formula/images/148004746911.png', '', 0),
(132, 'http://androidmate.in/formula/images/148004763010.png', 'http://androidmate.in/formula/images/148004763011.png', '', 0),
(133, 'http://androidmate.in/formula/images/148004789510.png', 'http://androidmate.in/formula/images/148004789511.png', '', 0),
(134, 'http://androidmate.in/formula/images/148004805210.png', 'http://androidmate.in/formula/images/148004805211.png', '', 0),
(135, 'http://androidmate.in/formula/images/148004832910.png', 'http://androidmate.in/formula/images/148004832911.png', '', 0),
(136, 'http://androidmate.in/formula/images/148004910110.png', 'http://androidmate.in/formula/images/148004910111.png', '', 0),
(137, 'http://androidmate.in/formula/images/148005038210.png', 'http://androidmate.in/formula/images/148005038211.png', '', 0),
(138, 'http://androidmate.in/formula/images/148005054010.png', 'http://androidmate.in/formula/images/148005054011.png', '', 0),
(139, 'http://androidmate.in/formula/images/148005091410.png', 'http://androidmate.in/formula/images/148005091411.png', '', 0),
(140, 'http://androidmate.in/formula/images/148005103710.png', 'http://androidmate.in/formula/images/148005103711.png', '', 0),
(141, 'http://androidmate.in/formula/images/148042812410.png', 'http://androidmate.in/formula/images/148042812411.png', '', 0),
(142, 'http://androidmate.in/formula/images/148042826510.png', 'http://androidmate.in/formula/images/148042826511.png', '', 0),
(143, 'http://androidmate.in/formula/images/148042845710.png', 'http://androidmate.in/formula/images/148042845711.png', '', 0),
(144, 'http://androidmate.in/formula/images/148042892010.png', 'http://androidmate.in/formula/images/148042892011.png', '', 0),
(145, 'http://androidmate.in/formula/images/148042906310.png', 'http://androidmate.in/formula/images/148042906311.png', '', 0),
(146, 'http://androidmate.in/formula/images/148042939710.png', 'http://androidmate.in/formula/images/148042939711.png', '', 0),
(147, 'http://androidmate.in/formula/images/148042951510.png', 'http://androidmate.in/formula/images/148042951511.png', '', 0),
(148, 'http://androidmate.in/formula/images/148042964310.png', 'http://androidmate.in/formula/images/148042964311.png', '', 0),
(149, 'http://androidmate.in/formula/images/148042981310.png', 'http://androidmate.in/formula/images/148042981311.png', '', 0),
(150, 'http://androidmate.in/formula/images/148043005010.png', 'http://androidmate.in/formula/images/148043005011.png', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
