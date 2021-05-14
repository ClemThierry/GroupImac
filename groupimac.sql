-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 mai 2021 à 03:28
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groupimac`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idComment` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `message` text NOT NULL,
  `dateComment` datetime DEFAULT NULL,
  `RefUser` int(11) DEFAULT NULL,
  `RefProjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `projet_cat`
--

CREATE TABLE `projet_cat` (
  `RefProjet` int(11) NOT NULL,
  `RefCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCat` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `presentation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

INSERT INTO `categorie` (`nomCat`) VALUES 
  ('web'),
  ('programmation'), 
  ('3D'),
  ('jeu vidéo'),
  ('réalité virtuelle'),
  ('multimédia'),
  ('audiovisuel'),
  ('communication');

-- --------------------------------------------------------


--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idProjet` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `presentation` text DEFAULT NULL,
  `datePubli` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `cadre` varchar(50) DEFAULT NULL,
  `RefAuteurProjet` int(11) DEFAULT NULL FOREIGN KEY REFERENCES utilisateur(idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `user_cat`
--

CREATE TABLE `user_cat` (
  `RefUser` int(11) NOT NULL,
  `RefCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL PRIMARY KEY,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `promo` varchar(6) DEFAULT NULL,
  `discord` varchar(100) DEFAULT NULL,
  `presentation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD KEY `fk_auteurCommentaire` (`RefUser`),
  ADD KEY `fk_commentaire_du_projet` (`RefProjet`);

--
-- Index pour la table `projet_cat`
--
ALTER TABLE `projet_cat`
  ADD PRIMARY KEY (`RefProjet`,`RefCat`),
  ADD KEY `fk_cat_projet` (`RefCat`);


--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idProjet`),
  ADD KEY `fk_auteurProjet` (`RefAuteurProjet`);

--
-- Index pour la table `user_cat`
--

ALTER TABLE `user_cat`
  ADD PRIMARY KEY (`RefUser`,`RefCat`),
  ADD KEY `fk_cat_user` (`RefCat`);


--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `pointfort`
--
ALTER TABLE `pointfort`
  MODIFY `idPointFort` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12313;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_auteurCommentaire` FOREIGN KEY (`RefUser`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `fk_commentaire_du_projet` FOREIGN KEY (`RefProjet`) REFERENCES `projet` (`idProjet`);

--
-- Contraintes pour la table `projet_cat`
--
ALTER TABLE `projet_cat`
  ADD CONSTRAINT `fk_projet_cat` FOREIGN KEY (`RefProjet`) REFERENCES `projet` (`idProjet`),
  ADD CONSTRAINT `fk_cat_projet` FOREIGN KEY (`RefCat`) REFERENCES `categorie` (`idCat`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_auteurProjet` FOREIGN KEY (`RefAuteurProjet`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `user_cat`
--
ALTER TABLE `user_cat`
  ADD CONSTRAINT `fk_cat_user` FOREIGN KEY (`RefCat`) REFERENCES `categorie` (`idCat`),
  ADD CONSTRAINT `fk_user_cat` FOREIGN KEY (`RefUser`) REFERENCES `utilisateur` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
