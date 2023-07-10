-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 05:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` varchar(255),
  `name` varchar(255) DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_code`, `name`, `total_product`, `total_price`, `created_at`, `updated_at`) VALUES
(17, 'DSM00017', 'Điện thoại, Tablet', 14, 99740000, '2023-07-08 06:24:23', '2023-07-08 06:24:46');

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `auto_generate_category_code` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN
  DECLARE max_id INT;
  SET max_id = (SELECT MAX(id) FROM categories);
  SET NEW.category_code = CONCAT('DSM', LPAD(max_id + 1, 5, '0'));
END
$$
DELIMITER ;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_07_090629_create_categorys_table', 2),
(6, '2023_07_07_090649_create_products_table', 2),
(7, '2023_07_07_091434_create_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nam.n1352@gmail.com', '$2y$10$1wMFLxbCU6nR9FtkbLFvVeMkaX1M/pN0lUyKYMmcr2AG5Avz8wNle', '2023-07-06 10:42:21');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category_id`, `name`, `brand`, `rate`, `price`, `description`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(6, 'PRD00006', 17, 'iPhone 13 128GB', 'Apple', NULL, 16490000, 'abc', 5, 'dZ9r5aswVDhQgLY8ojdZMxjmIqaYihBE.webp', '2023-07-08 06:46:34', '2023-07-08 06:46:34'),
(7, 'PRD00007', 17, NULL, NULL, NULL, 100000, NULL, 0, '8zLkPeVnabXc41XUL5MgJsu4G2U7lcDy.webp', '2023-07-09 04:18:34', '2023-07-09 04:18:34'),
(8, 'PRD00008', 17, NULL, NULL, NULL, 100000, NULL, 0, 'LWGd6tD9SSZ27tNi56vWsHrAH8dT60zd.webp', '2023-07-09 04:18:52', '2023-07-09 04:18:52'),
(9, 'PRD00009', 17, NULL, NULL, NULL, 100000, NULL, 0, 'mqpJOxFJJXpTdBMHpbWJkHBCMSSi33LN.webp', '2023-07-09 04:21:03', '2023-07-09 04:21:03'),
(10, 'PRD00010', 17, NULL, NULL, NULL, 100000, NULL, 0, 'buIkWbHnkJqDKFUVISdPIoLZuL9tel3d.webp', '2023-07-09 04:21:15', '2023-07-09 04:21:15'),
(11, 'PRD00011', 17, NULL, NULL, NULL, 100000, NULL, 0, '18IBZrUa041Omj8BNcpZRLTKiqE1dIod.webp', '2023-07-09 04:21:27', '2023-07-09 04:21:27'),
(12, 'PRD00012', 17, NULL, NULL, NULL, 100000, NULL, 0, '1OBoTndAzKxVLlc99pZIMucOeC3NKMOC.webp', '2023-07-09 04:21:40', '2023-07-09 04:21:40'),
(13, 'PRD00013', 17, NULL, NULL, NULL, 100000, NULL, 0, 'r5wRBOYV6FFoDhFtL7R8duahNwX9gPo8.webp', '2023-07-09 04:22:30', '2023-07-09 04:22:30'),
(14, 'PRD00014', 17, 'Smart phone', 'Apple', NULL, 100000, 'abc', 0, 'CVnTt5S1lbNoaJzCSqlwOrotU6rbWQWY.webp', '2023-07-09 04:22:41', '2023-07-10 07:33:05');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `auto_generate_product_code` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
  DECLARE max_id INT;
  SET max_id = (SELECT MAX(id) FROM products);
  SET NEW.product_code = CONCAT('PRD', LPAD(max_id + 1, 5, '0'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals` AFTER INSERT ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = NEW.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = NEW.category_id
    )
  WHERE id = NEW.category_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals_after_delete` AFTER DELETE ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = OLD.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = OLD.category_id
    )
  WHERE id = OLD.category_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals_after_update` AFTER UPDATE ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = NEW.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = NEW.category_id
    )
  WHERE id = NEW.category_id;
END
$$
DELIMITER ;

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
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for normal user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thai nguen', 'nam.n1352@gmail.com', NULL, '$2y$10$xdl3KOD1gMsPlRtUSN6OQea10tteMS.4dfNhcqmq0upXfh5lK54Vi', 'ADM', 'nXD1WlJsz3U78ieHqlvQX2zij67qj7Hi5Qavhw9a5yonOekcPZQcsPWdsC3C', '2023-07-06 09:43:36', '2023-07-06 09:43:36'),
(2, 'bartng2', 'thaing2002@gmail.com', NULL, '$2y$10$x3Qf1kqiX0ioaRocTbi1N.YwEUz9cYYgVA/68gjywlEFooeeMfRli', 'USR', 'AnBiXkWoAelWPpcfDuvYu7B4s3te2v1XYblutPLmqf6QfJz1ebbRUWv9pQ7j', '2023-07-07 01:47:01', '2023-07-07 01:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorys_category_code_unique` (`category_code`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `fk_products_cate` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_cate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
