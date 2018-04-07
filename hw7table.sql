-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2018 at 03:16 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw7`
--

-- --------------------------------------------------------

--
-- Table structure for table `assists`
--

CREATE TABLE `assists` (
  `Player` varchar(100) DEFAULT NULL,
  `Club` varchar(100) DEFAULT NULL,
  `POS` varchar(100) DEFAULT NULL,
  `GP` int(11) DEFAULT NULL,
  `GS` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT NULL,
  `GWA` int(11) DEFAULT NULL,
  `HmA` int(11) DEFAULT NULL,
  `RdA` int(11) DEFAULT NULL,
  `A_90min` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
