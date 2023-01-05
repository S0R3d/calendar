DROP DATABASE IF EXISTS calendar;

CREATE DATABASE IF NOT EXISTS calendar;
USE calendar;

DROP TABLE IF EXISTS `events`;

CREATE TABLE IF NOT EXISTS `events`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `sDate` DATE NOT NULL,
    `sTime` TIME,
    `fDate` DATE NOT NULL,
    `fTime` TIME,
    PRIMARY KEY(`id`)
);
