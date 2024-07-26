-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 08:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5581581_ppdb_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` int(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `hapus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `file_laporan` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `id_siswa`, `tanggal`, `laporan`, `kode`, `file_laporan`, `status`) VALUES
(18, 642, '2024-07-01', 'kegiatan 1', '1720304056', 'siswa_88.png', 1),
(19, 642, '2024-07-01', 'kegiatan 1', '1a123123', 'siswa_891.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` varchar(50) NOT NULL,
  `nama_biaya` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_permohonan`, `nik`, `status`, `tanggal`, `keterangan`) VALUES
(1, '201907070001', 123, 1, '2019-07-07 14:57:31', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(2, '201907070001', 0, 2, '2019-07-07 21:26:33', 'pemberkasan sedang kami proses silahkan untuk menunggu'),
(4, '202004040001', 12, 1, '2020-04-04 17:25:29', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(5, '202004040002', 12, 1, '2020-04-04 17:25:55', 'Permohonan sudah berhasil masuk, mohon untuk menunggu proses pengecekan data');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `status`) VALUES
('PD', 'Pindahan', 1),
('SB', 'Siswa Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `nama_jenjang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `kode`, `nama_jenjang`, `status`) VALUES
(3, 10, 'IPS', 1),
(4, 11, 'IPS', 1),
(6, 12, 'IPS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `status`) VALUES
('BOARDING SCHOOL', 'BOARDING SCHOOL', 20, 1),
('PROGRAM KHUSUS', 'PROGRAM KHUSUS', 96, 1),
('REG', 'REGULER', 140, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `status`) VALUES
(2, 'BERITA', 1),
(3, 'Artikel', 1),
(4, 'Teknologi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `no_kontak`, `status`) VALUES
(1, 'Nasrulloh', '081210654096', 1),
(2, 'Tugiman', '081282656407', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `judul`, `pengumuman`, `tgl`, `jenis`) VALUES
(12, 103, 'Juknis PPDB RA dan Madrasah TP 2023/2024', '<p>Berikut adalah link Juknis PPDB RA dan Madrasah Tahun Pelajaran 2023/2024, <a href=\"https://drive.google.com/file/d/1QsMTbv-ZT9HhWtPDBikqluIct0pJ4TWz/view\" target=\"_blank\">Klik Disini</a></p>', '2023-01-14 19:21:40', 2),
(13, 103, 'Jadwal PPDB (PK dan Boarding School/Asrama)', '<p>Jadwal PPDB MTsN 1 Wonogiri (Kelas Program Khusus dan Reguler) Akan dibuka mulai bulan Maret 2023</p>', '2023-01-14 19:22:47', 2),
(14, 103, 'Jadwal PPDB Kelas REGULER', '<p>Untuk jadwal PPDB Kelas Reguler menunggu informasi lebih lanjut di website <a href=\"https://mtsn1wonogiri.sch.id/\" target=\"_blank\">mtsn1wonogiri.sch.id</a></p>', '2023-01-14 19:35:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `nsm` varchar(30) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `status` text NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `kab` text NOT NULL,
  `kec` text NOT NULL,
  `web` text NOT NULL,
  `kepala` text NOT NULL,
  `nip` text NOT NULL,
  `ppdb` text DEFAULT NULL,
  `kop` varchar(50) NOT NULL,
  `logo_ppdb` varchar(100) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `token` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `tema` text NOT NULL,
  `password` text NOT NULL,
  `login` int(1) NOT NULL,
  `_kop` int(1) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `template` varchar(128) NOT NULL,
  `ttd` varchar(128) NOT NULL,
  `stempel` varchar(128) NOT NULL,
  `tgl_cetak` date NOT NULL,
  `header` text NOT NULL,
  `isi` text NOT NULL,
  `apikey` varchar(9999) DEFAULT NULL,
  `sender` varchar(9999) DEFAULT NULL,
  `server` varchar(9999) DEFAULT NULL,
  `tahun_pelajaran` varchar(9999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_sekolah`, `jenjang`, `nsm`, `npsn`, `status`, `alamat`, `kota`, `provinsi`, `logo`, `favicon`, `email`, `no_telp`, `klikchat`, `livechat`, `nolivechat`, `infobayar`, `syarat`, `kab`, `kec`, `web`, `kepala`, `nip`, `ppdb`, `kop`, `logo_ppdb`, `tgl_pengumuman`, `tgl_tutup`, `token`, `tema`, `password`, `login`, `_kop`, `lembaga`, `template`, `ttd`, `stempel`, `tgl_cetak`, `header`, `isi`, `apikey`, `sender`, `server`, `tahun_pelajaran`) VALUES
(1, 'LPK AIKA UNIVERSITAS MUHAMMADIYAH TANGERANG 2024', 1, '121133120001', '20363813', 'Negeri', 'Jl. Tandon Giriwono Wonogiri', '', 'Jawa Tengah', 'assets/img/logo/logo231.png', NULL, 'mtsn1wonogiri@gmail.com', '0273 321839', '', 'Assalamualaikum', '+628555555555555', '<p>Rincian Pembayaran Daftar Ulang :<br></p><ol><li>Seragam&nbsp; : 200000</li><li>Topi : 20000</li></ol><p>Silahkan Transfer ke BRI : 0098765432</p>', '<p><br></p><ol><li>Surat Keterangan Lulus</li><li>Akta Kelahiran</li><li>Kartu Keluarga</li></ol>', 'Wonogiri', 'Wonogiri', 'mtsn1wonogiri.sch.id', 'Drs. Marimo, M. Pd', '196604141994031004', '1', 'assets/img/kop/kop448.png', 'assets/img/logo/logo_ppdb792.png', '2023-03-01', '2025-03-12', '0', 'tema6-style.css', '$2y$10$XGmY0sw.MU5wN0nPnYVMt.N/4w6sG1L1hTDGSThfuA9fDVzybi7.W', 1, 0, 'MUHAMMADIYAH', 'assets/img/template/template415.png', 'assets/img/ttd/ttd265.png', 'assets/img/template/stempel484.png', '2020-07-14', 'PENGUMUMAN', '<ol><li style=\"text-align: justify; \"><b>Kartu Pelajar </b>ini merupakan kartu identitas resmi untuk siswa di MA&nbsp; Nurul Mujahidah NW Tanjung Selor</li><li style=\"text-align: justify;\">Kartu Pelajar ini berlaku selama Tercatat menjadi siswa/siswi aktif di MA Nurul Mujahidah NW Tanjung Selor</li><li style=\"text-align: justify;\">Status Kartu pelajar dapat di cek melalui laman Website resmi kami atau melalui scan barcode</li></ol>', '', '', '', '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(4) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nama_siswa` varchar(256) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `warga_siswa` varchar(256) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(256) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(256) DEFAULT NULL,
  `cita` varchar(256) DEFAULT NULL,
  `no_hp` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `hobi` varchar(256) DEFAULT NULL,
  `status_tinggal_siswa` varchar(256) DEFAULT NULL,
  `prov` varchar(256) DEFAULT NULL,
  `kab` varchar(256) DEFAULT NULL,
  `kec` varchar(256) DEFAULT NULL,
  `desa` varchar(256) DEFAULT NULL,
  `alamat_siswa` varchar(256) DEFAULT NULL,
  `kordinat` varchar(256) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(256) DEFAULT NULL,
  `jarak` varchar(256) DEFAULT NULL,
  `waktu` varchar(256) DEFAULT NULL,
  `biaya_sekolah` varchar(256) DEFAULT NULL,
  `keb_khusus` varchar(256) DEFAULT NULL,
  `keb_disabilitas` varchar(256) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(256) DEFAULT NULL,
  `no_kks` varchar(256) DEFAULT NULL,
  `no_pkh` varchar(256) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(256) DEFAULT NULL,
  `nama_ayah` varchar(256) DEFAULT NULL,
  `status_ayah` varchar(256) DEFAULT NULL,
  `warga_ayah` varchar(256) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(256) DEFAULT NULL,
  `tgl_lahir_ayah` text DEFAULT NULL,
  `pendidikan_ayah` varchar(256) DEFAULT NULL,
  `pekerjaan_ayah` varchar(256) DEFAULT NULL,
  `penghasilan_ayah` varchar(256) DEFAULT NULL,
  `no_hp_ayah` varchar(256) DEFAULT NULL,
  `domisili_ayah` varchar(256) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(256) DEFAULT NULL,
  `prov_ayah` varchar(256) DEFAULT NULL,
  `kab_ayah` varchar(256) DEFAULT NULL,
  `kec_ayah` varchar(256) DEFAULT NULL,
  `desa_ayah` varchar(256) DEFAULT NULL,
  `alamat_ayah` varchar(256) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(256) DEFAULT NULL,
  `status_ibu` varchar(256) DEFAULT NULL,
  `warga_ibu` varchar(256) DEFAULT NULL,
  `nik_ibu` varchar(256) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(256) DEFAULT NULL,
  `tgl_lahir_ibu` text DEFAULT NULL,
  `pendidikan_ibu` varchar(256) DEFAULT NULL,
  `pekerjaan_ibu` varchar(256) DEFAULT NULL,
  `penghasilan_ibu` varchar(256) DEFAULT NULL,
  `no_hp_ibu` varchar(256) DEFAULT NULL,
  `status_tinggal_ibu` varchar(256) DEFAULT NULL,
  `domisili_ibu` varchar(128) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(256) DEFAULT NULL,
  `prov_ibu` varchar(256) DEFAULT NULL,
  `kab_ibu` varchar(256) DEFAULT NULL,
  `kec_ibu` varchar(256) DEFAULT NULL,
  `desa_ibu` varchar(256) DEFAULT NULL,
  `alamat_ibu` varchar(256) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(256) DEFAULT NULL,
  `nama_wali` varchar(256) DEFAULT NULL,
  `warga_wali` varchar(256) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(256) DEFAULT NULL,
  `tgl_lahir_wali` text DEFAULT NULL,
  `pendidikan_wali` varchar(256) DEFAULT NULL,
  `pekerjaan_wali` varchar(256) DEFAULT NULL,
  `penghasilan_wali` varchar(256) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(256) DEFAULT NULL,
  `prov_wali` varchar(256) DEFAULT NULL,
  `kab_wali` varchar(256) DEFAULT NULL,
  `kec_wali` varchar(256) DEFAULT NULL,
  `desa_wali` varchar(256) DEFAULT NULL,
  `alamat_wali` varchar(256) DEFAULT NULL,
  `kodepos_wali` varchar(256) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `jurusan` varchar(256) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_ktp` text DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_mutasi` text DEFAULT NULL,
  `surat_masuk` text DEFAULT NULL,
  `alasan_mutasi` varchar(100) DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `npsn_sekolah` text DEFAULT NULL,
  `seri_ijazah` text DEFAULT NULL,
  `sekolah_mutasi` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `kelasmutasi` text DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT NULL,
  `tahun_lulus` text DEFAULT NULL,
  `no_ijazahalumni` varchar(128) DEFAULT NULL,
  `golongandarah` text DEFAULT NULL,
  `penyakit` text DEFAULT NULL,
  `bin1` varchar(10) DEFAULT NULL,
  `bin2` varchar(10) DEFAULT NULL,
  `bin3` varchar(10) DEFAULT NULL,
  `bin4` varchar(10) DEFAULT NULL,
  `bin5` varchar(10) DEFAULT NULL,
  `mat1` varchar(10) DEFAULT NULL,
  `mat2` varchar(10) DEFAULT NULL,
  `mat3` varchar(10) DEFAULT NULL,
  `mat4` varchar(10) DEFAULT NULL,
  `mat5` varchar(10) DEFAULT NULL,
  `ipa1` varchar(10) DEFAULT NULL,
  `ipa2` varchar(10) DEFAULT NULL,
  `ipa3` varchar(10) DEFAULT NULL,
  `ipa4` varchar(10) DEFAULT NULL,
  `ipa5` varchar(10) DEFAULT NULL,
  `pai1` varchar(10) DEFAULT NULL,
  `pai2` varchar(10) DEFAULT NULL,
  `pai3` varchar(10) DEFAULT NULL,
  `pai4` varchar(10) DEFAULT NULL,
  `pai5` varchar(10) DEFAULT NULL,
  `jadwal_tes` varchar(100) DEFAULT NULL,
  `sesi_tes` varchar(100) DEFAULT NULL,
  `bta` varchar(10) DEFAULT NULL,
  `skl` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `no_daftar`, `kelas`, `nama_siswa`, `nisn`, `warga_siswa`, `nik`, `tempat_lahir`, `tgl_lahir`, `jk`, `anak_ke`, `saudara`, `agama`, `cita`, `no_hp`, `email`, `hobi`, `status_tinggal_siswa`, `prov`, `kab`, `kec`, `desa`, `alamat_siswa`, `kordinat`, `kodepos_siswa`, `transportasi`, `jarak`, `waktu`, `biaya_sekolah`, `keb_khusus`, `keb_disabilitas`, `tk`, `paud`, `hepatitis`, `polio`, `bcg`, `campak`, `dpt`, `covid`, `no_kip`, `no_kks`, `no_pkh`, `no_kk`, `kepala_keluarga`, `nama_ayah`, `status_ayah`, `warga_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `domisili_ayah`, `status_tmp_tinggal_ayah`, `prov_ayah`, `kab_ayah`, `kec_ayah`, `desa_ayah`, `alamat_ayah`, `kodepos_ayah`, `nama_ibu`, `status_ibu`, `warga_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `status_tinggal_ibu`, `domisili_ibu`, `status_tmp_tinggal_ibu`, `prov_ibu`, `kab_ibu`, `kec_ibu`, `desa_ibu`, `alamat_ibu`, `kodepos_ibu`, `status_wali`, `nama_wali`, `warga_wali`, `nik_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `domisili_wali`, `prov_wali`, `kab_wali`, `kec_wali`, `desa_wali`, `alamat_wali`, `kodepos_wali`, `foto`, `jurusan`, `file_kip`, `file_ktp`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_mutasi`, `surat_masuk`, `alasan_mutasi`, `asal_sekolah`, `npsn_sekolah`, `seri_ijazah`, `sekolah_mutasi`, `level`, `aktif`, `status`, `tgl_siswa`, `online`, `password`, `jenis`, `kelasmutasi`, `konfirmasi`, `tahun_lulus`, `no_ijazahalumni`, `golongandarah`, `penyakit`, `bin1`, `bin2`, `bin3`, `bin4`, `bin5`, `mat1`, `mat2`, `mat3`, `mat4`, `mat5`, `ipa1`, `ipa2`, `ipa3`, `ipa4`, `ipa5`, `pai1`, `pai2`, `pai3`, `pai4`, `pai5`, `jadwal_tes`, `sesi_tes`, `bta`, `skl`) VALUES
(642, NULL, 'PPDB2024001', NULL, 'Adit', '12345699', NULL, NULL, 'Jakarta', '2024-06-11', 'L', NULL, NULL, NULL, NULL, '19260196103311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/upload/berkas421.png', 'BOARDING SCHOOL', NULL, NULL, NULL, NULL, 'assets/upload/berkas/siswa35.png', NULL, NULL, NULL, NULL, 'SMK', NULL, NULL, NULL, NULL, 0, 1, NULL, 0, '12345699', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tampil`
--

CREATE TABLE `tampil` (
  `id` int(1) NOT NULL,
  `nisn` text NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nik` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_kip` text NOT NULL,
  `no_hp` text NOT NULL,
  `kewarganegaraan` text NOT NULL,
  `anak_ke` text NOT NULL,
  `saudara` text NOT NULL,
  `status_tinggal` text NOT NULL,
  `nama_ayah` text NOT NULL,
  `status_ayah` text NOT NULL,
  `nik_ayah` text NOT NULL,
  `pendidikan_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `status_ibu` text NOT NULL,
  `nik_ibu` text NOT NULL,
  `pendidikan_ibu` text NOT NULL,
  `penghasilan_ayah` text NOT NULL,
  `penghasilan_ibu` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tampil`
--

INSERT INTO `tampil` (`id`, `nisn`, `nis`, `nik`, `no_kk`, `no_kip`, `no_hp`, `kewarganegaraan`, `anak_ke`, `saudara`, `status_tinggal`, `nama_ayah`, `status_ayah`, `nik_ayah`, `pendidikan_ayah`, `nama_ibu`, `status_ibu`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `alamat`) VALUES
(1, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) DEFAULT NULL,
  `level` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL,
  `mapel` text DEFAULT NULL,
  `nuptk` text DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmt` year(4) DEFAULT NULL,
  `no_sk` text DEFAULT NULL,
  `jenis` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `akses` varchar(128) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `pendidikan` text DEFAULT NULL,
  `status_tmp_tinggal` text DEFAULT NULL,
  `prov` text DEFAULT NULL,
  `kab` text DEFAULT NULL,
  `kec` text DEFAULT NULL,
  `desa` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kodepos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `username`, `password`, `status`, `foto`, `mapel`, `nuptk`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `tmt`, `no_sk`, `jenis`, `no_hp`, `nik`, `akses`, `kelas`, `pendidikan`, `status_tmp_tinggal`, `prov`, `kab`, `kec`, `desa`, `alamat`, `kodepos`) VALUES
(85, 'admin', '', 'admin', '$2y$10$IVNmVImuKZmpslnN9ErJq.Y1GU/GOQZp3EoafkWXNvnFUf9NjjbYS', 2, 0, '', '', '', '', '0000-00-00', '0000', '', '', '', 0, 'ppdb', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE,
  ADD KEY `nisn_2` (`nisn`) USING BTREE;

--
-- Indexes for table `tampil`
--
ALTER TABLE `tampil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
