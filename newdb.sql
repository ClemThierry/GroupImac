DROP DATABASE IF EXISTS groupimac;

CREATE DATABASE groupimac SET utf8;

CREATE TABLE `utilisateur` (
  `idUser` INT PRIMARY KEY NOT NULL,
  `nom` VARCHAR(30),
  `prenom` VARCHAR(30),
  `mdp` VARCHAR(32) NOT NULL,
  `promo` VARCHAR(6),
  `discord` VARCHAR(100),
  `presentation` TEXT
);

CREATE TABLE `projet` (
  `idProjet` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titre` VARCHAR(30),
  `presentation` TEXT,
  `datePubli` DATE,
  `deadline` DATE,
  `cadre` VARCHAR(50),
  `RefAuteurProjet` INT,
  FOREIGN KEY (RefAuteurProjet) REFERENCES utilisateur(idUser)
);

CREATE TABLE `commentaire` (
  `idComment` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `message` TEXT NOT NULL,
  `dateComment` DATETIME DEFAULT NULL,
  `RefUser` INT DEFAULT NULL,
  `RefProjet` INT DEFAULT NULL,
  FOREIGN KEY (RefUser) REFERENCES utilisateur(idUser),
  FOREIGN KEY (RefProjet) REFERENCES projet(idProjet)
);

CREATE TABLE `categorie` (
  `idCat` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nomCat` VARCHAR(255)
);

CREATE TABLE `projet_cat` (
  `RefProjet` INT NOT NULL,
  `RefCat` INT NOT NULL,
  FOREIGN KEY (RefProjet) REFERENCES projet(idProjet),
  FOREIGN KEY (RefCat) REFERENCES categorie(idCat)
);

CREATE TABLE `user_cat` (
  `RefUser` int(11) NOT NULL,
  `RefCat` int(11) NOT NULL,
  FOREIGN KEY (RefUser) REFERENCES utilisateur(idUser),
  FOREIGN KEY (RefCat) REFERENCES categorie(idCat)
);

INSERT INTO `categorie` (`nomCat`) VALUES 
  ('web'),
  ('programmation'), 
  ('3D'),
  ('jeu vidéo'),
  ('réalité virtuelle'),
  ('multimédia'),
  ('audiovisuel'),
  ('communication');