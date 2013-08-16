-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2013 at 09:34 AM
-- Server version: 5.5.30
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esignby9_stuntHunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clues`
--

DROP TABLE IF EXISTS `clues`;
CREATE TABLE IF NOT EXISTS `clues` (
  `key` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `clue` longtext NOT NULL,
  `lat` float(10,6) NOT NULL,
  `long` float(10,6) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `clues`
--

INSERT INTO `clues` (`key`, `title`, `clue`, `lat`, `long`) VALUES
(1, 'Tunnels', 'Clue', 39.5000404, -84.728268),
(2, 'Western Lake', 'Clue', 39.501700, -84.727407),
(3, 'Green House', 'Clue', 39.503143, -84.725272),
(4, 'Bridge', 'Clue', 39.503283, -84.726933),
(5, 'Band Stand', 'Clue',39.502762, -84.729846),
(6, 'Rock Wall', 'Clue', 39.502625, -84.737957),
(7, 'Fountain', 'Clue', 39.505626, -84.731863),
(8, 'The Seal', 'Clue', 39.508734, -84.734491),
(9, 'Baseball', 'Clue', 39.513279, -84.732351),
(10, 'Score Board', 'Clue', 39.515409, -84.733713),
(11, 'Taxidermy', 'Here we have you looking for a beast, it''s name should start with G and it should have some really gruesome teeth. ', 39.508453, -84.733711),
(12, 'Every Kiss Begins With K', 'Under the arch, a kiss will join arms, pucker up quick and then open your heart.', 39.508739, -84.733704),
(13, 'Formal Gardens', 'Clue', 39.513519, -84.728923),
(14, 'Marckam Conference', 'Clue', 39.512620, -84.724932),
(15, 'Turtle Power', 'Clue', 39.503768, -84.737061);

-- --------------------------------------------------------

--
-- Table structure for table `stuntPhotos`
--

DROP TABLE IF EXISTS `stuntPhotos`;
CREATE TABLE IF NOT EXISTS `stuntPhotos` (
  `key` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `user` varchar(75) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `long` float(10,6) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0',
  `judged` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `stuntPhotos`
--

INSERT INTO `stuntPhotos` (`key`, `date`, `user`, `photo`, `lat`, `long`, `score`, `judged`) VALUES
(27, '2013-05-06 19:02:16', 'user001', '1269056268.jpg', 39.505848, -84.732407, 0, 0),
(26, '2013-05-06 18:43:58', 'user001', '1403514333.jpg', 39.505798, -84.732407, 0, 0),
(25, '2013-05-06 16:21:17', 'user001', '890899346.jpg', 39.505852, -84.732475, 1, 1),
(23, '2013-05-06 14:47:38', 'user001', '60155805.jpg', 39.505806, -84.732437, 1, 1),
(24, '2013-05-06 14:48:59', 'user001', '440558472.jpg', 39.505844, -84.732422, 0, 0),
(29, '2013-05-07 11:33:57', 'user001', '1910795802.jpg', 0.000000, 0.000000, 0, 0),
(31, '2013-05-07 19:07:25', 'user001', '50669405.jpg', 0.000000, 0.000000, 0, 0),
(32, '2013-05-09 07:49:12', 'user001', '204587361.jpg', 0.000000, 0.000000, 0, 0),
(33, '2013-05-09 07:54:22', 'user001', '1641867194.jpg', 0.000000, 0.000000, 0, 0),
(34, '2013-05-09 07:54:41', 'user001', '1233366581.jpg', 0.000000, 0.000000, 0, 0),
(35, '2013-05-09 07:54:41', 'user001', '396471540.jpg', 0.000000, 0.000000, 0, 0),
(36, '2013-05-09 08:21:02', 'user001', '972271115.jpg', 0.000000, 0.000000, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
