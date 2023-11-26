-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 09:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cart_id`, `user_id`, `product_code`, `product_name`, `product_quantity`, `product_price`, `product_image`, `created_at`, `updated_at`) VALUES
(91, 'CAT091', '2', 'PRD00006', 'iPhone 13 128GB', 1, 16490000, 'dZ9r5aswVDhQgLY8ojdZMxjmIqaYihBE.webp', '2023-11-25 10:41:21', '2023-11-25 10:41:21'),
(92, 'CAT092', '2', 'PRD00016', 'Laptop ASUS ZenBook UM3402YA-KM074W', 1, 100000, '2GqwXW4EUKxBPOaGkzFPcEsR5hZrVbRC.webp', '2023-11-25 21:28:27', '2023-11-25 21:28:27'),
(93, 'CAT093', '2', 'PRD00020', NULL, 2, 100000, 'yXJHXkLkcUpRDMTCwqRTpIxgRq553Jr2.webp', '2023-11-25 22:57:27', '2023-11-25 22:57:27'),
(95, 'CAT094', '1', 'PRD00028', 'vivo Y17s 4GB 128GB', 2, 3900000, 'TYeLnnKuNpy7pBn9wZfhvJ0szciX47hb.webp', '2023-11-26 04:14:56', '2023-11-26 10:44:21'),
(96, 'CAT096', '1', 'PRD00006', 'iPhone 13 128GB', 2, 16490000, 'dZ9r5aswVDhQgLY8ojdZMxjmIqaYihBE.webp', '2023-11-26 10:32:11', '2023-11-26 10:48:25'),
(97, 'CAT097', '2', 'PRD00039', 'Surface Laptop Go 12.4 Nhập Khẩu Chính Hãng', 1, 13000000, '1mtd6Snj42sTHHjLesZqLFpmzq8Lg8lx.webp', '2023-11-26 10:36:48', '2023-11-26 10:36:48'),
(98, 'CAT098', '1', 'PRD00039', 'Surface Laptop Go 12.4 Nhập Khẩu Chính Hãng', 2, 13000000, '1mtd6Snj42sTHHjLesZqLFpmzq8Lg8lx.webp', '2023-11-26 10:42:19', '2023-11-26 10:49:07'),
(99, 'CAT099', '1', 'PRD00040', 'Laptop LG Gram 2023 17ZD90R-G.AX73A5', 1, 35000000, 'uQqIZkNnO61zGwBb8R03zuLDE3syjW5U.webp', '2023-11-26 10:44:01', '2023-11-26 10:44:01'),
(100, 'CAT100', '1', 'PRD00041', 'Laptop Huawei Matebook D16', 4, 18900000, '5DBXd5jazBEynpVMuL3vYAkFt3JA7Fua.webp', '2023-11-26 10:47:46', '2023-11-26 10:47:46'),
(101, 'CAT101', '1', 'PRD00022', 'Xiaomi Redmi Note 12 8GB 128GB', 1, 21500000, 'qJvYZC9TRu2Mk5c6bbHYPfXcC4MSWtX6.webp', '2023-11-26 10:48:46', '2023-11-26 10:48:46');

--
-- Triggers `carts`
--
DELIMITER $$
CREATE TRIGGER `auto_generate_cart_id` BEFORE INSERT ON `carts` FOR EACH ROW BEGIN
										  DECLARE max_id INT;
										  SET max_id = (SELECT MAX(id) FROM carts);
										  SET NEW.cart_id = CONCAT('CAT', LPAD(max_id + 1, 3, '0'));
										END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` varchar(255),
  `name` varchar(255) DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_code`, `name`, `total_product`, `total_price`, `created_at`, `updated_at`) VALUES
(17, 'DSM00017', 'Điện thoại, Tablet', 78, 837900000, '2023-07-08 06:24:23', '2023-07-08 06:24:46'),
(20, 'DSM00020', 'Laptop', 90, 1538760000, '2023-08-05 02:17:04', '2023-08-05 02:17:04');

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `auto_generate_category_code` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN
  DECLARE max_id INT;
  SET max_id = (SELECT MAX(id) FROM categories);
  SET NEW.category_code = CONCAT('DSM', LPAD(max_id + 1, 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'thai nguen', 'nam.n1352@gmail.com', '0368009154', 'abc', '2023-11-26 10:09:09', '2023-11-26 10:09:09'),
(2, 'Nguyễn Xuân Thái', 'xuanthaing22@gmail.com', '0368009154', 'dfghjk', '2023-11-26 10:10:00', '2023-11-26 10:10:00'),
(3, 'thai nguen', 'nam.n1352@gmail.com', '0368009154', 'abvcx', '2023-11-26 10:13:51', '2023-11-26 10:13:51'),
(4, 'thai nguen', 'nam.n1352@gmail.com', '0368009154', 'abc', '2023-11-26 10:45:14', '2023-11-26 10:45:14'),
(5, 'thai nguennxt', 'nam.n1352@gmail.com', '0368009154', 'abc', '2023-11-26 10:50:04', '2023-11-26 10:50:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_07_090629_create_categorys_table', 2),
(6, '2023_07_07_090649_create_products_table', 2),
(7, '2023_07_07_091434_create_products_table', 3),
(8, '2023_07_14_102536_create_carts_table', 4),
(9, '2023_07_18_101359_create_wishlists_table', 5),
(10, '2023_11_26_081442_create_reviews', 6),
(11, '2023_11_26_082155_create_reviews_table', 7),
(12, '2023_11_26_164542_create_messages_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nam.n1352@gmail.com', '$2y$10$1wMFLxbCU6nR9FtkbLFvVeMkaX1M/pN0lUyKYMmcr2AG5Avz8wNle', '2023-07-06 10:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category_id`, `name`, `brand`, `rate`, `price`, `description`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(6, 'PRD00006', 17, 'iPhone 13 128GB', 'Apple', NULL, 16490000, 'Cuối năm 2020, bộ 4 iPhone 12 đã được ra mắt với nhiều cái tiến. Sau đó, mọi sự quan tâm lại đổ dồn vào sản phẩm tiếp theo – iPhone 13. Vậy iP 13 sẽ có những gì nổi bật, hãy tìm hiểu ngay sau đây nhé!\r\n\r\nThiết kế với nhiều đột phá\r\nVề kích thước, iPhone 13 sẽ có 4 phiên bản khác nhau và kích thước không đổi so với series iPhone 12 hiện tại. Nếu iPhone 12 có sự thay đổi trong thiết kế từ góc cạnh bo tròn (Thiết kế được duy trì từ thời iPhone 6 đến iPhone 11 Pro Max) sang thiết kế vuông vắn (đã từng có mặt trên iPhone 4 đến iPhone 5S, SE).\r\n\r\nThì trên điện thoại iPhone 13 vẫn được duy trì một thiết kế tương tự. Máy vẫn có phiên bản khung viền thép, một số phiên bản khung nhôm cùng mặt lưng kính. Tương tự năm ngoái, Apple cũng sẽ cho ra mắt 4 phiên bản là iPhone 13, 13 mini, 13 Pro và 13 Pro Max.', 5, 'dZ9r5aswVDhQgLY8ojdZMxjmIqaYihBE.webp', '2023-07-08 06:46:34', '2023-11-26 03:51:28'),
(15, 'PRD00015', 20, 'Laptop ASUS ZenBook UP5401ZA-KN005W', 'ASUS', NULL, 12000000, 'Sở hữu thiết kế sang trọng, trọng lượng nhẹ, dễ dàng mang theo bên mình\r\nRAM 16GB giúp bạn dễ dàng các tab mà không lo lag máy\r\nỞ cứng SSD 512GB giúp bạn có không gian lưu trữ lớn\r\nSở hữu cảm biến vân tay giúp thao tác mở màn hình thuận tiện hơn', 5, 'XpJNu4tGdE77BD7jmFKymlmjp3pdabFV.webp', '2023-08-05 02:24:15', '2023-11-26 04:19:56'),
(16, 'PRD00016', 20, 'Laptop ASUS ZenBook UM3402YA-KM074W', 'ASUS', NULL, 23400000, 'Kích thước 14 inch cùng độ phân giải cao hỗ trợ hiển thị hình ảnh sắc nét\r\nBộ vi xử lý Intel Core i5-1340P cho bạn trải nghiệm mượt mà\r\nCard Intel Iris Xe Graphics cho khả năng xử lý đồ họa tốt trơn tru\r\nRAM 16 GB giúp mở nhiều tab trình duyệt cùng một lúc mà không giật, treo máy\r\nỔ cứng SSD 512 GB có dung lượng lưu trữ đủ lớn và tốc độ truy xuất nhanh\r\nBảo mật vân tay an toàn và tiện lợi bảo giúp vệ dữ liệu cá nhân', 5, '2GqwXW4EUKxBPOaGkzFPcEsR5hZrVbRC.webp', '2023-08-05 02:26:08', '2023-11-26 04:19:43'),
(17, 'PRD00017', 20, 'Laptop Huawei Matebook D15', 'Huawei', NULL, 12990000, 'àn hình 15.6 inch Full HD cùng tấm nền IPS cho chất lượng hình chính xác và sống động\r\nCảm biến vân tay tích hợp chỉ cần một chạm để mở máy tính\r\nCPU AMD Ryzen R7-5700U mọi tác vụ văn phòng, học tập được giải quyết chỉ trong một nốt nhạc\r\nRAM 8GB chuẩn DDR4 hỗ trợ mở hàng chục tabs duyệt web cùng lúc mà không lo lag, giật\r\nỔ cứng 512GB SSD cho không gian lưu trữ rộng rãi, thoải mái\r\nLaptop Huawei Matebook D15 R7-5700U - Xử lý dữ liệu tuyệt vời, hình ảnh đẹp', 5, 'ELWp9eLIRCkxx1i0dmRngCGwsV34Pbln.webp', '2023-08-05 02:26:42', '2023-11-26 04:20:43'),
(18, 'PRD00018', 20, 'Laptop Lenovo Ideapad 3 15IAU7 82RK001GVN', 'Lenovo', NULL, 10390000, 'Laptop Lenovo IdeaPad 3 15IAU7 82RK001GVN - Laptop công việc gọn nhẹ và đa nhiệm tốt\r\nVới các bạn học sinh, sinh viên cũng như người làm văn phòng đang tìm mua một chiếc máy tính xách tay gọn nhẹ, laptop Lenovo IdeaPad 3 15IAU7 82RK001GVN chính là lựa chọn tuyệt vời nhờ cấu hình mạnh mẽ, bộ nhớ lưu trữ lớn cùng kiểu dáng lịch thiệp dễ di chuyển.', 5, 'FoFm4OKjo6VBYw7EWq2cKSEuLIeSAjND.webp', '2023-08-05 02:27:18', '2023-11-26 04:22:18'),
(19, 'PRD00019', 20, 'Laptop Asus E210MA GJ537W', 'ASUS', NULL, 5100000, 'Laptop Asus E210MA-GJ537W N4020 – Tối ưu hiệu quả công việc\r\nLaptop Asus E210MA-GJ537W N4020 là chiếc laptop thế hệ mới đến từ thương hiệu Asus. Trang bị cho mình những tính năng nổi bật từ cấu hình bên trong đến thiết kế bên ngoài, Asus E210MA-GJ537W N4020 thất sự đã giúp cho người dùng tối ưu được hiệu quả công việc.\r\n\r\nCấu hình mạnh mẽ giúp tối ưu hóa hiệu năng\r\nLaptop Asus E210MA-GJ537W N4020 sở hữu cấu hình mạnh mẽ với CPU N4020 RAM DDR4 4GB và ổ cứng 128G EMMC giúp cho máy có thể hoàn thành tốt những yêu cầu của người dùng trong học tập, làm việc hay giải trí. Cạnh đó, nhờ vào sự hỗ trợ của Card màn hình Intel UHD Graphics 600 mà laptop Asuscó thể thực hiện những tác vụ đồ họa cơ bản, tối ưu hóa hiệu năng và hoàn thành công việc tốt hơn.', 5, 'rWrxH88GsNbTkmDXgMW9DDp3cyu5TiTV.webp', '2023-08-05 02:28:37', '2023-11-26 04:23:44'),
(21, 'PRD00020', 17, 'Samsung Galaxy S23 Ultra 256GB', 'Samsung', NULL, 22000000, 'Điện thoại Samsung Galaxy S23 Ultra liệu có gì mới?\r\nSamsung S23 Ultra là dòng điện thoại cao cấp của Samsung, sở hữu camera độ phân giải 200MP ấn tượng, chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội cùng khung viền vuông vức sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.\r\n\r\nThiết kế cao cấp, đường nét thời thượng, tinh tế\r\nTiếp nối thiết kế từ những chiếc Samsung Galaxy S22 Ultra, những chiếc Samsung S23 Ultra mang dáng vẻ thanh mảnh với những đường nét được gọt giũa chỉnh chu và cực kỳ tinh tế. Với màn hình tràn viền, tỷ lệ màn hình trên thân máy hơn 90% những chiếc điện thoại S23 Ultra hứa hẹn mang đến một thiết kế thời thượng thu hút mọi ánh nhìn.', 5, 'ICORa49FDuloMzCBQzlFj9GxbdTAymyp.webp', '2023-11-26 03:55:47', '2023-11-26 03:55:47'),
(22, 'PRD00022', 17, 'Xiaomi Redmi Note 12 8GB 128GB', 'Xiaomi', NULL, 21500000, 'Phiên bản sắc vàng - Độc quyền\r\nXiaomi Redmi Note 12 được Xiaomi cho ra mắt với nhiều phiên bản màu sắc khác nhau cho người dùng lựa chọn, tuy nhiên sắc vàng là màu sắc ấn tượng nhất trong series Redmi Note 12 này và hiện được bán độc quyền tại CellphoneS.\r\n\r\nRedmi Note 12 Vàng Bình Minh với hiệu ứng chuyển màu gradient bắt mắt phối hợp với thiết kế khung viền phẳng mang lại một thiết kế tinh tế.', 5, 'qJvYZC9TRu2Mk5c6bbHYPfXcC4MSWtX6.webp', '2023-11-26 03:58:00', '2023-11-26 04:00:36'),
(23, 'PRD00023', 17, 'OPPO Find N3 Flip 12GB 256GB', 'Oppo', NULL, 20000000, 'Thiết kế gập linh hoạt, đường cong 3D, đường cắt kim cương - biểu tượng của sự phong cách giúp bạn luôn toả sáng\r\nĐiện thoại gập sở hữu 3 camera sắc nét - Chụp hình đơn giản hơn với Chế độ Flexform\r\nMàn hình phụ vạn năng - dễ dàng thao tác các tác vụ ngay trên màn hình phụ và tuỳ biến theo sở thích\r\nMàn hình sống động đáng kinh ngạc - Kích thước 6.8i nches, hỗ trợ 120Hz, HDR10+', 5, 'SnM2eUZE2QQMN8deYMNbTxcfQH2RwCgH.webp', '2023-11-26 04:00:12', '2023-11-26 04:00:12'),
(24, 'PRD00024', 17, 'realme C55 (6GB - 128GB)', 'Realmi', NULL, 3490000, 'Kiểu dáng hiện đại với các cạnh viền vuông vức và camera được bố trí độc đáo\r\nThoả mãn niềm đam mê nhiếp ảnh với camera sau có độ phân giải lên đến 64MP\r\nDung lượng pin 5.000 mAh kèm sạc nhanh 33W giúp tiết kiệm thời gian sạc pin\r\nRAM 6GB giúp xử lý tốt đa tác vụ cùng ROM 128GB cho không gian lưu trữ lớn\r\nrealme C55 có màn hình 6.72 inch, full HD, độ phân giải sắc nét, bộ nhớ lưu trữ của điện thoại lớn 6GB+128GB. Thương hiệu này chạy hệ điều hành quen thuộc Android 12, các tác vụ nhanh nhạy và mượt mà hơn. Con chip set được trang bị là Mediatek Helio G88 giúp các tác vụ ổn định hơn trong thời gian dài.', 5, '6X6Z9fx6PdHoNWuPb7NPr0DwTwvu3h0S.webp', '2023-11-26 04:02:34', '2023-11-26 04:02:34'),
(25, 'PRD00025', 17, 'Nokia C32 4GB 128GB', 'Nokia', NULL, 2800000, 'Điểm đắt giá và đáng mua của Nokia C32 có những gì?\r\nĐược đánh giá là một trong những sản phẩm tốt trong phân khúc giá rẻ, Nokia C32 sở hữu cho mình nhiều điểm nhấn mà các thương hiệu khác khó để cạnh tranh:\r\n\r\n- Kiểu dáng đẹp mắt, thanh lịch và trầm tính, phù hợp với học sinh sinh viên và phụ huynh\r\n\r\n- Hiệu năng tốt phân khúc giá dưới 3 triệu, vừa túi tiền người dùng\r\n\r\n- Sử dụng ổn định với các tác vụlướt Facebook, xem phim, nghe nhạc, chơi game nhẹ nhàng', 5, 'I4LUXfDxqxSU4gWYzsG3tDjUzzKR4DYe.webp', '2023-11-26 04:04:25', '2023-11-26 04:04:25'),
(26, 'PRD00026', 17, 'OnePlus 11 5G 8GB 128GB', 'OnePlus', NULL, 12000000, 'Chiến game thả ga - Snapdragon 8 Gen 2, hệ thống tản nhiệt VC Cooling System làm mát hiệu quả\r\nĐa nhiệm cực mượt - RAM 8GB, ROM 128GB\r\nGiải trí sống động - Màn hình viền siêu mỏng, 120Hz, độ phân giải 2K\r\nNâng tầm nhiếp ảnh - Camera chính 50MP, lưu giữ màu sắc chân thực, chống rung hiệu quả\r\nOnePlus 11 cải tiến mạnh mẽ về công nghệ cùng thiết kế sang trọng cùng hiệu năng cực kỳ mạnh mẽ tới từ con chip Snapdragon 8 Gen 2. OnePlus 11 sẽ là lựa chọn hoàn hảo, hỗ trợ người dùng xử lý công việc một cách hiệu quả và đáp ứng nhiều nhu cầu khác nhau của người dùng.', 5, 'cVDZYiXFSivFDp5md2oGXfpYzn8vPrbM.webp', '2023-11-26 04:06:47', '2023-11-26 04:06:47'),
(27, 'PRD00027', 17, 'ASUS ROG Phone 6 12GB 256GB', 'Asus', NULL, 13990000, 'Hiệu năng dẫn đầu mọi trận đấu - Chip Snapdragon® 8+ Gen 1 mạnh mẽ cùng RAM 12GB\r\nChất lượng hiển thị đúng chuẩn gaming - Màn hình 6.78 inches, FullHD+, HDR10+ cùng tần số quét 165Hz\r\nThiết kế thân thiện cho chơi game, mặt lưng ánh sáng Aura RGB độc đáo\r\nBùng nổ năng lượng cho ngày dài ấn tượng - Viên pin 6000 mAh, sạc nhanh siêu tốc 65W', 5, 'nXHCxXp0ME8y0B7Zja14o2XCbob4dJAh.webp', '2023-11-26 04:08:03', '2023-11-26 04:08:03'),
(28, 'PRD00028', 17, 'vivo Y17s 4GB 128GB', 'Vivo', NULL, 3900000, 'Thiết kế trendy, màu sắc xu hướng - 2 màu sắc Tím Sao Băng, Xanh Rừng Sâu nổi bật phong cách của bạn\r\nHoàn hảo mọi góc chụp - Camera chính 50MP chụp chân dung và chụp đêm chuyên nghiệp, cho ảnh chất lượng cao\r\nĐa nhiệm mượt, xử lí nhanh - RAM mở rộng giúp máy vận hành và thao tác êm ái nhiều tác vụ cùng lúc\r\nMở ra không gian giải trí tuyệt hảo - Tần số quét 90Hz, màn hình lớn 6.56\", độ sáng tối đa 840nits\r\nVivo Y17s được trang bị bộ vi xử lý MediaTek Helio G85 mạnh mẽ, đi kèm một màn hình LCD với kích thước 6.56 inch, mang đến trải nghiệm tuyệt vời. Ngoài ra, Vivo Y17s còn sở hữu camera chính 50MP, cùng viên pin dung lượng lên đến 5000 mAh.', 5, 'TYeLnnKuNpy7pBn9wZfhvJ0szciX47hb.webp', '2023-11-26 04:09:15', '2023-11-26 04:09:15'),
(29, 'PRD00029', 17, 'Nubia RedMagic 8S Pro', 'Nubia', NULL, 15000000, 'Nubia RedMagic 8S Pro có màn hình chuẩn AMOLED, tần số quét lên đến 120Hz, màn hình rộng 6.8 inches, với camera sau 50 MP, kết hợp camera trước 16 MP. Điện thoại trang bị chipset mạnh mẽ Snapdragon 8 Gen 2, giúp các tác vụ sẽ trở nên dễ dàng và mượt mà hơn.\r\n\r\nNubia RedMagic 8S Pro – Thiết kế hiện đại, cấu hình ổn định\r\nNubia RedMagic 8S Pro là điện thoại có nhiều tính năng nổi bật và thiết kế thời thượng, chắc chắn sẽ mang đến trải nghiệm ấn tượng khi sử dụng trong thời gian dài. Điện thoại được đánh giá cao bởi người dùng, nhờ đáp ứng nhu cầu cá nhân của bản thân.', 5, 'Vv426VPFVYMpegjEx0VpdQ557ApjuoJQ.webp', '2023-11-26 04:10:28', '2023-11-26 04:10:28'),
(30, 'PRD00030', 17, 'TECNO POVA 5 8GB 128GB', 'Tecno', NULL, 3600000, 'Thiết kế mạnh mẽ, lạ mắt với mặt lưng phẳng đi kèm các họa tiết độc đáo.\r\nDung lượng pin cao 6000mAh - Sẵn sàng cho bạn chiến các tựa game mà không bị gián đoạn.\r\nMàn hình 6.78 inches, hỗ trợ độ phân giải 1080 x 2460 pixel - Chất lượng hình ảnh mượt mà, sắc nét.\r\nChip xử lý Helio G99 (6nm) - Cung cấp sức mạnh giúp bạn đáp ứng tốt mọi tác vụ.\r\nĐiện thoại Tecno Pova 5 hoạt động trên con chip MediaTek Helio G99 và bộ nhớ RAM 8GB cùng viên pin dung lượng 6000mAh hỗ trợ sạc nhanh công suất 45W. Vẻ ngoài máy với màn hình IPS LCD 6.78 inch tần số quét 120Hz hiển thị mượt mà. Cùng với đó cụm camera chính 50MP sẽ giúp điện thoại Tecno này sở hữu khả năng nhiếp ảnh ổn định.', 5, 'E7Jxalu1VRIsEfunZ3eO4VYGnEVW1xv5.webp', '2023-11-26 04:11:39', '2023-11-26 04:11:39'),
(31, 'PRD00031', 17, 'Infinix Hot 30 8GB 256GB', 'Ifinix', NULL, 2890000, 'Chip xử lí game mạnh mẽ Hellio G88 - Đem lại trải nghiệm mọi ứng dụng một cách mượt mà và không bị gián đoạn.\r\nMàn rộng 6,78 inch cùng tần số quét 90Hz cho phép hiển thị hình ảnh sắc nét đến từng chi tiết nhỏ trên màn hình.\r\nTạm biệt nỗi lo pin yếu với dung lượng pin lên đến 5000mAh cùng công nghệ sạc nhanh 33W.\r\nThiết kế nhẹ với mặt lưng tựa kính thời thượng và hiện đại, với kích thước lý tưởng để dễ dàng mang theo bên mình.\r\nInfinix Hot 30 có màn hình lớn 6.78 inch, tần số quét lên đến 90 Hz, trang bị hệ điều hành Android 13, kết hợp chipset mạnh mẽ MediaTek Helio G88 8 nhân. Điện thoại trang bị cụm camera sau là 50 MP & 0.3 MP, mang đến màu sắc nguyên bản chi tiết hơn. Dung lượng bộ nhớ 8 GB+ 8GB RAM mở rộng , kết hợp với viên pin khủng 5000 mAh giúp tăng trải nghiệm khi sử dụng.', 5, '9lwoBz7ZQr9q3vgbPZzDF5YT6S9PlBLS.webp', '2023-11-26 04:12:55', '2023-11-26 04:12:55'),
(32, 'PRD00032', 17, 'TCL 408 4GB 128GB', 'TCL', NULL, 1990000, 'Màn hình rộng 6,6\" - Thoải mái hơn khi đọc và khi làm các công việc hàng ngày.\r\nBộ vi xử lý Helio G25 Mighty Hyper Engine mạnh mẽ - Chạy nhiều ứng dụng mà không lo giật, lag.\r\nPin lớn 5000mAh - Đáp ứng đủ sức mạnh giải trí trong 2 ngày.\r\nBùng nổ với âm thanh loa kép, mang đến cho bạn cảm giác như đang ở rạp chiếu phim.', 5, 'wC8wCDoVGNHhf5tJWTM2okuiMQidV3la.webp', '2023-11-26 04:14:04', '2023-11-26 04:14:04'),
(33, 'PRD00033', 20, 'Apple MacBook Air M1 256GB 2020', 'Apple', NULL, 18990000, 'Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng\r\nHiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS\r\nĐa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm\r\nTrang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng\r\nChất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc\r\nThiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi\r\nMacbook Air M1 2020 - Sang trọng, tinh tế, hiệu năng khủng\r\nMacbook Air M1 là dòng sản phẩm có thiết kế mỏng nhẹ, sang trọng và tinh tế cùng với đó là giá thành phải chăng nên MacBook Air đã thu hút được đông đảo người dùng yêu thích và lựa chọn. Đây cũng là một trong những phiên bản Macbook Air mới nhất mà khách hàng không thể bỏ qua khi đến với CellphoneS. Dưới đây là chi tiết về thiết kế, cấu hình của máy.', 5, 'OTJZVmGJagW9whUDT2CviOvcXUn4jcHi.webp', '2023-11-26 04:25:32', '2023-11-26 04:25:32'),
(34, 'PRD00034', 20, 'Laptop Asus TUF Gaming F15 FX507ZC4-HN074W', 'ASUS', NULL, 19600000, 'CPU Intel Core i5 12500H dễ dàng xử lý các tác vụ nặng và chơi game AAA cấu hình cao\r\nCard NVIDIA GeForce RTX 3050 cải thiện hiệu suất xử lý đồ họa và đảm bảo trải nghiệm chơi game tuyệt vời\r\nMàn hình 15.6 inch Full HD cùng tần số quét 144 Hz hỗ trợ chơi game sống động với tốc độ cực nhanh\r\nRAM 8GB cùng ổ cứng 512 GB SSD rút ngắn thời gian mở máy, khởi động ứng dụng\r\nBàn phím 1-Zone RGB cùng TUF Aura Core để bạn có thể thể hiện phong cách độc đáo của riêng mình\r\nLaptop Asus Tuf Gaming F15 FX507ZC4-HN074W - Thoải mái chiến game, lưu trữ đã đời \r\nLaptop Asus Tuf Gaming F15 FX507ZC4-HN074W là dòng laptop gaming có hiệu năng vượt trội, nhiều tính năng tân tiến và tuyệt vời cho game thủ. Mẫu laptop này không chỉ thực hiện tốt khả năng xử lý đồ họa mà còn có những chuyển động nhanh nhạy chuẩn xác. Hãy xem đoạn mô tả sau đây để hiểu rõ hơn về ưu điểm của dòng laptop Asus Gaming mới nhất này.', 5, 'jAotZBc0BQ2VNCwIr55nhcXeaSKsGbyy.webp', '2023-11-26 04:26:48', '2023-11-26 04:26:48'),
(35, 'PRD00035', 20, 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 'MSI', NULL, 17000000, 'Chip AMD Ryzen 5 - 7535HS xử lý nhanh chóng các tác vụ như văn phòng, đồ hoạ, coding hay chiến game\r\nGPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt mà và ổn định ở các pha giao tranh\r\nRAM 16 GB cho phép máy vận hành mượt mà, mở cùng lúc nhiều tác vụ\r\nỔ cứng 512 GB hỗ trợ khởi động laptop, truy xuất dữ liệu nhanh hơn\r\nTần số quét 144 Hz giúp hình ảnh không bị rách hay nhoè mờ khi chơi game\r\nLaptop MSI gaming BRAVO 15 B7ED-010VN – Hiệu năng vượt trội, chơi game mượt mà\r\nLaptop MSI gaming BRAVO 15 B7ED-010VN là dòng laptop gaming đến từ thương hiệu MSI. Sản phẩm laptop MSI gaming này với cấu hình mạnh mẽ có thể đáp ứng tốt các trải nghiệm gaming của người dùng.', 5, '9TwqzObIiUkNnghg4wzUkIxcDmBwcXlI.webp', '2023-11-26 04:28:12', '2023-11-26 04:28:12'),
(36, 'PRD00036', 20, 'Laptop Lenovo IdeaPad Gaming 3 15ACH6 82K2027QVN', 'Lenovo', NULL, 15990000, 'Laptop gaming với màn hình 15.6 inch cùng trọng lượng 2.25 kg nhẹ nhàng cho game thủ khi di chuyển\r\nCPU Ryzen 5-5500H dù làm việc hay chiến game máy đều xử lý nhanh gọn\r\nCard màn hình RTX 2050 mạnh mẽ giúp game thủ tận hưởng hiệu ứng đồ họa mãn nhãn\r\nRAM 8GB cùng SSD 512GB NVMe cực nhanh giúp lưu trữ game, mở máy nhanh chóng\r\nTần số quét 144 Hz rất hợp để chơi những tựa game bắn súng FPS như CSGO, Overwatch 2,... giúp tạo nên những pha xử lý chính xác\r\nLaptop Lenovo Ideapad Gaming 3 15ACH6 82K2027QVN – Laptop gaming phổ thông\r\nLaptop Lenovo Ideapad Gaming 3 15ACH6 82K2027QVN cho phép bạn thưởng thức những giây phút giải trí hay làm việc một cách hiệu quả. Với những ưu điểm nổi bật, chiếc laptop Lenovo Gaming này hứa hẹn sẽ giúp người dùng tối ưu năng suất trong quá trình sử dụng.', 5, 'n2a7YApHRpkkrVun6vQz4naQt4ejn8fm.webp', '2023-11-26 04:29:27', '2023-11-26 04:29:27'),
(37, 'PRD00037', 20, 'Laptop HP Pavilion 15-EG2065TX 7C0Q3PA', 'HP', NULL, 15200000, 'Trải nghiệm màn hình sắc nét, chân thực - 15.6 inches Full HD, IPS, 250nits, 45% NTSC\r\nCard đồ họa NVIDIA® GeForce® MX550 - Mạnh hơn, nhanh hơn, hiệu suất hơn, game hạng nặng và đồ họa cao cấp không là vấn đề\r\nHiệu năng mượt mà, giúp giải quyết nhanh chóng các tác vụ cơ bản hằng ngày với CPU Intel Core i5-1235U cùng RAM 8GB và ổ cứng 256GB\r\nTrọng lượng 1.75 kg đủ nhẹ thuận tiện mang theo và di chuyển', 5, 'wFLhtSCXTg49fDeMhwXbRjot14SDHkIe.webp', '2023-11-26 04:30:35', '2023-11-26 04:30:35'),
(38, 'PRD00038', 20, 'Laptop Gaming Acer Nitro 5 Eagle AN515-57-54MV NH.QENSV.003', 'Acer', NULL, 18900000, 'Thiết kế đậm chất gaming cứng cáp, hầm hố và có độ hoàn thiện cao\r\nMàn hình FullHD kích thước chuẩn 15,6 inch, hiển thị sắc nét, màu sắc sống động\r\nHiệu năng mạnh mẽ, đa nhiệm mượt mà - Intel Core i5-11400H, RAM 8GB\r\nNăng lượng bất tận cả ngày với viên pin 4-cell, 57.5 Wh\r\nLaptop Gaming Acer Nitro 5 Eagle AN515-57-54MV – laptop gaming vượt trội\r\nNitro là dòng laptop Gaming Acer, trong đó sản phẩm laptop gaming Acer Nitro 5 Eagle AN515-57-54MV với thiết kế đậm chất gaming cùng hiệu năng ấn tượng.', 5, '7aMDuK2BqM171xXWCe4p8IAUUlT4kwVS.webp', '2023-11-26 04:31:38', '2023-11-26 04:31:38'),
(39, 'PRD00039', 20, 'Surface Laptop Go 12.4 Nhập Khẩu Chính Hãng', 'MS', NULL, 13000000, 'Thiết kế gọn nhẹ tiện lợi, thanh lịch - Trọng lượng chỉ khoảng 1kg, chất liệu cao cấp\r\nHiệu năng ổn định, mượt mà với chip Intel Core i thế hệ 10 RAM 4GB và ổ cứng SSD 64GB\r\nTốc độ truyền dữ liệu nhanh và hiệu suất vượt trội nhờ hỗ trợ Wifi 6 - thế hệ wifi mới nhất\r\nKết nối đa dạng, tiện lợi chia sẻ - USB-C, USB-A,...\r\nSurface Laptop Go 21K-00019 – Laptop nhỏ gọn, đồng hành cùng bạn mọi lúc mọi nơi\r\nLaptop mỏng nhẹ ngày càng trở nên phổ biến và được ưu tiên hàng đầu khi chọn lựa laptop của người dùng bởi tính tiện lợi khi di chuyển của nó. Khi nhắc đến các mẫu laptop mỏng nhẹ nổi tiếng nhất hiện nay, phải kể đến Surface Laptop Go 21K-00019 - một trong những đại diện lý tưởng cho dòng laptop Microsoft Surface nhỏ gọn nhưng hiệu năng vẫn mạnh mẽ.', 5, '1mtd6Snj42sTHHjLesZqLFpmzq8Lg8lx.webp', '2023-11-26 04:32:48', '2023-11-26 04:32:48'),
(40, 'PRD00040', 20, 'Laptop LG Gram 2023 17ZD90R-G.AX73A5', 'LG', NULL, 35000000, 'Chip i7-1360P cùng  Intel Iris Xe Graphics giúp bạn dễ dàng xử lý các công việc văn phòng\r\nRAM 16GB kết hợp cùng ổ cứng SSD 256GB + 1 khe cắm giúp bạn dễ dàng lưu trữ dữ liệu\r\nMàn hình 17inch có độ phân giải WQXGA và độ phủ màu DCI-P3 lên đến 99% cho hình ảnh được hiển thị rõ nét\r\nTích hợp Webcam IR FHD IR có hai micrô cho phép bạn thoải mái trò chuyện, video cùng mọi người\r\nThiết kế mỏng nhẹ, sang trọng, trọng lượng chỉ 1.350kg cho phép bạn cất giữ trong balo', 5, 'uQqIZkNnO61zGwBb8R03zuLDE3syjW5U.webp', '2023-11-26 04:33:49', '2023-11-26 04:33:49'),
(41, 'PRD00041', 20, 'Laptop Huawei Matebook D16', 'Huawei', NULL, 18900000, 'Chip Intel Core i5-12450H, card đồ họa Intel UHD Graphics thích hợp cho người dùng văn phòng tác vụ nặng như load các file báo cáo, exel hàng nghìn dòng.\r\nRam 8GB và ổ cứng SSD 512GB cho thời gian load ứng dụng nhanh, lưu trữ thoải mái.\r\nkích thước màn hình khá rộng, lên tới 16 inch đáp ứng cho việc giải trí, xem phim cực kỳ thỏa mãn, độ sáng tới 300 nits, sử dụng thoải mái ở ngoài trời mà không lo lắng bị lóa.\r\nTrọng lượng chỉ 1.7 kg có thể mang đi và di chuyển dễ dàng.\r\nMáy đi kèm Windows 11 bản quyền.', 5, '5DBXd5jazBEynpVMuL3vYAkFt3JA7Fua.webp', '2023-11-26 04:34:52', '2023-11-26 04:34:52'),
(42, 'PRD00042', 20, 'Laptop Dell Inspiron 14 Plus 7420 T9K26', 'Dell', NULL, 20000000, NULL, 5, 'UDtAtvYkZ2k9X09qL7BoXWOYJDE8gbyQ.webp', '2023-11-26 04:35:46', '2023-11-26 04:35:46');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `auto_generate_product_code` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
  DECLARE max_id INT;
  SET max_id = (SELECT MAX(id) FROM products);
  SET NEW.product_code = CONCAT('PRD', LPAD(max_id + 1, 5, '0'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals` AFTER INSERT ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = NEW.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = NEW.category_id
    )
  WHERE id = NEW.category_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals_after_delete` AFTER DELETE ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = OLD.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = OLD.category_id
    )
  WHERE id = OLD.category_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_totals_after_update` AFTER UPDATE ON `products` FOR EACH ROW BEGIN
  UPDATE categories
  SET total_product = (
      SELECT SUM(quantity) + COUNT(*) FROM products WHERE category_id = NEW.category_id
    ),
    total_price = (
      SELECT SUM(price * (quantity + 1)) FROM products WHERE category_id = NEW.category_id
    )
  WHERE id = NEW.category_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `product_code`, `created_at`, `updated_at`) VALUES
(8, 'Nguyễn Xuân Thái', 'xuanthaing22@gmail.com', 'abc', 'PRD00039', '2023-11-26 10:42:43', '2023-11-26 10:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for normal user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thai nguen', 'nam.n1352@gmail.com', NULL, '$2y$10$xdl3KOD1gMsPlRtUSN6OQea10tteMS.4dfNhcqmq0upXfh5lK54Vi', 'ADM', 'McYIl949VXpSKrymJLvtsIiGSz92oULV3sd1xP70udF4zAkoUY2MKuZVgMdn', '2023-07-06 09:43:36', '2023-07-06 09:43:36'),
(2, 'bartng2', 'thaing2002@gmail.com', NULL, '$2y$10$x3Qf1kqiX0ioaRocTbi1N.YwEUz9cYYgVA/68gjywlEFooeeMfRli', 'USR', 'qYXYLJ1WJISEcfgeavSOVBfXMP1RUw14Y58MeZ7lsmXXqIdQvwXYWxsSoYsG', '2023-07-07 01:47:01', '2023-07-07 01:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_code`, `category_id`, `name`, `brand`, `rate`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(38, 2, 'PRD00006', '17', 'iPhone 13 128GB', 'Apple', NULL, 16490000, '0000-00-00', 'dZ9r5aswVDhQgLY8ojdZMxjmIqaYihBE.webp', '2023-11-25 10:18:22', '2023-11-25 10:18:22'),
(40, 2, 'PRD00008', '17', NULL, NULL, NULL, 100000, NULL, 'LWGd6tD9SSZ27tNi56vWsHrAH8dT60zd.webp', '2023-11-25 23:02:57', '2023-11-25 23:02:57'),
(51, 2, 'PRD00016', '20', 'Laptop ASUS ZenBook UM3402YA-KM074W', 'ASUS', NULL, 23400000, 'Kích thước 14 inch cùng độ phân giải cao hỗ trợ hiển thị hình ảnh sắc nét\r\nBộ vi xử lý Intel Core i5-1340P cho bạn trải nghiệm mượt mà\r\nCard Intel Iris Xe Graphics cho khả năng xử lý đồ họa tốt trơn tru\r\nRAM 16 GB giúp mở nhiều tab trình duyệt cùng một lúc mà không giật, treo máy\r\nỔ cứng SSD 512 GB có dung lượng lưu trữ đủ lớn và tốc độ truy xuất nhanh\r\nBảo mật vân tay an toàn và tiện lợi bảo giúp vệ dữ liệu cá nhân', '2GqwXW4EUKxBPOaGkzFPcEsR5hZrVbRC.webp', '2023-11-26 10:40:32', '2023-11-26 10:40:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorys_category_code_unique` (`category_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `fk_products_cate` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_cate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
