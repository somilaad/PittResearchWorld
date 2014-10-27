-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.rosta-farzan.net
-- Generation Time: Apr 30, 2014 at 02:15 PM
-- Server version: 5.1.56
-- PHP Version: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inf2560_g2`
--

-- --------------------------------------------------------

--
-- Table structure for table `participant_login`
--

CREATE TABLE IF NOT EXISTS `participant_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `participant_login`
--

INSERT INTO `participant_login` (`id`, `firstname`, `lastname`, `password`, `email`) VALUES
(9, 'Arpit', 'P', 'arpit', 'arpit.mani@gmail.com'),
(2, 'Arpit', 'Paruthi', '12345', 'arpitparuthi@hotmail.com'),
(31, 'sjklj', 'kljkljaslkj', 'das232', 'jkljsalk@jdklsajk.com'),
(13, 'John', 'Smith', 'jsmith', 'jsmith@email.com'),
(35, 'Raghvendra', 'Agarwal', '123456', 'raa103@pitt.edu'),
(16, 'Somi', 'Laad', 'Somi', 'somi.vit09@gmail.com'),
(25, 'Rosta', 'Farzan', '', 'rfarzan1@pitt.edu'),
(21, 'Dibya', 'C', 'dibya', 'dib_04@yahoo.co.in');

-- --------------------------------------------------------

--
-- Table structure for table `participant_research`
--

CREATE TABLE IF NOT EXISTS `participant_research` (
  `p_email` varchar(100) NOT NULL,
  `research_name` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant_research`
--

INSERT INTO `participant_research` (`p_email`, `research_name`) VALUES
('arp100@pitt.edu', 'Learn PHP in no time..'),
('arpit.mani@gmail.com', 'Learn Java in 5 days'),
('dic19@pitt.edu', 'Learn PHP in no time'),
('arpitparuthi@hotmail.com', 'Here it is'),
('dic19@pitt.edu', 'Here it is'),
('dic19@pitt.edu', 'Age'),
('dibyachattopadhyay125@gmail.com', 'Learn jQuery in 1 day'),
('arpitparuthi@hotmail.com', 'Test'),
('arpitparuthi@hotmail.com', 'Test dnsfl'),
('arpitparuthi@hotmail.com', 'Learn PHP in no time'),
('somi@gmail.com', 'Learn PHP in no time'),
('arpitparuthi@hotmail.com', 'Learn Java in 5 days'),
('raa103@pitt.edu', 'Test'),
('arpit.mani@gmail.com', 'Data Mining'),
('arpitparuthi@hotmail.com', 'Data Mining'),
('rfarzan1@pitt.edu', 'test research'),
('rfarzan1@pitt.edu', 'Test'),
('arpitparuthi@hotmail.com', 'Dot net'),
('rht.purswani@gmail.com', 'java world'),
('arpitparuthi@hotmail.com', 'php12'),
('dic19@pitt.edu', 'php12'),
('somi.vit09@gmail.com', 'Learn PHP in no time'),
('dic19@pitt.edu', 'My research Dibya'),
('somi.vit09@gmail.com', 'English Proficiency'),
('somi@gmail.com', 'My new research 2'),
('somi@gmail.com', 'My new Research'),
('somi@gmail.com', 'Data Mining'),
('arpit.mani@gmail.com', 'English Proficiency'),
('dib_04@yahoo.co.in', 'My research Dibya'),
('dic19@pitt.edu', 'Data Mining'),
('dic19@pitt.edu', 'java world'),
('xyx.2ghus@hjhcom', 'Test'),
('somi@gmail.com', 'Test'),
('somi@gmail.com', 'java world'),
('somi@gmail.com', 'English Proficiency'),
('dic19@pitt.edu', 'Test Research'),
('dic19@pitt.edu', 'Test'),
('dic19@pitt.edu', 'Learn Java in 5 days'),
('dic19@pitt.edu', 'Learn jQuery in 1 day');

-- --------------------------------------------------------

--
-- Table structure for table `researcher_login`
--

CREATE TABLE IF NOT EXISTS `researcher_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `researcher_login`
--

INSERT INTO `researcher_login` (`id`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, 'R1', 'R1', 'R1', 'R1@gmail.com'),
(2, 'Deepak', 'Abc', '123', 'deepak@gmail.com'),
(18, 'Dibya', 'Chatt', 'password', 'dibyachattopadhyay125@gmail.com'),
(22, 'deepak', 'mathur', 'deepak', 'd2@gmail.com'),
(14, 'Deads', 'kjlasj', 'jkljdsa', 'jkljak@jklsdj'),
(13, 'Rohit', 'Purswani', '12345', 'rht60@pitt.edu'),
(17, 'Jasmin', 'Dhamelia', 'jasmin', 'jasmin@gmail.com'),
(24, 'Researcher 1', 'Research', 'R2', 'R3@gmail.com'),
(28, 'Rosta', 'Farzan', '', 'rfarzan@pitt.edu');

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE IF NOT EXISTS `researches` (
  `name` varchar(128) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `eligibility` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `length` varchar(30) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `payment_amount` double NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`name`, `contact_info`, `description`, `eligibility`, `from_date`, `to_date`, `length`, `payment`, `payment_amount`, `keywords`, `email`) VALUES
('Test', 'Dibya', 'Test Study 3', '23 years age', '2014-04-23', '2014-04-26', '23 days', 'Cash', 100, 'PHP', 'R2@gmail.com'),
('Learn PHP in no time', 'Dibya & Arpit', 'The skills to learn PHP in no time..', 'No prior experience with PHP', '2014-04-22', '2014-04-23', '2 hours a day for 1 month', 'None', 0, 'PHP', '123@123.com'),
('php12', '345 fifth12', 'learn php ', 'ms ', '2014-04-19', '2014-04-20', '2 hours', 'cash', 0, 'php', 'xyz1@gmail.com'),
('Dot net', 'dfaagawfaw', 'fnawfnawwlaf', 'walkfnal', '2014-04-02', '2014-04-30', '2 hours', 'Cash', 10, 'rohit', 'rmp60@pitt.edu'),
('java world', '4750 center avenue', 'to check issues with java', 'java not completed course', '2014-04-06', '2014-04-24', '2 hours', 'cash', 1200, 'java', 'd2@gmail.com'),
('Data Mining', 'Dibya', 'This is data mining research', '21 years', '2014-04-02', '2014-04-30', '9 hours', 'Cash', 10, 'Data Mining', 'dibyachattopadhyay125@gmail.com'),
('My research Dibya', 'Dibya', 'Test', 'Should know Java', '2014-04-01', '2014-04-25', '100', 'Check', 1313, 'test', 'dibyachattopadhyay125@gmail.co'),
('My new Research', 'DIbya', 'My new research', '21 years', '2014-04-24', '2014-04-26', '2 days', 'Cash', 0, 'My', 'dibyachattopadhyay125@gmail.com'),
('My new research 2', 'Dibya', 'My new research 2', '22 years', '2014-04-24', '2014-04-26', '2 hours a day', '', 0, 'test', 'dibyachattopadhyay125@gmail.com'),
('test research', '', '', '', '0000-00-00', '0000-00-00', '', '', 0, '', 'rfarzan@pitt.edu');

-- --------------------------------------------------------

--
-- Table structure for table `r_research`
--

CREATE TABLE IF NOT EXISTS `r_research` (
  `email` varchar(100) NOT NULL,
  `research_name` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_research`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `rname` varchar(128) DEFAULT NULL,
  `pemail` varchar(100) DEFAULT NULL,
  KEY `pemail` (`pemail`),
  KEY `rname` (`rname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`rname`, `pemail`) VALUES
('Dot net', 'somi.vit09@gmail.com'),
('Data Mining', 'somi.vit09@gmail.com'),
('My research Dibya', 'somi.vit09@gmail.com'),
('My new research 2', 'somi.vit09@gmail.com'),
('My new Research', 'somi.vit09@gmail.com'),
('My new Research', 'somi.vit09@gmail.com'),
('php12', 'somi.vit09@gmail.com'),
('Test', 'somi.vit09@gmail.com'),
('Dot net', 'somi.vit09@gmail.com'),
('Data Mining', 'somi.vit09@gmail.com'),
('Data Mining', 'somi.vit09@gmail.com'),
('My research Dibya', 'somi.vit09@gmail.com'),
('My new Research', 'somi.vit09@gmail.com'),
('My new research 2', 'somi.vit09@gmail.com'),
('test research', 'arpitparuthi@hotmail.com');
