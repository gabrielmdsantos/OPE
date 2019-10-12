-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Out-2019 às 18:51
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `pessoa`, `nome`, `cpf`, `rg`, `cnpj`, `razao`, `inscricao`, `representante`, `sexo`, `observacao`, `id_parc`) VALUES
(1, 'Fisica', 'Thiago', '321123321', '321122321', '0', '0', 0, 'João', 'M', '        Teste 1        ', 1),
(2, 'Fisica', 'Gabriel', '333211231', '3321123', '0', '0', 0, 'aaa', 'M', '  Tese', 1),
(3, 'Fisica', 'Josimeire', '332123', '33212123', '0', '0', 0, 'Teste', 'M', '  tesste    ', 1),
(4, 'Fisica', '', '0', '0', NULL, '', NULL, '', 'M', '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`ID`, `ID_Cliente`, `ID_Servico`, `Detalhes`, `PRAZO`, `Valor`, `qnt_parcela`, `VENCIMENTO`) VALUES
(1, 1, 2, ' tesste ', '2019-10-10', '5000', '5', '5'),
(2, 2, 2, '   dfdfsfsd   ', '2019-10-10', '5000', '10', '13'),
(3, 1, 1, '', '2019-10-12', '22222', '1', '0');

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
  `Descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_conti` (`ID_CONT`),
  KEY `fk_cli_desp` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesa_proj`
--

INSERT INTO `despesa_proj` (`ID`, `ID_CONT`, `id_cli`, `DATA`, `VALOR`, `Descricao`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 2, 2, '2019-10-10', '222', 'teste'),
(4, 1, 1, '2019-10-10', '500000', 'teste'),
(5, NULL, NULL, '2019-10-11', '300', 'teste'),
(6, 3, 1, NULL, NULL, NULL),
(7, 3, 1, '2019-10-12', '222', 'teste'),
(8, 3, 1, '2019-10-12', '2000', 'aaaaaaatesteaa');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `email`, `id_cli`) VALUES
(1, 'thiago@teste.com.br', 1),
(2, 'gabriel@teste2.com.br', 2),
(3, 'rosi@teste.com.br', 3),
(4, '', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `tipo`, `cep`, `logradouro`, `Numero`, `Complemento`, `municipio`, `estado`, `id_cli`, `id_cont`) VALUES
(1, 'Residencial', 3211231, 'Rua João testá', 321, 'AP91', 'São Paulo', 'SP', 1, NULL),
(2, 'Residencial', 321, '321321', 321, 'adsdsa', 'dsadas', 'SP', 3, NULL),
(3, 'Correspondencia', 321321, 'Avas djaslksad', 3212, 'sddas', 'São paulo', 'SP', 3, NULL),
(4, 'Obra', 8270610, 'rua teste', 321, 'Ap 31', 'São paulo', 'SP', 1, 1),
(5, 'Obra', 8270270, 'AV Teste', 321, 'ap22', 'São paulo', 'SP', 2, 2),
(6, 'Residencial', 0, '', 0, '', '', 'UF', 4, NULL),
(7, 'Obra', 0, '', 0, '', '', 'UF', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CELULAR` char(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID`, `NOME`, `CPF`, `EMAIL`, `CELULAR`) VALUES
(1, 'Admin', '123', NULL, NULL),
(2, 'Gabriel Santos', '33321123', 'teste@teste.com.br', '23232321'),
(3, 'teste', '323213123', 'teste@tese', '2132132131'),
(4, 'sdsdssa', '32131', '', '0'),
(5, 'teste', '3211231', 'teste@teste.com.br', '2312312312'),
(6, 'TESTE', '0', '', '0');

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
(1, '123'),
(3, '33321123'),
(3, '323213123'),
(3, '32131'),
(5, '3211231'),
(6, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
CREATE TABLE IF NOT EXISTS `parceiro` (
  `id_parc` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_parc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parc`, `nome`) VALUES
(1, 'Pacheco'),
(2, 'Vanderson'),
(3, 'Takai'),
(4, 'TESTE');

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
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_cont` (`ID_CONT`),
  KEY `fk_cli_receita` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita_proj`
--

INSERT INTO `receita_proj` (`ID`, `ID_CONT`, `id_cli`, `DATA`, `VALOR`, `descricao`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 1, 1, '2019-10-10', '22', ''),
(4, 2, 2, '2019-10-10', '5000', 'PAgo'),
(5, NULL, NULL, '2019-10-11', '300', 'teste'),
(6, NULL, NULL, '2019-10-11', '333', ''),
(7, NULL, NULL, '2019-10-11', '300', ''),
(8, NULL, NULL, '2019-10-11', '300', ''),
(9, NULL, NULL, '2019-10-11', '300', ''),
(10, NULL, NULL, '2019-10-12', '33', 'teste'),
(11, 3, 1, NULL, NULL, NULL),
(12, 3, 1, '2019-10-12', '20', 'Teste'),
(13, 3, 1, '2019-10-12', '2000', 'teste'),
(14, 3, 1, '2019-10-12', '20000000', 'TESTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`) VALUES
(1, 'AVCB'),
(2, 'Uso capião'),
(3, 'TESTE');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `telefone`, `id_clie`) VALUES
(1, 321123, 1),
(2, 3345443, 1),
(3, 3321123, 1),
(4, 21453698, 2),
(5, 3321, 3),
(6, 32313, 3),
(7, 32131, 3),
(8, 0, 4),
(9, 0, 4),
(10, 0, 4);

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
