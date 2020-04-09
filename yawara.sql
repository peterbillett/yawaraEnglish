-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 05:01 AM
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
(1, 'Past participle 過去分詞', '2020-04-09', '2020-04-26', 'NEW HORIZON (page 6-7)', 1);

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
-- Table structure for table `weeklywork`
--

CREATE TABLE `weeklywork` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `startdate` date NOT NULL DEFAULT current_timestamp(),
  `enddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weeklywork`
--

INSERT INTO `weeklywork` (`id`, `title`, `grade`, `startdate`, `enddate`) VALUES
(1, 'Week 01', 3, '2020-04-09', '2020-04-19'),
(2, 'Week 02', 3, '2020-04-19', '2020-04-26');

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
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wwid` (`wwid`);

--
-- Indexes for table `weeklywork`
--
ALTER TABLE `weeklywork`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weeklywork`
--
ALTER TABLE `weeklywork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `weeklywork` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `weeklywork` (`id`);

--
-- Constraints for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD CONSTRAINT `worksheet_ibfk_1` FOREIGN KEY (`wwid`) REFERENCES `weeklywork` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
