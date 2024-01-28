-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2024 a las 16:01:44
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
-- Estructura de tabla para la tabla `cafe_final`
--

CREATE TABLE `cafe_final` (
  `id_cafe_final` int(11) NOT NULL,
  `idcafe_tostado` int(11) DEFAULT NULL,
  `cantidad_paquetes` int(11) DEFAULT NULL,
  `fecha_empaquetado` date DEFAULT NULL,
  `id_bulto` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cafe_final`
--

INSERT INTO `cafe_final` (`id_cafe_final`, `idcafe_tostado`, `cantidad_paquetes`, `fecha_empaquetado`, `id_bulto`, `estado`) VALUES
(315, 180, 37, '2024-01-26', 180, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe_tostado`
--

CREATE TABLE `cafe_tostado` (
  `idcafe_tostado` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `nivel_tostado` int(11) NOT NULL,
  `nivel_molido` int(11) NOT NULL,
  `estado` varchar(8) DEFAULT NULL,
  `fecha_tostado` date NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cafe_tostado`
--

INSERT INTO `cafe_tostado` (`idcafe_tostado`, `cantidad`, `nivel_tostado`, `nivel_molido`, `estado`, `fecha_tostado`, `usuario_idusuario`) VALUES
(177, 5, 2, 3, '0', '2024-01-26', 28150004),
(180, 5, 2, 3, '0', '2024-01-26', 28150004);

--
-- Disparadores `cafe_tostado`
--
DELIMITER $$
CREATE TRIGGER `restar_valor_total_cafe` AFTER INSERT ON `cafe_tostado` FOR EACH ROW BEGIN
    -- Restar el valor de cantidad al campo total de id_total_cafe 2 en total_cafe
    UPDATE total_cafe
    SET total = total - NEW.cantidad
    WHERE id_total_cafe = 1;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restar_valor_total_cafe_update` AFTER UPDATE ON `cafe_tostado` FOR EACH ROW BEGIN
    -- Obtener la diferencia entre el nuevo y viejo valor de cantidad
    DECLARE diferencia INT;
    SET diferencia = NEW.cantidad - OLD.cantidad;

    -- Restar la diferencia al campo total de id_total_cafe 2 en total_cafe
    UPDATE total_cafe
    SET total = total - diferencia
    WHERE id_total_cafe = 1;
END
$$
DELIMITER ;

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
(1, 'user'),
(2, 'admin');

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

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `fecha_compra`, `proveedor_id_proveedor`, `usuario_idusuario`) VALUES
(199, '2024-04-28', 41, 28150004);

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
(15728175, 'Zoraimar Linárez', 2147483647, 1),
(22232558, 'OBG C.A.', 55, 1),
(28150004, 'Juan E Silva', 2147483647, 1),
(30623657, 'Paula Silva', 2147483647, 1),
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
  `ciudad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`idfinca`, `ubicacion`, `nombre_finca`, `estado`, `municipio`, `parroquia`, `ciudad`) VALUES
(44, 'Cerro 2 cerca de la cruz', 'Finca Paula', 'Lara', 'Morán', 'Bolivar', 'El Tocuyo'),
(45, 'En mi casa', 'Juan Silva finca', 'Lara', 'Moran', 'Bolivar', 'El Tocuyo'),
(46, 'Subiendo por quebrada negra km 8', 'Finca Fernandez', 'Portuguesa', 'Unda', 'Quebrada Negra', 'Chabasquen');

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
(40, 44, 30623657),
(41, 45, 28150004),
(42, 46, 15728175);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quintal`
--

CREATE TABLE `quintal` (
  `idquintal` int(11) NOT NULL,
  `calidad_idcalidad` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `idcompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quintal`
--

INSERT INTO `quintal` (`idquintal`, `calidad_idcalidad`, `cantidad`, `estado`, `idcompra`) VALUES
(255, 1, 1, 0, 199);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_cafe`
--

CREATE TABLE `total_cafe` (
  `id_total_cafe` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `total_cafe`
--

INSERT INTO `total_cafe` (`id_total_cafe`, `total`) VALUES
(1, 0),
(2, 0),
(3, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `cargo_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombres`, `apellidos`, `usuario`, `password`, `cargo_idcargo`) VALUES
(28150004, 'si1', 'si2', 'si3', '28150004', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cafe_final`
--
ALTER TABLE `cafe_final`
  ADD PRIMARY KEY (`id_cafe_final`),
  ADD KEY `cafe_final_ibfk_1` (`idcafe_tostado`);

--
-- Indices de la tabla `cafe_tostado`
--
ALTER TABLE `cafe_tostado`
  ADD PRIMARY KEY (`idcafe_tostado`),
  ADD KEY `fk_usuario_cafe_tostado` (`usuario_idusuario`);

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
-- Indices de la tabla `total_cafe`
--
ALTER TABLE `total_cafe`
  ADD PRIMARY KEY (`id_total_cafe`);

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
-- AUTO_INCREMENT de la tabla `cafe_final`
--
ALTER TABLE `cafe_final`
  MODIFY `id_cafe_final` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT de la tabla `cafe_tostado`
--
ALTER TABLE `cafe_tostado`
  MODIFY `idcafe_tostado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cedula_fiscal`
--
ALTER TABLE `cedula_fiscal`
  MODIFY `id_cedula_fiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `datos_prov`
--
ALTER TABLE `datos_prov`
  MODIFY `identificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `idfinca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `quintal`
--
ALTER TABLE `quintal`
  MODIFY `idquintal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT de la tabla `total_cafe`
--
ALTER TABLE `total_cafe`
  MODIFY `id_total_cafe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28150006;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cafe_final`
--
ALTER TABLE `cafe_final`
  ADD CONSTRAINT `cafe_final_ibfk_1` FOREIGN KEY (`idcafe_tostado`) REFERENCES `cafe_tostado` (`idcafe_tostado`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `cafe_tostado`
--
ALTER TABLE `cafe_tostado`
  ADD CONSTRAINT `fk_usuario_cafe_tostado` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
