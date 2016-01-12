-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2016 at 11:09 
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
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `naam`, `acthernaam`, `email`, `adress`, `profielfoto`, `userid`) VALUES
(1, 'Artsine', 'Doterine', 'Artsine.Doterine@docter.be', 'Dockterlaan 5', '', 2);

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
(1, 'Dylan', '$2y$13$6eYagWVy/FKT8KjeJOJG3OST9jUqM7A5kSI8hkcd0hxuIcR4g.7JC', 'ROLE_USER'),
(2, 'Arts', '$2y$13$TIWMmXRXv98.nfpJT/ze/eqYPjOKnHuuFp.OswSawsVI6mzxWE/7W', 'ROLE_USER ROLE_ARTS ROLE_ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `arts`
--
ALTER TABLE `arts`
  ADD CONSTRAINT `arts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
