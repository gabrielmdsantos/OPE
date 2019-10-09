-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 09-Out-2019 às 16:13
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa_proj`
--

DROP TABLE IF EXISTS `despesa_proj`;
CREATE TABLE IF NOT EXISTS `despesa_proj` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONT` int(11) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `VALOR` decimal(10,0) DEFAULT NULL,
  `Descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_conti` (`ID_CONT`),
  KEY `fk_cli_desp` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
  `id_cont` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cli` (`id_cli`),
  KEY `FK_END_CONTRA` (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_proj`
--

DROP TABLE IF EXISTS `receita_proj`;
CREATE TABLE IF NOT EXISTS `receita_proj` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONT` int(11) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `VALOR` decimal(10,0) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_cont` (`ID_CONT`),
  KEY `fk_cli_receita` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `fk_cli_desp` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id`),
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
  ADD CONSTRAINT `FK_END_CONTRA` FOREIGN KEY (`id_cont`) REFERENCES `contrato` (`ID`),
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `receita_proj`
--
ALTER TABLE `receita_proj`
  ADD CONSTRAINT `fk_cli_receita` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id`),
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
