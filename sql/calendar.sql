-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2023 at 11:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `real_fDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `real_evt_id` (`real_evt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(1, 'giorno uno', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(2, 'giorno due', '2023-02-10', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(3, 'end_event_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 2, '2023-02-10', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(4, 'giorno tre', '2023-02-09', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(5, 'end_event_4_1', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 4, '2023-02-09', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(6, 'end_event_4_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 4, '2023-02-09', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(7, 'giorno cinque', '2023-02-08', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(8, 'end_event_7_1', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', 7, '2023-02-08', '2023-02-10');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(9, 'end_event_7_2', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 7, '2023-02-08', '2023-02-10');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(10, 'ti inculo bastardo', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(11, 'giorno bo', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(12, 'giorno test new code', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(13, 'giorno test cleaner', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(14, 'giorno test claner #2', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(15, 'giorno test cleaner #3', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(16, 'giorno test cleaner #4', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(17, 'giorno test multi', '2023-02-09', '2023-02-11', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(18, 'end_event_17_1', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 17, '2023-02-09', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(19, 'end_event_17_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 17, '2023-02-09', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(20, 'giorno test multi #2', '2023-02-10', '2023-02-12', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(21, 'end_event_20_1', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 20, '2023-02-10', '2023-02-11');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(22, 'end_event_20_2', '2023-02-12', '2023-02-12', '00:00:00', '00:00:00', 20, '2023-02-10', '2023-02-12');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(23, 'giorno test', '2023-02-14', '2023-02-14', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(24, 'giorno test #1', '2023-02-14', '2023-02-15', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(25, 'end_event_24_1', '2023-02-15', '2023-02-15', '00:00:00', '00:00:00', 24, '2023-02-14', '2023-02-15');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(26, 'giorno test #2', '2023-02-14', '2023-02-16', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(27, 'end_event_26_1', '2023-02-15', '2023-02-15', '00:00:00', '00:00:00', 26, '2023-02-14', '2023-02-16');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(28, 'end_event_26_2', '2023-02-16', '2023-02-16', '00:00:00', '00:00:00', 26, '2023-02-14', '2023-02-16');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(29, 'giorno test #2', '2023-02-15', '2023-02-15', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(30, 'giorno test remove', '2023-02-21', '2023-02-24', '00:00:00', '00:00:00', NULL, NULL, NULL);
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(31, 'end_event_30_1', '2023-02-22', '2023-02-22', '00:00:00', '00:00:00', 30, '2023-02-21', '2023-02-24');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(32, 'end_event_30_2', '2023-02-23', '2023-02-23', '00:00:00', '00:00:00', 30, '2023-02-21', '2023-02-24');
INSERT INTO `event` (`id`, `title`, `sDate`, `fDate`, `sTime`, `fTime`, `real_evt_id`, `real_sDate`, `real_fDate`) VALUES(33, 'end_event_30_3', '2023-02-24', '2023-02-24', '00:00:00', '00:00:00', 30, '2023-02-21', '2023-02-24');

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
