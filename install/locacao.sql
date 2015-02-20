-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 18-Fev-2015 às 14:21
-- Versão do servidor: 5.5.41-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `locacao`
--
CREATE DATABASE `locacao`
-- --------------------------------------------------------

--
-- Estrutura da tabela `alugueis_barracas`
--

CREATE TABLE IF NOT EXISTS `alugueis_barracas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo_aluguel` int(11) NOT NULL,
  `id_barraca` int(11) NOT NULL,
  `nome_associado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf_associado` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_associado` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodo_estadia` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `barracas`
--

CREATE TABLE IF NOT EXISTS `barracas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_barraca` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_valor` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `barracas`
--

INSERT INTO `barracas` (`id`, `nome_barraca`, `id_valor`, `status`) VALUES
(1, 'Barraca Aberta Nº 41', 1, 1),
(2, 'Barraca Aberta Nº 42', 1, 1),
(3, 'Barraca Aberta Nº 43', 1, 1),
(4, 'Barraca Aberta Nº 44', 1, 1),
(5, 'Barraca Aberta Nº 45', 1, 1),
(6, 'Barraca Aberta Nº 46', 1, 1),
(7, 'Barraca Aberta Nº 47', 1, 1),
(8, 'Barraca Aberta Nº 48', 1, 1),
(9, 'Barraca Aberta Nº 48', 1, 1),
(10, 'Barraca Aberta Nº 49', 1, 1),
(11, 'Barraca Aberta Nº 50', 1, 0),
(12, 'Barraca Aberta Nº 51', 1, 1),
(13, 'Barraca Aberta Nº 52', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidados`
--

CREATE TABLE IF NOT EXISTS `convidados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_locacao_externa` int(11) NOT NULL,
  `nome_convidado` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `convidados`
--

INSERT INTO `convidados` (`id`, `id_locacao_externa`, `nome_convidado`, `cpf`, `status`) VALUES
(4, 6, 'Norma Aparecida Soares da Cruz Lopes', '046.115.566-46', 1),
(3, 6, 'Matheus Lopes Santos', '101.384.146-88', 1),
(5, 6, 'Maria Ismar Lopes Santos', '111.222.333-44', 1),
(6, 6, 'Isabella Lopes Santos', '222.333.444-55', 1),
(7, 6, 'Bosta da Silva', '123.456.789-09', 0),
(8, 8, 'Matheus Lopes ', '101.384.146-88', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE IF NOT EXISTS `emprestimos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tomador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `localizacao_tomador` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `data_emprestimo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_item_esportivo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `nome_tomador`, `localizacao_tomador`, `data_emprestimo`, `id_item_esportivo`, `status`) VALUES
(1, 'Matheus Lopes Santos', 'Barraca Apartamento 01', '2014-11-26 13:10:24', 1, 0),
(2, 'Matheus Lopes Santos', 'Canto do Sabiá 10', '2014-11-27 12:40:45', 4, 0),
(3, 'Norma Aparecida Soares da Cruz Lopes', 'Barraca 02 Quartos 23', '2014-11-27 15:17:14', 3, 0),
(4, 'León Soares da Cruz', 'Barraca 2 Quartos 23', '2014-11-27 15:19:07', 1, 0),
(5, 'Isabella Lopes Santos', 'Barraca Apartamento 2', '2014-11-27 15:28:42', 3, 0),
(6, 'Matheus Lopes Santis', 'Barraca Apartamento 13', '2015-02-02 19:27:06', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_usuarios`
--

CREATE TABLE IF NOT EXISTS `grupos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_grupo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `grupos_usuarios`
--

INSERT INTO `grupos_usuarios` (`id`, `nome_grupo`) VALUES
(1, 'administradores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_esportivos`
--

CREATE TABLE IF NOT EXISTS `itens_esportivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `itens_esportivos`
--

INSERT INTO `itens_esportivos` (`id`, `item`) VALUES
(1, 'Bola de Futsal'),
(2, 'Tabuleiro de Damas'),
(3, 'Tabuleiro de Xadrez'),
(4, 'Bola de Campo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao_externa`
--

CREATE TABLE IF NOT EXISTS `locacao_externa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `responsavel` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_cnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `espaco_necessario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `locacao_externa`
--

INSERT INTO `locacao_externa` (`id`, `instituicao`, `responsavel`, `cpf_cnpj`, `telefone`, `email`, `data`, `espaco_necessario`, `status`) VALUES
(1, '', '', '', '', '', '0000-00-00', '', 0),
(7, 'Facomp', 'Luis Sorriso Pires', '22.686.661/0001-55', '(38)9183-9930', 'fale_com_lopez@hotmail.com', '2014-11-17', 'Sauna', 1),
(6, 'II Igreja de Deus', 'Fabrício', '101.384.146-88', '(38)9183-9930', 'fale_com_lopez@hotmail.com', '2014-11-13', 'Praça das mangueiras', 1),
(8, 'E.E Dr. Carlos Albuquerque', 'Matheus Lopes Santos', '101.384.146-88', '(38)9183-9930', 'fale_com_lopez@hotmail.com', '2014-11-20', 'Todos os espaços possíveis do clube', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `operacao` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `horario`, `usuario`, `operacao`) VALUES
(1, '2014-11-12 16:17:48', 'Matheus Lopes Santos', 'inserção'),
(2, '2014-11-12 16:22:58', 'Matheus Lopes Santos', 'inserção (locação externa)-> II Igreja de Deus - Fabrício - 13/11/2014'),
(3, '2014-11-12 17:05:18', 'Matheus Lopes Santos', 'exclusão (locação externa)-> ID REGISTRO -> 6'),
(4, '2014-11-17 16:40:01', 'Matheus Lopes Santos', 'alteração (locação externa) -> ID REGISTRO -> 1'),
(5, '2014-11-17 16:40:45', 'Matheus Lopes Santos', 'inserção (locação externa)-> Facomp - a - 17/11/2014'),
(6, '2014-11-17 16:40:57', 'Matheus Lopes Santos', 'exclusão (locação externa)-> ID REGISTRO -> 1'),
(7, '2014-11-17 16:41:00', 'Matheus Lopes Santos', 'exclusão (locação externa)-> ID REGISTRO -> 7'),
(8, '2014-11-17 16:44:36', 'Matheus Lopes Santos', 'inserção (locação externa)-> E.E Dr. Carlos Albuquerque - Matheus Lopes Santos - 17/11/2014'),
(9, '2014-11-17 16:48:43', 'Matheus Lopes Santos', 'alteração (locação externa) -> ID REGISTRO -> 8'),
(10, '2014-11-17 16:57:38', 'Matheus Lopes Santos', 'alteração (locação externa) -> ID REGISTRO -> 8'),
(11, '2014-11-17 17:09:13', 'Matheus Lopes Santos', 'alteração (locação externa) -> ID REGISTRO -> 7'),
(12, '2014-11-17 17:09:58', 'Matheus Lopes Santos', 'alteração (locação externa) -> ID REGISTRO -> 6'),
(17, '2014-11-19 18:44:07', 'Matheus Lopes Santos', 'Update [TABELA: (convidados)][ID REGISTRO: (6)'),
(16, '2014-11-19 18:43:56', 'Matheus Lopes Santos', 'Update [TABELA: (convidados)][ID REGISTRO: (6)'),
(15, '2014-11-19 17:12:54', 'Matheus Lopes Santos', 'exclusão [TABELA: (convidados)][ID REGISTRO: (7)'),
(18, '2014-11-19 18:51:22', 'Matheus Lopes Santos', 'Update [TABELA: (convidados)][ID REGISTRO: (5)'),
(19, '2014-11-27 15:11:53', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (2)'),
(20, '2014-11-27 15:38:10', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (3)'),
(21, '2014-11-28 16:36:25', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (4)'),
(22, '2014-11-28 16:37:49', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (5)'),
(23, '2014-12-03 12:29:12', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (5)'),
(24, '2014-12-03 12:31:29', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (1)'),
(25, '2014-12-03 15:32:32', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (1)'),
(26, '2014-12-08 17:08:34', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (1)'),
(27, '2015-02-04 17:52:16', 'Matheus Lopes Santos', 'alteração [TABELA: (emprestimos)][ID REGISTRO: (6)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacoes`
--

CREATE TABLE IF NOT EXISTS `observacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_locacao` int(11) NOT NULL,
  `observacao` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_locacao`
--

CREATE TABLE IF NOT EXISTS `periodo_locacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes_locacao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ano_locacao` int(4) NOT NULL,
  `periodo_locacao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diretor_semana` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `periodo_locacao`
--

INSERT INTO `periodo_locacao` (`id`, `mes_locacao`, `ano_locacao`, `periodo_locacao`, `diretor_semana`) VALUES
(1, 'Fevereiro', 2015, '02/08', 'José Fernandes da Fonseca Neto'),
(2, 'Fevereiro', 2015, '10/15', 'José Edson da Silva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `id_grupo`, `id_usuario`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `e_mail`, `usuario`, `senha`, `status`) VALUES
(1, 'Matheus Lopes Santos', 'fale_com_lopez@hotmail.com', 'matheusl', '$2y$10$MmHECXuWGTMD4kb/Xy9GKOrV4gdS5Qwe1eI9fxvjzSbsKz/OIE3sm', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valores`
--

CREATE TABLE IF NOT EXISTS `valores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_diaria` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `valores`
--

INSERT INTO `valores` (`id`, `valor_diaria`) VALUES
(1, 0.00),
(2, 15.00),
(3, 60.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
