-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.37-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para locadora
CREATE DATABASE IF NOT EXISTS `locadora` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `locadora`;

-- Copiando estrutura para tabela locadora.artista
CREATE TABLE IF NOT EXISTS `artista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.artista: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
INSERT INTO `artista` (`id`, `nome`) VALUES
	(1, 'Artista 1'),
	(2, 'Artista 2');
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `bonus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `celular`, `endereco`, `data_nascimento`, `bonus`) VALUES
	(1, 'Cliente 1', '09021313', '99998888', '88887777', 'Rua do Joao', '2018-10-19', 0),
	(2, 'Cliente 2', '193918201', '98398932', '28193189', 'Rua do pedro', '2018-10-19', 0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.emprestimo
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` datetime DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`),
  CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.emprestimo: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
INSERT INTO `emprestimo` (`id`, `cliente_id`, `funcionario_id`, `data_emprestimo`, `data_devolucao`, `valor`, `situacao`) VALUES
	(20, 1, 1, '2019-02-20', '2010-02-11 00:00:00', 10, 1);
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.emprestimo_titulo
CREATE TABLE IF NOT EXISTS `emprestimo_titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emprestimo_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emprestimo_id` (`emprestimo_id`),
  KEY `titulo_id` (`titulo_id`),
  CONSTRAINT `emprestimo_titulo_ibfk_1` FOREIGN KEY (`emprestimo_id`) REFERENCES `emprestimo` (`id`),
  CONSTRAINT `emprestimo_titulo_ibfk_2` FOREIGN KEY (`titulo_id`) REFERENCES `titulo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.emprestimo_titulo: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `emprestimo_titulo` DISABLE KEYS */;
INSERT INTO `emprestimo_titulo` (`id`, `emprestimo_id`, `titulo_id`) VALUES
	(26, 20, 1),
	(27, 20, 2);
/*!40000 ALTER TABLE `emprestimo_titulo` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `telefone`, `celular`, `endereco`, `data_admissao`, `data_demissao`) VALUES
	(1, 'Funcionario 1', '10840298184', '99998888', '78777888', 'Rua do funci 1', '2018-10-19', '2018-10-19'),
	(2, 'Funcionário 2', '10999823309', '99999888', '83978882', 'Rua funci 2', '2018-11-20', '2018-11-20');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `data_reserva` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `situação` enum('ativa','encerrada') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.reserva: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `cliente_id`, `funcionario_id`, `data_reserva`, `data_baixa`, `situação`) VALUES
	(1, 1, 1, '2018-11-23', '2018-11-23', 'ativa');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.reserva_titulo
CREATE TABLE IF NOT EXISTS `reserva_titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reserva_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reserva_id` (`reserva_id`),
  KEY `titulo_id` (`titulo_id`),
  CONSTRAINT `reserva_titulo_ibfk_1` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`),
  CONSTRAINT `reserva_titulo_ibfk_2` FOREIGN KEY (`titulo_id`) REFERENCES `titulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.reserva_titulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva_titulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva_titulo` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.titulo
CREATE TABLE IF NOT EXISTS `titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `artista_id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ano_lancamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `quantidade_disponivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `artista_id` (`artista_id`),
  CONSTRAINT `titulo_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.titulo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `titulo` DISABLE KEYS */;
INSERT INTO `titulo` (`id`, `titulo`, `artista_id`, `descricao`, `ano_lancamento`, `quantidade`, `quantidade_disponivel`) VALUES
	(1, 'Titulo 1', 1, 'Descrição do titulo 1', '2018-11-20', 10, 9),
	(2, 'Título 2', 2, 'Descrição do título 2', '2018-09-21', 10, 9);
/*!40000 ALTER TABLE `titulo` ENABLE KEYS */;

-- Copiando estrutura para tabela locadora.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela locadora.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `username`, `password`, `nivel`, `cliente_id`, `funcionario_id`) VALUES
	(1, 'pedro', '12', 2, 2, NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
