-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 04:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siren`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id`, `gambar`, `nama_gambar`, `created_at`, `updated_at`) VALUES
(3, 'pcd.jpg', 'Tongsis LED 4', '2021-06-01 04:02:33', '2021-06-01 01:26:01'),
(4, '2.jpg', 'Citasu', '2021-06-02 01:50:35', '2021-06-02 22:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(2, 'Lombok Tengah', '2021-04-21 08:59:01', '2021-06-02 04:36:21'),
(7, 'Mataram', '2021-05-01 07:15:31', '2021-05-01 07:15:31'),
(8, 'Lombok Barat', '2021-06-01 08:12:07', '2021-06-01 08:12:07'),
(9, 'Lombok Timur', '2021-06-01 18:15:45', '2021-06-01 18:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamera`
--

CREATE TABLE `tb_kamera` (
  `id_kamera` int(11) NOT NULL,
  `nama_kamera` varchar(50) NOT NULL,
  `id_type_kamera` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_gambar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamera`
--

INSERT INTO `tb_kamera` (`id_kamera`, `nama_kamera`, `id_type_kamera`, `stok`, `harga`, `id_gambar`, `created_at`, `updated_at`) VALUES
(1, 'Canonn', 5, 2, 90000, 3, '2021-06-01 04:03:24', '2021-06-01 01:25:23'),
(2, 'Fujifilm', 1, 12, 120000, 4, '2021-06-01 21:00:01', '2021-06-01 21:00:01'),
(6, 'Soni 2020', 7, 10, 200000, 3, '2021-06-03 10:18:08', '2021-06-03 10:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kabupaten`, `created_at`, `updated_at`) VALUES
(9, 'Narmada', 8, '2021-06-01 11:16:44', '2021-06-01 11:16:44'),
(10, 'Sembalun', 8, '2021-06-01 18:07:10', '2021-06-01 18:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id` int(11) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id`, `nama_kelurahan`, `id_kecamatan`, `created_at`, `updated_at`) VALUES
(5, 'Masbagik Utara', 10, '2021-06-01 18:16:12', '2021-06-01 18:16:12'),
(7, 'Masbagik Timur', 9, '2021-06-03 08:12:42', '2021-06-03 08:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perlengkapan`
--

CREATE TABLE `tb_perlengkapan` (
  `id_perlengkapan` int(11) NOT NULL,
  `nama_perlengkapan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_gambar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perlengkapan`
--

INSERT INTO `tb_perlengkapan` (`id_perlengkapan`, `nama_perlengkapan`, `stok`, `harga`, `id_gambar`, `created_at`, `updated_at`) VALUES
(5, 'Tongsis', 12, 25000, 3, '2021-06-01 18:58:33', '2021-06-01 18:58:33'),
(7, 'Lensa', 12, 200000, 3, '2021-06-02 23:01:36', '2021-06-02 23:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rental`
--

CREATE TABLE `tb_rental` (
  `id_rental` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kamera` int(11) NOT NULL,
  `id_type_kamera` int(11) NOT NULL,
  `id_perlengkapan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `hari_buka` varchar(50) NOT NULL,
  `jam_buka` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rental`
--

INSERT INTO `tb_rental` (`id_rental`, `nama`, `id_kamera`, `id_type_kamera`, `id_perlengkapan`, `id_kabupaten`, `id_kecamatan`, `id_kelurahan`, `longitude`, `latitude`, `hari_buka`, `jam_buka`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Citasu Rental Kamera', 6, 7, 7, 8, 9, 7, '1234', '1234', 'Senin-Jumat', '08.00-21.00 WITA', 'pcd.jpg', '2021-06-03 23:39:38', '2021-06-03 23:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_kamera`
--

CREATE TABLE `tb_type_kamera` (
  `id` int(11) NOT NULL,
  `type_kamera` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_type_kamera`
--

INSERT INTO `tb_type_kamera` (`id`, `type_kamera`, `created_at`, `updated_at`) VALUES
(1, 'Canon 3300D', NULL, NULL),
(4, 'Canon-3300AQUA', '2021-05-01 08:05:04', '2021-05-01 08:47:38'),
(5, 'Canon-3300AQUAAASSS', '2021-05-14 20:22:00', '2021-05-14 20:27:27'),
(6, 'Canon-30A', '2021-06-02 04:35:45', '2021-06-02 04:35:45'),
(7, 'Soni', '2021-06-02 22:48:44', '2021-06-02 22:48:44'),
(8, 'Fujifilm', '2021-06-03 15:41:45', '2021-06-03 15:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nofia!', 'admin@gmail.com', NULL, '$2y$10$16ruY2dIg1SKRMpVZ0nNE.iJjHeOHBaR1JkWrGZHTd0nSRo8/XXUS', 'VwxsaBXSzzvSrAVtlkcWgYZe2Y18hpteOlDExsXFw6e3rVmj8I5JgxhXAej3', '2021-04-13 19:51:40', '2021-04-13 19:51:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamera`
--
ALTER TABLE `tb_kamera`
  ADD PRIMARY KEY (`id_kamera`),
  ADD KEY `id_type_kamera` (`id_type_kamera`),
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `tb_perlengkapan`
--
ALTER TABLE `tb_perlengkapan`
  ADD PRIMARY KEY (`id_perlengkapan`),
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indexes for table `tb_rental`
--
ALTER TABLE `tb_rental`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `id_type_kamera` (`id_type_kamera`,`id_perlengkapan`,`id_kabupaten`,`id_kecamatan`,`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_kamera` (`id_kamera`),
  ADD KEY `id_perlengkapan` (`id_perlengkapan`);

--
-- Indexes for table `tb_type_kamera`
--
ALTER TABLE `tb_type_kamera`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kamera`
--
ALTER TABLE `tb_kamera`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_perlengkapan`
--
ALTER TABLE `tb_perlengkapan`
  MODIFY `id_perlengkapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_rental`
--
ALTER TABLE `tb_rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_type_kamera`
--
ALTER TABLE `tb_type_kamera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kamera`
--
ALTER TABLE `tb_kamera`
  ADD CONSTRAINT `tb_kamera_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `tb_gambar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kamera_ibfk_2` FOREIGN KEY (`id_type_kamera`) REFERENCES `tb_type_kamera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD CONSTRAINT `tb_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD CONSTRAINT `tb_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_perlengkapan`
--
ALTER TABLE `tb_perlengkapan`
  ADD CONSTRAINT `tb_perlengkapan_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `tb_gambar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rental`
--
ALTER TABLE `tb_rental`
  ADD CONSTRAINT `tb_rental_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `tb_rental_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rental_ibfk_3` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rental_ibfk_4` FOREIGN KEY (`id_kamera`) REFERENCES `tb_kamera` (`id_kamera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rental_ibfk_5` FOREIGN KEY (`id_type_kamera`) REFERENCES `tb_type_kamera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rental_ibfk_6` FOREIGN KEY (`id_perlengkapan`) REFERENCES `tb_perlengkapan` (`id_perlengkapan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
