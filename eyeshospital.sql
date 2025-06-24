-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2025 pada 11.18
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
-- Database: `eyeshospital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_jam`
--

CREATE TABLE `booking_jam` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `dokter_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking_jam`
--

INSERT INTO `booking_jam` (`id`, `user_id`, `dokter_id`, `tanggal`, `jam`, `status`) VALUES
(1, 9, 1, '2025-04-22', '08:00:00', 'confirmed'),
(2, 2, 8, '2025-04-23', '12:00:00', 'pending'),
(3, 2, 8, '2025-04-26', '16:00:00', 'canceled '),
(13, 2, 1, '2025-04-26', '07:18:00', 'Canceled'),
(14, 2, 8, '2025-04-25', '10:00:00', 'Confirmed'),
(15, 2, 1, '2025-04-30', '16:07:00', 'Confirmed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(10) NOT NULL,
  `dokter_id` int(10) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `dokter_id`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(2, 1, 'Rabu', '08:00:00', '14:00:00'),
(3, 8, 'Selasa', '12:00:00', '18:00:00'),
(4, 8, 'Jumat', '09:00:00', '16:00:00'),
(9, 1, 'Minggu', '09:00:00', '14:00:00'),
(12, 1, 'Senin', '20:09:00', '16:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'dr. Vicking Lee Sp.M', 'dokterini', 'cab2d8232139ee4f469a920732578f71', 'dokter'),
(2, 'Vebby Ardita', 'userini', '6ad14ba9986e3615423dfca256d04e3f', 'user'),
(3, 'Maharani Hihola', 'adminini', '0192023a7bbd73250516f069df18b500', 'admin'),
(8, 'Dr. Budi Prakoso', 'dokter', 'cab2d8232139ee4f469a920732578f71', 'dokter'),
(9, 'Rina Wijaya', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking_jam`
--
ALTER TABLE `booking_jam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id` (`dokter_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking_jam`
--
ALTER TABLE `booking_jam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking_jam`
--
ALTER TABLE `booking_jam`
  ADD CONSTRAINT `booking_jam_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_jam_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
