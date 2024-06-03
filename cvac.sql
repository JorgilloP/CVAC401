-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 08:54:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cvac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `paciente` varchar(60) NOT NULL,
  `edad` int(11) NOT NULL,
  `raza` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `fecha`, `usuario`, `paciente`, `edad`, `raza`) VALUES
(1, '2024-06-15', 1, 'Max', 16, 'Labrador Retriever'),
(2, '2024-06-16', 2, 'Luna', 10, 'Bulldog Francés'),
(3, '2024-06-17', 3, 'Rocky', 11, 'Pastor Alemán'),
(4, '2024-06-18', 4, 'Lola', 9, 'Golden Retriever'),
(5, '2024-06-19', 5, 'Coco', 17, 'Pug'),
(7, '2024-06-19', 6, 'Maxin', 5, 'Pitbull'),
(8, '2024-06-20', 6, 'Toby', 6, 'Pitbull');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `mensaje`) VALUES
(1, 'Carlos García', 5523412345, 'carlos.garcia@example.com', 'Estoy interesado en agendar una cita.'),
(2, 'Ana López', 5523456789, 'ana.lopez@example.com', 'Necesito más información sobre sus servicios.'),
(3, 'José Martínez', 5545678901, 'jose.martinez@example.com', '¿Cuál es el horario de atención?'),
(4, 'María Rodríguez', 5512345678, 'maria.rodriguez@example.com', 'Me gustaría saber los costos de las consultas.'),
(5, 'Luis Fernández', 5587654321, 'luis.fernandez@example.com', 'Tengo una pregunta sobre mi última cita.'),
(6, 'Jorge', 5613735834, 'jorge@gmail.com', 'Quiero agendar una cita');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
