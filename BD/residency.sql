-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2021 a las 02:19:38
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `residency`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcre_animal` (IN `ani_nombre` VARCHAR(30), IN `ani_especie` VARCHAR(15), IN `ani_genero` VARCHAR(10))  BEGIN
INSERT INTO animal(nombre, especie, genero) VALUES (ani_nombre, ani_especie, ani_genero);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spdel_animal` (IN `ani_id` INT)  BEGIN
DELETE FROM animal WHERE id = ani_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spedit_animal` (IN `ani_id` INT)  BEGIN 
SELECT * FROM animal where id = ani_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spseledit_animal` (IN `ani_id` INT)  BEGIN
SELECT * FROM animal WHERE id = ani_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spsel_animal` ()  BEGIN
SELECT * FROM animal;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spupd_animal` (IN `ani_id` INT, IN `ani_nombre` VARCHAR(30), IN `ani_especie` VARCHAR(15), IN `ani_genero` VARCHAR(10))  BEGIN
UPDATE animal SET nombre = ani_nombre, especie = ani_especie, genero = ani_genero WHERE id = ani_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL COMMENT 'Identifier of an animal',
  `nombre` varchar(30) NOT NULL COMMENT 'Animal''s name',
  `especie` varchar(15) NOT NULL COMMENT 'Animal species',
  `genero` varchar(10) NOT NULL COMMENT 'Gender of the animal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table where the data of the animals found in the veterinary are stored.';

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id`, `nombre`, `especie`, `genero`) VALUES
(2, 'Pato23', 'Gato', 'Hembra'),
(4, 'Alcachofa', 'Perro', 'Macho'),
(5, 'Dragon', 'Ave', 'Macho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_04_154201_add_username_to_users_table', 1),
(7, '2021_12_11_011758_create_permission_tables', 1),
(8, '2021_12_11_205512_create_motorcycles_table', 1),
(9, '2021_12_11_221825_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table that stores the user and their respective role';

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table that stores all the permissions of each table';

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission_index', 'web', '2021-12-12 05:46:41', '2021-12-12 05:46:41'),
(2, 'permission_create', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(3, 'permission_show', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(4, 'permission_edit', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(5, 'permission_destroy', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(6, 'role_index', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(7, 'role_create', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(8, 'role_show', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(9, 'role_edit', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(10, 'role_destroy', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(11, 'user_index', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(12, 'user_create', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(13, 'user_show', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(14, 'user_edit', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(15, 'user_destroy', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(16, 'post_index', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(17, 'post_create', 'web', '2021-12-12 05:46:42', '2021-12-12 05:46:42'),
(18, 'post_show', 'web', '2021-12-12 05:46:43', '2021-12-12 05:46:43'),
(19, 'post_edit', 'web', '2021-12-12 05:46:43', '2021-12-12 05:46:43'),
(20, 'post_destroy', 'web', '2021-12-12 05:46:43', '2021-12-12 05:46:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Post identifier',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Identifier Title',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Creation date',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Modification date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This table is used to post the news or tasks to be carried out on behalf of the employees.';

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'asdsada', '2021-12-12 06:06:04', '2021-12-12 06:06:04'),
(6, 'qweqwe', '2021-12-26 22:45:48', '2021-12-26 22:45:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table that stores the two roles in the system';

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-12-12 05:46:43', '2021-12-12 05:46:43'),
(2, 'User', 'web', '2021-12-12 05:46:43', '2021-12-12 05:46:43'),
(3, 'prueba', 'web', '2021-12-26 18:16:17', '2021-12-26 18:16:17'),
(4, 'Pw2', 'web', '2021-12-26 22:22:31', '2021-12-26 22:22:31'),
(5, 'Pweb', 'web', '2021-12-26 22:43:57', '2021-12-26 22:43:57'),
(6, 'Prueba2', 'web', '2021-12-27 00:41:47', '2021-12-27 00:41:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table that gives permissions depending on the role';

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(1, 6),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 4),
(6, 6),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 3),
(11, 4),
(11, 6),
(12, 1),
(13, 1),
(13, 3),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(16, 3),
(16, 5),
(16, 6),
(17, 1),
(17, 2),
(17, 3),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table that stores registered users';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$clfjg0v4oDfytDlq6sVIHeCEHz355inFTZBMEx1eibzBGA9Jy0GDq', NULL, NULL, NULL, '2021-12-12 05:46:44', '2021-12-12 05:46:44', 'admin'),
(9, 'Maryam Torres', 'wifypukuki@mailinator.com', NULL, '$2y$10$7QncwpW8XbRgjt2CbzSaPuS8xYP.5lOdacQQaOYTk8A3tU0BPhfXK', NULL, NULL, NULL, '2021-12-26 18:16:37', '2021-12-26 18:16:37', 'Alex'),
(11, 'Leo Mcclain', 'jezujiwyc@mailinator.com', NULL, '$2y$10$7QzKgvSb0ayFMnhhXxx8vOAGverGfUmqRO.WlMBKst3iRqOEF9rNi', NULL, NULL, NULL, '2021-12-26 22:35:42', '2021-12-26 22:35:42', 'cain'),
(12, 'Ebony Bean', 'nylesirefi@mailinator.com', NULL, '$2y$10$0eJqxsYxrbMpGBVauAvk4OWRIEfp3A6wc3sn67FTMvMZfS9QmfeBa', NULL, NULL, NULL, '2021-12-26 22:44:12', '2021-12-26 22:44:34', 'Abel'),
(13, 'Paloma Porter', 'jasuquneba@mailinator.com', NULL, '$2y$10$.E//es3rQjX7ii6W7hBMDeNxCZ.NYH63V4Xa1U/1L0PmmlzOAqUoC', NULL, NULL, NULL, '2021-12-26 23:23:21', '2021-12-26 23:23:21', 'rejecaz'),
(14, 'Delilah Hendrix', 'juancho@email.com', NULL, '$2y$10$2Xjch8sW/34sR8xldb8TiOyXxxE7Exga4Ql0BY6UH0ivrI3jrC22G', NULL, NULL, NULL, '2021-12-26 23:42:16', '2021-12-26 23:42:16', 'Juancho'),
(16, 'Melinda Ramsey', 'benoxaf@mailinator.com', NULL, '$2y$10$CeB9LDCIA6gTy7JsfuFwveBzOtdfArJ/ceGcxkHnWa9JytzJl9.0G', NULL, NULL, NULL, '2021-12-27 00:50:03', '2021-12-27 00:50:03', 'rivyb');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier of an animal', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Post identifier', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
