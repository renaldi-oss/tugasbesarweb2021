-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 10:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webkasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(6) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `noisbn` varchar(25) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stok` int(12) NOT NULL,
  `harga_pokok` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `ppn` int(4) NOT NULL,
  `diskon` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
('BK0001', 'Novel', '0009911', 'Hartano', 'Erlangga', 2017, 102, 85000, 100000, 2, 5),
('BK0002', 'Matematika jitu', '0009912', 'Jumadi', 'Erlangga', 2017, 193, 90000, 120000, 2, 20),
('BK0003', 'Javaku', '00009921', 'Reza', 'Yudhistira', 2016, 125, 120000, 140000, 5, 20),
('BK0004', 'Kimia Dasar', '000012345', 'suryadi', 'Maju Bersama', 2020, 100, 50000, 60000, 2, 5),
('BK0005', 'Algoritma dan Struktur Data', '000012346', 'suparno', 'mundur bersama', 2019, 100, 25000, 30000, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` varchar(6) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
('DIS001', 'PT. Jaya Abadi', 'Jl. Pesanggrahan, Jakarta', '021 7762820'),
('DIS002', 'PT. Buku Bagus', 'Jl. Pajajaran, Jakarta', '021 978532'),
('DIS003', 'PT. Ilmu Cahaya', 'Tangerang', '021 767920');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` varchar(6) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` longtext NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
('TBKS01', 'clara', 'perdagangan', '123456789', 'Pegawai Tetap', 'kasir', 'kasir', 'Kasir'),
('TBMG01', 'Aldi', 'Malang', '123456789', 'Pegawai Tetap', 'admin', 'admin', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(6) NOT NULL,
  `id_distributor` varchar(6) NOT NULL,
  `id_buku` varchar(6) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(12, 'DIS001', 'BK0001', 100, '2021-12-18'),
(13, 'DIS002', 'BK0002', 100, '2021-12-18'),
(14, 'DIS003', 'BK0003', 100, '2021-12-18');

--
-- Triggers `pasok`
--
DELIMITER $$
CREATE TRIGGER `pasokBuku` AFTER INSERT ON `pasok` FOR EACH ROW BEGIN

UPDATE buku SET stok = stok + NEW.jumlah

WHERE id_buku = NEW.id_buku;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(6) NOT NULL,
  `id_buku` varchar(6) NOT NULL,
  `id_kasir` varchar(6) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `total` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
(20, 'BK0003', 'TBKS01', 5, 595000, '2021-12-18'),
(21, 'BK0002', 'TBKS01', 3, 295200, '2021-12-18'),
(22, 'BK0001', 'TBKS01', 4, 388000, '2021-12-18'),
(23, 'BK0003', 'TBKS01', 2, 238000, '2021-12-18'),
(24, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(25, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(26, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(27, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(28, 'BK0002', 'TBKS01', 1, 98400, '2021-12-18'),
(29, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(30, 'BK0001', 'TBKS01', 1, 97000, '2021-12-18'),
(31, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(32, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(33, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(34, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(35, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(36, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(37, 'BK0003', 'TBKS01', 1, 119000, '2021-12-19'),
(38, 'BK0002', 'TBKS01', 1, 98400, '2021-12-19'),
(39, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(40, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(41, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(42, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19'),
(43, 'BK0002', 'TBKS01', 1, 98400, '2021-12-19'),
(44, 'BK0001', 'TBKS01', 1, 97000, '2021-12-19');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangStok` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN

UPDATE buku SET stok = stok - NEW.jumlah

WHERE id_buku = NEW.id_buku;

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
