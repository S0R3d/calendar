-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 29, 2022 at 06:26 PM
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
-- Database: `calendar`
--
CREATE DATABASE IF NOT EXISTS `calendar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `calendar`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(1, 'giorno 1 completo', '2022-12-01 00:00:00', '2022-12-01 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(2, 'giorno 2 completo', '2022-12-02 00:00:00', '2022-12-02 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(3, 'giorno 3 completo', '2022-12-03 00:00:00', '2022-12-03 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(4, 'giorno 4 completo', '2022-12-04 00:00:00', '2022-12-04 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(5, 'giorno 5 completo', '2022-12-05 00:00:00', '2022-12-05 00:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(6, 'giorno 6 non completo', '2022-12-06 08:00:00', '2022-12-06 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(7, 'giorno 7 non completo', '2022-12-07 09:00:00', '2022-12-07 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(8, 'giorno 8 non completo', '2022-12-08 10:00:00', '2022-12-08 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(9, 'giorno 9 non completo', '2022-12-09 11:00:00', '2022-12-09 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(10, 'giorno 10 non completo', '2022-12-10 12:00:00', '2022-12-10 11:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(11, 'giorno 11 non completo piu giorni', '2022-12-11 08:00:00', '2022-12-12 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(12, 'giorno 12 non completo piu giorni', '2022-12-12 09:00:00', '2022-12-13 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(13, 'giorno 13 non completo piu giorni', '2022-12-13 10:00:00', '2022-12-14 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(14, 'giorno 14 non completo piu giorni', '2022-12-14 11:00:00', '2022-12-15 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(15, 'giorno 15 non completo piu giorni', '2022-12-15 12:00:00', '2022-12-16 11:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(16, 'giorno 16 completo piu giorni', '2022-12-16 00:00:00', '2022-12-17 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(17, 'giorno 17 completo piu giorni', '2022-12-17 00:00:00', '2022-12-18 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(18, 'giorno 18 completo piu giorni', '2022-12-18 00:00:00', '2022-12-19 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(19, 'giorno 19 completo piu giorni', '2022-12-19 00:00:00', '2022-12-20 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(20, 'giorno 20 completo piu giorni', '2022-12-20 00:00:00', '2022-12-21 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
