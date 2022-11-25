-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2022 pada 15.53
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(15, 77, '2022-11-23 09:39:32', 'Pras', 1),
(17, 78, '2022-11-23 09:46:40', 'Jeni', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'akunserba@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(39, 75, '2022-11-23 09:31:40', 'achmad', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
(42, 'Kursi Barber Belmont Arda', 'Peralatan', 2),
(43, 'Kaca Barber MSB-2 ', 'Kaca Cermin', 2),
(44, 'Kaca Cermin Genggam Bulat', 'Kaca Cermin', 2),
(45, 'Sisir Panjang', 'Paket Mesin Cukur Wahl Sp', 2),
(46, 'Mesin Cukur Rambut Wahl S', 'Paket Mesin Cukur Wahl Sp', 2),
(47, 'Kuas Pembersih Mata Pisau', 'Paket Mesin Cukur Wahl Sp', 2),
(48, 'Mesin Cukur Tattoo Rambut', 'Mesin Cukur Rambut', 2),
(49, 'Gunting Potong Excellent ', 'Gunting Rambut', 1),
(50, 'Gunting Sasak VnG 6 inch', 'Gunting Rambut', 2),
(51, 'Wasbak Keramik Bulat Hita', 'Peralatan Keramas', 1),
(52, 'Pisau Cukur Lipat Gold Do', 'Pisau Cukur Lipat', 2),
(53, 'Rainbow Hair Dryer', 'Hair Dryer ', 2),
(54, 'Towel Warmer KD-20S', 'Handuk', 1),
(55, 'Asahan Kulit (Genuine Lea', 'Asahan Kulit', 2),
(56, 'Kap Lampu Gantung Silver', 'Kap Lampu Gantung', 2),
(57, 'Shaving Cream Gillette 19', 'Shaving Cream', 2),
(58, 'Appron Stylist Kain Tebal', 'Appron Hitam', 2),
(59, 'Handuk Wajah Tebal Shapel', 'Handuk Wajah', 1),
(60, 'Handuk Leher Mutia (isi 4', 'Handuk Leher', 1),
(61, 'Kuas Wajah Omega Besar (6', 'Kuas Wajah ', 1),
(62, 'Kuas Wajah Isi Bedak Keci', 'Kuas Wajah ', 2),
(63, 'Botol Semprotan Schwarzko', 'Botol Semprotan', 2),
(64, 'TP-Link Wireless Router T', 'TP-Link Wireless Router', 1),
(65, 'Sikat Rambut Elov', 'Sikat Rambut', 2),
(66, 'Meja Tamu Jati Modern Min', 'Meja Tamu Jati', 1),
(67, 'Sofa Santai Minimalis Mod', 'Sofa Santai Minimalis', 1),
(68, 'Acer Aspire 4750-2312G50M', 'Laptop', 1),
(69, 'LG 321 LED TV 32LF520A - ', 'TV LED', 1),
(70, 'Sound System Simbadda Spe', 'Sound System', 1),
(71, 'Modena Showcase Cooler Fi', 'Cooler', 1),
(72, 'Vacuum Cleaner Rambut Por', 'Vacuum Cleaner Rambut', 1),
(73, 'Sepatu Ukuran Rambut USA', 'Sepatu Ukuran Rambut ', 2),
(74, 'Boost Powder 20g', 'Hair Powder (Perlengkapan', 25),
(75, 'Texture Spray 60ml', 'Spray (Perlengkapan)', 25),
(76, 'Texture Spray 250ml', 'Spray (Perlengkapan)', 10),
(77, 'Deluxe Pomade 100gr', 'Pomade (Perlengkapan)', 14),
(78, 'Tea Tree Scalp Purrifying', 'Purrifying Shampoo (Perle', 10),
(79, 'Tea Tree Scalp Invigorati', 'Conditioner ', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
