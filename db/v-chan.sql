-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 21:22:40
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
(1, '1', '54344488_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:08', NULL),
(2, '1', '82511636_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:14', NULL),
(3, '1', '97275391_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:20', NULL),
(4, '1', '119285398_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:30', NULL),
(5, '1', '120585729_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:41', NULL),
(6, '1', '121290061_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:48', NULL),
(7, '1', '121574851_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:05:54', NULL),
(8, '1', '122375232_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:06:00', NULL),
(9, '1', '122864736_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:06:06', NULL),
(10, '1', '123826901_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:12', NULL),
(11, '1', '123874786_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:17', NULL),
(12, '1', '123894360_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:25', NULL),
(13, '1', '123900556_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:31', NULL),
(14, '1', '123923888_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:37', NULL),
(15, '1', '123996636_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:44', NULL),
(16, '1', '123985487_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:06:50', NULL),
(17, '1', '124025667_p0.jpg', 1, 0, 0, '2024-11-08 10:06:55', NULL),
(18, '1', '124109877_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:07:04', NULL),
(19, '1', '112314398_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:15:50', NULL),
(20, '1', '113033031_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:15:57', NULL),
(21, '1', '116912060_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:16:19', NULL),
(22, '1', '117222481_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:16:27', NULL),
(23, '1', '117567719_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:16:34', NULL),
(24, '1', '119177607_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:16:49', NULL),
(25, '1', '121189978_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:16:57', NULL),
(26, '1', '119523287_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:17:02', NULL),
(27, '1', '121824227_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:17:14', NULL),
(28, '1', '121687430_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:17:20', NULL),
(29, '1', '121902918_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:17:28', NULL),
(30, '1', '122127674_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:17:35', NULL),
(31, '1', '122375232_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:17:42', NULL),
(32, '1', '122382609_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:18:05', NULL),
(33, '1', '124019691_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:18:12', NULL),
(34, '1', '124033090_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:18:19', NULL),
(35, '1', '124051535_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:18:34', NULL),
(36, '1', '124054219_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:18:41', NULL),
(37, '1', '124059321_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:20:33', NULL),
(38, '1', '124089649_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:21:59', NULL),
(39, '1', '124101063_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:22:05', NULL),
(40, '1', '124103450_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:22:10', NULL),
(41, '1', '124108274_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:22:16', NULL),
(42, '1', '124108581_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:22:21', NULL),
(43, '1', '124109061_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:22:27', NULL),
(44, '1', '124109144_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:23:03', NULL),
(45, '1', '124109799_p0_master1200.jpg', 1, 0, 0, '2024-11-08 10:23:09', NULL),
(46, '1', '124110143_p0_master1200.jpg', 2, 0, 0, '2024-11-08 10:23:15', NULL);

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
(14, 'night_time'),
(15, 'stars'),
(16, 'beautiful'),
(17, 'ghibli'),
(18, 'howl'),
(19, 'howl\'s_moving_castle'),
(20, 'Hauru_no_Ugoku_Shiro'),
(21, 'ghibli_fanart'),
(22, 'illustration'),
(23, 'sun'),
(24, 'stars'),
(25, 'fukami'),
(26, 'wadanohara_and_the_great_blue_sea'),
(27, 'funamusea'),
(28, 'deepsea_prisoner'),
(29, 'indie_horror_game'),
(30, 'character'),
(31, 'chibi'),
(32, 'fanart'),
(33, 'studio_ghibli'),
(34, 'kimetsu_no_yaiba'),
(35, 'demon_slayer'),
(36, 'pillar_(kimetsu_no_yaiba)'),
(37, 'shinobu'),
(38, 'screencap'),
(39, 'totoro'),
(40, 'satsuki'),
(41, 'beach'),
(42, 'anime'),
(43, 'girl'),
(44, 'bocchi_the_rock!'),
(45, 'pink_hair'),
(46, 'music'),
(47, 'pochita'),
(48, 'csm'),
(49, 'chainsaw_man'),
(50, 'Tatsuki_Fujimoto'),
(51, 'touhou'),
(52, 'flandre_scarlet'),
(53, 'scarlet'),
(54, 'remilia_scarlet'),
(55, 'sacrlet'),
(56, 'fumo'),
(57, 'shikanokonokokoshitantan'),
(58, 'nokotan'),
(59, 'shikanoko'),
(60, 'plane'),
(61, 'selfie'),
(62, 'airplane'),
(63, 'hand_drawing'),
(64, 'drawing'),
(65, 'dragon_ball'),
(66, 'sayajin'),
(67, 'vegeta'),
(68, 'pokemon'),
(69, 'pikachu'),
(70, 'goku'),
(71, 'hat'),
(72, 'jujutsu_kaisen'),
(73, 'jjk'),
(74, 'satoru_gojo'),
(75, 'gojo'),
(76, 'kirby'),
(77, 'nintendo'),
(78, 'naruto'),
(79, 'scroll'),
(80, 'ninja'),
(81, 're:zero'),
(82, 'emilia'),
(83, 'ultra_instinct'),
(84, 'dragon_ball_super'),
(85, 'blue_archive'),
(86, 'fuuka'),
(87, 'iori'),
(88, 'koyuki'),
(89, 'bird');

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
(18, 1, 18, '2024-11-08 10:07:04', NULL),
(19, 1, 19, '2024-11-08 10:15:50', NULL),
(20, 1, 20, '2024-11-08 10:15:57', NULL),
(21, 1, 21, '2024-11-08 10:16:19', NULL),
(22, 1, 22, '2024-11-08 10:16:27', NULL),
(23, 1, 23, '2024-11-08 10:16:34', NULL),
(24, 1, 24, '2024-11-08 10:16:49', NULL),
(25, 1, 25, '2024-11-08 10:16:57', NULL),
(26, 1, 26, '2024-11-08 10:17:02', NULL),
(27, 1, 27, '2024-11-08 10:17:14', NULL),
(28, 1, 28, '2024-11-08 10:17:20', NULL),
(29, 1, 29, '2024-11-08 10:17:28', NULL),
(30, 1, 30, '2024-11-08 10:17:35', NULL),
(31, 1, 31, '2024-11-08 10:17:42', NULL),
(32, 1, 32, '2024-11-08 10:18:05', NULL),
(33, 1, 33, '2024-11-08 10:18:12', NULL),
(34, 1, 34, '2024-11-08 10:18:19', NULL),
(35, 1, 35, '2024-11-08 10:18:34', NULL),
(36, 1, 36, '2024-11-08 10:18:42', NULL),
(37, 1, 37, '2024-11-08 10:20:33', NULL),
(38, 1, 38, '2024-11-08 10:21:59', NULL),
(39, 1, 39, '2024-11-08 10:22:05', NULL),
(40, 1, 40, '2024-11-08 10:22:10', NULL),
(41, 1, 41, '2024-11-08 10:22:16', NULL),
(42, 1, 42, '2024-11-08 10:22:21', NULL),
(43, 1, 43, '2024-11-08 10:22:27', NULL),
(44, 1, 44, '2024-11-08 10:23:03', NULL),
(45, 1, 45, '2024-11-08 10:23:09', NULL),
(46, 1, 46, '2024-11-08 10:23:15', NULL),
(47, 2, 1, NULL, NULL),
(48, 3, 1, NULL, NULL),
(49, 4, 1, NULL, NULL),
(50, 5, 1, NULL, NULL),
(51, 2, 2, NULL, NULL),
(52, 4, 2, NULL, NULL),
(53, 3, 2, NULL, NULL),
(54, 6, 2, NULL, NULL),
(55, 7, 2, NULL, NULL),
(56, 2, 3, NULL, NULL),
(57, 8, 3, NULL, NULL),
(58, 9, 3, NULL, NULL),
(59, 10, 3, NULL, NULL),
(60, 11, 3, NULL, NULL),
(61, 6, 3, NULL, NULL),
(62, 12, 3, NULL, NULL),
(63, 2, 4, NULL, NULL),
(64, 13, 4, NULL, NULL),
(65, 14, 4, NULL, NULL),
(66, 15, 4, NULL, NULL),
(67, 16, 4, NULL, NULL),
(68, 17, 5, NULL, NULL),
(69, 18, 5, NULL, NULL),
(70, 19, 5, NULL, NULL),
(71, 20, 5, NULL, NULL),
(72, 21, 5, NULL, NULL),
(73, 22, 5, NULL, NULL),
(74, 2, 6, NULL, NULL),
(75, 23, 6, NULL, NULL),
(76, 4, 6, NULL, NULL),
(77, 24, 7, NULL, NULL),
(78, 2, 7, NULL, NULL),
(79, 4, 7, NULL, NULL),
(80, 25, 8, NULL, NULL),
(81, 26, 8, NULL, NULL),
(82, 26, 8, NULL, NULL),
(83, 27, 8, NULL, NULL),
(84, 28, 8, NULL, NULL),
(85, 29, 8, NULL, NULL),
(86, 30, 8, NULL, NULL),
(87, 31, 8, NULL, NULL),
(88, 17, 9, NULL, NULL),
(89, 19, 9, NULL, NULL),
(90, 20, 9, NULL, NULL),
(91, 21, 9, NULL, NULL),
(92, 22, 9, NULL, NULL),
(93, 32, 9, NULL, NULL),
(94, 33, 9, NULL, NULL),
(95, 34, 10, NULL, NULL),
(96, 35, 10, NULL, NULL),
(97, 36, 10, NULL, NULL),
(98, 37, 10, NULL, NULL),
(99, 38, 10, NULL, NULL),
(100, 39, 11, NULL, NULL),
(101, 17, 11, NULL, NULL),
(102, 40, 11, NULL, NULL),
(103, 22, 12, NULL, NULL),
(104, 2, 12, NULL, NULL),
(105, 4, 12, NULL, NULL),
(106, 2, 13, NULL, NULL),
(107, 4, 13, NULL, NULL),
(108, 2, 14, NULL, NULL),
(109, 31, 14, NULL, NULL),
(110, 4, 14, NULL, NULL),
(111, 41, 14, NULL, NULL),
(112, 2, 15, NULL, NULL),
(113, 4, 15, NULL, NULL),
(114, 42, 16, NULL, NULL),
(115, 43, 16, NULL, NULL),
(116, 22, 16, NULL, NULL),
(117, 19, 17, NULL, NULL),
(118, 20, 17, NULL, NULL),
(119, 21, 17, NULL, NULL),
(120, 22, 17, NULL, NULL),
(121, 17, 17, NULL, NULL),
(122, 44, 18, NULL, NULL),
(123, 28, 18, NULL, NULL),
(124, 45, 18, NULL, NULL),
(125, 9, 18, NULL, NULL),
(126, 46, 18, NULL, NULL),
(127, 47, 19, NULL, NULL),
(128, 48, 19, NULL, NULL),
(129, 49, 19, NULL, NULL),
(130, 50, 19, NULL, NULL),
(131, 47, 20, NULL, NULL),
(132, 48, 20, NULL, NULL),
(133, 49, 20, NULL, NULL),
(134, 50, 20, NULL, NULL),
(135, 51, 21, NULL, NULL),
(136, 52, 21, NULL, NULL),
(137, 53, 21, NULL, NULL),
(138, 51, 22, NULL, NULL),
(139, 52, 22, NULL, NULL),
(140, 53, 22, NULL, NULL),
(141, 54, 22, NULL, NULL),
(142, 53, 22, NULL, NULL),
(143, 47, 23, NULL, NULL),
(144, 48, 23, NULL, NULL),
(145, 49, 23, NULL, NULL),
(146, 50, 23, NULL, NULL),
(147, 47, 24, NULL, NULL),
(148, 48, 24, NULL, NULL),
(149, 49, 24, NULL, NULL),
(150, 50, 24, NULL, NULL),
(151, 51, 25, NULL, NULL),
(152, 52, 25, NULL, NULL),
(153, 55, 25, NULL, NULL),
(154, 56, 25, NULL, NULL),
(155, 51, 26, NULL, NULL),
(156, 52, 26, NULL, NULL),
(157, 53, 26, NULL, NULL),
(158, 51, 27, NULL, NULL),
(159, 52, 27, NULL, NULL),
(160, 53, 27, NULL, NULL),
(161, 42, 28, NULL, NULL),
(162, 43, 28, NULL, NULL),
(163, 47, 28, NULL, NULL),
(164, 48, 28, NULL, NULL),
(165, 49, 28, NULL, NULL),
(166, 50, 28, NULL, NULL),
(167, 57, 29, NULL, NULL),
(168, 58, 29, NULL, NULL),
(169, 59, 29, NULL, NULL),
(170, 60, 29, NULL, NULL),
(171, 61, 29, NULL, NULL),
(172, 62, 29, NULL, NULL),
(173, 51, 30, NULL, NULL),
(174, 54, 30, NULL, NULL),
(175, 53, 30, NULL, NULL),
(176, 25, 31, NULL, NULL),
(177, 26, 31, NULL, NULL),
(178, 63, 31, NULL, NULL),
(179, 64, 31, NULL, NULL),
(180, 51, 32, NULL, NULL),
(181, 52, 32, NULL, NULL),
(182, 53, 32, NULL, NULL),
(183, 65, 33, NULL, NULL),
(184, 66, 33, NULL, NULL),
(185, 67, 33, NULL, NULL),
(186, 68, 34, NULL, NULL),
(187, 69, 34, NULL, NULL),
(188, 65, 35, NULL, NULL),
(189, 66, 35, NULL, NULL),
(190, 70, 35, NULL, NULL),
(191, 69, 36, NULL, NULL),
(192, 68, 36, NULL, NULL),
(193, 71, 36, NULL, NULL),
(194, 72, 37, NULL, NULL),
(195, 73, 37, NULL, NULL),
(196, 74, 37, NULL, NULL),
(197, 75, 37, NULL, NULL),
(198, 32, 37, NULL, NULL),
(199, 76, 38, NULL, NULL),
(200, 77, 38, NULL, NULL),
(201, 78, 39, NULL, NULL),
(202, 79, 39, NULL, NULL),
(203, 80, 39, NULL, NULL),
(204, 81, 40, NULL, NULL),
(205, 82, 40, NULL, NULL),
(206, 70, 41, NULL, NULL),
(207, 65, 41, NULL, NULL),
(208, 66, 41, NULL, NULL),
(209, 83, 41, NULL, NULL),
(210, 84, 41, NULL, NULL),
(211, 77, 42, NULL, NULL),
(212, 76, 42, NULL, NULL),
(213, 30, 44, NULL, NULL),
(214, 85, 44, NULL, NULL),
(215, 86, 44, NULL, NULL),
(216, 30, 43, NULL, NULL),
(217, 85, 43, NULL, NULL),
(218, 87, 43, NULL, NULL),
(219, 30, 45, NULL, NULL),
(220, 85, 45, NULL, NULL),
(221, 88, 45, NULL, NULL),
(222, 81, 46, NULL, NULL),
(223, 82, 46, NULL, NULL),
(224, 89, 46, NULL, NULL);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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
