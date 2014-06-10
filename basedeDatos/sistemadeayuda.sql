-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2014 a las 21:29:02
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
  `NOMBRE_DOC` varchar(100) DEFAULT NULL,
  `FECHA_SUBIDA` date DEFAULT NULL,
  `DESCRIPCION` text,
  PRIMARY KEY (`ID_USUARIO`,`COD_DOC_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `documento_docente`
--

INSERT INTO `documento_docente` (`ID_USUARIO`, `COD_DOC_DOC`, `NOMBRE_DOC`, `FECHA_SUBIDA`, `DESCRIPCION`) VALUES
(4, 2, '1402293650-inv.pdf', '2014-06-08', 'documento de a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `ID_ENTREGA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_GRUPO` int(11) DEFAULT NULL,
  `ID_EVENTO` int(11) DEFAULT NULL,
  `NOMBRE_ENTREGA` varchar(50) DEFAULT NULL,
  `FECHA_ENTREGA` date DEFAULT NULL,
  `COMENTARIO` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ENTREGA`),
  KEY `FK_RELATIONSHIP_15` (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_16` (`ID_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`ID_ENTREGA`, `COD_GRUPO`, `ID_EVENTO`, `NOMBRE_ENTREGA`, `FECHA_ENTREGA`, `COMENTARIO`) VALUES
(8, 1, 3, '1402351509-inv.pdf', '2014-06-09', 'documento A entregado'),
(9, 1, 3, '1402353045-inv.pdf', '2014-06-09', 'documento AAAA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `FECHA_EVENTO` date DEFAULT NULL,
  `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `AVISO` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_13` (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_14` (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `evento`
--

INSERT INTO `evento` (`FECHA_EVENTO`, `ID_EVENTO`, `ID_USUARIO`, `ID_TIPO_EVENTO`, `AVISO`) VALUES
('2014-06-01', 1, 23, 1, 'el documento A se subio '),
('2014-05-14', 2, 25, 2, 'el documento B'),
('2014-06-26', 3, 1, 1, 'el documento B se subio'),
('2014-06-29', 4, 2, 4, 'entrega hito 33'),
('2014-06-26', 5, 1, 2, 'el documento B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_particular`
--

CREATE TABLE IF NOT EXISTS `evento_particular` (
  `ID_EVENTO` int(11) NOT NULL,
  `COD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EVENTO`,`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_19` (`COD_GRUPO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `evento_particular`
--

INSERT INTO `evento_particular` (`ID_EVENTO`, `COD_GRUPO`) VALUES
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(30) NOT NULL,
  `CONTROLADOR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_FORM`, `CONTROLADOR`) VALUES
(2, 'Registrar Grupo', 'grupo'),
(3, 'Inscribirse', 'registrarseGrupo'),
(5, 'Ver Grupos', 'integrantes'),
(6, 'Dar Baja Grupo', 'listaGrupos'),
(8, 'incluir lista de estudiantes', 'csvcontroller'),
(9, 'fijar fechas de entrega de hit', 'calendar'),
(10, 'subir documentos convocatoria', 'subirDocDocente'),
(11, 'Registrarse', 'registrar'),
(12, 'Docentes', 'docente'),
(13, 'Grupos existentes', 'gruposInscritosGlobal'),
(1, 'Salir', 'ingresar/cerrarSession'),
(15, 'Subir Hito', 'subirHito'),
(14, 'Subir Documentos', 'subirDocEst');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `USU_ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_LARGO` varchar(100) NOT NULL,
  `NOMBRE_CORTO` varchar(50) NOT NULL,
  `PASSW_GRUPO` varchar(15) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_3` (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_9` (`USU_ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`COD_GRUPO`, `ID_USUARIO`, `USU_ID_USUARIO`, `NOMBRE_LARGO`, `NOMBRE_CORTO`, `PASSW_GRUPO`, `ACTIVO`) VALUES
(1, 2, 1, 'TECHNOLOGY ANCASOFT', 'ANCASOFT', '123456', 1),
(2, 3, 4, 'GRUPO JALDIN', 'GJAL', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_usuario`
--

CREATE TABLE IF NOT EXISTS `historia_usuario` (
  `ID_HISTORIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EVENTO` int(11) DEFAULT NULL,
  `NOM_HISTORIA` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_HISTORIA`),
  KEY `FK_RELATIONSHIP_22` (`ID_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `historia_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_grupo`
--

CREATE TABLE IF NOT EXISTS `integrantes_grupo` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`COD_GRUPO`),
  KEY `FK_RELATIONSHIP_7` (`COD_GRUPO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `integrantes_grupo`
--

INSERT INTO `integrantes_grupo` (`ID_USUARIO`, `COD_GRUPO`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_ENTREGA` int(11) NOT NULL,
  `CALIFICACION` int(11) DEFAULT NULL,
  `OBSERVACION` text,
  PRIMARY KEY (`ID_ENTREGA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `nota`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_estudiante`
--

CREATE TABLE IF NOT EXISTS `nota_estudiante` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOTA_ESTUDIANTE` int(11) DEFAULT NULL,
  `OBSERVACION_ESTUDIANTE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `nota_estudiante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_tarea`
--

CREATE TABLE IF NOT EXISTS `responsable_tarea` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_GRUPO` int(11) NOT NULL,
  `ID_TAREA` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`COD_GRUPO`,`ID_TAREA`),
  KEY `FK_RELATIONSHIP_25` (`ID_TAREA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `responsable_tarea`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
  `ID_ROL` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_FORM`),
  KEY `FK_RELATIONSHIP_5` (`ID_FORM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `rol_formulario`
--

INSERT INTO `rol_formulario` (`ID_ROL`, `ID_FORM`) VALUES
(1, 1),
(1, 5),
(1, 6),
(1, 8),
(1, 10),
(2, 1),
(2, 2),
(2, 3),
(2, 9),
(2, 13),
(2, 14),
(2, 15),
(5, 11),
(5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`ID_ROL`),
  KEY `FK_RELATIONSHIP_2` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID_USUARIO`, `ID_ROL`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `ID_TAREA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_HISTORIA` int(11) DEFAULT NULL,
  `NOM_TAREA` varchar(150) NOT NULL,
  `EVALUACION_EST` int(11) NOT NULL,
  `EVALUACION_DOC` int(11) NOT NULL,
  PRIMARY KEY (`ID_TAREA`),
  KEY `FK_RELATIONSHIP_23` (`ID_HISTORIA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tarea`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `NOMBRE_TIPO_EVENTO` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`ID_TIPO_EVENTO`, `NOMBRE_TIPO_EVENTO`) VALUES
(1, 'documento_a'),
(2, 'documento_b'),
(3, 'reunion_grupo'),
(4, 'hito'),
(5, 'documento_general ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) NOT NULL,
  `LOGGIN` varchar(50) NOT NULL,
  `APELLIDOM` varchar(50) NOT NULL,
  `PASSW` varchar(15) NOT NULL,
  `CORREO` varchar(25) NOT NULL,
  `APELLIDOP` varchar(50) NOT NULL,
  `CI_DOCENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `LOGGIN`, `APELLIDOM`, `PASSW`, `CORREO`, `APELLIDOP`, `CI_DOCENTE`) VALUES
(1, 'corina', 'corina', 'flores', 'A123456a', 'corina1234@hotmail.com', 'camacho', 1234567),
(2, 'camila', 'camila', 'nnmmj', 'A123456a', 'cami@hotmail.com', 'vbbb', 0),
(3, 'camila', 'camila2', 'okkljj', 'A123456a', 'cam@hotmail.com', 'cam', 0),
(4, 'jaldin', 'jaldin', 'sss', 'A123456a', 'jal1234@hotmail.com', 'sss', 1234568);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
