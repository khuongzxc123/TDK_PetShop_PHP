-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tdk_petshop
CREATE DATABASE IF NOT EXISTS `tdk_petshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tdk_petshop`;

-- Dumping structure for table tdk_petshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `CateName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.category: ~2 rows (approximately)
DELETE FROM `category`;
INSERT INTO `category` (`Id`, `CateName`) VALUES
	(1, 'Chó'),
	(2, 'Mèo'),
	(3, 'Chuột');

-- Dumping structure for table tdk_petshop.chitiethoadon
CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `HoaDonId` varchar(256) NOT NULL,
  `ProductId` int NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`),
  KEY `HoaDonId` (`HoaDonId`),
  CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`),
  CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`HoaDonId`) REFERENCES `hoadon` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.chitiethoadon: ~18 rows (approximately)
DELETE FROM `chitiethoadon`;
INSERT INTO `chitiethoadon` (`Id`, `HoaDonId`, `ProductId`, `Quantity`) VALUES
	(13, '640d682e00835', 1, 3),
	(14, '640d682e00835', 3, 3),
	(15, '640d682e00835', 5, 3),
	(16, '640d7f0d0fe5b', 1, 4),
	(17, '640d7f0d0fe5b', 2, 2),
	(18, '640d7f0d0fe5b', 8, 2),
	(19, '641035dbd732f', 1, 1),
	(20, '641035dbd732f', 2, 1),
	(21, '641035dbd732f', 3, 1),
	(22, '6415d128484fc', 1, 1),
	(23, '6415d128484fc', 2, 1),
	(24, '6415d128484fc', 3, 1),
	(25, '6415d128484fc', 6, 1),
	(26, '6415d128484fc', 5, 1),
	(27, '6415d128484fc', 4, 1),
	(28, '6415d128484fc', 7, 1),
	(29, '6415d128484fc', 8, 1),
	(30, '6415d128484fc', 9, 1),
	(31, '6415d1da9dfd3', 1, 1);

-- Dumping structure for table tdk_petshop.hoadon
CREATE TABLE IF NOT EXISTS `hoadon` (
  `Id` varchar(256) NOT NULL,
  `Day` datetime NOT NULL,
  `UserId` int NOT NULL,
  `Total` int NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.hoadon: ~5 rows (approximately)
DELETE FROM `hoadon`;
INSERT INTO `hoadon` (`Id`, `Day`, `UserId`, `Total`, `Address`) VALUES
	('640d682e00835', '2023-03-12 05:50:38', 1, 1260000, '100 Bùi Viện'),
	('640d7f0d0fe5b', '2023-03-12 07:28:13', 2, 1000000, '107/11 Bùi Viện'),
	('641035dbd732f', '2023-03-14 08:52:43', 2, 450000, '100 Trần Hưng Đạo'),
	('6415d128484fc', '2023-03-18 14:56:40', 1, 1595000, '100/25/35b trần hưng đạo'),
	('6415d1da9dfd3', '2023-03-18 21:59:38', 1, 100000, '100/25/35b trần hưng đạo');

-- Dumping structure for table tdk_petshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL DEFAULT '0',
  `Price` int NOT NULL DEFAULT '0',
  `Image` varchar(256) NOT NULL DEFAULT '0',
  `Quantity` int NOT NULL DEFAULT '0',
  `Unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `CategoryId` int NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  KEY `CategoryId` (`CategoryId`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.product: ~8 rows (approximately)
DELETE FROM `product`;
INSERT INTO `product` (`Id`, `Name`, `Price`, `Image`, `Quantity`, `Unit`, `CategoryId`) VALUES
	(1, 'Benefits', 100000, '6404d04f85384.jpg', 90, 'Hộp', 1),
	(2, 'Biolin', 200000, '6404d9458f292.png', 96, 'Hộp', 1),
	(3, 'Smart Heart', 150000, '6404da4a0c058.jpg', 95, 'Hộp', 1),
	(4, 'Premium', 120000, '6404da5baa3b3.png', 99, 'Hộp', 1),
	(5, 'Royal Cannin', 170000, '64057c3a425f3.png', 96, 'Hộp', 1),
	(6, 'Pedigree', 155000, '64057cb26c53a.png', 99, 'Hộp', 1),
	(7, 'Happy Dog', 200000, '6406c7a2e5c43.png', 99, 'Hộp', 1),
	(8, 'Ganador', 100000, '6409469d8df5a.jpg', 97, 'Bịch', 1),
	(9, 'ME-O', 400000, '6415258fabda5.png', 99, 'Bịch', 2);

-- Dumping structure for table tdk_petshop.role
CREATE TABLE IF NOT EXISTS `role` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.role: ~2 rows (approximately)
DELETE FROM `role`;
INSERT INTO `role` (`Id`, `Name`) VALUES
	(1, 'Admin'),
	(2, 'User');

-- Dumping structure for table tdk_petshop.roleuser
CREATE TABLE IF NOT EXISTS `roleuser` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserId` int DEFAULT '0',
  `RoleId` int DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `RoleId` (`RoleId`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `roleuser_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`),
  CONSTRAINT `roleuser_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.roleuser: ~1 rows (approximately)
DELETE FROM `roleuser`;
INSERT INTO `roleuser` (`Id`, `UserId`, `RoleId`) VALUES
	(1, 1, 1);

-- Dumping structure for table tdk_petshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `Pass` varchar(256) DEFAULT NULL,
  `FullName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'no name',
  `Avata` varchar(256) DEFAULT 'default_avata.png',
  `RoleId` int DEFAULT '2',
  `Token` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`Id`, `UserName`, `Pass`, `FullName`, `Avata`, `RoleId`, `Token`, `Email`, `Status`) VALUES
	(1, 'khuongzxc123', '$2y$10$uAo06Dorh2Ly05zjMyTGb.OjTix8OOJDAETybUKSlhmIHqRGZOKbG', 'Trần Văn Khương', '640feb4cac3f6.png', 1, NULL, NULL, 0),
	(2, 'hugoloc1005', '$2y$10$uNFB71jyBccU70tjFfQeOeika3Jh9Az8oDx4KW0.VB5aO1petuWmK', 'Thú Ăn Tái', '6406f990ab24c.png', 2, '393266', 'hugoloc1005@gmail.com', 1),
	(3, 'hugoloc1003', '$2y$10$gFPi.yW4K88u6yZ245JD4u53DVyGqa.i5LjyF0JhIOg9GPYHY3UCW', 'Trần Văn Khương', '6406fcb2b13f6.jpg', 2, '536489', 'hugoloc1003@gmail.com', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
