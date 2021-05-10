-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 07:12 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `tgl_penjualan` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_anggota` int(10) NOT NULL,
  `nominal_uang` int(20) NOT NULL,
  `jenis_pembayaran` enum('Cash','Kredit') NOT NULL,
  `kode_voucher` varchar(50) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Administrator', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'admin@email.com', 1, 111111, 'Administrator', 'Administrator'),
(2, 'Gudang', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'gudang@gmail.com', 2, 222222, 'Gudang', 'Gudang'),
(3, 'Kasir', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'kasir@email.com', 3, 333333, 'Kasir', 'Kasir'),
(4, 'Keuangan Koperasi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'keukoperasi@email.com', 4, 444444, 'Keuangan', 'Simpan Pinjam'),
(6, 'Keuangan Simpan Pinjam', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'simpanpinjam@email.com', 6, 555555, 'Keuangan', 'Simpan Pinjam'),
(17, 'I Ketut Mertha G', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kolonel Inf'),
(18, 'Raden Nashrul F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Letkol Inf'),
(19, 'Alexander a p', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(20, 'Adi Nofriadinata', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(21, 'Yuswardi Mendrofa', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Chb'),
(22, 'Junus Giyai', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(23, 'Lalu Pardede Gita P', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(24, 'Much. Amry', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(25, 'Hendis Asies', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Mayor Inf'),
(26, 'Fauzi Firmansyah', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Cpl'),
(27, 'Ekashiva Raja A', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Czi'),
(28, 'Alfredo Benhard P.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf'),
(29, 'Arma Fatur', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf'),
(30, 'Abraham A.F, S,S.Han', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf'),
(31, 'Ahmad Khadafi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf'),
(32, 'Andika Revien. H', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf '),
(33, 'Hamdan Fauzul Adhim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf '),
(34, 'Dana Pranata', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kapten Inf '),
(35, 'Ahmad Lugas Prayogo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(36, 'Yudanto Budi Prastowo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Cku'),
(37, 'Harnowo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Chb'),
(38, 'Jarot Purnomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(39, 'Arif Triantoko', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(40, 'M. Zaenuddin F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(41, 'Suko Giantoro', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(42, 'Zarot Zamzami', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Czi'),
(43, 'Usman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Inf'),
(44, 'dr. Tri Taufiqurocman T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Lettu Ckm'),
(45, 'Hegia Sanjaya S', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Letda Cku'),
(46, 'Robin Sirait S', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Letda Cba'),
(47, 'Ryan Hermawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Letda Chb'),
(48, 'Paijo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Letda'),
(49, 'Aminuddin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 632446, 'denma', 'Peltu'),
(50, 'Agustinus Lokollo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(51, 'Parna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 633661, 'denma', 'Peltu'),
(52, 'Toto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(53, 'Lalu Surya Jaya', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(54, 'Tjasrikin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(55, 'Muhamad Nuh', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(56, 'Sutisna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pelda'),
(57, 'Manuri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(58, 'Kadima', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(59, 'Saparudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(60, 'Slamet', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(61, 'Jiman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(62, 'Supriyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(63, 'Agus Salim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(64, 'Tedy Wahyudi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(65, 'Rusnadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(66, 'Ghanie Ramadhan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(67, 'Prayitno Eko S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(68, 'Tomi yuda nugroho', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(69, 'Paryanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serma'),
(70, 'Abdul Haris', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 0, 'denma', 'Serma'),
(71, 'Heri Sulistio', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 0, 'denma', 'Serma'),
(72, 'Suprianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 0, 'denma', 'Serma'),
(73, 'Ahmad Buang', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 0, 'denma', 'Serma'),
(74, 'Bayu Tisno P', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(75, 'Daud bili pakereng', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(76, 'Safiudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(77, 'Suhananta', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(78, 'Rangga Paty S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(79, 'Abdul Malik', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(80, 'Wahyu Kisnadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(81, 'Ahmad Sobari', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(82, 'I Ketut Hendra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(83, 'Faruk', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(84, 'Boyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(85, 'Bambang Purnomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(86, 'Teguh Wicaksono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(87, 'I Made Sudarma', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(88, 'Irpan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(89, 'Joko Suhardi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(90, 'Diyan Kristianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(91, 'Miftahudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(92, 'Trubus', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(93, 'I Komang Sukarna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(94, 'Eko Budi Utomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(95, 'Agus Budyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(96, 'Erik sandro sarean', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(97, 'Karsilan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(98, 'Nur Ikhsan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(99, 'M. Mahmudi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(100, 'Agus Supriya', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serka'),
(101, 'Joko Setyono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(102, 'Muhammad Salman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(103, 'Mochamad Jahuri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(104, 'Nicolau Ximenes', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(105, 'Lilik Budiyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(106, 'Agus Cahyono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(107, 'Supeno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(108, 'Taufik Apriyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(109, 'Gatot Pujianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(110, 'Agus Budi Utomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(111, 'Pandu Sandha Yudha', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(112, 'Aunur Rofik', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(113, 'Wijaya Kusuma', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(114, 'Kasihadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(115, 'Lilik Supriyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(116, 'Rizky Ananda', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(117, 'Affan Husaini ', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(118, 'Wawan Datun', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(119, 'Yatimin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(120, 'Anton Nurhayadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(121, 'Sirajudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(122, 'Oma Suganda', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(123, 'I Putu Mahardika', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(124, 'Bambang S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(125, 'Yulianto Agung Nugroho', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(126, 'Yahfi Sohib', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Sertu'),
(127, 'Deni Ahmad F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(128, 'Buhari Rahman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(129, 'M. Alfreds Pagalu', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(130, 'Ujang Parman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(131, 'Sugeng Pratikno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(132, 'Arbianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(133, 'Dadang Suryana', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(134, 'Saiful Anwar', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(135, 'Thomas Paulus T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Serda'),
(136, 'Yudi Yulius', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kopda'),
(137, 'Andi Gunawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kopda'),
(138, 'Ipan Tajudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kopda'),
(139, 'Septyanto Ryan T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kopda'),
(140, 'Riki Jaya Putra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(141, 'Roby Rosandy', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(142, 'Anas Rifa?i', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(143, 'Andika', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(144, 'Joko Herwanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(145, 'Jeckyryan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Kopda'),
(146, 'Yachya Guntur M', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(147, 'Muhammad Yusuf', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(148, 'Luthfi Setyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(149, 'M. Alim Bahri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(150, 'Angga Adi Sasmita', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(151, 'Kiswadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(152, 'Robi Kornelis', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(153, 'Ass Syabiqinnor R', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', ''),
(154, 'Dedi Indriansyah', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(155, 'Adi Yatim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(156, 'Panji Angga Pratama', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(157, 'Eko Ramdani', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(158, 'Eko Suratno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(159, 'Muhammad Irfan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(160, 'Tommy Perdana Putra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(161, 'Dona Herliawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(162, 'Dedek Irawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(163, 'Deden Purnama', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(164, 'Ebi Biantoro', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(165, 'Fadullulah Rosadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Praka'),
(166, 'Raja Hamonangan M', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(167, 'Muchlis Kurniyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(168, 'Gigih Baris Diana', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(169, 'Jumardin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(170, 'Rahmad Julian F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(171, 'Surahmat', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(172, 'Teguh Setyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(173, 'Faisal', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(174, 'Simon Bria', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(175, 'Sardi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(176, 'Junaidi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(177, 'Andre Oktavianus Seru', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu'),
(178, 'Ariyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, 2147483647, 'denma', 'Pratu');

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
(2, 0, '10000', 0, '2023-05-02', 1),
(3, 0, '1000', 20210501, '0000-00-00', 0),
(4, 1, 'Mei', 2021, '0000-00-00', 0),
(5, 2, 'Mei', 2021, '0000-00-00', 0),
(6, 3, 'Mei', 2021, '0000-00-00', 0),
(7, 4, 'Mei', 2021, '0000-00-00', 1),
(8, 5, 'Mei', 2021, '0000-00-00', 1),
(9, 6, 'Mei', 2021, '0000-00-00', 1),
(10, 8, 'Mei', 2021, '0000-00-00', 0),
(11, 9, 'Mei', 2021, '0000-00-00', 0),
(12, 10, 'Mei', 2021, '0000-00-00', 1),
(13, 11, 'Mei', 2021, '0000-00-00', 0),
(14, 12, 'Mei', 2021, '0000-00-00', 0),
(15, 13, 'Mei', 2021, '0000-00-00', 0),
(16, 14, 'Mei', 2021, '0000-00-00', 1);

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
  MODIFY `id_detail_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_shu`
--
ALTER TABLE `tbl_shu`
  MODIFY `id_shu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id_voucher` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
