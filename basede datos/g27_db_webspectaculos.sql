-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 16:33:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g27_db_webspectaculos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `nombre`, `descripcion`, `fecha`, `tipo`) VALUES
(1, 'Rápidos y furiosos', 'Cada noche, Los Ángeles es testigo de alguna carrera de coches. Últimamente ha aparecido un nuevo corredor, todos saben que es duro y que es rápido, pero lo que no saben es que es un detective con la determinación de salir victorioso.\r\n', '2024-09-15', 4),
(2, 'Cirque du Soleil', 'PopArt Music informó hoy que el Cirque du Soleil confirmó que la fecha de estreno definitiva de su espectáculo Messi10, en Buenos Aires - Argentina, será el 5 de octubre de 2023.\r\n', '2024-09-16', 6),
(3, 'Soda Stereo - Me verás volver', 'Esa noche, la anchísima avenida 9 de Julio se llenó de gente y no había triunfado ningún seleccionado de fútbol en un Mundial. En total había más de 300 mil personas que acudieron para ver un recital gratuito de Soda Stereo.\r\n', '2024-09-17', 2),
(4, 'Genesis - Live in Rome 2007', '\"Genesis: In Concert\" (en castellano \"Genesis: En Concierto\") es un vídeo en vivo del grupo inglés de rock progresivo Genesis. La grabación del vídeo se llevó a cabo durante diferentes conciertos en Glasgow, Escocia y en Staffordshire, Inglaterra en el año 1976, y fue publicado en 1977.\r\n', '2024-09-18', 2),
(7, 'La Vigornia - Gira el yunke rebelde', 'Descripción del concierto\r\nDescripción del concierto\r\nDescripción del concierto\r\n', '2024-09-19', 1),
(8, 'fUZZ - Gira & Gira temporada 2024', 'Descripción del concierto\r\nDescripción del concierto\r\nDescripción del concierto\r\n', '2024-09-21', 1),
(9, 'Hasta el último hombre', 'Descripción de la película\r\nDescripción de la película\r\nDescripción de la película\r\n', '2024-09-23', 4),
(11, 'Mamma mía!', 'Descripción del musical\r\nDescripción del musical\r\nDescripción del musical\r\n', '2024-09-24', 5),
(12, 'Moulin Rouge2', 'Descripción del musicalDescripción del musicalDescripción del musicalDescripción del musical', '2024-09-19', 5),
(32, 'Volatil', 'Concierto de Rock en Arteparte', '2024-10-31', 3),
(49, 'Dire Straits', 'Ultima presentacion en enero 2025 en el monumental', '2025-01-15', 2),
(51, 'Las Pelotas', 'LAS PELOTAS se presenta en La Trastienda el Domingo 27 de Octubre 20:00hs\r\nNUEVA FUNCION: Martes 29 de Octubre 21:00 hs\r\n2 horas antes de cada show se habilitará la boletería con el fin de vender tickets de forma presencial.\r\nIMPORTANTE\r\n• Una vez comenzado el espectáculo, la sala se reserva el derecho a las ubicaciones.\r\n• No se puede ingresar a la sala con cámaras fotográficas o filmadoras.\r\n• Está prohibido fumar en cualquier sector de la sala - LEY 1799\r\n• Menores de 18 años: Prohibido el ingreso a las funciones que comienzan a partir de las 23:00 hs.', '2024-11-28', 1),
(53, 'El Resplandor 2', 'La película relata la historia de Jack Torrance, un exprofesor que acepta un puesto como vigilante de invierno en un solitario hotel de alta montaña para ocuparse del mantenimiento. Al poco tiempo de haberse instalado allí junto con su esposa y su hijo, empieza a sufrir inquietantes trastornos de personalidad. Paulatinamente, debido a la incomunicación, al insomnio, a sus propios fantasmas interiores y, tal vez, a la influencia maléfica del lugar, se verá inmerso en una espiral de violencia contra ellos, que a su vez parecen víctimas de espantosos fenómenos sobrenaturales.', '2024-11-27', 4),
(54, 'Pobres criatura', 'Pobres criaturas\', la reinvención en clave de comedia negra de la historia de Frankenstein del director griego Yorgos Lanthimos, cuenta la historia de Bella Baxter (Emma Stone) y el científico que experimenta con ella: el Dr. Godwin Baxter, interpretado por nada más y nada menos que Willem Dafoe. ', '2024-11-28', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`id`, `nombre`) VALUES
(4, 'Cine'),
(6, 'Circo'),
(1, 'Concierto'),
(5, 'Musical'),
(3, 'Obra de teatro'),
(2, 'Recital'),
(7, 'Títeres y marionetas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(7, 'admin@gmail.com', '$2y$10$5RWXMZJB3n6/.vqIizCMpuEHikh/HLb.kDlyPwW.bWS6NwK8u6mxG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pornombre` (`nombre`),
  ADD KEY `porfecha` (`fecha`),
  ADD KEY `portipo` (`tipo`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pornombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipoevento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
