SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `4459339_shopping` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `4459339_shopping`;

CREATE TABLE `cart_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cart_item` (`id`, `session_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(53, 4, 6, 40, 1, NULL, NULL),
(59, 4, 4, 40, 1, NULL, NULL),
(60, 7, 3, 40, 1, NULL, NULL);

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `discount` (`id`, `name`, `description`, `discount_percent`, `active`, `created_at`, `updated_at`) VALUES
(1, 'CHAOXUAN2024', 'Khuyến mại vui xuân 2024', 15.00, 0, NULL, NULL),
(2, 'VUIVETHANG3', 'Khuyến mại tháng 3', 20.00, 0, NULL, NULL),
(3, 'QUAYHETUNGBUNG', 'Khuyến mại hè 2024', 18.00, 0, NULL, NULL);

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `image` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-01.jpg', NULL, NULL),
(2, 1, 'giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-02.jpg', NULL, NULL),
(3, 1, 'giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-03.jpg', NULL, NULL),
(4, 1, 'giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-04.jpg', NULL, NULL),
(5, 1, 'giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-05.jpg', NULL, NULL),
(6, 2, 'giay-nike-air-max-sc-nam-den-xam-01.jpg', NULL, NULL),
(7, 2, 'giay-nike-air-max-sc-nam-den-xam-02.jpg', NULL, NULL),
(8, 2, 'giay-nike-air-max-sc-nam-den-xam-03.jpg', NULL, NULL),
(9, 2, 'giay-nike-air-max-sc-nam-den-xam-04.jpg', NULL, NULL),
(10, 2, 'giay-nike-air-max-sc-nam-den-xam-05.jpg', NULL, NULL),
(11, 3, 'giay-nike-revolution-7-den-trang-01.jpg', NULL, NULL),
(12, 3, 'giay-nike-revolution-7-den-trang-02.jpg', NULL, NULL),
(13, 3, 'giay-nike-revolution-7-den-trang-03.jpg', NULL, NULL),
(14, 3, 'giay-nike-revolution-7-den-trang-04.jpg', NULL, NULL),
(15, 3, 'giay-nike-revolution-7-den-trang-05.jpg', NULL, NULL),
(16, 4, 'giay-nike-dunk-low-retro-premium-nam-nau-xanh-01.jpg', NULL, NULL),
(17, 4, 'giay-nike-dunk-low-retro-premium-nam-nau-xanh-02.jpg', NULL, NULL),
(18, 4, 'giay-nike-dunk-low-retro-premium-nam-nau-xanh-03.jpg', NULL, NULL),
(19, 4, 'giay-nike-dunk-low-retro-premium-nam-nau-xanh-04.jpg', NULL, NULL),
(20, 4, 'giay-nike-dunk-low-retro-premium-nam-nau-xanh-05.jpg', NULL, NULL),
(21, 5, 'giay-nike-air-max-ap-nam-trang-navy-01.jpg', NULL, NULL),
(22, 5, 'giay-nike-air-max-ap-nam-trang-navy-02.jpg', NULL, NULL),
(23, 5, 'giay-nike-air-max-ap-nam-trang-navy-03.jpg', NULL, NULL),
(24, 5, 'giay-nike-air-max-ap-nam-trang-navy-04.jpg', NULL, NULL),
(25, 5, 'giay-nike-air-max-ap-nam-trang-navy-05.jpg', NULL, NULL),
(26, 6, 'giay-nike-e-series-ad-nam-den-trang-01.jpg', NULL, NULL),
(27, 6, 'giay-nike-e-series-ad-nam-den-trang-02.jpg', NULL, NULL),
(28, 6, 'giay-nike-e-series-ad-nam-den-trang-03.jpg', NULL, NULL),
(29, 6, 'giay-nike-e-series-ad-nam-den-trang-04.jpg', NULL, NULL),
(30, 6, 'giay-nike-e-series-ad-nam-den-trang-05.jpg', NULL, NULL),
(31, 7, 'giay-nike-air-max-command-leather-nam-xanh-navy-01.jpg', NULL, NULL),
(32, 7, 'giay-nike-air-max-command-leather-nam-xanh-navy-02.jpg', NULL, NULL),
(33, 7, 'giay-nike-air-max-command-leather-nam-xanh-navy-03.jpg', NULL, NULL),
(34, 7, 'giay-nike-air-max-command-leather-nam-xanh-navy-04.jpg', NULL, NULL),
(35, 7, 'giay-nike-air-max-command-leather-nam-xanh-navy-05.jpg', NULL, NULL),
(36, 8, 'giay-nike-dunk-low-retro-premium-nam-xanh-trang-01.jpg', NULL, NULL),
(37, 8, 'giay-nike-dunk-low-retro-premium-nam-xanh-trang-02.jpg', NULL, NULL),
(38, 8, 'giay-nike-dunk-low-retro-premium-nam-xanh-trang-03.jpg', NULL, NULL),
(39, 8, 'giay-nike-dunk-low-retro-premium-nam-xanh-trang-04.jpg', NULL, NULL),
(40, 8, 'giay-nike-dunk-low-retro-premium-nam-xanh-trang-05.jpg', NULL, NULL),
(41, 9, 'giay-nike-air-winflo-10-nam-trang-xanh-01.jpg', NULL, NULL),
(42, 9, 'giay-nike-air-winflo-10-nam-trang-xanh-02.jpg', NULL, NULL),
(43, 9, 'giay-nike-air-winflo-10-nam-trang-xanh-03.jpg', NULL, NULL),
(44, 9, 'giay-nike-air-winflo-10-nam-trang-xanh-04.jpg', NULL, NULL),
(45, 9, 'giay-nike-air-winflo-10-nam-trang-xanh-05.jpg', NULL, NULL),
(46, 10, 'giay-nike-mc-trainer-2-nam-xam-01.jpg', NULL, NULL),
(47, 10, 'giay-nike-mc-trainer-2-nam-xam-02.jpg', NULL, NULL),
(48, 10, 'giay-nike-mc-trainer-2-nam-xam-03.jpg', NULL, NULL),
(49, 10, 'giay-nike-mc-trainer-2-nam-xam-04.jpg', NULL, NULL),
(50, 10, 'giay-nike-mc-trainer-2-nam-xam-05.jpg', NULL, NULL),
(51, 11, 'giay-nike-renew-run-4-nam-den-den-01.jpg', NULL, NULL),
(52, 11, 'giay-nike-renew-run-4-nam-den-den-02.jpg', NULL, NULL),
(53, 11, 'giay-nike-renew-run-4-nam-den-den-03.jpg', NULL, NULL),
(54, 11, 'giay-nike-renew-run-4-nam-den-den-04.jpg', NULL, NULL),
(55, 11, 'giay-nike-renew-run-4-nam-den-den-05.jpg', NULL, NULL),
(56, 12, 'giay-jordan-nu-retro-1-low-nam-trang-vang-01.jpg', NULL, NULL),
(57, 12, 'giay-jordan-nu-retro-1-low-nam-trang-vang-02.jpg', NULL, NULL),
(58, 12, 'giay-jordan-nu-retro-1-low-nam-trang-vang-03.jpg', NULL, NULL),
(59, 12, 'giay-jordan-nu-retro-1-low-nam-trang-vang-04.jpg', NULL, NULL),
(60, 12, 'giay-jordan-nu-retro-1-low-nam-trang-vang-05.jpg', NULL, NULL),
(61, 13, 'giay-nike-air-zoom-pegasus-40-nam-den-full-01.jpg', NULL, NULL),
(62, 13, 'giay-nike-air-zoom-pegasus-40-nam-den-full-02.jpg', NULL, NULL),
(63, 13, 'giay-nike-air-zoom-pegasus-40-nam-den-full-03.jpg', NULL, NULL),
(64, 13, 'giay-nike-air-zoom-pegasus-40-nam-den-full-04.jpg', NULL, NULL),
(65, 13, 'giay-nike-air-zoom-pegasus-40-nam-den-full-05.jpg', NULL, NULL),
(66, 14, 'giay-nike-air-max-sc-nam-xam-xanh-01.jpg', NULL, NULL),
(67, 14, 'giay-nike-air-max-sc-nam-xam-xanh-02.jpg', NULL, NULL),
(68, 14, 'giay-nike-air-max-sc-nam-xam-xanh-03.jpg', NULL, NULL),
(69, 14, 'giay-nike-air-max-sc-nam-xam-xanh-04.jpg', NULL, NULL),
(70, 14, 'giay-nike-air-max-sc-nam-xam-xanh-05.jpg', NULL, NULL),
(71, 15, 'giay-nike-air-max-excee-nam-den-den-01.jpg', NULL, NULL),
(72, 15, 'giay-nike-air-max-excee-nam-den-den-02.jpg', NULL, NULL),
(73, 15, 'giay-nike-air-max-excee-nam-den-den-03.jpg', NULL, NULL),
(74, 15, 'giay-nike-air-max-excee-nam-den-den-04.jpg', NULL, NULL),
(75, 15, 'giay-nike-air-max-excee-nam-den-den-05.jpg', NULL, NULL),
(76, 16, 'giay-nike-air-max-impact-4-nam-navy-den-01.jpg', NULL, NULL),
(77, 16, 'giay-nike-air-max-impact-4-nam-navy-den-02.jpg', NULL, NULL),
(78, 16, 'giay-nike-air-max-impact-4-nam-navy-den-03.jpg', NULL, NULL),
(79, 16, 'giay-nike-air-max-impact-4-nam-navy-den-04.jpg', NULL, NULL),
(80, 16, 'giay-nike-air-max-impact-4-nam-navy-den-05.jpg', NULL, NULL),
(81, 17, 'giay-nike-in-season-tr-13-nam-den-trang-01.jpg', NULL, NULL),
(82, 17, 'giay-nike-in-season-tr-13-nam-den-trang-02.jpg', NULL, NULL),
(83, 17, 'giay-nike-in-season-tr-13-nam-den-trang-03.jpg', NULL, NULL),
(84, 17, 'giay-nike-in-season-tr-13-nam-den-trang-04.jpg', NULL, NULL),
(85, 17, 'giay-nike-in-season-tr-13-nam-den-trang-05.jpg', NULL, NULL),
(86, 18, 'giay-nike-jordan-stadium-90-nam-trang-do-01.jpg', NULL, NULL),
(87, 18, 'giay-nike-jordan-stadium-90-nam-trang-do-02.jpg', NULL, NULL),
(88, 18, 'giay-nike-jordan-stadium-90-nam-trang-do-03.jpg', NULL, NULL),
(89, 18, 'giay-nike-jordan-stadium-90-nam-trang-do-04.jpg', NULL, NULL),
(90, 18, 'giay-nike-jordan-stadium-90-nam-trang-do-05.jpg', NULL, NULL),
(91, 19, 'giay-nike-killshot-2-leather-nam-trang-den-01.jpg', NULL, NULL),
(92, 19, 'giay-nike-killshot-2-leather-nam-trang-den-02.jpg', NULL, NULL),
(93, 19, 'giay-nike-killshot-2-leather-nam-trang-den-03.jpg', NULL, NULL),
(94, 19, 'giay-nike-killshot-2-leather-nam-trang-den-04.jpg', NULL, NULL),
(95, 19, 'giay-nike-killshot-2-leather-nam-trang-den-05.jpg', NULL, NULL),
(96, 20, 'giay-nike-air-max-command-leather-nam-den-01.jpg', NULL, NULL),
(97, 20, 'giay-nike-air-max-command-leather-nam-den-02.jpg', NULL, NULL),
(98, 20, 'giay-nike-air-max-command-leather-nam-den-03.jpg', NULL, NULL),
(99, 20, 'giay-nike-air-max-command-leather-nam-den-04.jpg', NULL, NULL),
(100, 20, 'giay-nike-air-max-command-leather-nam-den-05.jpg', NULL, NULL),
(101, 21, 'giay-nike-wearallday-nam-trang-den-01.jpg', NULL, NULL),
(102, 21, 'giay-nike-wearallday-nam-trang-den-02.jpg', NULL, NULL),
(103, 21, 'giay-nike-wearallday-nam-trang-den-03.jpg', NULL, NULL),
(104, 21, 'giay-nike-wearallday-nam-trang-den-04.jpg', NULL, NULL),
(105, 21, 'giay-nike-wearallday-nam-trang-den-05.jpg', NULL, NULL),
(106, 22, 'giay-nike-air-xax-axis-nam-trang-den-01.jpg', NULL, NULL),
(107, 22, 'giay-nike-air-xax-axis-nam-trang-den-02.jpg', NULL, NULL),
(108, 22, 'giay-nike-air-xax-axis-nam-trang-den-03.jpg', NULL, NULL),
(109, 22, 'giay-nike-air-xax-axis-nam-trang-den-04.jpg', NULL, NULL),
(110, 22, 'giay-nike-air-xax-axis-nam-trang-den-05.jpg', NULL, NULL),
(111, 23, 'giay-nike-air-max-excee-nam-trang-xanh-duong-01.jpg', NULL, NULL),
(112, 23, 'giay-nike-air-max-excee-nam-trang-xanh-duong-02.jpg', NULL, NULL),
(113, 23, 'giay-nike-air-max-excee-nam-trang-xanh-duong-03.jpg', NULL, NULL),
(114, 23, 'giay-nike-air-max-excee-nam-trang-xanh-duong-04.jpg', NULL, NULL),
(115, 23, 'giay-nike-air-max-excee-nam-trang-xanh-duong-05.jpg', NULL, NULL),
(116, 24, 'giay-nike-pegasus-turbo-next-nature-nam-camo-01.jpg', NULL, NULL),
(117, 24, 'giay-nike-pegasus-turbo-next-nature-nam-camo-02.jpg', NULL, NULL),
(118, 24, 'giay-nike-pegasus-turbo-next-nature-nam-camo-03.jpg', NULL, NULL),
(119, 24, 'giay-nike-pegasus-turbo-next-nature-nam-camo-04.jpg', NULL, NULL),
(120, 24, 'giay-nike-pegasus-turbo-next-nature-nam-camo-05.jpg', NULL, NULL),
(121, 25, 'giay-nike-reactx-infinity-4-nam-den-xanh-01.jpg', NULL, NULL),
(122, 25, 'giay-nike-reactx-infinity-4-nam-den-xanh-02.jpg', NULL, NULL),
(123, 25, 'giay-nike-reactx-infinity-4-nam-den-xanh-03.jpg', NULL, NULL),
(124, 25, 'giay-nike-reactx-infinity-4-nam-den-xanh-04.jpg', NULL, NULL),
(125, 25, 'giay-nike-reactx-infinity-4-nam-den-xanh-05.jpg', NULL, NULL),
(126, 26, 'giay-nike-air-zoom-structure-25-nam-den-xanh-la-01.jpg', NULL, NULL),
(127, 26, 'giay-nike-air-zoom-structure-25-nam-den-xanh-la-02.jpg', NULL, NULL),
(128, 26, 'giay-nike-air-zoom-structure-25-nam-den-xanh-la-03.jpg', NULL, NULL),
(129, 26, 'giay-nike-air-zoom-structure-25-nam-den-xanh-la-04.jpg', NULL, NULL),
(130, 26, 'giay-nike-air-zoom-structure-25-nam-den-xanh-la-05.jpg', NULL, NULL),
(131, 27, 'giay-nike-air-zoom-structure-25-nam-xanh-den-01.jpg', NULL, NULL),
(132, 27, 'giay-nike-air-zoom-structure-25-nam-xanh-den-02.jpg', NULL, NULL),
(133, 27, 'giay-nike-air-zoom-structure-25-nam-xanh-den-03.jpg', NULL, NULL),
(134, 27, 'giay-nike-air-zoom-structure-25-nam-xanh-den-04.jpg', NULL, NULL),
(135, 27, 'giay-nike-air-zoom-structure-25-nam-xanh-den-05.jpg', NULL, NULL),
(136, 28, 'giay-air-jordan-1-low-nam-xanh-den-01.jpg', NULL, NULL),
(137, 28, 'giay-air-jordan-1-low-nam-xanh-den-02.jpg', NULL, NULL),
(138, 28, 'giay-air-jordan-1-low-nam-xanh-den-03.jpg', NULL, NULL),
(139, 28, 'giay-air-jordan-1-low-nam-xanh-den-04.jpg', NULL, NULL),
(140, 28, 'giay-air-jordan-1-low-nam-xanh-den-05.jpg', NULL, NULL),
(141, 29, 'giay-nike-ebernon-low-premium-nam-trang-den-01.jpg', NULL, NULL),
(142, 29, 'giay-nike-ebernon-low-premium-nam-trang-den-02.jpg', NULL, NULL),
(143, 29, 'giay-nike-ebernon-low-premium-nam-trang-den-03.jpg', NULL, NULL),
(144, 29, 'giay-nike-ebernon-low-premium-nam-trang-den-04.jpg', NULL, NULL),
(145, 29, 'giay-nike-ebernon-low-premium-nam-trang-den-05.jpg', NULL, NULL),
(146, 30, 'giay-nike-killshot-2-leather-nam-trang-nau-01.jpg', NULL, NULL),
(147, 30, 'giay-nike-killshot-2-leather-nam-trang-nau-02.jpg', NULL, NULL),
(148, 30, 'giay-nike-killshot-2-leather-nam-trang-nau-03.jpg', NULL, NULL),
(149, 30, 'giay-nike-killshot-2-leather-nam-trang-nau-04.jpg', NULL, NULL),
(150, 30, 'giay-nike-killshot-2-leather-nam-trang-nau-05.jpg', NULL, NULL);

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale` decimal(5,2) NOT NULL DEFAULT '0.00',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `sale`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Nike Air Zoom Pegasus 40 Premium - Xanh Lam', 'Qui consequuntur minus doloribus quasi. Accusamus saepe expedita delectus occaecati tempore vero voluptatem.', 478.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(2, 'Nike Air Max SC - Đen Xám', 'Nam eum nostrum voluptas repellendus consequatur dicta. Dolorem aut laudantium minima consectetur ratione dolores.', 555.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(3, 'Nike Revolution 7 - Trắng Đỏ', 'Rerum incidunt quia rem praesentium omnis.', 958.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(4, 'Nike Dunk Low Retro Premium - Nâu Xanh', 'Atque temporibus eveniet atque eligendi deserunt.', 996.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(5, 'Nike Air Max AP - Trắng Navy', 'Rem quam consequatur totam cupiditate ex cupiditate quia. Quae qui voluptatum consequatur corporis impedit ea et.', 876.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(6, 'Nike E-Series AD - Đen Trắng', 'Quae sed ullam ipsam. Omnis consequuntur sunt numquam totam molestiae soluta fuga magni.', 907.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(7, 'Nike Air Max Command Leather - Xanh Navy', 'Et qui voluptatem placeat sed ut veritatis dolorem nam. Molestiae quia corrupti facere in quis.', 733.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(8, 'Nike Dunk Low Retro Premium - Xanh Trắng', 'Eaque velit eos fuga dolore vitae reprehenderit. Est maxime sed molestiae eum libero repudiandae consequuntur.', 747.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(9, 'Nike Air Winflo 10 - Trắng Xanh', 'Et molestiae vel veritatis dolorem aliquam ipsum voluptatem.', 966.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(10, 'Nike MC Trainer 2 - Xám', 'Vitae quasi excepturi vero ex voluptas itaque.', 956.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(11, 'Nike Renew Run 4 - Đen Đen', 'Error est et quod dolorem et.', 835.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(12, 'Nike Jordan Nu Retro 1 Low - Trắng Vàng', 'Dignissimos quaerat qui sit ex nihil iste recusandae id.', 921.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(13, 'Nike Air Zoom Pegasus 40 - Đen Full', 'Ea possimus corrupti unde ab harum.', 168.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(14, 'Nike Air Max SC - Xám Xanh', 'Aut quisquam eveniet aspernatur possimus quisquam error.', 395.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(15, 'Nike Air Max Excee - Đen Đen', 'Nobis rerum est magnam laboriosam sint dolorem nesciunt qui.', 564.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(16, 'Nike Air Max Impact 4 - Navy Đen', 'Ex nobis qui vel eveniet quisquam.', 100.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(17, 'Nike In-Season TR 13 - Đen Trắng', 'Ut quibusdam a ea aut minus labore.', 212.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(18, 'Nike Jordan Stadium 90 - Trắng Đỏ', 'Laboriosam nobis aliquid delectus tempore modi dolor quae.', 904.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(19, 'Nike Killshot 2 Leather - Trắng Đen', 'Et at voluptatibus est tempora.', 661.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(20, 'Nike Air Max Command Leather - Đen', 'Quisquam quo totam possimus mollitia facilis necessitatibus optio.', 749.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(21, 'Nike Wearallday - Trắng Đen', 'Porro modi possimus nisi debitis.', 824.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(22, 'Nike Air Max Axis - Trắng Đen', 'Occaecati voluptas unde voluptas sint eaque accusamus.', 297.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(23, 'Nike Air Max Excee - Trắng Xanh Dương', 'Corporis debitis omnis ut.', 129.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(24, 'Nike Pegasus Turbo Next Nature - Camo', 'Enim et repudiandae autem est asperiores. Nesciunt eaque non accusamus atque ut.', 457.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(25, 'Nike ReactX Infinity 4 - Đen Xanh', 'Dignissimos aut optio consequuntur et quod eum. Earum perspiciatis culpa reprehenderit sit quod.', 135.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(26, 'Nike Air Zoom Structure 25 - Đen Xanh Lá', 'Dicta voluptate rerum ullam molestiae quod laudantium. Aut nihil commodi pariatur quasi fugit.', 803.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(27, 'Nike Air Zoom Structure 25 - Xanh Đen', 'Quam aut laborum rerum. Sed quo non dignissimos aspernatur.', 784.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(28, 'Nike Air Jordan 1 Low - Xanh Đen', 'Cum aliquid non cupiditate consectetur ut voluptas ut reprehenderit.', 685.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(29, 'Nike Ebernon Low Premium - Trắng Đen', 'Voluptates blanditiis accusantium culpa dolor tempora.', 745.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25'),
(30, 'Nike Killshot 2 Leather - Trắng Nâu', 'Magni accusantium unde quod.', 194.00, 0.00, 1, 1, '2024-02-27 03:23:25', '2024-02-27 03:23:25');

CREATE TABLE `product_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_brand` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'giay-nike', NULL, NULL),
(2, 'Puma', 'giay-puma', NULL, NULL),
(3, 'Adidas', 'giay-adidas', NULL, NULL),
(4, 'New Balance', 'giay-new-balance', NULL, NULL),
(5, 'Vans', 'giay-vans', NULL, NULL),
(6, 'Converse', 'giay-converse', NULL, NULL);

CREATE TABLE `product_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Giày', 'giày dép', NULL, NULL),
(2, 'Phụ kiện', 'phụ kiện', NULL, NULL);

CREATE TABLE `product_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `shopping_session` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shopping_session` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(3, 13, NULL, NULL, NULL),
(4, 20, NULL, NULL, NULL),
(5, 21, NULL, NULL, NULL),
(6, 22, NULL, NULL, NULL),
(7, 23, NULL, NULL, NULL);

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` char(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `name`, `email`, `telephone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Đỗ Hữu Tuấn', 'dotuan458@gmail.com', '0393490572', NULL, '$2y$12$bW0dZu2J1fh1mUoYoM6LV.SW348MBExH74V8dK8HjfxxJW3VngyRi', NULL, '2024-03-13 00:18:20', '2024-03-13 00:18:20'),
(19, 'Bùi Đức Hùng', 'duchung04st@gmail.com', '0379544677', NULL, '$2y$12$/56C923gvKgNGfblzEBTOOPXZY/FWUkKvA2ug7Qy5UO/GQgyYRz4O', NULL, '2024-03-19 16:25:48', '2024-03-19 16:25:48'),
(20, 'henry', 'thinhcon1912@gmail.com', '0395289830', NULL, '$2y$12$AgCb5YjDmNl07ACAj73ykuvRPjj1hMWW/GEPtNYFEXK5AherDwfnC', NULL, '2024-03-20 02:48:51', '2024-03-20 02:48:51'),
(21, 'Test', 'maumai07@gmail.com', '0393490579', NULL, '$2y$12$k3gxMvhnO2utxD3jGeUTFOps9.56A7Az3E4oK0tVnpyKPeIJEgNKW', NULL, '2024-03-27 03:16:04', '2024-03-27 03:16:04'),
(22, 'Lê', 'ledinhtu880@gmail.com', '0865176605', NULL, '$2y$12$7AHSg4NNTlkexF.jEwFzWOb8fML2homy6N.5KeVI4BmuX1ILmdPuq', NULL, '2024-03-27 07:45:44', '2024-03-27 07:45:44'),
(23, 'nguyen thom', 'nguyenthithom17012003@gmail.com', '0358711261', NULL, '$2y$12$AkU34aMURnhZd7H9aATWAOkRTQG80CFAicjbz4yey6LqeyU7xWHXe', NULL, '2024-03-27 10:19:57', '2024-03-27 10:19:57');


ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_session_id_foreign` (`session_id`),
  ADD KEY `cart_item_product_id_foreign` (`product_id`);

ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_name_unique` (`name`);

ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_id_foreign` (`product_id`);

ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`),
  ADD KEY `order_discount_id_foreign` (`discount_id`);

ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name_unique` (`name`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_brand_id_foreign` (`brand_id`);

ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_name_unique` (`name`);

ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_inventory_product_id_foreign` (`product_id`);

ALTER TABLE `shopping_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_session_user_id_foreign` (`user_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_telephone_unique` (`telephone`);


ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE `product_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `product_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

ALTER TABLE `shopping_session`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;


ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_item_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `shopping_session` (`id`) ON DELETE CASCADE;

ALTER TABLE `image`
  ADD CONSTRAINT `image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

ALTER TABLE `order`
  ADD CONSTRAINT `order_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

ALTER TABLE `product_inventory`
  ADD CONSTRAINT `product_inventory_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

ALTER TABLE `shopping_session`
  ADD CONSTRAINT `shopping_session_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
