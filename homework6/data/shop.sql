-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2020 г., 15:10
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
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `imgName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) DEFAULT NULL,
  `prodName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `imgName`, `views`, `cost`, `prodName`, `description`) VALUES
(1, '01.jpg', 15, 8180000, 'BMW 7 series', 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться\r\n         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины\r\n          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились\r\n           передние и задние фары и фартуки.'),
(2, '02.jpg', 6, 8670300, 'Mercedes-Benz S class', 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании\r\n         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку\r\n          моделей в иерархии классов торговой марки.'),
(3, '03.jpg', 22, 8070100, 'Audi A8', 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался\r\n         до России. Автомобиль построен на новой платформе и получил множество современных опций.'),
(4, '04.jpg', 0, 4650800, 'Hyundai Genesis G90', 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию\r\n         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый\r\n          функционал, ничем не уступающий именитым конкурентам.'),
(5, '05.jpg', 1, 4200700, 'KIA K900', 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то\r\n         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные\r\n          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
