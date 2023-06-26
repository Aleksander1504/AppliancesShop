-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 20 2023 г., 13:04
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `smartewb_comp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--
-- Создание: Май 27 2023 г., 20:56
-- Последнее обновление: Июн 20 2023 г., 10:00
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `session_id` varchar(250) NOT NULL,
  `id_good` int(11) NOT NULL,
  `cli_` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`session_id`, `id_good`, `cli_`, `count`) VALUES
('4c152fd0cf21ad59e191f1cc388e7cc4', 23, 2, 2),
('4c152fd0cf21ad59e191f1cc388e7cc4', 25, 2, 3),
('5d4078a1d6cff4f8a71e1aa465f42804', 28, 0, 3),
('5d4078a1d6cff4f8a71e1aa465f42804', 30, 0, 2),
('6d2145bebdf4f60b87ebb8b850e2c681', 28, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id_cl` int(11) NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `adress_cl` varchar(255) NOT NULL,
  `phone_cl` varchar(255) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_cl`, `FIO`, `adress_cl`, `phone_cl`, `login`, `pass`) VALUES
(1, 'Домина Диана Дмитриевна', 'адрес 2', '11111111', '', ''),
(2, 'ИП Черемушкина', 'адрес 2', '45454545', '', ''),
(3, 'ООО \"ЛК\"', 'Адрес 5', '343434', '', ''),
(4, 'Лесков Иван Николаевич', 'Адрес3', '33223445', 'leck', '12345'),
(5, 'Лепко Наталья Евгеньевна', 'Октябрьская ул. 52', '5656', 'nata', '12345'),
(7, 'Жилова Наталья Сергеевна', 'Ленина 12', '89036754478', 'zhil', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `dirs`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `dirs`;
CREATE TABLE `dirs` (
  `id_group` int(11) NOT NULL,
  `name_group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dirs`
--

INSERT INTO `dirs` (`id_group`, `name_group`) VALUES
(1, 'Клавиатуры'),
(2, 'Системные блоки'),
(3, 'Мониторы'),
(7, 'Мыши'),
(8, 'Холодильники'),
(9, 'Стиральные машины');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--
-- Создание: Май 27 2023 г., 20:56
-- Последнее обновление: Июн 20 2023 г., 10:00
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_good` varchar(250) NOT NULL,
  `manafuc` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `price_new` float NOT NULL,
  `price_old` float DEFAULT '0',
  `count_all` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `id_group`, `name_good`, `manafuc`, `description`, `price_new`, `price_old`, `count_all`, `date_add`, `img`) VALUES
(23, 7, 'Проводная Мышь A4Tech X7 Oscar Neon Gaming X-89 Maze Ornament', 1, 'Тип оборудования	Мышь\r\nЦвета, использованные в оформлении	Орнамент, Черный\r\nТип сенсора	Оптический Pixart Avago PAW3212\r\nИгровая мышь	Да\r\nТип мыши (беспроводная или проводная)	Проводная\r\nНоутбучная мышь	Нет\r\nВстроенная память	160 Кб\r\nДлина кабеля	1.8 м', 1142, 1300, 12, '2023-04-27 10:15:41', 'img/catalog/A4Tech-Oscar-Neon-Gaming-X-89-Maze-4459932245.jpg'),
(24, 3, 'Панель SAMSUNG UD46E-B , черный размер экрана: 46\", с разрешением 1920,1080, отношением сторон 16:9', 6, 'Формат матрицы	16:9\r\nПоверхность экрана	полуматовая\r\nЯркость матрицы	500 кд/м2\r\nКонтрастность LCD-матрицы	3500 - статическая\r\nВремя отклика	8 мс', 30000, 0, 5, '2023-04-27 10:17:21', 'img/catalog/SAMSUNG-UD46E-B-4148042254.jpeg'),
(25, 7, 'Беспроводная Мышь ASUS Wireless Optical MW201C (90XB061N-BMU010)', 8, 'Тип оборудования	Мышь\r\nЦвета, использованные в оформлении	Темно-синий\r\nТип сенсора	Оптический\r\nТип мыши (беспроводная или проводная)	Беспроводная\r\nБесшумная мышь	Да\r\nНоутбучная мышь	Нет\r\nПодходит для левшей	Да\r\nЧастота	2.4 ГГц\r\nРадиус действия мыши	10 метров', 1200, 0, 45, '2023-04-27 10:18:37', 'img/catalog/ASUS-MW201C-(90XB061N-BMU010)-48112431093.jpeg'),
(26, 7, 'Проводная Мышь SVEN Optical Mouse RX-G830 Black USB 2.0', 4, 'Тип оборудования	Мышь\r\nЦвета, использованные в оформлении	Черный\r\nИгровая мышь	Да\r\nТип мыши (беспроводная или проводная)	Проводная\r\nНоутбучная мышь	Нет\r\nSoft Touch	Есть, верхняя панель\r\nПоддержка ОС	Windows 10, Windows 8.1, Windows 8, Windows 7, Windows Vista, Windows XP', 890, 0, 17, '2023-04-27 10:19:53', 'img/catalog/SVEN-RX-G830-5011782245.jpg'),
(27, 1, 'Клавиатура ACER OKW020 (ZL.KBDEE.001)', 8, 'Тип оборудования	Клавиатура\r\nТип клавиатуры (беспроводная или проводная)	Проводная\r\nЦвета, использованные в оформлении	Черный\r\nЦвет клавиш клавиатуры	Черный\r\nНоутбучные клавиши	ДА', 990, 0, 1, '2023-04-27 10:21:10', 'img/catalog/ACER-OKW020-(ZL.KBDEE.001)-4840152254.jpg'),
(28, 2, 'M6100 (M636SLGi): Core i3-9100F/ 8 Гб/ 1 Тб/ 4 Гб GeForce GTX1650 SUPER OC/ DVDRW/ Win10 Home', 5, 'Цвета, использованные в оформлении	Черный\r\nМодель	M6100\r\nТип оборудования	Игровой компьютер\r\nЧипсет мат. Платы	Intel H310', 80000, 0, 5, '2023-04-27 10:23:02', 'img/catalog/NORD_3.jpg'),
(30, 1, 'Клавиатура ASUS TUF Gaming K7', 3, 'Тип оборудования	Механическая клавиатура\r\nТип клавиатуры (беспроводная или проводная)	Проводная\r\nЦвета, использованные в оформлении	Черный\r\nЭргономичная клавиатура	Съемная подставка под запястье (магнитная)\r\nЦвет клавиш клавиатуры	Черный\r\nМиниатюрный USB-ресивер	Да\r\nОтсек в корпусе для хранения ресивера	Есть', 1200, 0, 2, '2023-05-28 14:40:02', 'img/catalog/472063_2254_draft.jpg'),
(31, 1, 'Клавиатура Defender Jakarta C-805 Black USB', 9, 'Тип оборудования	Комплект клавиатура + мышь\r\nТип клавиатуры (беспроводная или проводная)	Беспроводная\r\nЦвета, использованные в оформлении	Черный\r\nЦвет клавиш клавиатуры	Черный\r\nНоутбучные клавиши	Да\r\nТип сенсора	Инфракрасный\r\nТип мыши (беспроводная или проводная)	Беспроводная', 990, 0, 0, '2023-05-28 09:59:29', 'img/catalog/Defender-C-805-4373272254.jpg'),
(32, 9, 'Стиральная машина Haier HW80-B14979S', 10, 'Стиральная машина Haier HW80-B14979S - отличный выбор и будет достойной покупкой. Перед покупкой Haier HW80-B14979S Вы всегда можете проконсультироваться с нашими специалистами. Интернет-магазин Techport.ru - это гарантия низкой цены, оперативной доставки и качественного клиентского сервиса.', 65000, 0, 0, '2023-06-15 11:05:21', 'img/catalog/p1183065-0mw.jpg'),
(33, 9, 'Стиральная машина Samsung WW70J6210DW', 6, 'Информация о продукте\r\nБезупречное качество стирки\r\nТехнология «Eco Bubble» заботится о том, чтобы ваши вещи выглядели как новые. Перед началом стирки специальный генератор создает пузырьки воздуха, растворяя моющее средство в воде и превращая его в пену. Идеальная белоснежная пена быстро проникает в ткань, обеспечивая не только эффективное, но и бережное удаление загрязнений.\r\nЭффективная стирка менее чем за 1 час', 50000, 0, 0, '2023-06-15 11:06:26', 'img/catalog/p544919-0mw.jpg'),
(34, 8, 'Холодильник Samsung RB30A30N0SA/WT', 6, 'Двухкамерный холодильник Samsung RB30A30N0SA/WT может вмещать большое количество продуктов благодаря объемам морозильной (98 л) и холодильной (213 л) камер. Приятный серебристый цвет позволяет удачно совместить холодильник с дизайном почти любой кухни. Эта модель бытовой техники имеет продуманный размер, поэтому не займет много места в помещении. За счет оптимальной мощности замораживания (13 кг/cутки) можно заморозить рыбу, мясо, овощи и другие продукты довольно оперативно. У морозильной камеры', 50000, 0, 3, '2023-06-15 11:07:58', 'img/catalog/p1309686-0mw.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `items_in_order`
--
-- Создание: Май 27 2023 г., 20:56
-- Последнее обновление: Июн 20 2023 г., 10:00
--

DROP TABLE IF EXISTS `items_in_order`;
CREATE TABLE `items_in_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items_in_order`
--

INSERT INTO `items_in_order` (`id`, `id_order`, `item`, `count`) VALUES
(1, 1, 28, 1),
(2, 1, 27, 1),
(3, 1, 27, 2),
(4, 2, 28, 2),
(5, 2, 25, 1),
(6, 3, 28, 1),
(7, 3, 25, 1),
(8, 4, 28, 2),
(9, 5, 28, 6),
(10, 6, 24, 3),
(11, 6, 23, 12),
(12, 6, 27, 80),
(13, 7, 26, 4),
(14, 7, 25, 1),
(15, 8, 25, 2),
(16, 9, 34, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `manafacturer`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `manafacturer`;
CREATE TABLE `manafacturer` (
  `id_m` int(11) NOT NULL,
  `name_m` varchar(255) NOT NULL,
  `adress_m` varchar(255) DEFAULT NULL,
  `phone_m` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manafacturer`
--

INSERT INTO `manafacturer` (`id_m`, `name_m`, `adress_m`, `phone_m`) VALUES
(1, 'A4Tech', 'aaa', '222'),
(3, 'Asus', '', '222'),
(4, 'Sven', '', '333'),
(5, 'Intel', '', '222'),
(6, 'Samsung', '', '3434'),
(7, 'Philips', '', ''),
(8, 'Acer', '', ''),
(9, 'Defender', '', ''),
(10, 'Haier', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `news_table`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `news_table`;
CREATE TABLE `news_table` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_news` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` tinytext NOT NULL,
  `image` tinytext,
  `show_news` int(1) NOT NULL DEFAULT '1',
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_table`
--

INSERT INTO `news_table` (`id`, `description`, `date_news`, `name`, `image`, `show_news`, `user`) VALUES
(10, '&lt;p&gt;Группа злоумышленников, которая на прошлой неделе взломала оператора нефте- и газопровода&amp;nbsp;Colonial Pipeline, парализовав его работу, извинилась за социальные последствия своих действий. Хакеры заявили, что их целью является заработок денег, а не создание проблем для общественности. Группа называется DarkSide, и ФБР подтвердило, что именно она стоит за взломом одного из крупнейших нефтепроводов Северной Америки.&lt;/p&gt;\r\n', '2023-05-01 10:07:31', 'Хакеры извинились за взлом крупного американского нефтепровода Colonial Pipeline', 'img/news/389483924.jpg', 1, 4),
(11, '&lt;p&gt;Причин, по которым на компьютере могут появиться испорченные файлы, &amp;mdash; множество. Это могут быть ошибки в работе операционной системы и приложений, атаки вредоносного программного обеспечения или некорректные действия пользователя (типичный пример &amp;mdash; извлечение флеш-накопителя в момент записи данных). Также к повреждению файлов могут приводить технические сбои в работе диска, внезапные отключения электропитания ПК, проблемы с сетью во время загрузки данных, неудачные попытки восстановления удалённой информации и прочие неприятности, самый простой способ оградиться от которых &amp;mdash; вовремя создавать резервные копии файлов.&lt;/p&gt;\r\n\r\n&lt;p&gt;Если же у вас нет резервных копий, то на помощь могут прийти перечисленные ниже утилиты, позволяющие восстанавливать структуру повреждённых данных. Конечно, всецело уповать на подобного рода инструменты не стоит: вероятность восстановления испорченных файлов невелика и зависит от степени нанесённого урона, формата данных, а также прочих факторов. Тем не менее в некоторых случаях такие программы помогают получить хотя бы частичный доступ к той информации, которая хранилась в повреждённых файлах. А это лучше, чем ничего.&lt;/p&gt;\r\n', '2023-05-03 10:08:50', 'Дело техники: восстановление повреждённых файлов различных форматов', 'img/news/news1.png', 1, 4),
(12, '&lt;p&gt;Более 40 лет назад был запущен зонд &amp;laquo;Вояджер-1&amp;raquo; (Voyager 1) и он всё ещё продолжает делать открытия. В 2012 году зонд вышел за границы гелиосферы Солнечной системы и стал первым рукотворным межзвёздным космическим аппаратом. С тех пор зонд изучает процессы в пространстве, на которое наша звезда оказывает минимальное воздействие. И это пространство само по себе&amp;nbsp;&lt;a href=&quot;https://newatlas.com/space/voyager-1-plasma-hum-interstellar/&quot; target=&quot;_blank&quot;&gt;оказалось&lt;/a&gt;&amp;nbsp;вовсе не безмолвным.&lt;/p&gt;\r\n\r\n&lt;p&gt;Как сообщают в издании&amp;nbsp;&lt;a href=&quot;https://www.nature.com/articles/s41550-021-01363-7&quot; target=&quot;_blank&quot;&gt;Nature Astronomy&lt;/a&gt;&amp;nbsp;исследователи, за пределами гелиосферы &amp;laquo;Вояджер-1&amp;raquo; зафиксировал &amp;laquo;гул&amp;raquo; плазмы, интенсивность которого оказалась выше ожидаемой. Солнечный ветер уже не вторгается в эту область пространства, хотя мощные коронарные выбросы Солнца во время его активности слышны в постоянном и монотонном плазменном шуме как раскаты грома.&lt;/p&gt;\r\n\r\n&lt;p&gt;Плазму в межзвёздном газе или плотность электронов фиксирует один из немногих оставшихся рабочими за 40 лет прибор &amp;laquo;Система плазменных волн&amp;raquo; (PWS, Plasma Wave System). Этот прибор фиксировал радиоволны, создаваемые Сатурном и Юпитером, но по-настоящему проявил себя на границе гелиосферы и за её пределами. Настоящим открытием стало детектирование довольно сильной активности электронов в межзвёздном пространстве, куда не долетает солнечный ветер. Эта информация поможет лучше понять процессы за пределами звёздных систем.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;&amp;laquo;Он очень слабый и монотонный [гул], потому что находится в узкой полосе частот,&lt;/em&gt;&amp;nbsp;&amp;mdash; сказала Стелла Окер (Stella Ocker), автор исследования. &amp;mdash;&amp;nbsp;&lt;em&gt;Мы обнаруживаем слабый, постоянный гул межзвездного газа&amp;raquo;.&lt;/em&gt;&lt;/p&gt;\r\n', '2023-05-11 10:12:57', 'Зонд «Вояджер-1» обнаружил звучание межзвёздного пространства', 'img/news/stellar_hul.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--
-- Создание: Май 27 2023 г., 20:56
-- Последнее обновление: Июн 20 2023 г., 10:00
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `number`, `date`, `user`, `status`, `cl`) VALUES
(1, 82278, '2023-05-11 15:40:38', 4, 1, 1),
(2, 42173, '2023-05-11 15:40:38', 4, 1, 2),
(3, 58411, '2023-05-11 15:42:13', 5, 1, 3),
(4, 31865, '2023-05-11 17:45:51', 5, 1, 1),
(5, 68450, '2023-05-11 17:45:51', 5, 1, 2),
(6, 52915, '2023-05-25 21:10:42', 4, 1, 4),
(7, 25207, '2023-05-27 19:12:26', 4, 1, 5),
(8, 85651, '2023-06-20 09:54:56', 4, 1, 7),
(9, 84425, '2023-06-20 10:00:06', 4, 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id_set` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id_s` int(11) NOT NULL,
  `name_s` varchar(255) NOT NULL,
  `inn` int(11) NOT NULL,
  `adress_s` varchar(255) NOT NULL,
  `phone_s` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `supplier`
--

INSERT INTO `supplier` (`id_s`, `name_s`, `inn`, `adress_s`, `phone_s`) VALUES
(1, 'ИП Черемушкин Н.Е.', 4434343, 'Полесская, д.8, кв.12', '34343434'),
(2, 'НИКС', 5656, '5656', '5656'),
(3, 'Мвидео', 5555, '45', '4545'),
(4, 'ИП Шпагина Р.Л.', 2147483647, '454523', '4333');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Май 27 2023 г., 20:56
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `email`, `role`, `date_reg`, `phone`) VALUES
(3, 'Глебов Иван Романович', 'gleb', '12345', 'gleb@ya.ru', 0, '2021-03-10 21:00:00', NULL),
(4, 'Администратор', 'admin', 'pwd13pwd', '', 1, '2021-03-11 08:00:00', NULL),
(5, 'Фатеева Галина Александровна', 'fat', '12345', 'fat@ya.ru', 0, '2021-03-11 08:18:18', '454545'),
(6, 'Плахов Николай Алексеевич', 'plah', '1233', 'plah@ya.ru', 1, '2021-03-11 12:41:02', '3434');

-- --------------------------------------------------------

--
-- Структура таблицы `warehouse`
--
-- Создание: Май 27 2023 г., 20:56
-- Последнее обновление: Июн 20 2023 г., 09:59
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse` (
  `id_pr` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `id_supp` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `count_w` int(11) NOT NULL,
  `price` float NOT NULL,
  `user` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `warehouse`
--

INSERT INTO `warehouse` (`id_pr`, `id_good`, `id_supp`, `number`, `count_w`, `price`, `user`, `date_added`) VALUES
(10, 27, 2, 64813, 2, 600, 5, '2023-05-11 14:18:53'),
(11, 25, 4, 64722, 5, 1200, 5, '2023-05-11 14:19:05'),
(12, 26, 1, 66146, 5, 1500, 4, '2023-05-11 14:26:10'),
(13, 23, 1, 66317, 12, 800, 4, '2023-05-11 18:02:21'),
(14, 25, 2, 65905, 30, 280, 4, '2023-05-30 14:29:06'),
(15, 26, 3, 61184, 12, 360, 4, '2023-05-30 14:29:27'),
(16, 28, 1, 69979, 5, 500, 4, '2023-05-30 14:31:36'),
(17, 30, 2, 68315, 2, 900, 4, '2023-05-30 14:40:41'),
(18, 24, 2, 65551, 5, 1200, 4, '2023-05-30 14:56:35'),
(19, 25, 3, 66378, 12, 2000, 4, '2023-06-14 11:47:53'),
(20, 34, 3, 64702, 5, 50000, 4, '2023-06-20 09:59:27');

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
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `dirs`
--
ALTER TABLE `dirs`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `items_in_order`
--
ALTER TABLE `items_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `manafacturer`
--
ALTER TABLE `manafacturer`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news_table`
--
ALTER TABLE `news_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
