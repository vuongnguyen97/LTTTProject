-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- M�y ch?: 127.0.0.1
-- Th?i gian �? t?o: Th6 07, 2018 l�c 11:52 AM
-- Phi�n b?n m�y ph?c v?: 10.1.28-MariaDB
-- Phi�n b?n PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- C� s? d? li?u: `tvbox`
--

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `anhslide`
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
-- �ang �? d? li?u cho b?ng `anhslide`
--

INSERT INTO `anhslide` (`id`, `title`, `anhslide`, `anh_thumb`, `link`, `status`) VALUES
(43, 'tung', 'upload/1.png', NULL, '', 1),
(44, 'tung', 'upload/12.1.png', NULL, '', 0),
(45, 'ssdssds', 'upload/32845674_1615336935182611_1391643294521360384_n.jpg', NULL, '', 1);

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `baiviet`
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
-- �ang �? d? li?u cho b?ng `baiviet`
--

INSERT INTO `baiviet` (`id`, `danhmucbaiviet`, `title`, `tomtat`, `noidung`, `hinhanh`, `anh_thumb`, `view`, `ngaydang`, `giodang`, `orthernum`, `status`) VALUES
(40, '3', 'nguyen', 'khanh', '<p>tung</p>\r\n', 'upload/avatar fb.jpg', NULL, 0, '2018-04-24', '9:35 PM', 0, 1),
(41, '1', 'fefef', '�effef', '<p>&ecirc;fefe</p>\r\n', 'upload/windows-spotlight-20.jpg', NULL, 0, '2018-05-14', '9:15 PM', 0, 1);

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `chitietdonhang`
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
-- C?u tr�c b?ng cho b?ng `danhmucbaiviet`
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
-- �ang �? d? li?u cho b?ng `danhmucbaiviet`
--

INSERT INTO `danhmucbaiviet` (`id`, `danhmucbaiviet`, `parent_id`, `menu`, `home`, `orthernum`, `status`) VALUES
(1, 'mibox', 0, 1, 1, 0, 1),
(2, 'vibox 2018', 0, 1, 1, 0, 1),
(3, 'fpt play box', 1, 1, 1, 0, 1),
(4, 'xiaomi', 2, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `donhang`
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
-- �ang �? d? li?u cho b?ng `donhang`
--

INSERT INTO `donhang` (`id`, `sanpham`, `tongtien`, `user_name`, `sdt`, `diachi`, `email`, `ghichu`, `thanhtoan`, `date_order`) VALUES
(74, 'LOA BLUETOOTH EWA A104 GI� T?T', 190000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 14:49:27'),
(76, 'B�N PH�M CHU?T BAY KM800 PRO C� MIC VOICE SEARCH (MX3 PRO VOICE)', 450000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 14:52:53'),
(77, 'VIBOX V1 Pro Android TV Box th��ng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 14:59:13'),
(78, 'VIBOX V1 Pro Android TV Box th��ng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 15:01:29'),
(79, 'VIBOX V1 Pro Android TV Box th��ng hi?u Vi?t', 790000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 15:02:14'),
(80, 'VIBOX V2 Pro 2018 Android TV Box th��ng hi?u Vi?t', 990000, 'nguyen khanh tung', 1638716085, '?p 4 x? t�n l?p b?c t�n uy�n b?nh du�ng', '', '', '1', '2018-06-04 15:04:53');

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `hotro`
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
-- �ang �? d? li?u cho b?ng `hotro`
--

INSERT INTO `hotro` (`id`, `people`, `facebook`, `skyber`, `orthernum`, `status`) VALUES
(1, 'Ms. H?nh Nguy?n', '', '', 0, 0);

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `imageproduct`
--

CREATE TABLE `imageproduct` (
  `id` int(11) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �ang �? d? li?u cho b?ng `imageproduct`
--

INSERT INTO `imageproduct` (`id`, `parent_id`, `images`) VALUES
(1, 43, 'images/sanpham/tvbox/vibox v1 pro/1.jpg'),
(2, 43, 'images/sanpham/tvbox/vibox v1 pro/2.jpg'),
(3, 43, 'images/sanpham/tvbox/vibox v1 pro/3.jpg'),
(4, 43, 'images/sanpham/tvbox/vibox v1 pro/4.jpg'),
(5, 43, 'images/sanpham/tvbox/vibox v1 pro/5.jpg');

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `lienhe`
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
-- �ang �? d? li?u cho b?ng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `title`, `dienthoai`, `email`, `noidung`, `ngaydang`, `status`) VALUES
(2, 'nguy?n khanh t�ng', 's?n ph?m mibox 4k ', 1638716085, 'nguyenkhanhtung580@gmail.com', 's?n ph?m mibox 4k c?n h�ng ko shop', '2018-06-05 02:35:06', 0);

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `home` int(1) NOT NULL DEFAULT '1',
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �ang �? d? li?u cho b?ng `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `home`, `icon`, `date_create`) VALUES
(1, ' TV BOX & MINI PC', 1, 'images/tv-box-icon-menu.png', '2018-06-05 12:23:04'),
(2, ' MICRO KARAOKE', 1, 'images/micro-karaoke-bluetooth.png', '2018-06-05 12:23:04'),
(3, ' MICRO THU �M', 1, 'images/mic-thu-am.png', '2018-06-05 12:23:04'),
(4, ' LOA - TAI NGHE', 1, 'images/loa-bluetooth-icon.png', '2018-06-05 12:23:04'),
(5, ' PH? KI?N TV BOX', 1, 'images/taycam.png', '2018-06-05 12:23:04'),
(6, ' THI?T B? M?NG', 1, 'images/wifilan-icon.jpg', '2018-06-05 12:23:04'),
(7, ' S?C D? PH?NG', 1, 'images/battery.png', '2018-06-05 12:23:04'),
(8, ' AZ PH? KI?N', 0, 'images/az.png', '2018-06-05 12:23:04'),
(31, 'TV BOX & MINI PC', 1, '', '2018-06-05 12:23:04');

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `menu_sub`
--

CREATE TABLE `menu_sub` (
  `id` int(11) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `menusub_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �ang �? d? li?u cho b?ng `menu_sub`
--

INSERT INTO `menu_sub` (`id`, `parent_id`, `menusub_name`) VALUES
(1, 1, 'Android TV Box'),
(2, 1, 'Android TV Stick'),
(3, 1, 'Windows Mini PC'),
(4, 2, 'MIKARA'),
(5, 2, 'TOSING'),
(6, 3, 'Sound Card'),
(7, 3, 'Chu?t Bay & B�n Ph�m'),
(8, 3, 'Tay Game Android TV BOX');

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `sanpham`
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
-- �ang �? d? li?u cho b?ng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `slug`, `anh`, `anh_thumb`, `noidung`, `motakhuyenmai`, `baohanhsp`, `link`, `gia`, `thongso`, `category_id`, `menusub_id`, `sale`, `video`, `ordernumb`, `status`, `view`, `hot`, `create_at`, `update_at`) VALUES
(43, 'VIBOX V1 Pro Android TV Box th��ng hi?u Vi?t', 'VIBOX V1 Pro Android TV Box th��ng hi?u Vi?t', 'images/sanpham/tvbox/vibox v1 pro/1.jpg', 'images/sanpham/tvbox/vibox v1 pro/0.jpg', 'Ti?p n?i th�nh c�ng c?a Android TV Box VIBOX V1 Mini, v?i ti�u ch� h�?ng t?i ng�?i d�ng, n�ng cao h�n v? ch?t l�?ng s?n ph?m, VIBOX V1 Pro ra �?i kh?ng �?nh s? th�nh c�ng c?a h?ng khi ch?t l�?ng ng�y c�ng n�ng cao, ��p ?ng nhi?u nhu c?u gi?i tr� kh�c nhau.', 'T?ng c�p AV, chu?t kh�ng d�y tr? gi� 150.000�', 1, NULL, '790000', 'RAM: 1GB DDR3', 1, 1, 990000, '', NULL, 1, 0, 1, '2018-05-19 07:42:32', '2018-06-06 09:49:15'),
(44, 'VIBOX V2 Pro 2018 Android TV Box th��ng hi?u Vi?t', 'VIBOX V2 Pro 2018 Android TV Box th��ng hi?u Vi?t', 'images/sanpham/tvbox/vibox 2 pro/0.jpg', NULL, 'H?p truy?n h?nh th�ng minh VIBOX V2 Pro 2018 ��?c trang b? ph?n c?ng ch?t l�?ng t?t, firmware ��?c ph�t tri?n v� t?i �u b?i c�c k? s� Vi?t Nam, �?m b?o s?n ph?m ho?t �?ng ?n �?nh, nhanh m�?t. �?c bi?t h�n n?a v?i ch�nh s�ch b?o h�nh 13 th�ng, �?i m?i n?u l?i ph?n c?ng, ph?n m?m b?o h�nh tr?n �?i, VIBOX V2 Pro 2018 t? tin s? gi�p ng�?i d�ng ho�n to�n y�n t�m khi l?a ch?n v� tho?i m�i d? d�ng khi s? d?ng.', 'Gi?m 5% cho Kh�ch H�ng c? c?a HieuHien.vn', 1, NULL, '990000', 'H? �i?u h�nh: Android 4.4 KitKat', 1, 1, 1290000, '', NULL, 0, 0, 1, '2018-05-19 07:42:32', '2018-06-06 09:48:55'),
(45, 'Egreat A5 Android TV Box 4K HD Player', 'Egreat A5 Android TV Box 4K HD Player', 'images/sanpham/tvbox/egreat a5/0.jpg', NULL, 'C�ng v?i s? th�nh c�ng c?a \"anh c?\" Egreat A10 �? l�m n�ng l?i th? tr�?ng HD Player hi?n nay th? Egreat A5 c?ng nh?n ��?c r?t nhi?u s? quan t�m t? ng�?i d�ng. Thay �?i thi?t k? mainboard, th�n m�y, v? m�y, l�?c b? �i m?t s? chi ti?t nh� khay �?ng ? c?ng HDD, qu?t t?n nhi?t, c?ng RS232...gi�p cho gi� th�nh c?a Egreat A5 gi?m xu?ng, ph� h?p v?i t�i ti?n c?a nhi?u ng�?i d�ng h�n n�n s? l�?ng Egreat A5 b�n ra h�ng th�ng lu�n nhi?u h�n so v?i Egreat A10.', 'T?ng t�i kho?n VIP xem phim HD online ch?t l�?ng cao', 1, NULL, '2590000', 'RAM 2GB 1866MHz DDR3', 1, 1, 3500000, '', NULL, 1, 0, 0, '2018-05-19 07:49:27', '2018-05-21 02:17:30'),
(46, 'Egreat A10 Android TV Box 4K 3D ATMOS DTS', 'Egreat A10 Android TV Box 4K 3D ATMOS DTS', 'images/sanpham/tvbox/egreat a10/0.jpg', NULL, 'Egreat A10 l� s?n ph?m c?a Egreat, m?t c�ng ty chuy�n s?n xu?t c�c thi?t b? nghe nh?n gia �?nh nh� �?u ph�t HD, �?u thu TV k? thu?t s?. Egreat A10 l� s? k?t h?p ho�n h?o gi?a �?u ph�t HD v� Android TV Box t?p trung v�o c�c t�nh n�ng gi?i tr� online, �?ng th?i ��p ?ng t?t vi?c gi?i tr� offline. S?n ph?m n�y t? ra n?i tr?i so v?i c�c �?u ph�t Android kh�c nh? kh? n�ng ch�i phim Blu-ray c� menu, h? tr? phim 3D, 4K HDR.', 'T?ng chu?t bay b�n ph�m KM800 tr? gi� 250.000� (n?u kh�ng l?y qu� t?ng n�y, qu? kh�ch ��?c gi?m 190.000� trong h�a ��n)', 1, NULL, '5490000', '', 1, 1, 6000000, '', NULL, 1, 0, 0, '2018-05-19 07:49:27', '2018-05-21 02:17:34'),
(47, 'MIKARA S10 PLUS (B?C) - MICRO H�T KARAOKE K�M LOA BLUETOOTH CAO C?P', 'MIKARA S10 PLUS (B?C) - MICRO H�T KARAOKE K�M LOA BLUETOOTH CAO C?P', 'images/sanpham/micro/micro s10/0.jpg', NULL, 'Micro Karaoke Mikara S10 Plus l� m?t chi?c micro k�m loa c� thi?t k? hi?n �?i v� cao c?p. D?a tr�n nh?ng �u �i?m k? th?a t? ng�?i ti?n nhi?m S9 Pro k?t h?p v?i nh?ng �i?m m?i trong thi?t k? v� c�ng ngh? �m thanh, gi�p thi?t b? tr? n�n cao c?p h�n.', '', 1, NULL, '1490000', 'C�ng su?t loa: 3W x 2 (t�ch h?p 2 loa)', 2, 2, 1690000, '', NULL, 1, 0, 1, '2018-05-19 07:52:18', '2018-05-21 02:17:36'),
(48, 'MICRO KARAOKE BLUETOOTH 3 LOA MAILIAN M2S', 'MICRO KARAOKE BLUETOOTH 3 LOA MAILIAN M2S', 'images/sanpham/micro/micro m2s/0.jpg', NULL, 'Mailian M2S l� chi?c micro karaoke k�m loa bluetooth duy nh?t c� thi?t k? �?n 3 loa c�ng su?t l?n, v� th�m c?ng �m thanh 3.5 �? c?m ra loa ngo�i h�t c?c hay.', '', 1, NULL, '790000', ' C�ng su?t loa: 3W x 3 (t�ch h?p 3 loa)', 2, 2, 1290000, '', NULL, 1, 0, 1, '2018-05-19 08:00:59', '2018-05-21 02:17:39'),
(49, 'MICRO K�M LOA ZBX-66, MICRO H�T KARAOKE BLUETOOTH C?C HAY', 'MICRO K�M LOA ZBX-66, MICRO H�T KARAOKE BLUETOOTH C?C HAY', 'images/sanpham/micro/micro zbx66/0.jpg', NULL, 'Micro k�m loa ZBX-66 ch�nh h?ng h�t karaoke c?c hay tr�n �i?n tho?i, m�y t�nh b?ng hay Android TV Box,... b?n c� th? h�t karaoke c�ng b?n b� m?i l�c m?i n�i. Mic karaoke k�m loa ZBX-66 c� ki?u d�ng m?i, ph?n loa h?nh qu? t�o �?c ��o, m?i l?.\r\n\r\n \r\n\r\nVideo tr?i nghi?m h�t karaoke tr�n Micro K�m Loa ZBX-66', '', 1, NULL, '990000', 'K?t n?i: Bluetooth 3.0', 2, 2, 1390000, '', NULL, 1, 0, 0, '2018-05-19 08:00:59', '2018-05-21 02:17:42'),
(50, 'TUXUN K9 - MICRO H�T KARAOKE TR�N � T�, XE H�I', 'TUXUN K9 - MICRO H�T KARAOKE TR�N � T�, XE H�I', 'images/sanpham/micro/micro tuxunk9/0.jpg', NULL, 'Micro h�t Karaoke tr�n � t� Tuxun K9 ��?c thi?t k? theo c�ng ngh? truy?n d?n kh�ng d�y, ��?c thi?t l?p s?n c�c chu?n �m thanh Stereo ph?ng thu v? v?y Micro Tuxun K9 r?t nh?y b�n v?i gi?ng n�i v� c� �m s?c r?t trong tr?o. B?n c� th? s? d?ng micro h�t karaoke bluetooth Tuxun K9 l�n t?i 6h li�n t?c v?i pin Lithium s?c.', '�u �?i �p d?ng d�nh cho Qu? kh�ch h�ng mua nhi?u:\r\n\r\n- Mua 2 micro Tunxun K9 ��?c gi?m th�m 5%', 1, NULL, '990000', '�?u ra: 10mV (tai nghe).', 2, 2, 1990000, '', NULL, 1, 0, 0, '2018-05-19 08:04:52', '2018-05-21 02:17:44'),
(51, 'LOA X�CH TAY H�T KARAOKE W-KING K3 C?C HAY', 'LOA X�CH TAY H�T KARAOKE W-KING K3 C?C HAY', 'images/sanpham/loa/king k3/0.jpg', NULL, 'W-King K3 l� d?ng s?n ph?m loa h�t Karaoke ch?t l�?ng cao, ��?c trang b? b? vi x? l? �m thanh cao c?p, h? tr? x? l? Bass, Treble �?y �?. Kh�ng gi?ng nh� m?t s? lo?i loa k�o kh�c th�?ng ch? c� ch?nh �m l�?ng, echo (ti?ng vang), c?n khi nghe nh?c b?n s? kh�ng c?m th?y �? Bass, Treble c?a nh?c m� ch? th?y ti?ng vang to, d?n �?n c?m nh?n nghe �m thanh r?t d?.\r\n\r\nLoa c?a W-King K3 c� c�ng su?t 60 s? cho b?n c� c?m gi�c nh� �ang s? h?u 1 d�n �m thanh Karaoke cao c?p, t?t c? ��?c t�ch h?p trong 1 thi?t b? nh? g?n.', '', NULL, NULL, '2650000', 'Bluetooth 4.2', 4, 4, 3650000, '', NULL, 1, 0, 1, '2018-05-19 08:11:45', '2018-05-21 02:17:47'),
(52, 'LOA BLUETOOTH JBL CHARGE 3 (LO?I 1)', 'LOA BLUETOOTH JBL CHARGE 3 (LO?I 1)', 'images/sanpham/loa/jbl/0.jpg', NULL, 'Loa bluetooth JBL Charge 3 gi� r?, nghe nh?c c?c hay?, th�?ng th?c m� say', '', 1, NULL, '550000', '', 4, 4, 990000, '', NULL, 1, 0, 0, '2018-05-19 08:11:45', '2018-05-21 02:17:55'),
(53, 'LOA BLUETOOTH EWA A104 GI� T?T', 'LOA BLUETOOTH EWA A104 GI� T?T', 'images/sanpham/loa/a104/0.jpg', NULL, 'S?n ph?m LOA BLUETOOTH EWA A104 ��?c thi?t k? nh? g?n v?i k�ch th�?c si�u nh?. V? ��?c l�m b?ng ch?t li?u h?p kim nh�m.', '', 1, NULL, '190000', 'Dung l�?ng pin: 500mA', 4, 4, 350000, '', NULL, 1, 0, 1, '2018-05-19 08:16:20', '2018-05-21 02:17:58'),
(54, 'TAI NGHE BLUETOOTH W-KING S11', 'TAI NGHE BLUETOOTH W-KING S11', 'images/sanpham/loa/tainghe s11/0.jpg', NULL, 'W-king l� th��ng hi?u chuy�n s?n xu?t Loa v� Tai Nghe Bluetooth ch?t l�?ng cao v?i thi?t k? �?p. �?c bi?t thi?t k? c?a h?ng lu�n mang phong c�ch tr? trung, ti?n l?i, th�ch h?p v?i xu h�?ng c?a gi?i tr? v?i s? gia c�ng ho�n h?o �?n t?ng chi ti?t nh? nh?t.\r\n\r\n \r\n\r\nC�c m?u tai nghe Bluetooth ��?c �a th�ch hi?n nay c?a W-King �� l� S3, S11 v� S12, m?i m?u c� 1 thi?t k? kh�c nhau t�y theo s? th�ch c?a t?ng ng�?i d�ng. ? ��y ch�ng ta s? c�ng t?m hi?u v? thi?t k? c?a W-King S11, m?t trong nh?ng tai nghe th? thao c?a h?ng.', '', 1, NULL, '390000', '', 4, 4, 590000, '', NULL, 1, 0, 1, '2018-05-19 08:16:20', '2018-05-21 02:18:01'),
(55, 'B�N PH�M CHU?T BAY KM800V C� MIC (MX3 VOICE)', 'B�N PH�M CHU?T BAY KM800V C� MIC (MX3 VOICE)', 'images/sanpham/phukien/banphim km800v/0.jpg', NULL, 'B�n ph�m chu?t bay KM800V (MX3 voice) c� c?u t?o g?n gi?ng v?i lo?i KM800 (MX3) th�?ng, ��?c trang b? th�m Micro b�n trong �? ng�?i d�ng th?c hi?n t�nh n�ng Voice search.\r\n\r\nVideo ��nh gi� chi ti?t chu?t bay KM800 (MX3)', '', 1, NULL, '390000', 'Compatible with Windows 98/2000/ME/Vista/NT/XP/7, Android, Linux (DEBIAN-3.1, Redhat-9.0)', 5, 5, 690000, '', NULL, 1, 0, 1, '2018-05-19 08:34:03', '2018-05-21 02:18:04'),
(56, 'B�N PH�M CHU?T BAY KM800 PRO C� MIC VOICE SEARCH (MX3 PRO VOICE)', 'B�N PH�M CHU?T BAY KM800 PRO C� MIC VOICE SEARCH (MX3 PRO VOICE)', 'images/sanpham/phukien/banphim km800/0.jpg', NULL, 'B�n ph�m chu?t bay KM800 Pro (MX3 Pro) l� phi�n b?n n�ng c?p c?a b�n ph�m chu?t bay KM800 (MX3) v?i ��n LED n?n chi?u s�ng b�n d�?i c�c ph�m b?m gi�p ng�?i d�ng thao t�c khi v? ��m t?t h�n.\r\n\r\nChu?t bay KM800 Pro (MX3 Pro) hi?n nay ��?c r?t nhi?u ng�?i d�ng l?a ch?n v? s? thu?n ti?n v� d? s? d?ng c?a n�. V?a t�ch h?p chu?t kh�ng d�y, v?a t�ch h?p b�n ph�m trong m?t thi?t b? nh? g?n v� b?n c� th? c?m tr�n tay �? thao t�c d? d�ng.', '', 1, NULL, '450000', '', 5, 5, 990000, '', NULL, 1, 0, 0, '2018-05-19 08:38:08', '2018-05-21 02:18:07'),
(57, 'AIR MOUSE A1M - CHU?T BAY T?M KI?M B?NG GI?NG N�I CHO ANDROID TV BOX', 'AIR MOUSE A1M - CHU?T BAY T?M KI?M B?NG GI?NG N�I CHO ANDROID TV BOX', 'images/sanpham/phukien/chuotbay a1m/0.jpg', NULL, 'B? ��i chu?t bay kh�ng d�y Air Mouse A1M  v� Air Mouse A1  v?a ra m?t �?u n�m 2018 �? t?o n�n s? thu h�t l?n t? c?ng �?ng ng�?i Android TV Box. Air Mouse A1M thu h�t v? thi?t k? t?i gi?n �?p m?t c�ng t�ng m�u �en l?ch l?m. �i?m n?i b?t nh?t c?a Air Mouse A1M l� �? nh?y xu?t s?c c�ng t�nh n�ng t?m ki?m b?ng gi?ng n�i Voice Search �? ��?c t�ch h?p trong chi?c chu?t bay th? h? m?i n�y.', '', 1, NULL, '290000', '', 5, 5, 350000, '', NULL, 1, 0, 1, '2018-05-19 08:38:08', '2018-05-21 02:18:10'),
(58, 'TAY GAME TRONSMART MARS G01', 'TAY GAME TRONSMART MARS G01', 'images/sanpham/phukien/taygame/0.jpg', NULL, 'Tay Game Tronsmart Mars G01 2.4GHz Wireless Gamepad Cho Android TV BOX / PS3 / Tablet PC\r\n \r\n\r\nTronsmart Mars G01 l� tay game chuy�n d?ng ch�i GAME cho Android TV Box v� PC. Hi?n t?i Tronsmart G01 d?n �?u th? tr�?ng tay game nh? kh? n�ng t��ng th�ch ��?c v?i t?t c? n?n t?ng bao g?m c? giao di?n �i?u khi?n PS3 v� gi? l?p. K?t n?i ��?c v?i thi?t b? ch�i game d�ng n?n t?ng Android n�o nh� TV Box, TV Stick, Smartphone, M�y t�nh b?ng, ...). K?t n?i ��n gi?n ch? c?n Plug and Play trong v�i gi�y.', '', 2, NULL, '490000', '', 5, 5, 890000, '', NULL, 1, 0, 1, '2018-05-19 08:40:05', '2018-05-21 02:18:13'),
(59, 'TP-LINK TL-WA860RE - B? M? R?NG S�NG WIFI', 'TP-LINK TL-WA860RE - B? M? R?NG S�NG WIFI', 'images/sanpham/thietbi mang/tp link w860/0.jpg', NULL, 'TP-LINK TL-WA860RE - B? m? r?ng s�ng WiFi t?c �? 300Mbps cho d?ng AC �i qua\r\n \r\n\r\nB? m? r?ng s�ng WiFi TL-WA860RE c?a TP-LINK ��?c thi?t k? thu?n ti?n cho vi?c m? r?ng ph?m vi ph? s�ng v� t�ng c�?ng t�n hi?u c?a m?ng kh�ng d�y �? c� s?n nh?m lo?i b? \"�i?m ch?t\". V?i t?c �? chu?n N 300Mbps, n�t nh?n m? r?ng s�ng, k�ch th�?c nh? g?n v� thi?t k? g?n t�?ng, m? r?ng m?ng kh�ng d�y ch�a bao gi? d? d�ng �?n v?y. H�n n?a, c?ng Ethernet cho ph�p b? m? r?ng s�ng ho?t �?ng nh� m?t b? chuy?n �?i kh�ng d�y �? k?t n?i v?i c�c thi?t b? c� d�y.', '', 2, NULL, '635000', '', 6, 6, 890000, '', NULL, 1, 0, 1, '2018-05-19 08:44:54', '2018-05-21 02:18:15'),
(60, 'MERCURY MW302RE - B? K�CH S�NG WIFI T?C �? 300MBPS', 'MERCURY MW302RE - B? K�CH S�NG WIFI T?C �? 300MBPS', 'images/sanpham/thietbi mang/mercury/0.jpg', NULL, 'Hi?n t?i, Hieuhien.vn cung c?p th�m d?ng s?n ph?m m?i t?t h�n v?i giao di?n ti?ng Anh d? c�i �?t v� s? d?ng. Xem ngay:\r\n\r\n? B? k�ch s�ng Wifi t?c �? 300Mbps Mercusys MW300RE', '', 2, NULL, '190000', '', 6, 6, 250000, '', NULL, 1, NULL, 0, '2018-05-19 08:44:54', '2018-05-19 08:44:54'),
(61, 'TP-LINK M7200 - B? PH�T WIFI DI �?NG 4G LTE\r\n1242 l�?t xem', 'TP-LINK M7200 - B? PH�T WIFI DI �?NG 4G LTE\r\n1242 l�?t xem', 'images/sanpham/thietbi mang/tp link m7200/0.jpg', NULL, 'TP-Link M7200 - B? Ph�t WiFi Di �?ng 4G LTE\r\nTP-Link M7200 - B? Ph�t WiFi Di �?ng 4G LTE ? Ch? c?n g?n SIM v� m? ngu?n, b?n c� th? s? d?ng Wi-Fi ? b?t c? n�i ��u ? V?i TP-Link M7200 b?n d? d�ng chia s? k?t n?i 4G/3G c�ng l�c cho 10 thi?t b? v� c� th? s? d?ng 8 ti?ng li�n t?c v?i dung l�?ng Pin l�n �?n 2000mAh ? Mua b? ph�t wifi 4G TP-Link M7200 ch�nh h?ng, gi� r? t?i Hieuhien.vn ? Li�n h? 0918778013 ? Giao h�ng to�n qu?c.\r\nNh?ng t�nh n�ng n?i b?t c?a B? Ph�t WiFi 4G TP-Link M7200\r\n- Chia s? k?t n?i Internet v?i b?n b� l�n t?i 10 thi?t b? c�ng l�c\r\n\r\n- Pin s?c 2000mAh cho 8 ti?ng s? d?ng li�n t?c\r\n- H? tr? c�ng ngh? 4G FDD/TDD-LTE m?i nh?t\r\n- Qu?n l? d? d�ng v� ��n gi?n v?i ?ng d?ng tpMiFi', '', 2, NULL, '1300000', '', 6, 6, 1500000, '', NULL, 1, NULL, 1, '2018-05-19 08:49:19', '2018-05-19 08:49:19'),
(62, 'HUAWEI E5573CS-609 - B? PH�T WIFI 4G GI� R?, T?C �? 150MBPS', 'HUAWEI E5573CS-609 - B? PH�T WIFI 4G GI� R?, T?C �? 150MBPS', 'images/sanpham/thietbi mang/huawei/0.jpg', NULL, 'B? ph�t wifi 4G Huawei E5573Cs-609 l� phi�n b?n s?n xu?t d�nh ri�ng cho nh� m?ng Airtel c?a ?n �?. Tuy nhi�n Router WiFi 4G Huawei E5573Cs-609 kh�ng b? kh�a m?ng m� c� th? s? d?ng v?i h?u h?t c�c nh� m?ng tr�n th? gi?i, t? �?ng nh?n �i?n c?u h?nh 3G/4G c?a tr�n 500 nh� m?ng tr�n th? gi?i.\r\nB? ph�t wifi 4G gi� r? Huawei E5573Cs-609 c� t?c �? download t?i �a l� 150Mbps, t?c �? upload t?i �a l� 50Mbps.\r\nHuawei E5573Cs-609 trang b? Wifi chu?n 802.11 b/g/n, b?o m?t WPA/WPA-PSK, h? tr? k?t n?i �?ng th?i 10 thi?t b?.\r\nRouter WiFi 4G Huawei E5573Cs-609 x�i pin c� th? th�o r?i 1500mAh, tuy kh�ng l?n nh�ng v?i c�ng ngh? ti?t ki?m �i?n n�ng c?a Huawei n�n v?n �?m b?o cho 5-6 gi? l�m vi?c li�n t?c. Th?i gian ch? l�n �?n 300 gi?. S? d?ng c?ng s?c 5V-1A ph? bi?n hi?n nay.', '', 1, NULL, '990000', '', 6, 6, 1390000, '', NULL, 1, NULL, 0, '2018-05-19 08:49:19', '2018-05-19 08:49:19'),
(63, 'PIN S?C D? PH?NG 20.000MAH - REMAX RPL 58', 'PIN S?C D? PH?NG 20.000MAH - REMAX RPL 58', 'images/sanpham/sac du phong/remax 2000/0.jpg', NULL, 'Pin s?c d? ph?ng Remax RPL 58 20000mAh c� thi?t k? g?n �?p, d? d�ng mang �i khi di chuy?n. Dung l�?ng pin l?n 20000mAh gi�p b?n d? tr? n�ng l�?ng b�n m?nh m?i l�c m?i n�i. C� th? s?c ��?c 7-10 l?n cho nh?ng d?ng �i?n tho?i 2-3000mAh.', '', 2, NULL, '490000', 'Dung l�?ng: 20000mAh\r\n�i?n th?: 5V/1A\r\n�?u ra: 5V/2,4A (Max)', 7, 7, 690000, '', NULL, 1, NULL, 1, '2018-05-19 08:56:46', '2018-05-19 08:56:46'),
(64, 'PIN S?C D? PH?NG KH�NG D�Y CHU?N QI - 10.000 MAH', 'PIN S?C D? PH?NG KH�NG D�Y CHU?N QI - 10.000 MAH', 'images/sanpham/sac du phong/qi/0.jpg', NULL, 'Pin S?c D? Ph?ng  Kh�ng D�y Chu?n QI Dung L�?ng 10.000 mAh\r\n \r\n\r\nNg�y nay v?i s? ph�t tri?n m?nh m? c?a c�ng ngh? �i?n t? hi?n nay vi?c s? d?ng �i?n tho?i hay m�y t�nh b?ng l� nhu c?u c?n thi?t r?t quan tr?ng �?i v?i m?i ng�?i. V? v?y �i k�m v?i c�c thi?t b? th�ng minh n�y th? ph? ki?n �i k�m c?ng xu?t hi?n nhi?u h�n v?i c�c th��ng hi?u kh�c nhau. M?t trong nh?ng s?n ph?m ��?c xem l� ngu?n s?ng kh�ng th? thi?u c?a �i?n tho?i th�ng minh hay m�y t�nh b?ng hi?n nay �� l� s?c d? ph?ng kh�ng d�y. ��y l� m?t trong nh?ng ph? ki?n h?u nh� l� kh�ng th? thi?u v?i thi?t k? g?n nh?, s?c pin nhanh h�n, ti?n l?i, d? d�ng s? d?ng v� thu?n ti?n di chuy?n ? b?t c? ��u.', 'C?ng v�o c� d�y: DC 5V == 2A, c?ng v�o kh�ng d�y: 5V == 750mA', 2, NULL, '580000', '', 7, 7, 980000, '', NULL, 1, NULL, 1, '2018-05-19 08:56:46', '2018-05-19 08:56:46'),
(65, 'PIN S?C D? PH?NG ASPOR A386 12000MAH', 'PIN S?C D? PH?NG ASPOR A386 12000MAH', 'images/sanpham/sac du phong/a386/0.jpg', NULL, 'Pin s?c d? ph?ng Aspor A386\r\nPin s?c d? ph?ng Aspor A386 s? h?u dung l�?ng 12.000mAh gi�p b?n c� th? tho?i m�i s?c cho chi?c Smartphone c?a m?nh trong nhi?u l?n. V?i Aspor A386, b?n c� th? tho?i m�i �i ra ngo�i trong nhi?u gi?, nhi?u ng�y m� kh�ng s? h?t pin �i?n tho?i.', '', 2, NULL, '320000', '', 7, 7, 450000, '', NULL, 1, NULL, 0, '2018-05-19 08:59:47', '2018-05-19 09:00:59'),
(66, NULL, NULL, 'images/sanpham/sac du phong/a373/0.jpg', NULL, 'PIN S?C D? PH?NG ASPOR A373 6000MAH', '', 1, NULL, '250000', '', 7, 7, 350000, '', NULL, 1, NULL, 0, '2018-05-19 08:59:47', '2018-05-19 08:59:47'),
(67, 'MICRO THU �M ISK AT100 - MIC H�T KARAOKE, H�T LIVE STREAM � MIC HOA VINH', 'MICRO THU �M ISK AT100 - MIC H�T KARAOKE, H�T LIVE STREAM � MIC HOA VINH', 'images/sanpham/mic thu am/at100/0.jpg', NULL, '', '', 1, NULL, '950000', '', 3, 3, 1290000, '', NULL, 1, 0, 0, '2018-06-05 02:51:18', '2018-06-05 02:55:17'),
(68, 'MICRO THU �M TAKSTAR PC-K320', 'MICRO THU �M TAKSTAR PC-K320', 'images/sanpham/mic thu am/k320/0.jpg', NULL, 'Takstar PC-K320 - Micro Thu �m Chuy�n Nghi?p, Mic H�t Karaoke, LiveStream\r\n\r\nMicro thu �m Takstar PC-K320 l� micro condenser (�i?n dung) hi?u su?t cao, ��p ?ng t?n s? r?ng, �m thanh r? r�ng v� t? nhi�n. Mic thu �m Takstar PC K320 ��?c s? d?ng r?ng r?i trong c�c b?n thu �m gi?ng h�t, b?n ghi �m nh?c, thu �m c� nh�n, ch��ng tr?nh radio v� h�t karaoke online, h�t live stream.', '', 2, NULL, '1490000', '12-52V �i?n phantom', 3, 3, 1890000, '', NULL, 1, 0, 0, '2018-06-05 03:01:42', '2018-06-05 03:01:42'),
(69, 'SOUND CARD THU �M V8, CARD �M THANH H�T KARAOKE, LIVE STREAM', 'SOUND CARD THU �M V8, CARD �M THANH H�T KARAOKE, LIVE STREAM', 'images/sanpham/mic thu am/sound v8/0.jpg', NULL, 'Sound Card Thu �m V8, Card �m Thanh H�t Karaoke, Live Stream\r\n \r\n\r\nSound card thu �m V8 l� s?n ph?m card �m thanh t��ng th�ch v?i nhi?u thi?t b? nh� �i?n tho?i smartphone, m�y t�nh b?ng, laptop, PC. Sound card V8 h? tr? 12 hi?u ?ng �m thanh s?ng �?ng, �i k�m l� r?t nhi?u tinh ch?nh �m thanh �?u v�o, gi�p c�ng vi?c h�t karaoke c� nh�n hay thu �m c?a b?n tr? n�n d? d�ng h�n. \r\n\r\n�?c bi?t Sound card thu �m gi� r? V8 ��?c trang b? pin dung l�?ng 1000mah, c� th? s? d?ng 12h li�n t?c, th?c s? l� 1 n�ng c?p x?ng ��ng so v?i c�c s?n ph?m c�ng lo?i khi h?u h?t ph?i h?y ngu?n �i?n tr?c ti?p. Gi? ��y b?n c� th? mang Soundcard V8 khi �i du l?ch, thu �m v� h�t Karaoke, Livestream ? b?t c? ��u.\r\nVideo m? h?p v� ��nh gi� Sound card thu �m gi� r? V8 - H�t karaoke, h�t live stream\r\n<iframe allow=\"autoplay; encrypted-media\" allowfullscreen=\"\" frameborder=\"0\" height=\"450\" src=\"https://www.youtube.com/embed/FD4RNt_BiIo?rel=0\" width=\"800\"></iframe>', '', 2, NULL, '950000', '', 3, 3, 1200000, '', NULL, 1, 0, 0, '2018-06-05 03:01:42', '2018-06-05 03:01:42'),
(70, 'COMBO SOUND CARD XOX K10 V� MICRO ISK AT100', 'COMBO SOUND CARD XOX K10 V� MICRO ISK AT100', 'images/sanpham/mic thu am/xox k10/0.jpg', NULL, 'Sound Card XOX K10 l� card �m thanh �a n�ng c?a XOX, cung c?p cho b?n m?t gi?i ph�p ��n gi?n, g?n nh? v?i �m thanh ch?t l�?ng cao (24-bit), k?t n?i tr?c ti?p v?i m�y t�nh qua c?ng USB. Sound Card XOX K10 ��?c thi?t k? �? h�t karaoke online, h�t live stream, thu �m gi?ng h�t, nghe nh?c, chat skype v� tr? chuy?n tr?c tuy?n.\r\nVideo h�?ng d?n s? d?ng Sound Card XOX K10 - d�ng cho micro thu �m, h�t karaoke, h�t Livestream\r\n<iframe allowfullscreen=\"\" frameborder=\"0\" gesture=\"media\" height=\"450\" src=\"https://www.youtube.com/embed/epPmxK82IXk?rel=0\" style=\"margin: 0px; padding: 0px;\" width=\"800\"></iframe>', '', 2, NULL, '1650000', '', 3, 3, 1890000, '', NULL, 1, 0, 0, '2018-06-05 03:04:28', '2018-06-05 03:04:28');

-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `thongtincty`
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
-- C?u tr�c b?ng cho b?ng `user`
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
-- �ang �? d? li?u cho b?ng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hoten`, `dienthoai`, `email`, `status`, `level`) VALUES
(1, 'cuong', '123456', 'C�?ng', '01638716085', 'cuong@gmail.com', 1, 1),
(4, 'tan', '123456', 'T�n', '01238860500', 'tan@gmail.com', 1, 1),
(5, 'huy', '123456', 'huy', '01639485317', 'duy@gmail.com', 1, 1),
(6, 'test', '123456', 'ahihi', '01883088812', 'ahihi@gmail.com', 1, 1),
(7, 'khanh', '123456', 'Kh�nh', '0123456789', 'khanh@gmail.com', 1, 1);


-- --------------------------------------------------------

--
-- C?u tr�c b?ng cho b?ng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orthernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �ang �? d? li?u cho b?ng `video`
--

INSERT INTO `video` (`id`, `title`, `link`, `orthernum`, `status`) VALUES
(1, 'mibox 4k vinh v?t v? 2019', 'https://www.youtube.com/watch?v=IkBeINhkc70', 11, 0),
(2, 'V?t V?| ��nh gi� FPT Play Box 2018', 'https://www.youtube.com/watch?v=BgNUaSOPwp4', 3, 1),
(3, 'Schannel - M? h?p v� ��nh gi� Clip TV Box', 'https://www.youtube.com/watch?v=9HtlrPMkwDE', 3, 1),
(4, 'khanh t�ng', 'fb.com/khanhtungmtp', 10, 1);

--
-- Ch? m?c cho c�c b?ng �? �?
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
-- AUTO_INCREMENT cho c�c b?ng �? �?
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
