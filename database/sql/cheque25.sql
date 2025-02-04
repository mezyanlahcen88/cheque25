-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 03 fév. 2025 à 22:20
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cheque25`
--

-- --------------------------------------------------------

--
-- Structure de la table `agencies`
--

CREATE TABLE `agencies` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `bank_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carnets`
--

CREATE TABLE `carnets` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_cheque` int NOT NULL,
  `rest` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `society` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_first_cheque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_last_cheque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cheques`
--

CREATE TABLE `cheques` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carnet_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi` timestamp NOT NULL COMMENT 'date of issue',
  `poi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'place of issue',
  `beneficiary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aïn Harrouda', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(2, ' Ben Yakhlef', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(3, ' Bouskoura', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(4, ' Casablanca', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(5, ' Médiouna', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(6, ' Mohammadia', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(7, ' Tit Mellil', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(8, ' Ben Yakhlef', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(9, ' Bejaâd', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(10, ' Ben Ahmed', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(11, ' Benslimane', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(12, ' Berrechid', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(13, ' Boujniba', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(14, ' Boulanouare', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(15, ' Bouznika', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(16, ' Deroua', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(17, ' El Borouj', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(18, ' El Gara', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(19, ' Guisser', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(20, ' Hattane', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(21, ' Khouribga', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(22, ' Loulad', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(23, ' Oued Zem', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(24, ' Oulad Abbou', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(25, ' Oulad HRiz Sahel', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(26, ' Oulad Mrah', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(27, ' Oulad Saïd', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(28, ' Oulad Sidi Ben Daoud', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(29, ' Ras El Aïn', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(30, ' Settat', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(31, ' Sidi Rahhal Chataï', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(32, ' Soualem', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(33, ' Azemmour', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(34, ' Bir Jdid', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(35, ' Bouguedra', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(36, ' Echemmaia', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(37, ' El Jadida', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(38, ' Hrara', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(39, ' Ighoud', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(40, ' Jamâat Shaim', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(41, ' Jorf Lasfar', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(42, ' Khemis Zemamra', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(43, ' Laaounate', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(44, ' Moulay Abdallah', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(45, ' Oualidia', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(46, ' Oulad Amrane', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(47, ' Oulad Frej', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(48, ' Oulad Ghadbane', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(49, ' Safi', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(50, ' Sebt El Maârif', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(51, ' Sebt Gzoula', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(52, ' Sidi Ahmed', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(53, ' Sidi Ali Ban Hamdouche', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(54, ' Sidi Bennour', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(55, ' Sidi Bouzid', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(56, ' Sidi Smaïl', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(57, ' Youssoufia', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(58, ' Fès', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(59, ' Aïn Cheggag', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(60, ' Bhalil', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(61, ' Boulemane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(62, ' El Menzel', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(63, ' Guigou', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(64, ' Imouzzer Kandar', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(65, ' Imouzzer Marmoucha', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(66, ' Missour', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(67, ' Moulay Yaâcoub', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(68, ' Ouled Tayeb', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(69, ' Outat El Haj', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(70, ' Ribate El Kheir', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(71, ' Séfrou', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(72, ' Skhinate', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(73, ' Tafajight', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(74, ' Arbaoua', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(75, ' Aïn Dorij', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(76, ' Dar Gueddari', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(77, ' Had Kourt', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(78, ' Jorf El Melha', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(79, ' Kénitra', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(80, ' Khenichet', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(81, ' Lalla Mimouna', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(82, ' Mechra Bel Ksiri', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(83, ' Mehdia', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(84, ' Moulay Bousselham', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(85, ' Sidi Allal Tazi', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(86, ' Sidi Kacem', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(87, ' Sidi Slimane', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(88, ' Sidi Taibi', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(89, ' Sidi Yahya El Gharb', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(90, ' Souk El Arbaa', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(91, ' Akka', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(92, ' Assa', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(93, ' Bouizakarne', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(94, ' El Ouatia', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(95, ' Es-Semara', 11, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(96, ' Fam El Hisn', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(97, ' Foum Zguid', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(98, ' Guelmim', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(99, ' Taghjijt', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(100, ' Tan-Tan', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(101, ' Tata', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(102, ' Zag', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(103, ' Marrakech', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(104, ' Ait Daoud', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(105, ' Amizmiz', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(106, ' Assahrij', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(107, ' Aït Ourir', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(108, ' Ben Guerir', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(109, ' Chichaoua', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(110, ' El Hanchane', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(111, ' El Kelaâ des Sraghna', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(112, ' Essaouira', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(113, ' Fraïta', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(114, ' Ghmate', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(115, ' Ighounane', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(116, ' Imintanoute', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(117, ' Kattara', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(118, ' Lalla Takerkoust', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(119, ' Loudaya', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(120, ' Lâattaouia', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(121, ' Moulay Brahim', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(122, ' Mzouda', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(123, ' Ounagha', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(124, ' Sid LMokhtar', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(125, ' Sid Zouin', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(126, ' Sidi Abdallah Ghiat', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(127, ' Sidi Bou Othmane', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(128, ' Sidi Rahhal', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(129, ' Skhour Rehamna', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(130, ' Smimou', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(131, ' Tafetachte', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(132, ' Tahannaout', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(133, ' Talmest', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(134, ' Tamallalt', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(135, ' Tamanar', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(136, ' Tamansourt', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(137, ' Tameslouht', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(138, ' Tanalt', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(139, ' Zeubelemok', 7, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(140, ' Meknès‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(141, ' Khénifra', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(142, ' Agourai', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(143, ' Ain Taoujdate', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(144, ' MyAliCherif', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(145, ' Rissani', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(146, ' Amalou Ighriben', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(147, ' Aoufous', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(148, ' Arfoud', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(149, ' Azrou', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(150, ' Aïn Jemaa', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(151, ' Aïn Karma', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(152, ' Aïn Leuh', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(153, ' Aït Boubidmane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(154, ' Aït Ishaq', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(155, ' Boudnib', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(156, ' Boufakrane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(157, ' Boumia', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(158, ' El Hajeb', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(159, ' Elkbab', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(160, ' Er-Rich', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(161, ' Errachidia', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(162, ' Gardmit', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(163, ' Goulmima', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(164, ' Gourrama', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(165, ' Had Bouhssoussen', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(166, ' Haj Kaddour', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(167, ' Ifrane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(168, ' Itzer', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(169, ' Jorf', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(170, ' Kehf Nsour', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(171, ' Kerrouchen', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(172, ' Mhaya', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(173, ' Mrirt', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(174, ' Midelt', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(175, ' Moulay Ali Cherif', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(176, ' Moulay Bouazza', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(177, ' Moulay Idriss Zerhoun', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(178, ' Moussaoua', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(179, ' NZalat Bni Amar', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(180, ' Ouaoumana', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(181, ' Oued Ifrane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(182, ' Sabaa Aiyoun', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(183, ' Sebt Jahjouh', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(184, ' Sidi Addi', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(185, ' Tichoute', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(186, ' Tighassaline', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(187, ' Tighza', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(188, ' Timahdite', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(189, ' Tinejdad', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(190, ' Tizguite', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(191, ' Toulal', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(192, ' Tounfite', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(193, ' Zaouia dIfrane', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(194, ' Zaïda', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(195, ' Ahfir', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(196, ' Aklim', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(197, ' Al Aroui', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(198, ' Aïn Bni Mathar', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(199, ' Aïn Erreggada', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(200, ' Ben Taïeb', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(201, ' Berkane', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(202, ' Bni Ansar', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(203, ' Bni Chiker', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(204, ' Bni Drar', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(205, ' Bni Tadjite', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(206, ' Bouanane', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(207, ' Bouarfa', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(208, ' Bouhdila', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(209, ' Dar El Kebdani', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(210, ' Debdou', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(211, ' Douar Kannine', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(212, ' Driouch', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(213, ' El Aïoun Sidi Mellouk', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(214, ' Farkhana', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(215, ' Figuig', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(216, ' Ihddaden', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(217, ' Jaâdar', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(218, ' Jerada', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(219, ' Kariat Arekmane', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(220, ' Kassita', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(221, ' Kerouna', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(222, ' Laâtamna', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(223, ' Madagh', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(224, ' Midar', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(225, ' Nador', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(226, ' Naima', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(227, ' Oued Heimer', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(228, ' Oujda', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(229, ' Ras El Ma', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(230, ' Saïdia', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(231, ' Selouane', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(232, ' Sidi Boubker', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(233, ' Sidi Slimane Echcharaa', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(234, ' Talsint', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(235, ' Taourirt', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(236, ' Tendrara', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(237, ' Tiztoutine', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(238, ' Touima', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(239, ' Touissit', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(240, ' Zaïo', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(241, ' Zeghanghane', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(242, ' Rabat', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(243, ' Salé', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(244, ' Ain El Aouda', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(245, ' Harhoura', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(246, ' Khémisset', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(247, ' Oulmès', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(248, ' Rommani', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(249, ' Sidi Allal El Bahraoui', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(250, ' Sidi Bouknadel', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(251, ' Skhirate', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(252, ' Tamesna', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(253, ' Témara', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(254, ' Tiddas', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(255, ' Tiflet', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(256, ' Touarga', 4, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(257, ' Agadir', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(258, ' Agdz', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(259, ' Agni Izimmer', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(260, ' Aït Melloul', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(261, ' Alnif', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(262, ' Anzi', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(263, ' Aoulouz', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(264, ' Aourir', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(265, ' Arazane', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(266, ' Aït Baha', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(267, ' Aït Iaâza', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(268, ' Aït Yalla', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(269, ' Ben Sergao', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(270, ' Biougra', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(271, ' Boumalne-Dadès', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(272, ' Dcheira El Jihadia', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(273, ' Drargua', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(274, ' El Guerdane', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(275, ' Harte Lyamine', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(276, ' Ida Ougnidif', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(277, ' Ifri', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(278, ' Igdamen', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(279, ' Ighil nOumgoun', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(280, ' Imassine', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(281, ' Inezgane', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(282, ' Irherm', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(283, ' Kelaat-MGouna', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(284, ' Lakhsas', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(285, ' Lakhsass', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(286, ' Lqliâa', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(287, ' Msemrir', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(288, ' Massa (Maroc)', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(289, ' Megousse', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(290, ' Ouarzazate', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(291, ' Oulad Berhil', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(292, ' Oulad Teïma', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(293, ' Sarghine', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(294, ' Sidi Ifni', 10, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(295, ' Skoura', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(296, ' Tabounte', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(297, ' Tafraout', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(298, ' Taghzout', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(299, ' Tagzen', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(300, ' Taliouine', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(301, ' Tamegroute', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(302, ' Tamraght', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(303, ' Tanoumrite Nkob Zagora', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(304, ' Taourirt ait zaghar', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(305, ' Taroudannt', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(306, ' Temsia', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(307, ' Tifnit', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(308, ' Tisgdal', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(309, ' Tiznit', 9, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(310, ' Toundoute', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(311, ' Zagora', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(312, ' Afourar', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(313, ' Aghbala', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(314, ' Azilal', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(315, ' Aït Majden', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(316, ' Beni Ayat', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(317, ' Béni Mellal', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(318, ' Bin elouidane', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(319, ' Bradia', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(320, ' Bzou', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(321, ' Dar Oulad Zidouh', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(322, ' Demnate', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(323, ' Draa', 8, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(324, ' El Ksiba', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(325, ' Foum Jamaa', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(326, ' Fquih Ben Salah', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(327, ' Kasba Tadla', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(328, ' Ouaouizeght', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(329, ' Oulad Ayad', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(330, ' Oulad MBarek', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(331, ' Oulad Yaich', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(332, ' Sidi Jaber', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(333, ' Souk Sebt Oulad Nemma', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(334, ' Zaouïat Cheikh', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(335, ' Tanger‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(336, ' Tétouan‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(337, ' Akchour', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(338, ' Assilah', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(339, ' Bab Berred', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(340, ' Bab Taza', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(341, ' Brikcha', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(342, ' Chefchaouen', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(343, ' Dar Bni Karrich', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(344, ' Dar Chaoui', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(345, ' Fnideq', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(346, ' Gueznaia', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(347, ' Jebha', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(348, ' Karia', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(349, ' Khémis Sahel', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(350, ' Ksar El Kébir', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(351, ' Larache', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(352, ' Mdiq', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(353, ' Martil', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(354, ' Moqrisset', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(355, ' Oued Laou', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(356, ' Oued Rmel', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(357, ' Ouazzane', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(358, ' Point Cires', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(359, ' Sidi Lyamani', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(360, ' Sidi Mohamed ben Abdallah el-Raisuni', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(361, ' Zinat', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(362, ' Ajdir‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(363, ' Aknoul‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(364, ' Al Hoceïma‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(365, ' Aït Hichem‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(366, ' Bni Bouayach‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(367, ' Bni Hadifa‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(368, ' Ghafsai‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(369, ' Guercif‎', 2, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(370, ' Imzouren‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(371, ' Inahnahen‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(372, ' Issaguen (Ketama)‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(373, ' Karia (El Jadida)‎', 6, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(374, ' Karia Ba Mohamed‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(375, ' Oued Amlil‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(376, ' Oulad Zbair‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(377, ' Tahla‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(378, ' Tala Tazegwaght‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(379, ' Tamassint‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(380, ' Taounate‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(381, ' Targuist‎', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(382, ' Taza‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(383, ' Taïnaste‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(384, ' Thar Es-Souk‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(385, ' Tissa‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(386, ' Tizi Ouasli‎', 3, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(387, ' Laayoune‎', 11, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(388, ' El Marsa‎', 11, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(389, ' Tarfaya‎', 11, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(390, ' Boujdour‎', 11, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(391, ' Awsard', 12, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(392, ' Oued-Eddahab', 12, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(393, ' Stehat', 1, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(394, ' Aït Attab', 5, '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `secteur_id` int DEFAULT NULL,
  `cd_postale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_cheque` int NOT NULL DEFAULT '0',
  `total_acs` double(8,2) NOT NULL DEFAULT '0.00' COMMENT 'total amount cheques',
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_compte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `society_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_solde` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeric_code` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusTVA` tinyint(1) NOT NULL DEFAULT '0',
  `phonecode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tld` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subregion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezones` text COLLATE utf8mb4_unicode_ci,
  `translations` text COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `emoji` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emojiU` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  `wikiDataId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `effets`
--

CREATE TABLE `effets` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carnet_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi` timestamp NOT NULL COMMENT 'date of issue',
  `poi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'place of issue',
  `beneficiary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe` date NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE `exercices` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(2, 'Role', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(3, 'Country', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(4, 'Language', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(5, 'Setting', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(6, 'Menu', '2024-07-07 12:57:05', '2024-07-07 12:57:05'),
(7, 'Permission', '2024-07-07 14:02:04', '2024-07-07 14:02:04'),
(8, 'Translate', '2024-07-07 14:02:20', '2024-07-07 14:02:20'),
(9, 'Site', '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(10, 'Society', '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(11, 'Employe', '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(12, 'Supplier', '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(13, 'Client', '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(14, 'Bank', '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(15, 'Compte', '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(16, 'Carnet', '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(17, 'Cheque', '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(18, 'Effet', '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(19, 'Numerotation', '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(20, 'Exercice', '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(21, 'Product', '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(22, 'Agency', '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(23, 'Brand', '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(24, 'Category', '2025-02-03 21:15:59', '2025-02-03 21:15:59');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDefault` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `flag_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`, `locale`, `isDefault`, `status`, `visible`, `flag_path`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, 1, 1, 'en.svg', '2022-04-16 08:47:35', '2022-04-16 08:47:35'),
(2, 'French', 'fr', 0, 0, 0, 'fr.svg', '2022-04-27 08:47:35', '2022-04-27 08:47:35'),
(3, 'Arabic', 'ar', 0, 0, 0, 'ar.svg', '2022-10-27 08:47:35', '2022-10-27 08:47:35'),
(4, 'Achinese', 'ace', 0, 0, 0, 'ace.svg', '2022-03-11 10:47:35', '2022-03-11 10:47:35'),
(5, 'Afrikaans', 'af', 0, 0, 0, 'af.svg', '2022-03-12 10:47:35', '2022-03-12 10:47:35'),
(6, 'Aghem', 'agq', 0, 0, 0, 'agq.svg', '2022-03-13 10:47:35', '2022-03-13 10:47:35'),
(7, 'Akan', 'ak', 0, 0, 0, 'ak.svg', '2022-03-14 10:47:35', '2022-03-14 10:47:35'),
(8, 'Aragonese', 'an', 0, 0, 0, 'an.svg', '2022-03-15 10:47:35', '2022-03-15 10:47:35'),
(9, 'Atsam', 'cch', 0, 0, 0, 'cch.svg', '2022-03-16 10:47:35', '2022-03-16 10:47:35'),
(10, 'Guaraní', 'gn', 0, 0, 0, 'gn.svg', '2022-03-17 10:47:35', '2022-03-17 10:47:35'),
(11, 'Avestan', 'ae', 0, 0, 0, 'ae.svg', '2022-03-18 10:47:35', '2022-03-18 10:47:35'),
(12, 'Aymara', 'ay', 0, 0, 0, 'ay.svg', '2022-03-19 10:47:35', '2022-03-19 10:47:35'),
(13, 'Azerbaijani (Latin)', 'az', 0, 0, 0, 'az.svg', '2022-03-20 10:47:35', '2022-03-20 10:47:35'),
(14, 'Indonesian', 'id', 0, 0, 0, 'id.svg', '2022-03-21 10:47:35', '2022-03-21 10:47:35'),
(15, 'Malay', 'ms', 0, 0, 0, 'ms.svg', '2022-03-22 10:47:35', '2022-03-22 10:47:35'),
(16, 'Bambara', 'bm', 0, 0, 0, 'bm.svg', '2022-03-23 10:47:35', '2022-03-23 10:47:35'),
(17, 'Javanese (Latin)', 'jv', 0, 0, 0, 'jv.svg', '2022-03-24 10:47:35', '2022-03-24 10:47:35'),
(18, 'Sundanese', 'su', 0, 0, 0, 'su.svg', '2022-03-25 10:47:35', '2022-03-25 10:47:35'),
(19, 'Bihari', 'bh', 0, 0, 0, 'bh.svg', '2022-03-26 10:47:35', '2022-03-26 10:47:35'),
(20, 'Bislama', 'bi', 0, 0, 0, 'bi.svg', '2022-03-27 08:47:35', '2022-03-27 08:47:35'),
(21, 'Norwegian Bokmål', 'nb', 0, 0, 0, 'nb.svg', '2022-03-28 08:47:35', '2022-03-28 08:47:35'),
(22, 'Bosnian', 'bs', 0, 0, 0, 'bs.svg', '2022-03-29 08:47:35', '2022-03-29 08:47:35'),
(23, 'Breton', 'br', 0, 0, 0, 'br.svg', '2022-03-30 08:47:35', '2022-03-30 08:47:35'),
(24, 'Catalan', 'ca', 0, 0, 0, 'ca.svg', '2022-03-31 08:47:35', '2022-03-31 08:47:35'),
(25, 'Chamorro', 'ch', 0, 0, 0, 'ch.svg', '2022-04-01 08:47:35', '2022-04-01 08:47:35'),
(26, 'Chewa', 'ny', 0, 0, 0, 'ny.svg', '2022-04-02 08:47:35', '2022-04-02 08:47:35'),
(27, 'Makonde', 'kde', 0, 0, 0, 'kde.svg', '2022-04-03 08:47:35', '2022-04-03 08:47:35'),
(28, 'Shona', 'sn', 0, 0, 0, 'sn.svg', '2022-04-04 08:47:35', '2022-04-04 08:47:35'),
(29, 'Corsican', 'co', 0, 0, 0, 'co.svg', '2022-04-05 08:47:35', '2022-04-05 08:47:35'),
(30, 'Welsh', 'cy', 0, 0, 0, 'cy.svg', '2022-04-06 08:47:35', '2022-04-06 08:47:35'),
(31, 'Danish', 'da', 0, 0, 0, 'da.svg', '2022-04-07 08:47:35', '2022-04-07 08:47:35'),
(32, 'Northern Sami', 'se', 0, 0, 0, 'se.svg', '2022-04-08 08:47:35', '2022-04-08 08:47:35'),
(33, 'German', 'de', 0, 0, 0, 'de.svg', '2022-04-09 08:47:35', '2022-04-09 08:47:35'),
(34, 'Luo', 'luo', 0, 0, 0, 'luo.svg', '2022-04-10 08:47:35', '2022-04-10 08:47:35'),
(35, 'Navajo', 'nv', 0, 0, 0, 'nv.svg', '2022-04-11 08:47:35', '2022-04-11 08:47:35'),
(36, 'Duala', 'dua', 0, 0, 0, 'dua.svg', '2022-04-12 08:47:35', '2022-04-12 08:47:35'),
(37, 'Estonian', 'et', 0, 0, 0, 'et.svg', '2022-04-13 08:47:35', '2022-04-13 08:47:35'),
(38, 'Nauru', 'na', 0, 0, 0, 'na.svg', '2022-04-14 08:47:35', '2022-04-14 08:47:35'),
(39, 'Ekegusii', 'guz', 0, 0, 0, 'guz.svg', '2022-04-15 08:47:35', '2022-04-15 08:47:35'),
(40, 'Australian English', 'en-AU', 0, 0, 0, 'en-AU.svg', '2022-04-17 08:47:35', '2022-04-17 08:47:35'),
(41, 'British English', 'en-GB', 0, 0, 0, 'en-GB.svg', '2022-04-18 08:47:35', '2022-04-18 08:47:35'),
(42, 'Canadian English', 'en-CA', 0, 0, 0, 'en-CA.svg', '2022-04-19 08:47:35', '2022-04-19 08:47:35'),
(43, 'U.S. English', 'en-US', 0, 0, 0, 'en-US.svg', '2022-04-20 08:47:35', '2022-04-20 08:47:35'),
(44, 'Spanish', 'es', 0, 0, 0, 'es.svg', '2022-04-21 08:47:35', '2022-04-21 08:47:35'),
(45, 'Esperanto', 'eo', 0, 0, 0, 'eo.svg', '2022-04-22 08:47:35', '2022-04-22 08:47:35'),
(46, 'Basque', 'eu', 0, 0, 0, 'eu.svg', '2022-04-23 08:47:35', '2022-04-23 08:47:35'),
(47, 'Ewondo', 'ewo', 0, 0, 0, 'ewo.svg', '2022-04-24 08:47:35', '2022-04-24 08:47:35'),
(48, 'Ewe', 'ee', 0, 0, 0, 'ee.svg', '2022-04-25 08:47:35', '2022-04-25 08:47:35'),
(49, 'Filipino', 'fil', 0, 0, 0, 'fil.svg', '2022-04-26 08:47:35', '2022-04-26 08:47:35'),
(50, 'Canadian French', 'fr-CA', 0, 0, 0, 'fr-CA.svg', '2022-04-28 08:47:35', '2022-04-28 08:47:35'),
(51, 'Western Frisian', 'fy', 0, 0, 0, 'fy.svg', '2022-04-29 08:47:35', '2022-04-29 08:47:35'),
(52, 'Friulian', 'fur', 0, 0, 0, 'fur.svg', '2022-04-30 08:47:35', '2022-04-30 08:47:35'),
(53, 'Faroese', 'fo', 0, 0, 0, 'fo.svg', '2022-05-01 08:47:35', '2022-05-01 08:47:35'),
(54, 'Ga', 'gaa', 0, 0, 0, 'gaa.svg', '2022-05-02 08:47:35', '2022-05-02 08:47:35'),
(55, 'Irish', 'ga', 0, 0, 0, 'ga.svg', '2022-05-03 08:47:35', '2022-05-03 08:47:35'),
(56, 'Manx', 'gv', 0, 0, 0, 'gv.svg', '2022-05-04 08:47:35', '2022-05-04 08:47:35'),
(57, 'Samoan', 'sm', 0, 0, 0, 'sm.svg', '2022-05-05 08:47:35', '2022-05-05 08:47:35'),
(58, 'Galician', 'gl', 0, 0, 0, 'gl.svg', '2022-05-06 08:47:35', '2022-05-06 08:47:35'),
(59, 'Kikuyu', 'ki', 0, 0, 0, 'ki.svg', '2022-05-07 08:47:35', '2022-05-07 08:47:35'),
(60, 'Scottish Gaelic', 'gd', 0, 0, 0, 'gd.svg', '2022-05-08 08:47:35', '2022-05-08 08:47:35'),
(61, 'Hausa', 'ha', 0, 0, 0, 'ha.svg', '2022-05-09 08:47:35', '2022-05-09 08:47:35'),
(62, 'Bena', 'bez', 0, 0, 0, 'bez.svg', '2022-05-10 08:47:35', '2022-05-10 08:47:35'),
(63, 'Hiri Motu', 'ho', 0, 0, 0, 'ho.svg', '2022-05-11 08:47:35', '2022-05-11 08:47:35'),
(64, 'Croatian', 'hr', 0, 0, 0, 'hr.svg', '2022-05-12 08:47:35', '2022-05-12 08:47:35'),
(65, 'Bemba', 'bem', 0, 0, 0, 'bem.svg', '2022-05-13 08:47:35', '2022-05-13 08:47:35'),
(66, 'Ido', 'io', 0, 0, 0, 'io.svg', '2022-05-14 08:47:35', '2022-05-14 08:47:35'),
(67, 'Igbo', 'ig', 0, 0, 0, 'ig.svg', '2022-05-15 08:47:35', '2022-05-15 08:47:35'),
(68, 'Rundi', 'rn', 0, 0, 0, 'rn.svg', '2022-05-16 08:47:35', '2022-05-16 08:47:35'),
(69, 'Interlingua', 'ia', 0, 0, 0, 'ia.svg', '2022-05-17 08:47:35', '2022-05-17 08:47:35'),
(70, 'Inuktitut (Latin)', 'iu-Latn', 0, 0, 0, 'iu-Latn.svg', '2022-05-18 08:47:35', '2022-05-18 08:47:35'),
(71, 'Sileibi', 'sbp', 0, 0, 0, 'sbp.svg', '2022-05-19 08:47:35', '2022-05-19 08:47:35'),
(72, 'North Ndebele', 'nd', 0, 0, 0, 'nd.svg', '2022-05-20 08:47:35', '2022-05-20 08:47:35'),
(73, 'South Ndebele', 'nr', 0, 0, 0, 'nr.svg', '2022-05-21 08:47:35', '2022-05-21 08:47:35'),
(74, 'Xhosa', 'xh', 0, 0, 0, 'xh.svg', '2022-05-22 08:47:35', '2022-05-22 08:47:35'),
(75, 'Zulu', 'zu', 0, 0, 0, 'zu.svg', '2022-05-23 08:47:35', '2022-05-23 08:47:35'),
(76, 'Italian', 'it', 0, 0, 0, 'it.svg', '2022-05-24 08:47:35', '2022-05-24 08:47:35'),
(77, 'Inupiaq', 'ik', 0, 0, 0, 'ik.svg', '2022-05-25 08:47:35', '2022-05-25 08:47:35'),
(78, 'Jola-Fonyi', 'dyo', 0, 0, 0, 'dyo.svg', '2022-05-26 08:47:35', '2022-05-26 08:47:35'),
(79, 'Kabuverdianu', 'kea', 0, 0, 0, 'kea.svg', '2022-05-27 08:47:35', '2022-05-27 08:47:35'),
(80, 'Jju', 'kaj', 0, 0, 0, 'kaj.svg', '2022-05-28 08:47:35', '2022-05-28 08:47:35'),
(81, 'Marshallese', 'mh', 0, 0, 0, 'mh.svg', '2022-05-29 08:47:35', '2022-05-29 08:47:35'),
(82, 'Kalaallisut', 'kl', 0, 0, 0, 'kl.svg', '2022-05-30 08:47:35', '2022-05-30 08:47:35'),
(83, 'Kalenjin', 'kln', 0, 0, 0, 'kln.svg', '2022-05-31 08:47:35', '2022-05-31 08:47:35'),
(84, 'Kanuri', 'kr', 0, 0, 0, 'kr.svg', '2022-06-01 08:47:35', '2022-06-01 08:47:35'),
(85, 'Tyap', 'kcg', 0, 0, 0, 'kcg.svg', '2022-06-02 08:47:35', '2022-06-02 08:47:35'),
(86, 'Cornish', 'kw', 0, 0, 0, 'kw.svg', '2022-06-03 08:47:35', '2022-06-03 08:47:35'),
(87, 'Nama', 'naq', 0, 0, 0, 'naq.svg', '2022-06-04 08:47:35', '2022-06-04 08:47:35'),
(88, 'Rombo', 'rof', 0, 0, 0, 'rof.svg', '2022-06-05 08:47:35', '2022-06-05 08:47:35'),
(89, 'Kamba', 'kam', 0, 0, 0, 'kam.svg', '2022-06-06 08:47:35', '2022-06-06 08:47:35'),
(90, 'Kongo', 'kg', 0, 0, 0, 'kg.svg', '2022-06-07 08:47:35', '2022-06-07 08:47:35'),
(91, 'Machame', 'jmc', 0, 0, 0, 'jmc.svg', '2022-06-08 08:47:35', '2022-06-08 08:47:35'),
(92, 'Kinyarwanda', 'rw', 0, 0, 0, 'rw.svg', '2022-06-09 08:47:35', '2022-06-09 08:47:35'),
(93, 'Kipare', 'asa', 0, 0, 0, 'asa.svg', '2022-06-10 08:47:35', '2022-06-10 08:47:35'),
(94, 'Rwa', 'rwk', 0, 0, 0, 'rwk.svg', '2022-06-11 08:47:35', '2022-06-11 08:47:35'),
(95, 'Samburu', 'saq', 0, 0, 0, 'saq.svg', '2022-06-12 08:47:35', '2022-06-12 08:47:35'),
(96, 'Shambala', 'ksb', 0, 0, 0, 'ksb.svg', '2022-06-13 08:47:35', '2022-06-13 08:47:35'),
(97, 'Congo Swahili', 'swc', 0, 0, 0, 'swc.svg', '2022-06-14 08:47:35', '2022-06-14 08:47:35'),
(98, 'Swahili', 'sw', 0, 0, 0, 'sw.svg', '2022-06-15 08:47:35', '2022-06-15 08:47:35'),
(99, 'Dawida', 'dav', 0, 0, 0, 'dav.svg', '2022-06-16 08:47:35', '2022-06-16 08:47:35'),
(100, 'Teso', 'teo', 0, 0, 0, 'teo.svg', '2022-06-17 08:47:35', '2022-06-17 08:47:35'),
(101, 'Koyra Chiini', 'khq', 0, 0, 0, 'khq.svg', '2022-06-18 08:47:35', '2022-06-18 08:47:35'),
(102, 'Songhay', 'ses', 0, 0, 0, 'ses.svg', '2022-06-19 08:47:35', '2022-06-19 08:47:35'),
(103, 'Morisyen', 'mfe', 0, 0, 0, 'mfe.svg', '2022-06-20 08:47:35', '2022-06-20 08:47:35'),
(104, 'Haitian', 'ht', 0, 0, 0, 'ht.svg', '2022-06-21 08:47:35', '2022-06-21 08:47:35'),
(105, 'Kuanyama', 'kj', 0, 0, 0, 'kj.svg', '2022-06-22 08:47:35', '2022-06-22 08:47:35'),
(106, 'Kölsch', 'ksh', 0, 0, 0, 'ksh.svg', '2022-06-23 08:47:35', '2022-06-23 08:47:35'),
(107, 'Kiembu', 'ebu', 0, 0, 0, 'ebu.svg', '2022-06-24 08:47:35', '2022-06-24 08:47:35'),
(108, 'Kimîîru', 'mer', 0, 0, 0, 'mer.svg', '2022-06-25 08:47:35', '2022-06-25 08:47:35'),
(109, 'Langi', 'lag', 0, 0, 0, 'lag.svg', '2022-06-26 08:47:35', '2022-06-26 08:47:35'),
(110, 'Lahnda', 'lah', 0, 0, 0, 'lah.svg', '2022-06-27 08:47:35', '2022-06-27 08:47:35'),
(111, 'Latin', 'la', 0, 0, 0, 'la.svg', '2022-06-28 08:47:35', '2022-06-28 08:47:35'),
(112, 'Latvian', 'lv', 0, 0, 0, 'lv.svg', '2022-06-29 08:47:35', '2022-06-29 08:47:35'),
(113, 'Tongan', 'to', 0, 0, 0, 'to.svg', '2022-06-30 08:47:35', '2022-06-30 08:47:35'),
(114, 'Lithuanian', 'lt', 0, 0, 0, 'lt.svg', '2022-07-01 08:47:35', '2022-07-01 08:47:35'),
(115, 'Limburgish', 'li', 0, 0, 0, 'li.svg', '2022-07-02 08:47:35', '2022-07-02 08:47:35'),
(116, 'Lingala', 'ln', 0, 0, 0, 'ln.svg', '2022-07-03 08:47:35', '2022-07-03 08:47:35'),
(117, 'Ganda', 'lg', 0, 0, 0, 'lg.svg', '2022-07-04 08:47:35', '2022-07-04 08:47:35'),
(118, 'Oluluyia', 'luy', 0, 0, 0, 'luy.svg', '2022-07-05 08:47:35', '2022-07-05 08:47:35'),
(119, 'Luxembourgish', 'lb', 0, 0, 0, 'lb.svg', '2022-07-06 08:47:35', '2022-07-06 08:47:35'),
(120, 'Hungarian', 'hu', 0, 0, 0, 'hu.svg', '2022-07-07 08:47:35', '2022-07-07 08:47:35'),
(121, 'Makhuwa-Meetto', 'mgh', 0, 0, 0, 'mgh.svg', '2022-07-08 08:47:35', '2022-07-08 08:47:35'),
(122, 'Malagasy', 'mg', 0, 0, 0, 'mg.svg', '2022-07-09 08:47:35', '2022-07-09 08:47:35'),
(123, 'Maltese', 'mt', 0, 0, 0, 'mt.svg', '2022-07-10 08:47:35', '2022-07-10 08:47:35'),
(124, 'Mewari', 'mtr', 0, 0, 0, 'mtr.svg', '2022-07-11 08:47:35', '2022-07-11 08:47:35'),
(125, 'Mundang', 'mua', 0, 0, 0, 'mua.svg', '2022-07-12 08:47:35', '2022-07-12 08:47:35'),
(126, 'Māori', 'mi', 0, 0, 0, 'mi.svg', '2022-07-13 08:47:35', '2022-07-13 08:47:35'),
(127, 'Dutch', 'nl', 0, 0, 0, 'nl.svg', '2022-07-14 08:47:35', '2022-07-14 08:47:35'),
(128, 'Kwasio', 'nmg', 0, 0, 0, 'nmg.svg', '2022-07-15 08:47:35', '2022-07-15 08:47:35'),
(129, 'Yangben', 'yav', 0, 0, 0, 'yav.svg', '2022-07-16 08:47:35', '2022-07-16 08:47:35'),
(130, 'Norwegian Nynorsk', 'nn', 0, 0, 0, 'nn.svg', '2022-07-17 08:47:35', '2022-07-17 08:47:35'),
(131, 'Occitan', 'oc', 0, 0, 0, 'oc.svg', '2022-07-18 08:47:35', '2022-07-18 08:47:35'),
(132, 'Old English', 'ang', 0, 0, 0, 'ang.svg', '2022-07-19 08:47:35', '2022-07-19 08:47:35'),
(133, 'Soga', 'xog', 0, 0, 0, 'xog.svg', '2022-07-20 08:47:35', '2022-07-20 08:47:35'),
(134, 'Oromo', 'om', 0, 0, 0, 'om.svg', '2022-07-21 08:47:35', '2022-07-21 08:47:35'),
(135, 'Ndonga', 'ng', 0, 0, 0, 'ng.svg', '2022-07-22 08:47:35', '2022-07-22 08:47:35'),
(136, 'Herero', 'hz', 0, 0, 0, 'hz.svg', '2022-07-23 08:47:35', '2022-07-23 08:47:35'),
(137, 'Uzbek (Latin)', 'uz-Latn', 0, 0, 0, 'uz-Latn.svg', '2022-07-24 08:47:35', '2022-07-24 08:47:35'),
(138, 'Low German', 'nds', 0, 0, 0, 'nds.svg', '2022-07-25 08:47:35', '2022-07-25 08:47:35'),
(139, 'Polish', 'pl', 0, 0, 0, 'pl.svg', '2022-07-26 08:47:35', '2022-07-26 08:47:35'),
(140, 'Portuguese', 'pt', 0, 0, 0, 'pt.svg', '2022-07-27 08:47:35', '2022-07-27 08:47:35'),
(141, 'Brazilian Portuguese', 'pt-BR', 0, 0, 0, 'pt-BR.svg', '2022-07-28 08:47:35', '2022-07-28 08:47:35'),
(142, 'Fulah', 'ff', 0, 0, 0, 'ff.svg', '2022-07-29 08:47:35', '2022-07-29 08:47:35'),
(143, 'Pahari-Potwari', 'pi', 0, 0, 0, 'pi.svg', '2022-07-30 08:47:35', '2022-07-30 08:47:35'),
(144, 'Afar', 'aa', 0, 0, 0, 'aa.svg', '2022-07-31 08:47:35', '2022-07-31 08:47:35'),
(145, 'Tahitian', 'ty', 0, 0, 0, 'ty.svg', '2022-08-01 08:47:35', '2022-08-01 08:47:35'),
(146, 'Bafia', 'ksf', 0, 0, 0, 'ksf.svg', '2022-08-02 08:47:35', '2022-08-02 08:47:35'),
(147, 'Romanian', 'ro', 0, 0, 0, 'ro.svg', '2022-08-03 08:47:35', '2022-08-03 08:47:35'),
(148, 'Chiga', 'cgg', 0, 0, 0, 'cgg.svg', '2022-08-04 08:47:35', '2022-08-04 08:47:35'),
(149, 'Romansh', 'rm', 0, 0, 0, 'rm.svg', '2022-08-05 08:47:35', '2022-08-05 08:47:35'),
(150, 'Quechua', 'qu', 0, 0, 0, 'qu.svg', '2022-08-06 08:47:35', '2022-08-06 08:47:35'),
(151, 'Nyankole', 'nyn', 0, 0, 0, 'nyn.svg', '2022-08-07 08:47:35', '2022-08-07 08:47:35'),
(152, 'Saho', 'ssy', 0, 0, 0, 'ssy.svg', '2022-08-08 08:47:35', '2022-08-08 08:47:35'),
(153, 'Sardinian', 'sc', 0, 0, 0, 'sc.svg', '2022-08-09 08:47:35', '2022-08-09 08:47:35'),
(154, 'Swiss High German', 'de-CH', 0, 0, 0, 'de-CH.svg', '2022-08-10 08:47:35', '2022-08-10 08:47:35'),
(155, 'Swiss German', 'gsw', 0, 0, 0, 'gsw.svg', '2022-08-11 08:47:35', '2022-08-11 08:47:35'),
(156, 'Taroko', 'trv', 0, 0, 0, 'trv.svg', '2022-08-12 08:47:35', '2022-08-12 08:47:35'),
(157, 'Sena', 'seh', 0, 0, 0, 'seh.svg', '2022-08-13 08:47:35', '2022-08-13 08:47:35'),
(158, 'Northern Sotho', 'nso', 0, 0, 0, 'nso.svg', '2022-08-14 08:47:35', '2022-08-14 08:47:35'),
(159, 'Southern Sotho', 'st', 0, 0, 0, 'st.svg', '2022-08-15 08:47:35', '2022-08-15 08:47:35'),
(160, 'Tswana', 'tn', 0, 0, 0, 'tn.svg', '2022-08-16 08:47:35', '2022-08-16 08:47:35'),
(161, 'Albanian', 'sq', 0, 0, 0, 'sq.svg', '2022-08-17 08:47:35', '2022-08-17 08:47:35'),
(162, 'Sidamo', 'sid', 0, 0, 0, 'sid.svg', '2022-08-18 08:47:35', '2022-08-18 08:47:35'),
(163, 'Swati', 'ss', 0, 0, 0, 'ss.svg', '2022-08-19 08:47:35', '2022-08-19 08:47:35'),
(164, 'Slovak', 'sk', 0, 0, 0, 'sk.svg', '2022-08-20 08:47:35', '2022-08-20 08:47:35'),
(165, 'Slovene', 'sl', 0, 0, 0, 'sl.svg', '2022-08-21 08:47:35', '2022-08-21 08:47:35'),
(166, 'Somali', 'so', 0, 0, 0, 'so.svg', '2022-08-22 08:47:35', '2022-08-22 08:47:35'),
(167, 'Serbian (Latin)', 'sr-Latn', 0, 0, 0, 'sr-Latn.svg', '2022-08-23 08:47:35', '2022-08-23 08:47:35'),
(168, 'Serbo-Croatian', 'sh', 0, 0, 0, 'sh.svg', '2022-08-24 08:47:35', '2022-08-24 08:47:35'),
(169, 'Finnish', 'fi', 0, 0, 0, 'fi.svg', '2022-08-25 08:47:35', '2022-08-25 08:47:35'),
(170, 'Swedish', 'sv', 0, 0, 0, 'sv.svg', '2022-08-26 08:47:35', '2022-08-26 08:47:35'),
(171, 'Sango', 'sg', 0, 0, 0, 'sg.svg', '2022-08-27 08:47:35', '2022-08-27 08:47:35'),
(172, 'Tagalog', 'tl', 0, 0, 0, 'tl.svg', '2022-08-28 08:47:35', '2022-08-28 08:47:35'),
(173, 'Central Atlas Tamazight (Latin)', 'tzm-Latn', 0, 0, 0, 'tzm-Latn.svg', '2022-08-29 08:47:35', '2022-08-29 08:47:35'),
(174, 'Kabyle', 'kab', 0, 0, 0, 'kab.svg', '2022-08-30 08:47:35', '2022-08-30 08:47:35'),
(175, 'Tasawaq', 'twq', 0, 0, 0, 'twq.svg', '2022-08-31 08:47:35', '2022-08-31 08:47:35'),
(176, 'Tachelhit (Latin)', 'shi', 0, 0, 0, 'shi.svg', '2022-09-01 08:47:35', '2022-09-01 08:47:35'),
(177, 'Nuer', 'nus', 0, 0, 0, 'nus.svg', '2022-09-02 08:47:35', '2022-09-02 08:47:35'),
(178, 'Vietnamese', 'vi', 0, 0, 0, 'vi.svg', '2022-09-03 08:47:35', '2022-09-03 08:47:35'),
(179, 'Tajik (Latin)', 'tg-Latn', 0, 0, 0, 'tg-Latn.svg', '2022-09-04 08:47:35', '2022-09-04 08:47:35'),
(180, 'Luba-Katanga', 'lu', 0, 0, 0, 'lu.svg', '2022-09-05 08:47:35', '2022-09-05 08:47:35'),
(181, 'Venda', 've', 0, 0, 0, 've.svg', '2022-09-06 08:47:35', '2022-09-06 08:47:35'),
(182, 'Twi', 'tw', 0, 0, 0, 'tw.svg', '2022-09-07 08:47:35', '2022-09-07 08:47:35'),
(183, 'Turkish', 'tr', 0, 0, 0, 'tr.svg', '2022-09-08 08:47:35', '2022-09-08 08:47:35'),
(184, 'Aleut', 'ale', 0, 0, 0, 'ale.svg', '2022-09-09 08:47:35', '2022-09-09 08:47:35'),
(185, 'Valencian', 'ca-valencia', 0, 0, 0, 'ca-valencia.svg', '2022-09-10 08:47:35', '2022-09-10 08:47:35'),
(186, 'Vai (Latin)', 'vai-Latn', 0, 0, 0, 'vai-Latn.svg', '2022-09-11 08:47:35', '2022-09-11 08:47:35'),
(187, 'Volapük', 'vo', 0, 0, 0, 'vo.svg', '2022-09-12 08:47:35', '2022-09-12 08:47:35'),
(188, 'Fijian', 'fj', 0, 0, 0, 'fj.svg', '2022-09-13 08:47:35', '2022-09-13 08:47:35'),
(189, 'Walloon', 'wa', 0, 0, 0, 'wa.svg', '2022-09-14 08:47:35', '2022-09-14 08:47:35'),
(190, 'Walser', 'wae', 0, 0, 0, 'wae.svg', '2022-09-15 08:47:35', '2022-09-15 08:47:35'),
(191, 'Sorbian', 'wen', 0, 0, 0, 'wen.svg', '2022-09-16 08:47:35', '2022-09-16 08:47:35'),
(192, 'Wolof', 'wo', 0, 0, 0, 'wo.svg', '2022-09-17 08:47:35', '2022-09-17 08:47:35'),
(193, 'Tsonga', 'ts', 0, 0, 0, 'ts.svg', '2022-09-18 08:47:35', '2022-09-18 08:47:35'),
(194, 'Zarma', 'dje', 0, 0, 0, 'dje.svg', '2022-09-19 08:47:35', '2022-09-19 08:47:35'),
(195, 'Yoruba', 'yo', 0, 0, 0, 'yo.svg', '2022-09-20 08:47:35', '2022-09-20 08:47:35'),
(196, 'Austrian German', 'de-AT', 0, 0, 0, 'de-AT.svg', '2022-09-21 08:47:35', '2022-09-21 08:47:35'),
(197, 'Icelandic', 'is', 0, 0, 0, 'is.svg', '2022-09-22 08:47:35', '2022-09-22 08:47:35'),
(198, 'Czech', 'cs', 0, 0, 0, 'cs.svg', '2022-09-23 08:47:35', '2022-09-23 08:47:35'),
(199, 'Basa', 'bas', 0, 0, 0, 'bas.svg', '2022-09-24 08:47:35', '2022-09-24 08:47:35'),
(200, 'Masai', 'mas', 0, 0, 0, 'mas.svg', '2022-09-25 08:47:35', '2022-09-25 08:47:35'),
(201, 'Hawaiian', 'haw', 0, 0, 0, 'haw.svg', '2022-09-26 08:47:35', '2022-09-26 08:47:35'),
(202, 'Greek', 'el', 0, 0, 0, 'el.svg', '2022-09-27 08:47:35', '2022-09-27 08:47:35'),
(203, 'Uzbek (Cyrillic)', 'uz', 0, 0, 0, 'uz.svg', '2022-09-28 08:47:35', '2022-09-28 08:47:35'),
(204, 'Azerbaijani (Cyrillic)', 'az-Cyrl', 0, 0, 0, 'az-Cyrl.svg', '2022-09-29 08:47:35', '2022-09-29 08:47:35'),
(205, 'Abkhazian', 'ab', 0, 0, 0, 'ab.svg', '2022-09-30 08:47:35', '2022-09-30 08:47:35'),
(206, 'Ossetic', 'os', 0, 0, 0, 'os.svg', '2022-10-01 08:47:35', '2022-10-01 08:47:35'),
(207, 'Kyrgyz', 'ky', 0, 0, 0, 'ky.svg', '2022-10-02 08:47:35', '2022-10-02 08:47:35'),
(208, 'Serbian (Cyrillic)', 'sr', 0, 0, 0, 'sr.svg', '2022-10-03 08:47:35', '2022-10-03 08:47:35'),
(209, 'Avaric', 'av', 0, 0, 0, 'av.svg', '2022-10-04 08:47:35', '2022-10-04 08:47:35'),
(210, 'Adyghe', 'ady', 0, 0, 0, 'ady.svg', '2022-10-05 08:47:35', '2022-10-05 08:47:35'),
(211, 'Bashkir', 'ba', 0, 0, 0, 'ba.svg', '2022-10-06 08:47:35', '2022-10-06 08:47:35'),
(212, 'Belarusian', 'be', 0, 0, 0, 'be.svg', '2022-10-07 08:47:35', '2022-10-07 08:47:35'),
(213, 'Bulgarian', 'bg', 0, 0, 0, 'bg.svg', '2022-10-08 08:47:35', '2022-10-08 08:47:35'),
(214, 'Komi', 'kv', 0, 0, 0, 'kv.svg', '2022-10-09 08:47:35', '2022-10-09 08:47:35'),
(215, 'Macedonian', 'mk', 0, 0, 0, 'mk.svg', '2022-10-10 08:47:35', '2022-10-10 08:47:35'),
(216, 'Mongolian (Cyrillic)', 'mn', 0, 0, 0, 'mn.svg', '2022-10-11 08:47:35', '2022-10-11 08:47:35'),
(217, 'Chechen', 'ce', 0, 0, 0, 'ce.svg', '2022-10-12 08:47:35', '2022-10-12 08:47:35'),
(218, 'Russian', 'ru', 0, 0, 0, 'ru.svg', '2022-10-13 08:47:35', '2022-10-13 08:47:35'),
(219, 'Yakut', 'sah', 0, 0, 0, 'sah.svg', '2022-10-14 08:47:35', '2022-10-14 08:47:35'),
(220, 'Tatar', 'tt', 0, 0, 0, 'tt.svg', '2022-10-15 08:47:35', '2022-10-15 08:47:35'),
(221, 'Tajik (Cyrillic)', 'tg', 0, 0, 0, 'tg.svg', '2022-10-16 08:47:35', '2022-10-16 08:47:35'),
(222, 'Turkmen', 'tk', 0, 0, 0, 'tk.svg', '2022-10-17 08:47:35', '2022-10-17 08:47:35'),
(223, 'Ukrainian', 'uk', 0, 0, 0, 'uk.svg', '2022-10-18 08:47:35', '2022-10-18 08:47:35'),
(224, 'Chuvash', 'cv', 0, 0, 0, 'cv.svg', '2022-10-19 08:47:35', '2022-10-19 08:47:35'),
(225, 'Church Slavic', 'cu', 0, 0, 0, 'cu.svg', '2022-10-20 08:47:35', '2022-10-20 08:47:35'),
(226, 'Kazakh', 'kk', 0, 0, 0, 'kk.svg', '2022-10-21 08:47:35', '2022-10-21 08:47:35'),
(227, 'Armenian', 'hy', 0, 0, 0, 'hy.svg', '2022-10-22 08:47:35', '2022-10-22 08:47:35'),
(228, 'Yiddish', 'yi', 0, 0, 0, 'yi.svg', '2022-10-23 08:47:35', '2022-10-23 08:47:35'),
(229, 'Hebrew', 'he', 0, 0, 0, 'he.svg', '2022-10-24 08:47:35', '2022-10-24 08:47:35'),
(230, 'Uyghur', 'ug', 0, 0, 0, 'ug.svg', '2022-10-25 08:47:35', '2022-10-25 08:47:35'),
(231, 'Urdu', 'ur', 0, 0, 0, 'ur.svg', '2022-10-26 08:47:35', '2022-10-26 08:47:35'),
(232, 'Uzbek (Arabic)', 'uz-Arab', 0, 0, 0, 'uz-Arab.svg', '2022-10-28 08:47:35', '2022-10-28 08:47:35'),
(233, 'Tajik (Arabic)', 'tg-Arab', 0, 0, 0, 'tg-Arab.svg', '2022-10-29 08:47:35', '2022-10-29 08:47:35'),
(234, 'Sindhi', 'sd', 0, 0, 0, 'sd.svg', '2022-10-30 10:47:35', '2022-10-30 10:47:35'),
(235, 'Persian', 'fa', 0, 0, 0, 'fa.svg', '2022-10-31 10:47:35', '2022-10-31 10:47:35'),
(236, 'Punjabi (Arabic)', 'pa-Arab', 0, 0, 0, 'pa-Arab.svg', '2022-11-01 10:47:35', '2022-11-01 10:47:35'),
(237, 'Pashto', 'ps', 0, 0, 0, 'ps.svg', '2022-11-02 10:47:35', '2022-11-02 10:47:35'),
(238, 'Kashmiri (Arabic)', 'ks', 0, 0, 0, 'ks.svg', '2022-11-03 10:47:35', '2022-11-03 10:47:35'),
(239, 'Kurdish', 'ku', 0, 0, 0, 'ku.svg', '2022-11-04 10:47:35', '2022-11-04 10:47:35'),
(240, 'Divehi', 'dv', 0, 0, 0, 'dv.svg', '2022-11-05 10:47:35', '2022-11-05 10:47:35'),
(241, 'Kashmiri (Devaganari)', 'ks-Deva', 0, 0, 0, 'ks-Deva.svg', '2022-11-06 10:47:35', '2022-11-06 10:47:35'),
(242, 'Konkani', 'kok', 0, 0, 0, 'kok.svg', '2022-11-07 10:47:35', '2022-11-07 10:47:35'),
(243, 'Dogri', 'doi', 0, 0, 0, 'doi.svg', '2022-11-08 10:47:35', '2022-11-08 10:47:35'),
(244, 'Nepali', 'ne', 0, 0, 0, 'ne.svg', '2022-11-09 10:47:35', '2022-11-09 10:47:35'),
(245, 'Prakrit', 'pra', 0, 0, 0, 'pra.svg', '2022-11-10 10:47:35', '2022-11-10 10:47:35'),
(246, 'Bodo', 'brx', 0, 0, 0, 'brx.svg', '2022-11-11 10:47:35', '2022-11-11 10:47:35'),
(247, 'Braj', 'bra', 0, 0, 0, 'bra.svg', '2022-11-12 10:47:35', '2022-11-12 10:47:35'),
(248, 'Marathi', 'mr', 0, 0, 0, 'mr.svg', '2022-11-13 10:47:35', '2022-11-13 10:47:35'),
(249, 'Maithili', 'mai', 0, 0, 0, 'mai.svg', '2022-11-14 10:47:35', '2022-11-14 10:47:35'),
(250, 'Rajasthani', 'raj', 0, 0, 0, 'raj.svg', '2022-11-15 10:47:35', '2022-11-15 10:47:35'),
(251, 'Sanskrit', 'sa', 0, 0, 0, 'sa.svg', '2022-11-16 10:47:35', '2022-11-16 10:47:35'),
(252, 'Hindi', 'hi', 0, 0, 0, 'hi.svg', '2022-11-17 10:47:35', '2022-11-17 10:47:35'),
(253, 'Assamese', 'as', 0, 0, 0, 'as.svg', '2022-11-18 10:47:35', '2022-11-18 10:47:35'),
(254, 'Bengali', 'bn', 0, 0, 0, 'bn.svg', '2022-11-19 10:47:35', '2022-11-19 10:47:35'),
(255, 'Manipuri', 'mni', 0, 0, 0, 'mni.svg', '2022-11-20 10:47:35', '2022-11-20 10:47:35'),
(256, 'Punjabi (Gurmukhi)', 'pa', 0, 0, 0, 'pa.svg', '2022-11-21 10:47:35', '2022-11-21 10:47:35'),
(257, 'Gujarati', 'gu', 0, 0, 0, 'gu.svg', '2022-11-22 10:47:35', '2022-11-22 10:47:35'),
(258, 'Oriya', 'or', 0, 0, 0, 'or.svg', '2022-11-23 10:47:35', '2022-11-23 10:47:35'),
(259, 'Tamil', 'ta', 0, 0, 0, 'ta.svg', '2022-11-24 10:47:35', '2022-11-24 10:47:35'),
(260, 'Telugu', 'te', 0, 0, 0, 'te.svg', '2022-11-25 10:47:35', '2022-11-25 10:47:35'),
(261, 'Kannada', 'kn', 0, 0, 0, 'kn.svg', '2022-11-26 10:47:35', '2022-11-26 10:47:35'),
(262, 'Malayalam', 'ml', 0, 0, 0, 'ml.svg', '2022-11-27 10:47:35', '2022-11-27 10:47:35'),
(263, 'Sinhala', 'si', 0, 0, 0, 'si.svg', '2022-11-28 10:47:35', '2022-11-28 10:47:35'),
(264, 'Thai', 'th', 0, 0, 0, 'th.svg', '2022-11-29 10:47:35', '2022-11-29 10:47:35'),
(265, 'Lao', 'lo', 0, 0, 0, 'lo.svg', '2022-11-30 10:47:35', '2022-11-30 10:47:35'),
(266, 'Tibetan', 'bo', 0, 0, 0, 'bo.svg', '2022-12-01 10:47:35', '2022-12-01 10:47:35'),
(267, 'Dzongkha', 'dz', 0, 0, 0, 'dz.svg', '2022-12-02 10:47:35', '2022-12-02 10:47:35'),
(268, 'Burmese', 'my', 0, 0, 0, 'my.svg', '2022-12-03 10:47:35', '2022-12-03 10:47:35'),
(269, 'Georgian', 'ka', 0, 0, 0, 'ka.svg', '2022-12-04 10:47:35', '2022-12-04 10:47:35'),
(270, 'Blin', 'byn', 0, 0, 0, 'byn.svg', '2022-12-05 10:47:35', '2022-12-05 10:47:35'),
(271, 'Tigre', 'tig', 0, 0, 0, 'tig.svg', '2022-12-06 10:47:35', '2022-12-06 10:47:35'),
(272, 'Tigrinya', 'ti', 0, 0, 0, 'ti.svg', '2022-12-07 10:47:35', '2022-12-07 10:47:35'),
(273, 'Amharic', 'am', 0, 0, 0, 'am.svg', '2022-12-08 10:47:35', '2022-12-08 10:47:35'),
(274, 'Wolaytta', 'wal', 0, 0, 0, 'wal.svg', '2022-12-09 10:47:35', '2022-12-09 10:47:35'),
(275, 'Cherokee', 'chr', 0, 0, 0, 'chr.svg', '2022-12-10 10:47:35', '2022-12-10 10:47:35'),
(276, 'Inuktitut (Canadian Aboriginal Syllabics)', 'iu', 0, 0, 0, 'iu.svg', '2022-12-11 10:47:35', '2022-12-11 10:47:35'),
(277, 'Ojibwa', 'oj', 0, 0, 0, 'oj.svg', '2022-12-12 10:47:35', '2022-12-12 10:47:35'),
(278, 'Cree', 'cr', 0, 0, 0, 'cr.svg', '2022-12-13 10:47:35', '2022-12-13 10:47:35'),
(279, 'Khmer', 'km', 0, 0, 0, 'km.svg', '2022-12-14 10:47:35', '2022-12-14 10:47:35'),
(280, 'Mongolian (Mongolian)', 'mn-Mong', 0, 0, 0, 'mn-Mong.svg', '2022-12-15 10:47:35', '2022-12-15 10:47:35'),
(281, 'Tachelhit (Tifinagh)', 'shi-Tfng', 0, 0, 0, 'shi-Tfng.svg', '2022-12-16 10:47:35', '2022-12-16 10:47:35'),
(282, 'Central Atlas Tamazight (Tifinagh)', 'tzm', 0, 0, 0, 'tzm.svg', '2022-12-17 10:47:35', '2022-12-17 10:47:35'),
(283, 'Yue', 'yue', 0, 0, 0, 'yue.svg', '2022-12-18 10:47:35', '2022-12-18 10:47:35'),
(284, 'Japanese', 'ja', 0, 0, 0, 'ja.svg', '2022-12-19 10:47:35', '2022-12-19 10:47:35'),
(285, 'Chinese (Simplified)', 'zh', 0, 0, 0, 'zh.svg', '2022-12-20 10:47:35', '2022-12-20 10:47:35'),
(286, 'Chinese (Traditional)', 'zh-Hant', 0, 0, 0, 'zh-Hant.svg', '2022-12-21 10:47:35', '2022-12-21 10:47:35'),
(287, 'Sichuan Yi', 'ii', 0, 0, 0, 'ii.svg', '2022-12-22 10:47:35', '2022-12-22 10:47:35'),
(288, 'Vai (Vai)', 'vai', 0, 0, 0, 'vai.svg', '2022-12-23 10:47:35', '2022-12-23 10:47:35'),
(289, 'Javanese (Javanese)', 'jv-Java', 0, 0, 0, 'jv-Java.svg', '2022-12-24 10:47:35', '2022-12-24 10:47:35'),
(290, 'Korean', 'ko', 0, 0, 0, 'ko.svg', '2022-12-25 10:47:35', '2022-12-25 10:47:35');

-- --------------------------------------------------------

--
-- Structure de la table `language_translates`
--

CREATE TABLE `language_translates` (
  `id` bigint UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint NOT NULL DEFAULT '1',
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `language_translates`
--

INSERT INTO `language_translates` (`id`, `model`, `language_id`, `label`, `translation`, `created_at`, `updated_at`) VALUES
(1, 'Navigation', 1, 'navigation_navigation_dashboard', ' dashboard', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(2, 'Navigation', 1, 'navigation_navigation_manage_users', ' Manage Users', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(3, 'Navigation', 1, 'navigation_navigation_permissions', ' roles and permissions', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(4, 'Navigation', 1, 'navigation_navigation_roles_list', ' roles list', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(5, 'Navigation', 1, 'navigation_navigation_users_list', ' users list', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(6, 'Navigation', 1, 'navigation_navigation_countries', ' countries', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(7, 'Navigation', 1, 'navigation_navigation_manage_language', ' languages', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(8, 'Navigation', 1, 'navigation_navigation_language_translation', 'language translation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(9, 'General', 1, 'general_general_action', 'Action', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(10, 'General', 1, 'general_general_save', 'Save', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(11, 'General', 1, 'general_general_update', 'Update', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(12, 'General', 1, 'general_general_close', 'Close', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(13, 'General', 1, 'general_general_return', 'Return', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(14, 'General', 1, 'general_general_configuration', 'Configuration', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(15, 'General', 1, 'general_general_search', 'Search', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(16, 'General', 1, 'general_general_add', 'Add', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(17, 'General', 1, 'general_general_select', 'Choose One', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(18, 'General', 1, 'general_general_super', 'Super', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(19, 'General', 1, 'general_general_delete_selected', 'Delete selected', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(20, 'General', 1, 'general_general_restore_selected', 'Restore selected', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(21, 'General', 1, 'general_general_activate_selected', 'Activate selected', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(22, 'Language', 1, 'language_action_add', 'Add language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(23, 'Language', 1, 'language_action_show', 'Show language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(24, 'Language', 1, 'language_action_edit', 'Edit language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(25, 'Language', 1, 'language_action_delete', 'Delete language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(26, 'Language', 1, 'language_action_restore', 'Restore language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(27, 'Language', 1, 'language_message_add', 'Language successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(28, 'Language', 1, 'language_message_show', 'Language successfully showed', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(29, 'Language', 1, 'language_message_edit', 'Language successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(30, 'Language', 1, 'language_message_delete', 'Language successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(31, 'Language', 1, 'language_message_restore', 'Language successfully restored', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(32, 'Language', 1, 'language_message_activated', 'Language has been successfully activated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(33, 'Language', 1, 'language_message_inactivated', 'Language has been successfully inactivated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(34, 'Language', 1, 'language_form_manage_languages', 'Manage languages', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(35, 'Language', 1, 'language_form_languages_list', 'List of languages', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(36, 'Language', 1, 'language_form_deleted_languages_list', 'List deleted languages', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(37, 'Language', 1, 'language_form_manage_deleted_languages', 'Manage deleted languages', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(38, 'Language', 1, 'language_table_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(39, 'Language', 1, 'language_form_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(40, 'Language', 1, 'language_form_name_placeholder', 'Enter name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(41, 'Language', 1, 'language_table_locale', 'Locale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(42, 'Language', 1, 'language_form_locale', 'Locale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(43, 'Language', 1, 'language_form_locale_placeholder', 'Enter locale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(44, 'Language', 1, 'language_table_isDefault', 'IsDefault', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(45, 'Language', 1, 'language_form_isDefault', 'IsDefault', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(46, 'Language', 1, 'language_form_isDefault_placeholder', 'Enter isDefault', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(47, 'Language', 1, 'language_table_status', 'Status', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(48, 'Language', 1, 'language_form_status', 'Status', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(49, 'Language', 1, 'language_form_status_placeholder', 'Enter status', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(50, 'Language', 1, 'language_table_visible', 'Visible', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(51, 'Language', 1, 'language_form_visible', 'Visible', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(52, 'Language', 1, 'language_form_visible_placeholder', 'Enter visible', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(53, 'Language', 1, 'language_table_flag_path', 'Flag path', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(54, 'Language', 1, 'language_form_flag_path', 'Flag path', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(55, 'Language', 1, 'language_form_flag_path_placeholder', 'Enter flag path', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(56, 'Language', 1, 'language_table_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(57, 'Language', 1, 'language_form_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(58, 'Language', 1, 'language_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(59, 'Language', 1, 'language_table_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(60, 'Language', 1, 'language_form_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(61, 'Language', 1, 'language_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(62, 'Role', 1, 'role_action_add', 'Add role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(63, 'Role', 1, 'role_action_show', 'Show role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(64, 'Role', 1, 'role_action_edit', 'Edit role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(65, 'Role', 1, 'role_action_delete', 'Delete role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(66, 'Role', 1, 'role_action_restore', 'Restore role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(67, 'Role', 1, 'role_message_add', 'Role successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(68, 'Role', 1, 'role_message_show', 'Role successfully showed', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(69, 'Role', 1, 'role_message_edit', 'Role successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(70, 'Role', 1, 'role_message_delete', 'Role successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(71, 'Role', 1, 'role_message_restore', 'Role successfully restored', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(72, 'Role', 1, 'role_message_activated', 'Role has been successfully activated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(73, 'Role', 1, 'role_message_inactivated', 'Role has been successfully inactivated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(74, 'Role', 1, 'role_form_manage_roles', 'Manage roles', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(75, 'Role', 1, 'role_form_roles_list', 'List of roles', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(76, 'Role', 1, 'role_form_deleted_roles_list', 'List deleted roles', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(77, 'Role', 1, 'role_form_manage_deleted_roles', 'Manage deleted roles', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(78, 'Role', 1, 'role_table_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(79, 'Role', 1, 'role_form_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(80, 'Role', 1, 'role_form_name_placeholder', 'Enter name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(81, 'Role', 1, 'role_table_guard_name', 'Guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(82, 'Role', 1, 'role_form_guard_name', 'Guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(83, 'Role', 1, 'role_form_guard_name_placeholder', 'Enter guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(84, 'Role', 1, 'role_table_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(85, 'Role', 1, 'role_form_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(86, 'Role', 1, 'role_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(87, 'Role', 1, 'role_table_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(88, 'Role', 1, 'role_form_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(89, 'Role', 1, 'role_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(90, 'User', 1, 'user_action_add', 'Add user', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(91, 'User', 1, 'user_action_show', 'Show user', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(92, 'User', 1, 'user_action_edit', 'Edit user', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(93, 'User', 1, 'user_action_delete', 'Delete user', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(94, 'User', 1, 'user_action_restore', 'Restore user', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(95, 'User', 1, 'user_message_add', 'User successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(96, 'User', 1, 'user_message_show', 'User successfully showed', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(97, 'User', 1, 'user_message_edit', 'User successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(98, 'User', 1, 'user_message_delete', 'User successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(99, 'User', 1, 'user_message_restore', 'User successfully restored', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(100, 'User', 1, 'user_message_activated', 'User has been successfully activated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(101, 'User', 1, 'user_message_inactivated', 'User has been successfully inactivated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(102, 'User', 1, 'user_form_manage_users', 'Manage users', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(103, 'User', 1, 'user_form_users_list', 'List of users', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(104, 'User', 1, 'user_form_deleted_users_list', 'List deleted users', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(105, 'User', 1, 'user_form_manage_deleted_users', 'Manage deleted users', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(106, 'User', 1, 'user_table_uuid', 'Uuid', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(107, 'User', 1, 'user_form_uuid', 'Uuid', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(108, 'User', 1, 'user_form_uuid_placeholder', 'Enter uuid', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(109, 'User', 1, 'user_table_first_name', 'First name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(110, 'User', 1, 'user_form_first_name', 'First name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(111, 'User', 1, 'user_form_first_name_placeholder', 'Enter first name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(112, 'User', 1, 'user_table_last_name', 'Last name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(113, 'User', 1, 'user_form_last_name', 'Last name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(114, 'User', 1, 'user_form_last_name_placeholder', 'Enter last name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(115, 'User', 1, 'user_table_username', 'Username', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(116, 'User', 1, 'user_form_username', 'Username', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(117, 'User', 1, 'user_form_username_placeholder', 'Enter username', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(118, 'User', 1, 'user_table_occupation', 'Occupation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(119, 'User', 1, 'user_form_occupation', 'Occupation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(120, 'User', 1, 'user_form_occupation_placeholder', 'Enter occupation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(121, 'User', 1, 'user_table_email', 'Email', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(122, 'User', 1, 'user_form_email', 'Email', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(123, 'User', 1, 'user_form_email_placeholder', 'Enter email', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(124, 'User', 1, 'user_table_email_verified_at', 'Email verified at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(125, 'User', 1, 'user_form_email_verified_at', 'Email verified at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(126, 'User', 1, 'user_form_email_verified_at_placeholder', 'Enter email verified at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(127, 'User', 1, 'user_table_language_id', 'Language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(128, 'User', 1, 'user_form_language_id', 'Language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(129, 'User', 1, 'user_form_language_id_placeholder', 'Enter language', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(130, 'User', 1, 'user_table_password', 'Password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(131, 'User', 1, 'user_form_password', 'Password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(132, 'User', 1, 'user_form_password_placeholder', 'Enter password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(133, 'User', 1, 'user_table_isactive', 'Isactive', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(134, 'User', 1, 'user_form_isactive', 'Isactive', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(135, 'User', 1, 'user_form_isactive_placeholder', 'Enter isactive', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(136, 'User', 1, 'user_table_country_id', 'Country', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(137, 'User', 1, 'user_form_country_id', 'Country', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(138, 'User', 1, 'user_form_country_id_placeholder', 'Enter country', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(139, 'User', 1, 'user_table_state_id', 'State', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(140, 'User', 1, 'user_form_state_id', 'State', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(141, 'User', 1, 'user_form_state_placeholder', 'Enter state', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(142, 'User', 1, 'user_table_city_id', 'City', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(143, 'User', 1, 'user_form_city_id', 'City', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(144, 'User', 1, 'user_form_city_placeholder', 'Enter city', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(145, 'User', 1, 'user_table_phone', 'Phone', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(146, 'User', 1, 'user_form_phone', 'Phone', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(147, 'User', 1, 'user_form_phone_placeholder', 'Enter phone', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(148, 'User', 1, 'user_table_picture', 'User', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(149, 'User', 1, 'user_form_picture', 'Picture', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(150, 'User', 1, 'user_form_picture_placeholder', 'Enter picture', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(151, 'User', 1, 'user_table_roles_name', 'Role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(152, 'User', 1, 'user_form_roles_name', 'Roles name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(153, 'User', 1, 'user_form_roles_name_placeholder', 'Enter roles name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(154, 'User', 1, 'user_table_address', 'Address', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(155, 'User', 1, 'user_form_address', 'Address', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(156, 'User', 1, 'user_form_address_placeholder', 'Enter address', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(157, 'User', 1, 'user_table_code_postale', 'Code postale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(158, 'User', 1, 'user_form_code_postale', 'Code postale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(159, 'User', 1, 'user_form_code_postale_placeholder', 'Enter code postale', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(160, 'User', 1, 'user_table_gender', 'Gender', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(161, 'User', 1, 'user_form_gender', 'Gender', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(162, 'User', 1, 'user_form_gender_placeholder', 'Enter gender', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(163, 'User', 1, 'user_table_isSuperAdmin', 'IsSuperAdmin', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(164, 'User', 1, 'user_form_isSuperAdmin', 'IsSuperAdmin', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(165, 'User', 1, 'user_form_isSuperAdmin_placeholder', 'Enter isSuperAdmin', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(166, 'User', 1, 'user_table_last_login_at', 'Last login at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(167, 'User', 1, 'user_form_last_login_at', 'Last login at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(168, 'User', 1, 'user_form_last_login_at_placeholder', 'Enter last login at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(169, 'User', 1, 'user_table_last_login_ip', 'Last login ip', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(170, 'User', 1, 'user_form_last_login_ip', 'Last login ip', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(171, 'User', 1, 'user_form_last_login_ip_placeholder', 'Enter last login ip', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(172, 'User', 1, 'user_table_remember_token', 'Remember token', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(173, 'User', 1, 'user_form_remember_token', 'Remember token', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(174, 'User', 1, 'user_form_remember_token_placeholder', 'Enter remember token', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(175, 'User', 1, 'user_table_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(176, 'User', 1, 'user_form_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(177, 'User', 1, 'user_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(178, 'User', 1, 'user_table_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(179, 'User', 1, 'user_form_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(180, 'User', 1, 'user_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(181, 'User', 1, 'user_table_deleted_at', 'Deleted at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(182, 'User', 1, 'user_form_deleted_at', 'Deleted at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(183, 'User', 1, 'user_form_deleted_at_placeholder', 'Enter deleted at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(184, 'User', 1, 'user_form_password_confirmation', 'Confirm password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(185, 'User', 1, 'user_form_password_confirmation_placeholder', 'Confirm password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(186, 'User', 1, 'user_form_old_password', 'Old password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(187, 'User', 1, 'user_form_old_password_placeholder', 'Enter the old password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(188, 'User', 1, 'user_form_new_password', 'New password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(189, 'User', 1, 'user_form_confirm_new_password', 'Confirm password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(190, 'User', 1, 'user_form_overview', 'Overview', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(191, 'User', 1, 'user_form_new_password_placeholder', 'Enter the new password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(192, 'User', 1, 'user_form_new_password_confirmation', 'New password confirmation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(193, 'User', 1, 'user_form_security', 'Security', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(194, 'User', 1, 'user_form_new_password_confirmation_placeholder', 'Enter new password confirmation', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(195, 'User', 1, 'user_form_change_password', 'Change', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(196, 'User', 1, 'user_form_change_email_role', 'Change email and role', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(197, 'User', 1, 'user_message_current_password_error', 'There is an error in the current password', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(198, 'User', 1, 'user_message_update_email_role', 'The email and role have been successfully updated.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(199, 'User', 1, 'user_message_picture', 'The picture have been successfully updated.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(200, 'User', 1, 'user_message_overview', 'The overview have been successfully updated.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(201, 'User', 1, 'user_message_password', 'The password have been successfully updated.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(202, 'Setting', 1, 'setting_action_edit', 'Edit setting', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(203, 'Setting', 1, 'setting_action_delete', 'Delete setting', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(204, 'Setting', 1, 'setting_message_store', 'Setting successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(205, 'Setting', 1, 'setting_message_update', 'Setting successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(206, 'Setting', 1, 'setting_message_delete', 'Setting successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(207, 'Setting', 1, 'setting_table_general', 'General', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(208, 'Setting', 1, 'setting_form_settings', 'Settings', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(209, 'Setting', 1, 'setting_form_system_name', 'System name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(210, 'Setting', 1, 'setting_form_title', 'Title', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(211, 'Setting', 1, 'setting_form_address', 'Address', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(212, 'Setting', 1, 'setting_form_phone', 'Phone', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(213, 'Setting', 1, 'setting_form_system_name_placeholder', 'Enter system name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(214, 'Setting', 1, 'setting_form_title_placeholder', 'Enter the title', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(215, 'Setting', 1, 'setting_form_address_placeholder', 'Enter the  adresse', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(216, 'Setting', 1, 'setting_form_copyrigth', 'Copyrigth', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(217, 'Setting', 1, 'setting_form_copyrigth_placeholder', 'Enter the  copyrigth', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(218, 'Setting', 1, 'setting_form_email', 'Email', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(219, 'Setting', 1, 'setting_form_email_placeholder', 'Enter the email', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(220, 'Setting', 1, 'setting_form_phone_placeholder', 'Enter the phone', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(221, 'Setting', 1, 'setting_form_manage_settings', 'Manage settings', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(222, 'Setting', 1, 'setting_form_settings_list', 'Setting list', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(223, 'Setting', 1, 'setting_form_logo', 'Logo', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(224, 'Setting', 1, 'setting_form_email_logo', 'Email logo', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(225, 'Setting', 1, 'setting_form_favicon', 'Favicon', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(226, 'Permission', 1, 'permission_action_add', 'Add permission', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(227, 'Permission', 1, 'permission_action_show', 'Show permission', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(228, 'Permission', 1, 'permission_action_edit', 'Edit permission', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(229, 'Permission', 1, 'permission_action_delete', 'Delete permission', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(230, 'Permission', 1, 'permission_action_restore', 'Restore permission', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(231, 'Permission', 1, 'permission_message_add', 'Permission successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(232, 'Permission', 1, 'permission_message_show', 'Permission successfully showed', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(233, 'Permission', 1, 'permission_message_edit', 'Permission successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(234, 'Permission', 1, 'permission_message_delete', 'Permission successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(235, 'Permission', 1, 'permission_message_restore', 'Permission successfully restored', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(236, 'Permission', 1, 'permission_message_activated', 'Permission has been successfully activated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(237, 'Permission', 1, 'permission_message_inactivated', 'Permission has been successfully inactivated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(238, 'Permission', 1, 'permission_form_manage_permissions', 'Manage permissions', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(239, 'Permission', 1, 'permission_form_permissions_list', 'List of permissions', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(240, 'Permission', 1, 'permission_form_deleted_permissions_list', 'List deleted permissions', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(241, 'Permission', 1, 'permission_form_manage_deleted_permissions', 'Manage deleted permissions', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(242, 'Permission', 1, 'permission_message_delete_multiple', 'Selected permissions have been successfully deleted.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(243, 'Permission', 1, 'permission_message_fail_delete_multiple', 'Failed to delete the selected permissions. Please try again.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(244, 'Permission', 1, 'permission_message_restore_multiple', 'Selected permissions have been successfully restored.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(245, 'Permission', 1, 'permission_message_fail_restore_multiple', 'Failed to restore the selected permissions. Please try again.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(246, 'Permission', 1, 'permission_message_activate_multiple', 'Selected permissions have been successfully activated.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(247, 'Permission', 1, 'permission_message_fail_activate_multiple', 'Failed to activate the selected permissions. Please try again.', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(248, 'Permission', 1, 'permission_table_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(249, 'Permission', 1, 'permission_form_name', 'Name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(250, 'Permission', 1, 'permission_form_name_placeholder', 'Enter name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(251, 'Permission', 1, 'permission_table_libele', 'Libele', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(252, 'Permission', 1, 'permission_form_libele', 'Libele', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(253, 'Permission', 1, 'permission_form_libele_placeholder', 'Enter libele', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(254, 'Permission', 1, 'permission_table_guard_name', 'Guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(255, 'Permission', 1, 'permission_form_guard_name', 'Guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(256, 'Permission', 1, 'permission_form_guard_name_placeholder', 'Enter guard name', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(257, 'Permission', 1, 'permission_table_groupe_id', 'Groupe', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(258, 'Permission', 1, 'permission_form_groupe_id', 'Groupe', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(259, 'Permission', 1, 'permission_form_groupe_id_placeholder', 'Enter groupe', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(260, 'Permission', 1, 'permission_table_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(261, 'Permission', 1, 'permission_form_created_at', 'Created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(262, 'Permission', 1, 'permission_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(263, 'Permission', 1, 'permission_table_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(264, 'Permission', 1, 'permission_form_updated_at', 'Updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(265, 'Permission', 1, 'permission_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(266, 'LanguageTranslate', 1, 'languagetranslate_action_add', 'Add languagetranslate', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(267, 'LanguageTranslate', 1, 'languagetranslate_action_show', 'Show languagetranslate', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(268, 'LanguageTranslate', 1, 'languagetranslate_action_edit', 'Edit languagetranslate', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(269, 'LanguageTranslate', 1, 'languagetranslate_action_delete', 'Delete languagetranslate', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(270, 'LanguageTranslate', 1, 'languagetranslate_action_restore', 'Restore languagetranslate', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(271, 'LanguageTranslate', 1, 'languagetranslate_message_add', 'LanguageTranslate successfully created', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(272, 'LanguageTranslate', 1, 'languagetranslate_message_show', 'LanguageTranslate successfully showed', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(273, 'LanguageTranslate', 1, 'languagetranslate_message_edit', 'LanguageTranslate successfully updated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(274, 'LanguageTranslate', 1, 'languagetranslate_message_delete', 'LanguageTranslate successfully deleted', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(275, 'LanguageTranslate', 1, 'languagetranslate_message_restore', 'LanguageTranslate successfully restored', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(276, 'LanguageTranslate', 1, 'languagetranslate_message_activated', 'LanguageTranslate has been successfully activated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(277, 'LanguageTranslate', 1, 'languagetranslate_message_inactivated', 'LanguageTranslate has been successfully inactivated', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(278, 'LanguageTranslate', 1, 'languagetranslate_form_manage_languagetranslates', 'Manage languagetranslates', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(279, 'LanguageTranslate', 1, 'languagetranslate_form_languagetranslates_list', 'List of languagetranslates', '2024-12-28 18:38:42', '2024-12-28 18:38:42'),
(280, 'LanguageTranslate', 1, 'languagetranslate_form_deleted_languagetranslates_list', 'List deleted languagetranslates', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(281, 'LanguageTranslate', 1, 'languagetranslate_form_manage_deleted_languagetranslates', 'Manage deleted languagetranslates', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(282, 'LanguageTranslate', 1, 'languagetranslate_message_delete_multiple', 'Selected languagetranslates have been successfully deleted.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(283, 'LanguageTranslate', 1, 'languagetranslate_message_fail_delete_multiple', 'Failed to delete the selected languagetranslates. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(284, 'LanguageTranslate', 1, 'languagetranslate_message_restore_multiple', 'Selected languagetranslates have been successfully restored.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(285, 'LanguageTranslate', 1, 'languagetranslate_message_fail_restore_multiple', 'Failed to restore the selected languagetranslates. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(286, 'LanguageTranslate', 1, 'languagetranslate_message_activate_multiple', 'Selected languagetranslates have been successfully activated.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(287, 'LanguageTranslate', 1, 'languagetranslate_message_fail_activate_multiple', 'Failed to activate the selected languagetranslates. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(288, 'LanguageTranslate', 1, 'navigation_navigation_languagetranslates', 'languagetranslates', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(289, 'LanguageTranslate', 1, 'languagetranslate_table_model', 'Model', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(290, 'LanguageTranslate', 1, 'languagetranslate_form_model', 'Model', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(291, 'LanguageTranslate', 1, 'languagetranslate_form_model_placeholder', 'Enter model', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(292, 'LanguageTranslate', 1, 'languagetranslate_table_language_id', 'Language', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(293, 'LanguageTranslate', 1, 'languagetranslate_form_language_id', 'Language', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(294, 'LanguageTranslate', 1, 'languagetranslate_form_language_id_placeholder', 'Enter language', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(295, 'LanguageTranslate', 1, 'languagetranslate_table_label', 'Label', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(296, 'LanguageTranslate', 1, 'languagetranslate_form_label', 'Label', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(297, 'LanguageTranslate', 1, 'languagetranslate_form_label_placeholder', 'Enter label', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(298, 'LanguageTranslate', 1, 'languagetranslate_table_translation', 'Translation', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(299, 'LanguageTranslate', 1, 'languagetranslate_form_translation', 'Translation', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(300, 'LanguageTranslate', 1, 'languagetranslate_form_translation_placeholder', 'Enter translation', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(301, 'LanguageTranslate', 1, 'languagetranslate_table_created_at', 'Created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(302, 'LanguageTranslate', 1, 'languagetranslate_form_created_at', 'Created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(303, 'LanguageTranslate', 1, 'languagetranslate_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(304, 'LanguageTranslate', 1, 'languagetranslate_table_updated_at', 'Updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(305, 'LanguageTranslate', 1, 'languagetranslate_form_updated_at', 'Updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(306, 'LanguageTranslate', 1, 'languagetranslate_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(307, 'LanguageTranslate', 1, 'languagetranslate_form_sync', 'Translation synced successfully', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(308, 'Sidebar', 1, 'sidebar_action_add', 'Add sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(309, 'Sidebar', 1, 'sidebar_action_show', 'Show sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(310, 'Sidebar', 1, 'sidebar_action_edit', 'Edit sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(311, 'Sidebar', 1, 'sidebar_action_delete', 'Delete sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(312, 'Sidebar', 1, 'sidebar_action_restore', 'Restore sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(313, 'Sidebar', 1, 'sidebar_message_add', 'Sidebar successfully created', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(314, 'Sidebar', 1, 'sidebar_message_show', 'Sidebar successfully showed', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(315, 'Sidebar', 1, 'sidebar_message_edit', 'Sidebar successfully updated', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(316, 'Sidebar', 1, 'sidebar_message_delete', 'Sidebar successfully deleted', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(317, 'Sidebar', 1, 'sidebar_message_restore', 'Sidebar successfully restored', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(318, 'Sidebar', 1, 'sidebar_message_activated', 'Sidebar has been successfully activated', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(319, 'Sidebar', 1, 'sidebar_message_inactivated', 'Sidebar has been successfully inactivated', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(320, 'Sidebar', 1, 'sidebar_form_manage_sidebars', 'Manage sidebars', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(321, 'Sidebar', 1, 'sidebar_form_sidebars_list', 'List of sidebars', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(322, 'Sidebar', 1, 'sidebar_form_deleted_sidebars_list', 'List deleted sidebars', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(323, 'Sidebar', 1, 'sidebar_form_manage_deleted_sidebars', 'Manage deleted sidebars', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(324, 'Sidebar', 1, 'sidebar_message_delete_multiple', 'Selected sidebars have been successfully deleted.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(325, 'Sidebar', 1, 'sidebar_message_fail_delete_multiple', 'Failed to delete the selected sidebars. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(326, 'Sidebar', 1, 'sidebar_message_restore_multiple', 'Selected sidebars have been successfully restored.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(327, 'Sidebar', 1, 'sidebar_message_fail_restore_multiple', 'Failed to restore the selected sidebars. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(328, 'Sidebar', 1, 'sidebar_message_activate_multiple', 'Selected sidebars have been successfully activated.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(329, 'Sidebar', 1, 'sidebar_message_fail_activate_multiple', 'Failed to activate the selected sidebars. Please try again.', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(330, 'Sidebar', 1, 'navigation_navigation_sidebars', 'sidebars', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(331, 'Sidebar', 1, 'sidebar_table_name', 'Name', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(332, 'Sidebar', 1, 'sidebar_form_name', 'Name', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(333, 'Sidebar', 1, 'sidebar_form_name_placeholder', 'Enter name', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(334, 'Sidebar', 1, 'sidebar_table_icon', 'Icon', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(335, 'Sidebar', 1, 'sidebar_form_icon', 'Icon', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(336, 'Sidebar', 1, 'sidebar_form_icon_placeholder', 'Enter icon', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(337, 'Sidebar', 1, 'sidebar_table_permission', 'Permission', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(338, 'Sidebar', 1, 'sidebar_form_permission', 'Permission', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(339, 'Sidebar', 1, 'sidebar_form_permission_placeholder', 'Enter permission', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(340, 'Sidebar', 1, 'sidebar_table_sidebar_id', 'Sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(341, 'Sidebar', 1, 'sidebar_form_sidebar_id', 'Sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(342, 'Sidebar', 1, 'sidebar_form_sidebar_id_placeholder', 'Enter sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(343, 'Sidebar', 1, 'sidebar_table_order', 'Order', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(344, 'Sidebar', 1, 'sidebar_form_order', 'Order', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(345, 'Sidebar', 1, 'sidebar_form_order_placeholder', 'Enter order', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(346, 'Sidebar', 1, 'sidebar_table_route', 'Route', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(347, 'Sidebar', 1, 'sidebar_form_route', 'Route', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(348, 'Sidebar', 1, 'sidebar_form_route_placeholder', 'Enter route', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(349, 'Sidebar', 1, 'sidebar_table_type', 'Type', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(350, 'Sidebar', 1, 'sidebar_form_type', 'Type', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(351, 'Sidebar', 1, 'sidebar_form_type_placeholder', 'Enter type', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(352, 'Sidebar', 1, 'sidebar_table_created_at', 'Created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(353, 'Sidebar', 1, 'sidebar_form_created_at', 'Created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(354, 'Sidebar', 1, 'sidebar_form_created_at_placeholder', 'Enter created at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(355, 'Sidebar', 1, 'sidebar_table_updated_at', 'Updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(356, 'Sidebar', 1, 'sidebar_form_updated_at', 'Updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(357, 'Sidebar', 1, 'sidebar_form_updated_at_placeholder', 'Enter updated at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(358, 'Sidebar', 1, 'sidebar_table_deleted_at', 'Deleted at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(359, 'Sidebar', 1, 'sidebar_form_deleted_at', 'Deleted at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(360, 'Sidebar', 1, 'sidebar_form_deleted_at_placeholder', 'Enter deleted at', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(361, 'Sidebar', 1, 'translation_action_add', 'Add translation', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(362, 'Sidebar', 1, 'translation_action_syncronize', 'Syncronize translation', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(363, 'Sidebar', 1, 'navigation_navigation_settings', 'Settigns', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(364, 'Sidebar', 1, 'navigation_navigation_language', 'Languages', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(365, 'Sidebar', 1, 'navigation_navigation_state', 'States', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(366, 'Sidebar', 1, 'navigation_navigation_city', 'Cities', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(367, 'Sidebar', 1, 'navigation_navigation_sidebar', 'Sidebar', '2024-12-28 18:38:43', '2024-12-28 18:38:43'),
(368, 'Navigation', 1, 'navigation_navigation_Secteur', 'Secteurs', '2025-01-19 11:30:58', '2025-01-19 11:30:58'),
(369, 'Secteur', 1, 'secteur_action_add', 'Add secteur', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(370, 'Secteur', 1, 'secteur_action_show', 'Show secteur', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(371, 'Secteur', 1, 'secteur_action_edit', 'Edit secteur', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(372, 'Secteur', 1, 'secteur_action_delete', 'Delete secteur', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(373, 'Secteur', 1, 'secteur_action_restore', 'Restore secteur', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(374, 'Secteur', 1, 'secteur_message_add', 'Secteur successfully created', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(375, 'Secteur', 1, 'secteur_message_show', 'Secteur successfully showed', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(376, 'Secteur', 1, 'secteur_message_edit', 'Secteur successfully updated', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(377, 'Secteur', 1, 'secteur_message_delete', 'Secteur successfully deleted', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(378, 'Secteur', 1, 'secteur_message_restore', 'Secteur successfully restored', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(379, 'Secteur', 1, 'secteur_message_activated', 'Secteur has been successfully activated', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(380, 'Secteur', 1, 'secteur_message_inactivated', 'Secteur has been successfully inactivated', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(381, 'Secteur', 1, 'secteur_form_manage_secteurs', 'Manage secteurs', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(382, 'Secteur', 1, 'secteur_form_secteurs_list', 'List of secteurs', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(383, 'Secteur', 1, 'secteur_form_deleted_secteurs_list', 'List deleted secteurs', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(384, 'Secteur', 1, 'secteur_form_manage_deleted_secteurs', 'Manage deleted secteurs', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(385, 'Secteur', 1, 'secteur_message_delete_multiple', 'Selected secteurs have been successfully deleted.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(386, 'Secteur', 1, 'secteur_message_fail_delete_multiple', 'Failed to delete the selected secteurs. Please try again.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(387, 'Secteur', 1, 'secteur_message_restore_multiple', 'Selected secteurs have been successfully restored.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(388, 'Secteur', 1, 'secteur_message_fail_restore_multiple', 'Failed to restore the selected secteurs. Please try again.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(389, 'Secteur', 1, 'secteur_message_activate_multiple', 'Selected secteurs have been successfully activated.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(390, 'Secteur', 1, 'secteur_message_fail_activate_multiple', 'Failed to activate the selected secteurs. Please try again.', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(391, 'Secteur', 1, 'navigation_navigation_secteur', 'secteurs', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(392, 'Secteur', 1, 'secteur_table_name', 'Name', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(393, 'Secteur', 1, 'secteur_form_name', 'Name', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(394, 'Secteur', 1, 'secteur_form_name_placeholder', 'Enter name', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(395, 'Secteur', 1, 'secteur_table_city_id', 'City', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(396, 'Secteur', 1, 'secteur_form_city_id', 'City', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(397, 'Secteur', 1, 'secteur_form_city_id_placeholder', 'Enter city', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(398, 'Secteur', 1, 'secteur_table_created_at', 'Created at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(399, 'Secteur', 1, 'secteur_form_created_at', 'Created at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(400, 'Secteur', 1, 'secteur_form_created_at_placeholder', 'Enter created at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(401, 'Secteur', 1, 'secteur_table_updated_at', 'Updated at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(402, 'Secteur', 1, 'secteur_form_updated_at', 'Updated at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(403, 'Secteur', 1, 'secteur_form_updated_at_placeholder', 'Enter updated at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(404, 'Secteur', 1, 'secteur_table_deleted_at', 'Deleted at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(405, 'Secteur', 1, 'secteur_form_deleted_at', 'Deleted at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(406, 'Secteur', 1, 'secteur_form_deleted_at_placeholder', 'Enter deleted at', '2025-01-25 10:57:19', '2025-01-25 10:57:19'),
(407, 'State', 1, 'state_action_add', 'Add state', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(408, 'State', 1, 'state_action_show', 'Show state', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(409, 'State', 1, 'state_action_edit', 'Edit state', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(410, 'State', 1, 'state_action_delete', 'Delete state', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(411, 'State', 1, 'state_action_restore', 'Restore state', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(412, 'State', 1, 'state_message_add', 'State successfully created', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(413, 'State', 1, 'state_message_show', 'State successfully showed', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(414, 'State', 1, 'state_message_edit', 'State successfully updated', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(415, 'State', 1, 'state_message_delete', 'State successfully deleted', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(416, 'State', 1, 'state_message_restore', 'State successfully restored', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(417, 'State', 1, 'state_message_activated', 'State has been successfully activated', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(418, 'State', 1, 'state_message_inactivated', 'State has been successfully inactivated', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(419, 'State', 1, 'state_form_manage_states', 'Manage states', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(420, 'State', 1, 'state_form_states_list', 'List of states', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(421, 'State', 1, 'state_form_deleted_states_list', 'List deleted states', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(422, 'State', 1, 'state_form_manage_deleted_states', 'Manage deleted states', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(423, 'State', 1, 'state_message_delete_multiple', 'Selected states have been successfully deleted.', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(424, 'State', 1, 'state_message_fail_delete_multiple', 'Failed to delete the selected states. Please try again.', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(425, 'State', 1, 'state_message_restore_multiple', 'Selected states have been successfully restored.', '2025-01-25 10:58:07', '2025-01-25 10:58:07');
INSERT INTO `language_translates` (`id`, `model`, `language_id`, `label`, `translation`, `created_at`, `updated_at`) VALUES
(426, 'State', 1, 'state_message_fail_restore_multiple', 'Failed to restore the selected states. Please try again.', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(427, 'State', 1, 'state_message_activate_multiple', 'Selected states have been successfully activated.', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(428, 'State', 1, 'state_message_fail_activate_multiple', 'Failed to activate the selected states. Please try again.', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(429, 'State', 1, 'navigation_navigation_state', 'states', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(430, 'State', 1, 'state_table_name', 'Name', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(431, 'State', 1, 'state_form_name', 'Name', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(432, 'State', 1, 'state_form_name_placeholder', 'Enter name', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(433, 'State', 1, 'state_table_created_at', 'Created at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(434, 'State', 1, 'state_form_created_at', 'Created at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(435, 'State', 1, 'state_form_created_at_placeholder', 'Enter created at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(436, 'State', 1, 'state_table_updated_at', 'Updated at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(437, 'State', 1, 'state_form_updated_at', 'Updated at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(438, 'State', 1, 'state_form_updated_at_placeholder', 'Enter updated at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(439, 'State', 1, 'state_table_deleted_at', 'Deleted at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(440, 'State', 1, 'state_form_deleted_at', 'Deleted at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(441, 'State', 1, 'state_form_deleted_at_placeholder', 'Enter deleted at', '2025-01-25 10:58:07', '2025-01-25 10:58:07'),
(442, 'Navigation', 1, 'navigation_navigation_Templates', 'Templates', '2025-02-01 20:28:39', '2025-02-01 20:28:39'),
(443, 'Site', 1, 'site_action_add', 'Add site', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(444, 'Site', 1, 'site_action_show', 'Show site', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(445, 'Site', 1, 'site_action_edit', 'Edit site', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(446, 'Site', 1, 'site_action_delete', 'Delete site', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(447, 'Site', 1, 'site_action_restore', 'Restore site', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(448, 'Site', 1, 'site_message_add', 'Site successfully created', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(449, 'Site', 1, 'site_message_show', 'Site successfully showed', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(450, 'Site', 1, 'site_message_edit', 'Site successfully updated', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(451, 'Site', 1, 'site_message_delete', 'Site successfully deleted', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(452, 'Site', 1, 'site_message_restore', 'Site successfully restored', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(453, 'Site', 1, 'site_message_activated', 'Site has been successfully activated', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(454, 'Site', 1, 'site_message_inactivated', 'Site has been successfully inactivated', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(455, 'Site', 1, 'site_form_manage_sites', 'Manage sites', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(456, 'Site', 1, 'site_form_sites_list', 'List of sites', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(457, 'Site', 1, 'site_form_deleted_sites_list', 'List deleted sites', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(458, 'Site', 1, 'site_form_manage_deleted_sites', 'Manage deleted sites', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(459, 'Site', 1, 'site_message_delete_multiple', 'Selected sites have been successfully deleted.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(460, 'Site', 1, 'site_message_fail_delete_multiple', 'Failed to delete the selected sites. Please try again.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(461, 'Site', 1, 'site_message_restore_multiple', 'Selected sites have been successfully restored.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(462, 'Site', 1, 'site_message_fail_restore_multiple', 'Failed to restore the selected sites. Please try again.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(463, 'Site', 1, 'site_message_activate_multiple', 'Selected sites have been successfully activated.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(464, 'Site', 1, 'site_message_fail_activate_multiple', 'Failed to activate the selected sites. Please try again.', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(465, 'Site', 1, 'navigation_navigation_site', 'sites', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(466, 'Site', 1, 'site_table_name', 'Name', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(467, 'Site', 1, 'site_form_name', 'Name', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(468, 'Site', 1, 'site_form_name_placeholder', 'Enter name', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(469, 'Site', 1, 'site_table_longitude', 'Longitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(470, 'Site', 1, 'site_form_longitude', 'Longitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(471, 'Site', 1, 'site_form_longitude_placeholder', 'Enter longitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(472, 'Site', 1, 'site_table_latitude', 'Latitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(473, 'Site', 1, 'site_form_latitude', 'Latitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(474, 'Site', 1, 'site_form_latitude_placeholder', 'Enter latitude', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(475, 'Site', 1, 'site_table_isactive', 'Isactive', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(476, 'Site', 1, 'site_form_isactive', 'Isactive', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(477, 'Site', 1, 'site_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(478, 'Site', 1, 'site_table_created_at', 'Created at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(479, 'Site', 1, 'site_form_created_at', 'Created at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(480, 'Site', 1, 'site_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(481, 'Site', 1, 'site_table_updated_at', 'Updated at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(482, 'Site', 1, 'site_form_updated_at', 'Updated at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(483, 'Site', 1, 'site_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(484, 'Site', 1, 'site_table_deleted_at', 'Deleted at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(485, 'Site', 1, 'site_form_deleted_at', 'Deleted at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(486, 'Site', 1, 'site_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:27:51', '2025-02-03 09:27:51'),
(487, 'Society', 1, 'society_action_add', 'Add society', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(488, 'Society', 1, 'society_action_show', 'Show society', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(489, 'Society', 1, 'society_action_edit', 'Edit society', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(490, 'Society', 1, 'society_action_delete', 'Delete society', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(491, 'Society', 1, 'society_action_restore', 'Restore society', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(492, 'Society', 1, 'society_message_add', 'Society successfully created', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(493, 'Society', 1, 'society_message_show', 'Society successfully showed', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(494, 'Society', 1, 'society_message_edit', 'Society successfully updated', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(495, 'Society', 1, 'society_message_delete', 'Society successfully deleted', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(496, 'Society', 1, 'society_message_restore', 'Society successfully restored', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(497, 'Society', 1, 'society_message_activated', 'Society has been successfully activated', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(498, 'Society', 1, 'society_message_inactivated', 'Society has been successfully inactivated', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(499, 'Society', 1, 'society_form_manage_societies', 'Manage societies', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(500, 'Society', 1, 'society_form_societies_list', 'List of societies', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(501, 'Society', 1, 'society_form_deleted_societies_list', 'List deleted societies', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(502, 'Society', 1, 'society_form_manage_deleted_societies', 'Manage deleted societies', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(503, 'Society', 1, 'society_message_delete_multiple', 'Selected societies have been successfully deleted.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(504, 'Society', 1, 'society_message_fail_delete_multiple', 'Failed to delete the selected societies. Please try again.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(505, 'Society', 1, 'society_message_restore_multiple', 'Selected societies have been successfully restored.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(506, 'Society', 1, 'society_message_fail_restore_multiple', 'Failed to restore the selected societies. Please try again.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(507, 'Society', 1, 'society_message_activate_multiple', 'Selected societies have been successfully activated.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(508, 'Society', 1, 'society_message_fail_activate_multiple', 'Failed to activate the selected societies. Please try again.', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(509, 'Society', 1, 'navigation_navigation_society', 'societies', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(510, 'Society', 1, 'society_table_site_id', 'Site', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(511, 'Society', 1, 'society_form_site_id', 'Site', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(512, 'Society', 1, 'society_form_site_id_placeholder', 'Enter site', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(513, 'Society', 1, 'society_table_ice', 'Ice', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(514, 'Society', 1, 'society_form_ice', 'Ice', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(515, 'Society', 1, 'society_form_ice_placeholder', 'Enter ice', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(516, 'Society', 1, 'society_table_name', 'Name', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(517, 'Society', 1, 'society_form_name', 'Name', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(518, 'Society', 1, 'society_form_name_placeholder', 'Enter name', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(519, 'Society', 1, 'society_table_phone', 'Phone', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(520, 'Society', 1, 'society_form_phone', 'Phone', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(521, 'Society', 1, 'society_form_phone_placeholder', 'Enter phone', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(522, 'Society', 1, 'society_table_fax', 'Fax', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(523, 'Society', 1, 'society_form_fax', 'Fax', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(524, 'Society', 1, 'society_form_fax_placeholder', 'Enter fax', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(525, 'Society', 1, 'society_table_email', 'Email', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(526, 'Society', 1, 'society_form_email', 'Email', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(527, 'Society', 1, 'society_form_email_placeholder', 'Enter email', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(528, 'Society', 1, 'society_table_state_id', 'State', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(529, 'Society', 1, 'society_form_state_id', 'State', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(530, 'Society', 1, 'society_form_state_id_placeholder', 'Enter state', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(531, 'Society', 1, 'society_table_city_id', 'City', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(532, 'Society', 1, 'society_form_city_id', 'City', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(533, 'Society', 1, 'society_form_city_id_placeholder', 'Enter city', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(534, 'Society', 1, 'society_table_secteur_id', 'Secteur', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(535, 'Society', 1, 'society_form_secteur_id', 'Secteur', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(536, 'Society', 1, 'society_form_secteur_id_placeholder', 'Enter secteur', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(537, 'Society', 1, 'society_table_cd_postale', 'Cd postale', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(538, 'Society', 1, 'society_form_cd_postale', 'Cd postale', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(539, 'Society', 1, 'society_form_cd_postale_placeholder', 'Enter cd postale', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(540, 'Society', 1, 'society_table_address', 'Address', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(541, 'Society', 1, 'society_form_address', 'Address', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(542, 'Society', 1, 'society_form_address_placeholder', 'Enter address', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(543, 'Society', 1, 'society_table_comment', 'Comment', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(544, 'Society', 1, 'society_form_comment', 'Comment', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(545, 'Society', 1, 'society_form_comment_placeholder', 'Enter comment', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(546, 'Society', 1, 'society_table_created_by', 'Created by', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(547, 'Society', 1, 'society_form_created_by', 'Created by', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(548, 'Society', 1, 'society_form_created_by_placeholder', 'Enter created by', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(549, 'Society', 1, 'society_table_total_acs', 'Total acs', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(550, 'Society', 1, 'society_form_total_acs', 'Total acs', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(551, 'Society', 1, 'society_form_total_acs_placeholder', 'Enter total acs', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(552, 'Society', 1, 'society_table_isactive', 'Isactive', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(553, 'Society', 1, 'society_form_isactive', 'Isactive', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(554, 'Society', 1, 'society_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(555, 'Society', 1, 'society_table_created_at', 'Created at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(556, 'Society', 1, 'society_form_created_at', 'Created at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(557, 'Society', 1, 'society_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(558, 'Society', 1, 'society_table_updated_at', 'Updated at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(559, 'Society', 1, 'society_form_updated_at', 'Updated at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(560, 'Society', 1, 'society_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(561, 'Society', 1, 'society_table_deleted_at', 'Deleted at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(562, 'Society', 1, 'society_form_deleted_at', 'Deleted at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(563, 'Society', 1, 'society_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:29:35', '2025-02-03 09:29:35'),
(564, 'Employe', 1, 'employe_action_add', 'Add employe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(565, 'Employe', 1, 'employe_action_show', 'Show employe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(566, 'Employe', 1, 'employe_action_edit', 'Edit employe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(567, 'Employe', 1, 'employe_action_delete', 'Delete employe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(568, 'Employe', 1, 'employe_action_restore', 'Restore employe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(569, 'Employe', 1, 'employe_message_add', 'Employe successfully created', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(570, 'Employe', 1, 'employe_message_show', 'Employe successfully showed', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(571, 'Employe', 1, 'employe_message_edit', 'Employe successfully updated', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(572, 'Employe', 1, 'employe_message_delete', 'Employe successfully deleted', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(573, 'Employe', 1, 'employe_message_restore', 'Employe successfully restored', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(574, 'Employe', 1, 'employe_message_activated', 'Employe has been successfully activated', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(575, 'Employe', 1, 'employe_message_inactivated', 'Employe has been successfully inactivated', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(576, 'Employe', 1, 'employe_form_manage_employes', 'Manage employes', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(577, 'Employe', 1, 'employe_form_employes_list', 'List of employes', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(578, 'Employe', 1, 'employe_form_deleted_employes_list', 'List deleted employes', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(579, 'Employe', 1, 'employe_form_manage_deleted_employes', 'Manage deleted employes', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(580, 'Employe', 1, 'employe_message_delete_multiple', 'Selected employes have been successfully deleted.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(581, 'Employe', 1, 'employe_message_fail_delete_multiple', 'Failed to delete the selected employes. Please try again.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(582, 'Employe', 1, 'employe_message_restore_multiple', 'Selected employes have been successfully restored.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(583, 'Employe', 1, 'employe_message_fail_restore_multiple', 'Failed to restore the selected employes. Please try again.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(584, 'Employe', 1, 'employe_message_activate_multiple', 'Selected employes have been successfully activated.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(585, 'Employe', 1, 'employe_message_fail_activate_multiple', 'Failed to activate the selected employes. Please try again.', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(586, 'Employe', 1, 'navigation_navigation_employe', 'employes', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(587, 'Employe', 1, 'employe_table_first_name', 'First name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(588, 'Employe', 1, 'employe_form_first_name', 'First name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(589, 'Employe', 1, 'employe_form_first_name_placeholder', 'Enter first name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(590, 'Employe', 1, 'employe_table_last_name', 'Last name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(591, 'Employe', 1, 'employe_form_last_name', 'Last name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(592, 'Employe', 1, 'employe_form_last_name_placeholder', 'Enter last name', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(593, 'Employe', 1, 'employe_table_doe', 'Doe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(594, 'Employe', 1, 'employe_form_doe', 'Doe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(595, 'Employe', 1, 'employe_form_doe_placeholder', 'Enter doe', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(596, 'Employe', 1, 'employe_table_isactive', 'Isactive', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(597, 'Employe', 1, 'employe_form_isactive', 'Isactive', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(598, 'Employe', 1, 'employe_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(599, 'Employe', 1, 'employe_table_created_at', 'Created at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(600, 'Employe', 1, 'employe_form_created_at', 'Created at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(601, 'Employe', 1, 'employe_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(602, 'Employe', 1, 'employe_table_updated_at', 'Updated at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(603, 'Employe', 1, 'employe_form_updated_at', 'Updated at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(604, 'Employe', 1, 'employe_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(605, 'Employe', 1, 'employe_table_deleted_at', 'Deleted at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(606, 'Employe', 1, 'employe_form_deleted_at', 'Deleted at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(607, 'Employe', 1, 'employe_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:30:37', '2025-02-03 09:30:37'),
(608, 'Supplier', 1, 'supplier_action_add', 'Add supplier', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(609, 'Supplier', 1, 'supplier_action_show', 'Show supplier', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(610, 'Supplier', 1, 'supplier_action_edit', 'Edit supplier', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(611, 'Supplier', 1, 'supplier_action_delete', 'Delete supplier', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(612, 'Supplier', 1, 'supplier_action_restore', 'Restore supplier', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(613, 'Supplier', 1, 'supplier_message_add', 'Supplier successfully created', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(614, 'Supplier', 1, 'supplier_message_show', 'Supplier successfully showed', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(615, 'Supplier', 1, 'supplier_message_edit', 'Supplier successfully updated', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(616, 'Supplier', 1, 'supplier_message_delete', 'Supplier successfully deleted', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(617, 'Supplier', 1, 'supplier_message_restore', 'Supplier successfully restored', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(618, 'Supplier', 1, 'supplier_message_activated', 'Supplier has been successfully activated', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(619, 'Supplier', 1, 'supplier_message_inactivated', 'Supplier has been successfully inactivated', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(620, 'Supplier', 1, 'supplier_form_manage_suppliers', 'Manage suppliers', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(621, 'Supplier', 1, 'supplier_form_suppliers_list', 'List of suppliers', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(622, 'Supplier', 1, 'supplier_form_deleted_suppliers_list', 'List deleted suppliers', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(623, 'Supplier', 1, 'supplier_form_manage_deleted_suppliers', 'Manage deleted suppliers', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(624, 'Supplier', 1, 'supplier_message_delete_multiple', 'Selected suppliers have been successfully deleted.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(625, 'Supplier', 1, 'supplier_message_fail_delete_multiple', 'Failed to delete the selected suppliers. Please try again.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(626, 'Supplier', 1, 'supplier_message_restore_multiple', 'Selected suppliers have been successfully restored.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(627, 'Supplier', 1, 'supplier_message_fail_restore_multiple', 'Failed to restore the selected suppliers. Please try again.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(628, 'Supplier', 1, 'supplier_message_activate_multiple', 'Selected suppliers have been successfully activated.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(629, 'Supplier', 1, 'supplier_message_fail_activate_multiple', 'Failed to activate the selected suppliers. Please try again.', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(630, 'Supplier', 1, 'navigation_navigation_supplier', 'suppliers', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(631, 'Supplier', 1, 'supplier_table_picture', 'Picture', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(632, 'Supplier', 1, 'supplier_form_picture', 'Picture', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(633, 'Supplier', 1, 'supplier_form_picture_placeholder', 'Enter picture', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(634, 'Supplier', 1, 'supplier_table_ice', 'Ice', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(635, 'Supplier', 1, 'supplier_form_ice', 'Ice', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(636, 'Supplier', 1, 'supplier_form_ice_placeholder', 'Enter ice', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(637, 'Supplier', 1, 'supplier_table_name', 'Name', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(638, 'Supplier', 1, 'supplier_form_name', 'Name', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(639, 'Supplier', 1, 'supplier_form_name_placeholder', 'Enter name', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(640, 'Supplier', 1, 'supplier_table_fonction', 'Fonction', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(641, 'Supplier', 1, 'supplier_form_fonction', 'Fonction', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(642, 'Supplier', 1, 'supplier_form_fonction_placeholder', 'Enter fonction', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(643, 'Supplier', 1, 'supplier_table_phone', 'Phone', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(644, 'Supplier', 1, 'supplier_form_phone', 'Phone', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(645, 'Supplier', 1, 'supplier_form_phone_placeholder', 'Enter phone', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(646, 'Supplier', 1, 'supplier_table_fax', 'Fax', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(647, 'Supplier', 1, 'supplier_form_fax', 'Fax', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(648, 'Supplier', 1, 'supplier_form_fax_placeholder', 'Enter fax', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(649, 'Supplier', 1, 'supplier_table_email', 'Email', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(650, 'Supplier', 1, 'supplier_form_email', 'Email', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(651, 'Supplier', 1, 'supplier_form_email_placeholder', 'Enter email', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(652, 'Supplier', 1, 'supplier_table_state_id', 'State', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(653, 'Supplier', 1, 'supplier_form_state_id', 'State', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(654, 'Supplier', 1, 'supplier_form_state_id_placeholder', 'Enter state', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(655, 'Supplier', 1, 'supplier_table_city_id', 'City', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(656, 'Supplier', 1, 'supplier_form_city_id', 'City', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(657, 'Supplier', 1, 'supplier_form_city_id_placeholder', 'Enter city', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(658, 'Supplier', 1, 'supplier_table_secteur_id', 'Secteur', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(659, 'Supplier', 1, 'supplier_form_secteur_id', 'Secteur', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(660, 'Supplier', 1, 'supplier_form_secteur_id_placeholder', 'Enter secteur', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(661, 'Supplier', 1, 'supplier_table_cd_postale', 'Cd postale', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(662, 'Supplier', 1, 'supplier_form_cd_postale', 'Cd postale', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(663, 'Supplier', 1, 'supplier_form_cd_postale_placeholder', 'Enter cd postale', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(664, 'Supplier', 1, 'supplier_table_address', 'Address', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(665, 'Supplier', 1, 'supplier_form_address', 'Address', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(666, 'Supplier', 1, 'supplier_form_address_placeholder', 'Enter address', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(667, 'Supplier', 1, 'supplier_table_comment', 'Comment', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(668, 'Supplier', 1, 'supplier_form_comment', 'Comment', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(669, 'Supplier', 1, 'supplier_form_comment_placeholder', 'Enter comment', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(670, 'Supplier', 1, 'supplier_table_created_by', 'Created by', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(671, 'Supplier', 1, 'supplier_form_created_by', 'Created by', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(672, 'Supplier', 1, 'supplier_form_created_by_placeholder', 'Enter created by', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(673, 'Supplier', 1, 'supplier_table_total_acs', 'Total acs', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(674, 'Supplier', 1, 'supplier_form_total_acs', 'Total acs', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(675, 'Supplier', 1, 'supplier_form_total_acs_placeholder', 'Enter total acs', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(676, 'Supplier', 1, 'supplier_table_isactive', 'Isactive', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(677, 'Supplier', 1, 'supplier_form_isactive', 'Isactive', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(678, 'Supplier', 1, 'supplier_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(679, 'Supplier', 1, 'supplier_table_created_at', 'Created at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(680, 'Supplier', 1, 'supplier_form_created_at', 'Created at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(681, 'Supplier', 1, 'supplier_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(682, 'Supplier', 1, 'supplier_table_updated_at', 'Updated at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(683, 'Supplier', 1, 'supplier_form_updated_at', 'Updated at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(684, 'Supplier', 1, 'supplier_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(685, 'Supplier', 1, 'supplier_table_deleted_at', 'Deleted at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(686, 'Supplier', 1, 'supplier_form_deleted_at', 'Deleted at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(687, 'Supplier', 1, 'supplier_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:31:29', '2025-02-03 09:31:29'),
(688, 'Client', 1, 'client_action_add', 'Add client', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(689, 'Client', 1, 'client_action_show', 'Show client', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(690, 'Client', 1, 'client_action_edit', 'Edit client', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(691, 'Client', 1, 'client_action_delete', 'Delete client', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(692, 'Client', 1, 'client_action_restore', 'Restore client', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(693, 'Client', 1, 'client_message_add', 'Client successfully created', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(694, 'Client', 1, 'client_message_show', 'Client successfully showed', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(695, 'Client', 1, 'client_message_edit', 'Client successfully updated', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(696, 'Client', 1, 'client_message_delete', 'Client successfully deleted', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(697, 'Client', 1, 'client_message_restore', 'Client successfully restored', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(698, 'Client', 1, 'client_message_activated', 'Client has been successfully activated', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(699, 'Client', 1, 'client_message_inactivated', 'Client has been successfully inactivated', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(700, 'Client', 1, 'client_form_manage_clients', 'Manage clients', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(701, 'Client', 1, 'client_form_clients_list', 'List of clients', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(702, 'Client', 1, 'client_form_deleted_clients_list', 'List deleted clients', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(703, 'Client', 1, 'client_form_manage_deleted_clients', 'Manage deleted clients', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(704, 'Client', 1, 'client_message_delete_multiple', 'Selected clients have been successfully deleted.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(705, 'Client', 1, 'client_message_fail_delete_multiple', 'Failed to delete the selected clients. Please try again.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(706, 'Client', 1, 'client_message_restore_multiple', 'Selected clients have been successfully restored.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(707, 'Client', 1, 'client_message_fail_restore_multiple', 'Failed to restore the selected clients. Please try again.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(708, 'Client', 1, 'client_message_activate_multiple', 'Selected clients have been successfully activated.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(709, 'Client', 1, 'client_message_fail_activate_multiple', 'Failed to activate the selected clients. Please try again.', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(710, 'Client', 1, 'navigation_navigation_client', 'clients', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(711, 'Client', 1, 'client_table_picture', 'Picture', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(712, 'Client', 1, 'client_form_picture', 'Picture', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(713, 'Client', 1, 'client_form_picture_placeholder', 'Enter picture', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(714, 'Client', 1, 'client_table_ref', 'Ref', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(715, 'Client', 1, 'client_form_ref', 'Ref', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(716, 'Client', 1, 'client_form_ref_placeholder', 'Enter ref', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(717, 'Client', 1, 'client_table_ice', 'Ice', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(718, 'Client', 1, 'client_form_ice', 'Ice', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(719, 'Client', 1, 'client_form_ice_placeholder', 'Enter ice', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(720, 'Client', 1, 'client_table_name', 'Name', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(721, 'Client', 1, 'client_form_name', 'Name', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(722, 'Client', 1, 'client_form_name_placeholder', 'Enter name', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(723, 'Client', 1, 'client_table_fonction', 'Fonction', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(724, 'Client', 1, 'client_form_fonction', 'Fonction', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(725, 'Client', 1, 'client_form_fonction_placeholder', 'Enter fonction', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(726, 'Client', 1, 'client_table_phone', 'Phone', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(727, 'Client', 1, 'client_form_phone', 'Phone', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(728, 'Client', 1, 'client_form_phone_placeholder', 'Enter phone', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(729, 'Client', 1, 'client_table_fax', 'Fax', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(730, 'Client', 1, 'client_form_fax', 'Fax', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(731, 'Client', 1, 'client_form_fax_placeholder', 'Enter fax', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(732, 'Client', 1, 'client_table_email', 'Email', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(733, 'Client', 1, 'client_form_email', 'Email', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(734, 'Client', 1, 'client_form_email_placeholder', 'Enter email', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(735, 'Client', 1, 'client_table_state_id', 'State', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(736, 'Client', 1, 'client_form_state_id', 'State', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(737, 'Client', 1, 'client_form_state_id_placeholder', 'Enter state', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(738, 'Client', 1, 'client_table_city_id', 'City', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(739, 'Client', 1, 'client_form_city_id', 'City', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(740, 'Client', 1, 'client_form_city_id_placeholder', 'Enter city', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(741, 'Client', 1, 'client_table_secteur_id', 'Secteur', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(742, 'Client', 1, 'client_form_secteur_id', 'Secteur', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(743, 'Client', 1, 'client_form_secteur_id_placeholder', 'Enter secteur', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(744, 'Client', 1, 'client_table_cd_postale', 'Cd postale', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(745, 'Client', 1, 'client_form_cd_postale', 'Cd postale', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(746, 'Client', 1, 'client_form_cd_postale_placeholder', 'Enter cd postale', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(747, 'Client', 1, 'client_table_address', 'Address', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(748, 'Client', 1, 'client_form_address', 'Address', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(749, 'Client', 1, 'client_form_address_placeholder', 'Enter address', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(750, 'Client', 1, 'client_table_comment', 'Comment', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(751, 'Client', 1, 'client_form_comment', 'Comment', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(752, 'Client', 1, 'client_form_comment_placeholder', 'Enter comment', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(753, 'Client', 1, 'client_table_created_by', 'Created by', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(754, 'Client', 1, 'client_form_created_by', 'Created by', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(755, 'Client', 1, 'client_form_created_by_placeholder', 'Enter created by', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(756, 'Client', 1, 'client_table_count_cheque', 'Count cheque', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(757, 'Client', 1, 'client_form_count_cheque', 'Count cheque', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(758, 'Client', 1, 'client_form_count_cheque_placeholder', 'Enter count cheque', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(759, 'Client', 1, 'client_table_total_acs', 'Total acs', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(760, 'Client', 1, 'client_form_total_acs', 'Total acs', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(761, 'Client', 1, 'client_form_total_acs_placeholder', 'Enter total acs', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(762, 'Client', 1, 'client_table_isactive', 'Isactive', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(763, 'Client', 1, 'client_form_isactive', 'Isactive', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(764, 'Client', 1, 'client_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(765, 'Client', 1, 'client_table_created_at', 'Created at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(766, 'Client', 1, 'client_form_created_at', 'Created at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(767, 'Client', 1, 'client_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(768, 'Client', 1, 'client_table_updated_at', 'Updated at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(769, 'Client', 1, 'client_form_updated_at', 'Updated at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(770, 'Client', 1, 'client_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(771, 'Client', 1, 'client_table_deleted_at', 'Deleted at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(772, 'Client', 1, 'client_form_deleted_at', 'Deleted at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(773, 'Client', 1, 'client_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:32:13', '2025-02-03 09:32:13'),
(774, 'Bank', 1, 'bank_action_add', 'Add bank', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(775, 'Bank', 1, 'bank_action_show', 'Show bank', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(776, 'Bank', 1, 'bank_action_edit', 'Edit bank', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(777, 'Bank', 1, 'bank_action_delete', 'Delete bank', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(778, 'Bank', 1, 'bank_action_restore', 'Restore bank', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(779, 'Bank', 1, 'bank_message_add', 'Bank successfully created', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(780, 'Bank', 1, 'bank_message_show', 'Bank successfully showed', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(781, 'Bank', 1, 'bank_message_edit', 'Bank successfully updated', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(782, 'Bank', 1, 'bank_message_delete', 'Bank successfully deleted', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(783, 'Bank', 1, 'bank_message_restore', 'Bank successfully restored', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(784, 'Bank', 1, 'bank_message_activated', 'Bank has been successfully activated', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(785, 'Bank', 1, 'bank_message_inactivated', 'Bank has been successfully inactivated', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(786, 'Bank', 1, 'bank_form_manage_banks', 'Manage banks', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(787, 'Bank', 1, 'bank_form_banks_list', 'List of banks', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(788, 'Bank', 1, 'bank_form_deleted_banks_list', 'List deleted banks', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(789, 'Bank', 1, 'bank_form_manage_deleted_banks', 'Manage deleted banks', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(790, 'Bank', 1, 'bank_message_delete_multiple', 'Selected banks have been successfully deleted.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(791, 'Bank', 1, 'bank_message_fail_delete_multiple', 'Failed to delete the selected banks. Please try again.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(792, 'Bank', 1, 'bank_message_restore_multiple', 'Selected banks have been successfully restored.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(793, 'Bank', 1, 'bank_message_fail_restore_multiple', 'Failed to restore the selected banks. Please try again.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(794, 'Bank', 1, 'bank_message_activate_multiple', 'Selected banks have been successfully activated.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(795, 'Bank', 1, 'bank_message_fail_activate_multiple', 'Failed to activate the selected banks. Please try again.', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(796, 'Bank', 1, 'navigation_navigation_bank', 'banks', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(797, 'Bank', 1, 'bank_table_logo', 'Logo', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(798, 'Bank', 1, 'bank_form_logo', 'Logo', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(799, 'Bank', 1, 'bank_form_logo_placeholder', 'Enter logo', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(800, 'Bank', 1, 'bank_table_picture', 'Picture', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(801, 'Bank', 1, 'bank_form_picture', 'Picture', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(802, 'Bank', 1, 'bank_form_picture_placeholder', 'Enter picture', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(803, 'Bank', 1, 'bank_table_effet', 'Effet', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(804, 'Bank', 1, 'bank_form_effet', 'Effet', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(805, 'Bank', 1, 'bank_form_effet_placeholder', 'Enter effet', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(806, 'Bank', 1, 'bank_table_name', 'Name', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(807, 'Bank', 1, 'bank_form_name', 'Name', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(808, 'Bank', 1, 'bank_form_name_placeholder', 'Enter name', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(809, 'Bank', 1, 'bank_table_tel', 'Tel', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(810, 'Bank', 1, 'bank_form_tel', 'Tel', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(811, 'Bank', 1, 'bank_form_tel_placeholder', 'Enter tel', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(812, 'Bank', 1, 'bank_table_address', 'Address', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(813, 'Bank', 1, 'bank_form_address', 'Address', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(814, 'Bank', 1, 'bank_form_address_placeholder', 'Enter address', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(815, 'Bank', 1, 'bank_table_isactive', 'Isactive', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(816, 'Bank', 1, 'bank_form_isactive', 'Isactive', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(817, 'Bank', 1, 'bank_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(818, 'Bank', 1, 'bank_table_created_at', 'Created at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(819, 'Bank', 1, 'bank_form_created_at', 'Created at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(820, 'Bank', 1, 'bank_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(821, 'Bank', 1, 'bank_table_updated_at', 'Updated at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(822, 'Bank', 1, 'bank_form_updated_at', 'Updated at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(823, 'Bank', 1, 'bank_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(824, 'Bank', 1, 'bank_table_deleted_at', 'Deleted at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(825, 'Bank', 1, 'bank_form_deleted_at', 'Deleted at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(826, 'Bank', 1, 'bank_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:32:56', '2025-02-03 09:32:56'),
(827, 'Compte', 1, 'compte_action_add', 'Add compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(828, 'Compte', 1, 'compte_action_show', 'Show compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(829, 'Compte', 1, 'compte_action_edit', 'Edit compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(830, 'Compte', 1, 'compte_action_delete', 'Delete compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(831, 'Compte', 1, 'compte_action_restore', 'Restore compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(832, 'Compte', 1, 'compte_message_add', 'Compte successfully created', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(833, 'Compte', 1, 'compte_message_show', 'Compte successfully showed', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(834, 'Compte', 1, 'compte_message_edit', 'Compte successfully updated', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(835, 'Compte', 1, 'compte_message_delete', 'Compte successfully deleted', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(836, 'Compte', 1, 'compte_message_restore', 'Compte successfully restored', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(837, 'Compte', 1, 'compte_message_activated', 'Compte has been successfully activated', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(838, 'Compte', 1, 'compte_message_inactivated', 'Compte has been successfully inactivated', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(839, 'Compte', 1, 'compte_form_manage_comptes', 'Manage comptes', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(840, 'Compte', 1, 'compte_form_comptes_list', 'List of comptes', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(841, 'Compte', 1, 'compte_form_deleted_comptes_list', 'List deleted comptes', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(842, 'Compte', 1, 'compte_form_manage_deleted_comptes', 'Manage deleted comptes', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(843, 'Compte', 1, 'compte_message_delete_multiple', 'Selected comptes have been successfully deleted.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(844, 'Compte', 1, 'compte_message_fail_delete_multiple', 'Failed to delete the selected comptes. Please try again.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(845, 'Compte', 1, 'compte_message_restore_multiple', 'Selected comptes have been successfully restored.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(846, 'Compte', 1, 'compte_message_fail_restore_multiple', 'Failed to restore the selected comptes. Please try again.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(847, 'Compte', 1, 'compte_message_activate_multiple', 'Selected comptes have been successfully activated.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(848, 'Compte', 1, 'compte_message_fail_activate_multiple', 'Failed to activate the selected comptes. Please try again.', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(849, 'Compte', 1, 'navigation_navigation_compte', 'comptes', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(850, 'Compte', 1, 'compte_table_type_compte', 'Type compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(851, 'Compte', 1, 'compte_form_type_compte', 'Type compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(852, 'Compte', 1, 'compte_form_type_compte_placeholder', 'Enter type compte', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(853, 'Compte', 1, 'compte_table_bank_id', 'Bank', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(854, 'Compte', 1, 'compte_form_bank_id', 'Bank', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(855, 'Compte', 1, 'compte_form_bank_id_placeholder', 'Enter bank', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(856, 'Compte', 1, 'compte_table_society_id', 'Society', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(857, 'Compte', 1, 'compte_form_society_id', 'Society', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(858, 'Compte', 1, 'compte_form_society_id_placeholder', 'Enter society', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(859, 'Compte', 1, 'compte_table_employe_id', 'Employe', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(860, 'Compte', 1, 'compte_form_employe_id', 'Employe', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(861, 'Compte', 1, 'compte_form_employe_id_placeholder', 'Enter employe', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(862, 'Compte', 1, 'compte_table_agence', 'Agence', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(863, 'Compte', 1, 'compte_form_agence', 'Agence', '2025-02-03 09:33:43', '2025-02-03 09:33:43');
INSERT INTO `language_translates` (`id`, `model`, `language_id`, `label`, `translation`, `created_at`, `updated_at`) VALUES
(864, 'Compte', 1, 'compte_form_agence_placeholder', 'Enter agence', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(865, 'Compte', 1, 'compte_table_city', 'City', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(866, 'Compte', 1, 'compte_form_city', 'City', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(867, 'Compte', 1, 'compte_form_city_placeholder', 'Enter city', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(868, 'Compte', 1, 'compte_table_rip', 'Rip', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(869, 'Compte', 1, 'compte_form_rip', 'Rip', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(870, 'Compte', 1, 'compte_form_rip_placeholder', 'Enter rip', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(871, 'Compte', 1, 'compte_table_start_solde', 'Start solde', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(872, 'Compte', 1, 'compte_form_start_solde', 'Start solde', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(873, 'Compte', 1, 'compte_form_start_solde_placeholder', 'Enter start solde', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(874, 'Compte', 1, 'compte_table_start_date', 'Start date', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(875, 'Compte', 1, 'compte_form_start_date', 'Start date', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(876, 'Compte', 1, 'compte_form_start_date_placeholder', 'Enter start date', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(877, 'Compte', 1, 'compte_table_isactive', 'Isactive', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(878, 'Compte', 1, 'compte_form_isactive', 'Isactive', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(879, 'Compte', 1, 'compte_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(880, 'Compte', 1, 'compte_table_comment', 'Comment', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(881, 'Compte', 1, 'compte_form_comment', 'Comment', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(882, 'Compte', 1, 'compte_form_comment_placeholder', 'Enter comment', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(883, 'Compte', 1, 'compte_table_created_at', 'Created at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(884, 'Compte', 1, 'compte_form_created_at', 'Created at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(885, 'Compte', 1, 'compte_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(886, 'Compte', 1, 'compte_table_updated_at', 'Updated at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(887, 'Compte', 1, 'compte_form_updated_at', 'Updated at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(888, 'Compte', 1, 'compte_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(889, 'Compte', 1, 'compte_table_deleted_at', 'Deleted at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(890, 'Compte', 1, 'compte_form_deleted_at', 'Deleted at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(891, 'Compte', 1, 'compte_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:33:43', '2025-02-03 09:33:43'),
(892, 'Carnet', 1, 'carnet_action_add', 'Add carnet', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(893, 'Carnet', 1, 'carnet_action_show', 'Show carnet', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(894, 'Carnet', 1, 'carnet_action_edit', 'Edit carnet', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(895, 'Carnet', 1, 'carnet_action_delete', 'Delete carnet', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(896, 'Carnet', 1, 'carnet_action_restore', 'Restore carnet', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(897, 'Carnet', 1, 'carnet_message_add', 'Carnet successfully created', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(898, 'Carnet', 1, 'carnet_message_show', 'Carnet successfully showed', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(899, 'Carnet', 1, 'carnet_message_edit', 'Carnet successfully updated', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(900, 'Carnet', 1, 'carnet_message_delete', 'Carnet successfully deleted', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(901, 'Carnet', 1, 'carnet_message_restore', 'Carnet successfully restored', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(902, 'Carnet', 1, 'carnet_message_activated', 'Carnet has been successfully activated', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(903, 'Carnet', 1, 'carnet_message_inactivated', 'Carnet has been successfully inactivated', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(904, 'Carnet', 1, 'carnet_form_manage_carnets', 'Manage carnets', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(905, 'Carnet', 1, 'carnet_form_carnets_list', 'List of carnets', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(906, 'Carnet', 1, 'carnet_form_deleted_carnets_list', 'List deleted carnets', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(907, 'Carnet', 1, 'carnet_form_manage_deleted_carnets', 'Manage deleted carnets', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(908, 'Carnet', 1, 'carnet_message_delete_multiple', 'Selected carnets have been successfully deleted.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(909, 'Carnet', 1, 'carnet_message_fail_delete_multiple', 'Failed to delete the selected carnets. Please try again.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(910, 'Carnet', 1, 'carnet_message_restore_multiple', 'Selected carnets have been successfully restored.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(911, 'Carnet', 1, 'carnet_message_fail_restore_multiple', 'Failed to restore the selected carnets. Please try again.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(912, 'Carnet', 1, 'carnet_message_activate_multiple', 'Selected carnets have been successfully activated.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(913, 'Carnet', 1, 'carnet_message_fail_activate_multiple', 'Failed to activate the selected carnets. Please try again.', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(914, 'Carnet', 1, 'navigation_navigation_carnet', 'carnets', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(915, 'Carnet', 1, 'carnet_table_bank_id', 'Bank', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(916, 'Carnet', 1, 'carnet_form_bank_id', 'Bank', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(917, 'Carnet', 1, 'carnet_form_bank_id_placeholder', 'Enter bank', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(918, 'Carnet', 1, 'carnet_table_compte_id', 'Compte', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(919, 'Carnet', 1, 'carnet_form_compte_id', 'Compte', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(920, 'Carnet', 1, 'carnet_form_compte_id_placeholder', 'Enter compte', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(921, 'Carnet', 1, 'carnet_table_nbr_cheque', 'Nbr cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(922, 'Carnet', 1, 'carnet_form_nbr_cheque', 'Nbr cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(923, 'Carnet', 1, 'carnet_form_nbr_cheque_placeholder', 'Enter nbr cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(924, 'Carnet', 1, 'carnet_table_rest', 'Rest', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(925, 'Carnet', 1, 'carnet_form_rest', 'Rest', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(926, 'Carnet', 1, 'carnet_form_rest_placeholder', 'Enter rest', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(927, 'Carnet', 1, 'carnet_table_type', 'Type', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(928, 'Carnet', 1, 'carnet_form_type', 'Type', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(929, 'Carnet', 1, 'carnet_form_type_placeholder', 'Enter type', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(930, 'Carnet', 1, 'carnet_table_society', 'Society', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(931, 'Carnet', 1, 'carnet_form_society', 'Society', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(932, 'Carnet', 1, 'carnet_form_society_placeholder', 'Enter society', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(933, 'Carnet', 1, 'carnet_table_series', 'Series', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(934, 'Carnet', 1, 'carnet_form_series', 'Series', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(935, 'Carnet', 1, 'carnet_form_series_placeholder', 'Enter series', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(936, 'Carnet', 1, 'carnet_table_nbr_first_cheque', 'Nbr first cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(937, 'Carnet', 1, 'carnet_form_nbr_first_cheque', 'Nbr first cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(938, 'Carnet', 1, 'carnet_form_nbr_first_cheque_placeholder', 'Enter nbr first cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(939, 'Carnet', 1, 'carnet_table_nbr_last_cheque', 'Nbr last cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(940, 'Carnet', 1, 'carnet_form_nbr_last_cheque', 'Nbr last cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(941, 'Carnet', 1, 'carnet_form_nbr_last_cheque_placeholder', 'Enter nbr last cheque', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(942, 'Carnet', 1, 'carnet_table_isactive', 'Isactive', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(943, 'Carnet', 1, 'carnet_form_isactive', 'Isactive', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(944, 'Carnet', 1, 'carnet_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(945, 'Carnet', 1, 'carnet_table_created_at', 'Created at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(946, 'Carnet', 1, 'carnet_form_created_at', 'Created at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(947, 'Carnet', 1, 'carnet_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(948, 'Carnet', 1, 'carnet_table_updated_at', 'Updated at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(949, 'Carnet', 1, 'carnet_form_updated_at', 'Updated at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(950, 'Carnet', 1, 'carnet_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(951, 'Carnet', 1, 'carnet_table_deleted_at', 'Deleted at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(952, 'Carnet', 1, 'carnet_form_deleted_at', 'Deleted at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(953, 'Carnet', 1, 'carnet_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:34:32', '2025-02-03 09:34:32'),
(954, 'Cheque', 1, 'cheque_action_add', 'Add cheque', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(955, 'Cheque', 1, 'cheque_action_show', 'Show cheque', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(956, 'Cheque', 1, 'cheque_action_edit', 'Edit cheque', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(957, 'Cheque', 1, 'cheque_action_delete', 'Delete cheque', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(958, 'Cheque', 1, 'cheque_action_restore', 'Restore cheque', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(959, 'Cheque', 1, 'cheque_message_add', 'Cheque successfully created', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(960, 'Cheque', 1, 'cheque_message_show', 'Cheque successfully showed', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(961, 'Cheque', 1, 'cheque_message_edit', 'Cheque successfully updated', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(962, 'Cheque', 1, 'cheque_message_delete', 'Cheque successfully deleted', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(963, 'Cheque', 1, 'cheque_message_restore', 'Cheque successfully restored', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(964, 'Cheque', 1, 'cheque_message_activated', 'Cheque has been successfully activated', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(965, 'Cheque', 1, 'cheque_message_inactivated', 'Cheque has been successfully inactivated', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(966, 'Cheque', 1, 'cheque_form_manage_cheques', 'Manage cheques', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(967, 'Cheque', 1, 'cheque_form_cheques_list', 'List of cheques', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(968, 'Cheque', 1, 'cheque_form_deleted_cheques_list', 'List deleted cheques', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(969, 'Cheque', 1, 'cheque_form_manage_deleted_cheques', 'Manage deleted cheques', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(970, 'Cheque', 1, 'cheque_message_delete_multiple', 'Selected cheques have been successfully deleted.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(971, 'Cheque', 1, 'cheque_message_fail_delete_multiple', 'Failed to delete the selected cheques. Please try again.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(972, 'Cheque', 1, 'cheque_message_restore_multiple', 'Selected cheques have been successfully restored.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(973, 'Cheque', 1, 'cheque_message_fail_restore_multiple', 'Failed to restore the selected cheques. Please try again.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(974, 'Cheque', 1, 'cheque_message_activate_multiple', 'Selected cheques have been successfully activated.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(975, 'Cheque', 1, 'cheque_message_fail_activate_multiple', 'Failed to activate the selected cheques. Please try again.', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(976, 'Cheque', 1, 'navigation_navigation_cheque', 'cheques', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(977, 'Cheque', 1, 'cheque_table_bank_id', 'Bank', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(978, 'Cheque', 1, 'cheque_form_bank_id', 'Bank', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(979, 'Cheque', 1, 'cheque_form_bank_id_placeholder', 'Enter bank', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(980, 'Cheque', 1, 'cheque_table_compte_id', 'Compte', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(981, 'Cheque', 1, 'cheque_form_compte_id', 'Compte', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(982, 'Cheque', 1, 'cheque_form_compte_id_placeholder', 'Enter compte', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(983, 'Cheque', 1, 'cheque_table_carnet_id', 'Carnet', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(984, 'Cheque', 1, 'cheque_form_carnet_id', 'Carnet', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(985, 'Cheque', 1, 'cheque_form_carnet_id_placeholder', 'Enter carnet', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(986, 'Cheque', 1, 'cheque_table_series', 'Series', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(987, 'Cheque', 1, 'cheque_form_series', 'Series', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(988, 'Cheque', 1, 'cheque_form_series_placeholder', 'Enter series', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(989, 'Cheque', 1, 'cheque_table_number', 'Number', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(990, 'Cheque', 1, 'cheque_form_number', 'Number', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(991, 'Cheque', 1, 'cheque_form_number_placeholder', 'Enter number', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(992, 'Cheque', 1, 'cheque_table_amount', 'Amount', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(993, 'Cheque', 1, 'cheque_form_amount', 'Amount', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(994, 'Cheque', 1, 'cheque_form_amount_placeholder', 'Enter amount', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(995, 'Cheque', 1, 'cheque_table_doi', 'Doi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(996, 'Cheque', 1, 'cheque_form_doi', 'Doi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(997, 'Cheque', 1, 'cheque_form_doi_placeholder', 'Enter doi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(998, 'Cheque', 1, 'cheque_table_poi', 'Poi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(999, 'Cheque', 1, 'cheque_form_poi', 'Poi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1000, 'Cheque', 1, 'cheque_form_poi_placeholder', 'Enter poi', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1001, 'Cheque', 1, 'cheque_table_beneficiary', 'Beneficiary', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1002, 'Cheque', 1, 'cheque_form_beneficiary', 'Beneficiary', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1003, 'Cheque', 1, 'cheque_form_beneficiary_placeholder', 'Enter beneficiary', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1004, 'Cheque', 1, 'cheque_table_status', 'Status', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1005, 'Cheque', 1, 'cheque_form_status', 'Status', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1006, 'Cheque', 1, 'cheque_form_status_placeholder', 'Enter status', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1007, 'Cheque', 1, 'cheque_table_isactive', 'Isactive', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1008, 'Cheque', 1, 'cheque_form_isactive', 'Isactive', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1009, 'Cheque', 1, 'cheque_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1010, 'Cheque', 1, 'cheque_table_created_at', 'Created at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1011, 'Cheque', 1, 'cheque_form_created_at', 'Created at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1012, 'Cheque', 1, 'cheque_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1013, 'Cheque', 1, 'cheque_table_updated_at', 'Updated at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1014, 'Cheque', 1, 'cheque_form_updated_at', 'Updated at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1015, 'Cheque', 1, 'cheque_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1016, 'Cheque', 1, 'cheque_table_deleted_at', 'Deleted at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1017, 'Cheque', 1, 'cheque_form_deleted_at', 'Deleted at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1018, 'Cheque', 1, 'cheque_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:35:24', '2025-02-03 09:35:24'),
(1019, 'Effet', 1, 'effet_action_add', 'Add effet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1020, 'Effet', 1, 'effet_action_show', 'Show effet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1021, 'Effet', 1, 'effet_action_edit', 'Edit effet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1022, 'Effet', 1, 'effet_action_delete', 'Delete effet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1023, 'Effet', 1, 'effet_action_restore', 'Restore effet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1024, 'Effet', 1, 'effet_message_add', 'Effet successfully created', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1025, 'Effet', 1, 'effet_message_show', 'Effet successfully showed', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1026, 'Effet', 1, 'effet_message_edit', 'Effet successfully updated', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1027, 'Effet', 1, 'effet_message_delete', 'Effet successfully deleted', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1028, 'Effet', 1, 'effet_message_restore', 'Effet successfully restored', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1029, 'Effet', 1, 'effet_message_activated', 'Effet has been successfully activated', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1030, 'Effet', 1, 'effet_message_inactivated', 'Effet has been successfully inactivated', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1031, 'Effet', 1, 'effet_form_manage_effets', 'Manage effets', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1032, 'Effet', 1, 'effet_form_effets_list', 'List of effets', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1033, 'Effet', 1, 'effet_form_deleted_effets_list', 'List deleted effets', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1034, 'Effet', 1, 'effet_form_manage_deleted_effets', 'Manage deleted effets', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1035, 'Effet', 1, 'effet_message_delete_multiple', 'Selected effets have been successfully deleted.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1036, 'Effet', 1, 'effet_message_fail_delete_multiple', 'Failed to delete the selected effets. Please try again.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1037, 'Effet', 1, 'effet_message_restore_multiple', 'Selected effets have been successfully restored.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1038, 'Effet', 1, 'effet_message_fail_restore_multiple', 'Failed to restore the selected effets. Please try again.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1039, 'Effet', 1, 'effet_message_activate_multiple', 'Selected effets have been successfully activated.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1040, 'Effet', 1, 'effet_message_fail_activate_multiple', 'Failed to activate the selected effets. Please try again.', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1041, 'Effet', 1, 'navigation_navigation_effet', 'effets', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1042, 'Effet', 1, 'effet_table_bank_id', 'Bank', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1043, 'Effet', 1, 'effet_form_bank_id', 'Bank', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1044, 'Effet', 1, 'effet_form_bank_id_placeholder', 'Enter bank', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1045, 'Effet', 1, 'effet_table_compte_id', 'Compte', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1046, 'Effet', 1, 'effet_form_compte_id', 'Compte', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1047, 'Effet', 1, 'effet_form_compte_id_placeholder', 'Enter compte', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1048, 'Effet', 1, 'effet_table_carnet_id', 'Carnet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1049, 'Effet', 1, 'effet_form_carnet_id', 'Carnet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1050, 'Effet', 1, 'effet_form_carnet_id_placeholder', 'Enter carnet', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1051, 'Effet', 1, 'effet_table_series', 'Series', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1052, 'Effet', 1, 'effet_form_series', 'Series', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1053, 'Effet', 1, 'effet_form_series_placeholder', 'Enter series', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1054, 'Effet', 1, 'effet_table_number', 'Number', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1055, 'Effet', 1, 'effet_form_number', 'Number', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1056, 'Effet', 1, 'effet_form_number_placeholder', 'Enter number', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1057, 'Effet', 1, 'effet_table_amount', 'Amount', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1058, 'Effet', 1, 'effet_form_amount', 'Amount', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1059, 'Effet', 1, 'effet_form_amount_placeholder', 'Enter amount', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1060, 'Effet', 1, 'effet_table_doi', 'Doi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1061, 'Effet', 1, 'effet_form_doi', 'Doi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1062, 'Effet', 1, 'effet_form_doi_placeholder', 'Enter doi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1063, 'Effet', 1, 'effet_table_poi', 'Poi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1064, 'Effet', 1, 'effet_form_poi', 'Poi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1065, 'Effet', 1, 'effet_form_poi_placeholder', 'Enter poi', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1066, 'Effet', 1, 'effet_table_beneficiary', 'Beneficiary', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1067, 'Effet', 1, 'effet_form_beneficiary', 'Beneficiary', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1068, 'Effet', 1, 'effet_form_beneficiary_placeholder', 'Enter beneficiary', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1069, 'Effet', 1, 'effet_table_status', 'Status', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1070, 'Effet', 1, 'effet_form_status', 'Status', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1071, 'Effet', 1, 'effet_form_status_placeholder', 'Enter status', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1072, 'Effet', 1, 'effet_table_isactive', 'Isactive', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1073, 'Effet', 1, 'effet_form_isactive', 'Isactive', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1074, 'Effet', 1, 'effet_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1075, 'Effet', 1, 'effet_table_created_at', 'Created at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1076, 'Effet', 1, 'effet_form_created_at', 'Created at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1077, 'Effet', 1, 'effet_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1078, 'Effet', 1, 'effet_table_updated_at', 'Updated at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1079, 'Effet', 1, 'effet_form_updated_at', 'Updated at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1080, 'Effet', 1, 'effet_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1081, 'Effet', 1, 'effet_table_deleted_at', 'Deleted at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1082, 'Effet', 1, 'effet_form_deleted_at', 'Deleted at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1083, 'Effet', 1, 'effet_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:36:39', '2025-02-03 09:36:39'),
(1084, 'Navigation', 1, 'navigation_navigation_referenciel', 'Referenciel', NULL, NULL),
(1085, 'Navigation', 1, 'navigation_navigation_manage comptes', 'Manage comptes', NULL, NULL),
(1086, 'Numerotation', 1, 'numerotation_action_add', 'Add numerotation', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1087, 'Numerotation', 1, 'numerotation_action_show', 'Show numerotation', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1088, 'Numerotation', 1, 'numerotation_action_edit', 'Edit numerotation', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1089, 'Numerotation', 1, 'numerotation_action_delete', 'Delete numerotation', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1090, 'Numerotation', 1, 'numerotation_action_restore', 'Restore numerotation', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1091, 'Numerotation', 1, 'numerotation_message_add', 'Numerotation successfully created', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1092, 'Numerotation', 1, 'numerotation_message_show', 'Numerotation successfully showed', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1093, 'Numerotation', 1, 'numerotation_message_edit', 'Numerotation successfully updated', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1094, 'Numerotation', 1, 'numerotation_message_delete', 'Numerotation successfully deleted', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1095, 'Numerotation', 1, 'numerotation_message_restore', 'Numerotation successfully restored', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1096, 'Numerotation', 1, 'numerotation_message_activated', 'Numerotation has been successfully activated', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1097, 'Numerotation', 1, 'numerotation_message_inactivated', 'Numerotation has been successfully inactivated', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1098, 'Numerotation', 1, 'numerotation_form_manage_numerotations', 'Manage numerotations', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1099, 'Numerotation', 1, 'numerotation_form_numerotations_list', 'List of numerotations', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1100, 'Numerotation', 1, 'numerotation_form_deleted_numerotations_list', 'List deleted numerotations', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1101, 'Numerotation', 1, 'numerotation_form_manage_deleted_numerotations', 'Manage deleted numerotations', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1102, 'Numerotation', 1, 'numerotation_message_delete_multiple', 'Selected numerotations have been successfully deleted.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1103, 'Numerotation', 1, 'numerotation_message_fail_delete_multiple', 'Failed to delete the selected numerotations. Please try again.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1104, 'Numerotation', 1, 'numerotation_message_restore_multiple', 'Selected numerotations have been successfully restored.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1105, 'Numerotation', 1, 'numerotation_message_fail_restore_multiple', 'Failed to restore the selected numerotations. Please try again.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1106, 'Numerotation', 1, 'numerotation_message_activate_multiple', 'Selected numerotations have been successfully activated.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1107, 'Numerotation', 1, 'numerotation_message_fail_activate_multiple', 'Failed to activate the selected numerotations. Please try again.', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1108, 'Numerotation', 1, 'navigation_navigation_numerotation', 'numerotations', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1109, 'Numerotation', 1, 'numerotation_table_doc_type', 'Doc type', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1110, 'Numerotation', 1, 'numerotation_form_doc_type', 'Doc type', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1111, 'Numerotation', 1, 'numerotation_form_doc_type_placeholder', 'Enter doc type', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1112, 'Numerotation', 1, 'numerotation_table_prefix', 'Prefix', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1113, 'Numerotation', 1, 'numerotation_form_prefix', 'Prefix', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1114, 'Numerotation', 1, 'numerotation_form_prefix_placeholder', 'Enter prefix', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1115, 'Numerotation', 1, 'numerotation_table_increment_num', 'Increment num', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1116, 'Numerotation', 1, 'numerotation_form_increment_num', 'Increment num', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1117, 'Numerotation', 1, 'numerotation_form_increment_num_placeholder', 'Enter increment num', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1118, 'Numerotation', 1, 'numerotation_table_comment', 'Comment', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1119, 'Numerotation', 1, 'numerotation_form_comment', 'Comment', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1120, 'Numerotation', 1, 'numerotation_form_comment_placeholder', 'Enter comment', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1121, 'Numerotation', 1, 'numerotation_table_isactive', 'Isactive', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1122, 'Numerotation', 1, 'numerotation_form_isactive', 'Isactive', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1123, 'Numerotation', 1, 'numerotation_form_isactive_placeholder', 'Enter isactive', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1124, 'Numerotation', 1, 'numerotation_table_created_at', 'Created at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1125, 'Numerotation', 1, 'numerotation_form_created_at', 'Created at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1126, 'Numerotation', 1, 'numerotation_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1127, 'Numerotation', 1, 'numerotation_table_updated_at', 'Updated at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1128, 'Numerotation', 1, 'numerotation_form_updated_at', 'Updated at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1129, 'Numerotation', 1, 'numerotation_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1130, 'Numerotation', 1, 'numerotation_table_deleted_at', 'Deleted at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1131, 'Numerotation', 1, 'numerotation_form_deleted_at', 'Deleted at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1132, 'Numerotation', 1, 'numerotation_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:57:52', '2025-02-03 09:57:52'),
(1133, 'Exercice', 1, 'exercice_action_add', 'Add exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1134, 'Exercice', 1, 'exercice_action_show', 'Show exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1135, 'Exercice', 1, 'exercice_action_edit', 'Edit exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1136, 'Exercice', 1, 'exercice_action_delete', 'Delete exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1137, 'Exercice', 1, 'exercice_action_restore', 'Restore exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1138, 'Exercice', 1, 'exercice_message_add', 'Exercice successfully created', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1139, 'Exercice', 1, 'exercice_message_show', 'Exercice successfully showed', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1140, 'Exercice', 1, 'exercice_message_edit', 'Exercice successfully updated', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1141, 'Exercice', 1, 'exercice_message_delete', 'Exercice successfully deleted', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1142, 'Exercice', 1, 'exercice_message_restore', 'Exercice successfully restored', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1143, 'Exercice', 1, 'exercice_message_activated', 'Exercice has been successfully activated', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1144, 'Exercice', 1, 'exercice_message_inactivated', 'Exercice has been successfully inactivated', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1145, 'Exercice', 1, 'exercice_form_manage_exercices', 'Manage exercices', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1146, 'Exercice', 1, 'exercice_form_exercices_list', 'List of exercices', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1147, 'Exercice', 1, 'exercice_form_deleted_exercices_list', 'List deleted exercices', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1148, 'Exercice', 1, 'exercice_form_manage_deleted_exercices', 'Manage deleted exercices', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1149, 'Exercice', 1, 'exercice_message_delete_multiple', 'Selected exercices have been successfully deleted.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1150, 'Exercice', 1, 'exercice_message_fail_delete_multiple', 'Failed to delete the selected exercices. Please try again.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1151, 'Exercice', 1, 'exercice_message_restore_multiple', 'Selected exercices have been successfully restored.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1152, 'Exercice', 1, 'exercice_message_fail_restore_multiple', 'Failed to restore the selected exercices. Please try again.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1153, 'Exercice', 1, 'exercice_message_activate_multiple', 'Selected exercices have been successfully activated.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1154, 'Exercice', 1, 'exercice_message_fail_activate_multiple', 'Failed to activate the selected exercices. Please try again.', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1155, 'Exercice', 1, 'navigation_navigation_exercice', 'exercices', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1156, 'Exercice', 1, 'exercice_table_exercice', 'Exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1157, 'Exercice', 1, 'exercice_form_exercice', 'Exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1158, 'Exercice', 1, 'exercice_form_exercice_placeholder', 'Enter exercice', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1159, 'Exercice', 1, 'exercice_table_etat', 'Etat', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1160, 'Exercice', 1, 'exercice_form_etat', 'Etat', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1161, 'Exercice', 1, 'exercice_form_etat_placeholder', 'Enter etat', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1162, 'Exercice', 1, 'exercice_table_comment', 'Comment', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1163, 'Exercice', 1, 'exercice_form_comment', 'Comment', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1164, 'Exercice', 1, 'exercice_form_comment_placeholder', 'Enter comment', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1165, 'Exercice', 1, 'exercice_table_created_at', 'Created at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1166, 'Exercice', 1, 'exercice_form_created_at', 'Created at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1167, 'Exercice', 1, 'exercice_form_created_at_placeholder', 'Enter created at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1168, 'Exercice', 1, 'exercice_table_updated_at', 'Updated at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1169, 'Exercice', 1, 'exercice_form_updated_at', 'Updated at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1170, 'Exercice', 1, 'exercice_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1171, 'Exercice', 1, 'exercice_table_deleted_at', 'Deleted at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1172, 'Exercice', 1, 'exercice_form_deleted_at', 'Deleted at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1173, 'Exercice', 1, 'exercice_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 09:58:45', '2025-02-03 09:58:45'),
(1174, 'Warehouse', 1, 'warehouse_action_add', 'Add warehouse', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1175, 'Warehouse', 1, 'warehouse_action_show', 'Show warehouse', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1176, 'Warehouse', 1, 'warehouse_action_edit', 'Edit warehouse', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1177, 'Warehouse', 1, 'warehouse_action_delete', 'Delete warehouse', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1178, 'Warehouse', 1, 'warehouse_action_restore', 'Restore warehouse', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1179, 'Warehouse', 1, 'warehouse_message_add', 'Warehouse successfully created', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1180, 'Warehouse', 1, 'warehouse_message_show', 'Warehouse successfully showed', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1181, 'Warehouse', 1, 'warehouse_message_edit', 'Warehouse successfully updated', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1182, 'Warehouse', 1, 'warehouse_message_delete', 'Warehouse successfully deleted', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1183, 'Warehouse', 1, 'warehouse_message_restore', 'Warehouse successfully restored', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1184, 'Warehouse', 1, 'warehouse_message_activated', 'Warehouse has been successfully activated', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1185, 'Warehouse', 1, 'warehouse_message_inactivated', 'Warehouse has been successfully inactivated', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1186, 'Warehouse', 1, 'warehouse_form_manage_warehouses', 'Manage warehouses', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1187, 'Warehouse', 1, 'warehouse_form_warehouses_list', 'List of warehouses', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1188, 'Warehouse', 1, 'warehouse_form_deleted_warehouses_list', 'List deleted warehouses', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1189, 'Warehouse', 1, 'warehouse_form_manage_deleted_warehouses', 'Manage deleted warehouses', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1190, 'Warehouse', 1, 'warehouse_message_delete_multiple', 'Selected warehouses have been successfully deleted.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1191, 'Warehouse', 1, 'warehouse_message_fail_delete_multiple', 'Failed to delete the selected warehouses. Please try again.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1192, 'Warehouse', 1, 'warehouse_message_restore_multiple', 'Selected warehouses have been successfully restored.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1193, 'Warehouse', 1, 'warehouse_message_fail_restore_multiple', 'Failed to restore the selected warehouses. Please try again.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1194, 'Warehouse', 1, 'warehouse_message_activate_multiple', 'Selected warehouses have been successfully activated.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1195, 'Warehouse', 1, 'warehouse_message_fail_activate_multiple', 'Failed to activate the selected warehouses. Please try again.', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1196, 'Warehouse', 1, 'navigation_navigation_warehouse', 'warehouses', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1197, 'Warehouse', 1, 'warehouse_table_name', 'Name', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1198, 'Warehouse', 1, 'warehouse_form_name', 'Name', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1199, 'Warehouse', 1, 'warehouse_form_name_placeholder', 'Enter name', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1200, 'Warehouse', 1, 'warehouse_table_type', 'Type', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1201, 'Warehouse', 1, 'warehouse_form_type', 'Type', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1202, 'Warehouse', 1, 'warehouse_form_type_placeholder', 'Enter type', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1203, 'Warehouse', 1, 'warehouse_table_address', 'Address', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1204, 'Warehouse', 1, 'warehouse_form_address', 'Address', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1205, 'Warehouse', 1, 'warehouse_form_address_placeholder', 'Enter address', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1206, 'Warehouse', 1, 'warehouse_table_active', 'Active', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1207, 'Warehouse', 1, 'warehouse_form_active', 'Active', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1208, 'Warehouse', 1, 'warehouse_form_active_placeholder', 'Enter active', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1209, 'Warehouse', 1, 'warehouse_table_created_at', 'Created at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1210, 'Warehouse', 1, 'warehouse_form_created_at', 'Created at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1211, 'Warehouse', 1, 'warehouse_form_created_at_placeholder', 'Enter created at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1212, 'Warehouse', 1, 'warehouse_table_updated_at', 'Updated at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1213, 'Warehouse', 1, 'warehouse_form_updated_at', 'Updated at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1214, 'Warehouse', 1, 'warehouse_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1215, 'Warehouse', 1, 'warehouse_table_deleted_at', 'Deleted at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1216, 'Warehouse', 1, 'warehouse_form_deleted_at', 'Deleted at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1217, 'Warehouse', 1, 'warehouse_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 20:34:25', '2025-02-03 20:34:25'),
(1218, 'Navigation', 1, 'navigation_navigation_manage products', 'Manage products', '2025-02-03 20:45:29', '2025-02-03 20:45:29'),
(1219, 'Agency', 1, 'agency_action_add', 'Add agency', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1220, 'Agency', 1, 'agency_action_show', 'Show agency', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1221, 'Agency', 1, 'agency_action_edit', 'Edit agency', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1222, 'Agency', 1, 'agency_action_delete', 'Delete agency', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1223, 'Agency', 1, 'agency_action_restore', 'Restore agency', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1224, 'Agency', 1, 'agency_message_add', 'Agency successfully created', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1225, 'Agency', 1, 'agency_message_show', 'Agency successfully showed', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1226, 'Agency', 1, 'agency_message_edit', 'Agency successfully updated', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1227, 'Agency', 1, 'agency_message_delete', 'Agency successfully deleted', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1228, 'Agency', 1, 'agency_message_restore', 'Agency successfully restored', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1229, 'Agency', 1, 'agency_message_activated', 'Agency has been successfully activated', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1230, 'Agency', 1, 'agency_message_inactivated', 'Agency has been successfully inactivated', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1231, 'Agency', 1, 'agency_form_manage_agencies', 'Manage agencies', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1232, 'Agency', 1, 'agency_form_agencies_list', 'List of agencies', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1233, 'Agency', 1, 'agency_form_deleted_agencies_list', 'List deleted agencies', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1234, 'Agency', 1, 'agency_form_manage_deleted_agencies', 'Manage deleted agencies', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1235, 'Agency', 1, 'agency_message_delete_multiple', 'Selected agencies have been successfully deleted.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1236, 'Agency', 1, 'agency_message_fail_delete_multiple', 'Failed to delete the selected agencies. Please try again.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1237, 'Agency', 1, 'agency_message_restore_multiple', 'Selected agencies have been successfully restored.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1238, 'Agency', 1, 'agency_message_fail_restore_multiple', 'Failed to restore the selected agencies. Please try again.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1239, 'Agency', 1, 'agency_message_activate_multiple', 'Selected agencies have been successfully activated.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1240, 'Agency', 1, 'agency_message_fail_activate_multiple', 'Failed to activate the selected agencies. Please try again.', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1241, 'Agency', 1, 'navigation_navigation_agency', 'agencies', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1242, 'Agency', 1, 'agency_table_name', 'Name', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1243, 'Agency', 1, 'agency_form_name', 'Name', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1244, 'Agency', 1, 'agency_form_name_placeholder', 'Enter name', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1245, 'Agency', 1, 'agency_table_address', 'Address', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1246, 'Agency', 1, 'agency_form_address', 'Address', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1247, 'Agency', 1, 'agency_form_address_placeholder', 'Enter address', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1248, 'Agency', 1, 'agency_table_phone', 'Phone', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1249, 'Agency', 1, 'agency_form_phone', 'Phone', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1250, 'Agency', 1, 'agency_form_phone_placeholder', 'Enter phone', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1251, 'Agency', 1, 'agency_table_fix', 'Fix', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1252, 'Agency', 1, 'agency_form_fix', 'Fix', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1253, 'Agency', 1, 'agency_form_fix_placeholder', 'Enter fix', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1254, 'Agency', 1, 'agency_table_isactive', 'Isactive', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1255, 'Agency', 1, 'agency_form_isactive', 'Isactive', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1256, 'Agency', 1, 'agency_form_isactive_placeholder', 'Enter isactive', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1257, 'Agency', 1, 'agency_table_bank_id', 'Bank', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1258, 'Agency', 1, 'agency_form_bank_id', 'Bank', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1259, 'Agency', 1, 'agency_form_bank_id_placeholder', 'Enter bank', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1260, 'Agency', 1, 'agency_table_created_at', 'Created at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1261, 'Agency', 1, 'agency_form_created_at', 'Created at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1262, 'Agency', 1, 'agency_form_created_at_placeholder', 'Enter created at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1263, 'Agency', 1, 'agency_table_updated_at', 'Updated at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1264, 'Agency', 1, 'agency_form_updated_at', 'Updated at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1265, 'Agency', 1, 'agency_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1266, 'Agency', 1, 'agency_table_deleted_at', 'Deleted at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1267, 'Agency', 1, 'agency_form_deleted_at', 'Deleted at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1268, 'Agency', 1, 'agency_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 21:07:59', '2025-02-03 21:07:59'),
(1269, 'Brand', 1, 'brand_action_add', 'Add brand', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1270, 'Brand', 1, 'brand_action_show', 'Show brand', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1271, 'Brand', 1, 'brand_action_edit', 'Edit brand', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1272, 'Brand', 1, 'brand_action_delete', 'Delete brand', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1273, 'Brand', 1, 'brand_action_restore', 'Restore brand', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1274, 'Brand', 1, 'brand_message_add', 'Brand successfully created', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1275, 'Brand', 1, 'brand_message_show', 'Brand successfully showed', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1276, 'Brand', 1, 'brand_message_edit', 'Brand successfully updated', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1277, 'Brand', 1, 'brand_message_delete', 'Brand successfully deleted', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1278, 'Brand', 1, 'brand_message_restore', 'Brand successfully restored', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1279, 'Brand', 1, 'brand_message_activated', 'Brand has been successfully activated', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1280, 'Brand', 1, 'brand_message_inactivated', 'Brand has been successfully inactivated', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1281, 'Brand', 1, 'brand_form_manage_brands', 'Manage brands', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1282, 'Brand', 1, 'brand_form_brands_list', 'List of brands', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1283, 'Brand', 1, 'brand_form_deleted_brands_list', 'List deleted brands', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1284, 'Brand', 1, 'brand_form_manage_deleted_brands', 'Manage deleted brands', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1285, 'Brand', 1, 'brand_message_delete_multiple', 'Selected brands have been successfully deleted.', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1286, 'Brand', 1, 'brand_message_fail_delete_multiple', 'Failed to delete the selected brands. Please try again.', '2025-02-03 21:14:44', '2025-02-03 21:14:44');
INSERT INTO `language_translates` (`id`, `model`, `language_id`, `label`, `translation`, `created_at`, `updated_at`) VALUES
(1287, 'Brand', 1, 'brand_message_restore_multiple', 'Selected brands have been successfully restored.', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1288, 'Brand', 1, 'brand_message_fail_restore_multiple', 'Failed to restore the selected brands. Please try again.', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1289, 'Brand', 1, 'brand_message_activate_multiple', 'Selected brands have been successfully activated.', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1290, 'Brand', 1, 'brand_message_fail_activate_multiple', 'Failed to activate the selected brands. Please try again.', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1291, 'Brand', 1, 'navigation_navigation_brand', 'brands', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1292, 'Brand', 1, 'brand_table_name', 'Name', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1293, 'Brand', 1, 'brand_form_name', 'Name', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1294, 'Brand', 1, 'brand_form_name_placeholder', 'Enter name', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1295, 'Brand', 1, 'brand_table_picture', 'Picture', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1296, 'Brand', 1, 'brand_form_picture', 'Picture', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1297, 'Brand', 1, 'brand_form_picture_placeholder', 'Enter picture', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1298, 'Brand', 1, 'brand_table_isactive', 'Isactive', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1299, 'Brand', 1, 'brand_form_isactive', 'Isactive', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1300, 'Brand', 1, 'brand_form_isactive_placeholder', 'Enter isactive', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1301, 'Brand', 1, 'brand_table_created_at', 'Created at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1302, 'Brand', 1, 'brand_form_created_at', 'Created at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1303, 'Brand', 1, 'brand_form_created_at_placeholder', 'Enter created at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1304, 'Brand', 1, 'brand_table_updated_at', 'Updated at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1305, 'Brand', 1, 'brand_form_updated_at', 'Updated at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1306, 'Brand', 1, 'brand_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1307, 'Brand', 1, 'brand_table_deleted_at', 'Deleted at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1308, 'Brand', 1, 'brand_form_deleted_at', 'Deleted at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1309, 'Brand', 1, 'brand_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 21:14:44', '2025-02-03 21:14:44'),
(1310, 'Category', 1, 'category_action_add', 'Add category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1311, 'Category', 1, 'category_action_show', 'Show category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1312, 'Category', 1, 'category_action_edit', 'Edit category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1313, 'Category', 1, 'category_action_delete', 'Delete category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1314, 'Category', 1, 'category_action_restore', 'Restore category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1315, 'Category', 1, 'category_message_add', 'Category successfully created', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1316, 'Category', 1, 'category_message_show', 'Category successfully showed', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1317, 'Category', 1, 'category_message_edit', 'Category successfully updated', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1318, 'Category', 1, 'category_message_delete', 'Category successfully deleted', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1319, 'Category', 1, 'category_message_restore', 'Category successfully restored', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1320, 'Category', 1, 'category_message_activated', 'Category has been successfully activated', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1321, 'Category', 1, 'category_message_inactivated', 'Category has been successfully inactivated', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1322, 'Category', 1, 'category_form_manage_categories', 'Manage categories', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1323, 'Category', 1, 'category_form_categories_list', 'List of categories', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1324, 'Category', 1, 'category_form_deleted_categories_list', 'List deleted categories', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1325, 'Category', 1, 'category_form_manage_deleted_categories', 'Manage deleted categories', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1326, 'Category', 1, 'category_message_delete_multiple', 'Selected categories have been successfully deleted.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1327, 'Category', 1, 'category_message_fail_delete_multiple', 'Failed to delete the selected categories. Please try again.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1328, 'Category', 1, 'category_message_restore_multiple', 'Selected categories have been successfully restored.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1329, 'Category', 1, 'category_message_fail_restore_multiple', 'Failed to restore the selected categories. Please try again.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1330, 'Category', 1, 'category_message_activate_multiple', 'Selected categories have been successfully activated.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1331, 'Category', 1, 'category_message_fail_activate_multiple', 'Failed to activate the selected categories. Please try again.', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1332, 'Category', 1, 'navigation_navigation_category', 'categories', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1333, 'Category', 1, 'category_table_picture', 'Picture', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1334, 'Category', 1, 'category_form_picture', 'Picture', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1335, 'Category', 1, 'category_form_picture_placeholder', 'Enter picture', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1336, 'Category', 1, 'category_table_name', 'Name', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1337, 'Category', 1, 'category_form_name', 'Name', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1338, 'Category', 1, 'category_form_name_placeholder', 'Enter name', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1339, 'Category', 1, 'category_table_category_id', 'Category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1340, 'Category', 1, 'category_form_category_id', 'Category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1341, 'Category', 1, 'category_form_category_id_placeholder', 'Enter category', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1342, 'Category', 1, 'category_table_isactive', 'Isactive', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1343, 'Category', 1, 'category_form_isactive', 'Isactive', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1344, 'Category', 1, 'category_form_isactive_placeholder', 'Enter isactive', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1345, 'Category', 1, 'category_table_created_at', 'Created at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1346, 'Category', 1, 'category_form_created_at', 'Created at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1347, 'Category', 1, 'category_form_created_at_placeholder', 'Enter created at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1348, 'Category', 1, 'category_table_updated_at', 'Updated at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1349, 'Category', 1, 'category_form_updated_at', 'Updated at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1350, 'Category', 1, 'category_form_updated_at_placeholder', 'Enter updated at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1351, 'Category', 1, 'category_table_deleted_at', 'Deleted at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1352, 'Category', 1, 'category_form_deleted_at', 'Deleted at', '2025-02-03 21:17:13', '2025-02-03 21:17:13'),
(1353, 'Category', 1, 'category_form_deleted_at_placeholder', 'Enter deleted at', '2025-02-03 21:17:13', '2025-02-03 21:17:13');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_languages_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_21_124404_create_groupes_table', 1),
(7, '2022_09_10_103739_create_countries_table', 1),
(8, '2022_11_28_113921_create_language_translates_table', 1),
(9, '2023_05_08_220653_create_professions_table', 1),
(10, '2023_06_11_075700_create_permission_tables', 1),
(11, '2023_09_07_171318_create_states_table', 1),
(12, '2024_06_22_114613_create_settings_table', 1),
(13, '2024_07_10_110733_create_sidebars_table', 1),
(14, '2024_07_13_212916_create_clients_table', 1),
(15, '2024_07_14_100414_create_numerotations_table', 1),
(16, '2024_07_14_153343_create_exercices_table', 1),
(17, '2024_07_19_102321_create_sites_table', 1),
(18, '2024_07_19_104835_create_societies_table', 1),
(19, '2024_07_19_110453_create_employes_table', 1),
(20, '2024_07_19_111457_create_suppliers_table', 1),
(21, '2024_07_19_113119_create_banks_table', 1),
(22, '2024_07_19_114223_create_comptes_table', 1),
(23, '2024_07_19_115252_create_carnets_table', 1),
(24, '2024_07_19_120705_create_cheques_table', 1),
(25, '2024_07_19_121219_create_effets_table', 1),
(26, '2024_08_14_095611_create_cities_table', 1),
(27, '2025_01_27_094848_create_secteurs_table', 1),
(28, '2025_02_03_211616_create_warehouses_table', 1),
(29, '2025_02_03_220520_create_agencies_table', 2),
(30, '2025_02_03_214020_create_products_table', 3),
(31, '2025_02_03_221101_create_brands_table', 3),
(32, '2025_02_03_221559_create_categories_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Modules\\User\\App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `numerotations`
--

CREATE TABLE `numerotations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `increment_num` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `numerotations`
--

INSERT INTO `numerotations` (`id`, `doc_type`, `prefix`, `increment_num`, `comment`, `isactive`, `created_at`, `updated_at`, `deleted_at`) VALUES
('2fc6dd03-c9a8-4542-9d04-f9fed639dae8', 'Founisseur', 'FR-', 0, '<p>Founisseur</p>', 1, '2023-12-27 17:59:44', '2023-12-27 17:59:44', NULL),
('38a04f6f-aef9-4126-9150-4a731af1d180', 'Client', 'CL-', 0, '<p>Client</p>', 1, '2023-12-27 17:59:44', '2023-12-27 17:59:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `libele`, `guard_name`, `groupe_id`, `created_at`, `updated_at`) VALUES
(1, 'user-create', 'Create', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(2, 'user-show', 'Show', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(3, 'user-edit', 'Update', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(4, 'user-delete', 'Delete', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(5, 'user-list', 'List', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(6, 'user-trashed', 'Trashed list', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(7, 'user-force-delete', 'Force delete', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(8, 'user-restore', 'Restore', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(9, 'user-export', 'Export', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(10, 'user-multiple-delete', 'Multiple delete', 'web', 1, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(11, 'role-create', 'Create', 'web', 2, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(12, 'role-show', 'Show', 'web', 2, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(13, 'role-edit', 'Edit', 'web', 2, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(14, 'role-delete', 'Delete', 'web', 2, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(15, 'role-list', 'List', 'web', 2, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(16, 'country-create', 'Create', 'web', 3, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(17, 'country-show', 'Show', 'web', 3, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(18, 'country-edit', 'Edit', 'web', 3, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(19, 'country-delete', 'Delete', 'web', 3, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(20, 'country-list', 'List', 'web', 3, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(21, 'systemlanguage-create', 'Create', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(22, 'systemlanguage-show', 'Show', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(23, 'systemlanguage-edit', 'Edit', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(24, 'systemlanguage-delete', 'Delete', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(25, 'systemlanguage-list', 'Featured', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(26, 'systemlanguage-translation', 'Translation', 'web', 4, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(27, 'setting-create', 'Create', 'web', 5, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(28, 'setting-show', 'Show', 'web', 5, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(29, 'setting-edit', 'Edit', 'web', 5, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(30, 'setting-delete', 'Delete', 'web', 5, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(31, 'setting-list', 'List', 'web', 5, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(32, 'menu-dashboard', 'dashboard', 'web', 6, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(33, 'menu-manage-users', 'Manage users', 'web', 6, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(34, 'menu-countries', 'Countries', 'web', 6, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(35, 'menu-languages', 'Languages', 'web', 6, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(36, 'menu-settings', 'Settings', 'web', 6, '2024-07-07 10:57:05', '2024-07-07 10:57:05'),
(37, 'permission-create', 'Create', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(38, 'permission-show', 'Show', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(39, 'permission-edit', 'Update', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(40, 'permission-delete', 'Delete', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(41, 'permission-list', 'List', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(42, 'permission-trashed', 'Trashed list', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(43, 'permission-force-delete', 'Force delete', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(44, 'permission-restore', 'Restore', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(45, 'permission-export', 'Export', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(46, 'permission-multiple-delete', 'Multiple delete', 'web', 7, '2024-07-07 12:02:04', '2024-07-07 12:02:04'),
(47, 'languagetranslate-create', 'Create', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(48, 'languagetranslate-show', 'Show', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(49, 'languagetranslate-edit', 'Update', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(50, 'languagetranslate-delete', 'Delete', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(51, 'languagetranslate-list', 'List', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(52, 'languagetranslate-trashed', 'Trashed list', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(53, 'languagetranslate-force-delete', 'Force delete', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(54, 'languagetranslate-restore', 'Restore', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(55, 'languagetranslate-export', 'Export', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(56, 'languagetranslate-multiple-delete', 'Multiple delete', 'web', 8, '2024-07-07 12:02:20', '2024-07-07 12:02:20'),
(57, 'sidebar-create', 'Create', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(58, 'sidebar-show', 'Show', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(59, 'sidebar-edit', 'Update', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(60, 'sidebar-delete', 'Delete', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(61, 'sidebar-list', 'List', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(62, 'sidebar-trashed', 'Trashed list', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(63, 'sidebar-force-delete', 'Force delete', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(64, 'sidebar-restore', 'Restore', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(65, 'sidebar-export', 'Export', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(66, 'sidebar-multiple-delete', 'Multiple delete', 'web', 9, '2025-02-02 17:50:16', '2025-02-02 17:50:16'),
(67, 'secteur-create', 'Create', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(68, 'secteur-show', 'Show', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(69, 'secteur-edit', 'Update', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(70, 'secteur-delete', 'Delete', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(71, 'secteur-list', 'List', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(72, 'secteur-trashed', 'Trashed list', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(73, 'secteur-force-delete', 'Force delete', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(74, 'secteur-restore', 'Restore', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(75, 'secteur-export', 'Export', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(76, 'secteur-multiple-delete', 'Multiple delete', 'web', 10, '2025-02-02 17:50:53', '2025-02-02 17:50:53'),
(77, 'state-create', 'Create', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(78, 'state-show', 'Show', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(79, 'state-edit', 'Update', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(80, 'state-delete', 'Delete', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(81, 'state-list', 'List', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(82, 'state-trashed', 'Trashed list', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(83, 'state-force-delete', 'Force delete', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(84, 'state-restore', 'Restore', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(85, 'state-export', 'Export', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(86, 'state-multiple-delete', 'Multiple delete', 'web', 11, '2025-02-02 17:51:04', '2025-02-02 17:51:04'),
(87, 'city-create', 'Create', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(88, 'city-show', 'Show', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(89, 'city-edit', 'Update', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(90, 'city-delete', 'Delete', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(91, 'city-list', 'List', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(92, 'city-trashed', 'Trashed list', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(93, 'city-force-delete', 'Force delete', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(94, 'city-restore', 'Restore', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(95, 'city-export', 'Export', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(96, 'city-multiple-delete', 'Multiple delete', 'web', 12, '2025-02-02 17:51:10', '2025-02-02 17:51:10'),
(97, 'site-create', 'Create', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(98, 'site-show', 'Show', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(99, 'site-edit', 'Update', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(100, 'site-delete', 'Delete', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(101, 'site-list', 'List', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(102, 'site-trashed', 'Trashed list', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(103, 'site-force-delete', 'Force delete', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(104, 'site-restore', 'Restore', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(105, 'site-export', 'Export', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(106, 'site-multiple-delete', 'Multiple delete', 'web', 9, '2025-02-03 09:27:25', '2025-02-03 09:27:25'),
(107, 'society-create', 'Create', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(108, 'society-show', 'Show', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(109, 'society-edit', 'Update', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(110, 'society-delete', 'Delete', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(111, 'society-list', 'List', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(112, 'society-trashed', 'Trashed list', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(113, 'society-force-delete', 'Force delete', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(114, 'society-restore', 'Restore', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(115, 'society-export', 'Export', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(116, 'society-multiple-delete', 'Multiple delete', 'web', 10, '2025-02-03 09:29:10', '2025-02-03 09:29:10'),
(117, 'employe-create', 'Create', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(118, 'employe-show', 'Show', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(119, 'employe-edit', 'Update', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(120, 'employe-delete', 'Delete', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(121, 'employe-list', 'List', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(122, 'employe-trashed', 'Trashed list', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(123, 'employe-force-delete', 'Force delete', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(124, 'employe-restore', 'Restore', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(125, 'employe-export', 'Export', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(126, 'employe-multiple-delete', 'Multiple delete', 'web', 11, '2025-02-03 09:30:05', '2025-02-03 09:30:05'),
(127, 'supplier-create', 'Create', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(128, 'supplier-show', 'Show', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(129, 'supplier-edit', 'Update', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(130, 'supplier-delete', 'Delete', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(131, 'supplier-list', 'List', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(132, 'supplier-trashed', 'Trashed list', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(133, 'supplier-force-delete', 'Force delete', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(134, 'supplier-restore', 'Restore', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(135, 'supplier-export', 'Export', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(136, 'supplier-multiple-delete', 'Multiple delete', 'web', 12, '2025-02-03 09:31:38', '2025-02-03 09:31:38'),
(137, 'client-create', 'Create', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(138, 'client-show', 'Show', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(139, 'client-edit', 'Update', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(140, 'client-delete', 'Delete', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(141, 'client-list', 'List', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(142, 'client-trashed', 'Trashed list', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(143, 'client-force-delete', 'Force delete', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(144, 'client-restore', 'Restore', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(145, 'client-export', 'Export', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(146, 'client-multiple-delete', 'Multiple delete', 'web', 13, '2025-02-03 09:32:17', '2025-02-03 09:32:17'),
(147, 'bank-create', 'Create', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(148, 'bank-show', 'Show', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(149, 'bank-edit', 'Update', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(150, 'bank-delete', 'Delete', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(151, 'bank-list', 'List', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(152, 'bank-trashed', 'Trashed list', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(153, 'bank-force-delete', 'Force delete', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(154, 'bank-restore', 'Restore', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(155, 'bank-export', 'Export', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(156, 'bank-multiple-delete', 'Multiple delete', 'web', 14, '2025-02-03 09:33:02', '2025-02-03 09:33:02'),
(157, 'compte-create', 'Create', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(158, 'compte-show', 'Show', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(159, 'compte-edit', 'Update', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(160, 'compte-delete', 'Delete', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(161, 'compte-list', 'List', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(162, 'compte-trashed', 'Trashed list', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(163, 'compte-force-delete', 'Force delete', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(164, 'compte-restore', 'Restore', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(165, 'compte-export', 'Export', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(166, 'compte-multiple-delete', 'Multiple delete', 'web', 15, '2025-02-03 09:33:47', '2025-02-03 09:33:47'),
(167, 'carnet-create', 'Create', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(168, 'carnet-show', 'Show', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(169, 'carnet-edit', 'Update', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(170, 'carnet-delete', 'Delete', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(171, 'carnet-list', 'List', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(172, 'carnet-trashed', 'Trashed list', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(173, 'carnet-force-delete', 'Force delete', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(174, 'carnet-restore', 'Restore', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(175, 'carnet-export', 'Export', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(176, 'carnet-multiple-delete', 'Multiple delete', 'web', 16, '2025-02-03 09:34:35', '2025-02-03 09:34:35'),
(177, 'cheque-create', 'Create', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(178, 'cheque-show', 'Show', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(179, 'cheque-edit', 'Update', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(180, 'cheque-delete', 'Delete', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(181, 'cheque-list', 'List', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(182, 'cheque-trashed', 'Trashed list', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(183, 'cheque-force-delete', 'Force delete', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(184, 'cheque-restore', 'Restore', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(185, 'cheque-export', 'Export', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(186, 'cheque-multiple-delete', 'Multiple delete', 'web', 17, '2025-02-03 09:35:27', '2025-02-03 09:35:27'),
(187, 'effet-create', 'Create', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(188, 'effet-show', 'Show', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(189, 'effet-edit', 'Update', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(190, 'effet-delete', 'Delete', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(191, 'effet-list', 'List', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(192, 'effet-trashed', 'Trashed list', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(193, 'effet-force-delete', 'Force delete', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(194, 'effet-restore', 'Restore', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(195, 'effet-export', 'Export', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(196, 'effet-multiple-delete', 'Multiple delete', 'web', 18, '2025-02-03 09:36:44', '2025-02-03 09:36:44'),
(197, 'numerotation-create', 'Create', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(198, 'numerotation-show', 'Show', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(199, 'numerotation-edit', 'Update', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(200, 'numerotation-delete', 'Delete', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(201, 'numerotation-list', 'List', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(202, 'numerotation-trashed', 'Trashed list', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(203, 'numerotation-force-delete', 'Force delete', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(204, 'numerotation-restore', 'Restore', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(205, 'numerotation-export', 'Export', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(206, 'numerotation-multiple-delete', 'Multiple delete', 'web', 19, '2025-02-03 09:57:56', '2025-02-03 09:57:56'),
(207, 'exercice-create', 'Create', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(208, 'exercice-show', 'Show', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(209, 'exercice-edit', 'Update', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(210, 'exercice-delete', 'Delete', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(211, 'exercice-list', 'List', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(212, 'exercice-trashed', 'Trashed list', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(213, 'exercice-force-delete', 'Force delete', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(214, 'exercice-restore', 'Restore', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(215, 'exercice-export', 'Export', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(216, 'exercice-multiple-delete', 'Multiple delete', 'web', 20, '2025-02-03 09:58:57', '2025-02-03 09:58:57'),
(217, 'product-create', 'Create', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(218, 'product-show', 'Show', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(219, 'product-edit', 'Update', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(220, 'product-delete', 'Delete', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(221, 'product-list', 'List', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(222, 'product-trashed', 'Trashed list', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(223, 'product-force-delete', 'Force delete', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(224, 'product-restore', 'Restore', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(225, 'product-export', 'Export', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(226, 'product-multiple-delete', 'Multiple delete', 'web', 21, '2025-02-03 20:40:21', '2025-02-03 20:40:21'),
(227, 'Product', 'product-sidebar', 'web', 21, '2025-02-03 20:43:24', '2025-02-03 20:43:24'),
(228, 'agency-create', 'Create', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(229, 'agency-show', 'Show', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(230, 'agency-edit', 'Update', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(231, 'agency-delete', 'Delete', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(232, 'agency-list', 'List', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(233, 'agency-trashed', 'Trashed list', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(234, 'agency-force-delete', 'Force delete', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(235, 'agency-restore', 'Restore', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(236, 'agency-export', 'Export', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(237, 'agency-multiple-delete', 'Multiple delete', 'web', 22, '2025-02-03 21:05:20', '2025-02-03 21:05:20'),
(238, 'brand-create', 'Create', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(239, 'brand-show', 'Show', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(240, 'brand-edit', 'Update', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(241, 'brand-delete', 'Delete', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(242, 'brand-list', 'List', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(243, 'brand-trashed', 'Trashed list', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(244, 'brand-force-delete', 'Force delete', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(245, 'brand-restore', 'Restore', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(246, 'brand-export', 'Export', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(247, 'brand-multiple-delete', 'Multiple delete', 'web', 23, '2025-02-03 21:11:01', '2025-02-03 21:11:01'),
(248, 'category-create', 'Create', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(249, 'category-show', 'Show', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(250, 'category-edit', 'Update', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(251, 'category-delete', 'Delete', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(252, 'category-list', 'List', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(253, 'category-trashed', 'Trashed list', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(254, 'category-force-delete', 'Force delete', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(255, 'category-restore', 'Restore', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(256, 'category-export', 'Export', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59'),
(257, 'category-multiple-delete', 'Multiple delete', 'web', 24, '2025-02-03 21:15:59', '2025-02-03 21:15:59');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professions`
--

CREATE TABLE `professions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professions`
--

INSERT INTO `professions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Acheteur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(2, 'Administrateur de base de données', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(3, 'Agent de sûreté aéroportuaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(4, 'Agent de transit', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(5, 'Agent d\'entretien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(6, 'Agent funéraire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(7, 'Agent immobilier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(8, 'Agent de police', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(9, 'Agent de presse', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(10, 'Agent de sécurité', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(11, 'Agent de surveillance de la voie publique (ASVP)', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(12, 'Agronome', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(13, 'Ambulancier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(14, 'Analyste financier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(15, 'Analyste programmeur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(16, 'Analyste Web', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(17, 'Architecte', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(18, 'Architecte paysagiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(19, 'Architecte en système d\'information', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(20, 'Archiviste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(21, 'Assistant administratif et financier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(22, 'Assistant bibliothécaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(23, 'Assistant d\'éducation', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(24, 'Assistant dentaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(25, 'Assistant marketing', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(26, 'Assistant paie et administration', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(27, 'Assistant RH', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(28, 'Assureur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(29, 'Audioprothésiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(30, 'Auditeur financier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(31, 'Auxiliaire de puériculture', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(32, 'Auxiliaire de vie sociale', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(33, 'Avocat', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(34, 'Bibliothécaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(35, 'Biologiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(36, 'Chargé de communication', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(37, 'Chargé de recrutement', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(38, 'Charpentier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(39, 'Chauffeur de taxi', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(40, 'Chefs de chantier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(41, 'Chef de projet', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(42, 'Chef de projet marketing', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(43, 'Chef d\'établissement', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(44, 'Chiropracteur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(45, 'Chirurgien orthopédiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(46, 'Coiffeur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(47, 'Commis de cuisine', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(48, 'Comptable', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(49, 'Concepteur de jeux vidéos', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(50, 'Concepteur-rédacteur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(51, 'Conducteur de grue', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(52, 'Conducteur de train', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(53, 'Conseiller', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(54, 'Conseiller d\'orientation', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(55, 'Conseiller en insertion professionnelle', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(56, 'Consultant bien-être', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(57, 'Consultant en informatique', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(58, 'Contrôleur (trains)', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(59, 'Contrôleur aérien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(60, 'Contrôleur de gestion', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(61, 'Contrôleur financier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(62, 'Courtier en assurance', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(63, 'Cuisinier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(64, 'Décorateur d\'intérieur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(65, 'Dentiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(66, 'Designer industriel', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(67, 'Développeur informatique', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(68, 'Diacre', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(69, 'Diététicien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(70, 'Directeur artistique', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(71, 'Directeur des ventes', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(72, 'Directeur financier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(73, 'Directeur RH', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(74, 'Économiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(75, 'Éducateur de jeunes', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(76, 'Éleveur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(77, 'Employé de banque', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(78, 'Enseignant', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(79, 'Ergothérapeute', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(80, 'Esthéticienne', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(81, 'Fleuriste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(82, 'Gardien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(83, 'Géomètre', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(84, 'Gestionnaire immobilier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(85, 'Hôtesse de l\'air', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(86, 'Huissier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(87, 'Illustrateur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(88, 'Infirmière', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(89, 'Ingénieur civil', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(90, 'Ingénieur électronicien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(91, 'Ingénieur du BTP', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(92, 'Inspecteur de l\'action sanitaire et sociale', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(93, 'Jardinier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(94, 'Jardinier paysagiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(95, 'Journaliste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(96, 'Juge', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(97, 'Kinésithérapeute', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(98, 'Linguiste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(99, 'Machiniste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(100, 'Magasinier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(101, 'Maître d\'hôtel', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(102, 'Manipulateur radio', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(103, 'Masseur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(104, 'Mécanicien aéronautique', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(105, 'Médecin', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(106, 'Moniteur d\'auto-école', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(107, 'Monteur électricien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(108, 'Nutritionniste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(109, 'Officier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(110, 'Opérateur de production', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(111, 'Opérateur d\'usinage sur commande numérique (UCN)', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(112, 'Opticien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(113, 'Orthophoniste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(114, 'Personal Trainer', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(115, 'Pharmacien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(116, 'Photographe', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(117, 'Physicien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(118, 'Physicien médical', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(119, 'Pilote', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(120, 'Politicien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(121, 'Pompier', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(122, 'Poseur de sol (solier)', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(123, 'Prêtre', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(124, 'Procureur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(125, 'Professeur des écoles', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(126, 'Professeur d\'éducation physique (EPS)', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(127, 'Professeur de français langue étrangère', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(128, 'Professeur des universités', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(129, 'Psychologue', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(130, 'Réceptionniste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(131, 'Réceptionniste d\'hôtel', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(132, 'Responsable communication', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(133, 'Responsable grands comptes', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(134, 'Responsable service clientèle', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(135, 'Sages-femmes', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(136, 'Secrétaire médicale', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(137, 'Serveur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(138, 'Skipper', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(139, 'Soldat', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(140, 'Soudeur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(141, 'Statisticien', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(142, 'Surveillant pénitentiaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(143, 'Technicien alarme intrusion', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(144, 'Technicien d\'analyses biomédicales', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(145, 'Technicien de maintenance informatique', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(146, 'Technicien d\'exploitation', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(147, 'Téléconseiller', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(148, 'Test manager', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(149, 'Travailleur social', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(150, 'Urbaniste', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(151, 'Vendeur', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(152, 'Vétérinaire', '2025-02-03 20:20:46', '2025-02-03 20:20:46'),
(153, 'Webmaster', '2025-02-03 20:20:46', '2025-02-03 20:20:46');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-02-03 20:20:45', '2025-02-03 20:20:45');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1);

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

CREATE TABLE `secteurs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'system_name', 'TECHIMO', NULL, NULL),
(2, 'title', 'App description', NULL, NULL),
(3, 'address', 'Quartier el Wafaa II N° 5254 FRANCE', NULL, NULL),
(4, 'phone', '+212 657 04 19 93', NULL, NULL),
(5, 'email', 'TECHIMO@gmail.com', NULL, NULL),
(6, 'picture', 'setting_picture.jpg', NULL, NULL),
(7, 'favorites_icon', 'favorites_icon.jpg', NULL, NULL),
(8, 'logo', 'logo.jpg', NULL, NULL),
(9, 'favicon', 'favicon.jpg', NULL, NULL),
(10, 'copyrigth', 'copyrigth', NULL, NULL),
(11, 'facebook', 'facebook', NULL, NULL),
(12, 'twitter', 'twitter', NULL, NULL),
(13, 'youtube', 'youtube', NULL, NULL),
(14, 'linkedin', 'linkedin', NULL, NULL),
(15, 'instagram', 'instagram', NULL, NULL),
(16, 'auth_description', '<h1 class=\"d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7\">\n                        Fast, Efficient and Productive\n                    </h1>\n                    <!--end::Title-->\n\n                    <!--begin::Text-->\n                    <div class=\"d-none d-lg-block text-white fs-base text-center\">\n                        In this kind of post, <a href=\"#\" class=\"opacity-75-hover text-warning fw-bold me-1\">the blogger</a>\n\n                        introduces a person they’ve interviewed <br/> and provides some background information about\n\n                        <a href=\"#\" class=\"opacity-75-hover text-warning fw-bold me-1\">the interviewee</a>\n                        and their <br/> work following this is a transcript of the interview.\n                    </div>', NULL, NULL),
(17, 'auth_picture', 'auth_picture.jpg', NULL, NULL),
(18, 'protocol', 'SMTP', NULL, NULL),
(19, 'encryption', 'ssl', NULL, NULL),
(20, 'host', 'smtp.gmail.com', NULL, NULL),
(21, 'port', '465', NULL, NULL),
(22, 'username', 'mezyan.lahcen17@gmail.com', NULL, NULL),
(23, 'password', 'baoogsqwlfsaevep', NULL, NULL),
(24, 'sender_default_name', 'sender default name', NULL, NULL),
(25, 'sender_default_email', 'setting@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sidebars`
--

CREATE TABLE `sidebars` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sidebar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sidebars`
--

INSERT INTO `sidebars` (`id`, `name`, `icon`, `permission`, `sidebar_id`, `order`, `route`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0e4fb683-dbb0-4a11-959b-c7f37f1288ec', 'Secteur', NULL, 'menu-settings', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 4, 'secteur', 'child', '2025-01-19 11:30:58', '2025-01-19 11:30:58', NULL),
('0f0262be-35d1-490c-adc6-226d9c001ef2', 'Numerotation', NULL, 'numerotation-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 6, 'numerotation', 'child', '2025-02-03 10:00:31', '2025-02-03 10:00:31', NULL),
('0f647f60-a65a-4e3f-8765-3641557a5621', 'Bank', NULL, 'bank-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 1, 'bank', 'child', '2024-07-19 05:31:19', '2024-07-19 05:35:35', NULL),
('1391979f-dc69-4d2a-b8e5-bd0d53e684c5', 'Manage products', 'basket', 'product-list', NULL, 2, NULL, 'hasChilds', '2025-02-03 20:45:29', '2025-02-03 21:04:22', NULL),
('1dfed6a7-a992-48de-aa93-0fa2ce41b6a8', 'Agency', NULL, 'agency-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 2, 'agency', 'child', '2025-02-03 21:05:20', '2025-02-03 21:09:04', NULL),
('2abc9d8c-6f54-489f-b4e6-e0bc91313093', 'Supplier', NULL, 'supplier-list', '8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 4, 'supplier', 'child', '2024-07-19 05:14:57', '2024-07-19 05:23:57', NULL),
('3e40f8ce-4e8e-4ddf-9a7f-9be3b7961ec2', 'language', NULL, 'systemlanguage-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 2, 'language', 'child', '2024-08-14 03:17:29', '2025-01-19 16:04:39', NULL),
('44c6624f-58ec-45bf-86f3-ae379201e676', 'Cheque', NULL, 'cheque-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 4, 'cheque', 'child', '2024-07-19 06:07:05', '2024-07-19 06:09:44', NULL),
('4606d0f9-d50b-4906-a466-e109ddb43fdf', 'Manage comptes', 'note-2', 'client-list', NULL, 2, 'client', 'hasChilds', '2024-07-19 05:30:27', '2025-02-03 09:46:22', NULL),
('49f1eafb-40d2-4a1a-aa89-9cc14e43f7c4', 'Brand', NULL, 'brand-list', '1391979f-dc69-4d2a-b8e5-bd0d53e684c5', 3, 'brand', 'child', '2025-02-03 21:11:01', '2025-02-03 21:15:30', NULL),
('4bd563d8-4daf-415e-adbf-03af711f85a3', 'Carnet', NULL, 'carnet-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 3, 'carnet', 'child', '2024-07-19 05:52:52', '2024-07-19 05:55:33', NULL),
('4f300972-eba5-4afd-bf8a-53688c0009fb', 'slider', NULL, 'slider-list', '64dd94d3-9da1-4c60-bda6-5a5e561945cd', 2, 'slider', 'child', '2024-08-13 02:36:07', '2024-08-14 12:21:59', NULL),
('58347cdb-6074-432a-bfd9-f8ea8b495ae1', 'Category', NULL, 'category-list', '1391979f-dc69-4d2a-b8e5-bd0d53e684c5', 0, 'category', 'child', '2025-02-03 21:15:59', '2025-02-03 21:17:38', NULL),
('64f0a50b-f47c-4efc-88cb-bf1a341989e9', 'Employe', NULL, 'employe-list', '8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 3, 'employe', 'child', '2024-07-19 05:04:56', '2024-07-19 05:09:36', NULL),
('7ef9db83-398c-4ac9-ba9c-c63acd2bad33', 'Effet', NULL, 'effet-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 5, 'effet', 'child', '2024-07-19 06:12:19', '2024-07-19 06:14:11', NULL),
('8008acd6-484e-49c4-864c-a5b568c3cfda', 'Exercice', NULL, 'exercice-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 7, 'exercice', 'child', '2025-02-03 10:01:35', '2025-02-03 10:01:35', NULL),
('8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 'Referenciel', 'document', 'client-list', NULL, 1, 'client', 'hasChilds', '2024-07-19 04:22:48', '2025-02-03 09:48:18', NULL),
('91fc3a66-73d2-46f9-b05f-f34ec2af6041', 'state', NULL, 'state-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 4, 'state', 'child', '2024-08-14 00:47:30', '2024-08-14 12:21:24', NULL),
('a19e1b6a-cf47-4ec2-bb47-69500114cbde', 'Society', NULL, 'society-list', '8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 2, 'society', 'child', '2024-07-19 04:48:37', '2024-07-19 04:54:07', NULL),
('ad935ec9-3c6e-4c10-a1d0-66445763d3f8', 'Product', NULL, 'product-list', '1391979f-dc69-4d2a-b8e5-bd0d53e684c5', 1, 'product', 'child', '2025-02-03 20:40:21', '2025-02-03 21:04:22', NULL),
('dd3092f1-394b-4782-b876-dbcb55271fba', 'Client', NULL, 'client-edit', '8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 5, 'client', 'child', '2024-07-19 05:25:00', '2024-07-19 05:25:00', NULL),
('e45d5170-6b63-4175-be5d-0e49b053f7bc', 'city', NULL, 'city-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 5, 'city', 'child', '2024-08-14 00:56:11', '2024-08-14 06:46:30', NULL),
('e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 'settings', 'setting-4', 'setting-list', NULL, 100, NULL, 'hasChilds', '2024-08-14 03:10:59', '2025-02-03 09:48:58', NULL),
('e7810435-13d9-4be9-8d8e-a40ea7cd9330', 'sidebar', NULL, 'sidebar-list', 'e68d3d8d-c0a6-41f2-a3f8-9494e32f6c6a', 2, 'sidebar', 'child', '2024-08-14 03:15:30', '2024-08-14 06:39:50', NULL),
('fd0a8d10-6ed5-4b7b-b872-83574022acf7', 'Site', NULL, 'site-list', '8f2ee4d3-8c6c-4cdf-b0ae-a3aab98c5e28', 1, 'site', 'child', '2024-07-19 04:23:21', '2024-07-19 04:26:06', NULL),
('feb9402d-b062-4980-915d-6568b90e09a4', 'Compte', NULL, 'compte-list', '4606d0f9-d50b-4906-a466-e109ddb43fdf', 2, 'compte', 'child', '2024-07-19 05:42:23', '2024-07-19 05:46:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `societies`
--

CREATE TABLE `societies` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `secteur_id` int DEFAULT NULL,
  `cd_postale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_acs` double(8,2) NOT NULL DEFAULT '0.00',
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tanger-Tétouan-Al Hoceïma', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(2, 'l\'Oriental', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(3, 'Fès-Meknès', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(4, 'Rabat-Salé-Kénitra', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(5, 'Béni Mellal-Khénifra', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(6, 'Casablanca-Settat', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(7, 'Marrakech-Safi', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(8, 'Drâa-Tafilalet', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(9, 'Souss-Massa', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(10, 'Guelmim-Oued Noun', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(11, 'Laâyoune-Sakia El Hamra', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL),
(12, 'Dakhla-Oued Ed Dahab', '2024-03-27 08:39:04', '2024-03-27 08:39:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` int DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `secteur_id` int DEFAULT NULL,
  `cd_postale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_acs` double(8,2) NOT NULL DEFAULT '0.00',
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `language_id` bigint UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `state_id` int DEFAULT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `code_postale` text COLLATE utf8mb4_unicode_ci,
  `gender` text COLLATE utf8mb4_unicode_ci,
  `isSuperAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '127.0.0.1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `email_verified_at`, `language_id`, `password`, `isactive`, `state_id`, `city_id`, `phone`, `picture`, `address`, `code_postale`, `gender`, `isSuperAdmin`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'b9db2f45-06a6-4d3d-92ff-00ec969bfd90', 'Hassan', 'Mzn', 'admin@admin.com', '2025-02-03 20:20:44', 1, '$2y$10$awksw39cNM02uoGK3q6oXe6A5Z9qcXXHwjbMqi1tCM/l7ss8mf0nG', 0, 10, '100', '+212602086429', 'avatar.jpg', 'maroc kenitra elwafaa', '14000', 'male', 1, NULL, '127.0.0.1', NULL, '2025-02-03 20:20:44', '2025-02-03 20:53:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD UNIQUE KEY `agencies_id_unique` (`id`),
  ADD KEY `agencies_bank_id_foreign` (`bank_id`);

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD UNIQUE KEY `banks_id_unique` (`id`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD UNIQUE KEY `brands_id_unique` (`id`);

--
-- Index pour la table `carnets`
--
ALTER TABLE `carnets`
  ADD UNIQUE KEY `carnets_id_unique` (`id`),
  ADD KEY `carnets_bank_id_foreign` (`bank_id`),
  ADD KEY `carnets_compte_id_foreign` (`compte_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `categories_id_unique` (`id`);

--
-- Index pour la table `cheques`
--
ALTER TABLE `cheques`
  ADD UNIQUE KEY `cheques_id_unique` (`id`),
  ADD KEY `cheques_bank_id_foreign` (`bank_id`),
  ADD KEY `cheques_compte_id_foreign` (`compte_id`),
  ADD KEY `cheques_carnet_id_foreign` (`carnet_id`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD UNIQUE KEY `clients_id_unique` (`id`),
  ADD UNIQUE KEY `clients_ref_unique` (`ref`),
  ADD UNIQUE KEY `clients_ice_unique` (`ice`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD UNIQUE KEY `comptes_id_unique` (`id`),
  ADD KEY `comptes_bank_id_foreign` (`bank_id`),
  ADD KEY `comptes_society_id_foreign` (`society_id`),
  ADD KEY `comptes_employe_id_foreign` (`employe_id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `effets`
--
ALTER TABLE `effets`
  ADD UNIQUE KEY `effets_id_unique` (`id`),
  ADD KEY `effets_bank_id_foreign` (`bank_id`),
  ADD KEY `effets_compte_id_foreign` (`compte_id`),
  ADD KEY `effets_carnet_id_foreign` (`carnet_id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD UNIQUE KEY `employes_id_unique` (`id`);

--
-- Index pour la table `exercices`
--
ALTER TABLE `exercices`
  ADD UNIQUE KEY `exercices_id_unique` (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_locale_unique` (`locale`);

--
-- Index pour la table `language_translates`
--
ALTER TABLE `language_translates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `numerotations`
--
ALTER TABLE `numerotations`
  ADD UNIQUE KEY `numerotations_id_unique` (`id`),
  ADD UNIQUE KEY `numerotations_doc_type_unique` (`doc_type`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `products_id_unique` (`id`);

--
-- Index pour la table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `secteurs`
--
ALTER TABLE `secteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secteurs_city_id_foreign` (`city_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sidebars`
--
ALTER TABLE `sidebars`
  ADD UNIQUE KEY `sidebars_id_unique` (`id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD UNIQUE KEY `sites_id_unique` (`id`);

--
-- Index pour la table `societies`
--
ALTER TABLE `societies`
  ADD UNIQUE KEY `societies_id_unique` (`id`),
  ADD KEY `societies_site_id_foreign` (`site_id`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD UNIQUE KEY `suppliers_id_unique` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_language_id_foreign` (`language_id`);

--
-- Index pour la table `warehouses`
--
ALTER TABLE `warehouses`
  ADD UNIQUE KEY `warehouses_id_unique` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT pour la table `language_translates`
--
ALTER TABLE `language_translates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1354;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `secteurs`
--
ALTER TABLE `secteurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `carnets`
--
ALTER TABLE `carnets`
  ADD CONSTRAINT `carnets_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carnets_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheques_carnet_id_foreign` FOREIGN KEY (`carnet_id`) REFERENCES `carnets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheques_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comptes_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comptes_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `effets`
--
ALTER TABLE `effets`
  ADD CONSTRAINT `effets_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `effets_carnet_id_foreign` FOREIGN KEY (`carnet_id`) REFERENCES `carnets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `effets_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `secteurs`
--
ALTER TABLE `secteurs`
  ADD CONSTRAINT `secteurs_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `societies`
--
ALTER TABLE `societies`
  ADD CONSTRAINT `societies_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
