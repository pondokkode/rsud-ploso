-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jan 2015 pada 02.54
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `KodeBarang` varchar(10) NOT NULL,
  `NamaBarang` varchar(20) NOT NULL,
  `Satuan` varchar(15) NOT NULL,
  `HrgBeli` int(11) NOT NULL,
  `HrgJual` int(11) NOT NULL,
  `BarangMasuk` int(11) NOT NULL,
  `BarangKeluar` int(11) NOT NULL,
  `StokMinimum` int(11) NOT NULL,
  `StokTersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`KodeBarang`, `NamaBarang`, `Satuan`, `HrgBeli`, `HrgJual`, `BarangMasuk`, `BarangKeluar`, `StokMinimum`, `StokTersedia`) VALUES
('BRNG000001', 'Radio', 'unit', 25000, 30000, 70, 70, 10, 0),
('BRNG000002', 'Televisi Politron', 'unit', 200000, 250000, 20, 20, 10, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangdibeli`
--

CREATE TABLE IF NOT EXISTS `barangdibeli` (
  `IdBarangDibeli` varchar(10) NOT NULL,
  `NoPembelian` varchar(15) NOT NULL,
  `KodeBarang` varchar(10) NOT NULL,
  `JmlBrgDibeli` int(11) NOT NULL,
  `DiskonBrgDibeli` int(11) NOT NULL,
  `TotHrgBrgDibeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barangdibeli`
--

INSERT INTO `barangdibeli` (`IdBarangDibeli`, `NoPembelian`, `KodeBarang`, `JmlBrgDibeli`, `DiskonBrgDibeli`, `TotHrgBrgDibeli`) VALUES
('BRDB000001', 'TRNSB0000000001', 'BRNG000001', 20, 2000, 498000),
('BRDB000002', 'TRNSB0000000001', 'BRNG000002', 20, 50000, 3950000),
('BRDB000003', 'TRNSB0000000002', 'BRNG000001', 50, 50000, 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangdijual`
--

CREATE TABLE IF NOT EXISTS `barangdijual` (
  `IdBarangDijual` varchar(10) NOT NULL,
  `NoPenjualan` varchar(15) NOT NULL,
  `KodeBarang` varchar(10) NOT NULL,
  `JmlBrgDijual` int(11) NOT NULL,
  `DiskonBrgDijual` int(11) NOT NULL,
  `TotHrgBrgDijual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barangdijual`
--

INSERT INTO `barangdijual` (`IdBarangDijual`, `NoPenjualan`, `KodeBarang`, `JmlBrgDijual`, `DiskonBrgDijual`, `TotHrgBrgDijual`) VALUES
('BRDJ000001', 'TRNSJ0000000001', 'BRNG000001', 9, 0, 270000),
('BRDJ000002', 'TRNSJ0000000002', 'BRNG000001', 5, 0, 150000),
('BRDJ000003', 'TRNSJ0000000003', 'BRNG000001', 56, 0, 1680000),
('BRDJ000004', 'TRNSJ0000000003', 'BRNG000002', 20, 0, 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `KodeKonsumen` varchar(10) NOT NULL,
  `NamaKonsumen` varchar(50) NOT NULL,
  `AlamatKonsumen` varchar(80) NOT NULL,
  `TelpKonsumen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`KodeKonsumen`, `NamaKonsumen`, `AlamatKonsumen`, `TelpKonsumen`) VALUES
('KSMN000001', 'Mochamad Abdul Aziz', 'Jl Puri Mojokerto', '085852720505'),
('KSMN000002', 'Hairul', 'Kalimantan', '085852720507');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `NoPembelian` varchar(15) NOT NULL,
  `KodeProdusen` varchar(10) NOT NULL,
  `TglPembelian` date NOT NULL,
  `BatasTglTerima` date NOT NULL,
  `TotalHrgPembelian` int(11) NOT NULL,
  `StatusPembelian` enum('B','L','T') NOT NULL DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`NoPembelian`, `KodeProdusen`, `TglPembelian`, `BatasTglTerima`, `TotalHrgPembelian`, `StatusPembelian`) VALUES
('TRNSB0000000001', 'PRDN000001', '2015-01-20', '2015-01-30', 4448000, 'L'),
('TRNSB0000000002', 'PRDN000001', '2015-01-20', '2015-01-30', 1200000, 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `NoPenjualan` varchar(15) NOT NULL,
  `KodeKonsumen` varchar(10) NOT NULL,
  `TglPenjualan` date NOT NULL,
  `BatasTglPengiriman` date NOT NULL,
  `TotalHrgPenjualan` int(11) NOT NULL,
  `StatusPenjualan` enum('B','L','T') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`NoPenjualan`, `KodeKonsumen`, `TglPenjualan`, `BatasTglPengiriman`, `TotalHrgPenjualan`, `StatusPenjualan`) VALUES
('TRNSJ0000000001', 'KSMN000001', '2015-01-20', '2015-01-20', 270000, 'L'),
('TRNSJ0000000002', 'KSMN000002', '2015-01-20', '2015-01-20', 150000, 'L'),
('TRNSJ0000000003', 'KSMN000002', '2015-01-20', '2015-01-20', 6680000, 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produsen`
--

CREATE TABLE IF NOT EXISTS `produsen` (
  `KodeProdusen` varchar(10) NOT NULL,
  `NamaProdusen` varchar(50) NOT NULL,
  `AlamatProdusen` varchar(80) NOT NULL,
  `TelpProdusen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produsen`
--

INSERT INTO `produsen` (`KodeProdusen`, `NamaProdusen`, `AlamatProdusen`, `TelpProdusen`) VALUES
('PRDN000001', 'PT Elektro Jaya', 'Jl Puri Mojokerto', '085791019956');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `NamaPengguna` varchar(50) NOT NULL,
  `Sandi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`NamaPengguna`, `Sandi`) VALUES
('kelompok3', '8adf48e68968dd1aeb9cf7a93f15cdc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `barangdibeli`
--
ALTER TABLE `barangdibeli`
 ADD PRIMARY KEY (`IdBarangDibeli`), ADD KEY `KodeBarang` (`KodeBarang`);

--
-- Indexes for table `barangdijual`
--
ALTER TABLE `barangdijual`
 ADD PRIMARY KEY (`IdBarangDijual`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
 ADD PRIMARY KEY (`KodeKonsumen`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`NoPembelian`), ADD KEY `KodeProdusen` (`KodeProdusen`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`NoPenjualan`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
 ADD PRIMARY KEY (`KodeProdusen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`NamaPengguna`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
