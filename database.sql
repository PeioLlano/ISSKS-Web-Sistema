-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `bezeroa` (
  `izenAbizenak` varchar(30) NOT NULL,
  `NAN` char(9) NOT NULL,
  `telefonoa` int(9) NOT NULL,
  `jaiotzeData` date NOT NULL,
  `email` varchar(30) NOT NULL,
   primary key(`NAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `elementua` (
  `kirola` varchar(15) NOT NULL,
  `data` date NOT NULL,
  `ordutegia` char(5) NOT NULL,
  `monitorea` varchar(30) NOT NULL,
  `gela` varchar(15) NOT NULL,
   primary key(`kirola`,`data`,`ordutegia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
