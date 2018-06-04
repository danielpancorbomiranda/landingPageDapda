-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2018 a las 21:04:50
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `landingpage_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `NombreSolicitante` varchar(30) NOT NULL,
  `ApellidosSolicitante` varchar(50) NOT NULL,
  `EmailSolicitante` varchar(30) NOT NULL,
  `TelefonoSolicitante` varchar(9) DEFAULT NULL,
  `TipoDeVehiculo` varchar(30) NOT NULL,
  `Vehiculo` varchar(30) NOT NULL,
  `PreferenciaDeLlamada` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`NombreSolicitante`, `ApellidosSolicitante`, `EmailSolicitante`, `TelefonoSolicitante`, `TipoDeVehiculo`, `Vehiculo`, `PreferenciaDeLlamada`) VALUES
('Antonio', 'Parras Medina', 'aparrasmedina_09@gmail.com', '912321809', 'Todo Terreno', 'Mokka', 'Tarde'),
('Aurora', 'Lara Serrano', 'alaraserrano@hotmail.com', '621092890', 'Turismo', 'Corsa', 'Tarde'),
('Miguel', 'Ñiguez Torres', 'migueldandy@gmail.com', '620932890', 'Turismo', 'Astra', 'Mañana'),
('Pedro', 'Aguilar Melero', 'pedro_a_m@hotmail.com', '652031989', 'Todo Terreno', 'Crossland', 'Noche'),
('Nieves', 'Ibañez Miranda', 'niiba@gmail.com', '912346701', 'Turismo', 'Corsa', 'Tarde'),
('Luis', 'Carrasco Pérez', 'luiscperez@gmail.com', '953237886', 'Todo Terreno', 'Crossland', 'Tarde'),
('Francisco', 'Montoro Díaz', 'fcomd@hotmail.com', '711231892', 'Comercial', 'Corsa', 'Noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `TipoDeVehiculo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`TipoDeVehiculo`) VALUES
('Comercial'),
('Todo Terreno'),
('Turismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Modelo` varchar(30) NOT NULL,
  `TipoDeVehiculo1` varchar(30) NOT NULL,
  `TipoDeVehiculo2` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Modelo`, `TipoDeVehiculo1`, `TipoDeVehiculo2`) VALUES
('Corsa', 'Comercial', 'Turismo'),
('Astra', 'Comercial', 'Turismo'),
('Mokka', 'Todo Terreno', ''),
('Crossland', 'Todo Terreno', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`EmailSolicitante`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`TipoDeVehiculo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Modelo`),
  ADD KEY `TipoDeVehiculo1` (`TipoDeVehiculo1`),
  ADD KEY `TipoDeVehiculo2` (`TipoDeVehiculo2`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
