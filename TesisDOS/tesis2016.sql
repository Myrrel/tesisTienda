-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2016 a las 06:05:59
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tesis2016`
--
CREATE DATABASE IF NOT EXISTS `tesis2016` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tesis2016`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(100) DEFAULT NULL,
  `DescripcionCategoria` varchar(250) DEFAULT NULL,
  `imagenCategoria` varchar(250) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `ID` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `NombreCategoria`, `DescripcionCategoria`, `imagenCategoria`) VALUES
(2, 'Libreria', 'Acuarelas, Adhesivos, Agendas, Albumes, Sobres, Carpetas, Cuadernos, Lapices,Sellos...', 'imgLibreria.jpg'),
(3, 'Bazar', 'Termos, Platos, Vasos, Cubiertos, Taper, Jarras, Manteles...', 'imgBazar.jpg'),
(4, 'Regaleria', 'Porta-Retratos, Hornitos, Cuadros, Alcancias, Relojes Pared, Paraguas de cartera y de caballero...', 'imgRegaleria.jpg'),
(5, 'Jugueteria', 'Autos, Estaciones, Involcables - Inflables, Juegos de Mesa, Juegos Musicales, Bebes y Primera Infancia, Didacticos...', 'imgJugueteria.jpg'),
(10, 'Invierno', 'Gorros, bufandas, guantes polar, guantes nieve, camperas, cuello polar, cuello lana, pasamontañas...', 'imgInvierno.jpg'),
(43, 'Ferretería', 'Pinsas, Serruchos, Alicate, Martillos, Sets, Mechas, Caja de Herramientas, Linternas,...', 'imgFerreteria.jpg'),
(55, 'Electrónicos', 'Pendrives, Memorias, Reproductores, Adaptador Memorias, Cables USB, HDM, OTG...', 'imgElectronicos.jpg'),
(56, 'Auriculares', 'Vincha, Siliconados, Anatomicos...', 'imgAuriculares.jpg'),
(70, 'jhjh', 'dkfjsal jdkjfsdlk jklsdfjls', 'aeb3de3c96639fd44e3c8e7f50a59725.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `NombresCliente` varchar(100) NOT NULL,
  `ApellidosCliente` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `WEB` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `idEstadocliente` int(11) NOT NULL,
  `telmovil` varchar(50) NOT NULL,
  `telfijo` varchar(50) NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `ID` (`idCliente`),
  KEY `idLocalidad` (`idLocalidad`),
  KEY `idEstadocliente` (`idEstadocliente`),
  KEY `idLocalidad_2` (`idLocalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `idPerfil`, `NombresCliente`, `ApellidosCliente`, `Email`, `WEB`, `Direccion`, `idLocalidad`, `idEstadocliente`, `telmovil`, `telfijo`) VALUES
(46, 4, 'u', 'u', 'uno@uno.com', 'http://www1.hh.com', 'y', 1, 1, '88908080980', '8'),
(47, 5, 'd', 'v', 'uno@uno.com', 'http://www1.hh.com', 'r', 1, 1, '4', '4'),
(48, 6, 'rrr', 'r', 'dos@uno.com', 'http://www.hh.com', '1', 1, 1, '1', '12'),
(49, 7, 'w', 'w', 'uno@uno.com', 'http://www.hh.com', 'ew', 1, 1, '34444', '1234'),
(50, 8, 'ui', 'uy', 'uno@uno.com', 'http://www.e.wer', '8', 1, 1, '8', '8'),
(51, 9, 'w', 'w', 'e@e.com', 'http://www.hh.com', '3', 1, 1, '6', '6'),
(52, 11, 'Ferreteria', 'f', 'uno@uno.com', 'http://www.hh.com', 'f', 1, 1, '33', '33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledepedido`
--

CREATE TABLE IF NOT EXISTS `detalledepedido` (
  `idDetalladePedido` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `COD/REF` varchar(30) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `ValorPorUnidad` float NOT NULL,
  PRIMARY KEY (`idDetalladePedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `detalledepedido`
--

INSERT INTO `detalledepedido` (`idDetalladePedido`, `idPedido`, `Cantidad`, `COD/REF`, `Descripcion`, `ValorPorUnidad`) VALUES
(1, 3, 1, 'e', 'eee', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosdeclientes`
--

CREATE TABLE IF NOT EXISTS `estadosdeclientes` (
  `idEstadocliente` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoDeCliente` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstadocliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estadosdeclientes`
--

INSERT INTO `estadosdeclientes` (`idEstadocliente`, `EstadoDeCliente`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosdepedidos`
--

CREATE TABLE IF NOT EXISTS `estadosdepedidos` (
  `idEstadoDePeddido` int(11) NOT NULL AUTO_INCREMENT,
  `NomEstadoDePedido` varchar(100) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`idEstadoDePeddido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estadosdepedidos`
--

INSERT INTO `estadosdepedidos` (`idEstadoDePeddido`, `NomEstadoDePedido`, `Descripcion`) VALUES
(1, 'pendiente de pago', 'los pedidos nuevos se pondran en  Pendiente de Pago'),
(2, 'cancelado', 'el pedido fue cancelado'),
(3, 'en preparación', 'Una vez que el Cliente pagó por el pedido tendrá estado en preparacion.'),
(4, 'enviado', 'una vez que el pedido fue preparado su estado será enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `idLocalidad` int(11) NOT NULL AUTO_INCREMENT,
  `NombreLocalidad` varchar(100) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `idProvincia` (`idProvincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`idLocalidad`, `NombreLocalidad`, `idProvincia`) VALUES
(1, 'Mar del Plata', 1),
(2, 'Ciudad Autonoma de Buenos Aires', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediosdeenvio`
--

CREATE TABLE IF NOT EXISTS `mediosdeenvio` (
  `idMediodeenvio` int(11) NOT NULL AUTO_INCREMENT,
  `MedioDeEnvio` varchar(100) NOT NULL,
  PRIMARY KEY (`idMediodeenvio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mediosdeenvio`
--

INSERT INTO `mediosdeenvio` (`idMediodeenvio`, `MedioDeEnvio`) VALUES
(1, 'Oca Envio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediosdepago`
--

CREATE TABLE IF NOT EXISTS `mediosdepago` (
  `idMediodepago` int(11) NOT NULL AUTO_INCREMENT,
  `MedioDePago` varchar(100) NOT NULL,
  PRIMARY KEY (`idMediodepago`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mediosdepago`
--

INSERT INTO `mediosdepago` (`idMediodepago`, `MedioDePago`) VALUES
(1, 'Depósito bancario'),
(2, 'Transferencia bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(100) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `NombrePais`) VALUES
(1, 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `NombresCliente` varchar(100) NOT NULL,
  `ApellidosCliente` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `Localidad` varchar(100) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `idPais` int(11) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `telfijo` varchar(50) NOT NULL,
  `telmovil` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `idMediodepago` int(11) NOT NULL,
  `Mediodepago` varchar(100) NOT NULL,
  `idMediodeenvio` int(11) NOT NULL,
  `Mediodeenvio` varchar(100) NOT NULL,
  `idEstadodelPedido` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idMediodepago` (`Mediodepago`),
  KEY `idMediodeenvio` (`Mediodeenvio`),
  KEY `idEstado` (`idEstadodelPedido`),
  KEY `idMediodepago_2` (`Mediodepago`),
  KEY `idMediodeenvio_2` (`Mediodeenvio`),
  KEY `idEstado_2` (`idEstadodelPedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idCliente`, `NombresCliente`, `ApellidosCliente`, `Direccion`, `idLocalidad`, `Localidad`, `idProvincia`, `Provincia`, `idPais`, `Pais`, `telfijo`, `telmovil`, `Email`, `fecha`, `idMediodepago`, `Mediodepago`, `idMediodeenvio`, `Mediodeenvio`, `idEstadodelPedido`) VALUES
(1, 0, 'el actual', '', '', 0, '', 0, '', 0, '', '', '', '', '0000-00-00', 0, '', 0, '', 1),
(2, 26, 'juna', 'urciuoli', '', 0, '', 0, '', 0, '', '', '', '', '0000-00-00', 0, '', 0, '', 4),
(3, 1, 'q', 'q', 'q', 1, 'q', 1, 'q', 1, 'q', '3', '5', 'u', '2016-07-21', 1, 'h', 1, 'j', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `usrPerfil` varchar(100) NOT NULL,
  `pssPerfil` varchar(250) NOT NULL,
  `nivelPerfil` int(11) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfil`, `usrPerfil`, `pssPerfil`, `nivelPerfil`) VALUES
(1, 'admin', 'juan', 99),
(4, 'martin', 'ttt', 1),
(5, 'dede', 'dede', 1),
(6, 'vfd', 'vfd', 1),
(7, 'lulu', 'lulu', 1),
(8, 'nini', 'nini', 1),
(9, 'm', 'm', 1),
(10, 'marcelo', 'marcelo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `COD/REF` varchar(30) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Precio_Unitario` float NOT NULL,
  `Precio_Mayorista` float NOT NULL,
  `Precio_Especial` float NOT NULL,
  `pack_de_venta` int(11) NOT NULL,
  `Imagen` varchar(240) NOT NULL,
  PRIMARY KEY (`idProducto`),
  UNIQUE KEY `ID` (`idProducto`),
  KEY `id_producto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `COD/REF`, `Descripcion`, `Precio_Unitario`, `Precio_Mayorista`, `Precio_Especial`, `pack_de_venta`, `Imagen`) VALUES
(3, 'BAZ001', 'Abrelata largo', 20, 10, 0, 1, '/BD/imgBD/IMGBAZ001.jpg'),
(4, 'FER002', 'Adaptador universal', 5, 123, 2.6, 12, '/BD/imgBD/IMGFER002.jpg'),
(5, 'AUR001', 'Auricular en bolsa vincha', 55, 282, 0, 0, '/BD/imgBD/IMGAUR001.jpg'),
(6, 'BAZ003', 'Balanza Romana con gancho metalica hasta 25 Kg.', 48, 30, 0, 0, '/BD/imgBD/BAZ003.jpg'),
(7, 'BAZ004', 'Batidor a pila para cafï¿½', 55, 28, 0, 0, '/BD/imgBD/BAZ004.jpg'),
(8, 'LIB001', 'Cartuchera 2 pisos AMARILLA con logos Cars - Monster High y otros', 60, 30, 0, 0, '/BD/imgBD/LIB001.jpg'),
(9, 'BAZ002', 'Chispero a pilas', 35, 18, 0, 0, '/BD/imgBD/BAZ002.jpg'),
(65, '3456789', 'nnn', 12, 21, 0, 21, '/BD/imgBD/IMGimages (3).jpg'),
(68, 'j', 'm', 5, 22, 22, 22, '/BD/imgBD/IMGimages (5).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosycategorias`
--

CREATE TABLE IF NOT EXISTS `productosycategorias` (
  `idProductoYCategorias` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProductoYCategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=459 ;

--
-- Volcado de datos para la tabla `productosycategorias`
--

INSERT INTO `productosycategorias` (`idProductoYCategorias`, `idProducto`, `idCategoria`) VALUES
(5, 6, 3),
(6, 7, 3),
(7, 8, 2),
(51, 9, 3),
(52, 9, 4),
(73, 65, 3),
(74, 65, 4),
(75, 65, 5),
(96, 4, 4),
(431, 5, 4),
(455, 3, 3),
(456, 3, 4),
(457, 68, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idProvincia` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProvincia` varchar(100) NOT NULL,
  `idPais` int(11) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idProvincia`, `NombreProvincia`, `idPais`) VALUES
(1, 'Buenos Aires', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
