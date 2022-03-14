-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2022 a las 05:45:25
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
-- Estructura de tabla para la tabla `cotizar`
--

CREATE TABLE `cotizar` (
  `id` int(11) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `servicio` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `costo` float NOT NULL,
  `movil` varchar(10) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(250) NOT NULL,
  `numero` int(5) NOT NULL,
  `cp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizar`
--

INSERT INTO `cotizar` (`id`, `cliente`, `telefono`, `email`, `fecha`, `servicio`, `direccion`, `costo`, `movil`, `municipio`, `colonia`, `calle`, `numero`, `cp`) VALUES
(1, 'CERACON SA DE CV', '9932324232', 'algo@google.com', '2021-12-15', 'LIMPIEZA DE TODOS LOS MINI-SPLIT MARCA CARRIER, JAPANDO Y LG. MANO DE OBRA EN LAS INSTALACIONES DE NUEVOS EQUIPOS EN PLANTA ALTA', 'VILLAHERMOSA, TABASCO', 2000, '9932324232', 'Tacotalpa', 'Centro', 'Sebastian Lerod de tejada', 13, 86870),
(2, 'Carlos Rafael Gutierrez Sanchez', '9931245356', 'rafamarquez@google.com', '0000-00-00', 'Instalacion básica mini split 1 y 1.5 t', '', 1000, '9994324678', 'Cardenas', 'Centro', 'Calixto merino', 2, 86890);

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
  `iduser` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `folio`, `idreceptor`, `idservicio`, `Subtotal`, `IVA`, `Moneda`, `FormaPago`, `MetodoPago`, `iduser`, `Fecha`) VALUES
(7, 'www', 0, 0, 0, 0, 'Nacional', 'Contado', 'Contado', 0, '0000-00-00'),
(9, 'QWE12', 0, 0, 0, 0, 'Nacional', 'Contado', 'Contado', 0, '2021-12-19'),
(10, '', 0, 0, 0, 0, '', '', '', 0, '0000-00-00');

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
(1, 'INIVERSIDAD JUAREZ AUTONOMA DE TABASCO', 'UJA5801014N3', 'Centro, Tabasco', '931231231', 'ujat@ujat.mx'),
(3, 'UNIVERSIDAD TECNOLOGICA DE LA SIERRA', 'TECSI2021', 'Teapa, Tabasco', '9999999999', 'tec@itss.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `VUnitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IVA` float NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Base` float NOT NULL,
  `Tasa` float NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `Factura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `Descripcion`, `VUnitario`, `Cantidad`, `IVA`, `Tipo`, `Base`, `Tasa`, `idreceptor`, `Factura`) VALUES
(1, 'asdass', 0, 0, 0, 'Reparación de clima', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `Nombre`) VALUES
(1, 'Reparación de clima'),
(2, 'Mantenimiento general'),
(3, 'Instalación de climas'),
(4, 'Climas industriales'),
(5, 'Reparación de electrodoméstico'),
(6, 'Mantenimiento preventivo mayor'),
(7, 'Instalacion básica mini split 1 y 1.5 t'),
(8, 'Instalacion básica mini split 2 y 3 t'),
(9, 'Cambio de armaflex'),
(10, 'Cambio de compresor rotativo'),
(11, 'Cambio o adaptación de tarjeta universal'),
(12, 'Remplazo de sensores');

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
(3, 'admin', 'admin', 'Soy Super Usuario', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emisor`
--
ALTER TABLE `emisor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receptor`
--
ALTER TABLE `receptor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `emisor`
--
ALTER TABLE `emisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `receptor`
--
ALTER TABLE `receptor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
