DROP DATABASE IF EXISTS calendar;

CREATE DATABASE IF NOT EXISTS calendar;
USE calendar;

DROP TABLE IF EXISTS `event`;

CREATE TABLE IF NOT EXISTS `event`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `sDate` DATE NOT NULL,
    `fDate` DATE NOT NULL,
    `sTime` TIME DEFAULT '00:00:00',
    `fTime` TIME DEFAULT '00:00:00',
    `real_evt_id` INT UNSIGNED,
    FOREIGN KEY ('real_evt_id') REFERENCES `event`(`id`),
    PRIMARY KEY (`id`)
);
