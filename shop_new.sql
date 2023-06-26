-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 12 2023 г., 22:56
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `session_id` varchar(250) NOT NULL,
  `id_good` int(11) NOT NULL,
  `cli_` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`session_id`, `id_good`, `cli_`, `count`) VALUES
('4c152fd0cf21ad59e191f1cc388e7cc4', 23, 2, 2),
('4c152fd0cf21ad59e191f1cc388e7cc4', 25, 2, 3),
('5d4078a1d6cff4f8a71e1aa465f42804', 28, 0, 3),
('5d4078a1d6cff4f8a71e1aa465f42804', 30, 0, 2),
('cst2k7jplk548gk546ku4n9749', 28, 0, 1),
('cst2k7jplk548gk546ku4n9749', 24, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id_cl` int(11) NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `adress_cl` varchar(255) NOT NULL,
  `phone_cl` varchar(255) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_cl`, `FIO`, `adress_cl`, `phone_cl`, `login`, `pass`) VALUES
(1, 'Домина Диана Дмитриевна', 'адрес 2', '11111111', '', ''),
(2, 'ИП Черемушкина', 'адрес 2', '45454545', '', ''),
(3, 'ООО \"ЛК\"', 'Адрес 5', '343434', '', ''),
(4, 'Лесков Иван Николаевич', 'Адрес3', '33223445', 'leck', '12345'),
(5, 'Лепко Наталья Евгеньевна', 'Октябрьская ул. 52', '5656', 'nata', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `dirs`
--

CREATE TABLE `dirs` (
  `id_group` int(11) NOT NULL,
  `name_group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `dirs`
--

INSERT INTO `dirs` (`id_group`, `name_group`) VALUES
(1, 'Костюмы'),
(2, 'Шорты'),
(3, 'Джемперы'),
(4, 'Брюки'),
(5, 'Футболки');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_good` varchar(250) NOT NULL,
  `manafuc` int(11) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `price_new` float NOT NULL,
  `price_old` float DEFAULT 0,
  `count_all` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `id_group`, `name_good`, `manafuc`, `description`, `price_new`, `price_old`, `count_all`, `date_add`, `img`) VALUES
(10, 2, 'Шорты Diz HUGO', 12, 'Состав:\r\nХлопок 100%\r\nЦвет:\r\nСерый\r\nСтрана бренда:\r\nГермания\r\nСтрана производства:\r\nПАКИСТАН\r\nСезон:\r\nЛето\r\nСтиль:\r\nСпортивный\r\nДетали:\r\nНашивка\r\nРасцветка:\r\nОднотонная\r\nКарманы:\r\nЕсть', 7000, 0, 4, '2023-05-15 19:50:19', 'img/catalog/451639_1.webp'),
(11, 2, 'Шорты GUESS', 3, 'Состав:\r\nХлопок 100%\r\nЦвет:\r\nГолубой\r\nСтрана бренда:\r\nСша\r\nСтрана производства:\r\nТУНИС\r\nСезон:\r\nЛето\r\nСтиль:\r\nCasual\r\nРасцветка:\r\nОднотонная\r\nКарманы:\r\nЕсть', 7500, 0, 1, '2023-05-15 19:50:19', 'img/catalog/441532_1.webp'),
(12, 3, ' Джемпер GUESS', 3, 'Состав:\r\nПолиамид 45%, Полиэстер 45%, Шелк 5%, Шерсть 5%\r\nЦвет:\r\nТемно-синий\r\nСтрана бренда:\r\nСша\r\nСтрана производства:\r\nКИТАЙ\r\nСезон:\r\nДемисезон\r\nСтиль:\r\nCasual\r\nРасцветка:\r\nОднотонная\r\nПринт:\r\nЛоготип\r\nВырез или воротник:\r\nКруглый вырез\r\nРукав:\r\nДлинный', 6000, 0, 7, '2023-05-15 19:50:19', 'img/catalog/450731_1.webp'),
(13, 1, 'Мужской костюм KITON', 11, 'Классический костюм', 56000, 0, 3, '2023-05-15 19:50:19', 'img/catalog/NMN5EGB_mu.jpg'),
(14, 4, 'Брюки RITTER JEANS', 1, 'Состав:\r\nХлопок 80%, Полиэстер 20%\r\nЦвет:\r\nСиний\r\nСтрана бренда:\r\nГермания\r\nСтрана производства:\r\nКИТАЙ\r\nСезон:\r\nМульти\r\nСтиль:\r\nСпортивный\r\nРасцветка:\r\nОднотонная\r\nКарманы:\r\nЕсть', 10000, 0, 3, '2023-05-15 19:50:19', 'img/catalog/413943_1.webp'),
(15, 4, 'Брюки вельветовые прямые стрейч', 1, 'Вельветовые штаны								', 5600, 0, 5, '2023-05-15 19:50:19', 'img/catalog/764.jpg'),
(16, 5, 'Футболка RITTER JEANS', 1, 'Состав:\r\nХлопок 46%, Модал 46%, Эластан 6%, Полиэстер 2%\r\nЦвет:\r\nТемно-синий\r\nСтрана бренда:\r\nГермания\r\nСтрана производства:\r\nКИТАЙ\r\nСезон:\r\nЛето\r\nСтиль:\r\nCasual\r\nДетали:\r\nКарман\r\nРасцветка:\r\nКрапинка\r\nПринт:\r\nРисунок\r\nВырез или воротник:\r\nКруглый вырез\r\nРукав:\r\nКороткий', 2400, 0, 1, '2023-05-15 19:50:19', 'img/catalog/425250_1.webp'),
(18, 5, 'Футболка GUESS серая', 3, 'Состав:\r\nХлопок 100%\r\nЦвет:\r\nСерый\r\nСтрана бренда:\r\nСша\r\nСтрана производства:\r\nИНДИЯ\r\nСезон:\r\nЛето\r\nСтиль:\r\nCasual\r\nРасцветка:\r\nОднотонная\r\nПринт:\r\nРисунок\r\nВырез или воротник:\r\nКруглый вырез\r\nРукав:\r\nКороткий', 7000, 0, 7, '2023-05-15 19:50:19', 'img/catalog/450728_1.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `items_in_order`
--

CREATE TABLE `items_in_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `items_in_order`
--

INSERT INTO `items_in_order` (`id`, `id_order`, `item`, `count`) VALUES
(1, 1, 13, 1),
(2, 1, 14, 1),
(3, 1, 15, 2),
(4, 2, 15, 2),
(5, 2, 11, 1),
(6, 3, 10, 1),
(7, 3, 18, 1),
(8, 4, 11, 2),
(9, 5, 11, 6),
(10, 6, 11, 3),
(11, 6, 13, 12),
(12, 6, 15, 80),
(13, 7, 16, 4),
(14, 7, 16, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `manafacturer`
--

CREATE TABLE `manafacturer` (
  `id_m` int(11) NOT NULL,
  `name_m` varchar(255) NOT NULL,
  `adress_m` varchar(255) DEFAULT NULL,
  `phone_m` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `manafacturer`
--

INSERT INTO `manafacturer` (`id_m`, `name_m`, `adress_m`, `phone_m`) VALUES
(1, 'RITTER JEANS', 'aaa', '222'),
(3, 'GUESS', '', '222'),
(10, 'FLIGHT', '', ''),
(11, 'KITON', '', '33'),
(12, 'HUGO', '', '124');

-- --------------------------------------------------------

--
-- Структура таблицы `news_table`
--

CREATE TABLE `news_table` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_news` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` tinytext NOT NULL,
  `image` tinytext DEFAULT NULL,
  `show_news` int(1) NOT NULL DEFAULT 1,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `news_table`
--

INSERT INTO `news_table` (`id`, `description`, `date_news`, `name`, `image`, `show_news`, `user`) VALUES
(19, '&lt;p&gt;&lt;strong&gt;PMDS, или Premium Mood Denim Superior&lt;/strong&gt;&amp;nbsp;&amp;mdash; итальянская марка мужской одежды, созданная в 2013 г. дизайнером Чиро Пеньо. Бренд черпает вдохновение в атмосфере новаторства, присущей культуре денима, и в постоянном поиске новых решений для свободного духом мужчины, который хочет выразить себя через одежду. Ценности PMDS &amp;ndash; оригинальность, качество и инновации &amp;ndash; находят отражение в коллекциях с отзвуками стиля гранж: бренд отличают яркие дизайнерские акценты, смелые сочетания цветов, нарочитая дерзость и брутальность. Бренд PMDS отслеживает самые интересные явления современной культуры, чтобы интерпретировать их в каждой коллекции и вновь быть на гребне актуальной мужской моды.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nВ новом сезоне бренд PMDS предлагает смелые сочетания денима с современными технологичными тканями, графичные и камуфляжные принты в холодных оттенках, градуированные цвета. Хлопковые костюмы от дизайнера Чиро Пеньо балансируют на грани классики и неформальности. Образ дополняют олимпийки и свитшоты, футболки и рубашки с игрой фактур и оттенков. Креативная коллекция джинсов включает модели с эффектом варёной и застиранной ткани, с потёртостями и разрезами, с декоративными брызгами яркой краски.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '2023-06-12 20:02:23', 'Бренд-премьера: PMDS', 'img/news/13b5c9b3b84fee0c1905f927a6d3d44e.jpg', 1, 4),
(20, '&lt;p&gt;Лето &amp;ndash; время торжественных и красивых событий: нас ждут выпускные, свадьбы, корпоративы, вечеринки на открытом воздухе. Как одеться актуально и соответственно случаю? В lady &amp;amp; gentleman CITY сделать выбор легко: премиальные бренды как будто соревнуются в красоте вечерних и коктейльных образов.&lt;/p&gt;\r\n', '2023-06-12 20:03:26', 'Летние образы для особых случаев', 'img/news/8bcd3dd90f9451014bd5b0b61324c970.jpg', 1, 4),
(21, '&lt;p&gt;Finisterre &amp;ndash; это коллекции в casual-стиле для мужчин и женщин, вдохновленные свежим ветром Атлантического океана на мысе Финистерре. Марка адресована активным жителям большого города, которые каждый день стремятся к новым горизонтам и хотят выглядеть непринуждённо и элегантно.&lt;/p&gt;\r\n', '2023-06-12 20:05:13', 'Коллекция Finisterre: динамичный стиль на каждый день', 'img/news/dbde9cb01aed5f418f89e3d0eb59c273.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `number`, `date`, `user`, `status`, `cl`) VALUES
(1, 82278, '2023-04-11 15:40:38', 4, 1, 1),
(2, 42173, '2023-04-11 15:40:38', 4, 1, 2),
(3, 58411, '2023-04-11 15:42:13', 5, 1, 3),
(4, 31865, '2023-04-11 17:45:51', 5, 1, 1),
(5, 68450, '2023-04-11 17:45:51', 5, 1, 2),
(6, 52915, '2023-04-22 18:09:16', 4, 1, 4),
(7, 25207, '2023-04-21 21:00:00', 4, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id_set` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id_set`, `descr`, `value`) VALUES
(23, 'price', 'min'),
(24, 'competitors', '1;2;');

-- --------------------------------------------------------

--
-- Структура таблицы `supplier`
--

CREATE TABLE `supplier` (
  `id_s` int(11) NOT NULL,
  `name_s` varchar(255) NOT NULL,
  `inn` int(11) NOT NULL,
  `adress_s` varchar(255) NOT NULL,
  `phone_s` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `supplier`
--

INSERT INTO `supplier` (`id_s`, `name_s`, `inn`, `adress_s`, `phone_s`) VALUES
(1, 'ИП Черемушкин Н.Е.', 4434343, 'Полесская, д.8, кв.12', '34343434'),
(2, 'HUGO', 5656, '5656', '5656'),
(3, 'RITTER JEANS', 5555, '45', '4545'),
(4, 'ИП Шпагина Р.Л.', 2147483647, '454523', '4333');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `email`, `role`, `date_reg`, `phone`) VALUES
(3, 'Глебов Иван Романович', 'gleb', '12345', 'gleb@ya.ru', 0, '2023-03-10 21:00:00', NULL),
(4, 'Администратор', 'admin', 'pwd13pwd', '', 1, '2023-03-11 08:00:00', NULL),
(5, 'Фатеева Галина Александровна', 'fat', '12345', 'fat@ya.ru', 0, '2023-03-11 08:18:18', '454545'),
(6, 'Плахов Николай Алексеевич', 'plah', '1233', 'plah@ya.ru', 1, '2023-03-11 12:41:02', '3434');

-- --------------------------------------------------------

--
-- Структура таблицы `warehouse`
--

CREATE TABLE `warehouse` (
  `id_pr` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `id_supp` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `count_w` int(11) NOT NULL,
  `price` float NOT NULL,
  `user` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `warehouse`
--

INSERT INTO `warehouse` (`id_pr`, `id_good`, `id_supp`, `number`, `count_w`, `price`, `user`, `date_added`) VALUES
(10, 27, 2, 64813, 2, 600, 5, '2023-04-11 14:18:53'),
(11, 25, 4, 64722, 5, 1200, 5, '2023-04-11 14:19:05'),
(12, 26, 1, 66146, 5, 1500, 4, '2023-04-11 14:26:10'),
(13, 23, 1, 66317, 12, 800, 4, '2023-04-11 18:02:21'),
(14, 25, 2, 65905, 30, 280, 4, '2023-04-20 14:29:06'),
(15, 26, 3, 61184, 12, 360, 4, '2023-04-19 21:00:00'),
(16, 28, 1, 69979, 5, 500, 4, '2023-04-20 12:04:52'),
(17, 30, 2, 68315, 2, 900, 4, '2023-04-20 21:00:00'),
(18, 24, 2, 65551, 5, 1200, 4, '2023-04-20 14:56:35'),
(19, 25, 3, 66378, 12, 2000, 4, '2023-04-22 12:05:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cl`);

--
-- Индексы таблицы `dirs`
--
ALTER TABLE `dirs`
  ADD PRIMARY KEY (`id_group`),
  ADD UNIQUE KEY `id_group` (`id_group`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `items_in_order`
--
ALTER TABLE `items_in_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manafacturer`
--
ALTER TABLE `manafacturer`
  ADD PRIMARY KEY (`id_m`);

--
-- Индексы таблицы `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_set`);

--
-- Индексы таблицы `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_s`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id_pr`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dirs`
--
ALTER TABLE `dirs`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `items_in_order`
--
ALTER TABLE `items_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `manafacturer`
--
ALTER TABLE `manafacturer`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news_table`
--
ALTER TABLE `news_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id_set` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
