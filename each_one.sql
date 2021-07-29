-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 29 日 15:39
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
-- テーブルの構造 `event_table`
--

CREATE TABLE `event_table` (
  `id` int(12) NOT NULL,
  `event` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `category` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_area` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reserve_limit` date NOT NULL,
  `mini_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `event_table`
--

INSERT INTO `event_table` (`id`, `event`, `image`, `description`, `category`, `event_area`, `address`, `person`, `hour`, `price`, `reserve_limit`, `mini_person`) VALUES
(18, 'Dance', NULL, 'Street', 'Sports', 'Fukuoka', 'Fukuoka', 4, 2, 2000, '2021-08-30', 2),
(19, 'ダンス', 'upload/20210727141249db1493009fa9da8b2b627b0f6c134c8d.jpg', '路上でダンス', 'スポーツ', '福岡県福岡市', '福岡県福岡市', 3, 2, 2000, '2021-07-30', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `event_id`, `created_at`) VALUES
(8, 0, 16, '2021-07-15 17:12:05'),
(16, 0, 19, '2021-07-27 21:13:01');

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
(3, 'AABBAABB@mail.jp', 'AABBAABB', '2021-07-07 20:59:11', '2021-07-07 20:59:11'),
(4, 'test@gmail.com', 'test', '2021-07-13 07:04:52', '2021-07-13 07:04:52');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
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
-- テーブルの AUTO_INCREMENT `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
