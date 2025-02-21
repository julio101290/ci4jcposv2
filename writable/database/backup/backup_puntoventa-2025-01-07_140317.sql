-- Database Backup Manager
-- This backup was created automatically by the Database Backup Manager
-- © 2025 Ramazan Çetinkaya. All rights reserved.
-- https://github.com/ramazancetinkaya/mysql-backup
--
-- Host: localhost:3306 via TCP/IP
-- Generated on: 2025-01-07 14:03:17
-- Server version: 10.4.32-MariaDB

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- No data found for table `auth_activation_attempts`
--

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
('1', 'admin', 'Administrators. The top of the food chain.'),
('2', 'member', 'Member everyday member.');

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
('1', '1'),
('1', '2'),
('1', '3'),
('1', '4'),
('2', '1');

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
('1', '1'),
('2', '1'),
('2', '2');

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
('1', '::1', 'admin@admin.com', '1', '2024-12-29 02:42:54', '1'),
('2', '::1', 'admin@admin.com', '1', '2025-01-07 20:54:30', '1');

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
('1', 'back-office', 'User can access to the administration panel.'),
('2', 'manage-user', 'User can create, delete or modify the users.'),
('3', 'role-permission', 'User can edit and define permissions for a role.'),
('4', 'menu-permission', 'User cand create, delete or modify the menu.'),
('5', 'log-permission', 'Permissions for logs');

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
('6', 'empresas-permisos', 'Permissions for backups'),
('7', 'settings-permissions', 'Permissions for settings'),
('8', 'backups-permissions', 'Permissions for backups');

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- No data found for table `auth_reset_attempts`
--

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- No data found for table `auth_tokens`
--

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
('1', '1'),
('1', '2'),
('1', '3'),
('1', '4'),
('1', '5');

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
('1', '6'),
('1', '7'),
('1', '8'),
('2', '1');

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `SQLFile` varchar(256) DEFAULT NULL,
  `uuid` varchar(36) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- No data found for table `backups`
--

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `direccion`, `rfc`, `telefono`, `correoElectronico`, `diasEntrega`, `caja`, `logo`, `certificado`, `archivoKey`, `contraCertificado`, `regimenFiscal`, `razonSocial`, `codigoPostal`, `CURP`, `email`, `host`, `smtpDebug`, `SMTPAuth`, `smptSecurity`, `port`, `pass`, `facturacionRD`, `certificadoCSD`, `archivoKeyCSD`, `contraCertificadoCSD`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'Contructora', 'Direccion', 'RFC', 'Telefono', 'asd@asd.com', null, null, null, null, null, '', 'null', 'Razon Social', '81110', '', '', '', '0', '0', 'null', '0', '', 'off', null, null, '', '2024-12-28 20:05:27', '2024-12-28 20:13:13', null);

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `menu_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `groups_menu_menu_id_foreign` (`menu_id`),
  KEY `groups_menu_group_id_foreign` (`group_id`),
  KEY `id_group_id_menu_id` (`id`,`group_id`,`menu_id`),
  CONSTRAINT `groups_menu_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `groups_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
('1', '1', '1'),
('2', '1', '2'),
('3', '1', '3'),
('4', '1', '4'),
('5', '1', '5');

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
('6', '1', '6'),
('7', '1', '7'),
('8', '2', '1'),
('9', '2', '2'),
('10', '2', '3'),
('11', '1', '8');

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
('12', '1', '9'),
('13', '1', '10'),
('15', '1', '11'),
('16', '1', '12');

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL,
  `user` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `description`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'The Company has been saved with the following data:{\"idEmpresa\":\"0\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"razonSocial\":\"Razon Social\",\"codigoPostal\":\"81110\",\"rfc\":\"RFC\",\"CURP\":\"\",\"regimenFis', 'admin', '2024-12-28 20:05:27', '2024-12-28 20:05:27', null),
('2', 'empresas.logUpdated{\"id\":\"1\",\"nombre\":\"Contructora\",\"direccion\":\"Direccion\",\"rfc\":\"RFC\",\"telefono\":\"Telefono\",\"correoElectronico\":\"asd@asd.com\",\"diasEntrega\":null,\"caja\":null,\"logo\":null,\"certificado\":null,\"archivoKey\":null,\"contraCertificado\":\"\",\"regimenF', 'admin', '2024-12-28 20:13:13', '2024-12-28 20:13:13', null);

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(55) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
('1', '0', '1', 'Dashboard', 'fas fa-tachometer-alt', 'admin', '1', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('2', '0', '1', 'User Management', 'fas fa-user', '#', '2', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('3', '2', '1', 'User Profile', 'fas fa-user-edit', 'admin/user/profile', '3', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('4', '2', '1', 'Users', 'fas fa-users', 'admin/user/manage', '4', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('5', '2', '1', 'Permissions', 'fas fa-user-lock', 'admin/permission', '5', '2024-12-29 02:37:20', '2024-12-29 02:37:20');

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
('6', '2', '1', 'Roles', 'fas fa-users-cog', 'admin/role', '6', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('7', '2', '1', 'Menu', 'fas fa-stream', 'admin/menu', '7', '2024-12-29 02:37:20', '2024-12-29 02:37:20'),
('8', '0', '1', 'Configuraciones', 'fas fa-cogs', '#', '8', '2024-12-29 02:51:11', '2024-12-29 02:51:11'),
('9', '8', '1', 'Bitacora', 'fas fa-bars', 'admin/log', '9', '2024-12-29 02:52:31', '2024-12-29 02:52:31'),
('10', '8', '1', 'Empresas', 'fas fa-building', 'admin/empresas', '10', '2024-12-29 02:53:54', '2024-12-29 02:53:54'),
('11', '8', '1', 'Globales', 'fas fa-globe-asia', 'admin/settings', '11', '2024-12-29 03:08:09', '2024-12-29 03:08:24');

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
('12', '8', '1', 'Respaldos', 'fas fa-database', 'admin/backups', '12', '2025-01-07 21:02:47', '2025-01-07 21:02:47');

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
('1', '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', '1735439840', '1'),
('2', '2020-02-03-081118', 'App\\Database\\Migrations\\CreateMenuTable', 'default', 'App', '1735439840', '1'),
('3', '2023-02-02-193406', 'App\\Database\\Migrations\\Userfields', 'default', 'App', '1735439840', '1'),
('4', '2024-03-15100147', 'App\\Database\\Migrations\\Log', 'default', 'App', '1735440481', '2'),
('5', '2023-05-30192621', 'App\\Database\\Migrations\\Usuariosempresa', 'default', 'App', '1735440511', '3');

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
('6', '2024-11-24203351', 'App\\Database\\Migrations\\Empresas', 'default', 'App', '1735440511', '3'),
('7', '2024-11-12164212', 'App\\Database\\Migrations\\settings', 'default', 'App', '1735441635', '4'),
('8', '2024-10-18122114', 'App\\Database\\Migrations\\Backups', 'default', 'App', '1736283640', '5');

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nameCompanie` varchar(256) DEFAULT NULL,
  `idTax` varchar(256) DEFAULT NULL,
  `phoneNumber` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `direction` varchar(256) DEFAULT NULL,
  `languaje` varchar(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nameCompanie`, `idTax`, `phoneNumber`, `email`, `direction`, `languaje`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'Name Corporation', 'DNI', 'Phone number', 'email@d.com', '123', 'es', null, null, null);

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `lastname` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `firstname`, `lastname`) VALUES
('1', 'admin@admin.com', 'admin', '$2y$10$pwECHaJ0o7/8.cxhpKIgNeI7L29uRftMzcUi9Wcz3W6McrfmoJHFm', null, null, null, null, null, null, '1', '0', '2024-12-29 02:37:20', '2024-12-29 02:37:20', null, null, null),
('2', 'user@user.com', 'user', '$2y$10$H27MIKrRexJ06NWpSqe0VOvcBZisWUd6cBKSBi7.m8qOQd.39FoJ6', null, null, null, null, null, null, '1', '0', '2024-12-29 02:37:20', '2024-12-29 02:37:20', null, null, null);

--
-- Table structure for table `usuariosempresa`
--

CREATE TABLE `usuariosempresa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuariosempresa`
--

INSERT INTO `usuariosempresa` (`id`, `idEmpresa`, `idUsuario`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', '1', 'on', '2024-12-28 20:05:27', '2024-12-28 20:05:27', null);

-- End of database backup process