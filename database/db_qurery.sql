-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 04:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `expertise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `expertise`) VALUES
(1, 'OBASI KELECHI KCSLIM', 'kcsimpleslim@gmail.com', '781789e72319a20b1014703d9a89fdb3', 'Graphics Design, and Web Design and Development'),
(2, 'OBASI KELECHI ', 'kcslim@gmail.com', 'b94cbd7d4eae83806853606d8aaf2245', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `matric_no` text NOT NULL,
  `password` text NOT NULL,
  `faculty` text NOT NULL,
  `department` text NOT NULL,
  `course` text NOT NULL,
  `duration` varchar(10) NOT NULL,
  `yr_of_entry` date NOT NULL,
  `yr_of_graduation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `first_name`, `last_name`, `other_name`, `gender`, `email`, `matric_no`, `password`, `faculty`, `department`, `course`, `duration`, `yr_of_entry`, `yr_of_graduation`) VALUES
(1, 'ISHAKU', 'ANDREW', 'WREFORD', 'Male', 'wrefordmessi@gmail.com', 'UR201500822', '550e1bafe077ff0b0b67f4e32f29d751', 'Pure and Applied Science', 'Computer Science', 'Computer Science', '4 years', '2015-09-18', '2019-09-15'),
(2, 'ANDREW', 'OTIGER', '', 'Male', 'otiger1@gmail.com', 'UR201501296', '550e1bafe077ff0b0b67f4e32f29d751', 'Pure and Applied Science', 'Computer Science', 'Computer Science', '4 years', '2015-09-17', '2019-09-15'),
(3, 'JESSICA', 'ONYEKWERE', 'CHINELO', 'Female', 'nuelajessy023@gmail.com', 'pas/csc/16/059', '1ba4413ca86ad65f676579cdf83d6752', 'Pure and Applied Science', 'Computer Science', 'Computer Science', '3 years', '2016-11-20', '2019-09-15'),
(4, 'KELECHI', 'OBASI', ' SAMSON', 'Male', 'obasikelechisamson@gmail.com', 'UR2015011833', 'b94cbd7d4eae83806853606d8aaf2245', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(5, 'SAMUEL', 'AGASHI', 'PETER', 'Male', 'agashisamuelpeter@gmail.com', 'UR201500088', '681cbd5e125809fdadb71c5e1c55e95a', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(6, 'MUSTAPHA', 'ISMAILA', 'AGWARU', 'Male', 'mustaphaismailaagwaru@gmail.com', 'UR201500836', '4b6665100a5ee13519c07b1a197ab280', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(7, 'BONIFACE', 'ARTHIMAS', 'JUNIOR', 'Male', 'junior@gmail.com', 'UR201500256', '3455473dcb339cb044172c23f42d7bb9', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(8, 'ALI', 'MATHIAS', 'DENEN', 'Male', 'alimathias@gmail.com', 'UR201500173', '471a5d1dcbe01e663bacf6d8e64e81f5', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(9, 'GEORGE', 'MOJI', 'SAAONDO', 'Male', 'mojigeorge@gmail.com', 'UR201500256', 'b2af8d7c5375d3a10ad2f3134d429f1f', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(10, 'AWUDUMANU', 'EMMANUEL', ' ', 'Male', 'emmauelawudumanu@gmail.com', 'UR2015500587', '9d8f14947be4b8bbfafc5df2b60fb5eb', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(11, 'UFEDENYO', 'BABA-ONOJA', ' ', 'Male', 'babaonoja@gmail.com', 'UD201500320', '3b3991019b18b8fce6578b52ba24e1da', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '3 years', '2015-09-09', '2018-09-09'),
(12, 'NAHUM', 'BAKO', 'ZHEMA', 'Male', 'bakonahum@gmail.com', 'UR201500328', '5c3be801b95f58f19a2c2762006ae86c', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(13, 'DAVIDSON', 'BENJAMIN', 'UTENGYE', 'Male', 'davidson@gmail.com', 'PAS/CSC/16/054', 'c8ad96f76fd7d2c70524671b31c1f3fc', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '3 years', '2016-09-09', '2019-09-09'),
(14, 'JEROME', 'BOKYAA', 'PAPI', 'Male', 'jeromepapi@gmail.com', 'UR201500372', 'f8a0021f036acc080567858065dbc787', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(15, 'ISAAC', 'CHARLES', ' ', 'Male', 'isaaccharles@gmail.com', 'UR201500394', '1700089f0783a4ca869a9e0bd2f5eebb', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(16, 'CHIDOZIE', 'PETER', 'JOHN', 'Male', 'peterchidozie@gmail.com', 'UR201501314', '5cad5539569491a19df6d71eb48edd73', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(17, 'ABALIS', 'YOHANNA', 'LANDI', 'Male', 'abalis@gmail.com', 'UR201501624', '53e2ee9ebe097b9b3077269c3f165f7e', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(18, 'DAVID', 'DANJUMA', ' ', 'Male', 'danjumadavid@gmail.com', 'UR201500478', 'cfcc432609bf65d02e656c61afb58971', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(19, 'JOHN', 'ILOEGBUNAM', 'EZE', 'Male', 'johhneze@gmail.com', 'UR201500784', 'd61ea35e1be5a6b2bd960cc6a193615a', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(20, 'GIDEON', 'GAMBO', 'ANGYU ', 'Male', 'gambogideon@gmail.com', 'pas/csc/16/058', 'de88ea697326bee9dab61552fb87dfc2', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '3 years', '2016-09-09', '2019-09-09'),
(21, 'TERKAA', 'HUMBE', ' ', 'Male', 'humbeterkaa@gmail.com', 'UR201500735', '74da392f102a8be8c8e28faa2740ab72', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(22, 'KINGSLEY', 'IJEOMA', ' ', 'Male', 'ijeomakinsley@gmail.com', 'UR201500774', '3212566a5c13ff05a5a428ae0b1e8081', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09'),
(23, 'MIRACLE', 'JOHNSON', ' ', 'Male', 'miraclejohnson@gmail.com', 'UR201500892', '3c679efa31b8a0c6a14c13f764bbd176', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-09', '2019-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_projects`
--

CREATE TABLE `alumni_projects` (
  `Project_id` int(11) NOT NULL COMMENT 'Primary key, that identifies each project',
  `project_title` text NOT NULL COMMENT 'Type or name of project',
  `project_description` text NOT NULL COMMENT 'Description of the kind of project',
  `project_date` text NOT NULL COMMENT 'Date which project was carried out'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `ChatMsg_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `chat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`ChatMsg_id`, `to_user_id`, `from_user_id`, `chat_message`, `chat_time`, `status`) VALUES
(1, 2, 1, 'hi', '2019-07-23 11:02:08', 0),
(2, 1, 2, 'hello', '2019-07-24 20:09:14', 0),
(3, 2, 1, 'what up', '2019-07-24 20:09:32', 0),
(4, 1, 2, 'am good', '2019-07-24 20:09:43', 0),
(5, 1, 2, 'gg', '2019-07-28 21:21:31', 0),
(6, 2, 1, 'vbghfg', '2019-07-28 21:53:30', 0),
(7, 2, 1, '', '2019-07-28 21:54:47', 0),
(8, 1, 3, 'red', '2019-07-28 22:20:11', 0),
(9, 3, 1, 'hi', '2019-07-28 22:29:00', 0),
(10, 3, 1, 'reeddf\n', '2019-07-28 22:29:00', 0),
(11, 1, 3, 'yuo', '2019-07-28 22:29:20', 0),
(12, 3, 1, 'ffff', '2019-07-28 22:30:51', 0),
(13, 3, 1, '', '2019-07-28 22:39:00', 0),
(14, 3, 1, 'nbnb', '2019-07-28 22:39:26', 0),
(15, 3, 1, '', '2019-07-28 22:44:04', 0),
(16, 1, 3, 'rerer', '2019-07-28 22:45:39', 0),
(17, 1, 3, 'ewfwefwefe', '2019-07-28 22:45:53', 0),
(18, 1, 3, 'dfdfdsf', '2019-07-28 22:45:58', 0),
(19, 1, 3, 'fdfsd', '2019-07-28 22:46:02', 0),
(20, 1, 3, 'ddfd', '2019-07-28 22:46:08', 0),
(21, 2, 1, 'dcd', '2019-07-29 13:34:53', 0),
(22, 1, 2, 'hi', '2019-07-29 13:35:01', 0),
(23, 2, 1, 'gfgggfd', '2019-07-29 13:35:18', 0),
(24, 2, 1, 'rece', '2019-07-29 13:58:03', 0),
(25, 1, 2, 'rece', '2019-07-29 13:58:38', 0),
(26, 1, 2, 'sdsdad', '2019-07-29 13:59:43', 0),
(27, 2, 1, 'dsjdjs', '2019-07-29 14:19:43', 0),
(28, 2, 1, 'cfcffxcxcxcxcxcxccxz', '2019-07-29 14:20:33', 0),
(29, 1, 2, 'dfgh', '2019-07-29 17:39:49', 0),
(30, 1, 2, 'hi', '2019-07-29 17:39:49', 0),
(31, 1, 2, 'hello', '2019-07-29 17:39:49', 0),
(32, 1, 2, 'wats up', '2019-07-29 17:39:49', 0),
(33, 1, 2, 'not answering?', '2019-07-29 17:39:49', 0),
(34, 1, 2, 'not answering?', '2019-07-29 17:39:49', 0),
(35, 1, 2, 'not answering?', '2019-07-29 17:39:49', 0),
(36, 1, 2, '', '2019-07-29 17:39:49', 0),
(37, 2, 1, 'yea', '2019-07-30 08:56:00', 0),
(38, 2, 1, 'sorry', '2019-07-30 08:56:00', 0),
(39, 2, 1, 'am now available', '2019-07-30 08:56:00', 0),
(40, 3, 1, 'helllo', '2019-07-29 20:01:49', 0),
(41, 3, 1, 'hi', '2019-07-29 20:01:49', 0),
(42, 3, 1, 'red', '2019-07-29 20:01:49', 0),
(43, 1, 3, 'dfdfddd', '2019-07-29 20:01:57', 0),
(44, 1, 3, 'yes', '2019-07-29 20:02:07', 0),
(45, 1, 3, 'yt', '2019-07-29 20:02:17', 0),
(46, 1, 3, 'tree', '2019-07-29 20:02:32', 0),
(47, 3, 1, 'uy', '2019-07-29 20:03:02', 0),
(48, 2, 1, 'eseeweae', '2019-08-04 15:09:49', 2),
(49, 1, 2, 'yte', '2019-08-04 15:16:18', 2),
(50, 1, 2, 'sddd', '2019-07-30 13:37:20', 0),
(51, 3, 1, 'hello, Boss', '2019-07-30 13:25:25', 0),
(52, 1, 3, 'whats up Bro', '2019-07-30 13:25:42', 0),
(53, 3, 1, 'Am good, how is every thing ', '2019-07-30 13:26:13', 0),
(54, 1, 3, 'Glory to God', '2019-07-30 13:26:32', 0),
(55, 1, 3, 'Are you done with that project?', '2019-07-30 13:28:27', 0),
(56, 2, 1, 'hello', '2019-08-04 15:09:08', 2),
(57, 2, 3, 'gfgfgccc', '2019-08-08 22:10:05', 2),
(58, 0, 1, 'ypu				\n			', '2019-08-04 16:01:11', 2),
(59, 0, 2, '				\n			gfgf', '2019-07-30 22:29:14', 1),
(60, 0, 1, 'gfdgd				\n			', '2019-08-04 16:01:21', 2),
(61, 0, 2, 'ccx', '2019-08-04 16:12:58', 2),
(62, 1, 2, 'hrloo', '2019-08-04 15:16:01', 2),
(63, 3, 1, 'not yet\n', '2019-08-05 21:56:29', 0),
(64, 3, 1, 'but i will, soon', '2019-08-05 21:56:29', 0),
(65, 0, 3, '				\n			hello guys', '2019-08-01 17:41:52', 1),
(66, 0, 1, '				\n			ddfdf\n', '2019-08-04 16:42:30', 2),
(67, 13, 1, 'hello', '2019-08-04 18:41:06', 1),
(68, 1, 2, 'hello, my hero\n', '2019-08-08 21:47:59', 0),
(69, 0, 3, '				\n			hello house', '2019-08-09 12:09:56', 1),
(70, 0, 1, 'hey, Andrew whats up\n				\n			', '2019-08-09 12:10:38', 1),
(71, 0, 1, 'Am fine, dude what happening?', '2019-08-09 12:11:03', 1),
(72, 0, 3, 'Chaos', '2019-08-09 12:11:41', 1),
(73, 0, 1, 'what?', '2019-08-09 12:11:55', 1),
(74, 0, 3, 'yea bro', '2019-08-09 12:12:07', 1),
(75, 12, 1, 'hrllo', '2019-09-09 19:37:55', 1),
(76, 1, 2, 'hi', '2019-09-10 17:16:14', 0),
(77, 1, 2, 'hello\n', '2019-09-10 17:16:14', 0),
(78, 2, 1, 'hi\n', '2019-09-10 17:16:23', 0),
(79, 2, 1, 'am gud', '2019-09-10 17:16:43', 0),
(80, 1, 2, 'sta', '2019-09-10 17:20:25', 0),
(81, 1, 2, 'ch4dfefe', '2019-09-10 17:20:25', 0),
(82, 1, 2, 'hhhh', '2019-09-10 17:35:01', 0),
(83, 1, 2, 'gygghg', '2019-09-11 17:12:14', 0),
(84, 1, 3, 'dude whats up\n', '2019-09-10 19:12:10', 0),
(85, 1, 3, 'I heard you are back from Canada\n', '2019-09-10 19:12:10', 0),
(86, 1, 3, 'I heard you are back from Canada\n', '2019-09-10 19:12:10', 0),
(87, 3, 1, 'yea, came back yesterday', '2019-09-10 19:12:28', 0),
(88, 2, 1, 'hello', '2019-09-11 17:12:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `LoginDetails_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL,
  `type_notice` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`LoginDetails_id`, `users_id`, `last_activity`, `type_notice`) VALUES
(1, 1, '2019-07-22 13:52:15', 'no'),
(2, 2, '2019-07-22 13:51:31', 'no'),
(3, 3, '2019-07-22 13:52:14', 'no'),
(4, 4, '2019-07-22 18:16:05', 'no'),
(5, 1, '2019-07-22 18:10:55', 'no'),
(6, 2, '2019-07-22 18:12:15', 'no'),
(7, 1, '2019-07-22 18:21:39', 'no'),
(8, 1, '2019-07-22 23:49:43', 'no'),
(9, 1, '2019-07-23 02:43:17', 'no'),
(10, 2, '2019-07-23 01:15:30', 'no'),
(11, 3, '0000-00-00 00:00:00', 'no'),
(12, 3, '2019-07-23 01:53:17', 'no'),
(13, 1, '2019-07-23 14:10:49', 'no'),
(14, 1, '2019-07-23 17:32:43', 'no'),
(15, 1, '2019-07-23 18:44:33', 'no'),
(16, 1, '2019-07-23 21:25:53', 'no'),
(17, 1, '2019-07-24 23:49:02', 'no'),
(18, 2, '2019-07-24 23:49:32', 'no'),
(19, 1, '2019-07-25 01:12:21', 'no'),
(20, 1, '2019-07-25 13:58:41', 'no'),
(21, 2, '2019-07-25 13:58:40', 'no'),
(22, 2, '2019-07-25 17:25:12', 'no'),
(23, 1, '2019-07-25 17:28:05', 'no'),
(24, 1, '2019-07-26 03:21:54', 'no'),
(25, 1, '2019-07-26 03:27:00', 'no'),
(26, 1, '2019-07-26 03:53:51', 'no'),
(27, 1, '2019-07-26 14:34:25', 'no'),
(28, 12, '0000-00-00 00:00:00', 'no'),
(29, 2, '2019-07-26 14:18:59', 'no'),
(30, 12, '2019-07-26 14:30:46', 'no'),
(31, 12, '2019-07-26 14:55:45', 'no'),
(32, 2, '2019-07-26 14:58:04', 'no'),
(33, 12, '2019-07-26 14:56:45', 'no'),
(34, 12, '2019-07-26 14:57:37', 'no'),
(35, 1, '2019-07-26 22:41:00', 'no'),
(36, 1, '2019-07-27 20:59:17', 'no'),
(37, 1, '2019-07-27 21:28:19', 'no'),
(38, 2, '2019-07-27 22:06:55', 'no'),
(39, 1, '2019-07-27 22:15:10', 'no'),
(40, 2, '2019-07-27 22:15:06', 'no'),
(41, 12, '2019-07-28 20:36:52', 'no'),
(42, 2, '2019-07-28 18:20:14', 'no'),
(43, 1, '2019-07-28 18:40:29', 'no'),
(44, 1, '2019-07-28 22:55:05', 'no'),
(45, 2, '2019-07-28 22:55:11', 'no'),
(46, 1, '2019-07-28 23:08:49', 'no'),
(47, 2, '2019-07-28 23:08:47', 'no'),
(48, 1, '2019-07-28 23:47:13', 'no'),
(49, 3, '2019-07-28 23:47:28', 'no'),
(50, 1, '2019-07-29 15:04:44', 'no'),
(51, 2, '2019-07-29 15:04:44', 'no'),
(52, 1, '2019-07-29 15:22:03', 'yes'),
(53, 2, '2019-07-29 15:22:07', 'no'),
(54, 1, '2019-07-29 18:40:51', 'no'),
(55, 2, '2019-07-29 18:40:51', 'no'),
(56, 1, '2019-07-29 19:11:22', 'no'),
(57, 2, '2019-07-29 19:11:22', 'no'),
(58, 1, '2019-07-29 21:48:20', 'no'),
(59, 3, '2019-07-29 21:48:21', 'no'),
(60, 3, '2019-07-30 05:21:04', 'no'),
(61, 1, '2019-07-30 10:24:22', 'no'),
(62, 2, '2019-07-30 10:24:27', 'no'),
(63, 1, '2019-07-30 11:22:28', 'no'),
(64, 2, '2019-07-30 11:22:31', 'no'),
(65, 1, '2019-07-30 14:44:04', 'no'),
(66, 3, '2019-07-30 14:51:31', 'no'),
(67, 2, '2019-07-30 14:51:31', 'no'),
(68, 1, '2019-07-30 15:50:24', 'no'),
(69, 1, '2019-07-30 23:42:14', 'no'),
(70, 2, '2019-07-30 23:46:56', 'no'),
(71, 1, '2019-07-30 23:59:49', 'no'),
(72, 1, '2019-07-31 00:06:59', 'no'),
(73, 2, '2019-07-31 01:00:45', 'no'),
(74, 12, '2019-07-31 20:39:56', 'no'),
(75, 12, '2019-07-31 20:44:45', 'no'),
(76, 1, '2019-08-01 18:44:53', 'no'),
(77, 2, '2019-08-01 18:40:54', 'no'),
(78, 3, '2019-08-01 18:44:51', 'no'),
(79, 1, '0000-00-00 00:00:00', 'no'),
(80, 1, '2019-08-01 20:36:20', 'no'),
(81, 1, '2019-08-01 21:53:51', 'no'),
(82, 1, '2019-08-02 20:25:48', 'no'),
(83, 2, '2019-08-04 17:01:39', 'no'),
(84, 1, '2019-08-04 18:08:53', 'no'),
(85, 2, '2019-08-04 20:49:54', 'yes'),
(86, 1, '2019-08-04 20:49:54', 'no'),
(87, 1, '2019-08-05 01:19:22', 'no'),
(88, 1, '2019-08-05 02:26:21', 'no'),
(89, 2, '2019-08-05 02:26:21', 'no'),
(90, 1, '2019-08-05 23:34:58', 'no'),
(91, 3, '2019-08-05 23:35:19', 'no'),
(92, 2, '2019-08-06 19:17:41', 'no'),
(93, 1, '2019-08-06 19:17:59', 'no'),
(94, 1, '2019-08-08 13:57:03', 'no'),
(95, 1, '2019-08-08 22:13:15', 'no'),
(96, 1, '2019-08-08 23:29:27', 'no'),
(97, 2, '2019-08-08 23:58:14', 'no'),
(98, 3, '2019-08-08 22:52:49', 'no'),
(99, 3, '2019-08-08 23:22:57', 'no'),
(100, 1, '2019-08-09 13:15:35', 'no'),
(101, 3, '2019-08-09 13:48:04', 'no'),
(102, 1, '2019-08-09 13:48:05', 'no'),
(103, 1, '2019-08-10 15:11:31', 'no'),
(104, 3, '2019-08-10 14:32:26', 'no'),
(105, 3, '2019-08-10 14:55:38', 'no'),
(106, 3, '2019-08-10 15:11:43', 'no'),
(107, 2, '2019-08-10 15:11:40', 'no'),
(108, 1, '2019-08-12 21:43:32', 'no'),
(109, 1, '2019-08-13 16:03:18', 'yes'),
(110, 1, '2019-08-15 09:15:09', 'no'),
(111, 1, '2019-08-15 10:59:55', 'no'),
(112, 1, '2019-09-09 20:39:03', 'no'),
(113, 1, '2019-09-10 18:52:13', 'no'),
(114, 2, '2019-09-10 18:52:12', 'no'),
(115, 1, '2019-09-10 20:21:21', 'no'),
(116, 3, '2019-09-10 20:21:19', 'no'),
(117, 1, '2019-09-10 21:23:18', 'no'),
(118, 3, '2019-09-10 21:23:14', 'no'),
(119, 1, '2019-09-10 23:13:56', 'no'),
(120, 2, '2019-09-10 22:46:22', 'no'),
(121, 2, '2019-09-11 18:13:47', 'no'),
(122, 1, '2019-09-11 18:13:48', 'yes'),
(123, 1, '2019-09-11 23:44:53', 'no'),
(124, 1, '2019-09-12 02:29:01', 'no'),
(125, 1, '2019-09-12 02:24:45', 'no'),
(126, 1, '2019-09-12 09:49:38', 'no'),
(127, 1, '2019-09-12 11:33:45', 'no'),
(128, 3, '2019-09-12 11:43:57', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(11) NOT NULL COMMENT 'Primary key that serves as unique Id of every student',
  `first_name` varchar(255) NOT NULL COMMENT 'student first name',
  `last_name` varchar(255) NOT NULL COMMENT 'Student surname',
  `other_name` varchar(255) NOT NULL COMMENT 'Student middle name',
  `gender` text NOT NULL COMMENT 'Student  gender can be either male or female',
  `email` text NOT NULL COMMENT 'student email address',
  `matric_no` text NOT NULL COMMENT 'Student matriculation number',
  `password` text NOT NULL COMMENT 'student login password',
  `faculty` text NOT NULL COMMENT 'Faculty to which Student is admitted ',
  `department` text NOT NULL COMMENT 'Department to which student is studying in',
  `course` text NOT NULL COMMENT 'Course of study of every student',
  `duration` varchar(10) NOT NULL COMMENT 'Duration of the course of student',
  `yr_of_entry` date NOT NULL COMMENT 'Year of Student admission',
  `yr_of_graduation` date NOT NULL COMMENT 'Year which student will graduate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `first_name`, `last_name`, `other_name`, `gender`, `email`, `matric_no`, `password`, `faculty`, `department`, `course`, `duration`, `yr_of_entry`, `yr_of_graduation`) VALUES
(1, 'MARGARET', 'CHUKWU', 'NKECHI', 'Female', 'magnkechi9@gmail.com', 'PAS/CSC/17/042', 'dcb8851714e796b7f3dde5bfa2d62139', 'Pure and Applied Science', 'Computer Science', 'Computer Science', '3 years', '2017-11-12', '2020-09-20'),
(2, 'CHRISTIANA', 'TANKO', ' ', 'Female', 'christianatanko@gmail.com', 'pas/csc/16/061', 'da56e60ca70bde2a0eeee852d5b19367', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '4 years', '2015-09-13', '2021-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL COMMENT 'Primary Key for identifying every user',
  `user_type` text NOT NULL COMMENT 'Identifies the type of user',
  `role` text NOT NULL COMMENT 'Defines user role either as admin or user',
  `first_name` varchar(255) NOT NULL COMMENT 'First name of every user',
  `other_name` varchar(255) NOT NULL COMMENT 'User middle name',
  `last_name` varchar(255) NOT NULL COMMENT 'User Surname',
  `dob` date NOT NULL COMMENT 'Date of birth',
  `email` text NOT NULL COMMENT 'User email address',
  `password` text NOT NULL COMMENT 'Password of user',
  `phone_number` text NOT NULL COMMENT 'User phone Number',
  `gender` text NOT NULL COMMENT 'Sex or Gender of can be either male or female',
  `faculty` text NOT NULL COMMENT 'Faculty of user E.g Pure and applid science',
  `department` text NOT NULL COMMENT 'User department e.g Computer Science',
  `course` text NOT NULL COMMENT 'Course user studied',
  `qualification` text NOT NULL COMMENT 'Current level in education',
  `admin_year` date NOT NULL COMMENT 'The year the user was admitted into the university',
  `grad_year` date NOT NULL COMMENT 'The year which the year graduated or will graduate in',
  `matric_no` text NOT NULL COMMENT 'Users unique Matriculation number',
  `prog_duration` varchar(10) NOT NULL COMMENT 'Duration of the users programme',
  `address` text NOT NULL COMMENT 'user residential address',
  `passport` text NOT NULL COMMENT 'user profile picture',
  `expertise` text NOT NULL COMMENT 'Area of specialization of the user',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date of user registration'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_type`, `role`, `first_name`, `other_name`, `last_name`, `dob`, `email`, `password`, `phone_number`, `gender`, `faculty`, `department`, `course`, `qualification`, `admin_year`, `grad_year`, `matric_no`, `prog_duration`, `address`, `passport`, `expertise`, `registration_date`) VALUES
(1, 'Admin', 'Super_Admin', 'KELECHI', 'KCSLIM ', 'OBASI', '1994-05-14', 'kcsimpleslim@gmail.com', '89ee88258a37a87c75b081d08e7f8800', '07037837788', 'Male', 'Pure and Applied Science', 'Computer Science', 'Computer Science', 'Bsc. Computer Science', '2015-09-15', '2019-09-15', 'UR201501183', '4 years', 'Opposite Federal University Wukari', '6235691564335264.png', 'Graphics Design, and Web Design and Development ', '2019-07-03 20:01:44'),
(2, 'Student', 'user', 'MARGARET', 'NKECHI   ', 'CHUKWU', '1994-06-12', 'magnkechi9@gmail.com', 'dcb8851714e796b7f3dde5bfa2d62139', '08108463218', 'Female', 'Pure and Applied Science', 'Computer Science', 'Computer Science', 'ND Computer Science ', '2017-11-12', '2020-09-20', 'PAS/CSC/17/047', '3 years', 'Opposite Federal University Wukari', '7741241568221265.jpg', 'Web Design and Development, Hardware Maintenance', '2019-07-03 10:43:29'),
(3, 'Alumni', 'user', 'ANDREW', '', 'OTIGER', '1990-12-12', 'otiger1@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', '08163682371', 'Male', 'Pure and Applied Science', 'Computer Science', 'Computer Science', 'Bsc. Computer Science ', '2015-09-17', '2019-09-15', 'UR201501296', '4 years', '', '3973471561122210.png', 'Andriod Application Development, and Web Design and Development ', '2019-07-03 10:44:01'),
(4, 'Alumni', 'user', 'ISHAKU', 'WREFORD', 'ANDREW', '1990-01-01', 'wrefordmessi@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', '09033444554', 'Male', 'Pure and Applied Science', 'Computer Science', 'Computer Science', 'Bsc. Computer Science', '2015-09-18', '2019-09-15', 'UR201500822', '4 years ', '', '6575471561707248.png', 'Andriod Application Development, and Web Design and Development ', '2019-07-03 10:44:16'),
(5, 'Alumni', 'user', 'JESSICA', 'CHINELO', 'ONYEKWERE', '1991-12-12', 'nuelajessy023@gmail.com', '1ba4413ca86ad65f676579cdf83d6752', '09078894214', 'Female', 'Pure and Applied Science', 'Computer Science', 'Computer Science', 'Bsc. Computer Science', '2016-11-20', '2019-09-15', 'pas/csc/16/059', '3 years', '', '1188091561707431.jpg', ' Web Design and Development ', '2019-07-03 10:44:27'),
(12, 'Alumni', 'user', 'KELECHI', ' SAMSON     ', 'OBASI', '1991-09-09', 'obasikelechisamson@gmail.com', '27e374035353cb074b0638fa96789eae', '07037837788', 'Male', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', 'B. Sc. Computer Science', '2015-09-09', '2019-09-09', 'UR2015011833', '4 years', 'Opposite Federal University Wukari', '1242061564334311.jpg', 'Graphics Design', '2019-07-26 13:04:33'),
(13, 'Admin', 'Admin', 'KELECHI', '', 'OBASI', '0000-00-00', 'kcslim@gmail.com', 'b94cbd7d4eae83806853606d8aaf2245', '', 'Male', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '2019-08-04 18:37:48'),
(14, 'Alumni', 'user', 'MIRACLE', ' ', 'JOHNSON', '0000-00-00', 'miraclejohnson@gmail.com', '3c679efa31b8a0c6a14c13f764bbd176', '', 'Male', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '', '2015-09-09', '2019-09-09', 'UR201500892', '4 years', '', '', '', '2019-08-15 09:57:50'),
(15, 'Alumni', 'user', 'BONIFACE', 'JUNIOR', 'ARTHIMAS', '0000-00-00', 'junior@gmail.com', '3455473dcb339cb044172c23f42d7bb9', '', 'Male', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '', '2015-09-09', '2019-09-09', 'UR201500256', '4 years', '', '', '', '2019-09-11 23:35:26'),
(16, 'Student', 'user', 'CHRISTIANA', ' ', 'TANKO', '0000-00-00', 'christianatanko@gmail.com', 'da56e60ca70bde2a0eeee852d5b19367', '', 'Female', 'Pure and Applied Sciences', 'Computer Science', 'Computer Science', '', '2015-09-13', '2021-08-12', 'pas/csc/16/061', '4 years', '', '', '', '2019-09-12 09:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `alumni_projects`
--
ALTER TABLE `alumni_projects`
  ADD PRIMARY KEY (`Project_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`ChatMsg_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`LoginDetails_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `alumni_projects`
--
ALTER TABLE `alumni_projects`
  MODIFY `Project_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, that identifies each project';

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `ChatMsg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `LoginDetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key that serves as unique Id of every student', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for identifying every user', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
