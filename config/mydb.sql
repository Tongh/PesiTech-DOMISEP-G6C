-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 28 jan. 2018 à 12:11
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

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `id_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `type_capteur` varchar(45) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `piece_ID` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_capteur`),
  UNIQUE KEY `id_capteur` (`id_capteur`),
  KEY `ID capteur` (`id_capteur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
-- Structure de la table `codeadmin`
--

DROP TABLE IF EXISTS `codeAdmin`;
CREATE TABLE IF NOT EXISTS `codeAdmin` (
  `id_Code` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `utilise` tinyint(1) NOT NULL DEFAULT '0',
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Code`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `codeadmin`
--

INSERT INTO `codeAdmin` (`id_Code`, `code`, `utilise`, `id_client`) VALUES
(1, 'XIZ8TSHG', 0, NULL),
(2, 'OSIGUE8Z', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `codeclient`
--

DROP TABLE IF EXISTS `codeClient`;
CREATE TABLE IF NOT EXISTS `codeClient` (
  `id_Code` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `utilise` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_Code`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `codeclient`
--

INSERT INTO `codeClient` (`id_Code`, `code`, `id_client`, `utilise`) VALUES
(1, 'J8LGXP9S', NULL, 0),
(2, '7GZSWSSQ', NULL, 0),
(3, 'SJFSQ8JD', NULL, 0),
(4, 'DF9DGHZ3', NULL, 0),
(5, '87DG8D7G', NULL, 0),
(6, 'KDIGRR83', NULL, 0),
(7, 'HGIDDDUT', NULL, 0),
(8, 'ER77GETS', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande produit`
--

DROP TABLE IF EXISTS `commande_produit`;
CREATE TABLE IF NOT EXISTS `commande_produit` (
  `ID commande produit` int(11) NOT NULL AUTO_INCREMENT,
  `ID capteur` int(11) NOT NULL,
  `Quantité` int(11) NOT NULL,
  `utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID commande produit`,`utilisateur_id utilisateur`),
  KEY `ID commande produit` (`ID commande produit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_capteurs`
--

DROP TABLE IF EXISTS `donnees_capteurs`;
CREATE TABLE IF NOT EXISTS `donnees_capteurs` (
  `id_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `actionneur` varchar(45) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `unite` int(10) NOT NULL,
  `temps` varchar(255) NOT NULL,
  `valeur` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `consommation` int(11) NOT NULL,
  PRIMARY KEY (`id_capteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `id_logement` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `utilisateur_id utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_logement`),
  KEY `utilisateur_id utilisateur` (`utilisateur_id utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `id_panne` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_début` date NOT NULL,
  `date_de_fin` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  KEY `id_panne` (`id_panne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `superficie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `label_piece` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_piece`),
  KEY `ID pièce` (`id_piece`),
  KEY `fk_pièce_logement1_idx` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=593 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `complementAdresse` varchar(255) DEFAULT NULL,
  `typeUtilisateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `codeadmin`
--
ALTER TABLE `codeAdmin`
  ADD CONSTRAINT `codeAdmin_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `codeclient`
--
ALTER TABLE `codeClient`
  ADD CONSTRAINT `codeClient_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
