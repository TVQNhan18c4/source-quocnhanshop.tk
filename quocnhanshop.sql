-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2022 lúc 09:25 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quocnhanshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id`, `ten_sp`, `anh`, `dongia`, `soluong`, `thanhtien`, `id_donhang`, `id_nguoidung`) VALUES
(28, 'Samsung Galaxy S22 Ultra', 'Galaxy-S22-Ultra-Burgundy-600x600.jpg', 30990000, 1, 30990000, 22, 12),
(29, 'iPhone 13 Pro', 'iphone-13-pro-thumb-600x600.jpg', 29390000, 1, 29390000, 22, 12),
(30, 'OPPO Reno5', 'oppo-reno5-5g-thumb-600x600.jpg', 8490000, 1, 8490000, 22, 12),
(31, 'Vivo Y72', 'vivo-y72-5g-blue-600x600.jpg', 7290000, 1, 7290000, 22, 12),
(35, 'Samsung Galaxy S22 Ultra', 'Galaxy-S22-Ultra-Burgundy-600x600.jpg', 30990000, 1, 30990000, 25, 12),
(45, 'iPhone 13 Pro', 'iphone-13-pro-thumb-600x600.jpg', 29390000, 1, 29390000, 34, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoinhan` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `ngaydat` date NOT NULL,
  `id_nguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `nguoinhan`, `sdt`, `diachi`, `tongtien`, `trangthai`, `ngaydat`, `id_nguoidung`) VALUES
(22, 'Trần Văn Quốc Nhân', '0896202741', 'k666/9 Trưng Nữ Vương, Đà Nẵng', 76160000, 'từ chối', '2022-09-23', 12),
(25, 'Nguyên', '0983618591', 'đà nẵng', 30990000, 'xác nhận', '2022-09-25', 12),
(34, 'A', '0123', 'b', 29390000, 'chờ xác nhận', '2022-09-30', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `loai` varchar(50) NOT NULL DEFAULT 'khach'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `ten`, `matkhau`, `loai`) VALUES
(12, 'khachhang', 'b9bc4dd06b7d2d49cb9fb3d8d9fba6c1', 'khach'),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `manghinh` varchar(50) NOT NULL,
  `hedieuhanh` varchar(50) NOT NULL,
  `camera_truoc` varchar(50) NOT NULL,
  `camera_sau` varchar(50) NOT NULL,
  `chip` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `rom` varchar(50) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `pin_sac` varchar(50) NOT NULL,
  `id_thuonghieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `anh`, `ten`, `gia`, `manghinh`, `hedieuhanh`, `camera_truoc`, `camera_sau`, `chip`, `ram`, `rom`, `sim`, `pin_sac`, `id_thuonghieu`) VALUES
(5, 'iphone-xr-128gb-600x600.jpg', 'iPhone XR', 13490000, 'IPS LCD, 6.1\", Liquid Retina', 'iOS 15', '7 MP', '12 MP', 'Apple A12 Bionic', '3 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '2942 mAh, 15 W', 4),
(6, 'oppo-a16-silver-8-600x600.jpg', 'OPPO A16', 3790000, 'IPS LCD, 6.52', 'Android 11', '8 MP', 'Chính 13 MP & Phụ 2 MP, 2 MP', 'MediaTek Helio G35', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 10 W', 3),
(11, 'oppo-a74-5g-silver-01-600x600.jpg', 'OPPO A74', 5700000, 'IPS LCD, 6.5\", Full HD+', 'Android 11', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Snapdragon 480 8 nhân 5G', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '5000 mAh, 18 W', 3),
(12, 'OPPO-A76-đen-600x600.jpg', 'OPPO A76', 5990000, 'IPS LCD, 6.56', 'Android 11', '8 MP', 'Chính 13 MP & Phụ 2 MP', '   Snapdragon 680 8 nhân', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 33 W', 3),
(13, 'oppo-a95-4g-bac-2-600x600.jpg', 'OPPO A95', 6990000, 'AMOLED, 6.43\", Full HD+', 'Android 11', '16 MP', 'Chính 48 MP & Phụ 2 MP, 2 MP', 'Snapdragon 662', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 33 W', 3),
(14, 'oppo-reno5-5g-thumb-600x600.jpg', 'OPPO Reno5', 8490000, 'AMOLED, 6.43\", Full HD+', 'Android 11', '32 MP', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', 'Snapdragon 765G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '4300 mAh, 65 W', 3),
(19, 'Samsung-galaxy-m53-nâu-600x600.jpg', 'Samsung Galaxy M33', 7690000, 'TFT LCD, 6.6\", Full HD+', 'Android 12', '8 MP', 'Chính 50 MP & Phụ 5 MP, 2 MP, 2 MP', 'Exynos 1280 8 nhân', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '5000 mAh, 25 W', 2),
(20, 'samsung-galaxy-a73-5g-xanh-thumb-600x600.jpg', 'Samsung Galaxy A73', 11990000, 'Super AMOLED Plus, 6.7\", Full HD+', 'Android 12', '32 MP', 'Chính 108 MP & Phụ 12 MP, 5 MP, 5 MP', 'Snapdragon 778G 5G 8 nhân', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', '5000 mAh, 25 W', 2),
(21, 'samsung-galaxy-s21-plus-den-600x600-600x600.jpg', 'Samsung Galaxy S21+', 17990000, 'Dynamic AMOLED 2X, 6.7\", Full HD+', 'Android 11', '10 MP', 'Chính 12 MP & Phụ 64 MP, 12 MP', 'Exynos 2100', '8 GB', '128 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4800 mAh, 25 W', 2),
(22, 'Galaxy-S22-Ultra-Burgundy-600x600.jpg', 'Samsung Galaxy S22 Ultra', 30990000, 'Dynamic AMOLED 2X, 6.8\", Quad HD+ (2K+)', 'Android 12', '40 MP', 'Chính 108 MP & Phụ 12 MP, 10 MP, 10 MP', 'Snapdragon 8 Gen 1 8 nhân', '8 GB', '128 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '5000 mAh, 45 W', 2),
(24, 'samsung-galaxy-a32-4g-thumb-600x600-600x600.jpg', 'Samsung Galaxy A32', 6490000, 'Super AMOLED, 6.4\", Full HD+', 'Android 11', '20 MP', 'Chính 64 MP & Phụ 8 MP, 5MP, 5MP', 'MediaTek Helio G80', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 15 W', 2),
(25, 'vivo-y21-white-01-1-600x600.jpg', 'Vivo Y21', 3990000, 'IPS LCD, 6.51\", HD+', 'Android 11', '8 MP', 'Chính 13 MP & Phụ 2 MP', 'MediaTek Helio P35', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 18 W', 5),
(26, 'vivo-y53s-xanh-600x600.jpg', 'Vivo Y53s', 6990000, 'IPS LCD, 6.58\", Full HD+', 'Android 11', '16 MP', 'Chính 64 MP & Phụ 2 MP, 2 MP', 'MediaTek Helio G80', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 33 W', 5),
(27, 'vivo-y55-den-thumb-600x600.jpg', 'Vivo Y55', 6990000, 'AMOLED, 6.44\", Full HD+', 'Android 12', '16 MP', 'Chính 50 MP & Phụ 2 MP, 2 MP', 'Snapdragon 680 8 nhân', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 44 W', 5),
(28, 'vivo-y72-5g-blue-600x600.jpg', 'Vivo Y72', 7290000, 'IPS LCD, 6.58\", Full HD+', 'Android 11', '16 MP', 'Chính 64 MP & Phụ 8 MP, 2 MP', 'MediaTek Dimensity 700', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', '5000 mAh, 18 W', 5),
(29, 'Vivo-y15s-2021-xanh-den-660x600.jpg', 'Vivo Y15s', 3490000, 'IPS LCD, 6.51\", HD+', 'Android 11 (Go Edition)', '8 MP', 'Chính 13 MP & Phụ 2 MP', 'MediaTek Helio P35', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 10 W', 5),
(30, 'iphone-13-mini-xanh-la-thumb-600x600.jpg', 'iPhone 13 mini', 18490000, 'OLED, 5.4\", Super Retina XDR', 'iOS 15', '12 MP', '2 camera 12 MP', 'Apple A15 Bionic', '4 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2438 mAh, 20 W', 4),
(32, 'iphone-12-mini-den-15-600x600.jpg', 'iPhone 12 mini', 18990000, 'OLED, 5.4', 'iOS 15', '12 MP', '2 camera 12 MP', ' Apple A14 Bionic', '4 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2227 mAh, 20 W', 4),
(33, 'iphone-12-pro-xam-new-600x600-600x600.jpg', 'iPhone 12 Pro', 26290000, 'OLED, 6.1', 'iOS 15', '12 MP', '3 camera 12 MP', '  Apple A14 Bionic', '6 GB', '256 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2815 mAh, 20 W', 4),
(34, 'iphone-12-pro-max-trang-bac-600x600-1-600x600.jpg', 'iPhone 12 Pro Max', 28990000, 'OLED, 6.7\", Super Retina XDR', 'iOS 15', '12 MP', '3 camera 12 MP', 'Apple A14 Bionic', '6 GB', '256 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3687 mAh, 20 W', 4),
(35, 'iphone-13-pro-thumb-600x600.jpg', 'iPhone 13 Pro', 29390000, 'OLED, 6.1', 'iOS 15', '12 MP', '3 camera 12 MP', '       Apple A15 Bionic', '6 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3095 mAh, 20 W', 4),
(40, 'realme-9-pro-thumb-600x600.jpg', 'Realme 9 Pro', 7490000, 'IPS LCD, 6.6\", Full HD+', 'Android 12', '16 MP', 'Chính 64 MP & Phụ 8 MP, 2 MP', ' Snapdragon 695 5G', ' 8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', '5000 mAh, 33 W', 14),
(41, 'realme-8-silver-600x600.jpg', 'Realme 8', 6490000, 'Super AMOLED, 6.4\", Full HD+', 'Android 11', ' 16 MP', ' Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', ' MediaTek Helio G95', '8 GB', ' 128 GB', ' 2 Nano SIM, Hỗ trợ 4G', ' 5000 mAh, 30 W', 14),
(42, 'realme-9i-den-thumb-600x600.jpg', 'Realme 9i', 4990000, 'IPS LCD, 6.6', 'Android 11', ' 16 MP', 'Chính 50 MP & Phụ 2 MP, 2 MP', '         Snapdragon 680', ' 4 GB', ' 64 GB', ' 2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 33 W', 14),
(53, 'samsung-galaxy-z-fold-3-silver-1-600x600.jpg', 'Samsung Galaxy Z Fold 3', 33990000, 'Dynamic AMOLED 2X, Chính 7.6\" & Phụ 6.2\", Full HD+', 'Android 11', '10 MP & 4 MP', '3 camera 12 MP', 'Snapdragon 888', '12 GB', '256 GB', '2 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4400 mAh, 25 W', 2),
(54, 'oppo-a16k-thumb1-600x600-1-600x600.jpg', 'OPPO A16K', 3290000, 'IPS LCD, 6.52\"', 'Android 11', '5 MP', '13 MP', 'MediaTek Helio G35', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '4230 mAh, 10 W', 3),
(55, 'vivi-y01-đen-thumb-600x600.jpg', 'Vivo Y01', 2990000, 'IPS LCD, 6.51\"', 'Android 11 (Go Edition)', '5 MP', '8 MP', 'MediaTek Helio P35', '2 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 10 W', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `ten`) VALUES
(2, 'SamSung'),
(3, 'OPPO'),
(4, 'Apple'),
(5, 'Vivo'),
(14, 'Realme');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoidung` (`id_nguoidung`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thuonghieu` (`id_thuonghieu`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_thuonghieu`) REFERENCES `thuonghieu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
