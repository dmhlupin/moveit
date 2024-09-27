-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Окт 13 2021 г., 15:21
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `moveit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `author` varchar(256) NOT NULL,
  `feedback_text` varchar(256) NOT NULL,
  `itemId` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `author`, `feedback_text`, `itemId`, `created_at`) VALUES
(20, '1', 'Приветствую всех в моем приложении!', 1, '2021-10-13 13:50:58'),
(21, '4', '123', 1, '2021-10-13 14:00:01'),
(22, '6', 'sdfsdf', 2, '2021-10-13 14:08:31'),
(23, '1', 'Приложение - не магазин, а проект системы управления эксплуатацией оборудования.', 3, '2021-10-13 14:26:47'),
(24, '1', 'Система должна позволять отслеживать выдачу и прием назад оборудования', 2, '2021-10-13 14:27:26');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` int NOT NULL,
  `author` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL,
  `title` varchar(256) NOT NULL,
  `main_image` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `serial_number` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `title`, `main_image`, `description`, `start_date`, `serial_number`, `brand`) VALUES
(1, 'Персональный компьютер', 'PC001.jpg', 'Processor Intel Core i3, RAM16GB', '2021-10-01', '54-324234-234', 'DELL'),
(2, 'Мышь', 'mouse001.jpg', 'USB 1.8m 1200p', '2021-10-12', '11-22-33-44', 'GENIUS'),
(3, 'Клавиатура Logitech', 'logitech.jpg', 'Клавиатура Logitech G213 Prodigy RGB Gaming Keyboard Black USB удовлетворит самых требовательных игроков.', '2021-09-01', '2344-234234', 'Logitech');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `itemId` varchar(256) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `itemId`, `userId`, `order_time`) VALUES
(1, '', '3', '2021-10-12 19:34:59'),
(2, '1', '3', '2021-10-12 19:38:50'),
(3, '2', '1', '2021-10-12 19:39:30'),
(4, '1', '1', '2021-10-12 19:41:13'),
(5, '1', '3', '2021-10-12 22:12:00'),
(6, '1', '1', '2021-10-12 22:12:08'),
(7, '1', '1', '2021-10-13 01:18:14'),
(8, '1', '4', '2021-10-13 02:02:37'),
(9, '1', '4', '2021-10-13 02:02:40'),
(10, '1', '4', '2021-10-13 02:04:01'),
(11, '2', '4', '2021-10-13 02:12:52'),
(12, '2', '4', '2021-10-13 08:53:48'),
(13, '3', '3', '2021-10-13 13:42:00'),
(14, '1', '3', '2021-10-13 13:45:50'),
(15, '2', '3', '2021-10-13 13:47:45'),
(16, '1', '3', '2021-10-13 13:47:49'),
(17, '3', '3', '2021-10-13 13:47:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `secret` varchar(256) NOT NULL,
  `hash` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `secret`, `hash`) VALUES
(1, 'admin', 'admin', '123', '17169581786166a1a5a38434.42479677'),
(3, 'user', 'user', '321', '6719276766166a2975cae88.32519997'),
(4, 'Dmitry Hlupin', 'Dmitry', '123', '2145035820616673c21e8532.38669878'),
(5, 'Алексей', 'alex', '321', NULL),
(6, 'Vladislav', 'vlad', '123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
