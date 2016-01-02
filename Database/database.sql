-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2015 at 01:12 
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

DROP TABLE IF EXISTS `UserType`;
		
CREATE TABLE `UserType` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `Location`;
		
CREATE TABLE `Location` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolesString` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

DROP TABLE IF EXISTS `Appointment`;
		
CREATE TABLE `Appointment` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `patient` INTEGER NULL DEFAULT NULL,
  `doctor` INTEGER NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `start_hour` TIME NULL DEFAULT NULL,
  `symptoms` VARCHAR(10000) NULL DEFAULT NULL,
  `block` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
=======
INSERT INTO `user` (`id`, `userName`, `password`, `rolesString`) VALUES
(1, 'admin1', '$2y$13$uQ04xfM6a5bb6YMtErPXBunJkilBsas48u/ovgH.iqlWz0Ld8vnG6', 'ROLE_ADMIN ROLE_USER');
>>>>>>> a3261fabfefed868faf9548f916f4c1cdb45b22c

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
