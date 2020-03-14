-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 06:55 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `email`, `jk`, `notelp`, `alamat`) VALUES
('100001', 'Rasyidha', 'rasyidah@gmail.com', 'P', '081267283920', '<p>Padang</p>'),
('1109128191', 'Hidra Hamnur', 'hidramanur@gmail.com', 'L', '0819213123456', '				Tarandam'),
('12345', 'Taufik Gusman', 'Taufikgusman@gmail.com', 'L', '09127162712', '<p>Padang</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_jurusan_2` (`id_jurusan`),
  KEY `id_jurusan_3` (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
(1, 'Teknologi Informasi', 'Memiliki 3 prodi'),
(4, 'Teknik Elektro', '<p>Memiliki 2 prodi</p>'),
(6, 'Teknik Mesin', '<p>Memiliki 3 Prodi</p>');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jekel` char(1) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_prodi` (`id_prodi`),
  KEY `id_jurusan_2` (`id_jurusan`),
  KEY `id_prodi_2` (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jekel`, `id_jurusan`, `id_prodi`, `no_telp`, `alamat`) VALUES
('1601091004', 'Yulianti Pratifa', 'P', 1, 1, '081921567182', '50 Koto Payakumbuah	'),
('1601091018', 'Ridha Sardiyeni', 'P', 1, 1, '082284246070', 'Pariaman'),
('1601091021', 'Winni Indah Kurnia Sari', 'L', 1, 1, '082284246070', '<p><strong>Padang</s');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` varchar(50) NOT NULL,
  `jam` varchar(2) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kode_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matkul`, `nama_matkul`, `sks`, `jam`, `keterangan`) VALUES
(1, 'Pancasila', '2', '2', 'Pancasila		'),
(111, 'Web Dinamis', '1', '3', '<p>Praktek Web Dinamis</p>'),
(211, 'Struktur Data', '3', '3', '<p>Teori Struktur Data</p>');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_prodi` (`id_prodi`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_jurusan_2` (`id_jurusan`),
  KEY `id_jurusan_3` (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `keterangan`, `id_jurusan`) VALUES
(1, 'Manajemen Informatika', 'D3 MI			', 1),
(2, 'Teknik Komputer', 'D3 TK	', 1),
(4, 'Teknik Rekayasa Perangkat Lunak', 'D4 TRPL	', 1),
(7, 'Teknik Listrik', '<p>D3 Teknik Listrik</p>', 4),
(8, 'Teknik Mesin', '<p>D3 Teknik Mesin</p>', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('ridha', 'ab6fe89b799cc6088bed16b0f08b3269', 'user'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
