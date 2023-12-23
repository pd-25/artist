-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 11:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artist`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `style_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `placement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`id`, `user_id`, `title`, `total_view`, `style_id`, `subject_id`, `placement_id`, `created_at`, `updated_at`, `image`, `zipcode`, `country`) VALUES
(2, 5, 'xxx_111223_1', 0, 1, 1, 1, '2023-11-11 22:07:15', '2023-11-11 22:07:15', 'xxx_111223_1.jpg', NULL, NULL),
(3, 5, 'xxx_111223_2', 0, 1, 1, 1, '2023-11-11 22:08:00', '2023-11-11 22:51:07', 'xxx_111223_2.png', NULL, NULL),
(5, 5, 'xxx_111223_3', 0, 1, 1, 1, '2023-11-11 22:52:02', '2023-11-11 22:52:02', 'xxx_111223_3.jpg', NULL, NULL),
(7, 5, 'xxx_111223_4', 0, 1, 1, 1, '2023-11-12 01:40:05', '2023-11-12 01:40:05', 'xxx_111223_4.jpg', NULL, NULL),
(8, 7, 'supriyo_111223_1', 0, 1, 1, 1, '2023-11-12 04:06:36', '2023-11-12 04:06:36', 'supriyo_111223_1.jpg', NULL, NULL),
(9, 7, 'supriyo_111223_2', 0, 1, 1, 1, '2023-11-12 04:07:08', '2023-11-12 04:07:08', 'supriyo_111223_2.jpg', NULL, NULL),
(10, 9, 'jj2_112223_1', 0, 1, 1, 1, '2023-11-22 13:13:24', '2023-11-22 13:13:24', 'jj2_112223_1.PNG', NULL, NULL),
(11, 9, 'jj2_112223_2', 0, 1, 1, 1, '2023-11-22 13:14:43', '2023-11-22 13:14:43', 'jj2_112223_2.PNG', NULL, NULL),
(12, 9, 'jj2_112323_1', 0, 1, 1, 1, '2023-11-23 10:02:34', '2023-11-23 10:02:34', 'jj2_112323_1.PNG', NULL, NULL),
(13, 7, 'supriyo_112623_1', 0, 1, 1, 1, '2023-11-26 10:58:45', '2023-11-26 11:01:44', 'supriyo_112623_1.jpg', '334534', 'austrilia'),
(14, 7, 'supriyo_120223_1', 0, 1, 1, 1, '2023-12-02 01:30:15', '2023-12-02 01:30:15', 'supriyo_120223_1.jpeg', NULL, NULL),
(15, 7, 'supriyo_120223_2', 0, 1, 1, 1, '2023-12-02 01:36:51', '2023-12-02 01:36:51', 'supriyo_120223_2.jpeg', '722206', 'United States of America'),
(16, 10, 't_121823_1', 0, 1, 1, 1, '2023-12-18 10:47:13', '2023-12-18 10:56:22', 't_121823_1.jpg', '343434', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `banner_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1700673856774.jpeg', 9, '2023-11-22 11:54:16', '2023-11-22 11:54:16'),
(3, '17007585934325.png', 9, '2023-11-23 11:26:34', '2023-11-23 11:26:34'),
(5, '17029574473249.jpg', 10, '2023-12-18 22:14:07', '2023-12-18 22:14:07'),
(6, '17029574741503.jpeg', 10, '2023-12-18 22:14:34', '2023-12-18 22:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artwork_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `artwork_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'test comment', NULL, NULL);

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artwork_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `artwork_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 2, 9, '2023-12-01 11:40:41', '2023-12-01 11:40:41');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_10_100002_create_styles_table', 1),
(7, '2023_11_10_100016_create_subjects_table', 1),
(8, '2023_11_10_100035_create_placements_table', 1),
(9, '2023_11_11_093344_create_artworks_table', 1),
(10, '2023_11_11_094201_create_likes_table', 1),
(11, '2023_11_11_094254_create_total_views_table', 1),
(12, '2023_11_11_095924_create_comments_table', 1),
(13, '2023_11_12_024347_add_fields_to_artworks_table', 2),
(14, '2023_11_18_100221_create_time_tables_table', 3),
(15, '2023_11_22_164541_create_banner_images_table', 4),
(16, '2023_11_26_162122_add_fields_to_artworks', 5),
(17, '2023_12_11_180339_add_fields_to_users', 6),
(18, '2023_12_19_170513_create_quotes_table', 6),
(19, '2023_12_21_165943_add_fields_to_quotes', 7);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'loginUser', '8cc32a74e41d08f6025a2ba4bbed97b5fd8e3234e79760934a9cf72ec774370a', '[\"*\"]', NULL, NULL, '2023-11-12 08:10:47', '2023-11-12 08:10:47'),
(2, 'App\\Models\\User', 5, 'loginUser', 'da4ba973c39f69c2257e862f68d7488ef0a05fdd1f55e7ccca9a6a555df4e1fd', '[\"*\"]', NULL, NULL, '2023-11-12 08:13:58', '2023-11-12 08:13:58'),
(3, 'App\\Models\\User', 5, 'loginUser', '0200e34f78747b025aad581663ab336c911ce991c941065401b5c3459c09c605', '[\"*\"]', NULL, NULL, '2023-11-12 08:16:28', '2023-11-12 08:16:28'),
(4, 'App\\Models\\User', 5, 'loginUser', '974bb9fc26fe0bb8a0ae6546ffc3a6f842d4c4117ff7f393b7e42e1daf9ad75e', '[\"*\"]', NULL, NULL, '2023-11-12 08:16:36', '2023-11-12 08:16:36'),
(5, 'App\\Models\\User', 5, 'loginUser', 'd159e4de7cb8d39bb8f472dbacf837d0383536d6a70b4df7b622290041532b34', '[\"*\"]', NULL, NULL, '2023-11-12 08:16:47', '2023-11-12 08:16:47'),
(6, 'App\\Models\\User', 5, 'loginUser', '8354afee132746815f0098af302755543b646ec4959b0cc6e1c91a0f423f692f', '[\"*\"]', NULL, NULL, '2023-11-12 08:20:33', '2023-11-12 08:20:33'),
(7, 'App\\Models\\User', 5, 'loginUser', '18b0c4f2a280990e1de4744385b40472e985d796c597ec524bfb42685c52a957', '[\"*\"]', '2023-11-22 10:56:28', NULL, '2023-11-12 08:21:07', '2023-11-22 10:56:28'),
(8, 'App\\Models\\User', 9, 'loginUser', 'f92b7c49dec0367471526f5532c16b3a9b2686003d7ec336e5b5391924b2923c', '[\"*\"]', '2023-12-21 10:16:20', NULL, '2023-11-22 10:58:25', '2023-12-21 10:16:20'),
(9, 'App\\Models\\User', 9, 'loginUser', '4ded3e59d9fc7387fb118bf3b1dc18888afea2daaa514acf4c8ed3aeb480a776', '[\"*\"]', '2023-11-23 11:26:32', NULL, '2023-11-23 11:01:51', '2023-11-23 11:26:32'),
(10, 'App\\Models\\User', 9, 'loginUser', '307a6d0f0f0a10861ed8e8dce4de7e9d756188dc91244d34512b9752b107c442', '[\"*\"]', '2023-12-21 11:37:33', NULL, '2023-12-21 10:19:22', '2023-12-21 11:37:33'),
(11, 'App\\Models\\User', 10, 'loginUser', 'f7ebc6d0503d83a0304df9fbd634e70e7c66749d184c103886b24821cb96041e', '[\"*\"]', '2023-12-23 04:36:13', NULL, '2023-12-23 04:30:24', '2023-12-23 04:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'placements One', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `artist_id`, `color`, `description`, `size`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 5, 'dd', 'erereffefve e r er', '34', '2023-12-21 11:37:33', '2023-12-21 11:37:33', 9),
(3, 5, 'dd', 'erereffefve e r er', '34', '2023-12-23 04:30:59', '2023-12-23 04:30:59', 10),
(5, 10, 'dd', 'Thsi is test pos', '34', '2023-12-23 04:36:13', '2023-12-23 04:36:13', 10);

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Style One', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'subjects One', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sunday_from` varchar(255) DEFAULT NULL,
  `sunday_to` varchar(255) DEFAULT NULL,
  `monday_from` varchar(255) DEFAULT NULL,
  `monday_to` varchar(255) DEFAULT NULL,
  `tuesday_from` varchar(255) DEFAULT NULL,
  `tuesday_to` varchar(255) DEFAULT NULL,
  `wednesday_from` varchar(255) DEFAULT NULL,
  `wednesday_to` varchar(255) DEFAULT NULL,
  `thrusday_from` varchar(255) DEFAULT NULL,
  `thrusday_to` varchar(255) DEFAULT NULL,
  `friday_from` varchar(255) DEFAULT NULL,
  `friday_to` varchar(255) DEFAULT NULL,
  `saterday_from` varchar(255) DEFAULT NULL,
  `saterday_to` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tables`
--

INSERT INTO `time_tables` (`id`, `user_id`, `sunday_from`, `sunday_to`, `monday_from`, `monday_to`, `tuesday_from`, `tuesday_to`, `wednesday_from`, `wednesday_to`, `thrusday_from`, `thrusday_to`, `friday_from`, `friday_to`, `saterday_from`, `saterday_to`, `created_at`, `updated_at`) VALUES
(1, 9, '02:25', '02:50', '00:00', '00:00', '05:03', '05:05', '09:13', '04:13', '04:13', '05:13', '00:00', '00:00', '00:00', '00:00', '2023-11-20 12:14:09', '2023-12-02 01:17:14'),
(2, 9, '02:25', '02:25', '02:25', '03:22', '04:22', '11:22', '04:22', '04:22', '05:22', '04:22', NULL, NULL, NULL, NULL, '2023-11-20 12:26:55', '2023-11-20 12:26:55'),
(3, 9, '01:17', '03:13', '23:18', '02:13', '04:13', '04:13', '09:13', '04:13', '04:13', '05:13', '04:13', '04:13', '04:14', '04:14', '2023-11-22 10:33:40', '2023-11-22 10:33:40'),
(4, 9, '01:14', '03:13', '23:18', '02:13', '04:13', '04:13', '09:13', '04:13', '04:13', '05:13', '04:13', '04:13', '04:14', '04:14', '2023-11-22 10:45:22', '2023-11-22 10:45:22'),
(5, 10, NULL, NULL, '03:59', '04:45', NULL, NULL, '04:03', '05:00', '19:46', '20:52', '00:00', '00:00', '21:53', '19:52', '2023-12-16 04:47:19', '2023-12-16 05:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `total_views`
--

CREATE TABLE `total_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artwork_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_views`
--

INSERT INTO `total_views` (`id`, `artwork_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2023-11-30 10:10:57', '2023-11-30 10:10:57'),
(2, 2, 8, '2023-12-01 12:18:12', '2023-12-01 12:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'artist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `address`, `zipcode`, `profile_image`, `banner_image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Admin Artist', 'artistAdmin', NULL, NULL, NULL, NULL, NULL, 'admin@mail.com', NULL, '$2y$12$Ba/.SNZqLJhOt912ArM.UuWrLRjbPNg9KYIaXFGpOX46WkqGFPgt6', NULL, NULL, NULL, 'artist'),
(3, 'User two', 'usertwo', NULL, NULL, NULL, NULL, NULL, 'usertwo@mail.com', NULL, '$2y$12$Ad8GnL8BLSmsENlTKSXPVezJyUUVcEDcLRYK9TerGalpTVLTHniaW', NULL, NULL, NULL, 'artist'),
(4, 'User three', 'userthree', NULL, NULL, NULL, NULL, NULL, 'userthree@mail.com', NULL, '$2y$12$G1293VYlQQzfVVfyckkwB.8kIINAmQ8WguERCCbBvUNLm1Jv0rUpW', NULL, NULL, NULL, 'artist'),
(5, 'Pradipta Bhuin1', 'xxx', '7797036947', 'Panjkona, Kenetty, Bankura', '722206', '16997114324150.jpg', '16997114325028.png', 'bhuinjohn@gmail.com', NULL, '$2y$12$w76MVu1X5KiquRG31k2kYOIFTN/5/Sgem7iTY4.yI0BAtGKJJQ32i', NULL, '2023-11-11 07:49:17', '2023-11-11 08:33:52', 'artist'),
(7, 'Supriyo Dey', 'supriyo', '1234567890', 'Panjkona, Kenetty, Bankura', '722206', '16997817194464.png', '16997817196496.png', 'supriyo@mail.com', NULL, '$2y$12$0K7CiIiAFA/c45gkkQdzzuJYXiSznVdSktBnV0FVibpnhiaNbxKea', NULL, '2023-11-12 04:05:19', '2023-11-12 04:05:19', 'artist'),
(8, 'Pradipta Bhuin', 'jj', '07797036947', 'Panjkona, Kenetty, Bankura', '722206', '1700502004691.jpg', '17005020088113.jpg', 'jj@mail.com', NULL, '$2y$12$fkyMV5E8nz0nh4RTgSOiMON4AhLWeCSxJeQFBqHAaD2f7SeF9Lzce', NULL, '2023-11-20 12:10:09', '2023-11-20 12:10:09', 'artist'),
(9, 'oooooo', 'jj2', '07797036947', 'Kolkata, admin', '722206', '17005030154507.png', '17005030167785.PNG', 'jj2@mail.com', NULL, '$2y$12$SkIyGNEPtWsOKIKFfGxliOa0rFb8QTvcm8WPOKvbh2rw5UA5te9dW', NULL, '2023-11-20 12:14:08', '2023-12-02 01:17:54', 'artist'),
(10, 'Test Update', 't', '232343423', 'Panjkona, Kenetty, Bankura', '722206', '17027218375522.jpeg', '17027227157678.png', 't@mail.com', NULL, '$2y$12$P1KjS8na9Lh544RNOxF4AOH4L5NcIzG78avHZTqAuyczrkD.eFtMC', NULL, '2023-12-16 04:47:19', '2023-12-16 05:01:55', 'artist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_views`
--
ALTER TABLE `total_views`
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
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `total_views`
--
ALTER TABLE `total_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
