-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Úterý 06. dubna 2021, 22:00
-- Verze MySQL: 5.0.51
-- Verze PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `konfigurator`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `komponenty`
--

CREATE TABLE IF NOT EXISTS `komponenty` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `typ_zbozi` char(3) collate utf8_czech_ci NOT NULL COMMENT 'cpu, chl, mbo, gpu, ram, hdd, pow, cse',
  `vyrobce` varchar(20) collate utf8_czech_ci default NULL,
  `jmeno` varchar(50) collate utf8_czech_ci NOT NULL,
  `cena` mediumint(8) unsigned default NULL,
  `dostupnost` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=50 ;

--
-- Vypisuji data pro tabulku `komponenty`
--

INSERT INTO `komponenty` (`id`, `typ_zbozi`, `vyrobce`, `jmeno`, `cena`, `dostupnost`) VALUES
(1, 'cpu', 'Intel', 'Core i5-10400F', 3899, 1),
(2, 'cpu', 'Intel', 'Core i7-9700KF', 6590, 1),
(3, 'cpu', 'Intel', 'Core i5-9400F', 3399, 1),
(4, 'cpu', 'AMD', 'Ryzen 5 3600', 5290, 0),
(5, 'cpu', 'AMD', 'Ryzen 5 1600', 3190, 1),
(6, 'cpu', 'AMD', 'Ryzen 7 3700X', 8490, 1),
(7, 'chl', 'Noctua', 'NH-D14', 1949, 0),
(8, 'chl', 'SilverStone', 'PF360, ARGB', 2899, 1),
(9, 'chl', 'SilentiumPC', 'Fera 3 HE1224 v2', 699, 1),
(10, 'chl', 'SilentiumPC', 'Fera 3 EVO ARGB', 1199, 1),
(11, 'chl', 'Arctic', 'Freezer 34', 699, 1),
(12, 'chl', 'Arctic', 'Freezer 7 X', 449, 1),
(13, 'mbo', 'Asus', 'PRIME H410M-K', 1599, 1),
(14, 'mbo', 'Gigabyte', 'B460 HD3', 2460, 1),
(15, 'mbo', 'ASRock', 'B365 PRO4', 2145, 0),
(16, 'mbo', 'Asus', 'ROG STRIX B360-G GAMING', 2289, 1),
(17, 'mbo', 'Gigabyte', 'B450 GAMING X', 2278, 1),
(18, 'mbo', 'ASRock', 'AB350 Pro4', 2199, 0),
(19, 'gpu', 'Asus', 'GeForce DUAL-GTX1650-O4GD6-MINI', 5499, 0),
(26, 'gpu', 'MSI', 'GT 710, 2GB', 1199, 1),
(21, 'gpu', 'MSI', 'GeForce GTX 1660 Ti VENTUS XS 6G OC', 8861, 0),
(22, 'gpu', 'Gigabyte', 'GeForce RTX 3060 TI GAMING OC 8G', 16999, 0),
(23, 'gpu', 'MSI', 'Radeon RX 580 ARMOR 8G OC', 5570, 0),
(24, 'gpu', 'Asus', 'Radeon DUAL-RX5500XT-O8G-EVO', 7690, 0),
(25, 'gpu', 'ASRock', 'Radeon RX 6900 XT Phantom Gaming D 16G OC', 27900, 0),
(27, 'ram', 'Patriot', 'Viper Elite gray 8GB (2x4GB)', 975, 1),
(28, 'ram', 'HyperX', 'Fury Black 8GB (2x4GB)', 1238, 1),
(29, 'ram', 'HyperX', 'Fury Black 16GB (2x8GB)', 1952, 1),
(30, 'ram', 'HyperX', 'Fury RGB 16GB (2x8GB)', 2496, 1),
(31, 'ram', 'HyperX', 'Predator RGB 32GB (2x16GB)', 4819, 1),
(32, 'hdd', 'Western Digital', 'Blue (EZEX), 3,5" - 1TB', 999, 1),
(33, 'hdd', 'Seagate', 'BarraCuda, 3,5" - 2TB', 1399, 1),
(34, 'hdd', 'Seagate', 'SkyHawk, 3,5" - 4TB', 2499, 1),
(35, 'hdd', 'Samsung', 'SSD 860 EVO, 2,5" - 500GB', 1699, 0),
(36, 'hdd', 'Crucial', 'MX500, 2,5" - 1TB', 2699, 1),
(37, 'hdd', 'Samsung', 'SSD 970 EVO PLUS, M.2 - 250GB', 1599, 1),
(38, 'hdd', 'Western Digital', 'Black SN750, M.2 - 500GB', 2199, 0),
(39, 'hdd', 'ADATA', 'XPG GAMMIX S5, M.2 - 1TB', 2999, 1),
(40, 'pow', 'Be quiet!', 'System Power 9 - 600W', 1499, 1),
(41, 'pow', 'Seasonic', 'Focus Gold - 650W', 2299, 1),
(42, 'pow', 'Evolveo', ' - 350 W', 599, 1),
(43, 'pow', 'nJoy', 'Freya RGB - 800W', 2299, 1),
(44, 'pow', 'Fortron', 'HYDRO PTM PRO - 1000W', 4499, 1),
(45, 'cse', 'Fractal Design', 'Meshify C Blackout TG, sklo, černá', 2599, 1),
(46, 'cse', 'Evolveo', 'T3', 999, 1),
(47, 'cse', 'SilentiumPC', 'Armis AR1 Pure Black, černá', 799, 0),
(48, 'cse', 'ASUS', 'ROG Strix Helios White Edition', 6969, 1),
(49, 'cse', 'Porte', 'B26, černá', 399, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `parametry`
--

CREATE TABLE IF NOT EXISTS `parametry` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_komponent` mediumint(8) unsigned NOT NULL,
  `id_parametr` smallint(5) unsigned NOT NULL,
  `hodnota_text` varchar(20) collate utf8_czech_ci default NULL,
  `hodnota_cislo` float default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_parametr` (`id_parametr`),
  KEY `id_komponent` (`id_komponent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=228 ;

--
-- Vypisuji data pro tabulku `parametry`
--

INSERT INTO `parametry` (`id`, `id_komponent`, `id_parametr`, `hodnota_text`, `hodnota_cislo`) VALUES
(1, 1, 1, '1200', NULL),
(2, 2, 1, '1151', NULL),
(3, 3, 1, '1151', NULL),
(4, 4, 1, 'AM4', NULL),
(5, 5, 1, 'AM4', NULL),
(6, 6, 1, 'AM4', NULL),
(7, 1, 2, 'Comet Lake', NULL),
(8, 2, 2, 'Coffee Lake', NULL),
(9, 3, 2, 'Coffee Lake', NULL),
(10, 4, 2, 'Zen 2', NULL),
(11, 5, 2, 'Zen +', NULL),
(12, 6, 2, 'Zen 2', NULL),
(13, 1, 3, NULL, 6),
(14, 2, 3, NULL, 8),
(15, 3, 3, NULL, 6),
(16, 4, 3, NULL, 6),
(17, 5, 3, NULL, 6),
(18, 6, 3, NULL, 8),
(19, 1, 4, NULL, 2.9),
(20, 2, 4, NULL, 3.6),
(21, 3, 4, NULL, 2.9),
(22, 4, 4, NULL, 3.6),
(23, 5, 4, NULL, 3.2),
(24, 6, 4, NULL, 3.6),
(25, 7, 5, NULL, 140),
(26, 8, 5, NULL, 120),
(27, 9, 5, NULL, 120),
(28, 10, 5, NULL, 120),
(29, 11, 5, NULL, 120),
(30, 12, 5, NULL, 92),
(31, 7, 6, NULL, 1300),
(32, 8, 6, NULL, 2200),
(33, 9, 6, NULL, 1600),
(34, 10, 6, NULL, 1600),
(35, 11, 6, NULL, 1800),
(36, 12, 6, NULL, 2000),
(37, 7, 7, NULL, 19.8),
(38, 8, 7, NULL, 35.6),
(39, 9, 7, NULL, 15),
(40, 10, 7, NULL, 20),
(41, 11, 7, NULL, 22.5),
(42, 12, 7, NULL, 22.5),
(43, 13, 1, '1200', NULL),
(44, 13, 9, 'H410', NULL),
(45, 13, 10, 'mATX', NULL),
(46, 13, 11, 'DDR4 DIMM', NULL),
(47, 13, 12, NULL, 2),
(48, 13, 13, NULL, 1),
(49, 13, 14, NULL, 0),
(50, 14, 1, '1200', NULL),
(51, 14, 9, 'B460', NULL),
(52, 14, 10, 'ATX', NULL),
(53, 14, 11, 'DDR4 DIMM', NULL),
(54, 14, 12, NULL, 4),
(55, 14, 13, NULL, 2),
(56, 14, 14, NULL, 2),
(57, 15, 1, '1151', NULL),
(58, 15, 9, 'B365', NULL),
(59, 15, 10, 'ATX', NULL),
(60, 15, 11, 'DDR4 DIMM', NULL),
(61, 15, 12, NULL, 4),
(62, 15, 13, NULL, 2),
(63, 15, 14, NULL, 2),
(64, 16, 1, '1151', NULL),
(65, 16, 9, 'B360', NULL),
(66, 16, 10, 'mATX', NULL),
(67, 16, 11, 'DDR4 DIMM', NULL),
(68, 16, 12, NULL, 4),
(69, 16, 13, NULL, 2),
(70, 16, 14, NULL, 2),
(71, 17, 1, 'AM4', NULL),
(72, 17, 9, 'B450', NULL),
(73, 17, 10, 'ATX', NULL),
(74, 17, 11, 'DDR4 DIMM', NULL),
(75, 17, 12, NULL, 4),
(76, 17, 13, NULL, 2),
(77, 17, 14, NULL, 1),
(78, 18, 1, 'AM4', NULL),
(79, 18, 9, 'B350', NULL),
(80, 18, 10, 'ATX', NULL),
(81, 18, 11, 'DDR4 DIMM', NULL),
(82, 18, 12, NULL, 4),
(83, 18, 13, NULL, 2),
(84, 18, 14, NULL, 1),
(85, 13, 15, NULL, 2933),
(86, 14, 15, NULL, 2933),
(87, 15, 15, NULL, 2666),
(88, 16, 15, NULL, 2666),
(89, 17, 15, NULL, 2933),
(90, 18, 15, NULL, 3200),
(91, 19, 16, NULL, 1650),
(92, 19, 17, 'GDDR6', NULL),
(93, 19, 18, NULL, 4),
(94, 19, 19, NULL, 896),
(95, 19, 20, NULL, 300),
(96, 21, 16, NULL, 1830),
(97, 21, 17, 'GDDR6', NULL),
(98, 21, 18, NULL, 6),
(99, 21, 19, NULL, 1536),
(100, 21, 20, NULL, 450),
(101, 22, 16, NULL, 1740),
(102, 22, 17, 'GDDR6', NULL),
(103, 22, 18, NULL, 8),
(104, 22, 19, NULL, 4864),
(105, 22, 20, NULL, 600),
(106, 23, 16, NULL, 1366),
(107, 23, 17, 'GDDR5', NULL),
(108, 23, 18, NULL, 8),
(109, 23, 19, NULL, 2304),
(110, 23, 20, NULL, 500),
(111, 24, 16, NULL, 1865),
(112, 24, 17, 'GDDR6', NULL),
(113, 24, 18, NULL, 8),
(114, 24, 19, NULL, 1408),
(115, 24, 20, NULL, 450),
(116, 25, 16, NULL, 2340),
(117, 25, 17, 'GDDR6', NULL),
(118, 25, 18, NULL, 16),
(119, 25, 19, NULL, 5120),
(120, 25, 20, NULL, 900),
(121, 26, 16, NULL, 954),
(122, 26, 17, 'GDDR3', NULL),
(123, 26, 18, NULL, 2),
(124, 26, 19, NULL, 192),
(125, 26, 20, NULL, 300),
(126, 27, 11, 'DDR4 DIMM', NULL),
(127, 28, 11, 'DDR4 DIMM', NULL),
(128, 29, 11, 'DDR4 DIMM', NULL),
(129, 30, 11, 'DDR4 DIMM', NULL),
(130, 31, 11, 'DDR4 DIMM', NULL),
(131, 27, 12, NULL, 2),
(132, 28, 12, NULL, 2),
(133, 29, 12, NULL, 2),
(134, 30, 12, NULL, 2),
(135, 31, 12, NULL, 2),
(136, 27, 22, NULL, 8),
(137, 28, 22, NULL, 8),
(138, 29, 22, NULL, 16),
(139, 30, 22, NULL, 16),
(140, 31, 22, NULL, 32),
(141, 27, 21, NULL, 2666),
(142, 28, 21, NULL, 3200),
(143, 29, 21, NULL, 3200),
(144, 30, 21, NULL, 3600),
(145, 31, 21, NULL, 3600),
(146, 27, 23, NULL, 16),
(147, 28, 23, NULL, 16),
(148, 29, 23, NULL, 16),
(149, 30, 23, NULL, 17),
(150, 31, 23, NULL, 17),
(151, 32, 24, NULL, 1000),
(152, 32, 25, NULL, 7200),
(153, 32, 26, 'Magnetický', NULL),
(154, 32, 27, 'SATA 6Gbps', NULL),
(155, 32, 28, NULL, 150),
(156, 32, 29, NULL, 150),
(157, 33, 24, NULL, 2000),
(158, 33, 25, NULL, 7200),
(159, 33, 26, 'Magnetický', NULL),
(160, 33, 27, 'SATA 6Gbps', NULL),
(161, 33, 28, NULL, 220),
(162, 33, 29, NULL, 220),
(163, 34, 24, NULL, 4000),
(164, 34, 25, NULL, 5900),
(165, 34, 26, 'Magnetický', NULL),
(166, 34, 27, 'SATA 6Gbps', NULL),
(167, 34, 28, NULL, 190),
(168, 34, 29, NULL, 190),
(169, 35, 24, NULL, 500),
(170, 35, 26, 'SSD', NULL),
(171, 35, 27, 'SATA 6Gbps', NULL),
(172, 35, 28, NULL, 550),
(173, 35, 29, NULL, 520),
(174, 36, 24, NULL, 1024),
(175, 36, 26, 'SSD', NULL),
(176, 36, 27, 'SATA 6Gbps', NULL),
(177, 36, 28, NULL, 560),
(178, 36, 29, NULL, 510),
(179, 37, 24, NULL, 250),
(180, 37, 26, 'SSD', NULL),
(181, 37, 27, 'M.2 PCI-Express Gen3', NULL),
(182, 37, 28, NULL, 3500),
(183, 37, 29, NULL, 2300),
(184, 38, 24, NULL, 500),
(185, 38, 26, 'SSD', NULL),
(186, 38, 27, 'M.2 PCI-Express Gen3', NULL),
(187, 38, 28, NULL, 3470),
(188, 38, 29, NULL, 2600),
(189, 39, 24, NULL, 1024),
(190, 39, 26, 'SSD', NULL),
(191, 39, 27, 'M.2 PCI-Express Gen3', NULL),
(192, 39, 28, NULL, 2100),
(193, 39, 29, NULL, 1400),
(194, 40, 30, NULL, 600),
(195, 40, 31, '80 Plus Bronze', NULL),
(196, 41, 30, NULL, 650),
(197, 41, 31, '80 Plus Gold', NULL),
(198, 43, 30, NULL, 800),
(199, 43, 31, '80 Plus Bronze', NULL),
(200, 44, 30, NULL, 1000),
(201, 44, 31, '80 Plus Platinum', NULL),
(202, 42, 30, NULL, 350),
(203, 42, 31, '80 Minus', NULL),
(204, 45, 32, NULL, 7),
(205, 45, 33, NULL, 2),
(206, 45, 34, NULL, 5),
(207, 45, 35, NULL, 7),
(208, 46, 32, NULL, 5),
(209, 46, 33, NULL, 3),
(210, 46, 34, NULL, 5),
(211, 46, 35, NULL, 7),
(212, 47, 32, NULL, 3),
(213, 47, 33, NULL, 1),
(214, 47, 34, NULL, 4),
(215, 47, 35, NULL, 7),
(220, 48, 32, NULL, 7),
(221, 48, 33, NULL, 4),
(222, 48, 34, NULL, 6),
(223, 48, 35, NULL, 10),
(224, 49, 32, NULL, 2),
(225, 49, 33, NULL, 0),
(226, 49, 34, NULL, 5),
(227, 49, 35, NULL, 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `parametry_jmena`
--

CREATE TABLE IF NOT EXISTS `parametry_jmena` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `parametr` varchar(50) collate utf8_czech_ci NOT NULL,
  `typ` tinyint(1) NOT NULL COMMENT '0 = cislo, 1 = text',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=36 ;

--
-- Vypisuji data pro tabulku `parametry_jmena`
--

INSERT INTO `parametry_jmena` (`id`, `parametr`, `typ`) VALUES
(1, 'Socket', 1),
(2, 'Generace', 1),
(3, 'Počet jader', 0),
(4, 'Pracovní frekvence (GHz)', 0),
(5, 'Velikost větráku (mm)', 0),
(6, 'Otáčky za minutu', 0),
(7, 'Úroveň hluku (dB)', 0),
(15, 'Frekvence operační paměti (MHz)', 0),
(9, 'Čipová sada', 1),
(10, 'Formát desky', 1),
(11, 'Typ RAM paměti', 1),
(12, 'Počet paměťových slotů', 0),
(13, 'Počet slotů PCI-E x16', 0),
(14, 'Počet slotů pro M.2 disk', 0),
(16, 'Frekvence grafického čipu (MHz)', 0),
(17, 'Typ grafické paměti', 1),
(18, 'Velikost grafické paměti (GB)', 0),
(19, 'Počet stream procesorů', 0),
(20, 'Doporučený výkon zdroje (W)', 0),
(21, 'Pracovní frekvence RAM (MHz)', 0),
(22, 'Velikost paměti RAM (GB)', 0),
(23, 'CAS Latency (CL)', 0),
(24, 'Kapacita (GB)', 0),
(25, 'Otáčky za minutu (RPM)', 0),
(26, 'Technologie disku', 1),
(27, 'Rozhraní', 1),
(28, 'Rychlost čtení (MB/s)', 0),
(29, 'Rychlost zápisu (MB/s)', 0),
(30, 'Výkon zdroje (W)', 0),
(31, 'Energetická efektivita', 1),
(32, 'Počet pozic na ventilátory', 0),
(33, 'Počet předinstalovaných ventilátorů', 0),
(34, 'Počet pozic pro disky', 0),
(35, 'Počet pozic pro karty', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `sestavy`
--

CREATE TABLE IF NOT EXISTS `sestavy` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `uzivatel` mediumint(8) unsigned default NULL,
  `jmeno` varchar(64) collate utf8_czech_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `sestavy`
--

INSERT INTO `sestavy` (`id`, `uzivatel`, `jmeno`) VALUES
(1, 1, 'Simonova sestava');

-- --------------------------------------------------------

--
-- Struktura tabulky `sestavy_komp`
--

CREATE TABLE IF NOT EXISTS `sestavy_komp` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_komponenty` mediumint(8) unsigned NOT NULL,
  `id_sestavy` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_komponenty` (`id_komponenty`,`id_sestavy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `sestavy_komp`
--

INSERT INTO `sestavy_komp` (`id`, `id_komponenty`, `id_sestavy`) VALUES
(1, 3, 1),
(2, 8, 1),
(3, 16, 1),
(4, 26, 1),
(5, 30, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE IF NOT EXISTS `uzivatele` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `nick` varchar(64) collate utf8_czech_ci NOT NULL,
  `heslo` varchar(64) collate utf8_czech_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `nick`, `heslo`) VALUES
(1, 'Simon', 'ab42ca8854657392a64ed791c65b369a');
