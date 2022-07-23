-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Waktu pembuatan: 23 Jul 2022 pada 16.08
-- Versi server: 8.0.28
-- Versi PHP: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timbangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_18_020118_create_pekerja_table', 1),
(6, '2022_03_18_020137_create_kopi_table', 1),
(7, '2022_07_23_121425_add_column_status', 2),
(8, '2022_07_23_122057_add_column_status', 3),
(9, '2022_07_23_142217_delete_column_nik', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kopi`
--

CREATE TABLE `tbl_kopi` (
  `id` bigint UNSIGNED NOT NULL,
  `pekerja_id` bigint UNSIGNED NOT NULL,
  `berat` double DEFAULT NULL,
  `tgl_menimbang` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kopi`
--

INSERT INTO `tbl_kopi` (`id`, `pekerja_id`, `berat`, `tgl_menimbang`, `created_at`, `updated_at`) VALUES
(3, 7, 5, '2022-07-23 00:00:00', NULL, NULL),
(5, 13, NULL, '2022-07-23 15:33:12', NULL, NULL),
(6, 15, 10, '2022-07-23 15:39:19', NULL, NULL),
(7, 14, NULL, '2022-07-23 15:42:52', NULL, NULL),
(8, 16, NULL, '2022-07-23 15:45:05', NULL, NULL),
(9, 17, NULL, '2022-07-23 23:05:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pekerja`
--

CREATE TABLE `tbl_pekerja` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('belum','terdaftar') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pekerja`
--

INSERT INTO `tbl_pekerja` (`id`, `nama`, `alamat`, `no_hp`, `jenis_kelamin`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Budi Setiawan', 'Jupiter', '0889761241', 'Perempuan', '2022-06-23 03:31:37', '2022-07-23 14:01:56', 'terdaftar'),
(7, 'a', 'aac', '0895125123', 'Perempuan', NULL, '2022-07-23 14:20:20', 'terdaftar'),
(8, 'Test', 'Test', '087625151', 'Laki-Laki', '2022-07-23 13:40:30', '2022-07-23 13:40:30', 'terdaftar'),
(9, 'a', 'a', '0872141241', 'Perempuan', '2022-07-23 14:08:59', '2022-07-23 14:08:59', 'terdaftar'),
(11, 'test', 'test', '087651251', 'Laki-Laki', NULL, '2022-07-23 14:28:49', 'terdaftar'),
(12, 'Rudi', 'none', '087641222', 'Laki-Laki', NULL, '2022-07-23 15:09:19', 'terdaftar'),
(13, 'Jack', 'N', '085123415', 'Laki-Laki', NULL, '2022-07-23 22:33:12', 'terdaftar'),
(14, 'coba', 'coba', '086512421', 'Perempuan', NULL, '2022-07-23 22:42:52', 'terdaftar'),
(15, 'Baru', 'n', '08751234', 'Laki-Laki', NULL, '2022-07-23 22:39:19', 'terdaftar'),
(16, 'coba date', 'coba', '086512214', 'Perempuan', NULL, '2022-07-23 22:45:05', 'terdaftar'),
(17, 'asal', 'asal', '086521412', 'Perempuan', NULL, '2022-07-23 16:05:41', 'terdaftar');

--
-- Trigger `tbl_pekerja`
--
DELIMITER $$
CREATE TRIGGER `input_tbl_kopi` AFTER UPDATE ON `tbl_pekerja` FOR EACH ROW BEGIN
    INSERT INTO tbl_kopi(pekerja_id, tgl_menimbang)
    VALUES (NEW.id, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bayu Prasetyo', 'aebayu789@gmail.com', 'bayupras', NULL, '$2y$10$O3oh8n/eNMf8B39ebIrNeOJVuTqAgBSh/O./gyiH/QGLK5P/Wk/Ca', NULL, '2022-06-23 03:31:03', '2022-06-23 03:31:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tbl_kopi`
--
ALTER TABLE `tbl_kopi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_kopi_pekerja_id_foreign` (`pekerja_id`);

--
-- Indeks untuk tabel `tbl_pekerja`
--
ALTER TABLE `tbl_pekerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kopi`
--
ALTER TABLE `tbl_kopi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_pekerja`
--
ALTER TABLE `tbl_pekerja`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_kopi`
--
ALTER TABLE `tbl_kopi`
  ADD CONSTRAINT `tbl_kopi_pekerja_id_foreign` FOREIGN KEY (`pekerja_id`) REFERENCES `tbl_pekerja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
