-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 04:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmland`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `Quantity` varchar(256) NOT NULL,
  `time` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_no`, `product_id`, `name`, `location`, `price`, `Quantity`, `time`, `created_at`) VALUES
(1, 1, 'Apples', 'Bihar', 23, '100', '24-04-25', '2024-04-25 18:36:56'),
(2, 1, 'Apples', 'Bihar', 34, '100', '24-04-25', '2024-04-25 18:40:53'),
(3, 1, 'Apples', 'Bihar', 34, '100', '24-04-25', '2024-04-25 18:40:55'),
(4, 1, 'Apples', 'Bihar', 344, '100', '24-04-25', '2024-04-25 18:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyierID` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `planName` varchar(255) NOT NULL,
  `planActive` varchar(255) NOT NULL,
  `plan_duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `is_mine` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `location`, `description`, `size`, `created_on`, `is_mine`, `created_at`, `updated_at`) VALUES
(2, 'Kalol', '45', 'Kalol Farm for Chillies farming', 2, '2024-04-18', 0, '2024-04-17 13:46:51', '2024-04-18 01:18:44'),
(3, 'Haripura Farm', 'Gujarat', 'Chana farming', 3, '2003-02-28', 0, '2024-04-18 01:16:11', '2024-04-18 01:17:19'),
(4, 'Shantinam', '45', 'Chana farming for chickpea', 4, '2024-04-23', 0, '2024-04-25 10:57:08', '2024-04-25 10:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `farm_crops`
--

CREATE TABLE `farm_crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` varchar(255) NOT NULL,
  `crop_id` varchar(255) NOT NULL,
  `planted_on` date NOT NULL,
  `harvest_by` varchar(255) NOT NULL,
  `year_planted` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farm_leases`
--

CREATE TABLE `farm_leases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `farmer_phone` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_leases`
--

INSERT INTO `farm_leases` (`id`, `farm_id`, `date_from`, `date_to`, `farmer_name`, `farmer_phone`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-06', '2024-03-06', 'Samplefarm', '7666651025', '34', '2024-03-19 05:00:42', '2024-03-19 05:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `farm_notes`
--

CREATE TABLE `farm_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_crop_id` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farm_registers`
--

CREATE TABLE `farm_registers` (
  `farm_crop_id` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `total_cost` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_created` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_23_101625_create_sessions_table', 1),
(9, '2024_02_23_124722_create_suppliers_table', 2),
(10, '2024_02_23_124734_create_buyers_table', 2),
(11, '2024_02_27_050244_create_warehouse_table', 3),
(12, '2024_03_10_121933_adding_fiels_to_warehouses_table', 4),
(13, '2022_08_17_155140_create_farm_leases_table', 5),
(14, '2022_08_17_154951_create_farms_table', 6),
(15, '2022_08_17_153127_create_crops_table', 7),
(16, '2022_08_17_155055_create_categories_table', 8),
(17, '2022_08_17_155211_create_farm_crops_table', 8),
(18, '2022_08_17_155235_create_farm_registers_table', 8),
(19, '2022_08_17_155255_create_farm_notes_table', 8);

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
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `launched_date` text DEFAULT NULL,
  `eligibility` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `name`, `description`, `youtube`, `website`, `launched_date`, `eligibility`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Pradhan Mantri Fasal Bima Yojana (PMFBY)', 'Crop Insurance is an integrated IT solution and a web-based ecosystem to speed up service delivery, unify fragmented databases, achieve a single view of data, and eliminate manual processes. Crop Insurance provides insurance services to farmers faster than before.\r\n\r\nThis is a stable, secure and seamlessly integrated ecosystem created with a comprehensive view of data in a secure environment thereby enabling information access to multiple stakeholders viz. Farmers, Govt. Functionaries, Insurance Companies, Intermediaries, Bankers and social & community bodies.\r\n\r\nCrop Insurance portal has enabled the digitization of notification of areas, crops, schemes for enabling information access to multiple stakeholders thereby facilitating ease of access to the farmers in availing crop insurance services. This automated solution has opened a window of opportunity to remote and economically-weak farmers to benefit from crop insurance services.', 'https://www.youtube.com/embed/6okFG0gGAXE?si=WvTzoq7nJLSm3UnC', 'https://pmfby.gov.in/', 'February 2016', 'famrers', 'ALL', '2024-04-18 04:59:23', '2024-04-18 04:59:23'),
(2, 'National Mission For Sustainable Agriculture (NMSA)', 'National Mission for Sustainable Agriculture (NMSA) has been formulated for enhancing agricultural productivity especially in rainfed areas focusing on integrated farming, water use efficiency, soil health management and synergizing resource conservation.\r\n\r\nThe strategies and programmers of actions (POA) outlined in the Mission Document, that was accorded ‘in principle’ approval by Prime Minister’s Council on Climate Change (PMCCC) on 23.09.2010,aim at promoting sustainable agriculture through a series of adaptation measures focusing on ten key dimensions encompassing Indian agriculture namely; ‘Improved crop seeds, livestock and fish cultures’, ‘Water Use Efficiency’, ‘Pest Management’, ‘Improved Farm Practices’, ‘Nutrient Management’, ‘Agricultural insurance’, ‘Credit support’, ‘Markets’, ‘Access to Information’ and ‘Livelihood diversification’.', 'https://www.youtube.com/embed/DS_SMVvqzsg?si=0GpVn85Lo6XYp3nr', 'https://nmsa.dac.gov.in/', '2015', 'Farmers', 'Maharashtra', '2024-04-18 05:43:59', '2024-04-18 05:43:59'),
(3, 'Paramparagat Krishi Vikas Yojna (PKVY)', 'It aims at development of sustainable models of organic farming through a mix of traditional wisdom and modern science to ensure long term soil fertility buildup, resource conservation and helps in climate change adapatation and mitigation.\r\n\r\nPKVY also aims at empowering farmers through institutional development through clusters approch not only in farm practice management,input production,quality assurance but also in value addition and direct marketing through innovative means.', 'https://www.youtube.com/embed/_JTaN927MKc?si=LAKOcaAsve-chW0Y', 'https://pgsindia-ncof.gov.in/PKVY/Introduction.aspx', '2015', 'Farmers', 'ALL', '2024-04-18 06:35:54', '2024-04-18 06:35:54'),
(4, 'Pradhan Mantri Fasal Bima Yojana (PMFBY)', 'Crop Insurance is an integrated IT solution and a web-based ecosystem to speed up service delivery, unify fragmented databases, achieve a single view of data, and eliminate manual processes. Crop Insurance provides insurance services to farmers faster than before.\r\n\r\nThis is a stable, secure and seamlessly integrated ecosystem created with a comprehensive view of data in a secure environment thereby enabling information access to multiple stakeholders viz. Farmers, Govt. Functionaries, Insurance Companies, Intermediaries, Bankers and social & community bodies.\r\n\r\nCrop Insurance portal has enabled the digitization of notification of areas, crops, schemes for enabling information access to multiple stakeholders thereby facilitating ease of access to the farmers in availing crop insurance services. This automated solution has opened a window of opportunity to remote and economically-weak farmers to benefit from crop insurance services.', 'https://www.youtube.com/embed/IGQ3EgCeoXg?si=0KI0HF-JcHwokBsM', 'https://pmfby.gov.in/', 'February 2016', 'Farmers', 'ALL', '2024-04-18 06:38:00', '2024-04-18 06:38:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FCXz80SJkgb40BM46bKLFZMMP8R1HoseFrlDYvad', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibWdPNkttQ0g0ZXpyYXAzaFRzRTd6amdNSWpoWExqNVBqSVh6RVBsWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iaWQ/cHJvZHVjdD0xIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQ3LjJ4bDBKQmFlMVFBa1AyY21EWUNPQktWWkEyaGdkT2dHNVZpWlY0dG5xbXczY0NtM05oTyI7fQ==', 1714070464);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SupplierName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `SupplierName`, `phone`, `email`, `address`, `pincode`, `language`, `created_at`, `updated_at`) VALUES
(1, 'John Doe Farms', '123-456-7890', 'john@example.com', '123 Farm Rd', '12345', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(2, 'Jane Smith Dairy', '987-654-3210', 'jane@example.com', '456 Dairy Ln', '54321', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(3, 'Michael Johnson Wheat Farm', '555-555-5555', 'michael@example.com', '789 Wheat St', '67890', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(4, 'Samantha Brown Poultry', '111-222-3333', 'samantha@example.com', '321 Poultry Ave', '13579', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(5, 'David Lee Beekeeping', '444-444-4444', 'david@example.com', '666 Beehive Blvd', '24680', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(6, 'Oliver Green Farms', '777-777-7777', 'oliver@example.com', '789 Greenfield Rd', '54321', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(7, 'Natalie Red Winery', '888-888-8888', 'natalie@example.com', '123 Vineyard Ln', '12345', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(8, 'Thomas Yellow Orchard', '999-999-9999', 'thomas@example.com', '456 Orchard Ave', '13579', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(9, 'Sophia Purple Vineyard', '000-000-0000', 'sophia@example.com', '987 Grape Rd', '67890', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(10, 'William Orange Gardens', '111-111-1111', 'william@example.com', '321 Garden Blvd', '24680', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(11, 'Emily Pink Farm', '222-222-2222', 'emily@example.com', '666 Flower St', '86420', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(12, 'Henry Brown Ranch', '333-333-3333', 'henry@example.com', '222 Ranch Rd', '97531', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(13, 'Isabella Gray Plantation', '444-444-4444', 'isabella@example.com', '777 Plantation Ave', '31415', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(14, 'Jack White Vineyard', '555-555-5555', 'jack@example.com', '888 Vine St', '92653', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33'),
(15, 'Ava Black Farms', '666-666-6666', 'ava@example.com', '999 Farm Ln', '35897', 'English', '2024-03-17 10:10:33', '2024-03-17 10:10:33');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'john', 'john@gmail.com', NULL, '$2y$12$7.2xl0JBae1QAkP2cmDYCOBKVZA2hgdOgG5ViZV4tnqmw3cCm3NhO', NULL, NULL, NULL, 'EiATgNjDXWELJNHT13yzQ0T4gRjDIRXmMDHLgrdomkAFtI41mphJa0VFhqh5', NULL, NULL, '2024-02-23 04:50:02', '2024-02-23 04:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmerid` int(11) NOT NULL,
  `product` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `productpicPath` varchar(255) NOT NULL DEFAULT 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product',
  `warehouseproductpic` varchar(255) NOT NULL DEFAULT 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `farmerid`, `product`, `description`, `price`, `location`, `quantity`, `status`, `payment_mode`, `created_at`, `updated_at`, `productpicPath`, `warehouseproductpic`) VALUES
(1, 1, 'Apples', 'Fresh apples from orchard', 10.50, 'Bihar', 100, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(2, 2, 'Milk', 'Organic milk from grass-fed cows', 5.75, 'MP\n', 50, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(3, 3, 'Wheat', 'High-quality wheat grains', 15.25, 'AP', 200, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(4, 4, 'Eggs', 'Fresh eggs from free-range chickens', 3.00, 'Maharashtra', 80, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(5, 5, 'Honey', 'Pure honey harvested from beehives', 8.99, 'MP\n', 30, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(6, 1, 'Oranges', 'Fresh oranges from orchard', 12.75, 'Gujarat', 150, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(7, 1, 'Tomatoes', 'Organic tomatoes from greenhouse', 8.99, 'Rajkot', 80, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(8, 2, 'Cheese', 'Artisanal cheese from local dairy', 9.50, 'New Jersey', 60, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(9, 2, 'Yogurt', 'Probiotic yogurt made from fresh milk', 6.25, 'Jammu', 40, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(10, 3, 'Corn', 'Sweet corn freshly harvested', 7.99, 'Dhanu', 100, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(11, 3, 'Potatoes', 'Organic potatoes from the field', 5.50, 'Gujarat', 120, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(12, 4, 'Chicken', 'Fresh chicken cuts from farm', 6.99, 'Gujara', 90, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(13, 5, 'Beeswax', 'Natural beeswax from hives', 3.50, 'MP', 25, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(14, 1, 'Peaches', 'Juicy peaches straight from the tree', 9.25, 'Thane', 70, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(15, 2, 'Butter', 'Homemade butter churned from cream', 4.75, 'USA', 45, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(16, 3, 'Apparel', 'Handmade clothing items', 20.00, 'Dadar', 50, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(17, 4, 'Pork', 'Tender pork cuts from farm', 8.50, 'Chennai', 120, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(18, 5, 'Candles', 'Scented candles made with beeswax', 15.99, 'Ahmedabad\n', 35, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(19, 1, 'Blueberries', 'Freshly picked blueberries', 11.00, 'Kerala', 60, 1, 2, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(20, 2, 'Cream', 'Rich cream sourced from grass-fed cows', 7.25, 'Kerala', 30, 1, 1, '2024-03-17 10:09:32', '2024-03-17 10:09:32', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(21, 8, 'Apples', 'Best in quality', 32.00, 'Ahmedabad', 200, 1, 1, '2024-03-17 14:07:05', '2024-03-17 14:07:05', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product'),
(22, 8, 'Apples', 'Best in quality', 32.00, 'Haryana', 321, 1, 1, '2024-03-17 14:07:23', '2024-03-17 14:07:23', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product', 'https://dummyimage.com/600x400/000000/fff.jpg&text=famers+product');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_no`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_crops`
--
ALTER TABLE `farm_crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_leases`
--
ALTER TABLE `farm_leases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_notes`
--
ALTER TABLE `farm_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_registers`
--
ALTER TABLE `farm_registers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farm_crops`
--
ALTER TABLE `farm_crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm_leases`
--
ALTER TABLE `farm_leases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farm_notes`
--
ALTER TABLE `farm_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm_registers`
--
ALTER TABLE `farm_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
