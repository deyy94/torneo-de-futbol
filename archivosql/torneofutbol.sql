-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2017 a las 03:06:17
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dt`
--

CREATE TABLE IF NOT EXISTS `tb_dt` (
  `pk_dt` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `team` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_teams`
--

CREATE TABLE IF NOT EXISTS `tc_teams` (
  `pk_team` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `president` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dt_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tc_teams`
--

INSERT INTO `tc_teams` (`pk_team`, `name`, `president`, `dt_name`) VALUES
(1, 'aasdasd', 'adsasd', 'asasasdsa');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_dt`
--
ALTER TABLE `tb_dt`
  MODIFY `pk_dt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_players`
--
ALTER TABLE `tb_players`
  MODIFY `pk_player` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tc_teams`
--
ALTER TABLE `tc_teams`
  MODIFY `pk_team` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
