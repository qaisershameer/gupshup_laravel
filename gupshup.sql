-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 07:01 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acId` bigint(20) UNSIGNED NOT NULL,
  `acTitle` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `openingBal` double NOT NULL DEFAULT 0,
  `CurrentBal` double NOT NULL DEFAULT 0,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `currencyId` bigint(20) UNSIGNED NOT NULL,
  `accTypeId` bigint(20) UNSIGNED NOT NULL,
  `parentId` bigint(20) UNSIGNED NOT NULL,
  `areaId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acId`, `acTitle`, `email`, `mobile`, `openingBal`, `CurrentBal`, `uId`, `currencyId`, `accTypeId`, `parentId`, `areaId`, `created_at`, `updated_at`) VALUES
(1, 'Mustafa', NULL, NULL, 0, 0, 1, 1, 1, 1, 1, '2024-11-12 01:42:38', '2024-11-12 01:42:38'),
(2, 'Burhan', NULL, NULL, 0, 0, 1, 2, 3, 3, 3, '2024-11-14 01:45:21', '2024-11-14 01:45:21'),
(3, 'Farhand', NULL, NULL, 0, 0, 1, 4, 2, 2, 4, '2024-11-14 01:45:41', '2024-11-14 01:45:41'),
(4, 'Muzamil', NULL, NULL, 0, 0, 1, 4, 3, 3, 2, '2024-11-14 01:46:09', '2024-11-14 01:46:09'),
(5, 'Raees', NULL, NULL, 0, 0, 1, 3, 5, 5, 5, '2024-11-14 01:46:30', '2024-11-14 01:46:30'),
(6, 'Qaiser', NULL, NULL, 0, 0, 1, 3, 4, 4, 1, '2024-11-14 01:47:00', '2024-11-14 01:47:00'),
(7, 'Salaman BUTT', 'salamanbutt@gmail.com', '+923346013608', 0, 0, 1, 2, 9, 1, 6, '2024-11-16 02:34:37', '2024-11-16 02:34:37'),
(8, 'Noor SB', 'noorsb@gmail.com', '+923346013608', 0, 0, 1, 1, 1, 1, 3, '2024-11-16 02:37:52', '2024-11-16 02:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `accparent`
--

CREATE TABLE `accparent` (
  `parentId` bigint(20) UNSIGNED NOT NULL,
  `accParentTitle` varchar(255) NOT NULL,
  `accTypeId` bigint(20) UNSIGNED NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accparent`
--

INSERT INTO `accparent` (`parentId`, `accParentTitle`, `accTypeId`, `uId`, `created_at`, `updated_at`) VALUES
(1, 'CASH & BANKS', 1, 1, '2024-11-12 01:42:07', '2024-11-14 01:42:46'),
(2, 'PARTIES', 2, 1, '2024-11-14 01:42:53', '2024-11-14 01:42:53'),
(3, 'VENDORS', 3, 1, '2024-11-14 01:43:01', '2024-11-14 01:43:01'),
(4, 'CAPITAL & DRAWINGS', 4, 1, '2024-11-14 01:43:16', '2024-11-14 01:43:16'),
(5, 'SALES & CGS', 5, 1, '2024-11-14 01:43:41', '2024-11-14 01:43:41'),
(6, 'ADMIN EXPENSES', 6, 1, '2024-11-14 01:43:50', '2024-11-14 01:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `acctype`
--

CREATE TABLE `acctype` (
  `accTypeId` bigint(20) UNSIGNED NOT NULL,
  `accTypeTitle` varchar(255) NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acctype`
--

INSERT INTO `acctype` (`accTypeId`, `accTypeTitle`, `uId`, `created_at`, `updated_at`) VALUES
(1, 'BANK', 1, '2024-11-12 01:41:45', '2024-11-16 01:47:09'),
(2, 'CUSTOMER', 1, '2024-11-14 01:41:26', '2024-11-14 01:41:31'),
(3, 'SUPPLIER', 1, '2024-11-14 01:41:38', '2024-11-14 01:41:38'),
(4, 'CAPITAL', 1, '2024-11-14 01:42:10', '2024-11-14 01:42:10'),
(5, 'REVENUE', 1, '2024-11-14 01:42:16', '2024-11-14 01:42:16'),
(6, 'EXPENSE', 1, '2024-11-14 01:42:19', '2024-11-14 01:42:19'),
(9, 'Admin Expense', 1, '2024-11-16 02:09:12', '2024-11-16 02:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaId` bigint(20) UNSIGNED NOT NULL,
  `areaTitle` varchar(255) NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaId`, `areaTitle`, `uId`, `created_at`, `updated_at`) VALUES
(1, 'MULTAN', 1, '2024-11-12 01:41:13', '2024-11-12 01:41:13'),
(2, 'LAHORE', 1, '2024-11-14 01:44:38', '2024-11-14 01:44:38'),
(3, 'ISLAMABAD', 1, '2024-11-14 01:44:43', '2024-11-14 01:44:43'),
(4, 'KARACHI', 1, '2024-11-14 01:44:47', '2024-11-14 01:44:47'),
(5, 'RAWALPINDI 2', 1, '2024-11-14 01:44:53', '2024-11-16 02:16:21'),
(6, 'RAWALPINDI', 1, '2024-11-16 02:16:33', '2024-11-16 02:16:33');

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
  `note` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1731567339),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1731567339;', 1731567339),
('e10fd735ad88f21f45ee9e47870c152d', 'i:1;', 1731479321),
('e10fd735ad88f21f45ee9e47870c152d:timer', 'i:1731479321;', 1731479321);

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

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currencyId` bigint(20) UNSIGNED NOT NULL,
  `currencyTitle` varchar(255) NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currencyId`, `currencyTitle`, `uId`, `created_at`, `updated_at`) VALUES
(1, 'PKR', 1, '2024-11-12 01:40:44', '2024-11-12 01:40:44'),
(2, 'SAR', 1, '2024-11-14 01:40:55', '2024-11-14 01:40:55'),
(3, 'USD', 1, '2024-11-14 01:40:58', '2024-11-14 01:40:58'),
(4, 'UAE', 1, '2024-11-14 01:41:02', '2024-11-14 01:41:02');

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
(4, '2024_09_24_070807_create_personal_access_tokens_table', 1),
(5, '2024_09_26_064606_create_currency_table', 1),
(6, '2024_09_26_064623_create_area_table', 1),
(7, '2024_09_26_064655_create_accType_table', 1),
(8, '2024_09_26_064659_create_accParent_table', 1),
(9, '2024_09_26_064710_create_accounts_table', 1),
(10, '2024_09_26_064726_create_vouchers_table', 1),
(11, '2024_10_09_160153_add_two_factor_columns_to_users_table', 1),
(12, '2024_10_10_153823_create_food_table', 1),
(13, '2024_10_16_171949_create_carts_table', 1),
(14, '2024_10_16_181215_add_userid_field_to_carts', 1),
(15, '2024_10_18_154219_create_orders_table', 1),
(16, '2024_10_25_031747_create_books_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 2, 'API Token', '8c6cdda9f1ed34009a3dfd9ba3ef28ab4db024d3adfbeda57391b231f42cb0c6', '[\"*\"]', NULL, NULL, '2024-11-16 01:42:49', '2024-11-16 01:42:49'),
(3, 'App\\Models\\User', 1, 'API Token', '7866cf43595e973978eb7c49a0cd64dbf94004dadba25b3a31c1891bea6a34f8', '[\"*\"]', '2024-11-16 04:04:44', NULL, '2024-11-16 01:43:29', '2024-11-16 04:04:44');

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
(1, 'admin', 'admin@gmail.com', 'admin', '+923346013608', 'Moza Wan Chattah', NULL, '$2y$12$7W1r0rwebfloKOYJvtzZdObM9EdhF96wMRhzmL1Ra.L7m9UQHMUq2', NULL, NULL, NULL, 'MbzSEHEfgv8VjH1O1B1GI8DRXXLbSG066ogTsU60V75oq12D3U3lMBfj7OOt', NULL, NULL, '2024-11-12 01:40:13', '2024-11-12 01:40:13'),
(2, 'user1', 'user1@gmail.com', 'user', '+923346013608', 'Moza Wan Chattah', NULL, '$2y$12$lIdweM8XLVfIlY3106WoZ.p8cXPLhiLRTCPxA8a1n36x04/WBt1pK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-13 01:26:33', '2024-11-13 01:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucherId` bigint(20) UNSIGNED NOT NULL,
  `voucherDate` date NOT NULL,
  `voucherPrefix` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `drAcId` bigint(20) UNSIGNED DEFAULT NULL,
  `crAcId` bigint(20) UNSIGNED DEFAULT NULL,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `debitSR` double NOT NULL DEFAULT 0,
  `creditSR` double NOT NULL DEFAULT 0,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucherId`, `voucherDate`, `voucherPrefix`, `remarks`, `drAcId`, `crAcId`, `debit`, `credit`, `debitSR`, `creditSR`, `uId`, `created_at`, `updated_at`) VALUES
(1, '2024-11-14', 'CR', 'Cash Received.', NULL, 6, 0, 1000, 0, 100, 1, '2024-11-12 01:43:32', '2024-11-14 01:55:18'),
(2, '2024-11-14', 'CR', 'Cash Received.', NULL, 4, 0, 2000, 0, 200, 1, '2024-11-12 01:45:26', '2024-11-14 02:00:22'),
(3, '2024-11-14', 'CP', 'Cash Paid.', 3, NULL, 300, 0, 30, 0, 1, '2024-11-12 01:48:38', '2024-11-14 02:02:09'),
(4, '2024-11-14', 'CP', 'Cash Paid.', 2, NULL, 200, 0, 20, 0, 1, '2024-11-14 02:00:47', '2024-11-14 02:00:47'),
(5, '2024-11-14', 'JV', 'Amount Transfered.', 5, 6, 400, 400, 40, 40, 1, '2024-11-14 02:01:43', '2024-11-14 02:01:43'),
(6, '2024-11-14', 'CP', 'Cash Paid.', 1, NULL, 400, 0, 40, 0, 1, '2024-11-14 02:05:36', '2024-11-14 02:05:51'),
(7, '2024-11-14', 'CR', 'Cash Received.', NULL, 1, 0, 100, 0, 10, 1, '2024-11-14 02:07:14', '2024-11-14 02:07:14'),
(8, '2024-11-14', 'JV', 'Amount Transfered.', 2, 1, 200, 200, 20, 20, 1, '2024-11-14 02:07:55', '2024-11-14 02:07:55'),
(9, '2024-11-14', 'JV', 'Amount Transfered.', 1, 5, 600, 600, 60, 60, 1, '2024-11-14 02:08:14', '2024-11-14 02:08:14'),
(10, '2024-11-16', 'CR', 'Cash Received.', NULL, 1, 0, 50, 0, 5, 1, '2024-11-16 01:48:06', '2024-11-16 01:48:06'),
(11, '2024-11-16', 'CP', 'Cash Paid.', 6, NULL, 40, 0, 4, 0, 1, '2024-11-16 01:54:53', '2024-11-16 01:54:53'),
(12, '2024-11-16', 'JV', 'Amount Transferred.', 2, 3, 50, 50, 5, 5, 1, '2024-11-16 02:03:35', '2024-11-16 02:03:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acId`),
  ADD KEY `accounts_uid_foreign` (`uId`),
  ADD KEY `accounts_currencyid_foreign` (`currencyId`),
  ADD KEY `accounts_acctypeid_foreign` (`accTypeId`),
  ADD KEY `accounts_parentid_foreign` (`parentId`),
  ADD KEY `accounts_areaid_foreign` (`areaId`);

--
-- Indexes for table `accparent`
--
ALTER TABLE `accparent`
  ADD PRIMARY KEY (`parentId`),
  ADD KEY `accparent_acctypeid_foreign` (`accTypeId`),
  ADD KEY `accparent_uid_foreign` (`uId`);

--
-- Indexes for table `acctype`
--
ALTER TABLE `acctype`
  ADD PRIMARY KEY (`accTypeId`),
  ADD KEY `acctype_uid_foreign` (`uId`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaId`),
  ADD KEY `area_uid_foreign` (`uId`);

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
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyId`),
  ADD KEY `currency_uid_foreign` (`uId`);

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
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucherId`),
  ADD KEY `vouchers_dracid_foreign` (`drAcId`),
  ADD KEY `vouchers_cracid_foreign` (`crAcId`),
  ADD KEY `vouchers_uid_foreign` (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `accparent`
--
ALTER TABLE `accparent`
  MODIFY `parentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `acctype`
--
ALTER TABLE `acctype`
  MODIFY `accTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `areaId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucherId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_acctypeid_foreign` FOREIGN KEY (`accTypeId`) REFERENCES `acctype` (`accTypeId`),
  ADD CONSTRAINT `accounts_areaid_foreign` FOREIGN KEY (`areaId`) REFERENCES `area` (`areaId`),
  ADD CONSTRAINT `accounts_currencyid_foreign` FOREIGN KEY (`currencyId`) REFERENCES `currency` (`currencyId`),
  ADD CONSTRAINT `accounts_parentid_foreign` FOREIGN KEY (`parentId`) REFERENCES `accparent` (`parentId`),
  ADD CONSTRAINT `accounts_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Constraints for table `accparent`
--
ALTER TABLE `accparent`
  ADD CONSTRAINT `accparent_acctypeid_foreign` FOREIGN KEY (`accTypeId`) REFERENCES `acctype` (`accTypeId`),
  ADD CONSTRAINT `accparent_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Constraints for table `acctype`
--
ALTER TABLE `acctype`
  ADD CONSTRAINT `acctype_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Constraints for table `currency`
--
ALTER TABLE `currency`
  ADD CONSTRAINT `currency_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_cracid_foreign` FOREIGN KEY (`crAcId`) REFERENCES `accounts` (`acId`),
  ADD CONSTRAINT `vouchers_dracid_foreign` FOREIGN KEY (`drAcId`) REFERENCES `accounts` (`acId`),
  ADD CONSTRAINT `vouchers_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
