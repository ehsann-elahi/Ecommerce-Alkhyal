-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 09:31 AM
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
-- Database: `alkhyalcurtain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@admin.com', '$2y$10$IFryMBAGBhmgsKOBsnhVMOKVfUHI39dt7Ef69aooMLgVJCushV51K', NULL, '2025-02-13 06:23:20', '2025-02-16 02:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_profiles`
--

CREATE TABLE `admin_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`id`, `admin_id`, `first_name`, `last_name`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'admin', 'admin', 'admin@admin.com', '/uploads/profile/1739690052.jpg', '2025-02-16 02:14:12', '2025-02-16 02:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Linen & Bedding', NULL, '1748864036banner1.jpg', '2025-02-10 05:49:09', '2025-06-02 06:33:56'),
(2, 'Curtains', NULL, '1748864045banner2.jpg', '2025-02-10 05:49:14', '2025-06-02 06:34:05');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '17391863145-360x360.jpg', NULL, NULL, NULL),
(2, 1, '17391863146-360x360.jpg', NULL, NULL, NULL),
(7, 2, '1739187681_4-360x360.jpg', NULL, NULL, NULL),
(8, 2, '1739187681_8-360x360.jpg', NULL, NULL, NULL),
(9, 5, '1739188511_5-360x360.jpg', NULL, NULL, NULL),
(10, 5, '1739188511_9-360x360.jpg', NULL, NULL, NULL),
(11, 5, '1739188511_11-360x360.jpg', NULL, NULL, NULL);

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
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2020_12_03_074525_create_galleries_table', 1),
(41, '2023_08_23_145151_create_admins_table', 1),
(42, '2023_08_23_145318_create_admin_password_resets_table', 1),
(43, '2023_08_23_145414_create_admin_profiles_table', 1),
(44, '2024_03_26_111114_create_user_profiles_table', 1),
(45, '2025_01_23_122440_create_categories_table', 1),
(46, '2025_01_25_063021_create_products_table', 1),
(47, '2025_02_11_102102_create_reviews_table', 1),
(49, '2025_02_12_143609_create_orders_table', 2),
(50, '2025_02_13_135831_create_newsletters_table', 3),
(51, '2025_03_04_110913_create_promotions_table', 4),
(52, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(53, '2025_08_07_053938_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'demo@deom.com', '2025-02-13 09:02:51', '2025-02-13 09:02:51'),
(2, 'shakeell@demo.com', '2025-02-13 09:05:54', '2025-02-13 09:05:54'),
(4, 'ra@as.com', '2025-02-13 09:10:25', '2025-02-13 09:10:25'),
(5, 'ad@asd.com', '2025-02-13 09:11:00', '2025-02-13 09:11:00'),
(6, 'asd@as.com', '2025-02-13 09:11:41', '2025-02-13 09:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `guest_address` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `guest_name`, `guest_email`, `guest_phone`, `guest_address`, `order_number`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, NULL, NULL, NULL, 'ORD-704801', 554.00, '1', '2025-02-13 07:08:23', '2025-02-18 07:44:05'),
(4, NULL, NULL, NULL, NULL, NULL, 'ORD-975831', 554.00, '0', '2025-02-13 07:10:02', '2025-02-13 07:10:02'),
(5, NULL, 'shakeel', 'xyz@xyz.com', '03999', 'XYZ', 'ORD-742984', 554.00, '0', '2025-02-13 07:12:23', '2025-02-13 07:12:23'),
(6, NULL, 'Numan', 'admin@admin.com', '03000', 'werq', 'ORD-842408', 65.00, '0', '2025-02-13 09:33:12', '2025-02-13 09:33:12'),
(7, NULL, 'xyz', 'xyz@xyz.com', '12312', 'xyz', 'ORD-258303', 315.00, '0', '2025-02-18 07:43:10', '2025-02-18 07:43:10'),
(8, NULL, 'Ehsan Shafique', 'ehsanshafique204@gmail.com', '34567890987', 'Ilyas Park St No 6 Fsd', 'ORD-20250807-29465', 616.00, '1', '2025-08-07 02:36:01', '2025-08-07 02:36:01'),
(9, NULL, 'Ehsan Shafique', 'ehsanshafique204@gmail.com', '34567890987', 'Ilyas Park St No 6 Fsd', 'ORD-20250807-70070', 110.00, '1', '2025-08-07 02:48:43', '2025-08-07 02:48:43'),
(10, NULL, 'Ehsan Shafique', 'ehsanshafique204@gmail.com', '34567890987', 'Ilyas Park St No 6 Fsd', 'ORD-20250807-18926', 65.00, '1', '2025-08-07 02:57:39', '2025-08-07 02:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 4, 1, 554.00, '2025-02-13 07:08:23', '2025-02-13 07:08:23'),
(4, 4, 4, 1, 554.00, '2025-02-13 07:10:02', '2025-02-13 07:10:02'),
(5, 5, 4, 1, 554.00, '2025-02-13 07:12:23', '2025-02-13 07:12:23'),
(6, 6, 2, 1, 65.00, '2025-02-13 09:33:12', '2025-02-13 09:33:12'),
(7, 7, 1, 7, 45.00, '2025-02-18 07:43:10', '2025-02-18 07:43:10'),
(9, 9, 2, 1, 65.00, '2025-08-07 02:48:43', '2025-08-07 02:48:43'),
(10, 9, 1, 1, 45.00, '2025-08-07 02:48:43', '2025-08-07 02:48:43'),
(11, 10, 2, 1, 65.00, '2025-08-07 02:57:39', '2025-08-07 02:57:39');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tap_id` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(10) NOT NULL DEFAULT 'AED',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `raw_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_response`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `tap_id`, `transaction_id`, `amount`, `currency`, `status`, `raw_response`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, 'txn_689457141da38', 616.00, 'AED', 'CAPTURED', NULL, '2025-08-07 02:36:01', '2025-08-07 02:36:01'),
(2, 9, NULL, 'txn_68945a1071776', 110.00, 'AED', 'CAPTURED', NULL, '2025-08-07 02:48:43', '2025-08-07 02:48:43'),
(3, 10, 'chg_TS02A4920251343j2PT0808863', 'txn_68945b60d5388', 65.00, 'AED', 'CAPTURED', '{\"id\":\"chg_TS02A4920251343j2PT0808863\",\"object\":\"charge\",\"live_mode\":false,\"customer_initiated\":true,\"api_version\":\"V2\",\"method\":\"GET\",\"status\":\"CAPTURED\",\"amount\":65,\"currency\":\"AED\",\"threeDSecure\":true,\"card_threeDSecure\":true,\"save_card\":false,\"product\":\"GOSELL\",\"description\":\"Product Purchase\",\"metadata\":{\"session_id\":\"r4aZEhnz2yWaxO4lXxOTYkF0V2VA3gKdRgmaEcuO\"},\"order\":{\"id\":\"ord_WX2W54251343r8sf8la79708\"},\"transaction\":{\"authorization_id\":\"057432\",\"timezone\":\"UTC+03:00\",\"created\":\"1754660629863\",\"expiry\":{\"period\":30,\"type\":\"MINUTE\"},\"asynchronous\":false,\"amount\":65,\"currency\":\"AED\",\"date\":{\"created\":1754660629863,\"completed\":1754660701328,\"transaction\":1754660629863}},\"reference\":{\"track\":\"tck_TS07A4920251343Dh4q0808879\",\"payment\":\"49082513430887980917\",\"transaction\":\"txn_68945b60d5388\",\"order\":\"ord_68945b60d538a\",\"acquirer\":\"522013057432\",\"gateway\":\"123456789\"},\"response\":{\"code\":\"000\",\"message\":\"Captured\"},\"card_security\":{\"code\":\"M\",\"message\":\"MATCH\"},\"security\":{\"threeDSecure\":{\"id\":\"auth_payer_fvTM44251344MCEy8zY7V176\",\"status\":\"Y\"}},\"acquirer\":{\"response\":{\"code\":\"00\",\"message\":\"Approved\"}},\"gateway\":{\"response\":{\"code\":\"0\",\"message\":\"APPROVED\"}},\"card\":{\"object\":\"card\",\"first_six\":\"512345\",\"first_eight\":\"51234500\",\"scheme\":\"MASTERCARD\",\"brand\":\"MASTERCARD\",\"last_four\":\"0008\",\"name\":\"TESTCARD\",\"expiry\":{\"month\":\"01\",\"year\":\"30\"}},\"receipt\":{\"id\":\"205008251343084847\",\"email\":true,\"sms\":false},\"customer\":{\"id\":\"cus_TS07A5920251344r9ZR0808436\",\"first_name\":\"Ehsan Shafique\",\"email\":\"ehsanshafique204@gmail.com\",\"phone\":{\"country_code\":\"971\",\"number\":\"34567890987\"}},\"merchant\":{\"country\":\"SA\",\"currency\":\"KWD\",\"id\":\"599424\"},\"source\":{\"object\":\"token\",\"type\":\"CARD_NOT_PRESENT\",\"payment_type\":\"DEBIT\",\"channel\":\"INTERNET\",\"id\":\"tok_TS54A43251344WW548OF74421\",\"on_file\":false,\"payment_method\":\"MASTERCARD\"},\"redirect\":{\"status\":\"SUCCESS\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/payment\\/callback\"},\"authentication\":{\"version\":\"3DS2\",\"acsEci\":\"02\",\"authentication_token\":\"kHyn+7YFi1EUAREAAAAvNUe6Hv8=\",\"transaction_id\":\"a39ae589-3f6d-4cbf-b86e-c672e806bb7c\",\"paRes_status\":\"Y\",\"protocol_version\":\"2.2.0\",\"transaction_status\":\"Y\",\"ds_transaction_id\":\"a39ae589-3f6d-4cbf-b86e-c672e806bb7c\",\"threeDSecure\":{\"acs_eci\":\"02\",\"authentication_token\":\"kHyn+7YFi1EUAREAAAAvNUe6Hv8=\",\"transaction_id\":\"a39ae589-3f6d-4cbf-b86e-c672e806bb7c\",\"version\":\"3DS2\",\"acs_trans_id\":\"9b298d96-9dcb-4c86-8a18-ebf1beaefcbb\",\"message_version\":\"2.2.0\",\"trans_status\":\"Y\",\"mode\":\"C\",\"status\":\"AUTHENTICATED\"},\"id\":\"auth_payer_fvTM44251344MCEy8zY7V176\",\"status\":\"AUTHENTICATED\"},\"activities\":[{\"id\":\"activity_TS01A0020251345Jx5n0808546\",\"object\":\"activity\",\"created\":1754660629863,\"status\":\"INITIATED\",\"currency\":\"AED\",\"amount\":65,\"remarks\":\"charge - created\",\"txn_id\":\"chg_TS02A4920251343j2PT0808863\"},{\"id\":\"activity_TS01A0120251345Zx3u0808328\",\"object\":\"activity\",\"created\":1754660701328,\"status\":\"CAPTURED\",\"currency\":\"AED\",\"amount\":65,\"remarks\":\"charge - captured\",\"txn_id\":\"chg_TS02A4920251343j2PT0808863\"}],\"auto_reversed\":false,\"risk\":{\"id\":\"protect_TS070020251345e5LT0808537\",\"is_in_exclusion_list\":true,\"status\":\"ACCEPTED\"}}', '2025-08-07 02:57:39', '2025-08-07 02:57:39');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `type` enum('Featured','Latest','Special') DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `title`, `meta_description`, `slug`, `price`, `stock`, `type`, `img`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sheer', 'Best sheer curtains for Home decoration', 'Best sheer curtains for Home decoration', 'best', 45.00, 10, NULL, '17391863141-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Add charm and softness to your decor with sheer panels that offer beauty and privacy.</span> <span style=\"font-size:14.0pt\">Ideal for living rooms bedrooms or even dining areas they add movement depth and a hint of luxury without overwhelming the space.</span></span></span></p>\r\n</body>\r\n</html>', '2025-02-10 06:18:34', '2025-08-08 02:02:55'),
(2, 2, 'Blackout', 'Blackout Curtain', 'Best Curtain', 'sheer curtains for Home decoration', 65.00, 5, NULL, '173918714912-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>', '2025-02-10 06:32:29', '2025-08-08 02:07:28'),
(3, 2, 'Sheer & Blackout', '', '', '', 120.00, 83, 'Featured', '17391877646-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>', '2025-02-10 06:42:44', '2025-02-13 07:42:04'),
(4, 2, 'Roman Blinds', '', '', '', 554.00, 798, 'Special', '173918778215-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>', '2025-02-10 06:43:02', '2025-02-13 07:42:37'),
(5, 2, 'Roller Blinds', '', '', '', 393.00, 58, 'Special', '17391885118-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>', '2025-02-10 06:55:11', '2025-02-13 07:43:08'),
(6, 1, 'Roller Blinds Premium', '', '', '', 561.00, 20, 'Featured', '173945078217391877646-360x360.jpg', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>', '2025-02-13 07:46:22', '2025-02-13 07:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `redirect_link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `image`, `video_path`, `redirect_link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'promotion_images/6mtwM02w3HEZu35ZQ9ToibZ6xdBLnWQ7wKaVU1K4.jpg', NULL, NULL, 0, '2025-03-05 03:35:56', '2025-06-02 05:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 5, 'Numan', 'Outstandign PRoduct', 3, '2025-02-11 05:28:57', '2025-02-11 05:28:57'),
(2, 5, 'Nomi007', 'Testing', 2, '2025-02-11 05:29:42', '2025-02-11 05:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@user.com', 'FSD', '03000', '2025-02-13 06:23:20', '$2y$10$uGwJN7PZyji.lsbWQvGZ5OWJRs24k4B7SuUgZeRbu4aZ9dwkriuBK', 'wwOeIlzymWCWMyagsoK64ABlhabco0OBlSJOfEiAJE8xiJ9PYdfUThMh5IR1', NULL, NULL),
(2, 'numan', 'demo@demo.com', 'XYZ', '03000', NULL, '$2y$10$IzpGViVe0z3Mj9L1p6Ccfet97iHav2FsWQ87CqbSQn/0SwwuMc6be', NULL, '2025-02-13 06:51:56', '2025-02-13 06:51:56'),
(3, 'sahmai', 'rehman@rehman.com', 'XYZ', '03000', NULL, '$2y$10$kcqqM2Gik5gzKlTod4bE8epd49NzWj/Y8mLu8e.LSqniKWCeL7LzC', NULL, '2025-02-13 07:06:24', '2025-02-13 07:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
