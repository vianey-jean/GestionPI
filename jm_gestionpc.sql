-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Février 2020 à 03:53
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jm_gestionpc`
--

-- --------------------------------------------------------

--
-- Structure de la table `jm_pc`
--

CREATE TABLE `jm_pc` (
  `idPc` int(11) NOT NULL,
  `refPc` varchar(7) DEFAULT NULL,
  `DispoPc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jm_pc`
--

INSERT INTO `jm_pc` (`idPc`, `refPc`, `DispoPc`) VALUES
(1, 'PC01', 1),
(2, 'PC02', 0),
(3, 'PC03', 0),
(4, 'PC04', 0),
(5, 'PC05', 0),
(6, 'PC06', 0),
(7, 'PC07', 0),
(8, 'PC08', 0),
(9, 'PC09', 0),
(10, 'PC10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jm_reservation`
--

CREATE TABLE `jm_reservation` (
  `idReserv` int(11) NOT NULL,
  `idStagReserv` int(11) NOT NULL,
  `nomStagReserv` varchar(45) DEFAULT NULL,
  `prenomStagReserv` varchar(45) DEFAULT NULL,
  `horaireResev` varchar(45) DEFAULT NULL,
  `refPcResev` int(11) NOT NULL,
  `colResev` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jm_reservation`
--

INSERT INTO `jm_reservation` (`idReserv`, `idStagReserv`, `nomStagReserv`, `prenomStagReserv`, `horaireResev`, `refPcResev`, `colResev`) VALUES
(1, 1, 'Rabe', 'Jean', '12:00', 1, 'PC01');

-- --------------------------------------------------------

--
-- Structure de la table `jm_stagiaire`
--

CREATE TABLE `jm_stagiaire` (
  `idStag` int(11) NOT NULL,
  `nomStag` varchar(45) DEFAULT NULL,
  `prenomStag` varchar(45) DEFAULT NULL,
  `dispoStag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jm_stagiaire`
--

INSERT INTO `jm_stagiaire` (`idStag`, `nomStag`, `prenomStag`, `dispoStag`) VALUES
(1, 'Rabe', 'Jean', 1),
(2, 'Kolo', 'Karine', 0),
(3, 'Robert', 'Yves', 0),
(4, 'Jukie', 'Sylvie', 0),
(5, 'Kate', 'Julie', 0),
(6, 'Brade', 'Odon', 0),
(7, 'Muelle', 'Kevin', 0),
(8, 'Bare', 'Jimmy', 1),
(9, 'Toussaint', 'Lucien', 0),
(10, 'Andre', 'Sainter', 0),
(104, 'rakoto', 'jao', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jm_users`
--

CREATE TABLE `jm_users` (
  `idusers` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jm_users`
--

INSERT INTO `jm_users` (`idusers`, `login`, `password`) VALUES
(1, 'admin1', '1234'),
(2, 'admin2', '1234');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jm_pc`
--
ALTER TABLE `jm_pc`
  ADD PRIMARY KEY (`idPc`);

--
-- Index pour la table `jm_reservation`
--
ALTER TABLE `jm_reservation`
  ADD PRIMARY KEY (`idReserv`);

--
-- Index pour la table `jm_stagiaire`
--
ALTER TABLE `jm_stagiaire`
  ADD PRIMARY KEY (`idStag`);

--
-- Index pour la table `jm_users`
--
ALTER TABLE `jm_users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jm_pc`
--
ALTER TABLE `jm_pc`
  MODIFY `idPc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `jm_reservation`
--
ALTER TABLE `jm_reservation`
  MODIFY `idReserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `jm_stagiaire`
--
ALTER TABLE `jm_stagiaire`
  MODIFY `idStag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT pour la table `jm_users`
--
ALTER TABLE `jm_users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
