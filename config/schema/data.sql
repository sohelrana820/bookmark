-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2016 at 03:16 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bookmark`
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `status`, `created`, `modified`) VALUES
(3, 18, NULL, 1, 18, 'Web Design', 'web-design', 1, '2016-02-21 21:05:28', '2016-02-21 21:05:28'),
(4, 18, 3, 2, 3, 'HTML5', 'HTML5', 1, '2016-02-21 21:05:46', '2016-02-21 21:05:46'),
(5, 18, 3, 4, 5, 'HTML', 'html', 1, '2016-02-21 21:05:57', '2016-02-21 21:05:57'),
(6, 18, 3, 6, 7, 'CSS', 'css', 1, '2016-02-21 21:06:07', '2016-02-21 21:06:07'),
(7, 18, 3, 8, 9, 'Twitter Bootstrap', 'twitter-bootstrap', 1, '2016-02-21 21:06:21', '2016-02-21 21:06:21'),
(8, 18, 3, 10, 11, '960 GS', '960-gs', 1, '2016-02-21 21:06:43', '2016-02-21 21:06:43'),
(9, 18, 3, 12, 13, 'Font Awesome', 'font-awesome', 1, '2016-02-21 21:07:01', '2016-02-21 21:07:01'),
(10, 18, 3, 14, 15, 'Javascript', 'javascript', 1, '2016-02-21 21:07:18', '2016-02-21 21:07:18'),
(11, 18, 3, 16, 17, 'jQuery', 'jquery', 1, '2016-02-21 21:07:33', '2016-02-21 21:07:33'),
(12, 18, NULL, 18, 37, 'Web Development', 'web-development', 1, '2016-02-21 21:08:14', '2016-02-21 21:08:14'),
(13, 18, 12, 19, 20, 'PHP', 'php', 1, '2016-02-21 21:08:30', '2016-02-21 21:08:30'),
(14, 18, 12, 21, 22, 'Angular JS', 'angularjs', 1, '2016-02-21 21:08:47', '2016-02-21 21:08:47'),
(15, 18, 12, 23, 24, 'Composer', 'composer', 1, '2016-02-21 21:08:56', '2016-02-21 21:08:56'),
(16, 18, 12, 25, 26, 'git', 'git', 1, '2016-02-21 21:09:06', '2016-02-21 21:09:06'),
(17, 18, 12, 27, 28, 'cakephp', 'cakephp', 1, '2016-02-21 21:09:15', '2016-02-21 21:09:15'),
(18, 18, 12, 29, 30, 'Laravel', 'laravel', 1, '2016-02-21 21:09:24', '2016-02-21 21:09:24'),
(19, 18, 12, 31, 32, 'Slim 3.0', 'slim-3.0', 1, '2016-02-21 21:09:38', '2016-02-21 21:09:38'),
(20, 18, 12, 33, 34, 'GIT', 'git', 1, '2016-02-21 21:09:52', '2016-02-21 21:09:52'),
(21, 18, 12, 35, 36, 'Design pattern', 'design-pattern', 1, '2016-02-21 21:10:20', '2016-02-21 21:10:20'),
(22, 18, NULL, 37, 44, 'SEO', 'seo', 1, '2016-02-21 21:10:42', '2016-02-21 21:10:42'),
(23, 18, 22, 38, 39, 'Google Search Engin', 'google-search-engin', 1, '2016-02-21 21:11:08', '2016-02-21 21:11:46'),
(24, 18, 22, 40, 41, 'Social Media Marketing', 'social-media-marketing', 1, '2016-02-21 21:12:38', '2016-02-21 21:12:38'),
(25, 18, 22, 42, 43, 'Google Webmaster', 'google-webmaster', 1, '2016-02-21 21:13:11', '2016-02-21 21:13:11'),
(26, 18, NULL, 44, 51, 'General', 'general', 1, '2016-02-21 21:13:26', '2016-02-21 21:13:26'),
(27, 18, 26, 45, 46, 'Linux', 'linux', 1, '2016-02-21 21:13:45', '2016-02-21 21:13:45'),
(28, 18, 26, 47, 48, 'Ubuntu', 'ubuntu', 1, '2016-02-21 21:13:56', '2016-02-21 21:13:56'),
(29, 18, 26, 49, 50, 'Windows', 'windows', 1, '2016-02-21 21:14:06', '2016-02-21 21:14:06');