-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 14:08:37
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
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `image`, `visitas`, `likes`, `dislikes`, `fecha_alta`, `fecha_baja`) VALUES
(1, '1', '54344488_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:08', NULL),
(2, '1', '82511636_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:14', NULL),
(3, '1', '97275391_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:20', NULL),
(4, '1', '119285398_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:30', NULL),
(5, '1', '120585729_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:41', NULL),
(6, '1', '121290061_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:48', NULL),
(7, '1', '121574851_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:05:54', NULL),
(8, '1', '122375232_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:00', NULL),
(9, '1', '122864736_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:06', NULL),
(10, '1', '123826901_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:12', NULL),
(11, '1', '123874786_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:17', NULL),
(12, '1', '123894360_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:25', NULL),
(13, '1', '123900556_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:31', NULL),
(14, '1', '123923888_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:37', NULL),
(15, '1', '123996636_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:44', NULL),
(16, '1', '123985487_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:06:50', NULL),
(17, '1', '124025667_p0.jpg', 0, 0, 0, '2024-11-08 10:06:55', NULL),
(18, '1', '124109877_p0_master1200.jpg', 0, 0, 0, '2024-11-08 10:07:04', NULL);

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
(1, 'all');

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
(1, 1, 1, '2024-11-08 10:05:08', NULL),
(2, 1, 2, '2024-11-08 10:05:14', NULL),
(3, 1, 3, '2024-11-08 10:05:20', NULL),
(4, 1, 4, '2024-11-08 10:05:30', NULL),
(5, 1, 5, '2024-11-08 10:05:41', NULL),
(6, 1, 6, '2024-11-08 10:05:48', NULL),
(7, 1, 7, '2024-11-08 10:05:54', NULL),
(8, 1, 8, '2024-11-08 10:06:00', NULL),
(9, 1, 9, '2024-11-08 10:06:06', NULL),
(10, 1, 10, '2024-11-08 10:06:12', NULL),
(11, 1, 11, '2024-11-08 10:06:17', NULL),
(12, 1, 12, '2024-11-08 10:06:25', NULL),
(13, 1, 13, '2024-11-08 10:06:31', NULL),
(14, 1, 14, '2024-11-08 10:06:37', NULL),
(15, 1, 15, '2024-11-08 10:06:44', NULL),
(16, 1, 16, '2024-11-08 10:06:50', NULL),
(17, 1, 17, '2024-11-08 10:06:55', NULL),
(18, 1, 18, '2024-11-08 10:07:04', NULL);

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
(1, 'reichsacht', '5eb3c70fb1c47a19a7b6674092c19fc0', 'rechtenbann@gmail.com', 'default1.png', 0, 0, 0, '2024-11-04 23:31:25', NULL),
(2, 'test', '202cb962ac59075b964b07152d234b70', 'test0243156@gmail.com', 'default1.png', 0, 0, 1, '2024-11-04 23:31:46', NULL),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forum_ans`
--
ALTER TABLE `forum_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rango_usuario`
--
ALTER TABLE `rango_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
