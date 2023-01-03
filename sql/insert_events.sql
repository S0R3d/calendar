-- use this file ONLY then runned 'create_db.sql' to make sure to have the right SQL schema
USE calendar;

-- evento solo 1 giorno ma tutto completo
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(1, 'Primo giorno, completo', '2023-01-01 00:00:00', '2023-01-01 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(2, 'Secondo giorno, completo', '2023-01-02 00:00:00', '2023-01-02 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(3, 'Terzo giorno, completo', '2023-01-03 00:00:00', '2023-01-03 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(4, 'Quarto giorno, completo', '2023-01-04 00:00:00', '2023-01-04 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(5, 'Quinto giorno, completo', '2023-01-05 00:00:00', '2023-01-05 00:00:00');

-- evento in un giorno da un ora ad un altra
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(6, 'Sesto giorno, non completo', '2023-01-06 08:00:00', '2023-01-06 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(7, 'Settimo giorno, non completo', '2023-01-07 09:00:00', '2023-01-07 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(8, 'Ottavo giorno, non completo', '2023-01-08 10:00:00', '2023-01-08 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(9, 'Nono giorno, non completo', '2023-01-09 11:00:00', '2023-01-09 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(10, 'Decimo giorno, non completo', '2023-01-10 13:00:00', '2023-01-10 11:00:00');

-- evento piu giorni da un ora ad un altra
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(11, 'Undicesimo giorno, non completo piu giorni', '2023-01-11 08:00:00', '2023-01-12 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(12, 'Dodicesimo giorno, non completo piu giorni', '2023-01-12 09:00:00', '2023-01-13 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(13, 'Tredicesimo giorno, non completo piu giorni', '2023-01-13 10:00:00', '2023-01-14 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(14, 'Quattordicesimo giorno, non completo piu giorni', '2023-01-14 11:00:00', '2023-01-15 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(15, 'Quindicesimo giorno, non completo piu giorni', '2023-01-15 01:00:00', '2023-01-14 11:00:00');

-- evento piu giorni ma tutti completi
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(16, 'Sedicesimo giorno, completo piu giorni', '2023-01-16 00:00:00', '2023-01-17 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(17, 'Diciassettesimo giorno, completo piu giorni', '2023-01-17 00:00:00', '2023-01-18 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(18, 'Diciottesimo giorno, completo piu giorni', '2023-01-18 00:00:00', '2023-01-19 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(19, 'Diciannovesimo giorno, completo piu giorni', '2023-01-19 00:00:00', '2023-01-20 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(20, 'Ventesimo giorno, completo piu giorni', '2023-01-20 00:00:00', '2023-01-19 00:00:00');

-- Random Events - Feste -
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(21, 'Ventunesimo giorno, completo', '2023-02-14 00:00:00', '2023-02-14 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(22, 'Ventiduesimo giorno, completo', '2023-03-08 00:00:00', '2023-03-08 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(23, 'Ventitreesimo giorno, completo', '2023-04-09 00:00:00', '2023-04-09 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(24, 'Ventoquattresimo giorno, completo', '2023-04-10 00:00:00', '2023-04-10 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(25, 'Venticinquesimo giorno, completo', '2023-04-25 00:00:00', '2023-04-25 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(26, 'Ventiseesimo giorno, completo', '2023-06-02 00:00:00', '2023-06-02 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(27, 'Ventisettesimo giorno, completo', '2023-08-15 00:00:00', '2023-08-15 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(28, 'Ventottesimo giorno, completo', '2023-11-01 00:00:00', '2023-11-01 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(29, 'Ventinovesimo giorno, completo', '2023-12-08 00:00:00', '2023-12-08 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(30, 'Trentesimo giorno, completo', '2023-12-24 00:00:00', '2023-12-24 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(31, 'Trentunesimo giorno, completo', '2023-12-25 00:00:00', '2023-12-25 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(32, 'Trentaduesimo giorno, completo', '2023-12-31 00:00:00', '2023-12-31 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(33, 'Trentatreesimo giorno, completo', '2023-01-01 00:00:00', '2023-01-01 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(34, 'Trentaquattresimo giorno, completo', '2023-05-05 00:00:00', '2023-05-05 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(35, 'Trentacinquesimo giorno, completo', '2023-07-07 00:00:00', '2023-07-07 23:59:59');
