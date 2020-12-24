-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2020 lúc 04:26 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhadat_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bán nhà', 'ban-nha', NULL, NULL),
(2, 'Bán căn hộ chung cư', 'ban-can-ho-chung-cu', NULL, NULL),
(3, 'Bán đất', 'ban-dat', NULL, NULL),
(4, 'Sang nhượng cửa hàng', 'sang-nhuong-cua-hang', NULL, '2020-12-21 19:43:19'),
(15, 'Cho thuê nhà đất', 'cho-thue-nha-dat', '2020-12-23 00:32:19', '2020-12-23 00:32:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locations`
--

INSERT INTO `locations` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'Hà nội', 'ha-noi', '2020-12-23 00:30:01', '2020-12-23 00:30:01'),
(6, 'Hải Phòng', 'hai-phong', '2020-12-23 00:30:07', '2020-12-23 00:30:07'),
(7, 'Đà nẵng', 'da-nang', '2020-12-23 00:30:12', '2020-12-23 00:30:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2020_12_22_021835_add_colume_name_table_categories', 2),
(6, '2014_10_12_000000_create_users_table', 3),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2019_08_19_000000_create_failed_jobs_table', 3),
(9, '2020_12_22_005228_create_table_category', 3),
(10, '2020_12_22_080408_create_location_table', 4),
(11, '2020_12_22_084927_create_products_table', 5),
(12, '2020_12_22_144507_add_colume_table_product', 6),
(13, '2020_12_22_174221_create_product_images', 7),
(14, '2020_12_23_043411_create_sliders_table', 8),
(15, '2020_12_23_081644_create_roles_table', 9),
(16, '2020_12_23_081837_create_role_users_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_area` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `slug`, `price`, `content`, `product_image`, `product_image_path`, `category_id`, `location_id`, `created_at`, `updated_at`, `floor_area`) VALUES
(5, 'iPhone 12 mini 64GBưe', 'Điện thoại iPhone 12 256GB', 'iphone-12-mini-64gbue', '424342', '<p>ưewewesdfdsfdsfdsf</p>', 'thumbnew_1608432869_nguoingoaiht1.jpg', '/upload/product/QwD6aq_thumbnew_1608432869_nguoingoaiht1.jpg', 3, 7, '2020-12-23 01:49:44', '2020-12-23 01:49:44', 132.00),
(6, 'dsfdsf', 'sdfdsf', 'dsfdsf', '3424324', '<p>ddddddddddđgggggggggggggg</p>', 'thumbnew_1607654830_nnht.jpg', '/upload/product/hmgYwf_thumbnew_1607654830_nnht.jpg', 2, 5, '2020-12-23 01:50:57', '2020-12-23 01:50:57', 343.00),
(8, 'iPhone 12 mini 64GBwe', 'Điện thoại iphone 11 đen nhám2', 'iphone-12-mini-64gbwe', '2323', '<p>232323</p>', 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/Y354BZ_thumbnew_1607654830_nnht - Copy.jpg', 1, 5, '2020-12-23 01:54:49', '2020-12-23 01:54:49', 323.00),
(9, 'iPhone 12 mini 64GB', 'ưewewe4324234324', 'iphone-12-mini-64gb', '23232323', '<p>23232</p>', 'thumbnew_1608432869_nguoingoaiht1.jpg', '/upload/product/OjWj1z_thumbnew_1608432869_nguoingoaiht1.jpg', 1, 5, '2020-12-23 01:55:48', '2020-12-23 01:55:48', 32.00),
(10, 'iPhone 12 mini 64GB232', 'sdfádfasdfdáf', 'iphone-12-mini-64gb232', '234324', '<p>2323</p>', 'thumbnew_1607654830_nnht.jpg', '/upload/product/Z3zkxn_thumbnew_1607654830_nnht.jpg', 2, 5, '2020-12-23 01:57:11', '2020-12-23 01:57:11', 323.00),
(11, 'iPhone 12 mini 64GB23223', 'sdfádfasdfdáf', 'iphone-12-mini-64gb23223', '234324', '<p>2323</p>', 'thumbnew_1607654830_nnht.jpg', '/upload/product/4B1bRX_thumbnew_1607654830_nnht.jpg', 2, 5, '2020-12-23 01:58:15', '2020-12-23 01:58:15', 323.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_name`, `image_path`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/Do1U54_thumbnew_1607654830_nnht - Copy.jpg', 5, '2020-12-23 01:49:44', '2020-12-23 01:49:44'),
(22, 'thumbnew_1607654830_nnht.jpg', '/upload/product/jF38wC_thumbnew_1607654830_nnht.jpg', 5, '2020-12-23 01:49:44', '2020-12-23 01:49:44'),
(24, 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/jDAvnH_thumbnew_1607654830_nnht - Copy.jpg', 6, '2020-12-23 01:50:57', '2020-12-23 01:50:57'),
(25, 'thumbnew_1607654830_nnht.jpg', '/upload/product/taTfpm_thumbnew_1607654830_nnht.jpg', 6, '2020-12-23 01:50:57', '2020-12-23 01:50:57'),
(26, 'thumbnew_1607910986_ufo111.jfif', '/upload/product/DbgxA3_thumbnew_1607910986_ufo111.jfif', 6, '2020-12-23 01:50:57', '2020-12-23 01:50:57'),
(30, 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/wygoJh_thumbnew_1607654830_nnht - Copy.jpg', 8, '2020-12-23 01:54:50', '2020-12-23 01:54:50'),
(31, 'thumbnew_1607654830_nnht.jpg', '/upload/product/e7iaII_thumbnew_1607654830_nnht.jpg', 8, '2020-12-23 01:54:50', '2020-12-23 01:54:50'),
(32, 'thumbnew_1608432869_nguoingoaiht1.jpg', '/upload/product/U0pYys_thumbnew_1608432869_nguoingoaiht1.jpg', 8, '2020-12-23 01:54:50', '2020-12-23 01:54:50'),
(33, 'thumbnew_1607654830_nnht.jpg', '/upload/product/9Ycxt2_thumbnew_1607654830_nnht.jpg', 9, '2020-12-23 01:55:48', '2020-12-23 01:55:48'),
(34, 'thumbnew_1607910986_ufo111.jfif', '/upload/product/GaiyI5_thumbnew_1607910986_ufo111.jfif', 9, '2020-12-23 01:55:48', '2020-12-23 01:55:48'),
(35, 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/ojCSan_thumbnew_1607654830_nnht - Copy.jpg', 10, '2020-12-23 01:57:11', '2020-12-23 01:57:11'),
(37, 'thumbnew_1607654830_nnht - Copy.jpg', '/upload/product/y9iP3q_thumbnew_1607654830_nnht - Copy.jpg', 11, '2020-12-23 01:58:16', '2020-12-23 01:58:16'),
(38, 'thumbnew_1607654830_nnht.jpg', '/upload/product/6Ggk9R_thumbnew_1607654830_nnht.jpg', 11, '2020-12-23 01:58:16', '2020-12-23 01:58:16'),
(39, 'thumbnew_1607654830_nnht.jpg', '/upload/product/Ih5VLs_thumbnew_1607654830_nnht.jpg', 10, '2020-12-23 04:20:03', '2020-12-23 04:20:03'),
(40, 'v8D4s5_thumbnew_1607654830_nnht1.jpg', '/upload/product/6p6TVF_v8D4s5_thumbnew_1607654830_nnht1.jpg', 11, '2020-12-23 18:51:30', '2020-12-23 18:51:30'),
(41, 'UsVmaM_thumbnew_1607654830_nnht1.jpg', '/upload/product/VIQmOw_UsVmaM_thumbnew_1607654830_nnht1.jpg', 11, '2020-12-23 19:12:21', '2020-12-23 19:12:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'Quản trị viên', '2020-12-23 02:02:44', '2020-12-23 02:02:44'),
(4, 'editor', 'Người soạn thảo nội dung', '2020-12-23 02:03:23', '2020-12-23 02:03:23'),
(5, 'developer', 'Người phát triển hệ thống', '2020-12-23 02:03:39', '2020-12-23 02:03:39'),
(6, 'guest', 'Khách', '2020-12-23 02:03:52', '2020-12-23 02:03:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 6, NULL, NULL),
(8, 5, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `desc`, `slider_image`, `created_at`, `updated_at`) VALUES
(8, 'banner 1', 'ban1', '/upload/slider/9kYOC6_UsVmaM_thumbnew_1607654830_nnht.jpg', '2020-12-23 18:10:38', '2020-12-23 18:10:38'),
(9, 'banner', 'bann1', '/upload/slider/7Z84V3_v8D4s5_thumbnew_1607654830_nnht.jpg', '2020-12-23 18:10:54', '2020-12-23 18:10:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Phạm Thanh Nhàn', 'thanhnhan21@gmail.com', NULL, '$2y$10$pbo2VW1XUyFLL97nAW1vtO7jLmN28fhQzrqIh.Hj7QIY2PgInaOG2', NULL, '2020-12-23 02:31:22', '2020-12-23 02:31:22'),
(5, 'Quang Linh', 'quanglinhit19@gmail.com', NULL, '$2y$10$DXPY9rbESqsukLjY73GY8e.UOkmCZbiQC.auzuvIrjlmHuXINELeK', NULL, '2020-12-23 02:58:01', '2020-12-23 02:58:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
