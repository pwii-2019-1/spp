-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`colaborador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`colaborador` (
  `idcolaborador` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` VARCHAR(20) NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(15) NOT NULL,
  `email` VARCHAR(45) NULL,
  `logradouro` VARCHAR(60) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `dataCadastro` DATETIME NULL,
  PRIMARY KEY (`idcolaborador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` VARCHAR(20) NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `tel` VARCHAR(15) NOT NULL,
  `email` VARCHAR(45) NULL,
  `logradouro` VARCHAR(60) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `dataCadastro` DATETIME NULL,
  `dataUltimaCompra` DATETIME NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NOT NULL,
  `numeracao` INT NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `valorUnitario` DECIMAL(10,2) NOT NULL,
  `saldoProduto` INT NOT NULL,
  `datacadastro` DATETIME NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`venda` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `idcliente` INT NOT NULL,
  `idcolaborador` INT NOT NULL,
  `descontoTotal` DECIMAL(10,2) NOT NULL,
  `valorTotal` DECIMAL(10,2) NOT NULL,
  `condicaoPgto` VARCHAR(45) NOT NULL,
  `dataCompra` DATETIME NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_venda_colaborador1_idx` (`idcolaborador` ASC),
  INDEX `fk_venda_cliente1_idx` (`idcliente` ASC),
  CONSTRAINT `fk_venda_colaborador1`
    FOREIGN KEY (`idcolaborador`)
    REFERENCES `mydb`.`colaborador` (`idcolaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`idcliente`)
    REFERENCES `mydb`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`itensVenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`itensVenda` (
  `qtdProduto` INT NOT NULL,
  `valor` DECIMAL(10,2) NULL,
  `desconto` DECIMAL(10,2) NULL,
  `idvenda` INT NOT NULL,
  `idproduto` INT NOT NULL,
  INDEX `fk_itensVenda_venda1_idx` (`idvenda` ASC),
  INDEX `fk_itensVenda_produto1_idx` (`idproduto` ASC),
  PRIMARY KEY (`idvenda`, `idproduto`),
  CONSTRAINT `fk_itensVenda_venda1`
    FOREIGN KEY (`idvenda`)
    REFERENCES `mydb`.`venda` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itensVenda_produto1`
    FOREIGN KEY (`idproduto`)
    REFERENCES `mydb`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;