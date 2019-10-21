-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Out-2019 às 12:22
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
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `razao` varchar(50) DEFAULT NULL,
  `representante` varchar(50) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `id_parc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parc` (`id_parc`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `pessoa`, `nome`, `cpf`, `rg`, `razao`, `representante`, `sexo`, `observacao`, `id_parc`) VALUES
(1, 'Fisica', 'Thiago', '321123321', '321122321', '0', 'João', 'M', '        Teste 1        ', 1),
(2, 'Fisica', 'Gabriel', '333211231', '3321123', '0', 'aaa', 'M', '  Tese', 1),
(3, 'Fisica', 'Josimeire', '332123', '33212123', '0', 'Teste', 'M', '  tesste    ', 1),
(4, 'Fisica', '', '0', '0', '', '', 'M', '', 1),
(5, 'Fisica', 'Teste final', '32112321', '32132131', '0', '', 'M', ' sarerasda ', 3),
(6, 'Fisica', 'Gabriel', '3231321', '396969698', '0', '3231', '', 'teste  teste', 2),
(7, 'Juridica', 'teste', '0', '0', '', '', '', '', 1),
(8, 'Fisica', 'Lucas', '23411129382', '322133450', '', '', '', 'teste', 3),
(9, 'Fisica', 'Lucas', '321312', '323231', '', '', NULL, 'teste', 2),
(10, 'Fisica', 'Gabriel Teste2', '32312312', '323211', '0', '', NULL, '  testestesteste  ', 1),
(11, 'Juridica', 'gabriel', '33332213', '0', '', '', NULL, '', 1),
(12, 'Juridica', 'Will', '323121', '32131312', '324241', 'teste', NULL, 'testesteste', 3),
(13, 'Juridica', 'Bia', '321321', '312321', '321312', 'teste', NULL, 'fhasuidhsuia', 2),
(14, 'Juridica', 'josi', '321321', '321312', '32321', '', NULL, '', 1),
(15, 'Fisica', 'Thiago', '32131', '32312', '', '', NULL, 'dsadsaer', 4),
(16, 'Fisica', 'jhghfg', '0', '0', '', '', NULL, '', 1),
(17, 'Fisica', 'Teste OPE Final', '321312', '321312', '0', '', NULL, '        ', 1),
(18, 'Fisica', '', '0', '0', '', '', NULL, '', 1),
(19, 'Fisica', '', '0', '0', '', '', NULL, '', 1),
(20, 'Fisica', '', '0', '0', '', '', NULL, '', 1),
(21, 'Fisica', '', '0', '0', '', '', NULL, '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`ID`, `ID_Cliente`, `ID_Servico`, `Detalhes`, `PRAZO`, `Valor`, `qnt_parcela`, `VENCIMENTO`) VALUES
(1, 1, 2, ' tesste ', '2019-10-10', '5000', '5', '5'),
(2, 2, 2, '   dfdfsfsd   ', '2019-10-10', '5000', '10', '13'),
(3, 1, 1, '  ', '2019-10-13', '22222', '4', '0'),
(4, 5, 3, ' teste final ', '2019-10-13', '10000', '5', '17'),
(5, 1, 1, '          ', '2019-10-15', '5000', '1', '0'),
(6, 1, 1, '      ', '2019-10-09', '333', '1', '0'),
(7, 1, 1, '  ', '2019-10-15', '555', '1', '10'),
(8, 1, 1, '  ', NULL, '2000', '2', '0'),
(9, 8, 3, 'sadasdsa  ', '2019-10-30', '3900', '2', '13'),
(10, 15, 1, ' teste ', '2019-10-16', '3000', '2', '18');

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
  `VALOR` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_conti` (`ID_CONT`),
  KEY `fk_cli_desp` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesa_proj`
--

INSERT INTO `despesa_proj` (`ID`, `ID_CONT`, `id_cli`, `DATA`, `VALOR`, `descricao`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(5, NULL, NULL, '2019-10-11', '300.00', 'teste'),
(6, 3, 1, NULL, NULL, NULL),
(10, 4, 5, NULL, NULL, NULL),
(11, 5, 1, NULL, NULL, NULL),
(12, 4, 5, '2019-10-13', '25.00', 'Estacionamento'),
(13, NULL, NULL, '2019-10-13', '33.00', 'teste'),
(14, NULL, NULL, '2019-10-13', '22.00', 'teste'),
(15, NULL, NULL, NULL, '1.00', 'teste'),
(16, NULL, NULL, '2019-10-23', '9.00', 'teste'),
(17, NULL, NULL, '2019-10-24', '2.00', 'teste'),
(18, 6, 1, NULL, NULL, NULL),
(19, 7, 1, NULL, NULL, NULL),
(20, 8, 1, NULL, NULL, NULL),
(21, 9, 8, NULL, NULL, NULL),
(22, 3, 1, '2019-10-14', '100000.00', 'custo extra'),
(23, NULL, NULL, '2019-10-04', '1500.00', 'Salario funcionario'),
(24, 10, 15, NULL, NULL, NULL),
(25, NULL, NULL, '2019-10-16', '3000.00', 'Aluguel');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `email`, `id_cli`) VALUES
(1, 'thiago@teste.com.br', 1),
(2, 'gabriel@teste2.com.br', 2),
(3, 'rosi@teste.com.br', 3),
(4, '', 4),
(5, 'teste@teste.com.br', 5),
(6, '', 6),
(7, '', 7),
(8, 'Teste@lucas.com.br', 8),
(9, '', 9),
(10, 'teste@te.com.br', 10),
(11, '', 11),
(12, '', 12),
(13, '', 13),
(14, '', 14),
(15, 'teste@testec.combr', 15),
(16, '', 16),
(17, '', 17),
(18, '', 18),
(19, '', 19),
(20, '', 20),
(21, '', 21);

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
(7, 'Obra', 0, '', 0, '', '', 'UF', 1, 3),
(8, 'Residencial', 220202, 'Rua Teste', 321, 'adasdas', 'são Paulo', 'SP', 5, NULL),
(9, 'Correspondencia', 321321, 'tesate123', 321, 'tedsada', 'Rio de Janeiro', 'RJ', 5, NULL),
(10, 'Obra', 22222, 'Rua teste', 312, '1B', 'São Paulo', 'SP', 5, 4),
(11, 'Obra', 0, '', 0, '', '', 'UF', 1, 5),
(12, 'Obra', 0, '', 0, '', '', 'UF', 1, 6),
(13, 'Obra', 0, '', 0, '', '', 'UF', 1, 7),
(14, 'Residencial', 321, '', 0, '', 'São paulo', 'SP', 6, NULL),
(15, 'Obra', 0, '', 0, '', 'teste', 'PI', 1, 8),
(16, 'Residencial', 0, '', 0, '', '', 'UF', 7, NULL),
(17, 'Residencial', 0, '', 0, '', '', 'UF', 9, NULL),
(18, 'Residencial', 33333, 'Rua Teste', 555, 'Ap 321', 'São paulo', 'SP', 10, NULL),
(19, 'Residencial', 0, '', 0, '', '', 'UF', 11, NULL),
(20, 'Residencial', 0, '', 0, '', '', 'UF', 12, NULL),
(21, 'Residencial', 92929292, 'raasrea13', 2321, '3231', 'soa paulo', 'SP', 13, NULL),
(22, 'Residencial', 32321321, '', 0, '', '', 'UF', 14, NULL),
(23, 'Correspondencia', 32131, 'tresste', 1321, 'testes', 'São Paulo', 'SC', 14, NULL),
(24, 'Residencial', 32131, '', 0, '', '', 'UF', 16, NULL),
(25, 'Correspondencia', 21321, '', 0, '', '', 'UF', 16, NULL),
(26, 'Residencial', 23213, '32131', 0, '', '', 'UF', 17, NULL),
(27, 'Correspondencia', 32312, '2321321', 0, '', '', 'UF', 17, NULL),
(28, 'Obra', 2002213, 'rasdadas', 321, 'ap 92', 'sosoaoa', 'RJ', 8, 9),
(29, 'Obra', 0, '', 0, '', '', 'UF', 15, 10),
(30, 'Residencial', 0, '', 0, '', '', 'UF', 18, NULL),
(31, 'Residencial', 0, '', 0, '', '', 'UF', 19, NULL),
(32, 'Residencial', 0, '', 0, '', '', 'UF', 20, NULL),
(33, 'Correspondencia', 0, '', 0, '', '', 'UF', 20, NULL),
(34, 'Residencial', 0, '', 0, '', '', 'UF', 21, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID`, `NOME`, `CPF`, `EMAIL`, `CELULAR`) VALUES
(1, 'Admin', '123', NULL, NULL),
(13, 'Josimeire', '321', 'teste@teste.com.br', '321321'),
(14, 'Vanderson', '12', 'teste@vanderson.cm.br', '1199992832'),
(15, 'Thiago', '456', 'thiago@teste.com', '11999999999'),
(16, 'Bia', '321', 'teste@te.com.br', '1199999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horas`
--

DROP TABLE IF EXISTS `horas`;
CREATE TABLE IF NOT EXISTS `horas` (
  `contrato` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `hora_inicial` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `horas`
--

INSERT INTO `horas` (`contrato`, `data`, `hora_inicial`, `hora_final`, `id_func`) VALUES
(1, '2019-10-15', '11:00:00', '15:30:00', 1),
(2, '2019-10-16', '14:00:00', '22:00:00', 15),
(3, '2019-10-15', '10:00:00', '15:00:00', 1),
(4, '2019-10-23', '11:00:00', '15:00:00', 16);

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
(6, '0'),
(13, '321'),
(14, '12'),
(15, '456'),
(16, '321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
CREATE TABLE IF NOT EXISTS `parceiro` (
  `id_parc` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_parc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parc`, `nome`) VALUES
(1, 'Pacheco'),
(2, 'Vanderson'),
(3, 'Takai'),
(4, 'TESTE'),
(5, 'Lucas'),
(6, 'OPE');

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
  `VALOR` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_cont` (`ID_CONT`),
  KEY `fk_cli_receita` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita_proj`
--

INSERT INTO `receita_proj` (`ID`, `ID_CONT`, `id_cli`, `DATA`, `VALOR`, `descricao`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(5, NULL, NULL, '2019-10-11', '300.00', 'teste'),
(6, NULL, NULL, '2019-10-11', '333.00', ''),
(9, NULL, NULL, '2019-10-11', '300.00', ''),
(10, NULL, NULL, '2019-10-12', '33.00', 'teste'),
(11, 3, 1, NULL, NULL, NULL),
(27, 4, 5, NULL, NULL, NULL),
(28, 4, 5, '2019-10-13', '2001.00', 'Primeira Parcela'),
(29, 5, 1, NULL, NULL, NULL),
(31, NULL, NULL, '2019-10-13', '22.00', 'teste'),
(32, NULL, NULL, '2019-10-13', '22.00', 'kkkk'),
(33, NULL, NULL, '2019-10-24', '1.00', 'teste'),
(35, 6, 1, NULL, NULL, NULL),
(36, 7, 1, NULL, NULL, NULL),
(37, 1, 1, '2019-10-14', '222.00', 'teste'),
(38, 8, 1, NULL, NULL, NULL),
(39, 4, 5, '2019-10-14', '2000.00', 'segunda parcela'),
(40, NULL, NULL, '2019-10-16', '222.00', 'teste'),
(41, 9, 8, NULL, NULL, NULL),
(43, 3, 1, '2019-10-17', '3000.00', 'uma parcela'),
(44, 3, 1, '2019-10-09', '5556.00', '1 parcela'),
(45, 3, 1, '2019-10-17', '5556.00', 'teste'),
(46, 3, 1, '2019-10-17', '555.50', 'teste'),
(47, NULL, NULL, '2019-10-10', '1700.00', 'Loteria'),
(48, NULL, NULL, '2019-10-04', '16000.00', 'loteria'),
(49, 10, 15, NULL, NULL, NULL),
(50, 2, 2, '2019-10-22', '3000.00', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`) VALUES
(1, 'AVCB'),
(2, 'Uso capião'),
(3, 'TESTE'),
(4, 'Planta'),
(5, 'Projeto');

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

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
(10, 0, 4),
(11, 323213, 5),
(12, 321312, 5),
(13, 32131, 5),
(14, 0, 6),
(15, 0, 6),
(16, 0, 6),
(17, 0, 7),
(18, 0, 7),
(19, 0, 7),
(20, 3323232, 8),
(21, 0, 9),
(22, 0, 9),
(23, 0, 9),
(24, 32313123, 10),
(25, 343435434, 10),
(26, 321312312, 10),
(27, 0, 11),
(28, 0, 11),
(29, 0, 11),
(30, 0, 12),
(31, 0, 12),
(32, 0, 12),
(33, 0, 13),
(34, 0, 13),
(35, 0, 13),
(36, 0, 14),
(37, 0, 14),
(38, 0, 14),
(39, 0, 16),
(40, 0, 16),
(41, 0, 16),
(42, 3323232, 17),
(43, 0, 17),
(44, 0, 17),
(45, 0, 18),
(46, 0, 18),
(47, 0, 18),
(48, 0, 19),
(49, 0, 19),
(50, 0, 19),
(51, 0, 20),
(52, 0, 20),
(53, 0, 20),
(54, 0, 21),
(55, 0, 21),
(56, 0, 21);

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
