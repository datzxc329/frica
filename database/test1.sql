-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 04:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idLSP` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idLSP`, `name`) VALUES
(1, 'computers'),
(2, 'man_clothes'),
(3, 'woman_clothes'),
(4, 'phone'),
(5, 'camera'),
(6, 'watch'),
(7, 'kitchen'),
(8, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idLH` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idLH`, `name`, `email`, `phone`, `message`) VALUES
(15, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'vgegqwf'),
(16, 'vinh', 'phamtiendat1900@gmail.com', '0855352809', 'fwaawf'),
(17, 'g3g', 'nongnguyen769@gmail.com', '1245251752', 'q3g'),
(22, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'agaeg'),
(23, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(24, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(25, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(26, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(27, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'q3gq3gqw3'),
(28, 'rru', '1ghcth@gmail.com', '1245251752', '2136\r\n'),
(29, 'rru', '1ghcth@gmail.com', '1245251752', 'fawtgaw'),
(30, 'siu', 'phamtiendat1900@gmail.com', '0855352809', 'gatg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idDH` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idDH`, `name`, `email`, `address`, `phone`, `total_price`, `date`, `status`) VALUES
(1, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 300000, '2023-10-09 10:58:36', 'Đã giao'),
(2, 'gegtwt142142', 'fwaafw@gmail.com', 'gaeasg', 1245251752, 1520000, '2023-10-09 11:11:44', NULL),
(3, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 4000000, '2023-10-10 16:49:32', NULL),
(4, 'edgew', 'fwaafw@gmail.com', '54646', 1245251752, 12300000, '2023-10-11 08:57:34', NULL),
(5, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 12300000, '2023-10-11 08:59:55', NULL),
(6, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 12300000, '2023-10-11 09:06:54', NULL),
(7, 'vưegqwf', 'phamtiendat80@gmail.com', 'qưgqw', 2147483647, 12000000, '2023-10-13 04:00:48', NULL),
(8, 'vưegqwf', 'phamtiendat80@gmail.com', 'qưgqw', 2147483647, 12000000, '2023-10-13 04:12:24', NULL),
(9, 'vưegqwf', 'phamtiendat80@gmail.com', 'qưgqw', 2147483647, 12000000, '2023-10-13 04:12:34', NULL),
(10, 'edgew', 'fwaafw@gmail.com', '54646', 1245251752, 20000000, '2023-10-13 04:14:12', NULL),
(11, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 12480000, '2023-10-13 04:17:24', NULL),
(12, 'vưegqwf', 'phamtiendat80@gmail.com', 'qưgqw', 2147483647, 12000000, '2023-10-13 04:19:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `idCTDH` int(11) NOT NULL,
  `idDH` int(11) DEFAULT NULL,
  `idSP` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `units_price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`idCTDH`, `idDH`, `idSP`, `quantity`, `unit_price`, `units_price`) VALUES
(1, 1, 3, 2, 150000, 300000),
(2, 2, 6, 2, 400000, 800000),
(3, 2, 4, 3, 240000, 720000),
(4, 3, 8, 1, 4000000, 4000000),
(5, NULL, NULL, NULL, 12000000, 12000000),
(6, NULL, NULL, NULL, 150000, 300000),
(7, NULL, NULL, NULL, 12000000, 12000000),
(8, NULL, NULL, NULL, 12000000, 12000000),
(9, NULL, NULL, NULL, NULL, 20000000),
(10, NULL, NULL, NULL, 12000000, 12000000),
(11, NULL, NULL, NULL, 240000, 480000),
(12, NULL, NULL, NULL, 12000000, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idSP` int(11) NOT NULL,
  `idLSP` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idSP`, `idLSP`, `name`, `price`, `quantity`, `description`, `img`) VALUES
(1, 1, 'Laptop HP', 10200000, 2, 'vjvjfv', 'hp1.png'),
(2, 1, 'Laptop Dell', 12000000, 2, '53464', 'dell1.png'),
(4, 3, 'Áo khoác nữ', 240000, 11, 'gưgg32g', 'woman1.png'),
(5, 1, 'Laptop HP vechai', 8000000, 15, 'wqfw', 'hp1.png'),
(6, 2, 'Áo khoác nam', 400000, 33, 'agfagw', 'man1.png'),
(7, 4, 'Samsung', 10000000, 11, 'ưgawtgf', 'mobile1.png'),
(8, 5, 'Camera X', 4000000, 22, 'gheghe', 'camera1.png'),
(9, 6, 'Watch gfeta', 10200000, 34, 'ehdygey', 'watch1.png'),
(10, 4, 'Samsung atwtwt', 14000000, 72, 'deyseyesyesy', 'mobile1.png'),
(11, 5, 'Camera Y', 5000000, 54, 'gaegeyety', 'camera1.png'),
(12, 6, 'Watch Z', 2700000, 17, 'jrdjtgruij', 'watch1.png'),
(13, 7, 'Kitchen X', 560000, 24, 'drdrurdud', 'kitchen1.png'),
(14, 7, 'Kitchen Y', 1200000, 23, 'gygawye', 'kitchen2.png'),
(15, 7, 'Kitchen Z', 1425000, 31, 'seyhsysy', 'kitchen3.png'),
(16, 8, 'Sport X', 680000, 12, 'julhjluoku', 'sport1.png'),
(17, 8, 'Sport Y', 710000, 14, 'dtsetysy', 'sport2.png'),
(18, 8, 'Sport Z', 943000, 15, 'mygkygi', 'sport3.png'),
(19, 3, 'Áo khoác gheyhgetg', 570000, 11, 'rkititurd', 'woman1.png'),
(20, 1, 'Laptop A', 12000000, 11, 'dhyhsey', 'dell1.png'),
(21, 1, 'Laptop B', 13000000, 12, 'jtdjuu', 'dell1.png'),
(22, 1, 'Laptop C', 12500000, 13, 'shre4q24', 'dell1.png'),
(23, 1, 'Laptop D', 13500000, 14, 'reu5reu5', 'dell1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `name`, `phone`, `email`, `address`) VALUES
(40, 'test1', '$2y$10$bbIIuT2FeR5iW0NleD19YOWHtro/s8gBz8sQ9EyhyBhsVPVTIW1ai', 'rru', 1245251752, '1ghcth@gmail.com', 't3t'),
(41, 'test2', '$2y$10$oJvv5Hd1OjpXA5DlocUZ0u5QDhCx/GqTe8qT7hhy7apjmvE8Tsct.', 'rru', 1245251752, '1ghcth@gmail.com', 't3t');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idLSP`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idLH`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idDH`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`idCTDH`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idSP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idLSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `idCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
