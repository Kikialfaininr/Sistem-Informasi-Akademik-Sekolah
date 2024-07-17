-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 02:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kode_berita` int(11) NOT NULL,
  `tanggal_berita` datetime NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kode_berita`, `tanggal_berita`, `judul_berita`, `isi`, `foto`) VALUES
(2, '2023-06-28 13:35:01', 'Pelaksanaan ASAJ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. If you want to generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, you can use a Lorem Ipsum generator. There are many websites that offer this service such as loremipsum.io and lipsum.com.', 'FT20230628025530.jpeg'),
(3, '2023-06-28 13:35:49', 'Pesantren Ramadhan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. If you want to generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, you can use a Lorem Ipsum generator. There are many websites that offer this service such as loremipsum.io and lipsum.com.', 'FT20230628025639.jpeg'),
(4, '2023-06-28 13:35:49', 'Pelaksanaan Postest AKM Kelas', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. If you want to generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, you can use a Lorem Ipsum generator. There are many websites that offer this service such as loremipsum.io and lipsum.com.', 'FT20230628025720.jpeg'),
(7, '2023-06-28 21:57:00', 'Pengenalan & Pelatihan Teknologi Komputer', 'The error message you encountered, \"Attempt to read property \'nama_kelas\' on bool pada edit data,\" indicates that you are trying to access the property \"nama_kelas\" on a boolean value instead of an object. In other words, you are attempting to access a property on a variable that is not an object but a boolean value.  To resolve this issue, you need to ensure that you are working with the correct variable and that it is an object that has a property named \"nama_kelas.\" Check the code where you are attempting to access the \"nama_kelas\" property and verify that the variable being used is indeed an object.', 'FT20230628025839.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `daftarhadir`
--

CREATE TABLE `daftarhadir` (
  `kode_dh` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status_kehadiran` enum('Hadir','Ijin','Sakit','Terlambat','Alpa') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftarhadir`
--

INSERT INTO `daftarhadir` (`kode_dh`, `kode_kelas`, `kode_siswa`, `tanggal`, `status_kehadiran`, `created_at`, `update_at`) VALUES
(1, 2, 900, '2023-07-01', 'Ijin', '2023-06-30 05:35:32', NULL),
(2, 1, 901, '2023-06-12', 'Ijin', '2023-06-30 05:36:24', NULL),
(3, 1, 913, '2023-07-03', 'Hadir', '2023-07-02 12:45:14', NULL),
(4, 9, 914, '2023-07-11', 'Hadir', '2023-07-02 12:45:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` int(11) NOT NULL,
  `nip` char(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat` text NOT NULL,
  `jabatan_guru` varchar(50) NOT NULL,
  `jenis_guru` varchar(50) NOT NULL,
  `tugas_mengajar` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `jabatan_guru`, `jenis_guru`, `tugas_mengajar`, `keterangan`, `created_at`, `update_at`) VALUES
(7, '19720408 200903 1 00', 'Nursalim, S.Pd.SD', 'L', 'Cilacap', '1972-04-08', 'Islam', 'Kawunganten', 'Guru Muda', 'Kepala Sekolah', '-', 'PNS', '2023-06-28 02:42:39', '2023-06-28 02:42:39'),
(9, '196403041983041001', 'Danang Joyo, A.Ma.Pd', 'L', 'Cilacap', '1964-03-04', 'Islam', 'Kawunganten', 'Pembina', 'Guru Kelas', 'Guru Kelas III', 'PNS', '2023-06-28 02:44:54', '2023-06-28 02:44:54'),
(10, '198909232019022004\r\n', 'Indar Winarni, S.Pd', 'P', 'Cilacap', '1989-09-23', 'Islam', 'Kawunganten', 'Guru Pertama\r\n', 'Guru Kelas', 'Guru Kelas V', 'PNS', '2023-06-28 02:46:16', '2023-06-28 02:46:16'),
(11, '198906152020122012', 'Umi Ngasaroh, S.Pd', 'P', 'Cilacap', '1989-06-15', 'Islam', 'Kesugihan', 'Guru Pertama', 'Guru Kelas', 'Guru Kelas I', 'PNS', '2023-06-28 02:50:34', '2023-06-28 02:50:34'),
(12, '199004262020122015', 'Siti Kholifah, S.Pd.I', 'P', 'Cilacap', '1990-04-26', 'Islam', 'Kesugihan', 'Guru Pertama', 'Guru Mapel', 'Guru PAI ', 'PNS', '2023-06-28 02:50:34', '2023-06-28 02:50:34'),
(13, '198208142022211011', 'Kusdiyatmanto, S.Pd.SD', 'L', 'Cilacap', '1982-08-14', 'Islam', 'Kawunganten', 'Ahli Pertama - Guru Kelas', 'Guru Kelas', 'Guru Kelas VI', 'PNS', '2023-06-28 02:53:26', '2023-06-28 02:53:26'),
(14, '199212032022212006', 'Evi Indriani, S.Pd', 'P', 'Cilacap', '1992-12-03', 'Islam', 'Jeruklegi', 'Ahli Pertama - Guru Kelas', 'Guru Kelas', 'Guru Kelas IV', 'PNS', '2023-06-28 02:53:26', '2023-06-28 02:53:26'),
(15, '-', 'Khomsatun Alburuj Maimunah, S.Pd', 'P', 'Cilacap', '1992-01-01', 'Islam', 'Kawunganten', '-', 'Guru Kelas', 'Guru Kelas II', 'GWB', '2023-06-28 02:54:56', '2023-06-28 02:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_ruang` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_kelas`, `kode_ruang`, `hari`, `mulai`, `selesai`, `created_at`, `update_at`) VALUES
(1, 1, 18, 'Senin', '07:00:00', '09:00:00', '2023-06-28 05:48:01', '2023-06-28 05:48:01'),
(2, 2, 18, 'Senin', '09:15:00', '11:15:00', '2023-06-28 05:48:01', '2023-06-28 05:48:01'),
(3, 3, 18, 'Senin', '11:30:00', '12:30:00', '2023-06-28 05:48:46', '2023-06-28 05:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `kode_mapel` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kode_mapel`, `kode_guru`, `nama_kelas`, `kategori`, `tahun_ajaran`, `created_at`, `update_at`) VALUES
(1, 9, 12, '2017_Agama', 'Kelas VI', '2023/2024', '2023-06-28 03:03:13', '2023-06-28 03:03:13'),
(2, 10, 13, '2017_PPKn', 'Kelas VI', '2023/2024', '2023-06-28 03:03:13', '2023-06-28 03:03:13'),
(3, 11, 13, '2017_B.Indo', 'Kelas VI', '2023/2024', '2023-06-28 03:04:25', '2023-06-28 03:04:25'),
(4, 12, 13, '2017_MTK', 'Kelas VI', '2023/2024', '2023-06-28 03:04:25', '2023-06-28 03:04:25'),
(5, 13, 13, '2017_IPA', 'Kelas VI', '2023/2024', '2023-06-28 03:05:09', '2023-06-28 03:05:09'),
(6, 14, 13, '2017_IPS', 'Kelas VI', '2023/2024', '2023-06-28 03:05:09', '2023-06-28 03:05:09'),
(7, 15, 13, '2017_SBdP', 'Kelas VI', '2023/2024', '2023-06-28 03:05:56', '2023-06-28 03:05:56'),
(8, 16, 13, '2017_PJOK', 'Kelas VI', '2023/2024', '2023-06-28 03:05:56', '2023-06-28 03:05:56'),
(9, 17, 13, '2017_B.Jawa', 'Kelas VI', '2023/2024', '2023-06-28 03:06:31', '2023-06-28 03:06:31'),
(10, 9, 12, '2020_Agama', 'Kelas 1', '2023/2024', '2023-07-03 03:44:26', '2023-07-03 03:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`, `created_at`, `update_at`) VALUES
(9, 'Pendidikan Agama', '2023-06-28 02:56:31', '2023-06-28 02:56:31'),
(10, 'PPKn', '2023-06-28 02:56:31', '2023-06-28 02:56:31'),
(11, 'Bahasa Indonesia', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(12, 'Matematika', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(13, 'Ilmu Pengetahuan Alam', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(14, 'Ilmu Pengetahuan Sosial', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(15, 'SBdP', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(16, 'PJOK', '2023-06-28 02:58:46', '2023-06-28 02:58:46'),
(17, 'Bahasa Jawa', '2023-06-28 02:58:46', '2023-06-28 02:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `kode_siswa`, `kode_kelas`, `nilai`, `created_at`, `update_at`) VALUES
(3, 912, 1, 78, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(4, 912, 2, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(5, 912, 3, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(6, 912, 4, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(7, 912, 5, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(8, 912, 6, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(9, 912, 7, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(10, 912, 8, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(11, 912, 9, 0, '2023-06-28 05:14:41', '2023-06-28 05:14:41'),
(12, 913, 1, 0, '2023-06-28 05:21:26', '2023-06-28 05:21:26'),
(13, 913, 2, 0, '2023-06-28 05:21:26', '2023-06-28 05:21:26'),
(14, 913, 3, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(15, 913, 4, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(16, 913, 5, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(17, 913, 6, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(18, 913, 7, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(19, 913, 8, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(20, 913, 9, 0, '2023-06-28 05:23:46', '2023-06-28 05:23:46'),
(21, 914, 1, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(22, 914, 2, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(23, 914, 3, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(24, 914, 4, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(25, 914, 5, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(26, 914, 6, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(27, 914, 7, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(28, 914, 8, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39'),
(29, 914, 9, 0, '2023-06-28 05:26:39', '2023-06-28 05:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`kode_ruang`, `nama_ruang`, `created_at`, `update_at`) VALUES
(13, 'Kelas I', '2023-06-28 05:29:03', '2023-06-28 05:29:03'),
(15, 'Kelas III', '2023-06-28 05:29:55', '2023-06-28 05:29:55'),
(16, 'Kelas IV', '2023-06-28 05:29:55', '2023-06-28 05:29:55'),
(17, 'Kelas V', '2023-06-28 05:29:55', '2023-06-28 05:29:55'),
(18, 'Kelas VI', '2023-06-28 05:29:55', '2023-06-28 05:29:55'),
(19, 'Ruang Perpustakaan', '2023-06-28 05:29:55', '2023-06-28 05:29:55'),
(20, 'Ruang Guru', '2023-06-28 05:29:55', '2023-06-28 05:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` int(11) NOT NULL,
  `no_induk` char(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat` text NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `crerated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `no_induk`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `tahun_masuk`, `crerated_at`, `update_at`) VALUES
(900, '952', 'Abyan Azka Mahardika', 'L', 'Banyumas', '2015-10-10', 'Islam', 'Dusun Binangun Baru RT 01/12 Desa Binangun Kecamatan Bantarsari', 2023, '2023-06-28 04:34:29', '2023-06-28 04:34:29'),
(901, '953', 'Adi Saputra', 'L', 'Cilacap', '2016-01-28', 'Islam', 'Dusun Gocea RT 01/12 Desa Binangun Kecamatan Bantarsari', 2023, '2023-06-28 04:34:29', '2023-06-28 04:34:29'),
(902, '954', 'Ahmad Pauji Ridwan S', 'L', 'Karawang', '2016-03-27', 'Islam', 'Dusun Bondan RT 01/08 Desa Ujung Alang Kecamatan Kampung Laut', 2023, '2023-06-28 04:39:31', '2023-06-28 04:39:31'),
(903, '941', 'Adelia Keysha R', 'P', 'Cilacap', '2015-05-25', 'Islam', 'Dusun Binangun Baru RT 01/12 Desa Binangun Kecamatan Bantarsari', 2022, '2023-06-28 04:39:31', '2023-06-28 04:39:31'),
(904, '942', 'Agung Fathur R', 'L', 'Cilacap', '2015-07-10', 'Islam', 'Dusun Ajibarang RT 01/07 Desa Grugu Kecamatan Kawunganten', 2022, '2023-06-28 04:39:31', '2023-06-28 04:39:31'),
(905, '943', 'Agung Ramadan', 'L', 'Cilacap', '2014-07-07', 'Islam', 'Dusun Gocea RT 01/12 Desa Binangun Kecamatan Bantarsari', 2022, '2023-06-28 04:39:31', '2023-06-28 04:39:31'),
(906, '760', 'Ahmad Rijal Maulana', 'L', 'Cilacap', '2012-03-27', 'Islam', 'Dusun Ajibarang RT 01/07 Desa Grugu Kecamatan Kawunganten', 2021, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(907, '761', 'Arif Saputra', 'L', 'Cilacap', '2012-03-10', 'Islam', 'Dusun Gocea RT 01/12 Desa Binangun Kecamatan Bantarsari', 2021, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(908, '762', 'Azahra Mutiara Afriani', 'P', 'Cilacap', '2014-04-24', 'Islam', 'Dusun Ajibarang RT 01/07 Desa Grugu Kecamatan Kawunganten', 2021, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(909, '711', 'Afif Yogi Nurawan', 'L', 'Cilacap', '2012-06-06', 'Islam', 'Dusun Gocea RT 03/12 Desa Binangun Kecamatan Bantarsari', 2020, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(910, '712', 'Aji Fathur Rohman', 'L', 'Cilacap', '2012-09-24', 'Islam', 'Dusun Pinayungan RT 01/02 Desa Babakan Kecamatan Kawunganten', 2020, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(911, '713', 'Ardi Danu Prasetyo', 'L', 'Cilacap', '2013-02-24', 'Islam', 'Dusun Ajibarang RT 02/06 Desa Grugu Kecamatan Kawunganten', 2020, '2023-06-28 04:56:13', '2023-06-28 04:56:13'),
(912, '896', 'Aloisius Panji Rogo Pangestu', 'L', 'Cilacap', '2012-05-14', 'Katolik', 'Dusun Ajibarang RT 02/06 Desa Grugu Kecamatan Kawunganten', 2019, '2023-06-28 05:04:25', '2023-06-28 05:04:25'),
(913, '897', 'Dava Alfarizi Permana', 'L', 'Cilacap', '2012-03-10', 'Islam', 'Dusun Ajibarang RT 02/06 Desa Grugu Kecamatan Kawunganten', 2019, '2023-06-28 05:04:25', '2023-06-28 05:04:25'),
(914, '898', 'Fransiska Yuyum Prianti', 'P', 'Cilacap', '2012-08-16', 'Katolik', 'Dusun Ajibarang RT 02/07 Desa Grugu Kecamatan Kawunganten', 2019, '2023-06-28 05:04:25', '2023-06-28 05:04:25'),
(915, '830', 'Khoirul Anam', 'L', 'Cilacap', '2007-04-06', 'Islam', 'Dusun Gocea RT 02/12 Desa Binangun Kecamatan Bantarsari', 2018, '2023-06-28 05:04:25', '2023-06-28 05:04:25'),
(916, '880', 'Alfiana', 'P', 'Cilacap', '2011-05-12', 'Islam', 'Dusun Gocea RT 01/12 Desa Binangun Kecamatan Bantarsari', 2018, '2023-06-28 05:04:25', '2023-06-28 05:04:25'),
(917, '881', 'Anggi Dwi Septiani', 'P', 'Cilacap', '2010-09-02', 'Katolik', 'Dusun Ajibarang RT 02/07 Desa Grugu Kecamatan Kawunganten', 2018, '2023-06-28 05:04:25', '2023-06-28 05:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `kata_sandi` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `kode_guru` int(11) DEFAULT NULL,
  `kode_siswa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `level`, `password`, `kata_sandi`, `remember_token`, `kode_guru`, `kode_siswa`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$4CBkjurDKSh0tbMD5hwSguEGXXAKHaqfrdrFd3DZWyydBvZtW1Bwu', NULL, NULL, NULL, NULL, '2023-07-01 06:22:06', '2023-07-01 06:22:06'),
(16, 'siswa', 'dava', NULL, NULL, 'siswa', '$2y$10$f8kzrickbC3E0XsDhBwoZ.DtzsmRRPgp4zQDFO13eEtJdQq77gUni', 'dava123', NULL, NULL, 913, '2023-07-01 05:05:50', '2023-07-01 05:05:50'),
(17, 'kepsek', 'kepsek', NULL, NULL, 'kepsek', '$2y$10$Fz7ISEtyPsQhrZmd76TrpuA6qchSv6.t5ZFcrRPoadul3yxUhoS16', 'kepsek123', NULL, 7, NULL, '2023-07-01 05:26:49', '2023-07-01 05:26:49'),
(18, 'guru', 'danangjoyo', NULL, NULL, 'guru', '$2y$10$JhXGksNhViY.pHp6R2YVq.J2Wd0oNXKOGb7Vl95YvSJYIU6Eai2da', 'danang123', NULL, 9, NULL, '2023-07-01 05:28:15', '2023-07-01 05:28:15'),
(20, 'siswa', 'yuyum', NULL, NULL, 'siswa', '$2y$10$2cvNXTiSUxFRsNYThuyNauGBBdHfcUCzZG3TX6DfOq3WDZPcf3yL2', 'yuyum123', NULL, NULL, 914, '2023-07-02 05:37:42', '2023-07-02 05:37:42'),
(21, 'guru', 'indar123', NULL, NULL, 'guru', '$2y$10$G9CmrNOLB.35iH7eCrXNZ.MNV9k56yakOWtMmfOyzP7SCFCS0a0hO', 'indar123', NULL, 10, NULL, '2023-07-02 20:39:36', '2023-07-02 20:40:10'),
(22, 'siswa', 'adi', NULL, NULL, 'siswa', '$2y$10$judhJy7ldKTxlAeTNunlYeww35eqzcwrwnGPrWQNnFi7jn4y.evjC', 'adi123', NULL, NULL, 901, '2023-11-25 00:25:08', '2023-11-25 00:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kode_berita`);

--
-- Indexes for table `daftarhadir`
--
ALTER TABLE `daftarhadir`
  ADD PRIMARY KEY (`kode_dh`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_siswa` (`kode_siswa`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `kode_siswa` (`kode_siswa`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_siswa` (`kode_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `kode_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daftarhadir`
--
ALTER TABLE `daftarhadir`
  MODIFY `kode_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `kode_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `kode_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kode_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `kode_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `kode_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=918;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftarhadir`
--
ALTER TABLE `daftarhadir`
  ADD CONSTRAINT `daftarhadir_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `daftarhadir_ibfk_2` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
