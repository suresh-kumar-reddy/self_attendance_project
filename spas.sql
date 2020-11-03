-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(30) NOT NULL,
  `ANAME` varchar(30) NOT NULL,
  `APASS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(4, 'suresh', 'suresH@56');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(20) NOT NULL,
  `SID` varchar(20) NOT NULL,
  `TID` varchar(20) NOT NULL,
  `RNO` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CID` int(30) NOT NULL,
  `CNAME` varchar(20) NOT NULL,
  `CSEM` varchar(20) NOT NULL,
  `CSEC` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CID`, `CNAME`, `CSEM`, `CSEC`) VALUES
(23, 'MCA', '3', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(30) NOT NULL,
  `ENAME` varchar(30) NOT NULL,
  `ETYPE` varchar(30) NOT NULL,
  `EDATE` varchar(30) NOT NULL,
  `SESSION` varchar(30) NOT NULL,
  `CLASS` varchar(30) NOT NULL,
  `SUB` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `CLASS`, `SUB`) VALUES
(4, 'cia', 'CIA1', '1-01-2019', 'FN', 'I', 'English'),
(5, 'MID SEM', 'CIA1', '17-02-2019', 'FN', 'I', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `hclass`
--

CREATE TABLE `hclass` (
  `HID` int(11) NOT NULL,
  `TNAME` varchar(30) NOT NULL,
  `CLA` varchar(30) NOT NULL,
  `CSEM` varchar(20) NOT NULL,
  `SEC` varchar(30) NOT NULL,
  `SUB` varchar(30) NOT NULL,
  `DATE` date DEFAULT NULL,
  `FROM_TIME` time DEFAULT NULL,
  `TO_TIME` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hclass`
--

INSERT INTO `hclass` (`HID`, `TNAME`, `CLA`, `CSEM`, `SEC`, `SUB`, `DATE`, `FROM_TIME`, `TO_TIME`) VALUES
(6, 'umesh', 'MCA', '3', 'General', 'C#', '2020-10-30', '14:33:00', '15:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `REGNO` varchar(30) NOT NULL,
  `CIA` varchar(30) NOT NULL,
  `SUB1` varchar(30) NOT NULL,
  `SUB2` varchar(30) NOT NULL,
  `SUB3` varchar(30) NOT NULL,
  `SUB4` varchar(30) NOT NULL,
  `SUB5` varchar(30) NOT NULL,
  `MARK1` varchar(20) NOT NULL,
  `MARK2` varchar(30) NOT NULL,
  `MARK3` varchar(30) NOT NULL,
  `MARK4` varchar(30) NOT NULL,
  `MARK5` varchar(30) NOT NULL,
  `TOTAL` varchar(30) NOT NULL,
  `AVG` varchar(30) NOT NULL,
  `GRADE` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `REASON` varchar(30) NOT NULL,
  `CLASS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`REGNO`, `CIA`, `SUB1`, `SUB2`, `SUB3`, `SUB4`, `SUB5`, `MARK1`, `MARK2`, `MARK3`, `MARK4`, `MARK5`, `TOTAL`, `AVG`, `GRADE`, `STATUS`, `REASON`, `CLASS`) VALUES
('s104', '1', 'English', 'Mathematics', 'Statistics', 'c language', 'dbms', '18', '15', '14', '10', '17', '74', '74', 'a', 'pass', '', 'I'),
('s104', '2', 'English', 'Mathematics', 'Statistics', 'c language', 'dbms', '45', '35', '25', '35', '40', '180', '72', 'a', 'pass', '', 'I'),
('s104', '3', 'Mathematics', 'English', 'Statistics', 'c language', 'dbms', '12', '11', '18', '19', '16', '76', '76', 'a', 'pass', '', 'I'),
('s104', '4', 'English', 'Mathematics', 'Statistics', 'c language', 'dbms', '65', '78', '98', '61', '87', '389', '77.8', 'a', 'pass', '', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `TID` int(20) NOT NULL,
  `TNAME` varchar(30) NOT NULL,
  `TPASS` varchar(30) NOT NULL,
  `QUAL` varchar(30) NOT NULL,
  `SAL` varchar(30) NOT NULL,
  `PNO` varchar(30) NOT NULL,
  `MAIL` varchar(30) NOT NULL,
  `PADDR` varchar(50) NOT NULL,
  `IMG` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `SAL`, `PNO`, `MAIL`, `PADDR`, `IMG`) VALUES
(1, 'umesh', 'umesH@123', 'MPhil', '100000', '9652456546', 'dfjd@gmail.com', 'bangalore', 'staff/suresh.jpg'),
(2, 'abhishek', 'abhisheK@123', 'Mphil', '52001', '9652456546', 'abhishek@gmail.com', 'Bangalore', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(20) NOT NULL,
  `RNO` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `DOB` varchar(30) NOT NULL,
  `GEN` varchar(10) NOT NULL,
  `PHO` varchar(20) NOT NULL,
  `MAIL` varchar(34) NOT NULL,
  `SCLASS` varchar(30) NOT NULL,
  `SSEM` varchar(20) NOT NULL,
  `SSEC` varchar(30) NOT NULL,
  `AID` varchar(30) NOT NULL,
  `SIMG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `RNO`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `SCLASS`, `SSEM`, `SSEC`, `AID`, `SIMG`) VALUES
(1, '19MCAR001', 'Suresh', 'harish', '2-01-1999', 'Male', '9820476543', 'sureshkumarreddy56@gmail.com', 'MCA', '3', 'General', '4', 'student/praveen.jpg'),
(2, '19MCAR002', 'praveen', 'harish', '15-04-1997', 'Male', '9858585858', 'praveen@gmail.com', 'MCA', '3', 'General', '4', 'student/suresh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `SID` varchar(10) NOT NULL,
  `SNAME` varchar(30) NOT NULL,
  `CLASS` varchar(30) NOT NULL,
  `CSEC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`SID`, `SNAME`, `CLASS`, `CSEC`) VALUES
('18MCAR301', 'C#', 'MCA', 'General'),
('18MCAR302', 'NoSQL', 'MCA', 'General');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `hclass`
--
ALTER TABLE `hclass`
  ADD PRIMARY KEY (`HID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hclass`
--
ALTER TABLE `hclass`
  MODIFY `HID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `TID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
