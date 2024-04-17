-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2024 a las 00:42:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ifts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `User` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`User`, `Password`, `Id`) VALUES
('admin', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorías`
--

CREATE TABLE `categorías` (
  `id` int(11) NOT NULL,
  `Categoría` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorías`
--

INSERT INTO `categorías` (`id`, `Categoría`) VALUES
(1, 'Remeras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidoproveedor`
--

CREATE TABLE `detallepedidoproveedor` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`id`, `idVenta`, `idProducto`, `cantidad`) VALUES
(7, 12, 33, 1),
(8, 13, 33, 4),
(9, 14, 35, 1),
(10, 15, 36, 2),
(11, 16, 35, 1),
(12, 16, 36, 3),
(13, 17, 33, 4),
(14, 17, 41, 3),
(15, 17, 43, 1),
(16, 17, 44, 1),
(24, 21, 41, 2),
(25, 21, 36, 2),
(27, 21, 44, 1),
(28, 22, 33, 2),
(29, 22, 43, 1),
(31, 23, 35, 2),
(32, 23, 36, 1),
(33, 24, 36, 1),
(34, 24, 33, 1),
(35, 25, 33, 4),
(36, 25, 37, 1),
(37, 26, 43, 1),
(38, 27, 44, 90),
(39, 28, 44, 10),
(40, 29, 33, 1),
(41, 29, 36, 1),
(42, 30, 33, 2),
(43, 31, 35, 2),
(44, 32, 33, 11),
(45, 33, 33, 1),
(46, 34, 33, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoproveedor`
--

CREATE TABLE `pedidoproveedor` (
  `idProveedor` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `precioPedido` int(11) NOT NULL,
  `fechaPedido` date NOT NULL DEFAULT current_timestamp(),
  `fechaEntrega` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Name` varchar(60) NOT NULL,
  `Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `Categoría` varchar(255) NOT NULL,
  `Eliminado` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Name`, `Id`, `quantity`, `price`, `description`, `img_url`, `estado`, `Categoría`, `Eliminado`, `IdProveedor`) VALUES
('Remera Boca', 33, 10, 15000, 'Remera', 'IMG-652d5d229d7be2.96400195.jpg', 0, '1', 0, 1),
('Remera Huracan', 35, 144, 2000, 'Remera Huracan', 'IMG-652d5d606745e6.63913325.jpg', 1, '1', 0, 1),
('Remera Lanus', 36, 87, 1002, 'Remera Lanus', 'IMG-652d5d746875f8.47067632.jpg', 0, '1', 0, 1),
('Nueva Remera', 37, 7, 150, 'dsadasd', '', 0, '1', 0, 2),
('Remera Boca 2', 41, 95, 1500, 'Remera Boca 2', 'IMG-652d9062d554f9.36604174.jpg', 0, '1', 0, 1),
('Remera San Lorenzo', 42, 100, 1500, 'Remera San Lorenzo', 'IMG-652d90775d3b74.66510837.jpg', 0, '1', 0, 2),
('Remera Platense', 43, 97, 1700, 'Remera Platense', 'IMG-652d90acb8c867.50135960.jpg', 0, '1', 0, 1),
('Remera Arsenal', 44, 10, 1500, 'Remera Arsenal', 'IMG-652d90c8b42f23.10171942.jpg', 0, '1', 0, 2),
('remera ', 45, 98, 1000, 'hughui', 'IMG-65328966e344b2.60866561.jpg', 1, '1', 0, 1),
('Remera DyJ', 46, 20, 1500, 'Remera DyJ', 'IMG-654e4fa6afecd3.89814507.jpg', 0, '1', 0, 2),
('Remera Velez', 47, 20, 1000, 'Remera Velez', 'IMG-654e506e90d355.27759854.jpg', 0, '1', 0, 2),
('Remera River', 48, 50, 2000, 'Remera River', 'IMG-654e507c3160f7.66700808.jpg', 0, '1', 0, 1),
('Remera Argentinos Jrs', 49, 50, 2000, 'Remera Argentinos Jrs', 'IMG-654e50c20bc2c3.91180942.jpg', 0, '1', 0, 2),
('Remera Independiente', 50, 15, 2000, 'Remera Independiente', 'IMG-654e51355e5a57.70504486.jpg', 0, '1', 0, 2),
('Remera Rosario Central', 51, 50, 2000, 'Remera Rosario Central', 'IMG-654e5181e0ce89.54092786.jpg', 0, '1', 0, 1),
('Remera Unión', 52, 100, 1500, 'Remera Unión', 'IMG-654e519a9df507.83163984.jpg', 0, '1', 0, 2),
('Remera Banfield', 53, 100, 1500, 'Remera Banfield', 'IMG-654e51ad0468b4.00232695.jpg', 0, '1', 0, 1),
('Remera Atl. Tucumán', 54, 25, 2500, 'Remera Atlético Tucumán', 'IMG-654e51dbbde3e8.79212809.jpg', 0, '1', 0, 2),
('Remera Racing', 55, 10, 1700, 'Remera Racing', 'IMG-654e51f93beaa0.95565677.jpg', 0, '1', 0, 1),
('remera2', 56, 15, 1000, '200', 'IMG-6556a6cc671c81.12945246.jpg', 0, '1', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `Nombre`, `Email`, `Telefono`) VALUES
(1, 'Nike', 'support@nike.com', 1557465383),
(2, 'Adidas', 'support@adidas.com', 1554579214);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `username`, `password`) VALUES
(23, 'ian7@gmail.com', 'Ian', '$2y$10$dE6WoGXu.r8gEOI9z7EinuJE4ZdJIUMi5qWQDIKqitQcd.sYe9jTi'),
(30, 'ian5@gmail.com', 'Ian', '$2y$10$9c2N8KcSS/Z2/78F9x2H5.tzOoYpFg1sC/xwLb5Xg/s1N.9WTbUz2'),
(33, 'abruzzeseian5@gmail.com', 'ABRZ', '$2y$10$oPia4nZE1DRkUNRmmgSLA.MfP0U8liHO85/u6nFgYE6qLnefaWpLi'),
(34, 'ian2@gmail.com', 'Ian', '$2y$10$QDU/XgT6cvUjWiz8sVqovOAW1UhsTwCp/lXfbcdqxeBPJ6UnfAPnm'),
(35, 'ian3@gmail.com', 'ian', '$2y$10$WEeJbO3wZCxJ27/Yr4Z5zuEGVR3kT5pdPh7M1yJxPa3hqvSNGTTwK'),
(36, 'ian8@gmail.com', '3321312', '$2y$10$bOZp5DixXHXq4E4S3x/Y1.HDEJutAXSwsUcw2DBvC6PH4L60EjEUy'),
(37, 'ian22@gmail.com', 'Ian', '$2y$10$hOD3e1vmQD4UMaUUQ6bKNO.VZd9Rsn6UEHdsecZsbM1XbvqVAxrDa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `preciototal` int(11) NOT NULL,
  `fechaVenta` date NOT NULL DEFAULT current_timestamp(),
  `fechaEntrega` date NOT NULL DEFAULT current_timestamp(),
  `fechaEnvio` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `IdCliente`, `preciototal`, `fechaVenta`, `fechaEntrega`, `fechaEnvio`) VALUES
(12, 24, 50000, '2024-04-17', '2024-04-17', '2024-04-17'),
(13, 24, 200000, '2024-04-17', '2024-04-17', '2024-04-17'),
(14, 24, 4000, '2024-04-17', '2024-04-17', '2024-04-17'),
(15, 24, 2004, '2024-04-17', '2024-04-17', '2024-04-17'),
(16, 24, 5006, '2024-04-17', '2024-04-17', '2024-04-17'),
(17, 27, 107700, '2024-04-17', '2024-04-17', '2024-04-17'),
(21, 24, 7704, '2024-04-17', '2024-04-17', '2024-04-17'),
(22, 23, 32900, '2024-04-17', '2024-04-17', '2024-04-17'),
(23, 23, 5002, '2024-04-17', '2024-04-17', '2024-04-17'),
(24, 23, 16002, '2024-04-17', '2024-04-17', '2024-04-17'),
(25, 23, 60412, '2024-04-17', '2024-04-17', '2024-04-17'),
(26, 32, 1700, '2024-04-17', '2024-04-17', '2024-04-17'),
(27, 32, 135000, '2024-04-17', '2024-04-17', '2024-04-17'),
(28, 33, 15000, '2024-04-17', '2024-04-17', '2024-04-17'),
(29, 32, 16002, '2024-04-17', '2024-04-17', '2024-04-17'),
(30, 23, 3000, '2024-04-17', '2024-04-17', '2024-04-17'),
(31, 23, 4000, '2024-04-17', '2024-04-17', '2024-04-17'),
(32, 37, 165000, '2024-04-17', '2024-04-17', '2024-04-17'),
(33, 37, 15000, '2024-04-17', '2024-04-17', '2024-04-17'),
(34, 37, 45000, '2024-04-17', '2024-04-17', '2024-04-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `categorías`
--
ALTER TABLE `categorías`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorías`
--
ALTER TABLE `categorías`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
