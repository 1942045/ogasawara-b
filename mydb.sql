-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-09 11:54:58
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
-- データベース: `mydb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `memberlist`
--

DROP TABLE IF EXISTS `memberlist`;
CREATE TABLE `memberlist` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `memberlist`
--

INSERT INTO `memberlist` (`ID`, `UserID`, `Name`) VALUES
(1, 100, '相賀日菜'),
(2, 101, '金田龍弥'),
(3, 102, '菊池良信'),
(4, 103, '齊藤祐希'),
(5, 104, '櫻庭比呂'),
(6, 105, '澤井匠'),
(7, 106, '椎名剛士'),
(8, 107, '田中優一'),
(9, 108, '古池拓海');

-- --------------------------------------------------------

--
-- テーブルの構造 `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE `timetable` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EntryTime` time DEFAULT NULL,
  `LeavingTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `timetable`
--

INSERT INTO `timetable` (`ID`, `UserID`, `Date`, `EntryTime`, `LeavingTime`) VALUES
(11, 100, '2021-07-09', '14:11:55', '15:00:53'),
(12, 107, '2021-07-09', '14:12:14', NULL),
(13, 105, '2021-07-09', '14:12:25', NULL),
(14, 100, '2021-07-09', '14:12:31', '15:00:53'),
(15, 104, '2021-07-09', '14:12:52', NULL),
(16, 0, '2021-07-09', '14:15:49', '18:03:32'),
(17, 100, '2021-07-09', '14:32:31', '15:00:53'),
(18, 560860, '2021-07-09', '14:33:01', NULL),
(19, 111111111, '2021-07-09', '14:33:45', NULL),
(20, 1234567890, '2021-07-09', '14:34:26', NULL),
(21, 1111111111, '2021-07-09', '14:35:34', NULL),
(22, 101, '2021-07-09', '14:36:47', '14:37:27'),
(23, 101, '2021-07-09', '14:37:39', NULL),
(24, 100, '2021-07-09', '14:38:45', '15:00:53'),
(25, 2147483647, '2021-07-09', '14:39:20', NULL),
(26, 2147483647, '2021-07-09', '15:01:03', NULL),
(27, 0, '2021-07-09', '15:03:23', '18:03:32'),
(28, 100, '2021-07-09', '15:03:32', NULL),
(29, 0, '2021-07-09', '18:03:38', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `memberlist`
--
ALTER TABLE `memberlist`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `memberlist`
--
ALTER TABLE `memberlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `timetable`
--
ALTER TABLE `timetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
