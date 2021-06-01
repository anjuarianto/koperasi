#
# TABLE STRUCTURE FOR: tbl_barang
#

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (1, 'Sunlight Pencuci Piring Lime 510Ml', 1, '20105104', 8000, 9000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (2, 'Nescafe Gold Original Special Edition 100G', 2, '5328910', 140000, 150000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (3, 'Milo Minuman Serbuk Cokelat 4X22g', 2, '20105103', 9000, 10000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (17, 'Indomie Goreng', 12, '456123', 2000, 3000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (18, 'Indome Ayam Bawang', 12, '134652', 2200, 2500);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (19, 'Indomie Rasa Rendang', 12, '461352', 2000, 2500);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (20, 'Indomilk 150ml', 12, '436152', 5000, 6000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (21, 'Sunsilk Botol', 1, '794685', 7000, 8000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (22, 'Surya 16 ', 11, '789789', 23000, 25000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (23, 'Surya 12', 11, '456456', 15000, 18000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (24, 'Sampoerna Mild 16', 17, '159753', 24000, 26000);
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_supplier`, `kode_barang`, `harga_beli`, `harga_jual`) VALUES (25, 'Anggur Merah', 15, '756145', 50000, 60000);


#
# TABLE STRUCTURE FOR: tbl_detail_pembelian
#

DROP TABLE IF EXISTS `tbl_detail_pembelian`;

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pembelian` int(10) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `discount` int(3) NOT NULL,
  PRIMARY KEY (`id_detail_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (110, 72, 17, 1000, 5);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (111, 72, 18, 1000, 5);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (112, 72, 19, 1000, 5);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (113, 72, 20, 1000, 5);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (114, 73, 22, 1900, 10);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (115, 73, 23, 200, 5);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (116, 74, 1, 0, 0);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (117, 74, 21, 10, 3);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (118, 75, 18, 100, 0);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (119, 76, 2, 100, 30);
INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `discount`) VALUES (120, 77, 20, 100, 10);


#
# TABLE STRUCTURE FOR: tbl_detail_penjualan
#

DROP TABLE IF EXISTS `tbl_detail_penjualan`;

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail_penjualan` int(20) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(10) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah_barang` int(20) NOT NULL,
  PRIMARY KEY (`id_detail_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (85, 65, 1, 100);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (86, 65, 21, 100);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (87, 66, 3, 4);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (88, 67, 18, 20);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (89, 68, 18, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (90, 69, 25, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (91, 70, 25, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (92, 71, 25, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (93, 72, 25, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (94, 73, 22, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (95, 73, 23, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (96, 74, 22, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (97, 74, 23, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (98, 75, 17, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (99, 76, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (100, 77, 17, 100);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (101, 78, 17, 100);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (102, 79, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (103, 80, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (104, 81, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (105, 82, 17, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (106, 83, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (107, 84, 17, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (108, 85, 2, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (109, 86, 18, 3);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (110, 87, 1, 10);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (111, 88, 17, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (112, 89, 19, 1);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (113, 90, 3, 10);
INSERT INTO `tbl_detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`) VALUES (114, 91, 23, 1);


#
# TABLE STRUCTURE FOR: tbl_history_pinjam
#

DROP TABLE IF EXISTS `tbl_history_pinjam`;

CREATE TABLE `tbl_history_pinjam` (
  `id_history_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjam` int(11) NOT NULL,
  `bunga` int(20) NOT NULL,
  `angsuran` int(20) NOT NULL,
  `tanggal_history_pinjam` date NOT NULL,
  PRIMARY KEY (`id_history_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_history_pinjam` (`id_history_pinjam`, `id_pinjam`, `bunga`, `angsuran`, `tanggal_history_pinjam`) VALUES (3, 2, 25000, 150000, '2021-05-19');
INSERT INTO `tbl_history_pinjam` (`id_history_pinjam`, `id_pinjam`, `bunga`, `angsuran`, `tanggal_history_pinjam`) VALUES (4, 2, 10000, 200000, '2021-05-31');


#
# TABLE STRUCTURE FOR: tbl_log
#

DROP TABLE IF EXISTS `tbl_log`;

CREATE TABLE `tbl_log` (
  `id_log` int(20) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (1, 'test', 3, '0000-00-00 00:00:00');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (2, 'User login kedalam sistem', 3, '2021-05-22 00:58:50');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (3, 'User login kedalam sistem', 344, '2021-05-22 01:00:43');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (4, 'User login kedalam sistem', 344, '2021-05-22 01:01:55');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (5, 'User logout kedalam sistem', 344, '2021-05-22 01:01:59');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (6, 'User login ke dalam sistem', 3, '2021-05-26 02:11:05');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (7, 'User login ke dalam sistem', 3, '2021-05-27 10:54:21');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (8, 'User logout dari sistem', 3, '2021-05-27 10:54:31');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (9, 'User login ke dalam sistem', 3, '2021-05-27 10:55:58');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (10, 'User login ke dalam sistem', 3, '2021-05-27 14:50:01');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (11, 'User login ke dalam sistem', 2, '2021-05-27 14:54:09');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (12, 'User logout dari sistem', 2, '2021-05-27 14:54:33');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (13, 'User login ke dalam sistem', 3, '2021-05-27 14:54:57');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (14, 'User logout dari sistem', 3, '2021-05-27 15:00:34');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (15, 'User login ke dalam sistem', 3, '2021-05-27 15:00:47');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (16, 'User logout dari sistem', 3, '2021-05-27 15:08:45');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (17, 'User login ke dalam sistem', 506, '2021-05-27 15:09:44');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (18, 'User logout dari sistem', 3, '2021-05-27 15:11:00');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (19, 'User login ke dalam sistem', 341, '2021-05-27 15:11:31');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (20, 'User logout dari sistem', 341, '2021-05-27 15:18:55');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (21, 'User login ke dalam sistem', 505, '2021-05-27 15:19:16');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (22, 'User logout dari sistem', 505, '2021-05-27 15:23:19');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (23, 'User login ke dalam sistem', 3, '2021-05-27 19:25:13');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (24, 'User login ke dalam sistem', 506, '2021-05-28 06:23:35');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (25, 'User logout dari sistem', 506, '2021-05-28 06:23:50');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (75, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:53:01');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (76, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:53:34');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (77, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:54:09');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (78, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:57:20');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (79, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:57:52');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (80, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 16:59:04');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (81, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 17:01:05');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (82, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 17:02:10');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (83, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 17:07:04');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (84, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 17:07:51');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (85, 'ini deskripsi hasil curl telah berhasil', 0, '2021-05-28 17:09:30');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (86, 'User login ke dalam sistem', 3, '2021-05-29 03:53:17');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (87, 'User login ke dalam sistem', 1, '2021-05-29 03:58:16');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (88, 'User login ke dalam sistem', 3, '2021-05-29 04:01:24');
INSERT INTO `tbl_log` (`id_log`, `deskripsi`, `id_user`, `time`) VALUES (89, 'User login ke dalam sistem', 1, '2021-06-01 22:27:23');


#
# TABLE STRUCTURE FOR: tbl_pemasukan
#

DROP TABLE IF EXISTS `tbl_pemasukan`;

CREATE TABLE `tbl_pemasukan` (
  `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_pemasukan` varchar(200) NOT NULL,
  `total_pemasukan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pendapatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: tbl_pembelian
#

DROP TABLE IF EXISTS `tbl_pembelian`;

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_pembelian` date NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `ppn` int(3) NOT NULL,
  `jenis_pembayaran` enum('Cash','Kredit') NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status_kredit` int(1) DEFAULT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (72, '2021-05-17', '0123', 10, 'Cash', NULL, NULL, 2);
INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (73, '2021-05-18', '1423', 10, 'Kredit', '2021-05-19', 1, 2);
INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (74, '2021-05-10', '44232', 15, 'Cash', NULL, NULL, 2);
INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (75, '2021-05-19', '43532', 10, 'Cash', NULL, NULL, 2);
INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (76, '2021-05-19', '789978', 10, 'Kredit', '2021-06-19', 1, 2);
INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `no_faktur`, `ppn`, `jenis_pembayaran`, `jatuh_tempo`, `status_kredit`, `user`) VALUES (77, '2021-05-19', '0812', 50, 'Kredit', '2021-05-31', 0, 2);


#
# TABLE STRUCTURE FOR: tbl_penjualan
#

DROP TABLE IF EXISTS `tbl_penjualan`;

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_penjualan` date NOT NULL DEFAULT current_timestamp(),
  `kode_anggota` varchar(20) DEFAULT NULL,
  `nominal_uang` int(20) NOT NULL,
  `jenis_pembayaran` enum('Cash','Kredit') NOT NULL,
  `kode_voucher` varchar(50) DEFAULT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (65, '0000-00-00', '11110012590989', 0, '', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (66, '2021-05-26', '', 50000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (67, '2021-05-26', '', 330000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (68, '2021-05-26', '', 3000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (69, '2021-05-26', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (70, '2021-05-26', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (71, '2021-05-26', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (72, '2021-05-26', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (73, '2021-05-26', '', 100000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (74, '2021-05-26', '', 100000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (75, '2021-05-27', '', 10000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (76, '2021-05-27', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (77, '2021-05-27', '', 300000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (78, '2021-05-27', '', 300000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (79, '2021-05-27', '11060021301184', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (80, '2021-05-27', '11060021301184', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (81, '2021-05-27', '11060021301184', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (82, '2021-05-27', '11960032381172', 5000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (83, '2021-05-27', '11060021301184', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (84, '2021-05-27', '31970345010178', 5000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (85, '2021-05-27', '11060021301184', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (86, '2021-05-27', '', 10000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (87, '2021-05-27', '', 100000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (88, '2021-05-27', '11960032381172', 5000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (89, '2021-05-27', '', 5000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (90, '2021-05-27', '', 200000, 'Cash', NULL, 3);
INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl_penjualan`, `kode_anggota`, `nominal_uang`, `jenis_pembayaran`, `kode_voucher`, `user`) VALUES (91, '2021-05-27', '31081659310589', 20000, 'Cash', NULL, 3);


#
# TABLE STRUCTURE FOR: tbl_pinjam
#

DROP TABLE IF EXISTS `tbl_pinjam`;

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `pinjaman` int(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_pinjam` (`id_pinjam`, `id_user`, `pinjaman`, `tanggal_pinjam`, `jatuh_tempo`, `status`) VALUES (2, 373, 2000000, '2021-05-17', '2021-05-31', 0);


#
# TABLE STRUCTURE FOR: tbl_return_pembelian
#

DROP TABLE IF EXISTS `tbl_return_pembelian`;

CREATE TABLE `tbl_return_pembelian` (
  `id_return_pembelian` int(12) NOT NULL AUTO_INCREMENT,
  `id_detail_pembelian` int(12) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `memo` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_return_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_return_pembelian` (`id_return_pembelian`, `id_detail_pembelian`, `jumlah_barang`, `memo`, `tanggal`) VALUES (12, 117, 8, 'Tes return aja', '2021-05-19');
INSERT INTO `tbl_return_pembelian` (`id_return_pembelian`, `id_detail_pembelian`, `jumlah_barang`, `memo`, `tanggal`) VALUES (13, 117, 10, 'Dapat return lagi', '2021-05-19');
INSERT INTO `tbl_return_pembelian` (`id_return_pembelian`, `id_detail_pembelian`, `jumlah_barang`, `memo`, `tanggal`) VALUES (14, 117, 80, 'Barang rusak bos', '0000-00-00');
INSERT INTO `tbl_return_pembelian` (`id_return_pembelian`, `id_detail_pembelian`, `jumlah_barang`, `memo`, `tanggal`) VALUES (15, 117, 880, 'Parah lo bos', '0000-00-00');
INSERT INTO `tbl_return_pembelian` (`id_return_pembelian`, `id_detail_pembelian`, `jumlah_barang`, `memo`, `tanggal`) VALUES (16, 117, 10, 'Rusak', '0000-00-00');


#
# TABLE STRUCTURE FOR: tbl_shu
#

DROP TABLE IF EXISTS `tbl_shu`;

CREATE TABLE `tbl_shu` (
  `id_shu` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nilai_shu` int(11) DEFAULT NULL,
  `periode` int(11) NOT NULL,
  PRIMARY KEY (`id_shu`)
) ENGINE=InnoDB AUTO_INCREMENT=824 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (659, 341, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (660, 342, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (661, 343, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (662, 344, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (663, 345, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (664, 346, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (665, 347, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (666, 348, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (667, 349, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (668, 350, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (669, 351, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (670, 352, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (671, 353, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (672, 354, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (673, 355, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (674, 356, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (675, 357, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (676, 358, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (677, 359, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (678, 360, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (679, 361, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (680, 362, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (681, 363, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (682, 364, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (683, 365, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (684, 366, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (685, 367, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (686, 368, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (687, 369, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (688, 370, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (689, 371, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (690, 372, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (691, 373, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (692, 374, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (693, 375, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (694, 376, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (695, 377, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (696, 378, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (697, 379, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (698, 380, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (699, 381, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (700, 382, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (701, 383, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (702, 384, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (703, 385, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (704, 386, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (705, 387, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (706, 388, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (707, 389, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (708, 390, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (709, 391, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (710, 392, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (711, 393, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (712, 394, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (713, 395, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (714, 396, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (715, 397, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (716, 398, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (717, 399, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (718, 400, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (719, 401, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (720, 402, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (721, 403, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (722, 404, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (723, 405, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (724, 406, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (725, 407, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (726, 408, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (727, 409, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (728, 410, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (729, 411, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (730, 412, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (731, 413, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (732, 414, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (733, 415, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (734, 416, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (735, 417, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (736, 418, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (737, 419, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (738, 420, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (739, 421, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (740, 422, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (741, 423, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (742, 424, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (743, 425, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (744, 426, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (745, 427, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (746, 428, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (747, 429, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (748, 430, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (749, 431, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (750, 432, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (751, 433, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (752, 434, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (753, 435, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (754, 436, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (755, 437, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (756, 438, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (757, 439, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (758, 440, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (759, 441, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (760, 442, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (761, 443, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (762, 444, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (763, 445, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (764, 446, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (765, 447, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (766, 448, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (767, 449, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (768, 450, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (769, 451, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (770, 452, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (771, 453, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (772, 454, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (773, 455, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (774, 456, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (775, 457, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (776, 458, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (777, 459, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (778, 460, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (779, 461, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (780, 462, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (781, 463, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (782, 464, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (783, 465, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (784, 466, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (785, 467, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (786, 468, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (787, 469, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (788, 470, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (789, 471, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (790, 472, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (791, 473, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (792, 474, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (793, 475, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (794, 476, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (795, 477, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (796, 478, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (797, 479, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (798, 480, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (799, 481, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (800, 482, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (801, 483, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (802, 484, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (803, 485, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (804, 486, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (805, 487, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (806, 488, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (807, 489, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (808, 490, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (809, 491, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (810, 492, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (811, 493, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (812, 494, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (813, 495, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (814, 496, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (815, 497, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (816, 498, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (817, 499, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (818, 500, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (819, 501, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (820, 502, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (821, 503, NULL, 2020);
INSERT INTO `tbl_shu` (`id_shu`, `id_user`, `nilai_shu`, `periode`) VALUES (822, 504, NULL, 2020);


#
# TABLE STRUCTURE FOR: tbl_simpan
#

DROP TABLE IF EXISTS `tbl_simpan`;

CREATE TABLE `tbl_simpan` (
  `id_simpan` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `wajib` int(20) NOT NULL,
  `sukarela` int(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_simpan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_simpan` (`id_simpan`, `id_user`, `wajib`, `sukarela`, `tanggal`) VALUES (7, 373, 20000, 500000, '2021-05-18');
INSERT INTO `tbl_simpan` (`id_simpan`, `id_user`, `wajib`, `sukarela`, `tanggal`) VALUES (8, 376, 55000, 1000000, '2021-05-17');
INSERT INTO `tbl_simpan` (`id_simpan`, `id_user`, `wajib`, `sukarela`, `tanggal`) VALUES (9, 376, 25000, 1900000, '2021-06-01');


#
# TABLE STRUCTURE FOR: tbl_stok
#

DROP TABLE IF EXISTS `tbl_stok`;

CREATE TABLE `tbl_stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (70, 17, 72, 794, '2021-05-17', '2021-05-31');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (71, 18, 72, 1000, '2021-05-17', '2021-07-10');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (72, 19, 72, 999, '2021-05-17', '2023-07-25');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (73, 20, 72, 1000, '2021-05-17', '2021-09-30');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (74, 22, 73, 1898, '2021-05-18', '2021-05-31');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (75, 23, 73, 197, '2021-05-18', '2021-08-13');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (76, 1, 74, 890, '2021-05-10', '2021-05-19');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (77, 21, 74, 10, '2021-05-10', '2021-07-22');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (78, 18, 75, 76, '2021-05-19', '2021-05-31');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (79, 2, 76, 94, '2021-05-19', '2021-05-31');
INSERT INTO `tbl_stok` (`id_stok`, `id_barang`, `id_pembelian`, `stok_barang`, `tanggal_pembelian`, `tanggal_expired`) VALUES (80, 20, 77, 100, '2021-05-19', '2021-07-23');


#
# TABLE STRUCTURE FOR: tbl_supplier
#

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(10) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (1, 'Unilever Indonesia', 'Graha Unilever - Jl. BSD Boulevard Barat Green Office Park Kavling 3, BSD City, Tangerang – 15345');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (2, 'Nestle Indonesia', 'Perkantoran Hijau Arkadia, Tower B, 5th Floor Jalan Letjen T. B. Simatupang Kav. 88 Jakarta 12520');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (11, 'Gudang Garam', 'Jakarta');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (12, 'Indofood', 'Jakarta');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (15, 'Orang Tua', 'Bandung');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (16, 'Wings', 'Bogor');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (17, 'Sampoerna', 'Jakarta');
INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES (18, 'Bapak agung', 'Serang');


#
# TABLE STRUCTURE FOR: tbl_user
#

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pokok` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=508 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (1, 'Administrator', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 1, '111111', 'Admin', 'Admin', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (2, 'Operator Gudang', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 2, '222222', 'Admin', 'Admin', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (3, 'Operator Kasir', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 3, '333333', 'Kasir', 'Kasir', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (4, 'Keuangan Koperasi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 4, '444444', 'Admin', 'Admin', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (5, 'Keuangan Simpan Pinjam', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 6, '555555', 'Admin', 'Admin', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (7, 'Keuangan Koperasi (Kredit)', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@email.com', 7, '777777', 'Keuangan Koperasi', 'Kredit', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (8, 'Operator Gudang 2', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@email.com', 2, 'gudang2', 'Gudang', 'Gudang', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (9, 'Operator Kasir 2', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 3, 'kasir2', 'Kasir', 'Kasir', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (341, 'I Ketut Mertha G', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11960032381172', 'Denma', 'Kolonel Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (342, 'Raden Nashrul F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11000036051078', 'Denma', 'Letkol Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (343, 'Alexander a p', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11060029650785', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (344, 'Adi Nofriadinata', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11060021301184', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (345, 'Yuswardi Mendrofa', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11070080521185', 'Denma', 'Mayor Chb', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (346, 'Junus Giyai', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11080105780786', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (347, 'Lalu Pardede Gita P', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11080116180787', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (348, 'Much. Amry', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11080106771285', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (349, 'Hendis Asies', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11080111541286', 'Denma', 'Mayor Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (350, 'Fauzi Firmansyah', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11090066480785', 'Denma', 'Kapten Cpl', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (351, 'Ekashiva Raja A', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11090035230888', 'Denma', 'Kapten Czi', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (352, 'Alfredo Benhard P.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110009960489', 'Denma', 'Kapten Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (353, 'Arma Fatur', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110012590989', 'Denma', 'Kapten Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (354, 'Abraham A.F, S,S.Han', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11120011260990', 'Denma', 'Kapten Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (355, 'Ahmad Khadafi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11120011180990', 'Denma', 'Kapten Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (356, 'Andika Revien. H', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110006570688', 'Denma', 'Kapten Inf ', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (357, 'Hamdan Fauzul Adhim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110009390289', 'Denma', 'Kapten Inf ', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (358, 'Dana Pranata', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110010360489', 'Denma', 'Kapten Inf ', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (359, 'Ahmad Lugas Prayogo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11110009050289', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (360, 'Yudanto Budi Prastowo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11140029810790', 'Denma', 'Lettu Cku', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (361, 'Harnowo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21980161600479', 'Denma', 'Lettu Chb', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (362, 'Jarot Purnomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '3920723280173', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (363, 'Arif Triantoko', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21000085030679', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (364, 'M. Zaenuddin F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11140008520991', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (365, 'Suko Giantoro', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21990091310680', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (366, 'Zarot Zamzami', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11160019650693', 'Denma', 'Lettu Czi', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (367, 'Usman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960379351176', 'Denma', 'Lettu Inf', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (368, 'dr. Tri Taufiqurocman T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11160026170291', 'Denma', 'Lettu Ckm', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (369, 'Hegia Sanjaya S', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11160024920590', 'Denma', 'Letda Cku', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (370, 'Robin Sirait S', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11160026090191', 'Denma', 'Letda Cba', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (371, 'Ryan Hermawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '11170019230396', 'Denma', 'Letda Chb', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (372, 'Paijo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21020026860383', 'Denma', 'Letda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (373, 'Aminuddin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '632446', 'Denma', 'Peltu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (374, 'Agustinus Lokollo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '3910133311268', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (375, 'Parna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '633661', 'Denma', 'Peltu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (376, 'Toto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '3900084640768', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (377, 'Lalu Surya Jaya', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31930575630174', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (378, 'Tjasrikin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31940365580773', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (379, 'Muhamad Nuh', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31940221940873', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (380, 'Sutisna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31950424560875', 'Denma', 'Pelda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (381, 'Manuri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31950460101175', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (382, 'Kadima', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31950401120773', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (383, 'Saparudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960094131274', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (384, 'Slamet', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960378110176', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (385, 'Jiman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960134071175', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (386, 'Supriyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960377370976', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (387, 'Agus Salim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21040221200584', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (388, 'Tedy Wahyudi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21040288790885', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (389, 'Rusnadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21040007950383', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (390, 'Ghanie Ramadhan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21040214860783', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (391, 'Prayitno Eko S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960137870576', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (392, 'Tomi yuda nugroho', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21020182860582', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (393, 'Paryanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21040201321281', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (394, 'Abdul Haris', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (395, 'Heri Sulistio', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (396, 'Suprianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (397, 'Ahmad Buang', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '', 'Denma', 'Serma', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (398, 'Bayu Tisno P', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21060179950884', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (399, 'Daud bili pakereng', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960364240176', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (400, 'Safiudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960391881077', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (401, 'Suhananta', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21060121290485', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (402, 'Rangga Paty S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21060008920685', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (403, 'Abdul Malik', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960370670576', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (404, 'Wahyu Kisnadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21070494430587', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (405, 'Ahmad Sobari', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21080842090887', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (406, 'I Ketut Hendra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31950386360477', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (407, 'Faruk', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960353350175', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (408, 'Boyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960436850675', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (409, 'Bambang Purnomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960461181177', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (410, 'Teguh Wicaksono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960462660378', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (411, 'I Made Sudarma', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960382300177', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (412, 'Irpan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960353010175', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (413, 'Joko Suhardi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960809270577', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (414, 'Diyan Kristianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960390630877', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (415, 'Miftahudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970367531277', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (416, 'Trubus', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960798870676', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (417, 'I Komang Sukarna', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960375620876', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (418, 'Eko Budi Utomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970327940276', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (419, 'Agus Budyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970341880877', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (420, 'Erik sandro sarean', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21060219971284', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (421, 'Karsilan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21060165911285', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (422, 'Nur Ikhsan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970345010178', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (423, 'M. Mahmudi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970337760377', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (424, 'Agus Supriya', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970328770376', 'Denma', 'Serka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (425, 'Joko Setyono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21100242350990', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (426, 'Muhammad Salman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21110060251089', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (427, 'Mochamad Jahuri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960449150976', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (428, 'Nicolau Ximenes', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970349150675', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (429, 'Lilik Budiyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970361830677', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (430, 'Agus Cahyono', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31990642660877', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (431, 'Supeno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31990483190678', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (432, 'Taufik Apriyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970359120477', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (433, 'Gatot Pujianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970366131077', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (434, 'Agus Budi Utomo', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21120197380890', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (435, 'Pandu Sandha Yudha', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21130050250693', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (436, 'Aunur Rofik', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960374710776', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (437, 'Wijaya Kusuma', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960451101176', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (438, 'Kasihadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970363240777', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (439, 'Lilik Supriyadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21140053471192', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (440, 'Rizky Ananda', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21140005201194', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (441, 'Affan Husaini ', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960383210177', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (442, 'Wawan Datun', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31980403741277', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (443, 'Yatimin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31990504970680', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (444, 'Anton Nurhayadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21120197040790', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (445, 'Sirajudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970351770676', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (446, 'Oma Suganda', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31980406550478', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (447, 'I Putu Mahardika', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31960395351178', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (448, 'Bambang S.', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31010524090780', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (449, 'Yulianto Agung Nugroho', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21160062020797', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (450, 'Yahfi Sohib', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21150199580394', 'Denma', 'Sertu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (451, 'Deni Ahmad F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31030540980982', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (452, 'Buhari Rahman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31030739990382', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (453, 'M. Alfreds Pagalu', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31030723710983', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (454, 'Ujang Parman', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31050666450785', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (455, 'Sugeng Pratikno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31050691930184', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (456, 'Arbianto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31050811281084', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (457, 'Dadang Suryana', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31970370170578', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (458, 'Saiful Anwar', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31050834340186', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (459, 'Thomas Paulus T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '21190183781198', 'Denma', 'Serda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (460, 'Yudi Yulius', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31070892980685', 'Denma', 'Kopda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (461, 'Andi Gunawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31071200851085', 'Denma', 'Kopda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (462, 'Ipan Tajudin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31081659310589', 'Denma', 'Kopda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (463, 'Septyanto Ryan T', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31081660790989', 'Denma', 'Kopda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (464, 'Riki Jaya Putra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31081576800688', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (465, 'Roby Rosandy', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110456090690', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (466, 'Anas Rifa?i', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110598400290', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (467, 'Andika', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110350060390', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (468, 'Joko Herwanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110544520992', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (469, 'Jeckyryan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31090286411189', 'Denma', 'Kopda', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (470, 'Yachya Guntur M', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110458490990', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (471, 'Muhammad Yusuf', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120087391091', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (472, 'Luthfi Setyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120489741291', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (473, 'M. Alim Bahri', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120537761091', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (474, 'Angga Adi Sasmita', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120495840792', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (475, 'Kiswadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120038210290', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (476, 'Robi Kornelis', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120406660493', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (477, 'Ass Syabiqinnor R', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120519450692', 'Denma', '', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (478, 'Dedi Indriansyah', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120445770392', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (479, 'Adi Yatim', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110498091091', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (480, 'Panji Angga Pratama', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120335621289', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (481, 'Eko Ramdani', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130455570393', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (482, 'Eko Suratno', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130726681193', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (483, 'Muhammad Irfan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130561580493', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (484, 'Tommy Perdana Putra', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130485690991', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (485, 'Dona Herliawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130640380591', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (486, 'Dedek Irawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130446181191', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (487, 'Deden Purnama', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31120581710893', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (488, 'Ebi Biantoro', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31130432060894', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (489, 'Fadullulah Rosadi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31110457240790', 'Denma', 'Praka', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (490, 'Raja Hamonangan M', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140042150192', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (491, 'Muchlis Kurniyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140131090592', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (492, 'Gigih Baris Diana', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140226541193', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (493, 'Jumardin', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140273560395', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (494, 'Rahmad Julian F', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140323560792', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (495, 'Surahmat', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140353670493', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (496, 'Teguh Setyawan', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140499541093', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (497, 'Faisal', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140336690295', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (498, 'Simon Bria', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140308551094', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (499, 'Sardi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140455560693', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (500, 'Junaidi', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140223240493', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (501, 'Andre Oktavianus Seru', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140318951093', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (502, 'Ariyanto', '$2y$10$HdvjddYTY6UkwtCMm5nfQuI/EMsIe/ZOJrNhOTqhtVNvI5X3aYOa2', 'dummy@gmail.com', 5, '31140324551092', 'Denma', 'Pratu', 25000);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (503, 'Test1', '$2y$10$BXacEnMtd0tooeRzOT5XqOBng3LShe9suEmflwlMeyyEwpok9aYra', 'mysecondemailboven@gmail.com', 5, '0987123456', 'Cek', 'Unconfirm', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (504, 'Prio DS', '$2y$10$ETZxKq./tpGJnWAwug1sA..QEVqV79AiiaU62oAa/ZjEwBWMMNLHu', 'boventvandeboo@gmail.com', 5, '4567890123', 'Yon 17', 'Danton', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (505, 'Testing Purpose', '$2y$10$rZqVQbQvnP3IyVT1nS6tnucibQYVNG98g9s8HIZcBiLPaA/QIergO', 'test@gmail.com', 5, '0812', 'Test', 'teset', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (506, 'Alan', '$2y$10$8ujKEPijp2ySILiXKB17ruL5I24BcFtIY0ncwv34hZ3lxQQHjYH56', 'cc@digitalsystemindo.com', 5, '789456123', 'Yon13', 'Serka', 0);
INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `email`, `level`, `kode_anggota`, `satuan`, `jabatan`, `pokok`) VALUES (507, 'nama lengkap', 'password', 'email@email.com', 3, 'username', 'satuan', 'jabatan', 0);


#
# TABLE STRUCTURE FOR: tbl_voucher
#

DROP TABLE IF EXISTS `tbl_voucher`;

CREATE TABLE `tbl_voucher` (
  `id_voucher` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` int(10) NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_voucher`)
) ENGINE=InnoDB AUTO_INCREMENT=665 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (341, 341, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (342, 342, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (343, 343, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (344, 344, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (345, 345, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (346, 346, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (347, 347, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (348, 348, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (349, 349, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (350, 350, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (351, 351, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (352, 352, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (353, 353, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (354, 354, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (355, 355, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (356, 356, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (357, 357, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (358, 358, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (359, 359, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (360, 360, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (361, 361, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (362, 362, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (363, 363, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (364, 364, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (365, 365, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (366, 366, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (367, 367, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (368, 368, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (369, 369, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (370, 370, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (371, 371, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (372, 372, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (373, 373, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (374, 374, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (375, 375, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (376, 376, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (377, 377, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (378, 378, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (379, 379, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (380, 380, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (381, 381, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (382, 382, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (383, 383, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (384, 384, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (385, 385, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (386, 386, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (387, 387, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (388, 388, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (389, 389, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (390, 390, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (391, 391, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (392, 392, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (393, 393, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (394, 394, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (395, 395, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (396, 396, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (397, 397, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (398, 398, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (399, 399, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (400, 400, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (401, 401, 'Januari', 2021, 1);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (402, 402, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (403, 403, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (404, 404, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (405, 405, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (406, 406, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (407, 407, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (408, 408, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (409, 409, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (410, 410, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (411, 411, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (412, 412, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (413, 413, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (414, 414, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (415, 415, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (416, 416, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (417, 417, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (418, 418, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (419, 419, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (420, 420, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (421, 421, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (422, 422, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (423, 423, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (424, 424, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (425, 425, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (426, 426, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (427, 427, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (428, 428, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (429, 429, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (430, 430, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (431, 431, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (432, 432, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (433, 433, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (434, 434, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (435, 435, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (436, 436, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (437, 437, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (438, 438, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (439, 439, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (440, 440, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (441, 441, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (442, 442, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (443, 443, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (444, 444, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (445, 445, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (446, 446, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (447, 447, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (448, 448, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (449, 449, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (450, 450, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (451, 451, 'Januari', 2021, 1);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (452, 452, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (453, 453, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (454, 454, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (455, 455, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (456, 456, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (457, 457, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (458, 458, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (459, 459, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (460, 460, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (461, 461, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (462, 462, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (463, 463, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (464, 464, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (465, 465, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (466, 466, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (467, 467, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (468, 468, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (469, 469, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (470, 470, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (471, 471, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (472, 472, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (473, 473, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (474, 474, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (475, 475, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (476, 476, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (477, 477, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (478, 478, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (479, 479, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (480, 480, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (481, 481, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (482, 482, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (483, 483, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (484, 484, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (485, 485, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (486, 486, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (487, 487, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (488, 488, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (489, 489, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (490, 490, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (491, 491, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (492, 492, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (493, 493, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (494, 494, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (495, 495, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (496, 496, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (497, 497, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (498, 498, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (499, 499, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (500, 500, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (501, 501, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (502, 502, 'Januari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (503, 341, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (504, 342, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (505, 343, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (506, 344, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (507, 345, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (508, 346, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (509, 347, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (510, 348, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (511, 349, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (512, 350, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (513, 351, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (514, 352, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (515, 353, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (516, 354, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (517, 355, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (518, 356, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (519, 357, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (520, 358, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (521, 359, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (522, 360, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (523, 361, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (524, 362, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (525, 363, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (526, 364, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (527, 365, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (528, 366, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (529, 367, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (530, 368, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (531, 369, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (532, 370, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (533, 371, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (534, 372, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (535, 373, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (536, 374, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (537, 375, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (538, 376, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (539, 377, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (540, 378, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (541, 379, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (542, 380, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (543, 381, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (544, 382, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (545, 383, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (546, 384, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (547, 385, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (548, 386, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (549, 387, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (550, 388, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (551, 389, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (552, 390, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (553, 391, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (554, 392, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (555, 393, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (556, 394, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (557, 395, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (558, 396, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (559, 397, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (560, 398, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (561, 399, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (562, 400, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (563, 401, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (564, 402, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (565, 403, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (566, 404, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (567, 405, 'Pebruari', 2021, 1);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (568, 406, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (569, 407, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (570, 408, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (571, 409, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (572, 410, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (573, 411, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (574, 412, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (575, 413, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (576, 414, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (577, 415, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (578, 416, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (579, 417, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (580, 418, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (581, 419, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (582, 420, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (583, 421, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (584, 422, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (585, 423, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (586, 424, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (587, 425, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (588, 426, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (589, 427, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (590, 428, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (591, 429, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (592, 430, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (593, 431, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (594, 432, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (595, 433, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (596, 434, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (597, 435, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (598, 436, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (599, 437, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (600, 438, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (601, 439, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (602, 440, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (603, 441, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (604, 442, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (605, 443, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (606, 444, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (607, 445, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (608, 446, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (609, 447, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (610, 448, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (611, 449, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (612, 450, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (613, 451, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (614, 452, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (615, 453, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (616, 454, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (617, 455, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (618, 456, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (619, 457, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (620, 458, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (621, 459, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (622, 460, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (623, 461, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (624, 462, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (625, 463, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (626, 464, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (627, 465, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (628, 466, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (629, 467, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (630, 468, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (631, 469, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (632, 470, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (633, 471, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (634, 472, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (635, 473, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (636, 474, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (637, 475, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (638, 476, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (639, 477, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (640, 478, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (641, 479, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (642, 480, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (643, 481, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (644, 482, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (645, 483, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (646, 484, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (647, 485, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (648, 486, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (649, 487, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (650, 488, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (651, 489, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (652, 490, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (653, 491, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (654, 492, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (655, 493, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (656, 494, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (657, 495, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (658, 496, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (659, 497, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (660, 498, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (661, 499, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (662, 500, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (663, 501, 'Pebruari', 2021, 0);
INSERT INTO `tbl_voucher` (`id_voucher`, `id_user`, `bulan`, `tahun`, `status`) VALUES (664, 502, 'Pebruari', 2021, 0);


