-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2022 pada 13.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcatalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cores`
--

CREATE TABLE `cores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cores`
--

INSERT INTO `cores` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(1, 'INTEGRITY', '<p>prioritize honesty, trustworthiness and promote professionalism.</p>', '2022-03-21 02:35:24', '2022-03-21 03:20:52'),
(2, 'QUALITY', '<p>Quality is demonstrated in many ways by selling and supporting service products that delight customers and deliver the best possible results.&nbsp;</p>', '2022-03-21 02:41:16', '2022-03-21 02:41:16'),
(5, 'CUSTOMER FOCUS', '<p>prioritize the customer in carrying out and completing the work provided, especially in the quality and added value offered.</p>', '2022-03-21 04:09:34', '2022-03-21 04:09:34'),
(6, 'TEAM WORK', '<p>prioritize team work in carrying out and completing work so as to get maximum results and on time.&nbsp;</p>', '2022-03-21 04:09:57', '2022-03-21 04:09:57'),
(7, 'INNOVATION', '<p>carry out repairs and renewals that provide added value for customers and the company so that they can provide benefits to other interested parties.</p>', '2022-03-21 04:10:22', '2022-03-21 04:10:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cores`
--
ALTER TABLE `cores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
