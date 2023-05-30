-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 02:20 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viesnica_dp41`
--

-- --------------------------------------------------------

--
-- Table structure for table `darbinieks`
--

CREATE TABLE `darbinieks` (
  `darbinieka_ID` int NOT NULL,
  `vards` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `uzvards` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `personas_kods` varchar(12) DEFAULT NULL,
  `lietotajvards` varchar(50) DEFAULT NULL,
  `parole` varchar(50) DEFAULT NULL,
  `loma` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `darbinieks`
--

INSERT INTO `darbinieks` (`darbinieka_ID`, `vards`, `uzvards`, `personas_kods`, `lietotajvards`, `parole`, `loma`) VALUES
(1, 'Liva', 'Jaroslava', '130609-29830', 'user1', 'user1', 2),
(2, 'Jelena', 'Bronislava', '230992-29387', 'user2', 'user2', 2),
(3, 'Lina', 'Paula', '300189-29283', 'user3', 'user3', 2),
(4, 'Olga', 'Uliana', '200388-39872', 'user4', 'user4', 2),
(5, 'Ricards', 'Saule', '170800-77834', 'user5', 'user5', 2),
(6, 'Viktors', 'Dmitrečkovs', '230303-12221', 'admin1', 'admin1', 1),
(7, 'Andris', 'Zaharovs', '111198-98989', 'userA', 'userA', 2),
(20, 'Ieva', 'Bulmane', '111198-12221', 'ieva13', 'ieva13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dzivokla_izmers`
--

CREATE TABLE `dzivokla_izmers` (
  `izmera_ID` int NOT NULL,
  `izmers` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dzivokla_izmers`
--

INSERT INTO `dzivokla_izmers` (`izmera_ID`, `izmers`) VALUES
(1, 'vienvietīgs numurs'),
(2, 'divvietīgs numurs'),
(3, 'trīsvietīgs numurs'),
(4, 'ģimenes numurs');

-- --------------------------------------------------------

--
-- Table structure for table `dzivokla_tips`
--

CREATE TABLE `dzivokla_tips` (
  `tipa_ID` int NOT NULL,
  `tipa_nosaukums` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dzivokla_tips`
--

INSERT INTO `dzivokla_tips` (`tipa_ID`, `tipa_nosaukums`) VALUES
(1, 'standarta'),
(2, 'skats uz okeanu/juru'),
(3, 'skats uz pilsetu'),
(4, 'skats uz baseinu'),
(5, 'skats uz kalniem');

-- --------------------------------------------------------

--
-- Table structure for table `dzivoklis`
--

CREATE TABLE `dzivoklis` (
  `dzivokla_ID` int NOT NULL,
  `viesnicas_ID` int DEFAULT NULL,
  `tipa_ID` int DEFAULT NULL,
  `izmera_ID` int DEFAULT NULL,
  `dzivokla_numurs` int DEFAULT NULL,
  `stavs` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dzivoklis`
--

INSERT INTO `dzivoklis` (`dzivokla_ID`, `viesnicas_ID`, `tipa_ID`, `izmera_ID`, `dzivokla_numurs`, `stavs`) VALUES
(1, 1, 1, 2, 1, 1),
(2, 1, 2, 2, 2, 1),
(3, 1, 2, 1, 3, 1),
(4, 1, 3, 1, 4, 1),
(5, 1, 5, 4, 5, 1),
(6, 1, 4, 3, 12, 2),
(7, 1, 1, 1, 13, 2),
(8, 1, 4, 4, 14, 2),
(9, 1, 3, 3, 15, 2),
(10, 1, 5, 2, 16, 2),
(11, 1, 2, 4, 22, 3),
(12, 1, 5, 3, 23, 3),
(13, 1, 2, 3, 24, 3),
(14, 1, 1, 2, 25, 3),
(15, 1, 3, 4, 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lomas`
--

CREATE TABLE `lomas` (
  `lomas_ID` int NOT NULL,
  `lomas_nosaukums` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lomas`
--

INSERT INTO `lomas` (`lomas_ID`, `lomas_nosaukums`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `saraksts`
--

CREATE TABLE `saraksts` (
  `saraksta_ID` int NOT NULL,
  `darbinieka_ID` int DEFAULT NULL,
  `dzivokla_ID` int DEFAULT NULL,
  `datums` date DEFAULT NULL,
  `ilgums` time DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `saraksts`
--

INSERT INTO `saraksts` (`saraksta_ID`, `darbinieka_ID`, `dzivokla_ID`, `datums`, `ilgums`) VALUES
(4, 5, 3, '2022-10-23', '00:01:00'),
(8, 7, 15, '2023-03-20', '01:30:00'),
(9, 2, 11, '2023-03-20', '00:00:00'),
(11, 7, 9, '2023-03-20', '00:00:00'),
(12, 3, 4, '2023-03-21', '00:00:00'),
(13, 1, 1, '2023-03-20', '00:00:00'),
(14, 7, 1, '2023-04-21', '00:05:00'),
(15, 1, 2, '2023-06-29', '00:00:00'),
(19, 3, 10, '2023-06-29', '00:00:00'),
(20, 7, 5, '2023-06-29', '00:00:00'),
(21, 2, 3, '2023-06-30', '00:00:00'),
(22, 7, 2, '2023-06-29', '00:00:00'),
(23, 1, 1, '2023-07-01', '00:00:00'),
(24, 4, 6, '2023-07-01', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `viesnica`
--

CREATE TABLE `viesnica` (
  `viesnicas_ID` int NOT NULL,
  `nosaukums` varchar(50) DEFAULT NULL,
  `valsts` varchar(20) DEFAULT NULL,
  `pilseta` varchar(20) DEFAULT NULL,
  `iela` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `viesnica`
--

INSERT INTO `viesnica` (`viesnicas_ID`, `nosaukums`, `valsts`, `pilseta`, `iela`) VALUES
(1, 'Blue Garden SC', 'United Kingdom', 'South Cave', '2 Radwale Cl'),
(2, 'Blue Garden Salc.', 'United Kingdom', 'Salcombe', '21 Round Berry Dr'),
(3, 'Blue Garden G', 'United Kingdom', 'Goole', 'Unit 4 Edinburgh St.'),
(4, 'Blue Garden Spr.', 'United Kingdom', 'Sprowston', '57 Parana Ct'),
(5, 'Blue Garden Stl.', 'United Kingdom', 'Stanley', '45 Mary St.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `darbinieks`
--
ALTER TABLE `darbinieks`
  ADD PRIMARY KEY (`darbinieka_ID`),
  ADD KEY `loma` (`loma`);

--
-- Indexes for table `dzivokla_izmers`
--
ALTER TABLE `dzivokla_izmers`
  ADD PRIMARY KEY (`izmera_ID`);

--
-- Indexes for table `dzivokla_tips`
--
ALTER TABLE `dzivokla_tips`
  ADD PRIMARY KEY (`tipa_ID`);

--
-- Indexes for table `dzivoklis`
--
ALTER TABLE `dzivoklis`
  ADD PRIMARY KEY (`dzivokla_ID`),
  ADD KEY `viesnicas_ID` (`viesnicas_ID`),
  ADD KEY `tipa_ID` (`tipa_ID`),
  ADD KEY `izmera_ID` (`izmera_ID`);

--
-- Indexes for table `lomas`
--
ALTER TABLE `lomas`
  ADD PRIMARY KEY (`lomas_ID`);

--
-- Indexes for table `saraksts`
--
ALTER TABLE `saraksts`
  ADD PRIMARY KEY (`saraksta_ID`),
  ADD KEY `darbinieka_ID` (`darbinieka_ID`),
  ADD KEY `dzivokla_ID` (`dzivokla_ID`);

--
-- Indexes for table `viesnica`
--
ALTER TABLE `viesnica`
  ADD PRIMARY KEY (`viesnicas_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darbinieks`
--
ALTER TABLE `darbinieks`
  MODIFY `darbinieka_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dzivokla_izmers`
--
ALTER TABLE `dzivokla_izmers`
  MODIFY `izmera_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dzivokla_tips`
--
ALTER TABLE `dzivokla_tips`
  MODIFY `tipa_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dzivoklis`
--
ALTER TABLE `dzivoklis`
  MODIFY `dzivokla_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lomas`
--
ALTER TABLE `lomas`
  MODIFY `lomas_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saraksts`
--
ALTER TABLE `saraksts`
  MODIFY `saraksta_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `viesnica`
--
ALTER TABLE `viesnica`
  MODIFY `viesnicas_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbinieks`
--
ALTER TABLE `darbinieks`
  ADD CONSTRAINT `FK_darbinieks_lomas` FOREIGN KEY (`loma`) REFERENCES `lomas` (`lomas_ID`);

--
-- Constraints for table `dzivoklis`
--
ALTER TABLE `dzivoklis`
  ADD CONSTRAINT `FK_dzivoklis_dzivokla_izmers` FOREIGN KEY (`izmera_ID`) REFERENCES `dzivokla_izmers` (`izmera_ID`),
  ADD CONSTRAINT `FK_dzivoklis_dzivokla_tips` FOREIGN KEY (`tipa_ID`) REFERENCES `dzivokla_tips` (`tipa_ID`),
  ADD CONSTRAINT `FK_dzivoklis_viesnica` FOREIGN KEY (`viesnicas_ID`) REFERENCES `viesnica` (`viesnicas_ID`);

--
-- Constraints for table `saraksts`
--
ALTER TABLE `saraksts`
  ADD CONSTRAINT `FK_saraksts_darbinieks` FOREIGN KEY (`darbinieka_ID`) REFERENCES `darbinieks` (`darbinieka_ID`),
  ADD CONSTRAINT `FK_saraksts_dzivoklis` FOREIGN KEY (`dzivokla_ID`) REFERENCES `dzivoklis` (`dzivokla_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
