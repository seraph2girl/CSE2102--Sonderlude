DROP DATABASE IF EXISTS `GPS_IMIS`;

-- -----------------------------------------------------
-- Create Database 'GPS_IMIS'
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `GPS_IMIS`;
USE `GPS_IMIS`;

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`users`
-- This script is responsible for creating The users that interact with GPS_IMIS Database
-- -----------------------------------------------------

CREATE TABLE `GPS_IMIS`.`users` (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(17) NOT NULL,
    lastName VARCHAR(17) NOT NULL,
    username VARCHAR(15) NOT NULL UNIQUE,
    dob DATE NOT NULL,
    sex ENUM('Male', 'Female') NOT NULL,
    contact VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    position ENUM('Administrator', 'Departments', 'Reception', 'Ministry_Personnel', 'Service_Directorate', 'Civilian_Directorate') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Inmates` (
  `Inmate_ID` INT NOT NULL AUTO_INCREMENT,
  `LastName` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `Date_Of_Birth` DATE NOT NULL,
  `Sex` CHAR(1) NOT NULL,
  `Address` VARCHAR(255) NULL,
  `Occupation` VARCHAR(60) NULL,
  `Marital_Status` VARCHAR(45) NULL,
  `Children` INT NULL,
  `Literacy` VARCHAR(45) NULL,
  `Height` INT NOT NULL,
  `Weight` INT NOT NULL,
  `Colour` VARCHAR(45) NOT NULL,
  `Identification_Marks` VARCHAR(200) NULL,
  `Facial_Structure` VARCHAR(200) NOT NULL,
  `Eye_Colour` VARCHAR(45) NOT NULL,
  `Hair_Colour` VARCHAR(45) NULL,
  `Tattoos` VARCHAR(45) NULL,
  `Next_Of_Kin` VARCHAR(45) NULL,
  `Next_Of_Kin_Address` VARCHAR(200) NULL,
  `Next_Of_Kin_Relationship` VARCHAR(45) NULL,
  `Contact` VARCHAR(100) NULL,
  PRIMARY KEY (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Visits`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Visits` (
  `Visit_ID` INT NOT NULL AUTO_INCREMENT,
  `Inmate_ID` INT NOT NULL,
  `ID_Number` INT(9) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `Date_Of_Birth` DATE NOT NULL,
  `Sex` CHAR(1) NOT NULL,
  `Relationship` VARCHAR(45) NULL,
  `Address` VARCHAR(255) NULL,
  `Date` DATE NOT NULL,
  PRIMARY KEY (`Visit_ID`),
  CONSTRAINT `fk_Inmates_has_Visits`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Discipline`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Discipline` (
  `Discipline_ID` INT NOT NULL AUTO_INCREMENT,
  `Inmate_ID` INT NOT NULL,
  `Ajudicating_Officer` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Offence` VARCHAR(200) NOT NULL,
  `Punishment` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Discipline_ID`),
  CONSTRAINT `fk_Inmates_has_Discipline`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Courtdate`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Courtdate` (
  `Court_ID` INT NOT NULL AUTO_INCREMENT,
  `Inmate_ID` INT NOT NULL,
  `Remand_ID` INT NOT NULL,
  `Date` DATE NOT NULL,
  PRIMARY KEY (`Court_ID`),
  CONSTRAINT `fk_Inmates_has_Courtdate`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Transfers`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Transfers` (
  `Transfer_ID` INT NOT NULL,
  `Inmate_ID` INT NOT NULL,
  `Date` DATE NOT NULL,
  `Time` VARCHAR(45) NOT NULL,
  `Escorting_Officer` VARCHAR(45) NOT NULL,
  `Current_Location` VARCHAR(200) NOT NULL,
  `New_Location` VARCHAR(200) NOT NULL,
  `Transfer_Reason` VARCHAR(200) NOT NULL,
  `Receiving_Officer` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Transfer_ID`),
  CONSTRAINT `fk_Inmates_has_Transfers`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Incidents`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Incidents` (
  `Incident_ID` INT NOT NULL AUTO_INCREMENT,
  `Inmate_ID` INT NOT NULL,
  `Statement` VARCHAR(200) NOT NULL,
  `Officer_On_Duty` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Time` TIME NOT NULL,
  `Action` VARCHAR(200) NOT NULL,
  `Victim` VARCHAR(200) NOT NULL,
  `Offence` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Incident_ID`),
  CONSTRAINT `fk_Inmates_has_Incidents`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Medical`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Medical` (
  `Med_ID` INT NOT NULL AUTO_INCREMENT,
  `Inmate_ID` INT NOT NULL,
  `Examining_Doctor` VARCHAR(45) NOT NULL,
  `Nurse_On_Duty` VARCHAR(45) NOT NULL,
  `Time` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Diagnosis` VARCHAR(200) NOT NULL,
  `Complaint` VARCHAR(250) NOT NULL,
  `Medication` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Med_ID`),
  CONSTRAINT `fk_Inmates_has_Medical`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Remand_Record`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Remand_Record` (
  `Remand_ID` INT NOT NULL,
  `Inmate_ID` INT NOT NULL,
  `Offence` VARCHAR(200) NOT NULL,
  `Date_Of_Offence` DATE NOT NULL,
  `Date_Admitted` DATE NOT NULL,
  `Bail` VARCHAR(45) NOT NULL,
  `Discharge` DATE NOT NULL,
  `Discharge_Type` VARCHAR(45) NOT NULL,
  `Court` VARCHAR(45) NOT NULL,
  `Magistrate` VARCHAR(45) NOT NULL,
  `Profile` VARCHAR(45) NOT NULL,
  `Watch` VARCHAR(45) NOT NULL,
  `Certifying_Officer` VARCHAR(45) NOT NULL,
  `Interviewing_Officer` VARCHAR(45) NULL,
  PRIMARY KEY (`Remand_ID`),
  CONSTRAINT `fk_Inmates_has_Remand_Record`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Convicted_Record`
-- -----------------------------------------------------
CREATE TABLE `GPS_IMIS`.`Convicted_Record` (
  `Convicted_ID` INT NOT NULL,
  `Inmate_ID` INT NOT NULL,
  `Case_Jacket_Number` INT NOT NULL,
  `Offence` VARCHAR(100) NOT NULL,
  `Date_Of_Offence` DATE NOT NULL,
  `Date_Admitted` DATE NOT NULL,
  `Date_Of_Conviction` DATE NOT NULL,
  `Sentence` INT NOT NULL,
  `EPDR` DATE NOT NULL,
  `FDR` DATE NOT NULL,
  `Class` VARCHAR(45) NOT NULL,
  `Profile` VARCHAR(45) NOT NULL,
  `Watch` VARCHAR(45) NOT NULL,
  `Type_Of_Sentence` VARCHAR(45) NOT NULL,
  `Certifying_Officer` VARCHAR(45) NOT NULL,
  `Interviewing_Officer` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Convicted_ID`),
  CONSTRAINT `fk_Inmates_has_Convicted_Record`
      FOREIGN KEY (`Inmate_ID`)
      REFERENCES `GPS_IMIS`.`Inmates` (`Inmate_ID`));
