-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 17, 2018 lúc 05:26 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cse485`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `img_gv` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `id_gv` int(11) NOT NULL,
  `ten_gv` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `monhoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL DEFAULT b'0',
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`img_gv`, `id_gv`, `ten_gv`, `monhoc`, `gioitinh`, `sdt`, `thongtin`) VALUES
('', 1, 'Nguyễn Mạnh Hiển', 'Cấu trúc dữ liệu', b'0', '5345345', 'Tốt nghiệp Đại học Bách khoa năm 2004\r\n\r\nThạc sỹ năm 2010 tại ĐH Ritsumeikan (Nhật Bản)\r\n\r\nBảo vệ luận án Tiến sỹ năm  2013 tại ĐH Ritsumeikan (Nhật Bản)'),
('', 2, 'fsdf', '', b'1', '4324234', 'fsfsdfsfsdf'),
('', 3, '4324', 'qeqwe', b'1', '312312', '............'),
('tải xuống (2).png', 4, 'eqwe', '424', b'1', '32423', '............'),
('uploads/tải xuống (5).png', 5, 'eqwe', 'qeqwe', b'1', '312312', '............'),
('uploads/tải xuống (3).png', 6, 'eqwe', 'qeqwe', b'1', '312312', '............'),
('uploads/5b76dc8fe5943', 7, 'eqwe', 'qeqwe', b'1', '312312', '............'),
('uploads/5b76dd08f1bbd.', 8, 'eqwe', '424', b'1', '312312', '............'),
('uploads/5b76dd37076e10', 9, 'eqwe', 'qeqwe', b'1', '312312', '............'),
('uploads/5b76ddc0ead7d.', 10, '4324', 'qeqwe', b'1', '312312', '............'),
('uploads/5b76dee976888.png', 11, 'eqwe', 'qeqwe', b'1', '312312', '............'),
('uploads/5b76defb6164e.png', 12, 'eqwe', 'qeqwe', b'0', '312312', '............');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `ma_mh` int(11) NOT NULL,
  `ten_mh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL,
  `ten_gv` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_tb` int(11) NOT NULL,
  `ten_bv` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `tacgia` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tt` int(11) NOT NULL,
  `ten_tt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Lê Trọng Kiên', 'kienlt32@wru.vn', '12345', 'admin'),
(2, 'Trần Văn Vũ', 'vutv32@wru.vn', '1234', 'normal'),
(3, 'Nguyễn Văn Thành', 'thanhnv@wru.vn', '12345', 'normal'),
(4, 'Nguyễn Thị Dịu', 'diunt32@wru.vn', '12345', 'normal');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id_gv`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`ma_mh`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id_tb`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tt`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id_gv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `ma_mh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
