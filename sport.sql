-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 12:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `nama`, `email`, `password`, `foto`) VALUES
(5, 'Admin', 'tyara@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'c90681427daaa7610ab43dc94ab9d3d8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(100) NOT NULL,
  `id_instruktur` int(100) NOT NULL,
  `jumlah_sesi` varchar(255) NOT NULL,
  `jumlah_murid` int(11) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `id_instruktur`, `jumlah_sesi`, `jumlah_murid`, `durasi`, `harga`, `jadwal`, `tempat`, `agenda`, `verified`) VALUES
(3, 11, '3 Sesi', 20, '30', '500000', 'Minggu, 12 Mei 2019', 'Malang', 'Futsal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `lama_melatih` int(255) NOT NULL,
  `pengalaman_melatih` varchar(255) NOT NULL,
  `keahlian_khusus` varchar(255) NOT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `lama_melatih`, `pengalaman_melatih`, `keahlian_khusus`, `sertifikasi`, `email`, `password`, `verified`, `foto`) VALUES
(10, 'Agus', 'Laki-laki', 'Malang', '081232150974', 2, 'Pencak silat', 'Tidur', 'Sasasasa', 'tyaradiassananda@gmail.com', 'f61b7ebfcf79aa2316b30e2a9b64b8e7', 1, '511b4270f1179f86308d24ec36981d62.jpg'),
(11, 'Vriza Wahyu', 'Laki-laki', 'Tulungagung', '081334200649', 9, 'Pencak Silat', '-', '-', 'vrizawahyu22@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '465518a74e95ef13615760f029efcef8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `jenis_kelamin`, `email`, `no_telepon`, `alamat`, `password`, `foto`) VALUES
(6, 'Jianto', 'Laki-laki', 'nnnnn@gmail.com', '22233311', 'nnn', '14e1b600b1fd579f47433b88e8d85291', ''),
(8, 'Wan', 'Perempuan', 'nnnnn@gmail.com', '22233311', 'nn', 'e10adc3949ba59abbe56e057f20f883e', 'd91455bb16c7e42d431e34e206008a72.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(100) NOT NULL,
  `id_member` int(100) NOT NULL,
  `id_instruktur` int(100) NOT NULL,
  `id_event` int(100) NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `kodebayar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_member`, `id_instruktur`, `id_event`, `bukti_transfer`, `status`, `kodebayar`) VALUES
(30, 8, 11, 3, '036ca0fbef688c0fbfc18ebc13ef26cb.jpg', '2', '5cd07f2354dd3'),
(56, 8, 11, 3, NULL, '4', '5cd1c8d0e627e'),
(57, 8, 11, 3, NULL, '4', '5cd1caa69a768'),
(58, 8, 11, 3, NULL, '4', '5cd1cb9edb626'),
(59, 8, 11, 3, '2c16812c2b0acb76b2423e22d4eab71e.jpg', '3', '5cd1ce148a1d5'),
(60, 8, 11, 3, NULL, '0', '5cd20274c13c4');

-- --------------------------------------------------------

--
-- Table structure for table `reguler`
--

CREATE TABLE `reguler` (
  `id` int(255) NOT NULL,
  `jumlah_sesi` varchar(255) NOT NULL,
  `jumlah_murid` int(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `kodebayar` (`kodebayar`);

--
-- Indexes for table `reguler`
--
ALTER TABLE `reguler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
