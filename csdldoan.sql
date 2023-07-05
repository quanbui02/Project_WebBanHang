-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 05, 2023 lúc 12:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdldoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `fbID` int(10) NOT NULL,
  `fbContent` varchar(50) NOT NULL,
  `fbTime` datetime(6) NOT NULL,
  `userID` int(10) NOT NULL,
  `proID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`fbID`, `fbContent`, `fbTime`, `userID`, `proID`) VALUES
(5, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 25, 45),
(6, 'quần dày dặn, đánh giá chất lượng tốt', '2023-07-05 00:00:00.000000', 25, 46),
(7, 'váy xinh xỉu', '2023-07-05 00:00:00.000000', 25, 58),
(8, 'chân váy đẹp, vải dày', '2023-07-05 00:00:00.000000', 25, 61),
(9, 'tốt lắm', '2023-07-05 00:00:00.000000', 25, 60),
(10, 'áo form rộng', '2023-07-05 00:00:00.000000', 25, 78),
(11, 'chất dày dặn, không bị xù', '2023-07-05 00:00:00.000000', 25, 79),
(12, 'mặc mát', '2023-07-05 00:00:00.000000', 25, 68),
(13, 'bộ mặc mát', '2023-07-05 00:00:00.000000', 25, 69),
(14, 'váy đẹp xỉu', '2023-07-05 00:00:00.000000', 25, 83),
(15, 'chất dày dặn, mặc lên đúng form luôn', '2023-07-05 00:00:00.000000', 25, 53),
(16, 'áo form rông', '2023-07-05 00:00:00.000000', 25, 89),
(17, 'vải mỏng, mặc lên người mát ', '2023-07-05 00:00:00.000000', 25, 90),
(18, 'áo chất', '2023-07-05 00:00:00.000000', 25, 91),
(19, 'đẹp lắm!!!', '2023-07-05 00:00:00.000000', 25, 92),
(20, 'đẹp lắmmm', '2023-07-05 00:00:00.000000', 25, 93),
(21, 'tốt lắm', '2023-07-05 00:00:00.000000', 30, 45),
(22, 'quần ok', '2023-07-05 00:00:00.000000', 30, 46),
(23, 'quần mặc mát', '2023-07-05 00:00:00.000000', 30, 55),
(24, 'quần đẹp', '2023-07-05 00:00:00.000000', 30, 56),
(25, 'chân váy đẹp, vải dày', '2023-07-05 00:00:00.000000', 30, 51),
(26, 'váy xinh xỉu', '2023-07-05 00:00:00.000000', 30, 59),
(27, 'vải dày dặn, mặc lên người mát', '2023-07-05 00:00:00.000000', 30, 74),
(28, 'váy xinh xỉu', '2023-07-05 00:00:00.000000', 30, 75),
(29, 'chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 76),
(30, 'váy đẹp lắm', '2023-07-05 00:00:00.000000', 30, 77),
(31, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 60),
(32, 'áo xịn', '2023-07-05 00:00:00.000000', 30, 78),
(33, 'áo form rông, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 79),
(34, 'áo rộng quá', '2023-07-05 00:00:00.000000', 30, 80),
(35, 'đẹp lắm!!!', '2023-07-05 00:00:00.000000', 30, 63),
(36, 'okkkk', '2023-07-05 00:00:00.000000', 30, 64),
(37, 'set này đẹp lắm nha', '2023-07-05 00:00:00.000000', 30, 82),
(38, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 68),
(39, 'bộ mặc mát', '2023-07-05 00:00:00.000000', 30, 69),
(40, 'okkkk', '2023-07-05 00:00:00.000000', 30, 83),
(41, 'bộ mặc mát, đẹp lắm', '2023-07-05 00:00:00.000000', 30, 85),
(42, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 53),
(43, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 87),
(44, 'áo đẹp, chất lượng tốt', '2023-07-05 00:00:00.000000', 30, 88),
(45, 'okkkk', '2023-07-05 00:00:00.000000', 30, 90),
(46, 'áo form rông', '2023-07-05 00:00:00.000000', 30, 91),
(47, 'áo đẹp, vải dày', '2023-07-05 00:00:00.000000', 30, 92),
(48, 'mặc mát', '2023-07-05 00:00:00.000000', 30, 93);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `giftID` int(10) NOT NULL,
  `giftValue` int(10) NOT NULL,
  `giftContent` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giftcode`
--

INSERT INTO `giftcode` (`giftID`, `giftValue`, `giftContent`, `quantity`, `active`) VALUES
(1, 0, 'KHONGCOGIC', 2222, b'1'),
(2, 30000, 'pcwyu4fe1h', 4, b'0'),
(3, 30000, 'mdyg9460kp', 9, b'1'),
(4, 30000, 'yat2en15sm', 10, b'0'),
(5, 30000, 'na98vkcql1', 10, b'1'),
(6, 30000, '4n60bmo8f7', 9, b'1'),
(7, 30000, '5aigf78vjh', 10, b'0'),
(8, 30000, '7fuzma502i', 7, b'0'),
(9, 30000, 'b34goui86k', 10, b'0'),
(10, 30000, 'bvu79sj51z', 10, b'0'),
(11, 30000, '3ac1fby58l', 10, b'1'),
(12, 30000, 'v6pg81r2zo', 10, b'0'),
(13, 25000, 'ndwraomh53', 5, b'0'),
(14, 2312312, 'mgabt0rlsy', 12, b'1'),
(15, 25000, 'sljkap5mf0', 5, b'1'),
(16, 12500, 'bpgfsm5c1z', 10, b'1'),
(17, 400000, '5kczumqgo2', 3, b'1'),
(18, 500000, 'ojht9dnr05', 10, b'1'),
(19, 600000, 'dbmc1wahgx', 40, b'1'),
(20, 300000, '9bcj32ew08', 30, b'1'),
(21, 300000, '3q9g2xpera', 50, b'1'),
(22, 400000, 'vyldwhok04', 10, b'1'),
(23, 400000, 'cqh5l7fb84', 10, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_product`
--

CREATE TABLE `group_product` (
  `grID` int(10) NOT NULL,
  `grName` varchar(50) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `group_product`
--

INSERT INTO `group_product` (`grID`, `grName`, `active`) VALUES
(28, 'quần đùi', b'1'),
(29, 'chân váy', b'1'),
(31, 'quần jeans', b'1'),
(32, 'đầm/váy', b'1'),
(33, 'áo khoác', b'1'),
(34, 'vest', b'1'),
(36, 'hoodie và áo nỉ', b'0'),
(37, 'bộ', b'1'),
(38, 'đồ ngủ', b'1'),
(39, 'đồ tập', b'0'),
(40, 'đồ bầu', b'0'),
(43, '  quần dài ', b'0'),
(45, 'áo ba lỗ', b'0'),
(47, 'áo sơ mi', b'1'),
(48, 'áo thun', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `idProduct`, `image`) VALUES
(1, 8, 'hinh-anh-giay-vans-9.jpg'),
(2, 8, 'images.jpg'),
(3, 8, 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(4, 9, 'hinh-anh-giay-vans-9.jpg'),
(5, 9, 'images.jpg'),
(6, 9, 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(7, 10, 'adam-1.jpg'),
(8, 10, 'ao-nike-chinh-hang-1634291599.jpg'),
(9, 10, 'ao-thun-nike-sportswear-swoosh-dc5095-010-mau-den-size-l-61dd2afbf3d98-11012022140011.png'),
(10, 10, 'ao-thun-the-thao-nam-nike-dri-fit-2020-cuc-dep.jpg'),
(11, 11, 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(12, 12, 'images.jpg'),
(13, 12, 'Quần âu.jpg'),
(14, 12, 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(27, 16, '4550344416068_1260 (1).webp'),
(28, 16, '4550344416068_1260.webp'),
(38, 8, 'áo khoác dù 2.PNG'),
(39, 8, 'áo khoác dù 3.PNG'),
(40, 8, 'áo khoác dù 4.PNG'),
(41, 8, 'áo khoác dù 5.PNG'),
(42, 25, 'croptop4.PNG'),
(43, 25, 'croptop3.PNG'),
(44, 25, 'áo croptop2.PNG'),
(45, 26, 'xám chì 2.PNG'),
(46, 26, 'xám chì1.PNG'),
(47, 45, 'áo khoác dù 4.PNG'),
(48, 45, 'áo khoác dù 5.PNG'),
(49, 45, 'áo khoác dù.PNG'),
(50, 46, 'quandui1.PNG'),
(51, 46, 'quandui2.PNG'),
(52, 46, 'quandui4.PNG'),
(53, 47, 'vest2.PNG'),
(54, 47, 'vest3.PNG'),
(55, 47, 'vest4.PNG'),
(56, 48, 'kaki2.PNG'),
(57, 48, 'kaki3.PNG'),
(58, 49, 'jean2.PNG'),
(59, 49, 'jean3.PNG'),
(60, 50, 'váy2.PNG'),
(61, 50, 'vay3.PNG'),
(62, 50, 'vay4.PNG'),
(63, 51, 'new2.PNG'),
(64, 51, 'new3.PNG'),
(65, 52, 'năng2.PNG'),
(66, 52, 'năng3.PNG'),
(67, 53, 'somi1.PNG'),
(68, 53, 'somi2.PNG'),
(69, 54, 'dui2.PNG'),
(70, 54, 'dui3.PNG'),
(71, 54, 'dui4.PNG'),
(72, 55, ''),
(73, 56, 'dui7.PNG'),
(74, 56, 'dui8.PNG'),
(75, 57, ''),
(76, 58, ''),
(77, 59, 'vay2.PNG'),
(78, 59, 'vay3.PNG'),
(79, 60, 'khoacden2.PNG'),
(80, 61, 'chanvay2.PNG'),
(81, 61, 'chanvay3.PNG'),
(82, 62, 'cv1.PNG'),
(83, 63, 'vest2.PNG'),
(84, 63, 'vest3.PNG'),
(85, 64, 'v2.PNG'),
(86, 64, 'v3.PNG'),
(87, 65, 'bo2.PNG'),
(88, 65, 'bo3.PNG'),
(89, 66, 'bongda2.PNG'),
(90, 67, 'longcuu2.PNG'),
(91, 67, 'longcuu3.PNG'),
(92, 68, ''),
(93, 47, 'vestnam.PNG'),
(94, 47, 'vestnam2.PNG'),
(95, 47, 'vestnam3.PNG'),
(96, 69, 'bnamnu2.PNG'),
(97, 69, 'bnamnu3.PNG'),
(98, 70, 'bonam2.PNG'),
(99, 63, 'vestghi.PNG'),
(100, 63, 'vestghi2.PNG'),
(101, 71, 'bo2.PNG'),
(102, 71, 'bo3.PNG'),
(103, 71, 'bo4.PNG'),
(104, 72, 'chuthap2.PNG'),
(105, 72, 'chuthap3.PNG'),
(106, 73, 'rach2.PNG'),
(107, 74, 'damnhun2.PNG'),
(108, 74, 'damnhun3.PNG'),
(109, 75, 'hoa2.PNG'),
(110, 75, 'hoa3.PNG'),
(111, 76, 'damnau2.PNG'),
(112, 77, 'cobeo1.PNG'),
(113, 78, 'khoacbo2.PNG'),
(114, 78, 'khoacbo3.PNG'),
(115, 79, 'trang2.PNG'),
(116, 79, 'trang3.PNG'),
(117, 79, 'trang4.PNG'),
(118, 80, 'chosse2.PNG'),
(119, 81, ''),
(120, 82, 'hong2.PNG'),
(121, 83, 'dam3.PNG'),
(122, 84, 'ngu2.PNG'),
(123, 85, 'ngu2.PNG'),
(124, 86, 'ngu2.PNG'),
(125, 87, 'hoahong2.PNG'),
(126, 87, 'hoahong3.PNG'),
(127, 88, 'xanhtr1.PNG'),
(128, 88, 'xanhtr2.PNG'),
(129, 89, 'somitrang2.PNG'),
(130, 89, 'somitrang3.PNG'),
(131, 90, 'xanhbo1.PNG'),
(132, 91, 'aophong2.PNG'),
(133, 91, 'aophong3.PNG'),
(134, 92, 'xamchi2.PNG'),
(135, 93, 'thuntrang3.PNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `orderID` int(10) NOT NULL,
  `orderDate` datetime(6) NOT NULL,
  `userID` int(10) NOT NULL,
  `giftID` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`orderID`, `orderDate`, `userID`, `giftID`, `status`) VALUES
(30, '2023-05-23 08:19:34.000000', 24, 1, 'payed'),
(32, '2023-05-23 11:10:45.000000', 25, 1, 'confirm'),
(33, '2023-05-23 16:25:16.000000', 26, 1, 'destroy'),
(34, '2023-05-23 19:30:30.000000', 26, 1, 'completed'),
(35, '2023-05-23 14:11:40.000000', 27, 1, 'confirm'),
(36, '2023-05-23 10:15:32.000000', 30, 1, 'CANCEL'),
(37, '2023-05-23 19:22:10.000000', 30, 1, 'completed'),
(38, '2023-05-23 05:33:21.000000', 29, 1, 'completed'),
(39, '2023-05-23 10:40:13.000000', 29, 1, 'confirm'),
(40, '2023-06-29 10:38:19.000000', 25, 1, 'completed'),
(41, '2023-06-29 05:24:19.000000', 25, 1, 'confirm'),
(42, '2023-06-29 18:38:22.000000', 32, 1, 'payed'),
(43, '2023-06-29 13:31:14.000000', 32, 1, 'payed'),
(44, '2023-06-29 09:35:20.000000', 27, 1, 'payed'),
(45, '2023-06-29 11:31:15.000000', 27, 1, 'payed'),
(46, '2023-06-29 16:24:25.000000', 26, 1, 'completed'),
(47, '2023-06-29 14:21:31.000000', 26, 1, 'confirm'),
(48, '2023-06-29 10:27:39.000000', 28, 1, 'payed'),
(49, '2023-06-29 06:24:31.000000', 28, 1, 'completed'),
(50, '2023-06-29 09:30:31.000000', 28, 1, 'payed'),
(51, '2023-06-29 12:22:21.000000', 29, 1, 'confirm'),
(52, '2023-06-29 09:29:29.000000', 29, 1, 'payed'),
(53, '2023-07-05 00:00:00.000000', 25, 1, 'cart'),
(54, '2023-07-05 00:00:00.000000', 30, 1, 'cart');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `detailID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `number` int(3) NOT NULL,
  `prID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`detailID`, `orderID`, `number`, `prID`) VALUES
(21, 30, 1, 45),
(22, 30, 1, 48),
(23, 30, 1, 49),
(24, 30, 1, 53),
(25, 30, 1, 54),
(30, 32, 2, 46),
(31, 32, 1, 47),
(32, 32, 2, 49),
(33, 33, 3, 48),
(34, 33, 2, 47),
(35, 34, 1, 46),
(36, 34, 1, 45),
(37, 35, 1, 53),
(38, 35, 1, 48),
(39, 35, 1, 49),
(40, 36, 1, 50),
(41, 36, 1, 51),
(42, 36, 1, 52),
(43, 37, 1, 50),
(44, 38, 1, 48),
(45, 38, 1, 51),
(46, 39, 1, 52),
(47, 40, 1, 46),
(48, 40, 1, 47),
(49, 41, 3, 53),
(50, 41, 2, 55),
(51, 41, 1, 56),
(52, 42, 3, 46),
(53, 43, 2, 45),
(54, 44, 1, 45),
(55, 44, 1, 48),
(56, 45, 1, 53),
(57, 45, 1, 56),
(58, 46, 2, 55),
(59, 46, 2, 56),
(60, 47, 4, 49),
(61, 48, 2, 50),
(62, 48, 1, 51),
(63, 49, 1, 52),
(64, 50, 1, 48),
(65, 50, 1, 51),
(66, 51, 1, 50),
(67, 51, 1, 51),
(68, 52, 1, 48),
(69, 53, 1, 45),
(70, 53, 1, 52),
(71, 54, 1, 46);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `proID` int(10) NOT NULL,
  `grID` int(10) NOT NULL,
  `proName` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `size` varchar(5) NOT NULL,
  `color` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `active` bit(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`proID`, `grID`, `proName`, `price`, `quantity`, `size`, `color`, `description`, `active`, `image`) VALUES
(8, 33, 'áo dù 2 lớp vải mero phối 3 màu siêu chất', 95000, 2023, 'M', 'Đen trắng', 'Chất liệu: cotton\r\nMẫu: họa tiết\r\nPhong cách: Hàn Quốc\r\nXuất xứ: Việt Nam\r\nGửi từ: TP. Hồ Chí Minh\r\nCác Bạn Tham Khảo Size Bên Shop Nhá Đâm Bảo Uy tín Có Size S< M L XL :\r\nSize 3xs Dưới 20kg\r\nSize : S Từ 39kg Đến 45kg _ Cao 1m40 Đến 1m50\r\nSize M Từ 45kg Đến 55kg _ Cao 1m50 Đến 1m60\r\nSize L Từ 55kg Đến 60kg _Cao 1m60 Đến 1m65\r\nSIze Xl Từ 60kg Đến 75kg _ Cao 1m65 Đến 1m75\r\nXuất xứ: VIỆT NAM\r\nTay bo dài phủ 1 phần tay, hình In Rõ Nét Hàng Cao Cấp Nhé', b'0', 'áo khoác dù.PNG'),
(25, 45, 'áo croptop ba lỗ nữ sát nách thun', 100000, 100, 'S', 'trắng', 'Áo croptop ba lỗ nữ  sát nách  thun không tay kiểu ôm body tank top vải cotton co giãn tốt milow fecret loại 1\r\n\r\nÁo Croptop Ba Lỗ ngược trơn 2 Áo kiểu nữ ôm chất thun gân mềm mát \r\n\r\n- Áo croptop là phụ kiện không thể thiếu trong tủ đồ của các nàng, vừa mát mẻ lại cứ diện vào là “xinh hết nấc”\r\n- Áo thiết kế dáng dáng ôm quyến rũ, vải mềm mại và thoáng mát tuyệt đối\r\n-Áo có thể kết hợp với quần jean, chân váy mang đến sự trẻ trung, năng động hay kết hợp với áo vest, áo khoác thu đông cũng rất hợp \r\n', b'0', 'áo croptop.PNG'),
(26, 36, 'áo khoác nỉ chữ  The Noah màu xám chì, form rộng', 220000, 498, 'L', 'Xám chì', 'THÔNG TIN SẢN PHẨM: Áo hoodie logo chữ The Noah form rộng\r\n- Màu sắc:Xanh  Than, Nâu, Đen\r\n- Size: 40 -65Kg\r\n- Chất liệu:  Nỉ cotton mũ 2 lớp\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n- Chât vải 100% từ sợi Cotton hoặc từ các sợi có độ bền màu cao từ\r\nthương nhiên .\r\n-Thấm hút mồ hôi và thoải mái ko gò bó khi vận động và luông giữ form dáng\r\ntheo năm tháng', b'0', 'xám chì 4.PNG'),
(43, 45, 'áo polo', 200000, 4, 'M', 'đỏ', 'chất lượng tốt hàng đẹp', b'0', 'tay.jpg'),
(45, 33, 'áo khoác gió lông cừu', 199999, 1227, 'M', 'đen', 'chưa có', b'1', 'áo khoác dù 2.PNG'),
(46, 28, 'Quần đùi nam vải xốp dập nổi mẫu mới hot nhất 2023', 350000, 89, 'L', 'trắng, đen', '- Đường may tinh tế, chỉn chu, khéo léo\r\n- Màu sắc đa dạng, trẻ trung\r\n- Chất lượng sản phẩm tốt, giá cả hợp lý', b'1', 'quandui3.PNG'),
(47, 34, 'Áo Vest Nam Cổ Đức tay lỡ ', 309000, 481, 'M', 'trắng,đen', '- Áo Vest Nam Ít nhăn, ít nhàu, vải đứng form.Chất vải đẹp, không xù lông, không phai màu. Áo Vest Nam có kiểu dáng: Thiết kế theo form ôm body trẻ trung lịch lãm\r\n', b'0', 'vestnam1.PNG'),
(48, 31, 'Quần jean túi hộp nam nữ màu nâu', 249999, 655, 'M', 'nâu', '- Dáng quần túi hộp hiphop ống suông rộng nâu trẻ thỏa mái tạo nên form  xuông quần túi hôp cargo pant cạp chun ống rộng cho người mặc túi quần lớn rất thuận tiện cho việc đựng smart phone hoặc ví cỡ bự.', b'1', 'kaki1.PNG'),
(49, 31, 'Quần jean nam ống rộng rêu rách - phong cách', 500000, 4990, 'S', 'xanh rêu', 'Dáng quần jean trẻ trung tạo nên form cực chuẩn cho người mặc.4 túi quần lớn rất thuận tiện cho việc đựng smart phone hoặc ví, 1 túi nhỏ. \r\n', b'1', 'jean1.PNG'),
(50, 32, 'Váy Nữ Buộc Cổ Khóa Lưng Dáng Ngắn Ngang Đùi 2 Màu', 450000, 353, 'M', 'đen, trắng', 'Váy buộc cổ khóa lưng\r\nChất liệu : Thô 1 lớp', b'0', 'vay1.PNG'),
(51, 32, 'Váy Cổ Yếm, Đầm Trắng Chất Xốp In Hoa 2 Kiểu Dáng ', 453000, 395, 'S', 'trắng', 'Miêu tả: váy tiểu thư, chất xốp in hoa 2 kiểu dáng xoè, tay bồng siu xinh️.  Màu sắc nhã nhặn; thực sự phù hợp để đi làm, đi chơi. ', b'1', 'new1.PNG'),
(52, 33, 'Áo khoác chống nắng nữ ', 324999, 496, 'S', 'xanh', 'Vải Nhật cao cấp có chất chống tia UV cực tím rất tốt,kiêm chất làm mát cơ thể.', b'1', 'năng1.PNG'),
(53, 47, 'Áo sơ mi cộc tay nam vải lụa ', 1000000, 1994, 'L', 'đen', 'chưa có', b'1', 'somi3.PNG'),
(54, 28, 'Quần Đùi Nam 4 kẻ ngang', 89000, 4999, 'M', 'ghi, đen', 'Quần đùi thể thao unisex  được thiết kế theo đúng form chuẩn của nam giới Việt Nam. Sản phẩm Quần thể thao Nam chính là mẫu thiết kế mới nhất cho mùa hè này\r\n\r\n', b'1', 'dui1.PNG'),
(55, 28, 'quần đùi nam thể thao chạy viền thời trang', 290000, 2996, 'M', 'xanh biển', 'CHất liệu: Thun LOẠI 1 co GIÃN 4 chiều cao cấp\r\nMàu vải quần short nam được nhuộm kỹ đảm bảo KHÔNG RA MÀU khi giặt. Đường may tinh tế sắc sảo, form chuẩn.', b'1', 'dui5.PNG'),
(56, 28, 'Quần đùi nam sọc', 150000, 3596, 'L', 'đen,trắng', 'Quần đùi nam phong cách trẻ trung thoáng mát cho ngày hè năng động\r\n\r\nChiếc quần không thể thiếu trong mùa hè nóng bức , dễ mặc dễ phối đồ phù hợp cả nam ', b'1', 'dui6.PNG'),
(58, 29, 'Đầm dự tiệc nơ cổ dài tay xinh xẻo', 349999, 3000, 'M', 'trắng', 'Đầm form cực xinh lun trẻ trung nhưng vẫn kín đáo diện đi chơi, đi làm, hẹn hò đều xinh sang xịn mịn 😋\r\nChất liệu: dạ phối voan\r\nMàu: đen phối trắng, trắng phối trắng', b'1', 'váyvoan1.PNG'),
(59, 32, 'Váy 2 Dây Nhún Ngực Dáng Xoè Màu Trắng', 550000, 2500, 'M', 'trắng', '', b'1', 'vay1.PNG'),
(60, 33, 'áo khoác nam, nữ sọc tay thời trang', 565999, 500, 'L', 'đen', 'Chất liệu: VẢI POLY cao cấp\r\nDÀY DẶN + MỊN + MÁT+THỜI TRANG\r\nLoại 1 co giãn mặc thoải mái khi duy chuyển,vận động.\r\nĐặc biệt không ra màu khi giặt,thoải mái khi giặt máy', b'1', 'khoacden1.PNG'),
(61, 29, 'Chân Váy Cony Xẻ Đùi Co Giãn Tốt', 245000, 5000, 'M', 'đen', '', b'1', 'chanvay1.PNG'),
(62, 29, 'Chân váy xếp ly dưới 2 tầng kiểu dáng hàn quốc ', 150000, 3570, 'M', 'đen', 'Chân váy xếp ly dưới 2 tầng kiểu dáng hàn quốc ulzzang có quần bên trong lưng cao tennis ngắn dáng xòe', b'1', 'cv2.PNG'),
(63, 34, 'Áo vest nam họa tiết kẻ', 987000, 300, 'M', 'ghi khói', 'Kiểu dáng trẻ trung - lịch lãm - sang trọng, không chỉ giành riêng cho các quý ông thành đạt mà còn phù hợp với các chàng trai trẻ đang đi tìm cho mình 1 phong thái đĩnh đạc, nam tính.\r\n\r\n', b'1', 'vestghi1.PNG'),
(64, 34, 'Áo vest cổ hai ve khoét chữ V nam', 1356000, 456, 'L', 'đen', 'Áo vest cổ hai ve khoét chữ V. Tay dài có 4 khuy. Có 1 túi trước ngực, 2 vuông có nắp 2 bên, có 3 túi lót bên trong. Có 2 khuy cài mặt trước. Xẻ tà 2 bên phía sau.\r\nÁo vest cổ hai ve khoét chữ V. Tay dài có 4 khuy.', b'1', 'v1.PNG'),
(65, 37, 'Bộ Quần Áo Thun Nam In Họa Tiết Chữ UMKLSU Tinh Tế', 539999, 450, 'M', 'trắng', 'Bộ Quần Áo Thun Nam Hottrend In Họa Tiết Chữ UMKLSU Tinh Tế Thời Trang Zenkonam MEN QA 129.Kiểu dáng gọn nhẹ, năng động.Chất vải thun mềm mại, dễ thấm hút mồ hôi', b'0', 'bo1.PNG'),
(66, 37, 'Quần áo bóng đá câu lạc bộ, bộ quần áo bóng đá', 110000, 500, 'L', 'xanh đen', '', b'1', 'bongda1.PNG'),
(68, 38, 'Đồ Bộ Pijama Lụa Nữ Mặc Nhà Tay Ngắn Quần Đùi ', 168999, 269, 'M', 'hồng', 'Thiết kế thời trang phù hợp xu hướng hiện nay. Áo được thiết kế chuẩn form, đường may sắc xảo, thấm hút mồ hôi tạo sự thoải mái khi mặc', b'1', 'namnu2.PNG'),
(69, 38, 'Đồ ngủ nam nữ ', 230000, 450, 'M', 'đen, đỏ', '', b'1', 'bnamnu1.PNG'),
(70, 37, 'Đồ bộ cho nam phối chữ trắng', 119999, 350, 'M', 'đen', '', b'1', 'bonam1.PNG'),
(71, 31, 'Quần Baggy Trơn Ống Suông Đứng - Chất Vải Jeans ', 497999, 540, 'M', 'xanh nhạt', 'Vải Denim, Hai Túi Trước, Hai Túi Sau, Một Túi Nhỏ\r\n', b'1', 'bo1.PNG'),
(72, 31, 'Quần jean chữ thập trắng ống suông rộng', 148999, 367, 'L', 'đen, trắng', '', b'1', 'chuthap1.PNG'),
(73, 31, 'Quần jean nam rách gối màu xanh chất bò cao cấp', 99000, 545, 'M', 'xanh', 'Kiểu Dáng: quần jean baggy dành cho nam. Màu sắc: xanh blue. Chất liệu: jean cao cấp, không phai màu', b'1', 'rach1.PNG'),
(74, 32, 'Đầm trễ vai, váy đi tiệc nữ', 156000, 467, 'S', 'đen, trắng', 'Đường may cẩn thận, chắc chắn. Màu sắc trang nhã, dễ phối kết hợp đồ.\r\n', b'1', 'damnhun1.PNG'),
(75, 32, 'Đầm hoa nhí nữ tay ngắn, đầm midi dáng xòe, váy xò', 230000, 678, 'S', 'ghi', '', b'1', 'hoa1.PNG'),
(76, 32, 'Đầm tiểu thư cổ vuông, đầm nữ dáng váy xòe ', 89000, 300, 'M', 'nâu', 'Đường may cẩn thận, chắc chắn. Màu sắc trang nhã, dễ phối kết hợp đồ.', b'1', 'damnau1.PNG'),
(77, 32, 'Đầm tiểu thư cổ bèo, đầm nữ chữ A', 88999, 520, 'M', 'nâu', 'Vải đẹp, không co rút, mềm mịn, mặc siêu mát.', b'1', 'cobeo2.PNG'),
(78, 33, 'Áo Khoác Nam Dài Tay Cổ Bẻ Thời Trang Hàn', 399000, 450, 'M', 'xanh nhạt', 'chưa có', b'1', 'khoacbo1.PNG'),
(79, 33, 'Áo khoác lông Nam Nữ ,Hàng Quảng Châu', 320000, 5400, 'L', 'trắng', 'Hàng quảng châu. Nam nữ đều mặc được, chất vải dày dặn không xù lông', b'1', 'trang1.PNG'),
(80, 33, 'Áo Khoác Bomber Vải Nhung', 612000, 430, 'L', 'kem', 'Độ bền màu cao, giúp form áo luôn ổn định. (không như các áo chợ, chỉ giặt vài lần là bị chảy xệ, vặn vẹo, biến dạng). Đường may chắc chắn chuẩn đẹp.', b'1', 'chosse1.PNG'),
(81, 34, 'Vest Vàng Bò Nam Thời Trang', 1200000, 329, 'L', 'vàng bò', 'Bộ Veston Vàng Bò là dòng sản phẩm cao cấp, được thiết kế, may đo theo xu hướng hiện đại, trẻ trung,kiểu dáng body khoẻ khoắn.', b'1', 'vangbo1.PNG'),
(82, 34, 'Set Bộ Áo Vest Phối 2 Nút Cài & Quần Đùi Ngắn ', 520460, 50, 'S', 'hồng', 'Bộ Vest thiết kế cực xinh thích hợp cho các bạn gái mặc dự tiệc, đi chơi, dạo phố cùng bạn bè, mặc  đến công sở hay các buổi hẹn hò.', b'1', 'hong1.PNG'),
(83, 38, 'Váy ngủ cộc tay đầm ngủ dáng suông chất cotton mềm', 69000, 430, 'M', 'xanh lam', 'Chất liệu thun mềm, phom váy ngủ sát nách suông nhẹ không gò bó, cực kì thoải mái.Váy để mặc nhà vừa lịch sự, trẻ trung, thoải mái', b'1', 'dam1.PNG'),
(84, 38, 'Bộ đồ ngủ ngắn tay mùa hè phù hợp với phụ nữ mùa h', 164800, 540, 'M', 'trắng ', '', b'0', 'ngu1.PNG'),
(85, 38, 'Bộ đồ ngủ ngắn tay mùa hè phù hợp với nữ', 164800, 540, 'M', 'trắng ', '', b'1', 'ngu1.PNG'),
(86, 38, 'Bộ đồ ngủ ngắn tay mùa hè phù hợp với phụ nữ mùa h', 164800, 540, 'M', 'trắng ', '', b'0', 'ngu1.PNG'),
(87, 47, 'Áo Sơ Mi Tay Ngắn Họa Tiết Tranh Sơn Dầu', 161000, 320, 'M', 'hồng', '', b'1', 'hoahong1.PNG'),
(88, 47, 'Áo Sơ Mi Ngắn Tay Dáng Rộng In Hình Gấu Dễ Thương ', 134000, 430, 'S', 'trắng', '', b'1', 'xanhtr3.PNG'),
(89, 47, 'Áo sơ mi ngủ dáng rộng màu trắng thời trang', 194999, 340, 'M', 'trắng', '', b'1', 'somitrang1.PNG'),
(90, 48, 'Áo thun phông nữ nam 3158 tay lỡ form rộng', 89399, 290, 'M', 'xanh lá', 'áo phông 3158 hay t-shirt là chiếc áo cổ tròn và được may bằng vải cotton theo kiểu dáng rất cơ bản', b'1', 'xanhbo2.PNG'),
(91, 48, 'Áo Phông Rộng Nam Nữ Tay Lỡ', 189000, 329, 'L', 'đen', 'Chất liệu: thun co giãn, vải mềm, vải mịn, thoáng mát. Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.', b'1', 'aophong1.PNG'),
(92, 48, 'Áo thun phông unisex nam nữ in chữ PURESSO ', 177999, 654, 'M', 'xám chì', '', b'1', 'xamchi1.PNG'),
(93, 48, 'Áo thun baby tee trơn màu trắng', 320000, 487, 'L', 'trắng', 'Kích thước: áo freesize 38 - 58 kg. Chất liệu: Thun', b'1', 'thuntrang1.PNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `birth` datetime(6) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `pass`, `position`, `fullName`, `birth`, `address`, `email`, `phone`, `active`) VALUES
(1, 'anhduyy', '12345678', 'Thành viên', 'Nguyễn Duy Anh', '2002-06-17 21:43:47.000000', 'Hải Phòng ', 'duyanh123@gmail.com', '0772209215', b'0'),
(2, 'duyanh', '170602', 'Thành viên', 'Nguyễn Anh Duy', '0000-00-00 00:00:00.000000', 'Hải phòng', 'duyanhhihi@gmail.com', '0904520719', b'0'),
(14, 'quanbui', '12345678', 'Admin', 'Quân', '0000-00-00 00:00:00.000000', '', '', '0941254910', b'1'),
(17, 'anhhihihoho', '1234', 'Admin', 'Phạm ánh', '2002-06-11 14:55:44.000000', 'HD', 'phamanh1106@gmail.com', '0973056842', b'1'),
(18, 'anhhihihaha', '1234', 'Admin', 'Phạm ánh1', '2002-06-11 14:55:44.000000', 'HD', 'phamanh1106@gmail.com', '0973056842', b'1'),
(19, 'anhhehehoho', '1234', 'Admin', 'Phạm Ánh', '2002-06-11 14:55:44.000000', 'Hải dương', 'phamanh1106@gmail.com', '0973056842', b'1'),
(20, 'anhhihihoho1', '1234', 'Admin', 'Phạm ánh3', '2002-06-11 14:55:44.000000', 'HD', 'phamanh1106@gmail.com', '0973053789', b'1'),
(21, 'anhhihihoho2', '1234', 'Admin', 'Phạm ánh4', '2002-06-11 14:55:44.000000', 'HD', 'phamanh1106@gmail.com', '0972893842', b'1'),
(22, 'anhhihihoho3', '1234', 'Admin', 'Phạm ánh5', '2002-06-11 14:55:44.000000', 'HD', 'phamanh1106@gmail.com', '0970218842', b'1'),
(24, 'duyanh12345', '123456789', 'Thành viên', 'Duy Anh Nguyễn', '2002-06-16 14:55:44.000000', 'Hà Nội ', 'anhnguyen@gmail.com', '0973056842', b'1'),
(25, 'trungph', '123456789', 'Thành viên', 'Phan Hữu Trung', '2002-05-17 14:55:44.000000', 'Hà Nội  ', 'trungph@gmail.com', '0973056844', b'1'),
(26, 'quanbui', '123456789', 'Thành viên', 'Bùi Hồng Quân', '2002-03-03 14:55:44.000000', 'Hà Nội  ', 'quanbui@gmail.com', '0973056845', b'1'),
(27, 'luongpham', '123456789', 'Thành viên', 'Phạm Hùng Lương', '2002-11-11 14:55:44.000000', 'Hà Nội  ', 'luongpham@gmail.com', '0973056846', b'1'),
(28, 'anhpham123', '123456789', 'Thành viên', 'Phạm Thị Ánh', '2002-06-11 14:55:44.000000', 'Bắc Giang ', 'anhpham123@gmail.com', '0973056847', b'1'),
(29, 'bichbui', '123456789', 'Thành viên', 'Bùi Thị Ngọc Bích', '2002-12-12 14:55:44.000000', 'Hà Nội  ', 'bichbui@gmail.com', '0973056848', b'1'),
(30, 'anhpham', '123456789', 'Thành viên', 'Ánh Phạm', '2002-04-04 00:00:00.000000', '52 phố vọng   ', 'anhpham@gmail.com', '0398388436', b'1'),
(31, 'trungph', 'trungph', 'Admin', 'Phan Hữu Trung', '1986-11-19 11:26:08.000000', 'Đống Đa, Hà Nội', 'trungph123@gmail.com', '0398388423', b'1'),
(32, 'duyanh', '123456789', 'Thành viên', 'Duy Anh', '2002-07-07 00:00:00.000000', 'Hải phòng ', 'duyanh123@gmai.com', '0398388123', b'1'),
(33, 'luongph', '123456789', 'Thành viên', 'Lương Phạm', '2002-05-05 00:00:00.000000', '55 giải phóng', 'luongph@gmail.com', '0398388456', b'1'),
(35, 'trungph', '123456789', 'Thành viên', '', '0000-00-00 00:00:00.000000', '', '', '0398388489', b'1'),
(36, 'anhpham', '123456789', 'Thành viên', '', '0000-00-00 00:00:00.000000', '', '', '0398388436', b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbID`),
  ADD KEY `proID` (`proID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`giftID`);

--
-- Chỉ mục cho bảng `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`grID`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `giftID` (`giftID`),
  ADD KEY `uID` (`userID`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `prID` (`prID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`),
  ADD KEY `grID` (`grID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `giftID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `group_product`
--
ALTER TABLE `group_product`
  MODIFY `grID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `proID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `proID` FOREIGN KEY (`proID`) REFERENCES `product` (`proID`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `giftID` FOREIGN KEY (`giftID`) REFERENCES `giftcode` (`giftID`),
  ADD CONSTRAINT `uID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `prID` FOREIGN KEY (`prID`) REFERENCES `product` (`proID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `grID` FOREIGN KEY (`grID`) REFERENCES `group_product` (`grID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
