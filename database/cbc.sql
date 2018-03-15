-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 04:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbcarticle`
--

CREATE TABLE `cbcarticle` (
  `ArticleID` int(11) NOT NULL,
  `ArticleName` varchar(50) NOT NULL,
  `ArticleBody` text NOT NULL,
  `ArticlePage` int(11) NOT NULL,
  `ArticleDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cbcaudio`
--

CREATE TABLE `cbcaudio` (
  `AudioID` int(11) NOT NULL,
  `AudioName` varchar(100) NOT NULL,
  `AudioFile` varchar(100) NOT NULL,
  `AudioLocation` varchar(50) NOT NULL,
  `AudioDate` date NOT NULL,
  `AudioDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cbccalander`
--

CREATE TABLE `cbccalander` (
  `CalanderID` int(11) NOT NULL,
  `CalanderName` varchar(50) NOT NULL,
  `CalanderStart` datetime NOT NULL,
  `CalanderEnd` datetime NOT NULL,
  `CalanderDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cbcministry`
--

CREATE TABLE `cbcministry` (
  `MinistryID` int(11) NOT NULL,
  `MinistryName` varchar(50) NOT NULL,
  `MinistryBody` text NOT NULL,
  `MinistryDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbcministry`
--

INSERT INTO `cbcministry` (`MinistryID`, `MinistryName`, `MinistryBody`, `MinistryDeleted`) VALUES
(2, 'Test', 'Testing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbcmissions`
--

CREATE TABLE `cbcmissions` (
  `MissionsID` int(11) NOT NULL,
  `MissionsName` varchar(50) NOT NULL,
  `MissionsBody` text NOT NULL,
  `MissionsDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbcmissions`
--

INSERT INTO `cbcmissions` (`MissionsID`, `MissionsName`, `MissionsBody`, `MissionsDeleted`) VALUES
(2, 'Test', 'Test1', 0),
(3, 'Test', 'Test', 0),
(5, 'Hannah D. Reeves', 'Missionary to Myanmar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbcpicture`
--

CREATE TABLE `cbcpicture` (
  `PictureID` int(11) NOT NULL,
  `PictureName` varchar(50) NOT NULL,
  `PictureLocation` varchar(50) NOT NULL,
  `PicturePage` int(11) NOT NULL,
  `PictureDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbcpicture`
--

INSERT INTO `cbcpicture` (`PictureID`, `PictureName`, `PictureLocation`, `PicturePage`, `PictureDeleted`) VALUES
(3, '', 'images', 1, 0),
(4, 'cover.jpg', 'images', 1, 0),
(5, '', 'images', 2, 0),
(6, '', 'images', 2, 0),
(7, '', 'images', 2, 0),
(8, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(9, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(10, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(11, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(12, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(13, '1558458_10202797691684094_950532154_n.jpg', 'images', 2, 0),
(14, 'ISee.PNG', 'images', 2, 0),
(15, 'ISee.PNG', 'images', 2, 0),
(16, 'ISee.PNG', 'images', 2, 0),
(17, 'Picture1.jpg', 'images', 2, 0),
(18, 'RCO017.jpg', 'images', 2, 0),
(19, 'RCO017.jpg', 'images', 2, 0),
(20, 'RCO017.jpg', 'images', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbcstaff`
--

CREATE TABLE `cbcstaff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `StaffInfo` text NOT NULL,
  `StaffPosition` varchar(50) NOT NULL,
  `StaffDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbcstaff`
--

INSERT INTO `cbcstaff` (`StaffID`, `StaffName`, `StaffInfo`, `StaffPosition`, `StaffDeleted`) VALUES
(1, 'Sarah Jane Gibbon', 'Personnal Stuff', 'Worship and Children\\''s Pastor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbcuser`
--

CREATE TABLE `cbcuser` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userFirst` varchar(50) NOT NULL,
  `userLast` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userQuestion` varchar(100) NOT NULL,
  `userAnswer` varchar(100) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPremission` int(11) NOT NULL,
  `userDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbcuser`
--

INSERT INTO `cbcuser` (`userID`, `userName`, `userFirst`, `userLast`, `userPassword`, `userQuestion`, `userAnswer`, `userEmail`, `userPremission`, `userDeleted`) VALUES
(1, 'username', 'first', 'last', '$2y$10$P4yfKFIGSsxp5s./ve/3a.d5zbIuHZ26NKOXia.g9N2', 'question', '$2y$10$MTQtto85RwOti1Izexk4H.VnmbEhRxHxWMoqaSoQ1Ph.xvScnKe4W', 'email', 0, 0),
(2, 'username5', 'Sarah', 'Gibbon', '$2y$10$C7G3JUU.bNUZeRJ23svs.uO8C5k/H2HJE1.aEYSgPhp', 'How is he', '$2y$10$mp/js6.b6B6ngxYXCWaHo.eSWItmvNeMIl9XWt8ixDsUHgvc0CnGa', 'TEST', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pictureministry`
--

CREATE TABLE `pictureministry` (
  `linkID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `PictureID` int(11) NOT NULL,
  `linkDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictureministry`
--

INSERT INTO `pictureministry` (`linkID`, `MinistryID`, `PictureID`, `linkDeleted`) VALUES
(3, 2, 20, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbcarticle`
--
ALTER TABLE `cbcarticle`
  ADD PRIMARY KEY (`ArticleID`);

--
-- Indexes for table `cbcaudio`
--
ALTER TABLE `cbcaudio`
  ADD PRIMARY KEY (`AudioID`);

--
-- Indexes for table `cbccalander`
--
ALTER TABLE `cbccalander`
  ADD PRIMARY KEY (`CalanderID`);

--
-- Indexes for table `cbcministry`
--
ALTER TABLE `cbcministry`
  ADD PRIMARY KEY (`MinistryID`);

--
-- Indexes for table `cbcmissions`
--
ALTER TABLE `cbcmissions`
  ADD PRIMARY KEY (`MissionsID`);

--
-- Indexes for table `cbcpicture`
--
ALTER TABLE `cbcpicture`
  ADD PRIMARY KEY (`PictureID`);

--
-- Indexes for table `cbcstaff`
--
ALTER TABLE `cbcstaff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `cbcuser`
--
ALTER TABLE `cbcuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `pictureministry`
--
ALTER TABLE `pictureministry`
  ADD PRIMARY KEY (`linkID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbcarticle`
--
ALTER TABLE `cbcarticle`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbcaudio`
--
ALTER TABLE `cbcaudio`
  MODIFY `AudioID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbccalander`
--
ALTER TABLE `cbccalander`
  MODIFY `CalanderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbcministry`
--
ALTER TABLE `cbcministry`
  MODIFY `MinistryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cbcmissions`
--
ALTER TABLE `cbcmissions`
  MODIFY `MissionsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cbcpicture`
--
ALTER TABLE `cbcpicture`
  MODIFY `PictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cbcstaff`
--
ALTER TABLE `cbcstaff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cbcuser`
--
ALTER TABLE `cbcuser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pictureministry`
--
ALTER TABLE `pictureministry`
  MODIFY `linkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
