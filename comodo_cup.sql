-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 07:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comodo_cup`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finals`
--

CREATE TABLE `finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `minute` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Grup A', NULL, NULL),
(2, 'Group B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_score` int(11) DEFAULT NULL,
  `away_team_score` int(11) DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'armed',
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `home_team_score`, `away_team_score`, `place`, `match_date`, `match_time`, `created_at`, `updated_at`) VALUES
(9, 5, 7, 1, 0, 'armed', '2023-07-13', '05:12:00', '2023-07-05 09:12:28', '2023-07-05 09:12:28'),
(10, 6, 8, 3, 0, 'armed', '2023-07-13', '04:13:00', '2023-07-05 09:13:58', '2023-07-05 09:13:58'),
(11, 5, 6, 2, 1, 'armed', '2023-07-15', '04:15:00', '2023-07-05 09:15:28', '2023-07-05 09:15:28'),
(12, 7, 8, 1, 3, 'armed', '2023-07-17', '05:20:00', '2023-07-05 09:20:24', '2023-07-05 09:20:24'),
(13, 10, 9, 1, 1, 'armed', '2023-07-12', '01:54:00', '2023-07-05 09:50:17', '2023-07-05 09:50:17'),
(14, 5, 8, 2, 2, 'armed', '2023-07-11', '12:44:00', '2023-07-05 20:40:28', '2023-07-05 20:40:28'),
(15, 6, 7, 0, 2, 'armed', '2023-07-21', '12:44:00', '2023-07-05 20:41:44', '2023-07-05 20:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_04_110637_create_teams_table', 1),
(5, '2023_07_04_111146_create_players_table', 2),
(6, '2023_07_04_111813_create_player_team_table', 3),
(7, '2023_07_04_112502_create_matches_table', 4),
(8, '2023_07_04_113139_create_groups_table', 5),
(9, '2023_07_04_113422_create_standings_table', 6),
(10, '2023_07_04_115703_create_goals_table', 7),
(11, '2023_07_04_123641_create_round_of_16_table', 8),
(12, '2023_07_04_124041_create_quarter_finals_table', 9),
(13, '2023_07_04_124315_create_semi_final_table', 10),
(14, '2023_07_04_124445_create_final_table', 11),
(15, '2023_07_05_140242_create_team_groups_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_punggung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `foto` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `nomor_punggung`, `position`, `date_of_birth`, `height`, `weight`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Hendrikus', '20', 'CF', '1997-07-10', 170, 50, NULL, NULL, NULL),
(2, 'Romanus Daluk', '7', 'CB', '1999-07-15', 169, 56, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_team`
--

CREATE TABLE `player_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `date_joined` date NOT NULL,
  `date_left` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quarter_finals`
--

CREATE TABLE `quarter_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `round_of_16`
--

CREATE TABLE `round_of_16` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semi_finals`
--

CREATE TABLE `semi_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

CREATE TABLE `standings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `played` int(11) NOT NULL,
  `won` int(11) DEFAULT NULL,
  `drawn` int(11) DEFAULT NULL,
  `lost` int(11) DEFAULT NULL,
  `goals_for` int(11) NOT NULL,
  `goals_against` int(11) NOT NULL,
  `goal_difference` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`id`, `group_id`, `team_id`, `played`, `won`, `drawn`, `lost`, `goals_for`, `goals_against`, `goal_difference`, `points`, `created_at`, `updated_at`) VALUES
(5, 1, 5, 3, 2, 1, NULL, 5, 3, 2, 7, '2023-07-05 09:12:28', '2023-07-05 20:40:29'),
(6, 1, 7, 3, 1, NULL, 2, 3, 3, 0, 3, '2023-07-05 09:12:28', '2023-07-05 20:41:44'),
(7, 1, 6, 3, 1, NULL, 2, 3, 4, -1, 3, '2023-07-05 09:13:58', '2023-07-05 20:41:44'),
(8, 1, 8, 3, 1, 1, 1, 5, 6, -1, 4, '2023-07-05 09:13:58', '2023-07-05 20:40:29'),
(9, 2, 10, 1, NULL, 1, NULL, 1, 1, 0, 1, '2023-07-05 09:50:17', '2023-07-05 09:50:17'),
(10, 2, 9, 1, NULL, 1, NULL, 1, 1, 0, 1, '2023-07-05 09:50:17', '2023-07-05 09:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `founded_year` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `kabupaten`, `coach`, `founded_year`, `logo`, `created_at`, `updated_at`) VALUES
(5, 'Ruteng', 'Manggarai tengah', 'Simon teus', 2017, NULL, '2023-07-05 06:21:15', '2023-07-05 06:21:15'),
(6, 'Lembor FC', 'Manggari barat', 'Hendrikus', 2015, NULL, '2023-07-05 06:22:11', '2023-07-05 06:22:11'),
(7, 'PS Elar', 'Manggari timur', 'Tony jaa', 2016, NULL, '2023-07-05 06:23:10', '2023-07-05 06:23:10'),
(8, 'Cibal', 'Manggarai tengah', 'Erus fincen', 2015, NULL, '2023-07-05 06:23:55', '2023-07-05 06:23:55'),
(9, 'Satar mese', 'Manggarai tengah', 'Fransiskus', 2019, NULL, '2023-07-05 08:01:39', '2023-07-05 08:01:39'),
(10, 'Persano', 'Manggari barat', 'Sales omon kahar', 2007, NULL, '2023-07-05 08:22:53', '2023-07-05 08:22:53'),
(11, 'Rahong utara', 'Manggarai tengah', 'Tarsius letam', 2022, NULL, '2023-07-05 08:23:38', '2023-07-05 08:23:38'),
(12, 'kota komba', 'Manggari timur', 'Surya saputra', 2018, NULL, '2023-07-05 08:24:24', '2023-07-05 08:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `team_groups`
--

CREATE TABLE `team_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_groups`
--

INSERT INTO `team_groups` (`id`, `team_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 6, 1, NULL, NULL),
(3, 7, 1, NULL, NULL),
(4, 8, 1, NULL, NULL),
(5, 9, 2, NULL, NULL),
(6, 10, 2, NULL, NULL),
(7, 11, 2, NULL, NULL),
(8, 12, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finals`
--
ALTER TABLE `finals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finals_match_id_foreign` (`match_id`),
  ADD KEY `finals_team1_id_foreign` (`team1_id`),
  ADD KEY `finals_team2_id_foreign` (`team2_id`),
  ADD KEY `finals_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goals_match_id_foreign` (`match_id`),
  ADD KEY `goals_player_id_foreign` (`player_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_home_team_id_foreign` (`home_team_id`),
  ADD KEY `matches_away_team_id_foreign` (`away_team_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_team`
--
ALTER TABLE `player_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_team_player_id_foreign` (`player_id`),
  ADD KEY `player_team_team_id_foreign` (`team_id`);

--
-- Indexes for table `quarter_finals`
--
ALTER TABLE `quarter_finals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quarter_finals_match_id_foreign` (`match_id`),
  ADD KEY `quarter_finals_team1_id_foreign` (`team1_id`),
  ADD KEY `quarter_finals_team2_id_foreign` (`team2_id`),
  ADD KEY `quarter_finals_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `round_of_16`
--
ALTER TABLE `round_of_16`
  ADD PRIMARY KEY (`id`),
  ADD KEY `round_of_16_match_id_foreign` (`match_id`),
  ADD KEY `round_of_16_team1_id_foreign` (`team1_id`),
  ADD KEY `round_of_16_team2_id_foreign` (`team2_id`),
  ADD KEY `round_of_16_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `semi_finals`
--
ALTER TABLE `semi_finals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semi_finals_match_id_foreign` (`match_id`),
  ADD KEY `semi_finals_team1_id_foreign` (`team1_id`),
  ADD KEY `semi_finals_team2_id_foreign` (`team2_id`),
  ADD KEY `semi_finals_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standings_group_id_foreign` (`group_id`),
  ADD KEY `standings_team_id_foreign` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_groups`
--
ALTER TABLE `team_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_groups_team_id_foreign` (`team_id`),
  ADD KEY `team_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finals`
--
ALTER TABLE `finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_team`
--
ALTER TABLE `player_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quarter_finals`
--
ALTER TABLE `quarter_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `round_of_16`
--
ALTER TABLE `round_of_16`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semi_finals`
--
ALTER TABLE `semi_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standings`
--
ALTER TABLE `standings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `team_groups`
--
ALTER TABLE `team_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finals`
--
ALTER TABLE `finals`
  ADD CONSTRAINT `finals_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `finals_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `finals_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `finals_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`),
  ADD CONSTRAINT `goals_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_team_id_foreign` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matches_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `player_team`
--
ALTER TABLE `player_team`
  ADD CONSTRAINT `player_team_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `player_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quarter_finals`
--
ALTER TABLE `quarter_finals`
  ADD CONSTRAINT `quarter_finals_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quarter_finals_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quarter_finals_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quarter_finals_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `round_of_16`
--
ALTER TABLE `round_of_16`
  ADD CONSTRAINT `round_of_16_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `round_of_16_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `round_of_16_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `round_of_16_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `semi_finals`
--
ALTER TABLE `semi_finals`
  ADD CONSTRAINT `semi_finals_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semi_finals_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semi_finals_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semi_finals_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `standings`
--
ALTER TABLE `standings`
  ADD CONSTRAINT `standings_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `standings_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `team_groups`
--
ALTER TABLE `team_groups`
  ADD CONSTRAINT `team_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_groups_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
