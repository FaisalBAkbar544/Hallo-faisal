-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 16 Jun 2025 pada 11.48
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
-- Database: `personalweb_faisalakbar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biography`
--

CREATE TABLE `biography` (
  `id_bio` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biography`
--

INSERT INTO `biography` (`id_bio`, `id_user`, `full_name`, `birth_place`, `birth_date`, `gender`, `phone`, `address`, `website`, `job_title`, `biography`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Faisal Akbar', 'Banjarmasin', '2003-04-15', 'Laki-laki', '08123456789', 'Jl. Pelajar, Banjarmasin', 'https://faisal.my.id', 'Mahasiswa', 'Saya adalah mahasiswa teknik informatika yang suka ngoding.', 'kontak1.png', '2025-06-13 10:05:02', '2025-06-13 15:44:34'),
(2, 2, 'John Doe', 'Jakarta', '1990-08-25', 'Laki-laki', '08211234567', 'Jl. Merdeka, Jakarta', 'https://johnsportfolio.com', 'Web Developer', 'Saya seorang pengembang web freelance.', 'john.jpg', '2025-06-13 10:05:02', '2025-06-13 10:05:02'),
(3, 3, 'Sari Putri', 'Bandung', '1995-07-10', 'Perempuan', '08561234567', 'Jl. Cibaduyut, Bandung', 'https://sari.my.id', 'UI/UX Designer', 'Saya fokus pada pengalaman pengguna dan antarmuka modern.', 'sari.jpg', '2025-06-13 10:05:02', '2025-06-13 10:05:02'),
(4, 4, 'Andi Nugraha', 'Surabaya', '1998-02-20', 'Laki-laki', '08991122334', 'Jl. Ahmad Yani, Surabaya', 'https://andinugraha.dev', 'Backend Developer', 'Saya membangun API dan sistem backend yang efisien.', 'andi.jpg', '2025-06-13 10:05:02', '2025-06-13 10:05:02'),
(5, 5, 'Nina Kartika', 'Yogyakarta', '2000-11-05', 'Perempuan', '08777665544', 'Jl. Kaliurang, Yogyakarta', 'https://ninakartika.com', 'Data Analyst', 'Saya suka mengolah data dan membuat dashboard.', 'nina.jpg', '2025-06-13 10:05:02', '2025-06-13 10:05:02'),
(6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tes', 'img2.jpeg', '2025-06-13 11:18:13', '2025-06-13 11:26:49'),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uln dari barabai', 'img2.jpeg', '2025-06-15 12:46:57', '2025-06-15 12:46:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_cont` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_cont`, `name`, `email`, `massage`) VALUES
(6, 'Muhammad Faisal Akbar', 'faisalakbar@gmail.com', 'I am interested in your computer science projects, and I would love to know more details about your AI research.'),
(7, 'Ical icul', 'icalicul@gmail.com', 'Can you share more information about the Smart Waste Sorting System? I would love to collaborate.'),
(8, 'Alexandria', 'alexandrian123@gmail.com', 'I am working on an IoT-based project and need advice on using Raspberry Pi for real-time data collection'),
(9, 'Akbar Ical', 'faisal.kdg77@gmail.com', 'I have a question regarding the mental health chatbot. How does it handle different languages?'),
(13, 'akbar akbir', 'akbarakbir@gmail.com', 'Could you provide more insight into how the smart helmet for bikers detects accidents?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disc_results`
--

CREATE TABLE `disc_results` (
  `id_result` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `most_d` int(11) DEFAULT NULL,
  `most_i` int(11) DEFAULT NULL,
  `most_s` int(11) DEFAULT NULL,
  `most_c` int(11) DEFAULT NULL,
  `least_d` int(11) DEFAULT NULL,
  `least_i` int(11) DEFAULT NULL,
  `least_s` int(11) DEFAULT NULL,
  `least_c` int(11) DEFAULT NULL,
  `change_d` int(11) DEFAULT NULL,
  `change_i` int(11) DEFAULT NULL,
  `change_s` int(11) DEFAULT NULL,
  `change_c` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `disc_results`
--

INSERT INTO `disc_results` (`id_result`, `id_user`, `most_d`, `most_i`, `most_s`, `most_c`, `least_d`, `least_i`, `least_s`, `least_c`, `change_d`, `change_i`, `change_s`, `change_c`, `created_at`) VALUES
(1, 8, 16, 3, 2, 3, 10, 11, 1, 2, 6, -8, 1, 1, '2025-06-16 00:23:23'),
(2, 8, 10, 4, 5, 5, 11, 4, 6, 3, -1, 0, -1, 2, '2025-06-16 00:29:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id_port` tinyint(2) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id_port`, `project_name`, `year`, `description`) VALUES
(1, 'IoT-Based Smart Irrigation', '2020', 'An automated irrigation system controlled via smartphone app using NodeMCU and soil moisture sensors.'),
(29, 'Smart Waste Sorting System with AI', '2023', 'A system that uses image classification and deep learning to sort organic and inorganic waste using a camera and Raspberry Pi.'),
(30, 'Mental Health Chatbot App', '2021', 'An Android chatbot application that uses NLP and sentiment analysis to respond to emotional input from users.'),
(31, 'Face Recognition Attendance System', '2020', 'A computer vision-based attendance system that uses OpenCV and Python to detect and record faces in real-time.'),
(32, 'Smart Helmet for Bikers', '2022', 'An IoT-powered helmet that detects accidents and sends emergency location data using GPS and GSM modules.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `name`, `created_at`) VALUES
(1, 'faisal', 'faisal@example.com', 'b67aaaf5e991b8aa6cdc7959a3c326a5', 'Muhammad Faisal Akbar', '2025-06-13 10:04:46'),
(2, 'john_doe', 'john@example.com', '6e0b7076126a29d5dfcbd54835387b7b', 'John Doe', '2025-06-13 10:04:46'),
(3, 'sari_putri', 'sari@example.com', 'e9ee75b57bb1303190c8869621cad05b', 'Sari Putri', '2025-06-13 10:04:46'),
(4, 'andi', 'andi@example.com', '03339dc0dff443f15c254baccde9bece', 'Andi Nugraha', '2025-06-13 10:04:46'),
(5, 'nina', 'nina@example.com', 'f599c58f684c33fd93036c0b33e99d8f', 'Nina Kartika', '2025-06-13 10:04:46'),
(7, 'faisal1', 'faisal.kdg77@gmail.com', '$2y$10$8uvlviCME74O1Oo2YTeWZ.Wqg04KOtEN8XPYTAQKyT2/QJJ42zo6W', 'faisal akbar', '2025-06-13 10:25:57'),
(8, 'aku1', 'aku1@gmail.com', '$2y$10$F0rlS9V39feFtD8Q2orRQeFwkyQtn3LSEpxJ8z9AFQ2vB3rKP9D2i', 'Muhammad Faisal Akbar', '2025-06-15 12:44:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biography`
--
ALTER TABLE `biography`
  ADD PRIMARY KEY (`id_bio`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_cont`);

--
-- Indeks untuk tabel `disc_results`
--
ALTER TABLE `disc_results`
  ADD PRIMARY KEY (`id_result`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_port`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biography`
--
ALTER TABLE `biography`
  MODIFY `id_bio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_cont` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `disc_results`
--
ALTER TABLE `disc_results`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_port` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `biography`
--
ALTER TABLE `biography`
  ADD CONSTRAINT `biography_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
