-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `branches` (`id`, `name`, `color`) VALUES
(1,	'Холодногорско-Заводская линия',	'red'),
(2,	'Салтовская линия',	'blue'),
(3,	'Алексеевская линия',	'green');

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_station_id_foreign` (`station_id`),
  CONSTRAINT `media_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2019_05_12_163533_create_branches_table',	1),
(2,	'2019_05_12_163854_create_stations_table',	1),
(3,	'2019_05_13_200814_add_coords_fields_to_stations_table',	1),
(4,	'2019_05_26_143253_create_media_table',	1);

DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `prev_station_id` bigint(20) unsigned DEFAULT NULL,
  `next_station_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `x_axis` int(11) DEFAULT NULL,
  `y_axis` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stations_branch_id_foreign` (`branch_id`),
  KEY `stations_prev_station_id_foreign` (`prev_station_id`),
  KEY `stations_next_station_id_foreign` (`next_station_id`),
  CONSTRAINT `stations_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `stations_next_station_id_foreign` FOREIGN KEY (`next_station_id`) REFERENCES `stations` (`id`),
  CONSTRAINT `stations_prev_station_id_foreign` FOREIGN KEY (`prev_station_id`) REFERENCES `stations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stations` (`id`, `name`, `logo`, `description`, `branch_id`, `prev_station_id`, `next_station_id`, `created_at`, `updated_at`, `x_axis`, `y_axis`) VALUES
(1,	'Холодная гора',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	100,	250),
(2,	'Южный вокзал',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	150,	300),
(3,	'Центральный рынок',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	174,	350),
(4,	'Площадь Конституции',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	200,	400),
(5,	'Проспект Гагарина',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	250,	450),
(6,	'Спортивная',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	300,	500),
(7,	'Завод имени Малышева',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	350,	550),
(8,	'Московский проспект',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	400,	600),
(9,	'Дворец Спорта',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	450,	650),
(10,	'Армейская',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	500,	700),
(11,	'Имени О.С. Масельского',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	550,	750),
(12,	'Тракторный завод',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	600,	800),
(13,	'Индустриальная',	NULL,	NULL,	1,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	650,	850),
(14,	'Исторический музей',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	220,	400),
(15,	'Университет',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	400,	350),
(16,	'Пушкинская',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	450,	325),
(17,	'Киевская',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	500,	300),
(18,	'Академика Барабашова',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	550,	250),
(19,	'Академика Павлова',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	600,	220),
(20,	'Студенческая',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	650,	200),
(21,	'Героев труда',	NULL,	NULL,	2,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	700,	150),
(22,	'Метростроителей им. Ващенко',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	315,	485),
(23,	'Площадь Восстания',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	345,	465),
(24,	'Архитектора Бекетова',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	365,	415),
(25,	'Госпром',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	385,	365),
(26,	'Научная',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	420,	300),
(27,	'Ботанический сад',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	440,	250),
(28,	'23 Августа',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	430,	200),
(29,	'Алексеевская',	NULL,	NULL,	3,	NULL,	NULL,	'2019-06-03 22:26:57',	'2019-06-03 22:26:57',	450,	159);

-- 2019-06-11 20:01:24
