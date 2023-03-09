-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 05:07 AM
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
-- Database: `employees_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', NULL, '2023-03-06 04:39:46'),
(2, 'Mandalay', NULL, NULL),
(3, 'Bago', NULL, NULL),
(4, 'Sagaing', NULL, NULL);

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
(5, '2023_03_05_084611_create_branches_table', 1),
(6, '2023_03_06_105859_create_employees_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `role` enum('Admin','Manager','Branch Manager','Employee') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `branch_id`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$deKgCRCeWbkYZBQZw6wVruL0v32as17be1BWotNmjeUS8pXy6pBhO', NULL, 'Admin', NULL, NULL, NULL),
(2, 'Manager', 'manager@gmail.com', NULL, '$2y$10$cdJ/uq9o2MpdU7NlHNK2FeWuV0PHLY7IWeqn5JNrp7GOAOCyv6Ole', NULL, 'Manager', NULL, NULL, NULL),
(3, 'Branch Manager Ygn', 'branchmanager_ygn@gmail.com', NULL, '$2y$10$6pNIGCEIPA.w/sM8UH/FC.PY.NBsQUDFjzXHqvX.2CoYjPirypetG', 1, 'Branch Manager', NULL, NULL, NULL),
(4, 'Branch Manager Mdy', 'branchmanager_mdy@gmail.com', NULL, '$2y$10$pWA7WbBZjFp4dO7jPdljDe3PlwWYD0QLGWFfjCwdHhMF7Ho4Jcjjy', 2, 'Branch Manager', NULL, NULL, NULL),
(5, 'userone', 'userone@gmail.com', NULL, '$2y$10$SsunguQfunQ0e5YxsQJlMeMAUVWwghw2sT5JgGl8zyPWlwIVSLYFm', 1, 'Employee', NULL, '2023-03-05 02:44:26', '2023-03-05 02:44:26'),
(6, 'usertwo', 'usertwo@gmail.com', NULL, '$2y$10$8eHB3xkf8eAjcdqczKK2.e2LuoFQLscxY5HB105AHEvHPioH9FbRa', 2, 'Employee', NULL, '2023-03-06 05:37:18', '2023-03-06 05:37:18'),
(7, 'Aye Aye', 'Aye@gmail.com', NULL, '$2y$10$MAwYfHuBCD8I56LpGPu7Mey10DHsQvvdnKSGU0LtFmV7nB96lrloS', NULL, 'Admin', NULL, '2023-03-08 08:48:02', '2023-03-08 08:48:02'),
(8, 'Moe Moe', 'moemoe@gmail.com', NULL, '$2y$10$rk3uWWS9aCqf2S5awAnfhOwbdJIwNNqoq5DL/zqMFmpn0vWqly0we', 2, 'Employee', NULL, '2023-03-08 08:55:22', '2023-03-08 08:55:22'),
(9, 'Hla Hla', 'hla@gmail.com', NULL, '$2y$10$rk3uWWS9aCqf2S5awAnfhOwbdJIwNNqoq5DL/zqMFmpn0vWqly0we', 3, 'Employee', NULL, '2023-03-08 08:58:52', '2023-03-08 08:58:52'),
(10, 'Hla Hla Oo Oo', 'hlaoo@gmail.com', NULL, '$2y$10$rk3uWWS9aCqf2S5awAnfhOwbdJIwNNqoq5DL/zqMFmpn0vWqly0we', 2, 'Employee', NULL, NULL, '2023-03-08 10:50:55'),
(12, 'Aung Chan', 'chan@gmail.com', NULL, '$2y$10$rk3uWWS9aCqf2S5awAnfhOwbdJIwNNqoq5DL/zqMFmpn0vWqly0we', 2, 'Employee', NULL, NULL, NULL),
(13, 'Aye Maung', 'ayemaung@gmail.com', NULL, '$2y$10$P6TeNf5S8HeYo//WV/AxgeK3xJ4fhhm.r/nAuEtxjLAqGcwdd1xwW', 3, 'Employee', NULL, NULL, '2023-03-08 10:46:52'),
(14, 'Myo Zaw', 'myo@gmail.com', NULL, '$2y$10$BJc.5TjU0xobO.DhONhSJuX/5VzZPcy8WJmWE3xzhkmSyQrYLQlsq', 4, 'Employee', NULL, NULL, NULL),
(15, 'Kaung Kaung', 'kaung@gmail.com', NULL, '$2y$10$1ebKvPgb6BvzxOcPARiWfeY7s.7NLKK2ici5CHeyi31jpJT3S7A8G', 2, 'Employee', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
