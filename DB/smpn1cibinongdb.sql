/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80100 (8.1.0)
 Source Host           : localhost:3306
 Source Schema         : smpn1cibinongdb

 Target Server Type    : MySQL
 Target Server Version : 80100 (8.1.0)
 File Encoding         : 65001

 Date: 23/10/2023 17:37:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galleries
-- ----------------------------

-- ----------------------------
-- Table structure for jawaban_ujians
-- ----------------------------
DROP TABLE IF EXISTS `jawaban_ujians`;
CREATE TABLE `jawaban_ujians`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ujian_id` bigint UNSIGNED NOT NULL,
  `sub_bank_soal_id` bigint UNSIGNED NOT NULL,
  `tipe_pertanyaan` enum('pg','essay') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg_bobot` int UNSIGNED NOT NULL DEFAULT 0,
  `essay_bobot` int UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jawaban_ujians
-- ----------------------------
INSERT INTO `jawaban_ujians` VALUES (1, 1, 1, 'pg', 'a', 1, 0, '2023-10-23 16:49:37', '2023-10-23 16:49:37');
INSERT INTO `jawaban_ujians` VALUES (2, 1, 2, 'essay', 'lorem iaoglnaklgnklds', 0, 4, '2023-10-23 16:49:37', '2023-10-23 17:33:44');

-- ----------------------------
-- Table structure for master_bank_soals
-- ----------------------------
DROP TABLE IF EXISTS `master_bank_soals`;
CREATE TABLE `master_bank_soals`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `master_mapel_id` bigint UNSIGNED NOT NULL,
  `kelas` enum('7','8','9') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_bank_soals
-- ----------------------------
INSERT INTO `master_bank_soals` VALUES (1, 1, '7', '2023-10-23 00:00:00', '2023-10-26 23:59:00', 1, '653635e6e4456', '2023-10-23 16:02:40', '2023-10-23 16:02:40', NULL, 2, NULL, NULL);

-- ----------------------------
-- Table structure for master_mapels
-- ----------------------------
DROP TABLE IF EXISTS `master_mapels`;
CREATE TABLE `master_mapels`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_mapels
-- ----------------------------
INSERT INTO `master_mapels` VALUES (1, 'Bahasa Indonesia', NULL, '2023-10-23 15:51:58', '2023-10-23 15:51:58', 1, NULL, NULL);
INSERT INTO `master_mapels` VALUES (2, 'Bahasa Inggris', NULL, '2023-10-23 15:51:58', '2023-10-23 15:51:58', 1, NULL, NULL);
INSERT INTO `master_mapels` VALUES (3, 'Matematika', NULL, '2023-10-23 15:51:58', '2023-10-23 15:51:58', 1, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 270 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (257, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (258, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (259, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (260, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (261, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (262, '2023_10_21_114547_create_master_bank_soals_table', 1);
INSERT INTO `migrations` VALUES (263, '2023_10_21_114606_create_sub_bank_soals_table', 1);
INSERT INTO `migrations` VALUES (264, '2023_10_21_114618_create_pg_bank_soals_table', 1);
INSERT INTO `migrations` VALUES (265, '2023_10_21_114634_create_master_mapels_table', 1);
INSERT INTO `migrations` VALUES (266, '2023_10_21_114715_create_blogs_table', 1);
INSERT INTO `migrations` VALUES (267, '2023_10_21_114721_create_galleries_table', 1);
INSERT INTO `migrations` VALUES (268, '2023_10_21_114733_create_ujians_table', 1);
INSERT INTO `migrations` VALUES (269, '2023_10_21_114741_create_jawaban_ujians_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pg_bank_soals
-- ----------------------------
DROP TABLE IF EXISTS `pg_bank_soals`;
CREATE TABLE `pg_bank_soals`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sub_bank_soal_id` bigint UNSIGNED NOT NULL,
  `jawaban_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_e` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` enum('a','b','c','d','e') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pg_bank_soals
-- ----------------------------
INSERT INTO `pg_bank_soals` VALUES (1, 1, 'Oreo', 'Sari Gandum', 'Biskuat', 'Silver Queen', 'Regal', 'a', '2023-10-23 16:01:38', '2023-10-23 16:01:38');

-- ----------------------------
-- Table structure for sub_bank_soals
-- ----------------------------
DROP TABLE IF EXISTS `sub_bank_soals`;
CREATE TABLE `sub_bank_soals`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `master_bank_soal_id` bigint UNSIGNED NULL DEFAULT NULL,
  `tipe_pertanyaan` enum('pg','essay') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `essay_bobot` int UNSIGNED NOT NULL DEFAULT 0,
  `temp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_bank_soals
-- ----------------------------
INSERT INTO `sub_bank_soals` VALUES (1, 1, 'pg', 'Gambar apa ini', 'soal/U8wEcx5oHUL7yWo9x2Pds9iNGRbJl3vfcmikMJ1v.jpg', 0, '653635e6e4456', '2023-10-23 16:01:38', '2023-10-23 16:02:40');
INSERT INTO `sub_bank_soals` VALUES (2, 1, 'essay', 'Jelaskan secara singkat tentang kamu', NULL, 4, '653635e6e4456', '2023-10-23 16:02:20', '2023-10-23 16:02:40');

-- ----------------------------
-- Table structure for ujians
-- ----------------------------
DROP TABLE IF EXISTS `ujians`;
CREATE TABLE `ujians`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `master_bank_soal_id` bigint UNSIGNED NOT NULL,
  `total_nilai` int UNSIGNED NOT NULL DEFAULT 0,
  `nilai_pg` int UNSIGNED NOT NULL DEFAULT 0,
  `nilai_essay` int UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ujians
-- ----------------------------
INSERT INTO `ujians` VALUES (1, 3, 1, 5, 1, 4, '2023-10-23 16:49:37', '2023-10-23 17:33:44');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` enum('7','8','9') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` enum('admin','kepala sekolah','guru','orang tua wali','siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp_orang_tua_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_orang_tua_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp_orang_tua_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT 1,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin@test.test', '$2y$10$F3oF2cOaVjFLLvo0Z7mVz.Gx9nHDX3iDivYC//yxk/jEq86y5mD6e', 'Admin', NULL, 'admin', NULL, '082114578976', NULL, NULL, NULL, NULL, '2023-10-23 15:51:57', '2023-10-23 15:51:57', NULL, 1, NULL, NULL);
INSERT INTO `users` VALUES (2, 'guru@test.test', '$2y$10$45x6uR6jJ2.gkDtfGzmPbO296miuAVhc0xbzhJxDmH19ob99bRlL2', 'Guru', NULL, 'guru', NULL, '082114578976', NULL, NULL, NULL, NULL, '2023-10-23 15:51:58', '2023-10-23 15:51:58', NULL, 1, NULL, NULL);
INSERT INTO `users` VALUES (3, 'siswa@test.test', '$2y$10$eF91P0SYP0R.2Lxv3fYRqu7tMY.iBHWjO5CXgbNwkntRVHlcxIB4i', 'Siswa', '7', 'siswa', '123456789', '082114578976', '123456789', 'Orang Tua Siswa', '085603355799', NULL, '2023-10-23 15:51:58', '2023-10-23 15:51:58', NULL, 1, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
