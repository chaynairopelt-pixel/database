SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `gamesdb`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;
USE `gamesdb`;

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `platforms` varchar(255) NOT NULL,
  `release_year` smallint(5) unsigned DEFAULT NULL,
  `developer` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `games` (`name`, `genre`, `platforms`, `release_year`, `developer`, `description`)
SELECT 'Rocket League', 'Sport', 'PC, PlayStation, Xbox, Nintendo Switch', 2015, 'Psyonix',
       'Voetbal met raketaangedreven autos.'
WHERE NOT EXISTS (
  SELECT 1 FROM `games` WHERE `name` = 'Rocket League'
);
