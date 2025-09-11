-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Okt 2022 pada 03.46
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
-- Database: `cuti_laporan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `kontak`, `username`, `password`, `foto`) VALUES
(1, 'admin saya', '082272242022', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'foto.png'),
(6, 'jaconb', '09281982192', 'vepes', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'foto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `jenis_cuti_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_cuti` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `alasan_cuti` varchar(100) NOT NULL,
  `alamat_cuti` varchar(100) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `supervisor_status` varchar(100) DEFAULT NULL,
  `supervisor_keterangan` varchar(100) DEFAULT NULL,
  `manajer_id` int(11) DEFAULT NULL,
  `manajer_status` varchar(100) DEFAULT NULL,
  `manajer_keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `divisi_id`, `jenis_cuti_id`, `user_id`, `tanggal_cuti`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_cuti`, `alasan_cuti`, `alamat_cuti`, `supervisor_id`, `supervisor_status`, `supervisor_keterangan`, `manajer_id`, `manajer_status`, `manajer_keterangan`) VALUES
(1, 5, 2, 1, '2022-06-02', '2022-06-05', '2022-06-07', 2, 'acara dirumah', 'jalan kenari nomor 5 annur ', 1, 'Terima', 'oke', 1, 'Terima', 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `divisi_id` int(11) NOT NULL,
  `divisi_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`divisi_id`, `divisi_nama`) VALUES
(5, 'Security PEMKOT'),
(6, 'Security GMS'),
(7, 'Security BPKAD'),
(8, 'Security PN'),
(9, 'Security ULP'),
(10, 'MANAJER'),
(11, 'DANRU'),
(12, 'KORLAP'),
(13, 'ANGGOTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_cuti`
--

CREATE TABLE `tbl_jenis_cuti` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(100) NOT NULL,
  `jenis_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jenis_cuti`
--

INSERT INTO `tbl_jenis_cuti` (`jenis_id`, `jenis_nama`, `jenis_jumlah`) VALUES
(2, 'Cuti Tahunan', 14),
(3, 'Cuti Melahirkan ', 96);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `karyawan_divisi` int(11) NOT NULL,
  `karyawan_nip` int(11) NOT NULL,
  `karyawan_nama` varchar(50) NOT NULL,
  `karyawan_jabatan` varchar(100) NOT NULL,
  `karyawan_alamat` varchar(100) NOT NULL,
  `karyawan_kelamin` varchar(20) NOT NULL,
  `karyawan_kontak` varchar(15) NOT NULL,
  `karyawan_username` varchar(50) NOT NULL,
  `karyawan_password` varchar(100) NOT NULL,
  `karyawan_foto` varchar(100) NOT NULL,
  `karyawan_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`karyawan_id`, `karyawan_divisi`, `karyawan_nip`, `karyawan_nama`, `karyawan_jabatan`, `karyawan_alamat`, `karyawan_kelamin`, `karyawan_kontak`, `karyawan_username`, `karyawan_password`, `karyawan_foto`, `karyawan_tanda_tangan`) VALUES
(1, 5, 1920182912, 'karyawan1', 'karyawan', 'Soluta tempora enim ', 'Perempuan', '02182918291', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan_foto.png', '1380751068_signature3.png'),
(2, 5, 38, 'Et ullamco velit eni', 'Nostrud non minima o', 'Harum rem tenetur qu', 'Laki-Laki', '90', 'jomypi', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'karyawan_foto.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manajer`
--

CREATE TABLE `tbl_manajer` (
  `manajer_id` int(11) NOT NULL,
  `manajer_divisi` int(11) NOT NULL,
  `manajer_nip` int(11) NOT NULL,
  `manajer_nama` varchar(50) NOT NULL,
  `manajer_kelamin` varchar(20) NOT NULL,
  `manajer_alamat` varchar(100) NOT NULL,
  `manajer_kontak` varchar(15) NOT NULL,
  `manajer_username` varchar(50) NOT NULL,
  `manajer_password` varchar(100) NOT NULL,
  `manajer_foto` varchar(100) NOT NULL,
  `manajer_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_manajer`
--

INSERT INTO `tbl_manajer` (`manajer_id`, `manajer_divisi`, `manajer_nip`, `manajer_nama`, `manajer_kelamin`, `manajer_alamat`, `manajer_kontak`, `manajer_username`, `manajer_password`, `manajer_foto`, `manajer_tanda_tangan`) VALUES
(1, 5, 1234567890, 'manajer', 'Laki-Laki', 'Culpa quis sequi mag', '6282272216125', 'manajer1', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer_foto.png', '131639120_signature1.png'),
(2, 9, 0, 'Omnis et voluptatem ', 'Perempuan', 'Reiciendis et ipsa ', '38', 'lakotod', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'manajer_foto.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supervisor`
--

CREATE TABLE `tbl_supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_divisi` int(11) NOT NULL,
  `supervisor_nip` int(11) NOT NULL,
  `supervisor_nama` varchar(50) NOT NULL,
  `supervisor_kelamin` varchar(20) NOT NULL,
  `supervisor_kontak` varchar(15) NOT NULL,
  `supervisor_alamat` varchar(100) NOT NULL,
  `supervisor_username` varchar(50) NOT NULL,
  `supervisor_password` varchar(100) NOT NULL,
  `supervisor_foto` varchar(100) NOT NULL,
  `supervisor_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supervisor`
--

INSERT INTO `tbl_supervisor` (`supervisor_id`, `supervisor_divisi`, `supervisor_nip`, `supervisor_nama`, `supervisor_kelamin`, `supervisor_kontak`, `supervisor_alamat`, `supervisor_username`, `supervisor_password`, `supervisor_foto`, `supervisor_tanda_tangan`) VALUES
(1, 5, 821291289, 'supevisor', 'Laki-Laki', '08128192192', 'Cum dolores dolore i', 'supervisor', '09348c20a019be0318387c08df7a783d', 'supervisor_foto.png', '1399678955_signature2.png'),
(2, 8, 15, 'Et et obcaecati ut q', 'Laki-Laki', '67', 'Assumenda qui recusa', 'nymixos', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'supervisor_foto.png', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indeks untuk tabel `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indeks untuk tabel `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `tbl_manajer`
--
ALTER TABLE `tbl_manajer`
  ADD PRIMARY KEY (`manajer_id`),
  ADD UNIQUE KEY `manajer_nip` (`manajer_nip`);

--
-- Indeks untuk tabel `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD PRIMARY KEY (`supervisor_id`),
  ADD UNIQUE KEY `supervisor_nip` (`supervisor_nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_manajer`
--
ALTER TABLE `tbl_manajer`
  MODIFY `manajer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
