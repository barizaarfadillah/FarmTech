-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2023 pada 19.17
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
-- Database: `farmtech`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulasi`
--

CREATE TABLE `formulasi` (
  `id` int(11) NOT NULL,
  `rentang_berat` varchar(20) NOT NULL,
  `nama_pakan` varchar(50) NOT NULL,
  `berat_pakan` int(11) NOT NULL,
  `jangka_waktu` varchar(25) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan_ternak`
--

CREATE TABLE `hewan_ternak` (
  `id_ternak` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tanggal_pendataan` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto_profile` varchar(100) NOT NULL,
  `pemilik_id_pemilik` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_peternakan` varchar(100) NOT NULL,
  `alamat_peternakan` varchar(100) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` datetime NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recording_penjualan`
--

CREATE TABLE `recording_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recording_produksi`
--

CREATE TABLE `recording_produksi` (
  `id_produksi` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `tanggal_produksi` datetime NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `formulasi`
--
ALTER TABLE `formulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulasi_karyawan_FK` (`karyawan_id_karyawan`);

--
-- Indeks untuk tabel `hewan_ternak`
--
ALTER TABLE `hewan_ternak`
  ADD PRIMARY KEY (`id_ternak`),
  ADD KEY `hewan_ternak_karyawan_FK` (`karyawan_id_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD KEY `karyawan_pemilik_FK` (`pemilik_id_pemilik`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `penjadwalan_karyawan_FK` (`karyawan_id_karyawan`);

--
-- Indeks untuk tabel `recording_penjualan`
--
ALTER TABLE `recording_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `recording_penjualan_karyawan_FK` (`karyawan_id_karyawan`);

--
-- Indeks untuk tabel `recording_produksi`
--
ALTER TABLE `recording_produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `recording_produksi_karyawan_FK` (`karyawan_id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `formulasi`
--
ALTER TABLE `formulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hewan_ternak`
--
ALTER TABLE `hewan_ternak`
  MODIFY `id_ternak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `recording_penjualan`
--
ALTER TABLE `recording_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `recording_produksi`
--
ALTER TABLE `recording_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `formulasi`
--
ALTER TABLE `formulasi`
  ADD CONSTRAINT `formulasi_karyawan_FK` FOREIGN KEY (`karyawan_id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `hewan_ternak`
--
ALTER TABLE `hewan_ternak`
  ADD CONSTRAINT `hewan_ternak_karyawan_FK` FOREIGN KEY (`karyawan_id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_pemilik_FK` FOREIGN KEY (`pemilik_id_pemilik`) REFERENCES `pemilik` (`id_pemilik`);

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_karyawan_FK` FOREIGN KEY (`karyawan_id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `recording_penjualan`
--
ALTER TABLE `recording_penjualan`
  ADD CONSTRAINT `recording_penjualan_karyawan_FK` FOREIGN KEY (`karyawan_id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `recording_produksi`
--
ALTER TABLE `recording_produksi`
  ADD CONSTRAINT `recording_produksi_karyawan_FK` FOREIGN KEY (`karyawan_id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
