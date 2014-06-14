-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2014 at 02:17 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";




--
-- Dumping data for table 'usuario'
--

INSERT INTO usuario (ID_USUARIO, NOMBRE, apellidoM, apellidoP, LOGGIN, PASSW, CORREO, ACTIVO, ci_docente) VALUES
(16, 'janet', 'nuvia', 'luna', 'janca', 'AAaa11', 'janet@gmail.com', 1, NULL),
(15, 'richart', 'miranda', NULL, 'ririo', 'AAaa11', 'riog@hotmail.com', 1, NULL),
(14, 'nelly', 'flores', 'quispe', 'nelly', 'AAaa11', 'nelly@hotmail.com', 1, NULL),
(13, 'cristian', 'lopez', 'cespedes', 'cristare', 'AAaa11', 'cristian@gmail.com', 1, NULL),
(12, 'carlos', 'cespedes', 'mamani', 'carlun', 'AAaa11', 'carlos@gmail.com', 1, NULL),
(11, 'luis', 'luna', 'rodriguez', 'Lponk', 'AAaa11', 'luiK@gmail.com', 1, NULL),
(10, 'marco', 'cespedes', 'bult', 'linma', 'AAaa11', 'marcLinV@gmail.com', 1, NULL),
(9, 'lucas', 'salinas', 'luna', 'LucG', 'AAaa99', 'luc@gmail.com', 1, NULL),
(8, 'juan', 'mamani', 'castro', 'JMont', 'AAaa88', 'juaMon@gmail.com', 1, NULL),
(7, 'jony', 'arjona', 'castro', 'JhonC', 'AAaa77', 'jon@gmail.com', 1, NULL),
(6, 'sergio', 'lopez', 'salinas', 'serL', 'AAaa66', 'serg@gmail.com', 1, NULL),
(5, 'franklin', 'siles', 'quispe', 'franco', 'Franco1', 'franco@gmail.com', 1, NULL),
(4, 'alex', 'flores', 'rodriguez', 'polal21', 'AAaa11', 'polal21@gmail.com', 1, NULL),
(3, 'emilson', 'rodriguez', 'lopez', 'eleazar', 'Raptor1989', 'emilsonrod@gmail.com', 1, NULL),
(2, 'carla', 'Mamani', 'Quispe', 'carlita', 'AAaa11', 'AAaa11', 1, NULL),
(1, 'marco', 'Luna', 'Salinas', 'marquito', 'AAaa11', 'marc@gmail.com', 1, NULL),
(17, 'luis', 'humer', 'trainer', 'lumon', 'AAaa11', 'monlu@gmail.com', 1, NULL),
(18, 'boris', 'navia', 'calancha', 'borisito', 'AAaa11', 'boris@gmail.com', 1, '7892458'),
(19, 'kdjfdjfkl', 'cvm', 'mbnbjgut', 'kjhkhoti', 'AAAaa11', 'hghgh@hotmail.com', 1, NULL),
(20, 'kdjfdjfkl', 'cvm', 'mbnbjgut', 'kjhkh', 'AAAaa11', 'hgtrh@hotmail.com', 1, NULL),
(21, 'franko', 'agtun', 'flores', 'agtuni', 'aaAA11', 'agt@gmail.com', 1, NULL),
(22, 'franko', 'agtun', 'flores', 'agtuni2', 'aaAA11', 'agt2@gmail.com', 1, '4789652'),
(23, 'marco', 'aguanta', 'aguanta', 'anggel', 'AAaa11', 'der@hotmail.com', 1, NULL),
(24, 'Ana', 'Martinez', 'Lopez', 'ana', 'Ana123', 'ana@hotmail.com', 1, '12345678'),
(25, 'Juan', 'Montan', 'Perez', 'juan', 'Juan123', 'juan@gmail.com', 1, NULL),
(26, 'Maria', 'Marin', 'arnez', 'maria', 'Maria123', 'moni@gmail.com', 1, NULL),
(27, 'evo', 'ayma', 'morales', 'huevo', 'Huevo2014', 'huev@gmail.com', 1, NULL),
(28, 'maria', 'delgado', 'lopez', 'mariLop', 'maria2014L', 'mari@gmail.com', 1, NULL),
(29, 'victor', 'lozada', 'sanchez', 'vicoc', 'Vito2014', 'vitoc@gmail.com', 1, '7596453');

--
-- Dumping data for table 'formulario'
--

INSERT INTO formulario (ID_FORM, NOMBRE_FORM, controlador) VALUES
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
(13, 'Grupos existentes', 'gruposInscritosGlobal'),
(14, 'Calificacion Hitos', 'notaHitos'),
(15, 'Calificacion Estudiantes', 'notaEstudiante');
--
-- Dumping data for table 'rol'
--

INSERT INTO rol (ID_ROL, NOMBRE_ROL) VALUES
(1, 'docente'),
(2, 'estudiante'),
(3, 'cliente'),
(4, 'managerProyect'),
(5, 'general');

--
-- Dumping data for table 'rol_formulario'
--

INSERT INTO rol_formulario (ID_FORM, ID_ROL) VALUES
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
(13, 2),
(14,1),
(15,1);
-- Dumping data for table 'grupo'
--

INSERT INTO grupo (COD_GRUPO, ID_DOCENTE, ID_REPRESENTANTE, CORREO_GRUPO, NOMBRE_LARGO, NOMBRE_CORTO, PASSW_GRUPO, ACTIVO) VALUES
(5, 1, 7, 'softEli@gmail.com', 'desarrollo de software Eli', 'softEli', 'aaAA55', 1),
(6, 6, 15, 'sofgolty@gmail.com', 'dfee bere  eli', 'softGolty', 'dfasdfwe', 1),
(7, 24, 25, 'abc@gmail.es', 'Algo vhjsdfh', 'ABC', 'abc123', 1),
(8, 24, 26, 'jas@vshd.com', 'dsf123 $%&amp;', 'jas', 'j123456', 1),
(9, 6, 27, 'gokuBall@gmail.com', 'super sayayin', 'goku', 'Goku2014', 1);


--
-- Dumping data for table 'integrantes_grupo'
--

INSERT INTO integrantes_grupo (COD_GRUPO, ID_USUARIO) VALUES
(5, 7),
(6, 15),
(7, 25),
(8, 26),
(9, 12),
(9, 13),
(9, 21),
(9, 23),
(9, 27);
--
-- Dumping data for table 'rol_usuario'
--

INSERT INTO rol_usuario (ID_ROL, ID_USUARIO) VALUES
(1, 1),
(1, 4),
(1, 6),
(1, 18),
(1, 22),
(1, 24),
(1, 29),
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
(2, 28);
----------------------------------
INSERT INTO tipo_evento(id_tipo_evento,nombre_tipo_evento) VALUES
(1,'documento_a'),
(2,'documento_b'),
(3,'reunion_grupo'),
(4,'hito'),
(5,'documneto_general');

INSERT INTO nota_estudiante
(id_usuario,nota_estudiante,observacion_estudiante) VALUES
(7,50,'vacio'),
(12,45,'vacio'),
(13,45,'vacio'),
(14,0,'vacio'),
(15,0,'vacio'),
(21,60,'vacio'),
(23,0,'vacio'),
(25,0,'vacio'),
(26,0,'vacio'),
(27,0,'vacio');




