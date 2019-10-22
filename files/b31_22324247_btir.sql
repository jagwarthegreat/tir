-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 07:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b31_22324247_btir`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident_category`
--

CREATE TABLE IF NOT EXISTS `incident_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `incident_category`
--

INSERT INTO `incident_category` (`category_id`, `name`, `description`) VALUES
(1, 'Traffic', ''),
(2, 'Flood', ''),
(3, 'Accident', ''),
(4, 'Construction', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_num` varchar(50) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `caption` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `location` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_num`, `posted_by`, `caption`, `category_id`, `location`, `slug`, `status`) VALUES
(1, '', 9, 'ss', 0, '37.421998333333335,-122.08400000000002', 'http://192.168.1.5/TrafficApp/mediaFiles/postPictures/test_11072018_060320.jpg', 0),
(2, '', 9, 'wewewewewew', 0, '37.421998333333335,-122.08400000000002', 'http://192.168.1.5/TrafficApp/mediaFiles/postPictures/test_11072018_060812.jpg', 0),
(3, '', 9, 'wewewewewewsasas11111', 0, '37.421998333333335,-122.08400000000002', 'http://192.168.1.5/TrafficApp/mediaFiles/postPictures/test_11072018_060812.jpg', 1),
(10, '', 12, 'test', 1, '37.421998333333335,-122.08400000000002', 'http://192.168.1.5/TrafficApp/mediaFiles/postPictures/aron_testanyy_19072018_052819.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `level`) VALUES
(1, 'Root'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `slug` text NOT NULL,
  `online_stats` int(1) NOT NULL,
  `privacy` int(1) NOT NULL COMMENT '0=public, 1=private',
  `havePrivilege` int(1) NOT NULL COMMENT '0=without, 1=with',
  `token` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `m_name`, `l_name`, `alias`, `dob`, `address`, `email`, `username`, `password`, `role`, `slug`, `online_stats`, `privacy`, `havePrivilege`, `token`) VALUES
(3, 'SYSTEM ROOT', '', '', 'I AM ROOT', '0000-00-00', '', '', 'root', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', 1, '', 0, 0, 0, ''),
(8, 'User1', '', '', 'Monggi246', '0000-00-00', '', '', 'user', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', 3, '', 0, 0, 0, ''),
(9, 'test', 'we', 'we', 'test', '0000-00-00', '1212121wqe', '', 'test', 'testt', 0, 'http://192.168.1.5/TrafficApp/mediaFiles/userPictures/test.jpg', 0, 0, 0, ''),
(10, 's', 's', 's', 's', '0000-00-00', 's', '', 'ss', 's', 0, '', 0, 0, 0, ''),
(11, 's', 's', 's', 's', '0000-00-00', 's', '', 'ssssasasa', 'ss', 0, '', 0, 0, 0, ''),
(12, 'aron_test', 'testl', 'anyy', 'ls', '0000-00-00', '24th', '', 'l', '2db95e8e1a9267b7a1188556b2013b33', 0, 'http://192.168.1.5/TrafficApp/mediaFiles/userPictures/aron_testtestlanyy.jpg', 0, 1, 0, 'fzfig4BzV4I:APA91bGh4fkzA5BgVW7WtUnUCNXctT0UajPkIEgHIkzpoq8xb976GXhNDKmtI5xveHxLgLL6kKkW31KtrscPRQzWxm9Nmzjw7as243jwZYSwEutvPxEFTH6N2yX2DOQ3fdv-DdUUZuK5OzJ1RGJlfKvafAQVnbfArg'),
(13, 'l', 'l', 'l', 'l', '0000-00-00', 'l', '', 'll', '2db95e8e1a9267b7a1188556b2013b33', 0, '', 0, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
