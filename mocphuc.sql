-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mocphuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `So_hoa_don` int(11) NOT NULL,
  `Ma_sp` varchar(5) NOT NULL,
  `So_luong` int(11) NOT NULL,
  `Don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cthd`
--

INSERT INTO `cthd` (`So_hoa_don`, `Ma_sp`, `So_luong`, `Don_gia`) VALUES
(1, 'SP001', 1, 600000),
(1, 'SP005', 1, 400000),
(2, 'SP017', 1, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `So_hoa_don` int(11) NOT NULL,
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Ngay_dat_hang` date NOT NULL,
  `Ngay_giao_hang` date NOT NULL,
  `Noi_giao_hang` varchar(200) NOT NULL,
  `Ma_nv_duyet` varchar(5) NOT NULL,
  `Ma_nv_giao` varchar(5) NOT NULL,
  `Ma_phuong_thuc` varchar(5) NOT NULL,
  `Ma_tinh_trang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`So_hoa_don`, `Ma_khach_hang`, `Ngay_dat_hang`, `Ngay_giao_hang`, `Noi_giao_hang`, `Ma_nv_duyet`, `Ma_nv_giao`, `Ma_phuong_thuc`, `Ma_tinh_trang`) VALUES
(1, 'KH001', '2022-10-23', '2022-10-26', 'Trường Đại Học Nha Trang', 'NV001', 'NV002', 'PT1', 'TT1'),
(2, 'KH002', '2022-10-24', '2022-10-27', 'Trường THPT Hoàng Văn Thụ', 'NV001', 'NV002', 'PT1', 'TT1');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Ten_khach_hang` varchar(80) NOT NULL,
  `Phai` tinyint(1) NOT NULL,
  `Dia_chi` varchar(200) NOT NULL,
  `Dien_thoai` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`Ma_khach_hang`, `Ten_khach_hang`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`, `Password`) VALUES
('KH001', 'Lê Thanh Trang', 1, '123 Nguyễn Khuyến, Vĩnh Hải', '0946702313', 'tranglt@gmail.com', '12345678'),
('KH002', 'Lê Văn Thanh', 0, '52KA Cù Lao Trung, Vĩnh Thọ', '0120345621', 'thanhlv@gmail.com', '111111111'),
('KH003', 'Phan Thị Mỹ Hạnh', 1, '54KA Cù Lao Trung, Vĩnh Thọ', '9745698', 'hanhptn@gmail.com', '87635421'),
('KH004', 'Nguyễn Trọng Hiếu', 0, '39 Tôn Thất Tùng, Vĩnh Thọ', '8769128', 'hieunt@gmai.com', '87654321'),
('KH005', 'Hoàng Minh Quân', 0, '86 đường 2/4, Vĩnh Phước', '5792564', 'quanhm@gmail.com', '98763542'),
('KH006', 'Nguyễn Thị Thu Thảo', 1, '53 Hùng Lộc Hầu, Vĩnh Ngọc', '9874125', 'thaontt@gmail.com', '01234598'),
('KH007', 'Nguyễn Khánh Duy', 0, '45 Nguyễn Khuyến, Vĩnh Hải', '8754123', 'duynk@gmail.com', '87456210'),
('KH008', 'Phan Ngọc Thịnh', 0, '23 Lạc Thiện, Vĩnh Hải', '8753159', 'thinhpn@gmail.com', '12231245');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `Ma_loai_sp` varchar(5) NOT NULL,
  `Ten_loai_sp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`Ma_loai_sp`, `Ten_loai_sp`) VALUES
('BA', 'Bàn'),
('GH', 'Ghế'),
('GI', 'Giường'),
('KE', 'Kệ'),
('TU', 'Tủ');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `Ma_nhan_vien` varchar(5) NOT NULL,
  `Ten_nhan_vien` varchar(80) NOT NULL,
  `Ngay_sinh` date NOT NULL,
  `Phai` tinyint(1) NOT NULL,
  `Dia_chi` varchar(200) NOT NULL,
  `Dien_thoai` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tai_khoan` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`Ma_nhan_vien`, `Ten_nhan_vien`, `Ngay_sinh`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`, `Tai_khoan`, `Password`) VALUES
('NV001', 'Phan Trần Hữu Phúc', '2001-10-22', 0, '56KA Cù Lao Thượng, Nha Trang', '0708488401', 'phucpth2001@gmail.com', 'nv001', '123456'),
('NV002', 'Phạm Minh Hoàng', '2001-09-13', 0, '53KB Cù Lao Trung, Nha Trang', '0120737421', 'hoangpm1994@gmail.com', 'nv002', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `Ma_phuong_thuc` varchar(5) NOT NULL,
  `Ten_phuong_thuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`Ma_phuong_thuc`, `Ten_phuong_thuc`) VALUES
('PT1', 'Thanh toán khi giao hàng (COD)');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `Ma_sp` varchar(5) NOT NULL,
  `Ten_sp` varchar(100) NOT NULL,
  `Ma_loai_sp` varchar(5) NOT NULL,
  `So_luong_ton` smallint(6) NOT NULL,
  `Hinh_anh` varchar(200) NOT NULL,
  `Don_gia` int(11) NOT NULL,
  `Mo_ta` text NOT NULL,
  `Ngay_them` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`Ma_sp`, `Ten_sp`, `Ma_loai_sp`, `So_luong_ton`, `Hinh_anh`, `Don_gia`, `Mo_ta`, `Ngay_them`) VALUES
('SP001', 'Bàn làm viêc A', 'BA', 20, 'imgban.jpg', 600000, 'Bàn là một loại nội thất, với cấu tạo của nó hàm chứa một mặt phẳng nằm ngang (gọi là mặt bàn) có tác dụng dùng để nâng đỡ cho những vật dụng hay vật thể mà người dùng muốn đặt lên mặt bàn đó.', '2022-10-23'),
('SP002', 'Bàn làm viêc B', 'BA', 20, 'imgban2.jpg', 600000, 'Bàn là một loại nội thất, với cấu tạo của nó hàm chứa một mặt phẳng nằm ngang (gọi là mặt bàn) có tác dụng dùng để nâng đỡ cho những vật dụng hay vật thể mà người dùng muốn đặt lên mặt bàn đó.', '2022-10-23'),
('SP003', 'Bàn làm viêc C', 'BA', 20, 'imgban3.jpg', 600000, 'Bàn là một loại nội thất, với cấu tạo của nó hàm chứa một mặt phẳng nằm ngang (gọi là mặt bàn) có tác dụng dùng để nâng đỡ cho những vật dụng hay vật thể mà người dùng muốn đặt lên mặt bàn đó.', '2022-10-23'),
('SP004', 'Bàn ăn A', 'BA', 20, 'imgban4.jpg', 500000, 'Bàn là một loại nội thất, với cấu tạo của nó hàm chứa một mặt phẳng nằm ngang (gọi là mặt bàn) có tác dụng dùng để nâng đỡ cho những vật dụng hay vật thể mà người dùng muốn đặt lên mặt bàn đó.', '2022-10-23'),
('SP005', 'Ghế làm việc A', 'GH', 20, 'imgghe.jpg', 400000, 'Thông thường ghế có bốn chân. Ngoài ra có ghế ba chân và cũng có thể có ghế nhiều chân hơn nữa, nhưng hiếm. Có các loại ghế \"một chân\" hay \"hai chân\" nếu \"chân ghế\" có hình dạng đủ để tạo thành chân đế bền vững chống đỡ cho cấu trúc không bị đổ.', '2022-10-23'),
('SP006', 'Ghế làm việc B', 'GH', 20, 'imgghe2.jpg', 400000, 'Thông thường ghế có bốn chân. Ngoài ra có ghế ba chân và cũng có thể có ghế nhiều chân hơn nữa, nhưng hiếm. Có các loại ghế \"một chân\" hay \"hai chân\" nếu \"chân ghế\" có hình dạng đủ để tạo thành chân đế bền vững chống đỡ cho cấu trúc không bị đổ.', '2022-10-23'),
('SP007', 'Ghế làm việc C', 'GH', 20, 'imgghe3.jpg', 400000, 'Thông thường ghế có bốn chân. Ngoài ra có ghế ba chân và cũng có thể có ghế nhiều chân hơn nữa, nhưng hiếm. Có các loại ghế \"một chân\" hay \"hai chân\" nếu \"chân ghế\" có hình dạng đủ để tạo thành chân đế bền vững chống đỡ cho cấu trúc không bị đổ.', '2022-10-23'),
('SP008', 'Ghế cổ điển A', 'GH', 20, 'imgghe4.jpg', 300000, 'Thông thường ghế có bốn chân. Ngoài ra có ghế ba chân và cũng có thể có ghế nhiều chân hơn nữa, nhưng hiếm. Có các loại ghế \"một chân\" hay \"hai chân\" nếu \"chân ghế\" có hình dạng đủ để tạo thành chân đế bền vững chống đỡ cho cấu trúc không bị đổ.', '2022-10-23'),
('SP009', 'Tủ quần áo A', 'TU', 20, 'imgtu.jpg', 250000, 'Tủ là đồ dùng để đựng đồ vật, có hình khối chữ nhật, thường được làm bằng gỗ, hoặc kim loại hay nhựa có cánh cửa và mỗi cánh cửa hay có khóa để giữ an toàn. Có nhiều loại tủ như tủ thờ, tủ quần áo, tủ đựng hàng, tủ đựng tài liệu, tủ đựng đồ dùng, v.v...', '2022-10-23'),
('SP010', 'Tủ quần áo B', 'TU', 20, 'imgtu2.jpg', 400000, 'Tủ là đồ dùng để đựng đồ vật, có hình khối chữ nhật, thường được làm bằng gỗ, hoặc kim loại hay nhựa có cánh cửa và mỗi cánh cửa hay có khóa để giữ an toàn. Có nhiều loại tủ như tủ thờ, tủ quần áo, tủ đựng hàng, tủ đựng tài liệu, tủ đựng đồ dùng, v.v...', '2022-10-23'),
('SP011', 'Tủ bếp C', 'TU', 20, 'imgtu3.jpg', 350000, 'Tủ là đồ dùng để đựng đồ vật, có hình khối chữ nhật, thường được làm bằng gỗ, hoặc kim loại hay nhựa có cánh cửa và mỗi cánh cửa hay có khóa để giữ an toàn. Có nhiều loại tủ như tủ thờ, tủ quần áo, tủ đựng hàng, tủ đựng tài liệu, tủ đựng đồ dùng, v.v...', '2022-10-23'),
('SP012', 'Tủ bếp D', 'TU', 20, 'imgtu4.jpg', 250000, 'Tủ là đồ dùng để đựng đồ vật, có hình khối chữ nhật, thường được làm bằng gỗ, hoặc kim loại hay nhựa có cánh cửa và mỗi cánh cửa hay có khóa để giữ an toàn. Có nhiều loại tủ như tủ thờ, tủ quần áo, tủ đựng hàng, tủ đựng tài liệu, tủ đựng đồ dùng, v.v...', '2022-10-23'),
('SP013', 'Giường ngủ A', 'GI', 20, 'imggiuong.jpg', 1600000, 'Giường là một đồ vật hay nơi chốn với cấu tạo chính bằng gỗ hay kim loại, bên trên có trải nệm mút, nệm lò xo hay vạc giường và chiếu. Giường được sử dụng làm nơi ngủ, nằm nghỉ ngơi. Trên giường thường có gối kê, gối ôm, chăn.', '2022-10-23'),
('SP014', 'Giường ngủ B', 'GI', 20, 'imggiuong2.jpg', 1600000, 'Giường là một đồ vật hay nơi chốn với cấu tạo chính bằng gỗ hay kim loại, bên trên có trải nệm mút, nệm lò xo hay vạc giường và chiếu. Giường được sử dụng làm nơi ngủ, nằm nghỉ ngơi. Trên giường thường có gối kê, gối ôm, chăn.', '2022-10-23'),
('SP015', 'Giường ngủ C', 'GI', 20, 'imggiuong3.jpg', 1600000, 'Giường là một đồ vật hay nơi chốn với cấu tạo chính bằng gỗ hay kim loại, bên trên có trải nệm mút, nệm lò xo hay vạc giường và chiếu. Giường được sử dụng làm nơi ngủ, nằm nghỉ ngơi. Trên giường thường có gối kê, gối ôm, chăn.', '2022-10-23'),
('SP016', 'Giường ngủ D', 'GI', 20, 'imggiuong4.jpg', 1600000, 'Giường là một đồ vật hay nơi chốn với cấu tạo chính bằng gỗ hay kim loại, bên trên có trải nệm mút, nệm lò xo hay vạc giường và chiếu. Giường được sử dụng làm nơi ngủ, nằm nghỉ ngơi. Trên giường thường có gối kê, gối ôm, chăn.', '2022-10-23'),
('SP017', 'Kệ sách A', 'KE', 20, 'imgke.jpg', 250000, 'Kệ là một mặt phẳng ngang phẳng được sử dụng trong nhà, doanh nghiệp, cửa hàng hoặc nơi khác để giữ các mặt hàng đang được trưng bày, lưu trữ hoặc chào bán. Nó được nâng lên khỏi mặt đất và thường được neo.', '2022-10-23'),
('SP018', 'Kệ sách B', 'KE', 20, 'imgke2.jpg', 300000, 'Kệ là một mặt phẳng ngang phẳng được sử dụng trong nhà, doanh nghiệp, cửa hàng hoặc nơi khác để giữ các mặt hàng đang được trưng bày, lưu trữ hoặc chào bán. Nó được nâng lên khỏi mặt đất và thường được neo.', '2022-10-23'),
('SP019', 'Kệ sách C', 'KE', 20, 'imgke3.jpg', 300000, 'Kệ là một mặt phẳng ngang phẳng được sử dụng trong nhà, doanh nghiệp, cửa hàng hoặc nơi khác để giữ các mặt hàng đang được trưng bày, lưu trữ hoặc chào bán. Nó được nâng lên khỏi mặt đất và thường được neo.', '2022-10-23'),
('SP020', 'Kệ sách D', 'KE', 20, 'imgke4.jpg', 400000, 'Kệ là một mặt phẳng ngang phẳng được sử dụng trong nhà, doanh nghiệp, cửa hàng hoặc nơi khác để giữ các mặt hàng đang được trưng bày, lưu trữ hoặc chào bán. Nó được nâng lên khỏi mặt đất và thường được neo.', '2022-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tinh_trang`
--

CREATE TABLE `tinh_trang` (
  `Ma_tinh_trang` varchar(5) NOT NULL,
  `Ten_tinh_trang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinh_trang`
--

INSERT INTO `tinh_trang` (`Ma_tinh_trang`, `Ten_tinh_trang`) VALUES
('TT1', 'Đã đặt hàng'),
('TT2', 'Đã duyệt đơn'),
('TT3', 'Đang giao hàng'),
('TT4', 'Đã giao hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`So_hoa_don`,`Ma_sp`),
  ADD KEY `So_hoa_don` (`So_hoa_don`),
  ADD KEY `Ma_sp` (`Ma_sp`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`So_hoa_don`),
  ADD KEY `Ma_khach_hang` (`Ma_khach_hang`),
  ADD KEY `Ma_nv_duyet` (`Ma_nv_duyet`),
  ADD KEY `Ma_nv_giao` (`Ma_nv_giao`),
  ADD KEY `Ma_phuong_thuc` (`Ma_phuong_thuc`),
  ADD KEY `Ma_tinh_trang` (`Ma_tinh_trang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`Ma_khach_hang`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`Ma_loai_sp`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`Ma_nhan_vien`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`Ma_phuong_thuc`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`Ma_sp`),
  ADD KEY `Ma_loai_sp` (`Ma_loai_sp`);

--
-- Indexes for table `tinh_trang`
--
ALTER TABLE `tinh_trang`
  ADD PRIMARY KEY (`Ma_tinh_trang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `So_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`So_hoa_don`) REFERENCES `hoa_don` (`So_hoa_don`),
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`Ma_sp`) REFERENCES `san_pham` (`Ma_sp`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`Ma_tinh_trang`) REFERENCES `tinh_trang` (`Ma_tinh_trang`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`Ma_phuong_thuc`) REFERENCES `phuong_thuc_thanh_toan` (`Ma_phuong_thuc`),
  ADD CONSTRAINT `hoa_don_ibfk_3` FOREIGN KEY (`Ma_khach_hang`) REFERENCES `khach_hang` (`Ma_khach_hang`),
  ADD CONSTRAINT `hoa_don_ibfk_4` FOREIGN KEY (`Ma_nv_duyet`) REFERENCES `nhan_vien` (`Ma_nhan_vien`),
  ADD CONSTRAINT `hoa_don_ibfk_5` FOREIGN KEY (`Ma_nv_giao`) REFERENCES `nhan_vien` (`Ma_nhan_vien`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`Ma_loai_sp`) REFERENCES `loai_sp` (`Ma_loai_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
