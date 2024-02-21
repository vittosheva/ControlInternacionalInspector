/*
 Navicat Premium Data Transfer

 Source Server         : VALET (LOCALHOST)
 Source Server Type    : MySQL
 Source Server Version : 80033
 Source Host           : 127.0.0.1:3306
 Source Schema         : insp_controlinternacional_2023

 Target Server Type    : MySQL
 Target Server Version : 80033
 File Encoding         : 65001

 Date: 20/02/2024 11:13:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `category_type_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `color` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '#603cba',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_by` bigint unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`company_id`,`category_type_id`),
  KEY `categories_created_by_foreign` (`created_by`),
  KEY `categories_deleted_by_foreign` (`deleted_by`),
  KEY `categories_updated_by_foreign` (`updated_by`),
  KEY `categories_id_index` (`id`),
  KEY `categories_name2_index` (`company_id`,`created_by`,`name`),
  KEY `categories_name_index` (`name`),
  KEY `categories__index` (`category_type_id`,`deleted_at`,`company_id`,`is_active`) USING BTREE,
  KEY `categories___index` (`id`,`deleted_at`,`company_id`,`is_active`) USING BTREE,
  KEY `categories_deleted_at_index` (`deleted_at`) USING BTREE,
  KEY `categories_company_id_index` (`company_id`) USING BTREE,
  KEY `categories_is_active_index` (`is_active`) USING BTREE,
  CONSTRAINT `categories_category_type_id_foreign` FOREIGN KEY (`category_type_id`) REFERENCES `category_types` (`id`),
  CONSTRAINT `categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `categories_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for category_types
-- ----------------------------
DROP TABLE IF EXISTS `category_types`;
CREATE TABLE `category_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '#fc544b',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`name`),
  KEY `category_types_deleted_at_index` (`deleted_at`),
  KEY `category_types_id_index` (`id`),
  KEY `category_types_is_active_index` (`is_active`),
  KEY `category_types_name_index` (`name`),
  KEY `category_types_system_name_index` (`system_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of category_types
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint unsigned NOT NULL,
  `state_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint unsigned NOT NULL,
  `country_code` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT '1',
  `wiki_data_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `cities_state_id_index` (`state_id`) USING BTREE,
  KEY `cities_country_id_index` (`country_id`) USING BTREE,
  KEY `cities_name_index` (`name`(191)) USING BTREE,
  KEY `cities_country_code_index` (`country_code`) USING BTREE,
  CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cities_state_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=149149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ruc` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sri_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_logo` tinyint unsigned DEFAULT '1',
  `favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_contact` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `legal_representative` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_user_id` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `currently_using` tinyint unsigned DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`ruc`) USING BTREE,
  KEY `companies_country_id_foreign` (`country_id`),
  KEY `companies_created_by_index` (`created_by`),
  KEY `companies_main_user_id_foreign` (`main_user_id`),
  KEY `companies_ruc_deleted_at_is_active_index` (`ruc`,`deleted_at`,`is_active`) USING BTREE,
  KEY `companies_ruc_index` (`ruc`) USING BTREE,
  KEY `companies_is_active_index` (`is_active`) USING BTREE,
  KEY `companies_deleted_at_index` (`deleted_at`) USING BTREE,
  KEY `companies_deleted_at_is_active_index` (`deleted_at`,`is_active`,`id`) USING BTREE,
  KEY `companies_id_index` (`id`),
  CONSTRAINT `companies_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `companies_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `companies_ibfk_5` FOREIGN KEY (`main_user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of companies
-- ----------------------------
BEGIN;
INSERT INTO `companies` (`id`, `ruc`, `name`, `trade_name`, `email`, `sri_password`, `logo`, `use_logo`, `favicon`, `website`, `telephone`, `telephone_contact`, `address`, `legal_representative`, `main_user_id`, `country_id`, `currently_using`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (1, '0990993564001', 'CONTROL INTERNACIONAL DEL ECUADOR C.A. UNICONTROL', 'CONTROL INTERNACIONAL', 'info@atimasa.com', NULL, NULL, 0, NULL, 'https://www.primax.ec', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 81, '2024-01-04 12:45:00', 81, '2024-01-04 12:45:00', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for company_settings
-- ----------------------------
DROP TABLE IF EXISTS `company_settings`;
CREATE TABLE `company_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attributes` json DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_tax_information_company_id_foreign` (`company_id`),
  KEY `company_tax_information_created_by_foreign` (`created_by`),
  KEY `company_tax_information_updated_by_foreign` (`updated_by`),
  KEY `company_tax_information_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `company_settings_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_settings_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `company_settings_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `company_settings_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of company_settings
-- ----------------------------
BEGIN;
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (1, 1, 'tax_information', 'rimpe_negocio_popular', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (2, 1, 'tax_information', 'rimpe_emprendedores', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (3, 1, 'tax_information', 'obliged_to_keep_accounting', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (4, 1, 'tax_information', 'special_taxpayer', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (5, 1, 'tax_information', 'retention_agent', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (6, 1, 'tax_information', 'footer_notes_invoice_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (7, 1, 'tax_information', 'additional_notes_invoice', '<p>FACTURA DE VENTAS: Notas adicionales</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (8, 1, 'tax_information', 'footer_notes_invoice', '<p>FACTURA DE VENTAS: Notas al pie del documento</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (9, 1, 'tax_information', 'footer_notes_sale_note_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (10, 1, 'tax_information', 'additional_notes_sale_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (11, 1, 'tax_information', 'footer_notes_sale_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (12, 1, 'tax_information', 'footer_notes_credit_note_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (13, 1, 'tax_information', 'additional_notes_credit_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (14, 1, 'tax_information', 'footer_notes_credit_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (15, 1, 'tax_information', 'footer_notes_debit_note_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (16, 1, 'tax_information', 'additional_notes_debit_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (17, 1, 'tax_information', 'footer_notes_debit_note', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (18, 1, 'tax_information', 'footer_notes_withholding_voucher_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (19, 1, 'tax_information', 'additional_notes_withholding_voucher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (20, 1, 'tax_information', 'footer_notes_withholding_voucher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (21, 1, 'tax_information', 'footer_notes_waybill_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (22, 1, 'tax_information', 'additional_notes_waybill', '<p>GUIA DE REMISIÓN: Notas adicionales</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (23, 1, 'tax_information', 'footer_notes_waybill', '<p>GUIA DE REMISIÓN: Notas al pie del documento</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (24, 1, 'tax_information', 'footer_notes_purchase_settlement_is_active', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (25, 1, 'tax_information', 'additional_notes_purchase_settlement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (26, 1, 'tax_information', 'footer_notes_purchase_settlement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (27, 1, 'system_information', 'site_decimal_number', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (28, 1, 'system_information', 'site_currency', 'USD', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (29, 1, 'system_information', 'site_currency_symbol', '$', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (30, 1, 'system_information', 'site_currency_symbol_position', 'before', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (31, 1, 'system_information', 'site_date_format', 'd-m-Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (32, 1, 'system_information', 'site_time_format', 'H:i', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (33, 1, 'system_information', 'site_pagination', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (34, 1, 'system_information', 'show_qr_in_pdf', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (35, 1, 'system_information', 'prefix_bill', 'FCC', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (36, 1, 'system_information', 'prefix_credit_note', 'NCR', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (37, 1, 'system_information', 'prefix_debit_note', 'NDE', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (38, 1, 'system_information', 'prefix_invoice', 'FACV', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (39, 1, 'system_information', 'prefix_order', 'ORD', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (40, 1, 'system_information', 'prefix_proforma', 'PROF', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (41, 1, 'system_information', 'prefix_purchase_settlement', 'LCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (42, 1, 'system_information', 'prefix_sale_note', 'NOV', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (43, 1, 'system_information', 'prefix_waybill', 'GREM', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (44, 1, 'system_information', 'prefix_withholding_voucher', 'RETE', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (45, 1, 'system_information', 'prefix_brand', 'MAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (46, 1, 'system_information', 'prefix_product', 'PROD', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (47, 1, 'system_information', 'prefix_service', 'SERV', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (48, 1, 'system_information', 'prefix_vehicle', 'VEHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (49, 1, 'system_information', 'prefix_warehouse', 'BOD', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (50, 1, 'system_information', 'prefix_carrier', 'TRAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (51, 1, 'system_information', 'prefix_customer', 'CLIE', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (52, 1, 'system_information', 'prefix_user', 'EMP', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (53, 1, 'system_information', 'prefix_vendor', 'PROV', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (54, 1, 'system_information', 'prefix_chart_of_account', 'PLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (55, 1, 'system_information', 'prefix_unit', 'UNI', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (56, 1, 'tax_information', 'special_taxpayer_resolution', '123412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `company_settings` (`id`, `company_id`, `label`, `key`, `value`, `attributes`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES (57, 1, 'tax_information', 'retention_agent_resolution', 'NAC-DGERCGC20-00000057', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for company_user
-- ----------------------------
DROP TABLE IF EXISTS `company_user`;
CREATE TABLE `company_user` (
  `user_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_allowed_to_login` tinyint unsigned NOT NULL DEFAULT '0',
  `is_super` tinyint unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`,`user_id`) USING BTREE,
  KEY `company_users_user_id_foreign` (`user_id`),
  KEY `company_users_company_id_foreign` (`company_id`) USING BTREE,
  CONSTRAINT `company_user_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `company_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of company_user
-- ----------------------------
BEGIN;
INSERT INTO `company_user` (`user_id`, `company_id`, `created_at`, `updated_at`, `is_allowed_to_login`, `is_super`, `is_active`) VALUES (81, 1, '2024-01-04 12:39:39', NULL, 1, 0, 1);
INSERT INTO `company_user` (`user_id`, `company_id`, `created_at`, `updated_at`, `is_allowed_to_login`, `is_super`, `is_active`) VALUES (83, 1, '2024-01-04 14:44:18', NULL, 1, 0, 1);
COMMIT;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeric_code` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tld` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subregion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `translations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `emoji` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emoji_u` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` tinyint(1) DEFAULT '1',
  `wiki_data_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_iso2_index` (`iso2`),
  KEY `countries_iso3_index` (`iso3`),
  KEY `countries_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_manager
-- ----------------------------
DROP TABLE IF EXISTS `job_manager`;
CREATE TABLE `job_manager` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `failed` tinyint(1) NOT NULL DEFAULT '0',
  `attempt` int NOT NULL DEFAULT '0',
  `progress` int DEFAULT NULL,
  `exception_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_manager_job_id_index` (`job_id`),
  KEY `job_manager_started_at_index` (`started_at`),
  KEY `job_manager_failed_index` (`failed`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_manager
-- ----------------------------
BEGIN;
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (91, '$2y$10$01Fb9TYlEhUE.DsDjy15u.uGoqlbNZZsPmAy96hsuoTR1ccx1zaay', 'ShuvroRoy\\FilamentSpatieLaravelBackup\\Jobs\\CreateBackupJob', 'sync', '2024-01-04 13:45:30', NULL, 0, 1, 0, NULL, '2024-01-04 13:45:31', '2024-01-04 13:45:31');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (92, '$2y$10$K5dIs7dMhkfkyyiwNnOblulnglBA8P0CoVyYmRf8tr53lQSgruZXG', 'CmsMulti\\FilamentClearCache\\Jobs\\ClearCacheJob', 'sync', '2024-01-04 14:13:25', NULL, 0, 1, 0, NULL, '2024-01-04 14:13:25', '2024-01-04 14:13:25');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (93, '656', 'Rappasoft\\LaravelAuthenticationLog\\Notifications\\FailedLogin', 'default', '2024-01-18 20:09:59', '2024-01-18 20:10:01', 0, 1, 100, NULL, '2024-01-18 20:09:59', '2024-01-18 20:10:01');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (94, '657', 'Rappasoft\\LaravelAuthenticationLog\\Notifications\\FailedLogin', 'default', '2024-01-18 20:10:01', '2024-01-18 20:10:02', 0, 1, 100, NULL, '2024-01-18 20:10:01', '2024-01-18 20:10:02');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (95, '658', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:02', '2024-01-18 20:10:03', 0, 1, 100, NULL, '2024-01-18 20:10:02', '2024-01-18 20:10:03');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (96, '659', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:03', '2024-01-18 20:10:04', 0, 1, 100, NULL, '2024-01-18 20:10:03', '2024-01-18 20:10:04');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (97, '660', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:04', '2024-01-18 20:10:05', 0, 1, 100, NULL, '2024-01-18 20:10:04', '2024-01-18 20:10:05');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (98, '661', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:05', '2024-01-18 20:10:07', 0, 1, 100, NULL, '2024-01-18 20:10:05', '2024-01-18 20:10:07');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (99, '662', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:07', '2024-01-18 20:10:08', 0, 1, 100, NULL, '2024-01-18 20:10:07', '2024-01-18 20:10:08');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (100, '663', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:08', '2024-01-18 20:10:09', 0, 1, 100, NULL, '2024-01-18 20:10:08', '2024-01-18 20:10:09');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (101, '664', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:09', '2024-01-18 20:10:10', 0, 1, 100, NULL, '2024-01-18 20:10:09', '2024-01-18 20:10:10');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (102, '665', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:10', '2024-01-18 20:10:11', 0, 1, 100, NULL, '2024-01-18 20:10:10', '2024-01-18 20:10:11');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (103, '666', 'App\\Notifications\\AuthTimedOutEmail', 'default', '2024-01-18 20:10:11', '2024-01-18 20:10:12', 0, 1, 100, NULL, '2024-01-18 20:10:11', '2024-01-18 20:10:12');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (104, '667', 'Filament\\Notifications\\Auth\\ResetPassword', 'default', '2024-01-18 20:10:12', '2024-01-18 20:10:13', 0, 1, 100, NULL, '2024-01-18 20:10:12', '2024-01-18 20:10:13');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (105, '$2y$10$rqgaE7Txc7cN8KR7AjbD/uWpss9SEF0ar4//JfV/vjzAZpdde7KQC', 'ShuvroRoy\\FilamentSpatieLaravelBackup\\Jobs\\CreateBackupJob', 'sync', '2024-02-17 01:48:00', NULL, 0, 1, 0, NULL, '2024-02-17 01:48:00', '2024-02-17 01:48:00');
INSERT INTO `job_manager` (`id`, `job_id`, `name`, `queue`, `started_at`, `finished_at`, `failed`, `attempt`, `progress`, `exception_message`, `created_at`, `updated_at`) VALUES (106, '$2y$10$4PTDRmZuNWRF/wYsAnzFCe4uU3a/wBgJI29dcHVPt2lp9p/6AZ9zy', 'ShuvroRoy\\FilamentSpatieLaravelBackup\\Jobs\\CreateBackupJob', 'sync', '2024-02-17 13:39:48', NULL, 0, 1, 0, NULL, '2024-02-17 13:39:49', '2024-02-17 13:39:49');
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=677 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (668, 'default', '{\"uuid\":\"e29ce134-b453-48e8-8bbc-3274f20705c5\",\"displayName\":\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:85;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:58:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\\\":2:{s:17:\\\"authenticationLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:59:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Models\\\\AuthenticationLog\\\";s:2:\\\"id\\\";i:150;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"audit\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"fe2b6108-aa82-4027-9cd1-d90b8a309729\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1705683049, 1705683049);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (669, 'default', '{\"uuid\":\"9d093861-42eb-4d11-8337-2366c8a8deba\",\"displayName\":\"App\\\\Notifications\\\\AuthTimedOutEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:83;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\AuthTimedOutEmail\\\":1:{s:2:\\\"id\\\";s:36:\\\"fa85f3bb-07ba-4778-83ab-cbc76b1b9fd7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1705701724, 1705701724);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (670, 'default', '{\"uuid\":\"502ddb0e-5e73-494d-b716-0aa29dac938a\",\"displayName\":\"App\\\\Notifications\\\\AuthTimedOutEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:83;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\AuthTimedOutEmail\\\":1:{s:2:\\\"id\\\";s:36:\\\"e0c8f88e-64b4-4ae3-92f5-e981a077d718\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1705769699, 1705769699);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (671, 'default', '{\"uuid\":\"6db8118b-e8d5-4727-8a36-7e9ab48e8f15\",\"displayName\":\"App\\\\Notifications\\\\AuthTimedOutEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:82;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\AuthTimedOutEmail\\\":1:{s:2:\\\"id\\\";s:36:\\\"0667b551-cf38-4ed6-b32c-1002ab28ac28\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1705893668, 1705893668);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (672, 'default', '{\"uuid\":\"35c1113c-07a9-4b7d-b434-a70f6c27d545\",\"displayName\":\"App\\\\Notifications\\\\AuthTimedOutEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:82;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\AuthTimedOutEmail\\\":1:{s:2:\\\"id\\\";s:36:\\\"bbcff91b-685c-484a-b648-a89a682adde3\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1705951290, 1705951290);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (673, 'default', '{\"uuid\":\"95b89072-cf6d-489e-91e5-b7d786e8140b\",\"displayName\":\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:88;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:58:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\\\":2:{s:17:\\\"authenticationLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:59:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Models\\\\AuthenticationLog\\\";s:2:\\\"id\\\";i:222;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"audit\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1a8f5efc-1766-4781-82eb-84de68f7189d\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1706714037, 1706714037);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (674, 'default', '{\"uuid\":\"7686241a-4938-4e46-816a-0335354be971\",\"displayName\":\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:82;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:58:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\\\":2:{s:17:\\\"authenticationLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:59:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Models\\\\AuthenticationLog\\\";s:2:\\\"id\\\";i:248;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"audit\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"50a9993d-ad07-4d92-a415-9c26d3e0a368\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1708089163, 1708089163);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (675, 'default', '{\"uuid\":\"7f56ba53-8ec9-4de4-8610-ff684b229ec1\",\"displayName\":\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:83;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:58:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\\\":2:{s:17:\\\"authenticationLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:59:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Models\\\\AuthenticationLog\\\";s:2:\\\"id\\\";i:250;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"audit\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"5e924d9a-f44a-4e85-9afe-01a5a01d3d8b\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1708094409, 1708094409);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (676, 'default', '{\"uuid\":\"29481ccb-f34e-40bd-ba5a-fef622dbf441\",\"displayName\":\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Persona\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:81;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:58:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Notifications\\\\NewDevice\\\":2:{s:17:\\\"authenticationLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:59:\\\"Rappasoft\\\\LaravelAuthenticationLog\\\\Models\\\\AuthenticationLog\\\";s:2:\\\"id\\\";i:258;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"audit\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"b234663a-4d8f-40e4-aa0e-f60900eae01b\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1708152460, 1708152460);
COMMIT;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_order_column_index` (`order_column`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of media
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`,`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  KEY `model_has_permissions_permission_id_foreign` (`permission_id`),
  KEY `model_has_permissions_team_foreign_key_index` (`company_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`,`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  KEY `model_has_roles_role_id_foreign` (`role_id`),
  KEY `model_has_roles_team_foreign_key_index` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 82, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 83, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 84, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 85, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 86, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 87, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (13, 'App\\Models\\Persona\\User', 88, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (14, 'App\\Models\\Persona\\User', 83, 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `company_id`) VALUES (15, 'App\\Models\\Persona\\User', 81, 1);
COMMIT;

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `virtual_name_guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci GENERATED ALWAYS AS (concat(`name`,_utf8mb4' - (',`guard_name`,_utf8mb4')')) VIRTUAL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10261 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10084, 'view-any Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10085, 'view Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10086, 'create Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10087, 'update Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10088, 'delete Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10089, 'replicate Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10090, 'reorder Company', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10091, 'view-any Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10092, 'view Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10093, 'create Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10094, 'update Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10095, 'delete Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10096, 'replicate Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10097, 'reorder Department', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10098, 'view-any Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10099, 'view Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10100, 'create Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10101, 'update Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10102, 'delete Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10103, 'replicate Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10104, 'reorder Permission', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10105, 'view-any Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10106, 'view Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10107, 'create Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10108, 'update Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10109, 'delete Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10110, 'replicate Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10111, 'reorder Role', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10112, 'view-any BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10113, 'view BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10114, 'create BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10115, 'update BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10116, 'delete BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10117, 'replicate BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10118, 'reorder BathroomComplianceObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10119, 'view-any BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10120, 'view BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10121, 'create BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10122, 'update BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10123, 'delete BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10124, 'replicate BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10125, 'reorder BathroomState', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10126, 'view-any ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10127, 'view ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10128, 'create ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10129, 'update ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10130, 'delete ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10131, 'replicate ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10132, 'reorder ComplementaryService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10133, 'view-any ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10134, 'view ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10135, 'create ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10136, 'update ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10137, 'delete ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10138, 'replicate ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10139, 'reorder ControlRecord', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10140, 'view-any ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10141, 'view ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10142, 'create ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10143, 'update ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10144, 'delete ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10145, 'replicate ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10146, 'reorder ControlRecordBathroom', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10147, 'view-any ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10148, 'view ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10149, 'create ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10150, 'update ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10151, 'delete ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10152, 'replicate ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10153, 'reorder ControlRecordDetail', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10154, 'view-any ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10155, 'view ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10156, 'create ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10157, 'update ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10158, 'delete ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10159, 'replicate ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10160, 'reorder ControlRecordEnvironmental', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10161, 'view-any ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10162, 'view ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10163, 'create ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10164, 'update ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10165, 'delete ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10166, 'replicate ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10167, 'reorder ControlRecordService', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10168, 'view-any EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10169, 'view EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10170, 'create EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10171, 'update EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10172, 'delete EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10173, 'replicate EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10174, 'reorder EnvironmentalObservation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10175, 'view-any Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10176, 'view Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10177, 'create Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10178, 'update Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10179, 'delete Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10180, 'replicate Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10181, 'reorder Hose', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10182, 'view-any HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10183, 'view HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10184, 'create HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10185, 'update HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10186, 'delete HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10187, 'replicate HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10188, 'reorder HoseType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10189, 'view-any InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10190, 'view InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10191, 'create InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10192, 'update InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10193, 'delete InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10194, 'replicate InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10195, 'reorder InspectionSetting', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10196, 'view-any Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10197, 'view Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10198, 'create Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10199, 'update Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10200, 'delete Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10201, 'replicate Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10202, 'reorder Location', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10203, 'view-any Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10204, 'view Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10205, 'create Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10206, 'update Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10207, 'delete Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10208, 'replicate Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10209, 'reorder Measurement', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10210, 'view-any Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10211, 'view Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10212, 'create Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10213, 'update Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10214, 'delete Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10215, 'replicate Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10216, 'reorder Observation', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10217, 'view-any Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10218, 'view Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10219, 'create Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10220, 'update Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10221, 'delete Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10222, 'replicate Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10223, 'reorder Region', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10224, 'view-any Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10225, 'view Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10226, 'create Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10227, 'update Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10228, 'delete Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10229, 'replicate Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10230, 'reorder Station', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10231, 'view-any StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10232, 'view StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10233, 'create StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10234, 'update StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10235, 'delete StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10236, 'replicate StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10237, 'reorder StationType', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10238, 'view-any Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10239, 'view Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10240, 'create Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10241, 'update Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10242, 'delete Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10243, 'replicate Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10244, 'reorder Customer', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10245, 'view-any User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10246, 'view User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10247, 'create User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10248, 'update User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10249, 'delete User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10250, 'replicate User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10251, 'reorder User', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10252, 'access Main', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10253, 'consume Webservice', 'web', '2024-01-16 18:15:02', '2024-01-16 18:15:02');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10254, 'view-any GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10255, 'view GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10256, 'create GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10257, 'update GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10258, 'delete GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10259, 'replicate GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10260, 'reorder GasStationObservation', 'web', '2024-01-30 18:51:05', '2024-01-30 18:51:05');
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10133, 13);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10134, 13);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10135, 13);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10084, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10085, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10086, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10087, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10088, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10089, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10090, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10091, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10092, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10093, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10094, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10095, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10096, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10097, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10098, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10099, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10100, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10101, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10102, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10103, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10104, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10105, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10106, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10107, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10108, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10109, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10110, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10111, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10112, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10113, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10114, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10115, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10116, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10117, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10118, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10119, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10120, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10121, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10122, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10123, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10124, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10125, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10126, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10127, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10128, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10129, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10130, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10131, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10132, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10133, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10134, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10135, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10136, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10137, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10138, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10139, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10140, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10141, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10142, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10143, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10144, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10145, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10146, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10147, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10148, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10149, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10150, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10151, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10152, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10153, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10154, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10155, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10156, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10157, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10158, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10159, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10160, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10161, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10162, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10163, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10164, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10165, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10166, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10167, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10168, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10169, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10170, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10171, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10172, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10173, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10174, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10175, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10176, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10177, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10178, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10179, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10180, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10181, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10182, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10183, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10184, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10185, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10186, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10187, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10188, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10189, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10190, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10191, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10192, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10193, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10194, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10195, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10196, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10197, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10198, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10199, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10200, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10201, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10202, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10203, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10204, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10205, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10206, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10207, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10208, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10209, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10210, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10211, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10212, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10213, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10214, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10215, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10216, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10217, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10218, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10219, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10220, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10221, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10222, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10223, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10224, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10225, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10226, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10227, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10228, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10229, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10230, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10231, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10232, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10233, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10234, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10235, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10236, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10237, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10238, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10239, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10240, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10241, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10242, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10243, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10244, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10245, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10246, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10247, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10248, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10249, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10250, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10251, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10252, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10253, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10254, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10255, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10256, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10257, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10258, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10259, 14);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10260, 14);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_company_id_name_guard_name_unique` (`company_id`,`name`,`guard_name`),
  KEY `roles_team_foreign_key_index` (`company_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `company_id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES (13, NULL, 'Inspector', 'web', 'Persona que realiza en sitio la inspección, recopilación de datos de las estaciones de servicio asociadas', '2024-01-04 13:18:52', '2024-01-04 13:18:52');
INSERT INTO `roles` (`id`, `company_id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES (14, NULL, 'Administrador', 'web', 'Usuario con todos los privilegios', '2024-01-04 13:20:13', '2024-01-04 13:20:13');
INSERT INTO `roles` (`id`, `company_id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES (15, NULL, 'Super Admin', 'superAdmin', 'Super administrador', '2024-01-04 14:12:26', '2024-01-04 14:12:26');
COMMIT;

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `country_code` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fips_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT '1',
  `wiki_data_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `states_name_index` (`name`(191)) USING BTREE,
  KEY `states_country_code_index` (`country_code`) USING BTREE,
  KEY `states_country_id_index` (`country_id`) USING BTREE,
  CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4967 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of states
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for taggables
-- ----------------------------
DROP TABLE IF EXISTS `taggables`;
CREATE TABLE `taggables` (
  `tag_id` bigint unsigned NOT NULL,
  `taggable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint unsigned NOT NULL,
  UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of taggables
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `name` json NOT NULL,
  `slug` json NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned DEFAULT NULL,
  `user_id` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_user_id` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tipo de identificación: RUC, Cédula, Pasaporte, Identificación del exterior',
  `identification_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gender` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `department_id` bigint unsigned DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `state_id` bigint unsigned DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `parish` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chart_of_account_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned DEFAULT NULL,
  `main_subscribe_user` tinyint unsigned DEFAULT '0',
  `is_imported` tinyint unsigned DEFAULT '0',
  `is_user_logout` tinyint unsigned DEFAULT '0',
  `is_allowed_to_login` tinyint unsigned DEFAULT '1',
  `is_super` smallint unsigned DEFAULT '0',
  `is_active` tinyint unsigned DEFAULT '1',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `virtual_name_identification_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci GENERATED ALWAYS AS (concat(`name`,_utf8mb4' - ',`identification_number`)) VIRTUAL,
  `virtual_user_id_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci GENERATED ALWAYS AS (concat(`user_id`,_utf8mb4' - ',`name`)) VIRTUAL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `theme_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `users_city_id_foreign` (`city_id`),
  KEY `users_country_id_foreign` (`department_id`),
  KEY `users_state_id_foreign` (`state_id`),
  KEY `users_auth_index` (`id`,`deleted_at`),
  KEY `users_company_id_created_by_index` (`company_id`,`created_by`,`is_active`,`deleted_at`),
  KEY `users_company_id_index` (`company_id`),
  KEY `users_created_at_index` (`created_at`),
  KEY `users_created_by_full_index` (`created_by`,`company_id`,`is_active`),
  KEY `users_created_by_index` (`created_by`),
  KEY `users_deleted_at_index` (`deleted_at`),
  KEY `users_id_index` (`id`),
  KEY `users_is_active_index` (`is_active`),
  KEY `users_user_id_index` (`user_id`),
  KEY `users_user_id_unique` (`user_id`,`is_active`),
  KEY `users_category_id_foregin` (`category_id`),
  KEY `users_email_unique` (`company_id`,`email`,`main_subscribe_user`,`deleted_at`) USING BTREE,
  KEY `users_top5_index` (`deleted_at`,`company_id`,`is_active`,`created_at`,`id`) USING BTREE,
  KEY `users_is_not_super_index` (`deleted_at`,`is_active`,`company_id`,`is_super`) USING BTREE,
  KEY `users_is_super_index` (`is_super`) USING BTREE,
  CONSTRAINT `users_category_id_foregin` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (81, NULL, '85430796', NULL, NULL, NULL, NULL, 'Vittorio Dormi Delgado', NULL, NULL, 'vittosheva@gmail.com', '2024-01-04 12:48:27', '$2y$10$j0SI05ivFtlEcDreFbX.BesfJFKZB0tOVfrqBrA5/SXGQpJVdYlu2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, NULL, '2024-01-04 12:32:19', 81, '2024-01-16 18:22:24', NULL, NULL, 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (82, NULL, '50281449', NULL, NULL, NULL, NULL, 'Vittorio Dormi', NULL, NULL, 'vittoriodormi83@gmail.com', '2024-01-04 13:13:22', '$2y$10$S2hufMiaQZDmdp4m/fwnFesDHHby7HSsczqLmiBRiimN/iYQy4XR2', '3i3TzZYBS54Wr2oy3jIP0xswwpnEDj3Os8SFz2EXhUgbDnmWIGBqgMamAKw9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, 0, 0, 0, 1, 0, 1, NULL, '2024-01-04 13:13:07', 83, '2024-02-16 10:44:55', NULL, NULL, 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (83, NULL, '74089826', NULL, NULL, NULL, NULL, 'Paúl Villacres', NULL, NULL, 'paul.villacres@controlinternacional.com', '2024-01-04 14:29:22', '$2y$10$KEPi6VRhJaZPqncvTS1.M.PHuFzBdU2RdJvOP1FXOwBm7JgHz95AC', 'ifbBExAEuhde24IaWcoc5sobJI9sYLJHVc4j5LlHymbgrRnkFwt3bumZ2GzD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, NULL, '2024-01-04 14:29:01', 83, '2024-01-04 14:29:01', NULL, NULL, 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (84, NULL, '12729480', NULL, NULL, NULL, NULL, 'Margarita Loor', NULL, NULL, 'margarita.loor@hotmail.com', NULL, '$2y$10$UEHXFQ10ltCA52Ow6ilC/exaUi6Gh8tx4HNWEtIvMFQVtqmgycAdy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 83, '2024-01-19 11:40:16', 83, '2024-01-19 11:41:34', 83, '2024-01-19 11:41:34', 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (85, NULL, '58412347', NULL, NULL, NULL, NULL, 'Margarita Loor', NULL, NULL, 'margarita.loor@hotmail.com', '2024-01-19 16:41:40', '$2y$10$40kemDtrftu.ZB7.cGFq/uxbqpInXkuNUsMJ5ODJ6ai0BpcCjZNom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 83, '2024-01-19 11:42:20', 83, '2024-01-19 11:51:40', 83, '2024-01-19 11:51:40', 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (86, NULL, '58093465', NULL, NULL, NULL, NULL, 'Margarita Loor', NULL, NULL, 'margarita.loor@hotmail.com', '2024-01-19 11:54:34', '$2y$10$vPgVCWB7M68IfijMYfVmpelDbErTAhnkEYxJiCc/cIqCWTK3PF/Iq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 83, '2024-01-19 11:54:52', 83, '2024-01-19 11:55:38', 83, '2024-01-19 11:55:38', 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (87, NULL, '48779335', NULL, NULL, NULL, NULL, 'Margarita Loor', NULL, NULL, 'margarita.loor@hotmail.com', '2024-01-19 11:55:41', '$2y$10$UrHikZNsqHssWN2kL0XTcOb4NrC/zNg8b1FY6ymGFgKY1LNRLEg4q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 83, '2024-01-19 11:55:55', 83, '2024-01-22 11:48:33', 83, '2024-01-22 11:48:33', 'default', NULL, NULL);
INSERT INTO `users` (`id`, `company_id`, `user_id`, `main_user_id`, `identification_type`, `identification_number`, `persona_type`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `telephone`, `address`, `notes`, `gender`, `date_birth`, `date_hired`, `department_id`, `country_id`, `state_id`, `city_id`, `parish`, `chart_of_account_number`, `signature`, `category_id`, `main_subscribe_user`, `is_imported`, `is_user_logout`, `is_allowed_to_login`, `is_super`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `theme`, `theme_color`, `avatar_url`) VALUES (88, NULL, '80051152', NULL, NULL, NULL, NULL, 'Margarita Loor', NULL, NULL, 'margarita.loor@hotmail.com', '2024-01-31 00:51:33', '$2y$10$cppah56bNlvqMRocqGrCN.iOyHG9IVeB9S6wpajWEWRVQaUMcZOLa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, 0, 0, 0, 1, 0, 1, 83, '2024-01-31 00:51:55', 83, '2024-01-31 10:24:29', NULL, NULL, 'default', NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
