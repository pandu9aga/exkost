-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2020 pada 16.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exkost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama_admin` varchar(15) NOT NULL,
  `pass_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `pass_admin`) VALUES
(1, 'aga', 'aga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(15) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `alamat_akun` varchar(70) NOT NULL,
  `email_akun` varchar(50) NOT NULL,
  `rekening_akun` int(30) NOT NULL,
  `pp_akun` varchar(50) NOT NULL,
  `pass_akun` varchar(30) NOT NULL,
  `no_telp_akun` int(20) NOT NULL,
  `saldo_akun` int(15) NOT NULL,
  `catatan_akun` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `alamat_akun`, `email_akun`, `rekening_akun`, `pp_akun`, `pass_akun`, `no_telp_akun`, `saldo_akun`, `catatan_akun`) VALUES
(1, 'chen', 'lungmen', 'chen_istri_aga@gmail.com', 456, '37d45b6d46c333f589ee001b537562d1.png', 'aga', 8133, 370000, 'chen cinta aga selamanya'),
(2, 'aa', 'aa', 'a@gmail.com', 10180, '', 'aaa', 0, 1361000, ''),
(3, 'bro', 'jbr', 'aga@gmail.com', 0, '', 'aga', 0, 0, ''),
(4, 'kanon', 'jp', 'vue@gmail.com', 321, '', 'aga', 888, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_admin`
--

CREATE TABLE `bank_admin` (
  `id_bank_admin` int(3) NOT NULL,
  `nama_bank_admin` varchar(30) NOT NULL,
  `no_rek_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_admin`
--

INSERT INTO `bank_admin` (`id_bank_admin`, `nama_bank_admin`, `no_rek_admin`) VALUES
(1, 'BRI', '3356-2564-9632-9845'),
(2, 'BNI', '1156-2564-9632-9696');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_jenis_barang` int(3) NOT NULL,
  `info_barang` varchar(500) NOT NULL,
  `waktu_lelang` datetime NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `id_akun` int(15) NOT NULL,
  `status_lelang` enum('berlangsung','selesai','kirim','terima') NOT NULL,
  `status_gagal` varchar(5) NOT NULL,
  `status_transfer` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_jenis_barang`, `info_barang`, `waktu_lelang`, `harga_barang`, `id_akun`, `status_lelang`, `status_gagal`, `status_transfer`) VALUES
(6, 'ddd', 1, 'ddss', '2020-04-27 16:51:00', 333, 1, 'selesai', 'gagal', ''),
(7, 'lemare', 2, 'lemari', '2020-06-01 19:50:00', 300000, 1, 'berlangsung', '', ''),
(8, 'skadi', 6, 'ssr', '2020-06-01 18:03:00', 9999, 1, 'berlangsung', '', ''),
(9, 'swxw', 3, 'qsxswx', '2020-06-09 20:07:00', 1, 1, 'berlangsung', '', ''),
(10, 'ededede', 3, 'ssss', '2020-06-24 20:10:00', 2323, 1, 'berlangsung', '', ''),
(11, 'lemarilungmen', 2, 'punya chen', '2020-06-19 17:18:00', 400000, 1, 'berlangsung', '', ''),
(12, 'doko demo doa', 5, 'pintu kemana saja', '2020-05-22 23:35:00', 3000000, 2, 'terima', '', 'terima'),
(13, 'hayyuk', 4, 'aldsd', '2020-05-22 23:55:00', 100000, 2, 'kirim', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba_vue`
--

CREATE TABLE `coba_vue` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coba_vue`
--

INSERT INTO `coba_vue` (`id`, `nama`) VALUES
(1, 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_barang`
--

CREATE TABLE `gambar_barang` (
  `id_gambar_barang` int(30) NOT NULL,
  `nama_gambar_barang` varchar(50) NOT NULL,
  `id_barang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_barang`
--

INSERT INTO `gambar_barang` (`id_gambar_barang`, `nama_gambar_barang`, `id_barang`) VALUES
(2, 'bde9a5353310222aa2ee07d46a07bafa.jpg', 6),
(3, '503726a664180a07b8fc0074e949919b.jpg', 7),
(4, 'bb2537edeb3b81cc3e32ad53e5197e91.jpg', 8),
(5, '3383f379582fa4966a252c0628ec68c3.jpg', 9),
(6, '516f828f714bf6ea96a61efdee35fc7a.jpg', 10),
(7, 'cfd8b4ed79180fdc8b75f944626df8c7.jpg', 11),
(8, '59091a2ca56b4b9f74723616e6d9304a.jpg', 12),
(9, '23d35835e0f1242127f04bf921c44832.jpg', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(3) NOT NULL,
  `nama_jenis_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'kasur'),
(2, 'lemari'),
(3, 'meja'),
(4, 'kursi'),
(5, 'elektronik'),
(6, 'aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id` int(11) NOT NULL,
  `email_pengguna` varchar(50) NOT NULL,
  `code_lupas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(30) NOT NULL,
  `id_akun` int(15) NOT NULL,
  `id_topup` int(20) NOT NULL,
  `status_baca` enum('belum','sudah','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id_notif`, `id_akun`, `id_topup`, `status_baca`) VALUES
(4, 1, 10, 'sudah'),
(5, 1, 11, 'sudah'),
(6, 2, 23, 'sudah'),
(7, 2, 24, 'sudah'),
(8, 1, 16, 'sudah'),
(9, 1, 15, 'sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `now`
--

CREATE TABLE `now` (
  `id_now` int(3) NOT NULL,
  `now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `now`
--

INSERT INTO `now` (`id_now`, `now`) VALUES
(1, '2020-05-31 15:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemenang`
--

CREATE TABLE `pemenang` (
  `id_pemenang` int(11) NOT NULL,
  `id_tawaran` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemenang`
--

INSERT INTO `pemenang` (`id_pemenang`, `id_tawaran`) VALUES
(5, 7),
(6, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tawaran`
--

CREATE TABLE `tawaran` (
  `id_tawaran` int(30) NOT NULL,
  `id_akun` int(15) NOT NULL,
  `id_barang` int(15) NOT NULL,
  `jumlah_tawaran` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tawaran`
--

INSERT INTO `tawaran` (`id_tawaran`, `id_akun`, `id_barang`, `jumlah_tawaran`) VALUES
(3, 2, 11, 18000),
(4, 3, 11, 17000),
(5, 3, 10, 18000),
(6, 2, 10, 3000),
(7, 1, 13, 1000),
(8, 1, 12, 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id_topup` int(20) NOT NULL,
  `id_akun` int(15) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `waktu_topup` datetime NOT NULL,
  `status_topup` enum('belum','menunggu','sukses','gagal') NOT NULL,
  `id_bank_admin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`id_topup`, `id_akun`, `bukti_transfer`, `nama_rekening`, `nominal`, `waktu_topup`, `status_topup`, `id_bank_admin`) VALUES
(1, 1, '', 'a', 20000, '0000-00-00 00:00:00', 'belum', 1),
(2, 1, '', 'a', 20000, '0000-00-00 00:00:00', 'belum', 1),
(3, 1, '', 'gg', 20000, '0000-00-00 00:00:00', 'belum', 1),
(4, 1, '', 'ece', 20000, '0000-00-00 00:00:00', 'belum', 1),
(5, 1, '', 'zzzz', 20000, '0000-00-00 00:00:00', 'belum', 2),
(6, 1, '', 'aga', 500000, '0000-00-00 00:00:00', 'belum', 2),
(7, 1, '', 'ff', 20000, '0000-00-00 00:00:00', 'belum', 1),
(8, 1, '', 'yo', 20000, '0000-00-00 00:00:00', 'belum', 1),
(9, 1, '', 'yo', 20000, '0000-00-00 00:00:00', 'belum', 1),
(10, 1, '8feb646e8a6c9662fb33fc50114e98a3.jpg', 'aga', 20000, '0000-00-00 00:00:00', 'sukses', 1),
(11, 1, '954b005393ef0de91ce2ab2a21ecc6e7.png', '22', 100000, '0000-00-00 00:00:00', 'sukses', 2),
(13, 1, '', 'absjabjsjan', 500000, '0000-00-00 00:00:00', 'belum', 1),
(14, 1, '', '221', 500000, '0000-00-00 00:00:00', 'belum', 1),
(15, 1, 'db5267bf62a5bbcdf29c66c6fc636cce.jpg', '221', 500000, '0000-00-00 00:00:00', 'gagal', 1),
(16, 1, '0fad4202d9b7b1108659e32f6375b1c4.jpg', 'chen lungmen dragon', 20000, '2020-05-06 00:00:00', 'sukses', 1),
(18, 2, '', 'gggg', 500000, '2020-05-08 20:29:28', 'belum', 2),
(19, 2, '', 'gggg', 500000, '2020-05-08 20:32:19', 'belum', 2),
(20, 2, '', 'aga', 50000, '2020-05-08 20:33:00', 'belum', 2),
(21, 2, '', 'aga', 1000000, '2020-05-08 20:37:05', 'belum', 2),
(22, 2, '', 'aga', 1000000, '2020-05-08 20:40:18', 'belum', 1),
(23, 2, '3cc6975144783bb5bd58b0ac3331b737.jpg', 'aga', 1000000, '2020-05-08 20:42:27', 'sukses', 1),
(24, 2, '4d4cb0c4a930a4b9a4ea8ec5b365b4ed.jpg', 'bro', 500000, '2020-05-08 20:55:25', 'sukses', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(15) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `id_barang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transfer`
--

INSERT INTO `transfer` (`id_transfer`, `bukti_transfer`, `id_barang`) VALUES
(1, '90440203a69bb25c504143e534dcfa64.jpg', 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `bank_admin`
--
ALTER TABLE `bank_admin`
  ADD PRIMARY KEY (`id_bank_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_jenis_barang` (`id_jenis_barang`);

--
-- Indeks untuk tabel `coba_vue`
--
ALTER TABLE `coba_vue`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD PRIMARY KEY (`id_gambar_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indeks untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_topup` (`id_topup`);

--
-- Indeks untuk tabel `now`
--
ALTER TABLE `now`
  ADD PRIMARY KEY (`id_now`);

--
-- Indeks untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  ADD PRIMARY KEY (`id_pemenang`),
  ADD KEY `id_tawaran` (`id_tawaran`);

--
-- Indeks untuk tabel `tawaran`
--
ALTER TABLE `tawaran`
  ADD PRIMARY KEY (`id_tawaran`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_bank_admin` (`id_bank_admin`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bank_admin`
--
ALTER TABLE `bank_admin`
  MODIFY `id_bank_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `coba_vue`
--
ALTER TABLE `coba_vue`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  MODIFY `id_gambar_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `now`
--
ALTER TABLE `now`
  MODIFY `id_now` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  MODIFY `id_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tawaran`
--
ALTER TABLE `tawaran`
  MODIFY `id_tawaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `topup`
--
ALTER TABLE `topup`
  MODIFY `id_topup` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`);

--
-- Ketidakleluasaan untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD CONSTRAINT `gambar_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `notif_ibfk_3` FOREIGN KEY (`id_topup`) REFERENCES `topup` (`id_topup`);

--
-- Ketidakleluasaan untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  ADD CONSTRAINT `pemenang_ibfk_1` FOREIGN KEY (`id_tawaran`) REFERENCES `tawaran` (`id_tawaran`);

--
-- Ketidakleluasaan untuk tabel `tawaran`
--
ALTER TABLE `tawaran`
  ADD CONSTRAINT `tawaran_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `tawaran_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `topup_ibfk_2` FOREIGN KEY (`id_bank_admin`) REFERENCES `bank_admin` (`id_bank_admin`);

--
-- Ketidakleluasaan untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
