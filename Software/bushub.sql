-- --------------------------------------------------------
-- Servidor:                     Carmine
-- Versão do servidor:           5.7.33 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para bushub
CREATE DATABASE IF NOT EXISTS `bushub` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bushub`;

-- Copiando estrutura para tabela bushub.tb01_frota
CREATE TABLE IF NOT EXISTS `tb01_frota` (
  `tb01_cod_frota` int(11) NOT NULL DEFAULT '0',
  `tb01_descricao` varchar(50) NOT NULL DEFAULT '0',
  `tb01_chassis` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tb01_cod_frota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb01_frota: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb02_linhas
CREATE TABLE IF NOT EXISTS `tb02_linhas` (
  `tb02_cod_linha` int(11) NOT NULL DEFAULT '0',
  `tb02_cod_frota` int(11) NOT NULL DEFAULT '0',
  `tb02_ponto_destino` int(11) NOT NULL DEFAULT '0',
  `tb02_descricao` varchar(300) NOT NULL DEFAULT '0',
  `tb02_ponto_origem` int(11) NOT NULL DEFAULT '0',
  `tb02_cod_motorista` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tb02_cod_linha`),
  KEY `tb02_cod_frota` (`tb02_cod_frota`),
  KEY `tb02_cod_motorista` (`tb02_cod_motorista`),
  KEY `tb02_ponto_destino` (`tb02_ponto_destino`),
  KEY `tb02_ponto_origem` (`tb02_ponto_origem`),
  CONSTRAINT `tb02_cod_frota` FOREIGN KEY (`tb02_cod_frota`) REFERENCES `tb01_frota` (`tb01_cod_frota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb02_cod_motorista` FOREIGN KEY (`tb02_cod_motorista`) REFERENCES `tb06_motoristas` (`tb06_cod_motoristas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb02_ponto_destino` FOREIGN KEY (`tb02_ponto_destino`) REFERENCES `tb03_pontos` (`tb03_cod_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb02_ponto_origem` FOREIGN KEY (`tb02_ponto_origem`) REFERENCES `tb03_pontos` (`tb03_cod_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb02_linhas: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb03_pontos
CREATE TABLE IF NOT EXISTS `tb03_pontos` (
  `tb03_cod_ponto` int(11) NOT NULL DEFAULT '0',
  `tb03_referencia` varchar(50) DEFAULT NULL,
  `tb03_descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tb03_cod_ponto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb03_pontos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb04_itinerario
CREATE TABLE IF NOT EXISTS `tb04_itinerario` (
  `tb04_cod_ponto` int(11) NOT NULL DEFAULT '0',
  `tb04_cod_linha` int(11) NOT NULL DEFAULT '0',
  `tb04_sequencia` int(11) DEFAULT NULL,
  `tb04_cod_tipo` int(11) DEFAULT NULL,
  `tb04_horario` time DEFAULT NULL,
  `tb04_horario_fds` time DEFAULT NULL,
  PRIMARY KEY (`tb04_cod_linha`,`tb04_cod_ponto`) USING BTREE,
  KEY `tb04_cod_ponto` (`tb04_cod_ponto`),
  KEY `tb04_cod_tipo` (`tb04_cod_tipo`),
  CONSTRAINT `tb04_cod_linha` FOREIGN KEY (`tb04_cod_linha`) REFERENCES `tb02_linhas` (`tb02_cod_linha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb04_cod_ponto` FOREIGN KEY (`tb04_cod_ponto`) REFERENCES `tb03_pontos` (`tb03_cod_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb04_cod_tipo` FOREIGN KEY (`tb04_cod_tipo`) REFERENCES `tb05_tipos` (`tb05_cod_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb04_itinerario: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb05_tipos
CREATE TABLE IF NOT EXISTS `tb05_tipos` (
  `tb05_cod_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tb05_descricao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`tb05_cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb05_tipos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb06_motoristas
CREATE TABLE IF NOT EXISTS `tb06_motoristas` (
  `tb06_cod_motoristas` int(11) NOT NULL AUTO_INCREMENT,
  `tb06_endereco` varchar(300) DEFAULT NULL,
  `tb06_nome` varchar(300) DEFAULT NULL,
  `tb06_cpf` int(11) DEFAULT NULL,
  `tb06_num_carteira` int(20) DEFAULT NULL,
  PRIMARY KEY (`tb06_cod_motoristas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb06_motoristas: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bushub.tb07_usuario
CREATE TABLE IF NOT EXISTS `tb07_usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bushub.tb07_usuario: ~15 rows (aproximadamente)
INSERT INTO `tb07_usuario` (`ID`, `Nome`, `email`, `telefone`, `senha`) VALUES
	(1, 'Carolina Barros', 'CarolinaBarros@dayrep.com', '(47) 8813-9595', 12345),
	(2, 'Beatrice Cunha ', 'BeatriceCunha@jourrapide.com', '(14) 9843-7708', 56789),
	(3, 'Gabriel Melo', 'GabrielMelo@jourrapide.com', '(19) 9814-3974', 28475),
	(4, 'Livia Alves', 'LiviaAlves@rhyta.com', '(79) 4729-5140', 58424),
	(5, 'Eduardo Azevedo', 'EduardoAzevedo@teleworm.us', '(11) 5843-9121', 93043),
	(6, 'Ryan Silva', 'RyanSilva@teleworm.us', '(31) 6176-6152\r\n', 50251),
	(7, 'Rodrigo Lima', 'RodrigoLima@jourrapide.com', '(51) 4674-4591', 26872),
	(8, 'Leonardo Cavalcanti', 'LeonardoCavalcanti@rhyta.com', '(48) 9118-3325', 86432),
	(9, 'Larissa Almeida', 'LarissaAlmeida@teleworm.us', '(38) 3584-6382', 73849),
	(10, 'Diogo Gomes', 'DiogoGomes@teleworm.us', '(41) 5209-7488', 15325),
	(11, 'Gustavo Martins', 'GustavoMartins@dayrep.com', '(16) 7356-6366', 23168),
	(12, 'Vinícius Alves', 'ViniciusAlves@jourrapide.com', '(15) 5912-6212', 81016),
	(13, 'Marcos Santos', 'MarcosSantos@dayrep.com', '(27) 3106-7853', 27169),
	(14, 'Júlio Dias', 'JulioDias@rhyta.com', '(34) 7612-2690', 83462),
	(15, 'Samuel Barbosa', 'SamuelBarbosa@rhyta.com', '(32) 6613-4187', 93645);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
