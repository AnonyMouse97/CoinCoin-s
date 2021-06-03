-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 11, 2021 at 12:30 PM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coincoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `betList`
--

CREATE TABLE `betList` (
  `betListID` int(11) NOT NULL,
  `betListUserID` int(11) NOT NULL,
  `betListBetID` int(11) NOT NULL,
  `betListBetChoice` varchar(255) NOT NULL,
  `betListCoins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `betList`
--

INSERT INTO `betList` (`betListID`, `betListUserID`, `betListBetID`, `betListBetChoice`, `betListCoins`) VALUES
(1, 1, 1, 'Charlotte', 400),
(2, 2, 1, 'Richard', 100),
(5, 2, 1, 'Charlotte', 200),
(6, 2, 1, 'Charlotte', 400),
(7, 2, 1, 'Samuel', 200),
(8, 2, 1, 'Samuel', 100),
(19, 2, 1, 'Richard', 150),
(20, 2, 1, 'Richard', 150),
(28, 1, 2, 'Nico', 500),
(30, 1, 2, 'Nico', 100),
(31, 1, 2, 'Nico', 100),
(32, 1, 2, 'Charlène', 100);

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `nameID` int(11) NOT NULL,
  `betName` varchar(255) NOT NULL,
  `betChoices` varchar(255) NOT NULL,
  `betFinalDate` datetime NOT NULL,
  `betFinalResult` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`nameID`, `betName`, `betChoices`, `betFinalDate`, `betFinalResult`) VALUES
(1, 'Qui va gagner le prochain Kahoot ?', 'Charlotte, Richard, Samuel, Nico', '2021-04-10 18:25:00', NULL),
(2, 'Qui greg va-t-il tuer en premier ?', 'Nico, Charlène, Steeve, Pierre', '2022-04-01 00:00:00', NULL),
(4, 'test', 'bjr, lo, nope, re', '2021-04-08 23:17:37', 'bjr'),
(5, 'test', 'test', '2021-04-08 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userCoins` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPass`, `userCoins`, `admin`) VALUES
(1, 'samuell', '$2y$10$MY4LPfvzzhNlRIrsr6tp6OgpBVP4BH/0jQBdHiVlo2oBsQWnXA9oW', 10000, 1),
(5, 'adrianoc', '$2y$10$LTQMSeAlc9apY03es4yg4ODHMMl6N2OqIdzm1Zu7M13BSAPJnSzhy', 1000, 0),
(6, 'laetitiag', '$2y$10$MT.OgzZJBVyZLv1OBd9Z6ewNi0ajxzElt1Qsrn9sabGMWFQ0GGuJS', 1000, 0),
(7, 'maximeb', '$2y$10$JZCq6fVtg0RDm0uePDNBduyTnE7llzYGnAmo31je1SzBtvnoSERhG', 1000, 0),
(8, 'charlottem', '$2y$10$BNyhAoiIRxt2CEDlfpYBFejeDun5BDjluVeUV794KsRSQK.hhcylG', 1000, 0),
(9, 'francoisc', '$2y$10$N.fhzHi0oqEGQXm8hEGvkuKzmhI9fy.7Oq3qthL8y1wMY7JUIjoA2', 1000, 0),
(10, 'julienl', '$2y$10$DyBFJqSUx2HBP9s8NkMyY.I7hf5VSifgbyl9Qb/EDjFnNQbIvGbya', 1000, 0),
(11, 'thomasc', '$2y$10$3tfztAnrvxvG74Ku/syUJuhPESbDP9gudQi7haA61702DY8VKO0k6', 1000, 0),
(12, 'tomis', '$2y$10$eDpHFdYOPNfbK1dGqxhzOuXFf1juWQPbp.NDLR.Tr7LOcaWJPt5tG', 1000, 0),
(13, 'ascelineh', '$2y$10$ct59prdQHjWNZdJh5yjnGOqKJwCYtHP.D2Pqa7FzTJvYlPQ93p.b2', 1000, 0),
(14, 'alejandrom', '$2y$10$MtHd23OcGB3dHC33232Q/.cBsRDgAa5IMhR849dJs105sZAlkCoQq', 1000, 0),
(15, 'francoisr', '$2y$10$DUWdcJQUEQEHiX2bBvBWVeOzWhPJVjiYvDzDE0qsPddxNxcWvEWMy', 1000, 0),
(16, 'josuéu', '$2y$10$T3XPbvEV9mo2AB0eOXGlEe3jwKGNHvdpIT22ctsrwkCB.blPEgSZO', 1000, 0),
(17, 'lucianab', '$2y$10$44/SskHd5iPPp.ZCa3kAyupAhUwF3D/d2MRLlheClZT54QgAl85de', 1000, 0),
(18, 'nataschag', '$2y$10$/k6qLflBnmGPPdzhnvoBrOU/pqG8Hz6ohfTGbMVtYnjF9lA55fyfW', 1000, 0),
(19, 'nicolaj', '$2y$10$9oj7QLpHoxdSe4aaOHglEejVCJsRBKH01cwowOAy4kMsblCmupTxK', 1000, 0),
(20, 'pierrer', '$2y$10$VCLMoRZxVc2Tuu3fPzoftOp2f0YX2a/0kf7Grk3UOIatbVDfLEy8i', 1000, 0),
(21, 'richardd', '$2y$10$6GrWuvluQVIzo7daY3Ogj.jV5AOY9xFltTVCZaGFluRULRD3dWlU6', 1000, 0),
(22, 'samanthar', '$2y$10$CygCatCJ5EGgCrwppmkrUuHNKel9F/bXhJfxGw1UrD6GrIrUPMANu', 1000, 0),
(23, 'tariqs', '$2y$10$fm0u5jHbZBXB9328Ak5cuOAp5iqkWqmn/0tFWT9DzmiMgvwSo.9HS', 1000, 0),
(24, 'williamv', '$2y$10$nHABXVNwiz2rh1GRezkMP.igd0HrIE2GF8Vtyg3PiqLYn8ATaCsmC', 1000, 0),
(25, 'zenaa', '$2y$10$62G/BBpL2nP8aC4fl8vR8ePv.pBCf1QnSme46puznC7HT/KkKckRe', 1000, 0),
(26, 'hsiah', '$2y$10$6U9Ne6QSfehnhReEAyHcZ.OVM55TPIfh4fUWBuTZExO5p.2Mwp.eK', 1000, 0),
(27, 'rekhal', '$2y$10$peG/iZgph8ub0hxcupAbCOMvbpmXOdnPHRP/jUpwMK0EahQNsd6l2', 1000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `betList`
--
ALTER TABLE `betList`
  ADD PRIMARY KEY (`betListID`),
  ADD KEY `betListUserID` (`betListUserID`),
  ADD KEY `betListBetID` (`betListBetID`);

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`nameID`),
  ADD KEY `nameID` (`nameID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `betList`
--
ALTER TABLE `betList`
  MODIFY `betListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `nameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
