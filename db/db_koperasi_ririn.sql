-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 07:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi_ririn`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_koperasi` int(11) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `simpanan_pokok` int(11) NOT NULL,
  `simpanan_wajib` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_koperasi`, `no_anggota`, `nik`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `tanggal_masuk`, `simpanan_pokok`, `simpanan_wajib`, `status`) VALUES
(1, 1, 'A001', '0', 'Sutarna,. SIP', 'Laki-laki', 'sutarna@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(2, 1, 'A002', '0', 'Herlan', 'Laki-laki', 'herlan@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(3, 1, 'A003', '0', 'Iwan Nugraha, SE', 'Laki-laki', 'suwirto@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(4, 1, 'A004', '0', 'Drs. Suwirto, M.Si', 'Laki-laki', 'suwirto@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(5, 1, 'A005', '0', 'H. Endang Siswandar, SH. M. Si', 'Laki-laki', 'endang@gmail.com', 'Subang', '2019-02-01', 100000, 0, 1),
(7, 1, 'A006', '0', 'Lina Ruktina', 'Laki-laki', 'ruktina@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(8, 1, 'A007', '0', 'Aning Suningsih', 'Perempuan', 'aning@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(9, 1, 'A008', '0', 'Ningsih Pujiastuti', 'Perempuan', 'ningsih@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(10, 1, 'A009', '0', 'Sapta P, Utami, SH', 'Laki-laki', 'sapta@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(11, 1, 'A010', '0', 'Atun Budiono, SE', 'Laki-laki', 'atun@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(12, 1, 'A011', '0', 'Indera Buana, SE', 'Laki-laki', 'ibun@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(13, 1, 'A012', '0', 'Dra. Rini Nirmala', 'Perempuan', 'rini@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(14, 1, 'A013', '0', 'Drs. Asep Suyanto', 'Laki-laki', 'asep@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(15, 1, 'A014', '0', 'Wanta', 'Laki-laki', 'wanta@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(16, 1, 'A015', '0', 'Nucke Nurulita', 'Perempuan', 'nucke@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(17, 1, 'A016', '0', 'Sri Siswati R', 'Perempuan', 'sri@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(18, 1, 'A017', '0', 'Saeful Bahri, SAN', 'Laki-laki', 'saeful@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(19, 1, 'A018', '0', 'Saefuloh, SAN', 'Laki-laki', 'saefuloh@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(20, 1, 'A019', '0', 'Ahmad Siswanda', 'Laki-laki', 'ahmad@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(21, 1, 'A020', '0', 'P. Nandang Sungkawa, SE', 'Laki-laki', 'nandang@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(22, 1, 'A021', '0', 'Bethy Apriliana, SE.M.M', 'Perempuan', 'bethy@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(23, 1, 'A022', '0', 'Hendrawati, A.Md', 'Perempuan', 'hendrawati@gamil.com', 'Subang', '2019-01-01', 100000, 0, 1),
(24, 1, 'A023', '0', 'Murwaningsih', 'Perempuan', 'murwaningsih@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(25, 1, 'A024', '0', 'Popon Radiyah, SE', 'Perempuan', 'popon@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(26, 1, 'A025', '0', 'Budi Budianto', 'Laki-laki', 'budi@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(27, 1, 'A026', '0', 'Dadang Sudirman, SE', 'Laki-laki', 'dadang@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(28, 1, 'A027', '0', 'Carli Sumantri, Sh', 'Laki-laki', 'carli@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(29, 1, 'A028', '0', 'H. Susan Moh. Syafrudin, S.Sos', 'Laki-laki', 'susan@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(30, 1, 'A029', '0', 'Irma Aprianti, SE', 'Perempuan', 'irma@gmail.com', 'Subang', '2019-01-01', 100000, 0, 0),
(31, 1, 'A030', '0', 'Yuyun Yunani, SE', 'Perempuan', 'yuyun@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(32, 1, 'A031', '0', 'Lia Widayani, SE.M.Si', 'Perempuan', 'lia@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(33, 1, 'A032', '0', 'Lela Herawati, S.Pt', 'Perempuan', 'lela@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(34, 1, 'A033', '0', 'Saepudin,S.Sos.,M.AP', 'Laki-laki', 'saepudin@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(35, 1, 'A034', '0', 'Drs.H.Rahmat Fatharrahman, M.Si', 'Laki-laki', 'rahmat@gamil.com', 'Subang', '2019-01-01', 100000, 0, 1),
(36, 1, 'A035', '0', 'Enita Selvia, S.Psi', 'Perempuan', 'enita@gmail.com', 'Subang', '2019-01-01', 100000, 0, 1),
(37, 1, 'A036', '0', 'Mayang Andhari P, SE. M.Si', 'Perempuan', 'mayang@gmail.com', 'Subang', '2020-01-01', 100000, 0, 1),
(38, 1, 'A037', '0', 'Achmad Dadang Firdaus, SE', 'Laki-laki', 'ahmaddadang@gmail.com', 'Subang', '2020-01-01', 100000, 0, 1),
(39, 1, 'A038', '0', 'Dedeh Agustini E, S.Sos.MM', 'Perempuan', 'dedeh@gmail.com', 'Subang', '2020-01-01', 100000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `koperasi`
--

CREATE TABLE `koperasi` (
  `id_koperasi` int(11) NOT NULL,
  `nama_koperasi` varchar(200) NOT NULL,
  `nomor_badan_hukum` varchar(200) NOT NULL,
  `tanggal_badan_hukum` date NOT NULL,
  `jenis_koperasi` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `ketua` varchar(200) NOT NULL,
  `sekretaris` varchar(200) NOT NULL,
  `bendahara` varchar(200) NOT NULL,
  `manajer_kasir` varchar(200) NOT NULL,
  `no_hp_ketua` varchar(200) NOT NULL,
  `no_hp_sekretaris` varchar(200) NOT NULL,
  `no_hp_bendahara` varchar(200) NOT NULL,
  `no_hp_manajer_kasir` varchar(200) NOT NULL,
  `jml_anggota_l` int(11) NOT NULL,
  `jml_anggota_p` int(11) NOT NULL,
  `jml_karyawan_l` int(11) NOT NULL,
  `jml_karyawan_p` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koperasi`
--

INSERT INTO `koperasi` (`id_koperasi`, `nama_koperasi`, `nomor_badan_hukum`, `tanggal_badan_hukum`, `jenis_koperasi`, `alamat`, `ketua`, `sekretaris`, `bendahara`, `manajer_kasir`, `no_hp_ketua`, `no_hp_sekretaris`, `no_hp_bendahara`, `no_hp_manajer_kasir`, `jml_anggota_l`, `jml_anggota_p`, `jml_karyawan_l`, `jml_karyawan_p`, `email`, `username`, `password`) VALUES
(1, 'KOPERASI PEGAWAI REPUBLIK INDONESIA ANUGRAH', '4319/BH/PAD/KDK.10.II/I/2002', '2002-01-15', 'Simpan Pinjam', 'JL. KS TUBUN NO.40 KECAMATAN SUBANG', 'DRS. SUWITRO., M.Si', 'SRI SISWATI., SE', 'SUTARNA.,SIP', '-', '0', '0', '0', '0', 26, 13, 3, 3, '0', 'anugrah', ''),
(2, 'KOPERASI LED LELES', '518/BH/643/DISKOP DAN UMKM', '2009-07-01', 'Simpan Pinjam', 'DESA LELES, KECAMATAN SAGALAHERANG', '-', '-', '-', '-', '0', '0', '0', '0', 200, 138, 3, 3, '0', 'ledleles', ''),
(3, 'KOPERASI UNIT DESA MINA KARYA BHAKTI', '4425/BH/PADKWK.10/IV/1996', '1996-04-30', 'Simpan Pinjam', 'DESA MUARA, KECAMATAN BLANAKAN', '-', '-', '-', '-', '0', '0', '0', '0', 200, 150, 3, 3, '0', 'minakarya', ''),
(4, 'KOPERASI KARYAWAN RUMAH SAKIT 2 SUBANG', '11289/BH/PAD/KWK.10/VI/1998', '1998-06-01', 'Simpan Pinjam', 'JL. OTTO ISKANDARDINATA NO.1 KECAMATAN SUBANG', 'ENTIN RUMIARTINI., S.Sos', 'LILI SOLIHAH., S.PD.,S.Si.,Msi', 'SARBINI.,S.Sos', '-', '0', '0', '0', '0', 159, 148, 3, 3, '0', 'kopkarrs2', ''),
(5, 'KOPERASI LED MAWAR', '518/BH/596/DISKOP DAN UMKM', '2010-09-15', 'Simpan Pinjam', 'KARANGSARI KECAMATAN BINONG', '-', '-', '-', '-', '0', '0', '0', '0', 313, 300, 3, 3, '0', 'ledmawar', ''),
(6, 'KOPERASI LED CURUG AGUNG', '518/BH/664/DISKOP DAN UMKM', '2010-03-25', 'Simpan Pinjam', 'CURUG AGUNG KECAMTAN SAGALAHERANG', '-', '-', '-', '-', '0', '0', '0', '0', 290, 714, 3, 3, '0', 'ledcurugagung', ''),
(7, 'KOPERASI LED MITRA SEJAHTERA', '518/BH/713/DISKOP DAN UMKM', '2010-09-15', 'Simpan Pinjam', 'CICADAS KECAMATAN SAGALAHERANG', '-', '-', '-', '-', '0', '0', '0', '0', 8, 192, 3, 3, '0', 'ledmitra', ''),
(8, 'KOPERASI PEGAWAI REPUBLIK INDONESIA KASOMALANG', '4655/BH/PAD/KWK.10/XI/1997', '1997-11-01', 'Simpan Pinjam', 'KASOMALANG WETAN KECAMATAN KASOMALANG', '-', '-', '-', '-', '0', '0', '0', '0', 150, 150, 3, 3, '0', 'kprikasomalang', ''),
(9, 'KOPERASI WERDATAMA PUSAKA ', '8435/BH/PAD/KWK.10/XII/1997', '1997-12-29', 'Simpan Pinjam', 'KAMARUNG KECAMATAN PAGADEN', '-', '-', '-', '-', '0', '0', '0', '0', 32, 66, 3, 3, '0', 'werdatama', ''),
(10, 'KOPERASI MANDIRI AMANAH SEJAHTERA ', '348/PAD/M.KUKM.2/V/2017', '2017-01-20', 'Konsumen', 'DARMAGA KECAMATAN CISALAK', '-', '-', '-', '-', '0', '0', '0', '0', 45, 62, 3, 3, '0', 'mandiri', '');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, '2019-01-01', '2019-12-31', 'Buka'),
(2, '2020-01-01', '2020-12-31', 'Buka');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_koperasi`
--

CREATE TABLE `penilaian_koperasi` (
  `id_penilaian_koperasi` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `id_koperasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggaraan_rat` int(11) NOT NULL,
  `keanggotaan` int(11) NOT NULL,
  `realisasi_anggaran` int(11) NOT NULL,
  `kinerja_pengurus` int(11) NOT NULL,
  `sarana_prasarana` int(11) NOT NULL,
  `produktivitas` int(11) NOT NULL,
  `kerjasama_usaha` int(11) NOT NULL,
  `transaksi_usaha` int(11) NOT NULL,
  `nilai` float DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_koperasi`
--

INSERT INTO `penilaian_koperasi` (`id_penilaian_koperasi`, `id_penilaian`, `id_koperasi`, `tanggal`, `penyelenggaraan_rat`, `keanggotaan`, `realisasi_anggaran`, `kinerja_pengurus`, `sarana_prasarana`, `produktivitas`, `kerjasama_usaha`, `transaksi_usaha`, `nilai`, `peringkat`) VALUES
(1, 2, 1, '2020-07-10', 5, 4, 3, 3, 4, 3, 3, 3, 0.229664, 1),
(3, 1, 1, '2019-12-31', 5, 5, 5, 5, 5, 3, 5, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rat`
--

CREATE TABLE `rat` (
  `id_rat` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `id_koperasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `simpanan_pokok` bigint(20) NOT NULL,
  `simpanan_wajib` bigint(20) NOT NULL,
  `cadangan` bigint(20) NOT NULL,
  `simpanan_lainnya` bigint(20) NOT NULL,
  `Cadangan_resiko` bigint(20) NOT NULL,
  `Modal_penyertaan` bigint(20) NOT NULL,
  `Modal_Penyetaraan` bigint(20) NOT NULL,
  `Modal_sumbangan` bigint(20) NOT NULL,
  `shu_belumdibagi` bigint(20) NOT NULL,
  `modal_luar` bigint(20) NOT NULL,
  `pendapatan` bigint(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `volume_usaha` bigint(20) NOT NULL,
  `kas` bigint(20) NOT NULL,
  `bank` bigint(20) NOT NULL,
  `simpanan_berjangka` bigint(20) NOT NULL,
  `surat_berharga` bigint(20) NOT NULL,
  `pinjaman_diberikan` bigint(20) NOT NULL,
  `penyertaan_dan_aktiva` bigint(20) NOT NULL,
  `pendapatan_diterima` bigint(20) NOT NULL,
  `jmlaktiva_tetap` bigint(20) NOT NULL,
  `realisasi_anggaran` int(11) NOT NULL,
  `rencana_anggaran` int(11) NOT NULL,
  `sarana_prasarana` varchar(100) NOT NULL,
  `transaksi_anggota` int(11) NOT NULL,
  `transaksi_koperasi` int(11) NOT NULL,
  `kerjasama_usaha` varchar(100) NOT NULL,
  `kinerja_pengurus` varchar(100) NOT NULL,
  `dokumen` text,
  `validasi` int(11) NOT NULL,
  `komentar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rat`
--

INSERT INTO `rat` (`id_rat`, `id_penilaian`, `id_koperasi`, `tanggal`, `simpanan_pokok`, `simpanan_wajib`, `cadangan`, `simpanan_lainnya`, `Cadangan_resiko`, `Modal_penyertaan`, `Modal_Penyetaraan`, `Modal_sumbangan`, `shu_belumdibagi`, `modal_luar`, `pendapatan`, `biaya`, `volume_usaha`, `kas`, `bank`, `simpanan_berjangka`, `surat_berharga`, `pinjaman_diberikan`, `penyertaan_dan_aktiva`, `pendapatan_diterima`, `jmlaktiva_tetap`, `realisasi_anggaran`, `rencana_anggaran`, `sarana_prasarana`, `transaksi_anggota`, `transaksi_koperasi`, `kerjasama_usaha`, `kinerja_pengurus`, `dokumen`, `validasi`, `komentar`) VALUES
(9, 1, 1, '2019-01-07', 3800000, 209499750, 31642405, 22705365, 0, 0, 0, 0, 0, 47015297, 29663257, 0, 81353458, 448022426, 0, 0, 0, 0, 0, 0, 0, 2000, 2000, 'Milik Sendiri', 2000, 2000, 'Lebih dari 5 Kerjasama', 'Ketujuh item kinerja pengurus dibuat tertulis dan dilaksanakan', NULL, 0, NULL),
(10, 2, 1, '2020-01-07', 3800000, 214121750, 33615237, 24441367, 0, 0, 0, 0, 0, 50000004, 35004610, 0, 88486260, 546437183, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(11, 1, 4, '2019-07-10', 0, 0, 185155593, 363613569, 0, 0, 0, 0, 0, 324260600, 25043316, 0, 153968734, 2137347108, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(12, 2, 4, '2020-03-22', 0, 0, 265667545, 563601331, 0, 0, 0, 0, 0, 1214759916, 52300870, 0, 516860864, 3018605662, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(13, 1, 3, '2019-07-10', 0, 0, 6418488424, 319361886, 0, 0, 0, 0, 0, 0, 26412005, 0, 64394505, 56890231736, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(14, 2, 3, '2020-02-17', 0, 0, 74492102, 319361886, 0, 0, 0, 0, 0, 0, 13023597, 0, 37463000, 540286598, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(15, 1, 2, '2019-07-10', 200000, 0, 446864804, 432000000, 0, 0, 0, 0, 0, 961695620, 77405720, 0, 430860000, 2237566144, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(16, 2, 2, '2020-01-10', 200000, 0, 418281094, 472000000, 0, 0, 0, 0, 0, 120169234, 68597848, 0, 305974500, 2098441973, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(17, 1, 5, '2019-07-10', 0, 0, 311182679, 292900000, 0, 0, 0, 0, 0, 420848197, 84021095, 0, 1423544211, 1451294221, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(18, 2, 5, '2020-01-25', 0, 0, 437792779, 29290000, 0, 0, 0, 0, 0, 25000000, 85307185, 0, 455756500, 1951739407, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(19, 1, 6, '2019-07-10', 0, 0, 289875045, 148000000, 0, 0, 0, 0, 0, 179265498, 51419922, 0, 128745000, 801007224, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(20, 2, 6, '2020-02-13', 0, 0, 316872026, 188000000, 0, 0, 0, 0, 0, 0, 25808473, 0, 107374500, 791777235, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(21, 1, 7, '2019-07-10', 0, 0, 52014500, 604000000, 0, 0, 0, 0, 0, 198746500, 44000000, 0, 135625000, 921211000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(22, 2, 7, '2020-01-05', 0, 0, 62014500, 0, 0, 0, 0, 0, 0, 584000000, 45000000, 0, 122945000, 1053556000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(23, 1, 8, '2019-07-10', 0, 0, 10743140245, 0, 0, 0, 0, 0, 0, 0, 191755988, 0, 45551333000, 350205019195, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(24, 2, 8, '2020-02-19', 0, 0, 12010174395, 27206987250, 0, 0, 0, 0, 0, 47643953055, 0, 0, 2591818133, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(25, 1, 9, '2019-07-10', 0, 0, 147177673, 109356346, 0, 0, 0, 0, 0, 174634735, 82516670, 0, 181041552, 964142426, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(26, 2, 9, '2020-01-05', 0, 0, 119167466, 109356348, 0, 0, 0, 0, 0, 174634735, 47844483, 0, 141870354, 861070032, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(27, 1, 10, '2019-07-10', 0, 0, 96225833, 22750000, 0, 0, 0, 0, 0, 115053721, 42000000, 0, 202891739, 1230520118, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(28, 2, 10, '2020-01-05', 0, 0, 109307833, 22750000, 0, 0, 0, 0, 0, 115053721, 52250000, 0, 232445242, 1237361817, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL),
(30, 2, 11, '2020-07-12', 30000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_wajib`
--

CREATE TABLE `simpanan_wajib` (
  `id_simpanan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `besar_simpanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan_wajib`
--

INSERT INTO `simpanan_wajib` (`id_simpanan`, `id_anggota`, `tanggal_simpan`, `besar_simpanan`) VALUES
(18, 1, '2019-06-22', 879250),
(19, 2, '2019-06-22', 1595750),
(20, 3, '2019-06-22', 3158750),
(21, 4, '2019-06-22', 14441250),
(22, 6, '2019-06-22', 4622000),
(23, 7, '2019-06-22', 12245750),
(24, 8, '2019-06-22', 10720000),
(25, 9, '2019-06-22', 12076000),
(26, 10, '2019-06-22', 8653000),
(27, 12, '2019-06-22', 12755000),
(28, 13, '2019-06-22', 6830000),
(29, 14, '2019-06-22', 12640000),
(30, 15, '2019-06-22', 9830000),
(31, 16, '2019-06-22', 8620000),
(32, 17, '2019-06-22', 9360000),
(33, 18, '2019-06-22', 1030000),
(34, 19, '2019-06-22', 9360000),
(35, 20, '2019-06-22', 9360000),
(36, 21, '2019-06-22', 9360000),
(37, 22, '2019-06-22', 8690000),
(38, 23, '2019-06-22', 8160000),
(39, 24, '2019-06-22', 8160000),
(40, 25, '2019-06-22', 3430000),
(41, 26, '2019-06-22', 4130000),
(42, 27, '2019-06-22', 3920000),
(43, 28, '2019-06-22', 4025000),
(44, 29, '2019-06-22', 4025000),
(45, 30, '2019-06-22', 1675000),
(46, 31, '2019-06-22', 1440000),
(47, 32, '2019-06-22', 2070000),
(48, 33, '2019-06-22', 70000),
(49, 34, '2019-06-22', 2040000),
(50, 35, '2019-06-22', 1800000),
(51, 36, '2019-06-22', 700000),
(52, 37, '2019-06-22', 1150000),
(54, 38, '2019-06-22', 420000),
(55, 39, '2019-06-22', 680000),
(56, 5, '2020-06-22', 4622000),
(59, 40, '2021-07-12', 70000),
(60, 42, '2021-07-12', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Indera Buana, SE', 'admin', '$2y$10$QQsWhb/n4X63N3D6.kKHUuOOQwRqcdxT0VwZRZ.uEeS.eM0qsmF/m', 'Bidang Koperasi'),
(3, 'Atun Budiono, SE', 'perencanaan', '$2y$10$axYIOON1kK61wa4rh832leD24QLulHkRhfI2JBs3S/5CIgBwD94vW', 'Bagian Perencanaan'),
(11, 'KOPERASI LED LELES', 'ledleles', '$2y$10$Zy0f5TdYqxwNDq5ImYZhyedYK/UoWggPFnj509UH8.XqWuqvqmxYy', 'Badan Usaha Koperasi'),
(12, 'KOPERASI UNIT DESA MINA KARYA BHAKTI', 'minakarya', '$2y$10$AiDAwdci38Uproge6UT70eRG0r8Eunj2fyWHbgz5XHZSSrxnY23za', 'Badan Usaha Koperasi'),
(13, 'KOPERASI PEGAWAI REPUBLIK INDONESIA ANUGRAH', 'anugrah', '$2y$10$QQsWhb/n4X63N3D6.kKHUuOOQwRqcdxT0VwZRZ.uEeS.eM0qsmF/m', 'Badan Usaha Koperasi'),
(14, 'KOPERASI KARYAWAN RUMAH SAKIT 2 SUBANG', 'kopkarrs2', '$2y$10$6rxy2J5EAxdrbfa0eTSCo.mkaZ0ko1/0hbNBQ/jr5AIzKk5dwanGS', 'Badan Usaha Koperasi'),
(15, 'KOPERASI LED MAWAR', 'ledmawar', '$2y$10$CGLBbWdZ2xZTzsWB.NgjBeJCSRJc8ZdWbzVQN9p4CP1lR9TDeL66G', 'Badan Usaha Koperasi'),
(16, 'KOPERASI LED CURUG AGUNG', 'ledcurugagung', '$2y$10$XzaF54CoPj8WqIQl3WNQUOkM67nnXy/wXnMM1PZwDQdR55wyQbRBW', 'Badan Usaha Koperasi'),
(17, 'KOPERASI LED MITRA SEJAHTERA', 'ledmitra', '$2y$10$ydqZGSirRBu4gY7hnydD7u3ix2ZNlstBMpwZyX3tGYXvEHvU9O11u', 'Badan Usaha Koperasi'),
(18, 'KOPERASI PEGAWAI REPUBLIK INDONESIA KASOMALANG', 'kprikasomalang', '$2y$10$wBqy2V/JwO5ehjjnAp5NEeP14TZL7ANVKYzWQ54G6bjlgoBy9nH9a', 'Badan Usaha Koperasi'),
(19, 'KOPERASI WERDATAMA PUSAKA ', 'werdatama', '$2y$10$RvQUG4Oqmy3CKus5gm/UMOrvpW3udpq10.zNBvdC08Ot9DBbS/KnK', 'Badan Usaha Koperasi'),
(20, 'KOPERASI MANDIRI AMANAH SEJAHTERA ', 'mandiri', '$2y$10$RlWplg1amhaALDvniEQvyefnB1IehNL62BMM5KqapnhOcxuyvRRia', 'Badan Usaha Koperasi'),
(21, 'ririn', 'a', '$2y$10$m/7E7A0MduoYff3zGcy15ufxegPR1OmaIdzSYWvJB/Tqujp44HFvW', 'Badan Usaha Koperasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `koperasi`
--
ALTER TABLE `koperasi`
  ADD PRIMARY KEY (`id_koperasi`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `penilaian_koperasi`
--
ALTER TABLE `penilaian_koperasi`
  ADD PRIMARY KEY (`id_penilaian_koperasi`);

--
-- Indexes for table `rat`
--
ALTER TABLE `rat`
  ADD PRIMARY KEY (`id_rat`);

--
-- Indexes for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `koperasi`
--
ALTER TABLE `koperasi`
  MODIFY `id_koperasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian_koperasi`
--
ALTER TABLE `penilaian_koperasi`
  MODIFY `id_penilaian_koperasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rat`
--
ALTER TABLE `rat`
  MODIFY `id_rat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
