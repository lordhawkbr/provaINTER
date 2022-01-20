-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jan-2022 às 06:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prova`
--
CREATE DATABASE IF NOT EXISTS `prova` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prova`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assc_contrato_cliente`
--

CREATE TABLE `assc_contrato_cliente` (
  `CD_CTO_CLI` int(11) NOT NULL COMMENT 'Código de Associação Contrato Cliente',
  `CD_CONTRATO` int(11) DEFAULT NULL COMMENT 'Código do Contrato\r',
  `CD_CLIENTE` int(11) DEFAULT NULL COMMENT 'Código do Cliente',
  `DT_RGST` date DEFAULT NULL COMMENT 'Data de Registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `assc_contrato_cliente`
--

TRUNCATE TABLE `assc_contrato_cliente`;
--
-- Extraindo dados da tabela `assc_contrato_cliente`
--

INSERT INTO `assc_contrato_cliente` (`CD_CTO_CLI`, `CD_CONTRATO`, `CD_CLIENTE`, `DT_RGST`) VALUES
(1, 1, 1, '2022-01-20'),
(2, 2, 2, '2022-01-20'),
(3, 3, 7, '2022-01-20'),
(4, 4, 8, '2022-01-20'),
(5, 5, 3, '2022-01-21'),
(6, 6, 4, '2022-01-21'),
(7, 7, 9, '2022-01-21'),
(8, 8, 10, '2022-01-21'),
(9, 9, 5, '2022-01-21'),
(10, 10, 6, '2022-01-21'),
(11, 11, 11, '2022-01-21'),
(12, 12, 12, '2022-01-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CD_CLIENTE` int(11) NOT NULL COMMENT 'Código do Cliente',
  `NM_CLIENTE` varchar(45) DEFAULT NULL COMMENT 'Nome do Cliente',
  `DC_CPF` varchar(45) DEFAULT NULL COMMENT 'Descrição do CPF',
  `DC_TELL` varchar(45) DEFAULT NULL COMMENT 'Descrição do Telefone',
  `DC_EMAIL` varchar(45) DEFAULT NULL COMMENT 'Descrição do E-mail',
  `CD_MUNICIPIO` int(11) DEFAULT NULL COMMENT 'Código do Município',
  `DT_RGST` date DEFAULT NULL COMMENT 'Data de Registro',
  `NM_MUNICIPIO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `cliente`
--

TRUNCATE TABLE `cliente`;
--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CD_CLIENTE`, `NM_CLIENTE`, `DC_CPF`, `DC_TELL`, `DC_EMAIL`, `CD_MUNICIPIO`, `DT_RGST`, `NM_MUNICIPIO`) VALUES
(1, 'Cliente 1', '12345678900', '3232210000', 'mail@mail.com', 313670205, '2022-01-20', 'Juiz de Fora'),
(2, 'Cliente 2', '12345678900', '3232210000', 'mail@mail.com', 313670205, '2022-01-20', 'Juiz de Fora'),
(3, 'Cliente 3', '12345678900', '3232210000', 'mail@mail.com', 330455705, '2022-01-21', 'Rio de Janeiro'),
(4, 'Cliente 4', '12345678900', '3232210000', 'mail@mail.com', 330455705, '2022-01-21', 'Rio de Janeiro'),
(5, 'Cliente 5', '12345678900', '3232210000', 'mail@mail.com', 313400410, '2022-01-22', 'Jacaré'),
(6, 'Cliente 6', '12345678900', '3232210000', 'mail@mail.com', 313400410, '2022-01-22', 'Jacaré'),
(7, 'Cliente 7', '12345678900', '3232210000', 'mail@mail.com', 291840705, '2022-01-20', 'Juazeiro'),
(8, 'Cliente 8', '12345678900', '3232210000', 'mail@mail.com', 291840705, '2022-01-20', 'Juazeiro'),
(9, 'Cliente 9', '12345678900', '3232210000', 'mail@mail.com', 310620005, '2022-01-21', 'Belo Horizonte'),
(10, 'Cliente 10', '12345678900', '3232210000', 'mail@mail.com', 310620005, '2022-01-21', 'Belo Horizonte'),
(11, 'Cliente 11', '12345678900', '3232210000', 'mail@mail.com', 420540705, '2022-01-22', 'Florianopolis'),
(12, 'Cliente 12', '12345678900', '3232210000', 'mail@mail.com', 420540705, '2022-01-22', 'Florianopolis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `CD_CONTRATO` int(11) NOT NULL COMMENT 'Código do Contrato',
  `VR_CONTRATO` decimal(10,0) DEFAULT NULL COMMENT 'Valor do Contrato',
  `DT_ASS` date DEFAULT NULL COMMENT 'Data da Assinatura',
  `DT_INICIO` date DEFAULT NULL COMMENT 'Data de Início',
  `DT_FIM` date DEFAULT NULL COMMENT 'Data de Fim',
  `DC_STATUS` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Descrição do Status\nA – Ativo\nD - Distratado',
  `DT_RGST` date DEFAULT NULL COMMENT 'Data de Registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tabela antes do insert `contrato`
--

TRUNCATE TABLE `contrato`;
--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`CD_CONTRATO`, `VR_CONTRATO`, `DT_ASS`, `DT_INICIO`, `DT_FIM`, `DC_STATUS`, `DT_RGST`) VALUES
(1, '1000', '2022-01-19', '2022-01-21', '2023-01-20', 'A', '2022-01-20'),
(2, '1000', '2022-01-19', '2022-01-21', '2023-01-20', 'A', '2022-01-20'),
(3, '1000', '2022-01-19', '2022-01-21', '2023-01-20', 'A', '2022-01-20'),
(4, '1000', '2022-01-19', '2022-01-21', '2023-01-20', 'A', '2022-01-20'),
(5, '5000', '2022-01-20', '2022-01-22', '2023-01-21', 'A', '2022-01-21'),
(6, '5000', '2022-01-20', '2022-01-22', '2023-01-21', 'A', '2022-01-21'),
(7, '5000', '2022-01-20', '2022-01-22', '2023-01-21', 'A', '2022-01-21'),
(8, '5000', '2022-01-20', '2022-01-22', '2023-01-21', 'A', '2022-01-21'),
(9, '10000', '2022-01-21', '2022-01-23', '2023-01-22', 'A', '2022-01-22'),
(10, '10000', '2022-01-21', '2022-01-23', '2023-01-22', 'A', '2022-01-22'),
(11, '10000', '2022-01-21', '2022-01-23', '2023-01-22', 'A', '2022-01-22'),
(12, '10000', '2022-01-21', '2022-01-23', '2023-01-22', 'A', '2022-01-22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assc_contrato_cliente`
--
ALTER TABLE `assc_contrato_cliente`
  ADD PRIMARY KEY (`CD_CTO_CLI`),
  ADD KEY `CD_CONTRATO` (`CD_CONTRATO`),
  ADD KEY `CD_CLIENTE` (`CD_CLIENTE`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CD_CLIENTE`);

--
-- Índices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`CD_CONTRATO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assc_contrato_cliente`
--
ALTER TABLE `assc_contrato_cliente`
  MODIFY `CD_CTO_CLI` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de Associação Contrato Cliente', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CD_CLIENTE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código do Cliente', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `CD_CONTRATO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código do Contrato', AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `assc_contrato_cliente`
--
ALTER TABLE `assc_contrato_cliente`
  ADD CONSTRAINT `assc_contrato_cliente_ibfk_1` FOREIGN KEY (`CD_CONTRATO`) REFERENCES `contrato` (`CD_CONTRATO`),
  ADD CONSTRAINT `assc_contrato_cliente_ibfk_2` FOREIGN KEY (`CD_CLIENTE`) REFERENCES `cliente` (`CD_CLIENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
