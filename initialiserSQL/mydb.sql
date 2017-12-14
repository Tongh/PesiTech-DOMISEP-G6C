-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 déc. 2017 à 10:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `id_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `type_capteur` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `Actionneur` varchar(45) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `unite` int(10) NOT NULL,
  `temps` varchar(255) NOT NULL,
  `valeur` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `piece_ID piece` int(11) NOT NULL,
  `piece_logement_utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_capteur`),
  UNIQUE KEY `id_capteur` (`id_capteur`),
  KEY `ID capteur` (`id_capteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `id_cemac` int(11) NOT NULL,
  PRIMARY KEY (`id_cemac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande produit`
--

DROP TABLE IF EXISTS `commande produit`;
CREATE TABLE IF NOT EXISTS `commande produit` (
  `ID commande produit` int(11) NOT NULL AUTO_INCREMENT,
  `ID capteur` int(11) NOT NULL,
  `Quantité` int(11) NOT NULL,
  `utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID commande produit`,`utilisateur_id utilisateur`),
  KEY `ID commande produit` (`ID commande produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `domisep`
--

DROP TABLE IF EXISTS `domisep`;
CREATE TABLE IF NOT EXISTS `domisep` (
  `ID immeuble` int(11) NOT NULL AUTO_INCREMENT,
  `DOMISEPcol` varchar(45) DEFAULT NULL,
  KEY `ID immeuble` (`ID immeuble`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id_info` varchar(9) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `ID logement` int(11) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(255) NOT NULL,
  `dans_immeuble` tinyint(4) DEFAULT '0',
  `utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id utilisateur`),
  KEY `ID logement` (`ID logement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ordre`
--

DROP TABLE IF EXISTS `ordre`;
CREATE TABLE IF NOT EXISTS `ordre` (
  `id_ordre` int(11) NOT NULL AUTO_INCREMENT,
  `heure de debut` varchar(255) NOT NULL,
  `heure de fin` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `ID capteur` int(11) NOT NULL,
  `capteurs_piece_ID piece` int(11) NOT NULL,
  `capteurs_piece_logement_utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_ordre`,`capteurs_piece_ID piece`,`capteurs_piece_logement_utilisateur_id utilisateur`),
  KEY `ID ordre` (`id_ordre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `ID panne` int(11) NOT NULL AUTO_INCREMENT,
  `Date de début` date NOT NULL,
  `Date de fin` date NOT NULL,
  `ID capteur` int(11) NOT NULL,
  KEY `ID panne` (`ID panne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `Superficie` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Type de piece` varchar(255) NOT NULL,
  `logement_utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_piece`,`logement_utilisateur_id utilisateur`),
  KEY `ID pièce` (`id_piece`),
  KEY `fk_pièce_logement1_idx` (`logement_utilisateur_id utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `ville` varchar(255),
  `codePostal` varchar(255),
  `adresse` varchar(255),
  `complementAdresse` varchar(255),  
  PRIMARY KEY (`id utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

/*INSERT INTO `utilisateur` (`id utilisateur`, `nom`, `prenom`, `login`, `password`, `email`, `telephone`) VALUES
(2, 'Max', 'Vassal', 'maxvassal', 'isep', 'max.vassal', 606060606);*/
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
