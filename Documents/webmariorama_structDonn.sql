-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Décembre 2014 à 15:10
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `webmariorama`
--

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

CREATE TABLE IF NOT EXISTS `concerne` (
  `idConsole` int(11) NOT NULL,
  `idJeu` int(11) NOT NULL,
  PRIMARY KEY (`idConsole`,`idJeu`),
  KEY `FK_Concerne_idJeu` (`idJeu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `concerne`
--

INSERT INTO `concerne` (`idConsole`, `idJeu`) VALUES
(8, 11),
(7, 12);

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

CREATE TABLE IF NOT EXISTS `consoles` (
  `idConsole` int(11) NOT NULL AUTO_INCREMENT,
  `NomConsole` varchar(20) NOT NULL,
  `ImgConsole` varchar(100) DEFAULT NULL,
  `DateConsole` date DEFAULT NULL,
  `Processeur` varchar(10) DEFAULT NULL,
  `Memoire` varchar(10) DEFAULT NULL,
  `FormatJeux` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idConsole`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `consoles`
--

INSERT INTO `consoles` (`idConsole`, `NomConsole`, `ImgConsole`, `DateConsole`, `Processeur`, `Memoire`, `FormatJeux`) VALUES
(7, 'NES', './Media/NES/NES_CONSOLE.jpg', '1986-05-15', 'Processeur', '32 ko', 'Cartouche'),
(8, 'WII U', './Media/WIIU/WIIU_CONSOLE.png', '2012-11-30', 'PowerPC 60', '2 Go', 'Disque'),
(9, 'Nintendo 64', './Media/Nintendo64/Nintendo64_CONSOLE.png', '1997-03-01', 'NEC VR4300', '4 MB', 'Cartouche');

-- --------------------------------------------------------

--
-- Structure de la table `etre`
--

CREATE TABLE IF NOT EXISTS `etre` (
  `idType` int(11) NOT NULL,
  `idJeu` int(11) NOT NULL,
  PRIMARY KEY (`idType`,`idJeu`),
  KEY `idJeu` (`idJeu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etre`
--

INSERT INTO `etre` (`idType`, `idJeu`) VALUES
(3, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `idJeu` int(11) NOT NULL AUTO_INCREMENT,
  `ImgJeu` varchar(100) DEFAULT NULL,
  `NomJeu` varchar(50) NOT NULL,
  `DateJeu` date NOT NULL,
  `Descriptif` text,
  `Video` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idJeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idJeu`, `ImgJeu`, `NomJeu`, `DateJeu`, `Descriptif`, `Video`) VALUES
(11, './Media/MarioKart8/MarioKart8_POCHETTE.jpg', 'Mario Kart 8', '2014-05-30', 'Mario Kart 8 est un jeu de course disponible sur Wii U. Mario et ses amis s''y affrontent au volant de karts ou au guidon de motos sur 32 circuits comprenant aussi bien des passages sous l''eau ou dans les airs que des loopings. Douze joueurs peuvent s''affronter en ligne ou 4 en local', NULL),
(12, './Media/SuperMarioBros./SuperMarioBros._POCHETTE.png', 'Super Mario Bros.', '1985-09-13', 'Il s''agit du premier jeu de la série Super Mario. Le joueur y contrôle Mario et voyage à travers le Royaume Champignon afin de sauver la princesse Peach des griffes de Bowser, l''antagoniste de Mario. Le jeu est jouable à deux joueurs, le premier contrôlant Mario et le second Luigi, le frère de ce dernier.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `NomType` varchar(30) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`idType`, `NomType`) VALUES
(1, 'Arcade'),
(2, 'Puzzle'),
(3, 'Course'),
(4, 'Plates-formes');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(150) NOT NULL,
  `MDP` varchar(250) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUtilisateur`, `Pseudo`, `MDP`) VALUES
(1, 'Adm', 'afe38032650933eeac1ecabda61a395b36169499'),
(2, 'Anemon', 'e72afef02219ec0e3dcb4fb50577d90887a2a0dc');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concerne`
--
ALTER TABLE `concerne`
  ADD CONSTRAINT `FK_Concerne_idConsole` FOREIGN KEY (`idConsole`) REFERENCES `consoles` (`idConsole`),
  ADD CONSTRAINT `FK_Concerne_idJeu` FOREIGN KEY (`idJeu`) REFERENCES `jeux` (`idJeu`);

--
-- Contraintes pour la table `etre`
--
ALTER TABLE `etre`
  ADD CONSTRAINT `etre_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `types` (`idType`),
  ADD CONSTRAINT `etre_ibfk_2` FOREIGN KEY (`idJeu`) REFERENCES `jeux` (`idJeu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
