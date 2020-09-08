-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-09-2019 a las 14:30:11
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
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `id_usuario`, `titulo`, `descripcion`, `fecha_publicacion`, `fecha_entrega`) VALUES
(60, 3, 'Comprar una SmarTV', 'Sony', '2019-09-28 00:13:00', '2019-09-28 17:12:00'),
(64, 3, 'A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;', 'A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;', '2019-09-28 01:16:00', '2019-09-28 17:12:00'),
(65, 3, '&lt;script&gt;alert(&quot;Te rompí&quot;)&lt;/script&gt;', '&lt;script&gt;alert(&quot;Te rompí&quot;)&lt;/script&gt;', '2019-09-28 01:18:00', '2019-09-28 17:12:00'),
(66, 3, '&lt;script&gt;alert(&quot;Te rompí&quot;)&lt;/script&gt;', '&lt;script&gt;alert(&quot;Te rompí&quot;)&lt;/script&gt;', '2019-09-28 01:25:00', '2019-09-27 17:12:00'),
(67, 3, '&quot; or &quot;&quot;=&quot;', '&quot; or &quot;&quot;=&quot;', '2019-09-28 04:47:00', '2019-09-30 17:12:00'),
(69, 3, '&lt;body onload=alert(&#039;test1&#039;)&gt;', '&lt;body onload=alert(&#039;test1&#039;)&gt;', '2019-09-28 04:49:00', '2019-10-01 17:12:00'),
(70, 3, 'Comprar un teclado gamer', 'Marca Cooler Master', '2019-09-28 04:59:00', '2019-10-05 04:23:00'),
(71, 3, 'Felicitar a Avril Lavigne por su cumpleaños.', 'Comprarle un pastel y comérselo usted.', '2019-09-28 05:06:00', '2019-09-29 17:12:00'),
(73, 3, 'comer palomitas de doritos', 'una bolsa', '2019-09-30 18:47:00', '2019-10-04 18:50:00'),
(75, 3, 'asdasd', 'asdasdasdasdasdasd', '2019-09-30 18:57:00', '2019-10-23 19:01:00'),
(76, 3, '&lt;script&gt;alert(&quot;Mira lo que puedo hacer&quot;)&lt;/script&gt;', '&lt;script&gt;alert(&quot;Mira lo que puedo hacer&quot;)&lt;/script&gt;', '2019-09-30 19:28:00', '2019-10-03 19:29:00');

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
(91, 3, 'Carlos', 'Olivera', '20097856', 'colivera@email.com', 'carlos123'),
(108, 2, 'Enrique', 'Rosas', NULL, 'erosas@email.com', 'enrique123'),
(110, 2, 'Juan Gabriel', 'Cruz', NULL, 'jcruz@email.com', 'juan123'),
(112, 2, 'doña', 'tota', NULL, 'dtota@email.com', 'doña123'),
(129, 3, 'café', 'latte', '20097858', 'clatte@email.com', 'cafe123'),
(150, 2, 'Buzz', 'Lightyear', NULL, 'blightyear@email.com', 'buzz123'),
(152, 2, 'Audio', 'slave', NULL, 'aslave@email.com', 'audio123'),
(157, 2, 'Samsung', 'Galaxy', NULL, 'sgalaxy@email.com', 'samsung123'),
(158, 2, 'Karina', 'Perry', NULL, 'kperry@email.com', 'katy123'),
(159, 3, 'Nicki', 'Minaj', '20097862', 'nminaj@email.com', 'nicki123'),
(160, 3, 'Taylor', 'Swift', '20097863', 'tswift@email.com', 'taylor123'),
(161, 2, 'Blake', 'Neely', NULL, 'bneely@email.com', 'blake123'),
(162, 3, 'Daniela', 'Haim', '20097868', 'dhaim@email.com', 'danielle123'),
(163, 2, 'Florence', 'Welch', NULL, 'fwelch@email.com', 'florence123'),
(164, 2, 'Black', 'Sabbath', NULL, 'bsabbath@email.com', 'black123'),
(166, 2, 'Pedro', 'Fernández', NULL, 'pfernandez@email.com', 'pedro123'),
(168, 3, 'Iron', 'Man', '20197851', 'iman@email.com', 'iron123'),
(169, 2, 'Ángel', 'Salvador', NULL, 'asalvador@email.com', 'angel123');

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
  MODIFY `id_tarea` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
