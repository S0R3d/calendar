DROP DATABASE IF EXISTS calendar;

CREATE DATABASE IF NOT EXISTS calendar;
USE calendar;

DROP TABLE IF EXISTS `events`;

CREATE TABLE IF NOT EXISTS `events`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `sDate` DATE NOT NULL,
    `fDate` DATE NOT NULL,
    `sTime` TIME DEFAULT '00:00:00',
    `fTime` TIME DEFAULT '00:00:00',
    `real_event` INT UNSIGNED,
    FOREIGN KEY ('real_event') REFERENCES `events`(`id`),
    PRIMARY KEY (`id`)
);
