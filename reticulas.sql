-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 00:21:34
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
  `m_nombre` varchar(30) NOT NULL,
  `m_horas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`m_id`, `m_nombre`, `m_horas`) VALUES
('ACA-0907', 'Taller de Etica', '0 4 4'),
('ACC-0906 ', 'Fundamentos de InvestigaciÃ³n', '2 2 4'),
('ACF-0901', 'Calculo Diferencial', '3 2 5'),
('AED-1285', 'Fundamentos de ProgramaciÃ³n', ''),
('AEF-1041', 'MatemÃ¡ticas Discretas', '3 2 5'),
('SCH-1024', 'Taller de AdministraciÃ³n', '1 3 4');

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
('ISIC-2010-224', 'ACC-0906', 1),
('ISIC-2010-224', 'ACF-0901', 1),
('ISIC-2010-224', 'AED-1285', 1),
('ISIC-2010-224', 'AEF-1041 ', 1),
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
