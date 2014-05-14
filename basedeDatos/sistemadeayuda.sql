-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2014 a las 22:56:18
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemadeayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `COD_DOCUMEN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_DOC` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `RUTA` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`COD_DOCUMEN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `documentos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_grupo`
--

CREATE TABLE IF NOT EXISTS `documentos_grupo` (
  `ID_FECHA` int(11) NOT NULL,
  `COD_DOCUMEN` int(11) NOT NULL,
  `COD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`ID_FECHA`,`COD_DOCUMEN`,`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_11` (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_12` (`COD_DOCUMEN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `documentos_grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_limite`
--

CREATE TABLE IF NOT EXISTS `fecha_limite` (
  `FECHA` date DEFAULT NULL,
  `ID_FECHA` int(11) NOT NULL AUTO_INCREMENT,
  `COMENTARIO` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_FECHA`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `fecha_limite`
--

INSERT INTO `fecha_limite` (`FECHA`, `ID_FECHA`, `COMENTARIO`) VALUES
('2014-05-17', 1, 'prueba'),
('2014-07-12', 2, 'prueba2'),
('2014-07-04', 3, 'ver'),
('2014-05-18', 4, 'prueba3'),
('2014-05-09', 5, 'aca ver'),
('2014-06-05', 6, 'otra prueba error');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_limite_tipo`
--

CREATE TABLE IF NOT EXISTS `fecha_limite_tipo` (
  `ID_FECHA` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_FECHA`,`ID`),
  KEY `FK_RELATIONSHIP_8` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `fecha_limite_tipo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(30) COLLATE utf8_bin NOT NULL,
  `controlador` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_FORM`, `controlador`) VALUES
(7, 'logout', 'ingresar/cerrarSession'),
(2, 'Registrar Grupo', 'grupo'),
(3, 'Inscribirse', 'registrarseGrupo'),
(5, 'Ver Grupos', 'integrantes'),
(6, 'Dar Baja Grupo', 'listaGrupos'),
(8, 'incluir lista de estudiantes', 'csvcontroller'),
(9, 'fijar fechas de entrega de hit', 'calendar'),
(10, 'subir documentos convocatoria', 'subirDoc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCENTE` int(11) NOT NULL,
  `ID_REPRESENTANTE` int(11) NOT NULL,
  `NOMBRE_LARGO` varchar(100) COLLATE utf8_bin NOT NULL,
  `NOMBRE_CORTO` varchar(50) COLLATE utf8_bin NOT NULL,
  `PASSW_GRUPO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_14` (`ID_REPRESENTANTE`),
  KEY `FK_RELATIONSHIP_3` (`ID_DOCENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`COD_GRUPO`, `ID_DOCENTE`, `ID_REPRESENTANTE`, `NOMBRE_LARGO`, `NOMBRE_CORTO`, `PASSW_GRUPO`, `ACTIVO`) VALUES
(1, 1, 2, 'gran turismo radio', 'gtr', 'grantura', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_grupo`
--

CREATE TABLE IF NOT EXISTS `integrantes_grupo` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_6` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `integrantes_grupo`
--

INSERT INTO `integrantes_grupo` (`COD_GRUPO`, `ID_USUARIO`) VALUES
(1, 3),
(1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`) VALUES
(1, 'docente'),
(2, 'estudiante'),
(3, 'cliente'),
(4, 'managerProyect');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_formulario`
--

CREATE TABLE IF NOT EXISTS `rol_formulario` (
  `ID_FORM` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM`,`ID_ROL`),
  KEY `FK_RELATIONSHIP_4` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `rol_formulario`
--

INSERT INTO `rol_formulario` (`ID_FORM`, `ID_ROL`) VALUES
(1, 2),
(2, 2),
(3, 2),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(9, 2),
(10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `ID_ROL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_1` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID_ROL`, `ID_USUARIO`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `ID` int(11) NOT NULL,
  `NOMBRE_TIPO_EVENTO` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `tipo_evento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) COLLATE utf8_bin NOT NULL,
  `APELLIDOS` varchar(80) COLLATE utf8_bin NOT NULL,
  `LOGGIN` varchar(20) COLLATE utf8_bin NOT NULL,
  `PASSW` varchar(20) COLLATE utf8_bin NOT NULL,
  `CORREO` varchar(30) COLLATE utf8_bin NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDOS`, `LOGGIN`, `PASSW`, `CORREO`, `ACTIVO`) VALUES
(1, 'marco', 'montecinos', 'marquito', 'AAaa11', 'marc@gmail.com', 1),
(2, 'carla', 'salazar', 'carlita', 'AAaa11', 'AAaa11', 1),
(3, 'emilson', '0', 'eleazar', 'Raptor1989', 'emilsonrod@gmail.com', 1),
(4, 'alex', 'rodriguez', 'polal21', 'AAaa11', 'polal21@gmail.com', 1),
(5, 'franklin', '0', 'franco', 'Franco1', 'franco@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
