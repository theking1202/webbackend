-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 03:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptflower`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `cv_ma` int(11) NOT NULL,
  `cv_ten` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`cv_ma`, `cv_ten`) VALUES
(1, 'Admin'),
(4, 'Nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng');

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `dh_ma` int(11) NOT NULL,
  `dh_ngaylap` datetime NOT NULL,
  `dh_ngaygiao` datetime NOT NULL,
  `dh_noigiao` varchar(500) NOT NULL,
  `dh_trangthaithanhtoan` varchar(50) NOT NULL,
  `httt_ma` int(11) NOT NULL,
  `tenkhachhang` varchar(50) NOT NULL,
  `sodienthoai` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`dh_ma`, `dh_ngaylap`, `dh_ngaygiao`, `dh_noigiao`, `dh_trangthaithanhtoan`, `httt_ma`, `tenkhachhang`, `sodienthoai`) VALUES
(18, '2021-03-22 00:00:00', '2021-03-24 00:00:00', 'Cần thơ', '0', 1, 'Nguyễn Ngọc Lợi', 388810316),
(19, '2021-03-22 00:00:00', '2021-03-24 00:00:00', '216/6 Hưng Lọi, Ninh Kiều, Cần Thơ', '0', 1, 'Nguyễn Ngọc Lợi 123', 388810316);

-- --------------------------------------------------------

--
-- Table structure for table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `hsp_ma` int(11) NOT NULL,
  `hsp_tentaptin` varchar(50) DEFAULT NULL,
  `hoa_ma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`hsp_ma`, `hsp_tentaptin`, `hoa_ma`) VALUES
(16, '20210326153510_274_default.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucthanhtoan`
--

CREATE TABLE `hinhthucthanhtoan` (
  `httt_ma` int(11) NOT NULL,
  `httt_ten` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhthucthanhtoan`
--

INSERT INTO `hinhthucthanhtoan` (`httt_ma`, `httt_ten`) VALUES
(1, 'Thanh toán khi nhận'),
(2, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `hoa`
--

CREATE TABLE `hoa` (
  `hoa_ma` int(11) NOT NULL,
  `hoa_ten` varchar(50) DEFAULT NULL,
  `hoa_mota` varchar(500) DEFAULT NULL,
  `hoa_soluong` int(11) DEFAULT NULL,
  `hoa_gia` int(11) DEFAULT NULL,
  `hoa_giacu` int(11) DEFAULT NULL,
  `hoa_ngaycapnhat` datetime DEFAULT NULL,
  `lh_ma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa`
--

INSERT INTO `hoa` (`hoa_ma`, `hoa_ten`, `hoa_mota`, `hoa_soluong`, `hoa_gia`, `hoa_giacu`, `hoa_ngaycapnhat`, `lh_ma`) VALUES
(14, 'hoa cuoi', 'hoa dep', 10, 100000000, 1000000000, '2021-03-24 11:49:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_dondathang`
--

CREATE TABLE `hoa_dondathang` (
  `hoa_ma` int(11) NOT NULL,
  `dh_ma` int(11) NOT NULL,
  `hoa_dh_soluong` int(11) NOT NULL,
  `hoa_dh_dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_dondathang`
--

INSERT INTO `hoa_dondathang` (`hoa_ma`, `dh_ma`, `hoa_dh_soluong`, `hoa_dh_dongia`) VALUES
(14, 18, 3, 100000000),
(14, 19, 2, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `loaihoa`
--

CREATE TABLE `loaihoa` (
  `lh_ma` int(11) NOT NULL,
  `lh_ten` varchar(50) DEFAULT NULL,
  `lh_mota` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihoa`
--

INSERT INTO `loaihoa` (`lh_ma`, `lh_ten`, `lh_mota`) VALUES
(1, 'Hoa cưới', 'Hoa trưng bày trong đám cưới'),
(2, 'Hoa sinh nhật', 'Hoa tặng dịp sinh nhật');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_ma` int(11) NOT NULL,
  `nv_ten` varchar(50) NOT NULL,
  `nv_diachi` varchar(500) NOT NULL,
  `nv_taikhoan` varchar(20) NOT NULL,
  `nv_matkhau` varchar(32) NOT NULL,
  `nv_chucvu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nv_ma`, `nv_ten`, `nv_diachi`, `nv_taikhoan`, `nv_matkhau`, `nv_chucvu`) VALUES
(2, 'Nguyễn Ngọc Lợi', '216/6 Hưng Lợi, Ninh Kiều, Cần Thơ', 'admin', '123456', 1),
(7, 'loi', '123, X&atilde; Kh&acirc;u Vai, Huyện M&egrave;o Vạc, Tỉnh H&agrave; Giang', 'sdsds', 'sdssdds', 4),
(8, 'asdsad', '122/9, X&atilde; Minh Khương, Huyện H&agrave;m Y&ecirc;n, Tỉnh Tuy&ecirc;n Quang', 'asdsad', 'asdasdsa', 4),
(9, 'loi21', '132/4, Phường Đ&ocirc;ng Ngạc, Quận Bắc Từ Li&ecirc;m, Th&agrave;nh phố H&agrave; Nội', 'loi123', '123123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`cv_ma`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`dh_ma`),
  ADD KEY `FK__hinhthucthanhtoan` (`httt_ma`);

--
-- Indexes for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`hsp_ma`),
  ADD KEY `FK__hoa` (`hoa_ma`);

--
-- Indexes for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  ADD PRIMARY KEY (`httt_ma`);

--
-- Indexes for table `hoa`
--
ALTER TABLE `hoa`
  ADD PRIMARY KEY (`hoa_ma`) USING BTREE,
  ADD KEY `FK_hoa_loaihoa` (`lh_ma`);

--
-- Indexes for table `hoa_dondathang`
--
ALTER TABLE `hoa_dondathang`
  ADD PRIMARY KEY (`hoa_ma`,`dh_ma`) USING BTREE,
  ADD KEY `dh_ma` (`dh_ma`);

--
-- Indexes for table `loaihoa`
--
ALTER TABLE `loaihoa`
  ADD PRIMARY KEY (`lh_ma`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_ma`),
  ADD KEY `FK_nhanvien_chucvu` (`nv_chucvu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `cv_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `dh_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `hsp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  MODIFY `httt_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoa`
--
ALTER TABLE `hoa`
  MODIFY `hoa_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loaihoa`
--
ALTER TABLE `loaihoa`
  MODIFY `lh_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK__hinhthucthanhtoan` FOREIGN KEY (`httt_ma`) REFERENCES `hinhthucthanhtoan` (`httt_ma`);

--
-- Constraints for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `FK__hoa` FOREIGN KEY (`hoa_ma`) REFERENCES `hoa` (`hoa_ma`);

--
-- Constraints for table `hoa`
--
ALTER TABLE `hoa`
  ADD CONSTRAINT `FK_hoa_loaihoa` FOREIGN KEY (`lh_ma`) REFERENCES `loaihoa` (`lh_ma`);

--
-- Constraints for table `hoa_dondathang`
--
ALTER TABLE `hoa_dondathang`
  ADD CONSTRAINT `FK_hoa_dondathang_dondathang` FOREIGN KEY (`dh_ma`) REFERENCES `dondathang` (`dh_ma`),
  ADD CONSTRAINT `FK_hoa_dondathang_hoa` FOREIGN KEY (`hoa_ma`) REFERENCES `hoa` (`hoa_ma`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_nhanvien_chucvu` FOREIGN KEY (`nv_chucvu`) REFERENCES `chucvu` (`cv_ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
