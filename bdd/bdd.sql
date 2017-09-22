-- Client :  localhost:8889
-- Généré le :  Ven 22 Septembre 2017 à 13:35
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `photos_td`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `catId` int(5) NOT NULL,
  `nomCat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`catId`, `nomCat`) VALUES
(1, 'Animaux'),
(2, 'Repas'),
(3, 'Monuments');

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
  `photoId` int(5) NOT NULL,
  `nomFich` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `catId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Photo`
--

INSERT INTO `Photo` (`photoId`, `nomFich`, `description`, `catId`) VALUES
(1, 'DSC00011.jpg', 'Une perruche en cage', 1),
(2, 'DSC01212.jpg', 'Un chien en laisse', 1),
(3, 'DSC01422.jpg', 'Un canard dans l\'eau', 1),
(4, 'DSC01446.jpg', 'Une chèvre dans un pré', 1),
(5, 'DSC01040.jpg', 'Un plateau télé', 2),
(6, 'DSC01280.jpg', 'Quelque chose de sculpté', 3),
(7, 'DSC01436.jpg', 'Un monument lointain', 3),
(8, 'DSC01464.jpg', 'Un monument très très loin', 3),
(9, 'DSC02764.jpg', 'Un monument vu d\'en bas', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`catId`);

--
-- Index pour la table `Photo`
--
ALTER TABLE `Photo`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `fk_catId` (`catId`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `catId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
  MODIFY `photoId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `fk_catId` FOREIGN KEY (`catId`) REFERENCES `Categorie` (`catId`);
