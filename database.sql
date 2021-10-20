-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 20-10-2021 a las 16:48:17
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
('Joselu Fernandez', '11223344B', 623623623, '2001-12-14', 'joselu@gmail.com', 'joselu'),
('Peio Llano', '12345678Z', 444555666, '2001-02-11', 'peio@gmail.com', 'pepe'),
('Miren Salazar', '34456212G', 655688677, '1999-12-18', 'mirensala@hotmail.com', 'mirensal99'),
('Jokin Zorroza', '47747474A', 617617617, '1989-08-12', 'zorroz@gmail.com', 'zorro7'),
('Naiara Mendibil', '67543454K', 663356789, '1972-02-05', 'naiara.mendibil@gmail.com', 'naiaramendibil720205'),
('Julen Fuentes', '87654321X', 987654321, '2002-06-14', 'julen@gmail.com', 'julen'),
('Jon Basterretxea', '89987667Y', 987678876, '1991-02-18', 'jonbas@gmail.com', 'jonbas');

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
-- Tiempo de generación: 20-10-2021 a las 16:48:45
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
  `kirola` varchar(25) NOT NULL,
  `data` date NOT NULL,
  `ordutegia` char(5) NOT NULL,
  `monitorea` varchar(30) NOT NULL,
  `gela` varchar(15) NOT NULL,
  `bezeroNAN` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elementua`
--

INSERT INTO `elementua` (`kirola`, `data`, `ordutegia`, `monitorea`, `gela`, `bezeroNAN`) VALUES
('Areto Futbola', '2021-11-13', '12:34', 'Jon', 'P7I5', '12345678Z'),
('Areto Futbola', '2021-11-18', '16:06', 'Peio', 'P1I5', '12345678Z'),
('Areto Futbola', '2021-11-21', '20:30', 'Aimar', 'P1I3', '12345678Z'),
('Areto Futbola', '2021-12-17', '11:11', 'Peio', 'P1I2', '12345678Z'),
('Areto Futbola', '2021-12-22', '11:30', 'Maider', 'P2I5', '47747474A'),
('Gimnasia Erritmikoa', '2021-11-21', '11:45', 'Andoni', 'P3I3', '11223344B'),
('Gimnasia Erritmikoa', '2021-12-22', '18:00', 'Peio', 'P1I2', '89987667Y'),
('Gimnasia Erritmikoa', '2022-01-13', '09:00', 'Claudia', 'P1I2', '89987667Y'),
('Gimnasioa', '2021-11-13', '11:11', 'Sara', 'P4I1', '11223344B'),
('Gimnasioa', '2021-12-16', '10:00', 'Asier', 'P1I3', '89987667Y'),
('Gimnasioa', '2021-12-17', '08:30', 'Peio', 'P7I5', '47747474A'),
('Gimnasioa', '2022-01-06', '12:00', 'Ander', 'P1I3', '67543454K'),
('Gimnasioa', '2022-01-07', '21:00', 'Peio', 'P1I5', '47747474A'),
('Gimnasioa', '2022-01-14', '18:00', 'Irene', 'P1I3', '67543454K'),
('Gimnasioa', '2022-11-01', '19:00', 'Irene', 'P1I3', '67543454K'),
('Igeriketa', '2021-11-20', '18:00', 'Asier', 'P2I8', '87654321X'),
('Igeriketa', '2021-12-16', '20:30', 'Claudia', 'P1I3', '11223344B'),
('Igeriketa', '2021-12-17', '13:30', 'Peio', 'P2I4', '47747474A'),
('Igeriketa', '2022-01-11', '10:00', 'Claudia', 'P2I8', '34456212G'),
('Saskibaloia', '2021-11-22', '10:00', 'Markel', 'P1I2', '34456212G'),
('Saskibaloia', '2021-12-08', '10:15', 'Andoni', 'P1I1', '67543454K'),
('Saskibaloia', '2021-12-29', '19:00', 'Peio', 'P1I1', '87654321X'),
('Saskibaloia', '2022-01-06', '20:02', 'Ainara', 'P2I7', '11223344B'),
('Squash', '2021-12-17', '11:00', 'Miren', 'P1I5', '89987667Y'),
('Squash', '2021-12-23', '13:30', 'Eneko', 'P1I3', '11223344B'),
('Squash', '2021-12-24', '11:00', 'Peio', 'P1I3', '47747474A'),
('Squash', '2022-01-26', '20:00', 'Asier', 'P1I5', '67543454K');

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
  ADD CONSTRAINT `bezeroNAN` FOREIGN KEY (`bezeroNAN`) REFERENCES `bezeroa` (`NAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;