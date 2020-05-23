-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 04:27 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_monitoring`
--
CREATE DATABASE IF NOT EXISTS `db_monitoring` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_monitoring`;

-- --------------------------------------------------------

--
-- Table structure for table `drm`
--

CREATE TABLE IF NOT EXISTS `drm` (
  `Id_drm` varchar(6) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `Hari` varchar(6) NOT NULL,
  `Tanggal` varchar(100) NOT NULL,
  `Jm_msk` time NOT NULL,
  `Jm_mulai` time NOT NULL,
  `Jm_selesai` time NOT NULL,
  `Kantor` varchar(6) NOT NULL,
  `Divisi` varchar(50) NOT NULL,
  `Pembacaan_visi_misi` varchar(15) NOT NULL,
  `Pembacaan_attaubah` varchar(15) NOT NULL,
  `Share_medsos` varchar(15) NOT NULL,
  `Input_muthabaah` varchar(15) NOT NULL,
  `Jm_plg_sblm` time NOT NULL,
  `Aktivitas_sblm` varchar(100) NOT NULL,
  `Pembahansan_drm` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_drm`),
  KEY `Id_Karyawan` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drm`
--

INSERT INTO `drm` (`Id_drm`, `nip`, `Hari`, `Tanggal`, `Jm_msk`, `Jm_mulai`, `Jm_selesai`, `Kantor`, `Divisi`, `Pembacaan_visi_misi`, `Pembacaan_attaubah`, `Share_medsos`, `Input_muthabaah`, `Jm_plg_sblm`, `Aktivitas_sblm`, `Pembahansan_drm`) VALUES
('000001', 'PEG-000001', 'jumat', '2020-01-03', '07:30:00', '08:00:00', '10:00:00', 'Pusat', 'Media', 'sudah', 'sudah', '', '', '20:00:00', 'Lembur', 'liputan ke acara bazar');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_bulanan`
--

CREATE TABLE IF NOT EXISTS `rekap_bulanan` (
  `Id_laporan` int(8) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `Id_drm` int(6) NOT NULL,
  `no_cuti` varchar(5) NOT NULL,
  `Id_Telat` varchar(8) NOT NULL,
  `Tanggal` date NOT NULL,
  PRIMARY KEY (`Id_laporan`),
  KEY `Id_Karyawan` (`nip`),
  KEY `Id_drm` (`Id_drm`),
  KEY `Id_Cuti` (`no_cuti`),
  KEY `Id_Telat` (`Id_Telat`),
  KEY `Tanggal` (`Tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mohoncuti`
--

CREATE TABLE IF NOT EXISTS `tb_mohoncuti` (
  `no_cuti` varchar(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL,
  `dari` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `jml_hari` int(2) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `persetujuan` varchar(10) NOT NULL,
  PRIMARY KEY (`no_cuti`),
  KEY `id_mohoncuti` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mohoncuti`
--

INSERT INTO `tb_mohoncuti` (`no_cuti`, `nip`, `tgl`, `dari`, `sampai`, `jml_hari`, `jenis`, `persetujuan`) VALUES
('00001', 'PEG-000001', '2020-01-02', '2020-01-03', '2020-01-04', 2, 'Nikah', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `nip` varchar(10) NOT NULL DEFAULT '',
  `nama` varchar(64) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `jab` varchar(32) NOT NULL,
  `tmp_lhr` varchar(32) NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `Divisi` varchar(20) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `hak_cuti_tahunan` int(2) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `jk`, `jab`, `tmp_lhr`, `tgl_lhr`, `Divisi`, `telp`, `alamat`, `hak_cuti_tahunan`) VALUES
('PEG-000001', 'Raisa Divania', 'P', 'Kadiv', 'Serang', '1997-01-06', 'Media', '087656454323', 'serang', 12),
('PEG-000002', 'annisa', 'P', 'Pegawai', 'Serang', '1998-01-01', 'Media', '087656543213', 'kp asem', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(10) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `hak_akses`, `aktif`) VALUES
('admin', 'Andi Hatmoko', '123', 'Admin', 'Y'),
('hrd', 'Najwa', '123', 'HRD', 'Y'),
('PEG-000001', 'Raisa Divania', 'PEG-000001', 'Pegawai', 'Y'),
('PEG-000002', 'annisa', 'PEG-000002', 'Pegawai', 'N'),
('PEG-001', 'ardi', '1234', 'KADEP_SDM', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `telat`
--

CREATE TABLE IF NOT EXISTS `telat` (
  `id_telat` varchar(8) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `departemen` varchar(30) NOT NULL,
  `jenis_izin` varchar(30) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_izin` time NOT NULL,
  `lama_izin` text NOT NULL,
  `alasan_izin` text NOT NULL,
  `keg_kantor` text NOT NULL,
  `persetujuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_telat`),
  KEY `Id_ Karyawan` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telat`
--

INSERT INTO `telat` (`id_telat`, `nip`, `divisi`, `departemen`, `jenis_izin`, `tanggal`, `hari`, `jam_izin`, `lama_izin`, `alasan_izin`, `keg_kantor`, `persetujuan`) VALUES
('00000001', 'PEG-000001', 'Fundraising', 'Humas & Media', 'Telat Masuk', '2020-01-03', 'Jumat', '13:00:00', '1 jam', 'menghadiri nikahan', 'design poster bencana', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drm`
--
ALTER TABLE `drm`
  ADD CONSTRAINT `drm_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Constraints for table `tb_mohoncuti`
--
ALTER TABLE `tb_mohoncuti`
  ADD CONSTRAINT `tb_mohoncuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Constraints for table `telat`
--
ALTER TABLE `telat`
  ADD CONSTRAINT `telat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
