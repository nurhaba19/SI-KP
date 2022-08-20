-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2022 pada 10.13
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prakerin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `status` enum('hadir','sakit','ijin','alfa','pending') DEFAULT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `catatan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `id`) VALUES
('admin', '$2y$10$gKOq3g/rWca/C9Mwsb1J8eq2nNDpz2kwCFyakH47Co6vO3.Swk1H2', 'Ardhika Restu Yoviyanto', 1),
('admin2', '$2y$10$nQDZtAtPE3aBAJhMkOQB9OdO7gNcY/0O0wGtJVRYq.KFRV/dkZeta', 'Reza Bagaskara', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_kategoriagenda` int(11) DEFAULT NULL,
  `judul` varchar(225) DEFAULT NULL,
  `slug` varchar(226) DEFAULT NULL,
  `isi` mediumtext DEFAULT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `file` varchar(225) DEFAULT NULL,
  `dilihat` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_penilaian`
--

CREATE TABLE `aspek_penilaian` (
  `id_aspek` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `nama_aspek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`judul`, `file`, `id`) VALUES
('Manfaat Kegiatan Prakerin Bagi Siswa SMK', 'undraw_co-working_825n.png', 1),
('Tips Prakerin Agar Sukses dan dapat hasil memuaskan', 'undraw_digital_nomad_9kgl.png', 2),
('Prakerin Itu Asyik Kok', 'undraw_QA_engineers_dg5p.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `isi` mediumtext DEFAULT NULL,
  `lampiran` varchar(225) DEFAULT NULL,
  `id_pembimbing` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `pengirim` enum('admin','guru') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_pembimbing`
--

CREATE TABLE `chat_pembimbing` (
  `id_chat_pembimbing` int(11) NOT NULL,
  `isi` mediumtext DEFAULT NULL,
  `lampiran` varchar(225) DEFAULT NULL,
  `id_pengirim` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri`
--

CREATE TABLE `industri` (
  `id_industri` int(11) NOT NULL,
  `nama_industri` varchar(225) DEFAULT NULL,
  `alamat_industri` varchar(250) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `kuota` int(5) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `bidang_kerja` varchar(200) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `syarat` mediumtext DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `industri`
--

INSERT INTO `industri` (`id_industri`, `nama_industri`, `alamat_industri`, `deskripsi`, `kuota`, `foto`, `bidang_kerja`, `telp`, `email`, `syarat`, `slug`) VALUES
(21, 'se ', 's', '<p>ajnj</p>', 2, 'unnamed.png', 'Informatika', '082772772', 'harun@gmail.com', '<p>addd</p>', 'se');

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri_join_pembimbing`
--

CREATE TABLE `industri_join_pembimbing` (
  `id` int(11) NOT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_pembimbing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `industri_join_pembimbing`
--

INSERT INTO `industri_join_pembimbing` (`id`, `id_industri`, `id_pembimbing`) VALUES
(76, 21, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `nama_instansi` varchar(100) DEFAULT NULL,
  `notelp` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo_kanan` varchar(200) DEFAULT NULL,
  `logo_kiri` varchar(200) DEFAULT NULL,
  `nama_app` varchar(100) DEFAULT NULL,
  `kepala_sekolah` varchar(100) DEFAULT NULL,
  `badansurat` mediumtext DEFAULT NULL,
  `disqus` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`nama_instansi`, `notelp`, `alamat`, `email`, `logo_kanan`, `logo_kiri`, `nama_app`, `kepala_sekolah`, `badansurat`, `disqus`) VALUES
('Universitas Percobaan', '082313104589', 'Jln Jumapolo Km 01, Karanganyar Jawa Tengah', 'prakerinpercobaan@gmail.com', 'kanan.png', 'kiri_2.jpg', 'Sistem Informasi Prakerin', 'Drs, Mulyadi Suprapto', '<p><span style=\"font-family: \" segoe=\"\" ui\";\"=\"\">Dengan Hormat,</span></p><p>Assalamu’alaikum Wr.Wb.</p><p>Sehubungan dengan pelaksanaan kegiatan rutin SMK Banten Raya Pandeglang Tahun Pelajaran 2019/2020 yang mewajibkan setiap siswa/I untuk melaksanakan kegiatan Praktek Kerja Industri (PRAKERIN) sebagai salah satu syarat untuk menempuh Ujian Akhir di kelas XII.</p><p>Berkenaan dengan hal tersebut, kami bermaksud untuk mengajukan permohonan serta kesediaan instansi/perusahaan yang Bapak/Ibu Pimpin untuk dapat menerima siswa/I kami dalam pelaksanaan kegiatan PKL terhitung mulai tanggal 9 Maret s/d 8 April 2020. Adapun siswa yang mengikuti kegiatan ini terlampir.</p><p>Demikian surat ini disampaikan Atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p><p>Wassalamu’alaikum Wr.Wb.</p>', '<script>\r\n(function() { // DON\'T EDIT BELOW THIS LINE\r\nvar d = document, s = d.createElement(\'script\');\r\ns.src = \'https://ardhikayoviyanto-1.disqus.com/embed.js\';\r\ns.setAttribute(\'data-timestamp\', +new Date());\r\n(d.head || d.body).appendChild(s);\r\n})();\r\n</script>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `file` varchar(225) DEFAULT NULL,
  `judul` varchar(225) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tgl_kumpul` datetime DEFAULT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `status` enum('N','Y','P') DEFAULT NULL,
  `catatan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_harian`
--

CREATE TABLE `jurnal_harian` (
  `id_jurnal_harian` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kegiatan` mediumtext DEFAULT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `status` enum('Y','N','P') DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(9, 'informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_agenda`
--

CREATE TABLE `kategori_agenda` (
  `id_kategoriagenda` int(11) NOT NULL,
  `nama_kategoriagenda` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_agenda`
--

INSERT INTO `kategori_agenda` (`id_kategoriagenda`, `nama_kategoriagenda`) VALUES
(1, 'Pengumuman Prakerin'),
(2, 'Tips Prakerin'),
(3, 'Berita Harian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(200) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_jurusan`) VALUES
(12, 'A', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `id_aspek` int(11) DEFAULT NULL,
  `nilai_angka` double DEFAULT NULL,
  `nilai_huruf` enum('Baik Sekali','Baik','Cukup','Kurang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nama_pembimbing` varchar(200) DEFAULT NULL,
  `nohp` varchar(200) DEFAULT NULL,
  `type` enum('I','S') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `username`, `password`, `nip`, `nama_pembimbing`, `nohp`, `type`) VALUES
(41, '@tino', '3c21d2940f02e5b646092dc2ea85fed4', '-', 'TINO SUHARTONO', '081217145682', 'I'),
(42, '@riyan', '$2y$10$o8TdF/OBRjWdBeeXmwPExujs7Jc.W5Uh.f9uPeCCXcsE2xksb0r/.', '-', 'RIYAN PRASTOWO', '081217145683', 'S'),
(43, '@pyrwanto', '$2y$10$4Lui4ca9l/yVwwN5mXB3WO57MFNYBxB53t12tg.KDqENLfoqN2bb.', '-', 'PURWANTO ADI PAMUNGKAS', '081217145681', 'S'),
(44, 'joko', '$2y$10$dDab.4OQqkefXOy.Dz7O6eNO7TfHALTQLQwNF08eKblMuYL0XR9Ze', '131445', 'joko', '08998383', 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penempatan`
--

CREATE TABLE `penempatan` (
  `id_penempatan` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `tgl_request` datetime DEFAULT NULL,
  `status` enum('diterima','ditolak','pending') DEFAULT NULL,
  `surat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `alamat`, `password`, `nama_siswa`, `id_kelas`, `username`, `jenis_kelamin`) VALUES
(18, '4354657', 's', '$2y$10$gV06Up4MgqM2yd9/0k6ZVOGFYKyn4uUAP60xWjaqPEwmZQaJqpj5y', 'alam', 12, 'alam', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tolak_penempatan`
--

CREATE TABLE `tolak_penempatan` (
  `id_penolakan` int(11) NOT NULL,
  `id_penempatan` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `alasan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `IdPenempatan` (`id_penempatan`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `IdKategoriAgenda` (`id_kategoriagenda`);

--
-- Indeks untuk tabel `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD PRIMARY KEY (`id_aspek`),
  ADD KEY `Jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `IdPembimbing` (`id_pembimbing`);

--
-- Indeks untuk tabel `chat_pembimbing`
--
ALTER TABLE `chat_pembimbing`
  ADD PRIMARY KEY (`id_chat_pembimbing`),
  ADD KEY `PenerimaChat` (`id_penerima`),
  ADD KEY `PengirimChat` (`id_pengirim`);

--
-- Indeks untuk tabel `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id_industri`);

--
-- Indeks untuk tabel `industri_join_pembimbing`
--
ALTER TABLE `industri_join_pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_pembimbing` (`id_pembimbing`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `_IdPenempatan` (`id_penempatan`);

--
-- Indeks untuk tabel `jurnal_harian`
--
ALTER TABLE `jurnal_harian`
  ADD PRIMARY KEY (`id_jurnal_harian`),
  ADD KEY `HarianJurnal` (`id_penempatan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kategori_agenda`
--
ALTER TABLE `kategori_agenda`
  ADD PRIMARY KEY (`id_kategoriagenda`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `IdJurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `_Id_Penempatan` (`id_penempatan`),
  ADD KEY `_Id_Aspek` (`id_aspek`);

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indeks untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_penempatan`),
  ADD KEY `Id_Siswa` (`id_siswa`),
  ADD KEY `Id_Industri` (`id_industri`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `IdKelas` (`id_kelas`);

--
-- Indeks untuk tabel `tolak_penempatan`
--
ALTER TABLE `tolak_penempatan`
  ADD PRIMARY KEY (`id_penolakan`),
  ADD KEY `PenempatanId` (`id_penempatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `chat_pembimbing`
--
ALTER TABLE `chat_pembimbing`
  MODIFY `id_chat_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `industri`
--
ALTER TABLE `industri`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `industri_join_pembimbing`
--
ALTER TABLE `industri_join_pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jurnal_harian`
--
ALTER TABLE `jurnal_harian`
  MODIFY `id_jurnal_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_agenda`
--
ALTER TABLE `kategori_agenda`
  MODIFY `id_kategoriagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tolak_penempatan`
--
ALTER TABLE `tolak_penempatan`
  MODIFY `id_penolakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `IdPenempatan` FOREIGN KEY (`id_penempatan`) REFERENCES `penempatan` (`id_penempatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `IdKategoriAgenda` FOREIGN KEY (`id_kategoriagenda`) REFERENCES `kategori_agenda` (`id_kategoriagenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD CONSTRAINT `Jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `IdPembimbing` FOREIGN KEY (`id_pembimbing`) REFERENCES `pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat_pembimbing`
--
ALTER TABLE `chat_pembimbing`
  ADD CONSTRAINT `PenerimaChat` FOREIGN KEY (`id_penerima`) REFERENCES `pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PengirimChat` FOREIGN KEY (`id_pengirim`) REFERENCES `pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `industri_join_pembimbing`
--
ALTER TABLE `industri_join_pembimbing`
  ADD CONSTRAINT `industri_join_pembimbing_ibfk_1` FOREIGN KEY (`id_industri`) REFERENCES `industri` (`id_industri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `industri_join_pembimbing_ibfk_2` FOREIGN KEY (`id_pembimbing`) REFERENCES `pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `_IdPenempatan` FOREIGN KEY (`id_penempatan`) REFERENCES `penempatan` (`id_penempatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurnal_harian`
--
ALTER TABLE `jurnal_harian`
  ADD CONSTRAINT `HarianJurnal` FOREIGN KEY (`id_penempatan`) REFERENCES `penempatan` (`id_penempatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `IdJurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `_Id_Aspek` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_penilaian` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_Id_Penempatan` FOREIGN KEY (`id_penempatan`) REFERENCES `penempatan` (`id_penempatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD CONSTRAINT `Id_Industri` FOREIGN KEY (`id_industri`) REFERENCES `industri` (`id_industri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Id_Siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `IdKelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tolak_penempatan`
--
ALTER TABLE `tolak_penempatan`
  ADD CONSTRAINT `PenempatanId` FOREIGN KEY (`id_penempatan`) REFERENCES `penempatan` (`id_penempatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
