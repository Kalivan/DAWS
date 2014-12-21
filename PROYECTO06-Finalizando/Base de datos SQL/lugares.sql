-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2014 a las 19:54:15
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lugares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_lugar`),
  UNIQUE KEY `id_lugar` (`id_lugar`),
  KEY `fecha` (`fecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=640 ;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_lugar`, `lugar`, `descripcion`, `pais`, `provincia`, `fecha`) VALUES
(2, 'Cala Pregonda', 'Viaje Menorca Septiembre 2013', 'EspaÃ±a', 'Menorca', '2013-09-19'),
(3, 'Warner', 'Viaje Madrid Navidad 2012', 'EspaÃ±a', 'Madrid', '2012-12-24'),
(4, 'Madrid', 'Viaje Madrid Navidad 2012', 'EspaÃ±a', 'Madrid', '2012-12-24'),
(5, 'Madrid', 'Viaje Madrid Navidad 2012', 'EspaÃ±a', 'Madrid', '2012-12-24'),
(6, 'Madrid', 'Viaje Madrid Navidad 2012', 'EspaÃ±a', 'Madrid', '2012-12-24'),
(7, 'Valencia', 'Viaje Fallas 2012', 'EspaÃ±a', 'Valencia', '2012-03-14'),
(8, 'Cala Pregonda', 'Viaje Menorca Septiembre 2013', 'EspaÃ±a', 'Menorca', '2013-09-19'),
(9, 'Playa de Madrid', 'ExcursiÃ³n a las playas de Madrid, cuando el mundo explote', 'EspaÃ±a', 'Madrid', '2014-10-12'),
(34, 'Madrid', 'ExcursiÃ³n a las playas de Madrid, cuando el mundo explote', 'EspaÃ±a', 'Madrid', '2014-10-12'),
(37, 'OK', '', '', '', '0000-00-00'),
(38, 'CaÃ±on del Colorado', 'Gran CaÃ±on del Colorado', 'EEUU', 'Colorado', '2012-08-20'),
(39, 'Opera House', 'Gran Opera Hose de Sydney', 'Australia', 'Sydney', '2009-09-09'),
(40, 'Torre Pisa', 'Torre inclinada de Pisa', 'Italia', 'Pisa', '2003-10-10'),
(41, 'Estatua de la Libertad', 'Estatua de la Libertad', 'EEUU', 'Nueva York', '2005-10-09'),
(42, 'Parque Nacional Yala', 'Parque Nacional de Yala', 'Sri Lanka', 'Yala', '2014-08-23'),
(43, 'Ko Phi Phi', 'Playa Maya Bay en las Islas Phi Phi', 'Tailandia', 'Krabi', '2011-08-19'),
(44, 'Tortuguero', 'Desove de tortugas en Tortuguero', 'Costa Rica', 'Tortuguero', '2010-09-01'),
(616, 'Cenote dos ojos', 'Buceo en cenote dos ojos', 'Mejico', 'Playa del Carmen', '2014-05-02'),
(617, 'Cenote dos ojos', 'Buceo en cenote dos ojos', 'Mejico', 'Playa del Carmen', '2014-05-02'),
(618, 'Playa de Akumal', 'Reserva tortugas playa de Akumal', 'Mejico', 'Akumal', '2014-05-04'),
(619, 'Viena', 'Viaje a Viena', 'Austria', 'Viena', '2014-10-09'),
(623, 'Golden Gate', 'Puente Golden Gate de San Francisco', 'EEUU', 'San Francisco', '2002-12-23'),
(624, 'Madrid', 'ExcursiÃ³n a las playas de Madrid, cuando el mundo explote', 'EspaÃ±a', 'Madrid', '2014-10-12'),
(625, 'Cala Granadella', 'Cala de la Granadella en Javea', 'EspaÃ±a', 'Alicante', '2014-10-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `avatar` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `nombre`, `apellidos`, `email`, `avatar`) VALUES
('Javi', '827ccb0eea8a706c4c34a16891f84e7b', 'Javier', 'LÃ³pez CortÃ©s', 'kalivan@hotmail.com', 'mascota90x90.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
