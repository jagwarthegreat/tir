-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 09:17 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jag`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `acc_level_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`acc_level_id`, `description`) VALUES
(1, 'ROOT'),
(2, 'ADMIN'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `ay`
--

CREATE TABLE `ay` (
  `AY_ID` int(11) NOT NULL,
  `ACADYR` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ay`
--

INSERT INTO `ay` (`AY_ID`, `ACADYR`) VALUES
(1, '2017-2018'),
(2, '2018-2019'),
(3, '2019-2020'),
(4, '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `GRADE_ID` int(11) NOT NULL,
  `IDNO` text NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `AY_ID` int(11) NOT NULL,
  `LEVEL` text NOT NULL,
  `SEM` text NOT NULL,
  `FIN_AVE` decimal(4,2) NOT NULL,
  `REMARKS` text NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`GRADE_ID`, `IDNO`, `SUBJ_ID`, `INST_ID`, `sec_id`, `AY_ID`, `LEVEL`, `SEM`, `FIN_AVE`, `REMARKS`, `STATUS`) VALUES
(88, '13-1176', 27, 2, 1, 1, '1', 'First', '80.00', 'PASSED', 'FINISHED'),
(92, '13-1176', 438, 2, 1, 1, '1', 'First', '86.00', 'PASSED', 'FINISHED'),
(93, '13-1176', 12, 1, 1, 1, '1', 'First', '87.00', 'PASSED', 'FINISHED'),
(94, '13-1176', 439, 1, 1, 1, '1', 'First', '87.00', 'PASSED', 'FINISHED'),
(95, '13-1176', 15, 1, 1, 1, '1', 'First', '82.00', 'PASSED', 'FINISHED'),
(96, '13-1176', 22, 1, 1, 1, '1', 'First', '83.00', 'PASSED', 'FINISHED'),
(97, '13-1176', 25, 2, 1, 1, '1', 'First', '90.00', 'PASSED', 'FINISHED'),
(98, '13-1176', 13, 2, 1, 1, '1', 'First', '85.00', 'PASSED', 'FINISHED'),
(99, '13-1176', 24, 2, 1, 1, '1', 'First', '82.00', 'PASSED', 'FINISHED'),
(100, '13-1176', 23, 2, 1, 1, '1', 'First', '80.00', 'PASSED', 'FINISHED'),
(101, '13-1176', 17, 2, 1, 1, '1', 'First', '91.00', 'PASSED', 'FINISHED'),
(102, '13-1176', 18, 2, 1, 1, '1', 'Second', '90.00', 'PASSED', 'FINISHED'),
(103, '13-1176', 440, 1, 1, 1, '1', 'Second', '87.00', 'PASSED', 'FINISHED'),
(104, '13-1176', 11, 1, 1, 1, '1', 'Second', '86.00', 'PASSED', 'FINISHED'),
(105, '13-1176', 442, 1, 1, 1, '1', 'Second', '89.00', 'PASSED', 'FINISHED'),
(106, '13-1176', 29, 2, 1, 1, '1', 'Second', '79.00', 'PASSED', 'FINISHED'),
(107, '13-1176', 28, 1, 1, 1, '1', 'Second', '80.00', 'PASSED', 'FINISHED'),
(108, '13-1176', 441, 2, 1, 1, '1', 'Second', '83.00', 'PASSED', 'FINISHED'),
(110, '13-1176', 26, 2, 1, 1, '1', 'Second', '85.00', 'PASSED', 'FINISHED'),
(111, '13-1176', 19, 2, 1, 1, '1', 'Second', '80.00', 'PASSED', 'FINISHED'),
(112, '13-1176', 20, 1, 1, 1, '1', 'Second', '90.00', 'PASSED', 'FINISHED'),
(113, '13-1176', 21, 2, 1, 1, '1', 'Second', '93.00', 'PASSED', 'FINISHED'),
(114, '13-1176', 444, 2, 1, 1, '2', 'First', '80.00', 'PASSED', 'FINISHED'),
(115, '13-1176', 449, 1, 1, 1, '2', 'First', '85.00', 'PASSED', 'FINISHED'),
(116, '13-1176', 443, 2, 1, 1, '2', 'First', '90.00', 'PASSED', 'FINISHED'),
(117, '13-1176', 447, 1, 1, 1, '2', 'First', '78.00', 'PASSED', 'FINISHED'),
(118, '13-1176', 445, 1, 1, 1, '2', 'First', '83.00', 'PASSED', 'FINISHED'),
(119, '13-1176', 451, 1, 1, 1, '2', 'First', '87.00', 'PASSED', 'FINISHED'),
(120, '13-1176', 446, 2, 1, 1, '2', 'First', '81.00', 'PASSED', 'FINISHED'),
(121, '13-1176', 450, 2, 1, 1, '2', 'First', '80.00', 'PASSED', 'FINISHED'),
(122, '13-1176', 448, 2, 1, 1, '2', 'First', '82.00', 'PASSED', 'FINISHED'),
(123, '13-1176', 456, 2, 1, 2, '2', 'Second', '83.00', 'PASSED', 'FINISHED'),
(124, '13-1176', 459, 1, 1, 2, '2', 'Second', '80.00', 'PASSED', 'FINISHED'),
(125, '13-1176', 454, 2, 1, 2, '2', 'Second', '86.00', 'PASSED', 'FINISHED'),
(126, '13-1176', 452, 2, 1, 2, '2', 'Second', '84.00', 'PASSED', 'FINISHED'),
(127, '13-1176', 460, 2, 1, 2, '2', 'Second', '87.00', 'PASSED', 'FINISHED'),
(128, '13-1176', 458, 1, 1, 2, '2', 'Second', '87.00', 'PASSED', 'FINISHED'),
(129, '13-1176', 457, 1, 1, 2, '2', 'Second', '90.00', 'PASSED', 'FINISHED'),
(130, '13-1176', 453, 1, 1, 2, '2', 'Second', '89.00', 'PASSED', 'FINISHED'),
(131, '13-1176', 461, 2, 1, 2, '2', 'Second', '91.00', 'PASSED', 'FINISHED'),
(132, '13-1176', 455, 2, 1, 2, '2', 'Second', '84.00', 'PASSED', 'FINISHED'),
(141, '13-1176', 462, 2, 0, 0, '3', 'First', '80.00', 'PASSED', 'FINISHED'),
(142, '13-1176', 463, 2, 0, 0, '3', 'First', '80.00', 'PASSED', 'FINISHED'),
(143, '13-1176', 471, 2, 0, 0, '3', 'First', '80.00', 'PASSED', 'FINISHED'),
(144, '13-1176', 469, 2, 0, 0, '3', 'First', '80.00', 'PASSED', 'FINISHED'),
(145, '13-1176', 468, 2, 0, 0, '3', 'First', '85.00', 'PASSED', 'FINISHED'),
(146, '13-1176', 465, 2, 0, 0, '3', 'First', '85.00', 'PASSED', 'FINISHED'),
(147, '13-1176', 466, 2, 0, 0, '3', 'First', '86.00', 'PASSED', 'FINISHED'),
(148, '13-1176', 467, 2, 0, 0, '3', 'First', '83.00', 'PASSED', 'FINISHED'),
(149, '13-1176', 470, 2, 0, 0, '3', 'First', '82.00', 'PASSED', 'FINISHED'),
(150, '13-1176', 464, 2, 0, 0, '3', 'First', '81.00', 'PASSED', 'FINISHED'),
(151, '13-1176', 479, 2, 1, 4, '3', 'Second', '84.00', 'PASSED', 'FINISHED'),
(152, '13-1176', 477, 1, 1, 4, '3', 'Second', '85.00', 'PASSED', 'FINISHED'),
(153, '13-1176', 472, 2, 1, 4, '3', 'Second', '80.00', 'PASSED', 'FINISHED'),
(154, '13-1176', 478, 2, 1, 4, '3', 'Second', '87.00', 'PASSED', 'FINISHED'),
(155, '13-1176', 476, 2, 1, 4, '3', 'Second', '85.00', 'PASSED', 'FINISHED'),
(156, '13-1176', 475, 2, 1, 4, '3', 'Second', '83.00', 'PASSED', 'FINISHED'),
(157, '13-1176', 474, 2, 1, 4, '3', 'Second', '89.00', 'PASSED', 'FINISHED'),
(158, '13-1176', 473, 2, 1, 4, '3', 'Second', '80.00', 'PASSED', 'FINISHED'),
(159, '13-1176', 485, 2, 1, 4, '4', 'First', '84.00', 'PASSED', 'FINISHED'),
(160, '13-1176', 487, 2, 1, 4, '4', 'First', '84.00', 'PASSED', 'FINISHED'),
(161, '13-1176', 489, 2, 1, 4, '4', 'First', '80.00', 'PASSED', 'FINISHED'),
(162, '13-1176', 488, 2, 1, 4, '4', 'First', '87.00', 'PASSED', 'FINISHED'),
(163, '13-1176', 481, 2, 1, 4, '4', 'First', '80.00', 'PASSED', 'FINISHED'),
(164, '13-1176', 484, 2, 1, 4, '4', 'First', '85.00', 'PASSED', 'FINISHED'),
(165, '13-1176', 483, 2, 1, 4, '4', 'First', '84.00', 'PASSED', 'FINISHED'),
(166, '13-1176', 486, 2, 1, 4, '4', 'First', '86.00', 'PASSED', 'FINISHED'),
(167, '13-1176', 482, 2, 1, 4, '4', 'First', '82.00', 'PASSED', 'FINISHED'),
(168, '13-1176', 491, 2, 1, 5, '4', 'Second', '80.00', 'PASSED', 'FINISHED'),
(169, '13-1176', 496, 2, 1, 5, '4', 'Second', '86.00', 'PASSED', 'FINISHED'),
(170, '13-1176', 495, 2, 1, 5, '4', 'Second', '89.00', 'PASSED', 'FINISHED'),
(171, '13-1176', 497, 1, 1, 5, '4', 'Second', '83.00', 'PASSED', 'FINISHED'),
(172, '13-1176', 492, 2, 1, 5, '4', 'Second', '84.00', 'PASSED', 'FINISHED'),
(173, '13-1176', 493, 2, 1, 5, '4', 'Second', '80.00', 'PASSED', 'FINISHED'),
(174, '13-1176', 494, 2, 1, 5, '4', 'Second', '87.00', 'PASSED', 'FINISHED'),
(175, '13-1176', 490, 1, 1, 5, '4', 'Second', '86.00', 'PASSED', 'FINISHED'),
(176, '13-1170', 27, 2, 1, 4, '1', 'First', '80.00', 'PASSED', 'SAVED'),
(177, '13-1170', 438, 2, 1, 4, '1', 'First', '80.00', 'PASSED', 'SAVED'),
(178, '13-1170', 12, 2, 1, 4, '1', 'First', '80.00', 'PASSED', 'SAVED'),
(179, '13-1170', 439, 2, 1, 4, '1', 'First', '80.00', 'PASSED', 'SAVED'),
(180, '13-1170', 15, 2, 1, 4, '1', 'First', '87.00', 'PASSED', 'SAVED'),
(181, '13-1170', 22, 2, 1, 4, '1', 'First', '86.00', 'PASSED', 'SAVED'),
(182, '13-1170', 25, 2, 1, 4, '1', 'First', '89.00', 'PASSED', 'SAVED'),
(183, '13-1170', 13, 2, 1, 4, '1', 'First', '83.00', 'PASSED', 'SAVED'),
(184, '13-1170', 24, 2, 1, 4, '1', 'First', '87.00', 'PASSED', 'SAVED'),
(185, '13-1170', 23, 1, 1, 4, '1', 'First', '87.00', 'PASSED', 'SAVED'),
(186, '13-1170', 17, 1, 1, 4, '1', 'First', '74.00', 'FAILED', 'SAVED'),
(187, '13-1176', 27, 2, 1, 4, '1', 'First', '86.00', 'PASSED', 'FINISHED'),
(188, '13-1176', 438, 2, 1, 4, '1', 'First', '90.45', 'PASSED', 'FINISHED'),
(190, '13-1176', 27, 2, 1, 4, '1', 'First', '0.00', 'OK', 'FINISHED');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `INST_ID` int(30) NOT NULL,
  `INST_FULLNAME` varchar(255) NOT NULL,
  `INST_ADDRESS` varchar(255) NOT NULL,
  `INST_SEX` varchar(20) NOT NULL DEFAULT 'Male',
  `INST_STATUS` varchar(20) NOT NULL DEFAULT 'Single',
  `SPECIALIZATION` text NOT NULL,
  `INST_EMAIL` varchar(255) NOT NULL,
  `EMPLOYMENT_STATUS` varchar(40) NOT NULL DEFAULT 'Probationary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`INST_ID`, `INST_FULLNAME`, `INST_ADDRESS`, `INST_SEX`, `INST_STATUS`, `SPECIALIZATION`, `INST_EMAIL`, `EMPLOYMENT_STATUS`) VALUES
(2, 'Teacher 21', 'Kabanakalan City', 'M', '', 'Computer ekc...', 'ejbatuto@hotmail.com', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `YR_ID` int(11) NOT NULL,
  `LEVEL` varchar(30) NOT NULL,
  `LEVEL_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`YR_ID`, `LEVEL`, `LEVEL_DESCRIPTION`) VALUES
(1, '1', '1st Year'),
(2, '2', '2nd Year'),
(3, '3', '3rd Year'),
(4, '4', '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `event_done` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `event_done`, `user_id`, `date`) VALUES
(1, 'LOG OUT', 4, '2017-03-17 00:39:54'),
(2, 'LOG IN', 4, '2017-03-17 00:47:40'),
(3, 'LOG OUT', 4, '2017-03-17 00:47:46'),
(4, 'LOG IN', 3, '2017-03-17 00:48:18'),
(5, 'UPDATED USER - DECODE21', 3, '2017-03-17 00:48:39'),
(6, 'LOG OUT', 3, '2017-03-17 00:48:53'),
(7, 'LOG IN', 4, '2017-03-17 00:49:03'),
(8, 'LOG OUT', 4, '2017-03-17 00:49:05'),
(9, 'LOG IN', 4, '2017-03-17 00:49:23'),
(10, 'LOG OUT', 4, '2017-03-17 00:49:26'),
(11, 'LOG IN', 4, '2017-03-17 02:06:52'),
(12, 'LOG OUT', 4, '2017-03-17 02:06:56'),
(13, 'LOG IN', 4, '2017-03-17 02:08:48'),
(14, 'LOG OUT', 4, '2017-03-17 02:08:53'),
(15, 'LOG IN', 4, '2017-03-17 02:10:08'),
(16, 'LOG OUT', 4, '2017-03-17 02:10:11'),
(17, 'LOG IN', 3, '2018-02-24 13:22:51'),
(18, 'ADDED STUDENT - 00011321', 3, '2018-02-24 13:40:05'),
(19, 'UPDATED USER - GUAPN', 3, '2018-02-24 14:06:09'),
(20, 'LOG OUT', 3, '2018-02-24 14:28:47'),
(21, 'LOG IN', 4, '2018-02-24 14:28:58'),
(22, 'LOG OUT', 4, '2018-02-24 14:29:16'),
(23, 'LOG IN', 8, '2018-02-24 14:29:21'),
(24, 'LOG OUT', 8, '2018-02-24 14:31:52'),
(25, 'LOG IN', 3, '2018-02-24 14:31:54'),
(26, 'LOG IN', 3, '2018-02-28 13:20:03'),
(27, 'LOG OUT', 3, '2018-02-28 14:20:55'),
(28, 'LOG IN', 3, '2018-02-28 14:20:58'),
(29, 'LOG IN', 3, '2018-03-01 08:22:59'),
(30, 'LOG IN', 3, '2018-03-01 16:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL,
  `sec_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_desc`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SEM_ID` int(11) NOT NULL,
  `SEM` varchar(15) NOT NULL DEFAULT 'First'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SEM_ID`, `SEM`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SUBJ_ID` int(11) NOT NULL,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE` text NOT NULL,
  `LEVEL` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJ_ID`, `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE`, `LEVEL`, `SEMESTER`, `user_id`) VALUES
(11, 'PROG131', 'Fundamentals in Programming 2', 3, '439', 'BSIS', '1', 'Second', 0),
(12, 'FOPS130', 'Fundamental in Problem Solving', 3, '', 'BSIS', '1', 'First', 0),
(13, 'HIST130', 'Philippine History', 3, '', 'BSIS', '1', 'First', 0),
(15, 'ISYS131', 'Information System Fundamentals', 3, '', 'BSIS', '1', 'First', 0),
(17, 'ENGL130', 'Study and Thinking Skills in English', 3, '', 'BSIS', '1', 'First', 0),
(18, 'DSAA131', 'Data Structure and Algorithm', 3, '438', 'BSIS', '1', 'Second', 0),
(19, 'COMP131', 'Spreadsheets with Internet Basics', 2, '438', 'BSIS', '1', 'Second', 0),
(20, 'WDPS130', 'Web Design and Programmin(static website)', 3, '438', 'BSIS', '1', 'Second', 0),
(21, 'ENGL131', 'Writing in the Discipline', 3, '17', 'BSIS', '1', 'Second', 0),
(22, 'FILI130', 'Komunikasyon sa Akademikong Filipino', 3, '', 'BSIS', '1', 'First', 0),
(23, 'VAED130', 'Self Discovery/Family with work Ethics', 2, '', 'BSIS', '1', 'First', 0),
(24, 'PE120', 'Physical Fitness', 2, '', 'BSIS', '1', 'First', 0),
(25, 'NSTP130', 'National Service Training Program', 3, '', 'BSIS', '1', 'First', 0),
(26, 'ENGLCOM131', 'Speech and Oral Communication', 3, '17', 'BSIS', '1', 'Second', 0),
(27, 'Math130', 'College Algebra', 3, '', 'BSIS', '1', 'First', 0),
(28, 'QCHP131', 'Quality Conciousness, Habits and Processes', 3, '438', 'BSIS', '1', 'Second', 0),
(29, 'MATH131', 'Plane Trigonometry', 3, '27', 'BSIS', '1', 'Second', 0),
(438, 'COMP130', 'Computer Fundamentals with Internet Concepts', 3, '', 'BSIS', '1', 'First', 0),
(439, 'PROG130', 'Fundamentals in Programming 1', 3, '', 'BSIS', '1', 'First', 0),
(440, 'FILORG132', 'File Organization with Operating System', 3, '438', 'BSIS', '1', 'Second', 0),
(441, 'PE121', 'Rhytmic Activities', 2, '24', 'BSIS', '1', 'Second', 0),
(442, 'NSTP132', 'National Service Training Program', 3, '25', 'BSIS', '1', 'Second', 0),
(443, 'DBMS231', 'Data Base Management System', 3, '11', 'BSIS', '2', 'First', 0),
(444, 'APPL231', 'Application Programming Language', 3, '11', 'BSIS', '2', 'First', 0),
(445, 'HCOMP231', 'Human Computer Interaction', 3, '438', 'BSIS', '2', 'First', 0),
(446, 'LITERA231', 'Philippine Literature', 3, '26', 'BSIS', '2', 'First', 0),
(447, 'ACCTG260', 'Fundamentals of Accounting 123', 6, '', 'BSIS', '2', 'First', 0),
(448, 'WDPD231', 'Web Design ang Programming 2 (dynamic website)', 3, '20', 'BSIS', '2', 'First', 0),
(449, 'CSYS231', 'Computer System and Organization', 3, '15', 'BSIS', '2', 'First', 0),
(450, 'PROSTA232', 'Probality and Statistics', 3, '27', 'BSIS', '2', 'First', 0),
(451, 'PE222', 'Individual Dual Sport', 3, '441', 'BSIS', '2', 'First', 0),
(452, 'PROG231', 'Introduction to Object Oriented Programming with Java', 3, '20', 'BSIS', '2', 'Second', 0),
(453, 'SAAD231', 'System Analysis and Design', 3, '443', 'BSIS', '2', 'Second', 0),
(454, 'CNET231', 'Introduction to Networking and Data Communication', 3, '448', 'BSIS', '2', 'Second', 0),
(455, 'WDPD231', 'Web Data Base Design and Development', 3, '448', 'BSIS', '2', 'Second', 0),
(456, 'MATH232', 'Analytic Geometry', 3, '27', 'BSIS', '2', 'Second', 0),
(457, 'SPFT23B', 'Seminar/Practicum/Field Trip', 3, '', 'BSIS', '2', 'Second', 0),
(458, 'PSIT232', 'Presentation Skills in IT', 3, '17', 'BSIS', '2', 'Second', 0),
(459, 'ELECT231', 'Computer Hardware and Software Maintenance ITM', 3, '', 'BSIS', '2', 'Second', 0),
(460, 'PHILO230', 'Philo of Man', 3, '', 'BSIS', '2', 'Second', 0),
(461, 'PE223', 'Team Sports', 3, '451', 'BSIS', '2', 'Second', 0),
(462, 'PROG331', 'Application and Development', 3, '443', 'BSIS', '3', 'First', 0),
(463, 'BUSN331', 'Business Finance', 3, '447', 'BSIS', '3', 'First', 0),
(464, 'ENGL332', 'Technical Writing', 3, '17', 'BSIS', '3', 'First', 0),
(465, 'MMCA331', 'Multimedia 1 (computer graphics)', 3, '', 'BSIS', '3', 'First', 0),
(466, 'ECON330', 'Principles of Economics', 3, '', 'BSIS', '3', 'First', 0),
(467, 'MGT330', 'Principles of Management', 3, '', 'BSIS', '3', 'First', 0),
(468, 'ISPLAN331', 'Information System Planning', 3, '453', 'BSIS', '3', 'First', 0),
(469, 'EVBUSP331', 'Evaluation of Business Performance', 3, '443', 'BSIS', '3', 'First', 0),
(470, 'MKTG330', 'Principles of Marketing', 3, '', 'BSIS', '3', 'First', 0),
(471, 'ELECT330', 'Content Management System (CMS) - Joomla/Drupal', 3, '', 'BSIS', '3', 'First', 0),
(472, 'CNET331', 'Network Configuration and Use', 3, '443', 'BSIS', '3', 'Second', 0),
(473, 'SYII332', 'System Infrastructure and Integration', 3, '454', 'BSIS', '3', 'Second', 0),
(474, 'TAX330', 'Principles of Taxation', 3, '', 'BSIS', '3', 'Second', 0),
(475, 'NSCI330', 'Physical Earth Science', 3, '', 'BSIS', '3', 'Second', 0),
(476, 'ACCTG361', 'Partnership and Cooperation Accounting', 6, '447', 'BSIS', '3', 'Second', 0),
(477, 'MMCA331', 'Multimedia 1 (computer animation)', 3, '465', 'BSIS', '3', 'Second', 0),
(478, 'FILI331', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 3, '22', 'BSIS', '3', 'Second', 0),
(479, 'DMAT331', 'Discrete Mathematics', 3, '18', 'BSIS', '3', 'Second', 0),
(480, 'PRACT01', 'Practicum/Office Practice', 3, '457', 'BSIS', '3', 'Summer', 0),
(481, 'ISWE431', 'Introduction to Software Engineering', 3, '18', 'BSIS', '4', 'First', 0),
(482, 'PROG431', 'Object Oriented Programming (advance c++)', 3, '439', 'BSIS', '4', 'First', 0),
(483, 'RIZAL230', 'Life, Works and Writings of Dr. Jose Rizal', 3, '', 'BSIS', '4', 'First', 0),
(484, 'LAW430', 'Law Obligation and Contracts', 3, '', 'BSIS', '4', 'First', 0),
(485, 'NSC431', 'Biological Science', 3, '475', 'BSIS', '4', 'First', 0),
(486, 'MTECH431', 'Management Technology', 3, '466', 'BSIS', '4', 'First', 0),
(487, 'ELECT430', 'Games and Development (flash/javascript)', 3, '', 'BSIS', '4', 'First', 0),
(488, 'SOCIO430', 'Introduction to General Sociology', 3, '', 'BSIS', '4', 'First', 0),
(489, 'MGT431', 'Human Behavior in Organization', 3, '467', 'BSIS', '4', 'First', 0),
(490, 'WDPD442', 'Web Server Administration', 3, '454', 'BSIS', '4', 'Second', 0),
(491, 'FSTUDY43F', 'Enterprise Resource Planning', 3, '', 'BSIS', '4', 'Second', 0),
(492, 'PETHICS431', 'Intro. to Information System Professional and Ethics', 3, '', 'BSIS', '4', 'Second', 0),
(493, 'ELECT431', 'LAN Installation and Maintenance', 3, '454', 'BSIS', '4', 'Second', 0),
(494, 'PHILGOV430', 'Philippine Government and Constitution', 3, '', 'BSIS', '4', 'Second', 0),
(495, 'GENPSY430', 'General Psychology', 3, '', 'BSIS', '4', 'Second', 0),
(496, 'BUSM431', 'Financia Managementl', 3, '463', 'BSIS', '4', 'Second', 0),
(497, 'HUMA430', 'Humanities - Art Appreciation', 3, '', 'BSIS', '4', 'Second', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstuddetails`
--

CREATE TABLE `tblstuddetails` (
  `DETAIL_ID` int(11) NOT NULL,
  `FATHER` varchar(255) NOT NULL,
  `FATHER_OCCU` varchar(255) NOT NULL,
  `MOTHER` varchar(255) NOT NULL,
  `MOTHER_OCCU` varchar(255) NOT NULL,
  `BOARDING` varchar(5) NOT NULL DEFAULT 'no',
  `WITH_FAMILY` varchar(5) NOT NULL DEFAULT 'yes',
  `GUARDIAN` varchar(255) NOT NULL,
  `GUARDIAN_ADDRESS` varchar(255) NOT NULL,
  `OTHER_PERSON_SUPPORT` varchar(255) NOT NULL,
  `ADDRESS` text NOT NULL,
  `IDNO` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstuddetails`
--

INSERT INTO `tblstuddetails` (`DETAIL_ID`, `FATHER`, `FATHER_OCCU`, `MOTHER`, `MOTHER_OCCU`, `BOARDING`, `WITH_FAMILY`, `GUARDIAN`, `GUARDIAN_ADDRESS`, `OTHER_PERSON_SUPPORT`, `ADDRESS`, `IDNO`, `user_id`) VALUES
(69, 'asdasd', 'dasd', 'dasd', 'asdasd', 'No', 'Yes', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '13-1176', 4),
(72, 'asdasd', 'sdasdas', 'asdasda', 'dasdasd', 'No', 'Yes', 'asdasd', 'asd', 'asd', 'asdasd', '00011321', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `S_ID` int(11) NOT NULL,
  `IDNO` text NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `BPLACE` text NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `AGE` int(30) NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `RELIGION` varchar(255) NOT NULL,
  `CONTACT_NO` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SEX`, `BDAY`, `BPLACE`, `STATUS`, `AGE`, `NATIONALITY`, `RELIGION`, `CONTACT_NO`, `HOME_ADD`, `EMAIL`) VALUES
(66, '13-1176', 'asd', 'asd', 'dasd', 'M', '2017-03-17', 'asdasd', 'Single', 22, 'asdasd', 'asd', '2032152454', 'asdasd', 'asd@gmail.com'),
(69, '00011321', 'asd', 'asdasd', 'asd', 'M', '2018-02-24', 'asd', 'Single', 5, 'asd', 'asdasd', '0251457', 'asdasdasd', 'asd@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `user_type`) VALUES
(3, 'SYSTEM ROOT', 'root', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', 'ROOT'),
(4, 'Santillan123', 'admin', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', 'ADMIN'),
(8, 'Eranel', 'registrar', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`acc_level_id`);

--
-- Indexes for table `ay`
--
ALTER TABLE `ay`
  ADD PRIMARY KEY (`AY_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`GRADE_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`INST_ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`YR_ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SEM_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SUBJ_ID`);

--
-- Indexes for table `tblstuddetails`
--
ALTER TABLE `tblstuddetails`
  ADD PRIMARY KEY (`DETAIL_ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `acc_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ay`
--
ALTER TABLE `ay`
  MODIFY `AY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `INST_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `YR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `SEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;
--
-- AUTO_INCREMENT for table `tblstuddetails`
--
ALTER TABLE `tblstuddetails`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
