-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2022 pada 05.59
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siamib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345'),
(2, 'fadli', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_inventori`
--

CREATE TABLE `tabel_inventori` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_inventori`
--

INSERT INTO `tabel_inventori` (`id_barang`, `kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok_barang`) VALUES
(1, 'VKUgkT5irB', 'Laptop HP EliteBook G2 Core I7', 7000000, 9000000, 10),
(2, 'VCP03', 'Komputer MSI MEG-Aegis-Ti5-11th ', 100000000, 150000000, 10),
(3, 'CFw9o', 'Mouse Logitech MX Master 3s', 1000000, 1500000, 20),
(4, 'teT9O', 'Laptop HP EliteBook G2 Core I5', 3000000, 5000000, 10),
(5, 'oY0VR', 'Laptop Asus ASUS ZENBOOK PRO DUO UX481FL', 18500000, 20000000, 10),
(6, '7DclI', 'VGA MSI Geforce RTX 3090 VENTUS', 28000000, 30000000, 10),
(7, 'XIPPZ', 'PROCESSOR INTEL CORE I7 12700K', 6570000, 8570000, 10),
(8, 'gTugq', 'PROCESSOR INTEL CORE I9 12900KF', 8200000, 10200000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jual`
--

CREATE TABLE `tabel_jual` (
  `id_jual` int(11) NOT NULL,
  `tanggal_jual` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_jual` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `kode_barang` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL,
  `total_laba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_jual`
--

INSERT INTO `tabel_jual` (`id_jual`, `tanggal_jual`, `kode_jual`, `kode_barang`, `harga_barang`, `jumlah_barang`, `total_jual`, `total_laba`) VALUES
(1, '2022-06-30 20:52:55', 'FvFBM', 'VCP03', 150000000, 1, 150000000, 50000000),
(2, '2022-06-30 20:55:49', 'B5zsx', 'oY0VR', 20000000, 1, 20000000, 1500000),
(3, '2022-07-01 02:29:49', 'xbmQ8', '7DclI', 30000000, 1, 30000000, 2000000),
(4, '2022-07-01 03:36:55', 'I50Ce', 'gTugq', 10200000, 12, 122400000, 24000000),
(5, '2022-07-01 03:38:10', 's5VDo', 'gTugq', 10200000, 1, 10200000, 2000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_inventori`
--
ALTER TABLE `tabel_inventori`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tabel_jual`
--
ALTER TABLE `tabel_jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_inventori`
--
ALTER TABLE `tabel_inventori`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_jual`
--
ALTER TABLE `tabel_jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
