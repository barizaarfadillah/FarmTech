-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 09.33
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

--
-- Dumping data untuk tabel `formulasi`
--

INSERT INTO `formulasi` (`id`, `rentang_berat`, `nama_pakan`, `berat_pakan`, `jangka_waktu`, `karyawan_id_karyawan`) VALUES
(1, '10 - 20', 'Rumput', 2, 'Sehari dua kali', 2),
(2, '20 - 30', 'Rumput', 3, 'Sehari dua kali', 2),
(3, '30 - 40', 'Rumput', 4, 'Sehari dua kali', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan_ternak`
--

CREATE TABLE `hewan_ternak` (
  `id_ternak` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tanggal_pendataan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hewan_ternak`
--

INSERT INTO `hewan_ternak` (`id_ternak`, `jenis`, `tanggal_pendataan`, `status`, `karyawan_id_karyawan`) VALUES
(6, 'Kambing Etawa', '2023-04-25', 'sakit', 3),
(7, 'Kambing Etawa', '2023-04-25', 'mati', 3),
(8, 'Kambing Etawa', '2023-04-25', 'mati', 3),
(11, 'Kambing', '2023-04-26', 'sehat', 2),
(12, 'Kambing Etawa', '2023-04-30', 'sehat', 2),
(13, 'Kambing Etawa', '2023-05-02', 'sehat', 2),
(14, 'Kambing Etawa', '2023-05-02', 'sehat', 2),
(15, 'Kambing Etawa', '2023-05-03', 'sehat', 2);

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

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `password`, `alamat`, `no_hp`, `foto_profile`, `pemilik_id_pemilik`, `status`) VALUES
(1, 'Syaifudin', 'syaifudin@gmail.com', '123', ' ', ' ', 'default.svg', 1, 1),
(2, 'Malik', 'malik@gmail.com', '1234', 'Situbondo', '081233445588', 'Malik.jpg', 1, 1),
(3, 'Ali', 'ali@gmail.com', '123', ' ', ' ', 'default.svg', 1, 1),
(4, 'Ibnu', 'ibnu@gmail.com', '123', ' ', ' ', 'default.svg', 1, 1);

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
  `foto_profil` varchar(100) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama`, `email`, `password`, `nama_peternakan`, `alamat_peternakan`, `foto_profil`, `status`) VALUES
(1, 'Bariza Arfadillah Abqariy', 'arfadillah.abqariy@gmail.com', '12345', 'Farmtech', 'Jember', 'Bariza Arfadillah Abqariy.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_jadwal`, `jenis`, `jam`, `tanggal`, `karyawan_id_karyawan`) VALUES
(2, 'Jadwal Pakan', '14:00:00', '2023-04-30', 2),
(4, 'Jadwal Vitamin', '08:00:00', '2023-04-30', 2),
(6, 'Jadwal Perah', '00:00:00', '2023-04-27', 2),
(7, 'Jadwal Perah', '06:00:00', '2023-04-26', 2),
(8, 'Jadwal Perah', '18:00:00', '2023-04-26', 2),
(9, 'Jadwal Pakan', '06:30:00', '2023-04-26', 2),
(10, 'Jadwal Pakan', '18:30:00', '2023-04-26', 2),
(11, 'Jadwal Vitamin', '06:00:00', '2023-04-26', 2),
(12, 'Jadwal Vitamin', '18:00:00', '2023-04-26', 2),
(14, 'Jadwal Pakan', '20:05:00', '2023-04-30', 2),
(15, 'Jadwal Pakan', '21:33:00', '2023-05-01', 2),
(16, 'Jadwal Vitamin', '21:33:00', '2023-05-01', 2),
(18, 'Jadwal Pakan', '07:15:00', '2023-05-24', 2),
(19, 'Jadwal Vitamin', '07:15:00', '2023-05-24', 2),
(20, 'Jadwal Pakan', '10:18:00', '2023-05-24', 2),
(21, 'Jadwal Pakan', '12:19:00', '2023-05-24', 2),
(22, 'Jadwal Perah', '14:22:00', '2023-05-24', 2),
(23, 'Jadwal Vitamin', '14:22:00', '2023-05-24', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `recording_penjualan`
--

CREATE TABLE `recording_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `recording_penjualan`
--

INSERT INTO `recording_penjualan` (`id_penjualan`, `nama_produk`, `tanggal_penjualan`, `jumlah_produk`, `total`, `karyawan_id_karyawan`) VALUES
(9, 'Susu Sapi', '2023-05-01', 10, 50000, 1),
(11, 'Susu Sapi', '2023-05-03', 12, 60000, 1),
(12, 'Susu Sapi', '2023-05-04', 15, 75000, 1),
(13, 'Susu Sapi', '2023-05-05', 7, 35000, 1),
(14, 'Susu Sapi', '2023-05-06', 10, 50000, 1),
(15, 'Susu Sapi', '2023-05-07', 8, 40000, 1),
(16, 'Susu Sapi', '2023-05-08', 12, 60000, 1),
(17, 'Susu Sapi', '2023-05-09', 15, 75000, 1),
(18, 'Susu Sapi', '2023-05-10', 7, 35000, 1),
(19, 'Susu Sapi', '2023-05-11', 10, 50000, 1),
(20, 'Susu Sapi', '2023-05-12', 8, 40000, 1),
(21, 'Susu Sapi', '2023-05-13', 12, 60000, 1),
(22, 'Susu Sapi', '2023-05-14', 15, 75000, 1),
(23, 'Susu Sapi', '2023-05-15', 7, 35000, 1),
(24, 'Susu Sapi', '2023-05-16', 10, 50000, 1),
(25, 'Susu Sapi', '2023-05-17', 8, 40000, 1),
(26, 'Susu Sapi', '2023-05-18', 12, 60000, 1),
(27, 'Susu Sapi', '2023-05-19', 15, 75000, 1),
(28, 'Susu Sapi', '2023-05-20', 7, 35000, 1),
(29, 'Susu Sapi', '2023-05-21', 10, 50000, 1),
(30, 'Susu Sapi', '2023-05-22', 8, 40000, 1),
(31, 'Susu Sapi', '2023-05-23', 12, 60000, 1),
(32, 'Susu Sapi', '2023-05-24', 15, 75000, 1),
(33, 'Susu Sapi', '2023-05-25', 7, 35000, 1),
(34, 'Susu Sapi', '2023-05-26', 10, 50000, 1),
(35, 'Susu Sapi', '2023-05-27', 8, 40000, 1),
(36, 'Susu Sapi', '2023-05-28', 12, 60000, 1),
(37, 'Susu Sapi', '2023-05-29', 15, 75000, 1),
(38, 'Susu Sapi', '2023-05-30', 7, 35000, 1),
(39, 'Susu Sapi', '2023-05-02', 20, 300000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `recording_produksi`
--

CREATE TABLE `recording_produksi` (
  `id_produksi` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `karyawan_id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `recording_produksi`
--

INSERT INTO `recording_produksi` (`id_produksi`, `nama_produk`, `tanggal_produksi`, `jumlah_produksi`, `karyawan_id_karyawan`) VALUES
(4, 'Susu Sapi', '2023-04-29', 100, 1),
(5, 'Susu Sapi', '2023-04-30', 75, 1),
(6, 'Susu Sapi', '2023-05-01', 150, 1),
(7, 'Susu Sapi', '2023-05-02', 50, 1),
(8, 'Susu Sapi', '2023-05-03', 25, 1),
(9, 'Susu Sapi', '2023-05-04', 75, 1),
(10, 'Susu Sapi', '2023-05-05', 100, 1),
(11, 'Susu Sapi', '2023-05-06', 50, 1),
(12, 'Susu Sapi', '2023-05-07', 100, 1),
(13, 'Susu Sapi', '2023-05-08', 75, 1),
(14, 'Susu Sapi', '2023-05-09', 150, 1),
(15, 'Susu Sapi', '2023-05-10', 50, 1),
(16, 'Susu Sapi', '2023-05-11', 25, 1),
(17, 'Susu Sapi', '2023-05-12', 75, 1),
(18, 'Susu Sapi', '2023-05-13', 100, 1),
(19, 'Susu Sapi', '2023-05-14', 50, 1),
(20, 'Susu Sapi', '2023-05-15', 100, 1),
(21, 'Susu Sapi', '2023-05-16', 75, 1),
(22, 'Susu Sapi', '2023-05-17', 150, 1),
(23, 'Susu Sapi', '2023-05-18', 50, 1),
(24, 'Susu Sapi', '2023-05-19', 25, 1),
(25, 'Susu Sapi', '2023-05-20', 75, 1),
(26, 'Susu Sapi', '2023-05-21', 100, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `hewan_ternak`
--
ALTER TABLE `hewan_ternak`
  MODIFY `id_ternak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `recording_penjualan`
--
ALTER TABLE `recording_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `recording_produksi`
--
ALTER TABLE `recording_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
