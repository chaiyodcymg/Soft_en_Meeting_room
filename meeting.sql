-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 06:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `head` varchar(100) NOT NULL,
  `numattend` int(3) NOT NULL,
  `listname` varchar(500) NOT NULL,
  `roomid` int(3) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `addequipment` varchar(100) NOT NULL,
  `userid` int(3) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `meetfile` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `head`, `numattend`, `listname`, `roomid`, `start`, `end`, `addequipment`, `userid`, `remark`, `meetfile`, `color`) VALUES
(25, 'งบเรือดำนํ้า', 'รองนายกเทศมนตรี1', 50, 'ไชยยศ', 15, '2022-04-04 10:03:00', '2022-04-05 10:03:00', 'ไม่มี', 0, 'ไม่มี', 'upload/1649042843.', '#238500'),
(27, 'เงินน', 'รองนายกเทศมนตรี2', 50, 'แดงกีตาร์', 16, '2022-04-12 10:16:00', '2022-04-13 10:16:00', 'ไม่มี', 0, 'ไม่มี', 'upload/1649042198.jpg', '#e28112'),
(29, 'งบเรือดำนํ้า', 'รองนายกเทศมนตรี2', 50, 'ไชยยศ', 15, '2022-04-04 10:55:00', '2022-04-05 10:55:00', 'ไม่มี', 0, 'ไม่มี', 'upload/1649044604.', '#df7c0c');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(3) NOT NULL,
  `roomname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `capacity` int(4) NOT NULL,
  `projector` int(3) NOT NULL,
  `microphone` int(3) NOT NULL,
  `others` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomname`, `location`, `capacity`, `projector`, `microphone`, `others`) VALUES
(15, 'วิทยาวิภาศ', 'ตึก 9 คณะวิทยาศาสตร์', 10, 10, 10, 'ไม่มี'),
(16, 'วิทยา', 'ตึก 6', 20, 20, 20, 'ไม่มี'),
(17, 'วิทยาวิภาศ 9', 'ตึก 6', 50, 10, 10, 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(2) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `firstname`, `surname`, `tel`) VALUES
(1, 'admin', '1234', '01', 'Natakorn', 'Rotchan', '0998887777'),
(2, 'user', '1234', '02', 'Hoimalang', 'Pooyem', '0818885555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
