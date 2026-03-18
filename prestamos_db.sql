-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2026 a las 04:29:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestamos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `usuario`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amortizacion`
--

CREATE TABLE `amortizacion` (
  `id_amortizacion` int(11) NOT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `numero_pago` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `saldo_inicial` decimal(10,2) DEFAULT NULL,
  `pago` decimal(10,2) DEFAULT NULL,
  `capital` decimal(10,2) DEFAULT NULL,
  `interes` decimal(10,2) DEFAULT NULL,
  `recargos` decimal(10,2) DEFAULT NULL,
  `dias_vencidos` int(11) DEFAULT NULL,
  `pago_requerido` decimal(10,2) DEFAULT NULL,
  `pago_real` decimal(10,2) DEFAULT NULL,
  `fecha_deposito` date DEFAULT NULL,
  `saldo_pendiente` decimal(10,2) DEFAULT NULL,
  `saldo_actual` decimal(10,2) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aval`
--

CREATE TABLE `aval` (
  `id_aval` int(11) NOT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `estado_municipio` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `ine` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `direccion`, `telefono`, `correo`, `fecha_registro`) VALUES
(1, 'Veronica Serrano Rosas ', 'Privada Paseo Begonia Edificio 17 Fraccionamiento los Sauces C.P74160 Huejotzingo Puebla', '2211172455', 'icamachotoxqui3@gmail.com', '2026-03-14'),
(2, 'ADRIANA ROMERO SANCHEZ', 'C. 9 PTE AMPLIACION GUADALUPE', '2215810803', 'tjnaruto9@gmail.com', '2026-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dacion_pago`
--

CREATE TABLE `dacion_pago` (
  `id_dacion` int(11) NOT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `numero_serie` varchar(50) DEFAULT NULL,
  `numero_motor` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `numero_pago` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `numero_contrato` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `interes_anual` decimal(5,2) DEFAULT NULL,
  `cargo_servicio` decimal(10,2) DEFAULT NULL,
  `cuota` decimal(10,2) DEFAULT NULL,
  `semanas` int(11) DEFAULT NULL,
  `tipo_pago` varchar(20) DEFAULT NULL,
  `fecha_primer_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias_aval`
--

CREATE TABLE `referencias_aval` (
  `id_referencia` int(11) NOT NULL,
  `id_aval` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias_cliente`
--

CREATE TABLE `referencias_cliente` (
  `id_referencia` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id_vendedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id_vendedor`, `nombre`, `telefono`, `direccion`, `correo`, `fecha_registro`) VALUES
(1, 'JAVIER REYES RAMOS', '2224281488', 'C 9 pte 28', 'sreivaj20@gmail.com', '2026-03-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `amortizacion`
--
ALTER TABLE `amortizacion`
  ADD PRIMARY KEY (`id_amortizacion`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `aval`
--
ALTER TABLE `aval`
  ADD PRIMARY KEY (`id_aval`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `dacion_pago`
--
ALTER TABLE `dacion_pago`
  ADD PRIMARY KEY (`id_dacion`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `referencias_aval`
--
ALTER TABLE `referencias_aval`
  ADD PRIMARY KEY (`id_referencia`),
  ADD KEY `id_aval` (`id_aval`);

--
-- Indices de la tabla `referencias_cliente`
--
ALTER TABLE `referencias_cliente`
  ADD PRIMARY KEY (`id_referencia`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `amortizacion`
--
ALTER TABLE `amortizacion`
  MODIFY `id_amortizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aval`
--
ALTER TABLE `aval`
  MODIFY `id_aval` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dacion_pago`
--
ALTER TABLE `dacion_pago`
  MODIFY `id_dacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencias_aval`
--
ALTER TABLE `referencias_aval`
  MODIFY `id_referencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencias_cliente`
--
ALTER TABLE `referencias_cliente`
  MODIFY `id_referencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amortizacion`
--
ALTER TABLE `amortizacion`
  ADD CONSTRAINT `amortizacion_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`);

--
-- Filtros para la tabla `aval`
--
ALTER TABLE `aval`
  ADD CONSTRAINT `aval_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`);

--
-- Filtros para la tabla `dacion_pago`
--
ALTER TABLE `dacion_pago`
  ADD CONSTRAINT `dacion_pago_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `referencias_aval`
--
ALTER TABLE `referencias_aval`
  ADD CONSTRAINT `referencias_aval_ibfk_1` FOREIGN KEY (`id_aval`) REFERENCES `aval` (`id_aval`);

--
-- Filtros para la tabla `referencias_cliente`
--
ALTER TABLE `referencias_cliente`
  ADD CONSTRAINT `referencias_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
