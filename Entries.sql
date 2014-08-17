-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 16, 2014 at 09:19 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spc`
--

-- --------------------------------------------------------

--
-- Table structure for table `Entries`
--

CREATE TABLE `Entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student` varchar(50) NOT NULL,
  `time` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(40) NOT NULL,
  `grade` int(1) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Entries`
--

INSERT INTO `Entries` (`id`, `student`, `time`, `description`, `type`, `grade`, `level`) VALUES
(15, 'Jimmy Bob', '12:30', 'He was dropping his pencil sanfbkjasdbaskjdaksjdbaskjfbafskjbsafkjasfbaksjbaskfjbasfkjsabfkjasbfksajfbsakfbsakjfbaskjfbsakjfasbkfajbsakfjbaskjsfbkjasfbsakbaskjsafbjksafbasfkjbsafkjasfbkjsafbsakjfbsafk', 'Dropping Pencil', 4, ''),
(16, 'Joey Sam', '11:00', 'He was chewing gum', 'gum', 8, ''),
(17, 'Sara Lee', '2:00', 'Fighting with Sally', 'fighting', 2, ''),
(20, 'Dominic Kynkor', '11:50', 'asdasdasdasdasdsad', 'gum', 4, ''),
(21, 'Pauklasd', 'asdsad', 'asdasasdasdasffasf', 'gum', 1, ''),
(22, 'Pauklasd', 'asdsad', 'sadsadasdadsasdadssda', 'gum', 1, ''),
(23, 'Pauklasd', 'asdsad', 'sdaasddsaasdfsasfaasf', 'gum', 1, ''),
(24, 'Bobby a', 'sadsaasdasd', 'asdafsdasfsafasddsa', 'something', 7, 'major');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
