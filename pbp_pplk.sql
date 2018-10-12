-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 08:46 PM
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

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`idriwayat_pekerjaan`, `idpencaker`, `idbidang`, `perusahaan`, `kota`, `bln_masuk`, `thn_masuk`, `bln_lulus`, `thn_lulus`, `deskripsi_pekerjaan`) VALUES
(11, 3, 3, 'PT.Rapi Trans Logistik Indonesia', 'Jakarta Barat', 'Januari', 2003, 'Mei', 2015, 'Mampu bekerja cekatan'),
(12, 4, 4, 'PT Lippo General Insurance Tbk', 'Jakarta Raya', 'Januari', 2004, 'Mei', 2016, 'Berpenampilan baik. Memiliki kemampuan komunikasi yang baik. Memiliki motivasi yang tinggi.'),
(13, 1, 1, 'PT.Kayu Lapis', 'Semarang', 'Mei', 2004, 'Mei', 2016, 'Mendapat banyak pengetahuan yang baru.'),
(14, 2, 2, 'PT.Transcosmos Indonesia', 'Jakarta', 'April', 2003, 'Januari', 2015, 'mendapat banyak pengalaman yang baru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`idriwayat_pekerjaan`),
  ADD KEY `idpencaker` (`idpencaker`),
  ADD KEY `idbidang` (`idbidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `idriwayat_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84084;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`idpencaker`) REFERENCES `pencaker` (`idpencaker`),
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_2` FOREIGN KEY (`idbidang`) REFERENCES `bidang_pekerjaan` (`idbidang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
