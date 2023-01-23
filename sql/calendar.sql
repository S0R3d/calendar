-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2023 at 03:05 PM
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
  `sDate` date NOT NULL,
  `sTime` time DEFAULT NULL,
  `fDate` date NOT NULL,
  `fTime` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(1, 'Primo giorno, Fgg', '2023-01-01', '00:00:00', '2023-01-01', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(2, 'Secondo giorno, Fgg', '2023-01-02', '00:00:00', '2023-01-02', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(3, 'Terzo giorno, Fgg', '2023-01-03', '00:00:00', '2023-01-03', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(4, 'Quarto giorno, Fgg', '2023-01-04', '00:00:00', '2023-01-04', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(5, 'Quinto giorno, Fgg, errato', '2023-01-05', '00:00:00', '2023-01-05', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(6, 'Sesto giorno, NFgg', '2023-01-06', '08:00:00', '2023-01-06', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(7, 'Settimo giorno, NFgg', '2023-01-07', '09:00:00', '2023-01-07', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(8, 'Ottavo giorno, NFgg', '2023-01-08', '10:00:00', '2023-01-08', '10:15:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(9, 'Nono giorno, NFgg', '2023-01-09', '11:00:00', '2023-01-09', '11:30:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(10, 'Decimo giorno, NFgg, errato', '2023-01-10', '13:00:00', '2023-01-10', '11:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(11, 'Undicesimo giorno, NFggs', '2023-01-11', '08:00:00', '2023-01-12', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(12, 'Dodicesimo giorno, NFggs', '2023-01-12', '09:00:00', '2023-01-13', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(13, 'Tredicesimo giorno, NFggs', '2023-01-13', '10:00:00', '2023-01-14', '10:15:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(14, 'Quattordicesimo giorno, NFggs', '2023-01-14', '11:00:00', '2023-01-15', '11:30:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(15, 'Quindicesimo giorno, NFggs, errato', '2023-01-15', '01:00:00', '2023-01-14', '11:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(16, 'Sedicesimo giorno, Fggs', '2023-01-16', '00:00:00', '2023-01-17', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(17, 'Diciassettesimo giorno, Fggs', '2023-01-17', '00:00:00', '2023-01-18', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(18, 'Diciottesimo giorno, Fggs', '2023-01-18', '00:00:00', '2023-01-19', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(19, 'Diciannovesimo giorno, Fggs', '2023-01-19', '00:00:00', '2023-01-20', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(20, 'Ventesimo giorno, Fggs, errato', '2023-01-20', '00:00:00', '2023-01-19', '10:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(21, 'Ventunesimo giorno, Fgg', '2023-02-14', '00:00:00', '2023-02-14', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(22, 'Ventiduesimo giorno, Fgg', '2023-03-08', '00:00:00', '2023-03-08', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(23, 'Ventitreesimo giorno, Fgg', '2023-04-09', '00:00:00', '2023-04-09', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(24, 'Ventoquattresimo giorno, Fgg', '2023-04-10', '00:00:00', '2023-04-10', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(25, 'Venticinquesimo giorno, Fgg', '2023-04-25', '00:00:00', '2023-04-25', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(26, 'Ventiseesimo giorno, Fgg', '2023-06-02', '00:00:00', '2023-06-02', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(27, 'Ventisettesimo giorno, Fgg', '2023-08-15', '00:00:00', '2023-08-15', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(28, 'Ventottesimo giorno, Fgg', '2023-11-01', '00:00:00', '2023-11-01', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(29, 'Ventinovesimo giorno, Fgg', '2023-12-08', '00:00:00', '2023-12-08', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(30, 'Trentesimo giorno, Fgg', '2023-12-24', '00:00:00', '2023-12-24', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(31, 'Trentunesimo giorno, Fgg', '2023-12-25', '00:00:00', '2023-12-25', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(32, 'Trentaduesimo giorno, Fgg', '2023-12-31', '00:00:00', '2023-12-31', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(33, 'Trentatreesimo giorno, Fgg', '2023-01-01', '00:00:00', '2023-01-01', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(34, 'Trentaquattresimo giorno, Fgg', '2023-05-05', '00:00:00', '2023-05-05', '00:00:00');
INSERT INTO `events` (`id`, `title`, `sDate`, `sTime`, `fDate`, `fTime`) VALUES(35, 'Trentacinquesimo giorno, Fgg', '2023-07-07', '00:00:00', '2023-07-07', '00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
