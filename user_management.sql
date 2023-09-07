-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 juil. 2023 à 05:03
-- Version du serveur : 10.6.12-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u256533777_framework`
--

-- --------------------------------------------------------

--
-- Structure de la table `user_management`
--

CREATE TABLE `user_management` (
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `img_site` tinyint(1) NOT NULL,
  `cle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user_management`
--

INSERT INTO `user_management` (`login`, `password`, `mail`, `role`, `image`, `img_site`, `cle`) VALUES
('admin', '$2y$10$.e37igGSgvsHDyuqHAngNurdRpPy6cMPOxIYH1nD.UVgLVnqPjNpS', 'admin@admin.com', 'administrateur', 'profils/profils_site/flamme.jpg', 1, 932145),
('test', '$2y$10$HAO8UXufjQiEBSFkD9zrc.rdd3R23pU01eoeCNrTvq/VFQb5VLs82', 'test@test.com', 'utilisateur', 'profils/profils_site/chien2.jpg', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
