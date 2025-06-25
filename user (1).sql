-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 24 Jun 2025 pada 08.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb_adminlte`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('pemasukan','pengeluaran') NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `user_id`, `tanggal`, `jenis`, `kategori`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 10, '2005-04-04', 'pengeluaran', 'beli sayur', 250000.00, 'testing ajah', '2025-06-23 09:12:38', '2025-06-23 09:12:38'),
(5, 10, '2004-05-05', 'pemasukan', 'jual sayur', 23000000.00, 'testing', '2025-06-23 09:12:58', '2025-06-23 09:12:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panen`
--

CREATE TABLE `panen` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kualitas` varchar(50) DEFAULT NULL,
  `estimasi_panen_berikut` date DEFAULT NULL,
  `distribusi_jual` int(11) DEFAULT 0,
  `distribusi_konsumsi` int(11) DEFAULT 0,
  `distribusi_simpan` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `panen`
--

INSERT INTO `panen` (`id`, `tanaman_id`, `tanggal`, `jumlah`, `kualitas`, `estimasi_panen_berikut`, `distribusi_jual`, `distribusi_konsumsi`, `distribusi_simpan`, `created_at`, `updated_at`) VALUES
(1, 1, '2005-01-03', 30, '89', NULL, NULL, NULL, NULL, '2025-06-23 11:30:25', '2025-06-23 11:30:25'),
(2, 1, '2005-01-03', 30, '89', NULL, NULL, NULL, NULL, '2025-06-23 11:32:43', '2025-06-23 11:32:43'),
(3, 1, '2005-01-03', 30, '89', NULL, NULL, NULL, NULL, '2025-06-23 11:33:43', '2025-06-23 11:33:43'),
(4, 1, '0000-00-00', 0, NULL, '2004-05-09', 0, 0, 0, '2025-06-23 11:34:13', '2025-06-23 11:34:13'),
(5, 1, '0000-00-00', 0, NULL, '2004-06-03', 0, 0, 0, '2025-06-23 11:36:11', '2025-06-23 11:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan_tanaman`
--

CREATE TABLE `perawatan_tanaman` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perawatan_tanaman`
--

INSERT INTO `perawatan_tanaman` (`id`, `tanaman_id`, `tanggal`, `kegiatan`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2004-02-03', 'menyiram', 'cek', '2025-06-23 10:27:22', '2025-06-23 10:27:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanaman`
--

CREATE TABLE `tanaman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `varietas` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tanggal_tanam` date DEFAULT NULL,
  `status` enum('tumbuh','siap panen','rusak') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanaman`
--

INSERT INTO `tanaman` (`id`, `user_id`, `nama`, `jenis`, `varietas`, `lokasi`, `tanggal_tanam`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'mawar', 'hijau', 'koba', 'jakarta', '2005-05-03', 'tumbuh', '2025-06-23 09:54:13', '2025-06-23 10:24:15'),
(2, 10, 'mawar1', 'merah', 'koba', 'jakarta', '2005-05-03', 'tumbuh', '2025-06-23 09:55:39', '2025-06-23 11:34:48'),
(3, 10, 'mawar2', 'merah', 'koba', 'jakarta', '2005-05-03', 'tumbuh', '2025-06-23 09:56:46', '2025-06-23 11:34:54'),
(4, 10, 'mawar3', 'merah', 'koba', 'jakarta', '2005-05-03', 'tumbuh', '2025-06-23 10:04:25', '2025-06-23 11:35:00'),
(5, 10, 'mawar4', 'merah', 'koba', 'jakarta', '2005-05-03', 'tumbuh', '2025-06-23 10:10:33', '2025-06-23 11:35:05'),
(6, 10, 'ical', 'merah', 'koba', 'jakarta', '2005-03-03', 'tumbuh', '2025-06-23 10:10:55', '2025-06-23 10:10:55'),
(7, 10, 'cek1', 'merah', 'koba', 'jakarta', '2005-03-03', 'siap panen', '2025-06-23 10:13:14', '2025-06-23 11:35:12'),
(8, 10, 'cek2', 'hijau', 'unik', 'banjar', '2025-06-26', 'siap panen', '2025-06-23 10:24:42', '2025-06-23 11:35:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$UqNdF9PGwGakRHfS8R3BoONZ2rwvRtr/OfIQTMMynDqFFv3sEQLbq', '2025-05-20 15:45:09'),
(2, 'user1', 'user1@example.com', '$2y$10$h8HZzqKCUxcmYEkbrZcywOg7/YcuRlbhJu7zwJ2If4uBfeO12SLea', '2025-05-20 15:45:09'),
(3, 'faisal', 'faisal@example.com', '$2y$10$zOeRzjYtGLiMCm1wzgnOROOpPaemPV4NWqGJu16QgKHXxPhAVPk9y', '2025-05-20 15:45:09'),
(4, 'akbar', 'akbar@example.com', 'admin123', '2025-05-20 16:25:12'),
(5, 'faisal', 'faisalaja@gmail.com', '$2y$10$0CPntN9tlJVeN7hAL2yL.ujmSBTqQbeGPwf56GhpyUGRDAZbI53pu', '2025-05-20 16:26:04'),
(6, 'faisal', 'faisaltesting@gmail.com', '$2y$10$CZZ55hN4hs5Qrv1R7ldm6OFWbif4g.WrtBKXxZ4awDd3OlpJKSCFG', '2025-05-20 16:26:42'),
(7, 'faisal', 'coba@gmail.com', '$2y$10$mLr.u1MKTsvhIa23fqY6q.yGOTY76BtjYBuaGZcqb53rULbrnV922', '2025-05-20 16:27:25'),
(8, 'faisal', 'coba1@gmail.com', 'coba', '2025-05-20 16:29:25'),
(9, 'faisal', 'coba2@gmail.com', 'coba', '2025-05-20 16:54:00'),
(10, 'faisalakbar13', 'coba3@gmail.com', 'coba', '2025-05-27 14:52:54'),
(11, 'faisalakbar11', 'coba11@gmail.com', 'coba', '2025-05-27 23:11:21'),
(12, 'faisalakbar12', 'coba12@gmail.com', 'coba', '2025-05-27 23:11:28'),
(13, 'cobadulu', 'cobadulu@gmail.com', '12345678', '2025-06-24 06:02:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanaman_id` (`tanaman_id`);

--
-- Indeks untuk tabel `perawatan_tanaman`
--
ALTER TABLE `perawatan_tanaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanaman_id` (`tanaman_id`);

--
-- Indeks untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `panen`
--
ALTER TABLE `panen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perawatan_tanaman`
--
ALTER TABLE `perawatan_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `panen`
--
ALTER TABLE `panen`
  ADD CONSTRAINT `panen_ibfk_1` FOREIGN KEY (`tanaman_id`) REFERENCES `tanaman` (`id`);

--
-- Ketidakleluasaan untuk tabel `perawatan_tanaman`
--
ALTER TABLE `perawatan_tanaman`
  ADD CONSTRAINT `perawatan_tanaman_ibfk_1` FOREIGN KEY (`tanaman_id`) REFERENCES `tanaman` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
