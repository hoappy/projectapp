-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2021 a las 03:03:33
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projectapp`
--
CREATE DATABASE IF NOT EXISTS `projectapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `projectapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automovils`
--

CREATE TABLE `automovils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `tipo_automovil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_automovil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `automovils`
--

INSERT INTO `automovils` (`id`, `modelo`, `patente`, `anno`, `tipo_automovil`, `marca_automovil`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'gbthnt', 'tgbtgnb', 54446, 'fb f', 'fgbfgbgf', '1', '2021-07-09 01:28:47', '2021-07-24 01:31:07'),
(2, 'werwert', 'werwer', 123123, 'werwerw', 'werwer', '0', '2021-07-14 18:12:03', '2021-07-24 01:25:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudads`
--

CREATE TABLE `ciudads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `provincia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad_cometidos`
--

CREATE TABLE `ciudad_cometidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `cometido_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometidos`
--

CREATE TABLE `cometidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_emicion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_c_pernoctar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_s_pernoctar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_transporte_ida` int(11) NOT NULL,
  `tipo_transporte_regreso` int(11) NOT NULL,
  `progreso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `automovil_id` bigint(20) UNSIGNED NOT NULL,
  `item_presupuestario_id` bigint(20) UNSIGNED NOT NULL,
  `user_solicita_id` bigint(20) UNSIGNED NOT NULL,
  `user_jefe_id` bigint(20) UNSIGNED NOT NULL,
  `user_aprueba_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductors`
--

CREATE TABLE `conductors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_licencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annos_experiencia` int(11) NOT NULL,
  `nombre_conductor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_p_conductor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_m_conductor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_conductor` int(11) NOT NULL,
  `direccion_conductor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `automovil_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conductors`
--

INSERT INTO `conductors` (`id`, `tipo_licencia`, `annos_experiencia`, `nombre_conductor`, `apellido_p_conductor`, `apellido_m_conductor`, `telefono_conductor`, `direccion_conductor`, `estado`, `automovil_id`, `created_at`, `updated_at`) VALUES
(1, 'werwer', 21, 'werwer', 'wer', 'wer', 1232134, 'hola', '1', 1, '2021-07-14 18:13:18', '2021-07-14 18:13:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_dependencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_dependencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre_dependencia`, `direccion_dependencia`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Dependencia de Prueba', 'en el centro', '1', NULL, NULL);

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
-- Estructura de tabla para la tabla `item_presupuestarios`
--

CREATE TABLE `item_presupuestarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_item_presupuestario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(49, '2013_06_29_224944_create_dependencias_table', 1),
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(54, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(55, '2021_06_29_193638_create_sessions_table', 1),
(56, '2021_06_29_225034_create_item_presupuestarios_table', 1),
(57, '2021_06_29_225220_create_automovils_table', 1),
(58, '2021_06_29_225234_create_conductors_table', 1),
(59, '2021_06_29_230246_create_regions_table', 1),
(60, '2021_06_29_230255_create_provincias_table', 1),
(61, '2021_06_29_230304_create_ciudads_table', 1),
(62, '2021_06_29_230313_create_cometidos_table', 1),
(63, '2021_06_29_230323_create_ciudad_cometidos_table', 1),
(64, '2021_07_03_053300_create_permission_tables', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.home', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(2, 'admin.cometido.autorizar', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(3, 'admin.cometido.denegar', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(4, 'admin.cometido.solicitar', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(5, 'admin.cometido.cancelar', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(6, 'admin.cometido.asignar', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(7, 'admin.cometido.rechazar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(8, 'admin.cometido.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(9, 'admin.cometido.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(10, 'admin.cometido.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(11, 'admin.cometido.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(12, 'admin.cometido.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(13, 'admin.cometido.desactivar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(14, 'admin.user.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(15, 'admin.user.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(16, 'admin.user.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(17, 'admin.user.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(18, 'admin.user.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(19, 'admin.user.desactivar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(20, 'admin.item_presupuestario.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(21, 'admin.item_presupuestario.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(22, 'admin.item_presupuestario.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(23, 'admin.item_presupuestario.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(24, 'admin.item_presupuestario.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(25, 'admin.item_presupuestario.desactivar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(26, 'admin.dependencia.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(27, 'admin.dependencia.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(28, 'admin.dependencia.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(29, 'admin.dependencia.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(30, 'admin.dependencia.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(31, 'admin.dependencia.desactivar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(32, 'admin.conductor.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(33, 'admin.conductor.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(34, 'admin.conductor.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(35, 'admin.conductor.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(36, 'admin.conductor.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(37, 'admin.conductor.desactivar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(38, 'admin.automovil.index', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(39, 'admin.automovil.edit', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(40, 'admin.automovil.create', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(41, 'admin.automovil.destroy', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(42, 'admin.automovil.activar', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(43, 'admin.automovil.desactivar', 'web', '2021-07-03 10:22:49', '2021-07-03 10:22:49'),
(44, 'admin.user.rolestore', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48'),
(45, 'admin.user.roleasig', 'web', '2021-07-03 10:22:48', '2021-07-03 10:22:48');

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
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_region` int(11) NOT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(2, 'Jefe', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47'),
(3, 'User', 'web', '2021-07-03 10:22:47', '2021-07-03 10:22:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aQ8HobFOaOCFbE83bygA6nQ8GC57dA0enpEI93D2', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidTEwcjQ5Nm1Tdjl2eHoxak1VZUhVUVNWZDlRcWFNWmNrWHNtQWMyZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC91c2VyL3Byb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTFQ2QjZPelQvYU1tUU9mYmFNdFUyLkd5QVhEajguYUk5NDNNVEU1TTBYMWdVY1c2ZjdjQXEiO30=', 1626272453),
('BtVVm2RSst0rHlSt6vwLfpyekfDidow3CfiuTeVJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ3FXVERkUjZxVzBzSEh5d3NSUk1scWFYQ2dNRm91WnJzUWdNYm5PWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSTRMeHdRZ05VczIzcWQwbUlWZGxMZTBLUWdvYnNweFd4Q1B0M1BZVElDaThza2pRL1c4YTIiO30=', 1626272660),
('ohAQq0TSCXvBHbbFn5m34a3baMHxQBLMfSx6s447', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieXZPVWNZcERDa2NMQklzd1Q5MmlNSjNVNEx2SGFTdllsOTc3MXR1NiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSTRMeHdRZ05VczIzcWQwbUlWZGxMZTBLUWdvYnNweFd4Q1B0M1BZVElDaThza2pRL1c4YTIiO30=', 1626273372),
('WULY1SEcV9K8r4HsoSc50LMVk1ppU4qAAHDFbnfr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTDl6cjg2TEw1MVZWOHRCRlZKT2pDdzhyNktMdzlQM0Iya2lOMHY3dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdXRvbW92aWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEk0THh3UWdOVXMyM3FkMG1JVmRsTGUwS1Fnb2JzcHhXeENQdDNQWVRJQ2k4c2tqUS9XOGEyIjt9', 1627075868);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_P` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_M` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `grado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dependencia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rut`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `apellido_P`, `apellido_M`, `direccion`, `fecha_nacimiento`, `grado`, `nombre_cargo`, `dependencia_id`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo Andres', 'Hoappy.py@gmail.com', '19.176.144-9', NULL, '$2y$10$I4LxwQgNUs23qd0mIVdlLe0KQgobspxWxCPt3PYTICi8skjQ/W8a2', NULL, NULL, NULL, NULL, NULL, 'Garcia', 'Trautmann', 'Mi Casa', '1997-06-30', '10', 'Role 3 | Admin', 1, '2021-07-03 10:06:03', '2021-07-04 09:38:18'),
(2, 'Cristina Alicia', 'Hoappy.p@gmail.com', '14.450.003-2', NULL, '$2y$10$LT6B6OzT/aMmQOfbaMtU2.GyAXDj8.aI943MTE5M0X1gUcW6f7cAq', NULL, NULL, NULL, NULL, NULL, 'Trautmann', 'Cisternas', 'mi casa', '2021-07-15', '10', 'Role 2 | Jefe', 1, '2021-07-03 10:08:58', '2021-07-03 12:05:38'),
(3, 'Juan Pabl0 Alberto', 'rodrigo.garcia1601@alumnos.ubiobio.cl', '19.947.133-3', NULL, '$2y$10$LT6B6OzT/aMmQOfbaMtU2.GyAXDj8.aI943MTE5M0X1gUcW6f7cAq', NULL, NULL, NULL, NULL, NULL, 'Garcia', 'Trautmann', 'mi casa', '2021-07-15', '10', 'Role 3 | Usuario', 1, '2021-07-03 10:08:58', '2021-07-03 12:05:56'),
(4, 'asedqwe', '123@123.123456', '12312', NULL, '$2y$10$xI4NSk0fWwzdC41SYgPIBe.WI2UVVl6d2JcCA5aOGbtE6bKo/PcAG', NULL, NULL, NULL, NULL, NULL, 'asdaw', 'qwdqwe', 'qdqwwq', '2021-07-02', 'sdfsd', 'sdfsdf', 1, '2021-07-06 03:09:39', '2021-07-06 03:09:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `automovils`
--
ALTER TABLE `automovils`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudads`
--
ALTER TABLE `ciudads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudads_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `ciudad_cometidos`
--
ALTER TABLE `ciudad_cometidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudad_cometidos_ciudad_id_foreign` (`ciudad_id`),
  ADD KEY `ciudad_cometidos_cometido_id_foreign` (`cometido_id`);

--
-- Indices de la tabla `cometidos`
--
ALTER TABLE `cometidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cometidos_automovil_id_foreign` (`automovil_id`),
  ADD KEY `cometidos_item_presupuestario_id_foreign` (`item_presupuestario_id`),
  ADD KEY `cometidos_user_solicita_id_foreign` (`user_solicita_id`),
  ADD KEY `cometidos_user_jefe_id_foreign` (`user_jefe_id`),
  ADD KEY `cometidos_user_aprueba_id_foreign` (`user_aprueba_id`);

--
-- Indices de la tabla `conductors`
--
ALTER TABLE `conductors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conductors_automovil_id_foreign` (`automovil_id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `item_presupuestarios`
--
ALTER TABLE `item_presupuestarios`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_region_id_foreign` (`region_id`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
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
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_rut_unique` (`rut`),
  ADD KEY `users_dependencia_id_foreign` (`dependencia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `automovils`
--
ALTER TABLE `automovils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ciudads`
--
ALTER TABLE `ciudads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad_cometidos`
--
ALTER TABLE `ciudad_cometidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cometidos`
--
ALTER TABLE `cometidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductors`
--
ALTER TABLE `conductors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_presupuestarios`
--
ALTER TABLE `item_presupuestarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudads`
--
ALTER TABLE `ciudads`
  ADD CONSTRAINT `ciudads_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciudad_cometidos`
--
ALTER TABLE `ciudad_cometidos`
  ADD CONSTRAINT `ciudad_cometidos_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciudad_cometidos_cometido_id_foreign` FOREIGN KEY (`cometido_id`) REFERENCES `cometidos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cometidos`
--
ALTER TABLE `cometidos`
  ADD CONSTRAINT `cometidos_automovil_id_foreign` FOREIGN KEY (`automovil_id`) REFERENCES `automovils` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cometidos_item_presupuestario_id_foreign` FOREIGN KEY (`item_presupuestario_id`) REFERENCES `item_presupuestarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cometidos_user_aprueba_id_foreign` FOREIGN KEY (`user_aprueba_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cometidos_user_jefe_id_foreign` FOREIGN KEY (`user_jefe_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cometidos_user_solicita_id_foreign` FOREIGN KEY (`user_solicita_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `conductors`
--
ALTER TABLE `conductors`
  ADD CONSTRAINT `conductors_automovil_id_foreign` FOREIGN KEY (`automovil_id`) REFERENCES `automovils` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dependencia_id_foreign` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
