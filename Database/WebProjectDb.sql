-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 12:06 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebProjectDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `acthernaam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `profielfoto` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `locatieid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `naam`, `acthernaam`, `email`, `adress`, `profielfoto`, `userid`, `locatieid`) VALUES
(1, 'Dylan', 'Gomes', 'Dylangomes@live.be', 'Drie Eikenstraat 17', '1.jpeg', 2, 2),
(2, 'Kevin', 'Pieter', 'Kevin.Pieter@live.be', 'KevinsPieterlaan 1', '2.jpeg', 4, 2),
(3, 'user', 'd', 'userdmqoeilfj', 'oqiesf', '3.jpeg', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locaties`
--

CREATE TABLE `locaties` (
  `id` int(11) NOT NULL,
  `lokaal` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locaties`
--

INSERT INTO `locaties` (`id`, `lokaal`, `adres`) VALUES
(1, 'A1', 'Testlaan 5'),
(2, 'A2', 'Testlaan 5'),
(4, 'blblalokaal', 'blastraat'),
(5, 'boelokaal', 'boestraat'),
(6, 'A3', 'A3 straat');

-- --------------------------------------------------------

--
-- Table structure for table `uren`
--

CREATE TABLE `uren` (
  `id` int(11) NOT NULL,
  `artsid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `datum` varchar(255) NOT NULL,
  `opmerkingen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uren`
--

INSERT INTO `uren` (`id`, `artsid`, `userid`, `datum`, `opmerkingen`) VALUES
(3, 2, 2, '2016-02-05 12:00', 'testafspraak'),
(4, 2, 2, '2016-02-04 10:00', 'azertyuiop'),
(6, 1, 1, '2016-02-05 09:30', 'dfghjk'),
(10, 1, 2, '2016-02-03 10:30', 'Geblokkeerd door arts'),
(11, 1, 2, '2016-02-10 09:00', 'Geblokkeerd door arts'),
(15, 1, 2, '2016-02-09 05:00', 'Geblokkeerd door arts'),
(16, 1, 2, '2016-02-03 05:00', 'Geblokkeerd door arts'),
(17, 1, 2, '2016-02-03 09:00', 'Geblokkeerd door arts'),
(18, 2, 10, '2016-02-04 09:30', 'sdfghjk'),
(19, 1, 2, '2016-02-04 09:00', 'fgh'),
(20, 1, 2, '2016-02-04 09:30', 'Geblokkeerd door arts'),
(21, 1, 2, '2016-02-04 10:00', 'Geblokkeerd door arts'),
(22, 1, 2, '2016-02-13 09:00', 'Geblokkeerd door arts'),
(23, 1, 2, '2016-02-13 09:30', 'Geblokkeerd door arts'),
(24, 1, 2, '2016-02-13 10:00', 'Geblokkeerd door arts'),
(25, 1, 2, '2016-02-13 10:30', 'Geblokkeerd door arts'),
(26, 1, 2, '2016-02-13 11:00', 'Geblokkeerd door arts'),
(27, 1, 2, '2016-02-13 11:30', 'Geblokkeerd door arts'),
(28, 1, 2, '2016-02-13 12:00', 'Geblokkeerd door arts'),
(29, 1, 2, '2016-02-13 12:30', 'Geblokkeerd door arts'),
(30, 2, 2, '2016-02-05 09:00', 'buikgriep'),
(32, 1, 2, '2016-02-08 09:00', 'Geblokkeerd door arts'),
(33, 1, 2, '2016-02-08 09:30', 'Geblokkeerd door arts'),
(34, 1, 2, '2016-02-08 10:00', 'Geblokkeerd door arts'),
(35, 1, 2, '2016-02-05 09:00', 'dfghyujk'),
(36, 1, 2, '2016-02-06 09:00', 'Geblokkeerd door arts');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rolesstring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rolesstring`) VALUES
(1, 'Dylan', '$2y$13$6eYagWVy/FKT8KjeJOJG3OST9jUqM7A5kSI8hkcd0hxuIcR4g.7JC', 'ROLE_USER  ROLE_ADMIN ROLE_ARTS'),
(2, 'Arts', '$2y$13$TIWMmXRXv98.nfpJT/ze/eqYPjOKnHuuFp.OswSawsVI6mzxWE/7W', 'ROLE_USER ROLE_ADMIN ROLE_ARTS'),
(4, 'Doctor4', '$2y$13$LnImja8xUlNQK4DTxpq7W.Nv4b4zDUeHv900xYpR5TV7YHTzbOBr2', 'ROLE_USER ROLE_ARTS'),
(5, 'Doctor5', '$2y$13$J8B2tkAr9LpMsecIuNBMx.h6CaXuKg14EZ2r2ALTyb3kq/asYhTXW', 'ROLE_USER ROLE_ARTS'),
(6, 'Doctor2', '$2y$13$/3fIbfZPffy/YMxEbUfz1.BRfKfs5cskA07IiruBzJlDMWKZ5Qys6', 'ROLE_USER ROLE_ARTS'),
(7, 'Doctor3', '$2y$13$V6OH0c1HCu2MlvsSwNoh5OlNPBA86JWVKFyHaU8sEeBVB1Iox5x3W', 'ROLE_USER ROLE_ARTS'),
(9, 'Doctor1', '$2y$13$BvZPBmIRKH8y8YUdDMM.q.reSuOgPmfOBILgorBAQL8M0so1tKdYK', 'ROLE_USER ROLE_ARTS'),
(10, 'gebruiker', '$2y$13$.pR7.Ss8TlDAzsn0wTUSC.rSp59c4xHz7fqQvsxKxfysaUvg5.uyC', 'ROLE_USER'),
(11, 'userd', '$2y$13$vEWT16u7jS7CCc6Krc6tputfpfxDExZyoK..YDwOBeEpF0TIEkvcq', 'ROLE_USER ROLE_ARTS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `locatieid` (`locatieid`);

--
-- Indexes for table `locaties`
--
ALTER TABLE `locaties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uren`
--
ALTER TABLE `uren`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uren_ibfk_1` (`artsid`),
  ADD KEY `uren_ibfk_2` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `locaties`
--
ALTER TABLE `locaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uren`
--
ALTER TABLE `uren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `arts`
--
ALTER TABLE `arts`
  ADD CONSTRAINT `FK_77F46F30F132696E` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `arts_ibfk_1` FOREIGN KEY (`locatieid`) REFERENCES `locaties` (`id`);

--
-- Constraints for table `uren`
--
ALTER TABLE `uren`
  ADD CONSTRAINT `uren_ibfk_1` FOREIGN KEY (`artsid`) REFERENCES `arts` (`id`),
  ADD CONSTRAINT `uren_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
