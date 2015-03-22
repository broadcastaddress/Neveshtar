-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2015 at 11:30 AM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` longtext COLLATE utf8_unicode_ci,
  `quote` longtext COLLATE utf8_unicode_ci,
  `quote_author` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `order` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `access_level` int(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`, `language`, `status`) VALUES
(2, 'English', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en', 1),
(3, 'فارسی', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fa', 1);

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
('35ee8e08d11b80c95bb59ae639d41728b6ffc235', 'ZXlKcGRpSTZJa2hXUzNkS2JtVllWR0ZxY0dOU2NsWlBXSEJ2VlVFOVBTSXNJblpoYkhWbElqb2lhM0pMU1U5cE5rNWxXVE5GUmxwS2RERTNka3hTUWtwUWJGQmFNbU5GT0c1dWRub3hSMVIyT1Vsdk5FMXhPVlJ2TVhscmFGSndLM3BNVmsxWGJEbG1hRm93V21KeE5XcGNMMXB4VWxVM2JrUTVUM05LWlZGTWVYaDNSMHd4WkRoaGNFRnpjMnRSUzIwMlEzbHVLM1JrVTF3dk0ydFVLMWxDYlVGdGNHSnRXVGxaYm14TWJGTmFTR1JCT0d0M2RIZEVaelp0VUZsbVdVTmhVbFJ6WEM4d2RXeDBkamt5Y21wTGNXTlFVVGhSWlZORVF6SkROMGhyTjA5UFRWRTVXVFJpVlV0blFrdHhhbTVCWlVSNFl6QnpVRmx4U2tkb1NqRlVWMmczTXpsSFN6SmtLMHBVYlVoM05rNHlXbWxMTlZoNGNrZHNibFphVDFsWE5GTnlZbUY1VEVaRGFtVk5NSEo1VVd0VVRFMUZkRlJUY0hwU1NtWkRjWGd6UlRWRGVrMVpRbG94YzFaWFlYRkhNMUZEUTFsdVVYTkhNbE55V1hoSVozWTNUMlJ1VFdkSlpFNDRUVkJ2UjBaVmMwMURURU5pZW00eWVYaDRPR0pMZVRSSFZHWnBUV1I1VUZGRFUxd3ZhbVY1TVRNMFVpdGxjMVJvWlV4VlhDOVpiRmhpYVdaR2JXWmxOVFVpTENKdFlXTWlPaUl4Wm1SaVkyWmlZVEpqTjJNd1pESmtPRFE1TW1NMllqbGxOR1kzWkRaaFpqZzVPVFJsTXpNd00yRXlaRFV5TnpkaU5HVTNNelZrWVRka1lUTm1PREF5SW4wPQ==', 1426941057),
('9d73b7b66f21af97ddc69497eb9d106490d06793', 'ZXlKcGRpSTZJbXBjTHpkTmNrTm5PRE14VG5ZclMwSXlhR2RhWkZoUlBUMGlMQ0oyWVd4MVpTSTZJbWwwV0V4RldrSmtOSHBYYVc1bE1YazJNekJIWVhVeFluRjVZek5GVUdSTFFVTk9kMUE0WmxZMVYydG5Za2RFZEhka2NXVXJhV0ZQUWxGUmQycDFLMUJ1TkZCQ1ExcFFRamR2V25aRVdsRTVXbmhGUmpOM1Nsd3ZOVEF4WWpsMFZHaHJaMGdyVFZoR2VHRnBjVzgzWWpreGJUbHJOV042UkZ3dmVpdFpjbFZUYzAxeGQxQmFSV1JFWXpaY0wybDFWamgwVGpFMWRrc3hNbWQ0ZEdsSVRsWmtWVmxGVWxsU2VHWTRTbk5JWkdOaU9WQm9kWEZVYW1SbVUweHRjazFJSzFkVVZHaDZVSFZxTWpGR2IyOWNMMUZGU2s5cmRVWmllV04yWm5CclkzSkNjSGhQUTFCMWNGUjFhMHB4V1ZOU1Mxd3ZWbWxMVEVWS2RVbExOMjR5YTJkWU5sSktOazAwZEVSSU5FUlBSbmM0WjNOUVEyVm5NR2xKTURGWE9FUkJORkZuTWtReVIyazJOMmRSTjBOMmJERnFXbW8zYW1SV2FqRm1YQzlFYlZwYVJ6ZFVNakpHWWpCeVRqWTNRbnAwWjNKb05VdElOVFpWY2s5dVYzVlFabTVRUWtKd01WVm5iVE50YjFKNFdFTllZV2RKVFZrM00ycEJSMnAwSzNSYVNXRlhjbTVZYVVaTWIwUk5TRmN5T0ZsTUswZEZWVEFyYldaS05GRTlQU0lzSW0xaFl5STZJalUyT0RSaVpXUTVaVGN6TXprMU9ERm1ZV0psTXpZeFpqUmpabVkwT1RJeE1qZ3dZV0ZtTXpSaE5qRmpORE5qTVdOak9EWmpPV0ZqTlROa05qRXpNemNpZlE9PQ==', 1426948306);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hossein Jabbari', 'mr.hhkj@gmail.com', '$2y$10$snzoiPWn.PqZKOKIa99OlOju.4sPlS.kdTA0fvO6h.HowBh6xPSG.', 'zrUvLpo9ZucIBkPO9fMwTCrXDg1RBjcvSunuN7s9woTvABVSdt8FQaYrC8Zx', '2015-01-31 21:19:07', '2015-01-31 21:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
 ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `language` (`language`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
