-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2016 às 23:00
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_requerimentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `cpf`, `nome`, `email`, `senha`, `telefone`, `curso`, `endereco`) VALUES
(1, '13356006711', 'Marcus Vinicius Ferreira', 'yevolutionex@gmail.com', 'asdsadasd', '2796067324', 'CTI-2', 'Rua dos Cravos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_requerimento`
--

CREATE TABLE `aluno_requerimento` (
  `id_aluno` int(11) NOT NULL,
  `id_requerimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerimentos`
--

CREATE TABLE `requerimentos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `valor` double DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `anexo` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno_requerimento`
--
ALTER TABLE `aluno_requerimento`
  ADD KEY `id_aluno` (`id_aluno`,`id_requerimento`),
  ADD KEY `id_requerimento` (`id_requerimento`);

--
-- Indexes for table `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requerimentos`
--
ALTER TABLE `requerimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_requerimento`
--
ALTER TABLE `aluno_requerimento`
  ADD CONSTRAINT `aluno_requerimento_ibfk_1` FOREIGN KEY (`id_requerimento`) REFERENCES `requerimentos` (`id`),
  ADD CONSTRAINT `aluno_requerimento_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
