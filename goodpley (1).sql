-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 03.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

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
-- Struktur dari tabel `advertise`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `advertise`
--

INSERT INTO `advertise` (`id`, `nama_advertise`, `lebar`, `panjang`, `id_lantai`, `jenis`, `harga`, `gambar`, `updated_at`, `created_at`, `status`) VALUES
(3, 'ESKALATOR NAIK', 2, 2, 1, 'Eskalator', '100000', '202106112227uZSIyJj7.PNG', '2021-06-14 13:39:07', '2021-06-09 04:22:27', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'outdoor', '2021-05-26 21:02:05', '2021-05-26 21:02:05'),
(2, 'indoor outlet', '2021-05-26 21:02:13', '2021-06-15 09:57:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `rincian_masalah` text NOT NULL,
  `id_outsourcing` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `rincian_balasan` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id`, `jenis`, `rincian_masalah`, `id_outsourcing`, `id_users`, `rincian_balasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'corong udara', 'assap di tenant babeq tidak tersedotaa', 5, 3, 'akan dilakukan perbaikan nnti sore', 1, '2021-06-15 10:39:21', '2021-06-15 15:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lantai`
--

CREATE TABLE `lantai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lantai`
--

INSERT INTO `lantai` (`id`, `nama_lantai`, `created_at`, `updated_at`) VALUES
(1, 'lantai 1', '2021-05-26 21:02:24', '2021-05-26 21:02:24'),
(2, 'lantai 2', '2021-05-26 21:02:30', '2021-05-26 21:02:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_06_03_212141_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewas`
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
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewas`
--

INSERT INTO `penyewas` (`id`, `id_users`, `nama_pemilik`, `alamat_pemilik`, `hp`, `ktp`, `nama_usaha`, `alamat_usaha`, `no_siup`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 'usaha a', 'HA', '12', '1216575765876589', '111', 'Y87', '9878', '2021-06-09 15:12:54', '2021-06-15 15:19:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8TtbRAA1uDgXbiQOz0go3p7liRxzJVe6eq7sjRPM', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQXo0Z0V4Mzg1MjlhZ0J3RlZrRm9sdHFhRkk1QVVPSGJhUzRMVERRMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWdpaGFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDU3THpwVXRYLnFLcGFKTE1JTTVVUS41dmo1blE2THhFTlhRaXdvRmZqTGFhcnM5SS5jRmNXIjt9', 1623805283),
('AiSa6UQqLIJ0YzQWBlV5cFTvk5i2qcjLf76M11e4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUtHQUNxMzE2THZIN3NwTmtrWjR1bEFKU2hyeWJEaEp6bFJMUkVDUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWdpaGFuL2NyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRKUTNuWG9iYzI0OFBsUEViYVFVejRPeWNRdmkyN0hkZ3JIS1duUW10UlNVa2k5V1lwOE9BdSI7fQ==', 1623800472),
('P8g1LU8BKE0KVboCa1dGwbjhc3DT8oLYtEyPTZTv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia1Mxa2xvNEZFSGVSSGc3dmpWdWNxTUgyV1pwU2JBa1g1VEh3RmZyZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWdpaGFuLzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRKUTNuWG9iYzI0OFBsUEViYVFVejRPeWNRdmkyN0hkZ3JIS1duUW10UlNVa2k5V1lwOE9BdSI7fQ==', 1623800437);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewas`
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
-- Dumping data untuk tabel `sewas`
--

INSERT INTO `sewas` (`id`, `tgl_sewa`, `id_penyewa`, `id_tennant`, `biaya`, `tgl_awal_sewa`, `tgl_akhir_sewa`, `created_at`, `updated_at`, `status`) VALUES
(1, '2021-06-01', 1, 1, '35000', '2021-02-01', '2021-11-30', '2021-06-15 00:10:52', '2021-06-15 15:19:47', 1),
(2, '2021-06-01', 1, 1, '35000', '2021-02-01', '2021-11-30', '2021-06-15 00:11:28', '2021-06-15 00:11:28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_advertise`
--

CREATE TABLE `sewa_advertise` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_advertise` int(11) NOT NULL,
  `tgl_mulai_sewa` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_advertise`
--

INSERT INTO `sewa_advertise` (`id`, `id_sewa`, `id_advertise`, `tgl_mulai_sewa`, `lama_sewa`, `id_users`, `created_at`, `updated_at`, `status`) VALUES
(5, 3, 3, '2021-06-15', 6, 0, '2021-06-14 13:39:07', '2021-06-14 13:39:07', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihans`
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

--
-- Dumping data untuk tabel `tagihans`
--

INSERT INTO `tagihans` (`id`, `id_sewa`, `jenis_tagihan`, `tgl_tagihan`, `deskripsi`, `nominal`, `bukti_tagihan`, `bukti_pembayaran`, `tgl_pembayaran`, `id_users`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'PLN', '2021-06-17', 'wokwokwokwok', '21', '202106235609gYIli25w.png', '202106010044O4cXZFNL.jpg', '2021-06-16', 1, 1, '2021-06-15', '2021-06-16'),
(4, 1, 'PDAM', '2021-06-19', 'wokwokwokowkwo', '43', '202106002334xOmN25mg.png', '202106002334fHVMSfO6.png', '2021-06-16', 1, 1, '2021-06-16', '2021-06-16'),
(5, 1, 'PLN', '2021-06-15', 'kwkwk', '12000', '202106004809TxrasAZw.png', NULL, NULL, 6, 0, '2021-06-16', '2021-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tennants`
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
-- Dumping data untuk tabel `tennants`
--

INSERT INTO `tennants` (`id`, `nama_tennant`, `id_lantai`, `id_kategori`, `lebar`, `panjang`, `gambar`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tennatn a', 2, 2, 1, 1, '202106033621qH5hJcHj.jpg', '35000', 0, '2021-05-26 21:02:51', '2021-06-15 15:19:47'),
(2, 'tennatn b', 1, 1, 5, 4, '202106033644h7vlPXsh.png', '50000', 1, '2021-05-26 21:05:31', '2021-06-14 13:26:26'),
(3, 'J KITCHEN A', 2, 1, 2, 3, '2021060336553rYxGuDx.jpg', '20000', 1, '2021-05-31 00:56:38', '2021-06-02 19:33:55'),
(4, 'aa', 1, 1, 1, 1, '202105081918fKx9u4m8.jpg', '1', 1, '2021-05-31 01:19:18', '2021-06-02 19:34:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `level`, `created_at`, `updated_at`) VALUES
(1, 'adm', 'admin@demo.com', NULL, '$2y$10$JQ3nXobc248PlPEbaQUz4OycQvi27HdgrHKWnQmtRSUki9WYp8OAu', NULL, NULL, 'edFIQhmNpB1Lh8PXE50ahKM1yHQpbBkO3VU4KUdpMwVeYxanXNxaVulxeuSX', NULL, NULL, 1, '2021-06-03 15:01:27', '2021-06-08 05:31:51'),
(3, 'haidar', 'haidar@gmail.com', NULL, '$2y$10$57LzpUtX.qKpaJLMIM5UQ.5vj5nQ6LxENXQiwoFfjLaars9I.cFcW', NULL, NULL, NULL, NULL, NULL, 2, '2021-06-08 07:29:49', '2021-06-08 07:33:02'),
(4, 'marketing@gmail.com', 'marketing@gmail.com', NULL, '$2y$10$CKF.R81r.8iFypGBVqAqz.AY3q8Wzf9illabOTZHKW90Ckk8CJFfa', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
(5, 'outsourcing@gmail.com', 'outsourcing@gmail.com', NULL, '$2y$10$y2DS6WuqCFkECpurtrzsKu9u2loY8Fxi1mBzkUiemWr8.1fQ90fXa', NULL, NULL, NULL, NULL, NULL, 5, NULL, '2021-06-15 09:53:47'),
(6, 'administrasi@gmail.com', 'administrasi@gmail.com', NULL, '$2y$10$tTPQQYkIicVr2hMiVHnJeeqGV42YiocqUOb486IAOlZ5iEKbGB9b.', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penyewas`
--
ALTER TABLE `penyewas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sewas`
--
ALTER TABLE `sewas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sewa_advertise`
--
ALTER TABLE `sewa_advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tennants`
--
ALTER TABLE `tennants`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyewas`
--
ALTER TABLE `penyewas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sewas`
--
ALTER TABLE `sewas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sewa_advertise`
--
ALTER TABLE `sewa_advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tennants`
--
ALTER TABLE `tennants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
