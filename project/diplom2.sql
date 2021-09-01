-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2018 г., 14:46
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `F` text NOT NULL,
  `N` text NOT NULL,
  `O` text NOT NULL,
  `D` date NOT NULL,
  `S` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `F`, `N`, `O`, `D`, `S`) VALUES
(1, ' ', ' ', ' ', '0000-00-00', ' '),
(2, 'Ибрагимов', 'Линар', 'Марселевич', '2018-05-08', 'Информационные системы');

-- --------------------------------------------------------

--
-- Структура таблицы `voprosu`
--

CREATE TABLE `voprosu` (
  `id` int(11) NOT NULL,
  `voprosu` text NOT NULL,
  `otvetu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `voprosu`
--

INSERT INTO `voprosu` (`id`, `voprosu`, `otvetu`) VALUES
(1, ' ', ' '),
(2, 'Как?', 'Так');

-- --------------------------------------------------------

--
-- Структура таблицы `vopros_clint`
--

CREATE TABLE `vopros_clint` (
  `id` int(11) NOT NULL,
  `vopros_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `voprosu`
--
ALTER TABLE `voprosu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vopros_clint`
--
ALTER TABLE `vopros_clint`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `voprosu`
--
ALTER TABLE `voprosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `vopros_clint`
--
ALTER TABLE `vopros_clint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
