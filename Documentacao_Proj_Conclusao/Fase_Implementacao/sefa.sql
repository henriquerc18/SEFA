-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sefa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sefa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sefa` DEFAULT CHARACTER SET utf8 ;
USE `sefa` ;

-- -----------------------------------------------------
-- Table `sefa`.`acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`acesso` (
  `idAcesso` INT(12) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAcesso`),
  UNIQUE INDEX `idAcesso_UNIQUE` (`idAcesso` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sefa`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`grupo` (
  `idGrupo` INT(12) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  UNIQUE INDEX `idGrupo_UNIQUE` (`idGrupo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sefa`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`usuario` (
  `idUsuario` INT(12) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `grupo` VARCHAR(45) NOT NULL,
  `acesso_idAcesso` INT(12) NOT NULL,
  `grupo_idGrupo` INT(12) NOT NULL,
  PRIMARY KEY (`idUsuario`, `acesso_idAcesso`, `grupo_idGrupo`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC),
  INDEX `fk_usuario_acesso_idx` (`acesso_idAcesso` ASC),
  INDEX `fk_usuario_grupo1_idx` (`grupo_idGrupo` ASC),
  CONSTRAINT `fk_usuario_acesso`
    FOREIGN KEY (`acesso_idAcesso`)
    REFERENCES `sefa`.`acesso` (`idAcesso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_grupo1`
    FOREIGN KEY (`grupo_idGrupo`)
    REFERENCES `sefa`.`grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
