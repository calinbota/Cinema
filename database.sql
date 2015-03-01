SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `daw` DEFAULT CHARACTER SET utf8 ;
USE `daw` ;

-- -----------------------------------------------------
-- Table `daw`.`bookings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `daw`.`bookings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `userid` VARCHAR(45) NULL DEFAULT NULL ,
  `movieid` VARCHAR(45) NULL DEFAULT NULL ,
  `date` VARCHAR(45) NULL DEFAULT NULL ,
  `hour` VARCHAR(45) NULL DEFAULT NULL ,
  `noOfPersons` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daw`.`ratings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `daw`.`ratings` (
  `movie id` INT(11) NOT NULL ,
  `value` VARCHAR(45) NULL DEFAULT NULL ,
  `userid` VARCHAR(45) NULL DEFAULT NULL ,
  `id` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daw`.`reviews`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `daw`.`reviews` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `movieid` VARCHAR(45) NULL DEFAULT NULL ,
  `content` VARCHAR(45) NULL DEFAULT NULL ,
  `date` VARCHAR(45) NULL DEFAULT NULL ,
  `userid` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daw`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `daw`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `address` VARCHAR(45) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `password` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
