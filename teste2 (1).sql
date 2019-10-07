-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Out-2019 às 14:37
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa` varchar(8) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `razao` varchar(50) DEFAULT NULL,
  `inscricao` int(15) DEFAULT NULL,
  `representante` varchar(50) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `id_parc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parc` (`id_parc`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `pessoa`, `nome`, `cpf`, `rg`, `cnpj`, `razao`, `inscricao`, `representante`, `sexo`, `observacao`, `id_parc`) VALUES
(1, 'testea', 'Beatriz Silva', '29818892392', '123274829', '0', '', 0, NULL, 'M', 'teste', 1),
(2, 'Juridica', 'teste2', '321', '321', '0', '0', 0, '', 'M', '  ', 5),
(3, 'Fisica', 'Willyam', '0', '0', '0', '', 0, NULL, 'M', '', 1),
(4, 'Juridica', 'tttesste', '123', '321', '0', '0', 0, '', 'F', '  ', 4),
(5, 'Fisica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(6, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(7, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(8, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(9, 'Juridica', 'teste', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(10, 'Juridica', '', '123', '0', NULL, '', NULL, NULL, 'M', '', 1),
(11, 'Juridica', '', '0', '0', NULL, 'teste', NULL, NULL, 'M', '', 1),
(12, 'Juridica', '', '0', '123', NULL, '', NULL, NULL, 'M', '', 1),
(13, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 1),
(14, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', '', 4),
(15, 'Juridica', '', '0', '0', NULL, '', NULL, NULL, 'M', 'teste', 1),
(16, 'Juridica', '', '0', '0', NULL, '', NULL, 'teste', 'M', '', 1),
(17, 'Juridica', 'gabriel', '321', '32131312', NULL, 'teste', NULL, 'teste', 'M', 'ttesste', 1),
(18, 'Fisica', 'teste', '0', '0', NULL, '', NULL, '', 'F', '', 4),
(19, 'Fisica', '', '0', '0', NULL, '', NULL, '', 'M', '', 1),
(20, 'Fisica', 'Beatriz Silva', '29818892392', '123274829', NULL, '', NULL, '', 'M', ' teste ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Servico` int(11) DEFAULT NULL,
  `Detalhes` varchar(500) DEFAULT NULL,
  `PRAZO` date DEFAULT NULL,
  `Valor` decimal(10,0) DEFAULT NULL,
  `qnt_parcela` decimal(10,0) DEFAULT NULL,
  `VENCIMENTO` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_cli` (`ID_Cliente`),
  KEY `fk_servi` (`ID_Servico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`ID`, `ID_Cliente`, `ID_Servico`, `Detalhes`, `PRAZO`, `Valor`, `qnt_parcela`, `VENCIMENTO`) VALUES
(1, 1, 1, 'teste', '2019-09-23', '10000', '5', '25'),
(2, 1, 1, 'dfsafdsfasd', '2019-09-25', '2000', '1', '0'),
(3, 1, 1, 'teste', '2019-09-25', '2000', '1', '0'),
(4, 1, 1, 'dsadasdas', '2019-10-06', '2000', '2', '0'),
(5, 1, 1, 'dsadasd', '2019-10-06', '1111', '1', '18'),
(6, 17, 1, 'testestestestesteste', '2019-10-06', '2000', '1', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa_proj`
--

DROP TABLE IF EXISTS `despesa_proj`;
CREATE TABLE IF NOT EXISTS `despesa_proj` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONT` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `VALOR` decimal(10,0) DEFAULT NULL,
  `Descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_conti` (`ID_CONT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `email`, `id_cli`) VALUES
(1, 'bia@teste.com.br', 1),
(2, '', 2),
(3, '', 3),
(4, '', 4),
(5, '', 5),
(6, '', 6),
(7, '', 7),
(8, '', 8),
(9, '', 9),
(10, '', 10),
(11, '', 11),
(12, '', 12),
(13, '', 13),
(14, '', 14),
(15, '', 15),
(16, '', 16),
(17, '', 17),
(18, '', 18),
(19, '', 19),
(20, 'bia@teste.com.br', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Complemento` varchar(50) DEFAULT NULL,
  `municipio` varchar(33) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cli` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `tipo`, `cep`, `logradouro`, `Numero`, `Complemento`, `municipio`, `estado`, `id_cli`) VALUES
(1, NULL, 1032010, 'Av Rudge', 305, '', 'SÃ£o Paulo', 'SP', 1),
(2, NULL, 0, '', 0, '', '', '', 2),
(3, NULL, 0, '', 0, '', '', '', 3),
(4, NULL, 0, '', 0, '', '', '', 4),
(5, NULL, 0, '', 0, '', '', '', 5),
(6, NULL, 0, '', 0, '', '', '', 6),
(7, NULL, 0, '', 0, '', '', '', 7),
(8, NULL, 0, '', 0, '', '', '', 8),
(9, NULL, 0, '', 0, '', '', '', 9),
(10, NULL, 0, '', 0, '', '', '', 10),
(11, NULL, 0, '', 0, '', '', '', 11),
(12, NULL, 0, '', 0, '', '', '', 12),
(13, NULL, 0, '', 0, '', '', '', 13),
(14, NULL, 0, '', 0, '', '', '', 14),
(15, NULL, 0, '', 0, '', '', '', 15),
(16, NULL, 0, '', 0, '', '', '', 16),
(17, NULL, 0, '', 0, '', '', '', 17),
(18, NULL, 0, '', 0, '', '', '', 18),
(19, NULL, 0, 'teste1', 0, '', '', '', 19),
(20, NULL, 0, 'teste2', 0, '', '', '', 19),
(21, NULL, 1032010, 'Av Rudge', 305, '', 'SÃƒÂ£o Paulo', 'SP', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `CELULAR` char(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID`, `NOME`, `CPF`, `EMAIL`, `CELULAR`) VALUES
(1, 'Gabriel Moreira', '12345678999', 'Gabriel@teste.com.br', '11998989898'),
(2, '', '0', '0', ''),
(3, 'Willyam', '0', '0', ''),
(4, 'Willyam', '123123', '0', ''),
(5, 'Beatriz Silva', '123', '1199999999', ''),
(6, 'Willyam', '123', 'will@teste.com.br', '11999999999'),
(7, 'josimeire', '12312312311', 'josi@teste.com.br', '1199999991'),
(8, 'gabriel', '0', '', '0'),
(9, 'gabriel', '0', '', '0'),
(10, 'teste', '0', '', '0'),
(11, 'teste', '0', '', '0'),
(12, 'teste', '0', '', '0'),
(13, 'teste', '0', '', '0'),
(14, 'teste', '0', '', '0'),
(15, 'gabriel', '0', '', '0'),
(16, '', '0', '', '0'),
(17, 'teste', '0', '', '0'),
(18, 'teste', '0', '', '0'),
(19, '', '0', '', '0'),
(20, '', '0', '', '0'),
(21, '', '0', '', '0'),
(22, 'teste', '0', '', '0'),
(23, 'teste', '0', '', '0'),
(24, '', '0', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `SENHA` varchar(20) NOT NULL,
  KEY `FK_LOGIN` (`ID_FUNCIONARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`ID_FUNCIONARIO`, `SENHA`) VALUES
(1, '12345678999'),
(1, '0'),
(1, '0'),
(1, '123123'),
(1, '123'),
(1, '123'),
(3, '12312312311'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0'),
(3, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
CREATE TABLE IF NOT EXISTS `parceiro` (
  `id_parc` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_parc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parc`, `nome`) VALUES
(1, 'Thiago'),
(2, 'Gabriel'),
(3, 'Beatriz'),
(4, 'josimeire'),
(5, 'Willyam');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_proj`
--

DROP TABLE IF EXISTS `receita_proj`;
CREATE TABLE IF NOT EXISTS `receita_proj` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONT` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `VALOR` decimal(10,0) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_cont` (`ID_CONT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita_proj`
--

INSERT INTO `receita_proj` (`ID`, `ID_CONT`, `DATA`, `VALOR`, `descricao`) VALUES
(1, 1, '2019-10-06', '321', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`) VALUES
(1, 'Uso capião'),
(2, 'AVCB'),
(3, 'desdobro'),
(5, 'Plantas'),
(6, 'dsffasfds'),
(7, 'dsfasdfdsafsdfas'),
(8, 'dsfsaffdffsa'),
(9, 'dffsdfsdfsfasd'),
(10, 'cdfdsfasfdsfdsjkfhkj'),
(11, 'dsdfdsfdsfsaf'),
(12, 'cdfdsfdsfafds'),
(13, 'dsasfdsfdasf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` int(11) NOT NULL,
  `id_clie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clie` (`id_clie`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `telefone`, `id_clie`) VALUES
(1, 0, 1),
(2, 0, 1),
(3, 0, 1),
(4, 0, 2),
(5, 0, 2),
(6, 0, 2),
(7, 0, 3),
(8, 0, 3),
(9, 0, 3),
(10, 0, 4),
(11, 0, 4),
(12, 0, 4),
(13, 0, 5),
(14, 0, 5),
(15, 0, 5),
(16, 0, 6),
(17, 0, 6),
(18, 0, 6),
(19, 0, 7),
(20, 0, 7),
(21, 0, 7),
(22, 0, 8),
(23, 0, 8),
(24, 0, 8),
(25, 0, 9),
(26, 0, 9),
(27, 0, 9),
(28, 0, 10),
(29, 0, 10),
(30, 0, 10),
(31, 0, 11),
(32, 0, 11),
(33, 0, 11),
(34, 0, 12),
(35, 0, 12),
(36, 0, 12),
(37, 0, 13),
(38, 0, 13),
(39, 0, 13),
(40, 0, 14),
(41, 0, 14),
(42, 0, 14),
(43, 0, 15),
(44, 0, 15),
(45, 0, 15),
(46, 0, 16),
(47, 0, 16),
(48, 0, 16),
(49, 0, 17),
(50, 0, 17),
(51, 0, 17),
(52, 0, 18),
(53, 0, 18),
(54, 0, 18),
(55, 0, 19),
(56, 0, 19),
(57, 0, 19),
(58, 0, 20),
(59, 0, 20),
(60, 0, 20);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_parc` FOREIGN KEY (`id_parc`) REFERENCES `parceiro` (`id_parc`);

--
-- Limitadores para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_cli` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_servi` FOREIGN KEY (`ID_Servico`) REFERENCES `servico` (`id`);

--
-- Limitadores para a tabela `despesa_proj`
--
ALTER TABLE `despesa_proj`
  ADD CONSTRAINT `fk_conti` FOREIGN KEY (`ID_CONT`) REFERENCES `contrato` (`ID`);

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `receita_proj`
--
ALTER TABLE `receita_proj`
  ADD CONSTRAINT `fk_cont` FOREIGN KEY (`ID_CONT`) REFERENCES `contrato` (`ID`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`id_clie`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
