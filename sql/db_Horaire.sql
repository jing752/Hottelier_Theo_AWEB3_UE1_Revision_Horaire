-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 03 sep. 2026 à 08:34
-- Version du serveur : 10.11.14-MariaDB-0ubuntu0.24.04.1
-- Version de PHP : 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_Horaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `anne_scolaire` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `nom`, `anne_scolaire`) VALUES
(1, '3A', '2025-2026'),
(2, '3B', '2025-2026'),
(3, '4A', '2025-2026'),
(4, '4B', '2025-2026'),
(5, '5A', '2025-2026');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `nom` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `code`, `nom`) VALUES
(1, 'MATH', 'Mathématiques'),
(2, 'FR', 'Français'),
(3, 'HIST', 'Histoire'),
(4, 'GEO', 'Géographie'),
(5, 'ANG', 'Anglais'),
(6, 'SCI', 'Sciences'),
(7, 'INFO', 'Informatique'),
(8, 'EPS', 'Éducation physique');

-- --------------------------------------------------------

--
-- Structure de la table `creneaux`
--

CREATE TABLE `creneaux` (
  `id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `salle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `classe_id`, `cours_id`, `jour`, `heure_debut`, `heure_fin`, `salle`) VALUES
(1, 1, 1, 'lundi', '08:00:00', '09:00:00', 'Salle 101'),
(2, 1, 2, 'lundi', '09:00:00', '10:00:00', 'Salle 101'),
(3, 1, 5, 'lundi', '10:15:00', '11:15:00', 'Salle 203'),
(4, 1, 6, 'lundi', '11:15:00', '12:15:00', 'Labo 1'),
(5, 2, 1, 'lundi', '08:00:00', '09:00:00', 'Salle 102'),
(6, 2, 3, 'lundi', '09:00:00', '10:00:00', 'Salle 102'),
(7, 2, 5, 'lundi', '10:15:00', '11:15:00', 'Salle 204'),
(8, 1, 3, 'mardi', '08:00:00', '09:00:00', 'Salle 101'),
(9, 1, 4, 'mardi', '09:00:00', '10:00:00', 'Salle 101'),
(10, 1, 7, 'mardi', '10:15:00', '11:15:00', 'Salle Info'),
(11, 3, 1, 'mardi', '08:00:00', '09:00:00', 'Salle 301'),
(12, 3, 2, 'mardi', '09:00:00', '10:00:00', 'Salle 301'),
(13, 3, 8, 'mardi', '10:15:00', '11:15:00', 'Gymnase'),
(14, 2, 6, 'mercredi', '08:00:00', '09:00:00', 'Labo 2'),
(15, 2, 2, 'mercredi', '09:00:00', '10:00:00', 'Salle 102'),
(16, 3, 5, 'mercredi', '08:00:00', '09:00:00', 'Salle 302'),
(17, 3, 4, 'mercredi', '09:00:00', '10:00:00', 'Salle 302'),
(18, 1, 1, 'jeudi', '08:00:00', '09:00:00', 'Salle 101'),
(19, 1, 8, 'jeudi', '09:00:00', '10:00:00', 'Gymnase'),
(20, 4, 3, 'jeudi', '08:00:00', '09:00:00', 'Salle 401'),
(21, 4, 6, 'jeudi', '09:00:00', '10:00:00', 'Labo 3'),
(22, 2, 7, 'vendredi', '08:00:00', '09:00:00', 'Salle Info'),
(23, 2, 1, 'vendredi', '09:00:00', '10:00:00', 'Salle 102'),
(24, 3, 2, 'vendredi', '08:00:00', '09:00:00', 'Salle 301'),
(25, 3, 8, 'vendredi', '09:00:00', '10:00:00', 'Gymnase');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `creneaux`
--
ALTER TABLE `creneaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
