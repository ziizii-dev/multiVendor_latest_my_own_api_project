-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 03:22 AM
-- Server version: 8.0.32
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `email_varified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'admin',
  `remember_token` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `auth_token` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expired_at` date DEFAULT NULL,
  `expired_date'` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_varified_at`, `password`, `photo`, `phone`, `address`, `role`, `remember_token`, `last_login`, `auth_token`, `token_expired_at`, `expired_date'`, `created_at`, `updated_at`) VALUES
(1, 'admintest', 'admintest', 'admin999@gmail.com', NULL, '$2y$10$G8cr.MYjammPRTuW40Mht.RVvva4OPBN/5/Ym2FGbDAmg9na.jDbW', 'http://192.168.2.111:9999/upload/admin_images/admintest/2023/428aece3-1471-4022-a1c5-cc231c906408.jpeg', '0909090999', 'Bagoyangon', 'admin', NULL, '2023-05-12', 'Q0dSZ2lERmUyM1JNNjhjNmdNZ09N645e00b131833', NULL, NULL, '2023-04-06 22:27:00', '2023-05-12 02:32:41'),
(3, 'kaven', 'admintest', 'kaven@mail.com', NULL, '$2y$10$SP8WC047zO9qKhml64WhLeC.1qFSGnvlyEsi7M5JTxctwpIW2pVWa', 'http://192.168.2.111:9999/upload/admin_images/kaven/2023/6f0a839f-1731-446c-8363-adea115acbe9.jpeg', '09888888888', 'bagokkk', 'admin', NULL, '2023-04-27', NULL, NULL, NULL, '2023-04-07 01:03:43', '2023-05-01 22:23:29'),
(4, 'admintest', 'admintest', 'admin8888@gmail.com', NULL, '$2y$10$G8cr.MYjammPRTuW40Mht.RVvva4OPBN/5/Ym2FGbDAmg9na.jDbW', NULL, NULL, NULL, 'admin', NULL, NULL, 'bEtYamxZY2s0Y0JZYnpYdlJHRW4y642fceef5c18e', '2023-04-14', NULL, '2023-04-07 01:36:07', '2023-04-07 01:36:07'),
(5, 'admintest', 'admintest', 'admin777@gmail.com', NULL, '$2y$10$Uz7zY3BBFvkD4Vir1EhyweKdbZuuxB3jDyPBiBlPpZw8BIHjpWwnS', NULL, NULL, NULL, 'admin', NULL, '2023-04-07', 'WUR3WXNPdDRsMEN5NW1xOHRybHpP642fd039529aa', '2023-04-14', NULL, '2023-04-07 01:41:18', '2023-04-07 01:41:37'),
(6, 'admintest', 'admintest', 'admin666@gmail.com', NULL, '$2y$10$A5mDc1ogHjvdnsZPrgBhTuJa7TrSUMHdvzlSH7c0FDzgkdMtHh42O', NULL, NULL, NULL, 'admin', NULL, '2023-04-07', NULL, NULL, NULL, '2023-04-07 01:54:18', '2023-05-01 21:02:36'),
(7, 'admintest', 'admintest', 'admin555@gmail.com', NULL, '$2y$10$kGPX6Mf1Na6FNG8Bgu5mtOa/Fu/f5lvYeZsUQfhToKQQ4uoRnCAw6', NULL, NULL, NULL, 'admin', NULL, '2023-05-02', 'ZDlhTmxJNlZqU3ZzTHEwOEVVSWVo645083723bbc5', '2023-04-14', NULL, '2023-04-07 09:18:45', '2023-05-01 20:58:50'),
(8, 'admintest', 'admintest', 'admin899@gmail.com', NULL, '$2y$10$MFSLK/QxyQhFpKqRz4l2cegV1sCfgeCwzUJA325t6WV/asexjQLGu', NULL, NULL, NULL, 'admin', NULL, NULL, 'NjNncUszbVlSemhBRWl5VUNoVUk4643f5c349a80d', '2023-04-26', NULL, '2023-04-18 20:42:52', '2023-04-18 20:42:52'),
(9, 'admintest', 'admintest', 'adtest@gmail.com', NULL, '$2y$10$TaS1cC.2UXMqK6AZ6ixOTuj3rPKgfssUpBdKMOxBc/yW.NwcZx4yW', NULL, NULL, NULL, 'admin', NULL, '2023-04-19', 'YkRCRnBTZFA4R21IVkRyU2tGYzhK643f5d4e43d51', '2023-04-26', NULL, '2023-04-18 20:45:16', '2023-04-18 20:47:34'),
(11, 'admintest123', 'admintest123', 'aungthawhtetnaing1@gmail.com', NULL, '$2y$10$2XUUh0B.QNla3EWn2ZybVOHNlt1rNoqho4GdmXPOKbZP3Lj.im8J.', NULL, NULL, NULL, 'admin', NULL, NULL, 'WVNEUjRJenhqRVNFVlk2ZGhwYlB2643f63bfcfdda', '2023-04-26', NULL, '2023-04-18 21:15:03', '2023-04-18 21:15:03'),
(14, 'admintest123', 'admintest123', 'aungthawhtetnain@gmail.com', NULL, '$2y$10$/vAbKH67PpaKhAtvtfzbkO/NJ9sRM0GpOUXy6Bub4VjyNxAJK0pfe', NULL, NULL, NULL, 'admin', NULL, NULL, 'eG83SkJNTlh5YTJXRG5wVjY5NXZE643f64772081a', '2023-04-26', NULL, '2023-04-18 21:18:07', '2023-04-18 21:18:07'),
(16, 'admintest123', 'admintest123', 'aungthawhtetnai111n@gmail.com', NULL, '$2y$10$f3loxoLyZapyBJn/zQwXyulYUdyZxwZ5w4Hp2wH4hNoqzkzS40KcK', NULL, NULL, NULL, 'admin', NULL, NULL, 'ZUJPR0NTNDNwWEdDWTJTWmNBZFE1643f64b465721', '2023-04-26', NULL, '2023-04-18 21:19:08', '2023-04-18 21:19:08'),
(26, 'admintest', 'admintest', 'adtest11@gmail.com', NULL, '$2y$10$1sYJvNAiL1iJ1aQyu6K98etql2aJd9WSF.q/09gh2O77vhVUGVV2O', NULL, NULL, NULL, 'admin', NULL, NULL, 'OGtVSkFTMXZSMDlVc3BYQWxkblBw643f664b9c562', '2023-04-26', NULL, '2023-04-18 21:25:55', '2023-04-18 21:25:55'),
(30, 'admintest123', 'admintest123', 'admintest123@gmail.com', NULL, '$2y$10$NruEhE9R/RWFD7CCFqdX2O6/GxPktcaxN2xrEFsfax5GODAsy7lGS', NULL, NULL, NULL, 'admin', NULL, '2023-04-19', 'cXJMSm5KSnVxNGhkSDhLREJDVEk5643fa37024d2c', '2023-04-26', NULL, '2023-04-18 21:33:09', '2023-04-19 01:46:48'),
(31, 'admintest123', 'admintest123', 'admintest1234@gmail.com', NULL, '$2y$10$tw3vMUhhOSRgKCkLtOs6vO4s4qmLObMk.KSVAfcBefNghVt8NiRPy', NULL, NULL, NULL, 'admin', NULL, NULL, 'TzZLbFRZZkNkSnVpUTZkR1VWR3VU643f684f745d2', '2023-04-26', NULL, '2023-04-18 21:34:31', '2023-04-18 21:34:31'),
(32, 'admintest123', 'admintest123', 'aaa@gmail.com', NULL, '$2y$10$K8/7YnKHvnKOVx8nw7JiYu2P0ySwIyWOcV107d3DpV3Pt4c0RDhIK', NULL, NULL, NULL, 'admin', NULL, NULL, 'MG5wZDB5ajl1dWNQeXFPMlc1UnFG643f688f58ffa', '2023-04-26', NULL, '2023-04-18 21:35:35', '2023-04-18 21:35:35'),
(33, 'admin1234', 'admin1234', 'admin1234@gmai.com', NULL, '$2y$10$n93kXmovnAIYUW.MXpV00.mJ3gPD77wM1arkBcIZ7J5Jv8BF2OFrC', NULL, NULL, NULL, 'admin', NULL, NULL, 'Z1R4ZXdSbzc5MXFuMEE4eFNlMmtl643f6910ded57', '2023-04-26', NULL, '2023-04-18 21:37:44', '2023-04-18 21:37:44'),
(36, 'test123', 'test123', 'test123@gmail.com', NULL, '$2y$10$zmrBR0tIW9ZUwk.x96betugQZlXnvgz6UMObBzxQkHxmOo2WDAEtW', NULL, NULL, NULL, 'admin', NULL, '2023-04-24', 'TlRmMEhNemhvYnNPcHdOdmRZeU9x6445f24d685e1', '2023-04-26', NULL, '2023-04-18 21:45:27', '2023-04-23 20:36:53'),
(38, 'test123', 'test123', 'test1234@gmail.com', NULL, '$2y$10$OKcK7UDLOkoU.r6KeUpoHevoIKBchDIQYfV4tWGs18E/OcR3gNgK2', NULL, NULL, NULL, 'admin', NULL, NULL, 'ZkNzbUJCd3VLSGpIVDd1REtKTkRS643f6ba9b6160', '2023-04-26', NULL, '2023-04-18 21:48:49', '2023-04-18 21:48:49'),
(39, 'admintest123', 'admintest123', 'aungthawhtetnaing123456@gmail.com', NULL, '$2y$10$28/l.sOyrXYqdLnJe7Z2dOjMGVa8sMzejtmpXppbochD1GTWm5Bve', NULL, NULL, NULL, 'admin', NULL, NULL, 'TVhVYjZtendPZWVrT3dVVHNTWlFJ643f6bd59ec25', '2023-04-26', NULL, '2023-04-18 21:49:33', '2023-04-18 21:49:33'),
(40, 'admintest123', 'admintest123', 'aaa123@gmail.com', NULL, '$2y$10$/.ZkYiHV9bGqG.GuiNvOEeMyjOd3PkIme9s8/mr.tEe9tBimcWFD.', NULL, NULL, NULL, 'admin', NULL, NULL, 'NnNWU0ZEc1hPQWo0UU1sa1A3RVdT643f6c1d40e41', '2023-04-26', NULL, '2023-04-18 21:50:45', '2023-04-18 21:50:45'),
(41, 'admintest123', 'admintest123', 'vvv@gmail.com', NULL, '$2y$10$9TKT3LaPVihRyZ7PqWqelewiSIj7cnGpBBYd.cJle2ujHg3bsWS7a', NULL, NULL, NULL, 'admin', NULL, NULL, 'M2RlbDV0VUhwNUlLVDFna2pIbURp643fa327408d7', '2023-04-26', NULL, '2023-04-19 01:45:35', '2023-04-19 01:45:35'),
(42, 'admintest123', 'admintest123', 'kbz@gmail.com', NULL, '$2y$10$QbOW.BPEnbulzS/lzxkdOORtnrApdWUbFu6LTXtQfFff5yHs9IAG6', NULL, NULL, NULL, 'admin', NULL, '2023-04-20', 'SFRKMFFZdVI4ZXhTQTBXNUI2WGhH6440f9a39e0ec', '2023-04-27', NULL, '2023-04-20 02:06:25', '2023-04-20 02:06:51'),
(44, 'admintest', 'admintest', 'admin7797@gmail.com', NULL, '$2y$10$1YAUMv4.wIhoyOlxseYz7OR5L0WPOpUBrysMxRweNn.IS5jzxpjLm', NULL, NULL, NULL, 'admin', NULL, NULL, 'ODJManpqOXd5Rnk5NTc0SUkyRkxW6445f0e1ef31e', '2023-05-01', NULL, '2023-04-23 20:30:49', '2023-04-23 20:30:49'),
(45, 'admin1234', 'admin1234', 'admin12345@gmail.com', NULL, '$2y$10$gqBKjqci81X9K8DNCrcy5uTSV6KryjaPioHwdAYVcVMb.H5FYLU6O', NULL, NULL, NULL, 'admin', NULL, NULL, 'dzR5STIxd0Z3U2o2eGswa0tQYlFX6446379aa16f2', '2023-05-01', NULL, '2023-04-24 01:32:34', '2023-04-24 01:32:34'),
(47, 'admintest', 'admintest', 'adtest1551@gmail.com', NULL, '$2y$10$h5ExweldbDEmrCJyQODahesrHttnHaAlOuLTJWBjnDwU1gS6bfetG', NULL, NULL, NULL, 'admin', NULL, NULL, 'cGNHNEJ5TXFidmNyTFVXRTZrWkFC644637d4d8773', '2023-05-01', NULL, '2023-04-24 01:33:32', '2023-04-24 01:33:32'),
(48, 'admintest123', 'admintest123', 'aa@gmail.com', NULL, '$2y$10$uwL47xKFMa.MZlkPiEqXDeAQ.BC1nP19nj4KUtv.g9BexZSGXKWu6', NULL, NULL, NULL, 'admin', NULL, NULL, 'bWpuODV0Mm40RGN2ZGRZQ3FpUXRx6446382cef302', '2023-05-01', NULL, '2023-04-24 01:35:00', '2023-04-24 01:35:00'),
(54, 'aungthaw', 'aungthaw', 'aungthaw@gmail.com', NULL, '$2y$10$ZI8JZgLqPz9lYXRTA6kczem74R5lOAOFXCFbWscF4IF3rLhkYcb/m', NULL, NULL, NULL, 'admin', NULL, '2023-04-25', NULL, NULL, NULL, '2023-04-25 04:09:56', '2023-04-25 04:28:31'),
(57, 'admintest', 'admintest', 'admin77@gmail.com', NULL, '$2y$10$YciaeaEz1Q11Czi/bpiBm.7QLS5UUoviUkcGbWfhH8SYllQ95w/ma', NULL, NULL, NULL, 'admin', NULL, NULL, 'am91RTRhMlBncXVWVlQ4empJdndV645082a8ec2c1', '2023-05-09', NULL, '2023-05-01 20:55:28', '2023-05-01 20:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_url`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testing', '29', 'upload/banner/1757873752793749.jpg', 1, NULL, '2023-05-12 03:27:14'),
(2, 'Foscam', 'https://www.foscam.com', 'upload/banner/1757873810964660.jpg', 1, NULL, '2023-02-15 13:31:45'),
(3, 'fuji Flim', 'http://www.fuji.com', 'http://192.168.2.111:9999/upload/banner//2023/7f3a0439-f506-4e10-a45c-77d4a2ebe94b.jpeg', 1, NULL, '2023-05-04 02:06:20'),
(4, 'admin-banner-update', 'youtube.com', 'upload/banner/1763499395029717.jpeg', 0, NULL, '2023-05-04 02:12:07'),
(5, 'as-ban-b4-update', 'http://youtube.com/', 'http://192.168.2.111:9999/upload/banner//2023/258a0c79-25ec-4231-ab64-1b050aafd44e.webp', 1, NULL, '2023-05-04 01:47:43'),
(6, 'as-ban-b4', 'http://youtube.com/', 'http://192.168.2.111:9999/upload/banner//2023/3dc80bd0-21d6-4507-9125-8e313f929e80.webp', 1, NULL, NULL),
(7, 'iphoneUpdate', 'https://www.apple.com', 'http://192.168.2.111:9999/upload/banner//2023/c5f7ea1f-1212-46e7-b1b4-db42118b56c7.jpeg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category_name`, `blog_category_slug`, `delete_status`, `created_at`, `updated_at`) VALUES
(9, 'BLOG A', 'blog-a', 1, '2023-03-28 01:58:24', NULL),
(10, 'BLOG B', 'blog-b', 1, '2023-03-28 02:00:47', NULL),
(11, 'BLOG C', 'blog-c', 1, '2023-03-28 02:00:56', NULL),
(12, 'BLOG D', 'blog-d', 1, '2023-03-28 02:01:05', NULL),
(13, 'BLOG E', 'blog-e', 1, '2023-03-28 02:01:14', NULL),
(14, 'BLOG F', 'blog-f', 1, '2023-03-28 02:12:39', '2023-03-28 02:27:07'),
(15, 'BLOG update', 'blog-update', 1, '2023-03-28 02:12:54', '2023-03-28 02:26:59'),
(16, 'adimin-update-test', 'adimin-update-test', 1, '2023-04-20 02:53:44', '2023-04-20 03:16:18'),
(17, 'ou', 'ou', 1, '2023-05-02 02:05:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `post_title`, `post_slug`, `post_image`, `post_short_description`, `post_long_description`, `delete_status`, `created_at`, `updated_at`) VALUES
(7, 9, 'BLOG POST A', 'blog-post-a', 'upload/blog/1761604691605801.jpeg', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2023-03-28 03:22:30', '2023-03-28 03:59:07'),
(8, 10, 'BLOG POST B', 'blog-post-b', 'upload/blog/1761604889942495.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>', 1, '2023-03-28 03:25:39', '2023-03-28 03:59:05'),
(9, 11, 'BLOG POST C', 'blog-post-c', 'upload/blog/1761604940637861.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</span><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</span></p>', 1, '2023-03-28 03:26:27', '2023-03-28 03:59:02'),
(10, 12, 'BLOG POST D update', 'blog-post-d-update', 'upload/blog/1761606619295649.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>', 1, '2023-03-28 03:27:16', '2023-03-28 03:58:56'),
(11, 9, 'ad-b4-update', 'ad-b4-update', 'http://192.168.2.111:9999/upload/banner//2023/7c7e1b41-41f6-4925-94e5-fa758ad161c4.webp', 'this is short', 'this is long', 1, '2023-04-20 03:34:23', '2023-04-28 23:35:20'),
(12, 9, 'ad-b4-update', 'ad-b4-update', 'http://192.168.2.111:9999/upload/banner//2023/58ee0faa-f264-4e48-9d49-cbeda79c237a.webp', 'this is short', 'this is long', 1, '2023-04-28 23:27:33', '2023-05-02 02:27:01'),
(13, 9, 'ad-64', 'ad-64', 'http://192.168.2.111:9999/upload/blog//2023/6f174887-ea96-413f-a232-de2db80caebe.webp', 'this is short', 'this is long', 1, '2023-05-02 02:21:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dd12', 'dd12', 'http://192.168.2.111:9999/upload/brand//2023/703a1339-6673-427b-9802-f5e694f2bbab.jpeg', 1, NULL, '2023-05-12 04:28:58'),
(2, 'Gucci', 'gucci', 'http://192.168.2.111:9999/upload/brand//2023/dfb82195-9868-4d5a-9566-34d61d7dff3c.jpeg', 1, NULL, '2023-05-08 02:58:19'),
(3, 'Canon1', 'canon1', 'http://192.168.2.111:9999/upload/brand//2023/276946c6-acb3-4fa4-b8cb-c6df9a278811.', 1, NULL, '2023-05-08 04:41:26'),
(4, 'dd12', 'dd12', 'http://192.168.2.111:9999/upload/brand//2023/19147b9b-b904-44c6-a68d-c74e2381d588.webp', 1, NULL, '2023-05-08 04:19:59'),
(5, 'Nike', 'nike', 'upload/brand/1762335732131896.jpeg', 1, NULL, '2023-05-02 02:25:43'),
(6, 'LV', 'lv', 'upload/brand/1762529681096365.jpeg', 1, NULL, '2023-05-08 03:04:50'),
(7, 'admin-brupdate', 'admin-brupdate', 'upload/brand/1763437090877657.jpeg', 1, NULL, '2023-04-17 08:49:33'),
(8, 'up-date', 'up-date', 'http://192.168.2.111:9999/upload/brand//2023/b13c9d45-222e-438c-b8f0-377c83863111.webp', 1, NULL, '2023-05-04 22:50:48'),
(9, 'up-date-up', 'up-date-up', 'http://192.168.2.111:9999/upload/brand//2023/bcec10c4-3691-42d4-b7bf-954931069407.webp', 1, NULL, '2023-05-02 02:04:29'),
(10, 'admin-cr-re', 'admin-cr-re', 'http://192.168.2.111:9999/upload/brand//2023/1422fc9e-3001-4302-972f-f7ecd6c402d9.webp', 1, NULL, '2023-05-02 02:19:37'),
(11, 'admin-bit', 'admin-bit', 'http://192.168.2.111:9999/upload/brand//2023/877e7c1f-3964-4ea1-a3f4-23d344189349.jpeg', 1, NULL, '2023-05-02 02:16:09'),
(12, 'Tanjiro Kamado Admire', 'tanjiro-kamado-admire', 'http://192.168.2.111:9999/upload/brand//2023/35c0ed68-ef4b-4dd6-854d-9f62ee1223b3.jpeg', 1, NULL, '2023-05-02 02:27:37'),
(13, 'aai', 'aai', 'http://192.168.2.111:9999/upload/brand//2023/9e489804-094a-4809-b672-cde003d7a737.jpeg', 1, NULL, '2023-05-02 02:22:03'),
(14, 'aai', 'aai', 'http://192.168.2.111:9999/upload/brand//2023/9f1bbc47-5dea-47f0-a59a-e9f0b5e9a471.jpeg', 1, NULL, '2023-05-02 02:26:31'),
(15, 'samsung', 'samsung', 'http://192.168.2.111:9999/upload/brand//2023/2007fb6c-9ba6-4839-985c-18b4b0f42b13.jpeg', 1, NULL, '2023-05-02 02:37:35'),
(16, 'Apple', 'apple', 'http://192.168.2.111:9999/upload/brand//2023/5a310a95-e23b-49fc-b961-b4c644efa77d.jpeg', 1, NULL, NULL),
(17, 'Haweii', 'haweii', 'http://192.168.2.111:9999/upload/brand//2023/c5fac2a8-c4fc-44a1-b1f0-f08c7ec5ba9c.jpeg', 1, NULL, NULL),
(18, 'mi', 'mi', 'http://192.168.2.111:9999/upload/brand//2023/ea0644f0-2446-49af-8a65-768ef6a4393f.jpeg', 1, NULL, '2023-05-02 02:33:28'),
(19, 'Oppo', 'oppo', 'http://192.168.2.111:9999/upload/brand//2023/b854a922-a8aa-472b-9163-94f6f789c0a6.jpeg', 1, NULL, NULL),
(20, 'Pixel', 'pixel', 'http://192.168.2.111:9999/upload/brand//2023/6ced58ea-29e9-4fba-99aa-1b06b3e78457.jpeg', 1, NULL, NULL),
(21, 'Lenovo', 'lenovo', 'http://192.168.2.111:9999/upload/brand//2023/4bd98c77-b1d5-4c5c-ba6c-17ac4b0c56cb.jpeg', 1, NULL, NULL),
(22, 'Asus', 'asus', 'http://192.168.2.111:9999/upload/brand//2023/19dc20da-6510-4e09-bbf8-b79e88fc3e9b.jpeg', 1, NULL, NULL),
(23, 'Acer', 'acer', 'http://192.168.2.111:9999/upload/brand//2023/99a86fcc-683a-4a5f-bf42-ba22595dd8bf.jpeg', 1, NULL, NULL),
(24, 'admin-bit', 'admin-bit', 'http://192.168.2.111:9999/upload/brand//2023/553a02dd-ef7f-4d0f-b3e3-74744e369092.jpeg', 1, NULL, NULL),
(25, 'admin-bit', 'admin-bit', 'http://192.168.2.111:9999/upload/brand//2023/ce11dc06-b19c-447f-9900-e99156cc1774.jpeg', 1, NULL, NULL),
(26, 'vendor-cr-br', 'vendor-cr-br', 'http://192.168.2.111:9999/upload/brand//2023/318f5b4e-adec-44de-890b-2955100759c3.webp', 1, NULL, NULL),
(27, 'Mobile', 'mobile', 'http://192.168.2.111:9999/upload/brand//2023/86412be2-797b-4c22-9434-e59434318013.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Camera', 'camera', 'upload/category/1757307232176934.jpg', 1, NULL, '2023-05-03 21:10:10'),
(2, 'Fashion', 'fashion', 'upload/category/1757309925066616.jpg', 1, NULL, '2023-05-03 21:12:02'),
(3, 'XXXX', 'xxxx', 'http://192.168.2.111:9999/upload/category//2023/9cfb2092-c2e4-4cc6-936d-315c2cdf056e.jpeg', 1, NULL, '2023-05-04 02:12:30'),
(4, 'Electronic', 'electronic', 'upload/category/1757317485234875.jpg', 1, NULL, NULL),
(5, 'muma', 'muma', 'upload/category/1757849332499192.png', 1, NULL, '2023-05-10 21:49:56'),
(6, 'Beauty Sloon t8', 'beauty-sloon-t8', 'http://192.168.2.111:9999/upload/category//2023/8858c218-0421-4bfa-ad1b-3887c4ca8883.jpeg', 1, NULL, '2023-05-08 00:12:58'),
(7, 'Cosmetics', 'cosmetics', 'upload/category/1757854373422708.jpg', 1, NULL, NULL),
(8, 'muma', 'muma', 'upload/category/1757854506208553.jpg', 1, NULL, '2023-05-10 21:48:39'),
(9, 'Gernier', 'gernier', 'upload/category/1757854636867205.jpeg', 1, NULL, NULL),
(10, 'testing-category', 'testing-category', 'upload/category/1762345440157794.jpeg', 1, NULL, NULL),
(11, 'cat-up', 'cat-up', 'http://192.168.2.111:9999/upload/category//2023/73cf49f9-5800-4134-a702-993bc931ed4a.webp', 1, NULL, '2023-04-28 04:18:49'),
(12, 'admin-cateupdate', 'admin-cateupdate', 'upload/category/1763439020137937.jpeg', 1, NULL, '2023-04-17 09:26:34'),
(13, 'cat-name', 'cat-name', 'upload/category/1764121436505712.jpeg', 1, NULL, NULL),
(14, 'cat-up', 'cat-up', 'http://192.168.2.111:9999/upload/category//2023/45121c08-2fc6-45da-867d-22917962c583.webp', 1, NULL, '2023-05-02 03:56:35'),
(15, 'cat-upd', 'cat-upd', 'http://192.168.2.111:9999/upload/category//2023/f7129236-4606-4a35-a28b-caf70b92254c.', 1, NULL, '2023-05-02 04:34:05'),
(16, 'catt-bas', 'catt-bas', 'http://192.168.2.111:9999/upload/category//2023/c8add562-7eb5-4467-8a39-f7694eb7c69a.webp', 1, NULL, '2023-05-02 04:32:39'),
(17, 'catt-bas', 'catt-bas', 'http://192.168.2.111:9999/upload/category//2023/87b38f8e-48cd-44c0-b090-5618f62312c5.webp', 1, NULL, NULL),
(18, 'Tanjiro Kamado', 'tanjiro-kamado', 'http://192.168.2.111:9999/upload/category//2023/6f1835c0-4cef-4e03-9837-44e79db75369.jpeg', 1, NULL, NULL),
(19, 'catt-bas', 'catt-bas', 'http://192.168.2.111:9999/upload/category//2023/6563d6ce-bcc0-4124-8983-2fbffbcc0e76.webp', 1, NULL, NULL),
(20, 'koko', 'koko', 'http://192.168.2.111:9999/upload/category//2023/01cbc4f0-f353-4787-b911-208b94efa52a.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 12, 10, '2023-02-28 04:00:56', NULL),
(13, 12, 7, '2023-02-28 04:03:08', NULL),
(14, 12, 12, '2023-02-28 04:03:26', NULL),
(15, 12, 9, '2023-02-28 04:04:56', NULL),
(16, 12, 15, '2023-03-01 00:59:30', NULL),
(25, 3, 9, '2023-03-17 04:07:51', NULL),
(26, 12, 17, '2023-03-24 03:52:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int NOT NULL,
  `coupon_validity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Testing', 100, '3/31/2024', 1, 1, '2023-02-28 14:20:09', '2023-05-14 20:51:09'),
(2, 'HOON', 19, '6/6/2024', 1, 1, '2023-02-28 14:21:00', '2023-05-12 03:43:44'),
(3, 'MOON update', 12, '5/13/2023', 1, 1, '2023-02-28 14:21:31', '2023-05-12 03:45:14'),
(4, 'shop', 10, '5/12/2023', 0, 1, '2023-03-01 03:47:50', '2023-05-12 03:45:30'),
(5, 'happy sale', 2, '6/6/2022', 1, 1, '2023-03-01 03:48:38', '2023-05-12 03:43:26'),
(6, 'union', 10, '2023-04-23', 1, 0, '2023-03-22 22:04:56', '2023-03-22 22:15:38'),
(7, 'ri', 10, '04/20/2023', 1, 0, '2023-04-18 01:31:53', '2023-05-01 23:20:06'),
(8, 'uoop', 10, '5/3/2023', 1, 1, '2023-05-01 23:14:35', '2023-05-12 03:46:20'),
(9, 'uoop', 10, '04/20/2023', 1, 0, '2023-05-12 03:40:31', '2023-05-12 04:04:57'),
(10, 'Adesa', 20, '2/13/2024', 1, 1, '2023-05-12 04:02:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_02_08_060350_create_brands_table', 2),
(18, '2023_02_08_224422_create_categories_table', 3),
(19, '2023_02_09_002259_create_sub_categories_table', 4),
(20, '2023_02_10_010236_create_products_table', 5),
(21, '2023_02_10_012621_create_multi_imgs_table', 5),
(22, '2023_02_14_183644_create_sliders_table', 6),
(23, '2023_02_14_213222_create_banners_table', 7),
(24, '2023_02_24_195753_create_wishlists_table', 8),
(25, '2023_02_26_050222_create_compares_table', 9),
(26, '2023_02_28_015343_create_coupons_table', 10),
(27, '2023_02_28_180127_create_ship_divisions_table', 11),
(28, '2023_02_28_180554_create_ship_districts_table', 11),
(29, '2023_02_28_181049_create_ship_states_table', 11),
(30, '2023_03_07_091923_create_orders_table', 12),
(31, '2023_03_07_093728_create_order_items_table', 12),
(32, '2023_03_15_071424_create_blog_categories_table', 13),
(33, '2023_03_15_072431_create_blog_posts_table', 14),
(34, '2023_03_16_090355_create_reviews_table', 15),
(35, '2023_03_20_063612_create_site_settings_table', 16),
(36, '2023_03_20_082922_create_seos_table', 17),
(37, '2023_03_22_094256_create_permission_tables', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 17),
(5, 'App\\Models\\User', 18),
(4, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `photo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `vendor_id`, `photo_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, 9, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, '2023-02-16 06:08:26', '2023-02-16 06:08:26'),
(3, 10, 0, 'upload/products/multi-image/1757747655562650.jpg', 1, '2023-02-14 04:06:34', '2023-02-14 08:02:08'),
(4, 10, 0, 'upload/products/multi-image/1757747671829897.png', 1, '2023-02-14 04:06:49', '2023-02-14 08:02:08'),
(5, 10, 0, 'upload/products/multi-image/1757747692759662.jpg', 1, '2023-02-14 04:07:09', '2023-02-14 08:02:08'),
(6, 10, 0, 'upload/products/multi-image/1757747716472629.jpg', 1, '2023-02-14 04:07:32', '2023-02-14 08:02:08'),
(12, 12, 0, 'upload/products/multi-image/1757765077402003.jpg', 1, '2023-02-14 08:43:29', '2023-02-14 08:47:12'),
(13, 12, 0, 'upload/products/multi-image/1757764850232809.jpg', 1, '2023-02-14 08:39:52', '2023-02-14 08:47:12'),
(14, 12, 0, 'upload/products/multi-image/1757764851216537.jpg', 1, '2023-02-14 08:39:53', '2023-02-14 08:47:12'),
(15, 12, 0, 'upload/products/multi-image/1757764851840146.jpg', 1, '2023-02-14 08:39:53', '2023-02-14 08:47:12'),
(16, 13, 0, 'upload/products/multi-image/1757829321201896.jpg', 1, '2023-02-15 01:44:37', '2023-02-15 02:15:13'),
(17, 13, 0, 'upload/products/multi-image/1757787085508309.jpg', 1, '2023-02-14 14:33:17', '2023-02-15 02:15:13'),
(18, 13, 0, 'upload/products/multi-image/1757787085696079.jpg', 1, '2023-02-14 14:33:17', '2023-02-15 02:15:13'),
(19, 8, 0, 'upload/products/multi-image/1757937723086499.jpg', 1, '2023-02-16 06:27:36', '2023-04-27 20:39:51'),
(21, 8, 0, 'upload/products/multi-image/1757937742923397.jpg', 1, '2023-02-16 06:27:55', '2023-02-16 06:27:55'),
(22, 8, 0, 'upload/products/multi-image/1757937765633667.jpg', 1, '2023-02-16 06:28:17', '2023-02-16 06:28:17'),
(23, 9, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(24, 9, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(25, 9, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(26, 9, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(27, 6, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(28, 6, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(29, 6, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(30, 6, 0, 'upload/products/multi-image/1757936516744181.jpg', 1, NULL, NULL),
(31, 7, 0, 'upload/products/multi-image/1757747716472629.jpg\r\n', 1, NULL, '2023-02-16 09:39:03'),
(32, 7, 0, 'upload/products/multi-image/1757747716472629.jpg', 1, NULL, '2023-02-16 09:39:03'),
(33, 7, 0, 'upload/products/multi-image/1757747716472629.jpg', 0, NULL, '2023-02-16 09:39:03'),
(34, 14, 0, 'upload/products/multi-image/1758009498240073.jpg', 1, '2023-02-17 01:28:26', NULL),
(35, 14, 0, 'upload/products/multi-image/1758009498536080.jpg', 1, '2023-02-17 01:28:27', NULL),
(36, 14, 0, 'upload/products/multi-image/1758009499123701.jpg', 1, '2023-02-17 01:28:27', NULL),
(37, 14, 0, 'upload/products/multi-image/1758009499273808.jpg', 1, '2023-02-17 01:28:28', NULL),
(38, 16, 0, 'upload/products/multi-image/1758017331756500.jpg', 0, '2023-02-17 03:32:58', '2023-02-25 02:04:47'),
(39, 16, 0, 'upload/products/multi-image/1758017356110112.webp', 0, '2023-02-17 03:33:21', '2023-02-25 02:04:47'),
(40, 16, 0, 'upload/products/multi-image/1758017386590715.jpg', 0, '2023-02-17 03:33:53', '2023-02-25 02:04:47'),
(41, 17, 0, 'upload/products/multi-image/1758742238100841.jpg', 1, '2023-02-25 03:35:02', NULL),
(42, 17, 0, 'upload/products/multi-image/1758742238512081.jpg', 1, '2023-02-25 03:35:02', NULL),
(43, 17, 0, 'upload/products/multi-image/1758742238748607.jpg', 1, '2023-02-25 03:35:02', NULL),
(44, 17, 0, 'upload/products/multi-image/1758742238990392.jpg', 1, '2023-02-25 03:35:02', NULL),
(45, 17, 0, 'upload/products/multi-image/1758742239421815.jpg', 1, '2023-02-25 03:35:03', NULL),
(46, 17, 0, 'upload/products/multi-image/1758742239659921.jpg', 1, '2023-02-25 03:35:03', NULL),
(47, 18, 0, 'upload/products/multi-image/1764405660039922.webp', 1, '2023-04-28 01:22:42', '2023-04-28 01:22:42'),
(48, 28, 0, 'upload/products/multi-image/1762318343395294.jpeg', 1, NULL, NULL),
(49, 28, 0, 'upload/products/multi-image/1762318343901086.jpeg', 1, NULL, NULL),
(50, 29, 0, 'upload/products/multi-image/1762319375453514.jpeg', 0, NULL, '2023-04-05 08:16:30'),
(51, 29, 0, 'upload/products/multi-image/1762319375810270.jpeg', 1, NULL, NULL),
(52, 30, 0, 'upload/products/multi-image/1762322251636063.jpeg', 1, NULL, NULL),
(53, 30, 0, 'upload/products/multi-image/1762322254800156.jpeg', 1, NULL, NULL),
(54, 31, 0, 'upload/products/multi-image/1762530191047794.jpeg', 0, NULL, '2023-04-07 08:34:27'),
(55, 34, 0, 'upload/products/multi-image/1763434783771798.jpeg', 0, NULL, '2023-04-19 23:05:00'),
(56, 34, 0, 'upload/products/multi-image/1763434784157989.jpeg', 0, NULL, '2023-04-19 23:05:00'),
(57, 34, 0, 'upload/products/multi-image/1763434784284152.jpeg', 0, NULL, '2023-04-19 23:05:00'),
(58, 35, 0, 'upload/products/multi-image/1763434866597044.jpeg', 0, NULL, '2023-04-17 08:31:08'),
(59, 35, 0, 'upload/products/multi-image/1763434866917709.jpeg', 1, NULL, NULL),
(60, 35, 0, 'upload/products/multi-image/1763434867038829.jpeg', 1, NULL, NULL),
(61, 35, 0, 'upload/products/multi-image/1763434867181181.jpeg', 1, NULL, NULL),
(62, 36, 0, 'upload/products/multi-image/1764038596306989.jpeg', 1, NULL, NULL),
(63, 36, 0, 'upload/products/multi-image/1764038596544206.jpeg', 1, NULL, NULL),
(64, 36, 0, 'upload/products/multi-image/1764038596651646.jpeg', 1, NULL, NULL),
(65, 37, 0, 'upload/products/multi-image/1764046607368665.jpeg', 1, NULL, NULL),
(66, 37, 0, 'upload/products/multi-image/1764046607661820.jpeg', 1, NULL, NULL),
(67, 37, 0, 'upload/products/multi-image/1764046608111687.jpeg', 1, NULL, NULL),
(68, 37, 0, 'upload/products/multi-image/1764046608465675.jpeg', 1, NULL, NULL),
(69, 38, 0, 'upload/products/multi-image/1764047597411766.jpeg', 1, NULL, NULL),
(70, 38, 0, 'upload/products/multi-image/1764047597892697.jpeg', 1, NULL, NULL),
(71, 38, 0, 'upload/products/multi-image/1764047598016800.jpeg', 1, NULL, NULL),
(72, 38, 0, 'upload/products/multi-image/1764047598168142.jpeg', 1, NULL, NULL),
(73, 39, 0, 'http://192.168.2.111:9999/upload/products//2023/3745895c-f691-4fdd-bfdc-292bc8804ada.', 1, NULL, NULL),
(74, 40, 0, 'http://192.168.2.111:9999/upload/products//2023/6a4b1e3b-ec25-4918-b8b8-306d49471342.', 1, NULL, NULL),
(75, 41, 0, 'http://192.168.2.111:9999/upload/products//2023/9c44d3d9-26a4-4e2b-9b7c-62cc16485960.', 1, NULL, NULL),
(76, 42, 0, 'http://192.168.2.111:9999/upload/products//2023/6136f92b-3f79-4675-851f-180b223ce260.', 1, NULL, NULL),
(77, 44, 0, 'http://192.168.2.111:9999/upload/products//2023/a3915872-ed12-4c5e-b104-f6e767ca76a6.jpeg', 1, NULL, NULL),
(78, 45, 0, 'http://192.168.2.111:9999/upload/products//2023/df693fd3-4925-40dc-afcb-d50ba0264ecb.jpeg', 1, NULL, NULL),
(79, 46, 0, 'http://192.168.2.111:9999/upload/products//2023/4042d285-da34-452a-855e-0197f45f6187.jpeg', 1, NULL, NULL),
(80, 89, 0, 'http://192.168.2.111:9999/upload/products//2023/352da33a-2484-4163-91cf-dcfb4ff936b9.jpeg', 1, NULL, NULL),
(81, 99, 0, 'http://192.168.2.111:9999/upload/products//2023/7b2728c0-10d8-4553-94c4-25bfd177ac34.jpeg', 1, NULL, NULL),
(82, 100, 0, 'http://192.168.2.111:9999/upload/products//2023/72dcff7a-bc10-4e4f-bce7-3fb210cd6db2.jpeg', 1, NULL, NULL),
(83, 101, 0, 'http://192.168.2.111:9999/upload/products//2023/95b85943-399e-4df0-b40d-d12b46475529.jpeg', 1, NULL, NULL),
(84, 102, 0, 'http://192.168.2.111:9999/upload/products//2023/bc3f2189-b74f-47dd-ab44-3b3fbbb67dff.jpeg', 1, NULL, NULL),
(85, 103, 0, 'http://192.168.2.111:9999/upload/products//2023/a4a2a708-0588-473a-8178-0f402180fcfe.jpeg', 1, NULL, NULL),
(86, 104, 0, 'http://192.168.2.111:9999/upload/products//2023/314518c8-3602-44aa-891a-58cd6ca35cce.jpeg', 1, NULL, NULL),
(87, 110, 0, 'http://192.168.2.111:9999/upload/products//2023/91df762b-4d87-4481-a606-c18cec9fdb9a.jpeg', 0, NULL, '2023-05-12 02:43:49'),
(88, 110, 0, 'http://192.168.2.111:9999/upload/products//2023/2cab5b0c-9519-4d4a-bc8b-9a1acbc47128.jpeg', 0, NULL, '2023-05-12 02:43:49'),
(89, 110, 0, 'http://192.168.2.106:9999/upload/product_images//2023/2584bae7-a5d9-4884-9d05-68d6f2a1169e.webp', 0, NULL, '2023-05-12 04:06:57'),
(90, 111, 0, 'http://192.168.2.111:9999/upload/products//2023/ba44db7c-722e-4533-83d5-22156e22a0fe.jpeg', 1, NULL, '2023-04-28 02:21:48'),
(91, 111, 0, 'http://192.168.2.111:9999/upload/products//2023/ac6ec1a9-3b5e-4172-b210-c27e0cb94492.jpeg', 1, NULL, '2023-04-28 02:21:48'),
(92, 111, 0, 'http://192.168.2.111:9999/upload/product_images//2023/7e914c39-ebce-4132-910a-f60423be1fc8.webp', 1, NULL, '2023-04-28 02:36:05'),
(93, 112, 0, 'http://192.168.2.111:9999/upload/products//2023/07df90a3-8464-4fc6-8755-4f3c97286ef0.jpeg', 1, NULL, NULL),
(94, 112, 0, 'http://192.168.2.111:9999/upload/products//2023/e96dafa2-40e6-45f5-bed0-1a6068613dcc.jpeg', 1, NULL, NULL),
(95, 112, 0, 'http://192.168.2.111:9999/upload/products//2023/27e99495-8ae3-4a30-a164-815091a2135e.jpeg', 1, NULL, NULL),
(96, 113, 0, 'http://192.168.2.106:9999/upload/products//2023/53da63d3-faed-4e21-8c51-9fccfbd5de80.jpeg', 1, NULL, NULL),
(97, 113, 0, 'http://192.168.2.106:9999/upload/products//2023/f53ae1aa-3b36-4f0f-bdc3-470784b55aac.jpeg', 1, NULL, NULL),
(98, 113, 1, 'http://192.168.2.106:9999/upload/products//2023/c3433104-3104-4283-a903-8cd56894bf0d.jpeg', 1, NULL, NULL),
(99, 116, 1, 'http://192.168.2.106:9999/upload/products//2023/a3ce01cf-0f69-4600-8bd1-8d06d6d9168d.jpeg', 1, NULL, NULL),
(100, 116, 1, 'http://192.168.2.106:9999/upload/products//2023/35543708-25a7-4fa9-bbac-7432a10ded6f.jpeg', 1, NULL, NULL),
(101, 116, 1, 'http://192.168.2.106:9999/upload/products//2023/ee8005d3-794e-4632-955c-cdcd2c44cbaf.jpeg', 1, NULL, NULL),
(102, 117, 1, 'http://192.168.2.106:9999/upload/products//2023/e6e27795-5724-4cb7-adeb-d1835f6e3c5b.jpeg', 1, NULL, NULL),
(103, 117, 1, 'http://192.168.2.106:9999/upload/products//2023/d631c203-f612-4c51-8dd5-417138639d2b.jpeg', 1, NULL, NULL),
(104, 117, 1, 'http://192.168.2.106:9999/upload/products//2023/8974ef67-a5f7-43ef-8692-db3e621a4b13.jpeg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_id` int NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00d93d85-0168-48ab-a9d7-e691130110ac', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 24, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('04590b1d-5778-4ae6-badb-92094eee3380', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 2, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:50', '2023-04-09 05:16:50'),
('073f4d3f-f8f1-4a94-8cd0-e0c49708b971', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 14, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:50', '2023-04-09 05:16:50'),
('0e0647e0-7cdb-4387-b484-cefd8a43ea2f', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 14, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('0ef9ad47-2b78-4597-a5c4-952e68beccf4', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('129fc02f-6936-4221-8a2b-1b3b5f64da4d', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-06 06:12:36', '2023-04-06 06:12:36'),
('12fd0381-108c-4788-bbb2-8ce08e629177', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('13f832dc-e8f8-4ebb-a6bc-afab63b6af53', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('14eaf647-73c5-4661-ba44-648ce6e1b7a6', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 15, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('187e2fbd-6e75-41a9-a4ee-517f44f0fc4a', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('1a3787e2-ef73-46e1-b0ca-7ef41b6b5d7c', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('1d103c74-1757-4c16-ad84-4525e0f928c5', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 19, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('2c697452-2c35-498c-a545-a7f9ad8b687e', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 25, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('2d5b9804-7fd6-4db5-9a55-3a1fa4b7225d', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 16, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('2f71148d-aab4-450c-bff3-ee3fffddb38e', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('345f89db-1790-4ab5-8d9c-15a5d5fd0850', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('355dfb44-354b-4798-b2b3-9f2f7641fdcb', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-06 06:12:36', '2023-04-06 06:12:36'),
('3faebe6d-a872-49c2-9ec2-a37782721140', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 30, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('3fe90e22-3ee9-4fb8-be2e-731daaaf94b7', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 25, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('4bdaa10d-3e92-49dc-a979-43aa29b7f57e', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 16, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('50a6b173-d035-404a-a339-af36d9c80dd5', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('5109fe9e-4656-453e-81a3-57fbcc298208', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('519f5d30-fad6-4de3-b5e9-57eeab62d4f2', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 24, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('543f2698-e235-4dc6-a4cb-e61a5f644eb2', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 25, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('592f859d-05e3-4a39-8157-2463169fb8ba', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 30, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('5cf19931-cda6-48ad-a2c0-02fec7c372ef', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 17, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('6444277f-898b-4558-a883-3df129d05d63', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 24, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('64e347a7-f76d-417a-b70c-b7b8f914676b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 26, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('69c2c578-990e-4d3e-9090-9ef59781ff03', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 29, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('6a9aa7f1-b1a2-4bd4-804a-0de1d549892f', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 26, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('6df1c82c-d939-4fe7-a8ec-2af88449f841', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-06 06:12:36', '2023-04-06 06:12:36'),
('6e9ce525-e782-40e9-a6c8-b2236ef35855', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 19, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('6e9f57bd-5c22-4d8d-a245-f5a2eb90b128', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 33, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('6fc0376e-cfa5-48ae-ba82-7a04e556e649', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 33, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('7bb25487-4af2-4118-84fc-730592350683', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('7cc26baf-c7f5-473d-bd6c-2b242a4f811b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 25, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('8104be3f-30c8-48eb-a0a8-c2961f14d8f3', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('810df9db-4639-4455-a0cc-66010537deb9', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('8326bcbc-3876-4e43-b95d-cb89c1820012', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 26, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('846158d0-f1e7-43f7-9202-4f90f8959db7', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('882f900d-bd53-46bf-b538-75b898c16a02', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 31, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('8959a133-9efd-41ce-a3e1-9f9e76b38756', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 18, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('8c336d58-f964-4b99-85ff-3fab2116359f', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-06 06:12:36', '2023-04-06 06:12:36'),
('8cbaea51-631e-42fb-bfc2-8d7bb2088b93', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('8dfbd607-33d9-4aed-8f17-87c509798d18', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('8e5f7004-841f-4a46-8528-d6e101861e27', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 2, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('8f214461-82eb-4de1-b2f2-b75b3fdde848', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('91c247c1-92b1-480e-8cbb-f17f9828a6ea', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 20, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('938e0686-3dc1-48ef-9fb0-0290a77814fd', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('95681ce7-866a-4c68-90a2-c7e5dbd06c32', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('95bfeb66-f403-4ec8-a741-35daf6cdcb5b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 24, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('97742d8b-fbc1-4146-b2a2-e2c75375a2a6', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 18, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-06 06:12:36', '2023-04-06 06:12:36'),
('9a30129f-975f-4a1c-82aa-9bc42f42de1e', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 26, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('9d3ce8e6-3e72-4ede-8bc5-57dfea53c32b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 20, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('9d43ac74-dec6-4a4a-80b6-6cf1ef0b7285', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 1, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('9f95fb2f-6175-4d69-902a-b4afdec1d8c0', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 24, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('a1d7ab7c-4958-4de1-ad47-ca5d76d212a1', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 32, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('aa3274ef-b876-4b6f-a04e-187215d3fe40', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 18, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('ab40fd55-22f5-46ae-b81b-fb755ebdd74d', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 26, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('addd6c82-5711-4861-a3ea-95874c2e3c6f', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 19, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('ade36622-6a09-428a-a820-3671d0316f77', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-21 07:29:44', '2023-04-21 07:29:44'),
('b011c986-40aa-403d-96c6-f07e2b662940', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('baa2efb1-585c-4587-877a-42fc4aa1c0fc', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 23, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('bb968b89-e35d-4b54-a86b-4da194e2d682', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 17, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('bcdaaaf5-caaa-42d3-9f0e-c8ddf67136a6', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 15, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('bd7701da-9244-427e-939a-005680a7b965', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 24, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('c052ea76-1a39-4cea-962b-ddec7934f01e', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 28, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('c10b2245-0be3-4af4-9cf5-27173b73c802', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 21, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('c16cca33-098d-47dc-8bc3-3a18edbaa86a', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 23, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51'),
('c20b6017-59e1-42c5-a040-2a6d49c247bb', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 31, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('c411e24a-6f9e-4f2b-9280-5d05969078e3', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 32, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('cd7df37d-71bb-4d8d-8e46-12f18927eb65', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 26, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('d4f358ad-65c2-4af9-a241-82bc1b0ad3eb', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 25, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:31:52', '2023-04-09 03:31:52'),
('d59ff2f8-2527-4e07-b3f0-44b8cecd0e18', 'App\\Notifications\\VendorRegNotification', 'App\\Models\\User', 20, '{\"message\":\"New Vendor Requested\"}', NULL, '2023-04-09 04:00:11', '2023-04-09 04:00:11'),
('d82d1b18-6253-4722-96ad-c989f670fa4b', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 1, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('de649d95-4b42-4e50-82e3-3372883a26b5', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 21, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('e48a5849-4ef6-4028-9df7-d271f3edda12', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 25, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('e92e6cb5-3b9e-4bc2-a2c5-11ad2e31c259', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:35:00', '2023-04-09 03:35:00'),
('ea6bbe32-8487-446e-a06f-f50649512bfc', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 29, '{\"message\":\" Admin Approved Your Account\"}', NULL, '2023-04-09 05:31:23', '2023-04-09 05:31:23'),
('edfaa89a-2139-4682-a65b-1b1ec10907e0', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 1, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:56:24', '2023-04-09 03:56:24'),
('ef2bd652-c9c6-408c-a617-e776bb2798fb', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 26, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('f270ad6d-c7f4-4bfc-a89b-e1411a0336f9', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 25, '{\"message\":\"New Oder Added In Shop\"}', NULL, '2023-04-09 03:06:36', '2023-04-09 03:06:36'),
('f340974d-d46f-438b-9781-10cec64a7600', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 24, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('f830f9bb-6e18-42e9-a716-54ec586e6b0c', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 17, '{\"message\":\"New User Registered Requested In Shop\"}', NULL, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
('fd755d0d-4c6e-4af6-b877-b6104066cd29', 'App\\Notifications\\VendorApproveNotification', 'App\\Models\\User', 28, '{\"message\":\"Active Approved From Admin\"}', NULL, '2023-04-09 05:16:51', '2023-04-09 05:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `adress`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `return_order`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(63, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'card_1MqCUTHcSTXg8zdO4j9UApw2', 'Stripe', 'txn_3MqCUUHcSTXg8zdO15WamYl6', 'usd', 1020.00, '642163d5eee3d', 'EOS94573720', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '02 May 2023', 'broken product', '1', 'pending', 1, '2023-03-27 03:07:27', '2023-05-02 05:10:32'),
(64, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '444111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 1053.00, NULL, 'EOS80845078', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'processing', 1, '2023-03-27 03:09:18', '2023-03-27 22:32:34'),
(65, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '444222', NULL, 'card_1MqCY1HcSTXg8zdOPQIwCJ3U', 'Stripe', 'txn_3MqCY2HcSTXg8zdO1H6IWUDa', 'usd', 1045.00, '642164b23c0d9', 'EOS59076297', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'processing', 1, '2023-03-27 03:11:07', '2023-05-09 01:21:02'),
(66, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '1113333', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 1735.00, NULL, 'EOS11347738', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', 1, '2023-03-27 03:12:43', NULL),
(67, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 589.00, NULL, 'EOS71611290', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '28 March 2023', 'broken product', '2', 'deliverd', 1, '2023-03-27 03:14:31', '2023-04-19 01:58:32'),
(68, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '444111', NULL, 'card_1MqCe8HcSTXg8zdOJSvQh4qR', 'Stripe', 'txn_3MqCe9HcSTXg8zdO0gPEXOAE', 'usd', 1377.00, '6421662d0d579', 'EOS29589410', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '27 March 2023', 'wrong product', '2', 'deliverd', 1, '2023-03-27 03:17:26', '2023-03-27 05:38:20'),
(69, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 390.00, NULL, 'EOS21814032', '27 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '27 March 2023', 'broken product', '2', 'deliverd', 1, '2023-03-27 03:22:13', '2023-03-27 05:32:10'),
(70, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 359.00, NULL, 'EOS94625794', '28 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '28 March 2023', 'wrong product', '2', 'deliverd', 1, '2023-03-27 21:17:39', '2023-05-02 01:34:49'),
(71, 3, 5, 4, 10, 'User', 'user1@gmail.com', '098745231', 'yangon', '33331111', NULL, 'card_1MrCvoHcSTXg8zdOUIQVSVRw', 'Stripe', 'txn_3MrCvpHcSTXg8zdO1LKPpsro', 'usd', 1215.00, '64250d6cd6229', 'EOS17094066', '30 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', 1, '2023-03-29 21:47:50', '2023-05-08 03:49:54'),
(72, 3, 5, 4, 10, 'User', 'user1@gmail.com', '098745231', 'yangon', '444222', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 399.00, NULL, 'EOS27807907', '30 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'deliverd', 1, '2023-03-29 21:49:55', '2023-03-30 00:57:32'),
(73, 3, 5, 4, 10, 'User', 'user1@gmail.com', '098745231', 'yangon', '444222', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 950.00, NULL, 'EOS73454400', '30 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'deliverd', 1, '2023-03-29 22:21:21', '2023-03-29 22:26:25'),
(74, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '444111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 351.00, NULL, 'EOS21500478', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', 1, '2023-04-06 02:45:17', '2023-05-10 05:28:56'),
(75, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 519.00, NULL, 'EOS15011983', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 05:08:04', NULL),
(76, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS23142092', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 05:10:02', NULL),
(77, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS18122683', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 05:21:23', NULL),
(78, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS15134611', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 05:36:20', NULL),
(79, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS84926717', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 05:57:36', NULL),
(80, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 390.00, NULL, 'EOS84442567', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 06:08:37', NULL),
(81, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS75656562', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 06:11:00', NULL),
(82, 12, 4, 9, 9, 'user one', 'user@gmail.com', '0987456123', 'yangon', '33331111', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 0.00, NULL, 'EOS85809146', '06 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-06 06:12:27', NULL),
(83, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '00008888', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 351.00, NULL, 'EOS48945456', '09 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-09 03:06:29', NULL),
(84, 12, 5, 4, 10, 'user one', 'user@gmail.com', '0987456123', 'yangon', '00008888', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 390.00, NULL, 'EOS74421623', '09 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 1, '2023-04-09 03:56:15', NULL),
(85, 12, 5, 4, 10, 'userone', 'user@gmail.com', '0987456123', 'yangon', '0009999', NULL, 'card_1MzKTHHcSTXg8zdOcq2ZqKfJ', 'Stripe', 'txn_3MzKTJHcSTXg8zdO1qYlU4ux', 'usd', 351.00, '64429664b1078', 'EOS95553897', '21 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'deliverd', 1, '2023-04-21 07:27:58', NULL),
(86, 12, 5, 4, 10, 'userone', 'user@gmail.com', '0987456123', 'yangon', '0009999', NULL, 'Cash On Delivery', 'Cash On Delivery', NULL, 'Usd', 390.00, NULL, 'EOS43964237', '21 April 2023', 'April', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'deliverd', 1, '2023-04-21 07:29:32', '2023-05-09 02:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `vendor_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(52, 63, 7, '1', NULL, NULL, '2', 510.00, '2023-03-27 03:07:33', NULL),
(53, 64, 8, '1', NULL, 'Large', '3', 390.00, '2023-03-27 03:09:24', NULL),
(54, 65, 9, '2', NULL, NULL, '1', 390.00, '2023-03-27 03:11:12', NULL),
(55, 65, 10, '2', NULL, 'Medium', '2', 450.00, '2023-03-27 03:11:12', NULL),
(56, 66, 9, '2', NULL, NULL, '1', 390.00, '2023-03-27 03:12:48', NULL),
(57, 66, 14, '2', NULL, 'Medium', '1', 45.00, '2023-03-27 03:12:48', NULL),
(58, 66, 13, '2', NULL, 'Large', '2', 650.00, '2023-03-27 03:12:48', NULL),
(59, 67, 9, '2', NULL, NULL, '1', 390.00, '2023-03-27 03:14:36', NULL),
(60, 67, 16, '2', NULL, 'Medium', '1', 19.00, '2023-03-27 03:14:36', NULL),
(61, 67, 14, '2', NULL, 'Medium', '4', 45.00, '2023-03-27 03:14:36', NULL),
(62, 68, 17, '12', NULL, 'Medium', '1', 360.00, '2023-03-27 03:17:31', NULL),
(63, 68, 17, '14', NULL, 'Large', '3', 360.00, '2023-03-27 03:17:31', NULL),
(64, 68, 15, '2', NULL, 'Small', '10', 9.00, '2023-03-27 03:17:31', NULL),
(65, 69, 9, '2', NULL, NULL, '1', 390.00, '2023-03-27 03:22:20', NULL),
(66, 70, 9, '2', NULL, NULL, '1', 390.00, '2023-03-27 21:17:47', NULL),
(67, 70, 15, '2', NULL, 'Medium', '1', 9.00, '2023-03-27 21:17:47', NULL),
(68, 71, 7, '1', NULL, NULL, '1', 510.00, '2023-03-29 21:47:56', NULL),
(69, 71, 8, '1', NULL, 'Medium', '1', 390.00, '2023-03-29 21:47:56', NULL),
(70, 71, 10, '15', NULL, 'Large', '1', 450.00, '2023-03-29 21:47:56', NULL),
(71, 72, 8, '1', NULL, 'Small', '1', 390.00, '2023-03-29 21:50:01', NULL),
(72, 72, 15, '2', NULL, 'Small', '1', 9.00, '2023-03-29 21:50:01', NULL),
(73, 73, 18, '16', '--Choose Color...', '--Choose Size...', '10', 95.00, '2023-03-29 22:21:28', NULL),
(74, 74, 9, '2', NULL, NULL, '1', 390.00, '2023-04-06 02:45:29', NULL),
(75, 75, 15, '2', NULL, 'Small', '1', 9.00, '2023-04-06 05:08:10', NULL),
(76, 75, 7, '1', NULL, NULL, '1', 510.00, '2023-04-06 05:08:11', NULL),
(77, 80, 9, '2', NULL, NULL, '1', 390.00, '2023-04-06 06:08:46', NULL),
(78, 83, 8, '1', NULL, 'Small', '1', 390.00, '2023-04-09 03:06:35', NULL),
(79, 84, 8, '1', NULL, 'Large', '1', 390.00, '2023-04-09 03:56:24', NULL),
(80, 85, 9, '2', NULL, NULL, '1', 390.00, '2023-04-21 07:28:08', NULL),
(81, 86, 9, '2', NULL, NULL, '1', 390.00, '2023-04-21 07:29:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'brand.list', 'web', 'brand', 1, '2023-03-22 04:49:56', '2023-03-31 02:33:26'),
(2, 'brand.menu', 'web', 'brand', 1, '2023-03-22 04:56:57', '2023-03-30 22:24:50'),
(3, 'brand.add', 'web', 'brand', 1, '2023-03-22 05:21:09', '2023-03-22 05:21:09'),
(4, 'brand.edit', 'web', 'brand', 1, '2023-03-22 05:21:46', '2023-03-22 05:21:46'),
(5, 'brand.delete', 'web', 'brand', 1, '2023-03-22 05:22:03', '2023-03-22 05:22:03'),
(6, 'cat.list', 'web', 'category', 1, '2023-03-22 05:23:00', '2023-03-22 05:32:25'),
(7, 'cat.menu', 'web', 'category', 1, '2023-03-22 20:18:39', '2023-03-22 20:18:39'),
(8, 'cat.add', 'web', 'category', 1, '2023-03-22 20:19:00', '2023-03-30 22:28:19'),
(9, 'cat.edit', 'web', 'category', 1, '2023-03-22 20:19:23', '2023-03-30 22:28:49'),
(10, 'cat.delete', 'web', 'category', 1, '2023-03-22 20:19:58', '2023-03-30 22:30:04'),
(11, 'subcate.menu', 'web', 'subcategory', 0, '2023-03-22 20:20:25', '2023-03-22 20:20:25'),
(12, 'subcat.edit', 'web', 'subcategory', 0, '2023-03-22 20:20:53', '2023-03-22 20:20:53'),
(13, 'subcategory.menu', 'web', 'subcategory', 1, '2023-03-30 22:30:48', '2023-03-30 22:30:48'),
(14, 'subcategory.list', 'web', 'subcategory', 1, '2023-03-30 22:31:34', '2023-03-30 22:31:34'),
(15, 'subcategory.add', 'web', 'subcategory', 1, '2023-03-30 22:32:20', '2023-03-30 22:32:20'),
(16, 'subcategory.edit', 'web', 'subcategory', 1, '2023-03-30 22:32:52', '2023-03-30 22:32:52'),
(17, 'subcategory.delete', 'web', 'subcategory', 1, '2023-03-30 22:33:23', '2023-03-30 22:33:23'),
(18, 'product.menu', 'web', 'product', 1, '2023-03-30 22:34:07', '2023-03-30 22:34:07'),
(19, 'product.list', 'web', 'product', 1, '2023-03-30 22:34:33', '2023-03-30 22:34:33'),
(20, 'product.add', 'web', 'product', 1, '2023-03-30 22:34:59', '2023-03-30 22:34:59'),
(21, 'product.edit', 'web', 'product', 1, '2023-03-30 22:35:24', '2023-03-30 22:35:24'),
(22, 'product.delete', 'web', 'product', 1, '2023-03-30 22:35:52', '2023-03-30 22:35:52'),
(23, 'slider.menu', 'web', 'slider', 1, '2023-03-30 22:36:48', '2023-03-30 22:36:48'),
(24, 'slider.list', 'web', 'slider', 1, '2023-03-30 22:37:16', '2023-03-30 22:37:16'),
(25, 'slider.add', 'web', 'slider', 1, '2023-03-30 22:37:40', '2023-03-30 22:37:40'),
(26, 'slider.edit', 'web', 'slider', 1, '2023-03-30 22:38:00', '2023-03-30 22:38:00'),
(27, 'slider.delete', 'web', 'slider', 1, '2023-03-30 22:38:33', '2023-03-30 22:38:33'),
(28, 'ads.menu', 'web', 'ads', 1, '2023-03-30 22:39:34', '2023-03-30 22:39:34'),
(29, 'ads.list', 'web', 'ads', 1, '2023-03-30 22:39:59', '2023-03-30 22:39:59'),
(30, 'ads.add', 'web', 'ads', 1, '2023-03-30 22:40:29', '2023-03-30 22:40:29'),
(31, 'ads.edit', 'web', 'ads', 1, '2023-03-30 22:40:56', '2023-03-30 22:40:56'),
(32, 'ads.delete', 'web', 'ads', 1, '2023-03-30 22:41:26', '2023-03-30 22:41:26'),
(33, 'coupon.menu', 'web', 'coupon', 1, '2023-03-30 22:42:23', '2023-03-30 22:42:23'),
(34, 'coupon.list', 'web', 'coupon', 1, '2023-03-30 22:43:02', '2023-03-30 22:43:02'),
(35, 'coupon.add', 'web', 'coupon', 1, '2023-03-30 22:43:30', '2023-03-30 22:43:30'),
(36, 'coupon.edit', 'web', 'coupon', 1, '2023-03-30 22:44:16', '2023-03-30 22:44:16'),
(37, 'coupon.delete', 'web', 'coupon', 1, '2023-03-30 22:44:41', '2023-03-30 22:44:41'),
(38, 'area.menu', 'web', 'area', 1, '2023-03-30 22:46:08', '2023-03-30 22:46:08'),
(39, 'area.list', 'web', 'area', 1, '2023-03-30 22:46:31', '2023-03-30 22:46:31'),
(40, 'area.add', 'web', 'area', 1, '2023-03-30 22:47:17', '2023-03-30 22:47:17'),
(41, 'area.edit', 'web', 'area', 1, '2023-03-30 22:48:10', '2023-03-30 22:48:10'),
(42, 'area.delete', 'web', 'area', 1, '2023-03-30 22:48:45', '2023-03-30 22:48:45'),
(43, 'vendor.menu', 'web', 'vendor', 1, '2023-03-30 22:56:43', '2023-03-30 22:56:43'),
(44, 'vendor.list', 'web', 'vendor', 1, '2023-03-30 22:57:12', '2023-03-30 22:57:12'),
(45, 'vendor.add', 'web', 'vendor', 1, '2023-03-30 22:57:34', '2023-03-30 22:57:34'),
(46, 'vendor.delete', 'web', 'vendor', 1, '2023-03-30 22:58:13', '2023-03-30 22:58:13'),
(47, 'vendor.edit', 'web', 'vendor', 1, '2023-03-30 22:59:18', '2023-03-30 22:59:18'),
(48, 'order.menu', 'web', 'order', 1, '2023-03-30 23:00:06', '2023-03-30 23:00:06'),
(49, 'order.list', 'web', 'order', 1, '2023-03-30 23:00:44', '2023-03-30 23:00:44'),
(50, 'order.add', 'web', 'order', 1, '2023-03-30 23:01:20', '2023-03-30 23:01:20'),
(51, 'order.edit', 'web', 'order', 1, '2023-03-30 23:01:56', '2023-03-30 23:01:56'),
(52, 'order.delete', 'web', 'order', 1, '2023-03-30 23:02:20', '2023-03-30 23:02:20'),
(53, 'return.menu', 'web', 'return', 1, '2023-03-30 23:03:32', '2023-03-30 23:03:32'),
(54, 'return.list', 'web', 'return', 1, '2023-03-30 23:04:09', '2023-03-30 23:04:09'),
(55, 'return.add', 'web', 'return', 1, '2023-03-30 23:05:25', '2023-03-30 23:05:25'),
(56, 'return.edit', 'web', 'return', 1, '2023-03-30 23:06:05', '2023-03-30 23:06:05'),
(57, 'return.delete', 'web', 'return', 1, '2023-03-30 23:06:33', '2023-03-30 23:06:33'),
(58, 'report.menu', 'web', 'report', 1, '2023-03-30 23:07:41', '2023-03-30 23:07:41'),
(59, 'report.list', 'web', 'report', 1, '2023-03-30 23:08:12', '2023-03-30 23:08:12'),
(60, 'report.add', 'web', 'report', 1, '2023-03-30 23:08:29', '2023-03-30 23:08:29'),
(61, 'report.edit', 'web', 'report', 1, '2023-03-30 23:08:54', '2023-03-30 23:08:54'),
(62, 'report.delete', 'web', 'report', 1, '2023-03-30 23:09:19', '2023-03-30 23:09:19'),
(63, 'usermanagement.menu', 'web', 'user', 1, '2023-03-30 23:10:09', '2023-03-30 23:10:09'),
(64, 'usermanagement.list', 'web', 'user', 1, '2023-03-30 23:10:54', '2023-03-30 23:10:54'),
(65, 'usermanagement.add', 'web', 'user', 1, '2023-03-30 23:11:17', '2023-03-30 23:11:17'),
(66, 'usermanagement.edit', 'web', 'user', 1, '2023-03-30 23:11:50', '2023-03-30 23:11:50'),
(67, 'usermanagement.delete', 'web', 'user', 1, '2023-03-30 23:12:21', '2023-03-30 23:12:21'),
(68, 'review.menu', 'web', 'review', 1, '2023-03-30 23:13:24', '2023-03-30 23:13:24'),
(69, 'review.list', 'web', 'review', 1, '2023-03-30 23:13:51', '2023-03-30 23:13:51'),
(70, 'review.add', 'web', 'review', 1, '2023-03-30 23:14:13', '2023-03-30 23:14:13'),
(71, 'review.edit', 'web', 'review', 1, '2023-03-30 23:14:58', '2023-03-30 23:14:58'),
(72, 'review.delete', 'web', 'review', 1, '2023-03-30 23:15:21', '2023-03-30 23:15:21'),
(73, 'setting.menu', 'web', 'setting', 1, '2023-03-30 23:16:16', '2023-03-30 23:16:16'),
(74, 'setting.list', 'web', 'setting', 1, '2023-03-30 23:16:35', '2023-03-30 23:16:35'),
(75, 'setting.add', 'web', 'setting', 1, '2023-03-30 23:16:59', '2023-03-30 23:16:59'),
(76, 'setting.edit', 'web', 'setting', 1, '2023-03-30 23:17:30', '2023-03-30 23:17:30'),
(77, 'setting.delete', 'web', 'setting', 1, '2023-03-30 23:17:51', '2023-03-30 23:17:51'),
(78, 'blog.menu', 'web', 'blog', 1, '2023-03-30 23:18:36', '2023-03-30 23:18:36'),
(79, 'blog.list', 'web', 'blog', 1, '2023-03-30 23:19:03', '2023-03-30 23:19:03'),
(80, 'blog.add', 'web', 'blog', 1, '2023-03-30 23:19:32', '2023-03-30 23:19:32'),
(81, 'blog.edit', 'web', 'blog', 1, '2023-03-30 23:19:56', '2023-03-30 23:19:56'),
(82, 'blog.delete', 'web', 'blog', 1, '2023-03-30 23:20:17', '2023-03-30 23:20:17'),
(83, 'role.menu', 'web', 'role', 1, '2023-03-30 23:21:28', '2023-03-30 23:21:28'),
(84, 'role.list', 'web', 'role', 1, '2023-03-30 23:25:47', '2023-03-30 23:25:47'),
(85, 'role.add', 'web', 'role', 1, '2023-03-30 23:26:10', '2023-03-30 23:26:10'),
(86, 'role.edit', 'web', 'role', 1, '2023-03-30 23:26:27', '2023-03-30 23:26:27'),
(87, 'role.delete', 'web', 'role', 1, '2023-03-30 23:26:51', '2023-03-30 23:26:51'),
(88, 'admin.menu', 'web', 'admin', 1, '2023-03-30 23:27:13', '2023-03-30 23:27:13'),
(89, 'admin.list', 'web', 'admin', 1, '2023-03-30 23:27:45', '2023-03-30 23:27:45'),
(90, 'admin.add', 'web', 'admin', 1, '2023-03-30 23:28:14', '2023-03-30 23:28:14'),
(91, 'admin.edit', 'web', 'admin', 1, '2023-03-30 23:28:33', '2023-03-30 23:28:33'),
(92, 'admin.delete', 'web', 'admin', 1, '2023-03-30 23:28:53', '2023-03-30 23:28:53'),
(93, 'stock.menu', 'web', 'stock', 1, '2023-03-30 23:30:24', '2023-03-30 23:30:24'),
(94, 'stock.list', 'web', 'stock', 1, '2023-03-30 23:30:44', '2023-03-30 23:30:44'),
(95, 'stock.add', 'web', 'stock', 1, '2023-03-30 23:31:21', '2023-03-30 23:31:21'),
(96, 'stock.edit', 'web', 'stock', 1, '2023-03-30 23:32:11', '2023-03-30 23:32:11'),
(97, 'stock.delete', 'web', 'stock', 1, '2023-03-30 23:32:29', '2023-03-30 23:32:29'),
(98, 'banner.menu', 'web', 'banner', 1, '2023-04-03 20:56:45', '2023-04-03 20:56:45'),
(99, 'banner.list', 'web', 'banner', 1, '2023-04-03 20:57:12', '2023-04-03 20:57:12'),
(100, 'banner.add', 'web', 'banner', 1, '2023-04-03 20:57:30', '2023-04-03 20:57:30'),
(101, 'banner.edit', 'web', 'banner', 1, '2023-04-03 20:57:44', '2023-04-03 20:57:44'),
(102, 'banner.delete', 'web', 'banner', 1, '2023-04-03 20:58:01', '2023-04-03 20:58:01'),
(103, 'permission.menu', 'web', 'permission', 1, '2023-04-03 22:05:11', '2023-04-03 22:05:11'),
(104, 'permission.list', 'web', 'permission', 1, '2023-04-03 22:05:33', '2023-04-03 22:05:33'),
(105, 'permission.add', 'web', 'permission', 1, '2023-04-03 22:05:54', '2023-04-03 22:05:54'),
(106, 'permission.edit', 'web', 'permission', 1, '2023-04-03 22:06:14', '2023-04-03 22:06:14'),
(107, 'permission.delete', 'web', 'permission', 1, '2023-04-03 22:06:34', '2023-04-03 22:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 22, 'token', '7073ff6cd03bded8246b436dc58ca430d7a3f73650e4e77793d83ab1c36f2369', '[\"*\"]', NULL, NULL, '2023-04-04 03:06:50', '2023-04-04 03:06:50'),
(2, 'App\\Models\\User', 22, 'token', '148562f59eea393cb54d6dd7edf32d9280ddecc8ad0a6a5c6bd98ac08c1bfff2', '[\"*\"]', NULL, NULL, '2023-04-04 03:07:20', '2023-04-04 03:07:20'),
(3, 'App\\Models\\User', 22, 'token', '1f474d5a5bbac62436b7ed8732452dfe6a9b789b9a572af7787aec34039c7de9', '[\"*\"]', '2023-04-07 02:14:40', NULL, '2023-04-04 03:07:31', '2023-04-07 02:14:40'),
(4, 'App\\Models\\User', 22, 'token', '66427d95e6ad027468d7bbb9e12bbf46b017075596ca832c3748d0735ccb68c6', '[\"*\"]', '2023-04-07 02:09:12', NULL, '2023-04-04 03:08:20', '2023-04-07 02:09:12'),
(5, 'App\\Models\\User', 22, 'token', '2b0d33b13a41c52d58bb82c0788f82fd1059f72b11f34f1b8386c39c7aeb77f7', '[\"*\"]', NULL, NULL, '2023-04-05 21:18:00', '2023-04-05 21:18:00'),
(6, 'App\\Models\\User', 2, 'token', '297f03167ce009d91bde850706ed7e7ead44d4a4531d6fcbd48412ac26833212', '[\"*\"]', NULL, NULL, '2023-04-05 22:18:19', '2023-04-05 22:18:19'),
(7, 'App\\Models\\User', 24, 'token', '69e719b413ecacd9385e10989c2e8fd7520a36df150b1707b395b7e1ecb645ed', '[\"*\"]', '2023-04-07 05:31:11', NULL, '2023-04-06 11:21:13', '2023-04-07 05:31:11'),
(8, 'App\\Models\\User', 2, 'token', '04e287611ba7ebb0d929dc4150f27a2807661417668104217c4722c74bb0c889', '[\"*\"]', NULL, NULL, '2023-04-06 20:21:01', '2023-04-06 20:21:01'),
(9, 'App\\Models\\User', 1, 'token', 'ab94caf364fc5ad2498e268bbcc2df3379de78881e4c57ea62eaec58d8c588ec', '[\"*\"]', NULL, NULL, '2023-04-06 20:21:23', '2023-04-06 20:21:23'),
(10, 'App\\Models\\User', 24, 'token', '37e85c5f63306f1411d8470bea23ea11d66a781fa516f4964d4cd2fed98abe78', '[\"*\"]', NULL, NULL, '2023-04-06 20:24:02', '2023-04-06 20:24:02'),
(11, 'App\\Models\\User', 1, 'token', '1224c480ec5a52b309e0f37ebe44e73fd17b96521cd510185077603573ee4b01', '[\"*\"]', NULL, NULL, '2023-04-06 20:31:14', '2023-04-06 20:31:14'),
(12, 'App\\Models\\User', 24, 'token', 'ff0b542076dc00893fc81b4b6f8253b17c86b3dae01014ac2dd431f72bdf6a91', '[\"*\"]', NULL, NULL, '2023-04-06 20:32:35', '2023-04-06 20:32:35'),
(13, 'App\\Models\\User', 1, 'token', '0802254e761b00d640be18c950e6926cd56a947dbe0072b47a58270892566b6b', '[\"*\"]', NULL, NULL, '2023-04-07 02:08:15', '2023-04-07 02:08:15'),
(14, 'App\\Models\\User', 27, 'token', '7229b4fca92461a1833027c408974c52fc9522a660dcb0405ca6267d086fc46c', '[\"*\"]', NULL, NULL, '2023-04-07 02:08:50', '2023-04-07 02:08:50'),
(15, 'App\\Models\\User', 27, 'token', '9ef58477d403f2f257ddd341a3bfacfcbb61599d7b5f882d3541caa3e1aaf601', '[\"*\"]', NULL, NULL, '2023-04-07 04:48:00', '2023-04-07 04:48:00'),
(16, 'App\\Models\\User', 27, 'token', '8ecd621c580feeeacfbb1fbbba6454e7b7b007c4bb6f703160f952c6b4c6b500', '[\"*\"]', NULL, NULL, '2023-04-18 21:50:32', '2023-04-18 21:50:32'),
(17, 'App\\Models\\User', 27, 'token', '3440f6a277eaf71777eae37e9cff841008010dd21e545ef1959aedcbbc1f167e', '[\"*\"]', NULL, NULL, '2023-04-18 21:51:55', '2023-04-18 21:51:55'),
(18, 'App\\Models\\User', 27, 'token', '143cb76d4fbc7155d94019929ee1db6a94845d93638d37776f1b2ca2e0afa034', '[\"*\"]', NULL, NULL, '2023-04-18 21:52:27', '2023-04-18 21:52:27'),
(19, 'App\\Models\\User', 39, 'token', 'ef375d763361ef56e77a0ee35fe795892e03f11fcbcd3df5b4594cf00b154af9', '[\"*\"]', NULL, NULL, '2023-04-18 21:55:40', '2023-04-18 21:55:40'),
(20, 'App\\Models\\User', 43, 'token', '96937b0a7dffd9bef5b71b88a1e75c30bfb7bfe8ca87d2116ae0b32b48c58b6a', '[\"*\"]', NULL, NULL, '2023-04-19 00:56:37', '2023-04-19 00:56:37'),
(21, 'App\\Models\\User', 43, 'token', '21af38015615cbfa6e17a7e1d81a24cc410c121bc292395b7b8b48cc047793a7', '[\"*\"]', NULL, NULL, '2023-04-19 00:58:43', '2023-04-19 00:58:43'),
(22, 'App\\Models\\User', 65, 'token', '25b008098f94c25a30d1a679c6e1a3e8486263c30322aeb4407e7a00cb519ff0', '[\"*\"]', NULL, NULL, '2023-04-19 01:55:25', '2023-04-19 01:55:25'),
(23, 'App\\Models\\User', 65, 'token', 'd4692e833f25d97f9edf95762848fec66bed175730c3f1ab6963c6e60340e0a4', '[\"*\"]', NULL, NULL, '2023-04-19 02:02:47', '2023-04-19 02:02:47'),
(24, 'App\\Models\\User', 43, 'token', '04adc9c61c6c7e35fa455f887a15f5e2899e2b444089f27684373d271368b7ad', '[\"*\"]', NULL, NULL, '2023-04-19 20:41:13', '2023-04-19 20:41:13'),
(25, 'App\\Models\\User', 43, 'token', '2b6619018871afd570a1b2c6c008b87e68d7f39b24c473864c80bd90c18ff0d4', '[\"*\"]', NULL, NULL, '2023-04-19 21:11:12', '2023-04-19 21:11:12'),
(26, 'App\\Models\\User', 43, 'token', 'de2b3cdf22bf45ff2e08a0d4d4b5d8fb1277fbd1be7a54a132d753ea99417169', '[\"*\"]', NULL, NULL, '2023-04-19 21:24:47', '2023-04-19 21:24:47'),
(27, 'App\\Models\\User', 65, 'token', '7aee69653335e9f6b8663e7300034bce117b5329252d99bc7000234f25468f7e', '[\"*\"]', NULL, NULL, '2023-04-19 21:31:10', '2023-04-19 21:31:10'),
(28, 'App\\Models\\User', 69, 'token', 'b1cfb400ebd673c7c4c662d4ed66b58a8b38a326b8743438256498b1a204cdf1', '[\"*\"]', NULL, NULL, '2023-04-19 21:38:03', '2023-04-19 21:38:03'),
(29, 'App\\Models\\User', 65, 'token', '2a435ace58085b6cfd88e6e3b90bbcb2cc81bae1d23d8946dc3bb99edba4060d', '[\"*\"]', NULL, NULL, '2023-04-20 03:14:28', '2023-04-20 03:14:28'),
(30, 'App\\Models\\User', 70, 'token', 'de19886ce96eaa49646b5d55587a8f65c3a7aa0d474f87bfb0a7f1b7ab29edaf', '[\"*\"]', NULL, NULL, '2023-04-20 03:16:18', '2023-04-20 03:16:18'),
(31, 'App\\Models\\User', 65, 'token', 'ea9bfbb60c8383d8bd47bdd8d26dc35ff0aac25bd828371fb1ba83006c7ae76e', '[\"*\"]', NULL, NULL, '2023-04-21 00:36:15', '2023-04-21 00:36:15'),
(32, 'App\\Models\\User', 65, 'token', '607da13932e7259d5871d17bb952bc447a4d49de5ce7dbe7870f4e76ad6d6cfd', '[\"*\"]', NULL, NULL, '2023-04-21 02:07:26', '2023-04-21 02:07:26'),
(33, 'App\\Models\\User', 43, 'token', '23bcb023fa1c55617fde75d29fa1f90eaa7bc3fd416e6f5318e1c980cd10af2b', '[\"*\"]', NULL, NULL, '2023-04-21 02:07:36', '2023-04-21 02:07:36'),
(34, 'App\\Models\\User', 43, 'token', '31ccf1df67fb952cd50343fd2cab72ddcc90b8fae17012be4513827871b12e60', '[\"*\"]', NULL, NULL, '2023-04-21 02:14:26', '2023-04-21 02:14:26'),
(35, 'App\\Models\\User', 43, 'token', '80c684e03c9731c0a3812da05f6e119393a8c2cc72ad9824168f8a16f97053ae', '[\"*\"]', NULL, NULL, '2023-04-21 02:16:09', '2023-04-21 02:16:09'),
(36, 'App\\Models\\User', 65, 'token', 'aad60d957d789616dcfcb47271a0baf04cccada54469aea4b590a6926d5cdbe4', '[\"*\"]', NULL, NULL, '2023-04-21 02:28:42', '2023-04-21 02:28:42'),
(37, 'App\\Models\\User', 65, 'token', 'b921087bb50502f1dc20d1d489a79a88645ad628fb036ac472d745766f318a38', '[\"*\"]', NULL, NULL, '2023-04-21 02:33:28', '2023-04-21 02:33:28'),
(38, 'App\\Models\\User', 65, 'token', 'e811325d9302fcda68995c956e0cc741bef1fe91f3c33c277acfedbb5c91b1e0', '[\"*\"]', NULL, NULL, '2023-04-21 02:38:02', '2023-04-21 02:38:02'),
(39, 'App\\Models\\User', 65, 'token', '1c4d2be609d8e11319c9c5db77ae8db64d1e1ca9a5c9d71cb60dc7eedfb3bc86', '[\"*\"]', NULL, NULL, '2023-04-21 02:38:19', '2023-04-21 02:38:19'),
(40, 'App\\Models\\User', 65, 'token', 'affbc85ea913e9b8e10c3b087a59b2a1894baa358ecdec4a087af56d2cbcb911', '[\"*\"]', NULL, NULL, '2023-04-21 02:49:08', '2023-04-21 02:49:08'),
(41, 'App\\Models\\User', 65, 'token', '47ab7629a764c41b511bdbab4d06a95380f5ca7798389c21ebc5ffc53f9cdc31', '[\"*\"]', NULL, NULL, '2023-04-21 02:49:46', '2023-04-21 02:49:46'),
(42, 'App\\Models\\User', 43, 'token', '915f400eba0eb4541f93ee608b2f1544ce16f3af723c530826b710a5b67e27a2', '[\"*\"]', NULL, NULL, '2023-04-23 20:30:23', '2023-04-23 20:30:23'),
(43, 'App\\Models\\User', 65, 'token', '2b5c753eef776c0e5092e757b4f109ac388babce1049348d5a432d33b50a41ba', '[\"*\"]', NULL, NULL, '2023-04-23 22:52:19', '2023-04-23 22:52:19'),
(44, 'App\\Models\\User', 43, 'token', 'c7490e96c3ca925d9ba437d5bbf577ea7cdc4efc8e429d44a5a7306eeb733dbd', '[\"*\"]', NULL, NULL, '2023-04-25 21:16:16', '2023-04-25 21:16:16'),
(45, 'App\\Models\\User', 43, 'token', '8098fe99447c2d15e22c88d33a48eee8921967f5aa06e153d2dda0dd52308db2', '[\"*\"]', NULL, NULL, '2023-04-25 21:20:03', '2023-04-25 21:20:03'),
(46, 'App\\Models\\User', 65, 'token', 'e3e4b574eb8d323ff2c587db310c1a9887f54b5f7e104da54f7d3650d7960a99', '[\"*\"]', NULL, NULL, '2023-04-25 21:20:09', '2023-04-25 21:20:09'),
(47, 'App\\Models\\User', 43, 'token', '5ce565ca0084a46d3163aec8804404f57e4b04606fc1fc21e1c7d8bb01c35d28', '[\"*\"]', NULL, NULL, '2023-04-25 21:21:24', '2023-04-25 21:21:24'),
(48, 'App\\Models\\User', 39, 'token', '2870c06e7da8407475725e43ee0ff0314e678f732329bee7565d9de0f470a022', '[\"*\"]', NULL, NULL, '2023-05-02 04:19:13', '2023-05-02 04:19:13'),
(49, 'App\\Models\\User', 39, 'token', 'e6f1f5c81ea9b23076124ea76738e853779b73d382777b41af12483d3034ea62', '[\"*\"]', NULL, NULL, '2023-05-05 00:20:22', '2023-05-05 00:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deals` int DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `special_offer` int DEFAULT NULL,
  `special_deals` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_descp`, `long_descp`, `product_thambnail`, `vendor_id`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 4, 'Miyazaki', 'miyazaki', '346666', '9', 'new>                                      </div>                  <div class=>                                      </div>                  <div class=', NULL, NULL, '500', '490', 'Hayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storyteller', 'Hayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storytellerHayao Miyazaki is a Japanese animator, director, producer, screenwriter, author, and manga artist. A co-founder of Studio Ghibli, he has attained international acclaim as a masterful storyteller', 'upload/products/thambnail/1757687023569545.jpg', '1', 1, 1, 1, 1, 1, 1, '2023-02-16 10:31:02', '2023-05-02 01:26:17'),
(8, 1, 1, 3, 'UPDATE TESTING', 'update-testing', '3466669', '9', 'test', 'Small,Medium,Large', 'Red,Green,Blue,Black', '400', '390', 'This is testing', 'this is update testing', 'upload/products/thambnail/1757688603145390.jpg', '1', 1, 1, 1, 1, 1, 1, '2023-02-14 04:14:07', '2023-05-02 01:26:17'),
(9, 1, 1, 6, 'FujiFlin', 'fujiflin', '000000123', '900', NULL, NULL, NULL, '500', '390', 'FUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.', 'FUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.\r\nFUJIFILM Holdings Corporation, trading as Fujifilm, or simply Fuji, is a Japanese multinational conglomerate headquartered in Tokyo, Japan, operating in the realms of photography, optics, office and medical electronics, biotechnology, and chemicals.', 'upload/products/thambnail/1757885528635643.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-02-16 04:33:52', '2023-04-18 23:28:40'),
(10, 1, 1, 4, 'Testin', 'testin', '346111', '886', 'sony', 'Small,Medium,Large', 'Red,Green,Blue,Black', '500', '450', 'testing', 'testing', 'upload/products/thambnail/1757747580475541.jpg', '1', 1, 1, 1, 1, 1, 1, '2023-02-14 04:13:41', '2023-05-02 01:26:17'),
(12, 1, 2, 11, 'Miyazaki one', 'miyazaki-one', '346666', '1000', 'test>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '300', '250', 'this is testing', 'testing', 'upload/products/thambnail/1757765109654757.jpg', '1', 1, NULL, 1, 1, 1, 1, '2023-02-17 05:24:35', '2023-02-17 05:24:35'),
(13, 1, 4, 11, 'Panasonic Online Store', 'panasonic-online-store', '0000123', '1000', 'new porduct', 'Small,Medium,Large', 'Red,Green,Blue', '700', '650', 'Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…', 'Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…Panasonic Holdings Corporation, formerly Matsushita Electric Industrial Co., Ltd. between 1935 and 2008 and the first incarnation of Panasonic Corporation between 2008 and 2022, is a major Japanese mu…', 'upload/products/thambnail/1757829044012914.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-02-14 15:13:55', '2023-02-15 02:15:13'),
(14, 1, 3, 1, 'Greyhound (film)', 'greyhound-(film)', '346666', '1000', 'new product,top product>                                      </div>                  <div class=>                                      </div>                  <div class=>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '50', '45', 'Greyhound is a 2020 American war film directed by Aaron Schneider and starring Tom Hanks, who also wrote the screenplay.[5] The film is based on the 1955 novel The Good Shepherd by C. S. Forester, and also stars Stephen Graham, Rob Morgan, and Elisabeth Shue.\r\n\r\nThe film follows a commander in the US Navy on his assignment commanding a multi-national escort destroyer group of four defending an Allied convoy of thirty-seven merchant and troop ships. They come under attack by German U-boats in early 1942 during the Battle of the Atlantic, only a few months after the United States officially entered World War II.\r\n\r\nGreyhound was initially scheduled to be theatrically released in the United States on June 12, 2020, by Sony Pictures Releasing, but was eventually canceled due to the COVID-19 pandemic after previously being delayed indefinitely. The distribution rights were then sold to Apple TV+, which released the film digitally on July 10, 2020. It received positive reviews from critics, with praise for the action sequences and effective use of its 90-minute runtime. At the 93rd Academy Awards, the film earned a nomination for Best Sound. A sequel is in production.[', 'Greyhound is a 2020 American war film directed by Aaron Schneider and starring Tom Hanks, who also wrote the screenplay.[5] The film is based on the 1955 novel The Good Shepherd by C. S. Forester, and also stars Stephen Graham, Rob Morgan, and Elisabeth Shue.\r\n\r\nThe film follows a commander in the US Navy on his assignment commanding a multi-national escort destroyer group of four defending an Allied convoy of thirty-seven merchant and troop ships. They come under attack by German U-boats in early 1942 during the Battle of the Atlantic, only a few months after the United States officially entered World War II.\r\n\r\nGreyhound was initially scheduled to be theatrically released in the United States on June 12, 2020, by Sony Pictures Releasing, but was eventually canceled due to the COVID-19 pandemic after previously being delayed indefinitely. The distribution rights were then sold to Apple TV+, which released the film digitally on July 10, 2020. It received positive reviews from critics, with praise for the action sequences and effective use of its 90-minute runtime. At the 93rd Academy Awards, the film earned a nomination for Best Sound. A sequel is in production.[', 'upload/products/thambnail/1758009497022062.jpg', '2', NULL, 1, NULL, NULL, 1, 1, '2023-02-17 02:33:01', '2023-02-17 02:33:01'),
(15, 2, 1, 2, 'f', 'f', '346666', '999', 'new product,top product>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '10', '9', 'f', 'f', 'upload/products/thambnail/1758017004057989.jpg', '2', 1, 1, NULL, 1, 1, 1, '2023-02-17 04:52:51', '2023-03-30 00:57:32'),
(16, 1, 3, 1, 'Mulan', 'mulan', '346666', '1000', 'new product>                                      </div>                  <div class=>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '20', '19', 'Mulan is a 2020 American fantasy action drama film produced by Walt Disney Pictures. Directed by Niki Caro from a screenplay by Rick Jaffa, Amanda Silver, Lauren Hynek, and Elizabeth Martin, it is a live-action adaptation of Disney\'s 1998 animated film of the same name, itself based on the Chinese folklore story Ballad of Mulan. The film stars Yifei Liu in the title role, alongside Donnie Yen, Tzi Ma, Jason Scott Lee, Yoson An, Ron Yuan, Gong Li, and Jet Li in supporting roles. In the film, Hua Mulan, the eldest daughter of an honored warrior, masquerades as a man to take her ailing father\'s place during a general conscription to counter the Rouran army in Imperial Chin', 'f\r\n                Mulan is a 2020 American fantasy action drama film produced by Walt Disney Pictures. Directed by Niki Caro from a screenplay by Rick Jaffa, Amanda Silver, Lauren Hynek, and Elizabeth Martin, it is a live-action adaptation of Disney\'s 1998 animated film of the same name, itself based on the Chinese folklore story Ballad of Mulan. The film stars Yifei Liu in the title role, alongside Donnie Yen, Tzi Ma, Jason Scott Lee, Yoson An, Ron Yuan, Gong Li, and Jet Li in supporting roles. In the film, Hua Mulan, the eldest daughter of an honored warrior, masquerades as a man to take her ailing father\'s place during a general conscription to counter the Rouran army in Imperial Chin', 'upload/products/thambnail/1758736413292140.jpg', '2', 1, 1, NULL, NULL, 1, 1, '2023-02-25 02:03:48', '2023-02-25 02:19:04'),
(17, 1, 1, 2, 'nikon', 'nikon', '000011112222', '1000', 'new product,top product', 'Small,Medium,Large', 'Red,Green,Blue,Black', '400', '360', 'High resolution 8K x 8K images and the world\'s largest FOV of 25 mm enable you to obtain more data than ever, expanding the possibilities of a wide range of research fields.', 'High resolution 8K x 8K images and the world\'s largest FOV of 25 mm enable you to obtain more data than ever, expanding the possibilities of a wide range of research fields.High resolution 8K x 8K images and the world\'s largest FOV of 25 mm enable you to obtain more data than ever, expanding the possibilities of a wide range of research fields.High resolution 8K x 8K images and the world\'s largest FOV of 25 mm enable you to obtain more data than ever, expanding the possibilities of a wide range of research fields.', 'upload/products/thambnail/1758742237162300.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-02-25 03:35:01', '2023-03-15 22:57:28'),
(18, 1, 2, 10, 'GUCCI', 'gucci', '000111222', '900', 'new product,top product>                                      </div>                  <div class=', 'Small,Medium,Large', 'Red,Green,Blue,Black', '100', '95', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'upload/products/thambnail/1758743151433433.jpg', '2', 1, 1, 1, 1, 1, 1, '2023-04-28 01:23:03', '2023-04-28 01:23:03'),
(19, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762315983464313.jpeg', '1', 1, 1, 1, 1, 1, 1, NULL, NULL),
(20, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316198060079.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, NULL),
(21, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316235174599.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, NULL),
(22, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316258568260.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, NULL),
(23, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316288408546.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(24, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316345481898.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(25, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762316406301253.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(26, 1, 1, 1, 'zero', 'zero', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762317900148286.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(27, 1, 1, 1, 'uoop', 'uoop', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762318190304502.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(28, 5, 1, 1, 'update-product-two', 'update-product-two', '0009', '100', 'click', 'medium', 'red', '800', '790', 'this is short', 'this is long', 'upload/products/thambnail/1762318343126125.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, '2023-04-05 08:03:20'),
(29, 5, 1, 1, 'update-product', 'update-product', '0009', '100', 'click', 'medium', 'red', '800', '790', 'this is short', 'this is long', 'upload/products/thambnail/1762319374841491.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, '2023-04-05 08:16:30'),
(30, 1, 1, 1, 'uooprou', 'uooprou', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762322249395340.jpeg', '2', 1, 1, 1, 1, 1, 0, NULL, NULL),
(31, 1, 1, 1, 'uooprou', 'uooprou', '0000', '100', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1762530190823856.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, '2023-04-07 08:34:27'),
(32, 1, 1, 1, 'product999', 'product999', '0000001', '100', 'testing', 'small', 'red', '100', '98', 'this is testing', 'this is also long testing', 'upload/products/thambnail/1763434469138409.jpeg', '1', 1, 1, 1, 1, 1, 0, NULL, NULL),
(33, 1, 1, 1, 'up999', 'up999', '0000', '200', 'test>                                      </div>                  <div class=', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1763434694203096.jpeg', '1', 1, 1, 1, 1, 1, 0, '2023-04-18 23:14:45', '2023-04-19 23:05:12'),
(34, 1, 1, 1, 'upuuy999', 'upuuy999', '0000', '200', 'test>                                      </div>                  <div class=>                                      </div>                  <div class=', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1763434783621753.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-18 23:14:55', '2023-04-19 23:05:00'),
(35, 2, 3, 2, 'update-adpro', 'update-adpro', '00000009', '300', 'hello', 'medium', 'black', '300', '280', 'short', 'long', 'upload/products/thambnail/1763434866363768.jpeg', '2', 1, 1, 1, 1, 1, 1, NULL, '2023-04-28 02:07:55'),
(36, 1, 1, 1, 'uoop999', 'uoop999', '0000', '200', 'test', 'medium', 'red', '100', '98', 'this is testing', 'this is test long', 'upload/products/thambnail/1764405425068844.jpeg', '1', 1, 1, 1, 1, 1, 1, NULL, '2023-04-28 01:18:57'),
(37, 1, 1, 1, 'product999', 'product999', '0000001', '100', 'testing', 'small', 'red', '100', '98', 'this is testing', 'this is also long testing', 'upload/products/thambnail/1764046606882270.jpeg', '1', 1, 1, 1, NULL, 1, 1, NULL, NULL),
(38, 1, 1, 1, 'product009', 'product009', '0000001', '100', 'testing', 'small', 'red', '100', '98', 'this is testing', 'this is also long testing', 'upload/products/thambnail/1764047596934387.jpeg', '1', 1, 1, 1, NULL, 1, 1, NULL, NULL),
(39, 1, 1, 1, 'b64', 'b64', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/3745895c-f691-4fdd-bfdc-292bc8804ada.', '1', 1, 1, 1, 1, 1, 1, NULL, NULL),
(40, 1, 1, 1, 'b64', 'b64', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/6a4b1e3b-ec25-4918-b8b8-306d49471342.', '1', 1, 1, 1, 1, 1, 1, NULL, NULL),
(41, 1, 1, 1, 'b648', 'b648', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/9c44d3d9-26a4-4e2b-9b7c-62cc16485960.', '1', 1, 1, 1, 1, 1, 1, NULL, NULL),
(42, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/6136f92b-3f79-4675-851f-180b223ce260.', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 04:54:18', NULL),
(43, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/cca192a6-968b-4641-90a0-2331322f8ad7.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:01:15', NULL),
(44, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/a3915872-ed12-4c5e-b104-f6e767ca76a6.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:01:35', NULL),
(45, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/df693fd3-4925-40dc-afcb-d50ba0264ecb.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:02:25', NULL),
(46, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/4042d285-da34-452a-855e-0197f45f6187.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:03:39', NULL),
(47, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/56b6b4ac-1695-497e-a883-1346945bb6b6.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:05:48', NULL),
(48, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/368e7f19-0eea-437c-986a-e61a49069583.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:05:58', NULL),
(49, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/eb658fde-63aa-47ed-8e6d-1384aa791bbf.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:06:21', NULL),
(50, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/14df0b7e-0bc9-4409-a515-232d0ee9016b.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:06:29', NULL),
(51, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/af1260f9-845f-4425-a2f3-97778c025755.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:07:03', NULL),
(52, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/9f889d8c-ee0b-4af3-8d9d-ac39b759ba53.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:07:34', NULL),
(53, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/7a8648f7-6af1-46e5-b1a5-ad79b91c2eef.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:08:01', NULL),
(54, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/0f848484-99eb-4f13-9d9d-3feb83695f3b.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:08:13', NULL),
(55, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/841877ad-f05a-4284-b600-cbe6c9463f4f.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:09:08', NULL),
(56, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/81093cf5-c929-48b6-9562-8777d817e317.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:09:54', NULL),
(57, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/0cf9ca68-5924-4a5b-831a-c3f90574058a.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:11:31', NULL),
(58, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/ab051c6e-1337-42f8-acfd-8af88dc89220.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:13:04', NULL),
(59, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/6a7be22f-f27d-41a1-8cdf-2ced3a57cc80.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:13:31', NULL),
(60, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/b38edb36-e430-4a26-b8cd-b0f79ce944fa.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:14:16', NULL),
(61, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/976b71e8-edd3-40d2-a923-6e8ec7f9b7a5.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:15:34', NULL),
(62, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/531a8ced-e929-4615-a68d-23abe7d64276.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:16:12', NULL),
(63, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/2ae99610-4b41-4c9a-8767-f3f5d4812a89.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:19:32', NULL),
(64, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/bdc4134d-1718-4ea9-aead-1a630ed00690.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:20:24', NULL),
(65, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/e7957c37-4126-4c4d-a724-1504c0a4a663.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:20:50', NULL),
(66, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/9a4e5535-861e-4084-bc3c-8249dac058a9.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:21:19', NULL),
(67, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/b92349d7-b936-47ad-aacd-54fd71e5faef.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:21:33', NULL),
(68, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/53763dba-ad6c-4c2d-8fd3-bc98041a9695.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:21:43', NULL),
(69, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/59756778-9188-46d3-839d-2fb797695e9e.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:22:42', NULL),
(70, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/dbf7a195-64ed-40a8-9fd0-932c92cdeb36.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:22:57', NULL),
(71, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/27bedd3f-f190-4a8b-b8b2-8926d2e7cce9.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:23:39', NULL),
(72, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/56fef332-8646-4000-b0dc-f733754bac15.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:26:48', NULL),
(73, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/dda9c4ec-b82f-431f-98e0-ac12b236a4d2.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:26:52', NULL),
(74, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/3732c9c7-2607-40e3-8c5e-de9d2fe32fca.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:26:58', NULL),
(75, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/73c02ebf-1c9a-472c-a325-5504bbf2b441.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:27:09', NULL),
(76, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/39153b63-9993-4013-b304-defdb9599e2d.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:32:04', NULL),
(77, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/e57ce39d-56fa-4b94-8e81-7ff2deef65ed.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:32:36', NULL),
(78, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/56607d96-2025-431f-864a-aac5891f64a6.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:33:13', NULL),
(79, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/b059887a-706e-42ba-a5d1-e8954bf8f12c.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:33:45', NULL),
(80, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/ccb5403d-c995-4eff-bd65-0f6dfc4e42f6.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:34:22', NULL),
(81, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/1f3b905e-d73e-4b82-9fa3-523980fe99b0.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:35:24', NULL),
(82, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/7a55902c-6643-4572-b027-4a69846a8a42.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:37:14', NULL),
(83, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/f959bc46-5652-4261-a792-7d3ba151313c.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:38:50', NULL),
(84, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/8b6b86f6-73c5-46b1-8b21-99b324218cd4.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:39:10', NULL),
(85, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/5e9ce0bf-6205-41c7-97f6-29850817d90f.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:39:38', NULL),
(86, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/af3dc3aa-ab82-4317-9b3e-f45fa838aefb.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:39:45', NULL),
(87, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/14d0e0dd-7809-4492-904e-9483e5a70896.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:40:25', NULL),
(88, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/c77598c5-d6a9-4d0f-8449-27b2dee5e561.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:40:53', NULL),
(89, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/352da33a-2484-4163-91cf-dcfb4ff936b9.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:41:13', NULL),
(90, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/15c6ad7d-7752-4f82-851b-a3d732c4033a.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:41:20', NULL),
(91, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/be659ee2-710d-4311-b86c-92b7cf8a8c6b.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:41:27', NULL),
(92, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/519bb8ef-cc3c-432b-baca-dd261da2b069.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:42:30', NULL),
(93, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/e226d837-5650-4fae-9dcf-87e0c735bbd5.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:42:38', NULL),
(94, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/f6782e6f-d896-4a30-a352-36dd0c272be4.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:42:44', NULL),
(95, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/5b33f2b1-062d-4ef7-88e6-e3d21a5fc6ac.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:43:22', NULL),
(96, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/bf13e8c5-ef3c-421f-9f7d-edb8907917bd.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:43:48', NULL),
(97, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/6f1b714e-3fed-406e-bcc6-bd48f3423b11.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:44:06', NULL),
(98, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/2723805f-56d2-4a2c-882b-eaaf2ec372b4.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:44:36', NULL),
(99, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/7b2728c0-10d8-4553-94c4-25bfd177ac34.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:45:04', NULL),
(100, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/1471a2d9-cd3d-4006-b36d-b71f4a6fb652.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:45:39', NULL),
(101, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/80a6a1ba-7da9-4dab-ba48-516abfd3469b.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:46:15', NULL),
(102, 1, 1, 1, 'b648223', 'b648223', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'jjj', 'http://192.168.2.111:9999/upload/products//2023/b740a017-665a-4d22-9b75-e8a0073c17ba.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:46:38', NULL),
(103, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/11bf943c-320d-4bb9-b3d7-d72d3faaaf4a.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:48:54', NULL),
(104, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/28872956-00d8-431c-9c33-396343390b15.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:54:09', NULL),
(105, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/e2071d15-9d90-45e8-bebd-0fa5bec22f34.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:56:03', NULL),
(106, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/53995675-5f53-47cc-ab91-88163d3c6228.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:56:18', NULL),
(107, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/967928ac-9f01-4083-8ab4-dc3cd413a9bb.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:56:45', NULL),
(108, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/1270df32-1c5f-4f32-84df-7843fcc1a227.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:58:56', NULL),
(109, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/8d5e25ea-af8e-48b0-9557-165f3bf26dbf.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-27 05:59:27', NULL),
(110, 1, 1, 1, 'uuo', 'uuo', '4444', '5', 'click', 'medium', 'red', '100', '98', 'short', 'long', 'http://192.168.2.106:9999/upload/product_images//2023/84d9b436-f9af-447f-9432-44a0b57002af.jpeg', '1', 1, 1, 1, 1, 1, 0, '2023-04-28 01:03:52', '2023-05-12 05:03:49'),
(111, 1, 1, 1, 'uuo', 'uuo', '4444', '5', 'click', 'medium', 'red', '100', '98', 'short', 'long', 'http://192.168.2.111:9999/upload/products//2023/c8469442-8fe3-4979-bf5a-5e2ce803b563.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-04-28 02:03:07', '2023-05-14 20:41:34'),
(112, 1, 1, 1, '84102', '84102', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.111:9999/upload/products//2023/6409af82-7d60-441a-98d6-96c032e38ba9.jpeg', '1', 1, 1, 1, 1, 0, 1, '2023-05-05 00:24:30', NULL),
(113, 1, 1, 1, 'v-1', 'v-1', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.106:9999/upload/products//2023/2c19c1bc-7f7b-4569-a32f-86a5fd2b63ff.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-05-12 02:11:35', NULL),
(114, 1, 1, 1, 'v-2', 'v-2', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.106:9999/upload/products//2023/e1171d27-eb18-46e2-b140-0b439a577c21.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-05-12 03:15:38', NULL),
(115, 1, 1, 1, 'v-2', 'v-2', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.106:9999/upload/products//2023/98902879-5b7d-4416-a67b-bb930c2ddeed.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-05-12 03:16:39', NULL),
(116, 1, 1, 1, 'v-2', 'v-2', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.106:9999/upload/products//2023/4c6f6552-15ca-4c07-9b08-e936c332f2bb.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-05-12 03:27:38', NULL),
(117, 1, 1, 1, 'v-3', 'v-3', '000009', '10', 'click', 'medium', 'red', '90', '89', 'h', 'j889', 'http://192.168.2.106:9999/upload/products//2023/9c2acb8e-dc94-4ee9-a1ea-c53cf2180af7.jpeg', '1', 1, 1, 1, 1, 1, 1, '2023-05-12 04:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` int DEFAULT '1',
  `vendor_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `rating`, `status`, `delete_status`, `vendor_id`, `created_at`, `updated_at`) VALUES
(32, 9, 12, 'good product', '4', '0', 1, 2, '2023-03-28 21:43:57', NULL),
(33, 9, 12, 'normal product', '3', '0', 1, 2, '2023-03-28 21:47:12', NULL),
(34, 10, 12, 'awesome product', '5', '1', 1, 2, '2023-03-28 21:51:17', NULL),
(35, 18, 12, 'good quality', '4', '1', 1, 2, '2023-03-28 22:07:46', NULL),
(36, 13, 12, 'normal product', '3', '1', 0, 2, '2023-03-28 22:33:02', '2023-03-28 23:13:56'),
(37, 15, 12, 'poor product', '2', '1', 1, 2, '2023-03-29 00:05:04', '2023-03-29 00:07:56'),
(38, 8, 12, 'good product', '4', '1', 0, 1, '2023-03-29 00:06:16', '2023-05-11 05:31:23'),
(39, 8, 12, 'good porduct', '4', '1', 1, 1, '2023-03-29 03:42:00', '2023-04-20 04:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 1, '2023-03-31 00:34:44', '2023-04-03 00:16:50'),
(2, 'Admin', 'web', 1, '2023-03-31 00:36:26', '2023-03-31 00:36:26'),
(3, 'CEO', 'web', 1, '2023-03-31 00:36:37', '2023-03-31 00:36:37'),
(4, 'Account', 'web', 1, '2023-03-31 00:37:25', '2023-03-31 00:37:25'),
(5, 'Marketing', 'web', 1, '2023-03-31 00:39:00', '2023-03-31 02:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `delete_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`, `delete_status`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 1),
(5, 1, 1),
(5, 2, 1),
(5, 3, 1),
(6, 1, 1),
(6, 2, 1),
(6, 3, 1),
(7, 1, 1),
(7, 2, 1),
(7, 3, 1),
(8, 1, 1),
(8, 2, 1),
(9, 1, 1),
(9, 2, 1),
(10, 1, 1),
(10, 2, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 1),
(17, 1, 1),
(18, 1, 1),
(18, 3, 1),
(18, 5, 1),
(19, 1, 1),
(19, 3, 1),
(19, 5, 1),
(20, 1, 1),
(20, 3, 1),
(21, 1, 1),
(22, 1, 1),
(23, 1, 1),
(24, 1, 1),
(25, 1, 1),
(26, 1, 1),
(27, 1, 1),
(28, 1, 1),
(29, 1, 1),
(30, 1, 1),
(31, 1, 1),
(32, 1, 1),
(33, 1, 1),
(33, 5, 1),
(34, 1, 1),
(34, 5, 1),
(35, 1, 1),
(36, 1, 1),
(37, 1, 1),
(38, 1, 1),
(39, 1, 1),
(40, 1, 1),
(41, 1, 1),
(42, 1, 1),
(43, 1, 1),
(44, 1, 1),
(45, 1, 1),
(46, 1, 1),
(47, 1, 1),
(48, 1, 1),
(48, 5, 1),
(49, 1, 1),
(49, 5, 1),
(50, 1, 1),
(51, 1, 1),
(52, 1, 1),
(53, 1, 1),
(54, 1, 1),
(55, 1, 1),
(56, 1, 1),
(57, 1, 1),
(58, 1, 1),
(58, 4, 1),
(59, 1, 1),
(60, 1, 1),
(61, 1, 1),
(62, 1, 1),
(63, 1, 1),
(64, 1, 1),
(65, 1, 1),
(66, 1, 1),
(67, 1, 1),
(68, 1, 1),
(69, 1, 1),
(70, 1, 1),
(71, 1, 1),
(72, 1, 1),
(73, 1, 1),
(74, 1, 1),
(75, 1, 1),
(76, 1, 1),
(77, 1, 1),
(78, 1, 1),
(78, 4, 1),
(79, 1, 1),
(80, 1, 1),
(81, 1, 1),
(82, 1, 1),
(83, 1, 1),
(84, 1, 1),
(85, 1, 1),
(86, 1, 1),
(87, 1, 1),
(88, 1, 1),
(89, 1, 1),
(90, 1, 1),
(91, 1, 1),
(92, 1, 1),
(93, 1, 1),
(93, 4, 1),
(93, 5, 1),
(94, 1, 1),
(94, 5, 1),
(95, 1, 1),
(96, 1, 1),
(97, 1, 1),
(98, 1, 1),
(98, 3, 1),
(99, 1, 1),
(99, 3, 1),
(100, 1, 1),
(100, 3, 1),
(101, 1, 1),
(101, 3, 1),
(102, 1, 1),
(102, 3, 1),
(103, 1, 1),
(104, 1, 1),
(105, 1, 1),
(106, 1, 1),
(107, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'meta', 'aut', 'meta_key', 'desc', NULL, '2023-05-11 22:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 10, 'yangon', 1, '2023-02-28 09:19:47', '2023-05-08 04:15:28'),
(2, 11, 'UNION OF Myanmar', 1, '2023-02-28 20:24:28', '2023-05-10 21:59:05'),
(3, 7, 'Yagon enjoy', 1, '2023-03-06 02:03:51', '2023-05-10 21:18:44'),
(4, 1, 'MOON', 1, '2023-03-06 02:04:11', '2023-05-08 03:58:23'),
(5, 8, 'SUN', 1, '2023-03-06 02:04:27', '2023-05-10 22:30:35'),
(6, 2, 'HEAVEN', 1, '2023-03-06 02:04:42', '2023-05-10 22:32:05'),
(7, 4, 'MONDAY', 1, '2023-03-06 02:04:59', NULL),
(8, 4, 'TUEDAY', 1, '2023-03-06 02:05:11', NULL),
(9, 4, 'SUNDAY', 1, '2023-03-06 02:05:25', NULL),
(10, 3, 'A DIVISION', 1, '2023-03-06 02:05:46', NULL),
(11, 5, 'B DIVISION', 1, '2023-03-06 02:06:01', '2023-03-23 21:48:22'),
(12, 3, 'DIVISION C', 1, '2023-03-06 02:06:16', '2023-03-23 01:30:41'),
(13, 1, 'District A', 1, '2023-03-23 00:31:15', '2023-03-23 01:30:33'),
(14, 3, 'Marketing A', 1, '2023-03-23 00:35:56', '2023-03-23 01:30:26'),
(15, 4, 'updd', 1, '2023-04-18 02:20:33', '2023-05-10 22:29:03'),
(16, 2, 'dist-A', 1, '2023-05-01 23:39:59', NULL),
(17, 2, 'dist-A', 1, '2023-05-04 22:05:42', NULL),
(18, 2, 'dist-A', 1, '2023-05-10 21:23:19', NULL),
(19, 11, 'Bagan', 1, '2023-05-10 21:35:00', NULL),
(20, 1, 'aung', 1, '2023-05-11 01:05:46', NULL),
(21, 7, 'aung', 1, '2023-05-11 01:05:53', NULL),
(22, 1, 'kaven', 1, '2023-05-11 01:06:17', NULL),
(23, 1, 'admintest123', 1, '2023-05-11 01:06:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint UNSIGNED NOT NULL,
  `division_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Design Division', 1, '2023-03-01 03:15:37', '2023-05-08 02:56:52'),
(2, 'Division BB', 1, '2023-03-01 03:46:27', '2023-05-11 04:36:44'),
(3, 'Marketing Division', 1, '2023-03-01 03:46:42', NULL),
(4, 'Division BB', 1, '2023-03-01 03:47:11', '2023-05-11 04:36:37'),
(5, 'Division BB', 1, '2023-03-22 22:05:33', '2023-05-08 03:57:25'),
(6, 'Admin-division-update', 1, '2023-04-18 01:57:19', '2023-05-04 04:15:23'),
(7, 'Admin-Division', 1, '2023-05-04 20:35:10', '2023-05-04 20:57:40'),
(8, 'Mandalay', 1, '2023-05-04 20:55:42', '2023-05-04 20:57:33'),
(9, 'Bago', 1, '2023-05-08 00:38:55', NULL),
(10, 'Digital marketing', 1, '2023-05-08 03:57:47', NULL),
(11, 'content Writer', 1, '2023-05-08 03:58:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `state_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 10, 23, 'Ubeer State of america', 1, '2023-02-28 22:30:53', '2023-05-11 04:33:13'),
(2, 3, 23, 'Hoon state lrr', 1, '2023-02-28 22:48:11', '2023-05-11 01:11:55'),
(3, 4, 1, 'Rooer', 1, '2023-02-28 22:49:07', '2023-02-28 23:03:26'),
(4, 4, 1, 'Mjon', 1, '2023-02-28 22:50:20', '2023-02-28 23:03:43'),
(5, 8, 1, 'Gtty jjj', 1, '2023-02-28 22:51:07', '2023-05-11 01:13:10'),
(6, 3, 12, 'Gttyer update', 1, '2023-02-28 23:00:04', '2023-03-24 01:00:22'),
(7, 3, 14, 'Bruno', 1, '2023-02-28 23:16:27', '2023-03-24 00:59:31'),
(8, 2, 3, 'A STATE', 1, '2023-03-06 02:06:59', NULL),
(9, 2, 9, 'B STATE', 1, '2023-03-06 02:07:38', NULL),
(10, 2, 4, 'C STATE', 1, '2023-03-06 02:16:24', NULL),
(11, 2, 5, 'D STATE', 1, '2023-03-06 02:16:55', NULL),
(12, 4, 7, 'STATE updting', 1, '2023-03-06 02:21:44', '2023-03-23 03:24:37'),
(13, 2, 6, 'Design State', 1, NULL, NULL),
(14, 2, 6, 'Design State', 1, NULL, NULL),
(15, 4, 7, 'STATE. TESTINGbbb', 1, NULL, NULL),
(16, 2, 2, 'Admin-state', 1, NULL, NULL),
(17, 2, 2, 'Admin-state-two', 1, NULL, NULL),
(18, 1, 1, 'name-s', 0, NULL, '2023-05-02 00:56:42'),
(19, 1, 1, 'Admin-state-t', 0, NULL, '2023-05-11 01:15:57'),
(20, 2, 8, 'Joketa', 0, NULL, '2023-05-11 01:15:52'),
(21, 1, 1, 'Tanjiro Kamado', 0, NULL, '2023-05-11 01:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `support_phone`, `phone_one`, `email`, `company_address`, `facebook`, `twitter`, `youtube`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'http://192.168.2.106:9999/upload/logo//2023/8c3fffbd-9cda-4d4e-940c-345ee4a5a145.jpeg', '09999', '8888', 'a@gmail.com', 'ygn', 'fb.com', 'tw.com', 'yu@gmail.com', 'c@cc', NULL, '2023-05-11 21:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `short_title`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Canon 5D Mark', 'Canon  Update', 'upload/slider/1757858312373373.jpg', 0, NULL, '2023-04-19 22:35:41'),
(2, 'Redmi', 'R40Gamming', 'http://192.168.2.111:9999/upload/slider//2023/8dc6413d-bf44-482f-bbab-1d75f96bc7fd.jpeg', 1, NULL, '2023-05-04 00:46:48'),
(3, 'Camera', 'THSI IS AWESOME', 'upload/slider/1757857902700874.jpg', 0, NULL, '2023-04-19 22:35:27'),
(4, 'HERVARD UNIVERSITY', 'FOR YOUR EDUCATION FIST', 'upload/slider/1757858255222491.jpg', 1, NULL, '2023-04-19 20:41:16'),
(5, 'admin-sliderup', 'this is update test', 'upload/slider/1763489461219081.jpeg', 0, NULL, '2023-04-19 22:33:36'),
(6, 'admin-siderupdate', 'this is update test', 'upload/slider/1763489196713513.jpeg', 0, NULL, '2023-04-19 22:33:12'),
(7, 'sli-bs4', 'this is bs4', 'http://192.168.2.111:9999/upload/slider//2023/4735cf76-65dd-40a3-9996-6ed2169d25b3.webp', 0, NULL, '2023-05-04 00:53:12'),
(8, 'sli-bs4', 'this is bs4', 'http://192.168.2.111:9999/upload/slider//2023/03b0ddd2-eacf-49da-8370-df7b916358f2.webp', 0, NULL, '2023-05-04 00:49:49'),
(9, 'Apple', 'iphone11pro,iphone12pro,iphone13pro', 'http://192.168.2.111:9999/upload/slider//2023/0d7b8176-e5db-4d8f-82cf-4714213e9c2a.jpeg', 1, NULL, NULL),
(10, 'sliTwo', 'this is bs4', 'http://192.168.2.111:9999/upload/slider//2023/3f4b94e0-af5b-4e4d-a38f-d5b11f0ba460.webp', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 'ouj', 'ouj', 1, NULL, '2023-05-11 21:12:15'),
(2, 1, 'Nikon update', 'nikon-update', 1, NULL, '2023-03-14 22:36:43'),
(3, 4, 'Phone', 'phone', 1, NULL, NULL),
(4, 1, 'Sony', 'sony', 1, NULL, NULL),
(5, 1, 'Samsung', 'samsung', 1, NULL, NULL),
(6, 1, 'BenQ', 'benq', 1, NULL, '2023-02-18 05:48:28'),
(7, 3, 'The Shawshank Redemption', 'the-shawshank-redemption', 1, NULL, NULL),
(8, 3, 'Schindler\'s List og', 'schindler\'s-list-og', 1, NULL, '2023-05-11 03:27:54'),
(9, 3, 'Casablanca', 'casablanca', 1, NULL, '2023-02-11 06:14:45'),
(10, 2, 'Fashions Fashion', 'fashions-fashion', 1, NULL, NULL),
(11, 2, 'Dressing Down', 'dressing-down', 1, NULL, NULL),
(12, 2, 'Well Worn', 'well-worn', 1, NULL, NULL),
(13, 2, 'Ideologica', 'ideologica', 1, NULL, '2023-03-14 22:37:22'),
(14, 2, 'Civilian Costume', 'civilian-costume', 1, NULL, NULL),
(15, 2, 'Cultural Slue Trading', 'cultural-slue-trading', 1, NULL, NULL),
(16, 4, 'hard disk drive', 'hard-disk-drive', 1, NULL, NULL),
(17, 4, 'video cassette recorder', 'video-cassette-recorder', 1, NULL, NULL),
(18, 4, 'printer', 'printer', 1, NULL, NULL),
(19, 6, 'Beauty sloon one', 'beauty-sloon-one', 1, NULL, NULL),
(20, 6, 'A Touch of Class', 'a-touch-of-class', 1, NULL, NULL),
(21, 6, 'Mia Bella', 'mia-bella', 1, NULL, NULL),
(22, 6, 'Pretty Parlor', 'pretty-parlor', 1, NULL, NULL),
(23, 6, 'Serenity Salon', 'serenity-salon', 1, NULL, NULL),
(24, 6, 'Tres Beaux', 'tres-beaux', 1, NULL, NULL),
(25, 7, 'Estee Lauder', 'estee-lauder', 1, NULL, NULL),
(26, 7, 'L’Oreal', 'l’oreal', 1, NULL, NULL),
(27, 7, 'L’Oreal', 'l’oreal', 1, NULL, NULL),
(28, 7, 'Maybelline New York', 'maybelline-new-york', 1, NULL, NULL),
(29, 7, 'Guerlain', 'guerlain', 1, NULL, NULL),
(30, 7, 'Chanel', 'chanel', 1, NULL, NULL),
(31, 5, 'A Canon F1 A Canon F1', 'a-canon-f1-a-canon-f1', 1, NULL, NULL),
(32, 5, 'A Canon AE-1 A Canon AE-1', 'a-canon-ae-1-a-canon-ae-1', 1, NULL, NULL),
(33, 5, 'A Canon AV-1 A Canon AV-1', 'a-canon-av-1-a-canon-av-1', 1, NULL, NULL),
(34, 5, 'A Canon EOS 650', 'a-canon-eos-650', 1, NULL, NULL),
(35, 5, 'An original Canon Digital IXUS', 'an-original-canon-digital-ixus', 1, NULL, NULL),
(36, 3, 'greyhound film', 'greyhound-film', 1, NULL, NULL),
(37, 1, 'subcat999', 'subcat999', 1, NULL, NULL),
(38, 1, 'subcat999', 'subcat999', 1, NULL, NULL),
(39, 2, 'irue', 'irue', 1, NULL, '2023-05-02 04:08:47'),
(40, 1, 'od', 'od', 1, NULL, NULL),
(41, 1, 'eiu', 'eiu', 1, NULL, NULL),
(42, 6, 'lolo', 'lolo', 1, NULL, NULL),
(43, 1, 'koko', 'koko', 1, NULL, NULL),
(44, 1, 'kokookokokok', 'kokookokokok', 1, NULL, NULL),
(45, 8, 'bella', 'bella', 1, NULL, NULL),
(46, 1, 'od', 'od', 1, NULL, NULL),
(47, 1, 'Tanjiro Kamado', 'tanjiro-kamado', 0, NULL, '2023-05-11 04:31:12'),
(48, 9, 'kaven', 'kaven', 0, NULL, '2023-05-11 04:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_join` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_short_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','vendor','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `vendor_join`, `vendor_short_info`, `role`, `status`, `remember_token`, `last_seen`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin update', 'admin', 'admin@gmail.com', NULL, '$2y$10$02Hwc2uoUqMxjmIafTPZm.mUdcLZR901i.g4x04E5s/6c.bbPGGhq', '63dd8ce55115e1600w-EW4cggXkgbc.jpg', '0998745612', 'mandalay', NULL, 'surprise', 'admin', 'active', NULL, '2023-05-15 03:21:34', 1, NULL, '2023-05-14 20:51:34'),
(2, 'canon.,Ltd', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$bfxKqRnILl5QvXoeVZOR1ur/uDnDRO5vVoVCkSpeiWm.WRVu5e5jG', '63eeab598d6dbohit-testimonial-img-guthrie-health (1).webp', '0978456123', 'bago', '2023', 'this is testing', 'vendor', 'active', NULL, '2023-05-11 07:14:47', 1, NULL, '2023-05-11 00:44:47'),
(3, 'User', 'user', 'user1@gmail.com', NULL, '$2y$10$N7sVOFCkzsQ5FxvZ81/dheOaHbJNofkXpfqgV8juVKzBR9M4pKvfu', '641c45380d543istockphoto-1350833930-170667a.jpeg', '098745231', 'yangon', NULL, 'amazing', 'user', 'active', NULL, '2023-03-30 12:01:24', 1, NULL, '2023-03-30 05:31:24'),
(12, 'userone', 'Joeo', 'user@gmail.com', NULL, '$2y$10$emSTzUqgxNMq0rxxblE2euWBcLMrDURCZtz3Dp4lfbXK4p2mRpYgu', '641ff591229cbistockphoto-1356785346-170667a.jpeg', '0987456123', 'yangon', NULL, 'awesome', 'user', 'active', NULL, '2023-05-11 09:46:27', 1, '2023-02-08 05:06:35', '2023-05-11 03:16:27'),
(13, 'usertwo', 'usetwo', 'usertwo@gmail.com', NULL, '$2y$10$utLPbvf.nd/La6VqBvnYtuE0UBZGMpDe28wXxXRzkdx9DyK4NnbaO', NULL, '09874566', 'mandalay', NULL, 'heool', 'user', 'active', NULL, NULL, 1, '2023-02-08 05:09:53', '2023-02-08 05:09:53'),
(14, 'Nikon', 'nikon', 'nikon@gmail.com', NULL, '$2y$10$bfxKqRnILl5QvXoeVZOR1ur/uDnDRO5vVoVCkSpeiWm.WRVu5e5jG', '63e54f28a2facnikon-logo.jpg', '09874562123', 'Japan', '2022', 'Nikon\'s products include cameras, camera lenses, binoculars, microscopes, ophthalmic lenses, measurement instruments, rifle scopes, spotting scopes, and the steppers used in the photolithography steps of semiconductor fabrication, of which it is the world\'s second largest manufacturer.[4]', 'vendor', 'active', NULL, NULL, 1, NULL, '2023-02-25 03:44:23'),
(15, 'panisonic', 'panisonic', 'pansonic@gmail.com', NULL, '$2y$10$bfxKqRnILl5QvXoeVZOR1ur/uDnDRO5vVoVCkSpeiWm.WRVu5e5jG', '63eeaa1b8be0cFree-Download-.PSD-Luxury-Brand-Elegant-Royal-Logo-Design-scaled.jpg', '039874561', 'Newyork', '2023', 'Panasonic Holdings Corporation,[a] formerly Matsushita Electric Industrial Co., Ltd.[b] between 1935 and 2008 and the first incarnation of Panasonic Corporation[c] between 2008 and 2022,[1] is a major Japanese multinational conglomerate corporation, headquartered in Kadoma, Osaka. It was founded by Kōnosuke Matsushita in 1918 as a lightbulb socket manufacturer.[3] In addition to consumer electronics, of which it was the world\'s largest maker in the late 20th century, Panasonic offers a wide range of products and services, including rechargeable batteries, automotive and avionic systems, industrial systems, as well as home renovation and construction', 'vendor', 'active', NULL, NULL, 1, NULL, '2023-02-17 06:11:39'),
(16, 'GUCCI', 'GUCCI', 'gucci@gmail.com', NULL, '$2y$10$bfxKqRnILl5QvXoeVZOR1ur/uDnDRO5vVoVCkSpeiWm.WRVu5e5jG', '63e550e0d230bgucci.png', '0321654987', 'England', '2023', 'Gucci (/ˈɡuːtʃi/ (listen), GOO-chee; Italian pronunciation: [ˈɡuttʃi]) is an Italian high-end luxury fashion house based in Florence, Italy.[1][2][3] Its product lines include handbags, ready-to-wear, footwear, accessories, and home decoration; and it licenses its name and branding to Coty, Inc. for fragrance and cosmetics under the name Gucci Beauty.[4]', 'vendor', 'active', NULL, NULL, 1, NULL, '2023-02-10 07:08:32'),
(17, 'admin two', 'admintwo', 'admintwo@gmail.com', NULL, '$2y$10$vHNiyOXd2E.lX0bH91EmPuP4HIiOK/s0P.U1iRmxTYVDVtHvYDEbm', '642a94aee9895istockphoto-1347495868-170667a.jpeg', '0987654321', 'Mandalay', NULL, NULL, 'admin', 'active', NULL, '2023-04-04 04:43:51', 1, '2023-04-03 02:12:55', '2023-04-03 22:13:51'),
(18, 'admin three', 'adminthree', 'adminthree@gmail.com', NULL, '$2y$10$kTiXmy27TzJRIMPNYIObqefdMcRsqLt468KKgTsP9DKPRixkrvn9.', NULL, '09987655433', 'pyay', NULL, NULL, 'admin', 'active', NULL, '2023-04-04 04:52:21', 1, '2023-04-03 02:17:48', '2023-04-03 22:22:21'),
(19, 'admin four', 'admin four', 'adminfour@gmail.com', NULL, '$2y$10$XKOd3SemiHM4JID.KWPVQOguPxYo9E6LAFEe8d3B9c/oq6MJe4HQ2', NULL, '098776543333', 'yangon', NULL, NULL, 'admin', 'active', NULL, '2023-04-03 11:25:44', 1, '2023-04-03 04:32:32', '2023-04-03 04:55:44'),
(20, 'admin five', 'admin five', 'adminfive@gmail.com', NULL, '$2y$10$4I70bXKJW/sg2Cu4tctC7uIVrmPxHw0YUKkQlBdrpsj9K5Idrtqo6', NULL, '09877654000', 'yangon', NULL, NULL, 'admin', 'active', NULL, '2023-04-04 08:12:18', 1, '2023-04-03 04:33:32', '2023-04-04 01:42:18'),
(21, 'ueer', 'ueer', 'ueea@gmail.com', NULL, '$2y$10$eVBdhJ0EOL.L1PFZZSdd0.D3hzoHmpjD41oHHVWD2wdVrbBHEZ9aa', 'upload/vendor_images/1762400516540497.jpeg', '09876543322', 'yangon', '2023', 'this is short info', 'vendor', 'active', NULL, '2023-04-04 09:55:33', 1, '2023-04-04 02:28:30', '2023-04-05 22:11:48'),
(22, 'ueer', 'testing', 'ueer@gmail.com', NULL, '$2y$10$10cQcQ5qjB.GtMUUBEYXR.dTeVixHwFgWy3MKlHnqeTgyGXO5f9bK', 'upload/vendor_images/1762532627278148.jpeg', '09876543322', 'yangon', '2023', 'this is short info', 'user', 'active', NULL, NULL, 1, '2023-04-04 02:39:19', '2023-04-07 09:11:38'),
(23, 'artshopmyanmar', 'artshopmyanmar', 'artshopmyanmar@gmail.com', NULL, '$2y$10$GKvsqhjUIcXlmFNyB5Spd.oA1eTq7TKSe.rHYbfQigVHEx6EKKLZq', '642c3771eea6bart_shop_LOGO.jpeg', '098776543333', 'yangon', '2023', 'this is art shop', 'vendor', 'active', NULL, '2023-04-04 14:43:16', 1, NULL, '2023-04-04 08:13:16'),
(24, 'admintest', 'admintest', 'admintest@gmail.com', NULL, '$2y$10$przoAtJDFnXc6P.KLGPV1OxAMuoRkNMI10jrSS1Xeyg99jquwKj.S', NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, 1, '2023-04-06 10:33:31', '2023-04-06 10:33:31'),
(25, 'admintest', 'admintest', 'admintesting@gmail.com', NULL, '$2y$10$./f6FMRQaL9NkQbU74CWK.2YRZ5fLH9uzJ3REmq5Eqlzi/pumv0.i', NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, 1, '2023-04-06 20:27:19', '2023-04-06 20:27:19'),
(26, 'admintest', 'admintest', 'admin99@gmail.com', NULL, '$2y$10$uvB0Q65.zqiyCr/JoIht5OV1BORvSVT3U5ATb//dcIYH05FMZtvve', NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, 1, '2023-04-06 22:14:20', '2023-04-06 22:14:20'),
(27, 'testing', 'testing', 'user999@gmail.com', NULL, '$2y$10$H7iPv/CZStwE.fnRFX1qGOL7DzJH4mNgW4MHXqB7.sd09czdJBPLS', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-07 02:07:40', '2023-04-07 02:07:40'),
(28, 'Shalala', 'shalala', 'shalavendor@gmail.com', NULL, '$2y$10$0CcATUNTx01ydFPqWCJT6Oi2xGsejGP33fiMAiYCHenMfO5UGjIOi', NULL, '098776543333', NULL, '2023', NULL, 'vendor', 'active', NULL, '2023-04-09 12:01:27', 1, NULL, '2023-04-09 05:31:27'),
(29, 'suevendor', 'suevendor', 'suevendor@gmail.com', NULL, '$2y$10$owERpuFm5MDeNQe4yiSnRucKgRdqhdbSBnSFBvofmCWxepXAoH1fG', NULL, '09877654000', NULL, '2023', NULL, 'vendor', 'inactive', NULL, NULL, 1, NULL, NULL),
(30, 'shopvendor', 'shopvendor', 'shopvendor@gmail.com', NULL, '$2y$10$JTlV/leqnjR5h2n/TWIMdu.S79/6zYPMvtoHq02P5M7iuzr9ccKaC', NULL, '09877654000', NULL, 'Open this select Join Date', NULL, 'vendor', 'inactive', NULL, NULL, 1, NULL, NULL),
(31, 'shopvendor', 'shopvendor', 'shopvendorone@gmail.com', NULL, '$2y$10$8E.rEgkWIxuelk5.evtdGefzKNJbeziQdZ/XvBmZp/KwQ/5ddmXMu', NULL, '098776543333', NULL, '2023', NULL, 'vendor', 'inactive', NULL, NULL, 1, NULL, NULL),
(32, 'gorovendor', 'gorovendor', 'goro@gmail.com', NULL, '$2y$10$hmXt0hBbs9dWrmWzjiCbbu.D.cWRrJTz.35vIh/xwPtZDrESZdcQi', NULL, '098776543333', NULL, '2022', NULL, 'vendor', 'inactive', NULL, NULL, 1, NULL, NULL),
(33, 'update-test', 'sohovendor', 'upd@gmail.com', NULL, '$2y$10$6XknMHx7Hf6ldqeHcLogFeL6Yppgo4GddD4b9CLX42O2eCmrO3EJK', 'upload/user_images/1763778801591015.jpeg', '098776555555', 'ygn', '2023', NULL, 'vendor', 'inactive', NULL, NULL, 1, NULL, '2023-05-02 04:31:35'),
(34, 'userso', 'userso', 'suserso@gmail.com', NULL, '$2y$10$kV8fB9.LajsQfSre1nL8qePBLf.Ilx3nsqunf3FMUWCkOAfgodCX6', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-09 04:28:02', '2023-04-09 04:28:02'),
(35, 'usermomo', 'usermomo', 'usermomo@gmail.com', NULL, '$2y$10$gum7jI5489gIOjv6zuMa8ehcAvUA5L4B2vdcsxOSjmwQbdTUumQye', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-09 04:34:20', '2023-04-09 04:34:20'),
(38, 'testing', 'testing', 'user9999@gmail.com', NULL, '$2y$10$4QE2XL9e1CDaxecJKyYmq.adIiOANMusIyygHFCy9eNJQqv1vj8ny', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-18 21:46:32', '2023-04-18 21:46:32'),
(39, 'testing', 'testing', 'user9988@gmail.com', NULL, '$2y$10$KPevu5tfqXvpbhrxGMlbCuwLAhWGvEZPRlnSAoXhkbj0XLGfwRVpe', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-18 21:55:15', '2023-04-18 21:55:15'),
(40, 'testing', 'testing', 'user9980@gmail.com', NULL, '$2y$10$OudHPJncMw5GdpQk8SJ7c.gQd6UDWw2Av.1H580DtE31Sxrd/RCeC', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-18 23:59:14', '2023-04-18 23:59:14'),
(41, 'kooko', 'konay', '1234@gmail.com', NULL, '$2y$10$0DNfvgqjmV3AVPm5xdntrOON2IZnR1OcOGrFthvR6gSQFtcdh0Z/6', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 00:01:14', '2023-04-19 00:01:14'),
(43, 'Mg Mg', 'KoKo', 'nayoolwin256@gmail.com', NULL, '$2y$10$7jZavcgs/0wXPK90.zc6gOYBloS/KCJaZpcwVtcOUnniLu5m5yhIO', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 00:02:34', '2023-04-19 00:02:34'),
(44, 'koko', 'nayw', 'nol@gmail.com', NULL, '$2y$10$9iiGefGrA6nzhsgSACQ5Fu3hG9FYxtg2pIwUPINrNC6C5K2rA8wYS', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 00:51:44', '2023-04-19 00:51:44'),
(51, 'mgba', 'MgHla', 'mghla@gmail.com', NULL, '$2y$10$Xj3FEWDzetptU1d7LDGhtuiddKg8ZpyMRJjDdXs4SLQEtUNxw3QoS', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 01:01:28', '2023-04-19 01:01:28'),
(56, 'nae', 'nol', 'no4@gmail.com', NULL, '$2y$10$yumcjPbOaspMiaLX0DcakeSVbbe9j9xRZyT0N6miZTClEAfv2Gz3m', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 01:05:51', '2023-04-19 01:05:51'),
(63, 'test', 'test23', 'test@gmail.com', NULL, '$2y$10$Pxn9zSFerMRF8i1o2VpC9.itea0Etw3ylWNhPBEHJhlpN5UdV59qm', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 01:12:37', '2023-04-19 01:12:37'),
(65, 'Mya Mya', 'Mya Myint', 'nayoolwin@gmail.com', NULL, '$2y$10$Rsd0KdVWOZrK.oUx0j3VIuuEo4RRY14tsAexfpKOnfGWa3jOmyj0S', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 01:15:28', '2023-04-19 01:15:28'),
(66, 'test23', 'test25', 'tes56t@gmail.com', NULL, '$2y$10$MBBGv/LhVNZM2wYYE1GVIe8x6lW/FE5vFxgPypEC38DqHIglrgb8e', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 01:16:31', '2023-04-19 01:16:31'),
(68, 'nayoo', 'Nay Oo Lwin', 'no1234@gmail.com', NULL, '$2y$10$KH6J/uPpyNzzC2GLuX7gIuamw4l0T4gcy3IifxRIT78Cy0lbI/8Ja', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 21:32:26', '2023-04-19 21:32:26'),
(69, 'Nay Oo', 'Testing 23', 'tester123@gmail.com', NULL, '$2y$10$pmrg6h0EYbt6Dpv1U/JwZeC.hS5mQ7pNZ9/gpzlDcpJPR1Qd8k0Qa', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-19 21:35:33', '2023-04-19 21:35:33'),
(70, 'KOTst89', 'anime', 'anime@gmail.com', NULL, '$2y$10$qe/rROkWTEdRWJ0Odi/J4uUcQT5u3lqW4VfiMOosSmOc/Ws5rJ/3y', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-04-20 03:16:03', '2023-04-20 03:16:03'),
(71, 'iee', 'ei', '2@gamil.com', NULL, '$2y$10$qUd0SMKKSOFL3tKOXJ/bL.PBBhalqZHi8EYUT0WPEfX7nH9Kq2nvC', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, 1, '2023-05-02 04:15:09', '2023-05-02 04:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_varified_at` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vendor_join` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vendor_short_info` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(225) COLLATE utf8mb4_general_ci DEFAULT 'vendor',
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'active',
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_seen` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `token_expired_at` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `delete_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `username`, `email`, `email_varified_at`, `password`, `photo`, `phone`, `address`, `vendor_join`, `vendor_short_info`, `role`, `status`, `remember_token`, `auth_token`, `last_seen`, `last_login`, `token_expired_at`, `expired_date`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'vendor', 'vendor', 'vendor999@gmail.com', NULL, '$2y$10$AbSIyJWQGtC04ex.pacc/.5NwOSbIZm7kWKLg5BJdOc7uN4AWZcr6', NULL, NULL, NULL, NULL, NULL, 'vendor', 'inactive', NULL, NULL, NULL, '2023-05-02', NULL, NULL, 1, '2023-04-07 05:15:51', '2023-05-02 02:44:51'),
(2, 'Vendor1234', 'vendor', 'vendor12@gmail.com', NULL, '$2y$10$94ik.6p3t1MBt03BpQFofe8NzjaX0l32EFuFMPywibeZ8fhOUbJK2', 'http://192.168.2.111:9999/upload/vendor_images/Vendor1234/2023/25608c64-8e2d-4659-981b-6a3384e19a38.', '09962297286', 'ygn', '2023', 'this is short info', 'vendor', 'inactive', NULL, 'SUV3UkdRZDVRNldtMm9iMDN4TnlP64300872d2463', NULL, NULL, '2023-04-14', NULL, 1, '2023-04-07 05:41:30', '2023-05-10 22:46:07'),
(3, 'NAy', 'Nay ool Win', 'nay@gmail.c', NULL, '$2y$10$.BwU/2E9YS6FXu2ORsd.P.Ow9Y8Wo0cdMZEQ8qwMhOv0yjEvkYB5S', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'ZlZFVk9Bb1RVYVdGcWZCcmxVV3VD64479b177c936', NULL, NULL, '2023-05-02', NULL, 1, '2023-04-25 02:49:19', '2023-04-25 02:49:19'),
(4, 'vendor', 'vendor', 'vendor888@gmail.com', NULL, '$2y$10$u5h6pZtEADmI3zs.2hFAR.Cv4K2qGFC7bLk1y0.stbM6UsoLZiv3O', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'V21LeW13RG5QS3NSM0drSGx4STVK6448e57ac0aaf', NULL, NULL, '2023-05-03', NULL, 1, '2023-04-26 02:18:58', '2023-04-26 02:18:58'),
(5, 'KoKO', 'Konay', 'nayoolwin123@gmail.com', NULL, '$2y$10$YmxSlz3lyehJ.kFd9OAA5Or1EH6CiY.OyL10z/33wOFtqf2TdkWWa', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'OWF6RVZUUmlwZkdCUGlZcDlTOUpW6448f06439505', NULL, NULL, '2023-05-03', NULL, 1, '2023-04-26 03:05:32', '2023-04-26 03:05:32'),
(7, 'vendor1', 'vendor1', 'vendor111@gmail.com', NULL, '$2y$10$cGHUjEb1458w8ipT2rhMnu/gieRN80cez3MSSANDK3Tqz6Zscfgv6', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'QmgyeUd5NTJ3REJqajhPajR3aHNZ6448f0cc9866f', NULL, NULL, '2023-05-03', NULL, 1, '2023-04-26 03:07:16', '2023-04-26 03:07:16'),
(8, 'nay1', 'Konay1', 'nayoolwin13@gmail.com', NULL, '$2y$10$g.XfhZUXsvon87A6E6rqNO5.T3SZM3ARk.SYhVBrjSY5EJGHZXury', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'VFJCamRuZnZPak1WWHJQcHFXb3pl6448f12e627da', NULL, '2023-04-26', '2023-05-03', NULL, 1, '2023-04-26 03:07:56', '2023-04-26 03:08:54'),
(9, 'n', 'nay', 'nay@gmail.com', NULL, '$2y$10$ifpNRXSWsarpATPV/2lQSer/6Ba6omV2tBqGopLhOwQDBwhENvKUO', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'eE9RcHcyZmZyQm92eE9aYUVzMThk6449f9a73add2', NULL, '2023-04-27', '2023-05-04', NULL, 1, '2023-04-26 21:56:16', '2023-04-26 21:57:19'),
(12, 'ii', 'ieo', 'r@gmail.com', NULL, '$2y$10$jZjUWHOmDbA0HdzByU6gXe.7vgDgPRe0nyVLgkMq9NBvEdeJne7vC', NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, 'TFBud0JkVjNHamd5Sk40VHdUeHFL6450d424042b1', NULL, NULL, '2023-05-09', NULL, 1, '2023-05-02 02:43:08', '2023-05-02 02:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(38, 3, 9, '2023-03-30 02:06:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
