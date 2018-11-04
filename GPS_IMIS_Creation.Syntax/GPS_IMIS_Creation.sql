-- -----------------------------------------------------
-- Schema GPS_IMIS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `GPS_IMIS` DEFAULT CHARACTER SET utf8 ;
USE `GPS_IMIS` ;

-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Inmates` (
  `Regulation_Number` INT NOT NULL AUTO_INCREMENT,
  `LastName` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `Date_Of_Birth` DATE NOT NULL,
  `Sex` CHAR(1) NOT NULL,
  `Address` VARCHAR(200) NULL,
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
  PRIMARY KEY (`Regulation_Number`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Visits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Visits` (
  `VisitID` INT NOT NULL AUTO_INCREMENT,
  `Regulation_Number` INT NOT NULL,
  `ID_Number` INT NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `Date_Of_Birth` DATE NOT NULL,
  `Sex` CHAR(1) NOT NULL,
  `Relationship` VARCHAR(45) NULL,
  `Address` VARCHAR(200) NULL,
  `Date` DATE NOT NULL,
  PRIMARY KEY (`VisitID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Discipline`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Discipline` (
  `CaseID` INT NOT NULL AUTO_INCREMENT,
  `Ajudicating_Officer` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Offence` VARCHAR(200) NOT NULL,
  `Punishment` VARCHAR(200) NOT NULL,
  `Regulation_Number` INT NOT NULL,
  PRIMARY KEY (`CaseID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Courtdate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Courtdate` (
  `AutoNumber` INT NOT NULL AUTO_INCREMENT,
  `Regulation_Number` INT NOT NULL,
  `Date` DATE NOT NULL,
  PRIMARY KEY (`AutoNumber`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Transfers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Transfers` (
  `TransferID` INT NOT NULL,
  `Regulation_Number` INT NOT NULL,
  `Date` DATE NOT NULL,
  `Time` VARCHAR(45) NOT NULL,
  `Escorting_Officer` VARCHAR(45) NOT NULL,
  `Current_Location` VARCHAR(200) NOT NULL,
  `New_Location` VARCHAR(200) NOT NULL,
  `Transfer_Reason` VARCHAR(200) NOT NULL,
  `Receiving_Officer` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`TransferID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Incidents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Incidents` (
  `AutoID` INT NOT NULL AUTO_INCREMENT,
  `Regulation_Number` INT NOT NULL,
  `Statement` VARCHAR(200) NOT NULL,
  `Officer_On_Duty` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Time` TIME NOT NULL,
  `Action` VARCHAR(200) NOT NULL,
  `Victim` VARCHAR(200) NOT NULL,
  `Offence` VARCHAR(200) NOT NULL,
  `Discipline_CaseID` INT NOT NULL,
  PRIMARY KEY (`AutoID`, `Discipline_CaseID`),
  INDEX `fk_Incidents_Discipline1_idx` (`Discipline_CaseID` ASC),
  CONSTRAINT `fk_Incidents_Discipline1`
    FOREIGN KEY (`Discipline_CaseID`)
    REFERENCES `GPS_IMIS`.`Discipline` (`CaseID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Medical`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Medical` (
  `Med_ID` INT NOT NULL AUTO_INCREMENT,
  `Regulation_Number` INT NOT NULL,
  `Examining_Doctor` VARCHAR(45) NOT NULL,
  `Nurse_On_Duty` VARCHAR(45) NOT NULL,
  `Time` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Diagnosis` VARCHAR(200) NOT NULL,
  `Complaint` VARCHAR(250) NOT NULL,
  `Medication` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Med_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Remand_Record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Remand_Record` (
  `Case_Jacket_Number` INT NOT NULL,
  `Regulation_Number` INT NOT NULL,
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
  PRIMARY KEY (`Case_Jacket_Number`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Convicted_Record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Convicted_Record` (
  `Regulation_Number` INT NOT NULL,
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
  PRIMARY KEY (`Regulation_Number`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`inmates_Has_Visits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`inmates_Has_Visits` (
  `inmates_Regulation_Number` INT NOT NULL,
  `Visits_VisitID` INT NOT NULL,
  PRIMARY KEY (`inmates_Regulation_Number`, `Visits_VisitID`),
  INDEX `fk_inmates_has_Visits_Visits1_idx` (`Visits_VisitID` ASC),
  INDEX `fk_inmates_has_Visits_inmates_idx` (`inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_inmates_has_Visits_inmates`
    FOREIGN KEY (`inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmates_has_Visits_Visits1`
    FOREIGN KEY (`Visits_VisitID`)
    REFERENCES `GPS_IMIS`.`Visits` (`VisitID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`inmates_Has_Medical`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`inmates_Has_Medical` (
  `inmates_Regulation_Number` INT NOT NULL,
  `Medical_Auto_ID_Medication` INT NOT NULL,
  PRIMARY KEY (`inmates_Regulation_Number`, `Medical_Auto_ID_Medication`),
  INDEX `fk_inmates_has_Medical_Medical1_idx` (`Medical_Auto_ID_Medication` ASC),
  INDEX `fk_inmates_has_Medical_inmates1_idx` (`inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_inmates_has_Medical_inmates1`
    FOREIGN KEY (`inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmates_has_Medical_Medical1`
    FOREIGN KEY (`Medical_Auto_ID_Medication`)
    REFERENCES `GPS_IMIS`.`Medical` (`Med_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`inmates_Has_Transfers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`inmates_Has_Transfers` (
  `inmates_Regulation_Number` INT NOT NULL,
  `Transfers_TransferID` INT NOT NULL,
  PRIMARY KEY (`inmates_Regulation_Number`, `Transfers_TransferID`),
  INDEX `fk_inmates_has_Transfers_Transfers1_idx` (`Transfers_TransferID` ASC),
  INDEX `fk_inmates_has_Transfers_inmates1_idx` (`inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_inmates_has_Transfers_inmates1`
    FOREIGN KEY (`inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmates_has_Transfers_Transfers1`
    FOREIGN KEY (`Transfers_TransferID`)
    REFERENCES `GPS_IMIS`.`Transfers` (`TransferID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`inmates_Has_Incidents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`inmates_Has_Incidents` (
  `inmates_Regulation_Number` INT NOT NULL,
  `Incidents_AutoID` INT NOT NULL,
  PRIMARY KEY (`inmates_Regulation_Number`, `Incidents_AutoID`),
  INDEX `fk_inmates_has_Incidents_Incidents1_idx` (`Incidents_AutoID` ASC),
  INDEX `fk_inmates_has_Incidents_inmates1_idx` (`inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_inmates_has_Incidents_inmates1`
    FOREIGN KEY (`inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmates_has_Incidents_Incidents1`
    FOREIGN KEY (`Incidents_AutoID`)
    REFERENCES `GPS_IMIS`.`Incidents` (`AutoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Remand_Record_Has_Courtdate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Remand_Record_Has_Courtdate` (
  `Remand_Record_Regulation_Number` INT NOT NULL,
  `Courtdate_AutoNumber` INT NOT NULL,
  PRIMARY KEY (`Remand_Record_Regulation_Number`, `Courtdate_AutoNumber`),
  INDEX `fk_Remand_Record_has_Courtdate_Courtdate1_idx` (`Courtdate_AutoNumber` ASC),
  INDEX `fk_Remand_Record_has_Courtdate_Remand_Record1_idx` (`Remand_Record_Regulation_Number` ASC),
  CONSTRAINT `fk_Remand_Record_has_Courtdate_Remand_Record1`
    FOREIGN KEY (`Remand_Record_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Remand_Record` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Remand_Record_has_Courtdate_Courtdate1`
    FOREIGN KEY (`Courtdate_AutoNumber`)
    REFERENCES `GPS_IMIS`.`Courtdate` (`AutoNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates_Has_Courtdate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Inmates_Has_Courtdate` (
  `Inmates_Regulation_Number` INT NOT NULL,
  `Courtdate_AutoNumber` INT NOT NULL,
  PRIMARY KEY (`Inmates_Regulation_Number`, `Courtdate_AutoNumber`),
  INDEX `fk_Inmates_has_Courtdate_Courtdate1_idx` (`Courtdate_AutoNumber` ASC),
  INDEX `fk_Inmates_has_Courtdate_Inmates1_idx` (`Inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_Inmates_has_Courtdate_Inmates1`
    FOREIGN KEY (`Inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inmates_has_Courtdate_Courtdate1`
    FOREIGN KEY (`Courtdate_AutoNumber`)
    REFERENCES `GPS_IMIS`.`Courtdate` (`AutoNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates_Has_Remand_Record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Inmates_Has_Remand_Record` (
  `Inmates_Regulation_Number` INT NOT NULL,
  `Remand_Record_Regulation_Number` INT NOT NULL,
  PRIMARY KEY (`Inmates_Regulation_Number`, `Remand_Record_Regulation_Number`),
  INDEX `fk_Inmates_has_Remand_Record_Remand_Record1_idx` (`Remand_Record_Regulation_Number` ASC),
  INDEX `fk_Inmates_has_Remand_Record_Inmates1_idx` (`Inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_Inmates_has_Remand_Record_Inmates1`
    FOREIGN KEY (`Inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inmates_has_Remand_Record_Remand_Record1`
    FOREIGN KEY (`Remand_Record_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Remand_Record` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates_Has_Discipline`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Inmates_Has_Discipline` (
  `Inmates_Regulation_Number` INT NOT NULL,
  `Discipline_CaseID` INT NOT NULL,
  PRIMARY KEY (`Inmates_Regulation_Number`, `Discipline_CaseID`),
  INDEX `fk_Inmates_has_Discipline_Discipline1_idx` (`Discipline_CaseID` ASC),
  INDEX `fk_Inmates_has_Discipline_Inmates1_idx` (`Inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_Inmates_has_Discipline_Inmates1`
    FOREIGN KEY (`Inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inmates_has_Discipline_Discipline1`
    FOREIGN KEY (`Discipline_CaseID`)
    REFERENCES `GPS_IMIS`.`Discipline` (`CaseID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GPS_IMIS`.`Inmates_Has_Convicted_Record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GPS_IMIS`.`Inmates_Has_Convicted_Record` (
  `Inmates_Regulation_Number` INT NOT NULL,
  `Convicted_Record_Regulation_Number` INT NOT NULL,
  PRIMARY KEY (`Inmates_Regulation_Number`, `Convicted_Record_Regulation_Number`),
  INDEX `fk_Inmates_has_Convicted_Record_Convicted_Record1_idx` (`Convicted_Record_Regulation_Number` ASC),
  INDEX `fk_Inmates_has_Convicted_Record_Inmates1_idx` (`Inmates_Regulation_Number` ASC),
  CONSTRAINT `fk_Inmates_has_Convicted_Record_Inmates1`
    FOREIGN KEY (`Inmates_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Inmates` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inmates_has_Convicted_Record_Convicted_Record1`
    FOREIGN KEY (`Convicted_Record_Regulation_Number`)
    REFERENCES `GPS_IMIS`.`Convicted_Record` (`Regulation_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


