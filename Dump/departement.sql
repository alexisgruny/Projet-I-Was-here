-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2013 at 06:10 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `villes_fr`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `departementCode` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departementName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`departement_id`),
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`idDepartement`, `departementCode`, `departementName`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`, `idRegion`) VALUES
(1, '01', 'Ain', 'AIN', 'ain', 'A500', 16),
(2, '02', 'Aisne', 'AISNE', 'aisne', 'A250', 10),
(3, '03', 'Allier', 'ALLIER', 'allier', 'A460', 16),
(4, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152', 17),
(5, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412', 17),
(6, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352', 17),
(7, '07', 'Ardèche', 'ARDÈCHE', 'ardeche', 'A632', 16),
(8, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352', 11),
(9, '09', 'Ariège', 'ARIÈGE', 'ariege', 'A620', 15),
(10, '10', 'Aube', 'AUBE', 'aube', 'A100', 11),
(11, '11', 'Aude', 'AUDE', 'aude', 'A300', 15),
(12, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165', 15),
(13, '13', 'Bouches-du-Rhône', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365', 17),
(14, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132', 9),
(15, '15', 'Cantal', 'CANTAL', 'cantal', 'C534', 16),
(16, '16', 'Charente', 'CHARENTE', 'charente', 'C653', 14),
(17, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635', 14),
(18, '18', 'Cher', 'CHER', 'cher', 'C600', 7),
(19, '19', 'Corrèze', 'CORRÈZE', 'correze', 'C620', 14),
(20, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323', 18),
(21, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262', 18),
(22, '21', 'Côte-d''or', 'CÔTE-D''OR', 'cote-dor', 'C360', 8),
(23, '22', 'Côtes-d''armor', 'CÔTES-D''ARMOR', 'cotes-darmor', 'C323656', 13),
(24, '23', 'Creuse', 'CREUSE', 'creuse', 'C620', 14),
(25, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325', 14),
(26, '25', 'Doubs', 'DOUBS', 'doubs', 'D120', 8),
(27, '26', 'Drôme', 'DRÔME', 'drome', 'D650', 16),
(28, '27', 'Eure', 'EURE', 'eure', 'E600', 9),
(29, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346', 7),
(30, '29', 'Finistère', 'FINISTÈRE', 'finistere', 'F5236', 13),
(31, '30', 'Gard', 'GARD', 'gard', 'G630', 15),
(32, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265', 15),
(33, '32', 'Gers', 'GERS', 'gers', 'G620', 15),
(34, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653', 14),
(35, '34', 'Hérault', 'HÉRAULT', 'herault', 'H643', 15),
(36, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145', 13),
(37, '36', 'Indre', 'INDRE', 'indre', 'I536', 7),
(38, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346', 7),
(39, '38', 'Isère', 'ISÈRE', 'isere', 'I260', 16),
(40, '39', 'Jura', 'JURA', 'jura', 'J600', 8),
(41, '40', 'Landes', 'LANDES', 'landes', 'L532', 14),
(42, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326', 7),
(43, '42', 'Loire', 'LOIRE', 'loire', 'L600', 16),
(44, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346', 16),
(45, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532', 12),
(46, '45', 'Loiret', 'LOIRET', 'loiret', 'L630', 7),
(47, '46', 'Lot', 'LOT', 'lot', 'L300', 15),
(48, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265', 14),
(49, '48', 'Lozère', 'LOZÈRE', 'lozere', 'L260', 15),
(50, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346', 12),
(51, '50', 'Manche', 'MANCHE', 'manche', 'M200', 9),
(52, '51', 'Marne', 'MARNE', 'marne', 'M650', 11),
(53, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565', 11),
(54, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000', 12),
(55, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524', 11),
(56, '55', 'Meuse', 'MEUSE', 'meuse', 'M200', 11),
(57, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615', 13),
(58, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240', 11),
(59, '58', 'Nièvre', 'NIÈVRE', 'nievre', 'N160', 8),
(60, '59', 'Nord', 'NORD', 'nord', 'N630', 10),
(61, '60', 'Oise', 'OISE', 'oise', 'O200', 10),
(62, '61', 'Orne', 'ORNE', 'orne', 'O650', 9),
(63, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242', 10),
(64, '63', 'Puy-de-Dôme', 'PUY-DE-DÔME', 'puy-de-dome', 'P350', 16),
(65, '64', 'Pyrénées-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532', 14),
(66, '65', 'Hautes-Pyrénées', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652', 15),
(67, '66', 'Pyrénées-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342', 15),
(68, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265', 11),
(69, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365', 11),
(70, '69', 'Rhône', 'RHÔNE', 'rhone', 'R500', 16),
(71, '70', 'Haute-Saône', 'HAUTE-SAÔNE', 'haute-saone', 'H325', 8),
(72, '71', 'Saône-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346', 8),
(73, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630', 12),
(74, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100', 16),
(75, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321', 16),
(76, '75', 'Paris', 'PARIS', 'paris', 'P620', 6),
(77, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635', 9),
(78, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565', 6),
(79, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452', 6),
(80, '79', 'Deux-Sèvres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162', 14),
(81, '80', 'Somme', 'SOMME', 'somme', 'S500', 10),
(82, '81', 'Tarn', 'TARN', 'tarn', 'T650', 15),
(83, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265', 15),
(84, '83', 'Var', 'VAR', 'var', 'V600', 17),
(85, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242', 17),
(86, '85', 'Vendée', 'VENDÉE', 'vendee', 'V530', 12),
(87, '86', 'Vienne', 'VIENNE', 'vienne', 'V500', 14),
(88, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315', 14),
(89, '88', 'Vosges', 'VOSGES', 'vosges', 'V200', 11),
(90, '89', 'Yonne', 'YONNE', 'yonne', 'Y500', 8),
(91, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163', 8),
(92, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250', 6),
(93, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325', 6),
(94, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352', 6),
(95, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565', 6),
(96, '95', 'Val-d''oise', 'VAL-D''OISE', 'val-doise', 'V432', 6),
(97, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300', 5),
(98, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341', 1),
(99, '973', 'Guyane', 'GUYANE', 'guyane', 'G500', 3),
(100, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352', 2),
(101, '974', 'Réunion', 'RÉUNION', 'reunion', 'R500', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
