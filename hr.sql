-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 02:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `controltype`
--

CREATE TABLE `controltype` (
  `codeEmp` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `typePrmission` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `userId` int(11) DEFAULT NULL,
  `codeEmp` int(11) DEFAULT NULL,
  `personalEmail` varchar(255) DEFAULT NULL,
  `organizationalEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`userId`, `codeEmp`, `personalEmail`, `organizationalEmail`) VALUES
(3, 20162084, 'ibrahim@yahoo.com', 'ibrahim@hr.edu'),
(5, 20162055, 'remon@yahoo.com', 'remon@hr.org');

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `userId` int(11) DEFAULT NULL,
  `codeEmp` int(11) NOT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `fingerPrint` varchar(255) DEFAULT NULL,
  `facePrint` mediumblob NOT NULL,
  `rfCardNo` varchar(255) DEFAULT NULL,
  `hringDate` date DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `grossSalary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`userId`, `codeEmp`, `fName`, `lName`, `faculty`, `department`, `title`, `nationality`, `gender`, `fingerPrint`, `facePrint`, `rfCardNo`, `hringDate`, `birthdate`, `mobile`, `address`, `grossSalary`) VALUES
(5, 20162055, 'remon', 'emad', 'computer science ', 'it', 'Student in Thebes Academy ', 'egyptian', 'male', '987456123qwezasdwxxwqww<><><>', '', 'C06988024SDZ01', '2005-07-19', '1889-01-25', 1033168491, '5 street ain sahms ', 8000),
(3, 20162084, 'ibrahim', 'Nasr', 'computer science ', 'it', 'Student in Thebes Academy ', 'egyptian', 'male', '987456123qwezasdwxxwqww<><><>', '', 'C06988024SDZ01', '2005-07-19', '1889-01-25', 1033191978, '5 street Madii ', 19000);

-- --------------------------------------------------------

--
-- Table structure for table `employeepermission`
--

CREATE TABLE `employeepermission` (
  `codeEmp` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `totalCountsOfPermissions` int(11) DEFAULT NULL,
  `permissionStatus` varchar(255) DEFAULT NULL,
  `FROMPRE` time DEFAULT NULL,
  `TOPRE` time DEFAULT NULL,
  `currentCountOfPermissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeepermission`
--

INSERT INTO `employeepermission` (`codeEmp`, `userId`, `reason`, `totalCountsOfPermissions`, `permissionStatus`, `FROMPRE`, `TOPRE`, `currentCountOfPermissions`) VALUES
(20162084, 3, 'suddon', 2, 'pendding', '00:00:00', '01:00:00', 1),
(20162084, 3, 'suddon', 2, 'pendding', '09:00:00', '11:00:00', 2),
(20162055, 5, 'suddon', 2, 'pendding', '00:00:00', '01:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employeesalary`
--

CREATE TABLE `employeesalary` (
  `userID` int(11) DEFAULT NULL,
  `codeEmp` int(11) DEFAULT NULL,
  `noOfPermissions` int(11) DEFAULT NULL,
  `totalDaysOfVacations` int(11) DEFAULT NULL,
  `noOfVacation` int(11) DEFAULT NULL,
  `noOfArrivingLateInMinsPerDay` int(11) DEFAULT NULL,
  `slicingOfLateArrival` int(11) DEFAULT NULL,
  `totalTaxes` float DEFAULT NULL,
  `netSalary` float DEFAULT NULL,
  `paymentMethod` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeevacation`
--

CREATE TABLE `employeevacation` (
  `codeEmp` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `noOfDays` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `totalDaysOfVacations` int(11) DEFAULT NULL,
  `vacationStatus` varchar(255) DEFAULT NULL,
  `makeacomment` varchar(255) DEFAULT NULL,
  `typeVacation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeevacation`
--

INSERT INTO `employeevacation` (`codeEmp`, `userId`, `noOfDays`, `startDate`, `endDate`, `totalDaysOfVacations`, `vacationStatus`, `makeacomment`, `typeVacation`) VALUES
(20162084, 3, 1, '2019-05-17', '2019-05-23', 24, 'pendding', 'Ana 3awez aroo7 Alex ', 'usual'),
(20162055, 5, 2, '2019-05-15', '2019-05-17', 24, 'pendding', '3awez arooo7 Alex ', 'usual');

-- --------------------------------------------------------

--
-- Table structure for table `staticsalary`
--

CREATE TABLE `staticsalary` (
  `idSalary` int(11) NOT NULL,
  `hoursInDay` int(11) DEFAULT NULL,
  `hoursInMonth` int(11) DEFAULT NULL,
  `incomeTax` float DEFAULT NULL,
  `socialSecurity` float DEFAULT NULL,
  `bounsInHours` float DEFAULT NULL,
  `priceOfMission` float DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `priceOfHoure` float DEFAULT NULL,
  `regularLeave` int(11) DEFAULT NULL,
  `vacation` int(11) DEFAULT NULL,
  `noOfPremission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticsalary`
--

INSERT INTO `staticsalary` (`idSalary`, `hoursInDay`, `hoursInMonth`, `incomeTax`, `socialSecurity`, `bounsInHours`, `priceOfMission`, `startDate`, `endDate`, `priceOfHoure`, `regularLeave`, `vacation`, `noOfPremission`) VALUES
(2, 7, 210, 577, 560, 12, 550, '0000-00-00', '0000-00-00', 50, 21, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `codeEmp` int(11) DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `departureTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`codeEmp`, `arrivalTime`, `departureTime`) VALUES
(20162084, '00:00:00', '00:00:00'),
(20162084, '07:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userName`, `password`) VALUES
(1, 'Admin', 'admin', '12345'),
(3, 'Employee', 'ibrahim', '12345'),
(4, 'Owner', 'owner', '12345'),
(5, 'Employee', 'remon', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controltype`
--
ALTER TABLE `controltype`
  ADD KEY `contrlTypeUserID_fk` (`userId`),
  ADD KEY `contrlTypeCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD KEY `emailUserID_fk` (`userId`),
  ADD KEY `emailCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`codeEmp`),
  ADD KEY `userId_fk` (`userId`);

--
-- Indexes for table `employeepermission`
--
ALTER TABLE `employeepermission`
  ADD UNIQUE KEY `currentCountOfPermissions` (`currentCountOfPermissions`),
  ADD KEY `employeePermissionUserID_fk` (`userId`),
  ADD KEY `employeePermissionCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `employeesalary`
--
ALTER TABLE `employeesalary`
  ADD KEY `employeeSalaryUserID_fk` (`userID`),
  ADD KEY `employeeSalaryCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `employeevacation`
--
ALTER TABLE `employeevacation`
  ADD PRIMARY KEY (`noOfDays`),
  ADD KEY `employeeVacationUserID_fk` (`userId`),
  ADD KEY `employeeVacationCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `staticsalary`
--
ALTER TABLE `staticsalary`
  ADD PRIMARY KEY (`idSalary`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD KEY `timeCodeEmp_fk` (`codeEmp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeepermission`
--
ALTER TABLE `employeepermission`
  MODIFY `currentCountOfPermissions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employeevacation`
--
ALTER TABLE `employeevacation`
  MODIFY `noOfDays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staticsalary`
--
ALTER TABLE `staticsalary`
  MODIFY `idSalary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `controltype`
--
ALTER TABLE `controltype`
  ADD CONSTRAINT `contrlTypeCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrlTypeUserID_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `emailCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emailUserID_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD CONSTRAINT `userId_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeepermission`
--
ALTER TABLE `employeepermission`
  ADD CONSTRAINT `employeePermissionCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`),
  ADD CONSTRAINT `employeePermissionUserID_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `employeesalary`
--
ALTER TABLE `employeesalary`
  ADD CONSTRAINT `employeeSalaryCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employeeSalaryUserID_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeevacation`
--
ALTER TABLE `employeevacation`
  ADD CONSTRAINT `employeeVacationCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`),
  ADD CONSTRAINT `employeeVacationUserID_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `timeCodeEmp_fk` FOREIGN KEY (`codeEmp`) REFERENCES `employeeinfo` (`codeEmp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
