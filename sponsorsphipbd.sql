-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 10:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sponsorsphipbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `filleuls`
--

CREATE TABLE `filleuls` (
  `IDFILLEULS` int(11) NOT NULL,
  `IDPARRAIN` int(11) DEFAULT NULL,
  `FULLNAME` varchar(90) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `FACULTY` varchar(200) NOT NULL,
  `PICTURE` varchar(200) DEFAULT NULL,
  `ISSPONSORED` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parrain`
--

CREATE TABLE `parrain` (
  `IDPARRAIN` int(11) NOT NULL,
  `FULLNAME` varchar(90) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `FACULTY` varchar(200) NOT NULL,
  `PICTURE` varchar(200) DEFAULT NULL,
  `NOMBREFILLEULS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filleuls`
--
ALTER TABLE `filleuls`
  ADD PRIMARY KEY (`IDFILLEULS`),
  ADD KEY `FK_FILLEULS_PARRAINER_PARRAIN` (`IDPARRAIN`);

--
-- Indexes for table `parrain`
--
ALTER TABLE `parrain`
  ADD PRIMARY KEY (`IDPARRAIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filleuls`
--
ALTER TABLE `filleuls`
  MODIFY `IDFILLEULS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parrain`
--
ALTER TABLE `parrain`
  MODIFY `IDPARRAIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filleuls`
--
ALTER TABLE `filleuls`
  ADD CONSTRAINT `FK_FILLEULS_PARRAINER_PARRAIN` FOREIGN KEY (`IDPARRAIN`) REFERENCES `parrain` (`IDPARRAIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
