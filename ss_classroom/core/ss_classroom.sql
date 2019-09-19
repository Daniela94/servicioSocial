-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2019 a las 20:14:05
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
(25, 3, 'Cantar canción de Florence + The Machine', 'Only if for a night', '2019-09-18 20:30:00', '2019-09-19 21:00:00'),
(26, 3, 'Limpiar su casa', 'Barrer y trapear la cocina y la sala.', '2019-09-18 20:51:00', '2019-09-18 22:20:00'),
(27, 3, 'Visitar el museo de Riplay', 'Hacer apuntes de lo que más te gustó.', '2019-09-18 21:14:00', '2019-09-18 21:50:00'),
(28, 3, 'Comer galletas', '1 paquete de Chokis', '2019-09-18 21:23:00', '2019-09-18 23:50:00');

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
(87, 3, 'Kara', 'Danvers', '20097852', 'kdanvers@email.com', 'kara123'),
(88, 3, 'Cisco', 'Ramon', '20097853', 'cramon@email.com', 'cisco123'),
(89, 3, 'Caitlin', 'Snow', '20097854', 'csnow@email.com', 'caitlin123'),
(90, 3, 'Margarita', 'Pérez', '20097855', 'mperez@email.com', 'margarit123'),
(91, 3, 'Carlos', 'Olivera', '20097856', 'colivera@email.com', 'carlos123'),
(108, 2, 'Mac', 'Henry', NULL, 'mhenry@email.com', 'mac123'),
(110, 2, 'burrito', 'gris', NULL, 'bgris@email.com', 'burrito123'),
(112, 2, 'doña', 'tota', NULL, 'dtota@email.com', 'doña123'),
(115, 2, 'carlos', 'junior', NULL, 'cjunior@email.com', 'carlos123'),
(129, 3, 'cafe', 'latte', '20097858', 'clatte@email.com', 'cafe123'),
(144, 2, 'ariana', 'grande', NULL, 'agrande@email.com', 'ariana123'),
(145, 2, 'Hayley', 'Williams', NULL, 'hwilliams@emai.com', 'ayley123'),
(147, 2, 'It', 'Pennywise', NULL, 'ipennywise@email.com', 'it123'),
(150, 2, 'Buzz', 'Lightyear', NULL, 'blightyear@email.com', 'buzz123'),
(152, 2, 'Audio', 'slave', NULL, 'aslave@email.com', 'audio123'),
(157, 2, 'Samsung', 'Galaxy', NULL, 'sgalaxy@email.com', 'samsung123'),
(158, 3, 'Katy', 'Perry', '20097861', 'kperry@email.com', 'katy123'),
(159, 3, 'Nicki', 'Minaj', '20097862', 'nminaj@email.com', 'nicki123'),
(160, 3, 'Taylor', 'Swift', '20097863', 'tswift@email.com', 'taylor123'),
(161, 2, 'Blake', 'Neely', NULL, 'bneely@email.com', 'blake123'),
(162, 3, 'Danielle', 'Haim', '20097868', 'dhaim@email.com', 'danielle123');

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
  MODIFY `id_alumno_tareas` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

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
