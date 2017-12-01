-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2017 г., 10:24
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bfblock`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chain`
--

CREATE TABLE `chain` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `hash` varchar(48) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chain`
--

INSERT INTO `chain` (`id`, `value`, `hash`, `time`) VALUES
(3, 'rdGiAfZD91VBtRbwviR1bbCVZVkoQqsmUu/jvHs7u0JHmLGsvNNpKQspIDRxU/kUffXCmMVMVsLrJwlFzYjXtcSfh9PP27UE6TjiiSDxh81eCvXKpPG2TUC5jc/eef2J869B8WYt25Cdvgrh8RFyvgQPp3Mkxj+WpQurQ2HGH0oPPoVQaKx4RJx8fScsLio7aip2gg==', '75a69d039e00cc372d74f0a0a8239e45', '2017-12-01 06:44:03'),
(4, 'rdGiAYJDN1ZBOhXyvqxV4ZLFzpal8fah8Xi6z2knmE1VZvvwQO8HBZIQJPIcs/wzu7iDSXF0ZmOcsx010ph55FTC+bEezzdrmDqHK/NQr7jmGgSp2DmhYhV4Hmt6Cbka4IyEvvWr0nhMzw79EmLnBA+oawzHO8q5rmaXkYU94nxqTWqSOj1tQyprfjNQs/I28wx1nw==', '067d8dc81b6b6d39c1dc735ea4ca53f2', '2017-12-01 06:47:34'),
(5, 'rdGqA3ZD91VFOgXyvqxV4ZIFV+mvNhhmlU3IfrVPj89p+/BA7wcVoRwy1DQNJA0EpjhAgsbUTkRNW7OdRf1elrni18miCOH7nGF1PgavBE1S24+lVhRhfT25IPyRWGKZDyPy583O9xJYMHAPHIeH1gW4UFLB0gqLcK63A/ZVSs9YTVqkcjRDdJQaRnP5', '77370ce38b4c7609026e3f147d154eaf', '2017-12-01 07:04:16'),
(6, 'rdGiAfY/92VBtRbwFXDJ03KpoJEKTEVU2ABnPenSqSB1+aysCsjHEXfzMQQygzLCK+0lySl6nhC3cz03gAPJJYaCY/Kdi1Q/ovU3fRzOB3XuO+NR+XVbmY/0G8utlmTwfabfmxutRNlz4Bl3DldKb5zSdufcUwWqG6EPwyENtVDPWMVUKiQoIELidHEv', 'c2281c8b1407670152749198cff096a3', '2017-12-01 07:04:42'),
(7, 'rdGyAYJD91VFOhXyvqxV4ZI1h7OvOMS2GGlWNp+dnpfBrEyp2nacbK4UsCwyw7FSquUvbgbGhW5drx09XW6YtxB06O6F5bfPLBc6CDqoUC0GBD1T7GxuWvSvTO9jl9HQjrHxO1nk7Bx33lhCt0W7uG6o/ukHwUR3gADitp6Xi+5YMmF0079xcE4=', 'e6d2d40d24548903cce5e8feb6fe6d2f', '2017-12-01 07:12:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chain`
--
ALTER TABLE `chain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chain`
--
ALTER TABLE `chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
