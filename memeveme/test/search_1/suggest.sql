-- MySQL dump 10.8
--
-- ------------------------------------------------------
-- Server version	4.1.7-nt

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;

--
-- Table structure for table `suggest`
--

DROP TABLE IF EXISTS `suggest`;
CREATE TABLE `suggest` (
  `suggest_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  PRIMARY KEY  (`suggest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggest`
--


/*!40000 ALTER TABLE `suggest` DISABLE KEYS */;
LOCK TABLES `suggest` WRITE;
INSERT INTO `suggest` VALUES (1,'Home'),(2,'TECHNOLOGIES'),(3,'SOLUTIONS  AND SOFTWARE'),(4,'Websites'),(5,'Web Apps'),(6,'Applications'),(7,'E-COMMERCE SOLUTIONS'),(8,'osCommerce'),(9,'CMS / Portals'),(10,'Microsoft .NET'),(11,'J2EE'),(12,'LAMP'),(13,'PHP'),(14,'MySQL'),(15,'Apache'),(16,'ASP.NET'),(17,'Windows Applications'),(18,'JSP'),(19,'SWING'),(20,'Web Technologies'),(21,'XHTML'),(22,'RSS / ATOM'),(23,'XML'),(24,'XSL'),(25,'XAML'),(26,'AJAX'),(27,'About DynamicAJAX'),(28,'CSS'),(29,'The Basics'),(30,'SAJAX'),(31,'About The Site Images'),(32,'About Me'),(33,'JavaScript'),(34,'RSS 2.0'),(35,'ATOM 1.0'),(36,'Search Engine Optimization'),(37,'Flash'),(38,'Open Source'),(39,'HTTP Server'),(40,'Full Text Search'),(41,'Best Practices'),(42,'XML Schema Definitons'),(43,'Web Content Accessibility Guidelines'),(44,'Printable Pages'),(45,'Search Engine'),(46,'Navigation'),(47,'Direct Web Remoting'),(48,'Mars Exploration Rovers'),(49,'Cassini'),(50,'Fun with Queries'),(51,'SEO Tricks and Tactics'),(52,'osCommerce Contributions'),(53,'PHP & IIS'),(54,'Regular Expressions'),(55,'Rants'),(56,'URL Rewrite'),(57,'Fun with CSS'),(58,'ActionScript'),(59,'Visual Studio 2005'),(60,'SQL Server'),(61,'Search Engine Commands'),(62,'Web Site Layout'),(63,'AJAX'),(64,'AJAX Basics'),(65,'ATLAS'),(66,'SAJAX'),(67,'Tutorials'),(68,'Novice'),(69,'Frameworks'),(70,'Ajax.NET'),(71,'Framework Tutorials'),(72,'SAJAX'),(73,'Ajax.NET'),(74,'Direct Web Remoting'),(75,'Intermediate'),(76,'AJAX Example Sites'),(77,'My Tutorials'),(78,'AJAX Web Chat Part 1'),(79,'The JavaScript'),(80,'Sending The Request'),(81,'Color Schemes'),(82,'AJAX Resources'),(83,'The Backend'),(84,'Usability Additions'),(85,'AJAX Instant Messenger Part 1'),(86,'Ruby on Rails'),(87,'Crazy Queries'),(88,'XmlHttpRequest Methods'),(89,'XmlHttpRequest Properties'),(90,'AjaxTags'),(91,'Direct Web Remoting'),(92,'My URL Rewriting'),(93,'Great Quotes'),(94,'IXSSO Queries'),(95,'AFLAX'),(96,'Other Technologies'),(97,'Microsoft Indexing Server'),(98,'.NET & CISSO');
UNLOCK TABLES;
/*!40000 ALTER TABLE `suggest` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

