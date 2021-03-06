-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 10:51 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'sistemadeayuda'
--

--
-- Dumping data for table 'documento_docente'
--

INSERT INTO documento_docente (ID_USUARIO, COD_DOC_DOC, NOMBRE_DOC, FECHA_SUBIDA, DESCRIPCION) VALUES
(24, 0, '1402927388-Anka_Soft.pdf', '2014-06-16', 'prueba'),
(31, 0, '1403491168-Anka_Soft.pdf', '2014-06-22', 'adfa');

--
-- Dumping data for table 'entrega'
--

INSERT INTO entrega (ID_ENTREGA, COD_GRUPO, ID_EVENTO, NOMBRE_ENTREGA, FECHA_ENTREGA, COMENTARIO) VALUES
(1, 7, 4, 'documento A', '2014-05-29', 'documento A'),
(2, 7, 5, 'documento B', '2014-05-30', 'documento B'),
(3, 7, 6, 'hito', '2014-06-11', 'fhajhfj'),
(4, 7, 8, 'documento general ', '2014-06-13', 'validacion de la base de datos');

--
-- Dumping data for table 'evento'
--

INSERT INTO evento (FECHA_EVENTO, INICIO, ID_EVENTO, ID_TIPO_EVENTO, ID_USUARIO, AVISO, DIAS) VALUES
('2014-06-01 00:00:00', '0000-00-00 00:00:00', 1, 1, 12, 'el documento A se subio ', 0),
('2014-05-14 00:00:00', '0000-00-00 00:00:00', 2, 2, 13, 'el documento B', 0),
('2014-06-02 00:00:00', '0000-00-00 00:00:00', 3, 2, 21, 'el documento B se subio', 0),
('2014-05-29 00:00:00', '0000-00-00 00:00:00', 4, 1, 5, 'documento A ', 0),
('2014-05-30 00:00:00', '0000-00-00 00:00:00', 5, 2, 6, 'el documento B', 0),
('2014-06-11 00:00:00', '0000-00-00 00:00:00', 6, 4, 25, 'primer hito', 0),
('2014-06-12 00:00:00', '0000-00-00 00:00:00', 7, 4, 27, 'primer hito', 0),
('2014-06-13 00:00:00', '0000-00-00 00:00:00', 8, 5, 5, 'validacion de la base de datos', 0),
('2014-06-27 17:21:01', '2014-06-16 17:21:22', 9, 4, 7, 'hito numero 2', 0),
('2014-05-20 17:22:46', '2014-05-06 17:22:16', 10, 4, 7, 'hito numero 1', 0),
('2014-04-25 00:00:00', '2014-04-25 00:00:00', 12, 4, 6, 'hito3-grupo7', 0),
('2014-05-26 00:00:00', '2014-04-25 00:00:00', 13, 5, 6, 'documento-grupo7', 0);

--
-- Dumping data for table 'evento_particular'
--

INSERT INTO evento_particular (COD_GRUPO, ID_EVENTO) VALUES
(5, 9),
(5, 10),
(7, 12);

--
-- Dumping data for table 'formulario'
--

INSERT INTO formulario (ID_FORM, NOMBRE_FORM, CONTROLADOR) VALUES
(2, 'Registrar Grupo', 'grupo'),
(3, 'Inscribirse', 'registrarseGrupo'),
(5, 'Ver Grupos', 'controladorVerGrupo'),
(6, 'Dar Baja Grupo', 'listaGrupos'),
(8, 'incluir lista de estudiantes', 'csvcontroller'),
(9, 'fijar fechas de entrega de hit', 'calendar2'),
(10, 'subir documentos convocatoria', 'subirDocDocente'),
(11, 'Registrarse', 'registrar'),
(12, 'Docentes', 'docente'),
(13, 'Grupos existentes', 'gruposInscritosGlobal'),
(14, 'Calificacion Hitos', 'notahitos'),
(15, 'Calificacion Estudiantes', 'notaEstudiante'),
(18, 'Datos Grupo', 'controladorDatos'),
(19, 'Integrantes', 'integrantes'),
(16, 'Documentos', 'controladorDoc'),
(17, 'Hitos ', 'controladorHito'),
(20, 'volver', 'retornar'),
(21, 'subir hito', 'subirHito'),
(22, 'subir documentos', 'subirDocEst'),
(23, 'Historias de Usuario', 'historia');

--
-- Dumping data for table 'grupo'
--

INSERT INTO grupo (COD_GRUPO, ID_DOCENTE, ID_REPRESENTANTE, CORREO_GRUPO, NOMBRE_LARGO, NOMBRE_CORTO, PASSW_GRUPO, ACTIVO) VALUES
(5, 31, 7, 'softEli@gmail.com', 'desarrollo de software Eli', 'softEli', 'aaAA55', 1),
(6, 31, 15, 'sofgolty@gmail.com', 'dfee bere  eli', 'softGolty', 'dfasdfwe', 1),
(7, 24, 25, 'abc@gmail.es', 'Algo vhjsdfh', 'ABC', 'abc123', 1),
(8, 24, 26, 'jas@vshd.com', 'dsf123 $%&amp;', 'jas', 'j123456', 1),
(9, 6, 27, 'gokuBall@gmail.com', 'super sayayin', 'goku', 'Goku2014', 1),
(10, 24, 2, 'edrosoft@gmail.com', 'desarrolo de software aguila andina', 'edrosoft', 'Edrosoft2014', 0);

--
-- Dumping data for table 'historia_usuario'
--

INSERT INTO historia_usuario (ID_HISTORIA, ID_HITO, COD_GRUPO, RESPONSABLE, NOM_HISTORIA, EVALUACION_EST, EVALUACION_DOC) VALUES
(9, 5, 7, 9, 'hito2-g7-historia2-luna salinas lucas', 0, 0),
(8, 4, 7, 9, 'hito1-g7-historiaA-luna salinas lucas', 0, 0),
(7, 5, 7, 6, 'hito2-g7-historia1-salinas lopez sergio', 0, 0),
(10, 5, 7, 25, 'h2-T3-g7-perez-montan-juan', 0, 0),
(11, 6, 7, 5, 'H1-g7-h3-quispe siles franklin', 0, 0),
(12, 6, 7, 9, 'H2-g7-h3-luna salinas lucas', 0, 0),
(13, 6, 7, 14, 'NUEVA HISTORIA-H3-NELLY', 0, 0);

--
-- Dumping data for table 'hito'
--

INSERT INTO hito (ID_HITO, COD_GRUPO, ID_EVENTO, NOMBRE_HITO, NOTA_FINAL) VALUES
(4, 7, NULL, 'hito 1 del grupo7', 10),
(5, 7, NULL, 'hito 2 del grupo7', 10),
(6, 7, 12, 'hito3-grupo7', 10);

--
-- Dumping data for table 'integrantes_grupo'
--

INSERT INTO integrantes_grupo (COD_GRUPO, ID_USUARIO) VALUES
(5, 7),
(6, 11),
(6, 12),
(6, 15),
(7, 5),
(7, 6),
(7, 9),
(7, 14),
(7, 25),
(8, 26),
(9, 12),
(9, 13),
(9, 21),
(9, 23),
(9, 27),
(10, 2);

--
-- Dumping data for table 'nota'
--

INSERT INTO nota (ID_ENTREGA, CALIFICACION, OBSERVACION) VALUES
(3, 89, 'no estan bien terminadas las historias ');

--
-- Dumping data for table 'nota_estudiante'
--

INSERT INTO nota_estudiante (ID_USUARIO, NOTA_ESTUDIANTE) VALUES
(7, 50),
(12, 45),
(13, 45),
(14, 20),
(15, 0),
(21, 60),
(23, 0),
(25, 70),
(26, 0),
(27, 0);

--
-- Dumping data for table 'rol'
--

INSERT INTO rol (ID_ROL, NOMBRE_ROL) VALUES
(1, 'docente'),
(2, 'estudiante'),
(3, 'cliente'),
(4, 'managerProyect'),
(5, 'general'),
(6, 'grupo');

--
-- Dumping data for table 'rol_formulario'
--

INSERT INTO rol_formulario (ID_FORM, ID_ROL) VALUES
(1, 2),
(2, 2),
(3, 2),
(5, 1),
(6, 1),
(8, 1),
(9, 2),
(10, 1),
(11, 5),
(12, 5),
(13, 2),
(14, 1),
(15, 1),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 2),
(22, 2),
(23, 2);

--
-- Dumping data for table 'rol_usuario'
--

INSERT INTO rol_usuario (ID_ROL, ID_USUARIO) VALUES
(1, 1),
(1, 4),
(1, 18),
(1, 22),
(1, 24),
(1, 29),
(1, 31),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
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
(2, 30);

--
-- Dumping data for table 'tipo_evento'
--

INSERT INTO tipo_evento (ID_TIPO_EVENTO, NOMBRE_TIPO_EVENTO) VALUES
(1, 'documento_a'),
(2, 'documento_b'),
(3, 'reunion_grupo'),
(4, 'hito'),
(5, 'documento_general');

--
-- Dumping data for table 'usuario'
--

INSERT INTO usuario (ID_USUARIO, NOMBRE, APELLIDOP, APELLIDOM, LOGGIN, PASSW, CORREO, ACTIVO, CI_DOCENTE) VALUES
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
(30, 'mary', 'aiza', 'colque', 'mary', 'Mar1a1za', 'jana.cloe@gmail.com', 0, 0),
(31, 'rosa', 'colque', 'choque', 'rosa', 'Rosa123', 'rosa@gmail.com', 0, 3725444);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
