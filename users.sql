-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2022 г., 19:23
-- Версия сервера: 8.0.24
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `reg_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `inst` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `vk` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'online',
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `reg_email`, `password`, `phone`, `inst`, `vk`, `twitter`, `avatar`, `link`, `location`, `status`, `role`) VALUES
(10, 'TEST', 'TESTOV', 'test@test.com', '$2y$10$vsR8m7bVwnsXXB5GzwAkh.yYRdGvpxcF2kHTECZt.Mri1AmPDrIzS', '12345614', NULL, NULL, NULL, 'avatar-b.png', NULL, NULL, 'online', 'user'),
(11, NULL, NULL, 'mas_9@mail.ru', '$2y$10$kK5YSMVXDwhgWfD6H19U8.kr9Ogc98KyxB9v19wzhiG.CJU5cSAVe', NULL, NULL, NULL, NULL, 'avatar-c.png', NULL, NULL, 'online', 'user'),
(12, NULL, NULL, 'test@test.co', '$2y$10$SdbyuNU4Xp48kOG/n8fPY.v8hMOl9.6PN656n71jNiaf80em6DHkm', NULL, NULL, NULL, NULL, 'avatar-d.png', NULL, NULL, 'online', 'user'),
(17, NULL, NULL, '1@1.ru', '$2y$10$G2Xr1YI2TK.7T5LQ1dp.3ewz0DldxZ4uKuiUxmjzmhSISweC3o9MC', NULL, NULL, NULL, NULL, 'avatar-f.png', NULL, NULL, 'online', 'user'),
(18, NULL, NULL, '1@1.r', '$2y$10$.fG2wcBgJMZmVgHiuuQhRuc5j28Fvd6u7zk18PNz5Z.vOYUdNL7qK', NULL, NULL, NULL, NULL, 'avatar-g.png', NULL, NULL, 'online', 'user'),
(19, 'Test', '1', '1@1.t', '$2y$10$Y6BtuYFitR7mvBEt2/F5xedM.NGrOGwpSti9IgDaQdJH4NAM5jugy', '+79999999999', NULL, NULL, NULL, 'avatar-i.png', NULL, NULL, 'online', 'user'),
(20, 'Dima', 'Maslennikov', 'maslay99@gmail.com', '$2y$10$dBVDwTj8gXfE7WSKzH2GvuGZwGUC.9UJ2QgmR53vUhvem9/Gsnx7a', '79991238956', '@mskovv', NULL, NULL, 'avatar-admin.png', 'maslay99@gmail.com', 'ЕКБ, Россия', 'online', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
