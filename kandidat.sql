-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2023 pada 06.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kandidat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`kategori`) VALUES
('Analyst'),
('Developer'),
('NonIT'),
('Support'),
('Tester');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cv`
--

CREATE TABLE `cv` (
  `id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` int(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `chanel` varchar(100) NOT NULL,
  `edukasi` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `ipk` float DEFAULT NULL,
  `pengalaman` int(11) NOT NULL,
  `kelulusan` enum('Lolos','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cv`
--

INSERT INTO `cv` (`id`, `tanggal`, `nama`, `telp`, `kategori`, `posisi`, `chanel`, `edukasi`, `institusi`, `jurusan`, `ipk`, `pengalaman`, `kelulusan`) VALUES
(1, '2023-01-13', 'Arya Naufal', 8512421, 'NonIT', 'Admin', 'Telkom', 'SMK', 'SMK Jaya', 'Teknik Komputer & Jaringan', 0, 0, 'Lolos'),
(2, '2023-01-24', 'Dzaky Taqwim', 8516123, 'Developer', 'Java', 'Facebook', 'Diploma2', 'Undip', 'Information System', 2.9, 0, 'Lolos'),
(3, '2023-01-31', 'Asep Yanto', 85739, 'Tester', 'Software', 'Karyawan', 'Sarjana1', 'Upj', 'System Computer', 2, 0, 'Tidak Lolos'),
(4, '2023-01-19', 'Andi buyung', 85921, 'Developer', 'Java', 'Facebook', 'SMK', 'Unpam', 'Teknik Komputer & Jaringan', 2.5, 3, 'Tidak Lolos'),
(5, '2023-01-20', 'Taqwim Santoso', 852156, 'Support', 'IT', 'Facebook', 'Diploma3', 'Budi Luhur', 'Information System', 2, 0, 'Tidak Lolos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `position`
--

CREATE TABLE `position` (
  `id` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `position`
--

INSERT INTO `position` (`id`, `kategori`, `posisi`) VALUES
(1, 'Developer', '.Net'),
(2, 'Developer', 'PHP'),
(3, 'Developer', 'Front End'),
(4, 'Developer', 'Back End'),
(5, 'Developer', 'Java'),
(6, 'Developer', 'Fullstack'),
(7, 'Developer', 'Mobile'),
(8, 'Developer', 'SQL'),
(9, 'Analyst', 'Business'),
(10, 'Analyst', 'Data'),
(11, 'Analyst', 'System'),
(12, 'Tester', 'Software'),
(13, 'Support', 'IT'),
(14, 'Support', 'Technical Writer'),
(15, 'Support', 'Impl.'),
(16, 'NonIT', 'Design Product'),
(17, 'NonIT', 'Sales Promotion'),
(18, 'NonIT', 'Marketing'),
(19, 'NonIT', 'HR Receuitment'),
(20, 'NonIT', 'Finance Leader'),
(21, 'NonIT', 'Admin'),
(22, 'Developer', 'Golang'),
(28, 'Tester', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD KEY `kategori` (`kategori`) USING BTREE;

--
-- Indeks untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `position` (`kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
