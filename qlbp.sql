-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2023 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tauinfo`
--

CREATE TABLE `tauinfo` (
  `soPT` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số phương tiện',
  `chuPT` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chủ phương tiện',
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `noiDKTT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nơi DKTT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thông tin tàu cá';

--
-- Đang đổ dữ liệu cho bảng `tauinfo`
--

INSERT INTO `tauinfo` (`soPT`, `chuPT`, `sdt`, `noiDKTT`) VALUES
('BV-0967-TS', 'Nguyễn Văn Đoàn', '0388016569', 'VN'),
('tau123', 'Lê Văn A', '123456', 'Bình Thuận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tauinfoupdate`
--

CREATE TABLE `tauinfoupdate` (
  `soPT` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số phương tiện',
  `chuPT` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chủ phương tiện',
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `noiDKTT` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nơi ĐKTT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thông tin tàu cá chờ duyệt';

--
-- Đang đổ dữ liệu cho bảng `tauinfoupdate`
--

INSERT INTO `tauinfoupdate` (`soPT`, `chuPT`, `sdt`, `noiDKTT`) VALUES
('BV-0967-TS', 'Nguyễn Văn Đoàn', '0388016569', 'VN'),
('tau123', 'Lê Văn A', '123456', 'Bình Thuận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'BV-0967-TS', '1', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tauinfo`
--
ALTER TABLE `tauinfo`
  ADD PRIMARY KEY (`soPT`);

--
-- Chỉ mục cho bảng `tauinfoupdate`
--
ALTER TABLE `tauinfoupdate`
  ADD PRIMARY KEY (`soPT`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
