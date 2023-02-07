-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 07, 2023 at 03:50 PM
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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sDate` date NOT NULL,
  `fDate` date NOT NULL,
  `sTime` time DEFAULT '00:00:00',
  `fTime` time DEFAULT '00:00:00',
  `real_evt_id` int(10) UNSIGNED DEFAULT NULL,
  `real_sDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `real_evt_id` (`real_evt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(1, 'giorno uno', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(2, 'giorno due', '2023-02-10', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(3, 'end_event_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 2, '2023-02-10');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(4, 'giorno tre', '2023-02-09', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(5, 'end_event_4_1', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 4, '2023-02-09');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(6, 'end_event_4_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 4, '2023-02-09');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(7, 'giorno cinque', '2023-02-08', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(8, 'end_event_7_1', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', 7, '2023-02-08');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(9, 'end_event_7_2', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 7, '2023-02-08');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(10, 'ti inculo bastardo', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`) VALUES(11, 'giorno bo', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`real_evt_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
