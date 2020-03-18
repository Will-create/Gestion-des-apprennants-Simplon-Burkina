-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 12 mars 2020 à 16:06
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_simplon`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenants`
--

CREATE TABLE `apprenants` (
  `id_apprenant` int(11) NOT NULL,
  `id_tuteur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `date_naiss` datetime DEFAULT NULL,
  `genre` varchar(20) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `formation` varchar(50) DEFAULT NULL,
  `etabliss` varchar(50) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apprenants`
--

INSERT INTO `apprenants` (`id_apprenant`, `id_tuteur`, `nom`, `prenom`, `date_naiss`, `genre`, `ville`, `formation`, `etabliss`, `contact`, `photo`) VALUES
(1, 5, 'Saba', 'Emilie', '2020-03-02 00:00:00', 'Femme', 'Ouagadougou', 'Psycho', 'UO', 135625865, NULL),
(2, 5, 'TIENDREBEOGO', 'Rachidatou', '2020-03-16 00:00:00', 'Femme', 'bobo', 'Maths', 'madina', 56, NULL),
(3, 6, 'SANOU', 'Edwige', '2020-03-09 00:00:00', 'Femme', 'Banfora', 'journalisme', 'reveil', 133455565, NULL),
(4, 6, 'Ki', 'issa', '2020-03-25 00:00:00', 'Masculin', 'kaya', 'journalisme', 'reveil', 1225566, NULL),
(5, 5, 'DESSE', 'Félicité', '2020-03-08 00:00:00', 'Femme', 'Bangui', 'WEB', 'UCAO', 564456, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tuteurs`
--

CREATE TABLE `tuteurs` (
  `id_tuteur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `genre` varchar(10) NOT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tuteurs`
--

INSERT INTO `tuteurs` (`id_tuteur`, `nom`, `prenom`, `profession`, `genre`, `contact`) VALUES
(5, 'nabaloum', 'Louis', 'Voleur', '', 1236545896),
(6, 'OUEDRAOGO', 'Ousseni', 'Voleur', '', 56324523),
(7, 'Beogo', 'Aristide', 'Etudiant', '', 65),
(8, 'tyghju', 'yèuikç', 'uiuiolç', '', 5845285);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id_apprenant`),
  ADD KEY `FK_Association_1` (`id_tuteur`);

--
-- Index pour la table `tuteurs`
--
ALTER TABLE `tuteurs`
  ADD PRIMARY KEY (`id_tuteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id_apprenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tuteurs`
--
ALTER TABLE `tuteurs`
  MODIFY `id_tuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`id_tuteur`) REFERENCES `tuteurs` (`id_tuteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
