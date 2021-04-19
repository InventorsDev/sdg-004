-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 11:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speakup`
--

-- --------------------------------------------------------

--
-- Table structure for table `bot_help`
--

CREATE TABLE `bot_help` (
  `help_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `responder_id` int(11) NOT NULL,
  `case_title` text NOT NULL,
  `description` text NOT NULL,
  `evidence1` varchar(225) NOT NULL,
  `evidence2` varchar(225) NOT NULL,
  `status` text NOT NULL,
  `featured` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tips_guides`
--

CREATE TABLE `tips_guides` (
  `tips_id` int(11) NOT NULL,
  `posted_by` text NOT NULL,
  `posted_id` int(11) NOT NULL,
  `tips_title` text NOT NULL,
  `tips_content` text NOT NULL,
  `cover_image` varchar(225) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` text NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `state` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `organization` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `cv` varchar(225) DEFAULT NULL,
  `motive` text DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `lastname`, `firstname`, `email`, `phone`, `gender`, `dob`, `state`, `address`, `occupation`, `organization`, `position`, `cv`, `motive`, `password`, `date_reg`) VALUES
(1, 'reporter', 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDU', '', '', '0000-00-00', '', '', 'student', '', '', '', '', '11111111Aa', '2021-04-19 20:26:07'),
(2, 'reporter', 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDU', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:29:08'),
(3, 'reporter', 'olanipekun', 'seyi', 'EGIFFORD@M.hh', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:38:54'),
(4, 'reporter', 'olanipekun', 'seyi', 'EGIFFORD@M.wsd', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:41:23'),
(5, 'reporter', 'olanipekun', 'seyi', '12345890Aa@ss.ss', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:42:35'),
(6, 'reporter', 'olanipekun', 'seyi', '12345890Aa@hh.aa', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:46:20'),
(7, 'reporter', 'college', 'de-young', '12345890Aa@www.ss', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 20:48:58'),
(8, 'reporter', 'olanipekun', 'seyi', '12345890Aa@we.ww', NULL, NULL, NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '11111111Aa', '2021-04-19 21:12:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bot_help`
--
ALTER TABLE `bot_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bot_help`
--
ALTER TABLE `bot_help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
