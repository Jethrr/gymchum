-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbomictinf3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

CREATE TABLE `tblappointments` (
  `appointmentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `coach` varchar(50) NOT NULL,
  `dates` date NOT NULL,
  `timee` varchar(100) NOT NULL,
  `services` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`appointmentId`, `userId`, `coach`, `dates`, `timee`, `services`) VALUES
(13, 12, 'renz', '2024-04-12', ' 10:30AM - 11:30AM', ' Coaching'),
(14, 12, 'Jeh', '2024-04-09', ' 9:00AM - 10:00AM', ' Conditioning'),
(15, 12, 'Erik', '2024-04-10', ' 10:30AM - 11:30AM', ' Coaching'),
(16, 15, 'Jeh', '2024-04-12', ' 10:30AM - 11:30AM', ' Coaching');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` int(11) NOT NULL,
  `emailadd` varchar(29) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`) VALUES
(1, 'juandelacruz@gmail.com', 'juandelacruz', '123456'),
(3, 'antons@gmail.com', 'anton123', 'anton123'),
(4, 'samplecoach1@gmail.com', 'samplecoach1', '111'),
(5, 'many1@gmail.com', 'manny1', '122'),
(6, 'Erik@gmail.com', 'erik1', 'erik1'),
(7, 'coachkc@gmail.com', 'coachkc', '222'),
(8, 'rie20@gmail.com', 'rie123', '$$2y$10$0srQRigkC5UN'),
(9, 'antonio1@gmail.com', 'anton1', '$$2y$10$k0lPYs9Em/yzvHgwdWDP0uROPuSgxK8VEQ4VAgVu2/1Gtn0A634TO'),
(10, 'sampleuser3@gmail.com', 'sampleuser3', '$$2y$10$fqtVadhmpVZSBnCakeKNe.HI1tg.YB/Fow6vrPNXeIvAbvqwIbWJy'),
(11, 'lebron1@gmail.com', 'lebron1', '$$2y$10$TYcNc0opc6DfOXuS0Ib10eFe4gWLBEIxtY9mCl0c9OBElXZiQJxz6'),
(12, 'kyrie@gmail.com', 'kyrie123', '$2y$10$Nln7nmE6Zwat2eeA/pCXqucPyr2Rm3l8vfpVwCX/VohFLmC/kC9lW'),
(13, 'curry30@gmail.com', 'curry30', '$2y$10$AthxnQKbBpEsh5ZJE5FiH.MX.CVPLoPQDofDc4buPxXjWUZlCJ0ji'),
(14, 'renz31@gmail.com', 'renz31', '$2y$10$izVKh3hxIzK6kP4jwlgH6O/9Qe1V0VKUhKIrra/xv49.NcXIkL1CG'),
(15, 'kdot12@gmail.com', 'kdot4', '$2y$10$XeJciOrL9FriI/WaQREK8unUCIupfQTcljGPMVMkb0kr45lOtk2DS');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userId` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userId`, `firstname`, `lastname`, `gender`, `usertype`) VALUES
(3, 'Antonio', 'Ubanldo', 'Male', 'User'),
(4, 'Jake', 'Bajo', 'Male', 'Trainer'),
(5, 'Jeh', 'Gwapo', 'Male', 'Trainer'),
(6, 'Erik', 'Pols', 'Male', 'Trainer'),
(7, 'coach', 'kc', 'Male', 'Trainer'),
(8, 'Rei', 'Aranco', 'Female', 'User'),
(9, 'Anton', 'Ubaldo', 'Male', 'User'),
(10, 'sample', 'user', 'Male', 'User'),
(11, 'lebron', 'james', 'Male', 'User'),
(12, 'kyrie', 'irvin', 'Male', 'User'),
(13, 'chef', 'curry', 'Female', 'User'),
(14, 'renz', 'abando', 'Female', 'Trainer'),
(15, 'Kendrick ', 'Lamar', 'Male', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappointments`
--
ALTER TABLE `tblappointments`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappointments`
--
ALTER TABLE `tblappointments`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
