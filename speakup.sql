-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 10:04 AM
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
  `status` text NOT NULL,
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

INSERT INTO `users` (`user_id`, `user_type`, `lastname`, `firstname`, `email`, `phone`, `gender`, `status`, `dob`, `state`, `address`, `occupation`, `organization`, `position`, `cv`, `motive`, `password`, `date_reg`) VALUES
(19, 'reporter', 'olanipekun', 'seyi', '12345890Aa@wm.ee', NULL, NULL, 'active', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$Ge1hSUHoCrBebkpsj9GcneQBjelRW0bFyLfYwMDwtSp9vhU9Vlrpe', '2021-04-20 21:00:26'),
(20, 'reporter', 'college', 'de-young', 'jkj@fggf.hhjhs', NULL, NULL, 'active', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$JhxyYmO/AX9/ooT5tODlWO1/3xbmj94zmryQI4SjtrUgVfsaEJOom', '2021-04-20 21:38:00'),
(21, 'reporter', 'college', 'de-young', 'onabajo@gmail.com', NULL, NULL, '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$EmUu3jSMsWYDzp/M94X2pujFq5CGXYiWCv6GJ7j.bPDnStv4d5I7O', '2021-04-20 21:51:21'),
(22, 'reporter', 'olanipekun', 'seyi', 'oluwakeji@gmail.com', NULL, NULL, 'active', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$ols/Y.bu1HZ.rQhAg5Cc0OcogNmUSWTxRh6Tc1YFq5ubavTh9T.CC', '2021-04-20 21:56:57'),
(23, 'responder', 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDU', '08093104529', 'male', 'reviewing', '2021-04-09', 'abia', '1101 SHERMAN DRIVE, UTICA, NEW YORK', 'ed', 'ddd', 'ddd', 'EGIFFORD@MVCC.EDU_cv.pdf', 'ddddd', '$2y$10$RYbYgMbAr0ikT79DG/V7AO2ZOZzqycemi3rnlVoZQvQvIU0lwLWZG', '2021-04-20 22:21:52'),
(24, 'responder', 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDUw', '08093104529', 'male', 'reviewing', '2021-04-16', 'Benue', 'ww', 'www', 'www', 'www', 'EGIFFORD@MVCC.EDUw_cv.docx', 'ww', '$2y$10$w5ENkoTlJ.xz7/9XKuqVjuHjM6ZLeIlHt2rjjihjW6BbjbxLsIWna', '2021-04-21 07:46:29');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
