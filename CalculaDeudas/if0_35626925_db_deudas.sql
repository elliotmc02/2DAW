-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.infinityfree.com
-- Generation Time: Dec 17, 2023 at 11:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35626925_db_deudas`
--

-- --------------------------------------------------------

--
-- Table structure for table `deudas`
--

CREATE TABLE `deudas` (
  `idDeuda` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `receptor` varchar(20) NOT NULL,
  `creador` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `pagado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deudas`
--

INSERT INTO `deudas` (`idDeuda`, `usuario`, `cantidad`, `descripcion`, `receptor`, `creador`, `fecha`, `pagado`) VALUES
(9, 'Norberto', '3000.00', 'Todo', 'Elliot', 'Elliot', '2023-12-17 03:34:30', 0),
(10, 'Elliot', '100.00', 'Todo', 'Norberto', 'Elliot', '2023-12-17 03:35:51', 0),
(11, 'Norberto', '23.00', 'Montes', 'Elliot', 'Elliot', '2023-12-17 12:54:32', 0),
(12, 'Norberto', '25.00', 'Bolas', 'Elliot', 'Norberto', '2023-12-17 12:55:31', 0),
(13, 'Juanma', '500.00', 'Cena', 'Norberto', 'Norberto', '2023-12-17 12:55:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(10) NOT NULL DEFAULT 'basico'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`, `rol`) VALUES
('Diego', '$2y$10$RNdREZgExrQWox1WC/xIuejVG7bPi02HnVDpE3ki1o.JtRo4ut01m', 'basico'),
('Elliot', '$2y$10$WPzX49y4dqlA0ywmYpcZSuXP6iVA3Lg6o0GEdQBWi8aOAPRpW8U8e', 'admin'),
('Juanma', '$2y$10$w8qxMIEhSElB4oMIFREBQ.sYP0iCm1a7JmSgOsBgt//MFVwBOSn8K', 'basico'),
('Norberto', '$2y$10$z8s/nAmlUho0JAGIAALGv.s8OiIXCl10cQQ6QOawAdTonFxiPufKS', 'basico'),
('Prueba', '$2y$10$QR6EqtNigaPty/hutmVCnu87seWHbttViJ/0Fp2RPlsW3GQfDqax6', 'basico'),
('Test', '$2y$10$4jiq/N9lRO6K6EdwYSBvguPJwlSzBJJd9kwDqN89dlqLLEpFy6KkG', 'basico');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`idDeuda`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deudas`
--
ALTER TABLE `deudas`
  MODIFY `idDeuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
