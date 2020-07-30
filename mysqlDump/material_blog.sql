-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-07-29 04:05:56
-- 服务器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `material_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `autho` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `addtime`, `autho`, `email`) VALUES
(1, '这是一篇好长好长的文章呀', '这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！这真的是一篇很长很长很长很长的文章噢！', '2020-07-29 11:53:24', 'admin', 'kitcham@outlook.com'),
(2, 'This is a long long long post', 'What a long long long long post! What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post!  What a long long long long post! ', '2020-07-29 11:54:41', 'admin', 'kitcham@outlook.com'),
(3, 'Welcome to use Material Blog', 'Elegant, pure and simple.\r\n</br>\r\n优雅，纯粹，而又简约。\r\n</br></br>\r\nA Material-Design blog built with PHP and MySQL databases, and it is rendered by MDUI.\r\n</br>\r\n一个基于 PHP 及 MySQL 搭建而成的 Material-Design 设计风博客，并采用 MDUI 组件进行渲染。\r\n</br></br>\r\nBasic features are implemented, which means that you are able to post article, finish administration and so on.\r\n</br>\r\n虽称不上应有尽有，但基本的功能经已实现，如进行文章浏览与发布、后台管理等功能。\r\n</br></br>\r\nPlease feel free to enjoy the blog.\r\n</br>\r\n无问西东，尽情使用。', '2020-07-29 11:57:16', 'admin', 'kitcham@outlook.com'),
(4, '欢迎使用 Material Blog', 'Elegant, pure and simple.\r\n</br>\r\n优雅，纯粹，而又简约。\r\n</br></br>\r\nA Material-Design blog built with PHP and MySQL databases, and it is rendered by MDUI.\r\n</br>\r\n一个基于 PHP 及 MySQL 搭建而成的 Material-Design 设计风博客，并采用 MDUI 组件进行渲染。\r\n</br></br>\r\nBasic features are implemented, which means that you are able to post article, finish administration and so on.\r\n</br>\r\n虽称不上应有尽有，但基本的功能经已实现，如进行文章浏览与发布、后台管理等功能。\r\n</br></br>\r\nPlease feel free to enjoy the blog.\r\n</br>\r\n无问西东，尽情使用。', '2020-07-29 11:57:16', 'admin', 'kitcham@outlook.com');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `isadmin`, `password`, `email`, `avatar`) VALUES
(1, 'admin', 1, 'admin', 'kitcham@outlook.com', 'img/avatar/9b747627b8927f7f76540bf988f5ce26.jpg');

--
-- 转储表的索引
--

--
-- 表的索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
