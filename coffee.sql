-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jan 2021 pada 05.06
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_user` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'A'),
(2, 'Operator', 'operator', 'O'),
(4, 'Wayan ', 'wayan', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` int(5) NOT NULL,
  `nama_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `nama_bayar`) VALUES
(2, 'Bayar Ditempat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `tb_biaya_kirim` (
  `id_biaya_kirim` int(10) NOT NULL,
  `id_kel` int(10) NOT NULL,
  `biaya` int(10) NOT NULL,
  `id_kurir` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_biaya_kirim`
--

INSERT INTO `tb_biaya_kirim` (`id_biaya_kirim`, `id_kel`, `biaya`, `id_kurir`) VALUES
(2, 6, 20000, 1),
(3, 7, 5000, 3),
(4, 6, 7000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_order`
--

CREATE TABLE IF NOT EXISTS `tb_detail_order` (
  `id_detail_order` int(10) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_jasa` int(10) NOT NULL,
  `invoice` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_detail_order`, `id_order`, `id_jasa`, `invoice`, `jumlah`, `total`, `username`, `tanggal`) VALUES
(6, 35, 3, 3584, 1, 25000, 'wy', '03/01/2021'),
(7, 37, 5, 1030, 1, 27000, 'aku', '03/01/2021'),
(8, 38, 3, 2049, 1, 3805000, 'wy', '03/01/2021'),
(9, 39, 3, 2049, 1, 3805000, 'wy', '03/01/2021'),
(10, 40, 3, 2801, 1, 25000, 'wy', '03/01/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `Idkategori` int(3) NOT NULL,
  `Namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`Idkategori`, `Namakategori`) VALUES
(4, 'Boba'),
(6, 'Coffee'),
(8, 'Milk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelurah`
--

CREATE TABLE IF NOT EXISTS `tb_kelurah` (
  `id_kel` int(5) NOT NULL,
  `nama_kel` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelurah`
--

INSERT INTO `tb_kelurah` (`id_kel`, `nama_kel`) VALUES
(6, 'Patok'),
(7, 'Candipuro'),
(8, 'Trimomukti'),
(9, 'BaliNuraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kurir`
--

CREATE TABLE IF NOT EXISTS `tb_kurir` (
  `id_kurir` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kurir`
--

INSERT INTO `tb_kurir` (`id_kurir`, `nama`) VALUES
(1, 'Go-Food'),
(3, 'Go-Send'),
(4, 'COD'),
(5, 'AnterAja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` int(5) NOT NULL,
  `status_order` varchar(1) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_session` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `status_order`, `id_produk`, `jumlah`, `harga`, `id_session`) VALUES
(30, 'P', 5, 1, 20000, 6),
(31, 'P', 6, 1, 400000, 6),
(32, 'P', 7, 3, 3400000, 6),
(33, 'P', 8, 1, 230000, 6),
(34, 'P', 4, 1, 20000, 6),
(35, 'S', 5, 1, 20000, 6),
(36, 'C', 8, 1, 230000, 6),
(37, 'P', 5, 1, 20000, 0),
(38, 'P', 7, 1, 3400000, 0),
(39, 'P', 6, 1, 400000, 0),
(40, 'P', 4, 1, 20000, 0),
(41, 'C', 5, 1, 20000, 0),
(42, 'C', 5, 1, 20000, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `gambar`) VALUES
(4, 4, 'Latte', 'enak banget', 20000, 'banner2.jpg'),
(5, 8, 'Coffee', 'hgehe', 20000, 'banner1.jpg'),
(6, 6, 'Latte Cappucino ', 'ehheh', 400000, 'banner2.jpg'),
(7, 6, 'Boba Coffee', 'wrtfwqg', 3400000, 'banner1.jpg'),
(8, 8, 'Milk tea', 'dghdgd', 230000, 'banner2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_kelurahan` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama_user`, `alamat`, `password`, `id_kelurahan`) VALUES
(1, 'wy', 'wayan', 'sragi asri', '12345', 7),
(3, 'aku', 'aku', 'aku', 'aku', 6),
(4, 'kwyyy', 'wayan', 'Balinuraga', '12345', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_biaya_kirim`
--
ALTER TABLE `tb_biaya_kirim`
  ADD PRIMARY KEY (`id_biaya_kirim`), ADD KEY `id_kel` (`id_kel`), ADD KEY `id_kurir` (`id_kurir`), ADD KEY `id_kurir_2` (`id_kurir`);

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_detail_order`), ADD KEY `username` (`username`), ADD KEY `id_jasa` (`id_jasa`), ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`Idkategori`);

--
-- Indexes for table `tb_kelurah`
--
ALTER TABLE `tb_kelurah`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`), ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_biaya_kirim`
--
ALTER TABLE `tb_biaya_kirim`
  MODIFY `id_biaya_kirim` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_detail_order` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `Idkategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kelurah`
--
ALTER TABLE `tb_kelurah`
  MODIFY `id_kel` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id_kurir` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_biaya_kirim`
--
ALTER TABLE `tb_biaya_kirim`
ADD CONSTRAINT `tb_biaya_kirim_ibfk_1` FOREIGN KEY (`id_kel`) REFERENCES `tb_kelurah` (`id_kel`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `tb_biaya_kirim_ibfk_2` FOREIGN KEY (`id_kurir`) REFERENCES `tb_kurir` (`id_kurir`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
ADD CONSTRAINT `tb_detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `tb_detail_order_ibfk_2` FOREIGN KEY (`id_jasa`) REFERENCES `tb_kurir` (`id_kurir`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`Idkategori`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurah` (`id_kel`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
