-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2022 at 01:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` bigint UNSIGNED DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', 'active', '2022-12-24 23:59:51', '2022-12-24 23:59:51'),
(2, 'T-shirt', 'active', '2022-12-24 23:59:53', '2022-12-24 23:59:53'),
(3, 'man', 'active', '2022-12-24 23:59:58', '2022-12-24 23:59:58'),
(4, 'woman', 'active', '2022-12-25 00:00:01', '2022-12-25 00:00:01'),
(5, 'toy', 'active', '2022-12-25 00:00:07', '2022-12-25 00:00:07'),
(6, 'jins', 'active', '2022-12-25 00:43:06', '2022-12-25 00:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_22_122831_create_sessions_table', 1),
(7, '2022_12_25_040432_create_categories_table', 1),
(8, '2022_12_25_052637_create_products_table', 1),
(9, '2022_12_25_091629_create_carts_table', 2),
(10, '2022_12_25_121130_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `product_id`, `product_name`, `product_quantity`, `product_price`, `photo`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(2, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 5, 'denims', '4', '1200', '63a7f11ae225d251222064338.png', 'Paid', 'Delivered', '2022-12-25 06:32:58', '2022-12-25 22:24:37'),
(4, 2, 'user', 'user@gmail.com', '01711411064', 'pabna sader', 7, 'frong', '3', '1800', '63a7f1590ee76251222064441.png', 'Cash On Delivery', 'Processing', '2022-12-25 06:37:09', '2022-12-25 06:37:09'),
(7, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 6, 'shirt', '1', '600', '63a7f135eb859251222064405.png', 'Paid', 'Delivered', '2022-12-25 07:28:23', '2022-12-26 03:33:56'),
(11, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 4, 'Gray Casual T-Shirt', '2', '2400', '63a7f16ddac61251222064501.png', 'Paid', 'Delivered', '2022-12-25 07:42:44', '2022-12-25 22:24:30'),
(13, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 4, 'Gray Casual T-Shirt', '10', '3600', '63a7f16ddac61251222064501.png', 'Paid', 'Processing', '2022-12-26 05:09:00', '2022-12-26 05:09:00'),
(14, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 5, 'denims', '2', '600', '63a7f11ae225d251222064338.png', 'Paid', 'Processing', '2022-12-26 05:09:00', '2022-12-26 05:09:00'),
(15, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 7, 'frong', '2', '1200', '63a7f1590ee76251222064441.png', 'Paid', 'Processing', '2022-12-26 05:09:00', '2022-12-26 05:09:00'),
(16, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 8, 'denims', '6', '360', '63a7f19343ff1251222064539.png', 'Paid', 'Delivered', '2022-12-26 05:09:00', '2022-12-26 05:29:10'),
(17, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 8, 'denims', '3', '360', '63a7f19343ff1251222064539.png', 'Paid', 'Delivered', '2022-12-26 05:42:03', '2022-12-26 05:42:42'),
(18, 3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', '01746755225', 'pabna sader', 5, 'denims', '1', '300', '63a7f11ae225d251222064338.png', 'Paid', 'Delivered', '2022-12-26 05:42:03', '2022-12-26 05:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kawsarahmed1512@gmail.com', '$2y$10$kNSM2.UAvrYO4Qt9ayLR5.ToqwikxW62IDs2mQks371QYdbQK6.X.', '2022-12-25 23:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `product_price`, `discount_price`, `product_quantity`, `product_description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(3, 'T-shirt', '1', '120', '10', '50', 'product descripton', '63a7eaad2ff8f251222061613.png', 'active', '2022-12-25 00:16:13', '2022-12-26 04:06:07'),
(4, 'Gray Casual T-Shirt', '3', '1200', NULL, '45', 'this is product description', '63a7f16ddac61251222064501.png', 'active', '2022-12-25 00:16:28', '2022-12-26 04:09:05'),
(5, 'denims', '3', '500', '300', '43', 'this is product description', '63a7f11ae225d251222064338.png', 'active', '2022-12-25 00:43:38', '2022-12-26 05:41:59'),
(6, 'shirt', '1', '600', NULL, '45', 'this is description', '63a7f135eb859251222064405.png', 'active', '2022-12-25 00:44:05', '2022-12-26 04:04:42'),
(7, 'frong', '4', '1500', '600', '45', 'this is woman cloth', '63a7f1590ee76251222064441.png', 'active', '2022-12-25 00:44:41', '2022-12-26 04:36:36'),
(8, 'denims', '5', '250', '120', '44', 'this is description', '63a7f19343ff1251222064539.png', 'active', '2022-12-25 00:45:39', '2022-12-26 05:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('h3VJBSB7TChnKbfHmgEdJYtWKt12Bt5gKhkH7Tfv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMnRKbVFTTTd3OU90NFpjVDhvY210OUUzaFUwTjB1WDJaR1B4OTJGUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlci9wZGYvMTgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEtMT3hVeldJQ3B1RGQ4c3ZVQy8zei5zMzlxbFRVNUdNOEVtVXpYSkQ2LkI3YjRNak5SeXdPIjt9', 1672054967),
('ss6gyf5HxWsk8d9DJbbAF2u5S4dE8llLROfIJaKo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0hpdkZtNklER09YZVFPWUxSRWxhdG9YMXdZNEhQSHlid1F1eEgyRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1672053727);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` bigint UNSIGNED NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'pabna sader', '01746755225', 1, '2022-12-26 05:15:21', '$2y$10$KLOxUzWICpuDd8svUC/3z.s39qlTU5GM8EmUzXJD6.B7b4MjNRywO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 23:57:18', '2022-12-24 23:57:18'),
(2, 'user', 'user@gmail.com', 'pabna sader', '01711411064', 0, '2022-12-26 05:15:08', '$2y$10$RLKhlzdftdrNOsIg2VCdz.IBdY9b5EectQgThPBlQJTtt7m/2vnkC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 23:58:03', '2022-12-24 23:58:03'),
(3, 'kawsar ahmed', 'kawsarahmed1512@gmail.com', 'pabna sader', '01746755225', 0, '2022-12-26 05:14:53', '$2y$10$Jk4C9nT4aZ6NqDuxl3E1/uPDAfWkhXqXb6MvzkzHxYOf4DBzFn6oy', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 03:15:09', '2022-12-25 03:15:09'),
(4, 'kawsar faz', 'kawsarfaz100@gmail.com', 'pabna sader', '01746755225', 0, '2022-12-25 23:07:53', '$2y$10$dwPhJZuzHoJPs1dBxNyLUO0ttzxauFISaY2.3TgkJDf5.YnIGqTdC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 23:07:27', '2022-12-25 23:07:53'),
(5, 'Tofeal', 'tofealahmed453@gmail.com', 'Nazirpur Gangpara', '01711411064', 0, NULL, '$2y$10$B4scFWMi8QC38/jLjkrYCeP3Piba1IU25ToJJI.vWtRbRpNIwORU.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 23:11:25', '2022-12-25 23:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
