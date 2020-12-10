-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 09:39 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bjekqemy_ball`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameId` int(11) NOT NULL,
  `teamId` varchar(50) DEFAULT NULL,
  `teamName` varchar(50) DEFAULT NULL,
  `teamScore` int(2) DEFAULT NULL,
  `opponentId` varchar(50) DEFAULT NULL,
  `opponentName` varchar(50) DEFAULT NULL,
  `opponentScore` int(2) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `datex` varchar(50) DEFAULT NULL,
  `timex` varchar(25) DEFAULT NULL,
  `confirm` varchar(5) DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameId`, `teamId`, `teamName`, `teamScore`, `opponentId`, `opponentName`, `opponentScore`, `location`, `datex`, `timex`, `confirm`, `timeStamp`) VALUES
(208, '84', 'Braves', 1, '72', 'swig', 1, NULL, '2020-11-30', '07:07', 'yes', '2020-11-13 02:15:15'),
(210, '72', 'swig', 8, '73', 'bens boyz', 1, NULL, '2020-11-18', '11:11', 'yes', '2020-11-13 02:15:15'),
(211, '83', 'steve', 1, '72', 'swig', 2, NULL, '2020-11-05', '03:33', 'yes', '2020-11-13 02:15:15'),
(226, '84', 'Braves', 17, '73', 'bens boyz', 0, NULL, '2020-11-02', '05:55', 'yes', '2020-11-13 02:19:42'),
(227, '90', 'TeamTop', 9, '72', 'swig', 0, NULL, '2020-11-04', '20:08', 'yes', '2020-12-02 16:54:20'),
(228, '84', NULL, 12, '72', 'swig', 9, NULL, '2020-11-05', '15:30', 'yes', '2020-11-12 02:37:41'),
(238, '73', NULL, 1, '84', 'Braves', 7, NULL, '2020-11-13', '05:55', NULL, '2020-11-12 15:55:18'),
(241, '73', 'bens boyz', 1, 'unlisted', NULL, 2, NULL, '2020-11-03', '11:11', NULL, '2020-11-13 02:17:11'),
(242, '73', 'bens boyz', 5, 'unlisted', NULL, 1, NULL, '2020-11-06', '04:44', NULL, '2020-11-13 02:38:43'),
(244, '73', 'bens boyz', 0, NULL, NULL, NULL, NULL, '2020-11-01', '02:22', NULL, '2020-11-13 02:50:00'),
(248, '73', 'bens boyz', 4, 'unlisted', NULL, 1, NULL, '2020-11-19', '12:12', NULL, '2020-11-20 22:19:21'),
(250, '73', 'bens boyz', 3, '72', 'swig', 2, 'usfa', '2020-11-03', '15:33', NULL, '2020-11-21 02:38:07'),
(252, '73', 'bens boyz', 4, 'unlisted', NULL, 1, 'usssa', '2020-11-14', '14:00', NULL, '2020-11-21 15:36:48'),
(253, '71', 'higgy', 1, 'unlisted', NULL, 1, 'afrendli', '2020-11-03', '15:33', NULL, '2020-11-22 00:41:41'),
(254, '71', 'higgy', 1, NULL, NULL, 0, NULL, '2020-11-19', '23:00', NULL, '2020-11-30 15:02:09'),
(255, '99', 'snowflakes.barney', 4, '89', 'Serious Ball', 1, 'little league', '2020-12-10', '22:30', 'yes', '2020-12-04 19:23:15'),
(257, '101', 'ben.ben', 1, '99', 'snowflakes.barney', 5, 'gsa', '2020-12-03', '13:39', 'yes', '2020-12-07 17:39:29'),
(258, '101', 'ben.ben', 0, '84', 'Braves', 22, 'asa', '2020-12-02', '13:39', NULL, '2020-12-07 17:38:45'),
(259, '71', 'higgy', 15, '100', 'raindrops.smokey', 1, 'gsa', '2020-12-01', '02:22', 'yes', '2020-12-05 16:09:51'),
(260, '71', 'higgy', 9, '84', 'Braves', 16, 'other', '2020-12-22', '11:11', NULL, '2020-12-05 16:09:24'),
(261, '71', 'higgy', 4, '100', 'raindrops.smokey', 1, 'usssa', '2020-11-30', '12:30', NULL, '2020-12-06 22:14:04'),
(262, '101', 'ben.ben', 5, '99', 'snowflakes.barney', 3, 'usssa', '2020-12-16', '15:33', 'yes', '2020-12-07 17:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `inviteTeam`
--

CREATE TABLE `inviteTeam` (
  `inviteTeamId` int(11) NOT NULL,
  `inviteTeamName` varchar(50) DEFAULT NULL,
  `inviteTeamCoach` varchar(50) DEFAULT NULL,
  `inviteTeamEmail` varchar(50) DEFAULT NULL,
  `inviteTeamPhone` varchar(50) DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inviteTeam`
--

INSERT INTO `inviteTeam` (`inviteTeamId`, `inviteTeamName`, `inviteTeamCoach`, `inviteTeamEmail`, `inviteTeamPhone`, `timeStamp`) VALUES
(1, 'trialteam', 'stevenhigginbotham', 'godnhiggy@gmail.com', '', '2020-11-10 13:52:36'),
(2, 'homers', '', 'godnhiggy@gmail.com', '6787946711', '2020-11-13 02:17:25'),
(3, 'gators', '', '', '', '2020-11-13 02:50:00'),
(4, 'frankies', 'frank', 'frank@frank.com', '9878789876', '2020-11-20 22:20:56'),
(5, 'truegrit', 'tuty', 't@t.com', '8987898789', '2020-11-21 00:35:14'),
(6, 'mangos', 'mongo', 'mongo@mongo.com', '8989898989', '2020-11-21 00:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `messageId` int(11) NOT NULL,
  `messageSender` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `messageReceiver` varchar(20) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`messageId`, `messageSender`, `message`, `messageReceiver`, `timeStamp`) VALUES
(1, 'ben.ben', 'secondmessage', '', '2020-12-08 13:11:59'),
(2, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 19 Dec 2020<br>Proposed Time: 4:44 am<br>Proposed location: calhoun<br>Special Notes: Bring winter coats<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 13:11:59'),
(3, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Wed, 16 Dec 2020<br>Proposed Time: 5:55 am<br>Proposed location: adairsville<br>Special Notes: call me later<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 13:12:27'),
(4, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Wed, 02 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: werre<br>Special Notes: werewr<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 13:14:34'),
(5, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 12 Dec 2020<br>Proposed Time: 5:55 am<br>Proposed location: asdf<br>Special Notes: asf<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 13:45:03'),
(6, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Fri, 08 Aug 0008<br>Proposed Time: 3:33 pm<br>Proposed location: hhhh<br>Special Notes: gggg<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 14:02:23'),
(7, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 12 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: fff<br>Special Notes: gggg<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 14:16:25'),
(8, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Fri, 08 Aug 0008<br>Proposed Time: 3:33 pm<br>Proposed location: hhhh<br>Special Notes: gggg<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 14:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `passWord` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `textNumber` varchar(20) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `ageGroup` int(2) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `userName`, `passWord`, `email`, `textNumber`, `sport`, `ageGroup`, `teamName`, `timeStamp`) VALUES
(71, 'higgy', 'bfbce1091197d441050143686ea8ec6b', 'ben@coachhiggy.com', '8888888888', 'baseball', 0, 'higgy', '2020-12-05 18:09:55'),
(72, 'swig', '2d0dfa5abdd3d197a2b30bdb62d48664', 'ben@coachhiggy.com', '6666666666', 'baseball', 0, 'swig', '2020-12-05 18:10:09'),
(73, 'ben', '7fe4771c008a22eb763df47d19e2c6aa', 'ben@coachhiggy.com', '3333333333', 'baseball', 0, 'bens boyz', '2020-12-05 18:10:19'),
(83, 'steve', 'd69403e2673e611d4cbd3fad6fd1788e', 'ben@coachhiggy.com', '1234567890', 'baseball', 10, 'steve', '2020-12-05 18:10:32'),
(84, 'ben higginbotham', '46db254d3d3017d2bb4ac5ef5b3c5afa', 'ben@coachhiggy.com', '9999999999', 'baseball', 10, 'Braves', '2020-12-05 18:10:47'),
(89, 'smith', 'a66e44736e753d4533746ced572ca821', 'ben@coachhiggy.com', '6788767876', 'baseball', 10, 'Serious Ball', '2020-12-05 18:11:01'),
(99, 'barney', '73d94ca09de7d23b853273b035cbc752', 'ben@coachhiggy.com', '787898789', 'softball', 14, 'snowflakes.barney', '2020-12-05 18:11:12'),
(100, 'smokey', '82e4010701956651c3f653309879aec4', 'ben@coachhiggy.com', '789878987', 'softball', 14, 'raindrops.smokey', '2020-12-05 18:11:23'),
(101, 'ben', '7fe4771c008a22eb763df47d19e2c6aa', 'ben@coachhiggy.com', '567456354', 'softball', 14, 'ben.ben', '2020-12-05 18:11:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `inviteTeam`
--
ALTER TABLE `inviteTeam`
  ADD PRIMARY KEY (`inviteTeamId`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `inviteTeam`
--
ALTER TABLE `inviteTeam`
  MODIFY `inviteTeamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
