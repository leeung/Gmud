-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2016 às 20:37
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ti`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gmud`
--

CREATE TABLE `gmud` (
  `id` int(11) NOT NULL,
  `tipoMudanca` int(11) NOT NULL,
  `sistema` varchar(45) NOT NULL,
  `modulos` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `objetivo` text NOT NULL,
  `requisitante` varchar(45) NOT NULL,
  `chamado` varchar(45) DEFAULT NULL,
  `dataHoraExec` datetime NOT NULL,
  `homologado` tinyint(1) NOT NULL,
  `riscoDesc` text NOT NULL,
  `riscoDescNaoExec` text NOT NULL,
  `indisponibilidade` text NOT NULL,
  `contigencia` varchar(45) NOT NULL,
  `respMudanca` varchar(45) NOT NULL,
  `respValMudanca` varchar(45) NOT NULL,
  `observacao` text,
  `riscoExecucao` int(11) NOT NULL,
  `riscoNaoExecucao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `risco`
--

CREATE TABLE `risco` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `risco`
--

INSERT INTO `risco` (`id`, `descricao`) VALUES
(1, 'BAIXO'),
(2, 'MEDIO'),
(3, 'ALTO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipomudanca`
--

CREATE TABLE `tipomudanca` (
  `id` int(11) NOT NULL,
  `tipoMudanca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipomudanca`
--

INSERT INTO `tipomudanca` (`id`, `tipoMudanca`) VALUES
(1, 'Normal programada'),
(2, 'Emergencial não programada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gmud`
--
ALTER TABLE `gmud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riscoMudanca_idx` (`riscoExecucao`),
  ADD KEY `riscoNaoMudanca_idx` (`riscoNaoExecucao`),
  ADD KEY `tipoMudanca_idx` (`tipoMudanca`);

--
-- Indexes for table `risco`
--
ALTER TABLE `risco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipomudanca`
--
ALTER TABLE `tipomudanca`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gmud`
--
ALTER TABLE `gmud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `risco`
--
ALTER TABLE `risco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipomudanca`
--
ALTER TABLE `tipomudanca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `gmud`
--
ALTER TABLE `gmud`
  ADD CONSTRAINT `riscoMudanca` FOREIGN KEY (`riscoExecucao`) REFERENCES `risco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `riscoNaoMudanca` FOREIGN KEY (`riscoNaoExecucao`) REFERENCES `risco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipoMudanca` FOREIGN KEY (`tipoMudanca`) REFERENCES `tipomudanca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
