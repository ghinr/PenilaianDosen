-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 06:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_penilaian`
--

CREATE TABLE `dt_penilaian` (
  `ID` int(25) NOT NULL,
  `NIM` varchar(25) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `JENIS_KELAMIN` varchar(20) NOT NULL,
  `JURUSAN` varchar(35) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `NAMA_DOSEN` varchar(70) NOT NULL,
  `MATAKULIAH_YANG_DIAMPU` varchar(50) NOT NULL,
  `INDIKATOR_KINERJA_UTAMA` varchar(300) NOT NULL,
  `KESAN_DAN_PESAN` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_penilaian`
--

INSERT INTO `dt_penilaian` (`ID`, `NIM`, `NAMA`, `JENIS_KELAMIN`, `JURUSAN`, `SEMESTER`, `NAMA_DOSEN`, `MATAKULIAH_YANG_DIAMPU`, `INDIKATOR_KINERJA_UTAMA`, `KESAN_DAN_PESAN`) VALUES
(1, '227064516084', 'Ghina R', 'Perempuan', 'Informatika', '2', 'Agus Iskandar, S.Kom, M.Kom', 'Pemrograman Web', 'Penjelasan Dosen Mudah Dimengerti, Bahan Ajar Dosen Lengkap, Dosen Komunikatif, Ketepatan Waktu dalam mengawali dan mengakhiri perkuliahan, Dosen Memberikan Tugas Yang Sesuai', 'Oke');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_penilaian`
--
ALTER TABLE `dt_penilaian`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_penilaian`
--
ALTER TABLE `dt_penilaian`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
