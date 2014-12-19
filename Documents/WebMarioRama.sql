-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Décembre 2014 à 14:38
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `NomType` varchar(30) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
