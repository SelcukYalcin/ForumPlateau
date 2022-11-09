-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6563
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour bdd_forum
CREATE DATABASE IF NOT EXISTS `bdd_forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdd_forum`;

-- Listage de la structure de table bdd_forum. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bdd_forum.categorie : ~2 rows (environ)
INSERT INTO `categorie` (`id_categorie`, `libelle`) VALUES
	(1, 'sport'),
	(2, 'cinema');

-- Listage de la structure de table bdd_forum. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datePost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bdd_forum.post : ~8 rows (environ)
INSERT INTO `post` (`id_post`, `texte`, `datePost`, `user_id`, `topic_id`) VALUES
	(1, 'Mercredi soir, le PSG est allé chercher un succès prestigieux sur la pelouse de la Juventus (2-1) avec un Kylian Mbappé buteur, ce qui n\'a pas empêché la déception de terminer deuxième de la poule, doublé in extremis par Benfica. Un Kylian Mbappé qui a néanmoins profité de la soirée pour afficher sa proximité avec un crack du camp d\'en face.', '2022-11-04 11:40:45', 1, 1),
	(2, 'Le PSG va encore pleurer en Ligue des champions', '2022-11-04 11:42:52', 1, 1),
	(3, 'La Ligue des champions de l\'UEFA, parfois abrégée en C1 et anciennement dénommée Coupe des clubs champions européens, est une compétition annuelle de football organisée par l\'Union des associations européennes de football et regroupant les meilleurs clubs du continent européen', '2022-11-04 11:44:19', 1, 2),
	(4, 'Après leur première défaite de la saison en Championnat, Nantes tombe à Barcelone en Ligue des champions', '2022-11-04 11:46:40', 1, 2),
	(5, 'Dans l\'ancien Kahndaq, Teth Adam a reçu les pouvoirs tout-puissants des dieux. Après avoir utilisé ces pouvoirs pour se venger, il a été emprisonné, devenant Black Adam. Près de 5 000 ans se sont écoulés et Black Adam est passé de l\'homme au mythe puis à la légende.', '2022-11-04 11:51:03', 2, 3),
	(6, 'Un très bon film, j\'ai grandi avec les Comics j\'y retrouve l\'état d\'esprit que j\'y trouvais.\r\nAprès, effectivement, on est loin du wokisme actuel .. Et ça fait ÉNORMÉMENT de bien... 👍👍', '2022-11-04 11:52:23', 2, 3),
	(7, 'La reine Ramonda, Shuri, M\'Baku, Okoye et la Dora Milaje se battent pour protéger leur nation des puissances mondiales intervenantes à la suite de la mort du roi T\'Challa', '2022-11-04 11:53:33', 2, 4),
	(8, 'BLACK PANTHER: WAKANDA FOREVER. Sortie le 09 novembre 2022. Action, Aventure, Fantastique (2h41). De Ryan Coogler. Avec Letitia Wright, Lupita Nyong\'o, ...', '2022-11-04 11:55:19', 2, 4);

-- Listage de la structure de table bdd_forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `categorie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateTopic` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `closed` tinyint DEFAULT '0',
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `categorie_id` (`categorie_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_topic_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_topic_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bdd_forum.topic : ~4 rows (environ)
INSERT INTO `topic` (`id_topic`, `categorie_id`, `user_id`, `title`, `dateTopic`, `closed`) VALUES
	(1, 1, 1, 'psg', '2022-11-04 11:32:12', 0),
	(2, 1, 1, 'champions league', '2022-11-04 11:34:25', 0),
	(3, 2, 1, 'Black Adam', '2022-11-04 11:37:08', 0),
	(4, 2, 1, 'Black Panther: Wakanda Forever', '2022-11-04 11:38:17', 0);

-- Listage de la structure de table bdd_forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bdd_forum.user : ~2 rows (environ)
INSERT INTO `user` (`id_user`, `nickname`, `email`, `password`, `role`, `dateInscription`) VALUES
	(1, 'sly', 'yalcinselcuk79@gmail.com', '070879', 'admin', '2022-11-04 11:30:57'),
	(2, 'azer', 'yalcinselcuk79@gmail.com', '1979', 'auteur', '2022-11-04 11:50:01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
