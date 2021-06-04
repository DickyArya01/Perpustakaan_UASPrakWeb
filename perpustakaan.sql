-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 04:42 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'Dicky Arya', 'dicky@email.com', 'c39f83ac49296d573ba35d0ef99beb12', 1),
(2, 'Anwar Sadad', 'sadad@email.com', '2a15bb6a66de5ce57bc55654f0be06b4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id` int(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `rekening` int(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id`, `nama`, `tanggal`, `email`, `rekening`, `level`) VALUES
(1, 'Dicky Arya', '2021-05-03', 'dicky@email.com', NULL, 1),
(2, 'Anwar Sadad', '2021-05-19', 'sadad@email.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_autor`
--

CREATE TABLE `data_autor` (
  `nama_autor` varchar(100) NOT NULL,
  `jenis` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_autor`
--

INSERT INTO `data_autor` (`nama_autor`, `jenis`) VALUES
('Tere Liye', 1),
('Mark Manson', 2),
('Putu Hendra Saputra', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `sinopsis` text NOT NULL,
  `harga_buku` double NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `id_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id`, `nama_buku`, `cover`, `file`, `sinopsis`, `harga_buku`, `id_jenis`, `id_buku`, `id_author`) VALUES
(25, 'Si Putih', 'cover/si putih.jpg', 'book/RPS Teosofi New.pdf', 'Buku Seri Bumi', 79000, 1, 9, 'Tere Liye'),
(26, 'Si Putih', 'cover/si putih.jpg', 'book/SAP QURAN HADIS TI.pdf', 'buku Seri Bumi', 79000, 1, 9, 'Tere Liye'),
(27, 'Struktur data', 'cover/struktur data.jpg', 'book/19650008_DickyAryaPratama_MetnumInterpolasi.pdf', 'Buku struktur Data', 130000, 3, 35, 'Putu Hendra Saputra'),
(28, 'Black arch', 'cover/blackarch.png', 'book/4539-9898-1-SM.pdf', 'i donno', 0, 3, 31, 'Putu Hendra Saputra'),
(29, 'Cara Bersikap Bodo Amat', 'cover/bodo amat.jpg', 'book/19650007_Desy Apriliyanti_Qurdist(A)_Makalah.pdf', 'BUKU tentang bodo amat', 65000, 2, 12, 'Mark Manson');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekening`
--

CREATE TABLE `data_rekening` (
  `id` int(255) NOT NULL,
  `rekening` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(10) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre`, `jenis`) VALUES
(1, 'Romance', 1),
(2, 'Fantasi', 1),
(3, 'Sci-fi', 1),
(4, 'Mistery', 1),
(5, 'Horror', 1),
(6, 'Komedi', 1),
(7, 'Sejarah', 1),
(8, 'Islami', 1),
(9, 'Petualangan', 1),
(10, 'Fiksi', 1),
(11, 'Non-Fiksi', 1),
(12, 'Inspirasi', 2),
(13, 'Motivasi', 2),
(14, 'Universitas', 3),
(15, 'SMA', 3),
(16, 'SMK', 3),
(17, 'MI', 3),
(18, 'SMP', 3),
(19, 'MTs', 3),
(20, 'SD', 3),
(21, 'TK', 3),
(22, 'Akuntansi', 3),
(23, 'Ekonomi', 3),
(24, 'Finance & Keuangan', 3),
(25, 'Investasi', 3),
(26, 'Manajemen & Kepemimpinan', 3),
(27, 'Pemasaran dan Penjualan', 3),
(28, 'Perilaku Organisasi', 3),
(29, 'Perpajakan', 3),
(30, 'Usaha kecil & kewirausahaan', 3),
(31, 'Aplikasi & Software', 3),
(32, 'Database', 3),
(33, 'Gambar & Design', 3),
(34, 'Hardware', 3),
(35, 'Ilmu Komputer', 3),
(36, 'Networking & Jaringan', 3),
(37, 'Programming', 3),
(38, 'Sistem Operasi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id` int(255) NOT NULL,
  `jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_buku`
--

INSERT INTO `jenis_buku` (`id`, `jenis`) VALUES
(1, 'novel'),
(2, 'pengembangan diri'),
(3, 'buku pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_level1` (`level`);

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_level` (`level`),
  ADD KEY `FK_rekening` (`rekening`);

--
-- Indexes for table `data_autor`
--
ALTER TABLE `data_autor`
  ADD PRIMARY KEY (`nama_autor`),
  ADD KEY `FK_jenis_auth` (`jenis`);

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jenis1` (`id_jenis`),
  ADD KEY `FK_author` (`id_author`),
  ADD KEY `FK_genre` (`id_buku`);

--
-- Indexes for table `data_rekening`
--
ALTER TABLE `data_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jenis` (`jenis`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_rekening`
--
ALTER TABLE `data_rekening`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `FK_level1` FOREIGN KEY (`level`) REFERENCES `level` (`id`);

--
-- Constraints for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD CONSTRAINT `FK_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `FK_rekening` FOREIGN KEY (`rekening`) REFERENCES `data_rekening` (`id`);

--
-- Constraints for table `data_autor`
--
ALTER TABLE `data_autor`
  ADD CONSTRAINT `FK_jenis_auth` FOREIGN KEY (`jenis`) REFERENCES `jenis_buku` (`id`);

--
-- Constraints for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD CONSTRAINT `FK_author` FOREIGN KEY (`id_author`) REFERENCES `data_autor` (`nama_autor`),
  ADD CONSTRAINT `FK_genre` FOREIGN KEY (`id_buku`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `FK_jenis1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_buku` (`id`);

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `FK_jenis` FOREIGN KEY (`jenis`) REFERENCES `jenis_buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
