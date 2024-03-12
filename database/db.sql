/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `shopping_website` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `shopping_website`;

CREATE TABLE IF NOT EXISTS `cart_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_item_session_id_foreign` (`session_id`),
  KEY `cart_item_product_id_foreign` (`product_id`),
  CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_item_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `shopping_session` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cart_item` (`id`, `session_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
	(45, 1, 3, 40, 1, NULL, NULL),
	(46, 1, 3, 42, 1, NULL, NULL);

CREATE TABLE IF NOT EXISTS `discount` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `discount_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `discount` (`id`, `name`, `description`, `discount_percent`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'CHAOXUAN2024', 'Khuyến mại vui xuân 2024', 15.00, 0, NULL, NULL),
	(2, 'VUIVETHANG3', 'Khuyến mại tháng 3', 20.00, 0, NULL, NULL),
	(3, 'QUAYHETUNGBUNG', 'Khuyến mại hè 2024', 18.00, 0, NULL, NULL);

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `image` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_product_id_foreign` (`product_id`),
  CONSTRAINT `image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_02_13_030500_create_product_category_table', 1),
	(6, '2024_02_13_030525_create_product_brand_table', 1),
	(7, '2024_02_13_030537_create_discount_table', 1),
	(8, '2024_02_13_030558_create_product_table', 1),
	(9, '2024_02_13_032647_create_shopping_session_table', 1),
	(10, '2024_02_13_032656_create_cart_item_table', 1),
	(11, '2024_02_13_035424_create_order_table', 1),
	(12, '2024_02_13_035433_create_order_items_table', 1),
	(13, '2024_02_14_030324_create_product_inventory_table', 1),
	(14, '2024_02_23_080450_create_image_table', 1);

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `discount_id` bigint(20) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_user_id_foreign` (`user_id`),
  KEY `order_discount_id_foreign` (`discount_id`),
  CONSTRAINT `order_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name_unique` (`name`),
  KEY `product_category_id_foreign` (`category_id`),
  KEY `product_brand_id_foreign` (`brand_id`),
  CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
	(1, 'Nike Air Zoom Pegasus 40 Premium - Xanh Lam', 'Qui consequuntur minus doloribus quasi. Accusamus saepe expedita delectus occaecati tempore vero voluptatem.', 478.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(2, 'Nike Air Max SC - Đen Xám', 'Nam eum nostrum voluptas repellendus consequatur dicta. Dolorem aut laudantium minima consectetur ratione dolores.', 555.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(3, 'Nike Revolution 7 - Trắng Đỏ', 'Rerum incidunt quia rem praesentium omnis.', 958.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(4, 'Nike Dunk Low Retro Premium - Nâu Xanh', 'Atque temporibus eveniet atque eligendi deserunt.', 996.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(5, 'Nike Air Max AP - Trắng Navy', 'Rem quam consequatur totam cupiditate ex cupiditate quia. Quae qui voluptatum consequatur corporis impedit ea et.', 876.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(6, 'Nike E-Series AD - Đen Trắng', 'Quae sed ullam ipsam. Omnis consequuntur sunt numquam totam molestiae soluta fuga magni.', 907.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(7, 'Nike Air Max Command Leather - Xanh Navy', 'Et qui voluptatem placeat sed ut veritatis dolorem nam. Molestiae quia corrupti facere in quis.', 733.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(8, 'Nike Dunk Low Retro Premium - Xanh Trắng', 'Eaque velit eos fuga dolore vitae reprehenderit. Est maxime sed molestiae eum libero repudiandae consequuntur.', 747.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(9, 'Nike Air Winflo 10 - Trắng Xanh', 'Et molestiae vel veritatis dolorem aliquam ipsum voluptatem.', 966.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(10, 'Nike MC Trainer 2 - Xám', 'Vitae quasi excepturi vero ex voluptas itaque.', 956.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(11, 'Nike Renew Run 4 - Đen Đen', 'Error est et quod dolorem et.', 835.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(12, 'Nike Jordan Nu Retro 1 Low - Trắng Vàng', 'Dignissimos quaerat qui sit ex nihil iste recusandae id.', 921.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(13, 'Nike Air Zoom Pegasus 40 - Đen Full', 'Ea possimus corrupti unde ab harum.', 168.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(14, 'Nike Air Max SC - Xám Xanh', 'Aut quisquam eveniet aspernatur possimus quisquam error.', 395.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(15, 'Nike Air Max Excee - Đen Đen', 'Nobis rerum est magnam laboriosam sint dolorem nesciunt qui.', 564.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(16, 'Nike Air Max Impact 4 - Navy Đen', 'Ex nobis qui vel eveniet quisquam.', 100.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(17, 'Nike In-Season TR 13 - Đen Trắng', 'Ut quibusdam a ea aut minus labore.', 212.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(18, 'Nike Jordan Stadium 90 - Trắng Đỏ', 'Laboriosam nobis aliquid delectus tempore modi dolor quae.', 904.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(19, 'Nike Killshot 2 Leather - Trắng Đen', 'Et at voluptatibus est tempora.', 661.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(20, 'Nike Air Max Command Leather - Đen', 'Quisquam quo totam possimus mollitia facilis necessitatibus optio.', 749.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(21, 'Nike Wearallday - Trắng Đen', 'Porro modi possimus nisi debitis.', 824.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(22, 'Nike Air Max Axis - Trắng Đen', 'Occaecati voluptas unde voluptas sint eaque accusamus.', 297.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(23, 'Nike Air Max Excee - Trắng Xanh Dương', 'Corporis debitis omnis ut.', 129.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(24, 'Nike Pegasus Turbo Next Nature - Camo', 'Enim et repudiandae autem est asperiores. Nesciunt eaque non accusamus atque ut.', 457.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(25, 'Nike ReactX Infinity 4 - Đen Xanh', 'Dignissimos aut optio consequuntur et quod eum. Earum perspiciatis culpa reprehenderit sit quod.', 135.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(26, 'Nike Air Zoom Structure 25 - Đen Xanh Lá', 'Dicta voluptate rerum ullam molestiae quod laudantium. Aut nihil commodi pariatur quasi fugit.', 803.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(27, 'Nike Air Zoom Structure 25 - Xanh Đen', 'Quam aut laborum rerum. Sed quo non dignissimos aspernatur.', 784.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(28, 'Nike Air Jordan 1 Low - Xanh Đen', 'Cum aliquid non cupiditate consectetur ut voluptas ut reprehenderit.', 685.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(29, 'Nike Ebernon Low Premium - Trắng Đen', 'Voluptates blanditiis accusantium culpa dolor tempora.', 745.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
	(30, 'Nike Killshot 2 Leather - Trắng Nâu', 'Magni accusantium unde quod.', 194.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25');

CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_brand` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Nike', 'giay-nike', NULL, NULL),
	(2, 'Puma', 'giay-puma', NULL, NULL),
	(3, 'Adidas', 'giay-adidas', NULL, NULL),
	(4, 'New Balance', 'giay-new-balance', NULL, NULL),
	(5, 'Vans', 'giay-vans', NULL, NULL),
	(6, 'Converse', 'giay-converse', NULL, NULL);

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_category_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Giày', 'giày dép', NULL, NULL),
	(2, 'Phụ kiện', 'phụ kiện', NULL, NULL);

CREATE TABLE IF NOT EXISTS `product_inventory` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_inventory_product_id_foreign` (`product_id`),
  CONSTRAINT `product_inventory_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_inventory` (`id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 39, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(2, 1, 40, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(3, 1, 41, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(4, 1, 42, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(5, 1, 43, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(6, 2, 39, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(7, 2, 40, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(8, 2, 41, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(9, 2, 42, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(10, 2, 43, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(11, 3, 39, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(12, 3, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(13, 3, 41, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(14, 3, 42, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(15, 3, 43, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(16, 4, 39, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(17, 4, 40, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(18, 4, 41, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(19, 4, 42, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(20, 4, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(21, 5, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(22, 5, 40, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(23, 5, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(24, 5, 42, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(25, 5, 43, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(26, 6, 39, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(27, 6, 40, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(28, 6, 41, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(29, 6, 42, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(30, 6, 43, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(31, 7, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(32, 7, 40, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(33, 7, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(34, 7, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(35, 7, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(36, 8, 39, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(37, 8, 40, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(38, 8, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(39, 8, 42, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(40, 8, 43, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(41, 9, 39, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(42, 9, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(43, 9, 41, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(44, 9, 42, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(45, 9, 43, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(46, 10, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(47, 10, 40, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(48, 10, 41, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(49, 10, 42, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(50, 10, 43, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(51, 11, 39, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(52, 11, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(53, 11, 41, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(54, 11, 42, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(55, 11, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(56, 12, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(57, 12, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(58, 12, 41, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(59, 12, 42, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(60, 12, 43, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(61, 13, 39, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(62, 13, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(63, 13, 41, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(64, 13, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(65, 13, 43, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(66, 14, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(67, 14, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(68, 14, 41, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(69, 14, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(70, 14, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(71, 15, 39, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(72, 15, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(73, 15, 41, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(74, 15, 42, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(75, 15, 43, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(76, 16, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(77, 16, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(78, 16, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(79, 16, 42, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(80, 16, 43, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(81, 17, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(82, 17, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(83, 17, 41, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(84, 17, 42, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(85, 17, 43, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(86, 18, 39, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(87, 18, 40, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(88, 18, 41, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(89, 18, 42, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(90, 18, 43, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(91, 19, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(92, 19, 40, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(93, 19, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(94, 19, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(95, 19, 43, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(96, 20, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(97, 20, 40, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(98, 20, 41, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(99, 20, 42, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(100, 20, 43, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(101, 21, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(102, 21, 40, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(103, 21, 41, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(104, 21, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(105, 21, 43, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(106, 22, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(107, 22, 40, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(108, 22, 41, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(109, 22, 42, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(110, 22, 43, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(111, 23, 39, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(112, 23, 40, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(113, 23, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(114, 23, 42, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(115, 23, 43, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(116, 24, 39, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(117, 24, 40, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(118, 24, 41, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(119, 24, 42, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(120, 24, 43, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(121, 25, 39, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(122, 25, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(123, 25, 41, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(124, 25, 42, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(125, 25, 43, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(126, 26, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(127, 26, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(128, 26, 41, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(129, 26, 42, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(130, 26, 43, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(131, 27, 39, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(132, 27, 40, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(133, 27, 41, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(134, 27, 42, 10, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(135, 27, 43, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(136, 28, 39, 8, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(137, 28, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(138, 28, 41, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(139, 28, 42, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(140, 28, 43, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(141, 29, 39, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(142, 29, 40, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(143, 29, 41, 5, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(144, 29, 42, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(145, 29, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(146, 30, 39, 6, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(147, 30, 40, 3, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(148, 30, 41, 4, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(149, 30, 42, 9, '2024-02-28 00:01:28', '2024-02-28 00:01:28'),
	(150, 30, 43, 7, '2024-02-28 00:01:28', '2024-02-28 00:01:28');

CREATE TABLE IF NOT EXISTS `shopping_session` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_session_user_id_foreign` (`user_id`),
  CONSTRAINT `shopping_session_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shopping_session` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` char(12) NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`),
  UNIQUE KEY `user_telephone_unique` (`telephone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `name`, `email`, `telephone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ms. Vita Carroll III', 'alexandra.cormier@example.org', '+19189750760', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'AFM5Tl0UzQ', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(2, 'Queenie Schultz', 'colt.eichmann@example.net', '+17749439799', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', '3q4Mb9aDydxO3MJzdlgWo3UdkBVYGebVUOtPTn8DBcktGU5cFKqEJ7XfiLHw', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(3, 'Prof. Jana Johns Jr.', 'kuhn.dameon@example.net', '+15094869081', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'URDy5hh0XH', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(4, 'Keegan Hegmann', 'enrico.baumbach@example.net', '+19038985724', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'GnlSFyXgoM', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(5, 'Ms. Maryam Stamm V', 'keith.schoen@example.org', '+12815520007', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'KFtiQFwtyA', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(6, 'Eusebio Block', 'ebogan@example.org', '+13207093598', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'tULCAKmFfD', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(7, 'Earline Spencer', 'nitzsche.sidney@example.org', '+15753736588', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'DOuKURkijk', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(8, 'Cordia Larkin', 'rippin.lorenz@example.net', '+15174102819', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'jjdF1eyyu2', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(9, 'Lane Schowalter PhD', 'predovic.daniella@example.com', '+12013318870', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'oCAda53TRc', '2024-02-28 00:17:23', '2024-02-28 00:17:23'),
	(10, 'Quentin Abernathy', 'hayes.odessa@example.com', '+12342920167', '2024-02-28 00:17:23', '$2y$12$2dHQ/UgDURVqZqrNXZSr9O3oKeiPnBwGsoTqQWFmXcdG8TA67aSfO', 'RJedwgVyzY', '2024-02-28 00:17:23', '2024-02-28 00:17:23');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
