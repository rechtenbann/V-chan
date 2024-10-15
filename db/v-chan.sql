-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2024 a las 20:32:04
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
-- Base de datos: `v-chan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `uid` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum_ans`
--

CREATE TABLE `forum_ans` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum_img`
--

CREATE TABLE `forum_img` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `online_chat`
--

CREATE TABLE `online_chat` (
  `id` int(11) NOT NULL,
  `content` blob NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `online_chat`
--

INSERT INTO `online_chat` (`id`, `content`, `usuario_id`, `fecha_alta`, `fecha_baja`) VALUES
(1, 0x486f6c61, 1, '2023-08-13 23:44:02', NULL),
(2, 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c2071756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e69736920757420616c697175697020657820656120636f6d6d6f646f20636f6e7365717561742e2044756973206175746520697275726520646f6c6f7220696e20726570726568656e646572697420696e20766f6c7570746174652076656c697420657373652063696c6c756d20646f6c6f726520657520667567696174206e756c6c612070617269617475722e204578636570746575722073696e74206f6363616563617420637570696461746174206e6f6e2070726f6964656e742c2073756e7420696e2063756c706120717569206f666669636961206465736572756e74206d6f6c6c697420616e696d20696420657374206c61626f72756d2e, 1, '2023-08-14 09:50:02', NULL),
(3, 0x507275656261206d656e73616a65, 2, '2023-08-14 11:31:17', NULL),
(4, 0x507275656261206d656e73616a65, 2, '2023-08-14 11:31:20', NULL),
(5, 0x507275656261206d656e73616a65, 4, '2023-08-14 11:32:34', NULL),
(6, 0x7072756562612032, 2, '2023-08-14 12:08:16', NULL),
(7, 0x41534446, 1, '2023-08-14 15:52:21', NULL),
(8, 0x717765727177657271776572, 4, '2023-08-14 18:25:55', NULL),
(9, 0x7a786376, 1, '2023-08-14 19:52:48', NULL),
(10, 0x48656c6c6f212121202a285ee280bf5e292f2a, 2, '2023-08-14 19:56:51', NULL),
(11, 0x686f6c61, 1, '2024-03-20 17:50:25', NULL),
(12, 0x7564666768617369756467696c666e68696c7565670d0a, 1, '2024-09-30 20:51:04', NULL),
(13, 0x6173646661736466, 2, '2024-10-01 16:05:33', NULL),
(14, 0x61736466, 2, '2024-10-01 16:05:35', NULL),
(15, 0x610d0a, 1, '2024-10-01 16:05:49', NULL),
(16, 0x61646661736466, 1, '2024-10-01 16:29:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `online_chat_ans`
--

CREATE TABLE `online_chat_ans` (
  `id` int(11) NOT NULL,
  `content` blob NOT NULL,
  `comment_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `online_chat_ans`
--

INSERT INTO `online_chat_ans` (`id`, `content`, `comment_id`, `usuario_id`, `fecha_alta`, `fecha_baja`) VALUES
(12, 0x416e737765722074657374, 12, 1, '2024-03-19 16:46:03', NULL),
(13, 0x416e73776572207465737432, 12, 1, '2024-03-19 16:46:29', NULL),
(14, 0x416e73776572207465737433, 12, 1, '2024-03-19 16:47:20', NULL),
(15, 0x68656c6c6f, 12, 1, '2024-03-19 17:42:49', NULL),
(16, 0x4869212121, 12, 1, '2024-03-19 17:47:02', NULL),
(17, 0x3a76, 12, 1, '2024-03-19 17:47:16', NULL),
(18, 0x6869, 11, 1, '2024-03-19 17:51:59', NULL),
(19, 0x576861743f, 2, 1, '2024-03-19 17:55:32', NULL),
(20, 0x51574552, 7, 1, '2024-03-19 17:57:53', NULL),
(21, 0x5844, 12, 1, '2024-03-19 18:05:13', NULL),
(22, 0x68656c6c6f, 9, 1, '2024-03-20 17:26:11', NULL),
(23, 0x3a76, 10, 1, '2024-03-20 17:41:45', NULL),
(24, 0x6c6c6c6c, 10, 1, '2024-03-20 17:42:06', NULL),
(25, 0x617364617364, 10, 1, '2024-03-20 17:50:29', NULL),
(26, 0x73646667736466677364666773646667736466677364666773646667736466677364666773646667, 12, 1, '2024-09-30 20:51:36', NULL),
(27, 0x61736466617364666173646673616466, 12, 2, '2024-09-30 20:52:00', NULL),
(28, 0x6173646661736466, 16, 1, '2024-10-01 16:29:35', NULL);

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
(1, 1, 1, '2023-08-11 19:42:55', NULL),
(2, 2, 2, '2023-08-13 20:20:55', NULL),
(3, 3, 3, NULL, NULL),
(4, 3, 4, NULL, NULL),
(5, 3, 6, '2024-05-16 15:37:11', NULL),
(6, 3, 7, '2024-05-16 15:37:11', NULL),
(7, 3, 6, '2024-05-16 15:37:58', NULL),
(8, 3, 7, '2024-05-16 15:37:58', NULL),
(9, 3, 6, '2024-05-16 15:37:58', NULL),
(10, 3, 7, '2024-05-16 15:37:58', NULL);

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
  `id` bigint(20) NOT NULL,
  `usu_nombre` varchar(255) DEFAULT NULL,
  `usu_clave` varchar(255) DEFAULT NULL,
  `usu_email` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `nsfw_allow` tinyint(1) NOT NULL,
  `dark_mode` tinyint(1) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nombre`, `usu_clave`, `usu_email`, `foto_perfil`, `nsfw_allow`, `dark_mode`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'reichsacht', '5eb3c70fb1c47a19a7b6674092c19fc0', 'hratzeld@gmail.com', 'default3.png', 0, 1, '2023-02-26 15:37:31', NULL),
(2, 'test', '202cb962ac59075b964b07152d234b70', 'sdmatayoshi@gmail.com', 'default4.png', 0, 0, '2023-02-27 12:40:10', NULL),
(3, 'sdmatayoshi', '41f5d469289efa58df6a726273313439', 'sdmatayoshi@gmail.com', '', 0, 0, '2023-02-28 19:19:21', '2024-09-23 19:26:21'),
(4, 'anon', '202cb962ac59075b964b07152d234b70', 'mail@gmail.com', 'default5.png', 0, 0, '2023-05-24 20:32:43', NULL),
(6, 'elmatas', '5eb3c70fb1c47a19a7b6674092c19fc0', 'sdmatayoshi@gmail.com', 'default1.png', 0, 0, '2023-05-24 20:40:54', NULL),
(7, 'racht', 'e10adc3949ba59abbe56e057f20f883e', 'hratzeld@gmail.com', '', 0, 0, '2023-08-09 20:25:20', NULL);

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
-- Indices de la tabla `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forum_ans`
--
ALTER TABLE `forum_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forum_img`
--
ALTER TABLE `forum_img`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `online_chat`
--
ALTER TABLE `online_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `online_chat_ans`
--
ALTER TABLE `online_chat_ans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forum_ans`
--
ALTER TABLE `forum_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forum_img`
--
ALTER TABLE `forum_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `online_chat`
--
ALTER TABLE `online_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `online_chat_ans`
--
ALTER TABLE `online_chat_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `vid_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
