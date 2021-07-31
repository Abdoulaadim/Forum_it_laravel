-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 31 juil. 2021 à 22:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `y-c_forum_it`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_12_234537_create_question_table', 1),
(5, '2021_07_12_234608_create_reponse_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(18, 'dssd', 'sdds', 2, '2021-07-27 12:24:14', '2021-07-27 12:24:14'),
(2, 'azer', 'ddsd', 1, '2021-07-15 07:52:24', '2021-07-15 07:52:24'),
(3, 'fdfdf', 'fdfd', 1, '2021-07-15 09:04:59', '2021-07-15 09:04:59'),
(4, 'cxcx', 'cxx', 1, '2021-07-15 09:05:11', '2021-07-15 09:05:11'),
(5, 'jnk', 'fghj', 1, '2021-07-15 09:12:15', '2021-07-15 09:12:15'),
(12, 'azer', 'dsdsd', 1, '2021-07-24 18:20:59', '2021-07-24 18:20:59'),
(14, 'aaa', 'www', 1, '2021-07-25 23:46:29', '2021-07-26 00:19:53'),
(16, 'zaaz', 'zaaz', 2, '2021-07-26 01:06:02', '2021-07-26 01:06:02'),
(17, 'aaaaaaaaa', 'aaaaaaaa', 1, '2021-07-26 01:06:09', '2021-07-26 17:03:30'),
(20, 'qqsd', 'sdddfd', 3, '2021-07-27 12:25:51', '2021-07-27 12:25:51'),
(22, 'woooow ?', 'fdffd', 3, '2021-07-31 12:24:24', '2021-07-31 12:24:24');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reponse_user_id_foreign` (`user_id`),
  KEY `reponse_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `commentaire`, `user_id`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'AZAZ', 2, 2, '2021-07-29 07:13:14', '2021-07-29 07:13:14'),
(2, 'azed', 2, 2, '2021-07-29 07:28:10', '2021-07-29 07:28:10'),
(3, 'AZAZ', 2, 5, '2021-07-29 08:01:54', '2021-07-29 08:01:54'),
(4, 'cvcv', 2, 4, '2021-07-29 08:02:24', '2021-07-29 08:02:24'),
(5, 'ahmed', 2, 20, '2021-07-31 11:39:04', '2021-07-31 11:39:04'),
(6, 'asfi', 2, 2, '2021-07-31 11:48:18', '2021-07-31 11:48:18'),
(7, 'maroc', 3, 2, NULL, NULL),
(8, 'brahimx', 2, 2, '2021-07-31 12:09:25', '2021-07-31 12:09:25'),
(9, 'safio', 3, 2, '2021-07-31 12:12:23', '2021-07-31 12:12:23'),
(10, 'woow', 1, 2, '2021-07-31 12:17:11', '2021-07-31 12:17:11'),
(11, 'woow', 1, 20, '2021-07-31 12:17:38', '2021-07-31 12:17:38'),
(12, 'wooow', 1, 3, '2021-07-31 12:19:27', '2021-07-31 12:19:27'),
(13, 'aaa', 2, 12, '2021-07-31 12:20:28', '2021-07-31 12:20:28'),
(14, 'zzz', 3, 12, '2021-07-31 12:21:06', '2021-07-31 12:21:06'),
(15, 'wooow', 1, 12, '2021-07-31 12:22:42', '2021-07-31 12:22:42'),
(16, 'woow1', 1, 12, '2021-07-31 12:22:52', '2021-07-31 12:22:52'),
(17, 'azazza', 2, 21, '2021-07-31 12:23:59', '2021-07-31 12:23:59'),
(18, 'dsdsdsds', 3, 22, '2021-07-31 12:24:36', '2021-07-31 12:24:36'),
(19, 'wxdsqdqs', 1, 21, '2021-07-31 12:25:20', '2021-07-31 12:25:20'),
(20, 'dssdds', 1, 23, '2021-07-31 12:25:47', '2021-07-31 12:25:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@youcode.com', 1, NULL, '$2y$10$6T/Jtas3vIZoI.9.EVXHJuwj.HltFm/IOQeR7sQ5jw3WEefJFA4om', NULL, '2021-07-12 23:04:51', '2021-07-12 23:04:51'),
(2, 'Ahmed benbrahim', 'Ahmed@youcode.com', 0, NULL, '$2y$10$eFu4gAdX8v8kxOZ4qZ5E7.8yRBJJc4cyaoGO6ZX2cbivJSkxbNlVO', NULL, '2021-07-12 23:04:51', '2021-07-12 23:04:51'),
(3, 'Morad benhamid', 'morad@youcode.com', 0, NULL, '$2y$10$a8YfvX1vWLha2MZWF9jciuhHOHJRSYqbOS1vQorWG5BS3bEyiEGMe', NULL, '2021-07-27 12:25:36', '2021-07-27 12:25:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
