-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 03:31 PM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spagobi_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `QRTZ_LOCKS`
--

CREATE TABLE IF NOT EXISTS `QRTZ_LOCKS` (
  `LOCK_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QRTZ_LOCKS`
--

INSERT INTO `QRTZ_LOCKS` (`LOCK_NAME`) VALUES
('CALENDAR_ACCESS'),
('JOB_ACCESS'),
('MISFIRE_ACCESS'),
('STATE_ACCESS'),
('TRIGGER_ACCESS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `QRTZ_LOCKS`
--
ALTER TABLE `QRTZ_LOCKS`
 ADD PRIMARY KEY (`LOCK_NAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
