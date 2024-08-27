-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `Tanggal Daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `status`, `no_telepon`, `keterangan`, `Tanggal Daftar`) VALUES
('000033310', 'Crowl', 'margaasih', '2000-10-02', '2000-10-02', 'laki-laki', 'Belum Menikah', '089129345', 'kel kel', '2014-02-25 02:00:36'),
('1113308', 'Sadan', 'Komplek Permata Cimahi', '1995-12-27', 'Bandung', 'laki-laki', 'Belum Menikah', '089656161575', 'WOw sekali', '0000-00-00 00:00:00'),
('3331108', 'sadis', 'cipetet', '1996-12-18', 'Bandung', 'perempuan', 'Belum Menikah', '0899680843', 'Wew sekali', '0000-00-00 00:00:00'),
('AGT1109', 'indra', 'konoha', '2004-04-09', 'Braunau am inn', 'laki-laki', 'Belum Menikah', '0218317681', 'anggota baru', '2024-07-01 03:42:13'),
('AGT1110', 'mirsa', 'gunung kidul', '2006-05-18', 'yogyakarta', 'perempuan', 'Belum Menikah', '01762149821', 'anggota baru', '2024-07-01 04:27:41'),
('AGT1111', 'bayu', 'sleman', '2000-01-10', 'timor', 'laki-laki', 'Belum Menikah', '0818284982', 'anggota baru', '2024-07-03 03:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(12) NOT NULL,
  `id_kategori` varchar(12) NOT NULL,
  `id_anggota` varchar(12) NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `angsuran_ke` varchar(12) NOT NULL,
  `besar_angsuran` varchar(12) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_pinjaman` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_kategori`, `id_anggota`, `tanggal_pembayaran`, `angsuran_ke`, `besar_angsuran`, `keterangan`, `id_pinjaman`) VALUES
('656', '1', '3331108', '2024-07-01 04:41:34', '4', '200000', 'lunas', '1615'),
('AS07', '12', 'AGT1109', '2024-07-01 04:31:12', '2', '100000', 'lunas', '0'),
('AS08', '12', 'AGT1109', '2024-07-01 04:31:12', '2', '5000', 'lunas', '0'),
('AS09', '1', '3331108', '2024-07-01 04:41:34', '4', '200000', 'belum lunas', '1615'),
('AS10', '12', 'AGT1111', '2024-07-03 03:55:30', '2', '200000', 'lunas', '2225'),
('AS11', '12', 'AGT1111', '2024-07-03 03:55:30', '2', '350000', 'lunas', '2225');

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

CREATE TABLE `detail_angsuran` (
  `kode_angsuran` varchar(12) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `besar_angsuran` varchar(12) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

CREATE TABLE `kategori_pinjaman` (
  `id_kategori_pinjaman` varchar(12) NOT NULL DEFAULT '',
  `nama_pinjaman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_pinjaman`
--

INSERT INTO `kategori_pinjaman` (`id_kategori_pinjaman`, `nama_pinjaman`) VALUES
('1', 'pinjaman jangka pendek'),
('2', 'pinjaman jangka menengah'),
('3', 'pinjaman jangka panjang');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_koperasi`
--

CREATE TABLE `petugas_koperasi` (
  `id_petugas` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petugas_koperasi`
--

INSERT INTO `petugas_koperasi` (`id_petugas`, `nama`, `alamat`, `no_telepon`, `tempat_lahir`, `tanggal_lahir`, `keterangan`) VALUES
('987654321', 'Tomfu Chalk', 'Chalk Zone', '99999', 'Global tv', '1000-02-12', 'Chalk Zone Global tv');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(12) NOT NULL,
  `nama_pinjaman` varchar(40) NOT NULL,
  `id_anggota` varchar(12) NOT NULL,
  `besar_pinjaman` varchar(12) NOT NULL,
  `tanggal_pengajuan_pinjaman` date NOT NULL,
  `tanggal_acc_peminjam` date NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `id_angsuran` varchar(12) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_kategori_pinjaman` varchar(12) NOT NULL,
  `id_petugas` varchar(12) NOT NULL,
  `besar_jasa` varchar(15) NOT NULL,
  `lama_cicilan` varchar(15) NOT NULL,
  `besar_angsuran` varchar(15) NOT NULL,
  `sisa_pinjaman` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tanggal_pengajuan_pinjaman`, `tanggal_acc_peminjam`, `tanggal_pinjaman`, `tanggal_pelunasan`, `id_angsuran`, `keterangan`, `id_kategori_pinjaman`, `id_petugas`, `besar_jasa`, `lama_cicilan`, `besar_angsuran`, `sisa_pinjaman`) VALUES
(1, 'pinjam', 'AGT1109', '100000', '2024-07-01', '2024-07-01', '2024-07-01', '0000-00-00', '', 'lunas', '12', 'PTG001', '5', '10', '10500', '0'),
(1111, 'modal', '000033310', '100000000', '2014-02-19', '2014-02-26', '2014-02-05', '2014-02-13', '100', 'belum lunas', '3', '987654321', '10', '12', '10000', '-10000'),
(1313, 'beli buku', '3331108', '200000', '2014-02-03', '2014-02-04', '2014-02-04', '2014-02-11', '3131', 'belum lunas', '1', '987654321', '3', '1', '50000', '1000000'),
(1615, 'Nyoba pinjam', '3331108', '1000000', '2014-02-02', '2014-02-02', '2014-02-02', '2014-02-02', '656', 'belum lunas', '1', '987654321', '5', '1', '200000', '800000'),
(2222, 'dagang', '000033310', '1000000', '2014-02-19', '2014-02-13', '2014-02-14', '2014-02-21', '200', 'belum lunas', '2', '987654321', '5', '3', '2000', '998000'),
(2224, 'depo', 'AGT1110', '500000', '2024-07-01', '2024-07-01', '2024-07-01', '0000-00-00', '', 'belum lunas', '12', 'PTG001', '5', '5', '105000', '525000'),
(2225, 'pinjam', 'AGT1111', '500000', '2024-07-03', '2024-07-03', '2024-07-03', '0000-00-00', '', 'lunas', '12', 'PTG001', '10', '10', '55000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` varchar(12) NOT NULL,
  `nama_simpanan` varchar(40) NOT NULL,
  `id_petugas` varchar(12) NOT NULL,
  `id_anggota` varchar(12) NOT NULL,
  `tanggal_simpanan` date NOT NULL,
  `besar_simpanan` varchar(12) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `nama_simpanan`, `id_petugas`, `id_anggota`, `tanggal_simpanan`, `besar_simpanan`, `keterangan`) VALUES
('12', '12', '21', '000033310', '2014-02-03', '1000000', 'lakslaks'),
('1212', 'asas', '212', '1113308', '2014-02-04', '10000', 'wwwwww'),
('SI13', 'Simpanan Pokok', 'PTG001', 'AGT1109', '0000-00-00', '1000000', 'simpanan baru'),
('SI14', 'Simpanan Pokok', 'PTG001', 'AGT1110', '2024-07-01', '1000000', 'simpanan baru'),
('SI15', 'Simpanan Pokok', 'PTG001', 'AGT1110', '2024-07-02', '200000', 'tambahan'),
('SI16', 'Simpanan Pokok', 'PTG001', 'AGT1111', '2024-07-03', '100000', 'simpanan baaru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `id`) VALUES
('crowl', 'crowl', 'anggota', '000033310'),
('petugas', 'petugas', 'petugas', 'PTG001'),
('qk', 'klqw', 'petugas', 'PTG32'),
('sadan', 'admin', 'admin', '01'),
('sadis', 'sadis', 'anggota', '3331108'),
('saya', 'anggota', 'anggota', '1113308');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `FK_angsuran` (`id_pinjaman`);

--
-- Indexes for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD PRIMARY KEY (`kode_angsuran`);

--
-- Indexes for table `kategori_pinjaman`
--
ALTER TABLE `kategori_pinjaman`
  ADD PRIMARY KEY (`id_kategori_pinjaman`);

--
-- Indexes for table `petugas_koperasi`
--
ALTER TABLE `petugas_koperasi`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `FK_pinjaman-petugas` (`id_petugas`),
  ADD KEY `FK_pinjaman-anggota` (`id_anggota`),
  ADD KEY `FK_pinjaman-kategori` (`id_kategori_pinjaman`),
  ADD KEY `FK_pinjaman_angsuran` (`id_angsuran`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `FK_petugas-simpanan` (`id_petugas`),
  ADD KEY `FK_simpanan-anggota` (`id_anggota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
