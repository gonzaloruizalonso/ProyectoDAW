
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `repartidores`;
CREATE TABLE IF NOT EXISTS `repartidores` (
  `id_repartidor` varchar(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `salario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_repartidor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `municipios`;
CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` varchar(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_repartidor_encargado` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  CONSTRAINT fk_municipios_repartidores FOREIGN KEY(id_repartidor_encargado) REFERENCES repartidores(id_repartidor)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


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
  PRIMARY KEY (`dni`),
  CONSTRAINT fk_clientes_municipios FOREIGN KEY(id_municipio) REFERENCES municipios(id_municipio)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `dni` varchar(9) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `dni` varchar(9) NOT NULL,
  `cod_pedido` varchar(45) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `precio_total` double DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  CONSTRAINT fk_pedidos_clientes FOREIGN KEY(dni) REFERENCES clientes(dni)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `platos`;
CREATE TABLE IF NOT EXISTS `platos` (
  `cod_plato` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`cod_plato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE IF NOT EXISTS `detallepedido` (
  `cod_detallepedido` varchar(45) NOT NULL,
  `cod_pedido` varchar(45) NOT NULL,
  `cod_plato` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`cod_detallepedido`),
  CONSTRAINT fk_detallepedido_platos FOREIGN KEY(cod_plato) REFERENCES platos(cod_plato),
  CONSTRAINT fk_detallepedido_pedidos FOREIGN KEY(cod_pedido) REFERENCES pedidos(cod_pedido)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


COMMIT;
