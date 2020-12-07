-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 06:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'New', 0, 2, '2020-07-07 16:44:57', '2020-10-25 10:25:49'),
(2, 'Demo', 1, 3, '2020-07-18 15:04:42', '2020-07-18 15:04:42'),
(3, 'Paracetamol', 1, 3, '2020-10-25 04:29:18', '2020-10-25 04:29:18'),
(4, 'crud', 1, 3, '2020-10-25 04:29:38', '2020-10-25 04:30:18'),
(5, 'Renited', 1, 3, '2020-10-25 05:10:01', '2020-10-25 05:10:01'),
(6, 'Laravel', 1, 3, '2020-10-25 09:12:19', '2020-10-25 09:40:20'),
(7, 'Paracetamol', 1, 3, '2020-10-25 09:59:05', '2020-10-26 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `vehicle_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parking_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `monthly_price` decimal(20,2) DEFAULT NULL,
  `penalty` decimal(20,2) DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` tinyint(4) NOT NULL DEFAULT 1,
  `checkout` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkins`
--

INSERT INTO `checkins` (`id`, `invoice`, `datetime`, `vehicle_number`, `vehicle_category_id`, `customer_id`, `parking_group_id`, `price`, `monthly_price`, `penalty`, `phone`, `checkin`, `checkout`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, '202011181', '2020-11-17 14:43:57', '098fvf09', 2, 2, 1, '50.00', NULL, '30.00', '0987654321667', 1, 0, 1, 3, '2020-11-18 08:36:43', '2020-11-18 08:36:43'),
(2, '23442334465', '2020-11-19 12:21:07', '2123152512352', 2, 2, 1, '123.00', NULL, '12.00', 'bsdvsdf', 1, 0, 1, 3, '2020-11-19 06:21:07', '2020-11-19 06:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parking_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `licence`, `model_no`, `vehicle_type_id`, `vehicle_type`, `parking_group_id`, `parking_group`, `mobile`, `color`, `address`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'Arman Khan', 'dhaka - cha - 1280', 'shaDowed', 4, 'Motor Bike', 3, 'Monthly', '0987654321667', 'green', 'dasfdas', 1, 3, '2020-11-16 06:10:24', '2020-11-16 06:10:24'),
(2, 'Maria Fatema', '098fvf09', '12345431', 2, 'Private Car', 1, 'Hourly', '0987654321667', 'gnxdf', 'yuo;rru', 1, 3, '2020-11-16 10:33:33', '2020-11-16 10:33:33'),
(3, 'Maria', 'dhaka - cha - 1281', '01982342398', 2, 'Private Car', 3, 'Monthly', '0987654321', 'gnxdf', 'qwqwvq', 1, 3, '2020-11-16 10:34:24', '2020-11-16 10:34:24'),
(4, 'Sahariar Islam', 'sa-re-au-di', 'Dark', 2, 'Private Car', 1, 'Hourly', '0987654321667', 'Black', 'asdasd', 1, 3, '2020-11-17 11:03:16', '2020-11-17 11:03:16'),
(6, 'Paracetamol', 'dhaka - gha - 1130', NULL, 2, 'Private Car', 1, 'Hourly', '12343131D343', NULL, NULL, 1, 3, '2020-11-18 06:56:48', '2020-11-18 06:56:48'),
(7, 'Mariaerw', 'jqwyecgdjqywegd', NULL, 4, 'Motor Bike', 1, 'Hourly', 'werfwerwe143423', NULL, NULL, 1, 3, '2020-11-18 07:07:23', '2020-11-18 07:07:23'),
(8, 'Maria Fatemaasdva', '098fvf09btbwrtb', NULL, 5, 'askdsad', 3, 'Monthly', '0987654321', NULL, NULL, 1, 3, '2020-11-18 07:10:22', '2020-11-18 07:10:22'),
(9, 'ervwervergvew', 'ASF342311 sbrt', NULL, 1, 'Bus', 1, 'Hourly', 'werwergwerwer', NULL, NULL, 1, 3, '2020-11-18 07:12:17', '2020-11-18 07:12:17'),
(10, 'ervwervergvew', 'ASF342311 sbrt', NULL, 1, 'Bus', 1, 'Hourly', 'werwergwerwer', NULL, NULL, 1, 3, '2020-11-18 07:12:23', '2020-11-18 07:12:23'),
(11, 'ervwervergvew', 'ASF342311 sbrt', NULL, 1, 'Bus', 1, 'Hourly', 'werwergwerwer', NULL, NULL, 1, 3, '2020-11-18 07:12:55', '2020-11-18 07:12:55'),
(12, 'ervwervergvew', 'ASF342311 sbrt', NULL, 1, 'Bus', 1, 'Hourly', 'werwergwerwer', NULL, NULL, 1, 3, '2020-11-18 07:15:14', '2020-11-18 07:15:14'),
(13, 'BsfbSBDsdv', 'dhaka - cha - 1400swgbnadfba', NULL, 2, 'Private Car', 1, 'Hourly', 'DSBsdbSDB', NULL, NULL, 1, 3, '2020-11-18 07:15:44', '2020-11-18 07:15:44'),
(14, 'WFDVMWEGFV', '098fvf09WEJGVWJEKHGV', NULL, 1, 'Bus', 1, 'Hourly', 'WEFVWEFVWEFV', NULL, NULL, 1, 3, '2020-11-18 07:16:15', '2020-11-18 07:16:15'),
(15, 'asdfasdfasd', '3rfqrfqwefqwef', NULL, 2, 'Private Car', 1, 'Hourly', 'asdasdvasd', NULL, NULL, 1, 3, '2020-11-19 04:59:52', '2020-11-19 04:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `name`, `address`, `limit`, `space`, `note`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(2, 'Shubastu', 'sdhshsh sergshstg ergseh', 100, '12543', 'ggxftfxdhfh', 1, 3, '2020-11-03 11:30:31', '2020-11-03 11:30:31'),
(3, 'Multiplan', 'sdlkjasgasd', 123, '1234', 'dfsdfsdf sthsrs', 1, 3, '2020-11-04 11:47:04', '2020-11-04 11:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`) VALUES
(1, 'Cumilla', 'কুমিল্লা'),
(2, 'Feni', 'ফেনী'),
(3, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া'),
(4, 'Rangamati', 'রাঙ্গামাটি'),
(5, 'Noakhali', 'নোয়াখালী'),
(6, 'Chandpur', 'চাঁদপুর'),
(7, 'Lakshmipur', 'লক্ষ্মীপুর'),
(8, 'Chattogram', 'চট্টগ্রাম'),
(9, 'Coxsbazar', 'কক্সবাজার'),
(10, 'Khagrachhari', 'খাগড়াছড়ি'),
(11, 'Bandarban', 'বান্দরবান'),
(12, 'Sirajganj', 'সিরাজগঞ্জ'),
(13, 'Pabna', 'পাবনা'),
(14, 'Bogura', 'বগুড়া'),
(15, 'Rajshahi', 'রাজশাহী'),
(16, 'Natore', 'নাটোর'),
(17, 'Joypurhat', 'জয়পুরহাট'),
(18, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ'),
(19, 'Naogaon', 'নওগাঁ'),
(20, 'Josshore', 'যশোর'),
(21, 'Satkhira', 'সাতক্ষীরা'),
(22, 'Meherpur', 'মেহেরপুর'),
(23, 'Narail', 'নড়াইল'),
(24, 'Chuadanga', 'চুয়াডাঙ্গা'),
(25, 'Kushtia', 'কুষ্টিয়া'),
(26, 'Magura', 'মাগুরা'),
(27, 'Khulna', 'খুলনা'),
(28, 'Bagerhat', 'বাগেরহাট'),
(29, 'Jhenaidah', 'ঝিনাইদহ'),
(30, 'Jhalakathi', 'ঝালকাঠি'),
(31, 'Patuakhali', 'পটুয়াখালী'),
(32, 'Pirojpur', 'পিরোজপুর'),
(33, 'Barishal', 'বরিশাল'),
(34, 'Bhola', 'ভোলা'),
(35, 'Barguna', 'বরগুনা'),
(36, 'Sylhet', 'সিলেট'),
(37, 'Moulvibazar', 'মৌলভীবাজার'),
(38, 'Habiganj', 'হবিগঞ্জ'),
(39, 'Sunamganj', 'সুনামগঞ্জ'),
(40, 'Narsingdi', 'নরসিংদী'),
(41, 'Gazipur', 'গাজীপুর'),
(42, 'Shariatpur', 'শরীয়তপুর'),
(43, 'Narayanganj', 'নারায়ণগঞ্জ'),
(44, 'Tangail', 'টাঙ্গাইল'),
(45, 'Kishoreganj', 'কিশোরগঞ্জ'),
(46, 'Manikganj', 'মানিকগঞ্জ'),
(47, 'Dhaka', 'ঢাকা'),
(48, 'Munshiganj', 'মুন্সিগঞ্জ'),
(49, 'Rajbari', 'রাজবাড়ী'),
(50, 'Madaripur', 'মাদারীপুর'),
(51, 'Gopalganj', 'গোপালগঞ্জ'),
(52, 'Faridpur', 'ফরিদপুর'),
(53, 'Panchagarh', 'পঞ্চগড়'),
(54, 'Dinajpur', 'দিনাজপুর'),
(55, 'Lalmonirhat', 'লালমনিরহাট'),
(56, 'Nilphamari', 'নীলফামারী'),
(57, 'Gaibandha', 'গাইবান্ধা'),
(58, 'Thakurgaon', 'ঠাকুরগাঁও'),
(59, 'Rangpur', 'রংপুর'),
(60, 'Kurigram', 'কুড়িগ্রাম'),
(61, 'Sherpur', 'শেরপুর'),
(62, 'Mymensingh', 'ময়মনসিংহ'),
(63, 'Jamalpur', 'জামালপুর'),
(64, 'Netrokona', 'নেত্রকোণা');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hourly_entries`
--

CREATE TABLE `hourly_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `vehicle_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `penalty` decimal(8,2) DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` tinyint(4) NOT NULL DEFAULT 1,
  `checkout` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hourly_entries`
--

INSERT INTO `hourly_entries` (`id`, `invoice`, `date`, `time`, `vehicle_number`, `vehicle_category_id`, `price`, `penalty`, `phone`, `checkin`, `checkout`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, '20201105', '2020-11-05', '14:09:59', 'ASF342311', 4, '30.00', '10.00', '1435134twew', 1, 1, 1, 3, '2020-11-05 08:09:59', '2020-11-09 04:31:26'),
(2, '202011052', '2020-11-05', '18:02:53', 'ASF342311srgser', 1, '300.00', '150.00', '1435134twew', 1, 1, 1, 3, '2020-11-05 12:02:53', '2020-11-09 04:31:23'),
(3, '202011071', '2020-11-07', '06:32:30', 'ASF342311', 2, '50.00', '30.00', '1435134twew', 1, 1, 1, 3, '2020-11-07 04:32:31', '2020-11-09 04:31:20'),
(4, '202011081', '2020-11-08', '17:15:58', '098fvf09', 4, '30.00', '10.00', NULL, 1, 1, 1, 3, '2020-11-08 11:15:58', '2020-11-09 04:32:12'),
(5, '202011091', '2020-11-09', '10:32:46', 'ASF342311', 4, '30.00', '10.00', '0987654321', 1, 0, 1, 3, '2020-11-09 04:32:46', '2020-11-09 04:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_shelves`
--

CREATE TABLE `medicine_shelves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_shelves`
--

INSERT INTO `medicine_shelves` (`id`, `name`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(3, 'shelf-1', 1, 3, '2020-10-25 11:55:04', '2020-10-26 04:52:16'),
(4, 'Shelf-2', 1, 3, '2020-10-26 05:42:47', '2020-10-26 05:42:47'),
(5, 'Shelf-3', 1, 3, '2020-10-26 08:54:38', '2020-10-26 08:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_types`
--

CREATE TABLE `medicine_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_types`
--

INSERT INTO `medicine_types` (`id`, `name`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(2, 'Tablates', 1, 3, '2020-10-26 04:55:08', '2020-10-26 04:55:08'),
(3, 'Injection', 1, 3, '2020-10-26 05:01:56', '2020-10-26 05:01:56'),
(4, 'Syrup', 1, 3, '2020-10-26 05:02:39', '2020-10-26 05:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_units`
--

CREATE TABLE `medicine_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_units`
--

INSERT INTO `medicine_units` (`id`, `name`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'ml', 1, 3, '2020-10-25 11:55:43', '2020-10-26 04:52:38'),
(3, 'mg', 1, 3, '2020-10-26 05:43:08', '2020-10-26 05:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Welcome !!!', '2020-07-07 16:41:00', NULL);

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
(5, '2020_02_15_163931_create_suppliers_table', 1),
(7, '2020_02_17_154055_create_categories_table', 1),
(8, '2020_02_18_114805_create_purchases_table', 1),
(9, '2020_02_18_115320_create_purchase_items_table', 1),
(10, '2020_02_20_111658_create_sales_table', 1),
(11, '2020_02_20_112511_create_sale_items_table', 1),
(12, '2020_02_20_113900_create_stocks_table', 1),
(13, '2020_02_23_161728_create_purchase_cancels_table', 1),
(14, '2020_02_24_155630_create_sale_cancels_table', 1),
(15, '2020_02_27_141338_create_expenses_table', 1),
(16, '2020_02_27_142236_create_expense_types_table', 1),
(17, '2020_02_27_151247_create_collections_table', 1),
(18, '2020_02_27_151447_create_payments_table', 1),
(20, '2020_03_24_184246_create_shop_payments_table', 1),
(21, '2020_03_24_184705_create_shop_packages_table', 1),
(22, '2020_04_03_055017_create_messages_table', 1),
(23, '2020_06_18_090242_create_subscribers_table', 1),
(24, '2020_06_18_094230_create_testimonials_table', 1),
(25, '2020_06_21_025300_create_tickets_table', 1),
(26, '2020_06_22_010545_create_ticket_attachments_table', 1),
(27, '2020_06_22_030651_create_ticket_statuses_table', 1),
(28, '2020_06_23_225524_create_shops_table', 1),
(29, '2020_06_23_225810_create_references_table', 1),
(30, '2020_06_23_230036_create_reference_payments_table', 1),
(31, '2020_06_26_030838_create_contacts_table', 1),
(32, '2020_06_27_205303_create_shop_employees_table', 1),
(34, '2020_10_25_152249_create_medicine_types_table', 2),
(35, '2020_10_25_163838_create_medicine_shelves_table', 3),
(36, '2020_10_25_173801_create_medicine_units_table', 4),
(39, '2020_02_17_145049_create_products_table', 5),
(42, '2020_03_22_232225_create_deliveries_table', 7),
(44, '2020_11_03_161845_create_vehicle_categories_table', 8),
(45, '2020_11_04_113401_create_parking_groups_table', 9),
(50, '2020_11_04_134738_create_parking_prices_table', 11),
(52, '2020_11_05_124728_create_hourly_entries_table', 12),
(60, '2020_11_08_131734_create_monthly_checkins_table', 14),
(71, '2016_06_01_000001_create_oauth_auth_codes_table', 15),
(72, '2016_06_01_000002_create_oauth_access_tokens_table', 15),
(73, '2016_06_01_000003_create_oauth_refresh_tokens_table', 15),
(74, '2016_06_01_000004_create_oauth_clients_table', 15),
(75, '2016_06_01_000005_create_oauth_personal_access_clients_table', 15),
(78, '2020_02_15_163516_create_customers_table', 16),
(82, '2020_11_07_134318_create_monthly_entries_table', 17),
(90, '2020_11_17_134136_create_checkins_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_checkins`
--

CREATE TABLE `monthly_checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `vehicle_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` tinyint(4) NOT NULL DEFAULT 1,
  `checkout` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_checkins`
--

INSERT INTO `monthly_checkins` (`id`, `invoice`, `date`, `time`, `vehicle_number`, `vehicle_category`, `name`, `phone`, `checkin`, `checkout`, `payment_status`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, '202011081', '2020-11-08', '13:48:42', '098fvf09', 'Motor Bike', NULL, '0987654321', 1, 1, '1', 1, 3, '2020-11-08 07:48:42', '2020-11-09 04:31:44'),
(2, '202011082', '2020-11-08', '13:51:09', '098fvf09', 'Motor Bike', 'Arman', '0987654321', 1, 1, '1', 1, 3, '2020-11-08 07:51:09', '2020-11-09 04:31:41'),
(3, '202011083', '2020-11-08', '14:57:55', '098fvf09', 'Motor Bike', 'Arman', '0987654321', 1, 1, '1', 1, 3, '2020-11-08 08:57:55', '2020-11-09 04:31:37'),
(4, '202011091', '2020-11-09', '10:37:48', '098fvf09', 'Motor Bike', 'Arman', '0987654321', 1, 1, '1', 1, 3, '2020-11-09 04:37:48', '2020-11-14 09:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_entries`
--

CREATE TABLE `monthly_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` time NOT NULL,
  `vehicle_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_entries`
--

INSERT INTO `monthly_entries` (`id`, `invoice`, `date`, `end_date`, `time`, `vehicle_number`, `name`, `vehicle_category_id`, `customer_id`, `vehicle_category`, `price`, `mobile`, `payment_status`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, '202011161', '2020-11-16', '2021-03-31', '14:30:21', 'dhaka - cha - 1280', 'Arman Khan', 4, 1, 'Motor Bike', '1000.00', '0987654321667', 1, 1, 3, '2020-11-16 08:30:21', '2020-11-16 10:41:58'),
(2, '202011162', '2020-11-16', '2021-03-31', '16:35:20', 'dhaka - cha - 1281', 'Maria', 2, 3, 'Private Car', '2500.00', '0987654321', 1, 1, 3, '2020-11-16 10:35:20', '2020-11-18 08:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('029a4780775c750ada5fea7274f4fb8d8c44f49528ffcfb782b684ec91b452b97653808c77026dcc', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:27:30', '2020-11-19 10:27:30', '2021-11-19 16:27:30'),
('029d317d6a8ff099c89ad4fdec56d768f08bd3843f7f05eff18aeffb936d7dbe4ce81dc370c70f66', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:11:47', '2020-11-21 06:11:47', '2021-11-21 12:11:47'),
('061f321d4b7c96fb803c4456213ee4155ba687749ffaf6e3ca8097021a1cc21d0c67e0326cd2d1b4', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:36:46', '2020-11-19 11:36:46', '2021-11-19 17:36:46'),
('0697f0ccc79ce613d7e4a2f01098de0a13b9242e3382bc8ba56578b3b4643002f650f73ebe59e14b', 3, 1, 'MyApp', '[]', 0, '2020-11-21 08:45:42', '2020-11-21 08:45:42', '2021-11-21 14:45:42'),
('07d35fd2c8d6d03c83e1fbd6e01275013550fc361d2d93536f8854b34cf0c865bc369df5ddc1e579', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:35:13', '2020-11-14 10:35:13', '2021-11-14 16:35:13'),
('102b8875364e4afa2936b2edb96ccee0650c33177cc70c994ebc335ff147a3494d1f2ce013173f36', 3, 1, 'MyApp', '[]', 0, '2020-11-14 07:13:20', '2020-11-14 07:13:20', '2021-11-14 13:13:20'),
('160707addc41f06259029d68deb120a663fa38e8822eb927d4db0dcf5a1a6a29d9185accb63b1af7', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:32:30', '2020-11-19 10:32:30', '2021-11-19 16:32:30'),
('318f9e464cfc4cc62d41d13ca2390fdc9b8150a6ce97476965b29729ed6d73a442a1a425a1560d4d', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:14:08', '2020-11-19 10:14:08', '2021-11-19 16:14:08'),
('361b0b4a719c35400726767737163f5b6ddf30e189adef20e89ce7d6f0f401c5fe0b27b481157b71', 3, 1, 'MyApp', '[]', 0, '2020-11-21 04:40:04', '2020-11-21 04:40:04', '2021-11-21 10:40:04'),
('3963ce9ba9298a8975b3a501c61bbb9159628ca46cd79042427def73fd61254f5d42013d0e8c744b', 3, 1, 'MyApp', '[]', 0, '2020-11-21 08:47:38', '2020-11-21 08:47:38', '2021-11-21 14:47:38'),
('3d45d69641ba60327d08c38693a5ca0bd18161be79453537ec032bcb404bb5736bcd21d9c084a623', 3, 1, 'MyApp', '[]', 0, '2020-11-19 09:34:53', '2020-11-19 09:34:53', '2021-11-19 15:34:53'),
('3ece2a0b255b22e2eafa6b57e2f3bc315009ee83e194995e207e84005c4af9eef0de58099b514ecd', 3, 1, 'MyApp', '[]', 0, '2020-11-19 08:00:14', '2020-11-19 08:00:14', '2021-11-19 14:00:14'),
('4a82ee248aa529aec370cc58ba7d0576dbbbc241960344b1d05e2f41cdfa74d9a35a0ebc89ac5280', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:29:00', '2020-11-19 10:29:00', '2021-11-19 16:29:00'),
('4ca69f08015a6279b293b5ba25cea3729b2f7394ac08a93a156ecacb8468aad3ebc12dcf0517f63d', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:37:11', '2020-11-19 11:37:11', '2021-11-19 17:37:11'),
('5702d356ef6cbb50d9e10a2c6448fd8a291758a3ca9b8d288d04dc4c56d2960c7d83d69925a1e4b6', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:36:46', '2020-11-19 11:36:46', '2021-11-19 17:36:46'),
('58632f3cf65047ab0c42366551fdd0d4b28f069e2cf3814eec1b1e90fa6d3aa2d7bab60185dca2b5', 3, 1, 'MyApp', '[]', 0, '2020-11-21 05:03:33', '2020-11-21 05:03:33', '2021-11-21 11:03:33'),
('60d24862496f5819d18601dfa5197caa58e68716ed81781aeb14ce52a95477deeef4e0fbeb5bf241', 3, 1, 'MyApp', '[]', 0, '2020-11-21 05:07:57', '2020-11-21 05:07:57', '2021-11-21 11:07:57'),
('64f7b25c540daf58d7b53c85731511db93a746561c0d1d87e3bafdd9bc7b11af8cfc41c9b06a483a', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:43:40', '2020-11-14 10:43:40', '2021-11-14 16:43:40'),
('6be3e9b68643d882ed2206d7c6ac43dacdf7f9d8ccfe3186d71311c6666550aebe504b4679ab2980', 3, 1, 'MyApp', '[]', 0, '2020-11-14 07:06:48', '2020-11-14 07:06:48', '2021-11-14 13:06:48'),
('6c5fd7360bc4ea9f0004f4c370ccbeef16a2b0e161b28190755c0bb662c83fba1fc7546fd6c979eb', 3, 1, 'MyApp', '[]', 0, '2020-11-21 04:49:45', '2020-11-21 04:49:45', '2021-11-21 10:49:45'),
('705f86a897e262abd0c5481079d7abfd93cd0c8692e738976f55479804040f2cfe32b55c8614d97a', 3, 1, 'MyApp', '[]', 0, '2020-11-19 07:40:31', '2020-11-19 07:40:31', '2021-11-19 13:40:31'),
('7a14320c76e72ceed1319cd52e0d044ee3fc984c93d854769f53af4f230d73151cea9f5773bcebcb', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:09:15', '2020-11-19 10:09:15', '2021-11-19 16:09:15'),
('7b68e95f9b94d8b9f44498f55fe1518ecd518b3654e7289281640eb928945b79fad7f24d488f596a', 3, 1, 'MyApp', '[]', 0, '2020-11-21 04:40:00', '2020-11-21 04:40:00', '2021-11-21 10:40:00'),
('7e1e023de534839fa6cfbd0c78899ac9e752a16b739bd9d7e1588dae73c81300f998530e0927335f', 3, 1, 'MyApp', '[]', 0, '2020-11-11 18:29:07', '2020-11-11 18:29:07', '2021-11-12 00:29:07'),
('7e88d2f5323a7b92a4056959416f86f99e00d832ac09c46fd194473c0f17fba460dfe2c3ce9bd283', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:36:46', '2020-11-19 11:36:46', '2021-11-19 17:36:46'),
('7ec832e1174bccead08e8cdefd9f4d3eee375e4069cbb6270411a1289a4d52e433693826ba940ee2', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:48:53', '2020-11-14 10:48:53', '2021-11-14 16:48:53'),
('8a7253cc6162acd1de850b480e8ebaff6f5c8a38cf4f5c9011c45600eb00b86ea81eb9f2a83f33b7', 3, 1, 'MyApp', '[]', 0, '2020-11-19 09:25:39', '2020-11-19 09:25:39', '2021-11-19 15:25:39'),
('8d85b43fd3c3d00fd76c59fc74500d36356cce4820467a8595810236e1c83b8b1dab33fbc33e10c1', 3, 1, 'MyApp', '[]', 0, '2020-11-21 08:41:31', '2020-11-21 08:41:31', '2021-11-21 14:41:31'),
('91240471ea28792517fe4af20955fe0d27753183c12b7a1f754b02f467a564562a1b6aa67a975698', 3, 1, 'MyApp', '[]', 0, '2020-11-14 07:14:32', '2020-11-14 07:14:32', '2021-11-14 13:14:32'),
('91d8aa6056aa5832748b8c3cb0a5d75c16d29bc19e472ded4f5511b4f051e68509092479c9b2741f', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:41:31', '2020-11-19 11:41:31', '2021-11-19 17:41:31'),
('9b204c004524959cffa0ba576954c1cda4ea8558fead28689812dedcbca159a51262aced346fcd13', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:39:00', '2020-11-19 11:39:00', '2021-11-19 17:39:00'),
('9fba0bd7466f341490ddff4143169c6b106caa3725553b88ac93e4eebc697cc7d78d471473f8da05', 3, 1, 'MyApp', '[]', 0, '2020-11-19 08:59:45', '2020-11-19 08:59:45', '2021-11-19 14:59:45'),
('a2ecbd06b58313595a9010bb1875e27898effe8272daa425622bade60968fc8da339da54f8688750', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:01:24', '2020-11-21 06:01:24', '2021-11-21 12:01:24'),
('a2fae6f9016021f6fa77d4c3468f7bb29483432d1d877b75927bab329c9b41231480e7f84260fbaf', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:45:07', '2020-11-19 11:45:07', '2021-11-19 17:45:07'),
('a4b45eb791704744d6055e4193462d7923809a41b98e7af87bdfb21ce61a81fcfefb5f65e1e05131', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:41:31', '2020-11-14 10:41:31', '2021-11-14 16:41:31'),
('a5bd22a95eb40d6c37525582d518a60a933f9bee37bea059ce55425dc6fc4c0ffb1f282a7796fedf', 3, 1, 'MyApp', '[]', 0, '2020-11-19 11:36:46', '2020-11-19 11:36:46', '2021-11-19 17:36:46'),
('a943336a3720259e3e28ada2d506d104a9dec7245484cfd496a49721ae96103cbcd34945d8c75e71', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:07:00', '2020-11-21 06:07:00', '2021-11-21 12:07:00'),
('aadb9b0a12b47f7566bffafa30300a2301ddceac06d4bf00af6fdf25268220c6b9c6d660c2f10e88', 3, 1, 'MyApp', '[]', 0, '2020-11-21 05:50:11', '2020-11-21 05:50:11', '2021-11-21 11:50:11'),
('b36fd85482ca529b7e6ea4b09c10d85abf39be0bde2c7bdc20f75f048c32f24a20e570e30b5789e1', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:51:33', '2020-11-14 10:51:33', '2021-11-14 16:51:33'),
('b75cc9be606029fc89e45c7f019bdc97f569910dcae566511e9bacd8b93a79582721140d5c944633', 3, 1, 'MyApp', '[]', 0, '2020-11-21 04:40:00', '2020-11-21 04:40:00', '2021-11-21 10:40:00'),
('ba82f57f94f611a920e9f09af3c2e4800bbff2588622f79a268b9d3729b59b533f95238e9be778e0', 3, 1, 'MyApp', '[]', 0, '2020-11-21 05:21:26', '2020-11-21 05:21:26', '2021-11-21 11:21:26'),
('c473dfa175838b70c1695044e937006b82fec7e7980a9caaf2c88f2722f42d214065851b9ce7ba3a', 3, 1, 'MyApp', '[]', 0, '2020-11-19 09:41:00', '2020-11-19 09:41:00', '2021-11-19 15:41:00'),
('c67b40c33b2305211158d3e46d2fd5c6059bdd55e4999fcbdde894352cd19919f4b389f9da9b66a5', 3, 1, 'MyApp', '[]', 0, '2020-11-19 08:23:26', '2020-11-19 08:23:26', '2021-11-19 14:23:26'),
('c98ceded5d1576f5606cee4e8af4503b00ec92b797583b19b9a638d8e91a8b30c8d6026e45cb14fc', 3, 1, 'MyApp', '[]', 0, '2020-11-11 18:24:22', '2020-11-11 18:24:22', '2021-11-12 00:24:22'),
('d2416a6d9432d2eacd544152b8998f2cbc420527c79ccffcb776de85b7cf4f1fa0f6d35e275e9bb6', 3, 1, 'MyApp', '[]', 0, '2020-11-19 07:40:32', '2020-11-19 07:40:32', '2021-11-19 13:40:32'),
('d4f569b7389428e29ead90f342c17f048b20132df0dd535f7bdea5b3d0a1a76ebba8557d47c66fff', 3, 1, 'MyApp', '[]', 0, '2020-11-19 08:51:52', '2020-11-19 08:51:52', '2021-11-19 14:51:52'),
('dbf20cfd66967ff1913d9274f94032f18c28ffb1149cf4188801386074d596414012a5ccde801ab1', 3, 1, 'MyApp', '[]', 0, '2020-11-14 07:50:41', '2020-11-14 07:50:41', '2021-11-14 13:50:41'),
('dcd8990a8e3cce0285765941d6271971ee8a061752658031dcee1de6c94e625f5b5401c691c205da', 3, 1, 'MyApp', '[]', 0, '2020-11-19 05:26:36', '2020-11-19 05:26:36', '2021-11-19 11:26:36'),
('e71ecde1693ccf3aa2122400b3373487fd514f14f20d548e5c7d7cfc4de05865fdb962e541773959', 3, 1, 'MyApp', '[]', 0, '2020-11-12 06:05:07', '2020-11-12 06:05:07', '2021-11-12 12:05:07'),
('e8ca00ebcf5eed29f9d56cc2a310a22d2aae097ae5952412498b2d6c3c992a3fd1dc8d5f428edc2b', 3, 1, 'MyApp', '[]', 0, '2020-11-14 10:56:43', '2020-11-14 10:56:43', '2021-11-14 16:56:43'),
('e97515d4c0ca1ca8dc3b527d06bf42ed655443ff1730dfd292b24c148d99dbc1a4e5aa06b34a930c', 3, 1, 'MyApp', '[]', 0, '2020-11-14 11:00:40', '2020-11-14 11:00:40', '2021-11-14 17:00:40'),
('ea40db6e6813778d1286d6bb5694511e9ce75d8b8ddeca531aec697a9d63774efd26f5e970d2a0ed', 3, 1, 'MyApp', '[]', 0, '2020-11-14 07:10:47', '2020-11-14 07:10:47', '2021-11-14 13:10:47'),
('f0d365d48eb81244b7472a65d79df0e8bd65bf3b109c183273580003ab8df7cda68c3d64d6c5d898', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:17:35', '2020-11-21 06:17:35', '2021-11-21 12:17:35'),
('f5bf7e0a8219afce78c487fd2fd100b269dfbbc8b40f24af9f6f902e08c71b07935f9f994c79fdec', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:19:08', '2020-11-21 06:19:08', '2021-11-21 12:19:08'),
('f87b221786825a9ec52612f4ab395dacf35937e44ae9f8b49ee7b20d8fea1fb89880d8f069bb41f1', 3, 1, 'MyApp', '[]', 0, '2020-11-21 06:05:44', '2020-11-21 06:05:44', '2021-11-21 12:05:44'),
('fa79677fab30f39bf9969ba9a6a297a1c9d8a259374f7fcf9444efac2068541c45b2e374199efd31', 3, 1, 'MyApp', '[]', 0, '2020-11-21 04:40:00', '2020-11-21 04:40:00', '2021-11-21 10:40:00'),
('fd0a160dc112ac1869d6503ef9476a9e5832a2d71a6ea6e353ebc6f2a601cb998290060e7958e4f4', 3, 1, 'MyApp', '[]', 0, '2020-11-19 10:30:28', '2020-11-19 10:30:28', '2021-11-19 16:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dokan Pos Pharmacy Personal Access Client', 'vY3TzNKQDiog2exMswtQpLYLzLh2ppGiOx9puCfD', 'http://localhost', 1, 0, 0, '2020-11-11 17:36:37', '2020-11-11 17:36:37'),
(2, NULL, 'Dokan Pos Pharmacy Password Grant Client', 'tYL1y55cWRiso8TnXlcri1up1OUu82vB9hoxpNNR', 'http://localhost', 0, 1, 0, '2020-11-11 17:36:37', '2020-11-11 17:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-11 17:36:37', '2020-11-11 17:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parking_groups`
--

CREATE TABLE `parking_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_groups`
--

INSERT INTO `parking_groups` (`id`, `name`, `details`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'Hourly', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 3, '2020-11-04 06:01:26', '2020-11-04 06:09:54'),
(3, 'Monthly', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 3, '2020-11-04 06:16:28', '2020-11-04 06:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `parking_prices`
--

CREATE TABLE `parking_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parking_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `penalty` decimal(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_prices`
--

INSERT INTO `parking_prices` (`id`, `delivery_id`, `parking_group_id`, `vehicle_category_id`, `price`, `penalty`, `status`, `details`, `shop`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 4, '30.00', '10.00', 1, 'afvasdvasvas', 3, '2020-11-05 05:10:57', '2020-11-05 05:10:57'),
(5, 2, 1, 2, '50.00', '30.00', 1, 'sdjvflfvkjhadfuhvajhfv', 3, '2020-11-05 05:11:23', '2020-11-05 05:11:23'),
(6, 2, 1, 1, '300.00', '150.00', 1, 'rwioqufwh owieu slakjcd', 3, '2020-11-05 05:12:09', '2020-11-05 05:12:09'),
(7, 2, 3, 4, '1000.00', NULL, 1, 'Monthly', 3, '2020-11-07 06:42:01', '2020-11-07 06:42:01'),
(8, 2, 3, 2, '2500.00', NULL, 1, 'Private Car Monthly', 3, '2020-11-07 06:42:39', '2020-11-07 06:42:39'),
(9, 2, 3, 1, '8000.00', NULL, 1, 'Bus Monthly', 3, '2020-11-07 06:43:19', '2020-11-07 06:43:19');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `supplier`, `purchase_no`, `paid`, `due`, `amount`, `details`, `shop`, `user`, `created_at`, `updated_at`) VALUES
(1, '2020-07-18', '1', 'PO3202020', 5000.00, 2900.00, 0.00, NULL, 3, 3, '2020-07-18 16:20:47', '2020-07-18 16:20:47'),
(2, '2020-07-19', 'Cash', 'PO3202021', 10000.00, 650.00, 0.00, NULL, 3, 3, '2020-07-18 20:53:57', '2020-07-18 20:53:57'),
(3, '2020-07-19', 'Cash', 'PO3202022', 2000.00, 40.00, 0.00, NULL, 3, 3, '2020-07-18 20:57:12', '2020-07-18 20:57:12'),
(4, '2020-07-19', 'Cash', 'PO3202023', 200000.00, 2510.00, 0.00, NULL, 3, 3, '2020-07-18 21:40:46', '2020-07-18 21:40:46'),
(5, '2020-11-01', 'Cash', 'PO32020110126', NULL, NULL, 0.00, NULL, 3, 3, '2020-11-01 07:45:15', '2020-11-01 07:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_shelf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `medicine_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `seller_price` double(8,2) DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_price` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `barcode`, `name`, `category`, `medicine_shelf`, `strength`, `medicine_unit`, `generic_name`, `min_stock`, `medicine_type`, `details`, `vat`, `tax`, `seller_price`, `manufacturer`, `manufacturer_price`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(2, 3, 982374, 'sadhdkh', 'crud', 'Select Medicine Shelf', 234, 'ml', 'rgdaga', NULL, 'Syrup', NULL, NULL, NULL, 230.00, 'Abul Mia', 123.00, 0, 3, '2020-10-31 04:57:23', '2020-11-04 11:05:19'),
(4, 3, 7123416, 'lkdjk894', 'crud', 'Select Medicine Shelf', 234, 'mg', 'asdsd', NULL, 'Syrup', NULL, NULL, NULL, 230.00, 'Abul Mia', 123.00, 1, 3, '2020-10-31 04:57:23', '2020-10-31 11:26:43'),
(5, 3, 9809870000000, 'sadhdkh', 'crud', 'Select Medicine Shelf', 234, 'ml', 'rgdaga', NULL, 'Syrup', NULL, NULL, NULL, 230.00, 'Maria Fatema', 123.00, 1, 3, '2020-10-31 04:57:54', '2020-11-01 04:38:00'),
(6, 3, 101131000000, 'skldjcs', 'crud', 'Select Medicine Shelf', 3445, 'mg', 'gasda', NULL, 'Syrup', NULL, NULL, NULL, 230.00, 'Abul Mia', 123.00, 1, 3, '2020-10-31 04:57:54', '2020-10-31 11:26:21'),
(7, 3, 712123000000, 'lkdjk894', 'crud', 'Select Medicine Shelf', 234, 'mg', 'asdsd', NULL, 'Syrup', NULL, NULL, NULL, 230.00, 'Abul Mia', 123.00, 1, 3, '2020-10-31 04:57:54', '2020-10-31 06:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `totalQty` int(11) DEFAULT NULL,
  `subTotal` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `d_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable` double(10,2) DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `return` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_no`, `supplier`, `date`, `totalQty`, `subTotal`, `discount`, `d_type`, `payable`, `paid`, `return`, `due`, `p_type`, `shop`, `user`, `created_at`, `updated_at`) VALUES
(1, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:13', '2020-07-07 20:11:13'),
(2, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:13', '2020-07-07 20:11:13'),
(3, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:14', '2020-07-07 20:11:14'),
(4, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:14', '2020-07-07 20:11:14'),
(5, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:14', '2020-07-07 20:11:14'),
(6, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:15', '2020-07-07 20:11:15'),
(7, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:15', '2020-07-07 20:11:15'),
(8, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:15', '2020-07-07 20:11:15'),
(9, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:17', '2020-07-07 20:11:17'),
(10, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:17', '2020-07-07 20:11:17'),
(11, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:17', '2020-07-07 20:11:17'),
(12, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:17', '2020-07-07 20:11:17'),
(13, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:17', '2020-07-07 20:11:17'),
(14, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:18', '2020-07-07 20:11:18'),
(15, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:19', '2020-07-07 20:11:19'),
(16, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:19', '2020-07-07 20:11:19'),
(17, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:19', '2020-07-07 20:11:19'),
(18, 'PO220201', 'Cash', '2020-07-08', 1, 0.00, 1.00, '%', 0.00, 1.00, 1.00, 0.00, 'Cash', 2, 2, '2020-07-07 20:11:19', '2020-07-07 20:11:19'),
(19, 'PO3202019', 'Cash', '2020-07-18', 16, 150.00, NULL, '%', 150.00, 500.00, 350.00, 0.00, 'Cash', 3, 3, '2020-07-18 15:59:19', '2020-07-18 15:59:19'),
(20, 'PO3202020', '1', '2020-07-18', 17, 7900.00, NULL, '%', 7900.00, 5000.00, 0.00, 2900.00, 'Cash', 3, 3, '2020-07-18 16:20:47', '2020-07-18 16:20:47'),
(21, 'PO3202021', 'Cash', '2020-07-19', 30, 10650.00, NULL, '%', 10650.00, 10000.00, 0.00, 650.00, 'Cash', 3, 3, '2020-07-18 20:53:57', '2020-07-18 20:53:57'),
(22, 'PO3202022', 'Cash', '2020-07-19', 28, 2040.00, NULL, '%', 2040.00, 2000.00, 0.00, 40.00, 'Cash', 3, 3, '2020-07-18 20:57:12', '2020-07-18 20:57:12'),
(23, 'PO3202023', 'Cash', '2020-07-19', 137, 202510.00, 0.00, '%', 202510.00, 200000.00, 0.00, 2510.00, 'Card', 3, 3, '2020-07-18 21:40:46', '2020-07-18 21:40:46'),
(24, 'PO3202024', '1', '2020-08-08', 26, 11900.00, 40.00, '%', 7140.00, 8000.00, 860.00, 0.00, 'Cash', 3, 3, '2020-08-08 16:18:43', '2020-08-08 16:18:43'),
(25, 'PO32020110125', 'Cash', '2020-11-01', 5, 2000.00, 5.00, '%', 1900.00, 14000.00, 12100.00, 0.00, 'Cash', 3, 3, '2020-11-01 05:30:18', '2020-11-01 05:30:18'),
(26, 'PO32020110126', 'Cash', '2020-11-01', 40, 150.00, NULL, '%', 150.00, NULL, NULL, NULL, 'Cash', 3, 3, '2020-11-01 07:45:15', '2020-11-01 07:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cancels`
--

CREATE TABLE `purchase_cancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` date NOT NULL,
  `p_date` date NOT NULL,
  `totalQty` int(11) DEFAULT NULL,
  `subTotal` double(10,2) DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_no`, `name`, `code`, `date`, `expiry_date`, `batch_no`, `qty`, `cost`, `total`, `shop`, `user`, `created_at`, `updated_at`) VALUES
(1, 'PO220201', 'Demoe322', '220205', '2020-07-08', NULL, NULL, 1, 0.00, 0.00, 2, 2, NULL, NULL),
(2, 'PO220201', 'Demoe322', '220205', '2020-07-08', NULL, NULL, 1, 0.00, 0.00, 2, 2, NULL, NULL),
(3, 'PO220201', 'Demoe322', '220205', '2020-07-08', NULL, NULL, 1, 0.00, 0.00, 2, 2, NULL, NULL),
(4, 'PO220201', 'Demoe322', '220205', '2020-07-08', NULL, NULL, 1, 0.00, 0.00, 2, 2, NULL, NULL),
(5, 'PO3202019', 'New 777', NULL, '2020-07-18', NULL, 'eeg', 15, 10.00, 150.00, 3, 3, NULL, NULL),
(6, 'PO3202019', 'Demo 6667', NULL, '2020-07-18', NULL, 'vvv', 1, 0.00, 0.00, 3, 3, NULL, NULL),
(7, 'PO3202020', 'New 532', NULL, '2020-07-18', NULL, '5n', 15, 500.00, 7500.00, 3, 3, NULL, NULL),
(8, 'PO3202020', 'Demo55', NULL, '2020-07-18', NULL, 'bb', 2, 200.00, 400.00, 3, 3, NULL, NULL),
(9, 'PO3202021', 'New 532', '320203', '2020-07-19', '2020-08-01', 'jjtj', 12, 880.00, 10560.00, 3, 3, NULL, NULL),
(10, 'PO3202021', 'New 777', '320204', '2020-07-19', '2020-08-06', 'gg', 18, 5.00, 90.00, 3, 3, NULL, NULL),
(11, 'PO3202022', 'New 777', '320204', '2020-07-19', '2020-09-01', '66', 6, 70.00, 420.00, 3, 3, NULL, NULL),
(12, 'PO3202022', 'Demo 6667', '320202', '2020-07-19', '2020-08-29', 'h77', 1, 30.00, 30.00, 3, 3, NULL, NULL),
(13, 'PO3202022', 'Demo55', '320201', '2020-07-19', '2020-07-20', 'ko9', 10, 60.00, 600.00, 3, 3, NULL, NULL),
(14, 'PO3202022', 'New 532', '320203', '2020-07-19', '2020-08-08', 'g7', 11, 90.00, 990.00, 3, 3, NULL, NULL),
(15, 'PO3202023', 'New 532', '320203', '2020-07-19', '2020-08-08', '4y', 100, 2000.00, 200000.00, 3, 3, NULL, NULL),
(16, 'PO3202023', 'New 777', '320204', '2020-07-19', '2020-07-03', 'ss', 15, 70.00, 1050.00, 3, 3, NULL, NULL),
(17, 'PO3202023', 'Demo 6667', '320202', '2020-07-19', '2020-08-08', 'ehej', 13, 70.00, 910.00, 3, 3, NULL, NULL),
(18, 'PO3202023', 'Demo55', '320201', '2020-07-19', '2020-07-31', 'sdfghj', 5, 70.00, 350.00, 3, 3, NULL, NULL),
(19, 'PO3202023', 'Demo4455456543', '320205', '2020-07-19', '2020-07-19', 'eh', 4, 50.00, 200.00, 3, 3, NULL, NULL),
(20, 'PO3202024', 'Demo4455456543', '320205', '2020-08-08', '2020-08-31', '1234', 15, 500.00, 7500.00, 3, 3, NULL, NULL),
(21, 'PO3202024', 'New 532', '320203', '2020-08-08', '2020-08-27', '454', 11, 400.00, 4400.00, 3, 3, NULL, NULL),
(22, 'PO32020110125', 'lkdjk894', '7123416', '2020-11-01', NULL, '12323r', 2, 400.00, 800.00, 3, 3, NULL, NULL),
(23, 'PO32020110125', 'Paracetamol', '202010311', '2020-11-01', NULL, '1234123fr', 1, 400.00, 400.00, 3, 3, NULL, NULL),
(24, 'PO32020110125', 'skldjcs', '101131000000', '2020-11-01', NULL, '312124sv', 2, 400.00, 800.00, 3, 3, NULL, NULL),
(25, 'PO32020110126', 'skldjcs', '101131000000', '2020-11-01', '2020-11-30', '840147', 10, 2.50, 25.00, 3, 3, NULL, NULL),
(26, 'PO32020110126', 'lkdjk894', '7123416', '2020-11-01', '2020-11-30', '01928', 10, 3.50, 35.00, 3, 3, NULL, NULL),
(27, 'PO32020110126', 'sadhdkh', '982374', '2020-11-01', '2020-11-30', '5465324', 20, 4.50, 90.00, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bkash_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reference_payments`
--

CREATE TABLE `reference_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `totalQty` int(11) DEFAULT NULL,
  `subTotal` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `d_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dCharge` double(10,2) DEFAULT NULL,
  `payable` double(10,2) DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `return` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_cancels`
--

CREATE TABLE `sale_cancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` date NOT NULL,
  `s_date` date NOT NULL,
  `totalQty` int(11) DEFAULT NULL,
  `subTotal` double(10,2) DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `business_name`, `business_type`, `reference_no`, `area`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Demo Shop', 'E-commerce', NULL, 'Dhaka', 'Dhaka-1205.', '2020-07-07 16:44:18', '2020-07-07 16:44:18'),
(2, 3, 'Sylhet City Center', 'Book Shop', NULL, 'Coxsbazar', 'nai', '2020-07-07 17:11:35', '2020-11-09 04:38:44'),
(3, 4, 'AMAR sHOP', 'Dealership', NULL, 'Lakshmipur', 'Dhaka', '2020-11-01 07:59:21', '2020-11-01 07:59:21'),
(4, 5, 'Shubastu Arched', 'Dealership', NULL, 'Dhaka', 'Dhaka', '2020-11-09 04:41:19', '2020-11-09 04:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `shop_employees`
--

CREATE TABLE `shop_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_packages`
--

CREATE TABLE `shop_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_payments`
--

CREATE TABLE `shop_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_payments`
--

INSERT INTO `shop_payments` (`id`, `date`, `package`, `price`, `days`, `type`, `number`, `comment`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, '2020-07-07', 'Free Demo Package', '0', '15', NULL, NULL, NULL, 1, 2, '2020-07-07 16:44:18', '2020-07-07 16:44:18'),
(2, '2020-07-07', 'Free Demo Package', '0', '15', NULL, NULL, NULL, 1, 3, '2020-07-07 17:11:35', '2020-07-07 17:11:35'),
(3, '2020-11-01', 'Free Demo Package', '0', '15', NULL, NULL, NULL, 1, 4, '2020-11-01 07:59:21', '2020-11-01 07:59:21'),
(4, '2020-11-09', 'Free Demo Package', '0', '15', NULL, NULL, NULL, 1, 5, '2020-11-09 04:41:19', '2020-11-09 04:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `shop` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `code`, `minimum`, `quantity`, `unit`, `cost`, `price`, `shop`, `user`, `created_at`, `updated_at`) VALUES
(3, 'New 532', '320203', 100, 134, 'carton', 821.25, 300.00, 3, 3, NULL, NULL),
(4, 'New 777', '320204', 100, 39, 'box', 53.75, 100.00, 3, 3, NULL, NULL),
(5, 'Demo 6667', '320202', 50, 14, 'packet', 50.00, 90.00, 3, 3, NULL, NULL),
(6, 'Demo55', '320201', 500, 15, 'kg', 65.00, 300.00, 3, 3, NULL, NULL),
(7, 'Demo4455456543', '320205', 500, 19, 'mltr', 275.00, 500.00, 3, 3, NULL, NULL),
(8, 'lkdjk894', '7123416', NULL, 12, NULL, 201.75, NULL, 3, 3, NULL, NULL),
(9, 'Paracetamol', '202010311', NULL, 1, NULL, 400.00, NULL, 3, 3, NULL, NULL),
(10, 'skldjcs', '101131000000', NULL, 12, NULL, 201.25, NULL, 3, 3, NULL, NULL),
(11, 'sadhdkh', '982374', NULL, 20, NULL, 4.50, NULL, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile`, `address`, `balance`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'Demo Supplier', '0192019090', 'nai', 100.00, 1, 3, '2020-07-18 15:07:26', '2020-07-18 15:07:26'),
(2, 'Maria Fatema', '0987654321', NULL, NULL, 1, 3, '2020-10-25 04:22:49', '2020-10-25 04:22:49'),
(3, 'Beximco new', '0987654321', NULL, NULL, 1, 3, '2020-10-25 05:12:42', '2020-11-03 06:07:16'),
(4, 'Menufecturer Info', NULL, NULL, NULL, 1, 3, '2020-10-26 09:23:53', '2020-10-26 09:23:53'),
(5, 'Paracetamol', NULL, NULL, NULL, 1, 3, '2020-10-26 09:25:45', '2020-10-26 09:25:45'),
(6, 'Abul Mia', '0987654321667', NULL, NULL, 1, 3, '2020-10-26 09:27:27', '2020-10-26 09:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_no` int(11) DEFAULT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` tinyint(4) DEFAULT NULL,
  `priority` tinyint(4) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_no` int(11) DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_no` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo Reference', '01910000000', 'reference@gmail.com', 'Reference', 'Active', NULL, '$2y$10$1KjPrsV3lVqxyASb/.mL8OVGS11eAfbakvpYegvY7.pxAeVZbos5K', NULL, '2020-07-07 17:00:00', NULL),
(2, 'Super Admin', '01210000000', 'demo@gmail.com', 'SuperAdmin', 'Active', NULL, '$2y$10$1KjPrsV3lVqxyASb/.mL8OVGS11eAfbakvpYegvY7.pxAeVZbos5K', 'O1SgxN6anHsxspIaJ806pC7BxCVSJLqxb6OEzbNILX8Ey5AkhxbGgp9Hd5wq', '2020-07-07 16:44:18', '2020-07-07 16:44:18'),
(3, 'Demo CRM', '01410000000', 'new@gmail.com', 'Admin', 'Active', NULL, '$2y$10$1KjPrsV3lVqxyASb/.mL8OVGS11eAfbakvpYegvY7.pxAeVZbos5K', 'BUvDvqaJYjIgS74vNABcRG1BHmxlQfpWgixbtqFM9PT10LSR4tQnkhSlBGci', '2020-07-07 17:11:35', '2020-07-07 17:11:35'),
(4, 'mONIR', '01909642730', 'monir@gmail.com', 'Admin', 'Active', NULL, '$2y$10$1KjPrsV3lVqxyASb/.mL8OVGS11eAfbakvpYegvY7.pxAeVZbos5K', NULL, '2020-11-01 07:59:21', '2020-11-01 07:59:21'),
(5, 'Arman', '01912345678', 'dhruv.islam7584@gmail.com', 'Admin', 'Active', NULL, '$2y$10$1KjPrsV3lVqxyASb/.mL8OVGS11eAfbakvpYegvY7.pxAeVZbos5K', 'VoLgqoVltEFKCWpK31anbYvylpOBP71O4IKxEQEvGZhRyLXVI3sFrsRa0qvc', '2020-11-09 04:41:19', '2020-11-09 04:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_categories`
--

CREATE TABLE `vehicle_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shop` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_categories`
--

INSERT INTO `vehicle_categories` (`id`, `name`, `details`, `status`, `shop`, `created_at`, `updated_at`) VALUES
(1, 'Bus', 'asdvasvd awga rgag argagra', 1, 3, '2020-11-03 11:02:21', '2020-11-03 11:07:25'),
(2, 'Private Car', 'lkjdsav apsdv apsodijv', 1, 3, '2020-11-03 11:16:39', '2020-11-03 11:22:10'),
(4, 'Motor Bike', 'asflva lsaidjh foIHF', 1, 3, '2020-11-03 11:25:29', '2020-11-03 11:25:29'),
(5, 'askdsad', 'asdasfasd', 1, 3, '2020-11-12 08:54:24', '2020-12-06 05:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_customer_id_foreign` (`customer_id`),
  ADD KEY `checkins_parking_group_id_foreign` (`parking_group_id`),
  ADD KEY `checkins_vehicle_category_id_foreign` (`vehicle_category_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_vehicle_type_id_foreign` (`vehicle_type_id`),
  ADD KEY `customers_parking_group_id_foreign` (`parking_group_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hourly_entries`
--
ALTER TABLE `hourly_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hourly_entries_vehicle_category_id_foreign` (`vehicle_category_id`);

--
-- Indexes for table `medicine_shelves`
--
ALTER TABLE `medicine_shelves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_types`
--
ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_units`
--
ALTER TABLE `medicine_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_checkins`
--
ALTER TABLE `monthly_checkins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_entries`
--
ALTER TABLE `monthly_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_entries_customer_id_foreign` (`customer_id`),
  ADD KEY `monthly_entries_vehicle_category_id_foreign` (`vehicle_category_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `parking_groups`
--
ALTER TABLE `parking_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_prices`
--
ALTER TABLE `parking_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parking_prices_delivery_id_foreign` (`delivery_id`),
  ADD KEY `parking_prices_parking_group_id_foreign` (`parking_group_id`),
  ADD KEY `parking_prices_vehicle_category_id_foreign` (`vehicle_category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_cancels`
--
ALTER TABLE `purchase_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_payments`
--
ALTER TABLE `reference_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_cancels`
--
ALTER TABLE `sale_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_employees`
--
ALTER TABLE `shop_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_packages`
--
ALTER TABLE `shop_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_payments`
--
ALTER TABLE `shop_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_entries`
--
ALTER TABLE `hourly_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_shelves`
--
ALTER TABLE `medicine_shelves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_units`
--
ALTER TABLE `medicine_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `monthly_checkins`
--
ALTER TABLE `monthly_checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monthly_entries`
--
ALTER TABLE `monthly_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_groups`
--
ALTER TABLE `parking_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parking_prices`
--
ALTER TABLE `parking_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_cancels`
--
ALTER TABLE `purchase_cancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_payments`
--
ALTER TABLE `reference_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_cancels`
--
ALTER TABLE `sale_cancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_employees`
--
ALTER TABLE `shop_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_packages`
--
ALTER TABLE `shop_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_payments`
--
ALTER TABLE `shop_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `checkins_parking_group_id_foreign` FOREIGN KEY (`parking_group_id`) REFERENCES `parking_groups` (`id`),
  ADD CONSTRAINT `checkins_vehicle_category_id_foreign` FOREIGN KEY (`vehicle_category_id`) REFERENCES `vehicle_categories` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_parking_group_id_foreign` FOREIGN KEY (`parking_group_id`) REFERENCES `parking_groups` (`id`),
  ADD CONSTRAINT `customers_vehicle_type_id_foreign` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_categories` (`id`);

--
-- Constraints for table `hourly_entries`
--
ALTER TABLE `hourly_entries`
  ADD CONSTRAINT `hourly_entries_vehicle_category_id_foreign` FOREIGN KEY (`vehicle_category_id`) REFERENCES `vehicle_categories` (`id`);

--
-- Constraints for table `monthly_entries`
--
ALTER TABLE `monthly_entries`
  ADD CONSTRAINT `monthly_entries_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `monthly_entries_vehicle_category_id_foreign` FOREIGN KEY (`vehicle_category_id`) REFERENCES `vehicle_categories` (`id`);

--
-- Constraints for table `parking_prices`
--
ALTER TABLE `parking_prices`
  ADD CONSTRAINT `parking_prices_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`),
  ADD CONSTRAINT `parking_prices_parking_group_id_foreign` FOREIGN KEY (`parking_group_id`) REFERENCES `parking_groups` (`id`),
  ADD CONSTRAINT `parking_prices_vehicle_category_id_foreign` FOREIGN KEY (`vehicle_category_id`) REFERENCES `vehicle_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
