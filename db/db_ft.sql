-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 07:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ft`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id_aturan` int(10) NOT NULL,
  `id_keputusan` int(10) DEFAULT NULL,
  `nama_aturan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id_aturan`, `id_keputusan`, `nama_aturan`) VALUES
(1, 1, 'R1'),
(2, 1, 'R2'),
(3, 1, 'R3'),
(4, 1, 'R4'),
(5, 1, 'R5'),
(6, 1, 'R6'),
(7, 1, 'R7'),
(8, 2, 'R8'),
(9, 1, 'R9'),
(10, 1, 'R10'),
(11, 1, 'R11'),
(12, 2, 'R12'),
(13, 1, 'R13'),
(14, 2, 'R14'),
(15, 2, 'R15'),
(16, 3, 'R16'),
(17, 1, 'R17'),
(18, 1, 'R18'),
(19, 1, 'R19'),
(20, 2, 'R20'),
(21, 1, 'R21'),
(22, 2, 'R22'),
(23, 2, 'R23'),
(24, 3, 'R24'),
(25, 1, 'R25'),
(26, 2, 'R26'),
(27, 2, 'R27'),
(28, 3, 'R28'),
(29, 2, 'R29'),
(30, 3, 'R30'),
(31, 3, 'R31'),
(32, 3, 'R32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_aturan`
--

CREATE TABLE `tbl_detail_aturan` (
  `id_detail_aturan` int(10) NOT NULL,
  `id_aturan` int(10) DEFAULT NULL,
  `id_himpunan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_detail_aturan`
--

INSERT INTO `tbl_detail_aturan` (`id_detail_aturan`, `id_aturan`, `id_himpunan`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 1, 7),
(5, 1, 9),
(6, 2, 1),
(7, 2, 3),
(8, 2, 5),
(9, 2, 7),
(10, 2, 10),
(11, 3, 1),
(12, 3, 3),
(13, 3, 5),
(14, 3, 8),
(15, 3, 9),
(16, 4, 1),
(17, 4, 3),
(18, 4, 5),
(19, 4, 8),
(20, 4, 10),
(21, 5, 1),
(22, 5, 3),
(23, 5, 6),
(24, 5, 7),
(25, 5, 9),
(26, 6, 1),
(27, 6, 3),
(28, 6, 6),
(29, 6, 7),
(30, 6, 10),
(31, 7, 1),
(32, 7, 3),
(33, 7, 6),
(34, 7, 8),
(35, 7, 9),
(36, 8, 1),
(37, 8, 3),
(38, 8, 6),
(39, 8, 8),
(40, 8, 10),
(41, 9, 1),
(42, 9, 4),
(43, 9, 5),
(44, 9, 7),
(45, 9, 9),
(46, 10, 1),
(47, 10, 4),
(48, 10, 5),
(49, 10, 7),
(50, 10, 10),
(51, 11, 1),
(52, 11, 4),
(53, 11, 5),
(54, 11, 8),
(55, 11, 9),
(56, 12, 1),
(57, 12, 4),
(58, 12, 5),
(59, 12, 8),
(60, 12, 10),
(61, 13, 1),
(62, 13, 4),
(63, 13, 6),
(64, 13, 7),
(65, 13, 9),
(66, 14, 1),
(67, 14, 4),
(68, 14, 6),
(69, 14, 7),
(70, 14, 10),
(71, 15, 1),
(72, 15, 4),
(73, 15, 6),
(74, 15, 8),
(75, 15, 9),
(76, 16, 1),
(77, 16, 4),
(78, 16, 6),
(79, 16, 8),
(80, 16, 10),
(81, 17, 2),
(82, 17, 3),
(83, 17, 5),
(84, 17, 7),
(85, 17, 9),
(86, 18, 2),
(87, 18, 3),
(88, 18, 5),
(89, 18, 7),
(90, 18, 10),
(91, 19, 2),
(92, 19, 3),
(93, 19, 5),
(94, 19, 8),
(95, 19, 9),
(96, 20, 2),
(97, 20, 3),
(98, 20, 5),
(99, 20, 8),
(100, 20, 10),
(101, 21, 2),
(102, 21, 3),
(103, 21, 6),
(104, 21, 7),
(105, 21, 9),
(106, 22, 2),
(107, 22, 3),
(108, 22, 6),
(109, 22, 7),
(110, 22, 10),
(111, 23, 2),
(112, 23, 3),
(113, 23, 6),
(114, 23, 8),
(115, 23, 9),
(116, 24, 2),
(117, 24, 3),
(118, 24, 6),
(119, 24, 8),
(120, 24, 10),
(121, 25, 2),
(122, 25, 4),
(123, 25, 5),
(124, 25, 7),
(125, 25, 9),
(126, 26, 2),
(127, 26, 4),
(128, 26, 5),
(129, 26, 7),
(130, 26, 10),
(131, 27, 2),
(132, 27, 4),
(133, 27, 5),
(134, 27, 8),
(135, 27, 9),
(136, 28, 2),
(137, 28, 4),
(138, 28, 5),
(139, 28, 8),
(140, 28, 10),
(141, 29, 2),
(142, 29, 4),
(143, 29, 6),
(144, 29, 7),
(145, 29, 9),
(146, 30, 2),
(147, 30, 4),
(148, 30, 6),
(149, 30, 7),
(150, 30, 10),
(151, 31, 2),
(152, 31, 4),
(153, 31, 6),
(154, 31, 8),
(155, 31, 9),
(156, 32, 2),
(157, 32, 4),
(158, 32, 6),
(159, 32, 8),
(160, 32, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deteksi`
--

CREATE TABLE `tbl_deteksi` (
  `id_deteksi` int(10) NOT NULL,
  `id_riwayat` int(10) DEFAULT NULL,
  `id_gejala` int(10) DEFAULT NULL,
  `data_deteksi` int(10) DEFAULT NULL,
  `all_sub_gejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_deteksi`
--

INSERT INTO `tbl_deteksi` (`id_deteksi`, `id_riwayat`, `id_gejala`, `data_deteksi`, `all_sub_gejala`) VALUES
(1, 1, 0, 1, NULL),
(2, 1, 1, 2, NULL),
(3, 1, 2, 1, NULL),
(4, 1, 3, 1, NULL),
(5, 1, 4, 0, NULL),
(6, 2, 0, 3, NULL),
(7, 2, 1, 2, NULL),
(8, 2, 2, 1, NULL),
(9, 2, 3, 1, NULL),
(10, 2, 4, 1, NULL),
(11, 3, 0, 6, NULL),
(12, 3, 1, 2, NULL),
(13, 3, 2, 1, NULL),
(14, 3, 3, 1, NULL),
(15, 3, 4, 1, NULL),
(16, 4, 0, 3, NULL),
(17, 4, 1, 3, NULL),
(18, 4, 2, 1, NULL),
(19, 4, 3, 0, NULL),
(20, 4, 4, 0, NULL),
(31, 7, 0, 3, NULL),
(32, 7, 1, 3, NULL),
(33, 7, 2, 1, NULL),
(34, 7, 3, 0, NULL),
(35, 7, 4, 0, NULL),
(36, 8, 0, 4, NULL),
(37, 8, 1, 3, NULL),
(38, 8, 2, 1, NULL),
(39, 8, 3, 0, NULL),
(40, 8, 4, 1, NULL),
(41, 9, 0, 4, NULL),
(42, 9, 1, 4, NULL),
(43, 9, 2, 1, NULL),
(44, 9, 3, 1, NULL),
(45, 9, 4, 0, NULL),
(46, 10, 0, 5, NULL),
(47, 10, 1, 4, NULL),
(48, 10, 2, 1, NULL),
(49, 10, 3, 1, NULL),
(50, 10, 4, 1, NULL),
(51, 11, 0, 3, NULL),
(52, 11, 1, 3, NULL),
(53, 11, 2, 1, NULL),
(54, 11, 3, 0, NULL),
(55, 11, 4, 0, NULL),
(56, 12, 0, 3, NULL),
(57, 12, 1, 4, NULL),
(58, 12, 2, 1, NULL),
(59, 12, 3, 1, NULL),
(60, 12, 4, 0, NULL),
(61, 13, 0, 4, NULL),
(62, 13, 1, 3, NULL),
(63, 13, 2, 1, NULL),
(64, 13, 3, 0, NULL),
(65, 13, 4, 1, NULL),
(66, 14, 0, 4, NULL),
(67, 14, 1, 4, NULL),
(68, 14, 2, 1, NULL),
(69, 14, 3, 1, NULL),
(70, 14, 4, 0, NULL),
(71, 15, 0, 3, NULL),
(72, 15, 1, 3, NULL),
(73, 15, 2, 1, NULL),
(74, 15, 3, 0, NULL),
(75, 15, 4, 0, NULL),
(76, 16, 0, 3, NULL),
(77, 16, 1, 3, NULL),
(78, 16, 2, 1, NULL),
(79, 16, 3, 0, NULL),
(80, 16, 4, 0, NULL),
(81, 17, 0, 3, NULL),
(82, 17, 1, 2, NULL),
(83, 17, 2, 1, NULL),
(84, 17, 3, 0, NULL),
(85, 17, 4, 0, NULL),
(86, 18, 0, 3, NULL),
(87, 18, 1, 3, NULL),
(88, 18, 2, 1, NULL),
(89, 18, 3, 0, NULL),
(90, 18, 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deteksi_string`
--

CREATE TABLE `tbl_deteksi_string` (
  `id_deteksi_string` int(10) NOT NULL,
  `id_riwayat` int(10) DEFAULT NULL,
  `id_gejala` int(10) DEFAULT NULL,
  `all_sub_gejala` varchar(255) DEFAULT NULL,
  `data_deteksi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_deteksi_string`
--

INSERT INTO `tbl_deteksi_string` (`id_deteksi_string`, `id_riwayat`, `id_gejala`, `all_sub_gejala`, `data_deteksi`) VALUES
(1, 1, 0, 'Mual', 0),
(2, 1, 1, 'Demam, Pusing', 0),
(3, 1, 2, 'Kuning', 0),
(4, 1, 3, 'Kuning', 0),
(5, 1, 4, 'Normal', 0),
(6, 2, 0, 'Mual, Diare, Nyeri perut bagian sebelah kanan', 1),
(7, 2, 1, 'Demam, Batuk', 1),
(8, 2, 2, 'Kuning', 1),
(9, 2, 3, 'Kuning', 1),
(10, 2, 4, 'Nyeri', 1),
(11, 3, 0, 'Mual, Muntah, Nyeri perut bagian sebelah kanan, Nafsu makan berkurang, Urin gelap, Feses pucat', 1),
(12, 3, 1, 'Lesu, Berat badan menurun', 1),
(13, 3, 2, 'Kuning', 1),
(14, 3, 3, 'Kuning', 1),
(15, 3, 4, 'Nyeri', 1),
(16, 4, 0, 'Mual, Muntah, Nafsu makan berkurang', 0),
(17, 4, 1, 'Demam, Lesu, Berat badan menurun', 0),
(18, 4, 2, 'Kuning', 0),
(19, 4, 3, 'Normal', 0),
(20, 4, 4, 'Normal', 0),
(31, 7, 0, 'Mual, Diare, Feses pucat', 0),
(32, 7, 1, 'Lesu, Myalgia (Nyeri otot), Berat badan menurun', 0),
(33, 7, 2, 'Kuning', 0),
(34, 7, 3, 'Normal', 0),
(35, 7, 4, 'Normal', 0),
(36, 8, 0, 'Muntah, Diare, Nafsu makan berkurang, Urin gelap', 1),
(37, 8, 1, 'Lesu, Myalgia (Nyeri otot), Berat badan menurun', 1),
(38, 8, 2, 'Kuning', 1),
(39, 8, 3, 'Normal', 1),
(40, 8, 4, 'Nyeri', 1),
(41, 9, 0, 'Diare, Nafsu makan berkurang, Perut membuncit, Feses pucat', 0),
(42, 9, 1, 'Batuk, Lesu, Lelah, Myalgia (Nyeri otot)', 0),
(43, 9, 2, 'Kuning', 0),
(44, 9, 3, 'Kuning', 0),
(45, 9, 4, 'Normal', 0),
(46, 10, 0, 'Mual, Diare, Nyeri perut bagian sebelah kanan, Nafsu makan berkurang, Perut membuncit', 1),
(47, 10, 1, 'Demam, Pusing, Lesu, Myalgia (Nyeri otot)', 1),
(48, 10, 2, 'Kuning', 1),
(49, 10, 3, 'Kuning', 1),
(50, 10, 4, 'Nyeri', 1),
(51, 11, 0, 'Mual, Muntah, Nyeri perut bagian sebelah kanan', 0),
(52, 11, 1, 'Lesu, Lelah, Myalgia (Nyeri otot)', 0),
(53, 11, 2, 'Kuning', 0),
(54, 11, 3, 'Normal', 0),
(55, 11, 4, 'Normal', 0),
(56, 12, 0, 'Muntah, Nyeri perut bagian sebelah kanan, Perut membuncit', 0),
(57, 12, 1, 'Demam, Batuk, Lesu, Lelah', 0),
(58, 12, 2, 'Kuning', 0),
(59, 12, 3, 'Kuning', 0),
(60, 12, 4, 'Normal', 0),
(61, 13, 0, 'Mual, Muntah, Nafsu makan berkurang, Perut membuncit', 1),
(62, 13, 1, 'Pusing, Lesu, Lelah', 1),
(63, 13, 2, 'Kuning', 1),
(64, 13, 3, 'Normal', 1),
(65, 13, 4, 'Nyeri', 1),
(66, 14, 0, 'Mual, Diare, Nafsu makan berkurang, Urin gelap', 0),
(67, 14, 1, 'Pusing, Lesu, Lelah, Myalgia (Nyeri otot)', 0),
(68, 14, 2, 'Kuning', 0),
(69, 14, 3, 'Kuning', 0),
(70, 14, 4, 'Normal', 0),
(71, 15, 0, 'Muntah, Nyeri perut bagian sebelah kanan, Nafsu makan berkurang', 0),
(72, 15, 1, 'Batuk, Lesu, Myalgia (Nyeri otot)', 0),
(73, 15, 2, 'Kuning', 0),
(74, 15, 3, 'Normal', 0),
(75, 15, 4, 'Normal', 0),
(76, 16, 0, 'Mual, Muntah, Nafsu makan berkurang', 0),
(77, 16, 1, 'Demam, Lesu, Berat badan menurun', 0),
(78, 16, 2, 'Kuning', 0),
(79, 16, 3, 'Normal', 0),
(80, 16, 4, 'Normal', 0),
(81, 17, 0, 'Mual, Muntah, Nafsu makan berkurang', 0),
(82, 17, 1, 'Demam, Lesu', 0),
(83, 17, 2, 'Kuning', 0),
(84, 17, 3, 'Normal', 0),
(85, 17, 4, 'Normal', 0),
(86, 18, 0, 'Mual, Muntah, Nafsu makan berkurang', 0),
(87, 18, 1, 'Demam, Lesu, Berat badan menurun', 0),
(88, 18, 2, 'Kuning', 0),
(89, 18, 3, 'Normal', 0),
(90, 18, 4, 'Normal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(10) NOT NULL,
  `nama_gejala` varchar(255) DEFAULT NULL,
  `pertanyaan_gejala` varchar(255) DEFAULT NULL,
  `type_gejala` enum('fuzzy','crisp') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `nama_gejala`, `pertanyaan_gejala`, `type_gejala`) VALUES
(0, 'Gejala Perut', 'Gejala Perut', 'fuzzy'),
(1, 'Gejala Mirip Flu', 'Gejala Mirip Dengan Flu', 'fuzzy'),
(2, 'Gejala Mata', 'Apakah Anda mengalami gejala mata kuning?', 'crisp'),
(3, 'Gejala Kulit', 'Apakah Anda mengalami gejala kulit kuning?', 'crisp'),
(4, 'Gejala Sendi', 'Apakah Anda mengalami gejala nyeri sendi atau pegal-pegal?', 'crisp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_himpunan`
--

CREATE TABLE `tbl_himpunan` (
  `id_himpunan` int(10) NOT NULL,
  `id_gejala` int(10) DEFAULT NULL,
  `nama_himpunan` varchar(255) DEFAULT NULL,
  `batas_bawah_himpunan` float(5,2) DEFAULT NULL,
  `batas_tengah_himpunan` float(5,2) DEFAULT NULL,
  `batas_atas_himpunan` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_himpunan`
--

INSERT INTO `tbl_himpunan` (`id_himpunan`, `id_gejala`, `nama_himpunan`, `batas_bawah_himpunan`, `batas_tengah_himpunan`, `batas_atas_himpunan`) VALUES
(1, 0, 'Rendah', 0.00, 1.00, 6.00),
(2, 0, 'Tinggi', 1.00, 6.00, 7.00),
(3, 1, 'Rendah', 0.00, 2.00, 6.00),
(4, 1, 'Tinggi', 2.00, 6.00, 7.00),
(5, 2, 'Tidak', 0.00, 0.25, 0.75),
(6, 2, 'Ya', 0.25, 0.75, 1.00),
(7, 3, 'Tidak', 0.00, 0.25, 0.75),
(8, 3, 'Ya', 0.25, 0.75, 1.00),
(9, 4, 'Tidak', 0.00, 0.25, 0.75),
(10, 4, 'Ya', 0.25, 0.75, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keputusan`
--

CREATE TABLE `tbl_keputusan` (
  `id_keputusan` int(10) NOT NULL,
  `nama_keputusan` varchar(255) DEFAULT NULL,
  `batas_bawah_keputusan` float(5,2) DEFAULT NULL,
  `batas_tengah_keputusan` float(5,2) DEFAULT NULL,
  `batas_atas_keputusan` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_keputusan`
--

INSERT INTO `tbl_keputusan` (`id_keputusan`, `nama_keputusan`, `batas_bawah_keputusan`, `batas_tengah_keputusan`, `batas_atas_keputusan`) VALUES
(1, 'PR', 0.00, 30.00, 50.00),
(2, 'MP', 30.00, 50.00, 70.00),
(3, 'MPD', 50.00, 70.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` int(10) NOT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `batas_bawah_penyakit` float(5,2) DEFAULT NULL,
  `batas_atas_penyakit` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `nama_penyakit`, `batas_bawah_penyakit`, `batas_atas_penyakit`) VALUES
(1, 'PR', 0.00, 30.00),
(2, 'MP', 30.01, 70.00),
(3, 'MPD', 70.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `umur` int(10) DEFAULT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT NULL,
  `domisili` varchar(255) DEFAULT NULL,
  `id_penyakit` int(10) DEFAULT NULL,
  `hasil` float(5,2) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_deteksi` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `nama`, `umur`, `jenis_kelamin`, `domisili`, `id_penyakit`, `hasil`, `tanggal`, `kode_deteksi`) VALUES
(1, 'Fulan', 21, 'p', 'Jakarta', 1, 30.00, '2022-08-07 20:00:19', NULL),
(2, 'Jane', 31, 'l', 'Medan', 2, 48.40, '2022-08-07 20:01:24', NULL),
(3, 'John', 41, 'l', 'Bandung', 3, 70.00, '2022-08-07 20:03:27', NULL),
(4, 'Fulan', 30, 'l', 'Jakarta', 2, 39.73, '2022-08-14 14:43:13', NULL),
(7, 'Lisa Arief', 22, 'p', 'Jakarta', 2, 39.73, '2022-08-27 01:19:28', NULL),
(8, 'Lisa coba captcha', 21, 'p', 'Jakarta', 2, 43.00, '2022-09-06 19:35:22', NULL),
(9, 'Lisa coba session exp', 21, 'p', '23', 2, 45.56, '2022-09-07 00:16:33', 'p8LuvBkoJjP2'),
(10, 'Lisa coba session exp 2', 23, 'p', 'Medan', 2, 55.43, '2022-09-07 00:27:12', 'zVKxMg2n8cBa'),
(11, 'Lisa tes session captcha 12 45', 45, 'l', 'Jakarta', 2, 39.73, '2022-09-07 00:46:43', NULL),
(12, 'Lisa coba captcha lagi 12:47', 25, 'p', 'Jakarta', 2, 43.56, '2022-09-07 00:47:45', 'Rpw7o1kg0HEa'),
(13, 'Coba session 8 sep', 25, 'l', 'Jakarta', 2, 43.00, '2022-09-08 19:59:06', '6B2GfcHqiX3F'),
(14, 'Lisa coba session lagi 2 8 sept 2022', 26, 'l', 'Jakarta', 2, 45.56, '2022-09-08 20:00:28', 'ME5eygHPh3RI'),
(15, 'Lisa tes session 15', 26, 'l', 'Jakarta', 2, 39.73, '2022-09-08 20:08:38', 'n4uoeaTAwhlP'),
(16, 'Fulan', 30, 'l', 'Jakarta', 2, 39.73, '2022-09-14 18:52:20', '9txykKTF5IDH'),
(17, 'Fulan', 30, 'l', 'Jakarta', 2, 39.60, '2022-09-18 14:59:37', 'lp0C6KGVmSBk'),
(18, 'Fulan', 30, 'l', 'Jakarta', 2, 39.73, '2022-09-18 14:59:55', 'RuF0fKLO6Ng8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_solusi`
--

CREATE TABLE `tbl_solusi` (
  `id_solusi` int(10) NOT NULL,
  `id_penyakit` int(10) DEFAULT NULL,
  `deskripsi_solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_solusi`
--

INSERT INTO `tbl_solusi` (`id_solusi`, `id_penyakit`, `deskripsi_solusi`) VALUES
(1, 1, '<b>Perawatan di rumah</b>\r\n<p style=\"  text-align: justify; text-justify: inter-word;\">Pada kondisi ini, virus dapat hilang dengan sendirinya sehingga tidak diperlukan penanganan khusus dan disarankan kepada Anda untuk beristirahat yang cukup dan menjaga pola makan.</p>'),
(2, 2, '<b>Melakukan pemeriksaan</b>\r\n<p style=\"  text-align: justify; text-justify: inter-word;\">Pada kondisi ini, Anda dianjurkan untuk melakukan pemeriksaan lebih lanjut terkait pemeriksaan fisik oleh ahli seperti pembesaran limpa, asterixis, dan spider angioma.<p>'),
(3, 3, '<b>Memerlukan perawatan darurat</b>\r\n<p style=\"  text-align: justify; text-justify: inter-word;\">Pada kondisi ini, Hepatitis B yang Anda derita sudah parah sehingga memerlukan rawat inap di rumah sakit untuk menghindari kerusakan organ hati yang lebih parah.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_gejala`
--

CREATE TABLE `tbl_sub_gejala` (
  `id_sub_gejala` int(10) NOT NULL,
  `id_gejala` int(10) DEFAULT NULL,
  `nama_sub_gejala` varchar(255) DEFAULT NULL,
  `ket_sub_gejala` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sub_gejala`
--

INSERT INTO `tbl_sub_gejala` (`id_sub_gejala`, `id_gejala`, `nama_sub_gejala`, `ket_sub_gejala`) VALUES
(1, 0, 'Mual', 'Tidak nyaman pada bagian perut dan muncul perasaan ingin muntah'),
(2, 0, 'Muntah', 'Mengalami muntah-muntah'),
(3, 0, 'Diare', 'BAB yang encer 3 kali atau lebih dalam kurun waktu satu hari'),
(4, 0, 'Nyeri perut bagian sebelah kanan', 'Nyeri pada bagian perut terutama di bagian kanan atas'),
(5, 0, 'Nafsu makan berkurang', 'Hilangnya nafsu untuk makan'),
(6, 0, 'Perut membuncit', 'Perut terlihat membesar dan membengkak seperti balon'),
(7, 0, 'Urin gelap', 'Urin berwarna gelap kuning pekat'),
(8, 0, 'Feses pucat', 'Feses pucat seperti dempul (putih keabu-abuan)'),
(9, 1, 'Demam', 'Mengalami demam ringan dengan temperatur suhu tubuh di atas 38° C'),
(10, 1, 'Batuk', 'Mengalami batuk-batuk'),
(11, 1, 'Pusing', 'Kepala seolah terasa melayang disertai perasaan ingin pingsan (kliyengan)'),
(12, 1, 'Lesu', 'Badan lemas tidak berenergi'),
(13, 1, 'Lelah', 'Badan terasa mudah lelah'),
(14, 1, 'Myalgia (Nyeri otot)', 'Rasa nyeri atau sakit pada otot bagian punggung, lengan, leher, betis, atau paha'),
(15, 1, 'Berat badan menurun', 'Berat badan mengalami penurunan drastis secara tiba-tiba tanpa adanya penyebab pasti'),
(16, 2, 'Mata Normal', 'Warna sklera (putih mata) normal'),
(17, 2, 'Mata Kuning', 'Berubahnya sclera (bagian putih pada mata) menjadi kuning'),
(18, 3, 'Kulit Normal', 'Kulit Normal'),
(19, 3, 'Kulit Kuning', 'Berubahnya warna kulit menjadi kuning'),
(20, 4, 'Sendi Normal', 'Sendi Normal'),
(21, 4, 'Sendi Nyeri', 'Rasa nyeri pada sendi atau pegal-pegal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `tbl_detail_aturan`
--
ALTER TABLE `tbl_detail_aturan`
  ADD PRIMARY KEY (`id_detail_aturan`);

--
-- Indexes for table `tbl_deteksi`
--
ALTER TABLE `tbl_deteksi`
  ADD PRIMARY KEY (`id_deteksi`);

--
-- Indexes for table `tbl_deteksi_string`
--
ALTER TABLE `tbl_deteksi_string`
  ADD PRIMARY KEY (`id_deteksi_string`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_himpunan`
--
ALTER TABLE `tbl_himpunan`
  ADD PRIMARY KEY (`id_himpunan`);

--
-- Indexes for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tbl_sub_gejala`
--
ALTER TABLE `tbl_sub_gejala`
  ADD PRIMARY KEY (`id_sub_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id_aturan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_detail_aturan`
--
ALTER TABLE `tbl_detail_aturan`
  MODIFY `id_detail_aturan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `tbl_deteksi`
--
ALTER TABLE `tbl_deteksi`
  MODIFY `id_deteksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_deteksi_string`
--
ALTER TABLE `tbl_deteksi_string`
  MODIFY `id_deteksi_string` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_himpunan`
--
ALTER TABLE `tbl_himpunan`
  MODIFY `id_himpunan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  MODIFY `id_keputusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  MODIFY `id_penyakit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  MODIFY `id_solusi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sub_gejala`
--
ALTER TABLE `tbl_sub_gejala`
  MODIFY `id_sub_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
