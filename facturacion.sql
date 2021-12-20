-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2021 a las 13:18:55
-- Versión del servidor: 8.0.27-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

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
  `id` int NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `servicio` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cotizar`
--

INSERT INTO `cotizar` (`id`, `cliente`, `telefono`, `email`, `fecha`, `servicio`, `direccion`, `costo`) VALUES
(1, 'CERACON SA DE CV', '9932324232', 'algo@google.com', '2021-12-15', 'LIMPIEZA DE TODOS LOS MINI-SPLIT MARCA CARRIER, JAPANDO Y LG. MANO DE OBRA EN LAS INSTALACIONES DE NUEVOS EQUIPOS EN PLANTA ALTA', 'VILLAHERMOSA, TABASCO', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisor`
--

CREATE TABLE `emisor` (
  `id` int NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `FolioFiscal` varchar(100) NOT NULL,
  `CSD` varchar(50) NOT NULL,
  `CP` varchar(10) NOT NULL,
  `Regimen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `folio` varchar(20) NOT NULL,
  `Subtotal` float DEFAULT NULL,
  `IVA` float DEFAULT NULL,
  `Moneda` varchar(20) NOT NULL,
  `FormaPago` varchar(20) NOT NULL,
  `MetodoPago` varchar(30) NOT NULL,
  `iduser` int DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `folio`, `Subtotal`, `IVA`, `Moneda`, `FormaPago`, `MetodoPago`, `iduser`, `Fecha`) VALUES
(9, 'QWE12', 0, 0, 'Nacional', 'Contado', 'Contado', 0, '2021-12-19'),
(11, 'ZZZAA', NULL, NULL, 'Nacional', 'Contado', 'Pagos en parcialidades', NULL, '2021-12-19'),
(12, 'zczc', NULL, NULL, 'Nacional', 'Credito', 'Pagos diferidos', NULL, '2021-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receptor`
--

CREATE TABLE `receptor` (
  `id` int NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `receptor`
--

INSERT INTO `receptor` (`id`, `Nombre`, `RFC`, `Direccion`, `Telefono`, `Email`) VALUES
(1, 'INIVERSIDAD JUAREZ AUTONOMA DE TABASCO', 'UJA5801014N3', 'Centro, Tabasco', '931231231', 'ujat@ujat.mx'),
(3, 'UNIVERSIDAD TECNOLOGICA DE LA SIERRA', 'TECSI2021', 'Teapa, Tabasco', '9999999999', 'tec@itss.mx'),
(4, 'Universidad Olmeca', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `VUnitario` float NOT NULL,
  `Cantidad` int NOT NULL,
  `IVA` float NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Base` float NOT NULL,
  `Tasa` float NOT NULL,
  `idreceptor` int NOT NULL,
  `Factura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `Descripcion`, `VUnitario`, `Cantidad`, `IVA`, `Tipo`, `Base`, `Tasa`, `idreceptor`, `Factura`) VALUES
(3, 'Mantenimiento de clima BTU, Año 2000 ', 1223, 2, 0.16, 'Mantenimiento general', 0.2, 0.1, 1, 'QWE12'),
(8, 'WEER', 1000, 1, 0.16, 'Mantenimiento general', 0.16, 0.15, 3, ''),
(9, 'MANTENIMIENTO GENERAL PREVENTIVO Y CORRECTIVO DE CLIMA MINI-SPLIT 33600 BTU MARCA: LENNOX UBICACION:MASTER ROOM SERVID OR PLANTA BAJA INV. S/S2816D10190 REPARACION DE MOOR DE EVAPORADORA', 2000, 1, 0.16, 'Mantenimiento general', 2000, 0.16, 1, 'QWE12'),
(11, 'xxx', 0, 0, 0, 'Reparación de clima', 0, 0, 3, ''),
(12, 'qweq', 0, 0, 0, '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `Nombre`) VALUES
(1, 'Reparación de clima'),
(2, 'Mantenimiento general'),
(3, 'Instalación de climas'),
(4, 'Climas industriales'),
(5, 'Reparación de electrodoméstico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `emisor`
--
ALTER TABLE `emisor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `receptor`
--
ALTER TABLE `receptor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
