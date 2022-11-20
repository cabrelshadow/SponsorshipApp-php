-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 04:26 PM
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

--
-- Dumping data for table `filleuls`
--

INSERT INTO `filleuls` (`IDFILLEULS`, `IDPARRAIN`, `FULLNAME`, `PHONE`, `EMAIL`, `FACULTY`, `PICTURE`, `ISSPONSORED`) VALUES
(7, NULL, 'Mbogne Junior Pierre', '+237681509574', 'mbognejunior04@gmail.com', 'TIC-1', '1668167175.jpg', NULL),
(8, NULL, 'TAFOWO NENKAM FRANC KEVIN', '+237681153536', 'franctafowo@gmail.com', 'TIC-1', '1668167297.jpg', NULL),
(9, NULL, 'TAMOUYA Arno Dupril', '', 'arnosimo20@gmail.com', 'TIC-1', '1668167451.jpg', NULL),
(10, NULL, 'Tchoumy Tchana Arthur', '671766855', 'tchoumytchanaarthur@gmail.com', 'TIC-1', '1668167834.jpg', NULL),
(11, NULL, 'kengne urielle archange', '678003821', 'kuriellearchange@gmail.com', 'TIC-1', '1668167938.jpg', NULL),
(12, NULL, 'malik nsangou', '659175217', 'nsamalik@gmail.com', 'TIC-1', '1668168172.jpg', NULL),
(13, NULL, 'bogning deho alpha legrand', '697036898', 'dehoalpha6@gmail.com', 'TIC-1', '1668168243.jpg', NULL),
(14, NULL, 'ANGAYE MANGA DAVID', '656419496', 'bobolinhoaugoye@gmail.com', 'TIC-1', '1668170374.jpg', NULL),
(15, NULL, 'BISSAI JULIA OLIVIA', '655538357', 'carressemousavou@gmail.com', 'TIC-1', '1668170489.jpg', NULL),
(16, NULL, 'BOGNE TREZOR', '675290820', 'bognetrezor@gmail.com', 'TIC-1', '1668170673.jpg', NULL),
(17, NULL, 'BOGNING DEHO ALPHA', '697036898', 'dehoualpha6@gmail.com', 'TIC-1', '1668170738.jpg', NULL),
(18, NULL, 'BONSOU DIMITRI', '674606328', 'dimitribonsou@gmail.com', 'TIC-1', '1668170881.jpg', NULL),
(19, NULL, 'CHETCHOUANG BRYAN ARCHANG', '674606328', 'dimitribonsou@gmail.com', 'TIC-1', '1668171008.jpg', NULL),
(20, NULL, 'DAFANG TALLE ERICA', '698581098', 'talleerica@gmail.com', 'TIC-1', '1668171085.jpg', NULL),
(21, NULL, 'DETOUO NKENFOU THIERRY', '696438609', 'thierryjoel36@gmail.com', 'TIC-1', '1668171232.jpg', NULL),
(22, NULL, 'DIFFO DEDZO ERICA', '658420286', 'diffoerica@gmail.com', 'TIC-1', '1668171287.jpg', NULL),
(23, NULL, 'DJOUAKA COLVIC', '693924464', 'colvicd@gmail.com', 'TIC-1', '1668171343.jpg', NULL),
(24, NULL, 'DONGMO ALEX DUVAL', '679928861', 'dongmoalexduval@gmail.com', 'TIC-1', '1668171443.jpg', NULL),
(26, NULL, 'ESSAKA ISAAC KARL', '681498567', 'sucensonkarl01@gmail.com', 'TIC-1', '1668171665.jpg', NULL),
(27, NULL, 'DORIAN STEVE NGUESSONG', '693995597', 'dorianrick2@gmail.com', 'TIC-1', '1668172222.jpg', NULL),
(28, NULL, 'EYALLA DYLANE', '653368448', 'dylaneeyalla@gmail.com', 'TIC-1', '1668172432.jpg', NULL),
(29, NULL, 'JOUMENE MELI', '650343370', 'meliyonn399@gmail.com', 'TIC-1', '1668172486.jpg', NULL),
(30, NULL, 'KEMDJEU DONGMO PASSY IMELDA', '693098056', 'imeldapassykd@gmail.com', 'TIC-1', '1668172587.jpg', NULL),
(31, NULL, 'KENNE WHONORE', '658541207', 'kennewhonore0@icloud.com', 'TIC-1', '1668173098.png', NULL),
(32, NULL, 'KETCHAMENI DEMARLYE', '694706839', 'mougandemarlge@icloud.com', 'TIC-1', '1668173207.jpg', NULL),
(33, NULL, 'KOUAMEN CHRISTINE ANITA', '656718088', 'anitakamga694@gmail.com', 'TIC-1', '1668173273.jpg', NULL),
(34, NULL, 'LEUWAT NGAMI MARC', '658215632', 'marcodybala490@gmail.com', 'TIC-1', '1668173328.jpg', NULL);

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
-- Dumping data for table `parrain`
--

INSERT INTO `parrain` (`IDPARRAIN`, `FULLNAME`, `PHONE`, `EMAIL`, `FACULTY`, `PICTURE`, `NOMBREFILLEULS`) VALUES
(8, 'Sianou ndakam steve cabrel', '693738627', 'sianou93@gmail.com', 'TIC-2', '1668173582.jpg', NULL),
(9, 'pokem feze maxime', '691882254', 'maximefeze1@gmail.com', 'TIC-2', '1668173740.jpg', NULL),
(10, 'njaha nathan tazzi', '678798127', 'njahanathan2@gmail.com', 'TIC-2', '1668174127.jpg', NULL),
(11, 'nono jordan', '697145473', 'jordannono199@gmail.com', 'TIC-2', '1668174282.jpg', NULL),
(12, 'njopmo yvan', '698053896', 'yvannjopmo85@gmail.com', 'TIC-2', '1668174414.jpg', NULL),
(13, 'Nzomo Rabier', '692248460', 'fokourabier@gmail.com', 'TIC-2', '1668174692.jpg', NULL),
(14, 'TATSINKOU KWETCHE CRISPIN', '690284723', 'tatsinkoucrispin46@gmail.com', 'TIC-2', '1668175551.jpg', NULL),
(15, 'nguenou wilfried', '678378976', 'Wilfrieddzomeu90@gmail.com', 'TIC-2', '1668175882.jpg', NULL),
(16, 'ATSANGOU NGUEFACK ASTRID DAREL', 'thenaad12@gmail.com', 'thenaad12@gmail.com', 'TIC-2', '1668176891.jpg', NULL),
(17, 'AZEUKENG KENFACK GINES BRONDON', '656544779', 'stonetemfack@gmail.com', 'TIC-2', '1668176993.png', NULL),
(18, 'CHIEMO WANDJI PATRICE LUMUMBA', '697356142', 'Wapalu2004@gmail.com', 'TIC-2', '1668177095.jpg', NULL),
(19, 'FOSSA SOKENG MAXIME JUNIOR', '693837329', 'sokengfossa@gmail.com', 'TIC-2', '1668177200.jpg', NULL),
(20, 'FOTSO TOKAM CHRIS MANUEL', '693026377', 'manuelfotso93@gmail.com', 'TIC-2', '1668177281.jpg', NULL),
(21, 'JIDJOU KEMNE MARIE AUDREY', '655686508', 'audrey.djampou@gmail.com', 'TIC-2', '1668177351.jpg', NULL),
(22, 'KENCHOUN SADIO DANY MORELE', '698108159', 'kenchoungmorele@gmail.com', 'TIC-2', '1668177409.jpg', NULL),
(23, 'KENGNI NOUMBISSI JOHAN JORDAN', '694044194', 'kengnijordan9@gmail.com', 'TIC-2', '1668177472.jpg', NULL),
(24, 'MAKOLO EKOKA ANNAELLE JOSEE MEGANE', '677187128', 'annaellejoseemegane@gmail.com', 'TIC-2', '1668177577.png', NULL),
(25, 'MALONJU TCHINDA BIBICHE LAURE', '655205137', 'malonjulaure@gmail.com', 'TIC-2', '1668177665.jpg', NULL),
(26, 'MBAH MAKAM CYNTHIA JENNY', '692938482', 'jennycynthiambah@gmail.com', 'TIC-2', '1668177828.jpg', NULL),
(27, 'SAMY BODIO ONGLA', '690239771', 'samybodio2@gmail.com', 'TIC-2', '1668179718.jpg', NULL),
(28, 'TCHINDA FOFIE YVANA CABRELLE', '659012095', 'tchindayvana83@gmail.com', 'TIC-2', '1668179857.jpg', NULL),
(29, 'TIAM DANIEL JOSEPH', '655964653', 'josephtiam8@gmail.com', 'TIC-2', '1668180071.jpg', NULL);

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
  MODIFY `IDFILLEULS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `parrain`
--
ALTER TABLE `parrain`
  MODIFY `IDPARRAIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
