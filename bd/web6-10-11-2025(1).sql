-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Ноя 18 2025 г., 07:49
-- Версия сервера: 8.0.41
-- Версия PHP: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web6-10-11-2025`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bofereWork`
--

CREATE TABLE `bofereWork` (
  `id` int NOT NULL,
  `work` tinyint(1) NOT NULL,
  `alais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bofereWork`
--

INSERT INTO `bofereWork` (`id`, `work`, `alais`) VALUES
(1, 0, 'Не требует обработки'),
(2, 1, 'Обработка нужна');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Десерт'),
(2, 'первое блюдо'),
(3, 'второе блюдо'),
(4, 'Напитки');

-- --------------------------------------------------------

--
-- Структура таблицы `categoryProduct`
--

CREATE TABLE `categoryProduct` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categoryProduct`
--

INSERT INTO `categoryProduct` (`id`, `category`) VALUES
(1, 'Овощи'),
(2, 'Фрукты'),
(3, 'Специи'),
(4, 'Крупы');

-- --------------------------------------------------------

--
-- Структура таблицы `composition`
--

CREATE TABLE `composition` (
  `id` int NOT NULL,
  `countAddition` int NOT NULL,
  `countProduct` int NOT NULL,
  `countPortion` int NOT NULL,
  `beforeWork` int NOT NULL,
  `food_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `composition`
--

INSERT INTO `composition` (`id`, `countAddition`, `countProduct`, `countPortion`, `beforeWork`, `food_id`, `product_id`) VALUES
(8, 2, 1, 2, 2, 2, 4),
(9, 1, 1, 2, 1, 2, 5),
(10, 2, 1, 6, 1, 2, 6),
(11, 2, 1, 6, 1, 2, 8),
(16, 1, 10, 2, 1, 5, 5),
(17, 1, 2, 6, 1, 6, 6),
(18, 3, 2, 2, 2, 1, 11),
(20, 2, 2, 2, 2, 4, 4),
(21, 23, 23, 23, 2, 3, 4),
(22, 24, 23, 23, 2, 3, 4),
(23, 4, 2, 2, 2, 1, 11),
(24, 6, 2, 2, 2, 1, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `recipe` varchar(255) NOT NULL,
  `weight` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `category_id`, `name`, `recipe`, `weight`) VALUES
(1, 2, 'Овощной суп', 'добавить воду и т.д', 650),
(2, 1, 'Пряник', 'Тесто сахар и в печку', 150),
(3, 2, 'Салат', 'Нарезать овощи бехз пасировки', 357),
(4, 2, 'Суп морковный', 'морковка вода ', 456),
(5, 1, 'Булочка с корицей', 'корица и булочка', 130),
(6, 1, 'Булочка с маком', 'Булочка мак и корица', 155);

-- --------------------------------------------------------

--
-- Структура таблицы `measurement`
--

CREATE TABLE `measurement` (
  `id` int NOT NULL,
  `unis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `measurement`
--

INSERT INTO `measurement` (`id`, `unis`) VALUES
(1, 'гр'),
(2, 'кг'),
(3, 'литр');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `pricePerOne` int NOT NULL,
  `unitsOfMeasurement` int NOT NULL,
  `calories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `pricePerOne`, `unitsOfMeasurement`, `calories`) VALUES
(4, 1, 'Картошка', 30, 2, 250),
(5, 3, 'Корица', 350, 2, 560),
(6, 3, 'Мак', 600, 2, 450),
(7, 3, 'Сахар', 150, 2, 350),
(8, 3, 'Тростниковый сахар', 250, 2, 150),
(11, 1, 'Помидоры', 15, 3, 15),
(12, 1, 'Зелень', 15, 1, 50),
(13, 2, '123123', 123123, 1, 123),
(14, 1, '123', 123, 1, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `login`, `phone`, `password`, `authKey`) VALUES
(1, '1111', '1111', '1111', '1111', '$2y$13$.JWBIsU4IOTdD3Lxu4.0duH6c3UqlAvlM3Tp/mAkLUUKEK1Hmu.iK', 'knUOR4SUTGDbyhvrZMBUNK1EAPxGf9TK'),
(2, '1111', '1111', '1111', '1111', '$2y$13$DSQ/YIWZs/E/QSDUpK0Gr.w7.QTESJ2Ub9J5oiA.LMLaZPhgLLOYq', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bofereWork`
--
ALTER TABLE `bofereWork`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categoryProduct`
--
ALTER TABLE `categoryProduct`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `beforeWork` (`beforeWork`);

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unitsOfMeasurement` (`unitsOfMeasurement`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bofereWork`
--
ALTER TABLE `bofereWork`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categoryProduct`
--
ALTER TABLE `categoryProduct`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `composition`
--
ALTER TABLE `composition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `composition_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_ibfk_3` FOREIGN KEY (`beforeWork`) REFERENCES `bofereWork` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categoryProduct` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`unitsOfMeasurement`) REFERENCES `measurement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
