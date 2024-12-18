-- Criação do banco de dados
CREATE DATABASE `bdnewclothes`;
USE `bdnewclothes`;

-- Criação da tabela `categoria`
CREATE TABLE `categoria` (
  `cod` int NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM;

-- Insert na tabela `categoria`
INSERT INTO `categoria` (`cod`, `nome`, `descricao`) VALUES
(0, 'Categoria 1', 'Descrição da Categoria 1'),
(1, 'Categoria 2', 'Descrição da Categoria 2');

-- Criação da tabela `doacao`
CREATE TABLE `doacao` (
  `ID_doacao` int NOT NULL,
  `dataDoacao` date DEFAULT NULL,
  `ID_doador` int NOT NULL,
  `ID_ong` int NOT NULL,
  PRIMARY KEY (`ID_doacao`),
  KEY `ID_doador` (`ID_doador`),
  KEY `ID_ong` (`ID_ong`)
) ENGINE=MyISAM;

-- Insert na tabela `doacao`
INSERT INTO `doacao` (`ID_doacao`, `dataDoacao`, `ID_doador`, `ID_ong`) VALUES
(0, '2024-01-01', 0, 0),
(1, '2024-02-01', 1, 1);

-- Criação da tabela `doador`
CREATE TABLE `doador` (
  `ID_doador` int NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_doador`)
) ENGINE=MyISAM;

-- Insert na tabela `doador`
INSERT INTO `doador` (`ID_doador`, `nome`, `email`, `CPF`, `senha`) VALUES
(0, 'Doador 1', 'doador1@email.com', '12345678900', 'senha123'),
(1, 'Doador 2', 'doador2@email.com', '12345678901', 'senha456');

-- Criação da tabela `itemdoacao`
CREATE TABLE `itemdoacao` (
  `ID_item` int NOT NULL,
  `qtd` int NOT NULL,
  `ID_doacao` int NOT NULL,
  `cod` int NOT NULL,
  `ID_tamanho` int DEFAULT NULL,
  PRIMARY KEY (`ID_item`),
  KEY `ID_doacao` (`ID_doacao`),
  KEY `cod` (`cod`),
  KEY `ID_tamanho` (`ID_tamanho`)
) ENGINE=MyISAM;

-- Insert na tabela `itemdoacao`
INSERT INTO `itemdoacao` (`ID_item`, `qtd`, `ID_doacao`, `cod`, `ID_tamanho`) VALUES
(0, 10, 0, 0, 0),
(1, 5, 1, 1, 1);

-- Criação da tabela `ong`
CREATE TABLE `ong` (
  `ID_ong` int NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CNPJ` varchar(30) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ong`)
) ENGINE=MyISAM;

-- Insert na tabela `ong`
INSERT INTO `ong` (`ID_ong`, `nome`, `email`, `CNPJ`, `endereco`, `telefone`, `senha`) VALUES
(0, 'ONG 1', 'ong1@email.com', '12345678000100', 'Endereço 1', '123456789', 'senha123'),
(1, 'ONG 2', 'ong2@email.com', '12345678000101', 'Endereço 2', '987654321', 'senha456');

-- Criação da tabela `tamanho`
CREATE TABLE `tamanho` (
  `ID_tamanho` int NOT NULL,
  `descricao` varchar(90) NOT NULL,
  PRIMARY KEY (`ID_tamanho`)
) ENGINE=MyISAM;

-- Insert na tabela `tamanho`
INSERT INTO `tamanho` (`ID_tamanho`, `descricao`) VALUES
(0, 'P'),
(1, 'M'),
(2, 'G');

-- Criação da tabela `telefone`
CREATE TABLE `telefone` (
  `telefone` varchar(30) NOT NULL,
  `ID_doador` int NOT NULL,
  KEY `ID_doador` (`ID_doador`)
) ENGINE=MyISAM;

-- Insert na tabela `telefone`
INSERT INTO `telefone` (`telefone`, `ID_doador`) VALUES
('123456789', 0),
('987654321', 1);

-- Criação da tabela `administrador`
CREATE TABLE `administrador` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=MyISAM;

-- Insert na tabela `administrador`
INSERT INTO `administrador` (`email`, `senha`) VALUES
('admin@email.com', 'admin123');
