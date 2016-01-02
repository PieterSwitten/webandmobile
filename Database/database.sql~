-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'User'
-- 
-- ---

DROP TABLE IF EXISTS `User`;
		
CREATE TABLE `User` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `firstname` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `password` VARCHAR(50) NULL DEFAULT NULL,
  `phone_number` VARCHAR(20) NULL DEFAULT NULL,
  `location` INT NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `type` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'UserType'
-- 
-- ---

DROP TABLE IF EXISTS `UserType`;
		
CREATE TABLE `UserType` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `description` VARCHAR(max) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Location'
-- 
-- ---

DROP TABLE IF EXISTS `Location`;
		
CREATE TABLE `Location` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `description` VARCHAR(max) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Appointment'
-- 
-- ---

DROP TABLE IF EXISTS `Appointment`;
		
CREATE TABLE `Appointment` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `patient` INTEGER NULL DEFAULT NULL,
  `doctor` INTEGER NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `start_hour` TIME NULL DEFAULT NULL,
  `symptoms` VARCHAR(max) NULL DEFAULT NULL,
  `block` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `User` ADD FOREIGN KEY (location) REFERENCES `Location` (`id`);
ALTER TABLE `User` ADD FOREIGN KEY (type) REFERENCES `UserType` (`id`);
ALTER TABLE `Appointment` ADD FOREIGN KEY (patient) REFERENCES `User` (`id`);
ALTER TABLE `Appointment` ADD FOREIGN KEY (doctor) REFERENCES `User` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `User` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `UserType` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Location` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Appointment` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `User` (`id`,`firstname`,`lastname`,`password`,`phone_number`,`location`,`email`,`type`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `UserType` (`id`,`name`,`description`) VALUES
-- ('','','');
-- INSERT INTO `Location` (`id`,`name`,`description`) VALUES
-- ('','','');
-- INSERT INTO `Appointment` (`id`,`patient`,`doctor`,`date`,`start_hour`,`symptoms`,`block`) VALUES
-- ('','','','','','','');
