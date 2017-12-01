-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2017 г., 14:55
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `chain`
--

INSERT INTO `chain` (`id`, `value`, `hash`, `time`) VALUES
(1, 'rdGiAfRD91VF/CYS+aydzVK14H0Rb+8wNzFuR0ftW+lpZvuszB/ZFgswsbQEGJYtcJsRT5yXDLYSwNZalZbcQ6jqSVksDZbe66BryF9rVa4k8FUuaxMv/hx9Erq3Yxcrimy/oGneIGcbrmxl01rBksefIHT7kEWDtnvYtxXVGjriFb026Yh35xQtKjtjx3Kd', '3e0bc5c84f25c3da6697cde2a05ed695', '2017-12-01 11:29:53'),
(3, 'rdGqA+Y/92VFOxWSJVJ/m7zFGdeqIB0jQPkASjf+SgfbVRfw0B/Z+ZA0JDTu/LMMMtGl7bm++u5IDCGtU17AeLiW/s5NJFA5os+bquaFOn/rB84NDCYPVLE/EZH9ubYLxO+ljbfAgsxdgtAGOwnUnJfeMuxWrnj1yE5K1SsDDzO908nIdRMrVfMABEzci3Jf', '7c301c3f29dce06ecb11e23e2923b272', '2017-12-01 11:38:23'),
(4, 'rdGiAeY/92VF+yaSJVJ/m7wZ448fi2yMBjx9ZIw9WV7Zgnb5rGz2fv7iLDC05DLjLnDWnuqoRRx7EdhDAPmGUV/Bh8FRHY4VIqbez4Lw+U614bJMQ1vEHLNlE7sfd5nn8bIKag0Kn4yq0zKRQet89et/kf+yZlLWiblIKbuN08172k3F1jxR1jgmUPR0EnJyNQ==', 'c5e55cb000bf8f7f2b285082df98ee6b', '2017-12-01 11:52:14'),
(5, 'rdGiAfA/N2ZFuhaTJVLLCVdWTMIQjo0Nv3N1Y0g9WejFEmG9LSNbjV7Oq/Mo9OvQFiS964DNxcE47pzC6LyBq1KbgAO1Kw4VGqYgz4r8N0ol8sXyNEEdn/NLA2M6IWtnDTUgjJJmYXb844DF25vtxcHAY77aI9DmR9npu4ef8Sd8BEGIx18bMX42UUEuUvR0mAlyGg==', '831a26897dc7e6d20a19c6b63604ff0a', '2017-12-01 11:54:08'),
(6, 'rdGiAfQ/92VF/CaSJVJ/m7xpvh7UBnqRelQVgWNFfYh90Le9JKO3yKfsM3MUsCKsAhRmZeDUWFBQq4BFTLy+Uj2bp39NAuj3IDJ5z0J3+zfDCe2V6Rqs/gRzxa53GKYwz4Ap4DwPgm0CCj3e2Vd6/Vrk2cxiPRJE0mpSn2Bt6bgGRGJqjAOmlfQmMDjeCnDp', 'a6f53ed8cd37cb11606e1d94579bc4d6', '2017-12-01 11:55:03'),
(7, 'rdGiAeY/92VF+yaSJVJ/mzx4yOCqIVfj10TFk+NFfYh90Hde8/A+g/8SLzIz7FREChQ+uMDQt+2LF06CzTy/F/llgWaH9eL1/OCYAp+x10HJGwvOtwIEqLSo0yJY1tgqoCP2YgMlo9mmX3uelazUp5G1tnYMmWSdIDuwXhZBWaLgqQgr3WG9FC0yNrqccCM=', '6405b3dac3de972cfddd501dadb0daa3', '2017-12-01 11:55:18');

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
