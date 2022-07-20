-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 02:21 PM
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
  `waktu_masuk` varchar(255) DEFAULT NULL,
  `waktu_pulang` varchar(250) DEFAULT NULL,
  `status_absen` varchar(100) NOT NULL,
  `latitude` varchar(250) DEFAULT NULL,
  `longitude` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `id_karyawan`, `nama`, `hari`, `tanggal`, `waktu_masuk`, `waktu_pulang`, `status_absen`, `latitude`, `longitude`) VALUES
(102, 1923240059, 'Stevanus Christian', 'Sabtu', '16-07-2022', '12:31:58', '12:33:30', 'Hadir', '-2.9278101', '104.7637733'),
(103, 1923240085, 'Tasya Angelya', 'Sabtu', '16-07-2022', '15:45:45', '15:54:19', 'Hadir', '', ''),
(104, 1923240001, 'Robby Pratama', 'Sabtu', '16-07-2022', '15:56:14', '15:57:37', 'Hadir', '', ''),
(105, 1923240001, 'Robby Pratama', 'Sabtu', '16-07-2022', '', '', 'Sakit', '', ''),
(106, 1923240085, 'Tasya Angelya', 'Sabtu', '16-07-2022', '', '', 'Izin', '', ''),
(107, 1923240059, 'Stevanus Christian', 'Rabu', '20-07-2022', '13:17:18', '13:17:49', 'Hadir', '-2.9738361', '104.7640582'),
(108, 1923240085, 'Tasya Angelya', 'Rabu', '20-07-2022', '13:19:06', '13:19:23', 'Hadir', '-2.9736785', '104.7640929'),
(109, 1923240100, 'Varelly Alvin', 'Rabu', '20-07-2022', '19:06:34', '19:08:16', 'Hadir', '', '');

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

INSERT INTO `tb_karyawan` (`id_karyawan`, `password`, `nama`, `tmp_tgl_lahir`, `jenkel`, `agama`, `alamat`, `no_tel`, `jabatan`, `foto`) VALUES
(1923240001, '8d05dd2f03981f86b56c23951f3f34d7', 'Robby Pratama', 'Palembang, 12 Desember 1992', 'Laki-laki', 'Katholik', 'KM. 20 Air Batu', '0812345678910', 'Helper', '180620220548245221e6fdd3f45_5221e6fdd5088.jpg'),
(1923240059, '6ed61d4b80bb0f81937b32418e98adca', 'Stevanus Christian', 'Jakarta, 23 Desember 2001', 'Laki-laki', 'Kristen', 'Sako', '08982300710', 'CEO', '30042022072444IMG_20220328_115225_358.jpg'),
(1923240085, 'a208fb8e30446eb35afa20a299a94962', 'Tasya Angelya', 'Palembang, 08 Agustus 2001', 'Perempuan', 'Buddha', 'Simpang Kades', '085367819898', 'CTO', '3004202207395820220423-064447.jpg'),
(1923240100, '8392b63be6e2fd43f962c8533a84ae39', 'Varelly Alvin', 'Palembang, 1 Januari 2000', 'Laki-laki', 'Kristen', 'Patal', '081234567891', 'Admin Lokasi', '20072022140420IMG_20210322_094812.jpg');

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
  `hari` varchar(250) NOT NULL,
  `tanggal` varchar(250) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id`, `id_karyawan`, `nama`, `keterangan`, `alasan`, `hari`, `tanggal`, `waktu`, `bukti`) VALUES
(80, 1923240001, 'Robby Pratama', 'Sakit', 'Pagi pak/bu, hari ini saya izin tidak masuk kerja dikarenakan sakit. Harap dimaklumi. Surat sakit terlampir. Terimakasih', 'Sabtu', '16-07-2022', '15:58:53', '1607202211004720220611_122322.jpg'),
(81, 1923240085, 'Tasya Angelya', 'Izin', 'Saya izin cuti menikah selama 6 hari dimulai hari senin 18 juli sampai sabtu 23 juli. Terimakasih', 'Sabtu', '16-07-2022', '16:01:54', '16072022110321surat-izin-kerja-menikah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(12, 'steven', 'steven'),
(13, 'tasya', 'tasya');

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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
