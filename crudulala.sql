-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2017 at 12:48 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `trainit-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelamin_siswa` varchar(25) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `foto_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelamin_siswa`, `alamat_siswa`, `foto_siswa`) VALUES
(17, 'Andi Susanto HH', 'laki-laki', 'Bumisari', '2017_07_25_11_07_25_hqdefault.jpg'),
(19, 'Nizam Zam', 'laki-laki', 'Condong Catur', '2017_07_25_11_07_25_memetahukahkamu0-370x297.jpg'),
(20, 'Fandy Hafidz Aja', 'perempuan', 'Purbalingga', '2017_07_25_11_07_25_joko bodo.jpeg'),
(21, 'Bobo', 'laki-laki', 'Mars', '2017_07_25_11_07_25_yemott.jpg'),
(22, 'Punkaz Singa Singa', 'laki-laki', 'gambiran bersatu', '2017_07_25_12_07_25_xixixii.jpg'),
(23, 'Stich Ulala', 'perempuan', 'Planet Namex', '2017_07_25_14_07_25_Stich.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;