-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 19-12-2021 a las 21:08:08
-- Versión del servidor: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bezeroa`
--

CREATE TABLE `bezeroa` (
  `izenAbizenak` varchar(30) NOT NULL,
  `NAN` char(9) NOT NULL,
  `telefonoa` int(9) NOT NULL,
  `jaiotzeData` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `kontuKorronte` varchar(255) NOT NULL,
  `pasahitza` varchar(255) NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bezeroa`
--

INSERT INTO `bezeroa` (`izenAbizenak`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `kontuKorronte`, `pasahitza`, `salt`) VALUES
('Jokin Zorroza', '12345678Z', 611611611, '1999-10-12', 'zorroz@gmail.com', 'NnUvWjE1d3lPQmMrejFCbStqOGxETGZ6NndXM05VdXZUdEdNNURkbmpxTT06Os/ROHvnggG2APzQw02RX6U=', 'bdd54387a5b111b6d058dda9786cee8c6974a739cc69e2789068cec2bf24064bff3896a365bce5f98e514605d383dfeeb4b996e7937bcb9fb774945dd0a8199a', '6js*Q^=^KFC%ipWX'),
('Jon Basterretxea', '87654321X', 696966696, '1999-10-12', 'jonbas@gmail.com', 'MXJHaksxeDZGWDVrR1JqTVFCbEIzbGJQOHovaDNobFNRYjFMVXhQY0JSYz06OuJ8bWQefrwNvaTBjVJ1KPc=', 'd966eb02bf4d4fd0423c0bbcbbba1085e9e527173c01eb148128f7e72b2091c43c9353a081ea5707db9aee5ce851b2be1db13996e563a6fd0d879b6a605a21cd', 'Wx\\X5sr.1I^Rtypd'),
('Ramon Soraluze', '99999999R', 999999999, '2000-01-01', 'ramon@gmail.com', 'WjZPanlHRjFIcXJrMEJZVy9tMjVnTno3MWhLZHBnOXZ5N3ZtUDd3M3BXVT06Ou/W5KdbBoOPoRAVIZYIbdU=', '79137fc8d3e6b5715c1d35607d4dbc98e2f36144b4bbc26195d723cea6d0e09643eeab3499604d9af96e068cf10c2cd54d32dc127dcb63d88072a16f1a7b15b6', '9M-Jr2(S+MrSyhc7');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bezeroa`
--
ALTER TABLE `bezeroa`
  ADD PRIMARY KEY (`NAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 19-12-2021 a las 21:08:49
-- Versión del servidor: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementua`
--

CREATE TABLE `elementua` (
  `kirola` varchar(25) NOT NULL,
  `data` date NOT NULL,
  `ordutegia` char(11) NOT NULL,
  `monitorea` varchar(30) NOT NULL,
  `gela` varchar(15) NOT NULL,
  `bezeroNAN` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elementua`
--

INSERT INTO `elementua` (`kirola`, `data`, `ordutegia`, `monitorea`, `gela`, `bezeroNAN`) VALUES
('Gimnasioa', '2021-12-23', '08:00-09:00', 'Markel', 'P1I3', '12345678Z'),
('Gimnasioa', '2022-01-05', '16:00-17:00', 'Peio', 'P1I3', '12345678Z'),
('Igeriketa', '2022-01-05', '13:00-14:00', 'Asier', 'P2I8', '87654321X'),
('Igeriketa', '2022-01-29', '08:00-09:00', 'Irene', 'P2I8', '99999999R'),
('Squash', '2022-01-09', '08:00-09:00', 'Peio', 'P1I5', '87654321X'),
('Squash', '2022-01-09', '20:00-21:00', 'Ander', 'P1I5', '12345678Z');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elementua`
--
ALTER TABLE `elementua`
  ADD PRIMARY KEY (`kirola`,`data`,`ordutegia`),
  ADD KEY `bezeroNAN` (`bezeroNAN`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elementua`
--
ALTER TABLE `elementua`
  ADD CONSTRAINT `bezeroNAN` FOREIGN KEY (`bezeroNAN`) REFERENCES `bezeroa` (`NAN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;