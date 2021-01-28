-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Čtvrtek 28. ledna 2021, 23:03
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
  `id` mediumint(8) unsigned NOT NULL,
  `typ_zbozi` char(3) collate utf8_czech_ci NOT NULL COMMENT 'cpu, chl, mbo, gpu, ram, hdd, pow, cse',
  `vyrobce` varchar(20) collate utf8_czech_ci default NULL,
  `jmeno` varchar(50) collate utf8_czech_ci NOT NULL,
  `cena` mediumint(8) unsigned default NULL,
  `dostupnost` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
(12, 'chl', 'Arctic', 'Freezer 7 X', 449, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `parametry`
--

CREATE TABLE IF NOT EXISTS `parametry` (
  `id` int(10) unsigned NOT NULL,
  `id_komponent` mediumint(8) unsigned NOT NULL,
  `id_parametr` smallint(5) unsigned NOT NULL,
  `hodnota_text` varchar(20) collate utf8_czech_ci default NULL,
  `hodnota_cislo` float default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_parametr` (`id_parametr`),
  KEY `id_komponent` (`id_komponent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
(42, 12, 7, NULL, 22.5);

-- --------------------------------------------------------

--
-- Struktura tabulky `parametry_jmena`
--

CREATE TABLE IF NOT EXISTS `parametry_jmena` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `parametr` varchar(50) collate utf8_czech_ci NOT NULL,
  `typ` tinyint(1) NOT NULL COMMENT '0 = cislo, 1 = text',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;

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
(7, 'Úroveň hluku (dB)', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `sestavy`
--

CREATE TABLE IF NOT EXISTS `sestavy` (
  `id` mediumint(8) unsigned NOT NULL,
  `uzivatel` mediumint(8) unsigned default NULL,
  `jmeno` varchar(20) collate utf8_czech_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `sestavy`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `sestavy_komp`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE IF NOT EXISTS `uzivatele` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `nick` varchar(20) collate utf8_czech_ci NOT NULL,
  `heslo` varchar(20) collate utf8_czech_ci NOT NULL,
  `email` varchar(50) collate utf8_czech_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `uzivatele`
--

