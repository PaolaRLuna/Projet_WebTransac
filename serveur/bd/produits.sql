-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 sep. 2023 à 19:44
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `IdP` int(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `ingredients` varchar(500) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `quantite` int(4) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`IdP`, `nom`, `categorie`, `ingredients`, `prix`, `quantite`, `photo`) VALUES
(1, 'Tagliatelles fraîches aux épinards', 'pate', 'Semoule de blé dur non-blanchie, semoule durum, épinards frais, oeufs frais.', 4.5, 350, 'tagliatelle.jpg'),
(2, 'Gnocchi di patate duri frais', 'pate', 'Farine enrichie, fécule de pomme de terre, pommes de terre, sel.', 5.25, 500, 'gnocchi.jpg'),
(3, 'Feuilles de lasagne fraîches (12)', 'pate', 'Semoule de blé dur non blanchie, oeufs.', 4.75, 360, 'lasagne.jpg'),
(4, 'Pesto génois', 'sauce', 'Huile d\'olive extra vierge pressée à froid, huile de tournesol, basilic, jus de citron, fromage parmesan (lait), persil frais, ail frais, noix de Grenoble, sel de mer, noix de pin, poivre noir. ', 8, 180, 'pesto.jpg'),
(5, 'Sauce rosée', 'sauce', 'Tomates en conserve (tomates cueillies à la main à maturité, sel, acide citrique de source naturelle), crème, oignons, parmesan, ail, huile de canola, beurre, fines herbes, fécule de maïs, sel, poivre.', 5.25, 400, 'rose.jpg'),
(6, 'Sauce tomate à l\'ail et au basilic', 'sauce', 'Tomates en conserve (tomates cueillies à la main à maturité, sel, acide citrique de source naturelle), oignons, ail, huile de canola, fines herbes, sel, poivre.', 5.5, 400, 'tomate.jpg'),
(7, 'Parmesan', 'fromage', 'Lait pasteurisé, crème, protéines de lait concentré, sel, culture bactérienne, chlorure de calcium, lipase, enzyme microbienne. M.G. : 28 %. Humidité : 32 %.', 7, 200, 'parmesan.jpg'),
(8, 'Fromage de chèvre à tartiner', 'fromage', 'Lait de chèvre, culture bactérienne, sel, présure, ciboulette.', 7.25, 175, 'chevre.jpg'),
(9, 'Cheddar doux', 'fromage', 'Lait pasteurisé, concentré protéique de lait, crème, sel, chlorure de calcium, culture bactérienne, enzyme microbienne. M.G. : 31 %. Humidité : 39 %.', 10.75, 400, 'cheddar.jpg'),
(10, 'Lasagne italienne (pour 2)', 'pret-a-manger', 'Boeuf et porc haché, saucisses italiennes (porc, chapelure de blé, sel, épices, substances laitières, sucre, acide ascorbique, ail), pâtes alimentaires (semoule de blé, oeufs entiers, eau), tomates, poivrons, oignons, céleri, huile végétale,  mozzarella (lait partiellement écrémé, culture bactérienne, enzymes microbiennes, chlorure de calcium, cellulose), ail, champignons, jalapenos, épices.', 15, 900, 'lasagne_pam.jpg'),
(11, 'Linguine sauce tomate et basilic', 'pret-a-manger', 'Linguine (semoule de blé dur, niacine, sulfate ferreux, acide folique), sauce tomate (tomates biologiques, eau, sucre, amidon de maïs modifié, ail déshydraté, acide citrique), basilic frais haché, huile d\'olive, sel, poivre.', 7.75, 250, 'linguine_pam.jpg'),
(12, 'Macaroni au fromage', 'pret-a-manger', 'Pâtes alimentaires (semoule de blé dur, eau), parmesan (lait pasteurisé, crème, sel, enzyme microbienne, culture bactérienne), fromage Fontina (lait pasteurisé, sel, culture bactérienne, enzyme microbienne, chlorure de calcium), cheddar (chlorure de calcium, rocou (colorant)), tomates, oignons, huile d\'olive, ail.', 7.25, 365, 'macaroni_pam.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`IdP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `IdP` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
