-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 28 jan. 2018 à 11:54
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
-- Structure de la table `codeadmin`
--

DROP TABLE IF EXISTS `codeadmin`;
CREATE TABLE IF NOT EXISTS `codeadmin` (
  `id_Code` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `utilise` tinyint(1) NOT NULL DEFAULT '0',
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Code`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `codeadmin`
--

INSERT INTO `codeadmin` (`id_Code`, `code`, `utilise`, `id_client`) VALUES
(1, 'XIZ8TSHG', 0, NULL),
(2, 'OSIGUE8Z', 0, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `codeadmin`
--
ALTER TABLE `codeadmin`
  ADD CONSTRAINT `codeadmin_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
