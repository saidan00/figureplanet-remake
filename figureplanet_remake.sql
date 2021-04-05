-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 06:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `figureplanet_remake`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2020-10-14 08:58:28', '2020-10-14 08:58:28'),
(3, 4, '2020-11-10 00:27:34', '2020-11-10 00:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Scale Figure', NULL, NULL, NULL),
(2, 'Nendoroid', NULL, NULL, NULL),
(3, 'Figma', NULL, NULL, NULL),
(4, 'Others', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `path`, `content_type`, `created_at`, `updated_at`) VALUES
(2, 'storage/media/54ESMD_01.jpg', 'image/jpg', '2020-09-23 06:49:12', '2020-09-23 06:49:12'),
(3, 'storage/media/54ESMD_02.jpg', 'image/jpg', '2020-09-23 07:38:13', '2020-09-23 07:38:13'),
(5, 'storage/media/8L7D5F_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(6, 'storage/media/6QZ3N9_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(7, 'storage/media/1VUD4Z_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(8, 'storage/media/W3F5CB_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(9, 'storage/media/402HLZ_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(10, 'storage/media/XCU3FW_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(11, 'storage/media/9BK05R_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(12, 'storage/media/KV5ICZ_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(13, 'storage/media/SQDVIO_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(14, 'storage/media/VH0TMW_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(15, 'storage/media/DLF15S_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(16, 'storage/media/LT8KGV_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(17, 'storage/media/QYJKAS_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(18, 'storage/media/A2E1VZ_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(19, 'storage/media/MWUSTF_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(20, 'storage/media/PAGKZN_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(21, 'storage/media/8STR9D_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(22, 'storage/media/W2R0N4_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(23, 'storage/media/IBMOY2_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(24, 'storage/media/BDJR6H_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(25, 'storage/media/SJPMDG_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(26, 'storage/media/5F0N2C_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(27, 'storage/media/WCKJFD_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(28, 'storage/media/W162TJ_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(29, 'storage/media/1U4VZ2_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(30, 'storage/media/IA6HS5_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(31, 'storage/media/CUSHZ8_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(32, 'storage/media/2ZDFBE_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(33, 'storage/media/60PH7D_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(34, 'storage/media/LKMR85_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(35, 'storage/media/B63HQN_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(36, 'storage/media/RWZXPK_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(37, 'storage/media/QU89T4_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(38, 'storage/media/DTNSJC_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(39, 'storage/media/DAQPZH_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(40, 'storage/media/SPIDJX_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(41, 'storage/media/43ODCQ_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(42, 'storage/media/QS076L_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(43, 'storage/media/PTEWSN_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(44, 'storage/media/2VZQ76_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(45, 'storage/media/0DAKYN_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(46, 'storage/media/EQ5J1B_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(47, 'storage/media/H8BE7K_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(48, 'storage/media/8YP5RD_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(49, 'storage/media/VWQGM6_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(50, 'storage/media/FCAI8G_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(51, 'storage/media/TP9C21_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(52, 'storage/media/CTMS32_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(53, 'storage/media/RABN6O_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(54, 'storage/media/R2YF9Q_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(55, 'storage/media/4ZUNM5_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(56, 'storage/media/WS471G_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(57, 'storage/media/WUNVZ6_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(58, 'storage/media/V6UY41_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(59, 'storage/media/H1MEDI_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(60, 'storage/media/46GIAM_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(61, 'storage/media/N3SVBY_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(62, 'storage/media/6PVXSU_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(63, 'storage/media/YICBJ0_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(64, 'storage/media/E5DXC0_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(65, 'storage/media/QTR9V0_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(66, 'storage/media/E7YJ92_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(67, 'storage/media/Q6DYC5_01.jpg', 'image/jpg', '2020-09-24 11:11:55', '2020-09-24 11:11:55'),
(68, 'storage/media/FTV2C6_01.jpg', 'image/png', '2020-10-27 11:00:18', '2020-10-27 11:00:18'),
(69, 'storage/media/S7W4DV_01.jpg', 'image/jpeg', '2020-11-10 10:42:36', '2020-11-10 10:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `media_file_usages`
--

CREATE TABLE `media_file_usages` (
  `media_file_id` bigint(20) UNSIGNED NOT NULL,
  `usage_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_file_usages`
--

INSERT INTO `media_file_usages` (`media_file_id`, `usage_table`, `usage_id`, `created_at`, `updated_at`) VALUES
(2, 'products', '1', '2020-09-23 06:51:53', '2020-09-23 06:51:53'),
(3, 'products', '1', '2020-09-23 07:40:10', '2020-09-23 07:40:10'),
(5, 'products', '3', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(6, 'products', '5', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(7, 'products', '6', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(8, 'products', '7', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(9, 'products', '8', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(10, 'products', '9', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(11, 'products', '10', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(12, 'products', '11', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(13, 'products', '12', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(14, 'products', '13', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(15, 'products', '14', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(16, 'products', '15', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(17, 'products', '16', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(18, 'products', '17', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(19, 'products', '18', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(20, 'products', '19', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(21, 'products', '20', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(22, 'products', '21', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(23, 'products', '22', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(24, 'products', '23', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(25, 'products', '24', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(26, 'products', '25', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(27, 'products', '26', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(28, 'products', '27', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(29, 'products', '28', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(30, 'products', '29', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(31, 'products', '30', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(32, 'products', '31', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(33, 'products', '32', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(34, 'products', '33', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(35, 'products', '34', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(36, 'products', '35', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(37, 'products', '36', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(38, 'products', '37', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(39, 'products', '38', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(40, 'products', '39', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(41, 'products', '40', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(42, 'products', '41', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(43, 'products', '42', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(44, 'products', '43', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(45, 'products', '44', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(46, 'products', '45', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(47, 'products', '46', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(48, 'products', '47', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(49, 'products', '48', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(50, 'products', '49', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(51, 'products', '50', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(52, 'products', '51', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(53, 'products', '52', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(54, 'products', '53', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(55, 'products', '54', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(56, 'products', '55', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(57, 'products', '56', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(58, 'products', '57', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(59, 'products', '58', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(60, 'products', '59', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(61, 'products', '60', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(62, 'products', '61', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(63, 'products', '62', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(64, 'products', '63', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(65, 'products', '64', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(66, 'products', '65', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(67, 'products', '66', '2020-09-24 11:16:50', '2020-09-24 11:16:50'),
(68, 'products', '68', '2020-10-27 11:00:18', '2020-10-27 11:00:18'),
(69, 'products', '69', '2020-11-10 10:42:36', '2020-11-10 10:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_19_073950_create_permission_tables', 1),
(7, '2020_09_22_132455_create_categories_table', 2),
(8, '2020_09_22_132504_create_products_table', 2),
(9, '2020_09_22_145028_create_order_statuses_table', 3),
(11, '2020_09_22_145012_create_payment_methods_table', 4),
(12, '2020_09_22_142929_create_orders_table', 5),
(13, '2020_09_22_143003_create_order_details_table', 5),
(14, '2020_09_22_150440_create_carts_table', 6),
(16, '2020_09_23_131024_create_media_files_table', 7),
(17, '2020_09_23_131113_create_media_file_usages_table', 7),
(18, '2020_09_27_071229_add_more_fields_to_users_table', 8),
(19, '2020_10_01_071646_create_carts_table', 9),
(20, '2020_10_01_071835_create_cart_items_table', 9),
(22, '2020_10_02_070424_create_order_details_table', 10),
(23, '2020_11_09_010147_add_note_column_to_orders_table', 11),
(24, '2020_11_09_093059_add_status_column_to_users_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 5),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(3, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `shipping_fee` double NOT NULL,
  `total` double NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `receiver_name`, `phone`, `address`, `subtotal`, `shipping_fee`, `total`, `payment_method_id`, `order_status_id`, `user_id`, `created_at`, `updated_at`, `note`) VALUES
('120201110142214', 'Jay Võ', '0909062034', '273 ADV', 19805530, 40000, 19845530, 1, 3, 1, '2020-11-10 07:22:14', '2020-11-10 00:22:39', NULL),
('420201110142757', 'goku son', '0999999999', 'Kamehameha', 10856000, 40000, 10896000, 1, 2, 4, '2020-10-31 07:27:57', '2020-11-10 07:32:40', 'khách hàng hủy');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
('120201110142214', 1, 830530, 1, 830530, '2020-11-10 07:22:14', '2020-11-10 07:22:14', NULL),
('120201110142214', 3, 2875000, 3, 8625000, '2020-11-10 07:22:14', '2020-11-10 07:22:14', NULL),
('120201110142214', 5, 1150000, 2, 2300000, '2020-11-10 07:22:14', '2020-11-10 07:22:14', NULL),
('120201110142214', 6, 1610000, 5, 8050000, '2020-11-10 07:22:14', '2020-11-10 07:22:14', NULL),
('420201110142757', 8, 3151000, 1, 3151000, '2020-11-10 07:27:57', '2020-11-10 07:27:57', NULL),
('420201110142757', 9, 3910000, 1, 3910000, '2020-11-10 07:27:57', '2020-11-10 07:27:57', NULL),
('420201110142757', 10, 3795000, 1, 3795000, '2020-11-10 07:27:57', '2020-11-10 07:27:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', '2020-10-01 23:45:22', '2020-10-01 23:45:22', NULL),
(2, 'Canceled', '2020-10-20 00:14:48', '2020-10-20 00:14:48', NULL),
(3, 'Processing', '2020-10-20 00:15:15', '2020-10-20 00:15:15', NULL),
(4, 'Delivering', '2020-10-20 00:15:35', '2020-10-20 00:15:35', NULL),
(5, 'Completed', '2020-11-04 22:40:45', '2020-11-04 22:40:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cod', '2020-10-01 23:44:50', '2020-10-01 23:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `ordered_quantity` int(11) NOT NULL DEFAULT 0,
  `available_quantity` int(11) NOT NULL DEFAULT 0,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `description`, `price`, `quantity`, `ordered_quantity`, `available_quantity`, `is_available`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '54ESMD', 'POP UP PARADE Saitama: Hero Costume Ver', 'SOMEONE WHO\'S A HERO FOR FUN.\r\n\r\nPOP UP PARADE is a new series of figures that are easy to collect with affordable prices and releases planned just four months after preorders begin! Each figure stands around 17-18cm in height and the series features a vast selection of characters from popular anime and game series, with many more to be added soon!\r\n\r\nFrom the anime series \"ONE PUNCH MAN\" comes the hero far too powerful for any foe - Saitama! His serious expression and punching pose have been carefully recreated. The figure is the perfect size to fit any display. Be sure to add him to your collection!', 830530, 25, 1, 24, 1, 1, '2020-09-23 06:56:13', '2020-11-10 00:22:39', NULL),
(3, '8L7D5F', 'Reg', 'PRESENTING A SCALE FIGURE OF REG!\r\n\r\nFrom the popular anime series \"Made in Abyss\" comes a scale figure of the innocent robot boy Reg! Careful attention has been taken to sculpting details like wear and damage. His helmet is removable.', 2875000, 25, 3, 22, 1, 1, '2020-09-24 10:48:27', '2020-11-10 00:22:39', NULL),
(5, '6QZ3N9', 'Kid the Phantom Thief', '\"IT\'S A SHOW TIME!\"\r\n\r\nFrom the anime series \"Detective Conan\" comes a Nendoroid of Kid the Phantom Thief! He comes with two interchangeable face plates including his standard expression and his grinning expression. He can be displayed wearing his top hat using interchangeable head parts. A miniature sized top hat is also included. Optional parts include his card gun, a dove and a rose! Be sure to add him to your collection!', 1150000, 20, 2, 18, 1, 2, '2020-09-24 10:52:21', '2020-11-10 00:22:39', NULL),
(6, '1VUD4Z', 'Racing Miku 2019 ver', 'A FIGMA OF THE OFFICIAL CHARACTER OF THE 2019 HATSUNE MIKU GT PROJECT!\r\n\r\nThe 2019 edition of the official character of the 2019 Hatsune Miku GT Project, Racing Miku, is joining the figma series! This year\'s design is illustrated by Annindofu and the figma can easily be posed in the original pose from the original illustration along with various other poses! An articulated figma stand is also included, allowing for all sorts of different scenes!', 1610000, 17, 5, 12, 1, 3, '2020-09-24 10:52:21', '2020-11-10 00:22:39', NULL),
(7, 'W3F5CB', 'Kizuna AI', 'A SCALE FIGURE BASED ON THE COVER ILLUSTRATION OF \"KIZUNA AI 1ST PHOTO BOOK AI\"!\r\n\r\nThe popular virtual YouTuber Kizuna AI has become a new scale figure based on the cover illustration of \"Kizuna AI 1st Photo Book AI\"! Her bright smile and energetic pose have been carefully recreated. The figure features a highly detailed sculpt and intricate paintwork making for a faithful recreation.\r\n\r\nHer hair\'s pink highlights and adorable heart-shaped headband have also been captured in detail. Be sure to add her to your collection!', 2300000, 13, 0, 13, 1, 1, '2020-09-24 10:52:21', '2020-11-09 23:57:10', NULL),
(8, '402HLZ', 'Archer/Gilgamesh', '\"FOR A MONGREL, YOU SURE KNOW HOW TO BARK.\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a scale figure of Archer/Gilgamesh! The King of Heroes has been recreated based on his Third Ascension appearance in an original pose. His muscular physique, summoning circle and Noble Phantasm Ea have been recreated in outstanding detail. Be sure to add him to your collection!', 3151000, 17, 0, 17, 1, 1, '2020-09-24 10:52:21', '2020-11-10 07:32:40', NULL),
(9, 'XCU3FW', 'Emilia: Tea Party Ver', '\"LET\'S ENJOY A TEA PARTY.\"\r\n\r\nFrom the \"Re:ZERO -Starting Life in Another World-: The Heroines\' Tea Party\" event that took place at the Tree Village shop in Tokyo Solamachi in November 2017 comes a scale figure series based on the official illustration from the event. The first figure of the series is Emilia. Emilia has been recreated elegantly enjoying a tea party at the Roswaal Mansion. Her table and chair have also been captured in meticulous detail. Be sure to add her to your collection!', 3910000, 17, 0, 17, 1, 1, '2020-09-24 10:52:21', '2020-11-10 07:32:40', NULL),
(10, '9BK05R', 'Mimori Togo', '\"IT\'S THE START OF A NEW NATIONAL DEFENSE.\"\r\n\r\nFrom the original anime series \"Yuki Yuna is a Hero\" comes a scale figure of Mimori Togo! Her gentle personality has been perfectly captured as she sits atop her rifle. Her long rifle and unique hair decorations have been carefully recreated. The figures various details give it a sense of size larger than the 1/8th scale suggests. Be sure to add her to your collection!', 3795000, 1, 0, 1, 1, 1, '2020-09-24 10:52:21', '2020-11-10 07:32:40', NULL),
(11, 'KV5ICZ', 'Judith', '\"TRASH MUST BE CLEANED UP QUICKLY.\"\r\n\r\nFrom the smartphone simulation game featuring beautiful girls × battle mechas and serious mecha battles on a realistic physics engine, \"Iron Saga\", comes a scale figure of the high priestess of the Curia Machinery, Judith!\r\n\r\nThe costume and accessories themed around the Curia Machinery\'s hall of scriptures have been carefully based on illustrator ASK\'s original design. Her expression clearly conveys her cold and fastidious demeanor, while her outfit features plenty of detail. Be sure to add her to your collection!', 2921000, 30, 0, 30, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(12, 'SQDVIO', 'Kumano Kai-II', '\"Admiral, do you have something for me to do?\"\r\n\r\nFrom the popular browser game \"Kantai Collection -KanColle-\" comes a Wonderful Hobby Selection figure of the fourth Mogami-class Heavy Cruiser, Kumano in her Kai-II form!\r\n\r\nUsing the original illustration by Konishi as a basis, Kumano has been recreated with a level of three-dimensional detail only possible in figure form! Her rigging has been carefully sculpted and painted with a high level of gradation, contrasting beautifully with the bare skin of her thighs beneath. Her flowing hairstyle has been captured as well. Be sure to add her to your collection!', 3594900, 19, 0, 19, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(13, 'VH0TMW', 'Rikka Takarada', '\"I don\'t understand what Gridman is...\"\r\n\r\nFrom the anime series \"SSSS.GRIDMAN\" comes a scale figure of the cool, composed and somewhat listless heroine, Rikka Takarada! She\'s been recreated in a pose looking over her shoulder with a gentle smile on her face.\r\n\r\nHer trademark long cardigan and gorgeous legs have been sculpted in meticulous detail to bring out Rikka\'s unique charm. Be sure to add her to your collection!', 3404000, 28, 0, 28, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(14, 'DLF15S', 'Goblin Slayer', 'The third figure in the POP UP PARADE series is Goblin Slayer!\r\n\r\nPOP UP PARADE is a new series of figures that are easy to collect with affordable prices and releases planned just four months after preorders begin! Each figure stands around 17-18cm in height and the series features a vast selection of characters from popular anime and game series, with many more to be added soon!\r\n\r\nThe third figure in the series is Goblin Slayer from the anime series \"GOBLIN SLAYER\"! The weathered appearance of his battle-worn armor has been meticulously recreated. The figure is just the right size to fit any display. Be sure to add him to your collection!', 830300, 14, 0, 14, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(15, 'LT8KGV', 'Racing Miku 2018 Thailand Ver', 'Presenting the 2018 Thailand Support Ver. Of Racing Miku from the Hatsune Miku GT Project!\r\n\r\nThe 2018 Thailand Support Ver. Of Racing Miku 2018 from the Hatsune Miku GT Project is now a scale figure! Based on the design by illustrator Hiro Kanzaki, the energetic Racing Miku has been brought to life. Her costume and tanned skin are unique features of the Thailand Support Ver. Parts of her costume, sunglasses and her twintails have been recreated with translucent parts. Be sure to add her to your collection!', 3220000, 24, 0, 24, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(16, 'QYJKAS', 'Osamu Dazai', 'From Bungo Stray Dogs comes a scale figure of Osamu Dazai!\r\n\r\nFrom the anime series \"Bungo Stray Dogs\" comes a 1/8th scale figure of the Armed Detective Company member Osamu Dazai! Osamu Dazai has been recreated in a different-from-usual outfit as drawn by Chief Animation Designer Nobuhiro Arai. His bold smiling expression conveys a mysterious charm. The wrinkles of his outfit have been carefully sculpted to recreate his appearance in fine detail. His jacket and scarf are removable, allowing for multiple display possibilities!', 2571400, 21, 0, 21, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(17, 'A2E1VZ', 'Racing Miku 2017 Thailand Ver', 'Presenting the 2017 Thailand Support Ver. Of Racing Miku from the Hatsune Miku GT Project!\r\n\r\nThe 2017 Thailand Support Ver. Of Racing Miku 2017 from the Hatsune Miku GT Project is now a scale figure! Based on the design by illustrator Tony, the fairy-like version of Racing Miku has been brought to life in full scale. Her costume and tanned skin is a unique feature of the Thailand Support Ver. Her twintails, wings and parts of her costume have been recreated with translucent parts, making for a truly magical appearance. Be sure to add her to your collection!', 3910000, 24, 0, 24, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(18, 'MWUSTF', 'Racing Miku 2018: Challenging to the TOP', 'The Songstress of the Circuit racing to the top!\r\n\r\nFrom the \"Hatsune Miku GT Project\" comes Racing Miku 2018: Challenging to the TOP! Illustrator Kanzaki Hiro\'s Racing Miku design has been brought to life. Her fluttering twintails feature vivid gradation while the details of her costume such as the fur and gold decorations have been carefully captured. Be sure to add her to your collection!', 3151000, 18, 0, 18, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(19, 'PAGKZN', 'High Elf Archer', '\"One day I\'ll make him go on a real adventure.\"\r\n\r\nFrom the popular anime series \"GOBLIN SLAYER\" comes a 1/7th scale figure of one of Goblin Slayer\'s party members, High Elf Archer! The figure is based on her appearance from the cover illustration of the 2nd volume of the light novel!\r\n\r\nNot only have her large bow and quiver been faithfully recreated, the fine details of the decorations on her outfit and her obsidian daggers have been meticulously captured as well. Her hair has been recreated using translucent parts, lending her a mystical aura fitting for a High Elf. Be sure to add her to your collection!', 4094000, 19, 0, 19, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(20, '8STR9D', 'Saber/Altria Pendragon: Heroic Spirit Formal Dress Ver', 'Saber/Altria Pendragon in a very special outfit.\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a scale figure of Altria Pendragon based on her appearance from the game\'s 2nd anniversary \"Heroic Spirit Formal Dress\" series of Craft Essence illustrations.\r\n\r\nHer joyous expression for the celebratory occasion, beautiful white dress featuring a pearl coating and the soft stole draped around her shoulders have all been faithfully recreated. Her stole has been recreated with flocking to give it a soft look and feel. Masters, be sure to add her to your collection.', 2300000, 12, 0, 12, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(21, 'W2R0N4', 'POP UP PARADE Kizuna AI', 'The second in the new figure series is Kizuna AI!\r\n\r\nPOP UP PARADE is a new series of figures that are easy to collect with affordable prices and releases planned just four months after preorders begin! Each figure stands around 17-18cm in height and the series features a vast selection of characters from popular anime and game series, with many more to be added soon!\r\n\r\nThe second figure of the series is Kizuna AI, in a lively pose where you can almost hear her calling out, \"Hai Domo!\"', 830300, 21, 0, 21, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(22, 'IBMOY2', 'Nadeshiko Kagamihara', '\"Let\'s go camping next year too!\"\r\n\r\nFrom the anime series \"Laid-Back Camp\" comes a 1/7th scale figure of Nadeshiko Kagamihara! Her excited appearance from the 1st Blu-ray jacket illustration has been recreated in extraordinary detail. Her winter camping clothes have been carefully sculpted and faithfully painted on both on the outside and inside.\r\n\r\nThe lantern in her hand can also be lit up. Not just great a great decoration for your room, but a great decoration for your campsite as well!', 4094000, 23, 0, 23, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(23, 'BDJR6H', 'Saber of \"Red\" -Mordred-', 'The Saber-class servant and member of the Red Faction.\r\n\r\nFrom the novel \'Fate/Apocrypha\' comes a rerelease of Saber of \"Red\" -Mordred-! She is posed slinging her red jacket over her back, as she looks over her shoulder with a confident smile on her face! The figure is based on an illustration by the novel\'s illustrator, Ototsugu Konoe, faithfully keeping the details of her boots and jacket as well as her tough appearance.\r\n\r\nThe casual clothes she wears shows off the amazing curves of her body as well as her healthy abs! The pendant and bracelet chain are made from metal parts bringing out a premium, realistic appearance even to the smaller parts of the figure. Be sure to add this charming, fearless Saber to your collection!', 2990000, 22, 0, 22, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(24, 'SJPMDG', 'Alter Ego/Okita Soji (Alter)', '\"I am the one who cleaves demons, pierces gods and manages the prayers of people.\"\r\n\r\nFrom \"Fate/Grand Order\" comes a scale figure of Alter Ego/Okita Soji (Alter)! The alternate aspect of Okita Soji specialized in using the Deterrent Force by adjustment of her Saint Graph has been recreated in a marvelous 1/7th scale figure!\r\n\r\nHer long hair and black cape blow in the wind, while her unique boots have been sculpted to be impressive to look at from every angle. In her left hand is fire while she holds her finely detailed odachi sword \"Purgatory\" in her right.\r\n\r\nBe sure to add the alternate version of Okita Soji to your collection!', 4554000, 21, 0, 21, 1, 1, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(25, '5F0N2C', 'Saber/Altria Pendragon (Alter) Shinjuku Ver & Cuirassier Noir', '\"You\'re my Master?\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a Nendoroid of the Saber-class servant Altria Pendragon (Alter) from \"Singularity Subspecies I: Malignant Quarantined Demonic Realm: Shinjuku Phantom Incident\" in her casual outfit! This version is a set of Nendoroid Saber/Altria Pendragon (Alter) Shinjuku Ver. and additional optional parts including her Cuirassier Noir motorbike.\r\n\r\nShe comes with a standard expression, a shouting expression and a blushing expression as though saying her \"H-How long have you been standing there?\" line. Her Noble Phantasm Excalibur Morgan is included as an optional part. Additional optional parts include a hamburger, her dog Cavall the 2nd, her motorbike Cuirassier Noir and debris parts. Be sure to add this slightly different version of the blackened King of Knights to your collection!', 1212100, 18, 0, 18, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(26, 'WCKJFD', 'Saber/Altria Pendragon (Alter) Shinjuku Ver', '\"I will allow evil, but only evil with purpose.\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a Nendoroid of the Saber-class servant Altria Pendragon (Alter) from \"Singularity Subspecies I: Malignant Quarantined Demonic Realm: Shinjuku Phantom Incident\" in her casual outfit!\r\n\r\nShe comes with a standard expression and a blushing expression as though saying her \"H-How long have you been standing there?\" line. Her Noble Phantasm Excalibur Morgan and a hamburger are included as optional parts. Be sure to add this slightly different version of the blackened King of Knights to your collection!', 961400, 20, 0, 20, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(27, 'W162TJ', '416', '\"Commander, I am all you need.\"\r\n\r\nFrom the popular smartphone game \"Girls\' Frontline\" comes a Nendoroid of 416, member of the 404 faction! She comes with a standard expression, an angry expression for when someone calls her \"HKM4\" and a smiling expression.\r\n\r\nShe comes with a grenade and an explosion effect part as optional parts. Of course, an optional part of her 416 assault rifle is also included. Be sure to add her to your collection!', 1235100, 26, 0, 26, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(28, '1U4VZ2', 'Susu Tushan', '\"I want to become an excellent fox spirit matchmaker!\"\r\n\r\nFrom the popular Chinese series \"Fox Spirit Matchmaker\" comes a Nendoroid of the third Tushan sister, Susu Tushan! She comes with three face plates including her standard expression, her smiling expression and her shocked expression.\r\n\r\nFor optional parts, she comes with a Grand Rainbow Lollipop, her Sacred Matchmaker Book and a Memory Mallet. Be sure to add her to your collection!', 1064900, 14, 0, 14, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(29, 'IA6HS5', 'Ann Takamaki: Phantom Thief Ver', '\"Can I beat that loser?\"\r\n\r\nFrom the popular anime series \"PERSONA5 the Animation\" comes a Nendoroid of the one-quarter American beauty also known as Panther, Ann Takamaki, in her phantom thief outfit! She comes with several optional parts including her whip, submachine gun and a miniature sized mask she can be posed holding! Additionally, a cut-in sheet is included to recreate Persona summoning sequences and All-Out Attack finishes!\r\n\r\nShe comes with three face plates including a standard expression, an angry expression and a winking expression. Be sure to add her to your collection, along with the other Persona series Nendoroids!', 1127000, 26, 0, 26, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(30, 'CUSHZ8', 'Lord Grim', 'From \"The King\'s Avatar\" comes a Nendoroid of Lord Grim!\r\n\r\nFrom China\'s popular series \"The King\'s Avatar\" comes a Nendoroid of the protagonist Ye Xiu\'s avatar - Lord Grim! He comes with three face plates including a standard expression, a serious expression and a chibi sneering expression! For optional parts he comes with the Myriad Manifestation Umbrella which can be displayed in 4 different forms through use of interchangeable parts. Display with Nendoroid Ye Xiu (sold separately) to recreate scenes from the series! Be sure to add him to your collection!', 1235100, 26, 0, 26, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(31, '2ZDFBE', 'Ai Haibara', '\"My name is Ai Haibara... Nice to meet you...\"\r\n\r\nFrom the anime series \"Detective Conan\" comes a Nendoroid of Ai Haibara! She comes with three interchangeable face plates including her determined standard expression, her occasionally-seen exasperated expression and her different-from-usual blushing expression!\r\n\r\nShe comes with her laptop and a chair that she can be posed sitting in as optional parts! Be sure to add her to your collection!', 1044200, 13, 0, 13, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(32, '60PH7D', 'XANXUS', '\"The only way to deal with scum is to eliminate it!\"\r\n\r\nFrom the legendary anime series \"Reborn!\" comes Nendoroids of the Vongolia Family\'s independent assassination squad, Varia! Next is Varia\'s leader, XANXUS, in his Ten Years Later appearance! He comes with three face plates including his displeased standard expression, his intrepid smiling expression and his angered expression.\r\n\r\nHis jacket is removable, and he comes with a special sofa and two guns as optional parts, making for a truly grand set fit for the boss. Be sure to add him to your collection along with Nendoroid SQUALO (sold separately) and enjoy Varia Quality!', 1265000, 11, 0, 11, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(33, 'LKMR85', 'Aya Maruyama: Stage Outfit Ver', '\"Hi, everyone! I\'m Aya Maruyama!\"\r\n\r\nFrom the popular smartphone game \"BanG Dream! Girls Band Party!\" comes a Nendoroid of the vocalist of Pastel?Palettes, Aya Maruyama! She comes with three face plates including her Idol-like winking expression and smiling expression along with a lovable crying expression. Use them to recreate your favorite scenes from the game!\r\n\r\nDisplay with Nendoroid Yukina Minato: Stage Outfit Ver. and Nendoroid Kokoro Tsurumaki: Stage Outfit Ver. (both sold separately) for even more fun!', 1064900, 16, 0, 16, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(34, 'B63HQN', 'Rimi Ushigome', '\"I was a little scared... but it was fun! I want to join the band!\"\r\n\r\nFrom the anime series BanG Dream! comes a rerelease of the Nendoroid of Poppin\'Party\'s bassist, Rimi Ushigome! She comes with three face plates including a standard expression, an innocent expression with her mouth open and an expression with upturned eyes.\r\n\r\nOptional parts include a bass guitar to display her performing live, as well as a case for the guitar allowing you to display her on the way to and from practice. Be sure to display her with the previously announced Nendoroid Kasumi Toyama and Arisa Ichigaya to recreate all sorts of different situations in Nendoroid size!', 956800, 13, 0, 13, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(35, 'RWZXPK', 'Izumi Sena', '\"Ahhh, just shut up already!\"\r\n\r\nFrom the popular game \"Ensemble Stars!\" comes a Nendoroid of the Knights unit member, Izumi Sena! He comes with his standard expression, his displeased expression as though saying \"Just shut up!\" as well as his flushed expression from when he can\'t contain his excitement!\r\n\r\nHe comes with a microphone, motorcycle key + special hand part and a sword fitting for the \"Knights\" unit as optional parts! Display him performing on stage or instead in more everyday scenes all in adorable Nendoroid size!\"', 982100, 30, 0, 30, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(36, 'QU89T4', 'Doctor Strange: Infinity Edition DX Ver', 'From Avengers: Infinity War comes Doctor Strange!\r\n\r\nFrom \"Avengers: Infinity War\" comes a Nendoroid of Doctor Strange! The Nendoroid features full articulation as well as three interchangeable face plates to capture various scenes from the movie. The Eye of Agamotto has been carefully recreated in Nendroid form. Using the included hand parts, you can easily pose Doctor Strange as though using the amulet to stop time.\r\n\r\nThe included magic circle parts can be attached to his hands. Various other hand parts are included to recreate poses from battle scenes. Additionally, the sword created using one of his spells, a gateway, multiple arm effect parts and sitting lower half parts are included! Be sure to add Nendoroid Doctor Strange: Infinity Edition DX Ver. to your collection!', 1681300, 10, 0, 10, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(37, 'DTNSJC', 'Doctor Strange: Infinity Edition Standard Ver', 'From Avengers: Infinity War comes Doctor Strange!\r\n\r\nFrom \"Avengers: Infinity War\" comes a Nendoroid of Doctor Strange! The Nendoroid features full articulation as well as two interchangeable face plates to capture various scenes from the movie. The Eye of Agamotto has been carefully recreated in Nendroid form. Using the included hand parts, you can easily pose Doctor Strange as though using the amulet to stop time.\r\n\r\nThe included magic circle parts can be attached to his hands. Various other hand parts are included to recreate poses from battle scenes. Be sure to add Nendoroid Doctor Strange: Infinity Edition Standard Ver. to your collection!', 1041900, 19, 0, 19, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(38, 'DAQPZH', 'Kakashi Hatake', 'The third in the Naruto Nendoroid series - the \"Copy Ninja\" Kakashi!\r\n\r\nFrom the popular anime series \'Naruto Shippuden\' comes a rerelease of the Nendoroid of Kakashi Hatake! He comes with three face plates as well as two different forehead protectors to either cover up or reveal his left eye allowing for all sorts of different posing options!\r\n\r\nA variety of optional parts are also included, such as Lightning Blade effect parts for action scenes as well as more playful parts such as the \'Make-Out Paradise\' book and other books in the series! Just like the previous two Nendoroid in the series, Kakashi allows for all sorts of poses and is packed with play value for fans to enjoy in their collection!', 1021200, 11, 0, 11, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(39, 'SPIDJX', 'Racing Miku 2019 Ver', 'A Nendoroid of the official character of the 2019 Hatsune Miku GT Project!\r\n\r\nThe official character of the 2019 Hatsune Miku GT Project, Racing Miku, is joining the Nendoroid series! This year\'s design by popular illustrator Annindoufu features a frilly costume fit for this particularly idol themed version of Racing Miku! She comes with two face plates including a cheerful smiling expression and a playful winking expression!\r\n\r\nOptional parts include a flag to support the team and a Nendoroid car for her to ride in! Be sure to add her to your collection and cheer for the team once again this year!', 1278800, 15, 0, 15, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(40, '43ODCQ', 'Kurumi Tokisaki', 'The spirit known as the \'Nightmare\', who wears the Astral Dress \'Elohim\'.\r\n\r\nFrom the popular light novel and anime series \'Date A Live\' comes a second rerelease of Nendoroid Kurumi Tokisaki wearing her Goth-Loli Astral Dress!\r\n\r\nShe comes with three expressions including a mysterious sidelong glance, a condescending expression as well as a maddened expression showing off her fearless disposition. Optional parts include both Zafkiel\'s musket and pistol, allowing you to pose her in the various poses she took while firing shots from them! Enjoy the adorable madness of Kurumi in Nendoroid size!', 1021200, 26, 0, 26, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(41, 'QS076L', 'Yukina Minato: Stage Outfit Ver', '\"Are you prepared to fully devote yourselves to Roselia?\"\r\n\r\nFrom the popular smartphone game \"BanG Dream! Girls Band Party!\" comes a Nendoroid of the vocalist of Roselia, Yukina Minato! She comes with three face plates including her standard expression, her emotional singing expression and an adorable blushing expression. She also comes with a separable microphone and mic stand as optional parts! Be sure to add her to your collection!', 1064900, 18, 0, 18, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(42, 'PTEWSN', 'The Lone Survivor', 'NOT JUST A GAME, THIS IS BATTLE ROYALE\r\n\r\nFrom the internationally popular game \"PLAYERUNKNOWN\'S BATTLEGROUNDS(PUBG)\" comes a Nendoroid of \"The Lone Survivor\" from the game\'s key art! His helmet\'s visor can be raised or lowered, making for multiple display options.\r\n\r\nHe comes with an AKM Assault Rifle, a P92 Pistol and a pan as optional parts. The Nendoroid is fully articulated, allowing you to easily recreate in-game scenes. Be sure to add The Lone Survivor to your collection!', 1106300, 29, 0, 29, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(43, '2VZQ76', 'Deadpool: Orechan Edition', 'Deadpool is finally joining the Nendoroids!\r\n\r\nFrom \'Deadpool\' comes a Nendoroid of Deadpool himself! His outfit has been shrunk down into a cute Nendoroid figure which comes with a variety of different expression patterns which can changed by swapping out the left and right eyes separately! He even comes with parts to display him with hearts popping out of his eyes!\r\n\r\nA selection of comic speech-bubbles which allow you to pose him saying some of his classic lines and interchangeable parts which allow you to display him showing off his sexy heart-shaped underwear are included. The Nendoroid is also able to stand without the need of a Nendoroid stand - as long as you balance him carefully! Plus, as a part of the fully articulated \'Edition\' series of Nendoroids you can enjoy all sorts of fun Deadpool-style action scenes when posing! Be sure to add him to your collection!', 1021200, 24, 0, 24, 1, 2, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(44, '0DAKYN', 'Tanya Degurechaff', '\"What are you doing, twitching like a shrimp? Want me to feed you to the pigs?\"\r\n\r\nFrom the anime movie \"Saga of Tanya the Evil - The Movie\" comes a figma of Tanya Degurechaff!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with three face plates including a cute standard expression, her crazed expression often seen in combat and her smiling expression.\r\n    Her rifle is included as an optional part.\r\n    Also included is an articulated figma stand to facilitate various exciting poses.', 1610000, 22, 0, 22, 1, 3, '2020-09-24 10:52:21', '2020-11-09 23:57:10', NULL),
(45, 'EQ5J1B', 'Corrin (Female)', 'The Crux of Fate.\r\n\r\nFrom the Nintendo 3DS game \'Fire Emblem Fates\' comes a rerelease of the figma of the main playable character in her female form - Corrin!\r\n\r\n    Using the smooth yet posable joints of figma, you can act out a variety of different scenes.\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    She comes with both a gentle smiling face plate as well as a powerful shouting expression for combat scenes.\r\n    The powerful sword \'Yato\' is included for her to wield and a Dragonstone is also included to display with her.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1446700, 28, 0, 28, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(46, 'H8BE7K', 'Saber/Miyamoto Musashi', '\"Show me something fun and interesting, Master!\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a figma of the Saber servant, Miyamoto Musashi!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with three face plates including her smiling face, her shouting face and her blushing face!\r\n    Optional parts include her sword of fire and sword of water, a bowl of udon and a skewer of dango!\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1840000, 29, 0, 29, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(47, '8YP5RD', 'Kirito: Alicization ver', '\"My Calling... I think I was a swordsman.\"\r\n\r\nFrom the anime series \"Sword Art Online: Alicization\" comes a figma of the protagonist Kirito in his Elite Swordsman attire!\r\n\r\n    Using the smooth yet posable joints of figma, you can act out a variety of different scenes.\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    He comes with three face plates including his smiling face, shouting face and his grinning face.\r\n    Kirito\'s Sword of the Night Sky and the Red Rose Sword he received from Eugeo are both included.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1564000, 12, 0, 12, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(48, 'VWQGM6', 'Kid the Phantom Thief', 'Ladies and Gentlemen!! figma Kid the Phantom Thief is back for a rerelease!\r\n\r\nFrom the anime series \'Detective Conan\' comes a rerelease of the figma of Conan Edogawa\'s rival - the Phantom Thief, Kid!\r\n\r\n    Using the smooth yet posable joints of figma, you can act out a variety of different scenes.\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    He comes with a variety of optional parts including his card gun, a playing card and a rose.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1446700, 12, 0, 12, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(49, 'FCAI8G', 'Futaba Sakura', '\"Th-There! Now steal it!\"\r\n\r\nFrom the popular anime series \"PERSONA5 the Animation\" comes a figma of Futaba Sakura!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with three face plates including a smiling face, an angry face and a grinning face!\r\n    Optional parts include her smartphone, her mask for when she gets anxious as well as additional arm parts to show her with her hands in her pockets!\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1518000, 18, 0, 18, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(50, 'TP9C21', 'Roku', 'The heavily armed high school girl that fires a huge bow.\r\n\r\nFrom illustrator neco\'s \"Heavily Armed High School Girls\" illustrations comes a figma of the archer Roku!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    Drawer joints are used in her shoulders and thighs allowing for broader posing options.\r\n    She comes with several optional parts including a bow, arrows and a quiver which can be displayed open or closed.\r\n    She comes with three face plates including an expressionless face, a shouting expression and a smiling expression.\r\n    The original illustration has been carefully converted into figma size as faithfully as possible.\r\n    The perfect size to use with 1/12th scale items such as TOMYTEC\'s \"Little Armory\" series (sold separately).\r\n    Character reference card is included.', 1881400, 21, 0, 21, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(51, 'CTMS32', 'Miyo Asato: Summer Uniform ver', 'Time for the tactical school girl\'s summer operation!\r\n\r\nThe main character of TOMYTEC\'s \"Little Armory\" 1/12th scale weapon models, Miyo Asato, is now a new figma in her summer uniform!\r\n\r\n    Using the smooth yet posable joints of figma, you can act out a variety of different scenes.\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    She makes use of drawer joints in her shoulders allowing her to easily wield weapons from the Little Armory series.\r\n    A runner kit to create the M4 carbine variant SOPMOD BLOCK 2 is included. Optional parts like a variable magnification scope, IR laser sight and flashlight can be attached. The model is limited to the figma release and features a different color from its \"Little Armory\" series counterpart.\r\n    She comes with three face plates including a standard expression, a battle expression and a smiling expression.\r\n    She comes with a handgun that can be holstered and a magazine. The cardigan over her belt kit can be removed. A knife and special hand parts for her to hold it are included as well.\r\n    The background sheet of the product comes with targets that can be cut out and displayed with her as a training ground.\r\n    An articulated figma stand is included, which allows various poses to be taken.\r\n\r\n- Who is the Little Armory\'s Miyo Asato? -\r\nMiyo Asato is one of the characters seen on the Little Armory packaging, illustrated by Haruaki Fuyuno. Together with her trusty carbine pistol, she protects the region as one of the students at a high school marked for protection training.', 1587000, 14, 0, 14, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(52, 'RABN6O', 'Kaguya Luna', '\"Morning! Kaguya Luna here!\"\r\n\r\nPopular virtual entertainer Kaguya Luna is now a figma!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with four face plates including her smiling expression, her closed-eyes smiling expression, her apathetic expression and her shouting expression.\r\n    Three different text plates are included.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1446700, 13, 0, 13, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(53, 'R2YF9Q', 'Saber Alter 2.0', 'The blackened King of Knights, corrupted by the world\'s evil.\r\n\r\nFrom the anime movie series \"Fate/stay night: Heaven\'s Feel\" comes the King of Knights consumed by darkness, figma Saber Alter 2.0!\r\n\r\n    The sculpting of the figma has been redone from the ground up to be more awe-inspiring than ever before.\r\n    Drawer joints are used in her shoulders allowing for broader posing options, such as poses with her wielding her sword in both hands.\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    The lustrous appearance of her blood-streaked black armor has been faithfully captured, preserving the truly dark atmosphere that surrounds her.\r\n    She comes with three face plates including an expressionless face, a shouting face for combat scenes and a smiling face.\r\n    She comes with Excalibur Morgan as an optional part, along with front hair parts used to display her with her mask on as well as fluttering front hair parts for more posing options.', 1660600, 24, 0, 24, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(54, '4ZUNM5', 'Rikka Shiina: Summer Uniform ver', 'The elite school girl is now a figma in a tactical summer uniform!\r\n\r\nFrom TOMYTEC\'s \'Little Armory\' 1/12th scale weapon model series comes a figma of one of the series characters - the elite tactical girl\'s school member, Rikka Shiina!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She makes use of drawer joints in her shoulders allowing her to easily wield the \'Little Armory\' weapons.\r\n    A plastic model runner kit for a Special Forces Submachine Gun is included. Parts are included for both a version of the gun with stock extended and a version with the stock retracted. The model is limited to the figma release and features a different color from its \"Little Armory\" series counterpart. It includes a dot sight and suppressor as optional parts to attach to the weapon.\r\n    She comes with three face plates including a standard expression, a battle expression and a closed eyes expression. Shooting glasses are attached to her front hair parts.\r\n    She comes with a handgun with mounted light that can be holstered, a transceiver, a stun grenade and a water bottle.\r\n    The background sheet of the product comes with a barricade that can be cut out and displayed with her as a training ground.\r\n    An articulated figma stand is included, which allows various poses to be taken.\r\n\r\n- Who is the Little Armory\'s Rikka Shiina? -\r\nRikka Shiina is one of the characters seen on the Little Armory packaging, illustrated by Haruaki Fuyuno. She plays a part in the defense of the region as one of the students at the Jyoushuu Girls Academy.', 1587000, 18, 0, 18, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(55, 'WS471G', 'Snow Miku: Snow Princess ver', 'The princess blessed by the snow is now a figma!\r\n\r\n2019 marks the 10th anniversary of Snow Miku, and the 2019 design was once again selected by fans through online votes between a selection of outfits all submitted to piapro by fans! This year the theme was \"Princess of the Hokkaido Winter\", and the winning Snow Miku design was this version based on illustrations by -L F-! The design has now been converted into this figma together with Rabbit Yukine holding a magic staff!\r\n\r\n    She comes with three face plates including a calm standard expression, a smiling expression and a closed-eyes expression.\r\n    She comes with a gorgeous staff fit for a princess, a bouquet, a masquerade mask and a cup & saucer set as optional parts!\r\n    Interchangeable skirt parts are included to display Miku.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1278800, 15, 0, 15, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(56, 'WUNVZ6', 'Avenger/Jeanne d\'Arc (Alter) Shinjuku ver', '\"It looks good on me? ...Not that it matters or anything!\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a figma of Jeanne d\'Arc (Alter) in her outfit from \"Singularity Subspecies I: Malignant Quarantined Demonic Realm: Shinjuku Phantom Incident\"!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with three face plates including a smiling expression, a yelling expression and a blushing expression.\r\n    For optional parts, she comes with her sword and a drink from the junk food store!\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1660600, 18, 0, 18, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(57, 'V6UY41', 'Bride: Noir ver', 'Married happily ever after in figma size!\r\n\r\nThe commemorative 10th anniversary figma now in a chic noir color!\r\n\r\n    She comes with two face plates including a smiling face and a face with closed eyes.\r\n    A variety of optional hand parts as well as a bouquet are also included.\r\n    The figure is standard figma size, allowing you to switch head parts with other characters and create an original figma bride! (May not be compatible with certain products)\r\n    An articulated figma stand is included, which allows various poses to be taken.', 956800, 22, 0, 22, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(58, 'H1MEDI', 'Rider of \"Black\"', '\"You are my Master and I am your Servant!\"\r\n\r\nFrom the anime \"Fate/Apocrypha\" comes a figma of the Rider of \"Black\", servant of the Black Faction!\r\n\r\n    The smooth yet posable figma joints allow you to pose dynamic action scenes from the series.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    Drawer joints are used in his shoulders, allowing for a wider range of posability.\r\n    He comes with three face plates including his smiling expression, a courageous gritted teeth expression and a lovable winking expression.\r\n    His sword can be displayed sheathed or unsheathed. He also comes with his Noble Phantasms Trap of Argalia and Casseur de Logistille.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1872200, 28, 0, 28, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(59, '46GIAM', 'Saber 2.0', 'The King of Knights, joining the figma series once more!\r\n\r\nFrom Fate/stay night comes a rerelease of the ultimate servant, figma Saber 2.0!\r\n\r\n    The sculpting of the figma has been redone from the ground up. Saber is more gallant and beautiful than ever before!\r\n    The newly designed figma joints allow for all new poses - she can even be posed wielding her sword in both hands!\r\n    A flexible plastic is used for important areas, allowing proportions to be kept without compromising posability.\r\n    She comes with a standard relaxed expression, a shouting expression for combat scenes and even an embarrassed expression.\r\n    Optional parts include the swords \'Excalibur\' and \'Caliburn\', as well as alternate swaying hair parts for more dynamic poses.', 1446700, 25, 0, 25, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(60, 'N3SVBY', 'Master/Female Protagonist', '\"We fight for a reason... right?\"\r\n\r\nFrom the popular smartphone game \"Fate/Grand Order\" comes a figma of the female protagonist dressed in the standard Chaldea uniform!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    She comes with three face plates including a grinning expression, a shouting expression and a smiling expression.\r\n    She comes with a Summon Ticket, Saint Quartz, and a Golden Apple as optional parts.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1446700, 26, 0, 26, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(61, '6PVXSU', 'True Criminal', 'But the case wasn\'t over yet... the true criminal had only just arrived!\r\n\r\nFrom the anime series \'Detective Conan\' comes a rerelease of the improved version of the previously released \'figma Criminal\' - figma True Criminal!\r\n\r\n    Using the smooth yet posable joints of figma, you can act out a variety of different crimes.\r\n    He comes with an all new expressionless face plate for even more ominous poses than before.\r\n    All the weapons included with the previous version are included together with an all new set of items including a crowbar.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1021200, 23, 0, 23, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(62, 'YICBJ0', 'Exoarm JoshiKosei', '\"Ah, Mom? I\'ve got to stop by the convenience store to buy bullets, so I\'ll be a little late!\"\r\n\r\nFrom Fukai Ryousuke\'s doujinshi \"ARMS NOTE\" comes a figma of the girl with a bionically enhanced left arm, Exoarm JoshiKosei!\r\n\r\n    The smooth yet posable figma joints allow you to act out a variety of different scenes.\r\n    Drawer joints are used in her shoulders allowing for broader posing options.\r\n    She comes with four face plates including a smiling expression, a winking expression, an embarrassed laughing expression and an inquisitive expression.\r\n    She comes with several optional parts including an EKS-8M handgun, an EKS-8M with attached conversion unit, two stun knives, a smartphone, and a school bag!\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1872200, 25, 0, 25, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(63, 'E5DXC0', 'Kazuma', '\"Farewell boring life! Hello fantasy world!\"\r\n\r\nFrom the movie \"KONO SUBARASHII SEKAI NI SYUKUFUKU WO! LEGEND OF CRIMSON\" comes a figma of Kazuma!\r\n\r\n    The smooth yet posable figma joints allow you to pose dynamic action scenes from the series.\r\n    A flexible plastic is used in specific areas, allowing proportions to be kept without compromising posability.\r\n    He comes with three face plates including a standard expression, a shouting expression and a devious \"Kazutrash\" expression.\r\n    For optional parts he comes with his mantle, his sword Chunchunmaru and a magic effect from using the Create Water spell.\r\n    Panties that he stole using his Steal spell are included as well.\r\n    An articulated figma stand is included, which allows various poses to be taken.', 1446700, 15, 0, 15, 1, 3, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(64, 'QTR9V0', 'MODEROID Bakuryu-Oh', 'A new plastic model kit! Transforms from Bakuryu Dragon to Bakuryu-Oh, and even God Raijin-Oh!\r\n\r\nFrom \"Matchless Raijin-Oh\" comes a plastic model kit of Bakuryu-Oh! Both the Bakuryu Dragon and Bakuryu-Oh forms can be recreated. Additionally, when combined with MODEROID Raijin-Oh (sold separately), you can recreate the God Raijin-Oh form! The kit includes runners separated into 7 colors as well as pre-painted parts, allowing the model to look amazing simply by being put together! The model is made from ABS, PS, and POM plastic. Special stand included.', 1278800, 21, 0, 21, 1, 4, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(65, 'E7YJ92', 'MODEROID Shinkalion H5 Hayabusa', 'Hatsune Miku\'s Shinkalion H5 Hayabusa now brought to life in Shinkalion Mode!\r\n\r\nFrom \"Shinkansen Henkei Robo Shinkalion\" comes a plastic model of Hatsune Miku\'s Shinkalion H5 Hayabusa! The mecha has been brought to life while preserving its unique appearance from the show. It features fully articulated joints, allowing you to recreated its Kaisatsu Sword pose!\r\n\r\nThe model kit is made of PS and ABS plastic with POM used in the joints. It features runners separated into three colors (green, white and grey). Some parts are pre-painted and decals are included, so all it takes is a simple assembly to recreate the mecha from the series.\r\n\r\nDisplay with MODEROID Shinkalion E5 Hayabusa (sold separately) to recreate the Double Kaisatsu Sword scene!\r\n\r\n*This model is meant for display in Shinkalion mode. The model cannot be transformed into Shinkansen mode.', 616400, 20, 0, 20, 1, 4, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL);
INSERT INTO `products` (`id`, `sku`, `name`, `description`, `price`, `quantity`, `ordered_quantity`, `available_quantity`, `is_available`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(66, 'Q6DYC5', 'MODEROID Armed Mazinkaiser Go-Valiant', 'Equipped with Psycho Armor! Armed Mazinkaiser Go-Valiant!\r\n\r\nFrom the plastic model series \"MODEROID\" comes a new entry in the \"Mazinkaiser\" universe. Covered in armor, this is the Mazinkaiser Go-Valiant! The product includes Mazinkaiser and an armor parts set to equip to it. The armor parts set can also be combined to create the \"Valiant Dagger\" vehicle.\r\n\r\nThe runners are separated by color as well as pre-painted parts allowing the model to look amazing simply by being put together! The model is made from PS and ABS plastic. Extra details can be added with the included decals.\r\n\r\n*The model of Mazinkaiser i', 1467400, 11, 0, 11, 1, 4, '2020-09-24 10:52:21', '2020-11-09 22:04:39', NULL),
(68, 'FTV2C6', 'test', 'Hello world', 230000, 1, 0, 1, 0, 1, '2020-10-27 11:00:18', '2020-11-10 10:44:42', NULL),
(69, 'S7W4DV', 'test 2', 'Hello World 2', 1000000, 3, 0, 3, 0, 1, '2020-11-10 10:42:36', '2020-11-10 10:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-10-20 02:10:00', '2020-10-20 02:10:00'),
(2, 'customer', 'web', '2020-11-09 06:04:55', '2020-11-09 06:04:55'),
(3, 'manager', 'web', '2020-11-09 06:05:25', '2020-11-09 06:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `gender`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Jay', 'Võ', 'jaysgh94@email.com', NULL, '$2y$10$3ry7E540xGlwX48JnmrmGuYwFPJCFCamEVzYpvRxZwl85C0sbG4xC', 'male', '0909062034', '273 ADV', NULL, '2020-09-27 01:00:07', '2020-09-28 22:32:12', 1),
(2, 'Huy', 'Võ', 'huysgh94@email.com', NULL, '$2y$10$1O0dDWZEmDIEViin3c7t9ers0LOja90HlwOLzNdmjMe4VtTr9a02O', 'male', '0394879163', '273 An Dương Vương', NULL, '2020-11-09 06:01:15', '2020-11-10 08:12:51', 0),
(3, 'Joyce', 'Chu', 'joycechu@email.com', NULL, '$2y$10$PY/fI2AyFYfOI.jUB11t1ubzExwe3ruEjTdTauySbPXNGg5KUXBc2', 'female', '0394879163', '273 An Dương Vương', NULL, '2020-11-09 06:09:42', '2020-11-09 06:09:42', 1),
(4, 'goku', 'son', 'songoku@email.com', NULL, '$2y$10$dHMEK2hnlQQe7YzI7L8XyuwNj/u6SQHMsfehqHfKahsHpA8twOi4i', 'male', '0999999999', 'Kamehameha', NULL, '2020-11-09 20:57:23', '2020-11-09 20:57:23', 1),
(5, 'gohan', 'son', 'songohan@email.com', NULL, '$2y$10$jIGBC2V2b9Uo/TEhZYOq3ueRXophZ5.w9Gw3mYkAC0K4BDvBWkL.e', 'male', '0999999999', 'Kamehameha', NULL, '2020-11-09 21:01:39', '2020-11-09 21:02:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_file_usages`
--
ALTER TABLE `media_file_usages`
  ADD PRIMARY KEY (`media_file_id`,`usage_table`,`usage_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `media_file_usages`
--
ALTER TABLE `media_file_usages`
  ADD CONSTRAINT `media_file_usages_media_file_id_foreign` FOREIGN KEY (`media_file_id`) REFERENCES `media_files` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`),
  ADD CONSTRAINT `orders_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
