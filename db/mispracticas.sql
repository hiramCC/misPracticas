-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 08:08:34
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
-- Base de datos: `mispracticas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_perfiles`
--

CREATE TABLE `cat_perfiles` (
  `id_perfil` int(4) NOT NULL,
  `nombre_perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_perfiles`
--

INSERT INTO `cat_perfiles` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preregistro`
--

CREATE TABLE `preregistro` (
  `id_preregistro` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preregistro`
--

INSERT INTO `preregistro` (`id_preregistro`, `nombre`, `apaterno`, `amaterno`, `correo`, `contrasenia`, `rol`) VALUES
(1, 'USER', 'ASD', 'ASD', 'admin@gmail.com', '$2y$10$9T0TmxfzDTbNKomf9.KHzOeKju0Llkev5xoTQiup6JXRkEmBA1SH2', 1),
(3, 'USER', 'ASD', 'ASD', 'user@gmail.com', '$2y$10$MLYrpyLS7f0Mq2R5eUdLTuqukmnvQitSkHBUuuKshBfN3KuawAnje', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_perfiles`
--
ALTER TABLE `cat_perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  ADD PRIMARY KEY (`id_preregistro`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_perfiles`
--
ALTER TABLE `cat_perfiles`
  MODIFY `id_perfil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  MODIFY `id_preregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preregistro`
--
ALTER TABLE `preregistro`
  ADD CONSTRAINT `preregistro_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `cat_perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
