-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 10:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES
(1, 'Sunlight Pencuci Piring Lime 510Ml', 1, '20105104', 8000, 9000),
(2, 'Nescafe Gold Original Special Edition 100G', 2, '5328910', 140000, 150000),
(3, 'Milo Minuman Serbuk Cokelat 4X22g', 2, '20105103', 9000, 10000),
(17, 'Indomie Goreng', 12, '456123', 2000, 3000),
(18, 'Indome Ayam Bawang', 12, '134652', 2200, 2500),
(19, 'Indomie Rasa Rendang', 12, '461352', 2000, 2500),
(20, 'Indomilk 150ml', 12, '436152', 5000, 6000),
(21, 'Sunsilk Botol', 1, '794685', 7000, 8000),
(22, 'Surya 16 ', 11, '789789', 23000, 25000),
(23, 'Surya 12', 11, '456456', 15000, 18000),
(24, 'Sampoerna Mild 16', 17, '159753', 24000, 26000),
(25, 'Anggur Merah', 15, '756145', 50000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pembelian` int(10) NOT NULL,
  `id_pembelian` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `discount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail_penjualan` int(20) NOT NULL,
  `id_penjualan` int(10) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah_barang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `ppn` int(3) NOT NULL,
  `jenis_pembayaran` enum('Cash','Kredit') NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `user`) VALUES
(56, '2021-04-30', '190000000', 0, 'Cash', 0),
(57, '2021-05-20', '640000', 0, 'Cash', 0),
(58, '2021-05-01', '460000', 0, 'Cash', 0),
(59, '0000-00-00', '3064000', 0, 'Cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `tgl_penjualan` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_anggota` int(10) NOT NULL,
  `harga_total_barang` int(20) NOT NULL,
  `nominal_uang` int(20) NOT NULL,
  `kembalian` int(20) NOT NULL,
  `return_penjualan` varchar(20) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `kode_voucher` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `harga_total_barang`, `nominal_uang`, `kembalian`, `return_penjualan`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES
(14, '2021-05-01 15:30:29', 121212, 175000, 3000000, 2825000, '', 'cash', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shu`
--

CREATE TABLE `tbl_shu` (
  `id_shu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai_shu` int(11) NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shu`
--

INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES
(5, 10, 20000, 2021),
(6, 8, 10000, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_stok` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `tanggal_return` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`, `tanggal_return`) VALUES
(33, 2, 999, '2021-04-30', '2023-10-22', '2021-04-30'),
(34, 25, 1000, '2021-04-30', '2023-10-22', '2021-04-30'),
(35, 3, 20, '2021-05-20', '2023-11-08', '2021-05-01'),
(36, 22, 18, '2021-05-20', '2023-11-08', '2021-05-01'),
(37, 22, 20, '2021-05-01', '2021-05-29', NULL),
(38, 2, 20, '0000-00-00', '2021-05-01', NULL),
(39, 3, 20, '0000-00-00', '2021-05-01', NULL),
(40, 18, 20, '0000-00-00', '2021-05-01', NULL),
(41, 19, 20, '0000-00-00', '2021-05-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES
(1, 'Unilever Indonesia', 'Graha Unilever - Jl. BSD Boulevard Barat Green Office Park Kavling 3, BSD City, Tangerang – 15345'),
(2, 'Nestle Indonesia', 'Perkantoran Hijau Arkadia, Tower B, 5th Floor Jalan Letjen T. B. Simatupang Kav. 88 Jakarta 12520'),
(11, 'Gudang Garam', 'Jakarta'),
(12, 'Indofood', 'Jakarta'),
(15, 'Orang Tua', 'Bandung'),
(16, 'Wings', 'Bogor'),
(17, 'Sampoerna', 'Jakarta'),
(18, 'Bapak agung', 'Serang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `kode_anggota` int(20) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`) VALUES
(1, 'Administrator', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 1, 111111, '', ''),
(2, 'Operator Gudang', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 2, 222222, '', ''),
(3, 'Operator Kasir', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 3, 333333, '', ''),
(4, 'Staff Keuangan', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 4, 444444, '', ''),
(5, 'Raka Saputra', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 5, 112233, '', ''),
(6, 'Anju Arianto', '$2y$10$WH616lp7Y5g0YwFw2yFtZ.BHpmVuS/VM1lPmrGk5TUA//4fCx/k3q', '', 5, 223344, '', ''),
(8, 'Kevin Damero', '$2y$10$bXpvvdt2mpnFjgCdu5lyIeib95rj9hWm1Vz7qDuFTLYMyUQUBCQC.', 'kevindamero@gmail.com', 5, 101010, 'Kopassus', 'Wakil'),
(9, 'Hotben Tindaon', '$2y$10$dWCQ0RgAIc3UgUP2PkdV4.JtPCBxwsmfE1.3rMQFAIfOCaTM4syPK', 'hotbentindaon@gmail.com', 5, 121212, 'Kopassus', 'Wakil'),
(10, 'Dahlia Batubara', '$2y$10$2l.6D94cFDIaUMBQtjUKRuTL1Ml1/0i0YIf3lSIa2ULxDd6fJC9JK', 'dahliabatubara@gmail.com', 5, 90909, 'Kopassus', 'Anggota'),
(11, 'Novi Andriani', '$2y$10$YOZ8UJzBhhWiuQFWlU0Kn.ddTCM7D28S3GlqivPFsI.ULp7c95zD6', 'noviandriani@gmail.com', 5, 123456, 'Kopassus', 'Anggota'),
(12, 'Wisnu Wardhana', '$2y$10$f2dUUK39LZyePPMvUabemuZmqTP7fVXop4zqnJ1UFyaqplcWP2PUi', 'wisnuwardana@gmail.com', 5, 265265, 'Kopassus', 'Anggota'),
(13, 'Artha Bagus', '$2y$10$SQvcP3NO0foVrzOQr3OfxuIv2vso08vaO9SQK.9E8WU0VhShXprzS', 'arthadwibagus@gmail.com', 5, 252525, 'Kopassus', 'Wakil'),
(14, 'Samantha Pangkey', '$2y$10$dQvHnDN3j6u9nSUC4aAYaeDMal34gES4R/lhurZmpfmjW8klTY6K6', 'samanthapangkey@gmail.com', 5, 654311, 'Kopassus', 'Wakli');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `id_voucher` int(10) NOT NULL,
  `id_user` int(12) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` int(10) NOT NULL DEFAULT current_timestamp(),
  `tanggal_release` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `tanggal_release`, `status`) VALUES
(1, 0, '200000', 0, '2024-05-09', 0),
(2, 0, '10000', 0, '2023-05-02', 0),
(3, 0, '1000', 20210501, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_shu`
--
ALTER TABLE `tbl_shu`
  ADD PRIMARY KEY (`id_shu`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `id_detail_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_shu`
--
ALTER TABLE `tbl_shu`
  MODIFY `id_shu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id_voucher` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
