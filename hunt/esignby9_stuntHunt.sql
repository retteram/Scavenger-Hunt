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
(1, 'The Silos', 'I hold grain and I''m very tall, climb me to the top and do not fall.', 39.507889, -84.736374),
(2, 'Feeding Time', 'Go down to the stables and bring a carrot, find a big creatture with whom you can share it.', 39.508644, -84.723923),
(3, 'Ghost Light', 'Ghosts of the night will come back to cause fright, when you park to the right and then flash your lights', 39.557396, -84.702919),
(4, 'Skate Park', 'You may not be pro, but land a trick and your talents will grow', 39.506550, -84.754364),
(5, 'Cat Daddy', 'Look for the cat as big as a yak, and then take a picture but don''t get attacked. ', 39.582310, -84.761841),
(6, '10,000 Inches Under the Sea ', 'Get in the water and dive for the bottom, bring back some mud or remains from the autumn', 39.577183, -84.752739),
(7, 'High Dive', 'Ever do a flip? Now is your time, climb up the latter and flip for your life.', 39.502655, -84.738480),
(8, 'Tombstone Treasure', 'Look for a grave with a difference in age that ends in an eight and happened in May.', 39.496639, -84.727936),
(9, 'Home Run Durby', 'Enter here and put on your cap, If your friend hits it home give him a clap, Be aware of the hours though, If you make a scene the police will show', 39.513229, -84.732422),
(10, 'Cold Feet', 'Take off your shoes cause it''s time to get loose, do a whole lap till your feet turn blue like a bruise.', 39.503498, -84.737038),
(11, 'Taxidermy', 'Here we have you looking for a beast, it''s name should start with G and it should have some really gruesome teeth. ', 39.508453, -84.733711),
(12, 'Every Kiss Begins With K', 'Under the arch, a kiss will join arms, pucker up quick and then open your heart.', 39.508739, -84.733704),
(13, 'Krishna', 'Do you dare to up your level? If 6 is the maximum, 20s the devil.', 39.510635, -84.743546),
(14, 'Covered Bridge', 'All you must do is prove you were there, this by surprise is the easiest to dare.', 39.523983, -84.734764),
(15, 'High Dive', 'This particular challenge will make such a splash, do a flip off the three and please don''t bust your ass. ', 39.502655, -84.738480);

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
