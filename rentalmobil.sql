-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2022 pada 17.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `idkendaraan` int(10) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tahun` int(10) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`idkendaraan`, `no_plat`, `merek`, `jenis`, `tahun`, `harga`) VALUES
(1, 'B 1192 DBS', 'Honda Jazz', 'metic', 2015, 500000),
(2, 'B 2423 BN', 'Brio', 'manual', 2019, 700000),
(12, 'B 1235 NMA', 'Ferari', 'manual', 2011, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(10) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `notelp` int(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jaminan` varchar(255) NOT NULL,
  `nojaminan` int(50) NOT NULL,
  `kendaraan` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `lamasewa` int(50) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `statuskendaraan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(10) NOT NULL,
  `atasnama` varchar(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `statusbayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'miftah', 'miftah@gmail.com', 'miftahus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`idkendaraan`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `idkendaraan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
