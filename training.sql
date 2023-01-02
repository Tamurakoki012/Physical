-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2022-12-23 18:36:19
-- サーバのバージョン： 10.4.25-MariaDB
-- PHP のバージョン: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `training`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `achievement`
--

CREATE TABLE `achievement` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `today_exercise` varchar(50) NOT NULL,
  `today_exercise2` varchar(50) DEFAULT NULL,
  `today_exercise3` varchar(50) DEFAULT NULL,
  `today_record` int(50) NOT NULL,
  `today_record2` int(50) DEFAULT NULL,
  `today_record3` int(50) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `unit2` varchar(50) DEFAULT NULL,
  `unit3` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `achievement`
--

INSERT INTO `achievement` (`id`, `user_id`, `today_exercise`, `today_exercise2`, `today_exercise3`, `today_record`, `today_record2`, `today_record3`, `unit`, `unit2`, `unit3`, `created_at`) VALUES
(7, 21, '腹筋', '腕立て', 'ランニング', 10, 5, 3, '回', '回', '時間', '2022-12-23 18:28:35');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_11_29_002646_create_chats_table', 1),
(3, '2022_12_21_020436_create_messages_table', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `target_num` int(50) NOT NULL,
  `target_weight` int(50) NOT NULL,
  `exercise_name` varchar(50) NOT NULL,
  `exercise_name2` varchar(50) DEFAULT NULL,
  `exercise_name3` varchar(50) DEFAULT NULL,
  `exercise_record` int(50) NOT NULL,
  `exercise_record2` int(50) DEFAULT NULL,
  `exercise_record3` int(50) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `unit2` varchar(50) DEFAULT NULL,
  `unit3` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `target`
--

INSERT INTO `target` (`id`, `user_id`, `target_num`, `target_weight`, `exercise_name`, `exercise_name2`, `exercise_name3`, `exercise_record`, `exercise_record2`, `exercise_record3`, `unit`, `unit2`, `unit3`, `created_at`) VALUES
(7, 21, 11, 10, '腹筋', '腕立て', '背筋', 111, 1, 111, 'km', '時間', '回', '2022-12-23 18:28:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(21, 'テスト', 'test@gmail.com', '$2y$10$mQQ5OtnvedGuxzAIJosAquxCEs9RZp8DJhn/I8E4p8psM4qgHvW8W', '2022-12-23 18:13:25', 0),
(22, '管理者', 'admin@gmail.com', '$2y$10$dmRJ853dTPM8U7BkuvzaDOf50u7RCddWWKDiRksiln387aKOZLrGi', '2022-12-23 18:16:47', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
