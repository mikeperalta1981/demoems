-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 06:05 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `civil_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `current_address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `spouse_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `educational_attainment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pag_ibig` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `philhealth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_relationship` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `monthly_salary` decimal(10,0) NOT NULL,
  `daily_rate` decimal(10,0) NOT NULL,
  `allowance` decimal(10,0) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_hired` date NOT NULL,
  `profile_pic` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `civil_status`, `citizenship`, `birthday`, `permanent_address`, `current_address`, `phone_no`, `spouse_name`, `educational_attainment`, `course`, `school`, `tin`, `sss`, `pag_ibig`, `tax_code`, `philhealth`, `contact_name`, `contact_relationship`, `contact_phone`, `employment_status`, `monthly_salary`, `daily_rate`, `allowance`, `position`, `department`, `date_hired`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, '', 'Mike', '', 'Peralta', '', 'M', 'SINGLE', '', '0000-00-00', 'San Francisco', 'California', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PROBATION', '0', '0', '0', 'CASHIER', '', '0000-00-00', '1471329938_Hydrangeas.jpg', NULL, NULL),
(2, '', 'asgd', '', 'asdgas', '', 'M', 'SINGLE', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PROBATION', '0', '0', '0', 'CASHIER', '', '0000-00-00', '1471343796_Lighthouse.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_13_100347_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mike', 'megsperalta@gmail.com', '$2y$10$CBQVzZKmoppEtLekKEJ9Ru1pFUaM84XRfk1qygPVUZubKFK1ipwLK', 'LSepOQQiTiEjag1xF8NVn3kGodmcAhuEuCoUXiu7A57hxP3SL2CiQ0xLa5zR', '2016-07-19 02:38:16', '2017-01-31 18:48:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
