-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 06:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `User` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`User`, `Password`, `Id`) VALUES
('admin', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorías`
--

CREATE TABLE `categorías` (
  `id` int(11) NOT NULL,
  `Categoría` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorías`
--

INSERT INTO `categorías` (`id`, `Categoría`) VALUES
(1, 'Remeras'),
(2, 'Pantalones'),
(3, 'Camperas');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `mensaje` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `telefono`, `mensaje`) VALUES
(1, 'german', 'german.l.ponzio@hotmail.com', 46457371, 'Hola quiero obtener informacion '),
(2, 'Ramiro', 'ramiro@gmail.com', 15634567, 'Quisiera obtener mas informacion '),
(3, 'Juan', 'juan@gmail.com', 1532617895, 'Hola buenas tardes, quisiera saber cuanto esta la '),
(4, 'Juan', 'Juan@juanhotmail.com', 124354653, 'Hola quisiera tener informacion');

-- --------------------------------------------------------

--
-- Table structure for table `detallepedidoproveedor`
--

CREATE TABLE `detallepedidoproveedor` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detallepedidoproveedor`
--

INSERT INTO `detallepedidoproveedor` (`idVenta`, `idProducto`, `cantidadProducto`) VALUES
(3, 33, 3),
(3, 35, 3),
(3, 36, 3),
(3, 43, 3),
(4, 42, 15),
(4, 44, 15),
(4, 50, 40),
(5, 42, 100),
(5, 50, 100),
(5, 47, 100),
(6, 46, 5),
(6, 44, 5),
(7, 50, 10),
(7, 49, 10),
(7, 52, 10),
(8, 36, 10),
(8, 41, 15),
(8, 55, 10),
(9, 35, 12),
(9, 36, 12),
(9, 43, 12),
(10, 35, 4),
(10, 33, 4),
(10, 36, 4),
(10, 43, 4),
(11, 33, 12),
(11, 53, 2),
(11, 48, 10),
(11, 36, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalleventas`
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
(46, 34, 33, 3),
(47, 35, 36, 1),
(48, 35, 33, 1),
(49, 36, 33, 1),
(50, 37, 44, 1),
(51, 38, 44, 8),
(52, 39, 42, 96),
(53, 40, 33, 1),
(54, 41, 41, 1),
(55, 42, 42, 1),
(56, 42, 46, 1),
(57, 43, 43, 1),
(58, 44, 36, 1),
(59, 45, 42, 2),
(60, 46, 41, 92),
(61, 47, 36, 9),
(62, 48, 36, 72),
(63, 49, 36, 1),
(64, 50, 46, 17),
(65, 51, 43, 3),
(66, 51, 49, 1),
(67, 52, 33, 5),
(68, 53, 46, 1),
(69, 54, 43, 90),
(70, 55, 48, 47),
(71, 56, 43, 1),
(72, 57, 33, 1),
(73, 58, 41, 1),
(74, 59, 41, 1),
(75, 59, 42, 1),
(76, 59, 44, 1),
(77, 59, 58, 4),
(78, 60, 35, 4),
(79, 60, 58, 14),
(80, 61, 47, 16),
(81, 62, 51, 14),
(82, 63, 56, 14);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `Texto` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `Tipo` text NOT NULL,
  `Producto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pedidoproveedor`
--

CREATE TABLE `pedidoproveedor` (
  `idProveedor` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `precioPedido` int(11) NOT NULL,
  `fechaPedido` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedidoproveedor`
--

INSERT INTO `pedidoproveedor` (`idProveedor`, `idPedido`, `precioPedido`, `fechaPedido`) VALUES
(1, 3, 19702, '2024-05-24'),
(2, 4, 5000, '2024-05-24'),
(2, 5, 450000, '2024-05-24'),
(2, 6, 15000, '2024-05-24'),
(2, 7, 55000, '2024-05-24'),
(1, 8, 49520, '2024-05-24'),
(1, 9, 56424, '2024-05-29'),
(1, 10, 78808, '2024-05-29'),
(1, 11, 207008, '2024-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
  `IdProveedor` int(11) NOT NULL,
  `visitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`Name`, `Id`, `quantity`, `price`, `description`, `img_url`, `estado`, `Categoría`, `Eliminado`, `IdProveedor`, `visitas`) VALUES
('Remera Boca', 33, 30, 15000, 'Una remera de boca original, de la temporada actual.', 'IMG-652d5d229d7be2.96400195.jpg', 0, '1', 0, 1, 12),
('Remera Huracan', 35, 140, 2000, 'Remera Huracan', 'IMG-652d5d606745e6.63913325.jpg', 0, '1', 0, 1, 1),
('Remera Lanus', 36, 30, 1002, 'Remera Lanus', 'IMG-652d5d746875f8.47067632.jpg', 0, '1', 0, 1, 3),
('Nueva Remera', 37, 7, 150, 'dsadasd', '', 1, '1', 0, 2, 0),
('Remera Boca 2', 41, 30, 1500, 'Remera Boca 2', 'IMG-652d9062d554f9.36604174.jpg', 0, '1', 0, 1, 4),
('Remera San Lorenzo', 42, 30, 1500, 'Remera San Lorenzo', 'IMG-652d90775d3b74.66510837.jpg', 0, '1', 0, 2, 3),
('Remera Platense', 43, 30, 1700, 'Remera Platense', 'IMG-652d90acb8c867.50135960.jpg', 0, '1', 0, 1, 4),
('Remera Arsenal', 44, 30, 1500, 'Remera Arsenal', 'IMG-652d90c8b42f23.10171942.jpg', 0, '1', 0, 2, 3),
('remera ', 45, 98, 1000, 'hughui', 'IMG-65328966e344b2.60866561.jpg', 1, '1', 0, 1, 0),
('Remera DyJ', 46, 30, 1500, 'Remera DyJ', 'IMG-654e4fa6afecd3.89814507.jpg', 0, '1', 0, 2, 1),
('Remera Velez', 47, 30, 1000, 'Remera Velez', 'IMG-654e506e90d355.27759854.jpg', 0, '1', 0, 2, 1),
('Remera River', 48, 30, 2000, 'Remera River', 'IMG-654e507c3160f7.66700808.jpg', 0, '1', 0, 1, 1),
('Remera Argentinos Jrs', 49, 49, 2000, 'Remera Argentinos Jrs', 'IMG-654e50c20bc2c3.91180942.jpg', 0, '1', 0, 2, 0),
('Remera Independiente', 50, 15, 2000, 'Remera Independiente', 'IMG-654e51355e5a57.70504486.jpg', 0, '1', 0, 2, 0),
('Remera Rosario Central', 51, 36, 2000, 'Remera Rosario Central', 'IMG-654e5181e0ce89.54092786.jpg', 0, '1', 0, 1, 1),
('Remera Unión', 52, 100, 1500, 'Remera Unión', 'IMG-654e519a9df507.83163984.jpg', 0, '1', 0, 2, 0),
('Remera Banfield', 53, 100, 1500, 'Remera Banfield', 'IMG-654e51ad0468b4.00232695.jpg', 0, '1', 0, 1, 0),
('Remera Atl. Tucumán', 54, 25, 2500, 'Remera Atlético Tucumán', 'IMG-654e51dbbde3e8.79212809.jpg', 0, '1', 0, 2, 0),
('Remera Racing', 55, 10, 1700, 'Remera Racing', 'IMG-654e51f93beaa0.95565677.jpg', 0, '1', 0, 1, 0),
('remera2', 56, 30, 1000, '200', 'IMG-6556a6cc671c81.12945246.jpg', 0, '1', 0, 2, 1),
('Remera Test', 57, 100, 1500, 'Remera de prueba', '', 1, '', 0, 3, 0),
('Pantalon Nike', 58, 82, 1000, 'Pantalon Nike', 'IMG-6652266f529319.49892370.png', 0, '2', 0, 1, 4),
('Campera Nike Negra', 59, 50, 5000, 'Campera nike color negro', 'IMG-667c3b4484de52.35457891.jpg', 0, '3', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `Nombre`, `Email`, `Telefono`) VALUES
(1, 'Nike', 'support@nike.com', 1557465385),
(2, 'Adidas', 'support@adidas.com', 1554579214),
(3, 'Puma', 'contact@puma.com', 1241241241);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `username`, `password`) VALUES
(23, 'ian7@gmail.com', 'Ian', '$2y$10$dE6WoGXu.r8gEOI9z7EinuJE4ZdJIUMi5qWQDIKqitQcd.sYe9jTi'),
(30, 'ian5@gmail.com', 'Ian', '$2y$10$9c2N8KcSS/Z2/78F9x2H5.tzOoYpFg1sC/xwLb5Xg/s1N.9WTbUz2'),
(33, 'abruzzeseian5@gmail.com', 'ABRZ', '$2y$10$oPia4nZE1DRkUNRmmgSLA.MfP0U8liHO85/u6nFgYE6qLnefaWpLi'),
(34, 'ian2@gmail.com', 'Ian', '$2y$10$QDU/XgT6cvUjWiz8sVqovOAW1UhsTwCp/lXfbcdqxeBPJ6UnfAPnm'),
(35, 'ian3@gmail.com', 'ian', '$2y$10$WEeJbO3wZCxJ27/Yr4Z5zuEGVR3kT5pdPh7M1yJxPa3hqvSNGTTwK'),
(36, 'ian8@gmail.com', '3321312', '$2y$10$bOZp5DixXHXq4E4S3x/Y1.HDEJutAXSwsUcw2DBvC6PH4L60EjEUy'),
(37, 'ian222@gmail.com', 'Abrz', '$2y$10$BIrDxPhz.CFKkVAt10JDhuTNiDHvfXaYU5KK4N4xWsnC88B6QmlG2'),
(38, 'ian23@gmail.com', 'Ian', '$2y$10$8uWyXyg17Y5G85cSrST9f.CV6izMpLRNbvoB7D14g6/zVYx1aCPvG');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `preciototal` int(11) NOT NULL,
  `fechaVenta` date NOT NULL DEFAULT current_timestamp(),
  `fechaEntrega` date DEFAULT NULL,
  `fechaEnvio` date DEFAULT NULL,
  `notificado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `IdCliente`, `preciototal`, `fechaVenta`, `fechaEntrega`, `fechaEnvio`, `notificado`) VALUES
(56, 37, 1700, '2024-05-15', '2024-05-15', '2024-05-15', 1),
(58, 37, 1500, '2024-05-15', '2024-05-24', '2024-05-21', 1),
(59, 37, 8500, '2024-05-25', '0000-00-00', '0000-00-00', 1),
(60, 38, 22000, '2024-05-29', '0000-00-00', '0000-00-00', 1),
(61, 38, 16000, '2024-05-29', '0000-00-00', '0000-00-00', 1),
(62, 37, 28000, '2024-06-23', '0000-00-00', '0000-00-00', 1),
(63, 37, 14000, '2024-06-26', '0000-00-00', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `categorías`
--
ALTER TABLE `categorías`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidoproveedor`
--
ALTER TABLE `pedidoproveedor`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorías`
--
ALTER TABLE `categorías`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pedidoproveedor`
--
ALTER TABLE `pedidoproveedor`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
