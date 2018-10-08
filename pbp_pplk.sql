-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 11:22 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbp_pplk`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_loker`
--

CREATE TABLE `apply_loker` (
  `idapply` int(11) NOT NULL,
  `idloker` int(11) NOT NULL,
  `idpencaker` int(11) NOT NULL,
  `tgl_apply` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_pekerjaan`
--

CREATE TABLE `bidang_pekerjaan` (
  `idbidang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_pekerjaan`
--

INSERT INTO `bidang_pekerjaan` (`idbidang`, `nama`) VALUES
(1, 'Industri'),
(2, 'Teknologi Informasi'),
(3, 'Finansial'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `idloker` int(11) NOT NULL,
  `idperusahaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idbidang` int(11) NOT NULL,
  `idtingkat_pendidikan` int(11) NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `usia_min` int(50) DEFAULT NULL,
  `usia_max` int(50) DEFAULT NULL,
  `gaji_min` int(50) DEFAULT NULL,
  `gaji_max` int(50) DEFAULT NULL,
  `nama_cp` varchar(50) DEFAULT NULL,
  `email_cp` varchar(50) DEFAULT NULL,
  `no_telp_cp` varchar(50) DEFAULT NULL,
  `tgl_insert` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `deskripsi_loker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`idloker`, `idperusahaan`, `nama`, `idbidang`, `idtingkat_pendidikan`, `tipe`, `usia_min`, `usia_max`, `gaji_min`, `gaji_max`, `nama_cp`, `email_cp`, `no_telp_cp`, `tgl_insert`, `tgl_update`, `tgl_expired`, `deskripsi_loker`) VALUES
(5, 2, 'oooo', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-08', NULL, NULL, ''),
(6, 2, 'lll', 4, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', '0000-00-00', '2018-10-08', ''),
(7, 2, 'oooo', 3, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', '2018-10-08', '2018-10-09', ''),
(8, 2, 'oooo', 3, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-09', ''),
(9, 2, 'opop', 3, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '0000-00-00', ''),
(10, 2, 'nnn', 3, 3, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-09', ''),
(11, 2, 'nnn', 3, 3, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-09', ''),
(12, 2, 'lolo', 4, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `idpencaker` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `bidang_pekerjaan` varchar(50) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `nama`, `password`, `nama_pemilik`, `alamat`, `kota`, `email`, `no_telp`, `tgl_daftar`) VALUES
(1, 'lllo', '$2y$10$5t1eT98DxqNZrbx9wZybnuDZ1VrUK7tBpVOw4wjXj3C68Wxmqfm/e', 'lll', '', '', 'lll@gmail.com', '', '2018-10-07 02:20:56'),
(2, 'ppp', '$2y$10$7G1Ksn5M3.2OXeq59VVLaOa9dBfYyjGY8TpHx4l27aUDsHi9T0i8C', '', '', '', 'ppp@gmail.com', '', '2018-10-08 13:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `idriwayat_pekerjaan` int(11) NOT NULL,
  `idpencaker` int(11) NOT NULL,
  `idbidang` int(11) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `bln_masuk` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `thn_masuk` int(4) NOT NULL,
  `bln_lulus` set('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `idriwayat_pendidikan` int(11) NOT NULL,
  `idpencaker` int(11) NOT NULL,
  `idtingkat_pendidikan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `bln_masuk` set('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `thn_masuk` int(4) NOT NULL,
  `bln_lulus` set('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_pendidikan`
--

CREATE TABLE `tingkat_pendidikan` (
  `idtingkat_pendidikan` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat_pendidikan`
--

INSERT INTO `tingkat_pendidikan` (`idtingkat_pendidikan`, `keterangan`) VALUES
(1, 'Diploma D3'),
(2, 'Sarjana D4'),
(3, 'Sarjana S1'),
(4, 'Magister S2'),
(5, 'Doktor S3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD PRIMARY KEY (`idapply`);

--
-- Indexes for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  ADD PRIMARY KEY (`idbidang`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`idloker`),
  ADD KEY `idperusahaan` (`idperusahaan`),
  ADD KEY `idbidang` (`idbidang`),
  ADD KEY `idtingkat_pendidikan` (`idtingkat_pendidikan`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`idpencaker`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idperusahaan`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`idriwayat_pekerjaan`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`idriwayat_pendidikan`);

--
-- Indexes for table `tingkat_pendidikan`
--
ALTER TABLE `tingkat_pendidikan`
  ADD PRIMARY KEY (`idtingkat_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_loker`
--
ALTER TABLE `apply_loker`
  MODIFY `idapply` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  MODIFY `idbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `idloker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `idpencaker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idperusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `idriwayat_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `idriwayat_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tingkat_pendidikan`
--
ALTER TABLE `tingkat_pendidikan`
  MODIFY `idtingkat_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_ibfk_1` FOREIGN KEY (`idperusahaan`) REFERENCES `perusahaan` (`idperusahaan`),
  ADD CONSTRAINT `loker_ibfk_2` FOREIGN KEY (`idtingkat_pendidikan`) REFERENCES `tingkat_pendidikan` (`idtingkat_pendidikan`),
  ADD CONSTRAINT `loker_ibfk_3` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
