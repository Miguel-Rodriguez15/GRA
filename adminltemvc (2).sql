-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2022 a las 15:22:50
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminltemvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nombre_rol`, `estado`) VALUES
(1, 'administrador', 1),
(2, 'programador de rutas\r\n', 1),
(3, 'ciudadano', 1),
(4, 'coordinador de operaciones', 1),
(5, 'coordinador', 0),
(6, 'conductor\r\n\r\n', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(123) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(123) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `telefono` varchar(123) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(123) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_usuario` (`cedula`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `apellido`, `rol`, `telefono`, `usuario`, `clave`, `estado`) VALUES
(1, '1234567', 'Jorge marrugo', 'ochoa jimenez', 3, '3002095593', 'jorge@gmail.com', '12345', '1'),
(10, '8234', 'Jose luis', 'Rodriguez Ochoa', 2, '902304', 'joserodriguez@gmail.com', '1233456', '0'),
(15, '8972', 'Cristian', 'Ramos', 4, '920934', 'Cristian@gmail.com', '09876', '0'),
(16, '0987', 'Cristian', 'Ramos', 6, '745893', 'Cristian@gmail.com', '32546', '0'),
(17, '12313', 'prueba2', 'ochoa', 2, '2532154', 'luis@gmail.com', '12345', '0'),
(18, '0935', 'Miguel David', 'Rodriguez Ochoa', 4, '903854', 'miguel@gmail.com', '12345', '1'),
(19, 'prueba', 'prueba2', 'prueba2', 4, '1231432', 'prueba@gmail.com', '12345', '1'),
(24, '092343', 'prueba2', 'ochoa', 3, '2532154', 'luis@gmail.com', '12345', '1'),
(26, '83054', 'prueba2', 'ochoa', 4, '2532154', 'luis@gmail.com', '12345', '1'),
(27, '0593', 'ana', 'camargo', 3, '2532154', 'ana@gmail.com', '12345', '1'),
(28, '12436', 'gina', 'Diaz', 4, '2532154', 'luis@gmail.com', '12345', '1'),
(29, '2345565', 'prueba2', 'ochoa', 3, '2532154', 'luis@gmail.com', '12345', '1'),
(30, '3465', 'pedro', 'gonzales', 3, '903854', 'pedro@gmail.com', '12345', '1'),
(31, '2354', 'paola', 'sanchez', 3, '2532154', 'paola@gmail.com', '0987', '1'),
(35, '1234456', 'prueba', 'prueba', 3, '2532154', 'prueba1@gmail.com', '1234', '1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
