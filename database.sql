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

-- Dumping structure for table tdk_petshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL DEFAULT '0',
  `Price` int NOT NULL DEFAULT '0',
  `Image` varchar(256) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.product: ~6 rows (approximately)
DELETE FROM `product`;
INSERT INTO `product` (`Id`, `Name`, `Price`, `Image`) VALUES
	(1, 'Benefit', 100000, '6404d04f85384.jpg'),
	(2, 'Biolin', 200000, '6404d9458f292.png'),
	(3, 'Smart Heart', 150000, '6404da4a0c058.jpg'),
	(4, 'Premium', 120000, '6404da5baa3b3.png'),
	(5, 'Royal Cannin', 170000, '64057c3a425f3.png'),
	(6, 'Pedigree', 155000, '64057cb26c53a.png'),
	(7, 'Happy Dog', 200000, '6406c7a2e5c43.png');

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
  PRIMARY KEY (`Id`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tdk_petshop.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`Id`, `UserName`, `Pass`, `FullName`, `Avata`, `RoleId`) VALUES
	(1, 'khuongzxc123', '$2y$10$uAo06Dorh2Ly05zjMyTGb.OjTix8OOJDAETybUKSlhmIHqRGZOKbG', 'Trần Văn Khương', '6406fff3cfee7.jpg', 1),
	(2, 'hugoloc1005', '$2y$10$6ENIzul/sjdsYEnRQjaxuO4HMg6IpzAMfYaoqgOQa8cdY6dVzQUnu', 'Khuong Tran', '6406f990ab24c.png', 2),
	(3, 'hugoloc1003', '$2y$10$gFPi.yW4K88u6yZ245JD4u53DVyGqa.i5LjyF0JhIOg9GPYHY3UCW', 'Trần Văn Khương', '6406fcb2b13f6.jpg', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
