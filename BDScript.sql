-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_drenot
CREATE DATABASE IF NOT EXISTS `db_drenot` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_drenot`;

-- Volcando estructura para tabla db_drenot.tbl_documento
CREATE TABLE IF NOT EXISTS `tbl_documento` (
  `IdDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `IdtipoDocumento` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nroDocumento` varchar(150) DEFAULT NULL,
  `remitente` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `interesado` varchar(150) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `prioridad` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_drenot.tbl_documento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_documento` DISABLE KEYS */;
INSERT IGNORE INTO `tbl_documento` (`IdDocumento`, `IdtipoDocumento`, `IdUsuario`, `fecha`, `nroDocumento`, `remitente`, `destino`, `interesado`, `direccion`, `telefono`, `observaciones`, `prioridad`, `estado`) VALUES
	(1, 1, NULL, '2021-03-17', '123123', 'qwdqwdqd', NULL, NULL, 'qwdqwdqdw', 'dqwwd', 'dqwqdqwd', NULL, 1),
	(2, 1, NULL, '2021-03-17', 'dqw', 'qwdqwdwdq', NULL, NULL, 'dqwqwdqdw', 'qwd', 'qwdqwd', NULL, 1),
	(3, 1, 1, '2021-03-17', '956823', 'PERU', NULL, NULL, 'DIRECCION', '98745632', 'WEW', NULL, 1),
	(4, 2, 1, '2021-03-17', '456', 'Remi', 'Final', 'Poquito', 'Direc', '918468770', 'Ninguna', '1', 2);
/*!40000 ALTER TABLE `tbl_documento` ENABLE KEYS */;

-- Volcando estructura para tabla db_drenot.tbl_tipo_documento
CREATE TABLE IF NOT EXISTS `tbl_tipo_documento` (
  `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_drenot.tbl_tipo_documento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tipo_documento` DISABLE KEYS */;
INSERT IGNORE INTO `tbl_tipo_documento` (`IdTipoDocumento`, `nombre`, `estado`) VALUES
	(1, 'Doc 1', 1),
	(2, 'Doc 2', 1);
/*!40000 ALTER TABLE `tbl_tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla db_drenot.tbl_usuario
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` int(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_drenot.tbl_usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT IGNORE INTO `tbl_usuario` (`IdUsuario`, `tipoUsuario`, `email`, `password`, `telefono`, `estado`) VALUES
	(1, 1, 'christian@gmail.com', '$2y$10$04aodIYNyIkMHta22FaB8OmpVlucC5h6NbWzd4Ov8qSWqFWxF84cu', '918468770', 1),
	(3, 1, 'demo@gmail.com', '$2y$10$Lcuc0ULJ7VscSeIT9njWY.MXtbvn/gGhshxuHlNSzyKE6FQFuAHjy', '918468770', 1),
	(4, 0, 'Javier@gmail.com', '$2y$10$lVQLUbcR77EZRB4cZLYrfur5N4q7mmiDhz7e/3FAo0ON8IGUSHble', '98745632', 1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
