-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2019 a las 14:13:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `idEncuesta` int(5) NOT NULL,
  `encTitulo` varchar(150) CHARACTER SET latin1 NOT NULL,
  `encDescripcion` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idEncuesta`, `encTitulo`, `encDescripcion`) VALUES
(1, 'Primer encuesta de prueba', 'Es una encuesta que estoy generando para probar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` int(11) NOT NULL,
  `pregDescripcion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `idEncuesta` int(5) NOT NULL,
  `idRespTipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `respValor` varchar(250) CHARACTER SET latin1 NOT NULL,
  `idPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_opcion`
--

CREATE TABLE `respuesta_opcion` (
  `idRespuestaOpcion` int(11) NOT NULL,
  `opRespvalor` varchar(250) CHARACTER SET latin1 NOT NULL,
  `idPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_tipo`
--

CREATE TABLE `respuesta_tipo` (
  `idRespTipo` int(4) NOT NULL,
  `respTipoDescripcion` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta_tipo`
--

INSERT INTO `respuesta_tipo` (`idRespTipo`, `respTipoDescripcion`) VALUES
(1, 'Texto'),
(2, 'Dropdown'),
(3, 'Checkbox');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idEncuesta`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `idEncuesta` (`idEncuesta`),
  ADD KEY `idRespTipo` (`idRespTipo`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `idPregunta` (`idPregunta`);

--
-- Indices de la tabla `respuesta_opcion`
--
ALTER TABLE `respuesta_opcion`
  ADD PRIMARY KEY (`idRespuestaOpcion`),
  ADD KEY `idPregunta` (`idPregunta`);

--
-- Indices de la tabla `respuesta_tipo`
--
ALTER TABLE `respuesta_tipo`
  ADD PRIMARY KEY (`idRespTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idEncuesta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta_opcion`
--
ALTER TABLE `respuesta_opcion`
  MODIFY `idRespuestaOpcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta_tipo`
--
ALTER TABLE `respuesta_tipo`
  MODIFY `idRespTipo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`),
  ADD CONSTRAINT `pregunta_ibfk_2` FOREIGN KEY (`idRespTipo`) REFERENCES `respuesta_tipo` (`idRespTipo`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);

--
-- Filtros para la tabla `respuesta_opcion`
--
ALTER TABLE `respuesta_opcion`
  ADD CONSTRAINT `respuesta_opcion_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
