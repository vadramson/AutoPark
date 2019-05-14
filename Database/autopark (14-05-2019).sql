-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2019 at 03:27 PM
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
(1, 'Aturas G4', 2019, '2019-05-14 13:38:16', '2019-05-14 13:38:16', 'Aturas', 1),
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
  `availability` tinyint(1) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `dateIn` datetime DEFAULT NULL,
  `dateOut` datetime DEFAULT NULL,
  PRIMARY KEY (`idMaintennce`),
  KEY `FK_association5` (`idVehicle`),
  KEY `FK_association7` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `registeredBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRental`),
  KEY `FK_association3` (`idVehicle`),
  KEY `FK_association4` (`idDriver`),
  KEY `FK_association8` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `availability` tinyint(1) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `FK_association7` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`idVehicle`) REFERENCES `vehicles` (`idVehicle`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `FK_association8` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`idVehicle`) REFERENCES `vehicles` (`idVehicle`),
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`idDriver`) REFERENCES `drivers` (`idDriver`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`idModel`) REFERENCES `carmodel` (`idModel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
