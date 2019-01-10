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
-- Table `sefa`.`tb_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`tb_acesso` (
  `idAcesso` INT(11) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAcesso`),
  UNIQUE INDEX `idAcesso_UNIQUE` (`idAcesso` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sefa`.`tb_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`tb_grupo` (
  `idGrupo` INT(11) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  UNIQUE INDEX `idGrupo_UNIQUE` (`idGrupo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sefa`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sefa`.`tb_usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `acesso_idAcesso` INT(11) NOT NULL,
  `tb_grupo_idGrupo` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`, `acesso_idAcesso`, `tb_grupo_idGrupo`),
  INDEX `fk_usuario_acesso_idx` (`acesso_idAcesso` ASC),
  INDEX `fk_tb_usuario_tb_grupo1_idx` (`tb_grupo_idGrupo` ASC),
  CONSTRAINT `fk_usuario_acesso`
    FOREIGN KEY (`acesso_idAcesso`)
    REFERENCES `sefa`.`tb_acesso` (`idAcesso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_usuario_tb_grupo1`
    FOREIGN KEY (`tb_grupo_idGrupo`)
    REFERENCES `sefa`.`tb_grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
