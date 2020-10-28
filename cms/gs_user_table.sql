-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `indate`) VALUES
(2, '森', 'mori', '111', 1, NULL, '2020-10-26 11:18:59'),
(5, '森 亜理沙', 'mori', 'ooo', 0, NULL, '2020-10-28 00:23:05'),
(6, '森 亜理沙', 'mori', 'pw', 1, 1, '2020-10-28 01:51:51'),
(8, '名前修正', 'rename', 'repw', 0, 0, '2020-10-28 01:52:05'),
(9, 'あああ', 'mori', 'ooo', 0, 0, '2020-10-28 01:53:11'),
(12, '森 亜理沙', 'mori', 'ooo', 0, NULL, '2020-10-28 03:01:06'),
(14, '鈴木', 'suzuki', 'ooo', 0, 0, '2020-10-29 01:08:02'),
(15, '森 亜理沙', 'mori', 'ooo', 0, NULL, '2020-10-28 20:40:00'),
(17, 'ららら', 'rarara', 'ooo', 0, 0, '2020-10-29 01:14:32'),
(18, 'なまえ', 'name', 'yoyoyo', 1, NULL, '2020-10-29 01:12:56'),
(19, '山田太郎', 'yamada', 'yamada', 1, NULL, '2020-10-29 01:13:42'),
(20, '佐藤', 'sato', 'sato20', 0, NULL, '2020-10-29 01:14:18'),
(21, '吉岡里帆', 'yoshioka', 'yorioka', 0, NULL, '2020-10-29 01:19:15');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
