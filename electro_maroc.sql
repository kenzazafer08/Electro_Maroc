-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 fév. 2023 à 10:54
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `electro_maroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`) VALUES
('kanzazafer@gmail.com', 'kenzazafer08', 'kenza zafer');

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id_client` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom`) VALUES
(1, 'Informatique'),
(2, '\r\nTV-Photo-Video-Audio'),
(3, 'Jeu & Consols'),
(4, 'Smartphones-tablettes'),
(5, 'Instrument Music'),
(6, 'Electromenager');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tele` int(11) NOT NULL,
  `Adress` text NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `Nom`, `email`, `tele`, `Adress`, `password`) VALUES
(1, 'ZAFER', 'kanzazafer@gmail.com', 634047964, '70 RUE ELOUMAM QU HOPITAL SAFI', 'kenzazafer08'),
(2, 'kenza', 'kanzazafer@gmail.com', 634047964, '70 RUE ELOUMAM SAFI', 'kenzazafer08');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `etas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`date_creation`, `id_order`, `id_client`, `etas`) VALUES
('2023-02-07 11:37:14', 110, 1, 1),
('2023-02-07 10:43:52', 109, 1, 0),
('2023-02-07 10:40:28', 108, 1, 1),
('2023-02-07 10:29:45', 107, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Pdelete` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `prix`, `description`, `id_categorie`, `image`, `Pdelete`) VALUES
(7, 'Trottinette', 8369, 'SEGWAY KICKSCOOTER G30LE', 3, 'test.jpg', 1),
(8, 'Souris Gamer', 349, 'ENERGY SISTEM SOURIS GAMER ESG M5 TRIFORCE\r\n', 6, 'sourie.webp', 1),
(9, 'TÃ©lÃ©viseurs', 7499, 'HAIER LED H65K660UG PLUS', 2, 'TV.webp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

DROP TABLE IF EXISTS `produit_commande`;
CREATE TABLE IF NOT EXISTS `produit_commande` (
  `quantity` int(255) DEFAULT NULL,
  `prix_pc` int(255) DEFAULT NULL,
  `id_commande` int(255) DEFAULT NULL,
  `id_produit` int(255) DEFAULT NULL,
  KEY `commande` (`id_commande`),
  KEY `produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit_commande`
--

INSERT INTO `produit_commande` (`quantity`, `prix_pc`, `id_commande`, `id_produit`) VALUES
(1, 349, 107, 8),
(1, 7499, 107, 9),
(3, 8369, 108, 7),
(3, 7499, 108, 9),
(1, 8369, 109, 7),
(3, 1047, 110, 8),
(2, 16738, 110, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
