-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 06:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glassesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `color_id`, `quantity`, `total`) VALUES
(39, 13, 3, 3, 1, 150000),
(44, 8, 3, 5, 1, 150000),
(45, 8, 3, 6, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nameCategory` varchar(255) NOT NULL,
  `delCategory` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nameCategory`, `delCategory`) VALUES
(1, 'Kính cận', 0),
(2, 'Kính thời trang', 0),
(3, 'Kính râm', 0),
(4, 'Kính mát', 1),
(6, 'Kính người già', 1),
(7, 'kính mới', 1);

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `nameMethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`id`, `nameMethod`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateOrder` datetime NOT NULL DEFAULT current_timestamp(),
  `totalOrder` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `methodPay` int(11) NOT NULL,
  `voucherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `dateOrder`, `totalOrder`, `status`, `methodPay`, `voucherId`) VALUES
(10, 2, '2024-12-15 15:43:41', 1050000, 1, 2, NULL),
(11, 5, '2024-12-15 22:35:11', 450000, 3, 1, NULL),
(12, 2, '2024-12-17 06:47:27', 444000, 4, 1, 3),
(13, 8, '2024-12-17 17:40:04', 285000, 2, 1, 2),
(14, 8, '2024-12-20 20:53:54', 300000, 1, 1, NULL),
(15, 8, '2024-12-20 20:56:03', 300000, 1, 2, NULL),
(16, 8, '2024-12-20 21:54:15', 144000, 1, 1, 3),
(17, 8, '2024-12-20 21:55:46', 0, 1, 2, 1),
(18, 8, '2024-12-20 21:57:35', 0, 1, 1, 1),
(19, 8, '2024-12-20 22:00:05', 0, 1, 2, 1),
(20, 8, '2024-12-20 22:05:55', 194000, 1, 1, 3),
(21, 13, '2024-12-21 03:43:46', 360000, 1, 1, 4),
(22, 14, '2024-12-21 04:03:30', 300000, 1, 1, NULL),
(23, 8, '2024-12-21 04:05:33', 300000, 1, 2, NULL),
(24, 8, '2024-12-21 11:16:16', 240000, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `quantity`, `total`) VALUES
(8, 10, 3, 2, 4, 600000),
(9, 10, 3, 3, 3, 450000),
(10, 11, 3, 3, 2, 300000),
(11, 11, 3, 5, 1, 150000),
(12, 12, 3, 3, 2, 300000),
(13, 12, 3, 6, 1, 150000),
(14, 13, 3, 3, 1, 150000),
(15, 13, 3, 5, 1, 150000),
(16, 14, 3, 3, 2, 300000),
(17, 15, 3, 5, 1, 150000),
(18, 15, 3, 6, 1, 150000),
(19, 16, 3, 3, 1, 150000),
(20, 17, 3, 5, 3, 450000),
(21, 18, 3, 3, 2, 300000),
(22, 19, 3, 3, 2, 300000),
(23, 20, 2, 7, 1, 200000),
(24, 21, 2, 7, 2, 400000),
(25, 22, 3, 3, 2, 300000),
(26, 23, 3, 6, 2, 300000),
(27, 24, 3, 6, 2, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `codeProduct` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `nameProduct` varchar(255) NOT NULL,
  `mainImage` varchar(1000) NOT NULL,
  `descriptionProduct` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dateUp` datetime NOT NULL DEFAULT current_timestamp(),
  `delProduct` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `codeProduct`, `material`, `price`, `nameProduct`, `mainImage`, `descriptionProduct`, `category_id`, `dateUp`, `delProduct`) VALUES
(1, 'GK01', 'Titan', 100000, 'Gọng kính venus titan nữ', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/467294422_958522552968132_154330533227878502_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFtcGWWjGRi7bVNylr9-C8bzvvfMPje5XvO-98w-N7le1AnmlW6s4J4pxWMoHYXTCp17GpMIW9hwGAnREvy0O_n&_nc_ohc=gIK7KIFu2lcQ7kNvgH-eV2R&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=AxsndQ3mxFGed_IYNXBIriA&oh=00_AYDotZLxUAI4TVoJktxgO49Ar2D-CNx--f-Hwk8eESt-fQ&oe=6761FF52', 'Gọng kính rất đẹp', 2, '2024-12-15 07:48:28', 0),
(2, 'GK02', 'Titan', 200000, 'Gọng kính venus đa giác đẹp cho nữ', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/467238224_958522526301468_7655995823505740230_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFVWmBZ0aK-PG03Kd2389agaDAsJVhr57hoMCwlWGvnuMwm8xhnToFPqZ3xxeqIQYNOVIholzjd3dBWjzrMCQ9l&_nc_ohc=CpQVtGUNL8AQ7kNvgFc-4sB&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=A77FXB3aQk_gPXpwu9Nb-Go&oh=00_AYBSmYv3dOGXIPXTiCXZhR07ZLckCKt1P2i4ymIIQkx_Ng&oe=676226FA', 'Gọng kính rất hợp với bạn mặt to', 2, '2024-12-15 07:48:28', 0),
(3, 'GK08', 'Nhựa acrylic', 150000, 'Kính đen thời trang cho nam', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/451421048_874280278059027_7324291419832865777_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEBHH--a5m3qJk8d55LzufcsdZ4V5u9Seyx1nhXm71J7CSz0fpiaCF4QrI0b7qbdeKz8l37FdIg94Yuwhj7tGJs&_nc_ohc=VTOEVvAgBogQ7kNvgFZ5Iu6&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=Ayr0B6P730ljr2smAflyZ2q&oh=00_AYCG4Utd28jOn09BTILcQ58gsgbbgiH8TCwfKdzw5Z6g0A&oe=67621A66', 'Gọng kính rất ngầu', 1, '2024-12-15 07:48:28', 0),
(4, 'GK09', 'Nhựa dẻo', 160000, 'Kính màu rêu thời trang cho nam', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/451580609_874280261392362_160892067147919534_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEs8kFCGuMbi33MAUoreCmFq7teD0o5lOyru14PSjmU7A_vCpXf3dDhR8nV1y_7xhhwPenNZlZJHOUqGqATK1Np&_nc_ohc=jt7fFIW33MsQ7kNvgGjB3Gv&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=AsgP01O9DICWDsOKwI_DvZL&oh=00_AYBIN9ZvQg4n4gnXYH-av7v608QpR6m727LwqzPN1OrZoQ&oe=67621AE3\r\n', 'Gọng kính rất đẹp', 1, '2024-12-15 07:48:28', 0),
(6, 'GK03', 'Nhựa', 150, 'Gọng kính cận thời trang', 'https://scontent.fhan2-3.fna.fbcdn.net/v/t39.30808-6/453503910_883853360435052_58780144237341126_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHqLCSeYcy6NQAJq72MmUFXb1kadoUNkgVvWRp2hQ2SBa2deWhEL1SxoydcbAfjNzAaXZh6SU9eTw43TtByFwCH&_nc_ohc=t1So4Cw-VSYQ7kNvgGMGxSB&_nc_oc=AdiccOPMRj448VvscqxLYwpjj8GyuxIfJlia8KA3nQ_7Klj8lmdTUmgZWBy6hv7QMFE&_nc_zt=23&_nc_ht=scontent.fhan2-3.fna&_nc_gid=A6RsCpPQLl_1j-KAL9ItVcf&oh=00_AYAdc6CED6n7SRB-KR3OPtH3ccFeRqxfg7dp3SEsjTnyWg&oe=676C7213', 'Kính phù hợp với mọi dáng mặt, giúp các chị em tự tin thả dáng', 1, '2024-12-21 19:21:20', 0),
(7, 'GK04', 'Nhựa dẻo', 160, 'Gọng kính dẻo', 'https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-6/452361438_878493370971051_3653888303754910722_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGbQUZ3GqmBDwZaM59-I7y3KUErc1jmdgspQStzWOZ2C7y8WFspFwwepjhrtkU8ahuPFF13EAPR4z2fr-Ja03hx&_nc_ohc=SsdPpoyoQrMQ7kNvgGPI_02&_nc_oc=Adiq_y0LFMUz97s6QGluVuLudzsCPkbhBmJX3agFVCSoFssiVoW0cLcmBlTmgZGoKzI&_nc_zt=23&_nc_ht=scontent.fhan2-4.fna&_nc_gid=AxqY880-ge0DTxXSyrjKOi1&oh=00_AYCWj7f16QHbiBF4okz_41RXiNmoYDlxuHT1ZinO4we1AQ&oe=676C8880', 'Phù hợp với mọi giới tính, tạo cảm giác thời thượng cho khách hàng', 2, '2024-12-21 19:25:13', 0),
(8, 'GK05', 'Nhựa dẻo', 300, 'Gọng kính bầu dục', 'https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-6/449701504_866285878858467_7232458169271652613_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGtRRE5pe6KZ0GUuw-lYTTR6CqdqEBz5k_oKp2oQHPmT8Sw3Q_G5LoFi2gB2RskMPSG1M1_5Dl6oVY1fJbe5WAq&_nc_ohc=h_2GJwUhhv0Q7kNvgEVpTF2&_nc_oc=AdjeoYySnEuC_Rw-bumYFgVSjMT9UnIl8Mb49kAN0UsjhyDGBIQZ8-i9Wam6LCg49AY&_nc_zt=23&_nc_ht=scontent.fhan2-4.fna&_nc_gid=Ag0o7Ixe7NqCU4JrbvwqWwy&oh=00_AYDiLy1QySxV0C_a54A0uQXFjNHbL-6Lt14OI2UF7hOq2g&oe=676C7003', 'Gọng kính \"hot\", bắt kịp xu hướng cùng Venus', 2, '2024-12-21 19:27:30', 0),
(9, 'GK06', 'Nhựa dẻo', 250, 'Gọng kính cận', 'https://scontent.fhan2-3.fna.fbcdn.net/v/t39.30808-6/357508238_650199980467059_2183595213089507982_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHdnOp_xOvBH7TgxN9solmtsy4kAmCRnX2zLiQCYJGdfU5MG5dAA0u7s8XAybYLxHS1iJSnR6qZpawJKM8jSGfL&_nc_ohc=EV-Rnt-P44IQ7kNvgF42lud&_nc_oc=AdhTpg_aiQ3L1tvpAu5upN2GZN0Nka13CQKkBuSOaPKBxfZF9vpgSLuhJN4eu1NOVZM&_nc_zt=23&_nc_ht=scontent.fhan2-3.fna&_nc_gid=AfXMhRRPg4bs6a0k6IWFjZo&oh=00_AYAUdMCKaDIC93V0KA8uUPZuT6u8JPcCgApZ08vW9dSS3Q&oe=676C73DA', 'Gọng kính cận phù hợp mọi lứa tuổi, trải nghiệm ngay cùng Venus', 1, '2024-12-21 19:29:37', 0),
(10, 'GK07', 'Nhựa dẻo', 400, 'Kính râm gọng vuông', 'https://scontent.fhan2-5.fna.fbcdn.net/v/t39.30808-6/341633790_181523961021262_263293509013047506_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHsT1913rKnKD0m6XaZt3amiRHAi6CW0W6JEcCLoJbRbkB-zf6EVCvjwOPXV_1yER-x3RZeiZvOK_CzIUvCBTpB&_nc_ohc=OaPEyem_e-kQ7kNvgGXu4IA&_nc_oc=Adi6NsjkaQNa2kzKqzzzGwshaDrkPZsHFh7Zdoz8krepTcelfxHzWEKHmJgeiqAFA2I&_nc_zt=23&_nc_ht=scontent.fhan2-5.fna&_nc_gid=AWULFe8PwJdykHaLFfcAMe7&oh=00_AYAuCeo9gJBt9OxzTlUexbZf0KeJsiqq_Ysz4s-0MzXEzw&oe=676C921C', 'Gọng kính râm thời thượng, bảo vệ mắt của bạn khỏi ánh mặt trời', 3, '2024-12-21 19:31:23', 0),
(11, 'GK10', 'Nhựa dẻo pha titan', 500, 'Kính râm dành cho phái đẹp', 'https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-6/341212082_1104192137204000_4983215352545313102_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEXg9eCpDwcEWJcmwIQFelfp0Ga3wPcLdynQZrfA9wt3K9DJtxI4z9fvVYv6CwUukfMbl7yYYmV4R2vO3S8sWYa&_nc_ohc=KKjrKoZnGVIQ7kNvgGZlHlW&_nc_oc=AdghBZ1_Bgl_jQuO4YEuxpAJCC2Bvvg_TwWUHmy1vrDxYa2IJn6jVRk6LUlDIde1Zfc&_nc_zt=23&_nc_ht=scontent.fhan2-4.fna&_nc_gid=AIpsVy81AD5PGv4GD4gjzTu&oh=00_AYB05duH49LR0oeUS1wa2JKfGAPPFSe6MujhqVNw8G8XdQ&oe=676C9BF7', 'Kính râm siêu thời thượng cho các chị em, trải nghiệm cùng Venus ngay thôi', 3, '2024-12-21 19:32:50', 0),
(12, 'GK11', 'Kim loại', 150, 'Kính cận cho phái đẹp', 'https://scontent.fhan20-1.fna.fbcdn.net/v/t39.30808-6/333262688_156662160536128_7186147655642574777_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeG70-voNOItWcOpzVQJyjmci2IIGGaTRRaLYggYZpNFFlcq8w9SiRGuviZCSyx7xdbZJZlleyZCWEJc8dMoEfg6&_nc_ohc=jLNyHJh4vsYQ7kNvgGbj2nQ&_nc_oc=AdiPA1W3MIR828gNbF96aUI9agBsvv41D8YCW8N5EQPd7rz5pIr6MPXOvpYNnzDqyF4&_nc_zt=23&_nc_ht=scontent.fhan20-1.fna&_nc_gid=ASU3p9e8foVtUQ8Cmhntvvs&oh=00_AYBt4eaMb7Ffn2j0NGPRIjfvuoGJ3bxW5ki7JK_9UTIXFA&oe=676C8E15', 'Gọng kính nhỏ gọn, siêu phù hợp với các chị em ưa sự tiện lợi', 1, '2024-12-21 19:34:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `nameColor` varchar(255) NOT NULL,
  `codeColor` varchar(255) NOT NULL,
  `delColor` tinyint(4) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `nameColor`, `codeColor`, `delColor`, `product_id`, `quantity`) VALUES
(3, 'Màu xám', '#808080', 0, 3, 0),
(5, 'Màu đen', '#000000', 0, 3, 44),
(6, 'Màu nâu', '#abc', 0, 3, 4),
(7, 'Đen', '#123', 0, 2, 7),
(8, 'Màu trắng', '#000001', 0, 6, 5),
(9, 'Màu đen', '#000000', 0, 6, 10),
(10, 'Màu trắng', '#000001', 0, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `linkImage` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `linkImage`, `product_id`) VALUES
(1, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcS3f9XPGmV1oI58RaC2-pqwc8N7LbwiLpZXX-oUTD6IJJKow6QXmCUs67mu7FewLxHaJqRGDu8WyZukTVm3cE8E5fgMJa0slTlVNV1nfQyOBDWmZG6etKNG&usqp=CAE', 3),
(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6pKxoA-61-_Z-fm8inL9QAT8J9OBlrlyhGQ&s', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nameRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nameRole`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3X8THtheb8nXs321xgamsezaqpxzM24qN2o5Ee9J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajRkVTZVUHNMc2dNNU9vaEtubTEwSUhYMDl1aWNBZm03R3VNNjgxWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734845548),
('7j6naR6MlpbPr9w2Z6qwm8DlL7m16qtzoWAChbzs', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0NSYjZnRzBaUGtQUVpHMjZQVGVXWFRJbHpQWGg1SG9mS1ZLbFBjWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGFmZiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE2O30=', 1734797841),
('YwwEDNGSeMBGf4hs9IRpvRXUBFatMYL7fWGBK0ro', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkR1cmhDQXc4ZkNZSG45b1dLMG53UlpvdnNGNk4xd05sUDliNHpsZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGFmZi9vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE2O30=', 1734785602);

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `nameStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id`, `nameStatus`) VALUES
(1, 'Đang chờ duyệt'),
(2, 'Đã duyệt'),
(3, 'Đang vận chuyển'),
(4, 'Đã vận chuyển');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `delUser` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone`, `role_id`, `delUser`) VALUES
(2, 'Nguyễn  Vũ Đại Nam', 'nguyenvudaianm113@gmail.com', NULL, '$2y$12$6mNmjMF0jTke2.i2WcPvCugiFqiJhR4qXD80XKEBA8ngQjTHsvwE2', NULL, '2024-12-14 20:44:44', '2024-12-14 20:44:44', 'Bình Thạnh', '0365245602', 3, 0),
(3, 'Nguyễn Ngọc Thạch', 'thachnnps32314@fpt.edu.vn', NULL, '$2y$12$NzGorpBaSSOPVFFBI7mUTOreNLVSXJXcd3DkCT98p0QmM1082IWg.', NULL, '2024-12-15 02:25:03', '2024-12-21 04:21:23', 'Hà Nội', '0365245603', 2, 0),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$12$0s.5yPfGYwzQ3TxnGmN8o.74B7RPP9BWLJk14VzQDdb6K.1XFIj.u', NULL, '2024-12-15 02:32:23', '2024-12-15 02:32:23', 'Hà Nội', '0365245602', 1, 0),
(5, 'Kiều Trang', 'trang@gmail.com', NULL, '$2y$12$mFGRj5o1DM7Egw80RCVcxOnSBb7zWMFFKL9JtLfQLLZkZYfT7pwem', NULL, '2024-12-15 08:31:36', '2024-12-15 08:31:36', 'Hà Nội', '0365245602', 3, 0),
(6, 'Lê Trung Hiếu', 'hieu@gmail.com', NULL, '$2y$12$0azhM2Hjl42vL1bd.R5NIetOg9ojqQQ76HozlTVmZaTY58RauA/QW', NULL, '2024-12-16 16:18:05', '2024-12-16 16:18:05', 'Cộng Hòa', '0365245602', 2, 0),
(7, 'Phương', 'phuong@gmail.com', NULL, '$2y$12$8eshO98/Pu1lqSJsTGGPWul.4SX62oCQO1A.e94bObtmfKC3KJYFi', NULL, '2024-12-16 22:43:12', '2024-12-16 22:43:12', 'Thanh Xuân', '0987654321', 2, 0),
(8, 'Duy', 'duy@gmail.com', NULL, '$2y$12$MMLbxGd68x1szQJnO5Au9uvFRLFhzeYBQm1f/7HZqtN5o3v/.V5KG', NULL, '2024-12-16 23:02:12', '2024-12-21 04:17:45', 'Thanh Xuân', '0912345678', 3, 0),
(9, 'Giang', 'giang@gmail.com', NULL, '$2y$12$ZmbdDnc4buP8R5ZyX3/3hOvd2MM1C6G9hy8j18/B4BHxQwDnS3QCq', NULL, '2024-12-17 00:38:42', '2024-12-17 00:38:42', 'Lĩnh Nam', '0987654321', 2, 0),
(10, 'Hiền', 'hien@gmail.com', NULL, '$2y$12$G0LWcuJl0H8wZwpipWXG/eOTFd19KokU2oWT3LNaxBPQNTIWfaVA.', NULL, '2024-12-17 03:01:01', '2024-12-17 03:01:01', 'Hải Phòng', '0897654321', 2, 0),
(11, 'Nhâm', 'nham@gmail.com', NULL, '$2y$12$9NnT2JI4BA5FoR9Is05CGOFSq/RhpGXOmNeL4BlVOyce0bBOra1lm', NULL, '2024-12-19 02:08:23', '2024-12-19 02:40:46', 'Đống Đa', '0375547472', 2, 0),
(12, 'Trần Duy 1', 'duy1@gmail.com', NULL, '$2y$12$IQBQ/EyCmQKNvJcxdaNZ1Owd/KpMcSh6CECIygQ4v8y2IrCI/q8Si', NULL, '2024-12-20 11:54:51', '2024-12-20 11:55:37', 'Thanh Xuan', '0987654321', 2, 0),
(13, 'phuong18', 'phuong18@gmail.com', NULL, '$2y$12$PA2Mz29BOd8s5gMl0X/Tn.NevoCJmYpCZ3qEyc.9vt2KmSDrXZ9w2', NULL, '2024-12-20 20:42:14', '2024-12-20 20:42:14', 'Hà Nội', '0876543219', 3, 0),
(14, 'Nhật Anh', 'ca@gmail.com', NULL, '$2y$12$fjUnxEzV8KRlJjBSEcr67ePetmwndMsbqQ1F8fGQWVMVkmtJghL7y', NULL, '2024-12-20 21:02:37', '2024-12-20 21:02:37', 'Bùi Xương Trạch', '0355276478', 3, 0),
(15, 'my', 'my@gmail.com', NULL, '$2y$12$51Mv4ihrg05Vk3UX.wUqJesMqi/2qvjyt8xuXfET0xwKfy.GJW2T6', NULL, '2024-12-21 04:21:52', '2024-12-21 04:21:52', 'hà nội', '0987866566', 2, 0),
(16, 'nhật anh', 'leanh@gmail.com', NULL, '$2y$12$S7D98DsLuPIcYpPw/UQaGOB3Mtsjn7DHEISI6kaDblSz0J04eN6M2', NULL, '2024-12-21 05:52:29', '2024-12-21 05:52:29', 'Bùi Xương Trạch, Khương Đình', '0355276995', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `nameVoucher` varchar(255) NOT NULL,
  `discount` float NOT NULL,
  `delVoucher` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `nameVoucher`, `discount`, `delVoucher`) VALUES
(1, 'VENUS60', 60000, 0),
(2, 'VENUS15', 15000, 0),
(3, 'VENUS6', 6000, 0),
(4, 'VENUS40', 40000, 0),
(5, 'VENUS80', 80000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_cart` (`user_id`),
  ADD KEY `fk_product_cart` (`product_id`),
  ADD KEY `fk_color_cart` (`color_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_order` (`user_id`),
  ADD KEY `fk_method_order` (`methodPay`),
  ADD KEY `fk_status_order` (`status`),
  ADD KEY `fk_voucher_order` (`voucherId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id_details` (`order_id`),
  ADD KEY `fk_product_detail` (`product_id`) USING BTREE,
  ADD KEY `fk_color_detail` (`color_id`) USING BTREE;

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id_product` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_color` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_image` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_role_user` (`role_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_color_cart` FOREIGN KEY (`color_id`) REFERENCES `product_color` (`id`),
  ADD CONSTRAINT `fk_product_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_method_order` FOREIGN KEY (`methodPay`) REFERENCES `method` (`id`),
  ADD CONSTRAINT `fk_status_order` FOREIGN KEY (`status`) REFERENCES `status_order` (`id`),
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_voucher_order` FOREIGN KEY (`voucherId`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id_details` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id_product` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `fk_product_id_color` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_id_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
