-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2014 at 09:34 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `code_solve`
--

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `probid` int(40) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `statement` mediumtext NOT NULL,
  PRIMARY KEY (`probid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`probid`, `username`, `statement`) VALUES
(1, 'maneesh1318', 'abcdef abcdef abcdef abcdef abcdef abcdef abcdefabcdefabcdefabcdef abcdef abcdef abcdef abcdefabcdefabcdef'),
(2, 'maneesh1318', 'xyz'),
(3, 'maneesh1318', 'post'),
(4, 'surya', 'hello helllo hello helllo hello helllo hello helllo hello helllo hello helllo'),
(5, 'surya', 'hello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllohello helllo');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `solution_id` int(40) NOT NULL AUTO_INCREMENT,
  `probid` varchar(40) NOT NULL,
  `statement` mediumtext NOT NULL,
  `username` varchar(40) NOT NULL,
  PRIMARY KEY (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `first_name`, `last_name`, `gender`, `passwd`, `email`, `mobile`, `points`) VALUES
('abcdef', 'abcdef', 'abcdef', 'Male', 'abcdef', 'abc@abc.com', '', 0),
('maneesh1318', 'Manish', 'Richhariya', 'Male', 'abcdef', 'maneesh1318@gmail.com', '8966951701', 0),
('shaktisingh', 'shakti', 'Singh', 'Male', 'abcdef', 'shak@gmail.com', '1234567890', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
