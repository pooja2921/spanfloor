-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 02, 2022 at 02:57 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spanfloor`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2022-04-26 15:00:40', '2022-04-27 08:06:43'),
(2, 'testsss', '2022-04-26 15:08:01', '2022-05-01 21:44:24'),
(3, 'color', '2022-04-26 21:00:29', '2022-04-26 21:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `left` int(11) DEFAULT NULL,
  `right` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_lft_index` (`left`),
  KEY `categories_rgt_index` (`right`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `user_id`, `parent_id`, `left`, `right`, `depth`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Creative Collection', 'Creative-Collection', 'Item', 3, NULL, 39, 40, 0, NULL, '2021-12-23 14:44:13', '2022-04-24 22:10:07'),
(3, 'Solidwood Floors', 'Solidwood-Floors', 'Item', 3, NULL, 33, 36, 0, NULL, '2021-12-23 14:43:19', '2022-04-24 22:10:07'),
(2, 'Engineered Floors', 'Engineered-Floors', 'Item', 3, NULL, 37, 38, 0, NULL, '2021-12-23 14:43:47', '2022-04-24 22:10:07'),
(1, 'Laminate Floors', 'Laminate Floors', 'Item', 3, NULL, 1, 32, 0, NULL, '2021-12-23 14:41:44', '2022-04-25 13:19:23'),
(23, 'maincategory', 'maincategory', 'Item', NULL, 0, 41, 42, NULL, '165094176676130261.jpg', '2022-04-26 06:56:06', '2022-04-26 06:56:06'),
(24, 'maincatss', 'maincatss', 'Item', NULL, NULL, 43, 44, NULL, '1650942901628670573.jpg', '2022-04-26 06:58:49', '2022-04-26 07:15:01'),
(7, 'Airtight Tones', 'Airtight-Tones', 'Item', NULL, 1, 2, 21, 1, NULL, '2022-04-21 16:12:32', '2022-04-24 22:10:07'),
(8, 'Medium Natural Tones', 'Medium-Natural- Tones', 'Item', NULL, 1, 22, 27, 1, NULL, '2022-04-21 16:53:52', '2022-04-24 22:10:07'),
(9, 'childtestdemo', 'childtestdemo', 'Item', NULL, 8, 23, 26, 2, NULL, '2022-04-21 17:29:29', '2022-04-24 22:10:07'),
(10, 'child', 'child', 'Item', NULL, 7, 24, 25, 3, '16505992771325556222.jpg', '2022-04-22 07:47:57', '2022-04-24 22:10:07'),
(11, 'testing childs', 'testing childs', 'Item', NULL, 3, 34, 35, 1, '1650602918815844261.jpg', '2022-04-22 08:48:38', '2022-04-24 22:10:07'),
(12, 'Earthy Brown Tones', 'tests', 'Item', NULL, 1, 28, 29, 1, NULL, '2022-04-22 14:48:03', '2022-04-24 22:10:07'),
(13, 'Classic Planks', 'subchild', 'Item', NULL, 7, 3, 12, 2, '16506250391652259722.jpg', '2022-04-22 14:57:19', '2022-04-24 22:10:07'),
(14, 'White,Grey & Black Tones', 'childcattest', 'Item', NULL, 1, 30, 31, 1, '16508197121941657833.jpg', '2022-04-24 21:01:52', '2022-04-24 22:10:07'),
(15, 'Fashionable Herringbones and Chevron', 'Fashionable Herringbones and Chevron', 'Item', NULL, 7, 19, 20, 2, '1650867255561732045.jpg', '2022-04-24 22:01:04', '2022-04-25 10:23:35'),
(16, 'Earthy Brown Tones', 'Earthy Brown Tones', 'Item', NULL, 7, 13, 14, 2, NULL, '2022-04-24 22:03:16', '2022-04-25 10:10:58'),
(17, 'White, Grey & Black Tones', ' Grey & Black Tones', 'Item', NULL, 7, 15, 16, 2, NULL, '2022-04-24 22:03:50', '2022-04-25 15:01:39'),
(19, '34077 Hickory kansas', '34077 Hickory kansas', 'Item', NULL, 13, 4, 5, 3, NULL, '2022-04-24 22:04:58', '2022-04-24 22:04:58'),
(20, '34480 Hickory kansas', '34480 Hickory kansas', 'Item', NULL, 13, 6, 7, 3, NULL, '2022-04-24 22:05:32', '2022-04-24 22:05:32'),
(21, 'Oak Frersco Lodge', 'Oak Frersco Lodge', 'Item', NULL, 13, 8, 9, 3, NULL, '2022-04-24 22:07:14', '2022-04-24 22:07:15'),
(22, 'R-471 Antartica Sapphire', 'R-471 Antartica Sapphire', 'Item', NULL, 13, 10, 11, 3, NULL, '2022-04-24 22:10:07', '2022-04-24 22:10:07'),
(31, 'parentcat', 'parentcat', 'Item', NULL, 0, 50, 51, NULL, '16509432601239752602.jpg', '2022-04-26 07:21:01', '2022-04-26 07:21:01'),
(30, 'subcategories', 'subcategories', 'Item', NULL, 28, 47, 48, 2, '16509427572105085701.jpg', '2022-04-26 07:11:29', '2022-04-26 07:12:37'),
(32, 'catparent', 'catparent', 'Item', NULL, 0, 52, 53, NULL, '16509436781585358667.jpeg', '2022-04-26 07:27:58', '2022-04-26 07:27:58'),
(28, 'subcategory', 'subcategory', 'Item', NULL, 6, 46, 49, 1, '1650942849990655103.jpg', '2022-04-26 07:09:49', '2022-04-26 07:14:09'),
(33, 'parentc', 'pp', 'Item', NULL, NULL, 54, 55, 0, NULL, '2022-04-26 07:30:10', '2022-04-26 07:30:10'),
(35, 'pcategory', 'pc', 'Item', NULL, NULL, 56, 61, 0, '16509438781533222210.jpg', '2022-04-26 07:31:18', '2022-04-26 07:32:57'),
(36, 'subcat', 'sc', 'item', NULL, 35, 57, 60, 1, '16509439311388941181.jpg', '2022-04-26 07:32:11', '2022-04-26 07:32:57'),
(37, 'ssc', 'ssc', 'item', NULL, 36, 58, 59, 2, '1650943977640177637.jpg', '2022-04-26 07:32:57', '2022-04-26 07:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant_option` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `user_id`, `description`, `category_id`, `subcategory_id`, `childcategory_id`, `price`, `available`, `image`, `variant_option`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', NULL, NULL, '2022-04-26 12:04:42', '2022-04-26 12:04:42'),
(2, 'test', NULL, '<p>lorem <b>ipsum</b></p>', 1, 7, 13, '100', '500 sq feet', '16509623131060645865.jpg', NULL, '2022-04-26 12:38:33', '2022-04-26 12:38:33'),
(3, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '1650962848152920065.jpg', NULL, '2022-04-26 12:47:28', '2022-04-26 12:47:28'),
(4, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '16509629152068298583.jpg', NULL, '2022-04-26 12:48:35', '2022-04-26 12:48:35'),
(5, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '1650962943885884444.jpg', NULL, '2022-04-26 12:49:03', '2022-04-26 12:49:03'),
(6, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '1650963032288701081.jpg', NULL, '2022-04-26 12:50:32', '2022-04-26 12:50:32'),
(7, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '16509633961236046428.jpg', NULL, '2022-04-26 12:56:36', '2022-04-26 12:56:36'),
(9, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '165096689862276291.jpg', NULL, '2022-04-26 13:54:59', '2022-04-26 13:54:59'),
(10, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '16509669181767689680.jpg', NULL, '2022-04-26 13:55:18', '2022-04-26 13:55:18'),
(11, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '16509669302057531199.jpg', NULL, '2022-04-26 13:55:30', '2022-04-26 13:55:30'),
(12, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '16509669391696970558.jpg', NULL, '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(13, 'demo', NULL, '<p>lorem ipsum</p>', 1, 7, 13, '100', '100 sq feet', '1650968655743190329.jpg', NULL, '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(14, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510561221615656178.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:42:02', '2022-04-27 14:42:02'),
(15, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510561721317160970.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:42:52', '2022-04-27 14:42:52'),
(16, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '1651056189152944942.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:43:09', '2022-04-27 14:43:09'),
(17, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '1651056209762123228.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:43:29', '2022-04-27 14:43:29'),
(18, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510562431123601065.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:44:03', '2022-04-27 14:44:03'),
(19, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510562821697838789.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:44:42', '2022-04-27 14:44:42'),
(20, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '1651056304946406572.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:45:04', '2022-04-27 14:45:04'),
(21, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510563361436565210.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:45:36', '2022-04-27 14:45:36'),
(22, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510563461715355451.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:45:46', '2022-04-27 14:45:46'),
(23, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510563561839478523.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:45:56', '2022-04-27 14:45:56'),
(24, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '1651056368952617001.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:46:08', '2022-04-27 14:46:08'),
(25, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510564031347842623.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 14:46:43', '2022-04-27 14:46:43'),
(26, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510577001072975424.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 15:08:20', '2022-04-27 15:08:20'),
(27, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '1651057762847658421.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 15:09:22', '2022-04-27 15:09:22'),
(28, 'test', NULL, '<p>lorem ipsumss</p>', 1, 7, 13, NULL, '6000 sq feet', '16510761602081707229.jpg', '[{\"value\":[{\"value\":\"L\"},{\"value\":\"M\"}],\"type\":\"1\"}]', '2022-04-27 15:12:59', '2022-04-28 07:40:40'),
(29, 'test', NULL, '<p>lorem ipsum</p>', 1, 7, 13, NULL, '6000 sq feet', '16510580051475220386.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 15:13:25', '2022-04-27 15:13:25'),
(33, 'test', NULL, '<p>testings</p>', 1, NULL, 13, NULL, '5000 sq feet', '1651118616107530101.jpg', '[{\"value\":[{\"value\":\"L\"},{\"value\":\"M\"}],\"type\":\"1\"},{\"value\":[{\"value\":\"black\"},{\"value\":\"white\"}],\"type\":\"3\"}]', '2022-04-28 07:50:08', '2022-04-28 08:03:36'),
(30, 'rgtrdtr', NULL, NULL, NULL, NULL, NULL, NULL, '600', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 21:37:31', '2022-04-27 21:37:31'),
(31, 'rgtrdtr', NULL, NULL, NULL, NULL, NULL, NULL, '600', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 21:37:54', '2022-04-27 21:37:54'),
(32, 'rgtrdtr', NULL, NULL, NULL, NULL, NULL, NULL, '600', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-27 21:40:00', '2022-04-27 21:40:00'),
(34, 'test', NULL, '<p>lorem</p>', 1, NULL, NULL, NULL, '5600 sq feet', '16511660191133639446.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:13:39', '2022-04-28 21:13:39'),
(35, 'test', NULL, '<p>lorem</p>', 1, NULL, NULL, NULL, '5600 sq feet', '16511660321399769415.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:13:52', '2022-04-28 21:13:52'),
(36, 'test', NULL, '<p>lorem</p>', 1, NULL, NULL, NULL, '5600 sq feet', '1651166099155468004.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:14:59', '2022-04-28 21:14:59'),
(37, 'test', NULL, '<p>lorem</p>', 1, NULL, NULL, NULL, '5600 sq feet', '16511663561621171755.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:19:16', '2022-04-28 21:19:16'),
(38, 'test', NULL, '<p>lorem</p>', 1, NULL, NULL, NULL, '5600 sq feet', '1651166377804190960.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:19:37', '2022-04-28 21:19:37'),
(39, 'testing', NULL, '<p>gbdfbhgfh</p>', 1, 7, 13, NULL, '4560', '16511665202104764428.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:22:00', '2022-04-28 21:22:00'),
(40, 'test', NULL, '<p>dfvdgdfgd</p>', 1, 7, 13, NULL, '4334', '16511666521084105003.jpg', '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:24:12', '2022-04-28 21:24:12'),
(41, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:25:55', '2022-04-28 21:25:55'),
(42, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:26:19', '2022-04-28 21:26:19'),
(43, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:26:30', '2022-04-28 21:26:30'),
(44, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:26:51', '2022-04-28 21:26:51'),
(45, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:27:03', '2022-04-28 21:27:03'),
(46, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:03', '2022-04-28 21:28:03'),
(47, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:13', '2022-04-28 21:28:13'),
(48, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:22', '2022-04-28 21:28:22'),
(49, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:33', '2022-04-28 21:28:33'),
(50, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:45', '2022-04-28 21:28:45'),
(51, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:28:55', '2022-04-28 21:28:55'),
(52, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:30:09', '2022-04-28 21:30:09'),
(53, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:30:36', '2022-04-28 21:30:36'),
(54, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:30:56', '2022-04-28 21:30:56'),
(55, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:31:04', '2022-04-28 21:31:04'),
(56, 'test', NULL, '<p>dgdfg</p>', 1, 7, 13, NULL, '354353', NULL, '[{\"value\":[{\"value\":\"L\"}],\"type\":\"1\"}]', '2022-04-28 21:31:14', '2022-04-28 21:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
CREATE TABLE IF NOT EXISTS `item_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `sale_price` double(8,2) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`id`, `item_id`, `variant`, `quantity`, `price`, `sale_price`, `sku`, `image`, `created_at`, `updated_at`) VALUES
(2, 29, NULL, 0, 100.00, 10.00, '11', NULL, '2022-04-27 15:13:25', '2022-04-27 15:13:25'),
(29, 33, 'L/white', 2570, 4580.00, 10.00, '52258', NULL, '2022-04-28 08:03:36', '2022-04-28 08:03:36'),
(13, 28, 'M', NULL, NULL, NULL, '50437760', NULL, '2022-04-28 07:40:40', '2022-04-28 07:40:40'),
(12, 28, 'L', NULL, NULL, NULL, '98259756', NULL, '2022-04-28 07:40:40', '2022-04-28 07:40:40'),
(8, 32, 'L', NULL, NULL, NULL, '96885850', NULL, '2022-04-27 21:40:00', '2022-04-27 21:40:00'),
(28, 33, 'M/black', 1000, 1500.00, 8.00, '69774839', NULL, '2022-04-28 08:03:36', '2022-04-28 08:03:36'),
(26, 33, 'L/black', 1000, 1000.00, 5.00, '125896', NULL, '2022-04-28 08:03:36', '2022-04-28 08:03:36'),
(27, 33, 'M/white', 2450, 7587.00, 12.00, '425452', NULL, '2022-04-28 08:03:36', '2022-04-28 08:03:36'),
(30, 55, 'L', 150, 142.00, NULL, '1415', '16511670641080951279.jpg', '2022-04-28 21:31:04', '2022-04-28 21:31:04'),
(31, 56, 'L', 150, 142.00, NULL, '1415', '16511670742071076981.jpg', '2022-04-28 21:31:14', '2022-04-28 21:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

DROP TABLE IF EXISTS `item_images`;
CREATE TABLE IF NOT EXISTS `item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_images`
--

INSERT INTO `item_images` (`id`, `item_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 12, '16509669391223458827.jpg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(2, 12, '1650966939904261052.jpg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(3, 12, '1650966939491148389.jpg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(4, 12, '16509669391127356968.jpeg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(5, 12, '1650966939449229533.jpg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(6, 12, '16509669391220521267.jpg', '2022-04-26 13:55:39', '2022-04-26 13:55:39'),
(7, 13, '16509686551120101605.jpg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(8, 13, '16509686551756186346.jpg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(9, 13, '1650968655908664886.jpg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(10, 13, '16509686551443814201.jpeg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(11, 13, '1650968655128859605.jpg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(12, 13, '1650968655390561106.jpg', '2022-04-26 14:24:15', '2022-04-26 14:24:15'),
(13, 15, '16510561721602480007.jpg', '2022-04-27 14:42:52', '2022-04-27 14:42:52'),
(14, 15, '1651056172980474125.jpg', '2022-04-27 14:42:52', '2022-04-27 14:42:52'),
(15, 15, '1651056172321444801.jpg', '2022-04-27 14:42:52', '2022-04-27 14:42:52'),
(16, 16, '16510561891082718513.jpg', '2022-04-27 14:43:09', '2022-04-27 14:43:09'),
(17, 16, '165105618999014468.jpg', '2022-04-27 14:43:09', '2022-04-27 14:43:09'),
(18, 16, '16510561891013073672.jpg', '2022-04-27 14:43:09', '2022-04-27 14:43:09'),
(19, 17, '16510562091584374618.jpg', '2022-04-27 14:43:29', '2022-04-27 14:43:29'),
(20, 17, '1651056209630484243.jpg', '2022-04-27 14:43:29', '2022-04-27 14:43:29'),
(21, 17, '165105620932059178.jpg', '2022-04-27 14:43:29', '2022-04-27 14:43:29'),
(22, 18, '1651056243826057264.jpg', '2022-04-27 14:44:03', '2022-04-27 14:44:03'),
(23, 18, '1651056243682342090.jpg', '2022-04-27 14:44:03', '2022-04-27 14:44:03'),
(24, 18, '16510562431237224817.jpg', '2022-04-27 14:44:03', '2022-04-27 14:44:03'),
(25, 19, '16510562821449663252.jpg', '2022-04-27 14:44:42', '2022-04-27 14:44:42'),
(26, 19, '1651056282304768899.jpg', '2022-04-27 14:44:42', '2022-04-27 14:44:42'),
(27, 19, '16510562822016539218.jpg', '2022-04-27 14:44:42', '2022-04-27 14:44:42'),
(28, 20, '16510563041662954201.jpg', '2022-04-27 14:45:04', '2022-04-27 14:45:04'),
(29, 20, '16510563041379992318.jpg', '2022-04-27 14:45:04', '2022-04-27 14:45:04'),
(30, 20, '1651056304984004067.jpg', '2022-04-27 14:45:04', '2022-04-27 14:45:04'),
(31, 21, '1651056336536736641.jpg', '2022-04-27 14:45:36', '2022-04-27 14:45:36'),
(32, 21, '16510563361590940868.jpg', '2022-04-27 14:45:36', '2022-04-27 14:45:36'),
(33, 21, '16510563361738383538.jpg', '2022-04-27 14:45:36', '2022-04-27 14:45:36'),
(34, 22, '16510563461381081990.jpg', '2022-04-27 14:45:46', '2022-04-27 14:45:46'),
(35, 22, '16510563462138996542.jpg', '2022-04-27 14:45:46', '2022-04-27 14:45:46'),
(36, 22, '16510563461154031090.jpg', '2022-04-27 14:45:46', '2022-04-27 14:45:46'),
(37, 23, '1651056356383343813.jpg', '2022-04-27 14:45:56', '2022-04-27 14:45:56'),
(38, 23, '1651056356442019903.jpg', '2022-04-27 14:45:56', '2022-04-27 14:45:56'),
(39, 23, '16510563562114394062.jpg', '2022-04-27 14:45:56', '2022-04-27 14:45:56'),
(40, 24, '1651056368767074676.jpg', '2022-04-27 14:46:08', '2022-04-27 14:46:08'),
(41, 24, '1651056368394701393.jpg', '2022-04-27 14:46:08', '2022-04-27 14:46:08'),
(42, 24, '16510563681878038136.jpg', '2022-04-27 14:46:08', '2022-04-27 14:46:08'),
(43, 25, '1651056403611597091.jpg', '2022-04-27 14:46:43', '2022-04-27 14:46:43'),
(44, 25, '1651056403658390318.jpg', '2022-04-27 14:46:43', '2022-04-27 14:46:43'),
(45, 25, '1651056403968171807.jpg', '2022-04-27 14:46:43', '2022-04-27 14:46:43'),
(46, 26, '1651057700218364420.jpg', '2022-04-27 15:08:20', '2022-04-27 15:08:20'),
(47, 26, '16510577001446281603.jpg', '2022-04-27 15:08:20', '2022-04-27 15:08:20'),
(48, 26, '1651057700810139331.jpg', '2022-04-27 15:08:20', '2022-04-27 15:08:20'),
(49, 27, '1651057762888569701.jpg', '2022-04-27 15:09:22', '2022-04-27 15:09:22'),
(50, 27, '1651057762381870223.jpg', '2022-04-27 15:09:22', '2022-04-27 15:09:22'),
(51, 27, '16510577621857158455.jpg', '2022-04-27 15:09:22', '2022-04-27 15:09:22'),
(52, 28, '1651057979181511162.jpg', '2022-04-27 15:12:59', '2022-04-27 15:12:59'),
(53, 28, '16510579792056793081.jpg', '2022-04-27 15:12:59', '2022-04-27 15:12:59'),
(54, 28, '165105797949137247.jpg', '2022-04-27 15:12:59', '2022-04-27 15:12:59'),
(55, 29, '1651058005412404877.jpg', '2022-04-27 15:13:25', '2022-04-27 15:13:25'),
(56, 29, '1651058005439205157.jpg', '2022-04-27 15:13:25', '2022-04-27 15:13:25'),
(57, 29, '16510580051226161970.jpg', '2022-04-27 15:13:25', '2022-04-27 15:13:25'),
(58, 33, '1651117808739895261.jpg', '2022-04-28 07:50:08', '2022-04-28 07:50:08'),
(59, 33, '1651117808423617496.jpg', '2022-04-28 07:50:08', '2022-04-28 07:50:08'),
(60, 33, '16511178081327606938.jpg', '2022-04-28 07:50:08', '2022-04-28 07:50:08'),
(61, 33, '16511178841803684861.jpg', '2022-04-28 07:51:24', '2022-04-28 07:51:24'),
(62, 39, '1651166520916248488.jpg', '2022-04-28 21:22:00', '2022-04-28 21:22:00'),
(63, 39, '16511665201722131131.jpg', '2022-04-28 21:22:00', '2022-04-28 21:22:00'),
(64, 40, '16511666521257346229.jpg', '2022-04-28 21:24:12', '2022-04-28 21:24:12'),
(65, 40, '16511666521098092924.jpg', '2022-04-28 21:24:12', '2022-04-28 21:24:12'),
(66, 41, '165116675572918559.jpg', '2022-04-28 21:25:55', '2022-04-28 21:25:55'),
(67, 41, '1651166755182949333.jpg', '2022-04-28 21:25:55', '2022-04-28 21:25:55'),
(68, 42, '1651166779521327499.jpg', '2022-04-28 21:26:19', '2022-04-28 21:26:19'),
(69, 42, '16511667791054062406.jpg', '2022-04-28 21:26:19', '2022-04-28 21:26:19'),
(70, 43, '16511667901942074826.jpg', '2022-04-28 21:26:30', '2022-04-28 21:26:30'),
(71, 43, '1651166790468823650.jpg', '2022-04-28 21:26:30', '2022-04-28 21:26:30'),
(72, 44, '1651166811196356668.jpg', '2022-04-28 21:26:51', '2022-04-28 21:26:51'),
(73, 44, '16511668112086164194.jpg', '2022-04-28 21:26:51', '2022-04-28 21:26:51'),
(74, 45, '16511668232055545888.jpg', '2022-04-28 21:27:03', '2022-04-28 21:27:03'),
(75, 45, '16511668231072204688.jpg', '2022-04-28 21:27:03', '2022-04-28 21:27:03'),
(76, 46, '1651166883258949832.jpg', '2022-04-28 21:28:03', '2022-04-28 21:28:03'),
(77, 46, '1651166883302189184.jpg', '2022-04-28 21:28:03', '2022-04-28 21:28:03'),
(78, 47, '16511668931213146640.jpg', '2022-04-28 21:28:13', '2022-04-28 21:28:13'),
(79, 47, '1651166893180166705.jpg', '2022-04-28 21:28:13', '2022-04-28 21:28:13'),
(80, 48, '1651166902146075673.jpg', '2022-04-28 21:28:22', '2022-04-28 21:28:22'),
(81, 48, '16511669021552224433.jpg', '2022-04-28 21:28:22', '2022-04-28 21:28:22'),
(82, 49, '1651166913307240028.jpg', '2022-04-28 21:28:33', '2022-04-28 21:28:33'),
(83, 49, '16511669131572836544.jpg', '2022-04-28 21:28:33', '2022-04-28 21:28:33'),
(84, 50, '16511669252121517848.jpg', '2022-04-28 21:28:45', '2022-04-28 21:28:45'),
(85, 50, '1651166925277488003.jpg', '2022-04-28 21:28:45', '2022-04-28 21:28:45'),
(86, 51, '16511669351648885047.jpg', '2022-04-28 21:28:55', '2022-04-28 21:28:55'),
(87, 51, '1651166935900940577.jpg', '2022-04-28 21:28:55', '2022-04-28 21:28:55'),
(88, 52, '16511670091982959957.jpg', '2022-04-28 21:30:09', '2022-04-28 21:30:09'),
(89, 52, '1651167009911476254.jpg', '2022-04-28 21:30:09', '2022-04-28 21:30:09'),
(90, 53, '16511670361626387397.jpg', '2022-04-28 21:30:36', '2022-04-28 21:30:36'),
(91, 53, '1651167036425389609.jpg', '2022-04-28 21:30:36', '2022-04-28 21:30:36'),
(92, 54, '1651167056233187392.jpg', '2022-04-28 21:30:56', '2022-04-28 21:30:56'),
(93, 54, '16511670561503258532.jpg', '2022-04-28 21:30:56', '2022-04-28 21:30:56'),
(94, 55, '16511670642136874421.jpg', '2022-04-28 21:31:04', '2022-04-28 21:31:04'),
(95, 55, '16511670641660303684.jpg', '2022-04-28 21:31:04', '2022-04-28 21:31:04'),
(96, 56, '1651167074230607569.jpg', '2022-04-28 21:31:14', '2022-04-28 21:31:14'),
(97, 56, '1651167074784426513.jpg', '2022-04-28 21:31:14', '2022-04-28 21:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_09_135529_create_permission_tables', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_11_09_130815_create_contacts_table', 2),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(10, '2016_06_01_000004_create_oauth_clients_table', 3),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'q3ONqj5rMZjlA8MNrj01GoM1h6wZbGE76rOdul8H', NULL, 'http://localhost', 1, 0, 0, '2022-04-23 14:54:06', '2022-04-23 14:54:06'),
(2, NULL, 'Laravel Password Grant Client', '1l43Vv5ayGpiDI07stjphLG0fq37ccSQi56m6JKp', 'users', 'http://localhost', 0, 1, 0, '2022-04-23 14:54:06', '2022-04-23 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-04-23 14:54:06', '2022-04-23 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'manage_role', 'web', '2020-03-10 12:10:57', '2020-03-10 12:10:57'),
(3, 'manage_permission', 'web', '2020-03-10 12:11:09', '2020-03-10 12:11:09'),
(4, 'manage_user', 'web', '2020-03-10 12:11:41', '2020-03-10 12:11:41'),
(5, 'manage_categories', 'web', '2020-03-12 09:46:39', '2022-04-28 11:59:56'),
(6, 'manage_projects', 'web', '2020-03-12 09:46:54', '2020-03-12 09:46:54'),
(8, 'manager_item', 'web', '2022-04-28 12:01:24', '2022-04-28 12:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2020-03-10 11:40:47', '2020-03-10 11:40:47'),
(2, 'Admin', 'web', '2020-03-10 12:39:23', '2020-03-10 12:39:23'),
(3, 'Project Manager', 'web', '2020-03-12 12:11:50', '2020-03-12 12:11:50'),
(4, 'Categories Manager', 'web', '2020-03-12 12:12:07', '2022-04-28 12:00:25'),
(6, 'test', 'web', '2022-04-24 14:48:08', '2022-04-24 14:48:08'),
(7, 'Item Manager', 'web', '2022-04-28 12:00:46', '2022-04-28 12:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(6, 3),
(5, 4),
(2, 6),
(3, 6),
(4, 6),
(6, 6),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` tinyint(6) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `google_id`, `social_type`, `otp`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@test.com', NULL, NULL, '$2y$10$uZDwEdgAzi3wD4n8oBYfruvBmZJqVV7sSasFRZzlz5Wkqs0EyqiDe', NULL, NULL, NULL, 0, NULL, NULL, '2020-03-12 12:28:44'),
(2, 'Project Manager', 'pm@test.com', NULL, NULL, '$2y$10$rm0yp.fuqPZevIkxlActtuBpMuTHLGwPRYFaNlA5TToZZqx.i7Tra', NULL, NULL, NULL, 0, NULL, '2020-03-12 12:18:59', '2020-03-12 12:18:59'),
(3, 'Sales Manager', 'sm@test.com', NULL, NULL, '$2y$10$40lQm5lnWgtElBwnko7ASuUr.Obu2CI.hPecZ8ZciGsYKkXw2Kf3.', NULL, NULL, NULL, 0, NULL, '2020-03-12 12:20:15', '2020-03-12 12:20:15'),
(4, 'HR', 'hr@test.com', NULL, NULL, '$2y$10$sFgFRrOZS4mzhRlAHbDIie.Kz.G3YSIYynnmcljjxVzyl0gkMQT6a', NULL, NULL, NULL, 0, NULL, '2020-03-12 12:25:25', '2020-03-12 12:25:25'),
(5, 'admin', 'admin@admin.com', NULL, NULL, '$2y$10$i314F6xq5IWc7SIi7z79BOLFCrymqtTAuIO3q1uPocLZ1FPFgt6VK', NULL, NULL, NULL, 0, NULL, '2022-04-22 12:19:35', '2022-04-24 18:23:52'),
(7, 'test', 'test456@gmail.com', NULL, NULL, '$2y$10$QS8CqT9Pqy.vtjEQTs8V/.9wpCR4HQlM1XKMHiyZBfBsvCMkfCDYa', NULL, NULL, NULL, 0, NULL, '2022-04-22 13:44:03', '2022-04-22 13:44:03'),
(8, 'test', 'test678@gmaill.com', NULL, NULL, '$2y$10$/wUaSsgSkuDdTQngD59sNO7zHRF.sKXZGAHUVjcRM8y7/u8QlNaJS', NULL, NULL, NULL, 0, NULL, '2022-04-23 22:15:34', '2022-04-23 22:15:34'),
(12, 'demo', 'demo@gmail.com', NULL, NULL, '$2y$10$z5b/BCHpl/Ra8OQrUH00OO0k4sEP1Gmto8Y9awWcPdFoOQyTMjcdy', NULL, NULL, NULL, 0, NULL, '2022-04-24 14:45:18', '2022-04-24 14:45:18'),
(13, 'testinguser', 'testinguser15@gmail.com', NULL, NULL, '$2y$10$qV4/OQqG0oENQgSma5xLO.rGO6Msn0oY4R36hExgl8u7kBCvhedQO', NULL, NULL, NULL, 0, NULL, '2022-04-25 09:41:22', '2022-04-25 09:41:47'),
(29, 'test testing', 'test@gmail.com', '8305088380', NULL, '$2y$10$FeXR0U3uQ4EK/Ekm4JQHked9KDPfE.MleeJMyBOOxl8pcE7Hp/.om', NULL, NULL, NULL, 0, NULL, '2022-04-28 20:19:17', '2022-04-28 20:19:17'),
(30, 'test', 'test5671@gmail.com', '7898909099', NULL, '$2y$10$/xesDpy2vgcUKKtyEgsZqeH2j5XZhC770lDeIZQzE/BY5UOJoQvKm', NULL, NULL, 1234, 0, NULL, '2022-04-29 07:33:59', '2022-04-29 07:33:59'),
(43, 'test', 'test901@gmail.com', '456781090', NULL, '$2y$10$Xr5sR5u9/l6vIc3g8dp3dech3igArpTOG8kS7Iz3wKReoY2ium2Fe', NULL, NULL, 1234, 0, NULL, '2022-04-29 07:59:27', '2022-04-29 08:07:54'),
(44, 'test', 'test678@gmail.com', '1234567898', NULL, '$2y$10$WBt93ELD96aMU42ieNav2OBR6DBGrTFFuFlfAa0k4wsUBnfzbupYa', NULL, NULL, 1234, 1, NULL, '2022-04-29 08:13:33', '2022-04-29 08:14:12'),
(45, 'test testing', 'test14@gmail.com', '1234567822', NULL, '$2y$10$MIc6LERX2p1lfWfylAHnGOCVKdA4x4sLGXjud8hwKsDU0lCPoRdPu', NULL, NULL, 1234, 0, NULL, '2022-04-29 09:51:39', '2022-04-29 09:51:39'),
(46, 'test', 'test567@gmail.com', '1234567888', NULL, '$2y$10$95A.NCbvrZWn0MRc.0XiEOq9xvi6og5ICaDnY1TSqaL0NNCu1PEyq', NULL, NULL, 1234, 0, NULL, '2022-04-29 10:07:55', '2022-04-29 10:07:55'),
(47, 'test testing', 'test514@gmail.com', '8957425896', NULL, '$2y$10$Wk12r05Z7ytq9VHhvDhjF.AwwLIVkEN8sDzyWdZ4AhGkLgxr9GnVe', NULL, NULL, 1234, 0, NULL, '2022-04-29 10:11:50', '2022-04-29 10:11:50'),
(48, 'test testing', 'test51@gmail.com', '8957425891', NULL, '$2y$10$55tanSe2.b73h./scHWrCO7rFMFXxZU4sy12kdCkHMXdWQ4VFjfNC', NULL, NULL, 1234, 0, NULL, '2022-04-29 10:13:34', '2022-04-29 10:13:34'),
(49, 'pooja choudhary', 'poojachoudhary791@gmail.com', NULL, NULL, '$2y$10$rHGqqbiir83/EZ9hfqb03.CUeKDUG.xq62cqI02cElTvBJEjKja3m', '106722967994763110704', 'google', NULL, 0, NULL, '2022-04-29 12:45:37', '2022-04-29 12:45:37'),
(50, 'test testing', 'test47@gmail.com', '7582569325', NULL, '$2y$10$OkTVvonBqgZdMmErtlQZl.XuzBEO7IJcKYPOfYwOx44c7p9rnCeSy', NULL, NULL, 1234, 0, NULL, '2022-04-29 15:39:33', '2022-04-29 15:39:33'),
(51, 'test testing', 'test45@gmail.com', '1235689745', NULL, '$2y$10$ZKr/YKK/NeZmIKqUMJr9S.UanC/ydRXjfQxqbZJN.SsfdIBZQv0JO', NULL, NULL, 1234, 0, NULL, '2022-04-29 16:07:34', '2022-04-29 16:07:34'),
(52, 'test', 'test45678@gmail.com', '1234567890', NULL, '$2y$10$8T0NaYZ98BKp0TruOFeMQuSalcKUElJxQirPA0TNjlaEGNuSzgme.', NULL, NULL, 1234, 0, NULL, '2022-04-29 17:02:42', '2022-04-29 17:02:42'),
(53, 'test', 'test56@gmail.com', '4323567890', NULL, '$2y$10$igwPFQCC98rQdaDUrPTOIeDmmRd1mcrn5dqZtQrd/rjp01aTXcz4e', NULL, NULL, 1234, 0, NULL, '2022-04-29 17:04:54', '2022-04-29 17:04:54'),
(54, 'test testing', 'test67@gmail.com', '1458726985', NULL, '$2y$10$jQJJwYGmSm5nSJx6kz5PMOqzmjGrxpGHUyRkLuVyCWesSSwEonomu', NULL, NULL, 1234, 0, NULL, '2022-04-30 15:59:02', '2022-04-30 15:59:02'),
(55, 'test', 'test5643@gmail.com', '3456789898', NULL, '$2y$10$Zdm4.MgjOhCm3oFvjl.Iee1Gi7//KVtgmvrrb0zQmMtFqbav2dAfW', NULL, NULL, 1234, 0, NULL, '2022-04-30 16:13:23', '2022-04-30 16:13:23'),
(56, 'test', 'test156@gmail.com', '2345676678', NULL, '$2y$10$EcqqKla4s0gxvyNN2TSfPeHFWWYgJHOiVCkEzeGB.MgDI4ja8tFQG', NULL, NULL, 1234, 0, NULL, '2022-04-30 16:16:14', '2022-04-30 16:16:14'),
(57, 'test', 't@gmail.com', '2345654323', NULL, '$2y$10$uRqlL4S2Le6C69XFE402ZeMwmM9ig1gp7nZ/02eOZCMLV4tmYVg6m', NULL, NULL, 1234, 0, NULL, '2022-04-30 16:28:35', '2022-04-30 16:28:35'),
(58, 'test', 'q@gmail.com', '3456789890', NULL, '$2y$10$k0rreoF6WK3UCqoqJ9.0v.eBTzSlqAT.gM3ZMZR/p/tha2xvjf0Sq', NULL, NULL, 1234, 0, NULL, '2022-04-30 16:32:20', '2022-04-30 16:32:20'),
(59, 'test', 'te@gmail.com', '1234567654', NULL, '$2y$10$MRxWg4H7guXtiSvp2ZRfw..BDRgqDRgBEGlrXWnOHoHxbj4LHjd6G', NULL, NULL, 1234, 0, 'hhNoBW27dOCtFGbBsVFHeWFXZPi4QALMQ33M6L7AePQsA12rG0p64Q17l41d', '2022-04-30 17:46:57', '2022-05-01 21:47:21'),
(60, 'test', 'tes@gmail.com', '5678908976', '2022-04-30 22:26:29', '$2y$10$rq/cyLvn5J/q5r4tVwID0OwFS4gGc7QjliLyvXC8R9xzNVgioJnba', NULL, NULL, 1234, 1, NULL, '2022-04-30 22:26:01', '2022-04-30 22:26:29');

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
