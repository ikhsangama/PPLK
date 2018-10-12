-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 04:08 PM
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
  `tgl_apply` date DEFAULT NULL,
  `status` set('Proses Seleksi','Panggilan Tes','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_loker`
--

INSERT INTO `apply_loker` (`idapply`, `idloker`, `idpencaker`, `tgl_apply`, `status`) VALUES
(1, 15, 1, '2018-10-09', 'Diterima'),
(2, 15, 2, '2018-10-09', 'Proses Seleksi'),
(3, 16, 3, '2018-10-09', 'Diterima'),
(4, 16, 1, '2018-10-10', 'Ditolak'),
(5, 15, 3, '2018-10-09', 'Proses Seleksi'),
(6, 15, 4, '2018-10-10', 'Diterima');

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
  `deskripsi_loker` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`idloker`, `idperusahaan`, `nama`, `idbidang`, `idtingkat_pendidikan`, `tipe`, `usia_min`, `usia_max`, `gaji_min`, `gaji_max`, `nama_cp`, `email_cp`, `no_telp_cp`, `tgl_insert`, `tgl_update`, `tgl_expired`, `deskripsi_loker`) VALUES
(11, 2, 'nnn', 3, 3, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-09', ''),
(12, 2, 'lolo', 4, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-13', ''),
(13, 2, 'kkk', 1, 4, '', 0, 0, 0, 0, '', '', '', '2018-10-08', NULL, '2018-10-09', ''),
(15, 1, 'Employee Relation', 1, 3, 'Full Time', 20, 30, 1000000, 6000000, 'Ikhsan', 'ikhsangama@gmail.com', '09090909', '2018-10-08', '2018-10-09', '2018-10-11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.              '),
(16, 1, 'OA Staff', 2, 1, 'Full Time', 20, 25, 100000, 1000000, 'Ikhsan', 'ikhsangama@gmail.com', '0809090909', '2018-10-09', '2018-10-09', '2018-10-31', 'Lorem');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `idpencaker` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` set('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'uploads/anonim.png',
  `bidang_pekerjaan` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`idpencaker`, `nama`, `password`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `email`, `no_telp`, `foto`, `bidang_pekerjaan`, `tgl_daftar`) VALUES
(1, 'Andi Irwan', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'Laki-laki', 'Semarang', '1994-10-09', 'Jl Tejosari Raya perum Grafika Citra Sentosa B1/2', 'Semarang', 'andi_irwan@gmail.com', '0809090909', 'uploads/foto1.jpg', 'Seniman', '2018-10-09'),
(2, 'Iman Setya', '5be9a68073f66a56554e25614e9f1c9a', 'Laki-laki', 'Semarang', '1994-10-09', 'Jl. Semarang', 'Semarang', 'iman@gmail.com', '0809090909', 'uploads/anonim.png', 'Developer', '2018-10-09'),
(3, 'Ikhsan Wisnuadji', '4e9194a3bb65ab53e41247480905c391', 'Laki-laki', 'Semarang', '1994-10-09', 'Jl. Semarang raya', 'Semarang', 'ikhsan@gmail.com', '08090909', 'uploads/anonim.png', 'Developer', '2018-10-09'),
(4, 'Athalia', 'athalia', 'Perempuan', 'Semarang', '1994-10-09', 'Jl. Semarang', 'Semarang', 'athalia@gmail.com', '08090909', 'uploads/anonim.png', 'Project Manajer', '2018-10-09');

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
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `nama`, `password`, `nama_pemilik`, `alamat`, `kota`, `email`, `no_telp`, `tgl_daftar`) VALUES
(1, 'PT Transcosmos Indonesia', '$2y$10$5t1eT98DxqNZrbx9wZybnuDZ1VrUK7tBpVOw4wjXj3C68Wxmqfm/e', 'Ikhsan', 'RDTX Tower, Jl. Gd. RDTX Tower Lt.7 Jl. Prof. Dr. Satrio Kav E4, Mega Kuningan, Jakarta Selatan', 'Jakarta', 'lll@gmail.com', '080989999', '2018-10-07'),
(2, 'ppp', '$2y$10$7G1Ksn5M3.2OXeq59VVLaOa9dBfYyjGY8TpHx4l27aUDsHi9T0i8C', '', '', '', 'ppp@gmail.com', '', '2018-10-08');

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
  ADD PRIMARY KEY (`idapply`),
  ADD KEY `idloker` (`idloker`),
  ADD KEY `idpencaker` (`idpencaker`);

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
  MODIFY `idapply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  MODIFY `idbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `idloker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `idpencaker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD CONSTRAINT `apply_loker_ibfk_1` FOREIGN KEY (`idloker`) REFERENCES `loker` (`idloker`),
  ADD CONSTRAINT `apply_loker_ibfk_2` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`);

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
