-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 06:58 AM
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
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'category',
  `status` int(1) NOT NULL DEFAULT '0',
  `access_level` int(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `subtitle`, `intro`, `quote`, `quote_author`, `description`, `image_id`, `video_id`, `parent_id`, `slug`, `language`, `order`, `created_at`, `updated_at`, `type`, `status`, `access_level`, `user_id`) VALUES
(1, 'Portfolio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Portfolio', 'en', 'B', '2015-04-12 05:33:53', '2015-04-12 06:50:00', 'portfolio', 1, 0, 1),
(2, 'Portfolio Sub 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Portfolio-Sub-1', 'en', 'B1', '2015-04-12 06:20:44', '2015-04-12 06:50:07', 'portfolio', 1, 0, 1),
(3, 'Portfolio Sub 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Portfolio-Sub-2', 'en', 'B2', '2015-04-12 06:21:00', '2015-04-12 06:50:11', 'portfolio', 1, 0, 1),
(4, 'Category', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Category', 'en', 'A', '2015-04-12 06:50:29', '2015-04-12 06:50:29', 'category', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_media`
--

CREATE TABLE IF NOT EXISTS `categories_media` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `item_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `item_id`, `parent_id`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(1, 'This article is full of mistakes and mistleading items. I guess Mr Jacobs went through all the events and thought what would be the greatest eye catcher to blame on Suleimani. If he was this good, they would rule all the middle east. Let me take one example. The assassination attempt on the crown prince of Saudi Arabia was and FBI farce that was to be carried out by a used car sales man who needed help blowing his nose. FBI dropped all the news items and the story just disappeared. For Harrison Jacob to claim that Suleimani hired a used car sales man who could not make a living to assassinate the Crown Prince of Saudi Arabia in the USA is beyond fiction. Business Insider should stick to business and not publish this garbage and take their readers for idiots- maybe their editors, but not their editors.', 1, NULL, '2015-04-12 05:47:18', '2015-04-12 05:47:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `quote` text COLLATE utf8_unicode_ci,
  `quote_author` text COLLATE utf8_unicode_ci,
  `image_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa',
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'item',
  `status` int(1) NOT NULL DEFAULT '0',
  `access_level` int(2) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `subtitle`, `intro`, `description`, `quote`, `quote_author`, `image_id`, `video_id`, `slug`, `created_at`, `updated_at`, `language`, `type`, `status`, `access_level`, `category_id`, `user_id`) VALUES
(1, 'Test Portfolio 1', 'Et harum quidem rerum facilis est et expedita distinctio.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '<div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem. Fusce varius nibh faucibus felis sagittis eleifend.<br><br>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Sed posuere, nulla gravida sollicitudin facilisis, neque\r\n ex faucibus nisi, eu pellentesque dolor ipsum luctus massa. Curabitur a\r\n massa fringilla, accumsan nunc et, egestas ipsum. Curabitur sed feugiat\r\n ligula. Etiam turpis quam, aliquam a mauris et, rhoncus consequat \r\nrisus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n\r\nMauris vulputate maximus iaculis. Morbi ullamcorper nunc massa, vel \r\nvolutpat diam posuere vel.<br><br>Mauris efficitur eros ante, sit amet \r\nporttitor nisl mollis eget. Praesent condimentum, ligula quis feugiat \r\nimperdiet, diam lacus accumsan neque, a porttitor est dui rhoncus lacus.\r\n Suspendisse tempor ut magna vel consequat.<br><br>In vulputate leo eget enim \r\niaculis tincidunt. Curabitur ac tempus enim, nec faucibus nunc. Morbi \r\nvitae porttitor dui. Pellentesque hendrerit mollis lectus et porttitor. \r\nNulla pharetra at felis at gravida. Nullam ornare egestas lacus vitae \r\nfaucibus. Fusce pellentesque viverra sem. Morbi nec massa metus. Aenean \r\nconsequat felis at ipsum fringilla, sit amet dignissim nisi interdum. \r\nAliquam euismod tortor sed sem tempus tempor.\r\n\r\n\r\nVestibulum vitae ligula sed neque eleifend posuere. Curabitur fringilla \r\nlaoreet mattis. Aenean lacinia, nunc ut ornare ultrices, velit ligula \r\nblandit ex, sit amet ullamcorper ligula lacus tempus odio. Quisque eu \r\ncursus tortor. Morbi non leo consequat, dictum nunc quis, elementum mi.<br><br>Aenean vitae ante euismod, sagittis dolor vitae, varius risus. Sed \r\nmattis velit erat, eu gravida est sagittis ac. Ut aliquam consequat est,\r\n a elementum risus rutrum eget. Duis ut pellentesque tortor.\r\n\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Quisque \r\nlacinia mollis lacus, vel vehicula odio tincidunt a. Nullam sagittis \r\nurna libero, eget congue felis varius quis. Donec quam enim, \r\nsollicitudin id blandit non, scelerisque sit amet quam. Donec sed \r\nmaximus erat. Etiam posuere ut lacus a ultrices.<br><br>Class aptent taciti \r\nsociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. \r\nPraesent ut odio dui. Fusce ac rhoncus lorem, quis auctor sapien. \r\nPellentesque porttitor turpis eget felis maximus tristique.\r\n\r\n<span>\r\nPraesent vel tristique erat, in egestas tortor. Cras sed nisl venenatis \r\nturpis faucibus congue. Sed blandit hendrerit purus, eu auctor odio \r\npulvinar a. Nullam venenatis nisl felis, eget fermentum nunc lacinia ut.<br><br>Pellentesque porta nisl eget libero semper rutrum et eu quam. Cras non \r\nodio luctus, placerat ex sit amet, gravida nisi.<br><br>Donec et ex nec tortor \r\nvenenatis ultrices. Phasellus aliquam tellus consequat lacus sodales \r\ngravida. Nam ullamcorper tempor neque sit amet gravida. Cras nec cursus \r\nligula.\r\n</span></div>', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'A very well known client of ours', 3, NULL, 'Test-Portfolio-1', '2015-04-12 05:45:14', '2015-04-12 06:39:55', 'en', 'portfolio', 1, 1, 2, 1),
(2, 'Test Portfolio 2', 'Et harum quidem rerum facilis est et expedita distinctio, et harum quidem rerum facilis est et expedita distinctio.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', '<div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem. Fusce varius nibh faucibus felis sagittis eleifend.<br><br>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Sed posuere, nulla gravida sollicitudin facilisis, neque\r\n ex faucibus nisi, eu pellentesque dolor ipsum luctus massa. Curabitur a\r\n massa fringilla, accumsan nunc et, egestas ipsum. Curabitur sed feugiat\r\n ligula. Etiam turpis quam, aliquam a mauris et, rhoncus consequat \r\nrisus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n\r\nMauris vulputate maximus iaculis. Morbi ullamcorper nunc massa, vel \r\nvolutpat diam posuere vel.<br><br>Mauris efficitur eros ante, sit amet \r\nporttitor nisl mollis eget. Praesent condimentum, ligula quis feugiat \r\nimperdiet, diam lacus accumsan neque, a porttitor est dui rhoncus lacus.\r\n Suspendisse tempor ut magna vel consequat.<br><br>In vulputate leo eget enim \r\niaculis tincidunt. Curabitur ac tempus enim, nec faucibus nunc. Morbi \r\nvitae porttitor dui. Pellentesque hendrerit mollis lectus et porttitor. \r\nNulla pharetra at felis at gravida. Nullam ornare egestas lacus vitae \r\nfaucibus. Fusce pellentesque viverra sem. Morbi nec massa metus. Aenean \r\nconsequat felis at ipsum fringilla, sit amet dignissim nisi interdum. \r\nAliquam euismod tortor sed sem tempus tempor.\r\n\r\n\r\nVestibulum vitae ligula sed neque eleifend posuere. Curabitur fringilla \r\nlaoreet mattis. Aenean lacinia, nunc ut ornare ultrices, velit ligula \r\nblandit ex, sit amet ullamcorper ligula lacus tempus odio. Quisque eu \r\ncursus tortor. Morbi non leo consequat, dictum nunc quis, elementum mi.<br><br>Aenean vitae ante euismod, sagittis dolor vitae, varius risus. Sed \r\nmattis velit erat, eu gravida est sagittis ac. Ut aliquam consequat est,\r\n a elementum risus rutrum eget. Duis ut pellentesque tortor.\r\n\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Quisque \r\nlacinia mollis lacus, vel vehicula odio tincidunt a. Nullam sagittis \r\nurna libero, eget congue felis varius quis. Donec quam enim, \r\nsollicitudin id blandit non, scelerisque sit amet quam. Donec sed \r\nmaximus erat. Etiam posuere ut lacus a ultrices.<br><br>Class aptent taciti \r\nsociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. \r\nPraesent ut odio dui. Fusce ac rhoncus lorem, quis auctor sapien. \r\nPellentesque porttitor turpis eget felis maximus tristique.\r\n\r\n<span>\r\nPraesent vel tristique erat, in egestas tortor. Cras sed nisl venenatis \r\nturpis faucibus congue. Sed blandit hendrerit purus, eu auctor odio \r\npulvinar a. Nullam venenatis nisl felis, eget fermentum nunc lacinia ut.<br><br>Pellentesque porta nisl eget libero semper rutrum et eu quam. Cras non \r\nodio luctus, placerat ex sit amet, gravida nisi.<br><br>Donec et ex nec tortor \r\nvenenatis ultrices. Phasellus aliquam tellus consequat lacus sodales \r\ngravida. Nam ullamcorper tempor neque sit amet gravida. Cras nec cursus \r\nligula.\r\n</span></div><br>', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'A new client', 4, NULL, 'Test-Portfolio-2', '2015-04-12 06:03:58', '2015-04-12 06:39:57', 'en', 'portfolio', 1, 1, 2, 1),
(3, 'Test Portfolio 3', NULL, 'Et harum quidem rerum facilis est et expedita distinctio, et harum quidem rerum facilis est et expedita distinctio.', '<div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem. Fusce varius nibh faucibus felis sagittis eleifend.</div><br>', '"Lorem ipsum dolor sit at enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'CEO of example company', 2, NULL, 'Test-Portfolio-3', '2015-04-12 06:17:40', '2015-04-12 06:52:19', 'en', 'portfolio', 1, 1, 3, 1),
(4, 'Test Portfolio 4', ' Praesent vel tristique erat, in egestas tortor. Cras sed nisl venenatis turpis faucibus congue.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, nulla gravida sollicitudin facilisis, neque ex faucibus nisi, eu pellentesque dolor ipsum luctus massa. Curabitur a massa fringilla, accumsan nunc et.', '<div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem. Fusce varius nibh faucibus felis sagittis eleifend.<br><br>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Sed posuere, nulla gravida sollicitudin facilisis, neque\r\n ex faucibus nisi, eu pellentesque dolor ipsum luctus massa. Curabitur a\r\n massa fringilla, accumsan nunc et, egestas ipsum. Curabitur sed feugiat\r\n ligula. Etiam turpis quam, aliquam a mauris et, rhoncus consequat \r\nrisus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n\r\nMauris vulputate maximus iaculis. Morbi ullamcorper nunc massa, vel \r\nvolutpat diam posuere vel.<br><br>Mauris efficitur eros ante, sit amet \r\nporttitor nisl mollis eget. Praesent condimentum, ligula quis feugiat \r\nimperdiet, diam lacus accumsan neque, a porttitor est dui rhoncus lacus.\r\n Suspendisse tempor ut magna vel consequat.<br><br>In vulputate leo eget enim \r\niaculis tincidunt. Curabitur ac tempus enim, nec faucibus nunc. Morbi \r\nvitae porttitor dui. Pellentesque hendrerit mollis lectus et porttitor. \r\nNulla pharetra at felis at gravida. Nullam ornare egestas lacus vitae \r\nfaucibus. Fusce pellentesque viverra sem. Morbi nec massa metus. Aenean \r\nconsequat felis at ipsum fringilla, sit amet dignissim nisi interdum. \r\nAliquam euismod tortor sed sem tempus tempor.\r\n\r\n\r\nVestibulum vitae ligula sed neque eleifend posuere. Curabitur fringilla \r\nlaoreet mattis. Aenean lacinia, nunc ut ornare ultrices, velit ligula \r\nblandit ex, sit amet ullamcorper ligula lacus tempus odio. Quisque eu \r\ncursus tortor. Morbi non leo consequat, dictum nunc quis, elementum mi.<br><br>Aenean vitae ante euismod, sagittis dolor vitae, varius risus. Sed \r\nmattis velit erat, eu gravida est sagittis ac. Ut aliquam consequat est,\r\n a elementum risus rutrum eget. Duis ut pellentesque tortor.\r\n\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Quisque \r\nlacinia mollis lacus, vel vehicula odio tincidunt a. Nullam sagittis \r\nurna libero, eget congue felis varius quis. Donec quam enim, \r\nsollicitudin id blandit non, scelerisque sit amet quam. Donec sed \r\nmaximus erat. Etiam posuere ut lacus a ultrices.<br><br>Class aptent taciti \r\nsociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. \r\nPraesent ut odio dui. Fusce ac rhoncus lorem, quis auctor sapien. \r\nPellentesque porttitor turpis eget felis maximus tristique.\r\n\r\n<span>\r\nPraesent vel tristique erat, in egestas tortor. Cras sed nisl venenatis \r\nturpis faucibus congue. Sed blandit hendrerit purus, eu auctor odio \r\npulvinar a. Nullam venenatis nisl felis, eget fermentum nunc lacinia ut.<br><br>Pellentesque porta nisl eget libero semper rutrum et eu quam. Cras non \r\nodio luctus, placerat ex sit amet, gravida nisi.<br><br>Donec et ex nec tortor \r\nvenenatis ultrices. Phasellus aliquam tellus consequat lacus sodales \r\ngravida. Nam ullamcorper tempor neque sit amet gravida. Cras nec cursus \r\nligula.<br></span><div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem. Fusce varius nibh faucibus felis sagittis eleifend.<br><br>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Sed posuere, nulla gravida sollicitudin facilisis, neque\r\n ex faucibus nisi, eu pellentesque dolor ipsum luctus massa. Curabitur a\r\n massa fringilla, accumsan nunc et, egestas ipsum. Curabitur sed feugiat\r\n ligula. Etiam turpis quam, aliquam a mauris et, rhoncus consequat \r\nrisus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n\r\nMauris vulputate maximus iaculis. Morbi ullamcorper nunc massa, vel \r\nvolutpat diam posuere vel.<br><br>Mauris efficitur eros ante, sit amet \r\nporttitor nisl mollis eget. Praesent condimentum, ligula quis feugiat \r\nimperdiet, diam lacus accumsan neque, a porttitor est dui rhoncus lacus.\r\n Suspendisse tempor ut magna vel consequat.<br><br>In vulputate leo eget enim \r\niaculis tincidunt. Curabitur ac tempus enim, nec faucibus nunc. Morbi \r\nvitae porttitor dui. Pellentesque hendrerit mollis lectus et porttitor. \r\nNulla pharetra at felis at gravida. Nullam ornare egestas lacus vitae \r\nfaucibus. Fusce pellentesque viverra sem. Morbi nec massa metus. Aenean \r\nconsequat felis at ipsum fringilla, sit amet dignissim nisi interdum. \r\nAliquam euismod tortor sed sem tempus tempor.\r\n\r\n\r\nVestibulum vitae ligula sed neque eleifend posuere. Curabitur fringilla \r\nlaoreet mattis. Aenean lacinia, nunc ut ornare ultrices, velit ligula \r\nblandit ex, sit amet ullamcorper ligula lacus tempus odio. Quisque eu \r\ncursus tortor. Morbi non leo consequat, dictum nunc quis, elementum mi.<br><br>Aenean vitae ante euismod, sagittis dolor vitae, varius risus. Sed \r\nmattis velit erat, eu gravida est sagittis ac. Ut aliquam consequat est,\r\n a elementum risus rutrum eget. Duis ut pellentesque tortor.\r\n\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Quisque \r\nlacinia mollis lacus, vel vehicula odio tincidunt a. Nullam sagittis \r\nurna libero, eget congue felis varius quis. Donec quam enim, \r\nsollicitudin id blandit non, scelerisque sit amet quam. Donec sed \r\nmaximus erat. Etiam posuere ut lacus a ultrices.<br><br>Class aptent taciti \r\nsociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. \r\nPraesent ut odio dui. Fusce ac rhoncus lorem, quis auctor sapien. \r\nPellentesque porttitor turpis eget felis maximus tristique.\r\n\r\n<span>\r\nPraesent vel tristique erat, in egestas tortor. Cras sed nisl venenatis \r\nturpis faucibus congue. Sed blandit hendrerit purus, eu auctor odio \r\npulvinar a. Nullam venenatis nisl felis, eget fermentum nunc lacinia ut.<br><br>Pellentesque porta nisl eget libero semper rutrum et eu quam. Cras non \r\nodio luctus, placerat ex sit amet, gravida nisi.<br><br>Donec et ex nec tortor \r\nvenenatis ultrices. Phasellus aliquam tellus consequat lacus sodales \r\ngravida. Nam ullamcorper tempor neque sit amet gravida. Cras nec cursus \r\nligula.\r\n</span></div><br></div><br><br>', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'Project Co-ordinator of CNNi', 1, NULL, 'Test-Portfolio-4', '2015-04-12 06:18:08', '2015-04-12 06:52:43', 'en', 'portfolio', 1, 1, 3, 1),
(5, 'Test Portfolio 5', NULL, NULL, '<div>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis \r\nturpis sem. Suspendisse nec ante leo. Ut metus tellus, tempus vel libero\r\n sit amet, iaculis egestas nisi. Donec at nunc sagittis, aliquet eros \r\nac, blandit arcu. Curabitur erat mauris, elementum et pellentesque vel, \r\ncongue at lorem.</div><br>', NULL, NULL, 5, NULL, 'Test-Portfolio-5', '2015-04-12 06:24:56', '2015-04-12 06:39:52', 'en', 'portfolio', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_media`
--

CREATE TABLE IF NOT EXISTS `item_media` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `item_media`
--

INSERT INTO `item_media` (`id`, `item_id`, `media_id`, `updated_at`, `created_at`) VALUES
(25, 1, 1, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(26, 1, 2, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(27, 1, 4, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(28, 1, 5, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(29, 2, 5, '2015-04-12 06:40:59', '2015-04-12 06:40:59'),
(30, 2, 1, '2015-04-12 06:40:59', '2015-04-12 06:40:59'),
(31, 2, 3, '2015-04-12 06:40:59', '2015-04-12 06:40:59'),
(36, 5, 2, '2015-04-12 06:41:22', '2015-04-12 06:41:22'),
(37, 5, 4, '2015-04-12 06:41:22', '2015-04-12 06:41:22'),
(38, 3, 1, '2015-04-12 06:52:19', '2015-04-12 06:52:19'),
(39, 3, 3, '2015-04-12 06:52:19', '2015-04-12 06:52:19'),
(40, 4, 4, '2015-04-12 06:52:43', '2015-04-12 06:52:43'),
(41, 4, 5, '2015-04-12 06:52:43', '2015-04-12 06:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `item_tag`
--

CREATE TABLE IF NOT EXISTS `item_tag` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `item_tag`
--

INSERT INTO `item_tag` (`id`, `item_id`, `tag_id`, `updated_at`, `created_at`) VALUES
(47, 1, 9, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(48, 1, 10, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(49, 1, 13, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(50, 1, 11, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(51, 1, 12, '2015-04-12 06:39:55', '2015-04-12 06:39:55'),
(55, 2, 12, '2015-04-12 06:40:59', '2015-04-12 06:40:59'),
(58, 5, 6, '2015-04-12 06:41:22', '2015-04-12 06:41:22'),
(59, 3, 12, '2015-04-12 06:52:19', '2015-04-12 06:52:19'),
(60, 4, 5, '2015-04-12 06:52:43', '2015-04-12 06:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `item_view`
--

CREATE TABLE IF NOT EXISTS `item_view` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=129 ;

--
-- Dumping data for table `item_view`
--

INSERT INTO `item_view` (`id`, `item_id`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2015-04-12 05:45:28', '2015-04-12 05:45:28'),
(2, 1, 1, '2015-04-12 05:46:22', '2015-04-12 05:46:22'),
(3, 1, 1, '2015-04-12 05:46:39', '2015-04-12 05:46:39'),
(4, 1, 1, '2015-04-12 05:46:50', '2015-04-12 05:46:50'),
(5, 1, 1, '2015-04-12 05:47:02', '2015-04-12 05:47:02'),
(6, 1, 1, '2015-04-12 05:47:19', '2015-04-12 05:47:19'),
(7, 1, 1, '2015-04-12 05:47:31', '2015-04-12 05:47:31'),
(8, 1, 1, '2015-04-12 05:52:40', '2015-04-12 05:52:40'),
(9, 1, 1, '2015-04-12 06:01:22', '2015-04-12 06:01:22'),
(10, 1, 1, '2015-04-12 06:01:27', '2015-04-12 06:01:27'),
(11, 1, 1, '2015-04-12 06:01:39', '2015-04-12 06:01:39'),
(12, 1, 1, '2015-04-12 06:02:35', '2015-04-12 06:02:35'),
(13, 2, 1, '2015-04-12 06:04:27', '2015-04-12 06:04:27'),
(14, 1, 1, '2015-04-12 06:04:31', '2015-04-12 06:04:31'),
(15, 1, 1, '2015-04-12 06:04:39', '2015-04-12 06:04:39'),
(16, 1, 1, '2015-04-12 06:04:44', '2015-04-12 06:04:44'),
(17, 1, 1, '2015-04-12 06:05:53', '2015-04-12 06:05:53'),
(18, 1, 1, '2015-04-12 06:06:13', '2015-04-12 06:06:13'),
(19, 1, 1, '2015-04-12 06:06:35', '2015-04-12 06:06:35'),
(20, 1, 1, '2015-04-12 06:07:29', '2015-04-12 06:07:29'),
(21, 1, 1, '2015-04-12 06:07:42', '2015-04-12 06:07:42'),
(22, 1, 1, '2015-04-12 06:08:13', '2015-04-12 06:08:13'),
(23, 1, 1, '2015-04-12 06:08:46', '2015-04-12 06:08:46'),
(24, 1, 1, '2015-04-12 06:09:05', '2015-04-12 06:09:05'),
(25, 1, 1, '2015-04-12 06:09:14', '2015-04-12 06:09:14'),
(26, 1, 1, '2015-04-12 06:09:25', '2015-04-12 06:09:25'),
(27, 1, 1, '2015-04-12 06:09:29', '2015-04-12 06:09:29'),
(28, 1, 1, '2015-04-12 06:09:43', '2015-04-12 06:09:43'),
(29, 1, 1, '2015-04-12 06:09:47', '2015-04-12 06:09:47'),
(30, 1, 1, '2015-04-12 06:10:28', '2015-04-12 06:10:28'),
(31, 1, 1, '2015-04-12 06:10:38', '2015-04-12 06:10:38'),
(32, 1, 1, '2015-04-12 06:11:12', '2015-04-12 06:11:12'),
(33, 1, 1, '2015-04-12 06:11:50', '2015-04-12 06:11:50'),
(34, 1, 1, '2015-04-12 06:12:09', '2015-04-12 06:12:09'),
(35, 1, 1, '2015-04-12 06:12:27', '2015-04-12 06:12:27'),
(36, 1, 1, '2015-04-12 06:12:34', '2015-04-12 06:12:34'),
(37, 1, 1, '2015-04-12 06:12:39', '2015-04-12 06:12:39'),
(38, 1, 1, '2015-04-12 06:12:42', '2015-04-12 06:12:42'),
(39, 1, 1, '2015-04-12 06:12:46', '2015-04-12 06:12:46'),
(40, 1, 1, '2015-04-12 06:12:51', '2015-04-12 06:12:51'),
(41, 1, 1, '2015-04-12 06:13:19', '2015-04-12 06:13:19'),
(42, 1, 1, '2015-04-12 06:13:23', '2015-04-12 06:13:23'),
(43, 1, 1, '2015-04-12 06:13:27', '2015-04-12 06:13:27'),
(44, 1, 1, '2015-04-12 06:13:29', '2015-04-12 06:13:29'),
(45, 1, 1, '2015-04-12 06:13:47', '2015-04-12 06:13:47'),
(46, 1, 1, '2015-04-12 06:13:59', '2015-04-12 06:13:59'),
(47, 1, 1, '2015-04-12 06:14:10', '2015-04-12 06:14:10'),
(48, 1, 1, '2015-04-12 06:14:20', '2015-04-12 06:14:20'),
(49, 1, 1, '2015-04-12 06:14:27', '2015-04-12 06:14:27'),
(50, 1, 1, '2015-04-12 06:14:49', '2015-04-12 06:14:49'),
(51, 1, 1, '2015-04-12 06:15:08', '2015-04-12 06:15:08'),
(52, 1, 1, '2015-04-12 06:15:17', '2015-04-12 06:15:17'),
(53, 1, 1, '2015-04-12 06:16:36', '2015-04-12 06:16:36'),
(54, 1, 1, '2015-04-12 06:16:42', '2015-04-12 06:16:42'),
(55, 1, 1, '2015-04-12 06:16:45', '2015-04-12 06:16:45'),
(56, 1, 1, '2015-04-12 06:16:51', '2015-04-12 06:16:51'),
(57, 1, 1, '2015-04-12 06:16:59', '2015-04-12 06:16:59'),
(58, 1, 1, '2015-04-12 06:17:41', '2015-04-12 06:17:41'),
(59, 1, 1, '2015-04-12 06:18:09', '2015-04-12 06:18:09'),
(60, 1, 1, '2015-04-12 06:18:32', '2015-04-12 06:18:32'),
(61, 1, 1, '2015-04-12 06:18:37', '2015-04-12 06:18:37'),
(62, 1, 1, '2015-04-12 06:19:26', '2015-04-12 06:19:26'),
(63, 4, 1, '2015-04-12 06:19:30', '2015-04-12 06:19:30'),
(64, 3, 1, '2015-04-12 06:19:33', '2015-04-12 06:19:33'),
(65, 2, 1, '2015-04-12 06:19:35', '2015-04-12 06:19:35'),
(66, 1, 1, '2015-04-12 06:19:39', '2015-04-12 06:19:39'),
(67, 3, 1, '2015-04-12 06:19:50', '2015-04-12 06:19:50'),
(68, 2, 1, '2015-04-12 06:19:54', '2015-04-12 06:19:54'),
(69, 3, 1, '2015-04-12 06:19:57', '2015-04-12 06:19:57'),
(70, 5, 1, '2015-04-12 06:25:21', '2015-04-12 06:25:21'),
(71, 5, 1, '2015-04-12 06:25:26', '2015-04-12 06:25:26'),
(72, 5, 1, '2015-04-12 06:27:35', '2015-04-12 06:27:35'),
(73, 5, 1, '2015-04-12 06:28:56', '2015-04-12 06:28:56'),
(74, 1, 1, '2015-04-12 06:29:09', '2015-04-12 06:29:09'),
(75, 1, 1, '2015-04-12 06:29:21', '2015-04-12 06:29:21'),
(76, 1, 1, '2015-04-12 06:29:27', '2015-04-12 06:29:27'),
(77, 1, 1, '2015-04-12 06:29:29', '2015-04-12 06:29:29'),
(78, 1, 1, '2015-04-12 06:29:44', '2015-04-12 06:29:44'),
(79, 1, 1, '2015-04-12 06:29:48', '2015-04-12 06:29:48'),
(80, 1, 1, '2015-04-12 06:30:26', '2015-04-12 06:30:26'),
(81, 1, 1, '2015-04-12 06:31:04', '2015-04-12 06:31:04'),
(82, 1, 1, '2015-04-12 06:31:07', '2015-04-12 06:31:07'),
(83, 1, 1, '2015-04-12 06:31:10', '2015-04-12 06:31:10'),
(84, 1, 1, '2015-04-12 06:31:15', '2015-04-12 06:31:15'),
(85, 5, 1, '2015-04-12 06:31:22', '2015-04-12 06:31:22'),
(86, 5, 1, '2015-04-12 06:31:25', '2015-04-12 06:31:25'),
(87, 5, 1, '2015-04-12 06:31:28', '2015-04-12 06:31:28'),
(88, 5, 1, '2015-04-12 06:31:32', '2015-04-12 06:31:32'),
(89, 5, 1, '2015-04-12 06:31:35', '2015-04-12 06:31:35'),
(90, 5, 1, '2015-04-12 06:31:53', '2015-04-12 06:31:53'),
(91, 5, 1, '2015-04-12 06:31:57', '2015-04-12 06:31:57'),
(92, 5, 1, '2015-04-12 06:32:08', '2015-04-12 06:32:08'),
(93, 5, 1, '2015-04-12 06:32:12', '2015-04-12 06:32:12'),
(94, 5, 1, '2015-04-12 06:32:18', '2015-04-12 06:32:18'),
(95, 5, 1, '2015-04-12 06:32:42', '2015-04-12 06:32:42'),
(96, 1, 1, '2015-04-12 06:40:29', '2015-04-12 06:40:29'),
(97, 5, 1, '2015-04-12 06:40:39', '2015-04-12 06:40:39'),
(98, 5, 1, '2015-04-12 06:41:28', '2015-04-12 06:41:28'),
(99, 4, 1, '2015-04-12 06:41:39', '2015-04-12 06:41:39'),
(100, 5, 1, '2015-04-12 06:41:43', '2015-04-12 06:41:43'),
(101, 4, 1, '2015-04-12 06:41:44', '2015-04-12 06:41:44'),
(102, 3, 1, '2015-04-12 06:41:45', '2015-04-12 06:41:45'),
(103, 2, 1, '2015-04-12 06:41:51', '2015-04-12 06:41:51'),
(104, 1, 1, '2015-04-12 06:41:53', '2015-04-12 06:41:53'),
(105, 1, 1, '2015-04-12 06:43:25', '2015-04-12 06:43:25'),
(106, 1, 1, '2015-04-12 06:43:32', '2015-04-12 06:43:32'),
(107, 1, 1, '2015-04-12 06:43:44', '2015-04-12 06:43:44'),
(108, 1, 1, '2015-04-12 06:43:58', '2015-04-12 06:43:58'),
(109, 1, 1, '2015-04-12 06:44:01', '2015-04-12 06:44:01'),
(110, 1, 1, '2015-04-12 06:44:06', '2015-04-12 06:44:06'),
(111, 4, 1, '2015-04-12 06:44:20', '2015-04-12 06:44:20'),
(112, 3, 1, '2015-04-12 06:44:24', '2015-04-12 06:44:24'),
(113, 3, 1, '2015-04-12 06:44:39', '2015-04-12 06:44:39'),
(114, 3, 1, '2015-04-12 06:44:44', '2015-04-12 06:44:44'),
(115, 1, 1, '2015-04-12 06:44:55', '2015-04-12 06:44:55'),
(116, 5, 1, '2015-04-12 06:45:05', '2015-04-12 06:45:05'),
(117, 1, 1, '2015-04-12 06:45:11', '2015-04-12 06:45:11'),
(118, 4, 1, '2015-04-12 06:52:53', '2015-04-12 06:52:53'),
(119, 4, 1, '2015-04-12 06:52:54', '2015-04-12 06:52:54'),
(120, 4, 1, '2015-04-12 06:52:54', '2015-04-12 06:52:54'),
(121, 4, 1, '2015-04-12 06:52:54', '2015-04-12 06:52:54'),
(122, 4, 1, '2015-04-12 06:52:55', '2015-04-12 06:52:55'),
(123, 4, 1, '2015-04-12 06:52:55', '2015-04-12 06:52:55'),
(124, 4, 1, '2015-04-12 06:52:55', '2015-04-12 06:52:55'),
(125, 4, 1, '2015-04-12 06:52:56', '2015-04-12 06:52:56'),
(126, 4, 1, '2015-04-12 06:52:57', '2015-04-12 06:52:57'),
(127, 5, 1, '2015-04-12 06:53:46', '2015-04-12 06:53:46'),
(128, 5, 1, '2015-04-12 06:53:59', '2015-04-12 06:53:59');

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
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(11) NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img',
  `url` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `url`, `title`, `updated_at`, `created_at`, `user_id`) VALUES
(1, 'img', '10121428816670.jpg', 'Cats', '2015-04-12 05:31:25', '2015-04-12 05:31:25', 1),
(2, 'img', '60651428816700.jpg', 'Blue', '2015-04-12 05:31:55', '2015-04-12 05:31:55', 1),
(3, 'img', '43751428816727.jpg', 'Nature', '2015-04-12 05:32:24', '2015-04-12 05:32:24', 1),
(4, 'img', '66571428816755.jpg', 'Duck', '2015-04-12 05:32:44', '2015-04-12 05:32:44', 1),
(5, 'img', '93501428816776.jpg', 'Space', '2015-04-12 05:33:03', '2015-04-12 05:33:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

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
('32b95f958bfd1b08f8707a54801c753fb66d7e17', 'ZXlKcGRpSTZJa3A2ZVVsNlZGUktOMUV3U0cxd1ZrSlVTbWhvWTBFOVBTSXNJblpoYkhWbElqb2liamxQTlVZMVNtOVRNMUZtV1RadVJVdGxWbVVyTVhoT0sxUTRNR0l5Vm14UGRsaHJUV3B4TlRKMlFWRTFSVEZKVEZOVk5GVjZaVEpDWnpaV01HUnpabTQzVWxOUWVHeHhXR3REUlRoY0wzcFZZa1JQYTNGVFRUZHNYQzh3ZW1zMWRWZDBPSGRDV1VnNGRWTnRWV042Wm5KaFlsQTRjakJ5T1VGV1dtcHFOakZ3Tkd4V2IwdHlSM05PZUV0cVNYRnRNMGxyYTNoNlpVYzFUVE5yVDBsbVdYaGxjazFWTkdoY0wwdEJVQ3N4U1dsVFpXMXZiVkJLVERCcGVtNWphRFJPU0ZVcmJXdEtiblpRZFVaRGFqTnNWRWRNWW10VFVVUjNiekY1UldONU5FWnlRemhoTlhSV0szQktTRGN3VG5KVWNsRkJabUZDU3pKdk4yeE9lR2R6TWxCc1VWSTVOM2hoV1U1b2NXTnBSMVZJWWl0c2RYTmtOVnd2ZFhwVmVVd3JjMUZ5TkhNM1pGYzNSVEZZY1hWbVdIazVhM1pwYzFnemNrSm9kVFJOVkdVMFZHWnFSVk5GTVZsMlVHa3JkMGRKUmpKUlhDOU5OVUp2Vm5KR2VrMHplRFkwTmxsMk4xcGhkM0Y0YmsxQk0wcEhWVTE0WkdZd1YyMUdNVVZrUVZnMFYyUlhRMFpLZUVacU1UTktiRFJGVjJoek4weERORFppWjJwemN6VkdlbXgyZDB4QlhDOWNMemhCU25KemVEQjZLM0kzUWxwTVVERjJNVXhXU0VobWNFMVRUV3d5U2s4aUxDSnRZV01pT2lKaE9UVmhPREF6T1ROa1l6TTJZalEyWldSaFlqRXdZVEE0TVdVeFltTTBZVEkzT0RKa01EVmxNR0ZrWVRVd01EZ3paRFkxWVRrd1pESXpNVFU0TURsbUluMD0=', 1428821804);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(10) unsigned NOT NULL,
  `tag` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'iran', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(2, 'powerful', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(3, 'nature', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(4, 'ducks', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(5, 'cats', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(6, 'space', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(7, 'beauty', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(8, 'military', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(9, 'example', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(10, 'tag', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(11, 'tags', '2015-04-12 05:45:14', '2015-04-12 05:45:14', 1),
(12, 'test', '2015-04-12 06:03:58', '2015-04-12 06:03:58', 1),
(13, 'portfolio', '2015-04-12 06:39:55', '2015-04-12 06:39:55', 1);

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
(1, 'Hossein Jabbari', 'mr.hhkj@gmail.com', '$2y$10$snzoiPWn.PqZKOKIa99OlOju.4sPlS.kdTA0fvO6h.HowBh6xPSG.', 'qJYGBqzpnfK52lrtZKjgQhhG3pEgQldhdr2JmJkirKf6tWM1YHUokFpz5hiD', '2015-01-31 21:19:07', '2015-04-06 03:41:06');

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
-- Indexes for table `categories_media`
--
ALTER TABLE `categories_media`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_media`
--
ALTER TABLE `item_media`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `item_tag`
--
ALTER TABLE `item_tag`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `item_view`
--
ALTER TABLE `item_view`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `language` (`language`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories_media`
--
ALTER TABLE `categories_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_media`
--
ALTER TABLE `item_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `item_tag`
--
ALTER TABLE `item_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `item_view`
--
ALTER TABLE `item_view`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
