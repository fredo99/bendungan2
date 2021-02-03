-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 14.02
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bendungan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturketinggian`
--

CREATE TABLE `aturketinggian` (
  `id` int(11) NOT NULL,
  `terbuka` float NOT NULL,
  `tertutup` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturketinggian`
--

INSERT INTO `aturketinggian` (`id`, `terbuka`, `tertutup`) VALUES
(1, 40, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturmanual`
--

CREATE TABLE `aturmanual` (
  `id` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturmanual`
--

INSERT INTO `aturmanual` (`id`, `status`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id_sensor` int(100) NOT NULL,
  `ketinggian` float NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id_sensor`, `ketinggian`, `tanggal`, `waktu`) VALUES
(875, 31, '2021-02-03', '12:05:58'),
(876, 15, '2021-02-03', '12:06:41'),
(877, 12, '2021-02-03', '12:07:07'),
(878, 30, '2021-02-02', '19:27:14'),
(879, 16, '2021-02-01', '17:04:05'),
(880, 12, '2021-02-01', '17:04:05'),
(881, 20, '2021-02-03', '20:04:05'),
(882, 0, '2021-02-03', '18:00:00'),
(883, 8, '2021-02-03', '16:00:00'),
(884, 1, '2021-02-03', '15:00:00'),
(885, 51, '2021-02-03', '21:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pintu`
--

CREATE TABLE `pintu` (
  `id_pintu` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pintu`
--

INSERT INTO `pintu` (`id_pintu`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenkel` int(1) NOT NULL,
  `no` char(12) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `email`, `password`, `alamat`, `jenkel`, `no`, `jabatan`) VALUES
('Fredo Situmorang', 'fmaurtino@gmail.com', 'test123', 'Jl.Merpati 2 no 4a Semarang', 1, '082137054816', 'Penjaga Bendungan'),
('Jos Gandos', 'josgandos@gmail.com', 'test123', 'jl.Sultan mah bebas no 1', 1, '08219674875', 'Penjaga Bendungan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturketinggian`
--
ALTER TABLE `aturketinggian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aturmanual`
--
ALTER TABLE `aturmanual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_sensor`);

--
-- Indeks untuk tabel `pintu`
--
ALTER TABLE `pintu`
  ADD PRIMARY KEY (`id_pintu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturketinggian`
--
ALTER TABLE `aturketinggian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aturmanual`
--
ALTER TABLE `aturmanual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_sensor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT untuk tabel `pintu`
--
ALTER TABLE `pintu`
  MODIFY `id_pintu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
