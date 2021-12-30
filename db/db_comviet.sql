-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 01:56 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_comviet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ten_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `tai_khoan`, `mat_khau`, `ten_admin`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Bùi Thanh Phong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danh_gia` int(11) NOT NULL,
  `ten_khach` varchar(255) DEFAULT NULL,
  `id_don` int(11) DEFAULT NULL,
  `loai_danh_gia` int(11) DEFAULT NULL,
  `chi_tiet` text DEFAULT NULL,
  `ngay_gio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id_danh_gia`, `ten_khach`, `id_don`, `loai_danh_gia`, `chi_tiet`, `ngay_gio`) VALUES
(1, 'Bùi Thanh Phong', 20211, 2, 'Tạm được, nếu miễn phí trà đá thì quá tốt', '2021-10-18 11:54:14'),
(2, 'Nguyễn Văn A', 20212, 4, 'Nước mắm mặn quá', '2021-10-18 11:54:20'),
(3, 'Bùi Văn B', 20213, 5, 'Cam chua lè', '2021-10-18 11:54:23'),
(4, 'Trần Văn C', 20214, 3, '', '2021-10-18 11:54:27'),
(5, 'Trương Vô Kỵ', 20215, 2, 'Rất ngon, ta sẽ giới thiệu cho Minh Giáo đến ăn', '2021-10-18 11:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don` int(11) NOT NULL,
  `id_gio` int(11) DEFAULT NULL,
  `so_ban` int(11) DEFAULT NULL,
  `ten_khach` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `ngay_gio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_don`, `id_gio`, `so_ban`, `ten_khach`, `ghi_chu`, `ngay_gio`, `trang_thai`) VALUES
(20211, 1, 11, 'Bùi Thanh Phong', 'Cơm sườn đừng bỏ cơm với sườn', '2021-10-18 11:51:13', 1),
(20212, 2, 1, 'Nguyễn Văn A', '', '2021-10-18 11:51:17', 1),
(20213, 3, 2, 'Bùi Văn B', 'Cam lấy ít đường thôi nha', '2021-10-18 11:54:43', 1),
(20214, 4, 3, 'Trần Văn C', 'Canh chua làm ngọt ngọt nha', '2021-10-18 11:51:29', 0),
(20215, 5, 6, 'Trương Vô Kỵ', '', '2021-10-18 11:53:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `STT` int(11) NOT NULL,
  `id_gio` int(11) DEFAULT NULL,
  `id_mon` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`STT`, `id_gio`, `id_mon`, `so_luong`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(5, 1, 14, 1),
(6, 1, 19, 3),
(7, 2, 1, 1),
(8, 3, 8, 2),
(9, 3, 23, 2),
(10, 4, 8, 1),
(11, 4, 10, 1),
(12, 4, 21, 1),
(13, 5, 2, 1),
(14, 5, 16, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `id_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`id_loai`, `ten_loai`) VALUES
(1, 'Món chính'),
(2, 'Món canh'),
(3, 'Món thêm'),
(4, 'Đồ uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id_mon` int(11) NOT NULL,
  `id_loai` int(11) DEFAULT NULL,
  `ten_mon` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `so_luong_con` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `ban_chay` int(11) DEFAULT NULL,
  `hinh_anh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id_mon`, `id_loai`, `ten_mon`, `mo_ta`, `so_luong_con`, `gia`, `ban_chay`, `hinh_anh`) VALUES
(1, 1, 'Cơm sườn Cotlet', 'dĩa', 98, 40000, 1, '616d4a0ea8787-1634552334.jpg'),
(2, 1, 'Cơm sườn nướng tỏi', 'dĩa', 98, 50000, 1, '616d4a8ac7b3f-1634552458.jpg'),
(3, 1, 'Cơm sườn nướng muối ớt', 'dĩa', 99, 50000, 0, '616d4acbb9a0b-1634552523.jpg'),
(4, 1, 'Cơm sườn nướng mật ong', 'dĩa', 100, 60000, 1, '616d4e451e913-1634553413.jpg'),
(5, 1, 'Cơm đùi gà nướng tỏi', 'dĩa', 100, 45000, 1, '616d58c176d80-1634556097.jpg'),
(7, 1, 'Cơm cá kho tộ', 'dĩa', 100, 50000, 0, '616d58f27bf02-1634556146.jpg'),
(8, 1, 'Cơm tôm rim', 'dĩa', 97, 50000, 1, '616d5903b2c43-1634556163.jpg'),
(9, 1, 'Cơm mắm chưng', 'dĩa', 100, 40000, 0, '616d5915bee7f-1634556181.jpg'),
(10, 2, 'Canh nghêu chua', 'tô', 99, 15000, 1, '616d5ab5549d8-1634556597.jpg'),
(11, 2, 'Canh khổ qua dồn thịt', 'tô', 100, 10000, 0, '616d5aca2fe35-1634556618.jpg'),
(12, 2, 'Canh cải chua gân bò', 'tô', 100, 10000, 0, '616d5aec6bf79-1634556652.jpg'),
(13, 2, 'Canh cải thịt bằm', 'tô', 100, 10000, 0, '616d5b021a8c5-1634556674.jpg'),
(14, 3, 'Trứng ốp la', 'cái', 99, 10000, 0, '616d5b1f93adc-1634556703.jpg'),
(15, 3, 'Bì + chả', 'phần', 100, 20000, 0, '616d5b3f8dfd8-1634556735.jpg'),
(16, 3, 'Mắm chưng', 'chén ', 98, 30000, 1, '616d5b552d888-1634556757.webp'),
(17, 3, 'Cơm thêm', 'dĩa', 100, 5000, 0, '616d5b6f0fd76-1634556783.jpg'),
(18, 3, 'Đồ chua', 'phần', 100, 5000, 0, '616d5b8498e8b-1634556804.jpg'),
(19, 4, 'Trà đá', 'ly', 97, 5000, 0, '616d5c57caf7a-1634557015.jpg'),
(20, 4, 'Nước suối', 'chai', 100, 10000, 0, '616d5c68b4ed9-1634557032.png'),
(21, 4, 'Coca', 'lon', 99, 15000, 0, '616d5c7f01a32-1634557055.jpg'),
(22, 4, '7up', 'lon', 100, 15000, 0, '616d5c911bd7f-1634557073.jpg'),
(23, 4, 'Cam ép', 'ly', 98, 15000, 1, '616d5ca2c43a5-1634557090.jpg'),
(24, 4, 'Tiger', 'lon', 100, 20000, 0, '616d5cbf8b65f-1634557119.jpg'),
(25, 4, 'Bia Sài Gòn', 'lon', 100, 20000, 0, '616d5cd7dede5-1634557143.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danh_gia`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `id_mon` (`id_mon`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_mon`),
  ADD KEY `id_loai` (`id_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danh_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20216;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai_hang` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
