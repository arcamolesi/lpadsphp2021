-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Maio-2021 às 02:01
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rodeio`
--
CREATE DATABASE IF NOT EXISTS `rodeio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rodeio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `tipoanimal` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `peso` float NOT NULL,
  `idade` int(11) NOT NULL,
  `somanota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `tipoanimal`, `nome`, `peso`, `idade`, `somanota`) VALUES
(1, 1, 'Rei da Safra', 1000, 7, 0),
(2, 1, 'Doce Amargo', 900, 8, 0),
(3, 1, 'Bandido', 946, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `competidor`
--

DROP TABLE IF EXISTS `competidor`;
CREATE TABLE `competidor` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `idade` int(11) NOT NULL,
  `somanota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `competidor`
--

INSERT INTO `competidor` (`id`, `nome`, `cidade`, `estado`, `idade`, `somanota`) VALUES
(1, 'Samuel Thiago', 'Assis', 'SP', 32, 0),
(2, 'Rafael de Brito', 'Assis', 'SP', 39, 0),
(3, 'Davi Henrique', 'Candido Mota', 'SP', 25, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `montaria`
--

DROP TABLE IF EXISTS `montaria`;
CREATE TABLE `montaria` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `animal` int(11) NOT NULL,
  `competidor` int(11) NOT NULL,
  `notacompetidor` float NOT NULL,
  `notaanimal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `montaria`
--

INSERT INTO `montaria` (`id`, `data`, `animal`, `competidor`, `notacompetidor`, `notaanimal`) VALUES
(1, '2021-04-30', 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `descricao`) VALUES
(1, 'Touro'),
(2, 'Cavalo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_tipoanimal` (`tipoanimal`);

--
-- Índices para tabela `competidor`
--
ALTER TABLE `competidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `montaria`
--
ALTER TABLE `montaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_montaria` (`animal`),
  ADD KEY `competidor_montaria` (`competidor`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `competidor`
--
ALTER TABLE `competidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `montaria`
--
ALTER TABLE `montaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_tipoanimal` FOREIGN KEY (`tipoanimal`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `montaria`
--
ALTER TABLE `montaria`
  ADD CONSTRAINT `animal_montaria` FOREIGN KEY (`animal`) REFERENCES `animal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `competidor_montaria` FOREIGN KEY (`competidor`) REFERENCES `competidor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
