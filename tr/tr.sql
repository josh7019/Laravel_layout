SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `tr` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tr`;

CREATE TABLE `element_detail` (
  `element_detail_id` int(10) UNSIGNED NOT NULL,
  `element_list_id` int(10) UNSIGNED DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `element_detail` (`element_detail_id`, `element_list_id`, `user_id`, `name`, `type`) VALUES
(5, 1, 2, 'a', 0),
(6, 1, 2, 'b', 1),
(7, 1, 2, 'c', 1),
(8, 1, 2, 'd', 2),
(9, 2, 2, 'a', 0),
(10, 2, 2, 'b', 1),
(11, 2, 2, 'c', 1),
(12, 2, 2, 'd', 2),
(13, 4, 2, 'sd', 0),
(14, 5, 2, 'sd', 0),
(15, 6, 2, 'ss', 0);

CREATE TABLE `element_list` (
  `element_list_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `element_list` (`element_list_id`, `user_id`, `name`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 2, 'a', 0, '2019-09-12 03:54:19', '2019-09-12 03:54:19'),
(2, 2, 'b', 0, '2019-09-12 03:54:24', '2019-09-12 03:54:24'),
(3, 2, 'c', 0, '2019-09-12 03:59:34', '2019-09-12 03:59:34'),
(4, 2, 'd', 0, '2019-09-12 03:59:43', '2019-09-12 03:59:43'),
(5, 2, 'e', 0, '2019-09-12 04:01:22', '2019-09-12 04:01:22'),
(6, 2, 'sdsd', 0, '2019-09-12 06:40:03', '2019-09-12 06:40:03');

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `cash` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `permission` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:正常 1:凍結 2:管理者權限',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `account`, `password`, `id_number`, `name`, `cash`, `created_at`, `updated_at`, `permission`, `token`) VALUES
(1, 'joshtest', '0000', 'A123456789', 'asd', 0, '2019-09-10 09:40:14', '2019-09-10 09:40:14', 1, NULL),
(2, 'joshtest2', '$2y$10$OnMfzM2BY75.Smz99qgiruMADYM6ngMbaIbLCNKJ8/5pLNg5OFGru', 'A123456789', 'ss', 0, '2019-09-10 19:06:26', '2019-09-11 22:49:27', 0, '7ow6j6BaIfFZSAUiUAbGuaQOC5aD3h2GxG87dK3u6CcESOH7NP1IEdt4vpwXKGfRQKIUZ7RmQS7aysNIp7kisSkxCMRrD63XQvJJSOQDW1UfygafPLYBBSFgcdpjZoDXNtjZ8ITosHMiJuSpT5DRne6cvnhkqNZexJUnG7m5g6tB1rBbj6XSok1ffrXsnaR6o131k7MmeGaeiYfSWjyGvotgYlpLBNhfvDTOmxOptAaTkrga785oITG5yd');


ALTER TABLE `element_detail`
  ADD PRIMARY KEY (`element_detail_id`);

ALTER TABLE `element_list`
  ADD PRIMARY KEY (`element_list_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `element_detail`
  MODIFY `element_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `element_list`
  MODIFY `element_list_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
