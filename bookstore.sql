-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 03:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin@admin.com', '12345', 'admin', '2022-07-22 06:55:06', '2022-07-22 06:55:06', 0),
(2, 'kasir@kasir.com', 'kasir', 'kasir', NULL, NULL, 1),
(3, 'staff@staff.com', 'staff', 'staff', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kstegoris`
--

CREATE TABLE `kstegoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kstegoris`
--

INSERT INTO `kstegoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Alat Tulis', '2023-03-04 05:30:00', '2023-03-04 05:30:00'),
(2, 'Novel', '2023-03-04 05:30:07', '2023-03-04 05:30:07');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_22_120316_create_kstegoris_table', 1),
(7, '2022_07_22_135307_create_admins_table', 2),
(8, '2014_10_12_000000_create_users_table', 3),
(11, '2022_07_22_120224_create_produks_table', 4),
(12, '2022_07_22_202310_create_orders_table', 5),
(13, '2022_07_25_090517_create_pembayarans_table', 6),
(14, '2023_03_04_093054_create_carts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Mau Beli',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_order` varchar(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_produk`, `id_user`, `jumlah`, `status`, `created_at`, `updated_at`, `no_order`, `id_pembayaran`) VALUES
(1, 2, 1, 1, 'Mau Beli', '2023-03-04 11:02:11', '2023-03-04 11:02:11', '0qUt7', 1),
(2, 5, 1, 1, 'Mau Beli', '2023-03-04 11:02:11', '2023-03-04 11:02:11', '0qUt7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `buktibayar` varchar(255) NOT NULL DEFAULT 'bukti.png',
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'On Prosess',
  `pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `no_order`, `id_user`, `buktibayar`, `total`, `status`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, '0qUt7', 1, 'bukti.png', 75525, 'On Prosess', 'transfer', '2023-03-04 11:02:11', '2023-03-04 11:02:11');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `detail_produk` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Ada',
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `stok_produk`, `harga`, `foto_produk`, `detail_produk`, `status`, `id_kategori`, `created_at`, `updated_at`) VALUES
(2, 'Pensil Warna', 24, 25500, 'WhatsApp-Image-2019-11-27-at-17.05.59.jpeg', 'Pensil warna merk faber castel dengan pewarnaan yang jelas dan terang', 'Ada', 1, '2023-03-04 05:31:30', '2023-03-04 10:57:43'),
(3, 'Bolpoin', 250, 5650, 'bf83d-Stationery2_amazoncom.jpg', 'Bolpoin merk sarasa tersedia berbagai macam warna', 'Ada', 1, '2023-03-04 05:32:25', '2023-03-04 05:32:25'),
(4, 'Tempat Pensil', 27, 34000, 't-pensil-2-300x300.jpg', 'Tempat pensil kekinian dapat menyimpan banyak isinya', 'Ada', 1, '2023-03-04 05:33:01', '2023-03-04 05:33:01'),
(5, 'Novel Narasi', 4, 54000, '63e82141-7e79-4a57-81ad-22053c71ef76.jpg', 'Novel dibuat oleh penulis terkenal', 'Ada', 2, '2023-03-04 05:33:36', '2023-03-04 10:57:55'),
(6, 'Kita Pergi Hari Ini', 5, 56750, 'penulis-ziggy-zezsyazeoviennazabrizkie_34.jpeg', 'Novel bercerita tentang seorang keluarga yang mau jalan-jalan', 'Ada', 2, '2023-03-04 05:34:13', '2023-03-04 05:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'User.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telepon`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'TIARA RAHMANIA HADININGRUM', 'tiara@user.com', NULL, '$2y$10$WFt9XQUYg6O5afrbIUsJ5.JsoNe.5efjD6ySCuRP23bH9m7GOun1C', '081332496225', 'Perum Villa Jasmine 1 blok I - 33', 'User.png', '2022-07-22 08:29:05', '2022-07-22 08:29:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_id_produk_index` (`id_produk`),
  ADD KEY `carts_id_user_index` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kstegoris`
--
ALTER TABLE `kstegoris`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_produk_index` (`id_produk`),
  ADD KEY `orders_id_user_index` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_id_user_index` (`id_user`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_id_kategori_index` (`id_kategori`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kstegoris`
--
ALTER TABLE `kstegoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
