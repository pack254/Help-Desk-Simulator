-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 04:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesksimulator`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `answer` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assID` int(10) NOT NULL,
  `assName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `assDate` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `assTrimester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `assYear` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `assAllocateTime` int(10) NOT NULL,
  `assTotalMark` int(10) NOT NULL,
  `assStatus` enum('enable','unable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unable',
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assID`, `assName`, `assDate`, `assTrimester`, `assYear`, `assAllocateTime`, `assTotalMark`, `assStatus`, `userID`) VALUES
(1, 'Assessment1', '2016-12-13 16:04:12', 'Tri1', '2016', 20, 30, 'enable', 1),
(2, 'Assessment3', '2016-10-12 09:44:44', 'Tri1', '2016', 45, 60, 'unable', 1),
(3, 'Assessment2', '2016-10-12 09:44:20', 'Tri1', '2016', 45, 60, 'unable', 1),
(4, 'Assessment4', '2016-10-12 10:53:16', 'Tri1', '2016', 60, 100, 'unable', 1),
(5, 'Assessment4', '2016-10-12 10:54:17', 'Tri1', '2016', 60, 100, 'unable', 1),
(6, 'Assessment4', '2016-10-12 10:56:08', 'Tri1', '2016', 60, 100, 'unable', 1),
(7, 'Assessment4', '2016-10-12 10:56:21', 'Tri1', '2016', 60, 100, 'unable', 1),
(8, 'Assessment4', '2016-10-12 10:58:08', 'Tri1', '2016', 60, 100, 'unable', 1),
(9, 'Assessment4', '2016-10-12 10:59:16', 'Tri1', '2016', 60, 100, 'unable', 1),
(10, 'Assessment4', '2016-10-12 10:59:28', 'Tri1', '2016', 60, 100, 'unable', 1),
(11, 'Assessment4', '2016-10-12 10:59:37', 'Tri1', '2016', 60, 100, 'unable', 1),
(12, 'Assessment4', '2016-10-12 10:59:54', 'Tri1', '2016', 60, 100, 'unable', 1),
(13, 'Assessment4', '2016-10-12 10:59:55', 'Tri1', '2016', 60, 100, 'unable', 1),
(14, 'Assessment4', '2016-10-12 10:59:56', 'Tri1', '2016', 60, 100, 'unable', 1),
(15, 'Assessment4', '2016-10-12 10:59:56', 'Tri1', '2016', 60, 100, 'unable', 1),
(16, 'Assessment4', '2016-10-12 10:59:57', 'Tri1', '2016', 60, 100, 'unable', 1),
(17, 'Assessment4', '2016-10-12 10:59:57', 'Tri1', '2016', 60, 100, 'unable', 1),
(18, 'Assessment4', '2016-10-12 11:02:00', 'Tri1', '2016', 60, 100, 'unable', 1),
(19, 'Assessment4', '2016-10-12 11:02:54', 'Tri1', '2016', 60, 100, 'unable', 1),
(20, 'Assessment4', '2016-10-12 11:03:19', 'Tri1', '2016', 60, 100, 'unable', 1),
(21, 'Assessment4', '2016-10-12 11:03:57', 'Tri1', '2016', 60, 100, 'unable', 1),
(22, 'Assessment4', '2016-10-12 11:04:51', 'Tri1', '2016', 60, 100, 'unable', 1),
(23, 'Assessment4', '2016-10-12 11:05:25', 'Tri1', '2016', 60, 100, 'unable', 1),
(24, 'Assessment4', '2016-10-12 11:06:03', 'Tri1', '2016', 60, 100, 'unable', 1),
(25, 'Assessment4', '2016-10-12 11:06:20', 'Tri1', '2016', 60, 100, 'unable', 1),
(26, 'Assessment4', '2016-10-12 11:06:49', 'Tri1', '2016', 60, 100, 'unable', 1),
(27, 'Assessment4', '2016-10-12 11:07:46', 'Tri1', '2016', 60, 100, 'unable', 1),
(28, 'Assessment4', '2016-10-12 11:08:10', 'Tri1', '2016', 60, 100, 'unable', 1),
(29, 'Assessment4', '2016-10-12 11:13:41', 'Tri1', '2016', 60, 100, 'unable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(10) NOT NULL,
  `commentDescription` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `commentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticketID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `commentDescription`, `commentDate`, `ticketID`, `userID`) VALUES
(39, 'good test', '2016-10-08 20:37:36', 6, 2),
(42, 'test', '2016-10-08 20:56:08', 6, 1),
(43, 'test 1', '2016-10-11 11:34:11', 156, 1),
(44, 'test 1', '2016-10-11 11:36:20', 156, 1),
(45, 'Good as good', '2016-10-11 12:10:49', 156, 2),
(46, 'test2', '2016-10-11 13:30:51', 156, 1),
(47, 'test2', '2016-10-11 13:31:20', 156, 1),
(48, 'test23', '2016-10-11 13:31:40', 156, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(10) NOT NULL,
  `questionNo` int(5) NOT NULL,
  `questionDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `questionType` enum('multiple','written') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'written',
  `questionMaxMark` decimal(3,1) NOT NULL,
  `questionCorrectAns` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `questionTimeLimit` int(10) NOT NULL,
  `assID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `questionNo`, `questionDescription`, `questionType`, `questionMaxMark`, `questionCorrectAns`, `questionTimeLimit`, `assID`) VALUES
(1, 1, 'Description is being here', 'written', '5.0', 'test', 5, 1),
(2, 2, 'Description is being here', 'written', '4.5', 'Test question 2', 5, 1),
(3, 3, 'Description is being here', 'written', '5.0', 'test question3', 4, 1),
(4, 4, 'This is question 4 ', 'written', '5.0', 'Correct answer is here', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketID` int(10) NOT NULL,
  `ticketNo` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `ticketTitle` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ticketDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ticketAffectUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ticketCatalouge` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ticketImpact` enum('low','medium','high') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'low',
  `ticketUrgency` enum('low','medium','high') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'low',
  `ticketPriority` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `ticketStatus` enum('open','in progress','close') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `ticketDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticketAssign` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ticketPrimeryOwn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ticketSource` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ticketGroup` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ticketRoom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ticketAffectItem` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ticketSpendTime` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketID`, `ticketNo`, `ticketTitle`, `ticketDescription`, `ticketAffectUser`, `ticketCatalouge`, `ticketImpact`, `ticketUrgency`, `ticketPriority`, `ticketStatus`, `ticketDate`, `ticketAssign`, `ticketPrimeryOwn`, `ticketSource`, `ticketGroup`, `ticketRoom`, `ticketAffectItem`, `ticketSpendTime`, `userID`) VALUES
(156, 'IR26049', 'test', 'This is test time has been increment or not. and it is working as I am expected or not try hard enough.', 'Tim Havert', 'Configuration Data Problems', 'low', 'low', '1', 'in progress', '2016-10-29 15:29:19', 'None', 'Tim Havert', 'Console', 'Tier1', 'test', '', 194, 2),
(158, 'IR67922', '', '', '', '', 'low', 'low', '', 'open', '2016-10-12 01:13:21', '', '', '', '', '', '', 0, 1),
(161, 'IR83468', '', '', '', '', 'low', 'low', '', 'open', '2016-10-12 02:47:50', '', '', '', '', '', '', 0, 1),
(162, 'IR99383', '', '', '', '', 'low', 'low', '', 'open', '2016-10-12 13:01:52', '', '', '', '', '', '', 0, 1),
(163, 'IR79520', '', '', '', '', 'low', 'low', '', 'open', '2016-10-12 13:01:54', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `userID` int(10) NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userFirstName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `userLastName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userPhoneNo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userYear` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userRegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userStuNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userStatus` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `userType` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`userID`, `userName`, `userPassword`, `userFirstName`, `userLastName`, `userEmail`, `userPhoneNo`, `userYear`, `userRegisterDate`, `userStuNumber`, `userStatus`, `userType`) VALUES
(1, 'pack254', 'power254', 'Siripong', 'Gaewmaneechot', 'ppack254@gmail.com', '0221320993', '2016', '2016-10-06 09:10:18', '2567223', 'yes', 'admin'),
(2, 'momotea254', 'power254', 'Tim', 'Havert', 'pack254@hotmail.com', '021443356', '2016', '2016-10-30 06:10:29', '1223311', 'yes', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `questionID` (`questionID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `ticketID` (`ticketID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `assID` (`assID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `ticket_comment_by_users_fk` FOREIGN KEY (`userID`) REFERENCES `user_account` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `ass_has_questions_fk` FOREIGN KEY (`assID`) REFERENCES `assessment` (`assID`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `tickets_own_by_users_fk` FOREIGN KEY (`userID`) REFERENCES `user_account` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
