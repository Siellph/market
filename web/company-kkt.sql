-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2020 г., 17:02
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
-- База данных: `company-kkt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1602768418),
('user', '3', 1602768688);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1602758044, 1602769912),
('organization', 2, 'Организации', NULL, NULL, 1602769498, 1602769498),
('RegData/RegDataController/actionDelete', 2, 'Удаление регистрационной записи', NULL, NULL, 1602769896, 1602770201),
('site/logout', 2, 'Выход из системы', NULL, NULL, 1602769771, 1602769771),
('user', 1, 'Пользователь', NULL, NULL, 1602762408, 1602762408),
('users/index', 2, 'Пользователи', NULL, NULL, 1602768503, 1602768735);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'organization'),
('admin', 'RegData/RegDataController/actionDelete'),
('admin', 'site/logout'),
('admin', 'users/index');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1602738948),
('m140506_102106_rbac_init', 1602757229),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1602757229),
('m180523_151638_rbac_updates_indexes_without_prefix', 1602757230),
('m200409_110543_rbac_update_mssql_trigger', 1602757230),
('m201015_050832_create_user_table', 1602738954);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Наименование организации',
  `inn` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ИНН',
  `adress` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Юридический адрес',
  `director` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Должность и руководитель',
  `mesto_ustanovki` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Место установки',
  `adress_ustanovki` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Адрес установки',
  `ofd` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ОФД'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `organization`
--

INSERT INTO `organization` (`name`, `inn`, `adress`, `director`, `mesto_ustanovki`, `adress_ustanovki`, `ofd`) VALUES
('ООО \"РЕОН\" ', '5902834187', '614046, г. Пермь, ул. Василия Каменского, дом 4, этаж1, помещение 3', 'Директор Морозова Татьяна Алексеевна  ', 'Аптека', '617240, Пермский край, Сивинский м.р-н, Сива с, Комсомольская ул, 6', 'ООО «ПЕТЕР-СЕРВИС Спецтехнологии»'),
('ООО \"Заботливая аптека\"', '5902862610', '614042, Пермский край, Пермь г, Петропавловская, дом № 77, кв.14', 'Генеральный директор Русакова Ольга Владимировна', 'Аптека', '167000, Республика Коми, Сыктывкар г, Первомайская ул, 90/3', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"Спот\"', '5903090325', '614097, г. Пермь, ул. Комиссара Пожарского, дом 10, 1 этаж, помещение 4', 'Генеральный директор Трефилова Алла Александровна', 'Аптека', '394030, Воронежская область, Воронеж г, Кольцовская ул, 52', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"Парк\"', '5903090332', '614111, г. Пермь, ул. Муромская, дом 16А, этаж 1, помещение 3', 'Генеральный директор Комкина Марина Александровна', 'Аптека', '617470, Пермский край, Кунгур г, Гоголя ул, 22', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"Тога\"', '5906086542', '614051, г. Пермь, ул. Юрша, дом 5, этаж 1, отдельный вход   ', 'Генеральный директор Плешкова Лиана Викторовна', 'Аптека', '170007, Тверская область, Тверь г, Третьяковский пер, д. 20', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"Марта\"', '5906107055', '614051 г.Пермь, ул.Юрша, 5, 1 этаж, помещение 7', 'Генеральный директор Кислов Алексей Евгеньевич', 'Аптечный пункт', '168100, Республика Коми, Сысольский м.р-н, Визинга с, Советская ул, 29', 'ООО «ПЕТЕР-СЕРВИС Спецтехнологии»'),
('ООО «Меридиан»', '5906126795', 'Москва. Обл., Белоомут, Советская пл., 2б ', 'Генеральный директор Русакова Ольга Владимировна', 'Аптека', '140520, Московская область, Белоомут р, Советская площадь ул, 2 стр. Б', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"ГРАНТ\"', '5907998608', '614039, Пермский край, Пермь г, Комсомольский пр-т, дом 58, помещение 16', 'Генеральный директор Стряпунин Артем Геннадьевич', 'Аптека', '619170, Пермский край, Юсьва с, Красноармейская ул, 24а', 'АО «ЭСК», бренд «Первый ОФД»'),
('ООО \"РЕТ\"', '5916030161', '617060, Пермский край, г. Краснокамск, ул. Карла Либкнехта, д. 17', 'Генеральный директор  Кислицына Лариса Петровна', 'Аптека', '353900, Краснодарский край, Новороссийск г, Советов ул, 11/1', 'АО «ЭСК», бренд «Первый ОФД»'),
(' ООО \"АДЖЕНТА\"', '7724854659', '115582, г. Москва, Каширское шоссе,108, корпус 1, помещение1   ', 'Генеральный директор Королева Ольга Викторовна ', 'Аптека', '111674, Г.Москва, Маршала Ерёменко ул, д. 5, 3 к.', 'АО «ЭСК», бренд «Первый ОФД»');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_data`
--

CREATE TABLE `reg_data` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Наименование компании',
  `inn` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ИНН',
  `adress` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Юридический адрес',
  `kkt` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Марка/модель ККТ',
  `zn_kkt` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заводской номер ККТ',
  `fn` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Наименование ФН',
  `zn_fn` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заводской номер ФН',
  `rnm` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Регистрационный номер машины',
  `licens` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Лицензия',
  `proshivka` date NOT NULL COMMENT 'Прошивка',
  `vid_raboti` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Вид работы',
  `date_reg` date NOT NULL COMMENT 'Дата регистрации',
  `status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'В работе' COMMENT 'Статус'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reg_data`
--

INSERT INTO `reg_data` (`id`, `name`, `inn`, `adress`, `kkt`, `zn_kkt`, `fn`, `zn_fn`, `rnm`, `licens`, `proshivka`, `vid_raboti`, `date_reg`, `status`) VALUES
(1, 'ООО “Спот”', '5903090325', 'Воронеж, Кольцовская, 52', 'РР-03Ф', '0356300014007811', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292371', '0004729596002012', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(2, 'ООО “Спот”', '5903090325', 'Воронеж, Кольцовская, 52', 'РР-03Ф', '0321990014007812', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292267', '0004729613030761', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(3, 'ООО “Марта”', '5906107055', 'Коми, Визинга, Советская, 29', 'РР-03Ф', '0404240014007819', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300276334', '0004729668057635', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(4, 'ООО “Марта”', '5906107055', 'Коми, Визинга, Советская, 29', 'РР-03Ф', '0139480014007818', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300276526', '0004729727029308', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(5, 'ООО “Заботливая аптека”', '5902862610', 'Сыктывкар, Первомайская, 90/3', 'РР-03Ф', '0224470014007546', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300276579', '0004729819011200', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(6, 'ООО “Заботливая аптека”', '5902862610', 'Сыктывкар, Первомайская, 90/3', 'РР-03Ф', '0612460014007820', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300275518', '0004729887060804', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(7, 'ООО “РЕТ”', '5916030161', 'Новороссийск, Советов, 11/1', 'РР-03Ф', '0195260014007547', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300271533', '0004729916028691', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(8, 'ООО “РЕТ”', '5916030161', 'Новороссийск, Советов, 11/1', 'РР-03Ф', '0312250014007549', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300270984', '0004729973026574', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(9, 'ООО “РЕТ”', '5916030161', 'Новороссийск, Советов, 11/1', 'РР-03Ф', '0445880014007548', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300270842', '0004729954052330', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-07', 'Выполнено'),
(10, 'ООО “ГРАНТ”', '5907998608', 'ПК, Юсьва, Красновармейская, 24а', 'РР-03Ф', '0581910014000778', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292454', '0004740367012431', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(11, 'ООО “ГРАНТ”', '5907998608', 'ПК, Юсьва, Красновармейская, 24а', 'РР-03Ф', '0249700014000647', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292061', '0004740392053509', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(12, 'ООО “Парк”', '5903090332', 'ПК, Кунгур, Гоголя, 22', 'РР-03Ф', '0565380014000973', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300291889', '0004740427011269', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(13, 'ООО “Парк”', '5903090332', 'ПК, Кунгур, Гоголя, 22', 'РР-03Ф', '0097530014000648', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292192', '0004740446058562', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(14, 'ООО “Парк”', '5903090332', 'ПК, Кунгур, Гоголя, 22', 'РР-03Ф', '0097570014000985', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292185', '0004740471010317', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(15, 'ООО «Аджента»', '7724854659', 'Москва, Маршала Ерёменко, 5, корп 3', 'РР-03Ф', '0157800014000965', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300291788', '0004741422061662', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(16, 'ООО «Аджента»', '7724854659', 'Москва, Маршала Ерёменко, 5, корп 3', 'РР-03Ф', '0125610014000966', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292180', '0004741439050854', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(17, 'ООО «Меридиан»', '5906126795', 'Москва. Обл., Белоомут, Советская пл., 2б', 'РР-03Ф', '0004000014000968', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292547', '0004741843009409', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(18, 'ООО «Меридиан»', '5906126795', 'Москва. Обл., Белоомут, Советская пл., 2б', 'РР-03Ф', '0424770014000964', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300292482', '0004741874036082', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-09-11', 'Выполнено'),
(19, 'ООО «Тога»', '5906086542', 'Тверь, Третьяковский пер., 20', 'РР-03Ф', '0590110014000869', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300298898', '0004794094047967', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-10-06', 'Выполнено'),
(20, 'ООО «Тога»', '5906086542', 'Тверь, Третьяковский пер., 20', 'РР-03Ф', '0350400014000863', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300299069', '0004794106023933', 'БНДС,П20', '2020-05-07', 'Первичная регистрация', '2020-10-06', 'Выполнено'),
(24, 'ООО \"РЕОН\"', '5902834187', 'ПК, Сива, Комсомольская. 6', 'РР-03Ф', '0115940014000867', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300296812', '0004794146064892', '', '2020-05-07', 'Первичная регистрация', '2020-10-06', 'Выполнено'),
(25, 'ООО «РЕОН»', '5902834187', 'ПК, Сива, Комсомольская. 6', 'РР-03Ф', '0254660014000868', 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2', '9285440300296834', '0004794165018958', '', '2020-05-07', 'Первичная регистрация', '2020-10-06', 'Выполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '9jN6RHDtIN0ljTsgcFP9KxejoJTB_5gP', '$2y$13$wTDcx/hJDnlExrEthstTSeAm3CQrOGRSpz8nptpUwjysNsEBl5IpO', NULL, 'gordin@mkod.ru', 10, 1602739363, 1602761868),
(3, 'user', 'j3FPdYwlNvAP71nY0UQa8CZPtM4I-VoG', '$2y$13$3wPcYrfNyNSzfMYty6TGNe5wRZ7EgkviJy1QiO9.m.xBUbj.JguyS', NULL, 'user@user.ru', 10, 1602768653, 1602768653);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`inn`);

--
-- Индексы таблицы `reg_data`
--
ALTER TABLE `reg_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reg_data`
--
ALTER TABLE `reg_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
