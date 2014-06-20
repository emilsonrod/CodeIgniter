-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2014 a las 02:52:01
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
(46, 3, '1403256429-Resumen_temas_4_5_y_6.docx', '2014-06-20', 'Cuando tu envias un archivo al servidor por el formulario con un input file este mismo maneja un array que dentro del mismo contiene un “type” donde se almacena el tipo de imagen, para hacer una comparativa sencilla seria asi:'),
(46, 2, '1403254529-inv.pdf', '2014-06-20', 'Cuando tu envias un archivo al servidor por el formulario con un input file este mismo maneja un array que dentro del mismo contiene un “type” donde se almacena el tipo de imagen, para hacer una comparativa sencilla seria asi:\r\n'),
(46, 4, '1403256452-HISTORIAS_DE_USUARIO.xlsx', '2014-06-20', 'Cuando tu envias un archivo al servidor por el formulario con un input file este mismo maneja un array que dentro del mismo contiene un “type” donde se almacena el tipo de imagen, para hacer una comparativa sencilla seria asi:'),
(46, 5, '1403256470-capitulo1.pdf', '2014-06-20', 'Cuando tu envias un archivo al servidor por el formulario con un input file este mismo maneja un array que dentro del mismo contiene un “type” donde se almacena el tipo de imagen, para hacer una comparativa sencilla seria asi:');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcar la base de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`ID_ENTREGA`, `COD_GRUPO`, `ID_EVENTO`, `NOMBRE_ENTREGA`, `FECHA_ENTREGA`, `COMENTARIO`) VALUES
(22, 5, 3, '1403242127-uploadify.zip', '2014-06-19', 'jhon'),
(19, 5, 1, '1403241860-pwtic3.pdf', '2014-06-19', 'fecas doc'),
(18, 5, 2, '1403241580-uploadify.zip', '2014-06-19', 'fechas'),
(20, 5, 5, '1403241951-TVD.pdf', '2014-06-19', 'fecha otradoc'),
(21, 5, 3, '1403241991-uploadify.zip', '2014-06-19', 'otr fecg'),
(28, 8, 7, '1403245775-perfil.docx', '2014-06-19', 'carlita grupo 8'),
(29, 8, 7, '1403245829-The_Passive_Voice.docx', '2014-06-19', 'maria grupo 8'),
(30, 7, 7, '1403245941-perfil.docx', '2014-06-19', 'camila 2 grupo 7'),
(31, 7, 6, '1403246002-Paint.NET_.3_.5_.11_.Install_.zip', '2014-06-19', 'camila 2 hito grupo 7'),
(32, 8, 8, '1403248191-ci_listas_js-master.zip', '2014-06-20', 'hito grupo 8'),
(33, 8, 7, '1403248569-TEMA_5_Resumen-1.docx', '2014-06-20', 'BOV'),
(34, 8, 8, '1403248808-ci_listas_js-master.zip', '2014-06-20', 'HHHHH'),
(35, 5, 3, '1403248933-uploadify.zip', '2014-06-20', 'jjj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `FECHA_EVENTO` date DEFAULT NULL,
  `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENTO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `AVISO` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO`),
  KEY `FK_RELATIONSHIP_13` (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_14` (`ID_TIPO_EVENTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `evento`
--

INSERT INTO `evento` (`FECHA_EVENTO`, `ID_EVENTO`, `ID_TIPO_EVENTO`, `ID_USUARIO`, `AVISO`) VALUES
('2014-06-18', 1, 1, 1, 'documento A'),
('2014-06-18', 2, 4, 3, 'hito'),
('2014-06-22', 3, 4, 3, 'hito'),
('2014-06-23', 4, 4, 3, 'HITO ULT'),
('2014-06-21', 5, 1, 1, 'DOCA'),
('2014-06-22', 6, 4, 47, 'hiootot'),
('2014-06-22', 7, 1, 24, 'documento a'),
('2014-06-22', 8, 4, 26, 'hito grupo 8');

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

--
-- Volcar la base de datos para la tabla `evento_particular`
--

INSERT INTO `evento_particular` (`COD_GRUPO`, `ID_EVENTO`) VALUES
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(7, 6),
(7, 7),
(8, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(30) NOT NULL,
  `CONTROLADOR` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcar la base de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_FORM`, `CONTROLADOR`) VALUES
(7, 'Salir', 'ingresar/cerrarSession'),
(2, 'Registrar Grupo', 'grupo'),
(3, 'Inscribirse', 'registrarseGrupo'),
(5, 'Ver Grupos', 'controladorVerGrupo'),
(6, 'Dar Baja Grupo', 'listaGrupos'),
(8, 'incluir lista de estudiantes', 'csv'),
(9, 'fijar fechas de entrega de hit', 'calendar2'),
(10, 'subir documentos convocatoria', 'subirDocDocente'),
(11, 'RegistrarDocente', 'registrarDocente'),
(12, 'RegistrarEstudiante', 'registrarEstudiante'),
(13, 'Docentes', 'docente'),
(14, 'Grupos existentes', 'gruposInscritosGlobal'),
(15, 'Calificacion Hitos', 'notaHitos'),
(16, 'Calificacion Estudiantes', 'notaEstudiante'),
(17, 'Datos Grupo', 'controladorDatos'),
(18, 'Integrantes', 'integrantes'),
(19, 'Documentos', 'controladorDoc'),
(20, 'Hitos ', 'controladorHito'),
(21, 'volver', 'retornar'),
(22, 'Subir Documento', 'subirDocDocente'),
(23, 'Subir Documento Estudiante', 'subirDocEst'),
(24, 'subir hitos', 'subirHito'),
(25, 'Convocatoria', 'convocatoriasDoc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCENTE` int(11) NOT NULL,
  `ID_REPRESENTANTE` int(11) NOT NULL,
  `CORREO_GRUPO` varchar(25) NOT NULL,
  `NOMBRE_LARGO` varchar(100) NOT NULL,
  `NOMBRE_CORTO` varchar(50) NOT NULL,
  `PASSW_GRUPO` varchar(15) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`COD_GRUPO`, `ID_DOCENTE`, `ID_REPRESENTANTE`, `CORREO_GRUPO`, `NOMBRE_LARGO`, `NOMBRE_CORTO`, `PASSW_GRUPO`, `ACTIVO`) VALUES
(5, 1, 7, 'softEli@gmail.com', 'desarrollo de software Eli', 'softEli', 'aaAA55', 1),
(6, 6, 15, 'sofgolty@gmail.com', 'dfee bere  eli', 'softGolty', 'dfasdfwe', 1),
(7, 24, 25, 'abc@gmail.es', 'Algo vhjsdfh', 'ABC', 'abc123', 1),
(8, 24, 26, 'jas@vshd.com', 'dsf123 $%&amp;', 'jas', 'j123456', 1),
(9, 6, 27, 'gokuBall@gmail.com', 'super sayayin', 'goku', 'Goku2014', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_usuario`
--

CREATE TABLE IF NOT EXISTS `historia_usuario` (
  `ID_HISTORIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EVENTO` int(11) NOT NULL,
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
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_6` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `integrantes_grupo`
--

INSERT INTO `integrantes_grupo` (`COD_GRUPO`, `ID_USUARIO`) VALUES
(5, 3),
(5, 7),
(5, 45),
(6, 15),
(7, 25),
(7, 47),
(8, 2),
(8, 26),
(9, 12),
(9, 13),
(9, 21),
(9, 23),
(9, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_ENTREGA` int(11) NOT NULL,
  `CALIFICACION` int(11) NOT NULL,
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
  `NOTA_ESTUDIANTE` int(11) NOT NULL,
  `OBSERVACION_ESTUDIANTE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `nota_estudiante`
--

INSERT INTO `nota_estudiante` (`ID_USUARIO`, `NOTA_ESTUDIANTE`, `OBSERVACION_ESTUDIANTE`) VALUES
(7, 50, 'vacio'),
(12, 45, 'vacio'),
(13, 45, 'vacio'),
(14, 0, 'vacio'),
(15, 0, 'vacio'),
(21, 60, 'vacio'),
(23, 0, 'vacio'),
(25, 0, 'vacio'),
(26, 0, 'vacio'),
(27, 0, 'vacio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_tarea`
--

CREATE TABLE IF NOT EXISTS `responsable_tarea` (
  `COD_GRUPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TAREA` int(11) NOT NULL,
  PRIMARY KEY (`COD_GRUPO`,`ID_USUARIO`,`ID_TAREA`),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`) VALUES
(1, 'docente'),
(2, 'estudiante'),
(3, 'cliente'),
(4, 'managerProyect'),
(5, 'general'),
(6, 'grupo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_formulario`
--

CREATE TABLE IF NOT EXISTS `rol_formulario` (
  `ID_FORM` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM`,`ID_ROL`),
  KEY `FK_RELATIONSHIP_4` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(13, 5),
(14, 2),
(15, 1),
(16, 1),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 1),
(23, 2),
(24, 2),
(25, 2);

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
(1, 29),
(1, 30),
(1, 46),
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
(2, 26),
(2, 27),
(2, 28),
(2, 31),
(2, 45),
(2, 47);

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
(1, 'Entrega de documento_a'),
(2, 'Entrega de documento_b'),
(3, 'reunion_grupo'),
(4, 'Entrega de hito'),
(5, 'Entrega de documneto_gene');

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
  `ACTIVO` int(11) NOT NULL,
  `CI_DOCENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDOP`, `APELLIDOM`, `LOGGIN`, `PASSW`, `CORREO`, `ACTIVO`, `CI_DOCENTE`) VALUES
(16, 'janet', 'luna', 'nuvia', 'janca', 'AAaa11', 'janet@gmail.com', 1, 0),
(15, 'richart', '', 'miranda', 'ririo', 'AAaa11', 'riog@hotmail.com', 1, 0),
(14, 'nelly', 'quispe', 'flores', 'nelly', 'AAaa11', 'nelly@hotmail.com', 1, 0),
(13, 'cristian', 'cespedes', 'lopez', 'cristare', 'AAaa11', 'cristian@gmail.com', 1, 0),
(12, 'carlos', 'mamani', 'cespedes', 'carlun', 'AAaa11', 'carlos@gmail.com', 1, 0),
(11, 'luis', 'rodriguez', 'luna', 'Lponk', 'AAaa11', 'luiK@gmail.com', 1, 0),
(10, 'marco', 'bult', 'cespedes', 'linma', 'AAaa11', 'marcLinV@gmail.com', 1, 0),
(9, 'lucas', 'luna', 'salinas', 'LucG', 'AAaa99', 'luc@gmail.com', 1, 0),
(8, 'juan', 'castro', 'mamani', 'JMont', 'AAaa88', 'juaMon@gmail.com', 1, 0),
(7, 'jony', 'castro', 'arjona', 'JhonC', 'AAaa77', 'jon@gmail.com', 1, 0),
(6, 'sergio', 'salinas', 'lopez', 'serL', 'AAaa66', 'serg@gmail.com', 1, 0),
(5, 'franklin', 'quispe', 'siles', 'franco', 'Franco1', 'franco@gmail.com', 1, 0),
(4, 'alex', 'rodriguez', 'flores', 'polal21', 'AAaa11', 'polal21@gmail.com', 1, 0),
(3, 'emilson', 'lopez', 'rodriguez', 'eleazar', 'Raptor1989', 'emilsonrod@gmail.com', 1, 0),
(2, 'carla', 'Quispe', 'Mamani', 'carlita', 'AAaa11', 'AAaa11', 1, 0),
(1, 'marco', 'Salinas', 'Luna', 'marquito', 'AAaa11', 'marc@gmail.com', 1, 0),
(17, 'luis', 'trainer', 'humer', 'lumon', 'AAaa11', 'monlu@gmail.com', 1, 0),
(18, 'boris', 'calancha', 'navia', 'borisito', 'AAaa11', 'boris@gmail.com', 1, 7892458),
(19, 'kdjfdjfkl', 'mbnbjgut', 'cvm', 'kjhkhoti', 'AAAaa11', 'hghgh@hotmail.com', 1, 0),
(20, 'kdjfdjfkl', 'mbnbjgut', 'cvm', 'kjhkh', 'AAAaa11', 'hgtrh@hotmail.com', 1, 0),
(21, 'franko', 'flores', 'agtun', 'agtuni', 'aaAA11', 'agt@gmail.com', 1, 0),
(22, 'franko', 'flores', 'agtun', 'agtuni2', 'aaAA11', 'agt2@gmail.com', 1, 4789652),
(23, 'marco', 'aguanta', 'aguanta', 'anggel', 'AAaa11', 'der@hotmail.com', 1, 0),
(24, 'Ana', 'Lopez', 'Martinez', 'ana', 'Ana123', 'ana@hotmail.com', 1, 12345678),
(25, 'Juan', 'Perez', 'Montan', 'juan', 'Juan123', 'juan@gmail.com', 1, 0),
(26, 'Maria', 'arnez', 'Marin', 'maria', 'Maria123', 'moni@gmail.com', 1, 0),
(27, 'evo', 'morales', 'ayma', 'huevo', 'Huevo2014', 'huev@gmail.com', 1, 0),
(28, 'maria', 'lopez', 'delgado', 'mariLop', 'maria2014L', 'mari@gmail.com', 1, 0),
(29, 'victor', 'sanchez', 'lozada', 'vicoc', 'Vito2014', 'vitoc@gmail.com', 1, 7596453),
(30, 'patricia', 'rodriguez', 'romero', 'paty20', 'AAaa11', 'paty@gmail.com', 0, 7563245),
(31, 'laura', 'vicunia', 'llamita', 'laurita', 'Laura10', 'laurita@hotmail.com', 0, 0),
(45, 'camila', 'camacho', 'guzman', 'camila', 'A123456a', 'co1234@hotmail.com', 0, 0),
(46, 'corina', 'camacho', 'flores', 'corina', 'A123456a', 'cami@gmail.com', 0, 1234567),
(47, 'camilados', 'camachodos', 'floresdos', 'camila2', 'A123456a', 'camif@gmail.com', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
