-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2022 pada 05.03
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
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `visi`, `misi`, `history`, `created_at`, `updated_at`) VALUES
(1, '<p>Become a world-class company that is competitive, reliable, trusted, and has the best product quality in the export sector.&nbsp;</p>', '<p>Creating economic value for stakeholders, especially customers, shareholders and employees through product services in the export sector.</p>', '<p>Orcana Craft and Furniture is a project from PT. Orcana Universal Group was founded based on awareness of the high potential of natural resources around us, while protecting nature and having a desire to contribute to reducing the amount of plastic use that destroys the earth.</p>', NULL, '2022-03-10 20:02:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category`, `main_category`, `created_at`, `updated_at`) VALUES
(14, 'Tray', '1', '2022-02-18 22:42:14', '2022-02-19 03:02:42'),
(15, 'Basket', '1', '2022-02-18 22:42:24', '2022-02-18 22:42:24'),
(16, 'Decoration', '2', '2022-02-19 03:03:10', '2022-02-19 03:03:10'),
(17, 'Vase', '2', '2022-02-19 03:03:23', '2022-02-19 03:03:23'),
(18, 'Mat', '2', '2022-02-19 03:03:28', '2022-02-19 03:03:28'),
(19, 'Mirror', '3', '2022-02-19 03:03:39', '2022-02-19 03:03:39'),
(20, 'Lampion', '3', '2022-02-19 03:03:46', '2022-02-19 03:03:46'),
(21, 'Straw', '1', '2022-02-19 03:03:52', '2022-02-19 03:03:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `main_categories`
--

INSERT INTO `main_categories` (`id`, `main_category`, `created_at`, `updated_at`) VALUES
(1, 'Marine', '2022-02-24 05:49:11', '2022-02-26 07:17:41'),
(2, 'Coconut', '2022-02-23 16:00:00', '2022-02-24 05:49:34'),
(3, 'Wood ', '2022-02-24 05:49:50', '2022-02-24 05:49:50');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_12_071028_create_categories_table', 1),
(7, '2022_02_13_070627_create_products_table', 2),
(8, '2022_02_24_035659_create_sub_categories_table', 3),
(9, '2022_02_24_041418_create_sub_categories_table', 4),
(10, '2022_02_24_042422_create_main_categories_table', 5),
(11, '2022_03_05_164231_create_social_media_table', 6),
(12, '2022_03_09_043710_create_abouts_table', 7);

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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `img`, `name`, `category`, `description`, `seen`, `created_at`, `updated_at`) VALUES
(18, 'a:5:{i:0;s:23:\"1645271774402_straw.jpg\";i:1;s:24:\"1645271774404_straw2.jpg\";i:2;s:24:\"1645271774405_straw3.jpg\";i:3;s:24:\"1645271774406_straw4.jpg\";i:4;s:24:\"1645271774406_straw5.jpg\";}', 'Straw', '21', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '127', '2022-02-19 03:56:20', '2022-03-07 20:32:26'),
(19, 'a:5:{i:0;s:24:\"1645277272446_basket.jpg\";i:1;s:25:\"1645277272448_basket2.jpg\";i:2;s:25:\"1645277272449_basket3.jpg\";i:3;s:25:\"1645277272449_basket4.jpg\";i:4;s:25:\"1645277272450_basket5.jpg\";}', 'Basket', '15', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '4', '2022-02-19 05:27:55', '2022-03-06 04:20:58'),
(20, 'a:5:{i:0;s:22:\"1645277406578_tray.jpg\";i:1;s:23:\"1645277406580_tray2.jpg\";i:2;s:23:\"1645277406580_tray3.jpg\";i:3;s:23:\"1645277406581_tray4.jpg\";i:4;s:23:\"1645277406582_tray5.jpg\";}', 'Tray', '14', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '4', '2022-02-19 05:30:08', '2022-03-07 22:06:38'),
(21, 'a:5:{i:0;s:28:\"1645277439585_decoration.jpg\";i:1;s:29:\"1645277439586_decoration2.jpg\";i:2;s:29:\"1645277439586_decoration3.jpg\";i:3;s:29:\"1645277439587_decoration4.jpg\";i:4;s:29:\"1645277439587_decoration5.jpg\";}', 'Decoration', '16', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '1', '2022-02-19 05:30:41', '2022-03-06 04:08:51'),
(22, 'a:5:{i:0;s:22:\"1645277468860_vas2.jpg\";i:1;s:21:\"1645277468857_vas.jpg\";i:2;s:22:\"1645277468861_vas3.jpg\";i:3;s:22:\"1645277468863_vas4.jpg\";i:4;s:22:\"1645277468864_vas5.jpg\";}', 'Vase', '17', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', NULL, '2022-02-19 05:31:11', '2022-02-19 05:31:11'),
(23, 'a:5:{i:0;s:21:\"1645277497623_mat.jpg\";i:1;s:22:\"1645277497625_mat2.jpg\";i:2;s:22:\"1645277497626_mat3.jpg\";i:3;s:22:\"1645277497627_mat4.jpg\";i:4;s:22:\"1645277497628_mat5.jpg\";}', 'Mat', '18', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '4', '2022-02-19 05:31:39', '2022-02-20 22:07:05'),
(24, 'a:5:{i:0;s:24:\"1645277518273_mirror.jpg\";i:1;s:25:\"1645277518274_mirror2.jpg\";i:2;s:25:\"1645277518275_mirror3.jpg\";i:3;s:25:\"1645277518276_mirror4.jpg\";i:4;s:25:\"1645277518276_mirror5.jpg\";}', 'Mirror', '19', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', NULL, '2022-02-19 05:32:01', '2022-02-19 05:32:01'),
(25, 'a:5:{i:0;s:25:\"1645277590118_lampion.jpg\";i:1;s:26:\"1645277590120_lampion2.jpg\";i:2;s:26:\"1645277590121_lampion3.jpg\";i:3;s:26:\"1645277590121_lampion4.jpg\";i:4;s:26:\"1645277590122_lampion5.jpg\";}', 'Lamp', '20', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '1', '2022-02-19 05:33:11', '2022-03-06 04:25:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`id`, `nama`, `content`, `fungsi`, `username`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Whatsapp', '6282234676734', 'Complain', 'Alfita', '2022-03-06 04:11:35', '2022-03-06 04:11:35', NULL),
(2, 'Whatsapp', '6285109714445', 'Wood Product & Marine Product', 'Dewi', '2022-03-06 04:11:35', '2022-03-06 04:11:35', NULL),
(3, 'Whatsapp', '85263507202', 'Coconut Product', 'Putri', '2022-03-06 04:11:35', '2022-03-06 04:11:35', NULL),
(4, 'Instagram', 'https://instagram.com/orcana.universal?utm_medium=copy_link', NULL, 'orcana.universal', '2022-03-06 04:15:09', '2022-03-06 04:15:09', NULL),
(5, 'Facebook', 'https://www.facebook.com/profile.php?id=100077552217335', NULL, 'Orcana Uni', '2022-03-06 04:15:09', '2022-03-06 04:15:56', NULL);

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
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$DhXvC3BJFD310j2K5UX3d.L9XOgS4BA9BKZI7CbLPm.rceY6s5Ebm', NULL, NULL, '2022-03-05 02:29:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `main_categories`
--
ALTER TABLE `main_categories`
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
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
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
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
