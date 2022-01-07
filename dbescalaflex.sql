-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jan-2022 às 14:46
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbescalaflex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(1, 'Centro'),
(2, 'Bairro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL,
  `hrAberturaSemanal` time NOT NULL,
  `hrFechamentoSemanal` time NOT NULL,
  `hrAberturaSabado` time NOT NULL,
  `hrFechamentoSabado` time NOT NULL,
  `hrAberturaDomingo` time NOT NULL,
  `hrFechamentoDomingo` time NOT NULL,
  `fk_idUnidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`idHorario`, `hrAberturaSemanal`, `hrFechamentoSemanal`, `hrAberturaSabado`, `hrFechamentoSabado`, `hrAberturaDomingo`, `hrFechamentoDomingo`, `fk_idUnidade`) VALUES
(1, '00:00:10', '00:00:10', '00:00:10', '00:00:10', '00:00:10', '00:00:10', 1),
(2, '00:00:10', '00:00:10', '00:00:10', '00:00:10', '00:00:10', '00:00:10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicoes`
--

CREATE TABLE `posicoes` (
  `idPosicao` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `fk_idUnidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posicoes`
--

INSERT INTO `posicoes` (`idPosicao`, `descricao`, `fk_idUnidade`) VALUES
(1, 'Frente', 3),
(2, 'Frente', 5),
(3, 'Frente', 4),
(4, 'Frente', 7),
(5, '1', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE `unidades` (
  `idUnidade` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fk_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidades`
--

INSERT INTO `unidades` (`idUnidade`, `nome`, `endereco`, `telefone`, `cep`, `email`, `responsavel`, `cidade`, `estado`, `fk_Categoria`) VALUES
(1, 'Rui Barbosa', 'Rua Voluntários da Pátria, 282', '', '', '', '', 'Porto Alegre', 'RS', 1),
(2, 'Montaury', 'Rua Dr José Montaury, 115', '', '', '', '', 'Porto Alegre', 'RS', 1),
(3, 'Praça Montevideo', 'Praça Montevidéo, 11', '', '', NULL, NULL, 'Porto Alegre', 'RS', 1),
(4, 'General Câmara', 'Rua Gen Câmara, 102', '', '', NULL, NULL, 'Porto Alegre', 'RS', 1),
(5, 'Praça Parobé', 'Rua Voluntários da Pátria, 50', '', '', NULL, NULL, 'Porto Alegre', 'RS', 1),
(7, 'Andradas', 'Rua dos Andradas, 1625', '', '', NULL, NULL, 'Porto Alegre', 'RS', 1),
(41, 'Andre', 'aaa', '12312312', '123123123', 'aaa@aaa.com', 'aaaa', 'aaa', 'PB', 2),
(44, 'Andre teste', 'teste', '51996220073', '94455000', 'teste@teste.com', 'testeeeee', 'teste', 'RS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `matricula` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `email`, `senha`, `status`, `matricula`) VALUES
(3, 'Andre lindo', 'aaa@aaa.com', '123', 1, 123);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `fk_horarios_unidades1` (`fk_idUnidade`);

--
-- Índices para tabela `posicoes`
--
ALTER TABLE `posicoes`
  ADD PRIMARY KEY (`idPosicao`),
  ADD KEY `fk_posicoes_unidades` (`fk_idUnidade`);

--
-- Índices para tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`idUnidade`),
  ADD KEY `fk_Categoria` (`fk_Categoria`) USING BTREE;

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posicoes`
--
ALTER TABLE `posicoes`
  MODIFY `idPosicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `idUnidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horarios_unidades1` FOREIGN KEY (`fk_idUnidade`) REFERENCES `unidades` (`idUnidade`);

--
-- Limitadores para a tabela `posicoes`
--
ALTER TABLE `posicoes`
  ADD CONSTRAINT `fk_posicoes_unidades` FOREIGN KEY (`fk_idUnidade`) REFERENCES `unidades` (`idUnidade`);

--
-- Limitadores para a tabela `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `fk_categoria_unidades1` FOREIGN KEY (`fk_Categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
