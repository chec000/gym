-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2018 at 04:25 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb`
--
CREATE DATABASE IF NOT EXISTS `gymdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gymdb`;

-- --------------------------------------------------------

--
-- Table structure for table `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_cliente` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `caracteristicas_cliente`
--

DROP TABLE IF EXISTS `caracteristicas_cliente`;
CREATE TABLE IF NOT EXISTS `caracteristicas_cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brazo_derecho` int(10) NOT NULL,
  `brazo_izquierdo` int(10) NOT NULL,
  `pierna_derecha` int(11) NOT NULL,
  `pierna_irquierda` int(11) NOT NULL,
  `cadera` int(11) NOT NULL,
  `pecho` int(11) NOT NULL,
  `libras` int(11) NOT NULL,
  `adomen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_sangre` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `enfermedad` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `obserbacion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caracteristicas_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `foto` longblob,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente_dieta`
--

DROP TABLE IF EXISTS `cliente_dieta`;
CREATE TABLE IF NOT EXISTS `cliente_dieta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) NOT NULL,
  `id_dieta` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_dienta_idx` (`id_cliente`),
  KEY `dieta_cliente_idx` (`id_dieta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empresa` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comentario_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cod_producto` int(10) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `valor_costo` int(10) NOT NULL,
  `valor_total` int(10) NOT NULL,
  `fecha_i` date NOT NULL,
  `fecha_f` date NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configuracion_precio_membrecia`
--

DROP TABLE IF EXISTS `configuracion_precio_membrecia`;
CREATE TABLE IF NOT EXISTS `configuracion_precio_membrecia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mensual` int(10) NOT NULL,
  `quincenal` int(10) NOT NULL,
  `semanal` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `id_e` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacto_cliente`
--

DROP TABLE IF EXISTS `contacto_cliente`;
CREATE TABLE IF NOT EXISTS `contacto_cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `parentesco` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `observacion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contacto_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deportes`
--

DROP TABLE IF EXISTS `deportes`;
CREATE TABLE IF NOT EXISTS `deportes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `id_entrenador` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entranador_deporte_idx` (`id_entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deportes_cliente`
--

DROP TABLE IF EXISTS `deportes_cliente`;
CREATE TABLE IF NOT EXISTS `deportes_cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) NOT NULL,
  `id_deporte` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_idx` (`id_cliente`),
  KEY `deporte_idx` (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deporte_horario`
--

DROP TABLE IF EXISTS `deporte_horario`;
CREATE TABLE IF NOT EXISTS `deporte_horario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_deporte` int(10) NOT NULL,
  `id_horario` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depore_horario_idx` (`id_horario`),
  KEY `deporte_horario_idx` (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

DROP TABLE IF EXISTS `detalle`;
CREATE TABLE IF NOT EXISTS `detalle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) NOT NULL,
  `sub_total` double NOT NULL,
  `id_v` int(10) NOT NULL,
  `id_p` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `venta_idx` (`id_v`),
  KEY `producto_idx` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dieta`
--

DROP TABLE IF EXISTS `dieta`;
CREATE TABLE IF NOT EXISTS `dieta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_empleado_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `rnc` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrenadores`
--

DROP TABLE IF EXISTS `entrenadores`;
CREATE TABLE IF NOT EXISTS `entrenadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` int(60) NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entrenador_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horarios_depor`
--

DROP TABLE IF EXISTS `horarios_depor`;
CREATE TABLE IF NOT EXISTS `horarios_depor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horarios_entrenadores`
--

DROP TABLE IF EXISTS `horarios_entrenadores`;
CREATE TABLE IF NOT EXISTS `horarios_entrenadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horario_entrenador`
--

DROP TABLE IF EXISTS `horario_entrenador`;
CREATE TABLE IF NOT EXISTS `horario_entrenador` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_entrenador` int(10) NOT NULL,
  `id_horario` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `total` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `unidades_existencia` int(10) NOT NULL,
  `cantidad_pedido` int(10) NOT NULL,
  `precio_unitario` int(10) NOT NULL,
  `id_compra` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membresias`
--

DROP TABLE IF EXISTS `membresias`;
CREATE TABLE IF NOT EXISTS `membresias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `codigo_cliente` int(10) NOT NULL,
  `id_empleado` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2018_08_11_220627_create_roles_table', 1),
(6, '2018_08_11_220748_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sergioshutdown@gmail.com', '$2y$10$zTaW2oMRdZWtsywpXeX3Me0bLQZaMsSFkb6YW/syuR7Abatxe1TjO', '2018-08-14 19:35:56'),
('sgalindo.smartsoft@gmail.com', '$2y$10$XAHM9lFL2LuiQ95cF/YV5O6msTbwy.bbMU1iUarR/VQ5f4Fm.fc/2', '2018-08-14 20:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `pedido_compra`
--

DROP TABLE IF EXISTS `pedido_compra`;
CREATE TABLE IF NOT EXISTS `pedido_compra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio_costo` int(10) NOT NULL,
  `precio_total` int(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `control_stock` int(10) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `imail` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_proveedor_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rendimiento_encuesta`
--

DROP TABLE IF EXISTS `rendimiento_encuesta`;
CREATE TABLE IF NOT EXISTS `rendimiento_encuesta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_entrenador` int(10) NOT NULL,
  `id_encuesta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(50) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `respuesta_pregunta_idx` (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-08-12 03:42:26', '2018-08-12 03:42:26'),
(2, 'user', 'User', '2018-08-12 03:42:26', '2018-08-12 03:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2018-08-12 03:42:27', '2018-08-12 03:42:27'),
(2, 1, 2, '2018-08-12 03:42:27', '2018-08-12 03:42:27'),
(3, 2, 4, '2018-08-14 19:34:16', '2018-08-14 19:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@example.com', '$2y$10$cBrZsGooICqkHToafHFWxuAA4PZHXOA1sIZE3o2wnPmyIzgipfMGy', NULL, '2018-08-12 03:42:27', '2018-08-12 03:42:27'),
(2, 'Admin', 'admin@example.com', '$2y$10$jnuYpQ4kp1qS1aWw70W2o.Bf6DC.kyCQZLrNlAn.mL6qY7AzrXecq', NULL, '2018-08-12 03:42:27', '2018-08-12 03:42:27'),
(3, 'sergio', 'sgalindo.smartsoft@gmail.com', '$2y$10$avpKSQzUrP513OZsaXAL5ug7w5ldczphrveqYeq4jGvO4fJ1wy7iW', NULL, '2018-08-14 19:28:32', '2018-08-14 19:28:32'),
(4, 'sergio', 'sergioshutdown@gmail.com', '$2y$10$ycLXvzm3kl9xUN0P7/XcyewyueD6sI5MN94oTw/7ms/411QLELNS.', 'JqQnMDyWaPZeWMZdzEtmF0B6O89glRbJpmBhzR0rMjchGawWDH9guCcIYpuE', '2018-08-14 19:34:16', '2018-08-14 19:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `tipo_venta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ventaCliente` (`id_cliente`),
  KEY ` ventaEmpleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `link` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `id_dieta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencia_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `caracteristicas_cliente`
--
ALTER TABLE `caracteristicas_cliente`
  ADD CONSTRAINT `caracteristicas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_dieta`
--
ALTER TABLE `cliente_dieta`
  ADD CONSTRAINT `cliente_dienta` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dieta_cliente` FOREIGN KEY (`id_dieta`) REFERENCES `dieta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentario_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacto_cliente`
--
ALTER TABLE `contacto_cliente`
  ADD CONSTRAINT `contacto_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deportes`
--
ALTER TABLE `deportes`
  ADD CONSTRAINT `entranador_deporte` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deportes_cliente`
--
ALTER TABLE `deportes_cliente`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deporte` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deporte_horario`
--
ALTER TABLE `deporte_horario`
  ADD CONSTRAINT `depore_horario` FOREIGN KEY (`id_horario`) REFERENCES `horarios_depor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deporte_horario` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `producto` FOREIGN KEY (`id_p`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venta` FOREIGN KEY (`id_v`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `usuario_empleado` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `entrenador_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `usuario_proveedor` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuesta_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `encuestas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT ` ventaEmpleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventaCliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
