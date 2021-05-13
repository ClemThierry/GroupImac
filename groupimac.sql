-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 02:57
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

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idComment` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateComment` datetime DEFAULT NULL,
  `RefUser` int(11) DEFAULT NULL,
  `RefProjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idComment`, `message`, `dateComment`, `RefUser`, `RefProjet`) VALUES
(16, 'nouveau commentaire', '2021-05-13 01:30:09', 1, 41),
(18, ' ceci est un nouveau commentaire', '2021-05-13 01:30:29', 1, 41),
(20, ' test ?', '2021-05-13 01:30:44', 1, 41);

-- --------------------------------------------------------

--
-- Structure de la table `estdetype`
--

CREATE TABLE `estdetype` (
  `RefProjet` int(11) NOT NULL,
  `RefType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `RefUser` int(11) NOT NULL,
  `RefProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pointfort`
--

CREATE TABLE `pointfort` (
  `idPointFort` int(11) NOT NULL,
  `presentation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idProjet` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `presentation` text DEFAULT NULL,
  `datePubli` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `cadre` varchar(50) DEFAULT NULL,
  `nbreActuel` smallint(6) DEFAULT NULL,
  `nbreMax` smallint(6) NOT NULL,
  `RefAuteurProjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idProjet`, `titre`, `presentation`, `datePubli`, `deadline`, `cadre`, `nbreActuel`, `nbreMax`, `RefAuteurProjet`) VALUES
(41, 'shinzou', 'wo SASAGEYO', '2021-05-13', '2021-04-29', 'scolaire', NULL, 0, NULL),
(42, 'aaaaa', ' etge', '2021-05-13', '2021-05-13', 'personnel', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `revendique`
--

CREATE TABLE `revendique` (
  `RefUser` int(11) NOT NULL,
  `RefPointFort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typeprojet`
--

CREATE TABLE `typeprojet` (
  `idType` int(11) NOT NULL,
  `nom_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeprojet`
--

INSERT INTO `typeprojet` (`idType`, `nom_type`) VALUES
(1, 'scolaire'),
(2, 'personnel'),
(3, 'professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `promo` varchar(6) DEFAULT NULL,
  `discord` varchar(100) DEFAULT NULL,
  `presentation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `promo`, `discord`, `presentation`) VALUES
(1, 'nom', 'prenom', '2023', 'discordo', 'yo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `fk_auteurCommentaire` (`RefUser`),
  ADD KEY `fk_commentaire_du_projet` (`RefProjet`);

--
-- Index pour la table `estdetype`
--
ALTER TABLE `estdetype`
  ADD PRIMARY KEY (`RefProjet`,`RefType`),
  ADD KEY `fk_type_projet` (`RefType`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`RefUser`,`RefProjet`),
  ADD KEY `fk_projet_user` (`RefProjet`);

--
-- Index pour la table `pointfort`
--
ALTER TABLE `pointfort`
  ADD PRIMARY KEY (`idPointFort`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idProjet`),
  ADD KEY `fk_auteurProjet` (`RefAuteurProjet`);

--
-- Index pour la table `revendique`
--
ALTER TABLE `revendique`
  ADD PRIMARY KEY (`RefUser`,`RefPointFort`),
  ADD KEY `fk_pointFort_user` (`RefPointFort`);

--
-- Index pour la table `typeprojet`
--
ALTER TABLE `typeprojet`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `pointfort`
--
ALTER TABLE `pointfort`
  MODIFY `idPointFort` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `typeprojet`
--
ALTER TABLE `typeprojet`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Contraintes pour la table `estdetype`
--
ALTER TABLE `estdetype`
  ADD CONSTRAINT `fk_projet_type` FOREIGN KEY (`RefProjet`) REFERENCES `projet` (`idProjet`),
  ADD CONSTRAINT `fk_type_projet` FOREIGN KEY (`RefType`) REFERENCES `typeprojet` (`idType`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `fk_projet_user` FOREIGN KEY (`RefProjet`) REFERENCES `projet` (`idProjet`),
  ADD CONSTRAINT `fk_user_projet` FOREIGN KEY (`RefUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_auteurProjet` FOREIGN KEY (`RefAuteurProjet`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `revendique`
--
ALTER TABLE `revendique`
  ADD CONSTRAINT `fk_pointFort_user` FOREIGN KEY (`RefPointFort`) REFERENCES `pointfort` (`idPointFort`),
  ADD CONSTRAINT `fk_user_pointFort` FOREIGN KEY (`RefUser`) REFERENCES `utilisateur` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
