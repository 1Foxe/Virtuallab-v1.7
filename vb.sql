-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 04.25
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
-- Database: `vb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_admin`
--

CREATE TABLE `code_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_dosen`
--

CREATE TABLE `code_dosen` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_guest`
--

CREATE TABLE `code_guest` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_laboran`
--

CREATE TABLE `code_laboran` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_mahasiswa`
--

CREATE TABLE `code_mahasiswa` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `code_mahasiswa`
--

INSERT INTO `code_mahasiswa` (`id`, `email`, `code`, `expire`) VALUES
(1, 'fayzalromero@gmail.com', '32926', 1677560530),
(2, 'fayzalromero@gmail.com', '51408', 1677561787),
(3, 'fayzalromero@gmail.com', '30585', 1677562031);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `no_hpadmin` varchar(200) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `alamat_admin` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `profile_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `pass`, `no_hpadmin`, `email_admin`, `alamat_admin`, `date`, `profile_img`) VALUES
(1, 'Admin', '$2y$10$sTdcylQg.HfSBexN5Z3DwOA93Pb0YQ9abTDBUFNzWM/xf2xnU.5fa', '0852721744', 'febrianariandini1402@gmail.com', 'Citra Batam', '0000-00-00 00:00:00', '63f821092e7131677205769.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_attempt_guest`
--

CREATE TABLE `tbl_attempt_guest` (
  `id_attempt_guest` int(11) NOT NULL,
  `id_matkulguest` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `waktu` int(100) NOT NULL,
  `tanggal_kerja` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_attempt_mhs`
--

CREATE TABLE `tbl_attempt_mhs` (
  `id_attempt_mhs` int(11) NOT NULL,
  `id_matkulmhs` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `waktu` int(100) NOT NULL,
  `tanggal_kerja` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_attempt_mhs`
--

INSERT INTO `tbl_attempt_mhs` (`id_attempt_mhs`, `id_matkulmhs`, `id_modul`, `waktu`, `tanggal_kerja`) VALUES
(115, 20, 16, 0, '2023-06-20 06:08:04'),
(116, 22, 16, 0, '2023-06-20 06:09:49'),
(117, 22, 16, 0, '2023-06-20 06:10:25'),
(118, 22, 18, 0, '2023-06-20 06:13:26'),
(119, 23, 18, 0, '2023-06-20 14:17:12'),
(120, 23, 16, 0, '2023-06-20 15:53:19'),
(121, 23, 19, 0, '2023-06-20 15:53:35'),
(122, 21, 16, 0, '2023-06-20 15:54:24'),
(123, 21, 18, 0, '2023-06-20 15:54:58'),
(124, 21, 19, 0, '2023-06-20 15:55:17'),
(125, 24, 16, 0, '2023-06-20 22:43:46'),
(126, 24, 18, 0, '2023-06-20 22:44:04'),
(127, 24, 19, 0, '2023-06-20 22:44:24'),
(128, 20, 18, 0, '2023-06-21 18:59:56'),
(129, 20, 19, 0, '2023-06-21 19:00:17'),
(130, 22, 19, 0, '2023-06-21 22:56:15'),
(131, 22, 20, 0, '2023-06-22 01:02:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nik_dosen` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `no_hpdosen` varchar(200) NOT NULL,
  `email_dosen` varchar(200) NOT NULL,
  `alamat_dosen` varchar(200) NOT NULL,
  `profile_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `username`, `nik_dosen`, `pass`, `no_hpdosen`, `email_dosen`, `alamat_dosen`, `profile_img`) VALUES
(1, 'Dosen', '32246246712', '$2y$10$uGQpkXSUvRwVwmIsoMcDF.mHc0WuAgpekKLFYsc9hQdrosnsHrCgq', '08983456234', 'farhankebab@gmail.com', 'Nongsa', '63f8218042afa1677205888.jpg'),
(2, 'dosen1', '321321', '$2y$10$tpCuj371qiOhJW4d0W/iDe/zCuuiaR16Ka9qBdFuuelGp/CdpAavG', '034235', 'dosen@gmail.com', 'taman', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dospengampu`
--

CREATE TABLE `tbl_dospengampu` (
  `id_dospengampu` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dospengampu`
--

INSERT INTO `tbl_dospengampu` (`id_dospengampu`, `id_dosen`, `id_matkul`) VALUES
(5, 2, 2),
(6, 1, 2),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guest`
--

CREATE TABLE `tbl_guest` (
  `id_guest` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email_guest` varchar(200) NOT NULL,
  `profile_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_guest`
--

INSERT INTO `tbl_guest` (`id_guest`, `username`, `pass`, `email_guest`, `profile_img`) VALUES
(1, 'Guest', '$2y$10$enUzuJYSGPuldcKFYBUkqOAUQuyuCKoTsVzBIw.CzyreYNbkKTtC2', 'sigitrendang@gmail.com', ''),
(2, 'Guest1', '$2y$10$PDAmGYiRRtmu4tJkpXzKN.cDrzk7L1welwUwi8EFYNrm./SujIZmi', 'Guest1@gmail.com', ''),
(3, 'Guest2', '$2y$10$ugZJGYsZmAf8ICQIzpIznug5SnNzQ7eYx6Wbgre4PxmZad/hBGLNu', 'Guest2@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jwb_guest`
--

CREATE TABLE `tbl_jwb_guest` (
  `id_jwb_guest` int(100) NOT NULL,
  `id_attempt_guest` int(11) NOT NULL,
  `id_soal` int(100) NOT NULL,
  `jawaban` enum('a','b','c','d','e','f','t') DEFAULT NULL,
  `jawab_essay` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jwb_mhs`
--

CREATE TABLE `tbl_jwb_mhs` (
  `id_jwb_mhs` int(100) NOT NULL,
  `id_attempt_mhs` int(11) NOT NULL,
  `id_soal` int(100) NOT NULL,
  `jawaban` enum('a','b','c','d','e','f','t') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_essay` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_jwb_mhs`
--

INSERT INTO `tbl_jwb_mhs` (`id_jwb_mhs`, `id_attempt_mhs`, `id_soal`, `jawaban`, `jawab_essay`) VALUES
(158, 115, 17, 't', ''),
(159, 115, 18, 'f', ''),
(160, 116, 17, 't', ''),
(161, 116, 18, 'f', ''),
(162, 118, 15, 'f', ''),
(163, 118, 16, 't', ''),
(164, 119, 15, 't', ''),
(165, 119, 16, 't', ''),
(166, 120, 17, 't', ''),
(167, 120, 18, 't', ''),
(168, 121, 19, 't', ''),
(169, 121, 20, 't', ''),
(170, 122, 17, 't', ''),
(171, 122, 18, 'f', ''),
(172, 123, 15, 't', ''),
(173, 123, 16, 't', ''),
(174, 124, 19, 't', ''),
(175, 124, 20, 't', ''),
(176, 125, 17, 'f', ''),
(177, 125, 18, 't', ''),
(178, 126, 15, 'f', ''),
(179, 126, 16, 't', ''),
(180, 127, 19, 't', ''),
(181, 127, 20, 't', ''),
(182, 128, 15, 't', ''),
(183, 128, 16, 't', ''),
(184, 129, 19, 't', ''),
(185, 129, 20, 't', ''),
(186, 130, 19, 't', ''),
(187, 130, 20, 't', ''),
(188, 131, 21, 't', ''),
(189, 131, 22, 't', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `parent_komentar_id` int(11) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `parent_komentar_id`, `komentar`, `nama_pengirim`, `date`) VALUES
(1, 0, 'Absen mahasiswa virtual lab bermasalah', 'Dosen', '2023-04-07 15:34:25'),
(2, 0, 'Enrol Bermasalah', 'Laboran', '2023-04-07 15:34:52'),
(3, 0, 'Tidak dapat melakukan absen', 'Mahasiswa', '2023-04-07 15:35:56'),
(4, 0, 'Login Bermasalah', 'Guest', '2023-04-07 15:36:10'),
(5, 0, 'dd', 'sddd', '2023-04-07 15:39:28'),
(6, 5, 'dd', 'ss', '2023-04-07 16:03:16'),
(7, 4, 'sdd', 'dsd', '2023-04-07 16:03:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laboran`
--

CREATE TABLE `tbl_laboran` (
  `id_laboran` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nik_laboran` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `no_hplaboran` varchar(200) NOT NULL,
  `email_laboran` varchar(200) NOT NULL,
  `alamat_laboran` varchar(200) NOT NULL,
  `profile_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_laboran`
--

INSERT INTO `tbl_laboran` (`id_laboran`, `username`, `nik_laboran`, `pass`, `no_hplaboran`, `email_laboran`, `alamat_laboran`, `profile_img`) VALUES
(1, 'Laboran', '3297328732', '$2y$10$6eOaGUO0eD00lzRAvivYzuM536eO00HD/luBB.HVUV.6ehbzSaPo2', '081357485364', 'rezakecap@gmail.com', 'Tanjung Piayu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_labpengampu`
--

CREATE TABLE `tbl_labpengampu` (
  `id_labpengampu` int(11) NOT NULL,
  `id_laboran` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_labpengampu`
--

INSERT INTO `tbl_labpengampu` (`id_labpengampu`, `id_laboran`, `id_matkul`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nim_mhs` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `no_hpmhs` varchar(200) NOT NULL,
  `email_mhs` varchar(200) NOT NULL,
  `alamat_mhs` varchar(200) NOT NULL,
  `profile_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `username`, `nim_mhs`, `pass`, `no_hpmhs`, `email_mhs`, `alamat_mhs`, `profile_img`) VALUES
(1, 'Mahasiswa', '3312101060', '$2y$10$MuWAIVo4v9DOKt4QNNpeTue/Y/0NE0r4dM5HLytp7JPWoeYMfrcyC', '08127564859', 'iqbalbakso@gmail.com', 'Nongsa', ''),
(2, 'Fayzal', '3222444112', '$2y$10$HqJHhn25p9FXJOW6slUcLO04V0e3TYV.eEaHe5efcu3k1Tco/ogeG', '0879685734', 'fayzalromero@gmail.com', 'Bengkong', ''),
(29, 'MuhamadArif', '3312101069', '$2y$10$ZHZ2xUMgNW4L0wmNUm47GeIXrEWTiZFBHn5vll.j9Ok/2pXjnA.EG', '354327237645723', 'masariif051102@gmail.com', 'Batu aji ', ''),
(30, 'LoverinDesdi', '3312101000', '$2y$10$QGkD.cTDGenzs0mu9yAqXek9fsh0EQHehpk5t7nv4t1StCPsxb8mO', '564576767567', 'Loverin@gmail.com', 'Paris Saint German', ''),
(32, 'DzikraAidaAnisa', '3312101002', '$2y$10$A0.3AA5uWoVGoAuxh4Zui.rir3K0/bIqMQj1ifA5aZ.PlAo9oar6u', '0999888746', 'Anisa@gmail.com', 'Jakarta Selatan', ''),
(33, 'Mahasiswa5', '324434', '$2y$10$HB4gsrcSd5ZKw7i0/waR9.7nITXWObdT8E1OVlL/qgZ3uzvMYhMXe', '7896756', 'mahasiswa@gmail.com', 'Jerman (jejer kauman )', ''),
(34, 'ErgiSeptiandi', '3312101048', '$2y$10$YJ.UFUESHws7kfjG4ZSEnOKDSLvMvXOd2rsJ8ETDFXMclSjwjnEfC', '08526381912', 'ergiputra321@gmail.com', 'Taman Anugrah Ideal', ''),
(35, 'ergiputra', '3312111068', '$2y$10$VeA7WwbpAEgGksNy/k2Lx.bD0WNygRY.MmrmEPnQDNgZ9ri8BSOIu', '0852638233', 'ergiputra321@gmail.com', 'Taman Anugrah Ideal', ''),
(36, 'ergipai', '3312101050', '$2y$10$yqImQOqiYW7k23zsJPkP/OzsxgdFOFxwf028oCXAmIsbVjVTbloW2', '08123423', 'yaw@gmail.com', 'Taman Anugrah Ideal', ''),
(37, 'ergiprocoding', '331211108', '$2y$10$9fQEeM8g7YYG9N.KZBy96Oh5dqCalDXu4bkdxx1tz7IeBezook52S', '321321', 'yaws@gmail.com', 'Taman Anugrah Ideal', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(200) NOT NULL,
  `nama_matkul` varchar(200) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `id_prodi`, `password`) VALUES
(2, 'IF002', 'Rekayasa Perangkat Lunak', 1, 'RPL2'),
(3, 'IF231', 'Basis Data', 1, '123321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkulguest`
--

CREATE TABLE `tbl_matkulguest` (
  `id_matkulguest` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkulmhs`
--

CREATE TABLE `tbl_matkulmhs` (
  `id_matkulmhs` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nama_modul` varchar(150) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_matkulmhs`
--

INSERT INTO `tbl_matkulmhs` (`id_matkulmhs`, `id_mhs`, `nama`, `nim`, `status`, `nama_modul`, `id_matkul`) VALUES
(20, 1, 'Mahasiswa', '3312101060', 'Sudah Kuis', 'QA Teaster, Use Case2, Quiz', 2),
(21, 35, 'ergiputra', '3312111068', 'Sudah Kuis', 'QA Teaster, Use Case2, Quiz', 2),
(22, 36, 'ergipai', '3312101050', 'Sudah Kuis', 'QA Teaster, Use Case2, Quiz, Belajar', 2),
(23, 37, 'ergiprocoding', '331211108', 'Sudah Kuis', 'Use Case2, QA Teaster, Quiz', 2),
(24, 34, 'ErgiSeptiandi', '3312101048', 'Sudah Kuis', 'QA Teaster, Use Case2, Quiz', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_modulpraktik`
--

CREATE TABLE `tbl_modulpraktik` (
  `id_modul` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `jenis_modul` varchar(200) NOT NULL,
  `judul_modul` varchar(200) NOT NULL,
  `deskripsi_modul` varchar(1000) NOT NULL,
  `modul_file` text DEFAULT NULL,
  `modul_link` varchar(200) DEFAULT NULL,
  `kkm` int(11) DEFAULT NULL,
  `waktu` int(100) DEFAULT NULL,
  `tampil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_modulpraktik`
--

INSERT INTO `tbl_modulpraktik` (`id_modul`, `id_matkul`, `jenis_modul`, `judul_modul`, `deskripsi_modul`, `modul_file`, `modul_link`, `kkm`, `waktu`, `tampil`) VALUES
(16, 2, 'Link', 'QA Teaster', 'Quality Assurance', NULL, 'https://youtube.com/embed/k3VUMjls2mI', NULL, NULL, NULL),
(18, 2, 'Link', 'Use Case2', 'link ppt', NULL, 'https://docs.google.com/presentation/d/11su5MO9wpvL3MqveNL1-HGiJBa7Q5fei/edit?usp=drive_link&ouid=102893681992545287210&rtpof=true&sd=true', NULL, NULL, NULL),
(19, 2, 'Link', 'Quiz', 'ergi yaw', NULL, 'https://www.youtube.com/embed/n8Fe8YdglMI', NULL, NULL, NULL),
(20, 2, 'Link', 'Belajar', 'tes aja', NULL, 'https://www.youtube.com/embed/HWVS5mxQPrA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_guest`
--

CREATE TABLE `tbl_nilai_guest` (
  `id_nilai_guest` int(11) NOT NULL,
  `id_attempt_guest` int(11) NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_mhs`
--

CREATE TABLE `tbl_nilai_mhs` (
  `id_nilai_mhs` int(11) NOT NULL,
  `id_attempt_mhs` int(11) NOT NULL,
  `nilai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_nilai_mhs`
--

INSERT INTO `tbl_nilai_mhs` (`id_nilai_mhs`, `id_attempt_mhs`, `nilai`) VALUES
(70, 115, '100.00'),
(71, 116, '100.00'),
(72, 118, '100.00'),
(73, 119, '50.00'),
(74, 120, '50.00'),
(75, 121, '100.00'),
(76, 122, '100.00'),
(77, 123, '50.00'),
(78, 124, '100.00'),
(79, 125, '0.00'),
(80, 126, '100.00'),
(81, 127, '100.00'),
(82, 128, '50.00'),
(83, 129, '100.00'),
(84, 130, '100.00'),
(85, 131, '100.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `id_jurusan`) VALUES
(1, 'Teknik Informatika', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(100) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `jenis_soal` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pertanyaan` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawab_a` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_b` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_c` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_d` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_e` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawab_option` enum('a','b','c','d','e','f','t') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `upload_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `id_modul`, `jenis_soal`, `pertanyaan`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `jawab_e`, `jawab_option`, `upload_img`) VALUES
(15, 18, 'Boolean', 'power point untuk mengelola laporan ', NULL, NULL, NULL, NULL, NULL, 'f', NULL),
(16, 18, 'Boolean', 'youtube adalah media sosial ', NULL, NULL, NULL, NULL, NULL, 't', NULL),
(17, 16, 'Boolean', 'ergi adalah ergi', NULL, NULL, NULL, NULL, NULL, 't', NULL),
(18, 16, 'Boolean', 'ergi adalah yaw', NULL, NULL, NULL, NULL, NULL, 'f', NULL),
(19, 19, 'Boolean', 'ergi sebenarnya robot?', NULL, NULL, NULL, NULL, NULL, 't', NULL),
(20, 19, 'Boolean', 'ergi suka makan ayam bakar + nasi uduk?', NULL, NULL, NULL, NULL, NULL, 't', NULL),
(21, 20, 'Boolean', '1 + 1 = 2', NULL, NULL, NULL, NULL, NULL, 't', NULL),
(22, 20, 'Boolean', '2 + 2 = 4', NULL, NULL, NULL, NULL, NULL, 't', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `code_admin`
--
ALTER TABLE `code_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `code_dosen`
--
ALTER TABLE `code_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `code_guest`
--
ALTER TABLE `code_guest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`);

--
-- Indeks untuk tabel `code_laboran`
--
ALTER TABLE `code_laboran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `code_mahasiswa`
--
ALTER TABLE `code_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `email_admin` (`email_admin`);

--
-- Indeks untuk tabel `tbl_attempt_guest`
--
ALTER TABLE `tbl_attempt_guest`
  ADD PRIMARY KEY (`id_attempt_guest`),
  ADD KEY `id_modul` (`id_modul`),
  ADD KEY `id_matkulguest` (`id_matkulguest`);

--
-- Indeks untuk tabel `tbl_attempt_mhs`
--
ALTER TABLE `tbl_attempt_mhs`
  ADD PRIMARY KEY (`id_attempt_mhs`),
  ADD KEY `id_modul` (`id_modul`),
  ADD KEY `id_matkulmhs` (`id_matkulmhs`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tbl_dospengampu`
--
ALTER TABLE `tbl_dospengampu`
  ADD PRIMARY KEY (`id_dospengampu`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `tbl_guest`
--
ALTER TABLE `tbl_guest`
  ADD PRIMARY KEY (`id_guest`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_jwb_guest`
--
ALTER TABLE `tbl_jwb_guest`
  ADD PRIMARY KEY (`id_jwb_guest`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_attempt_guest` (`id_attempt_guest`);

--
-- Indeks untuk tabel `tbl_jwb_mhs`
--
ALTER TABLE `tbl_jwb_mhs`
  ADD PRIMARY KEY (`id_jwb_mhs`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_attempt_mhs` (`id_attempt_mhs`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indeks untuk tabel `tbl_laboran`
--
ALTER TABLE `tbl_laboran`
  ADD PRIMARY KEY (`id_laboran`);

--
-- Indeks untuk tabel `tbl_labpengampu`
--
ALTER TABLE `tbl_labpengampu`
  ADD PRIMARY KEY (`id_labpengampu`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_laboran` (`id_laboran`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tbl_matkulguest`
--
ALTER TABLE `tbl_matkulguest`
  ADD PRIMARY KEY (`id_matkulguest`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_guest` (`id_guest`);

--
-- Indeks untuk tabel `tbl_matkulmhs`
--
ALTER TABLE `tbl_matkulmhs`
  ADD PRIMARY KEY (`id_matkulmhs`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `tbl_modulpraktik`
--
ALTER TABLE `tbl_modulpraktik`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `tbl_nilai_guest`
--
ALTER TABLE `tbl_nilai_guest`
  ADD PRIMARY KEY (`id_nilai_guest`),
  ADD KEY `id_attempt_guest` (`id_attempt_guest`);

--
-- Indeks untuk tabel `tbl_nilai_mhs`
--
ALTER TABLE `tbl_nilai_mhs`
  ADD PRIMARY KEY (`id_nilai_mhs`),
  ADD KEY `id_attempt_mhs` (`id_attempt_mhs`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_modul` (`id_modul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `code_admin`
--
ALTER TABLE `code_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `code_dosen`
--
ALTER TABLE `code_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `code_guest`
--
ALTER TABLE `code_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `code_laboran`
--
ALTER TABLE `code_laboran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `code_mahasiswa`
--
ALTER TABLE `code_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_attempt_guest`
--
ALTER TABLE `tbl_attempt_guest`
  MODIFY `id_attempt_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_attempt_mhs`
--
ALTER TABLE `tbl_attempt_mhs`
  MODIFY `id_attempt_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_dospengampu`
--
ALTER TABLE `tbl_dospengampu`
  MODIFY `id_dospengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `id_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jwb_guest`
--
ALTER TABLE `tbl_jwb_guest`
  MODIFY `id_jwb_guest` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jwb_mhs`
--
ALTER TABLE `tbl_jwb_mhs`
  MODIFY `id_jwb_mhs` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_laboran`
--
ALTER TABLE `tbl_laboran`
  MODIFY `id_laboran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_labpengampu`
--
ALTER TABLE `tbl_labpengampu`
  MODIFY `id_labpengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkulguest`
--
ALTER TABLE `tbl_matkulguest`
  MODIFY `id_matkulguest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkulmhs`
--
ALTER TABLE `tbl_matkulmhs`
  MODIFY `id_matkulmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_modulpraktik`
--
ALTER TABLE `tbl_modulpraktik`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_guest`
--
ALTER TABLE `tbl_nilai_guest`
  MODIFY `id_nilai_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_mhs`
--
ALTER TABLE `tbl_nilai_mhs`
  MODIFY `id_nilai_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_attempt_guest`
--
ALTER TABLE `tbl_attempt_guest`
  ADD CONSTRAINT `tbl_attempt_guest_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tbl_modulpraktik` (`id_modul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_attempt_guest_ibfk_2` FOREIGN KEY (`id_matkulguest`) REFERENCES `tbl_matkulguest` (`id_matkulguest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_attempt_mhs`
--
ALTER TABLE `tbl_attempt_mhs`
  ADD CONSTRAINT `tbl_attempt_mhs_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tbl_modulpraktik` (`id_modul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_attempt_mhs_ibfk_2` FOREIGN KEY (`id_matkulmhs`) REFERENCES `tbl_matkulmhs` (`id_matkulmhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_dospengampu`
--
ALTER TABLE `tbl_dospengampu`
  ADD CONSTRAINT `tbl_dospengampu_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tbl_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_dospengampu_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tbl_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_jwb_guest`
--
ALTER TABLE `tbl_jwb_guest`
  ADD CONSTRAINT `tbl_jwb_guest_ibfk_1` FOREIGN KEY (`id_attempt_guest`) REFERENCES `tbl_attempt_guest` (`id_attempt_guest`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jwb_guest_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_jwb_mhs`
--
ALTER TABLE `tbl_jwb_mhs`
  ADD CONSTRAINT `tbl_jwb_mhs_ibfk_1` FOREIGN KEY (`id_attempt_mhs`) REFERENCES `tbl_attempt_mhs` (`id_attempt_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jwb_mhs_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_labpengampu`
--
ALTER TABLE `tbl_labpengampu`
  ADD CONSTRAINT `tbl_labpengampu_ibfk_1` FOREIGN KEY (`id_laboran`) REFERENCES `tbl_laboran` (`id_laboran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_labpengampu_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tbl_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD CONSTRAINT `tbl_matakuliah_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tbl_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_matkulguest`
--
ALTER TABLE `tbl_matkulguest`
  ADD CONSTRAINT `tbl_matkulguest_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `tbl_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_matkulguest_ibfk_2` FOREIGN KEY (`id_guest`) REFERENCES `tbl_guest` (`id_guest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_matkulmhs`
--
ALTER TABLE `tbl_matkulmhs`
  ADD CONSTRAINT `tbl_matkulmhs_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_matkulmhs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tbl_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_modulpraktik`
--
ALTER TABLE `tbl_modulpraktik`
  ADD CONSTRAINT `tbl_modulpraktik_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `tbl_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_nilai_guest`
--
ALTER TABLE `tbl_nilai_guest`
  ADD CONSTRAINT `tbl_nilai_guest_ibfk_1` FOREIGN KEY (`id_attempt_guest`) REFERENCES `tbl_attempt_guest` (`id_attempt_guest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_nilai_mhs`
--
ALTER TABLE `tbl_nilai_mhs`
  ADD CONSTRAINT `tbl_nilai_mhs_ibfk_1` FOREIGN KEY (`id_attempt_mhs`) REFERENCES `tbl_attempt_mhs` (`id_attempt_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD CONSTRAINT `tbl_prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD CONSTRAINT `tbl_soal_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tbl_modulpraktik` (`id_modul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
