-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Maio-2020 às 20:24
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprojetopam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnivelacesso`
--

CREATE TABLE `tbnivelacesso` (
  `idNivel` int(11) NOT NULL,
  `descricaoNivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbnivelacesso`
--

INSERT INTO `tbnivelacesso` (`idNivel`, `descricaoNivel`) VALUES
(1, 'Administrador'),
(2, 'Usuário comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(50) DEFAULT NULL,
  `emailUsuario` varchar(50) DEFAULT NULL,
  `senhaUsuario` varchar(50) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `idNivel`) VALUES
(98, 'ai', 'sdjjkd', 'sdkjsd', 1),
(99, 'Felipão', 'felipão889@gmail.com', '123', 1),
(100, 'Gustavo', 'nunesgustavo668@gmail.com', '123', 1),
(101, 'Matheus', 'matheusnunesquarto@gmail.com', '123', 1),
(102, 'num sei', 'urameshi.gustavo668@gmail.com', '123', 1),
(103, 'saitama', 'asd', '123', 1),
(104, 'a', 'a', '123', 1),
(105, 'Larissa', 'larissa@gmail.com', '123', 1),
(106, 'l', 'larissa@gmail.com	', 'l', 1),
(107, 'meu pai', 'meupai@gmail.com', '123', 1),
(108, 'Manocchio', 'manocchio@gmail.com', '123', 1),
(109, 'teste2Nivel', 'teste2teste2teste2@teste2', '123', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbnivelacesso`
--
ALTER TABLE `tbnivelacesso`
  ADD PRIMARY KEY (`idNivel`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idNivel` (`idNivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbnivelacesso`
--
ALTER TABLE `tbnivelacesso`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `tbusuario_ibfk_1` FOREIGN KEY (`idNivel`) REFERENCES `tbnivelacesso` (`idNivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
