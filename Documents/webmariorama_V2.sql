-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Février 2015 à 09:07
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
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Commentaire` longtext NOT NULL,
  `DatePublication` date NOT NULL,
  `Pseudo` varchar(15) NOT NULL,
  `idJeu` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `idPage` (`idJeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `Commentaire`, `DatePublication`, `Pseudo`, `idJeu`) VALUES
(1, 'Un commentaire fou. \\(0,0)/', '2026-02-15', 'Nifes', 14),
(2, 'Un super commentaire', '2026-02-15', 'Nifes', 12);

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
(7, 12),
(8, 12),
(10, 13),
(8, 14),
(11, 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `consoles`
--

INSERT INTO `consoles` (`idConsole`, `NomConsole`, `ImgConsole`, `DateConsole`, `Processeur`, `Memoire`, `FormatJeux`) VALUES
(7, 'NES', './Media/NES/NES_CONSOLE.jpg', '1986-05-15', 'Processeur', '32 ko', 'Cartouche'),
(8, 'WII U', './Media/WIIU/WIIU_CONSOLE.png', '2012-11-30', 'PowerPC 60', '2 Go', 'Disque'),
(9, 'Nintendo 64', './Media/Nintendo64/Nintendo64_CONSOLE.png', '1997-03-01', 'NEC VR4300', '4 MB', 'Cartouche'),
(10, 'SNES', './Media/SNES/SNES_CONSOLE.jpg', '1992-04-11', NULL, NULL, 'Cartouche'),
(11, 'Nintendo 3DS', './Media/Nintendo3DS/Nintendo3DS_CONSOLE.jpg', '2011-03-25', 'CPU ARM11 ', '128 Mo', 'Cartouche');

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
(4, 12),
(3, 13),
(4, 14),
(5, 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idJeu`, `ImgJeu`, `NomJeu`, `DateJeu`, `Descriptif`, `Video`) VALUES
(11, './Media/MarioKart8/MarioKart8_POCHETTE.jpg', 'Mario Kart 8', '2014-05-30', 'Mario Kart 8 est un jeu de course disponible sur Wii U. Mario et ses amis s''y affrontent au volant de karts ou au guidon de motos sur 32 circuits comprenant aussi bien des passages sous l''eau ou dans les airs que des loopings. Douze joueurs peuvent s''affronter en ligne ou 4 en local', NULL),
(12, './Media/SuperMarioBros./SuperMarioBros._POCHETTE.png', 'Super Mario Bros.', '1985-09-13', 'Il s''agit du premier jeu de la série Super Mario. Le joueur y contrôle Mario et voyage à travers le Royaume Champignon afin de sauver la princesse Peach des griffes de Bowser, l''antagoniste de Mario. Le jeu est jouable à deux joueurs, le premier contrôlant Mario et le second Luigi, le frère de ce dernier.', NULL),
(13, './Media/SuperMarioKart/SuperMarioKart_POCHETTE.jpg', 'Super Mario Kart', '1993-01-21', '. Il s’agit d’un jeu de course de karts opposant les personnages de l’univers de Super Mario. Il constitue le premier opus de la série de jeux vidéo Mario Kart. Le jeu est sorti au Japon en août 1992, en Amérique du Nord en septembre de cette année, et en Europe en janvier 1993. Vendu à plus de huit millions d’exemplaires dans le monde, il est devenu la troisième meilleure vente de jeux pour Super Nintendo de tous les temps. Il est ressorti sur la Console virtuelle de la Wii le 9 juin 2009 au Japon, le 23 novembre 2009 en Amérique du Nord et le 2 avril 2010 en Europe', NULL),
(14, './Media/SuperMario3DWorld/SuperMario3DWorld_POCHETTE.jpg', 'Super Mario 3D World', '2013-11-29', 'Super Mario 3D World est un jeu de plates-formes sur Wii U. Jusqu''à quatre personnages peuvent s''entraider dans des niveaux qui mélangent jouabilité 2D et 3D. En récupérant des étoiles cachées, on débloque de nouveaux mondes de plus en plus difficiles.', './Media/SuperMario3DWorld/SuperMario3DWorld_VIDEO.mp4'),
(16, './Media/MarioGolf-WorldTour/MarioGolf-WorldTour_POCHETTE.png', 'Mario Golf - World Tour', '2014-05-02', 'Mario Golf : World Tour est un jeu de sport dans lequel il s''agit de faire du golf avec Mario, Bowser ou encore la princesse Peach sur 3DS. Des parcours aux 2 coins du Royume Champignon sont compris avec au programme des défis et du jeu multijoueur en ligne.', './Media/MarioGolf-WorldTour/MarioGolf-WorldTour_VIDEO.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `NomType` varchar(30) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`idType`, `NomType`) VALUES
(1, 'Arcade'),
(2, 'Puzzle'),
(3, 'Course'),
(4, 'Plates-formes'),
(5, 'Sport'),
(6, 'Education');

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
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeux` (`idJeu`);

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
