-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 05:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `admname` varchar(32) NOT NULL,
  `admpassword` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admname`, `admpassword`) VALUES
('root', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE IF NOT EXISTS `exam_tbl` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `question` text NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `student_option` varchar(100) NOT NULL,
  `score` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`id`, `course_id`, `student_id`, `question`, `a`, `b`, `c`, `d`, `correct`, `student_option`, `score`) VALUES
(40, 1, 16, 'Anchor Text is displayed in which color by default?', 'red', 'green', 'blue', 'black', 'c', '', ''),
(41, 1, 16, ' The first page of a website is called?', 'home page', 'design page', 'main page', 'first page', 'a', '', ''),
(42, 1, 16, 'There are how many types of lists in HTML?', '1', '2', '3', '4', 'c', '', ''),
(43, 1, 16, ' Which of the following are attributes of Font Tag?', 'face', 'size', 'color', 'all of the above.', 'd', '', ''),
(44, 1, 16, 'Circle odd one tag of HTML?', 'table', 'tr', 'td', 'form', 'd', '', ''),
(45, 1, 16, 'There are how many Heading Tags?', '5', '6', '4', '3', 'b', '', ''),
(46, 1, 16, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(47, 1, 11, 'Which of the following is used to increase height of row in table? ', 'colspan', 'rowspan', 'cellspacing', 'cellpadding', 'b', '', ''),
(48, 1, 11, 'Circle odd one tag of HTML?', 'table', 'tr', 'td', 'form', 'd', '', ''),
(78, 1, 11, ' The first page of a website is called?', 'home page', 'design page', 'main page', 'first page', 'a', '', ''),
(79, 1, 11, 'There are how many Heading Tags?', '5', '6', '4', '3', 'b', '', ''),
(80, 1, 11, 'Caption Tag in HTML?', 'used to display title for table.', 'used for capturing information to user.', 'provide information to the browser.', 'none of the above', 'a', '', ''),
(81, 1, 11, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(82, 1, 11, 'HTML is considered as _________ language.', 'OOP LANGUAGE', 'sructural anguage', 'mark up language', 'none of the above', 'c', '', ''),
(83, 1, 11, 'There are how many types of lists in HTML?', '1', '2', '3', '4', 'c', '', ''),
(84, 1, 11, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(85, 1, 11, 'Caption Tag in HTML?', 'used to display title for table.', 'used for capturing information to user.', 'provide information to the browser.', 'none of the above', 'a', '', ''),
(86, 1, 11, ' Which of the following are attributes of Font Tag?', 'face', 'size', 'color', 'all of the above.', 'd', '', ''),
(87, 1, 11, 'A webpage displays a picture. What tag was used to display that picture?', 'image', 'img', 'pic', 'phpto', 'b', '', ''),
(88, 1, 11, 'There are how many Heading Tags?', '5', '6', '4', '3', 'b', '', ''),
(89, 1, 11, 'There are how many types of lists in HTML?', '1', '2', '3', '4', 'c', '', ''),
(90, 1, 11, 'HTML is considered as _________ language.', 'OOP LANGUAGE', 'sructural anguage', 'mark up language', 'none of the above', 'c', '', ''),
(91, 1, 11, 'Circle odd one tag of HTML?', 'table', 'tr', 'td', 'form', 'd', '', ''),
(92, 1, 11, 'Anchor Text is displayed in which color by default?', 'red', 'green', 'blue', 'black', 'c', '', ''),
(93, 1, 11, ' The first page of a website is called?', 'home page', 'design page', 'main page', 'first page', 'a', '', ''),
(94, 1, 11, 'There are how many Heading Tags?', '5', '6', '4', '3', 'b', '', ''),
(95, 1, 11, 'Anchor Text is displayed in which color by default?', 'red', 'green', 'blue', 'black', 'c', '', ''),
(96, 1, 11, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(97, 1, 11, 'A webpage displays a picture. What tag was used to display that picture?', 'image', 'img', 'pic', 'phpto', 'b', '', ''),
(98, 1, 11, ' The first page of a website is called?', 'home page', 'design page', 'main page', 'first page', 'a', '', ''),
(99, 1, 16, 'Caption Tag in HTML?', 'used to display title for table.', 'used for capturing information to user.', 'provide information to the browser.', 'none of the above', 'a', '', ''),
(100, 1, 16, 'HTML is considered as _________ language.', 'OOP LANGUAGE', 'sructural anguage', 'mark up language', 'none of the above', 'c', '', ''),
(101, 1, 16, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(102, 1, 16, ' Which of the following are attributes of Font Tag?', 'face', 'size', 'color', 'all of the above.', 'd', '', ''),
(103, 1, 11, 'Which of the following is used to increase height of row in table? ', 'colspan', 'rowspan', 'cellspacing', 'cellpadding', 'b', '', ''),
(104, 1, 11, 'There are how many types of lists in HTML?', '1', '2', '3', '4', 'c', '', ''),
(105, 1, 11, 'Circle odd one tag of HTML?', 'table', 'tr', 'td', 'form', 'd', '', ''),
(106, 1, 11, 'A webpage displays a picture. What tag was used to display that picture?', 'image', 'img', 'pic', 'phpto', 'b', '', ''),
(107, 1, 16, 'How many  types of heading do we have in html?', '6', '2', '1', '5', 'a', '', ''),
(108, 1, 16, 'Anchor Text is displayed in which color by default?', 'red', 'green', 'blue', 'black', 'c', '', ''),
(109, 1, 16, ' The first page of a website is called?', 'home page', 'design page', 'main page', 'first page', 'a', '', ''),
(110, 1, 16, 'HTML stand for....', 'Hypertext MarkUp language', 'Hyper text Multipe language', 'Hypertext Mutimedia language', 'Hyperlink markup Language', 'a', '', ''),
(111, 1, 16, 'How many  types of heading do we have in html?', '6', '2', '1', '5', 'a', '', ''),
(112, 1, 16, 'There are how many types of lists in HTML?', '1', '2', '3', '4', 'c', '', ''),
(113, 1, 16, 'A webpage displays a picture. What tag was used to display that picture?', 'image', 'img', 'pic', 'phpto', 'b', '', ''),
(114, 1, 16, 'What is the type for anchor for hyperlink?', 'a', 'href', 'br', 'herlink', 'a', '', ''),
(115, 1, 16, 'Anchor Text is displayed in which color by default?', 'red', 'green', 'blue', 'black', 'c', '', '0'),
(116, 1, 16, 'Which of the following is used to increase height of row in table? ', 'colspan', 'rowspan', 'cellspacing', 'cellpadding', 'b', '', '0'),
(117, 1, 16, 'There are how many Heading Tags?', '5', '6', '4', '3', 'b', '', '0'),
(118, 1, 16, 'How many  types of heading do we have in html?', '6', '2', '1', '5', 'a', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `testid` bigint(20) NOT NULL DEFAULT '0',
  `qnid` int(11) NOT NULL DEFAULT '0',
  `question` varchar(500) DEFAULT NULL,
  `optiona` varchar(100) DEFAULT NULL,
  `optionb` varchar(100) DEFAULT NULL,
  `optionc` varchar(100) DEFAULT NULL,
  `optiond` varchar(100) DEFAULT NULL,
  `correctanswer` enum('optiona','optionb','optionc','optiond') DEFAULT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`testid`, `qnid`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `correctanswer`, `marks`) VALUES
(1, 1, '1+1=', '2', '3', '4', '5', 'optiona', 2),
(1, 2, '2*2=', '4', '3', '5', '8', 'optiona', 2),
(1, 3, '2-1=', '1', '2', '3', '4', 'optiona', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stdid` bigint(20) NOT NULL,
  `stdname` varchar(40) DEFAULT NULL,
  `stdpassword` varchar(40) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdid`, `stdname`, `stdpassword`, `emailid`, `contactno`, `address`, `city`, `pincode`) VALUES
(1, 'student', 'úÏ…W§', 'student@student.com', '08043542212', '12, Afe st', 'Jos', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `studentquestion`
--

CREATE TABLE IF NOT EXISTS `studentquestion` (
  `stdid` bigint(20) NOT NULL DEFAULT '0',
  `testid` bigint(20) NOT NULL DEFAULT '0',
  `qnid` int(11) NOT NULL DEFAULT '0',
  `answered` enum('answered','unanswered','review') DEFAULT NULL,
  `stdanswer` enum('optiona','optionb','optionc','optiond') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentquestion`
--

INSERT INTO `studentquestion` (`stdid`, `testid`, `qnid`, `answered`, `stdanswer`) VALUES
(1, 1, 1, 'unanswered', 'optiond'),
(1, 1, 2, 'unanswered', 'optionc'),
(1, 1, 3, 'review', 'optionb');

-- --------------------------------------------------------

--
-- Table structure for table `studenttest`
--

CREATE TABLE IF NOT EXISTS `studenttest` (
  `stdid` bigint(20) NOT NULL DEFAULT '0',
  `testid` bigint(20) NOT NULL DEFAULT '0',
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `correctlyanswered` int(11) DEFAULT NULL,
  `status` enum('over','inprogress') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttest`
--

INSERT INTO `studenttest` (`stdid`, `testid`, `starttime`, `endtime`, `correctlyanswered`, `status`) VALUES
(1, 1, '2016-12-07 04:55:52', '2016-12-07 05:04:52', 0, 'inprogress');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(40) DEFAULT NULL,
  `subdesc` varchar(100) DEFAULT NULL,
  `tcid` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `subdesc`, `tcid`) VALUES
(1, 'mts', 'calculation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `testid` bigint(20) NOT NULL,
  `testname` varchar(30) NOT NULL,
  `testdesc` varchar(100) DEFAULT NULL,
  `testdate` date DEFAULT NULL,
  `testtime` time DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  `testfrom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `testto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` int(11) DEFAULT NULL,
  `totalquestions` int(11) DEFAULT NULL,
  `attemptedstudents` bigint(20) DEFAULT NULL,
  `testcode` varchar(40) NOT NULL,
  `tcid` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testid`, `testname`, `testdesc`, `testdate`, `testtime`, `subid`, `testfrom`, `testto`, `duration`, `totalquestions`, `attemptedstudents`, `testcode`, `tcid`) VALUES
(1, 'mts 101', 'first test', '2016-12-06', '20:28:43', 1, '2016-12-07 13:28:43', '2016-12-14 07:59:59', 9, 3, 0, '.»Å', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testconductor`
--

CREATE TABLE IF NOT EXISTS `testconductor` (
  `tcid` bigint(20) NOT NULL,
  `tcname` varchar(40) DEFAULT NULL,
  `tcpassword` varchar(40) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admname`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`testid`,`qnid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stdid`), ADD UNIQUE KEY `stdname` (`stdname`), ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `studentquestion`
--
ALTER TABLE `studentquestion`
  ADD PRIMARY KEY (`stdid`,`testid`,`qnid`), ADD KEY `testid` (`testid`,`qnid`);

--
-- Indexes for table `studenttest`
--
ALTER TABLE `studenttest`
  ADD PRIMARY KEY (`stdid`,`testid`), ADD KEY `testid` (`testid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`), ADD UNIQUE KEY `subname` (`subname`), ADD KEY `subject_fk1` (`tcid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testid`), ADD UNIQUE KEY `testname` (`testname`), ADD KEY `test_fk1` (`subid`), ADD KEY `test_fk2` (`tcid`);

--
-- Indexes for table `testconductor`
--
ALTER TABLE `testconductor`
  ADD PRIMARY KEY (`tcid`), ADD UNIQUE KEY `stdname` (`tcname`), ADD UNIQUE KEY `emailid` (`emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`testid`) REFERENCES `test` (`testid`);

--
-- Constraints for table `studentquestion`
--
ALTER TABLE `studentquestion`
ADD CONSTRAINT `studentquestion_ibfk_1` FOREIGN KEY (`stdid`) REFERENCES `student` (`stdid`),
ADD CONSTRAINT `studentquestion_ibfk_2` FOREIGN KEY (`testid`, `qnid`) REFERENCES `question` (`testid`, `qnid`);

--
-- Constraints for table `studenttest`
--
ALTER TABLE `studenttest`
ADD CONSTRAINT `studenttest_ibfk_1` FOREIGN KEY (`stdid`) REFERENCES `student` (`stdid`),
ADD CONSTRAINT `studenttest_ibfk_2` FOREIGN KEY (`testid`) REFERENCES `test` (`testid`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
ADD CONSTRAINT `subject_fk1` FOREIGN KEY (`tcid`) REFERENCES `testconductor` (`tcid`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
ADD CONSTRAINT `test_fk1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`),
ADD CONSTRAINT `test_fk2` FOREIGN KEY (`tcid`) REFERENCES `testconductor` (`tcid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
