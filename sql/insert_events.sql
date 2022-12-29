-- use this file ONLY then runned 'create_db.sql' to make sure to have the right SQL schema
USE calendar;

-- event solo 1 giorno ma tutto completo
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 1 completo','2022-12-01 00:00:00','2022-12-01 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 2 completo','2022-12-02 00:00:00','2022-12-02 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 3 completo','2022-12-03 00:00:00','2022-12-03 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 4 completo','2022-12-04 00:00:00','2022-12-04 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 5 completo','2022-12-05 00:00:00','2022-12-05 00:00:00');

-- event in un giorno da un ora dal un altra
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 6 non completo','2022-12-06 08:00:00','2022-12-06 10:00:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 7 non completo','2022-12-07 09:00:00','2022-12-07 10:00:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 8 non completo','2022-12-08 10:00:00','2022-12-08 10:15:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 9 non completo','2022-12-09 11:00:00','2022-12-09 11:30:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 10 non completo','2022-12-10 12:00:00','2022-12-10 11:00:00');

-- event piu giorni da un ora ad un altra
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 11 non completo piu giorni','2022-12-11 08:00:00','2022-12-12 10:00:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 12 non completo piu giorni','2022-12-12 09:00:00','2022-12-13 10:00:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 13 non completo piu giorni','2022-12-13 10:00:00','2022-12-14 10:15:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 14 non completo piu giorni','2022-12-14 11:00:00','2022-12-15 11:30:00');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 15 non completo piu giorni','2022-12-15 12:00:00','2022-12-16 11:00:00');

-- event piu giorni ma tutti completi
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 16 completo piu giorni','2022-12-16 00:00:00','2022-12-17 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 17 completo piu giorni','2022-12-17 00:00:00','2022-12-18 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 18 completo piu giorni','2022-12-18 00:00:00','2022-12-19 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 19 completo piu giorni','2022-12-19 00:00:00','2022-12-20 23:59:59');
INSERT INTO `events` (`title`, `start`,`finish`) VALUES ('giorno 20 completo piu giorni','2022-12-20 00:00:00','2022-12-21 00:00:00');
