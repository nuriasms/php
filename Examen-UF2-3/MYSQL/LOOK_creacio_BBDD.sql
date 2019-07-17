-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2019 a las 01:18:26
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prova`
--
CREATE DATABASE IF NOT EXISTS `prova` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `prova`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticies`
--

CREATE TABLE `noticies` (
  `idnoticia` int(11) NOT NULL,
  `titular` varchar(200) COLLATE utf8_bin NOT NULL,
  `noticia` text COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `autor` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticies`
--

INSERT INTO `noticies` (`idnoticia`, `titular`, `noticia`, `data`, `foto`, `autor`) VALUES
(18, 'Este vestido de Zara se ha agotado en 24 horas', 'Hace poco más de 24 horas Zara lanzaba su nueva colección de la línea Trafaluc. Bajo el título \'París to Marrakesh\', todas nuestras miradas se situaron en esta imagen.', '2019-06-25', '../imgSQL/foto1.jpg', 'profe'),
(19, 'Rebajas de Zara: ', 'Los mejores trucos para comprar online y conseguir todas las prendas que quieres más baratas.\r\n\r\nEl mejor día para comprar, las prendas con más descuento y las claves para ser de ese tipo de personas que encuentran de rebajas lo que ficharon en temporada. Puede que creas que ya lo sabes todo, pero puede que estos con la ayuda de estos pequeños atajos que te damos, consigas comprar en las rebajas de Zara las prendas que quieres más baratas.', '2019-06-02', '../imgSQL/noticia1.jpeg', 'lola'),
(20, 'Por qué las infusiones frías te ayudan a deshincharte en verano', '¿Te hinchas con el calor? ¿Tus piernas no parecen tuyas en verano? ¿Por qué ocurre esto? La acción del calor en nuestro cuerpo produce una vasodilatación y un aumento de la permeabilidad capilar, con el consiguiente edema (acúmulo de líquidos) y dificultad del retorno venoso, nos explica Cristina Romagosa, asesora de salud y especialista en nutrición de mediQuo. En general, las partes más distales del corazón son las que se hinchan con más facilidad pues la sangre tiene un recorrido más largo hasta llegar de nuevo al corazón.', '2019-06-04', '../imgSQL/noticia2.jpg', 'nuria'),
(21, 'LOOK te propone el reto del verano: disfrutar del tiempo... pero de verdad', 'La vida es todo eso que ocurre mientras estás preocupada en otras cosas… Por eso, en LOOK hemos querido rendir homenaje al TIEMPO. Ayer, 12 de junio, organizamos un reto muy particular: dedicar unos segundos al día a vivir el momento. Hoy, queremos transformarlo en toda una filosofía de vida. ¿Te unes? ', '2019-06-17', '../imgSQL/noticia3.jpg', 'admin'),
(22, '11 libros con los que este verano será el mejor de tu vida', 'Con el verano a la vuelta de la esquina, quizás estés buscando recomendaciones de novelas para meter en tu maleta y disfrutar en tus próximas vacaciones. Estas 11 novedades literarias se convertirán en tus mejores aliadas en la tumbona.', '2019-02-13', '../imgSQL/noticia4.jpg', 'profe'),
(23, 'Una mujer sin límites, inspiradora y empoderada. ¿Te sientes identificada? Entonces, eres una SMARTgirl', 'Blanca Suárez, Sandra Barneda, Carolina Marín y Nathy Peluso son las nuevas SMARTgirl. ¿Quieres saber por qué las ha elegido Samsung? Atenta a los valores que representan: seguro que también forman parte de tu manera de ser', '2019-06-20', '../imgSQL/noticia5.jpg', 'lola'),
(24, 'Cómo hacer el peinado de novia de María Pombo que también vas a querer llevar si vas de invitada a una boda', 'La trenza de espiga en una coleta burbuja va a ser lo que más se pida en las peluquerías los próximos meses. La culpa la tiene María Pombo y el equipo de GHD. Pero tranquila, porque nos han dicho cómo lo hicieron.', '2019-01-15', '../imgSQL/noticia6.jpg', 'profe'),
(25, 'Éste es el láser de depilación indoloro con el que puedes tomar el sol en verano', 'Si este año no te ha dado tiempo a ponerte manos a la obra con el láser y crees que en verano ya no puedes hacértelo, te equivocas. Ahora hay uno que es indoloro y totalmente compatible para tomar el sol.', '2019-06-23', '../imgSQL/noticia7.jpg', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `token` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`nom`, `token`) VALUES
('nuria', 'i7OLQ91NA8F6SVSnFp4P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `naixement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correu` varchar(30) COLLATE utf8_bin NOT NULL,
  `contrasenya` varchar(80) COLLATE utf8_bin NOT NULL,
  `nivell` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`nom`, `naixement`, `correu`, `contrasenya`, `nivell`) VALUES
('admin', '1980-04-04 22:00:00', 'admin@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'admin'),
('lola', '2019-06-24 18:48:30', 'lola@gmail.com', 'bc643406af0573d3d56c5849070d57b5', 'basic'),
('nuria', '2019-06-24 19:02:42', 'nuria-sms@live.com', 'ec3c2d0673ed0dbfb409b0cc131a004e', 'basic'),
('profe', '1970-04-04 22:00:00', 'profe@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'basic');

CREATE TABLE IF NOT EXISTS `visitas` (   
  `idvisitas` int(7) NOT NULL auto_increment,   
  `enlace` varchar(300) NOT NULL,   
  `visitas` int(7) NOT NULL,   
  PRIMARY KEY (`idvisitas`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4;

--ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;




--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticies`
--
ALTER TABLE `noticies`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`nom`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticies`
--
ALTER TABLE `noticies`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
