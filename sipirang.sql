-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 05:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipirang`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nip`, `token`, `pass`, `status`, `level`) VALUES
(3, '3333', '2be9bd7a3434f7038ca27d1918de58bd', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2),
(4, '123565', '88574d919b24c9e56f53364e1c7af45a', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1),
(5, '11111111', '1bbd886460827015e5d605ed44252251', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2),
(6, '4545', '1f6419b1cbe79c71410cb320fc094775', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1),
(7, '3234', 'c5658c711ba9170700fc7d3ee3f63e40', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `tmp_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nip`, `nama`, `jabatan`, `golongan`, `bidang`, `tmp_lahir`, `tgl_lahir`, `gambar`) VALUES
(4, '445561', 'ergdfdg', 'sdvf f', 'dfb', 'adsf', 'Semarang', '1995-04-28', 'warna1.jpg'),
(6, '123565', 'ergdfdg hh', 'sdvf f', 'dfb', 'adsf', 'Semarang', '1998-05-06', 'logo.jpg'),
(7, '11111111', 'ergdfdg', 'Sekretaris', 'dfb', 'adsf', 'Semarang', '2019-05-01', 'pilihan.png'),
(8, '4545', 'Wibowo Sandi', 'Sekretaris', '3/b', 'Umum', 'Semarang', '1998-05-08', 'logo1.jpg'),
(9, '3234', 'Sunarto', 'Sekretaris', '3/b', 'adsf', 'Semarang', '2019-05-20', 'texture-red-brick-wall.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kd_brg` char(7) NOT NULL,
  `nm_brg` varchar(30) NOT NULL,
  `kategori` int(2) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `spek` varchar(150) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_brg`, `nm_brg`, `kategori`, `merk`, `spek`, `tgl_masuk`, `gambar`, `status`) VALUES
(1, 'B-0001', 'Mouse', 3, 'Acer', 'DPI 3000 optical speed 100mbps', '2019-05-02', 'slide33.jpg', 0),
(16, 'B-0010', 'Pensil', 5, '2B Faber Castel', '2B warna Hitam', '2019-05-06', 'invoker.jpg', 0),
(17, 'B-00017', 'Laptop', 3, 'Asus', 'dsfasdfa asdf', '2019-05-08', 'texture-red-brick-wall1.jpg', 0),
(19, 'B-00019', 'monitor', 3, 'acer', 'bagus', '2019-05-12', '', 0),
(20, 'B-00020', 'sdasfdvas', 5, 'sdaf', 'sfdgaasgf', '2019-05-24', 'jabat-tangan-ilustrasi-_151221213119-605.jpg', 1),
(21, 'B-00021', 'sdasfdvasd  dsv', 2, 'sdaf  aadd', 'assdf avsfsa asvsv', '2019-05-24', 'pilihan.png', 1),
(22, 'B-00022', 'dsfhsdh fdg', 5, 'gfds ', 'sdfg dgfbs', '2019-05-24', 'WIN_20180709_17_31_52_Pro.jpg', 1),
(23, 'B-00023', 'asdgfb defgdsfb ', 2, 'samsung', 'dasdgf sdga', '2019-05-24', 'thumb-1920-480538.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kat`) VALUES
(1, 'Kendaraan'),
(2, 'Teknis'),
(3, 'Elektronik'),
(4, 'Perpustakaan'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `kd_pjm` varchar(7) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kd_brg` varchar(7) NOT NULL,
  `tgl_pjm` date NOT NULL,
  `estimasi` date NOT NULL,
  `tgl_kmbl` date NOT NULL,
  `ptg_pjm` varchar(30) NOT NULL,
  `ptg_kmbl` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `kd_pjm`, `nip`, `kd_brg`, `tgl_pjm`, `estimasi`, `tgl_kmbl`, `ptg_pjm`, `ptg_kmbl`, `status`) VALUES
(2, 'P-00002', '445561', 'B-0001', '2019-05-01', '2019-05-04', '2019-05-12', 'Susan Indana', 'Susan Indana', 1),
(3, 'P-00002', '445561', 'B-0010', '2019-05-01', '2019-05-04', '2019-05-24', 'Susan Indana', 'ergdfdg', 1),
(4, 'P-00004', '123565', 'B-0001', '2019-05-16', '2019-05-14', '2019-05-13', 'ergdfdg', 'ergdfdg', 1),
(5, 'P-00004', '123565', 'B-00017', '2019-05-16', '2019-05-14', '2019-05-13', 'ergdfdg', 'ergdfdg', 1),
(6, 'P-00004', '123565', 'B-00019', '2019-05-16', '2019-05-14', '2019-05-14', 'ergdfdg', 'ergdfdg', 1),
(7, 'P-00007', '3234', 'B-0001', '2019-05-20', '2019-05-27', '0000-00-00', 'ergdfdg', '', 0),
(8, 'P-00008', '3234', 'B-00017', '2019-05-24', '2019-05-31', '0000-00-00', 'Wibowo Sandi', '', 0),
(9, 'P-00009', '445561', 'B-00019', '2019-05-24', '2019-05-31', '0000-00-00', 'Wibowo Sandi', '', 0),
(10, 'P-00010', '123565', 'B-0010', '2019-05-24', '2019-05-31', '0000-00-00', 'ergdfdg', '', 0),
(11, 'P-00010', '123565', 'B-00021', '2019-05-24', '2019-05-31', '2019-05-24', 'ergdfdg', 'ergdfdg', 1),
(12, 'P-00010', '123565', 'B-00023', '2019-05-24', '2019-05-31', '2019-05-24', 'ergdfdg', 'ergdfdg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
