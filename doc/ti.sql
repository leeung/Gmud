-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Abr-2016 às 00:14
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ti`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(3) NOT NULL,
  `endereco` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `endereco`) VALUES
(1, 'lenne.meneses@gmail.com;leeungalves@gmail.com;leeung@casafreitas.com.br;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gmud`
--

CREATE TABLE IF NOT EXISTS `gmud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMudanca` int(11) NOT NULL,
  `sistema` varchar(45) NOT NULL,
  `modulos` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `objetivo` text NOT NULL,
  `requisitante` varchar(45) NOT NULL,
  `chamado` varchar(45) DEFAULT NULL,
  `dataHoraExecPret` datetime NOT NULL,
  `homologado` tinyint(1) NOT NULL,
  `riscoDesc` text NOT NULL,
  `riscoDescNaoExec` text NOT NULL,
  `indisponibilidade` text NOT NULL,
  `contigencia` varchar(45) NOT NULL,
  `respMudanca` varchar(45) NOT NULL,
  `respValMudanca` varchar(45) NOT NULL,
  `observacao` text,
  `resultato` varchar(100) DEFAULT NULL,
  `problemas` varchar(400) DEFAULT NULL,
  `riscoExecucao` int(11) NOT NULL,
  `riscoNaoExecucao` int(11) NOT NULL,
  `dataCriacao` date NOT NULL,
  `inicioExecucao` datetime DEFAULT NULL,
  `dataFechamento` datetime DEFAULT NULL,
  `situacao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `riscoMudanca_idx` (`riscoExecucao`),
  KEY `riscoNaoMudanca_idx` (`riscoNaoExecucao`),
  KEY `tipoMudanca_idx` (`tipoMudanca`),
  KEY `situacao` (`situacao`),
  KEY `situacao_2` (`situacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `gmud`
--

INSERT INTO `gmud` (`id`, `tipoMudanca`, `sistema`, `modulos`, `descricao`, `objetivo`, `requisitante`, `chamado`, `dataHoraExecPret`, `homologado`, `riscoDesc`, `riscoDescNaoExec`, `indisponibilidade`, `contigencia`, `respMudanca`, `respValMudanca`, `observacao`, `resultato`, `problemas`, `riscoExecucao`, `riscoNaoExecucao`, `dataCriacao`, `inicioExecucao`, `dataFechamento`, `situacao`) VALUES
(17, 2, 'Protheus', 'Estoque e custo -front loja', 'ImplantaÃ§Ã£o dos patches abaixo\r\n1.       Patch importaÃ§Ã£o 25 itens (parte da alteraÃ§Ã£o serÃ¡ feita na retaguarda outra parte serÃ¡ feita no PDV)\r\n2.       U_C7PRODUTO.prw - > ValidaÃ§Ã£o do pedido de compra a fornecedor ', '1.       Permitir o recebimento de mais de 25 itens por pedido no PDV.<br/>\r\n2.       Validar se o produto jÃ¡ existe no pedido de compra a fornecedor. ', 'item 1 TOTVS Caio, item 2 Jesus (Compras)', 'Item 1 TTZBTF, item 2 nÃ£o possui chamado.', '0000-00-00 00:00:00', 0, 'Existe a possibilidade de o sistema ou alguma funcionalidade ficar indisponÃ­vel, caso ocorra problemas nÃ£o identificados na homologaÃ§Ã£o.', 'NÃ£o atender Ã s solicitaÃ§Ãµes das correÃ§Ãµes e persistÃªncia dos problemas relatados.', 'DURANTE A EXECUÃ‡ÃƒO DA ATIVIDADE O SISTEMA PROTHEUS FICARÃ INDISPONÃVEL', 'NÃƒO SE APLICA', ' Valter Carvalho', 'Valter Carvalho', 'O item 1 serÃ¡ aplicado novamente hoje na retaguarda devido a nÃ£o ter sido possÃ­vel o download do patch ontem.\r\n\r\nÂ·         A parte da implantaÃ§Ã£o do patch dos 25 itens que serÃ¡ feita no PDV, serÃ¡ executada amanhÃ£ 16/03 durante o dia.', NULL, NULL, 1, 2, '2016-03-28', NULL, '0000-00-00 00:00:00', 3),
(18, 3, 'asdf', 'asdf', 'fasdf', 'adsf', 'adsf', 'asdf', '2016-12-31 23:59:00', 0, 'asdfas', 'asdfas', 'asdfasd', 'asdfasd', 'asdf', 'asdf', 'asdf', NULL, NULL, 1, 3, '2016-04-07', NULL, NULL, 2),
(20, 1, 'asd', 'LKH', 'KH', 'KJH', 'KLJH', 'LKJH', '2016-12-30 23:59:00', 0, 'ASFAS', 'ASDFAS', 'LK', 'LHKJ', 'HKJH', 'LKJHLK', 'HK\r\n', 'teste', '1', 1, 3, '2016-04-07', '2016-04-07 11:04:00', '2016-04-10 04:19:46', 3),
(21, 2, 'fas', 'asf', 'asdf', 'asdf', 'asf', 'asdf', '2016-12-31 23:59:00', 0, 'asfasdf', 'dsgasdg', 'asfasf', 'AGASF', 'ASDFQSDF', 'ASDA', 'ASF', NULL, NULL, 1, 3, '2016-04-11', NULL, NULL, 1),
(22, 2, 'fas', 'asf', 'asdf', 'asdf', 'asf', 'asdf', '2016-12-31 23:59:00', 0, 'asfasdf', 'dsgasdg', 'asfasf', 'AGASF', 'ASDFQSDF', 'ASDA', 'ASF', NULL, NULL, 1, 3, '2016-04-11', NULL, NULL, 1),
(23, 2, 'fas', 'asf', 'asdf', 'asdf', 'asf', 'asdf', '2016-12-31 23:59:00', 0, 'asfasdf', 'dsgasdg', 'asfasf', 'AGASF', 'ASDFQSDF', 'ASDA', 'ASF', NULL, NULL, 1, 3, '2016-04-11', NULL, NULL, 1),
(24, 2, 'fas', 'asf', 'asdf', 'asdf', 'asf', 'asdf', '2016-12-31 23:59:00', 0, 'asfasdf', 'dsgasdg', 'asfasf', 'AGASF', 'ASDFQSDF', 'ASDA', 'ASF', NULL, NULL, 1, 3, '2016-04-11', NULL, NULL, 1),
(25, 1, 'adsf', 'adsf', 'adsf', 'asdf', 'adsf', 'adsf', '2014-10-30 22:58:00', 0, 'asfa', 'asdfa', 'ASDFA', 'ASDF', 'SDFA', 'sdga', 'gsfdg', 'ffsdf', 'sfdfs', 1, 3, '2016-04-12', '2016-04-12 12:04:33', '2016-04-12 12:11:19', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `risco`
--

CREATE TABLE IF NOT EXISTS `risco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `risco`
--

INSERT INTO `risco` (`id`, `descricao`) VALUES
(1, 'BAIXO'),
(2, 'MEDIO'),
(3, 'ALTO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaogmud`
--

CREATE TABLE IF NOT EXISTS `situacaogmud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `situacaogmud`
--

INSERT INTO `situacaogmud` (`id`, `descricao`) VALUES
(1, 'Aberto'),
(2, 'Cancelado'),
(3, 'Executada'),
(4, 'Andamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipomudanca`
--

CREATE TABLE IF NOT EXISTS `tipomudanca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMudanca` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipomudanca`
--

INSERT INTO `tipomudanca` (`id`, `tipoMudanca`) VALUES
(1, 'Normal programada'),
(2, 'Emergencial não programada'),
(3, 'Emergencial retroativa');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `gmud`
--
ALTER TABLE `gmud`
  ADD CONSTRAINT `riscoMudanca` FOREIGN KEY (`riscoExecucao`) REFERENCES `risco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `riscoNaoMudanca` FOREIGN KEY (`riscoNaoExecucao`) REFERENCES `risco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SituacaoGmud` FOREIGN KEY (`situacao`) REFERENCES `situacaogmud` (`id`),
  ADD CONSTRAINT `tipoMudanca` FOREIGN KEY (`tipoMudanca`) REFERENCES `tipomudanca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
