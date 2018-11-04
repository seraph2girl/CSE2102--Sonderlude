-- This File consists SQL code to Create a 'IMIS_users' Database and Table

----------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `IMIS_users`;

CREATE TABLE IF NOT EXISTS `IMIS_users`.`users` (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    username VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    position VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
