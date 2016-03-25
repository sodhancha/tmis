-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2016 at 11:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fullname` varchar(55) NOT NULL,
  `admin_username` varchar(55) NOT NULL,
  `admin_email` varchar(55) NOT NULL,
  `admin_password` varchar(55) NOT NULL,
  `admin_image` varchar(55) NOT NULL,
  `admin_isdeleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_email`, `admin_password`, `admin_image`, `admin_isdeleted`) VALUES
(1, 'Surjeeta Dhoubhadel', 'Surjeeta', 'surzeeta27@gmail.com', 'apple', '02.jpg', 0),
(4, 'Manita Chaudhary', 'Manita', 'manita@yahoo.com', 'manta', '5SU8AY022885-02.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbllab`
--

CREATE TABLE IF NOT EXISTS `tbllab` (
  `lab_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_name` varchar(55) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbllab`
--

INSERT INTO `tbllab` (`lab_id`, `lab_name`, `is_deleted`) VALUES
(0, 'Lab-1', 0),
(3, 'Lab-3', 0),
(4, 'Lab-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE IF NOT EXISTS `tblsubject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(55) NOT NULL,
  `subject_description` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subject_id`, `subject_name`, `subject_description`, `is_deleted`) VALUES
(1, 'CI', 'php framewrok										\r\n									', 0),
(2, 'CodeIgniter', 'php', 0),
(3, 'Java', 'Adavnce OOP', 0),
(4, 'Android', 'Programming										\r\n									', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE IF NOT EXISTS `tblteacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(55) NOT NULL,
  `subject_id` varchar(55) NOT NULL,
  `lab_id` varchar(55) NOT NULL,
  `time_date` date NOT NULL,
  `teacher_isactive` tinyint(1) NOT NULL DEFAULT '0',
  `teacher_salary` varchar(15) NOT NULL,
  `teacher_image` varchar(55) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`teacher_id`, `teacher_name`, `subject_id`, `lab_id`, `time_date`, `teacher_isactive`, `teacher_salary`, `teacher_image`, `is_deleted`) VALUES
(1, 'ssss', '1', '3', '0000-00-00', 0, '2333', '029.jpg', 1),
(2, 'ssssddd', '2', '3', '0000-00-00', 0, '2222', '029.jpg', 1),
(3, 'nnn', '1', '3', '2016-03-24', 0, '1222', '029.jpg', 0),
(4, 'dsdfsdf', '1', '3', '0000-00-00', 0, '2222', '029.jpg', 1),
(5, 'nnn', '1', '3', '2016-03-24', 0, '1222', '029.jpg', 0),
(6, 'nnn', '1', '3', '2016-03-24', 1, '1222', '0210.jpg', 0),
(7, '0', '0', '0', '2016-03-25', 1, '0', '_rose03.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
