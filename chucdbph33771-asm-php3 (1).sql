-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 03:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chucdbph33771-asm-php3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartproducts`
--

CREATE TABLE `cartproducts` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm bán chạy', 'categories/ctLPmVULUOYag9ukrLqcBUN8Qz9VolK5gtB9J0If.jpg', '2024-07-17 06:53:45', '2024-07-17 06:53:45'),
(2, 'Sản phẩm nổi bật', 'categories/W6ElyfLiCvu0qsTqN5xoRGLNDPaym0txXdyqNuu8.jpg', '2024-07-17 06:55:12', '2024-07-17 06:55:12'),
(3, 'Phòng làm việc', 'categories/R6Uyc04akToocYHlL11PtWi4MTibLlRqPCVGTIrB.jpg', '2024-07-17 06:57:00', '2024-07-17 06:57:00'),
(4, 'Phòng bếp', 'categories/ejhVtAZCclOqwZ76bB6ixLF7zj3KgXALageKVSnC.jpg', '2024-07-17 06:57:23', '2024-07-17 06:57:23'),
(5, 'Phòng ngủ', 'categories/flw6TZBbfUXU9dggF8cxEdbJZWKqVxIokDBGQOk1.jpg', '2024-07-17 06:57:47', '2024-07-17 06:57:47'),
(6, 'Phòng khách', 'categories/dUVEHGIeo76OX8RMmZSBTrcxEoUIGycYdEs0ySGN.jpg', '2024-07-17 06:58:02', '2024-07-17 06:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2024_07_16_025553_create_categories_table', 1),
(28, '2024_07_16_070605_create_products_table', 1),
(29, '2024_07_16_145945_create_cartproducts_table', 1),
(30, '2024_07_17_030118_create_orders_table', 1),
(31, '2024_07_17_030124_create_productorders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` int NOT NULL,
  `sumprice` int NOT NULL,
  `sumquantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `sumprice`, `sumquantity`, `created_at`, `updated_at`) VALUES
(12, 1, 1400000, 2, NULL, NULL),
(13, 1, 700000, 1, NULL, NULL),
(14, 1, 1500000, 2, NULL, NULL),
(15, 1, 600000, 12, NULL, NULL),
(16, 1, 800000, 1, NULL, NULL),
(17, 1, 120000, 1, NULL, NULL),
(18, 1, 987000, 3, NULL, NULL),
(19, 1, 990000, 1, NULL, NULL),
(20, 1, 888000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE `productorders` (
  `id` bigint UNSIGNED NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productorders`
--

INSERT INTO `productorders` (`id`, `id_order`, `id_product`, `quantity`, `created_at`, `updated_at`) VALUES
(14, 9, 2, 1, NULL, NULL),
(15, 10, 2, 1, NULL, NULL),
(16, 11, 2, 1, NULL, NULL),
(17, 12, 1, 1, NULL, NULL),
(18, 12, 2, 1, NULL, NULL),
(19, 13, 3, 1, NULL, NULL),
(20, 14, 2, 1, NULL, NULL),
(21, 14, 3, 1, NULL, NULL),
(22, 15, 1, 12, NULL, NULL),
(23, 16, 2, 1, NULL, NULL),
(24, 17, 16, 1, NULL, NULL),
(25, 18, 20, 3, NULL, NULL),
(26, 19, 6, 1, NULL, NULL),
(27, 20, 18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Ghế bành thư giãn houston', 600000, 'products/QrPsD6Vpe9a0GIIaNil4vYkvGBzjBggCahW9Wghq.webp', 'Ghế bành HOUSTON là bộ sưu tập của phong cách hiện đại, tập trung vào hình dáng, đường nét và thẩm mỹ sạch sẽ.', 2, '2024-07-17 07:02:44', '2024-07-17 07:02:44'),
(2, 'Ghế Ăn Gỗ Sồi HARRIS', 800000, 'products/tXtPS6cywawTWnhOILI2QDtUdfIgtVIfXRf6moUb.webp', 'Ghế ăn HARRIS là sản phẩm mang thiết kế đơn giản nhưng vô cùng chắc chắn  Ghế ăn HARRIS rất phù hợp cho phối hợp với các dụng cụ bộ bàn ghế HARRIS cùng loại', 2, '2024-07-17 07:04:00', '2024-07-17 07:04:09'),
(3, 'Nệm Foam lò xo 1m2, 1m6, 1m8 TONKIN', 700000, 'products/518yJn0Zy3Q2xhJsdHoDBAgaewQd3MRBXULbo1XO.webp', 'Giấc ngủ là một phần quan trọng trong cuộc sống của chúng ta, và để có một giấc ngủ trọn vẹn, một chiếc nệm chất lượng là điều không thể thiếu.', 2, '2024-07-17 07:05:19', '2024-07-17 07:05:19'),
(4, 'Bàn Cà Phê BARCELONA Xám Nhạt', 560000, 'products/YEAOwYQ4GtdjkdtVhB7cs99K9DoArLK1Tl2ah5Ow.webp', 'Bạn đang tìm kiếm \"bạn đồng hành\" cho chiếc sofa của mình ư? Không cần phải tìm đâu xa nữa, chiếc bàn góc CARINE', 2, '2024-07-17 07:07:53', '2024-07-17 07:07:53'),
(5, 'Bàn Cà Phê DOMINIK', 880000, 'products/8jU5cHktWqkjkBEa7YvlVTKOawCLybuOHw4qOOwZ.webp', 'Bàn trà DOMINIK là một sản phẩm nội thất hiện đại, phù hợp với nhiều không gian phòng khách khác nhau. Bàn có kích thước 1000 x 550 x 450 mm,', 6, '2024-07-17 07:09:08', '2024-07-17 07:10:10'),
(6, 'Ấm Trà TURKOIS', 990000, 'products/ZvDb59s947r4BHHvkzwjuhOZOzJFspPZEcFrWaCk.webp', 'Ấm trà TURKOIS là lựa chọn hoàn hảo cho không gian chuyện trò ấm cúng. Thuộc bộ sưu tập thiết kế đặc biệt của BAYA được sản xuất tại Bát Tràng', 6, '2024-07-17 07:10:02', '2024-07-17 07:10:02'),
(7, 'Ghế bệp bênh Viking-tour', 860000, 'products/vFxZ9k37roYf7AhIA4inFRTxuDfoesMIZQiRmuft.webp', 'Chiếc ghế bành VIKING TOR mang thiết kế tạo sự thoải mái cho người ngồi với khung gỗ bạch dương chắc chắn và đệm ngồi êm ái', 6, '2024-07-17 07:11:59', '2024-07-17 07:11:59'),
(8, 'Kệ trưng bày 4 tầng', 660000, 'products/TEjej5RkbXJgysH50OwmHf0mh48hGVjCw5kCqsxi.webp', 'Được làm từ chất liệu gỗ MDF bền chắc, giá để đồ LIPIZZAN nổi bật với thiết kế đơn giản nhưng sang trọng và cực kỳ tiện dụng.', 6, '2024-07-17 07:13:01', '2024-07-17 07:13:01'),
(9, 'Giường Đơn Trắng 90 SAPA', 888000, 'products/Z0WFGd6qrYaQpMoXAtxzssPxL1CaiYmNsrpmvqsx.webp', 'Dễ ngủ', 5, '2024-07-17 07:14:23', '2024-07-17 07:14:23'),
(10, 'Gối ngủ sợi kapot', 9990000, 'products/KrRrMYFRQDb0vtxAPpzfyPI9Hdx4wvOiJOvoOgkq.webp', 'Nsleep là một sản phẩm ruột gối cao cấp, được thiết kế để mang lại sự thoải mái và thư giãn cho người dùng. Nsleep có những đặc điểm nổi bật sau:', 5, '2024-07-17 07:15:44', '2024-07-17 07:15:44'),
(11, 'Tủ đầu giường luka', 770000, 'products/2JBpzRwgBRlAGupfahPtlk4ka1DA0eVa8cCl9zQB.webp', 'Tủ đầu giường LUCAS là một sản phẩm nội thất tiện dụng, giúp bạn lưu trữ đồ đạc cá nhân một cách gọn gàng và ngăn nắp.', 5, '2024-07-17 07:17:16', '2024-07-17 07:17:16'),
(12, 'Bàn Trang Điểm LUCAS', 689000, 'products/FhnE481HicVUSqE39orKwbOTYJQV3pjLkB8ZQTnG.webp', 'Bàn trang điểm LUCAS là một sản phẩm nội thất tiện dụng, giúp bạn trang điểm và làm đẹp một cách dễ dàng.', 5, '2024-07-17 07:18:14', '2024-07-17 07:18:14'),
(13, 'Ca đo đường nhựa lupak', 789000, 'products/uN3osMbjHnXODDcqtAqYYk1ORcsju80Mct5ltvvd.webp', 'Cốc đo lường RECIPE dung tích 500ml thuộc bộ sưu tập dùng trong nhà bếp mới của nội thất BAYA với chất liệu an toàn cùng thiết kế hiện đại và tiện dụng.', 4, '2024-07-17 07:20:01', '2024-07-17 07:20:01'),
(14, 'Giá Dựng Đĩa Nhựa Nhiều Màu ELEKTRA', 778000, 'products/yYZGmEadoighbcrgpjZhD0ZRgonjwpCGohx7dIMf.webp', 'Giá đỡ chảo ELEKTRA có thiết kế thông minh, giúp bạn để, đựng chảo tiện lợi và làm gọn gàng cho không gian nhà bếp.', 4, '2024-07-17 07:21:18', '2024-07-17 07:21:18'),
(15, 'Muôi Múc Canh Thép Không Gỉ', 778000, 'products/lPbTvMfolpPxwL1RlZU6v2UD2PZzrkLU6EMcNBzU.webp', 'Vá canh RECIPE thuộc bộ sưu tập dùng trong nhà bếp mới của nội thất BAYA với chất liệu cao cấp, an toàn cho sức khoẻ cùng thiết kế hiện đại và tiện dụng.', 4, '2024-07-17 07:22:12', '2024-07-17 07:22:12'),
(16, 'Dây lọc thép không gỉ', 120000, 'products/nRwv2LQBEwv5mljsRJXEscN3HFB5mSzeDgdn1u5R.webp', 'Rây lọc RECIPE thuộc bộ sưu tập dùng trong nhà bếp mới của nội thất BAYA với chất liệu an toàn cùng thiết kế hiện đại và tiện dụng.', 4, '2024-07-17 07:23:17', '2024-07-17 07:23:17'),
(17, 'Sọt rác thép không gỉ', 768000, 'products/tWub7kVKsnZ5dlA1JKMyQUwnsmagHPE8MUTBK4en.webp', 'đựng rác lâu bền', 3, '2024-07-17 07:24:55', '2024-07-17 07:24:55'),
(18, 'Ghế văn phòng xoay kile', 888000, 'products/Aj1xp9g6MZVBsPRUa6Yt1Xx2tYOxNQp1wtdU21ub.jpg', 'Ghế văn phòng KYLE là một sản phẩm ghế văn phòng cao cấp với thiết kế hiện đại, đẹp mắt và rất thoải mái. Ghế được làm từ vật liệu chất lượng cao như da tổng hợp hoặc vải bố', 3, '2024-07-17 07:25:49', '2024-07-17 07:25:49'),
(19, 'Ghế giám đốc kalie', 999000, 'products/6QvblecSqyNYHSQKiP1YShXrjD1j7axbf7y4Ezab.webp', 'Ghế văn phòng ETHAN là một sản phẩm ghế văn phòng cao cấp với thiết kế hiện đại, đẹp mắt và rất thoải mái', 3, '2024-07-17 07:26:38', '2024-07-17 07:26:38'),
(20, 'Khay Đựng Tài Liệu Kim Loại TRAMP', 987000, 'products/iSI01pkWyFJZFriYOLiHbRNkWSD2Ex381spFz4nQ.webp', 'Khay đựng tài liệu TRAMP với thiết kế nhiều tầng giúp không gian làm việc của bạn trở nên ngăn nắp và đẹp mắt hơn. Sản phẩm làm từ chất liệu kim loại phủ sơn bền chắc, hiện đại và dễ vệ sinh. Phần quai xách giúp bạn dễ dàng di chuyển khay với chỉ một tay.', 3, '2024-07-17 07:27:27', '2024-07-17 07:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartproducts`
--
ALTER TABLE `cartproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productorders`
--
ALTER TABLE `productorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartproducts`
--
ALTER TABLE `cartproducts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productorders`
--
ALTER TABLE `productorders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
