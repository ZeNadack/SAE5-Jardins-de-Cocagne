-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 21 jan. 2025 à 11:11
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jardinsdecocagne`
--
CREATE DATABASE IF NOT EXISTS `jardinsdecocagne` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jardinsdecocagne`;

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `idabonnement` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`idabonnement`, `idclient`, `idproduit`, `datedebut`, `datefin`) VALUES
(1, 3, 2, '2025-01-01', '2025-01-31'),
(2, 3, 1, '2025-01-17', '2025-02-07');

-- --------------------------------------------------------

--
-- Structure de la table `adherence`
--

CREATE TABLE `adherence` (
  `idadherence` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `typeadhesion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherence`
--

INSERT INTO `adherence` (`idadherence`, `idclient`, `datedebut`, `datefin`, `typeadhesion`) VALUES
(1, 1, '2024-09-01', NULL, NULL),
(2, 3, '2024-12-23', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idclient` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text,
  `datepremiereadhesion` date DEFAULT NULL,
  `adhesionencours` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idclient`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `datepremiereadhesion`, `adhesionencours`) VALUES
(1, 'MICHEL', 'Jean', 'jeanmichel@gmail.com', '0102030405', '30 rue du bois', '2025-01-09', 1),
(2, 'DANIEL', 'Antoine', 'a.daniel@gmail.com', '0657345196', '6 rue du chène', '2024-12-10', 0),
(3, 'FERROVIER', 'Marion', 'marion.f@gmail.com', '0681569418', '35 rue des Champs-Élysées', '2024-12-23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `idcommande` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `datecommande` date NOT NULL,
  `datelivraison` date NOT NULL,
  `idpointdedepot` int(11) NOT NULL,
  `etat` varchar(50) DEFAULT 'En préparation'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`idcommande`, `idclient`, `datecommande`, `datelivraison`, `idpointdedepot`, `etat`) VALUES
(1, 1, '2025-01-12', '2025-01-19', 1, 'En préparation');

-- --------------------------------------------------------

--
-- Structure de la table `pointsdedepot`
--

CREATE TABLE `pointsdedepot` (
  `idpointdedepot` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` text,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointsdedepot`
--

INSERT INTO `pointsdedepot` (`idpointdedepot`, `nom`, `adresse`, `latitude`, `longitude`) VALUES
(1, 'Mondial Relay Locker', '3 Rue Antoine de Saint-Exupéry, 88100 Saint-Dié-des-Vosges', 48.2913006, 6.9382287),
(2, 'Locker Mondial Relay 24/7 INTERMARCHE', '116 Rue d\'Alsace, 88100 Saint-Dié-des-Vosges', 48.2797027, 6.9590063),
(3, 'LOCKER 24/7 MR BRICOLAGE ST DIE', '5 Rue Antoine de Saint-Exupéry, 88100 Saint-Dié-des-Vosges', 48.2911311, 6.9381149);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idproduit` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `unite` varchar(50) DEFAULT NULL,
  `imageurl` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idproduit`, `nom`, `description`, `unite`, `imageurl`) VALUES
(1, 'Panier Fruits', 'Un panier rempli de l\'équivalent de 1kg de différents fruits', '10', NULL),
(2, 'Panier fermier', 'Un panier remplit de produits locaux et de terroir', '15', NULL),
(3, 'Panier légumes', 'Un panier rempli de différents légumes', '5', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tourneepointsdedepot`
--

CREATE TABLE `tourneepointsdedepot` (
  `idtourneepoint` int(11) NOT NULL,
  `idtournee` int(11) NOT NULL,
  `idpointdedepot` int(11) NOT NULL,
  `ordrelivraison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tourneepointsdedepot`
--

INSERT INTO `tourneepointsdedepot` (`idtourneepoint`, `idtournee`, `idpointdedepot`, `ordrelivraison`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tournees`
--

CREATE TABLE `tournees` (
  `idtournee` int(11) NOT NULL,
  `libelletournee` varchar(50) NOT NULL,
  `jourpreparation` date DEFAULT NULL,
  `jourlivraison` date DEFAULT NULL,
  `couleur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tournees`
--

INSERT INTO `tournees` (`idtournee`, `libelletournee`, `jourpreparation`, `jourlivraison`, `couleur`) VALUES
(1, 'Première tournée', '2025-01-10', '2025-01-11', 'Vert'),
(2, 'test', '2025-01-18', '2025-01-19', 'noir');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`idabonnement`),
  ADD KEY `ClientID` (`idclient`),
  ADD KEY `ProduitID` (`idproduit`);

--
-- Index pour la table `adherence`
--
ALTER TABLE `adherence`
  ADD PRIMARY KEY (`idadherence`),
  ADD KEY `ClientID` (`idclient`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idclient`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`idcommande`),
  ADD KEY `ClientID` (`idclient`),
  ADD KEY `PointDeDepotID` (`idpointdedepot`);

--
-- Index pour la table `pointsdedepot`
--
ALTER TABLE `pointsdedepot`
  ADD PRIMARY KEY (`idpointdedepot`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idproduit`);

--
-- Index pour la table `tourneepointsdedepot`
--
ALTER TABLE `tourneepointsdedepot`
  ADD PRIMARY KEY (`idtourneepoint`),
  ADD KEY `TourneeID` (`idtournee`),
  ADD KEY `PointDeDepotID` (`idpointdedepot`);

--
-- Index pour la table `tournees`
--
ALTER TABLE `tournees`
  ADD PRIMARY KEY (`idtournee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `idabonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `adherence`
--
ALTER TABLE `adherence`
  MODIFY `idadherence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `idcommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pointsdedepot`
--
ALTER TABLE `pointsdedepot`
  MODIFY `idpointdedepot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tourneepointsdedepot`
--
ALTER TABLE `tourneepointsdedepot`
  MODIFY `idtourneepoint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tournees`
--
ALTER TABLE `tournees`
  MODIFY `idtournee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`),
  ADD CONSTRAINT `abonnements_ibfk_2` FOREIGN KEY (`idproduit`) REFERENCES `produits` (`idproduit`);

--
-- Contraintes pour la table `adherence`
--
ALTER TABLE `adherence`
  ADD CONSTRAINT `adherence_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`idpointdedepot`) REFERENCES `pointsdedepot` (`idpointdedepot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tourneepointsdedepot`
--
ALTER TABLE `tourneepointsdedepot`
  ADD CONSTRAINT `tourneepointsdedepot_ibfk_1` FOREIGN KEY (`idtournee`) REFERENCES `tournees` (`idtournee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tourneepointsdedepot_ibfk_2` FOREIGN KEY (`idpointdedepot`) REFERENCES `pointsdedepot` (`idpointdedepot`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
