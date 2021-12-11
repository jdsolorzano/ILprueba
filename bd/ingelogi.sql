-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2021 a las 05:53:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingelogi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productType` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `timeRegistration` timestamp NOT NULL DEFAULT current_timestamp(),
  `deliveryTime` date NOT NULL DEFAULT current_timestamp(),
  `storage` varchar(100) NOT NULL,
  `shippingPrice` float NOT NULL,
  `priceDiscount` float NOT NULL,
  `carRegistration` varchar(100) NOT NULL,
  `numberGuide` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `productType`, `amount`, `timeRegistration`, `deliveryTime`, `storage`, `shippingPrice`, `priceDiscount`, `carRegistration`, `numberGuide`, `client`) VALUES
(1, 'Orgánico', '11', '2021-12-11 04:20:18', '2021-12-11', 'Medellín', 10000, 500, 'HUD587', 'XEJFMVSDKQ', 'José Solórzano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productm`
--

CREATE TABLE `productm` (
  `idM` int(11) NOT NULL,
  `productTypeM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `amountM` int(11) NOT NULL,
  `timeRegistrationM` timestamp NOT NULL DEFAULT current_timestamp(),
  `deliveryTimeM` date NOT NULL,
  `storageM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `shippingPriceM` float NOT NULL,
  `priceDiscountM` float NOT NULL,
  `carRegistrationM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numberGuideM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `clientM` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productm`
--

INSERT INTO `productm` (`idM`, `productTypeM`, `amountM`, `timeRegistrationM`, `deliveryTimeM`, `storageM`, `shippingPriceM`, `priceDiscountM`, `carRegistrationM`, `numberGuideM`, `clientM`) VALUES
(1, 'Contenedor', 11, '2021-12-11 04:25:19', '2021-12-11', 'Santa Marta', 8000000, 240000, 'AEW4587', 'EIJDCKDF40', 'José Solórzano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(24, 'admin', '202cb962ac59075b964b07152d234b70', 'Jose Solórzano');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productm`
--
ALTER TABLE `productm`
  ADD PRIMARY KEY (`idM`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productm`
--
ALTER TABLE `productm`
  MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
