-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2022 pada 09.00
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.23

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
(1, '<p>Become a world-class company that is competitive, reliable, trusted, and has the best product quality in the export sector.&nbsp; a</p>', '<p>Creating economic value for stakeholders, especially customers, shareholders and employees through product services in the export sector.</p>', '<p>Orcana Craft and Furniture is a project from PT. Orcana Universal Group was founded based on awareness of the high potential of natural resources around us, while protecting nature and having a desire to contribute to reducing the amount of plastic use that destroys the earth.</p>', NULL, '2022-03-18 05:45:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'N;', '2022-03-18 00:20:43', '2022-03-18 00:29:56', '2022-03-18 00:29:56'),
(2, 'a:1:{i:0;s:62:\"1647592629861_dchkpki-77530ce0-7e57-42a2-9ae2-e0cb8e9c222f.jpg\";}', '2022-03-18 00:32:22', '2022-03-18 00:37:11', NULL),
(3, 'a:1:{i:0;s:47:\"1647593102920_efedf2ac4ecfc_424600.png_list.png\";}', '2022-03-18 00:45:04', '2022-03-18 00:45:04', NULL);

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
-- Struktur dari tabel `founders`
--

CREATE TABLE `founders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `founders`
--

INSERT INTO `founders` (`id`, `img`, `name`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a:1:{i:0;s:45:\"1647609061840_10653066_202108080641060739.jpg\";}', 'Revo Wisnu', 'President Director', '2022-03-17 22:34:46', '2022-03-18 05:11:04', NULL),
(2, 'a:1:{i:0;s:19:\"1647586262538_2.png\";}', 'Leo Ridho', 'Trucking Manager', '2022-03-17 22:51:28', '2022-03-17 22:51:35', '2022-03-17 22:51:35'),
(3, 'a:1:{i:0;s:19:\"1647586376454_2.png\";}', 'Leo Ridho', 'Trucking Manager', '2022-03-17 22:53:22', '2022-03-17 22:53:33', '2022-03-17 22:53:33'),
(4, 'a:1:{i:0;s:19:\"1647603540098_2.png\";}', 'Leo Ridho', 'Trucking Manager', '2022-03-18 03:39:27', '2022-03-18 03:39:27', NULL),
(5, 'a:1:{i:0;s:19:\"1647603577810_3.png\";}', 'Ahmad', 'Production Manager', '2022-03-18 03:39:54', '2022-03-18 03:39:54', NULL),
(6, 'a:1:{i:0;s:19:\"1647603609700_4.png\";}', 'Dewi', 'Marketing Manager', '2022-03-18 03:40:20', '2022-03-18 03:40:20', NULL),
(7, 'a:1:{i:0;s:19:\"1647603632953_5.png\";}', 'Putri', 'Marketing Executive', '2022-03-18 03:40:48', '2022-03-18 03:40:48', NULL),
(8, 'a:1:{i:0;s:19:\"1647603661234_6.png\";}', 'Alfita', 'Financial Manager', '2022-03-18 03:41:11', '2022-03-18 03:41:11', NULL);

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
(3, 'Wood', '2022-02-24 05:49:50', '2022-02-24 05:49:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `management`
--

INSERT INTO `management` (`id`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a:1:{i:0;s:44:\"1648099643609_logo-golkar-www_ratio-16x9.jpg\";}', '2022-03-23 21:27:25', '2022-03-23 21:29:14', '2022-03-23 21:29:14'),
(2, 'a:1:{i:0;s:44:\"1648100056132_logo-golkar-www_ratio-16x9.jpg\";}', '2022-03-23 21:29:50', '2022-03-23 21:34:17', NULL);

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
(12, '2022_03_09_043710_create_abouts_table', 7),
(14, '2022_03_16_065902_create_product_knowledge_table', 8),
(15, '2022_03_18_060503_create_founders_table', 9),
(16, '2022_03_18_060848_create_banners_table', 9),
(17, '2022_03_21_075516_create_cores_table', 10),
(18, '2022_03_24_051309_create_management_table', 10);

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
(18, 'a:1:{i:0;s:24:\"1645271774406_straw5.jpg\";}', 'Straw', '21', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '128', '2022-02-19 03:56:20', '2022-03-16 06:01:24'),
(19, 'a:5:{i:0;s:24:\"1645277272446_basket.jpg\";i:1;s:25:\"1645277272448_basket2.jpg\";i:2;s:25:\"1645277272449_basket3.jpg\";i:3;s:25:\"1645277272449_basket4.jpg\";i:4;s:25:\"1645277272450_basket5.jpg\";}', 'Basket', '15', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '5', '2022-02-19 05:27:55', '2022-03-18 05:27:20'),
(20, 'a:5:{i:0;s:22:\"1645277406578_tray.jpg\";i:1;s:23:\"1645277406580_tray2.jpg\";i:2;s:23:\"1645277406580_tray3.jpg\";i:3;s:23:\"1645277406581_tray4.jpg\";i:4;s:23:\"1645277406582_tray5.jpg\";}', 'Tray', '14', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '4', '2022-02-19 05:30:08', '2022-03-07 22:06:38'),
(21, 'a:5:{i:0;s:28:\"1645277439585_decoration.jpg\";i:1;s:29:\"1645277439586_decoration2.jpg\";i:2;s:29:\"1645277439586_decoration3.jpg\";i:3;s:29:\"1645277439587_decoration4.jpg\";i:4;s:29:\"1645277439587_decoration5.jpg\";}', 'Decoration', '16', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '7', '2022-02-19 05:30:41', '2022-03-18 05:39:33'),
(22, 'a:5:{i:0;s:22:\"1645277468860_vas2.jpg\";i:1;s:21:\"1645277468857_vas.jpg\";i:2;s:22:\"1645277468861_vas3.jpg\";i:3;s:22:\"1645277468863_vas4.jpg\";i:4;s:22:\"1645277468864_vas5.jpg\";}', 'Vase', '17', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', NULL, '2022-02-19 05:31:11', '2022-02-19 05:31:11'),
(23, 'a:5:{i:0;s:21:\"1645277497623_mat.jpg\";i:1;s:22:\"1645277497625_mat2.jpg\";i:2;s:22:\"1645277497626_mat3.jpg\";i:3;s:22:\"1645277497627_mat4.jpg\";i:4;s:22:\"1645277497628_mat5.jpg\";}', 'Mat', '18', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '5', '2022-02-19 05:31:39', '2022-03-18 02:47:59'),
(24, 'a:5:{i:0;s:24:\"1645277518273_mirror.jpg\";i:1;s:25:\"1645277518274_mirror2.jpg\";i:2;s:25:\"1645277518275_mirror3.jpg\";i:3;s:25:\"1645277518276_mirror4.jpg\";i:4;s:25:\"1645277518276_mirror5.jpg\";}', 'Mirror', '19', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', NULL, '2022-02-19 05:32:01', '2022-02-19 05:32:01'),
(25, 'a:5:{i:0;s:25:\"1645277590118_lampion.jpg\";i:1;s:26:\"1645277590120_lampion2.jpg\";i:2;s:26:\"1645277590121_lampion3.jpg\";i:3;s:26:\"1645277590121_lampion4.jpg\";i:4;s:26:\"1645277590122_lampion5.jpg\";}', 'Lamp', '20', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '1', '2022-02-19 05:33:11', '2022-03-06 04:25:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_knowledge`
--

CREATE TABLE `product_knowledge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_knowledge`
--

INSERT INTO `product_knowledge` (`id`, `id_product`, `title`, `article`, `img`, `seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 18, 'Reasons We Should Use Bamboo Straws', '<p class=\"ql-align-justify\"><span style=\"color: black;\">The main reason why we should use bamboo straws is that it is one of the easiest steps we can take to help solve the problem of plastic waste on our planet.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">1.&nbsp;&nbsp;&nbsp;</span>Reusable and long lasting</p><p class=\"ql-align-justify\">	<span style=\"color: black;\">In order to ensure the longevity of your bamboo straws, after hand washing, make sure to let them fully dry by laying them flat (not vertical) to prevent any water buildup at the bottom of the straw and always store them in a well-ventilated area. Avoid airtight containers or jars as this will cause potential moisture buildup inside the straws.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">2.&nbsp;&nbsp;&nbsp;</span>Cost-Effective</p><p class=\"ql-align-justify\">	<span style=\"color: black;\">Money aside, consider the&nbsp;</span><strong style=\"color: black;\">real environmental cost</strong><span style=\"color: black;\">&nbsp;of using plastic drinking straws. It’s estimated that nearly&nbsp;</span><a href=\"https://www.nytimes.com/2018/07/19/business/plastic-straws-ban-fact-check-nyt.html\" target=\"_blank\" style=\"color: black;\">170-390 million</a><span style=\"color: black;\">&nbsp;disposable plastic straws are used in the United States every day – which comes to&nbsp;</span><a href=\"https://www.nytimes.com/2018/07/19/business/plastic-straws-ban-fact-check-nyt.html\" target=\"_blank\" style=\"color: black;\">63 billion to 142 billion</a><span style=\"color: black;\">&nbsp;straws per year! And that’s just in the USA, this number is even higher when you add in the global population. This massive cost can easily be prevented by switching over to a bamboo straw.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">3.&nbsp;&nbsp;&nbsp;</span>Healthy and Chemical-Free</p><p class=\"ql-align-justify\">	<span style=\"color: black;\">Plastic straws are made from a petroleum-derived chemical, polypropylene. The FDA determines this material is safe for food contact, but research evidence has shown that it can&nbsp;</span><a href=\"https://www.ncbi.nlm.nih.gov/pubmed/18988846\" target=\"_blank\" style=\"color: black;\">leach chemicals into liquids</a><span style=\"color: black;\">. With hot beverages, the plastic can become heated and these chemicals can leak out of your straw and contaminate your drink. Even small amounts of&nbsp;</span><a href=\"https://www.ncbi.nlm.nih.gov/pubmed/18988846\" target=\"_blank\" style=\"color: black;\">highly acidic beverages and UV light</a><span style=\"color: black;\">&nbsp;can break down these harmful compounds and infuse them into your drink. </span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">BPA (bisphenol A) can also be found in some hard plastics and based on animal studies, the FDA has placed concern about the&nbsp;</span><a href=\"https://www.webmd.com/children/bpa#1\" target=\"_blank\" style=\"color: black;\">potential health effects of BPA</a><span style=\"color: black;\">.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">The good news is that the bamboo plant has&nbsp;</span><a href=\"https://www.researchgate.net/publication/233402755_The_origin_of_the_antibacterial_property_of_bamboo\" target=\"_blank\" style=\"color: black;\">naturally antimicrobial properties</a><span style=\"color: black;\">&nbsp;meaning they are less likely to harbor bacteria over time and be more resistant to spoiling or rotting over time. Bamboo is also grown chemical-free, not requiring the need for chemical fertilizers or pesticides.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">4.&nbsp;&nbsp;&nbsp;</span><span style=\"color: black;\">Stylish and Fun</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bamboo is eye-catching and stylish. A quick photo of a bamboo drinking straw in any beverage will be Instagram worthy. Kids love the novelty of a fun looking straw and will be encouraged to finish their healthy juice or smoothie. It also serves as a great opportunity to educate your children or guests about the dangers of plastic waste due to single-use plastic drinking straws.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">5.&nbsp;&nbsp;&nbsp;</span><span style=\"color: black;\">Durable</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Many bamboo drinking straws come finished and treated with polish. This gives the straws no sharp edges or lower risks of breakage. They are child-friendly with smooth edges that won’t cause any irritation when using. Bamboo drinking straws can be used for both hot or cold beverages. Bamboo is also used in buildings and bridges in some parts of the world. As a material, bamboo has a higher specific compressive strength (ability to withstand heavy loads) than wood, brick or concrete, and a specific tensile strength (how hard it is to pull a material apart) that is&nbsp;</span><a href=\"https://engineeringdiscoveries.com/2018/12/02/why-bamboo-is-more-stronger-than-steel-reinforcement/\" target=\"_blank\" style=\"color: black;\">close to steel</a><span style=\"color: black;\">. This makes bamboo one of the strongest&nbsp;</span><a href=\"https://householdwonders.com/most-eco-friendly-materials/\" target=\"_blank\" style=\"color: black;\">eco-friendly materials</a><span style=\"color: black;\">&nbsp;on earth.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">6.&nbsp;&nbsp;&nbsp;</span><span style=\"color: black;\">Easy Cleanup</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">When I use my wider bamboo drinking straws for smoothies, I like having a brush to clean out any leftover residue inside of the straw. Regardless of the diameter, I highly recommend choosing a pack that offers a cleaning brush as it will ensure the life of your straws and keep them sanitary, especially when using them with smoothies, fresh juices, or milkshakes. If your bamboo drinking straws are treated and finished with polish, they are safe to wash at high temperatures in the dishwasher. Otherwise, a simple hand washing with lukewarm soapy water will do the trick. You can also shake the straws in a jar full of warm soapy water for cleaning many at once. Your straws should be laid out and air-dried before using again to prevent any moisture from building up inside.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">7.&nbsp;&nbsp;&nbsp;</span><span style=\"color: black;\">Portable On-The-Go</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Super-lightweight (less than 1oz), bamboo drinking straws don’t take up much space. You can simply toss your straw in your bag and take it with you on-the-go. The first set of straws I purchased also came with a small and convenient carrying pouch that fits easily inside my purse or tucks away in the kitchen drawer.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">When I stop at my local coffee shop for an iced coffee, I will always opt to use my bamboo drinking straw with my travel coffee cup instead of the single-use plastic straws that are available.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">8.&nbsp;&nbsp;&nbsp;</span>An Eco-Friendly and Renewable Resource</p><p class=\"ql-align-justify\">Bamboo is a super plant! Famously known as one of the world’s most&nbsp;<a href=\"https://householdwonders.com/most-eco-friendly-materials/\" target=\"_blank\" style=\"color: windowtext;\">renewable materials</a>, it is the&nbsp;<a href=\"https://householdwonders.com/how-fast-does-bamboo-grow/\" target=\"_blank\" style=\"color: windowtext;\">fastest-growing plant</a>&nbsp;in the world being able to grow up to three feet a day. Bamboo requires no pesticides, and little water- especially compared to other crops such as cotton. When bamboo is harvested, the plant easily regenerates itself. Bamboo does its job for the environment by offering&nbsp;<a href=\"https://www.theguardian.com/environment/2003/mar/20/research.science\" target=\"_blank\" style=\"color: windowtext;\">35% more oxygen</a>&nbsp;than trees and actually helps absorb CO2 from the atmosphere. Bamboo drinking straws are made from 100% all-natural bamboo and carry all of the eco-friendly properties of the plant in its original form.</p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">9.&nbsp;&nbsp;&nbsp;</span>Eliminates Plastic Waste</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Plastic is polluting our oceans at an alarming rate, with an estimated&nbsp;</span><a href=\"https://phys.org/news/2018-04-science-amount-straws-plastic-pollution.html\" target=\"_blank\" style=\"color: black;\">9 million tons</a><span style=\"color: black;\">&nbsp;in the world’s oceans and coastlines each year. . And that is just the plastic that’s in the ocean, with more than&nbsp;</span><a href=\"https://phys.org/news/2018-04-science-amount-straws-plastic-pollution.html\" target=\"_blank\" style=\"color: black;\">35 million tons</a><span style=\"color: black;\">&nbsp;of plastic waste produced globally. When plastic waste makes it into the ocean seabirds can ingest nearly&nbsp;</span><a href=\"https://phys.org/news/2018-04-science-amount-straws-plastic-pollution.html\" target=\"_blank\" style=\"color: black;\">8 percent</a><span style=\"color: black;\">&nbsp;of their body weight in plastic which can have harmful results. can accidentally ingest them causing a 50 percent mortality rate in seabirds and turtles.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Any straws that are not ingested break down into smaller and smaller pieces known as “</span><a href=\"https://www.nationalgeographic.com/magazine/2018/06/plastic-planet-health-pollution-waste-microplastics/\" target=\"_blank\" style=\"color: black;\">microplastics</a><span style=\"color: black;\">” rather than naturally biodegrading, which clog up waterways and threaten ecosystems of marine life.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">According to&nbsp;</span><a href=\"http://www3.weforum.org/docs/WEF_The_New_Plastics_Economy.pdf\" target=\"_blank\" style=\"color: black;\">a report by the Ellen MacArthur Foundation</a><span style=\"color: black;\">, it’s estimated that by 2050 there will be more plastic waste in the ocean than fish! When thinking about my children’s future, these thoughts are frightening. Bamboo drinking straws are a safe and natural alternative that won’t endanger marine life or pollute the environment. It is a simple step you can take towards solving the problem of plastic waste on our planet.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(51, 51, 51);\">10. </span>Biodegradable</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bamboo is a&nbsp;</span><a href=\"https://householdwonders.com/most-eco-friendly-materials/\" target=\"_blank\" style=\"color: black;\">biodegradable material</a><span style=\"color: black;\">, which comes from the earth and goes back to the earth, decomposing within 4-6 months. On the contrary, according to 4Ocean, plastic drinking straws can up to&nbsp;</span><a href=\"https://medium.com/green-zine/plastic-straws-a-single-use-that-lasts-a-lifetime-191f3682c262\" target=\"_blank\" style=\"color: black;\">200 years</a><span style=\"color: black;\">&nbsp;to fully decompose!</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">When your straws show natural signs of wear and tear such as splitting or fraying at the ends, it’s time to dispose of them. Rather than throwing them in the garbage, you can simply compost them in the soil allowing them to decompose and return to the earth. I suggest breaking them in half or using plant trimmers if you want to spread out smaller pieces in your compost garden.</span></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\">Source : https://householdwonders.com/reasons-to-use-bamboo-drinking-straws/&nbsp;</p><p><br></p>', 'N;', '3', '2022-03-16 03:18:53', '2022-03-18 01:50:38', NULL),
(3, 18, 'Plastic Straws Trash', '<p class=\"ql-align-justify\">Currently, Indonesia is entering the waste emergency phase. Data from the Ministry of Environment and Forestry (KLHK) estimates that the waste heap in Indonesia in 2020 is 67.8 million tons. Ironically, most plastic waste in Indonesia is straw. Of course, this problem cannot be taken lightly.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Director of Environmental Partnerships (Directorate General of PSKL) of the Ministry of Environment and Forestry, Jo Kumala Dewi, said that during the pandemic the problem of waste was increasing. This is because people\'s consumption while at home has changed, especially the use of packaged products including plastic straws. For this reason, cooperation with participation and partnership from all parties is needed to be able to synergize and move together to overcome these environmental problems.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">\"One of them is with the producers in finding solutions to the straws problem which cannot be taken lightly,\" he said on the sidelines of the webinar \"National Waste Care Day (HPSN): Frisian Flag Indonesia\", Friday (19/2/2021).</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Corporate Affairs Director of PT Frisian Flag Indonesia (FFI) Andrew F Saputro said as a solution to the problem of plastic waste, especially straws, his party began to provide environmentally friendly paper straws for low-fat ready-to-drink liquid milk products. To provide safety and convenience for consumers, the paper straws that we produce have also been food tested, food grade certified and free of gluten allergens. The selected materials use environmentally friendly materials, can be recycled (recycleable) and have received FSC (Forest Stewardship Council) certification.</p><p class=\"ql-align-justify\">“The presence of the goodness of paper straws in our low-fat ready-to-drink liquid milk products is the company\'s first step in presenting products and packaging that are more environmentally friendly. In the future, we will continue this initiative and we will strengthen it, in order to realize our commitment to 100% recyclable packaging by 2025,\" said Andrew.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">In addition, Andrew added, his party also invites the younger generation to jointly start small changes, which can have a positive impact on the environment, through the #JagaGiziJagaBumi campaign. In involving the younger generation to initiate good change is not without reason. The latest data from the Central Statistics Agency shows that currently Indonesia is dominated by Generation Z and millennials. Gen Z dominates up to 27.94% and millennials as much as 25.87%. This means that the younger generation has a crucial role in forming new habits and having an impact on the sustainability of the earth in the future.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">\"Through this initiative, we invite the public to continue to maintain daily nutrition, while preserving the earth, starting with the use of paper straws - so that they can contribute to saving up to 10 tons of plastic waste per year,\" he concluded.</p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\">Source : <a href=\"https://www.beritasatu.com/nasional/735965/sampah-sedotan-plastik-tak-bisa-dianggap-sepele\" target=\"_blank\">https://www.beritasatu.com/nasional/735965/sampah-sedotan-plastik-tak-bisa-dianggap-sepele</a> </p><p><br></p>', 'a:1:{i:0;s:44:\"1647439878482_logo-golkar-www_ratio-16x9.jpg\";}', '8', '2022-03-16 06:11:36', '2022-03-18 05:14:45', NULL);

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
(2, 'Whatsapp', '6285109714445', 'Wood', 'Dewi', '2022-03-06 04:11:35', '2022-03-18 02:28:01', NULL),
(3, 'Whatsapp', '85263507202', 'Coconut', 'Putri', '2022-03-06 04:11:35', '2022-03-18 02:28:01', NULL),
(4, 'Instagram', 'https://instagram.com/orcana.universal?utm_medium=copy_link', NULL, 'orcana.universal', '2022-03-06 04:15:09', '2022-03-06 04:15:09', NULL),
(5, 'Facebook', 'https://www.facebook.com/profile.php?id=100077552217335', NULL, 'Orcana Uni', '2022-03-06 04:15:09', '2022-03-06 04:15:56', NULL),
(6, 'Whatsapp', '6285109714445', 'Marine', 'Dewi', '2022-03-18 02:28:01', '2022-03-18 02:28:01', NULL);

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
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `founders`
--
ALTER TABLE `founders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `management`
--
ALTER TABLE `management`
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
-- Indeks untuk tabel `product_knowledge`
--
ALTER TABLE `product_knowledge`
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
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `cores`
--
ALTER TABLE `cores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `founders`
--
ALTER TABLE `founders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `product_knowledge`
--
ALTER TABLE `product_knowledge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
