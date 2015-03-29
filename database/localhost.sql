-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 26 Δεκ 2014 στις 23:04:21
-- Έκδοση Διακομιστή: 5.5.37
-- Έκδοση PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `user320_db2`
--
CREATE DATABASE `user320_db2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user320_db2`;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `AGGELIES`
--

CREATE TABLE IF NOT EXISTS `AGGELIES` (
  `AID` int(5) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ACCOMODATIONTYPE` varchar(50) NOT NULL,
  `AREA` varchar(50) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `TK` int(5) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TELEPHONE` varchar(50) NOT NULL,
  `WEBSITE` varchar(50) NOT NULL,
  `PRICE` double NOT NULL,
  `ENTRY_DATE` varchar(50) NOT NULL,
  `COMMENTS` varchar(150) NOT NULL,
  PRIMARY KEY (`AID`),
  KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Αρχικά δεδομένα του πίνακα `AGGELIES`
--

INSERT INTO `AGGELIES` (`AID`, `USERNAME`, `NAME`, `ACCOMODATIONTYPE`, `AREA`, `ADDRESS`, `TK`, `EMAIL`, `TELEPHONE`, `WEBSITE`, `PRICE`, `ENTRY_DATE`, `COMMENTS`) VALUES
(40, 'test', 'test', 'Σπίτι', 'test', 'test', 11111, 'mytest@gmail.com', '4434343434', '', 0, '', ''),
(42, 'test', 'test', 'Ενοικιαζόμενα Δωμάτια', 'test', 'test', 11111, '', '', '', 0, '', ''),
(66, 'test', 'test', 'Ξενοδοχείο', 'test', 'test', 11111, 'mytest@gmail.com', '2104567643', 'www.example.com', 100, '2014-12-25 06:12', 'test');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `CONTACT`
--

CREATE TABLE IF NOT EXISTS `CONTACT` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MESSAGE` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Αρχικά δεδομένα του πίνακα `CONTACT`
--

INSERT INTO `CONTACT` (`ID`, `NAME`, `EMAIL`, `MESSAGE`) VALUES
(1, 'testname', 'myemail@gmail.com', 'this is some text');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Αρχικά δεδομένα του πίνακα `USERS`
--

INSERT INTO `USERS` (`USERNAME`, `PASSWORD`, `NAME`, `EMAIL`) VALUES
('roam', 'roam', 'Irini Pantopoulou', 'test@gmail.com');

--
-- Περιορισμοί για πίνακα `AGGELIES`
--
ALTER TABLE `AGGELIES`
  ADD CONSTRAINT `AGGELIES_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `USERS` (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
