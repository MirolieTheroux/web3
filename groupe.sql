-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 29 Août 2023 à 21:28
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `groupe_de_musique`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

  CREATE TABLE `groupe` (
    `id` int(11) NOT NULL,
    `nom` varchar(255) NOT NULL,
    `nb_personnes` int(11) NOT NULL,
    `genre` varchar(50) NOT NULL,
    `img` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  --
  -- Contenu de la table `groupe`
  --

  INSERT INTO `groupe` (`id`, `nom`, `nb_personnes`, `genre`, `img`) VALUES
  (1, 'Twenty One Pilots', 2, 'Rock Alternatif', 'https://media.nrj.fr/1900x1200/2016/09/twenty-one-pilots_778.jpg'),
  (2, 'boygenius', 3, 'Indie', 'https://www.rollingstone.com/wp-content/uploads/2023/01/boygeniusfinal4-copy_127.jpg?w=1024'),
  (3, 'AJR', 3, 'Indie pop', 'https://i.scdn.co/image/ab6761610000e5ebd0f8fb5691ea660889d10eb1'),
  (4, 'Bon Iver', 6, 'Rock Folk', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Bon_Iver%40Stockholm.jpg/1280px-Bon_Iver%40Stockholm.jpg');

  --
  -- Index pour les tables exportées
  --

  --
  -- Index pour la table `groupe`
  --
  ALTER TABLE `groupe`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT pour les tables exportées
  --

  --
  -- AUTO_INCREMENT pour la table `groupe`
  --
  ALTER TABLE `groupe`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
