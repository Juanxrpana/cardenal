-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 13:36:59
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cardenal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombre_cargo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `nombre_cargo`) VALUES
(1, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedula_fiscal`
--

CREATE TABLE `cedula_fiscal` (
  `id_cedula_fiscal` int(11) NOT NULL,
  `cedula_fiscal` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cedula_fiscal`
--

INSERT INTO `cedula_fiscal` (`id_cedula_fiscal`, `cedula_fiscal`) VALUES
(1, 'V-'),
(2, 'J-'),
(3, 'G-'),
(4, 'C-'),
(5, 'E-'),
(6, 'P-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `fecha_compra` date DEFAULT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_prov`
--

CREATE TABLE `datos_prov` (
  `identificacion` int(11) NOT NULL,
  `nombre_prov` varchar(20) DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `cedula_fiscal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_prov`
--

INSERT INTO `datos_prov` (`identificacion`, `nombre_prov`, `telefono`, `cedula_fiscal_id`) VALUES
(1232413, 'adasasd', 213213, 4),
(15728175, 'Sarait', 2147483647, 1),
(22232558, 'OBG C.A.', 55, 1),
(53637425, 'KENDRICK', 53637425, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE `finca` (
  `idfinca` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `nombre_finca` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `parroquia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `coordenadas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`idfinca`, `ubicacion`, `nombre_finca`, `estado`, `municipio`, `parroquia`, `ciudad`, `coordenadas`) VALUES
(17, 'Si', 'Finca Sarait', 'Lara', 'Moran', 'Bolivar', 'El Tocuyo', 'Coordenadas Sarait');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `finca_idfinca` int(11) NOT NULL,
  `datos_prov_identificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `finca_idfinca`, `datos_prov_identificacion`) VALUES
(14, 17, 15728175);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quintal`
--

CREATE TABLE `quintal` (
  `idquintal` int(11) NOT NULL,
  `calidad_idcalidad` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idcompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `cargo_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombres`, `apellidos`, `usuario`, `password`, `cargo_idcargo`) VALUES
(12312, 'si1', 'si2', 'si3', 'si4', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `cedula_fiscal`
--
ALTER TABLE `cedula_fiscal`
  ADD PRIMARY KEY (`id_cedula_fiscal`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `fk_compra_proveedor1_idx` (`proveedor_id_proveedor`),
  ADD KEY `fk_compra_usuario1_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `datos_prov`
--
ALTER TABLE `datos_prov`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `fk_datos_prov_cedula_fiscal` (`cedula_fiscal_id`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`idfinca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`),
  ADD KEY `fk_proveedor_finca_idx` (`finca_idfinca`),
  ADD KEY `fk_datos_prov_identificacion_idx` (`datos_prov_identificacion`);

--
-- Indices de la tabla `quintal`
--
ALTER TABLE `quintal`
  ADD PRIMARY KEY (`idquintal`),
  ADD KEY `fk_idcompra1` (`idcompra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_cargo1_idx` (`cargo_idcargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cedula_fiscal`
--
ALTER TABLE `cedula_fiscal`
  MODIFY `id_cedula_fiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `datos_prov`
--
ALTER TABLE `datos_prov`
  MODIFY `identificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `idfinca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `quintal`
--
ALTER TABLE `quintal`
  MODIFY `idquintal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12314;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_proveedor` FOREIGN KEY (`proveedor_id_proveedor`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_prov`
--
ALTER TABLE `datos_prov`
  ADD CONSTRAINT `fk_datos_prov_cedula_fiscal` FOREIGN KEY (`cedula_fiscal_id`) REFERENCES `cedula_fiscal` (`id_cedula_fiscal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_datos_prov1` FOREIGN KEY (`datos_prov_identificacion`) REFERENCES `datos_prov` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proveedor_finca` FOREIGN KEY (`finca_idfinca`) REFERENCES `finca` (`idfinca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quintal`
--
ALTER TABLE `quintal`
  ADD CONSTRAINT `fk_idcompra1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cargo1` FOREIGN KEY (`cargo_idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
