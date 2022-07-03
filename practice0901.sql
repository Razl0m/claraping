-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 03, 2022 at 03:29 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice0901`
--

-- --------------------------------------------------------

--
-- Table structure for table `Agency`
--

CREATE TABLE `Agency` (
  `IDagency` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `paragraph` text NOT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Agency`
--

INSERT INTO `Agency` (`IDagency`, `title`, `subtitle`, `paragraph`, `imgPath`) VALUES
(1, 'Алексей шевцов', 'Тунис', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'img/design/prest'),
(2, 'Алексей шевцов', 'Тунис', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'img/design/prest2'),
(3, 'Алексей шевцов', 'Тунис', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\n										dolore eu fugiat nulla pariatur.', 'img/design/prest3'),
(4, 'Алексей шевцов', 'Тунис', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'img/design/prest3');

-- --------------------------------------------------------

--
-- Table structure for table `airplanesRaces`
--

CREATE TABLE `airplanesRaces` (
  `idRace` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `fromPlace` varchar(128) DEFAULT NULL,
  `toPlace` varchar(128) DEFAULT NULL,
  `departureTime` date DEFAULT NULL,
  `arrivalTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airplanesRaces`
--

INSERT INTO `airplanesRaces` (`idRace`, `name`, `price`, `fromPlace`, `toPlace`, `departureTime`, `arrivalTime`) VALUES
(1, 'авиакомпания Стрелки и Белки', '15000', 'Россия, Москва', 'Турция, Алания', '2022-06-19', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `boundsTourists`
--

CREATE TABLE `boundsTourists` (
  `idBoundTourist` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTourist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boundsTourists`
--

INSERT INTO `boundsTourists` (`idBoundTourist`, `idUser`, `idTourist`) VALUES
(5, 13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `excursions`
--

CREATE TABLE `excursions` (
  `idExcursion` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `Paragraph` text NOT NULL,
  `price` int(11) DEFAULT NULL,
  `nameAgency` varchar(128) DEFAULT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `excursions`
--

INSERT INTO `excursions` (`idExcursion`, `name`, `Paragraph`, `price`, `nameAgency`, `imgPath`) VALUES
(5, 'Greece plaza hotel', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\n										dolore eu fugiat nulla pariatur.', 15000, 'Хвост и Уши', 'img/design/andaman'),
(6, 'Greece plaza hotel', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 15000, 'Хвост и Уши', 'img/design/andaman'),
(7, 'Greece plaza hotel', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 15000, 'Хвост и Уши', 'img/design/andaman');

-- --------------------------------------------------------

--
-- Table structure for table `excursionSummary`
--

CREATE TABLE `excursionSummary` (
  `idExcursionSummary` int(11) NOT NULL,
  `idTourist` int(11) NOT NULL,
  `idExcursion` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `idHotel` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `imgPath` varchar(256) DEFAULT NULL,
  `description` text,
  `Country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`idHotel`, `name`, `price`, `imgPath`, `description`, `Country`) VALUES
(1, 'Greece plaza hotel', 10000, 'img/design/background', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'Турция'),
(2, 'Greece plaza hotel', 15000, 'img/design/background', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'Мальдивы'),
(3, 'Greece plaza hotel', 20000, 'img/design/background', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'Греция'),
(4, 'Greece plaza hotel', 17000, 'img/design/background', 'Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur\r\n										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\r\n										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea\r\n										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\r\n										dolore eu fugiat nulla pariatur.', 'Испания');

-- --------------------------------------------------------

--
-- Table structure for table `incomeCategory`
--

CREATE TABLE `incomeCategory` (
  `idIncomeCategory` int(11) NOT NULL,
  `name` varchar(199) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incomeCategory`
--

INSERT INTO `incomeCategory` (`idIncomeCategory`, `name`) VALUES
(1, 'Продажа тура'),
(2, 'Продажа рекламы'),
(3, 'Сотрудничество с отелем');

-- --------------------------------------------------------

--
-- Table structure for table `incomeSummary`
--

CREATE TABLE `incomeSummary` (
  `idIncomeSummary` int(11) NOT NULL,
  `idIncomeCategory` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idTour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incomeSummary`
--

INSERT INTO `incomeSummary` (`idIncomeSummary`, `idIncomeCategory`, `total`, `date`, `idTour`) VALUES
(1, 1, 15000, '2022-06-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idNews` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `paragraph` text,
  `imgPath` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idNews`, `title`, `idUser`, `paragraph`, `imgPath`) VALUES
(6, 'What is traffic arbitrage and does it really make money?', 13, 'Pharetra, ullamcorper iaculis viverra parturient sed id sed. Convallis proin dignissim lacus, purus gravida', 'img/design/news1'),
(7, 'What is traffic arbitrage and does it really make money?', 13, 'Pharetra, ullamcorper iaculis viverra parturient sed id sed. Convallis proin dignissim lacus, purus gravida', 'img/design/news1'),
(8, 'What is traffic arbitrage and does it really make money?', 13, 'Pharetra, ullamcorper iaculis viverra parturient sed id sed. Convallis proin dignissim lacus, purus gravida', 'img/design/news1');

-- --------------------------------------------------------

--
-- Table structure for table `Preferences`
--

CREATE TABLE `Preferences` (
  `idPreference` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `imgPath` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Preferences`
--

INSERT INTO `Preferences` (`idPreference`, `name`, `imgPath`) VALUES
(1, 'dish', 'img/icons/dish.svg'),
(2, 'wifi', 'img/icons/wifi.svg'),
(3, '2 persons', 'img/icons/users-black.svg'),
(4, '4 star', 'img/icons/4star.svg'),
(5, '5 star', 'img/icons/5star.svg');

-- --------------------------------------------------------

--
-- Table structure for table `PreferencesSummary`
--

CREATE TABLE `PreferencesSummary` (
  `idPreferenceSummary` int(11) NOT NULL,
  `idHotel` int(11) NOT NULL,
  `idPreference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PreferencesSummary`
--

INSERT INTO `PreferencesSummary` (`idPreferenceSummary`, `idHotel`, `idPreference`) VALUES
(1, 1, 5),
(2, 1, 3),
(3, 1, 2),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Subscription`
--

CREATE TABLE `Subscription` (
  `IDsubscription` int(11) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Subscription`
--

INSERT INTO `Subscription` (`IDsubscription`, `Email`) VALUES
(2, 'www@mail.ru'),
(3, '123@mail.ru');

-- --------------------------------------------------------

--
-- Table structure for table `tourists`
--

CREATE TABLE `tourists` (
  `idTourist` int(11) NOT NULL,
  `fio` varchar(256) DEFAULT NULL,
  `passport` varchar(128) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourists`
--

INSERT INTO `tourists` (`idTourist`, `fio`, `passport`, `gender`, `birthday`) VALUES
(7, 'Губенко Михаил Петрович', '1234 54003 Выдан ОВД Москвы по району Химки 25.04.2000', 'М', '1980-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `idTour` int(11) NOT NULL,
  `idHotel` int(11) NOT NULL,
  `idRace` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `amountNights` int(11) DEFAULT NULL,
  `idTourist` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`idTour`, `idHotel`, `idRace`, `start_date`, `amountNights`, `idTourist`, `Price`) VALUES
(1, 2, 1, '1970-01-01', 7, 7, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `login`, `password`, `email`, `role`) VALUES
(13, '2', '$2y$10$dbzqDutjH/BVC/Gndfy7ne3PX3t1rlBXBKl49.MC8k1gTXD685OPe', '123@mail.ru', 1),
(14, '3', '$2y$10$P7bKPOoOeabDl3Wv76BKvezgexXlEQlc95rEVrzB5NGjAwepQ9tuu', '3@mail.ru', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Agency`
--
ALTER TABLE `Agency`
  ADD PRIMARY KEY (`IDagency`);

--
-- Indexes for table `airplanesRaces`
--
ALTER TABLE `airplanesRaces`
  ADD PRIMARY KEY (`idRace`);

--
-- Indexes for table `boundsTourists`
--
ALTER TABLE `boundsTourists`
  ADD PRIMARY KEY (`idBoundTourist`),
  ADD KEY `R_10` (`idUser`),
  ADD KEY `R_12` (`idTourist`);

--
-- Indexes for table `excursions`
--
ALTER TABLE `excursions`
  ADD PRIMARY KEY (`idExcursion`);

--
-- Indexes for table `excursionSummary`
--
ALTER TABLE `excursionSummary`
  ADD PRIMARY KEY (`idExcursionSummary`),
  ADD KEY `R_1` (`idExcursion`),
  ADD KEY `R_2` (`idTourist`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indexes for table `incomeCategory`
--
ALTER TABLE `incomeCategory`
  ADD PRIMARY KEY (`idIncomeCategory`);

--
-- Indexes for table `incomeSummary`
--
ALTER TABLE `incomeSummary`
  ADD PRIMARY KEY (`idIncomeSummary`),
  ADD KEY `R_3` (`idIncomeCategory`),
  ADD KEY `R_8` (`idTour`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`),
  ADD KEY `R_9` (`idUser`);

--
-- Indexes for table `Preferences`
--
ALTER TABLE `Preferences`
  ADD PRIMARY KEY (`idPreference`);

--
-- Indexes for table `PreferencesSummary`
--
ALTER TABLE `PreferencesSummary`
  ADD PRIMARY KEY (`idPreferenceSummary`),
  ADD KEY `R_6` (`idHotel`),
  ADD KEY `R_7` (`idPreference`);

--
-- Indexes for table `Subscription`
--
ALTER TABLE `Subscription`
  ADD PRIMARY KEY (`IDsubscription`);

--
-- Indexes for table `tourists`
--
ALTER TABLE `tourists`
  ADD PRIMARY KEY (`idTourist`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`idTour`),
  ADD KEY `R_4` (`idHotel`),
  ADD KEY `R_5` (`idRace`),
  ADD KEY `R_12` (`idTourist`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Agency`
--
ALTER TABLE `Agency`
  MODIFY `IDagency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `airplanesRaces`
--
ALTER TABLE `airplanesRaces`
  MODIFY `idRace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boundsTourists`
--
ALTER TABLE `boundsTourists`
  MODIFY `idBoundTourist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `excursions`
--
ALTER TABLE `excursions`
  MODIFY `idExcursion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `excursionSummary`
--
ALTER TABLE `excursionSummary`
  MODIFY `idExcursionSummary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `idHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incomeCategory`
--
ALTER TABLE `incomeCategory`
  MODIFY `idIncomeCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomeSummary`
--
ALTER TABLE `incomeSummary`
  MODIFY `idIncomeSummary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Preferences`
--
ALTER TABLE `Preferences`
  MODIFY `idPreference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PreferencesSummary`
--
ALTER TABLE `PreferencesSummary`
  MODIFY `idPreferenceSummary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Subscription`
--
ALTER TABLE `Subscription`
  MODIFY `IDsubscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourists`
--
ALTER TABLE `tourists`
  MODIFY `idTourist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `idTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boundsTourists`
--
ALTER TABLE `boundsTourists`
  ADD CONSTRAINT `boundstourists_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `boundstourists_ibfk_2` FOREIGN KEY (`idTourist`) REFERENCES `tourists` (`idTourist`);

--
-- Constraints for table `excursionSummary`
--
ALTER TABLE `excursionSummary`
  ADD CONSTRAINT `excursionsummary_ibfk_1` FOREIGN KEY (`idExcursion`) REFERENCES `excursions` (`idExcursion`),
  ADD CONSTRAINT `excursionsummary_ibfk_2` FOREIGN KEY (`idTourist`) REFERENCES `tourists` (`idTourist`);

--
-- Constraints for table `incomeSummary`
--
ALTER TABLE `incomeSummary`
  ADD CONSTRAINT `incomesummary_ibfk_1` FOREIGN KEY (`idIncomeCategory`) REFERENCES `incomecategory` (`idIncomeCategory`),
  ADD CONSTRAINT `incomesummary_ibfk_2` FOREIGN KEY (`idTour`) REFERENCES `tours` (`idTour`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `PreferencesSummary`
--
ALTER TABLE `PreferencesSummary`
  ADD CONSTRAINT `preferencessummary_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotels` (`idHotel`),
  ADD CONSTRAINT `preferencessummary_ibfk_2` FOREIGN KEY (`idPreference`) REFERENCES `preferences` (`idPreference`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotels` (`idHotel`),
  ADD CONSTRAINT `tours_ibfk_2` FOREIGN KEY (`idRace`) REFERENCES `airplanesraces` (`idRace`),
  ADD CONSTRAINT `tours_ibfk_3` FOREIGN KEY (`idTourist`) REFERENCES `tourists` (`idTourist`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
