-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 05:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `sisa_kontrak` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `bagian`, `tgl_masuk`, `sisa_kontrak`, `date`) VALUES
(1, '212303003', 'Agung Ridho', 'Laki-Laki', 'Cimanggung', 'Finance', '2024-08-01', '12', '2024-08-09 05:05:11'),
(2, '212303002', 'Salema', 'Perempuan', 'Calengka', 'Sekretaris', '2024-08-01', '24', '2024-08-10 10:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_pembayaran` varchar(15) NOT NULL,
  `pinjaman_id` int(11) NOT NULL,
  `cicilan_ke` varchar(10) NOT NULL,
  `sisa_cicilan` varchar(10) NOT NULL,
  `jml_bayar` varchar(150) NOT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_pembayaran`, `pinjaman_id`, `cicilan_ke`, `sisa_cicilan`, `jml_bayar`, `tgl_bayar`, `status_bayar`) VALUES
(1, 'B-PNJ0001001', 1, '1', '9', '400,000', '2024-08-10 08:28:30', 1),
(2, 'B-PNJ0001002', 1, '2', '8', '400,000', '2024-08-10 09:17:43', 1),
(3, 'B-PNJ0001003', 1, '3', '7', '400,000', '2024-08-10 10:16:26', 1),
(4, 'B-PNJ0001004', 1, '4', '6', '400,000', '2024-08-10 10:41:18', 1),
(5, 'B-PNJ0001005', 1, '5', '5', '400,000', '2024-08-10 10:41:27', 1),
(6, 'B-PNJ0001006', 1, '6', '4', '400,000', '2024-08-10 10:41:33', 1),
(7, 'B-PNJ0001007', 1, '7', '3', '400,000', '2024-08-10 10:41:38', 1),
(8, 'B-PNJ0001008', 1, '8', '2', '400,000', '2024-08-10 10:41:42', 1),
(9, 'B-PNJ0001009', 1, '9', '1', '400,000', '2024-08-10 10:41:50', 1),
(10, 'B-PNJ0001010', 1, '10', '0', '400,000', '2024-08-10 10:42:06', 1),
(11, 'B-PNJ0002001', 2, '1', '14', '1,000,000', '2024-08-10 10:54:06', 1),
(12, 'B-PNJ0002002', 2, '2', '13', '1,000,000', '2024-08-10 10:54:15', 1),
(13, 'B-PNJ0002003', 2, '3', '12', '1,000,000', '2024-08-10 10:55:16', 1),
(14, 'B-PNJ0002004', 2, '4', '11', '1,000,000', '2024-08-10 10:55:33', 1),
(15, 'B-PNJ0002005', 2, '5', '10', '1,000,000', '2024-08-10 10:56:53', 1),
(16, 'B-PNJ0002006', 2, '6', '9', '1,000,000', '2024-08-10 10:57:45', 1),
(17, 'B-PNJ0002007', 2, '7', '6', '9,000,000', '2024-08-12 14:39:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `no_pengajuan` varchar(20) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `sisa_kontrak` varchar(15) NOT NULL,
  `tgl_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `besar_pinjam` varchar(100) NOT NULL,
  `tgl_acc` varchar(10) NOT NULL,
  `jml_pinjam_disetujui` varchar(100) NOT NULL,
  `jml_cicilan` varchar(100) NOT NULL,
  `besar_cicilan` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `no_pengajuan`, `nip`, `nama`, `bagian`, `sisa_kontrak`, `tgl_pengajuan`, `besar_pinjam`, `tgl_acc`, `jml_pinjam_disetujui`, `jml_cicilan`, `besar_cicilan`, `status`) VALUES
(1, 'PGJ0001', '212303003', 'Agung Ridho', 'Finance', '12', '2024-08-09 16:05:19', '5000000', '-', '-', '10', '-', 'rejected'),
(2, 'PGJ0002', '212303003', 'Agung Ridho', 'Finance', '12', '2024-08-10 02:57:08', '4000000', '2024-08-10', '4000000', '10', '400000', 'approved'),
(3, 'PGJ0003', '212303002', 'Salema', 'Sekretaris', '24', '2024-08-10 10:32:51', '15000000', '2024-08-10', '15000000', '15', '1000000', 'approved'),
(4, 'PGJ0004', '212303003', 'Agung Ridho', 'Finance', '12', '2024-08-12 13:43:15', '1000000', '2024-08-12', '1000000', '2', '500000', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `no_pinjaman` varchar(20) NOT NULL,
  `nip_peminjam` varchar(50) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `jml_pinjaman` varchar(100) NOT NULL,
  `tgl_pinjaman` varchar(10) NOT NULL,
  `tenor` varchar(50) NOT NULL,
  `jml_cicilan_pinjam` varchar(100) NOT NULL,
  `besar_cicilan_pinjam` varchar(100) NOT NULL,
  `catatan_peminjaman` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `no_pinjaman`, `nip_peminjam`, `nama_peminjam`, `jml_pinjaman`, `tgl_pinjaman`, `tenor`, `jml_cicilan_pinjam`, `besar_cicilan_pinjam`, `catatan_peminjaman`, `date`) VALUES
(1, 'PNJ0001', '212303003', 'Agung Ridho', '4000000', '2024-08-10', '2025-06-10', '10', '400000', 'Lunas', '2024-08-10 03:49:39'),
(2, 'PNJ0002', '212303002', 'Salema', '15000000', '2024-08-10', '2025-11-10', '15', '1000000', 'Lunas', '2024-08-10 10:33:13'),
(3, 'PNJ0003', '212303003', 'Agung Ridho', '1000000', '2024-08-12', '2024-10-12', '2', '500000', 'Belum Lunas', '2024-08-12 13:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nip`, `nama`, `role`) VALUES
(1, 'admin', '123', '212303002', 'Admin', 'admin'),
(2, 'agungs', '123', '212303003', 'Agung Ridho', 'karyawan'),
(3, 'salema', '123', '212303002', 'Salema', 'karyawan'),
(4, 'manajer', '123', '212303001', 'manajer', 'manajer'),
(5, 'hrd', '123', '212303010', 'hrd', 'hrd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
