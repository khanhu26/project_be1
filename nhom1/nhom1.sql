-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2021 at 02:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom1`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Oppo'),
(4, 'Xiaomi'),
(5, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'samsung-galaxy-note-10-lite', 2, 1, 10390000, 'samsung-galaxy-note-10-lite.jpg', 'Màn hình:	6.7 inchs, Full HD +, 1080 x 2280 Pixels\r\nCPU:	4 nhân 2.7 GHz & 4 nhân 1.7 GHz, 8, 4 nhân 2.7 GHz & 4 nhân 1.7 GHz\r\nRAM:	8 GB\r\nCamera sau:	Chính 12 MP và Phụ 12 MP,12 MP\r\nCamera trước:	32.0Mp\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nHỗ trợ đa sim:	2 Nano SIM, Hỗ trợ 4G\r\nHệ điều hành:	Android 10\r\nWifi:	Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot\r\nQuay phim:	Quay phim siêu chậm 960 fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@60fps\r\nPin:	4500 mAh, hỗ trợ sạc nhanh', 0, '2021-05-08 00:43:27'),
(2, 'SamSung-Galaxy-note-20-Ultra-5g', 2, 1, 29990000, 'samsung-galaxy-note-20-ultra-5g.jpg', 'Màn hình:	Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	12GB\r\nCamera sau:	Chính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF\r\nCamera trước:	10 MP\r\nBộ nhớ trong:	256GB\r\nHỗ trợ đa sim:	2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 5G\r\nHệ điều hành:	Android 10\r\nWifi:	Dual-band (2.4 GHz/5 GHz), Wi-Fi Direct, Wi-Fi hotspot\r\nQuay phim:	Quay phim 8K 4320p@24fps\r\nPin:	Pin chuẩn Li-Ion; 4500 mAh; Tiết kiệm pin, Siêu tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây, Sạc ngược không dây\r\n', 0, '2021-05-08 00:47:31'),
(3, 'Samsung A20s 64G', 3, 1, 7490000, 'samsungA20.jpg', 'Màn hình:IPS LCD, 6.5\", HD+\r\nHệ điều hành:Android 9 (Pie)\r\nCamera sau:Chính 13 MP & Phụ 8 MP, 5 MP\r\nCamera trước:8 MP\r\nChip:Snapdragon 450\r\nRAM:4 GB\r\nBộ nhớ trong:64 GB\r\nSIM:2 Nano SIM, Hỗ trợ 4G\r\nPin, Sạc:4000 mAh, 15 W', 0, '2021-05-08 00:51:34'),
(4, 'Máy Tính Bảng Samsung Galaxy Tab S7 Plus T975 (6GB/128GB) ', 2, 3, 16990000, 'mt1.jpg', 'GSM850, GSM900, DCS1800, PCS1900\r\nBăng tần 3G	B1(2100), B2(1900), B4(AWS), B5(850), B8(900)\r\nDung lượng pin	10090mAh\r\nThời gian pin	Thời gian sử dụng Internet (LTE) (Hours): Lên tới 8; Thời gian phát lại Video (Giờ, Wireless): Up to 14; Thời gian thoại (4G LTE) (Giờ): Lên tới 75; Thời gian sử dụng Internet (Wi-Fi) (Giờ): Lên tới 8; Thời gian phát Audio (Giờ, Wireless): Up to 205\r\nBluetooth	v5.0\r\nThương hiệu	Samsung\r\nXuất xứ thương hiệu	Hàn Quốc\r\nCamera sau	13.0 MP + 5.0 MP\r\nCamera trước	8.0 MP\r\nHỗ trợ thẻ nhớ ngoài	MicroSD (Up to 1TB)\r\nTốc độ CPU	8 nhân, 3.09GHz, 2.4GHz, 1.8GHz\r\nKích thước	\r\n185.0 x 285.0 x 5.7 (HxWxD, mm)\r\n\r\nLoại/ Công nghệ màn hình	Super AMOLED\r\nHỗ trợ 4G	4G FDD LTE: B1(2100), B2(1900), B3(1800), B4(AWS), B5(850), B7(2600), B8(900), B12(700), B13(700), B20(800), B25(1900), B26(850), B28(700), B66(AWS-3); 4G TDD LTE: B38(2600), B40(2300), B41(2500)\r\nPhụ kiện đi kèm	Sách hướng dẫn, cáp sạc, bút cảm ứng\r\nBộ nhớ khả dụng	102.8GB\r\nNghe nhạc	MP3, M4A, 3GA, AAC, OGG, OGA, WAV, WMA, AMR, AWB, FLAC, MID, MIDI, XMF, MXMF, IMY, RTTTL, RTX, OTA\r\nXuất xứ	Việt Nam\r\nPin có thể tháo rời	Không\r\nTrọng lượng	575g\r\nQuay phim	UHD 4K (3840 x 2160)@30fps\r\nRAM	6GB\r\nĐộ phân giải	2800 x 1752 Pixel\r\nROM	128GB\r\nKích thước màn hình	12.4 inch', 0, '2021-05-08 01:00:21'),
(5, 'Máy tính bảng Samsung Galaxy Tab S7\r\n\r\n', 2, 3, 18900000, 'mt2.jpg', 'Màn hình:	11\", LTPS IPS LCD\r\nHệ điều hành:	Android 10\r\nChip xử lý:	Snapdragon 865+\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	4G, Có nghe gọi\r\nSIM:\r\n1 Nano SIM (chung thẻ nhớ)\r\nHOTSIM VNMB Siêu sim (5GB/ngày)\r\nCamera sau:	Chính 13 MP & Phụ 5 MP\r\nCamera trước:	8 MP\r\nPin, Sạc:	8000 mAh', 1, '2021-05-08 01:00:14'),
(6, 'Máy tính bảng iPad Pro 11 inch Wifi 128GB (2020)', 1, 2, 219000000, 'ipad1.jpg', 'Màn hình:	11\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	28.65 Wh (~ 7600 mAh)', 0, '2021-05-08 02:29:58'),
(7, 'Điện thoại iPhone 11 128GB', 1, 1, 19900000, '\r\niphone11promax.jpg', 'Màn hình:	IPS LCD, 6.1\", Liquid Retina\r\nHệ điều hành:	iOS 14\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:	12 MP\r\nChip:	Apple A13 Bionic\r\nRAM:	4 GB\r\nBộ nhớ trong:	128 GB\r\nSIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 4G\r\nPin, Sạc:	3110 mAh, 18 W', 1, '2021-05-08 01:04:00'),
(8, 'Laptop Apple MacBook Air M1 2020 8GB/256GB (MGN63SA/A)', 1, 2, 27900000, 'macbook1.jpg', 'CPU:	Apple M1\r\nRAM:	8 GB\r\nỔ cứng:	SSD: 256 GB\r\nMàn hình:	13.3 inch, Retina (2560 x 1600)\r\nCard màn hình:	Card đồ họa tích hợp, 7 nhân GPU\r\nCổng kết nối:	2 x Thunderbolt 3 (USB-C)\r\nHệ điều hành:	Mac OS\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 4.1 mm đến 16.1 mm, 1.29 kg\r\nThời điểm ra mắt:	2020', 1, '2021-05-08 02:45:02'),
(9, 'Điện thoại iPhone 12 Pro Max 128GB', 1, 1, 26990000, 'iphone12promax.jpg', 'Màn hình:	OLED, 6.7\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	3 camera 12 MP\r\nCamera trước:	12 MP\r\nChip:	Apple A14 Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nSIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 5G\r\nPin, Sạc:	3687 mAh, 20 W', 1, '2021-05-08 01:07:04'),
(10, 'Tai nghe Bluetooth AirPods 2 Apple MV7N2\r\n', 1, 5, 29990000, 'tainghe1.jpg', 'Tương thích:	AndroidiOS (iPhone)\r\nCổng sạc:	Lightning\r\nThời gian sử dụng:	5 giờ\r\nThời gian sạc đầy:	2 giờ\r\nKết nối cùng lúc:	1 thiết bị\r\nHỗ trợ kết nối:	10m (Bluetooth 5.0)\r\nPhím điều khiển:	Mic thoạiNghe/nhận cuộc gọiPhát/dừng chơi nhạcChuyển bài hát\r\nTiện ích:	Có mic thoại\r\nThương hiệu của:	Mỹ\r\nSản xuất tại:	Việt Nam / Trung Quốc (tùy lô hàng)\r\nBộ bán hàng chuẩn:	Tai ngheSách hướng dẫnHộp sạcDây cáp Lightning', 0, '2021-05-08 01:10:17'),
(11, 'Điện thoại OPPO Reno4', 3, 1, 6900000, '\r\nopporeno4.jpg', 'Màn hình:	AMOLED, 6.4\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	Chính 32 MP & Phụ cảm biến thông minh A.I\r\nChip:	Snapdragon 720G\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nSIM:	2 Nano SIM, Hỗ trợ 4G\r\nPin, Sạc:	4015 mAh, 30 W ', 0, '2021-05-08 01:13:27'),
(12, 'Điện thoại OPPO Reno5 5G', 3, 1, 11290000, 'oppporeno5pro.jpg', 'Màn hình:	AMOLED, 6.43\", Full HD+\r\nHệ điều hành:	Android 11\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	32 MP\r\nChip:	Snapdragon 765G\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nSIM:	2 Nano SIM, Hỗ trợ 5G\r\nPin, Sạc:	4300 mAh, 65 W', 0, '2021-05-08 01:13:18'),
(13, 'Tai nghe Có Dây EP OPPO MH151', 3, 5, 590000, 'tainghe2.jpg', 'Tương thích:	AndroidWindows\r\nJack cắm:	3.5 mm\r\nKết nối cùng lúc:	1 thiết bị\r\nTrọng lượng:	99g\r\nThương hiệu của:	Trung Quốc\r\nSản xuất tại:	Trung Quốc\r\nBộ bán hàng chuẩn:	Tai nghe', 1, '2021-05-08 01:14:47'),
(14, 'Oppo Watch 41mm dây silicone hồng', 3, 4, 5300000, 'dongho1.jpg', 'Màn hình:	AMOLED, 1.6 inch\r\nThời lượng pin:	Khoảng 14 ngày (chế độ tiết kiệm pin), Khoảng 24 giờ (chế độ thường)\r\nKết nối với hệ điều hành:	Android, iOS\r\nMặt:	Kính cường lực\r\nĐường kính mặt:	41 mm\r\nTính năng cho sức khỏe:	Theo dõi giấc ngủ, Đếm số bước chân, Tính quãng đường chạy, Đo nhịp tim, Chế độ luyện tập, Tính lượng calories tiêu thụ', 0, '2021-05-08 02:44:10'),
(15, 'Oppo Watch 46mm dây silicone vàng đồng', 3, 4, 6931000, '\r\ndongho2.jpg', 'Màn hình:	AMOLED, 1.91 inch\r\nThời lượng pin:	Khoảng 21 ngày (chế độ tiết kiệm pin), Khoảng 36 giờ (chế độ thường)\r\nKết nối với hệ điều hành:	Android, iOS\r\nMặt:	Kính cường lực\r\nĐường kính mặt:	46 mm\r\nTính năng cho sức khỏe:	Theo dõi giấc ngủ, Đếm số bước chân, Tính quãng đường chạy, Đo nhịp tim, Chế độ luyện tập, Tính lượng calories tiêu thụ', 0, '2021-05-08 02:44:17'),
(16, 'Điện thoại Xiaomi Mi 11 Lite', 4, 1, 7990000, 'xiaomi1\r\n', 'Màn hình:	AMOLED, 6.55\", Full HD+\r\nHệ điều hành:	Android 11\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 5 MP\r\nCamera trước:	16 MP\r\nChip:	Snapdragon 732G\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nSIM:	2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nPin, Sạc:	4250 mAh, 33 W', 0, '2021-05-15 02:56:08'),
(17, 'Điện thoại Xiaomi Mi 10T Pro 5G', 4, 1, 12290000, 'xiaomi2.jpg', 'Màn hình:	IPS LCD, 6.67\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 108 MP & Phụ 13 MP, 5 MP\r\nCamera trước:	20 MP\r\nChip:	Snapdragon 865\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB\r\nSIM:	2 Nano SIM, Hỗ trợ 5G\r\nPin, Sạc:	5000 mAh, 33 W\r\nXem thêm cấu hình chi tiết\r\n', 1, '2021-05-08 01:21:05'),
(22, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 1, 3, 18900000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 0, '2021-05-08 02:47:07'),
(18, 'Asus ZenBook UX425EA i5 1135G7/8GB/512GB/Cáp/Túi/Win10 (BM069T)', 4, 5, 2900000, 'tainghexiaomi1.jpg', 'Tương thích:	AndroidWindowsiOS (iPhone)\r\nCổng sạc:	Type-C\r\nThời gian sử dụng:	4 giờ\r\nThời gian sạc đầy:	1 giờ\r\nKết nối cùng lúc:	1 thiết bị\r\nHỗ trợ kết nối:	10m (Bluetooth 5.0)\r\nPhím điều khiển:	Mic thoạiNghe/nhận cuộc gọiPhát/dừng chơi nhạc\r\nTiện ích:	Chống ồnChống nước\r\nTrọng lượng:	120g\r\nThương hiệu của:	Trung Quốc\r\nSản xuất tại:	Trung Quốc\r\nBộ bán hàng chuẩn:	Tai ngheDây cáp Type-C', 0, '2021-05-08 01:23:07'),
(19, 'Đồng hồ thông minh Xiaomi Amazfit Bip Lite', 4, 4, 1390000, 'donghoxiaomi1.jpg', 'Màn hình:	1.28 inch\r\nThời lượng pin:	Khoảng 45 ngày\r\nKết nối với hệ điều hành:	Android 4.4 trở lên, iOS\r\nMặt:	Kính cường lực Gorilla Glass 3, 31.1 mm\r\nTính năng cho sức khỏe:	Tính lượng calories tiêu thụ, Đo nhịp tim, Đếm số bước chân', 0, '2021-05-08 01:25:03'),
(20, 'Tai nghe Bluetooth True Wireless Xiaomi Earbuds Basic 2 BHR4272GL', 4, 5, 790000, 'tainghexiaomi2.jpg', 'Tương thích:	AndroidWindowsiOS (iPhone)\r\nCổng sạc:	Micro USB\r\nThời gian sử dụng:	4 giờ\r\nThời gian sạc đầy:	1.5 giờ\r\nKết nối cùng lúc:	1 thiết bị\r\nHỗ trợ kết nối:	10m (Bluetooth 5.0)\r\nPhím điều khiển:	Nghe/nhận cuộc gọiPhát/dừng chơi nhạc\r\nĐiều khiển bằng:	Phím nhấn\r\nTiện ích:	Chống nước\r\nTrọng lượng:	35.4 g\r\nThương hiệu của:	Trung Quốc\r\nSản xuất tại:	Trung Quốc\r\nBộ bán hàng chuẩn:	Tai nghe2 cặp đệm tai ngheSách hướng dẫnKhông kèm cáp', 1, '2021-05-08 01:26:24'),
(21, 'Laptop Dell XPS 13 9300 i7 1065G7 16GB/512GB/Office365/Win10 (0N90H1)', 5, 2, 57900000, 'dell1.jpg', 'CPU:	Intel Core i7 Ice Lake, 1065G7, 1.30 GHz\r\nRAM:	16 GB, DDR4 (On board), 3733 MHz\r\nỔ cứng:	SSD 512GB NVMe PCIe\r\nMàn hình:	13.4 inch, 4K/UHD (3840 x 2400)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Plus Graphics\r\nCổng kết nối:	2 x Thunderbolt 3 (USB-C)\r\nHệ điều hành:	Windows 10 + Office 365 1 năm\r\nThiết kế:	Vỏ kim loại, PIN liền\r\nKích thước:	Dày 14.8 mm, 1.27 kg\r\nThời điểm ra mắt:	2020', 0, '2021-05-08 01:28:12'),
(23, 'Laptop Dell Inspiron 7400 i5 1135G7/8GB/512GB/2GB MX350/Win10 (N4I5206W)\r\n\r\n', 5, 2, 28490000, 'dell2.jpg', 'CPU:	Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz\r\nRAM:	8 GB, LPDDR4X (On board), 4267 MHz\r\nỔ cứng:	SSD 512GB NVMe PCIe\r\nMàn hình:	14\", QHD+ (2560x 1600)\r\nCard màn hình:	Card đồ họa rời, NVIDIA GeForce MX350, 2GB\r\nCổng kết nối:	2 x USB 3.2, Thunderbolt4 USB-C, HDMI\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa - nắp lưng bằng kim loại, PIN liền\r\nKích thước:	Dày 16.75 mm, 1.35 kg\r\nThời điểm ra mắt:	2020', 0, '2021-05-08 02:03:08'),
(25, 'Laptop Dell XPS 13 9310 i7 1165G7/16GB/512GB/Touch/Pen/Win10 (JGNH61)\r\n', 5, 2, 57490000, 'dell4.jpg', 'CPU:	Intel Core i7 Tiger Lake, 1165G7, 2.80 GHz\r\nRAM:	16 GB, LPDDR4X (On board), 4267 MHz\r\nỔ cứng:	SSD 512GB NVMe PCIe\r\nMàn hình:	13.4 inch, 4K/UHD (3840 x 2400)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Xe Graphics\r\nCổng kết nối:	2 x Thunderbolt4 USB-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 14.35 mm, 1.32 kg\r\nThời điểm ra mắt:	2020', 0, '2021-05-08 02:05:45'),
(24, 'Laptop Dell Inspiron 3501 i5 1135G7/4GB/512GB/Win10 (P90F005N3501B)\r\n', 5, 2, 16900000, 'dell3.jpg', 'CPU:	Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz\r\nRAM:	4 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 512GB NVMe PCIe\r\nMàn hình:	15.6\", Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Xe Graphics\r\nCổng kết nối:	2 x USB 3.2, HDMI, LAN (RJ45), USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.9 mm, 1.96 kg\r\nThời điểm ra mắt:	2020', 1, '2021-05-08 02:06:48'),
(26, 'Laptop Dell XPS 13 9310 i5 1135G7/8GB/256GB/Touch/Win10 (70231343)\r\n', 5, 2, 39990000, 'dell5.jpg', 'CPU:	Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz\r\nRAM:	8 GB, LPDDR4 (on board), 4267 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe\r\nMàn hình:	13.4 inch, Full HD+ (1920 x 1200)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Xe Graphics\r\nCổng kết nối:	2 x Thunderbolt4 USB-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 14.35 mm, 1.32 kg\r\nThời điểm ra mắt:	2020', 0, '2021-05-08 02:08:14'),
(27, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 1, 2, 27190000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 0, '2021-05-08 02:31:53'),
(28, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 1, 2, 27190000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 0, '2021-05-08 02:32:01'),
(30, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 1, 2, 27190000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 0, '2021-05-08 02:32:07'),
(29, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 1, 2, 27190000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 0, '2021-05-08 02:32:19'),
(101, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)\r\n\r\n', 1, 2, 27140000, 'ipad2.jpg', 'Màn hình:	12.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A12Z Bionic\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nKết nối:	Nghe gọi qua FaceTime\r\nCamera sau:	Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:	7 MP\r\nPin, Sạc:	36.71 Wh (~ 9720 mAh), 18 W', 1, '2021-05-08 02:34:27'),
(41, 'Apple Watch S6 LTE 44mm viền nhôm dây cao su xanh dương\r\n\r\n', 1, 5, 13500000, 'donghoapple4.jpg', 'Màn hình:	OLED, 1.78 inch\r\nThời lượng pin:	Khoảng 1.5 ngày\r\nKết nối với hệ điều hành:	iOS 14 trở lên\r\nMặt:	Ion-X strengthened glass\r\nĐường kính mặt:	44 mm\r\nTính năng cho sức khỏe:	Theo dõi giấc ngủ, Đếm số bước chân, Tính quãng đường chạy, Đo nhịp tim, Chế độ luyện tập, Tính lượng calories tiêu thụ', 0, '2021-05-08 02:38:18'),
(52, 'ádasd', 1, 3, 16990000, 'j,jpg', 'gggggb', 0, '2021-05-08 02:48:09'),
(51, 'Máy tính bảng iPad Air 4 Wifi Cellular 64GB (2020)\r\n\r\n', 1, 3, 20190000, 'ipad4.jpg', 'Màn hình:	10.9\", Liquid Retina\r\nHệ điều hành:	iPadOS 14\r\nChip xử lý:	Apple A14 Bionic\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nKết nối:	4G, Nghe gọi qua FaceTime\r\nSIM:\r\n1 Nano SIM hoặc 1 eSIM\r\nHOTSIM VNMB Siêu sim (5GB/ngày)\r\nCamera sau:	12 MP\r\nCamera trước:	7 MP\r\nPin, Sạc:	28.65 Wh (~ 7600 mAh)', 1, '2021-05-08 03:03:06'),
(56, 'Samsung Galaxy Watch Active 2 40mm viền nhôm dây silicone đen', 2, 4, 2310000, 'donghoss.jpg', 'Màn hình:	SUPER AMOLED, 1.2 inch\r\nThời lượng pin:	Khoảng 1.5 ngày\r\nKết nối với hệ điều hành:	Android 5.0, iOS 10 trở lên\r\nMặt:	Kính cường lực Gorrilla Glass Dx+\r\nĐường kính mặt:	40 mm\r\nTính năng cho sức khỏe:	Tính lượng calories tiêu thụ, Chế độ luyện tập, Đo nhịp tim, Tính quãng đường chạy, Theo dõi giấc ngủ, Đếm số bước chân', 0, '2021-05-08 03:08:59'),
(48, 'Apple Watch SE 40mm viền nhôm dây cao su hồng\r\n', 1, 4, 8019000, 'oppowatch1.jpg', 'Màn hình:	OLED, 1.57 inch\r\nThời lượng pin:	Khoảng 1.5 ngày\r\nKết nối với hệ điều hành:	iOS 14 trở lên\r\nMặt:	Ion-X strengthened glass\r\nĐường kính mặt:	40 mm\r\nTính năng cho sức khỏe:	Theo dõi giấc ngủ, Đếm số bước chân, Tính quãng đường chạy, Đo nhịp tim, Chế độ luyện tập, Tính lượng calories tiêu thụ', 0, '2021-05-08 03:11:18'),
(47, 'Tai nghe chụp tai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3', 1, 5, 13499000, 'taingheApple.jpg', 'Tương thích:	AndroidiOS (iPhone)\r\nCổng sạc:	Lightning\r\nCông nghệ âm thanh:	Active Noise CancellationAdaptive EQTransparency Mode\r\nThời gian sử dụng:	20 giờ\r\nKết nối cùng lúc:	1 thiết bị\r\nHỗ trợ kết nối:	10m (Bluetooth 5.0)\r\nTiện ích:	Chống ồn\r\nThương hiệu của:	Mỹ\r\nSản xuất tại:	Việt Nam / Trung Quốc (tùy lô hàng)\r\nBộ bán hàng chuẩn:	Tai ngheSách hướng dẫnHộp sạcCáp Type C - Lightning', 1, '2021-05-08 03:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Smartphone'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'SmartWatch'),
(5, 'Tai Nghe');
--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'user3', '33333', 'User'),
(3, 'user2', '22222', 'User'),
(2, 'admin1', '11111', 'Admin'),
(1, 'user1', '11111', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
