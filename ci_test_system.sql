-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2017 г., 07:54
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ci_test_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `number`, `question`, `answer1`, `answer2`, `answer3`) VALUES
(1, 1, 'первый вопрос', 'первый ответ', 'второй ответ', 'третий ответ'),
(2, 2, 'второй вопрос', 'первый ответ', 'второй ответ', 'третий ответ');

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_result` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`id`, `user_id`, `time_start`, `time_stop`, `user_result`) VALUES
(1, 1, '2017-02-26 06:00:00', '0000-00-00 00:00:00', 15),
(2, 2, '2017-02-26 07:45:31', '2017-02-26 09:21:21', 63),
(3, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 14, '2017-02-26 00:49:25', '0000-00-00 00:00:00', 0),
(12, 20, '2017-02-26 02:19:04', '0000-00-00 00:00:00', 0),
(13, 20, '2017-02-26 02:21:24', '0000-00-00 00:00:00', 0),
(14, 14, '2017-02-26 02:21:34', '2017-02-26 04:02:10', 19),
(15, 14, '2017-02-26 02:24:19', '0000-00-00 00:00:00', 0),
(16, 14, '2017-02-26 02:24:30', '0000-00-00 00:00:00', 0),
(17, 14, '2017-02-26 02:24:50', '0000-00-00 00:00:00', 0),
(18, 14, '2017-02-26 02:26:19', '0000-00-00 00:00:00', 0),
(19, 14, '2017-02-26 02:33:08', '0000-00-00 00:00:00', 0),
(20, 14, '2017-02-26 02:38:09', '0000-00-00 00:00:00', 0),
(21, 14, '2017-02-26 02:39:28', '0000-00-00 00:00:00', 0),
(22, 14, '2017-02-26 02:40:47', '2017-02-26 03:52:34', 19),
(23, 14, '2017-02-26 02:42:21', '0000-00-00 00:00:00', 0),
(24, 14, '2017-02-26 02:42:56', '2017-02-26 03:58:38', 19),
(25, 14, '2017-02-26 02:43:12', '2017-02-26 04:02:22', 19),
(26, 14, '2017-02-26 02:44:10', '0000-00-00 00:00:00', 0),
(27, 21, '2017-02-26 02:47:26', '0000-00-00 00:00:00', 0),
(28, 14, '2017-02-26 02:52:36', '0000-00-00 00:00:00', 0),
(29, 14, '2017-02-26 02:52:38', '0000-00-00 00:00:00', 0),
(30, 24, '2017-02-26 03:58:35', '0000-00-00 00:00:00', 0),
(31, 24, '2017-02-26 03:58:37', '0000-00-00 00:00:00', 0),
(32, 14, '2017-02-26 04:02:04', '0000-00-00 00:00:00', 0),
(33, 14, '2017-02-26 04:02:06', '0000-00-00 00:00:00', 0),
(34, 25, '2017-02-26 04:02:19', '0000-00-00 00:00:00', 0),
(35, 25, '2017-02-26 04:02:21', '0000-00-00 00:00:00', 0),
(36, 26, '2017-02-26 04:11:44', '0000-00-00 00:00:00', 0),
(37, 26, '2017-02-26 04:11:46', '2017-02-26 04:11:47', 19),
(38, 14, '2017-02-26 04:13:38', '0000-00-00 00:00:00', 0),
(39, 14, '2017-02-26 04:13:41', '2017-02-26 04:13:43', 37);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `user_group` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `user_group`) VALUES
(1, 'first', 'test', 'user'),
(2, 'second', '123456', 'admin'),
(3, 'sdfsf', '', 'user'),
(4, 'латв', '', 'user'),
(5, 'gdsfs', '', 'user'),
(6, 'dasd', '', 'user'),
(7, 'dasd', '', 'user'),
(8, 'dasd', '', 'user'),
(9, 'dasd', '', 'user'),
(10, 'sdfs', '', 'user'),
(11, 'sdfs', '', 'user'),
(12, 'sdfs', '', 'user'),
(13, 'пв', '', 'user'),
(14, 'rr', '', 'user'),
(15, 'qq', '', 'user'),
(16, 'dasda', '', 'user'),
(17, 'wqwq', '', 'user'),
(19, 'bb', '', 'user'),
(20, 'fds', '', 'user'),
(21, 'уууу', '', 'user'),
(22, 'f', '', 'user'),
(23, 'sssss', '', 'user'),
(24, 'ers', '', 'user'),
(25, 'wwwww', '', 'user'),
(26, 'ggg', '', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
