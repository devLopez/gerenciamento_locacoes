-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 18-Fev-2015 às 12:56
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
CREATE DATABASE IF NOT EXISTS `locacao`;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
