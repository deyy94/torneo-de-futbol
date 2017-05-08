-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2017 a las 06:55:28
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `torneofutbol`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `usr` VARCHAR(100), IN `pass` VARCHAR(200))
    NO SQL
SELECT * from users WHERE user=usr AND password=pass$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dt`
--

CREATE TABLE IF NOT EXISTS `tb_dt` (
  `pk_dt` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `teamName` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_dt`
--

INSERT INTO `tb_dt` (`pk_dt`, `name`, `teamName`) VALUES
(30, 'El', 'America'),
(31, 'almeyda', 'chivas'),
(32, 'tampoco se', 'jaguares'),
(33, 'david', 'toluca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_players`
--

CREATE TABLE IF NOT EXISTS `tb_players` (
  `pk_player` int(11) NOT NULL,
  `fullName` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `position` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(50) NOT NULL,
  `apodo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `teamName` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_players`
--

INSERT INTO `tb_players` (`pk_player`, `fullName`, `position`, `age`, `apodo`, `teamName`) VALUES
(24, 'david', 'delantero', 12, 'cachorro', 'America'),
(25, 'chucho', 'portero', 31, 'chuchita', 'chivas'),
(26, 'brenda', 'medio', 12, 'pipi', 'jaguares'),
(28, 'jusu', 'defensa', 23, '56', 'toluca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_teams`
--

CREATE TABLE IF NOT EXISTS `tc_teams` (
  `pk_team` int(11) NOT NULL,
  `teamName` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `president` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dt_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tc_teams`
--

INSERT INTO `tc_teams` (`pk_team`, `teamName`, `president`, `dt_name`) VALUES
(34, 'America', 'Yo', 'El'),
(35, 'chivas', 'vergara', 'almeyda'),
(36, 'jaguares', 'nose', 'tampoco se');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pk_user` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`pk_user`, `user`, `password`) VALUES
(2, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_dt`
--
ALTER TABLE `tb_dt`
  ADD PRIMARY KEY (`pk_dt`);

--
-- Indices de la tabla `tb_players`
--
ALTER TABLE `tb_players`
  ADD PRIMARY KEY (`pk_player`);

--
-- Indices de la tabla `tc_teams`
--
ALTER TABLE `tc_teams`
  ADD PRIMARY KEY (`pk_team`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pk_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_dt`
--
ALTER TABLE `tb_dt`
  MODIFY `pk_dt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `tb_players`
--
ALTER TABLE `tb_players`
  MODIFY `pk_player` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `tc_teams`
--
ALTER TABLE `tc_teams`
  MODIFY `pk_team` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `pk_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
