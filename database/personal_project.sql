-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 02:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `order_id`, `user_id`, `first_name`, `last_name`, `company_name`, `email`, `country`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(6, 11, 2, 'Alderedo', 'Mannfa', 'AtoZ3', 'mannaf444@gmail.com', 'Bangladesh', '01744508287', 'Bhety bangal para', 'afdsa', '2021-09-05 11:02:43', '2021-09-05 11:02:43'),
(7, 12, 2, 'Devid', 'Andrea', 'Devid Tech', 'mannaf444@gmail.com', 'USA', '+1025478', 'California', 'Nice Product', '2021-09-06 05:41:13', '2021-09-06 05:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `image`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Sony', 'sony.png', 'sony', NULL, '2021-08-30 00:47:47', NULL),
(7, 'Samsung', 'samsung.jpg', 'samsung', NULL, '2021-08-30 00:48:50', NULL),
(8, 'Xiaomi', 'xiaomi.png', 'xiaomi', NULL, '2021-08-30 00:49:24', NULL),
(9, 'Walton', 'walton.png', 'walton', NULL, '2021-08-31 08:11:39', NULL),
(10, 'Adelyn Rae', 'adelyn-rae.png', 'adelyn-rae', NULL, '2021-09-04 04:46:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bundle_lists`
--

CREATE TABLE `bundle_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bundle_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundle_products`
--

CREATE TABLE `bundle_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `random_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `random_id`, `quantity`, `created_at`, `updated_at`) VALUES
(23, 10, NULL, '0DgYtHG3tXb0rbsc', 1, '2021-09-06 06:17:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Electronics', 'electronics', '2021-08-26 12:21:10', '2021-08-26 12:21:10', NULL),
(5, 'Clothings', 'clothings', '2021-08-26 12:22:34', '2021-08-26 12:22:34', NULL),
(6, 'Computers', 'computers', '2021-08-26 12:24:05', '2021-08-26 12:24:05', NULL),
(7, 'Home & Kitchen', 'home-kitchen', '2021-08-26 12:25:12', '2021-08-26 12:25:12', NULL),
(8, 'Healthy & Beauty', 'healthy-beauty', '2021-08-26 12:26:20', '2021-08-26 12:26:20', NULL),
(9, 'Jewelry & Watch', 'jewelry-watch', '2021-08-26 12:35:40', '2021-08-26 12:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `coupon_validity` date DEFAULT NULL,
  `max_price` double(8,2) DEFAULT NULL,
  `used` int(11) DEFAULT NULL COMMENT 'How Many time used this coupon',
  `max_used` int(11) DEFAULT NULL COMMENT 'How Many time you want  used this coupon',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `coupon`, `value`, `coupon_validity`, `max_price`, `used`, `max_used`, `created_at`, `updated_at`) VALUES
(1, NULL, 't20', 20, '2021-09-30', 958800.00, 2, 16, '2021-09-04 16:10:55', '2021-09-05 00:37:14'),
(2, NULL, 't50', 50, '2021-09-15', 999999.99, NULL, 3, '2021-09-04 16:10:55', '2021-09-06 05:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2021_08_22_071655_create_dashboards_table', 1),
(13, '2021_08_22_073746_create_categories_table', 1),
(14, '2021_08_22_115310_create_sub_categories_table', 1),
(16, '2021_08_22_161207_create_brands_table', 2),
(27, '2021_08_23_075918_create_products_table', 3),
(32, '2021_08_23_085456_create_product_attributes_table', 4),
(33, '2021_08_23_084932_create_thumbnails_table', 5),
(34, '2021_08_25_060621_create_bundle_products_table', 6),
(35, '2021_08_25_061559_create_bundle_lists_table', 6),
(37, '2021_09_04_111139_create_carts_table', 7),
(45, '2021_09_04_143641_create_coupons_table', 8),
(49, '2021_09_04_181322_create_orders_table', 9),
(50, '2021_09_04_181501_create_order_details_table', 9),
(51, '2021_09_04_181522_create_billing_details_table', 9),
(52, '2021_09_05_062523_create_used_coupons_table', 10),
(54, '2021_09_05_064523_add_invoice_to_order', 11),
(56, '2021_09_05_070059_create_wishlists_table', 12),
(57, '2021_09_05_072720_add_slug_to_users', 13),
(59, '2021_09_05_083838_create_user_details_table', 14),
(61, '2021_09_05_155845_add_status_to_order', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `subtotal` double(8,2) NOT NULL,
  `payment_type` set('online','cod') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'For Online= Online payment and cod=Cash on Delivery',
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` set('pending','processing','shipped','delivered','return') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `discount`, `tax`, `subtotal`, `payment_type`, `invoice`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 28600.00, 0, NULL, 28600.00, 'cod', NULL, 'pending', '2021-09-05 11:02:42', '2021-09-05 11:02:42'),
(12, 2, 65000.00, 32500, NULL, 32500.00, 'cod', NULL, 'pending', '2021-09-06 05:41:12', '2021-09-06 05:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `product_id`, `product_name`, `quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(15, 11, 2, 6, 'Sony Bravia KDL-32W600D 32 Smart HD LED TV', 1, '28000', '2021-09-05 11:02:42', '2021-09-05 11:02:42'),
(16, 11, 2, 7, 'Sony Bravia W660G 43 inch LED Smart TV', 1, '600', '2021-09-05 11:02:42', '2021-09-05 11:02:42'),
(17, 12, 2, 6, 'Sony Bravia KDL-32W600D 32 Smart HD LED TV', 2, '28000', '2021-09-06 05:41:12', '2021-09-06 05:41:12'),
(18, 12, 2, 8, 'Walton WEA-B168M', 1, '6000', '2021-09-06 05:41:12', '2021-09-06 05:41:12'),
(19, 12, 2, 7, 'Sony Bravia W660G 43 inch LED Smart TV', 5, '600', '2021-09-06 05:41:13', '2021-09-06 05:41:13');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `cat_id`, `sub_cat_id`, `brand_id`, `title`, `details`, `price`, `qty`, `sku`, `image`, `location`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, NULL, 4, 4, 6, 'Sony Bravia KDL-32W600D 32 Smart HD LED TV', 'With a slim profile this TV blends seamlessly into your living space. It’s perfect for wall mounting while its discreet, narrow bezel puts your focus firmly on the picture, not the frame. Whether you want to rediscover a favourite movie, surf the web, or just check out a YouTube video, with a Sony TV the possibilities are endless. Photo Sharing Plus is the easy way for you and your friends to share photos and videos on the big screen. Grab your favourites off the TV as friends share special memories — using up to 10 devices. Screen mirroring lets you enjoy content and apps from your smartphone on your Sony TV. Supersize all your memories and enjoy them on the big screen with family and friends. Turn your TV into a digital video recorder. With USB HDD Record you can store favourite TV shows on an external USB drive to watch whenever you like.', 28000.00, 37, 'skdl-32', 'Sony-Bravia-KDL-32W600D-32-Smart-HD-LED-TV.jpg', 'Dhaka', 'sony-bravia-kdl-32w600d-32-smart-hd-led-tv', '2021-08-30 00:53:11', '2021-09-06 05:41:12', NULL),
(7, NULL, 4, 4, 6, 'Sony Bravia W660G 43 inch LED Smart TV', 'Sony Bravia W660G 43 inch LED Smart TV\r\nOur Sony Bravia W660G 43 inch LED Smart TV has High Dynamic Range (HDR), so detail lost in the darkest and brightest areas of a picture are preserved, giving a much more dynamic look.You will witness clips being ultra fast on this Sony LED TV with YouTube including a YouTube button on the remote control for easy browsing. This also keep cables neatly hidden in the stand and held in place with the supplied cable holder.', 600.00, 14, 's-w660g', 'Sony-Bravia-W660G-43-inch-LED-Smart-TV.jpg', 'Dhaka', 'sony-bravia-w660g-43-inch-led-smart-tv', '2021-08-30 02:54:36', '2021-09-06 05:41:13', NULL),
(8, NULL, 4, 5, 9, 'Walton WEA-B168M', '- Air flow rate 500 m3/h\r\n- Natural cooling for healthy life\r\n- Ecological honeycomb media reduce outlet temperature\r\n- Vortex type air duct\r\n- Portable by castors', 6000.00, 57, 'walwea', 'Walton-WEA-B168M.jpg', 'Dhaka', 'walton-wea-b168m', '2021-08-31 08:14:12', '2021-09-06 05:41:13', NULL),
(9, NULL, 5, 9, 10, 'Adelyn Rae Matte Sateen Faux Wrap Long Sleeve Minidress', 'Turn heads in this blushing sateen frock designed in a wrapped silhouette with puffed shoulders and a defining waist tie.\r\n\r\n35\" length\r\nSurplice V-neck\r\nLong sleeves\r\nRemovable tie belt\r\nLined\r\n100% cotton\r\nHand wash, dry flat\r\nImported\r\nWomen\'s Clothing\r\nItem #6237181', 10122.18, 10, 'ade-5895', 'Adelyn-Rae-Matte-Sateen-Faux-Wrap-Long-Sleeve-Minidress.jpg', 'Dhaka', 'adelyn-rae-matte-sateen-faux-wrap-long-sleeve-minidress', '2021-09-04 04:51:37', '2021-09-05 00:40:27', NULL),
(10, NULL, 5, 9, 10, 'Carleigh Floral Chiffon Long Sleeve Wrap Dress', 'A gracefully floaty dress radiates romance in floral chiffon, with a wrap silhouette and ruffles at the neckline and an asymmetrical hem. Subtle metallic threads add a hint of sparkle.\r\n\r\n49\" length\r\nTrue wrap style with side tie closure\r\nSurplice V-neck\r\nLong sleeves with elastic cuffs\r\nLined\r\n100% polyester\r\nHand wash, tumble dry\r\nImported\r\nWomen\'s Clothing\r\nItem #6133712', 10812.33, 49, 'ade-5894', 'Carleigh-Floral-Chiffon-Long-Sleeve-Wrap-Dress.jpg', 'Uttara 12', 'carleigh-floral-chiffon-long-sleeve-wrap-dress', '2021-09-04 04:55:41', '2021-09-05 00:37:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_name`, `attribute_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 6, 'Display Type', 'LED', '2021-08-30 00:55:07', NULL, NULL),
(7, 6, 'Screen Size', '32\", 80.0 cm', '2021-08-30 00:55:20', NULL, NULL),
(8, 6, 'Resolution', '1366x768', '2021-08-30 00:55:32', NULL, NULL),
(9, 6, 'Audio Output', '5W+5W', '2021-08-30 00:55:56', NULL, NULL),
(10, 6, 'Speaker System', 'Open Baffle Speaker', '2021-08-30 00:56:14', NULL, NULL),
(11, 6, 'Dimension (L x W x H)', '735x446x66 mm (L x W x H)', '2021-08-30 00:56:33', NULL, NULL),
(12, 6, 'HDMI', 'Yes', '2021-08-30 00:56:42', NULL, NULL),
(13, 6, 'Wi-Fi', 'Yes', '2021-08-30 00:56:49', NULL, NULL),
(14, 6, 'Warranty', 'No Parts Warranty', '2021-08-30 00:56:57', NULL, NULL),
(15, 6, 'Power Supply', '45W', '2021-08-30 00:57:10', NULL, NULL),
(16, 6, 'Remote Control', 'Yes', '2021-08-30 00:57:20', NULL, NULL),
(17, 7, 'Display Type', 'LED', '2021-08-30 02:56:03', NULL, NULL),
(18, 7, 'Screen Size', '43', '2021-08-30 02:56:13', NULL, NULL),
(19, 7, 'Resolution', '1920x1080', '2021-08-30 02:56:21', NULL, NULL),
(20, 7, 'Audio Output', '1 (Rear) 1 (Side / Hybrid with Headphone Out)', '2021-08-30 02:56:33', NULL, NULL),
(21, 7, 'Speaker System', 'Open Baffle Speaker. Speaker Configuration: Full Range x2', '2021-08-30 02:56:44', NULL, NULL),
(22, 7, 'Dimension (L x W x H)', 'With Stand(W X H X D) Approx. 974x628x268 mm Without Stand(W X H X D) Approx. 974x628x268 mm', '2021-08-30 02:56:57', NULL, NULL),
(23, 7, 'USB', '2 (Side/Stacking)', '2021-08-30 02:57:07', NULL, NULL),
(24, 7, 'HDMI', 'Yes', '2021-08-30 02:57:15', NULL, NULL),
(25, 7, 'Bluetooth', 'No', '2021-08-30 02:57:24', NULL, NULL),
(26, 7, 'Wi-Fi', '802.11b/g/n', '2021-08-30 02:57:33', NULL, NULL),
(27, 7, 'Warranty', '5 years', '2021-08-30 02:57:45', NULL, NULL),
(28, 7, 'Power Supply', 'AC 100-240V, 50/60Hz, DC 19.5V', '2021-08-30 02:57:55', NULL, NULL),
(29, 7, 'Remote Control', 'Yes', '2021-08-30 02:58:03', NULL, NULL),
(30, 7, 'Standby Power Consumption', '0.5W', '2021-08-30 02:58:11', NULL, NULL),
(31, 8, 'Covered Area', '120-160 SFT', '2021-08-31 08:15:31', NULL, NULL),
(32, 8, 'Air Flow', '500 m3/h', '2021-08-31 08:15:57', NULL, NULL),
(33, 8, 'Air speed', '7 m/s', '2021-08-31 08:16:04', NULL, NULL),
(34, 8, 'Noise', '<60dB', '2021-08-31 08:16:14', NULL, NULL),
(35, 8, 'Voltage/Frequency', '220V~/50Hz', '2021-08-31 08:16:25', NULL, NULL),
(36, 8, 'Length', '300 mm', '2021-08-31 08:16:38', NULL, NULL),
(37, 8, 'Gross Weight', '5.3 kg', '2021-08-31 08:16:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 4, 'TV Televisions', 'tv-televisions', '2021-08-26 12:21:30', '2021-08-26 12:21:30', NULL),
(5, 4, 'Air Conditioners', 'air-conditioners', '2021-08-26 12:21:38', '2021-08-26 12:21:38', NULL),
(6, 4, 'Washing Machines', 'washing-machines', '2021-08-26 12:21:54', '2021-08-26 12:21:54', NULL),
(7, 4, 'Audio & Theaters', 'audio-theaters', '2021-08-26 12:22:07', '2021-08-26 12:22:07', NULL),
(8, 4, 'Office Electronics', 'office-electronics', '2021-08-26 12:22:19', '2021-08-26 12:22:19', NULL),
(9, 5, 'Womens', 'womens', '2021-08-26 12:22:49', '2021-08-26 12:22:49', NULL),
(10, 5, 'Mens', 'mens', '2021-08-26 12:22:56', '2021-08-26 12:22:56', NULL),
(11, 5, 'Bags & Backpacks', 'bags-backpacks', '2021-08-26 12:23:04', '2021-08-26 12:23:04', NULL),
(12, 5, 'Accessories', 'accessories', '2021-08-26 12:23:13', '2021-08-26 12:23:13', NULL),
(13, 6, 'Desktop PC', 'desktop-pc', '2021-08-26 12:24:17', '2021-08-26 12:24:17', NULL),
(14, 6, 'Laptop', 'laptop', '2021-08-26 12:24:25', '2021-08-26 12:24:25', NULL),
(15, 6, 'PC Gaming', 'pc-gaming', '2021-08-26 12:24:33', '2021-08-26 12:24:33', NULL),
(16, 6, 'Storage & Memory', 'storage-memory', '2021-08-26 12:24:47', '2021-08-26 12:24:47', NULL),
(17, 6, 'PC Components', 'pc-components', '2021-08-26 12:24:57', '2021-08-26 12:24:58', NULL),
(18, 7, 'Funitures', 'funitures', '2021-08-26 12:25:25', '2021-08-26 12:25:25', NULL),
(19, 7, 'Decor', 'decor', '2021-08-26 12:25:34', '2021-08-26 12:25:34', NULL),
(20, 7, 'Cookwares', 'cookwares', '2021-08-26 12:25:44', '2021-08-26 12:25:44', NULL),
(21, 7, 'Utensil & Gadgets', 'utensil-gadgets', '2021-08-26 12:25:53', '2021-08-26 12:25:53', NULL),
(22, 7, 'Garden Tools', 'garden-tools', '2021-08-26 12:26:02', '2021-08-26 12:26:02', NULL),
(23, 8, 'Makeup', 'makeup', '2021-08-26 12:26:38', '2021-08-26 12:26:38', NULL),
(24, 8, 'Skin Care', 'skin-care', '2021-08-26 12:26:47', '2021-08-26 12:26:47', NULL),
(25, 8, 'Skin Care', 'skin-care-2', '2021-08-26 12:28:49', '2021-08-26 12:28:49', NULL),
(26, 8, 'Hair Care', 'hair-care', '2021-08-26 12:29:36', '2021-08-26 12:29:36', NULL),
(27, 8, 'Tools & Equipments', 'tools-equipments', '2021-08-26 12:30:33', '2021-08-26 12:30:33', NULL),
(28, 8, 'Perfurmes', 'perfurmes', '2021-08-26 12:30:43', '2021-08-26 12:30:43', NULL),
(29, 9, 'Pendant', 'pendant', '2021-08-26 12:36:59', '2021-08-26 12:36:59', NULL),
(30, 9, 'Necklace', 'necklace', '2021-08-26 12:37:07', '2021-08-26 12:37:07', NULL),
(31, 9, 'Watch', 'watch', '2021-08-26 12:37:15', '2021-08-26 12:37:15', NULL),
(32, 9, 'Bracelets', 'bracelets', '2021-08-26 12:37:23', '2021-08-26 12:37:23', NULL),
(33, 9, 'Accessories', 'accessories-2', '2021-08-26 12:37:32', '2021-08-26 12:37:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 6, 'Sony-Bravia-KDL-32W600D-32-Smart-HD-LED-fTNrW.jpg', '2021-08-30 00:54:37', '2021-08-30 00:54:37', NULL),
(11, 6, 'Sony-Bravia-KDL-32W600D-32-Smart-HD-LED-wqtd8.jpg', '2021-08-30 00:54:37', '2021-08-30 00:54:37', NULL),
(12, 6, 'Sony-Bravia-KDL-32W600D-32-Smart-HD-LED-y548K.jpg', '2021-08-30 00:54:37', '2021-08-30 00:54:37', NULL),
(13, 6, 'Sony-Bravia-KDL-32W600D-32-Smart-HD-LED-6P6BN.jpg', '2021-08-30 00:54:37', '2021-08-30 00:54:37', NULL),
(14, 7, 'Sony-Bravia-W660G-43-inch-LED-Smart-TV9KSnX.jpg', '2021-08-30 02:55:41', '2021-08-30 02:55:41', NULL),
(15, 7, 'Sony-Bravia-W660G-43-inch-LED-Smart-TV4zyhG.jpg', '2021-08-30 02:55:41', '2021-08-30 02:55:41', NULL),
(16, 7, 'Sony-Bravia-W660G-43-inch-LED-Smart-TVJ1was.jpg', '2021-08-30 02:55:41', '2021-08-30 02:55:41', NULL),
(21, 8, 'Walton-WEA-B168MaIot8.jpg', '2021-08-31 08:15:02', '2021-08-31 08:15:02', NULL),
(22, 8, 'Walton-WEA-B168MDTrPi.png', '2021-08-31 08:15:02', '2021-08-31 08:15:02', NULL),
(23, 8, 'Walton-WEA-B168MJxTjE.png', '2021-08-31 08:15:02', '2021-08-31 08:15:02', NULL),
(24, 8, 'Walton-WEA-B168MWDLgw.png', '2021-08-31 08:15:02', '2021-08-31 08:15:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `used_coupons`
--

CREATE TABLE `used_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `used_coupons`
--

INSERT INTO `used_coupons` (`id`, `user_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` set('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', '2', NULL, '$2y$10$AOxA1F5ktVp25Q3saIXAiencdyC9usBrVceCP9Txt6SAu4hCOGqXK', NULL, '2021-08-24 09:06:43', '2021-08-24 09:06:43'),
(3, 'Devid', 'devid@gmail.com', '0', NULL, '$2y$10$luJgxCCjQ0Y/6jeYlBG.ne3LqeEj3JKLei/B2t3PkqYjZ7QsV2pnO', NULL, '2021-09-05 03:40:52', '2021-09-05 03:40:52'),
(4, 'Galib', 'galib@gmail.com', '0', NULL, '$2y$10$a0snyQwO1CjXhqwv2JcrQuM/4FyB4kyx0fbnYqtWAjqxxn573MFZG', NULL, '2021-09-05 03:45:34', '2021-09-05 03:45:34'),
(5, 'Galib', 'galib22@gmail.com', '0', NULL, '$2y$10$wPHJ6sBbY.1ndJtyj1ODJuBmpjM/7Kir2ML/YsXoah1BegZNEC3km', NULL, NULL, NULL),
(6, 'Root', 'root122@gmail.com', '0', NULL, '$2y$10$Ugcsu7bUi48rDa8ElJWeyOdQFupx8W7jww0rfgEhexyt.O7cO6L6u', NULL, NULL, NULL),
(7, 'Mannfa', 'mannaf4444@gmail.com', '0', NULL, '$2y$10$6eM9AljhTO0Q2Gdqdg.e0.4DRN9juA7a2jft7xMx0M0wGrzBRU5/C', NULL, '2021-09-05 03:51:37', '2021-09-05 03:51:37'),
(9, 'Mannfa', 'mannaf44344@gmail.com', '0', NULL, '$2y$10$WYlkK.puPNVUGmE7d1JCKu3YJlzk7YtlIUJfEs4jh34cBctVe2PcS', NULL, '2021-09-05 03:52:47', '2021-09-05 03:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` set('m','f','o') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'm:Male, f:Female, o:Other',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `full_name`, `phone`, `dob`, `gender`, `image`, `country`, `city`, `post`, `address`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 6, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 9, 'Galib', '0174458796', '2021-09-29', 'm', 'Mannfa.jpg', 'Bangladesh', 'Dhaka', '250', 'Madaripur', '2021-09-05 04:25:54', '2021-09-05 04:42:03'),
(6, 2, 'Administator', '01755874978', '2021-10-04', 'm', 'admin.jpg', 'Bangladesh', 'Dhaka', '1216', '488/1 West Shawrapara', NULL, '2021-09-05 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 9, 9, '2021-09-05 04:52:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_details_order_id_foreign` (`order_id`),
  ADD KEY `billing_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundle_lists`
--
ALTER TABLE `bundle_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bundle_lists_bundle_id_foreign` (`bundle_id`),
  ADD KEY `bundle_lists_product_id_foreign` (`product_id`);

--
-- Indexes for table `bundle_products`
--
ALTER TABLE `bundle_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thumbnails_product_id_foreign` (`product_id`);

--
-- Indexes for table `used_coupons`
--
ALTER TABLE `used_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `used_coupons_user_id_foreign` (`user_id`),
  ADD KEY `used_coupons_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bundle_lists`
--
ALTER TABLE `bundle_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bundle_products`
--
ALTER TABLE `bundle_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `used_coupons`
--
ALTER TABLE `used_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `billing_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bundle_lists`
--
ALTER TABLE `bundle_lists`
  ADD CONSTRAINT `bundle_lists_bundle_id_foreign` FOREIGN KEY (`bundle_id`) REFERENCES `bundle_products` (`id`),
  ADD CONSTRAINT `bundle_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD CONSTRAINT `thumbnails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `used_coupons`
--
ALTER TABLE `used_coupons`
  ADD CONSTRAINT `used_coupons_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `used_coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
