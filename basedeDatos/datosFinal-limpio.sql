-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2014 at 09:15 a.m.
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


--
-- Dumping data for table 'entrega'
--


--
-- Dumping data for table 'evento'
--


--
-- Dumping data for table 'evento_particular'
--


--
-- Dumping data for table 'formulario'
--

INSERT INTO formulario VALUES(2, 'Registrar Grupo', 'grupo');
INSERT INTO formulario VALUES(3, 'Inscribirse', 'registrarseGrupo');
INSERT INTO formulario VALUES(5, 'Ver Grupos', 'controladorVerGrupo');
INSERT INTO formulario VALUES(6, 'Dar Baja Grupo', 'listaGrupos');
INSERT INTO formulario VALUES(8, 'incluir lista de estudiantes', 'csvcontroller');
INSERT INTO formulario VALUES(9, 'fijar fechas de entrega de hit', 'calendar2');
INSERT INTO formulario VALUES(10, 'subir documentos convocatoria', 'subirDocDocente');
INSERT INTO formulario VALUES(11, 'Registrarse', 'registrar');
INSERT INTO formulario VALUES(12, 'Docentes', 'docente');
INSERT INTO formulario VALUES(13, 'Grupos existentes', 'gruposInscritosGlobal');
INSERT INTO formulario VALUES(14, 'Calificacion Hitos', 'notaHitos');
INSERT INTO formulario VALUES(15, 'Calificacion Estudiantes', 'notaEstudiante');
INSERT INTO formulario VALUES(18, 'Datos Grupo', 'controladorDatos');
INSERT INTO formulario VALUES(19, 'Integrantes', 'integrantes');
INSERT INTO formulario VALUES(16, 'Documentos', 'controladorDoc');
INSERT INTO formulario VALUES(17, 'Hitos ', 'controladorHito');
INSERT INTO formulario VALUES(20, 'volver', 'retornar');
INSERT INTO formulario VALUES(21, 'subir hito', 'subirHito');
INSERT INTO formulario VALUES(22, 'subir documentos', 'subirDocEst');
INSERT INTO formulario VALUES(23, 'Historias de Usuario', 'historia');

--
-- Dumping data for table 'grupo'
--

INSERT INTO grupo VALUES(1, 3, 6, 'get@gmail.com', 'desarrollo de software', 'getun', 'GGaa11', 1);
INSERT INTO grupo VALUES(2, 9, 7, 'tresoft@gmail.com', 'recursivo e integral desarrollo de sofware', 'tresoftware', 'AAaa11', 1);
INSERT INTO grupo VALUES(3, 9, 15, 'ankasoft@gmail.com', 'desarrollo bolivia andino', 'ankaSoft', 'aaAA11', 1);

--
-- Dumping data for table 'historia_usuario'
--

INSERT INTO historia_usuario VALUES(1, 1, 2, 1, 'tarea1 g2 h1', 0, 0);
INSERT INTO historia_usuario VALUES(2, 2, 2, 7, 'tarea2 g2 h2', 0, 0);
INSERT INTO historia_usuario VALUES(3, 2, 2, 8, 'tarea1 g2 h2', 0, 0);
INSERT INTO historia_usuario VALUES(4, 3, 2, 1, 'tarea1 g2 h3', 0, 0);
INSERT INTO historia_usuario VALUES(5, 1, 2, 8, 'realizar registro de estudiante', 0, 0);
INSERT INTO historia_usuario VALUES(6, 1, 2, 8, 'realizar registro de estudiante', 0, 0);
INSERT INTO historia_usuario VALUES(7, 1, 2, 1, 'dar de baja grupo por parte de docente', 0, 0);
INSERT INTO historia_usuario VALUES(8, 3, 2, 7, 'reincorporar estudiante por parte del frupo', 0, 0);
INSERT INTO historia_usuario VALUES(9, 2, 2, 1, 'ELIMINAR INTEGRANTE DE GRUPO', 0, 0);
INSERT INTO historia_usuario VALUES(10, 2, 2, 7, 'Nueva historia', 0, 0);
INSERT INTO historia_usuario VALUES(11, 2, 2, 1, 'Nueva historia', 0, 0);

--
-- Dumping data for table 'hito'
--

INSERT INTO hito VALUES(1, 2, 0, 'hito 1', 0);
INSERT INTO hito VALUES(2, 2, 0, 'hito 2 g2', 0);
INSERT INTO hito VALUES(3, 2, 0, 'hito3 g2', 0);
INSERT INTO hito VALUES(4, 2, 0, 'Hito 4', 0);

--
-- Dumping data for table 'integrantes_grupo'
--

INSERT INTO integrantes_grupo VALUES(1, 4);
INSERT INTO integrantes_grupo VALUES(1, 5);
INSERT INTO integrantes_grupo VALUES(1, 6);
INSERT INTO integrantes_grupo VALUES(2, 1);
INSERT INTO integrantes_grupo VALUES(2, 7);
INSERT INTO integrantes_grupo VALUES(2, 8);
INSERT INTO integrantes_grupo VALUES(3, 11);
INSERT INTO integrantes_grupo VALUES(3, 12);
INSERT INTO integrantes_grupo VALUES(3, 15);

--
-- Dumping data for table 'nota'
--


--
-- Dumping data for table 'nota_estudiante'
--

INSERT INTO nota_estudiante VALUES(12, 0);
INSERT INTO nota_estudiante VALUES(11, 0);
INSERT INTO nota_estudiante VALUES(15, 0);
INSERT INTO nota_estudiante VALUES(1, 56);
INSERT INTO nota_estudiante VALUES(8, 36);
INSERT INTO nota_estudiante VALUES(5, 0);
INSERT INTO nota_estudiante VALUES(4, 0);
INSERT INTO nota_estudiante VALUES(7, 45);
INSERT INTO nota_estudiante VALUES(6, 0);

--
-- Dumping data for table 'rol'
--

INSERT INTO rol VALUES(1, 'docente');
INSERT INTO rol VALUES(2, 'estudiante');
INSERT INTO rol VALUES(3, 'cliente');
INSERT INTO rol VALUES(4, 'managerProyect');
INSERT INTO rol VALUES(5, 'general');
INSERT INTO rol VALUES(6, 'grupo');

--
-- Dumping data for table 'rol_formulario'
--

INSERT INTO rol_formulario VALUES(1, 2);
INSERT INTO rol_formulario VALUES(2, 2);
INSERT INTO rol_formulario VALUES(3, 2);
INSERT INTO rol_formulario VALUES(5, 1);
INSERT INTO rol_formulario VALUES(6, 1);
INSERT INTO rol_formulario VALUES(8, 1);
INSERT INTO rol_formulario VALUES(9, 2);
INSERT INTO rol_formulario VALUES(10, 1);
INSERT INTO rol_formulario VALUES(11, 5);
INSERT INTO rol_formulario VALUES(12, 5);
INSERT INTO rol_formulario VALUES(13, 2);
INSERT INTO rol_formulario VALUES(14, 1);
INSERT INTO rol_formulario VALUES(15, 1);
INSERT INTO rol_formulario VALUES(16, 6);
INSERT INTO rol_formulario VALUES(17, 6);
INSERT INTO rol_formulario VALUES(18, 6);
INSERT INTO rol_formulario VALUES(19, 6);
INSERT INTO rol_formulario VALUES(20, 6);
INSERT INTO rol_formulario VALUES(21, 2);
INSERT INTO rol_formulario VALUES(22, 2);
INSERT INTO rol_formulario VALUES(23, 2);

--
-- Dumping data for table 'rol_usuario'
--

INSERT INTO rol_usuario VALUES(1, 3);
INSERT INTO rol_usuario VALUES(1, 9);
INSERT INTO rol_usuario VALUES(1, 16);
INSERT INTO rol_usuario VALUES(1, 17);
INSERT INTO rol_usuario VALUES(2, 1);
INSERT INTO rol_usuario VALUES(2, 2);
INSERT INTO rol_usuario VALUES(2, 4);
INSERT INTO rol_usuario VALUES(2, 5);
INSERT INTO rol_usuario VALUES(2, 6);
INSERT INTO rol_usuario VALUES(2, 7);
INSERT INTO rol_usuario VALUES(2, 8);
INSERT INTO rol_usuario VALUES(2, 10);
INSERT INTO rol_usuario VALUES(2, 11);
INSERT INTO rol_usuario VALUES(2, 12);
INSERT INTO rol_usuario VALUES(2, 13);
INSERT INTO rol_usuario VALUES(2, 14);
INSERT INTO rol_usuario VALUES(2, 15);

--
-- Dumping data for table 'tipo_evento'
--

INSERT INTO tipo_evento VALUES(1, 'documento_a');
INSERT INTO tipo_evento VALUES(2, 'documento_b');
INSERT INTO tipo_evento VALUES(3, 'reunion_grupo');
INSERT INTO tipo_evento VALUES(4, 'hito');
INSERT INTO tipo_evento VALUES(5, 'documento_general');

--
-- Dumping data for table 'usuario'
--

INSERT INTO usuario VALUES(1, 'marco', 'aguanta', 'soliz', 'mark', 'AAaa33', 'marc@homail.com', 1, 0, 0);
INSERT INTO usuario VALUES(2, 'eli', 'bravo', 'flores', 'eliBrav', 'AAaa11', 'eli@gmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(3, 'marcos', 'lopez', 'kotun', 'kotun', 'AAaa11', 'lic.marc@homail.com', 1, 4448627, 1);
INSERT INTO usuario VALUES(4, 'david', 'choque', 'choque', 'devidad', 'AAaa11', 'devid@gmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(5, 'andrea', 'luna', 'luna', 'andy', 'AAaa11', 'and@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(6, 'emilson', 'montalvo', 'montalvo', 'emilonito', 'AAaa11', 'emil@gmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(7, 'hector', 'molina', 'lonoy', 'lonoy', 'AAaa11', 'lonoy@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(8, 'maria', 'linor', 'mamanni', 'mary', 'AAaa11', 'mary@gmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(9, 'elizabet', 'bravo', 'flores', 'elycita', 'AAaa11', 'elici@gmail.com', 1, 2365148, 2);
INSERT INTO usuario VALUES(10, 'noemi', 'choque', 'lopez', 'noem4', 'AAaa11', 'noem@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(11, 'marcelo', 'aguanta', 'lionol', 'marce', 'AAaa11', 'marce@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(12, 'leonel', 'choque', 'lopez', 'leoLop', 'AAaa11', 'lion@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(13, 'rodolfo', 'luna', 'luna', 'rodo', 'AAaa11', 'odor45@gmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(14, 'isabela', 'luna', 'luna', 'isab', 'AAaa11', 'sai@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(15, 'eliana', 'higo', 'higo', 'elianita', 'AAaa11', 'elian@hotmail.com', 1, 0, 0);
INSERT INTO usuario VALUES(16, 'pablo', 'Acero', 'acero', 'acero', 'AAaa11', 'acer@gmail.com', 1, 2652359, 3);
INSERT INTO usuario VALUES(17, 'corina', 'flores', 'flores', 'corina', 'AAaa11', 'corin@gmail.com', 1, 6559548, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
