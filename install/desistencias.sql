SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `desistencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo_locacao` int(11) NOT NULL,
  `id_usuario_logado` int(11) NOT NULL,
  `nome_socio` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cpf_associado` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `valor_credito` double(10,2) NOT NULL,
  `data_desistencia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacoes` text COLLATE utf8_unicode_ci NOT NULL,
  `status_desistencia` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela que armazenará desistências em um período' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
