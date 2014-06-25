-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2014 a las 15:00:11
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
-- Estructura de tabla para la tabla `documento_docente`
--

CREATE TABLE IF NOT EXISTS `documento_docente` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_DOC_DOC` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_DOC` varchar(100) NOT NULL,
  `FECHA_SUBIDA` datetime NOT NULL,
  `DESCRIPCION` text NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`COD_DOC_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `ID_ENTREGA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_GRUPO` int(11) NOT NULL,
  `ID_EVENTO` int(11) NOT NULL,
  `NOMBRE_ENTREGA` varchar(50) NOT NULL,
  `FECHA_ENTREGA` datetime NOT NULL,
  `COMENTARIO` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ENTREGA`),
  KEY `FK_RELATIONSHIP_15` (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_16` (`ID_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `FECHA_EVENTO` datetime NOT NULL,
  `INICIO` datetime NOT NULL,
  `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `AVISO` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_13` (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_14` (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_particular`
--

CREATE TABLE IF NOT EXISTS `evento_particular` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_EVENTO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_18` (`ID_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(60) NOT NULL,
  `CONTROLADOR` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCENTE` int(11) NOT NULL,
  `ID_REPRESENTANTE` int(11) NOT NULL,
  `CORREO_GRUPO` varchar(50) NOT NULL,
  `NOMBRE_LARGO` varchar(100) NOT NULL,
  `NOMBRE_CORTO` varchar(50) NOT NULL,
  `PASSW_GRUPO` varchar(15) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_3` (`ID_DOCENTE`),
  KEY `FK_RELATIONSHIP_9` (`ID_REPRESENTANTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_usuario`
--

CREATE TABLE IF NOT EXISTS `historia_usuario` (
  `ID_HISTORIA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NOM_HISTORIA` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_HISTORIA`),
  KEY `FK_RELATIONSHIP_26` (`COD_GRUPO`,`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_grupo`
--

CREATE TABLE IF NOT EXISTS `integrantes_grupo` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_6` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_ENTREGA` int(11) NOT NULL,
  `CALIFICACION` int(11) NOT NULL,
  `OBSERVACION` text NOT NULL,
  PRIMARY KEY (`ID_ENTREGA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_estudiante`
--

CREATE TABLE IF NOT EXISTS `nota_estudiante` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOTA_ESTUDIANTE` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_tarea`
--

CREATE TABLE IF NOT EXISTS `responsable_tarea` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TAREA` int(11) NOT NULL,
  `ID_HISTORIA` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`,`ID_TAREA`,`ID_HISTORIA`),
  KEY `FK_RELATIONSHIP_25` (`ID_TAREA`,`ID_HISTORIA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_formulario`
--

CREATE TABLE IF NOT EXISTS `rol_formulario` (
  `ID_FORM` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM`),
  KEY `FK_RELATIONSHIP_4` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `ID_ROL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_1` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `ID_TAREA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_HISTORIA` int(11) NOT NULL,
  `NOM_TAREA` varchar(150) NOT NULL,
  `EVALUACION_EST` int(11) NOT NULL,
  `EVALUACION_DOC` int(11) NOT NULL,
  PRIMARY KEY (`ID_TAREA`,`ID_HISTORIA`),
  KEY `FK_RELATIONSHIP_23` (`ID_HISTORIA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `NOMBRE_TIPO_EVENTO` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDOP` varchar(50) NOT NULL,
  `APELLIDOM` varchar(50) NOT NULL,
  `LOGGIN` varchar(50) NOT NULL,
  `PASSW` varchar(15) NOT NULL,
  `CORREO` varchar(25) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  `CI_DOCENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
