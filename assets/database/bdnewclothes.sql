-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2024 às 19:23
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdnewclothes`
CREATE DATABASE `bdnewclothes`;
USE `bdnewclothes`;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod_Categoria` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod_Categoria`, `nome`) VALUES
(1, 'Camisetas'),
(2, 'Calças'),
(3, 'Camisas'),
(4, 'Bermudas'),
(5, 'Saias'),
(6, 'Boné'),
(7, 'Casacos'),
(8, 'Moletom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `ID_doacao` int(11) NOT NULL,
  `dataDoacao` date NOT NULL,
  `ID_doador` int(11) NOT NULL,
  `ID_ong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doador`
--

CREATE TABLE `doador` (
  `ID_doador` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doador`
--

INSERT INTO `doador` (`ID_doador`, `nome`, `email`, `CPF`, `senha`) VALUES
(1, 'Doador 1', 'Doador1@gmail.com', '12345678900', '123'),
(2, 'Doador2', 'Doador2@gmail.com', '12345678911', '12345'),
(3, 'Erick', 'Erick@gmail.com', '12345678922', '1010');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemdoacao`
--

CREATE TABLE `itemdoacao` (
  `ID_item` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `ID_doacao` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `ID_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ong`
--

CREATE TABLE `ong` (
  `ID_ong` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CNPJ` varchar(40) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ong`
--

INSERT INTO `ong` (`ID_ong`, `nome`, `email`, `CNPJ`, `endereco`, `telefone`, `senha`) VALUES
(1, 'Ong 1', 'Ong1@gmail.com', '82.260.497/0001-41', 'Rua 1', '11123456789', '1010'),
(2, 'Ong 2', 'Ong2@gmail.com', '48.463.670/0001-70', 'Rua 2', '00123456789', '2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `ID_tamanho` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`ID_tamanho`, `descricao`) VALUES
(1, 'P'),
(2, 'M'),
(3, 'G');
(1, 'P'),
(2, 'M'),
(3, 'G');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `telefone` varchar(30) NOT NULL,
  `ID_doador` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_Categoria`);

--
-- Índices para tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`ID_doacao`);

--
-- Índices para tabela `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`ID_doador`);

--
-- Índices para tabela `itemdoacao`
--
ALTER TABLE `itemdoacao`
  ADD PRIMARY KEY (`ID_item`);

--
-- Índices para tabela `ong`
--
ALTER TABLE `ong`
  ADD PRIMARY KEY (`ID_ong`);

--
-- Índices para tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`ID_tamanho`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `ID_doacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `doador`
--
ALTER TABLE `doador`
  MODIFY `ID_doador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itemdoacao`
--
ALTER TABLE `itemdoacao`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ong`
--
ALTER TABLE `ong`
  MODIFY `ID_ong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `ID_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
