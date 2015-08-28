-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2015 at 11:58 AM
-- Server version: 5.5.44
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `School_Election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `prn` int(11) DEFAULT NULL,
  `quote` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `votes` int(11) DEFAULT '0',
  KEY `prn` (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`prn`, `quote`, `image`, `votes`) VALUES
(1005, 'yayy!! I will be your leader :D', '<img src="uploads/1005.jpg">', 1),
(1004, 'I am yedaa!!', '<img src="uploads/1004.jpg">', 0),
(1006, 'Bhagyashree is 2nd best. I am the best.', '<img src="uploads/1006.jpg">', 0),
(1003, 'Even i am a candidate', '<img src="uploads/1003.jpg">', 0),
(1001, 'I am the best. Please vote for me!! :)', '<img src="uploads/1001.jpg">', 0),
(1002, 'LOL', '<img src="uploads/1002.jpg">', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `prn` int(11) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`prn`, `password`, `firstname`, `lastname`, `level`) VALUES
(0, '0000', 'admin', '', 2),
(1001, '1', 'Bhagyashree', 'Limaye', 1),
(1002, '1002', 'Ria', 'Shah', 1),
(1003, '1003', 'Devina', 'Wai', 1),
(1004, '1004', 'Jay', 'Jayswal', 1),
(1005, '1005', 'Manali', 'Sarkar', 1),
(1006, '1006', 'Nikhil', 'Koyikkamannil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `prn` int(11) DEFAULT NULL,
  `voted_for` int(11) DEFAULT NULL,
  KEY `prn` (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`prn`, `voted_for`) VALUES
(1001, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `voteSetting`
--

CREATE TABLE IF NOT EXISTS `voteSetting` (
  `flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voteSetting`
--

INSERT INTO `voteSetting` (`flag`) VALUES
(0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`prn`) REFERENCES `student` (`prn`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`prn`) REFERENCES `student` (`prn`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`prn`) REFERENCES `student` (`prn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
