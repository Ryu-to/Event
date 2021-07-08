-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 08 日 00:31
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `each_one`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'SQL練習', '2021-06-01', '2021-06-19 15:40:34', '2021-06-29 08:16:24'),
(2, '買い物', '2021-06-19', '2021-06-19 15:41:39', '2021-06-19 15:41:39'),
(3, '8kmランニング', '2021-07-29', '2021-06-19 15:43:55', '2021-06-28 07:12:22'),
(4, 'WORK OUT', '2021-07-06', '2021-06-19 15:49:15', '2021-06-28 07:14:50'),
(6, '脚のトレーニング', '2021-06-30', '2021-06-19 16:48:20', '2021-06-19 16:48:20'),
(8, 'ガーベラ買って帰る', '2021-06-30', '2021-06-19 16:50:01', '2021-06-19 16:50:01'),
(9, '胸のトレーニング', '2021-06-29', '2021-06-19 17:10:15', '2021-06-19 17:10:15'),
(10, 'ドラセナ買う', '2021-07-02', '2021-06-19 17:22:18', '2021-06-28 22:27:41'),
(11, 'エンジェルリーフ買って帰る', '2021-07-13', '2021-06-19 17:22:39', '2021-06-19 17:22:39'),
(13, '10km Run', '2021-07-02', '2021-06-19 17:23:27', '2021-06-19 17:23:27'),
(15, 'QQQ', '2021-07-09', '2021-06-29 08:16:35', '2021-06-29 08:16:35');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `created_at`, `updated_at`) VALUES
(1, '092ryt.18@gmail.com', 'aaaaaaaa', '2021-07-06 07:09:49', '2021-07-06 07:09:49'),
(2, 'aavdvdvd@gmail.com', 'dddddddd', '2021-07-06 07:11:13', '2021-07-06 07:11:13'),
(3, 'AABBAABB@mail.jp', 'AABBAABB', '2021-07-07 20:59:11', '2021-07-07 20:59:11');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
