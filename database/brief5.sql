-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 mai 2021 à 19:24
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brief5`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `datec` date NOT NULL,
  `heure_cour` varchar(50) NOT NULL,
  `id_ensg` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `datec`, `heure_cour`, `id_ensg`, `id_salle`, `id_grp`) VALUES
(26, '2021-05-07', '10:00-12:00', 8, 1, 4),
(32, '2021-05-20', '08:00-10:00', 7, 2, 4),
(37, '2021-05-18', '16:00-18:00', 7, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `idmtr` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `idmtr`, `iduser`) VALUES
(7, 1, 14),
(8, 4, 16),
(9, 7, 18);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(4) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `effectif` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `libelle`, `effectif`) VALUES
(4, 'groupe2', 27),
(6, 'groupe 3', 23),
(10, 'groupe1', 30);

-- --------------------------------------------------------

--
-- Structure de la table `matiers`
--

CREATE TABLE `matiers` (
  `id` int(4) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiers`
--

INSERT INTO `matiers` (`id`, `libelle`) VALUES
(1, 'français'),
(2, 'arabe'),
(3, 'anglais'),
(4, 'Math'),
(6, 'SVT'),
(7, 'physique');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id` int(4) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `capacite` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `libelle`, `capacite`) VALUES
(1, 'salle 1', 45),
(2, 'salle 2', 30),
(3, 'salle 3', 50),
(4, 'salle 4', 45),
(7, 'salle 6', 60),
(8, 'salle 5', 25);

-- --------------------------------------------------------

--
-- Structure de la table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(4) NOT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passwrd` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL CHECK (`role` in ('admin','user'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tuser`
--

INSERT INTO `tuser` (`id`, `First_name`, `Last_name`, `email`, `passwrd`, `role`) VALUES
(1, 'Amal', 'Mtahri', 'mtahriamal0@gmail.com', '123', 'admin'),
(14, 'prof1', 'prof1', 'prof1@gmail.com', '123', 'user'),
(16, 'prof2', 'prof2', 'prof2@gmail.com', '123', 'user'),
(18, 'prof4', 'prof4', 'prof4@gmail.com', '123', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ens` (`id_ensg`),
  ADD KEY `id_grp` (`id_grp`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mtr` (`idmtr`),
  ADD KEY `id_us` (`iduser`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiers`
--
ALTER TABLE `matiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `matiers`
--
ALTER TABLE `matiers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `id_ens` FOREIGN KEY (`id_ensg`) REFERENCES `enseignant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_grp` FOREIGN KEY (`id_grp`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_salle` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `id_mtr` FOREIGN KEY (`idmtr`) REFERENCES `matiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_us` FOREIGN KEY (`iduser`) REFERENCES `tuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
