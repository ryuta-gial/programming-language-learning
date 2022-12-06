-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2020 年 8 月 12 日 08:50
-- サーバのバージョン： 5.7.25
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `seq` int(11) NOT NULL,
  `type` enum('notyet','done','deleted') DEFAULT 'notyet',
  `title` text,
  `point` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `limit_day` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tasks`
--

INSERT INTO `tasks` (`id`, `seq`, `type`, `title`, `point`, `created`, `limit_day`, `modified`) VALUES
(1, 1, 'notyet', '牛乳買う', '', '2017-09-13 21:16:42', NULL, '2017-09-13 21:16:42'),
(2, 0, 'notyet', 'titiii', '※po', '2017-09-13 21:16:42', NULL, '2019-09-02 21:34:13'),
(3, 2, 'deleted', '映画見る', '', '2017-09-13 21:16:42', NULL, '2019-09-02 21:08:04'),
(4, 3, 'notyet', 'やる', '', '2017-09-13 21:53:13', NULL, '2019-09-02 21:16:11'),
(5, 4, 'deleted', 'てｓｙと', '', '2017-09-13 22:19:21', NULL, '2017-09-13 22:19:25'),
(6, 2, 'notyet', 'a', 'a', '2019-09-02 21:46:21', '2019-09-05 00:00:00', '2019-09-02 21:46:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `state` tinyint(1) DEFAULT '0',
  `title` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `todos`
--

INSERT INTO `todos` (`id`, `state`, `title`) VALUES
(1, 0, 'todo 0'),
(2, 1, 'todo 1'),
(3, 1, 'todo 2'),
(18, 1, 'テスト2'),
(19, 0, 'テスト'),
(16, 1, '完了'),
(20, 0, 'test'),
(21, 0, 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `seq` (`seq`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
