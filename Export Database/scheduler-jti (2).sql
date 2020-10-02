-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2020 pada 08.09
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler-jti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL,
  `nip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `nip`) VALUES
(25, 'Hendra Yufit Riskiawan, S.Kom, M.Cs', '19710408 200112 1 003'),
(26, 'Didit Rahmat Hartadi, S.Kom, MT', '19860609 200812 2 004'),
(27, 'Ekky Aulia Rahman', '19860609 200812 2 005'),
(29, 'Bunayya', '19860609 200812 2 006'),
(31, 'Dewi Ratih Tilamsari', '19860609 200812 2 007'),
(32, 'Mokhammad Badar Pamungkas', '19860609 200812 2 008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'A'),
(3, 'B'),
(4, 'C'),
(5, 'D'),
(6, 'E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hari`
--

CREATE TABLE `tb_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hari`
--

INSERT INTO `tb_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(7, 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam`
--

CREATE TABLE `tb_jam` (
  `id_jam` int(11) NOT NULL,
  `nama_jam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jam`
--

INSERT INTO `tb_jam` (`id_jam`, `nama_jam`) VALUES
(1, '07:30-09:30'),
(2, '09:30-11:30'),
(3, '11:30-13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mata_kuliah`
--

CREATE TABLE `tb_mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kode_mata_kuliah` varchar(256) NOT NULL,
  `nama_mata_kuliah` varchar(128) NOT NULL,
  `semester` varchar(128) NOT NULL,
  `jenis_mata_kuliah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mata_kuliah`
--

INSERT INTO `tb_mata_kuliah` (`id_mata_kuliah`, `id_prodi`, `kode_mata_kuliah`, `nama_mata_kuliah`, `semester`, `jenis_mata_kuliah`) VALUES
(1, 1, 'A3118', 'Analisis Data', 'Semester 2', 'Teori'),
(2, 1, 'A3119', 'Sistem Informasi', 'Semester 1', 'Workshop'),
(5, 2, 'A3118', 'Sistem Informasi', 'Semester 2', 'Teori'),
(6, 1, 'A3118', 'Sistem Informasi', 'Semester 6', 'Teori'),
(7, 1, 'A3118', 'Sistem Informasi', 'Semester 6', 'Praktikum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengampu`
--

CREATE TABLE `tb_pengampu` (
  `id_pengampu` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_ golongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Manajemen Informatika'),
(2, 'Teknik Informatika'),
(4, 'Manajemen Informatika Internasional'),
(6, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(128) NOT NULL,
  `kapasitas` varchar(128) NOT NULL,
  `jenis_ruang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`, `kapasitas`, `jenis_ruang`) VALUES
(1, '3.10', '30', 'Kelas Besar'),
(2, '3.11', '20', 'Kelas Kecil'),
(3, 'RPL', '20', 'Workshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nama_semester` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `id_tahun_akademik`, `nama_semester`) VALUES
(1, 1, 'Semester 1'),
(2, 1, 'Semester 2'),
(3, 1, 'Semester 3'),
(4, 1, 'Semester 4'),
(5, 1, 'Semester 5'),
(6, 1, 'Semester 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `nama_tahun_akademik` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun_akademik`) VALUES
(1, '2017-2018'),
(2, '2018-2019'),
(3, '2019-2020'),
(4, '2020-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `image`, `password`, `is_active`, `date_created`) VALUES
(1, 'Ekky Aulia Rahman', 'ekkyrahmanx1@gmail.com', 'ce78a0faad2d71488037b296ca0dcd64.jpeg', '123456', 1, 1600315561),
(9, 'Bunayya Maulana', 'bunayya@gmail.com', '6d8265c9a42d7c8d91f3197cea70c5de.jpeg', '123456', 1, 1601049699),
(10, 'Bunayya Maulana', 'bunayyaa16@gmail.com', 'default.png', 'kasepuhan123', 1, 1601524494);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `tb_jam`
--
ALTER TABLE `tb_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indeks untuk tabel `tb_pengampu`
--
ALTER TABLE `tb_pengampu`
  ADD PRIMARY KEY (`id_pengampu`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jam`
--
ALTER TABLE `tb_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  MODIFY `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
