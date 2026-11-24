SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `carsdb`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;
USE `carsdb`;

CREATE TABLE IF NOT EXISTS `car_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(100) NOT NULL,
  `Year` date DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `doors` bigint(20) DEFAULT NULL,
  `drive_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car_brands` (`Brand`, `Year`, `price`, `doors`, `drive_type`)
SELECT 'Toyota', '2019-01-01', 24950.00, 5, 1
WHERE NOT EXISTS (
  SELECT 1 FROM `car_brands` WHERE `Brand` = 'Toyota'
);

INSERT INTO `car_brands` (`Brand`, `Year`, `price`, `doors`, `drive_type`)
SELECT 'BMW', '2021-01-01', 38950.00, 5, 2
WHERE NOT EXISTS (
  SELECT 1 FROM `car_brands` WHERE `Brand` = 'BMW'
);

INSERT INTO `car_brands` (`Brand`, `Year`, `price`, `doors`, `drive_type`)
SELECT 'Volkswagen', '2020-01-01', 27950.00, 5, 1
WHERE NOT EXISTS (
  SELECT 1 FROM `car_brands` WHERE `Brand` = 'Volkswagen'
);
