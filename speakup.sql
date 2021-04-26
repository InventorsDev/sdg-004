-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 07:34 PM
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
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `chat_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `added_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`chat_id`, `question`, `answer`, `added_updated`) VALUES
(1, 'Hello Hi', 'Welcome! I care about you and am here to help in any way I can', '2021-04-21 20:29:17'),
(2, 'Good day good afternoon good evening', 'I\'m speakUp bot. You are not alone\r\n', '2021-04-21 20:29:44'),
(3, 'assaulted raped bullied, mollested', 'This must be really tough for you and I\'m glad you are sharing this with me.\r\n', '2021-04-21 20:39:45'),
(4, 'what can i do', 'If you or someone you know have been affected by sexual voilence or related cases. It\'s not you fault. You are not alone.<br> Help is available 24/7 signup to get help from a professional responder ', '2021-04-21 20:36:44'),
(5, 'assaulted raped bullied, mollested', 'Use this link to read up helpful tips, to keep you safe <a href=\"./tips\"> Tips and Guides <a/>\r\n', '2021-04-21 20:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `label` text NOT NULL,
  `status` text NOT NULL,
  `file` varchar(225) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `sender`, `receiver`, `message`, `label`, `status`, `file`, `date_sent`) VALUES
(1, 1, 0, 'ss', 'outbox', 'unread', '', '0000-00-00 00:00:00'),
(2, 1, 2, 'ss', 'inbox', 'read', '', '2021-04-25 15:08:48'),
(3, 1, 2, 'ss', 'inbox', 'unread', '', '2021-04-25 15:08:56'),
(4, 1, 2, 'ss I need your help I need your help I need your help I need your help', 'outbox', 'unread', '', '2021-04-25 23:23:04'),
(5, 1, 2, 'ssss', 'outbox', 'unread', '', '2021-04-25 15:26:21'),
(6, 1, 0, 'I need your help', 'outbox', 'unread', '', '2021-04-25 17:56:05'),
(7, 13, 3, 'ss', 'outbox', 'unread', '', '2021-04-26 01:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `notification_slug` varchar(225) NOT NULL,
  `body` text NOT NULL,
  `status` text NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `subject`, `notification_slug`, `body`, `status`, `date_sent`) VALUES
(1, 1, 'ss', '', 'outbox', 'unread', '0000-00-00 00:00:00'),
(2, 1, 'ss', '', 'inbox', 'read', '2021-04-25 12:46:34'),
(3, 1, 'ss', '', 'inbox', 'unread', '2021-04-25 12:44:30'),
(4, 2, 'Oluwakeji Onabajo needs you help', 'sss', 'ssss', 'unread', '2021-04-25 15:03:40'),
(5, 3, 'Oluwakeji Onabajo needs you help', '', 'I need your help', 'unread', '2021-04-25 17:56:05'),
(6, 11, 'Welcome!', '1121813159', '<p>Hello dear!</p><p>We are happy to have you. This platform will help you get help on any situation, make report as an eyewitness or a victim and get response from professional responders.</p><p>We hope you would make use of this opportunity to the fullest.</p><p>Thanks and best regards<br>SpeakUp Board of Director</p>', 'unread', '2021-04-26 00:58:24'),
(7, 13, 'Welcome! Seyi Olanipekun needs you help help[', '435992924', '<p>Hello dear!</p><p>We are happy to have you. This platform will help you get help on any situation, make report as an eyewitness or a victim and get response from professional responders.</p><p>We hope you would make use of this opportunity to the fullest.</p><p>Thanks and best regards<br>SpeakUp Board of Director</p>', 'unread', '2021-04-26 01:06:20'),
(8, 3, 'Seyi Olanipekun needs you help', '', 'ss', 'unread', '2021-04-26 01:11:54'),
(9, 3, 'Seyi Olanipekun needs you help', '', 'ss', 'unread', '2021-04-26 01:11:56'),
(10, 3, 'Seyi Olanipekun needs you help', '', 'ss', 'unread', '2021-04-26 01:12:46'),
(11, 2, 'A new report submitted:Just Me And You', '1842646903', '<p>You have received a new report from one of your assigned reporter.<br>Please take your time to go through the doments and treat every reports received as important.</p><p>Good luck!</p>', 'unread', '2021-04-26 18:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `responder_id` int(11) NOT NULL,
  `submitted_as` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `evidence` varchar(225) NOT NULL,
  `status` text NOT NULL,
  `featured` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `responder_id`, `submitted_as`, `title`, `description`, `evidence`, `status`, `featured`, `date_added`) VALUES
(1, 1, 2, 'a reporter', 'none', 's', '', 'pending', '', '2021-04-24 19:33:32'),
(2, 13, 2, 'anonymous', 'ks sksjkqwjjkd qwdd wqdjkwd nwdwdwd wdd', 'John is a rapist', 'report_2_file_0.jpg,report_2_file_1.pdf,report_2_file_2.mp4', 'received', '', '2021-04-26 18:15:45'),
(3, 13, 2, 'anonymous', 'Just me and you', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'report_3_file_0.jpg,report_3_file_1.jpg', 'received', '', '2021-04-26 18:28:01');

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
  `assigned` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `status` text NOT NULL,
  `badge` text NOT NULL,
  `dob` date DEFAULT NULL,
  `state` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `organization` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `cv` varchar(225) DEFAULT NULL,
  `motive` text DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `assigned`, `lastname`, `firstname`, `email`, `phone`, `gender`, `status`, `badge`, `dob`, `state`, `address`, `occupation`, `organization`, `position`, `cv`, `motive`, `password`, `date_reg`) VALUES
(1, 'reporter', 2, 'Onabajo', 'Oluwakeji', 'onabajooluwakeji.daniel@gmail.com', NULL, NULL, 'active', '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$R7uU3aQYskpj.LXOo4G8W.j84Qg8cI83MX9FG4BO6KlZimDamGLCS', '2021-04-23 14:15:27'),
(2, 'responder', 0, 'Oluwatuyi', 'DIKE', 'onabajooluwakeji@gmail.com', NULL, NULL, 'active', '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$R7uU3aQYskpj.LXOo4G8W.j84Qg8cI83MX9FG4BO6KlZimDamGLCS', '2021-04-23 14:15:27'),
(3, 'responder', 0, 'Oluwatuyi', 'DIKE', 'onabajooluwakeji.daniel@gmail.com', NULL, NULL, 'active', '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$R7uU3aQYskpj.LXOo4G8W.j84Qg8cI83MX9FG4BO6KlZimDamGLCS', '2021-04-23 14:15:27'),
(4, 'responder', 0, 'Oluwatuyi', 'DIKE', 'onabajooluwakeji.daniel@gmail.com', NULL, NULL, 'active', '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$R7uU3aQYskpj.LXOo4G8W.j84Qg8cI83MX9FG4BO6KlZimDamGLCS', '2021-04-23 14:15:27'),
(5, 'reporter', 0, '', '', 'EGIFFORD@MVCC.EDU', NULL, NULL, 'active', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '$2y$10$PV6yEhEECwn1gKbYsWmiXuaJV9rN15h9H4Lxf2E7LICiUuco6uXr2', '2021-04-25 21:53:58'),
(6, 'reporter', 3, '', '', 'EGIFFORD@MVCC.EDUs', NULL, NULL, 'active', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '$2y$10$KM7Q.Vx5gP0Qf43siYm23ez759HbXQTjdKtsVZg1yQA83pRRVPYZy', '2021-04-25 21:54:53'),
(7, 'reporter', 4, '', '', 'EGIFFORD@MVCC.EDUss', NULL, NULL, 'active', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '$2y$10$lZGFpRAVK7lYNsFBEh2IhuwpeLIAsVs6G2OJFa5vgp8VmUfl3YRqu', '2021-04-25 21:55:20'),
(8, 'reporter', 2, 'olanipekun', 'seyi', 'EGIFFOaaRD@MVCC.EDUs', NULL, NULL, 'active', '', NULL, 'Lagos', '2, alatunse close', 'student', NULL, NULL, NULL, NULL, '$2y$10$rTvlwlUIWjglJDSjPhp8je7g1IR9uPYh74xNvMBnYHRw2pikfgrJ2', '2021-04-25 22:41:11'),
(9, 'responder', 0, 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDUd3k', '08093104529', 'male', 'reviewing', '', '2021-04-01', 'Lagos', '2, alatunse close', 'ssss', 'ssss', 'ss', 'EGIFFORD@MVCC.EDUd3k_cv.pdf', 'a', '$2y$10$P47kO72Z8k6xDpEuTgWM3euOFVf8dqDUaLkgZgQIaXQn8oXOyLLe6', '2021-04-25 22:56:05'),
(10, 'reporter', 3, 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDUww', NULL, NULL, 'active', '', NULL, 'Lagos', '2, alatunse close', 'student', NULL, NULL, NULL, NULL, '$2y$10$.MOaX5UxwIPIxbqRDNM.J.tnu3TROBYcc39bKr2V8HvC9qO/cjfrm', '2021-04-25 22:59:58'),
(11, 'reporter', 4, 'college', 'de-young', 'EGIFFOaRD@MVCC.EDU', NULL, NULL, 'active', '', NULL, 'Lagos', '18, fanuga street, aga', 'student', NULL, NULL, NULL, NULL, '$2y$10$4RfAXWkSCiCx4BorapWY9eHL2LzFXMxUy8tWS0RiNjMzAr9tsgOIu', '2021-04-25 23:52:02'),
(12, 'reporter', 2, 'olanipekun', 'seyi', 'EGIFFORD@M.ss', NULL, NULL, 'active', '', NULL, 'Lagos', '2, alatunse close', 'student', NULL, NULL, NULL, NULL, '$2y$10$7pDwy9QdygWKKAZoI.Sm8edqu.BgDbQIIC99aWTleDo/FN28sWhOK', '2021-04-26 01:04:28'),
(13, 'reporter', 3, 'olanipekun', 'seyi', 'EGIFFORD@M.sss', NULL, NULL, 'active', '', NULL, 'Lagos', '2, alatunse close', 'student', NULL, NULL, NULL, NULL, '$2y$10$ocClXpSVSfASppMft9kMFe8IkaAM6hO4SuSnW53pdOa0VDtFYcc7e', '2021-04-26 01:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

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
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
