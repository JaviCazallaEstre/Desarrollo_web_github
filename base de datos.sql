-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema examinador
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema examinador
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `examinador` DEFAULT CHARACTER SET utf8 ;
USE `examinador` ;

-- -----------------------------------------------------
-- Table `examinador`.`examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`examen` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `duracion` INT(11) NOT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `activo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `nombre` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `apellidos` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `contrasena` VARCHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `fecha_nac` DATE NOT NULL,
  `foto` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `activo` TINYINT(1) NULL DEFAULT NULL,
  `rol_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_usuarios_rol1_idx` (`rol_id` ASC),
  CONSTRAINT `fk_usuarios_rol1`
    FOREIGN KEY (`rol_id`)
    REFERENCES `examinador`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`examenhechos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`examenhechos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `respuestas` JSON NOT NULL,
  `calificacion` INT(11) NOT NULL,
  `examen_id` INT(11) NOT NULL,
  `usuarios_id1` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_examenHechos_examen1_idx` (`examen_id` ASC),
  INDEX `fk_examenhechos_usuarios1_idx` (`usuarios_id1` ASC),
  CONSTRAINT `fk_examenHechos_examen1`
    FOREIGN KEY (`examen_id`)
    REFERENCES `examinador`.`examen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenhechos_usuarios1`
    FOREIGN KEY (`usuarios_id1`)
    REFERENCES `examinador`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`respuesta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `enunciado` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`tematicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`tematicas` (
  `id` INT(11) NOT NULL,
  `descripcion` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`pregunta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `enunciado` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `recurso` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `tematicas_id` INT(11) NOT NULL,
  `respuesta_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pregunta_tematicas_idx` (`tematicas_id` ASC),
  INDEX `fk_pregunta_respuesta1_idx` (`respuesta_id` ASC),
  CONSTRAINT `fk_pregunta_respuesta1`
    FOREIGN KEY (`respuesta_id`)
    REFERENCES `examinador`.`respuesta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pregunta_tematicas`
    FOREIGN KEY (`tematicas_id`)
    REFERENCES `examinador`.`tematicas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `examinador`.`pregunta_has_examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinador`.`pregunta_has_examen` (
  `pregunta_id` INT(11) NOT NULL,
  `examen_id` INT(11) NOT NULL,
  PRIMARY KEY (`pregunta_id`, `examen_id`),
  INDEX `fk_pregunta_has_examen_examen1_idx` (`examen_id` ASC),
  INDEX `fk_pregunta_has_examen_pregunta1_idx` (`pregunta_id` ASC),
  CONSTRAINT `fk_pregunta_has_examen_examen1`
    FOREIGN KEY (`examen_id`)
    REFERENCES `examinador`.`examen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pregunta_has_examen_pregunta1`
    FOREIGN KEY (`pregunta_id`)
    REFERENCES `examinador`.`pregunta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
