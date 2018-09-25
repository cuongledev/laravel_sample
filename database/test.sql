-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 25, 2018 lúc 01:25 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `order`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Uncategory', 'uncategory', 0, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(2, 'Camren Lockman', 'camren-lockman', -18, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(3, 'Prof. Micah Hauck', 'prof-micah-hauck', 44, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(4, 'Don Hill', 'don-hill', 12, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(5, 'Dr. Sarina Wyman', 'dr-sarina-wyman', -48, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(6, 'Tristin Nader I', 'tristin-nader-i', 66, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(7, 'Lilian Thiel', 'lilian-thiel', -17, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(8, 'Mrs. Reina Schulist IV', 'mrs-reina-schulist-iv', 43, 0, '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(9, 'Bernadette Russel', 'bernadette-russel', -50, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(10, 'Marcellus Cummerata', 'marcellus-cummerata', -38, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(11, 'Nathanial Runolfsson', 'nathanial-runolfsson', 13, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(12, 'Kenny Krajcik', 'kenny-krajcik', -90, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(13, 'Cody Lueilwitz', 'cody-lueilwitz', 23, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(14, 'Jovan Macejkovic V', 'jovan-macejkovic-v', -8, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(15, 'Mrs. Magnolia Cummings Sr.', 'mrs-magnolia-cummings-sr', 77, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(16, 'Selina Beier', 'selina-beier', 82, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(17, 'Felicity Jacobi', 'felicity-jacobi', 65, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(18, 'Johnnie Gislason Sr.', 'johnnie-gislason-sr', -28, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(19, 'Brady Considine', 'brady-considine', 19, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(20, 'Mrs. Nicole Stokes', 'mrs-nicole-stokes', -74, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(21, 'Estrella Cassin', 'estrella-cassin', 68, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(22, 'Ian Douglas Jr.', 'ian-douglas-jr', 23, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(23, 'Ms. Ofelia Zboncak I', 'ms-ofelia-zboncak-i', -18, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(24, 'Amalia Leuschke', 'amalia-leuschke', -88, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(25, 'Jazmyne Schultz', 'jazmyne-schultz', -74, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(26, 'Paige Collier', 'paige-collier', -38, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(27, 'Mr. Jevon Herman', 'mr-jevon-herman', 10, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(28, 'Lucy Boehm III', 'lucy-boehm-iii', 9, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(29, 'Dawn Macejkovic', 'dawn-macejkovic', 35, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(30, 'Rigoberto Bogisich', 'rigoberto-bogisich', -92, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(31, 'Woodrow Runolfsdottir DVM', 'woodrow-runolfsdottir-dvm', 48, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(32, 'Thalia Jast', 'thalia-jast', 86, 0, '2018-09-24 09:20:09', '2018-09-24 09:20:09'),
(33, 'Torrey Schmidt', 'torrey-schmidt', 87, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(34, 'Elliott Jones', 'elliott-jones', 82, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(35, 'Wilfred Kris', 'wilfred-kris', -63, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(36, 'Elaina Swaniawski', 'elaina-swaniawski', -91, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(37, 'Prof. Derrick Halvorson I', 'prof-derrick-halvorson-i', 76, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(38, 'Christ Kassulke', 'christ-kassulke', -1, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(39, 'Lenny Shields', 'lenny-shields', 24, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(40, 'Nelda Prosacco', 'nelda-prosacco', -50, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(41, 'Dr. Beryl Willms', 'dr-beryl-willms', 96, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(42, 'Prof. Terrence Zieme Jr.', 'prof-terrence-zieme-jr', 81, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(43, 'Brenden Krajcik', 'brenden-krajcik', -50, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(44, 'Stella Douglas', 'stella-douglas', -24, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(45, 'Stuart Zboncak', 'stuart-zboncak', -60, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(46, 'Friedrich Gutmann', 'friedrich-gutmann', 44, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(47, 'Coleman Larkin', 'coleman-larkin', 62, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(48, 'Miss Marielle Mosciski', 'miss-marielle-mosciski', 58, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(49, 'Lavon Satterfield', 'lavon-satterfield', -97, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(50, 'Miss Corrine Lesch', 'miss-corrine-lesch', -91, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10'),
(51, 'Odell Lindgren', 'odell-lindgren', 0, 0, '2018-09-24 09:20:10', '2018-09-24 09:20:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2018_09_18_163852_create_products_table', 2),
(104, '2018_09_20_163511_table_category_product_tag_relation', 3),
(105, '2018_09_20_163641_table_category_product_order_relation', 3),
(117, '2014_10_12_000000_create_users_table', 4),
(118, '2014_10_12_100000_create_password_resets_table', 4),
(119, '2018_09_18_160932_create_categories_table', 4),
(120, '2018_09_18_160932_create_products_table', 4),
(121, '2018_09_20_152628_create_tags_table', 4),
(122, '2018_09_20_152857_create_product_tags_table', 4),
(123, '2018_09_20_155137_create_orders_table', 4),
(124, '2018_09_20_155323_create_product_order_table', 4),
(125, '2018_09_20_162144_table_category_products_relation', 4),
(126, '2018_09_20_163511_table_product_tag_relation', 4),
(127, '2018_09_20_163641_table_product_order_relation', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sale_price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `original_price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `attributes` longtext COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cuongle', 'cuongle.dev@gmail.com', '$2y$10$KicsBO4dlnl4LBboTBRHdO1Lb7Oujdle3sAMLZ..SEvXvL7UzbO/G', 'D1GaZWkURT', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(2, 'Leslie Marquardt PhD', 'zkovacek@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'XkeliH7K60', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(3, 'Berneice Kulas', 'collin.nicolas@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'Rlq2iLx4Wi', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(4, 'Reagan Hamill', 'ona43@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'sA1PzFUO6n', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(5, 'Gwendolyn Ferry DDS', 'andreane.funk@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'zQBQekWDRM', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(6, 'Talon Hagenes', 'yraynor@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'WdozC7gqPM', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(7, 'Annabell Weimann', 'ijerde@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'slQU4KpdNw', '2018-09-24 09:20:05', '2018-09-24 09:20:05'),
(8, 'Shanie Graham', 'chloe.conroy@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'v3yRJGc8Vy', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(9, 'Keven Wunsch', 'mmarquardt@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'KVL9VnNYhe', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(10, 'Mr. Rollin Gulgowski', 'dveum@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'EgpDn1qwf6', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(11, 'Prof. Walter Jenkins', 'dcremin@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'p317f7PsFP', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(12, 'Desiree Leuschke', 'collier.mylene@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '9CjFTdgL5u', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(13, 'Esta Romaguera', 'jamel98@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'vxi0zVyOJI', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(14, 'Hilario Skiles DDS', 'rodriguez.elyssa@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '8LgIe6QLXn', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(15, 'Prof. Dorothea Miller', 'tiffany.moore@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'WKH0oQU45Q', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(16, 'Misty Collier', 'effertz.gavin@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '2xMBYWjwow', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(17, 'Nicklaus Schinner', 'stark.wilford@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'HHghda5796', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(18, 'Brett Conroy', 'kim09@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'Wo5wm7VTJQ', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(19, 'Kathryne Lueilwitz', 'reichel.georgiana@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'USfPI6q84w', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(20, 'Prof. Camron Cassin I', 'berta26@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'iBg7EhJJRd', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(21, 'Dr. Lyla Swift MD', 'jadyn.durgan@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'yg98VNHILs', '2018-09-24 09:20:06', '2018-09-24 09:20:06'),
(22, 'Prof. Alejandrin Welch IV', 'uvandervort@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'gbqIyiboLh', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(23, 'Baby Klein Jr.', 'koch.vella@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'bXUFo9YUoq', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(24, 'Montana Wolf', 'annie08@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '5cj4NZNdMB', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(25, 'Magnolia Grady', 'bernier.darrell@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'V0OSy6GVlC', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(26, 'Julianne Lebsack', 'fbernier@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'VGRt01dfvu', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(27, 'Amanda Pollich', 'effertz.hosea@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'tovNcJEG3c', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(28, 'Dr. Miles Schneider IV', 'whitney54@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '2WZJQbNO2Y', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(29, 'Sabryna Padberg', 'danial67@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'dfYSqDskWV', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(30, 'Agustin D\'Amore', 'mikayla62@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'XvBgcYlolM', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(31, 'Willis Friesen', 'wellington82@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'hAhE4wiHgX', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(32, 'Dwight Ankunding', 'gunner87@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'KSSagTdURx', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(33, 'Greta Yost', 'herminio00@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'GGc4XjLqS5', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(34, 'Mrs. Mathilde Jerde', 'justyn68@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'yWmMSB6Arc', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(35, 'Ms. Jodie Greenfelder', 'rolfson.hassan@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'ZtQ4p87gW5', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(36, 'Winona Nader IV', 'rosenbaum.jermain@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'H6IQWYBbbu', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(37, 'Dr. Mark Wilderman IV', 'alfred32@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'HWQE5BSCsV', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(38, 'Retha Steuber', 'larissa05@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'NFp0vV0BdX', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(39, 'Miss Libbie Volkman', 'vernon.pacocha@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'rcOdskHoI4', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(40, 'Cynthia Dicki', 'qbotsford@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '2zJhYA5F5Y', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(41, 'Turner Cronin IV', 'astracke@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'VGGSYh7B6m', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(42, 'Scarlett Kemmer Sr.', 'xdamore@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'RzJgIkbTeX', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(43, 'Demetris Leannon', 'blanca.mohr@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '2liqO3P1l6', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(44, 'Prof. Skylar Schiller', 'shany19@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'FkjgDBNere', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(45, 'Electa Muller', 'river.shanahan@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'EjBw2BzV5Y', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(46, 'Brook Prohaska', 'abbott.norval@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '8QcrdA7b69', '2018-09-24 09:20:07', '2018-09-24 09:20:07'),
(47, 'Rudolph Wisozk', 'april.fadel@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', '750lkNtSTx', '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(48, 'Ebony Turcotte', 'monte69@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'UYMGbiA1vn', '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(49, 'Prof. Charles Reichert PhD', 'adrienne.champlin@example.org', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'du10H8YELa', '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(50, 'Clare Ondricka', 'kadin20@example.com', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'WRbxh23HrH', '2018-09-24 09:20:08', '2018-09-24 09:20:08'),
(51, 'Rickie Dickinson', 'bailey.clark@example.net', '$2y$10$GvBezwIT5CwBbhgsB9kMo.VH5XF9bXRAyApRzd6Bg9NolPLmEBDD2', 'KjPh6sZMDs', '2018-09-24 09:20:08', '2018-09-24 09:20:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `product_order_product_id_foreign` (`product_id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD KEY `product_tags_product_id_foreign` (`product_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
