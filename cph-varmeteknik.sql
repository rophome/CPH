-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2017 at 04:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cph-varmeteknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'OhvIJ8WUxMaxBx7zJVaMPE31z0ePvMcZ', 0, NULL, '2017-08-22 16:31:51', '2017-08-22 16:31:51'),
(2, 3, 'G1KLyvLpBFQU4h6kTbzhRD2TgKnizd4I', 0, NULL, '2017-08-22 16:35:03', '2017-08-22 16:35:03'),
(3, 4, 'Re0xM18afSSDee8vGKHPU4zUzBuzFDXq', 0, NULL, '2017-08-22 16:35:53', '2017-08-22 16:35:53'),
(4, 5, 'GU67oNsj4kkk2zqJCOmplykQT27mpjGW', 0, NULL, '2017-08-22 16:42:46', '2017-08-22 16:42:46'),
(5, 6, '3BrHy5OKH7h9e4Mszgrr9ibY1lY6vQtq', 0, NULL, '2017-08-22 16:48:19', '2017-08-22 16:48:19'),
(6, 7, 'fwsxo8O0hDhoDGEdGcYSJAtCLdj4C29D', 1, '2017-08-22 16:50:24', '2017-08-22 16:49:31', '2017-08-22 16:50:24'),
(7, 8, 'bQUv6NfeXAJ2UVkswnfKxTuYnYdrpNxD', 1, '2017-08-22 16:58:54', '2017-08-22 16:58:41', '2017-08-22 16:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--


--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `company_contact_user_id`, `created_at`, `updated_at`) VALUES
(13, 'Joe & The Juice', 6, NULL, '2017-08-22 17:08:30'),
(14, 'Baresso', 8, NULL, '2017-08-22 17:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `documen
--
-- Table structure for table `document_attachments`
--


-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2017_08_11_210852_create_products_table', 1),
(8, '2017_08_11_211511_create_products_photos_table', 1),
(9, '2017_08_15_145813_create_offers_table', 1),
(10, '2017_08_15_145925_create_tasks_table', 1),
(11, '2017_08_15_145945_create_companies_table', 1),
(12, '2017_08_15_150008_create_company_user_table', 1),
(13, '2017_08_15_150024_create_stores_table', 1),
(14, '2017_08_15_150039_create_documents_table', 1),
(15, '2017_08_15_150053_create_document_attachments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--


-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(6, 8, 'pTqooe9FsrmcGpVCS8K60ONb2czalKoI', '2017-08-22 18:04:53', '2017-08-22 18:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--




INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"company.list\":true}', NULL, NULL),
(2, 'manager', 'Manager', NULL, NULL, NULL),
(3, 'storeuser', 'Store User', NULL, NULL, NULL),
(4, 'worker', 'Worker', NULL, NULL, NULL),
(5, 'new', 'New User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--


-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2017-08-22 16:35:03', '2017-08-22 16:35:03'),
(4, 2, '2017-08-22 16:35:53', '2017-08-22 16:35:53'),
(5, 2, '2017-08-22 16:42:46', '2017-08-22 16:42:46'),
(6, 2, '2017-08-22 16:48:19', '2017-08-22 16:48:19'),
(7, 2, '2017-08-22 16:49:31', '2017-08-22 16:49:31'),
(8, 1, '2017-08-22 16:58:41', '2017-08-22 16:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--


-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--



INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2017-08-22 16:30:41', '2017-08-22 16:30:41'),
(2, NULL, 'ip', '127.0.0.1', '2017-08-22 16:30:41', '2017-08-22 16:30:41'),
(3, NULL, 'global', NULL, '2017-08-22 18:03:56', '2017-08-22 18:03:56'),
(4, NULL, 'ip', '127.0.0.1', '2017-08-22 18:03:56', '2017-08-22 18:03:56'),
(5, 8, 'user', NULL, '2017-08-22 18:03:56', '2017-08-22 18:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(6, 'bajewulohe@mobilevpn.top', '$2y$10$3kYpvlZNXX44P3Y4PC5Bp.3wjesI.DC2/k5pqah2bp8uwLrkeK5.q', NULL, NULL, 'Søren', 'Pedersen', '2017-08-22 16:48:19', '2017-08-22 16:48:19'),
(7, 'baca@mobilevpn.top', '$2y$10$TxwuTvMZqWtSJJibkiET.eCfLTfVDUZHAL/K629TnQ26LsCfA9/Vy', NULL, '2017-08-22 16:54:11', 'Bo', 'Pedersen', '2017-08-22 16:49:31', '2017-08-22 16:54:11'),
(8, 'rpede@nets.eu', '$2y$10$92wyTMoWO7wPn8aY6raYA.JoU6yw2nCl1vQ4rO2EW8hOA1RSa94pG', NULL, '2017-08-22 18:04:53', 'Ronnie', 'Pedersen', '2017-08-22 16:58:41', '2017-08-22 18:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--


-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_users`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`company_id`,`user_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_attachments`
--
ALTER TABLE `document_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_photos`
--
ALTER TABLE `products_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_photos_product_id_foreign` (`product_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users2_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_attachments`
--
ALTER TABLE `document_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_photos`
--
ALTER TABLE `products_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_photos`
--
ALTER TABLE `products_photos`
  ADD CONSTRAINT `products_photos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
