-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2021 pada 01.26
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_books12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(20) NOT NULL,
  `user_admin` varchar(30) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jk_admin` enum('pria','wanita') NOT NULL,
  `email_admin` varchar(30) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user_admin`, `password_admin`, `nama_admin`, `jk_admin`, `email_admin`, `no_handphone`, `foto_admin`) VALUES
('adm2020U412r5429', 'anggita008', 'a82ec5eb32d9918f0f805e1c3c5585bf25aca7ae', 'anggita putri maharani', 'wanita', 'anggita@gmail.com', '083773323223', '20201229041939pelanggan7.png'),
('adm2021P901a3003', 'ridwan008', 'afba0fa65ae37f2a8de319492fc6b63ae9d5da09', 'Muhammad Ridwan', 'pria', 'ridwan@gmail.com', '0887237223', '20210103235134WhatsApp_Image_2020-09-20_at_00.04.20-removebg-preview (1).png'),
('adm2021T202m2027', 'Iwan008', 'b189823b189060e1189fbb6a1b5007fa17bca810', 'Muhammad Ridwan', 'pria', 'iwan@gmail.com', '082763526571', '20210227233712admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `npwp` int(20) NOT NULL,
  `bpjs` int(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_ptkp` int(20) NOT NULL,
  `no_handphone` int(15) NOT NULL,
  `foto_karyawan` varchar(30) NOT NULL,
  `id_status` varchar(30) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `npwp`, `bpjs`, `tgl_masuk`, `id_ptkp`, `no_handphone`, `foto_karyawan`, `id_status`, `nama_admin`) VALUES
('krywn20201224113143502', 'Anggita Putri Maharani', 828723923, 23422, '2020-12-01', 2, 2147483647, 'pelanggan7.png', '0', 'Muhammad Iqbal Wasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_npwp`
--

CREATE TABLE `tbl_npwp` (
  `id_npwp` int(10) NOT NULL,
  `status_npwp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_npwp`
--

INSERT INTO `tbl_npwp` (`id_npwp`, `status_npwp`) VALUES
(0, 'tidak ada'),
(1, 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `id_payroll` int(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `gaji_pokok` int(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `hari_kerja` int(20) NOT NULL,
  `total_kerja` int(20) NOT NULL,
  `setahun` int(20) NOT NULL,
  `gaji_setahun` int(20) NOT NULL,
  `alokasi_hari` int(20) NOT NULL,
  `alokasi_thr` int(20) NOT NULL,
  `persenan_thr` int(20) NOT NULL,
  `thr` int(20) NOT NULL,
  `bpjs_jkm` int(20) NOT NULL,
  `bpjs_kes` int(20) NOT NULL,
  `gaji_kotor` int(20) NOT NULL,
  `bpjstk_jht` int(20) NOT NULL,
  `bpjstk_jp` int(20) NOT NULL,
  `biaya_jabatan` int(20) NOT NULL,
  `total_pajak` int(20) NOT NULL,
  `penghasilan_bersih` int(20) NOT NULL,
  `id_ptkp` int(20) NOT NULL,
  `penghasilan_kena_pajak` int(20) NOT NULL,
  `id_npwp` int(20) NOT NULL,
  `pajak1` int(20) NOT NULL,
  `pajak2` int(20) NOT NULL,
  `pajak3` int(20) NOT NULL,
  `pajak4` int(20) NOT NULL,
  `pph21` int(20) NOT NULL,
  `bpjs_keset` int(20) NOT NULL,
  `gaji_bersih` int(20) NOT NULL,
  `id_status` int(20) NOT NULL,
  `jht` int(20) NOT NULL,
  `jp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`id_payroll`, `nama_karyawan`, `gaji_pokok`, `tgl_masuk`, `hari_kerja`, `total_kerja`, `setahun`, `gaji_setahun`, `alokasi_hari`, `alokasi_thr`, `persenan_thr`, `thr`, `bpjs_jkm`, `bpjs_kes`, `gaji_kotor`, `bpjstk_jht`, `bpjstk_jp`, `biaya_jabatan`, `total_pajak`, `penghasilan_bersih`, `id_ptkp`, `penghasilan_kena_pajak`, `id_npwp`, `pajak1`, `pajak2`, `pajak3`, `pajak4`, `pph21`, `bpjs_keset`, `gaji_bersih`, `id_status`, `jht`, `jp`) VALUES
(1, 'Anggita Putri Maharani', 12000000, '2020-01-01', 366, 366, 366, 144000000, 144, 144, 39, 4721311, 777600, 5760000, 155258911, 2880000, 1072764, 6000000, 9952764, 145306147, 1, 91306000, 1, 2500000, 6195900, 0, 0, 8695900, 1440000, 134632647, 0, 5328000, 2145528),
(2, 'Muhammad Ridwan', 35000000, '2020-01-15', 352, 366, 366, 420000000, 130, 130, 36, 12431694, 2268000, 5760000, 440459694, 8400000, 1072764, 6000000, 15472764, 424986930, 6, 361987000, 1, 2500000, 30000000, 27996750, 0, 60496750, 1440000, 361022180, 0, 15540000, 2145528),
(3, 'Winda Antika Putri', 5000000, '2020-01-01', 366, 366, 366, 60000000, 144, 144, 39, 1967213, 324000, 5760000, 68051213, 1200000, 1072764, 6000000, 8272764, 59778449, 5, 1278000, 1, 63900, 0, 0, 0, 63900, 600000, 59030549, 0, 2220000, 1200000),
(4, 'Syifa febrianne', 7500000, '2020-03-03', 304, 306, 366, 75000000, 82, 82, 22, 1680328, 405000, 5760000, 82845328, 1500000, 1072764, 6000000, 8572764, 74272564, 1, 20273000, 1, 1013650, 0, 0, 0, 1013650, 900000, 72193914, 0, 2775000, 1800000),
(5, 'Muhammad Akbar Mahdafiki', 700000, '2020-08-01', 153, 153, 366, 3500000, 0, 0, 0, 0, 18900, 140000, 3658900, 70000, 420000, 2100000, 2590000, 1068900, 3, 0, 0, 0, 0, 0, 0, 0, 84000, 2926000, 0, 129500, 168000),
(6, 'Muhammad Akbar Mahdafiki', 48000000, '2020-04-15', 261, 275, 366, 432000000, 39, 39, 11, 5114754, 2332800, 5760000, 445207554, 8640000, 1072764, 6000000, 15712764, 429494790, 3, 366495000, 0, 3000000, 36000000, 34948500, 0, 73948500, 1440000, 352013490, 0, 15984000, 2145528),
(7, 'Muhammad Irfandi', 5500000, '2020-08-07', 147, 153, 366, 27500000, 0, 0, 0, 0, 148500, 5760000, 33408500, 550000, 1072764, 6000000, 7622764, 25785736, 3, 0, 1, 0, 0, 0, 0, 0, 660000, 25217236, 0, 1017500, 1320000),
(8, 'Juan Kolose', 8000000, '2020-08-02', 152, 153, 366, 40000000, 0, 0, 0, 0, 216000, 5760000, 45976000, 800000, 1072764, 6000000, 7872764, 38103236, 5, 0, 0, 0, 0, 0, 0, 0, 960000, 37167236, 0, 1480000, 1920000),
(9, 'Anton', 9000000, '2020-05-04', 242, 245, 366, 72000000, 0, 0, 0, 0, 388800, 5760000, 78148800, 1440000, 1072764, 6000000, 8512764, 69636036, 3, 6636000, 1, 331800, 0, 0, 0, 331800, 1080000, 68075436, 0, 2664000, 2145528),
(10, 'Firmansyah Andre', 25000000, '2020-11-11', 51, 61, 366, 50000000, 0, 0, 0, 0, 270000, 5760000, 56030000, 1000000, 1072764, 6000000, 8072764, 47957236, 5, 0, 1, 0, 0, 0, 0, 0, 1440000, 46487236, 0, 1850000, 2145528),
(11, 'Muhammad Wasta Iqbal', 4500000, '2020-09-01', 122, 122, 366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(12, 'muhammad ridwan', 35000000, '2020-01-01', 366, 366, 366, 420000000, 144, 144, 39, 13770492, 2268000, 5760000, 441798492, 8400000, 1072764, 6000000, 15472764, 426325728, 6, 363326000, 1, 2500000, 30000000, 28331500, 0, 60831500, 1440000, 362026228, 0, 15540000, 2145528),
(13, 'Danang Aji Pangestu', 2000000, '2020-12-24', 8, 31, 366, 2000000, 0, 0, 0, 0, 10800, 80000, 2090800, 40000, 240000, 1200000, 1480000, 610800, 4, 0, 1, 0, 0, 0, 0, 0, 240000, 1480000, 0, 74000, 480000),
(14, 'Muhammad Akbar Mahdafiki', 5000000, '2020-01-30', 337, 366, 366, 60000000, 115, 115, 31, 1571038, 324000, 5760000, 67655038, 1200000, 1072764, 6000000, 8272764, 59382274, 3, 0, 0, 0, 0, 0, 0, 0, 600000, 58698274, 0, 2220000, 1200000),
(15, 'Muhammad Wasta Iqbal', 80000000, '2020-02-01', 335, 335, 366, 880000000, 113, 113, 31, 24699454, 4752000, 5760000, 915211454, 17600000, 1072764, 6000000, 24672764, 890538690, 1, 836539000, 1, 2500000, 30000000, 62500000, 100961700, 195961700, 1440000, 688624990, 0, 32560000, 2145528),
(16, 'Muhammad Wasta Iqbal', 50000000, '2020-07-09', 176, 184, 366, 300000000, 0, 0, 0, 0, 1620000, 5760000, 307380000, 6000000, 1072764, 6000000, 13072764, 294307236, 3, 231307000, 1, 2500000, 27196050, 0, 0, 29696050, 1440000, 261791186, 0, 11100000, 2145528),
(17, 'Muhammad Irfandi', 5000000, '2020-01-08', 359, 366, 366, 60000000, 137, 137, 37, 1871585, 324000, 5760000, 67955585, 1200000, 1072764, 6000000, 8272764, 59682821, 3, 0, 1, 0, 0, 0, 0, 0, 600000, 58998821, 0, 2220000, 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ptkp`
--

CREATE TABLE `tbl_ptkp` (
  `id_ptkp` int(10) NOT NULL,
  `nama_ptkp` varchar(10) NOT NULL,
  `nilai_ptkp` int(10) NOT NULL,
  `keterangan_ptkp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ptkp`
--

INSERT INTO `tbl_ptkp` (`id_ptkp`, `nama_ptkp`, `nilai_ptkp`, `keterangan_ptkp`) VALUES
(1, 'TK/0', 54000000, 'tidak kawin tanpa tanggungan'),
(2, 'TK/1', 58500000, 'tidak kawin dengan 1 tanggungan'),
(3, 'TK/2', 63000000, 'tidak kawin dengan 2 tanggungan'),
(4, 'TK/3', 67500000, 'tidak kawin dengan 3 tanggungan'),
(5, 'K/0', 58500000, 'kawin tanpa tanggungan'),
(6, 'K/1', 63000000, 'kawin dengan 1 tanggungan'),
(7, 'K/2', 67500000, 'kawin dengan 2 tanggungan'),
(8, 'K/3', 72000000, 'kawin dengan 3 tanggungan'),
(9, 'K/I/0', 112500000, 'kawin dengan penghasilan istri digabung tanpa tanggungan'),
(10, 'K/I/1', 117000000, 'kawin dengan penghasilan istri digabung dengan 1 tanggungan'),
(11, 'K/I/2', 121500000, 'kawin dengan penghasilan istri digabung dengan 2 tanggungan'),
(12, 'K/I/3', 126000000, 'kawin dengan penghasilan istri digabung dengan 3 tanggungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `nama_status`) VALUES
(0, 'aktif'),
(1, 'tidak aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_npwp`
--
ALTER TABLE `tbl_npwp`
  ADD PRIMARY KEY (`id_npwp`);

--
-- Indeks untuk tabel `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`id_payroll`);

--
-- Indeks untuk tabel `tbl_ptkp`
--
ALTER TABLE `tbl_ptkp`
  ADD PRIMARY KEY (`id_ptkp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `id_payroll` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
