-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 05, 2023 lúc 01:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`taikhoan`, `matkhau`) VALUES
('admin', '123456'),
('huy@mail', '123456'),
('daongochuy', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsp`
--

CREATE TABLE `anhsp` (
  `IDAnh` int(11) NOT NULL,
  `tenanh` varchar(255) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhsp`
--

INSERT INTO `anhsp` (`IDAnh`, `tenanh`, `PID`) VALUES
(1, 'Giày Sneaker Adidas nam pro (2).png', 17),
(2, 'Giày Sneaker Adidas nam pro (3).png', 17),
(3, 'Giày Sneaker Adidas nam pro (4).png', 17),
(4, 'Giày Sneaker Adidas Nam pro (1).png', 17),
(5, 'Giày Sneaker Adidas Nam Ultraboost 21 (1).jpg', 18),
(6, 'Giày Sneaker Adidas Nam Ultraboost 21 (2).jpg', 18),
(7, 'Giày Sneaker Adidas Nam Ultraboost 21 (3).jpg', 18),
(8, 'Giày Sneaker Adidas Nam Ultraboost 21 (4).jpg', 18),
(9, 'GiaySneakerAdidasVegan(2).png', 19),
(10, 'GiaySneakerAdidasVegan(1).png', 19),
(11, 'GiaySneakerAdidasVegan(3).png', 19),
(12, 'GiaySneakerAdidasVegan(4).png', 19),
(13, 'GiaySneakerNike NikeAirForce1Low(1).jpg', 20),
(14, 'GiaySneakerNike NikeAirForce1Low(2).jpg', 20),
(15, 'GiaySneakerNike NikeAirForce1Low(3).jpg', 20),
(16, 'GiaySneakerNike NikeAirForce1Low(4).jpg', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ComID` int(20) NOT NULL,
  `CusID` int(20) NOT NULL,
  `PID` int(20) NOT NULL,
  `NgayBinhLuan` date NOT NULL,
  `NoiDung` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ComID`, `CusID`, `PID`, `NgayBinhLuan`, `NoiDung`, `Status`) VALUES
(1, 1, 17, '2023-07-02', 'Sản phẩm rất đẹp', 1),
(2, 3, 17, '2023-07-02', 'Sản phẩm giống với mô tả.', 1),
(7, 13, 18, '2023-07-02', 'Sản phẩm rất đẹp, đi rất thoải mái, đóng gói cẩn thận.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `OrderID` int(20) NOT NULL,
  `PID` int(20) NOT NULL,
  `SoLuongSP` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `CiD` int(20) NOT NULL,
  `CusID` int(20) NOT NULL,
  `PID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `OrderID` int(20) NOT NULL,
  `Ngay` date NOT NULL,
  `Tong` int(20) NOT NULL,
  `CusID` int(20) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `CusID` int(20) NOT NULL,
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(32) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `SoDienThoai` int(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `AnhCus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`CusID`, `TaiKhoan`, `MatKhau`, `HoTen`, `Email`, `SoDienThoai`, `DiaChi`, `AnhCus`) VALUES
(1, 'ngochuy', 'c33367701511b4f6020ec61ded352059', 'Đào Ngọc Huy', 'huy94565@huce.edu.vn', 924626163, 'Thái Bình', 'ngochuy.jpg'),
(3, 'xuanthang', 'c33367701511b4f6020ec61ded352059', 'Nguyễn Xuân Thắng', 'thang@email', 123, 'TB', 'xuanthang.jpg'),
(10, 'thanhdong', 'c33367701511b4f6020ec61ded352059', 'Tô Thành Đồng', 'thanhdong@gmail.com', 925685475, 'GL', ''),
(11, 'xuanvu', 'c33367701511b4f6020ec61ded352059', 'Xuân Vũ', 'vu@gmail.com', 925685456, 'QN', ''),
(12, 'minhhoang', 'c33367701511b4f6020ec61ded352059', 'Ngô Minh Hoàng', 'hoang@gmail.com', 2147483647, 'TH', ''),
(13, 'congduong', 'c33367701511b4f6020ec61ded352059', 'Đường Văn Công', 'cong@gmail.com', 2147483647, 'GL', 'congduong.jpg'),
(14, 'thangnguyen', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Xuân Thắng', 'thang@mail.com', 231231, 'abc', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichthuocsp`
--

CREATE TABLE `kichthuocsp` (
  `IDKichThuoc` int(11) NOT NULL,
  `kichthuoc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kichthuocsp`
--

INSERT INTO `kichthuocsp` (`IDKichThuoc`, `kichthuoc`) VALUES
(1, 37),
(2, 38),
(3, 39),
(4, 40),
(5, 41),
(6, 42),
(7, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausp`
--

CREATE TABLE `mausp` (
  `IDMau` int(11) NOT NULL,
  `tenmau` varchar(255) NOT NULL,
  `anhmau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausp`
--

INSERT INTO `mausp` (`IDMau`, `tenmau`, `anhmau`) VALUES
(1, 'Đen', 'Den.jpg'),
(3, 'Trắng', 'Trang.jpg'),
(4, 'Đỏ', 'Do.jpg'),
(5, 'Vàng', 'Vang.jpg'),
(6, 'Xanh lục', 'Xanhluc.jpg'),
(7, 'Cam', 'Cam.jpg'),
(8, 'Tím', 'Tim.jpg'),
(9, 'Xanh dương', 'Xanhduong.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `PID` int(20) NOT NULL,
  `TenSP` varchar(150) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `Gia` int(20) NOT NULL,
  `AnhSP` varchar(255) NOT NULL,
  `IDMau` int(11) NOT NULL,
  `IDKichThuoc` int(10) NOT NULL,
  `MoTa` text NOT NULL,
  `MaThuongHieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`PID`, `TenSP`, `SoLuong`, `Gia`, `AnhSP`, `IDMau`, `IDKichThuoc`, `MoTa`, `MaThuongHieu`) VALUES
(17, 'Giày Snaker Adidas Nam pro', 200, 1490000, 'Giày Sneaker Adidas Nam pro (3).png', 5, 3, ' THÔNG TIN CHI TIẾT\r\n\r\nCó dây buộc\r\nThân giày bằng vải lưới\r\nCảm giác thoáng khí\r\nGiày chạy bộ siêu nhẹ\r\nĐế giữa Boost và lớp đệm Lightstrike\r\nTrọng lượng: 198 g (cỡ Anh 8.5)\r\nChênh lệch độ cao đế giữa: 9,5 mm (gót giày: 21,5 mm / mũi giày: 12 mm)\r\nĐế ngoài công nghệ Quickstrike làm từ cao su Continental™', 1),
(18, 'Giày Sneaker Adidas Nam Ultraboost 21', 200, 859000, 'Giày Sneaker Adidas Nam Ultraboost 21 (1).jpg', 1, 4, ' THÔNG SỐ\r\nVừa vặn như đi tất\r\nCó dây buộc\r\nThân Giày Sneaker Adidas Nam Primeknit+\r\nLớp lót bằng vải dệt\r\nĐệm gót giày nâng đỡ\r\nĐế giữa Boost\r\nTrọng lượng: 340 g\r\nChênh lệch độ cao đế giữa: 10 mm (gót giày 30,5 mm / mũi giày 20,5 mm)\r\nĐế ngoài Stretchweb làm từ cao su Continental™', 1),
(19, 'Giày Sneaker Adidas Vegan', 100, 759000, 'GiaySneakerAdidasVegan(1).png', 3, 3, ' Dáng regular fit\r\nCó dây giày\r\nThân giày bằng da tổng hợp\r\nLớp lót bằng vải dệt\r\nĐế ngoài bằng cao su\r\nChất liệu vegan thay thế: Tối thiểu 25% thành phần tái chế\r\nMàu sản phẩm: Cloud White / Cloud White / Vivid Red', 2),
(20, 'Giày Sneaker Nike Air Force 1 Low', 300, 269000, 'GiaySneakerNike NikeAirForce1Low(1).jpg', 3, 6, ' Giày cao gót:\r\nThấp\r\nLoại Khóa:\r\nKhóa dây\r\nChất liệu:\r\nDa\r\nChiều rộng phù hợp:\r\nKhông\r\nXuất xứ:\r\nTrung Quốc\r\nDịp:\r\nHằng Ngày\r\nChiều cao cổ giày:\r\nCổ thấp\r\nĐịa chỉ tổ chức chịu trách nhiệm sản xuất\r\n36/1 an hòa, mỗ lao, hà đông, hà nội\r\nTên tổ chức chịu trách nhiệm sản xuất:\r\nCông ty TNHH MTV Tân Trung', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaThuongHieu` int(10) NOT NULL,
  `TenThuongHieu` varchar(50) NOT NULL,
  `Anh` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaThuongHieu`, `TenThuongHieu`, `Anh`, `Status`) VALUES
(1, 'Adidas', 'Adidas-logo.png', 0),
(2, 'Vans', 'Vans-logo.png', 1),
(3, 'Nike', 'Nike-Logo.png', 1),
(5, 'Converse', 'Converse-Logo.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD PRIMARY KEY (`IDAnh`),
  ADD KEY `PID` (`PID`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ComID`),
  ADD KEY `CusID` (`CusID`),
  ADD KEY `PID` (`PID`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `PID` (`PID`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`CiD`),
  ADD KEY `CusID` (`CusID`),
  ADD KEY `PID` (`PID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CusID` (`CusID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`CusID`);

--
-- Chỉ mục cho bảng `kichthuocsp`
--
ALTER TABLE `kichthuocsp`
  ADD PRIMARY KEY (`IDKichThuoc`);

--
-- Chỉ mục cho bảng `mausp`
--
ALTER TABLE `mausp`
  ADD PRIMARY KEY (`IDMau`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `FR_SanPham_ThuongHieu` (`MaThuongHieu`),
  ADD KEY `FR_SanPham_Mau` (`IDMau`),
  ADD KEY `FR_SanPham_KichThuoc` (`IDKichThuoc`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaThuongHieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  MODIFY `IDAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ComID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `CiD` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `OrderID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `CusID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `kichthuocsp`
--
ALTER TABLE `kichthuocsp`
  MODIFY `IDKichThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mausp`
--
ALTER TABLE `mausp`
  MODIFY `IDMau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `PID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaThuongHieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD CONSTRAINT `anhsp_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `sanpham` (`PID`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `khachhang` (`CusID`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `sanpham` (`PID`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `hoadon` (`OrderID`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `sanpham` (`PID`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `khachhang` (`CusID`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `sanpham` (`PID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `khachhang` (`CusID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FR_SanPham_KichThuoc` FOREIGN KEY (`IDKichThuoc`) REFERENCES `kichthuocsp` (`IDKichThuoc`),
  ADD CONSTRAINT `FR_SanPham_Mau` FOREIGN KEY (`IDMau`) REFERENCES `mausp` (`IDMau`),
  ADD CONSTRAINT `FR_SanPham_ThuongHieu` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
