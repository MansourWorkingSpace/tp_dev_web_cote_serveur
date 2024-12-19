-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 déc. 2024 à 07:52
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etude`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_classe`
--

CREATE TABLE `t_classe` (
  `codeClasse` int(11) NOT NULL,
  `nomClasse` varchar(30) NOT NULL,
  `codeGroupe` int(11) NOT NULL,
  `codeDepartement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_classe`
--

INSERT INTO `t_classe` (`codeClasse`, `nomClasse`, `codeGroupe`, `codeDepartement`) VALUES
(2, 'DSI2.2', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_departement`
--

CREATE TABLE `t_departement` (
  `codeDepartement` int(11) NOT NULL,
  `nomDepartement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_departement`
--

INSERT INTO `t_departement` (`codeDepartement`, `nomDepartement`) VALUES
(1, 'Info');

-- --------------------------------------------------------

--
-- Structure de la table `t_enseignant`
--

CREATE TABLE `t_enseignant` (
  `codeEnseignant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateRecrutement` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `codeDepartement` int(11) NOT NULL,
  `codeGrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_etudiant`
--

CREATE TABLE `t_etudiant` (
  `codeEtudiant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNaiss` date NOT NULL,
  `codeClasse` int(11) NOT NULL,
  `numInscrit` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_etudiant`
--

INSERT INTO `t_etudiant` (`codeEtudiant`, `nom`, `prenom`, `dateNaiss`, `codeClasse`, `numInscrit`, `adresse`, `mail`, `tel`) VALUES
(3, 'Mansour', 'Ali', '2004-05-03', 2, 1234, 'المهدية نهج حسن ابرهم', 'mansour.tech.contact@gmail.com', 51138031);

-- --------------------------------------------------------

--
-- Structure de la table `t_ficheabsence`
--

CREATE TABLE `t_ficheabsence` (
  `codeFicheAbsence` int(11) NOT NULL,
  `DateJour` date NOT NULL,
  `codeMatiere` int(11) NOT NULL,
  `codeEnseignant` int(11) NOT NULL,
  `codeClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_ficheabsence`
--

INSERT INTO `t_ficheabsence` (`codeFicheAbsence`, `DateJour`, `codeMatiere`, `codeEnseignant`, `codeClasse`) VALUES
(1, '2024-12-02', 2, 1, 2),
(2, '2024-12-02', 1, 1, 2),
(3, '2024-12-05', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_ficheabsenceseance`
--

CREATE TABLE `t_ficheabsenceseance` (
  `CodeFicheAbsence` int(11) NOT NULL,
  `CodeSeance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_ficheabsenceseance`
--

INSERT INTO `t_ficheabsenceseance` (`CodeFicheAbsence`, `CodeSeance`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_grade`
--

CREATE TABLE `t_grade` (
  `codeGrade` int(11) NOT NULL,
  `nomGrade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_grade`
--

INSERT INTO `t_grade` (`codeGrade`, `nomGrade`) VALUES
(123, 'enseignant stagiere');

-- --------------------------------------------------------

--
-- Structure de la table `t_groupe`
--

CREATE TABLE `t_groupe` (
  `codeGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_groupe`
--

INSERT INTO `t_groupe` (`codeGroupe`, `nomGroupe`) VALUES
(2, 'DSI 2.2 GRP 2'),
(3, 'DSI 2.2 GRP1');

-- --------------------------------------------------------

--
-- Structure de la table `t_ligneficheabsence`
--

CREATE TABLE `t_ligneficheabsence` (
  `CodeFicheAbsence` int(11) NOT NULL,
  `CodeEtudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_matiere`
--

CREATE TABLE `t_matiere` (
  `codeMatiere` int(11) NOT NULL,
  `nomMatiere` varchar(50) NOT NULL,
  `nbhCours_semaine` int(11) NOT NULL,
  `nbhTD_semaine` int(11) NOT NULL,
  `nbhTP_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_matiere`
--

INSERT INTO `t_matiere` (`codeMatiere`, `nomMatiere`, `nbhCours_semaine`, `nbhTD_semaine`, `nbhTP_semaine`) VALUES
(1, 'Java', 2, 1, 3),
(2, 'Angular', 0, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_seance`
--

CREATE TABLE `t_seance` (
  `codeSeance` int(11) NOT NULL,
  `nomSeance` varchar(50) NOT NULL,
  `Heuredebut` time NOT NULL,
  `Heurefin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_seance`
--

INSERT INTO `t_seance` (`codeSeance`, `nomSeance`, `Heuredebut`, `Heurefin`) VALUES
(1, 'S2', '10:00:00', '11:30:00'),
(2, 's3', '11:30:00', '13:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD PRIMARY KEY (`codeClasse`),
  ADD KEY `codeGroupe` (`codeGroupe`),
  ADD KEY `codeDepartement` (`codeDepartement`);

--
-- Index pour la table `t_departement`
--
ALTER TABLE `t_departement`
  ADD PRIMARY KEY (`codeDepartement`);

--
-- Index pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD PRIMARY KEY (`codeEnseignant`),
  ADD KEY `codeDepartement` (`codeDepartement`),
  ADD KEY `codeGrade` (`codeGrade`);

--
-- Index pour la table `t_etudiant`
--
ALTER TABLE `t_etudiant`
  ADD PRIMARY KEY (`codeEtudiant`);

--
-- Index pour la table `t_ficheabsence`
--
ALTER TABLE `t_ficheabsence`
  ADD PRIMARY KEY (`codeFicheAbsence`),
  ADD KEY `codeClasse` (`codeClasse`),
  ADD KEY `codeMatiere` (`codeMatiere`);

--
-- Index pour la table `t_ficheabsenceseance`
--
ALTER TABLE `t_ficheabsenceseance`
  ADD PRIMARY KEY (`CodeFicheAbsence`,`CodeSeance`),
  ADD KEY `CodeSeance` (`CodeSeance`);

--
-- Index pour la table `t_grade`
--
ALTER TABLE `t_grade`
  ADD PRIMARY KEY (`codeGrade`);

--
-- Index pour la table `t_groupe`
--
ALTER TABLE `t_groupe`
  ADD PRIMARY KEY (`codeGroupe`);

--
-- Index pour la table `t_ligneficheabsence`
--
ALTER TABLE `t_ligneficheabsence`
  ADD PRIMARY KEY (`CodeFicheAbsence`,`CodeEtudiant`),
  ADD KEY `CodeEtudiant` (`CodeEtudiant`);

--
-- Index pour la table `t_matiere`
--
ALTER TABLE `t_matiere`
  ADD PRIMARY KEY (`codeMatiere`);

--
-- Index pour la table `t_seance`
--
ALTER TABLE `t_seance`
  ADD PRIMARY KEY (`codeSeance`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_classe`
--
ALTER TABLE `t_classe`
  MODIFY `codeClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_departement`
--
ALTER TABLE `t_departement`
  MODIFY `codeDepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  MODIFY `codeEnseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_etudiant`
--
ALTER TABLE `t_etudiant`
  MODIFY `codeEtudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_ficheabsence`
--
ALTER TABLE `t_ficheabsence`
  MODIFY `codeFicheAbsence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_grade`
--
ALTER TABLE `t_grade`
  MODIFY `codeGrade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `t_groupe`
--
ALTER TABLE `t_groupe`
  MODIFY `codeGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_matiere`
--
ALTER TABLE `t_matiere`
  MODIFY `codeMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_seance`
--
ALTER TABLE `t_seance`
  MODIFY `codeSeance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD CONSTRAINT `t_classe_ibfk_1` FOREIGN KEY (`codeGroupe`) REFERENCES `t_groupe` (`codeGroupe`),
  ADD CONSTRAINT `t_classe_ibfk_2` FOREIGN KEY (`codeDepartement`) REFERENCES `t_departement` (`codeDepartement`);

--
-- Contraintes pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD CONSTRAINT `t_enseignant_ibfk_1` FOREIGN KEY (`codeDepartement`) REFERENCES `t_departement` (`codeDepartement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_enseignant_ibfk_2` FOREIGN KEY (`codeGrade`) REFERENCES `t_grade` (`codeGrade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_ficheabsence`
--
ALTER TABLE `t_ficheabsence`
  ADD CONSTRAINT `t_ficheabsence_ibfk_1` FOREIGN KEY (`codeClasse`) REFERENCES `t_classe` (`codeClasse`),
  ADD CONSTRAINT `t_ficheabsence_ibfk_2` FOREIGN KEY (`codeMatiere`) REFERENCES `t_matiere` (`codeMatiere`);

--
-- Contraintes pour la table `t_ficheabsenceseance`
--
ALTER TABLE `t_ficheabsenceseance`
  ADD CONSTRAINT `t_ficheabsenceseance_ibfk_1` FOREIGN KEY (`CodeFicheAbsence`) REFERENCES `t_ficheabsence` (`codeFicheAbsence`),
  ADD CONSTRAINT `t_ficheabsenceseance_ibfk_2` FOREIGN KEY (`CodeSeance`) REFERENCES `t_seance` (`codeSeance`);

--
-- Contraintes pour la table `t_ligneficheabsence`
--
ALTER TABLE `t_ligneficheabsence`
  ADD CONSTRAINT `t_ligneficheabsence_ibfk_1` FOREIGN KEY (`CodeFicheAbsence`) REFERENCES `t_ficheabsence` (`codeFicheAbsence`),
  ADD CONSTRAINT `t_ligneficheabsence_ibfk_2` FOREIGN KEY (`CodeEtudiant`) REFERENCES `t_etudiant` (`codeEtudiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
