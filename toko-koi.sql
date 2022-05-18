/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - toko-koi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko-koi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `toko-koi`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `code_product` (`code_product`) USING BTREE,
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`code_product`) REFERENCES `product` (`code_product`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

LOCK TABLES `cart` WRITE;

insert  into `cart`(`id`,`code_product`,`username`,`qty`,`price`,`created_at`,`updated_at`) values (2,'TKOI126','andri007',3,21000,'2022-05-19 01:11:15',NULL);

UNLOCK TABLES;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_category` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `upadate_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code_category` (`code_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

LOCK TABLES `category` WRITE;

UNLOCK TABLES;

/*Table structure for table `file_upload` */

DROP TABLE IF EXISTS `file_upload`;

CREATE TABLE `file_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_upload_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `type` enum('img','video') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_upload_id` (`session_upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `file_upload` */

LOCK TABLES `file_upload` WRITE;

insert  into `file_upload`(`id`,`session_upload_id`,`name`,`type`,`created_at`,`updated_at`) values (1,1234567890,'koi-1.jpg','img','2022-05-14 23:31:13',NULL);
insert  into `file_upload`(`id`,`session_upload_id`,`name`,`type`,`created_at`,`updated_at`) values (3,1234567890,'koi-1.mp4','video','2022-05-14 23:31:13',NULL);

UNLOCK TABLES;

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_upload_id` int(11) DEFAULT NULL,
  `code_invoice` varchar(45) DEFAULT NULL,
  `code_transaction` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `note` text DEFAULT NULL,
  `status` enum('menunggu pembayaran','terbayar','kirim','selesai','gagal') NOT NULL DEFAULT 'menunggu pembayaran',
  `total_price` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code_invoice` (`code_invoice`,`code_transaction`,`username`),
  KEY `code_transaction` (`code_transaction`),
  KEY `session_upload_id` (`session_upload_id`),
  KEY `username` (`username`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`code_transaction`) REFERENCES `transaction` (`code_transaction`),
  CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`session_upload_id`) REFERENCES `file_upload` (`session_upload_id`),
  CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `invoice` */

LOCK TABLES `invoice` WRITE;

UNLOCK TABLES;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_upload_id` int(11) DEFAULT NULL,
  `code_product` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_upload_id` (`session_upload_id`),
  KEY `code_product` (`code_product`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`session_upload_id`) REFERENCES `file_upload` (`session_upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

LOCK TABLES `product` WRITE;

insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (1,1234567890,'TKOI124','Fish',100,'Ikan koi chagoi merupakan jenis ikan koi dengan harga yang paling murah. Ciri khas ikan chagoi adalah perpaduan warna abu-abu dengan lapisan warna kuning keemasan yang tipis tanpa corak unik.',1000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (2,1234567890,'TKOI123','Tancho',100,'Ikan koi Tanco biasanya memiliki warna dasar putih dan terdapat buletan jingga pada bagian kepalanya.',7000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (13,1234567890,'TKOI125','Fish',100,'Ikan koi chagoi merupakan jenis ikan koi dengan harga yang paling murah. Ciri khas ikan chagoi adalah perpaduan warna abu-abu dengan lapisan warna kuning keemasan yang tipis tanpa corak unik.',1000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (14,1234567890,'TKOI126','Tancho',100,'Ikan koi Tanco biasanya memiliki warna dasar putih dan terdapat buletan jingga pada bagian kepalanya.',7000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (15,1234567890,'TKOI127','Fish',100,'Ikan koi chagoi merupakan jenis ikan koi dengan harga yang paling murah. Ciri khas ikan chagoi adalah perpaduan warna abu-abu dengan lapisan warna kuning keemasan yang tipis tanpa corak unik.',1000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (16,1234567890,'TKOI128','Tancho',100,'Ikan koi Tanco biasanya memiliki warna dasar putih dan terdapat buletan jingga pada bagian kepalanya.',7000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (17,1234567890,'TKOI129','Fish',100,'Ikan koi chagoi merupakan jenis ikan koi dengan harga yang paling murah. Ciri khas ikan chagoi adalah perpaduan warna abu-abu dengan lapisan warna kuning keemasan yang tipis tanpa corak unik.',1000,'1','2022-05-14 23:36:00',NULL);
insert  into `product`(`id`,`session_upload_id`,`code_product`,`name`,`stock`,`description`,`price`,`is_active`,`created_at`,`updated_at`) values (18,1234567890,'TKOI122','Tancho',100,'Ikan koi Tanco biasanya memiliki warna dasar putih dan terdapat buletan jingga pada bagian kepalanya.',7000,'1','2022-05-14 23:36:00',NULL);

UNLOCK TABLES;

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_transaction` varchar(45) DEFAULT NULL,
  `code_produk` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` enum('menunggu pembayaran','terbayar','gagal') NOT NULL DEFAULT 'menunggu pembayaran',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code_transaction` (`code_transaction`),
  KEY `code_produk` (`code_produk`,`username`),
  KEY `username` (`username`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`code_produk`) REFERENCES `product` (`code_product`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaction` */

LOCK TABLES `transaction` WRITE;

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

insert  into `user`(`id`,`username`,`name`,`number`,`email`,`password`,`nama`,`address`,`created_at`) values (2,'andri007','Andri Rizki Saputra','082322525083','andri.rizki007@gmail.com','andri007',NULL,'Yogyakarta','2022-05-18 22:27:40');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
