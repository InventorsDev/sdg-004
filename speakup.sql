-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 11:03 PM
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
(5, 'assaulted raped bullied, mollested', 'Use this link to read up helpful tips, to keep you safe <a href=\"./tips\"> Tips and Guides <a/>\r\n', '2021-04-21 20:45:39'),
(6, 'i need your help', 'In what way please, I\'m here for you', '2021-05-04 23:32:29');

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
(1, 16, 2, '<b>Help Needed Here!</b><br>I need your help', 'outbox', 'read', '', '2021-05-05 01:37:51'),
(2, 2, 0, 'Hello', 'outbox', 'unread', '', '2021-05-05 01:39:06'),
(3, 2, 0, 'sss', 'outbox', 'unread', '', '2021-05-05 01:48:16'),
(4, 2, 0, 'sss', 'outbox', 'unread', '', '2021-05-05 01:48:35'),
(5, 2, 0, 'sss', 'inbox', 'unread', '', '2021-05-05 16:05:02'),
(6, 16, 2, 'gree', 'outbox', 'read', '', '2021-05-05 16:05:28'),
(7, 2, 0, 'wwqwwww', 'inbox', 'unread', '', '2021-05-05 16:07:08'),
(8, 0, 2, 'this', 'inbox', 'unread', '', '2021-05-05 16:13:44'),
(9, 0, 2, 'thiss', 'inbox', 'unread', '', '2021-05-05 16:15:17'),
(10, 0, 2, 'ss', 'inbox', 'unread', '', '2021-05-05 16:15:44'),
(11, 0, 2, 'ss', 'inbox', 'unread', '', '2021-05-05 16:15:45'),
(12, 0, 2, 'ss', 'inbox', 'unread', '', '2021-05-05 16:15:46'),
(13, 16, 2, 'ss', 'inbox', 'read', '', '2021-05-05 16:16:45'),
(14, 16, 2, 'sss', 'outbox', 'read', '', '2021-05-05 16:16:54'),
(15, 16, 2, 'ss', 'inbox', 'read', '', '2021-05-05 16:17:23'),
(16, 16, 2, 'sss', 'inbox', 'read', '', '2021-05-05 16:17:28'),
(17, 16, 2, 'sssssss', 'inbox', 'read', '', '2021-05-05 16:18:51'),
(18, 16, 2, 'ssss', 'outbox', 'read', '', '2021-05-05 16:19:01'),
(19, 16, 2, 'ssss', 'outbox', 'read', '', '2021-05-05 16:19:09'),
(20, 2, 2, 'ddddddddddddd', 'inbox', 'unread', '', '2021-05-05 16:23:01'),
(21, 16, 2, 'sss', 'inbox', 'read', '', '2021-05-05 16:24:57'),
(22, 16, 2, 'ss', 'outbox', 'read', '', '2021-05-05 16:25:16'),
(23, 16, 2, 'wwww', 'inbox', 'unread', '', '2021-05-05 16:28:13'),
(24, 16, 2, 'weded', 'outbox', 'unread', '', '2021-05-05 16:28:29'),
(25, 16, 2, 'sss', 'inbox', 'unread', '', '2021-05-05 16:29:29'),
(26, 16, 2, 'wq', 'inbox', 'unread', '', '2021-05-05 16:29:45');

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
(26, 15, 'Welcome!', '922975231', '<p>Hello dear!</p><p>We are happy to have you. This platform will help you get help on any situation, make report as an eyewitness or a victim and get response from professional responders.</p><p>We hope you would make use of this opportunity to the fullest.</p><p>Thanks and best regards<br>SpeakUp Board of Director</p>', 'read', '2021-05-05 01:24:03'),
(27, 2, 'Seyi Olanipekun needs you help', '', 'i need help asap', 'read', '2021-05-05 01:24:33'),
(28, 2, 'A new report submitted: <b>Ssss</b>', '1127524035', '<p>You have received a new report from one of your assigned reporter.<br>Please take your time to go through the doments and treat every reports received as important.</p><p>Good luck!</p>', 'read', '2021-05-05 01:25:07'),
(29, 2, 'A new report submitted: <b>Sss</b>', '1528694339', '<p>You have received a new report from one of your assigned reporter.<br>Please take your time to go through the doments and treat every reports received as important.</p><p>Good luck!</p>', 'read', '2021-05-05 01:26:57'),
(30, 16, 'Welcome!', '489470678', '<p>Hello dear!</p><p>We are happy to have you. This platform will help you get help on any situation, make report as an eyewitness or a victim and get response from professional responders.</p><p>We hope you would make use of this opportunity to the fullest.</p><p>Thanks and best regards<br>SpeakUp Board of Director</p>', 'unread', '2021-05-05 01:37:24'),
(31, 2, 'Seyi Olanipekun needs you help', '', 'I need your help', 'unread', '2021-05-05 01:37:51'),
(32, 2, 'A new report submitted: <b>What I Saw Today</b>', '1563400920', '<p>You have received a new report from one of your assigned reporter.<br>Please take your time to go through the doments and treat every reports received as important.</p><p>Good luck!</p>', 'unread', '2021-05-05 01:40:46');

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
(6, 15, 2, 'anonymous', 'ssss', 'ssss', 'none', 'received', '', '2021-05-05 01:25:07'),
(7, 15, 2, 'anonymous', 'sss', 'ddd', 'report_7_file_0.PNG', 'received', '', '2021-03-05 01:26:57'),
(8, 15, 2, 'anonymous', 'ssss', 'ssss', 'none', 'received', '', '2021-05-05 01:25:07'),
(9, 15, 2, 'anonymous', 'sss', 'ddd', 'report_7_file_0.PNG', 'received', '', '2021-04-05 01:26:57'),
(10, 16, 2, 'a reporter', 'What I saw today', 'I came across something today', 'report_10_file_0.PNG,report_10_file_1.PNG,report_10_file_2.mp3,report_10_file_3.mp4', 'received', '', '2021-05-05 01:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `tips_guides`
--

CREATE TABLE `tips_guides` (
  `tips_id` int(11) NOT NULL,
  `posted_by` text NOT NULL,
  `posted_id` int(11) NOT NULL,
  `tips_title` text NOT NULL,
  `title_slug` text NOT NULL,
  `tips_content` text NOT NULL,
  `cover_image` varchar(225) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips_guides`
--

INSERT INTO `tips_guides` (`tips_id`, `posted_by`, `posted_id`, `tips_title`, `title_slug`, `tips_content`, `cover_image`, `date_added`) VALUES
(1, 'DIKE Oluwatuyi', 2, 'ss', '', 'sss', '301_4 - Copy - Copy.jpg', '2021-05-04 20:16:11'),
(2, 'DIKE Oluwatuyi', 2, 'Adejoke Spoke Up!', '', 'We got a report from a student of Olusegun Agagu University of Science and Technology OAUSTECH, Okitipupa\n          From a final year student of Microbiology, department of Biological Science. Her', '301_4 - Copy - Copy.jpg', '2021-05-08 22:08:36'),
(3, 'DIKE Oluwatuyi', 2, 'Introducing the Bystanders', '', 'Progressively foster client-focused sources through sustainable collaboration and idea-sharing. Seamlessly aggregate effective testing procedures rather than.Introducing the Bystanders', 'ggggggggggggggg.png', '2021-05-08 22:12:18'),
(4, 'DIKE Oluwatuyi', 2, 'ggggggggggggggg', 'ggggggggggggggg', 'nmqd dq d dqd dwd', 'ggggggggggggggg.png', '2021-05-08 22:33:43');

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
(2, 'responder', 0, 'Oluwatuyi', 'DIKE', 'onabajooluwakeji@gmail.com', NULL, NULL, 'active', '', NULL, NULL, NULL, 'student', NULL, NULL, NULL, NULL, '$2y$10$R7uU3aQYskpj.LXOo4G8W.j84Qg8cI83MX9FG4BO6KlZimDamGLCS', '2021-04-23 14:15:27'),
(16, 'reporter', 2, 'olanipekun', 'seyi', 'EGIFFORD@MVCC.EDU', NULL, NULL, 'active', '', NULL, 'Lagos', '2, alatunse close', 'student', NULL, NULL, NULL, NULL, '$2y$10$BGpZeTulmET3h6npzY4F9.prBFWD27EVG/Le6IXL/2mRGbojM1ouG', '2021-05-05 01:37:24');

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
-- Indexes for table `tips_guides`
--
ALTER TABLE `tips_guides`
  ADD PRIMARY KEY (`tips_id`);

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tips_guides`
--
ALTER TABLE `tips_guides`
  MODIFY `tips_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
