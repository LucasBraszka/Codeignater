-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2023 a las 22:09:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kracosviatienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `articulo` text NOT NULL,
  `descripcion` longtext NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `ultima_modificacdion` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`articulo_id`, `articulo`, `descripcion`, `categoria_id`, `stock_actual`, `stock_minimo`, `estado`, `ultima_modificacdion`, `usuario_id`, `precio`) VALUES
(1, 'Mouse Logitech ', 'Mouse Logitech +10000 DPI', 4, 2, 1, 1, '2022-12-22 19:00:48', 3, '2000.00'),
(2, 'Auriculares', 'Auris', 1, 5, 1, 1, '2022-12-22 19:46:22', 0, '0.00'),
(3, 'Destructor de mundos ', 'miniatura', 1, 8, 1, 1, '2023-03-02 19:51:28', 3, '12384.12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_precios`
--

CREATE TABLE `articulos_precios` (
  `articulo_x_lista_de_precios_id` int(11) NOT NULL,
  `lista_de_precios_id` int(11) NOT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos_precios`
--

INSERT INTO `articulos_precios` (`articulo_x_lista_de_precios_id`, `lista_de_precios_id`, `articulo_id`, `precio`) VALUES
(1, 0, 1, '60000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `categoria_corto` text NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria`, `categoria_corto`, `orden`, `estado`) VALUES
(1, 'Audiox', 'Audio', 1, 1),
(2, 'Video', 'Video', 2, 1),
(3, 'Climatización', 'Clima', 3, 1),
(4, 'Gaming', 'Game', 4, 1),
(5, 'Ofertas', 'Ofertas', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_de_precios`
--

CREATE TABLE `lista_de_precios` (
  `lista_de_precios_id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `nombre`, `estado`) VALUES
(1, 'administradores', 1),
(2, 'clientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `usuario` char(30) NOT NULL,
  `password` char(32) NOT NULL,
  `lista_de_precios` int(11) NOT NULL,
  `ult_login` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `rol_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `password`, `lista_de_precios`, `ult_login`, `estado`, `rol_id`) VALUES
(1, 'admin', 'admin', 0, '2022-12-01 19:11:55', 1, 1),
(2, 'cliente', 'cliente', 0, '2022-12-01 19:12:28', 1, 2),
(3, 'benito', 'camela', 0, '2023-02-28 22:43:27', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`venta_id`, `articulo_id`, `usuario_id`) VALUES
(1, 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`articulo_id`);

--
-- Indices de la tabla `articulos_precios`
--
ALTER TABLE `articulos_precios`
  ADD PRIMARY KEY (`articulo_x_lista_de_precios_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `lista_de_precios`
--
ALTER TABLE `lista_de_precios`
  ADD PRIMARY KEY (`lista_de_precios_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `articulo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `articulos_precios`
--
ALTER TABLE `articulos_precios`
  MODIFY `articulo_x_lista_de_precios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lista_de_precios`
--
ALTER TABLE `lista_de_precios`
  MODIFY `lista_de_precios_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
