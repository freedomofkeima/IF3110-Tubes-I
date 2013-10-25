-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 11:23 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tubes1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `gambar`, `nama_barang`, `harga_barang`, `keterangan`, `jumlah_barang`) VALUES
(3, 1, '', 'Beras', 8500, 'Ini beras per 1 kg', 1000000),
(4, 1, '', 'Gula Pasir', 12000, 'Ini gula pasir per 1 kg', 1000000),
(5, 1, '', 'Minyak Goreng', 11000, 'Minyak Goreng per 1 liter', 1000000),
(6, 1, '', 'Telur Ayam', 15000, 'Telur Ayam per 1 kg', 1000000),
(7, 2, '', 'Blackberry CDMA 9930 Hitam', 1500000, '', 100),
(8, 2, '', 'Acer Liquid E2', 2500000, '', 125),
(9, 2, '', 'Samsung Galaxy S4', 7000000, '', 90),
(10, 2, '', 'BlackBerry Q5', 4500000, '', 190),
(11, 3, '', 'BROCO Fitting', 10000, '', 340),
(12, 3, '', 'BROCO Socket Antenna TV', 50000, '', 150),
(13, 3, '', 'HOME Electric Saver', 285000, 'Alat hemat listrik daya 450-1300 W', 175),
(14, 3, '', 'KLIK-IT Stop Kontak ', 100000, 'Injeksi 1 lubang seri KL5N2', 231),
(15, 4, '', 'Optical Drive Asus DVDRW External Slim SDRW-08D2SU-LITE', 350000, '', 85),
(16, 4, '', 'Memory DDR3 Corsair CMD8GX3M2A1600C9 (2x4Gb) DDR3 ', 1600000, '', 110),
(17, 4, '', 'LCD Monitor Acer 24 Inch S243HL Size 24 inch', 3000000, '', 95),
(18, 4, '', ' Harddisk External A-Data HD-710 1 TB Ext.2.5 Inch', 950000, '', 145),
(19, 5, '', 'PANASONIC Dish Dryer [FD-S03S1-W]', 850000, '', 84),
(20, 5, '', 'DOMO Stand Water Dispenser [DI 2020]', 1400000, '', 78),
(21, 5, '', 'PANASONIC Mesin Cuci Twin Tub [NA-W75BC1A]', 2000000, 'Warna Biru', 65),
(22, 5, '', 'PHILIPS Setrika [HD1172]', 200000, '', 55),
(23, 6, '', 'FABER-CASTELL 119043', 13500, '3 buah', 500),
(24, 6, '', 'STABILO Boss Set 2 [B-104]', 19000, '2 Warna, kuning dan orange', 259),
(25, 6, '', 'CROSS Calais Chrome Blue Lacquer [AT0112-3]', 210000, '', 167),
(26, 6, '', 'MOLESKINE Classic Notebook Squared Soft Cover', 200000, 'Buku tulis ini ada 192 Halaman', 231);

-- --------------------------------------------------------

--
-- Table structure for table `barang_cart`
--

CREATE TABLE IF NOT EXISTS `barang_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expired_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  `isKirim` tinyint(1) NOT NULL,
  `id_card` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(1, 'Sembako'),
(2, 'Handphone'),
(3, 'Peralatan Listrik'),
(4, 'Aksesoris Komputer'),
(5, 'Perabotan Rumah'),
(6, 'Alat Tulis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `HP` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kodepos` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `isCreditCard` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama_lengkap`, `HP`, `alamat`, `provinsi`, `kodepos`, `email`, `password`, `kota`, `kabupaten`, `isCreditCard`) VALUES
(4, 'habibie', 'Habibie Faried', '08561435232', 'Jl. Pelesiran', 'Jawa Barat', 40116, 'habibiefaried@gmail.com', 'habibie', 'Bandung', '-', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;