-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema inmobiliaria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inmobiliaria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inmobiliaria` DEFAULT CHARACTER SET utf8 ;
USE `inmobiliaria` ;

-- -----------------------------------------------------
-- Table `inmobiliaria`.`zona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`zona` (
  `id_zo` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL,
  PRIMARY KEY (`id_zo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`agencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`agencia` (
  `id_ag` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NULL,
  `adreça` VARCHAR(45) NULL,
  `zona_id_zo` INT NOT NULL,
  PRIMARY KEY (`id_ag`),
  INDEX `fk_agencia_zona1_idx` (`zona_id_zo` ASC) VISIBLE,
  CONSTRAINT `fk_agencia_zona1`
    FOREIGN KEY (`zona_id_zo`)
    REFERENCES `inmobiliaria`.`zona` (`id_zo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`venedors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`venedors` (
  `id_ven` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL,
  `sou` INT NULL,
  `import_vendes` INT NULL,
  `agencia_id_ag` INT NOT NULL,
  PRIMARY KEY (`id_ven`),
  INDEX `fk_venedors_agencia_idx` (`agencia_id_ag` ASC) VISIBLE,
  CONSTRAINT `fk_venedors_agencia`
    FOREIGN KEY (`agencia_id_ag`)
    REFERENCES `inmobiliaria`.`agencia` (`id_ag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`clients` (
  `id_cli` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL,
  `import_senyal` INT NULL,
  `data_senyal` DATETIME NULL,
  `venedors_id_ven` INT NOT NULL,
  PRIMARY KEY (`id_cli`),
  INDEX `fk_clients_venedors1_idx` (`venedors_id_ven` ASC) VISIBLE,
  CONSTRAINT `fk_clients_venedors1`
    FOREIGN KEY (`venedors_id_ven`)
    REFERENCES `inmobiliaria`.`venedors` (`id_ven`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`clients_has_agencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`clients_has_agencia` (
  `clients_id_cli` INT NOT NULL,
  `agencia_id_ag` INT NOT NULL,
  PRIMARY KEY (`clients_id_cli`, `agencia_id_ag`),
  INDEX `fk_clients_has_agencia_agencia1_idx` (`agencia_id_ag` ASC) VISIBLE,
  INDEX `fk_clients_has_agencia_clients1_idx` (`clients_id_cli` ASC) VISIBLE,
  CONSTRAINT `fk_clients_has_agencia_clients1`
    FOREIGN KEY (`clients_id_cli`)
    REFERENCES `inmobiliaria`.`clients` (`id_cli`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_has_agencia_agencia1`
    FOREIGN KEY (`agencia_id_ag`)
    REFERENCES `inmobiliaria`.`agencia` (`id_ag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`propietari`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`propietari` (
  `id_pro` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `adreça` VARCHAR(45) NULL,
  PRIMARY KEY (`id_pro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`pisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`pisos` (
  `id_pis` INT NOT NULL AUTO_INCREMENT,
  `superficie` INT NOT NULL,
  `t_ubicacio` VARCHAR(45) NULL,
  `n_lavabo` INT NOT NULL,
  `t_gas` VARCHAR(20) NULL,
  `propietari_id_pro` INT NOT NULL,
  PRIMARY KEY (`id_pis`),
  INDEX `fk_pisos_propietari1_idx` (`propietari_id_pro` ASC) VISIBLE,
  CONSTRAINT `fk_pisos_propietari1`
    FOREIGN KEY (`propietari_id_pro`)
    REFERENCES `inmobiliaria`.`propietari` (`id_pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`lloguer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`lloguer` (
  `pisos_id_pis` INT NOT NULL,
  `id_llo` INT NOT NULL,
  `preu_lloguer` INT NOT NULL,
  `fiança` INT NULL,
  PRIMARY KEY (`pisos_id_pis`),
  UNIQUE INDEX `id_llo_UNIQUE` (`id_llo` ASC) VISIBLE,
  CONSTRAINT `fk_lloguer_pisos1`
    FOREIGN KEY (`pisos_id_pis`)
    REFERENCES `inmobiliaria`.`pisos` (`id_pis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`venta` (
  `pisos_id_pis` INT NOT NULL,
  `id_ven` INT NULL AUTO_INCREMENT,
  `pre_ven` INT NULL,
  `hipoteca` INT NULL,
  PRIMARY KEY (`pisos_id_pis`),
  UNIQUE INDEX `id_ven_UNIQUE` (`id_ven` ASC) VISIBLE,
  UNIQUE INDEX `hipoteca_UNIQUE` (`hipoteca` ASC) VISIBLE,
  CONSTRAINT `fk_venta_pisos1`
    FOREIGN KEY (`pisos_id_pis`)
    REFERENCES `inmobiliaria`.`pisos` (`id_pis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`agencia_has_pisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`agencia_has_pisos` (
  `agencia_id_ag` INT NOT NULL,
  `pisos_id_pis` INT NOT NULL,
  PRIMARY KEY (`agencia_id_ag`, `pisos_id_pis`),
  INDEX `fk_agencia_has_pisos_pisos1_idx` (`pisos_id_pis` ASC) VISIBLE,
  INDEX `fk_agencia_has_pisos_agencia1_idx` (`agencia_id_ag` ASC) VISIBLE,
  CONSTRAINT `fk_agencia_has_pisos_agencia1`
    FOREIGN KEY (`agencia_id_ag`)
    REFERENCES `inmobiliaria`.`agencia` (`id_ag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agencia_has_pisos_pisos1`
    FOREIGN KEY (`pisos_id_pis`)
    REFERENCES `inmobiliaria`.`pisos` (`id_pis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`telefono` (
  `telefono` INT NOT NULL,
  `tipus` VARCHAR(20) NULL,
  `agencia_id_ag` INT NOT NULL,
  INDEX `fk_telefono_agencia1_idx` (`agencia_id_ag` ASC) VISIBLE,
  PRIMARY KEY (`telefono`),
  CONSTRAINT `fk_telefono_agencia1`
    FOREIGN KEY (`agencia_id_ag`)
    REFERENCES `inmobiliaria`.`agencia` (`id_ag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`user` (
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);


-- -----------------------------------------------------
-- Table `inmobiliaria`.`user_1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`user_1` (
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
