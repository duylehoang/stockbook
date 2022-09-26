-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2022 lúc 11:17 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `stockbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` int(11) DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `view` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `subtitle`, `background`, `content`, `status`, `category_id`, `view`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Lựa chọn tăng lãi suất', 'lua-chon-tang-lai-suat', 'Sau nhiều dự đoán, cuối cùng với sự “bật đèn xanh” của Thủ tướng.\r\nNgân hàng Nhà nước quyết định tăng lãi suất tiền gửi ngắn hạn dưới sáu tháng', 0, '<p>Sau nhiều dự đo&aacute;n, cuối c&ugrave;ng với sự &ldquo;bật đ&egrave;n xanh&rdquo; của Thủ tướng trong cuộc họp Ch&iacute;nh phủ s&aacute;ng 22/9, chiều c&ugrave;ng ng&agrave;y, Ng&acirc;n h&agrave;ng Nh&agrave; nước quyết định tăng l&atilde;i suất tiền gửi ngắn hạn dưới s&aacute;u th&aacute;ng th&ecirc;m 1%/năm, từ 4% l&ecirc;n 5%/năm.</p>\r\n\r\n<p><img src=\"http://localhost/stockbook/public/upload/images/hfuz_image-4.jpg\" style=\"height:201px; width:300px\" /></p>\r\n\r\n<h2>Đồng thời c&aacute;c loại l&atilde;i suất điều h&agrave;nh kh&aacute;c</h2>\r\n\r\n<p>Đồng thời c&aacute;c loại l&atilde;i suất điều h&agrave;nh kh&aacute;c như l&atilde;i suất t&aacute;i cấp vốn được ấn định 5%/năm; l&atilde;i suất t&aacute;i chiết khấu 3,5%/năm; l&atilde;i suất cho vay qua đ&ecirc;m trong thanh to&aacute;n điện tử giữa c&aacute;c ng&acirc;n h&agrave;ng l&agrave; 6%/năm.</p>\r\n\r\n<p>L&atilde;i suất tiền gửi từ s&aacute;u th&aacute;ng trở l&ecirc;n thuộc quyền quyết định của c&aacute;c ng&acirc;n h&agrave;ng, kh&ocirc;ng c&oacute; trần v&agrave; cũng kh&ocirc;ng c&oacute; s&agrave;n. Cho đến h&ocirc;m qua, l&atilde;i suất cao nhất tiền gửi 12 th&aacute;ng tr&ecirc;n thị trường l&agrave; 7,5%/năm. Một số ng&acirc;n h&agrave;ng từ h&ocirc;m nay sẽ &aacute;p dụng biểu l&atilde;i suất tiết kiệm mới. Đại diện một ng&acirc;n h&agrave;ng cho t&ocirc;i biết sẽ n&acirc;ng l&atilde;i suất tiền gửi 12 th&aacute;ng l&ecirc;n 8,5%/năm. Ba ng&acirc;n h&agrave;ng kh&aacute;c khẳng định mức 8% cho kỳ hạn tr&ecirc;n.</p>\r\n\r\n<h2>Đồng thời c&aacute;c loại l&atilde;i suất điều h&agrave;nh kh&aacute;c</h2>\r\n\r\n<p>Đồng thời c&aacute;c loại l&atilde;i suất điều h&agrave;nh kh&aacute;c như l&atilde;i suất t&aacute;i cấp vốn được ấn định 5%/năm; l&atilde;i suất t&aacute;i chiết khấu 3,5%/năm; l&atilde;i suất cho vay qua đ&ecirc;m trong thanh to&aacute;n điện tử giữa c&aacute;c ng&acirc;n h&agrave;ng l&agrave; 6%/năm.</p>\r\n\r\n<p>L&atilde;i suất tiền gửi từ s&aacute;u th&aacute;ng trở l&ecirc;n thuộc quyền quyết định của c&aacute;c ng&acirc;n h&agrave;ng, kh&ocirc;ng c&oacute; trần v&agrave; cũng kh&ocirc;ng c&oacute; s&agrave;n. Cho đến h&ocirc;m qua, l&atilde;i suất cao nhất tiền gửi 12 th&aacute;ng tr&ecirc;n thị trường l&agrave; 7,5%/năm. Một số ng&acirc;n h&agrave;ng từ h&ocirc;m nay sẽ &aacute;p dụng biểu l&atilde;i suất tiết kiệm mới. Đại diện một ng&acirc;n h&agrave;ng cho t&ocirc;i biết sẽ n&acirc;ng l&atilde;i suất tiền gửi 12 th&aacute;ng l&ecirc;n 8,5%/năm. Ba ng&acirc;n h&agrave;ng kh&aacute;c khẳng định mức 8% cho kỳ hạn tr&ecirc;n</p>', 1, 1, 3, 1, '2022-09-20 23:49:37', '2022-09-26 02:00:57'),
(4, 'Bài viết 4', 'bai-viet-4', 'sfefd', 0, '<p>dsdfdsfdsf123</p>', 1, 1, 3, 8, '2022-09-20 23:55:21', '2022-09-26 01:43:40'),
(5, 'Tổng bí thư: TP HCM cần đột phá về hạ tầng', 'tong-bi-thu-tp-hcm-can-dot-pha-ve-ha-tang', 'Tổng bí thư Nguyễn Phú Trọng yêu cầu TP HCM ưu tiên xây dựng, tạo bước đột phá mạnh hơn nữa về hệ thống kết cấu hạ tầng đô thị đồng bộ và hiện đại.', 0, '<h2>Đ&acirc;y l&agrave; một trong những y&ecirc;u cầu được Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng</h2>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những y&ecirc;u cầu được Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng đưa ra tại buổi l&agrave;m việc với Ban Thường vụ Th&agrave;nh uỷ TP HCM về t&igrave;nh h&igrave;nh kinh tế - x&atilde; hội, an ninh - quốc ph&ograve;ng v&agrave; x&acirc;y dựng Đảng, s&aacute;ng 23/9.</p>\r\n\r\n<p>Theo Tổng b&iacute; thư, th&agrave;nh phố cũng cần đổi mới, n&acirc;ng cao hiệu quả c&ocirc;ng t&aacute;c quy hoạch, thiết kế đ&ocirc; thị; chủ động phối hợp với c&aacute;c bộ, ng&agrave;nh Trung ương v&agrave; c&aacute;c địa phương trong v&ugrave;ng Đ&ocirc;ng Nam Bộ tập trung x&acirc;y dựng hệ thống giao th&ocirc;ng c&ocirc;ng cộng c&oacute; sức chở lớn; ph&aacute;t triển đường v&agrave;nh đai, đường tr&ecirc;n cao, c&aacute;c tuyến cao tốc, luồng t&agrave;u đường biển, đường s&ocirc;ng, tạo sự kết nối th&ocirc;ng suốt để ph&aacute;t huy tối đa c&aacute;c tiềm lực kinh tế của cả v&ugrave;ng v&agrave; th&agrave;nh phố.</p>\r\n\r\n<p><img src=\"http://localhost/stockbook/public/upload/images/9lm1_image-1.jpg\" style=\"height:200px; width:300px\" /></p>\r\n\r\n<p>&quot;Th&agrave;nh phố cần sớm khắc phục t&igrave;nh trạng yếu k&eacute;m về hạ tầng giao th&ocirc;ng, c&oacute; c&aacute;c giải ph&aacute;p căn cơ hơn nữa để xử l&yacute; c&aacute;c vấn đề về m&ocirc;i trường, ứng ph&oacute; biến đổi kh&iacute; hậu, nước biển d&acirc;ng; cấp, tho&aacute;t nước, chống ngập; xử l&yacute; chất thải...&quot;, &ocirc;ng n&oacute;i.</p>\r\n\r\n<blockquote>\r\n<p>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM c&oacute; sự phục hồi, ph&aacute;t triển ấn tượng khi vực dậy từ kết quả tăng trưởng &acirc;m năm 2021, đến tăng trưởng 3,82% trong 6 th&aacute;ng đầu năm nay</p>\r\n</blockquote>\r\n\r\n<p>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM c&oacute; sự phục hồi, ph&aacute;t triển ấn tượng khi vực dậy từ kết quả tăng trưởng &acirc;m năm 2021, đến tăng trưởng 3,82% trong 6 th&aacute;ng đầu năm nay. &Ocirc;ng cũng biểu dương th&agrave;nh phố đ&atilde; kiểm so&aacute;t được đợt dịch &quot;chưa từng c&oacute; tiền lệ, kh&ocirc;ng thể dự b&aacute;o&quot; nửa cuối năm ngo&aacute;i, v&agrave; giữ sự ổn định đến nay.</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>Bảng thống k&ecirc;</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">dssad</th>\r\n			<th scope=\"col\">dssdsa</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>sdsad</td>\r\n			<td>sdsad</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dsada</td>\r\n			<td>sdsad</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dsada</td>\r\n			<td>dsada</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dsada</td>\r\n			<td>dsada</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dsada</td>\r\n			<td>dsada</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"http://localhost/stockbook/public/admin/blogs/5/edit\">B&agrave;i viết mới</a></p>\r\n\r\n<ol>\r\n	<li>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM</li>\r\n	<li>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM</li>\r\n</ol>\r\n\r\n<p>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM</p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM</li>\r\n	<li>Về kinh tế, Tổng b&iacute; thư Nguyễn Ph&uacute; Trọng nhấn mạnh TP HCM</li>\r\n</ul>', 1, 9, 6, 9, '2022-09-22 23:56:48', '2022-09-26 02:04:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Default123', 1, 1, NULL, '2022-09-16 02:02:33'),
(9, 'Chuyện đó đây', 1, 2, '2022-09-22 23:54:28', '2022-09-22 23:54:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replied` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `replied`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', 'sadasd', 0, '2022-09-23 02:53:57', '2022-09-23 02:53:57'),
(9, 'Developer123', 'user@gmail.com', 'dfgdfgdfgdfg', 1, '2022-09-26 01:09:09', '2022-09-26 01:18:32'),
(10, 'Developer', 'duylehoang1802@gmail.com', 'Tôi muốn thấy kết quả\r\nCó xuống dòng và gạch ngang', 0, '2022-09-26 01:19:06', '2022-09-26 01:19:06'),
(11, 'Lê Hoàng Duy', 'duylehoang1802@gmail.com', 'dsfdsfds', 0, '2022-09-26 01:37:27', '2022-09-26 01:37:27'),
(12, 'Lê Hoàng Duy', 'duylehoang1802@gmail.com', 'fdsdfsdfsf', 0, '2022-09-26 01:40:49', '2022-09-26 01:40:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `type`, `status`, `sort_order`) VALUES
(2, 'n4mq_image-1.jpg', 4, 1, 1),
(4, 'zlqo_image-2.jpg', 5, 1, 2),
(6, 'hfuz_image-4.jpg', 6, 1, 4),
(7, '9lm1_image-1.jpg', 6, 1, 5),
(8, '6wlq_image-4.jpg', 3, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_09_09_030027_create_categories_table', 1),
(5, '2022_09_09_030039_create_blogs_table', 1),
(6, '2022_09_09_030058_create_contacts_table', 1),
(7, '2022_09_09_030115_create_settings_table', 1),
(8, '2022_09_21_014102_create_galleries_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'mail_server', '{\"mail_host\":\"smtp.gmail.com\",\"mail_port\":\"587\",\"mail_username\":\"haole0422@gmail.com\",\"mail_password\":\"dqahdxxlqmtpctgr\",\"sender_name\":\"Admin\",\"sender_mail\":\"haole0422@gmail.com\",\"encryption\":\"tls\"}', NULL, '2022-09-21 20:46:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoang Duy', 'duylehoang1802@gmail.com', 1, NULL, '$2y$10$XFcEZq0xG7nfSANI4cBIs.zF.hrx/NK1qp7eDlL0exHASblNVPk2W', NULL, NULL, '2022-09-21 02:55:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
