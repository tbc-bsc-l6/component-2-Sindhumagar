-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 17, 2025 at 11:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inActive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Adidas', 'Designs, manufactures, and markets athletic and sports lifestyle products.', 'active', '2025-01-17 03:37:59', '2025-01-17 03:37:59'),
(4, 'Nike Shoes', 'Focus on comfort and quality.', 'active', '2025-01-17 03:38:56', '2025-01-17 03:38:56'),
(5, 'Dr. Martin', 'Air-cushioned sole, upper shape, welted construction, and yellow stitching.', 'active', '2025-01-17 03:39:48', '2025-01-17 03:39:48'),
(6, 'Puma Shoes', 'made from a variety of materials, including leather, mesh, rubber, and synthetic materials.', 'active', '2025-01-17 04:14:48', '2025-01-17 04:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inActive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Sports', 'Designed for physical activity and are made with flexible soles and cushioned insoles to protect your feet.', 'active', '2025-01-17 03:35:15', '2025-01-17 03:35:15'),
(6, 'Sneakers', 'Shoes primarily designed for sports or other forms of physical exercise but which are also widely used for everyday casual wear.', 'active', '2025-01-17 03:36:02', '2025-01-17 03:36:02'),
(7, 'Formal', 'Elegant shoes with simple designs and sleek lines', 'active', '2025-01-17 03:36:42', '2025-01-17 03:36:42');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_06_085211_create_categories_table', 2),
(6, '2025_01_06_091528_create_brands_table', 3),
(7, '2025_01_06_094428_create_products_table', 4),
(8, '2025_01_10_111152_create_carts_table', 5),
(9, '2025_01_12_153516_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand_id`, `category_id`, `description`, `img`, `price`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Air Jordan 1 Low', 4, 6, 'Always in, always fresh. The Air Jordan 1 Low sets you up with a piece of Jordan history and heritage that\'s comfortable all day. Choose your colours, then step out in the iconic profile that\'s built with a high-end mix of materials and encapsulated Air in the heel.', '1737106245.png', 200.00, 1, 'active', '2025-01-17 03:45:45', '2025-01-17 03:45:45'),
(11, 'Smooth Leather Lace Up Boots', 5, 7, 'The 1460 boot. The Original. Born 1st April 1960, and named after the date. Our unmistakable 8-eye boot started out life at the feet of workers', '1737107014.png', 250.00, 1, 'active', '2025-01-17 03:58:34', '2025-01-17 03:58:34'),
(12, 'Tatum 3 \'Welcome to the Garden\'', 4, 5, 'Growing anything takes serious work—work that builds expectations. And there\'s no greater pressure than your own expectations. But if you\'re anything like Jayson, it\'s always worth tending to the things you love: your family, your game, your legacy. Lace up and see what Jayson\'s growing in the Tatum 3. It features court-ready tech and a contouring fit designed for today\'s modern game.', '1737107153.png', 200.00, 0, 'active', '2025-01-17 04:00:53', '2025-01-17 04:00:53'),
(13, 'ULTRABOOST 5 GTX', 3, 5, 'Light, responsive running shoes with a breathable, waterproof membrane.', '1737107351.png', 300.00, 0, 'active', '2025-01-17 04:04:11', '2025-01-17 04:04:11'),
(14, 'Samba OG Shoes', 3, 6, 'The classic look and feel of the authentic Samba.', '1737107485.png', 199.00, 1, 'active', '2025-01-17 04:06:25', '2025-01-17 04:06:25'),
(15, 'Caitie leather buckle platform boots', 5, 6, 'A customisation mashup. The new Caitie boot is covered heel to toe with playful details and bursts of colour. A shiny silver buckle, DM’s branded charm, velvet ribbons, embroidery, and diamante detailing. With padding around the ankle and a statement pink tongue. The platform Quad sole is infused with glitter, secured with powder pink welt stitching, and detailed with a powder pink scalloped rand. The heel loop is also signed in powder pink script.', '1737107662.png', 500.00, 0, 'active', '2025-01-17 04:09:22', '2025-01-17 04:09:22'),
(16, 'Nike Air Max Alpha Trainer 6', 4, 5, 'The Air Max Alpha Trainer 6 brings sturdiness and comfort, the best of both worlds, to your toughest workouts. A flat, wide base helps keep you from sinking, so you can set and hit your goals. The robust heel, boosted by visible \"performance Air\" cushioning, offers dependable stability when digging deep for one more rep.', '1737107856.png', 399.00, 1, 'active', '2025-01-17 04:12:36', '2025-01-17 04:12:36'),
(17, 'Speedcat OG Sneakers Unisex', 6, 5, 'A PUMA classic inspired by the speed of the racetrack: the Speedcat OG. It stands out from the crowd with its race-shoe inspired shape and sleek lines that look fast and bold. Bring motorsport to the street', '1737108124.png', 300.00, 0, 'active', '2025-01-17 04:17:04', '2025-01-17 04:17:04'),
(18, 'Suede XL Sneakers Unisex', 6, 6, 'This fresh take on the classic Suede draws inspiration from PUMA’s heritage within breakdancing and its influence on modern streetwear.', '1737108273.png', 299.00, 0, 'active', '2025-01-17 04:19:33', '2025-01-17 04:19:33'),
(19, 'zebzag mule sandals in tan', 5, 6, 'The perfect blend of a sandal and shoe - Dr. Martens bring us their Zebzag Mule sandal, arriving dressed in a suede material this slip on is perfect for everyday wear. Complete with traditional DM yellow stitching and a jagged rubber outsole.', '1737108428.png', 499.00, 0, 'active', '2025-01-17 04:22:08', '2025-01-17 04:22:08'),
(20, 'Nike Phantom Luna 2 Elite', 4, 5, 'Obsessed with perfecting your craft? We made this for you. In the middle of the storm, with chaos swirling all around you, you\'ve calmly found the final third of the pitch, thanks to your uncanny mix of on-ball guile and grace. Go and finish the job in the Phantom Luna 2 Elite. Revolutionary Nike Gripknit covers the striking area of the boot while Nike Cyclone 360 traction helps guide your unscripted agility. We design Elite boots for you and the world\'s biggest stars to give you high-level quality, because you demand greatness from yourself and your footwear.', '1737108525.png', 899.00, 0, 'active', '2025-01-17 04:23:45', '2025-01-17 04:23:45'),
(21, 'Adizero Electric Football Cleats', 3, 5, 'This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make.', '1737108689.png', 289.00, 0, 'active', '2025-01-17 04:26:29', '2025-01-17 04:26:29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1RWPsISENXo3DdeeNWKeFOvyf2OdiIGGlmOltqJ5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib21vd25xTVVsV3lHaWJ0dVQ4WDZYVnF6WXU2eVNxcFZ1ZlRCVUdnaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L29yZGVyIjt9fQ==', 1737108770);

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
  `role` enum('customer','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sindhumagar', 'sindhu12@gmail.com', NULL, '$2y$12$CRkHNzhsNq4pmgapyhHoueNlTkcVlQVrr/9FohHeBheKISKqdf71m', 'customer', NULL, '2025-01-05 06:59:33', '2025-01-17 02:07:09'),
(2, 'sindhumagar', 'sindhu12@admin.com', NULL, '$2y$12$UNOx/OmOiacwdlWzahdDDeRz3U4yBuU1oyFmPS4OqZOE83ZJnYfXa', 'admin', NULL, '2025-01-05 07:00:08', '2025-01-05 07:00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
