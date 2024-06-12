-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jun 2024 pada 08.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CoffeKasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `coffe`
--

CREATE TABLE `coffe` (
  `id_coffe` int(11) NOT NULL,
  `nama_coffe` varchar(100) NOT NULL,
  `harga_coffe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coffe`
--

INSERT INTO `coffe` (`id_coffe`, `nama_coffe`, `harga_coffe`) VALUES
(7, 'coffe exelso', '15000'),
(8, 'ice chocolate', '13000'),
(9, 'coffe hitam', '11000'),
(13, 'coffe cream', '11000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `nama_pemesan` varchar(25) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `id_ruangan`, `no_meja`, `nama_pemesan`, `tanggal`) VALUES
(1, 1, 'M1', 'Anas', '2024-05-22'),
(3, 1, 'M3', 'Muttaqien', '2024-05-24'),
(4, 2, 'M4', 'Abi', '2024-05-25'),
(5, 3, 'M5', 'renso', '2024-05-30'),
(6, 1, 'M6', 'tutu', '2024-05-21'),
(13, 2, 'M12', 'Reno', '2024-06-08'),
(14, 2, 'M13', 'wewe', '2024-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Ruang Meeting'),
(2, 'Ruang Indor'),
(3, 'Ruang Outdoor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_coffe` int(11) NOT NULL,
  `pembeli` varchar(25) NOT NULL,
  `harga_coffe` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pajak` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_coffe`, `pembeli`, `harga_coffe`, `jumlah`, `subtotal`, `tanggal`, `status`, `pajak`, `total`) VALUES
(27, 8, 'anas khalif', '13000', '2', '26000', '17-02-2024', 'pelanggan', '0', '26000'),
(28, 8, 'rio', '13000', '2', '26000', '17-02-2024', 'bukanpelanggan', '2000', '28000'),
(29, 9, 'abi', '11000', '2', '22000', '17-02-2024', 'bukanpelanggan', '2000', '24000'),
(30, 13, 'aci', '11000', '1', '11000', '17012004', 'bukanpelanggan', '2000', '13000'),
(31, 8, 'abe', '13000', '2', '26000', '17-02-2024', 'pelanggan', '0', '26000'),
(32, 9, 'rino', '11000', '2', '22000', '17-01-2004', 'pelanggan', '0', '22000'),
(33, 13, 'bito', '11000', '3', '33000', '17-02-2024', 'pelanggan', '0', '33000'),
(34, 9, 'rio', '11000', '2', '22000', '17-02-2024', 'pelanggan', '0', '22000'),
(35, 13, 'any', '11000', '2', '22000', '17-02-2024', 'pelanggan', '0', '22000'),
(36, 7, 'ani', '15000', '2', '30000', '17-02-2024', 'bukanpelanggan', '2000', '32000'),
(37, 7, 'anu', '15000', '3', '45000', '17-01-2004', 'bukanpelanggan', '2000', '47000'),
(40, 9, 'anas khalif', '11000', '2', '22000', '17-02-2024', 'bukanpelanggan', '2000', '24000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `nama`) VALUES
(1, 'anas', 'anas7@gmail.com', '123', 'admin', 'anas'),
(2, 'anaskhalif', 'anaskhalif@gmail.com', '123', 'pegawai', 'anaskhalif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `coffe`
--
ALTER TABLE `coffe`
  ADD PRIMARY KEY (`id_coffe`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_coffe` (`id_coffe`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coffe`
--
ALTER TABLE `coffe`
  MODIFY `id_coffe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD CONSTRAINT `meja_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_coffe`) REFERENCES `coffe` (`id_coffe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
