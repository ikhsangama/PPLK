-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 03:57 AM
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
  `tipe` varchar(50) NOT NULL,
  `usia_min` int(50) NOT NULL,
  `usia_max` int(50) NOT NULL,
  `gaji_min` int(50) NOT NULL,
  `gaji_max` int(50) NOT NULL,
  `nama_cp` varchar(50) NOT NULL,
  `email_cp` varchar(50) NOT NULL,
  `no_telp_cp` varchar(50) NOT NULL,
  `tgl_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` datetime NOT NULL,
  `tgl_expired` datetime NOT NULL,
  `deskripsi_loker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password` varchar(50) NOT NULL,
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
(1, '0', '$2y$10$RM8Ioy3FQlVyVxasBkpZvu20zZmaBxSlBL1u2aBYksC', 'asd', 'ad', 'ko', 'em', 'no', '2018-09-29 03:49:15'),
(2, '0', '$2y$10$w4c.IMdAKH/Gf20SIidv5ORDLFn/4tUDMCHnT4vdT2G', 'namapw', 'alamatw', 'kotaw', 'emailw', '111', '2018-09-29 03:50:40'),
(3, 'ee', '$2y$10$d7O55eYFljYXsCjrP2kiw.X.tvqEKO4gBmpW.H6h0YZ', 'e', 'e', 'e', 'e', 'e', '2018-09-29 08:23:38'),
(4, 'ee', '$2y$10$PN//nCG/4.ixP/oPmyaTWefqFb9e5K3eLkbDJOyavP2', 'e', 'e', 'e', 'e', 'e', '2018-09-29 08:55:02'),
(5, 'a', '$2y$10$LaJXvOOhIFSlCW7t2uWAmuWvyavUWwUfRRAKqIXjijK', 'a', 'a', 'a', 'a', 'a', '2018-09-29 08:55:11');

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
  ADD PRIMARY KEY (`idloker`);

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
  MODIFY `idbidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `idloker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `idpencaker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idperusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `idtingkat_pendidikan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
