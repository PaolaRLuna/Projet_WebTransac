-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 04:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdboutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(40) NOT NULL,
  `mot de passe` varchar(20) NOT NULL,
  `rôle` varchar(20) NOT NULL,
  `statut` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`idm`, `courriel`, `mot de passe`, `rôle`, `statut`) VALUES
(1, 'e2296787@cmaisonneuve.qc.ca', '123', 'A', 'A'),
(2, 'e2296702@cmaisonneuve.qc.ca', '456', 'M', 'A'),
(3, 'e2296507@cmaisonneuve.qc.ca', '789', 'E', 'A'),
(4, 'e2296777@cmaisonneuve.qc.ca', '321', 'M', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `idm` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prénom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date de naissance` date NOT NULL,
  `photo` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`idm`, `nom`, `prénom`, `courriel`, `sexe`, `date de naissance`, `photo`) VALUES
(1, 'Reyes', 'Paola', 'e2296787@cmaisonneuve.qc.ca', 'F', '1987-11-02', 'avatar-membre-f.png'),
(2, 'Guerram', 'Houssam', 'e2296702@cmaisonneuve.qc.ca', 'M', '1984-12-14', 'avatar-membre-m.png'),
(3, 'Bertrand', 'Cassandre', 'e2296507@cmaisonneuve.qc.ca', 'F', '1991-01-15', 'avatar-membre-f.png'),
(4, 'Massina', 'Adam', 'e2296777@cmaisonneuve.qc.ca', 'M', '1993-09-01', 'avatar-membre-m.png');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
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
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`IdP`, `nom`, `categorie`, `ingredients`, `prix`, `quantite`, `photo`) VALUES
(1, 'Tagliatelles fraîches aux épinards', 'pâtes alimentaires', 'Semoule de blé dur non-blanchie, semoule durum, épinards frais, oeufs frais.', 4.5, 350, 'tagliatelle.jpg'),
(2, 'Gnocchi di patate duri frais', 'pâtes alimentaires', 'Farine enrichie, fécule de pomme de terre, pommes de terre, sel.', 5.25, 500, 'gnocchi.jpg'),
(3, 'Feuilles de lasagne fraîches (12)', 'pâtes alimentaires', 'Semoule de blé dur non blanchie, oeufs.', 4.75, 360, 'lasagne.jpg'),
(4, 'Pesto génois', 'sauce', 'Huile d\'olive extra vierge pressée à froid, huile de tournesol, basilic, jus de citron, fromage parmesan (lait), persil frais, ail frais, noix de Grenoble, sel de mer, noix de pin, poivre noir. ', 8, 180, 'pesto.jpg'),
(5, 'Sauce rosée', 'sauce', 'Tomates en conserve (tomates cueillies à la main à maturité, sel, acide citrique de source naturelle), crème, oignons, parmesan, ail, huile de canola, beurre, fines herbes, fécule de maïs, sel, poivre.', 5.25, 400, 'rose.jpg'),
(6, 'Sauce tomate à l\'ail et au basilic', 'sauce', 'Tomates en conserve (tomates cueillies à la main à maturité, sel, acide citrique de source naturelle), oignons, ail, huile de canola, fines herbes, sel, poivre.', 5.5, 400, 'tomate.jpg'),
(7, 'Parmesan', 'fromage', 'Lait pasteurisé, crème, protéines de lait concentré, sel, culture bactérienne, chlorure de calcium, lipase, enzyme microbienne. M.G. : 28 %. Humidité : 32 %.', 7, 200, 'parmesan.jpg'),
(8, 'Fromage de chèvre à tartiner', 'fromage', 'Lait de chèvre, culture bactérienne, sel, présure, ciboulette.', 7.25, 175, 'chevre.jpg'),
(9, 'Cheddar doux', 'fromage', 'Lait pasteurisé, concentré protéique de lait, crème, sel, chlorure de calcium, culture bactérienne, enzyme microbienne. M.G. : 31 %. Humidité : 39 %.', 10.75, 400, 'cheddar.jpg'),
(10, 'Lasagne italienne (pour 2)', 'prêt-à-manger', 'Boeuf et porc haché, saucisses italiennes (porc, chapelure de blé, sel, épices, substances laitières, sucre, acide ascorbique, ail), pâtes alimentaires (semoule de blé, oeufs entiers, eau), tomates, poivrons, oignons, céleri, huile végétale,  mozzarella (lait partiellement écrémé, culture bactérienne, enzymes microbiennes, chlorure de calcium, cellulose), ail, champignons, jalapenos, épices.', 15, 900, 'lasagne_pam.jpg'),
(11, 'Linguine sauce tomate et basilic', 'prêt-à-manger', 'Linguine (semoule de blé dur, niacine, sulfate ferreux, acide folique), sauce tomate (tomates biologiques, eau, sucre, amidon de maïs modifié, ail déshydraté, acide citrique), basilic frais haché, huile d\'olive, sel, poivre.', 7.75, 250, 'linguine_pam.jpg'),
(12, 'Macaroni au fromage', 'prêt-à-manger', 'Pâtes alimentaires (semoule de blé dur, eau), parmesan (lait pasteurisé, crème, sel, enzyme microbienne, culture bactérienne), fromage Fontina (lait pasteurisé, sel, culture bactérienne, enzyme microbienne, chlorure de calcium), cheddar (chlorure de calcium, rocou (colorant)), tomates, oignons, huile d\'olive, ail.', 7.25, 365, 'macaroni_pam.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `connexion_idm_FK` (`idm`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`IdP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `IdP` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
