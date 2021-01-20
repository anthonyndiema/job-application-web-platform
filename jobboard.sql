-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 04:29 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `advert` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `adname` varchar(255) NOT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `adcategory` varchar(255) NOT NULL,
  `jobtype` varchar(255) NOT NULL,
  `addesc` text NOT NULL,
  `adurl` varchar(1000) NOT NULL,
  `ademail` varchar(255) NOT NULL,
  `dtpostd` date DEFAULT NULL,
  `duedate` date NOT NULL,
  `adview` int(11) NOT NULL DEFAULT '0',
  `isfavorite` enum('yes','no') NOT NULL DEFAULT 'no',
  `jobpermit` varchar(255) NOT NULL,
  `status` enum('active','inactive','pending','declined') DEFAULT 'pending',
  `jlocation` varchar(255) NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `certs`
--

CREATE TABLE IF NOT EXISTS `certs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `course` varchar(200) NOT NULL,
  `inst` varchar(200) NOT NULL,
  `sdt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `comwork` varchar(100) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `comdate` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `institution` varchar(100) NOT NULL,
  `edulevel` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `sdate` date DEFAULT '0000-00-00',
  `edate` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_title` varchar(100) NOT NULL,
  `upload_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `interest` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobexp`
--

CREATE TABLE IF NOT EXISTS `jobexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `jttl` varchar(100) NOT NULL,
  `orgs` varchar(100) NOT NULL,
  `skills` text NOT NULL,
  `summr` text NOT NULL,
  `accompl` text NOT NULL,
  `sdate` date DEFAULT '0000-00-00',
  `edate` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaderexp`
--

CREATE TABLE IF NOT EXISTS `leaderexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `pttl` varchar(100) NOT NULL,
  `orgs` varchar(100) NOT NULL,
  `woksummr` varchar(100) NOT NULL,
  `sdt` date DEFAULT '0000-00-00',
  `edt` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailsubs`
--

CREATE TABLE IF NOT EXISTS `mailsubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `mailsubs`
--


--
-- Table structure for table `obj`
--

CREATE TABLE IF NOT EXISTS `obj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `obj` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `refr`
--

CREATE TABLE IF NOT EXISTS `refr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `refnm` varchar(200) NOT NULL,
  `jobt` varchar(200) NOT NULL,
  `orgs` varchar(200) NOT NULL,
  `pno` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `refr`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `skills` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `class` varchar(10) NOT NULL DEFAULT '',
  `mark` int(3) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_adv`
--

CREATE TABLE IF NOT EXISTS `student_adv` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `class` varchar(10) NOT NULL DEFAULT '',
  `mark` int(3) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrtype` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(1120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userstatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokencode` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `updt_status_on_job_deadline_expiry__` ON SCHEDULE EVERY 10 SECOND STARTS '2017-08-18 10:07:06' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE  `jobboard`.`advert` SET status='inactive' WHERE duedate <=CURDATE() AND status='active'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
