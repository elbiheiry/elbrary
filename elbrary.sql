-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 07:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elbrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_day_intervals`
--

CREATE TABLE `active_day_intervals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_day_intervals`
--

INSERT INTO `active_day_intervals` (`id`, `name`, `start`, `end`, `day_id`, `created_at`, `updated_at`) VALUES
(1, 'الفتره الاولي ( من 9 صباحا لل 12 ظهرا )', '00:00:00', '16:00:00', 4, '2020-03-28 19:12:57', '2020-03-30 20:56:35'),
(2, 'الفتره الثانيه ( من 4 عصرا لل 7 مساءا)', '22:00:00', '23:00:00', 5, '2020-03-28 19:13:41', '2020-04-01 18:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `interval_id` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `order_id`, `name`, `city_id`, `phone`, `address`, `day_id`, `interval_id`, `notes`, `payment_method`, `confirmation`, `created_at`, `updated_at`) VALUES
(1, 2, 'mohamed elbiheiry', 4, '01011093385', 'First settlment', 4, 1, 'test', 'الدفع نقدا عند الاستلام', 'اتصال', '2020-03-30 19:37:51', '2020-03-30 19:37:51'),
(6, 9, 'محمد مصطفي سامي', 1, '01011093385', 'First settlment', 5, 2, NULL, 'الدفع نقدا عند الاستلام', 'اتصال', '2020-04-01 17:16:21', '2020-04-01 17:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', '2019-07-15 10:38:28', '2019-07-15 10:38:49'),
(4, 'القصيم', '2019-07-15 21:30:29', '2019-11-19 14:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `image`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'kVMyTPMMSzbCpt79Qw9pGKaONHiubtJwcGwAhe6O.png', 'توصيل مستمر', 'نقوم بالتوصيل كل ايام الاسبوع من العاشرة صباحا الى العاشرة ليلا', '2020-04-02 15:18:36', '2020-04-02 15:20:10'),
(2, 'iUrsfS1OinrygEcD2YW6iKYvvYcGUhhk87gkNXkN.png', 'تواصل مستمر', 'نستقبل استفساراتكم من الساعة السابعة صباحا الى الساعة الحادية عشرة ليلا', '2020-04-02 15:19:02', '2020-04-02 15:19:02'),
(3, 'g2zgZhtNTnnhO674yACSTujiaBXtJinn5zUm42ci.png', 'اماكن تواجدنا', 'حاليا نخدم فى جدة والمدينة فقط وقريبا مدن أخرى ان شاء الله', '2020-04-02 15:19:23', '2020-04-02 15:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Qcl1yfR3ebOPlNtjmIpff58U93u12hpd0tQWxxkb.png', 'ذبيحتك من المزرعة مباشرة الى موقعك منظفة ومقطعة ومغلفة', 'اجود أنواع الذبائح من المواشي المرباه في البيئة الطبيعية حيث تتغذى أغنامنا على الاعلاف الصحية مما ينعكس على جودة لحومها', '2020-04-02 15:36:12', '2020-04-02 14:48:06'),
(2, '8dhluMJ42PN2qeCxMWVwI39XQf95ogAxozwMeApX.png', 'البراري للذبائح', 'نحن احد مشاريع شركة البراري للمواد الغذائية والمتخصصة بتوفير اجود أنواع الذبائح من المواشي المرباه في البر في البيئة الطبيعية حيث تقع مزرعتنا في طريق المدينة المنورة بشمال ذهبان\r\n\r\nنحن نضمن وصول الذبيحة طازجه حيث ان الذبح يتم قبل الاستلام مباشرة كما نقوم بالكشف البيطري والرقابة الصحية ومراعاة اقصى درجات النظافة في كل المراحل التي تمر بها الذبيحة لضمان السلامة من الامراض حيث يتم الذبح في مسالخ الامانة وبإشراف طبي\r\n\r\nكما تتوفر لدينا خدمة الذبح والتنظيف والتقطيع والتغليف والتوصيل حيث ان التطقيع يكون حسب رغبة العميل والتوصيل يتم في سيارات مبردة والذبائح تصل كاملة بملحقاتها الاساسية', '2020-04-02 15:36:12', '2020-04-02 14:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'محمد مصطفي سامي', '01011093385', 'تجربه', '2020-04-02 16:18:01', '2020-04-02 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_01_110214_create_settings_table', 2),
(4, '2018_10_01_112934_create_home_sections_table', 3),
(5, '2018_10_01_130619_create_abouts_table', 4),
(6, '2018_10_01_134012_create_features_table', 5),
(7, '2018_10_01_135903_create_testimonials_table', 6),
(8, '2018_10_01_195106_create_products_table', 7),
(9, '2018_10_02_105654_create_messages_table', 8),
(10, '2018_10_04_113830_create_checkouts_table', 9),
(11, '2018_10_04_114135_create_orders_table', 9),
(12, '2018_10_10_213417_create_product_categories_table', 10),
(13, '2020_03_27_173500_create_product_cuts_table', 11),
(14, '2020_03_28_172243_create_product_accessories_table', 12),
(15, '2020_03_28_174041_create_product_discounts_table', 13),
(17, '2020_03_28_200917_create_product_active_days_table', 14),
(18, '2020_03_28_205958_create_active_day_intervals_table', 15),
(19, '2020_03_30_170727_create_orders_table', 16),
(20, '2020_03_30_212428_create_checkouts_table', 17),
(21, '2020_04_02_153327_create_homes_table', 18),
(22, '2020_04_02_165620_create_features_table', 19),
(23, '2020_04_02_165700_create_testimonials_table', 19),
(24, '2020_04_02_172340_create_messages_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `cut_id` int(10) UNSIGNED DEFAULT NULL,
  `accessories` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `category_id`, `amount`, `cut_id`, `accessories`, `other_price`, `other_cut`, `message`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 19, 1, 3, '[\"1\",\"2\",\"3\"]', '[\"10\",\"5\",\"10\"]', '[\"5\",\"6\",\"7\"]', 'لاتوجد ملاحظات', '843.75', '2020-03-30 15:31:15', '2020-03-30 16:40:52'),
(3, 1, 19, 2, NULL, 'null', '[null,null,null]', 'null', NULL, '2300', '2020-03-30 19:51:45', '2020-03-30 19:51:45'),
(4, 1, 22, 2, 2, '[\"1\"]', '[\"5\",null,null]', '[\"5\"]', NULL, '2500', '2020-03-30 19:52:10', '2020-03-30 19:52:10'),
(5, 1, NULL, 2, NULL, 'null', '[null,null,null]', 'null', NULL, '500', '2020-03-31 09:47:32', '2020-03-31 09:47:32'),
(6, 1, 19, 2, NULL, 'null', '[null,null,null]', 'null', NULL, '2300', '2020-04-03 19:26:31', '2020-04-03 19:26:31'),
(7, 1, 19, 2, 2, '[\"1\",\"2\",\"3\"]', '[\"9\",null,null]', '[\"5\"]', 'لا توجد', '2345', '2020-04-01 16:44:32', '2020-04-01 16:44:32'),
(8, 1, 19, 2, 2, '[\"1\",\"2\",\"3\"]', '[\"9\",null,null]', '[\"5\"]', 'لا توجد', '2345', '2020-04-01 16:44:32', '2020-04-01 16:44:32'),
(9, 1, 19, 2, NULL, 'null', '[null,null,null]', 'null', NULL, '2300', '2020-04-01 16:53:11', '2020-04-01 16:53:11'),
(11, 1, 19, 5, 3, '[\"1\",\"2\",\"3\"]', 'null', 'null', NULL, '1200', '2020-04-02 11:28:56', '2020-04-02 11:28:56'),
(12, 1, 19, 5, 3, '[\"1\",\"2\",\"3\"]', 'null', 'null', NULL, '1200', '2020-04-02 11:46:02', '2020-04-02 11:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'نعيمى', 'naaym', 250, '2130952a2a90199598b0307e1d620be6.IMG-20181229-WA0008.jpg', 1, '2018-10-01 19:14:17', '2020-03-29 16:26:27'),
(3, 'نجدى', 'njd', 200, '9616cddd5f386faa516f1252db85dc26.IMG-20181229-WA0010.jpg', 1, '2018-10-01 19:15:16', '2020-03-29 16:26:39'),
(5, 'تيوس بلديه', 'tyos-bldyh', 300, '1eb6b7ac7414c50c2782ae2fd7828ad8.IMG-20181229-WA0011.jpg', 1, '2018-11-04 17:37:20', '2020-03-29 16:26:45'),
(6, 'حري', 'hry', 350, '2d89b2403a9725e4631d2f72df0179a3.IMG-20181229-WA0009.jpg', 1, '2018-11-04 18:02:29', '2020-03-29 16:26:51'),
(7, 'سواكني مرابي', 'soakny-mraby', 400, '98656d758186c38888f361bee24e1b9b.IMG-20190403-WA0001.jpg', 1, '2019-04-03 13:43:26', '2020-03-29 16:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_accessories`
--

CREATE TABLE `product_accessories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_accessories`
--

INSERT INTO `product_accessories` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'الكرشه والمصارين', 1, '2020-03-28 15:33:09', '2020-03-28 15:33:09'),
(2, 'الراس', 1, '2020-03-28 15:33:19', '2020-03-28 15:33:19'),
(3, 'الليه', 1, '2020-03-28 15:33:22', '2020-03-28 15:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_active_days`
--

CREATE TABLE `product_active_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_active_days`
--

INSERT INTO `product_active_days` (`id`, `name`, `active`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'السبت', 1, 1, '2020-03-28 18:48:36', '2020-03-30 20:25:17'),
(2, 'الاحد', 1, 1, '2020-03-28 18:48:58', '2020-03-28 18:48:58'),
(3, 'الاثنين', 1, 1, '2020-03-28 18:49:02', '2020-03-28 18:49:02'),
(4, 'الثلاثاء', 1, 1, '2020-03-28 18:49:09', '2020-03-28 18:49:09'),
(5, 'الاربعاء', 1, 1, '2020-03-28 18:49:12', '2020-03-28 18:49:12'),
(6, 'الخميس', 1, 1, '2020-03-28 18:49:16', '2020-03-28 18:49:16'),
(7, 'الجمعه', 1, 1, '2020-03-28 18:49:19', '2020-03-28 18:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(8, 5, 'لباني', '950', '2018-11-04 17:52:44', '2019-12-13 21:26:39'),
(9, 6, 'هرفي', '1100', '2018-11-04 18:03:20', '2020-03-23 18:43:25'),
(10, 6, 'هرفي وسط', '1200', '2018-11-04 18:25:14', '2019-12-31 22:49:04'),
(11, 6, 'جذع وسط', '1350', '2018-11-04 18:25:25', '2019-12-31 22:50:08'),
(12, 3, 'هرفي', '1250', '2018-11-04 19:22:02', '2019-10-27 18:41:26'),
(15, 6, 'جذع ناهي', '1500', '2019-03-31 10:24:20', '2019-12-31 22:51:45'),
(16, 3, 'هرفي وسط', '1350', '2019-03-31 18:22:41', '2019-10-27 18:41:41'),
(17, 7, 'غير متوفر', '0000', '2019-04-03 13:44:27', '2020-03-03 11:20:01'),
(18, 7, 'غير متوفر', '0000', '2019-04-03 13:45:01', '2020-03-03 11:20:35'),
(19, 1, 'هرفي', '1150', '2019-06-30 21:50:42', '2019-12-31 22:46:18'),
(22, 1, 'هرفي وسط', '1250', '2019-08-17 16:34:41', '2019-10-27 18:39:00'),
(23, 1, 'جذع وسط', '1450', '2019-08-17 16:35:21', '2019-10-27 18:39:13'),
(24, 1, 'جذع ناهي', '1600', '2019-08-17 16:35:49', '2019-09-26 16:04:44'),
(25, 3, 'جذع وسط', '1500', '2019-08-17 16:38:53', '2019-09-26 16:05:57'),
(26, 3, 'جذع ناهي', '1700', '2019-08-17 16:39:24', '2019-09-26 16:05:42'),
(36, 5, 'وسط', '1150', '2019-12-13 16:46:14', '2019-12-13 21:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_cuts`
--

CREATE TABLE `product_cuts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cuts`
--

INSERT INTO `product_cuts` (`id`, `name`, `type`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'ثلاجه', 0, 0, 1, '2020-03-27 18:42:32', '2020-03-27 18:42:32'),
(3, 'غوري كامل', 0, 0, 1, '2020-03-27 18:42:40', '2020-03-27 18:42:40'),
(4, 'انصاف', 0, 0, 1, '2020-03-27 18:42:53', '2020-03-27 18:42:53'),
(5, 'مفروم', 1, 5, 1, '2020-03-27 18:43:02', '2020-03-27 18:43:02'),
(6, 'مقلقل', 1, 5, 1, '2020-03-27 18:43:16', '2020-03-27 18:43:16'),
(7, 'الريش', 1, 5, 1, '2020-03-27 18:43:25', '2020-03-27 18:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `type`, `amount`, `code`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 'XhtnD1', 1, '2020-03-28 16:36:02', '2020-03-28 16:37:50'),
(3, 0, 25, 'XhtnD2', 1, '2020-03-28 16:38:30', '2020-03-28 16:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `head` tinyint(1) NOT NULL,
  `packing` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `phone`, `address`, `email`, `facebook`, `twitter`, `youtube`, `brief`, `head`, `packing`, `created_at`, `updated_at`) VALUES
(1, 'البراري للذبائح', '00966123456789', 'المدينة المنورة - المملكة العربية السعودية', '7ossamsh@gmail.com', 'http://facebook.com/', 'http://twitter.com/', 'http://youtube.com/', 'نحن نضمن وصول الذبيحة طازجه حيث ان الذبح يتم قبل الاستلام مباشرة كما نقوم بالكشف البيطري والرقابة الصحية ومراعاة اقصى درجات النظافة في كل المراحل التي تمر بها الذبيحة لضمان السلامة من الامراض حيث يتم الذبح في مسالخ الامانة وبإشراف طبي', 1, 1, '2018-10-01 11:05:15', '2020-03-27 15:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'elbiheiry2@gmail.com', '2020-04-02 16:22:04', '2020-04-02 16:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'veBNRuNkwq7wJDwFA7heAOsVIoLQjVh8cg3xHWYC.jpeg', '2020-04-02 15:22:20', '2020-04-02 15:22:39'),
(2, 'rULh0is2FeM64lPnwGJs4pjBM9vBsJMwFNT6e3IM.jpeg', '2020-04-02 15:22:26', '2020-04-02 15:22:26'),
(4, 'ZOcUuaYEBBJW1g4ULhXjhWfc7KTCMrdUqcU6ZkZs.jpeg', '2020-04-02 15:22:53', '2020-04-02 15:22:53'),
(5, 'Ygtx4z8QVlnmN3DOGipj0E6yNQPsS2lW9LPRIaTe.jpeg', '2020-04-02 15:22:58', '2020-04-02 15:22:58'),
(6, 'eJDu6OxbCj3LX3GUzH4vpUh12BmXlEPhuxHuFLS5.jpeg', '2020-04-02 15:23:04', '2020-04-02 15:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@elbarai.com', '$2y$10$1I870fV.8qMJco6mPO.6VO3lXP/.fyAZ/V2mc6ItREvLXPkl47zsq', 'BQ1VD66SMoUiklddYKLE0GgGAMMdzEmqWVTrUrR3ISyap8XSOPMMDBq0BEen', '2018-10-01 10:51:52', '2018-10-01 10:51:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_day_intervals`
--
ALTER TABLE `active_day_intervals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_day_intervals_day_id_foreign` (`day_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_order_id_foreign` (`order_id`),
  ADD KEY `checkouts_city_id_foreign` (`city_id`),
  ADD KEY `checkouts_day_id_foreign` (`day_id`),
  ADD KEY `checkouts_interval_id_foreign` (`interval_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_category_id_foreign` (`category_id`),
  ADD KEY `orders_cut_id_foreign` (`cut_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_accessories`
--
ALTER TABLE `product_accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_accessories_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_active_days`
--
ALTER TABLE `product_active_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_active_days_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cuts`
--
ALTER TABLE `product_cuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cuts_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_discounts_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `active_day_intervals`
--
ALTER TABLE `active_day_intervals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_accessories`
--
ALTER TABLE `product_accessories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_active_days`
--
ALTER TABLE `product_active_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_cuts`
--
ALTER TABLE `product_cuts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_day_intervals`
--
ALTER TABLE `active_day_intervals`
  ADD CONSTRAINT `active_day_intervals_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `product_active_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkouts_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `product_active_days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkouts_interval_id_foreign` FOREIGN KEY (`interval_id`) REFERENCES `active_day_intervals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkouts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_cut_id_foreign` FOREIGN KEY (`cut_id`) REFERENCES `product_cuts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_accessories`
--
ALTER TABLE `product_accessories`
  ADD CONSTRAINT `product_accessories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_active_days`
--
ALTER TABLE `product_active_days`
  ADD CONSTRAINT `product_active_days_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_cuts`
--
ALTER TABLE `product_cuts`
  ADD CONSTRAINT `product_cuts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD CONSTRAINT `product_discounts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
