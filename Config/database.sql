-- create Data Base
CREATE DATABASE IF NOT EXISTS `surl`
CHARACTER SET utf8
COLLATE utf8_general_ci;
use  `surl`;

-- create Tables
CREATE TABLE  IF NOT EXISTS
    `Links` (
               `id` INT NOT NULL AUTO_INCREMENT,
               `url` varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY(`id`)
    )ENGINE=INNODB;