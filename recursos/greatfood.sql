SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `greatfood` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `greatfood`;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `id_municipio` varchar(4) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_clientes_municipios` (`id_municipio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE IF NOT EXISTS `detallepedido` (
  `cod_detallepedido` int(45) NOT NULL,
  `cod_pedido` int(45) NOT NULL,
  `cod_plato` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`cod_detallepedido`),
  KEY `fk_detallepedido_platos` (`cod_plato`),
  KEY `fk_detallepedido_pedidos` (`cod_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `dni` varchar(9) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `municipios`;
CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` varchar(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_repartidor_encargado` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `fk_municipios_repartidores` (`id_repartidor_encargado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `municipios` (`id_municipio`, `nombre`, `id_repartidor_encargado`) VALUES
('M001', 'Ajalvir', 'R0002'),
('M002', 'Chapinería', 'R0001'),
('M003', 'Leganés', 'R0003'),
('M004', 'Perales de Tajuña', 'R0004'),
('M005', 'Madrid', 'R0003'),
('M006', 'Talamanca de Jarama', 'R0001'),
('M007', 'Tres Cantos', 'R0004'),
('M008', 'Getafe', 'R0005'),
('M009', 'Villarejo de Salvanés', 'R0005');

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `dni` varchar(9) NOT NULL,
  `cod_pedido` int(45) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `precio_total` double DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `fk_pedidos_clientes` (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `platos`;
CREATE TABLE IF NOT EXISTS `platos` (
  `cod_plato` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`cod_plato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `platos` (`cod_plato`, `nombre`, `descripcion`, `precio`) VALUES
('1', 'Pizza Peperoni', 'Pizza de peperoni', 10),
('2', 'Pizza 4 quesos', 'Pizza de cuatro quesos', 11),
('3', 'Pizza Barbacoa', 'Pizza de barbacoa', 15),
('4', 'Pizza Queso De Cabra', 'Pizza de queso de cabra', 13),
('5', 'Pizza Queso De Cabramelizada', 'Pizza de queso de cabra con cebolla caramelizada', 12),
('6', 'Pizza Jamon Y Queso', 'Pizza de jamon y queso', 9),
('7', 'Pizza Pepperoni', 'Pizza de pepperoni', 16),
('8', 'Arroz 3 delicias', 'Arroz con huevo guisantes y jamon', 5),
('9', 'Arroz con calamares en su tinta', '', 10);

DROP TABLE IF EXISTS `repartidores`;
CREATE TABLE IF NOT EXISTS `repartidores` (
  `id_repartidor` varchar(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `salario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_repartidor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `repartidores` (`id_repartidor`, `nombre`, `apellidos`, `salario`) VALUES
('R0001', 'David', 'Perez Serrano', '1400'),
('R0002', 'Ana', 'Lopez Banana', '1600'),
('R0003', 'Elisa', 'Sanchez Romero', '1600'),
('R0004', 'Jose', 'Rull Sanchez', '1800'),
('R0005', 'Maria', 'Castejon Ruiz', '1400');
COMMIT;
