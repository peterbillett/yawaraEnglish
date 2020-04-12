-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 02:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yawara`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `qid`, `content`, `correct`) VALUES
(1, 2, 'teach', 0),
(2, 2, 'taught', 1),
(3, 2, 'teachied', 0),
(4, 2, 'teached', 0),
(5, 1, 'use', 0),
(6, 1, 'used', 0),
(7, 1, 'love', 0),
(8, 1, 'loved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `example`
--

INSERT INTO `example` (`id`, `qid`, `title`, `content`) VALUES
(1, 1, 'Auxiliary verb + past participle', '<p>Example auxiliary verbs: is, isn\'t, was, wasn\'t, are, aren\'t, were, weren\'t, has, hasn\'t, had, hadn’t, have, haven’t</p>\r\n        <p>Example past participles: used, studied, closed, opened, cleaned, washed, asked, touched, started, invited, painted</p>\r\n\r\n        <p><b>Example sentences:</b>\r\n          <br>I have forgotten my homework!\r\n          <br>Disneyland is loved in Japan.\r\n          <br>Which light is turned off?<br>\r\n        </p>\r\n\r\n<div class=\"embed-responsive embed-responsive-16by9\">\r\n                      <iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/\" allowfullscreen></iframe>\r\n                    </div>');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `content`, `uid`) VALUES
(1, 'Past participle 過去分詞', '<p>Testing</p><ul><li>Point 1</li><li>Point 2</li><li><u>Point 3</u></li></ul><table class=\"table table-bordered\"><tbody><tr><td><b>Normal</b></td><td><b>Past participle</b></td></tr><tr><td>teach</td><td><font style=\"background-color: rgb(0, 0, 0);\" color=\"#ffff00\">taught</font></td></tr><tr><td>run</td><td>run</td></tr><tr><td>love</td><td>loved</td></tr></tbody></table><p><img src=\"https://images-na.ssl-images-amazon.com/images/I/51OWs5-JLqL._SX258_BO1,204,203,200_.jpg\" style=\"width: 260px;\"><br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `written` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `qid`, `content`, `written`) VALUES
(1, 1, 'This painting is ______ by many people.', 0),
(2, 1, 'Select the correct past participle form for \'teach\'.', 0),
(3, 1, 'Nara | visit | by many students', 1),
(4, 1, 'these books | read | around the world', 1),
(5, 1, 'A furoshiki is _________ in many ways.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `startdate` date NOT NULL DEFAULT current_timestamp(),
  `enddate` date DEFAULT NULL,
  `pageinfo` varchar(50) DEFAULT NULL,
  `wwid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `title`, `startdate`, `enddate`, `pageinfo`, `wwid`) VALUES
(1, 'Past participle 過去分詞', '2020-04-09', '2020-04-26', 'NEW HORIZON (page 6-7)', 1),
(3, 'FUTURE TEST', '2020-04-27', '2020-04-30', 'TEST', 2);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `grade` tinyint(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `grade`, `enabled`) VALUES
(1, 'Unit 1', 3, 1),
(2, 'Unit 2', 3, 1),
(3, 'Unit 3', 3, 1),
(4, 'Unit 4', 3, 1),
(5, 'Unit 5', 3, 1),
(6, 'Unit 6', 3, 1),
(7, 'Unit 7', 3, 1),
(8, 'Unit 9', 3, 1),
(9, 'Unit 0', 3, 1),
(10, 'Other', 3, 1),
(11, 'Unit 1', 2, 1),
(12, 'Unit 2', 2, 1),
(13, 'Unit 3', 2, 1),
(14, 'Unit 4', 2, 1),
(15, 'Unit 5', 2, 1),
(16, 'Unit 6', 2, 1),
(17, 'Unit 7', 2, 1),
(18, 'Unit 8', 2, 1),
(19, 'Unit 9', 2, 1),
(20, 'Other', 2, 1),
(21, 'Unit 0', 2, 1),
(22, 'Unit 1', 1, 1),
(23, 'Unit 2', 1, 1),
(24, 'Unit 3', 1, 1),
(25, 'Unit 4', 1, 1),
(26, 'Unit 5', 1, 1),
(27, 'Unit 6', 1, 1),
(28, 'Unit 7', 1, 1),
(29, 'Unit 8', 1, 1),
(30, 'Unit 9', 1, 1),
(31, 'Other', 1, 1),
(32, 'Unit 0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `wwid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `url`, `wwid`) VALUES
(1, 'https://www.youtube.com/embed/', 1),
(2, 'https://www.youtube.com/embed/', 1),
(3, 'https://www.youtube.com/embed/', 2);

-- --------------------------------------------------------

--
-- Table structure for table `worksheet`
--

CREATE TABLE `worksheet` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `wwid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_ibfk_1` (`qid`);

--
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`),
  ADD KEY `example_ibfk_1` (`qid`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wwid` (`uid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_ibfk_1` (`qid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wwid` (`wwid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wwid` (`wwid`);

--
-- Indexes for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wwid` (`wwid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worksheet`
--
ALTER TABLE `worksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `question` (`id`);

--
-- Constraints for table `example`
--
ALTER TABLE `example`
  ADD CONSTRAINT `example_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `units` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `units` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `units` (`id`);

--
-- Constraints for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD CONSTRAINT `worksheet_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
