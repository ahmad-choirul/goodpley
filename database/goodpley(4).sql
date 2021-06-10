-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 02:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodpley`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` int(11) NOT NULL,
  `nama_advertise` varchar(100) NOT NULL,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `nama_advertise`, `lebar`, `panjang`, `id_lantai`, `jenis`, `harga`, `gambar`, `updated_at`, `created_at`) VALUES
(3, 'ESKALATOR NAIK', 2, 2, 1, 'Eskalator', '100000', '202106112227uZSIyJj7.PNG', '2021-06-09 04:22:27', '2021-06-09 04:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'outdoor', '2021-05-26 21:02:05', '2021-05-26 21:02:05'),
(2, 'indoor', '2021-05-26 21:02:13', '2021-05-30 21:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `nama_lantai`, `created_at`, `updated_at`) VALUES
(1, 'lantai 1', '2021-05-26 21:02:24', '2021-05-26 21:02:24'),
(2, 'lantai 2', '2021-05-26 21:02:30', '2021-05-26 21:02:30');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_06_03_212141_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewas`
--

CREATE TABLE `penyewas` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `alamat_usaha` varchar(100) NOT NULL,
  `no_siup` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewas`
--

INSERT INTO `penyewas` (`id`, `id_users`, `nama_pemilik`, `alamat_pemilik`, `hp`, `ktp`, `nama_usaha`, `alamat_usaha`, `no_siup`, `created_at`, `updated_at`) VALUES
(1, 3, 'usaha a', 'HA', '12', '1216575765876589', '111', 'Y87', '9878', '2021-06-09 15:12:54', '2021-06-09 22:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5ElNek6gMpgSdk6eeYv7tNdQ5lM8cjC3sInj3bmw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnRvZ2RpaWJ1dXk1aHp0OEVDYkVtTFAydWozWXlWY01Tb0hLbG5IRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1623281443);

-- --------------------------------------------------------

--
-- Table structure for table `sewas`
--

CREATE TABLE `sewas` (
  `id` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_tennant` int(11) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `tgl_awal_sewa` date NOT NULL,
  `tgl_akhir_sewa` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewas`
--

INSERT INTO `sewas` (`id`, `tgl_sewa`, `id_penyewa`, `id_tennant`, `biaya`, `tgl_awal_sewa`, `tgl_akhir_sewa`, `created_at`, `updated_at`, `status`) VALUES
(1, '2021-06-03', 1, 3, '100', '2021-06-15', '2021-07-31', '2021-06-29 18:10:16', '2021-06-08 18:33:22', 0),
(2, '2021-06-10', 3, 3, '10000', '2021-06-10', '2021-06-30', '2021-06-08 13:54:27', '2021-06-09 23:13:04', 0),
(3, '2021-06-17', 1, 2, '1000', '2021-06-10', '2021-06-18', '2021-06-09 04:43:58', '2021-06-09 04:43:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_advertise`
--

CREATE TABLE `sewa_advertise` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_advertise` int(11) NOT NULL,
  `tgl_mulai_sewa` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa_advertise`
--

INSERT INTO `sewa_advertise` (`id`, `id_sewa`, `id_advertise`, `tgl_mulai_sewa`, `lama_sewa`, `id_users`, `created_at`, `updated_at`) VALUES
(2, 2, 3, '2021-06-23', 222, 0, '2021-06-09 14:15:18', '2021-06-09 14:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `jenis_tagihan` varchar(100) DEFAULT NULL,
  `tgl_tagihan` date DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `nominal` varchar(100) DEFAULT NULL,
  `bukti_tagihan` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tennants`
--

CREATE TABLE `tennants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tennant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tennants`
--

INSERT INTO `tennants` (`id`, `nama_tennant`, `id_lantai`, `id_kategori`, `lebar`, `panjang`, `gambar`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tennatn a', 2, 2, 1, 1, '202106033621qH5hJcHj.jpg', '35000', 1, '2021-05-26 21:02:51', '2021-06-02 17:40:56'),
(2, 'tennatn b', 1, 1, 5, 4, '202106033644h7vlPXsh.png', '50000', 1, '2021-05-26 21:05:31', '2021-06-02 17:41:14'),
(3, 'J KITCHEN A', 2, 1, 2, 3, '2021060336553rYxGuDx.jpg', '20000', 1, '2021-05-31 00:56:38', '2021-06-02 19:33:55'),
(4, 'aa', 1, 1, 1, 1, '202105081918fKx9u4m8.jpg', '1', 1, '2021-05-31 01:19:18', '2021-06-02 19:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pemilik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_usaha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_usaha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_siup` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nama_pemilik`, `alamat_pemilik`, `hp`, `ktp`, `nama_usaha`, `alamat_usaha`, `no_siup`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `level`, `created_at`, `updated_at`) VALUES
(1, 'adm', 'admin@demo.com', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, '$2y$10$JQ3nXobc248PlPEbaQUz4OycQvi27HdgrHKWnQmtRSUki9WYp8OAu', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-03 15:01:27', '2021-06-08 05:31:51'),
(3, 'haidar', 'haidar@gmail.com', 'pemilik', 'Jember', '08211117771', '4555666677777777', 'test usaha', 'jember', 'id124', NULL, '$2y$10$57LzpUtX.qKpaJLMIM5UQ.5vj5nQ6LxENXQiwoFfjLaars9I.cFcW', NULL, NULL, NULL, NULL, NULL, 2, '2021-06-08 07:29:49', '2021-06-08 07:33:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penyewas`
--
ALTER TABLE `penyewas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sewas`
--
ALTER TABLE `sewas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa_advertise`
--
ALTER TABLE `sewa_advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tennants`
--
ALTER TABLE `tennants`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyewas`
--
ALTER TABLE `penyewas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sewas`
--
ALTER TABLE `sewas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sewa_advertise`
--
ALTER TABLE `sewa_advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tennants`
--
ALTER TABLE `tennants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
