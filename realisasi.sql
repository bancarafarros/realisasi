-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 11:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(250) NOT NULL,
  `sub_kegiatan` varchar(250) NOT NULL,
  `nama_belanja` varchar(250) NOT NULL,
  `kode_rekening` varchar(250) NOT NULL,
  `pagu_anggaran` int(250) NOT NULL,
  `nama_pptk` varchar(250) NOT NULL,
  `tanggal_input` date NOT NULL,
  `nominal` int(250) NOT NULL,
  `bukti_tagihan` varchar(250) NOT NULL,
  `bukti_transfer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `sub_kegiatan`, `nama_belanja`, `kode_rekening`, `pagu_anggaran`, `nama_pptk`, `tanggal_input`, `nominal`, `bukti_tagihan`, `bukti_transfer`) VALUES
(1, 'Belanja ATK', 'Belanja ATK', 'Belanja ATK', '123.312.123.32', 3354365, 'Haris', '2022-06-06', 978123, '61d3c95602f6c3.jpg', 'transfer.jpg'),
(2, 'Renovasi Ruang Rapat', 'Renovasi Ruang Rapat', 'Renovasi Ruang Rapat', '234.89.900', 557565555, 'Sarip', '2023-01-06', 3425356, '', ''),
(3, 'Belanja Makan Minum', 'Belanja Makan Minum', 'Belanja Makan Minum', '234.89.900', 545546, 'Haris', '2022-06-06', 1232343, '', ''),
(4, 'Perawatan Server', 'Perawatan Server', 'Perawatan Server', '234.89.900', 464565454, 'Sarip', '2023-01-11', 34535, '', ''),
(6, 'Pembayaran Listrik', 'Pembayaran Listrik', 'Pembayaran Listrik', '123.312.123.32', 5444554, 'Haris', '2023-06-06', 14358757, 'invoice-e-billing.jpg', 'WhatsApp_Image_2022-04-27_at_8_45_26_PM.jpeg'),
(7, 'Pembayaran Internet', 'Pembayaran Internet', 'Pembayaran Internet', '123.312.123.32', 5754746, 'Haris', '2025-02-11', 346547568, 'denni-telkomsel2.jpg', ''),
(8, 'Perawatan Perangkat Keras', 'Perawatan Perangkat Keras', 'Perawatan Perangkat Keras', '123.312.123.32', 3225235, 'Haris', '2022-06-12', 236457457, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `kode_rek` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jabatan_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `password_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `kode_rek`, `id_jabatan`, `jabatan_pengguna`, `username_pengguna`, `password_pengguna`) VALUES
(4, 'Dima', '513.278.09', 3, 'Bendahara', 'dima', 'dima123'),
(41, 'Bagas', '653.212.345', 1, 'Operator', 'bagas', 'bagas123'),
(47, 'Haris', '123.312.123.32', 2, 'PPTK', 'haris', 'haris123'),
(48, 'Sarip', '234.89.900', 2, 'PPTK', 'sarip', 'sarip123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
