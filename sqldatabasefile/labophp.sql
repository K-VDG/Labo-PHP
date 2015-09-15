-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 15 sep 2015 om 10:27
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `labophp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
`ID` int(11) NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `taak` varchar(100) NOT NULL,
  `actief` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `todolist`
--

INSERT INTO `todolist` (`ID`, `user`, `taak`, `actief`) VALUES
(62, 29, 'labo php maken', 1),
(63, 29, 'labo uploaden', 1),
(65, 29, 'prutsen', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(10) unsigned NOT NULL,
  `email` varchar(30) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `saltyhashedpassword` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `email`, `salt`, `saltyhashedpassword`) VALUES
(29, 'kvdg@hotmail.com', 'vp214UTZgj', '743c61f37e7bfd70c95b0f8db422cbc14c2a9770e6d79527665aa69cf402b639db416d6d836c6702091ea296fd8c19386e911b5a29dc8a5dc45d3bc549ff419b'),
(30, 'test@test.test', 'ViAtpF8b56', 'c1561d5737c3f5e6d6513d1cd0893224730c3772f50056b05fc9f5acd3c06b8c31da568bd0d79c37d6144e5cf1ed56af0ac1d2edbf971e41ebda94ca0b40ca6e'),
(37, 'test@test.com', 'hyRrcMxO0J', '50d359da8f2ffd4b4139565e6a7f2cbde6aa238b733df456ee40c57e5999582df9643a3aaa5eaf11e2fb9f1114c411efc2c11aadc124db568fb56a234a3cf2a3'),
(38, 'a@a.a', 'lrzmR4d9dT', '3d3c29a69fffb454bd31c3bb1af71687f4965e562bda8e757864c8f3fa4f77859838cb4585621b62d2319a4a7b84b1c405efa21babf2c2f5ef2bd82ca00ea5f8');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `todolist`
--
ALTER TABLE `todolist`
 ADD PRIMARY KEY (`ID`), ADD KEY `user` (`user`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `todolist`
--
ALTER TABLE `todolist`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `todolist`
--
ALTER TABLE `todolist`
ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
