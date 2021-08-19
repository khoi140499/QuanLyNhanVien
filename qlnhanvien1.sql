-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 10, 2020 lúc 01:05 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnhanvien1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdongld`
--

CREATE TABLE `hopdongld` (
  `mahd` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `loaihd` varchar(20) DEFAULT NULL,
  `thoigianki` date DEFAULT NULL,
  `thoigiankt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hopdongld`
--

INSERT INTO `hopdongld` (`mahd`, `manv`, `loaihd`, `thoigianki`, `thoigiankt`) VALUES
(2, 1, 'Ngắn hạn', '2020-02-19', '2020-11-11'),
(3, 10, 'Ngắn hạn', '2020-10-01', '2020-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `ten` varchar(30) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(3) DEFAULT NULL,
  `chucvu` varchar(20) DEFAULT NULL,
  `luong` double DEFAULT NULL,
  `cmnd` varchar(11) DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diachi` varchar(30) DEFAULT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `maphongban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ten`, `ngaysinh`, `gioitinh`, `chucvu`, `luong`, `cmnd`, `sdt`, `email`, `diachi`, `hinhanh`, `maphongban`) VALUES
(1, 'Lê Ngọc Đồng', '1999-07-10', 'Nữ', 'Thư kí', 15000000, '19283624', '9767567456', 'khoihd140499@gmail.com', 'Bắc Giang', 'unnamed.jpg', 1002),
(9, 'Hoàng Thị Thảo', '1999-07-09', 'Nữ', 'Trưởng phòng', 20000000, '1928377', '98282737', 'htthao@gmail.com', 'Hà nội', 'z (5).jpg', 1003),
(10, 'Đào Thị Hương', '2020-07-23', 'Nữ', 'Tạp vụ', 5000000, '122221', '0282822', 'daothuong@gmail.com', 'Bắc Giang', 'nu (4).jpg', 1003),
(11, 'Lê Thị Hòa', '1998-06-25', 'Nữ', 'Trưởng phòng', 30000000, '01222231', '02821717', 'lthihoa@gmail.com', 'Bắc Giang', 'crop (1).jpg', 1002),
(434, 'Đinh Thế Vinh', '1999-06-22', 'Nam', 'Nhân viên', 15000000, '12313441', '98192873', 'dthevinh@gmail.com', 'Thái Bình', 'cotron (4).jpg', 1002),
(436, 'Lê Thu Trang', '2000-07-08', 'Nữ', 'Nhân viên', 10000000, '1222313', '028373714', 'lethutrang@gmail.com', 'Bắc Giang', 'spmoi (3).jpg', 1004);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `maphongban` int(11) NOT NULL,
  `tenphongban` varchar(30) DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`maphongban`, `tenphongban`, `sdt`) VALUES
(1002, 'Kinh Doanh', '0293824'),
(1003, 'Tài chính', '219893003'),
(1004, 'Giám đốc', '0388618961'),
(1005, 'Ví dụ', '019992277');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `pass`, `full_name`, `email`) VALUES
('khoi14', '126a157b2992e7daed3677ce8e9fe40f', 'Hoàng Đăng Khôi', 'khoidanghoang144@gmail.com'),
('khoi1404', '186a157b2992e7daed3677ce8e9fe40f', 'Hoàng Đăng Khôi', 'khoidanghoang144@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hopdongld`
--
ALTER TABLE `hopdongld`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`maphongban`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hopdongld`
--
ALTER TABLE `hopdongld`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `maphongban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
