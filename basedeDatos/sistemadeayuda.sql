-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2014 a las 22:59:06
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
(1, 1, '1401747502-inv.pdf', '2014-06-02', 'nnnnnnnnnnnnnnnnnnnnnnnn'),
(1, 2, '1401747521-inv.pdf', '2014-06-02', 'ccccc'),
(1, 3, '1401747610-inv.pdf', '2014-06-02', 'corina doc\r\n'),
(1, 4, '1401756284-inv.pdf', '2014-06-02', 'NNMB');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`ID_ENTREGA`, `COD_GRUPO`, `ID_EVENTO`, `NOMBRE_ENTREGA`, `FECHA_ENTREGA`, `COMENTARIO`) VALUES
(25, 1, 5, '1401770433-inv.pdf', '2014-06-02', 'hito pruebas'),
(24, 1, 5, '1401770249-inv.pdf', '2014-06-02', 'hito documneto entrega'),
(22, 1, 1401745853, 'nnnnnnn corina', '2014-06-02', '1'),
(23, 1, 2, '1401770141-inv.pdf', '2014-06-02', 'hito de hito'),
(21, 1, 1, '1401700173-Doc1.docx', '2014-06-02', 'bbbbbbbbbbbbbbb'),
(20, 1, 2, '1401699838-inv.pdf', '2014-06-02', 'asevv'),
(18, 1, 4, '1401699594-inv.pdf', '2014-06-02', 'nnnnnnnnnnnnnnnn'),
(19, 1, 2, '1401699651-inv.pdf', '2014-06-02', 'ffasea'),
(26, 1, 5, '1401770997-inv.pdf', '2014-06-02', 'nnnnnnnnnnnnnnnnnnnnnnnnn');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `evento`
--

INSERT INTO `evento` (`FECHA_EVENTO`, `ID_EVENTO`, `ID_USUARIO`, `ID_TIPO_EVENTO`, `AVISO`) VALUES
('2014-06-25', 1, 1, 1, 'Lo recomendable es que la entrega sea con el nombre entrga_A.zip'),
('2014-06-16', 2, 2, 5, 'documentos doc '),
('2014-06-16', 5, 2, 6, 'camila otro aviso'),
('2014-06-01', 4, 1, 4, 'entrega de la fase a de la documentacion de la d ded eka skdasd a cege i fly when beat my herart eeee i up no body oooo'),
('2014-06-16', 6, 3, 5, 'kkkk');

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
(2, 1),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(30) NOT NULL,
  `CONTROLADOR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_FORM`, `CONTROLADOR`) VALUES
(1, 'Salir', 'ingresar/cerrarSession'),
(2, 'Registrarse', 'registrar'),
(3, 'Registrar Grupo', 'grupo'),
(4, 'Inscribirse Grupo', 'registrarseGrupo'),
(5, 'Fijar fecha Entrega HITO', 'calendar'),
(6, 'Grupos Existentes', 'gruposInscritosGlobal'),
(7, 'Subir Documento', 'subirDocEst'),
(8, 'Subir Hito', 'subirHito'),
(9, 'Subir Documentos Convocatoria', 'subirDocDocente'),
(10, 'Ver Grupos', 'integrantes'),
(11, 'Dar Baja Grupo', 'listaGrupos'),
(12, 'Incluir Lista de Estudiantes', 'csvcontroller'),
(13, 'Docentes', 'docente');

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
(1, 2, 1, 'technology ancasoft', 'ancasoft', '123456', 1),
(2, 3, 4, 'OTRO GRUPO', 'OTRO', '123456', 1);

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
(2, 1);

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
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(5, 2),
(5, 13);

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
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `ID_TIPO_EVENTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_EVENTO` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`ID_TIPO_EVENTO`, `NOMBRE_TIPO_EVENTO`) VALUES
(1, 'Entrega FASE A'),
(6, 'documento entrega'),
(4, 'Entrega FASE B'),
(5, 'Entrega rezagados'),
(7, 'documnto entrega 33'),
(8, 'documento 1camila');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `LOGGIN` varchar(50) NOT NULL,
  `PASSW` varchar(15) NOT NULL,
  `CORREO` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDOS`, `LOGGIN`, `PASSW`, `CORREO`) VALUES
(1, 'corina', 'camacho ', 'corina', 'A123456a', 'corina@hotmail.com'),
(2, 'camila', 'flores', 'camila', 'A123456a', 'cam@hotmail.com'),
(3, 'cmila', 'camacho', 'camila2', 'A123456a', 'cam@hotmail.com'),
(4, 'jaldin', 'camacho', 'jaldin', 'A123456a', 'jaldin@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
