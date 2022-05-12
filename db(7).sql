-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 05:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `idappointment` int(45) NOT NULL,
  `appreason` varchar(45) DEFAULT NULL,
  `apptime` varchar(45) DEFAULT NULL,
  `appdate` varchar(45) DEFAULT NULL,
  `docid` varchar(30) NOT NULL,
  `patientinformation_idpatientinformation` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`idappointment`, `appreason`, `apptime`, `appdate`, `docid`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 'pending', 'pending', 12),
(123, 'pending', 'pending', 'pending', 'pending', 123),
(1955, 'lab test ', '10:30', '2021-07-14', '34', 1955),
(1998, 'pending', 'pending', 'pending', '34', 1998),
(34434, 'come', '8:30', '2021-07-28', '5656', 34434),
(454545, 'pending', 'pending', 'pending', '34', 454545),
(34343434, 'pending', 'pending', 'pending', 'pending', 34343434),
(88888888, 'pending', 'pending', 'pending', 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `assignbed`
--

CREATE TABLE `assignbed` (
  `idassignbed` int(45) NOT NULL,
  `badnumber` varchar(45) DEFAULT NULL,
  `roomnumber` varchar(30) NOT NULL,
  `patientinformation_idpatientinformation` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignbed`
--

INSERT INTO `assignbed` (`idassignbed`, `badnumber`, `roomnumber`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 12),
(123, 'pending', 'pending', 123);

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `idbed` int(11) NOT NULL,
  `bedno` varchar(45) DEFAULT NULL,
  `roomno` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`idbed`, `bedno`, `roomno`, `status`) VALUES
(56, '67', '89', 'Private'),
(545, '76', '89', 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `commnt` varchar(8000) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `name`, `commnt`, `date`) VALUES
(1, 'Annoums', 'sdddddddddddddd', '2021-07-19 04:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `iddrug` int(11) NOT NULL,
  `drugname` varchar(45) DEFAULT NULL,
  `rgdate` varchar(45) DEFAULT NULL,
  `exdate` varchar(45) DEFAULT NULL,
  `avilability` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`iddrug`, `drugname`, `rgdate`, `exdate`, `avilability`) VALUES
(0, '', '', '', ''),
(34, 'amox', '343', '3434/767/5', '34'),
(45, 'herx', '45', '4545454545', '45'),
(88, 'iii', '79', '9999900000', '88');

-- --------------------------------------------------------

--
-- Table structure for table `drugorder`
--

CREATE TABLE `drugorder` (
  `iddrugorder` int(11) NOT NULL,
  `diseasename` varchar(45) DEFAULT NULL,
  `mebication` varchar(45) DEFAULT NULL,
  `docid` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `patientinformation_idpatientinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drugorder`
--

INSERT INTO `drugorder` (`iddrugorder`, `diseasename`, `mebication`, `docid`, `date`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 0, 'pending', 12),
(123, 'pending', 'pending', 0, 'pending', 123),
(1955, 'pending', 'pending', 34, 'pending', 1955),
(1998, 'pending', 'pending', 34, 'pending', 1998),
(34434, 'pending', 'pending', 5656, 'pending', 34434),
(454545, 'pending', 'pending', 34, 'pending', 454545),
(34343434, 'pending', 'pending', 0, 'pending', 34343434),
(88888888, 'pending', 'pending', 0, 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `laborder`
--

CREATE TABLE `laborder` (
  `idlaborder` int(11) NOT NULL,
  `prescrption` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `docid` int(11) NOT NULL,
  `patientinformation_idpatientinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laborder`
--

INSERT INTO `laborder` (`idlaborder`, `prescrption`, `date`, `docid`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 0, 12),
(123, 'pending', 'pending', 0, 123),
(1955, 'shent mermera\r\n', '2021-08-01', 34, 1955),
(1998, 'pending', 'pending', 34, 1998),
(34434, 'pending', 'pending', 5656, 34434),
(454545, 'pending', 'pending', 34, 454545),
(34343434, 'pending', 'pending', 0, 34343434),
(88888888, 'pending', 'pending', 0, 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `labresult`
--

CREATE TABLE `labresult` (
  `idlabresult` int(11) NOT NULL,
  `labresult` varchar(45) DEFAULT NULL,
  `docid` varchar(45) DEFAULT NULL,
  `laborder_idlaborder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labresult`
--

INSERT INTO `labresult` (`idlabresult`, `labresult`, `docid`, `laborder_idlaborder`) VALUES
(12, 'this is laab result', '5656', 12),
(123, 'pending', 'pending', 123),
(1955, 'nemoniya', '34', 1955),
(1998, 'pending', '34', 1998),
(34434, 'pending', '5656', 34434),
(454545, 'pending', '34', 454545),
(34343434, 'pending', 'pending', 34343434),
(88888888, 'pending', 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `news` varchar(8000) DEFAULT NULL,
  `location` varchar(5000) NOT NULL,
  `date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idnews`, `news`, `location`, `date`) VALUES
(1, 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'Uploaded_Files_news// 14072021125740b.jpg', '2021-07-14 12:57:40'),
(2, 'dsdsd', 'Uploaded_Files_news// 14072021125804b.jpg', '2021-07-14 12:58:04'),
(3, 'hhhhhhhhhhhuihoioio', 'Uploaded_Files_news// 17072021032107055A7819.JPG', '2021-07-17 15:21:07'),
(4, 'fgggggggggggggg', 'Uploaded_Files_news// 19072021043738b.jpg', '2021-07-19 04:37:38'),
(5, 'ghghg', 'Uploaded_Files_news// 19072021043813b.jpg', '2021-07-19 04:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `patienthistory`
--

CREATE TABLE `patienthistory` (
  `idpatienthistory` int(11) NOT NULL,
  `symptom` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `patientresult` varchar(45) DEFAULT NULL,
  `docid` varchar(45) DEFAULT NULL,
  `patientinformation_idpatientinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patienthistory`
--

INSERT INTO `patienthistory` (`idpatienthistory`, `symptom`, `date`, `patientresult`, `docid`, `patientinformation_idpatientinformation`) VALUES
(88888891, 'tytt', '2021-07-19 03:16:41', 'hello', 'pending', 88888888),
(88888892, 'love', '2021-07-19 03:37:03', 'emmpua', '', 34343434),
(88888893, 'weba', '2021-07-19 04:00:09', 'oooo', '5656', 12),
(88888894, '', '2021-07-19 04:00:17', '', '', 34343434);

-- --------------------------------------------------------

--
-- Table structure for table `patientinformation`
--

CREATE TABLE `patientinformation` (
  `idpatientinformation` int(11) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `kebele` varchar(45) DEFAULT NULL,
  `house` varchar(45) DEFAULT NULL,
  `blood` varchar(45) DEFAULT NULL,
  `docid` varchar(45) DEFAULT NULL,
  `payment` varchar(45) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patientinformation`
--

INSERT INTO `patientinformation` (`idpatientinformation`, `phone`, `region`, `town`, `kebele`, `house`, `blood`, `docid`, `payment`, `user_iduser`) VALUES
(12, '0987678789', 'amhara', 'daberewerk', '05', '12', 'A+', '5656', 'pending', 12),
(123, '3434', 'amhara', 'gonder', '03', '34', 'A+', 'pending', 'pending', 123),
(1955, '3434343434', 'amhara', 'gondar', '05', '711', 'O+', '34', 'pending', 1955),
(1998, '343434', 'amhara', 'gondar', '05', '12', 'A+', '34', 'pending', 1998),
(34434, '56565656', '45', '45', '43', '34', 'A+', '5656', 'pending', 34434),
(454545, '2323', 'amhara', 'gondar', '45', '45', 'A+', '34', 'pending', 454545),
(34343434, '43343', 'amhara', 'gondar', '45', '45', 'A+', 'pending', 'pending', 34343434),
(88888888, '2323', 'amhara', 'gondar', '45', '45', 'A+', 'pending', 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `payement`
--

CREATE TABLE `payement` (
  `idpayement` int(11) NOT NULL,
  `lab_payment_status` varchar(45) DEFAULT NULL,
  `drug_payment_satatus` varchar(45) NOT NULL,
  `patientinformation_idpatientinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payement`
--

INSERT INTO `payement` (`idpayement`, `lab_payment_status`, `drug_payment_satatus`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 12),
(123, 'pending', 'pending', 123),
(1955, 'pending', 'pending', 1955),
(1998, 'pending', 'pending', 1998),
(34434, 'pending', 'pending', 34434),
(454545, 'pending', 'pending', 454545),
(34343434, 'pending', 'pending', 34343434),
(88888888, 'pending', 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `recommndation`
--

CREATE TABLE `recommndation` (
  `idrecommndation` int(11) NOT NULL,
  `recommndation` varchar(45) DEFAULT NULL,
  `docid` varchar(45) DEFAULT NULL,
  `patientinformation_idpatientinformation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommndation`
--

INSERT INTO `recommndation` (`idrecommndation`, `recommndation`, `docid`, `patientinformation_idpatientinformation`) VALUES
(12, 'pending', 'pending', 12),
(123, 'pending', 'pending', 123),
(1955, 'eat any time ', '', 1955),
(1998, 'pending', '34', 1998),
(34434, 'pending', '5656', 34434),
(454545, 'pending', '34', 454545),
(34343434, 'pending', 'pending', 34343434),
(88888888, 'pending', 'pending', 88888888);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(8000) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`, `fname`, `mname`, `lname`, `gender`, `age`, `email`, `Status`) VALUES
(1 'davinci', 'melake', 'admin', 'Melake', 'Gedefaye', 'Gedefaye', 'Male', '23', 'leonardo@gmail.com', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`idappointment`),
  ADD KEY `fk_appointment_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `assignbed`
--
ALTER TABLE `assignbed`
  ADD PRIMARY KEY (`idassignbed`),
  ADD KEY `fk_assignbed_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`idbed`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`iddrug`);

--
-- Indexes for table `drugorder`
--
ALTER TABLE `drugorder`
  ADD PRIMARY KEY (`iddrugorder`),
  ADD KEY `fk_drugorder_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `laborder`
--
ALTER TABLE `laborder`
  ADD PRIMARY KEY (`idlaborder`),
  ADD KEY `fk_laborder_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `labresult`
--
ALTER TABLE `labresult`
  ADD PRIMARY KEY (`idlabresult`),
  ADD KEY `fk_labresult_laborder1_idx` (`laborder_idlaborder`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- Indexes for table `patienthistory`
--
ALTER TABLE `patienthistory`
  ADD PRIMARY KEY (`idpatienthistory`),
  ADD KEY `fk_patienthistory_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `patientinformation`
--
ALTER TABLE `patientinformation`
  ADD PRIMARY KEY (`idpatientinformation`),
  ADD KEY `fk_patient information_user1_idx` (`user_iduser`);

--
-- Indexes for table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`idpayement`),
  ADD KEY `fk_payement_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `recommndation`
--
ALTER TABLE `recommndation`
  ADD PRIMARY KEY (`idrecommndation`),
  ADD KEY `fk_recommndation_patient information1_idx` (`patientinformation_idpatientinformation`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patienthistory`
--
ALTER TABLE `patienthistory`
  MODIFY `idpatienthistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88888895;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignbed`
--
ALTER TABLE `assignbed`
  ADD CONSTRAINT `fk_assignbed_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drugorder`
--
ALTER TABLE `drugorder`
  ADD CONSTRAINT `fk_drugorder_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laborder`
--
ALTER TABLE `laborder`
  ADD CONSTRAINT `fk_laborder_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labresult`
--
ALTER TABLE `labresult`
  ADD CONSTRAINT `fk_labresult_laborder1` FOREIGN KEY (`laborder_idlaborder`) REFERENCES `laborder` (`idlaborder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patienthistory`
--
ALTER TABLE `patienthistory`
  ADD CONSTRAINT `fk_patienthistory_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientinformation`
--
ALTER TABLE `patientinformation`
  ADD CONSTRAINT `fk_patient information_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `fk_payement_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommndation`
--
ALTER TABLE `recommndation`
  ADD CONSTRAINT `fk_recommndation_patient information1` FOREIGN KEY (`patientinformation_idpatientinformation`) REFERENCES `patientinformation` (`idpatientinformation`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
