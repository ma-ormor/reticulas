-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 20:03:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reticulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `c_id` varchar(20) NOT NULL,
  `c_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`c_id`, `c_nombre`) VALUES
('ISIC-2010-224', 'Ing. Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `m_id` varchar(20) NOT NULL,
  `m_nombre` varchar(40) NOT NULL,
  `m_h_teoria` int(11) NOT NULL,
  `m_h_practica` int(11) NOT NULL,
  `m_h_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`m_id`, `m_nombre`, `m_h_teoria`, `m_h_practica`, `m_h_total`) VALUES
('ACA-0907', 'Taller de Etica', 0, 4, 4),
('ACA-0909', 'Taller de Investigacion I', 0, 4, 4),
('ACA-0910', 'Taller de Investigacion II', 0, 4, 4),
('ACC-0906 ', 'Fundamentos de InvestigaciÃ³n', 2, 2, 4),
('ACD-0908', 'Desarrollo Sustentable', 2, 2, 4),
('ACF-0901', 'Calculo Diferencial', 3, 2, 5),
('ACF-0902', 'Calculo Integral', 3, 2, 5),
('ACF-0903', 'Algebra Lineal', 3, 2, 5),
('ACF-0904', 'Calculo Vectorial', 3, 2, 5),
('ACF-0905', 'Ecuaciones Diferenciales', 3, 2, 5),
('AEB-1055', 'Programacion Web', 1, 4, 5),
('AEC-1008', 'Contabilidad Financiera', 2, 2, 4),
('AEC-1034', 'Fundamentos de Telecomunicaciones', 2, 2, 4),
('AEC-1058', 'Quimica', 2, 2, 4),
('AEC-1061', 'Sistemas Operativos', 2, 2, 4),
('AED-1026', 'Estructura de Datos', 2, 3, 5),
('AED-1285', 'Fundamentos de ProgramaciÃ³n', 0, 0, 0),
('AED-1286', 'Programacion Orientada a Objetos', 2, 3, 5),
('AEF-1031', 'Fundamentos de Base de Datos', 3, 2, 5),
('AEF-1041', 'MatemÃ¡ticas Discretas', 3, 2, 5),
('AEF-1052', 'Probabilidad y Estadistica', 3, 2, 5),
('SCA-1002', 'Administracion de Redes', 0, 4, 4),
('SCA-1025', 'Taller de Base de Datos', 0, 4, 4),
('SCA-1026', 'Taller de Sistemas Operativos', 0, 4, 4),
('SCB-1001', 'Administracion de Base de Datos', 1, 4, 5),
('SCC-1005', 'Cultura Empresarial', 2, 2, 4),
('SCC-1007', 'Fundamentos de Ingenieria de Software', 2, 2, 4),
('SCC-1010', 'Graficacion', 2, 2, 4),
('SCC-1012', 'Inteligencia Artificial', 2, 2, 4),
('SCC-1013', 'Investigacion de Operaciones', 2, 2, 4),
('SCC-1014', 'Lenguajes de Interfaz', 2, 2, 4),
('SCC-1017', 'Metodos Numericos', 2, 2, 4),
('SCC-1019', 'Programacion Logica y Funcional', 2, 2, 4),
('SCC-1023', 'Sistemas Programables', 2, 2, 4),
('SCD-1003', 'Arquitectura de Computadoras', 2, 3, 5),
('SCD-1004', 'Conmutacion y Enrutamiento en Redes de D', 2, 3, 5),
('SCD-1011', 'Ingenieria de Software', 2, 3, 5),
('SCD-1015', 'Lenguajes y Automatas I', 2, 3, 5),
('SCD-1016', 'Lenguajes y Automatas II', 2, 3, 5),
('SCD-1018', 'Principios Electricos y Aplicaciones Dig', 2, 3, 5),
('SCD-1021', 'Redes de Computadoras', 2, 3, 5),
('SCD-1022', 'Simulacion', 2, 3, 5),
('SCD-1027', 'Topicos Avanzados de Programacion', 2, 3, 5),
('SCF-1006', 'Fisica General', 3, 2, 5),
('SCG-1009', 'Gestion de Proyectos de Software', 3, 3, 6),
('SCH-1024', 'Taller de AdministraciÃ³n', 1, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `c_id` varchar(20) NOT NULL,
  `m_id` varchar(20) NOT NULL,
  `s_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`c_id`, `m_id`, `s_numero`) VALUES
('ISIC-2010-224', 'ACA-0907', 1),
('ISIC-2010-224', 'ACA-0909', 7),
('ISIC-2010-224', 'ACA-0910', 8),
('ISIC-2010-224', 'ACC-0906', 1),
('ISIC-2010-224', 'ACD-0908', 3),
('ISIC-2010-224', 'ACF-0901', 1),
('ISIC-2010-224', 'ACF-0902', 2),
('ISIC-2010-224', 'ACF-0903', 2),
('ISIC-2010-224', 'ACF-0904', 3),
('ISIC-2010-224', 'ACF-0905', 4),
('ISIC-2010-224', 'AEB-1055', 8),
('ISIC-2010-224', 'AEC-1008', 2),
('ISIC-2010-224', 'AEC-1034', 5),
('ISIC-2010-224', 'AEC-1058', 2),
('ISIC-2010-224', 'AEC-1061', 5),
('ISIC-2010-224', 'AED-1026', 3),
('ISIC-2010-224', 'AED-1285', 1),
('ISIC-2010-224', 'AED-1286', 2),
('ISIC-2010-224', 'AEF-1031', 4),
('ISIC-2010-224', 'AEF-1041 ', 1),
('ISIC-2010-224', 'AEF-1052', 2),
('ISIC-2010-224', 'SCA-1002', 8),
('ISIC-2010-224', 'SCA-1025', 5),
('ISIC-2010-224', 'SCA-1026', 6),
('ISIC-2010-224', 'SCB-1001', 6),
('ISIC-2010-224', 'SCC-1005', 3),
('ISIC-2010-224', 'SCC-1007', 5),
('ISIC-2010-224', 'SCC-1010', 5),
('ISIC-2010-224', 'SCC-1012', 9),
('ISIC-2010-224', 'SCC-1013', 3),
('ISIC-2010-224', 'SCC-1014', 6),
('ISIC-2010-224', 'SCC-1017', 4),
('ISIC-2010-224', 'SCC-1019', 8),
('ISIC-2010-224', 'SCC-1023 ', 7),
('ISIC-2010-224', 'SCD-1003', 5),
('ISIC-2010-224', 'SCD-1004', 7),
('ISIC-2010-224', 'SCD-1011', 6),
('ISIC-2010-224', 'SCD-1015', 6),
('ISIC-2010-224', 'SCD-1016', 7),
('ISIC-2010-224', 'SCD-1018', 4),
('ISIC-2010-224', 'SCD-1021', 6),
('ISIC-2010-224', 'SCD-1022', 4),
('ISIC-2010-224', 'SCD-1027', 4),
('ISIC-2010-224', 'SCF-1006', 3),
('ISIC-2010-224', 'SCG-1009', 7),
('ISIC-2010-224', 'SCH-1024', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`c_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`m_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`c_id`,`m_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `carrera` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semestre_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `materia` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
