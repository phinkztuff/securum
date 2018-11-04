-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 01:29 PM
-- Server version: 5.7.19-log
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usc_bookingvisitors`
--

-- --------------------------------------------------------

--
-- Table structure for table `booker`
--

CREATE TABLE `booker` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booker`
--

INSERT INTO `booker` (`id`, `username`, `password`) VALUES
(1, 'visitor1', 'one'),
(2, 'visitor02', 'two'),
(3, 'rena', '12345'),
(4, 'rena', '12345'),
(5, 'Rena', 'Rena'),
(6, 'Renali Joy Mata', '12345'),
(7, 'Renali Joy Mata', 'Rena'),
(8, 'Rhean', 'rj'),
(9, 'Rhean', 'rena');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `purpose` varchar(1000) NOT NULL,
  `departmentTo` int(11) NOT NULL,
  `guardReceive` int(11) DEFAULT NULL,
  `guardReturn` int(11) DEFAULT NULL,
  `datevisit` date NOT NULL,
  `noofPersons` int(11) NOT NULL,
  `bookername` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `timein` varchar(50) NOT NULL,
  `timeout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `status`, `emailAddress`, `contactNumber`, `purpose`, `departmentTo`, `guardReceive`, `guardReturn`, `datevisit`, `noofPersons`, `bookername`, `comment`, `timein`, `timeout`) VALUES
(70, 'pending', 'theaisleznaehr@gmail.com', 2147483647, 'Seminar', 12, NULL, NULL, '2018-03-31', 3, '3', ' Hello', '', ''),
(71, 'rejected', 'rhshahhh@gmail.com', 2147483647, '.', 16, NULL, NULL, '2018-11-01', 8, '7', 'incomplete requirements', '', ''),
(72, 'approved', 'phink.ztuff@yahoo.com', 2147483647, 'Inquire', 6, NULL, NULL, '2018-10-26', 6, '7', '', '12:21:24', '12:25:13'),
(73, 'approved', 'rena@gmail.com', 2147483647, 'Blaa', 6, NULL, NULL, '2018-10-30', 8, '7', '', '12:15:48', '09:08:10'),
(74, 'pending', 'rj@gmail.com', 2147483647, 'Inquire', 11, NULL, NULL, '2018-11-03', 3, '7', ' What?', '', ''),
(75, 'approved', 'yfc@gmail.com', 2147483647, 'Seminar', 15, NULL, NULL, '2018-10-26', 2, '7', '', '07:35:31', '12:25:46'),
(76, 'approved', 'theaisleznaehr@gmail.com', 2147483647, 'Seminar', 1, NULL, NULL, '2018-10-29', 90, '7', '', '', ''),
(77, 'pending', 'renaji@gmail.com', 2147483647, 'Inquire', 16, NULL, NULL, '2018-10-30', 7, '7', ' Hello', '', ''),
(78, 'rejected', 'renalijoymata@gmail.com', 2147483647, 'Inquire', 3, NULL, NULL, '2018-10-29', 67, '7', 'Incomplete Requirements', '', ''),
(79, 'approved', 'rena@gmail.com', 2147483647, 'Wala lang', 6, NULL, NULL, '2018-10-25', 9, '7', '', '', ''),
(80, 'approved', 'rena@gmail.com', 2147483647, '...z', 6, NULL, NULL, '2018-10-11', 3, '9', '', '', ''),
(83, 'pending', 'theaisleznaehr@gmail.com', 2147483647, '.', 6, NULL, NULL, '2018-10-25', 5, '7', ' What?', '', ''),
(84, 'approved', 'asdasd@gmail.com', 2147483647, 'Seminar', 16, NULL, NULL, '2018-10-25', 5, '1111', '', '', ''),
(85, 'approved', 'rena@gmail.com', 2147483647, 'Seminar', 10, NULL, NULL, '2018-10-26', 8, 'renali', '', '', ''),
(86, 'new', 'asdasd@gmail.com', 2147483647, 'Seminar', 16, NULL, NULL, '0000-00-00', 8, 'Renali', '', '', ''),
(87, 'new', 'theaisleznaehr@gmail.com', 2147483647, 'Inquire', 19, NULL, NULL, '0000-00-00', 3, 'Renali', '', '', ''),
(88, 'new', 'theaisleznaehr@gmail.com', 2147483647, 'Inquire', 17, NULL, NULL, '0000-00-00', 4, 'rhean', '', '', ''),
(89, 'new', 'theaisleznaehr@gmail.com', 2147483647, 'Inquire', 19, NULL, NULL, '0000-00-00', 6, 'RheanJy', '', '', ''),
(90, 'approved', 'josapejdsad@gmail.com', 912381231, 'test', 18, NULL, NULL, '0000-00-00', 11, 'sakit sa mata', '', '', ''),
(91, 'pending', 'theaisleznaehr@gmail.com', 2147483647, 'Submit Forms', 17, NULL, NULL, '0000-00-00', 7, 'RJ', ' Whatttt?', '', ''),
(92, 'new', 'theaisleznaehr@gmail.com', 2147483647, 'Seminar', 20, NULL, NULL, '0000-00-00', 7, 'Renali', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildingId` int(11) NOT NULL,
  `buildingName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildingId`, `buildingName`) VALUES
(1, 'Lawrence Bunzel'),
(2, 'Arnoldus Science'),
(3, 'SMED'),
(4, 'Philip Van Engelen'),
(5, 'Robert Hoeppener'),
(6, 'Michael Richartz'),
(7, 'CAFA'),
(8, 'Church of St.Janssen & St. Freinademetz');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `deptName` varchar(100) NOT NULL,
  `deptBuilding` int(100) NOT NULL,
  `deptFloor` int(11) NOT NULL,
  `deptRoomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `deptName`, `deptBuilding`, `deptFloor`, `deptRoomNo`) VALUES
(1, 'Department of Civil Engineering', 1, 1, 102),
(2, 'Department of Chemical Engineering', 1, 1, 101),
(3, 'Department of Electrical Engineering ', 1, 3, 301),
(4, 'Department of Mechanical Engineering', 1, 3, 302),
(5, 'Department of Computer Engineering', 1, 3, 303),
(6, 'Department of Computer & Information Sciences', 1, 4, 401),
(7, 'Department of Industrial Engineering', 1, 4, 402),
(8, 'Department of Chemistry', 2, 3, 326),
(9, 'Department of Biology', 2, 2, 239),
(10, 'Department of Physics', 2, 2, 227),
(11, 'Department of Mathematics', 3, 3, 301),
(12, 'Department of Language & Literature', 4, 1, 14),
(13, 'Department of Psychology', 4, 3, 33),
(14, 'Department of History', 4, 4, 45),
(15, 'Department of Sociology & Anthropology', 4, 4, 45),
(16, 'Department of Nursing', 5, 2, 206),
(17, 'Department of Pharmacy', 5, 1, 109),
(18, 'Department of Nutrition & Dietetics', 5, 4, 402),
(19, 'Department of Tourism', 6, 3, 301),
(20, 'Department of Architecture', 7, 2, 205),
(21, 'Department of Fine Arts', 7, 2, 201),
(22, 'Department of Philosophy and Religious Studies', 8, 1, 102),
(24, 'Administration', 1, 1, 102);

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `gatepassnumber` int(11) NOT NULL,
  `gatepassDescription` text NOT NULL,
  `dateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guard`
--

CREATE TABLE `guard` (
  `guardNumber` int(11) NOT NULL,
  `guardPass` varchar(1000) NOT NULL,
  `guardFname` varchar(1000) NOT NULL,
  `guardLname` varchar(1000) NOT NULL,
  `guardAge` int(11) NOT NULL,
  `guardAddress` varchar(1000) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guard`
--

INSERT INTO `guard` (`guardNumber`, `guardPass`, `guardFname`, `guardLname`, `guardAge`, `guardAddress`, `isActive`) VALUES
(1111, 'headguard', 'USCguard', 'TC ', 35, 'Cebu City', 1),
(1112, 'guard', 'guard', 'Ren Ren Ren ', 22, 'Nasipit Talamban, Cebu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `datetime` date NOT NULL,
  `gatepassNumber` int(11) NOT NULL,
  `pointX` int(11) NOT NULL,
  `pointY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userType` int(11) NOT NULL,
  `userPassword` varchar(1000) NOT NULL,
  `deptId` int(11) DEFAULT NULL,
  `userName` varchar(500) NOT NULL,
  `userPosition` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userType`, `userPassword`, `deptId`, `userName`, `userPosition`) VALUES
(1, 0, 'admin', 24, 'admin', 'Admin'),
(2, 1, 'vpaa', 24, 'vpaa', 'VPAA'),
(3, 2, 'industrial', 7, 'iescretary', 'Secretary'),
(4, 2, 'dcis', 6, 'dcissecretary', 'Secretary'),
(5, 2, 'chemistry', 8, 'chemistrysecretary', 'Secretary'),
(7, 2, 'math', 11, 'mathsecretary', 'secretary'),
(8, 2, 'physics', 10, 'physicssecretary', 'secretary');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorID` int(11) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `idType` varchar(200) NOT NULL,
  `idNumber` int(11) NOT NULL,
  `dateVisited` date NOT NULL,
  `timeIn` varchar(50) NOT NULL,
  `timeOut` varchar(50) NOT NULL,
  `deptin` varchar(50) NOT NULL,
  `deptout` varchar(50) NOT NULL,
  `visitorFirstname` varchar(1000) NOT NULL,
  `visitorLastname` varchar(1000) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitorID`, `cardnumber`, `idType`, `idNumber`, `dateVisited`, `timeIn`, `timeOut`, `deptin`, `deptout`, `visitorFirstname`, `visitorLastname`, `BookingID`) VALUES
(1, 1, 'Drivers Car', 2938031, '2018-03-21', '', '', '', '', 'Mr', 'Driver', 7),
(2, 1, 'Drivers', 393812, '2018-03-21', '', '', '', '', 'Ms', 'Driver', 17),
(4, 0, 'SSS', 11000, '2018-03-22', '', '', '10:10', '10:10', 'RJ', 'Mataaa', 4),
(5, 0, 'simple109', 12345598, '2018-03-23', '', '', '10:10', '10:10', 'Mr.Clean', 'Cleaner', 66),
(6, 10, 'company', 11111, '2018-10-27', '08:22', '08:34', '', '', 'renali', 'remedio', 85),
(7, 10, 'company', 11111, '2018-10-27', '08:30', '', '10:10', '', 'sakit sa mata', 'remedio', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booker`
--
ALTER TABLE `booker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `departmentTo` (`departmentTo`),
  ADD KEY `guardReceived` (`guardReceive`),
  ADD KEY `guardReturn` (`guardReturn`),
  ADD KEY `bookername` (`bookername`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`),
  ADD KEY `deptBuilding` (`deptBuilding`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`gatepassnumber`);

--
-- Indexes for table `guard`
--
ALTER TABLE `guard`
  ADD PRIMARY KEY (`guardNumber`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`gatepassNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `deptId` (`deptId`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitorID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booker`
--
ALTER TABLE `booker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `gatepassnumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guard`
--
ALTER TABLE `guard`
  MODIFY `guardNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`departmentTo`) REFERENCES `department` (`departmentId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`guardReceive`) REFERENCES `guard` (`guardNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`guardReturn`) REFERENCES `guard` (`guardNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`deptBuilding`) REFERENCES `building` (`buildingId`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `department` (`departmentId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
