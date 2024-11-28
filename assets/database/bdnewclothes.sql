-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdnewclothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`email`, `senha`) VALUES
('adm@adm', '123');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `cod_Categoria` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
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
-- Table structure for table `doacao`
--

CREATE TABLE `doacao` (
  `ID_doacao` int(11) NOT NULL,
  `dataDoacao` date NOT NULL,
  `ID_doador` int(11) NOT NULL,
  `ID_ong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doacao`
--

INSERT INTO `doacao` (`ID_doacao`, `dataDoacao`, `ID_doador`, `ID_ong`) VALUES
(13, '2024-11-29', 3, 2),
(10, '2024-11-24', 1, 1),
(11, '2024-11-16', 1, 1),
(14, '2024-11-30', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doador`
--

CREATE TABLE `doador` (
  `ID_doador` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doador`
--

INSERT INTO `doador` (`ID_doador`, `nome`, `email`, `CPF`, `senha`) VALUES
(1, 'Doador 1', 'Doador1@gmail.com', '12345678900', '123'),
(2, 'Doador2', 'Doador2@gmail.com', '12345678911', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `itemdoacao`
--

CREATE TABLE `itemdoacao` (
  `ID_item` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `ID_doacao` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `ID_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemdoacao`
--

INSERT INTO `itemdoacao` (`ID_item`, `qtd`, `ID_doacao`, `cod_categoria`, `ID_tamanho`) VALUES
(2, 20, 9, 1, 1),
(3, 10, 9, 4, 2),
(4, 1, 9, 7, 3),
(5, 2, 12, 1, 1),
(6, 4, 13, 1, 1),
(7, 12, 11, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ong`
--

CREATE TABLE `ong` (
  `ID_ong` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CNPJ` varchar(40) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ong`
--

INSERT INTO `ong` (`ID_ong`, `nome`, `email`, `CNPJ`, `endereco`, `telefone`, `senha`) VALUES
(1, 'Ong 1', 'Ong1@gmail.com', '82.260.497/0001-41', 'Rua 1', '11123456789', '1010'),
(2, 'Roupas com carinho', 'Ong2@gmail.com', '48.463.670/0001-70', 'Rua 2', '00123456789', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tamanho`
--

CREATE TABLE `tamanho` (
  `ID_tamanho` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamanho`
--

INSERT INTO `tamanho` (`ID_tamanho`, `descricao`) VALUES
(1, 'P'),
(2, 'M'),
(3, 'G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_Categoria`);

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`ID_doacao`);

--
-- Indexes for table `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`ID_doador`);

--
-- Indexes for table `itemdoacao`
--
ALTER TABLE `itemdoacao`
  ADD PRIMARY KEY (`ID_item`);

--
-- Indexes for table `ong`
--
ALTER TABLE `ong`
  ADD PRIMARY KEY (`ID_ong`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`ID_tamanho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doacao`
--
ALTER TABLE `doacao`
  MODIFY `ID_doacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doador`
--
ALTER TABLE `doador`
  MODIFY `ID_doador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itemdoacao`
--
ALTER TABLE `itemdoacao`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ong`
--
ALTER TABLE `ong`
  MODIFY `ID_ong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `ID_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
