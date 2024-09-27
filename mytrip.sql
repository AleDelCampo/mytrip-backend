-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2024 at 11:13 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytryp`
--

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `trip_id`, `date`, `created_at`, `updated_at`) VALUES
(27, 32, '2024-08-28', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(28, 32, '2024-08-29', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(29, 33, '2024-09-01', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(30, 33, '2024-09-02', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(31, 34, '2024-10-03', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(32, 34, '2024-10-04', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(33, 35, '2025-01-05', '2024-08-22 14:20:35', '2024-08-22 14:20:35'),
(35, 36, '2025-03-28', '2024-08-30 13:21:29', '2024-08-30 13:21:29'),
(37, 54, '2023-08-14', '2024-08-30 14:25:50', '2024-08-30 14:25:50');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2024_08_14_141900_create_trips_table', 1),
(16, '2024_08_14_141909_create_days_table', 2),
(17, '2024_08_14_141904_create_stops_table', 3),
(18, '2024_08_14_141906_create_notes_table', 4),
(19, '2024_08_14_141921_create_ratings_table', 4),
(20, '2024_08_14_141934_create_images_table', 4),
(21, '2024_08_20_141820_add_image_to_trips_table', 5),
(22, '2024_08_20_155217_add_latitude_longitude_to_stops_table', 6),
(23, '2024_08_23_131213_create_ratings_table', 7),
(24, '2024_08_24_134843_modify_stops_table', 7),
(25, '2024_08_25_142733_add_user_id_to_trips_table', 8),
(26, '2024_08_25_153936_add_user_id_to_trips_table', 9),
(27, '2024_08_26_143438_add_food_and_curiosity_to_stops_table', 10),
(28, '2024_08_26_154355_create_foods_table', 11),
(29, '2024_08_26_154402_create_curiosities_table', 11),
(30, '2024_08_26_161043_create_foods_table', 12),
(31, '2024_08_26_161114_create_curiosities_table', 12),
(32, '2024_08_26_162348_create_foods_table', 13),
(33, '2024_08_26_162358_create_curiosities_table', 13),
(34, '2024_08_26_171137_create_curiosities_table', 14),
(35, '2024_08_26_171144_create_foods_table', 14),
(36, '2024_08_29_143709_create_foods_table', 15),
(37, '2024_08_29_153734_create_foods_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `stop_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 18, 2, '2024-08-24 11:28:51', '2024-08-24 11:45:05'),
(2, 19, 5, '2024-08-24 11:28:56', '2024-08-24 11:29:31'),
(3, 20, 5, '2024-08-24 11:35:13', '2024-08-24 11:37:53'),
(4, 21, 3, '2024-08-24 11:37:58', '2024-08-24 11:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(8,2) NOT NULL,
  `longitude` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`id`, `day_id`, `location`, `latitude`, `longitude`, `created_at`, `updated_at`, `rating`) VALUES
(18, 27, 'Atene', 37.98, 23.73, '2024-08-22 14:20:35', '2024-08-30 14:43:24', 4),
(19, 28, 'Plaka', 37.96, 24.00, '2024-08-22 14:20:35', '2024-08-24 13:09:44', 5),
(20, 29, 'Roma', 41.90, 12.50, '2024-08-22 14:20:35', '2024-09-02 08:23:42', 5),
(21, 30, 'Firenze', 43.77, 11.26, '2024-08-22 14:20:35', '2024-08-30 19:07:04', 3),
(22, 31, 'Città del Guatemala', 14.63, -90.51, '2024-08-22 14:20:35', '2024-08-24 11:57:50', 2),
(23, 32, 'Antigua', 14.55, -90.73, '2024-08-22 14:20:35', '2024-08-24 11:57:51', 4),
(24, 33, 'Marrakech', 31.63, -7.98, '2024-08-22 14:20:35', '2024-08-24 11:57:56', 5),
(26, 35, 'Tokyo', 35.69, 139.75, '2024-08-30 13:22:00', '2024-08-30 18:33:47', 5),
(28, 37, 'Stonehenge', 51.17, -1.83, '2024-08-30 14:27:09', '2024-08-30 14:29:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`, `image`) VALUES
(32, 1, 'Travel to Greece', 'A wonderful journey through Greece.', '2024-08-22 14:20:35', '2024-08-22 14:20:35', 'images/GgxYdx5yEiEpRvxgcDP3Me3usgyea4aqAV4f3xLC.jpg'),
(33, 1, 'Travel to Italy', 'Explore the wonders of Italy.', '2024-08-22 14:20:35', '2024-08-22 14:20:35', 'images/7R6QbJ3XXtkFjW9aE0Sj085b1lMkHJLHM3u90mzO.jpg'),
(34, 1, 'Travel to Mexico', 'Discover the natural and cultural beauty of Mexico.', '2024-08-22 14:20:35', '2024-08-22 14:20:35', 'images/PV8EqF8mw65lgiJlVI4ZJSKUOHXhXUFe6aJMBt6n.jpg'),
(35, 1, 'Travel to Africa', 'An adventure in the Sahara desert.', '2024-08-22 14:20:35', '2024-08-22 14:20:35', 'images/kBx4ydhBnmmkk6vUxbO5jr503jZYgdNRdhlCiQpS.jpg'),
(36, 1, 'Travel to Japan', 'Among wonders of the most spiritual countries.', '2024-08-30 12:59:38', '2024-08-30 12:59:38', 'images/Iq5gjPA9cHLBXnFHQs4DeEoXBOcFKwr0Q8Kr5ksp.jpg'),
(54, 1, 'Travel to England', 'Immersion between antiquity and the modern.', '2024-08-30 14:25:29', '2024-08-30 14:25:29', 'images/PNClUMm0o5vlV7XjAaEYA76hsT9AYdXLduWN1vHf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ale', 'ale@ale.it', NULL, '$2y$12$XdXmJybbdztENZSGnckBn.IxaSDo9AXpDwBPj4do9J3SIUkkNED6a', NULL, '2024-08-14 14:45:30', '2024-08-14 14:45:30'),
(2, 'ciao', 'ciao@ciao.it', NULL, '$2y$12$eayhH9b3a5MuKiqXF9WBLuRuSjAj5oic2afjCbtcm66avstYEQUhu', NULL, '2024-08-25 13:20:22', '2024-08-25 13:20:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `days_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stops_day_id_foreign` (`day_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `days`
--
ALTER TABLE `days`
  ADD CONSTRAINT `days_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stops`
--
ALTER TABLE `stops`
  ADD CONSTRAINT `stops_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
