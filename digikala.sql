-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 01:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digikala`
--

-- --------------------------------------------------------

--
-- Table structure for table `amazing`
--

CREATE TABLE `amazing` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tozihat` text COLLATE utf8_unicode_ci,
  `price1` int(11) DEFAULT NULL,
  `price2` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `timeStamp` int(11) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amazing`
--

INSERT INTO `amazing` (`id`, `m_title`, `title`, `tozihat`, `price1`, `price2`, `time`, `timeStamp`, `product_id`) VALUES
(8, 'ماشین اصلاح صورت', 'ماشین اصلاح صورت پاناسونیک مدل ES-LF51', 'دارای 3 تیغ مجزا\r\nساخت ایتالیا\r\nجنس استیل', 1056000, 825000, 12, 1534725077, 26),
(9, 'کوله پشتی', 'کوله پشتی لپ تاپ کیس لاجیک مدل Jaunt WMBP -115 مناسب برای لپ تاپ 15.6 اینچی', 'دارای رنگ بندی متعدد\r\nقیمت مناسب\r\nجنس ابریشم', 219000, 180000, 12, 1534725411, 25),
(10, 'کولر آبی', 'کولر آبی فریدولین مدل PC3000', 'خنک کننده\r\nدارای تنظیم خودکار سرما\r\nساخت آلمان', 759000, 700000, 1, 1534687836, 24),
(11, 'ادوپر فیوم زنانه', 'ادو پرفیوم زنانه شوپارد مدل Happy Spirit حجم 75 میلی لیتر', 'عطر خوشبو رایه دار\r\nساخت هند\r\nرنگ زیبا', 335000, 300000, 54, 1534876827, 23),
(12, 'تن ماهیتن ماهیتن ماهیتن ماهی', 'تن ماهی در روغن گیاهی صیدانه مقدار 170 گرم', 'گوشت ماهی جنوب\r\nدارای روغن حیوانی\r\nلذیذ', 6400, 4400, 32, 1534797692, 22),
(13, 'گوشی اپل', 'گوشی موبایل اپل مدل Mate 10 lite RNE-L21 دو سیم‌ کارت', 'قثی', 2000000, 1800000, 10, 1540335869, 15);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_fa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `root_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `parents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title_fa`, `title_en`, `parent_id`, `root_id`, `is_active`, `image`, `depth`, `parents`, `display_order`) VALUES
(15, 'کالای دیجیتال', 'Electronic _ Devices', 0, NULL, 1, NULL, NULL, NULL, NULL),
(19, 'لوازم خانگی', 'Lavazeme-Khanegi', 0, NULL, 1, NULL, NULL, NULL, NULL),
(20, 'زیبایی و سلامت', 'Zibatyi Salamat', 0, NULL, 1, NULL, NULL, NULL, NULL),
(21, 'فرهنگ و هنر', 'farhang - honar', 0, NULL, 1, NULL, NULL, NULL, NULL),
(22, 'ورزش و سرگرمی', 'Varzesh - Sargarmi', 0, NULL, 1, NULL, NULL, NULL, NULL),
(23, 'مادر و کودک', 'Madar - Koodak', 0, NULL, 1, NULL, NULL, NULL, NULL),
(24, 'ابزار و الکتریک', 'Abzar - Electrik', 0, NULL, 1, NULL, NULL, NULL, NULL),
(25, 'وسایل نقلیه و لوازم', 'Vasayele Nahgliye va Lavazem', 0, NULL, 1, NULL, NULL, NULL, NULL),
(26, 'موبایل', 'Mobile', 15, NULL, 1, 'category26.jpg', NULL, NULL, NULL),
(27, 'گوشی موبایل', 'Mobile Phone', 26, NULL, 1, NULL, NULL, NULL, NULL),
(28, 'Apple', 'filter_brand_54', 27, NULL, 1, NULL, NULL, NULL, NULL),
(29, 'Samsung', 'filter_brand_55', 27, NULL, 1, NULL, NULL, NULL, NULL),
(30, 'LG', 'filter_brand_56', 27, NULL, 1, NULL, NULL, NULL, NULL),
(31, 'Huawie', 'filter_brand_58', 27, NULL, 1, NULL, NULL, NULL, NULL),
(32, 'HTC', 'filter_brand_78', 27, NULL, 1, NULL, NULL, NULL, NULL),
(33, 'Sony', 'filter_brand_57', 27, NULL, 1, NULL, NULL, NULL, NULL),
(35, 'Asuse', 'filter_brand_79', 27, NULL, 1, NULL, NULL, NULL, NULL),
(36, 'Lenovo', 'filter_brand_80', 27, NULL, 1, NULL, NULL, NULL, NULL),
(37, 'Motorola', 'filter_brand_81', 27, NULL, 1, NULL, NULL, NULL, NULL),
(38, 'Microsoft', 'filter_brand_82', 27, NULL, 1, NULL, NULL, NULL, NULL),
(39, 'Devo', 'Devo', 27, NULL, 1, NULL, NULL, NULL, NULL),
(40, 'Marshal', 'Marshal', 27, NULL, 1, NULL, NULL, NULL, NULL),
(41, 'انواع گوشی', 'Mobile Phone', 26, NULL, 1, NULL, NULL, NULL, NULL),
(42, 'گوشی دو سیمکارت', 'ghoshi 2 simkart', 41, NULL, 1, NULL, NULL, NULL, NULL),
(43, 'گوشی تک سیمکارت', 'Goshi Tak Simkart', 41, NULL, 1, NULL, NULL, NULL, NULL),
(44, 'گوشی های فور جی', 'Goshihaye 4G', 41, NULL, 1, NULL, NULL, NULL, NULL),
(45, 'گوشی های کلاسیک', 'Goshi Klassic', 41, NULL, 1, NULL, NULL, NULL, NULL),
(46, 'تبلت', 'Tablet', 41, NULL, 1, NULL, NULL, NULL, NULL),
(47, 'تبلت و کتاب خوان', 'Tablet Read E-Book', 15, NULL, 1, 'category47.jpg', NULL, NULL, NULL),
(48, 'لپ تاپ', 'Lap Top', 15, NULL, 1, 'category48.jpg', NULL, NULL, NULL),
(49, 'بر اساس سیستم عامل', 'BarAsaseSystemAmel', 26, NULL, 1, NULL, NULL, NULL, NULL),
(50, 'اندروید', 'filter_type_60', 49, NULL, 1, NULL, NULL, NULL, NULL),
(51, 'آی او اس', 'filter_type_61', 49, NULL, 1, NULL, NULL, NULL, NULL),
(52, 'ویندوز فون', 'filter_tyoe_62', 49, NULL, 1, NULL, NULL, NULL, NULL),
(55, 'سایر سیستم عامل ها', 'filter_type_63', 49, NULL, 1, NULL, NULL, NULL, NULL),
(56, 'هدفون تو گوشی', 'Hedfone in phone', 26, NULL, 1, NULL, NULL, NULL, NULL),
(57, 'هدفون', 'Hedforn', 26, NULL, 1, NULL, NULL, NULL, NULL),
(58, 'لوازم جانبی گوشی موبایل', 'Mobile Accessories', 26, NULL, 1, NULL, NULL, NULL, NULL),
(59, 'محافظ صفحه نمایش', 'Mohafaze saffhe namayesh', 58, NULL, 1, NULL, NULL, NULL, NULL),
(60, 'کیف و کاور گوشی', 'kef Va Kavere Goshi', 58, NULL, 1, NULL, NULL, NULL, NULL),
(61, 'هندز فری', 'Handzferi', 58, NULL, 1, NULL, NULL, NULL, NULL),
(62, 'کارت حافظه Micro Sd', 'Micro Sd', 58, NULL, 1, NULL, NULL, NULL, NULL),
(63, 'پاور بانک', 'Paver Bank', 58, NULL, 1, NULL, NULL, NULL, NULL),
(64, 'مونو باد و پایه نگهدارنده', 'Paye Negahdarandeh', 58, NULL, 1, NULL, NULL, NULL, NULL),
(65, 'شارژر موبایل', 'Shargere Mobile', 58, NULL, 1, NULL, NULL, NULL, NULL),
(66, 'باطری گوشی', 'Batri Goshi', 58, NULL, 1, NULL, NULL, NULL, NULL),
(67, 'قلم لمسی', 'GHalame Lamsi', 58, NULL, 1, NULL, NULL, NULL, NULL),
(68, 'گجت های موبایل', 'Mobile Phone', 26, NULL, 1, NULL, NULL, NULL, NULL),
(69, 'رده کاربری', 'Mobile Phone', 26, NULL, 1, NULL, NULL, NULL, NULL),
(70, 'مناسب بازی', 'Monasebe Bazi', 69, NULL, 1, NULL, NULL, NULL, NULL),
(71, 'مناسب عکاسی', 'Monasebe Akkasi', 69, NULL, 1, NULL, NULL, NULL, NULL),
(72, 'مناسب عکاسی صنفی', 'Monasebe Akkasi Sanafi', 69, NULL, 1, NULL, NULL, NULL, NULL),
(73, 'مقاوم در برابر آب', 'Moghavem Darbarabare Ab', 69, NULL, 1, NULL, NULL, NULL, NULL),
(74, 'الفون', 'Elfon', 27, NULL, 1, NULL, NULL, NULL, NULL),
(82, 'لپ تاب و الکترابوک', 'laptab and elektabook', 48, NULL, 1, NULL, NULL, NULL, NULL),
(83, 'Apple', 'filter_brand_84', 82, NULL, 1, NULL, NULL, NULL, NULL),
(84, 'ایسوس', 'filter_brand_85', 82, NULL, 1, NULL, NULL, NULL, NULL),
(85, 'Lenovo', 'filter_brand_86', 82, NULL, 1, NULL, NULL, NULL, NULL),
(86, 'اچ پی', 'filter_brand_87', 82, NULL, 1, NULL, NULL, NULL, NULL),
(87, 'Acer', 'filter_brand_88', 82, NULL, 1, NULL, NULL, NULL, NULL),
(88, 'MSI', 'filter_brand_89', 82, NULL, 1, NULL, NULL, NULL, NULL),
(89, 'Dell', 'filter_brand_90', 82, NULL, 1, NULL, NULL, NULL, NULL),
(90, 'بر اساس نوع', 'type', 48, NULL, 1, NULL, NULL, NULL, NULL),
(91, 'باریک و سبک', 'filter_type_92', 90, NULL, 1, NULL, NULL, NULL, NULL),
(92, 'صفحه نمایش لمسی', 'filter_type_93', 90, NULL, 1, NULL, NULL, NULL, NULL),
(93, 'تبدیل پذیر', 'filter_type_94', 90, NULL, 1, NULL, NULL, NULL, NULL),
(94, 'اندازه صفحه نمایش', 'sizeScreen', 48, NULL, 1, NULL, NULL, NULL, NULL),
(95, 'تا 13 اینچ', 'filter_sizeScreen_96', 94, NULL, 1, NULL, NULL, NULL, NULL),
(96, '13 اینچ تا 15 اینچ', 'filter_sizeScreen_97', 94, NULL, 1, NULL, NULL, NULL, NULL),
(97, '15اینچ و بزرگتر', 'filter_sizeScreen_98', 94, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(15, 14),
(26, 14),
(27, 14),
(28, 14),
(15, 15),
(26, 15),
(27, 15),
(28, 15),
(15, 16),
(26, 16),
(27, 16),
(29, 16),
(15, 17),
(26, 17),
(27, 17),
(30, 17),
(15, 18),
(48, 18),
(15, 19),
(48, 19),
(15, 20),
(48, 20),
(19, 21),
(19, 22),
(20, 23),
(19, 24),
(20, 25),
(20, 26),
(15, 27),
(26, 27),
(28, 27),
(74, 27),
(15, 28),
(26, 28),
(27, 28),
(28, 28),
(15, 29),
(48, 29),
(82, 29),
(83, 29),
(15, 30),
(26, 30),
(27, 30),
(15, 31),
(26, 31),
(58, 31),
(61, 31),
(15, 32),
(26, 32),
(27, 32);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `title`, `code`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'بنفش', '9496FF', 18, '2018-08-19 07:25:42', '2018-08-19 07:25:42'),
(2, 'آبی آسمانی', '53E8FF', 17, '2018-08-21 14:38:40', '2018-08-21 14:38:40'),
(3, 'مشکی', '040404', 17, '2018-08-21 14:38:40', '2018-08-21 14:38:40'),
(4, 'قرمز', 'FF1323', 17, '2018-08-21 16:42:49', '2018-08-21 16:42:49'),
(5, 'آبی آسمانی', '67EBFF', 18, '2018-08-22 15:06:11', '2018-08-22 15:06:11'),
(6, 'مشکی', '010101', 18, '2018-08-22 16:31:27', '2018-08-22 16:31:27'),
(7, 'آبی', '351DFF', 27, '2018-08-24 14:34:40', '2018-08-24 14:34:40'),
(8, 'آبی آسمانی', '99E0FF', 28, '2018-08-26 09:39:00', '2018-08-26 09:39:00'),
(9, 'سفید', 'FFFFFF', 28, '2018-08-28 13:48:30', '2018-08-28 13:48:30'),
(10, 'صورتی', 'FF30E3', 28, '2018-08-28 13:48:30', '2018-08-28 13:48:30'),
(11, 'مشکی', '141414', 28, '2018-08-28 13:48:31', '2018-08-28 13:48:31'),
(12, 'قرمز', 'FF0D1D', 24, '2018-09-01 03:57:21', '2018-09-01 03:57:21'),
(13, 'قرمز', 'FF141C', 16, '2018-09-01 09:09:42', '2018-09-01 09:09:42'),
(14, 'قرمز', 'FF3D0D', 26, '2018-09-14 13:19:55', '2018-09-14 13:19:55'),
(15, 'سفید', 'F4F4F4', 29, '2018-10-28 08:17:52', '2018-10-28 08:17:52'),
(16, 'سفید', 'FFFFFF', 30, '2018-11-12 07:19:31', '2018-11-12 07:19:31'),
(17, 'طلایی', 'F7FF1B', 30, '2018-11-12 07:19:31', '2018-11-12 07:19:31'),
(18, 'سفید', 'FFFFFF', 31, '2018-11-18 16:15:52', '2018-11-18 16:15:52'),
(19, 'مشکی', '050505', 31, '2018-11-18 16:15:52', '2018-11-18 16:15:52'),
(20, 'سفید', 'FFFFFF', 32, '2018-11-30 05:48:24', '2018-11-30 05:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `time_code` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `code`, `value`, `time`, `time_code`, `price`) VALUES
(2, 'digikala', 3, 0, 0, '0'),
(4, 'laravel', 5, 1543361634, 10, '500000');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `product_id`, `url`, `type`) VALUES
(3, 25, '5922f88ac17fc19c50b06858a7d2723b.png', 'review'),
(4, 25, 'c217843c46fa3f6ffec78f3321247a88.png', 'review'),
(5, 25, 'f9d5c67e6e8d5c98d2db2cc8497c14d3.png', 'review'),
(10, 26, '22725da8ce44c2da54f8318abfa584cc.jpg', 'review'),
(11, 17, 'e1c71065cef8194489b316fb84a0ec5e.jpg', 'review'),
(12, 17, 'd6863050c7e181cbef89c205471293cd.jpg', 'review'),
(13, 17, 'b011a9a7ae5b1cf783f850010071fb59.jpg', 'review'),
(14, 17, 'bfb8dc98e7956d299eaf2d33072e95c7.jpg', 'review'),
(15, 17, '0bafd180566049d8e0320a82a42cd354.jpg', 'review'),
(16, 17, '21c7bd19fc533b56ed2f3d8222748dc6.jpg', 'review'),
(17, 17, '7ccd6b036706265e9fdfdef4b5760ab8.jpg', 'review'),
(18, 17, 'f68e712385e661f49ee749936fe7181c.jpg', 'review'),
(19, 17, '953187ce43b5d2cd91ceccb0507fe9a1.jpg', 'review'),
(20, 17, '792f6d752e08119be4fb350ba77705b8.jpg', 'review'),
(21, 17, 'b399188478cc7d26c1c0ee3384282eec.jpg', 'review'),
(22, 17, 'c1ffcf1256fa4987cda8eb309ff03684.jpg', 'review'),
(23, 17, 'e68c8f865eb24fe55349befaa887f4a5.jpg', 'review'),
(24, 17, '30029972611ce3a4ccc249001102935d.jpg', 'review'),
(25, 17, 'd7b47407e18a451e106caffe17f8e92d.jpg', 'review'),
(26, 17, '2e097b9894a210a8a24bc5b00bb5585d.jpg', 'review'),
(27, 17, 'da4dab0576866fb2fe15ac056215ac7d.jpg', 'review'),
(28, 27, 'f80d7656e3dc4a67156b5977e07d949d.jpg', 'review'),
(29, 27, '171a9bc887e6fba38d9acad4f595dd44.jpg', 'review'),
(30, 27, '65d35e7cf466d0446b056c85121728f7.jpg', 'review'),
(31, 27, 'c6ce0462e83dd55f8ee0da1250cbf27a.jpg', 'review'),
(32, 27, 'c787faca4245e9bc2bc71e60b6fb893c.jpg', 'review'),
(33, 27, '4a9ebe9c3cd0afe738664b201a121606.jpg', 'review'),
(34, 27, 'bff3c33b8a50126868ea62acdd02162e.jpg', 'review'),
(35, 27, '82246704e5e7bdef6bec2cacae02dc20.png', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `filed` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `category_id`, `name`, `ename`, `parent_id`, `filed`) VALUES
(53, 26, 'برند و سازنده کالا', 'brand', 0, 1),
(54, 26, 'اپل', NULL, 53, 1),
(55, 26, 'سامسونگ', NULL, 53, 1),
(56, 26, 'ال جی', NULL, 53, 1),
(57, 26, 'سونی', NULL, 53, 1),
(58, 26, 'هوآوی', NULL, 53, 1),
(59, 26, 'براساس نوع', 'Type', 0, 1),
(60, 26, 'سیستم عامل اندروید', NULL, 59, 1),
(61, 26, 'سیستم عامل ios', NULL, 59, 1),
(62, 26, 'سیستم عامل ویندوز فون', NULL, 59, 1),
(63, 26, 'سایر سیستم عامل ها', NULL, 59, 1),
(64, 26, 'تعداد سیم کارت', 'SimCart', 0, 1),
(65, 26, 'تک', NULL, 64, 1),
(66, 26, 'دو', NULL, 64, 1),
(67, 26, 'سه', NULL, 64, 1),
(68, 26, 'حافظه داخلی', 'Memory', 0, 1),
(69, 26, '128 گیگابایت', NULL, 68, 1),
(70, 26, '128 مگا بایت', NULL, 68, 1),
(71, 26, '16 گیگابایت', NULL, 68, 1),
(72, 26, '1 گیگابایت', NULL, 68, 1),
(73, 26, 'بر اساس رنگ', 'color', 0, 2),
(74, 26, 'سفید', 'FFFFFF', 73, 2),
(75, 26, 'مشکی', '0A0A0A', 73, 2),
(76, 26, 'قرمز', 'FF0D0D', 73, 2),
(77, 26, 'سبز', '3CFF36', 73, 2),
(78, 26, 'اچ تی سی', NULL, 53, 1),
(79, 26, 'ای سوز', NULL, 53, 1),
(80, 26, 'لنوو', NULL, 53, 1),
(81, 26, 'موتورلا', NULL, 53, 1),
(82, 26, 'مایکروسافت', NULL, 53, 1),
(83, 82, 'برا اساس برند', 'brand', 0, 1),
(84, 82, 'اپل', NULL, 83, 1),
(85, 82, 'ایسوس', NULL, 83, 1),
(86, 82, 'لنوو', NULL, 83, 1),
(87, 82, 'اچ پی', NULL, 83, 1),
(88, 82, 'Acer', NULL, 83, 1),
(89, 82, 'MSI', NULL, 83, 1),
(90, 82, 'Dell', NULL, 83, 1),
(91, 82, 'بر اساس نوع', 'type', 0, 1),
(92, 82, 'باریک و سبک', NULL, 91, 1),
(93, 82, 'صفحه نمایش لمسی', NULL, 91, 1),
(94, 82, 'تبدیل پذیر', NULL, 91, 1),
(95, 82, 'اندازه صفحه نمایش', 'sizeScreen', 0, 1),
(96, 82, 'تا 13 اینچ', NULL, 95, 1),
(97, 82, '13 اینچ تا 15 اینچ', NULL, 95, 1),
(98, 82, '15اینچ و بزرگتر', NULL, 95, 1),
(99, 26, 'صورتی', 'FF30E3', 73, 2);

-- --------------------------------------------------------

--
-- Table structure for table `filter_product`
--

CREATE TABLE `filter_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filter_product`
--

INSERT INTO `filter_product` (`id`, `product_id`, `filter_id`, `value`) VALUES
(84, 15, 53, 54),
(85, 15, 59, 61),
(86, 14, 53, 54),
(87, 14, 59, 61),
(91, 16, 53, 55),
(92, 16, 73, 77),
(93, 29, 83, 84),
(94, 29, 91, 93),
(95, 29, 95, 96),
(96, 30, 53, 56),
(97, 30, 59, 63),
(98, 30, 64, 66),
(99, 30, 68, 72),
(100, 17, 53, 56),
(101, 17, 59, 63),
(102, 17, 64, 66),
(103, 17, 68, 69),
(108, 28, 53, 54),
(109, 28, 59, 61),
(110, 28, 73, 74),
(111, 28, 73, 75),
(112, 28, 73, 76),
(113, 28, 73, 77),
(114, 28, 73, 99);

-- --------------------------------------------------------

--
-- Table structure for table `gift_cart`
--

CREATE TABLE `gift_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift_cart`
--

INSERT INTO `gift_cart` (`id`, `code`, `value`, `time`, `date`, `user_id`, `status`) VALUES
(1, 'DigiGift797906', 100000, '1544041799', '1397/9/14', 1, 0),
(2, 'DigiGift798082', 100000, '1544041799', '1397/9/14', 1, 0),
(3, 'DigiGift101589', 50000, '1543436999', '1397/9/7', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filed` smallint(6) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `filed`, `parent_id`) VALUES
(10, 27, 'حافظه', NULL, 0),
(11, 27, 'حافظه داخلی', 2, 10),
(12, 27, 'مقدار RAM', 2, 10),
(13, 27, 'پشتیبانی از کارت حافظه جانبی', 2, 10),
(14, 27, 'حداکثر ظرفیت کارت حافظه', 2, 10),
(15, 27, 'مشخصات کلی', NULL, 0),
(16, 27, 'ابعاد', 2, 15),
(17, 27, 'توضیحات سیم کارت', 2, 15),
(18, 27, 'وزن', 2, 15),
(19, 27, 'ساختار بدنه', 3, 15),
(20, 27, 'ویژگی‌های خاص', 3, 15),
(21, 27, 'تعداد سیم کارت', 2, 15),
(22, 27, 'پردازنده', NULL, 0),
(23, 27, 'تراشه', 2, 22),
(24, 27, 'پردازنده‌ی مرکزی', 2, 22),
(25, 27, 'نوع پردازنده', 2, 22),
(26, 27, 'فرکانس پردازنده‌ی مرکزی', 2, 22),
(27, 27, 'پردازنده‌ی گرافیکی', 2, 22),
(28, 27, 'صفحه نمایش', NULL, 0),
(29, 27, 'نوع', 2, 28),
(30, 27, 'صفحه نمایش رنگی', 1, 28),
(31, 27, 'صفحه نمایش لمسی', 1, 28),
(32, 27, 'فناوری', 2, 28),
(33, 27, 'بازه‌ی سایز صفحه نمایش', 2, 28),
(34, 27, 'اندازه', 2, 28),
(35, 27, 'رزولوشن', 2, 28),
(36, 27, 'تراکم پیکسلی', 2, 28),
(37, 27, 'تعداد رنگ', 2, 28),
(38, 27, 'سایر قابلیت‌ها', 2, 28),
(39, 27, 'ارتباطات', NULL, 0),
(40, 27, 'شبکه های ارتباطی', 2, 39),
(41, 27, 'شبکه 2G', 3, 39),
(42, 27, 'شبکه 4G', 3, 39),
(43, 27, 'فن‌آوری‌های ارتباطی', 2, 39),
(44, 27, 'Wi-Fi', 3, 39),
(45, 27, 'بلوتوث', 3, 39),
(46, 27, 'رادیو', 2, 39),
(47, 27, 'فن‌آوری مکان‌یابی', 2, 39),
(48, 27, 'درگاه ارتباطی', 2, 39),
(49, 27, 'دوربین', NULL, 0),
(50, 27, 'دوربین', 1, 49),
(51, 27, 'رزولوشن عکس', 2, 49),
(52, 27, 'فناوری فوکوس', 2, 49),
(53, 27, 'فلش', 2, 49),
(54, 27, 'قابلیت‌های دوربین', 3, 49),
(55, 27, 'فیلمبرداری', 3, 49),
(56, 27, 'دوربین سلفی', 3, 49),
(57, 27, 'صدا', NULL, 0),
(58, 27, 'بلندگو', 1, 57),
(59, 27, 'خروجی صدا', 2, 57),
(60, 27, 'امکانات نرم افزاری', NULL, 0),
(61, 27, 'سیستم عامل', 2, 60),
(62, 27, 'نسخه سیستم عامل', 2, 60),
(63, 27, 'پشتیبانی از زبان فارسی', 1, 60),
(64, 27, 'منوی فارسی', 1, 60),
(65, 27, 'قابلیت‌های نرم‌افزاری', 3, 60),
(66, 27, 'دفترچه تلفن', 2, 60),
(67, 27, 'موسیقی', 2, 60),
(68, 27, 'ویدیو', 2, 60),
(69, 27, 'ضبط صدا', 1, 60),
(70, 27, 'سایر مشخصات', NULL, 0),
(71, 27, 'حس‌گرها', 3, 70),
(72, 27, 'باتری قابل تعویض', 1, 70),
(73, 27, 'مشخصات باتری', 3, 70),
(74, 27, 'میزان شارژ مکالمه', 2, 70),
(75, 27, 'اقلام همراه گوشی', 2, 70),
(76, 27, 'شبکه 4G', 3, 39);

-- --------------------------------------------------------

--
-- Table structure for table `item_product`
--

CREATE TABLE `item_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_product`
--

INSERT INTO `item_product` (`id`, `product_id`, `item_id`, `value`) VALUES
(684, 28, 11, '32 گیگابایت'),
(685, 28, 12, '3 گیگابایت'),
(686, 28, 13, 'microSD'),
(687, 28, 14, '256 گیگابایت'),
(688, 28, 16, '7.9 × 74.8 × 152.5 میلی‌متر'),
(689, 28, 17, 'سایز نانو (8.8 × 12.3 میلی‌متر)'),
(690, 28, 18, '181 گرم'),
(691, 28, 19, 'فلز و شیشه@#!شیار کارت حافظه و سیم‌کارت‌ها به صورت مجزا است'),
(692, 28, 20, 'ظرافت فوق تلعاده@#! بسیار زیبا و کاربر پسن@#! قیمت مناسب'),
(693, 28, 21, 'دو سیم کارت'),
(694, 28, 23, 'Exynos 7870 Chipset'),
(695, 28, 24, 'Octa-Core Cortex-A53 CPU'),
(696, 28, 25, '64 بیت'),
(697, 28, 26, '1.6 گیگاهرتز'),
(698, 28, 27, 'Mali-T830MP2 GPU'),
(699, 28, 29, 'OLED'),
(700, 28, 30, '1'),
(701, 28, 31, '1'),
(702, 28, 32, 'Super AMOLED'),
(703, 28, 33, '5.5 تا 6.0 اینچ'),
(704, 28, 34, '5.5 اینچ'),
(705, 28, 35, '1920 × 1080 | Full HD'),
(706, 28, 36, '401 پیکسل بر هر اینچ'),
(707, 28, 37, '16 میلیون رنگ'),
(708, 28, 38, 'قابلیت دریافت 10 لمس به صورت همزمان'),
(709, 28, 40, '2G , 3G , 4G'),
(710, 28, 41, 'GSM 850 / 900 / 1800 / 1900@#!برای هر دو سیم کارت'),
(711, 28, 42, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(712, 28, 43, 'بلوتوث , EDGE , GPRS , NFC , OTG , رادیو , Wi-Fi'),
(713, 28, 44, 'Wi-Fi 802.11 a/b/g/n/ac@#!Wi-Fi Direct, Wi-Fi Hotspot'),
(714, 28, 45, 'نسخه 4.1@#!A2DP, LE'),
(715, 28, 46, 'رادیو FM'),
(716, 28, 47, 'A-GPS , Beidou|BDS , GLONASS'),
(717, 28, 48, 'microUSB v2.0'),
(718, 28, 76, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(719, 28, 50, '3'),
(720, 28, 51, '13.0 مگاپیکسل'),
(721, 28, 52, 'AutoFocus'),
(722, 28, 53, 'LED'),
(723, 28, 54, 'فاصله کانونی لنز 28 میلی‌متر (Focus Length 27 mm)@#!دارای دریچه‌ی دیافراگم f/1.7@#!قابلیت ثبت موقعیت جغرافیایی عکس‌ها و فیلم‌ها (Geo-Tagging)@#!قابلیت فوکوس با اشاره روی سوژه (Touch Focus)@#!قابلیت تشخیص چهره (Face Detection)@#! قابلیت عکاسی پانوراما (Panorama)@#!قابلیت عکاسی HDR@#!'),
(724, 28, 55, 'رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(725, 28, 56, 'دارای سنسور با رزولوشن 13 مگاپیکسل@#!دارای دریچه‌ی دیافراگم f/1.9@#!دارای فلش از نوع LED@#!قابلیت فیلمبرداری با رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(726, 28, 58, '3'),
(727, 28, 59, 'جک 3.5 میلی‌متری'),
(728, 28, 61, 'Android'),
(729, 28, 62, 'Nougat 7.0'),
(730, 28, 63, '1'),
(731, 28, 64, '3'),
(732, 28, 65, 'ایمیل , سرویس‌های گوگل شامل Google Search, Google Maps, Gmail و YouTube , مرورگر HTML5 , MMS , قابلیت نمایش اسناد مایکروسافت آفیس , قابلیت نمایش فایل‌های متنی PDF , برنامه ویرایش عکس , قابلیت استفاده از سرویس شبکه‌های اجتماعی'),
(733, 28, 66, 'با امکان افزودن مخاطب به تعداد بی‌نهایت'),
(734, 28, 67, 'eAAC , Flac , MP3 , WMA'),
(735, 28, 68, 'H.264 , MP4 , WMV'),
(736, 28, 69, '1'),
(737, 28, 71, 'شتاب‌سنج (Accelerometer) , قطب‌نما (Compass) , اثرانگشت روی قاب جلویی (FingerPrint|Front-Mounted) , ژیروسکوپ (Gyro) , روشنایی (Light) , مجاورت (Proximity)'),
(738, 28, 72, '2'),
(739, 28, 73, 'باتری از نوع لیتیوم-یون با ظرفیت 3600 میلی‌آمپر ساعت'),
(740, 28, 74, '24 ساعت'),
(741, 28, 75, 'شارژر , هدفون , کابل USB , دفترچه‌ راهنما'),
(742, 27, 11, '32 گیگابایت'),
(743, 27, 12, '3 گیگابایت'),
(744, 27, 13, 'microSD'),
(745, 27, 14, '256 گیگابایت'),
(746, 27, 16, '7.9 × 74.8 × 152.5 میلی‌متر'),
(747, 27, 17, 'سایز نانو (8.8 × 12.3 میلی‌متر)'),
(748, 27, 18, '181 گرم'),
(749, 27, 19, 'فلز و شیشه@#!شیار کارت حافظه و سیم‌کارت‌ها به صورت مجزا است'),
(750, 27, 20, 'ظرافت فوق تلعاده@#! بسیار زیبا و کاربر پسن@#! قیمت مناسب'),
(751, 27, 21, 'دو سیم کارت'),
(752, 27, 23, 'Exynos 7870 Chipset'),
(753, 27, 24, 'Octa-Core Cortex-A53 CPU'),
(754, 27, 25, '64 بیت'),
(755, 27, 26, '1.6 گیگاهرتز'),
(756, 27, 27, 'Mali-T830MP2 GPU'),
(757, 27, 29, 'OLED'),
(758, 27, 30, '1'),
(759, 27, 31, '1'),
(760, 27, 32, 'Super AMOLED'),
(761, 27, 33, '5.5 تا 6.0 اینچ'),
(762, 27, 34, '5.5 اینچ'),
(763, 27, 35, '1920 × 1080 | Full HD'),
(764, 27, 36, '401 پیکسل بر هر اینچ'),
(765, 27, 37, '16 میلیون رنگ'),
(766, 27, 38, 'قابلیت دریافت 10 لمس به صورت همزمان'),
(767, 27, 40, '2G , 3G , 4G'),
(768, 27, 41, 'GSM 850 / 900 / 1800 / 1900@#!برای هر دو سیم کارت'),
(769, 27, 42, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(770, 27, 43, 'بلوتوث , EDGE , GPRS , NFC , OTG , رادیو , Wi-Fi'),
(771, 27, 44, 'Wi-Fi 802.11 a/b/g/n/ac@#!Wi-Fi Direct, Wi-Fi Hotspot'),
(772, 27, 45, 'نسخه 4.1@#!A2DP, LE'),
(773, 27, 46, 'رادیو FM'),
(774, 27, 47, 'A-GPS , Beidou|BDS , GLONASS'),
(775, 27, 48, 'microUSB v2.0'),
(776, 27, 76, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(777, 27, 50, '3'),
(778, 27, 51, '13.0 مگاپیکسل'),
(779, 27, 52, 'AutoFocus'),
(780, 27, 53, 'LED'),
(781, 27, 54, 'فاصله کانونی لنز 28 میلی‌متر (Focus Length 27 mm)@#!دارای دریچه‌ی دیافراگم f/1.7@#!قابلیت ثبت موقعیت جغرافیایی عکس‌ها و فیلم‌ها (Geo-Tagging)@#!قابلیت فوکوس با اشاره روی سوژه (Touch Focus)@#!قابلیت تشخیص چهره (Face Detection)@#! قابلیت عکاسی پانوراما (Panorama)@#!قابلیت عکاسی HDR@#!'),
(782, 27, 55, 'رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(783, 27, 56, 'دارای سنسور با رزولوشن 13 مگاپیکسل@#!دارای دریچه‌ی دیافراگم f/1.9@#!دارای فلش از نوع LED@#!قابلیت فیلمبرداری با رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(784, 27, 58, '3'),
(785, 27, 59, 'جک 3.5 میلی‌متری'),
(786, 27, 61, 'Android'),
(787, 27, 62, 'Nougat 7.0'),
(788, 27, 63, '1'),
(789, 27, 64, '3'),
(790, 27, 65, 'ایمیل , سرویس‌های گوگل شامل Google Search, Google Maps, Gmail و YouTube , مرورگر HTML5 , MMS , قابلیت نمایش اسناد مایکروسافت آفیس , قابلیت نمایش فایل‌های متنی PDF , برنامه ویرایش عکس , قابلیت استفاده از سرویس شبکه‌های اجتماعی'),
(791, 27, 66, 'با امکان افزودن مخاطب به تعداد بی‌نهایت'),
(792, 27, 67, 'eAAC , Flac , MP3 , WMA'),
(793, 27, 68, 'H.264 , MP4 , WMV'),
(794, 27, 69, '1'),
(795, 27, 71, 'شتاب‌سنج (Accelerometer) , قطب‌نما (Compass) , اثرانگشت روی قاب جلویی (FingerPrint|Front-Mounted) , ژیروسکوپ (Gyro) , روشنایی (Light) , مجاورت (Proximity)'),
(796, 27, 72, '2'),
(797, 27, 73, 'باتری از نوع لیتیوم-یون با ظرفیت 3600 میلی‌آمپر ساعت'),
(798, 27, 74, '24 ساعت'),
(799, 27, 75, 'شارژر , هدفون , کابل USB , دفترچه‌ راهنما'),
(800, 15, 11, '32 گیگابایت'),
(801, 15, 12, '3 گیگابایت'),
(802, 15, 13, 'microSD'),
(803, 15, 14, '256 گیگابایت'),
(804, 15, 16, '7.9 × 74.8 × 152.5 میلی‌متر'),
(805, 15, 17, 'سایز نانو (8.8 × 12.3 میلی‌متر)'),
(806, 15, 18, '181 گرم'),
(807, 15, 19, 'فلز و شیشه@#!شیار کارت حافظه و سیم‌کارت‌ها به صورت مجزا است'),
(808, 15, 20, 'ظرافت فوق تلعاده@#! بسیار زیبا و کاربر پسن@#! قیمت مناسب'),
(809, 15, 21, 'دو سیم کارت'),
(810, 15, 23, 'Exynos 7870 Chipset'),
(811, 15, 24, 'Octa-Core Cortex-A53 CPU'),
(812, 15, 25, '64 بیت'),
(813, 15, 26, '1.6 گیگاهرتز'),
(814, 15, 27, 'Mali-T830MP2 GPU'),
(815, 15, 29, 'OLED'),
(816, 15, 30, '1'),
(817, 15, 31, '1'),
(818, 15, 32, 'Super AMOLED'),
(819, 15, 33, '5.5 تا 6.0 اینچ'),
(820, 15, 34, '5.5 اینچ'),
(821, 15, 35, '1920 × 1080 | Full HD'),
(822, 15, 36, '401 پیکسل بر هر اینچ'),
(823, 15, 37, '16 میلیون رنگ'),
(824, 15, 38, 'قابلیت دریافت 10 لمس به صورت همزمان'),
(825, 15, 40, '2G , 3G , 4G'),
(826, 15, 41, 'GSM 850 / 900 / 1800 / 1900@#!برای هر دو سیم کارت'),
(827, 15, 42, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(828, 15, 43, 'بلوتوث , EDGE , GPRS , NFC , OTG , رادیو , Wi-Fi'),
(829, 15, 44, 'Wi-Fi 802.11 a/b/g/n/ac@#!Wi-Fi Direct, Wi-Fi Hotspot'),
(830, 15, 45, 'نسخه 4.1@#!A2DP, LE'),
(831, 15, 46, 'رادیو FM'),
(832, 15, 47, 'A-GPS , Beidou|BDS , GLONASS'),
(833, 15, 48, 'microUSB v2.0'),
(834, 15, 76, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300@#!LTE از نوع Cat6 با سرعت دانلود 300 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه'),
(835, 15, 50, '3'),
(836, 15, 51, '13.0 مگاپیکسل'),
(837, 15, 52, 'AutoFocus'),
(838, 15, 53, 'LED'),
(839, 15, 54, 'فاصله کانونی لنز 28 میلی‌متر (Focus Length 27 mm)@#!دارای دریچه‌ی دیافراگم f/1.7@#!قابلیت ثبت موقعیت جغرافیایی عکس‌ها و فیلم‌ها (Geo-Tagging)@#!قابلیت فوکوس با اشاره روی سوژه (Touch Focus)@#!قابلیت تشخیص چهره (Face Detection)@#! قابلیت عکاسی پانوراما (Panorama)@#!قابلیت عکاسی HDR@#!'),
(840, 15, 55, 'رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(841, 15, 56, 'دارای سنسور با رزولوشن 13 مگاپیکسل@#!دارای دریچه‌ی دیافراگم f/1.9@#!دارای فلش از نوع LED@#!قابلیت فیلمبرداری با رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)'),
(842, 15, 58, '3'),
(843, 15, 59, 'جک 3.5 میلی‌متری'),
(844, 15, 61, 'Android'),
(845, 15, 62, 'Nougat 7.0'),
(846, 15, 63, '1'),
(847, 15, 64, '3'),
(848, 15, 65, 'ایمیل , سرویس‌های گوگل شامل Google Search, Google Maps, Gmail و YouTube , مرورگر HTML5 , MMS , قابلیت نمایش اسناد مایکروسافت آفیس , قابلیت نمایش فایل‌های متنی PDF , برنامه ویرایش عکس , قابلیت استفاده از سرویس شبکه‌های اجتماعی'),
(849, 15, 66, 'با امکان افزودن مخاطب به تعداد بی‌نهایت'),
(850, 15, 67, 'eAAC , Flac , MP3 , WMA'),
(851, 15, 68, 'H.264 , MP4 , WMV'),
(852, 15, 69, '1'),
(853, 15, 71, 'شتاب‌سنج (Accelerometer) , قطب‌نما (Compass) , اثرانگشت روی قاب جلویی (FingerPrint|Front-Mounted) , ژیروسکوپ (Gyro) , روشنایی (Light) , مجاورت (Proximity)'),
(854, 15, 72, '2'),
(855, 15, 73, 'باتری از نوع لیتیوم-یون با ظرفیت 3600 میلی‌آمپر ساعت'),
(856, 15, 74, '24 ساعت'),
(857, 15, 75, 'شارژر , هدفون , کابل USB , دفترچه‌ راهنما');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_07_13_194000_create_smsir_log_table', 1),
(25, '2018_07_27_072730_create_category_table', 1),
(26, '2018_07_30_063304_create_slider_table', 2),
(38, '2018_07_30_151335_creta_product_table', 7),
(39, '2018_07_31_112651_create_category_product_table', 8),
(40, '2018_07_31_183359_create_color_table', 9),
(41, '2018_08_08_153843_craete_fliter_table', 10),
(42, '2018_08_11_144822_craete_item_table', 11),
(43, '2018_08_03_112559_craete_product_image_table', 12),
(45, '2018_08_16_142124_create_amazing_table', 13),
(47, '2018_08_19_180754_create_service_table', 14),
(48, '2018_08_23_105214_create_review_table', 15),
(49, '2018_08_23_135201_creat_file_table', 16),
(51, '2018_08_26_133159_create_item_product_table', 17),
(53, '2018_09_05_175822_create_shars_table', 19),
(54, '2018_09_05_175907_create_ostans_table', 19),
(55, '2018_09_07_145024_create_user_address_table', 20),
(57, '2018_09_14_130149_create_table_order_row', 21),
(60, '2014_10_12_000000_create_users_table', 23),
(61, '2018_09_14_123818_craete_order_table', 24),
(62, '2018_09_26_100555_create_filter_product_table', 25),
(68, '2018_10_05_103233_creat_score_table', 26),
(69, '2018_10_05_124927_create_product_comment_table', 26),
(70, '2018_10_07_081338_create_add_name_comumn_user_table', 26),
(73, '2018_10_12_190337_create_question_table', 27),
(76, '2018_10_28_115852_create_statistics_user', 28),
(77, '2018_10_28_120159_create_statistics_table', 28),
(78, '2018_11_23_111808_create_setting_table', 29),
(79, '2018_11_25_135003_create_jobs_table', 30),
(80, '2018_11_25_135242_create_failed_jobs_table', 31),
(82, '2018_11_26_113016_create_discount_table', 32),
(85, '2018_11_30_124743_create_gift_cart_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_order_type` smallint(6) NOT NULL,
  `pay_type` smallint(6) NOT NULL,
  `pay_status` tinyint(1) NOT NULL DEFAULT '0',
  `order_status` smallint(6) NOT NULL,
  `total_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_code` int(255) DEFAULT NULL,
  `code1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `address_id`, `user_id`, `time`, `date`, `send_order_type`, `pay_type`, `pay_status`, `order_status`, `total_price`, `price`, `order_code`, `code1`, `code2`, `order_read`) VALUES
(3, 44, 1, 1536607800, '1397-7-1', 1, 5, 1, 1, 4500000, 4450000, 374160285, NULL, NULL, 0),
(4, 44, 1, 1537039800, '1397-7-2', 1, 5, 1, 5, 2800000, 2780000, 374160428, NULL, NULL, 0),
(5, 44, 1, 1537385400, '1397-7-3', 1, 5, 1, 1, 600000, 580000, 374163728, NULL, NULL, 0),
(6, 46, 7, 1542709750, '1397-8-29', 1, 6, 1, 1, 2500000, 2350000, 427709750, NULL, NULL, 0),
(7, 46, 7, 1542719598, '1397-8-29', 1, 6, 1, 1, 3700000, 3660000, 427719598, NULL, NULL, 0),
(8, 46, 7, 1542725824, '1397-8-29', 1, 6, 1, 1, 1500000, 1460000, 427725824, NULL, NULL, 0),
(9, 46, 7, 1542727848, '1397-8-29', 1, 6, 1, 1, 600000, 580000, 427727848, NULL, NULL, 0),
(10, 46, 7, 1542728438, '1397-8-29', 1, 6, 1, 1, 2500000, 2350000, 427728438, NULL, NULL, 0),
(11, 46, 7, 1542728926, '1397-8-29', 1, 6, 1, 1, 5540000, 5440000, 427728926, NULL, NULL, 0),
(12, 46, 7, 1542748693, '1397-8-30', 1, 6, 1, 1, 5540000, 5440000, 427748693, NULL, NULL, 0),
(13, 46, 7, 1542805154, '1397-8-30', 1, 6, 1, 1, 8040000, 7790000, 428705154, NULL, NULL, 0),
(14, 46, 7, 1543150501, '1397-9-4', 1, 6, 0, 1, 5540000, 5440000, 431750501, NULL, NULL, 0),
(15, 46, 7, 1543150546, '1397-9-4', 1, 5, 0, 1, 5540000, 5440000, 431750546, NULL, NULL, 0),
(16, 46, 7, 1543150664, '1397-9-4', 1, 5, 0, 1, 5540000, 5440000, 431750664, NULL, NULL, 0),
(17, 46, 7, 1543150707, '1397-9-4', 1, 5, 0, 1, 5540000, 5440000, 431750707, NULL, NULL, 0),
(18, 46, 7, 1543150910, '1397-9-4', 1, 5, 0, 1, 2200000, 2200000, 431750910, NULL, NULL, 0),
(19, 45, 2, 1543152154, '1397-9-4', 1, 5, 0, 0, 2500000, 2350000, 431252154, NULL, NULL, 0),
(20, 44, 1, 1543340178, '1397-9-6', 1, 5, 0, 0, 600000, 335205, 433140178, NULL, NULL, 0),
(21, 44, 1, 1543340275, '1397-9-6', 1, 6, 0, 0, 1500000, 1460000, 433140275, NULL, NULL, 0),
(22, 44, 1, 1543345043, '1397-9-6', 1, 6, 0, 0, 1500000, 1470000, 433145043, NULL, NULL, 0),
(23, 44, 1, 1543345488, '1397-9-6', 1, 5, 0, 0, 1500000, 1470000, 433145488, NULL, NULL, 0),
(24, 44, 1, 1543345653, '1397-9-6', 1, 6, 0, 0, 1500000, 1470000, 433145653, NULL, NULL, 0),
(25, 44, 1, 1543346057, '1397-9-6', 1, 5, 0, 0, 2500000, 2289200, 433146057, NULL, NULL, 0),
(26, 46, 7, 1543520162, '1397-9-8', 1, 5, 0, 0, 10540000, 10150000, 435720162, NULL, NULL, 0),
(27, 46, 7, 1543520703, '1397-9-8', 1, 6, 0, 1, 2200000, 2143700, 435720703, NULL, NULL, 0),
(28, 44, 1, 1543676557, '1397-9-10', 1, 5, 0, 0, 2500000, 2039200, 436176557, NULL, NULL, 0),
(29, 44, 1, 1543676617, '1397-9-10', 1, 5, 0, 1, 2500000, 2039200, 436176617, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_row`
--

CREATE TABLE `order_row` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_row`
--

INSERT INTO `order_row` (`id`, `order_id`, `product_id`, `color_id`, `service_id`, `number`) VALUES
(42, 3, 17, 2, 3, 1),
(43, 4, 16, 13, 0, 1),
(44, 4, 14, 0, 0, 1),
(45, 5, 16, 13, 0, 1),
(46, 6, 28, 8, 51, 1),
(47, 7, 14, 0, 0, 1),
(48, 7, 15, 0, 0, 1),
(49, 8, 15, 0, 0, 1),
(50, 9, 16, 13, 0, 1),
(51, 10, 28, 8, 51, 1),
(52, 11, 29, 15, 0, 1),
(53, 12, 29, 15, 0, 1),
(54, 13, 28, 8, 51, 1),
(55, 13, 29, 15, 0, 1),
(56, 14, 29, 15, 0, 1),
(57, 15, 29, 15, 0, 1),
(58, 16, 29, 15, 0, 1),
(59, 17, 29, 15, 0, 1),
(60, 18, 14, 0, 0, 1),
(61, 19, 28, 8, 51, 1),
(62, 20, 16, 13, 0, 1),
(63, 21, 15, 0, 0, 1),
(64, 22, 15, 0, 0, 1),
(65, 23, 15, 0, 0, 1),
(66, 24, 15, 0, 0, 1),
(67, 25, 28, 8, 51, 1),
(68, 26, 28, 8, 51, 2),
(69, 26, 29, 15, 0, 1),
(70, 27, 14, 0, 0, 1),
(71, 28, 28, 8, 51, 1),
(72, 29, 28, 8, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ostans`
--

CREATE TABLE `ostans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ostan_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ostans`
--

INSERT INTO `ostans` (`id`, `ostan_name`, `created_at`, `updated_at`) VALUES
(2, 'گیلان', '2018-09-06 03:29:21', '2018-09-06 03:29:21'),
(3, 'تهران', '2018-09-06 03:30:32', '2018-09-06 03:30:32'),
(4, 'مازندران', '2018-09-06 03:30:48', '2018-09-06 03:30:48'),
(5, 'اردبیل', '2018-09-06 03:31:01', '2018-09-06 03:31:01'),
(6, 'قزوین', '2018-09-06 03:31:12', '2018-09-06 03:31:12'),
(7, 'یزد', '2018-09-06 03:31:22', '2018-09-06 03:31:22'),
(8, 'اصفهان', '2018-09-06 03:31:33', '2018-09-06 03:31:33'),
(9, 'شیراز', '2018-09-06 03:31:57', '2018-09-06 03:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discounts` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `bon` int(11) DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT '0',
  `show_product` tinyint(1) NOT NULL DEFAULT '0',
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `product_number` int(11) NOT NULL DEFAULT '0',
  `order_product` int(11) NOT NULL DEFAULT '0',
  `keyword` text COLLATE utf8_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `deslike` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `title_url`, `code`, `code_url`, `price`, `discounts`, `view`, `text`, `description`, `bon`, `product_status`, `show_product`, `special`, `product_number`, `order_product`, `keyword`, `user_id`, `like`, `deslike`, `image`, `created_at`, `updated_at`) VALUES
(14, 'گوشی موبایل اپل مدل iPhone X ظرفیت 256 گیگابایت', 'گوشی-موبایل-اپل-مدل-iPhone-X-ظرفیت-256-گیگابایت', 'Apple iPhone X 256GB Mobile Phone', 'Apple-iPhone-X-256GB-Mobile-Phone', 2200000, 0, 32, NULL, NULL, 12, 1, 1, 1, 12, 12, NULL, NULL, NULL, NULL, NULL, '2018-08-15 05:40:28', '2018-12-02 11:02:50'),
(15, 'گوشی موبایل اپل مدل Mate 10 lite RNE-L21 دو سیم‌ کارت', 'گوشی-موبایل-اپل-مدل-Mate-10-lite-RNEL21-دو-سیم‌-کارت', 'awei Mate 10 Lite RNE-L21 Dual SIM Mobile Phone', 'awei-Mate-10-Lite-RNEL21-Dual-SIM-Mobile-Phone', 1500000, 40000, 9, NULL, NULL, 5, 1, 1, 1, 6, 1, NULL, NULL, NULL, NULL, NULL, '2018-08-15 05:43:43', '2018-11-27 18:10:38'),
(16, 'گوشی موبایل سامسونگ مدل Galaxy S8 G950FD دو سیم کارت', 'گوشی-موبایل-سامسونگ-مدل-Galaxy-S8-G950FD-دو-سیم-کارت', 'Samsung Galaxy S8 G950FD Dual SIM Mobile Phone', 'Samsung-Galaxy-S8-G950FD-Dual-SIM-Mobile-Phone', 600000, 20000, 143, NULL, NULL, 1, 1, 1, 1, 4, 8, NULL, NULL, NULL, NULL, NULL, '2018-08-15 05:46:13', '2018-12-02 15:10:14'),
(17, 'گوشی موبایل ال جی مدل Q6 دو سیم‌ کارت ظرفیت 32 گیگابایت', 'گوشی-موبایل-ال-جی-مدل-Q6-دو-سیم‌-کارت-ظرفیت-32-گیگابایت', 'LG Q6 Dual SIM 32 GB Mobile Phone', 'LG-Q6-Dual-SIM-32-GB-Mobile-Phone', 4500000, 100000, 6, NULL, NULL, 3, 1, 1, 1, 3, 7, NULL, NULL, NULL, NULL, NULL, '2018-08-15 10:14:10', '2018-12-02 11:02:18'),
(18, 'هارد اکسترنال سیلیکون پاور مدل Armor A80 ظرفیت 1 ترابایت', 'هارد-اکسترنال-سیلیکون-پاور-مدل-Armor-A80-ظرفیت-1-ترابایت', 'Silicon Power Armor A80 External Hard Drive - 1TB', 'Silicon-Power-Armor-A80-External-Hard-Drive-1TB', 599000, 500000, 1, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:25:41', '2018-11-12 18:08:03'),
(19, 'اسپیکر بلوتوثی قابل حمل ایکس.سل مدل SP-100', 'اسپیکر-بلوتوثی-قابل-حمل-ایکس.سل-مدل-SP100', 'X.cell Sp-100 Portable Bluetooth Speaker', 'X.cell-Sp100-Portable-Bluetooth-Speaker', 41000, 25000, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:28:40', '2018-08-19 07:28:40'),
(20, 'اسپیکر بلوتوثی قابل حمل جی وی مدل JS-3409', 'اسپیکر-بلوتوثی-قابل-حمل-جی-وی-مدل-JS3409', 'JEWAY JS-3409 Portable Bluetooth Speaker', 'JEWAY-JS3409-Portable-Bluetooth-Speaker', 51000, 45000, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:30:45', '2018-08-19 07:30:45'),
(21, 'چادر 8 نفره اف آی تی تنت مدل Double Roof T22', 'چادر-8-نفره-اف-آی-تی-تنت-مدل-Double-Roof-T22', 'F.I.T Tent Double Roof T22 Tent For 8 Person', 'F.I.T-Tent-Double-Roof-T22-Tent-For-8-Person', 599000, 319000, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:33:03', '2018-08-19 07:33:03'),
(22, 'تن ماهی در روغن گیاهی صیدانه مقدار 170 گرم', 'تن-ماهی-در-روغن-گیاهی-صیدانه-مقدار-170-گرم', 'Seydane Tuna Fish In Vegtable Oil 170gr', 'Seydane-Tuna-Fish-In-Vegtable-Oil-170gr', 6400, 4400, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:35:20', '2018-08-19 07:35:20'),
(23, 'ادو پرفیوم زنانه شوپارد مدل Happy Spirit حجم 75 میلی لیتر', 'ادو-پرفیوم-زنانه-شوپارد-مدل-Happy-Spirit-حجم-75-میلی-لیتر', 'Chopard Happy Spirit Eau De Parfum For Women 75ml', 'Chopard-Happy-Spirit-Eau-De-Parfum-For-Women-75ml', 335000, 227000, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:37:47', '2018-08-19 07:37:47'),
(24, 'کولر آبی فریدولین مدل PC3000', 'کولر-آبی-فریدولین-مدل-PC3000', 'Feridolin PC3000 Cooler', 'Feridolin-PC3000-Cooler', 759000, 549000, 0, NULL, NULL, 1, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:39:38', '2018-08-19 07:39:38'),
(25, 'کوله پشتی لپ تاپ کیس لاجیک مدل Jaunt WMBP -115 مناسب برای لپ تاپ 15.6 اینچی', 'کوله-پشتی-لپ-تاپ-کیس-لاجیک-مدل-Jaunt-WMBP-115-مناسب-برای-لپ-تاپ-15.6-اینچی', 'Case Logic Jaunt WMBP-115 Backpack For 15.6 Inch Laptop', 'Case-Logic-Jaunt-WMBP115-Backpack-For-15.6-Inch-Laptop', 219000, 99000, 0, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:41:59', '2018-08-19 07:41:59'),
(26, 'ماشین اصلاح صورت پاناسونیک مدل ES-LF51', 'ماشین-اصلاح-صورت-پاناسونیک-مدل-ESLF51', 'Panasonic ES-LF51 Shaver', 'Panasonic-ESLF51-Shaver', 500000, 50000, 1, NULL, NULL, NULL, 1, 1, 1, 10, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-19 07:44:21', '2018-11-12 19:14:48'),
(27, 'گوشی موبایل اپل مدل C1 دو سیم‌کارت', 'گوشی-موبایل-اپل-مدل-C1-دو-سیم‌کارت', 'Elephone C1 Dual SIM Mobile Phone', 'Elephone-C1-Dual-SIM-Mobile-Phone', 959000, 940000, 0, NULL, NULL, 12, 1, 1, 1, 15, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-24 14:34:39', '2018-09-27 13:23:19'),
(28, 'گوشی موبایل اپل مدل Galaxy J7 Pro SM-J730F دو سیم‌ کارت ظرفیت 32 گیگابایتات', 'گوشی-موبایل-اپل-مدل-Galaxy-J7-Pro-SMJ730F-دو-سیم‌-کارت-ظرفیت-32-گیگابایتات', 'Samsung Galaxy J7 Pro SM-J730F Dual SIM 32GB Mobile Phone', 'Samsung-Galaxy-J7-Pro-SMJ730F-Dual-SIM-32GB-Mobile-Phone', 2500000, 100000, 17, NULL, NULL, 1, 1, 1, 1, 20, 0, NULL, NULL, NULL, NULL, NULL, '2018-08-26 09:38:59', '2018-12-02 11:49:18'),
(29, 'لپ تاپ 13 اینچی اپل مدل MacBook Air MQD32 2017', 'لپ-تاپ-13-اینچی-اپل-مدل-MacBook-Air-MQD32-2017', 'MacBook Air MQD32 2017 -13 inch Laptap', 'MacBook-Air-MQD32-2017-13-inch-Laptap', 5540000, 100000, 5, NULL, NULL, 10, 1, 1, 0, 10, 0, NULL, NULL, NULL, NULL, NULL, '2018-10-28 08:17:52', '2018-11-29 18:45:19'),
(30, 'گوشی موبایل ال جی مدل K10 دو سیم‌کارت ظرفیت 16 گیگابایت', 'گوشی-موبایل-ال-جی-مدل-K10-دو-سیم‌کارت-ظرفیت-16-گیگابایت', 'LG K10 Dual SIM 16GB Mobile Phone', 'LG-K10-Dual-SIM-16GB-Mobile-Phone', 3000000, NULL, 62, NULL, NULL, NULL, 0, 1, 1, 2, 0, NULL, NULL, NULL, NULL, NULL, '2018-11-12 07:19:31', '2018-11-27 19:27:00'),
(31, 'هندزفری بلوتوث ریمکس مدل RB-T10', 'هندزفری-بلوتوث-ریمکس-مدل-RBT10', 'Remax RB-T10 Bluetooth Handsfree', 'Remax-RBT10-Bluetooth-Handsfree', 75000, 20000, 0, NULL, NULL, NULL, 1, 1, 0, 20, 0, NULL, NULL, NULL, NULL, NULL, '2018-11-18 16:15:52', '2018-11-18 16:15:52'),
(32, 'کفش ورزشی', 'کفش-ورزشی', 'shose sport', 'shose-sport', 100000, 20000, 0, NULL, NULL, 5, 1, 1, 1, 20, 0, NULL, NULL, NULL, NULL, NULL, '2018-11-30 05:48:24', '2018-11-30 05:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advantages` text COLLATE utf8_unicode_ci NOT NULL,
  `desadvantages` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`id`, `product_id`, `user_id`, `score_id`, `time`, `status`, `subject`, `advantages`, `desadvantages`, `comment_text`) VALUES
(3, 28, 2, 2, 1538920243, 1, 'چند روز پیش خریدم', 'خوش دست@#$%با کیفیت@#$%', 'وزن نسبتا زیاد@#$%', 'ین گوشی رو من به تازگی برای یکی از دوستانم خریدم، البته نه از دیجی کالا. قیمتش نسبت به کارایی که داره به نظرم قابل قبول هست. توی جعبه موبایل قاب محافظ سیلیکونی و برچسب محافظ صفحه نمایش قرار داشت، تا دیگه لازم نباشه کاربر دنبال این چیزا تو بازار باشه. اگر بخواهیم منصفانه مقایسه کنیم مشخصات سخت افزاری، حافظه و رم این گوشی نسبت به گوشی های میان رده موجود در بازار فعلی ایران خوبه و در نهایت نباید نگاه سختگیرانه ای نسبت به این گوشی داشته باشیم.'),
(4, 28, 1, 3, 1538935625, 1, 'تجربه خرید', 'صفحه نمایش ایده آل@#$%تاچ روان@#$%فینگر پرینت@#$%', '@#$%', 'حدود یکی، دو ماه هست که با این گوشی کار می کنم، کیفیت و سایز صفحه نمایش خوبی داره، نه خیلی کوچک هست و نه خیلی بزرگ که بد دست باشه، همچنین از تاچ و سرعتش ایرادی نمیشه گرفت، کیفیت دوربین نسبت به برندهای دیگر و هم رده این گوشی فرقی نمیکنه، با اینکه مصرف زیادی در طول روز از گوشی میکنم اما باطریش حدود یک تا یک و نیم روز جواب میده...\r\nدر نهایت این گوشی نسبت به قیمت آن ارزش خریدن داره و از خریدم پشیمون نیستم.'),
(5, 16, 7, 6, 1542046547, 1, 'rth', 'rth@#$%rtyhbtr@#$%tryh@#$%', 'rth@#$%rtyh@#$%tryh@#$%', 'derfgvretgvertg');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `url`, `product_id`, `created_at`, `updated_at`) VALUES
(6, '94f8b9c164eccabdadaadb518ce42027.jpg', 15, '2018-08-15 06:33:42', '2018-08-15 06:33:42'),
(7, 'c4ca4238a0b923820dcc509a6f75849b.jpg', 15, '2018-08-15 06:35:14', '2018-08-15 06:35:14'),
(9, '603bef0c5e8da1278bd1dfeb2966de31.jpg', 15, '2018-08-15 06:37:31', '2018-08-15 06:37:31'),
(10, '8c48c37cc0a8336c2617fb8e0c704ce1.jpg', 15, '2018-08-15 06:48:04', '2018-08-15 06:48:04'),
(11, '1197bb759dc62b3a4cf2d7e54993394e.jpg', 15, '2018-08-15 06:53:00', '2018-08-15 06:53:00'),
(13, 'd14e0848ffa9275095f4c0a478d18703.jpg', 16, '2018-08-15 06:54:53', '2018-08-15 06:54:53'),
(14, '9a2a2ff6ff74a0e2e84326f281605c8f.jpg', 14, '2018-08-15 06:55:11', '2018-08-15 06:55:11'),
(15, '8b52749c06f06cd0f0da5333c8792974.jpg', 17, '2018-08-15 10:14:41', '2018-08-15 10:14:41'),
(16, 'e8b99c156882f70aee7916513ac058c8.jpg', 17, '2018-08-15 15:39:37', '2018-08-15 15:39:37'),
(17, '688cfc01a8215b3a4353e9d80e00f91e.jpg', 17, '2018-08-15 15:39:41', '2018-08-15 15:39:41'),
(18, '0a5916f30f6cdc51ba05435437d2e1d2.jpg', 17, '2018-08-15 15:39:45', '2018-08-15 15:39:45'),
(19, 'e2b53ff14a16ed32015493388ce4336c.jpg', 17, '2018-08-15 15:39:49', '2018-08-15 15:39:49'),
(20, 'cedd5d64d18d4fa1082a33ca57a461eb.jpg', 17, '2018-08-15 15:39:58', '2018-08-15 15:39:58'),
(21, 'b98651bf50397aecfaa58a3cd1e5378c.jpg', 17, '2018-08-15 15:39:59', '2018-08-15 15:39:59'),
(22, '60e8db2ec27337cfbce025aeb1a2bc8a.jpg', 17, '2018-08-15 15:40:00', '2018-08-15 15:40:00'),
(23, 'ba3cfcd614af85e5fb0a5c13aad5e945.jpg', 17, '2018-08-15 15:40:00', '2018-08-15 15:40:00'),
(24, 'd4d0859dec48bcfb6feafc8d05e97880.jpg', 17, '2018-08-15 15:40:01', '2018-08-15 15:40:01'),
(25, '56bfaa2b0a506f328173ecce4973198f.jpg', 17, '2018-08-15 15:40:02', '2018-08-15 15:40:02'),
(26, '5a079bc9514e551010828de3aa189b2a.jpg', 17, '2018-08-15 15:40:03', '2018-08-15 15:40:03'),
(27, '5142956c2e39c427ea235f08496085b1.jpg', 17, '2018-08-15 15:40:04', '2018-08-15 15:40:04'),
(28, 'd3e37ca254a4d1085c32fb27d0f8444d.jpg', 17, '2018-08-15 15:40:05', '2018-08-15 15:40:05'),
(29, '826b9acb109aa42130ecf7708ba04cb4.jpg', 17, '2018-08-15 15:40:06', '2018-08-15 15:40:06'),
(30, '44d6bfe04a4b62273b7fd00798ede975.jpg', 17, '2018-08-15 15:40:06', '2018-08-15 15:40:06'),
(31, '8cd37514e1172f84776b44b54212e533.jpg', 17, '2018-08-15 15:40:07', '2018-08-15 15:40:07'),
(32, '08cca3ade5ea6e1615d020ee51c1a53b.jpg', 17, '2018-08-15 15:40:08', '2018-08-15 15:40:08'),
(33, '5e7da301e7194c2c198490ceff948624.jpg', 17, '2018-08-15 15:40:09', '2018-08-15 15:40:09'),
(34, 'f3dc6321442037fae827092de1962b47.jpg', 17, '2018-08-15 15:40:10', '2018-08-15 15:40:10'),
(35, 'd1035233986514bcfb6d67e0af6f4c9e.jpg', 17, '2018-08-15 15:40:10', '2018-08-15 15:40:10'),
(36, 'd19260bf41957e0421bea1a3c539ad08.jpg', 17, '2018-08-15 15:40:11', '2018-08-15 15:40:11'),
(37, '8d57a0315a196494acf45792318c9b50.jpg', 17, '2018-08-15 15:40:12', '2018-08-15 15:40:12'),
(38, 'a66c786e84e6e4ef8d1d712c0ae9b771.jpg', 26, '2018-08-19 07:52:45', '2018-08-19 07:52:45'),
(39, 'e8d3ae45057d19309334fcefa5588005.jpg', 25, '2018-08-19 07:53:08', '2018-08-19 07:53:08'),
(40, '6a3bcd25955a7eb8d462701f10ebbaf2.png', 24, '2018-08-19 07:53:33', '2018-08-19 07:53:33'),
(41, '65dec826b1edfccb399aaa9115c0453e.jpg', 23, '2018-08-19 07:53:55', '2018-08-19 07:53:55'),
(42, '640fdaaee924a0a64464b19b5819967a.jpg', 22, '2018-08-19 07:54:23', '2018-08-19 07:54:23'),
(43, 'fb48539d3f551d974052a533de21f0c4.jpg', 22, '2018-08-19 07:54:36', '2018-08-19 07:54:36'),
(44, '36bf728cdc9c1c006fa16ee605d058f4.jpg', 21, '2018-08-19 07:55:02', '2018-08-19 07:55:02'),
(45, '5d4114b84f4ec3a5de070ae2f8d1807b.jpg', 20, '2018-08-19 07:55:40', '2018-08-19 07:55:40'),
(46, '1fc3e40e7d5bc274898c77d5e882f532.jpg', 18, '2018-08-19 07:55:53', '2018-08-19 07:55:53'),
(47, '8b31e437df9a8e1d3403f1e606ba494d.jpg', 19, '2018-08-19 07:57:37', '2018-08-19 07:57:37'),
(51, '9954f188f688b1097b68920d2388d969.jpg', 27, '2018-08-24 14:39:09', '2018-08-24 14:39:09'),
(52, '3eaa6c3d9aba2f21ac209f6b3e1b1674.jpg', 27, '2018-08-24 14:39:10', '2018-08-24 14:39:10'),
(53, 'a591ee718575260e2796829287bbde85.jpg', 27, '2018-08-24 14:39:10', '2018-08-24 14:39:10'),
(54, '1d8b781ffd7cdb5f934121219aec590d.jpg', 27, '2018-08-24 14:39:11', '2018-08-24 14:39:11'),
(55, 'b97534b2f44acd1e0dc8edf21c04c32f.jpg', 27, '2018-08-24 14:39:12', '2018-08-24 14:39:12'),
(56, '1e0c19c6965ab26c1c2e4be22a851b9d.jpg', 28, '2018-08-26 12:12:11', '2018-08-26 12:12:11'),
(57, '8459e6a1d0d6e8d3dda09dbd2db834e3.jpg', 28, '2018-08-26 12:12:12', '2018-08-26 12:12:12'),
(58, '2483e7dfece0951d20f322f971407f19.jpg', 28, '2018-08-26 12:12:12', '2018-08-26 12:12:12'),
(59, '89f7c50bf7b8e806703c06d8fdfca218.jpg', 28, '2018-08-26 12:12:13', '2018-08-26 12:12:13'),
(60, 'eb83cca70a8489bc8d8adc15d1ae5052.jpg', 28, '2018-08-26 12:12:13', '2018-08-26 12:12:13'),
(61, 'a4739deb8319e34e1857621cd8f06e2a.jpg', 28, '2018-08-26 12:12:14', '2018-08-26 12:12:14'),
(62, 'e9bd5aab8e737b016321d495a6a9af99.jpg', 28, '2018-08-26 12:12:14', '2018-08-26 12:12:14'),
(63, 'e776253b9a084066d00b348dbaa724bd.jpg', 28, '2018-08-26 12:12:15', '2018-08-26 12:12:15'),
(64, '90f32705ea26ef592e7242e6cbce84fb.jpg', 28, '2018-08-26 12:12:16', '2018-08-26 12:12:16'),
(65, '1af957750102dd09644c8f23c5bcaf35.jpg', 28, '2018-08-26 12:12:16', '2018-08-26 12:12:16'),
(66, '03c0a1f0109235be6e4a32b0514309d3.jpg', 28, '2018-08-26 12:12:17', '2018-08-26 12:12:17'),
(67, '9b62dc3a7588a887ee917b521850f76f.png', 23, '2018-09-01 08:47:43', '2018-09-01 08:47:43'),
(68, '965d703998526dfd657372a5a9121bc2.png', 25, '2018-09-01 08:48:33', '2018-09-01 08:48:33'),
(69, 'f72286a0b6e9f2644c1ce45c83206521.png', 25, '2018-09-01 08:48:34', '2018-09-01 08:48:34'),
(70, 'bf90771c60c2f8f1d75fffeae2ea6101.jpg', 25, '2018-09-01 08:48:35', '2018-09-01 08:48:35'),
(71, 'a862dd08dc0d22e07a6adc1ada65568d.jpg', 25, '2018-09-01 08:48:35', '2018-09-01 08:48:35'),
(73, '22dcd44929cce9485c0bb6a2fdfc98f1.jpg', 16, '2018-09-01 08:53:54', '2018-09-01 08:53:54'),
(76, '5e68e68eb0005f5cc552050bd078048e.jpg', 16, '2018-09-01 08:53:56', '2018-09-01 08:53:56'),
(77, 'cd526fcfb450dac6c11a6d216a5bb10c.jpg', 16, '2018-09-01 08:53:57', '2018-09-01 08:53:57'),
(78, '66437283499aadbcd65c12a256741cdb.jpg', 29, '2018-10-28 08:19:14', '2018-10-28 08:19:14'),
(79, '2197f5148920bc7ceb21c8f0da221b02.jpg', 29, '2018-10-28 08:19:45', '2018-10-28 08:19:45'),
(80, 'fe8a9ae2fb13fbe61ea2c759e5f507c4.jpg', 29, '2018-10-28 08:19:46', '2018-10-28 08:19:46'),
(81, '37bf1f9d0917d2e5b1557c36e0b0d2a8.jpg', 29, '2018-10-28 08:19:46', '2018-10-28 08:19:46'),
(83, 'cfc073e400e02c9a422f15e72b25b4af.jpg', 30, '2018-11-12 07:23:25', '2018-11-12 07:23:25'),
(84, 'a7cd3eb3b40ab5bbebcf8cd84784d2df.jpg', 30, '2018-11-12 07:52:49', '2018-11-12 07:52:49'),
(85, '2a09fdd7fcc9026f8bef5fc752bf7d28.jpg', 30, '2018-11-12 07:52:50', '2018-11-12 07:52:50'),
(86, 'f090aef1b54077e40cdf029d3c5a4db3.jpg', 30, '2018-11-12 07:52:51', '2018-11-12 07:52:51'),
(87, '957efc1273f56ac5bf239def53fdd605.jpg', 30, '2018-11-12 07:52:53', '2018-11-12 07:52:53'),
(88, 'cb64c3595609890c91fabe3fe24d80a0.jpg', 30, '2018-11-12 07:52:54', '2018-11-12 07:52:54'),
(89, '27f1b9ef7fda09b8c7f8f3776e9621d3.jpg', 30, '2018-11-12 07:52:55', '2018-11-12 07:52:55'),
(90, '7458eb31ef688aaf633ebcb45f3bb6f7.jpg', 30, '2018-11-12 07:52:56', '2018-11-12 07:52:56'),
(91, 'fed6158caa715793096eb1d22a59b757.jpg', 30, '2018-11-12 07:52:57', '2018-11-12 07:52:57'),
(92, '3350663d642caaf1b50020c70114e5f5.jpg', 30, '2018-11-12 07:52:58', '2018-11-12 07:52:58'),
(93, '514e7caabf9017608f22eab4820d5cd2.jpg', 30, '2018-11-12 07:52:59', '2018-11-12 07:52:59'),
(94, 'd5d80e0aa8bf00d0ce4816b50bd27b5b.jpg', 31, '2018-11-18 16:16:43', '2018-11-18 16:16:43'),
(95, '35ea4507038501bd52514fa7e493fe5c.jpg', 31, '2018-11-18 16:17:00', '2018-11-18 16:17:00'),
(96, '92a8db660c412adf0ee494579cf80bc7.jpg', 31, '2018-11-18 16:17:01', '2018-11-18 16:17:01'),
(97, 'd2612fddf060c9b896832b410209d741.jpg', 31, '2018-11-18 16:17:02', '2018-11-18 16:17:02'),
(98, '848f0803e3a7d2e22c1166a11211d2b5.jpg', 16, '2018-12-02 08:45:23', '2018-12-02 08:45:23'),
(99, '4fd4b79e107935d7730ed3ae33d5a6a4.jpg', 16, '2018-12-02 08:45:24', '2018-12-02 08:45:24'),
(100, 'eed51b9746e41ed41b8fdfa9a3473a91.jpg', 16, '2018-12-02 08:45:25', '2018-12-02 08:45:25'),
(101, 'c21a864da59c1e0b880cee1d9818cfc4.jpg', 16, '2018-12-02 08:45:25', '2018-12-02 08:45:25'),
(102, '1c848597f679862710a5734562184476.jpg', 16, '2018-12-02 08:45:26', '2018-12-02 08:45:26'),
(103, '66b34e10288d0369d5c8357783a6a417.jpg', 16, '2018-12-02 08:45:27', '2018-12-02 08:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `send_email` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `product_id`, `user_id`, `parent_id`, `status`, `time`, `question`, `send_email`) VALUES
(43, 28, 2, 0, 1, 1539453637, 'با سلام \r\nصثهیب صثهخی صهاثبی\r\nضصهی.ضصیهضصیهخضص\r\nضصهمثاس ضهصی خصهض یهصا ثیاه .صضهای صهاث یبهخصا ثیهخباص ثهخبیا صخهثایب صهث بخهصا ثهخبیا صهخثاب \r\nصث یصهث یبهصتا ثهیاص خهاثبی خهصا ثیهصخا ثیباصث', 0),
(44, 28, 2, 0, 1, 1539463602, 'لغذالبغ', 0),
(45, 28, 2, 43, 1, 1539463625, 'ثقب', 0),
(47, 28, 2, 43, 1, 1539463649, 'ث4قبف', 0),
(48, 28, 2, 43, 1, 1539463650, 'ث4قبف', 0),
(49, 28, 2, 0, 1, 1539464640, 'فق', 0),
(50, 28, 2, 0, 1, 1539465012, 'فق', 0),
(54, 28, 1, 50, 1, 1540989952, 'errrrrrrrrrrrrrrrrrrr', 0),
(55, 28, 1, 54, 1, 1540989981, 'yyyyyyyyyyyyyyyyyyyyy', 0),
(56, 28, 1, 55, 1, 1540990404, 'xxxxxxxxxxxxxxxxxxxx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `review_tozihat` text COLLATE utf8_unicode_ci,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review_tozihat`, `product_id`, `type`) VALUES
(3, '<p dir=\"rtl\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\"><span style=\"background-color:#ffffff; color:#404040\">از تولید اولین آیفون در سال 2007، ده سالی می&zwnj;گذرد و اپل جشن ده&zwnj;ساله&zwnj;شدن آیفون را با تولید آیفونی جشن گرفته که اعتقاد دارد، می&zwnj;تواند تحولی بزرگ در دنیای موبایل پدید آورد. این دقیقا شبیه حرفی است که استیو جابز ده سال پیش در مراسم معرفی اولین آیفون گفت. امروز که به ده سال پیش نگاه می&zwnj;کنیم، آیفون باعث شده تا صنعت موبایل پیشرفتی عجیب&zwnj;و&zwnj;غریب داشته باشد. در مقابل خیلی از منتقدان عقیده دارند، آیفون 10 آن&zwnj;طورکه بایدوشاید نمی&zwnj;تواند محصولی انقلابی باشد. اپل سعی کرده کم&zwnj;کاری سه سال قبل را در تولید این گوشی جبران کند و امکانات جدیدی را روی آن قرار دهد تا علاوه بر طرفداران اپل، بقیه&zwnj;ی کاربران هم به خرید آن ترغیب شوند</span></span></span></p>\r\n\r\n<p style=\"text-align:right\">Start_review <span style=\"background-color:#ffffff; color:#404040; font-family:IRANYekan,sans-serif; font-size:16.002px\">.</span></p>\r\n\r\n<p style=\"text-align:right\">Start_item</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:28px\">کسی به غیر از تو را نمی شناسم</span></p>\r\n\r\n<p dir=\"rtl\">End_item</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:left\"><img alt=\"\" src=\"http://localhost:8000/upload/product_image/bfb8dc98e7956d299eaf2d33072e95c7.jpg\" /></p>\r\n\r\n<div class=\"c-content-expert__text\" style=\"-webkit-text-stroke-width:0px; background-color:#ffffff; box-sizing:inherit; color:#404040; display:block !important; font-family:IRANYekan,sans-serif; font-size:1.071rem; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; line-height:2.53; orphans:2; outline:none !important; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; word-spacing:0px\">\r\n<p dir=\"rtl\" style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:16px\">در فناوری تشخیص چهره&zwnj;ی اپل، یک دوربین و فرستنده&zwnj;ی مادون&zwnj;قرمز در بالای نمایشگر قرار داده &zwnj;شده&zwnj; است؛ هنگامی&zwnj;که آیفون می&zwnj;خواهد چهره&zwnj;ی شما را تشخیص دهد، فرستنده&zwnj;ی نوری نامرئی را به &zwnj;صورت شما می&zwnj;تاباند. دوربین مادون&zwnj;قرمز، این نور را تشخیص داده و با الگویی که قبلا از صورت شما ثبت کرده، مطابقت می&zwnj;دهد و در صورت یکی&zwnj;بودن، قفل گوشی را باز می&zwnj;کند. اپل ادعا کرده، الگوی صورت را با استفاده از سی هزار نقطه ذخیره می&zwnj;کند که دورزدن آن اصلا کار ساده&zwnj;ای نیست. استفاده از ماسک، عکس یا موارد مشابه نمی&zwnj;تواند امنیت اطلاعات شما را به خطر اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید برای امنیت اطلاعاتتان نگران باشید</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:right\"><s><sup><span style=\"font-family:Arial,Helvetica,sans-serif\"><img alt=\"\" src=\"http://localhost:8000/upload/product_image/b011a9a7ae5b1cf783f850010071fb59.jpg\" /></span></sup></s></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:right\"><span style=\"font-size:16px\">در فناوری تشخیص چهره&zwnj;ی اپل، یک دوربین و فرستنده&zwnj;ی مادون&zwnj;قرمز در بالای نمایشگر قرار داده &zwnj;شده&zwnj; است؛ هنگامی&zwnj;که آیفون می&zwnj;خواهد چهره&zwnj;ی شما را تشخیص دهد، فرستنده&zwnj;ی نوری نامرئی را به &zwnj;صورت شما می&zwnj;تاباند. دوربین مادون&zwnj;قرمز، این نور را تشخیص داده و با الگویی که قبلا از صورت شما ثبت کرده، مطابقت می&zwnj;دهد و در صورت یکی&zwnj;بودن، قفل گوشی را باز می&zwnj;کند. اپل ادعا کرده، الگوی صورت را با استفاده از سی هزار نقطه ذخیره می&zwnj;کند که دورزدن آن اصلا کار ساده&zwnj;ای نیست. استفاده از ماسک، عکس یا موارد مشابه نمی&zwnj;تواند امنیت اطلاعات شما را به خطر اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید برای امنیت اطلاعاتتان نگران باشید</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:right\"><img alt=\"\" src=\"http://localhost:8000/upload/product_image/e1c71065cef8194489b316fb84a0ec5e.jpg\" /></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:right\"><span style=\"background-color:#ffffff; color:#404040; font-family:IRANYekan,sans-serif; font-size:14.994px\"><span style=\"font-size:16px\">ماوس Wireless Mobile 1850 با طول 10 سانتی&zwnj;متری خود محصولی کوچک و جمع&zwnj;وجور است و به&zwnj;صورت طراحی&zwnj;شده است که می&zwnj;توان از آن با هر دو دست استفاده کرد. شکل ظاهری این محصول مانند بسیاری دیگر از محصولات موجود در بازار گرد و تخم&zwnj;مرغی است. طراحی این محصول تا حدی شبیه به ماوس Sculpt Mobile مایکروسافت است اما از دکمه ویندوز در آن خبری نیست. در کل طراحی این محصول را می&zwnj;توان رضایت&zwnj;بخش عنوان کرد</span>.</span></p>\r\n</div>', 17, 'review'),
(4, '<div class=\"col-md-6 pencile\"><img alt=\"\" src=\"http://localhost:8000/upload/product_image/82246704e5e7bdef6bec2cacae02dc20.png\" style=\"height:175px; width:187px\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<p>رزولوشن 1080&times;1920 پیکسل برخوردار است و قابلیت مالتی تاچ دارد و می&zwnj;تواند به&zwnj; طور هم&zwnj;زمان 10 لمس را تشخیص دهد. دوربین اصلی آن، سنسور 13مگاپیکسلی دارد و به یک فلش LED مجهز شده است. به کمک این دوربین می&zwnj;توان با سرعت 30 فریم بر ثانیه و با رزولوشن 1080&times;1920 تصویربرداری کرد. دوربین سلفی یا دوربین دوم هم قابلیت فیلم&zwnj;برداری به&zwnj;صورت Full HD دارد و علاوه&zwnj;بر سنسور 13مگاپیکسلی به فلاش LED مجهز است. پردازنده&zwnj;ی این گوشی به تراشه&zwnj;ی اگزینوس 7870 از نوع 64بیتی مجهز است که 8 هسته دارد و می&zwnj;تو</p>\r\n</div>\r\n\r\n<p>start_review&nbsp;</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-size:22px\">صفحه نمایش</span></span></p>\r\n\r\n<p>end_item</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/f80d7656e3dc4a67156b5977e07d949d.jpg\" /></p>\r\n\r\n<p>پس از اینکه کاربران از گوشی&zwnj;های سری A &laquo;سامسونگ&raquo; با بدنه&zwnj;های باریک فلزی استقبال خوبی کردند، در سال 2017، این شرکت کره&zwnj;ای با معرفی دو گوشی J5 و J7 نشان داد که می&zwnj;خواهد بدنه&zwnj;ی فلزی را برای گوشی&zwnj;های میان&zwnj;رده&zwnj;اش هم به کار ببرد؛ اگرچه قبلا گوشی&zwnj;های J5 و J7 به بازار وارد شده بودند؛ اما نسل جدید این گوشی&zwnj;ها که ساخت سال 2017 هستند، علاوه&zwnj;بر تفاوتی که با نسل قبلی&zwnj;شان در مواد و متریال به&zwnj;کار&zwnj;رفته در ساخت بدنه&zwnj;شان دارند، تغییرات سخت&zwnj;افزاری هم داشته&zwnj;اند. نقطه قوت گوشی&zwnj;های سری J را می&zwnj;توان کیفیت ساخت بدنه، دوربین سلفی باکیفیت و سرعت اتصال آن&zwnj;ها به اینترنت دانست. گوشی سامسونگ &laquo;Galaxy J7 Pro&raquo; که در اینجا امکان خرید اینترنتی آن را دارید، 152.5 میلی&zwnj;متر طول، 74.8 میلی&zwnj;متر عرض و 7.9 میلی&zwnj;متر ضخامت دارد. بدنه&zwnj;ی آن از فلز و شیشه ساخته شده است و چیزی در حدود 181 گرم وزن دارد. صفحه&zwnj;نمایش 5.5اینچی آن که تراکمی</p>\r\n\r\n<div class=\"review-div-item\">\r\n<p>قاب جلویی گوشی&zwnj;ها ساده است و سامسونگ همان ترکیب سنتی کلید&zwnj;هایش را زیر نمایشگر حفظ کرده است. لبه&zwnj;های گرد، قاب پشتی بدون پست و بلندی که انحنایی در لبه&zwnj;ها برای کنترل ساده&zwnj;&zwnj;ی گوشی دارد در کنار وزن و ابعاد مناسب با در نظر گرفتن اندازه&zwnj;ی نمایشگر، مشخصات ظاهری این سری هستند. &zwnj;مورد امیدوارکننده اینکه شیار&zwnj;های سیم&zwnj;کارت و کارت حافظه&zwnj;ی جانبی به&zwnj;صورت جداگانه در نظر گرفته&zwnj;شده، همچنین برای J7 Pro حسگر اثرانگشت در کلید خانه تعبیه&zwnj;شده تا در مورد امنیت هم حرفی برای گفتن داشته باشد. استفاده از فلز و قرار دادن حسگر اثرانگشت باعث شده تا این گوشی&zwnj; فراتر از سایر میان&zwnj;رده&zwnj;های بازار باشد</p>\r\n</div>\r\n\r\n<div class=\"col-md-5\">\r\n<p>برابر 401 پیکسل بر هر اینچ دارد، از نوع اولد است و فناوری سوپر امولد در آن استفاده شده است. این صفحه&zwnj;نمایش که قابلیت نمایش 16 میلیون رنگ دارد، از رزولوشن 1080&times;1920 پیکسل برخوردار است و قابلیت مالتی تاچ دارد و می&zwnj;تواند به&zwnj; طور هم&zwnj;زمان 10 لمس را تشخیص دهد. دوربین اصلی آن، سنسور 13مگاپیکسلی دارد و به یک فلش LED مجهز شده است. به کمک این دوربین می&zwnj;توان با سرعت 30 فریم بر ثانیه و با رزولوشن 1080&times;1920 تصویربرداری کرد. دوربین سلفی یا دوربین دوم هم قابلیت فیلم&zwnj;برداری به&zwnj;صورت Full HD دارد و علاوه&zwnj;بر سنسور 13مگاپیکسلی به فلاش LED مجهز است. پردازنده&zwnj;ی این گوشی به تراشه&zwnj;ی اگزینوس 7870 از نوع 64بیتی مجهز است که 8 هسته دارد و می&zwnj;تواند اطلاعات را با فرکانس 1.6 گیگاهرتز پردازش کند. گلکسی J7 Pro حافظه رمی معادل 3 گیگابایت دارد و حافظه&zwnj;ی داخلی آن 32 گیگابایت است؛ البته به کمک شیار microSD که در بدنه&zwnj;ی آن جاسازی شده است، می&zwnj;توان ظرفیت ذخیره&zwnj;سازی را تا 256 گیگابایت افزایش داد. علاوه&zwnj;بر وای&zwnj;فای، این گوشی می&zwnj;تواند به شبکه&zwnj;های ارتباطی 3G و 4G هم دسترسی داشته باشد تا دسترسی به اطلاعات در فضای مجازی را برای صاحبش با سرعت زیادی میسر کند. در آخر باید گفت که سیستم&zwnj;عامل این گوشی اندروید نوقا (Nougat 7.0) است و باتری لیتیوم&zwnj;یون آن که 3600 میلی&zwnj;آمپرساعت ظرفیت دارد، می&zwnj;تواند برای ساعت&zwnj;ها در حالت مکالمه (۲۴ ساعت با اتصال 3G) یا استندبای (۹۱ ساعت)، انرژی خود را حفظ کند.</p>\r\n</div>\r\n\r\n<div class=\"col-md-7\"><img alt=\"\" src=\"http://localhost:8000/upload/product_image/bff3c33b8a50126868ea62acdd02162e.jpg\" /></div>\r\n\r\n<div style=\"clear:both\">&nbsp;</div>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/c787faca4245e9bc2bc71e60b6fb893c.jpg\" /></p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p><span style=\"font-size:22px\">سخت افزار و سیستم عامل</span></p>\r\n\r\n<p>end_item</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/c6ce0462e83dd55f8ee0da1250cbf27a.jpg\" /></p>\r\n\r\n<p>پس از اینکه کاربران از گوشی&zwnj;های سری A &laquo;سامسونگ&raquo; با بدنه&zwnj;های باریک فلزی استقبال خوبی کردند، در سال 2017، این شرکت کره&zwnj;ای با معرفی دو گوشی J5 و J7 نشان داد که می&zwnj;خواهد بدنه&zwnj;ی فلزی را برای گوشی&zwnj;های میان&zwnj;رده&zwnj;اش هم به کار ببرد؛ اگرچه قبلا گوشی&zwnj;های J5 و J7 به بازار وارد شده بودند؛ اما نسل جدید این گوشی&zwnj;ها که ساخت سال 2017 هستند، علاوه&zwnj;بر تفاوتی که با نسل قبلی&zwnj;شان در مواد و متریال به&zwnj;کار&zwnj;رفته در ساخت بدنه&zwnj;شان دارند، تغییرات سخت&zwnj;افزاری هم داشته&zwnj;اند. نقطه قوت گوشی&zwnj;های سری J را می&zwnj;توان کیفیت ساخت بدنه، دوربین سلفی باکیفیت و سرعت اتصال آن&zwnj;ها به اینترنت دانست. گوشی سامسونگ &laquo;Galaxy J7 Pro&raquo; که در اینجا امکان خرید اینترنتی آن را دارید، 152.5 میلی&zwnj;متر طول، 74.8 میلی&zwnj;متر عرض و 7.9 میلی&zwnj;متر ضخامت دارد. بدنه&zwnj;ی آن از فلز و شیشه ساخته شده است و چیزی در حدود 181 گرم وزن دارد. صفحه&zwnj;نمایش 5.5اینچی آن که تراکمی برابر 401 پیکسل بر هر اینچ دارد، از نوع اولد است و فناوری سوپر امولد در آن استفاده شده است. این صفحه&zwnj;نمایش که قابلیت نمایش 16 میلیون رنگ دارد، از رزولوشن 1080&times;1920 پیکسل برخوردار است و قابلیت مالتی تاچ دارد و می&zwnj;تواند به&zwnj; طور هم&zwnj;زمان 10 لمس را تشخیص دهد. دوربین اصلی آن، سنسور 13مگاپیکسلی دارد و به یک فلش LED مجهز شده است.&nbsp;</p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p><span style=\"font-size:22px\">دوربین</span></p>\r\n\r\n<p>end_item</p>\r\n\r\n<p>پس از اینکه کاربران از گوشی&zwnj;های سری A &laquo;سامسونگ&raquo; با بدنه&zwnj;های باریک فلزی استقبال خوبی کردند، در سال 2017، این شرکت کره&zwnj;ای با معرفی دو گوشی J5 و J7 نشان داد که می&zwnj;خواهد بدنه&zwnj;ی فلزی را برای گوشی&zwnj;های میان&zwnj;رده&zwnj;اش هم به کار ببرد؛ اگرچه قبلا گوشی&zwnj;های J5 و J7 به بازار وارد شده بودند؛ اما نسل جدید این گوشی&zwnj;ها که ساخت سال 2017 هستند، علاوه&zwnj;بر تفاوتی که با نسل قبلی&zwnj;شان در مواد و متریال به&zwnj;کار&zwnj;رفته در ساخت بدنه&zwnj;شان دارند، تغییرات سخت&zwnj;افزاری هم داشته&zwnj;اند. نقطه قوت گوشی&zwnj;های سری J را می&zwnj;توان کیفیت ساخت بدنه، دوربین سلفی باکیفیت و سرعت اتصال آن&zwnj;ها به اینترنت دانست. گوشی سامسونگ &laquo;Galaxy J7 Pro&raquo; که در اینجا امکان خرید اینترنتی آن را دارید، 152.5 میلی&zwnj;متر طول، 74.8 میلی&zwnj;متر عرض و 7.9 میلی&zwnj;متر ضخامت دارد. بدنه&zwnj;ی آن از فلز و شیشه ساخته شده است و چیزی در حدود 181 گرم وزن دارد. صفحه&zwnj;نمایش 5.5اینچی آن که تراکمی برابر 401 پیکسل بر هر اینچ دارد، از نوع اولد است و فناوری سوپر امولد در آن استفاده شده است. این صفحه&zwnj;نمایش که قابلیت نمایش 16 میلیون رنگ دارد، از رزولوشن 1080&times;1920 پیکسل برخوردار است و قابلیت مالتی تاچ دارد و می&zwnj;تواند به&zwnj; طور هم&zwnj;زمان 10 لمس را تشخیص دهد. دوربین اصلی آن، سنسور 13مگاپیکسلی دارد و به یک فلش LED مجهز شده است.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/171a9bc887e6fba38d9acad4f595dd44.jpg\" /></p>\r\n\r\n<p>دوربین اصلی&nbsp; J7 Pro سنسور&zwnj;&zwnj;&zwnj; 13 مگاپیکسلی دارد. هیچ فناوری منحصربه&zwnj;فردی برای این دوربین&zwnj;&zwnj;&zwnj; در نظر گرفته نشده و تنها یک فلش این دوربین را همراهی می&zwnj;&zwnj;&zwnj;کند. این دوربین برخلاف بسیاری از گوشی&zwnj;&zwnj;&zwnj;های دیگر، از قاب پشتی بیرون نزده و این با توجه به ضخامت گوشی امیدوارکننده است. کیفیت تصاویر عمومی که با دوربین گوشی ثبت می&zwnj;&zwnj;&zwnj;شود، قابل&zwnj;&zwnj;&zwnj;قبول و راضی&zwnj;&zwnj;&zwnj;کننده است و برای به اشتراک&zwnj;&zwnj;&zwnj;گذاری در شبکه&zwnj;&zwnj;&zwnj;های اجتماعی و ثبت لحظات شما کافی به نظر می&zwnj;&zwnj;&zwnj;رسد. اما نمی&zwnj;&zwnj;&zwnj;توان مثل یک دوربین حرفه&zwnj;&zwnj;&zwnj;ای موبایل روی آن&zwnj;&zwnj;&zwnj;ها حساب باز کرد. دوربین سلفی به&zwnj; سنسور&zwnj;&zwnj;&zwnj; 13 مگاپیکسلی مجهز شده که با توجه f 1.9 برای عکاسی در نور&zwnj;&zwnj;&zwnj;های کم یا حتی گرگ&zwnj;&zwnj;&zwnj;و&zwnj;&zwnj;&zwnj;میش هم مناسب است.</p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p><span style=\"font-size:22px\">جمع بندی</span></p>\r\n\r\n<p>end_item</p>\r\n\r\n<p>در مجموع بدنه&zwnj;ی فلزی، طراحی زیبا با ابعاد مناسب، نمایشگر&zwnj; با فناوری اولد، سخت&zwnj;افزار قابل&zwnj;قبول، دوربین&zwnj; سلفی عالی و همچنین سیستم&zwnj;عامل به&zwnj;روز و رابط کاربری کاربردی در کنار مصرف بهینه&zwnj;شده&zwnj;ی باتری؛ ثابت می&zwnj;کنند که J7 Pro با نشانه گرفتن بازار هدف و در اولویت قرار دادن نیاز&zwnj;های جدید کاربران؛ برای فروش بیشتر، طراحی و تولید شده&zwnj; است.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/65d35e7cf466d0446b056c85121728f7.jpg\" /></p>\r\n\r\n<div class=\"dd\">\r\n<p><span style=\"font-size:22px\">جدیترین</span></p>\r\n\r\n<p>ن اصلی&nbsp; J7 Pro سنسور&zwnj;&zwnj;&zwnj; 13 مگاپیکسلی دارد. هیچ فناوری منحصربه&zwnj;فردی برای این دوربین&zwnj;&zwnj;&zwnj; در نظر گرفته نشده و تنها یک فلش این دوربین را همراهی می&zwnj;&zwnj;&zwnj;کند. این دوربین برخلاف بسیاری از گوشی&zwnj;&zwnj;&zwnj;های دیگر، از قاب پشتی بیرون نزده و این با توجه به ضخامت گوشی امیدوارکننده است. کیفیت تصاویر عمومی که با دوربین گوشی ثبت می&zwnj;&zwnj;&zwnj;شود، قابل&zwnj;&zwnj;&zwnj;قبول و راضی&zwnj;&zwnj;&zwnj;کننده است و برای به اشتراک&zwnj;&zwnj;&zwnj;گذاری در شبکه&zwnj;&zwnj;&zwnj;های اجتماعی و ثبت لحظات شما کافی به نظر می&zwnj;&zwnj;&zwnj;رسد. اما نمی&zwnj;&zwnj;&zwnj;توان مثل یک دوربین حرفه&zwnj;&zwnj;&zwnj;ای موبایل روی آن&zwnj;&zwnj;&zwnj;ها حساب باز کرد. دوربین سلفی به&zwnj; سنسور&zwnj;&zwnj;&zwnj; 13 مگاپیکسلی مجهز شده که با توجه f 1.9 برای عکاسی در نور&zwnj;&zwnj;&zwnj;های کم یا حتی</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/product_image/f80d7656e3dc4a67156b5977e07d949d.jpg\" /></p>\r\n</div>', 27, 'review');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `product_id`, `user_id`, `time`, `value`) VALUES
(2, 28, 2, 1538920188, '1_1@#$%2_4@#$%3_2@#$%4_5@#$%5_1@#$%6_3@#$%'),
(3, 28, 1, 1538935546, '1_3@#$%2_1@#$%3_0@#$%4_4@#$%5_5@#$%6_2@#$%'),
(4, 14, 2, 1541693410, '1_5@#$%2_3@#$%3_1@#$%4_5@#$%5_1@#$%6_3@#$%'),
(5, 15, 2, 1541693492, '1_1@#$%2_2@#$%3_3@#$%4_4@#$%5_5@#$%6_5@#$%'),
(6, 16, 7, 1542046164, '1_3@#$%2_1@#$%3_5@#$%4_2@#$%5_3@#$%6_5@#$%');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `product_id`, `parent_id`, `color_id`, `date`, `time`, `price`, `is_active`) VALUES
(3, '18 ماه گارانتی هماهنگ + گواهی میزان خسارت', 17, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'گرانتی دیجی کالا', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'گرانتی دیجی کالا', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '-', 17, 3, 2, '1397-6-22', 1536780600, 4550000, NULL),
(51, 'گرانتی دیجی آنلاین', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '-', 28, 51, 8, '1397-6-30', 1537471800, 2450000, NULL),
(54, 'گرانتی دیجی کالا', 26, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '-', 26, 54, 14, '1397-6-30', 1537471800, 550000, NULL),
(58, 'rg4r5tg', 27, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'گارانتی ویژه دیجی آنلاین', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '-', 28, 59, 8, '1397-7-29', 1540067400, 2600000, NULL),
(61, '-', 28, 59, 9, '1397-7-29', 1540067400, 2700000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `option_name`, `option_value`) VALUES
(1, 'TerminalId', 'g'),
(2, 'UserName', 'pppppppppp'),
(3, 'Password', NULL),
(4, 'MerchantID', 'zzzzzzzzzzzzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `shars`
--

CREATE TABLE `shars` (
  `id` int(10) UNSIGNED NOT NULL,
  `shar_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ostan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shars`
--

INSERT INTO `shars` (`id`, `shar_name`, `ostan_id`, `created_at`, `updated_at`) VALUES
(1, 'فومن', 2, '2018-09-06 04:56:53', '2018-09-06 04:56:53'),
(3, 'تهران', 3, '2018-09-06 06:54:42', '2018-09-06 06:54:42'),
(4, 'ورامین', 4, '2018-09-06 06:55:01', '2018-09-06 06:55:01'),
(5, 'ری', 8, '2018-09-06 06:55:24', '2018-09-06 06:55:24'),
(6, 'رشت', 2, '2018-09-07 02:26:44', '2018-09-07 02:26:44'),
(7, 'صومعه سرا', 2, '2018-09-07 02:27:26', '2018-09-07 02:27:26'),
(8, 'انزلی', 2, '2018-09-07 02:27:51', '2018-09-07 02:27:51'),
(9, 'لاهیجان', 2, '2018-09-07 02:28:14', '2018-09-07 02:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `url`, `image`) VALUES
(1, 'لپ تاپ', 'http://localhost:8000/admin/slider/create', 'slider1.jpg'),
(2, 'تبلت', 'http://localhost:8000/admin/slider', 'slider2.jpg'),
(3, 'لپ تاپ', 'http://localhost:8000/admin/slider00', 'slider3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smsir_logs`
--

CREATE TABLE `smsir_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `response` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `total_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `year`, `month`, `day`, `view`, `total_view`) VALUES
(1, '1397', '08', '06', 2, 7),
(2, '1397', '08', '08', 1, 3),
(3, '1397', '08', '07', 1, 4),
(4, '1397', '8', '08', 1, 11),
(5, '1397', '8', '09', 1, 2),
(6, '1397', '8', '10', 1, 18),
(7, '1397', '8', '11', 1, 2),
(8, '1397', '8', '12', 1, 1),
(9, '1397', '8', '13', 1, 115),
(10, '1397', '8', '14', 1, 201),
(11, '1397', '8', '15', 1, 22),
(12, '1397', '8', '16', 1, 144),
(13, '1397', '8', '17', 1, 72),
(14, '1397', '8', '18', 1, 3),
(15, '1397', '8', '20', 1, 1),
(16, '1397', '8', '21', 1, 121),
(17, '1397', '8', '22', 1, 1),
(18, '1397', '8', '24', 1, 6),
(19, '1397', '8', '25', 1, 6),
(20, '1397', '8', '26', 1, 37),
(21, '1397', '8', '27', 1, 29),
(22, '1397', '8', '29', 1, 15),
(23, '1397', '8', '30', 1, 25),
(24, '1397', '9', '02', 1, 2),
(25, '1397', '9', '04', 1, 48),
(26, '1397', '9', '05', 1, 2),
(27, '1397', '9', '06', 1, 13),
(28, '1397', '9', '07', 1, 4),
(29, '1397', '9', '08', 1, 5),
(30, '1397', '9', '09', 1, 9),
(31, '1397', '9', '10', 1, 75),
(32, '1397', '9', '11', 1, 158),
(33, '1397', '9', '12', 1, 253);

-- --------------------------------------------------------

--
-- Table structure for table `statistics_user`
--

CREATE TABLE `statistics_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics_user`
--

INSERT INTO `statistics_user` (`id`, `year`, `month`, `day`, `user_ip`) VALUES
(1, '1397', '8', '06', '127.0.0.12'),
(2, '1397', '8', '06', '127.0.0.1'),
(3, '1397', '8', '08', '127.0.0.1'),
(4, '1397', '8', '09', '127.0.0.1'),
(5, '1397', '8', '10', '127.0.0.1'),
(6, '1397', '8', '11', '127.0.0.1'),
(7, '1397', '8', '12', '127.0.0.1'),
(8, '1397', '8', '13', '127.0.0.1'),
(9, '1397', '8', '14', '127.0.0.1'),
(10, '1397', '8', '15', '127.0.0.1'),
(11, '1397', '8', '16', '127.0.0.1'),
(12, '1397', '8', '17', '127.0.0.1'),
(13, '1397', '8', '18', '127.0.0.1'),
(14, '1397', '8', '20', '127.0.0.1'),
(15, '1397', '8', '21', '127.0.0.1'),
(16, '1397', '8', '22', '127.0.0.1'),
(17, '1397', '8', '24', '127.0.0.1'),
(18, '1397', '8', '25', '127.0.0.1'),
(19, '1397', '8', '26', '127.0.0.1'),
(20, '1397', '8', '27', '127.0.0.1'),
(21, '1397', '8', '29', '127.0.0.1'),
(22, '1397', '8', '30', '127.0.0.1'),
(23, '1397', '9', '02', '127.0.0.1'),
(24, '1397', '9', '04', '127.0.0.1'),
(25, '1397', '9', '05', '127.0.0.1'),
(26, '1397', '9', '06', '127.0.0.1'),
(27, '1397', '9', '07', '127.0.0.1'),
(28, '1397', '9', '08', '127.0.0.1'),
(29, '1397', '9', '09', '127.0.0.1'),
(30, '1397', '9', '10', '127.0.0.1'),
(31, '1397', '9', '11', '127.0.0.1'),
(32, '1397', '9', '12', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(1, 'admin', '$2y$10$Yc9dhr9v0jyZ4FHFT6ib.uG7l4GmQzJI9HJwbSMudOFOTz3GVs/TG', 'hossein13660630@gmail.com', 'admin', 'cjOIFGTaTwfoqBrbaWHQPpsnsDM9Zr8EKzz79exCSxoIjZX7jXucZrFjEc8A', '2018-09-17 06:52:02', '2018-09-17 06:52:02', 'ادمین'),
(2, 'hos11sein13660630@gmail.com', '$2y$10$DgtQeWhX1kYVC7sNR.D4quiIwu/BKjHzJJKdocU7HVf.o9nYG3J5O', '', 'user', 'qIuScS8LFAlhVJug3FGtZgJwkChPS1WV5WD7q9qGuEBmuYNklGBQg0p1wfay', '2018-09-19 05:39:41', '2018-09-19 05:39:41', 'حسین علی'),
(7, 'ali', '$2y$10$R9lpC4jmFBqSD5toFYcMnuCkPWYKAMUPxQWlM2J3vTmOMhfCnnhSS', 'ali@gmail.com', 'user', 'bOKZfnGJ3j8ot1Xa7g77Go5h93rteabMTyoI2zQwDGDfUdgqZMDnvLH9AeBd', '2018-09-23 07:41:00', '2018-09-23 07:41:00', 'علی');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ostan_id` int(10) UNSIGNED DEFAULT NULL,
  `shar_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `full_name`, `ostan_id`, `shar_id`, `phone`, `city_code`, `mobile`, `zip_code`, `address`, `created_at`, `updated_at`) VALUES
(4, 3, 'حسین شیری نژاد گشتی', 2, 1, '34711266', '013', '09114030262', '1234567890', 'بخش سردار جنگل جاده چوکا روستای حسین کوه', '2018-09-08 02:39:28', '2018-09-09 09:00:39'),
(43, 8, 'حسین شیری نژاد', 2, 1, '34711266', '013', '09114030262', '1234567899', 'بخش سردار جنگل روستای حسین کوه کوچه انتظام منزل آقای عسکر شیری نژاد', '2018-09-14 09:00:32', '2018-09-14 09:00:32'),
(44, 1, 'حسین شیری نژاد', 2, 1, '34711266', '013', '09114030262', '1234567899', 'بخش سردار جنگل روستای حسین کوه', '2018-09-20 08:37:09', '2018-09-20 08:37:09'),
(45, 2, 'محمد شیری نژاد', 3, 3, '34711266', '013', '09114030262', '1234567899', 'تهران دماوند', '2018-09-20 09:07:33', '2018-09-20 09:07:33'),
(46, 7, 'حسین شیری نژاد', 2, 1, '34711266', '013', '09114030262', '1234567899', 'حسین کوه', '2018-11-20 06:58:25', '2018-11-20 06:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amazing`
--
ALTER TABLE `amazing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD UNIQUE KEY `category_product_product_id_category_id_unique` (`product_id`,`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter_product`
--
ALTER TABLE `filter_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cart`
--
ALTER TABLE `gift_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_product`
--
ALTER TABLE `item_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_row`
--
ALTER TABLE `order_row`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ostans`
--
ALTER TABLE `ostans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shars`
--
ALTER TABLE `shars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smsir_logs`
--
ALTER TABLE `smsir_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_user`
--
ALTER TABLE `statistics_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amazing`
--
ALTER TABLE `amazing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `filter_product`
--
ALTER TABLE `filter_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `gift_cart`
--
ALTER TABLE `gift_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `item_product`
--
ALTER TABLE `item_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_row`
--
ALTER TABLE `order_row`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `ostans`
--
ALTER TABLE `ostans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shars`
--
ALTER TABLE `shars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smsir_logs`
--
ALTER TABLE `smsir_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `statistics_user`
--
ALTER TABLE `statistics_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
