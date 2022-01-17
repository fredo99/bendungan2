-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2022 pada 14.28
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `terbuka` int(11) NOT NULL,
  `tertutup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturketinggian`
--

INSERT INTO `aturketinggian` (`id`, `terbuka`, `tertutup`) VALUES
(1, 3, 2);

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
-- Struktur dari tabel `datalog`
--

CREATE TABLE `datalog` (
  `id` int(11) NOT NULL,
  `jenisoperasi` int(11) NOT NULL,
  `posisipintu` int(11) NOT NULL,
  `pemicu` tinyint(1) NOT NULL,
  `terbuka` int(11) DEFAULT NULL,
  `tertutup` int(11) DEFAULT NULL,
  `ketinggianair` float DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datalog`
--

INSERT INTO `datalog` (`id`, `jenisoperasi`, `posisipintu`, `pemicu`, `terbuka`, `tertutup`, `ketinggianair`, `tanggal`, `waktu`) VALUES
(1, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:09:53'),
(2, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:10:00'),
(3, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:10:03'),
(4, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:10:29'),
(5, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:10:33'),
(6, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:10:41'),
(7, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:19:54'),
(8, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:20:02'),
(9, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:20:12'),
(10, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:20:15'),
(11, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:22:26'),
(12, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:22:38'),
(13, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:22:49'),
(14, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:22:53'),
(15, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:22:59'),
(16, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:23:05'),
(17, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:28:26'),
(18, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:28:29'),
(19, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:28:33'),
(20, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:28:37'),
(21, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:28:45'),
(22, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:28:49'),
(23, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:28:55'),
(24, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:29:14'),
(25, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:39:43'),
(26, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:39:49'),
(27, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:40:03'),
(28, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:40:07'),
(29, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:44:20'),
(30, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:44:41'),
(31, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:44:54'),
(32, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:45:04'),
(33, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:45:18'),
(34, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:45:26'),
(35, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:45:52'),
(36, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:47:17'),
(37, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:47:20'),
(38, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:47:28'),
(39, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:47:44'),
(40, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:47:50'),
(41, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:47:57'),
(42, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:48:16'),
(43, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:48:19'),
(44, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:50:01'),
(45, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:50:04'),
(46, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:50:14'),
(47, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:50:21'),
(48, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:50:26'),
(49, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:50:34'),
(50, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:50:41'),
(51, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:50:49'),
(52, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:50:57'),
(53, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:51:03'),
(54, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:54:03'),
(55, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:54:10'),
(56, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:54:21'),
(57, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:54:32'),
(58, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:54:34'),
(59, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:54:41'),
(60, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:54:47'),
(61, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:54:54'),
(62, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:54:58'),
(63, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:55:04'),
(64, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:55:12'),
(65, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:55:17'),
(66, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:55:24'),
(67, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:55:30'),
(68, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:57:28'),
(69, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:57:41'),
(70, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '11:57:46'),
(71, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '11:57:53'),
(72, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '11:57:59'),
(73, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:00:10'),
(74, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:00:14'),
(75, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:00:21'),
(76, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:00:26'),
(77, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:00:32'),
(78, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:00:43'),
(79, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:00:51'),
(80, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:00:57'),
(81, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:02:47'),
(82, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:02:51'),
(83, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:02:56'),
(84, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:03:03'),
(85, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:03:10'),
(86, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:03:16'),
(87, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:03:25'),
(88, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:03:33'),
(89, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:04:51'),
(90, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:05:12'),
(91, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:05:42'),
(92, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:05:48'),
(93, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:05:55'),
(94, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:06:01'),
(95, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:07:35'),
(96, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:07:58'),
(97, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:08:05'),
(98, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:08:11'),
(99, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:08:18'),
(100, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:08:27'),
(101, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:08:30'),
(102, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:08:36'),
(103, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:08:42'),
(104, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:08:47'),
(105, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:08:53'),
(106, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:08:59'),
(107, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:09:07'),
(108, 0, 1, 0, NULL, NULL, NULL, '2021-05-31', '12:09:13'),
(109, 0, 2, 0, NULL, NULL, NULL, '2021-05-31', '12:09:20'),
(110, 0, 0, 0, NULL, NULL, NULL, '2021-05-31', '12:09:27'),
(111, 1, 2, 1, 3, 1, 2, '2021-05-31', '12:24:34'),
(112, 1, 1, 1, 3, 1, 3, '2021-05-31', '12:25:22'),
(114, 1, 1, 1, 3, 1, 4, '2021-05-31', '12:25:38'),
(115, 1, 2, 1, 3, 1, 2, '2021-05-31', '12:25:50'),
(116, 1, 0, 1, 3, 1, 1, '2021-05-31', '12:26:02'),
(117, 1, 1, 1, 3, 1, 3, '2021-05-31', '12:26:43'),
(118, 1, 2, 1, 3, 1, 2, '2021-05-31', '12:26:55'),
(119, 1, 0, 1, 3, 1, 1, '2021-05-31', '12:27:13'),
(120, 1, 2, 1, 3, 1, 2, '2021-05-31', '12:29:06'),
(122, 1, 1, 1, 3, 1, 17, '2021-05-31', '12:30:12'),
(124, 1, 1, 1, 15, 10, 17, '2021-06-01', '09:23:21'),
(126, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:23:46'),
(127, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '09:23:50'),
(128, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:23:57'),
(129, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:24:04'),
(130, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '09:24:12'),
(131, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:24:18'),
(132, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:24:25'),
(133, 1, 2, 1, 3, 1, 2, '2021-06-01', '09:44:26'),
(134, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:44:38'),
(135, 1, 1, 1, 3, 1, 3, '2021-06-01', '09:45:51'),
(136, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:46:14'),
(137, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:46:27'),
(138, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '09:46:39'),
(139, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:46:46'),
(140, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:46:52'),
(141, 1, 1, 1, 3, 1, 3, '2021-06-01', '09:55:20'),
(142, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:56:02'),
(143, 1, 1, 1, 3, 1, 17, '2021-06-01', '09:56:17'),
(144, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:56:24'),
(145, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:56:41'),
(146, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '09:56:47'),
(147, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:56:53'),
(148, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '09:57:01'),
(149, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '09:57:07'),
(150, 1, 2, 1, 3, 1, 2, '2021-06-01', '09:57:59'),
(151, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:58:06'),
(152, 1, 2, 1, 3, 1, 2, '2021-06-01', '09:58:25'),
(153, 1, 1, 1, 3, 1, 3, '2021-06-01', '09:58:31'),
(154, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:58:40'),
(155, 1, 2, 1, 3, 1, 2, '2021-06-01', '09:58:46'),
(156, 1, 0, 1, 3, 1, 1, '2021-06-01', '09:58:52'),
(157, 1, 2, 1, 3, 1, 2, '2021-06-01', '10:00:48'),
(158, 1, 0, 1, 3, 1, 1, '2021-06-01', '10:01:52'),
(159, 1, 2, 1, 3, 1, 2, '2021-06-01', '10:02:05'),
(160, 1, 0, 1, 3, 1, 1, '2021-06-01', '10:02:17'),
(161, 1, 1, 1, 3, 1, 3, '2021-06-01', '10:04:28'),
(162, 1, 2, 1, 3, 1, 2, '2021-06-01', '10:04:40'),
(163, 1, 0, 1, 3, 1, 1, '2021-06-01', '10:04:47'),
(164, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '10:05:09'),
(165, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '10:05:17'),
(166, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '10:05:23'),
(167, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:05:29'),
(168, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '10:05:36'),
(169, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:05:43'),
(170, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '10:06:04'),
(171, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '10:06:12'),
(172, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:06:20'),
(173, 1, 1, 1, 3, 1, 3, '2021-06-01', '10:08:12'),
(174, 1, 2, 1, 3, 1, 2, '2021-06-01', '10:08:28'),
(175, 1, 0, 1, 3, 1, 1, '2021-06-01', '10:08:41'),
(176, 1, 1, 1, 3, 1, 17, '2021-06-01', '10:08:54'),
(177, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:09:02'),
(178, 0, 1, 0, NULL, NULL, NULL, '2021-06-01', '10:09:12'),
(179, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '10:09:17'),
(180, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:09:24'),
(181, 0, 2, 0, NULL, NULL, NULL, '2021-06-01', '10:09:30'),
(182, 0, 0, 0, NULL, NULL, NULL, '2021-06-01', '10:09:40'),
(183, 0, 1, 0, NULL, NULL, NULL, '2021-11-17', '23:28:44'),
(184, 0, 2, 0, NULL, NULL, NULL, '2021-11-17', '23:28:46'),
(185, 0, 0, 0, NULL, NULL, NULL, '2021-11-17', '23:28:47'),
(186, 0, 2, 0, NULL, NULL, NULL, '2021-11-17', '23:28:56');

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
(1, 17, '2021-06-01', '09:43:34'),
(2, 2, '2021-06-01', '09:43:40'),
(3, 2, '2021-06-01', '09:43:46'),
(4, 2, '2021-06-01', '09:43:52'),
(5, 2, '2021-06-01', '09:43:58'),
(6, 2, '2021-06-01', '09:44:09'),
(7, 2, '2021-06-01', '09:44:15'),
(8, 2, '2021-06-01', '09:44:21'),
(9, 2, '2021-06-01', '09:44:26'),
(10, 2, '2021-06-01', '09:44:32'),
(11, 1, '2021-06-01', '09:44:38'),
(12, 1, '2021-06-01', '09:44:45'),
(13, 1, '2021-06-01', '09:44:51'),
(14, 1, '2021-06-01', '09:44:57'),
(15, 1, '2021-06-01', '09:45:03'),
(16, 1, '2021-06-01', '09:45:10'),
(17, 17, '2021-06-01', '09:45:16'),
(18, 17, '2021-06-01', '09:45:23'),
(19, 17, '2021-06-01', '09:45:30'),
(20, 17, '2021-06-01', '09:45:38'),
(21, 17, '2021-06-01', '09:45:45'),
(22, 3, '2021-06-01', '09:45:51'),
(23, 3, '2021-06-01', '09:46:00'),
(24, 17, '2021-06-01', '09:46:06'),
(25, 1, '2021-06-01', '09:46:13'),
(26, 17, '2021-06-01', '09:46:19'),
(27, 1, '2021-06-01', '09:46:27'),
(28, 17, '2021-06-01', '09:46:34'),
(29, 17, '2021-06-01', '09:46:41'),
(30, 17, '2021-06-01', '09:46:49'),
(31, 17, '2021-06-01', '09:46:56'),
(32, 17, '2021-06-01', '09:47:03'),
(33, 17, '2021-06-01', '09:47:09'),
(34, 1, '2021-06-01', '09:47:15'),
(35, 1, '2021-06-01', '09:47:22'),
(36, 17, '2021-06-01', '09:47:29'),
(37, 17, '2021-06-01', '09:47:36'),
(38, 17, '2021-06-01', '09:47:43'),
(39, 17, '2021-06-01', '09:47:49'),
(40, 17, '2021-06-01', '09:47:56'),
(41, 17, '2021-06-01', '09:48:02'),
(42, 1, '2021-06-01', '09:48:08'),
(43, 17, '2021-06-01', '09:48:14'),
(44, 1, '2021-06-01', '09:48:21'),
(45, 17, '2021-06-01', '09:48:28'),
(46, 17, '2021-06-01', '09:48:34'),
(47, 1, '2021-06-01', '09:48:40'),
(48, 17, '2021-06-01', '09:48:46'),
(49, 1, '2021-06-01', '09:48:52'),
(50, 1, '2021-06-01', '09:48:57'),
(51, 2, '2021-06-01', '09:49:04'),
(52, 2, '2021-06-01', '09:49:10'),
(53, 2, '2021-06-01', '09:49:15'),
(54, 2, '2021-06-01', '09:49:21'),
(55, 2, '2021-06-01', '09:49:27'),
(56, 2, '2021-06-01', '09:49:32'),
(57, 1, '2021-06-01', '09:49:40'),
(58, 1, '2021-06-01', '09:49:45'),
(59, 1, '2021-06-01', '09:49:51'),
(60, 1, '2021-06-01', '09:49:57'),
(61, 1, '2021-06-01', '09:50:03'),
(62, 1, '2021-06-01', '09:50:08'),
(63, 1, '2021-06-01', '09:50:14'),
(64, 1, '2021-06-01', '09:50:21'),
(65, 1, '2021-06-01', '09:50:26'),
(66, 2, '2021-06-01', '09:50:32'),
(67, 1, '2021-06-01', '09:50:38'),
(68, 1, '2021-06-01', '09:50:44'),
(69, 2, '2021-06-01', '09:50:50'),
(70, 2, '2021-06-01', '09:50:57'),
(71, 2, '2021-06-01', '09:51:03'),
(72, 2, '2021-06-01', '09:51:08'),
(73, 1, '2021-06-01', '09:51:14'),
(74, 2, '2021-06-01', '09:51:20'),
(75, 1, '2021-06-01', '09:51:25'),
(76, 1, '2021-06-01', '09:51:32'),
(77, 1, '2021-06-01', '09:51:37'),
(78, 1, '2021-06-01', '09:51:43'),
(79, 1, '2021-06-01', '09:51:49'),
(80, 1, '2021-06-01', '09:51:55'),
(81, 1, '2021-06-01', '09:52:00'),
(82, 1, '2021-06-01', '09:52:06'),
(83, 1, '2021-06-01', '09:52:12'),
(84, 1, '2021-06-01', '09:52:17'),
(85, 1, '2021-06-01', '09:52:23'),
(86, 1, '2021-06-01', '09:52:29'),
(87, 1, '2021-06-01', '09:52:35'),
(88, 1, '2021-06-01', '09:52:41'),
(89, 1, '2021-06-01', '09:52:47'),
(90, 1, '2021-06-01', '09:52:52'),
(91, 1, '2021-06-01', '09:52:58'),
(92, 1, '2021-06-01', '09:53:04'),
(93, 1, '2021-06-01', '09:53:10'),
(94, 1, '2021-06-01', '09:53:15'),
(95, 1, '2021-06-01', '09:53:21'),
(96, 1, '2021-06-01', '09:53:26'),
(97, 1, '2021-06-01', '09:53:32'),
(98, 1, '2021-06-01', '09:53:38'),
(99, 1, '2021-06-01', '09:53:43'),
(100, 1, '2021-06-01', '09:53:49'),
(101, 1, '2021-06-01', '09:53:55'),
(102, 1, '2021-06-01', '09:54:00'),
(103, 1, '2021-06-01', '09:54:06'),
(104, 1, '2021-06-01', '09:54:12'),
(105, 1, '2021-06-01', '09:54:18'),
(106, 1, '2021-06-01', '09:54:24'),
(107, 1, '2021-06-01', '09:54:31'),
(108, 17, '2021-06-01', '09:54:39'),
(109, 17, '2021-06-01', '09:54:47'),
(110, 17, '2021-06-01', '09:54:54'),
(111, 17, '2021-06-01', '09:55:01'),
(112, 17, '2021-06-01', '09:55:07'),
(113, 17, '2021-06-01', '09:55:13'),
(114, 3, '2021-06-01', '09:55:20'),
(115, 4, '2021-06-01', '09:55:32'),
(116, 4, '2021-06-01', '09:55:40'),
(117, 17, '2021-06-01', '09:55:49'),
(118, 17, '2021-06-01', '09:55:56'),
(119, 1, '2021-06-01', '09:56:02'),
(120, 1, '2021-06-01', '09:56:09'),
(121, 17, '2021-06-01', '09:56:17'),
(122, 1, '2021-06-01', '09:56:24'),
(123, 1, '2021-06-01', '09:56:30'),
(124, 1, '2021-06-01', '09:56:37'),
(125, 17, '2021-06-01', '09:56:43'),
(126, 1, '2021-06-01', '09:56:49'),
(127, 1, '2021-06-01', '09:56:57'),
(128, 1, '2021-06-01', '09:57:03'),
(129, 1, '2021-06-01', '09:57:09'),
(130, 1, '2021-06-01', '09:57:16'),
(131, 1, '2021-06-01', '09:57:21'),
(132, 1, '2021-06-01', '09:57:27'),
(133, 1, '2021-06-01', '09:57:35'),
(134, 1, '2021-06-01', '09:57:40'),
(135, 1, '2021-06-01', '09:57:46'),
(136, 1, '2021-06-01', '09:57:53'),
(137, 2, '2021-06-01', '09:57:59'),
(138, 1, '2021-06-01', '09:58:06'),
(139, 1, '2021-06-01', '09:58:13'),
(140, 1, '2021-06-01', '09:58:19'),
(141, 2, '2021-06-01', '09:58:25'),
(142, 3, '2021-06-01', '09:58:31'),
(143, 1, '2021-06-01', '09:58:40'),
(144, 2, '2021-06-01', '09:58:46'),
(145, 1, '2021-06-01', '09:58:52'),
(146, 1, '2021-06-01', '09:58:58'),
(147, 1, '2021-06-01', '09:59:04'),
(148, 1, '2021-06-01', '09:59:10'),
(149, 1, '2021-06-01', '09:59:16'),
(150, 1, '2021-06-01', '09:59:23'),
(151, 1, '2021-06-01', '09:59:29'),
(152, 1, '2021-06-01', '09:59:36'),
(153, 1, '2021-06-01', '09:59:42'),
(154, 1, '2021-06-01', '09:59:48'),
(155, 1, '2021-06-01', '09:59:55'),
(156, 1, '2021-06-01', '10:00:01'),
(157, 1, '2021-06-01', '10:00:07'),
(158, 1, '2021-06-01', '10:00:13'),
(159, 1, '2021-06-01', '10:00:18'),
(160, 1, '2021-06-01', '10:00:25'),
(161, 1, '2021-06-01', '10:00:31'),
(162, 1, '2021-06-01', '10:00:36'),
(163, 1, '2021-06-01', '10:00:42'),
(164, 2, '2021-06-01', '10:00:48'),
(165, 2, '2021-06-01', '10:00:57'),
(166, 2, '2021-06-01', '10:01:02'),
(167, 2, '2021-06-01', '10:01:08'),
(168, 2, '2021-06-01', '10:01:14'),
(169, 2, '2021-06-01', '10:01:19'),
(170, 2, '2021-06-01', '10:01:27'),
(171, 2, '2021-06-01', '10:01:33'),
(172, 2, '2021-06-01', '10:01:38'),
(173, 2, '2021-06-01', '10:01:45'),
(174, 1, '2021-06-01', '10:01:52'),
(175, 1, '2021-06-01', '10:01:59'),
(176, 2, '2021-06-01', '10:02:05'),
(177, 2, '2021-06-01', '10:02:11'),
(178, 1, '2021-06-01', '10:02:17'),
(179, 1, '2021-06-01', '10:02:23'),
(180, 1, '2021-06-01', '10:02:29'),
(181, 1, '2021-06-01', '10:02:34'),
(182, 1, '2021-06-01', '10:02:40'),
(183, 1, '2021-06-01', '10:02:46'),
(184, 1, '2021-06-01', '10:02:52'),
(185, 1, '2021-06-01', '10:02:59'),
(186, 1, '2021-06-01', '10:03:05'),
(187, 1, '2021-06-01', '10:03:11'),
(188, 1, '2021-06-01', '10:03:16'),
(189, 1, '2021-06-01', '10:03:23'),
(190, 1, '2021-06-01', '10:03:29'),
(191, 2, '2021-06-01', '10:03:35'),
(192, 3, '2021-06-01', '10:03:41'),
(193, 3, '2021-06-01', '10:03:46'),
(194, 3, '2021-06-01', '10:03:54'),
(195, 5, '2021-06-01', '10:04:10'),
(196, 4, '2021-06-01', '10:04:16'),
(197, 4, '2021-06-01', '10:04:22'),
(198, 3, '2021-06-01', '10:04:28'),
(199, 4, '2021-06-01', '10:04:35'),
(200, 2, '2021-06-01', '10:04:40'),
(201, 1, '2021-06-01', '10:04:47'),
(202, 1, '2021-06-01', '10:04:54'),
(203, 17, '2021-06-01', '10:05:06'),
(204, 1, '2021-06-01', '10:05:12'),
(205, 1, '2021-06-01', '10:05:19'),
(206, 1, '2021-06-01', '10:05:25'),
(207, 1, '2021-06-01', '10:05:32'),
(208, 17, '2021-06-01', '10:05:39'),
(209, 17, '2021-06-01', '10:05:46'),
(210, 1, '2021-06-01', '10:05:52'),
(211, 1, '2021-06-01', '10:05:58'),
(212, 1, '2021-06-01', '10:06:03'),
(213, 1, '2021-06-01', '10:06:09'),
(214, 1, '2021-06-01', '10:06:18'),
(215, 1, '2021-06-01', '10:06:24'),
(216, 1, '2021-06-01', '10:06:30'),
(217, 1, '2021-06-01', '10:06:35'),
(218, 1, '2021-06-01', '10:06:42'),
(219, 1, '2021-06-01', '10:06:48'),
(220, 1, '2021-06-01', '10:06:54'),
(221, 1, '2021-06-01', '10:07:00'),
(222, 1, '2021-06-01', '10:07:06'),
(223, 1, '2021-06-01', '10:07:11'),
(224, 1, '2021-06-01', '10:07:17'),
(225, 2, '2021-06-01', '10:07:23'),
(226, 2, '2021-06-01', '10:07:29'),
(227, 3, '2021-06-01', '10:07:34'),
(228, 3, '2021-06-01', '10:07:40'),
(229, 3, '2021-06-01', '10:07:46'),
(230, 3, '2021-06-01', '10:07:53'),
(231, 4, '2021-06-01', '10:08:00'),
(232, 4, '2021-06-01', '10:08:05'),
(233, 3, '2021-06-01', '10:08:12'),
(234, 2, '2021-06-01', '10:08:28'),
(235, 1, '2021-06-01', '10:08:41'),
(236, 1, '2021-06-01', '10:08:48'),
(237, 17, '2021-06-01', '10:08:54'),
(238, 1, '2021-06-01', '10:09:02'),
(239, 17, '2021-06-01', '10:09:07'),
(240, 1, '2021-06-01', '10:09:14'),
(241, 1, '2021-06-01', '10:09:20'),
(242, 1, '2021-06-01', '10:09:26'),
(243, 1, '2021-06-01', '10:09:33'),
(244, 1, '2021-06-01', '10:09:40'),
(245, 1, '2021-06-01', '10:09:48'),
(246, 17, '2021-06-01', '10:09:54'),
(247, 1, '2021-06-01', '10:10:00'),
(248, 1, '2021-06-01', '10:10:05'),
(249, 1, '2021-06-01', '10:10:11'),
(250, 1, '2021-06-01', '10:10:17'),
(251, 1, '2021-06-01', '10:10:24'),
(252, 17, '2021-06-24', '13:37:36'),
(253, 17, '2021-06-24', '13:37:39'),
(254, 17, '2021-06-24', '13:37:42'),
(255, 17, '2021-06-24', '13:37:45'),
(256, 17, '2021-06-24', '13:37:49'),
(257, 17, '2021-06-24', '13:37:52'),
(258, 17, '2021-06-24', '13:37:55'),
(259, 17, '2021-06-24', '13:37:58'),
(260, 17, '2021-06-24', '13:38:01'),
(261, 17, '2021-06-24', '13:38:04'),
(262, 17, '2021-06-24', '13:38:07'),
(263, 17, '2021-06-24', '13:38:11'),
(264, 17, '2021-06-24', '13:38:14'),
(265, 17, '2021-06-24', '13:38:17'),
(266, 17, '2021-06-24', '13:38:20'),
(267, 17, '2021-06-24', '13:38:23'),
(268, 17, '2021-06-24', '13:38:37'),
(269, 17, '2021-06-24', '13:38:40'),
(270, 17, '2021-06-24', '13:38:43'),
(271, 17, '2021-06-24', '13:38:47'),
(272, 17, '2021-06-24', '13:38:50'),
(273, 17, '2021-06-24', '13:38:53'),
(274, 17, '2021-06-24', '13:38:56'),
(275, 17, '2021-06-24', '13:38:59'),
(276, 17, '2021-06-24', '13:39:03'),
(277, 17, '2021-06-24', '13:39:06'),
(278, 17, '2021-06-24', '13:39:09'),
(279, 17, '2021-06-24', '13:39:12'),
(280, 17, '2021-06-24', '13:39:15'),
(281, 17, '2021-06-24', '13:39:18'),
(282, 17, '2021-06-24', '13:39:22'),
(283, 17, '2021-06-24', '13:39:25'),
(284, 17, '2021-06-24', '13:39:28'),
(285, 17, '2021-06-24', '13:39:31'),
(286, 17, '2021-06-24', '13:39:35'),
(287, 2.11, '2021-06-24', '13:39:37'),
(288, 2.23, '2021-06-24', '13:39:39'),
(289, 2.26, '2021-06-24', '13:39:41'),
(290, 1.84, '2021-06-24', '13:39:43'),
(291, 2.23, '2021-06-24', '13:39:45'),
(292, 2.18, '2021-06-24', '13:39:48'),
(293, 2.18, '2021-06-24', '13:39:50'),
(294, 2.18, '2021-06-24', '13:39:52'),
(295, 2.19, '2021-06-24', '13:39:54'),
(296, 2.19, '2021-06-24', '13:39:57'),
(297, 2.18, '2021-06-24', '13:39:59'),
(298, 2.19, '2021-06-24', '13:40:01'),
(299, 2.19, '2021-06-24', '13:40:03'),
(300, 2.18, '2021-06-24', '13:40:05'),
(301, 2.18, '2021-06-24', '13:40:07'),
(302, 2.19, '2021-06-24', '13:40:10'),
(303, 2.13, '2021-06-24', '13:40:12'),
(304, 2.11, '2021-06-24', '13:40:14'),
(305, 2.13, '2021-06-24', '13:40:16'),
(306, 2.13, '2021-06-24', '13:40:18'),
(307, 2.11, '2021-06-24', '13:40:21'),
(308, 17, '2021-06-24', '13:40:24'),
(309, 1.99, '2021-06-24', '13:40:26'),
(310, 1.21, '2021-06-24', '13:40:28'),
(311, 2.65, '2021-06-24', '13:40:30'),
(312, 2.72, '2021-06-24', '13:40:32'),
(313, 3.43, '2021-06-24', '13:40:35'),
(314, 17, '2021-06-24', '13:40:38'),
(315, 2.98, '2021-06-24', '13:40:40'),
(316, 17, '2021-06-24', '13:40:43'),
(317, 2.47, '2021-06-24', '13:40:46'),
(318, 17, '2021-06-24', '13:40:50'),
(319, 2.47, '2021-06-24', '13:40:52'),
(320, 17, '2021-06-24', '13:40:55'),
(321, 2.43, '2021-06-24', '13:40:57'),
(322, 17, '2021-06-24', '13:41:00'),
(323, 2.35, '2021-06-24', '13:41:03'),
(324, 17, '2021-06-24', '13:41:06'),
(325, 17, '2021-06-24', '13:41:09'),
(326, 2.3, '2021-06-24', '13:41:11'),
(327, 17, '2021-06-24', '13:41:14'),
(328, 2.23, '2021-06-24', '13:41:16'),
(329, 17, '2021-06-24', '13:41:20'),
(330, 2.67, '2021-06-24', '13:41:22'),
(331, 17, '2021-06-24', '13:41:25'),
(332, 17, '2021-06-24', '13:41:28'),
(333, 17, '2021-06-24', '13:41:31'),
(334, 17, '2021-06-24', '13:41:34'),
(335, 17, '2021-06-24', '13:41:38'),
(336, 17, '2021-06-24', '13:41:41'),
(337, 17, '2021-06-24', '13:41:44'),
(338, 17, '2021-06-24', '13:41:47'),
(339, 17, '2021-06-24', '13:41:50'),
(340, 17, '2021-06-24', '13:41:53'),
(341, 17, '2021-06-24', '13:41:57'),
(342, 2.47, '2021-06-24', '13:41:59'),
(343, 17, '2021-06-24', '13:42:02'),
(344, 2.5, '2021-06-24', '13:42:04'),
(345, 2.5, '2021-06-24', '13:42:06'),
(346, 2.84, '2021-06-24', '13:42:09'),
(347, 17, '2021-06-24', '13:42:12'),
(348, 2.81, '2021-06-24', '13:42:14'),
(349, 2.84, '2021-06-24', '13:42:16'),
(350, 2.38, '2021-06-24', '13:42:18'),
(351, 2.35, '2021-06-24', '13:42:21'),
(352, 17, '2021-06-24', '13:42:24'),
(353, 2.38, '2021-06-24', '13:42:26'),
(354, 2.77, '2021-06-24', '13:42:28'),
(355, 2.3, '2021-06-24', '13:42:31'),
(356, 2.3, '2021-06-24', '13:42:33'),
(357, 17, '2021-06-24', '13:42:36'),
(358, 2.31, '2021-06-24', '13:42:38'),
(359, 17, '2021-06-24', '13:42:41'),
(360, 2.26, '2021-06-24', '13:42:43'),
(361, 17, '2021-06-24', '13:42:47'),
(362, 1.77, '2021-06-24', '13:42:49'),
(363, 2.19, '2021-06-24', '13:42:51'),
(364, 17, '2021-06-24', '13:42:54'),
(365, 17, '2021-06-24', '13:42:57'),
(366, 2.11, '2021-06-24', '13:43:00'),
(367, 2.11, '2021-06-24', '13:43:02'),
(368, 3.21, '2021-06-24', '13:43:04'),
(369, 17, '2021-06-24', '13:43:07'),
(370, 2.84, '2021-06-24', '13:43:09'),
(371, 17, '2021-06-24', '13:43:13'),
(372, 2.47, '2021-06-24', '13:43:15'),
(373, 2.47, '2021-06-24', '13:43:17'),
(374, 17, '2021-06-24', '13:43:20'),
(375, 17, '2021-06-24', '13:43:23'),
(376, 2.5, '2021-06-24', '13:43:25'),
(377, 2.5, '2021-06-24', '13:43:28'),
(378, 17, '2021-06-24', '13:43:31'),
(379, 17, '2021-06-24', '13:43:34'),
(380, 2.86, '2021-06-24', '13:43:36'),
(381, 2.84, '2021-06-24', '13:43:38'),
(382, 17, '2021-06-24', '13:43:41'),
(383, 2.43, '2021-06-24', '13:43:44'),
(384, 17, '2021-06-24', '13:43:47'),
(385, 2.38, '2021-06-24', '13:43:49'),
(386, 2.77, '2021-06-24', '13:43:51'),
(387, 17, '2021-06-24', '13:43:54'),
(388, 17, '2021-06-24', '13:43:58'),
(389, 2.3, '2021-06-24', '13:44:00'),
(390, 17, '2021-06-24', '13:44:03'),
(391, 2.3, '2021-06-24', '13:44:05'),
(392, 17, '2021-06-24', '13:44:08'),
(393, 1.82, '2021-06-24', '13:44:11'),
(394, 17, '2021-06-24', '13:44:14'),
(395, 2.23, '2021-06-24', '13:44:16'),
(396, 2.26, '2021-06-24', '13:44:18'),
(397, 17, '2021-06-24', '13:44:21'),
(398, 1.75, '2021-06-24', '13:44:24'),
(399, 17, '2021-06-24', '13:44:27'),
(400, 1.72, '2021-06-24', '13:44:29'),
(401, 17, '2021-06-24', '13:44:32'),
(402, 1.7, '2021-06-24', '13:44:34'),
(403, 17, '2021-06-24', '13:44:37'),
(404, 2.11, '2021-06-24', '13:44:40'),
(405, 2.11, '2021-06-24', '13:44:42'),
(406, 2.11, '2021-06-24', '13:44:44'),
(407, 17, '2021-06-24', '13:44:47'),
(408, 2.06, '2021-06-24', '13:44:49'),
(409, 2.06, '2021-06-24', '13:44:52'),
(410, 17, '2021-06-24', '13:44:55'),
(411, 2.06, '2021-06-24', '13:44:57'),
(412, 17, '2021-06-24', '13:45:00'),
(413, 2.06, '2021-06-24', '13:45:02'),
(414, 17, '2021-06-24', '13:45:05'),
(415, 2.06, '2021-06-24', '13:45:08'),
(416, 17, '2021-06-24', '13:45:11'),
(417, 1.99, '2021-06-24', '13:45:13'),
(418, 2.41, '2021-06-24', '13:45:15'),
(419, 2.84, '2021-06-24', '13:45:18'),
(420, 17, '2021-06-24', '13:45:21'),
(421, 2.13, '2021-06-24', '13:45:23'),
(422, 2.53, '2021-06-24', '13:45:25'),
(423, 17, '2021-06-24', '13:45:28'),
(424, 17, '2021-06-24', '13:45:31'),
(425, 17, '2021-06-24', '13:45:35'),
(426, 17, '2021-06-24', '13:45:38'),
(427, 17, '2021-06-24', '13:45:41'),
(428, 17, '2021-06-24', '13:45:44'),
(429, 3.01, '2021-06-24', '13:45:46'),
(430, 17, '2021-06-24', '13:45:50'),
(431, 17, '2021-06-24', '13:45:53'),
(432, 3.09, '2021-06-24', '13:45:55'),
(433, 3.55, '2021-06-24', '13:45:57'),
(434, 17, '2021-06-24', '13:46:00'),
(435, 3.03, '2021-06-24', '13:46:02'),
(436, 17, '2021-06-24', '13:46:06'),
(437, 2.96, '2021-06-24', '13:46:08'),
(438, 17, '2021-06-24', '13:46:11'),
(439, 2.98, '2021-06-24', '13:46:13'),
(440, 17, '2021-06-24', '13:46:16'),
(441, 3.31, '2021-06-24', '13:46:19'),
(442, 17, '2021-06-24', '13:46:22'),
(443, 3.25, '2021-06-24', '13:46:24'),
(444, 17, '2021-06-24', '13:46:27'),
(445, 3.69, '2021-06-24', '13:46:29'),
(446, 17, '2021-06-24', '13:46:33'),
(447, 3.2, '2021-06-24', '13:46:35'),
(448, 17, '2021-06-24', '13:46:38'),
(449, 3.18, '2021-06-24', '13:46:40'),
(450, 17, '2021-06-24', '13:46:43'),
(451, 17, '2021-06-24', '13:46:46'),
(452, 2.72, '2021-06-24', '13:46:49'),
(453, 17, '2021-06-24', '13:46:52'),
(454, 2.65, '2021-06-24', '13:46:54'),
(455, 17, '2021-06-24', '13:46:57'),
(456, 17, '2021-06-24', '13:47:00'),
(457, 17, '2021-06-24', '13:47:04'),
(458, 17, '2021-06-24', '13:47:07'),
(459, 2.92, '2021-06-24', '13:47:09'),
(460, 17, '2021-06-24', '13:47:12'),
(461, 2.89, '2021-06-24', '13:47:14'),
(462, 17, '2021-06-24', '13:47:18'),
(463, 2.89, '2021-06-24', '13:47:20'),
(464, 17, '2021-06-24', '13:47:23'),
(465, 2.89, '2021-06-24', '13:47:25'),
(466, 17, '2021-06-24', '13:47:28'),
(467, 17, '2021-06-24', '13:47:31'),
(468, 3.25, '2021-06-24', '13:47:34'),
(469, 3.25, '2021-06-24', '13:47:43'),
(470, 17, '2021-06-24', '13:47:46'),
(471, 17, '2021-06-24', '13:47:49'),
(472, 17, '2021-06-24', '13:47:52'),
(473, 2.77, '2021-06-24', '13:47:55'),
(474, 17, '2021-06-24', '13:47:58'),
(475, 17, '2021-06-24', '13:48:01'),
(476, 2.3, '2021-06-24', '13:48:03'),
(477, 17, '2021-06-24', '13:48:06'),
(478, 17, '2021-06-24', '13:48:10'),
(480, 17, '2021-06-24', '13:48:15'),
(482, 17, '2021-06-24', '13:48:20'),
(484, 17, '2021-06-24', '13:48:26'),
(486, 17, '2021-06-24', '13:48:31'),
(488, 17, '2021-06-24', '13:48:37'),
(489, 17, '2021-06-24', '13:48:40'),
(490, 17, '2021-06-24', '13:48:43'),
(491, 17, '2021-06-24', '13:48:46'),
(492, 17, '2021-06-24', '13:48:49'),
(493, 17, '2021-06-24', '13:48:53'),
(495, 17, '2021-06-24', '13:48:58'),
(496, 17, '2021-06-24', '13:49:01'),
(497, 17, '2021-06-24', '13:49:04'),
(498, 17, '2021-06-24', '13:49:07'),
(500, 17, '2021-06-24', '13:49:13');

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
(1, 2);

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
('Fredo Maurtino', 'fmaurtino@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'Jl.merpati 2 no 4a RT 07 RW 09', 1, '082137054817', 'Penjaga Bendungan'),
('Jos Gandos', 'josgandos@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'jl.Sultan mah bebas no 1', 1, '08219674875', 'Penjaga Bendungan');

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
-- Indeks untuk tabel `datalog`
--
ALTER TABLE `datalog`
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
-- AUTO_INCREMENT untuk tabel `datalog`
--
ALTER TABLE `datalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_sensor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT untuk tabel `pintu`
--
ALTER TABLE `pintu`
  MODIFY `id_pintu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
