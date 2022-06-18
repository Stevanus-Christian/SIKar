-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 03:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawansi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hari` varchar(250) NOT NULL,
  `tanggal` varchar(250) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `status_absen` varchar(100) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `id_karyawan`, `nama`, `hari`, `tanggal`, `waktu`, `status_absen`, `latitude`, `longitude`) VALUES
(75, 1923240059, 'Stevanus Christian', 'Wednesday', '08-06-2022', '18:45:14', 'Pulang', '-2.9668694', '104.7404383'),
(76, 1923240059, 'Stevanus Christian', 'Saturday', '11-06-2022', '10:36:31', 'Masuk', '-2.9738416', '104.7640647'),
(80, 1923240059, 'Stevanus Christian', 'Monday', '13-06-2022', '19:41:52', 'Pulang', '-2.9627668', '104.7400274'),
(81, 1923240059, 'Stevanus Christian', 'Wednesday', '15-06-2022', '17:27:04', 'Pulang', '-2.9627635', '104.7399998'),
(83, 1923240059, 'Stevanus Christian', 'Thursday', '16-06-2022', '14:18:06', 'Masuk', '-2.9687808', '104.7658496'),
(84, 1923240085, 'Tasya Angelya', 'Saturday', '18-06-2022', '10:48:47', 'Masuk', '-2.9737083', '104.7640244'),
(85, 1923240001, 'Robby Pratama', 'Saturday', '18-06-2022', '10:49:14', 'Masuk', '-2.9736416', '104.7640947');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_daftar`
--

INSERT INTO `tb_daftar` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(12, 'steven', 'steven'),
(13, 'tasya', 'tasya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`) VALUES
(11, 'Admin Lokasi'),
(3, 'CEO'),
(5, 'CFO'),
(7, 'CMO'),
(8, 'COO'),
(4, 'CTO'),
(12, 'Finance Officer'),
(13, 'Helper'),
(10, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmp_tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tel` varchar(18) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `username`, `password`, `nama`, `tmp_tgl_lahir`, `jenkel`, `agama`, `alamat`, `no_tel`, `jabatan`, `foto`) VALUES
(1923240001, 'robby', '8d05dd2f03981f86b56c23951f3f34d7', 'Robby Pratama', 'Palembang, 12 Desember 1992', 'Laki-laki', 'Katholik', 'KM. 20 Air Batu', '0812345678910', 'Helper', '180620220548245221e6fdd3f45_5221e6fdd5088.jpg'),
(1923240059, 'steven', '6ed61d4b80bb0f81937b32418e98adca', 'Stevanus Christian', 'Jakarta, 23 Desember 2001', 'Laki-laki', 'Kristen', 'Sako', '08982300710', 'CEO', '30042022072444IMG_20220328_115225_358.jpg'),
(1923240085, 'tasya', 'a208fb8e30446eb35afa20a299a94962', 'Tasya Angelya', 'Palembang, 08 Agustus 2001', 'Perempuan', 'Buddha', 'Simpang Kades', '085367819898', 'CTO', '3004202207395820220423-064447.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id`, `id_karyawan`, `nama`, `keterangan`, `alasan`, `waktu`, `bukti`) VALUES
(68, 1923240059, 'Stevanus Christian', 'Sakit', 'Selamat pagi, saya izin tidak masuk kerja dikarenakan saya sedang sakit. Untuk surat keterangan sakitnya terlampir. Terima kasih', 'Saturday, 30-04-2022 01:23:19 PM', '30042022082422Danshi no Blog.jpg'),
(70, 1923240085, 'Tasya Angelya', 'Izin', 'Pagi pak saya izin tidak masuk kerja hari ini dikarenakan ada urusan keluarga. Terimakasih atas pengertiannya.', 'Saturday, 30-04-2022 01:27:09 PM', '30042022082743izin.jpg'),
(78, 1923240059, 'Stevanus Christian', 'Izin', 'Saya izin karena ada urusan keluarga. Terimakasih', 'Thursday, 16-06-2022 14:19:05', '16062022092006surat-izin-kerja-menikah.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD CONSTRAINT `tb_absen_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `tb_jabatan` (`jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD CONSTRAINT `tb_keterangan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
