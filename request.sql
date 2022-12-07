-- CREATE DATABASE `d-tailing` character set 'UTF8';
-- USE `d-tailing`;
-- CREATE TABLE users(
--     Id_users INT AUTO_INCREMENT,
--     firstname VARCHAR(25),
--     lastname VARCHAR(25),
--     maiil VARCHAR(125),
--     phone VARCHAR(12),
--     created_at DATE,
--     valided_at DATE,
--     password VARCHAR(50),
--     PRIMARY KEY(Id_users)
-- );
-- CREATE TABLE cars(
--     Id_cars INT AUTO_INCREMENT,
--     type INT(2),
--     PRIMARY KEY(Id_cars)
-- );
-- CREATE TABLE cars_users(
--     Id_cars_users INT AUTO_INCREMENT,
--     Id_users INT NOT NULL,
--     Id_cars INT NOT NULL,
--     PRIMARY KEY(Id_cars_users),
--     FOREIGN KEY(Id_users) REFERENCES users(Id_users),
--     FOREIGN KEY(Id_cars) REFERENCES cars(Id_cars)
-- );
-- CREATE TABLE prestations(
--     Id_prestations INT AUTO_INCREMENT,
--     title VARCHAR(50),
--     description TEXT,
--     price DECIMAL(4,2),
--     PRIMARY KEY(Id_prestations)
-- );
-- CREATE TABLE appointments(
--     Id_appointments INT AUTO_INCREMENT,
--     datehour DATETIME,
--     Id_prestations INT NOT NULL,
--     Id_cars_users INT NOT NULL,
--     PRIMARY KEY(Id_appointments),
--     FOREIGN KEY(Id_prestations) REFERENCES prestations(Id_prestations),
--     FOREIGN KEY(Id_cars_users) REFERENCES cars_users(Id_cars_users)
-- );
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 06 déc. 2022 à 15:26
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `d-tailing`
--
-- --------------------------------------------------------
--
-- Structure de la table `appointments`
--
CREATE TABLE `appointments` (
    `Id_appointments` int(11) NOT NULL,
    `datehour` datetime NOT NULL,
    `Id_prestations` int(11) NOT NULL,
    `Id_users` int(11) NOT NULL,
    `Id_cars` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
--
-- Structure de la table `cars`
--
CREATE TABLE `cars` (
    `Id_cars` int(11) NOT NULL,
    `type` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Déchargement des données de la table `cars`
--
INSERT INTO `cars` (`Id_cars`, `type`)
VALUES (1, 'Citadine'),
    (2, 'Berline'),
    (3, 'S.U.V');
-- --------------------------------------------------------
--
-- Structure de la table `prestations`
--
CREATE TABLE `prestations` (
    `Id_prestations` int(11) NOT NULL,
    `title` varchar(50) DEFAULT NULL,
    `description` text,
    `price` decimal(10, 0) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Déchargement des données de la table `prestations`
--
INSERT INTO `prestations` (
        `Id_prestations`,
        `title`,
        `description`,
        `price`
    )
VALUES (
        12,
        'Interieure',
        'Le detailing intérieur de votre véhicule va constituer à agir sur l’ensemble des plastiques du tableau de bord, des portières ou de la console centrale, sur les sièges en tissus ou l’intérieur en cuir, les tapis de sol et les moquettes ainsi que les vitres ou même le toit panoramique.',
        '300'
    ),
    (
        13,
        'Exterieur',
        'Le detailing, accompli sur un véhicule sorti d’usine ou très neuf, permettra d’éliminer les hologrammes ou micro rayures souvent présents sur la carrosserie. Cela offrira également l’avantage de protéger votre véhicule durablement pour qu’il conserve sa valeur de base le plus longtemps possible.',
        '300'
    ),
    (
        14,
        'Complet',
        'Detailing Intérieur ET Extérieur !&#13;&#10;Si votre véhicule a déjà plusieurs années et a été entretenu par vos soins ou peu entretenu, le detailing lui offrira une seconde jeunesse et fera remonter sa valeur monétaire. Ce sera également une bonne solution pour le protéger pour les années à venir. Dans le cas où vous prévoyez de vendre votre véhicule, quelle que soit son ancienneté, le detailing vous permettra d’en obtenir un prix plus élevé.',
        '500'
    );
-- --------------------------------------------------------
--
-- Structure de la table `users`
--
CREATE TABLE `users` (
    `Id_users` int(11) NOT NULL,
    `firstname` varchar(25) DEFAULT NULL,
    `lastname` varchar(25) DEFAULT NULL,
    `email` varchar(125) DEFAULT NULL,
    `phone` varchar(10) DEFAULT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `valided_at` date DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `adress` varchar(300) NOT NULL,
    `zipcode` varchar(5) NOT NULL,
    `role` int(1) NOT NULL DEFAULT '2'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Déchargement des données de la table `users`
--
INSERT INTO `users` (
        `Id_users`,
        `firstname`,
        `lastname`,
        `email`,
        `phone`,
        `created_at`,
        `valided_at`,
        `password`,
        `adress`,
        `zipcode`,
        `role`
    )
VALUES (
        27,
        'admin',
        'super',
        'superadmin@gmail.com',
        '0102030405',
        '2022-11-28 12:10:28',
        NULL,
        '$2y$10$cW9sx90IFJJbbU54Z5fcbOEGweKkIJcRGCsowjQon0/qf6fdsKkSK',
        '26 rue jean de la fontaine',
        '80000',
        1
    );
--
-- Index pour les tables déchargées
--
--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
ADD PRIMARY KEY (`Id_appointments`),
    ADD KEY `appointments_ibfk_2` (`Id_users`),
    ADD KEY `appointments_ibfk_3` (`Id_cars`),
    ADD KEY `appointments_ibfk_1` (`Id_prestations`);
--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
ADD PRIMARY KEY (`Id_cars`);
--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
ADD PRIMARY KEY (`Id_prestations`);
--
-- Index pour la table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`Id_users`);
--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
MODIFY `Id_appointments` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 75;
--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
MODIFY `Id_cars` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
MODIFY `Id_prestations` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `Id_users` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 36;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Id_prestations`) REFERENCES `prestations` (`Id_prestations`),
    ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Id_users`) REFERENCES `users` (`Id_users`) ON DELETE CASCADE,
    ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`Id_cars`) REFERENCES `cars` (`Id_cars`) ON DELETE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;