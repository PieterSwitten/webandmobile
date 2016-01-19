-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2016 at 11:44 
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
  `naam` varchar(255) NOT NULL,
  `acthernaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `profielfoto` varchar(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `locatieid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `naam`, `acthernaam`, `email`, `adress`, `profielfoto`, `userid`, `locatieid`) VALUES
(1, 'Dylan', 'Gomes', 'Dylangomes@live.be', 'Drie Eikenstraat 17', '1.jpeg', 2, 1),
(2, 'Kevin', 'Pieter', 'Kevin.Pieter@live.be', 'KevinsPieterlaan 1', '2.jpeg', 4, 1);

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
(1, 'A1', 'Testlaan 5');

-- --------------------------------------------------------

--
-- Table structure for table `uren`
--

CREATE TABLE `uren` (
  `id` int(11) NOT NULL,
  `artsid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `tijd` time NOT NULL,
  `datum` date NOT NULL,
  `opmerkingen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Dylan', '$2y$13$6eYagWVy/FKT8KjeJOJG3OST9jUqM7A5kSI8hkcd0hxuIcR4g.7JC', 'ROLE_USER ROLE_ARTS ROLE_ADMIN'),
(2, 'Arts', '$2y$13$TIWMmXRXv98.nfpJT/ze/eqYPjOKnHuuFp.OswSawsVI6mzxWE/7W', 'ROLE_USER ROLE_ADMIN ROLE_ARTS'),
(4, 'Doctor4', '$2y$13$LnImja8xUlNQK4DTxpq7W.Nv4b4zDUeHv900xYpR5TV7YHTzbOBr2', 'ROLE_USER ROLE_ARTS'),
(5, 'Doctor5', '$2y$13$J8B2tkAr9LpMsecIuNBMx.h6CaXuKg14EZ2r2ALTyb3kq/asYhTXW', 'ROLE_USER ROLE_ARTS'),
(6, 'Doctor2', '$2y$13$/3fIbfZPffy/YMxEbUfz1.BRfKfs5cskA07IiruBzJlDMWKZ5Qys6', 'ROLE_USER ROLE_ARTS'),
(7, 'Doctor3', '$2y$13$V6OH0c1HCu2MlvsSwNoh5OlNPBA86JWVKFyHaU8sEeBVB1Iox5x3W', 'ROLE_USER ROLE_ARTS'),
(9, 'Doctor1', '$2y$13$BvZPBmIRKH8y8YUdDMM.q.reSuOgPmfOBILgorBAQL8M0so1tKdYK', 'ROLE_USER ROLE_ARTS');

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
  ADD UNIQUE KEY `artsid` (`artsid`),
  ADD UNIQUE KEY `userid` (`userid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locaties`
--
ALTER TABLE `locaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uren`
--
ALTER TABLE `uren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
