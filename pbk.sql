-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2026 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:02:40'),
(2, 1, 'banner_update', 'Updated banner #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:23:08'),
(3, 1, 'banner_create', 'Created banner #2: Veera', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:23:20'),
(4, 1, 'banner_delete', 'Deleted banner #1: புதியதொரு தேசம் செய்வோம்!', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:33:21'),
(5, 1, 'banner_delete', 'Deleted banner #2: Veera', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:33:24'),
(6, 1, 'banner_create', 'Created banner #3: Banner', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:33:39'),
(7, 1, 'banner_create', 'Created banner #4: v2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:33:51'),
(8, 1, 'menu_delete', 'Deleted menu item #9: விதிமுறைகள்', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:36:09'),
(9, 1, 'menu_delete', 'Deleted menu item #3: செய்திகள்', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-25 13:36:21'),
(10, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-07-31 15:43:13'),
(11, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 13:18:53'),
(12, 1, 'logout', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 13:28:18'),
(13, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 13:29:33'),
(14, 1, 'logout', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 13:31:43'),
(15, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 13:37:41'),
(16, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 14:13:07'),
(17, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-11 14:17:29'),
(18, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 18:59:33'),
(19, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 19:01:39'),
(20, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 19:11:55'),
(21, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:41:07'),
(22, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:44:54'),
(23, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:45:06'),
(24, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:45:18'),
(25, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:45:29'),
(26, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 07:46:31'),
(27, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:47:16'),
(28, 1, 'media_editor_upload', 'Editor uploaded media #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:48:09'),
(29, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:48:15'),
(30, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:49:16'),
(31, 1, 'page_update', 'Updated page #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:54:13'),
(32, 1, 'page_update', 'Updated page #2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:55:22'),
(33, 1, 'page_update', 'Updated page #3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:55:53'),
(34, 1, 'page_update', 'Updated page #4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:56:08'),
(35, 1, 'page_update', 'Updated page #6', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 10:56:26'),
(36, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-01 18:01:14'),
(37, 1, 'page_delete', 'Deleted page #4: நோக்கம்', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-01 18:09:37'),
(38, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-16 18:14:59'),
(39, 1, 'gallery_create', 'Created gallery #2: VEERA', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-16 18:21:52'),
(40, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-17 19:10:25'),
(41, 1, 'menu_create', 'Created menu item #16: Varalaru', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-17 19:19:35'),
(42, 1, 'menu_create', 'Created menu item #17: test', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-17 19:20:32'),
(43, 1, 'menu_create', 'Created menu item #18: VEERA', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-17 19:24:35'),
(44, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-18 22:29:45'),
(45, 1, 'video_create', 'Created video #2: VEERA', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-18 22:31:07'),
(46, 1, 'post_update', 'Updated post #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-18 22:35:06'),
(47, 1, 'post_update', 'Updated post #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-18 22:35:47'),
(48, 1, 'settings_update', 'Site settings updated', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-18 23:18:20'),
(49, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-19 08:26:58'),
(50, 1, 'gallery_update', 'Updated gallery #2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-19 08:27:06'),
(51, 1, 'gallery_update', 'Updated gallery #2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-19 08:27:13'),
(52, 1, 'settings_update', 'Site settings updated', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-19 08:29:06'),
(53, 1, 'login', 'User logged in', '::1', 'CMS-Active-Toggle-Test', '2026-09-19 08:33:01'),
(54, 1, 'gallery_update', 'Updated gallery #2', '::1', 'CMS-Active-Toggle-Test', '2026-09-19 08:33:01'),
(55, 1, 'gallery_update', 'Updated gallery #2', '::1', 'CMS-Active-Toggle-Test', '2026-09-19 08:33:01'),
(56, 1, 'login', 'User logged in', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 18:18:13'),
(57, 1, 'gallery_image_delete', 'Deleted gallery image #1', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 18:18:30'),
(58, 1, 'gallery_image_delete', 'Deleted gallery image #3', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 18:18:32'),
(59, 1, 'gallery_image_delete', 'Deleted gallery image #2', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 18:18:33'),
(60, 1, 'gallery_images_upload', 'Uploaded images to gallery #2', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 18:18:46'),
(61, 1, 'login', 'User logged in', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:16:49'),
(62, 1, 'menu_delete', 'Deleted menu item #18: VEERA', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:23:18'),
(63, 1, 'seo_sitemap', 'Generated sitemap.xml', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:26:42'),
(64, 1, 'contact_delete', 'Deleted contact message #1', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:28:06'),
(65, 1, 'media_delete', 'Deleted media #1: 101.PNG', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:28:25'),
(66, 1, 'announcement_create', 'Created announcement #3: Test', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:28:56'),
(67, 1, 'announcement_update', 'Updated announcement #3', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:29:30'),
(68, 1, 'announcement_update', 'Updated announcement #3', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:29:50'),
(69, 1, 'announcement_update', 'Updated announcement #2', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:30:05'),
(70, 1, 'menu_create', 'Created menu item #19: Test', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:37:06'),
(71, 1, 'logout', 'User logged out', '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-09-26 15:39:03'),
(72, 1, 'login', 'User logged in', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-26 16:04:06'),
(73, 1, 'menu_update', 'Updated menu item #2', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-26 16:05:19'),
(74, 1, 'menu_update', 'Updated menu item #4', '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-26 16:06:39'),
(75, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:25:06'),
(76, 1, 'org_member_delete', 'Deleted member #1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:26:45'),
(77, 1, 'org_member_delete', 'Deleted member #2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:26:47'),
(78, 1, 'org_member_delete', 'Deleted member #3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:26:53'),
(79, 1, 'org_member_import', 'Imported 0 members', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:26:57'),
(80, 1, 'org_member_import', 'Imported 0 members', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-11 20:27:11'),
(81, 1, 'login', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '2026-10-11 20:38:57'),
(82, 1, 'login', 'User logged in', '::1', 'curl/8.21.0', '2026-10-11 20:39:32'),
(83, 1, 'org_member_photo', 'Updated photo for member #4', '::1', 'curl/8.21.0', '2026-10-11 20:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `type` enum('breaking','scrolling','popup','alert') NOT NULL DEFAULT 'scrolling',
  `link` varchar(500) DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `type`, `link`, `starts_at`, `ends_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'முக்கிய அறிவிப்பு', 'வரவிருக்கும் மாவட்டக் கூட்டங்களில் கலந்து கொள்ளுங்கள்.', 'scrolling', NULL, NULL, NULL, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, 'பிரேக்கிங் நியூஸ்', 'புதிய அறிக்கை வெளியீடு', 'breaking', '/news', NULL, NULL, 1, '2026-07-25 09:31:57', '2026-09-26 15:30:05'),
(3, 'Test', 'Test', 'popup', 'https://pbkofficial.in/page/about', NULL, NULL, 1, '2026-09-26 15:28:56', '2026-09-26 15:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self',
  `type` enum('slider','popup','sidebar','footer','advertisement','category') NOT NULL DEFAULT 'slider',
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `image`, `mobile_image`, `link`, `target`, `type`, `category_id`, `sort_order`, `status`, `starts_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(3, 'Banner', '', 'uploads/banners/e5f00bd2525a7abd_1784966619.jpg', NULL, '', '_self', 'slider', NULL, 0, 1, NULL, NULL, '2026-07-25 13:33:39', '2026-07-25 13:33:39'),
(4, 'v2', '', 'uploads/banners/a05c96aaa439cda5_1784966631.jpg', NULL, '', '_self', 'slider', NULL, 0, 1, NULL, NULL, '2026-07-25 13:33:51', '2026-07-25 13:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `description` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `banner`, `image`, `seo_title`, `seo_description`, `seo_keywords`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'அறிக்கைகள்', 'arikkaihal', 'தலைமை ஒருங்கிணைப்பாளர் அறிக்கைகள்', NULL, NULL, 'அறிக்கைகள்', NULL, NULL, 0, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, NULL, 'அறிவிப்புகள்', 'arivippukal', 'அதிகாரப்பூர்வ அறிவிப்புகள்', NULL, NULL, 'அறிவிப்புகள்', NULL, NULL, 1, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(3, NULL, 'நிகழ்வுகள்', 'nigalvugal', 'கட்சி நிகழ்வுகள்', NULL, NULL, 'நிகழ்வுகள்', NULL, NULL, 2, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(4, NULL, 'செய்திகள்', 'seythigal', 'சமீபத்திய செய்திகள்', NULL, NULL, 'செய்திகள்', NULL, NULL, 3, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(190) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `map_embed` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `registration_link` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `description`, `location`, `map_embed`, `event_date`, `event_time`, `banner`, `registration_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'மாநில மாநாடு 2026', 'manila-manadu-2026', '<p>மாநில அளவிலான மாநாடு.</p>', 'Chennai, Tamil Nadu', NULL, '2026-08-24', '10:00:00', NULL, NULL, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `slug`, `description`, `cover_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'பொதுக்கூட்டங்கள்', 'pothukkootangal', 'சமீபத்திய பொதுக்கூட்டப் படங்கள்', NULL, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, 'VEERA', 'veera', '', 'uploads/gallery/ec47878b06e9737f_1789563087.png', 1, '2026-09-16 18:21:34', '2026-09-19 08:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
(4, 2, 'uploads/gallery/62ad4bc3a23e6ed4_1790254126.jpg', NULL, 1, '2026-09-24 12:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `folder` varchar(150) DEFAULT 'root',
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `path` varchar(500) NOT NULL,
  `thumb_path` varchar(500) DEFAULT NULL,
  `webp_path` varchar(500) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT 0,
  `width` int(10) UNSIGNED DEFAULT NULL,
  `height` int(10) UNSIGNED DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `membership_id` varchar(32) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(100) DEFAULT 'Ó«çÓ«¿Ó»ìÓ«ñÓ«┐Ó«»Ó«¥',
  `phone` varchar(30) NOT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `email` varchar(190) NOT NULL,
  `state` varchar(100) DEFAULT 'Ó«ñÓ««Ó«┐Ó«┤Ó»ìÓ«¿Ó«¥Ó«ƒÓ»ü',
  `district` varchar(100) DEFAULT NULL,
  `constituency` varchar(150) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `area_type` varchar(100) DEFAULT NULL,
  `area_detail` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `temp_address` text DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `voter_id` varchar(50) DEFAULT NULL,
  `booth_no` varchar(50) DEFAULT NULL,
  `blood_group` varchar(20) DEFAULT NULL,
  `contribution` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `membership_id`, `photo`, `name`, `father_name`, `gender`, `dob`, `country`, `phone`, `whatsapp`, `email`, `state`, `district`, `constituency`, `pincode`, `area_type`, `area_detail`, `address`, `temp_address`, `ward`, `voter_id`, `booth_no`, `blood_group`, `contribution`, `status`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'TMM266B2E9B', 'uploads/members/80b196480bd535cf_1785297182.jpeg', 'VEERA', 'Kanan', 'ஆண்', '2004-02-17', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'திருப்பூர்', 'sdfdsfdsf', '987456', 'மாநகராட்சி', 'wefwefwe', 'dsfdfdsfdsfdsfdsfdsf', 'asdsad', 'asdad', 'asd', 'sadsa', 'A+', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-07-29 09:23:02', '2026-07-29 09:23:02'),
(2, 'TMM263BE813', 'uploads/members/ae142d6fceb77449_1785297753.png', ' ANBU', 'FAther', 'ஆண்', '2004-02-20', 'இந்தியா', '7896541230', '', 'veeravikas2524@gmail.com', 'தமிழ்நாடு', 'சேலம்', '132', '748596', 'மாநகராட்சி', 'dfdsfdfdsf', 'Test ', 'dfsf', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-07-29 09:32:33', '2026-07-29 09:32:33'),
(3, 'PBK_RESQJ5', 'uploads/members/03e8a5ddb8381d7a_1785998057.jpg', 'VEERA', 'Kannan', 'ஆண்', '2000-03-15', 'இந்தியா', '9786251663', '8015392669', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'தர்மபுரி', '41', '600042', 'மாநகராட்சி', 'melur', '௫./௫௫ மஹேஸ்வரி நகர் வேளச்சேரி ௧௦௦ பீட் ரோடு', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-06 12:04:17', '2026-08-06 12:04:17'),
(4, 'PBK_5ASE98', NULL, 'Raja', 'Test', 'ஆண்', '2026-08-06', 'இந்தியா', '7896541230', '8015392669', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'ஈரோடு', 'aad', '600042', 'மாநகராட்சி', 'Test', 'ad3e32', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-06 12:18:02', '2026-08-06 12:18:02'),
(5, 'PBK_ZQB9B9', NULL, 'dasd', 'sdasd', 'ஆண்', '2000-02-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'தர்மபுரி', '132', '600042', 'மாநகராட்சி', '342', 'sdfdsfs', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-06 19:15:05', '2026-08-06 19:15:05'),
(6, 'PBK_9XZA6C', 'uploads/members/153f03a5bc6261fd_1786073139.jpg', 'VEERA', 'KAnnan', 'ஆண்', '2000-11-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'கிருஷ்ணகிரி', 'Tet', '600422', 'மாநகராட்சி', 'TEST', 'GEfwewertwrw', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-07 08:55:39', '2026-08-07 08:55:39'),
(7, 'PBK_ZNFWKP', 'uploads/members/79ba78691d66dc31_1786336207.jpg', 'Raju', 'Ram', 'ஆண்', '1998-01-11', 'இந்தியா', '7485963210', '', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'ஈரோடு', '234', '600042', 'மாநகராட்சி', 'wefwefwe', 'sdf', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-10 10:00:07', '2026-08-10 10:00:07'),
(8, 'PBK_YM9R3L', 'uploads/members/499ab2eace541569_1786339046.jpg', 'Rag', 'werew', 'ஆண்', '2000-01-11', 'இந்தியா', '7896541230', '', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'நாமக்கல்', '41', '748596', 'மாநகராட்சி', 'dfdsfdfdsf', 'erwrww', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-10 10:47:27', '2026-08-10 10:47:27'),
(9, 'PBK_EYFBF7', 'uploads/members/99a637fe79a52d00_1786425148.png', 'Ram', 'Test', 'ஆண்', '2000-01-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'நாமக்கல்', 'aad', '600042', 'நகராட்சி', 'wefwefwe', 'erwfwssdfsfs', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-11 10:42:28', '2026-08-11 10:42:28'),
(10, 'PBK_8Y49PU', 'uploads/members/bdb5662ee1ef0980_1786425589.png', 'Veera', 'Kanan', 'பெண்', '1999-01-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'காஞ்சிபுரம்', '132', '600042', 'நகராட்சி', 'dfdsfdfdsf', 'sdffdfs', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-11 10:49:49', '2026-08-11 10:49:49'),
(11, 'PBK_VLAV2H', 'uploads/members/aa1f8a1f5e545791_1786426209.png', 'Raffe', 'FAther', 'ஆண்', '2000-01-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'நாமக்கல்', 'Tet', '600042', 'மாநகராட்சி', 'wefwefwe', 'Velachery\r\nMaheshwari Nagar', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-11 11:00:09', '2026-08-11 11:00:09'),
(12, 'PBK_4RU6CK', 'uploads/members/7ee74854b9882683_1786427061.png', 'Rany', 'Munusamy', 'ஆண்', '2000-01-11', 'இந்தியா', '7896541230', '7485963210', 'veeravikas25@gmail.com', 'தமிழ்நாடு', 'காஞ்சிபுரம்', '141', '600042', 'மாநகராட்சி', 'wefwefwe', 'Velachery\r\nMaheshwari Nagar', '', '', '', '', '', 'இதில் எதுவும் இல்லை', 1, '::1', '2026-08-11 11:14:21', '2026-08-11 11:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `url_type` enum('internal','external') NOT NULL DEFAULT 'internal',
  `route_name` varchar(255) DEFAULT NULL,
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self',
  `icon` varchar(100) DEFAULT NULL,
  `location` enum('header','footer','sidebar') NOT NULL DEFAULT 'header',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `url_type`, `route_name`, `target`, `icon`, `location`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'முகப்பு', '/', 'internal', NULL, '_self', NULL, 'header', 0, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, 16, 'எங்களைப் பற்றி', '/page/about', 'internal', '', '_self', '', 'header', 0, 1, '2026-07-25 09:31:57', '2026-09-26 16:05:19'),
(4, 1, 'நிகழ்வுகள்', '/events', 'internal', '', '_self', '', 'header', 3, 1, '2026-07-25 09:31:57', '2026-09-26 16:06:39'),
(5, NULL, 'தொகுப்பு', '/gallery', 'internal', NULL, '_self', NULL, 'header', 4, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(6, NULL, 'காணொளிகள்', '/videos', 'internal', NULL, '_self', NULL, 'header', 5, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(7, NULL, 'தொடர்பு', '/contact', 'internal', NULL, '_self', NULL, 'header', 6, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(8, NULL, 'தனியுரிமைக் கொள்கை', '/page/privacy-policy', 'internal', NULL, '_self', NULL, 'footer', 0, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(10, NULL, 'தொடர்பு', '/contact', 'internal', NULL, '_self', NULL, 'footer', 2, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(11, NULL, 'உறுப்பினர் சேர்க்கை', '/membership', 'internal', NULL, '_self', NULL, 'header', 7, 1, '2026-07-29 09:05:47', '2026-07-29 09:22:08'),
(12, NULL, 'அமைப்பு', '/organization', 'internal', NULL, '_self', NULL, 'header', 3, 1, '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(13, NULL, 'வரலாறு', '/page/history', 'internal', NULL, '_self', NULL, 'header', 1, 0, '2026-09-01 14:24:47', '2026-09-26 16:07:14'),
(14, NULL, 'தொலைநோக்கு', '/page/vision', 'internal', NULL, '_self', NULL, 'header', 2, 0, '2026-09-01 14:24:47', '2026-09-26 16:07:14'),
(16, 13, 'Varalaru', '/page/history', 'internal', '', '_self', '', 'footer', 0, 1, '2026-09-17 19:19:35', '2026-09-17 19:19:35'),
(17, 13, 'test', '/page/history', 'internal', '', '_self', '', 'footer', 0, 1, '2026-09-17 19:20:32', '2026-09-17 19:20:32'),
(19, 16, 'Test', '/page/vision', 'internal', '', '_blank', '', 'sidebar', 0, 1, '2026-09-26 15:37:06', '2026-09-26 15:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(190) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `subscribed_at` datetime DEFAULT current_timestamp(),
  `unsubscribed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization_members`
--

CREATE TABLE `organization_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `tamil_name` varchar(200) DEFAULT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `assembly` varchar(150) DEFAULT NULL,
  `parliament` varchar(150) DEFAULT NULL,
  `district` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(100) DEFAULT 'தமிழ்நாடு',
  `zone` varchar(100) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `email` varchar(190) DEFAULT NULL,
  `whatsapp` varchar(40) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `biography` longtext DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_members`
--

INSERT INTO `organization_members` (`id`, `team_id`, `name`, `tamil_name`, `english_name`, `photo`, `cover_image`, `designation`, `position`, `assembly`, `parliament`, `district`, `address`, `state`, `zone`, `phone`, `email`, `whatsapp`, `facebook`, `twitter`, `instagram`, `youtube`, `website`, `biography`, `joining_date`, `sort_order`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'P. கண்ணதாசன்', 'P. கண்ணதாசன்', NULL, NULL, NULL, 'திருவள்ளூர் கிழக்கு மாவட்ட செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', '17 பஜனை கோவில் தெரு முகப்பேர் சென்னை 37', 'தமிழ்நாடு', NULL, '8438578795', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:10:00'),
(5, 2, 'ஈ சரவணன்', 'ஈ சரவணன்', NULL, NULL, NULL, 'திருவள்ளூர் வடகிழக்கு மாவட்டம் செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', '239 பெருமாள் கோவில் தெரு, புதுவாயல் கிராமம் கும்மிடிப்பூண்டி வட்டம் திருவள்ளூர் மாவட்டம்', 'தமிழ்நாடு', NULL, '9952701414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(6, 2, 'ஜி பன்னீர்செல்வம்', 'ஜி பன்னீர்செல்வம்', NULL, NULL, NULL, 'ஆவடி தொகுதி செயலாளர் திருவள்ளூர் மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', '12/9 திருமுல்லைவாயில் மணிகண்டபுரம் மூன்றாவது குறுக்கு தெரு', 'தமிழ்நாடு', NULL, '9962913009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(7, 2, 'பா வில்சன்', 'பா வில்சன்', NULL, NULL, NULL, 'கும்மிடிப்பூண்டி தொகுதி திருவள்ளூர் வடமேற்கு மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', '368 . 43 பனப்பாக்கம் பாலவாக்கம் அஞ்சல் திருவள்ளூர் மாவட்டம்', 'தமிழ்நாடு', NULL, '9962694199', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(8, 2, 'ஆர் கே ரமேஷ்', 'ஆர் கே ரமேஷ்', NULL, NULL, NULL, 'திருத்தணி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9786595992,8825988959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(9, 2, 'கே என் எம் குமார்', 'கே என் எம் குமார்', NULL, NULL, NULL, 'ரெட்டில்ஸ் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9444319997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(10, 2, 'ஈ குட்டியப்பன்', 'ஈ குட்டியப்பன்', NULL, NULL, NULL, 'திருவள்ளூர் பூந்தமல்லி தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9444000201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(11, 2, 'வலசை தர்மன்', 'வலசை தர்மன்', NULL, NULL, NULL, 'மதுரவாயல் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவள்ளூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9380604244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(12, 2, 'S. மகிமைதாஸ்', 'S. மகிமைதாஸ்', NULL, NULL, NULL, 'வடசென்னை மாவட்டம் கிழக்கு மற்றும் தெற்கு மாவட்ட செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', 'NO 22 அம்மன் கோவில் 2வது தெரு மூலக்கொத்தளம் சென்னை 21', 'தமிழ்நாடு', NULL, '9941472972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(13, 2, 'மூ ரவீந்திரன்', 'மூ ரவீந்திரன்', NULL, NULL, NULL, 'தென் சென்னை வடகிழக்கு மாவட்டம் மயிலாப்பூர் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', 'NO 24 ரூதர்புரம் டாக்டர் அம்பேத்கர் பாலம் சென்னை மயிலாப்பூர் 4', 'தமிழ்நாடு', NULL, '8754422277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(14, 2, 'நா முத்து தென்', 'நா முத்து தென்', NULL, NULL, NULL, 'சென்னை கிழக்கு மாவட்ட செயலாளர் வேளச்சேரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', 'NO 1/2 என் எஸ் கே மூன்றாவது தெரு லட்சுமிபுரம் திருவாண்மையூர் சென்னை 41', 'தமிழ்நாடு', NULL, '7299159957', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(15, 2, 'ஜே குமார்', 'ஜே குமார்', NULL, NULL, NULL, 'மத்திய சென்னை ஆயிரம் விளக்கு கிழக்கு மாவட்ட செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', '81/4 செல்லம்மாள் தோட்டம் ராயப்பேட்டை சென்னை 14', 'தமிழ்நாடு', NULL, '9150716141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(16, 2, 'வி. ரஞ்சித்', 'வி. ரஞ்சித்', NULL, NULL, NULL, 'தென் சென்னை மேற்கு மாவட்டம் சைதை பகுதி விருகை பகுதி டி நகர் பகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', '54 சாமியார் தோட்டம் ஆலந்தூர் ரோடு சைதாப்பேட்டை சென்னை 15', 'தமிழ்நாடு', NULL, '9500282337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(17, 2, 'Y C நாகேந்திரன்', 'Y C நாகேந்திரன்', NULL, NULL, NULL, 'வடசென்னை திருவெற்றியூர் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', '3 செல்வ விநாயகர் கோவில் தெரு, மணலி சென்னை 68', 'தமிழ்நாடு', NULL, '9941420579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(18, 2, 'D. அறிவழகன்', 'D. அறிவழகன்', NULL, NULL, NULL, 'வடசென்னை மாவட்ட செயலாளர் திரு வி க நகர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', 'வெங்கட் அம்மாள் சமாதி தெரு திரு வி கா நகர் சென்னை 7', 'தமிழ்நாடு', NULL, '9841337345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(19, 2, 'ஆர் சரவணன்', 'ஆர் சரவணன்', NULL, NULL, NULL, 'மத்திய சென்னை வில்லிவாக்கம் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9941509551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(20, 2, 'எல் விஜயன்', 'எல் விஜயன்', NULL, NULL, NULL, 'மத்திய சென்னை அண்ணாநகர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9094595813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(21, 2, 'ஜி பாஸ்கர்', 'ஜி பாஸ்கர்', NULL, NULL, NULL, 'மத்திய சென்னை எழும்பூர்  துறைமுக தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9790934834', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(22, 2, 'ஆதிவேந்தன்', 'ஆதிவேந்தன்', NULL, NULL, NULL, 'தென் சென்னை சோழிங்கநல்லூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9500153762', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(23, 2, 'வீ தன்ராஜ்', 'வீ தன்ராஜ்', NULL, NULL, NULL, 'மத்திய சென்னை சேப்பாக்கம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8939778062', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(24, 2, 'என் திருமால்', 'என் திருமால்', NULL, NULL, NULL, 'தென் சென்னை விருகை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9841109306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(25, 2, 'M. மணிமாறன்', 'M. மணிமாறன்', NULL, NULL, NULL, 'வடசென்னை பெரம்பூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சென்னை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9600047444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(26, 2, 'தரணிதரன்', 'தரணிதரன்', NULL, NULL, NULL, 'காஞ்சிபுரம் தெற்கு மாவட்ட செயலாளர் உத்திரமேரூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'காஞ்சிபுரம் மாவட்டம்', 'NO; 300 பெருமாள் கோயில் தெரு உள்ளாவூர் வாலாஜாபாத் காஞ்சிபுரம்', 'தமிழ்நாடு', NULL, '9994817092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(27, 2, 'S.P.C. தனசேகர்', 'S.P.C. தனசேகர்', NULL, NULL, NULL, 'காஞ்சிபுரம் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'காஞ்சிபுரம் மாவட்டம்', 'கட்சிப்பட்டு ஸ்ரீபெரும்புதூர் NO; 105', 'தமிழ்நாடு', NULL, '9894201881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(28, 2, 'சோ தினகரன்', 'சோ தினகரன்', NULL, NULL, NULL, 'ஆலந்தூர் தொகுதி கிழக்கு செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'காஞ்சிபுரம் மாவட்டம்', '9/35. கண்ணபிரான் கோவில் தெரு, கோவூர் காஞ்சிபுரம் மாவட்டம்', 'தமிழ்நாடு', NULL, '9840213031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(29, 2, 'பரணி மாரி', 'பரணி மாரி', NULL, NULL, NULL, 'ஸ்ரீபெரும்புதூர் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'காஞ்சிபுரம் மாவட்டம்', '7/105 இளையராஜா நகர் பானை புத்தூர் போஸ்ட் சென்னை 122', 'தமிழ்நாடு', NULL, '9840886197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(30, 2, 'S. அசோக்', 'S. அசோக்', NULL, NULL, NULL, 'செங்கல்பட்டு வடக்கு மாவட்டம் செயலாளர் திருப்பெரும்புதூர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', 'படூர் 103', 'தமிழ்நாடு', NULL, '9003253464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(31, 2, 'C.D.சேகர்', 'C.D.சேகர்', NULL, NULL, NULL, 'செங்கல்பட்டு மேற்கு மாவட்டம் மதுராந்தகம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', '77 முத்தமிழ் நகர் மதுராந்தகம் வட்டம் செங்கல்பட்டு மாவட்டம் 319', 'தமிழ்நாடு', NULL, '9840812356', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(32, 2, 'செங்கை C K மூர்த்தி', 'செங்கை C K மூர்த்தி', NULL, NULL, NULL, 'செங்கல்பட்டு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9597331980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(33, 2, 'கூவத்தூர் சகாதேவன்', 'கூவத்தூர் சகாதேவன்', NULL, NULL, NULL, 'செய்யூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9962935252', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(34, 2, 'புழிச்சை  போன்ரத்தினம்', 'புழிச்சை  போன்ரத்தினம்', NULL, NULL, NULL, 'பல்லாவரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(35, 2, 'ஜே எட்வின் சுதாகர்', 'ஜே எட்வின் சுதாகர்', NULL, NULL, NULL, 'தாம்பரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'செங்கல்பட்டு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(36, 2, 'பி மேகநாதன்', 'பி மேகநாதன்', NULL, NULL, NULL, 'குடியாத்தம் ,காட்பாடி ,கே வி குப்பம், அணைக்கட்டு மாவட்ட செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'வேலூர் மாவட்டம்', 'கஸ்பா குடியாத்தம் 632002', 'தமிழ்நாடு', NULL, '9894429928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(37, 2, 'முகுந்தன்', 'முகுந்தன்', NULL, NULL, NULL, 'வேலூர் மாநகர தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'வேலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8838279835,9500839525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(38, 2, 'செல்லா', 'செல்லா', NULL, NULL, NULL, 'சோளிங்கர் அரக்கோணம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'ராணிப்பேட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9443106888,9655123299', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(39, 2, 'காரை ஜான்', 'காரை ஜான்', NULL, NULL, NULL, 'ஆற்காடு தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'ராணிப்பேட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(40, 2, 'ஜெய்', 'ஜெய்', NULL, NULL, NULL, 'ராணிப்பேட்டை தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'ராணிப்பேட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9500626033,6382304646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(41, 2, 'ரையாளம் தாஸ்', 'ரையாளம் தாஸ்', NULL, NULL, NULL, 'திருவண்ணாமலை மாவட்டம் ஆரணி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவண்ணாமலை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8870176350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(42, 2, 'காளிதாஸ்', 'காளிதாஸ்', NULL, NULL, NULL, 'செய்யாறு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவண்ணாமலை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8838816993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(43, 2, 'A ஜோசப்', 'A ஜோசப்', NULL, NULL, NULL, 'வந்தவாசி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவண்ணாமலை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8778494710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(44, 2, 'A சூசை', 'A சூசை', NULL, NULL, NULL, 'போளூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவண்ணாமலை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9942872100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(45, 2, 'M இளையராஜா', 'M இளையராஜா', NULL, NULL, NULL, 'திருப்பத்தூர் மாவட்ட ஆம்பூர் தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருப்பத்தூர் மாவட்டம்', 'கதமைப்பட்டு 751', 'தமிழ்நாடு', NULL, '9047611147', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(46, 2, 'D வெங்கடேசன்', 'D வெங்கடேசன்', NULL, NULL, NULL, 'வாணியம்பாடி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருப்பத்தூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9092603674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(47, 2, 'S. கோவிந்தன் ரிஷிவந்தியம்', 'S. கோவிந்தன் ரிஷிவந்தியம்', NULL, NULL, NULL, 'தொகுதி கள்ளக்குறிச்சி வடக்கு', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9790275183', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(48, 2, 'ஆ ராஜா', 'ஆ ராஜா', NULL, NULL, NULL, 'கள்ளக்குறிச்சி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம்', 'கள்ளக்குறிச்சி 115 மேட்டு தெரு', 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(49, 2, 'ஓவியா மு க பாபு', 'ஓவியா மு க பாபு', NULL, NULL, NULL, 'சங்கராபுரம் தொகுதி கள்ளக்குறிச்சி மேற்கு', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9789492951', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(50, 2, 'கேகே ஏழுமலை', 'கேகே ஏழுமலை', NULL, NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம் உளுந்தூர்பேட்டை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9787327760', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 47, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(51, 2, 'ஆசி அகத்தியன்', 'ஆசி அகத்தியன்', NULL, NULL, NULL, 'கள்ளக்குறிச்சி தெற்கு தொகுதி செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கள்ளக்குறிச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9626109627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(52, 2, 'திருநாவுக்கரசு', 'திருநாவுக்கரசு', NULL, NULL, NULL, 'விழுப்புரம் திருக்கோவிலூர் சட்டமன்றத் தொகுதி தென்மேற்கு மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', '3 கேகே நகர் விக்கிரவாண்டி விழுப்புரம் மாவட்டம்', 'தமிழ்நாடு', NULL, '7639919711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(53, 2, 'M.தமிழரசன்', 'M.தமிழரசன்', NULL, NULL, NULL, 'விழுப்புரம் தெற்கு மாவட்ட செயலாளர்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', '100/4 பிள்ளையார் கோவில் தெரு, அந்தியூர் திருக்கை விழுப்புரம் மாவட்டம்', 'தமிழ்நாடு', NULL, '9944361656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(54, 2, 'நா மனோ', 'நா மனோ', NULL, NULL, NULL, 'விழுப்புரம் கிழக்கு மாவட்ட செயலாளர் வானூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', '86 கொட்டம் விடு தெரு வழுதவூர் வானூர் சட்டமன்றத் தொகுதி விக்கிரவாண்டி வட்டம் விழுப்புரம் மாவட்டம்', 'தமிழ்நாடு', NULL, '6374186819', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(55, 2, 'எம் கஜேந்திரன்', 'எம் கஜேந்திரன்', NULL, NULL, NULL, 'திண்டிவனம் தொகுதி விழுப்புரம் வடக்கு மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '6381526982,9384968646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(56, 2, 'வி கோபிநாதன்', 'வி கோபிநாதன்', NULL, NULL, NULL, 'விக்கிரவாண்டி தொகுதி விழுப்புரம் தென்கிழக்கு மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9566403858', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(57, 2, 'SJ, விஜயந்தாஸ்', 'SJ, விஜயந்தாஸ்', NULL, NULL, NULL, 'மயிலம் தொகுதி விழுப்புரம் மையம் மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7708478919', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(58, 2, 'புரட்சி எம் ரஞ்சித்', 'புரட்சி எம் ரஞ்சித்', NULL, NULL, NULL, 'செஞ்சி தொகுதி விழுப்புரம் மேற்கு மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விழுப்புரம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7397339095', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(59, 2, 'உதயகுமார்', 'உதயகுமார்', NULL, NULL, NULL, 'மதுரை தெற்கு தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9715663015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(60, 2, 'தாட்கோ அழகர்', 'தாட்கோ அழகர்', NULL, NULL, NULL, 'மேலூர் தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9487075270', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(61, 2, 'பரமசிவம்', 'பரமசிவம்', NULL, NULL, NULL, 'மதுரை கிழக்கு தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9790519488', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(62, 2, 'பொன்னார்', 'பொன்னார்', NULL, NULL, NULL, 'மதுரை வடக்கு தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7010867165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(63, 2, 'சதீஷ் கண்ணன்', 'சதீஷ் கண்ணன்', NULL, NULL, NULL, 'சோழவற்தான் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9585045627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(64, 2, 'சுரேஷ்', 'சுரேஷ்', NULL, NULL, NULL, 'மதுரை மாவட்டம் திருமங்கலம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8925393110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(65, 2, 'ராஜா', 'ராஜா', NULL, NULL, NULL, 'உசிலம்பட்டி தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9500915412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 62, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(66, 2, 'சாலமன் பவுல்', 'சாலமன் பவுல்', NULL, NULL, NULL, 'மதுரை மத்திய தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9791632678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 63, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(67, 2, 'K. குமார்', 'K. குமார்', NULL, NULL, NULL, 'திருப்பரங்குன்றம் தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8940885830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(68, 2, 'மூர்த்தி', 'மூர்த்தி', NULL, NULL, NULL, 'மதுரை மேற்கு தொகுதி மதுரை மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மதுரை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9655896253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 65, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(69, 2, 'P.G. முகேஷ் முத்து', 'P.G. முகேஷ் முத்து', NULL, NULL, NULL, 'கடலூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7092641953,6369687681', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(70, 2, 'P.S. விக்கி துரை', 'P.S. விக்கி துரை', NULL, NULL, NULL, 'பண்ருட்டி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8825545588', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(71, 2, 'எம் பழனிவேல்', 'எம் பழனிவேல்', NULL, NULL, NULL, 'நெய்வேலி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', '109 திருவனந்தபுரம் ரோடு புது வண்டி பாளையம் அரையோர வெட்டி குப்பம் கடலூர் மாவட்டம்', 'தமிழ்நாடு', NULL, '9789672479', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 69, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(72, 2, 'இரா ராஜாகிர்த்தி', 'இரா ராஜாகிர்த்தி', NULL, NULL, NULL, 'புவனகிரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', 'மாரியம்மன் கோவில் தெரு மும்முடி சோழகன் கத்தாழை அஞ்சல் விருதாச்சலம் வட்டம் கடலூர் மாவட்டம்', 'தமிழ்நாடு', NULL, '9787087956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 70, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(73, 2, 'இரா ஸ்டாலின்', 'இரா ஸ்டாலின்', NULL, NULL, NULL, 'சிதம்பரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', 'மேட்டுத்தெரு உத்தமசோழபுரம் சிதம்பரம் டி கே கடலூர் மாவட்டம்', 'தமிழ்நாடு', NULL, '8610157876', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 71, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(74, 2, 'N. சங்கரலிங்கம்', 'N. சங்கரலிங்கம்', NULL, NULL, NULL, 'குறிஞ்சிப்பாடி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7010920829', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 72, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(75, 2, 'E. ரமேஷ்', 'E. ரமேஷ்', NULL, NULL, NULL, 'விருதாச்சலம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கடலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 73, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(76, 2, 'அபினேஷ்', 'அபினேஷ்', NULL, NULL, NULL, 'முசிறி தொகுதி துறையூர் தொகுதி மொடசநல்லூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9629725745', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(77, 2, 'கருணாகரன்', 'கருணாகரன்', NULL, NULL, NULL, 'திருச்சி மேற்கு கிழக்கு மணப்பாறை', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருச்சி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8015985334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 76, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(78, 2, 'பி காசி விஸ்வநாதன்', 'பி காசி விஸ்வநாதன்', NULL, NULL, NULL, 'கொங்குவள்ளி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9360303576', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(79, 2, 'R. பிரகாஷ்', 'R. பிரகாஷ்', NULL, NULL, NULL, 'மேட்டூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9087958659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(80, 2, 'எஸ் கார்த்தி', 'எஸ் கார்த்தி', NULL, NULL, NULL, 'சங்ககிரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8667350399', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(81, 2, 'D.தங்கதுரை', 'D.தங்கதுரை', NULL, NULL, NULL, 'ஏற்காடு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7904558246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(82, 2, 'பூபாலன்', 'பூபாலன்', NULL, NULL, NULL, 'வீரபாண்டி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(83, 2, 'எஸ் லோகநாதன்', 'எஸ் லோகநாதன்', NULL, NULL, NULL, 'எடப்பாடி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9561812057', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 82, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(84, 2, 'M.R. நல்லதம்பி', 'M.R. நல்லதம்பி', NULL, NULL, NULL, 'ஓமலூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9500551380,9845235611', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(85, 2, 'பா ராமதாஸ்', 'பா ராமதாஸ்', NULL, NULL, NULL, 'ஆத்தூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9626354722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 84, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(86, 2, 'கருப்புசாமி', 'கருப்புசாமி', NULL, NULL, NULL, 'சேலம் மேற்கு', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7418374483', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 85, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(87, 2, 'எம் அப்துல்ரகுமான்', 'எம் அப்துல்ரகுமான்', NULL, NULL, NULL, 'சேலம் வடகிழக்கு', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9095509127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(88, 2, 'எம் பிரபு', 'எம் பிரபு', NULL, NULL, NULL, 'சேலம் தெற்கு', 'மாவட்டச் செயலாளர்', NULL, NULL, 'சேலம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8610087780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 87, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(89, 2, 'A  செல்வமுத்து', 'A  செல்வமுத்து', NULL, NULL, NULL, 'கரூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9843142233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(90, 2, 'Aதேவராஜ்', 'Aதேவராஜ்', NULL, NULL, NULL, 'அரவக்குறிச்சி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9791356505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(91, 2, 'Kஅறிவுமதி', 'Kஅறிவுமதி', NULL, NULL, NULL, 'குளித்தலை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '6383633820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 90, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(92, 2, 'A சேகர்', 'A சேகர்', NULL, NULL, NULL, 'கிருஷ்ணராயபுரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9965797471', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 91, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(93, 2, 'எம் சகாயம்', 'எம் சகாயம்', NULL, NULL, NULL, 'திண்டுக்கல் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திண்டுக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9566337129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 92, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(94, 2, 'எம் முருகவேல்', 'எம் முருகவேல்', NULL, NULL, NULL, 'வேடசந்தூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திண்டுக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8838166731', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 93, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(95, 2, 'எம் சுப்பிரமணி', 'எம் சுப்பிரமணி', NULL, NULL, NULL, 'பழனி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திண்டுக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9361425746', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 94, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(96, 2, 'எம் சின்னவர்', 'எம் சின்னவர்', NULL, NULL, NULL, 'ஆத்தூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திண்டுக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8883562684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 95, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(97, 2, 'எம் பி பெரியசாமி', 'எம் பி பெரியசாமி', NULL, NULL, NULL, 'ஒட்டசத்திரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திண்டுக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9943032642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 96, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(98, 2, 'அருண்', 'அருண்', NULL, NULL, NULL, 'வேப்பம்பள்ளி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9345427192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 97, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(99, 2, 'E.பன்னீர்செல்வம்', 'E.பன்னீர்செல்வம்', NULL, NULL, NULL, 'கிருஷ்ணகிரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9159074757', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 98, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(100, 2, 'M. மணிகண்டன்', 'M. மணிகண்டன்', NULL, NULL, NULL, 'தலி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(101, 2, 'K. சூரிய பிரகாஷ்', 'K. சூரிய பிரகாஷ்', NULL, NULL, NULL, 'பர்கூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8525962674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(102, 2, 'R. விஜயன்', 'R. விஜயன்', NULL, NULL, NULL, 'ஊத்தங்கரை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7806966651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 101, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(103, 2, 'அனுமந்தன்', 'அனுமந்தன்', NULL, NULL, NULL, 'வேப்பம்பள்ளி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கிருஷ்ணகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9025780254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 102, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(104, 2, 'P. ராஜன்', 'P. ராஜன்', NULL, NULL, NULL, 'ஈரோடு மேற்கு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'ஈரோடு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 103, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(105, 2, 'R. ரமேஷ்', 'R. ரமேஷ்', NULL, NULL, NULL, 'கோபிசெட்டிபாளையம் தொகுதி பவானிசாகர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'ஈரோடு மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 104, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(106, 2, 'இளம்வழுதி', 'இளம்வழுதி', NULL, NULL, NULL, 'நாமக்கல் தொகுதி ராசிபுரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'நாமக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9789135076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 105, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(107, 2, 'ஹரிராம கிருஷ்ணன்', 'ஹரிராம கிருஷ்ணன்', NULL, NULL, NULL, 'பரமத்தி மேலூர் திருச்செங்கோடு குமாரபாளையம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'நாமக்கல் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8870807602', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 106, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(108, 2, 'வீரபாண்டி செல்வம்', 'வீரபாண்டி செல்வம்', NULL, NULL, NULL, 'திருப்பூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருப்பூர் மாவட்டம்', '2/934 ஜே ஜே நகர் வீரபாண்டி போஸ்ட் திருப்பூர் 641605', 'தமிழ்நாடு', NULL, '9894429710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 107, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(109, 2, 'M. மாரி செல்வம்', 'M. மாரி செல்வம்', NULL, NULL, NULL, 'தூத்துக்குடி மாநகரத் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தூத்துக்குடி மாவட்டம்', '3/75. தெற்கு தெரு முத்தையாபுரம் அஞ்சல் தூத்துக்குடி 628 05', 'தமிழ்நாடு', NULL, '9597947776', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 108, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(110, 2, 'குட்டி பாண்டி', 'குட்டி பாண்டி', NULL, NULL, NULL, 'வைகுண்டம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தூத்துக்குடி மாவட்டம்', '3/75. தெற்கு தெரு முத்தையாபுரம் அஞ்சல் தூத்துக்குடி 6280 0 5', 'தமிழ்நாடு', NULL, '9715674033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 109, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(111, 2, 'C. பாபு', 'C. பாபு', NULL, NULL, NULL, 'திருச்செந்தூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தூத்துக்குடி மாவட்டம்', '1/255 பிரசாத் நகர் வீரபாண்டிய பட்டணம் போஸ்ட்  திருச்செந்தூர் தாலுகா 628216', 'தமிழ்நாடு', NULL, '8122579507', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(112, 2, 'லெனின் குமார்', 'லெனின் குமார்', NULL, NULL, NULL, 'கோவில்பட்டி தொகுதி விளாத்திகுளம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தூத்துக்குடி மாவட்டம்', '68/3 ஆதி திராவிடர் தெரு எட்டையாபுரம் 628902', 'தமிழ்நாடு', NULL, '9688792793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 111, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(113, 2, 'இசக்கிமுத்து', 'இசக்கிமுத்து', NULL, NULL, NULL, 'ஒட்டப்பிடாரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தூத்துக்குடி மாவட்டம்', '8/243A முனியசாமி கோயில் தெரு தெற்கு பரம்பூர் ஒட்டப்பிடாரம்', 'தமிழ்நாடு', NULL, '9788734331', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 112, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(114, 2, 'பிரவீன் குமார்', 'பிரவீன் குமார்', NULL, NULL, NULL, 'சாத்தூர் தொகுதி ராஜபாளையம் தொகுதி திருச்சூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விருதுநகர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 113, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(115, 2, 'செல்வகுமார்', 'செல்வகுமார்', NULL, NULL, NULL, 'ஸ்ரீவில்லிபுத்தூர் தொகுதி விருதுநகர் அருப்புக்கோட்டை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விருதுநகர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 114, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(116, 2, 'குட்டி', 'குட்டி', NULL, NULL, NULL, 'சிவகாசி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'விருதுநகர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 115, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(117, 2, 'A.K நெல்சன்', 'A.K நெல்சன்', NULL, NULL, NULL, 'அம்பாசமுத்திரம் தொகுதி நாங்குநேரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருநெல்வேலி மாவட்டம்', 'அம்பேத்கர் நகர் பத்தை அஞ்சல் களக்காடு 627501', 'தமிழ்நாடு', NULL, '9629602551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 116, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(118, 2, 'கண்ணன்', 'கண்ணன்', NULL, NULL, NULL, 'பாளையங்கோட்டை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருநெல்வேலி மாவட்டம்', '31/161 விர்ச பத்தி தெரு பாளையங்கோட்டை திருநெல்வேலி', 'தமிழ்நாடு', NULL, '9566994024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 117, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(119, 2, 'மணிகண்டன்', 'மணிகண்டன்', NULL, NULL, NULL, 'திருநெல்வேலி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருநெல்வேலி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '7418008828', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 118, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(120, 2, 'முத்துகிருஷ்ணன்', 'முத்துகிருஷ்ணன்', NULL, NULL, NULL, 'ராதாபுரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருநெல்வேலி மாவட்டம்', '40/2 கும்பிகுளம் கும்பிகுளம் நடுவூர் விளாத்திகுளம் போஸ்ட் ராதாபுரம் தாலுக்கா திருநெல்வேலி மாவட்டம் 627112', 'தமிழ்நாடு', NULL, '9159326778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 119, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(121, 2, 'O. வைரபாண்டி', 'O. வைரபாண்டி', NULL, NULL, NULL, 'போடி தொகுதி பெரியங்குளம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தேனி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9047676846', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(122, 2, 'S.வைரவன்', 'S.வைரவன்', NULL, NULL, NULL, 'கம்பம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தேனி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8608168744', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 121, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(123, 2, 'N.S. மகாலிங்கம்', 'N.S. மகாலிங்கம்', NULL, NULL, NULL, 'ஆண்டிப்பட்டி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தேனி மாவட்டம்', 'தென்பழனி காலனி மயிலாடும்பாறை போஸ்ட் ஆண்டிப்பட்டி தாலுகா தேனி மாவட்டம் தமிழ்நாடு 625579', 'தமிழ்நாடு', NULL, '7010028080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 122, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(124, 2, 'K.மணிகண்டன்', 'K.மணிகண்டன்', NULL, NULL, NULL, 'ஆலங்குளம் தொகுதி தென்காசி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தென்காசி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9976107055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 123, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(125, 2, 'CSK கருப்பு', 'CSK கருப்பு', NULL, NULL, NULL, 'கடையநல்லூர் தொகுதி வாசுதேவநல்லூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தென்காசி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9363682375', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 124, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(126, 2, 'M.ரஞ்சித்', 'M.ரஞ்சித்', NULL, NULL, NULL, 'சங்கரன்கோவில் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தென்காசி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '9092111280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 125, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(127, 2, 'ஆனிட் ராஜ்', 'ஆனிட் ராஜ்', NULL, NULL, NULL, 'இராமநாதபுரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'இராமநாதபுரம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 126, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(128, 2, 'ராஜா', 'ராஜா', NULL, NULL, NULL, 'பெரம்பலூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'பெரம்பலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '8807861284', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 127, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(129, 2, 'தேவேந்திரன்', 'தேவேந்திரன்', NULL, NULL, NULL, 'குன்னம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'பெரம்பலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, '6382636710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 128, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(130, 2, 'முத்துவீரசபரி', 'முத்துவீரசபரி', NULL, NULL, NULL, 'திருமயம் தொகுதி அறந்தாங்கி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'புதுக்கோட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(131, 2, 'M.K.செல்வம்', 'M.K.செல்வம்', NULL, NULL, NULL, 'ஆலங்குடி கந்தர்வகோட்டை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'புதுக்கோட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 130, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(132, 2, 'R. கேசவன்', 'R. கேசவன்', NULL, NULL, NULL, 'புதுக்கோட்டை தொகுதி விராலிமலை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'புதுக்கோட்டை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 131, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(133, 2, 'V k சுரேஷ்', 'V k சுரேஷ்', NULL, NULL, NULL, 'திருவாரூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவாரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 132, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(134, 2, 'பாபு', 'பாபு', NULL, NULL, NULL, 'நன்னிலம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவாரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 133, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(135, 2, 'ஆதி ஈரா ஜெயராஜ்', 'ஆதி ஈரா ஜெயராஜ்', NULL, NULL, NULL, 'திருத்துறைப் பூண்டி தொகுதி மன்னார்குடி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'திருவாரூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 134, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(136, 2, 'சக்திவேல்', 'சக்திவேல்', NULL, NULL, NULL, 'அரியலூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'அரியலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 135, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(137, 2, 'மணிமாறன்', 'மணிமாறன்', NULL, NULL, NULL, 'ஜெயங்கொண்டம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'அரியலூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 136, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(138, 2, 'முகேஷ்', 'முகேஷ்', NULL, NULL, NULL, 'திருவிடைமருதூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தஞ்சாவூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 137, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(139, 2, 'ராமன்', 'ராமன்', NULL, NULL, NULL, 'கும்பகோணம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தஞ்சாவூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 138, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(140, 2, 'ராஜா', 'ராஜா', NULL, NULL, NULL, 'பாபநாசம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தஞ்சாவூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 139, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(141, 2, 'ஆதி இலா அறிவுடைநம்பி', 'ஆதி இலா அறிவுடைநம்பி', NULL, NULL, NULL, 'திருவையாறு தொகுதி தஞ்சாவூர் தொகுதி பட்டுக்கோட்டை தொகுதி பேராவூரணி தொகுதி ஒரத்தநாடு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தஞ்சாவூர் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 140, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(142, 2, 'கமலேஷ்', 'கமலேஷ்', NULL, NULL, NULL, 'சீர்காழி தொகுதி மயிலாடுதுறை தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மயிலாடுதுறை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 141, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(143, 2, 'பூவரசன்', 'பூவரசன்', NULL, NULL, NULL, 'பூம்புகார் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'மயிலாடுதுறை மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 142, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(144, 2, 'ஆதிசி கவிந்திரன்', 'ஆதிசி கவிந்திரன்', NULL, NULL, NULL, 'நாகப்பட்டினம் தொகுதி வேதாரண்யம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'நாகப்பட்டினம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 143, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(145, 2, 'வி வினோத்', 'வி வினோத்', NULL, NULL, NULL, 'கீழ்வேளூர் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'நாகப்பட்டினம் மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 144, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(146, 2, 'S. மல்வின்', 'S. மல்வின்', NULL, NULL, NULL, 'கன்னியாகுமரி தொகுதி நாகர்கோவில் தொகுதி குளச்சல் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கன்னியாகுமரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(147, 2, 'தங்கம் டேனியல்', 'தங்கம் டேனியல்', NULL, NULL, NULL, 'பத்மநாதபுரம் தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கன்னியாகுமரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 146, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(148, 2, 'ராஜேஷ் சாலமன்', 'ராஜேஷ் சாலமன்', NULL, NULL, NULL, 'கிளியூர் தொகுதி விலவான்கோடு தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'கன்னியாகுமரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 147, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(149, 2, 'எம் நாகராஜ்', 'எம் நாகராஜ்', NULL, NULL, NULL, 'தர்மபுரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தர்மபுரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 148, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(150, 2, 'எஸ் சுகுமார்', 'எஸ் சுகுமார்', NULL, NULL, NULL, 'பாப்பிரெட்டிப்பட்டி தொகுதி தர்மபுரி மாவட்டம்', 'மாவட்டச் செயலாளர்', NULL, NULL, 'தர்மபுரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 149, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45'),
(151, 2, 'V.P. ஆனந்தன்', 'V.P. ஆனந்தன்', NULL, NULL, NULL, 'நீலகிரி தொகுதி', 'மாவட்டச் செயலாளர்', NULL, NULL, 'நீலகிரி மாவட்டம்', NULL, 'தமிழ்நாடு', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 150, 0, 1, '2026-10-11 17:07:45', '2026-10-11 17:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `organization_teams`
--

CREATE TABLE `organization_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `description` longtext DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_teams`
--

INSERT INTO `organization_teams` (`id`, `name`, `slug`, `description`, `banner`, `image`, `sort_order`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 'மாநில நிர்வாகிகள்', 'manila-nirvagigal', '<p>மாநில அளவிலான நிர்வாகப் பொறுப்பாளர்கள்</p>', NULL, NULL, 0, 1, 'மாநில நிர்வாகிகள்', 'மாநில அளவிலான நிர்வாகப் பொறுப்பாளர்கள்', 'மாநில நிர்வாகிகள்', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(2, 'மாவட்ட நிர்வாகிகள்', 'mavattam-nirvagigal', '<p>மாவட்ட அளவிலான நிர்வாகப் பொறுப்பாளர்கள்</p>', NULL, NULL, 1, 1, 'மாவட்ட நிர்வாகிகள்', 'மாவட்ட அளவிலான நிர்வாகப் பொறுப்பாளர்கள்', 'மாவட்ட நிர்வாகிகள்', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(3, 'மாநில இளைஞரணி', 'manila-ilaignarani', '<p>மாநில இளைஞரணி அமைப்பு</p>', NULL, NULL, 2, 1, 'மாநில இளைஞரணி', 'மாநில இளைஞரணி அமைப்பு', 'மாநில இளைஞரணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(4, 'மாநில மாணவரணி', 'manila-maanavarani', '<p>மாநில மாணவரணி அமைப்பு</p>', NULL, NULL, 3, 1, 'மாநில மாணவரணி', 'மாநில மாணவரணி அமைப்பு', 'மாநில மாணவரணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(5, 'மாநில APLF நிர்வாகிகள்', 'manila-aplf', '<p>மாநில APLF நிர்வாகிகள்</p>', NULL, NULL, 4, 1, 'மாநில APLF நிர்வாகிகள்', 'மாநில APLF நிர்வாகிகள்', 'மாநில APLF நிர்வாகிகள்', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(6, 'மாநில டாக்டர் மூர்த்தியார் பேரவை', 'dr-moorthiyar-peravai', '<p>டாக்டர் மூர்த்தியார் பேரவை</p>', NULL, NULL, 5, 1, 'மாநில டாக்டர் மூர்த்தியார் பேரவை', 'டாக்டர் மூர்த்தியார் பேரவை', 'மாநில டாக்டர் மூர்த்தியார் பேரவை', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(7, 'மாநில மகளிரணி', 'manila-magalirani', '<p>மாநில மகளிரணி அமைப்பு</p>', NULL, NULL, 6, 1, 'மாநில மகளிரணி', 'மாநில மகளிரணி அமைப்பு', 'மாநில மகளிரணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(8, 'மாநில வழக்கறிஞர் அணி', 'manila-vazhakkarignar', '<p>மாநில வழக்கறிஞர் அணி</p>', NULL, NULL, 7, 1, 'மாநில வழக்கறிஞர் அணி', 'மாநில வழக்கறிஞர் அணி', 'மாநில வழக்கறிஞர் அணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(9, 'மாநில தொழிற்சங்க அணி', 'manila-thozhirsangam', '<p>மாநில தொழிற்சங்க அணி</p>', NULL, NULL, 8, 1, 'மாநில தொழிற்சங்க அணி', 'மாநில தொழிற்சங்க அணி', 'மாநில தொழிற்சங்க அணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(10, 'மாநில சிறுபான்மை அணி', 'manila-sirupanmai', '<p>மாநில சிறுபான்மை அணி</p>', NULL, NULL, 9, 1, 'மாநில சிறுபான்மை அணி', 'மாநில சிறுபான்மை அணி', 'மாநில சிறுபான்மை அணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(11, 'மாநில தகவல் தொழில்நுட்ப அணி', 'manila-it-ani', '<p>மாநில தகவல் தொழில்நுட்ப அணி</p>', NULL, NULL, 10, 1, 'மாநில தகவல் தொழில்நுட்ப அணி', 'மாநில தகவல் தொழில்நுட்ப அணி', 'மாநில தகவல் தொழில்நுட்ப அணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40'),
(12, 'மாநில மருத்துவர் அணி', 'manila-maruthuvar', '<p>மாநில மருத்துவர் அணி</p>', NULL, NULL, 11, 1, 'மாநில மருத்துவர் அணி', 'மாநில மருத்துவர் அணி', 'மாநில மருத்துவர் அணி', '2026-07-31 12:06:40', '2026-07-31 12:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `template` varchar(100) DEFAULT 'default',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(500) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `banner`, `template`, `seo_title`, `seo_description`, `seo_keywords`, `canonical_url`, `sort_order`, `status`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'எங்களைப் பற்றி', 'about', '<p><strong>முன்னுரை</strong></p><p>​திருவள்ளூர் மாவட்டம், பூந்தமல்லி வட்டம், நேமம் ஆண்டர்சன் பேட்டை கிராமத்தைச் சேர்ந்த M. முனுசாமி - M. ருக்மணியம்மாள் தம்பதியருக்கு ஐந்து ஆண்கள், மூன்று பெண்கள் என மொத்தம் எட்டு பிள்ளைகள். அவர்களுள் மூன்றாவது மகனே நமது நிறுவனத் தலைவர் மூர்த்தி அவர்கள் (எட்டாவது பிள்ளைதான் ஜெகன் மூர்த்தி) அவர்கள்</p><p><strong>​ஆரம்பக் கல்வியும் திறமைகளும்</strong></p><p>​தனது ஐந்து வயதில் ஆண்டர்சன்பேட்டை அரசு ஆரம்பப் பள்ளியில் சேர்ந்த மூர்த்தி, ஐந்தாம் வகுப்பு வரை வகுப்பின் சிறந்த மாணவனாகத் திகழ்ந்தார். ஆறாம் வகுப்பு முதல் திருமழிசையில் உள்ள சுந்தர முதலியார் அரசினர் உயர்நிலைப் பள்ளியில் படித்து OLD S.S.L.C வரை தேர்ச்சி பெற்றார். கல்வியிலும் விளையாட்டிலும் திறம்படச் செயல்பட்டு, ஆசிரியர்களின் பாராட்டைப் பெற்றதோடு வகுப்புத் தலைவராகவும் (Class Leader) விளங்கினார்.</p><p>​பின்னர் பட்டாபிராமில் உள்ள இந்து கல்லூரியில் P.U.C பயின்றார். அங்கேயும் கல்வியில் சிறந்து விளங்கி மாணவர் தலைவராகத் தேர்ந்தெடுக்கப்பட்டார். தொடர்ந்து, சென்னை கடற்கரைச் சாலையில் உள்ள மாநிலக் கல்லூரியில் B.A. பொருளாதாரம் பயின்றார். பொருளாதாரப் படிப்பில் சிறந்த மாணவராக விளங்கியதோடு, கல்லூரி வளர்ச்சிக்கும் மாணவர் நலனுக்கும் பல போராட்டங்களை முன்னெடுத்தார். இதனால் அனைத்துக் கல்லூரி மாணவர்களின் அன்பையும் பெற்ற தலைவராக உருவெடுத்தார்.</p>', NULL, 'full-width', 'எங்களைப் பற்றி', '', '', '', 0, 1, 1, '2026-07-25 09:31:57', '2026-09-01 18:01:18'),
(2, 'வரலாறு', 'history', '<p><strong>சமூக விழிப்புணர்வும் இயக்கத்தின் தொடக்கமும்</strong></p><p>​M.A. பொருளாதாரம் பயில தஞ்சாவூர் பூண்டி புஷ்பம் கலைக் கல்லூரியில் சேர்ந்தபோது, அங்கு நிலவிய சாதியக் கொடுமைகளையும் தீண்டாமையையும் நேரில் கண்டார். கிராமப்புறங்களில் வாழும் ஏழை ஆதிதிராவிட மக்கள் படும் துயரங்களுக்குத் தீர்வு காண வேண்டும் என்று உறுதிகொண்டார்.</p><p>மாணவர்களையும் நண்பர்களையும் ஒருங்கிணைத்து ஒரு அமைப்பாகப் போராட முடிவு செய்தார். இதன்படி, 1978-ஆம் ஆண்டு ஜனவரி 26-ஆம் தேதி பூந்தமல்லி மேல்மாநகரில் உள்ள ஆதிதிராவிட ஆரம்பப் பள்ளி மைதானத்தில் \'டாக்டர் அம்பேத்கர் மன்றம்\' என்ற அமைப்பைத் தொடங்கி உரையாற்றினார். அவரின் வீரியமிக்க உரையைக் கேட்ட பொதுமக்கள், \"இனி அநீதி நடக்கும் இடங்களிலெல்லாம் மூர்த்தியும் இந்த மன்றமும் இருக்கும்\" என்று உற்சாகத்துடன் அவரை ஏற்றுக்கொண்டனர். அன்றுமுதல் மக்கள் அவரை அன்போடு \'பூவை மூர்த்தி\' என்று அழைக்கத் தொடங்கினர்.</p><p><strong>சட்டப் போராட்டமும் பஞ்சமி நில மீட்டப்பும்</strong></p><p>தாழ்த்தப்பட்ட மற்றும் பழங்குடி மக்களின் அடிப்படை உரிமைகளுக்காகப் போராடியவர், சட்டரீதியாகப் போராட விரும்பி சென்னை சட்டக் கல்லூரியில் சேர்ந்து பட்டம் பெற்றார். சட்டத்தின் துணையோடு ஏழை மக்களுக்குப் பல உரிமைகளைப் பெற்றுத் தந்தார்.</p><p>குறிப்பாக, விக்டோரியா அரசியாரால் வழங்கப்பட்டும் ஆக்கிரமிப்பில் இருந்த பஞ்சமி நிலங்களைத் தேடிக் கண்டுபிடித்து, நிலமற்ற ஏழை மக்களுக்கு வீட்டு மனைகளாகப் பெற்றுத் தந்தார். ஏழை மாணவர்களைப் பள்ளிகளிலும் சட்டக் கல்லூரிகளிலும் சேர்க்க உதவினார். வேலையில்லா இளைஞர்களுக்கு வேலைவாய்ப்புகளை உருவாக்கினார்.</p><p><strong>கட்சித் தொடக்கமும் மூவர்ணக் கொடியும்</strong></p><p>டாக்டர் அம்பேத்கர் மக்கள் மன்றம்\', \'டாக்டர் அம்பேத்கர் மக்கள் முன்னணி\' எனப் படிப்படியாக வளர்ந்த இந்த இயக்கம், அனைத்துப் பிரிவு மக்களுக்கும் பணியாற்றும் நோக்கத்துடன் 1998-ஆம் ஆண்டு \'புரட்சி பாரதம்\' என்ற அரசியல் கட்சியாக பரிணமித்தது.</p><p>சுதந்திரம், சமத்துவம், சகோதரத்துவம் ஆகிய கொள்கைகளை அடிப்படையாகக் கொண்டு நீலம், வெள்ளை, சிவப்பு நிறங்களுடன், நடுவில் அசோக சக்கரத்தைக் கொண்ட மூவர்ணக் கொடியைக் கட்சியின் அடையாளமாக உருவாக்கினார். தேர்தல் களத்தில் சுயேச்சையாகப் போட்டியிட்டு, வெற்றியைத் தீர்மானிக்கும் கணிசமான வாக்குகளைப் பெற்று ஏழை மக்களின் நம்பிக்கை நாயகனாகத் திகழ்ந்தார்.</p><p><strong>சமூக நல்லிணக்கமும் முக்கிய சாதனைகளும்</strong></p><p>​வட மாவட்டங்களில் வன்னியர்களுக்கும் தாழ்த்தப்பட்ட மக்களுக்குமிடையே நிலவிய சாதி மோதல்களைத் தடுத்து, இரு சமூகத்தினரும் ஒற்றுமையுடன் வாழ விரும்பினார். இதற்காகச் சென்னை தி.நகர் பனகல் பூங்காவில் பாட்டாளி மக்கள் கட்சி நிறுவனர் டாக்டர் ராமதாஸ் அவர்களைப் பங்கேற்கச் செய்து மாநாடு நடத்தினார்.</p><p>​மேலும், பின்வரும் கோரிக்கைகளுக்காகப் பட்டினிப் போராட்டம், கண்டனக் கூட்டங்கள் மற்றும் பேரணிகளை நடத்தி, அன்றைய முதலமைச்சரிடம் மனு அளித்து வெற்றியைச் சாத்தியமாக்கினார்:</p><p>&nbsp;</p>', NULL, 'default', 'வரலாறு', '', '', '', 1, 1, 0, '2026-07-25 09:31:57', '2026-08-14 10:55:22'),
(3, 'தொலைநோக்கு', 'vision', '<p>[2:03 pm, 06/08/2026] chanther: டாக்டர் அம்பேத்கருக்கு மணிமண்டபம் அமைத்தல்.</p><p>​சென்னை அரசு சட்டக் கல்லூரிக்கு \'டாக்டர் அம்பேத்கர் அரசு சட்டக் கல்லூரி\' எனப் பெயர் சூட்டுதல்.</p><p>​தொடர்ந்து, சென்னை சீரணி அரங்கத்தில் த.மா.கா தலைவர் ஜி.கே. மூப்பனார் அவர்களை வைத்து மாநாடு நடத்தினார். பின்னர் அரக்கோணத்தில் அன்றைய முதலமைச்சர் ஜெ. ஜெயலலிதா அவர்கள் தலைமையில், சுமார் 10 லட்சத்திற்கும் மேற்பட்ட மக்களைத் திரட்டி பிரம்மாண்ட மாநாட்டை நடத்தி, ஒடுக்கப்பட்ட மக்களின் வாழ்வாதாரப் பாதுகாப்பிற்கான பல்வேறு சலுகைகளைப் பெற்றுத் தந்தார்.</p><p>ஈடுசெய்ய முடியாத இழப்பு</p><p>மக்களுக்காகவே ஓயாது களப்பணியாற்றியதால் நீரிழிவு நோயால் பாதிக்கப்பட்டார். தனது உடல்நலத்தைப் பற்றியோ, திருமண வாழ்க்கை பற்றியோ, சுயநலம் பற்றியோ சிறிதும் சிந்திக்காமல் ஒடுக்கப்பட்ட மக்களின் சமூக விடியலுக்காகவே இறுதிவரை உழைத்தார்.</p><p>​போராட்டக் குணமிக்க களப்போராளி பூவை மூர்த்தியார் அவர்கள், 2002-ஆம் ஆண்டு செப்டம்பர் 2-ஆம் தேதி நம்மைப் பிரியாத் துயரில் ஆழ்த்தி இயற்கை எய்தினார்.</p><p>​முடிவுரை</p><p>இயக்கம் தொடங்கி 40 ஆண்டுகளைக் கடந்துள்ள இந்த வேளையில், எத்தனையோ கூட்டங்கள், களப்போராட்டங்கள், சாதி மோதல்களுக்கு எதிரான நடவடிக்கைகள் மற்றும் வெற்றிகள் நம் கண்முன்னே நிழலாடுகின்றன. பல ஆவணங்கள் காலப்போக்கில் சிதைந்துபோயிருந்தாலும், கிடைத்த சான்றுகளைக் கொண்டு புரட்சி பாரத கட்சியின் வரலாற்று நிகழ்வுகள் இந்தச் சிறப்பு மலரில் பொக்கிஷமாகத் தொகுக்கப்பட்டுள்ளன.</p><p>எத்தனையோ இயக்கங்கள் தோன்றி மறைந்த சூழலில், நிறுவனத் தலைவர் டாக்டர் பூவை மூர்த்தியாரால் தொடங்கப்பட்ட இக்கட்சி, பல கரடுமுரடான பாதைகளைக் கடந்து இன்று 49 ஆண்டுகளை நிறைவு செய்து அரை நூற்றாண்டை நோக்கி வெற்றிநடை போடுகிறது.<br>[4:33 pm, 06/08/2026] Veeravikas: please</p>', NULL, 'default', 'தொலைநோக்கு', '', '', '', 2, 1, 0, '2026-07-25 09:31:57', '2026-08-14 10:55:53'),
(5, 'தனியுரிமைக் கொள்கை', 'privacy-policy', '<p>உங்கள் தனிப்பட்ட தகவல்களை நாங்கள் பாதுகாக்கிறோம்.</p>', NULL, 'default', 'தனியுரிமைக் கொள்கை', NULL, NULL, NULL, 4, 1, 0, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(6, 'விதிமுறைகள்', 'terms', '<p>[2:03 pm, 06/08/2026] chanther: டாக்டர் அம்பேத்கருக்கு மணிமண்டபம் அமைத்தல்.</p><p>​சென்னை அரசு சட்டக் கல்லூரிக்கு \'டாக்டர் அம்பேத்கர் அரசு சட்டக் கல்லூரி\' எனப் பெயர் சூட்டுதல்.</p><p>​தொடர்ந்து, சென்னை சீரணி அரங்கத்தில் த.மா.கா தலைவர் ஜி.கே. மூப்பனார் அவர்களை வைத்து மாநாடு நடத்தினார். பின்னர் அரக்கோணத்தில் அன்றைய முதலமைச்சர் ஜெ. ஜெயலலிதா அவர்கள் தலைமையில், சுமார் 10 லட்சத்திற்கும் மேற்பட்ட மக்களைத் திரட்டி பிரம்மாண்ட மாநாட்டை நடத்தி, ஒடுக்கப்பட்ட மக்களின் வாழ்வாதாரப் பாதுகாப்பிற்கான பல்வேறு சலுகைகளைப் பெற்றுத் தந்தார்.</p><p>ஈடுசெய்ய முடியாத இழப்பு</p><p>மக்களுக்காகவே ஓயாது களப்பணியாற்றியதால் நீரிழிவு நோயால் பாதிக்கப்பட்டார். தனது உடல்நலத்தைப் பற்றியோ, திருமண வாழ்க்கை பற்றியோ, சுயநலம் பற்றியோ சிறிதும் சிந்திக்காமல் ஒடுக்கப்பட்ட மக்களின் சமூக விடியலுக்காகவே இறுதிவரை உழைத்தார்.</p><p>​போராட்டக் குணமிக்க களப்போராளி பூவை மூர்த்தியார் அவர்கள், 2002-ஆம் ஆண்டு செப்டம்பர் 2-ஆம் தேதி நம்மைப் பிரியாத் துயரில் ஆழ்த்தி இயற்கை எய்தினார்.</p><p>​முடிவுரை</p><p>இயக்கம் தொடங்கி 40 ஆண்டுகளைக் கடந்துள்ள இந்த வேளையில், எத்தனையோ கூட்டங்கள், களப்போராட்டங்கள், சாதி மோதல்களுக்கு எதிரான நடவடிக்கைகள் மற்றும் வெற்றிகள் நம் கண்முன்னே நிழலாடுகின்றன. பல ஆவணங்கள் காலப்போக்கில் சிதைந்துபோயிருந்தாலும், கிடைத்த சான்றுகளைக் கொண்டு புரட்சி பாரத கட்சியின் வரலாற்று நிகழ்வுகள் இந்தச் சிறப்பு மலரில் பொக்கிஷமாகத் தொகுக்கப்பட்டுள்ளன.</p><p>எத்தனையோ இயக்கங்கள் தோன்றி மறைந்த சூழலில், நிறுவனத் தலைவர் டாக்டர் பூவை மூர்த்தியாரால் தொடங்கப்பட்ட இக்கட்சி, பல கரடுமுரடான பாதைகளைக் கடந்து இன்று 49 ஆண்டுகளை நிறைவு செய்து அரை நூற்றாண்டை நோக்கி வெற்றிநடை போடுகிறது.<br>[4:33 pm, 06/08/2026] Veeravikas: please</p>', NULL, 'default', 'விதிமுறைகள்', '', '', '', 5, 1, 0, '2026-07-25 09:31:57', '2026-08-14 10:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `group_name` varchar(100) DEFAULT 'general',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `group_name`, `created_at`) VALUES
(1, 'Dashboard View', 'dashboard.view', 'dashboard', '2026-07-25 09:31:57'),
(2, 'Posts View', 'posts.view', 'posts', '2026-07-25 09:31:57'),
(3, 'Posts Create', 'posts.create', 'posts', '2026-07-25 09:31:57'),
(4, 'Posts Edit', 'posts.edit', 'posts', '2026-07-25 09:31:57'),
(5, 'Posts Delete', 'posts.delete', 'posts', '2026-07-25 09:31:57'),
(6, 'Pages View', 'pages.view', 'pages', '2026-07-25 09:31:57'),
(7, 'Pages Create', 'pages.create', 'pages', '2026-07-25 09:31:57'),
(8, 'Pages Edit', 'pages.edit', 'pages', '2026-07-25 09:31:57'),
(9, 'Pages Delete', 'pages.delete', 'pages', '2026-07-25 09:31:57'),
(10, 'Categories View', 'categories.view', 'categories', '2026-07-25 09:31:57'),
(11, 'Categories Create', 'categories.create', 'categories', '2026-07-25 09:31:57'),
(12, 'Categories Edit', 'categories.edit', 'categories', '2026-07-25 09:31:57'),
(13, 'Categories Delete', 'categories.delete', 'categories', '2026-07-25 09:31:57'),
(14, 'Menus View', 'menus.view', 'menus', '2026-07-25 09:31:57'),
(15, 'Menus Create', 'menus.create', 'menus', '2026-07-25 09:31:57'),
(16, 'Menus Edit', 'menus.edit', 'menus', '2026-07-25 09:31:57'),
(17, 'Menus Delete', 'menus.delete', 'menus', '2026-07-25 09:31:57'),
(18, 'Banners View', 'banners.view', 'banners', '2026-07-25 09:31:57'),
(19, 'Banners Create', 'banners.create', 'banners', '2026-07-25 09:31:57'),
(20, 'Banners Edit', 'banners.edit', 'banners', '2026-07-25 09:31:57'),
(21, 'Banners Delete', 'banners.delete', 'banners', '2026-07-25 09:31:57'),
(22, 'Gallery View', 'gallery.view', 'gallery', '2026-07-25 09:31:57'),
(23, 'Gallery Create', 'gallery.create', 'gallery', '2026-07-25 09:31:57'),
(24, 'Gallery Edit', 'gallery.edit', 'gallery', '2026-07-25 09:31:57'),
(25, 'Gallery Delete', 'gallery.delete', 'gallery', '2026-07-25 09:31:57'),
(26, 'Videos View', 'videos.view', 'videos', '2026-07-25 09:31:57'),
(27, 'Videos Create', 'videos.create', 'videos', '2026-07-25 09:31:57'),
(28, 'Videos Edit', 'videos.edit', 'videos', '2026-07-25 09:31:57'),
(29, 'Videos Delete', 'videos.delete', 'videos', '2026-07-25 09:31:57'),
(30, 'Events View', 'events.view', 'events', '2026-07-25 09:31:57'),
(31, 'Events Create', 'events.create', 'events', '2026-07-25 09:31:57'),
(32, 'Events Edit', 'events.edit', 'events', '2026-07-25 09:31:57'),
(33, 'Events Delete', 'events.delete', 'events', '2026-07-25 09:31:57'),
(34, 'Announcements View', 'announcements.view', 'announcements', '2026-07-25 09:31:57'),
(35, 'Announcements Create', 'announcements.create', 'announcements', '2026-07-25 09:31:57'),
(36, 'Announcements Edit', 'announcements.edit', 'announcements', '2026-07-25 09:31:57'),
(37, 'Announcements Delete', 'announcements.delete', 'announcements', '2026-07-25 09:31:57'),
(38, 'Media View', 'media.view', 'media', '2026-07-25 09:31:57'),
(39, 'Media Upload', 'media.upload', 'media', '2026-07-25 09:31:57'),
(40, 'Media Delete', 'media.delete', 'media', '2026-07-25 09:31:57'),
(41, 'Users View', 'users.view', 'users', '2026-07-25 09:31:57'),
(42, 'Users Create', 'users.create', 'users', '2026-07-25 09:31:57'),
(43, 'Users Edit', 'users.edit', 'users', '2026-07-25 09:31:57'),
(44, 'Users Delete', 'users.delete', 'users', '2026-07-25 09:31:57'),
(45, 'Settings View', 'settings.view', 'settings', '2026-07-25 09:31:57'),
(46, 'Settings Edit', 'settings.edit', 'settings', '2026-07-25 09:31:57'),
(47, 'Contact View', 'contact.view', 'contact', '2026-07-25 09:31:57'),
(48, 'Contact Delete', 'contact.delete', 'contact', '2026-07-25 09:31:57'),
(49, 'Newsletter View', 'newsletter.view', 'newsletter', '2026-07-25 09:31:57'),
(50, 'Newsletter Delete', 'newsletter.delete', 'newsletter', '2026-07-25 09:31:57'),
(51, 'Seo View', 'seo.view', 'seo', '2026-07-25 09:31:57'),
(52, 'Seo Edit', 'seo.edit', 'seo', '2026-07-25 09:31:57'),
(53, 'Backup View', 'backup.view', 'backup', '2026-07-25 09:31:57'),
(54, 'Backup Create', 'backup.create', 'backup', '2026-07-25 09:31:57'),
(55, 'Backup Restore', 'backup.restore', 'backup', '2026-07-25 09:31:57'),
(56, 'Activity View', 'activity.view', 'activity', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `preview_image` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `pdf_attachment` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_breaking` tinyint(1) NOT NULL DEFAULT 0,
  `is_trending` tinyint(1) NOT NULL DEFAULT 0,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `publish_date` datetime DEFAULT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(500) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `sub_category_id`, `title`, `slug`, `short_description`, `content`, `featured_image`, `preview_image`, `youtube_url`, `pdf_attachment`, `is_featured`, `is_breaking`, `is_trending`, `views`, `publish_date`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `canonical_url`, `og_image`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 'மக்கள் நலனுக்கான புதிய அறிக்கை', 'makkal-nalan-arikkai', 'அறிக்கைகள் குறித்த சுருக்க விளக்கம்.', '<p>அறிக்கைகள் குறித்த சுருக்க விளக்கம்.</p><p>மேலும் விவரங்கள் விரைவில்.</p>', 'uploads/posts/449797a36fa0ab0c_1789751145.png', 'uploads/posts/ace29abd67be72ed_1789751146.png', '', NULL, 1, 1, 0, 88, '2026-07-25 09:31:00', 'published', 'மக்கள் நலனுக்கான புதிய அறிக்கை', '', '', '', '', '2026-07-25 09:31:57', '2026-10-07 11:15:38'),
(2, 1, 2, NULL, 'முக்கிய அறிவிப்பு - மாவட்டக் கூட்டம்', 'mukkiya-arivippu', 'மாவட்ட அளவிலான கூட்டம் குறித்த அறிவிப்பு.', '<p>மாவட்ட அளவிலான கூட்டம் குறித்த அறிவிப்பு.</p><p>மேலும் விவரங்கள் விரைவில்.</p>', NULL, NULL, NULL, NULL, 0, 1, 1, 98, '2026-07-25 09:31:57', 'published', 'முக்கிய அறிவிப்பு - மாவட்டக் கூட்டம்', NULL, NULL, NULL, NULL, '2026-07-25 09:31:57', '2026-10-05 05:58:03'),
(3, 1, 4, NULL, 'சமீபத்திய போராட்டச் செய்தி', 'porattam-seythi', 'மக்கள் போராட்டம் குறித்த விவரங்கள்.', '<p>மக்கள் போராட்டம் குறித்த விவரங்கள்.</p><p>மேலும் விவரங்கள் விரைவில்.</p>', NULL, NULL, NULL, NULL, 1, 0, 1, 106, '2026-07-25 09:31:57', 'published', 'சமீபத்திய போராட்டச் செய்தி', NULL, NULL, NULL, NULL, '2026-07-25 09:31:57', '2026-10-05 05:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'Full system access', '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, 'Admin', 'admin', 'Administrative access', '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(3, 'Editor', 'editor', 'Content editing access', '2026-07-25 09:31:57', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 56),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(100) NOT NULL DEFAULT 'general',
  `key` varchar(150) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(50) DEFAULT 'text',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'general', 'site_name', 'புரட்சி பாரதம் கட்சி', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(2, 'general', 'site_tagline', 'அதிகாரப்பூர்வ இணையதளம்', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(3, 'general', 'site_email', 'info@example.com', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(4, 'general', 'site_phone', '+91 9092529250', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(5, 'general', 'site_address', 'Tamil Nadu, India', 'textarea', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(6, 'general', 'logo', '', 'image', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(7, 'general', 'favicon', '', 'image', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(8, 'general', 'footer_text', '© 2026 புரட்சி பாரதம் கட்சி. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.', 'textarea', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(9, 'general', 'google_analytics', '', 'textarea', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(10, 'social', 'facebook_url', '#', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(11, 'social', 'twitter_url', '#', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(12, 'social', 'youtube_url', '#', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(13, 'social', 'instagram_url', '#', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(14, 'smtp', 'smtp_host', 'smtp.gmail.com', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(15, 'smtp', 'smtp_port', '587', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(16, 'smtp', 'smtp_username', '', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(17, 'smtp', 'smtp_password', '', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(18, 'smtp', 'smtp_encryption', 'tls', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(19, 'seo', 'meta_title', 'புரட்சி பாரதம் கட்சி | அதிகாரப்பூர்வ இணையதளம்', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(20, 'seo', 'meta_description', 'அதிகாரப்பூர்வ இணையதளம்', 'textarea', '2026-07-25 09:31:57', '2026-09-19 08:29:06'),
(21, 'seo', 'meta_keywords', 'tamil, politics, news', 'text', '2026-07-25 09:31:57', '2026-09-19 08:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'அரசியல்', 'arasial', '2026-07-25 09:31:57'),
(2, 'செய்தி', 'seythi', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires_at` datetime DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `avatar`, `phone`, `bio`, `status`, `reset_token`, `reset_expires_at`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'admin@cms.local', '$2y$12$XTHg5ZgLaEiiIKUkB.z1pelFtBs13cnxpvsrgP1Ky2nIdXQ.MmmLK', NULL, NULL, NULL, 1, NULL, NULL, '2026-10-11 20:39:32', '::1', '2026-07-25 09:31:57', '2026-10-11 20:39:32'),
(2, 3, 'Content Editor', 'editor@cms.local', '$2y$12$zk7ITZc.6k4UzythfAPZcuwhHdwyrAozw9.GftLGeZ84xbGq8kfZG', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-07-25 09:31:57', '2026-07-25 09:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `youtube_url` varchar(500) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `slug`, `description`, `youtube_url`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'அறிமுகக் காணொளி', 'arimuga-kaanoli', 'இயக்க அறிமுகம்', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', NULL, 1, '2026-07-25 09:31:57', '2026-07-25 09:31:57'),
(2, 'VEERA', 'veera', '', 'https://youtu.be/YLSyrpy_fO0?list=RDMMYLSyrpy_fO0', 'uploads/videos/13330612d1128dba_1789750866.png', 1, '2026-09-18 22:31:07', '2026-09-18 22:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `visited_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `path`, `visited_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:02:21'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:02:22'),
(3, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:03:00'),
(4, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:03:38'),
(5, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/news', '2026-07-25 13:03:38'),
(6, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/contact', '2026-07-25 13:03:39'),
(7, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/search', '2026-07-25 13:03:39'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:04:15'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:04:17'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:04:59'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:10:00'),
(12, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:10:26'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:10:55'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:10:58'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:11:33'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:19:17'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:20:22'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/public/assets/images/logo.png', '2026-07-25 13:20:22'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:20:23'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/public/assets/images/logo.png', '2026-07-25 13:20:24'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:21:02'),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:23:23'),
(23, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:25:25'),
(24, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:25:36'),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:27:23'),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-07-25 13:27:36'),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:28:34'),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:33:54'),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:36:12'),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:36:15'),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:36:23'),
(32, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 13:38:31'),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:38:49'),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:39:03'),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:39:04'),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:39:22'),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:39:28'),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:41:15'),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 13:42:14'),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:25:07'),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:30:33'),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:32:11'),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:32:54'),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:32:56'),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:40:25'),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:40:59'),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:42:28'),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:42:45'),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:42:53'),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:42:54'),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:44:29'),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:44:31'),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:45:41'),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:45:53'),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:46:12'),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:47:26'),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/page/privacy-policy', '2026-07-25 14:52:14'),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/page/privacy-policy', '2026-07-25 14:52:15'),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 14:52:19'),
(60, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-25 15:15:32'),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 15:16:09'),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 15:18:38'),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-25 17:12:48'),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-26 18:03:21'),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-26 23:03:42'),
(66, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/membership', '2026-07-29 09:09:20'),
(67, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-29 09:09:20'),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-29 09:17:12'),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:17:18'),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:18:38'),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:18:40'),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:18:49'),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:20:44'),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:21:31'),
(75, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-29 09:21:53'),
(76, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/', '2026-07-29 09:22:08'),
(77, '::1', '', '/', '2026-07-29 09:22:49'),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-07-29 09:23:02'),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/TMM266B2E9B', '2026-07-29 09:23:06'),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/TMM266B2E9B', '2026-07-29 09:23:09'),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/TMM266B2E9B', '2026-07-29 09:23:23'),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-29 09:30:09'),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-07-29 09:32:33'),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/TMM263BE813', '2026-07-29 09:32:35'),
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 14:19:04'),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/page/about', '2026-07-31 14:19:14'),
(87, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/page/about', '2026-07-31 14:19:20'),
(88, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/events', '2026-07-31 14:19:22'),
(89, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/gallery', '2026-07-31 14:19:24'),
(90, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/videos', '2026-07-31 14:19:25'),
(91, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/contact', '2026-07-31 14:19:26'),
(92, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-07-31 14:19:30'),
(93, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 14:21:29'),
(94, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/news', '2026-07-31 14:23:59'),
(95, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:29:21'),
(96, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:38:50'),
(97, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:42:11'),
(98, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/organization', '2026-07-31 15:46:45'),
(99, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/organization/manila-nirvagigal', '2026-07-31 15:46:45'),
(100, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/organization/member/1', '2026-07-31 15:46:46'),
(101, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.8875', '/organization/search', '2026-07-31 15:46:46'),
(102, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:55:20'),
(103, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:55:21'),
(104, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 15:55:24'),
(105, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/page/about', '2026-07-31 15:55:27'),
(106, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/events', '2026-07-31 15:55:28'),
(107, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/organization', '2026-07-31 15:55:29'),
(108, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/organization/manila-nirvagigal', '2026-07-31 15:55:36'),
(109, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/organization', '2026-07-31 15:55:43'),
(110, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/organization', '2026-07-31 16:20:16'),
(111, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/organization', '2026-07-31 16:21:18'),
(112, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-07-31 23:47:55'),
(113, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.13.25 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_A7K2M9', '2026-08-06 11:55:00'),
(114, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.13.25 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_A7K2M9', '2026-08-06 11:55:01'),
(115, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.13.25 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_A7K2M9', '2026-08-06 12:01:05'),
(116, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 12:01:13'),
(117, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:01:15'),
(118, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-08-06 12:04:17'),
(119, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/PBK_RESQJ5', '2026-08-06 12:04:22'),
(120, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_RESQJ5', '2026-08-06 12:04:27'),
(121, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_RESQJ5', '2026-08-06 12:12:27'),
(122, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BPHOTO_HREF%7D%7D', '2026-08-06 12:12:28'),
(123, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BQR_HREF%7D%7D', '2026-08-06 12:12:28'),
(124, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_RESQJ5', '2026-08-06 12:12:29'),
(125, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BPHOTO_HREF%7D%7D', '2026-08-06 12:12:29'),
(126, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BQR_HREF%7D%7D', '2026-08-06 12:12:29'),
(127, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_RESQJ5', '2026-08-06 12:12:39'),
(128, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BPHOTO_HREF%7D%7D', '2026-08-06 12:12:39'),
(129, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/%7B%7BQR_HREF%7D%7D', '2026-08-06 12:12:39'),
(130, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 12:12:50'),
(131, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:12:50'),
(132, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:13:51'),
(133, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:15:14'),
(134, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:16:20'),
(135, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.13.25 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_A7K2M9', '2026-08-06 12:17:26'),
(136, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:17:30'),
(137, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 12:17:31'),
(138, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-08-06 12:18:02'),
(139, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/PBK_5ASE98', '2026-08-06 12:18:05'),
(140, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_5ASE98', '2026-08-06 12:18:07'),
(141, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_5ASE98', '2026-08-06 12:20:58'),
(142, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_5ASE98', '2026-08-06 12:21:23'),
(143, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_5ASE98', '2026-08-06 12:21:24'),
(144, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 16:22:41'),
(145, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/post/porattam-seythi', '2026-08-06 16:22:47'),
(146, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 16:22:56'),
(147, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:22:33'),
(148, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:31:53'),
(149, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 18:33:00'),
(150, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/videos', '2026-08-06 18:36:21'),
(151, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/videos', '2026-08-06 18:36:23'),
(152, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:22'),
(153, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:24'),
(154, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:31'),
(155, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:44'),
(156, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:45'),
(157, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:44:46'),
(158, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:01'),
(159, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:02'),
(160, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:21'),
(161, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:23'),
(162, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:37'),
(163, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:45:38'),
(164, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:04'),
(165, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:05'),
(166, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:06'),
(167, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:16'),
(168, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:26'),
(169, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:49'),
(170, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:46:51'),
(171, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/bk', '2026-08-06 18:51:25'),
(172, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/bk', '2026-08-06 18:51:27'),
(173, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/bk', '2026-08-06 18:51:47'),
(174, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/bk', '2026-08-06 18:51:47'),
(175, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:53:15'),
(176, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 18:53:18'),
(177, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:53:28'),
(178, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 18:55:19'),
(179, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/category/arivippukal', '2026-08-06 18:55:24'),
(180, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/post/mukkiya-arivippu', '2026-08-06 18:55:25'),
(181, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 19:11:40'),
(182, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-06 19:14:34'),
(183, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-06 19:14:36'),
(184, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-08-06 19:15:05'),
(185, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/PBK_ZQB9B9', '2026-08-06 19:15:08'),
(186, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/', '2026-08-07 08:54:38'),
(187, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership', '2026-08-07 08:54:42'),
(188, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/register', '2026-08-07 08:55:39'),
(189, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/success/PBK_9XZA6C', '2026-08-07 08:55:43'),
(190, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '/membership/card/PBK_9XZA6C', '2026-08-07 08:55:45'),
(191, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-10 09:28:07'),
(192, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_9XZA6C', '2026-08-10 09:28:07'),
(193, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-10 09:28:08'),
(194, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-10 09:28:11'),
(195, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-10 09:59:22'),
(196, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-10 09:59:25'),
(197, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-10 10:00:07'),
(198, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_ZNFWKP', '2026-08-10 10:00:11'),
(199, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:00:13'),
(200, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:03:31'),
(201, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:06:29'),
(202, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:06:31'),
(203, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:12:41'),
(204, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:12:42'),
(205, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_ZNFWKP', '2026-08-10 10:15:54'),
(206, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:15:55'),
(207, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:18:09'),
(208, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:18:11'),
(209, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:18:55'),
(210, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:18:57'),
(211, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_ZNFWKP', '2026-08-10 10:19:03'),
(212, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-10 10:46:48'),
(213, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-10 10:46:50'),
(214, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-10 10:47:26'),
(215, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_YM9R3L', '2026-08-10 10:47:30'),
(216, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:47:33'),
(217, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:50:20'),
(218, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:51:35'),
(219, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:53:47'),
(220, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:53:50'),
(221, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:53:51'),
(222, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:53:59'),
(223, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:55:17'),
(224, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:55:22'),
(225, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:56:31'),
(226, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 10:59:13'),
(227, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:00:59'),
(228, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:02:37'),
(229, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:02:38'),
(230, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:03:34'),
(231, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:03:47'),
(232, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:03:48'),
(233, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:03:48'),
(234, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:03:50'),
(235, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:06:13'),
(236, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:06:34'),
(237, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:09:06'),
(238, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:09:08'),
(239, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:09:10'),
(240, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:18:48'),
(241, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:08'),
(242, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:09'),
(243, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:13'),
(244, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:13'),
(245, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:13'),
(246, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:24'),
(247, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:33'),
(248, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:33:35'),
(249, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 11:40:05'),
(250, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_YM9R3L', '2026-08-10 11:40:10'),
(251, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 12:21:00'),
(252, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_YM9R3L', '2026-08-10 12:26:37'),
(253, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:27:29'),
(254, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:29:10'),
(255, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:30:27'),
(256, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:30:55'),
(257, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:32:11'),
(258, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:32:36'),
(259, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-10 15:36:06'),
(260, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:13:05'),
(261, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:13:21'),
(262, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:15:52'),
(263, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:05'),
(264, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:07'),
(265, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:24'),
(266, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:26'),
(267, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:41'),
(268, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:43'),
(269, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:50'),
(270, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:16:53'),
(271, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:17:36'),
(272, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:17:39'),
(273, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:19:19'),
(274, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.130.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:19:46'),
(275, '::1', '', '/membership/card/PBK_YM9R3L', '2026-08-11 10:37:39'),
(276, '::1', '', '/membership/card/PBK_YM9R3L', '2026-08-11 10:38:00'),
(277, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 10:38:57'),
(278, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 10:41:53'),
(279, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 10:41:54'),
(280, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 10:42:28'),
(281, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_EYFBF7', '2026-08-11 10:42:31'),
(282, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:42:34'),
(283, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:44:35'),
(284, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:44:36'),
(285, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_EYFBF7', '2026-08-11 10:45:32'),
(286, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:45:33'),
(287, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:45:34'),
(288, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:45:38'),
(289, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:48:41'),
(290, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_EYFBF7', '2026-08-11 10:48:43'),
(291, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 10:48:47');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `path`, `visited_at`) VALUES
(292, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 10:49:49'),
(293, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_8Y49PU', '2026-08-11 10:49:52'),
(294, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_8Y49PU', '2026-08-11 10:49:53'),
(295, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:50:54'),
(296, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:04'),
(297, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:05'),
(298, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:05'),
(299, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:05'),
(300, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:05'),
(301, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:25'),
(302, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:25'),
(303, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:51:25'),
(304, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.132.0 Chrome/148.0.7778.280 Electron/42.7.1 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 10:52:02'),
(305, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 10:59:36'),
(306, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 10:59:38'),
(307, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 11:00:09'),
(308, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_VLAV2H', '2026-08-11 11:00:12'),
(309, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_VLAV2H', '2026-08-11 11:00:12'),
(310, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_VLAV2H', '2026-08-11 11:00:40'),
(311, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 11:10:45'),
(312, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 11:13:34'),
(313, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 11:14:21'),
(314, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_4RU6CK', '2026-08-11 11:14:24'),
(315, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:15:14'),
(316, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:15:29'),
(317, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:16:23'),
(318, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 11:24:49'),
(319, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 11:24:51'),
(320, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 11:26:58'),
(321, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 11:28:21'),
(322, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_58MRRM', '2026-08-11 11:28:26'),
(323, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:28:27'),
(324, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 11:39:00'),
(325, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 11:39:04'),
(326, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/register', '2026-08-11 11:39:51'),
(327, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_8RWCJX', '2026-08-11 11:39:55'),
(328, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_8RWCJX', '2026-08-11 11:39:57'),
(329, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:42:08'),
(330, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:42:09'),
(331, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:42:13'),
(332, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:42:17'),
(333, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-08-11 11:42:26'),
(334, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:42:36'),
(335, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:44:50'),
(336, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:45:10'),
(337, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_58MRRM', '2026-08-11 11:46:14'),
(338, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:46:16'),
(339, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:47:45'),
(340, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:49:17'),
(341, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_58MRRM', '2026-08-11 11:51:00'),
(342, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/success/PBK_8RWCJX', '2026-08-11 12:05:16'),
(343, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 13:12:56'),
(344, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 13:13:02'),
(345, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership/card/PBK_YM9R3L', '2026-08-11 13:13:07'),
(346, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-11 13:36:55'),
(347, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-11 13:36:57'),
(348, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-13 18:53:34'),
(349, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-13 18:54:06'),
(350, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-13 18:54:17'),
(351, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-13 19:01:41'),
(352, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-13 19:11:57'),
(353, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-13 19:11:59'),
(354, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 07:38:03'),
(355, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:07'),
(356, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:11'),
(357, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:22'),
(358, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:33'),
(359, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:35'),
(360, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:42'),
(361, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:38:43'),
(362, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:16'),
(363, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:18'),
(364, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:21'),
(365, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:34'),
(366, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:47'),
(367, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:39:48'),
(368, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:40:13'),
(369, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:40:16'),
(370, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 07:40:35'),
(371, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:44:31'),
(372, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:44:56'),
(373, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:45:07'),
(374, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:45:08'),
(375, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:45:14'),
(376, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:45:20'),
(377, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:45:31'),
(378, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 07:46:32'),
(379, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 10:46:19'),
(380, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:46:23'),
(381, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 10:48:23'),
(382, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:48:26'),
(383, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:48:28'),
(384, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:48:33'),
(385, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:49:18'),
(386, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:53:26'),
(387, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:56:27'),
(388, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 10:56:29'),
(389, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/events', '2026-08-14 10:56:31'),
(390, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/organization', '2026-08-14 10:56:32'),
(391, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/gallery', '2026-08-14 10:56:38'),
(392, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/contact', '2026-08-14 10:56:42'),
(393, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/events', '2026-08-14 10:56:46'),
(394, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/events', '2026-08-14 10:56:49'),
(395, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/history', '2026-08-14 10:57:53'),
(396, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 10:58:03'),
(397, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/history', '2026-08-14 10:58:11'),
(398, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-14 10:58:14'),
(399, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:03:13'),
(400, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/history', '2026-08-14 11:03:13'),
(401, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/vision', '2026-08-14 11:03:14'),
(402, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/mission', '2026-08-14 11:03:14'),
(403, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/news', '2026-08-14 11:03:14'),
(404, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/contact', '2026-08-14 11:03:14'),
(405, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/leader', '2026-08-14 11:03:14'),
(406, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/privacy-policy', '2026-08-14 11:04:14'),
(407, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/terms', '2026-08-14 11:04:14'),
(408, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/gallery', '2026-08-14 11:04:14'),
(409, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/organization', '2026-08-14 11:04:14'),
(410, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/history', '2026-08-14 11:06:50'),
(411, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/history', '2026-08-14 11:06:51'),
(412, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:06:51'),
(413, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/about', '2026-08-14 11:06:51'),
(414, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/news', '2026-08-14 11:06:51'),
(415, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/history', '2026-08-14 11:16:01'),
(416, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/history', '2026-08-14 11:16:04'),
(417, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:17:52'),
(418, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/history', '2026-08-14 11:17:52'),
(419, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/vision', '2026-08-14 11:17:53'),
(420, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/mission', '2026-08-14 11:17:53'),
(421, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/privacy-policy', '2026-08-14 11:17:53'),
(422, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/terms', '2026-08-14 11:17:53'),
(423, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/news', '2026-08-14 11:17:53'),
(424, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/events', '2026-08-14 11:17:54'),
(425, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:20:12'),
(426, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/about', '2026-08-14 11:20:13'),
(427, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:20:13'),
(428, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/history', '2026-08-14 11:20:14'),
(429, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/about', '2026-08-14 11:21:30'),
(430, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/history', '2026-08-14 11:21:30'),
(431, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/about', '2026-08-14 11:22:05'),
(432, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/history', '2026-08-14 11:22:05'),
(433, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/vision', '2026-08-14 11:22:06'),
(434, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/mission', '2026-08-14 11:22:06'),
(435, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/history', '2026-08-14 11:22:06'),
(436, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/page/about', '2026-08-14 11:22:06'),
(437, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9168', '/news', '2026-08-14 11:22:06'),
(438, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 11:29:58'),
(439, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 11:30:03'),
(440, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 12:37:18'),
(441, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 12:38:13'),
(442, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 12:38:15'),
(443, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 12:38:53'),
(444, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/history', '2026-08-14 12:39:42'),
(445, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/organization', '2026-08-14 12:39:46'),
(446, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/events', '2026-08-14 12:39:47'),
(447, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/page/about', '2026-08-14 12:39:47'),
(448, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-24 18:57:17'),
(449, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-26 21:24:10'),
(450, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-31 13:53:34'),
(451, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/membership', '2026-08-31 13:53:54'),
(452, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-31 13:53:56'),
(453, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-08-31 13:53:59'),
(454, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-31 13:54:02'),
(455, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '/', '2026-08-31 20:20:33'),
(456, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:48:56'),
(457, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:50:05'),
(458, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:58:30'),
(459, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:58:31'),
(460, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:58:47'),
(461, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:58:48'),
(462, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:58:50'),
(463, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:59:14'),
(464, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 17:59:59'),
(465, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 18:00:05'),
(466, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 18:04:46'),
(467, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 18:21:17'),
(468, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 19:42:24'),
(469, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 19:42:27'),
(470, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 21:30:21'),
(471, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/post/makkal-nalan-arikkai', '2026-09-01 21:30:29'),
(472, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-01 21:33:43'),
(473, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-02 15:28:46'),
(474, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-04 21:57:44'),
(475, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-16 18:13:32'),
(476, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/gallery/pothukkootangal', '2026-09-16 18:13:41'),
(477, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/', '2026-09-16 18:22:17'),
(478, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '/gallery/veera', '2026-09-16 18:22:29'),
(479, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 19:09:25'),
(480, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 19:10:43'),
(481, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery/pothukkootangal', '2026-09-17 19:12:07'),
(482, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery/veera', '2026-09-17 19:12:11'),
(483, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery', '2026-09-17 19:12:19'),
(484, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery/veera', '2026-09-17 19:12:35'),
(485, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 19:12:48'),
(486, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/videos/arimuga-kaanoli', '2026-09-17 19:13:31'),
(487, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 19:19:39'),
(488, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 19:19:41'),
(489, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 20:54:49'),
(490, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/videos/arimuga-kaanoli', '2026-09-17 20:54:56'),
(491, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-17 20:55:19'),
(492, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery/veera', '2026-09-17 20:55:21'),
(493, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:28:58'),
(494, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:33:04'),
(495, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/videos/veera', '2026-09-18 22:33:08'),
(496, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:33:12'),
(497, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/videos', '2026-09-18 22:33:13'),
(498, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:33:20'),
(499, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-09-18 22:33:24'),
(500, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-09-18 22:35:08'),
(501, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:35:11'),
(502, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-09-18 22:35:28'),
(503, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/category/arivippukal', '2026-09-18 22:35:32'),
(504, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/category/arivippukal', '2026-09-18 22:35:48'),
(505, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:35:50'),
(506, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 22:35:55'),
(507, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/register', '2026-09-18 22:37:32'),
(508, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/success/PBK_P4GFKR', '2026-09-18 22:37:36'),
(509, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:37:38'),
(510, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 22:38:29'),
(511, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 22:38:31'),
(512, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:41:11'),
(513, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:41:12'),
(514, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:43:30'),
(515, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:43:30'),
(516, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 22:46:46'),
(517, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership', '2026-09-18 22:51:09'),
(518, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership', '2026-09-18 22:51:09'),
(519, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:51:27'),
(520, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 22:57:07'),
(521, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 23:09:53'),
(522, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 23:09:56'),
(523, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 23:09:57'),
(524, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 23:13:13'),
(525, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 23:13:22'),
(526, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 23:13:38'),
(527, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_4RU6CK', '2026-09-18 23:15:45'),
(528, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 23:19:15'),
(529, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 23:19:38'),
(530, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 23:21:02'),
(531, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 23:21:03'),
(532, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 23:21:08'),
(533, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_P4GFKR', '2026-09-18 23:21:35'),
(534, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/', '2026-09-18 23:21:36'),
(535, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/', '2026-09-18 23:22:30'),
(536, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-18 23:23:58'),
(537, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership', '2026-09-18 23:24:43'),
(538, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/register', '2026-09-18 23:25:24'),
(539, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/success/PBK_56GNAQ', '2026-09-18 23:25:27'),
(540, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-18 23:25:30'),
(541, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-18 23:28:55'),
(542, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-18 23:31:25'),
(543, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-18 23:35:42'),
(544, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.17.8 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-18 23:35:42'),
(545, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-19 08:23:25'),
(546, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/success/PBK_56GNAQ', '2026-09-19 08:23:26'),
(547, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-19 08:23:40'),
(548, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/08913a0cc89f59d2_1788619029.jpg', '2026-09-24 17:24:20'),
(549, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/fa93ca28f7f30708_1788618709.jpg', '2026-09-24 17:24:20'),
(550, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/4665764395a39c2d_1788867418.png', '2026-09-24 17:24:20'),
(551, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/d194e2219ca8e563_1788619068.jpg', '2026-09-24 17:24:20'),
(552, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/fa93ca28f7f30708_1788618709.jpg', '2026-09-24 17:24:23'),
(553, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/4665764395a39c2d_1788867418.png', '2026-09-24 17:24:23'),
(554, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/d194e2219ca8e563_1788619068.jpg', '2026-09-24 17:24:23'),
(555, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/08913a0cc89f59d2_1788619029.jpg', '2026-09-24 17:24:23'),
(556, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:56:48'),
(557, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:56:52'),
(558, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:56:52'),
(559, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:56:57'),
(560, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:56:58'),
(561, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:58:10'),
(562, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:58:10'),
(563, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:58:12'),
(564, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:58:12'),
(565, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 11:58:14'),
(566, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 11:58:14'),
(567, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:58:19'),
(568, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:58:19'),
(569, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:58:20'),
(570, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:58:20'),
(571, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 11:58:22'),
(572, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 11:58:22'),
(573, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/page/about', '2026-09-24 11:58:26'),
(574, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/events', '2026-09-24 11:58:30'),
(575, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:58:32'),
(576, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:58:33'),
(577, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:23'),
(578, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:23'),
(579, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:24'),
(580, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:24'),
(581, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:25'),
(582, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:25'),
(583, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:25'),
(584, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:26'),
(585, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 11:59:27'),
(586, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 11:59:27'),
(587, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:28'),
(588, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:28'),
(589, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 11:59:29'),
(590, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 11:59:29'),
(591, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 11:59:30');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `path`, `visited_at`) VALUES
(592, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 11:59:30'),
(593, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:00:48'),
(594, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:00:48'),
(595, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:00:48'),
(596, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 12:00:50'),
(597, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:00:50'),
(598, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:00:52'),
(599, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:00:52'),
(600, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:00:52'),
(601, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 12:00:52'),
(602, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:00:52'),
(603, '74.7.230.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-09-24 12:17:27'),
(604, '216.73.216.103', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', '/robots.txt', '2026-09-24 12:30:34'),
(605, '216.73.216.103', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', '/public/sitemap.xml', '2026-09-24 12:30:34'),
(606, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:46:45'),
(607, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:46:45'),
(608, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:46:45'),
(609, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:46:45'),
(610, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:46:45'),
(611, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:46:45'),
(612, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:46:46'),
(613, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:46:47'),
(614, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:46:47'),
(615, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 12:47:00'),
(616, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:47:00'),
(617, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 12:48:06'),
(618, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:06'),
(619, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:23'),
(620, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:25'),
(621, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/7b8627fa10e7044d_1789563095.png', '2026-09-24 12:48:25'),
(622, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/afa28263d6cd49b2_1789563107.png', '2026-09-24 12:48:25'),
(623, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/69504882167e3258_1789563102.png', '2026-09-24 12:48:25'),
(624, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:46'),
(625, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:48:55'),
(626, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:55'),
(627, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:48:55'),
(628, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 12:48:56'),
(629, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:56'),
(630, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:48:56'),
(631, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 12:48:57'),
(632, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:48:57'),
(633, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/gallery/veera', '2026-09-24 12:49:00'),
(634, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 12:49:44'),
(635, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:49:44'),
(636, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/gallery/ec47878b06e9737f_1789563087.png', '2026-09-24 12:49:46'),
(637, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/videos/13330612d1128dba_1789750866.png', '2026-09-24 12:49:46'),
(638, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 12:53:59'),
(639, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:53:59'),
(640, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 12:54:01'),
(641, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 12:54:01'),
(642, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/public/uploads/posts/449797a36fa0ab0c_1789751145.png', '2026-09-24 12:54:02'),
(643, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 13:17:26'),
(644, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 13:17:29'),
(645, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-24 13:17:36'),
(646, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-24 13:21:59'),
(647, '116.73.176.45', 'WhatsApp/2.2636.100 W', '/', '2026-09-24 13:22:14'),
(648, '74.7.241.186', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/index.php', '2026-09-24 13:28:54'),
(649, '114.119.156.95', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/index.php', '2026-09-24 18:23:28'),
(650, '2a03:2880:11ff:5f::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/index.php', '2026-09-24 19:45:37'),
(651, '2a03:2880:11ff:72::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/index.php', '2026-09-24 19:45:37'),
(652, '52.167.144.16', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-24 23:56:03'),
(653, '13.95.133.245', 'curl/8.6.0', '/', '2026-09-25 00:18:03'),
(654, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-25 04:17:15'),
(655, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:15:56'),
(656, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:09'),
(657, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:16:11'),
(658, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:16:12'),
(659, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:12'),
(660, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:15'),
(661, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:18'),
(662, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:20'),
(663, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:25'),
(664, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:16:31'),
(665, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:16:31'),
(666, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:33'),
(667, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:36'),
(668, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:16:39'),
(669, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-25 07:17:32'),
(670, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:35'),
(671, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:39'),
(672, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:44'),
(673, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:44'),
(674, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:47'),
(675, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:48'),
(676, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:17:51'),
(677, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:18:11'),
(678, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:18:11'),
(679, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:18:12'),
(680, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:18:18'),
(681, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/index.php', '2026-09-25 07:18:19'),
(682, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/index.php', '2026-09-25 07:18:24'),
(683, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/index.php', '2026-09-25 07:18:29'),
(684, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/', '2026-09-25 07:18:39'),
(685, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', '/index.php', '2026-09-25 07:18:50'),
(686, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:22:52'),
(687, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-25 07:23:46'),
(688, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-25 07:23:48'),
(689, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:26:49'),
(690, '2406:7400:ce:f69b:815f:b2b7:123f:3d56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-25 07:30:51'),
(691, '40.77.167.187', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/index.php', '2026-09-25 11:30:07'),
(692, '40.77.167.74', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-25 11:30:15'),
(693, '40.77.167.187', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/index.php', '2026-09-25 11:57:56'),
(694, '205.169.39.196', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '/', '2026-09-25 12:03:21'),
(695, '205.169.39.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '/', '2026-09-25 12:03:24'),
(696, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-26 00:03:51'),
(697, '52.167.144.181', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-26 00:04:28'),
(698, '52.167.144.232', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-26 03:48:32'),
(699, '74.7.244.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/index.php', '2026-09-26 04:19:17'),
(700, '74.7.244.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/index.php', '2026-09-26 04:42:48'),
(701, '44.236.207.248', 'Go-http-client/2.0', '/', '2026-09-26 06:34:25'),
(702, '44.236.207.248', 'Go-http-client/2.0', '/', '2026-09-26 06:34:25'),
(703, '44.236.207.248', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/150.0.0.0 Safari/537.36', '/', '2026-09-26 06:34:26'),
(704, '52.167.144.159', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization/manila-sirupanmai', '2026-09-26 08:28:18'),
(705, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:45:09'),
(706, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:45:12'),
(707, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 09:45:14'),
(708, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 09:45:22'),
(709, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 09:45:26'),
(710, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization', '2026-09-26 09:45:28'),
(711, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/gallery', '2026-09-26 09:45:31'),
(712, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization', '2026-09-26 09:45:31'),
(713, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 09:45:32'),
(714, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:48:04'),
(715, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/membership', '2026-09-26 09:54:15'),
(716, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization/member/1', '2026-09-26 09:54:27'),
(717, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-26 09:54:39'),
(718, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/membership/card/PBK_56GNAQ', '2026-09-26 09:56:03'),
(719, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/membership/success/PBK_56GNAQ', '2026-09-26 09:56:08'),
(720, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/contact', '2026-09-26 09:57:23'),
(721, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/contact', '2026-09-26 09:57:35'),
(722, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/contact', '2026-09-26 09:57:36'),
(723, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/contact', '2026-09-26 09:58:59'),
(724, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 09:59:25'),
(725, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:32'),
(726, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:36'),
(727, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 09:59:41'),
(728, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:43'),
(729, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:44'),
(730, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:53'),
(731, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 09:59:53'),
(732, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:00:07'),
(733, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:00:07'),
(734, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 10:00:09'),
(735, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:00:10'),
(736, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization', '2026-09-26 10:00:13'),
(737, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/gallery', '2026-09-26 10:00:14'),
(738, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/contact', '2026-09-26 10:00:16'),
(739, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/videos', '2026-09-26 10:00:17'),
(740, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 10:00:17'),
(741, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:00:18'),
(742, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:00:18'),
(743, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:00:52'),
(744, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:05:12'),
(745, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:05:55'),
(746, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events/manila-manadu-2026', '2026-09-26 10:05:55'),
(747, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events/manila-manadu-2026', '2026-09-26 10:07:09'),
(748, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events/manila-manadu-2026', '2026-09-26 10:07:11'),
(749, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events/manila-manadu-2026', '2026-09-26 10:07:11'),
(750, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:07:13'),
(751, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/page/about', '2026-09-26 10:07:16'),
(752, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:07:17'),
(753, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events/manila-manadu-2026', '2026-09-26 10:07:18'),
(754, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:07:28'),
(755, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:19'),
(756, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:22'),
(757, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:30'),
(758, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:43'),
(759, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:44'),
(760, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:46'),
(761, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:23:50'),
(762, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-26 10:34:46'),
(763, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-26 10:35:22'),
(764, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-26 10:35:32'),
(765, '116.73.176.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-26 10:36:46'),
(766, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/', '2026-09-26 10:36:52'),
(767, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/events', '2026-09-26 10:37:03'),
(768, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/category/arikkaihal', '2026-09-26 10:37:42'),
(769, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/news', '2026-09-26 10:37:50'),
(770, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/gallery', '2026-09-26 10:37:52'),
(771, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization', '2026-09-26 10:37:53'),
(772, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/organization/mavattam-nirvagigal', '2026-09-26 10:37:55'),
(773, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/videos', '2026-09-26 10:38:00'),
(774, '2401:4900:1f2d:ef9d:699e:6a45:1f92:e6fc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/gallery', '2026-09-26 10:38:00'),
(775, '40.77.167.224', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-26 11:31:05'),
(776, '2401:4900:1f2d:ef9d:8c52:d92a:5c00:4804', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '/gallery', '2026-09-26 11:59:42'),
(777, '114.119.158.143', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-09-26 12:13:43'),
(778, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-09-26 14:31:53'),
(779, '167.71.11.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 ForestEngine/1.0 (+https://forestengine.net/#opt-out)', '/', '2026-09-26 17:57:53'),
(780, '188.166.76.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 ForestEngine/1.0 (+https://forestengine.net/#opt-out)', '/', '2026-09-26 18:58:37'),
(781, '52.167.144.212', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-26 20:22:09'),
(782, '52.167.144.177', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-26 23:14:37'),
(783, '90.185.163.97', 'domainbox-domain-snapshot/0.1', '/', '2026-09-27 02:51:11'),
(784, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-27 04:55:09'),
(785, '2a03:2880:3ff:55::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-27 07:28:24'),
(786, '2a03:2880:2ff:47::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-27 07:28:25'),
(787, '40.77.167.14', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-27 10:46:10'),
(788, '136.108.92.180', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '/media/system/js/core.js', '2026-09-27 14:04:13'),
(789, '136.108.92.180', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '/wp-includes/js/jquery/jquery.js', '2026-09-27 14:04:18'),
(790, '40.77.167.203', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-09-27 18:08:37'),
(791, '40.77.167.15', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization', '2026-09-27 18:08:50'),
(792, '74.7.244.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-09-27 20:23:57'),
(793, '74.7.244.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-09-27 21:50:13'),
(794, '40.77.167.203', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-09-28 00:12:21'),
(795, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-28 00:12:26'),
(796, '20.15.133.164', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-09-28 01:05:07'),
(797, '20.15.133.174', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/ac09fd7be83575b3_1788618799.jpeg', '2026-09-28 01:05:16'),
(798, '40.77.167.27', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/ac09fd7be83575b3_1788618799.jpeg', '2026-09-28 01:05:17'),
(799, '2a03:2880:10ff:4::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-28 03:53:10'),
(800, '34.66.201.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '/media/system/js/core.js', '2026-09-28 06:23:08'),
(801, '34.66.201.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '/wp-includes/js/jquery/jquery.js', '2026-09-28 06:23:10'),
(802, '5.133.192.167', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '/', '2026-09-28 08:45:48'),
(803, '114.119.146.126', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-09-28 09:16:50'),
(804, '52.167.144.179', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/ed65a5409db387fe_1788618799.png', '2026-09-28 10:55:06'),
(805, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-28 12:10:07'),
(806, '40.77.167.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-28 13:30:15'),
(807, '40.77.167.230', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/678f76728af4d0ec_1788618761.jpg', '2026-09-28 15:01:30'),
(808, '20.229.51.198', 'curl/8.6.0', '/', '2026-09-28 18:14:54'),
(809, '114.119.146.126', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-09-28 22:08:22'),
(810, '2a03:2880:13ff:4f::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-29 00:57:23'),
(811, '84.213.3.53', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '/', '2026-09-29 03:27:44'),
(812, '40.77.167.130', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-29 08:03:27'),
(813, '2a03:2880:25ff:4e::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-29 09:07:38'),
(814, '2406:7400:ce:45eb:c1e:a940:4ea4:d733', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-29 10:31:44'),
(815, '2406:7400:ce:45eb:c1e:a940:4ea4:d733', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-29 10:31:52'),
(816, '2406:7400:ce:45eb:c1e:a940:4ea4:d733', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-29 10:32:04'),
(817, '2a03:2880:f816:7b::', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 (compatible; meta-webindexer/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler))', '/post/sc-st', '2026-09-29 10:55:03'),
(818, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-29 11:18:40'),
(819, '74.7.244.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-09-29 11:29:29'),
(820, '2409:40e0:102c:b272:21c2:4782:625c:973', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', '/index.php', '2026-09-29 12:23:48'),
(821, '52.167.144.183', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-29 12:31:49'),
(822, '74.7.244.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-09-29 13:08:47'),
(823, '5.198.248.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Safari/605.1.1', '/', '2026-09-29 17:39:08'),
(824, '83.140.246.68', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Safari/605.1.1', '/post/makkal-nalan-arikkai', '2026-09-29 17:39:08'),
(825, '192.121.186.101', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Safari/605.1.1', '/gallery/pothukkootangal', '2026-09-29 17:39:08'),
(826, '185.157.90.20', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Safari/605.1.1', '/videos/arimuga-kaanoli', '2026-09-29 17:39:08'),
(827, '205.169.39.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', '/', '2026-09-30 00:57:48'),
(828, '34.118.68.165', 'Mozilla/5.0 (iPhone13,2; U; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mobile/15E148 Safari/602.1', '/', '2026-09-30 00:59:16'),
(829, '151.40.196.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '/', '2026-09-30 03:26:38'),
(830, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-09-30 11:45:41'),
(831, '20.229.51.198', 'curl/8.6.0', '/', '2026-09-30 12:44:08'),
(832, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-09-30 13:04:23'),
(833, '40.77.167.25', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-09-30 13:05:08'),
(834, '64.227.104.248', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-09-30 13:37:26'),
(835, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-09-30 15:13:51'),
(836, '2a03:2880:16ff:e::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-09-30 17:15:02'),
(837, '114.119.138.99', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-09-30 20:59:02'),
(838, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-01 00:36:57'),
(839, '147.182.240.140', 'Mozilla/5.0', '/wp-login.php', '2026-10-01 01:14:05'),
(840, '200.100.140.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '/', '2026-10-01 03:27:11'),
(841, '114.119.138.99', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-10-01 04:28:30'),
(842, '202.182.106.12', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '/', '2026-10-01 06:02:03'),
(843, '202.182.106.12', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '/', '2026-10-01 06:02:03'),
(844, '24.199.99.177', 'Mozilla/5.0 (X11; Linux x86_64; rv:153.0) Gecko/20100101 Firefox/153.0', '/', '2026-10-01 11:58:09'),
(845, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-10-01 12:27:11'),
(846, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-10-01 12:27:21'),
(847, '74.7.244.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-10-01 12:59:23'),
(848, '2a03:2880:15ff:4c::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-10-01 13:49:54'),
(849, '74.7.244.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-10-01 14:57:55'),
(850, '192.175.111.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '/', '2026-10-01 16:32:16'),
(851, '2a03:2880:f806:36::', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 (compatible; meta-webindexer/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler))', '/', '2026-10-01 16:42:21'),
(852, '52.167.144.211', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-10-01 21:51:10'),
(853, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-02 01:09:11'),
(854, '16.144.13.211', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '/', '2026-10-02 03:20:23'),
(855, '14.180.215.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', '/', '2026-10-02 03:28:46'),
(856, '52.167.144.169', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-10-02 07:34:51'),
(857, '2a03:2880:16ff:9::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-10-02 11:13:30'),
(858, '20.229.51.198', 'curl/8.6.0', '/', '2026-10-02 15:10:02'),
(859, '205.169.39.209', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '/', '2026-10-02 17:09:11'),
(860, '205.169.39.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '/', '2026-10-02 17:09:17'),
(861, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-10-02 17:18:38');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `path`, `visited_at`) VALUES
(862, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-10-02 19:55:09'),
(863, '52.167.144.139', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-10-02 19:55:20'),
(864, '114.119.158.143', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-10-02 22:03:02'),
(865, '52.167.144.23', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/ed65a5409db387fe_1788618799.png', '2026-10-02 22:23:35'),
(866, '78.111.36.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '/', '2026-10-03 03:29:31'),
(867, '114.119.158.143', 'Mozilla/5.0 (compatible;PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', '/robots.txt', '2026-10-03 06:56:05'),
(868, '2a03:2880:3ff:53::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-10-03 07:40:04'),
(869, '34.156.185.220', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', '/', '2026-10-03 08:06:38'),
(870, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-03 12:12:37'),
(871, '40.77.167.121', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization', '2026-10-03 12:24:28'),
(872, '34.171.178.140', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', '/', '2026-10-03 16:37:50'),
(873, '93.158.91.249', 'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-A415F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.3', '/robots.txt', '2026-10-04 00:03:25'),
(874, '194.103.207.251', 'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-A415F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.3', '/llms.txt', '2026-10-04 00:03:26'),
(875, '5.133.223.97', 'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-A415F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.3', '/', '2026-10-04 00:03:26'),
(876, '40.77.167.130', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/public/uploads/gallery/678f76728af4d0ec_1788618761.jpg', '2026-10-04 01:19:16'),
(877, '52.167.144.235', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization/mavattam-nirvagigal', '2026-10-04 01:38:02'),
(878, '178.122.238.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '/', '2026-10-04 03:26:53'),
(879, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-10-04 04:48:25'),
(880, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-04 12:28:54'),
(881, '40.113.118.83', 'curl/8.6.0', '/', '2026-10-04 14:12:24'),
(882, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-10-04 14:15:10'),
(883, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-10-04 22:18:22'),
(884, '40.77.167.48', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/', '2026-10-04 22:18:33'),
(885, '130.250.191.56', 'Python/3.12 aiohttp/3.14.1', '/', '2026-10-04 23:26:55'),
(886, '158.173.74.101', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '/', '2026-10-05 00:06:31'),
(887, '102.39.113.22', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Safari/605.1.15', '/', '2026-10-05 03:21:54'),
(888, '74.7.241.163', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-10-05 03:36:52'),
(889, '74.7.229.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/', '2026-10-05 05:57:51'),
(890, '74.7.228.184', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/gallery', '2026-10-05 05:57:54'),
(891, '74.7.229.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/organization', '2026-10-05 05:57:56'),
(892, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/category/arivippukal', '2026-10-05 05:57:58'),
(893, '74.7.243.56', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/videos', '2026-10-05 05:58:00'),
(894, '74.7.228.251', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/post/porattam-seythi', '2026-10-05 05:58:01'),
(895, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/contact', '2026-10-05 05:58:02'),
(896, '74.7.229.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/gallery/veera', '2026-10-05 05:58:03'),
(897, '51.8.102.102', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', '/robots.txt', '2026-10-05 05:58:03'),
(898, '74.7.228.184', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/post/mukkiya-arivippu', '2026-10-05 05:58:03'),
(899, '74.7.228.184', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/videos/veera', '2026-10-05 05:58:04'),
(900, '74.7.228.251', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/category/arikkaihal', '2026-10-05 05:58:04'),
(901, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/post/makkal-nalan-arikkai', '2026-10-05 05:58:05'),
(902, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/news', '2026-10-05 05:58:05'),
(903, '74.7.228.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/membership', '2026-10-05 05:58:06'),
(904, '74.7.243.56', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/events', '2026-10-05 05:58:06'),
(905, '74.7.243.56', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/videos/arimuga-kaanoli', '2026-10-05 05:58:07'),
(906, '74.7.228.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/page/privacy-policy', '2026-10-05 05:58:07'),
(907, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/page/about', '2026-10-05 05:58:08'),
(908, '74.7.242.170', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/gallery/pothukkootangal', '2026-10-05 05:58:08'),
(909, '74.7.242.170', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/category/nigalvugal', '2026-10-05 05:58:09'),
(910, '74.7.175.131', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; robots.txt; +https://openai.com/searchbot', '/robots.txt', '2026-10-05 06:19:44'),
(911, '74.7.229.143', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.4; +https://openai.com/searchbot', '/public/uploads/gallery/62ad4bc3a23e6ed4_1790254126.jpg', '2026-10-05 06:28:24'),
(912, '52.167.144.173', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/membership', '2026-10-05 06:43:48'),
(913, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-05 09:34:18'),
(914, '54.212.14.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '/', '2026-10-05 15:03:18'),
(915, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-10-05 15:27:28'),
(916, '46.17.174.173', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:98.0) Gecko/20100101 Firefox/98.0', '/', '2026-10-05 18:52:06'),
(917, '40.77.167.16', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization/manila-nirvagigal', '2026-10-05 19:51:17'),
(918, '51.8.102.251', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', '/robots.txt', '2026-10-05 21:58:20'),
(919, '54.198.73.158', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_8 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Mobile/15E148 Safari/604.1', '/', '2026-10-06 02:37:04'),
(920, '54.198.73.158', 'okhttp/5.3.0', '/favicon.png', '2026-10-06 02:37:04'),
(921, '54.198.73.158', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_8 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Mobile/15E148 Safari/604.1', '/', '2026-10-06 02:37:58'),
(922, '40.77.167.48', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/events/manila-manadu-2026', '2026-10-06 09:48:30'),
(923, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-06 10:45:07'),
(924, '51.8.102.251', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', '/robots.txt', '2026-10-06 13:58:44'),
(925, '185.193.167.217', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '/', '2026-10-06 14:04:05'),
(926, '20.105.137.134', 'curl/8.6.0', '/', '2026-10-06 15:16:45'),
(927, '52.167.144.230', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/gallery', '2026-10-06 17:11:14'),
(928, '103.108.59.12', 'FaviconHash-API/1.0', '/', '2026-10-06 19:39:44'),
(929, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization/manila-thozhirsangam', '2026-10-06 20:34:41'),
(930, '40.77.167.68', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/gallery/test1-3', '2026-10-06 21:26:45'),
(931, '2a04:4e41:84:8474::9c05:8474', 'Mozilla/5.0 (compatible; LeadGenResearchBot/1.0; India PG checkout research; polite)', '/wp-json/wc/store/v1/products', '2026-10-07 00:42:24'),
(932, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', '/', '2026-10-07 01:31:27'),
(933, '178.128.174.4', 'Mozilla/5.0', '/wp-login.php', '2026-10-07 02:23:17'),
(934, '51.8.102.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', '/robots.txt', '2026-10-07 05:59:00'),
(935, '2a03:2880:10ff:1::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '/robots.txt', '2026-10-07 06:41:53'),
(936, '40.77.167.108', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/robots.txt', '2026-10-07 08:14:34'),
(937, '40.77.167.4', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '/organization/manila-ilaignarani', '2026-10-07 08:17:17'),
(938, '3.91.99.220', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15', '/', '2026-10-07 10:50:35'),
(939, '193.183.103.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.3', '/', '2026-10-07 11:15:38'),
(940, '193.25.127.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.3', '/post/makkal-nalan-arikkai', '2026-10-07 11:15:38'),
(941, '5.133.214.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.3', '/gallery/pothukkootangal', '2026-10-07 11:15:38'),
(942, '185.129.66.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.3', '/videos/arimuga-kaanoli', '2026-10-07 11:15:38'),
(943, '2a02:4780:a:c0de::fac5', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 HostingerSelfie/3', '/', '2026-10-07 12:13:35'),
(944, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/pbk', '2026-10-11 19:06:37'),
(945, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/pbk', '2026-10-11 19:06:40'),
(946, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/pbk', '2026-10-11 19:07:05'),
(947, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/pbk', '2026-10-11 19:07:22'),
(948, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 19:08:14'),
(949, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9444', '/', '2026-10-11 19:10:42'),
(950, '::1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-IN) WindowsPowerShell/5.1.26100.9444', '/', '2026-10-11 19:11:15'),
(951, '::1', 'curl/8.21.0', '/', '2026-10-11 19:12:06'),
(952, '::1', 'curl/8.21.0', '/', '2026-10-11 19:12:27'),
(953, '::1', 'curl/8.21.0', '/news', '2026-10-11 19:12:27'),
(954, '::1', 'curl/8.21.0', '/contact', '2026-10-11 19:12:27'),
(955, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '/', '2026-10-11 19:12:42'),
(956, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '/contact', '2026-10-11 19:13:09'),
(957, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '/contact', '2026-10-11 19:13:16'),
(958, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 19:31:08'),
(959, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 20:23:34'),
(960, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 20:23:39'),
(961, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 20:23:51'),
(962, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '/organization/mavattam-nirvagigal', '2026-10-11 20:38:34'),
(963, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.24.9 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', '/organization/member/4', '2026-10-11 20:38:39'),
(964, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/organization/member/4', '2026-10-11 20:58:12'),
(965, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/organization/member/4', '2026-10-11 20:58:27'),
(966, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '/', '2026-10-11 21:43:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_user_id_index` (`user_id`),
  ADD KEY `activity_action_index` (`action`),
  ADD KEY `activity_created_at_index` (`created_at`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_type_status` (`type`,`status`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_type_status` (`type`,`status`),
  ADD KEY `banners_category_id_index` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_index` (`parent_id`),
  ADD KEY `categories_status_index` (`status`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_is_read_index` (`is_read`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`),
  ADD KEY `events_date_index` (`event_date`),
  ADD KEY `events_status_index` (`status`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_slug_unique` (`slug`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_index` (`gallery_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_folder_index` (`folder`),
  ADD KEY `media_user_id_index` (`user_id`);
ALTER TABLE `media` ADD FULLTEXT KEY `media_search` (`original_name`,`alt_text`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_membership_id_unique` (`membership_id`),
  ADD KEY `members_email_index` (`email`),
  ADD KEY `members_phone_index` (`phone`),
  ADD KEY `members_district_index` (`district`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_index` (`parent_id`),
  ADD KEY `menus_location_status` (`location`,`status`),
  ADD KEY `menus_sort_order_index` (`sort_order`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_email_unique` (`email`);

--
-- Indexes for table `organization_members`
--
ALTER TABLE `organization_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_members_team_id` (`team_id`),
  ADD KEY `org_members_status_sort` (`status`,`sort_order`),
  ADD KEY `org_members_district` (`district`),
  ADD KEY `org_members_assembly` (`assembly`),
  ADD KEY `org_members_featured` (`featured`);
ALTER TABLE `organization_members` ADD FULLTEXT KEY `org_members_search` (`name`,`tamil_name`,`english_name`,`designation`,`position`,`district`,`assembly`);

--
-- Indexes for table `organization_teams`
--
ALTER TABLE `organization_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_teams_slug_unique` (`slug`),
  ADD KEY `org_teams_status_sort` (`status`,`sort_order`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_status_index` (`status`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `posts_sub_category_id_index` (`sub_category_id`),
  ADD KEY `posts_status_publish` (`status`,`publish_date`),
  ADD KEY `posts_featured_index` (`is_featured`),
  ADD KEY `posts_breaking_index` (`is_breaking`),
  ADD KEY `posts_trending_index` (`is_trending`);
ALTER TABLE `posts` ADD FULLTEXT KEY `posts_search` (`title`,`short_description`,`content`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_images_post_id_index` (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `pt_tag_fk` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `rp_perm_fk` (`permission_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`),
  ADD KEY `settings_group_index` (`group`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_status_index` (`status`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_slug_unique` (`slug`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_visited_at_index` (`visited_at`),
  ADD KEY `visitors_ip_index` (`ip_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_members`
--
ALTER TABLE `organization_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `organization_teams`
--
ALTER TABLE `organization_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_fk` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_fk` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_fk` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `organization_members`
--
ALTER TABLE `organization_members`
  ADD CONSTRAINT `org_members_team_fk` FOREIGN KEY (`team_id`) REFERENCES `organization_teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_sub_category_fk` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `pt_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pt_tag_fk` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `rp_perm_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rp_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
