-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Décembre 2014 à 16:19
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
(1, 6),
(3, 6),
(4, 6),
(3, 7),
(3, 8),
(2, 9),
(3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

CREATE TABLE IF NOT EXISTS `consoles` (
  `idConsole` int(11) NOT NULL AUTO_INCREMENT,
  `NomConsole` varchar(20) NOT NULL,
  `ImgConsole` varchar(100) DEFAULT NULL,
  `DateConsole` date DEFAULT NULL,
  PRIMARY KEY (`idConsole`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `consoles`
--

INSERT INTO `consoles` (`idConsole`, `NomConsole`, `ImgConsole`, `DateConsole`) VALUES
(1, 'NES', NULL, '1986-09-01'),
(2, 'SNES', NULL, '1992-04-11'),
(3, 'WII U', NULL, '2012-11-30'),
(4, 'Nintendo 3DS', NULL, NULL);

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
(4, 6),
(3, 7),
(4, 8),
(3, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idJeu`, `ImgJeu`, `NomJeu`, `DateJeu`, `Descriptif`, `Video`) VALUES
(6, './Media/SuperMarioBros/SuperMarioBros_POCHETTE.png', 'Super Mario Bros', '1987-05-15', 'Super Mario Bros. sur Nes est un jeu de plates-formes mettant en scène le désormais célèbre plombier à moustache et salopette rouge. Traversez de nombreux niveaux, sautez sur vos ennemis pour les éliminer, ramassez des champignons pour grandir et des fleurs pour cracher du feu. Affrontez le méchant Bowser et ses sbires afin de délivrer la délicieuse princesse Peach.', NULL),
(7, './Media/MarioKart8/MarioKart8_POCHETTE.jpg', 'Mario Kart 8', '2014-05-30', 'Mario Kart 8 est un jeu de course disponible sur Wii U. Mario et ses amis s''y affrontent au volant de karts ou au guidon de motos sur 32 circuits comprenant aussi bien des passages sous l''eau ou dans les airs que des loopings. Douze joueurs peuvent s''affronter en ligne ou 4 en local.', NULL),
(8, './Media/SuperMario3DWorld/SuperMario3DWorld_POCHETTE.jpg', 'Super Mario 3D World', '2013-11-29', 'Super Mario 3D World est un jeu de plates-formes sur Wii U. Jusqu''à quatre personnages peuvent s''entraider dans des niveaux qui mélangent jouabilité 2D et 3D. En récupérant des étoiles cachées, on débloque de nouveaux mondes de plus en plus difficiles.', './Media/SuperMario3DWorld/SuperMario3DWorld_VIDEO.mp4'),
(9, './Media/SuperMarioKart/SuperMarioKart_POCHETTE.jpg', 'Super Mario Kart', '1993-01-21', 'Super Mario Kart sur Super Nintendo est un jeu de courses reprenant l''univers et les personnages de Mario. Après avoir choisi un pilote parmi les huit proposés, lancez-vous dans les quatre coupes différentes pour essayer d''atteindre la plus haute marche du podium. Grâce à des bonus ramassés sur le circuit, tous les coups sont permis, à commencer par le largage de peaux de banane et l''envoi de carapaces. Le mode Battle permet d''ailleurs d''affronter les autres à coup de carapaces.', NULL);

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
