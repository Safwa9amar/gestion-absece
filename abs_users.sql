-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 déc. 2021 à 10:58
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abs_users`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `abs_id` int(11) NOT NULL,
  `etudant_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `date_abs` date NOT NULL,
  `time_abs` time NOT NULL,
  `justification` enum('oui','non') NOT NULL,
  `type_justification` enum('maladie',' mort',' rdv_médecin',' urg_familiale','s_militaire','justifier') NOT NULL,
  `periode` set('TD','TP','Cours','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`abs_id`, `etudant_id`, `mod_id`, `date_abs`, `time_abs`, `justification`, `type_justification`, `periode`) VALUES
(1, 6, 50, '2021-06-14', '11:30:00', 'oui', '', 'Cours'),
(2, 6, 62, '2021-06-14', '14:50:00', 'oui', '', 'TP'),
(3, 3, 62, '2021-06-14', '19:49:00', 'oui', '', 'Cours'),
(4, 1, 9, '2021-06-14', '20:52:00', 'oui', '', 'Cours'),
(5, 4, 10, '2021-06-14', '20:54:00', 'oui', '', 'TD'),
(6, 4, 45, '2021-06-14', '23:05:00', 'oui', '', 'TP'),
(7, 6, 19, '2021-10-14', '03:24:00', 'non', '', 'TP'),
(8, 2, 19, '2021-06-19', '03:42:00', 'non', '', 'Cours'),
(9, 9, 19, '2021-06-19', '11:31:00', 'non', '', 'TP');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `num_inscription` bigint(11) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_naiss` date NOT NULL,
  `faculte` varchar(150) NOT NULL,
  `departement` varchar(150) NOT NULL,
  `specialite` varchar(150) NOT NULL,
  `grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `num_inscription`, `pwd`, `nom`, `prenom`, `gender`, `date_naiss`, `faculte`, `departement`, `specialite`, `grp`) VALUES
(1, 255588888, '23585', 'bekhti', 'aissazer', 'female', '1997-03-22', 'D_info', 'si', '5', 0),
(2, 9988585, '55363', 'abddaim', 'yassmin', 'female', '2021-05-20', '', 'D_info', 'si', 2),
(3, 1859816, '5125', 'bensaad', 'walid', 'male', '2021-07-15', '', 'D_info', 'isil', 3),
(4, 3585546, '215355', 'habibi', 'abdelaali', 'male', '2021-03-22', '', 'D_info', 'si', 2),
(5, 896558, '78456', 'boukricha', 'nordine', 'male', '2020-12-27', '', 'D_info', 'isil', 1),
(6, 638956, '4788965', 'hassani', 'ilyes', 'male', '2021-05-09', 'D_info', 'si', '5', 0),
(7, 78548965, '4585110', 'boutkhil', 'mohammed', 'male', '0000-00-00', '', 'D_info', 'si', 5),
(8, 1203262, '00147', 'fahmi ', 'imen', 'female', '2021-04-01', '', 'D_info', 'isil', 1),
(9, 99872, '321456', 'mokhtari', 'laardj', 'male', '2021-02-22', '', 'D_info', 'isil', 3),
(10, 12789369, '999878', 'blaarbi', 'zoubir', 'male', '2021-04-11', '', 'D_info', 'isil', 5),
(11, 111111, '33333', 'salhi', 'laalya ', 'female', '2020-09-09', '', 'D_info', 'si', 4),
(12, 122452, '002210', 'tou', 'manar', 'female', '2019-11-12', '', 'D_info', 'isil', 2),
(13, 65352653, '4455454', 'gharabi ', 'ilyas ', 'male', '2021-05-23', '', 'D_info', 'si', 4),
(14, 9989799, '8889889', 'kendil', 'kawther', 'female', '0000-00-00', '', 'D_info', 'si', 5),
(15, 59599, '6654878', 'sahli', 'riad', 'male', '2021-06-21', 'D_info', 'isil', '3', 0),
(16, 98965, '65232', 'madjrouni', 'mansour', 'male', '2021-06-14', '', 'D_info', 'si', 0),
(17, 656565, '32356', 'amina', 'allaoui', 'female', '2021-06-14', '', 'D_info', 'si', 2),
(18, 323365, '98623', 'azzaoui', 'djamel', 'male', '2021-03-08', '', 'D_info', 'isil', 0),
(19, 98565, '64565', 'linda', 'ghondsi', 'male', '2021-06-14', 'D_info', 'D_info', '', 2),
(20, 989856, '656565', 'semmani', 'fouzia', 'female', '2010-03-02', '', 'D_info', '', 2),
(22, 9, 'shapoip', 'hamza', 'hassani', 'female', '1983-09-28', 'science de la nature et de vie', 'science biologie', 'ISIL', 4),
(23, 23585, 'pwd', 'habibi', 'abdelkarim', 'male', '2021-11-30', 'science de la nature et de vie', 'snv', '2EME', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etud_mod`
--

CREATE TABLE `etud_mod` (
  `etudiant_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etud_mod`
--

INSERT INTO `etud_mod` (`etudiant_id`, `mod_id`) VALUES
(1, 9),
(2, 9),
(2, 62),
(3, 62),
(4, 62),
(5, 62),
(6, 62),
(8, 62),
(10, 62),
(11, 62),
(9, 62),
(12, 62),
(13, 62),
(14, 62),
(15, 62),
(7, 62),
(16, 62),
(17, 62),
(18, 62),
(19, 62),
(20, 62),
(1, 62),
(22, 62),
(23, 62),
(4, 10),
(3, 10),
(5, 10),
(6, 51),
(3, 51),
(4, 51),
(5, 51),
(10, 51),
(9, 51),
(1, 51),
(8, 51),
(12, 51),
(7, 51),
(14, 51),
(16, 51),
(2, 45),
(3, 45),
(4, 45),
(5, 45),
(6, 45),
(9, 45),
(13, 50),
(16, 50),
(18, 50),
(20, 50),
(1, 19),
(2, 19),
(3, 19),
(4, 19),
(5, 19),
(6, 19),
(8, 19),
(9, 19),
(10, 19),
(11, 19);

-- --------------------------------------------------------

--
-- Structure de la table `etud_speç`
--

CREATE TABLE `etud_speç` (
  `etudant_id` int(11) NOT NULL,
  `specialte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nom_mod` varchar(150) NOT NULL,
  `unite` varchar(150) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nom_mod`, `unite`, `semester`) VALUES
(3, 'Langue Anglaise 2', '', 3),
(4, 'Logique mathématique', '', 3),
(5, 'Méthodes numériques', '', 3),
(6, 'Théories des graphes', '', 3),
(7, 'Systèmes d’information', '', 3),
(8, 'Algorithmique et structure de données', '', 3),
(9, 'Architecture des ordinateurs', '', 3),
(10, 'Aspects Juridiques et économiques du Logiciel', '', 4),
(11, 'Langue Anglaise 3', '', 4),
(12, 'Programmation Orientée Objet', '', 4),
(13, 'Réseaux de communication', '', 4),
(14, 'Bases de Données', '', 4),
(15, 'système d’exploitation 1', '', 4),
(16, 'Théorie des langages', '', 4),
(17, 'Théories des graphes', '', 4),
(19, 'algebre1', '', 1),
(20, 'algorithmique', '', 1),
(21, 'analyse', '', 1),
(22, 'electronique des composants et systemes', '', 1),
(23, 'mécanique du point', '', 1),
(24, 'structure machine 1', '', 1),
(25, 'terminologie scientifique et expresion ecrite', '', 1),
(26, 'analyse 2', '', 2),
(27, 'algebre 2', '', 2),
(28, 'algorithme et structure des donnes 2', '', 2),
(29, 'structure machine2', '', 2),
(30, 'introduction aux probabilité et statistique descriptive', '', 2),
(31, 'technologie de information et de la comminucation', '', 2),
(32, 'outil de programmation pour les mathematiques', '', 2),
(33, 'phisique2', '', 2),
(34, 'systeme d\'information', '', 5),
(35, 'systeme d\'aide a la decision', '', 5),
(36, 'genie logiciel', '', 5),
(37, 'interface homme machine', '', 5),
(38, 'administration des systemes d\'informations', '', 5),
(39, 'programmation avancée pour le web', '', 5),
(40, 'economie numerique stratégique', '', 5),
(41, 'recherche d\'information', '', 6),
(42, 'sécurité informatique', '', 6),
(43, 'données semi structurées', '', 6),
(44, 'projet', '', 6),
(45, 'bussiness intelegence', '', 6),
(46, 'redaction scientifique', '', 6),
(47, 'systeme exploitation2', '', 6),
(48, 'systeme exploitation 2', '', 5),
(50, 'compilation', '', 5),
(51, 'programmation linéaire', '', 5),
(52, 'probabilité et statistique', '', 5),
(53, 'application mobiles', '', 6),
(54, 'créé et develloper un startupe', '', 6),
(55, 'intellegence arteficiele', '', 6),
(56, 'base de données avencée 2', '', 7),
(57, 'compilation2', '', 7),
(58, 'algorithem et comlexité', '', 7),
(59, 'théorie dde l\'information et du codage', '', 7),
(60, 'modélisation et simulation', '', 7),
(61, 'apperentissage automatique', '', 7),
(62, 'anglais', '', 7),
(63, 'latex', '', 7),
(64, 'sécurité et cryptographie appliquées', '', 8),
(65, 'susteme d\'information avencés', '', 8),
(66, 'datamining', '', 8),
(67, 'réseaux et systemes répartis', '', 8),
(68, 'spécification formelles', '', 8),
(69, 'aide a la décision', '', 8),
(70, 'inteligence artificielle', '', 8),
(71, 'anglais2', '', 8),
(72, 'service web et sécurité', '', 9),
(73, 'entrepots de donnée', '', 9),
(74, 'processus métier et workflow', '', 9),
(75, 'réseaux avancé', '', 9),
(77, 'administration et sécurité des de bases de données réparties', '', 9),
(78, 'management des systémes d\'information ', '', 9),
(79, 'entrepreneuriat', '', 9),
(80, 'technologie des réseaux sans fil', '', 9),
(81, 'routage dans les réseaux informatique', '', 9),
(82, 'programmation parallél', '', 9),
(83, 'web sécurisé', '', 9),
(84, 'initiation a la recherche', '', 9),
(85, 'sécurité des applications mobile ', '', 9),
(86, 'biométrie', '', 9),
(87, 'analyse des réseaux sociaux ', '', 9),
(88, 'syséteme d\'information géographique', '', 9),
(89, 'big data', '', 9),
(90, 'programation mobile et cloud ', '', 9),
(91, 'technologies web ', '', 9),
(92, 'web sémantique', '', 9),
(93, 'méthodologies de recherche et recherche bibliographique', '', 9),
(94, 'recherche d information et text Mining ', '', 9);

-- --------------------------------------------------------

--
-- Structure de la table `mod_spe`
--

CREATE TABLE `mod_spe` (
  `module_id` int(11) NOT NULL,
  `specialte_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mod_spe`
--

INSERT INTO `mod_spe` (`module_id`, `specialte_id`, `id`) VALUES
(9, 6, 1),
(9, 5, 2),
(10, 6, 3),
(10, 6, 4),
(38, 4, 5),
(77, 7, 6),
(69, 5, 7),
(69, 6, 8),
(69, 7, 9),
(19, 1, 10),
(27, 1, 11),
(58, 5, 12),
(58, 6, 13),
(58, 7, 14),
(28, 1, 15),
(20, 1, 16),
(8, 2, 17),
(21, 1, 18),
(26, 1, 19),
(87, 5, 20),
(62, 1, 21),
(62, 2, 22),
(71, 5, 23),
(71, 6, 24),
(71, 7, 25),
(61, 6, 26),
(61, 5, 27),
(61, 7, 28),
(53, 3, 29),
(9, 2, 30),
(10, 2, 31),
(56, 5, 32),
(56, 6, 33),
(56, 7, 34),
(14, 2, 35),
(89, 5, 36),
(86, 6, 37),
(45, 4, 38),
(50, 3, 39),
(57, 7, 40),
(57, 6, 41),
(57, 5, 42),
(54, 3, 43),
(66, 5, 44),
(66, 6, 45),
(66, 7, 46),
(43, 3, 47),
(43, 4, 48),
(40, 3, 49),
(40, 4, 50),
(22, 1, 51),
(73, 7, 52),
(79, 5, 53),
(79, 6, 54),
(79, 7, 55),
(36, 4, 56),
(36, 3, 57),
(84, 6, 58),
(84, 7, 59),
(70, 4, 60),
(70, 3, 61),
(37, 4, 62),
(37, 3, 63),
(30, 1, 64),
(63, 5, 65),
(63, 6, 66),
(63, 7, 67),
(4, 2, 68),
(78, 7, 69),
(60, 5, 70),
(60, 6, 71),
(60, 7, 72),
(23, 1, 73),
(5, 2, 74),
(93, 5, 75),
(32, 1, 76),
(33, 1, 77),
(52, 3, 78),
(74, 7, 79),
(90, 5, 80),
(39, 4, 81),
(51, 3, 82),
(12, 2, 83),
(82, 6, 84),
(44, 4, 85),
(44, 3, 86),
(41, 4, 87),
(94, 5, 88),
(46, 3, 89),
(46, 4, 90),
(81, 6, 91),
(75, 7, 92),
(13, 2, 93),
(67, 7, 94),
(72, 7, 95),
(68, 7, 96),
(24, 1, 97),
(29, 1, 98),
(65, 7, 99),
(35, 4, 100),
(34, 2, 101),
(48, 4, 102),
(47, 3, 103),
(15, 2, 104),
(88, 5, 105),
(7, 4, 106),
(85, 6, 107),
(64, 7, 108),
(42, 3, 109),
(42, 4, 110),
(31, 5, 111),
(31, 6, 112),
(80, 6, 113),
(31, 7, 114),
(91, 5, 115),
(25, 1, 116),
(59, 7, 117),
(59, 6, 118),
(59, 5, 119),
(16, 2, 120),
(17, 2, 121),
(83, 6, 122),
(92, 5, 123);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `nom_prof` varchar(150) NOT NULL,
  `departement` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `permission` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom_prof`, `departement`, `user_name`, `pwd`, `permission`) VALUES
(4, 'hamza hassani', 'D_INF', 'admin', 'test', 'prof'),
(5, 'habibi', 'D_INF', 'karim', '203443', 'prof'),
(6, 'hamza hassani', 'D_INF', 'astro', 'astro', 'prof');

-- --------------------------------------------------------

--
-- Structure de la table `prof_spe_mod`
--

CREATE TABLE `prof_spe_mod` (
  `prof_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prof_spe_mod`
--

INSERT INTO `prof_spe_mod` (`prof_id`, `mod_id`, `spe_id`) VALUES
(5, 62, 2),
(5, 9, 2),
(5, 10, 2),
(6, 45, 4),
(6, 40, 4),
(6, 37, 4),
(4, 19, 1),
(4, 8, 2),
(4, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pro_spe`
--

CREATE TABLE `pro_spe` (
  `prof_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pro_spe`
--

INSERT INTO `pro_spe` (`prof_id`, `spe_id`) VALUES
(4, 5),
(5, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `specialte_id` int(11) NOT NULL,
  `specialte_nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`specialte_id`, `specialte_nom`) VALUES
(1, '1ER MI'),
(2, '2EME INFO'),
(3, 'SI'),
(4, 'ISIL'),
(5, 'WIC'),
(6, 'RSSI'),
(7, 'ISI');

-- --------------------------------------------------------

--
-- Structure de la table `_admin`
--

CREATE TABLE `_admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `faculte` varchar(150) NOT NULL,
  `departement` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `permission` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `_admin`
--

INSERT INTO `_admin` (`admin_id`, `full_name`, `faculte`, `departement`, `user_name`, `pwd`, `permission`) VALUES
(1, 'web_dev', 'science exact', 'D_INF', 'admin', 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`abs_id`),
  ADD KEY `etudant_id` (`etudant_id`),
  ADD KEY `mod_id` (`mod_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etud_mod`
--
ALTER TABLE `etud_mod`
  ADD KEY `etudiant_id` (`etudiant_id`),
  ADD KEY `mod_id` (`mod_id`);

--
-- Index pour la table `etud_speç`
--
ALTER TABLE `etud_speç`
  ADD KEY `etudant_id` (`etudant_id`),
  ADD KEY `specialte_id` (`specialte_id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mod_spe`
--
ALTER TABLE `mod_spe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `specialte_id` (`specialte_id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prof_spe_mod`
--
ALTER TABLE `prof_spe_mod`
  ADD KEY `prof_id` (`prof_id`),
  ADD KEY `mod_id` (`mod_id`),
  ADD KEY `spe_id` (`spe_id`);

--
-- Index pour la table `pro_spe`
--
ALTER TABLE `pro_spe`
  ADD KEY `prof_id` (`prof_id`),
  ADD KEY `spe_id` (`spe_id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`specialte_id`);

--
-- Index pour la table `_admin`
--
ALTER TABLE `_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `abs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `mod_spe`
--
ALTER TABLE `mod_spe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `specialte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `_admin`
--
ALTER TABLE `_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`mod_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `absence_ibfk_3` FOREIGN KEY (`etudant_id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `etud_mod`
--
ALTER TABLE `etud_mod`
  ADD CONSTRAINT `etud_mod_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etud_mod_ibfk_2` FOREIGN KEY (`mod_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etud_speç`
--
ALTER TABLE `etud_speç`
  ADD CONSTRAINT `etud_speç_ibfk_1` FOREIGN KEY (`etudant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etud_speç_ibfk_2` FOREIGN KEY (`specialte_id`) REFERENCES `specialite` (`specialte_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mod_spe`
--
ALTER TABLE `mod_spe`
  ADD CONSTRAINT `mod_spe_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mod_spe_ibfk_2` FOREIGN KEY (`specialte_id`) REFERENCES `specialite` (`specialte_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prof_spe_mod`
--
ALTER TABLE `prof_spe_mod`
  ADD CONSTRAINT `prof_spe_mod_ibfk_1` FOREIGN KEY (`mod_id`) REFERENCES `mod_spe` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prof_spe_mod_ibfk_2` FOREIGN KEY (`spe_id`) REFERENCES `mod_spe` (`specialte_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prof_spe_mod_ibfk_3` FOREIGN KEY (`prof_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pro_spe`
--
ALTER TABLE `pro_spe`
  ADD CONSTRAINT `pro_spe_ibfk_2` FOREIGN KEY (`spe_id`) REFERENCES `specialite` (`specialte_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_spe_ibfk_5` FOREIGN KEY (`prof_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
