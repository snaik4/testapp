-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2014 at 07:33 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testapp`
--
CREATE DATABASE IF NOT EXISTS `testapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testapp`;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `itemname` text NOT NULL,
  `itemcategory` text NOT NULL,
  `status` text NOT NULL,
  `itemprice` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `itemname`, `itemcategory`, `status`, `itemprice`) VALUES
(1, 'new1', 'shreeram', '1', ' shree2'),
(2, 'dasdasd', 'dasda', '1', 'dasdas'),
(4, 'test', 'newtestcategory', '1', '10000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
