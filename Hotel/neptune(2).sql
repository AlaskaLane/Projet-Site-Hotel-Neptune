-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 30 jan. 2023 à 19:30
-- Version du serveur : 5.7.24
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `neptune`
--

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE `password` (
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pswd` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `password`
--

INSERT INTO `password` (`id_user`, `email`, `pswd`, `first_name`, `last_name`) VALUES
(7, 'la@sauveuse.ouat', '$2y$10$gbJXHuUkrzwEuQauNSfthOLjvxaapCzLygxqVvrPKnPJeQVAh6ea2', 'Emma', 'Swan'),
(8, 'mechante@reine.fr', '$2y$10$uw9ASXmsmZrXBxYfRXYrOuu8zOt8UhWXTmMZKQw6gW2yfqkyXoSca', 'Regina', 'Méchante'),
(9, 'crochet@pirate.fr', '$2y$10$nJCEyaRlQEQytVJ7FQFedu5sWSJUWhSZJldV8wohhkNT39Tjef0e2', 'Kilian ', 'Jones'),
(10, 'leplusbo@bond.com', '$2y$10$WO.EdMzoGhqB25CRi43KYOBTR9WcTGvc.y1rXTOH5SzwYbXdSr86y', 'Aaron', 'Johnson'),
(11, 'test@test.com', '$2y$10$Mbw6ALHrxBaCbrOzCGJmbefX4tOKmfYIDhUlXKgSKKdnuubw9jKwa', 'Paul', 'Paul'),
(12, 'moe@willi.fr', '$2y$10$/zPx16FrOJGUSxEqYplnluwbstJc0Oqi7CelJmsm9VKc2GnTbcQEK', 'Moe', 'Williams'),
(13, 'mr.Rob0t@g.mil', '$2y$10$1RdkX0j6lkT/flK6UkxV6.QziXWoqiOEa9/o2JrPlG5/d5HxmmxzG', 'Eliott ', 'Aldersen'),

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `id_carrousel` int(11) NOT NULL,
  `chemin_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `id_carrousel`, `chemin_photo`) VALUES
(1, 1, 'chambre1-1.webp'),
(2, 1, 'chambre1-2.webp'),
(3, 1, 'chambre1-3.webp'),
(4, 2, 'chambre2-1.webp'),
(5, 2, 'chambre2-2.webp'),
(6, 2, 'chambre2-3.webp'),
(7, 3, 'chambre3-1.webp'),
(8, 3, 'chambre3-2.webp'),
(9, 3, 'chambre3-3.webp');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `nbrpers` int(11) NOT NULL DEFAULT '1',
  `trip_start` date NOT NULL,
  `trip_end` date NOT NULL,
  `email_client` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `nbrpers`, `trip_start`, `trip_end`, `email_client`) VALUES
(1, 0, '2022-12-11', '2022-12-27', '0'),
(2, 3, '2022-12-10', '2022-12-10', '0'),
(3, 3, '2022-12-07', '2022-12-07', '0'),
(4, 2, '2022-12-14', '2022-12-16', 'mechante@reine.fr'),
(6, 2, '2025-07-05', '2025-07-11', 'mechante@reine.fr'),
(7, 5, '2024-05-05', '2024-05-25', 'mechante@reine.fr'),
(9, 3, '2022-11-02', '2022-11-10', 'crochet@pirate.fr'),
(10, 2, '2022-09-06', '2022-10-11', 'crochet@pirate.fr'),
(11, 4, '2023-01-01', '2023-01-06', 'crochet@pirate.fr'),
(12, 2, '2022-12-19', '2022-12-21', 'test@test.com'),
(13, 2, '2022-12-17', '2022-12-18', 'test@test.com'),

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `password`
--
ALTER TABLE `password`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
