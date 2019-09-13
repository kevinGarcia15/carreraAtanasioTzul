-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2019 a las 22:44:10
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_carrera_atanacio_tzul`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `no_atletas` ()  BEGIN SELECT count(*) as atletas FROM corredor; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seleccionarDatos` ()  SELECT c.id_corredor as id_corredor, i.numero_atleta as numero,i.fecha_participacion as fecha_participacion, Nombre,Rama, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad, Email, p.nombre_pais pais
	FROM 	corredor c
    JOIN inscripcion i on i.corredor_id_corredor = c.id_corredor
    JOIN municipio m on c.municipio_id_municipio = m.id_municipio            	JOIN departamento d on m.departamento_id_departamento = d.id_departamento
    JOIN pais p on d.pais_id_pais = p.id_pais
	ORDER BY numero ASC
	LIMIT 	3000$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_test` ()  BEGIN
       select COUNT(*) from corredor;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validacion` ()  SELECT CUI, Numero from corredor WHERE CUI = CUI$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corredor`
--

CREATE TABLE `corredor` (
  `id_corredor` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `CUI` bigint(20) UNSIGNED DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Rama` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_inscripcion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Usuario_id_usuario` int(11) NOT NULL,
  `municipio_id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `corredor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_depto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais_id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_depto`, `pais_id_pais`) VALUES
(1, 'Totonicapán', 1),
(2, 'Quetzaltenago', 1),
(3, 'Quiche', 1),
(4, 'San Marcos', 1),
(5, 'Guatemala', 1),
(6, 'Peten ', 1),
(7, 'Solola', 1),
(8, 'Alta Verapaz', 1),
(9, 'Baja Verapaz', 1),
(10, 'Izabal', 1),
(11, 'Huehuetenango', 1),
(12, 'Chimaltenango', 1),
(13, 'El Progreso', 1),
(14, 'Escuintla', 1),
(15, 'Jalapa', 1),
(16, 'Jutiapa', 1),
(17, 'Retalhuleu', 1),
(18, 'Sacatepequez', 1),
(19, 'Santa Rosa', 1),
(20, 'Suchitepequez', 1),
(21, 'Chiquimula', 1),
(22, 'Zacapa', 1),
(23, 'Antigua y Barbuda', 2),
(24, 'Argentina', 3),
(25, 'Bahamas', 4),
(26, 'Barbados', 5),
(27, 'Belice', 6),
(28, 'Bolivia', 7),
(29, 'Brasil', 8),
(30, 'Canadá', 9),
(31, 'Chile', 10),
(32, 'Colombia', 11),
(33, 'Costa Rica', 12),
(34, 'Cuba', 13),
(35, 'Dinamarca', 14),
(36, 'Ecuador', 15),
(37, 'El Salvador', 16),
(38, 'Estados Unidos', 17),
(39, 'Granada', 18),
(40, 'Guyana', 19),
(41, 'Haiti', 20),
(42, 'Honduras', 21),
(43, 'Jamaica', 22),
(44, 'México', 23),
(45, 'Nicaragua', 24),
(46, 'Panamá', 25),
(47, 'Paraguay', 26),
(48, 'Perú', 27),
(49, 'República Dominicana', 28),
(50, 'San Cristobal y Nevis', 29),
(51, 'San Vincente y Granadinas', 30),
(52, 'Santa Lucía', 31),
(53, 'Surinam', 32),
(54, 'Trinidad y Tobago', 33),
(55, 'Uruguay', 34),
(56, 'Venezuela', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id_familiar` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Corredor_id_corredor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `familiar`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL,
  `numero_atleta` int(11) NOT NULL,
  `fecha_participacion` year(4) NOT NULL COMMENT 'Año en que se realiza el evento',
  `corredor_id_corredor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento_id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `departamento_id_departamento`) VALUES
(2, 'Totonicapan', 1),
(3, 'Santa Lucia la Reforma', 1),
(4, 'San Bartolo', 1),
(5, 'Momostenango', 1),
(6, 'Santa Maria Chiquimula', 1),
(7, 'San Francisco El Alto', 1),
(8, 'San Cristobal Totonicapán', 1),
(9, 'San Andres Xecul', 1),
(10, 'Quetzaltenango', 2),
(11, 'San Carlos Sija', 2),
(12, 'Almolonga', 2),
(13, 'Cabrican', 2),
(14, 'Cajolá', 2),
(15, 'Cantel', 2),
(16, 'Coatepeque', 2),
(17, 'Colomba Costa Cuca', 2),
(18, 'Concepción Chiquirichapa', 2),
(19, 'El Palmar', 2),
(20, 'Flores Costa Cuca', 2),
(21, 'Génova Costa Cuca', 2),
(22, 'Huitán', 2),
(23, 'La Esperanza', 2),
(24, 'Olintepeque', 2),
(25, 'Palestina de los Altos', 2),
(26, 'Salcajá', 2),
(27, 'San Francisco La Unión', 2),
(28, 'San Juan Ostuncalco', 2),
(29, 'San Martín Sacatepéquez', 2),
(30, 'San Mateo', 2),
(31, 'San Miguel Siguila', 2),
(32, 'Sibilia', 2),
(33, 'Zunil', 2),
(34, 'Santa Cruz del Quiché', 3),
(35, 'Chiché', 3),
(36, 'Chinique', 3),
(37, 'Zacualpa', 3),
(38, 'Chajul', 3),
(39, 'Chichicastenango', 3),
(40, 'Patzité', 3),
(41, 'San Antonio Ilotenango', 3),
(42, 'San Pedro Jocopilas', 3),
(43, 'Cunén', 3),
(44, 'San Juan Cotzal', 3),
(45, 'Joyabaj', 3),
(46, 'Nebaj', 3),
(47, 'San Andrés Sajcabajá', 3),
(48, 'Uspantán', 3),
(49, 'Sacapulas', 3),
(50, 'San Bartolomé Jocotenango', 3),
(51, 'Canillá', 3),
(52, 'Chicamán', 3),
(53, 'Ixcán', 3),
(54, 'Ayutla', 4),
(55, 'El quetzal', 4),
(56, 'Ixchiguan', 4),
(57, 'Ocòs', 4),
(58, 'San Cridtobal Cucho', 4),
(59, 'San miguel ixchiguan', 4),
(60, 'Sibinal', 4),
(61, 'Tejutla', 4),
(62, 'Catarina', 4),
(63, 'El Rodeo', 4),
(64, 'La Reforma', 4),
(65, 'Pajapita', 4),
(66, 'San José Ojetenam', 4),
(67, 'San Pablo', 4),
(68, 'Sipacapa', 4),
(69, 'Comitancillo', 4),
(70, 'El Tumbador', 4),
(71, 'Malacatán', 4),
(72, 'Río Blanco', 4),
(73, 'San Lorenzo', 4),
(74, 'San Pedro Sacatepéquez', 4),
(75, 'Tacaná', 4),
(76, 'Concepción Tutuapa', 4),
(77, 'Esquipulas Palo Gordo', 4),
(78, 'Nuevo Progreso', 4),
(79, 'San Antonio Sacatepéquez', 4),
(80, 'San Marcos', 4),
(81, 'San Rafael Pie de La Cuesta', 4),
(82, 'Tajumulco', 4),
(83, 'Amatitlán', 5),
(84, 'Guatemala', 5),
(85, 'San José Pinula', 5),
(86, 'San Pedro Sacatepéquez', 5),
(87, 'Villa Nueva', 5),
(88, 'Chinautla', 5),
(89, 'Mixco', 5),
(90, 'San Juan Sacatepéquez', 5),
(91, 'San Raymundo', 5),
(92, 'Chuarrancho', 5),
(93, 'Palencia', 5),
(94, 'San Miguel Petapa', 5),
(95, 'Santa Catarina Pinula', 5),
(96, 'Fraijanes', 5),
(97, 'San José del Golfo', 5),
(98, 'San Pedro Ayampuc', 5),
(99, 'Villa Canales', 5),
(100, 'Dolores', 6),
(101, 'Melchor de Mencos', 6),
(102, 'San Francisco', 6),
(103, 'Sayaxché', 6),
(104, 'Flores', 6),
(105, 'Poptún', 6),
(106, 'San José', 6),
(107, 'La Libertad', 6),
(108, 'San Andrés', 6),
(109, 'San Luis', 6),
(110, 'Las Cruces', 6),
(111, 'San Benito', 6),
(112, 'Santa Ana', 6),
(113, 'Concepción', 7),
(114, 'San Antonio Palopó', 7),
(115, 'San Marcos La Laguna', 7),
(116, 'Santa Catarina Palopó', 7),
(117, 'Santa María Visitación', 7),
(118, 'Nahualá', 7),
(119, 'San José Chacayá', 7),
(120, 'San Pablo La Laguna', 7),
(121, 'Santa Clara La Laguna', 7),
(122, 'Santiago Atitlán', 7),
(123, 'Panajachel', 7),
(124, 'San Juan La Laguna', 7),
(125, 'San Pedro La Laguna', 7),
(126, 'Santa Cruz La Laguna', 7),
(127, 'Sololá', 7),
(128, 'San Andrés Semetabaj', 7),
(129, 'San Lucas Tolimán', 7),
(130, 'Santa Catarina Ixtahuacan', 7),
(131, 'Santa Lucía Utatlán', 7),
(132, 'Chahal', 8),
(133, 'Lanquín', 8),
(134, 'San Juan Chamelco', 8),
(135, 'Santa María Cahabón', 8),
(136, 'Tucurú', 8),
(137, 'Chisec', 8),
(138, 'Panzós', 8),
(139, 'San Pedro Carchá', 8),
(140, 'Senahú', 8),
(141, 'Cobán', 8),
(142, 'Raxruhá', 8),
(143, 'Santa Catalina La Tinta', 8),
(144, 'Tactic', 8),
(145, 'Fray Bartolomé de las Casas', 8),
(146, 'San Cristóbal Verapaz', 8),
(147, 'Santa Cruz Verapaz', 8),
(148, 'Tamahú', 8),
(149, 'Cubulco', 9),
(150, 'Salamá', 9),
(151, 'Granados', 9),
(152, 'San Jerónimo', 9),
(153, 'Purulhá', 9),
(154, 'San Miguel Chicaj', 9),
(155, 'Rabinal', 9),
(156, 'Santa Cruz el Chol', 9),
(157, 'El Estor', 10),
(158, 'Puerto Barrios', 10),
(159, 'Livingston', 10),
(160, 'Los Amates', 10),
(161, 'Morales', 10),
(162, 'Aguacatán', 11),
(163, 'Cuilco', 11),
(164, 'La Libertad', 11),
(165, 'San Gaspar Ixchil', 11),
(166, 'San Mateo Ixtatán', 11),
(167, 'San Rafael La Independencia', 11),
(168, 'Santa Ana Huista', 11),
(169, 'Santiago Chimaltenango', 11),
(170, 'Chiantla', 11),
(171, 'Huehuetenango', 11),
(172, 'Malacatancito', 11),
(173, 'San Ildefonso Ixtahuacán', 11),
(174, 'San Miguel Acatán', 11),
(175, 'San Rafael Petzal', 11),
(176, 'Santa Bárbara', 11),
(177, 'Tectitán', 11),
(178, 'Colotenango', 11),
(179, 'Jacaltenango', 11),
(180, 'Nentón', 11),
(181, 'San Juan Atitán', 11),
(182, 'San Pedro Necta', 11),
(183, 'San Sebastián Coatán', 11),
(184, 'Santa Cruz Barillas', 11),
(185, 'Todos Santos Cuchumatánes', 11),
(186, 'Concepción Huista', 11),
(187, 'La Democracia', 11),
(188, 'San Antonio Huista', 11),
(189, 'San Juan Ixcoy', 11),
(190, 'San Pedro Soloma', 11),
(191, 'San Sebastián', 11),
(192, 'Santa Eulalia', 11),
(193, 'Unión Cantinil', 11),
(194, 'Acatenango', 12),
(195, 'Patzicía', 12),
(196, 'San José Poaquil', 12),
(197, 'Santa Cruz Balanyá', 12),
(198, 'Chimaltenango', 12),
(199, 'Patzún', 12),
(200, 'San Juan Comalapa', 12),
(201, 'Tecpán', 12),
(202, 'El Tejar', 12),
(203, 'Pochuta', 12),
(204, 'San Martín Jilotepeque', 12),
(205, 'Yepocapa', 12),
(206, 'Parramos', 12),
(207, 'San Andrés Itzapa', 12),
(208, 'Santa Apolonia', 12),
(209, 'Zaragoza', 12),
(210, 'El Jícaro', 13),
(211, 'San Antonio La Paz', 13),
(212, 'Guastatoya', 13),
(213, 'San Cristóbal Acasaguastlán', 13),
(214, 'Morazán', 13),
(215, 'Sanarate', 13),
(216, 'San Agustín Acasaguastlán', 13),
(217, 'Sansare', 13),
(218, 'Escuintla', 14),
(219, 'La Gomera', 14),
(220, 'San José', 14),
(221, 'Tiquisate', 14),
(222, 'Guanagazapa', 14),
(223, 'Masagua', 14),
(224, 'San Vicente Pacaya', 14),
(225, 'Iztapa', 14),
(226, 'Nueva Concepción', 14),
(227, 'Santa Lucía Cotzumalguapa', 14),
(228, 'La Democracia', 14),
(229, 'Palín', 14),
(230, 'Siquinalá', 14),
(231, 'Jalapa', 15),
(232, 'San Luis Jilotepeque', 15),
(233, 'Mataquescuintla', 15),
(234, 'San Manuel Chaparrón', 15),
(235, 'Monjas', 15),
(236, 'San Pedro Pinula', 15),
(237, 'San Carlos Alzatate', 15),
(238, 'Agua Blanca', 16),
(239, 'Conguaco', 16),
(240, 'Jerez', 16),
(241, 'Quesada', 16),
(242, 'Zapotitlán', 16),
(243, 'Asunción Mita', 16),
(244, 'El Adelanto', 16),
(245, 'Jutiapa', 16),
(246, 'San José Acatempa', 16),
(247, 'Atescatempa', 16),
(248, 'El Progreso', 16),
(249, 'Moyuta', 16),
(250, 'Santa Catarina Mita', 16),
(251, 'Comapa', 16),
(252, 'Jalpatagua', 16),
(253, 'Pasaco', 16),
(254, 'Yupiltepeque', 16),
(255, 'Champerico', 17),
(256, 'San Andrés Villa Seca', 17),
(257, 'Santa Cruz Muluá', 17),
(258, 'El Asintal', 17),
(259, 'San Felipe', 17),
(260, 'Nuevo San Carlos', 17),
(261, 'San Martín Zapotitlán', 17),
(262, 'Retalhuleu', 17),
(263, 'San Sebastián', 17),
(264, 'Alotenango', 18),
(265, 'Magdalena Milpas Altas', 18),
(266, 'San Lucas Sacatepéquez', 18),
(267, 'Santa María de Jesús', 18),
(268, 'La Antigua Guatemala', 18),
(269, 'Pastores', 18),
(270, 'San Miguel Dueñas', 18),
(271, 'Santiago Sacatepéquez', 18),
(272, 'Ciudad Vieja', 18),
(273, 'San Antonio Aguas Calientes', 18),
(274, 'Santa Catarina Barahona', 18),
(275, 'Santo Domingo Xenacoj', 18),
(276, 'Jocotenango', 18),
(277, 'San Bartolomé Milpas Altas', 18),
(278, 'Santa Lucía Milpas Altas', 18),
(279, 'Sumpango', 18),
(280, 'Barberena', 19),
(281, 'Guazacapán', 19),
(282, 'San Juan Tecuaco', 19),
(283, 'Santa Rosa de Lima', 19),
(284, 'Casillas', 19),
(285, 'Nueva Santa Rosa', 19),
(286, 'San Rafaél Las Flores', 19),
(287, 'Taxisco', 19),
(288, 'Chiquimulilla', 19),
(289, 'Oratorio', 19),
(290, 'Santa Cruz Naranjo', 19),
(291, 'Cuilapa', 19),
(292, 'Pueblo Nuevo Viñas', 19),
(293, 'Santa María Ixhuatán', 19),
(294, 'Chicacao', 20),
(295, 'Pueblo Nuevo', 20),
(296, 'San Bernardino', 20),
(297, 'San Juan Bautista', 20),
(298, 'Santa Bárbara', 20),
(299, 'Cuyotenango', 20),
(300, 'Río Bravo', 20),
(301, 'San Francisco Zapotitlán', 20),
(302, 'San Lorenzo', 20),
(303, 'Santo Domingo', 20),
(304, 'Mazatenango', 20),
(305, 'Samayac', 20),
(306, 'San Gabriel', 20),
(307, 'San Miguel Panán', 20),
(308, 'Santo Tomás La Unión', 20),
(309, 'Patulul', 20),
(310, 'San Antonio', 20),
(311, 'San José El Ídolo', 20),
(312, 'San Pablo Jocopilas', 20),
(313, 'Zunilito', 20),
(314, 'Camotán', 21),
(315, 'Ipala', 21),
(316, 'San Jacinto', 21),
(317, 'Chiquimula', 21),
(318, 'Jocotán', 21),
(319, 'San José La Arada', 21),
(320, 'Concepción Las Minas', 21),
(321, 'Olopa', 21),
(322, 'San Juan Ermita', 21),
(323, 'Esquipulas', 21),
(324, 'Quezaltepeque', 21),
(325, 'Cabañas', 22),
(326, 'La Unión', 22),
(327, 'Usumatlán', 22),
(328, 'Estanzuela', 22),
(329, 'Río Hondo', 22),
(330, 'Zacapa', 22),
(331, 'Gualán', 22),
(332, 'San Diego', 22),
(333, 'Huité', 22),
(334, 'Teculután', 22),
(335, 'Antigua y Barbuda', 23),
(336, 'Argentina', 24),
(337, 'Bahamas', 25),
(338, 'Barbados', 26),
(339, 'Belice', 27),
(340, 'Bolivia', 28),
(341, 'Brasil', 29),
(342, 'Canadá', 30),
(343, 'Chile', 31),
(344, 'Colombia', 32),
(345, 'Costa Rica', 33),
(346, 'Cuba', 34),
(347, 'Dinamarca', 35),
(348, 'Ecuador', 36),
(349, 'El Salvador', 37),
(350, 'Estados Unidos', 38),
(351, 'Granada', 39),
(352, 'Guyana', 40),
(353, 'Haiti', 41),
(354, 'Honduras', 42),
(355, 'Jamaica', 43),
(356, 'México', 44),
(357, 'Nicaragua', 45),
(358, 'Panamá', 46),
(359, 'Paraguay', 47),
(360, 'Perú', 48),
(361, 'República Dominicana', 49),
(362, 'San Cristobal y Nevis', 50),
(363, 'San Vincente y Granadinas', 51),
(364, 'Santa Lucía', 52),
(365, 'Surinam', 53),
(366, 'Trinidad y Tobago', 54),
(367, 'Uruguay', 55),
(368, 'Venezuela', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'Guatemala'),
(2, 'Antigua y Barbuda'),
(3, 'Argentina'),
(4, 'Bahamas'),
(5, 'Barbados'),
(6, 'Belice'),
(7, 'Bolivia'),
(8, 'Brasil'),
(9, 'Canadá'),
(10, 'Chile'),
(11, 'Colombia'),
(12, 'Costa Rica'),
(13, 'Cuba'),
(14, 'Dinamarca'),
(15, 'Ecuador'),
(16, 'El Salvador'),
(17, 'Estados Unidos'),
(18, 'Granada'),
(19, 'Guyana'),
(20, 'Haiti'),
(21, 'Honduras'),
(22, 'Jamaica'),
(23, 'México'),
(24, 'Nicaragua'),
(25, 'Panamá'),
(26, 'Paraguay'),
(27, 'Perú'),
(28, 'República Dominicana'),
(29, 'San Cristobal y Nevis'),
(30, 'San Vincente y Granadinas'),
(31, 'Santa Lucía'),
(32, 'Surinam'),
(33, 'Trinidad y Tobago'),
(34, 'Uruguay'),
(35, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CUI` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Hash_clave` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Salt` bigint(20) NOT NULL,
  `Estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Es el rol que lo identifica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Nombre`, `Usuario`, `CUI`, `Telefono`, `Email`, `Hash_clave`, `Salt`, `Estado`, `Rol`) VALUES
(3, 'Kevin Tomás de Jesús Garcia Castro', 'tom_castro', '2750050030801', '57469663', 'kevin-t-g@hotmail.com', '19a65dcc68117a15b55d2d0927e5c44e3d73e75fa87724fbc64b20e61f03d808', 913299, 'A', 'Administrador'),
(4, 'Walter Jeremias Pretzancin ', 'walter_pretz', '456789455412', '47162720', 'internautaporsiempre@gmail.com', '35ab83780356e368a28284966a727f4ed190f9f3e9d14dbb5fa1287db198b1ec', 509228, 'A', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `corredor`
--
ALTER TABLE `corredor`
  ADD PRIMARY KEY (`id_corredor`),
  ADD UNIQUE KEY `CUI` (`CUI`),
  ADD KEY `Usuario_id_usuario` (`Usuario_id_usuario`),
  ADD KEY `corredor_ibfk_2` (`municipio_id_municipio`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `pais_id_pais` (`pais_id_pais`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id_familiar`),
  ADD KEY `Corredor_id_corredor` (`Corredor_id_corredor`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `corredor_id_corredor` (`corredor_id_corredor`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento_id_departamento` (`departamento_id_departamento`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `CUI` (`CUI`),
  ADD UNIQUE KEY `usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `corredor`
--
ALTER TABLE `corredor`
  MODIFY `id_corredor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id_familiar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `corredor`
--
ALTER TABLE `corredor`
  ADD CONSTRAINT `corredor_ibfk_1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `corredor_ibfk_2` FOREIGN KEY (`municipio_id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`pais_id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`Corredor_id_corredor`) REFERENCES `corredor` (`id_corredor`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`corredor_id_corredor`) REFERENCES `corredor` (`id_corredor`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`departamento_id_departamento`) REFERENCES `departamento` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
