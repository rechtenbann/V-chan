-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2024 a las 22:43:18
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
-- Estructura de tabla para la tabla `chat_requests`
--

CREATE TABLE `chat_requests` (
  `id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `status` enum('pending','accepted','rejected','') NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `followers_users`
--

CREATE TABLE `followers_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Volcado de datos para la tabla `forum`
--

INSERT INTO `forum` (`id`, `title`, `description`, `uid`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'Who is better?', '', 1, '2024-12-08 13:35:39', NULL);

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

--
-- Volcado de datos para la tabla `forum_img`
--

INSERT INTO `forum_img` (`id`, `img`, `qid`, `uid`) VALUES
(0, 'forum/1/cirno-touhou-project.gif', 1, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `usuario_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `image` text NOT NULL,
  `visitas` int(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `original` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `image`, `visitas`, `likes`, `dislikes`, `fecha_alta`, `fecha_baja`, `original`) VALUES
(1, '1', '1.png', 0, 0, 0, '2024-12-08 13:00:12', NULL, '1.gif'),
(2, '1', '2.png', 1, 0, 0, '2024-12-08 13:03:08', NULL, '2.gif'),
(3, '1', '3.png', 1, 0, 0, '2024-12-08 13:05:49', NULL, '3.jpg'),
(4, '1', '4.png', 1, 0, 0, '2024-12-08 13:10:10', NULL, '4.mp4'),
(5, '1', '5.png', 1, 0, 0, '2024-12-08 13:25:23', NULL, '5.gif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reaction_type` enum('like','dislike') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `post_reactions`
--

INSERT INTO `post_reactions` (`id`, `post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(1, 4, 1, 'like', '2024-12-08 16:22:15');

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
(1, 1, 1, '2024-11-08 10:19:07', NULL),
(2, 1, 1, '2024-11-08 10:19:07', NULL),
(3, 2, 2, '2024-11-08 10:19:07', NULL),
(4, 3, 3, '2024-11-08 10:19:07', NULL),
(5, 3, 4, '2024-11-08 10:19:07', NULL);

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
(2, 'wallpaper'),
(3, 'school'),
(4, 'bg'),
(5, 'day'),
(6, 'window'),
(7, 'hall'),
(8, 'room'),
(9, 'guitar'),
(10, 'desk'),
(11, 'bed'),
(12, 'sunlight'),
(13, 'night'),
(14, 'nighttime'),
(15, 'stars'),
(16, 'beautiful'),
(17, 'ghibli'),
(18, 'howl'),
(19, 'howl\'s'),
(20, 'moving'),
(21, 'castle'),
(22, 'illustration'),
(23, 'sun'),
(24, 'nit¿ght'),
(25, 'fukami'),
(26, 'wadanohara'),
(27, 'and'),
(28, 'the'),
(29, 'great'),
(30, 'blue'),
(31, 'sea'),
(32, 'fanart'),
(33, ''),
(34, 'kimetsu'),
(35, 'no'),
(36, 'yaiba'),
(37, 'shinobu'),
(38, 'screencap'),
(39, 'totoro'),
(40, 'satsuki'),
(41, 'beach'),
(42, 'anime'),
(43, 'girl'),
(44, 'bocchi'),
(45, 'rock!'),
(46, 'music'),
(47, 'pochita'),
(48, 'csm'),
(49, 'chainsaw'),
(50, 'man'),
(51, 'touhou'),
(52, 'flandre'),
(53, 'scarlet'),
(54, 'remilia'),
(55, 'sacrlet'),
(56, 'fumo'),
(57, 'shikanokonokokoshitantan'),
(58, 'nokotan'),
(59, 'shikanoko'),
(60, 'plane'),
(61, 'selfie'),
(62, 'airplane'),
(63, 'hand'),
(64, 'drawing'),
(65, 'dragon'),
(66, 'ball'),
(67, 'vegeta'),
(68, 'pokemon'),
(69, 'pikachu'),
(70, 'goku'),
(71, 'hat'),
(72, 'jujutsu'),
(73, 'kaisen'),
(74, 'satoru'),
(75, 'gojo'),
(76, 'kirby'),
(77, 'nintendo'),
(78, 'naruto'),
(79, 'scroll'),
(80, 'ninja'),
(81, 're:zero'),
(82, 'emilia'),
(83, 'ultra'),
(84, 'instinct'),
(85, 'archive'),
(86, 'fuuka'),
(87, 'iori'),
(88, 'koyuki'),
(89, 'bird'),
(90, 'cirno_(touhou)'),
(91, 'animated'),
(92, 'animated_gif'),
(93, 'smile'),
(94, 'shikanoko_(shikanokonokokoshitantan)'),
(95, 'nokotan_(shikanokonokokoshitantan)'),
(96, 'blue_archive'),
(97, 'fuuka_(blue_archive)'),
(98, 'koishi_(touhou)'),
(99, 'satori_(touhou)'),
(100, 'utsuho_(touhou)'),
(101, 'rin_(touhou)');

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
(1, 94, 2, NULL, NULL),
(2, 95, 2, NULL, NULL),
(3, 57, 2, NULL, NULL),
(4, 91, 2, NULL, NULL),
(5, 92, 2, NULL, NULL),
(6, 51, 1, NULL, NULL),
(7, 90, 1, NULL, NULL),
(8, 91, 1, NULL, NULL),
(9, 92, 1, NULL, NULL),
(10, 96, 3, NULL, NULL),
(11, 97, 3, NULL, NULL),
(12, 51, 4, NULL, NULL),
(13, 98, 4, NULL, NULL),
(14, 99, 4, NULL, NULL),
(15, 100, 4, NULL, NULL),
(16, 101, 4, NULL, NULL),
(17, 91, 4, NULL, NULL);

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
  `followers` int(255) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nombre`, `usu_clave`, `usu_email`, `foto_perfil`, `nsfw_allow`, `dark_mode`, `followers`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'reichsacht', '5eb3c70fb1c47a19a7b6674092c19fc0', 'rechtenbann@gmail.com', 'sui.png', 0, 0, 0, '2024-11-04 23:31:25', NULL),
(2, 'test', '202cb962ac59075b964b07152d234b70', 'test0243156@gmail.com', 'default1.png', 0, 0, 2, '2024-11-04 23:31:46', NULL),
(3, 'ryuu', '4297f44b13955235245b2497399d7a93', 'hratzeld@gmail.com', 'default1.png', 0, 0, 0, '2024-11-04 23:35:20', NULL),
(4, 'laydo', '202cb962ac59075b964b07152d234b70', 'laydo@gmail.com', 'default1.png', 0, 0, 0, '2024-11-06 15:45:05', NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_post`
--

CREATE TABLE `visitas_post` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `fecha_visita` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat_requests`
--
ALTER TABLE `chat_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `followers_users`
--
ALTER TABLE `followers_users`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_reaction` (`post_id`,`user_id`);

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
-- Indices de la tabla `visitas_post`
--
ALTER TABLE `visitas_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat_requests`
--
ALTER TABLE `chat_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `followers_users`
--
ALTER TABLE `followers_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `forum_ans`
--
ALTER TABLE `forum_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rango_usuario`
--
ALTER TABLE `rango_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `visitas_post`
--
ALTER TABLE `visitas_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
