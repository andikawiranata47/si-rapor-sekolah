-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 07:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_rapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `Id_Hak_Akses` int(5) NOT NULL,
  `Id_User` int(5) NOT NULL,
  `Hak_Akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`Id_Hak_Akses`, `Id_User`, `Hak_Akses`) VALUES
(1, 11, 'Guru Mata Pelajaran'),
(2, 11, 'Admin'),
(8, 30, 'Admin'),
(9, 31, 'Guru Mata Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Id_Kelas` int(5) NOT NULL,
  `Wali_Kelas` int(5) NOT NULL,
  `Tingkat` int(2) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Abjad` char(1) NOT NULL,
  `Kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Id_Kelas`, `Wali_Kelas`, `Tingkat`, `Jurusan`, `Abjad`, `Kelas`) VALUES
(1, 11, 10, 'TKR', 'A', '10-TKR-A'),
(2, 30, 11, 'TKR', 'A', '11-TKR-A');

-- --------------------------------------------------------

--
-- Table structure for table `kepribadian_ketidakhadiran`
--

CREATE TABLE `kepribadian_ketidakhadiran` (
  `Id_Kehadiran` int(5) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Kepribadian` varchar(255) NOT NULL,
  `Sakit` int(3) NOT NULL DEFAULT 0,
  `Izin` int(3) NOT NULL DEFAULT 0,
  `Tanpa_Keterangan` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Mata_Pelajaran` varchar(50) NOT NULL,
  `Kelompok` char(1) NOT NULL,
  `KKM` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`Id_Mata_Pelajaran`, `Mata_Pelajaran`, `Kelompok`, `KKM`) VALUES
(2, 'Bahasa Indonesia', 'A', 70),
(3, 'Fisika', 'A', 70);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran_suatu_kelas`
--

CREATE TABLE `mata_pelajaran_suatu_kelas` (
  `Id_Mapel_Kelas` int(5) NOT NULL,
  `Id_Kelas` int(5) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Guru_Mapel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran_suatu_kelas`
--

INSERT INTO `mata_pelajaran_suatu_kelas` (`Id_Mapel_Kelas`, `Id_Kelas`, `Id_Mata_Pelajaran`, `Guru_Mapel`) VALUES
(1, 1, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstrakurikuler`
--

CREATE TABLE `nilai_ekstrakurikuler` (
  `Id_Nilai_Ekstrakurikuler` int(5) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Nama_Ekstrakurikuler` varchar(100) NOT NULL,
  `Predikat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran`
--

CREATE TABLE `nilai_mata_pelajaran` (
  `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Jenis_Nilai` varchar(20) NOT NULL,
  `Nilai_UH` int(3) NOT NULL DEFAULT 0,
  `Nilai_UTS` int(3) NOT NULL DEFAULT 0,
  `Nilai_UAS` int(3) NOT NULL DEFAULT 0,
  `Nilai_Akhir` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mata_pelajaran`
--

INSERT INTO `nilai_mata_pelajaran` (`Id_Nilai_Mata_Pelajaran`, `NIS`, `Id_Mata_Pelajaran`, `Jenis_Nilai`, `Nilai_UH`, `Nilai_UTS`, `Nilai_UAS`, `Nilai_Akhir`) VALUES
(2, '101', 2, 'Keterampilan', 70, 80, 90, 80);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prakerin`
--

CREATE TABLE `nilai_prakerin` (
  `Id_Nilai_Prakerin` int(5) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Nama_Instansi` varchar(100) NOT NULL,
  `Alamat_Instansi` varchar(250) NOT NULL,
  `Waktu_Pelaksanaan` varchar(50) NOT NULL,
  `Nilai_Prakerin` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(10) NOT NULL,
  `Id_Kelas` int(5) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Nama_Orangtua` varchar(100) NOT NULL,
  `Alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `Id_Kelas`, `Nama`, `Tanggal_Masuk`, `Nama_Orangtua`, `Alamat`) VALUES
('101', NULL, 'Andika', '2022-12-31', 'Bapak A', 'Kediri'),
('102', 1, 'Wiranata', '2022-11-03', 'Bapak B', 'Kediri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Hak_Akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Email`, `Password`, `Nama`, `Hak_Akses`) VALUES
(11, 'gurumm@gmail.com', 'gurumm123', 'Guru Matematika 1', ''),
(30, 'gurubahasa@gmail.com', 'gurubahasa123', 'Guru Bahasa 1', ''),
(31, 'gurubahasa@gmail.com', 'gurubahasa123', 'Guru Bahasa 1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`Id_Hak_Akses`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_Kelas`);

--
-- Indexes for table `kepribadian_ketidakhadiran`
--
ALTER TABLE `kepribadian_ketidakhadiran`
  ADD PRIMARY KEY (`Id_Kehadiran`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`Id_Mata_Pelajaran`);

--
-- Indexes for table `mata_pelajaran_suatu_kelas`
--
ALTER TABLE `mata_pelajaran_suatu_kelas`
  ADD PRIMARY KEY (`Id_Mapel_Kelas`);

--
-- Indexes for table `nilai_ekstrakurikuler`
--
ALTER TABLE `nilai_ekstrakurikuler`
  ADD PRIMARY KEY (`Id_Nilai_Ekstrakurikuler`);

--
-- Indexes for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  ADD PRIMARY KEY (`Id_Nilai_Mata_Pelajaran`);

--
-- Indexes for table `nilai_prakerin`
--
ALTER TABLE `nilai_prakerin`
  ADD PRIMARY KEY (`Id_Nilai_Prakerin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `Id_Hak_Akses` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `Id_Kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepribadian_ketidakhadiran`
--
ALTER TABLE `kepribadian_ketidakhadiran`
  MODIFY `Id_Kehadiran` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `Id_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran_suatu_kelas`
--
ALTER TABLE `mata_pelajaran_suatu_kelas`
  MODIFY `Id_Mapel_Kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_ekstrakurikuler`
--
ALTER TABLE `nilai_ekstrakurikuler`
  MODIFY `Id_Nilai_Ekstrakurikuler` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  MODIFY `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_prakerin`
--
ALTER TABLE `nilai_prakerin`
  MODIFY `Id_Nilai_Prakerin` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
