-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2019 a las 21:51:06
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
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `hora` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horau` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `diau` char(3) COLLATE utf8_bin DEFAULT NULL,
  `aniou` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `dia` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `ip`, `hora`, `fecha`, `horau`, `diau`, `aniou`, `dia`) VALUES
(1, '::1', '06:32:32', '2019-07-18', '06', '198', '2019', '4'),
(2, '::1', '07:30:08', '2019-07-18', '07', '198', '2019', '4'),
(3, '::1', '08:02:02', '2019-07-18', '08', '198', '2019', '4'),
(4, '::1', '10:17:11', '2019-07-18', '10', '198', '2019', '4'),
(5, '::1', '12:48:19', '2019-07-19', '12', '199', '2019', '5'),
(6, '::1', '15:40:19', '2019-07-19', '15', '199', '2019', '5'),
(7, '::1', '18:57:29', '2019-07-19', '18', '199', '2019', '5'),
(8, '::1', '18:05:07', '2019-07-19', '18', '199', '2019', '5'),
(9, '::1', '20:01:25', '2019-07-19', '20', '199', '2019', '5'),
(10, '::1', '21:59:26', '2019-07-19', '21', '199', '2019', '5'),
(11, '::1', '22:10:09', '2019-07-19', '22', '199', '2019', '5'),
(12, '::1', '9:35:24', '2019-07-20', '09', '200', '2019', '6'),
(13, '10:0:0:5', '10:21:52', '2019-01-07', '10', '7', '2019', '1'),
(14, '10:0:0:8', '15:01:33', '2019-01-22', '15', '22', '2019', '2'),
(15, '10:1:0:3', '07:09:23', '2019-02-14', '07', '45', '2019', '4'),
(16, '10:1:0:3', '09:26:20', '2019-02-26', '09', '57', '2019', '2'),
(17, '10:1:1:5', '01:40:19', '2019-03-06', '01', '65', '2019', '3'),
(18, '172:21:30:4', '09:00:19', '2019-04-23', '09', '113', '2019', '2'),
(19, '172:31:0:4', '12:50:19', '2019-04-23', '12', '113', '2019', '2'),
(20, '172:10:0:4', '16:50:19', '2019-04-24', '16', '113', '2019', '3'),
(21, '172:16:11:9', '16:10:02', '2019-05-05', '16', '125', '2019', '0'),
(22, '10:0:5:11', '10:02:02', '2019-06-01', '10', '152', '2019', '0'),
(23, '10:0:2:56', '11:28:59', '2019-06-18', '11', '169', '2019', '2'),
(24, '10:0:2:56', '10:12:59', '2019-06-19', '10', '170', '2019', '3'),
(25, '10:0:2:59', '13:12:09', '2019-06-19', '13', '170', '2019', '3'),
(26, '172:31:2:9', '15:12:09', '2019-06-24', '15', '175', '2019', '1'),
(27, '172:16:2:9', '16:19:05', '2019-06-24', '16', '175', '2019', '1'),
(28, '172:16:0:100', '18:11:05', '2019-06-30', '16', '181', '2019', '0'),
(29, '172:16:0:100', '19:11:05', '2019-06-30', '19', '181', '2019', '0'),
(30, '::1', '12:02:55', '2019-07-20', '12', '200', '2019', '6'),
(31, '::1', '13:12:51', '2019-07-20', '13', '200', '2019', '6'),
(32, '::1', '14:12:45', '2019-07-20', '14', '200', '2019', '6'),
(33, '::1', '16:35:12', '2019-07-20', '16', '200', '2019', '6'),
(34, '::1', '18:55:01', '2019-07-20', '18', '200', '2019', '6'),
(35, '::1', '23:13:48', '2019-07-20', '23', '200', '2019', '6'),
(36, '::1', '0:40:13', '2019-07-21', '00', '201', '2019', '0'),
(37, '::1', '10:54:50', '2019-07-21', '10', '201', '2019', '0'),
(38, '::1', '14:07:53', '2019-07-21', '14', '201', '2019', '0'),
(39, '::1', '20:16:38', '2019-07-21', '20', '201', '2019', '0'),
(40, '::1', '21:26:29', '2019-07-21', '21', '201', '2019', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(30) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 'imgSQL/galeria.jpg', '', ''),
(2, 'imgSQL/galeria1.jpg', 'Joyería', 'Simple belleza de Ángel'),
(3, 'imgSQL/galeria2.jpg', 'Roma', 'Exposición en el museo del teatro'),
(4, 'imgSQL/galeria3.jpg', 'Roma', 'Exposición en el museo del teatro'),
(5, 'imgSQL/galeria4.jpg', 'Joyería', 'Fría aguamarina rodeada de cálidos diamantes'),
(6, 'imgSQL/galeria5.jpg', 'Novias', 'Todos los vestidos tienen su novia'),
(7, 'imgSQL/galeria6.jpg', 'Novias', 'Dulces perlas del mar'),
(8, 'imgSQL/galeria7.jpg', 'Joyería', 'Brillo, brillo, brillo simple'),
(9, 'imgSQL/galeria8.jpg', 'Paris', 'Noches de largo'),
(10, 'imgSQL/galeria9.jpg', 'Novias', 'Exótico y simple'),
(11, 'imgSQL/galeria10.jpg', 'Novias', 'Fastuoso poder del oro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticies`
--

CREATE TABLE IF NOT EXISTS `noticies` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titular` varchar(200) COLLATE utf8_bin NOT NULL,
  `noticia` text COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `autor` varchar(30) COLLATE utf8_bin NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idnoticia`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticies`
--

INSERT INTO `noticies` (`idnoticia`, `titular`, `noticia`, `data`, `foto`, `autor`, `activo`) VALUES
(1, 'Este vestido de Zara se ha agotado en 24 horas', 'Hace poco más de 24 horas Zara lanzaba su nueva colección de la línea Trafaluc. Bajo el título \'París to Marrakesh\', todas nuestras miradas se situaron en esta imagen.', '2019-06-25', '../imgSQL/foto1.jpg', 'profe', 1),
(2, 'Rebajas de Zara: ', 'Los mejores trucos para comprar online y conseguir todas las prendas que quieres más baratas.\r\n\r\nEl mejor día para comprar, las prendas con más descuento y las claves para ser de ese tipo de personas que encuentran de rebajas lo que ficharon en temporada. Puede que creas que ya lo sabes todo, pero puede que estos con la ayuda de estos pequeños atajos que te damos, consigas comprar en las rebajas de Zara las prendas que quieres más baratas.', '2019-06-02', '../imgSQL/noticia1.jpeg', 'lola', 1),
(3, 'Por qué las infusiones frías te ayudan a deshincharte en verano', '¿Te hinchas con el calor? ¿Tus piernas no parecen tuyas en verano? ¿Por qué ocurre esto? La acción del calor en nuestro cuerpo produce una vasodilatación y un aumento de la permeabilidad capilar, con el consiguiente edema (acúmulo de líquidos) y dificultad del retorno venoso, nos explica Cristina Romagosa, asesora de salud y especialista en nutrición de mediQuo. En general, las partes más distales del corazón son las que se hinchan con más facilidad pues la sangre tiene un recorrido más largo hasta llegar de nuevo al corazón.', '2019-06-04', '../imgSQL/noticia2.jpg', 'nuria', 1),
(4, 'LOOK te propone el reto del verano: disfrutar del tiempo... pero de verdad', 'La vida es todo eso que ocurre mientras estás preocupada en otras cosas… Por eso, en LOOK hemos querido rendir homenaje al TIEMPO. Ayer, 12 de junio, organizamos un reto muy particular: dedicar unos segundos al día a vivir el momento. Hoy, queremos transformarlo en toda una filosofía de vida. ¿Te unes? ', '2019-06-17', '../imgSQL/noticia3.jpg', 'admin', 1),
(5, '11 libros con los que este verano será el mejor de tu vida', 'Con el verano a la vuelta de la esquina, quizás estés buscando recomendaciones de novelas para meter en tu maleta y disfrutar en tus próximas vacaciones. Estas 11 novedades literarias se convertirán en tus mejores aliadas en la tumbona.', '2019-02-13', '../imgSQL/noticia4.jpg', 'profe', 1),
(6, 'Una mujer sin límites, inspiradora y empoderada. ¿Te sientes identificada? Entonces, eres una SMARTgirl', 'Blanca Suárez, Sandra Barneda, Carolina Marín y Nathy Peluso son las nuevas SMARTgirl. ¿Quieres saber por qué las ha elegido Samsung? Atenta a los valores que representan: seguro que también forman parte de tu manera de ser', '2019-06-20', '../imgSQL/noticia5.jpg', 'lola', 1),
(7, 'Cómo hacer el peinado de novia de María Pombo que también vas a querer llevar si vas de invitada a una boda', 'La trenza de espiga en una coleta burbuja va a ser lo que más se pida en las peluquerías los próximos meses. La culpa la tiene María Pombo y el equipo de GHD. Pero tranquila, porque nos han dicho cómo lo hicieron.', '2019-01-15', '../imgSQL/noticia6.jpg', 'profe', 1),
(8, 'Éste es el láser de depilación indoloro con el que puedes tomar el sol en verano', 'Si este año no te ha dado tiempo a ponerte manos a la obra con el láser y crees que en verano ya no puedes hacértelo, te equivocas. Ahora hay uno que es indoloro y totalmente compatible para tomar el sol.', '2019-06-23', '../imgSQL/noticia7.jpg', 'admin', 1),
(9, 'Cómo empezar a practicar yoga desde cero y enamorarte de él', '&quot;La clave para empezar de cero en yoga y enamorarte de él es hacerlo con mucha paciencia, sin expectativas. Lo bueno de empezar algo desde cero es que todas las expectativas se superan&quot;. Sin embargo, no siempre es fácil. Sé sincera: ¿cuántas veces te ha apetecido probar algo nuevo, que te saque de tu zona de confort, y al final no te has atrevido?', '2019-07-20', '../imgSQL/noticia9.jpg', 'admin', 1),
(10, 'Pólvora, el restaurante que conquista por su cocina fusión y la nueva tarta de queso de moda en Madrid', 'La llegada del restaurante Pólvora al barrio de Salamanca, concretamente a la calle de Juan Bravo, hace unos meses fue una auténtica explosión. Su apuesta por la cocina fusión que te transporta a Cuba, Argentina y México en platos que parten de la tradición española, a lo que se suma un local verdaderamente espectacular han convertido a este local en uno de los grandes éxitos gastro del año. Por eso cuando vayas, si es que nos haces caso y lo visitas, comprobarás que suele estar de lo más concurrido.', '2019-07-04', '../imgSQL/noticia10.jpg', 'nuria', 1),
(20, '9 destinos para viajar a la Luna sin salir de nuestro planeta', 'Hace exactamente 50 años, el hombre dio ese pequeño gran paso para la humanidad: la nave \'Apolo XI\' llegó el 20 de julio de 1969 a la Luna y, un día después, Neil Armstrong fue la primera persona que caminó sobre la superficie lunar, en uno de los grandes hitos de la historia espacial mundial.\r\n\r\nQueremos invitarte a descubrir 9 destinos que son auténticos paisajes lunares, para que viajes a nuestro satélite sin moverte de la Tierra.', '2019-07-18', '../imgSQL/noticia11.jpeg', 'mireia', 1),
(21, 'Destino: Valle de la luna (Desierto de Atacama, Chile)', 'La región más seca del planeta merece como nadie un sitio en el universo. El Valle de la Luna, en el desierto de Atacama de Chile, es uno de los reflejos más fieles de la superficie lunar en la Tierra: tiene tanto tierras altas como planicies llenas de rocas, agujeros y explanadas rocosas. Grandes expediciones se realizan cada año en este desierto y muchos turistas llegan para excursiones en las que se puede apreciar una puesta de sol impresionante, que sólo puede ofrecer este extremo meridional del mundo. El desierto de Atacama, de 1.000 km2 de superficie, es además uno de los mejores lugares para ver estrellas.', '2019-07-18', '../imgSQL/noticia12.jpg', 'mireia', 1),
(22, 'Destino: Salar de Uyuni (Bolivia)', 'La luna está llena de misterios, pero sin duda lo que más despierta curiosidad es el tema de los mares lunares. El Salar de Uyuni, en el sur de Bolivia, es actualmente el salar más grande del mundo y se puede decir que es la mejor versión terrenal del Mar de la Tranquilidad, donde el 20 de julio de 1969 descendió el Apolo 11. Es una estampa de la luna con colores de la tierra. Además, en esta zona boliviana se pueden encontrar lagunas y aguas termales para unos días de total desconexión. En épocas de lluvia se puede disfrutar del llamado “efecto espejo” para unas fotografías de lujo. Se extiende 12.000 km2 sin apenas obstáculos a la vista. En la estación seca (de mayo a agosto), la sal tiene un aspecto costroso; en la húmeda (diciembre a abril), la superficie tiene una fina capa húmeda que emula a un espejo.', '2019-07-18', '../imgSQL/noticia13.jpg', 'mireia', 1),
(23, 'Destino: Wadi Rum (Jordania)', 'Wadi Rum en Jordania ha sustituido a Marte en más de una película taquillera. También fue muy conocido por ser el lugar de filmación del planeta ficticio Jedha en las películas de la Guerra de las Galaxias. También atrae a turistas de aventura, deseosos de hacer senderismo, escalar sus montañas de arenisca, montar camellos o caballos árabes, o acampar bajo sus vastos cielos llenos de estrellas. Fue el desierto que atravesó Lawrence de Arabia entre 1916 y 1918 y sobre el que escribió su libro \'Los siete pilares de la sabiduría\', en el que recogía la belleza de los acantilados de arenisca y de las dunas de impresionantes colores.', '2019-07-18', '../imgSQL/noticia14.jpg', 'mireia', 1),
(24, 'Destino: Capadocia (Turquía)', 'Las tierras altas de la luna se pueden ver perfectamente representadas en Capadocia, en la histórica de Anatolia Central de Turquía. Le dicen las “chimeneas de hadas” y su suave roca es el resultado de siglos de erupciones volcánicas megalíticas, viento y lluvia. Hay quienes la recorren en globo para poder apreciar la inmensidad de este Patrimonio de la Humanidad. Otros recorren andando, al estilo Buzz Aldrin, la zona del valle de Göreme. Pero ¡cuidado! Saltar no es muy recomendable en esta zona. Un viaje a la Capadocia no tiene que obviar los frescos bizantinos de las iglesias excavadas en la piedra y las laberínticas ciudades subterráneas.', '2019-07-18', '../imgSQL/noticia15.jpg', 'mireia', 1),
(25, 'Destino: Fuerteventura', 'Cuando llegues a esta isla canaria, te sorprenderá y te quitará el aliento. Es completamente agreste, de clima pegajoso, con el impresionante viento que la bautizó. Pero la isla, todavía no reventada por el turismo, es de una belleza impresionante. Las montañas y volcanes de Fuerteventura ofrecen la posibilidad de un recorrido fascinante. Ese contraste de zonas creadas por lava, montañas y planicies secas o de tierra blanca es una alegoría a ese juego de zonas altas y claras (terrae) y bajas oscuras (maria) que hay en la luna. En las Peñitas, arco de Las Peñitas y en la Cumbre del Tindaya, son dos lugares donde vivir la aventura interplanetaria.', '2019-07-18', '../imgSQL/noticia16.jpg', 'mireia', 1),
(26, 'Destino: Azores (Portugal)', 'Las Azores ofrece un paisaje paradisíaco de lo que podría ser en nuestro imaginario uno de los enormes agujeros lunares que se han descubierto hasta el momento. Todo esto es a la actividad de sus más de 1.500 volcanes que, durante años, tuvieron una intensa actividad dando lugar a una montaña rusa natural de elevaciones que se enredan entre mares y planicies; una experiencia similar a la que vivió la luna, según dicen los científicos. Allí, en el archipiélago portugués, las vacaciones, son de otro mundo. Los cráteres son uno de los más bellos paisajes del archipiélago; el de la imagen, totalmente lunar, pertenece a la isla de São Miguel.', '2019-07-18', '../imgSQL/noticia17.jpg', 'mireia', 1),
(27, 'Destino: Desierto de Black Rock (Nevada, Estados Unidos)', 'Cuando se trata de lugares que se parecen a la Luna, es difícil imaginar algo que pueda estar más cerca que las playas y los lechos de lava del desierto de Black Rock en Nevada. Esta remota región es mejor conocida por el evento anual de la comunidad Burning Man, que se centra tanto en la autoexpresión artística como en la quema de una gran efigie de madera. En otras épocas del año, las aparentemente interminables extensiones vacías del desierto se prestan para eventos de carreras de velocidad en tierra. Antaño, los emigrantes y buscadores de oro utilizaron Black Rock como un camino más benigno entre California y Oregón por su fuente termal y sus praderas con algo de hierbas.', '2019-07-18', '../imgSQL/noticia18.jpg', 'mireia', 1),
(28, 'Destino: Desierto blanco (Egipto)', 'Si hay algo que es imposible no disfrutar es el color de la luna. Poemas y canciones se han inspirado en esa tonalidad. Por eso es inevitable comparar el Desierto Blanco de Egipto con el natural satélite de la tierra. Su aspecto rocoso blanquecino da un aspecto de paisaje extraterrestre que sorprende a más de uno. Lo más excitante, y lo que pone el punto terrenal, es la fauna tan pintoresca que se puede ver en una excursión: desde zorros hasta diversos tipos de gacelas. Una aventura que, los más enigmáticos, seguramente querrán disfrutar de noche.', '2019-07-18', '../imgSQL/noticia19.jpg', 'mireia', 1),
(29, 'Destino: Mauna Kea (Hawái)', 'La montaña más alta del mundo no está en el Himalaya, sino en Hawai. La mayor parte del volcán Mauna Kea se encuentra bajo el Pacífico, pero casi 14 000 pies (4200 m) de esta formación se elevan por sobre el nivel del mar. El volcán inactivo ofrece excelentes y agotadoras caminatas. Pasará por un lago alpino y muchos conos de ceniza roja antes de llegar finalmente a la zona nevada de la cima, para contemplar las nubes muy por debajo.', '2019-07-18', '../imgSQL/noticia20.jpg', 'mireia', 1),
(30, '¿Por qué Dios creó a la mujer bella y tonta?', 'Bellas para que los hombres puedan amarlas y tontas para que ellas puedan amar a los hombres', '2019-07-21', '../imgSQL/noticia21.jpg', 'gilito', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `idnoticia` int(11) NOT NULL,
  PRIMARY KEY (`idnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `token` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`token`)
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

CREATE TABLE IF NOT EXISTS `usuari` (
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `naixement` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correu` varchar(30) COLLATE utf8_bin NOT NULL,
  `contrasenya` varchar(80) COLLATE utf8_bin NOT NULL,
  `nivell` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`nom`, `naixement`, `correu`, `contrasenya`, `nivell`) VALUES
('admin', '1980-04-05 00:00:00', 'admin@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'admin'),
('lola', '2019-06-24 20:48:30', 'lola@gmail.com', 'bc643406af0573d3d56c5849070d57b5', 'basic'),
('nuria', '2019-07-20 13:18:09', 'nuria-sms@live.com', '700c8b805a3e2a265b01c77614cd8b21', 'basic'),
('profe', '1970-04-05 00:00:00', 'profe@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'basic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `idvisitas` int(7) NOT NULL AUTO_INCREMENT,
  `enlace` varchar(300) COLLATE utf8_bin NOT NULL,
  `visitas` int(7) NOT NULL,
  PRIMARY KEY (`idvisitas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`idvisitas`, `enlace`, `visitas`) VALUES
(4, 'http://localhost/php/Examen-UF2-3/', 1),
(5, 'http://localhost/php/Examen-UF2-3/php/look-informe.php', 1),
(6, 'http://localhost/php/Examen-UF2-3/php/look.php', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
