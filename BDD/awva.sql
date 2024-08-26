-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2024 a las 06:45:07
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `awva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `archivo_path` varchar(255) NOT NULL,
  `estado` enum('Pendiente','Aceptado','Rechazado') DEFAULT 'Pendiente',
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp(),
  `maestro_id` int(11) DEFAULT NULL,
  `motivo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `usuario_id`, `titulo`, `archivo_path`, `estado`, `fecha_subida`, `maestro_id`, `motivo`) VALUES
(1, 2, 'Carta Termino', 'Carta_Termino_1724644692.pdf', 'Pendiente', '2024-08-26 11:58:12', 1, NULL),
(2, 2, 'Memoria', 'Memoria_1724644968.pdf', 'Pendiente', '2024-08-26 12:02:48', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `proposito` varchar(255) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `documento_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `nombre`, `proposito`, `contenido`, `documento_path`) VALUES
(1, 'Carta Presentacion', 'Introducirte a un empleador potencial y resaltar tus habilidades y experiencias relevantes.', 'Información sobre quién eres, tu interés en la posición, y cómo tus habilidades y experiencia se alinean con los requisitos del trabajo.', 'Carta_Presentacion_1724641488.pdf'),
(2, 'Carta de Aceptacion', 'Confirmar formalmente que aceptas una oferta de empleo, admisión a una institución educativa, participación en un programa, etc.', 'Agradecimiento por la oferta, confirmación de aceptación, detalles relevantes (fecha de inicio, condiciones, etc.).', 'Carta_de_Aceptacion_1724642083.pdf'),
(3, 'Memoria de Estadias', 'Documentar y reflexionar sobre las experiencias y aprendizajes adquiridos durante un período específico de prácticas o estancias.', 'Descripción de las actividades realizadas, logros, desafíos superados y cómo la experiencia contribuyó al crecimiento personal o profesional.', 'Memoria_de_Estadias_1724642293.pdf'),
(4, 'Carta de Termino', 'Comunicar la culminación exitosa de un programa, curso, proyecto o trabajo.', 'Resumen de lo logrado, agradecimientos a las personas o instituciones involucradas, y cualquier información adicional necesaria.', 'Carta_de_Termino_1724642737.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo_usuario` enum('Estudiante','Profesor','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `contrasena`, `tipo_usuario`) VALUES
(1, 'Dante', 'Garcia', 'sared646@gmial.com', '123', 'Profesor'),
(2, 'Alumno', 'Garcia', 'sared646@gmail.com', '123', 'Estudiante'),
(4, 'Alberto', 'Garcia', 'sared66@gmail.com', '123', 'Profesor'),
(5, 'Juanma', 'Fernandez', 'sared46@gmail.com', '123', 'Profesor'),
(6, 'Admin', 'Admin', 'asdasd@646gmail.com', '123', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `maestro_id` (`maestro_id`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`maestro_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
