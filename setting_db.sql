CREATE DATABASE calendar;
USE calendar;

CREATE TABLE IF NOT EXISTS tests(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY(id)
);
INSERT INTO tests (name) VALUES ('tommmaso');

CREATE TABLE IF NOT EXISTS events(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    date1 DATE NOT NULL,
    date2 DATE,
    time1 TIME,
    time2 TIME,
    PRIMARY KEY(id)
);
INSERT INTO tests (title, date1) VALUES ('test titolo','2022-12-29');