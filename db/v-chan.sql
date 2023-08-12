-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2023 a las 07:08:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `v-chan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `usuario_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `image` text NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `image`, `fecha_alta`, `fecha_baja`) VALUES
(1, '2', 'Bocchi.jpg', '2023-02-16 18:39:07', NULL),
(2, '1', 'lilith.jpg', '2023-02-28 18:37:35', NULL),
(3, '1', 'org_2.png', '2023-02-28 18:40:48', NULL),
(4, '3', 'th_1.jfif', '2023-02-28 18:41:01', NULL),
(5, '3', 'evergarden.png', '2023-02-28 18:41:14', NULL),
(6, '2', 'giphy.gif', '2023-02-28 20:55:07', NULL),
(7, '1', 'Isaac.gif', '2023-02-26 13:33:17', NULL),
(8, '2', 'th.jpeg', '2023-02-26 15:08:33', NULL),
(9, '1', 'icon-anime-11.jpg', '2023-02-28 18:54:29', NULL),
(10, '3', 'guilherme-machado-padoru.jpg', '2023-02-28 20:58:48', NULL),
(11, '1', 'front_20230223_014807.png', '2023-02-28 21:07:11', NULL),
(12, '1', '45156494.gif', '2023-03-01 20:11:59', NULL),
(13, '1', 'mona-loading-dark.gif', '2023-03-01 20:12:40', NULL),
(14, '1', 'channels4_profile.jpg', '2023-03-19 13:40:37', NULL),
(15, '1', 'channels4_profile.jpg', '2023-03-19 13:41:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `id` int(11) NOT NULL,
  `rango` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`id`, `rango`) VALUES
(1, 'administrador'),
(2, 'premium'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_usuario`
--

CREATE TABLE `rango_usuario` (
  `id` int(11) NOT NULL,
  `rango_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rango_usuario`
--

INSERT INTO `rango_usuario` (`id`, `rango_id`, `usu_id`, `fecha_alta`, `fecha_baja`) VALUES
(1, 1, 1, '2023-08-11 19:42:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'all'),
(2, 'anime'),
(3, 'games'),
(4, 'brands'),
(5, 'animated_gif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_post`
--

CREATE TABLE `tag_post` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tag_post`
--

INSERT INTO `tag_post` (`id`, `tag_id`, `post_id`, `fecha_alta`, `fecha_baja`) VALUES
(1, 2, 1, '2023-02-28 19:34:55', NULL),
(2, 2, 2, '2023-02-28 21:14:20', NULL),
(3, 2, 3, '2023-03-01 18:18:49', NULL),
(4, 2, 4, '2023-03-01 18:19:21', NULL),
(5, 2, 5, '2023-03-01 18:20:01', NULL),
(6, 2, 6, '2023-03-01 18:20:34', NULL),
(7, 3, 7, '2023-03-01 18:20:43', NULL),
(8, 4, 8, '2023-03-01 18:21:39', NULL),
(9, 2, 9, '2023-03-01 18:22:18', NULL),
(10, 2, 10, '2023-03-01 18:22:29', NULL),
(11, 2, 11, '2023-03-01 18:22:39', NULL),
(12, 5, 6, '2023-03-01 19:30:55', NULL),
(13, 5, 7, '2023-03-01 19:36:40', NULL),
(14, 2, 12, '2023-03-01 20:17:08', NULL),
(15, 5, 12, '2023-03-01 20:17:32', NULL),
(16, 4, 13, '2023-03-01 20:17:49', NULL),
(17, 5, 13, '2023-03-01 20:18:02', NULL),
(18, 2, 0, '2023-03-19 13:41:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `usu_nombre` varchar(20) NOT NULL,
  `usu_clave` varchar(33) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nombre`, `usu_clave`, `usu_email`, `foto_perfil`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'reichsacht', '5eb3c70fb1c47a19a7b6674092c19fc0', 'hratzeld@gmail.com', 'default1.png', '2023-02-26 15:37:31', NULL),
(2, 'Matayoshi', '5eb3c70fb1c47a19a7b6674092c19fc0', 'sdmatayoshi@gmail.com', '', '2023-02-27 12:40:10', NULL),
(4, 'sdmatayoshi', '41f5d469289efa58df6a726273313439', 'sdmatayoshi@gmail.com', '', '2023-02-28 19:19:21', NULL),
(5, 'kamuofujino', '5eb3c70fb1c47a19a7b6674092c19fc0', 'kamuofujino@gmail.com', '', '2023-05-24 20:32:43', NULL),
(6, 'elmatas', '5eb3c70fb1c47a19a7b6674092c19fc0', 'sdmatayoshi@gmail.com', '', '2023-05-24 20:40:54', NULL),
(7, 'racht', 'e10adc3949ba59abbe56e057f20f883e', 'hratzeld@gmail.com', '', '2023-08-09 20:25:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `vid_id` int(255) NOT NULL,
  `vid_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `video` text NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`vid_id`, `vid_nombre`, `video`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'Iphone 4s 16gb', 'Teléfono celular Apple iPhone 4S de 16GB. Wifi, 3g, Gps, cámara de 8mp, pantalla HD (retina display) de 3.5 pulgadas.\r\nLibre de fábrica.\r\nIOS 5, procesador A5 dual core, doble cámara, sistema de control por voz Siri.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Samsung Galaxy S2', 'Teléfono celular 3g, Wifi, Android 2.3 Dual Core 1.2ghz, 16gb, Pantalla 4.27 pulgadas Super Amoled Plus.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rango_usuario`
--
ALTER TABLE `rango_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_post`
--
ALTER TABLE `tag_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rango_usuario`
--
ALTER TABLE `rango_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `vid_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
