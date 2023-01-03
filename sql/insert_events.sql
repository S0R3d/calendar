-- use this file ONLY then runned 'create_db.sql' to make sure to have the right SQL schema
USE calendar;

-- event solo 1 giorno ma tutto completo
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(1, 'Primo giorno, completo', '2022-12-01 00:00:00', '2022-12-01 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(2, 'Secondo giorno, completo', '2022-12-02 00:00:00', '2022-12-02 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(3, 'Terzo giorno, completo', '2022-12-03 00:00:00', '2022-12-03 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(4, 'Quarto giorno, completo', '2022-12-04 00:00:00', '2022-12-04 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(5, 'Quinto giorno, completo', '2022-12-05 00:00:00', '2022-12-05 00:00:00');

-- event in un giorno da un ora dal un altra
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(6, 'Sesto giorno, non completo', '2022-12-06 08:00:00', '2022-12-06 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(7, 'Settimo giorno, non completo', '2022-12-07 09:00:00', '2022-12-07 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(8, 'Ottavo giorno, non completo', '2022-12-08 10:00:00', '2022-12-08 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(9, 'Nono giorno, non completo', '2022-12-09 11:00:00', '2022-12-09 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(10, 'Decimo giorno, non completo', '2022-12-10 12:00:00', '2022-12-10 11:00:00');

-- event piu giorni da un ora ad un altra
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(11, 'Undicesimo giorno, non completo piu giorni', '2022-12-11 08:00:00', '2022-12-12 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(12, 'Dodicesimo giorno, non completo piu giorni', '2022-12-12 09:00:00', '2022-12-13 10:00:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(13, 'Tredicesimo giorno, non completo piu giorni', '2022-12-13 10:00:00', '2022-12-14 10:15:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(14, 'Quattordicesimo giorno, non completo piu giorni', '2022-12-14 11:00:00', '2022-12-15 11:30:00');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(15, 'Quindicesimo giorno, non completo piu giorni', '2022-12-15 12:00:00', '2022-12-16 11:00:00');

-- event piu giorni ma tutti completi
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(16, 'Sedicesimo giorno, completo piu giorni', '2022-12-16 00:00:00', '2022-12-17 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(17, 'Diciassettesimo giorno, completo piu giorni', '2022-12-17 00:00:00', '2022-12-18 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(18, 'Diciottesimo giorno, completo piu giorni', '2022-12-18 00:00:00', '2022-12-19 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(19, 'Diciannovesimo giorno, completo piu giorni', '2022-12-19 00:00:00', '2022-12-20 23:59:59');
INSERT INTO `events` (`id`, `title`, `start`, `finish`) VALUES(20, 'Ventesimo giorno, completo piu giorni', '2022-12-20 00:00:00', '2022-12-21 00:00:00');