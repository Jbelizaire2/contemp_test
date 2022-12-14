/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.251
Source Server Version : 50568
Source Host           : 192.168.1.251:3306
Source Database       : ubo_prueba

Target Server Type    : MYSQL
Target Server Version : 50568
File Encoding         : 65001

Date: 2022-12-13 19:00:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('17', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('18', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('19', '2014_10_12_200000_add_two_factor_columns_to_users_table', '1');
INSERT INTO `migrations` VALUES ('20', '2019_08_19_000000_create_failed_jobs_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido_paterno` varchar(20) DEFAULT NULL,
  `apellido_materno` varchar(20) DEFAULT NULL,
  `rut` varchar(15) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `estatus` char(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Juslain', 'Belizaire', 'Belizaire', '26.092.000-6', 'hlain2000@gmail.com', 'Adelaida de la Feitra', '1', '2021-08-09 15:41:26', '2021-08-09 15:41:26');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `activo` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Juslain Belizaire Aimable', 'hlain2000@gmail.com', null, '$2y$10$vqe17S7Z1JdNy8Dek30s4Oob77Fwddju9WVvVXd.hONgNgeZOQfpa', null, null, 'true', 'male', null, '2022-12-13 17:32:22', '2022-12-13 20:28:36');
INSERT INTO `users` VALUES ('2', 'Sarada Mehrotra', 'sarada_mehrotra@denesik-reichel.io', null, '$2y$10$Rp5JGqsuesC9zBnMiy8YGuI3.RO/X02eV.Vg1xgU/ri52INl7NuZe', null, null, 'true', 'female', null, '2022-12-13 18:38:35', '2022-12-13 18:38:35');
INSERT INTO `users` VALUES ('3', 'Satyen Gandhi', 'satyen_gandhi@block.co', null, '$2y$10$npY/mOoaM.xSTgGb.oc6iuioh4t/lOqYmIy8DJnf3wRvWMB2jTJk2', null, null, 'false', 'male', null, '2022-12-13 19:25:00', '2022-12-13 19:25:00');
INSERT INTO `users` VALUES ('4', 'Suma Iyer VM', 'suma_iyer_vm@watsica.net', null, '$2y$10$go1kEnF84w.rOCOkSwz41.zoFfHimaVaDRqTq11rkE/DurwSJtNAS', null, null, 'false', 'male', null, '2022-12-13 19:26:29', '2022-12-13 19:26:29');
