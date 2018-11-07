-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Nov 2018 pada 06.54
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nakertrans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_berita`
--

CREATE TABLE `detail_berita` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `isi_berita` text NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_berita`
--

CREATE TABLE `master_berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `gambar_utama` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_program`
--

CREATE TABLE `master_program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `sumber_data` varchar(255) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `kriteria_value` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `pencapaian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_slide`
--

CREATE TABLE `master_slide` (
  `id` int(11) NOT NULL,
  `caption_slide` text NOT NULL,
  `slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_spasial`
--

CREATE TABLE `master_spasial` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `data_source` varchar(255) NOT NULL,
  `grouping` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `tipe`, `program`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'Admin', '-', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'reza', 'External', 'program 1(test)', 'userreza', '4297f44b13955235245b2497399d7a93', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_berita`
--
ALTER TABLE `detail_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_berita`
--
ALTER TABLE `master_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_program`
--
ALTER TABLE `master_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_slide`
--
ALTER TABLE `master_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_spasial`
--
ALTER TABLE `master_spasial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_berita`
--
ALTER TABLE `detail_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `master_berita`
--
ALTER TABLE `master_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `master_program`
--
ALTER TABLE `master_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_slide`
--
ALTER TABLE `master_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_spasial`
--
ALTER TABLE `master_spasial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
