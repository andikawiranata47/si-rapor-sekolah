-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 09:23 AM
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
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `Id_General` int(11) NOT NULL,
  `Nama_Sekolah` varchar(50) NOT NULL,
  `Nama_Kepsek` varchar(50) NOT NULL,
  `NIP_Kepsek` varchar(20) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`Id_General`, `Nama_Sekolah`, `Nama_Kepsek`, `NIP_Kepsek`, `Semester`, `Tahun_Ajaran`) VALUES
(1, 'SMK Kosgoro Pare', 'Drs. Yuyanto, S.Pd.', '198609262015051001', 'Ganjil', '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Id_Kelas` int(5) NOT NULL,
  `Wali_Kelas` int(5) NOT NULL,
  `Tingkat` int(2) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Abjad` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Id_Kelas`, `Wali_Kelas`, `Tingkat`, `Jurusan`, `Abjad`) VALUES
(1, 31, 10, 'TKR', 'A'),
(3, 39, 12, 'TKR', 'C'),
(4, 11, 11, 'TKR', 'B'),
(6, 40, 10, 'ATP', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `kepribadian`
--

CREATE TABLE `kepribadian` (
  `Id_Kepribadian` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Kepribadian` varchar(255) NOT NULL,
  `Sakit` int(3) NOT NULL DEFAULT 0,
  `Izin` int(3) NOT NULL DEFAULT 0,
  `Tanpa_Keterangan` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepribadian`
--

INSERT INTO `kepribadian` (`Id_Kepribadian`, `Id_Siswa`, `Semester`, `Tahun_Ajaran`, `Kepribadian`, `Sakit`, `Izin`, `Tanpa_Keterangan`) VALUES
(1, 3, 'Ganjil', '2022/2023', 'Tidak pernah mengerjakan PR', 1, 2, 3),
(2, 4, 'Ganjil', '2022/2023', 'Sering bolos kelas', 1, 1, 15),
(6, 5, 'Ganjil', '2022/2023', 'Suka ke kantin', 1, 1, 1),
(7, 6, 'Ganjil', '2022/2023', 'BAIK', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Mata_Pelajaran` varchar(50) NOT NULL,
  `Kelompok` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`Id_Mata_Pelajaran`, `Mata_Pelajaran`, `Kelompok`) VALUES
(2, 'Pendidikan Jasmani', 'A'),
(3, 'Fisika', 'B'),
(4, 'Bahasa Indonesia', 'A'),
(5, 'Bahasa Inggris', 'B'),
(6, 'Pendidikan Agama', 'A'),
(7, 'Pendidikan Kewarganegaraan', 'A'),
(8, 'Seni Budaya', 'A'),
(9, 'Budi Pekerti', 'A'),
(10, 'Matematika', 'B'),
(11, 'IPA', 'B'),
(12, 'Kimia', 'B'),
(13, 'IPS', 'B'),
(14, 'Keterampilan Komputer', 'B'),
(15, 'Kewirausahaan', 'B'),
(16, 'Bahasa Jawa', 'D'),
(17, 'PDTM', 'C'),
(18, 'Pembacaan dan Pemahaman Gambar Teknik', 'C'),
(19, 'Penggunaan dan Pemeliharaan Alat Ukur ', 'C'),
(20, 'Mengikuti Proses Kesehatan dan Keselamatan Kerja', 'C'),
(21, 'Penggunaan & Pemeliharaan Peralatan & Perlengkapan', 'C'),
(22, 'Pelaksanaan Operasi Penanganan Secara Manual', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran_suatu_kelas`
--

CREATE TABLE `mata_pelajaran_suatu_kelas` (
  `Id_Mapel_Kelas` int(5) NOT NULL,
  `Id_Kelas` int(5) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran_suatu_kelas`
--

INSERT INTO `mata_pelajaran_suatu_kelas` (`Id_Mapel_Kelas`, `Id_Kelas`, `Id_Mata_Pelajaran`) VALUES
(1, 1, 2),
(3, 3, 2),
(8, 4, 2),
(9, 4, 4),
(11, 4, 3),
(24, 1, 3),
(25, 6, 2),
(26, 1, 12),
(27, 1, 9),
(28, 1, 8),
(29, 1, 7),
(30, 1, 6),
(31, 1, 14),
(32, 1, 4),
(33, 1, 15),
(34, 1, 13),
(35, 1, 11),
(36, 1, 10),
(37, 1, 5),
(38, 1, 21),
(39, 1, 20),
(40, 1, 19),
(41, 1, 18),
(42, 1, 17),
(43, 1, 22),
(44, 1, 16),
(45, 6, 9),
(46, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstrakurikuler`
--

CREATE TABLE `nilai_ekstrakurikuler` (
  `Id_Nilai_Ekstrakurikuler` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Nama_Ekstrakurikuler` varchar(100) NOT NULL,
  `Predikat` varchar(20) NOT NULL,
  `Pembina` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_ekstrakurikuler`
--

INSERT INTO `nilai_ekstrakurikuler` (`Id_Nilai_Ekstrakurikuler`, `Id_Siswa`, `Semester`, `Tahun_Ajaran`, `Nama_Ekstrakurikuler`, `Predikat`, `Pembina`) VALUES
(1, 3, 'Ganjil', '2022/2023', 'Pramuka', 'Cukup', 38),
(3, 4, 'Ganjil', '2022/2023', 'Seni', 'Baik', 38),
(4, 3, 'Ganjil', '2022/2023', 'Seni', 'Baik', 31),
(5, 6, 'Ganjil', '2022/2023', 'PRAMUKA', 'Baik', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran`
--

CREATE TABLE `nilai_mata_pelajaran` (
  `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `TP1` int(3) NOT NULL DEFAULT 0,
  `TP2` int(3) NOT NULL DEFAULT 0,
  `TP3` int(3) NOT NULL DEFAULT 0,
  `TP4` int(3) NOT NULL DEFAULT 0,
  `TP5` int(3) NOT NULL DEFAULT 0,
  `TP6` int(3) NOT NULL DEFAULT 0,
  `TP7` int(3) NOT NULL DEFAULT 0,
  `Nilai_Akhir` int(3) NOT NULL DEFAULT 0,
  `Capaian_Kompetensi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mata_pelajaran`
--

INSERT INTO `nilai_mata_pelajaran` (`Id_Nilai_Mata_Pelajaran`, `Id_Mata_Pelajaran`, `Id_Siswa`, `Semester`, `Tahun_Ajaran`, `TP1`, `TP2`, `TP3`, `TP4`, `TP5`, `TP6`, `TP7`, `Nilai_Akhir`, `Capaian_Kompetensi`) VALUES
(69, 2, 3, 'Ganjil', '2022/2023', 90, 0, 0, 0, 0, 0, 0, 90, 'cukup baik dalam menerima pembelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran_backup`
--

CREATE TABLE `nilai_mata_pelajaran_backup` (
  `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Jenis_Nilai` varchar(15) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Nilai_UH` int(3) NOT NULL DEFAULT 0,
  `Nilai_UTS` int(3) NOT NULL DEFAULT 0,
  `Nilai_UAS` int(3) NOT NULL DEFAULT 0,
  `Nilai_Akhir` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mata_pelajaran_backup`
--

INSERT INTO `nilai_mata_pelajaran_backup` (`Id_Nilai_Mata_Pelajaran`, `Id_Mata_Pelajaran`, `Id_Siswa`, `Jenis_Nilai`, `Semester`, `Tahun_Ajaran`, `Nilai_UH`, `Nilai_UTS`, `Nilai_UAS`, `Nilai_Akhir`) VALUES
(3, 2, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 80, 90, 90, 87),
(6, 2, 4, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 70, 80, 73),
(13, 2, 5, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 70, 70, 70),
(14, 2, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 70, 70, 70),
(15, 2, 4, 'Keterampilan', 'Ganjil', '2022/2023', 80, 80, 80, 80),
(16, 4, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 95, 90, 93, 93),
(17, 9, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(18, 9, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 70, 90, 77),
(19, 8, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 85, 87, 90, 87),
(20, 8, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 78, 90, 83),
(21, 7, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 95, 78, 76, 83),
(22, 7, 3, 'Keterampilan', 'Ganjil', '2022/2023', 85, 70, 76, 77),
(23, 6, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 70, 70, 70),
(24, 6, 3, 'Keterampilan', 'Ganjil', '2022/2023', 85, 87, 76, 83),
(25, 4, 3, 'Keterampilan', 'Ganjil', '2022/2023', 95, 90, 90, 92),
(26, 14, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(27, 14, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 70, 90, 80),
(28, 15, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 80, 70, 90, 80),
(29, 15, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 70, 90, 80),
(30, 13, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(31, 13, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 70, 90, 80),
(32, 12, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(33, 12, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(34, 11, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 76, 75),
(35, 11, 3, 'Keterampilan', 'Ganjil', '2022/2023', 95, 70, 70, 78),
(36, 10, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 95, 70, 80, 82),
(37, 10, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(38, 5, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(39, 5, 3, 'Keterampilan', 'Ganjil', '2022/2023', 95, 70, 80, 82),
(40, 3, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 85, 87, 90, 87),
(41, 3, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 80, 80, 80),
(42, 21, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(43, 21, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 90, 80),
(44, 20, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(45, 20, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(46, 19, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 80, 70, 90, 80),
(47, 19, 3, 'Keterampilan', 'Ganjil', '2022/2023', 80, 70, 70, 73),
(48, 18, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(49, 18, 3, 'Keterampilan', 'Ganjil', '2022/2023', 95, 70, 90, 85),
(50, 17, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(51, 17, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(52, 22, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 95, 87, 76, 86),
(53, 22, 3, 'Keterampilan', 'Ganjil', '2022/2023', 95, 70, 90, 85),
(54, 16, 3, 'Pengetahuan', 'Ganjil', '2022/2023', 80, 80, 80, 80),
(55, 16, 3, 'Keterampilan', 'Ganjil', '2022/2023', 70, 80, 80, 77),
(56, 10, 4, 'Pengetahuan', 'Ganjil', '2022/2023', 70, 87, 90, 82),
(57, 10, 6, 'Pengetahuan', 'Ganjil', '2022/2023', 80, 78, 76, 78);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran_backup_1`
--

CREATE TABLE `nilai_mata_pelajaran_backup_1` (
  `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Mata_Pelajaran` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Nilai_Akhir` int(3) NOT NULL DEFAULT 0,
  `Capaian_Kompetensi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mata_pelajaran_backup_1`
--

INSERT INTO `nilai_mata_pelajaran_backup_1` (`Id_Nilai_Mata_Pelajaran`, `Id_Mata_Pelajaran`, `Id_Siswa`, `Semester`, `Tahun_Ajaran`, `Nilai_Akhir`, `Capaian_Kompetensi`) VALUES
(3, 2, 3, 'Ganjil', '2022/2023', 87, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(6, 2, 4, 'Ganjil', '2022/2023', 73, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(13, 2, 5, 'Ganjil', '2022/2023', 70, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(16, 4, 3, 'Ganjil', '2022/2023', 93, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(17, 9, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(19, 8, 3, 'Ganjil', '2022/2023', 87, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(21, 7, 3, 'Ganjil', '2022/2023', 83, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(23, 6, 3, 'Ganjil', '2022/2023', 70, 'Menunjukkan pemahaman yang cukup terhadap materi serta aktif dalam kegiatan kelompok<br />\r\nPerlu pendampingan lebih dalam materi tertentu'),
(26, 14, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(28, 15, 3, 'Ganjil', '2022/2023', 80, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(30, 13, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(32, 12, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(34, 11, 3, 'Ganjil', '2022/2023', 75, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(36, 10, 3, 'Ganjil', '2022/2023', 82, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(38, 5, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(40, 3, 3, 'Ganjil', '2022/2023', 87, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(42, 21, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(44, 20, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(46, 19, 3, 'Ganjil', '2022/2023', 80, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(48, 18, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(50, 17, 3, 'Ganjil', '2022/2023', 77, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(52, 22, 3, 'Ganjil', '2022/2023', 86, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(54, 16, 3, 'Ganjil', '2022/2023', 80, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(56, 10, 4, 'Ganjil', '2022/2023', 82, 'Menunjukkan pemahaman yang baik terhadap materi serta aktif dalam kegiatan kelompok'),
(57, 10, 6, 'Ganjil', '2022/2023', 78, 'Pemahaman cukup baik'),
(59, 14, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(60, 12, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(61, 19, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(62, 18, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(63, 16, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(64, 4, 6, 'Ganjil', '2022/2023', 80, 'Pemahaman cukup baik'),
(65, 2, 6, 'Ganjil', '2022/2023', 90, 'Memiliki pemahaman yang baik terhadap materi');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prakerin`
--

CREATE TABLE `nilai_prakerin` (
  `Id_Nilai_Prakerin` int(5) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Nama_Instansi` varchar(100) NOT NULL,
  `Alamat_Instansi` varchar(250) NOT NULL,
  `Waktu_Mulai` date NOT NULL,
  `Waktu_Selesai` date NOT NULL,
  `Nilai_Prakerin` int(3) NOT NULL DEFAULT 0,
  `Guru_Monitoring` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_prakerin`
--

INSERT INTO `nilai_prakerin` (`Id_Nilai_Prakerin`, `Id_Siswa`, `Semester`, `Tahun_Ajaran`, `Nama_Instansi`, `Alamat_Instansi`, `Waktu_Mulai`, `Waktu_Selesai`, `Nilai_Prakerin`, `Guru_Monitoring`) VALUES
(1, 3, 'Ganjil', '2022/2023', 'PT Angkasa Pura', 'Jl. Jakarta 15', '2023-03-09', '2023-03-10', 90, 31),
(4, 4, 'Ganjil', '2022/2023', 'PT Satu Dua', 'Surabaya', '2023-03-07', '2023-03-08', 80, 31),
(10, 6, 'Ganjil', '2022/2023', 'PT ABC', 'Kediri', '2023-06-12', '2023-07-04', 90, 31);

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE `rapor` (
  `Id_Rapor` int(5) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Tahun_Ajaran` varchar(10) NOT NULL,
  `Id_Siswa` int(5) NOT NULL,
  `Is_Validasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`Id_Rapor`, `Semester`, `Tahun_Ajaran`, `Id_Siswa`, `Is_Validasi`) VALUES
(6, 'Ganjil', '2022/2023', 3, 1),
(7, 'Ganjil', '2022/2023', 4, 0),
(8, 'Ganjil', '2022/2023', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `Id_Siswa` int(5) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `Id_Kelas` int(5) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Fase` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Id_Siswa`, `NIS`, `NISN`, `Id_Kelas`, `Nama`, `Fase`) VALUES
(3, '1234', '12345', 1, 'andi', 'A'),
(4, '3456', '34567', 1, 'budi', 'B'),
(5, '4567', '45678', 1, 'caca', 'C'),
(6, '123', '12345', 1, 'dania', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `Akses` varchar(255) DEFAULT NULL,
  `TTD` varchar(255) DEFAULT NULL,
  `Is_Wali_Kelas` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Email`, `Password`, `Nama`, `NIP`, `Akses`, `TTD`, `Is_Wali_Kelas`) VALUES
(11, 'c@email.com', 'abc', 'Bapak C', '3456', 'Guru Mata Pelajaran, Guru Monitoring, Pembina Ekstrakurikuler, Guru BK', 'ttd3.png', 1),
(31, 'b@email.com', 'abc', 'Bapak B', '2345', 'Guru Mata Pelajaran, Guru Monitoring, Pembina Ekstrakurikuler, Guru BK', 'ttd2.png', 1),
(38, 'a@email.com', 'abc', 'Bapak A', '1234', 'Kepala Sekolah, Admin', 'ttd1.png', 0),
(39, 'd@email.com', 'abc', 'Bapak D', '4567', 'Guru Mata Pelajaran, Pembina Ekstrakurikuler', 'ttd4.png', 1),
(40, 'e@email.com', 'abc', 'Bapak E', '5678', 'Guru Monitoring, Guru BK', 'ttd5.png', 1),
(41, 'f@email.com', 'abc', 'Bapak F', '', 'Admin', 'ttd6.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`Id_General`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_Kelas`);

--
-- Indexes for table `kepribadian`
--
ALTER TABLE `kepribadian`
  ADD PRIMARY KEY (`Id_Kepribadian`);

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
-- Indexes for table `nilai_mata_pelajaran_backup`
--
ALTER TABLE `nilai_mata_pelajaran_backup`
  ADD PRIMARY KEY (`Id_Nilai_Mata_Pelajaran`);

--
-- Indexes for table `nilai_mata_pelajaran_backup_1`
--
ALTER TABLE `nilai_mata_pelajaran_backup_1`
  ADD PRIMARY KEY (`Id_Nilai_Mata_Pelajaran`);

--
-- Indexes for table `nilai_prakerin`
--
ALTER TABLE `nilai_prakerin`
  ADD PRIMARY KEY (`Id_Nilai_Prakerin`);

--
-- Indexes for table `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`Id_Rapor`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Id_Siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `Id_General` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `Id_Kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kepribadian`
--
ALTER TABLE `kepribadian`
  MODIFY `Id_Kepribadian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `Id_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mata_pelajaran_suatu_kelas`
--
ALTER TABLE `mata_pelajaran_suatu_kelas`
  MODIFY `Id_Mapel_Kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `nilai_ekstrakurikuler`
--
ALTER TABLE `nilai_ekstrakurikuler`
  MODIFY `Id_Nilai_Ekstrakurikuler` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  MODIFY `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran_backup`
--
ALTER TABLE `nilai_mata_pelajaran_backup`
  MODIFY `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran_backup_1`
--
ALTER TABLE `nilai_mata_pelajaran_backup_1`
  MODIFY `Id_Nilai_Mata_Pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `nilai_prakerin`
--
ALTER TABLE `nilai_prakerin`
  MODIFY `Id_Nilai_Prakerin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rapor`
--
ALTER TABLE `rapor`
  MODIFY `Id_Rapor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `Id_Siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
