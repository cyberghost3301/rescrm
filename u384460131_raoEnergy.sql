-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2025 at 03:49 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u384460131_raoEnergy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@gmail.com|103.211.19.74', 'i:4;', 1760803947),
('laravel-cache-admin@gmail.com|103.211.19.74:timer', 'i:1760803947;', 1760803947),
('laravel-cache-raosewanyas@gmail.com|49.36.214.180', 'i:2;', 1761055864),
('laravel-cache-raosewanyas@gmail.com|49.36.214.180:timer', 'i:1761055864;', 1761055864),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:12:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"create loan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"edit loan\";s:1:\"c\";s:3:\"web\";}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"delete loan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:9:\"view loan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"view role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:9:\"edit role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"create role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"delete role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"view permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:17:\"create permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:15:\"edit permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:17:\"delete permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super-admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1766666137),
('laravel-cache-super@row.local|103.211.19.112', 'i:1;', 1765818312),
('laravel-cache-super@row.local|103.211.19.112:timer', 'i:1765818312;', 1765818312);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_holdings`
--

CREATE TABLE `cash_holdings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `previous_day_cash_holding` decimal(12,2) NOT NULL DEFAULT 0.00,
  `today_total_collection` decimal(12,2) NOT NULL DEFAULT 0.00,
  `today_total_expenses` decimal(12,2) NOT NULL DEFAULT 0.00,
  `cash_in_hand` decimal(12,2) NOT NULL DEFAULT 0.00,
  `cash_in_account` decimal(12,2) NOT NULL DEFAULT 0.00,
  `cash_in_wallet` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_cash` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_holdings`
--

INSERT INTO `cash_holdings` (`id`, `date`, `previous_day_cash_holding`, `today_total_collection`, `today_total_expenses`, `cash_in_hand`, `cash_in_account`, `cash_in_wallet`, `total_cash`, `created_by`, `created_at`, `updated_at`) VALUES
(2, '2025-10-20', 18880.00, 1640.00, 0.00, 1640.00, 10880.00, 8000.00, 20520.00, 1, '2025-10-20 16:41:43', '2025-10-20 16:41:43'),
(3, '2025-10-21', 20520.00, 1440.00, 0.00, 1640.00, 18880.00, 1440.00, 21960.00, 1, '2025-10-21 19:45:43', '2025-10-21 19:45:43'),
(4, '2025-10-22', 21960.00, 0.00, 0.00, 1640.00, 18880.00, 1440.00, 21960.00, 1, '2025-10-22 21:40:54', '2025-10-22 21:40:54'),
(5, '2025-10-23', 21960.00, 0.00, 0.00, 1640.00, 20319.00, 1.00, 21960.00, 1, '2025-10-23 17:41:49', '2025-10-23 17:41:49'),
(6, '2025-10-24', 21960.00, 0.00, 0.00, 1640.00, 20320.00, 0.00, 21960.00, 1, '2025-10-24 17:19:18', '2025-10-24 17:19:18'),
(7, '2025-10-25', 21960.00, 1640.00, 0.00, 3280.00, 20320.00, 0.00, 23600.00, 1, '2025-10-25 21:56:17', '2025-10-25 21:56:17'),
(8, '2025-10-26', 23600.00, 0.00, 0.00, 3280.00, 20320.00, 0.00, 23600.00, 1, '2025-10-26 20:18:11', '2025-10-26 20:18:11'),
(9, '2025-10-27', 23600.00, 0.00, 0.00, 3280.00, 20320.00, 0.00, 23600.00, 1, '2025-10-27 20:23:42', '2025-10-27 20:23:42'),
(10, '2025-10-28', 23600.00, 1440.00, 0.00, 3280.00, 20320.00, 1440.00, 25040.00, 1, '2025-10-28 17:12:44', '2025-10-28 17:12:44'),
(11, '2025-10-29', 25040.00, 11200.00, 0.00, 14480.00, 21760.00, 0.00, 36240.00, 1, '2025-10-29 17:47:02', '2025-10-29 17:47:02'),
(12, '2025-10-30', 36240.00, 0.00, 0.00, 14480.00, 21760.00, 0.00, 36240.00, 1, '2025-10-30 17:43:57', '2025-10-30 17:43:57'),
(13, '2025-10-31', 36240.00, 0.00, 0.00, 14480.00, 21760.00, 0.00, 36240.00, 1, '2025-10-31 17:46:41', '2025-10-31 17:46:41'),
(14, '2025-11-01', 36240.00, 1640.00, 0.00, 16120.00, 21760.00, 0.00, 37880.00, 1, '2025-11-01 17:44:26', '2025-11-01 17:44:26'),
(15, '2025-11-02', 37880.00, 0.00, 0.00, 16120.00, 21760.00, 0.00, 37880.00, 1, '2025-11-02 18:04:19', '2025-11-02 18:04:19'),
(16, '2025-11-03', 37880.00, 0.00, 0.00, 16120.00, 21760.00, 0.00, 37880.00, 1, '2025-11-03 17:43:29', '2025-11-03 17:43:29'),
(17, '2025-11-04', 37880.00, 1440.00, 0.00, 16120.00, 21760.00, 1440.00, 39320.00, 1, '2025-11-04 17:48:37', '2025-11-04 17:48:37'),
(18, '2025-11-05', 39320.00, 0.00, 0.00, 16120.00, 23200.00, 0.00, 39320.00, 1, '2025-11-05 17:44:20', '2025-11-05 17:44:20'),
(19, '2025-11-06', 39320.00, 1580.00, 0.00, 0.00, 40900.00, 0.00, 40900.00, 1, '2025-11-06 17:34:46', '2025-11-06 17:34:46'),
(20, '2025-11-07', 40900.00, 0.00, 0.00, 0.00, 40900.00, 0.00, 40900.00, 1, '2025-11-07 17:48:09', '2025-11-07 17:48:09'),
(21, '2025-11-11', 40900.00, 1440.00, 0.00, 0.00, 40900.00, 1440.00, 42340.00, 1, '2025-11-11 17:40:29', '2025-11-11 17:40:29'),
(22, '2025-11-14', 42340.00, 5000.00, 0.00, 5000.00, 42340.00, 0.00, 47340.00, 1, '2025-11-14 18:06:00', '2025-11-14 18:06:00'),
(23, '2025-11-15', 47340.00, 17500.00, 0.00, 15500.00, 42340.00, 7000.00, 64840.00, 1, '2025-11-15 16:46:09', '2025-11-15 16:46:09'),
(24, '2025-11-18', 64840.00, 28240.00, 0.00, 42300.00, 49340.00, 1440.00, 93080.00, 1, '2025-11-18 20:42:28', '2025-11-18 20:42:28'),
(25, '2025-11-21', 93080.00, 1840.00, 0.00, 44140.00, 50780.00, 0.00, 94920.00, 1, '2025-11-21 17:28:56', '2025-11-21 17:28:56'),
(26, '2025-11-22', 94920.00, 1000.00, 0.00, 44140.00, 50780.00, 1000.00, 95920.00, 1, '2025-11-22 23:35:48', '2025-11-22 23:35:48'),
(27, '2025-11-23', 95920.00, 500.00, 0.00, 44140.00, 51780.00, 500.00, 96420.00, 1, '2025-11-23 17:26:07', '2025-11-23 17:26:07'),
(28, '2025-11-24', 96420.00, 20000.00, 100140.00, 0.00, 16280.00, 0.00, 16280.00, 1, '2025-11-24 17:44:50', '2025-11-24 17:44:50'),
(29, '2025-11-25', 16280.00, 1440.00, 0.00, 0.00, 16280.00, 1440.00, 17720.00, 1, '2025-11-25 21:06:53', '2025-11-25 21:06:53'),
(30, '2025-11-26', 17720.00, 7000.00, 0.00, 7000.00, 17720.00, 0.00, 24720.00, 1, '2025-11-26 17:45:38', '2025-11-26 17:45:38'),
(31, '2025-11-27', 24720.00, 70000.00, 80000.00, 2000.00, 12720.00, 0.00, 14720.00, 1, '2025-11-27 17:56:53', '2025-11-27 17:56:53'),
(32, '2025-11-28', 14720.00, 1840.00, 0.00, 3840.00, 12720.00, 0.00, 16560.00, 1, '2025-11-28 17:54:27', '2025-11-28 17:54:27'),
(33, '2025-11-29', 16560.00, 1500.00, 0.00, 4940.00, 12720.00, 400.00, 18060.00, 1, '2025-11-29 17:29:29', '2025-11-29 17:29:29'),
(34, '2025-12-02', 18060.00, 1440.00, 0.00, 1840.00, 16220.00, 1440.00, 19500.00, 1, '2025-12-02 17:48:34', '2025-12-02 17:48:34'),
(35, '2025-12-03', 19500.00, 6470.00, 0.00, 8310.00, 17660.00, 0.00, 25970.00, 1, '2025-12-03 17:39:58', '2025-12-03 17:39:58'),
(36, '2025-12-05', 25970.00, 1840.00, 1200.00, 9550.00, 17060.00, 0.00, 26610.00, 1, '2025-12-05 17:40:49', '2025-12-05 17:40:49'),
(37, '2025-12-06', 26610.00, 12500.00, 0.00, 14050.00, 17060.00, 8000.00, 39110.00, 1, '2025-12-06 17:19:19', '2025-12-06 17:19:19'),
(38, '2025-12-09', 39110.00, 1440.00, 0.00, 24050.00, 15060.00, 1440.00, 40550.00, 1, '2025-12-09 17:25:15', '2025-12-09 17:25:15'),
(39, '2025-12-10', 40550.00, 3345.00, 0.00, 36895.00, 7000.00, 0.00, 43895.00, 1, '2025-12-10 18:05:49', '2025-12-10 18:05:49'),
(40, '2025-12-12', 43895.00, 1840.00, 0.00, 38735.00, 7000.00, 0.00, 45735.00, 1, '2025-12-12 18:09:42', '2025-12-12 18:09:42'),
(41, '2025-12-13', 45735.00, 2225.00, 0.00, 40960.00, 7000.00, 0.00, 47960.00, 1, '2025-12-13 19:28:59', '2025-12-13 19:28:59'),
(42, '2025-12-14', 47960.00, 700.00, 0.00, 41660.00, 7000.00, 0.00, 48660.00, 1, '2025-12-14 17:48:25', '2025-12-14 17:48:25'),
(43, '2025-12-15', 48660.00, 200.00, 0.00, 41860.00, 7000.00, 0.00, 48860.00, 1, '2025-12-15 16:47:43', '2025-12-15 16:47:43'),
(44, '2025-12-16', 48860.00, 1440.00, 0.00, 41860.00, 7000.00, 1440.00, 50300.00, 1, '2025-12-16 17:31:10', '2025-12-16 17:31:10'),
(45, '2025-12-17', 50300.00, 3345.00, 0.00, 45205.00, 8440.00, 0.00, 53645.00, 1, '2025-12-17 18:34:25', '2025-12-17 18:34:25'),
(46, '2025-12-19', 53645.00, 1840.00, 0.00, 45205.00, 8440.00, 1840.00, 55485.00, 1, '2025-12-19 18:42:47', '2025-12-19 18:42:47'),
(47, '2025-12-20', 55485.00, 2075.00, 0.00, 47280.00, 10280.00, 0.00, 57560.00, 1, '2025-12-20 22:08:45', '2025-12-20 22:08:45'),
(48, '2025-12-21', 57560.00, 1050.00, 0.00, 47280.00, 10280.00, 1050.00, 58610.00, 1, '2025-12-21 22:16:43', '2025-12-21 22:16:43'),
(49, '2025-12-23', 58610.00, 1440.00, 0.00, 47280.00, 11330.00, 1440.00, 60050.00, 1, '2025-12-23 17:10:28', '2025-12-23 17:10:28'),
(50, '2025-12-24', 60050.00, 3345.00, 0.00, 50625.00, 12770.00, 0.00, 63395.00, 1, '2025-12-24 18:15:45', '2025-12-24 18:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `alt_contact` varchar(10) DEFAULT NULL,
  `vehicle_registration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `contact`, `alt_contact`, `vehicle_registration`, `created_at`, `updated_at`) VALUES
(1, 'Vajeed Shah', 'S/o Adalat, Pokhabhinda, Deoria, Deoria, Uttar Pradesh, 274001', '9795463887', NULL, NULL, '2025-10-20 16:27:02', '2025-10-20 16:27:02'),
(2, 'Singasan Kushwaha', 'S/o Ramayan Kushwaha, Gram Baikunthpur, Local PO Baikunthpur, Deoria, Uttar Pradesh, 274001', '8948038359', NULL, NULL, '2025-10-20 16:36:31', '2025-10-20 16:36:31'),
(3, 'RAMU YADAV', 'S/o Raghunath Yadav, Kaulamundera, P. O. Baghra Mahuari, Baghramahuari, Deoria, Uttar Pradesh, 274404', '9381263115', NULL, 'UP52AT3816', '2025-11-14 12:38:43', '2025-11-14 12:38:43'),
(4, 'ACHCHHAIVAR TUFANI SHARMA', 'S/o Tufani Sharma, 113 Chakabandhan Urf Mishrauli,  Chakabandhan Urf Singhpur, Post - Rampur, Deoria, Uttar  Pradesh, 274405', '7798901831', NULL, 'UP 52 BT 3022', '2025-11-15 15:34:29', '2025-11-24 00:34:24'),
(5, 'RAMESHWAR YADAV', 'S/o Kapildev Yadav, Jagdishpur, Jagdishpur, Bijaipur,  Gopalganj, Bijaipur, Gopalganj, Bihar, 841508', '8757329721', NULL, NULL, '2025-11-15 15:51:35', '2025-11-15 15:51:35'),
(6, 'RAMDARAS', 'S/o Lalsa, Village and Post Kushahari, Kushari, Deoria, Uttar  Pradesh, 274001', '8115684335', NULL, 'UP 52 AT 8882', '2025-11-26 12:43:48', '2025-11-26 12:43:48'),
(7, 'MINTOO GAUTAM', 'S/o Chandan Prasad, Near Holy Motehrs Angels School Se  150 Meter West, Barari Machrigawan, Deoria, Uttar Pradesh,  274001', '7408675965', NULL, 'UP 52 T 8504', '2025-12-03 12:52:07', '2025-12-03 12:52:07'),
(8, 'JAYANARAYAN YADAV', 'S/O Tufani Yadav, Pokhar Bhinda, Lahilpar Khas, Deoria, Lahilpar, Deoria, Uttar Pradesh, 274001', '7800335662', '7991435662', 'UP 52 BT 0412', '2025-12-06 16:02:26', '2025-12-06 16:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `head` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `amount`, `head`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2025-11-24', 100000.00, 'Purchase', 1, '2025-11-24 17:41:54', '2025-11-24 17:41:54'),
(2, '2025-11-24', 140.00, 'Visit', 1, '2025-11-24 17:44:31', '2025-11-24 17:44:31'),
(3, '2025-11-27', 80000.00, 'Purchase', 1, '2025-11-27 17:55:59', '2025-11-27 17:55:59'),
(4, '2025-12-05', 1200.00, 'Transportation', 1, '2025-12-05 17:39:50', '2025-12-05 17:39:50');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledger_entries`
--

CREATE TABLE `ledger_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entry_date` date NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `type` enum('CR','DR') NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_entries`
--

INSERT INTO `ledger_entries` (`id`, `loan_id`, `entry_date`, `invoice_number`, `type`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-10-11', '2526DP1', 'CR', 2000.00, 'Sale', '2025-10-20 16:27:02', '2025-10-20 16:27:02'),
(2, 2, '2025-10-14', '2526DP2', 'CR', 11000.00, 'Sale', '2025-10-20 16:36:31', '2025-10-20 16:36:31'),
(3, 1, '2025-10-20', '2526DP1', 'CR', 1640.00, 'Weekly collection', '2025-10-20 16:37:14', '2025-10-20 16:37:14'),
(4, 2, '2025-10-21', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-10-21 19:41:22', '2025-10-21 19:41:22'),
(5, 1, '2025-10-25', '2526DP1', 'CR', 1640.00, 'Weekly collection', '2025-10-25 21:55:04', '2025-10-25 21:55:04'),
(10, 2, '2025-10-28', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-10-28 17:11:46', '2025-10-28 17:11:46'),
(11, NULL, '2025-10-29', '2526DP0', 'CR', 11200.00, 'Scrap', '2025-10-29 17:46:20', '2025-10-29 17:46:20'),
(12, 1, '2025-11-01', '2526DP1', 'CR', 1640.00, 'Weekly collection', '2025-11-01 17:43:48', '2025-11-01 17:43:48'),
(13, 2, '2025-11-04', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-11-04 17:48:05', '2025-11-04 17:48:05'),
(14, 1, '2025-11-06', '2526DP1', 'CR', 1580.00, 'Weekly collection', '2025-11-06 17:34:13', '2025-11-06 17:34:13'),
(15, 2, '2025-11-11', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-11-11 17:40:04', '2025-11-11 17:40:04'),
(16, 3, '2025-11-14', '2526DP3', 'CR', 5000.00, 'Sale', '2025-11-14 12:38:43', '2025-11-14 12:38:43'),
(17, 4, '2025-11-15', '2526DP4', 'CR', 7500.00, 'Sale', '2025-11-15 15:34:29', '2025-11-15 15:34:29'),
(18, 5, '2025-11-15', '2526DP5', 'CR', 10000.00, 'Sale', '2025-11-15 15:51:35', '2025-11-15 15:51:35'),
(19, 2, '2025-11-18', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-11-18 20:03:18', '2025-11-18 20:03:18'),
(20, NULL, '2025-11-18', '2526DP0', 'CR', 26800.00, 'Scrap', '2025-11-18 20:04:22', '2025-11-18 20:04:22'),
(21, 3, '2025-11-21', '2526DP3', 'CR', 1840.00, 'Weekly collection', '2025-11-21 17:28:25', '2025-11-21 17:28:25'),
(22, 5, '2025-11-22', '2526DP5', 'CR', 1000.00, 'Weekly collection', '2025-11-22 21:30:53', '2025-11-22 21:30:53'),
(23, 5, '2025-11-22', '2526DP5', 'DR', 200.00, 'Non-payment penalty', '2025-11-22 21:31:10', '2025-11-22 21:31:10'),
(24, 5, '2025-11-22', '2526DP5', 'DR', 232.00, 'Late payment penalty (1%)', '2025-11-22 21:31:23', '2025-11-22 21:31:23'),
(25, 5, '2025-11-23', '2526DP5', 'CR', 500.00, 'Weekly collection', '2025-11-23 17:25:31', '2025-11-23 17:25:31'),
(26, NULL, '2025-11-24', '2526DP0', 'CR', 20000.00, 'Investment', '2025-11-24 17:41:15', '2025-11-24 17:41:15'),
(27, 2, '2025-11-25', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-11-25 21:06:08', '2025-11-25 21:06:08'),
(28, 6, '2025-11-26', '2526DP6', 'CR', 7000.00, 'Sale', '2025-11-26 12:43:48', '2025-11-26 12:43:48'),
(29, NULL, '2025-11-27', '2526DP0', 'CR', 20000.00, 'Scrap', '2025-11-27 17:54:49', '2025-11-27 17:54:49'),
(30, NULL, '2025-11-27', '2526DP0', 'CR', 50000.00, 'Investment', '2025-11-27 17:55:05', '2025-11-27 17:55:05'),
(31, 3, '2025-11-28', '2526DP3', 'CR', 1840.00, 'Weekly collection', '2025-11-28 17:53:49', '2025-11-28 17:53:49'),
(32, 5, '2025-11-29', '2526DP5', 'CR', 1100.00, 'Weekly collection', '2025-11-29 17:28:00', '2025-11-29 17:28:00'),
(33, 5, '2025-11-29', '2526DP5', 'CR', 400.00, 'Weekly collection', '2025-11-29 17:28:16', '2025-11-29 17:28:16'),
(34, 2, '2025-12-02', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-12-02 17:48:08', '2025-12-02 17:48:08'),
(35, 7, '2025-12-03', '2526DP7', 'CR', 4800.00, 'Sale', '2025-12-03 12:52:07', '2025-12-03 12:52:07'),
(36, 6, '2025-12-03', '2526DP6', 'CR', 1670.00, 'Weekly collection', '2025-12-03 17:39:15', '2025-12-03 17:39:15'),
(37, 3, '2025-12-05', '2526DP3', 'CR', 1840.00, 'Weekly collection', '2025-12-05 17:39:05', '2025-12-05 17:39:05'),
(38, 8, '2025-12-06', '2526DP8', 'CR', 11000.00, 'Sale', '2025-12-06 16:02:26', '2025-12-06 16:02:26'),
(39, 5, '2025-12-06', '2526DP5', 'CR', 1500.00, 'Weekly collection', '2025-12-06 17:16:10', '2025-12-06 17:16:10'),
(40, 2, '2025-12-09', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-12-09 17:24:31', '2025-12-09 17:24:31'),
(41, 6, '2025-12-10', '2526DP6', 'CR', 1670.00, 'Weekly collection', '2025-12-10 18:03:18', '2025-12-10 18:03:18'),
(42, 7, '2025-12-10', '2526DP7', 'CR', 1675.00, 'Weekly collection', '2025-12-10 18:03:36', '2025-12-10 18:03:36'),
(43, 3, '2025-12-12', '2526DP3', 'CR', 1840.00, 'Weekly collection', '2025-12-12 18:08:32', '2025-12-12 18:08:32'),
(44, 5, '2025-12-13', '2526DP5', 'CR', 600.00, 'Weekly collection', '2025-12-13 19:25:26', '2025-12-13 19:25:26'),
(45, 5, '2025-12-13', '2526DP5', 'DR', 200.00, 'Non-payment penalty', '2025-12-13 19:25:54', '2025-12-13 19:25:54'),
(46, 5, '2025-12-13', '2526DP5', 'DR', 195.32, 'Late payment penalty (1%)', '2025-12-13 19:26:09', '2025-12-13 19:26:09'),
(47, 8, '2025-12-13', '2526DP8', 'CR', 1625.00, 'Weekly collection', '2025-12-13 19:26:51', '2025-12-13 19:26:51'),
(48, 5, '2025-12-14', '2526DP5', 'CR', 700.00, 'Weekly collection', '2025-12-14 17:46:40', '2025-12-14 17:46:40'),
(49, 5, '2025-12-15', '2526DP5', 'CR', 200.00, 'Weekly collection', '2025-12-15 16:46:49', '2025-12-15 16:46:49'),
(50, 2, '2025-12-16', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-12-16 17:30:09', '2025-12-16 17:30:09'),
(51, 6, '2025-12-17', '2526DP6', 'CR', 1670.00, 'Weekly collection', '2025-12-17 18:31:42', '2025-12-17 18:31:42'),
(52, 7, '2025-12-17', '2526DP7', 'CR', 1675.00, 'Weekly collection', '2025-12-17 18:32:14', '2025-12-17 18:32:14'),
(53, 3, '2025-12-19', '2526DP3', 'CR', 1840.00, 'Weekly collection', '2025-12-19 18:41:20', '2025-12-19 18:41:20'),
(54, 5, '2025-12-20', '2526DP5', 'CR', 450.00, 'Weekly collection', '2025-12-20 22:06:39', '2025-12-20 22:06:39'),
(55, 5, '2025-12-20', '2526DP5', 'DR', 200.00, 'Non-payment penalty', '2025-12-20 22:06:53', '2025-12-20 22:06:53'),
(56, 5, '2025-12-20', '2526DP5', 'DR', 185.77, 'Late payment penalty (1%)', '2025-12-20 22:07:07', '2025-12-20 22:07:07'),
(57, 8, '2025-12-20', '2526DP8', 'CR', 1625.00, 'Weekly collection', '2025-12-20 22:07:37', '2025-12-20 22:07:37'),
(58, 5, '2025-12-21', '2526DP5', 'CR', 1050.00, 'Weekly collection', '2025-12-21 22:15:30', '2025-12-21 22:15:30'),
(59, 2, '2025-12-23', '2526DP2', 'CR', 1440.00, 'Weekly collection', '2025-12-23 17:09:24', '2025-12-23 17:09:24'),
(60, 6, '2025-12-24', '2526DP6', 'CR', 1670.00, 'Weekly collection', '2025-12-24 18:13:34', '2025-12-24 18:13:34'),
(61, 7, '2025-12-24', '2526DP7', 'CR', 1675.00, 'Weekly collection', '2025-12-24 18:13:55', '2025-12-24 18:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `sale_date` date NOT NULL,
  `closure_date` date NOT NULL,
  `weekly_installment_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `billed_amount` decimal(12,2) NOT NULL,
  `cash_payment` decimal(12,2) NOT NULL DEFAULT 0.00,
  `online_payment` decimal(12,2) NOT NULL DEFAULT 0.00,
  `scrap_value` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_payment` decimal(12,2) NOT NULL,
  `financed_amount` decimal(12,2) NOT NULL,
  `finance_period_weeks` int(10) UNSIGNED NOT NULL,
  `weekly_installment_amount` decimal(12,2) NOT NULL,
  `weekly_skipped_installments` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `non_payment_penalty` decimal(12,2) NOT NULL DEFAULT 0.00,
  `late_payment_penalty` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_amount_collected` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_amount_remaining` decimal(12,2) NOT NULL DEFAULT 0.00,
  `consecutive_missed_weeks` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `customer_id`, `invoice_number`, `sale_date`, `closure_date`, `weekly_installment_day`, `billed_amount`, `cash_payment`, `online_payment`, `scrap_value`, `total_payment`, `financed_amount`, `finance_period_weeks`, `weekly_installment_amount`, `weekly_skipped_installments`, `non_payment_penalty`, `late_payment_penalty`, `total_amount_collected`, `total_amount_remaining`, `consecutive_missed_weeks`, `created_at`, `updated_at`) VALUES
(1, 1, '2526DP1', '2025-10-11', '2025-11-08', 'Saturday', 11500.00, 2000.00, 0.00, 3000.00, 5000.00, 6500.00, 4, 1625.00, 0, 0.00, 0.00, 6500.00, 0.00, 0, '2025-10-20 16:27:02', '2025-11-06 17:34:13'),
(2, 2, '2526DP2', '2025-10-14', '2026-02-03', 'Tuesday', 46000.00, 11000.00, 0.00, 12000.00, 23000.00, 23000.00, 16, 1437.50, 0, 0.00, 0.00, 14400.00, 8600.00, 0, '2025-10-20 16:36:31', '2025-12-23 17:09:24'),
(3, 3, '2526DP3', '2025-11-14', '2026-02-06', 'Friday', 36000.00, 5000.00, 0.00, 9000.00, 14000.00, 22000.00, 12, 1833.33, 0, 0.00, 0.00, 9200.00, 12800.00, 0, '2025-11-14 12:38:43', '2025-12-19 18:41:20'),
(4, 4, '2526DP4', '2025-11-15', '2025-11-15', 'Saturday', 10500.00, 7500.00, 0.00, 3000.00, 10500.00, 0.00, 4, 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0, '2025-11-15 15:34:29', '2025-11-15 15:34:29'),
(5, 5, '2526DP5', '2025-11-15', '2026-03-07', 'Saturday', 46000.00, 3000.00, 7000.00, 12000.00, 22000.00, 24000.00, 16, 1500.00, 3, 600.00, 613.09, 7500.00, 17713.09, 0, '2025-11-15 15:51:35', '2025-12-21 22:15:30'),
(6, 6, '2526DP6', '2025-11-26', '2026-02-18', 'Wednesday', 36000.00, 7000.00, 0.00, 9000.00, 16000.00, 20000.00, 12, 1666.67, 0, 0.00, 0.00, 6680.00, 13320.00, 0, '2025-11-26 12:43:48', '2025-12-24 18:13:34'),
(7, 7, '2526DP7', '2025-12-03', '2025-12-31', 'Wednesday', 11500.00, 4800.00, 0.00, 0.00, 4800.00, 6700.00, 4, 1675.00, 0, 0.00, 0.00, 5025.00, 1675.00, 0, '2025-12-03 12:52:07', '2025-12-24 18:13:55'),
(8, 8, '2526DP8', '2025-12-06', '2026-03-28', 'Saturday', 46000.00, 5000.00, 6000.00, 9000.00, 20000.00, 26000.00, 16, 1625.00, 0, 0.00, 0.00, 3250.00, 22750.00, 0, '2025-12-06 16:02:26', '2025-12-20 22:07:37');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_02_000000_create_customers_table', 1),
(5, '2025_01_02_000100_create_loans_table', 1),
(6, '2025_01_02_000200_create_payments_table', 1),
(7, '2025_01_02_000300_create_ledger_entries_table', 1),
(8, '2025_01_02_000400_create_notifications_table', 1),
(9, '2025_08_31_090156_create_permission_tables', 2),
(10, '2025_09_06_034847_create_expenses_table', 3),
(11, '2025_09_06_210438_create_cash_holdings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `loan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_date` date NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `posted_at` date NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `mode` varchar(32) DEFAULT NULL,
  `is_late` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `loan_id`, `due_date`, `posted_at`, `amount`, `mode`, `is_late`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-10-20', '2025-10-20', 1640.00, 'Cash', 0, '2025-10-20 16:37:14', '2025-10-20 16:37:14'),
(2, 2, '2025-10-21', '2025-10-21', 1440.00, 'Online', 0, '2025-10-21 19:41:22', '2025-10-21 19:41:22'),
(3, 1, '2025-10-25', '2025-10-25', 1640.00, 'Cash', 0, '2025-10-25 21:55:04', '2025-10-25 21:55:04'),
(4, 2, '2025-10-28', '2025-10-28', 1440.00, 'Online', 0, '2025-10-28 17:11:46', '2025-10-28 17:11:46'),
(5, 1, '2025-11-01', '2025-11-01', 1640.00, 'Cash', 0, '2025-11-01 17:43:48', '2025-11-01 17:43:48'),
(6, 2, '2025-11-04', '2025-11-04', 1440.00, 'Online', 0, '2025-11-04 17:48:05', '2025-11-04 17:48:05'),
(7, 1, '2025-11-06', '2025-11-06', 1580.00, 'Cash', 0, '2025-11-06 17:34:13', '2025-11-06 17:34:13'),
(8, 2, '2025-11-11', '2025-11-11', 1440.00, 'Online', 0, '2025-11-11 17:40:04', '2025-11-11 17:40:04'),
(9, 2, '2025-11-18', '2025-11-18', 1440.00, 'Online', 0, '2025-11-18 20:03:18', '2025-11-18 20:03:18'),
(10, 3, '2025-11-21', '2025-11-21', 1840.00, 'Cash', 0, '2025-11-21 17:28:25', '2025-11-21 17:28:25'),
(11, 5, '2025-11-22', '2025-11-22', 1000.00, 'Online', 0, '2025-11-22 21:30:53', '2025-11-22 21:30:53'),
(12, 5, '2025-11-23', '2025-11-23', 500.00, 'Online', 0, '2025-11-23 17:25:31', '2025-11-23 17:25:31'),
(13, 2, '2025-11-25', '2025-11-25', 1440.00, 'Online', 0, '2025-11-25 21:06:08', '2025-11-25 21:06:08'),
(14, 3, '2025-11-28', '2025-11-28', 1840.00, 'Cash', 0, '2025-11-28 17:53:49', '2025-11-28 17:53:49'),
(15, 5, '2025-11-29', '2025-11-29', 1100.00, 'Cash', 0, '2025-11-29 17:28:00', '2025-11-29 17:28:00'),
(16, 5, '2025-11-29', '2025-11-29', 400.00, 'Online', 0, '2025-11-29 17:28:16', '2025-11-29 17:28:16'),
(17, 2, '2025-12-02', '2025-12-02', 1440.00, 'Online', 0, '2025-12-02 17:48:08', '2025-12-02 17:48:08'),
(18, 6, '2025-12-03', '2025-12-03', 1670.00, 'Cash', 0, '2025-12-03 17:39:15', '2025-12-03 17:39:15'),
(19, 3, '2025-12-05', '2025-12-05', 1840.00, 'Cash', 0, '2025-12-05 17:39:05', '2025-12-05 17:39:05'),
(20, 5, '2025-12-06', '2025-12-06', 1500.00, 'Cash', 0, '2025-12-06 17:16:10', '2025-12-06 17:16:10'),
(21, 2, '2025-12-09', '2025-12-09', 1440.00, 'Online', 0, '2025-12-09 17:24:31', '2025-12-09 17:24:31'),
(22, 6, '2025-12-10', '2025-12-10', 1670.00, 'Cash', 0, '2025-12-10 18:03:18', '2025-12-10 18:03:18'),
(23, 7, '2025-12-10', '2025-12-10', 1675.00, 'Cash', 0, '2025-12-10 18:03:36', '2025-12-10 18:03:36'),
(24, 3, '2025-12-12', '2025-12-12', 1840.00, 'Cash', 0, '2025-12-12 18:08:32', '2025-12-12 18:08:32'),
(25, 5, '2025-12-13', '2025-12-13', 600.00, 'Cash', 0, '2025-12-13 19:25:26', '2025-12-13 19:25:26'),
(26, 8, '2025-12-13', '2025-12-13', 1625.00, 'Cash', 0, '2025-12-13 19:26:51', '2025-12-13 19:26:51'),
(27, 5, '2025-12-14', '2025-12-14', 700.00, 'Cash', 0, '2025-12-14 17:46:40', '2025-12-14 17:46:40'),
(28, 5, '2025-12-15', '2025-12-15', 200.00, 'Cash', 0, '2025-12-15 16:46:49', '2025-12-15 16:46:49'),
(29, 2, '2025-12-16', '2025-12-16', 1440.00, 'Online', 0, '2025-12-16 17:30:09', '2025-12-16 17:30:09'),
(30, 6, '2025-12-17', '2025-12-17', 1670.00, 'Cash', 0, '2025-12-17 18:31:42', '2025-12-17 18:31:42'),
(31, 7, '2025-12-17', '2025-12-17', 1675.00, 'Cash', 0, '2025-12-17 18:32:14', '2025-12-17 18:32:14'),
(32, 3, '2025-12-19', '2025-12-19', 1840.00, 'Online', 0, '2025-12-19 18:41:20', '2025-12-19 18:41:20'),
(33, 5, '2025-12-20', '2025-12-20', 450.00, 'Cash', 0, '2025-12-20 22:06:39', '2025-12-20 22:06:39'),
(34, 8, '2025-12-20', '2025-12-20', 1625.00, 'Cash', 0, '2025-12-20 22:07:37', '2025-12-20 22:07:37'),
(35, 5, '2025-12-21', '2025-12-21', 1050.00, 'Online', 0, '2025-12-21 22:15:30', '2025-12-21 22:15:30'),
(36, 2, '2025-12-23', '2025-12-23', 1440.00, 'Online', 0, '2025-12-23 17:09:24', '2025-12-23 17:09:24'),
(37, 6, '2025-12-24', '2025-12-24', 1670.00, 'Cash', 0, '2025-12-24 18:13:34', '2025-12-24 18:13:34'),
(38, 7, '2025-12-24', '2025-12-24', 1675.00, 'Cash', 0, '2025-12-24 18:13:55', '2025-12-24 18:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create loan', 'web', '2025-08-31 04:24:11', '2025-09-01 16:00:03'),
(2, 'edit loan', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(3, 'delete loan', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(4, 'view loan', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(5, 'view role', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(6, 'edit role', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(7, 'create role', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(8, 'delete role', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(9, 'view permission', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(10, 'create permission', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(11, 'edit permission', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(12, 'delete permission', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE `prospects` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_name` varchar(64) NOT NULL,
  `locality` varchar(128) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `alt_contact_no` varchar(10) DEFAULT NULL,
  `requirement` varchar(255) NOT NULL,
  `mode` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(2, 'admin', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11'),
(3, 'user', 'web', '2025-08-31 04:24:11', '2025-08-31 04:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aLIJ75zMeZYBnRHhZzEvjzmkHGsQupzvh97dVtIV', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZWVNUE40cFQ4Y2dxdnlkWWJTTnBoZ21pVmNrQnJyRDNDTU05NkwzSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2Fucy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1760789864),
('JqjIRmkjqFpGonhvxRzPwZIIuuiE522onfGbz8HC', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaW9DVGVBdFlwME5TT1ZBWW1DcGh3VXpHaE44a3NpVmZWM0hZdmJkUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXktYWN0aW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1759831731);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'super@rao.local', NULL, '$2y$12$NAzqHxyUe0nZf.qyXkkBguNrLPUzLUivkcRtaY1aHk8Deq6EaEoe2', 'QuGlwbIIkAjBSUktBbMVTvwDSuPOqzGn3lzZsKpVSd4Eo7IbEJo2ezhTiL95', '2025-08-31 03:09:46', '2025-08-31 03:09:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cash_holdings`
--
ALTER TABLE `cash_holdings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_holdings_created_by_foreign` (`created_by`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledger_entries_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cash_holdings`
--
ALTER TABLE `cash_holdings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_holdings`
--
ALTER TABLE `cash_holdings`
  ADD CONSTRAINT `cash_holdings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  ADD CONSTRAINT `ledger_entries_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

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
