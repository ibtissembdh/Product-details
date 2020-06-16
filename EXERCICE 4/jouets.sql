-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 05 Février 2020 à 13:52
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  5.6.38-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `articles`
--

-- --------------------------------------------------------

--
-- Structure de la table `jouets`
--

CREATE TABLE `jouets` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `description` varchar(150) NOT NULL,
  `actif` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jouets`
--

INSERT INTO `jouets` (`id`, `libelle`, `prix`, `description`, `actif`) VALUES
(39, 'smartphone', '40000.00', 'galaxy s4', 'y'),
(43, 'ppp', '252.00', 'hjhjhjh', 'y'),
(44, 'lpdw', '100.00', 'lpdwi', 'y');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jouets`
--
ALTER TABLE `jouets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jouets`
--
ALTER TABLE `jouets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
