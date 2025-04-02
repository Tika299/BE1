-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 10:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kt_be`
--
CREATE DATABASE IF NOT EXISTS `kt_be` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kt_be`;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ma` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ma`, `ten`, `ghichu`) VALUES
(1, 'Iphone', ''),
(2, 'SamSung', ''),
(3, 'Oppo', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ma` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `mota` text NOT NULL,
  `hinh` text NOT NULL,
  `madanhmuc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma`, `ten`, `gia`, `mota`, `hinh`, `madanhmuc`) VALUES
(1, 'SamSung Galaxy Z-flip 4', 12000000, 'Là sản phẩm có thiết kết độc đáo mang đến cho người dùng một công nghệ vượt bật', 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg', 2),
(2, 'SamSung Galaxy Z-font 4', 10000000, 'Với thiết kế độc đáo với màn hình gập dọc mang đến cho người dùng trải nghiệm của tương lai', 'samsung-galaxy-z-fold4-kem-256gb-600x600.jpg', 2),
(3, 'iPhone 16 Pro Max 256GB', 34790000, 'iPhone 16 Pro Max có màn hình OLED 6.9 inch, với công nghệ màn hình Super Retina XDR, camera gồm: ống kính Fusion 48MP và Ultra Wide 48MP và camera Telephoto 5x 12MP, kết hợp camera trước 12MP chụp hình sắc nét đến từng chi tiết nhỏ, ghi lại những khoảnh khắc bên gia đình. Chiếc điện thoại iPhone 16 mới này được trang bị chip A18 Pro với 6 lõi CPU và 6 lõi GPU cùng với Neural Engine 16 lõi.', 'iphone-16-pro-max-titan-den.jpg', 1),
(4, 'iPhone 15 Pro Max 256GB', 29490000, 'iPhone 15 Pro Max sở hữu màn hình Super Retina XDR OLED 6.7 inches với độ phân giải 2796 x 1290 pixels, cung cấp trải nghiệm hình ảnh sắc nét, chân thực. So với các phiên bản tiền nhiệm, thế hệ iPhone 15 bản Pro Max đảm bảo mang tới hiệu năng mạnh mẽ với sự hỗ trợ của chipset Apple A17 Pro, cùng bộ nhớ ấn tượng. Đặc biệt hơn, điện thoại iPhone 15 ProMax mới này còn được đánh giá cao với camera sau 48MP và camera trước 12MP, hỗ trợ chụp ảnh với độ rõ nét cực đỉnh.', 'iphone15-pro-max-titan-den.jpg', 1),
(5, 'OPPO Find X5 Pro 12GB 256GB', 15990000, 'OPPO Find X5 Pro sở hữu thiết kế tinh tế, đẳng cấp với mặt sau chất liệu gốm, thêm vào đó là camera Hasseblad cùng màn hình 1 tỷ màu Bionic và hiệu năng vượt trội từ chip Snapdragon 8 Gen 1. Hệ thống camera đột phá với 3 camera sau và camera selfie chất lượng cao cho những bức ảnh ấn tượng, đặc biệt là khả năng quay đếm 4K.', 'oppo-find-x5-pro-den_1.jpg', 3),
(6, 'OPPO Reno10 Pro+ 5G 12GB 256GB', 13790000, 'OPPO Reno10 Pro Plus 5G chính là phiên bản điện thoại mới nhất trong dòng OPPO Reno và rất được mong đợi. Đây là chiếc điện thoại thông minh có hỗ trợ 5G với những thông số gây ấn tượng mạnh. Cụ thể, Reno10 Pro+ tạo được điểm chú ý đầu tiên từ ngay trong thiết kế của sản phẩm. Những tính năng tuyệt vời được trang bị trên chiếc điện thoại này bao gồm bộ xử lý mạnh mẽ, màn hình lớn sống động và hệ thống 3 camera với độ phân giải rất đáng để mong đợi.', 'oppo-reno10-pro-plus-xam_1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `quyen` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `fullname`, `quyen`) VALUES
('admin@gmail.com', '12345678', 'Le Xuan Vu', 'admin'),
('email2@gmail.com', '12345689', 'Dai Thi Tru', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
