-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-11-2022 a las 22:32:31
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
  `id_roles` int(120) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'programador de rutas\r\n'),
(3, 'ciudadano'),
(4, 'coordinador de operaciones'),
(5, 'coordinador'),
(6, 'conductor\r\n\r\n');

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
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(123) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_usuario` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `apellido`, `rol`, `foto`, `telefono`, `email`, `password`) VALUES
(1, '123', 'Jorge luis', 'Rodriguez Camargo', 3, 'vista/imagenes/usuarios/en-todo-el-mundo.png', '3135419852', 'luis@gmail.com', '12345'),
(10, '8234', 'Jose ', 'Rodriguez Camargo', 1, 'vista/imagenes/usuarios/617.jpg', '902304', 'joserodriguez@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auEdwxD5OQORX2axpi3TZHNFqJf0EHsd2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
