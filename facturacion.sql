-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2021 a las 00:06:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisor`
--

CREATE TABLE `emisor` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `FolioFiscal` varchar(100) NOT NULL,
  `CSD` varchar(50) NOT NULL,
  `CP` varchar(10) NOT NULL,
  `Regimen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emisor`
--

INSERT INTO `emisor` (`id`, `Nombre`, `RFC`, `Direccion`, `Email`, `Telefono`, `FolioFiscal`, `CSD`, `CP`, `Regimen`) VALUES
(2, 'HUGO FUENTES AGUILAR GUTIERREZ', 'FUGH6507136L7', '', '', '', 'DE5CB1E4-C65E-4295', '00001000000407859138', '86029', 'Persona Física con Actividades Empresarial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `Subtotal` float NOT NULL,
  `IVA` float NOT NULL,
  `Moneda` varchar(20) NOT NULL,
  `FormaPago` varchar(20) NOT NULL,
  `MetodoPago` varchar(30) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receptor`
--

CREATE TABLE `receptor` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receptor`
--

INSERT INTO `receptor` (`id`, `Nombre`, `RFC`, `Direccion`, `Telefono`, `Email`) VALUES
(1, 'INIVERSIDAD JUAREZ AUTONOMA DE TABASCO', 'UJA5801014N3', 'Centro, Tabasco', '931231231', 'ujat@ujat.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `VUnitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IVA` float NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Base` float NOT NULL,
  `Tasa` float NOT NULL,
  `idemisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `Nombre`, `Tipo`) VALUES
(1, 'admin', 'admin', 'Super Administrador', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `emisor`
--
ALTER TABLE `emisor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idreceptor` (`idreceptor`),
  ADD KEY `idservicio` (`idservicio`);

--
-- Indices de la tabla `receptor`
--
ALTER TABLE `receptor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idemisor` (`idemisor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emisor`
--
ALTER TABLE `emisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receptor`
--
ALTER TABLE `receptor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`id`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idreceptor`) REFERENCES `receptor` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `emisor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
