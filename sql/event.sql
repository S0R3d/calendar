-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 06, 2023 at 04:53 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `start_time` time DEFAULT '00:00:00',
  `finish_time` time DEFAULT '00:00:00',
  `real_event` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `real_event` (`real_event`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(1, 'giorno uno', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', NULL);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(2, 'giorno due', '2023-02-10', '2023-02-11', '00:00:00', '00:00:00', NULL);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(3, 'end_event_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 2);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(4, 'giorno tre', '2023-02-09', '2023-02-11', '00:00:00', '00:00:00', NULL);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(5, 'end_event_4_1', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 4);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(6, 'end_event_4_2', '2023-02-11', '2023-02-11', '00:00:00', '00:00:00', 4);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(7, 'giorno cinque', '2023-02-08', '2023-02-10', '00:00:00', '00:00:00', NULL);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(8, 'end_event_7_1', '2023-02-09', '2023-02-09', '00:00:00', '00:00:00', 7);
INSERT INTO `event` (`id`, `title`, `start_date`, `finish_date`, `start_time`, `finish_time`, `real_event`) VALUES(9, 'end_event_7_2', '2023-02-10', '2023-02-10', '00:00:00', '00:00:00', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`real_event`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
