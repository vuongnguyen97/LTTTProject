-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy ch?: 127.0.0.1
-- Th?i gian ð? t?o: Th6 07, 2018 lúc 11:52 AM
-- Phiên b?n máy ph?c v?: 10.1.28-MariaDB
-- Phiên b?n PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cõ s? d? li?u: `tvbox`
--

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `anhslide`
--

CREATE TABLE `anhslide` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anhslide` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `anhslide`
--

INSERT INTO `anhslide` (`id`, `title`, `anhslide`, `anh_thumb`, `link`, `status`) VALUES
(43, 'tung', 'upload/1.png', NULL, '', 1),
(44, 'tung', 'upload/12.1.png', NULL, '', 0),
(45, 'ssdssds', 'upload/32845674_1615336935182611_1391643294521360384_n.jpg', NULL, '', 1);

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(11) NOT NULL,
  `danhmucbaiviet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tomtat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(10) NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `orthernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `baiviet`
--

INSERT INTO `baiviet` (`id`, `danhmucbaiviet`, `title`, `tomtat`, `noidung`, `hinhanh`, `anh_thumb`, `view`, `ngaydang`, `giodang`, `orthernum`, `status`) VALUES
(40, '3', 'nguyen', 'khanh', '<p>tung</p>\r\n', 'upload/avatar fb.jpg', NULL, 0, '2018-04-24', '9:35 PM', 0, 1),
(41, '1', 'fefef', 'èeffef', '<p>&ecirc;fefe</p>\r\n', 'upload/windows-spotlight-20.jpg', NULL, 0, '2018-05-14', '9:15 PM', 0, 1);

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `sl` int(10) NOT NULL,
  `tongtien` int(10) NOT NULL,
  `date_creat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `danhmucbaiviet`
--

CREATE TABLE `danhmucbaiviet` (
  `id` int(11) NOT NULL,
  `danhmucbaiviet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(50) NOT NULL,
  `menu` int(1) NOT NULL,
  `home` int(1) NOT NULL,
  `orthernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `danhmucbaiviet`
--

INSERT INTO `danhmucbaiviet` (`id`, `danhmucbaiviet`, `parent_id`, `menu`, `home`, `orthernum`, `status`) VALUES
(1, 'mibox', 0, 1, 1, 0, 1),
(2, 'vibox 2018', 0, 1, 1, 0, 1),
(3, 'fpt play box', 1, 1, 1, 0, 1),
(4, 'xiaomi', 2, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `sanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(100) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(13) NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhtoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `donhang`
--

INSERT INTO `donhang` (`id`, `sanpham`, `tongtien`, `user_name`, `sdt`, `diachi`, `email`, `ghichu`, `thanhtoan`, `date_order`) VALUES
(74, 'LOA BLUETOOTH EWA A104 GIÁ T?T', 190000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 14:49:27'),
(76, 'BÀN PHÍM CHU?T BAY KM800 PRO CÓ MIC VOICE SEARCH (MX3 PRO VOICE)', 450000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 14:52:53'),
(77, 'VIBOX V1 Pro Android TV Box thýõng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 14:59:13'),
(78, 'VIBOX V1 Pro Android TV Box thýõng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 15:01:29'),
(79, 'VIBOX V1 Pro Android TV Box thýõng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 15:02:14'),
(80, 'VIBOX V2 Pro 2018 Android TV Box thýõng hi?u Vi?t', 990000, 'nguyen khanh tung', 1638716085, '?p 4 x? tân l?p b?c tân uyên b?nh duõng', '', '', '1', '2018-06-04 15:04:53');

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `hotro`
--

CREATE TABLE `hotro` (
  `id` int(11) NOT NULL,
  `people` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `skyber` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orthernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `hotro`
--

INSERT INTO `hotro` (`id`, `people`, `facebook`, `skyber`, `orthernum`, `status`) VALUES
(1, 'Ms. H?nh Nguy?n', '', '', 0, 0);

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `imageproduct`
--

CREATE TABLE `imageproduct` (
  `id` int(11) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `imageproduct`
--

INSERT INTO `imageproduct` (`id`, `parent_id`, `images`) VALUES
(1, 43, 'images/sanpham/tvbox/vibox v1 pro/1.jpg'),
(2, 43, 'images/sanpham/tvbox/vibox v1 pro/2.jpg'),
(3, 43, 'images/sanpham/tvbox/vibox v1 pro/3.jpg'),
(4, 43, 'images/sanpham/tvbox/vibox v1 pro/4.jpg'),
(5, 43, 'images/sanpham/tvbox/vibox v1 pro/5.jpg');

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `title`, `dienthoai`, `email`, `noidung`, `ngaydang`, `status`) VALUES
(2, 'nguy?n khanh tùng', 's?n ph?m mibox 4k ', 1638716085, 'nguyenkhanhtung580@gmail.com', 's?n ph?m mibox 4k c?n hàng ko shop', '2018-06-05 02:35:06', 0);

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `home` int(1) NOT NULL DEFAULT '1',
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `home`, `icon`, `date_create`) VALUES
(1, ' TV BOX & MINI PC', 1, 'images/tv-box-icon-menu.png', '2018-06-05 12:23:04'),
(2, ' MICRO KARAOKE', 1, 'images/micro-karaoke-bluetooth.png', '2018-06-05 12:23:04'),
(3, ' MICRO THU ÂM', 1, 'images/mic-thu-am.png', '2018-06-05 12:23:04'),
(4, ' LOA - TAI NGHE', 1, 'images/loa-bluetooth-icon.png', '2018-06-05 12:23:04'),
(5, ' PH? KI?N TV BOX', 1, 'images/taycam.png', '2018-06-05 12:23:04'),
(6, ' THI?T B? M?NG', 1, 'images/wifilan-icon.jpg', '2018-06-05 12:23:04'),
(7, ' S?C D? PH?NG', 1, 'images/battery.png', '2018-06-05 12:23:04'),
(8, ' AZ PH? KI?N', 0, 'images/az.png', '2018-06-05 12:23:04'),
(31, 'TV BOX & MINI PC', 1, '', '2018-06-05 12:23:04');

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `menu_sub`
--

CREATE TABLE `menu_sub` (
  `id` int(11) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `menusub_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `menu_sub`
--

INSERT INTO `menu_sub` (`id`, `parent_id`, `menusub_name`) VALUES
(1, 1, 'Android TV Box'),
(2, 1, 'Android TV Stick'),
(3, 1, 'Windows Mini PC'),
(4, 2, 'MIKARA'),
(5, 2, 'TOSING'),
(6, 3, 'Sound Card'),
(7, 3, 'Chu?t Bay & Bàn Phím'),
(8, 3, 'Tay Game Android TV BOX');

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `motakhuyenmai` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `baohanhsp` int(1) DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongso` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL,
  `menusub_id` int(10) NOT NULL,
  `sale` int(20) DEFAULT NULL,
  `video` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ordernumb` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `view` int(10) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `slug`, `anh`, `anh_thumb`, `noidung`, `motakhuyenmai`, `baohanhsp`, `link`, `gia`, `thongso`, `category_id`, `menusub_id`, `sale`, `video`, `ordernumb`, `status`, `view`, `hot`, `create_at`, `update_at`) VALUES
(43, 'VIBOX V1 Pro Android TV Box thýõng hi?u Vi?t', 'VIBOX V1 Pro Android TV Box thýõng hi?u Vi?t', 'images/sanpham/tvbox/vibox v1 pro/1.jpg', 'images/sanpham/tvbox/vibox v1 pro/0.jpg', 'Ti?p n?i thành công c?a Android TV Box VIBOX V1 Mini, v?i tiêu chí hý?ng t?i ngý?i dùng, nâng cao hõn v? ch?t lý?ng s?n ph?m, VIBOX V1 Pro ra ð?i kh?ng ð?nh s? thành công c?a h?ng khi ch?t lý?ng ngày càng nâng cao, ðáp ?ng nhi?u nhu c?u gi?i trí khác nhau.', 'T?ng cáp AV, chu?t không dây tr? giá 150.000ð', 1, NULL, '790000', 'RAM: 1GB DDR3', 1, 1, 990000, '', NULL, 1, 0, 1, '2018-05-19 07:42:32', '2018-06-06 09:49:15'),
(44, 'VIBOX V2 Pro 2018 Android TV Box thýõng hi?u Vi?t', 'VIBOX V2 Pro 2018 Android TV Box thýõng hi?u Vi?t', 'images/sanpham/tvbox/vibox 2 pro/0.jpg', NULL, 'H?p truy?n h?nh thông minh VIBOX V2 Pro 2018 ðý?c trang b? ph?n c?ng ch?t lý?ng t?t, firmware ðý?c phát tri?n và t?i ýu b?i các k? sý Vi?t Nam, ð?m b?o s?n ph?m ho?t ð?ng ?n ð?nh, nhanh mý?t. Ð?c bi?t hõn n?a v?i chính sách b?o hành 13 tháng, ð?i m?i n?u l?i ph?n c?ng, ph?n m?m b?o hành tr?n ð?i, VIBOX V2 Pro 2018 t? tin s? giúp ngý?i dùng hoàn toàn yên tâm khi l?a ch?n và tho?i mái d? dàng khi s? d?ng.', 'Gi?m 5% cho Khách Hàng c? c?a HieuHien.vn', 1, NULL, '990000', 'H? ði?u hành: Android 4.4 KitKat', 1, 1, 1290000, '', NULL, 0, 0, 1, '2018-05-19 07:42:32', '2018-06-06 09:48:55'),
(45, 'Egreat A5 Android TV Box 4K HD Player', 'Egreat A5 Android TV Box 4K HD Player', 'images/sanpham/tvbox/egreat a5/0.jpg', NULL, 'Cùng v?i s? thành công c?a \"anh c?\" Egreat A10 ð? làm nóng l?i th? trý?ng HD Player hi?n nay th? Egreat A5 c?ng nh?n ðý?c r?t nhi?u s? quan tâm t? ngý?i dùng. Thay ð?i thi?t k? mainboard, thân máy, v? máy, lý?c b? ði m?t s? chi ti?t nhý khay ð?ng ? c?ng HDD, qu?t t?n nhi?t, c?ng RS232...giúp cho giá thành c?a Egreat A5 gi?m xu?ng, phù h?p v?i túi ti?n c?a nhi?u ngý?i dùng hõn nên s? lý?ng Egreat A5 bán ra hàng tháng luôn nhi?u hõn so v?i Egreat A10.', 'T?ng tài kho?n VIP xem phim HD online ch?t lý?ng cao', 1, NULL, '2590000', 'RAM 2GB 1866MHz DDR3', 1, 1, 3500000, '', NULL, 1, 0, 0, '2018-05-19 07:49:27', '2018-05-21 02:17:30'),
(46, 'Egreat A10 Android TV Box 4K 3D ATMOS DTS', 'Egreat A10 Android TV Box 4K 3D ATMOS DTS', 'images/sanpham/tvbox/egreat a10/0.jpg', NULL, 'Egreat A10 là s?n ph?m c?a Egreat, m?t công ty chuyên s?n xu?t các thi?t b? nghe nh?n gia ð?nh nhý ð?u phát HD, ð?u thu TV k? thu?t s?. Egreat A10 là s? k?t h?p hoàn h?o gi?a ð?u phát HD và Android TV Box t?p trung vào các tính nãng gi?i trí online, ð?ng th?i ðáp ?ng t?t vi?c gi?i trí offline. S?n ph?m này t? ra n?i tr?i so v?i các ð?u phát Android khác nh? kh? nãng chõi phim Blu-ray có menu, h? tr? phim 3D, 4K HDR.', 'T?ng chu?t bay bàn phím KM800 tr? giá 250.000ð (n?u không l?y quà t?ng này, qu? khách ðý?c gi?m 190.000ð trong hóa ðõn)', 1, NULL, '5490000', '', 1, 1, 6000000, '', NULL, 1, 0, 0, '2018-05-19 07:49:27', '2018-05-21 02:17:34'),
(47, 'MIKARA S10 PLUS (B?C) - MICRO HÁT KARAOKE KÈM LOA BLUETOOTH CAO C?P', 'MIKARA S10 PLUS (B?C) - MICRO HÁT KARAOKE KÈM LOA BLUETOOTH CAO C?P', 'images/sanpham/micro/micro s10/0.jpg', NULL, 'Micro Karaoke Mikara S10 Plus là m?t chi?c micro kèm loa có thi?t k? hi?n ð?i và cao c?p. D?a trên nh?ng ýu ði?m k? th?a t? ngý?i ti?n nhi?m S9 Pro k?t h?p v?i nh?ng ði?m m?i trong thi?t k? và công ngh? âm thanh, giúp thi?t b? tr? nên cao c?p hõn.', '', 1, NULL, '1490000', 'Công su?t loa: 3W x 2 (tích h?p 2 loa)', 2, 2, 1690000, '', NULL, 1, 0, 1, '2018-05-19 07:52:18', '2018-05-21 02:17:36'),
(48, 'MICRO KARAOKE BLUETOOTH 3 LOA MAILIAN M2S', 'MICRO KARAOKE BLUETOOTH 3 LOA MAILIAN M2S', 'images/sanpham/micro/micro m2s/0.jpg', NULL, 'Mailian M2S là chi?c micro karaoke kèm loa bluetooth duy nh?t có thi?t k? ð?n 3 loa công su?t l?n, và thêm c?ng âm thanh 3.5 ð? c?m ra loa ngoài hát c?c hay.', '', 1, NULL, '790000', ' Công su?t loa: 3W x 3 (tích h?p 3 loa)', 2, 2, 1290000, '', NULL, 1, 0, 1, '2018-05-19 08:00:59', '2018-05-21 02:17:39'),
(49, 'MICRO KÈM LOA ZBX-66, MICRO HÁT KARAOKE BLUETOOTH C?C HAY', 'MICRO KÈM LOA ZBX-66, MICRO HÁT KARAOKE BLUETOOTH C?C HAY', 'images/sanpham/micro/micro zbx66/0.jpg', NULL, 'Micro kèm loa ZBX-66 chính h?ng hát karaoke c?c hay trên ði?n tho?i, máy tính b?ng hay Android TV Box,... b?n có th? hát karaoke cùng b?n bè m?i lúc m?i nõi. Mic karaoke kèm loa ZBX-66 có ki?u dáng m?i, ph?n loa h?nh qu? táo ð?c ðáo, m?i l?.\r\n\r\n \r\n\r\nVideo tr?i nghi?m hát karaoke trên Micro Kèm Loa ZBX-66', '', 1, NULL, '990000', 'K?t n?i: Bluetooth 3.0', 2, 2, 1390000, '', NULL, 1, 0, 0, '2018-05-19 08:00:59', '2018-05-21 02:17:42'),
(50, 'TUXUN K9 - MICRO HÁT KARAOKE TRÊN Ô TÔ, XE HÕI', 'TUXUN K9 - MICRO HÁT KARAOKE TRÊN Ô TÔ, XE HÕI', 'images/sanpham/micro/micro tuxunk9/0.jpg', NULL, 'Micro hát Karaoke trên ô tô Tuxun K9 ðý?c thi?t k? theo công ngh? truy?n d?n không dây, ðý?c thi?t l?p s?n các chu?n âm thanh Stereo ph?ng thu v? v?y Micro Tuxun K9 r?t nh?y bén v?i gi?ng nói và có âm s?c r?t trong tr?o. B?n có th? s? d?ng micro hát karaoke bluetooth Tuxun K9 lên t?i 6h liên t?c v?i pin Lithium s?c.', 'Ýu ð?i áp d?ng dành cho Qu? khách hàng mua nhi?u:\r\n\r\n- Mua 2 micro Tunxun K9 ðý?c gi?m thêm 5%', 1, NULL, '990000', 'Ð?u ra: 10mV (tai nghe).', 2, 2, 1990000, '', NULL, 1, 0, 0, '2018-05-19 08:04:52', '2018-05-21 02:17:44'),
(51, 'LOA XÁCH TAY HÁT KARAOKE W-KING K3 C?C HAY', 'LOA XÁCH TAY HÁT KARAOKE W-KING K3 C?C HAY', 'images/sanpham/loa/king k3/0.jpg', NULL, 'W-King K3 là d?ng s?n ph?m loa hát Karaoke ch?t lý?ng cao, ðý?c trang b? b? vi x? l? âm thanh cao c?p, h? tr? x? l? Bass, Treble ð?y ð?. Không gi?ng nhý m?t s? lo?i loa kéo khác thý?ng ch? có ch?nh âm lý?ng, echo (ti?ng vang), c?n khi nghe nh?c b?n s? không c?m th?y ð? Bass, Treble c?a nh?c mà ch? th?y ti?ng vang to, d?n ð?n c?m nh?n nghe âm thanh r?t d?.\r\n\r\nLoa c?a W-King K3 có công su?t 60 s? cho b?n có c?m giác nhý ðang s? h?u 1 dàn âm thanh Karaoke cao c?p, t?t c? ðý?c tích h?p trong 1 thi?t b? nh? g?n.', '', NULL, NULL, '2650000', 'Bluetooth 4.2', 4, 4, 3650000, '', NULL, 1, 0, 1, '2018-05-19 08:11:45', '2018-05-21 02:17:47'),
(52, 'LOA BLUETOOTH JBL CHARGE 3 (LO?I 1)', 'LOA BLUETOOTH JBL CHARGE 3 (LO?I 1)', 'images/sanpham/loa/jbl/0.jpg', NULL, 'Loa bluetooth JBL Charge 3 giá r?, nghe nh?c c?c hay?, thý?ng th?c mê say', '', 1, NULL, '550000', '', 4, 4, 990000, '', NULL, 1, 0, 0, '2018-05-19 08:11:45', '2018-05-21 02:17:55'),
(53, 'LOA BLUETOOTH EWA A104 GIÁ T?T', 'LOA BLUETOOTH EWA A104 GIÁ T?T', 'images/sanpham/loa/a104/0.jpg', NULL, 'S?n ph?m LOA BLUETOOTH EWA A104 ðý?c thi?t k? nh? g?n v?i kích thý?c siêu nh?. V? ðý?c làm b?ng ch?t li?u h?p kim nhôm.', '', 1, NULL, '190000', 'Dung lý?ng pin: 500mA', 4, 4, 350000, '', NULL, 1, 0, 1, '2018-05-19 08:16:20', '2018-05-21 02:17:58'),
(54, 'TAI NGHE BLUETOOTH W-KING S11', 'TAI NGHE BLUETOOTH W-KING S11', 'images/sanpham/loa/tainghe s11/0.jpg', NULL, 'W-king là thýõng hi?u chuyên s?n xu?t Loa và Tai Nghe Bluetooth ch?t lý?ng cao v?i thi?t k? ð?p. Ð?c bi?t thi?t k? c?a h?ng luôn mang phong cách tr? trung, ti?n l?i, thích h?p v?i xu hý?ng c?a gi?i tr? v?i s? gia công hoàn h?o ð?n t?ng chi ti?t nh? nh?t.\r\n\r\n \r\n\r\nCác m?u tai nghe Bluetooth ðý?c ýa thích hi?n nay c?a W-King ðó là S3, S11 và S12, m?i m?u có 1 thi?t k? khác nhau tùy theo s? thích c?a t?ng ngý?i dùng. ? ðây chúng ta s? cùng t?m hi?u v? thi?t k? c?a W-King S11, m?t trong nh?ng tai nghe th? thao c?a h?ng.', '', 1, NULL, '390000', '', 4, 4, 590000, '', NULL, 1, 0, 1, '2018-05-19 08:16:20', '2018-05-21 02:18:01'),
(55, 'BÀN PHÍM CHU?T BAY KM800V CÓ MIC (MX3 VOICE)', 'BÀN PHÍM CHU?T BAY KM800V CÓ MIC (MX3 VOICE)', 'images/sanpham/phukien/banphim km800v/0.jpg', NULL, 'Bàn phím chu?t bay KM800V (MX3 voice) có c?u t?o g?n gi?ng v?i lo?i KM800 (MX3) thý?ng, ðý?c trang b? thêm Micro bên trong ð? ngý?i dùng th?c hi?n tính nãng Voice search.\r\n\r\nVideo ðánh giá chi ti?t chu?t bay KM800 (MX3)', '', 1, NULL, '390000', 'Compatible with Windows 98/2000/ME/Vista/NT/XP/7, Android, Linux (DEBIAN-3.1, Redhat-9.0)', 5, 5, 690000, '', NULL, 1, 0, 1, '2018-05-19 08:34:03', '2018-05-21 02:18:04'),
(56, 'BÀN PHÍM CHU?T BAY KM800 PRO CÓ MIC VOICE SEARCH (MX3 PRO VOICE)', 'BÀN PHÍM CHU?T BAY KM800 PRO CÓ MIC VOICE SEARCH (MX3 PRO VOICE)', 'images/sanpham/phukien/banphim km800/0.jpg', NULL, 'Bàn phím chu?t bay KM800 Pro (MX3 Pro) là phiên b?n nâng c?p c?a bàn phím chu?t bay KM800 (MX3) v?i ðèn LED n?n chi?u sáng bên dý?i các phím b?m giúp ngý?i dùng thao tác khi v? ðêm t?t hõn.\r\n\r\nChu?t bay KM800 Pro (MX3 Pro) hi?n nay ðý?c r?t nhi?u ngý?i dùng l?a ch?n v? s? thu?n ti?n và d? s? d?ng c?a nó. V?a tích h?p chu?t không dây, v?a tích h?p bàn phím trong m?t thi?t b? nh? g?n và b?n có th? c?m trên tay ð? thao tác d? dàng.', '', 1, NULL, '450000', '', 5, 5, 990000, '', NULL, 1, 0, 0, '2018-05-19 08:38:08', '2018-05-21 02:18:07'),
(57, 'AIR MOUSE A1M - CHU?T BAY T?M KI?M B?NG GI?NG NÓI CHO ANDROID TV BOX', 'AIR MOUSE A1M - CHU?T BAY T?M KI?M B?NG GI?NG NÓI CHO ANDROID TV BOX', 'images/sanpham/phukien/chuotbay a1m/0.jpg', NULL, 'B? ðôi chu?t bay không dây Air Mouse A1M  và Air Mouse A1  v?a ra m?t ð?u nãm 2018 ð? t?o nên s? thu hút l?n t? c?ng ð?ng ngý?i Android TV Box. Air Mouse A1M thu hút v? thi?t k? t?i gi?n ð?p m?t cùng tông màu ðen l?ch l?m. Ði?m n?i b?t nh?t c?a Air Mouse A1M là ð? nh?y xu?t s?c cùng tính nãng t?m ki?m b?ng gi?ng nói Voice Search ð? ðý?c tích h?p trong chi?c chu?t bay th? h? m?i này.', '', 1, NULL, '290000', '', 5, 5, 350000, '', NULL, 1, 0, 1, '2018-05-19 08:38:08', '2018-05-21 02:18:10'),
(58, 'TAY GAME TRONSMART MARS G01', 'TAY GAME TRONSMART MARS G01', 'images/sanpham/phukien/taygame/0.jpg', NULL, 'Tay Game Tronsmart Mars G01 2.4GHz Wireless Gamepad Cho Android TV BOX / PS3 / Tablet PC\r\n \r\n\r\nTronsmart Mars G01 là tay game chuyên d?ng chõi GAME cho Android TV Box và PC. Hi?n t?i Tronsmart G01 d?n ð?u th? trý?ng tay game nh? kh? nãng týõng thích ðý?c v?i t?t c? n?n t?ng bao g?m c? giao di?n ði?u khi?n PS3 và gi? l?p. K?t n?i ðý?c v?i thi?t b? chõi game dùng n?n t?ng Android nào nhý TV Box, TV Stick, Smartphone, Máy tính b?ng, ...). K?t n?i ðõn gi?n ch? c?n Plug and Play trong vài giây.', '', 2, NULL, '490000', '', 5, 5, 890000, '', NULL, 1, 0, 1, '2018-05-19 08:40:05', '2018-05-21 02:18:13'),
(59, 'TP-LINK TL-WA860RE - B? M? R?NG SÓNG WIFI', 'TP-LINK TL-WA860RE - B? M? R?NG SÓNG WIFI', 'images/sanpham/thietbi mang/tp link w860/0.jpg', NULL, 'TP-LINK TL-WA860RE - B? m? r?ng sóng WiFi t?c ð? 300Mbps cho d?ng AC ði qua\r\n \r\n\r\nB? m? r?ng sóng WiFi TL-WA860RE c?a TP-LINK ðý?c thi?t k? thu?n ti?n cho vi?c m? r?ng ph?m vi ph? sóng và tãng cý?ng tín hi?u c?a m?ng không dây ð? có s?n nh?m lo?i b? \"ði?m ch?t\". V?i t?c ð? chu?n N 300Mbps, nút nh?n m? r?ng sóng, kích thý?c nh? g?n và thi?t k? g?n tý?ng, m? r?ng m?ng không dây chýa bao gi? d? dàng ð?n v?y. Hõn n?a, c?ng Ethernet cho phép b? m? r?ng sóng ho?t ð?ng nhý m?t b? chuy?n ð?i không dây ð? k?t n?i v?i các thi?t b? có dây.', '', 2, NULL, '635000', '', 6, 6, 890000, '', NULL, 1, 0, 1, '2018-05-19 08:44:54', '2018-05-21 02:18:15'),
(60, 'MERCURY MW302RE - B? KÍCH SÓNG WIFI T?C Ð? 300MBPS', 'MERCURY MW302RE - B? KÍCH SÓNG WIFI T?C Ð? 300MBPS', 'images/sanpham/thietbi mang/mercury/0.jpg', NULL, 'Hi?n t?i, Hieuhien.vn cung c?p thêm d?ng s?n ph?m m?i t?t hõn v?i giao di?n ti?ng Anh d? cài ð?t và s? d?ng. Xem ngay:\r\n\r\n? B? kích sóng Wifi t?c ð? 300Mbps Mercusys MW300RE', '', 2, NULL, '190000', '', 6, 6, 250000, '', NULL, 1, NULL, 0, '2018-05-19 08:44:54', '2018-05-19 08:44:54'),
(61, 'TP-LINK M7200 - B? PHÁT WIFI DI Ð?NG 4G LTE\r\n1242 lý?t xem', 'TP-LINK M7200 - B? PHÁT WIFI DI Ð?NG 4G LTE\r\n1242 lý?t xem', 'images/sanpham/thietbi mang/tp link m7200/0.jpg', NULL, 'TP-Link M7200 - B? Phát WiFi Di ð?ng 4G LTE\r\nTP-Link M7200 - B? Phát WiFi Di ð?ng 4G LTE ? Ch? c?n g?n SIM và m? ngu?n, b?n có th? s? d?ng Wi-Fi ? b?t c? nõi ðâu ? V?i TP-Link M7200 b?n d? dàng chia s? k?t n?i 4G/3G cùng lúc cho 10 thi?t b? và có th? s? d?ng 8 ti?ng liên t?c v?i dung lý?ng Pin lên ð?n 2000mAh ? Mua b? phát wifi 4G TP-Link M7200 chính h?ng, giá r? t?i Hieuhien.vn ? Liên h? 0918778013 ? Giao hàng toàn qu?c.\r\nNh?ng tính nãng n?i b?t c?a B? Phát WiFi 4G TP-Link M7200\r\n- Chia s? k?t n?i Internet v?i b?n bè lên t?i 10 thi?t b? cùng lúc\r\n\r\n- Pin s?c 2000mAh cho 8 ti?ng s? d?ng liên t?c\r\n- H? tr? công ngh? 4G FDD/TDD-LTE m?i nh?t\r\n- Qu?n l? d? dàng và ðõn gi?n v?i ?ng d?ng tpMiFi', '', 2, NULL, '1300000', '', 6, 6, 1500000, '', NULL, 1, NULL, 1, '2018-05-19 08:49:19', '2018-05-19 08:49:19'),
(62, 'HUAWEI E5573CS-609 - B? PHÁT WIFI 4G GIÁ R?, T?C Ð? 150MBPS', 'HUAWEI E5573CS-609 - B? PHÁT WIFI 4G GIÁ R?, T?C Ð? 150MBPS', 'images/sanpham/thietbi mang/huawei/0.jpg', NULL, 'B? phát wifi 4G Huawei E5573Cs-609 là phiên b?n s?n xu?t dành riêng cho nhà m?ng Airtel c?a ?n Ð?. Tuy nhiên Router WiFi 4G Huawei E5573Cs-609 không b? khóa m?ng mà có th? s? d?ng v?i h?u h?t các nhà m?ng trên th? gi?i, t? ð?ng nh?n ði?n c?u h?nh 3G/4G c?a trên 500 nhà m?ng trên th? gi?i.\r\nB? phát wifi 4G giá r? Huawei E5573Cs-609 có t?c ð? download t?i ða là 150Mbps, t?c ð? upload t?i ða là 50Mbps.\r\nHuawei E5573Cs-609 trang b? Wifi chu?n 802.11 b/g/n, b?o m?t WPA/WPA-PSK, h? tr? k?t n?i ð?ng th?i 10 thi?t b?.\r\nRouter WiFi 4G Huawei E5573Cs-609 xài pin có th? tháo r?i 1500mAh, tuy không l?n nhýng v?i công ngh? ti?t ki?m ði?n nãng c?a Huawei nên v?n ð?m b?o cho 5-6 gi? làm vi?c liên t?c. Th?i gian ch? lên ð?n 300 gi?. S? d?ng c?ng s?c 5V-1A ph? bi?n hi?n nay.', '', 1, NULL, '990000', '', 6, 6, 1390000, '', NULL, 1, NULL, 0, '2018-05-19 08:49:19', '2018-05-19 08:49:19'),
(63, 'PIN S?C D? PH?NG 20.000MAH - REMAX RPL 58', 'PIN S?C D? PH?NG 20.000MAH - REMAX RPL 58', 'images/sanpham/sac du phong/remax 2000/0.jpg', NULL, 'Pin s?c d? ph?ng Remax RPL 58 20000mAh có thi?t k? g?n ð?p, d? dàng mang ði khi di chuy?n. Dung lý?ng pin l?n 20000mAh giúp b?n d? tr? nãng lý?ng bên m?nh m?i lúc m?i nõi. Có th? s?c ðý?c 7-10 l?n cho nh?ng d?ng ði?n tho?i 2-3000mAh.', '', 2, NULL, '490000', 'Dung lý?ng: 20000mAh\r\nÐi?n th?: 5V/1A\r\nÐ?u ra: 5V/2,4A (Max)', 7, 7, 690000, '', NULL, 1, NULL, 1, '2018-05-19 08:56:46', '2018-05-19 08:56:46'),
(64, 'PIN S?C D? PH?NG KHÔNG DÂY CHU?N QI - 10.000 MAH', 'PIN S?C D? PH?NG KHÔNG DÂY CHU?N QI - 10.000 MAH', 'images/sanpham/sac du phong/qi/0.jpg', NULL, 'Pin S?c D? Ph?ng  Không Dây Chu?n QI Dung Lý?ng 10.000 mAh\r\n \r\n\r\nNgày nay v?i s? phát tri?n m?nh m? c?a công ngh? ði?n t? hi?n nay vi?c s? d?ng ði?n tho?i hay máy tính b?ng là nhu c?u c?n thi?t r?t quan tr?ng ð?i v?i m?i ngý?i. V? v?y ði kèm v?i các thi?t b? thông minh này th? ph? ki?n ði kèm c?ng xu?t hi?n nhi?u hõn v?i các thýõng hi?u khác nhau. M?t trong nh?ng s?n ph?m ðý?c xem là ngu?n s?ng không th? thi?u c?a ði?n tho?i thông minh hay máy tính b?ng hi?n nay ðó là s?c d? ph?ng không dây. Ðây là m?t trong nh?ng ph? ki?n h?u nhý là không th? thi?u v?i thi?t k? g?n nh?, s?c pin nhanh hõn, ti?n l?i, d? dàng s? d?ng và thu?n ti?n di chuy?n ? b?t c? ðâu.', 'C?ng vào có dây: DC 5V == 2A, c?ng vào không dây: 5V == 750mA', 2, NULL, '580000', '', 7, 7, 980000, '', NULL, 1, NULL, 1, '2018-05-19 08:56:46', '2018-05-19 08:56:46'),
(65, 'PIN S?C D? PH?NG ASPOR A386 12000MAH', 'PIN S?C D? PH?NG ASPOR A386 12000MAH', 'images/sanpham/sac du phong/a386/0.jpg', NULL, 'Pin s?c d? ph?ng Aspor A386\r\nPin s?c d? ph?ng Aspor A386 s? h?u dung lý?ng 12.000mAh giúp b?n có th? tho?i mái s?c cho chi?c Smartphone c?a m?nh trong nhi?u l?n. V?i Aspor A386, b?n có th? tho?i mái ði ra ngoài trong nhi?u gi?, nhi?u ngày mà không s? h?t pin ði?n tho?i.', '', 2, NULL, '320000', '', 7, 7, 450000, '', NULL, 1, NULL, 0, '2018-05-19 08:59:47', '2018-05-19 09:00:59'),
(66, NULL, NULL, 'images/sanpham/sac du phong/a373/0.jpg', NULL, 'PIN S?C D? PH?NG ASPOR A373 6000MAH', '', 1, NULL, '250000', '', 7, 7, 350000, '', NULL, 1, NULL, 0, '2018-05-19 08:59:47', '2018-05-19 08:59:47'),
(67, 'MICRO THU ÂM ISK AT100 - MIC HÁT KARAOKE, HÁT LIVE STREAM » MIC HOA VINH', 'MICRO THU ÂM ISK AT100 - MIC HÁT KARAOKE, HÁT LIVE STREAM » MIC HOA VINH', 'images/sanpham/mic thu am/at100/0.jpg', NULL, '', '', 1, NULL, '950000', '', 3, 3, 1290000, '', NULL, 1, 0, 0, '2018-06-05 02:51:18', '2018-06-05 02:55:17'),
(68, 'MICRO THU ÂM TAKSTAR PC-K320', 'MICRO THU ÂM TAKSTAR PC-K320', 'images/sanpham/mic thu am/k320/0.jpg', NULL, 'Takstar PC-K320 - Micro Thu Âm Chuyên Nghi?p, Mic Hát Karaoke, LiveStream\r\n\r\nMicro thu âm Takstar PC-K320 là micro condenser (ði?n dung) hi?u su?t cao, ðáp ?ng t?n s? r?ng, âm thanh r? ràng và t? nhiên. Mic thu âm Takstar PC K320 ðý?c s? d?ng r?ng r?i trong các b?n thu âm gi?ng hát, b?n ghi âm nh?c, thu âm cá nhân, chýõng tr?nh radio và hát karaoke online, hát live stream.', '', 2, NULL, '1490000', '12-52V ði?n phantom', 3, 3, 1890000, '', NULL, 1, 0, 0, '2018-06-05 03:01:42', '2018-06-05 03:01:42'),
(69, 'SOUND CARD THU ÂM V8, CARD ÂM THANH HÁT KARAOKE, LIVE STREAM', 'SOUND CARD THU ÂM V8, CARD ÂM THANH HÁT KARAOKE, LIVE STREAM', 'images/sanpham/mic thu am/sound v8/0.jpg', NULL, 'Sound Card Thu Âm V8, Card Âm Thanh Hát Karaoke, Live Stream\r\n \r\n\r\nSound card thu âm V8 là s?n ph?m card âm thanh týõng thích v?i nhi?u thi?t b? nhý ði?n tho?i smartphone, máy tính b?ng, laptop, PC. Sound card V8 h? tr? 12 hi?u ?ng âm thanh s?ng ð?ng, ði kèm là r?t nhi?u tinh ch?nh âm thanh ð?u vào, giúp công vi?c hát karaoke cá nhân hay thu âm c?a b?n tr? nên d? dàng hõn. \r\n\r\nÐ?c bi?t Sound card thu âm giá r? V8 ðý?c trang b? pin dung lý?ng 1000mah, có th? s? d?ng 12h liên t?c, th?c s? là 1 nâng c?p x?ng ðáng so v?i các s?n ph?m cùng lo?i khi h?u h?t ph?i h?y ngu?n ði?n tr?c ti?p. Gi? ðây b?n có th? mang Soundcard V8 khi ði du l?ch, thu âm và hát Karaoke, Livestream ? b?t c? ðâu.\r\nVideo m? h?p và ðánh giá Sound card thu âm giá r? V8 - Hát karaoke, hát live stream\r\n<iframe allow=\"autoplay; encrypted-media\" allowfullscreen=\"\" frameborder=\"0\" height=\"450\" src=\"https://www.youtube.com/embed/FD4RNt_BiIo?rel=0\" width=\"800\"></iframe>', '', 2, NULL, '950000', '', 3, 3, 1200000, '', NULL, 1, 0, 0, '2018-06-05 03:01:42', '2018-06-05 03:01:42'),
(70, 'COMBO SOUND CARD XOX K10 VÀ MICRO ISK AT100', 'COMBO SOUND CARD XOX K10 VÀ MICRO ISK AT100', 'images/sanpham/mic thu am/xox k10/0.jpg', NULL, 'Sound Card XOX K10 là card âm thanh ða nãng c?a XOX, cung c?p cho b?n m?t gi?i pháp ðõn gi?n, g?n nh? v?i âm thanh ch?t lý?ng cao (24-bit), k?t n?i tr?c ti?p v?i máy tính qua c?ng USB. Sound Card XOX K10 ðý?c thi?t k? ð? hát karaoke online, hát live stream, thu âm gi?ng hát, nghe nh?c, chat skype và tr? chuy?n tr?c tuy?n.\r\nVideo hý?ng d?n s? d?ng Sound Card XOX K10 - dùng cho micro thu âm, hát karaoke, hát Livestream\r\n<iframe allowfullscreen=\"\" frameborder=\"0\" gesture=\"media\" height=\"450\" src=\"https://www.youtube.com/embed/epPmxK82IXk?rel=0\" style=\"margin: 0px; padding: 0px;\" width=\"800\"></iframe>', '', 2, NULL, '1650000', '', 3, 3, 1890000, '', NULL, 1, 0, 0, '2018-06-05 03:04:28', '2018-06-05 03:04:28');

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `thongtincty`
--

CREATE TABLE `thongtincty` (
  `id` int(11) NOT NULL,
  `tencty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hoten`, `dienthoai`, `email`, `status`, `level`) VALUES
(1, 'cuong', '123456', 'Cý?ng', '01638716085', 'cuong@gmail.com', 1, 1),
(4, 'tan', '123456', 'Tân', '01238860500', 'tan@gmail.com', 1, 1),
(5, 'huy', '123456', 'huy', '01639485317', 'duy@gmail.com', 1, 1),
(6, 'test', '123456', 'ahihi', '01883088812', 'ahihi@gmail.com', 1, 1),
(7, 'khanh', '123456', 'Khánh', '0123456789', 'khanh@gmail.com', 1, 1);


-- --------------------------------------------------------

--
-- C?u trúc b?ng cho b?ng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orthernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ðang ð? d? li?u cho b?ng `video`
--

INSERT INTO `video` (`id`, `title`, `link`, `orthernum`, `status`) VALUES
(1, 'mibox 4k vinh v?t v? 2019', 'https://www.youtube.com/watch?v=IkBeINhkc70', 11, 0),
(2, 'V?t V?| Ðánh giá FPT Play Box 2018', 'https://www.youtube.com/watch?v=BgNUaSOPwp4', 3, 1),
(3, 'Schannel - M? h?p và ðánh giá Clip TV Box', 'https://www.youtube.com/watch?v=9HtlrPMkwDE', 3, 1),
(4, 'khanh tùng', 'fb.com/khanhtungmtp', 10, 1);

--
-- Ch? m?c cho các b?ng ð? ð?
--

--
-- Ch? m?c cho b?ng `anhslide`
--
ALTER TABLE `anhslide`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `thongtincty`
--
ALTER TABLE `thongtincty`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ch? m?c cho b?ng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các b?ng ð? ð?
--

--
-- AUTO_INCREMENT cho b?ng `anhslide`
--
ALTER TABLE `anhslide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho b?ng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho b?ng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho b?ng `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho b?ng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho b?ng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho b?ng `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho b?ng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho b?ng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho b?ng `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho b?ng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho b?ng `thongtincty`
--
ALTER TABLE `thongtincty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho b?ng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho b?ng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
