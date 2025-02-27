-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2025 at 12:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_safrizal`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_27_040625_m_level', 1),
(6, '2025_02_27_040626_m_kategori', 1),
(7, '2025_02_27_040626_m_user', 1),
(8, '2025_02_27_040627_m_barang', 1),
(9, '2025_02_27_040627_t_penjualan', 1),
(10, '2025_02_27_040628_t_stok', 1),
(11, '2025_02_27_040629_t_penjualan_detail', 1),
(12, '2025_02_27_064930_m_barangs', 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(21, 1, 'TV001', 'TV Samsung', 4000000, 5000000, NULL, NULL),
(22, 1, 'HP002', 'HP iPhone', 8000000, 9000000, NULL, NULL),
(23, 2, 'T001', 'T-shirt', 50000, 100000, NULL, NULL),
(24, 2, 'J001', 'Jaket', 150000, 200000, NULL, NULL),
(25, 3, 'M001', 'Mie Instan', 2500, 5000, NULL, NULL),
(26, 3, 'M002', 'Biskuit', 8000, 12000, NULL, NULL),
(27, 4, 'P001', 'Kompor Gas', 400000, 600000, NULL, NULL),
(28, 4, 'P002', 'Blender', 300000, 450000, NULL, NULL),
(29, 5, 'TOY1', 'Boneka', 100000, 150000, NULL, NULL),
(30, 5, 'TOY2', 'Mobil-Mobilan', 50000, 75000, NULL, NULL),
(31, 1, 'TV001', 'TV Samsung', 4000000, 5000000, NULL, NULL),
(32, 1, 'HP002', 'HP iPhone', 8000000, 9000000, NULL, NULL),
(33, 2, 'T001', 'T-shirt', 50000, 100000, NULL, NULL),
(34, 2, 'J001', 'Jaket', 150000, 200000, NULL, NULL),
(35, 3, 'M001', 'Mie Instan', 2500, 5000, NULL, NULL),
(36, 3, 'M002', 'Biskuit', 8000, 12000, NULL, NULL),
(37, 4, 'P001', 'Kompor Gas', 400000, 600000, NULL, NULL),
(38, 4, 'P002', 'Blender', 300000, 450000, NULL, NULL),
(39, 5, 'TOY1', 'Boneka', 100000, 150000, NULL, NULL),
(40, 5, 'TOY2', 'Mobil-Mobilan', 50000, 75000, NULL, NULL),
(41, 1, 'TV001', 'TV Samsung', 4000000, 5000000, NULL, NULL),
(42, 1, 'HP002', 'HP iPhone', 8000000, 9000000, NULL, NULL),
(43, 2, 'T001', 'T-shirt', 50000, 100000, NULL, NULL),
(44, 2, 'J001', 'Jaket', 150000, 200000, NULL, NULL),
(45, 3, 'M001', 'Mie Instan', 2500, 5000, NULL, NULL),
(46, 3, 'M002', 'Biskuit', 8000, 12000, NULL, NULL),
(47, 4, 'P001', 'Kompor Gas', 400000, 600000, NULL, NULL),
(48, 4, 'P002', 'Blender', 300000, 450000, NULL, NULL),
(49, 5, 'TOY1', 'Boneka', 100000, 150000, NULL, NULL),
(50, 5, 'TOY2', 'Mobil-Mobilan', 50000, 75000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_barangs`
--

CREATE TABLE `m_barangs` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barangs`
--

INSERT INTO `m_barangs` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`, `stok`) VALUES
(1, 3, 'B6476', 'delectus', 486255, 511276, '2025-02-26 23:52:53', '2025-02-26 23:52:53', 99),
(2, 1, 'B4824', 'adipisci', 125422, 600486, '2025-02-26 23:52:53', '2025-02-26 23:52:53', 52),
(3, 1, 'B1890', 'omnis', 679612, 799301, '2025-02-26 23:52:53', '2025-02-26 23:52:53', 75),
(4, 4, 'B4941', 'ab', 877516, 1038169, '2025-02-26 23:52:53', '2025-02-26 23:52:53', 93),
(5, 5, 'B4657', 'in', 549058, 191072, '2025-02-26 23:52:53', '2025-02-26 23:52:53', 71),
(6, 1, 'B1758', 'deserunt', 99467, 118730, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 68),
(7, 2, 'B7078', 'autem', 402312, 393561, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 97),
(8, 5, 'B9258', 'itaque', 154323, 289191, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 14),
(9, 5, 'B5649', 'ullam', 327825, 635105, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 19),
(10, 2, 'B7827', 'tenetur', 333325, 831410, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 50),
(11, 5, 'B6891', 'atque', 801030, 546409, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 13),
(12, 3, 'B8627', 'iusto', 805612, 157369, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 71),
(13, 4, 'B0379', 'voluptatem', 148042, 341472, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 82),
(14, 1, 'B2109', 'magnam', 822193, 836513, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 45),
(15, 5, 'B0730', 'earum', 693469, 122471, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 84),
(16, 1, 'B5531', 'voluptas', 103141, 313251, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 62),
(17, 1, 'B8852', 'qui', 649118, 673759, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 100),
(18, 4, 'B4304', 'ut', 564239, 537273, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 92),
(19, 5, 'B6575', 'voluptas', 841245, 120126, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 20),
(20, 3, 'B1311', 'odio', 829869, 1083729, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 63),
(21, 4, 'B5719', 'doloribus', 90779, 988927, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 50),
(22, 1, 'B6216', 'numquam', 427719, 815094, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 10),
(23, 1, 'B8557', 'impedit', 374705, 884449, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 48),
(24, 3, 'B3120', 'debitis', 608696, 597803, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 96),
(25, 4, 'B1565', 'saepe', 194172, 1048090, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 97),
(26, 4, 'B9111', 'eaque', 384184, 582911, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 37),
(27, 3, 'B3339', 'vero', 360018, 1173343, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 98),
(28, 2, 'B6925', 'rerum', 600159, 635902, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 14),
(29, 5, 'B5275', 'assumenda', 621942, 225600, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 94),
(30, 3, 'B8682', 'reiciendis', 599849, 413607, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 84),
(31, 3, 'B7040', 'nesciunt', 888144, 981195, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 46),
(32, 5, 'B5116', 'corporis', 836827, 244147, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 40),
(33, 2, 'B5865', 'aliquid', 561483, 92873, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 46),
(34, 2, 'B2881', 'ut', 656516, 898838, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 95),
(35, 3, 'B5776', 'eius', 478040, 650652, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 78),
(36, 3, 'B9127', 'quo', 433156, 309457, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 37),
(37, 3, 'B3264', 'suscipit', 888824, 889692, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 38),
(38, 2, 'B8113', 'ut', 433988, 748794, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 93),
(39, 5, 'B6282', 'et', 834527, 178925, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 64),
(40, 1, 'B2193', 'nam', 293506, 517428, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 39),
(41, 4, 'B5858', 'tenetur', 128976, 278322, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 14),
(42, 4, 'B9383', 'quis', 256291, 347926, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 90),
(43, 4, 'B6320', 'reiciendis', 825397, 904571, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 20),
(44, 3, 'B5524', 'est', 517804, 851847, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 59),
(45, 4, 'B2259', 'asperiores', 613134, 176509, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 16),
(46, 5, 'B6797', 'ut', 310238, 1075371, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 86),
(47, 2, 'B5193', 'voluptatem', 295035, 715734, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 58),
(48, 4, 'B5737', 'nisi', 668369, 1014382, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 91),
(49, 2, 'B3028', 'unde', 346782, 747170, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 68),
(50, 3, 'B3945', 'rerum', 868242, 422794, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 25),
(51, 1, 'B3425', 'in', 77908, 783588, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 17),
(52, 3, 'B7137', 'veritatis', 631809, 891656, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 67),
(53, 1, 'B5095', 'libero', 201595, 834682, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 94),
(54, 2, 'B7018', 'quisquam', 203627, 784304, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 11),
(55, 3, 'B6419', 'dolores', 806945, 580481, '2025-02-26 23:53:55', '2025-02-26 23:53:55', 49);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'ELEC', 'Elektronik', NULL, NULL),
(2, 'FASH', 'Fashion', NULL, NULL),
(3, 'FOOD', 'Makanan', NULL, NULL),
(4, 'HOME', 'Peralatan Rumah', NULL, NULL),
(5, 'TOYS', 'Mainan', NULL, NULL),
(6, 'ELEC', 'Elektronik', NULL, NULL),
(7, 'FASH', 'Fashion', NULL, NULL),
(8, 'FOOD', 'Makanan', NULL, NULL),
(9, 'HOME', 'Peralatan Rumah', NULL, NULL),
(10, 'TOYS', 'Mainan', NULL, NULL),
(11, 'ELEC', 'Elektronik', NULL, NULL),
(12, 'FASH', 'Fashion', NULL, NULL),
(13, 'FOOD', 'Makanan', NULL, NULL),
(14, 'HOME', 'Peralatan Rumah', NULL, NULL),
(15, 'TOYS', 'Mainan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$QdMrpdOar8zkmUFudxA./eFz0R7njf8DyEk3BoEcVrNJ5D73heDUi', NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$/xm8WDNRlwOHCvzJv98RDO51p/aBklDB8GxhiLzcJxMnZnznwgi5O', NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$TLoSPZhIIpSc3INDhaDyw.kKAQcsXTdQR9heN7RYtDsU4VYS0CoUm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembeli 1', 'TRX001', '2025-02-27 05:48:00', NULL, NULL),
(2, 1, 'Pembeli 2', 'TRX002', '2025-02-27 05:48:00', NULL, NULL),
(3, 1, 'Pembeli 3', 'TRX003', '2025-02-27 05:48:00', NULL, NULL),
(4, 1, 'Pembeli 4', 'TRX004', '2025-02-27 05:48:00', NULL, NULL),
(5, 3, 'Pembeli 5', 'TRX005', '2025-02-27 05:48:00', NULL, NULL),
(6, 3, 'Pembeli 6', 'TRX006', '2025-02-27 05:48:00', NULL, NULL),
(7, 1, 'Pembeli 7', 'TRX007', '2025-02-27 05:48:00', NULL, NULL),
(8, 3, 'Pembeli 8', 'TRX008', '2025-02-27 05:48:00', NULL, NULL),
(9, 3, 'Pembeli 9', 'TRX009', '2025-02-27 05:48:00', NULL, NULL),
(10, 3, 'Pembeli 10', 'TRX010', '2025-02-27 05:48:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 1, 39, 31075, 4, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(3, 2, 35, 40731, 1, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(4, 3, 36, 40985, 1, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(5, 4, 41, 39663, 3, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(6, 7, 48, 42933, 2, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(7, 5, 38, 6547, 2, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(8, 6, 31, 5532, 2, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(9, 8, 35, 20405, 4, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(10, 9, 38, 36218, 1, '2025-02-26 22:53:05', '2025-02-26 22:53:05'),
(11, 10, 47, 44903, 4, '2025-02-26 22:53:05', '2025-02-26 22:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(5, 38, 1, '2025-02-23 05:51:07', 44, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(6, 49, 1, '2025-02-12 05:51:07', 24, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(7, 32, 1, '2025-02-14 05:51:07', 47, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(8, 24, 1, '2025-02-07 05:51:07', 41, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(9, 29, 1, '2025-02-18 05:51:07', 42, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(10, 42, 1, '2025-02-05 05:51:07', 14, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(11, 27, 1, '2025-02-09 05:51:07', 19, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(12, 32, 1, '2025-02-08 05:51:07', 20, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(13, 49, 1, '2025-02-05 05:51:07', 45, '2025-02-26 22:51:07', '2025-02-26 22:51:07'),
(14, 26, 1, '2025-02-18 05:51:07', 18, '2025-02-26 22:51:07', '2025-02-26 22:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `m_barang_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `m_barangs`
--
ALTER TABLE `m_barangs`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `m_barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

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
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `t_penjualan_user_id_foreign` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_barang_id_foreign` (`barang_id`),
  ADD KEY `t_stok_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `m_barangs`
--
ALTER TABLE `m_barangs`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`) ON DELETE CASCADE;

--
-- Constraints for table `m_barangs`
--
ALTER TABLE `m_barangs`
  ADD CONSTRAINT `m_barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`) ON DELETE CASCADE;

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
