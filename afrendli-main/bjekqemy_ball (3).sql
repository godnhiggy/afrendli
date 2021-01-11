-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2021 at 07:10 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `David_Tarver`
--

CREATE TABLE `David_Tarver` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `David_Tarver`
--

INSERT INTO `David_Tarver` (`id`, `message`, `receiver`, `timestamp`) VALUES
(1, 'Hello', 'Stacy_Ben', '2021-01-01 23:41:50'),
(2, 'Hello', 'Stacy_Ben', '2021-01-01 23:44:05'),
(3, 'Hello ', 'Wes_Tye', '2021-01-01 23:45:57'),
(4, 'Welcome to Afrendli', 'Wes_Tye', '2021-01-01 23:46:08');

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
(172, '53', 'Xtreme_Nelson', 5, '50', 'Stacy_Ben', 2, 'usssa', '2020-12-15', '18:14', 'yes', '2020-12-23 03:37:15'),
(173, '54', 'WildCats_Tarver', 69, '52', 'Georgiapeaches_Higgy', 1, 'afrendli', '2020-12-22', '21:29', NULL, '2020-12-23 02:29:41'),
(182, '67', 'shotgun_shells', 3, '51', 'Wes_Tye', 1, 'usssa', '2021-01-10', '14:30', 'yes', '2021-01-02 03:21:54'),
(183, '67', 'shotgun_shells', 12, '51', 'Wes_Tye', 1, 'gsa', '2020-12-28', '11:11', NULL, '2021-01-02 02:14:36'),
(184, '67', 'shotgun_shells', 3, '51', 'Wes_Tye', 0, 'asa', '0001-11-04', '11:11', 'yes', '2021-01-02 03:21:57'),
(185, '67', 'shotgun_shells', 4, '51', 'Wes_Tye', 1, 'usfa', '2021-01-07', '14:00', 'yes', '2021-01-02 03:21:56'),
(186, '51', 'Wes_Tye', 3, '67', 'shotgun_shells', 2, 'nsa', '2020-12-30', '14:22', 'yes', '2021-01-02 03:33:42'),
(187, '68', 'ga_peaches', 3, '51', 'Wes_Tye', 14, 'gsa', '2020-12-30', '17:00', 'yes', '2021-01-02 05:06:35'),
(188, '67', 'shotgun_shells', 5, '68', 'ga_peaches', 4, 'usssa', '2021-01-01', '09:00', 'yes', '2021-01-02 03:38:55'),
(189, '51', 'Wes_Tye', 6, '68', 'ga_peaches', 2, 'afrendli', '2020-12-26', '15:00', NULL, '2021-01-02 05:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `ga_peaches`
--

CREATE TABLE `ga_peaches` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ga_peaches`
--

INSERT INTO `ga_peaches` (`id`, `message`, `receiver`, `timestamp`) VALUES
(1, 'Hello !<br>ga_peaches would like to know if you would like to schedule a game! <br>Proposed Date: Wed, 13 Jan 2021<br>Proposed Time: 4:00 pm<br>Proposed location: florida<br>Special Notes: bring sunscreen', 'shotgun_shells', '2021-01-02 03:24:58'),
(2, 'hey coach did yo get logged in yet?', 'Xtreme_Nelson', '2021-01-02 14:18:10');

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
(21, 'OntheBeach', 'Smith', 'Ben@coachhiggy.com', '', '2020-12-23 13:45:03'),
(22, 'we lost', '', 'godnhiggy@gmail.com', '6787946711', '2021-01-01 03:09:16'),
(23, 'We won', '', 'admin@afrendli.com', '', '2021-01-01 04:24:33');

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
(8, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Fri, 08 Aug 0008<br>Proposed Time: 3:33 pm<br>Proposed location: hhhh<br>Special Notes: gggg<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-08 14:17:53'),
(9, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 12 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: adairsville<br>Special Notes: nothing spectacular<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-11 13:57:05'),
(10, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 12 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: adairsville<br>Special Notes: nothing spectacular<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-11 13:58:11'),
(11, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 12 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: adairsville<br>Special Notes: nothing spectacular<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-11 14:01:35'),
(12, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Thu, 17 Dec 2020<br>Proposed Time: 7:00 pm<br>Proposed location: adfd<br>Special Notes: asdfsd<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-11 14:22:56'),
(13, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Wed, 09 Dec 2020<br>Proposed Time: 12:51 pm<br>Proposed location: aasdfsd<br>Special Notes: asdfsdf<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-14 17:51:25'),
(14, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 02 Jan 2021<br>Proposed Time: 12:56 pm<br>Proposed location: asf<br>Special Notes: adf<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-14 17:53:13'),
(15, 'ben.ben', '<br>Hello ben@coachhiggy.com!<br>ben.ben would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 26 Dec 2020<br>Proposed Time: 3:33 am<br>Proposed location: dallas<br>Special Notes: bring gloves<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-14 18:45:58'),
(16, 'workthe_system', '<br>Hello ben@coachhiggy.com!<br>workthe_system would like to know if you would like to schedule a game! <br>Proposed Date: Thu, 10 Dec 2020<br>Proposed Time: 9:00 pm<br>Proposed location: florida<br>Special Notes: hot weather<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=ben@coachhiggy.com\'>Click to Login and Respond to the game request!</a>', 'higgy', '2020-12-15 03:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleGame`
--

CREATE TABLE `scheduleGame` (
  `ScheduleGameId` int(11) NOT NULL,
  `messageSender` varchar(50) NOT NULL,
  `messageReceiver` varchar(50) NOT NULL,
  `datex` varchar(50) NOT NULL,
  `timex` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `specialNotes` varchar(500) DEFAULT NULL,
  `confirm` varchar(3) DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduleGame`
--

INSERT INTO `scheduleGame` (`ScheduleGameId`, `messageSender`, `messageReceiver`, `datex`, `timex`, `location`, `specialNotes`, `confirm`, `timeStamp`) VALUES
(40, 'jingle_bells', 'try_again', 'Tue, 05 Jan 2021', '11:11 am', 'asd', 'asd', NULL, '2021-01-02 01:10:54'),
(41, 'jingle_bells', 'try_again', 'Sun, 10 Jan 2021', '11:11 am', 'www', 'smackdown', NULL, '2021-01-02 01:12:36'),
(42, 'jingle_bells', 'fishing_trip', 'Mon, 28 Dec 2020', '3:33 am', 'aaa', 'aaa', NULL, '2021-01-02 01:22:57'),
(43, 'shotgun_shells', 'Xtreme_Nelson', 'Wed, 06 Jan 2021', '11:11 am', 'florida', 'sunshine', NULL, '2021-01-02 02:33:46'),
(44, 'ga_peaches', 'shotgun_shells', 'Wed, 13 Jan 2021', '4:00 pm', 'florida', 'bring sunscreen', 'yes', '2021-01-02 03:33:00'),
(45, 'shotgun_shells', 'Wes_Tye', 'Sat, 23 Jan 2021', '4:00 pm', 'Florida', 'Talk details later', 'yes', '2021-01-02 05:05:51'),
(46, 'Wes_Tye', 'Xtreme_Nelson', 'Sat, 16 Jan 2021', '2:00 pm', 'florida', 'details later', NULL, '2021-01-02 05:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `shotgun_shells`
--

CREATE TABLE `shotgun_shells` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shotgun_shells`
--

INSERT INTO `shotgun_shells` (`id`, `message`, `receiver`, `timestamp`) VALUES
(1, 'Hello !<br>shotgun_shells would like to know if you would like to schedule a game! <br>Proposed Date: Wed, 06 Jan 2021<br>Proposed Time: 11:11 am<br>Proposed location: florida<br>Special Notes: sunshine', 'Xtreme_Nelson', '2021-01-02 02:33:46'),
(2, 'Yes we would and i sent you a confirmation', 'ga_peaches', '2021-01-02 03:35:00'),
(3, 'Hello !<br>shotgun_shells would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 23 Jan 2021<br>Proposed Time: 4:00 pm<br>Proposed location: Florida<br>Special Notes: Talk details later', 'Wes_Tye', '2021-01-02 03:36:03');

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
(51, 'Tye', '1734547f065ece81a28f96ffc031306f', 'admin@afrendli.com', '6787946711', 'softball', 14, 'Wes_Tye', '2020-12-23 01:46:51'),
(53, 'Nelson', 'df4252d38121746ea7bbdee646d50927', 'dnanelson1017@gmail.com', '2295063681', 'softball', 14, 'Xtreme_Nelson', '2020-12-23 02:03:47'),
(54, 'Tarver', '5f4dcc3b5aa765d61d8327deb882cf99', 'davidtarver@hotmail.com', '6784692396', 'softball', 14, 'WildCats_Tarver', '2020-12-23 02:28:49'),
(62, 'Blown', '3082a88b89dfec949a47a1ee5031e267', 'D@d.com', '', 'softball', 14, 'Wind_Blown', '2021-01-01 07:00:26'),
(66, 'Tarver', '1a1dc91c907325c69271ddf0c944bc72', 'Dgahdjjekdkfj', '3638374', 'softball', 14, 'David_Tarver', '2021-01-01 23:40:31'),
(67, 'shells', '6cada1b5279cf64ec485c08de4d14f53', 'admin@coachhiggy.com', '6787946711', 'softball', 14, 'shotgun_shells', '2021-01-02 02:06:36'),
(68, 'peaches', '95cd3fc01819b69d1a4900e6fe3d293c', 'ben@coachhiggy.com', '8888323', 'softball', 14, 'ga_peaches', '2021-01-02 03:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `Wes_Tye`
--

CREATE TABLE `Wes_Tye` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Wes_Tye`
--

INSERT INTO `Wes_Tye` (`id`, `message`, `receiver`, `timestamp`) VALUES
(1, 'Message to self', '', '2020-12-22 18:26:39'),
(2, 'Hello Stacy_Ben!<br>Wes_Tye would like to know if you would like to schedule a game! <br>Proposed Date: Thu, 24 Dec 2020<br>Proposed Time: 11:11 am<br>Proposed location: aaaaa<br>Special Notes: qqqqq<br><a href=\'https://www.afrendli.com/login_from_email.php/?useremail=Stacy_Ben\'>Click to Login and Respond to the game request!</a>', 'Stacy_Ben', '2020-12-22 22:16:33'),
(3, 'this is another message', 'Stacy_Ben', '2020-12-22 22:43:39'),
(4, 'Hello Stacy_Ben!<br>Wes_Tye would like to know if you would like to schedule a game! <br>Proposed Date: Fri, 15 Jan 2021<br>Proposed Time: 7:00 pm<br>Proposed location: Florida<br>Special Notes: Change<br><a href=\'https://www.afrendli.com\'>Click to Login and Respond to the game request!</a>', 'Stacy_Ben', '2021-01-01 01:03:23'),
(5, 'Wassup', 'David_Tarver', '2021-01-01 23:46:38'),
(6, 'Wassup', 'David_Tarver', '2021-01-01 23:46:58'),
(7, 'Hello !<br>Wes_Tye would like to know if you would like to schedule a game! <br>Proposed Date: Sat, 16 Jan 2021<br>Proposed Time: 2:00 pm<br>Proposed location: florida<br>Special Notes: details later', 'Xtreme_Nelson', '2021-01-02 05:09:04'),
(8, 'Thank you for the invite...I responded with a confirmation! talk soon!', 'shotgun_shells', '2021-01-02 05:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `WildCats_Tarver`
--

CREATE TABLE `WildCats_Tarver` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `WildCats_Tarver`
--

INSERT INTO `WildCats_Tarver` (`id`, `message`, `receiver`, `timestamp`) VALUES
(1, 'Hello', 'Georgiapeaches_Higgy', '2020-12-23 02:29:52'),
(2, 'Hello Georgiapeaches_Higgy!<br>WildCats_Tarver would like to know if you would like to schedule a game! <br>Proposed Date: Tue, 22 Dec 2020<br>Proposed Time: 9:30 pm<br>Proposed location: Scool<br>Special Notes: Idek<br><a href=\'https://www.afrendli.com\'>Click to Login and Respond to the game request!</a>', 'Georgiapeaches_Higgy', '2020-12-23 02:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `Wind_Blown`
--

CREATE TABLE `Wind_Blown` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Xtreme_Nelson`
--

CREATE TABLE `Xtreme_Nelson` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `David_Tarver`
--
ALTER TABLE `David_Tarver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `ga_peaches`
--
ALTER TABLE `ga_peaches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scheduleGame`
--
ALTER TABLE `scheduleGame`
  ADD PRIMARY KEY (`ScheduleGameId`);

--
-- Indexes for table `shotgun_shells`
--
ALTER TABLE `shotgun_shells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamId`);

--
-- Indexes for table `Wes_Tye`
--
ALTER TABLE `Wes_Tye`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `WildCats_Tarver`
--
ALTER TABLE `WildCats_Tarver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Wind_Blown`
--
ALTER TABLE `Wind_Blown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Xtreme_Nelson`
--
ALTER TABLE `Xtreme_Nelson`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `David_Tarver`
--
ALTER TABLE `David_Tarver`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `ga_peaches`
--
ALTER TABLE `ga_peaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inviteTeam`
--
ALTER TABLE `inviteTeam`
  MODIFY `inviteTeamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `scheduleGame`
--
ALTER TABLE `scheduleGame`
  MODIFY `ScheduleGameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `shotgun_shells`
--
ALTER TABLE `shotgun_shells`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `Wes_Tye`
--
ALTER TABLE `Wes_Tye`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `WildCats_Tarver`
--
ALTER TABLE `WildCats_Tarver`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Wind_Blown`
--
ALTER TABLE `Wind_Blown`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Xtreme_Nelson`
--
ALTER TABLE `Xtreme_Nelson`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
