-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 14 2021 г., 12:43
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `quantity`, `price`) VALUES
(1, '111', 1, 1, 23),
(2, '111', 2, 1, 43),
(3, '222', 1, 1, 23),
(4, '222', 3, 1, 34),
(5, '111', 3, 2, 34),
(54, 'ct7ep8lvgvsm9k5aq0kq8rmodv', 1, 3, 23),
(55, 'ct7ep8lvgvsm9k5aq0kq8rmodv', 36, 2, 180),
(56, 'ct7ep8lvgvsm9k5aq0kq8rmodv', 2, 2, 43),
(80, 'uo2dfao56kfa3unhonhirquvpl', 36, 1, 180),
(82, 'uo2dfao56kfa3unhonhirquvpl', 2, 3, 43),
(87, 'h2dae59hg7e9qll580fbjasbt0', 1, 1, 23),
(88, 'usosi6fium5sgq5vrskufgbaac', 1, 3, 23),
(98, '1nj96e49k9i5hk3vb057tcp71q', 1, 1, 23),
(111, 'td8dedomltf71u1md0ejl682g6', 1, 2, 23),
(112, 'td8dedomltf71u1md0ejl682g6', 2, 1, 43),
(113, '03hkj2co9icnce8vhg6bdpfp6e', 1, 2, 23),
(114, 'mkltk809k9j0c2uja5fh55h13l', 1, 2, 23),
(115, 'sfjge35g4hrm0u63f13not85dh', 1, 3, 23),
(118, '3k1j3qutfjqjr4sda3vh2mr38v', 1, 1, 23),
(120, 'tqklp583t8prg7k4fj3fgsrdjm', 2, 1, 43),
(121, '27hq7h6hne24ps7ltk3du6rbqm', 1, 2, 23),
(122, '27hq7h6hne24ps7ltk3du6rbqm', 2, 1, 43),
(123, '27hq7h6hne24ps7ltk3du6rbqm', 3, 1, 34),
(124, 'amv97vom5ca30cma5m2sg8c55l', 37, 3, 120),
(125, 'amv97vom5ca30cma5m2sg8c55l', 36, 1, 180),
(126, 'amv97vom5ca30cma5m2sg8c55l', 3, 1, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Вася', 'Привет'),
(2, 'Петя2', 'Хороший сайт'),
(8, 'Admin22', 'Все работает'),
(9, '1223', 'test'),
(10, 'alex', 'one more test'),
(11, 'q', 'some feedback'),
(12, 'm', 'the secret'),
(13, 'sandra', 'lovely'),
(14, '1223', 'some feedback'),
(15, 'Michael', 'some feedback'),
(16, 'nick', 'ljkkljkljk'),
(17, 'new name', 'new feedback'),
(18, 'new name', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`) VALUES
(1, 'Вася', '123', 'bpm45eabopj941ghkonmti00fgf0d551'),
(2, 'alex', '+7(000)000-0000', 'h2dae59hg7e9qll580fbjasbt0'),
(5, 'fasdf', '+7(000)000-0000', 'td8dedomltf71u1md0ejl682g6'),
(10, 'Admin', '999999', '3k1j3qutfjqjr4sda3vh2mr38v'),
(11, 'Michael', '09786675543', 'tqklp583t8prg7k4fj3fgsrdjm'),
(12, 'sasha', 'test', '27hq7h6hne24ps7ltk3du6rbqm'),
(13, 'Nelly', '+34555666777', 'amv97vom5ca30cma5m2sg8c55l');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Чай', 'Royal Blend', 23),
(2, 'Пицца', 'Пепперони', 43),
(3, 'Одежда', 'Брендовая', 34),
(36, 'Кофе', 'Nescafe', 180),
(37, 'Туфли', 'Натуральная кожа', 120),
(40, 'Посуда', 'Набор из 12 предметов', 90),
(42, 'Мяч', 'футбольный', 10),
(43, 'Ракетка', 'теннисная ', 80);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(1, 'admin', '$2y$10$PSJPoBHeRptdyy8v8CEWvuNDTNrxj3TaUieELGOEU9/INRe0lhLny', 1),
(2, 'user2', '$2y$10$GuJcuoiH5lZpew5UN94hIOeVJ0FRjIJilTXSZlpzeaoY2oCL3FX/i', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_session_idx` (`session_id`,`product_id`) USING HASH,
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
