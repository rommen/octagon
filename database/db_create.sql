-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema octagon
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema octagon
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `octagon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `octagon` ;

-- -----------------------------------------------------
-- Table `octagon`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `address` TEXT NULL,
  `email` VARCHAR(45) NOT NULL,
  `avatar` VARCHAR(4) NULL,
  `admin` TINYINT(1) NULL,
  `blocked` DATE NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Categories` (
  `idCategories` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `level` INT NULL,
  `idParent` INT NOT NULL,
  PRIMARY KEY (`idCategories`),
  INDEX `fk_Categories_Categories1_idx` (`idParent` ASC),
  CONSTRAINT `fk_Categories_Categories1`
    FOREIGN KEY (`idParent`)
    REFERENCES `octagon`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Shoe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Shoe` (
  `idShoe` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(145) NOT NULL,
  `color` VARCHAR(145) NOT NULL,
  `size` DECIMAL(3,1) NOT NULL,
  `text` TEXT NOT NULL,
  `brand` VARCHAR(45) NOT NULL,
  `prize` DECIMAL(5,2) NULL,
  `sportstar` VARCHAR(45) NULL,
  `year` YEAR NULL,
  `edition` VARCHAR(20) NULL,
  `extension` VARCHAR(4) NULL,
  `idCategories` INT NOT NULL,
  `idOwner` INT NOT NULL,
  PRIMARY KEY (`idShoe`),
  INDEX `fk_Shoe_Categories_idx` (`idCategories` ASC),
  INDEX `fk_Shoe_User1_idx` (`idOwner` ASC),
  CONSTRAINT `fk_Shoe_Categories`
    FOREIGN KEY (`idCategories`)
    REFERENCES `octagon`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Shoe_User1`
    FOREIGN KEY (`idOwner`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Comments` (
  `idComments` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `idOwner` INT NOT NULL,
  `idSeller` INT NULL,
  `idShoe` INT NULL,
  PRIMARY KEY (`idComments`),
  INDEX `fk_Comments_User1_idx` (`idOwner` ASC),
  INDEX `fk_Comments_User2_idx` (`idSeller` ASC),
  INDEX `fk_Comments_Shoe1_idx` (`idShoe` ASC),
  CONSTRAINT `fk_Comments_User1`
    FOREIGN KEY (`idOwner`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_User2`
    FOREIGN KEY (`idSeller`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Shoe1`
    FOREIGN KEY (`idShoe`)
    REFERENCES `octagon`.`Shoe` (`idShoe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Newsfeed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Newsfeed` (
  `idNewsfeed` INT NOT NULL AUTO_INCREMENT,
  `tile` VARCHAR(145) NOT NULL,
  `text` TEXT NULL,
  `date` DATE NOT NULL,
  `idCategories` INT NOT NULL,
  `idOwner` INT NOT NULL,
  PRIMARY KEY (`idNewsfeed`),
  INDEX `fk_Newsfeed_Categories1_idx` (`idCategories` ASC),
  INDEX `fk_Newsfeed_User1_idx` (`idOwner` ASC),
  CONSTRAINT `fk_Newsfeed_Categories1`
    FOREIGN KEY (`idCategories`)
    REFERENCES `octagon`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Newsfeed_User1`
    FOREIGN KEY (`idOwner`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Mailbox`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Mailbox` (
  `idMailbox` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(145) NOT NULL,
  `text` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `idSender` INT NOT NULL,
  `idReceiver` INT NOT NULL,
  `read` TINYINT(1) NULL,
  `deleteBySender` TINYINT(1) NULL,
  `deleteyReceiver` TINYINT(1) NULL,
  PRIMARY KEY (`idMailbox`),
  INDEX `fk_Mailbox_User1_idx` (`idSender` ASC),
  INDEX `fk_Mailbox_User2_idx` (`idReceiver` ASC),
  CONSTRAINT `fk_Mailbox_User1`
    FOREIGN KEY (`idSender`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mailbox_User2`
    FOREIGN KEY (`idReceiver`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Rating` (
  `idRating` INT NOT NULL AUTO_INCREMENT,
  `value` TINYINT(5) NOT NULL,
  `idShoe` INT NOT NULL,
  `idSeller` INT NOT NULL,
  `idOwner` INT NOT NULL,
  PRIMARY KEY (`idRating`),
  INDEX `fk_Rating_Shoe1_idx` (`idShoe` ASC),
  INDEX `fk_Rating_User1_idx` (`idSeller` ASC),
  INDEX `fk_Rating_User2_idx` (`idOwner` ASC),
  CONSTRAINT `fk_Rating_Shoe1`
    FOREIGN KEY (`idShoe`)
    REFERENCES `octagon`.`Shoe` (`idShoe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rating_User1`
    FOREIGN KEY (`idSeller`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rating_User2`
    FOREIGN KEY (`idOwner`)
    REFERENCES `octagon`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `octagon`.`Statistics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `octagon`.`Statistics` (
  `idStatistics` INT NOT NULL AUTO_INCREMENT,
  `tile` VARCHAR(145) NOT NULL,
  `text` TEXT NOT NULL,
  `idCategories` INT NOT NULL,
  PRIMARY KEY (`idStatistics`),
  INDEX `fk_Statistics_Categories1_idx` (`idCategories` ASC),
  CONSTRAINT `fk_Statistics_Categories1`
    FOREIGN KEY (`idCategories`)
    REFERENCES `octagon`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
