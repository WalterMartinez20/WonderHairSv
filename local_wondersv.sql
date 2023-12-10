-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2023 a las 19:59:39
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
-- Base de datos: `local_wondersv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `salon_id` int(10) DEFAULT NULL,
  `servicio` varchar(150) DEFAULT NULL,
  `nombre` varchar(175) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `timestamp` text DEFAULT NULL,
  `estado` varchar(50) DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `salon_id`, `servicio`, `nombre`, `telefono`, `correo`, `fecha`, `hora`, `mensaje`, `timestamp`, `estado`) VALUES
(1, 32, 'Depilación', 'Juancarrlos', '7940-2010', 'juan123@gmail.com', '2023-10-20', '7:00 AM', 'naada', '2023', 'completo'),
(2, 32, 'Cuidado de uñas', 'Juancarrlos', '7940-2010', 'juan123@gmail.com', '2023-10-20', '8:00 AM', 'naada', '2023', 'cancelado'),
(3, 32, 'Cuidado de uñas', 'Fatima Hernandez', '7958-4356', 'Faty123@gmail.com', '2023-10-24', '11:15 AM', 'Estare puntual', '2023', 'completo'),
(4, 32, 'Depilación', 'Dina Esperanza', '7940-2010', 'dina123@gmail.com', '2023-10-25', '9:45 AM', 'Estare puntual', '2023', 'completo'),
(5, 34, 'Cuidado de cabello', 'Carlos Humberto Chavarría', '77552233', 'carlos@gmail.com', '2023-10-27', '7:00 AM', 'Listo', '2023', 'activo'),
(6, 34, 'Cuidado de piel', 'Juancarrlos', '7958-4356', 'juan123@gmail.com', '2023-10-26', '8:30 AM', 'Estare puntual', '2023', 'completo'),
(7, 32, 'Cuidado de uñas', 'Juancarrlos', '7940-2010', 'juan123@gmail.com', '2023-12-01', '7:00 AM', 'Estare puntual', '2023', 'activo'),
(8, 32, 'Depilación', 'Alejandro', '222-0000', 'ale@gmail.com', '2023-11-29', '7:15 AM', 'hola que tal ', '2023', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `proveedor` varchar(150) NOT NULL,
  `categoria1` varchar(150) NOT NULL,
  `categoria2` varchar(150) NOT NULL,
  `existencias` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` text NOT NULL,
  `ultima_busqueda` timestamp NULL DEFAULT NULL,
  `busquedas_totales` int(11) DEFAULT 0,
  `ultima_compra` timestamp NULL DEFAULT NULL,
  `compras_totales` int(11) DEFAULT 0,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `salon_id`, `nombre`, `descripcion`, `proveedor`, `categoria1`, `categoria2`, `existencias`, `precio`, `imagen`, `ultima_busqueda`, `busquedas_totales`, `ultima_compra`, `compras_totales`, `creacion`) VALUES
(82, 32, 'BES, SHAMPOO 12', 'Equilibre el cuero cabelludo y cree un cabello y cuero cabelludo de aspecto más saludable. La sal de zinc y el extracto de guaraná reducen la producción de sebo y ayudan al crecimiento saludable del cabello.', 'Proyou', 'Cabello', 'Shampoo', 10, 13.85, '650f76b83da22.png', '2023-09-26 09:06:52', 6, NULL, 0, '2023-09-23'),
(83, 32, 'KIT DE VIAJE MINI SECADORA Y MINI PLANCHA ALISADORA DE 3/4', 'KIT DE VIAJE CON MINI SECADORA Y MINI PLANCHA CON HERMOSO BOLSO PARA GUARDAR SUS HERRAMIENTAS', 'Babyliss', 'Herramientas', 'Planchas', 5, 75.5, '650f782feff4c.png', NULL, 0, NULL, 0, '2023-09-23'),
(84, 32, 'GELAZE GEL RICH   FAMOUS 0.33OZ', 'El Gel de Geláze lleva la base incorporada en la fórmula del color, con lo que en solo dos pasos tendremos una manicura perfecta, rápida y con la tranquilidad y confianza que ofrece una manicura en gel que dura semanas sin levantarse ni astillarse', 'Gelaze', 'Manos y pies', 'Esmalte Permanente', 5, 5.03, '650f78be4a3cf.png', '2023-09-26 09:06:40', 4, NULL, 0, '2023-09-23'),
(85, 33, 'KEYRA TINTE 8.43 RUBIO CLARO COBRIZO DORADO TUBO 100ML', 'Keyra Colors es una coloración permanente que combina principios activos basados en Keratina y componentes naturales. Cubre el 100% de canas y tiene en los superaclarantes un poder de aclaración de hasta 4 tonos. Gracias a la incorporación de la Keratina, obtenemos un resultado de color vibrante y duradero, respetando tanto la salud de la fibra capilar como la del cuero cabelludo. Además de proporcionar brillo, suavidad y acondicionamiento', 'Gena', 'Cabello', 'Tintes', 6, 5.03, '650f7a24605ec.png', '2023-09-26 09:06:47', 6, NULL, 0, '2023-09-23'),
(86, 33, 'BABYLISS HIP FLAT IRON VIOLETA 1\" 110V', 'Equilibre el cuero cabelludo y cree un cabello y cuero cabelludo de aspecto más saludable. La sal de zinc y el extracto de guaraná reducen la producción de sebo y ayudan al crecimiento saludable del cabello.', 'Bes', 'Cabello', 'Shampoo', 5, 22.78, '650f7acf04900.png', NULL, 0, NULL, 0, '2023-09-23'),
(88, 33, 'DEPILEX BANDAS TODO TIPO PIEL 12 UND', 'DEPILEX BANDAS TODO TIPO PIEL 12 UND', 'Depilex', 'Piel', 'Crema Depilatoria', 6, 7.2, '6512302a189b9.png', '2023-09-26 09:38:01', 4, NULL, 0, '2023-09-23'),
(89, 33, 'STICKERS DE AGUA PARA UÑAS', 'Pack de stickers de agua para decoración de uñas.', 'Bauty style', 'Accesorios', 'Decoración Para Uñas', 4, 0.76, '6512316137fd5.png', NULL, 0, NULL, 0, '2023-09-25'),
(90, 34, 'PALETTE, CC 5-57 AZUL 50ML', 'Da un toque especial a tu cabello con el tinte para cabello Palette, ya que con su fórmula Color Creme cubre perfectamente las canas y te brinda una alta intensidad de color, además contiene keratina y un sistema fortalecedor que hará que tu cabello se vea más saludable', 'Pallete', 'Cabello', 'Tintes', 5, 4, '6512330a306e3.png', NULL, 0, NULL, 0, '2023-09-24'),
(91, 34, 'PALETTE, CC 5-57 CHOCOLATE MACADAMIA 50ML', 'ARDELL DOM AQUA LASH >345', 'Ardell', 'Maquillaje', 'Pestañas', 5, 7.4, '651233c915bab.png', NULL, 0, NULL, 0, '2023-09-25'),
(92, 34, 'BOSLEY MOM DEFENSE COLOR ENEGIZER KIT', 'BOSLEY MOM DEFENSE COLOR ENEGIZER KIT', 'Bosley', 'Cabello', 'Kit', 5, 50, '6512359fcc5aa.png', '2023-09-26 10:09:51', 3, NULL, 0, '2023-09-25'),
(93, 34, 'RUSK, D/S COLOR GREEN 3.4 OZ', 'Aplicar directamente desde el tubo. No se necesita desarrollador. Libre de amoniaco. Libre de PPD. Creatividad pura. Arte puro. Posibilidades ilimitadas!', 'Rusk', 'Cabello', 'Tintes', 5, 14, '65123f01c0765.png', '2023-10-28 06:36:48', 9, NULL, 0, '2023-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `eslogan` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` text NOT NULL,
  `logos` longtext NOT NULL,
  `imagenes` longtext NOT NULL,
  `servicios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `email`, `password`, `nombre`, `eslogan`, `correo`, `descripcion`, `departamento`, `municipio`, `telefono`, `direccion`, `logos`, `imagenes`, `servicios`) VALUES
(32, 'Dragnel6@gmail.com', '$2y$10$r2ANKuViDZ4gVQP5ohT1vuM9bagclpXRAU.VhTAdJIoX.mZFQYBhe', 'Sandry Salón', 'Somos todo lo que buscas, uñas mas bonitas', 'Sandri123@gmail.com', 'Nuestro salon cuenta con diferentes áreas especializadas para cada uno de los servicios que brinda, desde una zona de manicura y pedicura hasta espacios de corte y color', '2', '11', '7657-2910', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7764.184962004858!2d-88.4428013151819!3d13.344523048024422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b39ecf8c8ea11%3A0x2dec15fdc70c92e8!2sSandry%20Sal%C3%B3n!5e0!3m2!1ses!2ssv!4v1686756244985!5m2!1ses!2ssv\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64ef58d96c6bf.png', '64ef58d96cbb8.png', 'Cuidado de uñas,Cuidado de piel,Depilación'),
(33, 'Rosy12@gmail.com', '$2y$10$gRhyoibY8XafAnDKX.p0Z..9jbM/2dtVUsYHbSSji4hQtMIZ3rv6C', 'Roxy Salon & Boutique', 'Somos todo lo que buscas, uñas mas bonitas', 'Salonroxy@gmail.com', 'Nuestro salon cuenta con diferentes áreas especializadas para cada uno de los servicios que brinda, desde una zona de manicura y pedicura hasta espacios de corte y color.', '12', '4', '7978-2910', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7764.184962004858!2d-88.4428013151819!3d13.344523048024422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b392a3466e253%3A0x686b0e685b71ba64!2sGianna%20Sal%C3%B3n!5e0!3m2!1ses!2ssv!4v1686756725910!5m2!1ses!2ssv\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64ef591a788bc.png', '64ef591a78aa2.png', 'Maquillaje,Maquillaje de pestañas,Barbería'),
(34, 'Salondina@gmail.com', '$2y$10$5qG.a0yeGiSEVkcBctI6b.PlxgS2e04ICUpddxOwC5xJJSz1I8.EG', 'Salon Dina', 'Somos todo lo que buscas, uñas mas bonitas', 'Salondina@gmail.com', 'Nuestro salon cuenta con diferentes áreas especializadas para cada uno de los servicios que brinda, desde una zona de manicura y pedicura hasta espacios de corte y color', '5', '16', '7957-2911', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7764.184962004858!2d-88.4428013151819!3d13.344523048024422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b39d28966ae2f%3A0x455adb5df5e84840!2sARE%20BELLEZA%20SUPPLY%20%26%20SALON!5e0!3m2!1ses!2ssv!4v1686756543045!5m2!1ses!2ssv\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64ef595cec221.png', '64ef595cec44c.png', 'Cuidado de cabello,Cuidado de piel,Maquillaje de pestañas,Corte de cabello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen_perfil` text DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `nombre`, `imagen_perfil`, `telefono`, `email`, `password`) VALUES
(1, 'Dragnel', '656fccd1739f5.png', '7957-2910', 'cj5895576@gmail.com', '$2y$10$sdISdB/bKepTDOcPP2GNxO.bKbK58FfGsHkxtmlDx7ZCflwljfWcy'),
(2, 'Juan Carlos', '656fcd9ac5539.png', '7978-2910', 'Juan2@gmail.com', '$2y$10$mna0OO6vsNy.iXWIG14cYOJgRS5JCt3eW.idnl37NKAJuC5ViqlKe'),
(3, 'Fatyma', '656fcf2c7aedc.png', '7968-2310', 'Faty12@gmail.com', '$2y$10$pA8atN9DaTUmr5W4/BoC..Ozedf4zxqCYMNjzCJwwwCQGJZxNqU7u'),
(4, 'Ezperanza', '656fcf70832a5.png', '7956-2910', 'esperanza@gmail.com', '$2y$10$8CK8MQOCPibmSWibgL1pZOkn64Qf9R16CCzJSwOtzaHoqnvH87GKi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salon_id` (`salon_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_salon_id_producto` (`salon_id`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`salon_id`) REFERENCES `salones` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_salon_id_producto` FOREIGN KEY (`salon_id`) REFERENCES `salones` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
