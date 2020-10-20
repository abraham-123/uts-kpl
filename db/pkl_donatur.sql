-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2020 pada 21.29
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_donatur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_jenis`
--

CREATE TABLE `dta_jenis` (
  `id_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL,
  `total_biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_jenis`
--

INSERT INTO `dta_jenis` (`id_jenis`, `nama_jenis`, `total_biaya`) VALUES
(12345, 'pemasukan', 25200000),
(12346, 'pengeluaran', 16200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_pemasukan`
--

CREATE TABLE `dta_pemasukan` (
  `id_pemasukan` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `saldo_akhir` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_pemasukan`
--

INSERT INTO `dta_pemasukan` (`id_pemasukan`, `id_jenis`, `tanggal`, `nominal`, `keterangan`, `saldo_akhir`) VALUES
(10020, 12345, '2020-05-02', 5000000, 'donasi dari Ibu Mario', 5000000),
(10028, 12345, '2020-05-08', 1000000, 'donasi dari Pak Sugeng', 6000000),
(10029, 12345, '2020-05-15', 500000, 'donasi dari Pak Ayap', 6500000),
(10030, 12345, '2020-05-17', 1000000, 'donasi dari PT Semen Abadi', 6000000),
(10031, 12345, '2020-06-01', 15000000, 'donasi dari Pak Axel', 19500000),
(10032, 12345, '2020-06-02', 500000, 'donasi dari Pak Budi', 20000000),
(10033, 12345, '2020-06-05', 1000000, 'donasi dari CV. Makmur Abadi', 11000000),
(10035, 12345, '2020-06-11', 500000, 'donasi dari Pak Gabriel', 9500000),
(10036, 12345, '2020-06-13', 200000, 'donasi dari Ibu Maria', 8700000),
(10037, 12345, '2020-07-01', 500000, 'donasi dari PT. George Jaya', 9000000);

--
-- Trigger `dta_pemasukan`
--
DELIMITER $$
CREATE TRIGGER `hapus_biaya` AFTER DELETE ON `dta_pemasukan` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya - OLD.nominal
    WHERE id_jenis = OLD.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nambah_biaya` AFTER INSERT ON `dta_pemasukan` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya + NEW.nominal
    WHERE id_jenis = new.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sblm_update_pemasukan` BEFORE UPDATE ON `dta_pemasukan` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya + NEW.nominal
    WHERE id_jenis = new.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ssudah_update_pemasukan` AFTER UPDATE ON `dta_pemasukan` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya - OLD.nominal
    WHERE id_jenis = OLD.id_jenis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_pengeluaran`
--

CREATE TABLE `dta_pengeluaran` (
  `id_pengeluaran` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `saldo_akhir` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_pengeluaran`
--

INSERT INTO `dta_pengeluaran` (`id_pengeluaran`, `id_jenis`, `tanggal`, `nominal`, `keterangan`, `saldo_akhir`) VALUES
(30010, 12346, '2020-05-16', 1500000, 'renovasi ruang guru', 5000000),
(30015, 12346, '2020-05-18', 1500000, 'renovasi lapangan sekolah', 4500000),
(30016, 12346, '2020-06-03', 10000000, 'pembangunan ruang kelas baru', 10000000),
(30017, 12346, '2020-06-10', 2000000, 'pembelian komputer dan printer', 9000000),
(30018, 12346, '2020-06-12', 1000000, 'pembelian buku bacaan', 8500000),
(30019, 12346, '2020-06-30', 200000, 'pembelian jendela baru', 8500000);

--
-- Trigger `dta_pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `hapus_pengeluaran` AFTER DELETE ON `dta_pengeluaran` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya - OLD.nominal
    WHERE id_jenis = OLD.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nambah_pengeluaran` AFTER INSERT ON `dta_pengeluaran` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya + NEW.nominal
    WHERE id_jenis = NEW.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sblm_update_pengeluaran` BEFORE UPDATE ON `dta_pengeluaran` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya + NEW.nominal
    WHERE id_jenis = NEW.id_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ssudah_update_pengeluaran` AFTER UPDATE ON `dta_pengeluaran` FOR EACH ROW BEGIN
	UPDATE dta_jenis SET total_biaya = total_biaya - OLD.nominal
    WHERE id_jenis = OLD.id_jenis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_user`
--

CREATE TABLE `dta_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_user`
--

INSERT INTO `dta_user` (`id_user`, `username`, `password`, `level`) VALUES
(90001, 'admin', 'admin', 'admin'),
(90002, 'superadmin', 'superadmin', 'superadmin'),
(90003, 'abraham', 'abraham', 'superadmin'),
(90005, 'ayap', 'ayap', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dta_jenis`
--
ALTER TABLE `dta_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `dta_pemasukan`
--
ALTER TABLE `dta_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `dta_pengeluaran`
--
ALTER TABLE `dta_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `dta_user`
--
ALTER TABLE `dta_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dta_pemasukan`
--
ALTER TABLE `dta_pemasukan`
  MODIFY `id_pemasukan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10038;

--
-- AUTO_INCREMENT untuk tabel `dta_pengeluaran`
--
ALTER TABLE `dta_pengeluaran`
  MODIFY `id_pengeluaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30020;

--
-- AUTO_INCREMENT untuk tabel `dta_user`
--
ALTER TABLE `dta_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
