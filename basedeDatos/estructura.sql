-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 10:50 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistemadeayuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `documento_docente`
--

CREATE TABLE IF NOT EXISTS `documento_docente` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_DOC_DOC` int(11) NOT NULL,
  `NOMBRE_DOC` varchar(100) COLLATE utf8_bin NOT NULL,
  `FECHA_SUBIDA` date NOT NULL,
  `DESCRIPCION` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`COD_DOC_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `ID_ENTREGA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_GRUPO` int(11) NOT NULL,
  `ID_EVENTO` int(11) NOT NULL,
  `NOMBRE_ENTREGA` varchar(50) COLLATE utf8_bin NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `COMENTARIO` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_ENTREGA`),
  KEY `FK_RELATIONSHIP_15` (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_16` (`ID_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `FECHA_EVENTO` datetime NOT NULL,
  `INICIO` datetime NOT NULL,
  `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `AVISO` varchar(250) COLLATE utf8_bin NOT NULL,
  `DIAS` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_13` (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_14` (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `evento_particular`
--

CREATE TABLE IF NOT EXISTS `evento_particular` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_EVENTO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_18` (`ID_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(60) COLLATE utf8_bin NOT NULL,
  `CONTROLADOR` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
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
  KEY `FK_RELATIONSHIP_3` (`ID_DOCENTE`),
  KEY `FK_RELATIONSHIP_9` (`ID_REPRESENTANTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `historia_usuario`
--

CREATE TABLE IF NOT EXISTS `historia_usuario` (
  `ID_HISTORIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_HITO` int(11) DEFAULT NULL,
  `COD_GRUPO` int(11) NOT NULL,
  `RESPONSABLE` int(11) DEFAULT NULL,
  `NOM_HISTORIA` varchar(150) COLLATE utf8_bin NOT NULL,
  `EVALUACION_EST` int(11) DEFAULT '0',
  `EVALUACION_DOC` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_HISTORIA`),
  KEY `FK_RELATIONSHIP_22` (`ID_HITO`),
  KEY `FK_RELATIONSHIP_26` (`COD_GRUPO`,`RESPONSABLE`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `hito`
--

CREATE TABLE IF NOT EXISTS `hito` (
  `ID_HITO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_GRUPO` int(11) NOT NULL,
  `ID_EVENTO` int(11) DEFAULT NULL,
  `NOMBRE_HITO` varchar(100) COLLATE utf8_bin NOT NULL,
  `NOTA_FINAL` int(11) NOT NULL,
  PRIMARY KEY (`ID_HITO`),
  KEY `FK_RELATIONSHIP_23` (`COD_GRUPO`,`ID_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `integrantes_grupo`
--

CREATE TABLE IF NOT EXISTS `integrantes_grupo` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_6` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_ENTREGA` int(11) NOT NULL,
  `CALIFICACION` int(11) NOT NULL,
  `OBSERVACION` text COLLATE utf8_bin,
  PRIMARY KEY (`ID_ENTREGA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `nota_estudiante`
--

CREATE TABLE IF NOT EXISTS `nota_estudiante` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOTA_ESTUDIANTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `rol_formulario`
--

CREATE TABLE IF NOT EXISTS `rol_formulario` (
  `ID_FORM` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM`,`ID_ROL`),
  KEY `FK_RELATIONSHIP_4` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `ID_ROL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_1` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `NOMBRE_TIPO_EVENTO` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) COLLATE utf8_bin NOT NULL,
  `APELLIDOP` varchar(50) COLLATE utf8_bin NOT NULL,
  `APELLIDOM` varchar(50) COLLATE utf8_bin NOT NULL,
  `LOGGIN` varchar(50) COLLATE utf8_bin NOT NULL,
  `PASSW` varchar(15) COLLATE utf8_bin NOT NULL,
  `CORREO` varchar(25) COLLATE utf8_bin NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  `CI_DOCENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
