-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 07-10-2021 a las 08:23:29
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
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
  `pasahitza` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bezeroa`
--

INSERT INTO `bezeroa` (`izenAbizenak`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `pasahitza`) VALUES
('Peio Llano', '12345678Q', 123456789, '2021-02-11', 'peio@gmail.com', 'peio'),
('Julen Fuentes', '98765432Z', 987654321, '2012-06-14', 'julen@gmail.com', 'julen');

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


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 07-10-2021 a las 08:25:38
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
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
  `kirola` varchar(15) NOT NULL,
  `data` date NOT NULL,
  `ordutegia` char(5) NOT NULL,
  `monitorea` varchar(30) NOT NULL,
  `gela` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elementua`
--
ALTER TABLE `elementua`
  ADD PRIMARY KEY (`kirola`,`data`,`ordutegia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;