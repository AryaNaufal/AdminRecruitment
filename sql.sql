-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 06.17
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
('Software'),
('Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `channel`
--

CREATE TABLE `channel` (
  `id` int(50) NOT NULL,
  `nama_ch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `channel`
--

INSERT INTO `channel` (`id`, `nama_ch`) VALUES
(1, 'Fb'),
(2, 'Twitter'),
(3, 'Instagram'),
(4, 'Linked In'),
(5, 'Indeed'),
(6, 'Jora'),
(7, 'Jooble'),
(8, 'FindITGeek'),
(9, 'Karyawan K5'),
(10, 'Jobstreet'),
(13, 'Glints');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cv`
--

CREATE TABLE `cv` (
  `id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `chanel` varchar(100) NOT NULL,
  `edukasi` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `ipk` float DEFAULT NULL,
  `pengalaman` int(11) NOT NULL,
  `kelulusan` enum('Lolos','Tidak Lolos') NOT NULL,
  `status` varchar(50) NOT NULL,
  `file_cv` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

CREATE TABLE `education` (
  `edukasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `education`
--

INSERT INTO `education` (`edukasi`) VALUES
('Diploma 1'),
('Diploma 2'),
('Diploma 3'),
('Diploma 4'),
('Sarjana 1'),
('Sarjana 2'),
('Sarjana 3'),
('SMA'),
('SMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `histori` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `major`
--

CREATE TABLE `major` (
  `id` int(20) NOT NULL,
  `edukasi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `major`
--

INSERT INTO `major` (`id`, `edukasi`, `jurusan`) VALUES
(1, 'SMA', 'IPA'),
(2, 'SMA', 'IPS'),
(3, 'SMK', 'Teknik Komputer & Jaringan'),
(4, 'SMK', 'Rekayasa Perangkat Lunak'),
(7, 'Diploma 1', 'Teknik Industri'),
(8, 'Diploma 1', 'Information Technology'),
(9, 'Diploma 1', 'Teknik Elektro'),
(10, 'Diploma 1', 'MIPA'),
(11, 'Diploma 1', 'Accounting'),
(12, 'Diploma 1', 'Management'),
(13, 'Diploma 2', 'Teknik Industri'),
(14, 'Diploma 2', 'Information Technology'),
(15, 'Diploma 2', 'Teknik Elektro'),
(16, 'Diploma 2', 'MIPA'),
(17, 'Diploma 2', 'Accounting'),
(18, 'Diploma 2', 'Management'),
(19, 'Diploma 3', 'Teknik Industri'),
(20, 'Diploma 3', 'Information Technology'),
(21, 'Diploma 3', 'Teknik Elektro'),
(22, 'Diploma 3', 'MIPA'),
(23, 'Diploma 3', 'Accounting'),
(24, 'Diploma 3', 'Management'),
(25, 'Diploma 4', 'Teknik Industri'),
(26, 'Diploma 4', 'Information Technology'),
(27, 'Diploma 4', 'Teknik Elektro'),
(28, 'Diploma 4', 'MIPA'),
(29, 'Diploma 4', 'Accounting'),
(30, 'Diploma 4', 'Management'),
(31, 'Sarjana 1', 'Teknik Industri'),
(32, 'Sarjana 1', 'Information Technology'),
(33, 'Sarjana 1', 'Teknik Elektro'),
(34, 'Sarjana 1', 'MIPA'),
(35, 'Sarjana 1', 'Psychology'),
(36, 'Sarjana 1', 'Accounting'),
(37, 'Sarjana 1', 'Management'),
(38, 'Sarjana 2', 'Teknik Industri'),
(39, 'Sarjana 2', 'Information Technology'),
(40, 'Sarjana 2', 'Teknik Elektro'),
(41, 'Sarjana 2', 'MIPA'),
(42, 'Sarjana 2', 'Psychology'),
(43, 'Sarjana 2', 'Accounting'),
(44, 'Sarjana 2', 'Management'),
(45, 'Sarjana 1', 'Applied Science'),
(46, 'Sarjana 1', 'Mechanical Engineering'),
(47, 'Sarjana 3', 'Teknik Industri'),
(48, 'Sarjana 3', 'Information Technology'),
(49, 'Sarjana 3', 'Teknik Elektro'),
(50, 'Sarjana 3', 'MIPA'),
(51, 'Sarjana 3', 'Psychology'),
(52, 'Sarjana 3', 'Accounting'),
(53, 'Sarjana 3', 'Management'),
(54, 'Sarjana 1', 'Teknik Mesin');

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
(4, 'Developer', 'Back End/Golang'),
(5, 'Developer', 'Java'),
(6, 'Developer', 'Fullstack'),
(7, 'Developer', 'Mobile'),
(8, 'Developer', 'SQL'),
(14, 'Support', 'Technical Writer'),
(15, 'Support', 'Implementation'),
(16, 'NonIT', 'Design Product'),
(17, 'NonIT', 'Sales Promotion'),
(18, 'NonIT', 'Marketing'),
(19, 'NonIT', 'HR Recruitment'),
(20, 'NonIT', 'Finance Leader'),
(21, 'NonIT', 'Admin'),
(29, 'NonIT', 'DataBase Administrator'),
(30, 'Support', 'IT Project Admin'),
(32, 'Support', 'IT Web Admin'),
(33, 'Software', 'Tester Manual'),
(34, 'Software', 'Tester Automation'),
(35, 'Support', 'Technical Support'),
(67, 'Analyst', 'Bussiness Analyst'),
(70, 'Analyst', 'Sistem Analyst');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `role_id` varchar(100) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD KEY `kategori` (`kategori`) USING BTREE;

--
-- Indeks untuk tabel `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `education`
--
ALTER TABLE `education`
  ADD KEY `edukasi` (`edukasi`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edukasi` (`edukasi`);

--
-- Indeks untuk tabel `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `major`
--
ALTER TABLE `major`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `position` (`kategori`);

--
-- Ketidakleluasaan untuk tabel `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`edukasi`) REFERENCES `major` (`edukasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
