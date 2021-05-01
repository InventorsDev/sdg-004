-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 09:43 PM
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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
