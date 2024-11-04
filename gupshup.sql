-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 07:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gupshup`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `guest` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `phone`, `guest`, `time`, `date`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, '+923136336807', '4', '06:30', '2024-10-25', '1.5kg Fish, 4 Tika Boti, 4 Malai Boti, ready @6.25pm sharp.', 'Confirmed', '2024-10-24 22:46:02', '2024-10-24 23:38:51'),
(2, '+923346013608', '6', '18:00', '2024-10-26', '2.5kg Fish, 6 Tika Boti, 6 Malai Boti, ready @6.20pm sharp.', 'Cancelled', '2024-10-24 22:46:34', '2024-10-24 23:38:56'),
(3, '+923015413121', '2', '07:00', '2024-10-27', '1kg Fish, 2 Tika Boti, 2 Malai Boti, ready @6.10pm sharp.', 'Pendig', '2024-10-24 22:47:35', '2024-10-24 23:38:59'),
(4, '+923477072247', '10', '18:00', '2024-10-28', '4kg Fish, 10 Tika Boti, 10 Malai Boti, ready @6.19pm sharp.', 'Confirmed', '2024-10-24 22:48:06', '2024-10-24 23:39:01'),
(5, '+923015413121', '4', '18:00', '2024-10-25', '2kg Fish, 4 Tika Boti, 4 Malai Boti, ready @6.15pm sharp.', 'Pending', '2024-10-24 23:27:52', '2024-10-24 23:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1730743462),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1730743462;', 1730743462),
('e10fd735ad88f21f45ee9e47870c152d', 'i:1;', 1729831388),
('e10fd735ad88f21f45ee9e47870c152d:timer', 'i:1729831388;', 1729831388);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `userid` varchar(255) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `title`, `detail`, `image`, `price`, `userid`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Vivo Y02t', 'Mobile Snatched From Sabzi Mandi After Maghrib @6.30 pm.\r\nOriginal Invoice Price was 34000.\r\nWhile Police mentioned 24000 on FIR Report.', '1728803799.jpeg', 48000, '1', 2, '2024-10-16 13:04:35', '2024-10-16 13:04:35'),
(2, 'BOP Yazman', 'Bank of Punjab Yazman Traders (Private) Limited.', '1728797519.jpg', 3600, '2', 3, '2024-10-16 13:05:47', '2024-10-16 13:05:47'),
(4, 'BOP Yazman', 'Bank of Punjab Yazman Traders (Private) Limited.', '1728797519.jpg', 2400, '1', 2, '2024-10-16 13:07:38', '2024-10-16 13:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `detail`, `price`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Vivo Y02t', 'Mobile Snatched From Sabzi Mandi After Maghrib @6.30 pm.\r\nOriginal Invoice Price was 34000.\r\nWhile Police mentioned 24000 on FIR Report.', 250, '1728803799.jpeg', '2024-10-12 22:36:10', '2024-10-13 02:16:39'),
(6, 'BOP Yazman', 'Bank of Punjab Yazman Traders (Private) Limited.', 1200, '1728797519.jpg', '2024-10-13 00:31:59', '2024-10-13 02:17:28'),
(7, 'Ch. Asim Avg.', 'Ch. Asim Avg. Lead To Nabeel Khan.', 1500, '1728804004.jpg', '2024-10-13 02:20:04', '2024-10-13 02:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_09_160153_add_two_factor_columns_to_users_table', 1),
(5, '2024_10_09_160441_create_personal_access_tokens_table', 1),
(6, '2024_10_10_153823_create_food_table', 2),
(7, '2024_10_16_171949_create_carts_table', 3),
(8, '2024_10_16_181215_add_userid_field_to_carts', 4),
(9, '2024_10_18_154219_create_orders_table', 5),
(10, '2024_10_25_031747_create_books_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'In Progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `title`, `qty`, `price`, `image`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@gmail.com', 'Multan Punjab Pakistan', '+923477072247', 'Vivo Y02t', '2', '500', '1728803799.jpeg', 'On the Way', '2024-10-19 07:17:09', '2024-10-19 08:18:29'),
(2, 'user1', 'user1@gmail.com', 'Multan Punjab Pakistan', '+923477072247', 'BOP Yazman', '3', '3600', '1728797519.jpg', 'Delivered', '2024-10-19 07:17:09', '2024-10-19 08:19:49'),
(3, 'user1', 'user1@gmail.com', 'Multan Punjab Pakistan', '+923477072247', 'Ch. Asim Avg.', '5', '7500', '1728804004.jpg', 'Cancelled', '2024-10-19 07:17:09', '2024-10-19 08:21:56'),
(4, 'Qaiser Shameer', 'qrdevteam@gmail.com', 'Moza Wan Chattah', '+923136336807', 'Vivo Y02t', '2', '500', '1728803799.jpeg', 'Delivered', '2024-10-19 07:23:27', '2024-10-19 08:19:54'),
(5, 'Qaiser Shameer', 'qrdevteam@gmail.com', 'Moza Wan Chattah', '+923136336807', 'BOP Yazman', '4', '4800', '1728797519.jpg', 'Delivered', '2024-10-19 07:23:27', '2024-10-19 08:19:55'),
(6, 'Qaiser Shameer', 'qrdevteam@gmail.com', 'Moza Wan Chattah', '+923136336807', 'Ch. Asim Avg.', '6', '9000', '1728804004.jpg', 'On the Way', '2024-10-19 07:23:27', '2024-10-19 08:19:56'),
(7, 'Qaiser Shameer', 'qrdevteam@gmai.com', 'Multan Punjab Pakistan', '+923477072247', 'Vivo Y02t', '2', '500', '1728803799.jpeg', 'In Progress', '2024-10-24 23:40:43', '2024-10-24 23:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wHxigCnfqMSFAgi6YyaOdkHb5dZIC123eIlbsKqY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzBvTDJPSzRqdWp0RXcxNDA1ZnhzaFp1ZlY3WUV5TlA3QjJZU3hyayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1730743552);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'sadmin', 'admin@gmail.com', 'admin', '+923346013608', 'Multan Punjab Pakistan', NULL, '$2y$12$jhYBiKeCVKRN5xor3KGIE.sDNUpcD.46VHTnLwkhlDmrvsefSINwW', NULL, NULL, NULL, '4ihQEIBtBR2SfSUWokOj8q7BLtV28GcxHr2jevgqMm682vbwV4kFkNMd4s2J', NULL, NULL, '2024-10-09 11:23:17', '2024-10-09 11:23:17'),
(2, 'admin', 'user1@gmail.com', 'user', '+923136336807', 'Moza Wan Chattah', NULL, '$2y$12$oo9B3dcgbyiLmcucNjIqP.gWyzq/E6UzhpWws/ruzoKz1VnqcpDk.', NULL, NULL, NULL, 'lkmTknkEJKcpBqHIEEoqsOdaC5Kz8T9aRVnQRYDYrKAGb1ZtHq5QabiZVUKB', NULL, NULL, '2024-10-09 11:29:44', '2024-10-09 11:29:44'),
(3, 'user1', 'user2@gmail.com', 'user', '+923477072247', 'Multan Punjab Pakistan', NULL, '$2y$12$jhYBiKeCVKRN5xor3KGIE.sDNUpcD.46VHTnLwkhlDmrvsefSINwW', NULL, NULL, NULL, 'hdcmqncSdRcHFpVSncHnsK6q9Bzkhdqs5SBwhlYsPgo1zDbrUmv0ZiXRa9qO', NULL, NULL, '2024-10-09 11:23:17', '2024-10-09 11:23:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
