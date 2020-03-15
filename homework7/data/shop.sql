-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2020 г., 16:38
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `good_id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `good_id`, `session_id`, `quantity`) VALUES
(13, 1, 'test', 6),
(14, 2, 'test', 1),
(47, 5, '4gnchl6eto7blr6ir8lnlc81un19q17k', 1),
(84, 1, 'vt90lof7cq3cp4gigveg37m4bm24afr8', 1),
(85, 2, 'vt90lof7cq3cp4gigveg37m4bm24afr8', 1),
(87, 1, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1),
(88, 2, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1),
(89, 3, '7bqc2gcgg1ledrola2vs88196qrlmjf4', 2),
(90, 4, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 5),
(91, 1, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 2),
(92, 3, 'lci4gvie4skmcm06k4ri1kdcnnoe5jr4', 3),
(93, 2, 'lci4gvie4skmcm06k4ri1kdcnnoe5jr4', 1),
(94, 3, 'i7bts9c9o1eic74deqoq11v512lo0231', 3),
(95, 1, 'i7bts9c9o1eic74deqoq11v512lo0231', 1),
(96, 5, 'qg6p9d471ahgh90unmspkjh38k3dmem4', 2),
(97, 4, 'qg6p9d471ahgh90unmspkjh38k3dmem4', 2),
(99, 5, '95otpmps39id221eff6tdt1l3cstd488', 5),
(100, 3, '95otpmps39id221eff6tdt1l3cstd488', 1),
(101, 1, '95otpmps39id221eff6tdt1l3cstd488', 1),
(102, 2, '95otpmps39id221eff6tdt1l3cstd488', 1),
(103, 3, 'sd52k86th11hlqq1hsao898u30hdaavd', 1),
(104, 1, 'sd52k86th11hlqq1hsao898u30hdaavd', 1),
(105, 2, 'sd52k86th11hlqq1hsao898u30hdaavd', 1),
(106, 5, 'sd52k86th11hlqq1hsao898u30hdaavd', 1),
(107, 4, 'sd52k86th11hlqq1hsao898u30hdaavd', 1),
(108, 1, 't3vemvjf8ck8oncjoepulqp57e9j6ao8', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Машка', 'Считаю ваш магазин лучшим прелучшим во всем мире :***'),
(2, 'Петя', 'Широчайший ассортимент автомобилей, все в одном месте, супер!'),
(3, 'Иван', 'Компетентные менеджеры, сервис - огонь! 5+'),
(31, 'Джереми Кларксон', 'Oh My God! I never see anything like it! Amazing, best idea!!!');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `imgName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) DEFAULT NULL,
  `prodName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `imgName`, `views`, `cost`, `prodName`, `description`) VALUES
(1, '01.jpg', 20, 8180000, 'BMW 7 series', 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться\r\n         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины\r\n          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились\r\n           передние и задние фары и фартуки.'),
(2, '02.jpg', 8, 8670300, 'Mercedes-Benz S class', 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании\r\n         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку\r\n          моделей в иерархии классов торговой марки.'),
(3, '03.jpg', 22, 8070100, 'Audi A8', 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался\r\n         до России. Автомобиль построен на новой платформе и получил множество современных опций.'),
(4, '04.jpg', 0, 4650800, 'Hyundai Genesis G90', 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию\r\n         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый\r\n          функционал, ничем не уступающий именитым конкурентам.'),
(5, '05.jpg', 4, 4200700, 'KIA K900', 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то\r\n         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные\r\n          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `login` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`, `status`, `login`) VALUES
(1, 'qwerty', 12345, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1, NULL),
(2, 'aaa', 111, '7bqc2gcgg1ledrola2vs88196qrlmjf4', 1, NULL),
(3, 'Вася', 777, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 3, NULL),
(4, 'Маша', 12345, 'lci4gvie4skmcm06k4ri1kdcnnoe5jr4', 1, NULL),
(5, 'aaa', 777, 'i7bts9c9o1eic74deqoq11v512lo0231', 1, 'user2'),
(6, 'aaa', 777, 'qg6p9d471ahgh90unmspkjh38k3dmem4', 0, 'user2'),
(7, 'Алексей', 98765, '95otpmps39id221eff6tdt1l3cstd488', 0, 'user1'),
(8, 'Алексей', 555444, 'sd52k86th11hlqq1hsao898u30hdaavd', 1, 'user1'),
(9, 'Алекс', 12345, 't3vemvjf8ck8oncjoepulqp57e9j6ao8', 0, 'user1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`) VALUES
(1, 'admin', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '13567441695e6cd3f3d7d2c0.65119509', 1),
(2, 'user1', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '', 0),
(3, 'user2', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '', 0),
(4, 'user3', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
