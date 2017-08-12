-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  sam. 12 août 2017 à 08:50
-- Version du serveur :  5.6.36
-- Version de PHP :  7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE `billet` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` longtext NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `title`, `content`, `createdAt`, `updatedAt`, `category_id`, `user_id`) VALUES
(1, 'Mon 1er article que je modifie', '<p>Ceci est un premier article</p>', '2017-08-01 20:51:02', '2017-08-05 12:02:02', NULL, NULL),
(2, '2 eme article', '<p>Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they\'re actually proud of that shit.&nbsp;</p>\r\n<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.</p>', '2017-08-01 20:55:17', NULL, NULL, NULL),
(7, '3eme article avant l\'Ã©dition', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non dapibus magna, sed ultrices nisl. Vestibulum semper enim a auctor dictum. Duis imperdiet lacus at maximus tempus. Donec laoreet felis ipsum, non convallis odio laoreet non. Mauris aliquam molestie dui a commodo. Mauris ultricies placerat elit id placerat. Mauris vel est arcu. Proin congue vestibulum lorem, nec viverra mi mollis ut. Ut sed aliquet diam. Nam a scelerisque ante. In accumsan, arcu eu egestas egestas, elit nunc iaculis orci, id lacinia leo dui nec nisi. Praesent dignissim elit non tortor finibus, ac blandit arcu eleifend.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Aliquam in commodo augue, id hendrerit purus. Donec sollicitudin eu lacus et bibendum. Integer vel euismod dui, vel vulputate ipsum. Donec id ligula sed lorem auctor laoreet. Aenean dignissim faucibus luctus. Vivamus cursus auctor cursus. Nulla facilisi. Nullam vel diam laoreet, ultrices lorem mollis, aliquet metus. Nullam suscipit faucibus nulla, ut suscipit turpis tristique vel. Pellentesque risus libero, laoreet ac eros mollis, auctor fermentum leo. Integer odio lectus, condimentum eu ipsum pretium, ultrices porttitor urna.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Donec sit amet molestie diam. Sed accumsan magna lectus, luctus gravida tellus fringilla sit amet. Curabitur erat nunc, elementum non tortor ac, dictum tincidunt lacus. Pellentesque aliquam euismod elementum. Vivamus est nisi, scelerisque nec interdum eu, iaculis a ex. Sed eget accumsan dolor, et rutrum augue. Nam eu vulputate sapien, non malesuada velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc bibendum dolor non velit varius, non suscipit dui dignissim. Duis ut tortor rhoncus, congue lorem dictum, sollicitudin turpis. Sed at ex id mi semper egestas quis sed mauris. Maecenas non dui non magna semper dapibus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Cras lectus sapien, consectetur et enim nec, ultrices porta ante. Nulla facilisi. Integer condimentum ex ut eros aliquam varius. Nunc volutpat sodales justo, quis malesuada augue accumsan nec. Donec commodo neque ligula, eu tincidunt ex molestie sit amet. Ut rhoncus diam sem, vitae aliquet ante ultricies eu. Sed tincidunt magna sed pharetra posuere. Nam eget orci nisl. Pellentesque id rutrum sapien. Integer vitae venenatis dolor. Duis sed metus nisi. Suspendisse potenti. Nulla mi dolor, sollicitudin quis rhoncus quis, sollicitudin quis nisi. Donec fringilla lacus bibendum velit malesuada convallis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nunc ut lacinia ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum sed semper libero. Phasellus consectetur venenatis felis, accumsan pulvinar nulla porta vitae. Sed enim velit, bibendum convallis odio eget, elementum malesuada magna. Ut sit amet elit condimentum erat luctus mollis a in nunc. Cras ultricies enim ut semper fringilla. Nunc rutrum, est non posuere placerat, justo elit tristique metus, in consequat diam quam a tellus.</p>', '2017-08-05 11:22:27', NULL, NULL, NULL),
(8, 'Test', '<p>Ceci est encore un test</p>', '2017-08-05 11:41:08', NULL, NULL, NULL),
(11, 'Est ce que tout fonctionne?', '<p>Et ouii tout le monde va bien</p>', '2017-08-05 12:02:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `billet_id` int(11) DEFAULT NULL,
  `comment` varchar(45) NOT NULL,
  `user_id` int(10) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `commentary_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `billet_id`, `comment`, `user_id`, `createdAt`, `updatedAt`, `commentary_id`) VALUES
(1, 11, 'Cool', 2, '2017-08-11 20:09:09', NULL, NULL),
(2, 11, 'Encore un commentaire?', 2, '2017-08-11 20:17:27', NULL, NULL),
(15, 11, 'Bravo pour les commentaires', 4, '2017-08-11 20:34:13', NULL, NULL),
(16, 7, 'C\'est long et je ne comprends pas le latin', 4, '2017-08-11 20:36:12', NULL, NULL),
(17, 8, 'C\'est gÃ©niale', 4, '2017-08-12 05:57:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'SUPER_ADMIN'),
(2, 'ADMIN'),
(3, 'USER'),
(4, 'USER');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(16) DEFAULT NULL,
  `lastname` varchar(16) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(65) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `updatedAt`, `roles_id`) VALUES
(1, 'Florentin', 'Garnier', 'florentin@digital404.fr', '$2y$10$SbhjrOmpnNM/Q8V.T3JoFuqK3liwpF4ZfS6pzCBb8aYEp47JRxcDe', '2017-07-31 09:04:18', NULL, 1),
(2, 'Garnier', 'Florentin', 'garnier.florentin@gmail.com', '$2y$10$/wgvSKIZFcUFRgvsLGtm7ewnpBb27bmI0vddyx7mADib9A/8n2aIW', '2017-07-31 09:35:21', NULL, 2),
(3, 'Florentin', 'Garnier', 'florentin.garnier@periscopemail.com', '$2y$10$SbhjrOmpnNM/Q8V.T3JoFuqK3liwpF4ZfS6pzCBb8aYEp47JRxcDe', '2017-07-31 14:40:49', NULL, 3),
(4, 'Jean jacques', 'Grount', 'florentin.garnier@me.com', '$2y$10$5.grAtgSGbIZb.TV7OIWF.BQn2oyYYYLy.mmF5q8Zxp1YtAlyDXti', '2017-08-05 09:50:56', NULL, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_category_idx` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_commentary_idx` (`commentary_id`),
  ADD KEY `billet_id_idx` (`billet_id`),
  ADD KEY `fk_commentary_user` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_roles_idx` (`roles_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `fk_billet` FOREIGN KEY (`billet_id`) REFERENCES `billet` (`id`),
  ADD CONSTRAINT `fk_commentary` FOREIGN KEY (`commentary_id`) REFERENCES `commentary` (`id`),
  ADD CONSTRAINT `fk_commentary_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
