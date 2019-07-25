-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2019 pada 13.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE `calon` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id`, `nama`, `email`, `alamat`, `foto`, `jenis_kelamin`, `nomor_telepon`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'Audy', 'guru@guru.com', 'Cibitung', 'calongambar/59994416_1825752694237503_9101895084525223936_o.jpg', '1', '02102101012', 'Jadi Sejahtera', 'Adil Makmur', '2019-07-15 03:43:37', '2019-07-22 04:22:35'),
(2, 'Panji', 'server.brebes@my.gavilan.edu', 'Tambun', 'calongambar/debate (1).png', '1', '02102101010', 'Maju', 'Terus', '2019-07-15 03:44:27', '2019-07-15 03:44:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `status_vote` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id`, `nik`, `nama`, `jenis_kelamin`, `status_vote`, `created_at`, `updated_at`) VALUES
(2, 123456789012, 'aaaa', 1, 1, '2019-07-13 22:50:46', '2019-07-24 22:26:05'),
(3, 12345678902, 'aaaa', 1, 1, '2019-07-13 22:51:02', '2019-07-14 02:37:20'),
(4, 12458765235, 'Saputra Kamandanu', 2, 1, '2019-07-14 20:14:40', '2019-07-22 23:49:00'),
(26, 1234567890123, 'aaaa', 1, 0, '2019-07-24 20:53:40', '2019-07-24 20:53:40'),
(29, 1111111111123, 'aaaa', 1, 1, '2019-07-24 20:56:33', '2019-07-25 02:34:09'),
(30, 111111111116, 'aaaa', 1, 0, '2019-07-24 21:12:46', '2019-07-24 21:12:46'),
(31, 11111111111693, 'aaaa', 1, 0, '2019-07-24 21:13:38', '2019-07-24 21:13:38'),
(33, 1111111111198, 'aaaa', 1, 0, '2019-07-24 21:16:31', '2019-07-24 21:16:31'),
(34, 111111111112345, 'aaaa', 1, 0, '2019-07-24 22:22:38', '2019-07-24 22:25:07'),
(36, 1111111111123456, 'aaaa', 1, 0, '2019-07-24 22:23:04', '2019-07-24 22:23:04'),
(40, 111111111112, 'aaaa', 1, 0, '2019-07-24 23:25:50', '2019-07-24 23:25:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saputra', 'admin@siakad.com', NULL, '$2y$10$YDtZgxZwYGcbtNQ1JPiSbedA13ydkaE.p0BdPRnmIrNbfZolbMpFS', NULL, '2019-07-13 21:18:24', '2019-07-13 21:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id`, `id_calon`, `id_pemilih`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-07-15 00:14:12', '2019-07-15 00:14:12'),
(2, 1, 6, '2019-07-17 21:01:51', '2019-07-17 21:01:51'),
(3, 1, 6, '2019-07-17 21:17:39', '2019-07-17 21:17:39'),
(4, 2, 5, '2019-07-18 21:01:01', '2019-07-18 21:01:01'),
(5, 1, 4, '2019-07-22 23:48:59', '2019-07-22 23:48:59'),
(6, 1, 29, '2019-07-25 02:34:09', '2019-07-25 02:34:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
