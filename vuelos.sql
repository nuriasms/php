-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 09:14 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuelos`
--
CREATE DATABASE vuelos;
use vuelos;
-- --------------------------------------------------------

--
-- Table structure for table `avion`
--

CREATE TABLE `avion` (
  `IdAvion` int(11) NOT NULL,
  `Matricula` varchar(50) NOT NULL,
  `Fabricante` varchar(150) DEFAULT NULL,
  `Modelo` varchar(150) DEFAULT NULL,
  `Capacidad` int(11) DEFAULT NULL,
  `AutonomiaVuelo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`IdAvion`, `Matricula`, `Fabricante`, `Modelo`, `Capacidad`, `AutonomiaVuelo`) VALUES
(1, '75170', 'Airbus', '411', 96, 8),
(2, '17893', 'EADS', '237', 18, 6),
(3, '02850', 'Airbus', '331', 149, 1),
(4, '98413', 'EADS', '951', 68, 4),
(5, '07708', 'EADS', '581', 11, 3),
(6, '74187', 'EADS', '734', 5, 5),
(7, '66413', 'EADS', '233', 8, 7),
(8, '63892', 'Airbus', '889', 177, 4),
(9, '72420', 'Boeing', '843', 22, 6),
(10, '05126', 'EADS', '174', 178, 8),
(11, '85625', 'Boeing', '076', 184, 3),
(12, '64918', 'Boeing', '729', 146, 5),
(13, '10842', 'EADS', '964', 59, 6),
(14, '57204', 'Airbus', '234', 117, 3),
(15, '67102', 'Boeing', '318', 30, 9),
(16, '73730', 'EADS', '531', 17, 5),
(17, '28307', 'Boeing', '002', 60, 9),
(18, '91967', 'Airbus', '616', 89, 1),
(19, '45926', 'Airbus', '524', 5, 5),
(20, '88002', 'Boeing', '000', 110, 7),
(21, '32743', 'Airbus', '517', 156, 7),
(22, '80129', 'EADS', '314', 176, 6),
(23, '21421', 'Airbus', '645', 85, 1),
(24, '41824', 'Boeing', '314', 93, 9),
(25, '38066', 'EADS', '457', 89, 2),
(26, '89273', 'EADS', '126', 119, 5),
(27, '67138', 'EADS', '465', 92, 4),
(28, '74680', 'Boeing', '338', 85, 5),
(29, '53070', 'EADS', '034', 148, 3),
(30, '76146', 'Boeing', '602', 35, 6),
(31, '93566', 'EADS', '270', 182, 5),
(32, '58642', 'EADS', '607', 106, 4),
(33, '77597', 'Airbus', '591', 191, 1),
(34, '85674', 'Boeing', '485', 43, 6),
(35, '45346', 'EADS', '082', 126, 2),
(36, '09557', 'EADS', '043', 136, 10),
(37, '23932', 'Boeing', '951', 171, 4),
(38, '63891', 'Boeing', '627', 119, 10),
(39, '86795', 'EADS', '679', 163, 2),
(40, '74481', 'Boeing', '965', 14, 3),
(41, '79324', 'Airbus', '713', 83, 8),
(42, '14045', 'Airbus', '559', 139, 10),
(43, '95572', 'Boeing', '775', 67, 6),
(44, '84505', 'Boeing', '132', 40, 1),
(45, '97959', 'EADS', '580', 112, 3),
(46, '17989', 'Airbus', '822', 43, 9),
(47, '99443', 'Airbus', '602', 160, 2),
(48, '46936', 'Airbus', '994', 111, 3),
(49, '54909', 'Airbus', '037', 92, 6),
(50, '69527', 'Boeing', '557', 90, 10),
(51, '72779', 'EADS', '000', 156, 5),
(52, '70187', 'Boeing', '983', 123, 5),
(53, '60440', 'Airbus', '297', 189, 2),
(54, '49279', 'Boeing', '529', 112, 1),
(55, '13329', 'EADS', '638', 56, 2),
(56, '37684', 'EADS', '211', 29, 5),
(57, '69602', 'EADS', '706', 55, 1),
(58, '20099', 'Boeing', '855', 196, 6),
(59, '67684', 'EADS', '558', 41, 5),
(60, '75346', 'EADS', '316', 130, 2),
(61, '00852', 'EADS', '353', 36, 6),
(62, '38747', 'Airbus', '065', 196, 3),
(63, '00492', 'Airbus', '755', 91, 5),
(64, '72217', 'EADS', '117', 111, 5),
(65, '91304', 'Airbus', '429', 104, 6),
(66, '76619', 'EADS', '041', 158, 4),
(67, '44112', 'EADS', '699', 20, 8),
(68, '31091', 'Airbus', '587', 173, 3),
(69, '11954', 'EADS', '609', 119, 9),
(70, '48721', 'Boeing', '323', 196, 6),
(71, '99650', 'Boeing', '074', 109, 10),
(72, '72408', 'EADS', '039', 61, 8),
(73, '34917', 'Boeing', '034', 178, 8),
(74, '85688', 'EADS', '374', 106, 6),
(75, '45664', 'EADS', '968', 78, 7),
(76, '03020', 'Boeing', '432', 8, 9),
(77, '28292', 'EADS', '096', 163, 4),
(78, '15888', 'Boeing', '604', 106, 1),
(79, '91281', 'EADS', '053', 156, 7),
(80, '92953', 'Airbus', '589', 13, 5),
(81, '80907', 'EADS', '381', 119, 7),
(82, '16893', 'Boeing', '368', 68, 8),
(83, '54815', 'Airbus', '982', 86, 2),
(84, '60304', 'Airbus', '502', 110, 10),
(85, '96105', 'EADS', '158', 185, 9),
(86, '80017', 'Boeing', '018', 81, 6),
(87, '52473', 'Airbus', '892', 83, 5),
(88, '02366', 'Airbus', '277', 149, 10),
(89, '58739', 'Airbus', '145', 149, 5),
(90, '68405', 'Boeing', '246', 92, 3),
(91, '73084', 'Airbus', '184', 179, 1),
(92, '61879', 'Airbus', '298', 27, 8),
(93, '94221', 'EADS', '234', 158, 5),
(94, '56571', 'Boeing', '660', 36, 4),
(95, '90712', 'Boeing', '669', 37, 7),
(96, '82556', 'Airbus', '881', 191, 6),
(97, '26137', 'Airbus', '816', 150, 2),
(98, '64184', 'Airbus', '374', 103, 8),
(99, '12948', 'EADS', '921', 110, 10),
(100, '35267', 'EADS', '141', 72, 3);

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Apellidos` varchar(150) DEFAULT NULL,
  `CategoriaProfesional` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`IdEmpleado`, `DNI`, `Nombre`, `Apellidos`, `CategoriaProfesional`) VALUES
(1, '1664051047', 'Simon', 'Mejia', 'Responsable Vendas'),
(2, '1628011227', 'Roary', 'Acosta', 'Director General'),
(3, '1647041592', 'Kennedy', 'Dunlap', 'Director General'),
(4, '1644071442', 'Eaton', 'Conner', 'Director General'),
(5, '1679121583', 'Hop', 'Farmer', 'Director General'),
(6, '1623040452', 'Finn', 'Flynn', 'Responsable Vendas'),
(7, '1632090552', 'Amal', 'Ayers', 'Director General'),
(8, '1629072975', 'Bree', 'Battle', 'Director General'),
(9, '1607082574', 'Brenna', 'Mcbride', 'Responsable Vendas'),
(10, '1696100404', 'Kylie', 'Davidson', 'Director General'),
(11, '1637042116', 'Jordan', 'Cantrell', 'Director General'),
(12, '1688090841', 'Odette', 'Tillman', 'Responsable Vendas'),
(13, '1651111270', 'Reuben', 'Ratliff', 'Responsable Vendas'),
(14, '1660032623', 'Sheila', 'Maddox', 'Director General'),
(15, '1645012177', 'Ivan', 'Bush', 'Responsable Vendas'),
(16, '1659062505', 'Destiny', 'Potter', 'Director General'),
(17, '1622040639', 'Dominic', 'Fisher', 'Responsable Vendas'),
(18, '1640021431', 'Brenna', 'Burgess', 'Secretaria'),
(19, '1669072697', 'Barry', 'Ramirez', 'Secretaria'),
(20, '1662080291', 'Herrod', 'Nixon', 'Responsable Vendas'),
(21, '1675100120', 'Abel', 'Contreras', 'Responsable Vendas'),
(22, '1662060188', 'Bruno', 'Snow', 'Director General'),
(23, '1619011154', 'Brandon', 'Holman', 'Director General'),
(24, '1698020445', 'Avram', 'Rios', 'Responsable Vendas'),
(25, '1668072925', 'Salvador', 'Meyers', 'Responsable Vendas'),
(26, '1661041795', 'Austin', 'Bass', 'Director General'),
(27, '1633051177', 'Melvin', 'Witt', 'Responsable Vendas'),
(28, '1603112794', 'Vanna', 'Suarez', 'Secretaria'),
(29, '1643092530', 'Emmanuel', 'Fuller', 'Secretaria'),
(30, '1676040767', 'Kerry', 'Acosta', 'Responsable Vendas'),
(31, '1627101240', 'Devin', 'Edwards', 'Secretaria'),
(32, '1672111545', 'Beatrice', 'Cash', 'Secretaria'),
(33, '1627020526', 'Ivy', 'Cooke', 'Secretaria'),
(34, '1673082919', 'Malik', 'Clarke', 'Director General'),
(35, '1649122192', 'Ulric', 'Collins', 'Director General'),
(36, '1603071445', 'Tanisha', 'Rowe', 'Responsable Vendas'),
(37, '1666022389', 'William', 'Preston', 'Director General'),
(38, '1665052981', 'Allen', 'Terry', 'Secretaria'),
(39, '1624110324', 'Galvin', 'Lambert', 'Director General'),
(40, '1637032794', 'Haviva', 'Wilkins', 'Secretaria'),
(41, '1681122626', 'Ruth', 'Lang', 'Secretaria'),
(42, '1656070921', 'Jason', 'Armstrong', 'Director General'),
(43, '1664041418', 'Oren', 'Stone', 'Responsable Vendas'),
(44, '1694082401', 'Miriam', 'Best', 'Responsable Vendas'),
(45, '1623050819', 'Ignatius', 'Moreno', 'Secretaria'),
(46, '1638061966', 'Cynthia', 'Hughes', 'Director General'),
(47, '1629011332', 'Sasha', 'Prince', 'Secretaria'),
(48, '1672020138', 'Ora', 'Jacobson', 'Director General'),
(49, '1639120457', 'Reece', 'Tanner', 'Responsable Vendas'),
(50, '1694052950', 'Lucian', 'Franco', 'Responsable Vendas'),
(51, '1634040141', 'Meredith', 'Sharp', 'Director General'),
(52, '1688021926', 'Logan', 'Cole', 'Responsable Vendas'),
(53, '1633100658', 'Griffin', 'Whitaker', 'Responsable Vendas'),
(54, '1663080798', 'Beau', 'Key', 'Responsable Vendas'),
(55, '1686111571', 'Keaton', 'Pacheco', 'Director General'),
(56, '1687012722', 'Iris', 'Hooper', 'Secretaria'),
(57, '1681080674', 'Noble', 'Ortiz', 'Director General'),
(58, '1657102178', 'Jesse', 'Le', 'Responsable Vendas'),
(59, '1661060571', 'Jolene', 'Payne', 'Secretaria'),
(60, '1676073026', 'Benjamin', 'Reese', 'Director General'),
(61, '1680031738', 'Yasir', 'Rivas', 'Secretaria'),
(62, '1687032096', 'Harper', 'Jimenez', 'Secretaria'),
(63, '1620112473', 'Brett', 'Mayer', 'Director General'),
(64, '1633083006', 'Nolan', 'Rios', 'Director General'),
(65, '1655091166', 'Justina', 'Barker', 'Secretaria'),
(66, '1694111956', 'Lilah', 'Bridges', 'Responsable Vendas'),
(67, '1620042739', 'Elaine', 'Ruiz', 'Responsable Vendas'),
(68, '1600070672', 'Addison', 'Hansen', 'Secretaria'),
(69, '1621070538', 'Shellie', 'Wynn', 'Director General'),
(70, '1692011284', 'Amber', 'Meyers', 'Secretaria'),
(71, '1642092675', 'Fitzgerald', 'Wyatt', 'Responsable Vendas'),
(72, '1692042299', 'Stephanie', 'Spencer', 'Secretaria'),
(73, '1607062552', 'Jescie', 'Talley', 'Director General'),
(74, '1674101639', 'Hayden', 'Shannon', 'Secretaria'),
(75, '1672111239', 'Dale', 'Gillespie', 'Secretaria'),
(76, '1617021762', 'Hayden', 'Sellers', 'Secretaria'),
(77, '1616021889', 'Andrew', 'Rush', 'Director General'),
(78, '1631100553', 'Brenda', 'Downs', 'Responsable Vendas'),
(79, '1608081259', 'Derek', 'Alston', 'Secretaria'),
(80, '1679102355', 'Stephen', 'Foley', 'Responsable Vendas'),
(81, '1618070571', 'Henry', 'Sargent', 'Responsable Vendas'),
(82, '1652020918', 'Ria', 'Murray', 'Director General'),
(83, '1641030454', 'Beau', 'Blake', 'Director General'),
(84, '1697080407', 'Nyssa', 'Carroll', 'Director General'),
(85, '1609042493', 'Octavius', 'Townsend', 'Director General'),
(86, '1643052908', 'Mari', 'Glass', 'Director General'),
(87, '1685081469', 'Mia', 'Dalton', 'Director General'),
(88, '1609091137', 'Ryder', 'Conner', 'Director General'),
(89, '1692100417', 'Ignatius', 'Jensen', 'Responsable Vendas'),
(90, '1688023000', 'Madeline', 'Russo', 'Responsable Vendas'),
(91, '1683062692', 'Wade', 'Douglas', 'Secretaria'),
(92, '1606030228', 'Libby', 'Lynch', 'Director General'),
(93, '1672091900', 'Cecilia', 'Kane', 'Secretaria'),
(94, '1661122839', 'Ralph', 'Sears', 'Director General'),
(95, '1698022115', 'Eve', 'Bennett', 'Responsable Vendas'),
(96, '1617102942', 'Piper', 'Thornton', 'Director General'),
(97, '1648101562', 'Camille', 'Morse', 'Secretaria'),
(98, '1617080467', 'Uriel', 'Clayton', 'Responsable Vendas'),
(99, '1617090274', 'Aurora', 'Calderon', 'Responsable Vendas'),
(100, '1678012839', 'Remedios', 'Stewart', 'Responsable Vendas');

-- --------------------------------------------------------

--
-- Table structure for table `pasaje`
--

CREATE TABLE `pasaje` (
  `IdPasaje` int(11) NOT NULL,
  `IdVuelo` int(11) DEFAULT NULL,
  `IdPasajero` int(11) DEFAULT NULL,
  `Asiento` varchar(5) DEFAULT NULL,
  `Clase` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasaje`
--

INSERT INTO `pasaje` (`IdPasaje`, `IdVuelo`, `IdPasajero`, `Asiento`, `Clase`) VALUES
(1, 52, 6, '22B', 'Turist'),
(2, 45, 34, '14K', 'Turist'),
(3, 22, 4, '96J', 'Turist'),
(4, 87, 98, '80C', 'Turist'),
(5, 92, 58, '56S', 'Turist'),
(6, 44, 34, '96X', 'Business'),
(7, 14, 85, '25V', 'Turist'),
(8, 24, 24, '01P', 'Turist'),
(9, 14, 76, '32R', 'Turist'),
(10, 39, 75, '55F', 'Turist'),
(11, 13, 54, '91K', 'Business'),
(12, 43, 61, '45W', 'Business'),
(13, 3, 39, '19R', 'Turist'),
(14, 100, 94, '23V', 'Business'),
(15, 21, 83, '16G', 'Business'),
(16, 6, 81, '61I', 'Business'),
(17, 43, 40, '98I', 'Turist'),
(18, 44, 22, '88B', 'Turist'),
(19, 65, 55, '18L', 'Turist'),
(20, 75, 8, '61X', 'Turist'),
(21, 16, 59, '68R', 'Business'),
(22, 97, 34, '11Q', 'Turist'),
(23, 42, 16, '42Y', 'Business'),
(24, 37, 21, '92C', 'Turist'),
(25, 82, 66, '12R', 'Business'),
(26, 15, 67, '26W', 'Turist'),
(27, 17, 67, '24M', 'Turist'),
(28, 72, 47, '98L', 'Business'),
(29, 13, 33, '78D', 'Business'),
(30, 34, 91, '75J', 'Business'),
(31, 62, 96, '83E', 'Business'),
(32, 77, 99, '69R', 'Business'),
(33, 19, 5, '79I', 'Business'),
(34, 21, 46, '44D', 'Business'),
(35, 44, 85, '33U', 'Turist'),
(36, 58, 19, '22T', 'Turist'),
(37, 62, 80, '67K', 'Turist'),
(38, 38, 81, '84N', 'Business'),
(39, 6, 78, '36D', 'Business'),
(40, 55, 79, '37C', 'Business'),
(41, 27, 67, '16O', 'Business'),
(42, 1, 76, '70E', 'Business'),
(43, 51, 30, '99B', 'Business'),
(44, 18, 63, '84T', 'Turist'),
(45, 66, 64, '44U', 'Turist'),
(46, 31, 53, '50L', 'Turist'),
(47, 94, 18, '04R', 'Business'),
(48, 37, 51, '00Y', 'Turist'),
(49, 21, 13, '07B', 'Business'),
(50, 10, 93, '37D', 'Turist'),
(51, 13, 3, '13H', 'Business'),
(52, 63, 79, '18V', 'Turist'),
(53, 13, 12, '66K', 'Business'),
(54, 62, 16, '06X', 'Turist'),
(55, 36, 51, '51Q', 'Turist'),
(56, 7, 100, '59Q', 'Business'),
(57, 80, 41, '33E', 'Turist'),
(58, 77, 71, '84V', 'Business'),
(59, 100, 76, '33H', 'Turist'),
(60, 7, 50, '74Z', 'Turist'),
(61, 60, 13, '39G', 'Business'),
(62, 74, 87, '81G', 'Turist'),
(63, 34, 58, '46S', 'Turist'),
(64, 21, 31, '73F', 'Turist'),
(65, 55, 45, '48Z', 'Business'),
(66, 55, 44, '01B', 'Business'),
(67, 71, 4, '54P', 'Business'),
(68, 72, 34, '17V', 'Turist'),
(69, 5, 49, '61H', 'Business'),
(70, 12, 5, '53D', 'Turist'),
(71, 87, 2, '50Z', 'Turist'),
(72, 45, 83, '97M', 'Business'),
(73, 82, 85, '90I', 'Business'),
(74, 34, 62, '31O', 'Business'),
(75, 25, 42, '28Q', 'Turist'),
(76, 94, 28, '07T', 'Turist'),
(77, 66, 60, '90R', 'Business'),
(78, 59, 69, '07M', 'Business'),
(79, 65, 10, '18I', 'Business'),
(80, 16, 81, '07D', 'Turist'),
(81, 56, 60, '61H', 'Turist'),
(82, 74, 94, '25Z', 'Turist'),
(83, 9, 80, '27Q', 'Business'),
(84, 11, 10, '96V', 'Business'),
(85, 91, 79, '16K', 'Turist'),
(86, 28, 41, '79X', 'Business'),
(87, 52, 98, '42D', 'Turist'),
(88, 79, 69, '56O', 'Business'),
(89, 33, 14, '66E', 'Business'),
(90, 81, 10, '29L', 'Business'),
(91, 1, 17, '65L', 'Turist'),
(92, 7, 84, '17P', 'Turist'),
(93, 90, 74, '75G', 'Business'),
(94, 64, 97, '17I', 'Turist'),
(95, 1, 15, '81T', 'Business'),
(96, 35, 3, '49K', 'Business'),
(97, 62, 74, '91X', 'Turist'),
(98, 40, 60, '13X', 'Turist'),
(99, 69, 63, '83N', 'Turist'),
(100, 41, 18, '35K', 'Turist');

-- --------------------------------------------------------

--
-- Table structure for table `pasajeros`
--

CREATE TABLE `pasajeros` (
  `IdPasajero` int(11) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Apellidos` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasajeros`
--

INSERT INTO `pasajeros` (`IdPasajero`, `DNI`, `Nombre`, `Apellidos`) VALUES
(1, '1664120304', 'Xandra', 'Nguyen'),
(2, '1621112860', 'Berk', 'Barry'),
(3, '1647102243', 'Emery', 'Banks'),
(4, '1685090396', 'Jermaine', 'English'),
(5, '1685040534', 'Malachi', 'Chen'),
(6, '1644052037', 'Hall', 'Wilcox'),
(7, '1603082062', 'Kathleen', 'Berry'),
(8, '1654071427', 'Ashton', 'Robbins'),
(9, '1698030903', 'Patrick', 'Reeves'),
(10, '1654020114', 'Jorden', 'Shelton'),
(11, '1620060482', 'Chancellor', 'Ortiz'),
(12, '1631012034', 'Aileen', 'Cleveland'),
(13, '1671010769', 'Vernon', 'Russell'),
(14, '1656060471', 'Emerson', 'Snow'),
(15, '1607021404', 'Tarik', 'Santos'),
(16, '1650060751', 'Salvador', 'Moreno'),
(17, '1606122724', 'Quynn', 'Talley'),
(18, '1692121570', 'Chantale', 'Orr'),
(19, '1621051991', 'Yasir', 'Golden'),
(20, '1678042669', 'Prescott', 'Patel'),
(21, '1653092129', 'Deirdre', 'Foster'),
(22, '1615070762', 'Nomlanga', 'Mckee'),
(23, '1631110153', 'Nita', 'Grant'),
(24, '1633100627', 'Mohammad', 'Curtis'),
(25, '1618120627', 'Clarke', 'Alston'),
(26, '1697080700', 'Paul', 'Woodward'),
(27, '1632042771', 'Keegan', 'Tyson'),
(28, '1687031505', 'Eleanor', 'Mcdowell'),
(29, '1608072366', 'Gisela', 'Carney'),
(30, '1641120109', 'Elton', 'Mendoza'),
(31, '1637011810', 'Roanna', 'Roy'),
(32, '1633102938', 'Bradley', 'Ware'),
(33, '1672060430', 'Stewart', 'Barnes'),
(34, '1631042488', 'Amal', 'Donovan'),
(35, '1619071435', 'Tashya', 'Palmer'),
(36, '1658043012', 'Buckminster', 'Ward'),
(37, '1659090397', 'Naomi', 'Stout'),
(38, '1614081773', 'Kaye', 'Villarreal'),
(39, '1624011207', 'Marah', 'Mccarty'),
(40, '1642020922', 'Reese', 'Bray'),
(41, '1629071525', 'Tamara', 'Collins'),
(42, '1603121351', 'September', 'Johns'),
(43, '1607040598', 'Eve', 'Massey'),
(44, '1667112464', 'Acton', 'Cameron'),
(45, '1644122452', 'Mark', 'House'),
(46, '1690042428', 'Serina', 'Levine'),
(47, '1638052645', 'Thomas', 'Mcleod'),
(48, '1689082067', 'Dexter', 'Munoz'),
(49, '1692050632', 'Jasmine', 'Palmer'),
(50, '1627111476', 'Germaine', 'Campbell'),
(51, '1675093003', 'Raymond', 'Charles'),
(52, '1628102641', 'Kitra', 'Day'),
(53, '1699030582', 'Drew', 'Aguirre'),
(54, '1610040234', 'Dalton', 'Daniel'),
(55, '1660052053', 'Geoffrey', 'Rice'),
(56, '1699062695', 'Gemma', 'Vasquez'),
(57, '1672091147', 'Justine', 'Hutchinson'),
(58, '1625031266', 'Jillian', 'Lawson'),
(59, '1645082902', 'Zelenia', 'Frost'),
(60, '1655101904', 'Mohammad', 'Yates'),
(61, '1645071875', 'Rosalyn', 'Grimes'),
(62, '1611051551', 'Craig', 'Houston'),
(63, '1621072711', 'Walker', 'Morrison'),
(64, '1672121364', 'Louis', 'Hayes'),
(65, '1656092871', 'Carla', 'Graves'),
(66, '1675101875', 'Zena', 'Dickson'),
(67, '1663051335', 'Dexter', 'Barton'),
(68, '1683100545', 'Mohammad', 'Kerr'),
(69, '1645081142', 'Ria', 'Cherry'),
(70, '1698121339', 'Robert', 'Sampson'),
(71, '1631120850', 'Hedda', 'Grimes'),
(72, '1644090991', 'Dante', 'Patel'),
(73, '1615073079', 'Janna', 'Petty'),
(74, '1631092754', 'Shad', 'Barnett'),
(75, '1638022785', 'Branden', 'Mcfadden'),
(76, '1641053064', 'Diana', 'Olsen'),
(77, '1696112170', 'Libby', 'Fields'),
(78, '1637052297', 'Martena', 'Norris'),
(79, '1605021655', 'Lillith', 'Harrison'),
(80, '1652110459', 'Rafael', 'Myers'),
(81, '1659091042', 'Axel', 'Buchanan'),
(82, '1624120577', 'Tanner', 'Duran'),
(83, '1663091554', 'Maggie', 'Reilly'),
(84, '1680010884', 'Timon', 'Cotton'),
(85, '1664042855', 'Christopher', 'Cox'),
(86, '1609102541', 'Mallory', 'Albert'),
(87, '1678110613', 'Alexandra', 'Calderon'),
(88, '1696012999', 'Colton', 'Frost'),
(89, '1631022865', 'Griffith', 'Trevino'),
(90, '1623110253', 'Cathleen', 'Chandler'),
(91, '1621083099', 'Price', 'Finch'),
(92, '1678102320', 'Murphy', 'Giles'),
(93, '1656051896', 'Rhona', 'Alvarado'),
(94, '1601032818', 'Sylvia', 'Robinson'),
(95, '1683090366', 'Nelle', 'Dunlap'),
(96, '1681082998', 'Azalia', 'Holland'),
(97, '1604021302', 'Noble', 'Little'),
(98, '1623051204', 'Lionel', 'Hayes'),
(99, '1623062124', 'Hedy', 'Mcclain'),
(100, '1657010262', 'Benjamin', 'Maldonado');

-- --------------------------------------------------------

--
-- Table structure for table `tripulacion`
--

CREATE TABLE `tripulacion` (
  `IdTripulacion` int(11) NOT NULL,
  `IdVuelo` int(11) DEFAULT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `PuestoOcupado` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tripulacion`
--

INSERT INTO `tripulacion` (`IdTripulacion`, `IdVuelo`, `IdEmpleado`, `PuestoOcupado`) VALUES
(1, 87, 57, 'Piloto'),
(2, 87, 75, 'Piloto'),
(3, 92, 38, 'Auxiliar de vuelo'),
(4, 63, 32, 'Jefe de cabina'),
(5, 51, 92, 'Auxiliar de vuelo'),
(6, 62, 32, 'Co-Piloto'),
(7, 1, 70, 'Jefe de cabina'),
(8, 99, 69, 'Co-Piloto'),
(9, 95, 75, 'Jefe de cabina'),
(10, 23, 25, 'Auxiliar de vuelo'),
(11, 79, 38, 'Co-Piloto'),
(12, 37, 23, 'Piloto'),
(13, 88, 13, 'Auxiliar de vuelo'),
(14, 30, 79, 'Piloto'),
(15, 9, 69, 'Auxiliar de vuelo'),
(16, 25, 58, 'Co-Piloto'),
(17, 8, 45, 'Piloto'),
(18, 73, 38, 'Jefe de cabina'),
(19, 45, 25, 'Co-Piloto'),
(20, 37, 74, 'Piloto'),
(21, 73, 69, 'Auxiliar de vuelo'),
(22, 90, 36, 'Piloto'),
(23, 41, 5, 'Jefe de cabina'),
(24, 77, 59, 'Co-Piloto'),
(25, 12, 65, 'Jefe de cabina'),
(26, 37, 28, 'Piloto'),
(27, 77, 62, 'Piloto'),
(28, 98, 15, 'Auxiliar de vuelo'),
(29, 54, 6, 'Jefe de cabina'),
(30, 77, 7, 'Jefe de cabina'),
(31, 19, 34, 'Co-Piloto'),
(32, 12, 15, 'Auxiliar de vuelo'),
(33, 54, 56, 'Auxiliar de vuelo'),
(34, 71, 67, 'Jefe de cabina'),
(35, 29, 33, 'Jefe de cabina'),
(36, 81, 87, 'Auxiliar de vuelo'),
(37, 7, 25, 'Auxiliar de vuelo'),
(38, 48, 35, 'Piloto'),
(39, 68, 54, 'Co-Piloto'),
(40, 14, 9, 'Jefe de cabina'),
(41, 68, 3, 'Co-Piloto'),
(42, 65, 73, 'Co-Piloto'),
(43, 48, 72, 'Jefe de cabina'),
(44, 65, 44, 'Auxiliar de vuelo'),
(45, 69, 72, 'Piloto'),
(46, 99, 64, 'Co-Piloto'),
(47, 81, 55, 'Jefe de cabina'),
(48, 61, 66, 'Jefe de cabina'),
(49, 35, 55, 'Co-Piloto'),
(50, 19, 48, 'Co-Piloto'),
(51, 94, 28, 'Piloto'),
(52, 97, 59, 'Co-Piloto'),
(53, 16, 98, 'Co-Piloto'),
(54, 15, 66, 'Piloto'),
(55, 8, 6, 'Auxiliar de vuelo'),
(56, 6, 18, 'Auxiliar de vuelo'),
(57, 99, 90, 'Auxiliar de vuelo'),
(58, 48, 91, 'Jefe de cabina'),
(59, 92, 50, 'Auxiliar de vuelo'),
(60, 53, 71, 'Co-Piloto'),
(61, 78, 37, 'Auxiliar de vuelo'),
(62, 33, 33, 'Piloto'),
(63, 19, 11, 'Co-Piloto'),
(64, 55, 49, 'Piloto'),
(65, 61, 16, 'Co-Piloto'),
(66, 45, 94, 'Jefe de cabina'),
(67, 43, 34, 'Auxiliar de vuelo'),
(68, 85, 40, 'Piloto'),
(69, 70, 21, 'Co-Piloto'),
(70, 58, 14, 'Piloto'),
(71, 38, 75, 'Co-Piloto'),
(72, 57, 1, 'Jefe de cabina'),
(73, 43, 42, 'Jefe de cabina'),
(74, 36, 70, 'Co-Piloto'),
(75, 71, 22, 'Co-Piloto'),
(76, 97, 58, 'Auxiliar de vuelo'),
(77, 100, 6, 'Co-Piloto'),
(78, 3, 55, 'Piloto'),
(79, 67, 96, 'Piloto'),
(80, 67, 85, 'Co-Piloto'),
(81, 77, 82, 'Jefe de cabina'),
(82, 95, 68, 'Piloto'),
(83, 78, 59, 'Auxiliar de vuelo'),
(84, 41, 79, 'Piloto'),
(85, 46, 99, 'Auxiliar de vuelo'),
(86, 92, 95, 'Jefe de cabina'),
(87, 100, 88, 'Piloto'),
(88, 66, 63, 'Co-Piloto'),
(89, 47, 11, 'Piloto'),
(90, 61, 55, 'Auxiliar de vuelo'),
(91, 5, 24, 'Auxiliar de vuelo'),
(92, 68, 53, 'Auxiliar de vuelo'),
(93, 88, 16, 'Auxiliar de vuelo'),
(94, 8, 19, 'Jefe de cabina'),
(95, 5, 75, 'Jefe de cabina'),
(96, 71, 74, 'Auxiliar de vuelo'),
(97, 4, 4, 'Co-Piloto'),
(98, 100, 74, 'Jefe de cabina'),
(99, 66, 12, 'Piloto'),
(100, 74, 16, 'Auxiliar de vuelo');

-- --------------------------------------------------------

--
-- Table structure for table `vuelo`
--

CREATE TABLE `vuelo` (
  `IdVuelo` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Origen` varchar(150) DEFAULT NULL,
  `Destino` varchar(150) DEFAULT NULL,
  `IdAvion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vuelo`
--

INSERT INTO `vuelo` (`IdVuelo`, `Fecha`, `Origen`, `Destino`, `IdAvion`) VALUES
(1, '2018-11-06 05:06:02', 'Onoz', 'Vagli Sotto', 69),
(2, '2018-12-07 11:34:39', 'Esen', 'Nobressart', 83),
(3, '2017-09-30 10:35:57', 'Villafranca d\'Asti', 'Soverzene', 73),
(4, '2019-04-05 18:27:05', 'Santa Vittoria in Matenano', 'Itegem', 84),
(5, '2017-12-27 10:05:32', 'Ehein', 'Moorsele', 21),
(6, '2018-01-13 04:44:39', 'Putre', 'Greater Hobart', 33),
(7, '2019-02-04 06:45:34', 'San José', 'Cisnes', 44),
(8, '2018-09-08 09:02:34', 'Kamoke', 'Albi', 52),
(9, '2018-02-25 23:37:38', 'San Nicolás', 'Glendale', 18),
(10, '2018-05-04 22:34:42', 'Fallais', 'Rajapalaiyam', 42),
(11, '2017-07-23 21:48:30', 'Leke', 'Innsbruck', 53),
(12, '2018-07-05 02:15:36', 'Naperville', 'Kaneohe', 43),
(13, '2017-08-09 10:01:11', 'Ch‰telineau', 'Chishtian Mandi', 86),
(14, '2017-05-30 13:28:21', 'San Pedro', 'Pepingen', 17),
(15, '2019-03-03 16:31:38', 'Ambattur', 'Leugnies', 41),
(16, '2018-04-26 09:36:33', 'Cañete', 'Soverzene', 80),
(17, '2017-12-30 17:40:26', 'Cassano Spinola', 'Andenne', 5),
(18, '2017-08-29 23:03:45', 'Aschaffenburg', 'Las Palmas', 22),
(19, '2017-12-07 22:29:46', 'Nedlands', 'Viernheim', 80),
(20, '2018-11-11 02:25:04', 'Cappelle sul Tavo', 'Broken Hill', 1),
(21, '2017-11-27 10:06:37', 'Bellevue', 'Montebello sul Sangro', 52),
(22, '2017-11-24 16:58:39', 'San Juan de la Costa', 'Sint-Stevens-Woluwe', 85),
(23, '2017-08-31 22:56:16', 'Koningshooikt', 'South Bend', 14),
(24, '2019-01-16 02:59:52', 'Loreto', 'Santomenna', 13),
(25, '2017-09-30 23:18:12', 'Hanret', 'Senneville', 67),
(26, '2019-03-14 02:53:15', 'Thames', 'Guelph', 9),
(27, '2017-08-15 00:13:16', 'Merchtem', 'Fort Smith', 30),
(28, '2018-01-21 01:35:18', 'Orléans', 'San Marcello', 58),
(29, '2018-11-28 06:21:54', 'Glovertown', 'Retford', 91),
(30, '2019-04-19 03:01:29', 'Opgrimbie', 'Bottidda', 15),
(31, '2018-09-18 13:04:02', 'Coleville Lake', 'Portland', 60),
(32, '2019-04-29 01:43:33', 'Isla de Maipo', 'Barrie', 3),
(33, '2018-09-10 22:30:51', 'Afşin', 'Llanquihue', 59),
(34, '2017-12-05 22:07:35', 'San Pedro', 'Dillingen', 71),
(35, '2019-05-05 02:28:58', 'Anglet', 'Treglio', 70),
(36, '2019-05-13 09:51:10', 'Denver', 'Llanelli', 7),
(37, '2018-04-27 14:05:10', 'Püttlingen', 'Frankenthal', 59),
(38, '2017-12-17 07:52:02', 'Bionaz', 'Makurdi', 28),
(39, '2019-03-07 10:42:13', 'Pessac', 'Malahide', 45),
(40, '2017-07-21 15:49:23', 'Genval', 'Boechout', 87),
(41, '2018-07-30 12:50:19', 'Landelies', 'BiercŽe', 1),
(42, '2018-10-31 19:36:34', 'Conca Casale', 'Wolfville', 86),
(43, '2018-10-21 07:33:25', 'Lienz', 'Fréjus', 3),
(44, '2018-11-16 18:12:50', 'Isola di Capo Rizzuto', 'Incourt', 62),
(45, '2018-12-06 01:41:16', 'Vancouver', 'Crowsnest Pass', 96),
(46, '2017-08-26 23:36:39', 'Boninne', 'North Battleford', 57),
(47, '2019-04-15 14:11:35', 'Monteroni d\'Arbia', 'Pemberton', 29),
(48, '2018-07-25 08:35:04', 'Blois', 'Villers-Perwin', 37),
(49, '2018-04-18 16:30:08', 'Lacombe County', 'Schwedt', 40),
(50, '2017-11-13 14:20:57', 'Gols', 'Witney', 52),
(51, '2018-05-22 14:52:31', 'Guarapuava', 'Davenport', 73),
(52, '2017-11-17 00:03:46', 'Couture-Saint-Germain', 'Grantham', 55),
(53, '2018-12-14 23:48:08', 'Marbaix', 'McCallum', 77),
(54, '2017-07-02 23:15:17', 'Huizingen', 'Capestrano', 98),
(55, '2018-07-04 15:22:42', 'Neunkirchen', 'Gols', 63),
(56, '2017-09-04 03:12:34', 'Fallo', 'Macclesfield', 64),
(57, '2018-08-04 13:36:33', 'Lakeland County', 'Hines Creek', 46),
(58, '2017-07-13 22:14:22', 'Wimbledon', 'Arviat', 81),
(59, '2017-09-08 20:38:12', 'Pemuco', 'St. John\'s', 73),
(60, '2019-02-28 23:32:39', 'Quimper', 'Reading', 54),
(61, '2018-03-07 05:40:25', 'Richmond', 'Kieldrecht', 82),
(62, '2018-07-09 06:22:20', 'Coevorden', 'Gallicchio', 44),
(63, '2018-10-20 07:37:53', 'Dallas', 'Açailândia', 97),
(64, '2018-03-01 16:25:01', 'Bally', 'Vancouver', 99),
(65, '2018-11-13 15:05:07', 'Villers-Perwin', 'Borgomaro', 100),
(66, '2017-08-14 14:50:44', 'La Spezia', 'Fraser-Fort George', 37),
(67, '2017-10-26 15:45:15', 'Ballarat', 'Kulti-Barakar', 82),
(68, '2018-09-11 11:43:49', 'Chañaral', 'Rudiano', 15),
(69, '2018-12-07 00:40:10', 'Polatlı', 'Saarbrücken', 33),
(70, '2018-01-11 11:37:23', 'Chaudfontaine', 'Cupar', 81),
(71, '2019-05-16 20:04:36', 'Pemuco', 'Rouyn-Noranda', 75),
(72, '2017-07-23 09:57:25', 'Sankt Johann im Pongau', 'Sangerhausen', 64),
(73, '2017-08-21 23:58:27', 'Bath', 'Iowa City', 40),
(74, '2017-06-13 16:29:46', 'Oss', 'Roxburgh', 59),
(75, '2018-05-24 09:44:28', 'Montague', 'Tramonti di Sopra', 80),
(76, '2018-08-19 14:42:00', 'Baricella', 'Khanewal', 89),
(77, '2017-10-15 09:38:32', 'Sint-Stevens-Woluwe', 'Chelsea', 47),
(78, '2018-08-06 14:54:27', 'Baltasound', 'Papudo', 57),
(79, '2018-07-11 02:44:35', 'Futrono', 'Dalkeith', 18),
(80, '2018-10-29 20:57:10', 'Annapolis', 'Coltauco', 32),
(81, '2017-09-08 19:44:12', 'Kota', 'Sachs Harbour', 43),
(82, '2017-10-22 13:55:29', 'Chonchi', 'São Luís', 100),
(83, '2017-10-20 00:18:20', 'Corroy-le-Grand', 'Tampa', 48),
(84, '2018-03-05 01:20:51', 'Hamilton', 'Brest', 25),
(85, '2018-12-05 19:04:32', 'Sobral', 'San Maurizio Canavese', 40),
(86, '2018-04-01 19:37:29', 'Petacciato', 'Wayaux', 64),
(87, '2018-08-21 07:48:51', 'Saint Paul', 'Feilding', 88),
(88, '2019-02-23 20:50:12', 'Lesve', 'San Cesario di Lecce', 44),
(89, '2017-11-01 01:41:30', 'Shrewsbury', 'Kanpur Cantonment', 53),
(90, '2017-12-26 18:46:00', 'Agra', 'Solapur', 5),
(91, '2017-08-22 09:10:42', 'Dubuisson', 'Racine', 70),
(92, '2018-06-09 16:17:00', 'Oelegem', 'Ogbomosho', 15),
(93, '2018-05-14 05:44:18', 'Huechuraba', 'Arrone', 43),
(94, '2017-11-09 08:52:35', 'Capena', 'Lahore', 11),
(95, '2017-07-29 09:13:06', 'Nampa', 'Squillace', 79),
(96, '2018-05-15 18:04:08', 'Peterhead', 'Hulste', 93),
(97, '2017-07-13 04:38:45', 'Adana', 'Malahide', 4),
(98, '2018-04-06 15:50:47', 'Gosnells', 'Zuienkerke', 50),
(99, '2019-03-19 08:22:15', 'Surrey', 'Évreux', 19),
(100, '2018-12-07 03:12:54', 'Saskatoon', 'Warrington', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`IdAvion`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IdEmpleado`);

--
-- Indexes for table `pasaje`
--
ALTER TABLE `pasaje`
  ADD PRIMARY KEY (`IdPasaje`),
  ADD KEY `pasaje` (`IdPasajero`) USING BTREE,
  ADD KEY `vuelo` (`IdVuelo`);

--
-- Indexes for table `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`IdPasajero`);

--
-- Indexes for table `tripulacion`
--
ALTER TABLE `tripulacion`
  ADD PRIMARY KEY (`IdTripulacion`),
  ADD KEY `vuelo2` (`IdVuelo`),
  ADD KEY `empleado` (`IdEmpleado`);

--
-- Indexes for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`IdVuelo`),
  ADD KEY `avion` (`IdAvion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avion`
--
ALTER TABLE `avion`
  MODIFY `IdAvion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pasaje`
--
ALTER TABLE `pasaje`
  MODIFY `IdPasaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pasajeros`
--
ALTER TABLE `pasajeros`
  MODIFY `IdPasajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tripulacion`
--
ALTER TABLE `tripulacion`
  MODIFY `IdTripulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `IdVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasaje`
--
ALTER TABLE `pasaje`
  ADD CONSTRAINT `pasaje_ibfk_1` FOREIGN KEY (`IdVuelo`) REFERENCES `vuelo` (`IdVuelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasaje_ibfk_2` FOREIGN KEY (`IdPasajero`) REFERENCES `pasajeros` (`IdPasajero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tripulacion`
--
ALTER TABLE `tripulacion`
  ADD CONSTRAINT `tripulacion_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleados` (`IdEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tripulacion_ibfk_2` FOREIGN KEY (`IdVuelo`) REFERENCES `vuelo` (`IdVuelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`IdAvion`) REFERENCES `avion` (`IdAvion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
