-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdldoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbID` int(10) NOT NULL,
  `fbContent` varchar(50) NOT NULL,
  `fbTime` datetime(6) NOT NULL,
  `userID` int(10) NOT NULL,
  `proID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fbID`, `fbContent`, `fbTime`, `userID`, `proID`) VALUES
(2, 'Sanr pham tot 10 diem', '2023-05-04 21:22:48.000000', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE `giftcode` (
  `giftID` int(10) NOT NULL,
  `giftValue` int(10) NOT NULL,
  `giftContent` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giftcode`
--

INSERT INTO `giftcode` (`giftID`, `giftValue`, `giftContent`, `quantity`, `active`) VALUES
(1, 15000, 'KHONGCOGIC', 2222, b'0'),
(2, 30000, 'pcwyu4fe1h', 2, b'0'),
(3, 30000, 'mdyg9460kp', 10, b'1'),
(4, 30000, 'yat2en15sm', 10, b'1'),
(5, 30000, 'na98vkcql1', 10, b'1'),
(6, 30000, '4n60bmo8f7', 10, b'1'),
(7, 30000, '5aigf78vjh', 10, b'1'),
(8, 30000, '7fuzma502i', 7, b'0'),
(9, 30000, 'b34goui86k', 10, b'0'),
(10, 30000, 'bvu79sj51z', 10, b'0'),
(11, 30000, '3ac1fby58l', 10, b'0'),
(12, 30000, 'v6pg81r2zo', 10, b'0'),
(13, 25000, 'ndwraomh53', 5, b'0'),
(14, 2312312, 'mgabt0rlsy', 12, b'1'),
(15, 25000, 'sljkap5mf0', 5, b'1'),
(16, 12500, 'bpgfsm5c1z', 10, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `group_product`
--

CREATE TABLE `group_product` (
  `grID` int(10) NOT NULL,
  `grName` varchar(50) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_product`
--

INSERT INTO `group_product` (`grID`, `grName`, `active`) VALUES
(27, 'Quần short', b'1'),
(28, 'Giày dép', b'1'),
(29, 'Áo phông', b'1'),
(31, 'ao khoac', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_products`
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
(15, 13, ''),
(16, 0, ''),
(17, 15, ''),
(18, 16, ''),
(19, 17, ''),
(20, 18, ''),
(21, 0, ''),
(22, 0, ''),
(23, 0, ''),
(24, 22, ''),
(25, 23, ''),
(26, 24, ''),
(27, 16, '4550344416068_1260 (1).webp'),
(28, 16, '4550344416068_1260.webp');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(10) NOT NULL,
  `orderDate` datetime(6) NOT NULL,
  `userID` int(10) NOT NULL,
  `giftID` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `orderDate`, `userID`, `giftID`, `status`) VALUES
(2, '2023-05-15 00:00:00.000000', 1, 1, 'cart');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detailID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `number` int(3) NOT NULL,
  `prID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detailID`, `orderID`, `number`, `prID`) VALUES
(2, 2, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`proID`, `grID`, `proName`, `price`, `quantity`, `size`, `color`, `description`, `active`, `image`) VALUES
(8, 28, 'ultraboots', 999999, 19, '40', 'Đen', 'Giày fake nhé\r\n', b'0', 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(9, 28, 'Giay Adidas StandSmith', 1200000, 20, '41', 'Trang xanh', 'Giay cua adidas', b'0', 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(10, 28, 'Quan dui mua he', 120000, 20, 'XL', 'do', 'asdasda', b'0', 'ao-thun-nike-sportswear-swoosh-dc5095-010-mau-den-size-l-61dd2afbf3d98-11012022140011.png'),
(11, 28, 'Giay Vansds', 799999, 20, '41', 'Do, trang, den', 'sdasdas', b'0', 'top-nhung-doi-giay-vans-dang-mua-nhat-nam-2021.4.jpg'),
(12, 27, 'đấ', 12312, 12312, '32131', '32131', '312312', b'0', 'hinh-anh-giay-vans-9.jpg'),
(13, 27, 'ewqeqw', 123123, 12, '41', '31232131', '32131231', b'0', 'ao-nike-chinh-hang-1634291599.jpg'),
(15, 29, 'ưeq32312', 321312, 31231, '3123', '321', '3123', b'0', 'ao-thun-nike-sportswear-swoosh-dc5095-010-mau-den-size-l-61dd2afbf3d98-11012022140011.png'),
(16, 29, 'Áo phông', 120000, 20, 'XL', 'trắng, đỏ, xanh', 'Không', b'0', 'ao-nike-chinh-hang-1634291599.jpg'),
(17, 27, 'Giay Vansds', 123123, 231312, '31231', '321312', '32131', b'0', ''),
(18, 31, '31231231', 321312, 312312, '31231', '321312', '31312', b'0', ''),
(22, 28, '21312', 12312300, 312321, '21312', '312312', '321312', b'0', ''),
(23, 27, 'ewqeqweq', 1231230, 3213123, '31312', '321321', '321312', b'0', ''),
(24, 28, '321312', 312312, 1123, '1321', '312312', '31231', b'0', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `pass`, `position`, `fullName`, `birth`, `address`, `email`, `phone`, `active`) VALUES
(1, 'bexuanmailonton', '12345678', 'Thành viên', 'Nguyễn Duy Anh', '2002-06-17 21:43:47.000000', 'Hải Phòng', 'duyanh123@gmail.com', '0772209215', b'1'),
(2, 'duyanh', '170602', 'Thành viên', 'Nguyễn Anh Duy', '0000-00-00 00:00:00.000000', 'Hải phòng', 'duyanhhihi@gmail.com', '0904520719', b'1'),
(13, 'navivodich', '17062002', 'Thành viên', '', '0000-00-00 00:00:00.000000', '', '', '0123456789', b'1'),
(14, 'quanbui', '12345678', 'Admin', 'Quân', '0000-00-00 00:00:00.000000', '', '', '0941254910', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbID`),
  ADD KEY `proID` (`proID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`giftID`);

--
-- Indexes for table `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`grID`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `giftID` (`giftID`),
  ADD KEY `uID` (`userID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `prID` (`prID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`),
  ADD KEY `grID` (`grID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `giftID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `group_product`
--
ALTER TABLE `group_product`
  MODIFY `grID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `proID` FOREIGN KEY (`proID`) REFERENCES `product` (`proID`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `giftID` FOREIGN KEY (`giftID`) REFERENCES `giftcode` (`giftID`),
  ADD CONSTRAINT `uID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `prID` FOREIGN KEY (`prID`) REFERENCES `product` (`proID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `grID` FOREIGN KEY (`grID`) REFERENCES `group_product` (`grID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
