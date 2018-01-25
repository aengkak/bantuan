-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2018 at 09:48 PM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cek`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`, `status`) VALUES
(1, 'akses', 1),
(2, 'user', 1),
(3, 'kategori', 1),
(4, 'penanda', 1),
(5, 'post', 1),
(7, 'divisi', 1),
(8, 'aktivitas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`, `status`) VALUES
(1, 'Seluler', 1),
(2, 'Travel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `divisi_id`, `status`) VALUES
(4, 'Transaksi', 2, 1),
(5, 'Informasi', 2, 1),
(6, 'Transaksi', 1, 1),
(7, 'Informasi', 1, 1),
(8, 'Customer', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `ket`, `user_id`, `tgl`) VALUES
(1, 'Update Akses aktivitas', 1, '2017-12-21 09:09:15'),
(2, 'Update User admin', 1, '2017-12-21 09:17:03'),
(3, 'Delete User user', 1, '2017-12-26 11:51:58'),
(4, 'Update Post Sistem Jaringan Internet Karunia', 1, '2017-12-26 12:03:37'),
(5, 'Tambah Post coba', 1, '2017-12-26 21:14:34'),
(6, 'Update Post coba', 1, '2017-12-26 21:17:20'),
(7, 'Update Post coba', 1, '2017-12-26 21:21:05'),
(8, 'Update Post coba', 1, '2017-12-27 04:55:57'),
(9, 'Update Post Cara Refund Trigana', 1, '2018-01-02 14:50:49'),
(10, 'Update Post Cara Singkat Proses Transaksi di Abacus', 1, '2018-01-02 14:54:19'),
(11, 'Update Post Cara Mendaftar Telegram Center Otomatis', 1, '2018-01-02 14:55:10'),
(12, 'Update Post Cara Membuat Cek BNI', 1, '2018-01-02 14:55:59'),
(13, 'Update Post Cara Membuat PIN Transaksi', 1, '2018-01-02 15:38:02'),
(14, 'Update Post Cara Membuat Cek BNI', 1, '2018-01-02 15:41:50'),
(15, 'Update Post Cara Membuat PIN Transaksi', 1, '2018-01-02 15:42:39'),
(16, 'Tambah Post Cara Topup MG Holiday', 1, '2018-01-02 15:46:59'),
(17, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 15:48:25'),
(18, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 15:49:08'),
(19, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 15:49:56'),
(20, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 15:50:21'),
(21, 'Update Post Terminal Maskapai di Jakarta (Updated)', 1, '2018-01-02 15:53:07'),
(22, 'Update Post Cara Topup Xpress Air', 1, '2018-01-02 15:55:47'),
(23, 'Tambah Kategori Customer', 1, '2018-01-02 15:59:59'),
(24, 'Delete Kategori Customer', 1, '2018-01-02 16:01:40'),
(25, 'Tambah Penanda Customer', 1, '2018-01-02 16:01:55'),
(26, 'Tambah Post Cara Topup Sriwijaya', 1, '2018-01-02 16:14:02'),
(27, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:15:28'),
(28, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:15:57'),
(29, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:16:20'),
(30, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:19:24'),
(31, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:20:34'),
(32, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:21:02'),
(33, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:22:21'),
(34, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 16:24:52'),
(35, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:26:13'),
(36, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:26:47'),
(37, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 16:27:39'),
(38, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:29:38'),
(39, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 16:31:34'),
(40, 'Update Post Cara Refund Trigana', 1, '2018-01-02 16:32:24'),
(41, 'Update Post Cara Topup Sriwijaya', 1, '2018-01-02 16:33:05'),
(42, 'Update Post Cara Topup MG Holiday', 1, '2018-01-02 16:33:20'),
(43, 'Update Post Cara Refund Trigana', 1, '2018-01-02 16:33:37'),
(44, 'Update Post Cara Topup Tiger Scoot', 1, '2018-01-02 16:34:20'),
(45, 'Update Post Cara Topup Citilink', 1, '2018-01-02 16:43:31'),
(46, 'Update Post Cara Topup Citilink', 1, '2018-01-02 16:44:37'),
(47, 'Update Post Call Center Lion Air', 1, '2018-01-02 16:45:34'),
(48, 'Update Post Ketentuan Penarikan Saldo', 1, '2018-01-02 16:46:15'),
(49, 'Update Post Call Center Sriwijaya Air', 1, '2018-01-02 16:47:54'),
(50, 'Update Post Format Promo Broadcast / BC Customer', 1, '2018-01-02 16:48:41'),
(51, 'Update Post Cara Singkat Proses Transaksi di Abacus', 1, '2018-01-02 16:49:27'),
(52, 'Update Post Cara Mendaftar Telegram Center Otomatis', 1, '2018-01-02 16:49:57'),
(53, 'Update Post Cara Membuat Cek BNI', 1, '2018-01-02 16:50:34'),
(54, 'Update Post Cara Membuat PIN Transaksi', 1, '2018-01-02 16:50:57'),
(55, 'Update Post Cara Transfer VA Mandiri', 1, '2018-01-02 16:51:26'),
(56, 'Update Post Cara Topup Xpress Air', 1, '2018-01-02 16:51:52'),
(57, 'Tambah Post tes', 1, '2018-01-02 21:27:17'),
(58, 'Update Post tes', 1, '2018-01-02 21:57:50'),
(59, 'Update Post tes', 1, '2018-01-02 22:31:49'),
(60, 'Delete Post tes', 1, '2018-01-04 09:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`, `kategori_id`, `status`) VALUES
(15, 'Topup', 4, 1),
(16, 'Bagasi', 5, 1),
(17, 'Call Center', 5, 1),
(19, 'Penarikan Saldo / Transfer Balik', 5, 1),
(20, 'Customer', 5, 1),
(21, 'Bank', 5, 1),
(22, 'Promosi', 5, 1),
(23, 'Nomor', 5, 1),
(24, 'Rekening', 5, 1),
(25, 'Terminal', 5, 1),
(26, 'Maskapai', 5, 1),
(27, 'Maskapai', 5, 0),
(28, 'Refund', 5, 1),
(29, 'Kontak', 5, 1),
(30, 'Hotel', 5, 1),
(31, 'Transfer', 4, 1),
(32, 'Issued', 4, 1),
(33, 'Booking', 4, 1),
(34, 'Refund', 4, 1),
(35, 'Transfer', 6, 1),
(36, 'Bandara', 5, 1),
(37, 'PIN', 4, 1),
(38, 'Cek BNI', 4, 1),
(39, 'BNI', 4, 1),
(40, 'Telegram Center', 4, 1),
(41, 'INTERNET', 7, 1),
(42, 'Abacus', 4, 1),
(43, 'Tiger', 4, 1),
(44, 'Trigana', 4, 1),
(45, 'Customer', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_id` varchar(255) NOT NULL,
  `divisi_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_id`, `divisi_id`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1,8,7,3,4,5,2', '1,2', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '1,7,3,4,5,2', '1,2', 1),
(3, 'adit', '486b6c6b267bc61677367eb6b6458764', '1,7,3,4,5', '1', 1),
(4, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', '1,7,3,4,5', '2', 1),
(5, 'zuhri', '57ffc19b1f7e850f8a69a10f3f18b260', '1,7,3,4,5,2', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
