-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2019 at 10:49 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autopark`
--
CREATE DATABASE IF NOT EXISTS `autopark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autopark`;

-- --------------------------------------------------------

--
-- Table structure for table `carmodel`
--

CREATE TABLE IF NOT EXISTS `carmodel` (
  `idModel` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(254) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mark` varchar(254) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idModel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `carmodel`
--

INSERT INTO `carmodel` (`idModel`, `model`, `year`, `created`, `updated`, `mark`, `status`) VALUES
(1, 'Aturas G4', 2019, '2019-05-16 23:55:12', '2019-05-16 23:55:12', 'Aturas', 0),
(2, 'Mercedes M350', 2010, '2019-05-14 13:38:47', '2019-05-14 13:38:47', 'Mercedes', 1),
(3, 'Toyota Camry', 2000, '2019-05-14 13:50:21', '2019-05-14 13:50:21', 'Toyota', 1),
(4, 'SUV Monster', 2013, '2019-05-14 13:48:04', '2019-05-14 13:48:04', 'Poche', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `idDriver` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `name` varchar(254) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `licenseType` varchar(254) DEFAULT NULL,
  `licenseID` varchar(254) DEFAULT NULL,
  `picture` varchar(254) DEFAULT NULL,
  `idNumber` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `phone` varchar(254) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idDriver`),
  KEY `FK_association1` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`idDriver`, `idUser`, `name`, `availability`, `licenseType`, `licenseID`, `picture`, `idNumber`, `email`, `phone`, `created`, `updated`, `status`) VALUES
(1, 1, 'Alphoso Paco', 0, 'B', '223011587823', 'user.png', '1265897245', 'vadramson@gmail.com', '678583312', '2019-05-17 13:33:01', '2019-05-17 13:33:01', 1),
(2, 1, 'Francisco Bertram', 1, 'C', '9872120354', 'img.jpg', '1202547855', 'vadramson@gmail.com', '2372452188552', '2019-05-17 14:42:46', '2019-05-17 14:42:46', 1),
(3, 1, 'Preta Fernandez', 0, 'B', '21547236002', 'picture.jpg', '162780345695', 'vadramson@gmail.com', '237685421032', '2019-05-17 14:43:32', '2019-05-17 14:43:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE IF NOT EXISTS `expenditure` (
  `idExpenditure` int(11) NOT NULL AUTO_INCREMENT,
  `idVehicle` int(11) NOT NULL,
  `nature` varchar(254) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `cost` decimal(18,2) DEFAULT NULL,
  `dateExpenditure` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idExpenditure`),
  KEY `FK_association6` (`idVehicle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`idExpenditure`, `idVehicle`, `nature`, `description`, `cost`, `dateExpenditure`) VALUES
(1, 1, 'Fueling', 'Buy fuel for the To-and-fro journey of Yaounde - Douala', '25000.00', '2019-05-16 12:55:20'),
(2, 1, 'Inflation of Tire', 'Inflation of Tire during the Edea Journey', '1000.00', '2019-05-16 12:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `mentainence`
--

CREATE TABLE IF NOT EXISTS `mentainence` (
  `idMaintennce` int(11) NOT NULL AUTO_INCREMENT,
  `idVehicle` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `fault` varchar(254) DEFAULT NULL,
  `garage` varchar(254) DEFAULT NULL,
  `cost` decimal(18,2) DEFAULT NULL,
  `state` varchar(254) DEFAULT NULL,
  `dateIn` date DEFAULT NULL,
  `dateOut` date DEFAULT NULL,
  PRIMARY KEY (`idMaintennce`),
  KEY `FK_association5` (`idVehicle`),
  KEY `FK_association7` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mentainence`
--

INSERT INTO `mentainence` (`idMaintennce`, `idVehicle`, `idUser`, `fault`, `garage`, `cost`, `state`, `dateIn`, `dateOut`) VALUES
(1, 1, 1, 'Side mirror defect', 'P & John Garage', '10000.00', 'Finished and out', '2019-05-09', '2019-05-12'),
(2, 1, 1, 'Side lamp defect', 'P & John Garage', '50000.00', 'In Proces', '2019-05-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `idPayments` int(11) NOT NULL AUTO_INCREMENT,
  `idRental` int(11) NOT NULL,
  `totalCost` decimal(18,2) NOT NULL,
  `dateOperation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPayments`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`idPayments`, `idRental`, `totalCost`, `dateOperation`) VALUES
(1, 0, '0.00', '2019-05-17 21:19:22'),
(2, 5, '150000.00', '2019-05-17 21:20:56'),
(3, 5, '150000.00', '2019-05-17 21:55:04'),
(4, 3, '300000.00', '2019-05-17 23:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE IF NOT EXISTS `rentals` (
  `idRental` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idVehicle` int(11) NOT NULL,
  `idDriver` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `unitHour` decimal(18,2) DEFAULT NULL,
  `totalCost` decimal(18,2) DEFAULT NULL,
  `rentalType` varchar(254) DEFAULT NULL,
  `matriculation` varchar(254) DEFAULT NULL,
  `status` varchar(254) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `registeredBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRental`),
  KEY `FK_association3` (`idVehicle`),
  KEY `FK_association4` (`idDriver`),
  KEY `FK_association8` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`idRental`, `idUser`, `idVehicle`, `idDriver`, `hours`, `unitHour`, `totalCost`, `rentalType`, `matriculation`, `status`, `created`, `updated`, `registeredBy`) VALUES
(3, 1, 1, 1, 20, '15000.00', '300000.00', '1', 'AutoPark_ ER632', '2', '2019-05-17 23:38:47', '2019-05-17 23:38:47', 1),
(5, 1, 5, NULL, 30, '5000.00', '150000.00', '1', 'AutoPark_ RL456', '2', '2019-05-17 23:37:36', '2019-05-17 23:37:36', 1),
(13, 1, 6, 3, 3, '7500.00', '22500.00', '1', 'AutoPark_ JC399', '1', '2019-05-17 14:43:32', '2019-05-17 14:43:32', 1),
(14, 1, 6, NULL, 5, '4500.00', '22500.00', '2', 'AutoPark_ YI975', '4', '2019-05-17 23:41:50', '2019-05-17 23:41:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `username` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `role` varchar(254) DEFAULT NULL,
  `matricule` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `phone` varchar(254) DEFAULT NULL,
  `picture` varchar(254) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `name`, `username`, `password`, `role`, `matricule`, `email`, `phone`, `picture`, `status`) VALUES
(1, 'NGYIBI VADRAMA NDISANG', 'vadramson', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'Urs101', 'vadramson@gmail.com', '+237678583312', 'vadson.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `idVehicle` int(11) NOT NULL AUTO_INCREMENT,
  `idModel` int(11) NOT NULL,
  `matriculation` varchar(254) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `colour` varchar(254) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `technology` varchar(254) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `simNumber` varchar(254) DEFAULT NULL,
  `feeWithDriver` decimal(18,2) DEFAULT NULL,
  `feeWithoutDriver` decimal(18,2) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idVehicle`),
  UNIQUE KEY `matriculation` (`matriculation`),
  UNIQUE KEY `simNumber` (`simNumber`),
  KEY `FK_association2` (`idModel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`idVehicle`, `idModel`, `matriculation`, `seats`, `colour`, `picture`, `technology`, `availability`, `simNumber`, `feeWithDriver`, `feeWithoutDriver`, `created`, `updated`, `status`) VALUES
(1, 1, 'CE 1201 AD', 5, '#140a0a', 'prod-2.jpg', 'Automatic', 1, 'simNumber', '15000.00', '13000.00', '2019-05-17 23:38:48', '2019-05-17 23:38:48', 1),
(5, 2, 'CE 0051 XP', 4, '#1ce33c', 'inbox.png', 'Manual', 0, '23722358120', '7000.00', '5000.00', '2019-05-17 13:55:21', '2019-05-17 13:55:21', 1),
(6, 4, 'NW 2102 CF', 5, '#b714d1', 'media.jpg', 'Automatic', 1, '237856201459', '7500.00', '4500.00', '2019-05-17 23:41:50', '2019-05-17 23:41:50', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD CONSTRAINT `FK_association6` FOREIGN KEY (`idVehicle`) REFERENCES `vehicles` (`idVehicle`);

--
-- Constraints for table `mentainence`
--
ALTER TABLE `mentainence`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`idVehicle`) REFERENCES `vehicles` (`idVehicle`),
  ADD CONSTRAINT `FK_association7` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`idVehicle`) REFERENCES `vehicles` (`idVehicle`),
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`idDriver`) REFERENCES `drivers` (`idDriver`),
  ADD CONSTRAINT `FK_association8` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`idModel`) REFERENCES `carmodel` (`idModel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
