-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2015 at 03:33 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neveshtar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_02_01_005809_create_session_table', 2),
('2015_02_01_005938_create_cache_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `payload` text COLLATE utf8_persian_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('12036a9fac6aa33b6e1240fd508e75d598f28057', 'ZXlKcGRpSTZJbGRvTVdsVmRHUTNXRmRYVmpSUk1rRklXVVJsYUZFOVBTSXNJblpoYkhWbElqb2lNWEVyTWswemVYQkthbEZqYUVvMFRIbzFVV3BKWnpFeVIyVnNaVkprVFdzM2NFdzFWVWtyVXpaT1RVWnZSSEJvVkcxMFdUTkxhbkZpYzBvck5FdFJRbGxhVW5WbVdtSkRXalpXTlhGc1kybEROelZNYWpGNGNFdFNPWEJ1UW5BMFF6WkZWVXh3ZDBSS2NsWXpZMjFETVRGbU5Gd3ZlVXQ0TUdKYU9EQmtabmRCVFcxV1FsZHhSaXQ2Y20xVE5GVkljMEZTTm5Fd1RYQmNMMk5EUW1kY0x6UklLMmMzYUVKMlprd3JaVzVLZUVZMVhDOURVRGhKWVhGcWNXUkVOSEIwTnpFMlZISjJabFprY1haNFVHMVFOVnd2U21ab09HUmpVbWhQZVd4TWJFcFhRMGhwYUhOc1lVbDZWSHAzTVhBMFhDOTNRMmgxVjFKdFYzQm5VemhVYjNKMFIwOWhkbkkyWldSdFVqVnBiMVI1WVZCeWJuVm5VWEJGVFU0NWJXMUlRekIzVG1oSmFFUldjV1VyTkhBd2QxcGtTMjQxTVZnM2RETTVjV2M1VXl0cVRYZFZWRXhoWEM5VWRUUmxVa1F6U0RoSFZtb3hNWEZEUmxVNVUxaFFUa2Q1TWsxUVZtcGhORmhHT1doRE0wSkVkekJKVVdKWlYyeEdlRGcwVERjMU1Fb3pXbUpYU0dFMFZuaExObEZRYWtOVmQySnRTbkZXU2s5U2NXcGFjVnd2YzJKcE1VcFVhbFphT0ZaTU5UWnZPVmd6ZDB0Q04ycFdTVEZjTDBSWmVFaHljMHhUYW1GSk9TSXNJbTFoWXlJNkltRmpNbUV5TldNek1ETmpPVGN6T1dNMFltTTVZemhrWVRkaVpUSTBNREZtWXpZeFpXUXlPRGt3WW1ObE5ERTBaRGxrWWpsbU16SmpaRGN6WmpOa09UQWlmUT09', 1423174143);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hossein Jabbari', 'mr.hhkj@gmail.com', '$2y$10$snzoiPWn.PqZKOKIa99OlOju.4sPlS.kdTA0fvO6h.HowBh6xPSG.', 'yFHPRyy03yubBxZmfx5RPBVmdAkVFOb6HDJH0yoIHrLRkEdtF76PoElh6CaA', '2015-01-31 21:19:07', '2015-01-31 21:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
 ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
