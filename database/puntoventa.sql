-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2025 a las 05:43:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arqueocaja`
--

CREATE TABLE `arqueocaja` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `idSucursal` bigint(20) DEFAULT NULL,
  `idUsuarioEntrega` bigint(20) NOT NULL,
  `idUsuarioVerifica` bigint(20) NOT NULL,
  `idUsuarioRecibe` bigint(20) NOT NULL,
  `fechaInicial` datetime DEFAULT NULL,
  `fechaFinal` datetime DEFAULT NULL,
  `importeInicial` decimal(18,0) NOT NULL,
  `importeVentasCredito` decimal(18,0) NOT NULL,
  `importeVentasContado` decimal(18,0) NOT NULL,
  `importeEfectivoContadoManual` decimal(18,0) NOT NULL,
  `observaciones` varchar(1024) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arqueocaja`
--

INSERT INTO `arqueocaja` (`id`, `idEmpresa`, `idSucursal`, `idUsuarioEntrega`, `idUsuarioVerifica`, `idUsuarioRecibe`, `fechaInicial`, `fechaFinal`, `importeInicial`, `importeVentasCredito`, `importeVentasContado`, `importeEfectivoContadoManual`, `observaciones`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, '2025-02-15 09:02:00', '2025-02-15 21:02:00', 150000, 0, 0, 0, '', '2025-02-15 21:03:07', '2025-02-15 21:03:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrators. The top of the food chain.'),
(2, 'member', 'Member everyday member.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@admin.com', 1, '2024-12-29 02:42:54', 1),
(2, '::1', 'admin@admin.com', 1, '2025-01-07 20:54:30', 1),
(3, '::1', 'admin@admin.com', 1, '2025-01-08 20:22:25', 1),
(4, '::1', 'admin@admin.com', 1, '2025-01-12 05:03:12', 1),
(5, '::1', 'admin', NULL, '2025-02-10 02:03:24', 0),
(6, '::1', 'admin@admin.com', 1, '2025-02-10 02:03:28', 1),
(7, '::1', 'admin@admin.com', 1, '2025-02-10 04:17:30', 1),
(8, '::1', 'admin@admin.com', 1, '2025-02-10 21:10:36', 1),
(9, '::1', 'admin@admin.com', 1, '2025-02-11 04:05:36', 1),
(10, '::1', 'admin@admin.com', 1, '2025-02-12 21:02:49', 1),
(11, '::1', 'admin@admin.com', 1, '2025-02-16 03:56:28', 1),
(12, '::1', 'admin@admin.com', 1, '2025-02-20 05:00:34', 1),
(13, '::1', 'admin@admin.com', 1, '2025-02-21 04:05:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'back-office', 'User can access to the administration panel.'),
(2, 'manage-user', 'User can create, delete or modify the users.'),
(3, 'role-permission', 'User can edit and define permissions for a role.'),
(4, 'menu-permission', 'User cand create, delete or modify the menu.'),
(5, 'log-permission', 'Permissions for logs'),
(6, 'empresas-permisos', 'Permissions for backups'),
(7, 'settings-permissions', 'Permissions for settings'),
(8, 'backups-permissions', 'Permissions for backups'),
(9, 'branchoffices-permission', 'Permissions for backups'),
(10, 'products-permission', 'Permissions for products'),
(11, 'categorias-permission', 'Permissions for products'),
(12, 'storages-permission', 'Permissions for storages'),
(13, 'proveedores-permission', 'Supplier catalog permission'),
(14, 'tipos_movimientos_inventario-permission', 'Permissions for types movement inventory'),
(15, 'custumers-permission', 'Permission for add, update and delete for custumers.'),
(16, 'inventory-permission', 'Permission to view inventory list'),
(17, 'quotes-permission', 'Permission to view quotes list'),
(18, 'comprobantes_rd-permission', 'Supplier Republic Dominican Invoices'),
(19, 'sells-permission', 'Permission to view sells list'),
(20, 'vehiculos-permission', 'Permission for Vehicles'),
(21, 'tipovehiculo-permission', 'Permission for Vehicles'),
(22, 'choferes-permission', 'Permission for drivers'),
(23, 'arqueocaja-permission', 'Cash Tonnage Permission'),
(24, 'xml-permission', 'CFDI XML CRUD ACCESS '),
(25, 'listapagos-permission', 'Permission to payment complement CFDI4.0'),
(26, 'seriesfacturaelectronica-permission', 'CFDI Electronic Series ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backups`
--

CREATE TABLE `backups` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `SQLFile` varchar(256) DEFAULT NULL,
  `uuid` varchar(36) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `backups`
--

INSERT INTO `backups` (`id`, `idEmpresa`, `description`, `SQLFile`, `uuid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Respaldo de 7 de enero del 2025', 'E:\\Fuentes\\puntoventa\\writable/database/backup/backup_puntoventa-2025-01-07_140317.sql', 'c2175d6d-21d7-4b53-938f-d0abe238cda5', '2025-01-07 14:03:17', '2025-01-07 14:03:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branchoffices`
--

CREATE TABLE `branchoffices` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(8) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cologne` varchar(64) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `postalCode` varchar(5) DEFAULT NULL,
  `timeDifference` varchar(4) DEFAULT NULL,
  `tax` varchar(4) DEFAULT NULL,
  `dateAp` date DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `companie` varchar(8) DEFAULT NULL,
  `arqueoCaja` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `branchoffices`
--

INSERT INTO `branchoffices` (`id`, `key`, `name`, `cologne`, `city`, `postalCode`, `timeDifference`, `tax`, `dateAp`, `phone`, `fax`, `companie`, `arqueoCaja`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CPR', 'Principal', 'Conocida', 'Los Mochis', '81110', '-1', '', '2025-01-08', '1234555', '', '1', 'off', '2025-01-08 13:36:52', '2025-01-08 13:36:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) DEFAULT NULL,
  `clave` varchar(8) DEFAULT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `idEmpresa`, `clave`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'RMM', 'Refacción', '2025-01-08 13:46:46', '2025-01-08 13:46:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) DEFAULT NULL,
  `nombre` varchar(512) DEFAULT NULL,
  `Apellido` varchar(512) DEFAULT NULL,
  `tipoFigura` varchar(8) DEFAULT NULL,
  `RFCFigura` varchar(16) DEFAULT NULL,
  `numLicencia` varchar(32) DEFAULT NULL,
  `MunicipioFigura` varchar(16) DEFAULT NULL,
  `EstadoFigura` varchar(8) DEFAULT NULL,
  `PaisFigura` varchar(32) DEFAULT NULL,
  `CodigoPostalFigura` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`id`, `idEmpresa`, `nombre`, `Apellido`, `tipoFigura`, `RFCFigura`, `numLicencia`, `MunicipioFigura`, `EstadoFigura`, `PaisFigura`, `CodigoPostalFigura`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Fulanito', 'Mengano', '01', '', '', 'null', 'null', 'null', '', '2025-02-12 14:21:02', '2025-02-12 14:21:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes_rd`
--

CREATE TABLE `comprobantes_rd` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `tipoDocumento` varchar(4) NOT NULL,
  `prefijo` varchar(8) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `folioInicial` int(11) NOT NULL,
  `folioFinal` int(11) NOT NULL,
  `folioActual` int(11) DEFAULT NULL,
  `desdeFecha` date NOT NULL,
  `hastaFecha` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custumers`
--

CREATE TABLE `custumers` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `razonSocial` varchar(512) DEFAULT NULL,
  `taxID` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `direction` varchar(1024) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `formaPago` varchar(16) DEFAULT NULL,
  `metodoPago` varchar(16) DEFAULT NULL,
  `usoCFDI` varchar(16) DEFAULT NULL,
  `codigoPostal` int(11) NOT NULL,
  `regimenFiscal` varchar(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `custumers`
--

INSERT INTO `custumers` (`id`, `idEmpresa`, `firstname`, `lastname`, `razonSocial`, `taxID`, `email`, `direction`, `birthdate`, `formaPago`, `metodoPago`, `usoCFDI`, `codigoPostal`, `regimenFiscal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Publico General', '', 'Publico General', 'XAXX010101000', 'asd@asdasd.com;dsasda@gmail.com', '', '2025-02-10 14:13:19', '01', 'PUE', 'S01', 0, '616', '2025-02-10 14:13:28', '2025-02-19 22:11:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `rfc` varchar(14) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correoElectronico` varchar(256) DEFAULT NULL,
  `diasEntrega` varchar(8) DEFAULT NULL,
  `caja` varchar(255) DEFAULT NULL,
  `logo` varchar(1024) DEFAULT NULL,
  `certificado` varchar(1024) DEFAULT NULL,
  `archivoKey` varchar(68) DEFAULT NULL,
  `contraCertificado` varchar(68) DEFAULT NULL,
  `regimenFiscal` varchar(68) DEFAULT NULL,
  `razonSocial` varchar(68) DEFAULT NULL,
  `codigoPostal` varchar(68) DEFAULT NULL,
  `CURP` varchar(68) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `host` varchar(128) DEFAULT NULL,
  `smtpDebug` varchar(32) DEFAULT NULL,
  `SMTPAuth` varchar(32) DEFAULT NULL,
  `smptSecurity` varchar(16) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `facturacionRD` varchar(4) NOT NULL,
  `certificadoCSD` varchar(1024) DEFAULT NULL,
  `archivoKeyCSD` varchar(1024) DEFAULT NULL,
  `contraCertificadoCSD` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `direccion`, `rfc`, `telefono`, `correoElectronico`, `diasEntrega`, `caja`, `logo`, `certificado`, `archivoKey`, `contraCertificado`, `regimenFiscal`, `razonSocial`, `codigoPostal`, `CURP`, `email`, `host`, `smtpDebug`, `SMTPAuth`, `smptSecurity`, `port`, `pass`, `facturacionRD`, `certificadoCSD`, `archivoKeyCSD`, `contraCertificadoCSD`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Contructora', 'Direccion', 'CACX7605101P8', 'Telefono', 'asd@asd.com', NULL, NULL, NULL, NULL, NULL, '', '626', 'XOCHILT CASAS CHAVEZ', '81110', '', '', '', '0', '0', 'null', 0, '', 'off', 'CACX7605101P8_certificadoCSD.cer', 'CACX7605101P8_certificadoCSD.key', '12345678a', '2024-12-28 20:05:27', '2025-02-19 22:17:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlacexml`
--

CREATE TABLE `enlacexml` (
  `id` int(11) UNSIGNED NOT NULL,
  `idDocumento` bigint(20) NOT NULL,
  `uuidXML` varchar(36) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `importe` decimal(18,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enlacexml`
--

INSERT INTO `enlacexml` (`id`, `idDocumento`, `uuidXML`, `tipo`, `importe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '17dcb47c-88c4-4e3c-aa6d-d338e13c8fcc', 'ven', 244, '2025-02-19 22:17:17', '2025-02-19 22:17:17', NULL),
(2, 3, '301175a9-f0cf-429d-904f-f002525a2361', 'ven', 244, '2025-02-20 21:08:51', '2025-02-20 21:08:51', NULL),
(3, 1, '61f1cf9d-7597-4540-8c6f-3724a5847340', 'pag', 244, '2025-02-20 21:14:57', '2025-02-20 21:14:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `groups_menu`
--

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 1, 8),
(12, 1, 9),
(13, 1, 10),
(15, 1, 11),
(16, 1, 12),
(18, 1, 13),
(19, 1, 14),
(20, 2, 14),
(21, 1, 15),
(22, 2, 15),
(23, 1, 16),
(24, 2, 16),
(25, 1, 17),
(26, 1, 18),
(27, 2, 18),
(28, 1, 19),
(29, 1, 20),
(30, 2, 20),
(31, 1, 21),
(32, 2, 21),
(35, 1, 23),
(36, 2, 23),
(37, 1, 22),
(38, 2, 22),
(39, 1, 24),
(40, 2, 24),
(41, 1, 25),
(42, 2, 25),
(43, 1, 26),
(44, 2, 26),
(45, 1, 27),
(46, 2, 27),
(47, 1, 28),
(48, 2, 28),
(49, 1, 29),
(50, 2, 29),
(51, 1, 30),
(52, 2, 30),
(53, 1, 31),
(54, 2, 31),
(55, 1, 32),
(56, 2, 32),
(57, 1, 33),
(58, 2, 33),
(59, 1, 34),
(60, 2, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idTipoInventario` int(11) DEFAULT NULL,
  `idStorage` int(11) DEFAULT NULL,
  `tipoES` varchar(3) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  `idUser` bigint(11) DEFAULT NULL,
  `listProducts` text DEFAULT NULL,
  `taxes` decimal(18,0) DEFAULT NULL,
  `IVARetenido` decimal(18,0) DEFAULT NULL,
  `ISRRetenido` decimal(18,0) DEFAULT NULL,
  `subTotal` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `balance` decimal(18,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateVen` date DEFAULT NULL,
  `quoteTo` varchar(512) DEFAULT NULL,
  `delivaryTime` varchar(512) DEFAULT NULL,
  `generalObservations` varchar(512) DEFAULT NULL,
  `UUID` varchar(36) DEFAULT NULL,
  `idOrdenCompra` int(11) DEFAULT NULL,
  `metodoPago` varchar(32) DEFAULT NULL,
  `formaPago` varchar(32) DEFAULT NULL,
  `razonSocialReceptor` varchar(1024) DEFAULT NULL,
  `codigoPostalReceptor` varchar(5) DEFAULT NULL,
  `regimenFiscalReceptor` varchar(32) DEFAULT NULL,
  `RFCReceptor` varchar(16) DEFAULT NULL,
  `usoCFDI` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`id`, `idEmpresa`, `idTipoInventario`, `idStorage`, `tipoES`, `idProveedor`, `folio`, `idUser`, `listProducts`, `taxes`, `IVARetenido`, `ISRRetenido`, `subTotal`, `total`, `balance`, `date`, `dateVen`, `quoteTo`, `delivaryTime`, `generalObservations`, `UUID`, `idOrdenCompra`, `metodoPago`, `formaPago`, `razonSocialReceptor`, `codigoPostalReceptor`, `regimenFiscalReceptor`, `RFCReceptor`, `usoCFDI`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'ENT', 1, 1, 1, '[{\"idProduct\":\"2\",\"lote\":\"\",\"description\":\"Martillo\",\"codeProduct\":\"RMM00002\",\"cant\":\"15\",\"price\":\"500\",\"porcentTax\":\"0\",\"tax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"0\",\"claveUnidadSAT\":\"0\",\"neto\":\"7500\",\"unidad\":\"PZA\",\"total\":\"7500\"}]', 0, 0, 0, 7500, 7500, 7500, '2025-02-10', '2025-02-10', NULL, '', '', 'cc790884-5a4a-4b3a-8d0e-939239c30ac6', NULL, 'null', 'null', '', '', 'null', '', 'null', '2025-02-10 14:19:29', '2025-02-10 14:19:31', NULL),
(2, 1, 3, 1, 'SAL', 1, 2, 1, '[{\"idProduct\":\"2\",\"lote\":\"\",\"description\":\"Martillo\",\"codeProduct\":\"RMM00002\",\"cant\":\"5\",\"price\":\"550\",\"porcentTax\":\"0\",\"tax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"0\",\"claveUnidadSAT\":\"0\",\"neto\":\"2750\",\"unidad\":\"PZA\",\"total\":\"2750\"}]', 0, 0, 0, 2750, 2750, 2750, '2025-02-10', '2025-02-10', NULL, '', '', 'ba0e16cb-4b84-4149-b7f9-2378532af91e', NULL, 'null', 'null', '', '', 'null', '', 'null', '2025-02-10 14:20:42', '2025-02-10 14:20:42', NULL),
(4, 1, 3, 1, 'SAL', 1, 3, 1, '[{\"idProduct\":\"2\",\"lote\":\"\",\"description\":\"Martillo\",\"codeProduct\":\"RMM00002\",\"cant\":\"10\",\"price\":\"0\",\"porcentTax\":\"0\",\"tax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"0\",\"claveUnidadSAT\":\"0\",\"neto\":\"0\",\"unidad\":\"PZA\",\"total\":\"0\"}]', 0, 0, 0, 0, 0, 0, '2025-02-10', '2025-02-10', NULL, '', '', '605bf747-8b2a-4187-8761-d2c3fb737864', NULL, 'null', 'null', '', '', 'null', '', 'null', '2025-02-10 14:21:30', '2025-02-10 14:21:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventorydetails`
--

CREATE TABLE `inventorydetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `idInventory` int(11) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `unidad` varchar(64) DEFAULT NULL,
  `claveProductoSAT` varchar(64) DEFAULT NULL,
  `claveUnidadSAT` varchar(64) DEFAULT NULL,
  `codeProduct` varchar(32) DEFAULT NULL,
  `lote` varchar(64) DEFAULT NULL,
  `cant` decimal(18,0) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `porcentTax` decimal(18,0) DEFAULT NULL,
  `porcentIVARetenido` decimal(18,0) DEFAULT NULL,
  `IVARetenido` decimal(18,0) DEFAULT NULL,
  `porcentISRRetenido` decimal(18,0) DEFAULT NULL,
  `ISRRetenido` decimal(18,0) DEFAULT NULL,
  `tax` decimal(18,0) DEFAULT NULL,
  `neto` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventorydetails`
--

INSERT INTO `inventorydetails` (`id`, `idInventory`, `idProduct`, `description`, `unidad`, `claveProductoSAT`, `claveUnidadSAT`, `codeProduct`, `lote`, `cant`, `price`, `porcentTax`, `porcentIVARetenido`, `IVARetenido`, `porcentISRRetenido`, `ISRRetenido`, `tax`, `neto`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 2, 'Martillo', 'PZA', '0', '0', 'RMM00002', '', 15, 500, 0, 0, 0, 0, 0, 0, 7500, 7500, '2025-02-10 14:19:31', '2025-02-10 14:19:31', NULL),
(3, 2, 2, 'Martillo', 'PZA', '0', '0', 'RMM00002', '', 5, 550, 0, 0, 0, 0, 0, 0, 2750, 2750, '2025-02-10 14:20:42', '2025-02-10 14:20:42', NULL),
(4, 4, 2, 'Martillo', 'PZA', '0', '0', 'RMM00002', '', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-02-10 14:21:30', '2025-02-10 14:21:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(256) NOT NULL,
  `user` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `description`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'The Company has been saved with the following data:{\"idEmpresa\":\"0\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"razonSocial\":\"Razon Social\",\"codigoPostal\":\"81110\",\"rfc\":\"RFC\",\"CURP\":\"\",\"regimenFis', 'admin', '2024-12-28 20:05:27', '2024-12-28 20:05:27', NULL),
(2, 'empresas.logUpdated{\"id\":\"1\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"rfc\":\"RFC\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"diasEntrega\":null,\"caja\":null,\"logo\":null,\"certificado\":null,\"archivoKey\":null,\"contraCertificado\":\"\",\"regimenF', 'admin', '2024-12-28 20:13:13', '2024-12-28 20:13:13', NULL),
(3, 'vehicles.logDescription{\"idBackups\":\"0\",\"idEmpresa\":\"1\",\"description\":\"Respaldo de 7 de enero del 2025\",\"SQLFile\":\"E:\\\\Fuentes\\\\puntoventa\\\\writable\\/database\\/backup\\/backup_puntoventa-2025-01-07_140317.sql\",\"uuid\":\"c2175d6d-21d7-4b53-938f-d0abe238cda5\"}', 'admin', '2025-01-07 14:03:17', '2025-01-07 14:03:17', NULL),
(4, 'vehicles.logDescription{\"idBranchoffices\":\"0\",\"key\":\"CPR\",\"name\":\"Principal\",\"cologne\":\"Conocida\",\"city\":\"Los Mochis\",\"postalCode\":\"81110\",\"timeDifference\":\"-1\",\"tax\":\"\",\"dateAp\":\"2025-01-08\",\"phone\":\"1234555\",\"fax\":\"\",\"companie\":\"1\",\"arqueoCaja\":\"off\"}', 'admin', '2025-01-08 13:36:52', '2025-01-08 13:36:52', NULL),
(5, 'vehicles.logDescription{\"idCategorias\":\"0\",\"descripcion\":\"Refacci\\u00f3n\",\"clave\":\"RMM\",\"idEmpresa\":\"1\"}', 'admin', '2025-01-08 13:46:46', '2025-01-08 13:46:46', NULL),
(6, 'vehicles.logDescription{\"idEmpresa\":\"1\",\"idProducts\":\"0\",\"code\":\"RMM00001\",\"idCategory\":\"1\",\"description\":\"Martillo de fierro\",\"stock\":\"15\",\"buyPrice\":\"150\",\"salePrice\":\"210\",\"porcentSale\":\"40\",\"porcentTax\":\"16\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido', 'admin', '2025-01-08 13:51:28', '2025-01-08 13:51:28', NULL),
(7, 'vehicles.logDescription{\"idStorages\":\"0\",\"code\":\"ALM\",\"name\":\"Almacen Los Mochis\",\"type\":\"\",\"brachoffice\":\"null\",\"company\":\"\",\"costCenter\":\"\",\"exist\":\"\",\"list\":\"\",\"main\":\"\",\"idEmpresa\":\"1\",\"inicioOperacion\":\"2025-01-11\"}', 'admin', '2025-01-11 22:04:46', '2025-01-11 22:04:46', NULL),
(8, 'vehicles.logDescription{\"idProveedor\":\"0\",\"idEmpresa\":\"1\",\"firstname\":\"Publico en General\",\"lastname\":\"asd\",\"taxID\":\"\",\"email\":\"asd\",\"direction\":\"\",\"birthdate\":\"2025-02-09T19:08:46\",\"metodoPago\":\"0\",\"formaPago\":\"0\",\"usoCFDI\":\"0\",\"codigoPostal\":\"81110\",\"reg', 'admin', '2025-02-09 19:09:08', '2025-02-09 19:09:08', NULL),
(9, 'vehicles.logDescription{\"idTipos_movimientos_inventario\":\"0\",\"idEmpresa\":\"1\",\"descripcion\":\"Entrada por compra\",\"tipo\":\"ENT\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:19:48', '2025-02-09 21:19:48', NULL),
(10, 'vehicles.logDescription{\"idTipos_movimientos_inventario\":\"0\",\"idEmpresa\":\"1\",\"descripcion\":\"Entrada por devoluci\\u00f3n de cliente\",\"tipo\":\"ENT\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:20:11', '2025-02-09 21:20:11', NULL),
(11, 'vehicles.logDescription{\"idTipos_movimientos_inventario\":\"0\",\"idEmpresa\":\"1\",\"descripcion\":\"Salida por venta\",\"tipo\":\"SAL\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:20:25', '2025-02-09 21:20:25', NULL),
(12, 'vehicles.logDescription{\"idTipos_movimientos_inventario\":\"0\",\"idEmpresa\":\"1\",\"descripcion\":\"Salida por Merma\",\"tipo\":\"SAL\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:20:45', '2025-02-09 21:20:45', NULL),
(13, 'vehicles.logDescription{\"idTipos_movimientos_inventario\":\"0\",\"idEmpresa\":\"1\",\"descripcion\":\"Salida por devoluci\\u00f3n a proveedor\",\"tipo\":\"SAL\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:21:08', '2025-02-09 21:21:08', NULL),
(14, 'tipos_movimientos_inventario.logUpdated{\"idTipos_movimientos_inventario\":\"4\",\"idEmpresa\":\"1\",\"descripcion\":\"Salida por Merma s\",\"tipo\":\"SAL\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:21:17', '2025-02-09 21:21:17', NULL),
(15, 'tipos_movimientos_inventario.logUpdated{\"idTipos_movimientos_inventario\":\"4\",\"idEmpresa\":\"1\",\"descripcion\":\"Salida por Merma\",\"tipo\":\"SAL\",\"esTraspaso\":\"No\"}', 'admin', '2025-02-09 21:21:25', '2025-02-09 21:21:25', NULL),
(16, 'vehicles.logDescription{\"idCustumers\":\"0\",\"idEmpresa\":\"1\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"taxID\":\"\",\"email\":\"asd\",\"direction\":\"\",\"birthdate\":\"2025-02-10T14:13:19\",\"metodoPago\":\"0\",\"formaPago\":\"0\",\"usoCFDI\":\"0\",\"codigoPostal\":\"\",\"regimenFiscal\":\"0\",\"raz', 'admin', '2025-02-10 14:13:28', '2025-02-10 14:13:28', NULL),
(17, 'vehicles.logDescription{\"idEmpresa\":\"1\",\"idProducts\":\"0\",\"code\":\"RMM00002\",\"idCategory\":\"1\",\"description\":\"Martillo\",\"stock\":\"0\",\"buyPrice\":\"\",\"salePrice\":\"\",\"porcentSale\":\"40\",\"porcentTax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"imagenProdu', 'admin', '2025-02-10 14:18:34', '2025-02-10 14:18:34', NULL),
(18, 'products.logUpdated{\"idEmpresa\":\"1\",\"idProducts\":\"2\",\"code\":\"RMM00002\",\"idCategory\":\"1\",\"description\":\"Martillo\",\"stock\":\"0\",\"buyPrice\":\"0\",\"salePrice\":\"0\",\"porcentSale\":\"40\",\"porcentTax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"imagenProduct', 'admin', '2025-02-10 14:19:01', '2025-02-10 14:19:01', NULL),
(19, 'products.logUpdated{\"idEmpresa\":\"1\",\"idProducts\":\"2\",\"code\":\"RMM00002\",\"idCategory\":\"1\",\"description\":\"Martillo\",\"stock\":\"0\",\"buyPrice\":\"0\",\"salePrice\":\"0\",\"porcentSale\":\"40\",\"porcentTax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"imagenProduct', 'admin', '2025-02-10 14:19:12', '2025-02-10 14:19:12', NULL),
(20, 'Se guardo la cotizacion con los siguientes datos{\"idProveedor\":\"1\",\"idEmpresa\":\"1\",\"idTipoInventario\":\"1\",\"idStorage\":\"1\",\"idQuote\":\"undefined\",\"folio\":1,\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"2\\\",\\\"lote\\\":\\\"\\\",\\\"description\\\":\\', 'admin', '2025-02-10 14:19:29', '2025-02-10 14:19:29', NULL),
(21, 'Se actualizo{\"idProveedor\":\"1\",\"idEmpresa\":\"1\",\"idTipoInventario\":\"1\",\"idStorage\":\"1\",\"idQuote\":\"undefined\",\"folio\":\"1\",\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"2\\\",\\\"lote\\\":\\\"\\\",\\\"description\\\":\\\"Martillo\\\",\\\"codeProduct\\\":\\\"RMM0', 'admin', '2025-02-10 14:19:31', '2025-02-10 14:19:31', NULL),
(22, 'Se guardo la cotizacion con los siguientes datos{\"idProveedor\":\"1\",\"idEmpresa\":\"1\",\"idTipoInventario\":\"3\",\"idStorage\":\"1\",\"idQuote\":\"undefined\",\"folio\":2,\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"2\\\",\\\"lote\\\":\\\"\\\",\\\"description\\\":\\', 'admin', '2025-02-10 14:20:42', '2025-02-10 14:20:42', NULL),
(23, 'Se guardo la cotizacion con los siguientes datos{\"idProveedor\":\"1\",\"idEmpresa\":\"1\",\"idTipoInventario\":\"3\",\"idStorage\":\"1\",\"idQuote\":\"undefined\",\"folio\":3,\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"2\\\",\\\"lote\\\":\\\"\\\",\\\"description\\\":\\', 'admin', '2025-02-10 14:21:30', '2025-02-10 14:21:30', NULL),
(24, 'Se guardo la cotizacion con los siguientes datos{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idSucursal\":\"1\",\"folio\":1,\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\"', 'admin', '2025-02-10 21:09:15', '2025-02-10 21:09:15', NULL),
(25, 'Se actualizo{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idSucursal\":\"1\",\"folio\":\"1\",\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"5\\\",\\\"price\\\":\\\"210\\\",\\\"porcent', 'admin', '2025-02-10 21:09:19', '2025-02-10 21:09:19', NULL),
(26, 'custumers.logUpdated{\"idCustumers\":\"1\",\"idEmpresa\":\"1\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"taxID\":\"\",\"email\":\"asd@asdasd.com,dsasda@gmail.com\",\"direction\":\"\",\"birthdate\":\"2025-02-10T14:13:19\",\"metodoPago\":\"0\",\"formaPago\":\"0\",\"usoCFDI\":\"0\",\"codigoPostal\":\"0', 'admin', '2025-02-10 21:10:36', '2025-02-10 21:10:36', NULL),
(27, 'custumers.logUpdated{\"idCustumers\":\"1\",\"idEmpresa\":\"1\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"taxID\":\"\",\"email\":\"asd@asdasd.com;dsasda@gmail.com\",\"direction\":\"\",\"birthdate\":\"2025-02-10T14:13:19\",\"metodoPago\":\"0\",\"formaPago\":\"0\",\"usoCFDI\":\"0\",\"codigoPostal\":\"0', 'admin', '2025-02-10 21:10:59', '2025-02-10 21:10:59', NULL),
(28, 'Se guardo la cotizacion con los siguientes datos{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idSucursal\":\"1\",\"folio\":2,\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\"', 'admin', '2025-02-10 21:24:57', '2025-02-10 21:24:57', NULL),
(29, 'Se actualizo{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idSucursal\":\"1\",\"folio\":\"2\",\"date\":\"2025-02-10\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"5\\\",\\\"price\\\":\\\"210\\\",\\\"porcent', 'admin', '2025-02-10 21:25:15', '2025-02-10 21:25:15', NULL),
(30, 'vehicles.logDescription{\"idTipovehiculo\":\"0\",\"idEmpresa\":\"1\",\"codigo\":\"CAR\",\"descripcion\":\"MOTO\"}', 'admin', '2025-02-12 14:16:58', '2025-02-12 14:16:58', NULL),
(31, 'vehicles.logDescription{\"idVehiculos\":\"0\",\"idEmpresa\":\"1\",\"idTipoVehiculo\":\"1\",\"descripcion\":\"Moto Italika DT110 2023\",\"placas\":\"12312\",\"permSCT\":\"0\",\"numPermisoSCT\":\"\",\"configVehicular\":\"0\",\"pesoBrutoVehicular\":\"\",\"anioModelo\":\"\",\"aseguraRespCivil\":\"\",\"po', 'admin', '2025-02-12 14:18:25', '2025-02-12 14:18:25', NULL),
(32, 'vehicles.logDescription{\"idChoferes\":\"0\",\"idEmpresa\":\"1\",\"nombre\":\"Fulanito\",\"Apellido\":\"Mengano\",\"tipoFigura\":\"01\",\"RFCFigura\":\"\",\"numLicencia\":\"\",\"CodigoPostalFigura\":\"\",\"PaisFigura\":\"null\",\"EstadoFigura\":\"null\",\"MunicipioFigura\":\"null\"}', 'admin', '2025-02-12 14:21:02', '2025-02-12 14:21:02', NULL),
(33, 'vehicles.logDescription{\"idArqueoCaja\":\"0\",\"idEmpresa\":\"1\",\"idSucursal\":\"1\",\"idUsuarioEntrega\":\"1\",\"idUsuarioVerifica\":\"1\",\"idUsuarioRecibe\":\"1\",\"fechaInicial\":\"2025-02-15T09:02\",\"fechaFinal\":\"2025-02-15T21:02\",\"importeInicial\":\"150000\",\"importeVentasCredi', 'admin', '2025-02-15 21:03:07', '2025-02-15 21:03:07', NULL),
(34, 'Se guardo la cotizacion con los siguientes datos{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"0\",\"folio\":1,\"date\":\"2025-02-15\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"', 'admin', '2025-02-15 21:14:51', '2025-02-15 21:14:51', NULL),
(35, 'Se actualizo{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"0\",\"folio\":\"1\",\"date\":\"2025-02-15\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"1\\\",\\\"price\\\":\\\"210\\\",\\\"porcentTax', 'admin', '2025-02-15 21:14:55', '2025-02-15 21:14:55', NULL),
(36, 'vehicles.logDescription{\"UUID\":\"2444c545-09c6-4dcb-98d2-79889941daba\",\"importPayment\":\"50\",\"importBack\":\"0\",\"datePayment\":\"2025-02-15\",\"metodoPago\":\"1\",\"observaciones\":\"\",\"idSell\":\"1\"}', 'admin', '2025-02-15 21:15:26', '2025-02-15 21:15:26', NULL),
(37, 'vehicles.logDescription{\"idSeriesfacturaelectronica\":\"0\",\"idEmpresa\":\"1\",\"sucursal\":\"1\",\"tipoSerie\":\"ven\",\"serie\":\"A\",\"desdeFecha\":\"2025-02-01\",\"hastaFecha\":\"2025-02-28\",\"desdeFolio\":\"1\",\"hastaFolio\":\"50\",\"ambienteTimbrado\":\"off\",\"tokenPruebas\":\"\",\"tokenPr', 'admin', '2025-02-15 21:19:51', '2025-02-15 21:19:51', NULL),
(38, 'empresas.logUpdated{\"id\":\"1\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"rfc\":\"RFC\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"diasEntrega\":null,\"caja\":null,\"logo\":null,\"certificado\":null,\"archivoKey\":null,\"contraCertificado\":\"\",\"regimenF', 'admin', '2025-02-19 22:07:07', '2025-02-19 22:07:07', NULL),
(39, 'seriesfacturaelectronica.logUpdated{\"idSeriesfacturaelectronica\":\"1\",\"idEmpresa\":\"1\",\"sucursal\":\"1\",\"tipoSerie\":\"ven\",\"serie\":\"A\",\"desdeFecha\":\"2025-02-01\",\"hastaFecha\":\"2025-02-28\",\"desdeFolio\":\"1\",\"hastaFolio\":\"50\",\"ambienteTimbrado\":\"off\",\"tokenPruebas\"', 'admin', '2025-02-19 22:09:30', '2025-02-19 22:09:30', NULL),
(40, 'custumers.logUpdated{\"idCustumers\":\"1\",\"idEmpresa\":\"1\",\"firstname\":\"Publico General\",\"lastname\":\"\",\"taxID\":\"XAXX010101000\",\"email\":\"asd@asdasd.com;dsasda@gmail.com\",\"direction\":\"\",\"birthdate\":\"2025-02-10T14:13:19\",\"metodoPago\":\"PUE\",\"formaPago\":\"01\",\"usoCF', 'admin', '2025-02-19 22:11:44', '2025-02-19 22:11:44', NULL),
(41, 'products.logUpdated{\"idEmpresa\":\"1\",\"idProducts\":\"2\",\"code\":\"RMM00002\",\"idCategory\":\"1\",\"description\":\"Martillo\",\"stock\":\"0\",\"buyPrice\":\"0\",\"salePrice\":\"0\",\"porcentSale\":\"40\",\"porcentTax\":\"0\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"imagenProduct', 'admin', '2025-02-19 22:15:03', '2025-02-19 22:15:03', NULL),
(42, 'Se guardo la cotizacion con los siguientes datos{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"0\",\"folio\":2,\"date\":\"2025-02-19\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"', 'admin', '2025-02-19 22:16:10', '2025-02-19 22:16:10', NULL),
(43, 'empresas.logUpdated{\"id\":\"1\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"rfc\":\"CACX7605101P8\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"diasEntrega\":null,\"caja\":null,\"logo\":null,\"certificado\":null,\"archivoKey\":null,\"contraCertificado\":\"\"', 'admin', '2025-02-19 22:17:08', '2025-02-19 22:17:08', NULL),
(44, 'Se guardo la cotizacion con los siguientes datos{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"0\",\"folio\":3,\"date\":\"2025-02-20\",\"idUser\":\"1\",\"listProducts\":\"[{\\\"idProduct\\\":\\\"1\\\",\\\"description\\\":\\\"Martillo de fierro\\\",\\\"codeProduct\\\":\\\"RMM00001\\\",\\\"cant\\\":\\\"', 'admin', '2025-02-20 21:08:45', '2025-02-20 21:08:45', NULL),
(45, 'Se guardo el pago con los siguientes datos{\"idComplemento\":1,\"idSell\":\"3\",\"importPayment\":\"244\",\"importBack\":\"0.00\",\"datePayment\":\"2025-02-20\"}', 'admin', '2025-02-20 21:10:57', '2025-02-20 21:10:57', NULL),
(46, 'Se hizo el pago{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"undefined\",\"folio\":\"1\",\"date\":\"2025-02-20\",\"idUser\":\"1\",\"listPagos\":\"[{\\\"idSell\\\":\\\"3\\\",\\\"serie\\\":\\\"A\\\",\\\"folio\\\":\\\"3\\\",\\\"fecha\\\":\\\"2025-02-20\\\",\\\"fechaVen\\\":\\\"2025-02-20\\\",\\\"saldo\\\":\\\"244\\\",\\\"tot', 'admin', '2025-02-20 21:12:09', '2025-02-20 21:12:09', NULL),
(47, 'Se hizo el pago{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"undefined\",\"folio\":\"1\",\"date\":\"2025-02-20\",\"idUser\":\"1\",\"listPagos\":\"[{\\\"idSell\\\":\\\"3\\\",\\\"serie\\\":\\\"A\\\",\\\"folio\\\":\\\"3\\\",\\\"fecha\\\":\\\"2025-02-20\\\",\\\"fechaVen\\\":\\\"2025-02-20\\\",\\\"saldo\\\":\\\"244\\\",\\\"tot', 'admin', '2025-02-20 21:12:31', '2025-02-20 21:12:31', NULL),
(48, 'vehicles.logDescription{\"idSeriesfacturaelectronica\":\"0\",\"idEmpresa\":\"1\",\"sucursal\":\"1\",\"tipoSerie\":\"pag\",\"serie\":\"p\",\"desdeFecha\":\"2025-02-01\",\"hastaFecha\":\"2025-02-28\",\"desdeFolio\":\"0\",\"hastaFolio\":\"999\",\"ambienteTimbrado\":\"off\",\"tokenPruebas\":\"T2lYQ0t4L', 'admin', '2025-02-20 21:13:49', '2025-02-20 21:13:49', NULL),
(49, 'seriesfacturaelectronica.logUpdated{\"idSeriesfacturaelectronica\":\"2\",\"idEmpresa\":\"1\",\"sucursal\":\"1\",\"tipoSerie\":\"pag\",\"serie\":\"p\",\"desdeFecha\":\"2025-02-01\",\"hastaFecha\":\"2025-02-28\",\"desdeFolio\":\"1\",\"hastaFolio\":\"999\",\"ambienteTimbrado\":\"off\",\"tokenPruebas', 'admin', '2025-02-20 21:14:15', '2025-02-20 21:14:15', NULL),
(50, 'Se hizo el pago{\"idCustumer\":\"1\",\"idEmpresa\":\"1\",\"idQuote\":\"undefined\",\"folio\":\"1\",\"date\":\"2025-02-20\",\"idUser\":\"1\",\"listPagos\":\"[{\\\"idSell\\\":\\\"3\\\",\\\"serie\\\":\\\"A\\\",\\\"folio\\\":\\\"3\\\",\\\"fecha\\\":\\\"2025-02-20\\\",\\\"fechaVen\\\":\\\"2025-02-20\\\",\\\"saldo\\\":\\\"244\\\",\\\"tot', 'admin', '2025-02-20 21:14:49', '2025-02-20 21:14:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(55) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fas fa-tachometer-alt', 'admin', 1, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(2, 0, 1, 'User Management', 'fas fa-user', '#', 21, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(3, 2, 1, 'User Profile', 'fas fa-user-edit', 'admin/user/profile', 22, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(4, 2, 1, 'Users', 'fas fa-users', 'admin/user/manage', 23, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(5, 2, 1, 'Permissions', 'fas fa-user-lock', 'admin/permission', 24, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(6, 2, 1, 'Roles', 'fas fa-users-cog', 'admin/role', 25, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(7, 2, 1, 'Menu', 'fas fa-stream', 'admin/menu', 26, '2024-12-29 02:37:20', '2025-02-16 04:10:44'),
(8, 0, 1, 'Configuraciones', 'fas fa-cogs', '#', 27, '2024-12-29 02:51:11', '2025-02-16 04:10:44'),
(9, 8, 1, 'Bitacora', 'fas fa-bars', 'admin/log', 28, '2024-12-29 02:52:31', '2025-02-16 04:10:44'),
(10, 8, 1, 'Empresas', 'fas fa-building', 'admin/empresas', 29, '2024-12-29 02:53:54', '2025-02-16 04:10:44'),
(11, 8, 1, 'Globales', 'fas fa-globe-asia', 'admin/settings', 30, '2024-12-29 03:08:09', '2025-02-16 04:10:44'),
(12, 8, 1, 'Respaldos', 'fas fa-database', 'admin/backups', 31, '2025-01-07 21:02:47', '2025-02-16 04:10:44'),
(13, 8, 1, 'Sucursales', 'fas fa-hotel', 'admin/branchoffices', 32, '2025-01-08 20:32:40', '2025-02-16 04:10:44'),
(14, 0, 1, 'Inventarios', 'fas fa-boxes', '#', 9, '2025-01-08 20:44:50', '2025-02-16 04:10:44'),
(15, 14, 1, 'Categorias', 'fas fa-list', 'admin/categorias', 10, '2025-01-08 20:45:56', '2025-02-16 04:10:44'),
(16, 14, 1, 'Productos', 'fas fa-box-open', 'admin/products', 11, '2025-01-08 20:48:02', '2025-02-16 04:10:44'),
(17, 14, 1, 'Almacenes', 'fas fa-store-alt', 'admin/storages', 12, '2025-01-12 05:03:59', '2025-02-16 04:10:44'),
(18, 14, 1, 'Proveedores', 'fas fa-user-friends', 'admin/proveedores', 13, '2025-02-10 02:08:36', '2025-02-16 04:10:44'),
(19, 14, 1, 'Tipos de movimiento', 'fas fa-adjust', 'admin/tipos_movimientos_inventario', 14, '2025-02-10 04:19:17', '2025-02-16 04:10:44'),
(20, 14, 1, 'Clientes', 'fas fa-users', 'admin/custumers', 15, '2025-02-10 21:13:12', '2025-02-16 04:10:44'),
(21, 14, 1, 'Inventarios', 'fas fa-box-open', 'admin/inventory', 16, '2025-02-10 21:16:34', '2025-02-16 04:10:44'),
(22, 0, 1, 'Cotizaciones', 'fas fa-book-reader', '#', 2, '2025-02-11 04:06:37', '2025-02-16 04:10:44'),
(23, 22, 1, 'Lista Cotizaciones', 'fas fa-headset', 'admin/quotes', 3, '2025-02-11 04:07:22', '2025-02-16 04:10:44'),
(24, 0, 1, 'Ventas', 'fab fa-sellcast', '#', 4, '2025-02-12 21:03:48', '2025-02-16 04:10:44'),
(25, 24, 1, 'Lista de Ventas', 'fas fa-list', 'admin/sells', 5, '2025-02-12 21:12:01', '2025-02-16 04:10:44'),
(26, 0, 1, 'Vehiculos', 'fas fa-shuttle-van', '#', 17, '2025-02-12 21:15:08', '2025-02-16 04:10:44'),
(27, 26, 1, 'Tipo Vehiculo', 'fas fa-list', 'admin/tipovehiculo', 18, '2025-02-12 21:16:24', '2025-02-16 04:10:44'),
(28, 26, 1, 'Lista de Vehiculos', 'fas fa-car', 'admin/vehiculos', 19, '2025-02-12 21:17:36', '2025-02-16 04:10:44'),
(29, 26, 1, 'Lista de Choferes', 'fas fa-users', 'admin/choferes', 20, '2025-02-12 21:20:40', '2025-02-16 04:10:44'),
(30, 24, 1, 'Arqueo de Caja', 'fas fa-clipboard-check', 'admin/arqueoCaja', 6, '2025-02-16 04:01:27', '2025-02-16 04:10:44'),
(31, 0, 1, 'Factura CFDI', 'fas fa-stamp', '#', 7, '2025-02-16 04:09:41', '2025-02-16 04:10:44'),
(32, 31, 1, 'Lista CFDI', 'fas fa-file-pdf', 'admin/xml', 8, '2025-02-16 04:10:29', '2025-02-16 04:10:44'),
(33, 24, 1, 'List Comp Pago', 'fas fa-list', 'admin/listCompPag', 33, '2025-02-16 04:13:44', '2025-02-16 04:13:44'),
(34, 8, 1, 'Series Electronicas CFDI', 'fas fa-vote-yea', 'admin/seriesfacturaelectronica', 34, '2025-02-16 04:19:14', '2025-02-16 04:19:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1735439840, 1),
(2, '2020-02-03-081118', 'App\\Database\\Migrations\\CreateMenuTable', 'default', 'App', 1735439840, 1),
(3, '2023-02-02-193406', 'App\\Database\\Migrations\\Userfields', 'default', 'App', 1735439840, 1),
(4, '2024-03-15100147', 'App\\Database\\Migrations\\Log', 'default', 'App', 1735440481, 2),
(5, '2023-05-30192621', 'App\\Database\\Migrations\\Usuariosempresa', 'default', 'App', 1735440511, 3),
(6, '2024-11-24203351', 'App\\Database\\Migrations\\Empresas', 'default', 'App', 1735440511, 3),
(7, '2024-11-12164212', 'App\\Database\\Migrations\\settings', 'default', 'App', 1735441635, 4),
(8, '2024-10-18122114', 'App\\Database\\Migrations\\Backups', 'default', 'App', 1736283640, 5),
(9, '2023-02-14110147', 'App\\Database\\Migrations\\Branchoffices', 'default', 'App', 1736368236, 6),
(10, '2023-09-06192623', 'App\\Database\\Migrations\\UsuariosSucursal', 'default', 'App', 1736368236, 6),
(11, '2023-04-20051528', 'App\\Database\\Migrations\\Categorias', 'default', 'App', 1736368959, 7),
(12, '2024-11-30120819', 'App\\Database\\Migrations\\Products', 'default', 'App', 1736368959, 7),
(13, '2023-04-28180544', 'App\\Database\\Migrations\\Storages', 'default', 'App', 1736658067, 8),
(14, '2023-05-30192622', 'App\\Database\\Migrations\\UsuariosAlmacen', 'default', 'App', 1736658067, 8),
(15, '2023-04-21063336', 'App\\Database\\Migrations\\Proveedores', 'default', 'App', 1739153182, 9),
(16, '2023-08-17222335', 'App\\Database\\Migrations\\Tipos_movimientos_inventario', 'default', 'App', 1739160722, 10),
(17, '2024-12-02125006', 'App\\Database\\Migrations\\Custumers', 'default', 'App', 1739221812, 11),
(18, '2023-08-31154316', 'App\\Database\\Migrations\\Saldos', 'default', 'App', 1739222063, 12),
(19, '2024-12-10105631', 'App\\Database\\Migrations\\Inventory', 'default', 'App', 1739222063, 12),
(20, '2024-12-10105950', 'App\\Database\\Migrations\\Inventorydetails', 'default', 'App', 1739222063, 12),
(21, '2024-12-18093124', 'App\\Database\\Migrations\\Quotes', 'default', 'App', 1739246622, 13),
(22, '2024-12-18093224', 'App\\Database\\Migrations\\Quotesdetails', 'default', 'App', 1739246622, 13),
(23, '2024-12-19164526', 'App\\Database\\Migrations\\Comprobantes_rd', 'default', 'App', 1739394548, 14),
(24, '2024-12-19120652', 'App\\Database\\Migrations\\Sells', 'default', 'App', 1739394591, 15),
(25, '2024-12-19120724', 'App\\Database\\Migrations\\Sellsdetails', 'default', 'App', 1739394591, 15),
(26, '2024-12-23162520', 'App\\Database\\Migrations\\Enlacexml', 'default', 'App', 1739394591, 15),
(27, '2024-12-23163302', 'App\\Database\\Migrations\\Payments', 'default', 'App', 1739394591, 15),
(28, '2024-12-20170324', 'App\\Database\\Migrations\\Vehiculos', 'default', 'App', 1739394834, 16),
(29, '2024-12-23092915', 'App\\Database\\Migrations\\Tipovehiculo', 'default', 'App', 1739394834, 16),
(30, '2024-12-23122832', 'App\\Database\\Migrations\\Choferes', 'default', 'App', 1739395146, 17),
(31, '2024-12-23173343', 'App\\Database\\Migrations\\Arqueocaja', 'default', 'App', 1739678386, 18),
(32, '2025-01-16123331', 'App\\Database\\Migrations\\Xml', 'default', 'App', 1739678878, 19),
(33, '2025-01-28101227', 'App\\Database\\Migrations\\Pagos', 'default', 'App', 1739679145, 20),
(34, '2025-01-21101209', 'App\\Database\\Migrations\\Seriesfacturaelectronica', 'default', 'App', 1739679479, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) DEFAULT NULL,
  `idSucursal` bigint(20) DEFAULT NULL,
  `idCustumer` bigint(20) DEFAULT NULL,
  `folio` bigint(20) DEFAULT NULL,
  `idUser` bigint(20) DEFAULT NULL,
  `listPagos` text DEFAULT NULL,
  `taxes` decimal(18,0) DEFAULT NULL,
  `IVARetenido` decimal(18,0) DEFAULT NULL,
  `ISRRetenido` decimal(18,0) DEFAULT NULL,
  `subTotal` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `balance` decimal(18,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateVen` date DEFAULT NULL,
  `quoteTo` varchar(512) DEFAULT NULL,
  `delivaryTime` varchar(512) DEFAULT NULL,
  `generalObservations` varchar(512) DEFAULT NULL,
  `UUID` varchar(36) DEFAULT NULL,
  `idQuote` int(11) DEFAULT NULL,
  `tipoComprobanteRD` int(11) DEFAULT NULL,
  `folioCombrobanteRD` bigint(11) DEFAULT NULL,
  `RFCReceptor` varchar(15) DEFAULT NULL,
  `usoCFDI` varchar(32) DEFAULT NULL,
  `metodoPago` varchar(32) DEFAULT NULL,
  `formaPago` varchar(32) DEFAULT NULL,
  `regimenFiscalReceptor` varchar(1024) DEFAULT NULL,
  `razonSocialReceptor` varchar(1024) DEFAULT NULL,
  `codigoPostalReceptor` varchar(5) DEFAULT NULL,
  `idVehiculo` bigint(20) DEFAULT NULL,
  `idChofer` bigint(20) DEFAULT NULL,
  `tipoVehiculo` bigint(20) DEFAULT NULL,
  `idArqueoCaja` bigint(20) DEFAULT NULL,
  `noCTAOrdenante` varchar(64) DEFAULT NULL,
  `noCTABeneficiario` varchar(64) DEFAULT NULL,
  `RFCCTAOrdenante` varchar(64) DEFAULT NULL,
  `RFCCTABeneficiario` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `idEmpresa`, `idSucursal`, `idCustumer`, `folio`, `idUser`, `listPagos`, `taxes`, `IVARetenido`, `ISRRetenido`, `subTotal`, `total`, `balance`, `date`, `dateVen`, `quoteTo`, `delivaryTime`, `generalObservations`, `UUID`, `idQuote`, `tipoComprobanteRD`, `folioCombrobanteRD`, `RFCReceptor`, `usoCFDI`, `metodoPago`, `formaPago`, `regimenFiscalReceptor`, `razonSocialReceptor`, `codigoPostalReceptor`, `idVehiculo`, `idChofer`, `tipoVehiculo`, `idArqueoCaja`, `noCTAOrdenante`, `noCTABeneficiario`, `RFCCTAOrdenante`, `RFCCTABeneficiario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, '[{\"idSell\":\"3\",\"serie\":\"A\",\"folio\":\"3\",\"fecha\":\"2025-02-20\",\"fechaVen\":\"2025-02-20\",\"saldo\":\"244\",\"total\":\"244\",\"importeAPagar\":\"244\"}]', 0, 0, 0, 0, 244, NULL, '2025-02-20', '2025-02-20', '', '', '', '40aecd31-0a48-466a-ba56-92ce996e7c54', 0, NULL, NULL, 'XAXX010101000', 'CP01', 'PUE', '04', '616', 'Publico General', '81110', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2025-02-20 21:10:57', '2025-02-20 21:14:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `idSell` bigint(20) NOT NULL,
  `importPayment` decimal(18,0) NOT NULL,
  `importBack` decimal(18,0) NOT NULL,
  `datePayment` datetime NOT NULL,
  `metodPayment` varchar(32) NOT NULL,
  `idComplemento` bigint(20) NOT NULL,
  `observaciones` varchar(2048) DEFAULT NULL,
  `idNotaCredito` bigint(20) DEFAULT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `idSell`, `importPayment`, `importBack`, `datePayment`, `metodPayment`, `idComplemento`, `observaciones`, `idNotaCredito`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 50, 0, '2025-02-15 00:00:00', '', 0, '', NULL, NULL, '2025-02-15 21:15:26', '2025-02-15 21:15:26', NULL),
(5, 3, 244, 0, '2025-02-20 00:00:00', '', 1, NULL, NULL, NULL, '2025-02-20 21:14:49', '2025-02-20 21:14:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `barcode` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `stock` decimal(18,0) DEFAULT NULL,
  `validateStock` varchar(4) DEFAULT NULL,
  `inventarioRiguroso` varchar(4) NOT NULL,
  `buyPrice` decimal(18,0) DEFAULT NULL,
  `salePrice` decimal(18,0) DEFAULT NULL,
  `porcentSale` int(11) DEFAULT NULL,
  `porcentTax` int(11) DEFAULT NULL,
  `porcentIVARetenido` decimal(18,0) DEFAULT NULL,
  `porcentISRRetenido` decimal(18,0) DEFAULT NULL,
  `routeImage` varchar(256) DEFAULT NULL,
  `unidadSAT` varchar(32) DEFAULT NULL,
  `claveProductoSAT` varchar(32) DEFAULT NULL,
  `nombreUnidadSAT` varchar(64) DEFAULT NULL,
  `nombreClaveProducto` varchar(256) DEFAULT NULL,
  `unidad` varchar(64) NOT NULL,
  `tasaExcenta` varchar(16) DEFAULT NULL,
  `inmuebleOcupado` varchar(16) DEFAULT NULL,
  `predial` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `idEmpresa`, `idCategory`, `code`, `barcode`, `description`, `stock`, `validateStock`, `inventarioRiguroso`, `buyPrice`, `salePrice`, `porcentSale`, `porcentTax`, `porcentIVARetenido`, `porcentISRRetenido`, `routeImage`, `unidadSAT`, `claveProductoSAT`, `nombreUnidadSAT`, `nombreClaveProducto`, `unidad`, `tasaExcenta`, `inmuebleOcupado`, `predial`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'RMM00001', '3215765', 'Martillo de fierro', 12, 'on', 'off', 150, 210, 40, 16, 0, 0, '', 'H87', '27111618', 'H87 Pieza', '27111618 Martillo de garra', 'PZA', 'off', 'on', '', '2025-01-08 13:51:28', '2025-02-20 21:08:45', NULL),
(2, 1, 1, 'RMM00002', '123123', 'Martillo', 0, 'on', 'on', 0, 0, 40, 0, 0, 0, '', 'H87', '27111602', 'H87 Pieza', '27111602 Martillos', 'PZA', 'on', 'off', '', '2025-02-10 14:18:34', '2025-02-19 22:15:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` varchar(128) DEFAULT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `razonSocial` varchar(512) DEFAULT NULL,
  `taxID` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `direction` varchar(1024) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `formaPago` varchar(16) DEFAULT NULL,
  `metodoPago` varchar(16) DEFAULT NULL,
  `usoCFDI` varchar(16) DEFAULT NULL,
  `codigoPostal` int(11) UNSIGNED NOT NULL,
  `regimenFiscal` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `idEmpresa`, `firstname`, `lastname`, `razonSocial`, `taxID`, `email`, `direction`, `birthdate`, `formaPago`, `metodoPago`, `usoCFDI`, `codigoPostal`, `regimenFiscal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Publico en General', 'asd', '', '', 'asd', '', '2025-02-09 19:08:46', '0', '0', '0', 81110, '0', '2025-02-09 19:09:08', '2025-02-09 19:09:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idSucursal` bigint(20) NOT NULL,
  `folio` int(11) NOT NULL,
  `idCustumer` int(11) DEFAULT NULL,
  `idUser` bigint(11) DEFAULT NULL,
  `listProducts` text DEFAULT NULL,
  `taxes` decimal(18,0) DEFAULT NULL,
  `subTotal` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateVen` date DEFAULT NULL,
  `quoteTo` varchar(512) DEFAULT NULL,
  `delivaryTime` varchar(512) DEFAULT NULL,
  `generalObservations` varchar(512) DEFAULT NULL,
  `UUID` varchar(36) DEFAULT NULL,
  `IVARetenido` decimal(18,0) NOT NULL,
  `ISRRetenido` decimal(18,0) NOT NULL,
  `idSell` bigint(20) NOT NULL,
  `RFCReceptor` varchar(16) DEFAULT NULL,
  `usoCFDI` varchar(32) DEFAULT NULL,
  `metodoPago` varchar(32) DEFAULT NULL,
  `formaPago` varchar(32) DEFAULT NULL,
  `razonSocialReceptor` varchar(1024) DEFAULT NULL,
  `codigoPostalReceptor` varchar(5) DEFAULT NULL,
  `regimenFiscalReceptor` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id`, `idEmpresa`, `idSucursal`, `folio`, `idCustumer`, `idUser`, `listProducts`, `taxes`, `subTotal`, `total`, `date`, `dateVen`, `quoteTo`, `delivaryTime`, `generalObservations`, `UUID`, `IVARetenido`, `ISRRetenido`, `idSell`, `RFCReceptor`, `usoCFDI`, `metodoPago`, `formaPago`, `razonSocialReceptor`, `codigoPostalReceptor`, `regimenFiscalReceptor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, '[{\"idProduct\":\"1\",\"description\":\"Martillo de fierro\",\"codeProduct\":\"RMM00001\",\"cant\":\"5\",\"price\":\"210\",\"porcentTax\":\"16\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"claveProductoSAT\":\"27111618\",\"claveUnidadSAT\":\"H87\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"lote\":\"\",\"idAlmacen\":\"0\",\"tax\":\"168\",\"neto\":\"1218\",\"unidad\":\"PZA\",\"total\":\"1050\"}]', 168, 1050, 1218, '2025-02-10', '2025-02-10', '', '', '', 'f6fe2121-f69e-42ab-9a8e-b4a36a01ff2f', 0, 0, 0, '', 'null', 'null', 'null', '', '0', '', '2025-02-10 21:09:15', '2025-02-10 21:09:19', NULL),
(2, 1, 1, 2, 1, 1, '[{\"idProduct\":\"1\",\"description\":\"Martillo de fierro\",\"codeProduct\":\"RMM00001\",\"cant\":\"5\",\"price\":\"210\",\"porcentTax\":\"16\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"claveProductoSAT\":\"27111618\",\"claveUnidadSAT\":\"H87\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"lote\":\"\",\"idAlmacen\":\"0\",\"tax\":\"168\",\"neto\":\"1218\",\"unidad\":\"PZA\",\"total\":\"1050\"}]', 168, 1050, 1218, '2025-02-10', '2025-02-10', '', '', '', 'fdfa40f2-91bb-41f5-a408-e34aae0248eb', 0, 0, 0, '', 'null', 'null', 'null', '', '0', '', '2025-02-10 21:24:57', '2025-02-10 21:25:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotesdetails`
--

CREATE TABLE `quotesdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `idQuote` bigint(20) DEFAULT NULL,
  `idAlmacen` bigint(20) DEFAULT NULL,
  `lote` varchar(64) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `claveProductoSAT` varchar(64) NOT NULL,
  `claveUnidadSAT` varchar(64) NOT NULL,
  `codeProduct` varchar(32) DEFAULT NULL,
  `cant` decimal(18,0) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `porcentTax` decimal(18,0) DEFAULT NULL,
  `tax` decimal(18,0) DEFAULT NULL,
  `porcentIVARetenido` decimal(18,0) DEFAULT NULL,
  `IVARetenido` decimal(18,0) DEFAULT NULL,
  `porcentISRRetenido` decimal(18,0) DEFAULT NULL,
  `ISRRetenido` decimal(18,0) DEFAULT NULL,
  `neto` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `unidad` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quotesdetails`
--

INSERT INTO `quotesdetails` (`id`, `idQuote`, `idAlmacen`, `lote`, `idProduct`, `description`, `claveProductoSAT`, `claveUnidadSAT`, `codeProduct`, `cant`, `price`, `porcentTax`, `tax`, `porcentIVARetenido`, `IVARetenido`, `porcentISRRetenido`, `ISRRetenido`, `neto`, `total`, `unidad`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 0, '', 1, 'Martillo de fierro', '27111618', 'H87', 'RMM00001', 5, 210, 16, 168, 0, 0, 0, 0, 1218, 1050, 'PZA', '2025-02-10 21:09:19', '2025-02-10 21:09:19', NULL),
(4, 2, 0, '', 1, 'Martillo de fierro', '27111618', 'H87', 'RMM00001', 5, 210, 16, 168, 0, 0, 0, 0, 1218, 1050, 'PZA', '2025-02-10 21:25:15', '2025-02-10 21:25:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldos`
--

CREATE TABLE `saldos` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `idAlmacen` bigint(20) NOT NULL,
  `lote` varchar(128) NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `codigoProducto` varchar(64) NOT NULL,
  `descripcion` varchar(1024) NOT NULL,
  `cantidad` decimal(18,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `saldos`
--

INSERT INTO `saldos` (`id`, `idEmpresa`, `idAlmacen`, `lote`, `idProducto`, `codigoProducto`, `descripcion`, `cantidad`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, '', 2, '', '', 0, '2025-02-10 14:19:31', '2025-02-10 14:19:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sells`
--

CREATE TABLE `sells` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idSucursal` bigint(20) NOT NULL,
  `idCustumer` int(11) DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  `idUser` bigint(11) DEFAULT NULL,
  `listProducts` text DEFAULT NULL,
  `taxes` decimal(18,0) DEFAULT NULL,
  `subTotal` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `balance` decimal(18,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateVen` date DEFAULT NULL,
  `quoteTo` varchar(512) DEFAULT NULL,
  `delivaryTime` varchar(512) DEFAULT NULL,
  `generalObservations` varchar(512) DEFAULT NULL,
  `UUID` varchar(36) DEFAULT NULL,
  `idQuote` int(11) DEFAULT NULL,
  `IVARetenido` decimal(18,0) NOT NULL,
  `ISRRetenido` decimal(18,0) NOT NULL,
  `tipoComprobanteRD` varchar(4) NOT NULL,
  `folioComprobanteRD` bigint(20) NOT NULL,
  `RFCReceptor` varchar(16) DEFAULT NULL,
  `usoCFDI` varchar(32) DEFAULT NULL,
  `metodoPago` varchar(32) DEFAULT NULL,
  `formaPago` varchar(32) DEFAULT NULL,
  `razonSocialReceptor` varchar(1024) DEFAULT NULL,
  `codigoPostalReceptor` varchar(5) DEFAULT NULL,
  `regimenFiscalReceptor` varchar(32) NOT NULL,
  `idVehiculo` bigint(20) DEFAULT NULL,
  `idChofer` bigint(20) DEFAULT NULL,
  `tipoVehiculo` varchar(64) DEFAULT NULL,
  `idArqueoCaja` bigint(20) DEFAULT NULL,
  `esFacturaGlobal` varchar(8) DEFAULT NULL,
  `periodicidad` varchar(8) DEFAULT NULL,
  `mes` varchar(8) DEFAULT NULL,
  `anio` varchar(4) DEFAULT NULL,
  `tasaCero` decimal(18,0) DEFAULT NULL,
  `tipoDocumentoRelacionado` varchar(5) DEFAULT NULL,
  `UUIDRelacion` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sells`
--

INSERT INTO `sells` (`id`, `idEmpresa`, `idSucursal`, `idCustumer`, `folio`, `idUser`, `listProducts`, `taxes`, `subTotal`, `total`, `balance`, `date`, `dateVen`, `quoteTo`, `delivaryTime`, `generalObservations`, `UUID`, `idQuote`, `IVARetenido`, `ISRRetenido`, `tipoComprobanteRD`, `folioComprobanteRD`, `RFCReceptor`, `usoCFDI`, `metodoPago`, `formaPago`, `razonSocialReceptor`, `codigoPostalReceptor`, `regimenFiscalReceptor`, `idVehiculo`, `idChofer`, `tipoVehiculo`, `idArqueoCaja`, `esFacturaGlobal`, `periodicidad`, `mes`, `anio`, `tasaCero`, `tipoDocumentoRelacionado`, `UUIDRelacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, '[{\"idProduct\":\"1\",\"description\":\"Martillo de fierro\",\"codeProduct\":\"RMM00001\",\"cant\":\"1\",\"price\":\"210\",\"porcentTax\":\"16\",\"tax\":\"33.6\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"27111618\",\"claveUnidadSAT\":\"H87\",\"lote\":\"\",\"idAlmacen\":\"0\",\"importeExento\":0,\"valorTasaExenta\":\"off\",\"predial\":\"\",\"neto\":\"243.6\",\"unidad\":\"PZA\",\"total\":\"210\"}]', 34, 210, 244, 194, '2025-02-15', '2025-02-15', '', '', '', '2444c545-09c6-4dcb-98d2-79889941daba', 0, 0, 0, '', 0, '', 'null', 'null', 'null', '', '0', 'null', 0, 0, '', 0, 'off', '0', '0', '', 0, '0', '', '2025-02-15 21:14:51', '2025-02-15 21:14:55', NULL),
(2, 1, 1, 1, 2, 1, '[{\"idProduct\":\"1\",\"description\":\"Martillo de fierro\",\"codeProduct\":\"RMM00001\",\"cant\":\"1\",\"price\":\"210\",\"porcentTax\":\"16\",\"tax\":\"33.6\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"27111618\",\"claveUnidadSAT\":\"H87\",\"lote\":\"\",\"idAlmacen\":\"0\",\"importeExento\":0,\"valorTasaExenta\":\"off\",\"predial\":\"\",\"neto\":\"243.6\",\"unidad\":\"PZA\",\"total\":\"210\"}]', 34, 210, 244, 244, '2025-02-19', '2025-02-19', '', '', '', 'd3f22259-4885-4bb2-87c3-b0fe083c30ad', 0, 0, 0, '', 0, 'XAXX010101000', 'S01', 'PUE', '01', 'Publico General0', '81110', '616', 0, 0, '', 0, 'off', '0', '0', '', 0, '0', '', '2025-02-19 22:16:10', '2025-02-19 22:16:10', NULL),
(3, 1, 1, 1, 3, 1, '[{\"idProduct\":\"1\",\"description\":\"Martillo de fierro\",\"codeProduct\":\"RMM00001\",\"cant\":\"1\",\"price\":\"210\",\"porcentTax\":\"16\",\"tax\":\"33.6\",\"porcentIVARetenido\":\"0\",\"porcentISRRetenido\":\"0\",\"IVARetenido\":\"0\",\"ISRRetenido\":\"0\",\"claveProductoSAT\":\"27111618\",\"claveUnidadSAT\":\"H87\",\"lote\":\"\",\"idAlmacen\":\"0\",\"importeExento\":0,\"valorTasaExenta\":\"off\",\"predial\":\"\",\"neto\":\"243.6\",\"unidad\":\"PZA\",\"total\":\"210\"}]', 34, 210, 244, 0, '2025-02-20', '2025-02-20', '', '', '', '9d201dff-c790-497a-b3e9-a1d856ca1f1d', 0, 0, 0, '', 0, 'XAXX010101000', 'S01', 'PPD', '99', 'Publico General', '81110', '616', 0, 0, '', 0, 'off', '0', '0', '', 0, '0', '', '2025-02-20 21:08:45', '2025-02-20 21:14:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellsdetails`
--

CREATE TABLE `sellsdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `idSell` int(11) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `lote` varchar(64) DEFAULT NULL,
  `idAlmacen` bigint(20) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `claveProductoSAT` varchar(64) NOT NULL,
  `claveUnidadSAT` varchar(64) NOT NULL,
  `codeProduct` varchar(32) DEFAULT NULL,
  `cant` decimal(18,0) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `porcentTax` decimal(18,0) DEFAULT NULL,
  `tax` decimal(18,0) DEFAULT NULL,
  `porcentIVARetenido` decimal(18,0) DEFAULT NULL,
  `IVARetenido` decimal(18,0) DEFAULT NULL,
  `porcentISRRetenido` decimal(18,0) DEFAULT NULL,
  `ISRRetenido` decimal(18,0) DEFAULT NULL,
  `neto` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `unidad` varchar(64) NOT NULL,
  `tasaCero` varchar(16) DEFAULT NULL,
  `importeExento` decimal(18,0) DEFAULT NULL,
  `predial` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sellsdetails`
--

INSERT INTO `sellsdetails` (`id`, `idSell`, `idProduct`, `lote`, `idAlmacen`, `description`, `claveProductoSAT`, `claveUnidadSAT`, `codeProduct`, `cant`, `price`, `porcentTax`, `tax`, `porcentIVARetenido`, `IVARetenido`, `porcentISRRetenido`, `ISRRetenido`, `neto`, `total`, `unidad`, `tasaCero`, `importeExento`, `predial`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, '', 0, 'Martillo de fierro', '27111618', 'H87', 'RMM00001', 1, 210, 16, 34, 0, 0, 0, 0, 244, 210, 'PZA', NULL, NULL, NULL, '2025-02-15 21:14:55', '2025-02-15 21:14:55', NULL),
(3, 2, 1, '', 0, 'Martillo de fierro', '27111618', 'H87', 'RMM00001', 1, 210, 16, 34, 0, 0, 0, 0, 244, 210, 'PZA', NULL, 0, '', '2025-02-19 22:16:10', '2025-02-19 22:16:10', NULL),
(4, 3, 1, '', 0, 'Martillo de fierro', '27111618', 'H87', 'RMM00001', 1, 210, 16, 34, 0, 0, 0, 0, 244, 210, 'PZA', NULL, 0, '', '2025-02-20 21:08:45', '2025-02-20 21:08:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seriesfacturaelectronica`
--

CREATE TABLE `seriesfacturaelectronica` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `sucursal` bigint(20) NOT NULL,
  `tipoSerie` varchar(16) NOT NULL,
  `serie` varchar(16) NOT NULL,
  `desdeFecha` date NOT NULL,
  `hastaFecha` date NOT NULL,
  `desdeFolio` bigint(20) NOT NULL,
  `hastaFolio` bigint(20) NOT NULL,
  `ambienteTimbrado` varchar(32) NOT NULL,
  `tokenPruebas` text NOT NULL,
  `tokenProduccion` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seriesfacturaelectronica`
--

INSERT INTO `seriesfacturaelectronica` (`id`, `idEmpresa`, `sucursal`, `tipoSerie`, `serie`, `desdeFecha`, `hastaFecha`, `desdeFolio`, `hastaFolio`, `ambienteTimbrado`, `tokenPruebas`, `tokenProduccion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'ven', 'A', '2025-02-01', '2025-02-28', 1, 50, 'off', 'T2lYQ0t4L0RHVkR4dHZ5Nkk1VHNEakZ3Y0J4Nk9GODZuRyt4cE1wVm5tbXB3YVZxTHdOdHAwVXY2NTdJb1hkREtXTzE3dk9pMmdMdkFDR2xFWFVPUXpTUm9mTG1ySXdZbFNja3FRa0RlYURqbzdzdlI2UUx1WGJiKzViUWY2dnZGbFloUDJ6RjhFTGF4M1BySnJ4cHF0YjUvbmRyWWpjTkVLN3ppd3RxL0dJPQ.T2lYQ0t4L0RHVkR4dHZ5Nkk1VHNEakZ3Y0J4Nk9GODZuRyt4cE1wVm5tbFlVcU92YUJTZWlHU3pER1kySnlXRTF4alNUS0ZWcUlVS0NhelhqaXdnWTRncklVSWVvZlFZMWNyUjVxYUFxMWFxcStUL1IzdGpHRTJqdS9Zakw2UGQrNzJ3UWh4TVVxb0g3TU5KV0Q2Um5rb2VpQlZibFk2b3JLeURxQmU5TGhudldsdjExeGpvaDBEQVZYWUhWTE5nKzh5MENnVm9MRjNwRE5MU0xuOWtRdTNGMktEajgrSlVtcVNPbWpLSE9hajJCZC9zOFBEOVp3VG9BbFRaMkFsSHl4ZkoxSWlQYnRERi9kTCtaMkhWeHROSmlUemxHbEhHbDBIMEdueTh0ZmtSOHUwMVNaempVNnlDNTRLRzhxNmU5VlpIdlhJVDMyZ2V2aDVvQzNjRW1YUFVJeXdHcmdvUmhBdVhCS0xyYi9aR0svYXBBZEtPSHViZFlQeDNBMkZzUzNvZjNKREp5WnZ5S01FbXBZdUoyc052RkZxSXpVT2tvbzQwcm9QSmxEM2RvWmlZTUJDd0hJcVZiaWZkdmlxMGpMWVgwcFYySWVnSGsrbjlpQnpSSHlXR1RmL2EwdUZQeCtwT3BuSUlQTkJXbmc5N1E2d2lxdkhpSVA0bWdKbG4.miJMOQwDK9yCxuT9lYfVjB0kkTP42bU1m84zCuTHyR0', '', '2025-02-15 21:19:51', '2025-02-19 22:09:30', NULL),
(2, 1, 1, 'pag', 'p', '2025-02-01', '2025-02-28', 1, 999, 'off', 'T2lYQ0t4L0RHVkR4dHZ5Nkk1VHNEakZ3Y0J4Nk9GODZuRyt4cE1wVm5tbXB3YVZxTHdOdHAwVXY2NTdJb1hkREtXTzE3dk9pMmdMdkFDR2xFWFVPUXpTUm9mTG1ySXdZbFNja3FRa0RlYURqbzdzdlI2UUx1WGJiKzViUWY2dnZGbFloUDJ6RjhFTGF4M1BySnJ4cHF0YjUvbmRyWWpjTkVLN3ppd3RxL0dJPQ.T2lYQ0t4L0RHVkR4dHZ5Nkk1VHNEakZ3Y0J4Nk9GODZuRyt4cE1wVm5tbFlVcU92YUJTZWlHU3pER1kySnlXRTF4alNUS0ZWcUlVS0NhelhqaXdnWTRncklVSWVvZlFZMWNyUjVxYUFxMWFxcStUL1IzdGpHRTJqdS9Zakw2UGQrNzJ3UWh4TVVxb0g3TU5KV0Q2Um5rb2VpQlZibFk2b3JLeURxQmU5TGhudldsdjExeGpvaDBEQVZYWUhWTE5nKzh5MENnVm9MRjNwRE5MU0xuOWtRdTNGMktEajgrSlVtcVNPbWpLSE9hajJCZC9zOFBEOVp3VG9BbFRaMkFsSHl4ZkoxSWlQYnRERi9kTCtaMkhWeHROSmlUemxHbEhHbDBIMEdueTh0ZmtSOHUwMVNaempVNnlDNTRLRzhxNmU5VlpIdlhJVDMyZ2V2aDVvQzNjRW1YUFVJeXdHcmdvUmhBdVhCS0xyYi9aR0svYXBBZEtPSHViZFlQeDNBMkZzUzNvZjNKREp5WnZ5S01FbXBZdUoyc052RkZxSXpVT2tvbzQwcm9QSmxEM2RvWmlZTUJDd0hJcVZiaWZkdmlxMGpMWVgwcFYySWVnSGsrbjlpQnpSSHlXR1RmL2EwdUZQeCtwT3BuSUlQTkJXbmc5N1E2d2lxdkhpSVA0bWdKbG4.miJMOQwDK9yCxuT9lYfVjB0kkTP42bU1m84zCuTHyR0', '', '2025-02-20 21:13:49', '2025-02-20 21:14:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `nameCompanie` varchar(256) DEFAULT NULL,
  `idTax` varchar(256) DEFAULT NULL,
  `phoneNumber` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `direction` varchar(256) DEFAULT NULL,
  `languaje` varchar(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `nameCompanie`, `idTax`, `phoneNumber`, `email`, `direction`, `languaje`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Name Corporation', 'DNI', 'Phone number', 'email@d.com', '123', 'es', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `storages`
--

CREATE TABLE `storages` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` varchar(16) DEFAULT NULL,
  `code` varchar(16) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `brachoffice` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `costCenter` int(11) DEFAULT NULL,
  `exist` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `main` varchar(16) DEFAULT NULL,
  `inicioOperacion` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `storages`
--

INSERT INTO `storages` (`id`, `idEmpresa`, `code`, `name`, `type`, `brachoffice`, `company`, `costCenter`, `exist`, `list`, `main`, `inicioOperacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'ALM', 'Almacen Los Mochis', '', 0, 0, 0, 0, 0, '', '2025-01-11', '2025-01-11 22:04:46', '2025-01-11 22:04:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempproducts`
--

CREATE TABLE `tempproducts` (
  `id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(64) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `validateStock` varchar(4) DEFAULT NULL,
  `inventarioRiguroso` varchar(4) NOT NULL DEFAULT '',
  `description` varchar(512) DEFAULT NULL,
  `stock` decimal(18,0) DEFAULT NULL,
  `buyPrice` decimal(18,0) DEFAULT NULL,
  `salePrice` decimal(18,0) DEFAULT NULL,
  `porcentSale` int(11) DEFAULT NULL,
  `porcentTax` int(11) DEFAULT NULL,
  `routeImage` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `barcode` varchar(64) DEFAULT NULL,
  `unidad` varchar(64) NOT NULL DEFAULT '',
  `nombreEmpresa` varchar(500) NOT NULL DEFAULT '',
  `porcentIVARetenido` decimal(18,0) DEFAULT NULL,
  `porcentISRRetenido` decimal(18,0) DEFAULT NULL,
  `nombreUnidadSAT` varchar(64) DEFAULT NULL,
  `nombreClaveProducto` varchar(256) DEFAULT NULL,
  `unidadSAT` varchar(32) DEFAULT NULL,
  `lote` varchar(128) NOT NULL DEFAULT '',
  `idAlmacen` bigint(20) NOT NULL DEFAULT 0,
  `almacen` varchar(256) DEFAULT NULL,
  `claveProductoSAT` varchar(32) DEFAULT NULL,
  `tasaExcenta` varchar(16) DEFAULT NULL,
  `predial` varchar(32) DEFAULT NULL,
  `inmuebleOcupado` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tempproducts`
--

INSERT INTO `tempproducts` (`id`, `code`, `idCategory`, `validateStock`, `inventarioRiguroso`, `description`, `stock`, `buyPrice`, `salePrice`, `porcentSale`, `porcentTax`, `routeImage`, `created_at`, `deleted_at`, `updated_at`, `barcode`, `unidad`, `nombreEmpresa`, `porcentIVARetenido`, `porcentISRRetenido`, `nombreUnidadSAT`, `nombreClaveProducto`, `unidadSAT`, `lote`, `idAlmacen`, `almacen`, `claveProductoSAT`, `tasaExcenta`, `predial`, `inmuebleOcupado`) VALUES
(1, 'RMM00001', 1, 'on', 'off', 'Martillo de fierro', 13, 150, 210, 40, 16, '', '2025-01-08 13:51:28', NULL, '2025-02-19 22:16:10', '3215765', 'PZA', 'Contructora', 0, 0, 'H87 Pieza', '27111618 Martillo de garra', 'H87', '', 0, '', '27111618', 'off', '', 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_movimientos_inventario`
--

CREATE TABLE `tipos_movimientos_inventario` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `tipo` varchar(3) DEFAULT NULL,
  `esTraspaso` varchar(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_movimientos_inventario`
--

INSERT INTO `tipos_movimientos_inventario` (`id`, `idEmpresa`, `descripcion`, `tipo`, `esTraspaso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Entrada por compra', 'ENT', 'No', '2025-02-09 21:19:48', '2025-02-09 21:19:48', NULL),
(2, 1, 'Entrada por devolución de cliente', 'ENT', 'No', '2025-02-09 21:20:11', '2025-02-09 21:20:11', NULL),
(3, 1, 'Salida por venta', 'SAL', 'No', '2025-02-09 21:20:25', '2025-02-09 21:20:25', NULL),
(4, 1, 'Salida por Merma', 'SAL', 'No', '2025-02-09 21:20:45', '2025-02-09 21:21:25', NULL),
(5, 1, 'Salida por devolución a proveedor', 'SAL', 'No', '2025-02-09 21:21:08', '2025-02-09 21:21:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  `codigo` varchar(16) DEFAULT NULL,
  `descripcion` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`id`, `idEmpresa`, `codigo`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'CAR', 'MOTO', '2025-02-12 14:16:58', '2025-02-12 14:16:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `firstname`, `lastname`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$pwECHaJ0o7/8.cxhpKIgNeI7L29uRftMzcUi9Wcz3W6McrfmoJHFm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-12-29 02:37:20', '2024-12-29 02:37:20', NULL, NULL, NULL),
(2, 'user@user.com', 'user', '$2y$10$H27MIKrRexJ06NWpSqe0VOvcBZisWUd6cBKSBi7.m8qOQd.39FoJ6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-12-29 02:37:20', '2024-12-29 02:37:20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosempresa`
--

CREATE TABLE `usuariosempresa` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariosempresa`
--

INSERT INTO `usuariosempresa` (`id`, `idEmpresa`, `idUsuario`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'on', '2024-12-28 20:05:27', '2024-12-28 20:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_almacen`
--

CREATE TABLE `usuarios_almacen` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idStorage` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_almacen`
--

INSERT INTO `usuarios_almacen` (`id`, `idEmpresa`, `idStorage`, `idUsuario`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'on', '2025-01-11 22:05:09', '2025-01-11 22:05:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_sucursal`
--

CREATE TABLE `usuarios_sucursal` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idSucursal` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_sucursal`
--

INSERT INTO `usuarios_sucursal` (`id`, `idEmpresa`, `idSucursal`, `idUsuario`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'on', '2025-01-08 13:37:06', '2025-01-08 13:37:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) DEFAULT NULL,
  `idTipoVehiculo` bigint(20) DEFAULT NULL,
  `descripcion` varchar(512) DEFAULT NULL,
  `placas` varchar(16) DEFAULT NULL,
  `permSCT` varchar(64) DEFAULT NULL,
  `numPermisoSCT` varchar(64) DEFAULT NULL,
  `configVehicular` varchar(256) DEFAULT NULL,
  `pesoBrutoVehicular` varchar(16) DEFAULT NULL,
  `anioModelo` varchar(8) DEFAULT NULL,
  `aseguraRespCivil` varchar(8) DEFAULT NULL,
  `polizaRespCivil` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `idEmpresa`, `idTipoVehiculo`, `descripcion`, `placas`, `permSCT`, `numPermisoSCT`, `configVehicular`, `pesoBrutoVehicular`, `anioModelo`, `aseguraRespCivil`, `polizaRespCivil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Moto Italika DT110 2023', '12312', '0', '', '0', '', '', '', '', '2025-02-12 14:18:25', '2025-02-12 14:18:25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xml`
--

CREATE TABLE `xml` (
  `id` int(11) UNSIGNED NOT NULL,
  `uuidTimbre` varchar(36) DEFAULT NULL,
  `archivoXML` text DEFAULT NULL,
  `serie` varchar(256) DEFAULT NULL,
  `folio` varchar(256) DEFAULT NULL,
  `rfcEmisor` varchar(16) DEFAULT NULL,
  `rfcReceptor` varchar(16) DEFAULT NULL,
  `nombreEmisor` varchar(256) DEFAULT NULL,
  `tipoComprobante` varchar(18) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `fechaTimbrado` datetime NOT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `uuidPaquete` varchar(36) NOT NULL,
  `nombreReceptor` varchar(256) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `metodoPago` varchar(8) DEFAULT NULL,
  `formaPago` varchar(8) DEFAULT NULL,
  `usoCFDI` varchar(8) DEFAULT NULL,
  `exportacion` varchar(4) DEFAULT NULL,
  `emitidoRecibido` varchar(32) DEFAULT NULL,
  `base16` decimal(18,0) DEFAULT NULL,
  `totalImpuestos16` decimal(18,0) DEFAULT NULL,
  `base8` decimal(18,0) DEFAULT NULL,
  `totalImpuestos8` decimal(18,0) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tasaExenta` decimal(18,0) DEFAULT NULL,
  `motivoCancelacion` varchar(8) DEFAULT NULL,
  `uuidRelacionado` varchar(64) DEFAULT NULL,
  `observacionesCancelacion` varchar(2056) DEFAULT NULL,
  `acuseCancelacion` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `xml`
--

INSERT INTO `xml` (`id`, `uuidTimbre`, `archivoXML`, `serie`, `folio`, `rfcEmisor`, `rfcReceptor`, `nombreEmisor`, `tipoComprobante`, `fecha`, `fechaTimbrado`, `total`, `uuidPaquete`, `nombreReceptor`, `idEmpresa`, `metodoPago`, `formaPago`, `usoCFDI`, `exportacion`, `emitidoRecibido`, `base16`, `totalImpuestos16`, `base8`, `totalImpuestos8`, `status`, `tasaExenta`, `motivoCancelacion`, `uuidRelacionado`, `observacionesCancelacion`, `acuseCancelacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '17dcb47c-88c4-4e3c-aa6d-d338e13c8fcc', '<?xml version=\"1.0\" encoding=\"utf-8\"?><cfdi:Comprobante xmlns:cfdi=\"http://www.sat.gob.mx/cfd/4\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sat.gob.mx/cfd/4 http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd\" Version=\"4.0\" Serie=\"A\" Folio=\"2\" Fecha=\"2025-02-19T22:17:12\" FormaPago=\"01\" SubTotal=\"210.00\" Total=\"243.60\" Moneda=\"MXN\" TipoDeComprobante=\"I\" MetodoPago=\"PUE\" LugarExpedicion=\"81110\" Exportacion=\"01\" Sello=\"JuNoNmImQcq1JnHt5NiUi2uTWmqB8scfYe0OLFkCw9iAyH0wxGZ0X565tvhg2WdTou6/k5kTM+2RTxdyMQg3JWMNPBwoJIeodNJ88DWfYY6xQUNUn49J6oHCXZdqOViVAHiYkgdVrzAriuAwN5hltMtMPcBvqIulYFqc5PdiOhJ2DNUo8fd+upv7TnxQu+v8HYoIBkrXqQ3WXLcpY6ut07I/HCud5XCBU+IM/rqlxIVZ8+qbEUq5AkPuxfdwDNQoV+ui0h9TtxBhKfdFNiPqqtR0grsG2a15L1d67YWTmIDK1iil0MWa97VrpEFzjPH+Xpe/swzlgm1Afziv+Cyl+w==\" NoCertificado=\"30001000000500003316\" Certificado=\"MIIFfzCCA2egAwIBAgIUMzAwMDEwMDAwMDA1MDAwMDMzMTYwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWxpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMjMwNTA5MjEzNzM2WhcNMjcwNTA5MjEzNzM2WjCBpjEdMBsGA1UEAxMUWE9DSElMVCBDQVNBUyBDSEFWRVoxHTAbBgNVBCkTFFhPQ0hJTFQgQ0FTQVMgQ0hBVkVaMR0wGwYDVQQKExRYT0NISUxUIENBU0FTIENIQVZFWjEWMBQGA1UELRMNQ0FDWDc2MDUxMDFQODEbMBkGA1UEBRMSQ0FDWDc2MDUxME1HVFNIQzA0MRIwEAYDVQQLEwlTdWNpcnNhIDEwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCWEIhEVVC/mNpXWaUFpN0+QuHRsJcFc4C3qJQaHdmzlmWBB8DnCJrYB+fbLQu/QHo+W/JctMANXN9xljxX5nPK7GHDWm6kN/U4UtOi49kSt1Au2rnfTInpuvwvBVflW+tBI4y472TPO9wCD0+aS6T8RN6KFfw/NlUJDCEeICSohNIxbzCYg4OOf/pnSComvC1T7lyyJeGGwXwv8v43Wk5RQGiBnOuN9ZtKoyPLO7QFb+aGmZ0aAhSCMaCEiIlMinedSqBH2og780dH7Zsd5f3mNS0AbJ9xfr2DNkBj7qz7DcgnJT2KsSmtP1IkXUB+OkivXo1nzyr1VKpDloIWBPa7AgMBAAGjHTAbMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMA0GCSqGSIb3DQEBCwUAA4ICAQChJcU8iKvcRAOx0xoNilj5z2rby1DeGF39bVk0tuWlMgdmxnWznMPAAZqMxmM6bxO+3xJ2eIKcD6+vgWF9ErJV/kNNIoDan5SulFzN/KT128IapZeELQzSEwViKE2Tgd0q7P3aG/8leI2AqfJXIq3yN+28t+iSnDWQoq5AK57CtrEMwkPAJ+BTniYYbeaVysGG82HgNUNAwp0yzb+amkj+DxCdFQrWNZmDqmroJnWZJzeXy2Uxfce2ju3dlXr1w6qr/3CsnZXeH6gRsUmtOgf0hPciQHocr2BsX7iPabT3nzXNuQyeuVqySOkTIWdKrFcythwKTKVRAJLN3mbCG88hGNgu2uusyQc+q9dz0AYkdHcn1bK4wAKMySk2vCN+eD9W+MFX5jT3X/cO4ZRa7ddDhtzWKVRdtoxlCC/JcobOItyE+l2KuzYkDs6pTjBIfBEvzNcZhbmfGsjzkmG7zSYlZxJsjtcEdeT6FUq1yHYewGZZ2wdd+FUu/CLe2DnL2i4NQx82psmb3qGvgNIhxwVzrQ5BLD+Kxi8syd6TyMSEQHywxYOYsJIk/fnp1syK9Mpq1zmp+FWvqlLuXrdv5wipPvce5SmS0BSObn2ymQdfZ0aexnGoQ+FPDpIKww6nP71ROH7jAYPFrO4SpStVKikvb8dcGzf/UcpEswKeS8c/uw==\"><cfdi:Emisor Nombre=\"XOCHILT CASAS CHAVEZ\" Rfc=\"CACX7605101P8\" RegimenFiscal=\"626\" /><cfdi:Receptor Rfc=\"XAXX010101000\" Nombre=\"Publico General0\" DomicilioFiscalReceptor=\"81110\" RegimenFiscalReceptor=\"616\" UsoCFDI=\"S01\" /><cfdi:Conceptos><cfdi:Concepto ClaveProdServ=\"27111618\" Cantidad=\"1\" ClaveUnidad=\"H87\" Unidad=\"PZA\" Descripcion=\"Martillo de fierro\" ValorUnitario=\"210\" Importe=\"210.00\" ObjetoImp=\"02\"><cfdi:Impuestos><cfdi:Traslados><cfdi:Traslado Base=\"210.00\" Impuesto=\"002\" TipoFactor=\"Tasa\" TasaOCuota=\"0.160000\" Importe=\"33.60\" /></cfdi:Traslados></cfdi:Impuestos></cfdi:Concepto></cfdi:Conceptos><cfdi:Impuestos TotalImpuestosTrasladados=\"33.60\"><cfdi:Traslados><cfdi:Traslado Impuesto=\"002\" TipoFactor=\"Tasa\" TasaOCuota=\"0.160000\" Importe=\"33.60\" Base=\"210.00\" /></cfdi:Traslados></cfdi:Impuestos><cfdi:Complemento><tfd:TimbreFiscalDigital xsi:schemaLocation=\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd\" Version=\"1.1\" UUID=\"17dcb47c-88c4-4e3c-aa6d-d338e13c8fcc\" FechaTimbrado=\"2025-02-19T23:17:16\" RfcProvCertif=\"SPR190613I52\" SelloCFD=\"JuNoNmImQcq1JnHt5NiUi2uTWmqB8scfYe0OLFkCw9iAyH0wxGZ0X565tvhg2WdTou6/k5kTM+2RTxdyMQg3JWMNPBwoJIeodNJ88DWfYY6xQUNUn49J6oHCXZdqOViVAHiYkgdVrzAriuAwN5hltMtMPcBvqIulYFqc5PdiOhJ2DNUo8fd+upv7TnxQu+v8HYoIBkrXqQ3WXLcpY6ut07I/HCud5XCBU+IM/rqlxIVZ8+qbEUq5AkPuxfdwDNQoV+ui0h9TtxBhKfdFNiPqqtR0grsG2a15L1d67YWTmIDK1iil0MWa97VrpEFzjPH+Xpe/swzlgm1Afziv+Cyl+w==\" NoCertificadoSAT=\"30001000000500003456\" SelloSAT=\"KaGGU7eBgk1kJccE78RsPO7eWgeDCdrQKo62/v9etVE3hzltbTfBTuZADJNgiHIR05aQeUIufRSUjeRM5YB9KN538uhBq5T1NJtuz9zhjaYQcuv5jBG/QIQVQWDJcBny0qIMUhnX6PpHTc+PpUXh78u2qy194jUJErr9g9MRbQ9d39/ZFPQG1uksdyrqu9CkGkRA1nbDPQyhe6lvWqLVnMVP7oGBCktJYaImLo6netjepTCzZMcnR/dCBDp89ggf8AGsfesjZAFsmZMY4FWUmE0UyCXTGVuiMReosALgxM2aekMxdX3Hd5eQXq8VPh19tgc/tX14JKR/FvlnW8Hs7Q==\" xmlns:tfd=\"http://www.sat.gob.mx/TimbreFiscalDigital\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" /></cfdi:Complemento></cfdi:Comprobante>', 'A', '2', 'CACX7605101P8', 'XAXX010101000', 'XOCHILT CASAS CHAVEZ', 'I', '2025-02-19 22:17:12', '2025-02-19 23:17:16', 244, 'SISTEMA', 'Publico General0', 1, 'PUE', '01', 'S01', '01', 'emitido', 210, 34, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-19 22:17:17', '2025-02-19 22:17:17', NULL),
(2, '301175a9-f0cf-429d-904f-f002525a2361', '<?xml version=\"1.0\" encoding=\"utf-8\"?><cfdi:Comprobante xmlns:cfdi=\"http://www.sat.gob.mx/cfd/4\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sat.gob.mx/cfd/4 http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd\" Version=\"4.0\" Serie=\"A\" Folio=\"3\" Fecha=\"2025-02-20T21:08:48\" FormaPago=\"99\" SubTotal=\"210.00\" Total=\"243.60\" Moneda=\"MXN\" TipoDeComprobante=\"I\" MetodoPago=\"PPD\" LugarExpedicion=\"81110\" Exportacion=\"01\" Sello=\"VdQzvAGtGUhQ3EmXDEDz33PVLCklrwpbV2kA64xzVagsGgUB520LzVB9cg8RnDOA9qPkgkKOnoJIrBel7gTi/wEf1Z/u9GUSCO8ofh6s+Jf4F2/P1F0/hHIBaaZ9kO9mRgDh605yKk9jYkDj3EYbbDc49WQXhGQ/gXyAg/lTxeT46jQJQL7eA8pxb7nOT2FA+9G32Mh0HjFD7PDYFlCNelxTv9h+HiPxsLw/p3TpC+aLHz0oNuCW9HNVqeEXL218xVSOndVgY6eVhcqZhWXZCM21gE7TLEg916ZUUpJz3ieQVS/8NahBUa5zpbl4lq6Cpvz2cC4V1VIp1g2G4fPZ4g==\" NoCertificado=\"30001000000500003316\" Certificado=\"MIIFfzCCA2egAwIBAgIUMzAwMDEwMDAwMDA1MDAwMDMzMTYwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWxpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMjMwNTA5MjEzNzM2WhcNMjcwNTA5MjEzNzM2WjCBpjEdMBsGA1UEAxMUWE9DSElMVCBDQVNBUyBDSEFWRVoxHTAbBgNVBCkTFFhPQ0hJTFQgQ0FTQVMgQ0hBVkVaMR0wGwYDVQQKExRYT0NISUxUIENBU0FTIENIQVZFWjEWMBQGA1UELRMNQ0FDWDc2MDUxMDFQODEbMBkGA1UEBRMSQ0FDWDc2MDUxME1HVFNIQzA0MRIwEAYDVQQLEwlTdWNpcnNhIDEwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCWEIhEVVC/mNpXWaUFpN0+QuHRsJcFc4C3qJQaHdmzlmWBB8DnCJrYB+fbLQu/QHo+W/JctMANXN9xljxX5nPK7GHDWm6kN/U4UtOi49kSt1Au2rnfTInpuvwvBVflW+tBI4y472TPO9wCD0+aS6T8RN6KFfw/NlUJDCEeICSohNIxbzCYg4OOf/pnSComvC1T7lyyJeGGwXwv8v43Wk5RQGiBnOuN9ZtKoyPLO7QFb+aGmZ0aAhSCMaCEiIlMinedSqBH2og780dH7Zsd5f3mNS0AbJ9xfr2DNkBj7qz7DcgnJT2KsSmtP1IkXUB+OkivXo1nzyr1VKpDloIWBPa7AgMBAAGjHTAbMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMA0GCSqGSIb3DQEBCwUAA4ICAQChJcU8iKvcRAOx0xoNilj5z2rby1DeGF39bVk0tuWlMgdmxnWznMPAAZqMxmM6bxO+3xJ2eIKcD6+vgWF9ErJV/kNNIoDan5SulFzN/KT128IapZeELQzSEwViKE2Tgd0q7P3aG/8leI2AqfJXIq3yN+28t+iSnDWQoq5AK57CtrEMwkPAJ+BTniYYbeaVysGG82HgNUNAwp0yzb+amkj+DxCdFQrWNZmDqmroJnWZJzeXy2Uxfce2ju3dlXr1w6qr/3CsnZXeH6gRsUmtOgf0hPciQHocr2BsX7iPabT3nzXNuQyeuVqySOkTIWdKrFcythwKTKVRAJLN3mbCG88hGNgu2uusyQc+q9dz0AYkdHcn1bK4wAKMySk2vCN+eD9W+MFX5jT3X/cO4ZRa7ddDhtzWKVRdtoxlCC/JcobOItyE+l2KuzYkDs6pTjBIfBEvzNcZhbmfGsjzkmG7zSYlZxJsjtcEdeT6FUq1yHYewGZZ2wdd+FUu/CLe2DnL2i4NQx82psmb3qGvgNIhxwVzrQ5BLD+Kxi8syd6TyMSEQHywxYOYsJIk/fnp1syK9Mpq1zmp+FWvqlLuXrdv5wipPvce5SmS0BSObn2ymQdfZ0aexnGoQ+FPDpIKww6nP71ROH7jAYPFrO4SpStVKikvb8dcGzf/UcpEswKeS8c/uw==\"><cfdi:Emisor Nombre=\"XOCHILT CASAS CHAVEZ\" Rfc=\"CACX7605101P8\" RegimenFiscal=\"626\" /><cfdi:Receptor Rfc=\"XAXX010101000\" Nombre=\"Publico General\" DomicilioFiscalReceptor=\"81110\" RegimenFiscalReceptor=\"616\" UsoCFDI=\"S01\" /><cfdi:Conceptos><cfdi:Concepto ClaveProdServ=\"27111618\" Cantidad=\"1\" ClaveUnidad=\"H87\" Unidad=\"PZA\" Descripcion=\"Martillo de fierro\" ValorUnitario=\"210\" Importe=\"210.00\" ObjetoImp=\"02\"><cfdi:Impuestos><cfdi:Traslados><cfdi:Traslado Base=\"210.00\" Impuesto=\"002\" TipoFactor=\"Tasa\" TasaOCuota=\"0.160000\" Importe=\"33.60\" /></cfdi:Traslados></cfdi:Impuestos></cfdi:Concepto></cfdi:Conceptos><cfdi:Impuestos TotalImpuestosTrasladados=\"33.60\"><cfdi:Traslados><cfdi:Traslado Impuesto=\"002\" TipoFactor=\"Tasa\" TasaOCuota=\"0.160000\" Importe=\"33.60\" Base=\"210.00\" /></cfdi:Traslados></cfdi:Impuestos><cfdi:Complemento><tfd:TimbreFiscalDigital xsi:schemaLocation=\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd\" Version=\"1.1\" UUID=\"301175a9-f0cf-429d-904f-f002525a2361\" FechaTimbrado=\"2025-02-20T22:08:50\" RfcProvCertif=\"SPR190613I52\" SelloCFD=\"VdQzvAGtGUhQ3EmXDEDz33PVLCklrwpbV2kA64xzVagsGgUB520LzVB9cg8RnDOA9qPkgkKOnoJIrBel7gTi/wEf1Z/u9GUSCO8ofh6s+Jf4F2/P1F0/hHIBaaZ9kO9mRgDh605yKk9jYkDj3EYbbDc49WQXhGQ/gXyAg/lTxeT46jQJQL7eA8pxb7nOT2FA+9G32Mh0HjFD7PDYFlCNelxTv9h+HiPxsLw/p3TpC+aLHz0oNuCW9HNVqeEXL218xVSOndVgY6eVhcqZhWXZCM21gE7TLEg916ZUUpJz3ieQVS/8NahBUa5zpbl4lq6Cpvz2cC4V1VIp1g2G4fPZ4g==\" NoCertificadoSAT=\"30001000000500003456\" SelloSAT=\"SFfLNkojxX30xDxDYyZsjoQ1U9QS9wjGh5Hi1YbL5NNHUzcY9ki1or8xtueHrMnMGjwIIy8kufwy2smomqLO7jZep4Pvh7LxhgYRQBmavI9MUWh3qLDeA9eTdpaNxHCgOxkWKXnmEbeb4sHq49hcucX1fYb4NvdJtpkJCWDqNBtAstj7z5qxPYfrBRwdKIdIKf25dEuSbILNe8XvPU9qYzYXKlQg9YycfGDh3foSJpg/P/QTxa9Dcs72/IsW+44JgZugjCS+KmiRDBhPQRKoROmD9nNolU5zIWazgTzToDq4xHjVehTetfhod5GNKvnoOKrC7R+BGu6MtRg8yBTcvA==\" xmlns:tfd=\"http://www.sat.gob.mx/TimbreFiscalDigital\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" /></cfdi:Complemento></cfdi:Comprobante>', 'A', '3', 'CACX7605101P8', 'XAXX010101000', 'XOCHILT CASAS CHAVEZ', 'I', '2025-02-20 21:08:48', '2025-02-20 22:08:50', 244, 'SISTEMA', 'Publico General', 1, 'PPD', '99', 'S01', '01', 'emitido', 210, 34, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-20 21:08:51', '2025-02-20 21:08:51', NULL),
(3, '61f1cf9d-7597-4540-8c6f-3724a5847340', '<?xml version=\"1.0\" encoding=\"utf-8\"?><cfdi:Comprobante xmlns:cfdi=\"http://www.sat.gob.mx/cfd/4\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sat.gob.mx/cfd/4 http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd http://www.sat.gob.mx/Pagos20 http://www.sat.gob.mx/sitio_internet/cfd/Pagos/Pagos20.xsd\" Version=\"4.0\" Serie=\"p\" Folio=\"1\" Fecha=\"2025-02-20T00:00:00\" SubTotal=\"0\" Total=\"0\" Moneda=\"XXX\" TipoDeComprobante=\"P\" LugarExpedicion=\"81110\" Exportacion=\"01\" Sello=\"J8n2X7HAnRoNrGBBdHFdJOZtBL1EQat83YwppCLiAok5+5rwpAVSEjL6hM21bEOK8/KnykBGHkN8UyNwj1oNNcY37QhD86kuWHdWd/HitvuKbNocVuNkF6Q/P04dq6R5qPUoK9/V4mWHT3YlMDhP9SVOsoZo2u6fvYWk/vqs+FcGTOz25De+CicOxBbkXCs8B5foNrHsNeqkwmhf90LGcPb22NCWuzyFitShRyrkCg4/ZWtes5k5QlLM+5ybpC93/iYzaF//SxLVj0SvFIKNhoPTlJ25kne9zNOF02K8U1OnMcNJbvAKifWyQvFxDgYDeT9U15TkhJ9E+PEXFmRQWQ==\" NoCertificado=\"30001000000500003316\" Certificado=\"MIIFfzCCA2egAwIBAgIUMzAwMDEwMDAwMDA1MDAwMDMzMTYwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWxpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMjMwNTA5MjEzNzM2WhcNMjcwNTA5MjEzNzM2WjCBpjEdMBsGA1UEAxMUWE9DSElMVCBDQVNBUyBDSEFWRVoxHTAbBgNVBCkTFFhPQ0hJTFQgQ0FTQVMgQ0hBVkVaMR0wGwYDVQQKExRYT0NISUxUIENBU0FTIENIQVZFWjEWMBQGA1UELRMNQ0FDWDc2MDUxMDFQODEbMBkGA1UEBRMSQ0FDWDc2MDUxME1HVFNIQzA0MRIwEAYDVQQLEwlTdWNpcnNhIDEwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCWEIhEVVC/mNpXWaUFpN0+QuHRsJcFc4C3qJQaHdmzlmWBB8DnCJrYB+fbLQu/QHo+W/JctMANXN9xljxX5nPK7GHDWm6kN/U4UtOi49kSt1Au2rnfTInpuvwvBVflW+tBI4y472TPO9wCD0+aS6T8RN6KFfw/NlUJDCEeICSohNIxbzCYg4OOf/pnSComvC1T7lyyJeGGwXwv8v43Wk5RQGiBnOuN9ZtKoyPLO7QFb+aGmZ0aAhSCMaCEiIlMinedSqBH2og780dH7Zsd5f3mNS0AbJ9xfr2DNkBj7qz7DcgnJT2KsSmtP1IkXUB+OkivXo1nzyr1VKpDloIWBPa7AgMBAAGjHTAbMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMA0GCSqGSIb3DQEBCwUAA4ICAQChJcU8iKvcRAOx0xoNilj5z2rby1DeGF39bVk0tuWlMgdmxnWznMPAAZqMxmM6bxO+3xJ2eIKcD6+vgWF9ErJV/kNNIoDan5SulFzN/KT128IapZeELQzSEwViKE2Tgd0q7P3aG/8leI2AqfJXIq3yN+28t+iSnDWQoq5AK57CtrEMwkPAJ+BTniYYbeaVysGG82HgNUNAwp0yzb+amkj+DxCdFQrWNZmDqmroJnWZJzeXy2Uxfce2ju3dlXr1w6qr/3CsnZXeH6gRsUmtOgf0hPciQHocr2BsX7iPabT3nzXNuQyeuVqySOkTIWdKrFcythwKTKVRAJLN3mbCG88hGNgu2uusyQc+q9dz0AYkdHcn1bK4wAKMySk2vCN+eD9W+MFX5jT3X/cO4ZRa7ddDhtzWKVRdtoxlCC/JcobOItyE+l2KuzYkDs6pTjBIfBEvzNcZhbmfGsjzkmG7zSYlZxJsjtcEdeT6FUq1yHYewGZZ2wdd+FUu/CLe2DnL2i4NQx82psmb3qGvgNIhxwVzrQ5BLD+Kxi8syd6TyMSEQHywxYOYsJIk/fnp1syK9Mpq1zmp+FWvqlLuXrdv5wipPvce5SmS0BSObn2ymQdfZ0aexnGoQ+FPDpIKww6nP71ROH7jAYPFrO4SpStVKikvb8dcGzf/UcpEswKeS8c/uw==\" xmlns:pago20=\"http://www.sat.gob.mx/Pagos20\"><cfdi:Emisor Nombre=\"XOCHILT CASAS CHAVEZ\" Rfc=\"CACX7605101P8\" RegimenFiscal=\"626\" /><cfdi:Receptor Rfc=\"XAXX010101000\" Nombre=\"Publico General\" DomicilioFiscalReceptor=\"81110\" RegimenFiscalReceptor=\"616\" UsoCFDI=\"CP01\" /><cfdi:Conceptos><cfdi:Concepto ClaveProdServ=\"84111506\" Cantidad=\"1\" ClaveUnidad=\"ACT\" Descripcion=\"Pago\" ValorUnitario=\"0\" Importe=\"0\" ObjetoImp=\"01\" /></cfdi:Conceptos><cfdi:Complemento><pago20:Pagos Version=\"2.0\"><pago20:Totales MontoTotalPagos=\"244.00\" TotalTrasladosBaseIVA16=\"210.00\" TotalTrasladosImpuestoIVA16=\"33.60\" /><pago20:Pago Monto=\"244.00\" MonedaP=\"MXN\" TipoCambioP=\"1\" FormaDePagoP=\"04\" FechaPago=\"2025-02-20T00:00:00\"><pago20:DoctoRelacionado Folio=\"3\" Serie=\"A\" IdDocumento=\"301175a9-f0cf-429d-904f-f002525a2361\" MonedaDR=\"MXN\" ObjetoImpDR=\"02\" EquivalenciaDR=\"1\" NumParcialidad=\"1\" ImpSaldoAnt=\"244\" ImpSaldoInsoluto=\"0.00\" ImpPagado=\"244.00\"><pago20:ImpuestosDR><pago20:TrasladosDR><pago20:TrasladoDR ImporteDR=\"33.600000\" TasaOCuotaDR=\"0.160000\" TipoFactorDR=\"Tasa\" ImpuestoDR=\"002\" BaseDR=\"210.000000\" /></pago20:TrasladosDR></pago20:ImpuestosDR></pago20:DoctoRelacionado><pago20:ImpuestosP><pago20:TrasladosP><pago20:TrasladoP ImpuestoP=\"002\" TipoFactorP=\"Tasa\" TasaOCuotaP=\"0.160000\" BaseP=\"210.000000\" ImporteP=\"33.600000\" /></pago20:TrasladosP></pago20:ImpuestosP></pago20:Pago></pago20:Pagos><tfd:TimbreFiscalDigital xsi:schemaLocation=\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd\" Version=\"1.1\" UUID=\"61f1cf9d-7597-4540-8c6f-3724a5847340\" FechaTimbrado=\"2025-02-20T22:14:56\" RfcProvCertif=\"SPR190613I52\" SelloCFD=\"J8n2X7HAnRoNrGBBdHFdJOZtBL1EQat83YwppCLiAok5+5rwpAVSEjL6hM21bEOK8/KnykBGHkN8UyNwj1oNNcY37QhD86kuWHdWd/HitvuKbNocVuNkF6Q/P04dq6R5qPUoK9/V4mWHT3YlMDhP9SVOsoZo2u6fvYWk/vqs+FcGTOz25De+CicOxBbkXCs8B5foNrHsNeqkwmhf90LGcPb22NCWuzyFitShRyrkCg4/ZWtes5k5QlLM+5ybpC93/iYzaF//SxLVj0SvFIKNhoPTlJ25kne9zNOF02K8U1OnMcNJbvAKifWyQvFxDgYDeT9U15TkhJ9E+PEXFmRQWQ==\" NoCertificadoSAT=\"30001000000500003456\" SelloSAT=\"eetvyz9sukWwKHPpks7WeHe9orCfiO9Pje05R7hOOv9Pl8W50D5M9P9/vrmH5FHRXNYHjvrHgERuJaHVduJzE9rc/8QBfsTnQjPoPgDC4Z+DvHCYPdr8R8jc9VHUgRo9If+So0cbOueJXpWnDVPtryMyJ2YSu2Oo356GhAt/UPzmqlkU6Er15SA1bPWDTWHx5+T3DrcnucUCeK8QmHeT4talXkYD9U6dSxKuSFFTh63UBTp7eoV+mFuaoWvdUBqFdaoGzaR9fr2uWG47PSwZLdadEOvU3602VxK6PPG1O7wmVs0yZy7sI7+DAZiTQqA2db/e5cWGotOqH0J60yx2kA==\" xmlns:tfd=\"http://www.sat.gob.mx/TimbreFiscalDigital\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" /></cfdi:Complemento></cfdi:Comprobante>', 'p', '1', 'CACX7605101P8', 'XAXX010101000', 'XOCHILT CASAS CHAVEZ', 'P', '2025-02-20 00:00:00', '2025-02-20 22:14:56', 0, 'SISTEMA', 'Publico General', 1, '', '', 'CP01', '01', 'emitido', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-20 21:14:57', '2025-02-20 21:14:57', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arqueocaja`
--
ALTER TABLE `arqueocaja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indices de la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indices de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indices de la tabla `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indices de la tabla `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `branchoffices`
--
ALTER TABLE `branchoffices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprobantes_rd`
--
ALTER TABLE `comprobantes_rd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `custumers`
--
ALTER TABLE `custumers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enlacexml`
--
ALTER TABLE `enlacexml`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD KEY `groups_menu_menu_id_foreign` (`menu_id`),
  ADD KEY `groups_menu_group_id_foreign` (`group_id`),
  ADD KEY `id_group_id_menu_id` (`id`,`group_id`,`menu_id`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventorydetails`
--
ALTER TABLE `inventorydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quotesdetails`
--
ALTER TABLE `quotesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sellsdetails`
--
ALTER TABLE `sellsdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seriesfacturaelectronica`
--
ALTER TABLE `seriesfacturaelectronica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_movimientos_inventario`
--
ALTER TABLE `tipos_movimientos_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `usuariosempresa`
--
ALTER TABLE `usuariosempresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_almacen`
--
ALTER TABLE `usuarios_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_sucursal`
--
ALTER TABLE `usuarios_sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `xml`
--
ALTER TABLE `xml`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arqueocaja`
--
ALTER TABLE `arqueocaja`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `branchoffices`
--
ALTER TABLE `branchoffices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comprobantes_rd`
--
ALTER TABLE `comprobantes_rd`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `custumers`
--
ALTER TABLE `custumers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `enlacexml`
--
ALTER TABLE `enlacexml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventorydetails`
--
ALTER TABLE `inventorydetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `quotesdetails`
--
ALTER TABLE `quotesdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sellsdetails`
--
ALTER TABLE `sellsdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seriesfacturaelectronica`
--
ALTER TABLE `seriesfacturaelectronica`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `storages`
--
ALTER TABLE `storages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_movimientos_inventario`
--
ALTER TABLE `tipos_movimientos_inventario`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariosempresa`
--
ALTER TABLE `usuariosempresa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_almacen`
--
ALTER TABLE `usuarios_almacen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_sucursal`
--
ALTER TABLE `usuarios_sucursal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xml`
--
ALTER TABLE `xml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD CONSTRAINT `groups_menu_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
