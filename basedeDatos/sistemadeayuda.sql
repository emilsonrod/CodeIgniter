-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2014 a las 20:21:43
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `fecha_limite`
--

INSERT INTO `fecha_limite` (`FECHA`, `ID_FECHA`, `COMENTARIO`) VALUES
('2014-05-17', 1, 'prueba'),
('2014-07-12', 2, 'prueba2'),
('2014-07-04', 3, 'ver'),
('2014-05-18', 4, 'prueba3'),
('2014-05-09', 5, 'aca ver'),
('2014-06-05', 6, 'otra prueba error'),
('2014-05-01', 7, 'nuevo');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_FORM`, `controlador`) VALUES
(7, 'Salir', 'ingresar/cerrarSession'),
(2, 'Registrar Grupo', 'grupo'),
(3, 'Inscribirse', 'registrarseGrupo'),
(5, 'Ver Grupos', 'integrantes'),
(6, 'Dar Baja Grupo', 'listaGrupos'),
(8, 'incluir lista de estudiantes', 'csvcontroller'),
(9, 'fijar fechas de entrega de hit', 'calendar'),
(10, 'subir documentos convocatoria', 'subirDoc'),
(11, 'Registrarse', 'registrar'),
(12, 'Docentes', 'docente'),
(13, 'Grupos existentes', 'gruposInscritosGlobal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCENTE` int(11) NOT NULL,
  `ID_REPRESENTANTE` int(11) NOT NULL,
  `CORREO_GRUPO` varchar(50) COLLATE utf8_bin NOT NULL,
  `NOMBRE_LARGO` varchar(100) COLLATE utf8_bin NOT NULL,
  `NOMBRE_CORTO` varchar(50) COLLATE utf8_bin NOT NULL,
  `PASSW_GRUPO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_14` (`ID_REPRESENTANTE`),
  KEY `FK_RELATIONSHIP_3` (`ID_DOCENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`COD_GRUPO`, `ID_DOCENTE`, `ID_REPRESENTANTE`, `CORREO_GRUPO`, `NOMBRE_LARGO`, `NOMBRE_CORTO`, `PASSW_GRUPO`, `ACTIVO`) VALUES
(5, 1, 7, 'softEli@gmail.com', 'desarrollo de software Eli', 'softEli', 'aaAA55', 1),
(6, 6, 15, 'sofgolty@gmail.com', 'dfee bere  eli', 'softGolty', 'dfasdfwe', 1),
(7, 24, 25, 'abc@gmail.es', 'Algo vhjsdfh', 'ABC', 'abc123', 0),
(8, 24, 26, 'jas@vshd.com', 'dsf123 $%&amp;', 'jas', 'j123456', 0);

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
(5, 7),
(6, 15),
(7, 25),
(8, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`) VALUES
(1, 'docente'),
(2, 'estudiante'),
(3, 'cliente'),
(4, 'managerProyect'),
(5, 'general');

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
(10, 1),
(11, 5),
(12, 5),
(13, 2);

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
(1, 6),
(1, 18),
(1, 22),
(1, 24),
(2, 2),
(2, 3),
(2, 5),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 19),
(2, 20),
(2, 21),
(2, 23),
(2, 25),
(2, 26);

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
  `apellidoM` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `apellidoP` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `LOGGIN` varchar(20) COLLATE utf8_bin NOT NULL,
  `PASSW` varchar(20) COLLATE utf8_bin NOT NULL,
  `CORREO` varchar(30) COLLATE utf8_bin NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  `ci_docente` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `apellidoM`, `apellidoP`, `LOGGIN`, `PASSW`, `CORREO`, `ACTIVO`, `ci_docente`) VALUES
(1, 'marco', NULL, NULL, 'marquito', 'AAaa11', 'marc@gmail.com', 1, NULL),
(2, 'carla', NULL, NULL, 'carlita', 'AAaa11', 'AAaa11', 1, NULL),
(3, 'emilson', NULL, NULL, 'eleazar', 'Raptor1989', 'emilsonrod@gmail.com', 1, NULL),
(4, 'alex', NULL, NULL, 'polal21', 'AAaa11', 'polal21@gmail.com', 1, NULL),
(5, 'franklin', NULL, NULL, 'franco', 'Franco1', 'franco@gmail.com', 1, NULL),
(6, 'sergio', NULL, NULL, 'serL', 'AAaa66', 'serg@gmail.com', 1, NULL),
(7, 'jony', NULL, NULL, 'JhonC', 'AAaa77', 'jon@gmail.com', 1, NULL),
(8, 'juan', NULL, NULL, 'JMont', 'AAaa88', 'juaMon@gmail.com', 1, NULL),
(9, 'lucas', NULL, NULL, 'LucG', 'AAaa99', 'luc@gmail.com', 1, NULL),
(10, 'marco', NULL, NULL, 'linma', 'AAaa11', 'marcLinV@gmail.com', 1, NULL),
(11, 'luis', NULL, NULL, 'Lponk', 'AAaa11', 'luiK@gmail.com', 1, NULL),
(12, 'carlos', NULL, NULL, 'carlun', 'AAaa11', 'carlos@gmail.com', 1, NULL),
(13, 'cristian', NULL, NULL, 'cristare', 'AAaa11', 'cristian@gmail.com', 1, NULL),
(14, 'nelly', NULL, NULL, 'nelly', 'AAaa11', 'nelly@hotmail.com', 1, NULL),
(15, 'richart', NULL, NULL, 'ririo', 'AAaa11', 'riog@hotmail.com', 1, NULL),
(16, 'janet', NULL, NULL, 'janca', 'AAaa11', 'janet@gmail.com', 1, NULL),
(17, 'luis', NULL, NULL, 'lumon', 'AAaa11', 'monlu@gmail.com', 1, NULL),
(18, 'boris', 'navia', 'calancha', 'borisito', 'AAaa11', 'boris@gmail.com', 1, '7892458'),
(19, 'kdjfdjfkl', 'cvm', 'mbnbjgut', 'kjhkhoti', 'AAAaa11', 'hghgh@hotmail.com', 1, NULL),
(20, 'kdjfdjfkl', 'cvm', 'mbnbjgut', 'kjhkh', 'AAAaa11', 'hgtrh@hotmail.com', 1, NULL),
(21, 'franko', 'agtun', 'flores', 'agtuni', 'aaAA11', 'agt@gmail.com', 1, NULL),
(22, 'franko', 'agtun', 'flores', 'agtuni2', 'aaAA11', 'agt2@gmail.com', 1, '4789652'),
(23, 'marco', 'aguanta', 'aguanta', 'anggel', 'AAaa11', 'der@hotmail.com', 1, NULL),
(24, 'Ana', 'Martinez', 'Lopez', 'ana', 'Ana123', 'ana@hotmail.com', 1, '12345678'),
(25, 'Juan', 'Montan', 'Perez', 'juan', 'Juan123', 'juan@gmail.com', 1, NULL),
(26, 'Maria', 'Marin', 'arnez', 'maria', 'Maria123', 'moni@gmail.com', 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
