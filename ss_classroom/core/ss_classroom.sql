-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2019 a las 14:37:51
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ss_classroom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_tareas`
--

CREATE TABLE `alumno_tareas` (
  `id_alumno_tareas` bigint(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tarea` bigint(20) DEFAULT NULL,
  `calificacion` decimal(10,0) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_tareas`
--

INSERT INTO `alumno_tareas` (`id_alumno_tareas`, `id_usuario`, `id_tarea`, `calificacion`, `archivo`, `status`) VALUES
(17, 39, 15, '9', 'generate_tickets.pdf', 1),
(19, 39, 17, '9', 'microkernel.png', 2),
(20, 39, 18, '8', 'MINIX_1.jpg', 2),
(21, 39, 19, '9', 'El_papel_de_la_heuristica_en_IA.pdf', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` tinyint(4) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` bigint(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `id_usuario`, `titulo`, `descripcion`, `fecha_publicacion`, `fecha_entrega`) VALUES
(15, 81, 'Sistema de ventas', '¿Qué es?, ejemplos, usos.', '2019-08-12 05:00:00', '2019-08-13 05:00:00'),
(16, 3, 'Contruir un robot asistente', 'Utiliza las herramientas futuristas que  compraste en amazon', '2019-08-15 05:00:00', '2019-08-23 05:00:00'),
(17, 3, 'Ver ep1. de \"Altered carbon\"', 'Hacer un ensayo sobre el tema de la película', '2019-08-15 05:00:00', '2019-08-16 05:00:00'),
(18, 3, 'Limpieza', 'Limpiar su computadora de los archivos que ya no utilicen', '2019-08-15 05:00:00', '2019-08-14 05:00:00'),
(19, 3, 'Investigación', 'Agentes inteligentes\r\n- Características\r\n- Utilidades', '2019-08-15 05:00:00', '2019-08-16 05:00:00'),
(36, 3, 'Ver \"Historias de miedo\"', 'Hacer un resumen de 1 cuartilla mínimo.', '2019-08-27 20:27:00', '2019-08-29 04:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` tinyint(4) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `numero_cuenta` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre`, `apellidos`, `numero_cuenta`, `email`, `password`) VALUES
(1, 1, 'Daniela', 'Rodríguez', NULL, 'drodriguez@email.com', 'admin123'),
(3, 2, 'Omar', 'Olivera', NULL, 'oolivera@email.com', 'omar123'),
(39, 3, 'Avril', 'Lavigne', '20097851', 'alavigne@email.com', 'avril123'),
(42, 1, 'Jarvis', 'Stark', NULL, 'jstark@email.com', 'jarvis123'),
(81, 2, 'Barry', 'Allen', NULL, 'ballen@email.com', 'barry123'),
(82, 2, 'Eidi', 'Hernand', NULL, 'ehernand@email.com', 'eidi123'),
(83, 2, 'Alex', 'Danvers', NULL, 'adanvers@email.com', 'alex123'),
(86, 2, 'Gabriela', 'Rodríguez', NULL, 'grodriguez@email.com', 'gabriela123'),
(87, 3, 'Kara', 'Danvers', '20097852', 'kdanvers@email.com', 'kara123'),
(88, 3, 'Cisco', 'Ramon', '20097853', 'cramon@email.com', 'cisco123'),
(89, 3, 'Caitlin', 'Snow', '20097854', 'csnow@email.com', 'caitlin123'),
(90, 3, 'Margarita', 'Pérez', '20097855', 'mperez@email.com', 'margarit123'),
(91, 3, 'Carlos', 'Olivera', '20097856', 'colivera@email.com', 'carlos123'),
(92, 3, 'Óscar', 'Cortés', '20097857', 'ocortes@email.com', 'oscar123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  ADD PRIMARY KEY (`id_alumno_tareas`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tarea` (`id_tarea`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  MODIFY `id_alumno_tareas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  ADD CONSTRAINT `alumno_tareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_tareas_ibfk_2` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
